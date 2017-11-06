<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    private $token;//公众号消息校验Token
    private $appid;//第三方平台Appid
    private $appsecret;//第三方平台Appsecret
    private $echostr;//公众号消息加解密Key(随机数)
    private $weixin_tiket;
    private $weixin_access_token;
    private $weixin_access_token_time;
    public function __construct() {
        parent::__construct();
        $this->token = $this->common_function->wx_token();
        $this->appid = $this->common_function->wx_appid();
        $this->appsecret = $this->common_function->get_system_value('weixin_appsecret');
        $this->weixin_tiket = $this->common_function->get_system_value('weixin_tiket');
        $this->echostr = $this->common_function->wx_key();
        $this->weixin_access_token_time = $this->common_function->get_system_value('weixin_access_token_time');
    }
    private function get_private(){
    	$this->weixin_access_token = $this->common_function->wx_component_access_token();
    }
    public function valid()
    {
        $echoStr = isset($_GET["echostr"]) ? $_GET["echostr"]: '';
        if ($echoStr) {
            if ($this->checkSignature())
            {
                ob_clean();
                die($echoStr);
            }else{
                die('no access');
            }
             
        }  else {
            if ($this->checkSignature())
            {
                return true;
            }else{
                return false;
            }
             
        }
    }
    private function checkSignature()
    {
        $signature = isset($_GET["signature"])?$_GET["signature"]:'';
        $timestamp = isset($_GET["timestamp"])?$_GET["timestamp"]:'';
        $nonce = isset($_GET["nonce"])?$_GET["nonce"]:'';
        $token=$this->token;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
    
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
    //微信授权事件接受URL(生成$component_verify_ticket)
    /* public function index(){
    	$msg = '';
    	$from_xml = '<xml><ToUserName><![CDATA[toUser]]><\/ToUserName><Encrypt><![CDATA[jHV+j8qDSstfPEkwHAE6XWeOmj6Ed13iTuQ86\/Imj0jAAoEGXn\/HbxKllBXQRHlZWYi40dk8WjsnikYsnce7jbPPUhMCKKXFxVKybhQlDScqNasJixlT\/Qklxlp3ygDujXuHr2Sg6w25r\/UMNPqiFQtp1TOnO\/ysQngB0Y2EchZAN1tYWt1i42QNDtCfEKkSxv3PyFPg5gNO8vgi7yPOVyqzU5vizQ7kO2AV1LQ++hFq2I6QKxbMXBvXiG7Ac9+FVgCSZ3x8oOctPsJvMgzApXGFP+8JQYBucfjUklGrT4x\/F9vTg8wTZCILBs\/od5RpQgSeA00ITwqj+6x9ZiZ5pn5Z1Objfcjq2Oft++3HlDNBox\/phimICsl0FpE5YPlSJpXGVhVaDooH4Bbm9oaOs2MVdOzlYbztvj4LQGoXbLGMB0oab4k7R5793hgRJwmJXQsMmP80r2WDQXO0xykDvA==]]><\/Encrypt><\/xml>';
    	$this->logResult('logs/ticket_msgmsg.log','授权token2：'.json_encode($from_xml));
    	$msg_sign = '4477f0c6eaaef5483c43a35da7d6ffbbb22c77ff';
    	$timeStamp = '1502189154';
    	$nonce = '1830981735';
    	include_once ROOTPATH.'libraries/Wxphp/wxBizMsgCrypt.php';
    	$pc = new WXBizMsgCrypt($this->token, $this->echostr, $this->appid);
    	$errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
    	print_r(date('Y-m-d H:i:s',1501747689));die;
    } */
    public function weixin_auth(){
        $echoStr = $this->common_function->wx_key();
        $timeStamp  = empty($_GET['timestamp'])     ? ""    : trim($_GET['timestamp']) ;
        $nonce      = empty($_GET['nonce'])     ? ""    : trim($_GET['nonce']) ;
        $msg_sign   = empty($_GET['msg_signature']) ? ""    : trim($_GET['msg_signature']) ;
        //$this->logResult('logs/ticket_msgmsg.log','授权接收数据：'.json_encode($_GET));
        if($this->valid() && $echoStr){
            if($msg_sign){
            	//$this->logResult('logs/ticket_msgmsg.log','授权msg_sign：'.json_encode($msg_sign));
                include_once ROOTPATH.'libraries/Wxphp/wxBizMsgCrypt.php';
                $encryptMsg = file_get_contents('php://input');
                //$this->logResult('logs/ticket_msgmsg.log','授权token：'.$this->token.'appid:'.$this->appid.'str:'.$echoStr);
                $pc = new WXBizMsgCrypt($this->token, $echoStr, $this->appid);
                $xml_tree = new DOMDocument();
                $xml_tree->loadXML($encryptMsg);
                $array_e = $xml_tree->getElementsByTagName('Encrypt');
                $encrypt = $array_e->item(0)->nodeValue;
                //$this->logResult('logs/ticket_msgmsg.log','授权token1：'.$this->token.'appid1:'.$this->appid);
                $format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
                $from_xml = sprintf($format, $encrypt);
                // 第三方收到公众号平台发送的消息
                $msg = '';
                //$this->logResult('logs/ticket_msgmsg.log','授权token2：'.json_encode($from_xml));
                $errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
                //$this->logResult('logs/ticket_msgmsg.log','解密');
                if ($errCode == 0) {
                	//$this->logResult('logs/ticket_msgmsg.log','解密后成功');
                	//$this->logResult('logs/ticket_msgmsg.log','解密后成功：sign:'.$msg_sign.';;time:'.$timeStamp.';;nonce:'.$timeStamp.';;xml:'.$from_xml.';;msg:'.$msg);
                    //print("解密后: " . $msg . "\n");
                    $xml = new DOMDocument();
                    $xml->loadXML($msg);
                    $array_e = $xml->getElementsByTagName('ComponentVerifyTicket');
                    $component_verify_ticket = $array_e->item(0)->nodeValue;
                    $this->db->where('code','weixin_tiket')->update('system_config',array('value'=>$component_verify_ticket));
                    $this->logResult('logs/ticket_msgmsg.log','解密后tiket：'.$component_verify_ticket);
                    //$this->logResult('logs/ticket_msgmsg.log','解密后的component_verify_ticket是：'.$component_verify_ticket);
                    echo 'success';
        
                } else {
                    $this->logResult('logs/ticket_msgmsg.log','解密后失败：'.$errCode);
                    echo 'failed';
                }
                
            }
        }
    }
    public function logResult($path,$data){
        file_put_contents(ROOTPATH.$path, '['.date('Y-m-d : H:i:s',time()).']'.$data."\r\n",FILE_APPEND);
    }
/*     //获得第三方component_access_token
    public function get_component_access_token()
    {  
        $component_token = $this->weixin_access_token;
        $component_time = $this->weixin_access_token_time;
        $time = time();
        if(($component_time+5400)<$time||empty($component_token)){
            $component = $this->update_component_access_token();
            return $component;
        }else{
            return $component_token;
        }
    
    }
    //生成第三方component_access_token
    public function update_component_access_token(){
        $url = 'https://api.weixin.qq.com/cgi-bin/component/api_component_token';
        $data = '{
                "component_appid":"'.$this->appid.'" ,
                "component_appsecret": "'.$this->appsecret.'",
                "component_verify_ticket": "'.$this->weixin_tiket.'"
                }';
        $component = $this->weixin_model->https_request($url,$data);
        //$this->logResult('logs/error.log','生成数据token：'.$component.'。');
        $component = object_array(json_decode($component,true));
        $this->db->where('code','weixin_access_token')->update('system_config',array('value'=>$component['component_access_token']));
        $this->db->where('code','weixin_access_token_time')->update('system_config',array('value'=>time()));
        return $component['component_access_token'];
    } */
    //获得预授权码
    public function get_component()
    {
    	$this->get_private();
        $access_token = $this->common_function->get_component_access_token();
        
        $url = 'https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode?component_access_token='.$access_token;
        $data = '{
                "component_appid":"'.$this->appid.'" ,
                }';
        $component = $this->common_function->https_request($url,$data);
        //$this->logResult('logs/error.log','生成数据预授权码：'.$component.'。');
        $component = object_array(json_decode($component,true));
        if(!isset($component['pre_auth_code'])){
            $access_token = $this->common_function->update_component_access_token();
            $url = 'https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode?component_access_token='.$access_token;
            $data = '{
                "component_appid":"'.$this->appid.'" ,
                }';
            $component = $this->common_function->https_request($url,$data);
            $component = object_array(json_decode($component,true));
            if(!isset($component['pre_auth_code'])){
                die;
            }
            return $component;
        }else{
            return $component;
        }
        
    
    }
    
	/*微信授权*/
	public function information_set(){
        $this->common_function->shop_admin_priv("mp_setting");//权限
        $this->get_private();
	    //第一次授权
	    $pre_auth_code = $this->get_component();
	    $redirect_uri = base_url('admin.php').'/weixin/weixin_auth_callback';
	    $url ='https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid='.$this->appid.'&pre_auth_code='.$pre_auth_code['pre_auth_code'].'&redirect_uri='.$redirect_uri;
	    //授权方公众号信息 
	    $weixin_auther_info = $this->common_function->get_system_value('weixin_auther_info');
	    $weixin_auther_info = object_array(json_decode($weixin_auther_info,true));
	    //授权权限信息
	    $weixin_auth_info = $this->common_function->get_system_value('weixin_auth_info');
	    $weixin_auth_info = object_array(json_decode($weixin_auth_info,true));
	    if(!empty($weixin_auth_info['func_info'])){
	        foreach ($weixin_auth_info['func_info'] as $k=>$v){
	            $weixin_auth_info['func_info'][] = $v['funcscope_category']['id'];
	        }
	    }else{
	        $weixin_auth_info['func_info'][] = '';
	    }
	    $service_type = array('0'=>'订阅号','1'=>'老账号升级的订阅号','2'=>'服务号',);
	    $verify_type = array('-1'=>'未认证','0'=>'已认证','1'=>'已认证','2'=>'已认证',
	        '3'=>'资质认证','4'=>'资质认证','5'=>'资质认证',);
	    $this->smarty->assign('weixin_auther_info', $weixin_auther_info);
	    $this->smarty->assign('weixin_auth_info', $weixin_auth_info);
	    $this->smarty->assign('url', $url);
	    $this->smarty->assign('service_type', $service_type);
	    $this->smarty->assign('verify_type', $verify_type);
	    $this->smarty->display ('weixin_auth.html');
      }
      /*从新授权*/
      public function auth_to(){
      	  $this->get_private();
          $access_token = $this->common_function->get_component_access_token();
          $url = 'https://api.weixin.qq.com/cgi-bin/component/api_authorizer_token?component_access_token='.$access_token;
          $weixin_auth_info = $this->common_function->get_system_value('weixin_auth_info');
          $weixin_auth_info = object_array(json_decode($weixin_auth_info,true));
          $auth_appid = $weixin_auth_info['authorizer_appid'];
          $auth_refresh_token = $weixin_auth_info['authorizer_refresh_token'];
          $data = '{
                "component_appid":"'.$this->appid.'" ,
                "authorizer_appid":"'.$auth_appid.'",
                "authorizer_refresh_token":"'.$auth_refresh_token.'",
                }';
          $result = $this->common_function->https_request($url,$data);
          //$this->logResult('logs/error.log','从新授权：'.$data.'|'.$result.'。');
          $result = object_array(json_decode($result,true));
 
          $time = time();
          $this->db->where('code','weixin_refresh_token_time')->update('system_config',array('value'=>$time));
          $this->db->where('code','weixin_refresh_token')->update('system_config',array('value'=>$result['authorizer_refresh_token']));
          $this->db->where('code','weixin_auth_token_time')->update('system_config',array('value'=>$time));
          $this->db->where('code','weixin_auth_token')->update('system_config',array('value'=>$result['authorizer_access_token']));
          //授权账户信息
          $url_info = 'https://api.weixin.qq.com/cgi-bin/component/api_get_authorizer_info?component_access_token='.$access_token;
          $data_info = '{
                "component_appid":"'.$this->appid.'" ,
                "authorizer_appid":"'.$auth_appid.'" ,
                }';
          $result_info = $this->common_function->https_request($url_info,$data_info);
          $result_info = object_array(json_decode($result_info,true));
          $auther_info = $result_info['authorizer_info'];
          $this->db->where('code','weixin_auther_info')->update('system_config',array('value'=>json_encode($auther_info)));
          header("location:".base_url("admin.php/weixin/information_set"));
      }
      /*微信授权回调*/
      public function weixin_auth_callback(){
      	$this->get_private();
          $auth_code = isset($_GET['auth_code'])?$_GET['auth_code']:'';//授权码
          $expires_in = isset($_GET['expires_in'])?$_GET['expires_in']:'';//授权码过期时间
          if($auth_code){
              $access_token = $this->common_function->get_component_access_token();
              $url = 'https://api.weixin.qq.com/cgi-bin/component/api_query_auth?component_access_token='.$access_token;
              $data = '{
                "component_appid":"'.$this->appid.'" ,
                "authorization_code":"'.$auth_code.'" ,
                }';
              $result = $this->common_function->https_request($url,$data);
              $result = object_array(json_decode($result,true));
              $auth_info = $result['authorization_info'];
              $time = time();
              $this->db->where('code','weixin_auth_info')->update('system_config',array('value'=>json_encode($auth_info)));
              $this->db->where('code','weixin_refresh_token_time')->update('system_config',array('value'=>$time));
              $this->db->where('code','weixin_refresh_token')->update('system_config',array('value'=>$auth_info['authorizer_refresh_token']));
              $this->db->where('code','weixin_auth_token_time')->update('system_config',array('value'=>$time));
              $this->db->where('code','weixin_auth_token')->update('system_config',array('value'=>$auth_info['authorizer_access_token']));
              //授权账户信息
              $url_info = 'https://api.weixin.qq.com/cgi-bin/component/api_get_authorizer_info?component_access_token='.$access_token;
              $data_info = '{
                "component_appid":"'.$this->appid.'" ,
                "authorizer_appid":"'.$auth_info['authorizer_appid'].'" ,
                }';
              $result_info = $this->common_function->https_request($url_info,$data_info);
              $result_info = object_array(json_decode($result_info,true));
              $auther_info = $result_info['authorizer_info'];
              $this->db->where('code','weixin_auther_info')->update('system_config',array('value'=>json_encode($auther_info)));
              echo '恭喜你已授权成功！！！';exit;
          }else{
              echo '授权失败！！！';exit;
          }
      }
      /*微信菜单设置*/
	public function menu_management(){
        $this->common_function->shop_admin_priv("mp_menu");//权限
        $this->get_private();
	    $menu = $this->common_function->get_wx_menu();
	    $this->smarty->assign('menu',$menu);
        $this->smarty->display ('weixin_menu_management.html');
      }
    public function menu_submit(){
        $this->common_function->shop_admin_priv("mp_menu");//权限
        $this->get_private();
        $data_post = object_array(json_decode($_POST['data']));
        $data = array();
        $result = array('state'=>false,'msg'=>'设置失败');
        foreach ($data_post as $k=>$v){
            if(isset($v['name'])&&!empty($v['name'])){
                if(isset($v['son'])&&!empty($v['son'])){
                    foreach ($v['son'] as $ka=>$va){
                        if(isset($va['name'])&&!empty($va['name'])){
                            $data[$k]['son'][$ka]['name'] = $va['name'];
                            $data[$k]['son'][$ka]['type'] = isset($va['type'])?$va['type']:1;
                            $data[$k]['son'][$ka]['value'] = isset($va['value'])?$va['value']:'';
                        }
                    }
                }
                $data[$k]['name']= isset($v['name'])?$v['name']:'';
                $data[$k]['type']= isset($v['type'])?$v['type']:1;
                $data[$k]['value']= isset($v['value'])?$v['value']:'';
            }
        }
        //print_r($data);exit;
        if(!empty($data)){
            $sort = 1;$count = count($data);
            $this->db->where('pid',0)->where("sort>$count")->delete('weixin_menu');
            foreach ($data as $k=>$v){
                $arr = array('pid'=>0,'menu_name'=>$v['name'],'menu_type'=>$v['type'],'menu_value'=>$v['value'],'sort'=>$sort);
                $mid = $this->db->select('usm_id')->where('pid',0)->where('sort',$sort)->get('weixin_menu')->row('usm_id');
                if($mid){
                    $this->db->update('weixin_menu',$arr,array('usm_id'=>$mid));
                }else{
                    $this->db->insert('weixin_menu',$arr);
                    $mid = $this->db->insert_id();
                }
                if(isset($v['son'])&&!empty($v['son'])){
                    $son_sort = 1;$son_count = count($v['son']);
                    $this->db->where('pid',$mid)->where("sort>$son_count")->delete('weixin_menu');
                    foreach ($v['son'] as $ka=>$va){
                        $arr = array('pid'=>$mid,'menu_name'=>$va['name'],'menu_type'=>$va['type'],'menu_value'=>$va['value'],'sort'=>$son_sort);
                        $son_mid = $this->db->select('usm_id')->where('pid',$mid)->where('sort',$son_sort)->get('weixin_menu')->row('usm_id');
                        if($son_mid){
                            $this->db->update('weixin_menu',$arr,array('usm_id'=>$son_mid));
                        }else{
                            $this->db->insert('weixin_menu',$arr);
                        }
                        $son_sort++;
                    }
                }else{
                    $this->db->where('pid',$mid)->delete('weixin_menu');
                }
                $sort++;
            }
            $result = array('state'=>true,'msg'=>'设置成功');
            $ch = curl_init();
            $timeout = 5;
            curl_setopt ($ch, CURLOPT_URL, base_url("vmall.php/receive/create_menu"));
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($ch);
            //print_r(strlen($file_contents));exit;
            curl_close($ch); 
            if(strlen($file_contents)>100){
                echo json_encode('设置成功发布失败，请检查设置参数是否正确');exit;
            }
            $start = stripos($file_contents,'"{"');
            $end = strripos($file_contents,'"}"');
            $create_re = substr($file_contents,$start,-1);
            $create_re = trim($create_re,'"');
            //$create_re = json_decode($create_re);
            //header("location:".base_url("admin.php/weixin_set/create_menu"));
            echo($create_re);exit;
        }
        echo json_encode($result);exit;
        //print_r($data);exit;
    }
     
    
    /*微信自动回复设置*/
	public function reply_management(){
        $this->common_function->shop_admin_priv("mp_reply_management");//权限
	    $content = $this->common_function->get_system_value('weixin_guanzhu_content');
	    $this->smarty->assign('content', $content);
	    $contents = $this->common_function->get_system_value('weixin_guanzhu_daogou');
	    $contents = unserialize($contents);
	    $oldcontents = $contents;
	    $content1 = $oldcontents[0];
	    unset($oldcontents[0]);
	    unset($oldcontents[1]);
	    $content2 = $oldcontents;
	    $newcontents =array($content1,$content2);
	    $this->smarty->assign('newcontents', $newcontents);
        $this->smarty->display ('weixin_reply_management.html');
      }
    
    
    public function guanzhu_reply(){
        $content = isset($_POST['content'])?trim($_POST['content']):'';
        if($content){
            $this->db->where('code','weixin_guanzhu_content')->update('system_config',array('value'=>$content));
            echo json_encode(array('state'=>true,'msg'=>'修改成功'));exit;
        }else{
            echo json_encode(array('state'=>false,'msg'=>'请填写回复信息'));exit;
        }
        
    }
    
    //微信设置上传图片
    public function weixin_set_onload(){
      $savePath = './application/admin/views/images/'; // 设置上传路径
      if (!file_exists($savePath) || !is_writable($savePath)) {
            @mkdir($savePath, 0755);
      }
      if(isset($_FILES['loadpic']) && !empty($_FILES['loadpic']['name'])){
          
          $tmp_file = $_FILES ['loadpic'] ['tmp_name'];
          $file_types = explode ( ".", $_FILES ['loadpic'] ['name'] );
          $file_type = $file_types [count ( $file_types ) - 1];
          if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
              $return = array(
                  'state'=>false,
                  'msg'=>"不是图片文件，重新稍后上传"
              );
              echo json_encode($return);
              exit();
          }
          
          $str = date ( 'YmdHis' ) . uniqid ()."_weixin"; // 以时间来命名上传的文件
          $file_name = $str . "." . $file_type; // 是否上传成功
          if (! copy( $tmp_file, $savePath . $file_name )) {
              $return = array(
                  'state'=>false,
                  'msg'=>"图片上传失败，请稍后重新上传"
              );
              echo json_encode($return);
              exit();
          }else{
              $return = array(
                  'state'=>true,
                  'msg'=> $file_name
              );
              echo json_encode($return);
              exit();
          }
          
      }
     

    }


    /*微信自动回复设置__扫描导购二维码*/
    public function weixin_set_daogou(){
        $data = array();
        $newsArray = array();
        $return = array('state'=>false,'msg'=>"设置失败，请稍后重试!");
          if(isset($_POST) && !empty($_POST)){
              foreach ($_POST as $key=>$val){
                  if(stripos($key,"strnum1")!==false){
                      $str = $key;
                      $str = str_replace("strnum1","",$str);
                      $data[1][$str] = $val;
                  }elseif (stripos($key,"strnum2")!==false){
                      $str = $key;
                      $str = str_replace("strnum2","",$str);
                      $data[2][$str] = $val;
                  }elseif (stripos($key,"strnum3")!==false){
                      $str = $key;
                      $str = str_replace("strnum3","",$str);
                      $data[3][$str] = $val;
                  }elseif (stripos($key,"strnum4")!==false){
                      $str = $key;
                      $str = str_replace("strnum4","",$str);
                      $data[4][$str] = $val;
                  }elseif (stripos($key,"strnum5")!==false){
                      $str = $key;
                      $str = str_replace("strnum5","",$str);
                      $data[5][$str] = $val;
                  }elseif (stripos($key,"strnum6")!==false){
                      $str = $key;
                      $str = str_replace("strnum6","",$str);
                      $data[6][$str] = $val;
                  }elseif (stripos($key,"strnum7")!==false){
                      $str = $key;
                      $str = str_replace("strnum7","",$str);
                      $data[7][$str] = $val;
                  }elseif (stripos($key,"strnum8")!==false){
                      $str = $key;
                      $str = str_replace("strnum8","",$str);
                      $data[8][$str] = $val;
                  }
              }
          }
        if(!empty($data)){
            $num = 0;
            foreach ($data as $key =>$val){
                $newsArray[$num]['Title']=$val['Title'];
                $newsArray[$num]['Description']=$val['Description'];
                if($val['Urltype']==1){
                    $newsArray[$num]['Url']=$val['Url'];
                }elseif ($val['Urltype']==2){
                    $newsArray[$num]['Url']= ROOTPATH.'vmall.php/index';
                }elseif ($val['Urltype']==3){
                    $newsArray[$num]['Url']= ROOTPATH.'vmall.php/user/index';
                }elseif ($val['Urltype']==4){
                    $newsArray[$num]['Url']= ROOTPATH.'vmall.php/Store/shopping_guide';
                }elseif ($val['Urltype']==5){
                    $newsArray[$num]['Url']= ROOTPATH.'vmall.php/Order/index';
                }
                if($val['PicUrltype']==1){
                    $newsArray[$num]['PicUrl']="type1";
                }elseif ($val['PicUrltype']==2){
                    $newsArray[$num]['PicUrl']=$val['PicUrl'];
                }
                $num++;
            }
        }
      
        if(!empty($newsArray)){
           $newsArray =  serialize($newsArray);
           $res = $this->db->where('code','weixin_guanzhu_daogou')->update('system_config',array("value"=>$newsArray));
           if($res){
               $return['state']=true;
               $return['msg']="设置成功";
           }
        }
       echo json_encode($return);exit();
    }

    
   
    //微信自动回复设置__还原
    public  function weixin_set_daogouinof(){
        $return = array('state'=>false,'msg'=>"设置失败，请稍后重试!");
        $res = $this->db->where('code','weixin_guanzhu_daogou')->update('system_config',array("value"=>""));
        if($res){
            $return['state']=true;
            $return['msg']="设置成功";
        }
        echo json_encode($return);exit();
    }



}
    