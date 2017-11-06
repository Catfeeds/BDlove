<?php
class Information_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->language('common');
    }
    //通过id查询会员名称
	public function get_member_name($comment_member_id)
    {
          $this->db->select('*');
          $this->db->from('shop_member');
          $this->db->where("member_id=$comment_member_id");
          $rows = $this->db->get()->row_array();
          return $rows['member_truename'];
    }
    //通过会员名称查询id
	public function get_member_id($member_truename)
    {
          $this->db->select('*');
          $this->db->from('shop_member');
          $this->db->where("member_truename='{$member_truename}'");
          $rows = $this->db->get()->row_array();
          return $rows['member_id'];
    }
	//根据Id修改文章排序sort
	public function update_article_sort($table,$id,$sort)
    {
          return $this->db->update("$table",array($sort['key']=>$sort['value']),array($id['key']=>$id['value']));
          
    }
}
    