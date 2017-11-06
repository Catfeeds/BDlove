<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: yhx
 * Date: 2017/7/18
 * Time: 14:41
 */
class User extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('pay_model');
    }

    /*会员管理*/
    public function user_management(){
        $this->common_function->pay_role("seller_member_manage");//权限
        $mon_start = date('Y-m-d H:i:s',mktime(0,0,0,date("m")-1,date("d"),date("Y")));

        $week_start = date('Y-m-d H:i:s',mktime(0,0,0,date("m"),date("d")-7,date("Y")));

        $tom_start = date('Y-m-d H:i:s',mktime(0,0,0,date("m"),date("d")-1,date("Y")));
        $tom_end   = date('Y-m-d H:i:s',strtotime($tom_start) + 86399) ;

        $now_start = date('Y-m-d H:i:s',strtotime(date('Y-m-d', time())));
        $now_end   = date('Y-m-d H:i:s',strtotime($now_start) + 86399) ;

        $this->smarty->assign('mon_start',$mon_start);
        $this->smarty->assign('week_start',$week_start);
        $this->smarty->assign('tom_start',$tom_start);
        $this->smarty->assign('tom_end',$tom_end);
        $this->smarty->assign('now_start',$now_start);
        $this->smarty->assign('now_end',$now_end);
        $this->db->select('spg_id,spg_name');
        $this->db->from('store_shopping_guide')->where('spg_store_id',$_SESSION['shop_spg_store_id']);
        $guides = $this->db->get()->result_array();
        $storetype=$this->db->select("ous_type")->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row('ous_type');
        $this->smarty->assign('store_name',$_SESSION['shop_store_name']);
        $this->smarty->assign('store_type',$storetype);
        $this->smarty->assign('guides',$guides);
        $this->smarty->assign ('url', base_url ('pay.php/User/user_list'));
        $this->smarty->display('user_management.html');
    }

    /*会员管理列表*/
    public function user_list(){
        $this->common_function->pay_role("seller_member_manage");//权限
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? $_POST['query'] : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;

        $start_time = isset($_GET['start_time'])?trim($_GET['start_time']):'';
        $end_time = isset($_GET['end_time'])?trim($_GET['end_time']):'';
        $time = isset($_GET['time'])?trim($_GET['time']):'';

        $monney = isset($_GET['monney'])?trim($_GET['monney']):'';
        $start_monney = isset($_GET['start_monney'])?trim($_GET['start_monney']):'';
        $end_monney = isset($_GET['end_monney'])?trim($_GET['end_monney']):'';

        $num = isset($_GET['num'])?trim($_GET['num']):'';
        $start_num = isset($_GET['start_num'])?trim($_GET['start_num']):'';
        $end_num = isset($_GET['end_num'])?trim($_GET['end_num']):'';

        $underguide = isset($_GET['underguide'])?trim($_GET['underguide']):'';
        $true_name = isset($_GET['true_name'])?trim($_GET['true_name']):'';
        $wx_nike = isset($_GET['wx_nike'])?trim($_GET['wx_nike']):'';
        $mobile = isset($_GET['mobile'])?trim($_GET['mobile']):'';
        $where="ecstore_id = ".$_SESSION['shop_spg_store_id'];
        if ($query && $qtype){
            $where .= " and {$qtype} = {$query}";
        }

        if($time!='all'){
            if($start_time!="" && $end_time!=""){
                $where .= " and reg_time >=".strtotime($start_time)." and reg_time <=".strtotime($end_time)." ";
            }
            if($start_time!="" && $end_time==""){
                $where .= " and reg_time >=".strtotime($start_time)." ";
            }
        }
        if($monney!='all'){
            if($start_monney!="" && $end_monney!=""){
                $where .= " and order_money_num >'{$start_monney}' and order_money_num <='{$end_monney}' ";
            }

            if($start_monney!="" && $end_monney==""){
                $where .= " and order_money_num >='{$start_monney}' ";
            }
        }

        if($num!='all'){
            if($start_num!="" && $end_num!=""){
                $where .= " and order_num >'{$start_num}' and order_num <='{$end_num}' ";
            }
            if($start_num!="" && $end_num==""){
                $where .= " and order_num >'{$start_num}'  ";
            }
        }

        if($underguide!=0){
            $where .= " and ecshopping_guide_id='{$underguide}' ";
        }

        if($true_name){
            $where .= " and true_name like '%{$true_name}%' ";
        }
        if($wx_nike){
            $where .= " and wx_nickname like '%{$wx_nike}%' ";
        }
        if($mobile){
            $where .= " and tel like '%{$mobile}%' ";
        }
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        $total = $this->common_function->total('user', $where);
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('user', $where);
        $grades = $this->db->get('user_mldefault')->result_array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml = '';
        $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
        $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
        $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
        if ($total == 0) {
            $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
            echo $xml;
            exit;
        }
        foreach($rows AS $row){

            $this->db->select('uig_id,user_id,integral_num');
            $this->db->from('user_integral');
            $this->db->where("user_id",$row['user_id']);
            $this->db->order_by('uig_id','ASC');
            $integral= $this->db->get()->result_array();
            if(count($integral)>=2){
                $integration = 0;
                foreach ($integral as $key=>$val){
                    $integration+=$val['integral_num'];
                }
            }elseif (count($integral)==1){
                $integration = $integral[0]['integral_num'];
            }else{
                $integration = 0;
            }
            $row['integral'] = $integration;


            $this->db->select('uw.ubofw_id,uw.wx_action,uw.wx_action_time,uw.wx_action_value,sg.spg_name,sg.spg_id');
            $this->db->from('user_bind_or_follow_wx as uw');
            $this->db->join('store_shopping_guide as sg','sg.spg_id=uw.wx_action_value','left');
            $this->db->where("uw.user_id",$row['user_id']);
            $this->db->where("uw.wx_action",'3');
            $this->db->order_by('uw.wx_action_time','DESC');
            $ecshopping_guide= $this->db->get()->row_array();
            if($ecshopping_guide){
                $row['ecshopping_guide_id'] = $ecshopping_guide['spg_name'];
            }else{
                $row['ecshopping_guide_id'] = "无";
            }

            $storetype=$this->db->select("ous_type")->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row('ous_type');

            $xml .= "<tr id='row" . $row['user_id'] . "' data-id='" . $row['user_id'] . "'>";
            $xml .= '<td style="text-align:center"  data-id="' . $row['user_id'] . '" ><input class="ml0" type="checkbox" value="' . $row['user_id'] . '" name="check"></td>';
            if($storetype==1){
                $xml .= "<td style='text-align: center'><a class='btn btn-secondary radius' href='member_edit/{$row['user_id']}'>编辑</a></td>";
            }
            $row['head_portrait'] = $row['head_portrait']?$row['head_portrait']:base_url().'application/admin/views/images/default_user_portrait.gif';
            $xml .= '<td style="text-align: left"><img src="'.$row['head_portrait'].'" class="user-avatar"'.
            'style="border-radius:50%;height:5%;"'.
            'data-geo="<img src =\''.$row['head_portrait'].' \'width = 300px > ">&nbsp;&nbsp;'.$row['true_name']. '</td>';
            $xml .= "<td style='text-align: center'>".$row['tel']."</td>";
            $sex = $row['member_sex']==0?'保密':($row['member_sex']==1?'男':'女');
            $xml .= "<td style='text-align: center'>".$sex."</td>";
            if($storetype==1){
                $xml .= "<td style='text-align: center'>".$row['ecshopping_guide_id']."</td>";
            }
            $xml .= "<td style='text-align: center'>".$row['order_num']."</td>";
            $xml .= "<td style='text-align: center'>".$row['order_money_num']."</td>";
            if($storetype==1){
                $xml .= "<td style='text-align: center'>".$row['integral']."</td>";
                $xml .= "<td style='text-align: center'>".$row['balance']."</td>";
            }
            $row['reg_time'] = !empty($row['reg_time']) ? date('Y/m/d H:i:s',$row['reg_time']) : '--';
            $xml .= "<td style='text-align: center'>".$row['reg_time']."</td>";
            $xml .= "</tr>";
        }
        echo $xml;exit();
    }


    /*会员管理的编辑(详情:基本信息)*/
    public function member_edit($id = false){
        $this->common_function->pay_role("seller_member_manage");//权限
        if ($id === false){
            $this->smarty->assign('operate', 'add');
        }else{
            $rows = $this->common_function->get_rows('user', "user_id = ".$id);
            $row = $rows[0];
            $row['head_portrait'] = $row['head_portrait']?$row['head_portrait']:base_url().'application/admin/views/images/default_user_portrait.gif';
            $row['reg_time'] = !empty($row['reg_time']) ? date('Y/m/d H:i:s',$row['reg_time']) : '--';
            if($row['ecshopping_guide_id']){
                $row['spg_name'] = $this->db->select('spg_name')->where('spg_id',$row['ecshopping_guide_id'])->get('store_shopping_guide')->row('spg_name');
            }else{
                $row['spg_name'] = "";
            }

            $this->db->select('u.uig_id,u.user_id,u.integral_num,u.action_user_id,u.ation_time,u.action_type,u.note,a.admin_name');
            $this->db->from('user_integral as  u');
            $this->db->join('admin as a','a.admin_id=u.action_user_id','left');
            $this->db->where("u.user_id",$row['user_id']);
            $this->db->order_by('u.uig_id','ASC');
            $integral= $this->db->get()->result_array();
            if(count($integral)>=2){
                $integration = 0;
                foreach ($integral as $key=>$val){
                    $integration+=$val['integral_num'];
                }
            }elseif (count($integral)==1){
                $integration = $integral[0]['integral_num'];
            }else{
                $integration = 0;
            }
            $row['integral'] = $integration;
            $row['integral_numer'] = count($integral);
            $row['integral_info'] = $integral;
            $query=$this->db->select('mld_exp,mld_name,mld_id')->order_by('mld_exp DESC')->get('user_mldefault')->result_array();
            $res=array();
            foreach ($query as $k=>$v){
                if($v['mld_exp']<=$row['integral_total']){
                    $res=$v;
                    break;
                }
            }
            $row['mld_name'] = $res['mld_name'];

            $wheres  = " buyer_id ='{$row['user_id']}' and refund_state = '0' and (order_status = '20' or order_status = '30' or order_status = '40') order by pay_time desc";

            $this->db->select('buyer_id,order_sn,order_price,pay_time');
            $this->db->from('shop_order');
            $this->db->where($wheres);
            $orderinfo= $this->db->get()->result_array();
            $row['order_num'] = count($orderinfo);
            $row['pay_time'] = !empty($orderinfo[0]['pay_time']) ? date('Y/m/d H:i:s',$orderinfo[0]['pay_time']) : '--';
            $row['order_money_num'] = 0;
            if($orderinfo){
                $integration = 0;
                foreach ($orderinfo as $key=>$val){
                    $row['order_money_num']+=$val['order_price'];
                }
            }

            $this->db->select('ubofw_id,wx_action,wx_action_time,wx_action_value');
            $this->db->from('user_bind_or_follow_wx');
            $this->db->where("user_id",$row['user_id']);
            $this->db->where("wx_action",'3');
            $this->db->order_by('wx_action_time','DESC');
            $ecshopping_guide= $this->db->get()->row_array();
            if($ecshopping_guide){
                $row['ecshopping_guide_id'] = $ecshopping_guide['wx_action_value'];
            }else{
                $row['ecshopping_guide_id'] = "";
            }

            $this->db->select('coupon_id,coupon_ger_time,coupon_cost_time');
            $this->db->from('user_coupon');
            $this->db->where("user_id",$row['user_id']);
            $this->db->where("coupon_cost_time <".time());
            $this->db->order_by('coupon_id','DESC');
            $coupon = $this->db->get()->result_array();
            $row['coupon_num'] = count($coupon);

            $this->db->select('ubofw_id,wx_action,wx_action_time,wx_action_value,note');
            $this->db->from('user_bind_or_follow_wx');
            $this->db->where("user_id",$row['user_id']);
            $this->db->order_by('wx_action_time','DESC');
            $wx_action= $this->db->get()->result_array();
            if($wx_action){
                foreach ($wx_action as $key=>$val){
                    $wx_action[$key]['wx_action_time'] = !empty($val['wx_action_time']) ? date('Y-m-d H:i:s',$val['wx_action_time']) : '--';
                    if($val['wx_action']==1){
                        $wx_action[$key]['wx_action'] = "创建用户";
                    }elseif ($val['wx_action']==2){
                        $wx_action[$key]['wx_action'] = "关注公众号";
                    }elseif ($val['wx_action']==3){
                        $wx_action[$key]['wx_action'] = "绑定导购";
                    }elseif ($val['wx_action']==4){
                        $wx_action[$key]['wx_action'] = "绑定门店";
                    }elseif ($val['wx_action']==5){
                        $wx_action[$key]['wx_action'] = "取消关注公众号";
                    }elseif ($val['wx_action']==6){
                        $wx_action[$key]['wx_action'] = "解绑门店";
                    }elseif ($val['wx_action']==7){
                        $wx_action[$key]['wx_action'] = "解绑导购";
                    }

                }
                $row['wx_action'] = $wx_action;
                $row['action_nums'] = count($wx_action);
            }else{
                $row['wx_action'] = array();
                $row['action_nums'] =0;
            }

            $this->smarty->assign('info', $row);
            $this->smarty->assign('operate', 'editing');

        }
        $this->smarty->display ( 'member_edit.html' );
    }

    /*会员其他详细信息*/
    public function get_user_info(){
        $this->common_function->pay_role("seller_member_manage");//权限
        $op = (isset($_GET['op']) && !empty($_GET['op'])) ? $_GET['op']: false;
        $user_id = (isset($_GET['user_id']) && !empty($_GET['user_id'])) ? $_GET['user_id'] : false;
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? $_POST['query'] : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = "1 = '1'";
        if ($query && $qtype){
            $where .= " and {$qtype} = {$query}";
        }
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        if($user_id){
            if($op =="guide"){      //关注及绑定
                $this->db->select('ubofw_id,wx_action,wx_action_time,wx_action_value,note');
                $this->db->from('user_bind_or_follow_wx');
                $this->db->where("user_id",$user_id);
                $this->db->where($where);
                $this->db->order_by('wx_action_time','DESC');
                $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
                $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
                $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
                if ($total == 0) {
                    $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
                    echo $xml;
                    exit;
                }
                foreach($rows AS $row){
                    $row['wx_action_time'] = !empty($row['wx_action_time']) ? date('Y-m-d H:i:s',$row['wx_action_time']) : '--';
                    if($row['wx_action']==1){
                        $row['wx_action'] = "创建用户";
                    }elseif ($row['wx_action']==2){
                        $row['wx_action'] = "关注公众号";
                    }elseif ($row['wx_action']==3){
                        $row['wx_action'] = "绑定导购";
                    }elseif ($row['wx_action']==4){
                        $row['wx_action'] = "绑定门店";
                    }elseif ($row['wx_action']==5){
                        $row['wx_action'] = "取消关注公众号";
                    }elseif ($row['wx_action']==6){
                        $row['wx_action'] = "解绑门店";
                    }elseif ($row['wx_action']==7){
                        $row['wx_action'] = "解绑导购";
                    }
                    $xml .= "<tr id='row" . $row['ubofw_id'] . "' data-id='" . $row['ubofw_id'] . "'>";
                    $xml .= "<td>".$row['wx_action_time']."</td>";
                    $xml .= "<td>".$row['wx_action']."</td>";
                    $xml .= "<td>".$row['note']."</td>";
                    $xml .= "</tr>";
                }

                echo $xml;exit;

            }elseif($op =="order"){    //订单消费
                $this->db->select('created_time,buyer_id,order_status,shipping_type,store_id,pay_type,store_name,shipping_type,order_price,goods_num,logistics_company_name,order_sn,order_price,pay_time');
                $this->db->from('shop_order');
                $this->db->where("buyer_id",$user_id);
                $this->db->where($where);
                $this->db->order_by('pay_time DESC,created_time DESC');
                $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
                $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
                $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
                if ($total == 0) {
                    $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
                    echo $xml;
                    exit;
                }
                foreach($rows AS $row){
                    $row['created_time'] = !empty($row['created_time']) ? date('Y-m-d H:i:s',$row['created_time']) : '--';
                    if($row['order_status']==0){
                        $row['order_status'] = "已取消";
                    }elseif ($row['order_status']==10){
                        $row['order_status'] = "未付款";
                    }elseif ($row['order_status']==20){
                        $row['order_status'] = "已付款";
                    }elseif ($row['order_status']==30){
                        $row['order_status'] = "已发货";
                    }else{
                        $row['order_status'] = "已收货";
                    }

                    if($row['pay_type']==1){
                        $row['pay_type'] = "微信";
                    }elseif ($row['pay_type']==2){
                        $row['pay_type'] = "线下";
                    }elseif ($row['pay_type']==3){
                        $row['pay_type'] = "余额";
                    }elseif ($row['pay_type']==4){
                        $row['pay_type'] = "支付宝";
                    }else{
                        $row['pay_type'] = "其他";
                    }

                    if($row['shipping_type']==1){
                        $row['shipping_type'] = "快递";
                    }else{
                        $row['shipping_type'] = "自提";
                    }

                    $xml .= "<tr id='row" . $row['order_sn'] . "' data-id='" . $row['order_sn'] . "'>";
                    $xml .= "<td style='text-align: center'><a class='btn green' href=''>订单详情</a></td>";
                    $xml .= "<td>".$row['order_sn']."</td>";
                    $xml .= "<td>".$row['store_name']."</td>";
                    $xml .= "<td>".$row['order_status']."</td>";
                    $xml .= "<td>".$row['pay_type']."</td>";
                    $xml .= "<td>".$row['shipping_type']."</td>";
                    $xml .= "<td>".$row['order_price']."</td>";
                    $xml .= "<td>".$row['created_time']."</td>";
                    $xml .= "</tr>";
                }
                echo $xml;exit;
            }elseif($op =="integral"){      //会员积分
                $this->db->select('u.uig_id,u.user_id,u.integral_num,u.action_user_id,u.ation_time,u.action_type,u.note,a.admin_name');
                $this->db->from('user_integral as  u');
                $this->db->join('admin as a','a.admin_id=u.action_user_id','left');
                $this->db->where("u.user_id",$user_id);
                $this->db->where($where);
                $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
                $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
                $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
                if ($total == 0) {
                    $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
                    echo $xml;
                    exit;
                }
                foreach($rows AS $row){
                    $row['ation_time'] = !empty($row['ation_time']) ? date('Y-m-d H:i:s',$row['ation_time']) : '--';
                    $xml .= "<tr id='row" . $row['uig_id'] . "' data-id='" . $row['uig_id'] . "'>";
                    $xml .= "<td>".$row['ation_time']."</td>";
                    $xml .= "<td>".$row['admin_name']."</td>";
                    $xml .= "<td>".$row['action_type']."</td>";
                    $xml .= "<td>".$row['integral_num']."</td>";
                    $xml .= "<td>".$row['note']."</td>";
                    $xml .= "</tr>";
                }
                echo $xml;exit;
            }elseif($op =="mld_exp"){      //会员等级

            }elseif($op =="spg_content"){        //导购评价
                $this->db->select('u.osgpe_id,u.order_sn,u.spg_id,u.evaluation_label,u.evaluation_time,t.order_sn,t.spg_id,t.spg_name,t.store_name,t.buyer_id');
                $this->db->from('shop_order_shoppingguide_evaluation as  u');
                $this->db->join('shop_order as t','t.order_sn=u.order_sn and u.spg_id = t.spg_id','left');
                $this->db->where("t.buyer_id",$user_id);
                $this->db->where($where);
                $this->db->order_by('u.evaluation_time DESC');
                $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
                $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
                $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
                if ($total == 0) {
                    $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
                    echo $xml;
                    exit;
                }
                foreach($rows AS $row){
                    $row['evaluation_time'] = !empty($row['evaluation_time']) ? date('Y-m-d H:i:s',$row['evaluation_time']) : '--';
                    $xml .= "<tr id='row" . $row['osgpe_id'] . "' data-id='" . $row['osgpe_id'] . "'>";
                    $xml .= "<td>".$row['evaluation_time']."</td>";
                    $xml .= "<td>".$row['spg_name']."</td>";
                    $xml .= "<td>".$row['store_name']."</td>";
                    $xml .= "<td>".$row['order_sn']."</td>";
                    $xml .= "<td>".$row['evaluation_label']."</td>";
                    $xml .= "</tr>";
                }
                echo $xml;exit;
            }elseif($op =="order_content"){         //商品评价
                $this->db->select('rec_id,order_sn,goods_name,evaluation_state,evaluation_content,evaluation_time');
                $this->db->from('shop_order_goods');
                $this->db->where("user_id",$user_id);
                $this->db->where("evaluation_state",'1');
                $this->db->where($where);
                $this->db->order_by('evaluation_time DESC');
                $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
                $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
                $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
                if ($total == 0) {
                    $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
                    echo $xml;
                    exit;
                }
                foreach($rows AS $row){
                    $row['evaluation_time'] = !empty($row['evaluation_time']) ? date('Y-m-d H:i:s',$row['evaluation_time']) : '--';
                    $xml .= "<tr id='row" . $row['rec_id'] . "' data-id='" . $row['rec_id'] . "'>";
                    $xml .= "<td>".$row['evaluation_time']."</td>";
                    $xml .= "<td>".$row['goods_name']."</td>";
                    $xml .= "<td>".$row['order_sn']."</td>";
                    $xml .= "<td>".$row['evaluation_content']."</td>";
                    $xml .= "</tr>";
                }
                echo $xml;exit;
            }

        }
    }

    /*修改会员信息qq/tel*/
    public function update_user_info(){
        $this->common_function->pay_role("seller_member_edit");//权限
        $op = (isset($_GET['op']) && !empty($_GET['op'])) ? $_GET['op']: false;
        $user_id = (isset($_GET['user_id']) && !empty($_GET['user_id'])) ? $_GET['user_id']: false;
        $data= (isset($_GET['str']) && !empty($_GET['str'])) ? $_GET['str']: false;
        $result = array('state'=>false, 'msg'=>"修改失败");
        if($op && $user_id && $data){
            if($op=="tel"){
                $inner=array("tel"=>$data);
            }else{
                $inner=array("qq"=>$data);
            }
            $this->db->where('user_id',$user_id);
            $res= $this->db->update('user',$inner);
            if($res){
                $result['state']=true;
            }
        }
        echo  json_encode($result);exit;
    }

    //导出会员
   /* public  function user_management_excel(){
        $this->load->library('phpExcel');
        //include(ROOT_PATH . 'libraries/phpExcel/PHPExcel.php');
        $id_str = empty($_GET['id'])||$_GET['id'] == '' ? 'all' : $_GET['id'];
        // 注：若id为0，也返回true
        $where = ' 1=1 ';
        if($id_str == 'all'){
            $where.= '';
        }else{
            //var_dump( $id_str);
            $where .= " and user_id in ($id_str)";
        }

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($where);
        $rows = $this->db->get()->result_array();
        foreach($rows AS $row){

            $this->db->select('uig_id,user_id,integral_num');
            $this->db->from('user_integral');
            $this->db->where("user_id",$row['user_id']);
            $this->db->order_by('uig_id','ASC');
            $integral= $this->db->get()->result_array();
            if(count($integral)>=2){
                $integration = 0;
                foreach ($integral as $key=>$val){
                    $integration+=$val['integral_num'];
                }
            }elseif (count($integral)==1){
                $integration = $integral[0]['integral_num'];
            }else{
                $integration = 0;
            }
            $row['integral'] = $integration;


            $wheres  = " buyer_id ='{$row['user_id']}' and refund_state = '0' and order_status = '20' or order_status = '30' or order_status = '40' order by order_sn asc";
            $this->db->select('buyer_id,order_sn,order_price');
            $this->db->from('shop_order');
            $this->db->where($wheres);
            $orderinfo= $this->db->get()->result_array();
            $row['order_num'] = count($orderinfo);
            $row['order_money_num'] = 0;
            if($orderinfo){
                $integration = 0;
                foreach ($orderinfo as $key=>$val){
                    $row['order_money_num']+=$val['order_price'];
                }
            }


            $this->db->select('uw.ubofw_id,uw.wx_action,uw.wx_action_time,uw.wx_action_value,sg.spg_name,sg.spg_id');
            $this->db->from('user_bind_or_follow_wx as uw');
            $this->db->join('store_shopping_guide as sg','sg.spg_id=uw.wx_action_value','left');
            $this->db->where("uw.user_id",$row['user_id']);
            $this->db->where("uw.wx_action",'3');
            $this->db->order_by('uw.wx_action_time','DESC');
            $ecshopping_guide= $this->db->get()->row_array();
            if($ecshopping_guide){
                $row['ecshopping_guide_id'] = $ecshopping_guide['spg_name'];
            }else{
                $row['ecshopping_guide_id'] = "无";
            }
        }
        //print_r($rows);exit;
        $objPHPExcel=new PHPExcel();
        $objPHPExcel->getProperties()->setCreator('jk')
            ->setLastModifiedBy('jk')
            ->setTitle('Office 2007 XLSX Document')
            ->setSubject('Office 2007 XLSX Document')
            ->setDescription('Document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Result file');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1','ID')
            ->setCellValue('B1','会员信息')
            ->setCellValue('C1','手机号')
            ->setCellValue('D1','性别')
            ->setCellValue('E1','最近绑定导购')
            ->setCellValue('F1','付款订单数')
            ->setCellValue('G1','付款订单金')
            ->setCellValue('H1','剩余积分')
            ->setCellValue('I1','账户余额')
            ->setCellValue('J1','加入时间');;

        $i=2;
        foreach($rows as $k=>$v){
            $sex = $v['member_sex']==0?'保密':($v['member_sex']==1?'男':'女');
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i,$v['user_id'])
                ->setCellValue('B'.$i,$v['user_name'])
                ->setCellValue('C'.$i,$v['tel'])
                ->setCellValue('D'.$i,$sex)
                ->setCellValue('E'.$i,$v['ecshopping_guide_id'])
                ->setCellValue('F'.$i,$v['order_num'])
                ->setCellValue('G'.$i,$v['order_money_num'])
                ->setCellValue('H'.$i,$v['integral'])
                ->setCellValue('I'.$i,$v['balance'])
                ->setCellValue('J'.$i,!empty($row['reg_time']) ? date('Y/m/d H:i:s',$row['reg_time']) : '--');
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('admin_log');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename=urlencode('会员列表').'_'.date('Y-m-dHis');

        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $aaa = $objWriter->save('php://output');
        exit;
    }*/
    public function address_management() {
    	//$this->common_function->supplier_priv("user_manage");//权限
    	$this->db->select('ua.a_id,ua.user_id,ua.user_name,ua.province,ua.city,ua.area,ua.address,ua.postcode,ua.tel,ua.tel2,ua.is_default,a.area_name as province_name,b.area_name as city_name,c.area_name as area_name');
    	$this->db->from('store_address as ua');
    	$this->db->join('area as a','a.area_id = ua.province');
    	$this->db->join('area as b','b.area_id = ua.city');
    	$this->db->join('area as c','c.area_id = ua.area');
    	$this->db->where('user_id',$_SESSION['shop_spg_store_id']);
    	$this->db->order_by('ua.is_default','DESC');
    	$this->db->order_by('ua.last_modify_time','DESC');
    	$address_infos = $this->db->get()->result_array();
    	$provinces = $this->common_function->get_area();
    	if(isset($_GET['op']) && $_GET['op'] == 'edit'){
    		$a_id = $_GET['a_id'] ? $_GET['a_id'] :false;
    		if($a_id){
    			$this->db->select('ua.a_id,ua.user_id,ua.user_name,ua.is_default,ua.province,ua.city,ua.area,ua.address,ua.postcode,ua.tel,ua.tel2,ua.is_default,a.area_name as province_name,b.area_name as city_name,c.area_name as area_name');
    			$this->db->from('store_address as ua');
    			$this->db->join('area as a','a.area_id = ua.province');
    			$this->db->join('area as b','b.area_id = ua.city');
    			$this->db->join('area as c','c.area_id = ua.area');
    			$this->db->where('user_id',$_SESSION['shop_spg_store_id']);
    			$this->db->where('a_id',$a_id);
    			$cur_info = $this->db->get()->row_array();
    			$this->smarty->assign('info',$cur_info);
    		}
    	}
    
    	$this->smarty->assign('address_infos',$address_infos);
    	$this->smarty->assign('provinces',$provinces);
    	$this->smarty->display('address_management.html');
    }
    //保存地址
    public function address_edit() {
    	//$this->common_function->supplier_priv("user_manage");//权限
    
    	$data = array('state'=>FALSE,'msg'=>'操作失败，请重试');
    	if(isset($_GET['op']) && $_GET['op'] == 'add'){
    		$param = $_POST;
    		$param['user_id'] = $_SESSION['shop_spg_store_id'];
    		$param['add_time'] = time();
    		$param['add_user_id'] = $_SESSION['shop_spg_id'];
    		$param['last_modify_time'] = time();
    		$param['last_modify_user_id'] = $_SESSION['shop_spg_id'];
    		$result = $this->db->insert('store_address',$param);
    		if($result){
    			//$this->common_function->insertUserLog('新增用户地址', 2, 2, 'user/address_edit');
    			$data = array('state'=>TRUE, 'msg'=>'保存成功');
    		}
    	}elseif(isset($_GET['op']) && $_GET['op'] == 'edit_submit'){
    		$param = $_POST;
    		$param['last_modify_time'] = time();
    		$param['last_modify_user_id'] = $_SESSION['shop_spg_id'];
    		$a_id = $_GET['a_id'];
    		$result = $this->db->update('store_address',$param,array('a_id'=>$a_id));
    		if($result){
    			//$this->common_function->insertUserLog('修改用户地址', 2, 2, 'user/address_edit');
    			$data = array('state'=>TRUE, 'msg'=>'修改成功');
    		}
    	}elseif(isset($_GET['op']) && $_GET['op'] == 'del'){
    		$a_id = $_GET['a_id'];
    		$result = $this->db->delete('store_address',array('a_id'=>$a_id));
    		if($result){
    			//$this->common_function->insertUserLog('删除用户地址', 2, 2, 'user/address_edit');
    			$data = array('state'=>TRUE, 'msg'=>'操作成功');
    		}
    	}elseif(isset($_GET['op']) && $_GET['op'] == 'set_default'){
    		$a_id = $_GET['a_id'];
    		$result = $this->db->update('store_address',array('is_default'=>0,'last_modify_time'=>time(),'last_modify_user_id'=>$_SESSION['shop_spg_id']),array('user_id'=>$_SESSION['shop_spg_store_id'],'is_default'=>1));
    		$result = $this->db->update('store_address',array('is_default'=>1,'last_modify_time'=>time(),'last_modify_user_id'=>$_SESSION['shop_spg_id']),array('a_id'=>$a_id));
    		if($result){
    			//$this->common_function->insertUserLog('用户地址设置默认', 2, 2, 'user/address_edit');
    			$data = array('state'=>TRUE, 'msg'=>'操作成功');
    		}
    	}
    	echo json_encode($data);
    }
    //获取下级地区
    public function get_son_area() {
    	$id = isset($_GET['p_id']) ? $_GET['p_id'] : false;
    	if($id){
    		$areas = $this->common_function->get_area($id);
    	}
    	$html = '';
    	foreach ($areas as $area){
    		$html .= '<option value="'.$area['area_id'].'">'.$area['area_name'].'</option>';
    	}
    	echo json_encode($html);
    }
}