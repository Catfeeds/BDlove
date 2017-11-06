<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alimppay extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('pay_model');
        //print_r($_SESSION);die;
        //$aa = '[{"order_sn":"1904550169671141","stocks":[{"stocks_sn":"SSNXA001","goods_id":"26","size":"41","num":"26","true_price":"50.00","type":1},{"stocks_sn":"SSNXA001","goods_id":"26","size":"42","num":"26","true_price":"60.00","type":1},{"stocks_sn":"SSNXA002","goods_id":"26","size":"41","num":"26","true_price":"80.00","type":1},{"stocks_sn":"SSNXA001","goods_id":"26","size":"41","num":"26","true_price":"50.00","type":2},{"stocks_sn":"SSNXA002","goods_id":"26","size":"42","num":"26","true_price":"100.00","type":3}]},{"order_sn":"9901550169671142","stocks":[{"stocks_sn":"AABJL_3","goods_id":"4","size":"XX","num":"4","true_price":"56.00","type":1},{"stocks_sn":"AABJL_2","goods_id":"4","size":"XS","num":"4","true_price":"55.00","type":1}]}]';
        
    }
    /*---扫码收款--*/
    public function scan_pay(){
        //print_r($_SESSION);die;
       
       $store_id = !empty($_SESSION['shop_spg_store_id'])?$_SESSION['shop_spg_store_id']:'';
       if(empty($store_id)){
           echo '错误';die;
       }
       $this->pay_model->storeInfo();
       $store = explode(',',$store_id);
       $storeGuide = $this->db->select('spg_id,spg_name,spg_tel,spg_nike_name')->from('store_shopping_guide')
       ->where_in('spg_store_id',$store)->get()->result_array();
       $this->smarty->assign('storeGuide',$storeGuide);
	   $this->smarty->display('pay_scan.html');     
	}
    public function scan_pay1(){
       
       $store_id = !empty($_SESSION['shop_spg_store_id'])?$_SESSION['shop_spg_store_id']:'';
       if(empty($store_id)){
           echo '错误';die;
       }
       $this->pay_model->storeInfo();
       $store = explode(',',$store_id);
       $storeGuide = $this->db->select('spg_id,spg_name,spg_tel,spg_nike_name')->from('store_shopping_guide')
       ->where_in('spg_store_id',$store)->get()->result_array();
       $this->smarty->assign('storeGuide',$storeGuide);
	   $this->smarty->display('pay_scan1.html');     
	}
	/**/
	public function check_user(){
	    $user_name = isset($_POST['user_name'])?trim($_POST['user_name']):'';
	    $value = array('state'=>false,'msg'=>'此用户不存在');
	    if($user_name){
	        $user = $this->db->select('user_id,tel,wx_nickname,true_name,user_name,integral')->like('tel',$user_name,'both')
	        ->or_like('wx_nickname',$user_name,'both')
	        ->or_like('qq',$user_name,'both')
	        ->or_like('user_name',$user_name,'both')
	        ->or_like('true_name',$user_name,'both')->limit(20)->get('user')->result_array();
	        if($user){
	            foreach ($user as $k=>$v){
	                $order = $this->db->select('order_sn,created_time,order_status')
	                ->where('buyer_id',$v['user_id'])->where('order_status!=0')->order_by('created_time','DESC')->limit(1)
	                ->get('shop_order')->row_array();
	                if(!empty($order)){
	                    $order['date'] = date('Y-m-d H:i',$order['created_time']);
	                }
	                $order = empty($order)?'':$order;
	                $user[$k]['order'] = $order;  
	            }
	            $value = array('state'=>true,'user'=>$user);
	        }
	    }
	    //print_r($value);die;
	    echo json_encode($value);exit;
	    
	}
	/*查库存*/
	public function check_stock(){
	    $stock = isset($_POST['stock'])?trim($_POST['stock']):'';
	    $value = array('state'=>false,'msg'=>'未查到对应的商品');
	    if($stock){
	        $stocks = $this->db->select('goods_name,brand_name,goods_id,amount,store_id as ssa_store_id,stocks_sn,barcode,stocks_sku,price,stocks_bar_code,size,stocks_price')->from('v_store_brand_stock_amount')
	        ->where("(stocks_bar_code like '%{$stock}%' or stocks_sku like '%{$stock}%' or goods_name like '%{$stock}%') and store_id IN (".$_SESSION['shop_spg_store_id'].")")->get()->result_array();
	        if(!empty($stocks)){
	            $value = array('state'=>true,'msg'=>'','stock'=>$stocks);
	        }
	    }
	    //print_r($value);die;
	    echo json_encode($value);exit;
	    
	}
	/**/
	public function check_user_tel(){
	    $user_tel = isset($_POST['user_tel'])?trim($_POST['user_tel']):'';
	    $value = array('state'=>false,'msg'=>'此用户不存在');
	    if($user_tel){
	        $user = $this->db->select('user_id,tel,wx_nickname,true_name,user_name,integral,qq,user_addres')
	        ->where('tel',$user_tel)->get('user')->row_array();
	        if($user){
	            $user['user_name'] = empty($user['user_name'])?$user['tel']:$user['user_name'];
	            $value = array('state'=>true,'user'=>$user);
	        }
	    }
	    //print_r($value);die;
	    echo json_encode($value);exit;
	    
	}
	/*获取用户积分等级信息*/
	public function getUser(){
	    $userId = isset($_POST['userId'])?trim($_POST['userId']):'';
	    $value = array('state'=>false,'msg'=>'此用户不存在');
	    if($userId){
	        $info = $this->db->select('user_name,tel,user_id,integral_total,integral,balance,rechargeable_card_num')->from('user')
	        ->where('user_id',$userId)->get()->row_array();
	        if($info){
	            $info['integral_total'] = empty($info['integral_total'])?0:$info['integral_total'];
	            $info['mld_name'] = $this->db->select('mld_name')->where('mld_exp<='.$info['integral_total'])
	            ->order_by('mld_exp','DESC')->limit(1)->get('user_mldefault')->row('mld_name');
	            $value = array('state'=>true,'user'=>$info);
	        }
	        
	    }
	    echo json_encode($value);exit;
	}
    /*---扫码根据货号查货--*/
    public function check_goods(){
        //print_r($_SESSION);exit;
	   $stock_code = isset($_POST['stock_code'])?trim($_POST['stock_code']):'';
	   $size = isset($_POST['size'])?trim($_POST['size']):'';
	   $result = array('state'=>false,'data'=>'','msg'=>'操作错误');
	   if($stock_code&&$size){
	       $stocks = $this->db->select('s.goods_ea_id,g.goods_addtime,g.goods_name,s.ssa_store_id,s.stocks_sn,g.brand_name,s.stocks_bar_code,s.size,s.stocks_price,s.goods_id')->from('store_stocks_amount s')
	       ->join('shop_goods g','g.goods_id=s.goods_id')
	       ->where('stocks_sn',$stock_code)->where('size',$size)->where("ssa_store_id IN (".$_SESSION['shop_spg_store_id'].")")->get()->row_array();
	       //print_r($stocks);exit;
	       if(!empty($stocks)){
	           $result = array('state'=>true,'data'=>$stocks,'msg'=>'');
	           echo json_encode($result);exit;
	       }else{
	           $stocks = $this->db->select('g.goods_addtime,g.goods_name,g.brand_id,g.brand_name,se.stocks_sku as stocks_sn,se.size,se.stocks_price,se.stocks_bar_code,se.goods_id,se.goods_ea_id')->from('shop_goods_extend_attr se')
	           ->join('shop_goods g','g.goods_id=se.goods_id','left')
	           ->where('se.size',$size)->where('se.stocks_sku',$stock_code)
	           ->get()->row_array();
	           if($stocks){
	               $checkNum = $this->db->select('count(1) as num')->from('store_attr_brands')->where('brand_id',$stocks['brand_id'])
	               ->where("store_id IN ({$_SESSION['shop_spg_store_id']}) ")->get()->row('num');
	               if($checkNum){
	                   $result = array('state'=>true,'data'=>$stocks,'msg'=>'');
	                   echo json_encode($result);exit;
	               }
	           }
	           $result = array('state'=>false,'data'=>'','msg'=>'未查到相应的货，请检查货号或尺码是否正确');
	           echo json_encode($result);exit;
	       }
	   }
	   echo json_encode($result);exit;
	}
    /*---扫码根据条码查货--*/
    public function check_barcode(){
	   $barcode = isset($_POST['barcode'])?trim($_POST['barcode']):'';
	   $result = array('state'=>false,'data'=>'','msg'=>'');
	   if($barcode){
	       $stocks = $this->db->select('store_id as ssa_store_id,goods_id,brand_name,stocks_sn,barcode,stocks_sku,price,stocks_bar_code,size,stocks_price')->from('v_store_brand_stock_amount')
	       ->where("stocks_bar_code=".$barcode." and store_id IN (".$_SESSION['shop_spg_store_id'].")")->get()->row_array();
	       //print_r($stocks);die;
	       if(!empty($stocks)){
	           $stocks['stocks_price'] = empty($stocks['price'])?$stocks['stocks_price']:$stocks['price'];
	           $stocks['stocks_sn'] = $stocks['stocks_sku'];
	           $stocks['stocks_bar_code'] = empty($stocks['stocks_bar_code'])?$stocks['barcode']:$stocks['stocks_bar_code'];
	           $result = array('state'=>true,'data'=>$stocks,'msg'=>'');
	           echo json_encode($result);exit;
	       }else{
	           $result = array('state'=>false,'data'=>'','msg'=>'没有找到此条码的货品信息');
	           echo json_encode($result);exit;
	       }
	   }
	}
	
	public function pay(){
	    //print_r($_POST);die;
	    $guide = isset($_GET['guide'])?$_GET['guide']:'';
	    $goods = isset($_POST['put_goods_name'])?$_POST['put_goods_name']:'';
	    $user_id = isset($_POST['user_id'])?$_POST['user_id']:'';
	    $user['user_name'] = isset($_POST['userName'])?$_POST['userName']:'';
	    $user['tel'] = isset($_POST['userTel'])?$_POST['userTel']:'';
	    $user['qq'] = isset($_POST['userQQ'])?$_POST['userQQ']:'';
	    $user['user_addres'] = isset($_POST['userAddress'])?$_POST['userAddress']:'';
	    $payml = 0;
	    $paycash = !empty($_POST['paycash'])?$_POST['paycash']:0;
	    $paybank = !empty($_POST['paybank'])?$_POST['paybank']:0;
	    $paywx = !empty($_POST['paywx'])?$_POST['paywx']:0;
	    $payzfb = !empty($_POST['payzfb'])?$_POST['payzfb']:0;
	    $orderP['pd_amount'] = !empty($_POST['paybalance'])?$_POST['paybalance']:0;//余额支付
	    $orderP['counpon_amount'] = !empty($_POST['paycoupon'])?$_POST['paycoupon']:0;//卷抵用额
	    $orderP['coupon_id'] = !empty($_POST['coupon_id'])?$_POST['coupon_id']:0;//卷码
	    $orderP['coupon_price'] = !empty($_POST['coupon_price'])?$_POST['coupon_price']:0;//卷额
	    $orderP['paycard'] = !empty($_POST['paycard'])?$_POST['paycard']:0;//充值卡
	    $orderP['integral_amount'] = 0;//积分
	    $money = $paycash+$paybank+$paywx+$payzfb;
	    $total_total = $money+$orderP['pd_amount']+$orderP['counpon_amount']+$orderP['paycard']+$orderP['integral_amount'];
	    $note = '';
	    if(!empty($goods)){
	        $goods_arr = array();
	        foreach ($goods as $k=>$v){
	            if(!empty($v)){
	                foreach ($v as $ka=>$va){
	                    $goods_arr[$ka][$k] = $va;
	                }
	                 
	            }
	        }
	        if(empty($user_id)){
	            if(!empty($user['user_name'])||!empty($user['tel'])||!empty($user['qq'])){
	                $this->db->insert('user',$user);
	                $user_id = $this->db->insert_id();
	            }else{
	                $user_id = '';
	            }
	        }else{
	            $this->db->where('user_id',$user_id)->update('user',$user);
	        }
	        $buyer_id = empty($user_id)?'':$user_id;
	        $userInfo = array();
	        if($buyer_id){
	            $userInfo = $this->db->select('u.balance,u.user_name,u.tel,u.integral,u.integral_total,u.rechargeable_card_num,
	                u.ecshopping_guide_id,u.ecstore_id,u.ecgustore_id,u.order_num,u.order_money_num,s.store_name,sp.spg_name')
		                ->from('user u')
		                ->join('store s','s.store_id=u.ecstore_id','left')
		                ->join('store_shopping_guide sp','sp.spg_id=u.ecshopping_guide_id','left')
		                ->where('user_id',$buyer_id)->get()->row_array();
	        }
	        $num = 0;$amount = 0;$storeId=$_SESSION['shop_spg_store_id'];$time = time();
	        $spg_id  = empty($userInfo)?'':$userInfo['ecshopping_guide_id'];
	        $spg_name= empty($userInfo)?'':$userInfo['spg_name'];
	        $store_id  = empty($userInfo)?'':$userInfo['ecstore_id'];//用户绑定门店
	        $store_name= empty($userInfo)?'':$userInfo['store_name'];
	        $cashier_user = empty($_SESSION['shop_dpms_id'])?$_SESSION['shop_spg_store_id']:$_SESSION['shop_dpms_id'];
	        $cashier_store_name = empty($_SESSION['shop_dpms_id'])?$_SESSION['shop_store_name']:$_SESSION['shop_dpms_name'];
	        $order_type = 4;
	        //$orderStore['store_name'] = empty($_SESSION['shop_dpms_id'])?$_SESSION['shop_store_name']:$_SESSION['shop_dpms_name'];
	        $ship_type=2;
	        $goods_sku = array();$key = array();
	        foreach ($goods_arr as $k=>$v){
	            if($v['stock_code']&&$v['stock_size']&&$v['stock_num']&&$v['stock_true_price']&&$v['goods_id']){
	                $num +=$v['stock_num'];
	                $amount +=$v['stock_true_price']*$v['stock_num'];//商品实际总额
	                $sku = array(
	                    'stock_code'=>$v['stock_code'], 'stock_size'=>$v['stock_size'],
	                );
	                if(!in_array($sku, $goods_sku)){
	                    $goods_sku[] = $sku;
	                    $key[$v['stock_code']][$v['stock_size']] = $k;
	                    $v['stock_price_total'] = $v['stock_price']*$v['stock_num'];
	                }else{
	                    $goods_arr[$key[$v['stock_code']][$v['stock_size']]]['stock_num'] += $v['stock_num'];
	                    $goods_arr[$key[$v['stock_code']][$v['stock_size']]]['stock_price_total'] += $v['stock_true_price']*$v['stock_num'];
	                    unset($goods_arr[$k]);
	                }
	                 
	                 
	            }else{
	                unset($goods_arr[$k]);
	            }
	        }
	        $payMoneyAll = $amount-$payml-$orderP['counpon_amount']-$orderP['paycard']-$orderP['integral_amount'];//实际支付（含余额）
	        //$payMoneyRe = $amount-$payml-$orderP['counpon_amount'];//要返点，抽成金额
	        $payMoney = $amount-$payml-$orderP['pd_amount']-$orderP['counpon_amount']-$orderP['paycard']-$orderP['integral_amount'];//实际支付（不含余额）
	        //print_r($goods_arr);print_r($num);print_r($amount);exit;
	        $payIntegral = intval($payMoneyAll);
	        $goods_price = $amount;
	        $amount = sprintf("%.2f",$amount);
	        $payMoney = sprintf("%.2f",$payMoney);
	        $payMoneyAll = sprintf("%.2f",$payMoneyAll);
	        $returnPay = $total_total-$goods_price;
	        $paycash = $paycash-$returnPay;
	        $money = sprintf("%.2f",$money);
	        $goods_price = sprintf("%.2f",$goods_price);
	        //$order_sn = $this->common_function->produce_order_sn($store_id);
	        $order_goods_print = array();
	        $result = false;
	        $orderP['order_true_price'] = $payMoney;
	        $goods_arr_order = array();
	        foreach ($goods_arr as $k=>$v){
	            $goodsInfo = $this->db->select('store_id,goods_a_id,color,goods_name,goods_id,goods_image,gc_name,gc_id')->where('stocks_sku',$v['stock_code'])
	            ->where('size',$v['stock_size'])->where('goods_id',$v['goods_id'])->where(" store_id IN(".$_SESSION['shop_spg_store_id'].")")->get('v_store_brand_stock_amount')->row_array();
	            $goods_arr[$k]['store_id'] = $goodsInfo['store_id'];
	            $goods_arr[$k]['goods_a_id'] = $goodsInfo['goods_a_id'];
	            $goods_arr[$k]['color'] = $goodsInfo['color'];
	            $goods_arr[$k]['goods_name'] = $goodsInfo['goods_name'];
	            $goods_arr[$k]['goods_id'] = $goodsInfo['goods_id'];
	            $goods_arr[$k]['goods_image'] = $goodsInfo['goods_image'];
	            $goods_arr[$k]['gc_name'] = $goodsInfo['gc_name'];
	            $goods_arr[$k]['gc_id'] = $goodsInfo['gc_id'];
	        }
	        foreach ($goods_arr as $k=>$v){
	            $goods_arr_order[$v['store_id']][$k]=$v;
	        }
	        //print_r($goods_arr);
	        //print_r($goods_arr_order);
	        $ii = 0;$orderNumber = count($goods_arr_order);$orderHasCreate = 0;
	        $hasCoupon=0;$hasRecharge=0;$hasPdamount=0;$hasWx=0;$hasZfb=0;$hasCash=0;$hasBank=0;//卷订单均分
	        $pay_sn = $this->common_function->makePaySn($cashier_user);//收银单号
	        
	        $sqlOrder = array();//订单
	        $sqlGoods = array();//订单商品
	        $sqlOrderPay = array();//订单支付
	        $sqlOrderLog = array();//订单日志
	        $sqlStockAmountUp = array();//商品库存
	        $sqlStockAmountIn = array();//商品库存
	        //print_r($goods_arr_order);die;
	        foreach ($goods_arr_order as $ka=>$va){
	            $orderHasCreate++;
	            $order_goods = array();
	            $order_sn = $this->common_function->produce_order_sn($ka);
	            $num = 0;$order_goods_price=0;
	            $order_storeInfo = $this->db->select('order_take_percentage,store_name')->where('store_id',$ka)->get('store')->row_array();
                
	            $order_take_percentage = empty($order_storeInfo['order_take_percentage'])?0:unserialize($order_storeInfo['order_take_percentage'])['offline'];
	            
	            foreach ($va as $k=>$v){
	                $oldStockAmount = $this->db->select('ssa_id,amount')->where('stocks_sn',$v['stock_code'])->where('goods_id',$v['goods_id'])
	                ->where('size',$v['stock_size'])->where('ssa_store_id',$v['store_id'])->get('store_stocks_amount')->row_array();
	                if($oldStockAmount['ssa_id']){
	                    $oldStockAmount['amount'] = empty($oldStockAmount['amount'])?0:$oldStockAmount['amount']-$v['stock_num'];
	                    $sql_stock_arr = array(
	                        'ssa_id'=>$oldStockAmount['ssa_id'],'amount'=>$oldStockAmount['amount'],'update_time'=>$time,
	                        'update_user_name'=>$_SESSION['shop_spg_name'],'update_user_id'=>$_SESSION['shop_spg_id'],'update_user_type'=>2,
	                    );
	                    $sqlStockAmountUp[]=$sql_stock_arr;
	                }else{
	                    $sql_stock_arr = array(
	                        'stocks_sn'=>$v['stock_code'],'goods_id'=>$v['goods_id'],'size'=>$v['stock_size'],
	                        'ssa_store_id'=>$v['store_id'],'amount'=>0,'update_time'=>$time,
	                        'stocks_bar_code'=>$v['barcode'],'stocks_price'=>$v['stock_price'],
	                        'update_user_name'=>$_SESSION['shop_spg_name'],'update_user_id'=>$_SESSION['shop_spg_id'],'update_user_type'=>2,
	                    );
	                    $sqlStockAmountIn[]=$sql_stock_arr;
	                }
	                
	                $order_goods[$k]['order_sn']=$order_sn;
	                $order_goods[$k]['goods_id']=$v['goods_id'];
	                $order_goods[$k]['goods_name']=$v['goods_name'];
	                $order_goods[$k]['goods_image']=GOODIMAGE.$v['goods_image'];
	                $order_goods[$k]['goods_num']=$v['stock_num'];
	                $order_goods[$k]['goods_size']=$v['stock_size'];
	                $order_goods[$k]['goods_color']=$v['color'];
	                $order_goods[$k]['goods_a_id']=$v['goods_a_id'];
	                $order_goods[$k]['goods_price']=$v['stock_price'];
	                $order_goods[$k]['goods_pay_price']=$v['stock_true_price'];
	                $order_goods[$k]['user_id']=$buyer_id;
	                $order_goods[$k]['store_id']=$v['store_id'];
	                $num+=$v['stock_num'];
	                $order_goods_price+=$v['stock_true_price']*$v['stock_num'];
	                /* 	            $order_goods[$k]['activity_type']=$v['order_sn'];
	                 $order_goods[$k]['promotions_id']=$v['order_sn']; */
	                $order_goods[$k]['gc_id']=$v['gc_id'];
	                $order_goods[$k]['stock_code']=$v['stock_code'];
	                $order_goods[$k]['sotck_barcode']=$v['barcode'];
	                $order_goods_print[$ii]['color'] = $v['color'];
	                $order_goods_print[$ii]['gc_name'] = $v['gc_name'];
	                $order_goods_print[$ii]['goods_num'] = $v['stock_num'];
	                $order_goods_print[$ii]['goods_size'] = $v['stock_size'];
	                $order_goods_print[$ii]['goods_pay_price'] = $v['stock_true_price'];
	                $order_goods_print[$ii]['stock_code'] = $v['stock_code'];
	                $order_goods_print[$ii]['goods_pay_price_total'] = sprintf("%.2f",$v['stock_true_price']*$v['stock_num']);
	                $ii++;
	                $sqlGoods[] = $order_goods[$k];
	            }
	            if($orderHasCreate==$orderNumber){
	                $orderCoupon = $orderP['counpon_amount']-$hasCoupon;//订单抵用卷额
	                $orderRecharge = $orderP['paycard']-$hasRecharge;//订单充值卡额
	                $orderPdamount = $orderP['pd_amount']-$hasPdamount;//订单余额
	                $orderWx = $paywx-$hasWx;//订单微信
	                $orderZfb = $payzfb-$hasZfb;//订单支付宝
	                $orderCash = $paycash-$hasCash;//订单现金
	                $orderBank = $paybank-$hasBank;//订单银行卡
	            }else{
	                $orderCoupon = ($order_goods_price/$amount)*$orderP['counpon_amount'];//订单抵用卷额
	                $orderRecharge = ($order_goods_price/$amount)*$orderP['paycard'];//订单充值卡额
	                $orderPdamount = ($order_goods_price/$amount)*$orderP['pd_amount'];//订单余额
	                $orderWx = ($order_goods_price/$amount)*$paywx;//订单微信
	                $orderZfb = ($order_goods_price/$amount)*$payzfb;//订单支付宝
	                $orderCash = ($order_goods_price/$amount)*$paycash;//订单现金
	                $orderBank = ($order_goods_price/$amount)*$paybank;//订单银行卡
	                $hasCoupon +=$orderCoupon;
	                $hasRecharge +=$orderRecharge;
	                $hasPdamount +=$orderPdamount;
	                $hasWx +=$orderWx;
	                $hasZfb +=$orderZfb;
	                $hasCash +=$orderCash;
	                $hasBank +=$orderBank;
	            }
	            /* if($orderCoupon>0){
	                $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderCoupon,'mtcn_type'=>21,'api_pay_state'=>1,'pay_time'=>$time,);
	                $sqlOrderPay[] = $sqlPay;
	            }
	            if($orderRecharge>0){
	                $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderRecharge,'mtcn_type'=>22,'api_pay_state'=>1,'pay_time'=>$time,);
	                $sqlOrderPay[] = $sqlPay;
	            }
	            if($orderPdamount>0){
	                $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderPdamount,'mtcn_type'=>5,'api_pay_state'=>1,'pay_time'=>$time,);
	                $sqlOrderPay[] = $sqlPay;
	            }
	            if($orderWx>0){
	                $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderWx,'mtcn_type'=>3,'api_pay_state'=>1,'pay_time'=>$time,);
	                $sqlOrderPay[] = $sqlPay;
	            }
	            if($orderZfb>0){
	                $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderZfb,'mtcn_type'=>4,'api_pay_state'=>1,'pay_time'=>$time,);
	                $sqlOrderPay[] = $sqlPay;
	            }
	            if($orderCash>0){
	                $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderCash,'mtcn_type'=>1,'api_pay_state'=>1,'pay_time'=>$time,);
	                $sqlOrderPay[] = $sqlPay;
	            }
	            if($orderBank>0){
	                $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderBank,'mtcn_type'=>2,'api_pay_state'=>1,'pay_time'=>$time,);
	                $sqlOrderPay[] = $sqlPay;
	            } */
	            $rebate = $order_take_percentage;$rebate_amount = $order_goods_price-$orderCoupon;$order_pointscount = intval($rebate_amount);//返点数，返点额，赠送积分
	            $carrige = 0;//运费；
	            $orderPrice = $carrige+$order_goods_price;
	            //$store_name = $this->db->select('store_name')->where('store_id',$ka)->get('store')->row('store_name');
	            /* $sql_order = "insert into " . $this->db->dbprefix('shop_order') .
	            " (order_sn,pay_sn,order_type,cashier_user,pay_type,order_status,store_id,store_name,spg_id,spg_name,buyer_id,shipping_type,order_price,
	            goods_num,goods_price,rechargeable_card_num,pd_amount,counpon_amount,integral_amount,coupon_id,coupon_price,
	            rebate,rebate_amount,evaluation_state,order_pointscount,pay_time,created_time,
	            buyer_memo)
	            values('{$order_sn}','{$pay_sn}',$order_type,$cashier_user,2,40,'{$store_id}','{$store_name}','{$spg_id}','{$spg_name}',
	            '{$buyer_id}','{$ship_type}',
	            '{$orderPrice}','{$num}','{$order_goods_price}','{$orderRecharge}','{$orderPdamount}','{$orderCoupon}','{$orderP['integral_amount']}',
	            '{$orderP['coupon_id']}','{$orderP['coupon_price']}','{$rebate}','{$rebate_amount}',0,'{$order_pointscount}',$time,$time,'{$note}')"; */
	            $sql_order = array(
	                'order_sn'=>$order_sn,'pay_sn'=>$pay_sn,'order_type'=>$order_type,
	                'order_from'=>2,'cashier_user'=>$cashier_user,'pay_type'=>2,
	                'order_status'=>40,'store_id'=>$ka,'store_name'=>$order_storeInfo['store_name'],'spg_id'=>$spg_id,
	                'spg_name'=>$spg_name,'buyer_id'=>$buyer_id,'shipping_type'=>$ship_type,'order_price'=>$orderPrice,
	                'goods_num'=>$num,'goods_price'=>$order_goods_price,'rechargeable_card_num'=>$orderRecharge,'pd_amount'=>$orderPdamount,
	                'counpon_amount'=>$orderCoupon,'integral_amount'=>$orderP['integral_amount'],'coupon_id'=>$orderP['coupon_id'],'coupon_price'=>$orderP['coupon_price'],
	                'rebate'=>$rebate,'rebate_amount'=>$rebate_amount,'evaluation_state'=>0,'order_pointscount'=>$order_pointscount,
	                'pay_time'=>$time,'created_time'=>$time,'buyer_memo'=>$note,
	            );
	            $sqlOrder[]=$sql_order;
	            $sql_log = array();
	            $sql_log['order_sn'] = $order_sn;
	            $sql_log['log_msg'] = '订单门店收银下单并支付';
	            $sql_log['log_time'] = $time;
	            $sql_log['log_role'] = '用户';
	            $sql_log['log_user'] = $buyer_id;
	            $sql_log['log_orderstate'] = 40;
	            $sqlOrderLog[] = $sql_log;
	        }
	        $payLogNote = '';
	        if($orderP['counpon_amount']>0){
	            $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderP['counpon_amount'],'mtcn_type'=>21,'api_pay_state'=>1,'pay_time'=>$time,);
	            $sqlOrderPay[] = $sqlPay;
	            
	        }
	        if($orderP['paycard']>0){
	            $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderP['paycard'],'mtcn_type'=>22,'api_pay_state'=>1,'pay_time'=>$time,);
	            $sqlOrderPay[] = $sqlPay;
	        }
	        if($orderP['pd_amount']>0){
	            $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderP['pd_amount'],'mtcn_type'=>5,'api_pay_state'=>1,'pay_time'=>$time,);
	            $sqlOrderPay[] = $sqlPay;
	        }
	        if($paywx>0){
	            $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$paywx,'mtcn_type'=>3,'api_pay_state'=>1,'pay_time'=>$time,);
	            $sqlOrderPay[] = $sqlPay;
	        }
	        if($payzfb>0){
	            $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$payzfb,'mtcn_type'=>4,'api_pay_state'=>1,'pay_time'=>$time,);
	            $sqlOrderPay[] = $sqlPay;
	        }
	        
	        if($paycash!=0){
	            $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$paycash,'mtcn_type'=>1,'api_pay_state'=>1,'pay_time'=>$time,);
	            $sqlOrderPay[] = $sqlPay;
	        }
	        if($paybank>0){
	            $sqlPay = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$paybank,'mtcn_type'=>2,'api_pay_state'=>1,'pay_time'=>$time,);
	            $sqlOrderPay[] = $sqlPay;
	        }
	        //print_r($sqlStockAmountUp);die;
	        if($buyer_id){
	            $sql_user = " update ".$this->db->dbprefix('user')." set balance=balance-'{$orderP['pd_amount']}',
	            integral=integral+'{$payIntegral}',integral_total=integral_total+'{$payIntegral}',
	            rechargeable_card_num=rechargeable_card_num-'{$orderP['paycard']}',order_num=order_num+'{$orderNumber}',
	            order_money_num=order_money_num+'{$payMoneyAll}' where user_id='{$buyer_id}'";
	            if($orderP['pd_amount']>0){
	                //用户资金日志
	                $payBalance =$orderP['pd_amount'];
	                $add_user_log_sql ="insert into ".$this->db->dbprefix('user_asset_log')."
	                (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	                values({$buyer_id},'{$pay_sn}',3,{$payBalance},0,
	                (select balance from ".$this->db->dbprefix('user').
	                " u where u.user_id={$buyer_id}),'通过订单支付单号{$pay_sn}支付{$payBalance}',{$time})"; //增加用户资金金额日志
	                $add_plat_log_sql ="insert into ".$this->db->dbprefix('sys_asset_account')."
	                (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	                values({$buyer_id},'{$pay_sn}',3,0,{$payBalance},
	                (select (asset+{$payBalance}) from ".$this->db->dbprefix('sys_asset_account')." p order by p.paa_id DESC limit 0,1),
	                '通过订单支付单号{$pay_sn}收入{$payBalance}',{$time})"; //增加平台资金金额日志
	            }
	            
	        }
	        //print_r($sql_user);print_r($add_user_log_sql);print_r($add_plat_log_sql);print_r($sqlOrderLog);print_r($sqlOrder);print_r($sqlOrderPay);print_r($sqlGoods);die;
	        $this->db->trans_begin();
	        if(isset($sql_user)){
	            $this->db->query($sql_user);
	        }
	        if(isset($add_user_log_sql)){
	            $this->db->query($add_user_log_sql);
	        }
	        if(isset($add_plat_log_sql)){
	            $this->db->query($add_plat_log_sql);
	        }
	        $this->db->insert_batch('shop_order_log',$sqlOrderLog);//订单日志
	        $this->db->insert_batch('shop_order_pay',$sqlOrderPay);//订单支付记录
	        $this->db->insert_batch('shop_order',$sqlOrder);//订单
	        $this->db->insert_batch('shop_order_goods',$sqlGoods);//订单商品
	        if(!empty($sqlStockAmountUp)){
	            $this->db->update_batch('store_stocks_amount',$sqlStockAmountUp,'ssa_id');//订单商品库存
	            //print_r($this->db->last_query());die;
	        }
	        if(!empty($sqlStockAmountIn)){
	            $this->db->insert_batch('store_stocks_amount',$sqlStockAmountIn);//订单商品库存
	        }
	        
	        if ($this->db->trans_status())
	        {
	            $this->db->trans_commit();

	            $order_info = array(
	                'store_name' =>$cashier_store_name,'time'=>date('Y-m-d H:i:s'),'spg_name'=>$_SESSION['shop_spg_name'],
	                'order_sn' =>$pay_sn,'money'=>sprintf("%.2f",$money),'order_money'=>$goods_price,'goods_info'=>$order_goods_print,
	                'banlance' =>$orderP['pd_amount'],'coupon'=>$orderP['counpon_amount'],'card'=>$orderP['paycard'],
	                'charge' =>sprintf("%.2f",$total_total-$goods_price),'tel' =>$_SESSION['shop_spg_tel'],'address' =>$_SESSION['address'],
	                'note'=>$note,
	            );
	            //print_r($order_info);die;
	            $result = array('state'=>true,'msg'=>'数据提交成功','data'=>$order_info);
	            unset($_POST);
	        }
	        else
	        {
	            $this->db->trans_rollback();
	            $result = array('state'=>false,'msg'=>'数据提交失败');
	        }
	        //print_r($goods_arr_order);exit;

	
	    }else{
	        $result = array('state'=>false,'msg'=>'操作错误');
	    }
	    echo json_encode($result);exit;
	    //print_r($_GET);print_r($_POST);exit;
	}
	//不拆单的订单生成（不用）
	public function pay1(){
	    //print_r($_POST);die;
	    $guide = isset($_GET['guide'])?$_GET['guide']:'';
	    $goods = isset($_POST['put_goods_name'])?$_POST['put_goods_name']:'';
	    $user_id = isset($_POST['user_id'])?$_POST['user_id']:'';
	    $user['user_name'] = isset($_POST['userName'])?$_POST['userName']:'';
	    $user['tel'] = isset($_POST['userTel'])?$_POST['userTel']:'';
	    $user['qq'] = isset($_POST['userQQ'])?$_POST['userQQ']:'';
	    $user['user_addres'] = isset($_POST['userAddress'])?$_POST['userAddress']:'';
        $payml = !empty($_POST['payml'])?$_POST['payml']:0;
        $paycash = !empty($_POST['paycash'])?$_POST['paycash']:0;
        $paybank = !empty($_POST['paybank'])?$_POST['paybank']:0;
        $paywx = !empty($_POST['paywx'])?$_POST['paywx']:0;
        $payzfb = !empty($_POST['payzfb'])?$_POST['payzfb']:0;
        $orderP['pd_amount'] = !empty($_POST['paybalance'])?$_POST['paybalance']:0;
        $orderP['counpon_amount'] = !empty($_POST['paycoupon'])?$_POST['paycoupon']:0;
        $orderP['paycard'] = !empty($_POST['paycard'])?$_POST['paycard']:0;
        $orderP['integral_amount'] = 0;
        $money = $paycash+$paybank+$paywx+$payzfb;
        $money = sprintf("%.2f",$money);
        $note = '';
	    if(!empty($goods)){
	        $goods_arr = array();
	        foreach ($goods as $k=>$v){
	            if(!empty($v)){
	                foreach ($v as $ka=>$va){
	                    $goods_arr[$ka][$k] = $va;
	                }
	                
	            }
	        }
	        if(empty($user_id)){
	            if(!empty($user['user_name'])||!empty($user['tel'])||!empty($user['qq'])){
	                $this->db->insert('user',$user);
	                $user_id = $this->db->insert_id();
	            }else{
	                $user_id = '';
	            }
	        }else{
	            $this->db->where('user_id',$user_id)->update('user',$user);
	        }
	        $buyer_id = empty($user_id)?'':$user_id;
	        $userInfo = array();
	        if($buyer_id){
	            $userInfo = $this->db->select('u.balance,u.user_name,u.tel,u.integral,u.integral_total,u.rechargeable_card_num,
	                u.ecshopping_guide_id,u.ecstore_id,u.ecgustore_id,u.order_num,u.order_money_num,s.store_name,sp.spg_name')
	            ->from('user u')
	            ->join('store s','s.store_id=u.ecstore_id','left')
	            ->join('store_shopping_guide sp','sp.spg_id=u.ecshopping_guide_id','left')
	            ->where('user_id',$buyer_id)->get()->row_array();
	        }
	        $num = 0;$amount = 0;$storeId=$_SESSION['shop_spg_store_id'];$time = time();
	        $spg_id  = empty($userInfo)?'':$userInfo['ecshopping_guide_id'];
	        $spg_name= empty($userInfo)?'':$userInfo['spg_name'];
	        $store_id  = empty($userInfo)?'':$userInfo['ecstore_id'];//用户绑定门店
	        $store_name= empty($userInfo)?'':$userInfo['store_name'];
	        $cashier_user = empty($_SESSION['shop_dpms_id'])?$_SESSION['shop_spg_store_id']:$_SESSION['shop_dpms_id'];
	        $cashier_store_name = empty($_SESSION['shop_dpms_id'])?$_SESSION['shop_store_name']:$_SESSION['shop_dpms_name'];
	        $order_type = 4;
	        //$orderStore['store_name'] = empty($_SESSION['shop_dpms_id'])?$_SESSION['shop_store_name']:$_SESSION['shop_dpms_name'];
	        $ship_type=2;
	        $goods_sku = array();$key = array();
	        foreach ($goods_arr as $k=>$v){
	            if($v['stock_code']&&$v['stock_size']&&$v['stock_num']&&$v['stock_true_price']){
	                $num +=$v['stock_num'];
	                $amount +=$v['stock_true_price']*$v['stock_num'];
	                $sku = array(
	                    'stock_code'=>$v['stock_code'], 'stock_size'=>$v['stock_size'], 
	                );
	                if(!in_array($sku, $goods_sku)){
	                    $goods_sku[] = $sku;
	                    $key[$v['stock_code']][$v['stock_size']] = $k;
	                    $v['stock_price_total'] = $v['stock_price']*$v['stock_num'];
	                }else{
	                    $goods_arr[$key[$v['stock_code']][$v['stock_size']]]['stock_num'] += $v['stock_num'];
	                    $goods_arr[$key[$v['stock_code']][$v['stock_size']]]['stock_price_total'] += $v['stock_true_price']*$v['stock_num'];
	                    unset($goods_arr[$k]);
	                }
	                
	                
	            }else{
	                unset($goods_arr[$k]);
	            }
	        }
	        $payMoneyAll = $amount-$payml-$orderP['counpon_amount']-$orderP['paycard']-$orderP['integral_amount'];//实际支付（含余额）
	        $payMoney = $amount-$payml-$orderP['pd_amount']-$orderP['counpon_amount']-$orderP['paycard']-$orderP['integral_amount'];//实际支付（不含余额）
	        $payIntegral = intval($payMoneyAll);
	        //print_r($goods_arr);print_r($num);print_r($amount);exit;
	        $amount = sprintf("%.2f",$amount);$goods_price = $amount;
	        $payMoney = sprintf("%.2f",$payMoney);
	        $payMoneyAll = sprintf("%.2f",$payMoneyAll);
	        $rebate = '';$rebate_amount = '';$order_pointscount = '';//返点数，返点额，赠送积分
	        //$order_sn = $this->common_function->produce_order_sn($store_id);
	        $order_goods_print = array();
	        $result = false;
	        $orderP['order_true_price'] = $payMoneyAll;
	        $goods_arr_order = array();
	        foreach ($goods_arr as $k=>$v){
	            $goodsInfo = $this->db->select('store_id,goods_a_id,color,goods_name,goods_id,goods_image,gc_name,gc_id')->where('stocks_sku',$v['stock_code'])
	            ->where('size',$v['stock_size'])->where(" store_id IN(".$_SESSION['shop_spg_store_id'].")")->get('v_store_brand_stock_amount')->row_array();
	            $goods_arr[$k]['store_id'] = $goodsInfo['store_id'];
	            $goods_arr[$k]['goods_a_id'] = $goodsInfo['goods_a_id'];
	            $goods_arr[$k]['color'] = $goodsInfo['color'];
	            $goods_arr[$k]['goods_name'] = $goodsInfo['goods_name'];
	            $goods_arr[$k]['goods_id'] = $goodsInfo['goods_id'];
	            $goods_arr[$k]['goods_image'] = $goodsInfo['goods_image'];
	            $goods_arr[$k]['gc_name'] = $goodsInfo['gc_name'];
	            $goods_arr[$k]['gc_id'] = $goodsInfo['gc_id'];
	        }
	        $order_sn = $this->common_function->produce_order_sn($cashier_user);
	        $pay_sn = $this->common_function->makePaySn($cashier_user);
	        //抽成
	        if($buyer_id){
	            //$order_take_percentage = $this->db->select('order_take_percentage')->where('store_id',$storeId)->get('store')->row('order_take_percentage');
	        }
	        $order_take_percentage = empty($order_take_percentage)?0:$order_take_percentage;
	        $ii = 0;$num=0;$order_goods_price=0;
	        $this->db->trans_begin();
	        foreach ($goods_arr as $k=>$v){
	            $order_goods[$k]['order_sn']=$order_sn;
	            $order_goods[$k]['goods_id']=$v['goods_id'];
	            $order_goods[$k]['goods_name']=$v['goods_name'];
	            $order_goods[$k]['goods_image']=GOODIMAGE.$v['goods_image'];
	            $order_goods[$k]['goods_num']=$v['stock_num'];
	            $order_goods[$k]['goods_size']=$v['stock_size'];
	            $order_goods[$k]['goods_color']=$v['color'];
	            $order_goods[$k]['goods_a_id']=$v['goods_a_id'];
	            $order_goods[$k]['goods_price']=$v['stock_price'];
	            $order_goods[$k]['goods_pay_price']=$v['stock_true_price'];
	            $order_goods[$k]['user_id']=$buyer_id;
	            $order_goods[$k]['store_id']=$v['store_id'];
	            $num+=$v['stock_num'];
	            $order_goods_price+=$v['stock_true_price']*$v['stock_num'];
	            /* 	            $order_goods[$k]['activity_type']=$v['order_sn'];
	             $order_goods[$k]['promotions_id']=$v['order_sn']; */
	            $order_goods[$k]['gc_id']=$v['gc_id'];
	            $order_goods[$k]['stock_code']=$v['stock_code'];
	            $order_goods[$k]['sotck_barcode']=$v['barcode'];
	            $order_goods_print[$ii]['color'] = $v['color'];
	            $order_goods_print[$ii]['gc_name'] = $v['gc_name'];
	            $order_goods_print[$ii]['goods_num'] = $v['stock_num'];
	            $order_goods_print[$ii]['goods_size'] = $v['stock_size'];
	            $order_goods_print[$ii]['goods_pay_price'] = $v['stock_true_price'];
	            $order_goods_print[$ii]['stock_code'] = $v['stock_code'];
	            $order_goods_print[$ii]['goods_pay_price_total'] = sprintf("%.2f",$v['stock_true_price']*$v['stock_num']);
	            $ii++;
	            
	            $goods_arr_order[$v['store_id']][$k]=$v;
	        }
	        $rebate =$order_goods_price;
	        $rebate_amount =$order_goods_price*$order_take_percentage;
	        //$store_name = $this->db->select('store_name')->where('store_id',$ka)->get('store')->row('store_name');
	        $sql_order = "insert into " . $this->db->dbprefix('shop_order') .
	        " (order_sn,pay_sn,order_type,cashier_user,pay_type,order_status,store_id,store_name,spg_id,spg_name,buyer_id,shipping_type,order_price,
	        goods_num,goods_price,rechargeable_card_num,pd_amount,counpon_amount,integral_amount,
	        rebate,rebate_amount,evaluation_state,order_pointscount,pay_time,created_time,
	        buyer_memo)
	        values('{$order_sn}','{$pay_sn}',$order_type,$cashier_user,2,40,'{$store_id}','{$store_name}','{$spg_id}','{$spg_name}','{$buyer_id}','{$ship_type}',
	        '{$order_goods_price}','{$num}','{$order_goods_price}','{$orderP['paycard']}','{$orderP['pd_amount']}','{$orderP['counpon_amount']}','{$orderP['integral_amount']}',
	        '{$rebate}','{$rebate_amount}',0,'{$order_pointscount}',$time,$time,'{$note}')";
	        if($buyer_id){
	            $sql_user = " update ".$this->db->dbprefix('user')." set balance=balance-'{$orderP['pd_amount']}',
	            integral=integral+'{$payIntegral}',integral_total=integral_total+'{$payIntegral}',
	            rechargeable_card_num=rechargeable_card_num-'{$orderP['paycard']}',order_num=order_num+1,
	            order_money_num=order_money_num+'{$payMoneyAll}' where user_id='{$buyer_id}'";
	            
	            if($orderP['pd_amount']>0){
	                //用户资金日志
	                $payBalance =$orderP['pd_amount']; 
	                $add_user_log_sql ="insert into ".$this->db->dbprefix('user_asset_log')."
	                (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	                values({$buyer_id},'{$pay_sn}',3,{$payBalance},0,
	                (select balance from ".$this->db->dbprefix('user').
	                " u where u.user_id={$buyer_id}),'通过订单支付单号{$order_sn}支付{$payBalance}',{$time})"; //增加用户资金金额日志
	                $add_plat_log_sql ="insert into ".$this->db->dbprefix('sys_asset_account')."
	                (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	                values({$buyer_id},'{$order_sn}',3,0,{$payBalance},
	                (select (asset+{$payBalance}) from ".$this->db->dbprefix('sys_asset_account')." p order by p.paa_id DESC limit 0,1),
	                '通过订单支付单号{$order_sn}收入{$payBalance}',{$time})"; //增加平台资金金额日志
	                /*资金日志*/
	                $this->db->query($add_user_log_sql);
	                $this->db->query($add_plat_log_sql);
	            }
	            $this->db->query($sql_user);
	        }
	        $orderLog = array();
	        $orderLog['order_sn'] = $order_sn;
	        $orderLog['log_msg'] = '订单门店收银下单并支付';
	        $orderLog['log_time'] = $time;
	        $orderLog['log_role'] = '用户';
	        $orderLog['log_user'] = $buyer_id;
	        $orderLog['log_orderstate'] = 40;
	        $payLog = array('pay_sn'=>$pay_sn,'buyer_id'=>$buyer_id,'api_pay_state'=>1,'pay_time'=>$time);
	        $this->db->insert('shop_order_pay',$payLog);//支付日志
	        $this->db->insert('shop_order_log',$orderLog);//订单日志
	        $this->db->query($sql_order);//生成订单
	        $this->db->insert_batch('shop_order_goods',$order_goods);//生成订单商品
	        
	        //print_r($goods_arr);
	        //print_r($goods_arr_order);
	        /*$ii = 0;
	        $this->db->trans_begin();
	        
	         $orderAllOrder = array();
	        foreach ($goods_arr_order as $ka=>$va){
	            $order_goods = array();
	            $order_sn = $this->common_function->produce_order_sn($ka);
	            $orderAllOrder[] = $order_sn;
	            $num = 0;$order_goods_price=0;
	            if($buyer_id){
	                $order_take_percentage = $this->db->select('order_take_percentage')->where('store_id',$ka)->get('store')->row('order_take_percentage');
	            }
	            $order_take_percentage = empty($order_take_percentage)?0:$order_take_percentage;
	            foreach ($va as $k=>$v){
	                $order_goods[$k]['order_sn']=$order_sn;
	                $order_goods[$k]['goods_id']=$v['goods_id'];
	                $order_goods[$k]['goods_name']=$v['goods_name'];
	                $order_goods[$k]['goods_image']=GOODIMAGE.$v['goods_image'];
	                $order_goods[$k]['goods_num']=$v['stock_num'];
	                $order_goods[$k]['goods_size']=$v['stock_size'];
	                $order_goods[$k]['goods_color']=$v['color'];
	                $order_goods[$k]['goods_a_id']=$v['goods_a_id'];
	                $order_goods[$k]['goods_price']=$v['stock_price'];
	                $order_goods[$k]['goods_pay_price']=$v['stock_true_price'];
	                $order_goods[$k]['user_id']=$buyer_id;
	                $order_goods[$k]['store_id']=$v['store_id'];
	                $num+=$v['stock_num'];
	                $order_goods_price+=$v['stock_price']*$v['stock_num'];
	                //	            $order_goods[$k]['activity_type']=$v['order_sn'];
	                 //$order_goods[$k]['promotions_id']=$v['order_sn']; 
	                $order_goods[$k]['gc_id']=$v['gc_id'];
	                $order_goods[$k]['stock_code']=$v['stock_code'];
	                $order_goods[$k]['sotck_barcode']=$v['barcode'];
	                $order_goods_print[$ii]['color'] = $v['color'];
	                $order_goods_print[$ii]['gc_name'] = $v['gc_name'];
	                $order_goods_print[$ii]['goods_num'] = $v['stock_num'];
	                $order_goods_print[$ii]['goods_size'] = $v['stock_size'];
	                $order_goods_print[$ii]['goods_pay_price'] = $v['stock_true_price'];
	                $order_goods_print[$ii]['stock_code'] = $v['stock_code'];
	                $order_goods_print[$ii]['goods_pay_price_total'] = sprintf("%.2f",$v['stock_true_price']*$v['stock_num']);
	                $ii++;
	            }
	            //print_r($order_goods_print);die;
	            $rebate =$order_goods_price;
	            $rebate_amount =$order_goods_price*$order_take_percentage;
	            //$store_name = $this->db->select('store_name')->where('store_id',$ka)->get('store')->row('store_name');
	            $sql_order = "insert into " . $this->db->dbprefix('shop_order') .
	            " (order_sn,order_type,cashier_user,pay_type,order_status,store_id,store_name,spg_id,spg_name,buyer_id,shipping_type,order_price,
	            goods_num,goods_price,rechargeable_card_num,pd_amount,counpon_amount,integral_amount,
	            rebate,rebate_amount,evaluation_state,order_pointscount,pay_time,created_time,
	            buyer_memo)
	            values('{$order_sn}',$order_type,$cashier_user,2,40,'{$store_id}','{$store_name}','{$spg_id}','{$spg_name}','{$buyer_id}','{$ship_type}',
	            '{$order_goods_price}','{$num}','{$order_goods_price}','{$orderP['paycard']}','{$orderP['pd_amount']}','{$orderP['counpon_amount']}','{$orderP['integral_amount']}',
	            '{$rebate}','{$rebate_amount}',0,'{$order_pointscount}',$time,$time,'{$note}')";
	            
	            $this->db->query($sql_order);
	            $this->db->insert_batch('shop_order_goods',$order_goods);
	        } */
	        if ($this->db->trans_status())
	        {
	            $this->db->trans_commit();
	            
	            /*打印小票*/
	            $address = $this->db->select('ous_address')->where('store_id',$store_id)->get('store')->row('ous_address');
	            
	            $order_info = array(
	                'store_name' =>$cashier_store_name,'time'=>date('Y-m-d H:i:s'),'spg_name'=>$_SESSION['shop_spg_name'],
	                'order_sn' =>$order_sn,'money'=>sprintf("%.2f",$money),'order_money'=>$goods_price,'goods_info'=>$order_goods_print,
	                'charge' =>sprintf("%.2f",$money-$payMoney),'tel' =>$_SESSION['shop_spg_tel'],'address' =>$address,
	                'note'=>$note,
	            );
	            $result = array('state'=>true,'msg'=>'数据提交成功','data'=>$order_info);
	            unset($_POST);
	        }
	        else
	        {
	            $this->db->trans_rollback();
	            $result = array('state'=>false,'msg'=>'数据提交失败');
	        }
	        //print_r($goods_arr_order);exit;
	        /* foreach ($goods_arr as $k=>$v){
	            $goods_info = $this->db->select('g.goods_name,g.gc_id,sc.gc_name,g.goods_id,g.goods_image,ge.color')->from('shop_goods as g')
	            ->join('shop_goods_extend as ge','ge.goods_id=g.goods_id')
	            ->join('shop_goods_class as sc','sc.gc_id=g.gc_id','left')
	            ->where('ge.stocks_sku',$v['stock_code'])->get()->row_array();
	            $stocks_price = $this->db->select('stocks_price')->from('store_stocks_amount')
	            ->where('size',$v['stock_size'])
	            ->where('ssa_store_id',$store_id)
	            ->where('stocks_sn',$v['stock_code'])->get()->row('stocks_price');
	            $goods_info['goods_price'] = $stocks_price;
	            $order_goods[$k]['order_sn']=$order_sn;
	            $order_goods[$k]['goods_id']=$goods_info['goods_id'];
	            $order_goods[$k]['goods_name']=$goods_info['goods_name'];
	            $order_goods[$k]['goods_image']=$goods_info['goods_image'];
	            $order_goods[$k]['goods_num']=$v['stock_num'];
	            $order_goods[$k]['goods_size']=$v['stock_size'];
	            $order_goods[$k]['goods_price']=$goods_info['goods_price'];
	            $order_goods[$k]['goods_pay_price']=$v['stock_price'];
	            $order_goods[$k]['user_id']=$buyer_id;
	            $order_goods[$k]['store_id']=$store_id;
/* 	            $order_goods[$k]['activity_type']=$v['order_sn'];
	            $order_goods[$k]['promotions_id']=$v['order_sn']; */
	            /*$order_goods[$k]['gc_id']=$goods_info['gc_id'];
	            $order_goods[$k]['stock_code']=$v['stock_code'];
	            $order_goods[$k]['sotck_barcode']=$v['barcode'];
	            $order_goods_print[$k]['color'] = $goods_info['color'];
	            $order_goods_print[$k]['gc_name'] = $goods_info['gc_name'];
	            $order_goods_print[$k]['goods_num'] = $v['stock_num'];
	            $order_goods_print[$k]['goods_size'] = $v['stock_size'];
	            $order_goods_print[$k]['goods_pay_price'] = $v['stock_price'];
	            $order_goods_print[$k]['stock_code'] = $v['stock_code'];
	            $order_goods_print[$k]['goods_pay_price_total'] = sprintf("%.2f",$v['stock_price']*$v['stock_num']);
	        }
	        
	        $sql_order = "insert into " . $this->db->dbprefix('shop_order') .
	        " (order_sn,order_type,pay_type,order_status,store_id,store_name,spg_id,spg_name,buyer_id,shipping_type,order_price,
	        goods_num,goods_price,rebate,rebate_amount,evaluation_state,order_pointscount,pay_time,created_time,end_time,
	        buyer_memo) 
	        values('{$order_sn}',3,2,10,$store_id,'{$store_name}','{$spg_id}','{$spg_name}','{$buyer_id}','{$ship_type}',
	        '{$goods_price}','{$num}','{$goods_price}','{$rebate}','{$rebate_amount}',0,'{$order_pointscount}',$time,$time,$time,'{$note}')";
	        $this->db->trans_begin();
	        $this->db->query($sql_order);
	        $this->db->insert_batch('shop_order_goods',$order_goods);
	        if ($this->db->trans_status())
	        {
	            $this->db->trans_commit();
	            $address = $this->db->select('ous_address')->where('store_id',$store_id)->get('store')->row('ous_address');
	            $order_info = array(
	                'store_name' =>$store_name,'time'=>date('Y-m-d H:i:s'),'spg_name'=>$_SESSION['shop_spg_name'],
	                'order_sn' =>$order_sn,'money'=>sprintf("%.2f",$money),'order_money'=>$goods_price,'goods_info'=>$order_goods_print,
	                'charge' =>sprintf("%.2f",$money-$goods_price),'tel' =>$_SESSION['shop_spg_tel'],'address' =>$address,
	                'note'=>$note,
	            );
	            $result = array('state'=>true,'msg'=>'数据提交成功','data'=>$order_info);
	            unset($_POST);
	        }
	        else
	        {
                $this->db->trans_rollback();
                $result = array('state'=>false,'msg'=>'数据提交失败');
	        } */

	    }else{
	        $result = array('state'=>false,'msg'=>'操作错误');
	    }
	    echo json_encode($result);exit;
	     //print_r($_GET);print_r($_POST);exit;
	}
	 /*---扫码退款--*/
	public function scan_refund(){
	   $this->pay_model->storeInfo();
	   $this->smarty->display('pay_scan_refund.html');     
	}
	 /*---退款--*/
	public function pay_refund(){
	   $this->pay_model->storeInfo();
	   $store_id = !empty($_SESSION['shop_spg_store_id'])?$_SESSION['shop_spg_store_id']:'';
	   if(empty($store_id)){
	       echo '错误';die;
	   }
	   $store = explode(',',$store_id);
	   $storeGuide = $this->db->select('spg_id,spg_name,spg_tel,spg_nike_name')->from('store_shopping_guide')
	   ->where_in('spg_store_id',$store)->get()->result_array();
	   $this->smarty->assign('storeGuide',$storeGuide);
	   $this->smarty->display('pay_refund.html');     
	}
	public function check_pay(){
	    $paySn = isset($_POST['paySn'])?trim($_POST['paySn']):'';
	    $value = array('state'=>false,'msg'=>'未找到符合条件的订单');
	    if($paySn){
	        $order = $this->db->select('o.order_sn,o.created_time,o.pay_sn,o.order_status,o.buyer_id,o.order_price,o.goods_price,o.goods_num as order_num,
	            o.rechargeable_card_num,o.pd_amount,o.counpon_amount,o.integral_amount,u.user_name,u.tel')
	        ->from('shop_order o')
	        ->join('user u','u.user_id=o.buyer_id','left')
	        ->where('o.pay_sn',$paySn)->where_not_in('o.order_status',array(0,10))
	        ->get()->result_array();
	        $orderStock = array();$buyer = array();
	        if(!empty($order)){
	            $payO = isset($order[0])?$order[0]:'';
	            $payLog = $this->db->select('pay_num,mtcn_type')->from('shop_order_pay')->where('pay_sn',$paySn)->get()->result_array();
	            $payRefund = array();$paymoney = 0;$coupon = 0;$card = 0;
	            foreach ($payLog as $v){
	                $paymoney+=$v['pay_num'];
	                $payRefund[$v['mtcn_type']] = $v['pay_num'];
	                if($v['pay_num']>0&&($v['mtcn_type']==21||$v['mtcn_type']==22)){
	                    if($v['mtcn_type']==21){
	                        $coupon = $v['pay_num'];
	                    }
	                    if($v['mtcn_type']==22){
	                        $card = $v['pay_num'];
	                    }
	                }
	            }
                
	            $buyer = array(
	                'order_status'=>isset($payO['order_status'])?$payO['order_status']:'',
	                'buyer_id'=>isset($payO['buyer_id'])?$payO['buyer_id']:'',
	                'created_time'=>isset($payO['created_time'])?date('Y-m-d H:i:s',$payO['created_time']):'',
	                'user_name'=>isset($payO['user_name'])?$payO['user_name']:'',
	                'tel'=>isset($payO['tel'])?$payO['tel']:'','coupon'=>$coupon,'card'=>$card,'paytotal'=>$paymoney,
	            );
	            $goods_price = 0;
	            foreach ($order as $k=>$v){
	                $goods_price+=$v['goods_price'];
	                $stock = $this->db->select('o.order_sn,o.order_status,o.buyer_id,o.order_price,o.goods_num as order_num,o.buyer_memo,
    	            o.rechargeable_card_num,o.pd_amount,o.counpon_amount,o.integral_amount,u.user_name,u.tel,
    	            g.goods_num,g.goods_size as size,g.stock_code as stocks_sn,g.sotck_barcode as stocks_bar_code,
    	            g.goods_id,g.goods_pay_price,g.goods_price as stocks_price,gg.brand_name')
    	            ->from('shop_order o')
    	            ->join('user u','u.user_id=o.buyer_id','left')
    	            ->join('shop_order_goods g','g.order_sn=o.order_sn','left')
    	            ->join('shop_goods gg','gg.goods_id=g.goods_id')
    	            ->where('o.order_sn',$v['order_sn'])->get()->result_array();
    	            $orderStock[$k]['order'] = $v;
    	            $orderStock[$k]['stock'] = $stock;
	            }
	        }
	        
	        if($order&&$orderStock){
	            $value = array('state'=>true,'msg'=>'','order'=>$orderStock,'buyer'=>$buyer);
	            if(!empty($payRefund)){
	                $value['refund'] = $payRefund;
	            }else{
	                $value['refund'] = '';
	            }
	        }
	    }
	    //print_r($value);die;
	    echo json_encode($value);exit;
	}
	public function check_order(){
	    $orderSn = isset($_POST['orderSn'])?trim($_POST['orderSn']):'';
	    $value = array('state'=>false,'msg'=>'此订单不存在');
	    if($orderSn){
	        $paySn = $this->db->select('pay_sn')->from('shop_order')->where('order_sn',$orderSn)->get()->row('pay_sn');
	        $order = $this->db->select('o.order_sn,o.created_time,o.order_status,o.buyer_id,o.order_price,o.goods_price,o.goods_num as order_num,
	            o.rechargeable_card_num,o.pd_amount,o.counpon_amount,o.integral_amount,u.user_name,u.tel')
	        ->from('shop_order o')
	        ->join('user u','u.user_id=o.buyer_id','left')
	        ->where('o.pay_sn',$paySn)
	        ->where_not_in('o.order_status',array(0,10))
	        ->get()->result_array();
	      $orderStock = array();$buyer = array();
	      if(!empty($order)){
	            $payO = isset($order[0])?$order[0]:'';
	            $payLog = $this->db->select('pay_num,mtcn_type')->from('shop_order_pay')->where('pay_sn',$paySn)->get()->result_array();
	            $payRefund = array();$paymoney = 0;$coupon = 0;$card = 0;
	            foreach ($payLog as $v){
	                $paymoney+=$v['pay_num'];
	                $payRefund[$v['mtcn_type']] = $v['pay_num'];
	                if($v['pay_num']>0&&($v['mtcn_type']==21||$v['mtcn_type']==22)){
	                    
	                    if($v['mtcn_type']==21){
	                        $coupon = $v['pay_num'];
	                    }
	                    if($v['mtcn_type']==22){
	                        $card = $v['pay_num'];
	                    }
	                }
	            }
                
	            $buyer = array(
	                'order_status'=>isset($payO['order_status'])?$payO['order_status']:'',
	                'buyer_id'=>isset($payO['buyer_id'])?$payO['buyer_id']:'',
	                'created_time'=>isset($payO['created_time'])?date('Y-m-d H:i:s',$payO['created_time']):'',
	                'user_name'=>isset($payO['user_name'])?$payO['user_name']:'',
	                'tel'=>isset($payO['tel'])?$payO['tel']:'','coupon'=>$coupon,'card'=>$card,'paytotal'=>$paymoney,
	            );
	            $goods_price = 0;
	            foreach ($order as $k=>$v){
	                $goods_price+=$v['goods_price'];
	                $stock = $this->db->select('o.order_sn,o.order_status,o.buyer_id,o.order_price,o.goods_num as order_num,o.buyer_memo,
    	            o.rechargeable_card_num,o.pd_amount,o.counpon_amount,o.integral_amount,u.user_name,u.tel,
    	            g.goods_num,g.goods_size as size,g.stock_code as stocks_sn,g.sotck_barcode as stocks_bar_code,
    	            g.goods_id,g.goods_pay_price,g.goods_price as stocks_price,gg.brand_name')
    	            ->from('shop_order o')
    	            ->join('user u','u.user_id=o.buyer_id','left')
    	            ->join('shop_order_goods g','g.order_sn=o.order_sn','left')
    	            ->join('shop_goods gg','gg.goods_id=g.goods_id')
    	            ->where('o.order_sn',$v['order_sn'])->get()->result_array();
    	            $orderStock[$k]['order'] = $v;
    	            $orderStock[$k]['stock'] = $stock;
	            }
	        }
	        
	        if($order&&$orderStock){
	            $value = array('state'=>true,'msg'=>'','order'=>$orderStock,'buyer'=>$buyer);
	            if(!empty($payRefund)){
	                $value['refund'] = $payRefund;
	            }else{
	                $value['refund'] = '';
	            }
	        }
	    }
	    //print_r($value);die;
	    echo json_encode($value);exit;
	}
	public function refund(){
	    //print_r($_POST);die;
	    $order = $_POST['order'];
	    $guide = isset($_GET['guide'])?trim($_GET['guide']):'';
	    $type = isset($_GET['type'])?trim($_GET['type']):'';
	    $retype = isset($_GET['state'])?trim($_GET['state']):1;
	    //$goods = isset($_POST['put_goods_name'])?$_POST['put_goods_name']:'';
	    /* $orderNow['totalPrice'] = isset($_POST['totalPrice'])?$_POST['totalPrice']:'';//订单现商品总价
	    $orderNow['total'] = isset($_POST['total'])?$_POST['total']:'';//订单商品原价（没打折之前）
	    $orderNow['totalOrderPay'] = isset($_POST['totalOrderPay'])?$_POST['totalOrderPay']:'';//订单原商品总价
	    $payMoneyAll = $orderNow['totalPrice']-$orderNow['totalOrderPay'];//未任何抵扣资金；退款补价才会 */
	     
	    $paycash = !empty($_POST['paycash'])?$_POST['paycash']:0;
	    $paybank = !empty($_POST['paybank'])?$_POST['paybank']:0;
	    $paywx = !empty($_POST['paywx'])?$_POST['paywx']:0;
	    $payzfb = !empty($_POST['payzfb'])?$_POST['payzfb']:0;
	    $orderP['pd_amount'] = !empty($_POST['paybalance'])?$_POST['paybalance']:0;
	    $orderP['counpon_amount'] = !empty($_POST['paycoupon'])?$_POST['paycoupon']:0;
	    $orderP['paycard'] = !empty($_POST['paycard'])?$_POST['paycard']:0;
	    $payMoneyAll = $paycash+$paybank+$paywx+$payzfb+$orderP['pd_amount']+$orderP['counpon_amount']+$orderP['paycard'];
	    $money = $paycash+$paybank+$paywx+$payzfb+$orderP['pd_amount']+$orderP['paycard'];
	    $note = '';
	    $goods_arr = array();
	    $result = array('state'=>false,'msg'=>'操作错误');
	    $order = object_array(json_decode($order));
	    $stockInfo = array(); $totalMoney = 0;$oldTotal = 0;$buyer_id='';$order_type='';$spg_id='';$spg_name='';$cashier_user='';
	    $pay_sn = '';
	    $order_goods_print = array();$ii=0;
	    //print_r($_POST);die;
	    $oldOrderP['counpon_amount'] = 0;
	    $oldOrderP['paycard'] = 0;
	    foreach ($order as $ka=>$va){
	        $order_store = $this->db->select('store_id,order_type,counpon_amount,coupon_id,rechargeable_card_num,cashier_user,spg_id,spg_name,pay_sn,buyer_id,goods_price')->where('order_sn',$va['order_sn'])->get('shop_order')->row_array();
	        $oldOrderP['counpon_amount'] +=$order_store['counpon_amount'];
	        $oldOrderP['paycard'] +=$order_store['rechargeable_card_num'];
	        $coupon_id = $order_store['coupon_id'];
	        $buyer_id = $order_store['buyer_id'];
	        $pay_sn = $order_store['pay_sn'];
	        $cashier_user = $order_store['cashier_user'];
	        $spg_id = $order_store['spg_id'];
	        $spg_name = $order_store['spg_name'];
	        $order_type = $order_store['order_type'];
	        $oldTotal +=$order_store['goods_price'];
	        foreach ($va['stocks'] as $k=>$v){
	            $totalMoney +=$v['num']*$v['true_price'];
	            if($v['type']!=1){
	                $goods = $this->db->select('v.*')->from('v_store_brand_stock_amount v')
	                
	                ->where('goods_id',$v['goods_id'])
	                ->where('stocks_sku',$v['stocks_sn'])->where('size',$v['size'])
	                ->where("store_id IN ({$_SESSION['shop_spg_store_id']})")->get()->row_array();
	                $v['goods_name'] = $goods['goods_name'];
	                $v['pay_sn'] = $order_store['pay_sn'];
	                $v['store_id'] = $goods['store_id'];
	                $v['goods_image'] = $goods['goods_image'];
	                $v['goods_color'] = $goods['color'];
	                $v['goods_a_id'] = $goods['goods_a_id'];
	                $v['gc_id'] = $goods['gc_id'];
	                $v['sotck_barcode'] = $goods['stocks_bar_code'];
	                $v['goods_price'] = empty($goods['price'])?$goods['stocks_price']:$goods['price'];
	                $stockInfo[] = $v;
	            }else{
	                $goods = $this->db->select('g.gc_id,g.goods_color,c.gc_name')->from('shop_order_goods g')
	                ->join('shop_goods_class c','c.gc_id=g.gc_id')
	                ->where('order_sn',$va['order_sn'])->where('goods_id',$v['goods_id'])->
	                where('stock_code',$v['stocks_sn'])->where('goods_size',$v['size'])->get()->row_array();
	                $goods['color']=$goods['goods_color'];
	            }
	            $order_goods_print[$ii]['color'] = $goods['color'];
	            $order_goods_print[$ii]['gc_name'] = isset($goods['gc_name'])?$goods['gc_name']:'';
	            $order_goods_print[$ii]['goods_num'] = $v['num'];
	            $order_goods_print[$ii]['goods_size'] = $v['size'];
	            $order_goods_print[$ii]['goods_pay_price'] = $v['true_price'];
	            $order_goods_print[$ii]['stock_code'] = $v['stocks_sn'];
	            $order_goods_print[$ii]['goods_pay_price_total'] = sprintf("%.2f",$v['true_price']*$v['num']);
	            $ii++;
	        }
	    }  
	    $user_id = $buyer_id;$time = time();
	    $nowPay = $totalMoney-$oldTotal;
	    $payMoney = $nowPay-$orderP['counpon_amount']-$orderP['paycard'];
	    $rebate_amountAll = $nowPay-$oldOrderP['counpon_amount'];
	    if($nowPay<$payMoneyAll){
	         if($retype==1){
	             $orderP['pd_amount'] = $orderP['pd_amount']-($payMoneyAll-$nowPay-$oldOrderP['counpon_amount']-$oldOrderP['paycard']);
	         }else{
	             $paycash = $paycash-($payMoneyAll-$nowPay-$oldOrderP['counpon_amount']-$oldOrderP['paycard']);
	         }
	         if($oldOrderP['counpon_amount']>0){
	             $orderP['counpon_amount'] = $oldOrderP['counpon_amount']*(-1);
	         }
	         if($oldOrderP['paycard']>0){
	             $orderP['paycard'] = $oldOrderP['paycard']*(-1);
	         }
	         $rebate_amountAll = $nowPay+$oldOrderP['counpon_amount'];
	    }
        
	    /* print_r($totalMoney.'|');print_r($oldTotal.'|');print_r($payMoneyAll.'|');
	    print_r($paycash.'|');print_r($nowPay.'|');print_r($orderP);print_r($oldOrderP);print_r($_POST);
	    die;  */
	    $sqlPayIn = array();$sqlPayUp = array();
	    if($paycash!=0){
	        $checkPay = $this->db->select('pay_num')->where('pay_sn',$pay_sn)->where('mtcn_type',1)->get('shop_order_pay')->row_array();
	        if($checkPay){
	            $sqlPayUp[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$paycash+$checkPay['pay_num'],'mtcn_type'=>1,'api_pay_state'=>1,'pay_time'=>$time);
	        }else{
	            $sqlPayIn[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$paycash,'mtcn_type'=>1,'api_pay_state'=>1,'pay_time'=>$time);
	        }
	    }
	    if($paywx!=0){
	        $checkPay = $this->db->select('pay_num')->where('pay_sn',$pay_sn)->where('mtcn_type',3)->get('shop_order_pay')->row_array();
	        if($checkPay){
	            $sqlPayUp[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$paywx+$checkPay['pay_num'],'mtcn_type'=>3,'api_pay_state'=>1,'pay_time'=>$time);
	        }else{
	            $sqlPayIn[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$paywx,'mtcn_type'=>3,'api_pay_state'=>1,'pay_time'=>$time);
	        }
	    }
	    if($payzfb!=0){
	        $checkPay = $this->db->select('pay_num')->where('pay_sn',$pay_sn)->where('mtcn_type',4)->get('shop_order_pay')->row_array();
	        if($checkPay){
	            $sqlPayUp[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$payzfb+$checkPay['pay_num'],'mtcn_type'=>4,'api_pay_state'=>1,'pay_time'=>$time);
	        }else{
	            $sqlPayIn[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$payzfb,'mtcn_type'=>4,'api_pay_state'=>1,'pay_time'=>$time);
	        }
	    }
	    if($paybank!=0){
	        $checkPay = $this->db->select('pay_num')->where('pay_sn',$pay_sn)->where('mtcn_type',2)->get('shop_order_pay')->row_array();
	        if($checkPay){
	            $sqlPayUp[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$paybank+$checkPay['pay_num'],'mtcn_type'=>2,'api_pay_state'=>1,'pay_time'=>$time);
	        }else{
	            $sqlPayIn[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$paybank,'mtcn_type'=>2,'api_pay_state'=>1,'pay_time'=>$time);
	        }
	    }
	    if($orderP['pd_amount']!=0){
	        $checkPay = $this->db->select('pay_num')->where('pay_sn',$pay_sn)->where('mtcn_type',5)->get('shop_order_pay')->row_array();
	        if($checkPay){
	            $sqlPayUp[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderP['pd_amount']+$checkPay['pay_num'],'mtcn_type'=>5,'api_pay_state'=>1,'pay_time'=>$time);
	        }else{
	            $sqlPayIn[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderP['pd_amount'],'mtcn_type'=>5,'api_pay_state'=>1,'pay_time'=>$time);
	        }
	        
	    }
	    if($orderP['counpon_amount']!=0){
	        $checkPay = $this->db->select('pay_num')->where('pay_sn',$pay_sn)->where('mtcn_type',21)->get('shop_order_pay')->row_array();
	        if($checkPay){
	            $sqlPayUp[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderP['counpon_amount']+$checkPay['pay_num'],'mtcn_type'=>21,'api_pay_state'=>1,'pay_time'=>$time);
	        }else{
	            $sqlPayIn[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderP['counpon_amount'],'mtcn_type'=>21,'api_pay_state'=>1,'pay_time'=>$time);
	        }
	    }
	    if($orderP['paycard']!=0){
	        $checkPay = $this->db->select('pay_num')->where('pay_sn',$pay_sn)->where('mtcn_type',22)->get('shop_order_pay')->row_array();
	        if($checkPay){
	            $sqlPayUp[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderP['paycard']+$checkPay['pay_num'],'mtcn_type'=>22,'api_pay_state'=>1,'pay_time'=>$time);
	        }else{
	            $sqlPayIn[] = array('pay_sn'=>$pay_sn,'mtcn_sn'=>'','pay_num'=>$orderP['paycard'],'mtcn_type'=>22,'api_pay_state'=>1,'pay_time'=>$time);
	        }
	        
	    }
	    $stocks = array();
	    foreach ($stockInfo as $k=>$v){
	        $stocks[$v['store_id']]['stocks'][] = $v;
	        $stocks[$v['store_id']]['pay_sn'] = $v['pay_sn'];
	    }
	    
	    $sqlStockIn =array();
	    $sqlOrderIn =array();
	    $sqlOrderUp =array();$sqlOrderLog = array();$sqlRefundLog=array();
	    $hasCash = 0;$hasBank = 0;$hasWx = 0;$hasZfb = 0;$hasBalance = 0;$hasCoupon = 0;$hasCard = 0;$hasRebate = 0;
	    $orderNum = count($stocks);$ii = 0;
	    foreach ($stocks as $ka=>$va){
	        $ii++;
	        $checkOrder = $this->db->select('order_sn,buyer_id,order_price,store_name,goods_num,goods_price,rechargeable_card_num,counpon_amount,pd_amount,rebate,rebate_amount,order_pointscount')
	        ->where('pay_sn',$v['pay_sn'])->where('store_id',$ka)->get('shop_order')->row_array();
	        $store_name = $checkOrder['store_name'];
	        $newPrice = 0;$newNum = 0;
	        if(!empty($checkOrder)){
	            foreach ($va['stocks'] as $k=>$v){
	                $newPrice +=$v['num']*$v['true_price'];
	                $newNum +=$v['num'];
	                $sql = $v;
	                $sql['goods_num']=$v['num'];
	                $sql['goods_pay_price']=$v['true_price'];
	                $sql['user_id']=$checkOrder['buyer_id'];
	                $sql['stock_code']=$v['stocks_sn'];
	                $sql['goods_size']=$v['size'];
	                $sql['order_sn']=$checkOrder['order_sn'];
	                unset($sql['num']);unset($sql['true_price']);unset($sql['stocks_sn']);unset($sql['size']);
	                unset($sql['type']);unset($sql['pay_sn']);
	                $sqlStockIn[] = $sql;
	                
	                $refundLog = array();
	                $refundLog['order_sn'] = $checkOrder['order_sn'];
	                $refundLog['refund_sn'] = date('Ymdhis').rand(10,99);
	                $refundLog['store_id'] = $ka;
	                $refundLog['store_name'] = $store_name;
	                $refundLog['buyer_id'] = $buyer_id;
	                $refundLog['buyer_name'] = '';
	                $refundLog['goods_id'] = $v['goods_id'];
	                $refundLog['order_goods_id'] = $v['goods_id'];
	                $refundLog['goods_name'] = $v['goods_name'];
	                $refundLog['goods_num'] = $v['num'];
	                $refundLog['refund_amount'] = $v['num']*$v['true_price'];
	                $refundLog['goods_image'] = $v['goods_image'];
	                $refundLog['order_goods_type'] = 1;
	                $refundLog['refund_type'] = 2;
	                $refundLog['seller_state'] = 2;
	                $refundLog['refund_state'] = 3;
	                $refundLog['return_type'] = 2;
	                $refundLog['order_lock'] = 1;
	                $refundLog['goods_state'] = 4;
	                $refundLog['add_time'] = $time;
	                $refundLog['seller_time'] = $time;
	                $sqlRefundLog[] = $refundLog;
	            }
	            if($ii==$orderNum){
	                $rebatePrice = $rebate_amountAll-$hasRebate;
	                $couponPrice = $orderP['counpon_amount']-$hasCoupon;
	                $cardPrice = $orderP['paycard']-$hasCard;
	                $balancePrice = $orderP['pd_amount']-$hasBalance;
	                $bankPrice = $paybank-$hasBank;
	                $wxPrice = $paywx-$hasWx;
	                $zfbPrice = $payzfb-$hasZfb;
	                $cashPrice = $paycash-$hasCash;
	            }else{
	                //$percent = empty($rebate_amountAll)?0:$newPrice/$rebate_amountAll;
	                $percent_ = empty($nowPay)?0:$newPrice/$nowPay;
	                if($newPrice<0){
	                    $rebatePrice = $newPrice+$checkOrder['counpon_amount'];
	                }
	                if($newPrice>0){
	                    $rebatePrice = $newPrice-$checkOrder['counpon_amount'];
	                }
	                $hasRebate +=$rebatePrice;
	                $couponPrice = $percent_*$orderP['counpon_amount'];
	                $hasCoupon +=$couponPrice;
	                $cardPrice = $percent_*$orderP['paycard'];
	                $hasCard +=$cardPrice;
	                $balancePrice = $percent_*$orderP['pd_amount'];
	                $hasBalance +=$balancePrice;
	                $cashPrice = $percent_*$paycash;
	                $hasCash +=$cashPrice;
	                $bankPrice = $percent_*$paybank;
	                $hasBank +=$bankPrice;
	                $wxPrice = $percent_*$paywx;
	                $hasWx +=$wxPrice;
	                $zfbPrice = $percent_*$payzfb;
	                $hasZfb +=$zfbPrice;
	            }
	            $point = intval($rebatePrice-$cardPrice);
	            $osql = array(
	                'order_sn'=>$checkOrder['order_sn'],'order_price'=>$checkOrder['order_price']+$newPrice,
	                'goods_price'=>$checkOrder['goods_price']+$newPrice,
	                'goods_num'=>$checkOrder['goods_num']+$newNum,'rebate_amount'=>$checkOrder['rebate_amount']+$rebatePrice,
	                'rechargeable_card_num'=>$checkOrder['rechargeable_card_num']+$cardPrice,
	                'pd_amount'=>$checkOrder['pd_amount']+$balancePrice,
	                'counpon_amount'=>$checkOrder['counpon_amount']+$couponPrice,
	                'order_pointscount'=>$checkOrder['order_pointscount']+$point,
	            );
	            $order_sn = $checkOrder['order_sn'];
	            $sqlOrderUp[] = $osql;
	        }else{
	            $order_sn = $this->common_function->produce_order_sn($ka);
	            $rebate_store = $this->db->select('store_name,order_take_percentage')->where('store_id',$ka)->get('store')->row_array();
				$rebate_store['order_take_percentage'] = empty($rebate_store['order_take_percentage'])?0:unserialize($rebate_store['order_take_percentage'])['offline'];
	            $store_name = $rebate_store['store_name'];
	            foreach ($va['stocks'] as $k=>$v){
	                $newPrice +=$v['num']*$v['true_price'];
	                $newNum +=$v['num'];
	                $sql = $v;
	                $sql['goods_num']=$v['num'];
	                $sql['goods_pay_price']=$v['true_price'];
	                $sql['user_id']=$buyer_id;
	                $sql['stock_code']=$v['stocks_sn'];
	                $sql['goods_size']=$v['size'];
	                $sql['order_sn']=$order_sn;
	                unset($sql['num']);unset($sql['true_price']);unset($sql['stocks_sn']);unset($sql['size']);
	                unset($sql['type']);unset($sql['pay_sn']);
	                $sqlStockIn[] = $sql;
	                $refundLog = array();
	                $refundLog['order_sn'] = $order_sn;
	                $refundLog['pay_sn'] = $pay_sn;
	                $refundLog['store_id'] = $ka;
	                $refundLog['store_name'] = $store_name;
	                $refundLog['buyer_id'] = $buyer_id;
	                $refundLog['buyer_name'] = '';
	                $refundLog['goods_id'] = $v['goods_id'];
	                $refundLog['order_goods_id'] = $v['goods_id'];
	                $refundLog['goods_name'] = $v['goods_name'];
	                $refundLog['goods_num'] = $v['num'];
	                $refundLog['refund_amount'] = $v['num']*$v['true_price'];
	                $refundLog['goods_image'] = $v['goods_image'];
	                $refundLog['order_goods_type'] = 1;
	                $refundLog['refund_type'] = 2;
	                $refundLog['seller_state'] = 2;
	                $refundLog['refund_state'] = 3;
	                $refundLog['return_type'] = 2;
	                $refundLog['order_lock'] = 1;
	                $refundLog['goods_state'] = 4;
	                $refundLog['add_time'] = $time;
	                $refundLog['seller_time'] = $time;
	                $sqlRefundLog[] = $refundLog;
	            }
	            
	            $percent = empty($rebate_amountAll)?0:$newPrice/$rebate_amountAll;
	            //$rebatePriceOld = $newPrice-$percent*$oldOrderP['counpon_amount'];
	            if($ii==$orderNum){
	                $rebatePrice = $rebate_amountAll-$hasRebate;
	                $couponPrice = $orderP['counpon_amount']-$hasCoupon;
	                $cardPrice = $orderP['paycard']-$hasCard;
	                $balancePrice = $orderP['pd_amount']-$hasBalance;
	                $bankPrice = $paybank-$hasBank;
	                $wxPrice = $paywx-$hasWx;
	                $zfbPrice = $payzfb-$hasZfb;
	                $cashPrice = $paycash-$hasCash;
	            }else{
	                //$percent = empty($rebate_amountAll)?0:$newPrice/$rebate_amountAll;
	                $percent_ = empty($nowPay)?0:$newPrice/$nowPay;
	                $rebatePrice = $newPrice;
	                $hasRebate +=$rebatePrice;
	                $couponPrice = $percent_*$orderP['counpon_amount'];
	                $hasCoupon +=$couponPrice;
	                $cardPrice = $percent_*$orderP['paycard'];
	                $hasCard +=$cardPrice;
	                $balancePrice = $percent_*$orderP['pd_amount'];
	                $hasBalance +=$balancePrice;
	                $cashPrice = $percent_*$paycash;
	                $hasCash +=$cashPrice;
	                $bankPrice = $percent_*$paybank;
	                $hasBank +=$bankPrice;
	                $wxPrice = $percent_*$paywx;
	                $hasWx +=$wxPrice;
	                $zfbPrice = $percent_*$payzfb;
	                $hasZfb +=$zfbPrice;
	            }
	            $point = intval($rebatePrice-$cardPrice);
	            $osql = array(
	                'order_sn'=>$order_sn,'order_price'=>$newPrice,'pay_sn'=>$va['pay_sn'],'order_type'=>$order_type,
	                'order_from'=>2,'cashier_user'=>$cashier_user,'pay_type'=>2,
	                'order_status'=>40,'store_id'=>$ka,'store_name'=>$rebate_store['store_name'],
	                'spg_id'=>$order_sn,'spg_name'=>$newPrice,'shipping_type'=>2,'buyer_id'=>$buyer_id,
	                'goods_price'=>$newPrice,'rebate'=>$rebate_store['order_take_percentage'],'created_time'=>$time,
	                'goods_num'=>$newNum,'rebate_amount'=>$rebatePrice,
	                'rechargeable_card_num'=>$cardPrice,
	                'pd_amount'=>$balancePrice,
	                'counpon_amount'=>$couponPrice,
	                'order_pointscount'=>$point,
	            );
	            $sqlOrderIn[] = $osql;
	        }
	        
	        
	        $logT = ($newPrice>=0)?'补差价'.$newPrice:'退款'.$newPrice*(-1);
	        $orderLog = array(
	            'order_sn'=>$order_sn,'log_msg'=>'订单'.$order_sn.$logT,'log_time'=>$time,
	            'log_role'=>'用户','log_user'=>$buyer_id,'log_orderstate'=>40,
	        );
	        $sqlOrderLog[] = $orderLog;
	    }
	    $payIntegral = intval($payMoney);
	    if($orderP['pd_amount']!=0||$orderP['paycard']!=0){
	        $sql_user = " update ".$this->db->dbprefix('user')." set balance=balance-'{$orderP['pd_amount']}',
	        integral=integral+'{$payIntegral}',integral_total=integral_total+'{$payIntegral}',
	        rechargeable_card_num=rechargeable_card_num-'{$orderP['paycard']}',
	        order_money_num=order_money_num+'{$payMoneyAll}' where user_id='{$buyer_id}'";
	    
	        if($orderP['pd_amount']>0){
	            //用户资金日志
	            $payBalance =$orderP['pd_amount'];
	            $add_user_log_sql ="insert into ".$this->db->dbprefix('user_asset_log')."
	            (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	            values({$buyer_id},'{$pay_sn}',3,{$payBalance},0,
	            (select balance from ".$this->db->dbprefix('user').
	            " u where u.user_id={$buyer_id}),'通过支付号{$pay_sn}退款补差价余额支付{$payBalance}',{$time})"; //增加用户资金金额日志
	            $add_plat_log_sql ="insert into ".$this->db->dbprefix('sys_asset_account')."
	            (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	            values({$buyer_id},'{$pay_sn}',3,0,{$payBalance},
	            (select (asset+{$payBalance}) from ".$this->db->dbprefix('sys_asset_account')." p order by p.paa_id DESC limit 0,1),
	            '通过支付号{$pay_sn}退款补差价收入{$payBalance}',{$time})"; //增加平台资金金额日志
	            /*资金日志*/
	            
	        }
	        
	    }
	    //卷返回或者使用
	    if($orderP['counpon_amount']!=0){
	        
	    }
	    $this->db->trans_begin();
	    if(isset($sql_user)){
	        $this->db->query($sql_user);
	    }
	    if(isset($add_user_log_sql)){
	        $this->db->query($add_user_log_sql);
	    }
	    if(isset($add_plat_log_sql)){
	        $this->db->query($add_plat_log_sql);
	    }
	    if(!empty($sqlPayIn)){
	        $this->db->insert_batch('shop_order_pay',$sqlPayIn);//支付日志
	    }
	    if(!empty($sqlPayUp)){
	        foreach ($sqlPayUp as $k=>$v){
	            $this->db->where('pay_sn',$v['pay_sn'])->where('mtcn_type',$v['mtcn_type'])->update('shop_order_pay',$v);//支付日志
	        }
	    }
	    if(!empty($sqlStockIn)){
	        $this->db->insert_batch('shop_order_goods',$sqlStockIn);//
	    }
	    if(!empty($sqlOrderIn)){
	        $this->db->insert_batch('shop_order',$sqlOrderIn);//
	    }
	    if(!empty($sqlOrderUp)){
	        $this->db->update_batch('shop_order',$sqlOrderUp,'order_sn');//
	    }
	    if(!empty($sqlOrderLog)){
	        $this->db->insert_batch('shop_order_log',$sqlOrderLog);//
	    }
	    if(!empty($sqlRefundLog)){
	        $this->db->insert_batch('shop_order_refund_return',$sqlRefundLog);//
	    }
	    if ($this->db->trans_status())
	    {
	        $this->db->trans_commit();
	        $cashier_store_name = empty($_SESSION['shop_dpms_name'])?$_SESSION['shop_store_name']:$_SESSION['shop_dpms_name'];
	        $money = ($payMoneyAll<$orderP['counpon_amount'])?0:$payMoneyAll-$orderP['counpon_amount'];
	        $order_money = ($totalMoney<$orderP['counpon_amount'])?0:$totalMoney-$orderP['counpon_amount'];
	        $order_info = array(
	            'store_name' =>$cashier_store_name,'time'=>date('Y-m-d H:i:s'),'spg_name'=>$_SESSION['shop_spg_name'],
	            'order_sn' =>$pay_sn,'money'=>sprintf("%.2f",$money),'order_money'=>$order_money,'goods_info'=>$order_goods_print,
	            'charge' =>sprintf("%.2f",$payMoneyAll-$totalMoney),'tel' =>$_SESSION['shop_spg_tel'],'address' =>$_SESSION['address'],
	            'note'=>$note,
	        );
	        $result = array('state'=>true,'msg'=>'数据提交成功','data'=>$order_info);
	        unset($_POST);
	     }
	     else
	     {
            $this->db->trans_rollback();
            $result = array('state'=>false,'msg'=>'数据提交失败');
	     }
	    
        echo json_encode($result);die;
	}
	public function check_orderAll(){
	    $startime = isset($_POST['startime'])?trim($_POST['startime']):'';
	    $endtime = isset($_POST['endtime'])?trim($_POST['endtime']):'';
	    $buyer = isset($_POST['orderBuyer'])?trim($_POST['orderBuyer']):'';
	    $order = isset($_POST['allreturn'])?trim($_POST['allreturn']):'';
	    $result = array('state'=>false,'data'=>'','msg'=>'');
	    //print_r($_POST);die;
	    
        $this->db->select('group_concat(pay_sn) as pay')
        ->from('shop_order o')
        ->join('user u','u.user_id=o.buyer_id','left');
        if(!empty($startime)){
            $startime = strtotime($startime);
            $this->db->where("o.created_time>=$startime");
        }
        if(!empty($endtime)){
            $endtime = strtotime($endtime);
            $this->db->where("o.created_time<=$endtime");
        }
        if(!empty($buyer)){
            $this->db->where("(u.user_name like '%$buyer%' or u.tel like '%$buyer%' or u.qq like '%$buyer%' or u.wx_nickname like '%$buyer%')");
        }
        if(!empty($order)){
            $this->db->where("(o.order_sn like '%$order%' or o.pay_sn like '%$order%')");
        }
        $pay_sn = $this->db->get()->row('pay');
        //print_r($this->db->last_query());die;
        //print_r($pay_sn);die;
        if(!empty($pay_sn)){
            $row = $this->db->select('o.order_sn,o.pay_sn,o.order_status,o.store_id,o.store_name,o.order_price,
            o.goods_num,o.goods_price,o.rechargeable_card_num,o.counpon_amount,from_unixtime(o.created_time) as date,u.user_name,u.tel')
            ->from('shop_order o')
            ->join('user u','u.user_id=o.buyer_id','left')
            ->where("pay_sn IN ($pay_sn)")->order_by('o.created_time','DESC')->get()->result_array();
            if(!empty($row)){
                $result = array('state'=>true,'data'=>$row,'msg'=>'');
            } 
        }
	        
	       
	    
	    echo json_encode($result);die;
	}
}
