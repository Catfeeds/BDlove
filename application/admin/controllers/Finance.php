<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: yhx
 * Date: 2017/5/31
 * Time: 12:07
 */
class Finance extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }


    /*财务设置*/
    public function finance_set_account(){
        $this->common_function->shop_admin_priv("finance_set_account");//权限
        $this->smarty->display ( 'finance_set_bank.html' );
    }

    /*财务设置银行卡列表*/
    public function finance_bank_list ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $page   = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp     = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype  = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query  = isset($_POST['query']) ? $_POST['query'] : false;
        $start  = ($page - 1) * $rp;

        $this->db->from('sys_account s');
        $this->db->select('s.bank_id,s.bank_sn,s.bank_name,s.bank_user_name,s.status,s.add_time,a.admin_name');
        $this->db->join('admin a', 'a.admin_id = s.add_user_id');
        $db = clone($this->db);
        $total = $this->db->get()->num_rows();

        header ("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";

        //查询到数据为空
        if ($total == 0) {
            $xml .= "<total>$total</total>";
            $xml .= "</rows>";
            echo $xml;
            exit;
        }
        $this->db = $db;
        $this->db->limit ($rp, $start);
        $this->db->order_by ('s.add_time', 'DESC');
        $rows = $this->db->get()->result_array();

        foreach ($rows as $row) {
            $xml .= "<row id='" . $row['bank_id'] . "'>";

            //操作
            $xml .= "<cell><![CDATA[<a class='btn red' onclick=bank_del({$row['bank_id']})>
            <i class='fa fa-trash-o'></i>删除</a><span class='btn'><a onclick=bank_edit({$row['bank_id']})><em>
            <i class='fa fa-cog'></i>编辑</a></em>";
            $xml .= "</ul>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['bank_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['bank_sn']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['bank_user_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['admin_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".date ('Y-m-d H:i:s', $row['add_time'])."]]></cell>";
            if($row['status']==1){
                $xml .= "<cell><![CDATA[<span class='yes' style='cursor:pointer' title='点击禁用' onclick='edit_status(".$row['bank_id'].",".$row['status'].")'><i class='fa fa-check-circle'></i>启用</span>]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[<span class='no' style='cursor:pointer'  title='点击启用' onclick='edit_status(".$row['bank_id'].",".$row['status'].")'><i class='fa fa-ban'></i>未启用</span>]]></cell>";
            }
            $xml .= "</row>";
        }
        $xml .= "<total>$total</total>";
        $xml .= "</rows>";
        echo $xml;
        exit;
    }

    //添加修改银行卡信息
    public function finance_bank_edit ()
    {
        $this->common_function->shop_admin_priv("finance_set_account");//权限
        $op = isset($_GET['op']) ? $_GET['op'] : false;

        if($op && $op == 'edit') {      //编辑银行卡
            $bank_id = isset($_GET['bank_id']) ? $_GET['bank_id'] :false;
            if ($bank_id) {
                $this->db->from('sys_account')->select('bank_id,bank_name,bank_sn,bank_user_name,status');
                $this->db->where('bank_id', $bank_id);
                $bank = $this->db->get()->row_array();
                $this->smarty->assign('bank', $bank);
            }
        }
        $this->smarty->display ( 'finance_edit_bank.html' );
    }

    //删除银行卡信息
    public function finance_bank_del()
    {
        $this->common_function->shop_admin_priv("finance_set_account");//权限
        $data   = array ('status' => false , 'msg' =>'');
        $ids    = isset($_GET['bank_id']) ? explode (',',$_GET['bank_id']) :false;
        if ($ids) {
            $this->db->where_in ('bank_id', $ids)->delete ('sys_account');
            $data = array ('status' => true , 'msg' =>'删除成功');
        }
        echo json_encode ($data);
        exit;
    }

    /*修改系统绑定银行卡信息和状态*/
    public function edit_sys_bank(){
        $this->common_function->shop_admin_priv("finance_set_account");//权限;
        $op = isset($_GET['op']) ? $_GET['op'] : false;
        $data = array ('status' => false , 'msg' =>'');

        $row = false;       //数据修改状态
        if (!empty($op) && $op == 'bank') {     //修改银行卡信息
            $bank['bank_id']        = isset($_POST['bank_id'])? $_POST['bank_id'] : false;
            $bank['bank_name']      = isset($_POST['bank_name']) ? trim ($_POST['bank_name']) : false;
            $bank['bank_sn']        = isset($_POST['bank_sn']) ? trim ($_POST['bank_sn']) : false;
            $bank['bank_user_name'] = isset($_POST['bank_user_name']) ? trim ($_POST['bank_user_name']) : false;
            $bank['status']         = isset($_POST['status']) ? trim ($_POST['status']) : false;
            if($bank['bank_id']){       //存在id，修改提交
                $bank['last_modify_time']       = time();
                $bank['last_modify_user_id']    = $_SESSION['shop_admin_id'];
                $row  = $this->db->where('bank_id', $bank['bank_id'])->update('sys_account', $bank);
            } else {        //新增提交
                unset($bank['bank_id']);
                $bank['add_user_id'] = $_SESSION['shop_admin_id'];
                $bank['add_time']    = time();
                $row  = $this->db->insert('sys_account', $bank);
            }
        } else if(!empty($op) && $op == 'status') {     //修改银行卡启用状态
            $id = isset($_GET['bank_id']) ? $_GET['bank_id'] : false;
            if ($id) {
                $status = isset($_GET['status']) ? $_GET['status'] : 0;
                $status = $status ? 0 : 1;  //修改状态
                $row = $this->db->where('bank_id', $id)->set('status', $status)->update('sys_account');
            }
        }

        if ($row) {
            $data = array ('status' => true , 'msg' =>'操作成功');
        } else {
            $data = array ('status' => false , 'msg' =>'操作失败');
        }
        echo json_encode ($data);
        exit;
    }




    /*会员管理*/
    public function finance_account_user(){
        $this->common_function->shop_admin_priv("finance_account_user");//权限
        $this->smarty->display ( 'finance_account_user.html' );
    }


    /*会员资金列表*/
    public function get_finance_account_user(){
        $this->common_function->shop_admin_priv("finance_account_user");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $qtype = isset($_POST['qtype']) && !empty($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) && !empty($_POST['query']) ? trim($_POST['query']) : false;
        if($qtype && $query){
            if($qtype == 'name'){
                $this->db->like('user_name',$query);
            }else if($qtype == 'tel'){
                $this->db->like('tel',$query);
            }else{
                $this->db->like('qq',$query);
            }
        }
        $db = clone($this->db);
        $total = $this->db->count_all_results('user');
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $this->db->select('user_id,user_name,tel,balance,qq');
        $rows = $this->db->limit($rp,$start)->get('user')->result_array();
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $num=$this->db->where(array('order_status>'=>10,'buyer_id'=>$row['user_id']))->count_all_results('shop_order');
            $xml .= '<row id="'.$row['user_id'].'">';
            $xml .= "<cell><![CDATA[<span class='btn'><em><i class='fa fa-cog'></i>操作 <i class='arrow'></i></em>
                <ul>
                    <li><a onclick=pay_detail(". $row['user_id'] .")>支付明细</a></li>
                    <li><a onclick=deposit_history(".$row['user_id'] .")>充值历史</a></li>
                    <li><a onclick=cash_history(".$row['user_id'] .")>提现历史</a></li>
                </ul></span>]]></cell>";
            $xml .= '<cell><![CDATA['.$row['user_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['tel'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['qq'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['balance'].']]></cell>';
            $xml .= '<cell><![CDATA['.$num.']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);
    }


    /*会员支付明细*/
    public function user_pay_detail($id){
        $this->common_function->shop_admin_priv("finance_account_user");//权限
        $user=$this->db->select('user_name,user_id')->where('user_id',$id)->get('user')->row_array();
        $this->smarty->assign('user',$user);
        $this->smarty->display ( 'finance_user_pay_detail.html' );
    }
    /*会员支付明细列表*/
    public function get_user_pay_detail(){
        $this->common_function->shop_admin_priv("finance_account_user");//权限
        $id = $_GET['id'];
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $qtype = isset($_POST['qtype']) && !empty($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) && !empty($_POST['query']) ? trim($_POST['query']) : false;

        if($qtype && $query){
            if($qtype == 'order_sn'){
                $this->db->like('o.order_sn',$query);
            }else if($qtype == 'pay_sn'){
                $this->db->like('p.pay_sn',$query);
            }
        }
        $result=$this->db->select('p.mtcn_type,p.pay_sn,p.pay_time,p.pay_num,o.order_sn,o.pay_type,o.order_price,l.asset')->from('shop_order_pay p')
            ->join('shop_order o','p.pay_sn=o.pay_sn','left')->join('user_asset_log l','p.pay_sn=l.pay_sn','left')->where('o.buyer_id',$id)->order_by('p.pay_time DESC')
            ->get()->result_array();

        $total=count($result);

        /*$db = clone($this->db);
        $total = $this->db->count_all_results();*/
        $start = ($page - 1) * $rp;
        /*$this->db = $db;*/
        //$rows=$this->db->limit($rp,$start)->get()->result_array();
        $asset=$this->db->select('balance')->where('user_id',$id)->get('user')->row('balance');

        $rows = array_slice($result,$start,$rp);

        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            if(empty($row['asset'])){
                $row['asset']=$asset;
            }else{
                $asset=$row['asset'];
            }
            $xml .= '<row id="'.$row['pay_sn'].'">';
            $xml .= '<cell><![CDATA['.$row['order_sn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['pay_sn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['pay_num'].']]></cell>';
            $xml .= '<cell><![CDATA['.($row['mtcn_type']==1?'现金':($row['mtcn_type']==2?'银行卡':($row['mtcn_type']==3?'微信':($row['mtcn_type']==4?'支付宝':($row['mtcn_type']==5?'余额':($row['mtcn_type']==21?'优惠券':'充值卡')))))).']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset'].']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['pay_time']).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);
    }

    /*会员充值历史*/
    public function user_deposit_history($id){
        $this->common_function->shop_admin_priv("finance_account_user");//权限
        $user=$this->db->select('user_name,user_id')->where('user_id',$id)->get('user')->row_array();
        $this->smarty->assign('user',$user);
        $this->smarty->display ( 'finance_user_deposit_history.html' );
    }

    /*会员充值历史列表*/
    public function get_user_deposit_history(){
        $this->common_function->shop_admin_priv("finance_account_user");//权限
        $id = $_GET['id'];
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;

        $this->db->select('ual_id,user_id,pay_sn,asset_in,asset,note,time')->from('user_asset_log')
            ->where('user_id',$id)->where('log_type',2);

        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows=$this->db->limit($rp,$start)->get()->result_array();

        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.$row['ual_id'].'">';
            $xml .= '<cell><![CDATA['.$row['ual_id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['user_id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['pay_sn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset_in'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['note'].']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['time']).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);
    }


    /*会员提现历史*/
    public function user_cash_history($id){
        $this->common_function->shop_admin_priv("finance_account_user");//权限
        $user=$this->db->select('user_name,user_id')->where('user_id',$id)->get('user')->row_array();
        $this->smarty->assign('user',$user);
        $this->smarty->display ( 'finance_user_cash_history.html' );
    }

    /*会员提现历史列表*/
    public function get_user_cash_history(){
        $this->common_function->shop_admin_priv("finance_account_user");//权限
        $id = $_GET['id'];
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;

        $this->db->select('ual_id,user_id,pay_sn,asset_out,asset,note,time')->from('user_asset_log')
            ->where('user_id',$id)->where('log_type',1)->order_by('time DESC');

        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows=$this->db->limit($rp,$start)->get()->result_array();

        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.$row['ual_id'].'">';
            $xml .= '<cell><![CDATA['.$row['ual_id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['user_id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['pay_sn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset_out'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['note'].']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['time']).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);
    }


    /*平台账户明细*/
    public function finance_account_sys(){
        $this->common_function->shop_admin_priv("finance_account_sys");//权限
        $asset_in=$this->db->select('sum(asset_in) as num')->get('sys_asset_account')->row_array();   //平台总收入
        $asset=$this->db->select('asset')->order_by('time DESC')->get('sys_asset_account')->row('asset');      //平台余额
        $sys_cash=$this->db->select('sum(asset_out) as num')->where('user_type',2)->where('log_type',1)->get('sys_asset_account')->row_array();  //平台提现总和
        $sys_cc=$this->db->select('sum(asset_out) as num')->where('log_type',5)->get('store_asset_log')->row_array();  //平台抽成总和
        $sys_fd=$this->db->select('sum(asset_in) as num')->where('log_type',6)->get('store_asset_log')->row_array();  //平台返点总和
        $this->smarty->assign('asset_in',empty($asset_in['num'])?0:$asset_in['num']);
        $this->smarty->assign('asset',empty($asset)?0:$asset);
        $this->smarty->assign('sys_cash',empty($sys_cash['num'])?0:$sys_cash['num']);
        $this->smarty->assign('sys_cc',empty($sys_cc['num'])?0:$sys_cc['num']);
        $this->smarty->assign('sys_fd',empty($sys_fd['num'])?0:$sys_fd['num']);
        $bank_name = $this->common_function->get_system_value('bind_bank_name');
        $bank_usn = $this->common_function->get_system_value('bind_bank_usn');
        $bank_uname = $this->common_function->get_system_value('bind_bank_uname');
        $this->smarty->assign('bind_bank_name',$bank_name);
        $this->smarty->assign('bind_bank_usn',$bank_usn);
        $this->smarty->assign('bind_bank_uname',$bank_uname);
        $this->smarty->display('finance_account_sys.html');
    }

    /*平台账户明细列表*/
    public function get_finance_account_sys(){
        $this->common_function->shop_admin_priv("finance_account_sys");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;

        if(isset($_GET['startime']) && !empty($_GET['startime'])){
            $this->db->where("a.time >= ",strtotime($_GET['startime']));
        }
        if(isset($_GET['endtime']) && !empty($_GET['endtime'])){
            $this->db->where("a.time <= ",strtotime($_GET['endtime'])+86400);
        }
        if(isset($_GET['order_id']) && !empty($_GET['order_id'])){
            $this->db->like("o.order_sn",$_GET['order_id']);
        }


        $this->db->select('a.paa_id,a.user_id,a.pay_sn,a.asset_out,a.asset_in,a.asset,a.note,a.time,a.order_sn')->from('sys_asset_account a')
        ->order_by('a.time DESC');
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;

        $rows = $this->db->limit($rp,$start)->get()->result_array();
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.$row['paa_id'].'">';
            $xml .= '<cell><![CDATA['.$row['paa_id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['order_sn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['pay_sn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset_out'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset_in'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['note'].']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['time']).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);
    }

    /*门店管理*/
    public function finance_account_store(){
        $this->common_function->shop_admin_priv("finance_account_store");//权限
        $this->smarty->display ('finance_account_store.html');
    }

    /*门店管理列表*/
    public function get_finance_account_store(){
        $this->common_function->shop_admin_priv("finance_account_store");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $qtype = isset($_POST['qtype']) && !empty($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) && !empty($_POST['query']) ? trim($_POST['query']) : false;
        if($qtype && $query){
            if($qtype == 'store_name'){
                $this->db->like('store_name',$query);
            }else if($qtype == 'tel'){
                $this->db->like('ous_tel',$query);
            }
        }
        $this->db->select('store_id,store_name,balance,bind_bank_uname,ous_tel,bind_bank_usn,bind_bank_name,bind_bank_code')
            ->from('store')->order_by('store_id DESC');
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows = $this->db->limit($rp,$start)->get()->result_array();
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $dianzhang=$this->db->select('spg_nike_name,spg_name')->where('spg_store_id',$row['store_id'])->where('role_type',2)->get('store_shopping_guide')->row_array();
            $xml .= '<row id="'.$row['store_id'].'">';
            $xml .= "<cell><![CDATA[<span class='btn'><em><i class='fa fa-cog'></i>操作 <i class='arrow'></i></em>
                <ul>
                    <li><a onclick=pay_detail(". $row['store_id'] .")>账户明细</a></li>
                    <li><a onclick=cash_history(".$row['store_id'] .")>提现历史</a></li>
                    <li><a onclick=edit_bank(".$row['store_id'] .")>修改绑定银行卡</a></li>
                </ul></span>]]></cell>";
            $xml .= '<cell><![CDATA['.$row['store_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$dianzhang['spg_nike_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$dianzhang['spg_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['ous_tel'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['balance'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['bind_bank_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['bind_bank_usn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['bind_bank_uname'].']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);
    }

    /*门店账户明细*/
    public function store_asset_detail($id){
        $this->common_function->shop_admin_priv("finance_account_store");//权限
        $store=$this->db->select('store_name,store_id')->where('store_id',$id)->get('store')->row_array();
        $this->smarty->assign('store',$store);
        $this->smarty->display('finance_store_asset_detail.html');
    }

    /*门店账户明细列表*/
    public function get_store_asset_detail(){
        $this->common_function->shop_admin_priv("finance_account_store");//权限
        $storeid=$_GET['id'];
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;

        if(isset($_GET['startime']) && !empty($_GET['startime'])){
            $this->db->where("l.time >= ",strtotime($_GET['startime']));
        }
        if(isset($_GET['endtime']) && !empty($_GET['endtime'])){
            $this->db->where("l.time <= ",strtotime($_GET['endtime'])+86400);
        }
        if(isset($_GET['pay_id']) && !empty($_GET['pay_id'])){
            $this->db->like("l.pay_sn",$_GET['pay_id']);
        }


        $this->db->select('l.sal_id,l.store_id,l.pay_sn,l.asset_out,l.asset_in,l.asset,l.note,l.time,o.order_sn')->from('store_asset_log l')
            ->join('shop_order o','l.pay_sn=o.pay_sn','left')
            ->where('l.store_id',$storeid)->order_by('l.time DESC,l.sal_id DESC');
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;

        $rows = $this->db->limit($rp,$start)->get()->result_array();
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.$row['sal_id'].'">';
            $xml .= '<cell><![CDATA['.$row['sal_id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['pay_sn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['order_sn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset_out'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset_in'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['note'].']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['time']).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);


    }


    /*门店提现历史*/
    public function store_cash_history($id){
        $this->common_function->shop_admin_priv("finance_account_store");//权限
        $store=$this->db->select('store_name,store_id')->where('store_id',$id)->get('store')->row_array();
        $this->smarty->assign('store',$store);
        $this->smarty->display('finance_store_cash_history.html');
    }

    /*门店提现历史列表*/
    public function get_store_cash_history(){
        $this->common_function->shop_admin_priv("finance_account_store");//权限
        $storeid=$_GET['id'];
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;

        $this->db->select('sal_id,pay_sn,asset_out,asset,note,time')->from('store_asset_log')->where('store_id',$storeid)->where('log_type',1)->order_by('time DESC');

        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows=$this->db->limit($rp,$start)->get()->result_array();

        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.$row['sal_id'].'">';
            $xml .= '<cell><![CDATA['.$row['sal_id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['pay_sn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset_out'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['asset'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['note'].']]></cell>';
            $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['time']).']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);

    }

    /*修改绑定银行卡*/
    public function edit_bind_bank($id){
        $this->common_function->shop_admin_priv("finance_account_store");//权限
        $row=$this->db->select('store_id,store_name,bind_bank_uname,bind_bank_usn,bind_bank_name')->where('store_id',$id)->get('store')->row_array();
        $this->smarty->assign('row',$row);
        $this->smarty->display('finance_edit_bind_bank.html');

    }

    /*修改绑定银行卡的提交*/
    public function edit_bind_bank_submit(){
        $this->common_function->shop_admin_priv("finance_account_store");//权限
        $id=isset($_GET['id'])&&!empty($_GET['id'])?$_GET['id']:false;
        $data=isset($_POST)?$_POST:false;
        $res = ['state'=>false];
        if($data&&$id){
            if($this->db->set(['bind_bank_uname'=>$data['bankUname'],'bind_bank_usn'=>$data['bankCode'],'bind_bank_name'=>$data['bankName']])->where('store_id',$id)->update('store')){
                $res = ['state'=>true];
            }else{
                $res = ['state'=>false];
            }
        }
        die(json_encode($res));

    }


    /*导购管理*/
    public function finance_account_guide(){
        $this->common_function->shop_admin_priv("finance_account_guide");//权限
        $this->smarty->display('finance_account_guide.html');
    }

    /*导购管理列表*/
    public function get_finance_account_guide(){
        $this->common_function->shop_admin_priv("finance_account_guide");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $qtype = isset($_POST['qtype']) && !empty($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) && !empty($_POST['query']) ? trim($_POST['query']) : false;
        if($qtype && $query){
            if($qtype == 'store_name'){
                $this->db->like('s.store_name',$query);
            }else if($qtype == 'tel'){
                $this->db->like('g.spg_tel',$query);
            }else{
                $this->db->like('g.spg_name',$query);
            }
        }
        $this->db->select('g.spg_id,g.spg_nike_name,g.spg_name,g.spg_tel,g.role_type,s.store_name')->from('store_shopping_guide g')
            ->join('store s','g.spg_store_id=s.store_id');
        $db=clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows=$this->db->limit($rp,$start)->get()->result_array();

        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.$row['spg_id'].'">';
            $xml .= "<cell><![CDATA[<span class='btn'><em><i class='fa fa-cog'></i>操作 <i class='arrow'></i></em></span>]]></cell>";
            $xml .= '<cell><![CDATA['.$row['spg_nike_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['spg_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['spg_tel'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['store_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.($row['role_type']==1?'店员':'店长').']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);

    }



    /*提现管理*/
    public function finance_account_cash(){
        $this->common_function->shop_admin_priv("finance_account_cash");//权限
        $this->smarty->display ('finance_account_cash.html');
    }


    /*提现管理列表*/
    public function get_finance_account_cash(){
        $this->common_function->shop_admin_priv("finance_account_cash");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;

        if(isset($_GET['startime']) && !empty($_GET['startime'])){
            $this->db->where("apply_time >= ",strtotime($_GET['startime']));
        }
        if(isset($_GET['endtime']) && !empty($_GET['endtime'])){
            $this->db->where("apply_time <= ",strtotime($_GET['endtime'])+86400);
        }
        if(isset($_GET['apply_type']) && !empty($_GET['apply_type'])){
            $this->db->where("apply_type",$_GET['apply_type']);
        }
        if(isset($_GET['apply_name']) && !empty($_GET['apply_name'])){
            $this->db->like("user_name",$_GET['apply_name']);
        }

        $this->db->select('*')
            ->from('withdraw_apply')->order_by('state ASC,operate_time DESC,apply_time ASC');
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows = $this->db->limit($rp,$start)->get()->result_array();
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.$row['wda_id'].'">';
            if($row['state']==0){
                $xml .= "<cell><![CDATA[<span class='btn'><em><i class='fa fa-cog'></i>操作 <i class='arrow'></i></em>
                <ul>
                    <li><a onclick=cash_sure(". $row['wda_id'] .")>确认提现</a></li>
                    <li><a onclick=cash_close(".$row['wda_id'] .")>关闭</a></li>
                </ul></span>]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[<span class='btn'>--</span>]]></cell>";
            }
            $xml .= '<cell><![CDATA['.$row['apply_user_id'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['user_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['amount'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['bank_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['bank_sn'].']]></cell>';
            $xml .= '<cell><![CDATA['.$row['receivable_name'].']]></cell>';
            $xml .= '<cell><![CDATA['.($row['apply_type']==1?'会员':($row['apply_type']==2?'店铺':'平台')).']]></cell>';
            $xml .= '<cell><![CDATA['.($row['bank_type']==1?'支付宝':($row['bank_type']==2?'微信':'银行卡')).']]></cell>';
            $xml .= '<cell><![CDATA['.($row['state']==0?'未处理':($row['state']==1?'已打款':'已关闭')).']]></cell>';
            $xml .= '<cell><![CDATA['.(empty($row['apply_time'])?'--':date('Y-m-d H:i:s',$row['apply_time'])).']]></cell>';
            $xml .= '<cell><![CDATA['.(empty($row['operate_time'])?'--':date('Y-m-d H:i:s',$row['operate_time'])).']]></cell>';
            $xml .= '<cell><![CDATA['.$row['operate_admin_name'].']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);

    }

    /*同意提现申请*/
    public function cash_update_status_sure()
    {
        $this->common_function->shop_admin_priv("finance_account_cash");//权限
        $id = isset($_POST['id']) ? intval($_POST['id']) : false;
        if ($id) {
            $temp = $this->db->select('apply_user_id,apply_type,amount,bank_name,bank_sn,bank_type')->where('wda_id', $id)->get('withdraw_apply')->row_array();
            $time = time();
            $sys_asset=$this->db->select('asset')->order_by('time DESC')->get('sys_asset_account')->row('asset');
            if(empty($sys_asset)){
                $sys_asset=0;
            }
            if ($temp['apply_type'] == 1) {
                $asset = $this->db->select('balance,user_name')->where('user_id', $temp['apply_user_id'])->get('user')->row_array();
                if ($asset['balance'] < $temp['amount']) {
                    $res = ['state' => false, 'msg' => '提现金额超过当前余额'];
                } else {
                    $asset_now = $asset['balance'] - $temp['amount'];
                    $user_log = array(
                        'user_id' => $temp['apply_user_id'],
                        'log_type' => 1,
                        'asset_out' => $temp['amount'],
                        'asset_in' => 0,
                        'asset' => $asset_now,
                        'note' => '提现' . $temp['amount'],
                        'time' => $time
                    );
                    $sys_log = array(
                        'user_id'=>$temp['apply_user_id'],
                        'asset_out' => $temp['amount'],
                        'asset_in' => 0,
                        'asset' =>$sys_asset-$temp['amount'],
                        'note' => '会员:'.$asset['user_name'].'提现'.$temp['amount'],
                        'user_type'=>0,
                        'log_type'=>1,
                        'time' => $time
                    );
                    $this->db->trans_off(); //禁用事务
                    $this->db->trans_start(); //开启事务
                    $this->db->set(['state' => 1, 'operate_time' => $time, 'operate_user_id' => $_SESSION['shop_admin_id'], 'operate_admin_name' => $_SESSION['shop_admin_name']])->where(array('wda_id' => $id, 'state' => 0))->update('withdraw_apply');
                    $this->db->set("balance", $asset_now)->where('user_id', $temp['apply_user_id'])->update('user');
                    $this->db->insert('user_asset_log', $user_log);
                    $this->db->insert('sys_asset_account', $sys_log);
                    $this->db->trans_complete(); //事务完成
                    $this->db->trans_off(); //禁用事务
                    if ($this->db->trans_status() !== false) {
                        $res = ['state' => true, 'msg' => '处理成功'];
                    } else {
                        $res = ['state' => false, 'msg' => '处理失败'];
                    }
                }
            } elseif ($temp['apply_type'] == 2) {
                $asset = $this->db->select('balance,store_name')->where('store_id', $temp['apply_user_id'])->get('store')->row_array();
                $type=$temp['bank_type']==1?'支付宝':($temp['bank_type']==2?'微信':$temp['bank_name']);
                if ($asset['balance'] < $temp['amount']) {
                    $res = ['state' => false, 'msg' => '提现金额超过当前余额'];
                } else {
                    $asset_now = $asset['balance'] - $temp['amount'];
                    $store_log = array(
                        'store_id' => $temp['apply_user_id'],
                        'log_type' => 1,
                        'asset_out' => $temp['amount'],
                        'asset_in' => 0,
                        'asset' => $asset_now,
                        'note' => '提现' . $temp['amount'] . '到' . $type . '账号' . $temp['bank_sn'],
                        'time' => $time
                    );
                    $sys_log = array(
                        'user_id'=>$temp['apply_user_id'],
                        'asset_out' => $temp['amount'],
                        'asset_in' => 0,
                        'asset' =>$sys_asset-$temp['amount'],
                        'note' => '门店:' . $asset['store_name'].'提现'.$temp['amount'],
                        'user_type'=>1,
                        'log_type'=>1,
                        'time' => $time
                    );
                    $this->db->trans_off(); //禁用事务
                    $this->db->trans_start(); //开启事务
                    $this->db->set(['state' => 1, 'operate_time' => $time, 'operate_user_id' => $_SESSION['shop_admin_id'], 'operate_admin_name' => $_SESSION['shop_admin_name']])->where(array('wda_id' => $id, 'state' => 0))->update('withdraw_apply');
                    $this->db->set("balance", $asset_now)->where('store_id', $temp['apply_user_id'])->update('store');
                    $this->db->insert('store_asset_log', $store_log);
                    $this->db->insert('sys_asset_account', $sys_log);
                    $this->db->trans_complete(); //事务完成
                    $this->db->trans_off(); //禁用事务
                    if ($this->db->trans_status() !== false) {
                        $res = ['state' => true, 'msg' => '处理成功'];
                    } else {
                        $res = ['state' => false, 'msg' => '处理失败'];
                    }
                }
            }elseif ($temp['apply_type'] == 3){
                if ($sys_asset < $temp['amount']) {
                    $res = ['state' => false, 'msg' => '提现金额超过当前余额'];
                } else {
                    $asset_now = $sys_asset - $temp['amount'];
                    $sys_log = array(
                        'user_id'=>$temp['apply_user_id'],
                        'asset_out' => $temp['amount'],
                        'asset_in' => 0,
                        'asset' =>$asset_now,
                        'note' => '平台提现' . $temp['amount'] . '到' . $temp['bank_name'] . '账号' . $temp['bank_sn'],
                        'user_type'=>2,
                        'log_type'=>1,
                        'time' => $time
                    );
                    $this->db->trans_off(); //禁用事务
                    $this->db->trans_start(); //开启事务
                    $this->db->set(['state' => 1, 'operate_time' => $time, 'operate_user_id' => $_SESSION['shop_admin_id'], 'operate_admin_name' => $_SESSION['shop_admin_name']])->where(array('wda_id' => $id, 'state' => 0))->update('withdraw_apply');
                    $this->db->insert('sys_asset_account', $sys_log);
                    $this->db->trans_complete(); //事务完成
                    $this->db->trans_off(); //禁用事务
                    if ($this->db->trans_status() !== false) {
                        $res = ['state' => true, 'msg' => '处理成功'];
                    } else {
                        $res = ['state' => false, 'msg' => '处理失败'];
                    }
                }
            } else {
                $res = ['state' => false, 'msg' => '处理失败'];
            }
        } else {
            $res = ['state' => false, 'msg' => '处理失败'];
        }
        die(json_encode($res));

    }

    /*关闭提现申请*/
    public function cash_update_status_close(){
        $this->common_function->shop_admin_priv("finance_account_cash");//权限
        $id = isset($_POST['id']) ? intval($_POST['id']) : false;
        if($id){
            $time=time();
            if($this->db->set(['state'=>2,'operate_time'=>$time,'operate_user_id'=>$_SESSION['shop_admin_id'],'operate_admin_name'=>$_SESSION['shop_admin_name']])->where(array('wda_id'=>$id,'state'=>0))->update('withdraw_apply')){
                $res = ['state'=>true,'msg'=>'处理成功'];
            }else{
                $res = ['state'=>false,'msg'=>'处理失败'];
            }
        }else{
            $res = ['state'=>false,'msg'=>'处理失败'];
        }
        die(json_encode($res));

    }

    /*平台提现申请*/
    public function apply_sys_cash(){
        $this->common_function->shop_admin_priv("finance_account_sys");//权限
        $data=isset($_POST)?$_POST:false;
        $res = ['state'=>false,'msg'=>'申请失败'];
        if($data) {
            $row=$this->db->select('wda_id')->where('apply_type',3)->where('state',0)->get('withdraw_apply')->row_array();
            if(empty($row)){
                $sys_asset=$this->db->select('asset')->order_by('time DESC')->get('sys_asset_account')->row('asset');
                if($_POST['cashNum']>$sys_asset){
                    $res = ['state'=>false,'msg'=>'申请金额大于当前账户金额'];
                }else{
                    $bank_name = $this->common_function->get_system_value('bind_bank_name');
                    $bank_usn = $this->common_function->get_system_value('bind_bank_usn');
                    $bank_uname = $this->common_function->get_system_value('bind_bank_uname');
                    $inse=array(
                    'apply_type'=>3,
                    'user_name'=>$_SESSION['shop_admin_name'],
                    'amount'=>$data['cashNum'],
                    'bank_name'=>$bank_name,
                    'bank_sn'=>$bank_usn,
                    'receivable_name'=>$bank_uname,
                    'state'=>0,
                    'apply_time'=>time(),
                );
                    $this->db->insert("withdraw_apply",$inse);
                    $res = ['state' => true,'msg'=>'提交申请成功'];
                }
            }else{
                $res = ['state'=>false,'msg'=>'尚有未处理的申请，请待处理后再提交'];
            }
        }
        die(json_encode($res));

    }


    /*充值管理*/
    public function finance_account_recharge(){
        $this->common_function->shop_admin_priv("finance_account_recharge");//权限
        $this->smarty->display ('finance_account_recharge.html');
    }


    /*充值管理列表*/
    public function get_finance_account_recharge(){
        $this->common_function->shop_admin_priv("finance_account_recharge");//权限
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;

        if(isset($_GET['startime']) && !empty($_GET['startime'])){
            $this->db->where("apply_time >= ",strtotime($_GET['startime']));
        }
        if(isset($_GET['endtime']) && !empty($_GET['endtime'])){
            $this->db->where("apply_time <= ",strtotime($_GET['endtime'])+86400);
        }
        if(isset($_GET['apply_type']) && !empty($_GET['apply_type'])){
            $this->db->where("user_type",$_GET['apply_type']);
        }
        if(isset($_GET['state']) && !empty($_GET['state'])){
            $this->db->where("state",$_GET['state']);
        }
        if(isset($_GET['pay_type']) && !empty($_GET['pay_type'])){
            $this->db->where("pay_type",$_GET['pay_type']);
        }
        if(isset($_GET['apply_name']) && !empty($_GET['apply_name'])){
            $this->db->like("user_name",$_GET['apply_name']);
        }

        $this->db->select('*')
            ->from('recharge_apply')->order_by('state ASC,operate_time DESC,apply_time ASC');
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $start = ($page - 1) * $rp;
        $this->db = $db;
        $rows = $this->db->limit($rp,$start)->get()->result_array();
        header('Content-type:text/xml');
        $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
        $xml .= '<rows>';
        $xml .= '<total>'.$total.'</total>';
        $xml .= '<page>'.$page.'</page>';
        foreach ($rows as $row){
            $xml .= '<row id="'.$row['rca_id'].'">';
            if($row['state']==0){
                $xml .= "<cell><![CDATA[<span class='btn'><em><i class='fa fa-cog'></i>操作 <i class='arrow'></i></em>
                <ul>
                    <li><a onclick=recharge_sure(". $row['rca_id'] .")>同意申请</a></li>
                    <li><a onclick=recharge_close(".$row['rca_id'] .")>关闭申请</a></li>
                </ul></span>]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[<span class='btn'>--</span>]]></cell>";
            }
            $xml .= '<cell><![CDATA['.$row['apply_user_id'].']]></cell>';
            $xml .= '<cell><![CDATA[<span title="'.$row['user_name'].'">'.$row['user_name'].'</span>]]></cell>';
            $xml .= '<cell><![CDATA['.$row['amount'].']]></cell>';
            $xml .= '<cell><![CDATA[<span title="'.$row['bank_name'].'">'.$row['bank_name'].'</span>]]></cell>';
            $xml .= '<cell><![CDATA['.($row['user_type']==1?'店铺':($row['user_type']==2?'会员':($row['user_type']==3?'导购':'平台'))).']]></cell>';
            $xml .= '<cell><![CDATA['.($row['pay_type']==1?'淘宝拍付':($row['pay_type']==2?'支付宝':($row['pay_type']==3?'银行卡':'微信'))).']]></cell>';
            $xml .= '<cell><![CDATA['.($row['state']==0?'未处理':($row['state']==1?'充值成功':($row['state']==2?'未支付':'已关闭'))).']]></cell>';
            $xml .= '<cell><![CDATA['.$row['receivable_note'].']]></cell>';
            $xml .= '<cell><![CDATA['.(empty($row['apply_time'])?'--':date('Y-m-d H:i:s',$row['apply_time'])).']]></cell>';
            $xml .= '<cell><![CDATA['.(empty($row['operate_time'])?'--':date('Y-m-d H:i:s',$row['operate_time'])).']]></cell>';
            $xml .= '<cell><![CDATA['.$row['operate_admin_name'].']]></cell>';
            $xml .= '</row>';
        }
        $xml .= '</rows>';
        die($xml);

    }


    /*同意充值申请*/
    public function recharge_update_status_sure()
    {
        $this->common_function->shop_admin_priv("finance_account_recharge");//权限
        $id = isset($_POST['id']) ? intval($_POST['id']) : false;
        if ($id) {
            $temp = $this->db->select('apply_user_id,user_type,amount,bank_name,pay_type')->where('rca_id', $id)->get('recharge_apply')->row_array();
            $time = time();
            $sys_asset = $this->db->select('asset')->order_by('time DESC')->get('sys_asset_account')->row('asset');
            if (empty($sys_asset)) {
                $sys_asset = 0;
            }
            $type = $temp['pay_type'] == 1 ? '淘宝拍付' : ($temp['pay_type'] == 2 ? '支付宝' : ($temp['pay_type'] == 3 ? $temp['bank_name']:'微信') );
            if ($temp['user_type'] == 1) {          //店铺
                $asset = $this->db->select('balance,store_name')->where('store_id', $temp['apply_user_id'])->get('store')->row_array();
                $asset_now = $asset['balance'] + $temp['amount'];
                $store_log = array(
                    'store_id' => $temp['apply_user_id'],
                    'log_type' => 2,
                    'asset_out' => 0,
                    'asset_in' => $temp['amount'],
                    'asset' => $asset_now,
                    'note' => '通过' . $type . '充值' . $temp['amount'],
                    'time' => $time
                );
                $sys_log = array(
                    'user_id' => $temp['apply_user_id'],
                    'asset_out' => 0,
                    'asset_in' => $temp['amount'],
                    'asset' => $sys_asset + $temp['amount'],
                    'note' => '门店:' . $asset['store_name'] . '充值' . $temp['amount'],
                    'user_type' => 1,
                    'log_type' => 2,
                    'time' => $time
                );
                $this->db->trans_off(); //禁用事务
                $this->db->trans_start(); //开启事务
                $this->db->set(['state' => 1, 'operate_time' => $time, 'operate_user_id' => $_SESSION['shop_admin_id'], 'operate_admin_name' => $_SESSION['shop_admin_name']])->where(array('rca_id' => $id, 'state' => 0))->update('recharge_apply');
                $this->db->set("balance", $asset_now)->where('store_id', $temp['apply_user_id'])->update('store');
                $this->db->insert('store_asset_log', $store_log);
                $this->db->insert('sys_asset_account', $sys_log);
                $this->db->trans_complete(); //事务完成
                $this->db->trans_off(); //禁用事务
                if ($this->db->trans_status() !== false) {
                    $res = ['state' => true, 'msg' => '处理成功'];
                } else {
                    $res = ['state' => false, 'msg' => '处理失败'];
                }
            } elseif ($temp['user_type'] == 2) {             //会员
                $asset = $this->db->select('balance,user_name')->where('user_id', $temp['apply_user_id'])->get('user')->row_array();
                $asset_now = $asset['balance'] + $temp['amount'];
                $user_log = array(
                    'user_id' => $temp['apply_user_id'],
                    'log_type' => 2,
                    'asset_out' => 0,
                    'asset_in' => $temp['amount'],
                    'asset' => $asset_now,
                    'note' =>  '通过' . $type . '充值' . $temp['amount'],
                    'time' => $time
                );
                $sys_log = array(
                    'user_id' => $temp['apply_user_id'],
                    'asset_out' => 0,
                    'asset_in' => $temp['amount'],
                    'asset' => $sys_asset + $temp['amount'],
                    'note' => '会员:' . $asset['user_name'] . '充值' . $temp['amount'],
                    'user_type' => 0,
                    'log_type' => 2,
                    'time' => $time
                );
                $this->db->trans_off(); //禁用事务
                $this->db->trans_start(); //开启事务
                $this->db->set(['state' => 1, 'operate_time' => $time, 'operate_user_id' => $_SESSION['shop_admin_id'], 'operate_admin_name' => $_SESSION['shop_admin_name']])->where(array('rca_id' => $id, 'state' => 0))->update('recharge_apply');
                $this->db->set("balance", $asset_now)->where('user_id', $temp['apply_user_id'])->update('user');
                $this->db->insert('user_asset_log', $user_log);
                $this->db->insert('sys_asset_account', $sys_log);
                $this->db->trans_complete(); //事务完成
                $this->db->trans_off(); //禁用事务
                if ($this->db->trans_status() !== false) {
                    $res = ['state' => true, 'msg' => '处理成功'];
                } else {
                    $res = ['state' => false, 'msg' => '处理失败'];
                }
            } else {
                $res = ['state' => false, 'msg' => '处理失败'];
            }
        }else{
            $res = ['state' => false, 'msg' => '处理失败'];
        }
            die(json_encode($res));
    }

    /*关闭充值申请*/
    public function recharge_update_status_close(){
        $this->common_function->shop_admin_priv("finance_account_recharge");//权限
        $id = isset($_POST['id']) ? intval($_POST['id']) : false;
        if($id){
            $time=time();
            if($this->db->set(['state'=>3,'operate_time'=>$time,'operate_user_id'=>$_SESSION['shop_admin_id'],'operate_admin_name'=>$_SESSION['shop_admin_name']])->where(array('rca_id'=>$id,'state'=>0))->update('recharge_apply')){
                $res = ['state'=>true,'msg'=>'处理成功'];
            }else{
                $res = ['state'=>false,'msg'=>'处理失败'];
            }
        }else{
            $res = ['state'=>false,'msg'=>'处理失败'];
        }
        die(json_encode($res));

    }




    /*企业付款*/
    /*public function rebate($user_id = 101)
    {
        ini_set('date.timezone', 'Asia/Shanghai');
        //error_reporting(E_ERROR);
        require_once ROOTPATH . "libraries/Wxpay/lib/WxPay.Api.php";
        require_once ROOTPATH . "libraries/Wxpay/example/WxPay.JsApiPay.php";
        require_once ROOTPATH . 'libraries/Wxpay/example/log.php';
        $mch_appid = WxPayConfig::APPID;//公众账号appid

        $mchid = WxPayConfig::MCHID;//商户号

        //$nonce_str = 'qyzf' . rand(100000, 999999);//随机数
        $nonce_str = WxPayApi::getNonceStr();//随机数
        $partner_trade_no = $this->common_function->makePaySn($user_id);

        //$partner_trade_no = 'xx' . time() . rand(10000, 99999);//商户订单号
        $this->db->select('wx_openid,true_name');
        $this->db->from('user');
        $this->db->where('user_id', $user_id);
        $openid = $this->db->get()->row_array();

        //$openid = $openids;//用户唯一标识,上一步授权中获取

        $check_name = 'FORCE_CHECK';//校验用户姓名选项，NO_CHECK：不校验真实姓名， FORCE_CHECK：强校验真实姓名（未实名认证的用户会校验失败，无法转账），OPTION_CHECK：针对已实名认证的用户才校验真实姓名（未实名认证用户不校验，可以转账成功）

        $re_user_name = $openid['true_name'];//用户姓名

        $amount = 1;//企业金额，这里是以分为单位（必须大于100分）

        $desc = '测试数据呀！！！';//描述

        $spbill_create_ip = '192.168.3.8';//请求ip


        $dataArr = array();

        $dataArr['amount'] = $amount;

        $dataArr['check_name'] = $check_name;

        $dataArr['desc'] = $desc;

        $dataArr['mch_appid'] = $mch_appid;

        $dataArr['mchid'] = $mchid;

        $dataArr['nonce_str'] = $nonce_str;

        $dataArr['openid'] = $openid['wx_openid'];

        $dataArr['partner_trade_no'] = $partner_trade_no;

        $dataArr['re_user_name'] = $re_user_name;

        $dataArr['spbill_create_ip'] = $spbill_create_ip;

        //生成签名

        $sign = $this->getSign($dataArr);//getSign($dataArr);见结尾

        //echo "-----<br/>签名：" . $sign . "<br/>*****";//die;


        //拼写正确的xml参数


        $data = "<xml>

        <mch_appid>" . $mch_appid . "</mch_appid>

        <mchid>" . $mchid . "</mchid>

        <nonce_str>" . $nonce_str . "</nonce_str>

        <partner_trade_no>" . $partner_trade_no . "</partner_trade_no>

        <openid>" . $openid['wx_openid'] . "</openid>

        <check_name>" . $check_name . "</check_name>

        <re_user_name>" . $re_user_name . "</re_user_name>

        <amount>" . $amount . "</amount>

        <desc>" . $desc . "</desc>

        <spbill_create_ip>" . $spbill_create_ip . "</spbill_create_ip>

        <sign>" . $sign . "</sign>

        </xml>";
        // var_dump($data);die;

        $MENU_URL = "https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers";
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        //如果有配置代理这里就设置代理
        if(WxPayConfig::CURL_PROXY_HOST != "0.0.0.0"
            && WxPayConfig::CURL_PROXY_PORT != 0){
            curl_setopt($ch,CURLOPT_PROXY, WxPayConfig::CURL_PROXY_HOST);
            curl_setopt($ch,CURLOPT_PROXYPORT, WxPayConfig::CURL_PROXY_PORT);
        }
        curl_setopt($ch, CURLOPT_URL, $MENU_URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        //两个证书（必填，请求需要双向证书。）
        $zs1 = ROOTPATH . "libraries/Wxpay/cert/apiclient_cert.pem";
        $zs2 = ROOTPATH . "libraries/Wxpay/cert/apiclient_key.pem";
        curl_setopt($ch, CURLOPT_SSLCERTTYPE, 'PEM');
        curl_setopt($ch, CURLOPT_SSLCERT, $zs1);
        curl_setopt($ch, CURLOPT_SSLCERTPASSWD, WxPayConfig::MCHID);
        curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
        curl_setopt($ch, CURLOPT_SSLKEY, $zs2);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $info = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Errno' . curl_error($ch);
        }
        curl_close($ch);

        $postObj = simplexml_load_string($info, 'SimpleXMLElement', LIBXML_NOCDATA);
        $a = object_array($postObj);
        var_dump($a);

    }*/


    /**
     * 作用：生成签名
     */
    /*function getSign($Obj)
    {
        //var_dump($Obj);//die;
        foreach ($Obj as $k => $v) {
            $Parameters[$k] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $String = $this->formatBizQueryParaMap($Parameters, false);//方法如下
        //echo '【string1】'.$String.'</br>';
        //签名步骤二：在string后加入KEY
        $String = $String . "&key=" . WxPayConfig::KEY;
        //echo "【string2】".$String."</br>";
        //签名步骤三：MD5加密
        $String = md5($String);
        //echo "【string3】 ".$String."</br>";
        //签名步骤四：所有字符转为大写
        $result_ = strtoupper($String);
        //echo "【result】 ".$result_."</br>";
        return $result_;
    }*/

    /**
     * 作用：格式化参数，签名过程需要使用
     */
    /*function formatBizQueryParaMap($paraMap, $urlencode)
    {
       // var_dump($paraMap);//die;
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v)
        {
            if($urlencode)
            {
                $v = urlencode($v);
            }
        //$buff .= strtolower($k) . "=" . $v . "&";
            $buff .= $k . "=" . $v . "&";
        }
        $reqPar='';
        if (strlen($buff) > 0)
        {
            $reqPar = substr($buff, 0, strlen($buff)-1);
        }
        //var_dump($reqPar);//die;
        return $reqPar;
    }*/




}