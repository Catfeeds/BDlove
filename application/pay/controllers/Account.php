<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('pay_model');
        $this->load->library('shop');
        //$this->load->library('session');
    }



    /*基本资料*/
    public function info(){
        if ((!isset($_SESSION['shop_spg_store_id']) || empty($_SESSION['shop_spg_store_id'])))
        {
            header("location:".base_url("pay.php/index/login"));
            exit();
        }
        $brandss='';
        $brands=$this->db->select('b.brand_name,b.brand_id')->from('store_attr_brands ab')->join('shop_brand b','ab.brand_id=b.brand_id')
            ->where('ab.store_id',$_SESSION['shop_spg_store_id'])->get()->result_array();
        if(!empty($brands)){
            foreach ($brands as $v){
                $brandss.=$v['brand_name'].',';
            }
            $brandss=rtrim($brandss,',');
        }
        $auth_store=$this->db->distinct()->select('auth_store_name')->where('store_id',$_SESSION['shop_spg_store_id'])->get('store_auth_store')->result_array();
        $auth_stores='';
        if(!empty($auth_store)){
            foreach ($auth_store as $v){
                $auth_stores.=$v['auth_store_name'].',';
            }
            $auth_stores=rtrim($auth_stores,',');
        }
        $storeinfo=$this->db->select("*")->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row_array();
        $storeinfo['province_name'] = $this->db->select('area_name')->where('area_id',$storeinfo['province_id'])->get('area')->row('area_name');
        $storeinfo['city_name'] = $this->db->select('area_name')->where('area_id',$storeinfo['city_id'])->get('area')->row('area_name');
        $storeinfo['area_name'] = $this->db->select('area_name')->where('area_id',$storeinfo['area_id'])->get('area')->row('area_name');
//        $storeinfo['delivery_date'] = explode (',',$storeinfo['delivery_date']);
//        $storeinfo['not_delivery_time'] = explode (',',$storeinfo['not_delivery_time']);
        $area_data = $this->shop->get_area_info();
        $this->smarty->assign('area_data',$area_data);
        $this->smarty->assign('area_datajs',json_encode($area_data));
        $this->smarty->assign('brands',$brandss);
        $this->smarty->assign('auth_stores',$auth_stores);
        $this->smarty->assign('storeinfo',$storeinfo);
        $this->smarty->display('account-info.html');
    }


    /*编辑基本资料*/
    public function edit_info()
    {
        if ((!isset($_SESSION['shop_spg_store_id']) || empty($_SESSION['shop_spg_store_id']))) {
            header("location:".base_url("pay.php/index/login"));
            exit();
        }
        $dir = './data/store/';
        $storeinfo=array();
        $storeinfo['province_id']           = isset($_POST['class_province'])?$_POST['class_province']:'';
        $storeinfo['city_id']               = isset($_POST['class_city'])?$_POST['class_city']:'';
        $storeinfo['area_id']               = isset($_POST['class_area'])?$_POST['class_area']:'';
        $storeinfo['ous_address']           = isset($_POST['address'])?$_POST['address']:'';
        $storeinfo['ous_tel']               = isset($_POST['tel'])?$_POST['tel']:'';
        $storeinfo['ous_business_hours']    = isset($_POST['time'])?$_POST['time']:'';
        $storeinfo['ous_dec']               = isset($_POST['beizhu'])?$_POST['beizhu']:'';
        $storeinfo['last_update_userId']    = $_SESSION['shop_spg_id'];
        $storeinfo['last_update_time']      = time();
        $storeinfo['last_update_user_type'] = 2;
        $storeinfo['ous_tag']               = isset($_POST['ous_tag'])?$_POST['ous_tag']:'';
        //$storeinfo['bind_ecstore_name']     = isset($_POST['store'])?$_POST['store']:'';
        $storeinfo['partime_jobs_limit']    = isset($_POST['part-time-guide']) ? $_POST['part-time-guide']:'';
        $storeinfo['delivery_time']         = isset($_POST['delivery_time']) ? $_POST['delivery_time']:'';
        $storeinfo['delivery_date']         = isset($_POST['delivery_date']) ? implode (',',$_POST['delivery_date']) : '';
        $storeinfo['not_delivery_time']     = isset($_POST['not_delivery_time']) ? $_POST['not_delivery_time'] : '';

        if(isset($_POST['store-name'])&&!empty($_POST['store-name'])){
            $storeinfo['store_name']=$_POST['store-name'];
        }
        if(isset($_POST['code'])&&!empty($_POST['code'])){
            $storeinfo['ous_out_sn']=$_POST['code'];
        }
        if(isset($_POST['paypwd'])){
            unset($_POST['paypwd']);
        }
        $upload=true;
        if(isset($_FILES['file-1'])&&!empty($_FILES['file-1']['tmp_name'])){
            $ous_logo=$_FILES['file-1'];
            if(stripos('image/png,image/jpeg,image/jpg,image/gif',trim($ous_logo['type']))===false){
                $this->common_function->show_message('图片格式不正确！');
            }else{
                if(!empty($ous_logo['name'])){
                    $name = explode(".", $ous_logo['name']);
                    $new_name = 'ous_logo_'.$_SESSION['shop_spg_store_id'].'.'.strtolower($name[count($name)-1]);
                    if(!@move_uploaded_file($ous_logo['tmp_name'],FCPATH.$dir.$new_name)){
                        $upload = false;
                    }
                }
                if(!$upload){
                    $this->common_function->show_message('图片上传失败！');
                }else{
                    $storeinfo['ous_logo']=$dir.$new_name;
                }
            }
        }
        if(isset($_FILES['file-2'])&&!empty($_FILES['file-2']['tmp_name'])){
            $ous_shop_signs=$_FILES['file-2'];
            if(stripos('image/png,image/jpeg,image/jpg,image/gif',trim($ous_shop_signs['type']))===false){
                $this->common_function->show_message('图片格式不正确！');
            }else{
                if(!empty($ous_shop_signs['name'])){
                    $name = explode(".", $ous_shop_signs['name']);
                    $new_name = 'ous_shop_signs_'.$_SESSION['shop_spg_store_id'].'.'.strtolower($name[count($name)-1]);
                    if(!@move_uploaded_file($ous_shop_signs['tmp_name'],FCPATH.$dir.$new_name)){
                        $upload = false;
                    }
                }
                if(!$upload){
                    $this->common_function->show_message('图片上传失败！');
                }else{
                    $storeinfo['ous_shop_signs']=$dir.$new_name;
                }
            }
        }

        if($this->db->where('store_id',$_SESSION['shop_spg_store_id'])->update('store',$storeinfo)){
            $links = array(
                0 => array(
                    'text' => '基本资料',
                    'href' => 'info'
                ),
                1 => array(
                    'text' => '返回',
                    'href' => 'javascript:history.go(-1)'
                ),

            );
            $this->common_function->show_message('修改成功',0 ,$links);
            //header("location:".base_url("pay.php/Account/info"));
        }else{
            $this->common_function->show_message('更改失败，请稍后重试！');
        }
    }

    /*门店支付密码修改*/
    public function store_paypwd(){
        $this->common_function->pay_role("seller_pay_edit");//权限
        $data = array('state'=>false,'msg'=>'系统错误，请稍后再试');
        if($_POST['pwd']) {
            $pwd = trim ($_POST['pwd']);
            $this->db->where ('store_id', $_SESSION['shop_spg_store_id'])->update ('store', array ('paypwd' => encrypt_pwd ($pwd)));
            $data = array ('state' => true, 'msg' => '保存成功');
        }
        echo json_encode($data);exit();
    }


    /*安全设置*/
    public function userInfo(){
        if ((!isset($_SESSION['shop_spg_store_id']) || empty($_SESSION['shop_spg_store_id'])))
        {
            header("location:".base_url("pay.php/index/login"));
            exit();
        }
        $ip='';
        $result=$this->db->select('spg_id,spg_name,head_portrait,reg_time,spg_tel,pay_pwd,bind_email')->where('spg_id',$_SESSION['shop_spg_id'])->get('store_shopping_guide')->row_array();
        $result['reg_time']=date('Y-m-d H:i:s',$result['reg_time']);
        $result['head_portrait']=empty($result['head_portrait'])?PLUGIN.'plugins/H-ui/static/h-ui/images/ucnter/avatar-default.jpg':PLUGIN.$result['head_portrait'];
        $result['spg_phone']=substr_replace($result['spg_tel'],'****',3,4);

        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip='.$_SERVER['REMOTE_ADDR']); //获取ip地址的所在地(网上找的免费接口)
        if(empty($res)){
            $ip='' ;
        }else{
            $jsonMatches = array();
            preg_match('#\{.+?\}#', $res, $jsonMatches);
            if(!isset($jsonMatches[0])){
                $ip='';
            }else{
                $json = json_decode($jsonMatches[0], true);
                if(isset($json['ret']) && $json['ret'] == 1){
                    $json['ip'] = $_SERVER['REMOTE_ADDR'];
                    $ip=$json['province'].'-'.$json['city'].'&nbsp'.$json['ip'];
                    unset($json['ret']);
                }else{
                    $ip='';
                }
            }
        }
        $result['ip']=$ip;

        $this->smarty->assign('result',$result);
    	$this->smarty->display('account-userInfo.html');
    }

    /*修改安全设置*/
    public function edit_safe(){
        if ((!isset($_SESSION['shop_spg_store_id']) || empty($_SESSION['shop_spg_store_id'])))
        {
            header("location:".base_url("pay.php/index/login"));
            exit();
        }
        if(isset($_GET['tag'])){
            $info=$this->db->select('spg_id,spg_tel,password,pay_pwd,bind_email')->where('spg_id',$_SESSION['shop_spg_id'])->get('store_shopping_guide')->row_array();
            if($_GET['tag']=='password'){
                if($info['password']!=encrypt_pwd($_POST['old_p'])){
                    $res=array('state'=>false,'msg'=>'原始密码错误');
                }else{
                    $new_p=encrypt_pwd($_POST['new_p']);
                    if($this->db->set('password',$new_p)->where('spg_id',$_SESSION['shop_spg_id'])->update('store_shopping_guide')){
                        $res=array('state'=>true,'msg'=>'修改登录密码成功');
                    }else{
                        $res=array('state'=>false,'msg'=>'修改登录密码失败,请稍后再试');
                    }
                }
            }elseif ($_GET['tag']=='paypassword'){
                $new_p=encrypt_pwd($_POST['new_p']);
                if(empty($info['pay_pwd'])){
                    if($this->db->set('pay_pwd',$new_p)->where('spg_id',$_SESSION['shop_spg_id'])->update('store_shopping_guide')){
                        $res=array('state'=>true,'msg'=>'修改支付密码成功');
                    }else{
                        $res=array('state'=>false,'msg'=>'修改支付密码失败,请稍后再试');
                    }
                }else{
                    if($info['pay_pwd']!=encrypt_pwd($_POST['old_p'])){
                        $res=array('state'=>false,'msg'=>'原始密码错误');
                    }else{
                        $new_p=encrypt_pwd($_POST['new_p']);
                        if($this->db->set('pay_pwd',$new_p)->where('spg_id',$_SESSION['shop_spg_id'])->update('store_shopping_guide')){
                            $res=array('state'=>true,'msg'=>'修改支付密码成功');
                        }else{
                            $res=array('state'=>false,'msg'=>'修改支付密码失败,请稍后再试');
                        }
                    }

                }
                //var_dump($_POST);die;
            }
        }else{
            $res=array('state'=>false,'msg'=>'发生错误，请稍后再试');
        }

        echo json_encode($res);exit();
    }


    /*发生短信验证码*/
    public function send_code(){
        $mobile=$_POST['tel'];
        if(preg_match("/^1[34578]{1}\d{9}$/", $mobile)){
            $s_time=$this->session->has_userdata('bind_code_time');
            $time=$this->session->userdata('bind_code_time');
            if(!($s_time && (time()-$time)<300)){
                $code=rand(100000,999999);
                $content = array('code'=>"$code",'product'=>"云聚客系统绑定手机修改");
                $data['phone'] = $mobile;
                $data['content'] = json_encode($content);
                $data['template_sms_id'] = 'SMS_62130011';
                $resp = $this->common_function->AlidayuSms($data);
                if(isset($resp['result']['success'])&&$resp['result']['success']==true){
                    $newdata = array(
                        'bind_code'=> $code,
                        'bind_code_time'=>time(),
                    );
                    $this->session->set_userdata($newdata);
                    $res=array('state'=>true,'msg'=>'验证码发送成功,请在一分钟内输入');
                }else{
                    $res=array('state'=>false,'msg'=>'验证码发送失败,请稍后重试');
                }
            }
        }else{
            $res=array('state'=>false,'msg'=>'手机号码不正确');
        }
        echo json_encode($res);exit();
    }

    /*验证手机短信验证码*/
    public function code_validate(){
        if ((!isset($_SESSION['shop_spg_store_id']) || empty($_SESSION['shop_spg_store_id'])))
        {
            header("location:".base_url("pay.php/index/login"));
            exit();
        }
        $code=$_POST['code'];
        if(isset($_GET['tag'])&&$_GET['tag']=='old'){
            if($this->session->has_userdata('bind_code')){
                if($code==$_SESSION['bind_code']){
                    $res=array('state'=>true,'msg'=>'');
                    $this->session->unset_userdata('bind_code');
                    $this->session->unset_userdata('bind_code_time');
                }else{
                    $res=array('state'=>false,'msg'=>'验证码错误');
                }
            }else{
                $res=array('state'=>false,'msg'=>'验证码已过期,请重新发送');
            }
        }elseif (isset($_GET['tag'])&&$_GET['tag']=='new'){
            if(preg_match("/^1[34578]{1}\d{9}$/", $_POST['tel'])){
                if($this->session->has_userdata('bind_code')){
                    if($code==$_SESSION['bind_code']){
                        if($this->db->set('spg_tel',$_POST['tel'])->where('spg_id',$_SESSION['shop_spg_id'])->update('store_shopping_guide')){
                            $res=array('state'=>true,'msg'=>'绑定手机修改成功');
                            $this->session->unset_userdata('bind_code');
                            $this->session->unset_userdata('bind_code_time');
                        }else{
                            $res=array('state'=>false,'msg'=>'更改失败，请重新提交');
                        }
                    }else{
                        $res=array('state'=>false,'msg'=>'验证码错误');
                    }
                }else{
                    $res=array('state'=>false,'msg'=>'验证码已过期,请重新发送');
                }
            }else{
                $res=array('state'=>false,'msg'=>'手机号码不正确');
            }

        }else{
            $res=array('state'=>false,'msg'=>'发生错误,请稍后重试');
        }

        echo json_encode($res);exit();
    }

    /*上传头像*/
    public function head_pic(){
        if ((!isset($_SESSION['shop_spg_store_id']) || empty($_SESSION['shop_spg_store_id'])))
        {
            header("location:".base_url("pay.php/index/login"));
            exit();
        }
        $res=array('state'=>false,'msg'=>'图片上传失败，请稍后再试');
        $dir = './data/store_guide_headportrait/';
        if(isset($_FILES['file-1'])&&!empty($_FILES['file-1']['tmp_name'])){
            $head=$_FILES['file-1'];
            if(stripos('image/png,image/jpeg,image/jpg,image/gif',trim($head['type']))===false){
                $res=array('state'=>false,'msg'=>'图片格式不正确');
            }else{
                if(!empty($head['name'])){
                    $name = explode(".", $head['name']);
                    $new_name = 'head_portrait_'.$_SESSION['shop_spg_id'].'.'.strtolower($name[count($name)-1]);
                    if(!@move_uploaded_file($head['tmp_name'],FCPATH.$dir.$new_name)){
                        $res=array('state'=>false,'msg'=>'图片上传失败，请稍后再试');
                    }else{
                        $this->db->set('head_portrait',$dir.$new_name)->where('spg_id',$_SESSION['shop_spg_id'])->update('store_shopping_guide');
                        $res=array('state'=>true,'msg'=>'图片上传成功');
                    }
                }else{
                    $res=array('state'=>false,'msg'=>'图片上传失败，请稍后再试');
                }
            }
        }
        echo json_encode($res);exit();
    }


    /*收支明细*/
    public function accountDetails(){
        if ((!isset($_SESSION['shop_spg_store_id']) || empty($_SESSION['shop_spg_store_id'])))
        {
            header("location:".base_url("pay.php/index/login"));
            exit();
        }
        $this->smarty->assign ('url', base_url ('pay.php/Account/get_accountDetails'));
        $this->smarty->display('account_details.html');
    }

    /*收支明细列表*/
    public function get_accountDetails(){
        if ((!isset($_SESSION['shop_spg_store_id']) || empty($_SESSION['shop_spg_store_id'])))
        {
            header("location:".base_url("pay.php/index/login"));
            exit();
        }

        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? $_POST['query'] : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;

        if (isset($_GET['pay_sn']) && !empty($_GET['pay_sn'])) {
            $this->db->like('pay_sn', trim ($_GET['pay_sn']));
        }

        if (isset($_GET['log_type']) && !empty($_GET['log_type'])) {
            $this->db->where('log_type', trim ($_GET['log_type']));
        }

        if (isset($_GET['sal_id']) && !empty($_GET['sal_id'])) {
            $this->db->like('sal_id', trim ($_GET['sal_id']));
        }

        if(isset($_GET['datemin']) && !empty($_GET['datemin'])){
            $this->db->where("time >= ",strtotime($_GET['datemin']));
        }
        if(isset($_GET['datemax']) && !empty($_GET['datemax'])){
            $this->db->where("time <= ",strtotime($_GET['datemax'])+86400);
        }

        $this->db->select('*')->from('store_asset_log')->where('store_id',$_SESSION['shop_spg_store_id']);
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
        $start = ($page - 1) * $rp;
        $this->db->limit($rp,$start);
        $this->db->order_by('time DESC,sal_id DESC');
        $rows=$this->db->get()->result_array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml = '';
        $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
        $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
        $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
        if ($total == 0) {
            $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr>';
            echo $xml;
            exit;
        }
        $log_type = $this->get_log_type();
        foreach ($rows as $k=>$row){
            $xml .= "<tr id='row" . $row['sal_id'] . "' data-id='" . $row['sal_id'] . "'>";
            $xml .= "<td style='text-align: center'>".$row['sal_id']."</td>";
            $xml .= "<td style='text-align: center'>".$row['pay_sn']."</td>";
            $type = isset($log_type[$row['log_type']])?$log_type[$row['log_type']]:'--';
            //$type = $row['log_type']==1?'提现':($row['log_type']==2?'充值':($row['log_type']==3?'订单收入':($row['log_type']==4?'退款':($row['log_type']==5?'平台抽成':'平台返点'))));
            $xml .= "<td style='text-align: center'>".$type."</td>";
            $xml .= "<td style='text-align: center'>".$row['asset_out']."</td>";
            $xml .= "<td style='text-align: center'>".$row['asset_in']."</td>";
            $xml .= "<td style='text-align: center'>".$row['asset']."</td>";
            $xml .= "<td style='text-align: center'>".$row['note']."</td>";
            $row['time'] = !empty($row['time']) ? date('Y-m-d H:i:s',$row['time']) : '--';
            $xml .= "<td style='text-align: center'>".$row['time']."</td>";
            $xml .= "</tr>";
        }
        echo $xml;exit();

    }
    private function get_log_type(){
    	return array(1=>'提现',2=>'充值',3=>'订单收入',4=>'退款',5=>'平台抽成',6=>'平台抽成',7=>'购物支出');
    }

    /*账户充值*/
    public function recharge(){
        if ((!isset($_SESSION['shop_spg_store_id']) || empty($_SESSION['shop_spg_store_id']))) {
            header("location:".base_url("pay.php/index/login"));
            exit();
        }
        if(isset($_GET['tag'])&&$_GET['tag']=='recharge'){
            $paySn=$this->common_function->makePaySn($_SESSION['shop_spg_id']);//支付单号
            if($_POST['type']==1){
                $code=$this->qrpay($paySn,$_POST['money'],$_SESSION['shop_spg_store_id']);
            }else if($_POST['type']==0){
                $ture_price=$_POST['money']*100;
                $code=$this->native($paySn,$ture_price,$_SESSION['shop_spg_store_id']);
            }

            if($code===false){
                $res=array('state'=>false,'msg'=>'充值失败');
            }else{
                $res=array('state'=>true,'code'=>$code,'type'=>$_POST['type']==1?'支付宝支付':'微信支付','paysn'=>$paySn);
                $data=array(
                    'pay_sn'=>$paySn,
                    'pay_type'=>$_POST['type']==1?2:4,
                    'user_type'=>1,
                    'apply_user_id'=>$_SESSION['shop_spg_store_id'],
                    'user_name'=>$_SESSION['shop_spg_name'],
                    'amount'=>$_POST['money'],
                    'bank_name'=>'',
                    'receivable_note'=>'',
                    'state'=>2,
                    'apply_time'=>time(),
                    'operate_time'=>time(),
                );
                $this->db->insert('recharge_apply',$data);
            }
            echo json_encode($res);exit();
        }elseif(isset($_GET['tag'])&&$_GET['tag']=='cash'){
//            $storeinfo=$this->db->select('balance,bind_alipay_sn,bind_alipay_name,bind_bank_uname,bind_bank_usn,bind_bank_name,bind_weixin_guid,bind_weixin_name')->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row_array();
//            if($_POST['type']==2){
//                $bank_name=$storeinfo['bind_alipay_name'];
//            }elseif ($_POST['type']==3){
//                $bank_name=$storeinfo['bind_bank_name'];
//            }elseif ($_POST['type']==4){
//                $bank_name=$storeinfo['bind_weixin_name'];
//            }
            $data=array(
                'pay_sn'=>'',
                'pay_type'=>3,
                'user_type'=>1 ,
                'apply_user_id'=>$_SESSION['shop_spg_store_id'],
                'user_name'=>$_POST['uname'],
                'amount'=>$_POST['cash'],
                'bank_name'=>$_POST['bank_id'],     //存储格式  银行名字-银行卡号
                'receivable_note'=>$_POST['note'],
                'state'=>0,
                'apply_time'=>time(),
            );
            if($this->db->insert('recharge_apply',$data)){
                $res=array('state'=>true,'msg'=>'提交成功,等待管理员核实');
            }else{
                $res=array('state'=>false,'msg'=>'提交失败，请稍后再试');
            }
            echo json_encode($res);exit();

        }else{
            $types   = [];
            $balance = $this->db->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row('balance');
//            $storeinfo['balance']=empty($storeinfo['balance'])?0:$storeinfo['balance'];
//            if(!empty($storeinfo['bind_alipay_sn'])){
//                $alipay['name']='支付宝('.$storeinfo['bind_alipay_sn'].')';
//                $alipay['code']=2;
//                $types[]=$alipay;
//            }
//            if(!empty($storeinfo['bind_bank_usn'])){
//                $bank['name']=$storeinfo['bind_bank_name'].'('.$storeinfo['bind_bank_usn'].')';
//                $bank['code']=3;
//                $types[]=$bank;
//            }
//            if(!empty($storeinfo['bind_weixin_guid'])){
//                $weixin['name']='微信('.$storeinfo['bind_weixin_guid'].')';
//                $weixin['code']=4;
//                $types[]=$weixin;
//            }
            $types = $this->db->from('sys_account')->select('bank_id,bank_name,bank_sn')->get()->result_array();

            $this->smarty->assign('balance',sprintf("%.2f",$balance));
            $this->smarty->assign('types',$types);
            $this->smarty->display('account-recharge.html');
        }
    }

    /*检查支付情况*/
    public function check_pay(){
        if(isset($_POST['paysn'])&&!empty($_POST['paysn'])){
            $store_asset_log=$this->db->select('sal_id')->where('pay_sn',$_POST['paysn'])->where('log_type',2)->where('store_id',$_SESSION['shop_spg_store_id'])->get('store_asset_log')->row_array();
            if(empty($store_asset_log)){
                $res=array('state'=>false);
            }else{
                $data=array(
                    'state' => 1
                );
                $this->db->where('pay_sn',$_POST['paysn'])->update('recharge_apply',$data);
                $res=array('state'=>true,'msg'=>'支付成功');
            }
        }else{
            $res=array('state'=>false);
        }
        echo json_encode($res);exit();

    }


    /*微信扫二维码支付*/
    private function native($payId,$price,$storeid){
        ini_set('date.timezone','Asia/Shanghai');
        require_once ROOTPATH."libraries/Wxpay/lib/WxPay.Api.php";
        require_once ROOTPATH."libraries/Wxpay/example/WxPay.NativePay.php";
        require_once ROOTPATH.'libraries/Wxpay/example/log.php';
        $input = new WxPayUnifiedOrder();
        $notify_url = base_url('pay.php/Account/weixin_notify');
        //var_dump($notify_url);die;
        $input->SetBody('云聚客门店账户充值');
        $input->SetAttach($storeid);
        $input->SetOut_trade_no($payId);
        $input->SetTotal_fee($price);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetNotify_url($notify_url);
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id($payId);
        $notify = new NativePay();
        $result = $notify->GetPayUrl($input);
        if(isset($result["code_url"])){
            $url2 = $result["code_url"];
            $urlcode="http://paysdk.weixin.qq.com/example/qrcode.php?data=".urlencode($url2);
            //var_dump($urlcode);
            return $urlcode;
        }else{
            return false;
        }
    }

    /*微信回调*/
    public function weixin_notify(){
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        $obj = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        $res=object_array($obj);
        if($res['result_code']=='SUCCESS'&&$res['return_code']=='SUCCESS'){
            //判断是否已经处理过，防止微信返回多次相同的通知
            $order_log=$this->db->select('sal_id')->where('pay_sn',$res['out_trade_no'])->where('log_type',2)->where('store_id',$res['attach'])->get('store_asset_log')->row_array();
            if(empty($order_log)){
                $mtcn_sn=$res['transaction_id'];$time=time();
                $price=$res['total_fee']/100;

                $sys_asset=$this->db->select('asset')->order_by('time DESC')->get('sys_asset_account')->row('asset');
                $storeinfo=$this->db->select('follow_user_percentage,balance')->where('store_id',$res['attach'])->get('store')->row_array();
                $storeinfo['balance']=empty($storeinfo['balance'])?0:$storeinfo['balance'];

                $store_log=array('store_id'=>$res['attach'],'log_type'=>2,'asset_in'=>$price,'asset_out'=>0,'pay_sn'=>$res['out_trade_no'],
                    'asset'=>$storeinfo['balance']+$price,'note'=>"通过支付单号".$res['out_trade_no']."收入".$price,'time'=>$time);
                $sys_log=array(
                    'user_id'=>$res['attach'], 'user_type'=>1, 'pay_sn'=>$res['out_trade_no'], 'log_type'=>2, 'asset_out'=>0, 'asset_in'=>$price,
                    'asset'=>$sys_asset+$price, 'note'=>'通过支付单号'.$res['out_trade_no'].'收入'.$price, 'time'=>$time,
                );
                $now_balance=$storeinfo['balance']+$price;
                $this->db->trans_off(); //禁用事务
                $this->db->trans_start(); //开启事务
                $this->db->insert('sys_asset_account',$sys_log);
                $this->db->insert('store_asset_log',$store_log);
                $this->db->set('balance',$now_balance)->where('store_id',$res['attach'])->update('store');
                $this->db->trans_complete(); //事务完成
                $this->db->trans_off(); //禁用事务
                if ($this->db->trans_status() !== false){
                    echo 'SUCCESS';
                }else{
                    echo 'FAIL';
                }
            }
            echo 'SUCCESS';
        }else{
            echo "FAIL";
        }

    }

    /*支付宝扫二维码支付*/
    private function qrpay($orderId,$price,$storeid){
        require_once ROOTPATH.'libraries/alipay/f2fpay/model/builder/AlipayTradePrecreateContentBuilder.php';
        require_once ROOTPATH.'libraries/alipay/f2fpay/service/AlipayTradeService.php';
        require_once ROOTPATH.'libraries/alipay/f2fpay/config/config.php';
        // (必填) 商户网站订单系统中唯一订单号，64个字符以内，只能包含字母、数字、下划线，
        $outTradeNo = $orderId;
        // (必填) 订单标题，粗略描述用户的支付目的。如“xxx品牌xxx门店当面付扫码消费”
        $subject = '云聚客门店账户充值';
        // (必填) 订单总金额，单位为元，不能超过1亿元
        $totalAmount = $price;
        // 支付超时，线下扫码交易定义为5分钟
        $timeExpress = "5m";
        // 订单描述，可以对交易或商品进行一个详细地描述，这里填写门店id"
        $body = $storeid;
        //第三方应用授权令牌,商户授权系统商开发模式下使用
        $appAuthToken = "";//根据真实值填写

        // 创建请求builder，设置请求参数
        $qrPayRequestBuilder = new AlipayTradePrecreateContentBuilder();
        $qrPayRequestBuilder->setOutTradeNo($outTradeNo);
        $qrPayRequestBuilder->setTotalAmount($totalAmount);
        $qrPayRequestBuilder->setTimeExpress($timeExpress);
        $qrPayRequestBuilder->setSubject($subject);
        $qrPayRequestBuilder->setBody($body);
        $qrPayRequestBuilder->setAppAuthToken($appAuthToken);

        //var_dump($config['notify_url']);die;
        // 调用qrPay方法获取当面付应答
        $qrPay = new AlipayTradeService($config);
        $qrPayResult = $qrPay->qrPay($qrPayRequestBuilder);
        if($qrPayResult->getTradeStatus()=='SUCCESS'){
            $res=$qrPayResult->getResponse();
            $qrcode = $qrPay->create_erweimaurl($res->qr_code,$orderId);
            return $qrcode;
        }else{
            return false;
        }
    }

    /*支付宝回调*/
    public function alipay_notify(){
        $result=$_POST;
        if($result&&$result['trade_status']=='TRADE_SUCCESS'){
            //判断是否已经处理过，防止返回多次相同的通知
            $order_log=$this->db->select('sal_id')->where('pay_sn',$result['out_trade_no'])->where('log_type',2)->where('store_id',$result['body'])->get('store_asset_log')->row_array();
            if(empty($order_log)){
                $mtcn_sn=$result['trade_no'];$time=time();

                $sys_asset=$this->db->select('asset')->order_by('time DESC')->get('sys_asset_account')->row('asset');
                $storeinfo=$this->db->select('follow_user_percentage,balance')->where('store_id',$result['body'])->get('store')->row_array();
                $storeinfo['balance']=empty($storeinfo['balance'])?0:$storeinfo['balance'];

                $store_log=array('store_id'=>$result['body'],'log_type'=>2,'asset_in'=>$result['total_amount'],'asset_out'=>0,'pay_sn'=>$result['out_trade_no'],
                    'asset'=>$storeinfo['balance']+$result['total_amount'],'note'=>"通过支付单号".$result['out_trade_no']."收入".$result['total_amount'],'time'=>$time);
                $sys_log=array(
                    'user_id'=>$result['body'], 'user_type'=>1, 'pay_sn'=>$result['out_trade_no'], 'log_type'=>2, 'asset_out'=>0, 'asset_in'=>$result['total_amount'],
                    'asset'=>$sys_asset+$result['total_amount'], 'note'=>'通过支付单号'.$result['out_trade_no'].'收入'.$result['total_amount'], 'time'=>$time,
                );

                $now_balance=$storeinfo['balance']+$result['total_amount'];

                $this->db->trans_off(); //禁用事务
                $this->db->trans_start(); //开启事务
                $this->db->insert('sys_asset_account',$sys_log);
                $this->db->insert('store_asset_log',$store_log);
                $this->db->set('balance',$now_balance)->where('store_id',$result['body'])->update('store');

                $this->db->trans_complete(); //事务完成
                $this->db->trans_off(); //禁用事务
                $delurl=FCPATH."libraries/alipay/img/".$result['out_trade_no'].'.png';
                @unlink($delurl);
                if ($this->db->trans_status() !== false){
                    echo 'success';
                }else{
                    echo 'fail';
                }
            }else{
                echo 'success';
            }
        }else{
            echo 'fail';
        }

    }




    /*账户提现*/
    public function takeCash(){
        $this->common_function->pay_role("seller_cash");//权限
        if ((!isset($_SESSION['shop_spg_store_id']) || empty($_SESSION['shop_spg_store_id'])))
        {
            header("location:".base_url("pay.php/index/login"));
            exit();
        }
        if(isset($_GET['op'])&&$_GET['op']=='apply'){
            $storeinfo=$this->db->select('follow_user_percentage,balance')->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row_array();
//            $guideinfo=$this->db->select('role_type')->where('spg_id',$_SESSION['shop_spg_id'])->get('store_shopping_guide')->row_array();
            $storeinfo['balance']=empty($storeinfo['balance'])?0:$storeinfo['balance'];
            $apply=$this->db->select('amount')->where('apply_type',2)->where('apply_user_id',$_SESSION['shop_spg_store_id'])->where('state',0)->get('withdraw_apply')->row_array();
//            if($guideinfo['role_type']!=2){
//                $res=array('state'=>false,'msg'=>'您没有权限操作提现');
//            }else{
                if(!empty($apply)){
                    $res=array('state'=>false,'msg'=>'尚有未完成的提现申请，请待处理后再申请');
                }else{
                    if($storeinfo['balance']<1){
                        $res=array('state'=>false,'msg'=>'余额至少大于1元才能提现');
                    }else{
                        $res=array('state'=>true);
                    }
                }
//            }
            echo json_encode($res);exit();
        }else{
            $storeinfo=$this->db->select('follow_user_percentage,balance,bind_bank_usn,bind_bank_name')->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row_array();
            $storeinfo['balance']=empty($storeinfo['balance'])?0:$storeinfo['balance'];
            $apply=$this->db->select('amount')->where('apply_type',2)->where('apply_user_id',$_SESSION['shop_spg_store_id'])->where('state',0)->get('withdraw_apply')->row_array();
            if(empty($apply)){
                $balance=$storeinfo['balance'];
            }else{
                $balance=$storeinfo['balance']-$apply['amount'];
            }
            if(empty($storeinfo['bind_bank_usn'])){
                $storeinfo['bind_bank_name']='<font color="red">未绑定</font>';
            }

            $rp=10;
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            if(isset($_POST['datemin']) && !empty($_POST['datemin'])){
                $this->db->where("apply_time >= ",strtotime($_POST['datemin']));
            }
            if(isset($_POST['datemax']) && !empty($_POST['datemax'])){
                $this->db->where("apply_time <= ",strtotime($_POST['datemax'])+86400);
            }
           $this->db->select('*')->from('withdraw_apply')->where('apply_user_id',$_SESSION['shop_spg_store_id'])->where('apply_type',2);
            $db = clone($this->db);
            $total = $this->db->count_all_results();
            $this->db = $db;
            $start = ($page - 1) * $rp;
            $this->db->limit($rp,$start);
            $this->db->order_by('state ASC,operate_time DESC');
            $apply_history=$this->db->get()->result_array();

            foreach ($apply_history as $k=>$v){
                $apply_history[$k]['apply_time']=date('Y-m-d H:i:s',$v['apply_time']);
                $apply_history[$k]['operate_time']=empty($v['operate_time'])?'——':date('Y-m-d H:i:s',$v['operate_time']);
                $apply_history[$k]['state']=$v['state']==0?'待处理':($v['state']==1?'已完成':'已关闭');
                $apply_history[$k]['bank_type']=$v['bank_type']==1?'支付宝':($v['bank_type']==2?'微信':'银行卡');
            }
            $this->smarty->assign('balance',sprintf("%.2f",$balance));
            $this->smarty->assign('history',$apply_history);
            $this->smarty->assign('bank',$storeinfo['bind_bank_usn']);
            $this->smarty->assign('bank_name',$storeinfo['bind_bank_name']);
            $this->smarty->assign('total',ceil($total/$rp));
            $this->smarty->assign('page',$page);
            $this->smarty->display('account-takeCash.html');
        }

    }

    /*提现申请确认*/
    public function sure_cash(){
        $this->common_function->pay_role("seller_cash_apply");//权限
        if(isset($_GET['op'])){
            if($_GET['op']=='sure'){
                $storeinfo=$this->db->select('balance,bind_alipay_sn,bind_alipay_name,bind_bank_uname,bind_bank_usn,bind_bank_name,bind_weixin_guid,bind_weixin_name')->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row_array();
                if($storeinfo['balance']<$_POST['amount']){
                    $res=array('state'=>false,'msg'=>'可提现余额不足');
                }else{
                    if($_POST['type']==2){
                        $usn_name=$storeinfo['bind_alipay_name'];
                        $usn=$storeinfo['bind_alipay_sn'];
                        $usn_uname=$storeinfo['bind_alipay_name'];
                        $type=1;
                    }elseif ($_POST['type']==1){
                        $usn_name=$storeinfo['bind_weixin_name'];
                        $usn=$storeinfo['bind_weixin_guid'];
                        $usn_uname=$storeinfo['bind_weixin_name'];
                        $type=2;
                    }else{
                        $usn_name=$storeinfo['bind_bank_name'];
                        $usn=$storeinfo['bind_bank_usn'];
                        $usn_uname=$storeinfo['bind_bank_uname'];
                        $type=3;
                    }
                    $spg_name=$this->db->select('spg_name')->where('spg_id',$_SESSION['shop_spg_id'])->get('store_shopping_guide')->row('spg_name');
                    $data=array(
                        'apply_user_id'=>$_SESSION['shop_spg_store_id'],
                        'apply_type'=>2,
                        'user_name'=>$spg_name,
                        'amount'=>$_POST['amount'],
                        'bank_name'=>$usn_name,
                        'bank_sn'=>$usn,
                        'bank_type'=>$type,
                        'receivable_name'=>$usn_uname,
                        'state'=>0,
                        'apply_time'=>time(),
                        );
                    if($this->db->insert('withdraw_apply',$data)){
                        $res=array('state'=>true);
                    }else{
                        $res=array('state'=>false,'提交申请失败，请稍后再试');
                    }
                }
            }elseif($_GET['op']=='type'){
                $storeinfo=$this->db->select('bind_alipay_sn,bind_alipay_name,bind_bank_usn,bind_bank_name,bind_weixin_guid,bind_weixin_name')->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row_array();
                if($_POST['type']==2){
                    $usn_name=empty($storeinfo['bind_alipay_sn'])?'<font color="red">未绑定</font>':$storeinfo['bind_alipay_name'];
                    $usn=$storeinfo['bind_alipay_sn'];
                }elseif ($_POST['type']==1){
                    $usn_name=empty($storeinfo['bind_weixin_guid'])?'<font color="red">未绑定</font>':$storeinfo['bind_weixin_name'];
                    $usn=$storeinfo['bind_weixin_guid'];
                }else{
                    $usn_name=empty($storeinfo['bind_bank_usn'])?'<font color="red">未绑定</font>':$storeinfo['bind_bank_name'];
                    $usn=$storeinfo['bind_bank_usn'];
                }
                $res=array('state'=>true,'usn_name'=>$usn_name,'usn'=>$usn);
            }

        }else{
           $res=array('state'=>false);
        }
        echo json_encode($res);
    }


    /****************************************/
    /*
     * 收银台
     * */
    //在线收银
    public function pay_scan(){
        $this->common_function->pay_role("seller_online");//权限
        $this->smarty->display('pay_scan.html');
    }

    //退换商品
    public function pay_refund(){
        $this->common_function->pay_role("seller_refund");//权限
        $this->smarty->display('pay_refund.html');
    }

    public function welcome(){
    	$this->smarty->display('welcome.html');
    }
    public function now_takeCash(){
    	$this->smarty->display('now_takeCash.html');
    }
    public function freight_logistics(){
    	$this->smarty->display('freight_logistics.html');
    }




    public function stock_region(){
	    $this->pay_model->storeInfo();
	    $row = $this->db->select('a.sia_id,a.sia_area_name,sum(i.si_num) as amount')
	    ->from('store_inventory_area as a')
	    ->join('store_inventory as i','i.area_id=a.sia_id','left')
	    ->where("a.store_id IN ({$_SESSION['shop_spg_store_id']})")->group_by('a.sia_id')->get()->result_array();
	    $total = 0;
	    foreach ($row as $v){
	        $total+=$v['amount'];
	    }
	    $this->smarty->assign('row',$row);
	    $this->smarty->assign('total',$total);
	    $this->smarty->display('set_checkarea.html');
	}
	public function region_list(){
	    $row = $this->db->select('a.sia_id,a.sia_area_name,sum(i.si_num) as amount')
	    ->from('store_inventory_area as a')
	    ->join('store_inventory as i','i.area_id=a.sia_id','left')
	    ->where("a.store_id IN ({$_SESSION['shop_spg_store_id']})")->group_by('a.sia_id')->get()->result_array();
	    $str = '';
	    if(!empty($row)){
	        foreach ($row as $k=>$v){
	            $str .= '<tr class="region" data-id="'.$v['sia_id'].'"><td><div class="checkbox"><label>
	            <input type="checkbox"></label></div></td><td>'.($k+1).'</td><td>
	            <input type="text" value="'.$v['sia_area_name'].'" class="form-control region_name"></td>
	            <td class="num">'.$v['amount'].'</td><td class="operationwidth"><div class="col-xs-3">
	            <div class="btn-width">
	            <button class="btn btn-info btn-sm btn-block lookdetail" data-toggle="modal" onclick="seeAll(this)">查看明细</button>
	            </div></div><div class="col-xs-3"><div class="btn-width">
	            <button class="btn btn-info btn-sm btn-block update">确认更改</button></div></div>
	            <div class="col-xs-3"><div class="btn-width">
	            <button class="btn btn-info btn-sm btn-block delete">删除</button></div></div>
	            <div class="col-xs-3"><div class="btn-width">
	            <button class="btn btn-info btn-sm btn-block checkarea">盘点</button></div></div></td></tr>';
	        }
	    }else{
	        $str = '<tr style="font-size:20px;color:red;"><td colspan="5">还没有设置区域，请先添加区域！</td></tr>';
	    }
	    echo $str;exit;
	}
	//店铺绑定
    public function store_sync(){
        $this->common_function->pay_role("seller_bind_ecstore");//权限
    	$store_id = $_SESSION['shop_spg_store_id'];
    	$type = $_POST['type'];
    	$result = array('state'=>false,'msg'=>'操作错误');
    	if($type==1){
    		$code = 1;
    	}elseif($type==2){
    		$code = 2;
    	}else{
    		echo json_encode($result);exit;
    	}
    	$authInfo = $this->db->select('*')->where('ecs_code',$code)->get('ecstore')->row_array();
    	if($authInfo){
    		if($authInfo['ecs_code']==1){
    			$authInfo['ecs_code_name'] = 'jd';
    		}elseif($authInfo['ecs_code']==2){
    			$authInfo['ecs_code_name'] = 'tb';
    		}
    		$authInfo['user_id'] = $store_id;
    		$result = array('state'=>true,'msg'=>'操作错误','obj'=>$authInfo);
    	}else{
    		$result = array('state'=>false,'msg'=>'暂无此类型店铺开发者数据');
    	}
    	echo json_encode($result);exit;
    }
    public function get_taobao_code() {
    	$data = array('state' => true, 'msg' => '系统错误！请检测是否已订阅成功？');
    	//         var_dump($_GET);exit;
    	if (isset($_GET['state'])) {
    		$this->load->library('store_api');
    		$code = isset($_GET['code']) ? $_GET['code'] : false;
    		if ($code) {
    			$app_info = $this->db->select('ecs_id,ecs_name,AppKey,AppSecret')->from('ecstore')->where('ecs_code', 'tb')->get()->row_array();
    			$param = array();
    			$state_arr = explode('|', urldecode($_GET['state']));
    			if ($state_arr[0] == 'reenabled') {
    				$store_id = $state_arr[1];
    				$sessionKey_info = $this->store_api->get_SessionKey($code);
    				if ($sessionKey_info) {
    					$param['bind_token_session'] = $sessionKey_info['access_token'];  //店铺授权key
    					$param['bind_auth_time'] = time();  //店铺授权时间
    					$result = $this->db->update('store', $param,array('store_id'=>$store_id));
    					if ($result) {
    						$data = array('state' => true, 'msg' => '店铺重新授权成功！');
    					}
    				} else {
    					//$this->store_api->get_code($app_info['AppKey'], $app_info['AppSecret']);
    				}
    			} else {
    				$store_id = $state_arr[0];
    				$ecstore_code = $state_arr[1];
    				//$param['user_ecstore_nikeName'] = $state_arr[2];  //本地昵称
    				$sessionKey_info = $this->store_api->get_SessionKey($code);
    				//print_r($sessionKey_info);print_r($state_arr);exit;
    				if ($sessionKey_info) {
    					$param['bind_ecstore_name'] = urldecode($sessionKey_info['taobao_user_nick']);   //淘宝名称
    					$param['bind_ecstore_type'] = 2;  //店铺类型
    					//$param['bind_ecstore_desc'] = json_encode($sessionKey_info);  //描述
    					$param['bind_token_session'] = $sessionKey_info['access_token'];  //店铺授权key
    					$param['bind_auth_time'] = time();  //店铺授权时间
    					$result = $this->db->update('store', $param,array('store_id'=>$store_id));
    					if ($result) {
    						if ($param['bind_ecstore_type'] == 2) {
    							$this->load->library('taobao_op');
    							$this->taobao_op->init($app_info['AppKey'], $app_info['AppSecret'], $param['bind_token_session']);
    							$result = $this->taobao_op->open_tb_msg(); //为已授权的用户开通消息服务
    						}
    						$data = array('state' => true, 'msg' => '店铺添加成功！');
    					}
    				} else {
    					// $this->store_api->get_code($app_info['AppKey'],$app_info['AppSecret']);
    				}
    			}
    		}
    	}
    	$this->smarty->assign('data', $data);
    	$this->smarty->display('authorization_result.html');
    }
    public function get_jd_code() {
    	$result = array('state' => true, 'msg' => '系统错误！请检测是否已订阅成功？');
    	if(isset($_GET['state']) && isset($_GET['code'])){
    		$state_arr = explode('|', urldecode($_GET['state']));
    		if($state_arr[0] == 'reenabled'){
    			$store_id = $state_arr[1];
    		}else{
    			list($store_id,$ecstore_code) = explode('|', urldecode($_GET['state']));
    		}
    		$res = $this->db->select('*')->where('ecs_code','jd')->get('ecstore')->row_array();
    		if(empty($res['AppKey']) || empty($res['AppSecret']) || empty($res['subscription_url'])){
    			$result['msg'] = '系统基础数据获取失败，请联系管理员';
    			$this->smarty->assign('data', $result);
    	        $this->smarty->display('authorization_result.html');exit;
    		}else{
    			$appkey = $res['AppKey'];
    			//        var_dump($appkey);die;
    			$appsecret = $res['AppSecret'];
    			$backurl = $res['callback_url'];
    			$auth_url = $res['auth_url'];
    		}
    	
    		$url = $auth_url.'token?grant_type=authorization_code&client_id='.$appkey.'&redirect_uri='.base_url('pay.php/account/').$backurl.'&code='.$_GET['code'].'&state='.$_GET['state'].'&client_secret='.$appsecret.'&store_type=jd';
    		$ch = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    		$data = curl_exec($ch);
    		curl_close($ch);
    		!empty($data) or die(str_replace('{datamsg}', $strf.'授权信息获取失败，请重试！', $html));
    		$data = iconv("GBK", "UTF-8", $data);
    		$data = json_decode($data,true);
    		$time = time() - 10;
    		if(isset($data['code'])&&$data['code']!=0){
    			if($data['code'] == '405'){
    				$task = ",<a style='color:red;' href='{$res['subscription_url']}' title='点击跳转到订购页面'>点此快速订购</a>";
    				$result['msg'] = $task;
    				$this->smarty->assign('data', $result);
    				$this->smarty->display('authorization_result.html');exit;
    			}else{
    				$result['msg'] = $data['error_description'];
    				$this->smarty->assign('data', $result);
    				$this->smarty->display('authorization_result.html');exit;
    			}
    			
    		}
    		if(isset($data['access_token']) && !empty($data['access_token'])){
    			$param = array();
    			if($state_arr[0] == 'reenabled'){
    				$param['bind_token_session'] = $data['access_token'];  //店铺授权key
    				$param['bind_auth_time'] = time();  //店铺授权时间
    				$result = $this->db->update('store', $param,array('store_id'=>$store_id));
    				if($result){
    					$result['msg'] = '重新授权成功！';
    					
    				}else{
    					$result['msg'] = '重新授权失败！';
    					
    				}
    			}else{
    				$param['bind_ecstore_name'] = $data['user_nick'];   //名称
    				$param['bind_ecstore_type'] = 1;  //店铺类型
    				//$param['bind_ecstore_desc'] = '';  //描述
    				$param['bind_token_session'] = $data['access_token'];  //店铺授权key
    				$param['bind_auth_time'] = time();  //店铺授权时间
    				$result = $this->db->update('store', $param,array('store_id'=>$store_id));
    				if($result){
    					$result['msg'] = '授权成功！';
    					
    				}else{
    					$result['msg'] = '授权失败！';
    					
    				}
    			}
    		}else{
    			$result['msg'] = '授权信息获取失败，请重试！';
    			
    		}
    		
    	}
    	$this->smarty->assign('data', $result);
    	$this->smarty->display('authorization_result.html');
    }
    public function store_sync_info(){
    	$type = isset($_POST['type'])?$_POST['type']:'';
    	$store_id = $_SESSION['shop_spg_store_id'];
    	if($type==1){
    		$code = 1;
    	}elseif($type==2){
    		$code = 2;
    	}
    	$authInfo = $this->db->select('*')->where('ecs_code',$code)->get('ecstore')->row_array();
    	if($authInfo){
    		$authInfo['u_ecs_id'] = $store_id;
    		$authInfo['user_id'] = $store_id;
    		if($authInfo['ecs_code']==1){
    			$authInfo['ecs_code_name'] = 'jd';
    		}elseif($authInfo['ecs_code']==2){
    			$authInfo['ecs_code_name'] = 'tb';
    		}
    		$result = array('state'=>true,'msg'=>'操作错误','obj'=>$authInfo);
    	}else{
    		$result = array('state'=>false,'msg'=>'暂无此类型店铺开发者数据');
    	}
    	echo json_encode($result);exit;
    }


    //通知管理
    public function notice_manage()
    {
        $type = isset($_GET['type'])?$_GET['type']:false;
        $this->smarty->assign ('url', base_url ("pay.php/account/notice_list?type={$type}"));
        $this->smarty->assign('type', $type);
        $this->smarty->display('notice_manage.html');
    }
    //通知列表
    public function notice_list()
    {
        $status = $this->db->select("is_buy_sms, is_send_sms, is_done_sms")->where('store_id', $_SESSION['shop_spg_store_id'])->get('store')->row_array();
        //只可以使用系统的开放模板
        $rows = $this->db->from('sms_templates')->where('template_cate_id','0')->get()->result_array();
        header ("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        if (empty($rows)) {
            $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
            echo $xml;
            exit;
        }
        foreach ($rows as $row) {
            //判断店铺是否开启通知
            $state = 0;
            if ($row['template_code']=='gmtz' && $status['is_buy_sms']){
                $state = 1;
            }else if ($row['template_code']=='fhtz' && $status['is_send_sms']){
                $state = 1;
            }else if ($row['template_code']=='ddwc' && $status['is_done_sms']){
                $state = 1;
            }
            $xml .= "<tr id='row" . $row['template_id'] . "' data-id='" . $row['template_code'] . "'>";
//            $xml .= "<td><a class='btn btn-success size-S radius' href='notice_edit?id=".$row['template_id']."'>编辑</a></td>";
            $xml .= '<td>'.$row['template_subject'].'</td>';
            $xml .= '<td><p class="center">'.$row['template_content'].'</p></td>';
            if($state){
                $xml .= '<td><span  class="yes" style="cursor:pointer;color:#5eb95e;" title="点击禁用" onclick="change(\''.$row['template_code'].'\','.$state.')"><i class="fa fa-check-circle"></i>启用</span></td>';
            }else{
                $xml .= '<td><span  class="no" style="cursor:pointer" title="点击启用" onclick="change(\''.$row['template_code'].'\','.$state.')"><i class="fa fa-ban"></i>未启用</span></td>';
            }
            $xml .= "</tr>";
        }
        echo $xml;
        exit;
    }

//    //系统通知
//    public function notice_manage_state()
//    {
//        //找到系统的通知模板
//        $rows = $this->db->from('sms_templates')->where('template_cate_id = 0')->where('store_id','0')->get()->result_array();
//        $check = $this->db->from('sms_templates')->where('store_id',$_SESSION['shop_spg_store_id'])->get()->result_array();
//        $this->smarty->assign('rows', $rows);
//        $this->smarty->assign('check', $check);
//        $this->smarty->display('notice_manage_state.html');
//    }

    //保存通知模板到店铺
//    public function notice_manage_submit()
//    {
//        $data = array ('state'=>false,'msg'=>'');
//        $id = isset($_GET['id'])?$_GET['id']:false;
//        $ids = explode (',', $id);
//        if ($ids) {
//            $rows = array ();     //系统开启的
//            $check = array ();     //店铺中已存在的
//            $arr_del = array ();     //要删除的  所有的-已存在的
//
//            //查询系统开放的
//            $row = $this->db->select("template_code")->from('sms_templates')->where('template_cate_id = 0')->where('store_id','0')->get()->result_array();
//            foreach ($row as $ro) {
//                $rows[] = $ro['template_code'];
//            }
//            //已存在的
//            $check_t = $this->db->select("template_code")->from('sms_templates')->where('store_id',$_SESSION['shop_spg_store_id'])->get()->result_array();
//            foreach ($check_t as $ch) {
//                $check[] = $ch['template_code'];
//            }
//
//            //要删除的
//            $arr_del = array_diff ($rows, $ids);
//            $arr_del = array_intersect ($arr_del, $check);
//
//
//            foreach ($ids as $id) {
//                if (!in_array ($id, $check)) {     //$id不在check里面则复制
//                    $row = $this->db->from('sms_templates')->where('template_cate_id = 0')->where('template_code',$id)->get()->result_array();
//                    $row = $row[0];
//                    //插入数据到店铺
//                    $in = array (
//                        'template_code' => $row['template_code'],
//                        'type' => $row['type'],
//                        'template_subject' => $row['template_subject'],
//                        'template_content' => $row['template_content'],
//                        'template_cate_id' => 1,
//                        'template_sms_id' => $row['template_sms_id'],
//                        'store_id' => $_SESSION['shop_spg_store_id'],
//                    );
//                    $this->db->insert('sms_templates', $in);
//                }
//                $data = array ('state'=>true,'msg'=>'操作成功');
//            }
//            if (!empty($arr_del)) { //删除未选中的
//                $this->db->from('sms_templates')->where_in('template_code',$v)->where('store_id',$_SESSION['shop_spg_store_id'])->delete();
//            }
//        } else {
//            $data = array ('state'=>false,'msg'=>'操作失败');
//        }
//        echo json_encode ($data);
//        exit;
//    }

    //通知列表
//    public function notice_list()
//    {
//        $type = isset($_GET['type']) ? $_GET['type'] : false;
//        $rows = '';
//        if ($type){
//            if ($type == 'sms'){
//                $rows = $this->db->from('sms_templates')->where('store_id',$_SESSION['shop_spg_store_id'])->get()->result_array();
//            } elseif ($type == 'wx') {
//                $rows = $this->db->from('sms_templates')->where('template_cate_id','0')->get()->result_array();
//            }
//        }
//        header ("Content-type: text/xml");
/*        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";*/
//        if (empty($rows)) {
//            $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
//            echo $xml;
//            exit;
//        }
//        foreach ($rows as $row) {
//            $xml .= "<tr id='row" . $row['template_id'] . "' data-id='" . $row['template_id'] . "'>";
//            $xml .= "<td><a class='btn btn-success size-S radius' href='notice_edit?id=".$row['template_id']."'>编辑</a></td>";
//            $xml .= '<td>'.$row['template_subject'].'</td>';
//            $xml .= '<td><p class="center">'.$row['template_content'].'</p></td>';
//            if($row['status']==1){
//                $xml .= "<td><span class='yes' style='cursor:pointer;color:#5eb95e;' title='点击禁用' onclick='change(".$row['template_id'].",".$row['status'].")'><i class='fa fa-check-circle'></i>启用</span></td>";
//            }else{
//                $xml .= "<td><span class='no' style='cursor:pointer'  title='点击启用' onclick='change(".$row['template_id'].",".$row['status'].")'><i class='fa fa-ban'></i>未启用</span></td>";
//            }
//            $xml .= "</tr>";
//        }
//        echo $xml;
//        exit;
//    }
    //编辑保存
//    public function notice_edit()
//    {
//        $id = isset($_GET['id'])?$_GET['id']:false;
//        if ($id) {
//            if ($_POST && $_POST['submit']=='ok'){    //保存数据
//                $sms = array (
//                    'template_code'  => $_POST['code'],
//                    'template_subject'  => $_POST['title'],
//                    'template_sms_id'  => $_POST['template_sms_id'],
//                    'template_content'  => $_POST['content'],
//                    'last_modify'  => time(),
//                    'last_modify_user'  => $_SESSION['shop_spg_id']
//                );
//            }
//            $row = $this->db->from('sms_templates')->where('template_id',$id)->get()->row_array();
//            $this->smarty->assign('row', $row);
//            $this->smarty->display('notice_edit.html');
//        }
//    }

    //改变通知状态
    public function notice_change()
    {
        $data = array('state'=>false,'msg'=>'系统错误');
        $state = isset($_GET['state'])?$_GET['state']:'';
        $code = isset($_GET['code'])?$_GET['code']:false;
        if ($code) {
            //改变状态
            $state = $state ? '0':'1';
            //拼接条件
            $where = '';
            if ($code == 'gmtz') $where = 'is_buy_sms';
            else if ($code == 'fhtz') $where = 'is_send_sms';
            else if ($code == 'ddwc') $where = 'is_done_sms';
            $where = array ($where => $state);
            $result = $this->db->where('store_id', $_SESSION['shop_spg_store_id'])->update('store',$where);
            if ($result) {
                $data = array ('state' => true, 'msg' => '操作成功');
            }else {
                $data = array ('state' => false, 'msg' => '操作失败');
            }
        }
        echo json_encode ($data);
        exit;
    }

}
?>