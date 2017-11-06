<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('pay_model');
    }
	
	public function index(){
	    if ((!isset($_SESSION['shop_spg_store_id']) || intval($_SESSION['shop_spg_store_id']) <= 0))
	    {
	        header("location:".base_url("pay.php/index/login"));
	        exit();

	    }
	   $total = $this->db->select('sum(goods_num) as total')->from('shop_cart')->where('buyer_id',$_SESSION['shop_spg_store_id'])->where('user_type',2)->get()->row('total');
	   $this->smarty->assign('cart_total',$total);
	   $this->pay_model->storeInfo();
	   $this->smarty->display('index.html');     
	}
	public function login(){
	   $this->smarty->assign('random',     mt_rand());
	   $this->smarty->display('login.html');     
	}
	public function login_out(){
	    /* 清除session */
	    session_unset();
	    $this->session->sess_destroy();
	    header("location:".base_url("pay.php/index/login"));
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
	/*验证码验证*/
	public function check_captcha(){
	    $captcha = isset($_POST['captcha']) ? trim($_POST['captcha']) : '';
	    $given = encrypt_pwd(strtoupper(trim($captcha)));
	    $recorded = isset($_SESSION['code']) ? ($_SESSION['code']) : '';
	    //print_r($given);print_r($recorded);exit;
	    if(strcasecmp($recorded,$given)!=0){
	        $data = array('state'=>false,'msg'=>'验证码错误');
	    }else{
	        $data = array('state'=>true,'msg'=>$recorded);
	    }
	    
	    echo  json_encode($data);
	}
	/* 登录验证*/
	public function check_login(){
	    $type       = isset($_GET['type']) ? intval($_GET['type']) : 0;
	    $username   = isset($_POST['user']) ? trim($_POST['user']) : '';
	    $password   = isset($_POST['pwd']) ? trim($_POST['pwd']) : '';
	    $data       = array('state'=>false,'msg'=>'');
	    if($username&&$password){
	        if($type==1){
	            $row = $this->db->select('g.*,s.store_name,s.ous_address,s.ous_type')
	            ->from('store_shopping_guide as g')->join('store as s','s.store_id=g.spg_store_id','left')
	            ->where('spg_tel',$username)->get()->row_array();
	            if(empty($row)){
	                $data = array('state'=>false,'msg'=>'该账户不存在');
	            }else{
	                if($row['role_type'] < 2){
	                    $data = array('state'=>false,'msg'=>'该账户没有该权限');
	                }else if(!isset($row['store_name']) || empty($row['store_name'])) {
                        $data = array('state'=>false,'msg'=>'该账户未绑定店铺');
                    }else{
	                    $pwd = $row['password'];
	                    if($pwd==encrypt_pwd($password)){
	                        $this->session->unset_userdata('code');
                            $role = $this->db->where('role_id', $row['role_type'])->get('platform_roles')->row('role_actions');
	                        $arr = array(
	                            'shop_dpms_id'          => '',
                                'shop_dpms_name'        => '',
                                'shop_dpms_tel'         => '',
                                'shop_spg_store_type'   => $row['ous_type'],
	                            'shop_spg_id'           => $row['spg_id'],
                                'shop_spg_nike_name'    => $row['spg_nike_name'],
                                'shop_spg_tel'          => $row['spg_tel'],
	                            'shop_spg_store_id'     => $row['spg_store_id'],
                                'shop_spg_name'         => $row['spg_name'],
                                'shop_pay_type'         => 1,
	                            'shop_store_name'       => $row['store_name'],
                                'address'               => $row['ous_address'],
                                'shop_role_type'        => $row['role_type'],
                                'role'                  => $role,
	                        );
	                        $this->session->set_userdata($arr);
	                        $data = array('state'=>true);
	                    }else{
	                        $data = array('state'=>false,'msg'=>'密码错误');
	                    }
	                }
	            }
	            echo  json_encode($data);exit;
	        }else{
	            //$row = $this->db->select('*')->where('dpms_name',$username)->get('department_store')->row_array();
	            $row = array();
	            if(empty($row)){
	                $row = $this->db->select('*')->where('spg_tel',$username)->get('store_shopping_guide')->row_array();
	                if(empty($row)){
	                    $data = array('state'=>false,'msg'=>'该账户不存在');
	                }else{
	                    $depart = $this->db->select('ds.dpms_id,ds.dpms_name,ds.dpms_contact_name,ds.dpms_contact_tel,ds.dpms_address')
	                    ->from('department_store_att da')->join('department_store ds','ds.dpms_id=da.dpms_id','left')
	                    ->where('da.store_id',$row['spg_store_id'])->get()->row_array();
	                    if(empty($depart)){
	                        $data = array('state'=>false,'msg'=>'该账户所属门店还没有集合店');
	                        echo  json_encode($data);exit;
	                    }
	                    if($row['role_type'] < 2){
	                        $data = array('state'=>false,'msg'=>'该账户没有该权限');
	                    }else{
	                        $pwd = $row['password'];
	                        if($pwd==encrypt_pwd($password)){
	                            $this->session->unset_userdata('code');
	                            $store_id_arr = $this->db->select('group_concat(store_id) as store')->where('dpms_id',$depart['dpms_id'])->get('department_store_att')->row('store');
	                            $arr = array(
	                                'shop_dpms_id'          => $depart['dpms_id'],
                                    'shop_dpms_name'        => $depart['dpms_name'],
                                    'shop_dpms_tel'         => $depart['dpms_contact_tel'],
	                                'shop_spg_id'           => $row['spg_id'],
                                    'shop_spg_nike_name'    => $row['spg_nike_name'],
                                    'shop_spg_tel'          => $row['spg_tel'],
	                                'shop_spg_store_id'     => $store_id_arr,
                                    'shop_spg_name'         => $row['spg_name'],
                                    'shop_pay_type'         => 0,
	                                'shop_store_name'       => '',
                                    'address'               => $depart['dpms_address'],
	                            );
	                            $this->session->set_userdata($arr);
	                            $data = array('state'=>true);
	                        }else{
	                            $data = array('state'=>false,'msg'=>'密码错误');
	                        }
	                    }
	                }
	                echo  json_encode($data);exit;
	            }else{
	                $depart = $row;
                    $pwd = $row['password'];
                    if($pwd==encrypt_pwd($password)){
                        $this->session->unset_userdata('code');
                        $store_id = array();
                        $store_id_arr = $this->db->select('store_id')->where('dpms_id',$row['dpms_id'])->get('department_store_att')->result_array();
                        foreach ($store_id_arr as $v){
                            $store_id[] = $v['store_id'];
                        }
                        $store_id = join(',',$store_id);
                        $depart =$row;
                        $arr = array(
                            'shop_dpms_id'          =>$depart['dpms_id'],
                            'shop_dpms_name'        =>$depart['dpms_name'],
                            'shop_dpms_tel'         =>$depart['dpms_contact_tel'],
                            'shop_spg_id'           =>'',
                            'shop_spg_nike_name'    =>'',
                            'shop_spg_tel'          =>'',
                            'shop_spg_store_id'     =>$store_id,
                            'shop_spg_name'         =>'',
                            'shop_pay_type'         =>0,
                            'shop_store_name'       =>'',
                            'address'               =>$row['dpms_address'],
                        );
                        $this->session->set_userdata($arr);
                        $data = array('state'=>true);
                    }else{
                        $data = array('state'=>false,'msg'=>'密码错误');
                    }
	                
	            }
	            echo  json_encode($data);exit;
	        }
	        
	    }else{
	        $data = array('state'=>false,'msg'=>'账号或密码不能为空');
	        echo  json_encode($data);exit;
	    }
	   
	}

}
