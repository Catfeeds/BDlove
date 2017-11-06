<?php
class Money extends CI_Controller {
    public function __construct() {

        parent::__construct();
        $this->load->library ( 'common_function' );
        $this->load->model("user_model");
        $this->load->model('weixin_model');
        $config_images = $this->common_function->get_default_img();
        $this->smarty->assign('config_images', $config_images);
    }
    
    //我的余额
    public function index(){
        $this->weixin_model->get_user_openid(base_url('vmall.php/money/index'));
        $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
        
        //查看是否有冻结资金（是否有提现申请）
        $this->db->select('amount,user_name');
        $this->db->from('withdraw_apply');
        $this->db->where('apply_user_id',$user_id);
        $this->db->where('apply_type',1);
        $this->db->where('state',0);
        $applyinfo = $this->db->get()->row_array();
        $amount = 0;
        if($applyinfo){
            $amount = $applyinfo['amount'];
        }
        //openid获取用户信息
        $this->db->select('balance,head_portrait');
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $userinfo = $this->db->get()->row_array();
        $userinfo['balance'] = number_format(($userinfo['balance'] - $amount), 2, '.', '');
        $this->smarty->assign('userinfo',$userinfo);
        $this->smarty->display('money_balance.html');
    }
    
    //充值
    public function recharge(){
        $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
        $rechargeCode = mt_rand(1000,9999);
        $this->session->set_userdata('rechargePostCode',$rechargeCode);
        $this->smarty->assign('rechargePostCode',$rechargeCode);
        $this->smarty->display('money_recharge.html');
    }
    

    public function post_recharge(){
        $postCode = isset($_POST['rechargePostCode'])?$_POST['rechargePostCode']:'';
        $checkCode = isset($_SESSION['rechargePostCode'])?$_SESSION['rechargePostCode']:'';
        if(!(!empty($postCode)&&!empty($checkCode)&&$checkCode==$postCode)){
            echo '支付订单已提交，勿再次提交！';
            sleep(2);
            header("location:".base_url("vmall.php/money/index"));
            die;
        }
        
        $user_id = $_SESSION['user_id'];
        $payNum = isset($_POST['payNum'])?$_POST['payNum']:0;
        $Pay_sn = $this->common_function->makePaySn($user_id);
        $paydata = array(
            'pay_sn'=>$Pay_sn,
            'payNum'=>$payNum
        );
        header("location:".base_url('vmall.php/wxpay/recharge?paydata=').json_encode($paydata));exit;
    }
    

    
    //提现
    public function drawing(){
        $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :"";
        //openid获取用户信息
        $this->db->select('balance,wx_nickname,head_portrait');
        $this->db->from('user');
        $this->db->where('user_id',$user_id);
        $userinfo = $this->db->get()->row_array();
        
        //openid获取用户信息
        $this->db->select('amount,user_name');
        $this->db->from('withdraw_apply');
        $this->db->where('apply_user_id',$user_id);
        $this->db->where('apply_type',1);
        $this->db->where('state',0);
        $applyinfo = $this->db->get()->result_array();
        if(empty($applyinfo)){
            $applyinfo="false";
        }else{
            $applyinfo="true";
        }
        $this->smarty->assign('applyinfo',$applyinfo);
        $this->smarty->assign('userinfo',$userinfo);
        $this->smarty->display('money_drawing.html');
         
    }
    
    
    //提交提现数据
    public function post_drawing(){
        $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :false;
        $result = array('state'=>false,"msg"=>"系统繁忙，稍后再试!");
        //openid获取用户信息
        $this->db->select('amount,user_name');
        $this->db->from('withdraw_apply');
        $this->db->where('apply_user_id',$user_id);
        $this->db->where('apply_type',1);
        $this->db->where('state',0);
        $applyinfo = $this->db->get()->result_array();
        if($applyinfo){
            $result['msg'] = "对不起，您还有未处理的提现申请，不能再次提现！";
            echo json_encode($result);exit;
        }
        
        
        $wx_nickname = $this->db->select('wx_nickname')->where('user_id',$user_id)->get('user')->row('wx_nickname');
        $amount = isset($_POST['amount']) && !empty($_POST['amount'])? $_POST['amount']:false;
        $data = array(
            "apply_user_id"=>$user_id,
            "apply_type"=>1,
            "user_name"=>$wx_nickname,
            "amount"=>$amount,
            "receivable_name"=>$wx_nickname,
            "state"=>0,
            "bank_type"=>2,
            "apply_time"=>time(),
        );

        
        if($this->db->insert('withdraw_apply',$data)){
            $result['state'] = true;
            $result['msg'] = "已发起提现申请，请耐心等待！";
        }
        echo json_encode($result);exit;
    }

    //用户收支明细
    public function money_detail(){
        $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :false;
        //openid获取用户信息
        $this->db->select('ual_id,pay_sn,log_type,asset_out,asset_in,asset,time');
        $this->db->from('user_asset_log');
        $this->db->where('user_id',$user_id);
        $this->db->order_by('time','DESC');
        $applyinfo = $this->db->get()->result_array();
        $this->smarty->assign('applyinfo',$applyinfo);
        $this->smarty->display('money_detail.html');
    }




}