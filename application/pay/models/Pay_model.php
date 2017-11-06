<?php
/**
 * GOODS Class
 *goods模型类
 */
class Pay_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function storeInfo(){
        $store_info['storeName'] = empty($_SESSION['shop_dpms_name'])?$_SESSION['shop_spg_nike_name']:$_SESSION['shop_dpms_name'];
        $store_info['storeTel'] = empty($_SESSION['shop_dpms_tel'])?$_SESSION['shop_spg_tel']:$_SESSION['shop_dpms_tel'];
        $store_info['shop_dpms_id'] = $_SESSION['shop_dpms_id'];
        $this->smarty->assign('storeInfo',$store_info);
    }
 
}