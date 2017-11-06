<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->library("shop");
        $this->load->model("user_model");
        $this->load->model("order_model");
        $this->load->model("store_model");
        $this->load->model('weixin_model');
        $config_images = $this->common_function->get_default_img();
        $this->smarty->assign('config_images', $config_images);
    }
	
	public function index(){
	   $this->weixin_model->get_user_openid(base_url('vmall.php/order/index'));
//	   $_SESSION['user_id'] = 94;
	   //print_r($_SESSION);die;
	   $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:false;
	   if(empty($user_id)){
	   	    die;
	   }
	   $user_mobile = $this->db->select('tel')->where('user_id',$user_id)->get('user')->row('tel');
	   $type=$this->uri->segment(3);
	   if(!empty($user_mobile)){
	   	    $where = " ((o.buyer_id={$user_id} and order_type iN (1,2,4)) or (o.receive_mobile={$user_mobile} and order_type=3))";
	   }else{
	    	$where = " o.buyer_id={$user_id} and order_type iN (1,2,4)";
	   }
	   if($type==1){
	       $where .=" AND o.order_status=10 AND o.order_type!=3 ";
	   }elseif($type==2){
	       $where .=" AND (((o.order_status=20 or o.order_status=30 or o.order_status=31) and o.order_type!=3) or ((o.uec_order_status in(20,30,31) ) and o.order_type=3) ) AND  o.shipping_type=1 ";
	   }elseif($type==3){
	       $where .=" AND o.order_status=20 AND  o.shipping_type=2 AND o.order_type!=3 ";
	   }elseif($type==4){
	       $where .=" AND (o.order_status=40 or o.order_status=50) AND  o.evaluation_state=0 ";
	   }elseif($type==5){
	       $where .=" AND o.order_status=0 ";
	   }
	   $orderAll = $this->db->select('sg.*,o.order_sn,o.order_from,o.order_type,o.pay_type,o.order_status,o.store_id as storeid,o.store_name,o.spg_id,o.spg_name,o.counpon_amount,
	   		o.create_carriage,o.carriage,o.uec_carriage_price,o.uec_order_status,o.uec_order_time,o.bind_ecstore_name,o.out_order_sn,o.uec_goods_price,o.created_time,
	       o.buyer_id,o.shipping_type,o.order_price,o.evaluation_time,o.evaluation_state,sr.refund_type,sr.seller_state,sr.refund_state
	       ')->from('shop_order as o')->join('shop_order_goods as sg','sg.order_sn=o.order_sn','left') ->join('shop_order_refund_return as sr','sr.order_sn=o.order_sn and sr.goods_id=sg.goods_id','left')
	       ->where($where)->order_by('o.created_time','DESC')->get()->result_array();
	   $rows = array();
	   $from = $this->order_model->order_from();
	   $order_status1 = $this->order_model->order_status(1);
	   $order_status2 = $this->order_model->order_status(2);
	   $seller_refund_state = "";//未申请退款
	
	   foreach ($orderAll as $k=>$v){
	   	   $rows[$v['order_sn']]['order_sn'] = $v['order_sn'];
	       $rows[$v['order_sn']]['counpon_amount'] = empty($v['counpon_amount'])?0:$v['counpon_amount'];
	       $rows[$v['order_sn']]['evaluation_time'] = $v['evaluation_time'];
	       $rows[$v['order_sn']]['evaluation_state'] = $v['evaluation_state'];
	       if(empty($v['evaluation_state'])){
	           $rows[$v['order_sn']]['evaluation_id'] = '';
	           $rows[$v['order_sn']]['evaluation_name'] = '待评价';
	       }elseif($v['evaluation_state']==1){
	           $rows[$v['order_sn']]['evaluation_id'] = 1;
	           $rows[$v['order_sn']]['evaluation_name'] = '已评价';
	       }elseif($v['evaluation_state']==2){
	           $rows[$v['order_sn']]['evaluation_id'] = 1;
	           $rows[$v['order_sn']]['evaluation_name'] = '评价已过期';
	       }
	       $rows[$v['order_sn']]['order_type'] = $v['order_type'];
	       $rows[$v['order_sn']]['shipping_type'] = $v['shipping_type'];
	       $rows[$v['order_sn']]['order_status'] = in_array($v['order_from'],array(41,42))?$v['uec_order_status']:$v['order_status'];
	       $rows[$v['order_sn']]['order_from'] = isset($from[$v['order_from']])?$from[$v['order_from']]:'';
	       $rows[$v['order_sn']]['order_price'] = $v['order_price'];
	       $rows[$v['order_sn']]['spg_id'] = $v['spg_id'];
	       $rows[$v['order_sn']]['goods_num'] = $v['goods_num'];
	       $rows[$v['order_sn']]['create_carriage'] = $v['create_carriage'];
	       $rows[$v['order_sn']]['carriage'] = $v['carriage'];
	       $rows[$v['order_sn']]['uec_goods_price'] = empty($v['uec_skuiid_iid'])?$v['order_price']:$v['uec_goods_price'];
	       $rows[$v['order_sn']]['uec_carriage_price'] = empty($v['uec_skuiid_iid'])?$v['carriage']:$v['uec_carriage_price'];
	       $rows[$v['order_sn']]['uec_order_status'] = ($v['uec_order_status']=='')?$v['order_status']:$v['uec_order_status'];
	       $rows[$v['order_sn']]['uec_order_time'] = empty($v['uec_order_time'])?date('Y-m-d H:i:s',$v['created_time']):date('Y-m-d H:i:s',$v['uec_order_time']);
	       $rows[$v['order_sn']]['bind_ecstore_name'] = $v['bind_ecstore_name'];
	       $rows[$v['order_sn']]['out_order_sn'] = in_array($v['order_from'],array(41,42))?$v['out_order_sn']:$v['order_sn'];
	       $v['uec_goods_image'] = empty($v['uec_goods_image'])?$v['goods_image']:$v['uec_goods_image'];
	       $v['uec_goods_size'] = ($v['uec_goods_size']=='')?$v['goods_size']:$v['uec_goods_size'];
	       $v['uec_stock_price'] = empty($v['uec_skuiid_iid'])?$v['goods_price']:$v['uec_stock_price'];
	       $v['uec_goods_color'] = empty($v['uec_goods_color'])?$v['goods_color'].$v['goods_color_remark']:$v['uec_goods_color'];
	       $v['uec_goods_name'] = empty($v['uec_goods_name'])?$v['goods_name']:$v['uec_goods_name'];
	       $rows[$v['order_sn']]['goods'][]=$v;
	       if(!isset($rows[$v['order_sn']]['goodsAll'])){
	           $rows[$v['order_sn']]['goodsAll']=1;
	       }else{
	           $rows[$v['order_sn']]['goodsAll']+=1;
	       }
	       
	   }
//	   print_r($rows);die;
//        print_r($order_status1);print_r($order_status2);
	   $this->smarty->assign('rows',$rows);
	   $this->smarty->assign('type',$type);
	   $this->smarty->assign('order_status1',$order_status1);
	   $this->smarty->assign('order_status2',$order_status2);
	   $this->smarty->display('order_list.html');     
	}
	
	
	
	
	public function order_detail(){
	   $this->weixin_model->get_user_openid(base_url('vmall.php/order/order_detail'));
	   $order_sn = trim($_GET['order_sn']);
//	   $order_sn=explode(",",$order_sn);
//       var_dump($order_sn);
	   $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:false;
	   //openid获取用户信息
	   $userinfo = $this->user_model->get_openid_info($user_id);
	   $this->smarty->assign('userinfo',$userinfo);

	   if($order_sn){
//	       foreach($order_sn as $key=>$v) {
               $detail = '';
               $order = $this->order_model->order_info ($order_sn);
               $reciveInfo=$order['reciveInfo'];
               $orderInfo=$order['orderInfo'];
//               var_dump ($reciveInfo);
               $goodsAll = count ($order['orderInfo']);
               $this->smarty->assign ('reciveInfo', $order['reciveInfo']);
               $this->smarty->assign ('orderInfo', $order['orderInfo']);

               //print_r($order);die;

               $order_status = $order['orderInfo'][0]['order_status'];
               $pay_type = $order['orderInfo'][0]['pay_type'];
               //订单服务导购
               $store_id = $order['orderInfo'][0]['store_id'];
               $spg_id = $order['orderInfo'][0]['spg_id'];
               //$guide_info = $this->user_model->getUserInfo($user_id,"user_id,user_name,head_portrait,ecstore_id,ecshopping_guide_id");
               $guide_info = $this->store_model->getGuideInfo (2, $spg_id);
               $guide_arr = array ();
               if (!isset($guide_info['spg_id']) || empty($guide_info[$key])) {
                   $guide = $this->store_model->getGuideInfo (1, $store_id);
                   $guide_arr['result'] = "false";
                   $guide_arr['guides_infos'] = isset($guide[0]) ? $guide[0] : '';
               } else {
                   //$spg_id = $guide_info['ecshopping_guide_id'];
                   $guide_arr['result'] = "true";
                   if (empty($guide_info['spg_ewm'])) {
                       $url = base_url ("vmall.php/receive/download_much_short?id=" . $spg_id);
                       $ch = curl_init ();
                       curl_setopt ($ch, CURLOPT_URL, $url);
                       curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                       curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                       $output = curl_exec ($ch);
                       curl_close ($ch);
                       $jsoninfo = json_decode ($output, true);
                       $guide_info = $this->store_model->getGuideInfo (2, $spg_id);
                   }
                   $guide_info['spg_ewm'] = base_url ($guide_info['spg_ewm']);
                   $guide_arr['guide_info'] = $guide_info;
               }
               $this->smarty->assign ('guide_arr', $guide_arr);
               $this->smarty->assign ('goodsAll', $goodsAll);

               /* $store = $this->db->select('s.store_name,s.store_id,s.ept_show_desc,s.is_show_ept_desc')
               ->from('store s')->where('s.store_id',$store_id)->get()->row_array();
               $spg = $this->db->select('spg_id,spg_nike_name,spg_name,spg_tel,role_type,spg_store_id,spg_ewm,head_portrait')
               ->where('spg_id',$spg_id)->get('store_shopping_guide')->row_array();
               $store_spg = $this->db->select('spg_id,spg_nike_name,spg_name,spg_tel,role_type,spg_store_id,spg_ewm,head_portrait')
               ->where('spg_store_id',$store_id)->get('store_shopping_guide')->result_array(); */
               //print_r($order_status);print_r($goodsAll);die;
               $jsApiParameters = array ();//微信支付
               if ($order_status == 10 && $pay_type == 1) {
                   ini_set ('date.timezone', 'Asia/Shanghai');
                   //error_reporting(E_ERROR);
                   require_once ROOTPATH . "libraries/Wxpay/lib/WxPay.Api.php";
                   require_once ROOTPATH . "libraries/Wxpay/example/WxPay.JsApiPay.php";
                   require_once ROOTPATH . 'libraries/Wxpay/example/log.php';
                   //支付信息
                   $payMoney = $order['reciveInfo']['pay_money'];
                   $payMoney = intval ($payMoney * 100);
                   //$payMoney = 1;
                   $urlData = base_url ('vmall.php/order/ordersuccess?');
                   foreach ($order['reciveInfo'] as $k => $v) {
                       $urlData .= $k . '=' . $v . '&';
                   }
                   $data[$key]['orderSuccess']=$urlData;
                   $this->smarty->assign ('orderSuccess', $urlData);
                   //①、获取用户openid
                   $tools = new JsApiPay();
                   //$openId = $tools->GetOpenid();
                   $openId = $_SESSION['wx_openid'];
                   $notify_url = base_url ('vmall.php/wxpay/notify');
                   //②、统一下单
                   $input = new WxPayUnifiedOrder();
                   $setBody = $order_sn;
                   $setAttach = $pay_sn = $this->common_function->makePaySn ($user_id);
                   $this->db->update ('shop_order', array ('pay_sn' => $pay_sn), array ('order_sn' => $order_sn));
                   $input->SetBody ($setBody);
                   $input->SetAttach ($setAttach);
                   $input->SetOut_trade_no (WxPayConfig::MCHID . date ("YmdHis"));
                   $input->SetTotal_fee ($payMoney);
                   $input->SetTime_start (date ("YmdHis"));
                   $input->SetTime_expire (date ("YmdHis", time () + 600));
                   $input->SetGoods_tag ("");
                   $input->SetNotify_url ($notify_url);
                   $input->SetTrade_type ("JSAPI");
                   $input->SetOpenid ($openId);
                   $order = WxPayApi::unifiedOrder ($input);
                   $jsApiParameters = $tools->GetJsApiParameters ($order);
                   $jsApiParameters = object_array (json_decode ($jsApiParameters));
                   //print_r($_SESSION);print_r($jsApiParameters);die;
//                   $data[$key]['jsApiParameters']=$jsApiParameters;
                   $this->smarty->assign ('jsApiParameters', $jsApiParameters);
               }
//               $data[$key]['reciveInfo']=$reciveInfo;
//               $data[$key]['orderInfo']=$orderInfo;
//               $data[$key]['guide_arr']=$guide_arr;
//               $data[$key]['goodsAll']=$goodsAll;
//               $data[$key]['userinfo']=$userinfo;
           }
//           var_dump($data);
//           var_dump ($reciveInfo);var_dump ($orderInfo);var_dump ($guide_arr);var_dump ($goodsAll);
//           $this->smarty->assign ('reciveInfo', $reciveInfo);
//           $this->smarty->assign ('orderInfo', $orderInfo);
//           $this->smarty->assign ('guide_arr', $guide_arr);
//           $this->smarty->assign ('goodsAll', $goodsAll);
           //print_r($order['reciveInfo']);die;
//           $this->smarty->assign ('data', $data);
	       $this->smarty->display('order_details.html');
//	   }
	      
	}



    public function buy_confirm(){
    	$this->weixin_model->get_user_openid(base_url('vmall.php/order/buy_confirm'));
        $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :false;
        $info = isset($_GET['info'])?$_GET['info']:'';
        $op = isset($_GET['op'])?$_GET['op']:'';
        if($op&&$op=='buy_now'&&$user_id){
            $carts = array();$cart0 = array();$info = array();
            $carts['type'] = trim($_GET['type']);
            $carts['goods_id'] = trim($_GET['goods_id']);
            $carts['goods_a_id'] = trim($_GET['goods_a_id']);
            $carts['goods_spec'] = trim($_GET['goods_spec']);
            $carts['ssa_id'] = isset($_GET['ssa_id']) ? trim($_GET['ssa_id']) : "";
            $carts['stocks_price'] = trim($_GET['stocks_price']);
            $carts['goods_num'] = trim($_GET['goods_num']);
            $carts['cart_id'] = '';
            $carts['bl_id'] = '';
            $carts['goods_img'] = trim($_GET['goods_img']);
            $carts['goods_color'] = trim($_GET['goods_color']);
            $carts['goods_name'] = trim($_GET['goods_name']);
            $carts['goods_price'] = trim($_GET['goods_price']);
            $carts['goods_color_remark'] = isset($_GET['color_remark']) && !empty($_GET['color_remark']) ? trim($_GET['color_remark']) : "";
            $carts['goods_size_remark'] = isset($_GET['size_remark']) && !empty($_GET['size_remark']) ? trim($_GET['size_remark']) : "";
            $carts['goods_ea_id'] = isset($_GET['goods_ea_id']) && !empty($_GET['goods_ea_id']) ? trim($_GET['goods_ea_id']) : "";
            $cart0['storeId'] = trim($_GET['storeId']);
            $cart0['storeName'] = trim($_GET['storeName']);
            $source = isset($_GET['source']) ? trim($_GET['source']) : "";
            /* if($source=='micro'){
            	$carts['goods_pay_price'] = trim($_GET['stocks_price']);
            	$carts['stocks_price'] = $_GET['stocks_price_old'];
            	$carts['source'] = 'micro';
            	$carts['source_id'] = isset($_GET['bargain_id'])?trim($_GET['bargain_id']):'';
            	$carts['source_name'] = isset($_GET['bargain_title'])?trim($_GET['bargain_title']):'';
            } */
            $cart0['cart_id'] = '';
            $cart0['goods'] = $carts;
            $info[] = $cart0;
            $type = trim($_GET['type']);
            
        }else{
            if($user_id && $info){
                $info = json_decode($info,true);
                $type =$info[0]['goods']['receive_type'] ;
            }else{
                echo '';die;
            }

        }
       // print_r ($info);die;
        $time = time();
        $goods = array();$total = 0;
        if(!empty($info)) {
        	if(!empty($source)&&$source=='micro'){
        		$coupon_source = 'micro';
        	}else{
        		$coupon_source = 'coupon';
        	}
            foreach ($info as $k => $v) {
                $v['goods']['storeId'] = $v['storeId'];
                $v['goods']['storeName'] = $v['storeName'];
                $goods[$k] = $v['goods'];
                
                $total += $v['goods']['goods_price'];
                //查询可用的优惠券
                $goods_id = $v['goods']['goods_id'];
                $store_id = $v['storeId'];
//               var_dump ($goods_id);var_dump ($store_id);die;
                
                //print_r($this->db->last_query());die;
                if($coupon_source=='coupon'){
                	
                	$available_coupons = $this->db->select('available_coupons')->where("goods_id = '{$goods_id}' ")->get('shop_goods')->row('available_coupons');
                	if($available_coupons==1){
                		$goods[$k]['coupon_state']=1;
                		$this->db->select ('uc.user_coupon_id,uc.coupon_activity_id,uc.coupon_activity_type,sc.coupon_value,
                    sc.coupon_start_time,sc.coupon_end_time,sc.flexible_day,sc.time_state,sc.coupon_desc,sc.coupon_name,
                    sc.coupon_id,sc.limit_goods,sc.limit_store,sc.limit_goods_type,sc.limit_store_type');//count(user_coupon_id) as coupon_num
                		$this->db->from ('user_coupon as uc');
                		$this->db->join ('shop_coupon as sc', "uc.coupon_id=sc.coupon_id");
                		$this->db->where ('uc.user_id', $user_id);
                		$this->db->where ('uc.coupon_cost_time', null);
                		$this->db->like ('CONCAT(",",sc.limit_goods,",")', ",".$goods_id.",");
                		$this->db->like ('CONCAT(",",sc.limit_store,",")', ",".$store_id.",");
                		//$this->db->group_by('uc.coupon_id');
                		$this->db->order_by('sc.coupon_value','ASC');
                		$this->db->order_by('uc.user_coupon_id','ASC');
                		$limit = $this->db->get()->result_array ();
                		 //print_r($this->db->last_query());die;
                		$coupon_list = array();
                		foreach ($limit as $kc=>$vc){
                			if($vc['coupon_start_time']<=$time&&$time<=$vc['coupon_end_time']){
                				$vc['start_time'] = date('m-d H:i',$vc['coupon_start_time']);
                				$vc['end_time'] = date('m-d H:i',$vc['coupon_end_time']);
                				$check_coupon = $this->db->select('count(so.coupon_id) as num')->from('shop_order_goods so')
                				->join('shop_order o','o.order_sn=so.order_sn')
                				->join('user_coupon uc','uc.user_coupon_id=so.coupon_id')
                				->where('so.coupon_id',$vc['user_coupon_id'])->where('o.order_status<>',0)
                				->get()->row('num');
                				if(empty($check_coupon)){
                					 
                					if(isset($coupon_list[$vc['coupon_id']])){
                						$coupon_list[$vc['coupon_id']]['coupon_num'] +=1;
                						$coupon_list[$vc['coupon_id']]['coupon_list'] = $coupon_list[$vc['coupon_id']]['coupon_list'].",".$vc['user_coupon_id'];
                					}else{
                						$coupon_list[$vc['coupon_id']] = $vc;
                						$coupon_list[$vc['coupon_id']]['coupon_num'] =1;
                						$coupon_list[$vc['coupon_id']]['coupon_list'] = $vc['user_coupon_id'];
                					}
                					 
                				}
                			}
                	
                		}
                		$goods[$k]['coupon_list']=$coupon_list;
                		//print_r($coupon_list);die;
                	}else{
                		$goods[$k]['coupon_state']=0;
                	}
                }
                
            }
        }
        else{
            echo '';die;
        }
//        var_dump ($goods);
        $total = sprintf('%0.2f',$total);
//	   print_r($goods);exit;
        //查询省市区信息所有信息
        $user_addr = $this->db->select('*')->where('user_id',$user_id)->get('user_address')->result_array();
        $address =array();
        foreach ($user_addr as $k=>$v){
            if($v['is_default']==1){
                $address = $v;
            }
        }
        $address = isset($address)?$address:(isset($user_addr[0])?$user_addr[0]:'');
//                print_r(json_encode($address));die;
        if($address){
            if(!empty($address)&&$address['province_id']){
                $addr_pro = $this->db->select('area_name,area_id')->where('area_id',$address['province_id'])->get('area')->row_array();
            }
            if(!empty($address)&&$address['city_id']){
                $addr_city = $this->db->select('area_name,area_id')->where('area_id',$address['city_id'])->get('area')->row_array();
            }
            if(!empty($address)&&$address['area_id']){
                $addr_area = $this->db->select('area_name,area_id')->where('area_id',$address['area_id'])->get('area')->row_array();
            }
            $pro = isset($addr_pro)?$addr_pro:array('area_name'=>'','area_id'=>'');
            $city = isset($addr_city)?$addr_city:array('area_name'=>'','area_id'=>'');
            $area = isset($addr_area)?$addr_area:array('area_name'=>'','area_id'=>'');
            $address['addressPicker'] = $pro['area_name'].",".$city['area_name'].",".$area['area_name'];
            $address['addressPickers'] = $pro['area_id'].",".$city['area_id'].",".$area['area_id'];
        }
        //用户优惠卷jishu

//        print_r($goods);die;
        $area_info = $this->user_model->get_area_info(0);
        $postCode = mt_rand(1000,9999);
        $this->session->set_userdata('orderPostCode',$postCode);
        $this->smarty->assign('orderPostCode',$postCode);
        //$this->smarty->assign('ous_ewm',$_SESSION['ous_ewm']);
        $this->smarty->assign('goods',$goods);
        $this->smarty->assign('total',$total);
        $this->smarty->assign('area_info',$area_info);
        $this->smarty->assign('coupon_source',$coupon_source);
        $this->smarty->assign('address',$address);
        $this->smarty->assign('user_addr',$user_addr);
        $this->smarty->assign('addressinfo',json_encode($address));
        $this->smarty->assign('ua_id',isset($address['ua_id'])?$address['ua_id']:'');
        if($type ==1){
//            快递发货
            $this->smarty->display('order_confirm.html');
        }else{
            //到店自提
            $this->smarty->display('order_confirm_since.html');
        }
    }

    public function changeCash(){
        $prize_type=isset($_POST['prize_type'])?$_POST['prize_type']:'';
        $single_price=isset($_POST['single_price'])?$_POST['single_price']:'';
        $single_price_show=isset($_POST['single_price_show'])?$_POST['single_price_show']:'';
        $num_single=isset($_POST['num_single'])?$_POST['num_single']:'';
        $total_price=isset($_POST['total_price'])?$_POST['total_price']:'';
        $total_price_show=isset($_POST['total_price_show'])?$_POST['total_price_show']:'';
        $reduce_val=isset($_POST['reduce_val'])?$_POST['reduce_val']:'';
        $remain_price=isset($_POST['remain_price'])?$_POST['remain_price']:'';
        $data=array();
//        var_dump ($total_price);var_dump ($total_price_show); var_dump ($remain_price);
        if($prize_type && $prize_type==1){
        	if($reduce_val==''){
        		$reduce_val = 1;
        	}
            $data['discount_price']=sprintf('%0.2f',$single_price*$num_single-$single_price*(1-$reduce_val));//该商品折后价
            $data['reduce_price']=sprintf('%0.2f',($single_price)*(1-$reduce_val));//该商品折后减少的价格
            $data['discount_total_price']=sprintf('%0.2f',$remain_price-($single_price*(1-$reduce_val)));//该订单折后的总价
            $data['total_discount']= sprintf('%0.2f',$total_price- $data['discount_total_price']);//该订单一共优惠的价格
        }
        echo json_encode($data);die;
    }
	
	
	
	
	public function user_address_add(){
	    $user_id = $_SESSION['user_id'];
	    $ua_id = isset($_POST['ua_id'])?trim($_POST['ua_id']):'';
	    $name = trim($_POST['rec_name']);
	    $tel = trim($_POST['tel']);
	    $address = trim($_POST['address']);
	    $is_default = isset($_POST['is_default'])?$_POST['is_default']:0;
	    $isert['user_id']=$user_id;
	    $isert['rec_name']=$name;
	    $isert['is_default']=$is_default;
	    $isert['address']=$address;
	    $isert['tel']=$tel;
	    $area = trim($_POST['area']);
	    $area = explode(',', $area);
	    $isert['province_id']=isset($area[0])?$area[0]:'';
	    $isert['city_id']=isset($area[1])?$area[1]:'';
	    $isert['area_id']=isset($area[2])?$area[2]:'';
	    $result =array('state'=>false,'msg'=>'编辑失败');
	    //print_r($isert);print_r($_POST);die;
	    if($user_id&&$name&&$tel&&$address&&$area){
	        if($is_default){
	            $this->db->update('user_address',array('is_default'=>0),array('user_id'=>$user_id));
	        }
	        if(!empty($ua_id)){
	            $this->db->update('user_address',$isert,array('ua_id'=>$ua_id));
	            $result ['msg'] = "收货地址更新成功";
	        }else{
	            $this->db->insert('user_address',$isert);
	            $ua_id = $this->db->insert_id();
	            $result ['msg'] = "收货地址添加成功";
	        }
	        $isert['ua_id'] = $ua_id;
	        $isert['addressPicker'] = $_POST['region'];
	        $isert['addressPickers'] = $isert['province_id'].','.$isert['city_id'].','.$isert['area_id'];
	        $result ['data'] = $isert;
	        $result ['state'] = true;
	    }
	    echo json_encode($result);
	    
	}
	
	
	public function ajax_get_addresss(){
	    $user_id = $_SESSION['user_id'];
	    $address = $this->shop->get_reciver_info();
	    if(empty($address)){
	        echo json_encode(false);die;
	    }
	    foreach ($address as $k=>$v){
	        $pro = $this->db->select('area_name')->where('area_id',$v['province_id'])->get('area')->row('area_name');
	        $city = $this->db->select('area_name')->where('area_id',$v['city_id'])->get('area')->row('area_name');
	        $area = $this->db->select('area_name')->where('area_id',$v['area_id'])->get('area')->row('area_name');
	        $address[$k]['addr'] = $pro.$city.$area;
	    }
	    echo json_encode($address);die;
	}
	
	public function post_order(){

		//print_r($_GET);print_r($_POST);die;
	    $user_id = $_SESSION['user_id'];
//	    print_r($_POST['user_coupon_id_total']);die;
	    if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	        //订单基本信息
	        $this->db->select('order_price,pd_amount,created_time,counpon_amount,pay_sn,store_id,store_name,integral_amount,pay_type,shipping_type,buyer_id,goods_num');
	        $this->db->from('shop_order');
	        $this->db->where('order_sn',$_GET['order_sn']);
	        $orderinfo = $this->db->get()->row_array();
//yu 购买通知，微信发送内容组装。
			$buyer_id=$orderinfo['buyer_id'];//yu 得到购买人id

			$goods_num=$orderinfo['goods_num'];
			unset($orderinfo['buyer_id']);
			unset($orderinfo['goods_num']);
           $goods_name=$this->db->select('goods_name')->where('order_sn =',$_GET['order_sn'])->get('shop_order_goods')->row('goods_name');
			$tel=$this->db->select('tel')->where('user_id =',$buyer_id)->get('user')->row('tel');
			if($goods_num > '1'){
				$goods_name=$goods_name.'等商品';
			}

			$wx_code = "GMTZ";
			$wx_data = array(
				"name"=>array("value"=>"{$goods_name}",
					"color"=>"#173177"
				),
				"remark"=>array("value"=>"您的商品已购买成功，正在为您备货哟",
					"color"=>"#173177"
				)
			);
			$url = base_url('vmall.php/order/order_detail?order_sn=').$_GET['order_sn'];

//yu 购买通知，微信发送内容组装。end


            /* if(time()-$orderinfo['created_time']>60*30){
	            //超过支付时间，关闭订单
                $this->db->trans_off(); //禁用事务
                $this->db->trans_start(); //开启事务
                $this->db->where('order_sn',$_GET['order_sn']);
                $this->db->update('shop_order', array("order_status"=>0));
                $ress=$this->db->insert('shop_order_log',array("order_sn"=>$_GET['order_sn'],"log_msg"=>"取消订单，用户手动取消订单","log_role"=>"用户","log_user"=>$user_id,"log_orderstate"=>0));
                $this->db->trans_complete(); //事务完成
                $this->db->trans_off(); //禁用事务
	            echo '超过支付时间,订单已取消！';
	            sleep(3);
	            header("location:".base_url("vmall.php/order/index"));die;
	        }*/
	        $payType = $orderinfo['pay_type'];
	        $shipType = $orderinfo['shipping_type']; 
	        $paydata = array(
	                "money" => $orderinfo['order_price'],
	                "userBalance" => $orderinfo['pd_amount'],
    	            "userCounpon_amount" => $orderinfo['counpon_amount'],
    	            "pay_sn" => $orderinfo['pay_sn'],
    	            "order_pay" => array($_GET['order_sn']),
    	            "goods_money" => $orderinfo['order_price'],
    	            "order_store" => array( $orderinfo['store_id'] => $orderinfo['store_name'] ),
    	            "userIntegral" => $orderinfo['integral_amount'],
	        		"payBalance" => $orderinfo['order_price']-$orderinfo['pd_amount']-$orderinfo['counpon_amount']
	        );
	    }else{
	        
//            var_dump ($shop_order_goods);die;
            $coupon_source = isset($_POST['coupon_source'])?$_POST['coupon_source']:'';

	        $payType = isset($_POST['radio1'])?$_POST['radio1']:1;
	        $postCode = isset($_POST['orderPostCode'])?$_POST['orderPostCode']:'';
	        $checkCode = isset($_SESSION['orderPostCode'])?$_SESSION['orderPostCode']:'';
	        $shipType = isset($_POST['shipType'])?$_POST['shipType']:1;
	        //print_r($_POST);print_r($_SESSION);die;
	        if(!empty($postCode)&&!empty($checkCode)&&$checkCode==$postCode){

	        }else{
	            echo '订单已提交，勿再次提交！';
	            sleep(2);
	            header("location:".base_url("vmall.php/user/index"));
	            die;
	        }
            $store_id=isset($_POST['store_id'])?$_POST['store_id']:'';//array(61,74);
	        $goods = isset($_POST['goods'])?$_POST['goods']:'';
	        $address = isset($_POST['address'])?$_POST['address']:'';
	        $address = ($shipType==2)?'':$address;
	        $note = isset($_POST['note'])?$_POST['note']:'';
	        
	        $goods_coupon=isset($_POST['goods_coupon'])?$_POST['goods_coupon']:'';//券ID
	        $goods_price=isset($_POST['goods_price'])?$_POST['goods_price']:'';
	        $order_price=isset($_POST['order_price'])?$_POST['order_price']:'';
	        $goods_pay_price=isset($_POST['goods_pay_price'])?$_POST['goods_pay_price']:'';
	        $coupon_amount=isset($_POST['coupon_amount'])?$_POST['coupon_amount']:'';//优惠金额
	        $coupon_list=isset($_POST['coupon_list'])?$_POST['coupon_list']:'';//优惠金额
	        $promotions_id=isset($_POST['promotions_id'])?$_POST['promotions_id']:'';
	        $activity_type=isset($_POST['activity_type'])?$_POST['activity_type']:'';
	        $user_coupon_id=isset($_POST['user_coupon_id_total'])?$_POST['user_coupon_id_total']:'';//订单优惠券数组
            if(!empty($user_coupon_id)){
                $user_coupon_id=implode(',',$user_coupon_id);//变成字符串
            }
//	        var_dump ($user_coupon_id);die;
	        //	        var_dump ($goods_coupon);var_dump ($goods_pay_price);var_dump ($coupon_amount);die;
	        $shop_order_goods=array();$coupon = array();
//	        var_dump ($goods_coupon);
//var_dump ($coupon_list);
	        if(!empty($goods_coupon)&&!empty($coupon_amount)){
	        	foreach ($goods_coupon as $k=>$v){
	        		$coupon[$k]['coupon_id'] = $v;
	        		if(!empty($v)){
	        			$coupon[$k]['coupon_amount'] = isset($coupon_amount[$k])?$coupon_amount[$k]:0;
//	        			$coupon_list = isset($coupon_list[$k])?$coupon_list[$k]:'';
	        			$coupon[$k]['coupon_list'] = !empty($coupon_list[$k])?explode(',',$coupon_list[$k]):array();
	        		}else{
	        			$coupon[$k]['coupon_amount'] = 0;
	        			$coupon[$k]['coupon_list'] = '';
	        		}
	        	}
	        }
//	        var_dump ($coupon);die;
	        
	        if($user_id&&$goods){
	            $goods = object_array(json_decode($goods));
	            if(empty($goods)){
	                echo '';die;
	            }
	        }else{
	            die;
	        }
//	        print_r($goods);die;
	        $paydata = $this->order_model->order_create($goods,$address,$note,$payType,$shipType,$goods_price,$order_price,$coupon,$coupon_source);

//var_dump($paydata );exit;
//yu 购买通知，微信发送内容组装。


	          $order_sn=$this->db->select('order_sn')->where('pay_sn =',$paydata['pay_sn'])->get('shop_order')->row('order_sn');

			$goods_name=$goods['0']['goods']['goods_name'];


			$tel=$this->db->select('tel')->where('user_id =',$user_id)->get('user')->row('tel');
			$time=0;
			foreach($goods as $v){
				$time +=1;
			}
			if($time > '1'){
				$goods_name=$goods_name.'等商品';
			}

			$wx_code = "GMTZ";
			$wx_data = array(
				"name"=>array("value"=>"{$goods_name}",
					"color"=>"#173177"
				),
				"remark"=>array("value"=>"您的商品已购买成功，正在为您备货哟",
					"color"=>"#173177"
				)
			);
			$url = base_url('vmall.php/order/order_detail?order_sn=').$order_sn;

//yu 购买通知，微信发送内容组装。end







	             }
	    $time = time();
	    
	    if($paydata['payBalance']<=0.01){
	    	$order_pay = $paydata['order_pay'];
	    	//发送推送消息
	    	$orderData = array();
	    	$orderInfo = array('order_status'=>20,'pay_type'=>$payType,'pay_time'=>$time,'pickup_code'=>'');
	    	foreach ($order_pay as $k=>$v){
	    		$orderbase=$this->db->select('store_id,spg_id,buyer_id,created_time')->where('order_sn',$v)->get('shop_order')->row_array();
	    		$user_name=$this->db->select('user_name')->where('user_id',$orderbase['buyer_id'])->get('user')->row('user_name');
	    		$payload=array('tag'=>'orderPayMsg','orderId'=>$v,'userName'=>$user_name,'payTime'=>date('Y-m-d H:i:s',$orderbase['created_time']));
	    		$title='您有一笔新的订单';
	    		$content="会员".$user_name."在您店铺购买了商品";
	    		$res= $this->common_function->pushMsg($title,$content,$payload,$v);//发送推送消息
				$this->common_function->send_msg($wx_data, $wx_code, $tel,'',$url);//给用户发送购买通知


	    		$orderInfo['pickup_code'] = $this->common_function->get_pickup_code($time);//生成提货码
	    		$orderInfo['order_sn'] = $v;
	    		$orderData[$k] = $orderInfo;		
	    		
	    	}

	    	$success = $this->db->update_batch('shop_order',$orderData,'order_sn');
	    	if($payType==3){
	    		if($shipType==2){
	    			$orderinfo = $paydata['order_pay'];
	    			foreach ($orderinfo as $k=>$val){
	    				$order = $this->order_model->order_info($val);
	    				$reciveInfo = $order['reciveInfo'];
	    				$this->common_function->send_pickup_code($val,$user_id,$reciveInfo['pickup_code'],$reciveInfo['receive_addr']);//推送提货通知
	    			}
	    		}
	    	}
	    	
	    	$urlData = base_url('vmall.php/order/ordersuccess?');
	    	$order_type = $this->order_model->order_type();
	    	$shipping_type = $this->order_model->shipping_type();
	    	$pay_type = $this->order_model->pay_type();
	    	$successInfo = array(
	    	        'user_coupon_id'=>$user_coupon_id,
	    			'order_type'=>$order_type['1'],
	    			'order_status'=>'',
	    			'shipping_type'=>$shipping_type[$shipType],
	    			'order_time'=>date('Y-m-d H:i:s',$time),
	    			'order_sn'=>join(',',$order_pay),
	    			'pay_type'=>$pay_type[3],
	    			'pay_money'=>sprintf('%0.2f',$paydata['payBalance']),
	    	);
	    	foreach ($successInfo as $k=>$v){
	    		$urlData .= $k.'='.$v.'&';
	    	}
	    	if($success){
	    		header("location:".$urlData);die;
	    	}else{
	    		die;
	    	}
	    }
	    if($payType==1){
	        header("location:".base_url('vmall.php/wxpay/index?paydata=').json_encode($paydata));exit;
	    }elseif($payType==2){
	        
	    }elseif($payType==3){

	    }else{
	        
	    }
	    
        $order_pay = $paydata['order_pay'];
        $orderPay_money = $paydata['money']-$paydata['userIntegral']-$paydata['userCounpon_amount'];
         if($payType==3){
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
            //openid获取用户信息
            $this->db->select('balance,head_portrait');
            $this->db->from('user');
            $this->db->where('user_id',$user_id);
            $userinfo = $this->db->get()->row_array();
            $userinfo['balance'] = number_format(($userinfo['balance'] - $amount), 2, '.', '');
            if($orderPay_money > $userinfo['balance']){
                echo "<script>javascript:alert('对不起，您的账户余额不足！');window.location.href='".base_url("vmall.php/order/index")."';</script>";
                die;
            }
        } 
        $orderInfo = array('order_status'=>20,'pay_type'=>$payType,'pay_time'=>$time,'pickup_code'=>'');
        $payLog = array('pay_sn'=>$paydata['pay_sn'],'mtcn_sn'=>'','pay_num'=>$orderPay_money,'mtcn_type'=>5,'api_pay_state'=>1,'pay_time'=>time());
        $orderData = array();
        foreach ($order_pay as $k=>$v){
            $orderInfo['pickup_code'] = $this->common_function->get_pickup_code(time());//生成提货码
            $orderInfo['order_sn'] = $v;
            $orderData[$k] = $orderInfo;
        }
        $orderNum = count($order_pay);
        $this->db->trans_start();
        $this->db->query("update ".$this->db->dbprefix('user')." set order_num=order_num+$orderNum,order_money_num=order_money_num+'{$orderPay_money}' where user_id=".$user_id);
        if(!empty($paydata['balance_sql'])){
             $this->db->query($paydata['balance_sql']);
        }
        if(!empty($paydata['add_user_log_sql'])){
            $this->db->query($paydata['add_user_log_sql']);
        }
        if(!empty($paydata['add_plat_log_sql'])){
            $this->db->query($paydata['add_plat_log_sql']);
        }
        $success = $this->db->update_batch('shop_order',$orderData,'order_sn');
        $success = $this->db->insert('shop_order_pay',$payLog);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            //echo "<script>javascript:alert('订单支付失败');</script>";
           echo "<script>javascript:alert('订单支付失败');window.location.href='".base_url("vmall.php/order/index")."';</script>";
            //header("location:".base_url("vmall.php/user/index"));
            die;
        }else{
            $this->db->trans_complete();
            $success = true;
            $this->session->set_userdata('orderPostCode','0');

            //发送推送消息
            foreach ($order_pay as $k=>$v){
                $orderbase=$this->db->select('store_id,spg_id,buyer_id,created_time')->where('order_sn',$v)->get('shop_order')->row_array();
                $user_name=$this->db->select('user_name')->where('user_id',$orderbase['buyer_id'])->get('user')->row('user_name');
                $payload=array('tag'=>'orderPayMsg','orderId'=>$v,'userName'=>$user_name,'payTime'=>date('Y-m-d H:i:s',$orderbase['created_time']));
                $title='您有一笔新的订单';
                $content="会员".$user_name."在您店铺购买了商品";
                $res= $this->common_function->pushMsg($title,$content,$payload,$v);//发送推送消息
				$this->common_function->send_msg($wx_data, $wx_code, $tel,'',$url);//给用户发送购买通知
            }
            
            if($payType==3){
                if($shipType==2){
                    $orderinfo = $paydata['order_pay'];
                    foreach ($orderinfo as $k=>$val){
                        $order = $this->order_model->order_info($val);
                        $reciveInfo = $order['reciveInfo'];
                        $this->common_function->send_pickup_code($val,$user_id,$reciveInfo['pickup_code'],$reciveInfo['receive_addr']);//推送提货通知


                    }
                }
            }
        
        }
        $urlData = base_url('vmall.php/order/ordersuccess?');
        $order_type = $this->order_model->order_type();
        $shipping_type = $this->order_model->shipping_type();
        $pay_type = $this->order_model->pay_type();
        $successInfo = array(
            'user_coupon_id'=>$user_coupon_id,
            'order_type'=>$order_type['1'],
            'order_status'=>'',
            'shipping_type'=>$shipping_type[$shipType],
            'order_time'=>date('Y-m-d H:i:s',$time),
            'order_sn'=>join(',',$order_pay),
            'pay_type'=>$pay_type[3],
            'pay_money'=>sprintf('%0.2f',$orderPay_money),
        );
        foreach ($successInfo as $k=>$v){
            $urlData .= $k.'='.$v.'&';
        }
	    if($success){
	        header("location:".$urlData);
	    }else{
	        die;
	    }

	}
	
	
	public function ordersuccess(){
	    $paydata = $_GET;
	    if(!empty($paydata['user_coupon_id'])) {
            $paydata['user_coupon_id'] = explode (",", $paydata['user_coupon_id']);
            $coupon_cost_time = array ('coupon_cost_time' => time ());
//        var_dump ($paydata);
            foreach ($paydata['user_coupon_id'] as $k => $v) {
                $this->db->where ('user_coupon_id', $v);
                $this->db->update ('user_coupon', $coupon_cost_time);
            }
        }
	    $this->smarty->assign('info',$paydata);
	    $this->smarty->display('ordersuccess.html');
	}
	
	
	public function appraise_list(){
	   $this->smarty->display('order_appraise_list.html');     
	}
	
	
	public function appraise_shopping_guide(){
	   $this->smarty->display('order_appraise_shopping_guide.html');     
	}
	
	//查看物流
	public function look_logistics(){
 	    $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
	    if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	        //订单基本信息
	        $this->db->select('o.waybill_sn,o.logistics_company_name,o.order_status,o.order_from,o.uec_order_status,g.goods_image,g.uec_goods_image,o.order_type,g.express_sn,g.uec_express');
	        $this->db->from('shop_order o');
	        $this->db->join('shop_order_goods g','g.order_sn=o.order_sn');
	        $this->db->where('o.order_sn',$_GET['order_sn']);
	        $this->db->order_by('g.express_sn','DESC');
	        $orderinfo = $this->db->get()->row_array();
	        //print_r($orderinfo);die;
	        if(in_array($orderinfo['order_from'],array(41,42))){
	        	$orderinfo["order_status"] = $orderinfo["uec_order_status"];
	        	$orderinfo["goods_image"] = $orderinfo["uec_goods_image"];
	        }
	        if($orderinfo["order_status"]>=20){
	        	$logistic = $orderinfo["waybill_sn"];
	        	if($orderinfo['order_type']==3){
	        		$orderinfo["logistics_company_name"] = $orderinfo["uec_express"];
	        		$logistic = $orderinfo["express_sn"];
	        	}
	        	$c_n = $orderinfo["logistics_company_name"];
	        	$ship = $this->db->select('e_code')->from('express')
	        	->group_start()
	        	->where('e_code', $c_n)
	        	->or_where("'$c_n' LIKE CONCAT('%',e_name,'%')")
	        	->or_where(" e_name like '%$c_n%'")
	        	->group_end()
	        	->get()->row('e_code');
	            //$ship = $this->db->select('e_code')->where('e_name',$orderinfo["logistics_company_name"])->get('express')->row('e_code');
	            //print_r($ship);die;
	            $order=$_GET['order_sn'];
	            if($ship){
	                $logistics = $this->common_function->get_kdniao_info($order,$ship,$logistic);
	                $logistics = object_array(json_decode($logistics));
	                if($logistics['Success']){
	                    $res =array("res"=>"yes","data"=>$logistics);
	                    if(isset($logistics['State']) && !empty($logistics['Traces'])){
	                        $logistics['ShipperName']=$orderinfo["logistics_company_name"];
	                        if($logistics['State']==0){
	                            $res['state']="无轨迹";
	                        }elseif ($logistics['State']==2){
	                            $res['state']="在途中";
	                        }elseif ($logistics['State']==3){
	                            $res['state']="已签收";
	                        }elseif ($logistics['State']==4){
	                            $res['state']="问题件";
	                        }
	                    }else{
	                        $res =array("res"=>"no","data"=>"",'msg'=>'系统未查到该物流信息！');
	                    }
	                   
	                    //print_r($logistics);die;
	                    
	                }else{
	                    $logistics = $logistics['Reason']; 
	                    $res =array("res"=>"no","data"=>"",'msg'=>$logistics);
	                }
	            }else{
	            	$res =array("res"=>"no","data"=>"",'msg'=>'快递信息错误！');
	            }
	            $res['goods_iamge'] = $orderinfo["goods_image"];
	            $this->smarty->assign('logistics',$res);
	            $this->smarty->display('lookLogistics.html');
	        }else{
	            echo "<script>javascript:alert('您的宝贝还没发货，暂无物流信息!');history.go(-1)</script>";die;
	            //$this->common_function->show_message("您的宝贝还没发货，暂无物流信息！");exit;
	        }   
	    }else{
	        echo "<script>javascript:alert('系统繁忙，稍后再试!');history.go(-1)</script>";die;
	       //$this->common_function->show_message("系统繁忙，稍后再试！");exit;
	    }
	    
	}
	
	//手动取消订单
	public function cancel_order(){
	    $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:false;
	    if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	        $this->db->trans_off(); //禁用事务
	        $this->db->trans_start(); //开启事务
            $this->db->where('user_coupon_id',$_GET['user_coupon_id']);
            $this->db->update('user_coupon', array("coupon_cost_time"=>null));
	        $this->db->where('order_sn',$_GET['order_sn']);
	        $this->db->update('shop_order', array("order_status"=>0));
	        $ress=$this->db->insert('shop_order_log',array("order_sn"=>$_GET['order_sn'],"log_msg"=>"取消订单，用户手动取消订单","log_role"=>"用户","log_user"=>$user_id,"log_orderstate"=>0));
	        $this->db->trans_complete(); //事务完成
	        $this->db->trans_off(); //禁用事务
            //发送推送消息
            $payload=array('tag'=>'orderCloseMsg','orderId'=>$_GET['order_sn'],'reason'=>'会员手动取消订单');
            $title='订单取消通知';
            $content="会员手动取消了订单";
            $res= $this->common_function->pushMsg($title,$content,$payload,$_GET['order_sn']);//发送推送消息
	        echo "<script>javascript:alert('订单已取消!');window.location.href='".base_url("vmall.php/order/index")."';</script>";
	    }else{
	        echo "<script>javascript:alert('系统繁忙，稍后再试!');window.location.href='".base_url("vmall.php/order/index")."';</script>";
	    }
	}
	
	//手动确认收货
	public function confirm_goods(){
	    $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:false;
	    if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	        $this->db->trans_off(); //禁用事务
	        $this->db->trans_start(); //开启事务
	        $this->db->where('order_sn',$_GET['order_sn']);
	        $this->db->update('shop_order', array("order_status"=>40));
	        $ress=$this->db->insert('shop_order_log',array("order_sn"=>$_GET['order_sn'],"log_msg"=>"确认收货，用户确认收货","log_role"=>"用户","log_user"=>$user_id,"log_orderstate"=>40));
	        $this->db->trans_complete(); //事务完成
	        $this->db->trans_off(); //禁用事务
            //发送推送消息
            $payload=array('tag'=>'orderSureMsg','orderId'=>$_GET['order_sn'],'sureGoods'=>'会员已确认收货');
            $title='收货通知';
            $content="会员已确认收货";
            $res= $this->common_function->pushMsg($title,$content,$payload,$_GET['order_sn']);//发送推送消息
	        echo "<script>javascript:alert('已确认收货!');window.location.href='".base_url("vmall.php/order/index")."';</script>";
	    }else{
	        echo "<script>javascript:alert('系统繁忙，稍后再试!');window.location.href='".base_url("vmall.php/order/index")."';</script>";
	    }
	}
	
	//申请售后
	public function apply_service(){
	    $refund_id = isset($_GET['refund_id']) && !empty($_GET['refund_id'])?$_GET['refund_id']:false;
	    if(isset($_SESSION['file_name'])){
	        $this->common_function->del_applyServices_pic($_SESSION['file_name']);
	        unset($_SESSION['file_name']);
	    }
	    if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	        $order = $this->order_model->order_info($_GET['order_sn']);
//	        if(isset($_GET['goods_id']) && !empty($_GET['goods_id'])){
////	            var_dump ($_GET['goods_id']);
//                $order = $this->order_model->order_info($_GET['order_sn'],$_GET['goods_id']);
//            }
//	        var_dump ($order);
	        $orderInfo = $order['orderInfo'];
	        $goodsAll = count($order['orderInfo']);
	        if(isset($_GET['goods_id']) && !empty($_GET['goods_id']) &&  $_GET['goods_id']){
	            foreach ($orderInfo as $key=>$val){
	                if($val['goods_id']!=$_GET['goods_id']){
	                    unset($orderInfo[$key]);
	                }
	            }
	        }else{
	            //判断订单下面的商品个数
	            if($goodsAll>1){
	                header("location:".base_url('vmall.php/order/applyservice?order_sn=').$_GET['order_sn']);exit;
	            }
	        }
	        sort($orderInfo);
	        $this->smarty->assign('reciveInfo',$order['reciveInfo']);
	        $this->smarty->assign('orderInfo',$orderInfo);
	       //print_r($orderInfo);die;
	        //退货原因
	        $this->db->select('reason_id,reason_info');
	        $this->db->from('shop_order_refund_reason');
	        $this->db->order_by('reason_id','ASC');
	        $refund_reason  = $this->db->get()->result_array();
	        if(empty($refund_reason)){
	            $refund_reason =array(0=>array('reason_id'=>1,'reason_info'=>'不喜欢啦'));
	        }
	        $reason = '[';
	        foreach ($refund_reason as $key=>$val){
	            $label = $val['reason_info'];
	            $value = $val['reason_id'];
	            $reason .='{label:'."'{$label}'".",value:"."'{$value}'".'},';
	        }
	        $reason = strrev($reason);
	        $reason = substr($reason,1);
	        $reason = strrev($reason);
	        $reason .= ']';
	        
	        $spg_id = $orderInfo[0]['spg_id'];
	        if(!$spg_id){
	            $guide_info = $this->store_model->getGuideInfo(1,$orderInfo[0]['store_id']);
	            $guide_info = isset($guide_info[0])?$guide_info[0]:'';
	        }else{
	            $guide_info = $this->store_model->getGuideInfo(2,$spg_id);
	        }
	        $this->smarty->assign('reason',$reason);
	        $this->smarty->assign('guide_info',$guide_info);
	        $this->smarty->assign('refund_id',$refund_id);
	        $this->smarty->assign('refundreason',json_encode($refund_reason));
	        $this->smarty->display('applyService.html');
	        
	    }
	    
	}
	
	
	//申请售后列表
	public function applyservice(){
//        var_dump ($_GET['order_sn']);
	    $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:false;
	    if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	        $order = $this->order_model->order_info($_GET['order_sn']);
	        foreach ($order['orderInfo'] as $key=>$val){
	            $apply = $this->db->select('refund_state')->where('order_sn',$_GET['order_sn'])->where('buyer_id',$user_id)->where('goods_id',$val['goods_id'])->get('shop_order_refund_return')->row("refund_state");
	            if(empty($apply)){
	                $order['orderInfo'][$key]['refund_state'] = 0;
	            }else{
	                $order['orderInfo'][$key]['refund_state'] = $apply;
	            }
	        }
	        $this->smarty->assign('reciveInfo',$order['reciveInfo']);
	        $this->smarty->assign('orderInfo',$order['orderInfo']);
//	        var_dump ($order);
	        $this->smarty->display('applySerAfter.html');
	    }
	     
	}
	
	//申请售后提交
	public function post_apply(){
	    $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:false;
	    $refund_id = isset($_POST['refund_id']) && !empty($_POST['refund_id']) ?$_POST['refund_id']:false;
	    $result =array('state'=>false,'msg'=>'售后申请提交失败,请稍后再试！');
	    if(isset($_POST['order_sn']) && !empty($_POST['order_sn']) && $user_id){
	        $order_goods_id = $this->db->select('rec_id')->where('order_sn',$_POST['order_sn'])->where('goods_id',"{$_POST['goods_id']}")->get('shop_order_goods')->row("rec_id");
	        if(isset($_POST['reason_id']) && !empty($_POST['reason_id'])){
	            $reason_info = $this->db->select('reason_info')->where('reason_id',$_POST['reason_id'])->get('shop_order_refund_reason')->row("reason_info");
	        }else{
	            $reason_info = "";
	        }
	        $buyer_name = $this->db->select('wx_nickname')->where('user_id',$user_id)->get('user')->row("wx_nickname");
	        if(isset($_SESSION['file_name']) && !empty($_SESSION['file_name'])){
	            $pic_info = serialize($_SESSION['file_name']);
	        }else{
	            $pic_info ="";
	        }


	        $inner = array(
	            'order_sn' => trim($_POST['order_sn']),
	            'pay_sn' => trim($_POST['pay_sn']),
	            'store_id' => trim($_POST['store_id']),
	            'store_name' => $_POST['store_name'], 
	            'buyer_id' => trim($user_id),
	            'buyer_name' => $buyer_name,
	            'refund_amount_apply'=> (isset($_POST['refund_amount_apply']) && !empty($_POST['refund_amount_apply']))?trim($_POST['refund_amount_apply']):0,
	            'refund_type' => trim($_POST['refund_type']),
	            'refund_tel'=>$_POST['refund_tel'],
	            'add_time' => time(),
	            'reason_id' => (isset($_POST['reason_id']) && !empty($_POST['reason_id']))?trim($_POST['reason_id']):0,
	            'reason_info' => trim($reason_info),
	            'pic_info' => $pic_info,
	            'buyer_message'=> (isset($_POST['buyer_message']) && !empty($_POST['buyer_message']))?trim($_POST['buyer_message']):"",
	        );
	        $counpon_amount = isset($_POST['counpon_amount']) && empty($_POST['counpon_amount']) ?trim($_POST['counpon_amount']):0;
	        $counpon_amount_arr=array("refund"=>$inner['refund_amount_apply']);
	        
	        $order = $this->order_model->order_info($_POST['order_sn']);
	        $this->smarty->assign('reciveInfo',$order['reciveInfo']);
	        $this->smarty->assign('orderInfo',$order['orderInfo']);
	        if(isset($order['reciveInfo'][1])){
	            //一个订单多个商品
	            if($counpon_amount>0){
	                //优惠卷支付,整单退
	                $inner['goods_id'] = 0;
	                $inner['order_goods_id'] = 0;
	                $inner['goods_ea_id']=0;
	                $inner['goods_name'] = '';
	                $inner['goods_num'] = 0;
	                $inner['goods_image'] = '';
	                $counpon_amount_arr['refund_state']=2;
	            }else{
	                $inner['goods_id'] = trim($_POST['goods_id']);
	                $inner['order_goods_id'] = trim($order_goods_id);
	                $inner['goods_ea_id']=trim($_POST['goods_ea_id']);
	                $inner['goods_name'] = $_POST['goods_name'];
	                $inner['goods_num'] = trim($_POST['goods_num']);
	                $inner['goods_image'] = $_POST['goods_image'];
	                $counpon_amount_arr['refund_state']=1;
	            }
	        }else{
	            //一个订单1个商品
	            $inner['goods_id'] = 0;
	            $inner['order_goods_id'] = 0;
	            $inner['goods_ea_id']=0;
	            $inner['goods_name'] = '';
	            $inner['goods_num'] = 0;
	            $inner['goods_image'] = '';
	            $counpon_amount_arr['refund_state']=2;
	        }
	        $log_arr=array(
	            'note'=>$inner['buyer_message'],
	            'pic_info'=>$inner['pic_info'],
	            'reason_info' => $inner['reason_info']
	        );
	        $log_arr = json_encode($log_arr);
	        $this->db->trans_off(); //禁用事务
	        $this->db->trans_start(); //开启事务
	        if($refund_id){
	            $inner['seller_state'] = 1;
	            $inner['refund_state'] = 1;
	            $this->db->where('refund_id',$refund_id);//更新订单表退货状态
	            $res= $this->db->update('shop_order_refund_return',$inner);
	        }else{
	            $res = $this->db->insert('shop_order_refund_return',$inner);
	            $refund_id = $this->db->insert_id();
	        }
	        
	        $this->db->where('order_sn',trim($_POST['order_sn']));//更新订单表退货状态
	        $this->db->update('shop_order', $counpon_amount_arr);
	        $this->db->insert('shop_order_return_log',array('return_id'=>$refund_id,'add_time'=>time(),'guide_id'=>$user_id,'content'=>$log_arr,'action_type'=>1,'type'=>1));
	        $this->db->trans_complete(); //事务完成
	        $this->db->trans_off(); //禁用事务
	        if($res){
	            $result ['state'] = true;
	            $result ['msg'] = "售后申请提交成功，请等待审核！";
	            $result ['data'] = $pic_info;
	            $result ['refund_id'] = $refund_id;
                //发送推送消息
                $payload=array('tag'=>'orderReturnMsg','returnId'=>$refund_id,'userName'=>$buyer_name,'reason'=>$reason_info);
                $title='售后申请通知';
                $content="会员".$buyer_name."申请了订单售后";
                $res= $this->common_function->pushMsg($title,$content,$payload,$_POST['order_sn']);//发送推送消息
	        }
	    }
	    if(isset($_SESSION['file_name'])){
	        unset($_SESSION['file_name']);
	    }
	    echo json_encode($result);exit;
	
	}
	
	
	
	//申请售后等待商家确认
	public function post_apply_confirm(){
	    if(isset($_GET['refund_id']) && !empty($_GET['refund_id'])){
	        $spg_id = !empty($_GET['spg_id'])?trim($_GET['spg_id']):0;
	
	        $this->db->select('refund_id,order_sn,store_id,refund_amount_apply,add_time');
	        $this->db->from('shop_order_refund_return');
	        $this->db->where('refund_id',$_GET['refund_id']);
	        $refundinfo =$this->db->get()->row_array();
	        if(!$spg_id){
	            $guide_info = $this->store_model->getGuideInfo(1,$refundinfo['store_id']);
	            $guide_info = $guide_info[0];
	        }else{
	            $guide_info = $this->store_model->getGuideInfo(2,$spg_id);
	             
	        }
	        $this->smarty->assign('guide_info',$guide_info);
	        $this->smarty->assign('refundinfo',$refundinfo);
	        $this->smarty->assign('refund_type',trim($_GET['refund_type']));
	        $this->smarty->assign('reason',trim($_GET['reason']));
	        $this->smarty->display('applyService_confirm.html');
	    }
	}
	
	
	//关闭申请售后申请
	public function colse_apply_services(){
	    $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:false;
	    $refund_id = isset($_POST['refund_id']) && !empty($_POST['refund_id'])?$_POST['refund_id']:false;
	    $op = isset($_POST['op']) && !empty($_POST['op'])?$_POST['op']:false;
	    $result =array('state'=>false,'msg'=>'关闭失败，请稍后再试!');
	    if($refund_id && $op=="colseApply"){
	        if($this->db->update('shop_order_refund_return',array('refund_state'=>4),array('refund_id'=>$refund_id))){
	            $return_log_arr=array(
	                'return_id'=>$refund_id,
	                'add_time'=>time(),
	                'guide_id'=>$user_id,
	                'action_type'=>1,
	                'type'=>0
	            );
	            $this->db->insert('shop_order_return_log',$return_log_arr);
	            $order_sn= $this->db->select('order_sn')->where("refund_id = '{$refund_id}' ")->get('shop_order_refund_return')->row('order_sn');	            
	            $this->db->update('shop_order',array('order_status'=>50),array('order_sn'=>$order_sn));
	            $result ['state'] = true;
	            $result ['msg'] = "已取消售后申请，即将返回用户中心!";
	        }
	    }
	    echo json_encode($result);exit();
	}
	
	

	//商家已同意退款，请退货给商家
	public function applyReturnMoney_result_writeExpress(){
	    if(isset($_GET['refund_id']) && !empty($_GET['refund_id'])){
	        $this->db->select('express_id,invoice_no,refund_id,order_sn,refund_address,store_id,refund_type,reason_info,refund_amount_apply,add_time');
	        $this->db->from('shop_order_refund_return');
	        $this->db->where('refund_id',$_GET['refund_id']);
	        $refundinfo =$this->db->get()->row_array();
	        
	        if($refundinfo['express_id'] && $refundinfo['invoice_no']){
	            header("location:".base_url('vmall.php/order/applyReturnMoney_result_waitTake?refund_id=').$_GET['refund_id']);exit;
	        }
	        if($refundinfo['refund_type']==1){
	            $refundinfo['refundtype']='退款不退货';
	        }else{
	            $refundinfo['refundtype']='退款并退货';
	        }
	        $spg_id = $this->db->select('spg_id')->from('shop_order')->where('order_sn',$refundinfo['order_sn'])->get()->row('spg_id');
	        if(!$spg_id){
	            $guide_info = $this->store_model->getGuideInfo(1,$refundinfo['store_id']);
	            $guide_info = $guide_info[0];
	        }else{
	            $guide_info = $this->store_model->getGuideInfo(2,$spg_id);
	        }
	        $this->smarty->assign('guide_info',$guide_info);
	        $this->smarty->assign('refundinfo',$refundinfo);
	        $this->smarty->display('applyReturnMoney_result_writeExpress.html');
	    }
	}
	
	//已退货，等待商家确认收货
	public function applyReturnMoney_result_waitTake(){
	    if(isset($_GET['refund_id']) && !empty($_GET['refund_id'])){
	        $spg_id = !empty($_GET['spg_id'])?trim($_GET['spg_id']):0;
	
	        $this->db->select('refund_id,reason_info,refund_type,order_sn,store_id,refund_amount_apply,add_time');
	        $this->db->from('shop_order_refund_return');
	        $this->db->where('refund_id',$_GET['refund_id']);
	        $refundinfo =$this->db->get()->row_array();
	        if($refundinfo['refund_type']==1){
	            $refundinfo['refundtype']='退款不退货';
	        }else{
	            $refundinfo['refundtype']='退款并退货';
	        }
	        if(!$spg_id){
	            $guide_info = $this->store_model->getGuideInfo(1,$refundinfo['store_id']);
	            $guide_info = $guide_info[0];
	        }else{
	            $guide_info = $this->store_model->getGuideInfo(2,$spg_id);
	
	        }
	        $this->smarty->assign('guide_info',$guide_info);
	        $this->smarty->assign('refundinfo',$refundinfo);
	        $this->smarty->display('applyReturnMoney_result_waitTake.html');
	    }
	}
	
	//商家已拒绝，不同意退款/货申请
	public function applyReturnMoney_result(){
	    if(isset($_GET['refund_id']) && !empty($_GET['refund_id'])){
	        $this->db->select('refund_id,goods_id,order_sn,store_id,refund_type,reason_info,refund_amount_apply,add_time,express_id,invoice_no');
	        $this->db->from('shop_order_refund_return');
	        $this->db->where('refund_id',$_GET['refund_id']);
	        $refundinfo =$this->db->get()->row_array();
	        
	        $this->db->select('sornid,return_id,content,add_time,type');
	        $this->db->from('shop_order_return_log');
	        $this->db->where('return_id',$_GET['refund_id']);
	        $this->db->order_by('add_time','DESC');
	        $close =$this->db->get()->row_array();
	        if($refundinfo['express_id'] && $refundinfo['invoice_no'] && ($close['type']==5 || $close['type']==6)){
	            header("location:".base_url('vmall.php/order/applyReturnMoney_result_waitTake?refund_id=').$_GET['refund_id']);exit;
	        }
	        $this->db->select('sornid,return_id,content,add_time,type');
	        $this->db->from('shop_order_return_log');
	        $this->db->where('return_id',$_GET['refund_id']);
	        $this->db->where('type in (2,7)');
	        $this->db->order_by('add_time','DESC');
	        $closeinfo =$this->db->get()->row_array();
            if($closeinfo){
                $refundinfo['closeinfo'] = $closeinfo['content'];
            }else{
                $refundinfo['closeinfo'] = "";
            }
	        if($refundinfo['refund_type']==1){
	            $refundinfo['refundtype']='退款不退货';
	        }else{
	            $refundinfo['refundtype']='退款并退货';
	        }
	        $spg_id = $this->db->select('spg_id')->from('shop_order')->where('order_sn',$refundinfo['order_sn'])->get()->row('spg_id');
	        if(!$spg_id){
	            $guide_info = $this->store_model->getGuideInfo(1,$refundinfo['store_id']);
	            $guide_info = $guide_info[0];
	        }else{
	            $guide_info = $this->store_model->getGuideInfo(2,$spg_id);
	        }
	        $this->smarty->assign('guide_info',$guide_info);
	        $this->smarty->assign('refundinfo',$refundinfo);
	        $this->smarty->assign('closeinfo',$closeinfo);
	        $this->smarty->display('applyReturnMoney_result.html');
	    }
	}
	
	
	//查看完整协商记录
	public function applyReturnMoney_lookAllRecord(){
	    
	    if(isset($_GET['refund_id']) && !empty($_GET['refund_id'])){
	        $this->db->select('goods_id,order_goods_id,goods_ea_id,refund_id,order_sn,store_id,refund_type,reason_info,refund_amount_apply,add_time');
	        $this->db->from('shop_order_refund_return');
	        $this->db->where('refund_id',$_GET['refund_id']);
	        $refundinfo =$this->db->get()->row_array();

	        
	        $this->db->select('spg_id,refund_state');
	        $this->db->from('shop_order');
	        $this->db->where('order_sn',$refundinfo['order_sn']);
	        $closeinfo =$this->db->get()->row_array();
	        $order = $this->order_model->order_info($refundinfo['order_sn']);
	        $orderInfo = $order['orderInfo'];
	        if(!($closeinfo['refund_state']==2 && $refundinfo['goods_id']==0)){
	             foreach ($orderInfo  as $key=>$val){
	                 if($val['goods_id']!=$refundinfo['goods_id']){
	                     unset($orderInfo[$key]);
	                 }
	             }
	        }
	        
	        
	        $this->db->select('action_type,content,add_time,type');
	        $this->db->from('shop_order_return_log');
	        $this->db->where('return_id',$_GET['refund_id']);
	        $this->db->order_by('add_time','DESC');
	        $this->db->order_by('sornid','DESC');
	        $logoinfo =$this->db->get()->result_array();
	        if($logoinfo){
	            foreach ($logoinfo  as $key=>$val){
	                $logoinfo[$key]['pic_info']="";
	                $logoinfo[$key]['actiontype']="";
	                $logoinfo[$key]['reason_info']="";
	                if($val['action_type']==1){
	                    $logoinfo[$key]['actiontype']="买家";
	                }elseif ($val['action_type']==2){
	                    $logoinfo[$key]['actiontype']="商家";
	                }else{
	                    $logoinfo[$key]['actiontype']="平台";
	                }
	                if($val['type']==1){
	                    if($val['content']){
	                        $content = object_array(json_decode($val['content']));
	                        $logoinfo[$key]['content']=$content['note'];
	                        $logoinfo[$key]['reason_info']=$content['reason_info'];
	                        $logoinfo[$key]['pic_info']=unserialize($content['pic_info']);
	                    }
	                }elseif ($val['type']==5){
	                    if(!empty($val['content'])){
	                        $logoinfo[$key]['content']=str_replace('%','<br/>',$val['content']);
	                    }
	                }
	            }
	        }
	        
	        $spg_id =$closeinfo['spg_id'];
	        if(!$spg_id){
	            $guide_info = $this->store_model->getGuideInfo(1,$refundinfo['store_id']);
	            $guide_info = $guide_info[0];
	        }else{
	            $guide_info = $this->store_model->getGuideInfo(2,$spg_id);
	        }
	        //print_r($logoinfo);die;
	        $this->smarty->assign('guide_info',$guide_info);
	        $this->smarty->assign('refundinfo',$refundinfo);
	        $this->smarty->assign('orderInfo',$orderInfo);
	        $this->smarty->assign('logoinfo',$logoinfo);
	        $this->smarty->display('applyReturnMoney_lookAllRecord.html');
	    }
	}
	
	
	//填写快递信息
	public function write_ExpressInfo(){
	    $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:false;
	    $refund_id = isset($_GET['refund_id']) && !empty($_GET['refund_id'])?$_GET['refund_id']:false;
	    $op = isset($_GET['op']) && !empty($_GET['op'])?$_GET['op']:false;
	    $ops = isset($_GET['ops']) && !empty($_GET['ops'])?$_GET['ops']:false;
	    if($op && $op=="write"){
	        $opss = isset($_POST['ops']) && !empty($_POST['ops']) ?$_POST['ops']:false;
	        $result =array('state'=>false,'msg'=>'提交失败，请稍后再试!');
	        $arr=array(
	            'express_id'=>$_POST['express_id'],
	            'invoice_no'=>$_POST['invoice_no'],
	            'refund_tel'=>$_POST['refund_tel'],
	            'ship_time'=>time()
	        ); 
	        if($opss && $opss=='rewrite'){
	            $arr['seller_state'] = 2;
	            $arr['refund_state'] = 1;
	        }
	         if($this->db->update('shop_order_refund_return',$arr,array('refund_id'=>$_POST['refund_id']))){
	             $return_log_arr=array(
	                 'return_id'=>$_POST['refund_id'],
	                 'add_time'=>time(),
	                 'guide_id'=>$user_id,
	                 'action_type'=>1,
	                 'type'=>5
	             );
	             $express_name = $this->db->select('e_name')->from('express')->where('e_code',$_POST['express_id'])->get()->row('e_name');
	             $return_log_arr['content'] ="快递公司:".$express_name."%快递单号:".$_POST['invoice_no']."%联系电话:".$_POST['refund_tel'];
	             $this->db->insert('shop_order_return_log',$return_log_arr);
	                $result ['state'] = true;
	                $result ['msg'] = "快递信息已提交,请等待商家确认收货,页面即将返回用户中心!";
	                $result ['refund_id'] = $_POST['refund_id'];
	            }
	        echo json_encode($result);exit();
	    }
	    if($_GET['refund_id']){
	        $this->db->select('refund_id,refund_tel');
	        $this->db->from('shop_order_refund_return');
	        $this->db->where('refund_id',$_GET['refund_id']);
	        $refundinfo =$this->db->get()->row_array();
	        $this->smarty->assign('refundinfo',$refundinfo);
	        //快递公司
	        $this->db->select('e_name,e_code');
	        $this->db->from('express');
	        $this->db->order_by('id','ASC');
	        $refund_reason  = $this->db->get()->result_array();
	        if(empty($refund_reason)){
	            $refund_reason =array(0=>array('reason_id'=>'ems','reason_info'=>'EMS'));
	        }
	        $reason = '[';
	        foreach ($refund_reason as $key=>$val){
	            $label = $val['e_name'];
	            $value = $val['e_code'];
	            $reason .='{label:'."'{$label}'".",value:"."'{$value}'".'},';
	        }
	        $reason = strrev($reason);
	        $reason = substr($reason,1);
	        $reason = strrev($reason);
	        $reason .= ']';
	        $this->smarty->assign('reason',$reason);
	        $this->smarty->assign('refundreason',json_encode($refund_reason));
	        if($ops && $ops=="rewrite"){
	            $this->smarty->assign('ops',$ops);
	        }
	       $this->smarty->display('applyReturnMoney_writeExpressInfo.html');
	    }
	   
	}
	
	
	
	
	//删除上传图片
	public function del_set_onload(){
	    $result =array('state'=>false,'msg'=>'');
	    if(isset($_GET['url']) && !empty($_GET['url'])){
	        $url = $_GET['url'];
	        @unlink(ROOTPATH.'./application/vmall/views/images/'.$url);
	        foreach ($_SESSION['file_name'] as $key=>$val){
	            if($val==$url){
	                unset($_SESSION['file_name'][$key]);
	            }
	        }
	        $result ['state'] = true;
	    }
	    echo json_encode($result);exit();
	    
	}
	
	
	//申请售后上传图片
	public function apply_set_onload(){
	    $file =array();
	    if(isset($_FILES['file']) && !empty($_FILES['file'])){
	        foreach ($_FILES['file'] as $key=>$val){
	            $file[$key]=array_pop($val);
	        }
	    }
	    $idsids = $_POST['idsids'];
	    $savePath = './application/vmall/views/images/'; // 设置上传路径
	    if (!file_exists($savePath) || !is_writable($savePath)) {
	        @mkdir($savePath, 0755);
	    }
	    if(!empty($file) &&  !empty($file['name']) && $file['error']==0){
	        $tmp_size = $file['size'];
	        if($tmp_size > 1024*1024*3){
	            $return = array(
	                'state'=>false,
	                'msg'=>"图片文件大于3M，请重新上传"
	            );
	            echo json_encode($return);
	            exit();
	        }
	        $tmp_file = $file['tmp_name'];
	        $file_types = explode ( ".", $file['name'] );
	        $file_type = $file_types [count ( $file_types ) - 1];
	        if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
	            $return = array(
	                'state'=>false,
	                'msg'=>"不是图片文件，请重新上传"
	            );
	            echo json_encode($return);
	            exit();
	        }
	    
	        $str = date ( 'YmdHis' ) . uniqid ()."_apply"; // 以时间来命名上传的文件
	        $file_name = $str . "." . $file_type; // 是否上传成功
	        if (! copy( $tmp_file, $savePath . $file_name )) {
	            $return = array(
	                'state'=>false,
	                'msg'=>"图片上传失败，请稍后重新上传"
	            );
	            echo json_encode($return);
	            exit();
	        }else{
	            
	            if(!isset($_SESSION['file_name']) || empty($_SESSION['file_name'])){
	                $this->session->set_userdata(array('file_name'=>array(0=>$file_name)));
	            }else{
	                $data = $_SESSION['file_name'];
	                $num = count($_SESSION['file_name']);
	                $data = array_merge(array($num=>$file_name),$data);
	                $this->session->set_userdata(array('file_name'=>$data));
	            }
	            
	            $return = array(
	                'state'=>true,
	                'msg'=> $file_name,
	                'idsids'=>$idsids
	            );
	            echo json_encode($return);exit();
	        }
	    
	    }
	    
	    
	}
	
	
	
	//评价晒单
	public function rating_sheet(){
		if(isset($_SESSION['file_name'])){
	        $this->common_function->del_applyServices_pic($_SESSION['file_name']);
	        unset($_SESSION['file_name']);
	    }
	        if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	            $order = $this->order_model->order_info($_GET['order_sn']);
	            $orderInfo = $order['orderInfo'];
	            $goodsAll = count($order['orderInfo']);
	            if(isset($_GET['goods_id']) && !empty($_GET['goods_id'])){
	                foreach ($orderInfo as $key=>$val){
	                    if($val['goods_id']!=$_GET['goods_id']){
	                        unset($orderInfo[$key]);
	                    }
	                }
	            }else{
	                //判断订单下面的商品个数
	                if($goodsAll>1){
	                    header("location:".base_url('vmall.php/order/rating_sheet_list?order_sn=').$_GET['order_sn']);exit;
	                }
	            }
	            sort($orderInfo);
	            $this->smarty->assign('reciveInfo',$order['reciveInfo']);
	            $this->smarty->assign('orderInfo',$orderInfo);
	            $this->smarty->display('evaluateGoods.html');
	        }else{
	            $this->common_function->show_message("系统繁忙，稍后再试！");exit;
	        }
	    
	   
	}
	
	//评价晒单
	public function rating_sheet_list(){
	    if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	        $order = $this->order_model->order_info($_GET['order_sn']);
	        foreach ($order['orderInfo'] as $key=>$val){
	            $order['orderInfo'][$key]['evaluation_state'] = $this->db->select('evaluation_state')->where('order_sn',$_GET['order_sn'])->where('goods_id',$val['goods_id'])->get('shop_order_goods')->row("evaluation_state");
	        }
	        $this->smarty->assign('reciveInfo',$order['reciveInfo']);
	        $this->smarty->assign('orderInfo',$order['orderInfo']);
	        $this->smarty->display('evaluateGoods_list.html');
	    }
	    
	}
	
	
	//评价晒单提交
	public function post_rating_sheet(){
	    $user_id = isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])?$_SESSION['user_id']:false;
	    $result =array('state'=>false,'msg'=>'评价商品失败,请稍后再试！');
	    if(isset($_POST['order_sn']) && !empty($_POST['order_sn'])){
	        $order_sn = trim($_POST['order_sn']);
	        $goods_id = trim($_POST['goods_id']);
	        $evaluation_level =isset($_POST['evaluation_level']) ? trim($_POST['evaluation_level']):'';
	        $evaluation_content =isset($_POST['evaluation_content']) ? trim($_POST['evaluation_content']):"";
	        if(isset($_SESSION['file_name']) && !empty($_SESSION['file_name'])){
	            $geval_image = serialize($_SESSION['file_name']);
	        }else{
	            $geval_image ="";
	        }
	        $this->db->select('evaluation_state,evaluation_content,geval_image,goods_name');
	        $this->db->from('shop_order_goods');
	        $this->db->where('order_sn',$order_sn);
	        $this->db->where('user_id',$user_id);
	        $this->db->where('goods_id',$goods_id);
	        $info = $this->db->get()->row_array();
	        if($info['evaluation_state'] ==0){
	            $inner = array(
	                'evaluation_state' =>1,
	                'evaluation_time' => time(),
	                'evaluation_level' => $evaluation_level,
	                'evaluation_content' =>$evaluation_content."###",
	                'geval_image'=>$geval_image."###"
	            );
	            
	        }elseif($info['evaluation_state']==1){
                $inner = array(
                    'evaluation_state' =>3,
                    'evaluation_content' =>$info['evaluation_content'].$evaluation_content,
                    'geval_image'=>$info['geval_image'].$geval_image
                );
	        }else{
	            $result ['msg'] = "亲，您已评价过该商品，不能再次评价啦！";
	            if(isset($_SESSION['file_name'])){
	                unset($_SESSION['file_name']);
	            }
	            echo json_encode($result);exit;
	        }
	        $this->db->trans_off(); //禁用事务
	        $this->db->trans_start(); //开启事务
	        $this->db->where('order_sn ='.$order_sn.'   and   goods_id='.$goods_id);
	        $res = $this->db->update('shop_order_goods', $inner);
	        
	        $order = $this->order_model->order_info($_POST['order_sn']);
	        $ratingres = true;
	        foreach ($order['orderInfo'] as $key=>$val){
	            $rating = $this->db->select('evaluation_state')->where('order_sn',$_POST['order_sn'])->where('goods_id',$val['goods_id'])->get('shop_order_goods')->row("evaluation_state");
	            if(!$rating){
	                $ratingres = false;
	                break;
	            }
	        }
	        if($ratingres){
	            $this->db->where('order_sn',$_POST['order_sn']);
	            $res =$this->db->update('shop_order', array("evaluation_state"=>1,'order_status'=>50,'evaluation_time'=>time()));
	        }
	        $res =$ress=$this->db->insert('shop_order_log',array("order_sn"=>$_POST['order_sn'],"log_msg"=>"评价晒单，用户评价晒单 商品：".$goods_id,"log_role"=>"用户","log_user"=>$user_id,"log_time"=>time(),"log_orderstate"=>50));
	        $this->db->trans_complete(); //事务完成
	        $this->db->trans_off(); //禁用事务
	        if($res){
	            $result ['state'] = true;
	            $result ['msg'] = "亲，谢谢您做出的评价，我们将提供更优质的服务！";

                //发送推送消息
                $user_name=$this->db->select('user_name')->where('user_id',$user_id)->get('user')->row('user_name');
                $payload=array('tag'=>'orderEvaMsg','orderId'=>$order_sn,'userName'=>$user_name,'goodsName'=>$info['goods_name']);
                $title='商品评价通知';
                $content="会员".$user_name."对商品进行了评价";
                $res= $this->common_function->pushMsg($title,$content,$payload,$order_sn);//发送推送消息

            }
	    }
	    
	    if(isset($_SESSION['file_name'])){
	        unset($_SESSION['file_name']);
	    }
	    echo json_encode($result);exit;
	
	}
	
	
	
	//评价导购
	public function evaluate_guide(){
	    if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	        $order = $this->order_model->order_info($_GET['order_sn']);
	        $spg_id = $order['orderInfo'][0]['spg_id'];
	        $guide_info = $this->store_model->getGuideInfo(2,$spg_id);
	        if(empty($guide_info['spg_ewm'])){
	            $url = base_url("vmall.php/receive/download_much_short?id=".$spg_id);
	            $ch = curl_init();
	            curl_setopt($ch, CURLOPT_URL, $url);
	            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	            $output = curl_exec($ch);
	            curl_close($ch);
	            $jsoninfo = json_decode($output, true);
	            $guide_info = $this->store_model->getGuideInfo(2,$spg_id);
	        }
	        $guide_info['spg_ewm'] = base_url($guide_info['spg_ewm']);
	        $this->smarty->assign('guide_info',$guide_info);
	        $this->smarty->assign('order_sn',$_GET['order_sn']);
	        $this->smarty->display('evaluateGuide.html');
	    }

	}
	
	
	//评价导购提交
	public function post_evaluate_guide(){
	    $result =array('state'=>false,'msg'=>'评价导购失败,请稍后再试！');
	    $lengs = isset($_POST['lengs']) && !empty($_POST['lengs'])?$_POST['lengs']:false;
	    $order_sn = isset($_POST['order_sn']) && !empty($_POST['order_sn'])?$_POST['order_sn']:false;
	    $spg_id = isset($_POST['spg_id']) && !empty($_POST['spg_id'])?$_POST['spg_id']:false;
	    $str = isset($_POST['str']) && !empty($_POST['str'])?$_POST['str']:false;
	    if($lengs &&  $order_sn && $spg_id){
	        $str = strrev($str);
	        $str = substr($str,1);
	        $str = strrev($str);
	        $inner = array(
	            'order_sn' =>$order_sn,
	            'spg_id' => $spg_id,
	            'evaluation_grade' =>  $lengs,
	            'evaluation_label' => $str,
	            'evaluation_time'=> time()
	        );
	        $res =$ress=$this->db->insert('shop_order_shoppingguide_evaluation',$inner);
	        if($res){
	            $result ['state'] = true;
	            $result ['msg'] = "亲，谢谢您做出的评价，我们将提供更优质的服务！";
	        }
	    }
	    echo json_encode($result);exit;
	
	}
	
	//再次购买转发
	public function again_bay(){
	    $order_sn = isset($_GET['order_sn']) && !empty($_GET['order_sn']) ?$_GET['order_sn']:false;
	    $store_id = isset($_GET['store_id']) && !empty($_GET['store_id']) ?$_GET['store_id']:false;
	    $goods_id =isset($_GET['goods_id']) && !empty($_GET['goods_id']) ?$_GET['goods_id']:false;
	    $goods_ea_id = isset($_GET['goods_ea_id']) && !empty($_GET['goods_ea_id']) ?$_GET['goods_ea_id']:false;
	    //$goods_a_id = isset($_GET['goods_a_id']) && !empty($_GET['goods_a_id']) ?$_GET['goods_a_id']:false;
	    //$size =isset($_GET['size']) && !empty($_GET['size']) ?$_GET['size']:false;
	    if($store_id && $goods_id && $order_sn){
	        $order = $this->order_model->order_info($order_sn);
	        $goodsAll = count($order['orderInfo']);
	        if($goodsAll==1){
	            $url = base_url().'vmall.php/goods/goods_info?store_id='.$store_id."&goods_id=".$goods_id."&goods_ea_id=".$goods_ea_id;
	            header("location:".$url);exit;
	        }else{
	            $this->smarty->assign('reciveInfo',$order['reciveInfo']);
	            $this->smarty->assign('orderInfo',$order['orderInfo']);
	            $this->smarty->display('againBay.html');
	        }
	    }
	}
	
	
	
	
	//查看评价列表
	public function evaluateGoods_add_list(){
	    if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	        $order = $this->order_model->order_info($_GET['order_sn']);
	        foreach ($order['orderInfo'] as $key=>$val){
	            $order['orderInfo'][$key]['evaluation_state'] = $this->db->select('evaluation_state')->where('order_sn',$_GET['order_sn'])->where('goods_id',$val['goods_id'])->get('shop_order_goods')->row("evaluation_state");
	        }
	        $this->smarty->assign('reciveInfo',$order['reciveInfo']);
	        $this->smarty->assign('orderInfo',$order['orderInfo']);
	        $this->smarty->display('evaluateGoods_add_list.html');
	    }
	     
	}
	
	//查看评价
	public function evaluateGoods_add(){
	    if(isset($_GET['order_sn']) && !empty($_GET['order_sn'])){
	        $order = $this->order_model->order_info($_GET['order_sn']);
	        $orderInfo = $order['orderInfo'];
	        $goodsAll = count($order['orderInfo']);
	        if(isset($_GET['goods_id']) && !empty($_GET['goods_id'])){
	            foreach ($orderInfo as $key=>$val){
	                if($val['goods_id']!=$_GET['goods_id']){
	                    unset($orderInfo[$key]);
	                }
	            }
	            
	            //评价
	            $this->db->select('s.goods_color,s.goods_size,s.goods_name,s.rec_id,s.evaluation_state,s.evaluation_time,s.evaluation_level,s.goods_image,s.evaluation_content,s.geval_image,s.geval_explain,u.user_name,u.head_portrait');
	            $this->db->from('shop_order_goods as s');
	            $this->db->join('user as u','u.user_id=s.user_id');
	            $this->db->where('s.order_sn',$_GET['order_sn']);
	            $this->db->where('s.goods_id',$_GET['goods_id']);
	            $this->db->where('s.user_id',$_SESSION['user_id']);
	            $this->db->where('evaluation_state in (1,3)');
	            $evaluate_info = $this->db->get()->row_array();
	            if($evaluate_info){
	                //$geval_image = unserialize($evaluate_info['geval_image']);
	                $evaluation_content = trim($evaluate_info['evaluation_content']);
	                if(stripos($evaluation_content,"###")===false){
	                    $evaluate_info['geval_image'] = !empty($evaluate_info['geval_image']) ? @unserialize($evaluate_info['geval_image']):"";
	                    $evaluate_info['evaluation_content'] = $evaluation_content;
	                    $evaluate_info['add_geval_image'] = "";
	                    $evaluate_info['add_evaluation_content'] = "";
	                }else{
	                    $geval_image =explode("###",$evaluate_info['geval_image']);
	                    $evaluation_content = explode("###",$evaluation_content);
	                    $evaluate_info['geval_image'] = isset($geval_image[0]) && !empty($geval_image[0]) ? @unserialize($geval_image[0]):"";
	                    $evaluate_info['evaluation_content'] = $evaluation_content[0];
	                    $evaluate_info['add_geval_image'] = isset($geval_image[1]) && !empty($geval_image[1]) ? @unserialize($geval_image[1]):"";
	                    $evaluate_info['add_evaluation_content'] = isset($evaluation_content[1]) && !empty($evaluation_content[1]) ? $evaluation_content[1]:"";
	                }
	                
	            }
	            $this->smarty->assign('evaluate_info',$evaluate_info);
	            
	        }else{
	            //判断订单下面的商品个数
	            if($goodsAll>1){
	                header("location:".base_url('vmall.php/order/evaluateGoods_add_list?order_sn=').$_GET['order_sn']);exit;
	            }else{
	                //评价
	                $this->db->select('s.goods_color,s.goods_size,s.goods_name,s.rec_id,s.evaluation_state,s.evaluation_time,s.evaluation_level,s.goods_image,s.evaluation_content,s.geval_image,s.geval_explain,u.user_name,u.head_portrait');
	                $this->db->from('shop_order_goods as s');
	                $this->db->join('user as u','u.user_id=s.user_id');
	                $this->db->where('s.order_sn',$_GET['order_sn']);
	                $this->db->where('s.goods_id',$orderInfo[0]['goods_id']);
	                $this->db->where('s.user_id',$_SESSION['user_id']);
	                $this->db->where('evaluation_state in (1,3)');
	                $evaluate_info = $this->db->get()->row_array();
	                if($evaluate_info){
	                    //$geval_image = unserialize($evaluate_info['geval_image']);
	                    $evaluation_content = trim($evaluate_info['evaluation_content']);
	                    if(stripos($evaluation_content,"###")===false){
	                        $evaluate_info['geval_image'] = !empty($evaluate_info['geval_image']) ? @unserialize($evaluate_info['geval_image']):"";
	                        $evaluate_info['evaluation_content'] = $evaluation_content;
	                        $evaluate_info['add_geval_image'] = "";
	                        $evaluate_info['add_evaluation_content'] = "";
	                    }else{
	                        $geval_image =explode("###",$evaluate_info['geval_image']);
	                        $evaluation_content = explode("###",$evaluation_content);
	                        $evaluate_info['geval_image'] = isset($geval_image[0]) && !empty($geval_image[0]) ? @unserialize($geval_image[0]):"";
	                        $evaluate_info['evaluation_content'] = $evaluation_content[0];
	                        $evaluate_info['add_geval_image'] = isset($geval_image[1]) && !empty($geval_image[1]) ? @unserialize($geval_image[1]):"";
	                        $evaluate_info['add_evaluation_content'] = isset($evaluation_content[1]) && !empty($evaluation_content[1]) ? $evaluation_content[1]:"";
	                    }
	                     
	                }
	                $this->smarty->assign('evaluate_info',$evaluate_info);
	            }
	        }
	        sort($orderInfo);
	        $this->smarty->assign('reciveInfo',$order['reciveInfo']);
	        $this->smarty->assign('orderInfo',$orderInfo);
	        $this->smarty->display('evaluateGoods_add.html');
	    }else{
	        $this->common_function->show_message("系统繁忙，稍后再试！");exit;
	    }
	     
	
	}
	
	
	

}
