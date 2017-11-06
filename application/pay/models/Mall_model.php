<?php
class Mall_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->language('common');
    }
    /**
     * 
     * @param $code = jk_system_config code 的值
     * 返回value的值
     */
    public function get_system_value($code){
        $row = $this->db->select('value')->where('code',$code)->get('system_config')->row('value');
        return $row;
    }
    /**
     * 获取商城支付方式信息
     * @jk_system_config
     * 返回value的值
     */
    public function get_system_payment_value(){
        $payment = $this->db->select('*')->where('type','payment')->get('system_config')->result_array();
        $row = array();
        foreach ($payment as $k=>$v){
            $row[$v['code']]['value'] = unserialize($v['value']);
            $row[$v['code']]['comments'] = $v['comments'];
            $row[$v['code']]['info'] = json_encode($v['value']);
            $row[$v['code']]['state'] = unserialize($v['value'])['state'];
        }
        return $row;
    }
    /**
     * 获取快递信息
     * $id 索引ID
     * $filed 字段
     * @jk_shop_express
     * 返回字段值或者数组
     */
    public function get_express_info($id,$filed=''){
        $filed = empty($filed) ? '*' : $filed;
        if($id){
            $row = $this->db->select($filed)->where('id',$id)->get('express')->row_array();
            return $row;
        }else{
            return null;
        }
        
    }
    /**
     * 获取快递模板信息
     * $id 索引ID
     * $filed 字段
     * @jk_shop_waybill
     * 返回字段值或者数组
     */
    public function get_express_waybill($id,$filed=''){
        $filed = empty($filed) ? '*' : $filed;
        if($id){
            $row = $this->db->select($filed)->where('express_id',$id)->get('express_waybill')->row_array();
            return $row;
        }else{
            return null;
        }
        
    }
    /**
     * 获取快递信息
     *
     */
    public function get_user_express($where=' 1=1 '){
        $this->db->select('et.*,GROUP_CONCAT(a.area_name) as region ')->from('express_template as et')
        ->join('express_template_attr_area as eta','eta.ept_id=et.ept_id')
        ->join('area as a','a.area_id=eta.region_area_id','left')
        ->where($where)
        ->group_by('et.ept_id');
        $rows = $this->db->get()->result_array();
        return $rows;
    }
    /**
     * 获取系统快递信息
     *
     */
    public function get_express($where=' 1=1 '){
        $this->db->select("*,(case when e_state=1 then '启用' when e_state!=1 then '不启用' end)is_status");
        $this->db->from('express');
        $this->db->where($where);
        $rows = $this->db->get()->result_array();
        return $rows;
    }
    /**
     * 获取仓库信息
     *
     */
    public function get_user_depot($where=' 1=1 ',$field=false){
        $field = isset($field) ? $field : '*';
        $this->db->select($field.",(case when status=1 then '启用' when status!=1 then '不启用' end)is_status");
        $this->db->from('depot');
        $this->db->where($where);
        $rows = $this->db->get()->result_array();
        return $rows;
    }
}