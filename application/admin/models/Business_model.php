<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Business_model
 *
 * @author yhx
 */
class Business_model extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     * 写入订单日志
     * @param type $order_id          订单id
     * @param type $log_msg           文字描述
     * @param type $log_orderstate    订单状态
     */
//    public function order_log($order_id,$log_msg,$log_orderstate){
//        $inner = array(
//            'order_id'=>$order_id,
//            'log_msg'=>$log_msg,
//            'log_time'=> time(),
//            'log_role'=>$_SESSION['shop_admin_role_name'],
//            'log_user'=>$_SESSION['shop_admin_name'],
//            'log_orderstate'=>$log_orderstate
//        );
//        $this->db->insert('shop_order_log',$inner);
//    }
    public function order_type(){
        return array('1'=>'分销','2'=>'微商','3'=>'电商','4'=>'门店');
    }
    public function order_from(){
        return array('1'=>'微商城','21'=>'单门店','2'=>'单门店','22'=>'集合店','3'=>'APP','31'=>'APP微商','32'=>'APP批发','41'=>'电商京东','42'=>'电商天猫','43'=>'电商手工');
    }
    public function order_status($type=1){
        if($type==2){
            return array('0'=>'已取消','10'=>'待付款','20'=>'待自提','30'=>'待自提','40'=>'待评价','50'=>'已完成');
        }else{
            return array('0'=>'已取消','10'=>'待付款','20'=>'待收货','30'=>'待收货','40'=>'待评价','50'=>'已完成');
        }
    }
    public function order_status_admin(){
        return array('0'=>'已取消','10'=>'未付款','20'=>'已付款','30'=>'已发货','40'=>'已收货','50'=>'已完成');
    }
    public function shipping_type(){
        return array('1'=>'快递','2'=>'自提');
    }
    public function pay_type(){
        return array('1'=>'微信','2'=>'线下','3'=>'余额','4'=>'支付宝');
    }
    public function mtcn_type(){
        return array('1'=>'现金','2'=>'银行卡','3'=>'微信','4'=>'支付宝','5'=>'余额','21'=>'优惠卷','22'=>'充值卡');
    }

}
