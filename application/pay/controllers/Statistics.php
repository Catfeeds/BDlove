<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('pay_model');
    }
    /*---门店支付数据统计--*/
    public function index(){
       $this->pay_model->storeInfo();
	   $this->smarty->display('statistics_index.html');     
	}
	 /*---本门店支付数据统计新--*/
	public function order_statistics_lists(){
	    $this->pay_model->storeInfo();
	   $this->smarty->display('statistics_order_list.html');     
	}
	 /*---已支付订单列表--*/
	public function order_all_pie(){
	    $this->pay_model->storeInfo();
	   $this->smarty->display('statistics_order_all_pie.html');     
	}
}
