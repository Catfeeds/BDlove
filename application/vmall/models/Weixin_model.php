
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
    
    //private $auth_appid;//授权方Appid
    //private $auth_token;//授权方token
    //private $weixin_jsapi_tiket;
    //private $weixin_jsapi_tiket_time;
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
        
        //$auth_info = $this->common_function->get_system_value('weixin_auth_info');
        //$auth_info = object_array(json_decode($auth_info,true));
        //$this->auth_token = $this->common_function->get_system_value('weixin_auth_token');
        //$this->auth_appid = $auth_info['authorizer_appid'];
        //$this->weixin_jsapi_tiket = $this->common_function->get_system_value('weixin_jsapi_tiket');
        //$this->weixin_jsapi_tiket_time = $this->common_function->get_system_value('weixin_jsapi_tiket_time');
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
    /* //提交菜单内容给服务器
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
    } */
    
    
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
        if($unsubscribe){
            //取消关注
            $sql3 = "select user_id,wx_openid from {$this->db->dbprefix('user')} where wx_openid='{$openid}'";
            $user = $this->db->query($sql3) ->row_array();
            $this->common_function->set_user_wx_action($user['user_id'],5,time());
        }
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
        //$this->db->insert('system_config',array('code'=>'tetete25','value'=>json_encode($jsoninfo)));
        if($jsoninfo['subscribe']==1){
            $wx_openid = $jsoninfo['openid'];
            $sql3 = "select user_id,wx_openid,ecshopping_guide_id,ecstore_id,ecgustore_id,tel,weixin_location,is_follow from {$this->db->dbprefix('user')} where wx_openid='{$wx_openid}' and is_status=1 ";
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
            $user_sess['head_portrait'] = $inner['head_portrait'];//用户微信头像
            
            
            
            if($user){
                //老用户
                $this->session->set_userdata(array("Location"=>$user['weixin_location']));
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
                    //通过所搜公众号进来的
                    if($user['is_follow']!=1){
                        $this->common_function->set_user_wx_action($user['user_id'],2,$times);
                    }
                    //通过扫码进来的
                    $res = $this->common_function->get_scene_buy_EventKey($EventKey);
                    if($res){
                        if($res['scene_id']==1 || $res['scene_id']==3){
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
                    //通过所搜公众号进来的
                    if($user['is_follow']!=1){
                        $this->common_function->set_user_wx_action($user['user_id'],2,$times);
                    }
                    
                }
                $this->session->set_userdata($user_sess);
                //更新微信用户数据
                $this->db->where('wx_openid', $wx_openid);
                $this->db->update('user', $inner);
            }else{
                //新用户
              $type= "";
              $true_id = "";
              if($EventKey){
                    $res = $this->common_function->get_scene_buy_EventKey($EventKey);
                    if($res){
                        $true_id = $res['true_id'];
                        if($res['scene_id']==1 || $res['scene_id']==3){
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
                if(!empty($type)){
                    $this->common_function->set_user_wx_action($user_id,$type,$times,$true_id);
                }
                $user_sess['user_id'] = $user_id;
                $user_sess['wx_openid'] = $wx_openid;
                $user_sess['wx_nickname'] = $jsoninfo['nickname'];
                $this->session->set_userdata($user_sess);
            }
        }
    }
    
    public function get_Location($openid,$latitude,$longitude){

            $sql3 = "select user_id,wx_openid,ecshopping_guide_id,ecstore_id,ecgustore_id,tel from {$this->db->dbprefix('user')} where wx_openid='{$openid}'";
            $user = $this->db->query($sql3) ->row_array();
            //获取当前位置加上偏移量会准一点
            //经度+经度校正值： 0.008774687519;
            //纬度+纬度校正值： 0.00374531687912;
            $longitude = $longitude+0.008774687519;
            $latitude = $latitude+0.00374531687912;
            $Location=serialize(array("longitude"=>$longitude,"latitude"=>$latitude));
            $this->db->where('user_id',$user['user_id']);
            $this->db->update('user', array("weixin_location"=>$Location));
    }
    
    
    //回调页获取用户的openid（静态授权）记录数据库并设置session
    public function get_user_openid($url='')
    {
    	/* $_SESSION['user_id'] = 94;
    	if(!empty($_SESSION['user_id'])){
    		return '';
    	}  */   
        $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
        $u_openid = $this->db->select('wx_openid')->where('user_id',$user_id)->get('user')->row('wx_openid');
        if($user_id){
            $Location = $this->db->select('weixin_location')->where('user_id',$user_id)->get('user')->row('weixin_location');
            $this->session->set_userdata(array("Location"=>$Location));
        }
        $url = empty($url)?base_url("vmall.php/index/index"):$url;
        $wx_openid = isset($_SESSION['wx_openid'])?$_SESSION['wx_openid']:'';
        if(empty($user_id)||empty($wx_openid)||$wx_openid!=$u_openid){
            //配置参数的数组
            $auth_token = $this->common_function->wx_auth_token();
            $wx_conf =  array(
                'appid' =>$this->common_function->wx_auth_appid(),
                'component_appid' =>$this->common_function->wx_appid(),
                'component_access_token' =>$this->common_function->wx_component_access_token(),
                'auth_token'=>$auth_token,
                'url' =>urlencode($url) //当前页地址
            );
            //$this->db->insert('system_config',array('code'=>'tetete22','value'=>json_encode($_GET)));
            //没有传递code的情况下，先登录一下
            if(!isset($_GET['code']) || empty($_GET['code'])){
                //$this->db->insert('system_config',array('code'=>'tetete23','value'=>json_encode($_GET)));
                $getCodeUrl  =  "https://open.weixin.qq.com/connect/oauth2/authorize".
                    "?appid=" . $wx_conf['appid'] .
                    "&redirect_uri=" . $wx_conf['url']  .
                    "&response_type=code".
                    "&scope=snsapi_base". #!!!scope设置为snsapi_base !!!
                    "&state=123".
                    "&component_appid=".$wx_conf['component_appid']."#wechat_redirect";
                //https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE&component_appid=component_appid#wechat_redirect
                //跳转微信获取code值,去登陆
                header('Location:' . $getCodeUrl);
                exit;
            }
            $code =	trim($_GET['code']);

                //print_r($wx_conf);exit;
                $token_url = 'https://api.weixin.qq.com/sns/oauth2/component/access_token?'.
                    'appid='.$wx_conf['appid'].'&code='.$code.'&grant_type=authorization_code&'.
                    'component_appid='.$wx_conf['component_appid'].
                    '&component_access_token='.$wx_conf['component_access_token'];
                /*https://api.weixin.qq.com/sns/oauth2/component/access_token?appid=APPID&code=CODE&grant_type=authorization_code
                &component_appid=COMPONENT_APPID&component_access_token=COMPONENT_ACCESS_TOKEN*/
                //header('Location:' . $token_url);
                //print_r($token_url);die;
                $component = $this->https_request($token_url);//print_r($component);
                //$this->db->insert('system_config',array('code'=>'tetete24','value'=>$component));
                if($component){
                    $re_component = object_array(json_decode($component,true));
                    $user_openid = $re_component['openid'];
                    $this->get_Userinfo($auth_token,$user_openid);
                    $this->db->update('user',array(
                        'wx_token'=>$re_component['access_token'],'wx_token_expire_in'=>$re_component['expires_in'],'refresh_token'=>$re_component['refresh_token']
                    ),array('wx_openid'=>$user_openid));
                    return $user_openid;
                }else{
                     echo "<script>javascript:alert('链接错误！！！');</script>";
                     exit;
                }
                
            
        }
       return $wx_openid;
    }
    //回调页获取未关注的微信用户的openid（静态授权）记录数据并设置session
    public function get_wx_openid($url='')
    {
    	/* $_SESSION['dai_wx_openid'] = 'oAPx30rYJC8QAED-EqZGwc55-oaw';
    	$_SESSION['dai_wx_openid_time'] = time()-100;
    	$_SESSION['dai_wx_openid_nickname'] = 'sdgererger';
    	$_SESSION['headimgurl'] = 'http://wx.qlogo.cn/mmopen/zrFYKILZ93EUXGQa23gq6JTk4kY5oK81wJ1BiabZymPQyDtZn11WKwWgXaNbD0CCYbVHlR2TdiaLRibHpEbESnzDfuia1R6lSwia6/0'; */
    	$wx_openid = isset($_SESSION['dai_wx_openid'])?$_SESSION['dai_wx_openid']:'';
    	$wx_openid_time = isset($_SESSION['dai_wx_openid_time'])?$_SESSION['dai_wx_openid_time']:0;
    	if(time()-5400<=$wx_openid_time&&!empty($wx_openid)){
    		//$this->db->insert('system_config',array('code'=>'tetete223','value'=>json_encode($_SESSION)));
    		return true;
    	}else{
    		//配置参数的数组
    		$auth_token = $this->common_function->wx_auth_token();
    		$wx_conf =  array(
    				'appid' =>$this->common_function->wx_auth_appid(),
    				'component_appid' =>$this->common_function->wx_appid(),
    				'component_access_token' =>$this->common_function->wx_component_access_token(),
    				'auth_token'=>$auth_token,
    				'url' =>urlencode($url) //当前页地址
    		);
    		//$this->db->insert('system_config',array('code'=>'tetete22','value'=>json_encode($_GET)));
    		//没有传递code的情况下，先登录一下
    		if(!isset($_GET['code']) || empty($_GET['code'])){
    			//$this->db->insert('system_config',array('code'=>'tetete23','value'=>json_encode($_GET)));
    			$getCodeUrl  =  "https://open.weixin.qq.com/connect/oauth2/authorize".
    					"?appid=" . $wx_conf['appid'] .
    					"&redirect_uri=" . $wx_conf['url']  .
    					"&response_type=code".
    					"&scope=snsapi_userinfo". #!!!scope设置为snsapi_base !!!
    					"&state=123".
    					"&component_appid=".$wx_conf['component_appid']."#wechat_redirect";
    			//https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE&component_appid=component_appid#wechat_redirect
    			//跳转微信获取code值,去登陆
    			header('Location:' . $getCodeUrl);
    			exit;
    		}
    		$code =	trim($_GET['code']);
    		
    		//print_r($wx_conf);exit;
    		$token_url = 'https://api.weixin.qq.com/sns/oauth2/component/access_token?'.
    				'appid='.$wx_conf['appid'].'&code='.$code.'&grant_type=authorization_code&'.
    				'component_appid='.$wx_conf['component_appid'].
    				'&component_access_token='.$wx_conf['component_access_token'];
    		$component = $this->https_request($token_url);//print_r($component);
    		//$this->db->insert('system_config',array('code'=>'tetete22','value'=>$component));
    		if($component){
    			$re_component = object_array(json_decode($component,true));
    			$wx_openid = $re_component['openid'];
    			$wx_openid_token = $re_component['access_token'];
    			//$this->db->insert('system_config',array('code'=>'tetete233','value'=>$wx_openid_token));
    			//$this->db->insert('system_config',array('code'=>'tetete234','value'=>$wx_openid));
    			$user_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$wx_openid_token.'&openid='.$wx_openid.'&lang=zh_CN';
    			
    			$user_component = $this->https_request($user_url);
    			//$this->db->insert('system_config',array('code'=>'tetete23','value'=>$user_component));
    			$user_info = object_array(json_decode($user_component,true));			
    			$this->session->set_userdata(array('dai_wx_openid'=>$wx_openid,'dai_wx_openid_time'=>time(),'dai_wx_openid_nickname'=>$user_info['nickname'],'headimgurl'=>$user_info['headimgurl']));

    			return true;
    		}else{
    			return false;
    		}
    	}
    	
    	
    }
    private function https_request($url,$data = null){
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
            return false;
    
        }
        return $output;
    }
    //微信支付
    public function wxPay(){
        
    }
    

    
/*     
    public function chooseImage($url){//拍照或从手机相册中选图接口
        $jsapiTicket = $this->getJsApiTicket();
        $timestamp = time();
        $nonceStr = $this->createNonceStr();
        
        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
        $signature = sha1($string);
        
        $signPackage = array(
            "appId"     => $this->auth_appid,
            "nonceStr"  => $nonceStr,
            "timestamp" => $timestamp,
            "url"       => $url,
            "signature" => $signature,
            "rawString" => $string
        );
        return $signPackage;
    }
    
    
    private function getJsApiTicket(){//获得ticket
        $time = time();
        if(!empty($this->weixin_jsapi_tiket)){
            $livetime = $this->weixin_jsapi_tiket_time;
            if($livetime<$time){ //access_token已过期，需重新获取
                $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=".$this->auth_token."&type=jsapi";
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
                $jsoninfo =array("weixin_jsapi_tiket"=>$jsoninfo["ticket"],"weixin_jsapi_tiket_time"=>$time + $jsoninfo["expires_in"]);
                $this->db->where('code',"weixin_jsapi_tiket")->update('system_config',array('value'=>$jsoninfo['weixin_jsapi_tiket']));
                $this->db->where('code',"weixin_jsapi_tiket_time")->update('system_config',array('value'=>$jsoninfo['weixin_jsapi_tiket_time']));
                return $jsoninfo['weixin_jsapi_tiket'];
            }else{
                return  $this->weixin_jsapi_tiket;
            }
        }else{
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=".$this->auth_token."&type=jsapi";
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
            $jsoninfo =array("weixin_jsapi_tiket"=>$jsoninfo["ticket"],"weixin_jsapi_tiket_time"=>$time + $jsoninfo["expires_in"]);
            $this->db->where('code',"weixin_jsapi_tiket")->update('system_config',array('value'=>$jsoninfo['weixin_jsapi_tiket']));
            $this->db->where('code',"weixin_jsapi_tiket_time")->update('system_config',array('value'=>$jsoninfo['weixin_jsapi_tiket_time']));
            return $jsoninfo['weixin_jsapi_tiket'];
        }
    }
    
    
    private function createNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    } */
    
    
}
