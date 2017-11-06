<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberBuy extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('weixin_model');
        $this->load->model("store_model");
        $this->load->model("goods_model");
        $this->load->model("user_model");
        $config_images = $this->common_function->get_default_img();
        $this->smarty->assign('config_images', $config_images);
        $this->config_img = $config_images;
    }
    
    //微信信息加载
    public function getWechatJsApiTicket(){
        //print_r($_POST);die;
        $url = isset($_POST['url'])?$_POST['url']:'';
        $appid = $this->common_function->get_gzh_appid();//$this->db->insert('system_config',array('code'=>'tetete1','value'=>$appid));
        $wxticket = $this->common_function->get_wx_jsapi_ticket();//$this->db->insert('system_config',array('code'=>'tetete2','value'=>$wxticket));
        $timestamp = time();
        $wxnonceStr = $this->common_function->get_gzh_noncestr();//$this->db->insert('system_config',array('code'=>'tetete3','value'=>$wxnonceStr));
        $wxOri = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s",
            $wxticket, $wxnonceStr, $timestamp,$url
        );
        $wxSha1 = sha1($wxOri);
        //$this->db->insert('system_config',array('code'=>'tetete','value'=>$wxSha1));
        $result = array(
            'wxticket'=>$wxticket,'signature'=>$wxSha1,'appid'=>empty($appid)?'wx51ed3765c99f5b49':$appid,'timestamp'=>$timestamp,'nonceStr'=>$wxnonceStr,
        );
        $data = array('result'=>$result,'status'=>0,'errmsg'=>'');//$this->db->insert('system_config',array('code'=>'tetete5','value'=>$wxSha1));
        echo json_encode($data);exit;
    }
    
    
    //微信信息加载
    public function getStoreOusEwm(){
        $data = array('state'=>false,'data'=>'','msg'=>'系统繁忙，请稍后再试');
        $act_id = isset($_GET['act_id'])?$_GET['act_id']:'';
        $store_id = isset($_GET['store_id'])?$_GET['store_id']:'';
        //下载门店活动二维码
        $img_url = '';
        if($store_id && $act_id){
            $url = base_url("vmall.php/receive/create_code_activity?id=".$store_id."&act_id=".$act_id."&type=3");
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $jsoninfo = json_decode($output, true);
            if($jsoninfo['state']==true || $jsoninfo['state']==1){
                $img_url =  $jsoninfo['data'];
            }
        }

        if($img_url ){
            $data['state'] =true;$data['data'] =$img_url;
        }
        echo json_encode($data);exit;
    }
    
    
    
    
    public function index(){
       $check = $this->weixin_model->get_wx_openid(base_url("vmall.php/MemberBuy/index"));
        if(!$check){
            die;
        }
        $user_info = array();
        $check_openid = $this->db->select('user_id,is_follow')->from("user")->where('wx_openid',$_SESSION['dai_wx_openid'])->get()->row_array();
        if($check_openid){
            $user_info['user_id'] = $check_openid['user_id'];
            $user_info['is_follow'] = $check_openid['is_follow'];
        }else{
            $inner['true_name'] = $inner['user_name']  = $inner['wx_nickname'] = $_SESSION['dai_wx_openid_nickname'];
            $inner['is_follow'] = 0;$inner['reg_time'] = time();$inner['head_portrait'] = $_SESSION['headimgurl'];
            $inner['wx_openid'] = $_SESSION['dai_wx_openid'];
            $this->db->insert('user',$inner);
            $user_info['user_id'] = $this->db->insert_id();;
            $user_info['is_follow'] = 0;
        } 

        
	    $time = time();
	    //最新活动
	    $this->db->select('sp.shop_id,sp.store_id,sp.shop_title,sp.start_time,sp.end_time,sp.shop_num,st.store_name,st.ous_logo,st.ous_shop_signs')
	    ->from('shop_p_member_shop as sp')
	    ->join('store as st','sp.store_id = st.store_id','left')
	    ->where('sp.start_time < ',$time)
	    ->where('sp.end_time > ',$time)
	    ->order_by('sp.end_time ','asc');
	    $new_store = $this->db->get()->result_array();

	    $MicroShare['membShop_share_title'] =  !empty($this->common_function->get_system_value('membShop_share_title'))?$this->common_function->get_system_value('membShop_share_title'):'探路者带你一路冲锋砍到低';//默认商品图片
	    $MicroShare['membShop_share_content'] =  !empty($this->common_function->get_system_value('membShop_share_content'))?$this->common_function->get_system_value('membShop_share_content'):'心“冻”珠穆朗玛？带上兄弟带上家伙，一路砍价“雪”拼，探路者给你温暖带你冲锋到顶！ ';//默认商品图片
	    $MicroShare['membShop_share_url'] =  !empty($this->common_function->get_system_value('membShop_share_url'))?$this->common_function->get_system_value('membShop_share_url'):'';//默认商品图片
	    
	    
	    //历史活动
	    $this->db->select('sp.shop_id,sp.store_id,sp.shop_title,sp.start_time,sp.end_time,sp.shop_num,st.store_name,st.ous_logo,st.ous_shop_signs')
	    ->from('shop_p_member_shop as sp')
	    ->join('store as st','sp.store_id = st.store_id','left')
	    ->where('sp.end_time < ',$time);
	    $history_store = $this->db->get()->result_array();
	    //print_r($new_store);die;
	    $this->smarty->assign('new_store',$new_store);
	    $this->smarty->assign('history_store',$history_store);
	    $this->smarty->assign('user_info',$user_info );
	    $this->smarty->assign('MicroShare',$MicroShare);
	    $this->smarty->display('member_buy.html');
	}

}
	
?>
