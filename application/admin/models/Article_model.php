<?php
class Article_model extends CI_Model {
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
          $this->db->from('cms_article_class');
          return $this->db->get()->result_array();
    }
    //id查询文章
    public function get_article_info($id)
    {
        $this->db->select('*');
        $this->db->where('article_id',$id);
        $this->db->from('cms_article');
        return $this->db->get()->row_array();
    }
	//根据Id修改文章排序sort
	public function update_article_sort($table,$id,$sort)
    {
          return $this->db->update("$table",array($sort['key']=>$sort['value']),array($id['key']=>$id['value']));
    }
    //查询所有文章标签
    public function get_article_tag()
    {
        $this->db->select('*');
        $this->db->from('cms_tag');
        return $this->db->get()->result_array();
    }
}
    