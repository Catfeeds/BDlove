<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Store extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    private $config_images_info;
    public function __construct(){
        parent::__construct();
        $this->load->model("store_model");
        $this->load->model("user_model");
        $this->load->model("RongCloud_model");
        $this->load->model('weixin_model');
        $config_images = $this->common_function->get_default_img();
        $this->config_images_info = $config_images;
        $this->smarty->assign('config_images', $config_images);
    }
    
    //邀请会员
    public function qrCodeOfSales() {
        $salesId = isset($_GET['salesId']) ?$_GET['salesId']:"";
        $url = base_url("admin.php/Weixin_set/create_shot_code?echos=1&id=".$salesId);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $jsoninfo = json_decode($output, true);
        $guide_info = $this->store_model->getGuideInfo(2,$salesId);
        if(empty($guide_info)){
            $err_msg = '数据错误:没有id为'.$salesId."的导购信息";
            $this->common_function->show_message($err_msg);exit;
            
        }else{
            if(empty($guide_info['spg_ewm'])){
                $url = base_url("vmall.php/receive/download_much_short?id=".$salesId);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $output = curl_exec($ch);
                curl_close($ch);
                $jsoninfo = json_decode($output, true);
                $guide_info = $this->store_model->getGuideInfo(2,$salesId);
            }
            $guide_info['spg_ewm'] = base_url($guide_info['spg_ewm']);
        }
        
        if($jsoninfo['state']==true){
            $guide_info['spg_ewm'] = $jsoninfo['data'];
        }
        $this->smarty->assign("guide_info",$guide_info);
        $this->smarty->display('qrCodeOfSales.html');
    }
    
    
    //所有门店
    public function stores() {
         $user_id = isset($_SESSION['user_id']) ?$_SESSION['user_id']:"";
    	 //查找所有门店
    	 //print_r($_SESSION);die;
         $res =array('state1'=>false,'data1'=>"",'state2'=>false,'data2'=>"");
         if(!isset($_SESSION['Location'])){
             $_SESSION['Location'] = array('latitude' =>30.72161 , 'longitude'=>104.020794);
             $_SESSION['Location'] = serialize($_SESSION['Location']);
         }
         if(isset($_SESSION['Location'])){
             $Location =unserialize($_SESSION['Location']);
             $storeinfo = $this->store_model->getDistance($user_id,$Location['longitude'], $Location['latitude']);
             $nearby_store = $storeinfo['nearby_store'];$history_store = $storeinfo['history_store'];
             if($nearby_store){
                 foreach ($nearby_store as $key=>$val){
                     $this->db->select('sf.store_id,sf.brand_id,sg.brand_name');
                     $this->db->from('store_attr_brands as sf');
                     $this->db->join('shop_brand as sg','sg.brand_id=sf.brand_id');
                     $this->db->where('sf.store_id',$val['store_id']);
                     $brand_result = $this->db->get()->result_array();
                     $brand_result_str="";
                     if($brand_result){
                         foreach ($brand_result  as $ks=>$vs){
                             $brand_result_str.=$vs['brand_name']." ";
                         }
                     }
                     $nearby_store[$key]['brand_result'] = $brand_result_str;
                     if($val['ous_type']==2){
                         if($val['is_wx_store']==0){
                             unset($nearby_store[$key]);
                         }else{
                             if($val['is_wx_store_type']==1){
                                 $nearby_store[$key]['default_log']= DEFAULTIMAGE.$this->config_images_info['default_tb_image'];
                             }elseif ($val['is_wx_store_type']==2){
                                 $nearby_store[$key]['default_log']= DEFAULTIMAGE.$this->config_images_info['default_tm_image'];
                             }else{
                                 $nearby_store[$key]['default_log']= DEFAULTIMAGE.$this->config_images_info['default_jd_image'];
                             }
                         }
                     }else{
                         $nearby_store[$key]['default_log']= DEFAULTIMAGE.$this->config_images_info['store_avatar'];
                     }
                 }
             }
             if($nearby_store){
                 $res['state1'] = true;
                 $res['data1'] = $nearby_store;
             }
         
             if($history_store){
                 foreach ($history_store as $key=>$val){
                     $this->db->select('sf.store_id,sf.brand_id,sg.brand_name');
                     $this->db->from('store_attr_brands as sf');
                     $this->db->join('shop_brand as sg','sg.brand_id=sf.brand_id');
                     $this->db->where('sf.store_id',$val['store_id']);
                     $brand_result = $this->db->get()->result_array();
                     $brand_result_str="";
                     if($brand_result){
                         foreach ($brand_result  as $ks=>$vs){
                             $brand_result_str.=$vs['brand_name']." ";
                         }
                     }
                     $history_store[$key]['brand_result'] = $brand_result_str;
                     if($val['ous_type']==2){
                         if($val['is_wx_store']==0){
                             unset($history_store[$key]);
                         }else{
                             if($val['is_wx_store_type']==1){
                                 $history_store[$key]['default_log']= DEFAULTIMAGE.$this->config_images_info['default_tb_image'];
                             }elseif ($val['is_wx_store_type']==2){
                                 $history_store[$key]['default_log']= DEFAULTIMAGE.$this->config_images_info['default_tm_image'];
                             }else{
                                 $history_store[$key]['default_log']= DEFAULTIMAGE.$this->config_images_info['default_jd_image'];
                             }
                         }
                     }else{
                         $history_store[$key]['default_log']= DEFAULTIMAGE.$this->config_images_info['store_avatar'];
                     }
                 }
         
             }
             if($history_store){
                 $res['state2'] = true;
                 $res['data2'] = $history_store;
             }
         }
    	 if($this->input->is_ajax_request()){
    	    echo  json_encode( $res );exit;
    	 }
    	 $this->smarty->assign("user_id",$user_id);
    	 $this->smarty->display('user_store.html');     
    }
    
    
    //服务顾问列表
    public function shopping_guide_list(){
        $store_id = isset($_GET['storeId'])?$_GET['storeId']:'';
        $guide_info = $this->store_model->getGuideInfo(1,$store_id);
        $this->smarty->assign("guide_info",$guide_info);
        $this->smarty->display('store_shopping_guide_list.html');
    }
    //我的优惠券
        public function user_coupon(){
            $this->smarty->display('user_coupon.html');
        }
    
    //获取服务顾问
    public function shopping_guides(){
        $this->smarty->display('store_shopping_guides.html');
    }

	//获取服务顾问
	public function shopping_guide(){
	   $this->weixin_model->get_user_openid(base_url('vmall.php/store/shopping_guide'));
	   $userid = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
	   $userinfo = $this->user_model->getUserInfo($userid,"user_id,user_name,head_portrait,ecstore_id,ecshopping_guide_id");
	   if(isset($_GET['op']) && $_GET['op']=="index"){
	        $store_id = $userinfo['ecstore_id'];
	        if(empty($store_id) || $store_id==0){
	              header("location:".base_url('vmall.php/store/shopping_guides'));exit;
	        }
	   }else{
	       $store_id = isset($_GET['store_id'])?$_GET['store_id']:'';
	       if(empty($store_id) || $store_id==0){
	            $store_id = $userinfo['ecstore_id'];
    	        if(empty($store_id) || $store_id==0){
    	            header("location:".base_url('vmall.php/store/shopping_guides'));exit;
    	        }
	       }
	   }
	   
	  if(!empty($userinfo['ecshopping_guide_id'])){
	      $spg_id = $userinfo['ecshopping_guide_id'];
	      $spg_store_id = $this->db->select('spg_store_id')->where("spg_id = '{$spg_id}' ")->get('store_shopping_guide')->row('spg_store_id');
	      if($spg_store_id==$store_id){
	          $guide_info = $this->store_model->getGuideInfo(2,$spg_id);
	          $store_id = $store_id;
	          $this->smarty->assign("ecshopping",1);
	      }else{
	          $guide_info = $this->store_model->getGuideInfo(1,$store_id);
	          if($guide_info){
	              $store_id = $store_id ;
	              $this->smarty->assign("ecshopping",0);
	          }else{
	              $guide_info = array();
	              $store_id = "" ;
	              $this->smarty->assign("ecshopping",0);
	          }
	      }
	   }else{
	       $guide_info = $this->store_model->getGuideInfo(1,$store_id);
	       if($guide_info){
	           $store_id = $store_id;
	           $this->smarty->assign("ecshopping",0);
	       }else{
	           $guide_info = array();
	           $store_id = "" ;
	           $this->smarty->assign("ecshopping",0);
	       }
	   }
	   $this->smarty->assign("guide_info",$guide_info);
	   $this->smarty->assign("store_id",$store_id);
	   $this->smarty->display('store_shopping_guide.html');     
	}
	
	//检查导购是否在线
	public function guideCheckOnline(){
	    $content = isset($_POST['content'])?$_POST['content']:false;
	    $spg_ids = isset($_POST['spg_id'])?$_POST['spg_id']:false;
	    if($spg_ids){
	        $spg_ids = explode("_",$spg_ids);
	        $spg_id = $spg_ids[1];
	    }
	    $userid = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
	    $this->db->select('t.user_id,t.user_name,t.head_portrait,t.ecshopping_guide_id,t.ecstore_id,t.ecgustore_id,g.spg_id,g.spg_name,g.spg_store_id, s.store_id,s.store_name');
	    $this->db->from('user as t');
	    $this->db->join('store_shopping_guide g','g.spg_id=t.ecshopping_guide_id','left');
	    $this->db->join('store s','s.store_id=g.spg_store_id','left');
	    $this->db->where("t.user_id",$userid);
	    $userinfo = $this->db->get()->row_array();
	    //检查导购是否在线
	    $Online = $this->RongCloud_model->userCheckOnline($spg_ids);
	    $Online = json_decode($Online,true);
	    if( !($Online['code']==200 && $Online['status']==1)){
	        //不在线向导购个推信息
	        $r=array('tag'=>'userMsg','userId'=>$userid,'userName'=>$userinfo['user_name']);
	       
	        //$guide=array("guideId"=>$spg_id);
	        $data=array("title" => "会员".$userinfo['user_name']."正在微商城咨询，请接待","content"  => $content,"payload" => json_encode($r),"guideId"=>$spg_id);
	        $url = "http://api.juketz.com/index.php/App/push_msg";
	        //$url = "http://192.168.3.8/mdapi/index.php/App/push_msg";
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, $url);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
	        $result = curl_exec($ch);
	        curl_close($ch);
	        echo $result;exit;
	        //var_dump($result);die;
	    }
	}
	
	
	//用户聊天
	public function shopping_guide_chat(){
	   $this->weixin_model->get_user_openid(base_url('vmall.php/store/shopping_guide_chat'));
	    //获取登录用户id
	    $userid = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
	    
	    $this->db->select('t.user_id,t.user_name,t.head_portrait,t.ecshopping_guide_id,t.ecstore_id,t.ecgustore_id,
	       g.spg_id,g.spg_name,g.spg_store_id, s.store_id,s.store_name');
	    $this->db->from('user as t');
	    $this->db->join('store_shopping_guide g','g.spg_id=t.ecshopping_guide_id','left');
	    $this->db->join('store s','s.store_id=g.spg_store_id','left');
	   
	    $this->db->where("t.user_id",$userid);
	    $userinfo = $this->db->get()->row_array();
	    $userinfo['user_ids'] = "u_".$userinfo['user_id'];

	    $spg_id = isset($_GET['spg_id']) ?$_GET['spg_id']:"";
	    $guide_info = $this->store_model->getGuideInfo(2,$spg_id);
	    $guide_info['head_portrait'] =base_url($guide_info['head_portrait']);
	    $guide_info['spg_ids'] = "s_".$spg_id ;
	    
        /*if($userinfo['spg_id']!=$spg_id){
	        $arr = array("ecshopping_guide_id"=>$spg_id,"ecstore_id"=>$guide_info['spg_store_id']);
	        if(!$userinfo['ecgustore_id']){
	            $arr['ecgustore_id'] = $guide_info['spg_store_id'];
	        }
	        $this->common_function->set_user_wx_action($userid,3,time(),$spg_id);
	        //绑定导购id
	        $this->db->where('user_id', $userid);
	        $this->db->update('user',$arr);
	    } */
	    
	    $getToken = $this->RongCloud_model->getToken($userinfo['user_ids'], $userinfo['user_name'], $userinfo['head_portrait']);
	    $getToken =  json_decode($getToken,true);
	     
	    if($getToken['code']==200){
	        $getToken['AppKey'] = $this->RongCloud_model->getAppKey();
	        $getToken['user_name'] = $userinfo['user_name'];
	        $getToken['portraitUri'] = $userinfo['head_portrait'];
	    }else{
	        $err_msg= "code:".$getToken['code']."<br/>errorMessage:".$getToken['errorMessage'];
	        $this->common_function->show_message($err_msg);die;
	    }
	    $this->smarty->assign("guide_info",$guide_info);
	    $this->smarty->assign("user_info",$userinfo);
	    $this->smarty->assign("getToken",$getToken);
	    $this->smarty->display('store_shopping_guide_chat.html');
	     

	    
	    
  
	}
    
	//用户获聊天历史
	public function user_chat_history(){
	    $userid = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
	    $spg_id = isset($_GET['spg_id']) ?$_GET['spg_id']:"";
	    //查询聊天历史
	    $Chatlog = $this->store_model->userChatlog($userid,$spg_id);
	    $this->smarty->assign("Chatlog",$Chatlog);
	    $this->smarty->assign("spg_id",$spg_id);
	    $this->smarty->display('user_chat_history.html');
	}
	
	
	
	
	//ajax获取聊天记录
	public function get_chat_log(){
	    if($this->input->is_ajax_request()){
	        $result = array("state"=>false,"data"=>"");
	        //ajax获取更多聊天记录
	        $userid = isset($_POST['userid'])?trim($_POST['userid']):"";
	        $spg_id = isset($_POST['spg_id'])?trim($_POST['spg_id']):"";
	        $page = isset($_POST['page'])?trim($_POST['page']):"";
	        if(empty($userid) || empty($spg_id)){
	            echo json_encode($result);exit;
	        }
	        $Chatlog = $this->store_model->getChatlog($userid,$spg_id,$page,10);
	        if(!empty($Chatlog)){
	            $result['state'] = true;
	            $result['data'] = $Chatlog;
	        }
	        echo json_encode($result);exit;
	    }
	}
	
	
	
	
	
	
	
	//保存聊天记录
	public function add_chat_log(){
      if($this->input->is_ajax_request()){
          $inner['spg_id'] = isset($_POST['spg_id'])?trim($_POST['spg_id']):"";
          $inner['user_id'] = isset($_POST['userid'])?trim($_POST['userid']):"";
          $inner['store_id'] = $this->db->select('spg_store_id')->where('spg_id',trim($_POST['spg_id']))->get('store_shopping_guide')->row('spg_store_id');
          $inner['send_time'] = time();
          $inner['send_content'] = $_POST['content'];
          $flag = isset($_POST['flag'])?($_POST['flag']):"";
          if($flag=="user"){
              $inner['source'] = 1;
          }else{
              $inner['source'] = 2;
          }
          $res = array();
          if($this->db->insert('user_chat_log',$inner)){
              $res['state'] = true;
              $res['msg'] = "保存成功";
          }else{
              $res['state'] = false;
              $res['msg'] = "保存失败";
          }
          return  json_encode($res);exit;
      }
	}

	
	
	
	public function activity_list(){
	   $this->smarty->display('store_activity_list.html');     
	}
	
    

	

	
}
