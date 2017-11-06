<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @author lxc  //定时自动刷新微信开放平台token,授权TOKEN
 */
class index extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
    }

     function index() {
        //刷新平台令牌
        $appid = $this->common_function->get_system_value('weixin_appid');
        $appsecret = $this->common_function->get_system_value('weixin_appsecret');
        $tiket = $this->common_function->get_system_value('weixin_tiket');
        $url = 'https://api.weixin.qq.com/cgi-bin/component/api_component_token';
        $data = '{
            "component_appid":"'.$appid.'" ,
            "component_appsecret": "'.$appsecret.'",
            "component_verify_ticket": "'.$tiket.'"
            }';
        $component = $this->https_request($url,$data);
        //$this->logResult('logs/error.log','生成数据token：'.$component.'。');
        $component = object_array(json_decode($component,true));
        $this->db->where('code','weixin_access_token')->update('system_config',array('value'=>$component['component_access_token']));
        $this->db->where('code','weixin_access_token_time')->update('system_config',array('value'=>time()));
    
        //刷新授权令牌
        $component_access_token = $component['component_access_token'];
        $refresh_token_time = $this->common_function->get_system_value('weixin_refresh_token_time');
        $refresh_token = $this->common_function->get_system_value('weixin_refresh_token');
        $auth_info = $this->common_function->get_system_value('weixin_auth_info');
        $auth_info = object_array(json_decode($auth_info,true));
        $auth_appid = $auth_info['authorizer_appid'];
        if($refresh_token){
            $url = 'https://api.weixin.qq.com/cgi-bin/component/api_authorizer_token?component_access_token='.$component_access_token;
            $data = '{
            "component_appid":"'.$appid.'" ,
            "authorizer_appid":"'.$auth_appid.'",
            "authorizer_refresh_token":"'.$refresh_token.'",
            }';
            $result = $this->https_request($url,$data);
            $result = object_array(json_decode($result,true));
            $time = time();
            $this->db->where('code','weixin_refresh_token_time')->update('system_config',array('value'=>$time));
            $this->db->where('code','weixin_refresh_token')->update('system_config',array('value'=>$result['authorizer_refresh_token']));
            $this->db->where('code','weixin_auth_token_time')->update('system_config',array('value'=>$time));
            $this->db->where('code','weixin_auth_token')->update('system_config',array('value'=>$result['authorizer_access_token']));
            $this->access_token = $result['authorizer_access_token'];
        }else{
            die;
        }
        
        
	}
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
	        die;
	    }
	    return $output;
	}
	public function logResult($path,$data){
	    file_put_contents(ROOTPATH.$path, '['.date('Y-m-d : H:i:s',time()).']'.$data."\r\n",FILE_APPEND);
	}
}
