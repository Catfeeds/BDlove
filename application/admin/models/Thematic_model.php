<?php
class Thematic_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->language('common');
    }
    //根据Id查询有关专题
    public function get_thematic_info($id)
    {
        $this->db->select('*');
        $this->db->from('cms_special');
        $this->db->where("special_id=$id");
        return $this->db->get()->row_array();
    }

}
