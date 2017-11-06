<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
	public function __construct()
    {
        parent::__construct();

    }
    public function order_type(){
        return array('1'=>'分销','2'=>'微商','3'=>'电商','4'=>'门店');
    }
    public function order_from(){
        return array('1'=>'微商城','21'=>'单门店','2'=>'单门店','22'=>'集合店','3'=>'APP','31'=>'APP微商','32'=>'APP批发','41'=>'电商京东','42'=>'电商天猫','43'=>'电商手工','44'=>'电商引流','45'=>'电商引流','46'=>'电商引流'); 
    }
    public function order_status($type=1){
        if($type==2){
            return array('0'=>'已取消','10'=>'待付款','20'=>'待自提','30'=>'待自提','40'=>'待评价','50'=>'已完成',''=>'未知');
        }else{
            return array('0'=>'已取消','10'=>'待付款','20'=>'待收货','30'=>'待收货','40'=>'待评价','50'=>'已完成',''=>'未知');
        }
    }
    public function order_status_admin(){
        return array('0'=>'已取消','10'=>'未付款','20'=>'已付款','30'=>'已发货','31'=>'部分发货','40'=>'已收货','50'=>'已完成',''=>'未知',);
    }
    public function shipping_type(){
        return array('1'=>'快递','2'=>'自提');
    }
    public function pay_type(){
        return array('1'=>'微信','2'=>'线下','3'=>'余额','4'=>'支付宝','41'=>'京东','42'=>'淘宝','0'=>'未知');
    }
    public function order_info($order_sn){
        $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
        $orderInfo = array();$reciveInfo = array();
        if(is_array($order_sn)&&isset($order_sn['order_pay'])){
            $paydata = $order_sn;
            $order_sn =$order_sn['order_pay']; 
        }else{
            $order_sn = is_array($order_sn)?$order_sn:explode(',',$order_sn);
        }
        $orderInfo = $this->db->select('o.carriage,o.pickup_code,o.order_sn,o.order_from,o.buyer_id,o.pay_sn,og.goods_pay_price,o.order_price,o.goods_price as order_goods,
        		o.rechargeable_card_num,o.integral_amount,o.pd_amount,o.counpon_amount,og.coupon_amount,o.order_type,o.pay_type,o.order_status,o.shipping_type,o.receive_name,
	        o.receive_province,o.receive_city,o.receive_area,o.receive_address,o.receive_mobile,o.created_time,o.store_id,o.store_name,o.spg_id,o.evaluation_time,o.evaluation_state,
	        og.goods_id,og.goods_name,og.goods_image,og.goods_num,og.goods_a_id,og.goods_color,og.goods_size_remark,og.goods_color_remark,og.goods_ea_id,og.uec_goods_image
        	,og.uec_goods_size,og.uec_stock_price,og.outside_son_order_sn,og.uec_skuiid_iid,og.uec_num_iid,og.express_sn,og.uec_express,og.uec_goods_color,og.uec_goods_name
	        ,og.goods_size,og.goods_price,a.area_name as province,b.area_name as city,c.area_name as area,o.out_order_sn,o.pay_sn,o.uec_goods_price,
        		o.uec_carriage_price,o.uec_carriage_name,o.bind_ecstore_name,o.uec_order_status,uec_order_time,
            sr.refund_type,sr.seller_state,sr.refund_state,og.coupon_id')
	        ->from('shop_order as o')  
	        ->join('shop_order_goods as og','og.order_sn=o.order_sn','left')
	        ->join('shop_order_refund_return as sr','sr.order_sn=og.order_sn','left')
	        ->join('area as a','a.area_id=o.receive_province','left')
	        ->join('area as b','b.area_id=o.receive_city','left')
	        ->join('area as c','c.area_id=o.receive_area','left')
	        ->where_in('o.order_sn',$order_sn)
	        ->get()->result_array();

        $goodspayprice = 0;
        $goodsprice = 0;
        $seller_refund_state = "";//未申请退款
        /*  `seller_state` tinyint(1) unsigned DEFAULT '1' COMMENT '卖家处理状态:1为待审核,2为同意,3为不同意,默认为1',
  `refund_state` tinyint(1) unsigned DEFAULT '1' COMMENT '申请状态:1为处理中,2为待管理员处理,3为已完成,4,取消默认为1',  */
        if($orderInfo){
            foreach ($orderInfo as $key=>$val){
                $goodspayprice+=$val['goods_pay_price'];
                $goodsprice+=$val['goods_price'];
                if(empty($val['seller_state']) && empty($val['refund_state'])){
                    $seller_refund_state .=1; //未申请
                }elseif($val['refund_state']==3 && $val['seller_state']==3){
                    $seller_refund_state .=2;//  管理员不同意  退款/货已
                }else{
                    $seller_refund_state .=3;
                }
            }
        }
        if(stripos($seller_refund_state,'1')!==false && stripos($seller_refund_state,'2')!==false  && stripos($seller_refund_state,'3')===false ){
            $sellerRefund_state = 1;   //  可以申请退款
        }elseif(stripos($seller_refund_state,'1')!==false && stripos($seller_refund_state,'2')===false  && stripos($seller_refund_state,'3')===false){
            $sellerRefund_state = 1;   //  可以申请退款
        }elseif(stripos($seller_refund_state,'1')===false && stripos($seller_refund_state,'2')!==false  && stripos($seller_refund_state,'3')===false){
            $sellerRefund_state = 1;   //  可以申请退款
        }else{
            $sellerRefund_state = 2;   //  不能申请退款
        }
        
        
        
//       var_dump ($orderInfo);
	    $order_recive = isset($orderInfo[0])?$orderInfo[0]:'';
        $counpon_amount=0;$goods_price=0;$pay_price=0;
	    foreach($orderInfo as $v){
            $counpon_amount += $v['counpon_amount'];
            $goods_price+=$v['order_goods'];
            $pay_price+=$v['order_price'];
        }
	    $discount = $order_recive['counpon_amount'];
        $order_type = $this->order_type();
        $order_status = $this->order_status($order_recive['shipping_type']);
        $shipping_type = $this->shipping_type();
        $pay_type = $this->pay_type();
        if(!empty($order_recive) && !empty($order_recive['shipping_type'])){
            if($order_recive['shipping_type']==2){
                //openid获取用户信息
                $this->db->select('wx_nickname,tel');
                $this->db->from('user');
                $this->db->where('user_id',$user_id);
                $userinfo = $this->db->get()->row_array();
                $order_recive['receive_name'] =$userinfo['wx_nickname'];
                $order_recive['receive_mobile'] =empty($userinfo['tel'])?'':$userinfo['tel'];
                $order_recive['receive_address'] = empty($order_recive['store_name'])?'':$order_recive['store_name'];
            }
        }
        if(empty($order_recive['pay_type'])){
        	if($order_recive['order_from']==41){
        		$order_recive['pay_type'] =41;
        	}elseif($order_recive['order_from']==42){
        		$order_recive['pay_type'] =42;
        	}elseif($order_recive['order_from']==43){
        		$store_buyer = $this->db->select('bind_ecstore_type')->where('store_id',$order_recive['buyer_id'])->get('store')->row_array();
        		$order_recive['pay_type'] =($store_buyer['bind_ecstore_type']==1)?41:(($store_buyer['bind_ecstore_type']==2)?42:0);
        	}else{
        		$order_recive['pay_type'] =0;
        	}
        }
        if(isset($paydata)){
//           var_dump ($paydata);
            //$payBalance = $paydata['money']-$paydata['userIntegral']-$paydata['userBalance']-$paydata['userCounpon_amount'];
//            $payBalance = $paydata['money']-$paydata['userIntegral']-$paydata['userCounpon_amount'];
            $reciveInfo = array(
            	'out_order_sn'=>empty($order_recive)?'':in_array($order_recive['order_from'],array(41,42))?$order_recive['out_order_sn']:$order_recive['order_sn'],
                'order_type'=>empty($order_recive)?'':$order_type[$order_recive['order_type']],
            	'order_from'=>empty($order_recive)?'':$order_recive['order_from'],
                'ordertype'=>empty($order_recive)?'':in_array($order_recive['order_from'],array(43))?43:$order_recive['order_type'],
                'order_status'=>empty($order_recive)?'':in_array($order_recive['order_from'],array(41,42))?$order_status[$order_recive['uec_order_status']]:$order_status[$order_recive['order_status']],
                
                'shipping_type'=>empty($order_recive)?'':$shipping_type[$order_recive['shipping_type']],
                'order_time'=>empty($order_recive)?'':date('Y-m-d H:i:s',$order_recive['created_time']),
            	'uec_order_time'=>in_array($order_recive['order_from'],array(41,42))?date('Y-m-d H:i:s',$order_recive['uec_order_time']):date('Y-m-d H:i:s',$order_recive['created_time']),
                
                'receive_name'=>empty($order_recive)?'':$order_recive['receive_name'],
                'receive_mobile'=>empty($order_recive)?'':$order_recive['receive_mobile'],
                'receive_addr'=>empty($order_recive)?'':$order_recive['province'].' '.$order_recive['city'].' '.$order_recive['area'].' '.$order_recive['receive_address'],
                'order_sn'=>join(',',$paydata['order_pay']),

                'goods_money'=>$goods_price,//订单价格
                'pay_money'=>$pay_price,//实际支付
                //'pay_pd'=>$paydata['userBalance'],//余额支付
                'pay_integral'=>sprintf('%0.2f',$paydata['userIntegral']),//积分支付
                'pay_counpon'=>sprintf('%0.2f',$counpon_amount),//优惠卷支付
                'uec_goods_price'=>empty($order_recive)?'':$order_recive['uec_goods_price'],
            	'uec_carriage_price'=>empty($order_recive)?'':$order_recive['uec_carriage_price'],
            	'order_price'=>$pay_price,
            	
                'order_discount'=>$counpon_amount,
                'order_carriage'=>empty($order_recive)?'':sprintf('%0.2f',$order_recive['carriage']),
                'pay_type'=>empty($order_recive)?'':$pay_type[$order_recive['pay_type']],
                'paytype'=>empty($order_recive)?'':$order_recive['pay_type'],
                'pickup_code'=>empty($order_recive)?'':$order_recive['pickup_code'],
                'evaluation_state'=>empty($order_recive)?'':$order_recive['evaluation_state'],
                'seller_refund_state'=>$sellerRefund_state
            );
        }else{
//            var_dump ($goods_price);
            //$payBalance = $order_recive['order_price']-$order_recive['pd_amount']-$order_recive['counpon_amount']-$order_recive['integral_amount'];
//            $payBalance = $order_recive['order_price'];
            
            $reciveInfo = array(
            	'out_order_sn'=>empty($order_recive)?'':in_array($order_recive['order_from'],array(41,42))?$order_recive['out_order_sn']:$order_recive['order_sn'],
                'order_type'=>$order_type[$order_recive['order_type']],
            	'order_from'=>empty($order_recive)?'':$order_recive['order_from'],
                'ordertype'=>empty($order_recive)?'':$order_recive['order_type'],
                'order_status'=>empty($order_recive)?'':in_array($order_recive['order_from'],array(41,42))?$order_status[$order_recive['uec_order_status']]:$order_status[$order_recive['order_status']],
                'shipping_type'=>$shipping_type[$order_recive['shipping_type']],
                'order_time'=>date('Y-m-d H:i:s',$order_recive['created_time']),
            	'uec_order_time'=>in_array($order_recive['order_from'],array(41,42))?date('Y-m-d H:i:s',$order_recive['uec_order_time']):date('Y-m-d H:i:s',$order_recive['created_time']),
                'receive_name'=>$order_recive['receive_name'],
                'receive_mobile'=>$order_recive['receive_mobile'],
                'receive_addr'=>$order_recive['province'].' '.$order_recive['city'].' '.$order_recive['area'].' '.$order_recive['receive_address'],
                'order_sn'=>join(',',$order_sn),
                'goods_money'=>$goods_price,//订单价格
                'pay_money'=>sprintf('%0.2f',$pay_price),//实际支付
                //'pay_pd'=>$order_recive['pd_amount'],//预存款支付
                'pay_integral'=>sprintf('%0.2f',$order_recive['integral_amount']),//积分支付
                'pay_counpon'=>sprintf('%0.2f',$counpon_amount),//优惠卷支付
            		'uec_goods_price'=>empty($order_recive)?'':$order_recive['uec_goods_price'],
            		'uec_carriage_price'=>empty($order_recive)?'':$order_recive['uec_carriage_price'],
                'order_price'=>empty($order_recive)?'':$order_recive['order_price'],
                'order_discount'=>$counpon_amount,
                'order_carriage'=>empty($order_recive)?'':sprintf('%0.2f',$order_recive['carriage']),
                'pay_type'=>$pay_type[$order_recive['pay_type']],
                'paytype'=>$order_recive['pay_type'],
                'pickup_code'=>empty($order_recive)?'':$order_recive['pickup_code'],
                'evaluation_state'=>empty($order_recive)?'':$order_recive['evaluation_state'],
                'seller_refund_state'=>$sellerRefund_state
            );
        }
        if($reciveInfo['ordertype']==3){
        	$reciveInfo['order_status'] = $order_status[$order_recive['uec_order_status']];
        	$reciveInfo['order_time'] = empty($order_recive['uec_order_time'])?'':date('Y-m-d H:i:s',$order_recive['uec_order_time']);
        	//$reciveInfo['order_status'] = $order_status[$order_recive['uec_order_status']];
        }
//        var_dump ($reciveInfo);
        return array('orderInfo'=>$orderInfo,'reciveInfo'=>$reciveInfo);
    }
    public function order_create($goods,$address,$note,$pay_id,$shipType,$goods_price,$order_price,$coupon=array(),$coupon_source=''){
        $user_id = $_SESSION['user_id'];
        $store_userInfo = $this->db->select('u.ecshopping_guide_id,u.ecgustore_id,u.ecstore_id,s.store_name,sg.spg_name')
        ->from('user u')->join('store s','s.store_id=u.ecstore_id','left')
        ->join('store_shopping_guide sg','sg.spg_id=u.ecshopping_guide_id','left')
        ->where('u.user_id',$user_id)
        ->get()->row_array();
        $store_userId = $store_userInfo['ecstore_id'];
        $store_userName = $store_userInfo['store_name'];
        $guide_userId = $store_userInfo['ecshopping_guide_id'];
        $guide_userName = $store_userInfo['spg_name'];
        $goods_arr = array();$coupon_log = array();
        foreach ($goods as $k=>$v){
        	$goods_s = $v['goods'];
        	$goods_s['goods_price'] = $goods_s['stocks_price'];
        	//print_r($goods_s);die;
        	if($coupon_source=='coupon'&&isset($coupon[$goods_s['ssa_id']])){
        		$coupon_id = $coupon[$goods_s['ssa_id']]['coupon_id'];
        		$coupon_list = $coupon[$goods_s['ssa_id']]['coupon_list'];
        		$coupon_amount = $coupon[$goods_s['ssa_id']]['coupon_amount'];
//        		var_dump ($coupon_id);
        		if(!empty($coupon_id)){
        			$choose_coupon_id = isset($coupon_list[0])?$coupon_list[0]:'';
        			$choose_coupon = $this->db->select('uc.user_coupon_id,uc.coupon_activity_id,uc.coupon_activity_type,sc.coupon_name')
        			->from('user_coupon uc')
        			->join('shop_coupon sc','sc.coupon_id=uc.coupon_id')
        			->where('uc.user_id',$user_id)
        			->where('uc.user_coupon_id',$choose_coupon_id)->get()->row_array();
        			$goods_s['coupon_id'] =  $choose_coupon_id;
        			$goods_s['coupon_amount'] = $coupon_amount;
        			$goods_s['goods_pay_price'] = $goods_s['stocks_price']-$coupon_amount;
        			$goods_s['coupon_name'] =  empty($choose_coupon)?'':$choose_coupon['coupon_name'];
        			$goods_s['promotions_id'] = empty($choose_coupon)?'':$choose_coupon['coupon_activity_id'];
        			$goods_s['activity_type'] = empty($choose_coupon)?'':$choose_coupon['coupon_activity_type'];
        			unset($coupon_list[0]);
        			sort($coupon_list);
//                    var_dump ($goods_s['coupon_id']);die;
        		}else{
        			$goods_s['coupon_id'] =  '';
        			$goods_s['coupon_name'] =  '';
        			$goods_s['coupon_amount'] = '';
        			$goods_s['goods_pay_price'] = $goods_s['stocks_price'];
        			$goods_s['promotions_id'] = '';
        			$goods_s['activity_type'] = '';
        		}
        	}else{
        		$goods_s['coupon_id'] =  '';
        		$goods_s['coupon_name'] =  '';
        		if($coupon_source=='micro'){
        			$goods_s['goods_pay_price'] = $goods_s['stocks_price'];
        			$goods_s['goods_price'] = isset($goods_s['stocks_price_old'])?$goods_s['stocks_price_old']:$goods_s['stocks_price'];
        			$goods_s['coupon_name'] =  isset($v['bargain_title'])?$v['bargain_title']:'';
        			$goods_s['promotions_id'] = isset($v['bargain_id'])?$v['bargain_id']:'';
        			$goods_s['activity_type'] = '6';//砍价
        			$goods_s['coupon_amount'] = $goods_s['goods_price']-$goods_s['goods_pay_price'];
        		}else{
        			$goods_s['coupon_amount'] = '';
        			$goods_s['goods_pay_price'] = $goods_s['stocks_price'];
        			$goods_s['promotions_id'] = '';
        			$goods_s['activity_type'] = '';
        		}
        	}
            $goods_arr[$v['storeId']]['goods'][] = $goods_s;
            $goods_arr[$v['storeId']]['storeId'] = $v['storeId'];
            $goods_arr[$v['storeId']]['storeName'] = $v['storeName'];
        }
        //print_r($goods_arr);die;
        $orderAll = array();$time = time();
        $orderAll['pay_sn'] = $orderPay_sn = $this->common_function->makePaySn($user_id);
        if(!empty($address)){
            $rec_arr = $this->shop->get_reciver_info($address);
            $orderAll['receive_name'] = $rec_arr['rec_name'];
            $orderAll['receive_mobile'] = $rec_arr['tel'];
            $orderAll['receive_tel'] = $rec_arr['tel_2'];
            $orderAll['receive_province'] = $rec_arr['province_id'];
            $orderAll['receive_city'] = $rec_arr['city_id'];
            $orderAll['receive_area'] = $rec_arr['area_id'];
            $orderAll['receive_address'] = $rec_arr['address'];
            $orderAll['receive_postcode'] = $rec_arr['postcode'];
        }
        $orderAll['buyer_memo'] = $note;$orderAll['order_from'] = 1;
        $orderAll['order_type'] = 2;$orderAll['pay_type'] = $pay_id;$orderAll['order_status'] = 10;
        $orderAll['buyer_id'] = $user_id;$orderAll['shipping_type'] = $shipType;
        $orderAll['created_time'] = $time;
        $sql_order= array();$sql_goods= array();$money = 0;$goods_money = 0;$sql_log = array();$carts = array();$order_pay = array();$orderB = array();
        $userBalance = 0;$userIntegral = 0;$userCounpon_amount = 0;//余额，积分，优惠卷
        $order_store = array();$order_coupon_list = array();
        foreach ($goods_arr as $k=>$v){
            $order = array();
            $order = $orderAll;
            $store_id = $k;
            $order_sn = $this->common_function->produce_order_sn($store_id);
            $order['order_sn'] = $order_sn;
            $order['spg_id'] = $guide_userId;
            $order['spg_name'] = $guide_userName;
            $order['store_id'] = $store_id;
            $order['store_name'] = $v['storeName'];
            $order_store[$store_id] = $v['storeName'];
            $gprice = 0;$gnum = 0;$coupon_amount=0;
            foreach ($v['goods'] as $gk=>$gv){
                $carts[] = $gv['cart_id'];
                $gprice += $gv['goods_price']*$gv['goods_num'];
                $coupon_amount +=$gv['coupon_amount'];
                $gnum += $gv['goods_num'];
                $order_goods = array();
                $order_goods['order_sn'] = $order_sn;
                $order_goods['goods_id'] = $gv['goods_id'];
                $order_goods['goods_name'] = $gv['goods_name'];
                $order_goods['goods_image'] = $gv['goods_img'];
                $order_goods['goods_num'] = $gv['goods_num'];
                $order_goods['goods_size'] = $gv['goods_spec'];
                $order_goods['goods_color'] = $gv['goods_color'];
                $order_goods['goods_a_id'] = $gv['goods_a_id'];
                $order_goods['goods_price'] = $gv['goods_price'];
                $order_goods['goods_color_remark'] = $gv['color_remark'];
                $order_goods['goods_size_remark'] = $gv['size_remark'];
                $order_goods['goods_ea_id'] = $gv['goods_ea_id'];
                $order_goods['user_id'] = $user_id;
                $order_goods['store_id'] = $store_id;
                $order_goods['coupon_id'] = $gv['coupon_id'];
                if(!empty($gv['coupon_id'])){
                	$order_coupon_list[] = $gv['coupon_id'];
                }
                $order_goods['goods_pay_price'] = $gv['goods_pay_price'];
                $order_goods['coupon_amount'] = $gv['coupon_amount'];
                $order_goods['promotions_id'] = $gv['promotions_id'];
                $order_goods['activity_type'] = $gv['activity_type'];
                $order_goods['coupon_name'] = $gv['coupon_name'];
                $goods_stock = $this->db->select('se.stocks_price,se.stocks_sku,se.stocks_bar_code,g.gc_id')->from('shop_goods_extend_attr as se')
                ->join('shop_goods as g','g.goods_id=se.goods_id','left')
                ->where('goods_a_id',$gv['goods_a_id'])
                ->where('size',$gv['goods_spec'])->get()->row_array();
                $order_goods['gc_id'] = $goods_stock['gc_id'];
                $order_goods['stock_code'] = $goods_stock['stocks_sku'];
                $order_goods['sotck_barcode'] = $goods_stock['stocks_bar_code'];
                $sql_goods[] = $order_goods;
            }
            $store_name=$this->db->select('order_take_percentage,follow_user_percentage')->where('store_id',$store_id)->get('store')->row_array();
            $rebate=unserialize($store_name['order_take_percentage']);    //抽成比例
            $rebate_sys=empty($rebate['online'])?0:$rebate['online'];
            $user_fl=empty($store_name['follow_user_percentage'])?0:$store_name['follow_user_percentage'];
            $carriage = 0;//运费
            $order_price = $gprice+$carriage;
//            var_dump ($oprice);die;
            $order['goods_price'] = $gprice;
            $order['goods_num'] = $gnum;
            $order['order_price'] = $order_price-$coupon_amount;
            $order['carriage'] = $carriage;
            //$orderD = array();
            $order['coupon_id'] = 0;
            $order['rechargeable_card_num'] = 0;$order['counpon_amount'] = $coupon_amount;$order['integral_amount'] = 0;//预存款支付，优惠卷支付，积分支付
            $order['rebate'] = $rebate_sys;$order['rebate_amount'] = ($gprice-$order['counpon_amount'])*$rebate_sys;
//           var_dump ($order);die;
            //$order['order_pointscount'] = intval($oprice-$order['counpon_amount']-$order['integral_amount']);//赠送积分
            //$order['fanli'] = $user_fl;$order['fanli_amount'] = $user_fl*($oprice-$order['counpon_amount']-$order['integral_amount']);//订返点，返点金额
            //$orderB[$order_sn] = $orderD;
            $userBalance+=$order['rechargeable_card_num'];
            $userCounpon_amount+=$order['counpon_amount'];
            $userIntegral+=$order['integral_amount'];
            $orderLog = array();
            $orderLog['order_sn'] = $order_sn;
            $orderLog['log_msg'] = '订单微商城下单并支付';
            $orderLog['log_time'] = $time;
            $orderLog['log_role'] = '用户';
            $orderLog['log_user'] = $user_id;
            $orderLog['log_orderstate'] = $orderAll['order_status'];
            $sql_log[] = $orderLog;
            $sql_order[]=$order;
            $order_pay[] = $order_sn;
            $money +=$order_price;
            $goods_money +=$gprice;
        
        }
//        print_r($sql_order);print_r($sql_goods);exit;
        $success = false;
        $payBalance = 0;
        if($sql_order&&$sql_goods){
            $integral_rate = $this->common_function->get_system_value('integral_rate');
            $integral_rate = empty($integral_rate)?1000:$integral_rate;
            $userIntegral_num = ceil($userIntegral*$integral_rate);
            $payBalance = $money-$userBalance-$userCounpon_amount;
            $pay_balance = ($pay_id==3)?$payBalance:0;
            $payIntegral = intval($money-$userCounpon_amount);
            $balance = $this->db->select('balance,integral,integral_total,rechargeable_card_num')->where('user_id',$user_id)->get('user')->row_array();
            $balance_sql = "update ".$this->db->dbprefix('user')." set balance =balance-{$pay_balance},
            integral =integral-'{$userIntegral_num}'+'{$payIntegral}',integral_total =integral_total+{$payIntegral}
            where user_id = '{$user_id}'";//更新资金
            //用户资金日志
            $platPayBalance = $money-$userCounpon_amount;
            $add_user_log_sql = '';
            if($pay_balance!=0){
                $add_user_log_sql ="insert into ".$this->db->dbprefix('user_asset_log')."
                (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
                values({$user_id},'{$orderPay_sn}',3,{$pay_balance},0,
                (select balance from ".$this->db->dbprefix('user').
                " u where u.user_id={$user_id}),'通过订单支付单号{$orderPay_sn}支付{$pay_balance}',{$time})"; //增加用户资金金额日志
            }
            $platAsset = $this->db->select('asset')->from('sys_asset_account')->order_by('paa_id','DESC')->limit(1)->get()->row('asset');
            $platAsset +=$platPayBalance;
            $add_plat_log_sql ="insert into ".$this->db->dbprefix('sys_asset_account')."
            (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
            values({$user_id},'{$orderPay_sn}',3,0,'{$platPayBalance}','{$platAsset}',
            '通过订单支付单号{$orderPay_sn}收入{$platPayBalance}',{$time})"; //增加平台资金金额日志
            
            /* $payOver = array();
            foreach ($paydata['order_pay'] as $k=>$v){
                $payOver[$k] = $paydata['orderB'][$v];
                $payOver[$k]['order_sn'] = $v;
            } */
            //print_r($payOver);exit;
            $this->db->trans_start();
            if($pay_id==3){
            	if(!empty($order_coupon_list)){
            		$this->db->where_in('user_coupon_id',$order_coupon_list)->update('user_coupon',array('coupon_cost_time'=>$time));
            	}
                $this->db->insert_batch('shop_order',$sql_order);
                $this->db->insert_batch('shop_order_goods',$sql_goods);
                $this->db->insert_batch('shop_order_log',$sql_log);
                if(!empty($carts)){
                    $this->db->where_in('cart_id',$carts)->delete('shop_cart');//删除购物车
                }
                if($balance['balance']<$payBalance){
                    if($this->db->trans_status() === FALSE){
                        $this->db->trans_rollback();
                        echo "<script>javascript:alert('订单生成失败');window.location.href='".base_url("vmall.php/user/user_shopping_cart")."';</script>";
                        //header("location:".base_url("vmall.php/user/index"));
                        die;
                    }else{
                        $this->db->trans_complete();
                        $success = true;
                        $this->session->set_userdata('orderPostCode','0');
                    
                    }
                    echo "<script>javascript:alert('余额不足！！！');window.location.href='".base_url("vmall.php/user/index")."';</script>";
                    //header("location:".base_url("vmall.php/user/index"));
                    die;
                }else{
                    
                    if($this->db->trans_status() === FALSE){
                        $this->db->trans_rollback();
                    }else{
                        $this->db->trans_complete();
                        $success = true;
                        $this->session->set_userdata('orderPostCode','0');
                    }
                }

            }else{
                $this->db->insert_batch('shop_order',$sql_order);
                $this->db->insert_batch('shop_order_goods',$sql_goods);
                $this->db->insert_batch('shop_order_log',$sql_log);
                if(!empty($carts)){
                    $this->db->where_in('cart_id',$carts)->delete('shop_cart');//删除购物车
                }
                if($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                }else{
                    $this->db->trans_complete();
                    $success = true;
                    $this->session->set_userdata('orderPostCode','0');

                }
            }

        }
        if(!$success){
            echo "<script>javascript:alert('订单生成失败');window.location.href='".base_url("vmall.php/user/user_shopping_cart")."';</script>";
            //header("location:".base_url("vmall.php/user/index"));
            die;
        }
        $data = array(
            'money'=>$money,'userBalance'=>$userBalance,'userCounpon_amount'=>$userCounpon_amount,'pay_sn'=>$orderAll['pay_sn'],
            'order_pay'=>$order_pay,'goods_money'=>$goods_money,'order_store'=>$order_store,'userIntegral'=>$userIntegral,'payBalance'=>$payBalance
        );
        if($pay_id==3){
            $data['balance_sql'] = $balance_sql;
            $data['add_user_log_sql'] = $add_user_log_sql;
            $data['add_plat_log_sql'] = $add_plat_log_sql;
            
        }
        return $data;
    }
    
}
