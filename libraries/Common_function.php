<?php
/**
 *  Captcha Class
 *公共函数类
 * @lxc
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_function
{
    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
    }

    /**
     * 提交弹出框
     *
     * @access  public
     * @param   string      $msg_detail         数据的唯一值
     * @param   string      $back     默认跳转
     * @param   string      $jump   标题
     * @param   string      $msg_type
     * @param   string      $links   指定跳转
     * @param   string      $auto_redirect   是否手动点击跳转
     * @param   string      $msg_tpl   模板
     *  * @lxc
     */
   public function show_message($msg_detail,$msg_type = 0, $links = array(), $auto_redirect = true, $msg_tpl = 'message.htm') {
        $lang = $this->CI->lang->line('system');
        if (count ( $links ) == 0) {
            $links [0] ['text'] = $lang['go_back'];
            $links [0] ['href'] = 'javascript:history.go(-1)';
        }
        $this->CI->smarty->assign ( 'page_title', $lang['system_message'] );
        $this->CI->smarty->assign('handle_jump', $lang['handle_jump']);
        $this->CI->smarty->assign ( 'msg_detail', $msg_detail );
        $this->CI->smarty->assign ( 'msg_type', $msg_type );
        $this->CI->smarty->assign ( 'links', $links );
        $this->CI->smarty->assign ( 'default_url', json_encode($links[0]['href']));
        $this->CI->smarty->assign ( 'supp_url', $links[0]['href']);
        $this->CI->smarty->assign ( 'auto_redirect', $auto_redirect );
        $this->CI->smarty->assign ( 'errand_store', '操作提示' );
        $this->CI->smarty->display ( $msg_tpl );
        exit ();
   }
   /**
    * 记录管理员的操作内容
    *
    * @access  public
    * @param   string      $sn         数据的唯一值
    * @param   string      $action     操作的类型
    * @param   string      $content    操作的内容
    * @return  void
    */
   public function admin_log($sn = '', $action, $content)
   {

       $lang = $this->CI->lang->line('log_action');
       $log_info = $lang[$action] . $content .': '. addslashes($sn);
       $time = time();
       $data = array(
           'log_time' => $time,
           'admin_id' => $_SESSION['admin_id'],
           'log_content' => stripslashes($log_info),
           'ip' => real_ip(),
           'admin_name' => $_SESSION['admin_name']
       );
       $this->CI->db->insert('admin_log', $data);
   }

   /**
    * 记录shop管理员的操作内容
    *
    * @access  public
    * @param   string      $sn         数据的唯一值
    * @param   string      $action     操作的类型
    * @param   string      $content    操作的内容
    * @return  void
    */
   public function shop_admin_log($sn = '', $action, $content)
   {

       $lang = $this->CI->lang->line('log_action');
       $log_info = $lang[$action] . $content .': '. addslashes($sn);
       $time = time();
       $data = array(
           'log_time' => $time,
           'admin_id' => $_SESSION['shop_admin_id'],
           'log_content' => stripslashes($log_info),
           'ip' => real_ip(),
           'admin_name' => $_SESSION['shop_admin_name']
       );
       $this->CI->db->insert('admin_log', $data);
   }
   /**
     * 写入商城订单日志
     * @param type $order_id          订单id
     * @param type $log_msg           文字描述
     * @param type $log_orderstate    订单状态
     */
//    public function shop_order_log($order_id,$log_msg,$log_orderstate){
//        $inner = array(
//            'order_id'=>$order_id,
//            'log_msg'=>$log_msg,
//            'log_time'=> time(),
//            'log_orderstate'=>$log_orderstate
//        );
//        if (isset($_SESSION['shop_admin_name'])){
//            $inner['log_role'] = $_SESSION['shop_admin_role_name'];
//            $inner['log_user'] = $_SESSION['shop_admin_name'];
//        }elseif(isset($_SESSION['shop_user_name'])){
//            $inner['log_role'] = '用户';
//            $inner['log_user'] = $_SESSION['shop_user_name'];
//        }
//        $this->CI->db->insert('shop_order_log',$inner);
//    }
   /**
    * 记录用户操作日志
    *
    * @param    string     $user_name       用户名
    * @param    string     $user_type    用户类型  1为分销商2为供应商3为直营商4为商城用户5为商城管理员
    * @param    string     $log_type     日志类型  1为登录日志2基础日志3订单日志4财务日志
    * @param    string     $url             操作
    * @return   void
    * @author gjd
    */
   public function insertUserLog ($log_content, $user_type,  $log_type,  $url='') {
        if($user_type == 1){//门店操作
            $user_id = $_SESSION['shop_spg_id'];
            $store_id = $_SESSION['shop_spg_store_id'];
            $user_name =  $_SESSION['shop_spg_name'];
        }elseif ($user_type == 2){//
            $user_id = $_SESSION['user_id'];
            $user_name =  $_SESSION['user_name'];
        }elseif($user_type == 4){
            $user_id = $_SESSION['shop_user_id'];
            $user_name =  $_SESSION['shop_user_name'];
        }elseif($user_type == 5){
            $user_id = $_SESSION['shop_admin_id'];
            $user_name =  $_SESSION['shop_admin_name'];
        }
       $time = time();
       $ip = real_ip();
       if($log_type == '1'){
           
           $ip_info = $this->get_area_info_by_ip($ip);
           $login_province =  $ip_info['region'];
           $login_city = $ip_info['city'];
           //记录登录信息到用户表
           if($user_type==1){
	           	$sql = " update ".$this->CI->db->dbprefix('user')." as a inner join ".$this->CI->db->dbprefix('user')." as b
	           	on a.user_id=b.user_id set a.member_login_num=b.member_login_num+1,a.member_login_time=$time,
	           	a.member_login_ip='{$ip}',a.member_old_login_ip=b.member_login_ip where a.user_id='{$user_id}'";
           }
          
           //$this->CI->db->query($sql);
       }else{
           $login_province = '';
           $login_city = '';
       }
       $data = array(
           'user_id' => $user_id ,
           'log_content' => $log_content ,
           'log_time' =>  $time ,
           'user_name' => $user_name,
           'ip' => real_ip(),
           'url' =>$url,
           'user_type' => $user_type,
           'log_type' => $log_type,
           'login_province' => $login_province,
           'login_city' => $login_city
       );
       if($user_type==1){
       	  unset($data['user_id']);
       	  $data['spg_id'] = $user_id;$data['store_id'] = $store_id;
       	  $this->CI->db->insert('guide_log', $data);
       }else{
       	  $this->CI->db->insert('user_log', $data);
       }
      
   }

   /**
    *根据模版编号获取邮件和短信模版内容
    * @param unknown $tp_code   传入短信或邮件模版的code号
    * @param string $type     要查询的类型'sms' 为短信模版，'mail' 为邮件模版，默认为'sms'短信模版
    * @return array           返回一个包含对应id数据的一维数组
    */
   public function get_tp($tp_code, $type = 'sms') {

       $template = ($type == 'sms') ? 'sms_templates' : (($type == 'mail') ? 'mail_templates' : '');
       $query = $this->CI->db->query("select * from {$this->CI->db->dbprefix($template)} where template_code = '{$tp_code}'");
       return $query->row_array();
   }

   /**
    * 通过code获取system_config表中的对应值
    * @param unknown $code  code值
    */
   public function get_system_value($code){

       $query = $this->CI->db->query("SELECT value FROM " .$this->CI->db->dbprefix('system_config')." where code='{$code}'");
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
       $this->CI->db->set('value', $value);
       $this->CI->db->where('code', $code);
       $result = $this->CI->db->update('system_config');
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

       $query = $this->CI->db->query("select * from {$this->CI->db->dbprefix('user')} where user_id = '{$user_id}'");
       $result = $query->row_array();
       return $result;
   }





    /**
     * 获取短信发送信息人的名称 yu update
     * @param unknown $user_id  用户id
     * return array             返回用户信息
     */
    public function get_duanxin_send_name($send_user_id,$login_user_type) {

        if($login_user_type=='2'){
            $query = $this->CI->db->query("select spg_id as id,spg_name as name from {$this->CI->db->dbprefix('store_shopping_guide')} where spg_id= '{$send_user_id}'");
            $result = $query->row_array();
            return $result;
        }elseif($login_user_type=='1'){
            $query = $this->CI->db->query("select admin_id as id,admin_name as name from {$this->CI->db->dbprefix('admin')} where admin_id= '{$send_user_id}'");
            $result = $query->row_array();
            return $result;
        }

    }










   /**
    * 获取查询数据总条数
    * @param unknown $table       表名
    * @param string  $where       查询条件
    * @return number              返回查询到的数据条数
    */
   public function total($table, $where = ' 1=1 '){
       $query = $this->CI->db->query("select count(1) as num from ".$this->CI->db->dbprefix($table)." where {$where} ");
       $result = $query->row('num');
       //var_dump($result);die;
       return $result;
   }

   /**
    * 取得表中满足条件的所有行
    * @param unknown $table     表名
    * @param string $where      查询条件
    * @return unknown           返回一个二位数组结果集
    */
   public function get_rows($table, $where = ' 1') {
       $sql = "select * from ".$this->CI->db->dbprefix($table)." where ".$where;
       $rows = $this->CI->db->query($sql)->result_array();
       return $rows;
   }

    public function get_max_sort($table) {
        $sql = "select sort from ".$this->CI->db->dbprefix($table)." WHERE parent_id=0 ORDER BY sort DESC LIMIT 1";
        $rows = $this->CI->db->query($sql);
        $sort = $rows->row();
        //var_dump($sort);
        return $sort == null?0:$sort->sort;
    }

    public function get_parent_sort($table,$parentid = '') {
        $sql = "select sort from ".$this->CI->db->dbprefix($table)." WHERE catetag_id=".$parentid;
        $rows = $this->CI->db->query($sql);
        $sort = $rows->row();
        //var_dump($sort);
        return $sort->sort;
    }

    public function get_parent_max_sort($table,$parentid = ''){
        $sql = "select sort from ".$this->CI->db->dbprefix($table)." WHERE parent_id=".$parentid." ORDER BY sort DESC LIMIT 1";
        $rows = $this->CI->db->query($sql);
        $sort = $rows->row();
        //var_dump($sort);
        return $sort == null?0:$sort->sort;
    }

    public function get_node_num($table,$parentsort = 0,$value = 0) {
        $addparentsort = $parentsort+$value;
        $sql = "select sort from ".$this->CI->db->dbprefix($table)." WHERE sort>".$parentsort." AND sort<".$addparentsort;
        $rows = $this->CI->db->query($sql);
        $num = $rows->result_array();
        return $num;
    }

    public function sort_array_deal($array = '',$sizenum = 0){
       $allsort = array();
       foreach ($array as $val){
           foreach ($val as $sort){
                $data = explode('.',$sort/100);
                $sortarray = $data[1];
                if($data[1] >= 10)
                $sortarray = explode('.',$data[1]/10);

                if($sizenum == 10 && !in_array($sortarray[0],$allsort)){
                    $allsort[] = $sortarray[0];
                }
               if($sizenum == 100){
                   $allsort[] = $sortarray[1];
               }
           }
       }
       return count($allsort);
    }


   /**
    * 取得表中满足条件的第一行
    * @param unknown $table    表名
    * @param unknown $where    查询条件
    * @return unknown          返回一个一维数组
    */
   public function get_row($table, $where){
       $sql = "select * from ".$this->CI->db->dbprefix($table)." where ".$where;
       $row = $this->CI->db->query($sql)->row_array();
       return $row;
   }
   /**
    * 取得表中单个字段的值
    * @param unknown $table    表名
    * @param unknown $where    查询条件
    * @param unknown $field    查询条件
    * @return unknown          返回一个结果数据
    */
   public function get_one($table, $where,$field){
       $sql = "select ".$field." from ".$this->CI->db->dbprefix($table)." where ".$where;
       $row = $this->CI->db->query($sql)->row($field);
       return $row;
   }

   /**
    * 将错误的表格填充为红色
    * @param $objPHPExcel     PHPEXCEL引用
    * @param $cell   		        填充表格所在位置
    */
   public function wrong_cell(&$objPHPExcel, $cell) {
   	   $objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_RED ) );//设置颜色为
       //$objPHPExcel->getActiveSheet ()->getStyle ( $cell )->getFill ()->setFillType ( PHPExcel_Style_Fill::FILL_SOLID );
       //$objPHPExcel->getActiveSheet ()->getStyle ( $cell )->getFill ()->getStartColor ()->setARGB ( 'FFFF0000' );
   }
   /**
    * 判断系统管理员对某一个操作是否有权限.
    *
    * 根据当前对应的action_code，然后再和用户session里面的action_list做匹配，以此来决定是否可以继续执行。
    *
    * @param string $priv_str	操作对应的priv_str
    * @param string $msg_type 返回的类型
    * @return true/false
    *  * @lxc
    */
   public function admin_priv($priv_str, $msg_output = true) {
       //检查是否登录过 如果没有直接跳入登录
       // php 判断是否为 ajax 请求

       if ((!isset($_SESSION['admin_id']) || intval($_SESSION['admin_id']) <= 0))
       {
           if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
               echo json_encode(array('state'=>'403','msg'=>'登录已过期请重新登录','data'=>''));exit;// ajax 请求的处理方式
           }else{
               header("location:".base_url("admin.php/login"));
               exit();// 正常请求的处理方式
           };
       }
       $lang = $this->CI->lang->line('system');
       if ($_SESSION ['action_list'] == 'all') {
           return true;
       }
       if (strpos ( ",{$_SESSION ['action_list']},", ",{$priv_str}," ) === false){
           $links [] = array (
               'text' => $lang ['go_back'],
               'href' => 'javascript:history.back(-1)'
           );
           if ($msg_output) {
               $this->show_message( $lang ['priv_error'], 1, $links );
           }
           return false;
       } else {
           return true;
       }
   }
   public function shop_user_is_login() {
       if(!isset($_SESSION['shop_user_name'])&&!isset($_SESSION['shop_user_id'])&&$_SESSION['shop_user_id']<=0){
            if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
                echo json_encode(array('state'=>'403','msg'=>'登录已过期请重新登录'));exit;// ajax 请求的处理方式
                exit;
            }
            elseif(empty($_SESSION['sessionid']) || empty($_COOKIE['PHPSESSID'])){
                header("location:".base_url("index.php/index/login"));
                exit();
            }

        }
   }

   /**
    * 判断商城管理员对某一个操作是否有权限.
    *
    * 根据当前对应的action_code，然后再和用户session里面的action_list做匹配，以此来决定是否可以继续执行。
    *
    * @param string $priv_str	操作对应的priv_str
    * @param string $msg_type 返回的类型
    * @return true/false
    *  * @lxc
    */
   public function shop_admin_priv($priv_str, $msg_output = true) {
       //检查是否登录过 如果没有直接跳入登录
       // php 判断是否为 ajax 请求

       if ((!isset($_SESSION['shop_admin_id']) || intval($_SESSION['shop_admin_id']) <= 0))
       {
           if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
               echo json_encode(array('state'=>403,'msg'=>'登录已过期请重新登录'));exit;// ajax 请求的处理方式
           }else{
               header("location:".base_url("admin.php/index/login"));
               exit();// 正常请求的处理方式
           };
       }
       $lang = $this->CI->lang->line('system');
       if ($_SESSION ['shop_admin_action_list'] == 'all') {
           return true;
       }
       if (strpos ( ",{$_SESSION ['shop_admin_action_list']},", ",{$priv_str}," ) === false){
           $links [] = array (
               'text' => $lang ['go_back'],
               'href' => 'javascript:history.back(-1)'
           );
           if ($msg_output) {
               $this->show_message( $lang ['priv_error'], 1, $links );
           }
           return false;
       } else {
           return true;
       }
   }
   /**
    * 判断代理商管理员对某一个操作是否有权限.
    *
    * 根据当前对应的action_code，然后再和用户session里面的action_list做匹配，以此来决定是否可以继续执行。
    *
    * @param string $priv_str	操作对应的priv_str
    * @param string $msg_type 返回的类型
    * @return true/false
    *  * @lxc
    */
   public function agent_priv($priv_str, $msg_output = true) {

       //检查是否登录过 如果没有直接跳入登录
       if ((!isset($_SESSION['user_id']) || intval($_SESSION['user_id']) <= 0) )
       {
           if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
               echo json_encode(array('state'=>403,'msg'=>'登录已过期请重新登录'));exit;// ajax 请求的处理方式
           }else{
               header("location:".base_url("index.php/login"));
               exit();// 正常请求的处理方式
           };


       }else{
           $status = $this->CI->db->select('is_status')->where('user_id',$_SESSION['user_id'])->get('user')->row('is_status');
           if($status!=1){
               if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                   echo json_encode(array('state'=>403,'msg'=>'你的账号已停用,请联系管理员！！！'));exit;// ajax 请求的处理方式
               }else{
                           $links [] = array (
                               'text' => '退出登录',
                               'href' => base_url("index.php/login")
                           );
                           if ($msg_output) {
                               $this->show_message( '你的账号已停用请联系管理员！！！', 1, $links );
                           }
                           return false;
               };
           }
       }
       $lang = $this->CI->lang->line('system');
       if ($_SESSION ['user_action_list'] == 'all') {
           return true;
       }
       if (strpos ( ",{$_SESSION ['user_action_list']},", ",{$priv_str}," ) === false){
           $links [] = array (
               'text' => $lang ['go_back'],
               'href' => 'javascript:history.back(-1)'
           );
           if ($msg_output) {
               $this->show_message( $lang ['priv_error'], 1, $links );
           }
           return false;
       } else {
           return true;
       }
   }
   /**
    * 判断供应商管理员对某一个操作是否有权限.
    *
    * 根据当前对应的action_code，然后再和用户session里面的action_list做匹配，以此来决定是否可以继续执行。
    *
    * @param string $priv_str	操作对应的priv_str
    * @param string $msg_type 返回的类型
    * @return true/false
    *  * @lxc
    */
   public function supplier_priv($priv_str, $msg_output = true) {
       //检查是否登录过 如果没有直接跳入登录
       if ((!isset($_SESSION['user_id']) || intval($_SESSION['user_id']) <= 0))
       {
           if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
               echo json_encode(array('state'=>403,'msg'=>'登录已过期请重新登录'));exit;// ajax 请求的处理方式
           }else{
               header("location:".base_url("supplier.php/login"));
               exit();// 正常请求的处理方式
           };


       }else{
           $status = $this->CI->db->select('is_status')->where('user_id',$_SESSION['user_id'])->get('user')->row('is_status');
           if($status!=1){
               if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                   echo json_encode(array('state'=>403,'msg'=>'你的账号已停用,请联系管理员！！！'));exit;// ajax 请求的处理方式
               }else{
                           $links [] = array (
                               'text' => '退出登录',
                               'href' => base_url("supplier.php/login")
                           );
                           if ($msg_output) {
                               $this->show_message( '你的账号已停用请联系管理员！！！', 1, $links );
                           }
                           return false;
               };
           }
       }
       $lang = $this->CI->lang->line('system');
       if ($_SESSION ['supplier_action_list'] == 'all') {
           return true;
       }
       if (strpos ( ",{$_SESSION ['supplier_action_list']},", ",{$priv_str}," ) === false){
           $links [] = array (
               'text' => $lang ['go_back'],
               'href' => 'javascript:history.back(-1)'
           );
           if ($msg_output) {
               $this->show_message( $lang ['priv_error'], 1, $links );
           }
           return false;
       } else {
           return true;
       }
   }
   /**
    * 获取地区信息：省市区
    * 根据父级ID获取下级地区信息
    * @param $parent_id 父级ID
    * @param $area_deep 深度
    */
   public function get_area($parent_id=0,$area_deep=false) {
       if($area_deep){
           $where = "area_deep=".$area_deep." and area_parent_id=".$parent_id;
       }else{
           $where = "area_parent_id=".$parent_id;
       }
       $this->CI->db->select('area_id,area_name');
       $this->CI->db->from('area');
       $this->CI->db->where($where);
       $this->CI->db->order_by('area_id','ASC');
       $area = $this->CI->db->get()->result_array();
       return $area;
   }
   /**
    * 通过地区名和父级获取地区ID
    * @param unknown $area_name      地区名
    * @param number $parent_id       父级地区ID
    * @return boolean
    */
   public function find_a_area_id($area_name, $parent_id = 0){
       $this->CI->db->select('area_id')
                    ->from('area')
                    ->like('area_name', $area_name)
                    ->or_where('area_name', $area_name)
                    ->where('area_parent_id', $parent_id);
       $row = $this->CI->db->get()->row();
       if (!empty($row)){
           return $row->area_id;
       }else{
           return false;
       }
   }
   /**
    * 获取省市区ID数组
    * @param unknown $province   省名
    * @param unknown $city       市名
    * @param unknown $area       区/县名
    * @return array              array($province_id, $city_id, $area_id)
    */
   public function find_three_area_id($province, $city, $area){
       $province_id = $this->find_a_area_id($province);
       if ($province_id){
           $city_id = $this->find_a_area_id($city, $province_id);
           if ($city_id){
               $area_id = $this->find_a_area_id($area, $city_id);
               if ($area_id){
                   return array($province_id, $city_id, $area_id);
               }
           }
       }
       return false;
   }
   /*
    *根据area_id获取对应的area_name
    * @param $area_id
    *  */
   public function get_area_name($area_id)
   {
       $this->CI->db->select('area_name')->from('area')->where('area_id', $area_id);
       $row = $this->CI->db->get()->row();
       if (!empty($row)){
           return $row->area_name;
       }else{
           return false;
       }
   }
   /**
    *
    * 获取货品子分类：id和名字；
    *根据父级ID获取所有下级货品子分类信息
    * @param $cate_id 父级ID
    */
   public function get_son_cate($cate_id=0,$data=array()) {
       $cate = $this->CI->db->select('gc_id,gc_name')->from('shop_goods_class')->where('gc_parent_id',$cate_id)->get()->result_array();
       if(!empty($cate)){
           $data = array_merge_recursive($cate,$data);
           foreach ($data as $k=>$v){

               $son_data=array();
               $son_data = $this->get_son_cate($v['gc_id'],$son_data);
               if(!empty($son_data)){
                   $data = array_merge_recursive($son_data,$data);
               }

           }
           return $data;
       }else{
           return $data;
       }
   }
   /**
    *
    * 获取颜色子分类：id和名字；
    *根据父级ID获取所有下级颜色分类信息
    * @param $color_id 父级ID
    */
   public function get_son_color($color_id=0,$data=array()) {
       $cate = $this->CI->db->select('cl_id,cl_name')->where('cl_parent_id',$color_id)->get('shop_color')->result_array();
       if(!empty($cate)){
           $data = array_merge_recursive($cate,$data);
           foreach ($data as $k=>$v){

               $son_data=array();
               $son_data = $this->get_son_cate($v['cl_id'],$son_data);
               if(!empty($son_data)){
                   $data = array_merge_recursive($son_data,$data);
               }

           }
           return $data;
       }else{
           return $data;
       }
   }
   /**
    *
    * 获取货品父分类：id和名字；
    *根据子ID获取所有上级货品子分类信息
    * @param $cate_id 子ID
    */
   public function get_parent_cate($cate_id) {
       if(empty($cate_id)){
           return false;
       }else{
           $cate = $this->CI->db->select('pc.gc_id,pc.gc_name')
           ->from('shop_goods_class as p')->join('shop_goods_class as pc','pc.gc_id=p.gc_parent_id','left')
           ->where('p.gc_id',$cate_id)->get()->row_array();
          return $cate;
       }
   }
   public function get_parents_cate($cate_id,$data=array()) {
       if(empty($cate_id)){
           return $data;
       }else{
           $cate = $this->get_parent_cate($cate_id);
           if(!empty($cate['gc_id'])){
               $data[] = $cate;
               return $this->get_parents_cate($cate['gc_id'],$data);
           }else{
               return $data;
           }
       }
   }


   /**
    * 获取用户所属主用户id
    * @param unknown $user_id     当前用户id
    * @return unknown|mixed       返回所属用户ID
    */
   public function parent_user($user_id){
       $this->CI->db->select('*')
            ->from('user')
            ->where('user_id', $user_id);
       $user = $this->CI->db->get()->row_array();
       if (empty($user['under_user_id'])){
           return $user_id;
       }else {
           $this->parent_user($user['under_user_id']);
       }
   }
   /**
    * 设置订单号前缀
    * @return  void
    */
   public function set_order_prefix()
   {
       return 'lnshop';
   }
   /**
    * 非导入产生一个订单号
    * $user_id 门店ID或者用户ID或者仓库编吗
    * @return number
    */
   public function produce_order_sn($user_id=''){
      
           //记录生成子订单的个数，如果生成多个子订单，该值会累加
           static $num;
           if (empty($num)) {
               $num = 1;
           } else {
               $num ++;
           }
           //门店2位；时间9位；毫秒2位，随机数2位，num1位 共16位；
           return  mt_rand(10,99).sprintf('%02d',$user_id).sprintf('%09d',time()-946656000).sprintf('%02d', (float) microtime() * 100).($num%10);

   }
   /**
    * 导入或定时同步产生一个订单号
    * @return number
    */
   public function produce_order_sn_import(){
       $user_id = $_SESSION['under_user_id'];
       $time = time();
       $year = date('Y',$time);
       $month = date('m',$time);
       $arr = array('01'=>'A','02'=>'B','03'=>'C','04'=>'D','05'=>'E','06'=>'F',
           '07'=>'G','08'=>'H','09'=>'I','10'=>'J','11'=>'K','12'=>'L',
       );
       $time_day = strtotime($year.'/'.$month.'/01');
       $date = substr($year,3);
       $depfrix = $this->set_order_prefix();
       $depfrix = $depfrix.$date.$arr[$month];
       $u_id = sprintf('%03d', (int) $user_id % 1000);
       $uu_id = $u_id%100000;
       $total = $this->CI->db->select('count(1) as num')->where(" (buyer_id like '%$u_id%' or  buyer_id=$user_id or buyer_id=$uu_id ) and create_time>=$time_day and create_time<=$time and order_sn like '%$depfrix%'")->get('order')->row('num');//当月的已有订单量
       $total = $total+1;
       $order_sn = $total;
       return array('number'=>$order_sn,'prefix'=>$depfrix.$u_id.mt_rand(0,9));
   }

   /**
    * 生成支付单编号(两位随机 + 从2000-01-01 00:00:00 到现在的秒数+微秒+会员ID%1000)，该值会传给第三方支付接口
    * 长度 =2位 + 10位 + 3位 + 3位  = 18位
    * 1000个会员同一微秒提订单，重复机率为1/100
    * @return string
    */
   public function makePaySn($user_id) {
       return mt_rand(10,99)
       . sprintf('%010d',time() - 946656000)
       . sprintf('%03d', (float) microtime() * 1000)
       . sprintf('%03d', (int) $user_id % 1000);
   }
   /**
    * 站内信发送
    * $content 信息内容
    * $user_id 信息发送对象 （用户ID 多个为数组）
    * $user_type 信息接收者用户类型 （1为供应商，2为分销商，3为直营商）
    * $type 信息类型 （1为系统消息，2为订单消息，3为财务消息）
    * $send_user 发送者（0为 系统发送 由事物驱动；不为零由管理员发送，一般为群发）
    * @return number
    */
   public function web_sms_send($content,$user_id,$user_type,$type=1,$send_user=0){
      //$this->CI->db->select('template_code,template_id,template_content')->from('message_templates')->where('template_code',$tpl);
      //$tpl_info = $this->CI->db->get()->row_array();
       $send_user = ($send_user=='0') ? '0': $_SESSION['admin_id'];
      if($content&&$user_id&&!empty($content)&&!empty($user_id)){
          $flag = true;
          if(is_array($user_id)){
              $arr0 = array('send_time'=>time(),'send_message'=>$content,
                  'send_admin_id'=>$send_user
              );
              $this->CI->db->insert('message_text',$arr0);
              $id = $this->CI->db->insert_id();

              if($id){

                  foreach ($user_id as $v){
                      $arr = array('send_user_id'=>$send_user,'rec_user_id'=>is_array($v) ? $v['user_id'] : $v,
                          'message_id'=>$id,'satus'=>0,'type'=>$type,'rec_user_type'=>$user_type
                      );

                      $re = $this->CI->db->insert('message',$arr);
                      if(!$re){
                          $flag = false;
                      }
                  }

              }else{
                  return false;
              }

          }else{
              $user_id = intval($user_id);
              $arr0 = array('send_time'=>time(),'send_message'=>$content,
                  'send_admin_id'=>$send_user
              );
              $this->CI->db->insert('message_text',$arr0);
              $id = $this->CI->db->insert_id();
              if($id){
                  $arr = array('send_user_id'=>$send_user,'rec_user_id'=>$user_id,
                      'message_id'=>$id,'satus'=>0,'type'=>$type,'rec_user_type'=>$user_type
                  );
                  $re = $this->CI->db->insert('message',$arr);
                  if(!$re){
                      $flag = false;
                  }
              }else{
                  return false;
              }

          }
          if($flag){
              return true;
          }else{
              return false;
          }

      }else{
          return false;
      }
   }
   /**
    * 记录订单售后日志
    *
    * @param    string     $aftersale_id    售后ID
    * @param    string     $type            售后类型
    * @param    string     $log_content     日志内容
    * @param    string     $user_type       操作人类型,1为代理商，2为供应商，3为直营商，4管理员，5为API接口
    * @param    string     $note            日志备注 默认为空
    * @return   void
    * @author gjd
    */
   public function insert_after_sale_Log ($aftersale_id, $aftersale_type, $log_content, $user_type, $note ='' ) {
       if($user_type == 1){
           $user_id = $_SESSION['user_id'];
       }elseif ($user_type == 2){
           $user_id = $_SESSION['user_id'];
       }elseif($user_type == 4){
           $user_id = $_SESSION['admin_id'];
       }
       $time = time();
       $data = array(
           'aftersale_id' => $aftersale_id ,
           'type' => $aftersale_type ,
           'content' =>  $log_content ,
           'note' => $note,
           'operation_time' => $time,
           'operation_user_id' =>$user_id,
           'operation_user_type' => $user_type
       );
       $this->CI->db->insert('aftersales_log', $data);
   }
   /**
    * 记录订单日志
    *
    * @param    string     $order_sn       订单号
    * @param    string     $log_content    日志内容
    * @param    string     $user_type      操作人类型,1为管理员，2为分销商，3为供应商，4为商城用户,5为商城管理员
    * @return   void
    * @author gjd
    */
   public function insert_order_log ($order_sn, $log_content, $user_type) {
       if($user_type == 1){
           $log_user = $_SESSION['shop_admin_id'];
       }
       $order_info = $this->CI->db->select('order_status')->from('shop_order')->where('order_sn',$order_sn)->get()->row_array();
       $time = time();
       $data = array(
           'order_sn' => $order_sn ,
           'log_msg' => $log_content ,
           'log_time' =>  $time ,
           'log_role' => $user_type,
           'log_user' => $log_user,
           'log_orderstate' =>$order_info['order_status']
       );
       $this->CI->db->insert('shop_order_log', $data);
   }
   /**
    * 查询仓库的授权品牌
    *
    * @param    string or array     $depot_code       仓库编码
    * @return   array
    * @author   gjd
    */
   public function get_brands_by_depot($depot_code) {
       if(!is_array($depot_code)){
           $depot_code = explode(',', $depot_code);
       }
       $this->CI->db->select('bd.brand_code,bd.brand_name');
       $this->CI->db->from('brands as bd');
       $this->CI->db->join('depot_attr_brands as dab', 'bd.brand_code=dab.brand_code','left');
       $this->CI->db->where('bd.status',1);
       if(!empty($depot_code)){
           $this->CI->db->where_in('dab.depot_code',$depot_code);
       }
       $this->CI->db->group_by('bd.brand_code');
       $brands = $this->CI->db->get()->result_array();
       return $brands;
   }

    /**
     * 获取广告
     * @param unknown $adp       广告位id
     * @param unknown $type      广告类型，0为单图， 1为多图
     * @return boolean           类型为0时返回一维数组， 1时返回二维数组
     */
    public function get_ad($adp_id, $type){
        $sql="SELECT a.ad_code,p.ad_width,p.ad_height, a.ad_name, a.ad_link
            from ".$this->CI->db->dbprefix("ad")." a
        	LEFT JOIN ".$this->CI->db->dbprefix("ad_position")." p
        	on a.position_id=p.position_id
        	where p.position_id='{$adp_id}'";
        if ($type == 0){
            $sql .= "limit 1";
            return $this->CI->db->query($sql)->row_array();
        }elseif ($type == 1){
            return $this->CI->db->query($sql)->result_array();
        }
        return false;
    }
    /**
     * 获取关于我们的信息
     * @param   type   内容类型（about_us：关于我们；contact_us:联系我们；two_code:二维码）
     * @param   code   标题(WHO)
     * @param   value   具体内容(xxx公司成立于。。。)
     * @param   comments   标题说明(我们是谁？)
     * @return array
     */
    public function get_about_us($title){
        $info = $this->CI->db->select('*')->where('title',$title)->get('system_info')->row_array();
        $info['value'] = unserialize($info['content']);
        return $info;
    }
    /**
     * 获取货品所有分类.
     * 通过父级ID获取分类
     * @param int $level_num 若为1 获取父级下的一级子分类 若为0 获取全部分类
     * @param
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     * * @author   lxc
     */
    public function get_cate_by_parent_id($parent_id=0,$i = 0){
        $i++;
        $cate = array();
        $where = 'gc_parent_id ='.$parent_id .' order by gc_sort DESC';
        $rows = $this->get_rows('shop_goods_class', $where);
        if($rows && !empty($rows)){
            foreach ($rows as $k => $v){
                if($v['gc_parent_id']==0){
                    $cate[$v['gc_id']]['parent_name'] = '-请选择-';
                }else{
                    $parent = $this->get_row('shop_goods_class', 'gc_id='.$v['gc_parent_id']);
                    $cate[$v['gc_id']]['parent_name'] = $parent['gc_name'];
                }
                $cate[$v['gc_id']]['gc_id'] = $v['gc_id'];
                $cate[$v['gc_id']]['gc_parent_id'] = $v['gc_parent_id'];
                $cate[$v['gc_id']]['gc_name'] = $v['gc_name'];
                $cate[$v['gc_id']]['deep'] = $i;
                /* $cate[$v['gc_id']]['sort'] = $v['sort'];
                $cate[$v['gc_id']]['status'] = $v['status'];
                $cate[$v['gc_id']]['deep'] = $i; 
                if($v['status']==1){
                    $cate[$v['gc_id']]['is_status'] = '是';
                }else{
                    $cate[$v['gc_id']]['is_status'] = '否';
                }
                $cate[$v['gc_id']]['admin_name'] = $v['add_user_id'];
                $cate[$v['gc_id']]['add_time'] = $v['add_time'];*/
                $this->CI->db->select("count(*) as num");
                $this->CI->db->from('shop_goods_class');
                $this->CI->db->where(" gc_parent_id = ".$v['gc_id']);
                $data = $this->CI->db->get()->row_array();
                if($data['num']>0){
                    $cate[$v['gc_id']]['son_cate'] = $this->get_cate_by_parent_id($v['gc_id'],$i);
                }else{
                    $cate[$v['gc_id']]['son_cate'] = array();
                }
            }
        }

        return $cate;

    }
    /** 得到一个所有分类构成的下拉框
     * $cate_id 选中的id
     * $level 确定分类需要的空格
     * 返回 '<option></option><option selected></option><option></option>'
     * @author   lxc
     */

    public function cate_array_to_option($array, $cate_id = 0, $level = -1, $str = '')
    {
        if (!is_array ($array))
        {
            return false;
        }
        $level = $level + 1;
        foreach($array as $key => $val){
            $str .= "<option value='". $val['gc_id']. "' ";
            if($val['gc_id'] == $cate_id){
                $str .= "selected";
            }
            $str .= ">".str_repeat('&nbsp;', $level * 4) .'|--'.$val['gc_name'] ."</option>";

            $son_str = '';
            if(isset($val['son_cate']) )
            {
                if(is_array($val['son_cate'])){
                    $son_str .= $this->cate_array_to_option ($val['son_cate'], $cate_id, $level, $son_str);
                }

            }
            $str .= $son_str;
        }

        return $str;
    }
    /**
     * 获取颜色所有分类.
     * 通过父级ID获取分类
     * @param int $level_num 若为1 获取父级下的一级子分类 若为0 获取全部分类
     * @param
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     * * @author   lxc
     */
    public function get_color_by_parent_id($parent_id=0,$i = 0){
        $i++;
        $cate = array();
        $where = 'cl_parent_id ='.$parent_id .' order by cl_sort DESC';
        $rows = $this->get_rows('shop_color', $where);
        if($rows && !empty($rows)){
            foreach ($rows as $k => $v){
                if($v['cl_parent_id']==0){
                    $cate[$v['cl_id']]['parent_name'] = '-请选择-';
                }else{
                    $parent = $this->get_row('shop_color', 'cl_id='.$v['cl_parent_id']);
                    $cate[$v['cl_id']]['parent_name'] = $parent['cl_name'];
                }
                $cate[$v['cl_id']]['cl_id'] = $v['cl_id'];
                $cate[$v['cl_id']]['cl_parent_id'] = $v['cl_parent_id'];
                $cate[$v['cl_id']]['cl_name'] = $v['cl_name'];
                $cate[$v['cl_id']]['deep'] = $i;
                /* $cate[$v['gc_id']]['sort'] = $v['sort'];
                $cate[$v['gc_id']]['status'] = $v['status'];
                $cate[$v['gc_id']]['deep'] = $i; 
                if($v['status']==1){
                    $cate[$v['gc_id']]['is_status'] = '是';
                }else{
                    $cate[$v['gc_id']]['is_status'] = '否';
                }
                $cate[$v['gc_id']]['admin_name'] = $v['add_user_id'];
                $cate[$v['gc_id']]['add_time'] = $v['add_time'];*/
                $this->CI->db->select("count(*) as num");
                $this->CI->db->from('shop_color');
                $this->CI->db->where(" cl_parent_id = ".$v['cl_id']);
                $data = $this->CI->db->get()->row_array();
                if($data['num']>0){
                    $cate[$v['cl_id']]['son_cate'] = $this->get_color_by_parent_id($v['cl_id'],$i);
                }else{
                    $cate[$v['cl_id']]['son_cate'] = array();
                }
            }
        }

        return $cate;

    }
    /** 得到一个所有颜色构成的下拉框
     * $cate_id 选中的id
     * $level 确定分类需要的空格
     * 返回 '<option></option><option selected></option><option></option>'
     * @author   lxc
     */

    public function color_array_to_option($array, $cate_id = 0, $level = -1, $str = '')
    {
        if (!is_array ($array))
        {
            return false;
        }
        $level = $level + 1;
        foreach($array as $key => $val){
            $str .= "<option value='". $val['cl_id']. "' ";
            if($val['cl_id'] == $cate_id){
                $str .= "selected";
            }
            $str .= ">".str_repeat('&nbsp;', $level * 4) .'|--'.$val['cl_name'] ."</option>";

            $son_str = '';
            if(isset($val['son_cate']) )
            {
                if(is_array($val['son_cate'])){
                    $son_str .= $this->color_array_to_option ($val['son_cate'], $cate_id, $level, $son_str);
                }

            }
            $str .= $son_str;
        }

        return $str;
    }
    /**
     * 获得模版的信息
     *
     * @access  private
     * @param   string      $template_name      模版名
     * @param   string      $template_style     模版风格名
     * @return  array
     * @author   lxc
     */
    function get_template_info($template_name, $template_style='',$template_dir)
    {
        if (empty($template_style) || $template_style == '')
        {
            $template_style = '';
        }

        $data = array();
        $ext  = array('png', 'gif', 'jpg', 'jpeg');

        $data['code']       = $template_name;
        $data['screenshot'] = 'views/images/u374.png';
        $data['stylename'] = $template_style;

        if ($template_style == '')
        {
            foreach ($ext AS $val)
            {
                if (file_exists($template_dir . $template_name . "/views/images/screenshot.$val"))
                {
                    $data['screenshot'] =  "views/images/screenshot.$val";

                    break;
                }
            }
        }
        else
        {
            foreach ($ext AS $val)
            {
                if (file_exists($template_dir . $template_name . "/views/images/screenshot_$template_style.$val"))
                {
                    $data['screenshot'] =  "views/images/screenshot_$template_style.$val";

                    break;
                }
            }
        }

        $xml_path = $template_dir . $template_name . '/views/libs.xml';
        if ($template_style != '')
        {
            $xml_path = $template_dir . $template_name . "/views/libs_$template_style.xml";
        }
        if (file_exists($xml_path) && !empty($template_name))
        {
            $arr = array_slice(file($xml_path), 2, 8);
            $info = array();
            foreach ($arr as $k=>$v){
                if(!empty($v)){
                    $info[]=explode(': ', $v)[1];
                }
            }

            $data['name']       = isset($info[0]) ? trim($info[0]) : '';
            $data['uri']        = isset($info[1]) ? trim($info[1]) : '';
            $data['desc']       = isset($info[2]) ? trim($info[2]) : '';
            $data['version']    = isset($info[3]) ? trim($info[3]) : '';
            $data['author']     = isset($info[4]) ? trim($info[4]) : '';
            $data['author_uri'] = isset($info[5]) ? trim($info[5]) : '';
            $data['logo']       = isset($info[6]) ? trim($info[6]) : '';
            $data['type']       = isset($info[7]) ? trim($info[7]) : '';

        }
        else
        {
            $data['name']       = '';
            $data['uri']        = '';
            $data['desc']       = '';
            $data['version']    = '';
            $data['author']     = '';
            $data['author_uri'] = '';
            $data['logo']       = '';
        }
        return $data;
    }
    /**
     * 获取商城消息模板
     *
     * @access  private
     * @return  array
     * $code 模板编号
     * @author   lxc
     */
    function get_shop_msg_tp($code='')
    {
        $where = empty($code) ? " 1=1 " : " mmt_code= '$code'";
        $rows = $this->CI->db->select('*')->from('shop_member_msg_tpl')->where($where)
        ->get()->result_array();
        return $rows;
    }
    /**
     * 获取商城对商家，用户发送的消息
     *
     * @access  private
     * @param   string      $member_id      用户ID
     * @return  array
     * @author   lxc
     */
    function get_shop_msg_info($member_id)
    {
        if(empty($member_id)){
            $where = ' 1= 1 ';
        }else{
            $where = " m.member_id = ".$member_id;
        }
        $rows = $this->CI->db->select('m.*,mt.*')->from('shop_member_msg_setting as m')
        ->join('shop_member_msg_tpl as mt','mt.mmt_code=m.mmt_code','left')->where($where)
        ->get()->result_array();
        return $rows;
    }
    /**
     * 商城对商家，用户发送消息
     *
     * @access  private
     * @param   string      $member_id      用户ID
     * @param    string   $code 消息模板编号
     * @return
     * @author   lxc
     */
    function send_shop_msg($member_id='',$code='')
    {
        if(!empty($member_id)&&!empty($code)){
            $this->CI->db->insert('shop_member_msg_setting',array('mmt_code'=>$code,'member_id'=>$member_id,'is_receive'=>0));
            return true;
        }else{
            return false;
        }
    }
    /**
     * 调用淘宝地址接口获取IP登录地址信息
     *
     * @access  private
     * @param   string      $ip         ip地址
     * @return  array       $ip_info    ip地址信息
     * @author   gjd
     */
    function get_area_info_by_ip($ip)
    {
        if($ip == '127.0.0.1' || $ip == '0.0.0.0'){
               $ip = '117.172.24.188';
           }
           $des_url = "http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
           $ch = curl_init();
           curl_setopt ($ch, CURLOPT_URL, $des_url);
           curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
           $content = curl_exec($ch);
           $ip = json_decode($content);
//            var_dump($ip);exit;
           if(empty($ip)){
               $ip_info['region'] = '未知';
               $ip_info['city'] = '未知';
               $ip_info['area'] = '未知';
           }else{
               if((string)$ip->code == '1'){
                   $ip_info = array(
                       'region' => '未知',
                       'city' => '未知',
                       'area' => '未知',
                   );
               }else{
                   $ip_info = (array)$ip->data;
               }
           }
           return $ip_info;
    }
    /**
     * 循环创建文件夹
     *
     * @param   string      $path         目录路径
     * @author   gjd
     */
    function createDir($path){
        if (!file_exists($path)){
            $this->createDir(dirname($path));
            @mkdir($path, 0777);
        }
    }
    /** 跨地鸟查询
     * @string  $order 订单号（可不填）
     * @string  $ship 快递编号（必填）必须与快递鸟设置的一致
     * @string  $logistic 物流运单号（必填）
     * @return  array       发送   json数据格式  {'OrderCode':'订单号（可不填）','ShipperCode':'快递编号（必须与快递鸟设置的一致）','LogisticCode':'物流运单号'}
     * @author   lxc
     */
    function get_kdniao_info($order='',$ship='',$logistic='')
    {
        $ship = empty($ship) ? 'ZTO' : $ship;
        $logistic = empty($logistic) ? '413976811505' : $logistic;
        $arr = array('OrderCode'=>$order,'ShipperCode'=>$ship,'LogisticCode'=>$logistic,);
        $arr = json_encode($arr);
        $kd_interface_api = $this->get_system_value('express_interface_api');
        $kdniao = unserialize($kd_interface_api)['kdniao'];
        $id = $kdniao['id'];$key = $kdniao['key'];
        include_once ROOTPATH.'libraries/KdApiSearchDemo.php';
        //电商ID
        defined('EBusinessID') or define('EBusinessID', $id);
        //电商加密私钥，快递鸟提供，注意保管，不要泄漏
        defined('AppKey') or define('AppKey', $key);
        $result = getOrderTracesByJson($arr);
        return $result;
    }
    /**地区查询
     *@return array 父级显示子级地区
     *@author lxc
     */
    /*地区查询*/
    public function get_area_info(){
        $area = array();
        $area_data = array();
        $area = $this->CI->db->select('area_name,area_id,area_parent_id')->from('area')->get()->result_array();

        foreach ($area as $k=>$v){

            $area_data[$v['area_parent_id']][] = array('0'=>$v['area_id'],'1'=>$v['area_name']);

        }
        //print_r($_COOKIE);
        return $area_data;
    }
    /**生成随机数和字母组成的字符串(默认取四位)
     *@return sting
     *@author lxc
     */
    public function mt_rand_str($len=4){
        $chars_array = array(
            "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
            "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
            "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
            "S", "T", "U", "V", "W", "X", "Y", "Z",
        );
        $charsLen = count($chars_array) - 1;
        $outputstr = "";
        for ($i=0; $i<$len; $i++)
        {
            $outputstr .= $chars_array[mt_rand(0, $charsLen)];
        }
        return $outputstr;
    }
    /**生成随机数和字母组成的字符串(默认取四位)
     *@return sting
     *@author lxc
     */
    public function mt_rand($len=4){
        
        $aplly_sn =date("ymdHis").$this->mt_rand_str($len);
        return $aplly_sn;
    }
    //外键删除
    public function delete_key($error,$code=''){
        $this->CI->lang->load('db');
        $lang = $this->CI->lang->line('db_table');
        $re = array('state'=>false,'msg'=>'');
        if($error['code']=='1451'){
            $table_ = explode('`',$error['message']);
            $table = $table_[3];
            $table_filed = $table_[7];
            $table_p = $table_[9];
            $table_filed_p = $table_[11];
            //print_r($table_);exit;
            $message = isset($lang[$table_filed_p][$table])?$lang[$table_filed_p][$table]:'该数据还有约束的下属数据，请先删除由它生成的约束数据！';
            /*$sql = " delete from ".$table." where ".$table_filed." IN (".$code.")";
            $this->CI->db->query($sql);
            $sql_p = " delete from ".$table_p." where ".$table_filed_p." IN (".$code.")";
            $res = $this->CI->db->query($sql_p);
            $error = $this->CI->db->error();*/
            return $re = array('state'=>false,'msg'=>$message);
        }elseif($error['code']==0){
            return $re = array('state'=>true,'msg'=>'删除成功');
        }else{
            return $re = array('state'=>false,'msg'=>'操作错误');
        }
    }
    /**数据导出 历史记录下载入库
     *@para $name 文件名，$url 文件路径，$time导出时间,$type 导出来源 1位平台2位用户
     *@author lxc
     */
    public function insert_download($name,$url,$time,$type=1){
        $user_id = ($type==1)?$_SESSION['admin_id'] : (isset($_SESSION['under_user_id']) ? $_SESSION['under_user_id'] : $_SESSION['under_user_id']);
        $data = array('dltype'=>1,'user_id'=>$user_id,'dlname'=>$name,'dlurl'=>$url,'dluser_type'=>$type,'dlcreat_time'=>$time);
        sleep(1);
        $this->CI->db->insert('user_download_info',$data);
    }
    /**添加水印
     *@para $img 需要加水印的图片路径 只能为相对路径或者绝对路径 不能为URL
     *@para $type 水印的类型 text 文本；overlay 图片
     *@author lxc
     */
    public function has_mark($img,$type = 'text')
    {
        $water_state = $this->get_system_value('water_state');
        if($water_state==1){
            $this->CI->load->library('image_lib');
            $this->CI->load->library('email');
            $water_overlay = $this->get_system_value('water_overlay');
            $water_text = $this->get_system_value('water_text');
            $water_overlay = unserialize($water_overlay);
            $water_text = unserialize($water_text);
            if($type=='text'){
                $config['source_image'] = $img;
                $config['wm_text'] = $water_text['wm_text'];
                $config['wm_type'] = 'text';
                $config['wm_font_path'] = './system/fonts/'.$water_text['wm_font_path'];
                $config['wm_font_size'] = $water_text['wm_font_size'];
                $config['wm_font_color'] = $water_text['wm_font_color'];
                $config['wm_vrt_alignment'] = $water_text['wm_vrt_alignment'];
                $config['wm_hor_alignment'] = $water_text['wm_hor_alignment'];
                $config['wm_padding'] = '0';
            }elseif($type=='overlay'){
                $config['wm_overlay_path'] = $img;
                $config['wm_type'] = 'overlay';
                $config['wm_number_alignment'] = $water_overlay['wm_number_alignment'];
                $config['wm_vrt_alignment'] = $water_overlay['wm_vrt_alignment'];
                $config['wm_hor_alignment'] = $water_overlay['wm_hor_alignment'];
            
            }
            //print_r($config);exit;
            $this->CI->image_lib->initialize($config);
            $this->CI->image_lib->watermark();
        }
    }
    /**阿里大于短信发送
     *@para 
     *@author lxc
     */
    public function AlidayuSms($data){
        //print_r($data);exit;
        include_once ROOTPATH.'libraries/TaobaoSdk/TopSdk.php';
        $c = new TopClient;
        $appkey = $this->get_system_value('sms_user_name');
        $secret = $this->get_system_value('sms_password');
        $sign = $this->get_system_value('sms_sign');
        //print_r($sign);exit;
        $extend = '';
        $c->appkey = $appkey;
        $c->secretKey = $secret;
        $content = $data['content'];
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend($extend);
        $req->setSmsType("normal");
        $req->setSmsFreeSignName($sign);
        $req->setSmsParam($content);
        $req->setRecNum($data['phone']);
        $req->setSmsTemplateCode($data['template_sms_id']);
        $resp = $c->execute($req);
        $resp = $this->xmlToArray($resp);
        return $resp;
        /*
         * Array
            (
                [code] => 15
                [msg] => Remote service error
                [sub_code] => isv.BUSINESS_LIMIT_CONTROL
                [sub_msg] => 触发业务流控
                [request_id] => zq8jqw2tt8e8
            )
         * */
        //print_r($resp);exit;
    }
    public function xmlToArray($simpleXmlElement){  
        $simpleXmlElement=(array)$simpleXmlElement;  
        foreach($simpleXmlElement as $k=>$v){  
            if($v instanceof SimpleXMLElement ||is_array($v)){
                $simpleXmlElement[$k]=$this->xmlToArray($v);  
            }  
        }  
        return $simpleXmlElement;  
    } 
    /*获取微信菜单*/
    public function get_wx_menu(){
        $menu = $this->CI->db->select('*')->where('pid',0)->order_by('sort')->get('weixin_menu')->result_array();
        $menu_data = array();
        foreach ($menu as $k=>$v){
            $son = $this->CI->db->select('*')->where('pid',$v['usm_id'])->order_by('sort')->get('weixin_menu')->result_array();
            $menu[$k]['son'] = $son;
        }
        return $menu;
    }
    //提交菜单内容给服务器
    public function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        $result = object_array(json_decode($output,true));
        if(isset($result['errcode'])&&$result['errcode']!=0){
            $this->CI->lang->load('wxcode');
            $lang = $this->CI->lang->line('wx');
            $err_msg = isset($lang[$result['errcode']])?$lang[$result['errcode']]:'数据错误'.$result['errcode'];
            if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                echo json_encode(array('state'=>false,'msg'=>$err_msg,'data'=>''));exit;// ajax 请求的处理方式
            }else{
                $this->show_message($err_msg);
                exit();// 正常请求的处理方式
            };
    
        }
        return $output;
    }
    //获得第三方component_access_token
    public function get_component_access_token()
    {
        $component_token = $this->get_system_value('weixin_access_token');
        $component_time = $this->get_system_value('weixin_access_token_time');
        $time = time();
        if(($component_time+5400)<$time||empty($component_token)){
            $component = $this->update_component_access_token();
            return $component;
        }else{
            return $component_token;
        }
    
    }
    //生成第三方component_access_token
    public function update_component_access_token(){
        $url = 'https://api.weixin.qq.com/cgi-bin/component/api_component_token';
        $appid = $this->wx_appid();
        $appsecret = $this->get_system_value('weixin_appsecret');
        $tiket = $this->get_system_value('weixin_tiket');
        $data = '{
                "component_appid":"'.$appid.'" ,
                "component_appsecret": "'.$appsecret.'",
                "component_verify_ticket": "'.$tiket.'"
                }';
        $component = $this->https_request($url,$data);
        //$this->logResult('logs/error.log','生成数据token：'.$component.'。');
        $component = object_array(json_decode($component,true));
        $this->CI->db->where('code','weixin_access_token')->update('system_config',array('value'=>$component['component_access_token']));
        $this->CI->db->where('code','weixin_access_token_time')->update('system_config',array('value'=>time()));
        return $component['component_access_token'];
    }
    /*微信第三方token*/
    public function wx_token(){
        return $this->get_system_value('weixin_token');
    }
    /*微信第三方appid*/
    public function wx_appid(){
        return $this->get_system_value('weixin_appid');
    }
    /*微信第三方加密key*/
    public function wx_key(){
        return $this->get_system_value('weixin_key');
    }
    /*微信第三方令牌*/
    public function wx_component_access_token(){ 
        return $this->get_component_access_token();
    }
    /*微信授权方Appid*/
    public function wx_auth_appid(){
        $auth_info = $this->get_system_value('weixin_auth_info');
        $auth_info = object_array(json_decode($auth_info,true));
        return $auth_info['authorizer_appid'];
    }
    /*微信授权方令牌*/
    public function wx_auth_token(){
        $access_token_time = $this->get_system_value('weixin_auth_token_time');
        $time = time();
        if(($time-$access_token_time)>5400){
            $refresh_token_time = $this->get_system_value('weixin_refresh_token_time');
            $refresh_token = $this->get_system_value('weixin_refresh_token');
            if($refresh_token){
                $component_access_token = $this->wx_component_access_token();
                $appid = $this->wx_appid();
                $auth_appid = $this->wx_auth_appid();
                $url = 'https://api.weixin.qq.com/cgi-bin/component/api_authorizer_token?component_access_token='.$component_access_token;
                $data = '{
                "component_appid":"'.$appid.'" ,
                "authorizer_appid":"'.$auth_appid.'",
                "authorizer_refresh_token":"'.$refresh_token.'",
                }';
                //refreshtoken@@@914ZvtvEYl2dxoWPn3jHejoIAZlq5ziO5mrevCGjy3I
                $result = $this->https_request($url,$data);
                //print_r($result);exit;
                //$this->logResult('logs/error.log','从新授权：'.$data.'|'.$result.'。');
                $result = object_array(json_decode($result,true));
                $time = time();
                $this->CI->db->where('code','weixin_refresh_token_time')->update('system_config',array('value'=>$time));
                $this->CI->db->where('code','weixin_refresh_token')->update('system_config',array('value'=>$result['authorizer_refresh_token']));
                $this->CI->db->where('code','weixin_auth_token_time')->update('system_config',array('value'=>$time));
                $this->CI->db->where('code','weixin_auth_token')->update('system_config',array('value'=>$result['authorizer_access_token']));
                return $result['authorizer_access_token'];
            }else{
                $this->show_message('还没有公众平台授权或者授权已过期，请重新授权');
            }
        
        }else{
            return $this->get_system_value('weixin_auth_token');
        }
    }
    public function get_gzh_appid(){
    	return $this->get_system_value('gzh_appid');
    }
    public function get_gzh_secret(){
    	return $this->get_system_value('gzh_secret');
    }
    public function get_gzh_token(){
    	$token_time = $this->get_system_value('gzh_token_time');
    	$token_time = empty($token_time)?0:$token_time;
    	if(time()-5400>$token_time){
    		$appid = $this->get_gzh_appid();
    		$secret = $this->get_gzh_secret();
    		$res = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$secret);
    		$res = json_decode($res, true);
    		$token = $res['access_token'];
    		$token_time = time();
    		$this->CI->db->where('code','gzh_token')->update('system_config',array('value'=>$token));
    		$this->CI->db->where('code','gzh_token_time')->update('system_config',array('value'=>$token_time));
    		return $token;
    	}else{
    		return $this->get_system_value('gzh_token');
    	}
    	
    }
    public function get_gzh_noncestr(){
    	return $this->get_system_value('gzh_noncestr');
    }
    public  function get_wx_jsapi_ticket(){
    	$ticket = $this->get_system_value('weixin_jsapi_tiket');
    	$ticket_time = $this->get_system_value('weixin_jsapi_tiket_time');
    	if(empty($ticket)||(time()-5400>$ticket_time)){
    		$token = $this->wx_auth_token();
    		$url = sprintf("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi",
    				$token);
    		$res = file_get_contents($url);
    		
    		$res = json_decode($res, true);
    		if(isset($res['errcode'])){
    			if($res['errcode']==0){
    				$ticket = $res['ticket'];
    				$this->CI->db->where('code','weixin_jsapi_tiket')->update('system_config',array('value'=>$ticket));
    				$this->CI->db->where('code','weixin_jsapi_tiket_time')->update('system_config',array('value'=>time()));
    			}else{
    				return false;
    			}
    		}else{
    			return false;
    		}
    		
    		
    	}
    	return $ticket;
    }
    
    /* 获取扫描导购二维码的推送信息
     *  $guide_id  导购id
     */
    public  function get_weixin_guanzhu_daogou($guide_id) {
       if($guide_id){
            $content  = $this->get_system_value('weixin_guanzhu_daogou');
            $content = unserialize($content);
            
            $this->CI->db->select('sg.spg_id, sg.spg_nike_name, sg.spg_name, sg.spg_store_id, sg.head_portrait, g.store_id, g.store_name, g.ous_logo, g.ous_shop_signs');
            $this->CI->db->from('store_shopping_guide as sg');
            $this->CI->db->join('store as g','g.store_id = sg.spg_store_id','left');
            $this->CI->db->where('sg.spg_id',$guide_id);
            $info = $this->CI->db->get()->row_array();
            $info['head_portrait'] = base_url().$info['head_portrait'];
            $info['ous_logo'] = base_url().$info['ous_logo'];
            $info['ous_shop_signs'] = base_url().$info['ous_shop_signs'];
            
            foreach ($content as $key=>$val){
                if($key==1){
                    $content[1]['Title']="我是您的服务顾问".$info['spg_nike_name'];
                    $content[1]['Description']= "";
                    $content[1]['PicUrl']=$info['head_portrait'];
                    $content[1]['Url']= ROOTPATH."vmall.php/Store/shopping_guide?store_id=".$info['spg_store_id'];
                }else{
                    if($val['PicUrl']=="type1"){
                        $content[$key]['PicUrl'] = $info['ous_logo'];
                    }
                    if(stripos($val['Title'],"导购所属门店名称")!==false){
                        $content[$key]['Title'] = "欢迎来到".$info['store_name'];
                    }
                    if(stripos($val['Url'],ROOTPATH."vmall.php/index")!==false){
                        $content[$key]['Url'] = ROOTPATH."vmall.php/index?storeId=".$info['store_id'];
                    }
                }
              
            }
            return $content;
        }
        
    }
    
    
    
    
    
    /* 获取扫描店铺二维码的推送信息
     *  $guide_id  导购id
     */
    public  function get_weixin_guanzhu_dianpu($store_id) {
        if($store_id){
            $this->CI->db->select('store_name');
            $this->CI->db->from('store');
            $this->CI->db->where('store_id',$store_id);
            $info = $this->CI->db->get()->row_array();
            $content = "欢迎来到BE童装城\n您已关注".$info['store_name']."\n我们将竭诚为您服务!";
            return $content;
        }
    
    }
    
    
    
    
    
    //关注公众号  扫描门店活动二维码    61|11|2|21819
    public  function get_weixin_guanzhu_store($true_id) {
        $content = array();
        if($true_id && stripos($true_id,'|')!==false){
            $info =  explode("|",$true_id);
            $store_id = isset($info[0])?$info[0]:false;
            $act_id = isset($info[1])?$info[1]:false;
            $type_id = isset($info[2])?$info[2]:false;//活动类型    1 大转盘  2 微砍价 3 会员购
            $goods_id = isset($info[3])?$info[3]:false;
            $this->CI->db->insert('system_config',array('code'=>'subscribe_store','value'=>date('H:i:s',time())."||".$store_id."_".$act_id."_".$type_id."_".$goods_id));
            if($store_id &&  $act_id && $type_id && $goods_id){//61_11_2_21819
                if($type_id==2){
                    //活动信息
                    $bargain_Info = $this->CI->db->select('bargain_title,bargain_note,bargain_image_wx')->from('shop_p_bargain')->where('bargain_id',$act_id)->get()->row_array();
                    if($bargain_Info){
                        $content[] = array(
                            "Title"=>isset($bargain_Info['bargain_title']) && !empty($bargain_Info['bargain_title'])?$bargain_Info['bargain_title']:'测试',
                            "Description"=>isset($bargain_Info['bargain_note']) && !empty($bargain_Info['bargain_note'])?$bargain_Info['bargain_note']:'测试',
                            "PicUrl"=>base_url().'data/shop/album_pic/'.$bargain_Info['bargain_image_wx'],
                            "Url" => base_url('vmall.php/Micro/cuts?bargain_id=').$act_id
                        );
                    }
                 }elseif($type_id==1){
                     $bargain_Info = $this->CI->db->select('wheels_name,rule,wheels_image')->where('wheels_id',$act_id)->get('shop_p_lottery_wheel')->row_array();
                     if($bargain_Info){
                         $content[] = array(  
                             "Title"=>isset($bargain_Info['wheels_name']) && !empty($bargain_Info['wheels_name'])?$bargain_Info['wheels_name']:'测试',
                             "Description"=>isset($bargain_Info['rule']) && !empty($bargain_Info['rule'])?$bargain_Info['rule']:'测试',
                             "PicUrl"=>$bargain_Info['wheels_image'],
                             "Url" => base_url('vmall.php/Promotion/wheels_show?wheels_id=').$act_id
                         );
                     }
                }elseif($type_id==3){
                    $bargain_Info = $this->CI->db->select('shop_title,shop_note,shop_image_wx')->where('shop_id',$act_id)->get('shop_p_member_shop')->row_array();
                     if($bargain_Info){
                         $content[] = array(  
                             "Title"=>isset($bargain_Info['shop_title']) && !empty($bargain_Info['shop_title'])?$bargain_Info['shop_title']:'测试',
                             "Description"=>isset($bargain_Info['shop_note']) && !empty($bargain_Info['shop_note'])?$bargain_Info['shop_note']:'测试',
                             "PicUrl"=>base_url().'data/shop/album_pic/'.$bargain_Info['shop_image_wx'],
                             "Url" => base_url('vmall.php/goods/index?source=memberbuy&act_id=').$act_id
                         );
                     }
                }
            }
        }
        return $content;
    }
    
    
    
    //通过微信返回的 EventKey 判断业务场景
    /* @access  public
    * @return array   array($scene_id, $true_id)
    *  $scene_id 场景值   1 扫描店铺二维码     2 扫描导购二维码   3 扫描门店活动二维码   4 订单支付   。。。
    *  $true_id  二维码真实参数
    */ 
    public  function get_scene_buy_EventKey($EventKey) {
        if(!isset($EventKey)){
            return false;
        }
        $this->CI->db->insert('system_config',array('code'=>'subscribe_EventKey','value'=>date('H:i:s',time()).$EventKey));
        if(stripos($EventKey,'_')!==false){
            if(stripos($EventKey,'_s_')!==false){//qrscene_s_61a11a2a21819   //未关注
                $EventKey =explode('_',$EventKey);
                $EventKey2 = $EventKey[2];//61a11a2a21819
                $EventKey1 = $EventKey[1];//s
                if($EventKey1=='s'){
                    //$this->CI->db->insert('system_config',array('code'=>'subscribe6','value'=>date('H:i:s',time()).$EventKey1[1]));
                    return $arr = array("scene_id"=>3,"true_id"=>$EventKey2);
                }
            }elseif(stripos($EventKey,'s_')!==false){//s_61|11|2|21819   //已关注
                $EventKey =explode('_',$EventKey);
                $EventKey2 = $EventKey[1];//61a11a2a21819
                $EventKey1 = $EventKey[0];//s
                if($EventKey1=='s'){
                    //$this->CI->db->insert('system_config',array('code'=>'subscribe6','value'=>date('H:i:s',time()).$EventKey1[1]));
                    return $arr = array("scene_id"=>3,"true_id"=>$EventKey2);
                }
            }else{
                $EventKey =explode('_',$EventKey);
                $EventKey = $EventKey[1];
            }
        }
        if($EventKey<10000){
            //扫描店铺二维码
            $arr = array("scene_id"=>1,"true_id"=>$EventKey);
        }else{
            $true_id = $EventKey - 10000;
            $arr = array("scene_id"=>2,"true_id"=>$true_id);
            
        }
        //$this->CI->db->insert('system_config',array('code'=>'subscribe7','value'=>date('H:i:s',time()).$res['true_id']));
        return $arr;
    }
    
    
    //用户微信关注与绑定操作记录
    /*  $user_id 用户id
     *  $type  操作类型  1创建用户2关注公众号3绑定导购4绑定门店, 5 取消关注 6解绑门店 7解绑导购
     *  $id 对象id（门店id 或者导购id）
     *  $time  操作发生的时间戳
     *  return bool  
     */
    public  function set_user_wx_action($user_id,$type,$time,$id=0) {
        $this->CI->db->select('t.user_id,t.wx_nickname,t.ecshopping_guide_id,t.ecstore_id,s.store_id,s.store_name,s.area_id,g.spg_id,g.spg_name,g.spg_store_id');
	    $this->CI->db->from('user as t');
	    $this->CI->db->join('store s','s.store_id=t.ecstore_id','left');
	    $this->CI->db->join('store_shopping_guide g','g.spg_id=t.ecshopping_guide_id','left');
	    $this->CI->db->where("t.user_id",$user_id);
	    $user_info= $this->CI->db->get()->row_array();
        $date['user_id'] = $user_id;
        $date['wx_action_time'] = $time;
        $date['wx_action'] = $type;
        if($type==1){
            $date['note'] = "创建用户:".$user_info['wx_nickname'];
            $this->CI->db->insert("user_bind_or_follow_wx",$date);
            $date['note'] = "关注公众号";
            $date['wx_action'] = 2;
            $this->CI->db->insert("user_bind_or_follow_wx",$date);
        }if($type==2){
            $date['note'] = "关注公众号";
            $date['wx_action'] = 2;
            $this->CI->db->insert("user_bind_or_follow_wx",$date);
        }elseif ($type==3){
            $this->CI->db->select("t.spg_id, t.spg_store_id,t.spg_name,s.store_id,s.store_name");
            $this->CI->db->from('store_shopping_guide as t');
            $this->CI->db->join('store s','s.store_id=t.spg_store_id','left');
            $this->CI->db->where("spg_id", $id);
            $spg_info = $this->CI->db->get()->row_array();
            if($id != $user_info['spg_id'] ){
                $date['wx_action_value'] = $id;
                $date['note'] = "绑定导购:[".$spg_info['store_name']."].[".$spg_info['spg_name']."]";
                $this->CI->db->insert("user_bind_or_follow_wx",$date);
                if($user_info['spg_id']){
                    //解除导购绑定
                    $date['wx_action'] = 7;
                    $date['wx_action_value'] = $user_info['ecshopping_guide_id'];
                    $date['note'] = "解绑导购:[".$user_info['store_name']."].[".$user_info['spg_name']."]";
                    $this->CI->db->insert("user_bind_or_follow_wx",$date);
                    if($spg_info['store_id']!=$user_info['ecstore_id']){
                        //解除门店绑定
                        $date['wx_action'] = 6;
                        $date['wx_action_value'] = $user_info['ecstore_id'];
                        $date['note'] = "解绑门店:[".$user_info['store_name']."]";
                        $this->CI->db->insert("user_bind_or_follow_wx",$date);
                    }
                }elseif($user_info['ecstore_id']){
                    if($spg_info['store_id']!=$user_info['ecstore_id']){
                        //解除门店绑定
                        $date['wx_action'] = 6;
                        $date['wx_action_value'] = $user_info['ecstore_id'];
                        $date['note'] = "解绑门店:[".$user_info['store_name']."]";
                        $this->CI->db->insert("user_bind_or_follow_wx",$date);
                    }
                }
            }
        }elseif ($type==4){
            $this->CI->db->select("store_id,store_name");
            $this->CI->db->from('store');
            $this->CI->db->where("store_id", $id);
            $store_info = $this->CI->db->get()->row_array();
            if($id != $user_info['ecstore_id'] ){
                $date['wx_action_value'] = $id;
                $date['note'] = "绑定门店:[".$store_info['store_name']."]";
                $this->CI->db->insert("user_bind_or_follow_wx",$date);
                if($user_info['ecstore_id']){
                    //解除门店绑定
                    $date['wx_action'] = 6;
                    $date['wx_action_value'] = $user_info['ecstore_id'];
                    $date['note'] = "解绑门店:[".$user_info['store_name']."]";
                    $this->CI->db->insert("user_bind_or_follow_wx",$date);
                    if($user_info['spg_id']){
                        //解除导购绑定
                        $date['wx_action'] = 7;
                        $date['wx_action_value'] = $user_info['ecshopping_guide_id'];
                        $date['note'] = "解绑导购:[".$user_info['store_name']."].[".$user_info['spg_name']."]";
                        $this->CI->db->insert("user_bind_or_follow_wx",$date);
                    }
                }
            }

        }elseif ($type==5){
        	$date['note'] = "取消关注公众号";
            $this->CI->db->insert("user_bind_or_follow_wx",$date);
            if($user_info['spg_id']){
                    //解除导购绑定
                    $date['wx_action'] = 7;
                    $date['wx_action_value'] = $user_info['ecshopping_guide_id'];
                    $date['note'] = "解绑导购:[".$user_info['store_name']."].[".$user_info['spg_name']."]";
                    $this->CI->db->insert("user_bind_or_follow_wx",$date);
            }
            if($user_info['ecstore_id']){
                  //解除门店绑定
                   $date['wx_action'] = 6;
                   $date['wx_action_value'] = $user_info['ecstore_id'];
                   $date['note'] = "解绑门店:[".$user_info['store_name']."]";
                   $this->CI->db->insert("user_bind_or_follow_wx",$date);
            }
           
        }
       // return $arr;
    }
    
    //判断店铺是否存在并启用
    public  function store_true($store_id){
        $this->CI->db->select('store_id,store_name,store_state');
        $this->CI->db->from('store');
        $this->CI->db->where("store_id",$store_id);
        $this->CI->db->where("store_state",1);
        $info= $this->CI->db->get()->row_array();
        if($info){
            return  true;
        }else{
            return  false;
        }
    }
    //店铺授权品牌
    public  function store_auth_brand($store_id,$status=false){
        $brand_code_arr = $this->CI->db->select('s.brand_id,s.brand_name')->from('store_attr_brands as sb')
        ->join('shop_brand as s','s.brand_id=sb.brand_id','left')->where_in('sb.store_id',$store_id)
        ->get()->result_array();
        $brands = array();$brandsInfo = array();
        foreach ($brand_code_arr as $v){
            if(in_array($v['brand_id'], $brands)){
                continue;
            }else{
                $brands[] = $v['brand_id'];
                $brandsInfo[] = array('brand_id'=>$v['brand_id'],'brand_name'=>$v['brand_name']);
            }
        }
        $brands = join(',',$brands);
        if($status){
            return  $brandsInfo;
        }else{
            return $brands;
        }
        
    }
    
    
    //生成提货码
    /* 付款成功时候的时间错$time */
    public  function get_pickup_code($time){
        if(!is_numeric($time) || empty($time)){
            return  false;
        }
        $data = explode(" ",date("Y-m-d H:i:s",$time));
        $data[0] = trim($data[0]);
        $data[1] = trim($data[1]);
        $data[0] = explode("-",$data[0]);
        $data[1] = explode(":",$data[1]);
        $arr=array();
        foreach ($data as $key=>$val){
            foreach ($val as $k=>$v){
                if(strlen($v)>2){
                    $arr[] = substr($v,2);
                }else{
                    $arr[] =$v;
                }
            }
        }
        $num = array(
            '01'=>'A','02'=>'B','03'=>'C','04'=>'D','05'=>'E','06'=>'F','07'=>'G','08'=>'H','09'=>'I','10'=>'J','11'=>'K','12'=>'L','13'=>'M',
            '14'=>'N','15'=>'O','16'=>'P','17'=>'Q','18'=>'R','19'=>'S','20'=>'T','21'=>'U','22'=>'V','23'=>'W','24'=>'X','25'=>'Y','26'=>'Z',
            '27'=>'a','28'=>'b','29'=>'c','30'=>'d','31'=>'e','31'=>'f','33'=>'g','34'=>'h','35'=>'i','36'=>'j','37'=>'k','38'=>'l','39'=>'m',
            '40'=>'n','41'=>'o','42'=>'p','43'=>'q','44'=>'r','45'=>'s','46'=>'t','47'=>'u','48'=>'v','49'=>'w','50'=>'x','51'=>'y','52'=>'z',
            '53'=>'9','54'=>'8','55'=>'7','56'=>'6','57'=>'5','58'=>'4','59'=>'3','60'=>'2','00'=>'1'
        );
        $str ="";
        foreach ($arr as $key=>$val){
            $str .=$num[$val];
        }
        $str .=rand(1,9);
        
        return  $str;
    }
    
    
    //向用户推送提货通知
    /* 订单编号  $order_sn
     * 用户id  $user_id
     * 提货码   $pickup_code
     * 提货地址    $receive_addr
     */
    public  function send_pickup_code($order_sn,$user_id,$pickup_code,$receive_addr){
       $result =array('state'=>false,'msg'=>'推送失败,请稍后再试！');
       if($order_sn && $receive_addr && $pickup_code && $user_id){
           //user_id获取用户信息
           $this->CI->db->select('wx_openid,wx_nickname');
           $this->CI->db->from('user');
           $this->CI->db->where('user_id',$user_id);
           $userinfo = $this->CI->db->get()->row_array();
           
           //推送提货码等消息给用户
           $this->CI->db->select('template_id,template_title');
           $this->CI->db->from('weixin_notify_templates');
           $this->CI->db->where('template_code','THTZ');
           $temp = $this->CI->db->get()->row_array();
           $son=array(
               "first"=>array("value"=>"您好，请凭下面的提货码到（".$receive_addr."）领取您的宝贝！"."\n",
                   "color"=>"#173177"
               ),
               "keyword1"=>array("value"=>$order_sn,
                   "color"=>"#173177"
               ),
               "keyword2"=>array("value"=>$pickup_code."\n",
                   "color"=>"#173177"
               ),
               "remark"=>array("value"=>"备注：如有疑问，请联系导购！",
                   "color"=>"#173177"
               )
           );
            

           $data = array(
               "touser"=>"{$userinfo['wx_openid']}",
               "template_id"=>"{$temp['template_id']}",
               "url"=>base_url('vmall.php/order/order_detail?order_sn=').$order_sn,
               "topcolor"=>"#173177",
               "data"=>json_encode($son)
           );
            
           
           $url=base_url('vmall.php/receive/weixin_send_msg');
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt($ch, CURLOPT_POST, 1);
           curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
           $result = curl_exec($ch);
           curl_close($ch);
           $result=json_decode($result,true);
           $result = object_array(json_decode($result,true));
           //$this->CI->db->insert('system_config',array("code"=>'recharge_errmsg',"value"=>$result['errmsg']));
           if($result['errmsg']=='ok'){
               $arr=array(
                   'wnl_title'=>$temp['template_title'],
                   'wnl_code'=>'THTZ',
                   'wnl_content'=>json_encode($son),
                   'wnl_type'=>3,
                   'wnl_time'=>time(),
                   'wnl_to_usersn'=>$userinfo['wx_nickname'],
                   'user_id'=>$user_id,
                   'order_sn'=>$order_sn
               );
               $this->CI->db->insert('weixin_notify_log',$arr);
               $result ['state'] = true;
               $result ['msg'] = "推送成功，用户已收到提货通知！";
           }
       }
       return $result;

    }
    
    
    
    
    
    //读取文件夹下所有文件
    public function read_all_dir ( $dir )
    {
        $result = array();
        $handle = opendir($dir);
        if ( $handle )
        {
            while ( ( $file = readdir ( $handle ) ) !== false )
            {
                if ( $file != '.' && $file != '..')
                {
                    $cur_path = $dir . DIRECTORY_SEPARATOR . $file;
                    if ( is_dir ( $cur_path ) )
                    {
                        $result['dir'][$cur_path] = read_all_dir ( $cur_path );
                    }
                    else
                    {
                        $result['file'][] = $cur_path;
                    }
                }
            }
            closedir($handle);
        }
        return $result;
    }

    //根据月份获取季节 1：春季，2：夏季，3：秋季，4：冬季
    public function get_season(){
        $season = array(
            '01'=>1,'02'=>1,'03'=>1,'04'=>2,'05'=>2,'06'=>2,
            '07'=>3,'08'=>3,'09'=>3,'10'=>4,'11'=>4,'12'=>4,
        );
        return $season;
    }
    //根据商品子分类获取所有父级分类$gc_id
    public function get_parent_class($gc_id,$result = array()){
        $result = empty($result)?array($gc_id):$result;
        $parent = $this->CI->db->select('gc_parent_id')->where('gc_id',$gc_id)->get('shop_goods_class')->row('gc_parent_id');
        if($parent==0){
            return $result;
        }else{
            $result[] = $parent;
            return $this->get_parent_class($parent,$result);
        }
    }



    /**
     * 发送推送消息(订单相关)
     */
    public function pushMsg($title,$con,$payload,$order){
        $orderinfo=$this->CI->db->select('store_id,spg_id')->where('order_sn',$order)->get('shop_order')->row_array();
        $guide=$this->CI->db->select('spg_id')->where('spg_store_id',$orderinfo['store_id'])->where('role_type',2)->get('store_shopping_guide')->row('spg_id');
        if(empty($orderinfo['spg_id'])){
            $guideid=$guide;
        }else{
            $storeid=$this->CI->db->select('spg_store_id')->where('spg_id',$orderinfo['spg_id'])->get('store_shopping_guide')->row('spg_store_id');
            if($storeid==$orderinfo['store_id']){
                $guideid=$orderinfo['spg_id'];
            }else{
                $guideid=$guide;
            }
        }
        $data=array("title" => $title,"content"  => $con,"payload" => json_encode($payload),"guideId"=>$guideid);
        $url = "http://api.juketz.com/index.php/App/push_msg";
        $res=$this->https_request($url,$data);
        $result=object_array(json_decode($res,true));
        return $result;
    }

    
    
    //获取用户购物车数目
    /* $user_id 用户id */
    public  function get_user_cart_total($user_id){
        if(!is_numeric($user_id) || empty($user_id)){
            return  false;
        }
        $total=0;
        $this->CI->db->select('cart_id,goods_num');
        $this->CI->db->from('shop_cart');
        $this->CI->db->where("buyer_id",$user_id);
        $info= $this->CI->db->get()->result_array();
        if($info){
            foreach ($info as $key=>$val){
                $total+=$val['goods_num'];
            }
        }
        return $total;
    }
    
    public  function  get_default_img(){
       $default_goods_image =  $this->get_system_value('default_goods_image');//默认商品图片
       
       $default_store_avatar =  $this->get_system_value('default_store_avatar');//默认店铺头像
       
       $default_store_logo =  $this->get_system_value('default_store_logo');//默认店铺标志
       
       $default_member_logo =  $this->get_system_value('member_logo');//默认会员图片
       
       $default_tb_image =  $this->get_system_value('default_tb_image');//默认淘宝店logo
        
       $default_tm_image =  $this->get_system_value('default_tm_image');//默认天猫店logo
        
       $default_jd_image =  $this->get_system_value('default_jd_image');//默认京东店logo
       
       $default_guide_logo =  $this->get_system_value('default_guide_logo');//默认京东店logo
       
       $config_images=array(
           'goods_image'=>$default_goods_image,
           'store_avatar'=>$default_store_avatar,
           'store_logo'=>$default_store_logo,
           'member_logo'=>$default_member_logo,
           'default_tb_image'=>$default_tb_image,
           'default_tm_image'=>$default_tm_image,
           'default_jd_image'=>$default_jd_image,
           'default_guide_logo'=>$default_guide_logo
       );
       return $config_images;
    }
    
    
    public  function del_applyServices_pic($arr){
        if(empty($arr) || !is_array($arr)){
            return false;
        }
        foreach ($arr as $key=>$val){
            @unlink(ROOTPATH.'./application/vmall/views/images/'.$val);
        }
        return true;
        
    }

    /**
     * 发送微信消息模板
     * @param $code
     * @return bool
     */
    public function get_weixin_temp_value($code){
        $temp=$this->CI->db->select('template_id,template_title')->where('template_code',$code)->get('weixin_notify_templates')->row_array();
        return $temp;
    }
    /**记录第三方平台抓取的用户信息保存到本地
     * $param 会员信息
     * */
    public function insert_user_info($param=false){
    	if(empty($param)){
    		return false;
    	}
    	$mobile = isset($param['tel'])?$param['tel']:'';//手机
    	if($mobile&&is_numeric($mobile)){
    		//print_r($mobile);die;
    		$user = $this->CI->db->select('user_id,user_name,user_addres,user_email,province_id,city_id,area_id,wx_nickname,member_sex,qq,integral_total,integral')->where('tel',$mobile)->where('is_status',1)->get('user')->row_array();
    		$integral = 0;
    		if(isset($param['received_payment'])){
    			$integral = intval($param['received_payment']);
    			unset($param['received_payment']);
    		}
    		if(!empty($user)){
    			$up = array();
    			foreach ($user as $k=>$v){
    				if(empty($v)&&!empty($param[$k])){
    					$up[$k] = $v;
    				}
    			}
    			$up['integral_total'] = $user['integral_total']+$integral;
    			$up['integral'] = $user['integral']+$integral;
    			if(!empty($up)){
    				$this->CI->db->update('user',$up,array('user_id',$user['user_id']));
    				return $user['user_id'];
    			}
    			
    		}else{
    			$param['reg_time'] = time();
    			$param['integral'] = $integral;
    			$param['integral_total'] = $integral;
    			$this->CI->db->insert('user',$param);
    			return $this->CI->db->insert_id();
    		}
    	}else{
    		return false;
    	}
    }

    /**
     * 商家端功能模块显示
     * @param   $code   要查询的操作
     * $return  bool    存在权限就返回true，不存在权限返回false
     */
    public function pay_show($code)
    {
        //从session中得到权限
        $role = isset($_SESSION['role']) ? $_SESSION['role'] : false;
        if ($role) {
            if (strpos ($code, $role)) {
                return true;
            }
        }
        return false;
    }

    /*商家端
     * 判断用户是否有权限使用某个功能
     * @param   $code   要查询的操作
     * @return  bool
     * */
    public function pay_role($code)
    {
        //判断用户session是否存在，是否正确
        if ((!isset($_SESSION['shop_spg_id']) || intval($_SESSION['shop_spg_id']) <= 0))
        {
            if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                echo json_encode(array('state'=>403,'msg'=>'登录已过期,请重新登录'));exit;// ajax 请求的处理方式
            }else{
                echo '<script>alert("登录已过期,请重新登录！");</script>';
                echo '<script>window.top.location.href ="'.base_url('pay.php/Index/login_out').'"</script>';
                exit();// 正常请求的处理方式
            };
        }
        //得到最新用户信息，判断用户权限是否被改变
        $check = $this->CI->db->select('spg_store_id,role_type')->where('spg_id',$_SESSION['shop_spg_id'])->get('store_shopping_guide')->row_array();

        //检查session是否存在  登录用户的角色以及店铺信息是否被更改
        if ($check['spg_store_id'] == $_SESSION['shop_spg_store_id'] && $check['role_type'] == $_SESSION['shop_role_type']) {
            //从session中得到权限
            $role = isset($_SESSION['role']) ? $_SESSION['role'] : false;
            $check_role = $this->CI->db->select('role_id')->where('role_actions', $_SESSION['role'])->where('role_id', $_SESSION['shop_role_type'])->get('platform_roles')->row_array();
            if ($check_role) {
                if ($role && strpos ($role, $code) !== false) {
                    return true;
                }
            } else {    //所属角色权限被更改
                if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                    echo json_encode(array('state'=>403,'msg'=>'权限信息过期，请重新登录'));exit;// ajax 请求的处理方式
                }else{
                    echo '<script>alert("权限信息过期,请重新登录！");</script>';
                    echo '<script>window.top.location.href ="'.base_url('pay.php/Index/login_out').'"</script>';
                    exit();// 正常请求的处理方式
                };
            }
        } else {    //session不存在，登陆过期
            if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                echo json_encode(array('state'=>403,'msg'=>'登录已过期,请重新登录'));exit;// ajax 请求的处理方式
            }else{
                echo '<script>alert("登录已过期,请重新登录！");</script>';
                echo '<script>window.top.location.href ="'.base_url('pay.php/Index/login_out').'"</script>';
                exit();// 正常请求的处理方式
            };
        }
        if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
            echo json_encode(array('state'=>'401','msg'=>'权限不足！'));exit;// ajax 请求的处理方式
        }else{
            //return false;
            echo "<script>alert('权限不足！');</script>";
            exit();// 正常请求的处理方式
        };

    }
    public function https_request_r($url,$data = null,$return=false){
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    	if (!empty($data)){
    		curl_setopt($curl, CURLOPT_POST, 1);
    		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    	}
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    	if($return){
    		curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    	}
    	$output = curl_exec($curl);
    	curl_close($curl);
    	
    	return $output;
    }
    public function get_area_id($name,$parent_id=0){
    	if($name&&is_numeric($parent_id)){
    		$city_name_like = mb_substr($name,0,2,'utf-8');
    		$area_id = $this->CI->db->select('area_id')
    		->from('area')
    		->group_start()
    		->like('area_name', $name)
    		->or_where("'$name' LIKE CONCAT('%',area_name,'%')")
    		->or_where(" area_name like '%$city_name_like%'")
    		->or_where('area_name', $name)
    		->group_end()
    		->where('area_parent_id',$parent_id)->get()->row('area_id');
    		return $area_id;
    	}else{
    		return 0;
    	}
    }
    /**
     *
     * 店铺对应发货时间表；
     * @param $store_id 店铺
     * @author lxc
     */
    public function get_depot_delivery_time($store_id) {
    
    	$rows = $this->CI->db->select('delivery_date,delivery_time,not_delivery_time')->from('store')->where("store_id", $store_id)->get()->row_array();
    	if ($rows) {
    		if (isset($rows['exception'])) {
    			$rows['exception_time'] = unserialize($rows['exception']);
    		}
    		return $rows;
    	} else {
    		return false;
    	}
    }
    
    /**
     *
     * 获取发货时间；
     * @param $store_id 店铺
     * @param $store_id 店铺
     * @author lxc
     */
    public function get_delivery_time($store_id, $time) {
    	$week = $this->get_depot_delivery_time($store_id);
    	$deliver_time = $week['delivery_time'];
    	if ($deliver_time) {
    		$deliver_time = !empty($deliver_time) ? $deliver_time : '18:00';
    		if (!preg_match('/^([01][0-9]|2[0-3])(:[0-5][0-9]){1,2}$/', $deliver_time)) {
    			$deliver_time = '18:00';
    		}
    	} else {
    		$deliver_time = '18:00';
    	}
    	$day_now = date("Y/m/d", $time);
    	if ($week) {
    		if (isset($week['not_delivery_time']) && !empty($week['not_delivery_time'])) {
    			$depot_delivery_time = $week['not_delivery_time'];
    		} else {
    			$depot_delivery_time = '';
    		}
    		//print_r(in_array($day_now, $depot_delivery_time));print_r($depot_delivery_time);die;
    		while (strpos($depot_delivery_time,$day_now)) {
    			$day_now = date("Y/m/d", (strtotime($day_now) + 3600 * 24)); //判断是否在特殊时间里
    		}
    
    		$day_now_w = date('w', strtotime($day_now)); //星期几
    		$depot_delivery_day = explode(',',$week['delivery_date']);
    		$depot_delivery_day = (empty($depot_delivery_day) || empty(array_filter($depot_delivery_day))) ? array(1, 2, 3, 4, 5, 6, 7) : $depot_delivery_day;
    		//print_r($depot_delivery_day);print_r($time);exit;
    		if ($depot_delivery_day == array(0, 0, 0, 0, 0, 0, 0)) {
    			$depot_delivery_day = array(1, 2, 3, 4, 5, 6, 7);
    		}
    		if (in_array($day_now_w, $depot_delivery_day)) {
    			$deliver_day_time = strtotime($day_now . ' ' . $deliver_time);
    
    			if ($deliver_day_time >= $time) {
    				return $deliver_day = $day_now . ' ' . $deliver_time;
    			} else {
    				$day_now = date("Y/m/d", (strtotime($day_now) + 3600 * 24));
    				$deliver_day = $this->get_delivery_time($store_id, strtotime($day_now));
    			}
    		} else {
    			$day_now = date("Y/m/d", (strtotime($day_now) + 3600 * 24));
    			$deliver_day = $this->get_delivery_time($store_id, strtotime($day_now));
    		}
    		return $deliver_day;
    	} else {
    		return $deliver_day = $day_now . ' ' . $deliver_time;
    	}
    }
    
    
    function gstr($data)
    {
       $data=iconv("GBK","UTF-8//IGNORE",$data);
/*         if( !empty($data) ){
            $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5','CP936','GB2312')) ;
            if( $fileType != 'UTF-8' || $fileType != 'utf-8'){
                $data = mb_convert_encoding($data ,'utf-8' , $fileType);
            }
        } */
        return $data;
    }

    /*
     * 排队
     * 新增队列表数据
     * @param $arr array() 要插入的数组
     * return  num 插入成功,返回id false 插入失败
     * */
    public function queue_in ($arr)
    {
        $this->CI->db->insert('sys_task', $arr);
        $row = $this->CI->db->insert_id();
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    /*
     * 排队
     * 得到位置：读取队列表，队列表-吞吐量=位置
     * @param $arr array() 查询条件
     * return int 队列前面的等待人数  返回0为进入队列，可以进行操作
     * */
    public function get_queue_place ($arr)
    {
        //系统资源吞吐量
        $key = $this->CI->db->select('value')->where('code','system_throughput')->get('system_config')->row('value');
        //该条数据目前所在位置
        $sql = "select count(task_id) as id from jk_sys_task where task_id <= {$arr['task_id']} order by task_id asc";
        $num = $this->CI->db->query($sql)->row('id');
        if ($num > $key) {  //位置大于吞吐量，返回位置
            return $num-$key;
        } else {    //位置小于吞吐量，可以操作
            return 0;
        }
    }

    /*
     * 排队
     * 删除队列表数据
     * @param $arr array() 查询条件
     * return bool true 删除成功 false删除失败
     * */
    public function queue_out ($arr)
    {
        $row = $this->CI->db->where($arr)->delete('sys_task');
        if ($row) {
            return true;
        } else {
            return false;
        }
    }
    /*
     * 排队
     * 查询该用户在队列中是否存在任务，存在则返回true
     * 店铺id store_id
     * 用户id user_id
     * return bool true存在任务 false不存在任务
     * */
    public function exist_queue ($store_id, $user_id)
    {
        $exit = $this->CI->db->from('sys_task')->where('task_request_storeId', $store_id)->where('task_request_userId', $user_id)
            ->get()->row('task_id');
        if ($exit) {
            return true;
        } else {
            return false;
        }
    }
    /*$store_id店铺ID
     * 
     * */
    public function get_auth_store($store_id){
    	$auth_store = $this->CI->db->select('auth_store_id,store_id,brand_id')->from('store_auth_store')
    	->where('store_id',$store_id)
    	->get()->result_array('');
    	return $auth_store;
    }

    /*
     * 排队
     * 查询操作列表是否已满
     * return  true队列已满，需要排队 false队列未满，可以操作
     * */
     public function get_queue()
     {
         //系统资源吞吐量
         $key = $this->CI->db->select('value')->where('code','system_throughput')->get('system_config')->row('value');
         //队列表中操作数量
         $num = $this->CI->db->from('sys_task')->count_all_results ();
         if ($num<=$key){       //操作数小于吞吐量，队列未满
             return false;
         }else{
             return true;
         }
     }

     /*
      * 排队
      * 修改操作列表的状态
      * @param $arr array() 查询条件
      * @param $state   int 要修改为的状态
      * */
     public function set_queue_state($arr, $state)
     {
         $row = $this->CI->db->where($arr)->update('sys_task',array('task_state' => $state));
         if ($row) {
             return true;
         } else {
             return false;
         }
     }



    /*
     * 推送消息，微信消息和短信;单个事件触发时的推送。
     *
     * wx_data  微信模板
     * wx_code  微信代码
     * tel 手机号
     * sms_data 短信模板
     * url  跳转的url
     * order_sn 订单号
     *
     * return array
     *
     * 示例:
    $wx_data = array(
        "name"=>array("value"=>"商品标题",
            "color"=>"#173177"
        ),
        "remark"=>array("value"=>"您的商品已购买成功，正在为您备货",
            "color"=>"#173177"
        )
    );
    $wx_code = "GMTZ";

    $tel = '15528395597';

    $sms_data['phone'] = $tel;
    $content = array('name'=>"姓名");
    $sms_data['content'] = json_encode($content);
    $sms_data['template_sms_id'] = 'SMS_88370015';

    $order_sn ='1245857457';
    $url = base_url('vmall.php/order/order_detail?order_sn=').$order_sn;

    send_msg($wx_data, $wx_code, $tel, $sms_data, $url, $order_sn);


     * */
    public function send_msg($wx_data, $wx_code, $tel, $content=null, $url=null, $order_sn=null,$template_id)
    {
        $result =array('state'=>false,'msg'=>'推送失败,请稍后再试！');
        $temp = '';
        $resp = '';
        //手机号码判断用户是否已经是会员
        $this->CI->db->select('user_id,wx_openid,wx_nickname');
        $this->CI->db->from('user');
        $this->CI->db->where('tel',$tel);
        $userinfo = $this->CI->db->get()->row_array();
        //用户已绑定公众号
        if (!empty($userinfo) && $userinfo['wx_openid']){
            $this->CI->db->select('template_id,template_title')->from('weixin_notify_templates');
            $this->CI->db->where('template_code',$wx_code);
            $temp = $this->CI->db->get()->row_array();
            $data = array(
                "touser"=>"{$userinfo['wx_openid']}",
                "template_id"=>"{$temp['template_id']}",
                "url"=>$url,
                "topcolor"=>"#173177",
                "data"=>json_encode($wx_data)
            );
            $result = $this->send_curl ($data);     //执行发送操作
        }else if(!empty($tel) && $content) {    //用户还没有绑定微信,发短信
           // $resp = $this->AlidayuSms($sms_data);
            $sms_msg= $this->IHhuiYiSmsMarking($tel,$content);
            $this->insertSmsLog($sms_msg,$tel,$content,$template_id);
            return 'ok';
        }
        //微信模板消息推送日志
        if(isset($result['errmsg']) && $result['errmsg']=='ok'){
            $arr=array(
                'wnl_title'=>$temp['template_title'],
                'wnl_code'=>$wx_code,
                'wnl_content'=>json_encode($wx_data),
                'wnl_type'=>3,
                'wnl_time'=>time(),
                'wnl_to_usersn'=>$userinfo['wx_nickname'],
                'user_id'=>$userinfo['user_id'],
                'order_sn'=>$order_sn
            );
            $this->CI->db->insert('weixin_notify_log',$arr);
            $result ['state'] = true;
            $result ['msg'] = "推送成功，用户已收到发货通知！";
        }
        //短信发送日志
/*        if (isset($sms_data) && !empty($sms_data)){
            if(isset($resp['result']['err_code'])&&$resp['result']['err_code']==0) {
                $arr=array(
                    'send_sms_time'=>time(),
                    'sms_template_id'=>0,
                    'send_user_id'=>'0000',
                    'send_user_ip'=>'127.0.0.1',
                    'recevice_mobile'=>$tel,
                    'is_success'=>1,
                    'recevice_content'=>$sms_data['msg'],
                    'back_message'=>$resp['result']['msg']
                );
                $this->CI->db->insert('sms_log',$arr);
                $result ['state'] = true;
                $result ['msg'] = "推送成功，用户已收到发货通知！";
            }else{
                $arr=array(
                    'send_sms_time'=>time(),
                    'sms_template_id'=>0,
                    'send_user_id'=>'0000',
                    'send_user_ip'=>'127.0.0.1',
                    'recevice_mobile'=>$tel,
                    'is_success'=>0,
                    'recevice_content'=>$sms_data['msg']
                );
                $this->CI->db->insert('sms_log',$arr);
            }
        }*/

/*      if (isset($res) && !empty($res)){
                $arr=array(
                    'send_sms_time'=>time(),
                    'sms_template_id'=>0,
                    'send_user_id'=>'0000',
                    'send_user_ip'=>'127.0.0.1',
                    'recevice_mobile'=>$tel,
                    'is_success'=>$res['satus'],
                    'recevice_content'=>$sms_data['msg'],
                    'back_message'=>$res['msg'],
                    //add
                    'received_state'=>0,
                    'task_id'=>$res['smsid'],//互亿无线短信流水号
                    'received_msg'=>0,
                    'login_user_type'=>0,
                );
                $this->CI->db->insert('sms_log',$arr);
                $result ['state'] =$res['satus'];
                $result ['msg'] = $res['msg'];
            }*/

        return $result;
    }


    /*
     *
     *
     *  1为同步 2为发货 3为完成
     * */
    public function send_g_msg($order_sn=null,$type,$tel,$sms_data,$wx_data){
        $result =array('state'=>false,'msg'=>'推送失败,请稍后再试！');
        $temp = array ();
        $son  = array ();
        $resp = array ();
        $wnl_code = '';
        //手机号码判断用户是否已经是会员
        $this->CI->db->select('user_id,wx_openid,wx_nickname');
        $this->CI->db->from('user');
        $this->CI->db->where('tel',$tel);
        $userinfo = $this->CI->db->get()->row_array();
        if ($type==1)       //同步订单
        {
            //用户已绑定公众号
            if (!empty($userinfo) && $userinfo['wx_openid']){
                $this->CI->db->select('template_id,template_title');
                $this->CI->db->from('weixin_notify_templates');
                $this->CI->db->where('template_code','GMTZ');
                $temp = $this->CI->db->get()->row_array();
                $son=array(
                    "name"=>array("value"=>"{$wx_data['name']}",
                        "color"=>"#173177"
                    ),
                    "remark"=>array("value"=>"{$wx_data['remark']}",
                        "color"=>"#173177"
                    )
                );
                $data = array(
                    "touser"=>"{$userinfo['wx_openid']}",
                    "template_id"=>"{$temp['template_id']}",
                    "url"=>base_url('vmall.php/order/order_detail?order_sn=').$order_sn,
                    "topcolor"=>"#173177",
                    "data"=>json_encode($son)
                );
                $result = $this->send_curl ($data);     //执行发送操作
                $wnl_code = 'GMTZ';    //模板类型
            } else if(!empty($tel)) {    //用户还没有绑定微信,发短信
                $data['phone'] = $tel;
                $content = array('name'=>"{$sms_data['name']}");
                $data['content'] = json_encode($content);
                $data['template_sms_id'] = 'SMS_88370015';
                $resp = $this->AlidayuSms($data);
            }
        } elseif ($type == 2) {   //发货通知
            //用户已绑定公众号
            if (!empty($userinfo) && $userinfo['wx_openid']){
                $this->CI->db->select('template_id,template_title');
                $this->CI->db->from('weixin_notify_templates');
                $this->CI->db->where('template_code','SPYFH');
                $temp = $this->CI->db->get()->row_array();
                //定义微信消息模板
                $son=array(
                    "first"=>array("value"=>"{$wx_data['first']}",
                        "color"=>"#173177"
                    ),
                    "delivername"=>array("value"=>"{$wx_data['delivername']}"."\n",
                        "color"=>"#173177"
                    ),
                    "ordername"=>array("value"=>"{$wx_data['ordername']}"."\n",
                        "color"=>"#173177"
                    ),
                    "remark"=>array("value"=>"{$wx_data['remark']}",
                        "color"=>"#173177"
                    )
                );
                $data = array(
                    "touser"=>"{$userinfo['wx_openid']}",
                    "template_id"=>"{$temp['template_id']}",
                    "url"=>base_url('vmall.php/order/order_detail?order_sn=').$order_sn,
                    "topcolor"=>"#173177",
                    "data"=>json_encode($son)
                );
                $result = $this->send_curl ($data);     //执行发送操作
                $wnl_code = 'SPYFH';    //模板类型
            } else {    //用户还没有绑定微信,发短信
                $data['phone'] = $tel;
                $content = array('name'=>"{$sms_data['name']}");
                $data['content'] = json_encode($content);
                $data['template_sms_id'] = 'SMS_88370015';
                $resp = $this->AlidayuSms($data);
            }
        } elseif ($type == 3){  //订单完成通知
            //用户已绑定公众号
            if (!empty($userinfo) && $userinfo['wx_openid']){
                $this->CI->db->select('template_id,template_title');
                $this->CI->db->from('weixin_notify_templates');
                $this->CI->db->where('template_code','DDWC');
                $temp = $this->CI->db->get()->row_array();
                //定义微信消息模板
                $son=array(
                    "first"=>array("value"=>"{$wx_data['first']}",
                        "color"=>"#173177"
                    ),
                    "keyword1"=>array("value"=>"{$wx_data['keyword1']}"."\n",
                        "color"=>"#173177"
                    ),
                    "keyword2"=>array("value"=>"{$wx_data['keyword2']}"."\n",
                        "color"=>"#173177"
                    ),
                    "remark"=>array("value"=>"{$wx_data['remark']}",
                        "color"=>"#173177"
                    )
                );
                $data = array(
                    "touser"=>"{$userinfo['wx_openid']}",
                    "template_id"=>"{$temp['template_id']}",
                    "url"=>base_url('vmall.php/order/order_detail?order_sn=').$order_sn,
                    "topcolor"=>"#173177",
                    "data"=>json_encode($son)
                );
                $result = $this->send_curl ($data);     //执行发送操作
                $wnl_code = 'DDWC';    //模板类型
            } else {    //用户还没有绑定微信,发短信
                $data['phone'] = $tel;
                $content = array('name'=>"{$sms_data['name']}");
                $data['content'] = json_encode($content);
                $data['template_sms_id'] = 'SMS_88370015';
                $resp = $this->AlidayuSms($data);
            }
        }

        //记录日志
        if($result['errmsg']=='ok'){
            $arr=array(
                'wnl_title'=>$temp['template_title'],
                'wnl_code'=>$wnl_code,
                'wnl_content'=>json_encode($son),
                'wnl_type'=>3,
                'wnl_time'=>time(),
                'wnl_to_usersn'=>$userinfo['wx_nickname'],
                'user_id'=>$userinfo['user_id'],
                'order_sn'=>$order_sn
            );
            $this->CI->db->insert('weixin_notify_log',$arr);
            $result ['state'] = true;
            $result ['msg'] = "推送成功，用户已收到发货通知！";
        }
        if(isset($resp['result']['err_code'])&&$resp['result']['err_code']==0) {
            $arr=array(
                'send_sms_time'=>time(),
                'sms_template_id'=>'',
                'send_user_id'=>'0000',
                'send_user_ip'=>'127.0.0.1',
                'recevice_mobile'=>$tel,
            );
            $this->CI->db->insert('sms_log',$arr);
            $result ['state'] = true;
            $result ['msg'] = "推送成功，用户已收到发货通知！";
        }
    }

    //执行微信模板推送操作
    public function send_curl($data)
    {
        $url=base_url('vmall.php/receive/weixin_send_msg');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        $result = curl_exec($ch);
        curl_close($ch);
        $result=json_decode($result,true);
        $result = object_array(json_decode($result,true));
        return $result;
    }
     /**
     * 发送验证码，绑定手机、忘记密码等处使用
     * @param  var $mobile   手机号  如18108129768
     * @param  var $content  您的验证码3056，15分钟内有效，打死也不要告诉别人
     * @author leeyoung
     */
    public function IHhuiYiSms($mobile,$content)
    {
    	//短信接口地址
		$target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
		$post_data = "account=C40497483&password=b3c7b75985be104c27293083cef41666&mobile=".$mobile."&content=".rawurlencode($content);
		//用户名是登录用户中心->验证码短信->产品总览->APIID
		//查看密码请登录用户中心->验证码短信->产品总览->APIKEY
		$pots=$this->IHuiYiPost($post_data, $target);
		$gets=$this->IHuiYiXmlToArray($pots);
		if($gets['SubmitResult']['code']==2){
			return array('satus'=>true,'msg'=>'发送成功');
		}
		else{
			return array('satus'=>false,'msg'=>$gets['SubmitResult']['code'].$gets['SubmitResult']['msg']);
		}
    }
     /**
     * 发送营销短信，在购买通知、发货通知、订单完成通知部分
     * @param  var $mobile   手机号  多个号码请用,隔开；如18108129768
     * @param  var $content  发送内容，如尊敬的【李先生】，您购买的产品【ABC】仓库已准备发货。关注服务号：聚客360，可查看物流信息，获得商家积分。订单完成后可在服务号领取商家好礼。 回T退订
     * @author leeyoung
     */
    public function IHhuiYiSmsMarking($mobile,$content)
    {

    	$target = "http://api.yx.ihuyi.com/webservice/sms.php?method=Submit";
		//$mobile ='18108129768';//手机号码，多个号码请用,隔开
		$post_data = "account=M43385459&password=52ac2c87fe45c030e10a627af849e497&mobile=".$mobile."&content=".rawurlencode($content."【云聚客】");
		//用户名是登录用户中心->营销短信->产品总览->APIID
		//查看密码请登录用户中心->营销短信->产品总览->APIKEY
		$pots=$this->IHuiYiPost($post_data, $target);
		$gets=$this->IHuiYiXmlToArray($pots);
		if($gets['SubmitResult']['code']==2){
			return array('satus'=>true,'msg'=>'发送成功','smsid'=>$gets['SubmitResult']['smsid']);
		}
		else{
			return array('satus'=>false,'msg'=>$gets['SubmitResult']['code'].$gets['SubmitResult']['msg'],
                'smsid'=>'0');
		}
		
    }
    
    public function IHuiYiXmlToArray($xml){
		$reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
		if(preg_match_all($reg, $xml, $matches)){
			$count = count($matches[0]);
			for($i = 0; $i < $count; $i++){
			$subxml= $matches[2][$i];
			$key = $matches[1][$i];
				if(preg_match( $reg, $subxml )){
					$arr[$key] =$this->IHuiYiXmlToArray( $subxml );
				}else{
					$arr[$key] = $subxml;
				}
			}
		}
		return $arr;
	}
	public function IHuiYiPost($curlPost,$url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
		$return_str = curl_exec($curl);
		curl_close($curl);
		return $return_str;
   }
    //互亿无线，营销短信(购买通知，发货通知)发送内容，封装。
    public function make_send_content($content,$arr){

/*        $STORE_NAME=isset($STORE_NAME)?$STORE_NAME:'本店';//$STORE_NAME,$BRAND_NAME,$GOODS_NAME
        $BRAND_NAME=isset($BRAND_NAME)?$BRAND_NAME:'';
        $USER_NAME=isset($USER_NAME)?$USER_NAME:'用户';
        $STORE_NAME='本店';
        $BRAND_NAME='';
        $USER_NAME=isset($USER_NAME)?$USER_NAME:'用户';;*/


        $content= strtr($content,$arr);

      /*  $content = str_replace('{$BRAND_NAME}',$BRAND_NAME,str_replace('{$STORE_NAME}',$STORE_NAME,
            str_replace('{$USER_NAME}',$USER_NAME,$content)));*/
        return $content;

    }
   //yu
   public function insertSmsLog($sms_msg,$mobile,$content,$template_id){
   	//   var_dump($sms_log_data);
   	//  echo"<hr/>";
   	// echo  $this->CI->db->last_query();


       $sms_log_data['send_sms_time']=time();
       $sms_log_data['sms_template_id']=$template_id;
       $sms_log_data['send_user_id']=$_SESSION['shop_spg_id'];//导购id

       $sms_log_data['send_user_ip']=$_SERVER['REMOTE_ADDR'];
       $sms_log_data['recevice_mobile']=$mobile;
       $sms_log_data['is_success']=$sms_msg['satus'];
       $sms_log_data['back_message']=$sms_msg['msg'];
       $sms_log_data['recevice_content']=$content;

       $sms_log_data['task_id']=$sms_msg['smsid'];
       $sms_log_data['received_msg']=0;
       $sms_log_data['login_user_type']=2;
       $sms_log_data['store_id']=$_SESSION['shop_spg_store_id'];
       $this->CI->db->insert('sms_log',$sms_log_data);
       unset($sms_log_data);
   }
    //更新SMS_LOG表的effective字段。
    function  update_sms_log_effective($tel){

        $arr=$this->db->select('send_sms_id,send_sms_time')->where('recevice_mobile =',$tel)->get('sms_log')->result_array();
        //  var_dump($arr);
        $time=0;
        foreach($arr as $key=>$value){
            if($value['send_sms_time']>$time){
                $time=$value['send_sms_time'];
                $send_sms_id=$value['send_sms_id'];
            }
        }
        $data=array('effective'=>'1');
        $this->db->where('send_sms_id =',$send_sms_id)->update('sms_log', $data);

    }


    //得到当前时间毫秒数
   public function get_msectime(){
       list($msec, $sec) = explode(' ', microtime());
       $msectime =  (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
       return $msectime;
   }
   //获取平台公众号二维码
   public function get_plat_qrcode(){
   	$qrcode = $this->CI->db->select('value')->where('code','gzh')->where('type','two_code')->get('system_config')->row('value');
   	return PLUGIN.$qrcode;
   }
   
   
   //获取中文字符串首字母
   public function getFirstCharter($str){
       if(empty($str)){return '';}
       $fchar=ord($str{0});
       if($fchar>=ord('A')&&$fchar<=ord('z')) return strtoupper($str{0});
       $s1=iconv('UTF-8','gb2312',$str);
       $s2=iconv('gb2312','UTF-8',$s1);
       $s=$s2==$str?$s1:$str;
       $asc=ord($s{0})*256+ord($s{1})-65536;
       if($asc>=-20319&&$asc<=-20284) return 'A';
       if($asc>=-20283&&$asc<=-19776) return 'B';
       if($asc>=-19775&&$asc<=-19219) return 'C';
       if($asc>=-19218&&$asc<=-18711) return 'D';
       if($asc>=-18710&&$asc<=-18527) return 'E';
       if($asc>=-18526&&$asc<=-18240) return 'F';
       if($asc>=-18239&&$asc<=-17923) return 'G';
       if($asc>=-17922&&$asc<=-17418) return 'H';
       if($asc>=-17417&&$asc<=-16475) return 'J';
       if($asc>=-16474&&$asc<=-16213) return 'K';
       if($asc>=-16212&&$asc<=-15641) return 'L';
       if($asc>=-15640&&$asc<=-15166) return 'M';
       if($asc>=-15165&&$asc<=-14923) return 'N';
       if($asc>=-14922&&$asc<=-14915) return 'O';
       if($asc>=-14914&&$asc<=-14631) return 'P';
       if($asc>=-14630&&$asc<=-14150) return 'Q';
       if($asc>=-14149&&$asc<=-14091) return 'R';
       if($asc>=-14090&&$asc<=-13319) return 'S';
       if($asc>=-13318&&$asc<=-12839) return 'T';
       if($asc>=-12838&&$asc<=-12557) return 'W';
       if($asc>=-12556&&$asc<=-11848) return 'X';
       if($asc>=-11847&&$asc<=-11056) return 'Y';
       if($asc>=-11055&&$asc<=-10247) return 'Z';
       return null;
   }
   
   
   
   //删除数据不全的活动
   public  function delete_micro_bargain(){
       $this->CI->db->select('bargain_id,bargain_image,share_image');
       $this->CI->db->from('shop_p_bargain');
       $this->CI->db->where('start_time <'.time());
       $info = $this->CI->db->get()->result_array();
       if($info){
           foreach ($info as $ks=>$vs){
               if(empty($vs['bargain_image']) || empty($vs['share_image']) ){
                   $this->CI->db->trans_off(); //禁用事务
                   $this->CI->db->trans_start(); //开启事务
                   $this->CI->db->where('bargain_id',$vs['bargain_id'])->delete ('shop_p_bargain_log_friends');
                   $this->CI->db->where('bargain_id',$vs['bargain_id'])->delete('shop_p_bargain_log');
                   $this->CI->db->where('bargain_id',$vs['bargain_id'])->delete('shop_p_bargain_attr');
                   $this->CI->db->where('bargain_id',$vs['bargain_id'])->delete('shop_p_bargain');
                   $this->CI->db->trans_complete(); //事务完成
                   $this->CI->db->trans_off(); //禁用事务
               }
           }
       }
   }

   //签到操作
    public function sign_log($sign_id,$sign_time,$sign_type){//点击签到操作；需要传值有：活动id,签到类型，签到时间
        $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';

        $this->db->trans_start();//事物开启
        //判断本次签到所得奖品，记录到user_sign_log表
        $data=array();
        $data['sign_id']=$sign_id;
        $data['sign_time']=strtotime($sign_time);
        $data['user_id']=$user_id;
        $data['sign_type']=$sign_type;
        $data['add_time']=time();

        $sign_day=strtotime($sign_time);
        $month=date('Y-m',$sign_day);//本月,格式：2017-10
        $day=explode('-',$month);
        $thismonth=$day[1];
        $thisyear=$day[0];
        $startDay = $thisyear . '-' . $thismonth . '-1';
        $endDay = $thisyear . '-' . $thismonth . '-' . date('t', strtotime($startDay));
        $b_time  = strtotime($startDay);//当前月的月初时间戳
        $e_time  = strtotime($endDay);//当前月的月末时间戳
        $this->db->select('count(log_id) as num');
        $this->db->from('user_sign_log');
        $this->db->where('sign_id',$sign_id);
//        $this->db->where('sign_time>',$b_time);
//        $this->db->where('sign_time<',$e_time);//若活动规则是累计天数只计算当前月份，可开启
        $this->db->where('user_id',$user_id);
        $total_sign_day=$this->db->get()->row('num');//得到该用户在该签到活动下，本月已签到的次数
        $total_sign_day=intval($total_sign_day+1);//加上本次

        $this->db->select('*');
        $this->db->from('shop_p_sign_rule');
        $this->db->where('sign_id',$sign_id);
        $this->db->order_by('sign_day');
        $sign_rule=$this->db->get()->result_array();//获取当前签到活动规则
//        var_dump ($sign_rule);die;
        foreach($sign_rule as $k=>$v){
            if($v['sign_day']=='0'){
                $sign_prize=$v['sign_prize'];//将每天签到给与的奖品id保存,166
            }
        }
        $have=0;
        foreach($sign_rule as $k1=>$v1){
            if($total_sign_day==intval($v1['sign_day'])){//如果累计签到天数与签到规则中某一天数相等，则给与对应的奖品
                $sign_prize=$sign_rule[$k1]['sign_prize'];
                $data['sign_state']='0';
                $have=1;
            }
        }
        $data['sign_prize']=$sign_prize;
        $this->db->insert('user_sign_log',$data);
        $log_id= $this->db->insert_id();
        if(isset($have) && ($have!=1)){//如果是领取每天的积分奖励，直接加入用户表
            $coupon_id=$sign_prize;
            $this->db->select('coupon_type');
            $this->db->from('shop_coupon');
            $this->db->where('coupon_id',$coupon_id);
            $coupon_type=$this->db->get()->result_array();
            $coupon_type=$coupon_type[0]['coupon_type'];
            if($coupon_type==3){//如果是积分奖励，直接对用户积分充值,改变签到日志的sign_state，并插入user_intergral表
                $this->db->select('coupon_value');
                $this->db->from('shop_coupon');
                $this->db->where('coupon_id',$coupon_id);
                $coupon_value=$this->db->get()->result_array();
                $coupon_point=$coupon_value[0]['coupon_value'];
                $add_integral=$coupon_point;
                $this->db->select ('integral,integral_total');
                $this->db->from ('user');
                $this->db->where ('user_id', $user_id);
                $int = $this->db->get ()->result_array ();
                $integ = $int[0]['integral'];
                $integral_total = $int[0]['integral_total'];
                $integral['integral'] = intval ($integ + $add_integral);
                $integral['integral_total'] = intval ($integral_total + $add_integral);
                $this->db->where ('user_id', $user_id);
                $this->db->update ('user', $integral);

                $state['sign_state']='1';
                $this->db->where('log_id',$log_id);
                $this->db->update('user_sign_log',$state);//改变日志表的状态sign_state

                $this->db->select('sign_title');
                $this->db->from('shop_p_sign');
                $this->db->where('sign_id',$sign_id);
                $sign_title=$this->db->get()->result_array();
                $sign_title=$sign_title[0]['sign_title'];//获取当前签到活动名称
                $data=array();
                $data['user_id']=$user_id;
                $data['integral_num']=$add_integral;
                $data['ation_time']=time();
                $data['action_user_id']='0';
                $data['action_user_type']='0';
                $data['action_type']='0';
                $data['note']='签到活动'.$sign_title.'日常签到获得';
                $this->db->insert('user_integral',$data);
            }
        }
        if(($sign_type==2)){//补签
            $this->db->select('count(log_id) as num');
            $this->db->from('user_sign_log');
            $this->db->where('sign_id',$sign_id);
            $this->db->where('sign_time>',$b_time);
            $this->db->where('sign_time<',$e_time);
            $this->db->where('user_id',$user_id);
            $this->db->where('sign_type',$sign_type);
            $retro_num=$this->db->get()->row('num');//得到该用户在该签到活动下本月补签次数
            if($retro_num<11) {//限制一月最多只能签十次
                //更新user表
                $reduce_integral = intval ($retro_num * 20);
                $this->db->select ('integral,integral_total');
                $this->db->from ('user');
                $this->db->where ('user_id', $user_id);
                $int = $this->db->get ()->result_array ();
                $integ = $int[0]['integral'];
                $integral_total = $int[0]['integral_total'];
                $integral['integral'] = intval ($integ - $reduce_integral);
                $integral['integral_total'] = intval ($integral_total - $reduce_integral);
                $this->db->where ('user_id', $user_id);
                $this->db->update ('user', $integral);
                //插入user_integral表
                $this->db->select('sign_title');
                $this->db->from('shop_p_sign');
                $this->db->where('sign_id',$sign_id);
                $sign_title=$this->db->get()->result_array();
                $sign_title=$sign_title[0]['sign_title'];//获取当前签到活动名称
                $reduce_integral = intval ($retro_num * 20);
                $data=array();
                $data['user_id']=$user_id;
                $data['integral_num']='-'.$reduce_integral;
                $data['ation_time']=time();
                $data['action_user_id']='0';
                $data['action_user_type']='0';
                $data['action_type']='0';
                $data['note']='签到活动'.$sign_title.'补签扣除';
                $this->db->insert('user_integral',$data);

            }else{
                $res['state']=false;//2表示签到失败
                $res['message'] = '本月补签次数已达上限';
                return $res;
            }
        }
        $res['state']=$this->db->trans_complete();//事物完成
        $this->db->trans_off();//禁用事物
        $res['message']='签到成功';
        return $res;
    }

    public function draw_sign($coupon_id){//点击领取签到奖励，需要将奖品的coupon_id传过来,然后加入到user_coupon表生成卡劵
        $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
        $sign_rule_id=$this->db->select('sign_id,sign_rule_id')->from('shop_p_sign_rule')->where('sign_prize',$coupon_id)->get()->result_array();
        $coupon['coupon_from_id']=$sign_rule_id[0]['sign_rule_id'];
        $coupon['coupon_id']=$coupon_id;
        $coupon['coupon_activity_id']=$sign_rule_id[0]['sign_id'];
        $coupon['coupon_activity_type']='7';
        $coupon['coupon_ger_time']=time();
        $coupon['user_id']=$user_id;
        $res['state']=$this->db->insert('user_coupon',$coupon);
        $res['message']='领取成功';
        return $res;
    }
    
    public function integral_log($user_id,$add_integral=0,$note='',$type=0,$action_id = 0,$action_name=''){
    	$data=array();
    	$data['user_id']=$user_id;
    	$data['integral_num']=$add_integral;
    	$data['ation_time']=time();
    	$data['action_user_id']=$action_id;
    	$data['action_user_name']=$action_name;
    	$data['action_user_type']=empty($action_id)?0:$action_id;
    	$data['action_type']=$type;
    	$data['note']=$note;
    	$this->CI->db->insert('user_integral',$data);
    }
   




   
   
}

?>
