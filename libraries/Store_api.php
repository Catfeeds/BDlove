<?php

/**
 *  StoreApi Class
 * API类
 * @gjd		
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_api {

    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct() {
        // Assign the CodeIgniter super-object
        $this->CI = & get_instance();
        $this->CI->load->library('common_function');
    }


    /** 获取SessionKey
     * @string  $code             授权需要的code
     * @return  $sessionKey_info  授权信息
     * @author   gjd
     */
    function get_SessionKey($code) {
        $app_info = $this->CI->db->select('AppKey,AppSecret,auth_url')->from('ecstore')->where('ecs_code', 2)->get()->row_array();
        $url = "{$app_info['auth_url']}token";       //到中间件去获取session_key
//        $url = "192.168.0.123:8888/auth/token";       //到中间件去获取session_key
        $postfields = array(
            'grant_type' => 'authorization_code',
            'client_id' => $app_info['AppKey'],
            'client_secret' => $app_info['AppSecret'],
            'code' => $code, //中间件判断使用 
            'store_type' => "tb",
            'redirect_uri' => "",
        );
        $post_data = '';
        foreach ($postfields as $key => $value) {
            $post_data .= "$key=" . urlencode($value) . "&";
        }
//        var_dump($url);exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        //指定post数据
        curl_setopt($ch, CURLOPT_POST, true);

        //添加变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, substr($post_data, 0, -1));
        $output = curl_exec($ch);
        $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $sessionKey_info = (array) (json_decode($output));
//         var_dump($sessionKey_info);exit;
        if (!array_key_exists('error', $sessionKey_info) && isset($sessionKey_info['access_token'])) {
            $access_token = $sessionKey_info['access_token'];
            return $sessionKey_info;
        } else {
            return false;
        }
    }
    /** 获取指定用户的指定店铺信息
    *
    * @param    number     $store_id       店铺流水号
    * @return   array
    * @author gjd
    */
    public function get_store_by_id($store_id) {
    	if (empty($store_id)) {
    		return false;
    	}
    	$store_info = $this->CI->db->select('s.store_id,s.store_name,s.bind_ecstore_name,s.bind_ecstore_type,s.bind_token_session,
    			s.bind_auth_time,e.ecs_name,e.ecs_code,e.AppKey,e.AppSecret')->from('store as s')
    	->join('ecstore as e', 's.bind_ecstore_type=e.ecs_code', 'left')->where('s.store_id', $store_id)->get()->row_array();
    	return $store_info;
    }
    /**
     * 写入订单同步表数据
     * @param array $data  数据
     * @param array $info  店铺数据
     * @param bool
     */
    public function inner_orders_sync($data, $info,$operate='') {
    	//        var_dump($data);
    	//$data = object_array(json_decode($data));
    	//print_r($data);exit;
    	ignore_user_abort(true);
    	if ($this->CI->config->config['sync_logs']) {
    		if (!is_dir(ROOTPATH . 'logs/stores')) {
    			@mkdir(ROOTPATH . 'logs/stores');
    		}
    		if (!is_dir(ROOTPATH . 'logs/stores/' . $info['store_id'])) {
    			@mkdir(ROOTPATH . 'logs/stores/' . $info['store_id']);
    		}
    	}
    	$log_status = $this->CI->config->config['sync_logs'];
    	$log_path ='stores/'.$info['store_id'].'/orders_sync_'.date("Y-m-d",time()).'.log';
    	note_log($log_path,'店铺' . $info['store_id'] . '开始处理订单数据',$log_status);
    	$time = time();
    	$iiud_arr = [];
    	
    	/*淘宝交易状态。可选值: * TRADE_NO_CREATE_PAY(没有创建支付宝交易) * WAIT_BUYER_PAY(等待买家付款) * SELLER_CONSIGNED_PART(卖家部分发货) * 
    	 * WAIT_SELLER_SEND_GOODS(等待卖家发货,即:买家已付款) * WAIT_BUYER_CONFIRM_GOODS(等待买家确认收货,即:卖家已发货) * TRADE_BUYER_SIGNED(买家已签收,货到付款专用) *
    	 *  TRADE_FINISHED(交易成功) * TRADE_CLOSED(付款以后用户退款成功，交易自动关闭) * TRADE_CLOSED_BY_TAOBAO(付款以前，卖家或买家主动关闭交易) 
    	 *  * PAY_PENDING(国际信用卡支付付款确认中) * WAIT_PRE_AUTH_CONFIRM(0元购合约中)*/
    	/*1）WAIT_SELLER_STOCK_OUT 等待出库
2）SEND_TO_DISTRIBUTION_CENER 发往配送中心（只适用于LBP，SOPL商家）
3）DISTRIBUTION_CENTER_RECEIVED 配送中心已收货（只适用于LBP，SOPL商家）
4）WAIT_GOODS_RECEIVE_CONFIRM 等待确认收货
5）RECEIPTS_CONFIRM 收款确认（服务完成）（只适用于LBP，SOPL商家）
6）WAIT_SELLER_DELIVERY等待发货（只适用于海外购商家）
7）FINISHED_L 完成
8）TRADE_CANCELED 取消
9）LOCKED  已锁定*/
    	if($info['ecs_code']==1){
    		$tb_state_arr = array('WAIT_SELLER_STOCK_OUT' => 10, 'SEND_TO_DISTRIBUTION_CENER' => 10, 'DISTRIBUTION_CENTER_RECEIVED' => 10, 'WAIT_GOODS_RECEIVE_CONFIRM' => 10,
    				'RECEIPTS_CONFIRM' => 10, 'WAIT_SELLER_DELIVERY' => 10, 'FINISHED_L' => 10, 'TRADE_CANCELED' => 0, 'LOCKED' => 0);
    		$tb_state_arr_uec = array('WAIT_SELLER_STOCK_OUT' => 20, 'SEND_TO_DISTRIBUTION_CENER' => 20, 'DISTRIBUTION_CENTER_RECEIVED' => 20, 'WAIT_GOODS_RECEIVE_CONFIRM' => 30,
    				'RECEIPTS_CONFIRM' => 40, 'WAIT_SELLER_DELIVERY' => 20, 'FINISHED_L' => 50, 'TRADE_CANCELED' => 0, 'LOCKED' => 0);
    		$this->CI->load->library('jd_op');
    		$this->CI->jd_op->foo($info['AppKey'], $info['AppSecret'], $info['bind_token_session']);
    		$express = $this->CI->jd_op->get_store_express();      //获取商家全部快递信息
    		//print_r($express);die;
    		if ($express->code == 0) {
    			$express = $express->delivery_companies;$express_arr = array();
    			foreach ($express as $exp) {
    				$express_arr[$exp->id] = $exp->name;
    			}
    		}else{
    			note_log($log_path,'京东快递查询失败',$log_status);$express = array();
    		}
    	}elseif($info['ecs_code']==2){
    		$tb_state_arr = array('TRADE_CANCELED' => 0, 'WAIT_BUYER_PAY' => 0, 'WAIT_SELLER_SEND_GOODS' => 10, 'SELLER_CONSIGNED_PART' => 10,
    				'WAIT_BUYER_CONFIRM_GOODS' => 10, 'TRADE_BUYER_SIGNED' => 10, 'TRADE_FINISHED' => 10, 'TRADE_CLOSED' => 0, 'TRADE_CLOSED_BY_TAOBAO' => 0,
    				'TRADE_NO_CREATE_PAY' => 0, 'WAIT_PRE_AUTH_CONFIRM' => 0, 'PAY_PENDING' => 0, 'ALL_WAIT_PAY' => 0, 'ALL_CLOSED' => 0);
    		$tb_state_arr_uec = array('TRADE_CANCELED' => 0, 'WAIT_BUYER_PAY' => 0, 'WAIT_SELLER_SEND_GOODS' => 20, 'SELLER_CONSIGNED_PART' => 31,
    				'WAIT_BUYER_CONFIRM_GOODS' => 30, 'TRADE_BUYER_SIGNED' => 40, 'TRADE_FINISHED' => 50, 'TRADE_CLOSED' => 0, 'TRADE_CLOSED_BY_TAOBAO' => 0,
    				'TRADE_NO_CREATE_PAY' => 0, 'WAIT_PRE_AUTH_CONFIRM' => 0, 'PAY_PENDING' => 0, 'ALL_WAIT_PAY' => 0, 'ALL_CLOSED' => 0);
    	}
    	$sql_order_up = array();$sql_order_in = array();$sql_goods_inn = array();
    	foreach ($data as $k=>$v){
    		$order = array();$sql_goods_in = array();$sql_goods_up = array();$sql_order_log = array();$has_cancel = false;
    		if($info['ecs_code']==1){
    			if(empty($v->order_id)){
    				 continue;
    			}
    			$out_order_sn = $v->order_id;
    			$out_order_status = $v->order_state;
    		}elseif($info['ecs_code']==2){
    			if(empty($v['tid'])){
    				 continue;
    			}
    			$out_order_sn = $v['tid'];
    			$out_order_status = $v['status'];
    		}else{
    			break;
    		}
    		$check_out_order = $this->CI->db->select('order_sn,order_status,store_id')->where('out_order_sn',$out_order_sn)
    		->where('buyer_id',$info['store_id'])
    		->where('order_type',3)->get('shop_order')->row_array();
    		if(!empty($check_out_order)){
    			if($check_out_order['order_status']>=20){
    				$error_msg = "订单本地已做修改不用同步。";
    				note_log($log_path,'外部订单'.$out_order_sn.$error_msg,$log_status);
    				continue;
    			}
    			$order['order_sn'] = $check_out_order['order_sn'];
    			if(!isset($tb_state_arr[$out_order_status])){
    				note_log($log_path,'订单'.$v['tid'].'未付款或者已取消不用同步',$log_status);
    				continue;
    			}elseif($tb_state_arr[$out_order_status]==0){
    				$has_cancel = true;
    			}
    		}else{
    			if(!isset($tb_state_arr[$out_order_status])||$tb_state_arr[$out_order_status]==0){
    				note_log($log_path,'订单'.$v['tid'].'未付款或者已取消不用同步',$log_status);
    				continue;
    			}
    			$order['order_sn'] = $this->CI->common_function->produce_order_sn($info['store_id']);
    		}
    		if(empty($check_out_order)){
    			$order['order_status'] = $tb_state_arr[$out_order_status];
    			$order['buyer_id'] = $info['store_id'];
    			$order['order_type'] = 3;
    			$order['shipping_type'] = 1;
    			$order['order_price'] = '';
    			$order['goods_num'] = '';
    			$order['goods_price'] = '';
    			$order['out_order_sn'] = $out_order_sn;
    			$order['bind_ecstore_name'] = $info['bind_ecstore_name'];
    		}
    		$order['uec_order_status'] = $tb_state_arr_uec[$out_order_status];
    		$order['modify_time'] = $time;
    		$order['created_time'] = $time;
    		$order['last_sycn_time'] = $time;
    		$order['seller_flag_state'] = '';
    		
    		if($info['ecs_code']==1){
    			if(empty($check_out_order)){
    				$order['order_from'] = 41;
    			}
    			$received_payment = isset($v->received_payment)?$v->received_payment:'';//实际收款 转化积分
    			//$buyer_nick = $v->pin;
    			//$order['order_from'] = 41;
    			$order['uec_carriage_price'] = $v->freight_price;
    			$order['uec_order_time'] = strtotime($v->order_start_time);
    			//$order['uec_pay_sn'] = $v->freight_price;
    			$order['uec_pay_time'] = strtotime($v->payment_confirm_time);
    			$order['uec_goods_price'] = $v->order_seller_price;
    			$order['buyer_memo'] = isset($v->order_remark)?$v->order_remark:'';
    			if(strpos($order['buyer_memo'],'云360')!==false){
    				$order['order_from'] = 44;//电商京东引流
    			}
    			$order['buyer_message'] = isset($v->vender_remark)?$v->vender_remark:'';
    			$order['receive_name'] = $v->consignee_info->fullname;
    			$receive_province = $v->consignee_info->province;
    			$receive_city = $v->consignee_info->city;
    			$receive_area = $v->consignee_info->county;
    			$receiver_address = $v->consignee_info->full_address;
    			
    			//$COD = ($v->pay_type == 1) ? $v->order_payment : '';
    			$order['receive_mobile'] = $v->consignee_info->mobile;
    			//$waybill_sn = $v->waybill;
    			$order['snapshot_url'] = isset($v->snapshot_url)?$v->snapshot_url:'';
    			$order['snapshot'] = isset($v->snapshot)?$v->snapshot:'';
    			$logistics_id = isset($v->logistics_id)?$v->logistics_id:'';
    			$order['uec_carriage_name'] = isset($express_arr[$logistics_id])?$express_arr[$logistics_id]:'';
    			$goods = $v->item_info_list;
    			$coupon_detail_list = isset($v->coupon_detail_list)?$v->coupon_detail_list:array();
    			$coupon_list = array();
    			foreach ($coupon_detail_list as $kcd=>$vcd){
    				$coupon_list[$vcd->sku_id] = $vcd->coupon_price;
    			}
    		}elseif($info['ecs_code']==2){
    			if(empty($check_out_order)){
    				$order['order_from'] = 42;
    			}
    			$received_payment = isset($v['payment'])?$v['payment']:'';//实际收款 转化积分
    			$order['uec_order_time'] = strtotime($v['created']);
    			//$order['uec_pay_sn'] = $v->freight_price;
    			$order['uec_pay_time'] = strtotime($v['pay_time']);
    			$order['buyer_memo'] = isset($v['buyer_message'])?$v['buyer_message']:'';
    			if(strpos($order['buyer_memo'],'云360')!==false){
    				$order['order_from'] = 45;//电商淘宝引流
    			}
    			$order['receive_name'] = isset($v['receiver_name'])?$v['receiver_name']:'';
    			$order['receive_mobile'] = isset($v['receiver_mobile'])?$v['receiver_mobile']:'';
    			$receive_province = isset($v['receiver_state'])?$v['receiver_state']:'';
    			$receive_city = isset($v['receiver_city'])?$v['receiver_city']:'';
    			$receive_area = isset($v['receiver_district'])?$v['receiver_district']:'';
    			$receiver_address = isset($v['receiver_address'])?$v['receiver_address']:'';
    			$order['uec_goods_price'] = $v['total_fee'];
    			$order['snapshot_url'] = isset($v['snapshot_url'])?$v['snapshot_url']:'';
    			$order['snapshot'] = isset($v['snapshot'])?$v['snapshot']:'';
    			$order['uec_carriage_price'] = $v['post_fee'];
    			//$COD = isset($v['buyer_cod_fee']) ? $v['buyer_cod_fee'] : '';  //货到付款费用
    			$order['buyer_message'] = isset($v['seller_memo']) ? $v['seller_memo'] : '';
    			$goods = $v['orders']->order;
    			$this->CI->load->library('taobao_op');
    			$this->CI->taobao_op->init($info['AppKey'],$info['AppSecret'],$info['bind_token_session']);
    			$order['receive_name'] = $this->CI->taobao_op->secret($order['receive_name']);
    			$order['receive_mobile'] = $this->CI->taobao_op->secret($order['receive_mobile'],'phone');
    			$receiver_address = $this->CI->taobao_op->secret($receiver_address);
    			$uec_express = isset($goods->logistics_company) ? $goods->logistics_company : ''; //运单号码
    			$express_sn = isset($goods->invoice_no) ? $goods->invoice_no : ''; //运单号码
    		}
    		//print_r($order);die;
    				$order['receive_province'] = $this->CI->common_function->get_area_id($receive_province);
    				$order['receive_city'] = $this->CI->common_function->get_area_id($receive_city,$order['receive_province']);
    				$order['receive_area'] = $this->CI->common_function->get_area_id($receive_area,$order['receive_city']);
    				$order['receive_address'] = $receive_province.' '.$receive_city.' '.$receive_area.' '.$receiver_address;
    				
    				$userInfo = array('user_name'=>$order['receive_name'],'user_addres'=>$order['receive_address'],'tel'=>$order['receive_mobile'],
    						'province_id'=>$order['receive_province'],'city_id'=>$order['receive_city'],'area_id'=>$order['receive_area'],'received_payment'=>$received_payment
    				);//会员信息；
    				$this->CI->common_function->insert_user_info($userInfo);
    				$num = 0;$price = 0;$price_ = 0;
    				foreach ($goods as $ka=>$va){
    					$va = object_array($va);
    					//note_log($log_path,'订单'.$out_order_sn.'商品1',$log_status);
    					//print_r($va);die;
    					if($info['ecs_code']==1){
    						$uec_express = $order['uec_carriage_name'];
    						$title = isset($va['sku_name'])?$va['sku_name']:'';
    						$num +=$va['item_total'];
    						$sku_id = $va['sku_id'];
    						$num_iid = $va['ware_id'];
    						$coupon_price = isset($coupon_list[$sku_id])?$coupon_list[$sku_id]:0;
    						$goods_price = $va['jd_price']-$coupon_price;
    						$price += $va['item_total']*$goods_price;
    						$goods_num = $va['item_total'];
    						$goods_image = $va['image'];
    						$outside_son_order_sn = '';
    						$sku_outer_id = isset($va['outer_sku_id'])?$va['outer_sku_id']:'';
    						$sku_color = isset($va['color_value'])?$va['color_value']:'';
    						$color = '花色';$sku_size='';
    						
    						$express_sn = '';//运单号码
    					}elseif($info['ecs_code']==2){
    						$order['uec_carriage_name'] = isset($va['logistics_company']) ? $va['logistics_company'] : ''; //物流公司
    						$express_sn = isset($va['invoice_no']) ? $va['invoice_no'] : '';//运单号码
    						$uec_express = isset($va['logistics_company']) ? $va['logistics_company'] : ''; //物流公司
    						$title = isset($va['title'])?$va['title']:'';
    						$num +=$va['num'];
    						$sku_id = isset($va['sku_id'])?$va['sku_id']:'';
    						$num_iid = $va['num_iid'];
    						$goods_price = $va['total_fee']/$va['num'];
    						$price += $va['total_fee'];
    						$goods_num = $va['num'];
    						$goods_image = $va['pic_path'];
    						$outside_son_order_sn = $va['oid'];
    						$sku_outer_id = isset($va['outer_sku_id'])?$va['outer_sku_id']:'';;
    						$sku_attr = isset($va['sku_properties_name'])?$va['sku_properties_name']:'';//sku属性;颜色，尺码等；
    						$sku_color = '';$color = '花色';$sku_size = '';
    						if(!empty($sku_attr)){
    							$sku_attr = explode(';',$sku_attr);
    							foreach ($sku_attr as $kac=>$vac){
    								if(empty($sku_color)){
    									if(stristr($vac,'颜色')){
    										$color_length = strripos($vac,':');
    										$sku_color = substr($vac,$color_length+1);
    									}
    								}
    								if(empty($sku_size)){
    									if(stristr($vac,'尺码')){
    										$size_length = strripos($vac,':');
    										$sku_size = substr($vac,$size_length+1);
    									}
    								}
    							}
    						}
    						
    					}
    					//note_log($log_path,'订单'.$out_order_sn.'商品2',$log_status);
    					if($tb_state_arr[$out_order_status]==0){
    						note_log($log_path,'订单'.$out_order_sn.'商品'.$sku_id.'未付款或者已取消或已发货不用同步',$log_status);
    						break;
    					}
    					//note_log($log_path,'订单'.$out_order_sn.'商品3',$log_status);
    					$sql_goods = array();$goods_order = array();
    					if(!empty($check_out_order)){
    						$goods_order = $this->CI->db->select('rec_id,goods_pay_price,goods_num')->from('shop_order_goods og')
    						->where('uec_num_iid',$num_iid)->where('uec_skuiid_iid',$sku_id)->where('out_order_sn',$out_order_sn)->get()->row_array();
    						note_log($log_path,'订单'.$out_order_sn.'同步商品'.$sku_id,$log_status);
    					}
    					
    					$check_goods = $this->CI->db->select('ss.goods_id,ss.goods_ea_id,ss.stocks_sn,ss.stocks_bar_code,ss.size,ss.goods_size_remark,ss.color,ss.goods_color_remark,
    							ss.stocks_price,ss.uec_sku_iiud,ss.uec_goods_iiud,g.gc_id,ge.goods_a_id,g.goods_name,g.goods_image')->from('store_stocks_amount ss')
    					->join('shop_goods g','g.goods_id=ss.goods_id')->join('shop_goods_extend_attr ge','ge.goods_ea_id=ss.goods_ea_id')
    					->where('ss.uec_sku_iiud',$sku_id)->where('ss.uec_goods_iiud',$num_iid)->where('ss.ssa_store_id',$info['store_id'])
    					->get()->row_array();
    					//print_r($goods_order);print_r($check_goods);die;
    					//note_log($log_path,'订单'.$out_order_sn.'商品4'.json_encode($goods_order),$log_status);
    					/* if(!empty($goods_order)&&empty($check_goods)){
    					   break;
    					} */
    					//note_log($log_path,'订单'.$out_order_sn.'商品44',$log_status);
    					$size = '';
    					$stokcs_sn = '';
    					if(!empty($sku_outer_id)){
    						$sku_outer_sn = explode('|',$sku_outer_id);
    						$stokcs_sn = isset($sku_outer_sn[0])?$sku_outer_sn[0]:'';
    						$size = isset($sku_outer_sn[1])?$sku_outer_sn[1]:'';
    						/*$jq_length = strripos($sku_outer_id,'-');
    						if($jq_length){
    							$size = substr($sku_outer_id,$jq_length+2);
    							$stokcs_sn = substr($sku_outer_id,0,$jq_length+2);
    						}*/
    					}
    					if(empty($goods_order)){
    						$sql_goods['user_id'] = $info['store_id'];
    						$sql_goods['order_sn'] = $order['order_sn'];
    						$sql_goods['out_order_sn'] = $out_order_sn;
    						$sql_goods['uec_num_iid'] = $num_iid;
    						$sql_goods['uec_skuiid_iid'] = $sku_id;
    						$sql_goods['outside_son_order_sn'] = $outside_son_order_sn;
    						$sql_goods['uec_goods_image'] = $goods_image;
    						$sql_goods['uec_goods_color'] = $sku_color;
    						$sql_goods['uec_goods_size'] = $sku_size;
    						$sql_goods['uec_goods_name'] = $title;
    						$sql_goods['goods_num'] = $goods_num;
    					}
    					$sql_goods['uec_stock_price'] = $goods_price;
    					
    					
    					$sql_goods['uec_express'] = $uec_express;
    					$sql_goods['express_sn'] = $express_sn;
    					
    					//note_log($log_path,'订单'.$out_order_sn.'商品5',$log_status);
    					if(!empty($check_goods)){
    						$sql_goods['goods_name'] = $check_goods['goods_name'];
    						$sku_img = $this->CI->db->select('goods_image')->where('color_id',$check_goods['goods_a_id'])->order_by('is_default DESC,goods_image_sort ASC')->get('shop_goods_images')->row('goods_image');
    						$img_path = base_url('data/shop/album_pic/');
    						$sql_goods['goods_image'] = !empty($sku_img)?$img_path.$sku_img:$img_path.$check_goods['goods_image'];
    						$sql_goods['goods_id'] = $check_goods['goods_id'];
    						$sql_goods['goods_a_id'] = $check_goods['goods_a_id'];
    						$sql_goods['goods_ea_id'] = $check_goods['goods_ea_id'];
    						$sql_goods['goods_color'] = $check_goods['color'];
    						$sql_goods['goods_color_remark'] = $check_goods['goods_color_remark'];
    						$sql_goods['goods_size'] = $check_goods['size'];
    						$sql_goods['goods_size_remark'] = $check_goods['goods_size_remark'];
    						$sql_goods['goods_price'] = $check_goods['stocks_price'];
    						$sql_goods['goods_pay_price'] = $check_goods['stocks_price'];
    						$sql_goods['gc_id'] = $check_goods['gc_id'];
    						$sql_goods['stock_code'] = $check_goods['stocks_sn'];
    						$sql_goods['sotck_barcode'] = $check_goods['stocks_bar_code'];

    					}elseif(empty($goods_order)){
    						$sql_goods['goods_name'] = '';
    						$sql_goods['goods_image'] = '';
    						$sql_goods['goods_id'] = '';
    						$sql_goods['goods_a_id'] = '';
    						$sql_goods['goods_ea_id'] = '';
    						$sql_goods['goods_color'] = '';
    						$sql_goods['goods_color_remark'] = '';
    						$sql_goods['goods_size'] = $size;
    						$sql_goods['goods_size_remark'] = '';
    						$sql_goods['goods_price'] = 0;
    						$sql_goods['goods_pay_price'] = 0;
    						$sql_goods['gc_id'] = '';
    						$sql_goods['stock_code'] = $stokcs_sn;
    						$sql_goods['sotck_barcode'] = '';
    						
    					}else{
    						$sql_goods['goods_pay_price']=$goods_order['goods_pay_price'];
    						$goods_num =$goods_order['goods_num'];
    					}
    					//note_log($log_path,'订单'.$out_order_sn.'商品6',$log_status);
    					$price_ +=$sql_goods['goods_pay_price']*$goods_num;
    					if(!empty($goods_order)){
    						$sql_goods['rec_id'] = $goods_order['rec_id'];
    						$sql_goods_up[] = $sql_goods;//note_log($log_path,'订单'.$out_order_sn.'商品7',$log_status);
    					}else{
    						$sql_goods_in[] = $sql_goods;//note_log($log_path,'订单'.$out_order_sn.'商品7',$log_status);
    						//$sql_goods_inn[] = $sql_goods;
    					}
    				}
    				//print_r($order);print_r($sql_goods_up);print_r($check_out_order);die;
    				$order['order_price'] = $price_;
    				$order['goods_num'] = $num;
    				$order['goods_price'] = $price_;
    				$order['uec_goods_price'] = $price;
    				if(empty($check_out_order)){
                        $this->CI->db->trans_begin(); //开启事物
                        if(!empty($order)&&!empty($sql_goods_in)){
                        	$this->CI->db->insert('shop_order',$order);
                        	note_log($log_path,'外部订单'.$out_order_sn.'订单开始入数据库'.$this->CI->db->last_query(),$log_status);
                        	$this->CI->db->insert_batch('shop_order_goods',$sql_goods_in);
                        	note_log($log_path,'外部订单'.$out_order_sn.'订单商品开始入数据库'.$this->CI->db->last_query(),$log_status);
                        }else{
                        	note_log($log_path,'外部订单'.$out_order_sn.'订单同步失败',$log_status);
                        	continue;
                        }
                        note_log($log_path,'外部订单'.$out_order_sn.'入数据库结束',$log_status);
    					$sql_order_in[] =  $order;
    					$sql_log = array();
    					$sql_log['order_sn'] = $order['order_sn'];
    					$sql_log['log_msg'] = empty($operate)?'电商门店自动同步订单':'电商门店手动同步订单';
    					$sql_log['log_time'] = $time;
    					$sql_log['log_role'] = '导购';
    					$sql_log['log_user'] = $operate;
    					$sql_log['log_orderstate'] = 10;
    					$this->CI->db->insert('shop_order_log',$sql_log);//订单日志
    					if ($this->CI->db->trans_status() === FALSE) {
    						$this->CI->db->trans_rollback();
    						$error_msg = "订单同步失败。";
    						note_log($log_path,'外部订单'.$out_order_sn.$error_msg,$log_status);
    					}else{
    						$this->CI->db->trans_commit();
    						if($info['ecs_code']==1){
    							$this->CI->load->library('jd_op');
    							$this->CI->jd_op->foo($info['AppKey'],$info['AppSecret'],$info['bind_token_session']);
    							$result = $this->CI->jd_op->remark_update($out_order_sn,'',3);
    							if($result->code != 0){
    								//$this->db->where('outside_order_sn',$ork)->where('order_from',6)->update('order',array('seller_flag_state'=>$orv));
    								//$ok = false;
    								$remark_msg = $out_order_sn.$result->msg;
    								note_log($log_path,$remark_msg,$log_status);
    							}
    						}elseif($info['ecs_code']==2){
    							$this->CI->load->library('taobao_op');
    							$this->CI->taobao_op->init($info['AppKey'],$info['AppSecret'],$info['bind_token_session']);
    							$result = $this->CI->taobao_op->remark_update($out_order_sn,'',3);
    							if(!$result['state']){
    								//$this->db->where('outside_order_sn',$ork)->where('order_from',5)->update('order',array('seller_flag_state'=>$orv));
    								//$ok = false;
    								$remark_msg = $out_order_sn.$result['msg'];
    								note_log($log_path,$remark_msg,$log_status);
    							}else{
    								note_log($log_path,$out_order_sn.'旗标回写成功',$log_status);
    							}
    						}
							/*      						$mobile = $order['receive_mobile'];//$mobile='18384148955';
                                                        $check = $this->CI->db->where('store_id', $info['store_id'])->from('store')->get()->row('is_send_sms');
                                                        $WX=$this->db->select('user_id,wx_openid')->where('tel =',$mobile)->get('user')->row()->wx_openid;
                                                        if($check&&empty($WX)){
                                                          $content0 = $this->CI->db->select('template_content,template_id')->where('template_code','gmtz')->get('sms_templates')->row_array();
                                                            //尊敬的{$USER_NAME}，您在｛$STORE_NAME｝购买的｛$BRAND_NAME｝
                                                            $USER_NAME =
                                                                ['receive_name'];$STORE_NAME = $order['bind_ecstore_name'];//$BRAND_NAME = $sql_goods_in[0]['uec_goods_name'];
                                                            $goods_brand = $this->CI->db->select('brand_name')->where('goods_id',$sql_goods_in[0]['goods_id'])->get('shop_goods')->row('brand_name');

                                                            $goods_stock = $sql_goods_in[0]['stock_code'];
                                                            $BRAND_NAME = $goods_brand.$goods_stock;
                                                            $content = $content0['template_content'];
                                                            $content = str_replace('{$USER_NAME}',$USER_NAME,$content);
                                                            $content = str_replace('{$STORE_NAME}',$STORE_NAME,$content);
                                                            $content = str_replace('{$BRAND_NAME}',$BRAND_NAME,$content);
                                                            $sms_msg = $this->CI->common_function->IHhuiYiSmsMarking($mobile,$content);
                                                            note_log($log_path,'外部订单'.$out_order_sn.$content,$log_status);
                                                            $sms_log_data['sms_template_id']=$content0['template_id'];
                                                            $sms_log_data['send_sms_time']=time();
                                                            $sms_log_data['send_user_id']='000000';
                                                            $sms_log_data['send_user_ip']=$_SERVER['REMOTE_ADDR'];
                                                            $sms_log_data['recevice_mobile']=$mobile;
                                                            $sms_log_data['is_success']=$sms_msg['satus'];
                                                            $sms_log_data['back_message']=$sms_msg['msg'];
                                                            $sms_log_data['recevice_content']=$content;

                                                            $this->CI->common_function->insertSmsLog($sms_log_data);*/


							 $msg_title = $this->CI->db->from('shop_order_goods')->where('order_sn',$order['order_sn'])->limit(1)->get()->row('goods_name');
                            $total = $this->CI->db->from('shop_order_goods')->where('order_sn',$order['order_sn'])->get()->num_rows();
                            if ($total>1){
                                $msg_title.="等 ".$total." 件商品。";
                            }
                            $wx_data = array(
                                "name"=>array("value"=>"{$msg_title}"."\n",
                                    "color"=>"#173177"
                                ),
                                "remark"=>array("value"=>"您的商品已购买成功，正在为您备货哟",
                                    "color"=>"#173177"
                                )
                            );
                            $wx_code = "gmtz";
                            $tel = $order['receive_mobile'];
                            //检查店铺是开启短信通知
                            $check = $this->CI->db->where('store_id', $_SESSION['shop_spg_store_id'])->from('store')->get()->row('is_buy_sms');
                            $sms_data = '';
                            if ($check) {
								$USER_NAME = $order['receive_name'];
								$GOODS_NAME=$msg_title;
								$BRAND_NAME = $this->CI->db->select('brand_name')->
								where('goods_id',$sql_goods_in[0]['goods_id'])->get('shop_goods')->row('brand_name');
								$USER_NAME=isset($USER_NAME)?$USER_NAME:'用户';
								$STORE_NAME=isset($STORE_NAME)?$STORE_NAME:'本店';
								$BRAND_NAME=isset($BRAND_NAME)?$BRAND_NAME:'';
								$GOODS_NAME=isset($GOODS_NAME)?$GOODS_NAME:'商品';

								$arr=array('{$USER_NAME}'=>$USER_NAME,'{$STORE_NAME}'=>$STORE_NAME,'{$BRAND_NAME}'=>$BRAND_NAME,'{$GOODS_NAME}'=>$GOODS_NAME);
								$res = $this->CI->db->select('template_id,template_content')->where('template_code','gmtz')->get('sms_templates')->row_array();
								$content=$this->CI->common_function->make_send_content($res['template_content'],$arr);
                            }

                            $order_sn = $order['order_sn'];
                            $url = base_url('vmall.php/order/order_detail?order_sn=').$order_sn;
                            $this->CI->common_function->send_msg($wx_data, $wx_code, $tel, $content, $url, $order_sn,$res['template_id']);




    						
    					    /* $msg_title = $this->CI->db->from('shop_order_goods')->where('order_sn',$order['order_sn'])->limit(1)->get()->row('goods_name');
    					    $total = $this->CI->db->from('shop_order_goods')->where('order_sn',$order['order_sn'])->get()->num_rows();
    					    if ($total>1){
                                $msg_title.="等 ".$total." 件商品。";
                            }
                            $wx_data = array(
                                "name"=>array("value"=>"{$msg_title}"."\n",
                                    "color"=>"#173177"
                                ),
                                "remark"=>array("value"=>"您的商品已购买成功，正在为您备货哟",
                                    "color"=>"#173177"
                                )
                            );
                            $wx_code = "GMTZ";
                            $tel = $order['receive_mobile'];
                            //检查店铺是开启短信通知
                            $check = $this->CI->db->where('store_id', $_SESSION['shop_spg_store_id'])->from('store')->get()->row('is_buy_sms');
                            $sms_data = '';
                            if ($check) {
                                $sms_data['phone'] = $tel;
                                $content = array ('name' => $order['receive_name'], 'asd' => 'dfdf');
                                $sms_data['content'] = json_encode ($content);
                                $sms_data['template_sms_id'] = $this->CI->db->from ('sms_templates')->where ('template_code', 'gmtz')->get ()->row ('template_sms_id');
                                $sms_data['msg'] = 'msg';
                                $sms_data['msg'] = $this->CI->db->from ('sms_templates')->where ('template_code', 'gmtz')->get ()->row ('template_content');
                                $replace_str = array ('${name}' => $order['receive_name']);
                                $sms_data['msg'] = strtr ($sms_data['msg'], $replace_str);
                            }
                            
                            $order_sn = $order['order_sn'];
                            $url = base_url('vmall.php/order/order_detail?order_sn=').$order_sn;
                            $this->CI->common_function->send_msg($wx_data, $wx_code, $tel, $sms_data, $url, $order_sn); */

    						$error_msg = "订单同步成功。";
    						note_log($log_path,'外部订单'.$out_order_sn.$error_msg,$log_status);
    						
    					}
    				}else{
    					
    					if($has_cancel){//订单取消
    						if($check_out_order['order_status']==10){
    							$this->CI->db->update('shop_order',$order,array('order_sn'=>$check_out_order['order_sn']));
    						}
    					}
    					//print_r($check_out_order);print_r($sql_goods_up);
    					if(!empty($sql_goods_up)){
    						$re = $this->CI->db->update_batch('shop_order_goods',$sql_goods_up,'rec_id');

    						/* if ($order['uec_order_status']==50){     //网店订单已完成 发送通知
                                $wx_data = array(
                                    "first"=>array("value"=>"尊敬的用户您好，您的订单已完成。"."\n",
                                        "color"=>"#173177"
                                    ),
                                    "keyword1"=>array("value"=>"{$sql_goods_up['order_sn']}"."\n",
                                        "color"=>"#173177"
                                    ),
                                    "keyword2"=>array("value"=>date ("Y-d-m H:i:s",time())."\n",
                                        "color"=>"#173177"
                                    ),
                                    "remark"=>array("value"=>"如有疑问，请联系导购。",
                                        "color"=>"#173177"
                                    )
                                );
                                $wx_code = "DDWC";
                                $tel = $order['receive_mobile'];
                                //检查店铺是开启短信通知
                                $check = $this->CI->db->where('store_id', $_SESSION['shop_spg_store_id'])->from('store')->get()->row('is_done_sms');
                                $sms_data = '';
                                if ($check) {
                                    $sms_data['phone'] = $tel;
                                    $content = array ('name' => $order['receive_name'], 'sn' => $sql_goods_up['order_sn']);
                                    $sms_data['content'] = json_encode ($content);
                                    $sms_data['template_sms_id'] = $this->CI->db->from ('sms_templates')->where ('template_code', 'ddwc')->get ()->row ('template_sms_id');
                                    $sms_data['msg'] = $this->CI->db->from ('sms_templates')->where ('template_code', 'ddwc')->get ()->row ('template_content');
                                    $replace_str = array ('${name}' => $order['receive_name'], '${order_sn}' => $sql_goods_up['order_sn']);
                                    $sms_data['msg'] = strtr ($sms_data['msg'], $replace_str);
                                }

                                $order_sn = $sql_goods_up['order_sn'];
                                $url = base_url('vmall.php/order/order_detail?order_sn=').$order_sn;
                                $this->CI->common_function->send_msg($wx_data, $wx_code, $tel, $sms_data, $url, $order_sn);
                            } */
    						if($re){
    							$error_msg = "订单同步修改商品数据成功。";
    							note_log($log_path,'外部订单'.$out_order_sn.$error_msg,$log_status);
    						}else{
    							$error_msg = "订单同步修改商品数据失败。";
    							note_log($log_path,'外部订单'.$out_order_sn.$error_msg,$log_status);
    						}
    					}
    					
    				}
    			
    		
    	}
    	//print_r($sql_goods_inn);die;
    	return true;
    }

    /**
     * 写入商品同步表数据
     * @param array $data  数据
     * @param array $info  店铺数据
     * @param bool $download_type  同步下载类型 单个true 整个店铺false
     * @param bool
     */
    public function inner_goods_sync($data, $info,$download_type=false,$order) {
        ini_set("max_execution_time", 0);
        set_time_limit(0);
    	ignore_user_abort(true);
    	if ($this->CI->config->config['sync_logs']) {
    		if (!is_dir(ROOTPATH . 'logs/stores')) {
    			@mkdir(ROOTPATH . 'logs/stores');
    		}
    		if (!is_dir(ROOTPATH . 'logs/stores/' . $info['store_id'])) {
    			@mkdir(ROOTPATH . 'logs/stores/' . $info['store_id']);
    		}
    	}
    	
    	$savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
    	$dataPath = date("Y")."/".date("m")."/".date("d")."/";
        if (!is_dir($savePath.date("Y"))){
            mkdir($savePath.date("Y"),0777,true);
        }
        if(!is_dir($savePath.date("Y")."/".date("m"))){
            mkdir($savePath.date("Y")."/".date("m"),0777,true);
        }
        if(!is_dir($savePath.date("Y")."/".date("m")."/".date("d"))){
             mkdir($savePath.date("Y")."/".date("m")."/".date("d"),0777,true);
        }
    	
    	
    	$log_status = $this->CI->config->config['sync_logs'];
    	$log_path ='stores/'.$info['store_id'].'/goods_sync_'.date("Y-m-d",time()).'.log';
    	$spu_path ='stores/'.$info['store_id'].'/goods_spu_'.date("Y-m-d",time()).'.log';
    	
    	note_log($spu_path ,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 店铺' . $info['store_id'] . '开始处理同步数据//   本次同步'.count($data)."个商品".PHP_EOL,$log_status);
    	$time = time();
    	$iiud_arr = [];
    	foreach ($data as $dv) {
    	    $iiud = '';$spu = '';$sku = '';$PropImg=array();$spu_outer_id='';$sku_outer_id='';
    		$sk_info = array();$priceinfo = array();
    		if ($info['ecs_code'] == 1) {//jd
    			if (isset($dv->skus)) {
    				$iiud = $dv->ware_id;
    				$spu = $dv->item_num;
    				$sku = $dv->skus;
    				
    			}
    		} elseif ($info['ecs_code'] == 2) {//tb
    			if (isset($dv['num_iid'])) {
    				$iiud = $dv['num_iid'];
    				$spu_outer_id = $spu = $dv['outer_id'];//款号  商家外部编码
    				if($dv['priceinfo']['state']){
    				    $priceinfo =$dv['priceinfo']['priceinfo']['priceinfo'];
    			    }
    				$sku = $dv['skus']['sku'];
    				if(isset($dv['prop_imgs']['prop_img'])){
    				    $PropImg  = $dv['prop_imgs']['prop_img'];//商品属性图片列表
    				}
    				if(empty($spu)){
    				    if($dv['input_pids']){
    				        if(stripos($dv['input_pids'],",")!==false){
    				            $input_pids = explode(",",$dv['input_pids']);
    				            $input_str = explode(",",$dv['input_str']);
    				            foreach ($input_pids as $key=>$val){
    				                if($val == "13021751"){
    				                    $spu_outer_id = $spu = $input_str[$key];
    				                    break;
    				                }
    				            }
    				        }else{
    				            if($dv['input_pids'] == '13021751'){
    				                $spu_outer_id = $spu = $dv['input_str'];
    				            }
    				        }
    				    }
    				
    				}
    				if(is_array($spu)){
    				    $spu_outer_id = $spu = '';
    				}
    				
    			}
    		}else{
    			break;
    		}
    				$sku_info = array();$have_goods = false;
    				note_log($log_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 开始同步'.$iiud.'款号'.$spu,$log_status);
    				note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 开始同步'.$iiud.'款号'.$spu.PHP_EOL,$log_status);
    				$ecs_code_name = '淘宝';
    				if($info['ecs_code'] == 1){
    				    $ecs_code_name ='京东';
    				    $spu_cid = $dv->cid;//叶子类目ID
    				    $spu_cid_name = '';//叶子类目名称
    				    $spu_img = $dv->logo;//图片
    				    $spu_price = $dv->jd_price;//价格
    				    $goods_name = $dv->title;//名称
    				    $brand_id = $dv->brand_id;//名称
    				    $weight = isset($dv->weight)?$dv->weight:'';
    				    $check_cid = $this->CI->db->select('gc_id,gc_name')->from('shop_goods_class')->where('ec_jd_cid',$spu_cid)->get()->row_array();
    				    
    				}elseif($info['ecs_code'] == 2){//tb
    				    $spu_cid = $dv['cid'];//叶子类目ID
    				    $spu_cid_name = $dv['cid_name'];//叶子类目名称
    				    $spu_img = $dv['pic_url'];//商品主图
    				    $spu_imgs = $dv['item_imgs']['item_img'];//商品图片列表
    				    $spu_price = $dv['price'];//价格
    				    $goods_name = $dv['title'];//名称
    				    $spu_desc = $dv['desc'];//描述
    				    $year_to_market = date("Ymd");
    				    if(isset($dv['list_time'])){
    				        $year_to_market = substr($dv['list_time'],0,4);
    				    }
    				    $wap_detail_url = $dv['wap_detail_url'];//wap描述
    				    $weight = isset($dv['item_weight'])?$dv['item_weight']:'';
    				    $check_cid = $this->CI->db->select('gc_id,gc_name')->from('shop_goods_class')->where('ec_tb_cid',$spu_cid)->get()->row_array();

    				}
    				
    				if($check_cid['gc_id']){
    				    $goods_class = $check_cid['gc_id'];$goods_class_name = $check_cid['gc_name'];
    				}else{
    				    //$goods_class = 99999;$goods_class_name = '其他'; //分类不存在 先写死；
    				    $job_pic_info = $info['ecs_code'].'_'.$spu_cid;
    				    $gc_ids = $this->CI->db->select('job_id')->from('job')->where('type',1)->where('pic_info',$job_pic_info)->where('urgency',3)->get()->row('job_id');
    				    if(!$gc_ids){
    				        $sql_jod = array('type'=>1,"job_content"=>$ecs_code_name.'分类不存在！            '.$spu_cid_name." ： ".$spu_cid,"job_title"=>'商品同步问题','pic_info'=>$job_pic_info,
    				            'submit_name'=>$info['user_name'],'guide_id'=>$info['user_id'],'contact_tel'=>$info['shop_spg_tel'],'add_time'=>time(),'urgency'=>3
    				        );
    				        $this->CI->db->insert('job',$sql_jod);
    				        $job_id = $this->CI->db->insert_id();
    				    }else{
    				        $job_id = $gc_ids;
    				    }
    				    note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 商品  iiud:'.$iiud.'  //'.$ecs_code_name.'商品分类不存在！ '.$spu_cid_name."，分类ID： ".$spu_cid."  //工单id:".$job_id.PHP_EOL,$log_status);
    				    continue;
    				}
    				$goods_id='';$goods_salenum= 0;
    				if($iiud){
    				    $check_stocks = $this->CI->db->select('goods_id')->from('store_stocks_amount')->where('uec_goods_iiud',$iiud)->where('ssa_store_id',$info['store_id'])->get()->row_array();
    				    if(!empty($check_stocks)){
    				        $this->CI->db->trans_off(); //禁用事务
    				        $this->CI->db->trans_start(); //开启事务
    				        $this->CI->db->where('goods_id',$check_stocks['goods_id'])->delete('shop_goods_images');
    				        $this->CI->db->where('goods_id',$check_stocks['goods_id'])->delete('shop_goods_extend_attr');
    				        $this->CI->db->where('goods_id',$check_stocks['goods_id'])->delete('shop_goods_extend');
    				        $this->CI->db->where('goods_id',$check_stocks['goods_id'])->delete ('shop_goods_attr_self_taxonomy');
    				        $this->CI->db->where('goods_id',$check_stocks['goods_id'])->delete ('shop_goods_attr_index');
    				        $this->CI->db->where('goods_id',$check_stocks['goods_id'])->where('ssa_store_id',$info['store_id'])->delete('store_stocks_amount');
    				        $this->CI->db->where('goods_id',$check_stocks['goods_id'])->where('goods_pos',$info['store_id'])->delete('shop_goods');
    				        $this->CI->db->trans_complete(); //事务完成
    				        $this->CI->db->trans_off(); //禁用事务
    				        $this->CI->db->select('goods_id,goods_image_id,goods_image');
    				        $this->CI->db->from('shop_goods_images');
    				        $this->CI->db->where("goods_id",$check_stocks['goods_id']);
    				        $this->CI->db->order_by ('goods_id', 'DESC');
    				        $imagesInfo = $this->CI->db->get()->result_array();
    				        if($imagesInfo){
    				            $savePath = ROOTPATH . 'data/shop/album_pic/';
    				            foreach ($imagesInfo as $ke =>$vl){
    				                if($vl['goods_image']){
    				                    @unlink($savePath.$vl['goods_image']);
    				                }
    				            }
    				        }
    				    }
    				}
    				
    				
    				//商品主图
    				if($spu_img){
    				    $spu_img_length = strripos($spu_img,'.');
    				    $spu_img_type = substr($spu_img,$spu_img_length+1);
    				    //判断图片格式
    				    if (!in_array(strtolower ( $spu_img_type ), array('gif','jpeg','png','bmp','jpg','ss2'))) {
    				        $spu_img = '';
    				    }else{
    				        $str = $this->get_msectime().date ( 'His' ).$iiud; // 以时间来命名上传的文件
    				        $file_name = $dataPath.$str . "." . $spu_img_type; // 是否上传成功
    				        @copy($spu_img,$savePath.$file_name);
    				        $spu_img = $file_name;
    				    }
    				}
    				
    				
    				$sql_goods = array('goods_name'=>$goods_name,'gc_id'=>$goods_class,'gc_name'=>$goods_class_name,
    				    'goods_price'=>$spu_price,'goods_marketprice'=>$spu_price,'discount'=>1,'goods_spu'=>$spu,'goods_image'=>$spu_img,'goods_state'=>1,
    				    'pc_desc'=>$spu_desc,'mobile_desc'=>$wap_detail_url,'goods_pos'=>$info['store_id'],'year_to_market'=>$year_to_market,
    				    'goods_edittime'=>$time,'weight'=>$weight
    				);
    				if(!$goods_id){
    				    $sql_goods['goods_addtime'] = $time;
    				    $this->CI->db->insert('shop_goods',$sql_goods);
    				    $goods_id = $this->CI->db->insert_id();
    				    note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 新增商品  iiud:'.$iiud.'//goods_id:'.$goods_id.PHP_EOL,$log_status);
    				}else{
    				    $this->CI->db->update('shop_goods',$sql_goods,array("goods_id"=>$goods_id));
    				    note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 更新商品  iiud:'.$iiud.'//goods_id:'.$goods_id.PHP_EOL,$log_status);
    				}
    				
    				if($spu_imgs){
    				    if(!isset($spu_imgs[0])){
    				        $spu_imgs_info = $spu_imgs;$spu_imgs=array();$spu_imgs[]= $spu_imgs_info;
    				    }
    				    $sql_goods_images = array();
    				    foreach ($spu_imgs as $ks=>$vs){
    				        
    				        $goods_img_info['goods_id'] = $goods_id;$goods_img_info['color_id'] = 0;
    				        $goods_img_info['goods_image_sort'] = $vs['position'];$goods_img_info['is_default'] = 1;
    				        if($vs['id']==0){
    				            $goods_img_info['goods_image'] = $spu_img;
    				        }else{
    				            $spu_img_url = $vs['url'];
    				            $spu_img_length = strripos($spu_img_url,'.');
    				            $spu_img_type = substr($spu_img_url,$spu_img_length+1);
    				            //判断图片格式
    				            if (!in_array(strtolower ( $spu_img_type ), array('gif','jpeg','png','bmp','jpg','ss2'))) {
    				                $spu_img_url = '';
    				            }else{
    				                $str = $this->get_msectime().date ( 'His' ).$iiud.$ks.($ks+1).($ks+2); // 以时间来命名上传的文件
    				                $file_name = $dataPath.$str . "." . $spu_img_type; // 是否上传成功
    				                @copy($spu_img_url,$savePath.$file_name);
    				                $spu_img_url = $file_name;
    				            }
    				            $goods_img_info['goods_image'] = $spu_img_url;
    				        }
    				        $sql_goods_images[]=$goods_img_info;
    				    }
    				    $this->CI->db->where('goods_id',$goods_id)->where('color_id',0)->delete('shop_goods_images');
    				    $this->CI->db->insert_batch('shop_goods_images',$sql_goods_images);
    				    note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 新增商品   goods_id:'.$goods_id.' 的图片',$log_status);
    				}
    				
    				 if($sku){
    				    if(!isset($sku[0])){
    				        $newsku = $sku;$sku =array();$sku[] = $newsku;
    				    }
    				    //print_r($sku);die;
    					foreach ($sku as $ku=>$vu){
    						//print_r($vu);die;
    					    $goods_color='花色';$goods_color_remark='';$goods_size='均码';$goods_size_remark='均码';$sku_imgs_info='';
    						if($info['ecs_code'] == 1){
    							$sku_id = $vu->sku_id;
	    						$sku_true_price = $sku_price = $vu->jd_price;
	    						$sku_quantity = $vu->stock_num;
	    						$sku_outer_id = $vu->outer_id;
	    						$sku_attr = $vu->color_value;//sku属性;颜色，尺码等；
	    						$sku_color = $sku_attr;
    						}elseif($info['ecs_code'] == 2){
    						    $sku_id = $vu['sku_id'];
    						    $sku_true_price = $sku_price = $vu['price'];
    						    if($priceinfo && !empty($priceinfo)){
    						        foreach ($priceinfo as $ks=>$vs){
    						            if($vs['sku_id']==$sku_id){
    						                $sku_true_price = $vs['price'];
    						                unset($priceinfo[$ks]);
    						            }
    						        }
    						    }
    						    $sku_quantity = $vu['quantity'];
    						    $sku_outer_id = $vu['outer_id'];//商家编码 货号
    						    $sku_price =  $vu['price'];
    						    $sku_attr = $vu['properties_name'];//sku属性;颜色，尺码等；
    						    $sku_attr = explode(';',$sku_attr);
    						    $sku_color = '';
    						    if($sku_attr){
    						        foreach ($sku_attr as $ka=>$va){
    						            if(empty($sku_color)){
    						                if(stripos($va,'颜色')!==false){
    						                    if(isset($PropImg) && !empty($PropImg)){
    						                        foreach ($PropImg as $key=>$val){
    						                            if(isset($val['properties'])){
    						                                if(stripos($va,$val['properties'])!==false){
    						                                    //颜色图片
    						                                    if($val['url']){
    						                                        $sku_img_info = $val['url'];
    						                                        $sku_img_length = strripos($sku_img_info,'.');
    						                                        $sku_img_type = substr($sku_img_info,$sku_img_length+1);
    						                                        //判断图片格式
    						                                        if (in_array(strtolower ( $sku_img_type ), array('gif','jpeg','png','bmp','jpg','ss2'))) {
    						                                            $str = $this->get_msectime().date ( 'His' ).$iiud.$ka.$key.($ka+1).($key+1); // 以时间来命名上传的文件
    						                                            $file_name = $dataPath.$str . "." . $spu_img_type; // 是否上传成功
    						                                            @copy($sku_img_info,$savePath.$file_name);
    						                                            $sku_imgs_info = $file_name;
    						                                            break;
    						                                        }
    						                                    }
    						                                }
    						                            }
    						                        }
    						                    }
    						                    
    						                    $color_length = strripos($va,':');
    						                    $goods_color_remark = substr($va,$color_length+1);
    						                    	
    						                }
    						                if(stripos($va,'尺码')!==false){
    						                    $color_length = strripos($va,':');
    						                    $sku_sizes = substr($va,$color_length+1);
    						                    if(stripos($sku_sizes,'/')!==false){
    						                        $sku_sizes = explode("/",$sku_sizes);
    						                        if(stripos($sku_sizes[0],'码')!==false){
    						                            $goods_size = str_replace("码","",$sku_sizes[0]);
    						                        }else{
    						                            $goods_size = $sku_sizes[0];
    						                        }
    						                        $goods_size_remark = $sku_sizes[1];
    						                    }else{
    						                        $goods_size_remark = $sku_sizes;
    						                    }
    						                }
    						            }
    						        }
    						    }
    						    if(isset($vu['barcode'])){
    						        $sku_barcode =  $vu['barcode'];
    						    }else{
    						        $sku_barcode =  '';
    						    }
    						}
    						$stokcs_sn = '';
    						if(!empty($sku_outer_id)){
    							$sku_outer_sn = explode('|',$sku_outer_id);
    							$stokcs_sn = isset($sku_outer_sn[0])?$sku_outer_sn[0]:'';
    							$goods_size = isset($sku_outer_sn[1])?$sku_outer_sn[1]:'';
//     							$jq_length = strripos($sku_outer_id,'-');
//     							if($jq_length){
//     								$goods_size = substr($sku_outer_id,$jq_length+2);
//     								$stokcs_sn = substr($sku_outer_id,0,$jq_length+2);
//     							}else{
//     								$goods_size= '';
//     								$stokcs_sn = '';
//     							}
    						}else{
    						    $sku_outer_id = '';
    						}
    						if($stokcs_sn || $goods_color_remark){
    						    $this->CI->db->select('e.goods_a_id,e.color,e.color_remark,e.color_value')
	        								 ->from('shop_goods_extend e')
                						     ->join('shop_goods_extend_attr ge','ge.goods_a_id=e.goods_a_id','left')
                						     ->where('e.goods_id',$goods_id);
    						    if($stokcs_sn){
    						        $this->CI->db->where('ge.stocks_sku',$stokcs_sn);
    						        $check_a_id = $this->CI->db->get()->row_array();
    						    }else{
    						        $this->CI->db->where('e.color',$goods_color);
    						        $this->CI->db->where('e.color_remark',$goods_color_remark);
    						        $check_a_id = $this->CI->db->get()->row_array();
    						    }
    						    if(!empty($check_a_id)){
    						        $goods_a_id = $check_a_id['goods_a_id'];
    						    }else{
    						        $this->CI->db->insert('shop_goods_extend',array('goods_id'=>$goods_id,'color'=>$goods_color,'color_remark'=>$goods_color_remark));
    						        $goods_a_id = $this->CI->db->insert_id();
    						       note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 新增商品颜色    goods_a_id:'.$goods_a_id."--".$goods_color,$log_status);
    						    }
						        //检查 goods_a_id 是否存在图片
						        $check_goods_a_id_img = $this->CI->db->select('goods_image_id,goods_image')->from('shop_goods_images')->where('goods_id',$goods_id)->where('color_id',$goods_a_id)->where('is_default',1)->get()->row_array();
						        if(empty($check_goods_a_id_img)){
						            if($sku_imgs_info){
						                $this->CI->db->insert('shop_goods_images',array('goods_id'=>$goods_id,'color_id'=>$goods_a_id,'goods_image_sort'=>1,'is_default'=>1,'goods_image'=>$sku_imgs_info));
						                note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 新增商品颜色为   goods_a_id:'.$goods_a_id.' 的主图',$log_status);
						            }
						        }else{
						            $savePath = ROOTPATH . 'data/shop/album_pic/';
						            @unlink($savePath.$sku_imgs_info);
						        }
						        if($goods_size == ''){
						            $goods_size = '均码';
						        }
    						    $check_ea_id = $this->CI->db->select('goods_ea_id,color,color_remark,color_value,size_note')->from('shop_goods_extend_attr')->where('goods_a_id',$goods_a_id)->where('size',$goods_size)->get()->row_array();
    						    $sql_ge = array('goods_a_id'=>$goods_a_id,'goods_id'=>$goods_id,'size'=>$goods_size,'color'=>isset($check_a_id['color'])?$check_a_id['color']:$goods_color,
    						        'color_value'=>isset($check_a_id['color_value'])?$check_a_id['color_value']:'','color_remark'=>isset($check_a_id['color_remark'])?$check_a_id['color_remark']:$goods_color_remark,
    						        'stocks_price'=>$sku_true_price,'stocks_marketprice'=>$sku_price,'stocks_sku'=>$stokcs_sn,'size_note'=>$goods_size_remark
    						    );
    						    if(!empty($check_ea_id)){
    						        $goods_ea_id = $check_ea_id['goods_ea_id'];
    						        $this->CI->db->update('shop_goods_extend_attr',$sql_ge,array('goods_ea_id'=>$goods_ea_id));
    						        note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 更新商品尺码    goods_ea_id:'.$goods_ea_id."--".$goods_size,$log_status);
    						    }else{
    						        $this->CI->db->insert('shop_goods_extend_attr',$sql_ge);
    						        $goods_ea_id = $this->CI->db->insert_id();
    						       note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 新增商品尺码    goods_ea_id:'.$goods_ea_id."--".$goods_size,$log_status);
    						        
    						    }
    						    $check_ssa_id = $this->CI->db->select('ssa_id,uec_sku_iiud,uec_goods_iiud')->where('goods_ea_id',$goods_ea_id)
    						    ->where('ssa_store_id',$info['store_id'])->get('store_stocks_amount')->row_array();
    						    if(!empty($check_ssa_id)){
    						        $sql_amount_up = array();
    						        $sql_amount_up['amount'] = $sku_quantity;
    						        $sql_amount_up['uec_sku_iiud'] = $sku_id;
    						        $sql_amount_up['uec_goods_iiud'] = $iiud;
    						        $sql_amount_up['uec_amount'] = $sku_quantity;
    						        $sql_amount_up['last_sync_time'] = $time;
    						        $sql_amount_up['stocks_price'] =$sku_true_price;
    						        $sql_amount_up['uec_stocks_price'] = $sku_true_price;
    						        $this->CI->db->update('store_stocks_amount',$sql_amount_up,array('ssa_id'=>$check_ssa_id['ssa_id']));
    						        note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 更新商品库存  '."sku_color:".$goods_color." --  goods_ea_id:".$goods_ea_id.PHP_EOL,$log_status);
    						    }else{
    						        $sql_amount_in = array('ssa_store_id'=>$info['store_id'],'goods_id'=>$goods_id,'goods_ea_id'=>$goods_ea_id,
    						            'stocks_sn'=>$stokcs_sn,'stocks_bar_code'=>'','amount'=>$sku_quantity,
    						            'size'=>$goods_size,'goods_size_remark'=>$goods_size_remark,
    						            'color'=>isset($check_a_id['color'])?$check_a_id['color']:$goods_color,
    						            'goods_color_remark'=>isset($check_a_id['color_remark'])?$check_a_id['color_remark']:$goods_color_remark,
    						            'update_time'=>$time,'update_user_name'=>$info['user_name'],'update_user_id'=>$info['user_id'],
    						            'update_user_type'=>2,'stocks_price'=>$sku_true_price,'uec_sku_iiud'=>$sku_id,
    						            'uec_goods_iiud'=>$iiud,'uec_amount'=>$sku_quantity,'uec_stocks_price'=>$sku_true_price,'last_sync_time'=>$time,
    						            'spu_outer_id'=>$spu_outer_id,'sku_outer_id'=>$sku_outer_id
    						        );
    						        $this->CI->db->insert('store_stocks_amount',$sql_amount_in);
    						        note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   ||  新增商品库存  '."sku_color:".$goods_color." --  goods_ea_id:".$goods_ea_id.PHP_EOL,$log_status);
    						    }
    						}else{
    						    $sql_amount_in = array('ssa_store_id'=>$info['store_id'],'goods_id'=>$goods_id,'goods_ea_id'=>$goods_ea_id,
    						        'stocks_sn'=>$stokcs_sn,
    						        'stocks_bar_code'=> $sku_barcode,
    						        'amount'=>$sku_quantity,'size'=>$goods_size,'goods_size_remark'=>$goods_size_remark,
    						        'color'=>$goods_color,'goods_color_remark'=>$goods_color_remark,
    						        'update_time'=>$time,'update_user_name'=>$info['user_name'],'update_user_id'=>$info['user_id'],
    						        'update_user_type'=>2,'stocks_price'=>$sku_price,
    						        'uec_sku_iiud'=>$sku_id,'uec_goods_iiud'=>$iiud,'uec_amount'=>$sku_quantity,'uec_stocks_price'=>$sku_price,'last_sync_time'=>$time,
    						        'spu_outer_id'=>$spu_outer_id,'sku_outer_id'=>$sku_outer_id
    						    );
    						    $this->CI->db->insert('store_stocks_amount',$sql_amount_in);
    						    note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 不存在 sku_color  goods_ea_id 新增商品库存'.PHP_EOL,$log_status);
    						}
    					}
    				}else{
    					note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   || 商品'.$goods_name.'无sku信息'.PHP_EOL,$log_status);
    				} 
    				
    				note_log($spu_path,"-".$this->get_msectime().'执行第'.$order.'次线程任务   ||  完成同步'.$iiud.'款号'.$spu.PHP_EOL.PHP_EOL,$log_status);
    				
    	}
    	note_log($spu_path ,"-".$this->get_msectime().'执行第'.$order.'次线程任务   ||  店铺' . $info['store_id'] . '本次同步'.count($data)."个商品  已完成".PHP_EOL.PHP_EOL.PHP_EOL,$log_status);
    	return  true;
    	//print_r($iiud_arr);die;
    }
    /**
     * 记录用户同步操作日志
       * @param   int     $uec_id           店铺ID
     * @param   string  $sync_statu       状态
     * @param   string  $sync_note        备注
     * @param   int     $sync_logid       流水号
     * @param  $sync_type 日志类型 1订单，2库存，3生成订单，4商品',
     */
    private function note_sync_log($sync_statu, $sync_note = '', $store_id = '', $sync_type=1,$sync_logid = false) {
        $data = array('state' => false, 'msg' => 'note sync logs error!');
        if ($sync_statu) {
            $data = array('state' => false, 'msg' => 'Parameters sync_statu cannot be empty');
        }
        if ($sync_logid) {
            $logs['sync_statu'] = $sync_statu;
            $logs['sync_time'] = time();
            if (!empty($sync_note)) {
                $logs['sync_note'] = $sync_note;
            }
            $result = $this->CI->db->update('store_syn_log', $logs, array('sync_logid' => $sync_logid));
            if ($result) {
                $data = array('state' => true, 'msg' => 'success');
            }
        } else {
            $logs = array(
                'store_id' => $store_id,
                'sync_time' => time(),
                'sync_type' => 1,
                'sync_statu' => $sync_statu,
                'sync_note' => $sync_note,
            );
            $result = $this->CI->db->insert('store_syn_log', $logs);
            if ($result) {
                $in_id = $this->CI->db->insert_id();
                $data = array('state' => true, 'in_id' => $in_id, 'msg' => 'success');
            }
        }
        return $data;
    }
    
    public function get_msectime(){
        list($msec, $sec) = explode(' ', microtime());
    	$msectime =  (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    	return $msectime;
    }

    
    
}

?>