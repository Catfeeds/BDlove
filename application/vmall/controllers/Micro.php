<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Micro extends CI_Controller{

	/**
     * MicroBargain Page for this controller.
     */

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
    
   
    //微砍价--活动列表
    public function index() {
        $this->common_function->delete_micro_bargain();
        $check = $this->weixin_model->get_wx_openid(base_url("vmall.php/Micro/index"));
        if(!$check){
            die;
        }
        $check_openid = $this->db->select('user_id')->where('wx_openid',$_SESSION['dai_wx_openid'])->get('user')->row('user_id');
        if($check_openid){
            $user_id =   $check_openid;
        }else{
            $inner['true_name'] = $inner['user_name']  = $inner['wx_nickname'] = $_SESSION['dai_wx_openid_nickname'];
            $inner['is_follow'] = 0;$inner['reg_time'] = time();$inner['head_portrait'] = $_SESSION['headimgurl'];
            $inner['wx_openid'] = $_SESSION['dai_wx_openid'];
            $this->db->insert('user',$inner);
            $_SESSION['user_id'] = $user_id = $this->db->insert_id();
        }
        //微砍价分享信息
        $MicroShare['micro_share_title'] =  !empty($this->common_function->get_system_value('micro_share_title'))?$this->common_function->get_system_value('micro_share_title'):'探路者带你一路冲锋砍到低';//默认商品图片
        $MicroShare['micro_share_content'] =  !empty($this->common_function->get_system_value('micro_share_content'))?$this->common_function->get_system_value('micro_share_content'):'心“冻”珠穆朗玛？带上兄弟带上家伙，一路砍价“雪”拼，探路者给你温暖带你冲锋到顶！ ';//默认商品图片
        $MicroShare['micro_share_url'] =  !empty($this->common_function->get_system_value('micro_share_url'))?$this->common_function->get_system_value('micro_share_url'):'';//默认商品图片

        $this->smarty->assign('MicroShare', $MicroShare);
        $this->smarty->assign('user_id', $user_id);
    	$this->smarty->display('cut_pricelist.html');
    }
    
    
    //微砍价--ajax活动列表
    public function index_ajax(){
        $user_id = isset($_POST['user_id']) && !empty($_POST['user_id']) ?$_POST['user_id']:false;
        //用户信息
        $time = time();
        //最新活动
        $this->db->select('sb.bargain_id,sb.goods_id,sb.store_id,sb.goods_price,sb.bargain_price,sb.end_time,sb.start_time,sb.bargain_again,sg.goods_name,sg.goods_marketprice')
        ->from('shop_p_bargain as sb')
        ->join("shop_goods as sg",'sb.goods_id = sg.goods_id')
        ->where('sb.start_time < ',$time)
        ->where('sb.end_time > ',$time)
        ->order_by('sb.end_time ','asc');
        $new_data = $this->db->get()->result_array();
        //print_r($new_data);die;
        
        foreach ($new_data as $key => $value) {
            $new_data[$key]['num'] = $this->db->select('count(user_id) as num')->where('bargain_id',$value['bargain_id'])->get('shop_p_bargain_log')->row('num');
            $new_data[$key]['over_time'] = $value['end_time'] - $time;
            $cut_goods_price = $this->cut_goods_price($value['goods_id'],$value['store_id']);
            if($cut_goods_price['state']){
                $new_data[$key]['stocks_price'] = $cut_goods_price['data'];
            }else{
                $new_data[$key]['stocks_price'] = $value['goods_price'];
            }
        
            if($value['bargain_price'] >= $new_data[$key]['stocks_price']){
                $new_data[$key]['end_price'] = 0;
            }else{
                $new_data[$key]['end_price'] =  $new_data[$key]['stocks_price'] - $value['bargain_price'];
            }
        }
        //print_r($new_data);die;
        
        //历史活动
        $this->db->select('sb.store_id,sb.bargain_price,sb.goods_price,sb.bargain_id,sb.goods_id,sb.goods_image,sb.bargain_again,sg.goods_name,sg.goods_marketprice')
        ->from('shop_p_bargain as sb')
        ->join("shop_goods as sg",'sb.goods_id = sg.goods_id')
        ->where('sb.end_time < ',$time)
        ->order_by('sb.end_time','desc');
        $history_data = $this->db->get()->result_array();
        foreach ( $history_data as $key => $value) {
        
            $cut_goods_price = $this->cut_goods_price($value['goods_id'],$value['store_id']);
            if($cut_goods_price['state']){
                $history_data[$key]['stocks_price'] = $cut_goods_price['data'];
            }else{
                $history_data[$key]['stocks_price'] = $value['goods_price'];
            }
        
            if($value['bargain_price'] >= $history_data[$key]['stocks_price']){
                $history_data[$key]['end_price'] = 0;
            }else{
                $history_data[$key]['end_price'] =  $history_data[$key]['stocks_price'] - $value['bargain_price'];
            }
        
            $history_data[$key]['restart_num']  = $this->db->select('count(user_id) as restart_num')->where('bargain_id',$value['bargain_id'])->get('shop_p_bargain_attr')->row('restart_num');
            $history_data[$key]['restart_user'] = $this->db->select('user_id')->where('bargain_id',$value['bargain_id'])->where('user_id',$user_id)->get('shop_p_bargain_attr')->row('user_id');
        
        }
        echo  json_encode(array('new_info'=> $new_data,'history_info'=> $history_data));exit;
        //$this->smarty->assign('new_info', $new_data);
        //$this->smarty->assign('history_info', $history_data);
    }
    
    
    
    
    //微砍价--ajax活动列表
    public function index_ajaxs(){
        $user_id = isset($_POST['user_id']) && !empty($_POST['user_id']) ?$_POST['user_id']:false;
        //用户信息
        $time = time();
        //最新活动
        $this->db->select('bargain_image')
        ->from('shop_p_bargain')
        ->where('start_time < ',$time)
        ->where('end_time > ',$time)
        ->order_by('end_time ','asc');
        $new_data= $this->db->get()->result_array();
    
        //历史活动
        $this->db->select('bargain_image')
        ->from('shop_p_bargain')
        ->where('end_time < ',$time)
        ->order_by('end_time','desc');
        $history_data = $this->db->get()->result_array();
        echo  json_encode(array('new_info'=> $new_data,'history_info'=> $history_data));exit;
    }
    
    
    
    //微砍价--活动重开
    public function bargain_restart() {
        $user_id = $_POST['user_id'];
        $bargain_id = $_POST['bargain_id'];
        $res = array('state'=>false, 'msg'=> "参与失败,请稍后再试",'num'=>'');
        if($user_id && $bargain_id){
            //检查是否已在活动中
            $check = $this->db->select('ids')->where("bargain_id",$bargain_id)->where("user_id",$user_id)->get('shop_p_bargain_attr')->row_array();
            if($check){
                $res['msg'] = "您已经加入本次重启活动中！";
            }else{
                $this->db->set('bargain_id',$bargain_id);
                $this->db->set('user_id',$user_id);
                $this->db->insert('shop_p_bargain_attr');
                $res['state'] = true;
                $res['msg'] = "已加入活动,敬请期待！";
                $res['num'] = $this->db->select('count(1) as num')->from('shop_p_bargain_attr')->where("bargain_id",$bargain_id)->get()->row('num');
            }
        }
        echo  json_encode($res);exit;
    }

    public function image_ajax(){
        $bargain_id = isset($_POST['bargain_id']) && !empty($_POST['bargain_id']) ?$_POST['bargain_id']:false;
        $res = array('state'=>false,'data'=>'');
        if(!$bargain_id){
            echo  json_encode($res);exit;
        }
        $goods_image = $this->db->select('goods_image')->where('bargain_id',$bargain_id)->get('shop_p_bargain')->row('goods_image');
        if($goods_image){
            $goods_image = unserialize($goods_image);
            if($goods_image){
                $res['state'] =true;
                $res['data'] = $goods_image;
            }
        }
       echo  json_encode($res);exit;
    
    }
    
    
    //微砍价--砍价界面
    public function cuts() {
        $bargain_id = isset($_GET['bargain_id']) ? $_GET['bargain_id']:false;//14
        $dai_user_id = isset($_GET['dai_user_id'])?$_GET['dai_user_id']:false;//109
        if(!empty($dai_user_id)){//进入帮砍界面
            $wx_openid_status = $this->weixin_model->get_wx_openid(base_url("vmall.php/Micro/cuts?bargain_id=".$bargain_id."&dai_user_id=".$dai_user_id));
            if($wx_openid_status){
                $wx_openid = $_SESSION['dai_wx_openid'];
                $check_openid = $this->db->select('is_follow,user_id')->where('wx_openid',$wx_openid)->get('user')->row_array();
                if($check_openid){//已经是商城会员
                    if($check_openid['is_follow']){//已经关注
                        if($check_openid['user_id']==$dai_user_id){
                            header("location:".base_url("vmall.php/Micro/cuts?bargain_id=".$bargain_id));die;
                        }else{
                            header("location:".base_url("vmall.php/Micro/cut_help?bargain_id=").$bargain_id.'&dai_user_id='.$dai_user_id);die;
                        }
                        
                    }else{ //未关注
                        if($check_openid['user_id']==$dai_user_id){
                            header("location:".base_url("vmall.php/Micro/cut_indexs?bargain_id=".$bargain_id));die;
                        }else{
                            header("location:".base_url("vmall.php/Micro/cut_help?bargain_id=").$bargain_id.'&dai_user_id='.$dai_user_id);die;
                        }
                    }
                }else{//还不是商城会员
                    $inner['true_name'] = $inner['user_name']  = $inner['wx_nickname'] = $_SESSION['dai_wx_openid_nickname'];
                    $inner['is_follow'] = 0;$inner['reg_time'] = time();$inner['head_portrait'] = $_SESSION['headimgurl'];
                    $inner['wx_openid'] = $_SESSION['dai_wx_openid'];
                    $this->db->insert('user',$inner);
                    $bargain_check = $this->common_function->get_row("shop_p_bargain","bargain_id=".$bargain_id);
                    if(!$bargain_check){//活动不存在 或已删除
                        echo "<script>javascript:alert('对不起，该活动已关闭,即将进入活动中心！');window.location.href='".base_url("vmall.php/Micro/index")."';</script>";
                        die;
                    }
                    header("location:".base_url("vmall.php/Micro/cut_help?bargain_id=").$bargain_id.'&dai_user_id='.$dai_user_id);die;
                }
            
                
                
                
            }else{
                die;
            }
            
        }else{
                $this->weixin_model->get_user_openid(base_url("vmall.php/Micro/cuts?bargain_id=".$bargain_id));
                $user_id = $_SESSION['user_id'];
                $is_follow = $this->db->select('is_follow,user_id')->where('user_id',$user_id)->get('user')->row_array();
                if($is_follow['is_follow']){//如果已关注公众号
                    $bargain_check = $this->common_function->get_row("shop_p_bargain","bargain_id=".$bargain_id);
                    if(!$bargain_check){//活动不存在 或已删除
                        echo "<script>javascript:alert('对不起，该活动已关闭,即将进入活动中心！');window.location.href='".base_url("vmall.php/Micro/index")."';</script>";
                        die;
                    }
                    //是否已经参与
                    $checks = $this->db->select('log_id')->where('bargain_id',$bargain_id)->where('user_id',$user_id)->get('shop_p_bargain_log')->row('log_id');
                    if(!$checks){//未参加，添加参与信息
                        $time = time();
                        $sql_log = array("bargain_id"=>$bargain_id,"user_id"=>$user_id,"bargain_num"=>0,"goods_price"=>0,"bargain_time"=>$time);
                        $this->db->insert('shop_p_bargain_log', $sql_log);
                    }
                    
                    //用户信息
                    $userinfo = $this->user_model->get_openid_info($user_id);
                    
                    //是否已经砍价
                    $check = $this->db->select('id')->where('bargain_id',$bargain_id)->where('user_id',$user_id)->where('wx_openid',$userinfo['wx_openid'])->get('jk_shop_p_bargain_log_friends')->row('id');
                    
                    $goods_info = $this->cut_goods_info($bargain_id);
                    if($goods_info['state']){
                        $goods_info = $goods_info['data'];
                    }else{
                        $goods_info = '';
                    }
                    $this->smarty->assign('goods_info',$goods_info);
                    //print_r($goods_info);die;
                    
                    //活动信息
                    $bargain_Info = $this->db->select('sb.*,b.store_name,g.goods_name,g.goods_image as goods_images,g.goods_marketprice')->from('shop_p_bargain as sb')
                    ->join('store as b','b.store_id=sb.store_id','left')
                    ->join('shop_goods as g','sb.goods_id=g.goods_id','left')
                    ->where('sb.bargain_id',$bargain_id )->get()->row_array();
                    //活动是否过期
                    if($bargain_Info['end_time'] < time()){
                        echo "<script>javascript:alert('对不起，该活动已结束,即将进入活动中心！');window.location.href='".base_url("vmall.php/Micro/index")."';</script>";
                        die;
                    }
                    
                    
                    if($bargain_Info['bargain_info']){
                        $bargain_Info['bargain_info'] = unserialize($bargain_Info['bargain_info']);
                    }
                    //参与人数
                    $bargain_Info['bargain_total'] = $this->db->select('count(1) as num')->from('shop_p_bargain_log')
                    ->where("bargain_id",$bargain_id)->get()->row('num');
                     
                    //已砍价格
                    $cut_price = $this->db->select('goods_price')->from('shop_p_bargain_log')->where('bargain_id',$bargain_id )->where("user_id",$user_id)->get()->row('goods_price');
                    if($cut_price){
                        $bargain_Info['cut_price'] = $cut_price;
                    }else{
                        $bargain_Info['cut_price'] =0.00;
                    }
                    
                    $cut_goods_price = $this->cut_goods_price($bargain_Info['goods_id'],$bargain_Info['store_id']);
                    if($cut_goods_price['state']){
                        $bargain_Info['stocks_price'] = $cut_goods_price['data'];
                    }else{
                        $bargain_Info['stocks_price'] = $bargain_Info['goods_price'];
                    }
                    
                    $bargain_Info['cut_price'] = number_format($bargain_Info['cut_price'],2);
                    $bargain_Info['data_width'] = number_format(($bargain_Info['cut_price']/$bargain_Info['bargain_price'])*100,2);
                    $bargain_Info['bargain_stocks_price'] = number_format(($bargain_Info['stocks_price'] - $bargain_Info['bargain_price']),2);
                    if($bargain_Info['bargain_stocks_price'] <0){
                        $bargain_Info['bargain_stocks_price'] = 0.00;
                    }
                    //参与人信息
                    $bargain_Info['cut_info'] =
                    $this->db->select('sg.bargain_time,sg.bargain_time,sg.price,us.head_portrait,us.wx_nickname')
                    ->from('shop_p_bargain_log_friends as sg')
                    ->join("user as us",'us.wx_openid=sg.wx_openid',"left")
                    ->where('sg.bargain_id',$bargain_id )
                    ->where('sg.user_id',$user_id )
                    ->order_by('sg.bargain_time ','desc')
                    ->get()
                    ->result_array();
                    if($bargain_Info['cut_info']){
                        foreach ($bargain_Info['cut_info'] as $ks=>$vs){
                            if($vs['price']>0){
                                $bargain_Info['cut_info'][$ks]['price'] = "-￥".number_format($vs['price'],2);
                            }else{
                                $bargain_Info['cut_info'][$ks]['price'] = "+￥".number_format(abs($vs['price']),2);
                            }
                        }
                    }
                    //print_r($userinfo);die;
                    $this->smarty->assign('check',$check);
                    $this->smarty->assign('userinfo',$userinfo);
                    $this->smarty->assign('bargain_Info',$bargain_Info);
                    $this->smarty->display('cut_price.html');
                    
                    
                    
                    
                }else{
                    header("location:".base_url("vmall.php/Micro/cut_indexs?bargain_id=").$bargain_id);die;//如果未关注公众号  进入我也要抢界面
                }
        }
    }
    
    
    
    
    //微砍价--砍价
    public function cut_price(){
        $bargain_id = isset($_GET['bargain_id']) && !empty($_GET['bargain_id'])? $_GET['bargain_id']:false;
        $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:isset($_GET['user_id'])? $_GET['user_id']:false;
        //用户信息
        $userinfo = $this->user_model->get_openid_info($user_id);
        $this->cut_price_true($bargain_id,$user_id,$userinfo['wx_openid']);
    }
    
    
    //微砍价--帮砍界面
    public function cut_help(){
        $bargain_id = isset($_GET['bargain_id']) && !empty($_GET['bargain_id'])? $_GET['bargain_id']:false;
        $user_id = isset($_GET['dai_user_id']) && !empty($_GET['dai_user_id'])? $_GET['dai_user_id']:false;
        $wx_openid = isset($_SESSION['dai_wx_openid'])?$_SESSION['dai_wx_openid']:false;
        $dai_flag = 1;
        $dai_user = $this->db->select('id')->where('bargain_id',$bargain_id)->where('user_id',$user_id)->where('wx_openid',$wx_openid)->get('shop_p_bargain_log_friends')->row_array();
        if($dai_user){
            $dai_flag = 0;//已帮砍价，不能再砍
        }
        //用户信息
        $userinfo = $this->user_model->get_openid_info($user_id);
    
        //活动信息
        $bargain_Info = $this->db->select('sb.*,b.store_name,g.goods_name,g.goods_image as goods_images,g.goods_marketprice')->from('shop_p_bargain as sb')
        ->join('store as b','b.store_id=sb.store_id','left')
        ->join('shop_goods as g','sb.goods_id=g.goods_id','left')
        ->where('sb.bargain_id',$bargain_id )->get()->row_array();
        if($bargain_Info['bargain_info']){
            $bargain_Info['bargain_info'] = unserialize($bargain_Info['bargain_info']);
        }

        //参与人数
        $bargain_Info['bargain_total'] = $this->db->select('count(1) as num')->from('shop_p_bargain_log')
        ->where("bargain_id",$bargain_id)->get()->row('num');
         
        //已砍价格
        $cut_price = $this->db->select('goods_price')->from('shop_p_bargain_log')->where('bargain_id',$bargain_id )->where("user_id",$user_id)->get()->row('goods_price');
        if($cut_price){
            $bargain_Info['cut_price'] = $cut_price;
        }else{
            $bargain_Info['cut_price'] =0.00;
        }
        

        $goods_info = $this->cut_goods_info($bargain_id);
        if($goods_info['state']){
            $goods_info = $goods_info['data'];
        }else{
            $goods_info = '';
        }
        $this->smarty->assign('goods_info',$goods_info);
        
        $bargain_Info['cut_price'] = number_format($bargain_Info['cut_price'],2);
        $bargain_Info['data_width'] = number_format(($bargain_Info['cut_price']/$bargain_Info['bargain_price'])*100,2);
    
        $cut_goods_price = $this->cut_goods_price($bargain_Info['goods_id'],$bargain_Info['store_id']);
        if($cut_goods_price['state']){
            $bargain_Info['stocks_price'] = $cut_goods_price['data'];
        }else{
            $bargain_Info['stocks_price'] = $bargain_Info['goods_price'];
        }
        $bargain_Info['bargain_stocks_price'] = number_format(($bargain_Info['stocks_price'] - $bargain_Info['bargain_price']),2);
        if($bargain_Info['bargain_stocks_price'] <0){
            $bargain_Info['bargain_stocks_price'] = 0.00;
        }
        //参与人信息
        $bargain_Info['cut_info'] =
        $this->db->select('sg.bargain_time,sg.bargain_time,sg.price,us.head_portrait,us.wx_nickname')
        ->from('jk_shop_p_bargain_log_friends as sg')
        ->join("user as us",'us.wx_openid=sg.wx_openid',"left")
        ->where('sg.bargain_id',$bargain_id )
        ->where('sg.user_id',$user_id )
        ->order_by('sg.bargain_time ','desc')
        ->get()
        ->result_array();
        if($bargain_Info['cut_info']){
            foreach ($bargain_Info['cut_info'] as $ks=>$vs){
                if($vs['price']>0){
                    $bargain_Info['cut_info'][$ks]['price'] = "-￥".number_format($vs['price'],2);
                }else{
                    $bargain_Info['cut_info'][$ks]['price'] = "+￥".abs(number_format($vs['price'],2));
                }
            }
        }
        //print_r($userinfo);die;
        //print_r($bargain_Info);die;
    
        $this->smarty->assign('dai_flag',$dai_flag);
        $this->smarty->assign('userinfo',$userinfo);
        $this->smarty->assign('bargain_Info',$bargain_Info);
        $this->smarty->display('cut_help.html');
    }
    
    //微砍价--帮砍
    public function cut_price_help(){
        $res = array('state'=>false, 'msg'=> "帮砍失败,请稍后再试",'price'=>'');
        $bargain_id = isset($_GET['bargain_id']) && !empty($_GET['bargain_id'])? $_GET['bargain_id']:false;
        $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:isset($_GET['user_id'])? $_GET['user_id']:false;
        $wx_openid = isset($_SESSION['dai_wx_openid'])?$_SESSION['dai_wx_openid']:false;
        
        $this->cut_price_true($bargain_id,$user_id,$wx_openid);
    }
    
    
    //微砍价--我也要抢
    public function cut_indexs(){
        $bargain_id = isset($_GET['bargain_id']) && !empty($_GET['bargain_id'])? $_GET['bargain_id']:false;
        $wx_openid_status = $this->weixin_model->get_wx_openid(base_url('vmall.php/Micro/cut_indexs?bargain_id='.$bargain_id));
        if($wx_openid_status){
            $dai_wx_openid = $_SESSION['dai_wx_openid'];
            $userinfo['head_portrait'] = $_SESSION['headimgurl'];
            $userinfo['wx_nickname'] = $_SESSION['dai_wx_openid_nickname'];
            //检查是不是会员
            $check_openid = $this->db->select('user_id')->from('user')->where('wx_openid',$dai_wx_openid)->where('is_follow',1)->get()->row('user_id');
            if($check_openid){
                header("location:".base_url("vmall.php/Micro/cuts?bargain_id=").$bargain_id);die;
            }
            
            $goods_info = $this->cut_goods_info($bargain_id);
            if($goods_info['state']){
                $goods_info = $goods_info['data'];
            }else{
                $goods_info = '';
            }
            $this->smarty->assign('goods_info',$goods_info);
            
            //活动信息
            $bargain_Info = $this->db->select('sb.*,b.store_name,g.goods_name,g.goods_image as goods_images,g.goods_marketprice,sb.store_id')->from('shop_p_bargain as sb')
            ->join('store as b','b.store_id=sb.store_id','left')
            ->join('shop_goods as g','sb.goods_id=g.goods_id','left')
            ->where('sb.bargain_id',$bargain_id )->get()->row_array();
            $bargain_Info['ous_ewm'] = '';
            //下载门店活动二维码
            $url = base_url("vmall.php/receive/create_code_activity?id=".$bargain_Info['store_id']."&act_id=".$bargain_id."&type=2");
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $jsoninfo = json_decode($output, true);
            if($jsoninfo['state']==true || $jsoninfo['state']==1){
                $bargain_Info['ous_ewm'] = $jsoninfo['data'];
            }
            
            if($bargain_Info['bargain_info']){
                $bargain_Info['bargain_info'] = unserialize($bargain_Info['bargain_info']);
            }
    
            //参与人数
            $bargain_Info['bargain_total'] = $this->db->select('count(1) as num')->from('shop_p_bargain_log')
            ->where("bargain_id",$bargain_id)->get()->row('num');
             
             //已砍价格
            //$cut_price = $this->db->select('goods_price')->from('shop_p_bargain_log')->where('bargain_id',$bargain_id )->where("user_id",$user_id)->get()->row('goods_price');
            if(isset($cut_price) && $cut_price){
                $bargain_Info['cut_price'] = $cut_price;
            }else{
                $bargain_Info['cut_price'] =0.00;
            }
             $bargain_Info['cut_price'] = number_format($bargain_Info['cut_price'],2);
            //$bargain_Info['data_width'] = number_format(($bargain_Info['cut_price']/$bargain_Info['bargain_price'])*100,2);
        
    
             $cut_goods_price = $this->cut_goods_price($bargain_Info['goods_id'],$bargain_Info['store_id']);
             if($cut_goods_price['state']){
                 $bargain_Info['stocks_price'] = $cut_goods_price['data'];
             }else{
                 $bargain_Info['stocks_price'] = $bargain_Info['goods_price'];
             }
             $bargain_Info['bargain_stocks_price'] = number_format(($bargain_Info['stocks_price'] - $bargain_Info['bargain_price']),2);
    
            $this->smarty->assign('userinfo',$userinfo);
            $this->smarty->assign('bargain_Info',$bargain_Info);
            $this->smarty->display('cut_indexs.html');
        }else{
            die;
        }
    }
    
    
    
    //微砍价--立即购买（查询商品信息）
    public function cut_goods_info($bargain_id){
        $res = array('state'=>false, 'msg'=> "查询商品信息失败",'data'=>'');
        if(!$bargain_id){
            $res['msg']="参数错误";
            return  $res ;
        }
        //活动信息
        $bargain_Info = $this->db->select('store_id,goods_id')->from('shop_p_bargain')->where('bargain_id',$bargain_id )->get()->row_array();
        $store_id = $bargain_Info['store_id'];
        $goods_id = $bargain_Info['goods_id'];
        //print_r($bargain_Info);die;
        
        $this->db->select('sa.uec_goods_iiud,sg.shorturl,sg.goods_salenum,sg.goods_jingle,sg.goods_marketprice,sa.ssa_id,sa.ssa_store_id,sga.stocks_marketprice,sa.stocks_sn,sa.stocks_bar_code,sa.amount,sa.size,sa.stocks_price,sa.update_time,sa.goods_id,
                              sga.goods_a_id,sga.size,sg.goods_id,sg.goods_name,sg.gc_id,sg.gc_id1,sg.gc_id2,sg.gc_id3,sg.gc_name,sg.brand_id,sg.brand_name,sg.discount,sg.goods_spu,sg.goods_image,sg.goods_state,sg.goods_pos,sg.mobile_desc,sg.logistics_type,sg.limit_num,sg.available_coupons,sg.available_member_dis,sg.goods_tag');
        $this->db->from('store_stocks_amount as sa');
        $this->db->join('shop_goods_extend_attr as sga','sga.goods_ea_id=sa.goods_ea_id','left');
        $this->db->join('shop_goods as sg','sg.goods_id=sa.goods_id');
        $this->db->where("sg.goods_state",'1');
        $this->db->where("sa.ssa_store_id",$store_id);
        $this->db->where('sa.goods_id',$goods_id);
        $base_info = $this->db->get()->result_array();
        if(empty($base_info) || count($base_info)<1){
            $this->common_function->show_message("该商品存在数据错误，请浏览其他商品！");
        }
        $base_info = isset($base_info[0])?$base_info[0]:array();
        //print_r($base_info);die;
        
        $this->db->select('goods_id,goods_ea_id,goods_a_id,color,stocks_sku,color_remark');
        $this->db->from('shop_goods_extend_attr');
        $this->db->where('goods_id',$goods_id);
        $this->db->group_by("goods_a_id");
        $color = $this->db->get()->result_array();
        $base_info['goods_color'] = $color;
        //print_r( $color);die;

       if($base_info){
           $res['state']=true;$res['msg']="查询商品信息成功"; $res['data']=$base_info;
       }
       return  $res;
    }
    
    public function cut_goods_price($goods_id,$store_id){
        $res = array('state'=>false, 'msg'=> "查询商品信息失败",'data'=>'');
        if(!($goods_id && $store_id)){
            $res['msg']="参数错误";
            return  $res ;
        }
        $stocks_price = $this->db->select ("min(stocks_price) as stocks_price")->where ('goods_id', $goods_id)->where ('ssa_store_id',$store_id)->get('store_stocks_amount')->row('stocks_price');
        if($stocks_price){
            $res['state']=true;$res['msg']="查询商品信息成功"; $res['data']=$stocks_price;
        }
        return  $res;
    }
    
    //ajax获取size
    public function get_size_by_ajax(){
        $goods_id = isset($_GET['goods_id']) ?$_GET['goods_id'] :false;
        $goods_a_id = isset($_GET['goods_a_id']) ?$_GET['goods_a_id'] :false;
        $store_id = isset($_GET['store_id']) ?$_GET['store_id'] :false;
         
         
        $this->db->select('goods_ea_id,goods_id,goods_a_id,color,stocks_sku,size,size_note');
        $this->db->from('shop_goods_extend_attr');
        $this->db->where('goods_id',$goods_id);
        $this->db->where("goods_a_id='{$goods_a_id}'");
        $size = $this->db->get()->result_array();
        $result = array("state"=>false,"data"=>"");
        if($size){
            foreach ($size as $key=>$val){
                $goods_ea_id = $val['goods_ea_id'];
                $num = $this->db->select('amount,uec_amount')->from('store_stocks_amount')->where("ssa_store_id = '{$store_id}' and goods_ea_id = '{$goods_ea_id}' ")->get()->row_array();
                //$num = $this->db->select('amount')->where("ssa_store_id = '{$store_id}' and goods_ea_id = '{$goods_ea_id}' ")->get('store_stocks_amount')->row('amount');
                $size[$key]['goodsamount']=0;
                if($num['amount']){
                    $size[$key]['goodsamount']=1;
                }else{
                    if($num['uec_amount']){
                        $size[$key]['goodsamount']=1;
                    }
                }
            }
            $result['state'] = true;
            $result['data'] = $size;
        }
        echo  json_encode($result);exit;
    }
    
    
    //ajax获取价格 库存
    public function get_price_by_ajax(){
        $goods_id = isset($_GET['goods_id']) ?$_GET['goods_id'] :false;
        $size = isset($_GET['size']) ?$_GET['size'] :false;
        $color = isset($_GET['color']) ?$_GET['color'] :false;
        $goods_a_id = isset($_GET['goods_a_id']) ?$_GET['goods_a_id'] :false;
        $goods_ea_id = isset($_GET['goods_ea_id']) ?$_GET['goods_ea_id'] :false;
        $store_id =  isset($_GET['store_id']) ?$_GET['store_id'] :false;
         
        $this->db->select('sta.ssa_id,sta.ssa_store_id,sta.goods_id,sta.stocks_sn,sta.amount,sta.uec_amount,sta.size,sta.stocks_price,sga.stocks_marketprice');
        $this->db->from('store_stocks_amount as sta');
        $this->db->join('shop_goods_extend_attr as sga','sga.goods_id=sta.goods_id and sga.stocks_sku=sta.stocks_sn and sga.size=sta.size','left');
        $this->db->where('sta.ssa_store_id',$store_id);
        $this->db->where('sta.goods_ea_id',$goods_ea_id);
        $res = $this->db->get()->row_array();
         
        $this->db->select('goods_image_id,goods_image,is_default');
        $this->db->from('shop_goods_images');
        $this->db->where('goods_id',$goods_id);
        $this->db->where('color_id',$goods_a_id);
        $img_info = $this->db->get()->result_array();
        if( $img_info){
            $flag = false;
            foreach ($img_info as $key=>$val){
                if($val['is_default']==1){
                    $flag = true;
                    $res['img_info'] = $img_info[$key]['goods_image'];
                    break;
                }
            }
            if($flag==false){
                $res['img_info'] = $img_info[0]['goods_image'];
            }
        }else{
            $res['img_info'] = false;
        }
        $result = array("state"=>false,"data"=>"");
        if($res){
            $result['state'] = true;
            $result['data'] = $res;
        }
        echo  json_encode($result);exit;
    }
    
    
    
    
    
    //ajax获取color
    public function get_color_by_ajax(){
        $goods_id = isset($_GET['goods_id']) ?$_GET['goods_id'] :false;
        $this->db->select('goods_id,goods_ea_id,goods_a_id,color,stocks_sku,color_remark');
        $this->db->from('shop_goods_extend_attr');
        $this->db->where('goods_id',$goods_id);
        $this->db->group_by("goods_a_id");
        $color = $this->db->get()->result_array();
        $result = array("state"=>false,"data"=>"");
        if($color){
            $result['state'] = true;
            $result['data'] = $color;
        }
        echo  json_encode($result);exit;
    }
    
    
    
    
    
    public  function cut_price_true($bargain_id,$user_id,$wx_openid){
        $res = array('state'=>false, 'msg'=> "帮砍失败,请稍后再试",'price'=>'');
        if(!($bargain_id && $user_id && $wx_openid)){
            $res['msg']="参数获取异常，请稍后再试！";
            echo json_encode($res);
            exit();
        }
        //是否已经砍价
        $check = $this->db->select('id')->where('bargain_id',$bargain_id)->where('user_id',$user_id)->where('wx_openid',$wx_openid)->get('shop_p_bargain_log_friends')->row('id');
        if($check){
            $res['msg']="该活动你已参加过了，不能再次砍价！";
            echo json_encode($res);
            exit();
        }
    
        //参与人数
        $bargain_total = $this->db->select('bargain_num')->from('shop_p_bargain_log')
        ->where("bargain_id",$bargain_id)->where("user_id",$user_id)->get()->row('bargain_num');
    
        $log_info = $this->db->select('log_id,bargain_num,goods_price')->where('bargain_id',$bargain_id)->where('user_id',$user_id)->get('shop_p_bargain_log')->row_array();
    
        //活动信息
        $bargain_Infos = $this->db->select('bargain_info,bargain_price')->from('shop_p_bargain')->where('bargain_id',$bargain_id)->get()->row_array();
        $cut_info = array();
        $over_user = false;
        if($bargain_Infos['bargain_info']){
            $bargain_Info = unserialize($bargain_Infos['bargain_info']);
            if(!empty($bargain_Info)){
                $user_number = 0;
                foreach ($bargain_Info as $ks=>$vl){
                    $user_number += $vl['user_number'];
                    if(($bargain_total+1)<=$user_number){//当前参与人数 小于 该阶段设置人数 ，返回该阶段砍价参数
                        $cut_info = $vl;
                        break;
                    }
                }
                if(empty($cut_info)){
                    if($log_info['goods_price']<$bargain_Infos['bargain_price']){
                        $cut_info = $bargain_Info[count($bargain_Info)-1];
                        $over_user = true;
                    }
                }
            }
        }
        if($cut_info){
            
            $cut_price1 = $cut_info['depreciate_prices']*($cut_info['price_low']/100);
            $cut_price2 = $cut_info['depreciate_prices']*($cut_info['price_height']/100);
    
            $cut_prices1 = $cut_info['depreciate_prices']*($cut_info['prices_lows']/100);
            $cut_prices2 = $cut_info['depreciate_prices']*($cut_info['prices_heights']/100);
    
            $price =  round($cut_price1 + mt_rand() / mt_getrandmax() * ($cut_price2 - $cut_price1),2);
            //$price = rand($cut_price1,$cut_price2);//降价
            if(empty($bargain_total) || $bargain_total<1){  //保证第一刀降价
                $odds = 0;
            }else{
                $odds = rand(1,100);
            }
            $odds = rand(1,100);
            if($odds>$cut_info['depreciate_odds']){
                $price = '-'.round($cut_prices1 + mt_rand() / mt_getrandmax() * ($cut_prices2 - $cut_prices1),2);
                //$price = rand($cut_prices1,$cut_prices2);//升价
            }
            $price = number_format($price,2);
            if($over_user){  //距离砍价目标小于5块钱时， 让最后一人直接看到目标价格，确保不会超出砍价目标
                if(($bargain_Infos['bargain_price'] - $log_info['goods_price'])<=5){
                    $price = $bargain_Infos['bargain_price'] - $log_info['goods_price'];
                }
            }
          
             
            $time = time();
            $up_log = array("bargain_num"=>$log_info['bargain_num']+1,"goods_price"=>$log_info['goods_price']+$price);
            $sql_firends = array("bargain_id"=>$bargain_id,"wx_openid"=>$wx_openid,"user_id"=>$user_id,"price"=>$price,"bargain_time"=>$time);
            $this->db->trans_begin(); //开启事物
            $this->db->insert('shop_p_bargain_log_friends',$sql_firends);
            $this->db->update('shop_p_bargain_log', $up_log, array('log_id' =>$log_info['log_id']));
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();//事物回滚
            }else{
                $this->db->trans_commit();//事物提交
                $res['state']=true;$res['msg']="帮砍成功";$res['price']=$price;
            }
        }
        echo json_encode($res);
        exit();
    
    
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>