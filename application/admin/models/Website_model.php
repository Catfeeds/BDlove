<?php
class Website_model extends CI_Model {
    public function __construct()
    {	
    	parent::__construct();
        $this->load->database();
        $this->load->language('common');
    }
    //查询所有文章分类
	public function get_article_class()
    {
          $this->db->select('*');
          $this->db->from('shop_article_class');
          return $this->db->get()->result_array();
    }
    //查询所有广告位
    public function get_adv_position_name()
    {
        $this->db->select('*');
        $this->db->from('adv_position');
        return $this->db->get()->result_array();
    }
    //根据Id查询有关文章分类
    public function get_article_class_info($id)
    {
        $this->db->select('*');
        $this->db->from('shop_article_class');
        $this->db->where("ac_id=$id");
        return $this->db->get()->row_array();
    }
    //根据Id查询有关文章
    public function get_article_info($id)
    {
        $this->db->select('*');
        $this->db->from('shop_article');
        $this->db->where("article_id=$id");
        return $this->db->get()->row_array();
    }
	//根据Id修改文章排序sort
	public function update_article_sort($table,$id,$sort)
    {
          return $this->db->update("$table",array($sort['key']=>$sort['value']),array($id['key']=>$id['value']));
    }
    //通过类id查询类名称
    public function get_class_name($id)
    {
        $this->db->select('*');
        $this->db->from('shop_article_class');
        $this->db->where("ac_id=$id");
        $rows = $this->db->get()->row_array();
        return $rows['ac_name'];
    }
    //根据Id查询有关服务协议
    public function get_document_info($id)
    {
        $this->db->select('*');
        $this->db->from('shop_document');
        $this->db->where("doc_id=$id");
        return $this->db->get()->row_array();
    }
    //根据Id查询有关导航信息
    public function get_nav_info($id)
    {
        $this->db->select('*');
        $this->db->from('shop_navigation');
        $this->db->where("nav_id=$id");
        return $this->db->get()->row_array();
    }
    //根据广告位Id查询广告
    public function get_adv($id)
    {
        $this->db->select('*');
        $this->db->from('adv');
        $this->db->where("ap_id=$id");
        return $this->db->get()->result_array();
    }
    //根据广告位Id查询广告
    public function get_adv_row($id)
    {
        $this->db->select('*');
        $this->db->from('adv');
        $this->db->where("adv_id=$id");
        return $this->db->get()->row_array();
    }
    //根据Id查询广告位
    public function get_adv_position($id)
    {
        $this->db->select('*');
        $this->db->from('adv_position');
        $this->db->where("ap_id=$id");
        return $this->db->get()->row_array();
    }
    //根据adv_Id查询广告位和广告
    public function get_adv_info($adv_id)
    {
        $this->db->select('*');
        $this->db->from('adv');
        $this->db->where("adv_id=$adv_id");
        $query=$this->db->get()->row_array();
        $ap_id=$query['ap_id'];
        
        $this->db->select('*');
        $this->db->from('adv_position');
        $this->db->where("ap_id= $ap_id");
        $res=$this->db->get()->row_array();
        
        $query['ap_name']=$res['ap_name'];
        $query['ap_class']=$res['ap_class'];
        $query['adv_content']=unserialize($query['adv_content']);
        $query['adv_start_date']=date("Y-m-d",$query['adv_start_date']);
        $query['adv_end_date']=date("Y-m-d",$query['adv_end_date']);
        return  $query;
    }
    /**
     * 通过父级ID遍历商品分类
     * @param type $pid       需要查询子级的分类ID  默认为0
     * @param type $deep      返回数组的深度，1为遍历一级、2为遍历两级，3为遍历3级依次递增。默认为0全部遍历
     * @return type           返回包含商品分类信息的多维数组
     */
    public function get_goods_class($pid = 0,$deep = 0){
        $cates = array();
        $this->db->select('gc_id,gc_name,gc_parent_id,gc_title,gc_keywords,gc_description');
        $this->db->where('gc_show',1);
        $this->db->where('gc_parent_id',$pid);
        $this->db->order_by('gc_sort','ASC');
        $rows = $this->db->get('shop_goods_class')->result_array();
        if(!empty($rows)){
            $deep--;
            foreach ($rows as $k=>$v){
                $cates[$k] = $v;
                if($deep != 0){
                    $cates[$k]['son'] = $this->get_goods_class($v['gc_id'],$deep);
                }
            }
        }
        return $cates;
    }
}
    