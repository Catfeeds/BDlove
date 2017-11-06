<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wxpay extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        
        parent::__construct();
        $this->load->model('weixin_model');
        $this->load->model('order_model');
        $config_images = $this->common_function->get_default_img();
        $this->smarty->assign('config_images', $config_images);
    }
	public function index(){
	    ini_set('date.timezone','Asia/Shanghai');
	    //error_reporting(E_ERROR);
	    require_once ROOTPATH."libraries/Wxpay/lib/WxPay.Api.php";
	    require_once ROOTPATH."libraries/Wxpay/example/WxPay.JsApiPay.php";
	    require_once ROOTPATH.'libraries/Wxpay/example/log.php';
	    //支付信息
	    $paydata = isset($_GET['paydata'])?$_GET['paydata']:'';
	    $openId = $this->weixin_model->get_user_openid(base_url("vmall.php/wxpay/index"));
	    $user_id = $_SESSION['user_id'];
	    if(empty($paydata)||empty($user_id)){
	        exit;
	    }
	    $paydata = object_array(json_decode($paydata));//print_r($paydata);die;
	    $pay_sn = $paydata['pay_sn'];
	    $payStatus = $this->db->select('order_status')->where('pay_sn',$pay_sn)->get('shop_order')->row_array();
	    if($payStatus['order_status']>=20){
	        echo "<script>javascript:alert('订单已付款');window.location.href='".base_url("vmall.php/order/index")."';</script>";exit;
	    }
	    $order_info = $this->order_model->order_info($paydata);
	    $payMoney = $order_info['reciveInfo']['pay_money'];
	    $payMoney = intval($payMoney*100);
	    //$payMoney = 1;
	    $this->smarty->assign('reciveInfo',$order_info['reciveInfo']);
	    $urlData = base_url('vmall.php/order/ordersuccess?');
	    foreach ($order_info['reciveInfo'] as $k=>$v){
	        $urlData .= $k.'='.$v.'&';
	    }
	    
	    $this->smarty->assign('orderSuccess',$urlData);
	    $this->smarty->assign('orderInfo',$order_info['orderInfo']);
	    //初始化日志
	   /*  $logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
	    $log = Log::Init($logHandler, 15); */
	    //①、获取用户openid
	    $tools = new JsApiPay();
	    //$openId = $tools->GetOpenid();
	    
	    $notify_url = base_url('vmall.php/wxpay/notify');
	    //②、统一下单
	    $input = new WxPayUnifiedOrder();
	    $setBody = join(',',$paydata['order_pay']);
	    $setAttach = $pay_sn;
	    $input->SetBody($setBody);
	    $input->SetAttach($setAttach);
	    $input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
	    $input->SetTotal_fee($payMoney);
	    $input->SetTime_start(date("YmdHis"));
	    $input->SetTime_expire(date("YmdHis", time() + 600));
	    $input->SetGoods_tag("");
	    $input->SetNotify_url($notify_url);
	    $input->SetTrade_type("JSAPI");
	    $input->SetOpenid($openId);
	    $order = WxPayApi::unifiedOrder($input);//print_r($_SESSION);print_r($order);die;
	   // $this->db->insert('system_config',array('value'=>json_encode($order).'|AAAA|'.json_encode($openId).'|AAAA|'.json_encode($setBody).'|AAAA|'.json_encode($setAttach)));
	    //$this->db->insert('system_config',array('value'=>json_encode($payMoney).'|AAAA|'.json_encode($notify_url).'|AAAA|'.json_encode($setBody).'|AAAA|'.json_encode($setAttach)));
	    $jsApiParameters = $tools->GetJsApiParameters($order);
	    $jsApiParameters = object_array(json_decode($jsApiParameters));
	    $this->smarty->assign('jsApiParameters',$jsApiParameters);
	    $editAddress = $tools->GetEditAddressParameters();
	    $editAddress = object_array(json_decode($editAddress));
	    //$this->db->update('system_config',array('value'=>json_encode($jsApiParameters).'|AAAA|'.json_encode($editAddress)),array('code'=>'test1'));
	    $this->smarty->assign('editAddress',$editAddress);
	    //print_r($urlData);print_r($jsApiParameters);exit;
	    $this->smarty->display('wxpay.html');
	}
	
	public function notify(){
	    $xml = $GLOBALS['HTTP_RAW_POST_DATA']; 
	    $postObj = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
	    //$this->db->update('system_config',array('value'=>json_encode($postObj).'|AAAA|'.json_encode($_GET)),array('code'=>'dorder'));
	    $pay_sn = trim($postObj->attach);
	    $openid = $postObj->openid;
	    $time = time();
	    $order = $this->db->select('order_sn,store_name,shipping_type,coupon_id,order_price,rechargeable_card_num,counpon_amount,pd_amount,integral_amount')->where('pay_sn',$pay_sn)->get('shop_order')->result_array();
	    $orderInfo = array('order_status'=>20,'pay_type'=>1,'pay_time'=>$time,'pickup_code'=>'');
	    $user_id = $this->db->select('user_id')->where('wx_openid',$openid)->get('user')->row('user_id');
	    $payFee = sprintf("%.2f",($postObj->cash_fee)/100);
	    $payLog = array('pay_sn'=>$pay_sn,'mtcn_sn'=>$postObj->transaction_id,'pay_num'=>$payFee,'mtcn_type'=>3,'api_pay_state'=>1,'pay_time'=>$time);
	    
	    $orderData = array();$orderPay_money=0;
	    $userIntegral = 0;$pay_balance=0;$rechargeable_card_num = 0;$payIntegral=0;$order_coupon = array();
	    foreach ($order as $k=>$v){
	        if($v['shipping_type']==2){
	            //生成提货码
	            $get_pickup_code = $this->common_function->get_pickup_code($time);
	            if($get_pickup_code){
	                $orderInfo['pickup_code'] = $get_pickup_code;
	                $this->common_function->send_pickup_code($v['order_sn'],$user_id,$get_pickup_code,$v['store_name']);//推送提货通知
	            }
	           
	        }
	        $coupon = $this->db->select('group_concat(coupon_id) as coupon')->where('order_sn',$v['order_sn'])->get('shop_order_goods')->row('coupon');
	        if(!empty($coupon)){
	        	$order_coupon[] = $coupon;
	        }
	        $orderInfo['order_sn'] = $v['order_sn'];
	        $orderData[$k] = $orderInfo;
	        $orderPay_money += $v['order_price']-$v['counpon_amount']-$v['integral_amount']-$v['rechargeable_card_num'];
	        $payIntegral +=$v['order_price']-$v['counpon_amount']-$v['integral_amount'];
	        $userIntegral +=$v['integral_amount']; 
	        $pay_balance +=$v['pd_amount']; 
	        $rechargeable_card_num +=$v['rechargeable_card_num'];
	        sleep(1);
	    }
	    $integral_rate = $this->common_function->get_system_value('integral_rate');
	    $integral_rate = empty($integral_rate)?1000:$integral_rate;
	    $userIntegral_num = ceil($userIntegral*$integral_rate);
	    $payIntegral = intval($payIntegral);
	    $orderNum = count($order);
	    $balance = $this->db->select('balance,integral,integral_total,rechargeable_card_num')->where('user_id',$user_id)->get('user')->row_array();
	    $balance_sql = "update ".$this->db->dbprefix('user')." set balance =balance-'{$pay_balance}',rechargeable_card_num=rechargeable_card_num-'{$rechargeable_card_num}',
	    integral =integral-'{$userIntegral_num}'+'{$payIntegral}',integral_total =integral_total+'{$payIntegral}',order_num=order_num+$orderNum,order_money_num=order_money_num+'{$orderPay_money}'
	    where user_id = '{$user_id}'";//更新资金
	    $platAsset = $this->db->select('asset')->from('sys_asset_account')->order_by('paa_id','DESC')->limit(1)->get()->row('asset');
	    $platAsset +=$orderPay_money;
	    $add_plat_log_sql ="insert into ".$this->db->dbprefix('sys_asset_account')."
	    (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	    values({$user_id},'{$pay_sn}',3,0,'{$orderPay_money}','{$platAsset}',
	    '通过订单支付单号{$pay_sn}收入{$orderPay_money}',{$time})"; //增加平台资金金额日志
	    //$this->db->trans_start();
	    if(!empty($order_coupon)){
	    	$coupon_list = join(',',$order_coupon);
	    	$coupon_list = explode(',',$coupon_list);
	    	if(!empty($coupon_list)){
	    		$this->db->where_in('user_coupon_id',$coupon_list)->update('user_coupon',array('coupon_cost_time'=>$time));
	    	}
	    }
	    $this->db->query($balance_sql);
	    $this->db->query($add_plat_log_sql);
	    $this->db->update_batch('shop_order',$orderData,'order_sn');
	    $this->db->insert('shop_order_pay',$payLog);
	    echo 'SUCCESS';
	    //echo '<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>';
	    /* require_once ROOTPATH."libraries/Wxpay/lib/WxPay.Api.php";
	    require_once ROOTPATH."libraries/Wxpay/lib/WxPay.Notify.php";
	    require_once ROOTPATH.'libraries/Wxpay/example/log.php';
	    $notify = new PayNotifyCallBack();
	    $notify->Handle(false);
	    $source = $this->xml_to_json($xml); */
	    /*
	     {"appid":"wxa057f7ceb1bafbe2",
	     "attach":"\u805a\u5ba2\u4f53\u9a8c\u5e971,
	     \u805a\u5ba2\u4f53\u9a8c\u5e971",
	     "bank_type":"CFT",
	     "cash_fee":"1",
	     "fee_type":"CNY",
	     "is_subscribe":"Y",
	     "mch_id":"1444774502",
	     "nonce_str":"nesk9k3hnzu4k5v0pttxo41rtotrjpt6",
	     "openid":"osmaPwCx6_Fshi3-UXI0MPe0WNWE",
	     "out_trade_no":"144477450220170522094615",
	     "result_code":"SUCCESS","return_code":"SUCCESS",
	     "sign":"CDF987CAA4BC8420749DE4DDCBD664FF",
	     "time_end":"20170522094627","total_fee":"1",
	     "trade_type":"JSAPI","transaction_id":"4008742001201705222002259377"}|AAAA|[]
	     */

        //发送推送消息
        foreach ($order as $k=>$v){
            $orderbase=$this->db->select('store_id,spg_id,buyer_id,created_time')->where('order_sn',$v['order_sn'])->get('shop_order')->row_array();
            $user_name=$this->db->select('user_name')->where('user_id',$orderbase['buyer_id'])->get('user')->row('user_name');
            $payload=array('tag'=>'orderPayMsg','orderId'=>$v['order_sn'],'userName'=>$user_name,'payTime'=>date('Y-m-d H:i:s',$orderbase['created_time']));
            $title='您有一笔新的订单';
            $content="会员".$user_name."在您店铺购买了商品";
            $res= $this->common_function->pushMsg($title,$content,$payload,$v['order_sn']);//发送推送消息

        }
	    
	}
	
	
	
	//会员充值
	public function recharge(){
	    ini_set('date.timezone','Asia/Shanghai');
	    //error_reporting(E_ERROR);
	    require_once ROOTPATH."libraries/Wxpay/lib/WxPay.Api.php";
	    require_once ROOTPATH."libraries/Wxpay/example/WxPay.JsApiPay.php";
	    require_once ROOTPATH.'libraries/Wxpay/example/log.php';
	    //支付信息
	    $paydata = isset($_GET['paydata'])?$_GET['paydata']:'';
	    $user_id = $_SESSION['user_id'];
	
	    if(empty($paydata)||empty($user_id)){
	        exit;
	    }
	
	    $paydata = object_array(json_decode($paydata));//print_r($paydata);die;
	    $pay_sn = $paydata['pay_sn'];
	    $payStatus = $this->db->select('api_pay_state')->where('pay_sn',$pay_sn)->get('shop_order_pay')->row('api_pay_state');
	    $payMoney = $paydata['payNum'];
	    $payMoneys = intval($paydata['payNum']*100);
	
	    //初始化日志
	    /*  $logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
	     $log = Log::Init($logHandler, 15); */
	    //①、获取用户openid
	    $tools = new JsApiPay();
	    //$openId = $tools->GetOpenid();
	    $openId = $this->weixin_model->get_user_openid(base_url("vmall.php/wxpay/recharge"));
	    if(!$openId){
	        $openId = $this->db->select('wx_openid')->where('user_id',$user_id)->get('user')->row('wx_openid');
	    }
	    $notify_url = base_url('vmall.php/wxpay/recharge_notify');
	    $urlData = base_url('vmall.php/money/index');
	    unset($_SESSION['rechargeMoney']);
	    $this->session->set_userdata(array("rechargeMoney"=>$payMoney));
	    $this->smarty->assign('rechargesuccess',$urlData);
	    $this->smarty->assign('payMoney',$payMoney);
	    //②、统一下单
	    $input = new WxPayUnifiedOrder();
	    $input->SetBody('BE童装城账户余额充值');
	    $input->SetAttach($pay_sn);
	    $input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
	    $input->SetTotal_fee($payMoneys);
	    $input->SetTime_start(date("YmdHis"));
	    $input->SetTime_expire(date("YmdHis", time() + 600));
	    $input->SetGoods_tag("");
	    $input->SetNotify_url($notify_url);
	    $input->SetTrade_type("JSAPI");
	    $input->SetOpenid($openId);
	    $order = WxPayApi::unifiedOrder($input);//print_r($_SESSION);print_r($order);die;
	    $jsApiParameters = $tools->GetJsApiParameters($order);
	    $jsApiParameters = object_array(json_decode($jsApiParameters));
	    $this->smarty->assign('jsApiParameters',$jsApiParameters);
	    $this->smarty->display('money_recharge_pay.html');
	}
	
	public function recharge_notify(){
	    $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
	    $postObj = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
	    $code = $postObj->return_code;
	    $msg = $postObj->return_msg;
	    if($code =="SUCCESS"){
	        $payMoney = ($postObj->total_fee)/100;
	        $openid = $postObj->openid;
	        $pay_sn = trim($postObj->attach);
	        $time = strtotime($postObj->time_end);
	        
	        //判断数据是否已经处理过
	        $this->db->select('ual_id,pay_sn');
	        $this->db->from('user_asset_log');
	        $this->db->where('pay_sn',$pay_sn);
	        $asset_log = $this->db->get()->row_array();
	        if(!$asset_log){
	            //openid获取用户信息
	            $this->db->select('user_id,balance,wx_nickname');
	            $this->db->from('user');
	            $this->db->where('wx_openid',$openid);
	            $userinfo = $this->db->get()->row_array();
	             
	            //$this->db->insert('system_config',array("code"=>'recharge_openid',"value"=>$openid));
	            //$this->db->insert('system_config',array("code"=>'recharge_payMoney',"value"=>$payMoney));
	            //$this->db->insert('system_config',array("code"=>'recharge_pay_sn',"value"=>$pay_sn));
	             
	            $asset = $userinfo['balance']+$payMoney;
	            $payInfo = array(
	                'user_id'=>$userinfo['user_id'],
	                'pay_sn'=>$pay_sn,
	                'log_type'=>2,
	                'asset_out'=>0,
	                'asset_in'=>$payMoney,
	                'asset'=>$asset,
	                'note'=>"通过支付单号".$pay_sn."充值".$payMoney,
	                'time'=>$time
	            );
	            $platAsset = $this->db->select('asset')->from('sys_asset_account')->order_by('paa_id','DESC')->limit(1)->get()->row('asset');
	            $platAsset +=$payMoney;
	            $sysInfo = array(
	                'user_id'=>$userinfo['user_id'],
	                'user_type'=>0,
	                'pay_sn'=>$pay_sn,
	                'log_type'=>2,
	                'asset_out'=>0,
	                'asset_in'=>$payMoney,
	                'asset'=>$platAsset,
	                'note'=>"通过支付单号".$pay_sn."收入".$payMoney,
	                'time'=>$time
	            );
	            $this->db->trans_off(); //禁用事务
	            $this->db->trans_start(); //开启事务
	            $this->db->where('wx_openid', $openid);
	            $res= $this->db->update('user', array("balance"=>$asset));//更新用户资金
	            $ress=$this->db->insert('user_asset_log',$payInfo);//增加用户资金日志
	            $ress=$this->db->insert('sys_asset_account',$sysInfo);//增加平台资金
	            $this->db->trans_complete(); //事务完成
	            $this->db->trans_off(); //禁用事务
	            
	            $this->db->select('template_id,template_title');
	            $this->db->from('weixin_notify_templates');
	            $this->db->where('template_code','CHTZ');
	            $temp = $this->db->get()->row_array();
	            $son=array(
	                "first"=>array("value"=>"您好，您已成功进行余额充值。"."\n",
	                               "color"=>"#173177"
	                ),
	                "accountType"=>array("value"=>"账户昵称："
	                    ),
	                "account"=>array("value"=>"{$userinfo['wx_nickname']}"."\n",
	                                  "color"=>"#173177"
	                    ),
                    "amount"=>array("value"=>"{$payMoney}"."元\n",
                                   "color"=>"#173177"
                        ),
                    "result"=>array("value"=>"充值成功"."\n",
                                    "color"=>"#173177"
                    ),
                    "remark"=>array("value"=>"备注：如有疑问，请联系导购！",
                                    "color"=>"#173177"
                    )
	            );
	            $data = array(
	                "touser"=>"{$openid}",
	                "template_id"=>"{$temp['template_id']}",
	                "url"=>base_url('vmall.php/money/index'),
	                "topcolor"=>"#173177",
	                "data"=>json_encode($son)
	            );
	            $url=base_url('vmall.php/receive/weixin_send_msg');
	            $ch = curl_init();
	            curl_setopt($ch, CURLOPT_URL, $url);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	            curl_setopt($ch, CURLOPT_POST, 1);
	            curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
	            $result = curl_exec($ch);
	            curl_close($ch);
	            $result=json_decode($result,true);
                $result = object_array(json_decode($result,true));
	            //$this->db->insert('system_config',array("code"=>'recharge_errmsg',"value"=>$result['errmsg']));
	            if($result['errmsg']=='ok'){
	                $arr=array(
	                    'wnl_title'=>$temp['template_title'],
	                    'wnl_code'=>'CHTZ',
	                    'wnl_content'=>json_encode($son),
	                    'wnl_type'=>3,
	                    'wnl_time'=>time(),
	                    'wnl_to_usersn'=>$userinfo['wx_nickname'],
	                    'user_id'=>$userinfo['user_id'],
	                    'order_sn'=>""
	                );
	                $this->db->insert('weixin_notify_log',$arr);
	            }
	        }
	        echo 'SUCCESS';
	    }else{
	        echo "FAIL";
	    }
	    

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
