<?php
/**
 * 短信以及邮件模版操作类
 * @author yhx
 *
 */
class Sms_mail_model extends CI_Model {
    
   
    
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
        $query = $this->db->query("select * from {$this->db->dbprefix($template)} where type=1");
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
}