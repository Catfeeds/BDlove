<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
    
        parent::__construct();
        $this->load->library ( 'common_function' );
        $this->load->model("user_model");
        $this->load->model('weixin_model');
        $config_images = $this->common_function->get_default_img();
        $this->smarty->assign('config_images', $config_images);
    }
    

    
	public function index(){
	    $this->weixin_model->get_user_openid(base_url('vmall.php/user/index'));
	    $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
//	    $_SESSION['user_id']=113;
	    $store_id = isset($_SESSION['last_ecstore_id'])?$_SESSION['last_ecstore_id']:"";
        //openid获取用户信息
        $userinfo = $this->user_model->get_openid_info($user_id);
        $this->smarty->assign('userinfo',$userinfo);
        $this->smarty->assign('store_id',$store_id);
        
        //查看是否有冻结资金（是否有提现申请）
        $this->db->select('amount,user_name');
        $this->db->from('withdraw_apply');
        $this->db->where('apply_user_id',$user_id);
        $this->db->where('apply_type',1);
        $this->db->where('state',0);
        $applyinfo = $this->db->get()->row_array();
        $amount = 0;
        if($applyinfo){
            $amount = $applyinfo['amount'];
        }
        $this->db->select('balance');
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $userinfo = $this->db->get()->row_array();
        $balance = number_format(($userinfo['balance'] - $amount), 2, '.', '');
        //查询可使用卡券数量
//        $this->db->select('log.wheels_log_id');
//        $this->db->from('shop_p_lottery_wheel_log as log');
//        $this->db->join('shop_p_lottery_wheel_prize as prize','log.wheel_prize_id=prize.wheels_prize_id');
//        $this->db->where('prize.end_time>',time());
//        $this->db->where('log.user_id',$user_id);
//        $this->db->where('log.is_open',null);
//        $data=$this->db->get()->result_array();
        $this->db->select ('uc.user_coupon_id,uc.coupon_activity_id,uc.coupon_activity_type,sc.coupon_value,
                    sc.coupon_start_time,sc.coupon_end_time,sc.flexible_day,sc.time_state,sc.coupon_desc,sc.coupon_name,
                    sc.coupon_id,sc.limit_goods,sc.limit_store,sc.limit_goods_type,sc.limit_store_type');//count(user_coupon_id) as coupon_num
        $this->db->from ('user_coupon as uc');
        $this->db->join ('shop_coupon as sc', "uc.coupon_id=sc.coupon_id");
        $this->db->where ('uc.user_id', $user_id);
        $this->db->where ('uc.coupon_cost_time', null);
        $this->db->where ('sc.coupon_end_time>', time());
        $data = $this->db->get()->result_array ();
        foreach($data as $k=>$v) {
            $check_coupon = $this->db->select ('count(so.coupon_id) as num')->from ('shop_order_goods so')
                ->join ('shop_order o', 'o.order_sn=so.order_sn')
                ->join ('user_coupon uc', 'uc.user_coupon_id=so.coupon_id')
                ->where ('so.coupon_id', $v['user_coupon_id'])->where ('o.order_status<>', 0)
                ->get ()->row ('num');
            if (empty($check_coupon)) {
            } else {
                unset($data[$k]);//删除已生成订单的优惠券
            }
        }
        sort($data);
        $total=count($data);

//        var_dump ($data);

        $this->smarty->assign('balance',$balance);
        $this->smarty->assign('total',$total);
        $this->smarty->display('user_center.html');
       
	}
	public function user_address(){
	   $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
	   if(empty($user_id)){
	       return  false;
	   }
	   $sql = "select * from {$this->db->dbprefix('user_address')}   where  user_id='{$user_id}'";
	   $address = $this->db->query($sql) ->result_array();
	   $temp = array();
	   //print_r($address);die;
	   
	   if($address){
	       foreach($address as $key=>$val){
	       	//print_r($val);
	           $addressPicker = $this->user_model->get_area_infos($val['province_id'],$val['city_id'],$val['area_id']);
	           //print_r($addressPicker);
	           $address[$key]['addressPicker'] = str_replace(","," ",$addressPicker);
	           if($address[$key]['is_default'] == 1){
	           		$temp = $address[0];
	           		$address[0] = $address[$key];
	           		$address[$key] = $temp;
	           }
	       }//die;
	   }
       //print_r($address);die;
	   $this->smarty->assign('address',$address);
	   $this->smarty->display('user_address.html');     
	}
	public function user_address_add(){
	    $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
	    $ua_id = isset($_GET['id']) && !empty($_GET['id'])?$_GET['id']:false;
	    if(isset($_GET['op']) && $_GET['op']=="edit"){
	       $sql = "select * from {$this->db->dbprefix('user_address')}   where  ua_id='{$ua_id}'";
	       $address = $this->db->query($sql) ->row_array();
	       $address['addressPicker'] = $this->user_model->get_area_infos($address['province_id'],$address['city_id'],$address['area_id']);
	       $address['addressPickers'] = $address['province_id'].",".$address['city_id'].",".$address['area_id'];
	       $this->smarty->assign('address',$address);
	       $this->smarty->assign('ua_id',$ua_id);
	   }elseif(isset($_GET['op']) && $_GET['op']=="add"){
	       $this->smarty->assign('ua_id',0);
	   }elseif($this->input->is_ajax_request()){
	       $data['rec_name'] = $_POST['data'][0];
	       $data['tel'] = $_POST['data'][1];
	       $area = explode(",",$_POST['data'][2]);
	       $data['province_id'] = $area[0];
	       $data['city_id'] = $area[1];
	       $data['area_id'] = $area[2];
	       $data['user_id'] = $user_id;
	       $data['address'] = $_POST['data'][3];
	       $data['is_default'] = $_POST['data'][4];
	       if($data['is_default']==1){
	           $sql = "select ua_id,user_id,is_default from {$this->db->dbprefix('user_address')}   where  user_id='{$user_id}'";
	           $address = $this->db->query($sql) ->result_array();
	           if($address){
	               foreach($address as $key=>$val){
	                   if($val['is_default']==1){
	                       $this->db->where('ua_id',$val['ua_id']);
	                       $this->db->update('user_address',array("is_default"=>0));
	                   }
	               }
	           }
	       }
	       
	       if($_POST['ua_id']==0){
	           //添加收货地址
	           $result = array('state'=>false, 'msg'=>"收货地址添加失败");
	           $res=$this->db->insert('user_address',$data);
	           if($res){
	               $result['state'] = true;
	               $result['msg'] 	= "收货地址添加成功";
	           }
	       }else{
	           //编辑收货地址
	           $result = array('state'=>false, 'msg'=>"收货地址编辑失败");
	           $this->db->where_in('ua_id',$_POST['ua_id']);
	           $res = $this->db->update('user_address',$data);
	           if($res){
	               $result['state'] = true;
	               $result['msg'] 	= "收货地址编辑成功";
	           }
	       }
	       echo  json_encode($result);exit;
	   }
	  //查询省市区信息所有信息
	  $area_info = $this->user_model->get_area_info(0);
	  $this->smarty->assign('area_info',$area_info);
	  $this->smarty->display('user_address_add.html');     
	}

	//删除收货地址
	public function user_address_delete(){
		$user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
		$ua_id = $this->input->post('ua_id');
		$res =array();
		if($user_id){
			
			//print_r($ua_id);die;
			$this->db->select('ua_id,user_id');
			$this->db->from('user_address');
			$this->db->where('ua_id',$ua_id);
			$result = $this->db->get()->row_array();
			//print_r($result);die;
			if($result){
				$this->db->where('ua_id',$ua_id);
				$this->db->delete('user_address');
				$res['state'] = true;
				$res['msg'] = "删除成功";
			}else{
				$res['state'] = false;
				$res['msg'] = "删除失败";
			}
			
		}else{
			$res['state'] = false;
			$res['msg'] = "数据错误";
		}
		echo  json_encode($res);exit;
	}

	//设置默认地址
	public function set_default_address(){
		$user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
		$ua_id = $this->input->post('ua_id');
		//print_r($ua_id);die;
		$res = array();
		if($user_id){
			//取消原有默认地址
			$this->db->select('ua_id,user_id,is_default');
			$this->db->from('user_address');
			$this->db->where('user_id',$user_id);
			$result = $this->db->get()->result_array();
			//print_r($result);die;
			if($result){
				foreach ($result as $key => $val) {
					if($val['is_default'] == 1){
						$this->db->where('ua_id',$val['ua_id']);
	                    $this->db->update('user_address',array("is_default"=>0));
					}
				}
			}
			//设置新的默认地址
			$this->db->where('ua_id',$ua_id);
	        $this->db->update('user_address',array("is_default"=>1));
	        $res['state'] = true;
		}else{
			$res['state'] = false;
			$res['msg'] = "数据错误";
		}
		echo  json_encode($res);exit;
	}
	
	public function user_order(){
	   $this->smarty->display('user_order.html');     
	}
	
	//我的商品/店铺收藏
	public function user_collection()
    {
//		$this->weixin_model->get_user_openid(base_url('vmall.php/user/user_collection'));
		if(isset($_GET['type']) && $_GET['type']==='goods')
		{
			$this->db->select('sf.fav_id,sf.store_id,sf.goods_ea_id,sf.goods_name,sf.goods_image,sf.log_price,sgc.gc_name,sgc.gc_id');
			$this->db->from('shop_favorites as sf');
			$this->db->join('shop_goods_class as sgc','sf.gc_id=sgc.gc_id');
			$this->db->where('sf.fav_type','goods');
			$this->db->where('sf.member_id', $_SESSION['user_id']);
		
			//            $db = clone($this->db);
			//            $total=count($this->db->get()->result_array());
			//            $this->db=$db;
		
			if(isset($_GET['goods_name']) && !empty($_GET['goods_name'])){
				$goods_name=$_GET['goods_name'];
				$is_goods=1;
				$this->db->like('sf.goods_name',$goods_name);
			}else{
				$is_goods=0;
			}
			$db = clone($this->db);
			$data=$this->db->get()->result_array();
			$this->db=$db;
			//            var_dump ($data);die;
		
		
			$classify = array ();
			$gc_id = array ();
			foreach ($data as $k => $v) {
				if (!in_array ($v['gc_id'], $gc_id)) {
					$gc_id[] = $v['gc_id'];
					$classify[$k]['gc_id'] = $v['gc_id'];
					$classify[$k]['gc_name'] = $v['gc_name'];
				}
			}
			$this->smarty->assign('classify',$classify);
		
			if(isset($_GET['gc_id']) && !empty($_GET['gc_id'])){
				$gc_id=$_GET['gc_id'];
				$this->db->where('sf.gc_id',$gc_id);
				$data=$this->db->get()->result_array();
				//                var_dump ($data);die;
			}
		
			foreach($data as $key=>$v1){
				$data[$key]['checkbox_id']='s'.$key;
			}
		
			$this->smarty->assign('is_goods',$is_goods);
			$this->smarty->assign('data',$data);
			//            $this->smarty->assign('total',$total);
			$this->smarty->display('user_goodscollect.html');
		}
		
		if(isset($_GET['type']) && $_GET['type']==='store')
		{
			$this->db->select('s.store_name,sf.store_id,s.ous_logo');
			$this->db->from('shop_favorites as sf');
			$this->db->join('store as s','s.store_id=sf.store_id');
			$this->db->where('sf.fav_type','store');
			$this->db->where('sf.member_id', $_SESSION['user_id']);
			if(isset($_GET['store_name'])){
				$store_name=$_GET['store_name'];
				$is_store=1;
				$this->db->like('s.store_name',$store_name);
			}else{
				$is_store=0;
			}
			$data=$this->db->get()->result_array();
			foreach($data as $key=>$v1){
				$data[$key]['checkbox_id']='s'.$key;
			}
			$this->smarty->assign('is_store',$is_store);
			$this->smarty->assign('data',$data);
			$this->smarty->display('user_storecollect.html');
		}
    }
	public function user_coupon_list(){
	   $this->smarty->display('user_coupon_list.html');  
	}
	public function user_coupon_use(){
	   $this->smarty->display('user_coupon_use.html');  
	}
	public function user_coupon_use_info(){
	   $this->smarty->display('user_coupon_use_info.html');     
	}
	public function user_store(){
	   $this->smarty->display('user_store.html');     
	}

	//用户信息跟新页面
	public function user_updateperson(){
		$this->weixin_model->get_user_openid(base_url('vmall.php/user/index'));
		$user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
		$this->db->select('wx_nickname,user_email,integral_total,tel,member_sex,head_portrait,qq,birthday,province_id,city_id,area_id');
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $wxuser_info = $this->db->get()->row_array();
        //print_r($wxuser_info);die;
        if($wxuser_info['integral_total']>=0 && $wxuser_info['integral_total']<10000){
        	$wxuser_info['lv'] = "LV0";
        }
        if($wxuser_info['integral_total']>=10000 && $wxuser_info['integral_total']<30000){
        	$wxuser_info['lv'] = "LV1";
        }
        if($wxuser_info['integral_total']>=30000 && $wxuser_info['integral_total']<60000){
        	$wxuser_info['lv'] = "LV2";
        }
        if($wxuser_info['integral_total']>=60000){
        	$wxuser_info['lv'] = "LV3";
        }
        //print_r($wxuser_info['lv']);die;
        //显示地址
        $address['addressPicker'] = $this->user_model->get_area_infos($wxuser_info['province_id'],$wxuser_info['city_id'],$wxuser_info['area_id']);
	    $address['addressPickers'] = $wxuser_info['province_id'].",".$wxuser_info['city_id'].",".$wxuser_info['area_id'];
	    $this->smarty->assign('address',$address);
        //print_r($wxuser_info);die;
 
        //查询省市区信息所有信息
	  	$area_info = $this->user_model->get_area_info(0);
//	  	var_dump ($area_info);die;
	 	$this->smarty->assign('area_info',$area_info);
        $this->smarty->assign('wxuser_info',$wxuser_info);
		$this->smarty->display('user_updateperson.html');

	}

	//用户绑定手机
	public function user_valtephone(){
		$this->smarty->display('user_valtephone.html');
	}
	
	//向用户发送验证码
	public function send_code(){
		$code=rand(100000,999999);
		//var_dump($customer);die;
		$phone = $this->input->post('phone');
		//print_r($phone);die;
		$res =array();
		$data['phone'] = $phone;
		$data['template_sms_id'] = 'SMS_62130007';
		$content = array('code'=>"$code",'product'=>"聚客360");
		$data['content'] = json_encode($content);
		$res = $this->common_function->AlidayuSms($data);
		//print_r($res);die;
		$flag = 0;
	    if(isset($res['result']['success'])&&$res['result']['success']==true){
	       	$send_code = array("phone"=>$phone,"Code"=>$code,"times"=>time());
	        $this->session->set_userdata(array("send_code"=>$send_code));
	        $flag = 1;
	        $res['state'] = true;
	        $res['errmsg'] = "发送验证码成功";

	    }else{
	        $flag = 0;
	        $res['state'] = false;
	        $res['errmsg'] = "发送验证码失败";
	    }
		
		echo  json_encode($res);exit;
	}

	//验证用户的验证码
	public  function user_bind_tel(){
		$this->weixin_model->get_user_openid(base_url('vmall.php/user/index'));
		$user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
	    $code = $this->input->post('yzm');
	    $phone = $this->input->post('phone');
	    $times = time();
	    $res =array();
	    $send_code = isset($_SESSION["send_code"]) && !empty($_SESSION["send_code"])?$_SESSION["send_code"]:false;
	    if($send_code){
	        $old_code = $send_code['Code'];
	        $old_time = $send_code['times'];
	        $old_phone  = $send_code['phone'];
	        if($old_time == ""){
	        	$old_time = $times;
	        }
	        if(($times-$old_time<600) && ($old_phone == $phone)){
	            if($code == $old_code ){
	            	$res=$this->user_model->userBindTel($phone,$user_id);
	            	if($res['state'])
	            	{
	            		$_SESSION['user_id']=$res['data']['userId'];
	                    $res['state'] = true;
	                    $res['errmsg'] = "绑定成功";
// 更新短信日志，查看是否是因为短信绑定的。
//						$this->common_function->update_sms_log_effective($phone);
	            	}
	            	else{
	            		$res['state'] = true;
	                    $res['errmsg'] = "绑定失败,".$res['errmsg'];
	            	}
	            	
	            }else{
	                $res['state'] = false;
	                $res['errmsg'] = "验证码错误";
	            }
	        }elseif($old_phone != $phone){
	            $res['state'] = false;
	            $res['errmsg'] = "手机号码错误";
	        }else{
	        	$res['state'] = false;
	            $res['errmsg'] = "验证码已过期";
	        }   
	    }else{
	    	$res['state'] = false;
	        $res['errmsg'] = "验证码发送失败，请重新尝试";
	    }
	    echo  json_encode($res);exit;
	}

	//绑定邮箱
	public function send_email(){
		$this->weixin_model->get_user_openid(base_url('vmall.php/user/index'));
		$user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
		$email = $this->input->post('email');
		//print_r($email);die;
		
		$res =array();
		if($email){
			$this->db->where('user_id', $user_id);
	        $this->db->update('user', array("user_email"=>$email));
			$res['state'] = true;
	        $res['errmsg'] = "完成";
			//print_r($email);die;
			//print_r($email[0][0]);die;
		}else{
			$res['state'] = false;
	        $res['errmsg'] = "请输入正确的邮箱地址";
		}

		//var_dump($email);die;
		echo  json_encode($res);exit;
	}

	public function wu_info(){
		$this->weixin_model->get_user_openid(base_url('vmall.php/user/index'));
		$user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
		$sextest = $this->input->post('wxsex');
		$birth = $this->input->post('wxbir');
		$qq = $this->input->post('wxqq');
		$wxadd = $this->input->post('wxadd');
//		print_r($wxadd);
//		var_dump($wxadd);die;
		$res = array();
		//存储性别
		if($sextest){
			if($sextest == "保密"){
				$sex = 0;
				$this->db->where('user_id', $user_id);
	        	$this->db->update('user', array("member_sex"=>$sex));
	        	$res['sex'] = "保密";
			}
			if($sextest == "男"){
				$sex = 1;
				$this->db->where('user_id', $user_id);
	        	$this->db->update('user', array("member_sex"=>$sex));
	        	$res['sex'] = "男";
			}
			if($sextest == "女"){
				$sex = 2;
				$this->db->where('user_id', $user_id);
	        	$this->db->update('user', array("member_sex"=>$sex));
	        	$res['sex'] = "女";
			}	
		}
		//存储生日
		if($birth){
			$this->db->where('user_id', $user_id);
	        $this->db->update('user', array("birthday"=>$birth));
	        $res = explode("-", $birth);
		}
		//存储qq
		if($qq){
			$this->db->where('user_id', $user_id);
	        $this->db->update('user', array("qq"=>$qq));
	        $res = $qq;
		}
		//存储所在地
		if($wxadd){
			$wx_add = explode(",", $wxadd);
//			print_r($wx_add);
			$this->db->where('user_id', $user_id);
	        $r=$this->db->update('user', array("province_id"=>$wx_add[0],"city_id"=>$wx_add[1],"area_id"=>$wx_add[2]));
	        $res = $wx_add;
		}
		echo  json_encode($res);exit;

	}
	
	//用户购物车
	public function user_shopping_cart(){
	   $this->weixin_model->get_user_openid(base_url('vmall.php/user/user_shopping_cart'));
	   $user_id = isset($_SESSION['user_id']) ?$_SESSION['user_id']:'';
	   $tel = isset($_SESSION['tel']) ?$_SESSION['tel']:"";
	   $where = ' sc.buyer_id='.$user_id;
	   $shopCart = $this->db->select('sc.*,sa.stocks_price,sa.ssa_id,sa.amount,s.store_name,s.ous_logo,sg.logistics_type')->from('shop_cart as sc')
	   ->join('store_stocks_amount as sa','sa.goods_ea_id=sc.goods_ea_id and sa.ssa_store_id=sc.store_id','left')
	   ->join('store as s','s.store_id=sc.store_id','left')
	   ->join('shop_goods as sg','sg.goods_id=sc.goods_id','left')
	   ->where($where)->order_by('receive_type')->get()->result_array();
	   $carts = array();
	   foreach ($shopCart as $v){
	       $carts[$v['store_id']]['goods'][] = $v;
	       $carts[$v['store_id']]['store_id'] = $v['store_id'];
	       $carts[$v['store_id']]['store_name'] = $v['store_name'];
	       $carts[$v['store_id']]['ous_logo'] = $v['ous_logo'];
	   }
	   $this->smarty->assign('user_id',$user_id);
	   $this->smarty->assign('tel',$tel);
	   $this->smarty->assign('action', "cart");
	   $this->smarty->assign('carts', $carts);
	   $this->smarty->assign('colorflag', "carts");
	   $userCartTotal = $this->common_function->get_user_cart_total($user_id);
	   $this->smarty->assign('userCartTotal', $userCartTotal);
	   
	   $this->smarty->display('user_shopping_cart.html');     
	}
    
    public function deleteCart(){
        $cartId = isset($_GET['CartId'])?intval($_GET['CartId']):'';
        $user_id = isset($_SESSION['user_id']) ?$_SESSION['user_id']:'113';
        $result = array('state'=>false);
        if($cartId&&$user_id){
            $this->db->delete('shop_cart',array('cart_id'=>$cartId));
            $userCartTotal = $this->common_function->get_user_cart_total($user_id);
            $result = array('state'=>true,'data'=>$userCartTotal);
            echo json_encode($result);exit;
        }
        echo json_encode($result);exit;
    }
	
	
	
	//获取 并设置用户位置坐标
	public  function steUserLocation(){
	    $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
	    $longitude = isset($_POST['long']) ?$_POST['long']:false;
	    $latitude = isset($_POST['lat']) ?$_POST['lat']:false;
	    if($longitude && $latitude){
	        //获取当前位置加上偏移量会准一点
	        //经度+经度校正值： 0.008774687519;
	        //纬度+纬度校正值： 0.00374531687912;
	        $longitude+=0.008774687519;
	        $latitude+=0.00374531687912;
	        $Location=serialize(array("longitude"=>$longitude,"latitude"=>$latitude,"user_id"=>$user_id));
	        $this->session->set_userdata(array("Location"=>$Location));
	    }
	    echo  json_encode("");exit;
	}
	//删除收藏的商品/店铺
    public function delete(){
	    if(isset($_GET['goods_id'])){
            $goods_id=$_GET['goods_id'];
                    $this->db->delete('shop_favorites', array('fav_id' => $goods_id,'fav_type' => 'goods','member_id'=>$_SESSION['user_id']));
        }
        if(isset($_GET['store_id'])){
            $store_id=$_GET['store_id'];
                    $this->db->delete('shop_favorites', array('store_id'=>$store_id,'fav_type' =>'store','member_id'=>$_SESSION['user_id']));
        }




    }


	
}
