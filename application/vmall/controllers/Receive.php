<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ROOTPATH.'libraries/Wxphp/wxBizMsgCrypt.php';//消息加解密
class Receive extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    private $token;//token
    private $appid;//第三方Appid
    private $auth_appid;//授权方Appid
    private $auth_token;//授权方token
    private $access_token;//授权方token
    private $component_access_token;//平台令牌
    private $AESKey;//随机数
    public function __construct() {
        parent::__construct();
       $this->load->model('weixin_model');
       $this->token = $this->common_function->wx_token();
       $this->appid = $this->common_function->wx_appid();
       $this->auth_appid = $this->common_function->wx_auth_appid();
       $this->auth_token = $this->common_function->wx_auth_token();
       $this->access_token = $this->common_function->wx_auth_token();
       $this->component_access_token = $this->common_function->wx_component_access_token();
       $this->AESKey = $this->common_function->wx_key();
    }
    //接口入口
    public function index()
    {
        $echoStr = isset($_GET["echostr"]) ? $_GET["echostr"]: '';//微信服务器GET方式发送的随机字符串
        $timeStamp  = empty($_GET['timestamp'])     ? ""    : trim($_GET['timestamp']) ;
        $nonce      = empty($_GET['nonce'])     ? ""    : trim($_GET['nonce']) ;
        $msg_sign   = empty($_GET['msg_signature']) ? ""    : trim($_GET['msg_signature']) ;
        if($this->valid() && $echoStr){
            //$this->db->insert('user_download_info',array('user_id'=>2,'dlname'=>'第一次标记'.$echoStr));
            //第一次接入微信api验证
            ob_clean();
            echo $echoStr;
            exit;
        }else{
            //消息，事件响应
            $this->reponsmMsg();
            //die('no access');
        }
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
    public function reponsmMsg(){
    //获取微信推送的XML数据包
        $postStr = isset($GLOBALS["HTTP_RAW_POST_DATA"])?$GLOBALS["HTTP_RAW_POST_DATA"]:'';
        if (!empty($postStr)){
            
            
            $encryptMsg = $postStr;
            $timeStamp  = empty($_GET['timestamp'])     ? ""    : trim($_GET['timestamp']) ;
            $nonce      = empty($_GET['nonce'])     ? ""    : trim($_GET['nonce']) ;
            $msg_sign   = empty($_GET['msg_signature']) ? ""    : trim($_GET['msg_signature']) ;
            $pc = new WXBizMsgCrypt($this->token, $this->AESKey, $this->appid);
            // 第三方收到公众号平台发送的消息
            $xml_tree = new DOMDocument();
            $xml_tree->loadXML($encryptMsg);
            $array_e = $xml_tree->getElementsByTagName('Encrypt');
            $encrypt = $array_e->item(0)->nodeValue;
            $format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
            $from_xml = sprintf($format, $encrypt);
            $msg = '';
            $errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $postStr, $msg);
            if ($errCode == 0) {
                //将XML数据转化为对象
                $postObj = simplexml_load_string($msg, 'SimpleXMLElement', LIBXML_NOCDATA);
                //消息类型分离 获取不同的数据作不同的逻辑代码处理
                $RX_TYPE = trim($postObj->MsgType);
                switch ($RX_TYPE)
                {
                    case "event":
                        $result = $this->receiveEvent($postObj);
                        break;
                    case "text":
                        if (strstr($postObj->Content, "第三方")){
                            //$result = $this->relayPart3("http://www.fangbei.org/test.php".'?'.$_SERVER['QUERY_STRING'], $postStr);
                        }else{
                            $result = $this->receiveText($postObj);
                        }
                        break;
                    case "image":
                        $result = $this->receiveImage($postObj);
                        break;
                    case "location":
                        $result = $this->receiveLocation($postObj);
                        break;
                    case "voice":
                        $result = $this->receiveVoice($postObj);
                        break;
                    case "video":
                        $result = $this->receiveVideo($postObj);
                        break;
                    case "link":
                        $result = $this->receiveLink($postObj);
                        break;
                    default:
                        $result = "unknown msg type: ".$RX_TYPE;
                        break;
                }
                //$this->logger("T \r\n".$result);
                echo $result;
                //echo 'success';
            
            } else {
                $this->logResult('logs/error.log','解密后失败：'.$errCode);
                echo 'failed';
            }
            
        }else {
            //抓取数据为空，不作回复；
            echo "";
            exit;
        }
         
    }
    public function delFileUnderDir( $dirName )
    {
        if ( $handle = opendir( "$dirName" ) ) {
            while ( false !== ( $item = readdir( $handle ) ) ) {
                if ( $item != "." && $item != ".." ) {
                    if ( is_dir( "$dirName/$item" ) ) {
                        
                        $this->delFileUnderDir( "$dirName/$item" );
                    } else {
                        @unlink( "$dirName/$item" );
                    }
                 }else{
                     if ( is_dir( "$dirName/$item" ) ) {
                       @rmdir("$dirName/$item");
                     }
                 }
             }
                closedir( $handle );
        }
    }
    //批量下载二维码
    public function download_much(){
        $op = isset($_GET['op'])?trim($_GET['op']):'';
        $id = isset($_POST['id'])?trim($_POST['id']):'';
        if(empty($id)){
            $id = isset($_GET['id'])?trim($_GET['id']):'';
        }
        if(!empty($id)){
            $code_arr = $this->db->select('store_id,ous_ewm')->where("store_id IN ($id)")->get('store')->result_array();
        }else{
            if(!empty($op)&&$op=='stop'){
                $code_arr = $this->db->select('store_id,ous_ewm')->where('store_state!=1')->get('store')->result_array();
            }else{
                $code_arr = $this->db->select('store_id,ous_ewm')->where('store_state',1)->get('store')->result_array();
            }
            
        }
        //print_r($code_arr);exit;
        $dir = isset($dir) ? $dir : './data/two_code/';
        $dir_temporary = isset($dir_temporary) ? $dir_temporary : './data/temporary/';//临时文件夹
        if(!file_exists($dir_temporary)){
            @mkdir ( $dir_temporary, 0777, true );
        }else{
            $this->delFileUnderDir($dir_temporary);
        }
        $dir_sev = isset($dir_sev) ? $dir_sev : $dir_temporary.'two_code_sev/';//建立临时文件夹
        $dir_sev_download = isset($dir_sev_download) ? $dir_sev_download : $dir_temporary.'two_code_'.date('Ymd') . '.zip';//下载文件
        if(!file_exists($dir_sev)){
            @mkdir ( $dir_sev, 0777, true );
        }
        foreach ($code_arr as $k=>$v){
            $filename1='qrcode_'.$v['store_id'].'.png';
            $filename=$dir.$filename1;
            if(!empty($v['ous_ewm'])&&$v['ous_ewm']==$filename&&file_exists($filename)){
                @copy($filename,$dir_sev.$filename1);
            }else{
                $url ='https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$this->access_token;
                $data = '{
                "action_name": "QR_LIMIT_SCENE",
                "action_info": {"scene": {"scene_id": "'.$v['store_id'].'"}}
                }';
                $result_info = $this->common_function->https_request($url,$data);
                $result_info = object_array(json_decode($result_info,true));
                //$this->db->where('code','test_data')->update('system_config',array('value'=>json_encode($result_info)));
                $tiket = $result_info['ticket'];
                $tiket_url = $result_info['url'];
                $url_t ='https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.UrlEncode($tiket);
                $imginfo = $this->downloadweixinimg($url_t);
                $loacal_fiel = fopen($filename,'w');
                if($loacal_fiel!==false){
                    if(fwrite($loacal_fiel, $imginfo['body'])!==false){
                        $this->db->where('store_id',$v['store_id'])->update('store',array('ous_ewm'=>$filename));
                        fclose($loacal_fiel);
                        //header("location:".base_url($filename));
                        @copy($filename,$dir_sev.$filename1);
                    }
                }
            }
        }
        $result = array('state'=>false,'msg'=>'下载失败，请重试');
        //include_once('includes/cls_phpzip.php');
        $this->load->library('phpzip');
        $done = $this->phpzip->zip($dir_sev, $dir_sev_download);
        if ($done)
        {
            
            $result = array('state'=>true,'msg'=>'下载完成','data'=>base_url($dir_sev_download));
            echo json_encode($result);exit;
        }
        else
        {
            $result = array('state'=>false,'msg'=>'下载失败，请重试');
            echo json_encode($result);exit;
        }
    }
    public function downfile($filename,$filename1)
    {
        Header( "Content-type:  application/octet-stream ");
        Header( "Accept-Ranges:  bytes ");
        Header( "Accept-Length: " .filesize($filename));
        header( "Content-Disposition:  attachment;  filename=".$filename1);
        echo file_get_contents($filename);
        readfile($filename);
    }
    //门店二维码
    public function create_code(){
        ob_end_clean();
        $id = isset($_GET['id'])?trim($_GET['id']):'';
        $dir = isset($dir) ? $dir : './data/two_code/';
        $filename=$dir.'qrcode_'.$id.'.png';
        $filecode = $this->db->select('ous_ewm')->where('store_id',$id)->get('store')->row('ous_ewm');
        if(!empty($filecode)&&$filecode==$filename&&file_exists($filename)){
            $filename1 = 'qrcode_'.$id.'.png';
            /* header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=".$filename1);
            $data = file_get_contents(base_url($filename));
            echo $data;exit; */
            //print_r(base_url($filename));die;
            header('Content-Type: image/png');
            header('Content-Disposition: attachment;filename="'.$filename1);
            header('Content-length: '.filesize($filename));
            header('Cache-Control: max-age=0');
            //echo file_get_contents(base_url($filename));
            readfile($filename);
            exit;
        }else{
            $url ='https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$this->access_token;
            $data = '{
                "action_name": "QR_LIMIT_SCENE",
                "action_info": {"scene": {"scene_id": "'.$id.'"}}
                }';
            $result_info = $this->common_function->https_request($url,$data);
            $result_info = object_array(json_decode($result_info,true));
            //$this->db->where('code','test_data')->update('system_config',array('value'=>json_encode($this->access_token)));
            $tiket = $result_info['ticket'];
            $tiket_url = $result_info['url'];
            $url_t ='https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.UrlEncode($tiket);
            $imginfo = $this->downloadweixinimg($url_t);
            $loacal_fiel = fopen($filename,'w');
            if($loacal_fiel!==false){
                if(fwrite($loacal_fiel, $imginfo['body'])!==false){
                    $this->db->where('store_id',$id)->update('store',array('ous_ewm'=>$filename));
                    fclose($loacal_fiel);
                    //header("location:".base_url($filename));
                    if($filename){
                        $filename1 = 'qrcode_'.$id.'.png';
                        /* header("Content-Type: application/force-download");
                        header("Content-Disposition: attachment; filename=".$filename1);
                        $data = file_get_contents(base_url($filename));
                        echo $data;exit; */
                        //print_r(base_url($filename));die;
                        header('Content-Type: image/png');
                        header('Content-Disposition: attachment;filename="'.$filename1);
                        header('Content-length: '.filesize($filename));
                        header('Cache-Control: max-age=0');
                        //echo file_get_contents(base_url($filename));
                        readfile($filename);
                        exit;
                    }
                }
            }
        }
       
        /* $data = array('state'=>true,'msg'=>'','data'=>$url_t);
        echo json_encode($data);exit; */
    }
    
    
    
    
    //门店活动二维码(临时)
    public function create_code_activity(){
        ob_end_clean();
        $id = isset($_GET['id'])?trim($_GET['id']):'';//门店Id
        $act_id = isset($_GET['act_id'])?trim($_GET['act_id']):'';//活动Id
        $type = isset($_GET['type'])?trim($_GET['type']):'';//活动类型    1 大转盘  2 微砍价
        $goods_id= '';
        if($type==2){
            $goods_id = $this->db->select('goods_id')->from('shop_p_bargain')->where('bargain_id',$act_id)->where('store_id',$id)->get()->row('goods_id');
        }else{
            $goods_id = $this->db->select('goods_id')->from('shop_p_lottery_wheel')->where('wheels_id',$act_id)->where('store_id',$id)->get()->row('goods_id');
        }
        if($type==3){
            $goods_id= 1 ;
        }
        $str_id = 's_'.$id.'|'.$act_id.'|'.$type.'|'.$goods_id;
        //$this->db->insert('system_config',array('code'=>'subscribe_str_id','value'=>date('H:i:s',time())."||".$str_id));
        $dir = isset($dir) ? $dir : './data/two_code/';
        $filename=$dir.'qrcode_act_'.$id.'.png';
        $url ='https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$this->access_token;
        $data = '{
            "expire_seconds": 300,
            "action_name": "QR_STR_SCENE",
            "action_info": {"scene": {"scene_str": "'.$str_id.'"}}
            }';
        $result_info = $this->common_function->https_request($url,$data);
        //$this->db->insert('system_config',array('code'=>'result_info','value'=>date('H:i:s',time())."||".json_encode($result_info)));
        $result_info = object_array(json_decode($result_info,true));
        $tiket = $result_info['ticket'];
        $tiket_url = $result_info['url'];
        $url_t ='https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.UrlEncode($tiket);
        $imginfo = $this->downloadweixinimg($url_t);
        $loacal_fiel = fopen($filename,'w');
        $result = array('state'=>false,'msg'=>'下载失败','data'=>'');
        if($loacal_fiel!==false){
            if(fwrite($loacal_fiel, $imginfo['body'])!==false){
                fclose($loacal_fiel);
                $result = array('state'=>true,'msg'=>'下载完成','data'=>$filename);
            }
        }
        echo json_encode($result);exit;
    }
    
    
    
    /*导购二维码（临时）*/
    public function create_shot_code(){
        ob_end_clean();
        $id = isset($_GET['id'])?trim($_GET['id']):'';
        $dir = isset($dir) ? $dir : './data/two_code_short/';
        $filename=$dir.'guide_qrcode_'.$id.'.png';
        $filecode = $this->db->select('spg_ewm')->where('spg_id',$id)->get('store_shopping_guide')->row('spg_ewm');
        if(!empty($filecode)&&$filecode==$filename&&file_exists($filename)){
            $filename1 = 'guide_qrcode_'.$id.'.png';
            header('Content-Type: image/png');
            header('Content-Disposition: attachment;filename="'.$filename1);
            header('Content-length: '.filesize($filename));
            header('Cache-Control: max-age=0');
            //echo file_get_contents(base_url($filename));
            readfile($filename);
            exit;
        }else{
            $url ='https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$this->access_token;
            $data = '{
                "action_name": "QR_LIMIT_SCENE",
                "action_info": {"scene": {"scene_id": "'.($id+10000).'"}}
                }';
            $result_info = $this->common_function->https_request($url,$data);
            $result_info = object_array(json_decode($result_info,true));
            //$this->db->where('code','test_data')->update('system_config',array('value'=>json_encode($this->access_token)));
            $tiket = $result_info['ticket'];
            $tiket_url = $result_info['url'];
            $url_t ='https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.UrlEncode($tiket);
            $imginfo = $this->downloadweixinimg($url_t);
            $loacal_fiel = fopen($filename,'w');
            if($loacal_fiel!==false){
                if(fwrite($loacal_fiel, $imginfo['body'])!==false){
                    $this->db->where('spg_id',$id)->update('store_shopping_guide',array('spg_ewm'=>$filename));
                    fclose($loacal_fiel);
                    //header("location:".base_url($filename));
                    if($filename){
                        $filename1 = 'guide_qrcode_'.$id.'.png'; 
                        header('Content-Type: image/png');
                        header('Content-Disposition: attachment;filename="'.$filename1);
                        header('Content-length: '.filesize($filename));
                        header('Cache-Control: max-age=0');
                        //echo file_get_contents(base_url($filename));
                        readfile($filename);
                        exit;
                    }
                }
            }
        }
    }
    //批量下载临时二维码(导购)-》永久
    public function download_much_short(){
        $id = isset($_POST['id'])?trim($_POST['id']):'';
        if(empty($id)){
            $id = isset($_GET['id'])?trim($_GET['id']):'';
        }
        
        if(!empty($id)){
            $code_arr = $this->db->select('spg_id,spg_ewm')->where("spg_id IN ($id)")->get('store_shopping_guide')->result_array();
        }else{
            $code_arr = $this->db->select('spg_id,spg_ewm')->get('store_shopping_guide')->result_array();
        }
        //print_r($code_arr);exit;
        $dir = isset($dir) ? $dir : './data/two_code_short/';
        $dir_temporary = isset($dir_temporary) ? $dir_temporary : './data/temporary_short/';//临时文件夹
        if(!file_exists($dir_temporary)){
            @mkdir ( $dir_temporary, 0777, true );
        }else{
            $this->delFileUnderDir($dir_temporary);
        }
        $dir_sev = isset($dir_sev) ? $dir_sev : $dir_temporary.'two_code_sev/';//建立临时文件夹
        $dir_sev_download = isset($dir_sev_download) ? $dir_sev_download : $dir_temporary.'two_code_'.date('Ymd') . '.zip';//下载文件
        if(!file_exists($dir_sev)){
            @mkdir ( $dir_sev, 0777, true );
        }
        foreach ($code_arr as $k=>$v){
            $filename1='guide_qrcode_'.$v['spg_id'].'.png';
            $filename=$dir.$filename1;
            if(!empty($v['spg_ewm'])&&$v['spg_ewm']==$filename&&file_exists($v['spg_ewm'])){
                @copy($v['spg_ewm'],$dir_sev.$filename1);
            }else{
                $url ='https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$this->access_token;
                $data = '{
                "action_name": "QR_LIMIT_SCENE",
                "action_info": {"scene": {"scene_id": "'.($v['spg_id']+10000).'"}}
                }';
                $result_info = $this->common_function->https_request($url,$data);
                $result_info = object_array(json_decode($result_info,true));
                //$this->db->where('code','test_data')->update('system_config',array('value'=>json_encode($result_info)));
                $tiket = $result_info['ticket'];
                $tiket_url = $result_info['url'];
                $url_t ='https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.UrlEncode($tiket);
                $imginfo = $this->downloadweixinimg($url_t);
                $loacal_fiel = fopen($filename,'w');
                if($loacal_fiel!==false){
                    if(fwrite($loacal_fiel, $imginfo['body'])!==false){
                        $this->db->where('spg_id',$v['spg_id'])->update('store_shopping_guide',array('spg_ewm'=>$filename));
                        fclose($loacal_fiel);
                        //header("location:".base_url($filename));
                        @copy($filename,$dir_sev.$filename1);
                    }
                }
            } 
        }
        $result = array('state'=>false,'msg'=>'下载失败，请重试');
        //include_once('includes/cls_phpzip.php');
        $this->load->library('phpzip');
        $done = $this->phpzip->zip($dir_sev, $dir_sev_download);
        if ($done)
        {
    
            $result = array('state'=>true,'msg'=>'下载完成','data'=>base_url($dir_sev_download));
            echo json_encode($result);exit;
        }
        else
        {
            $result = array('state'=>false,'msg'=>'下载失败，请重试');
            echo json_encode($result);exit;
        }
    }
    public function get_photo($url,$filename='',$savefile='./')
        {
            $imgArr = array('gif','bmp','png','ico','jpg','jepg');
        
            if(!$url) return false;
        
            if(!$filename) {
                $ext='png';
                if(!in_array($ext,$imgArr)) return false;
                $filename=date("dMYHis").'.'.$ext;
            }
        
            if(!is_dir($savefile)) mkdir($savefile, 0777);
            if(!is_readable($savefile)) chmod($savefile, 0777);
        
            $filename = $savefile.$filename;
        
            ob_start();
            readfile($url);
            $img = ob_get_contents();
            ob_end_clean();
            $size = strlen($img);
        
            $fp2=@fopen($filename, "a");
            fwrite($fp2,$img);
            fclose($fp2);
        
            return $filename;
        }
    //下载微信得来的二维码
    public function downloadweixinimg($url){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_NOBODY, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        $httpinfo = curl_getinfo($curl);
        curl_close($curl);
        $array1 = array('body'=>$output);
        $array2 = array('header'=>$httpinfo);
        return array_merge($array1,$array2);
    }
    
    
    
    
    //获取微信模板列表
    public function weixin_msg_template(){
        $url = "https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token=".$this->access_token;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = object_array(json_decode($result,true));
        $arry=array();
        if($result['template_list']){
            foreach ($result['template_list'] as $key=>$val){
                $template = $this->db->select('template_id')->where('template_id',$val['template_id'])->get('weixin_notify_templates')->row('template_id');
                if(!$template){
                    $data['template_id'] = $val['template_id'];
                    $data['template_title'] = $val['title'];
                    $data['template_content'] = str_replace(PHP_EOL,'',$val['content']); 
                    $data['template_example'] = str_replace(PHP_EOL,'',$val['example']); 
                    $this->db->insert('weixin_notify_templates',$data);
                }
                $arry[$key] = $val['template_id'];
            }
            $res = $this->db->query("select id,template_id from {$this->db->dbprefix('weixin_notify_templates')}") ->result_array();
            foreach ($res as $k=>$v){
                if(!in_array($v['template_id'],$arry)){
                    $this->db->where("id",$v['id']);
                    $this->db->delete('weixin_notify_templates');
                }
            }
        }
        
        
      
    }
    
    //发送微信模板消息
    public function weixin_send_msg(){
        $data = isset($_POST) ? $_POST:false;
        $data['data'] = json_decode($data['data'],true);
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$this->access_token;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);
        //$result = object_array(json_decode($result,true));
        echo json_encode($result);exit;
    }
    
    
    
    
    
    //定义自定义菜单
    public  function  create_menu(){
        $this->lang->load('wxcode');
        $lang = $this->lang->line('link');
        $menu = $this->common_function->get_wx_menu();
        $usrinfo_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->auth_appid.
            '&redirect_uri='.UrlEncode("http://www.jukeyunduan.com/vmall.php/user/get_openid").'&response_type=code&scope=snsapi_base&state=123&component_appid='.$this->appid.'#wechat_redirect';
        $jsonmenu = ' {
            "button": [';
        $kk=1;
        foreach ($menu as $k=>$v){
            if(empty($v['son'])){
                if(empty($v['menu_value'])){
                    $url = $lang[$v['menu_type']];
                    $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->auth_appid.
                    '&redirect_uri='.UrlEncode($url).'&response_type=code&scope=snsapi_base&state=123&component_appid='.$this->appid.'#wechat_redirect';
                }else{
                    $url = $v['menu_value'];
                }
                if($kk!=1){
                    $jsonmenu .= ',';
                }
                $jsonmenu .= '
                {
                        "type":"view",
                        "name":"'.$v['menu_name'].'",
                        "url":"'.$url.'"
                }';
                
                
            }else{
                $ii = 1;
                if($kk!=1){
                    $jsonmenu .= ',';
                }
                $jsonmenu .=' 
                {
                    "name":"'.$v['menu_name'].'",
                    "sub_button": [';
                foreach ($v['son'] as $ka=>$va){
                    if(empty($va['menu_value'])){
                        $url = $lang[$va['menu_type']];
                        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->auth_appid.
                        '&redirect_uri='.UrlEncode($url).'&response_type=code&scope=snsapi_base&state=123&component_appid='.$this->appid.'#wechat_redirect';
                    }else{
                        $url = $va['menu_value'];
                    }
                    if($ii==1){
                        $jsonmenu .='
                        {
                            "type":"view",
                            "name":"'.$va['menu_name'].'",
                            "url":"'.$url.'"
                        }';
                    }else{
                        $jsonmenu .=',
                        {
                            "type":"view",
                            "name":"'.$va['menu_name'].'",
                            "url":"'.$url.'"
                        }';
                    }
                    $ii++;
                }
                $jsonmenu .= '] 
                }';
                
            }
            $kk++;
        }
        $jsonmenu .= '] 
        }';
        //print_r($jsonmenu);exit;
        $jsonmenu1 = '{
                         "button":[
                         {
                               "name":"生活帮助",
                               "sub_button":[
                                {
                                   "type":"view",
                                   "name":"关注二维码",
                                   "url":"http://www.soso.com/"
                                },
                                {
                                   "type":"click",
                                   "name":"公交查询",
                                   "key":"gongJiao"
                                },
                                {
                                   "type":"click",
                                   "name":"翻译",
                                   "key":"fanYi"
                                }]
                          },
                          {
                               "name":"商城",
                               "sub_button":[
                                {
                                   "type":"view",
                                   "name":"商城首页",
                                   "url":"http://www.baidu.com/"
                                },
                                {
                                   "type":"view",
                                   "name":"个人中心",
                                   "url":"'.$usrinfo_url.'"
                                },
                                {
                                   "type":"view",
                                   "name":"我的订单",
                                   "url":"http://www.baidu.com/"
                                },
                                {
                                   "type":"view",
                                   "name":"活动中心",
                                   "url":"http://www.soso.com/"
                                }]
                           },
                           {
                        	   "name":"其他服务",
                               "sub_button":[
                                {
                                   "type":"view",
                                   "name":"微信登录",
                                   "url":"'.base_url('index.php/order/order_management').'"
                                },
                                {
                                   "type":"click",
                                   "name":"附近门店",
                                   "key":"nearstore"
                                },
                                {
                                   "type":"click",
                                   "name":"app下载",
                                   "key":"appdownload"
                                },
                                {
                                   "type":"click",
                        		   "name":"联系我们",
                        		   "key":"contact"
                                },
                                ]
                               
                           }]
                        }';
        //print_r($jsonmenu);print_r('</br>'.$jsonmenu1);exit;
		$access_token = $this->access_token;
		$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
		$result = $this->common_function->https_request($url, $jsonmenu);
		var_dump($result);//添加自定义菜单需要在浏览器运行该方法 可以查看微信服务器返回的结果
    }
    //删除菜单
    public function del_menu(){
        $access_token = $this->access_token;
        $url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$access_token;
        $result = $this->common_function->https_request($url);
        var_dump($result);//删除自定义菜单需要在浏览器运行该方法 可以查看微信服务器返回的结果
    }
    //查询菜单
    public function get_menu(){
        $access_token = $this->access_token;
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$access_token;
        $result = $this->common_function->https_request($url);
        var_dump($result);//删除自定义菜单需要在浏览器运行该方法 可以查看微信服务器返回的结果
    }
    //接受文本信息逻辑处理
    public function receiveText($postObj){
        $keyword = trim($postObj->Content);
        $this->db->where('code','test_data1')->update('system_config',array('value'=>date('ymd his').$keyword));
        if($keyword=='1'){ $contentStr='你吃饭了吗？';  }
        elseif($keyword=="2"){$contentStr="该睡觉了。";}
        elseif($keyword=="3"){$contentStr="早上好";}
        elseif($keyword=="4"){$contentStr="下午好";}
        elseif($keyword=="5"){$contentStr="晚上好";}
        elseif($keyword=="6"){$contentStr="需要休息了，暂时不回复。";}
        elseif($keyword=="7"){$contentStr="请问有什么帮忙的？";}
        elseif($keyword=="8"){$contentStr="欢迎进入云聚客微信公众号！！";}
        else{$contentStr = "欢迎进入云聚客微信公众号！！";}
        //$this->db->where('code','test_data2')->update('system_config',array('value'=>date('ymd his').$contentStr));
        $result = $this->transmitText($postObj, $contentStr);
        return $result;
    }
    
    //接受事件逻辑处理
    public function receiveEvent($postObj){
        $content = "";
        //判断事件类型
        switch ($postObj->Event)
        {
            //关注公众号  ||  扫描带参数二维码事件-用户未关注时的事件推送
            case "subscribe":
                 if(empty($postObj->EventKey)){
                    $EventKey = false;
                    $content  = $this->common_function->get_system_value('weixin_guanzhu_content');
                }else{
                    $EventKey = $postObj->EventKey;
                    //$this->db->insert('system_config',array('code'=>'subscribe1','value'=>date('H:i:s',time()).$EventKey));
                    $res = $this->common_function->get_scene_buy_EventKey($EventKey);
                    if($res && $res['scene_id']==2){
                        $content  = $this->common_function->get_weixin_guanzhu_daogou($res['true_id']);
                    }elseif($res && $res['scene_id']==3){//关注公众号  扫描门店活动二维码  s_61|a_11|t_2|g_21819
                        //$this->db->insert('system_config',array('code'=>'subscribe2','value'=>date('H:i:s',time()).$res['true_id']));
                        $content  = $this->common_function->get_weixin_guanzhu_store($res['true_id']);
                        //$this->db->insert('system_config',array('code'=>'subscribe_content','value'=>serialize( $content)));
                    }else{
                        $content  = $this->common_function->get_weixin_guanzhu_dianpu($res['true_id']);
                    }
                  
                }
                $this->weixin_model->get_Userinfo($this->auth_token,$postObj->FromUserName,$EventKey);
                
                break;
                //取消关注公众号
            case "unsubscribe":
                $this->weixin_model->get_Userinfo($this->auth_token,$postObj->FromUserName,false,true);
                $this->db->where('wx_openid', $postObj->FromUserName);
                $this->db->update('user', array("is_follow"=>0,"ecgustore_id"=>"","ecstore_id"=>"","ecshopping_guide_id"=>""));
                $content = "取消关注";
                break;
                //点击菜单拉取消息时的事件推送
            case "CLICK":
                switch ($postObj->EventKey)
                {
                    case "contact":
                        $content = array();
                        $content[] = array("Title"=>"云聚客", "Description"=>"", "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg", "Url" =>"http://m.cnblogs.com/?u=txw1958");
                        break;
                    default:
                        $content = "点击菜单：".$postObj->EventKey;
                        break;
                }
                break;
                //点击菜单跳转链接时的事件推送
            case "VIEW":
                $content = "跳转链接 ".$postObj->EventKey;
                break;
        
                //扫描带参数二维码事件-用户已关注时的事件推送
            case "SCAN":
                $this->weixin_model->get_Userinfo($this->auth_token,$postObj->FromUserName,$postObj->EventKey);
                $res = $this->common_function->get_scene_buy_EventKey($postObj->EventKey);
                if($res && $res['scene_id']==2){
                    $content  = $this->common_function->get_weixin_guanzhu_daogou($res['true_id']);
                }elseif($res && $res['scene_id']==3){
                    $content  = $this->common_function->get_weixin_guanzhu_store($res['true_id']);
                }else{
                    $content  = $this->common_function->get_weixin_guanzhu_dianpu($res['true_id']);
                }
                break;
                //上报地理位置事件
            case "LOCATION":
                $this->weixin_model->get_Location($postObj->FromUserName,$postObj->Latitude,$postObj->Longitude);
                $content = "LOCATION";
                break;
                //扫码推事件且弹出“消息接收中”提示框的事件推送
            case "scancode_waitmsg":
                if ($postObj->ScanCodeInfo->ScanType == "qrcode"){
                    $content = "扫码带提示：类型 二维码 结果：".$postObj->ScanCodeInfo->ScanResult;
                }else if ($postObj->ScanCodeInfo->ScanType == "barcode"){
                    $codeinfo = explode(",",strval($postObj->ScanCodeInfo->ScanResult));
                    $codeValue = $codeinfo[1];
                    $content = "扫码带提示：类型 条形码 结果：".$codeValue;
                }else{
                    $content = "扫码带提示：类型 ".$postObj->ScanCodeInfo->ScanType." 结果：".$postObj->ScanCodeInfo->ScanResult;
                }
                break;
            case "scancode_push":
                $content = "扫码推事件";
                break;
            case "pic_sysphoto":
                $content = "系统拍照";
                break;
            case "pic_weixin":
                $content = "相册发图：数量 ".$postObj->SendPicsInfo->Count;
                break;
            case "pic_photo_or_album":
                $content = "拍照或者相册：数量 ".$postObj->SendPicsInfo->Count;
                break;
            case "location_select":
                $content = "发送位置：标签 ".$postObj->SendLocationInfo->Label;
                break;
            default:
                $content = "receive a new event: ".$postObj->Event;
                break;
        }
        
        if(is_array($content)){
            if (isset($content[0]['PicUrl'])){
                //回复图文消息
                $result = $this->transmitNews($postObj, $content);
            }else if (isset($content['MusicUrl'])){
                //回复音乐消息
                $result = $this->transmitMusic($postObj, $content);
            }
        }else{
            //回复文本消息
            if($content=='LOCATION'){
                $result = 'success';
            }else{
                $result = $this->transmitText($postObj, $content);
            }
            
        }
        return $result;
    }
    //接受图像逻辑处理
    public function receiveImage($postObj){
    
    }
    //接受地理位置逻辑处理
    public function receiveLocation($postObj){
    
    }
    //接受音频逻辑处理
    public function receiveVoice($postObj){
    
    }
    //接受视频逻辑处理
    public function receiveVideo($postObj){
    
    }
    //接受链接逻辑处理
    public function receiveLink($postObj){
    
    }
    //回复文本消息
    public function transmitText($object, $content)
    {
        if (!isset($content) || empty($content)){
            return "";
        }
    
        $xmlTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    </xml>";
        $result = sprintf($xmlTpl,$object->FromUserName, $object->ToUserName,  time(), $content);
        $timeStamp  = empty($_GET['timestamp'])     ? ""    : trim($_GET['timestamp']) ;
        $nonce      = empty($_GET['nonce'])     ? ""    : trim($_GET['nonce']) ;
        $msg_sign   = empty($_GET['msg_signature']) ? ""    : trim($_GET['msg_signature']) ;
        $rep = new WXBizMsgCrypt($this->token, $this->AESKey, $this->appid);
        $encryptMsg = '';
        $errCode = $rep->encryptMsg($result, $timeStamp, $nonce, $encryptMsg);
        //$this->db->where('code','test_datag')->update('system_config',array('value'=>date('ymd his').$errCode));
        if ($errCode == 0) {
            //$this->db->where('code','test_msg')->update('system_config',array('value'=>date('ymd his').json_encode($_SESSION)));
            return $encryptMsg;
        
        } else {
            $this->logResult('logs/error.log','平台回复解密后失败：'.$errCode);
            return '';;
        }
    }
    //回复图文消息
    private function transmitNews($object, $newsArray)
    {
        if(!is_array($newsArray)){
            return "";
        }
        $time = time();
        $itemTpl = "        <item>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
        </item>
        ";
        $item_str = "";
        foreach ($newsArray as $item){
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }
        $xmlTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[news]]></MsgType>
        <ArticleCount>%s</ArticleCount>
        <Articles>
        $item_str</Articles>
        </xml>";
    
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, $time, count($newsArray));
        $rep = new WXBizMsgCrypt($this->token, $this->AESKey, $this->appid);
        $encryptMsg = '';
        $errCode = $rep->encryptMsg($result, $time, "123654", $encryptMsg);
        //$this->db->insert('system_config',array('code'=>"errCode",'value'=>"errCode:".$errCode));
        if ($errCode == 0) {
            return $encryptMsg;
        } else {
            $this->logResult('logs/error.log','平台回复解密后失败：'.$errCode);
            return '';
        }
    }
    
    //回复音乐消息
    private function transmitMusic($object, $musicArray)
    {
        if(!is_array($musicArray)){
            return "";
        }
        $itemTpl = "<Music>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
        <MusicUrl><![CDATA[%s]]></MusicUrl>
        <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
        </Music>";
    
        $item_str = sprintf($itemTpl, $musicArray['Title'], $musicArray['Description'], $musicArray['MusicUrl'], $musicArray['HQMusicUrl']);
    
        $xmlTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[music]]></MsgType>
        $item_str
        </xml>";
    
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }
    
    //回复图片消息
    private function transmitImage($object, $imageArray)
    {
        $itemTpl = "<Image>
        <MediaId><![CDATA[%s]]></MediaId>
        </Image>";
    
        $item_str = sprintf($itemTpl, $imageArray['MediaId']);
    
        $xmlTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[image]]></MsgType>
        $item_str
        </xml>";
    
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }
    
    //回复语音消息
    private function transmitVoice($object, $voiceArray)
    {
        $itemTpl = "<Voice>
        <MediaId><![CDATA[%s]]></MediaId>
        </Voice>";
    
        $item_str = sprintf($itemTpl, $voiceArray['MediaId']);
        $xmlTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[voice]]></MsgType>
        $item_str
        </xml>";
    
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }
    
    //回复视频消息
    private function transmitVideo($object, $videoArray)
    {
        $itemTpl = "<Video>
        <MediaId><![CDATA[%s]]></MediaId>
        <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
       </Video>";
    
        $item_str = sprintf($itemTpl, $videoArray['MediaId'], $videoArray['ThumbMediaId'], $videoArray['Title'], $videoArray['Description']);
    
        $xmlTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[video]]></MsgType>
        $item_str
        </xml>";
    
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }
    
    //回复多客服消息
    private function transmitService($object)
    {
        $xmlTpl = "<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[transfer_customer_service]]></MsgType>
    </xml>";
        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time());
        return $result;
    }
    
    //回复第三方接口消息
    private function relayPart3($url, $rawData)
    {
        $headers = array("Content-Type: text/xml; charset=utf-8");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    
}
