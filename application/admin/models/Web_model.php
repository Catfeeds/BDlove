<?php
class Web_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->language('common');
    }
    /**
     * 通过表system_config的code值获取站点设置信息
     * 
      */
    public function get_set($code)
    {
        $expression=$this->db->select('id, parent_id, code, value, comments')
        	      ->from('system_config')
        	      ->where_in('code',$code);
        
        $row = $this->db->get()->result_array();
        return $row;
    }
    /**
     * 通过数组$groups获取站点设置信息
     * $parent parent_id
      */
    public function get_settings($parent=null)
    {
        if(empty($parent)){
            $where = " parent_id=1 ";
        }
        
        /* 取出全部数据：分组和变量 */
        $this->db->select('*')
        ->from('system_config')
        ->where($where)
        ->order_by('parent_id, id','ASC');
        $item_list = $this->db->get()->result_array(); 
      
        //print_r($item_list);die;
    
        /* 整理数据 */
        $group_list = array();
        foreach ($item_list AS $key => $item)
        {
            if(!empty($item['code'])){
                $group_list[$item['code']]['value'] = $item['value'];
                $group_list[$item['code']]['comments'] = $item['comments'];
            }
        }
        return $group_list;
    }
    /*获取角色列表*/
    public function get_role_list(){
        $this->db->select('role_id, role_name');
        $this->db->from('admin_role');
        $role_list = $this->db->get()->result_array();
        return $role_list;
    }
    /* 获取权限数组的函数  */
    public function get_action_list(){
        /* 获取权限的分组数据 */       
        $this->db->select('action_id, action_parent_id, action_code, action_relevance,aciton_comment');
        $this->db->from('admin_action');
        $this->db->where('action_parent_id',0);
        $rows = $this->db->get()->result_array();
        $priv_arr= array();
    
        foreach($rows as $row)
        {
            $priv_arr[$row['action_id']] = $row;
        }
        /* 按权限组查询底级的权限名称 */
        $this->db->select('action_id, action_parent_id, action_code, action_relevance,aciton_comment');
        $this->db->from('admin_action');
        $this->db->where("action_parent_id ".db_create_in(array_keys($priv_arr)));
        $privs = $this->db->get()->result_array();
        foreach($privs as $priv)
        {
            $priv_arr[$priv["action_parent_id"]]["priv"][$priv["action_code"]] = array_reverse($priv);
    
        }
        //print_r($priv_arr);exit;
        foreach($priv_arr as $key => $val){
            $priv_arr[$key]['action_name'] = $val['aciton_comment'];
            $priv_arr[$key]['action_id'] = $val['action_id'];
            $priv_arr[$key]['action_parent_id'] = $val['action_parent_id'];
            $priv_arr[$key]['action_code'] = $val['action_code'];
            $priv_arr[$key]['action_relevance'] = $val['action_relevance'];
            if(!empty($val['priv'])){
                foreach($val['priv'] as $ka => $va){
                    $priv_arr[$key]['priv'][$ka]['action_name'] = $va["aciton_comment"];
                    $priv_arr[$key]['priv'][$ka]['action_id'] = $va['action_id'];
                    $priv_arr[$key]['priv'][$ka]['action_parent_id'] = $va['action_parent_id'];
                    $priv_arr[$key]['priv'][$ka]['action_code'] = $va['action_code'];
                    $priv_arr[$key]['priv'][$ka]['action_relevance'] = $va['action_relevance'];
                    $this->db->select('action_id, action_parent_id, action_code, action_relevance,aciton_comment');
                    $this->db->from('admin_action');
                    $this->db->where("action_parent_id=".$va['action_id']);
                    $result = $this->db->get()->result_array();
                    foreach($result as $k => $v){
                        $result[$k]['action_id'] = $v['action_id'];
                        $result[$k]['action_parent_id'] = $v['action_parent_id'];
                        $result[$k]['action_code'] = $v['action_code'];
                        $result[$k]['action_relevance'] = $v['action_relevance'];
                        $result[$k]['action_name'] = $v['aciton_comment'];
                    }
                    $priv_arr[$key]['priv'][$ka]['son_priv']  = $result;
                }
            }else{
                $priv_arr[$key]['priv'][$ka]['action_name'] = '';
                $priv_arr[$key]['priv'][$ka]['action_id'] = '';
                $priv_arr[$key]['priv'][$ka]['action_parent_id'] = '';
                $priv_arr[$key]['priv'][$ka]['action_code'] = '';
                $priv_arr[$key]['priv'][$ka]['action_relevance'] = '';
                $priv_arr[$key]['priv'][$ka]['son_priv']  = array();
            }
            
        }
        return $priv_arr;
    
    }

    /**
     *
     * @param number $where    数据查询条件
     * @param string $type     要查询的类型'sms' 为短信模版，'mail' 为邮件模版，默认为'sms'短信模版
     * return   array          返回一个包含对应id数据的二维数组
     */
    public function get_log($where = NULL, $type = 'sms'){
    
        $log = ($type == 'sms') ? 'sms_log' : (($type == 'mail') ? 'mail_log' : '');
        $query = $this->db->query("select * from {$this->db->dbprefix($log)} where 1 {$where}");
        return $query->result_array();
    }
    
    
    /**
     *
     * @param string $type   要查询的类型'sms' 为短信模版，'mail' 为邮件模版，默认为'sms'短信模版
     */
    public function all_tp($type = 'sms') {
        //获取全部邮件和短信模版
        $template = ($type == 'sms') ? 'sms_templates' : (($type == 'mail') ? 'mail_templates' : '');
        $query = $this->db->query("select * from {$this->db->dbprefix($template)}");
        return $query->result_array();
    }
    
    /**
     * 根据传入id删除数据
     * @param unknown $table        表名
     * @param unknown $name         字段名
     * @param unknown $ids          id
     * @return string[]|boolean[]   返回删除结果
     */
    public function del($table, $name, $ids){
        $sql="delete FROM ".$this->db->dbprefix($table)." where {$name} in(".$ids.")";
        $result = $this->db->query($sql);
        if($result){
            $data=array(
                'msg' => '删除成功',
                'state' => true
            );
        }else{
            $data=array(
                'msg' => '删除失败',
                'state' => false
            );
        }
        return $data;
    }
    
    /**
     * 删除特定时间之前的数据
     * @param unknown $table          表名
     * @param unknown $name           字段名
     * @param unknown $time           规定时间
     * @return string[]|boolean[]     返回删除结果
     */
    public function del_ago($table, $name, $time){
        $sql="delete FROM ".$this->db->dbprefix($table)." where {$name}<'{$time}'";
        $result = $this->db->query($sql);
        if($result){
            $data=array(
                'msg' => '删除成功',
                'state' => true
            );
        }else{
            $data=array(
                'msg' => '删除失败',
                'state' => false
            );
        }
        return $data;
    }
    
    /**
     *根据模版编号获取邮件和短信模版内容
     * @param unknown $tp_id   传入短信或邮件模版的id号
     * @param string $type     要查询的类型'sms' 为短信模版，'mail' 为邮件模版，默认为'sms'短信模版
     * @return array           返回一个包含对应id数据的一维数组
     */
    public function get_tp($tp_id, $type = 'sms') {
         
        $template = ($type == 'sms') ? 'sms_templates' : (($type == 'mail') ? 'mail_templates' : '');
        $query = $this->db->query("select * from {$this->db->dbprefix($template)} where template_id = '{$tp_id}'");
        return $query->row_array();
    }
    /**
     * 通过code获取system_config表中的对应值
     * @param unknown $code  code值
     */
    public function get_system_value($code){
         
        $query = $this->db->query("SELECT value FROM " .$this->db->dbprefix('system_config')." where code='{$code}'");
        $result = $query->row();
        //var_dump($result->value);die;
        if ($result){
            return $result->value;
        }else{
            return false;
        }
    }
    /**
     * 根据code找到并改变value的值
     * @param unknown $code      code值
     * @param unknown $value     value值
     * @return boolean
     */
    public function change_system_value($code, $value)
    {
        $this->db->set('value', $value);
        $this->db->where('code', $code);
        $result = $this->db->update('system_config');
        if ($result){
            return true;
        }else{
            return false;
        }
    }
    /**
     * 获取用户信息
     * @param unknown $user_id  用户id
     * return array             返回用户信息
     */
    public function get_user_msg($user_id) {
         
        $query = $this->db->query("select * from {$this->db->dbprefix('user')} where user_id = '{$user_id}'");
        $result = $query->row_array();
        return $result;
    }
}