<?php
/**
 * GOODS Class
 *goods模型类
 */
class Order_model extends CI_Model {

    public function __construct()
    {
    	parent::__construct();
    }
    //得到授权的店铺
    public function get_auth_stores(){
    	$auth_store = $this->db->distinct()->select('ss.auth_store_id,ss.auth_store_name')
    	->from('store_auth_store ss')->join('store s','s.store_id=ss.auth_store_id')
    	->where('ss.store_id',$_SESSION['shop_spg_store_id'])->where('s.store_state',1)->get()->result_array();
    	return $auth_store;
    }
    //得到授权的品牌
    public function get_brands(){
        $brands = $this->db->distinct()->select('s.brand_id,s.brand_name')->from('store_auth_store ss')
            ->join('shop_brand s','ss.brand_id = s.brand_id')
            ->where('ss.store_id',$_SESSION['shop_spg_store_id'])
            ->order_by('s.brand_sort')->get()->result_array();
    	 return $brands;
    }  
    public function get_sizes(){
    	$sizes = $this->db->select('size')->from('code_segment_size')->where('flag',1)->order_by('sort')->get()->result_array();
    	return $sizes;
    }
    public function get_shop_cart($user_id){
    	$shop_cart = array();
    	if($user_id){
    		$shop_cart = $this->db->select('cart_id,stocks_sn,goods_ea_id,store_id,goods_id,goods_name,goods_num,goods_spec,goods_size_remark,goods_color,goods_color_remark')
    	    ->from('shop_cart')->where('buyer_id',$user_id)->where('user_type',2)->get()->result_array();
    	}
    	return $shop_cart;
    }

    /**
     *
     * @param   获取运费信息   (先根据地区再根据仓库最后选择快递方式)
     * @param    string     $area_id  地区ID(无参数则返回所有的运费信息)
     * @param    string     $store_id  店铺ID
     * @param    string     $express_code  快递的编码(无参数则返回当前地区当前仓库下的所有快递方式的运费信息)
     * @return   void
     * @lxc
     */
    public function get_express_fee_info($area_id, $store_id, $express_code = false, $weight = 0) {
    	$where = " store_id=".$store_id;
    	if($express_code){
    		$where .= " and express_code='{$express_code}'";
    	}
    	//print_r($area_id);print_r($store_id);print_r($weight);print_r($express_code);
    	$express_template = $this->db->select('ept_id,express_code,express_name,default')->from('express_template')
    	->where($where)->get()->result_array();
    	$tpl_id = $this->db->select('group_concat(eptaf_id) as tpl')->from('express_template_attr_fee_area')->where('region_area_id',$area_id)->get()->row('tpl');
    	//print_r($express_template);print_r($tpl_id);
    	if(empty($tpl_id)||empty($express_template)){
    		return false;
    	}
    	foreach ($express_template as $k=>$v){
    		$tpl_fee = $this->db->select('*')->where('ept_id',$v['ept_id'])->where("eptaf_id IN ($tpl_id)")->get('express_template_attr_fee')->row_array();
    		if(empty($tpl_fee)){
    			continue;
    		}
    		if($weight){
    			if($tpl_fee['free_fee_num']>0){
    				if($weight>=$tpl_fee['free_fee_num']){
    					$express_template[$k]['express_fee'] = 0;
    				}elseif($weight>$tpl_fee['first_nums']){
    					$express_template[$k]['express_fee'] = ceil(($weight-$tpl_fee['first_nums'])/$tpl_fee['loan_nums'])*$tpl_fee['loan_fee']+$tpl_fee['first_fee'];
    				}elseif($weight<=$tpl_fee['first_nums']){
    					$express_template[$k]['express_fee'] = $tpl_fee['first_fee'];
    				}
    			}else{
    				if($weight>$tpl_fee['first_nums']){
    				    $express_template[$k]['express_fee'] = ceil(($weight-$tpl_fee['first_nums'])/$tpl_fee['loan_nums'])*$tpl_fee['loan_fee']+$tpl_fee['first_fee'];
    				}elseif($weight<=$tpl_fee['first_nums']){
    					$express_template[$k]['express_fee'] = $tpl_fee['first_fee'];
    				}
    			}
    			$express_template[$k]['express_fee'] = sprintf("%.2f",$express_template[$k]['express_fee']);
    		}
    		foreach ($tpl_fee as $kk=>$vv){
    			$express_template[$k][$kk] = $vv;
    		}
    	}
    	//print_r($express_template);die;
    	return $express_template;
    }
    
    /**
     *
     * @param   获取选中的快递运费信息
     * @param    string     $area_id  地区
     * @param    string     $depot_code  仓库
     * @param    string     $express_code  快递方式
     * @param    string     $weight  重量
     * @return   void
     * @lxc
     */
    public function get_select_express_fee($area_id, $depot_code, $express_code, $weight) {
    	$rows = $this->get_express_fee_info($area_id, $depot_code, $express_code);
    	if (!$rows) {
    		$area_id = $this->CI->db->select('area_parent_id')->where('area_id', $area_id)->get('area')->row('area_parent_id');
    		$rows = $this->get_express_fee_info($area_id, $depot_code, $express_code);
    		if (!$rows) {
    			$area_id = $this->CI->db->select('area_parent_id')->where('area_id', $area_id)->get('area')->row('area_parent_id');
    			$rows = $this->get_express_fee_info($area_id, $depot_code, $express_code);
    			if (!$rows) {
    				$rows = $this->get_express_fee_info(0, $depot_code, $express_code);
    			}
    		}
    	}
    	if ($rows) {
    		$fee = $rows['first_fee'] + $rows['renew'] * ceil(($weight - $rows['first_w']) / $rows['last_w']);
    		return $fee;
    	} else {
    		return false;
    	}
    }
    public function order_type(){
    	return array('1'=>'分销','2'=>'微商','3'=>'电商','4'=>'门店');
    }
    public function order_from(){
    	return array('1'=>'微商城','21'=>'单门店','2'=>'单门店','22'=>'集合店','3'=>'APP','31'=>'APP微商','32'=>'APP批发','41'=>'电商京东','42'=>'电商天猫','43'=>'电商手工','44'=>'电商引流','45'=>'电商引流','46'=>'电商引流');
    }
    public function order_status($type=1){
    	if($type==2){
    		return array('0'=>'已取消','10'=>'待付款','20'=>'待自提','30'=>'待自提','40'=>'待评价','50'=>'已完成');
    	}else{
    		return array('0'=>'已取消','10'=>'待付款','20'=>'待收货','31'=>'部分发货','30'=>'待收货','40'=>'待评价','50'=>'已完成');
    	}
    }
    public function order_status_admin(){
    	return array('0'=>'已取消','10'=>'未付款','20'=>'已付款','31'=>'部分发货','30'=>'已发货','40'=>'已收货','50'=>'已完成');
    }
    public function shipping_type(){
    	return array('1'=>'快递','2'=>'自提');
    }
    public function pay_type(){
    	return array('1'=>'微信','2'=>'线下','3'=>'余额','4'=>'支付宝');
    }
}