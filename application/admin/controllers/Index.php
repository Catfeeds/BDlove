<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->session_database = $this->config->item('sess_save_path');
    }
	
	public function index(){
	if ((!isset($_SESSION['shop_admin_id']) || intval($_SESSION['shop_admin_id']) <= 0))
       {
           header("location:".base_url("admin.php/index/login"));
           exit();
            
       }
	    
	    $new_menu = array ();
	    $this->load->model('menu_model');
	    $menu_data = $this->menu_model->menu();
	    $_SESSION['action_list'] = 'all'; // TODO
	    foreach ( $menu_data as $key => $val ) {
	        foreach ( $val ['content'] as $ka => $va ) {
	            foreach ( $va ['list'] as $listkey => $list ) {
 	                $boole = $this->common_function->shop_admin_priv ( $list ['role'], false );
	                if (! $boole) {
 	                    continue;
	                }
	                $new_menu [$key] ['content'] [$ka] ['list'] [$listkey] = $list;
	            }
	            if (isset ( $new_menu [$key] ['content'] [$ka] ['list'] )) {
	                $new_menu [$key] ['content'] [$ka] ['text'] = $va ['text'];
	                $new_menu [$key] ['content'] [$ka] ['role'] = $va ['role'];
	            }
	        }
	        if (isset ( $new_menu [$key] ['content'] )) {
	            $new_menu [$key] ['args'] = $val ['args'];
	            $new_menu [$key] ['role'] = $val ['role'];
	            $new_menu [$key] ['text'] = $val ['text'];
	        }
	    }

	    if (empty ( $new_menu )) {
	        $this->common_function->show_message ( '你没有任何权限' );
	    }
	    //print_r($_SESSION);
	    $this->smarty->assign('user_name',$_SESSION['shop_admin_name']);
	    $this->smarty->assign('role_name',$_SESSION['shop_admin_role_name']);
	    $this->smarty->assign ( 'menu_data', $new_menu );
	    $this->smarty->display ( 'admin_index.html' );
	}
	public function login(){
	    $this->smarty->assign('random',     mt_rand());
	    $this->smarty->display ( 'login.html' );
	}
	//检验验证码
	public function check_captcha(){
	    $captcha = isset($_POST['captcha']) ? trim($_POST['captcha']) : '';
	    $given = encrypt_pwd(strtoupper(trim($captcha)));
	    $recorded = isset($_SESSION['code']) ? ($_SESSION['code']) : '';
	    if(strcasecmp($recorded,$given)!=0){
	        $data = array('state'=>false,'msg'=>'验证码错误');
	    }else{
	        $data = array('state'=>true,'msg'=>'');
	    }
	    echo  json_encode($data);
	}
	/* 登录验证*/
	public function check(){
	    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
	    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
	    $this->db->select('a.admin_id,a.admin_name ,a.admin_pwd, a.admin_login_time, a.admin_login_num,
	      a.admin_is_super, a.admin_last_ip, r.role_name, r.role_actions')
		      ->from('admin AS a')
		      ->join('admin_role AS r','a.role_id = r.role_id','left')
		      ->where('a.admin_name',$username)
		      ->where('a.admin_pwd', encrypt_pwd($password));
		      $row = $this->db->get()->row_array();
		      if($row){
		          // 登录成功 销毁session的验证码
		          $this->session->unset_userdata('code');
		          if($row['admin_is_super'] == 1)//超级管理员
		          {
		              $row['role_actions'] = 'all';
		              $role_name = '超级管理员';
		          }else{
		              $role_name = $row['role_name'];
		          }
		          $where = " sesskey!='".$_COOKIE['jk_shop_session_name']."'";
		          $sess = $this->db->select('sesskey')->where('admin_id',$row['admin_id'])->where($where)->get($this->session_database)->row('sesskey');
		          if(!empty($sess)){
		              $this->db->where('sesskey',$sess)->delete($this->session_database);
		          }
		          $this->db->where('sesskey',$_COOKIE['jk_shop_session_name'])->update($this->session_database,array('admin_id'=>$row['admin_id']));
		          //设置SESSION
		          $arr = array('shop_admin_id'=>$row['admin_id'],'shop_admin_name'=>$row['admin_name'],'shop_admin_action_list'=>$row['role_actions'],
		              'shop_admin_role_name'=>$role_name,'shop_admin_last_time'=>$row['admin_login_time'],'shop_admin_last_ip'=>real_ip()
		          );
		          $this->session->set_userdata($arr);
		          //set_shop_admin_session($row['admin_id'], $row['admin_name'], $row['role_actions'],$role_name ,$row['admin_login_time']);
		          //print_r($_SESSION);
		          // 记录日志
		          $this->common_function->shop_admin_log($username, 'login', '管理员');
		          // 更新最后登录时间和IP
		          $data = array('admin_login_num'=>$row['admin_login_num']+1,'admin_login_time' => gmtime(), 'admin_last_ip' => real_ip());
		          $where = "admin_id = {$row['admin_id']}";
		          $str = $this->db->update('admin', $data, $where);
		          $data = array('state'=>true);
		          setcookie('shop_rootpath');
		          echo  json_encode($data);
		      }elseif(empty($row)){
		          $data = array('state'=>false,'msg'=>'账号或密码错误');
		          echo  json_encode($data);
		      }
	}
	/* 生成验证码*/
	public function verify_image(){
	    $this->load->library('captcha');
	    //* 检查验证码是否正确
	    //$validator = new captcha();
	
	    $img = new captcha(ROOTPATH . 'data/captcha/');
	    @ob_end_clean(); //清除之前出现的多余输入
	    $code = $img->generate_image();
	    /* 记录验证码到session*/
	    $word = $code['word'];
	    $this->session->set_userdata('code', encrypt_pwd($word));
	     
	}
	/*------------------------------------------------------ */
	//-- 退出登录
	/*------------------------------------------------------ */
	public function logout()
	{
	    /* 清除session */
	    //print_r($_SESSION);exit;
	    if(isset($_COOKIE['jk_shop_session_name'])){
	        $this->db->where('sesskey',$_COOKIE['jk_shop_session_name'])->delete($this->session_database);
	    }
	    //setcookie('jk_shop_session_name');
	    session_unset();
	    $this->session->sess_destroy();
	    header("location:".base_url("admin.php/index/login"));
	
	}
}
