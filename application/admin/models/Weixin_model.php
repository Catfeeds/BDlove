<<<<<<< .mine
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin_model extends CI_Model {
    private $token;
    private $appid;
    private $appsecret;
    private $echostr;
    private $weixin_tiket;
    private $weixin_access_token;
    private $weixin_access_token_time;
	public function __construct()
    {
        parent::__construct();
        $this->load->language('common');
        $config = $this->get_wxconfig();
        $this->token = $config['token'];
        $this->appid = $config['id'];
        $this->appsecret = $config['key'];
        $this->weixin_tiket = $config['weixin_tiket'];
        $this->weixin_access_token = $config['weixin_access_token'];
        $this->weixin_access_token_time = $config['weixin_access_token_time'];
        $this->echostr = $config['weixin_key'];
    }
    public function get_wxconfig(){
        $data['key'] = $this->common_function->get_system_value('weixin_appsecret');
        $data['id'] = $this->common_function->get_system_value('weixin_appid');
        $data['token'] = $this->common_function->get_system_value('weixin_token');
        $data['weixin_tiket'] = $this->common_function->get_system_value('weixin_tiket');
        $data['weixin_access_token'] = $this->common_function->get_system_value('weixin_access_token');
        $data['weixin_access_token_time'] = $this->common_function->get_system_value('weixin_access_token_time');
        $data['weixin_key'] = $this->common_function->get_system_value('weixin_key');
        
        return $data;
    }
    //提交菜单内容给服务器
    public function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        $result = object_array(json_decode($output,true));
         if(isset($result['errcode'])&&$result['errcode']!=0){
            $this->lang->load('wxcode');
            $lang = $this->lang->line('wx');
            $err_msg = isset($lang[$result['errcode']])?$lang[$result['errcode']]:'数据错误'.$result['errcode'];
            if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                echo json_encode(array('state'=>false,'msg'=>$err_msg,'data'=>''));exit;// ajax 请求的处理方式
            }else{
                $this->common_function->show_message($err_msg);
                exit();// 正常请求的处理方式
            };
            
        }
        return $output;
    }
    
    
    //获得Access_Token
    public function get_AccesToken()
    {
        $time = time();
        $AccesToken = '';
        if(!empty($AccesToken)){
            $jsoninfo = unserialize($AccesToken);
            $livetime = $jsoninfo['livetime'];
            if($livetime>$time){ //access_token已过期，需重新获取
                $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $output = curl_exec($ch);
                curl_close($ch);
                $jsoninfo = json_decode($output, true);
                //$expires_time = $jsoninfo["expires_in"];//凭证有效时间，单位：秒
                //$access_token = $jsoninfo["access_token"];//获取到的凭证
                $jsoninfo =array("access_token"=>$jsoninfo["access_token"],"livetime"=>$time + $jsoninfo["expires_in"]);
                //$jsoninfo = serialize($jsoninfo);
                //$this->db->where('code',"wx_acces_token")->update('system_config',array('value'=>$jsoninfo));
                return  $jsoninfo;
    
            }else{
                return  $jsoninfo;
    
            }
        }else{
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $jsoninfo = json_decode($output, true);
            //$expires_time = $jsoninfo["expires_in"];//凭证有效时间，单位：秒
            //$access_token = $jsoninfo["access_token"];//获取到的凭证
            $jsoninfo =array("access_token"=>$jsoninfo["access_token"],"livetime"=>$time + $jsoninfo["expires_in"]);
            //$jsoninfo = serialize($jsoninfo);
            //$this->db->where('code',"wx_acces_token")->update('system_config',array('value'=>$jsoninfo));
            return  $jsoninfo;
        }
    }
    
    //扫描店铺，导购二维码，添加/更新用户信息
    public  function get_Userinfo($auth_token,$openid,$EventKey=false){
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$auth_token."&openid=".$openid."&lang=zh_CN";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $jsoninfo = json_decode($output, true);
        $times = time();
        if($jsoninfo['subscribe']==1){
            $wx_openid = $jsoninfo['openid'];
            $sql3 = "select user_id,wx_openid,ecshopping_guide_id,ecstore_id,ecgustore_id,tel from {$this->db->dbprefix('user')} where wx_openid='{$wx_openid}'";
            $user = $this->db->query($sql3) ->row_array();
            $inner['head_portrait'] = $jsoninfo['headimgurl'];
            $sql1 = "select area_id,area_deep,area_name from {$this->db->dbprefix('area')}   where  area_deep = 1  and  area_name LIKE '%{$jsoninfo['province']}%' ";
            $address1 = $this->db->query($sql1) ->row_array();
            $sql2 = "select area_id,area_deep,area_name from {$this->db->dbprefix('area')}   where  area_deep = 2  and  area_name LIKE '%{$jsoninfo['city']}%' ";
            $address2 = $this->db->query($sql2) ->row_array();
            if($address1){
                $inner['province_id'] = $address1['area_id'];
            }
            if($address2){
                $inner['city_id'] = $address2['area_id'];
            }
            $inner['wx_create_time'] = $jsoninfo['subscribe_time'];
            $inner['wx_ceateymd'] = date("Y-m-d",$jsoninfo['subscribe_time']);
            $inner['wx_nickname'] = $jsoninfo['nickname'];
            $inner['member_sex'] = $jsoninfo['sex'];
            $inner['is_follow'] = 1;
            $user_sess = array();
            
            if($user){
                
                $user_sess['user_id'] = $user['user_id'];
                $user_sess['wx_openid'] = $openid;
                $user_sess['wx_nickname'] = $jsoninfo['nickname'];
                if(!empty($user['tel'])){
                    $user_sess['tel'] = $user['tel'];
                }
                if(!empty($user['ecshopping_guide_id'])){
                    $user_sess['ecshopping_guide_id'] = $user['ecshopping_guide_id'];
                }
                if(!empty($user['ecstore_id'])){
                    $user_sess['ecstore_id'] = $user['ecstore_id'];
                }
                if(!empty($user['ecgustore_id'])){
                    $user_sess['ecgustore_id'] = $user['ecgustore_id'];
                }
                if($EventKey){
                    $res = $this->common_function->get_scene_buy_EventKey($EventKey);
                    if($res){
                        if($res['scene_id']==1){
                            $inner['ecshopping_guide_id'] = null;
                            $inner['ecstore_id'] = $res['true_id'];
                            $user_sess['ecstore_id'] = $res['true_id'];
                            $user_sess['ecshopping_guide_id'] = null;
                            $this->common_function->set_user_wx_action($user_sess['user_id'],4,$times,$res['true_id']);
                        }elseif ($res['scene_id']==2){
                            if($user['ecshopping_guide_id']!=$res['true_id']){
                                $this->db->select("spg_id, spg_store_id")
                                ->from('store_shopping_guide')
                                ->where("spg_id", $res['true_id']);
                                $result = $this->db->get()->row_array();
                                $inner['ecshopping_guide_id'] = $res['true_id'];
                                $inner['ecstore_id'] = $result['spg_store_id'];
                                $user_sess['ecshopping_guide_id'] = $res['true_id'];
                                $user_sess['ecstore_id'] = $result['spg_store_id'];
                                $this->common_function->set_user_wx_action($user_sess['user_id'],3,$times,$res['true_id']);
                            }
                        }
                    }
                }
                $this->session->set_userdata($user_sess);
                //更新微信用户数据
                $this->db->where('code','test2')->update('system_config',array('value'=>date('ymd his').json_encode($_SESSION)));
                $this->db->where('wx_openid', $wx_openid);
                $this->db->update('user', $inner);
            }else{
              $type= "";
              if($EventKey){
                    $res = $this->common_function->get_scene_buy_EventKey($EventKey);
                    if($res){
                        if($res['scene_id']==1){
                            $inner['ecgustore_id'] = $res['true_id'];
                            $inner['ecshopping_guide_id'] = null;
                            $inner['ecstore_id'] = $res['true_id'];
                            $user_sess['ecgustore_id'] = $res['true_id'];
                            $user_sess['ecshopping_guide_id'] = null;
                            $user_sess['ecstore_id'] = $res['true_id'];
                            $type = 4;
                        }elseif ($res['scene_id']==2){
                            $this->db->select("spg_id, spg_store_id")
                            ->from('store_shopping_guide')
                            ->where("spg_id", $res['true_id']);
                            $result = $this->db->get()->row_array();
                            $inner['ecshopping_guide_id'] = $res['true_id'];
                            $inner['ecgustore_id'] = $result['spg_store_id'];
                            $inner['ecstore_id'] = $result['spg_store_id'];
                            $user_sess['ecshopping_guide_id'] = $res['true_id'];
                            $user_sess['ecgustore_id'] = $result['spg_store_id'];
                            $user_sess['ecstore_id'] = $result['spg_store_id'];
                            $type = 3;
                        }
                    }
                }else{
                    
                }
                
                //添加微信用户
                $inner['wx_openid'] = $wx_openid;
                $inner['user_name'] = $jsoninfo['nickname'];
                $this->db->insert('user',$inner);
                $user_id = $this->db->insert_id();
                $this->common_function->set_user_wx_action($user_id,1,$times);
                $this->common_function->set_user_wx_action($user_id,2,$times);
                if($type){
                    $this->common_function->set_user_wx_action($user_id,$type,$times,$res['true_id']);
                }
                $user_sess['user_id'] = $user_id;
                $user_sess['wx_openid'] = $wx_openid;
                $user_sess['wx_nickname'] = $jsoninfo['nickname'];
                $this->session->set_userdata($user_sess);
            }
        }
    }
    

    
    
    
    
    
}
||||||| .r430
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin_model extends CI_Model {
    private $token;
    private $appid;
    private $appsecret;
    private $echostr;
    private $weixin_tiket;
    private $weixin_access_token;
    private $weixin_access_token_time;
	public function __construct()
    {
        parent::__construct();
        $this->load->language('common');
        $config = $this->get_wxconfig();
        $this->token = $config['token'];
        $this->appid = $config['id'];
        $this->appsecret = $config['key'];
        $this->weixin_tiket = $config['weixin_tiket'];
        $this->weixin_access_token = $config['weixin_access_token'];
        $this->weixin_access_token_time = $config['weixin_access_token_time'];
        $this->echostr = $config['weixin_key'];
    }
    public function get_wxconfig(){
        $data['key'] = $this->common_function->get_system_value('weixin_appsecret');
        $data['id'] = $this->common_function->get_system_value('weixin_appid');
        $data['token'] = $this->common_function->get_system_value('weixin_token');
        $data['weixin_tiket'] = $this->common_function->get_system_value('weixin_tiket');
        $data['weixin_access_token'] = $this->common_function->get_system_value('weixin_access_token');
        $data['weixin_access_token_time'] = $this->common_function->get_system_value('weixin_access_token_time');
        $data['weixin_key'] = $this->common_function->get_system_value('weixin_key');
        
        return $data;
    }
    //提交菜单内容给服务器
    public function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        $result = object_array(json_decode($output,true));
         if(isset($result['errcode'])&&$result['errcode']!=0){
            $this->lang->load('wxcode');
            $lang = $this->lang->line('wx');
            $err_msg = isset($lang[$result['errcode']])?$lang[$result['errcode']]:'数据错误'.$result['errcode'];
            if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                echo json_encode(array('state'=>false,'msg'=>$err_msg,'data'=>''));exit;// ajax 请求的处理方式
            }else{
                $this->common_function->show_message($err_msg);
                exit();// 正常请求的处理方式
            };
            
        }
        return $output;
    }
    
    
    //获得Access_Token
    public function get_AccesToken()
    {
        $time = time();
        $AccesToken = '';
        if(!empty($AccesToken)){
            $jsoninfo = unserialize($AccesToken);
            $livetime = $jsoninfo['livetime'];
            if($livetime>$time){ //access_token已过期，需重新获取
                $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $output = curl_exec($ch);
                curl_close($ch);
                $jsoninfo = json_decode($output, true);
                //$expires_time = $jsoninfo["expires_in"];//凭证有效时间，单位：秒
                //$access_token = $jsoninfo["access_token"];//获取到的凭证
                $jsoninfo =array("access_token"=>$jsoninfo["access_token"],"livetime"=>$time + $jsoninfo["expires_in"]);
                //$jsoninfo = serialize($jsoninfo);
                //$this->db->where('code',"wx_acces_token")->update('system_config',array('value'=>$jsoninfo));
                return  $jsoninfo;
    
            }else{
                return  $jsoninfo;
    
            }
        }else{
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $jsoninfo = json_decode($output, true);
            //$expires_time = $jsoninfo["expires_in"];//凭证有效时间，单位：秒
            //$access_token = $jsoninfo["access_token"];//获取到的凭证
            $jsoninfo =array("access_token"=>$jsoninfo["access_token"],"livetime"=>$time + $jsoninfo["expires_in"]);
            //$jsoninfo = serialize($jsoninfo);
            //$this->db->where('code',"wx_acces_token")->update('system_config',array('value'=>$jsoninfo));
            return  $jsoninfo;
        }
    }
    
    //扫描店铺，导购二维码，添加/更新用户信息
    public  function get_Userinfo($auth_token,$openid,$EventKey=false){
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$auth_token."&openid=".$openid."&lang=zh_CN";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $jsoninfo = json_decode($output, true);
        $times = time();
        if($jsoninfo['subscribe']==1){
            $wx_openid = $jsoninfo['openid'];
            $sql3 = "select user_id,wx_openid,ecshopping_guide_id,ecstore_id,ecgustore_id,tel from {$this->db->dbprefix('user')} where wx_openid='{$wx_openid}'";
            $user = $this->db->query($sql3) ->row_array();
            $inner['head_portrait'] = $jsoninfo['headimgurl'];
            $sql1 = "select area_id,area_deep,area_name from {$this->db->dbprefix('area')}   where  area_deep = 1  and  area_name LIKE '%{$jsoninfo['province']}%' ";
            $address1 = $this->db->query($sql1) ->row_array();
            $sql2 = "select area_id,area_deep,area_name from {$this->db->dbprefix('area')}   where  area_deep = 2  and  area_name LIKE '%{$jsoninfo['city']}%' ";
            $address2 = $this->db->query($sql2) ->row_array();
            if($address1){
                $inner['province_id'] = $address1['area_id'];
            }
            if($address2){
                $inner['city_id'] = $address2['area_id'];
            }
            $inner['wx_create_time'] = $jsoninfo['subscribe_time'];
            $inner['wx_ceateymd'] = date("Y-m-d",$jsoninfo['subscribe_time']);
            $inner['wx_nickname'] = $jsoninfo['nickname'];
            $inner['member_sex'] = $jsoninfo['sex'];
            $inner['is_follow'] = 1;
            $user_sess = array();
            
            if($user){
                
                $user_sess['user_id'] = $user['user_id'];
                $user_sess['wx_openid'] = $openid;
                $user_sess['wx_nickname'] = $jsoninfo['nickname'];
                if(!empty($user['tel'])){
                    $user_sess['tel'] = $user['tel'];
                }
                if(!empty($user['ecshopping_guide_id'])){
                    $user_sess['ecshopping_guide_id'] = $user['ecshopping_guide_id'];
                }
                if(!empty($user['ecstore_id'])){
                    $user_sess['ecstore_id'] = $user['ecstore_id'];
                }
                if(!empty($user['ecgustore_id'])){
                    $user_sess['ecgustore_id'] = $user['ecgustore_id'];
                }
                if($EventKey){
                    $res = $this->common_function->get_scene_buy_EventKey($EventKey);
                    if($res){
                        if($res['scene_id']==1){
                            $inner['ecshopping_guide_id'] = null;
                            $inner['ecstore_id'] = $res['true_id'];
                            $user_sess['ecstore_id'] = $res['true_id'];
                            $user_sess['ecshopping_guide_id'] = null;
                            $this->common_function->set_user_wx_action($user_sess['user_id'],4,$times,$res['true_id']);
                        }elseif ($res['scene_id']==2){
                            if($user['ecshopping_guide_id']!=$res['true_id']){
                                $this->db->select("spg_id, spg_store_id")
                                ->from('store_shopping_guide')
                                ->where("spg_id", $res['true_id']);
                                $result = $this->db->get()->row_array();
                                $inner['ecshopping_guide_id'] = $res['true_id'];
                                $inner['ecstore_id'] = $result['spg_store_id'];
                                $user_sess['ecshopping_guide_id'] = $res['true_id'];
                                $user_sess['ecstore_id'] = $result['spg_store_id'];
                                $this->common_function->set_user_wx_action($user_sess['user_id'],3,$times,$res['true_id']);
                            }
                        }
                    }
                }
                $this->session->set_userdata($user_sess);
                //更新微信用户数据
                $this->db->where('code','test2')->update('system_config',array('value'=>date('ymd his').json_encode($_SESSION)));
                $this->db->where('wx_openid', $wx_openid);
                $this->db->update('user', $inner);
            }else{
              $type= "";
              if($EventKey){
                    $res = $this->common_function->get_scene_buy_EventKey($EventKey);
                    if($res){
                        if($res['scene_id']==1){
                            $inner['ecgustore_id'] = $res['true_id'];
                            $inner['ecshopping_guide_id'] = null;
                            $inner['ecstore_id'] = $res['true_id'];
                            $user_sess['ecgustore_id'] = $res['true_id'];
                            $user_sess['ecshopping_guide_id'] = null;
                            $user_sess['ecstore_id'] = $res['true_id'];
                            $type = 4;
                        }elseif ($res['scene_id']==2){
                            $this->db->select("spg_id, spg_store_id")
                            ->from('store_shopping_guide')
                            ->where("spg_id", $res['true_id']);
                            $result = $this->db->get()->row_array();
                            $inner['ecshopping_guide_id'] = $res['true_id'];
                            $inner['ecgustore_id'] = $result['spg_store_id'];
                            $inner['ecstore_id'] = $result['spg_store_id'];
                            $user_sess['ecshopping_guide_id'] = $res['true_id'];
                            $user_sess['ecgustore_id'] = $result['spg_store_id'];
                            $user_sess['ecstore_id'] = $result['spg_store_id'];
                            $type = 3;
                        }
                    }
                }
                
                //添加微信用户
                $inner['wx_openid'] = $wx_openid;
                $inner['user_name'] = $jsoninfo['nickname'];
                $this->db->insert('user',$inner);
                $user_id = $this->db->insert_id();
                $this->common_function->set_user_wx_action($user_id,1,$times);
                $this->common_function->set_user_wx_action($user_id,2,$times);
                if($type){
                    $this->common_function->set_user_wx_action($user_id,$type,$times,$res['true_id']);
                }
                $user_sess['user_id'] = $user_id;
                $user_sess['wx_openid'] = $wx_openid;
                $user_sess['wx_nickname'] = $jsoninfo['nickname'];
                $this->session->set_userdata($user_sess);
            }
        }
    }
    

    
    
    
    
    
}
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin_model extends CI_Model {
    private $token;
    private $appid;
    private $appsecret;
    private $echostr;
    private $weixin_tiket;
    private $weixin_access_token;
    private $weixin_access_token_time;
	public function __construct()
    {
        parent::__construct();
        $this->load->language('common');
        $config = $this->get_wxconfig();
        $this->token = $config['token'];
        $this->appid = $config['id'];
        $this->appsecret = $config['key'];
        $this->weixin_tiket = $config['weixin_tiket'];
        $this->weixin_access_token = $config['weixin_access_token'];
        $this->weixin_access_token_time = $config['weixin_access_token_time'];
        $this->echostr = $config['weixin_key'];
    }
    public function get_wxconfig(){
        $data['key'] = $this->common_function->get_system_value('weixin_appsecret');
        $data['id'] = $this->common_function->get_system_value('weixin_appid');
        $data['token'] = $this->common_function->get_system_value('weixin_token');
        $data['weixin_tiket'] = $this->common_function->get_system_value('weixin_tiket');
        $data['weixin_access_token'] = $this->common_function->get_system_value('weixin_access_token');
        $data['weixin_access_token_time'] = $this->common_function->get_system_value('weixin_access_token_time');
        $data['weixin_key'] = $this->common_function->get_system_value('weixin_key');
        
        return $data;
    }
    //提交菜单内容给服务器
    public function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        $result = object_array(json_decode($output,true));
         if(isset($result['errcode'])&&$result['errcode']!=0){
            $this->lang->load('wxcode');
            $lang = $this->lang->line('wx');
            $err_msg = isset($lang[$result['errcode']])?$lang[$result['errcode']]:'数据错误'.$result['errcode'];
            if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                echo json_encode(array('state'=>false,'msg'=>$err_msg,'data'=>''));exit;// ajax 请求的处理方式
            }else{
                $this->common_function->show_message($err_msg);
                exit();// 正常请求的处理方式
            };
            
        }
        return $output;
    }
    
    
    //获得Access_Token
    public function get_AccesToken()
    {
        $time = time();
        $AccesToken = '';
        if(!empty($AccesToken)){
            $jsoninfo = unserialize($AccesToken);
            $livetime = $jsoninfo['livetime'];
            if($livetime>$time){ //access_token已过期，需重新获取
                $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $output = curl_exec($ch);
                curl_close($ch);
                $jsoninfo = json_decode($output, true);
                //$expires_time = $jsoninfo["expires_in"];//凭证有效时间，单位：秒
                //$access_token = $jsoninfo["access_token"];//获取到的凭证
                $jsoninfo =array("access_token"=>$jsoninfo["access_token"],"livetime"=>$time + $jsoninfo["expires_in"]);
                //$jsoninfo = serialize($jsoninfo);
                //$this->db->where('code',"wx_acces_token")->update('system_config',array('value'=>$jsoninfo));
                return  $jsoninfo;
    
            }else{
                return  $jsoninfo;
    
            }
        }else{
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $jsoninfo = json_decode($output, true);
            //$expires_time = $jsoninfo["expires_in"];//凭证有效时间，单位：秒
            //$access_token = $jsoninfo["access_token"];//获取到的凭证
            $jsoninfo =array("access_token"=>$jsoninfo["access_token"],"livetime"=>$time + $jsoninfo["expires_in"]);
            //$jsoninfo = serialize($jsoninfo);
            //$this->db->where('code',"wx_acces_token")->update('system_config',array('value'=>$jsoninfo));
            return  $jsoninfo;
        }
    }
    
    //扫描店铺，导购二维码，添加/更新用户信息
    public  function get_Userinfo($auth_token,$openid,$EventKey=false,$unsubscribe=false){
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$auth_token."&openid=".$openid."&lang=zh_CN";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $jsoninfo = json_decode($output, true);
        $times = time();
        if($jsoninfo['subscribe']==1){
            $wx_openid = $jsoninfo['openid'];
            $sql3 = "select user_id,is_follow,wx_openid,ecshopping_guide_id,ecstore_id,ecgustore_id,tel from {$this->db->dbprefix('user')} where wx_openid='{$wx_openid}'";
            $user = $this->db->query($sql3) ->row_array();
            $inner['head_portrait'] = $jsoninfo['headimgurl'];
            $sql1 = "select area_id,area_deep,area_name from {$this->db->dbprefix('area')}   where  area_deep = 1  and  area_name LIKE '%{$jsoninfo['province']}%' ";
            $address1 = $this->db->query($sql1) ->row_array();
            $sql2 = "select area_id,area_deep,area_name from {$this->db->dbprefix('area')}   where  area_deep = 2  and  area_name LIKE '%{$jsoninfo['city']}%' ";
            $address2 = $this->db->query($sql2) ->row_array();
            if($address1){
                $inner['province_id'] = $address1['area_id'];
            }
            if($address2){
                $inner['city_id'] = $address2['area_id'];
            }
            $inner['wx_create_time'] = $jsoninfo['subscribe_time'];
            $inner['wx_ceateymd'] = date("Y-m-d",$jsoninfo['subscribe_time']);
            $inner['wx_nickname'] = $jsoninfo['nickname'];
            $inner['member_sex'] = $jsoninfo['sex'];
            $inner['is_follow'] = 1;
            $user_sess = array();
            
            $this->db->where('code','EventKey')->update('system_config',array('value'=>$user['user_id']));
            if($unsubscribe){
            	//取消关注
            	$this->common_function->set_user_wx_action($user['user_id'],5,$times);
            }else{
                if($user){
                
                    $user_sess['user_id'] = $user['user_id'];
                    $user_sess['wx_openid'] = $openid;
                    $user_sess['wx_nickname'] = $jsoninfo['nickname'];
                    if(!empty($user['tel'])){
                        $user_sess['tel'] = $user['tel'];
                    }
                    if(!empty($user['ecshopping_guide_id'])){
                        $user_sess['ecshopping_guide_id'] = $user['ecshopping_guide_id'];
                    }
                    if(!empty($user['ecstore_id'])){
                        $user_sess['ecstore_id'] = $user['ecstore_id'];
                    }
                    if(!empty($user['ecgustore_id'])){
                        $user_sess['ecgustore_id'] = $user['ecgustore_id'];
                    }
                    if($EventKey){
                        $res = $this->common_function->get_scene_buy_EventKey($EventKey);
                        if($res){
                            if($res['scene_id']==1){
                                $inner['ecshopping_guide_id'] = null;
                                $inner['ecstore_id'] = $res['true_id'];
                                $user_sess['ecstore_id'] = $res['true_id'];
                                $user_sess['ecshopping_guide_id'] = null;
                                $this->common_function->set_user_wx_action($user_sess['user_id'],4,$times,$res['true_id']);
                            }elseif ($res['scene_id']==2){
                                if($user['ecshopping_guide_id']!=$res['true_id']){
                                    $this->db->select("spg_id, spg_store_id")
                                    ->from('store_shopping_guide')
                                    ->where("spg_id", $res['true_id']);
                                    $result = $this->db->get()->row_array();
                                    $inner['ecshopping_guide_id'] = $res['true_id'];
                                    $inner['ecstore_id'] = $result['spg_store_id'];
                                    $user_sess['ecshopping_guide_id'] = $res['true_id'];
                                    $user_sess['ecstore_id'] = $result['spg_store_id'];
                                    $this->common_function->set_user_wx_action($user_sess['user_id'],3,$times,$res['true_id']);
                                }
                            }
                        }
                    }else{
                        //手动搜索公众号
                        if($user['is_follow']!=1){
                            $this->common_function->set_user_wx_action($user['user_id'],2,$times);
                        }
                    }
                    //$this->session->set_userdata($user_sess);
                    //更新微信用户数据
                    $this->db->where('wx_openid', $wx_openid);
                    $this->db->update('user', $inner);
                }else{
                    $type= "";
                    if($EventKey){
                        $res = $this->common_function->get_scene_buy_EventKey($EventKey);
                        if($res){
                            if($res['scene_id']==1){
                                $inner['ecgustore_id'] = $res['true_id'];
                                $inner['ecshopping_guide_id'] = null;
                                $inner['ecstore_id'] = $res['true_id'];
                                $user_sess['ecgustore_id'] = $res['true_id'];
                                $user_sess['ecshopping_guide_id'] = null;
                                $user_sess['ecstore_id'] = $res['true_id'];
                                $type = 4;
                            }elseif ($res['scene_id']==2){
                                $this->db->select("spg_id, spg_store_id")
                                ->from('store_shopping_guide')
                                ->where("spg_id", $res['true_id']);
                                $result = $this->db->get()->row_array();
                                $inner['ecshopping_guide_id'] = $res['true_id'];
                                $inner['ecgustore_id'] = $result['spg_store_id'];
                                $inner['ecstore_id'] = $result['spg_store_id'];
                                $user_sess['ecshopping_guide_id'] = $res['true_id'];
                                $user_sess['ecgustore_id'] = $result['spg_store_id'];
                                $user_sess['ecstore_id'] = $result['spg_store_id'];
                                $type = 3;
                            }
                        }
                    }
                    //添加微信用户
                    $inner['wx_openid'] = $wx_openid;
                    $inner['user_name'] = $jsoninfo['nickname'];
                    $this->db->insert('user',$inner);
                    $user_id = $this->db->insert_id();
                    $this->common_function->set_user_wx_action($user_id,1,$times);
                    if($type){
                        $this->common_function->set_user_wx_action($user_id,$type,$times,$res['true_id']);
                    }
                    $user_sess['user_id'] = $user_id;
                    $user_sess['wx_openid'] = $wx_openid;
                    $user_sess['wx_nickname'] = $jsoninfo['nickname'];
                    //$this->session->set_userdata($user_sess);
                }
            }

        }
    }
    

    
    
    
    
    
}
>>>>>>> .r497
