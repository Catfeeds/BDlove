<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{

    /**
     * Index Page for this controller.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('common_function');
        $this->load->model('Website_model');
        $this->load->model('Web_model');
        $this->load->library('email');
    }

    /*会员管理*/
    public function member_management()
    {
        $role = isset($_GET['role']) && !empty($_GET['role']) ? $_GET['role'] : '';//权限
        if ($role == 'w') {//微商城
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'd') {//电商店
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'g') {//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        } else {//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role', $role);
        //获取授权品牌
        $mon_start = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m") - 1, date("d"), date("Y")));

        $week_start = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m"), date("d") - 7, date("Y")));

        $tom_start = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")));
        $tom_end = date('Y-m-d H:i:s', strtotime($tom_start) + 86399);

        $now_start = date('Y-m-d H:i:s', strtotime(date('Y-m-d', time())));
        $now_end = date('Y-m-d H:i:s', strtotime($now_start) + 86399);

        $this->smarty->assign('mon_start', $mon_start);
        $this->smarty->assign('week_start', $week_start);
        $this->smarty->assign('tom_start', $tom_start);
        $this->smarty->assign('tom_end', $tom_end);
        $this->smarty->assign('now_start', $now_start);
        $this->smarty->assign('now_end', $now_end);

        $this->db->select('store_id,store_name');
        $this->db->from('store');
        $stores = $this->db->get()->result_array();
        $this->smarty->assign('stores', $stores);
        $this->db->select('spg_id,spg_name');
        $this->db->from('store_shopping_guide');
        $guide = $this->db->get()->result_array();
        $this->smarty->assign('guide', $guide);
        $this->smarty->display('member_management.html');
    }

    public function member_list()
    {
        //var_dump($_POST);
        $role = isset($_GET['role']) && !empty($_GET['role']) ? $_GET['role'] : '';//权限
        if ($role == 'w') {//微商城
            $this->common_function->shop_admin_priv("store_management");
            $store = $this->db->select('store_id')->where('ous_type', 1)->get('store')->result_array();
            if ($store) {
                foreach ($store as $v) {
                    $stores[] = $v['store_id'];
                }
                $store_str = join(',', $stores);
                $where = "ecstore_id IN ({$store_str})";
            } else {
                $where = "ecstore_id ='w'";
            }
        } elseif ($role == 'd') {//电商店
            $this->common_function->shop_admin_priv("store_management");
            $store = $this->db->select('store_id')->where('ous_type', 2)->get('store')->result_array();
            if ($store) {
                foreach ($store as $v) {
                    $stores[] = $v['store_id'];
                }
                $store_str = join(',', $stores);
                $where = "ecstore_id IN ({$store_str})";
            } else {
                $where = "ecstore_id ='d'";
            }
        } elseif ($role == 'g') {//供应仓库
            $this->common_function->shop_admin_priv("store_management");
            $store = $this->db->select('store_id')->where('ous_type', 3)->get('store')->result_array();
            if ($store) {
                foreach ($store as $v) {
                    $stores[] = $v['store_id'];
                }
                $store_str = join(',', $stores);
                $where = "ecstore_id IN ({$store_str})";
            } else {
                $where = "ecstore_id ='g'";
            }
        } else {//平台
            $this->common_function->shop_admin_priv("store_management");
            $where = "1";
        }
        $this->smarty->assign('role', $role);
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? $_POST['query'] : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;

        $start_time = isset($_GET['start_time']) ? trim($_GET['start_time']) : '';
        $end_time = isset($_GET['end_time']) ? trim($_GET['end_time']) : '';
        $time = isset($_GET['time']) ? trim($_GET['time']) : '';

        $monney = isset($_GET['monney']) ? trim($_GET['monney']) : '';
        $start_monney = isset($_GET['start_monney']) ? trim($_GET['start_monney']) : '';
        $end_monney = isset($_GET['end_monney']) ? trim($_GET['end_monney']) : '';

//      $wx_num = isset($_GET['wx_num'])?trim($_GET['wx_num']):'';
        $num = isset($_GET['num']) ? trim($_GET['num']) : '';
        $start_num = isset($_GET['start_num']) ? trim($_GET['start_num']) : '';
        $end_num = isset($_GET['end_num']) ? trim($_GET['end_num']) : '';

        $understore = isset($_GET['understore']) ? trim($_GET['understore']) : '';
        $underguide = isset($_GET['underguide']) ? trim($_GET['underguide']) : '';
        //$card = isset($_GET['card'])?trim($_GET['card']):'';
        //$card_num = isset($_GET['card_num'])?trim($_GET['card_num']):'';
        $true_name = isset($_GET['true_name']) ? trim($_GET['true_name']) : '';
        $wx_nike = isset($_GET['wx_nike']) ? trim($_GET['wx_nike']) : '';
        $mobile = isset($_GET['mobile']) ? trim($_GET['mobile']) : '';


        if ($query && $qtype) {
            $where .= " and {$qtype} = {$query}";
        }

        if ($time != 'all') {
            if ($start_time != "" && $end_time != "") {
                $where .= " and reg_time >=" . strtotime($start_time) . " and reg_time <=" . strtotime($end_time) . " ";
            }

            if ($start_time != "" && $end_time == "") {
                $where .= " and reg_time >=" . strtotime($start_time) . " ";
            }

        }

        if ($monney != 'all') {
            if ($start_monney != "" && $end_monney != "") {
                $where .= " and order_money_num >'{$start_monney}' and order_money_num <='{$end_monney}' ";
            }

            if ($start_monney != "" && $end_monney == "") {
                $where .= " and order_money_num >='{$start_monney}' ";
            }
        }


        if ($num != 'all') {
            if ($start_num != "" && $end_num != "") {
                $where .= " and order_num >'{$start_num}' and order_num <='{$end_num}' ";
            }

            if ($start_num != "" && $end_num == "") {
                $where .= " and order_num >'{$start_num}'  ";
            }
        }
//         if($wx_num){
//             $where .= " and wx_openid like '%{$wx_num}%' ";
//         }
        if ($understore) {
            $where .= " and ecstore_id='{$understore}' ";
        }
        if ($underguide) {
            $where .= " and ecshopping_guide_id='{$underguide}' ";
        }
//         if($card){
//             $where .= " and order_num <='{$end_num}' ";
//         }
//         if($card_num){
//             $where .= " and order_num <='{$end_num}' ";
//         }
        if ($true_name) {
            $where .= " and true_name like '%{$true_name}%' ";
        }
        if ($wx_nike) {
            $where .= " and wx_nickname like '%{$wx_nike}%' ";
        }
        if ($mobile) {
            $where .= " and tel like '%{$mobile}%' ";
        }
        if ($sortname && $sortorder) {
            $where .= " order by {$sortname} {$sortorder}";
        }
        $total = $this->common_function->total('user', $where);
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('user', $where);
        $grades = $this->db->get('user_mldefault')->result_array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach ($rows AS $row) {
            $province = $this->common_function->get_area_name($row['province_id']);
            $city = $this->common_function->get_area_name($row['city_id']);
            $area = $this->common_function->get_area_name($row['area_id']);
            $this->db->select('uig_id,user_id,integral_num');
            $this->db->from('user_integral');
            $this->db->where("user_id", $row['user_id']);
            $this->db->order_by('uig_id', 'ASC');
            $integral = $this->db->get()->result_array();
            if (count($integral) >= 2) {
                $integration = 0;
                foreach ($integral as $key => $val) {
                    $integration += $val['integral_num'];
                }
            } elseif (count($integral) == 1) {
                $integration = $integral[0]['integral_num'];
            } else {
                $integration = 0;
            }
            $row['integral'] = $integration;
            $this->db->select('uw.ubofw_id,uw.wx_action,uw.wx_action_time,uw.wx_action_value,sg.spg_name,sg.spg_id');
            $this->db->from('user_bind_or_follow_wx as uw');
            $this->db->join('store_shopping_guide as sg', 'sg.spg_id=uw.wx_action_value', 'left');
            $this->db->where("uw.user_id", $row['user_id']);
            $this->db->where("uw.wx_action", '3');
            $this->db->order_by('uw.wx_action_time', 'DESC');
            $ecshopping_guide = $this->db->get()->row_array();
            if ($ecshopping_guide) {
                $row['ecshopping_guide_id'] = $ecshopping_guide['spg_name'];
            } else {
                $row['ecshopping_guide_id'] = "无";
            }
            if (empty($row['true_name'])) {
                $row['true_name'] = '--';
            }

            $xml .= "<row id='" . $row['user_id'] . "'>";
            $xml .= "<cell><![CDATA[<a class='btn red' onclick=fg_delete({$row['user_id']},'{$row['user_name']}')>
            <i class='fa fa-trash-o'></i>删除</a>
            <a class='btn green' href='member_edit/{$row['user_id']}'>编辑</a>
            ]]></cell>";
            $row['head_portrait'] = $row['head_portrait'] ? $row['head_portrait'] : base_url() . 'application/admin/views/images/default_user_portrait.gif';
            $xml .= "<cell><![CDATA[<img src=\"" . $row['head_portrait'] . '" class="user-avatar"' .
                ' onerror="this.src=\'' . TEMPLE . 'images/default_user_portrait.gif\'" style="border-radius:50%;height:80%;"' .
                ' data-geo="<img src=\'' . $row['head_portrait'] . '\' width=300px >">' .
                $row['true_name'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['tel'] . "]]></cell>";
            $sex = $row['member_sex'] == 0 ? '保密' : ($row['member_sex'] == 1 ? '男' : '女');
            $xml .= "<cell><![CDATA[" . $sex . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['ecshopping_guide_id'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['order_num'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['order_money_num'] . "]]></cell>";
            /* $xml .= "<cell><![CDATA[".$row['is_follow']."]]></cell>"; */
            $xml .= "<cell><![CDATA[" . $row['integral'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['balance'] . "]]></cell>";
            /*  $xml .= "<cell><![CDATA[".$row['rechargeable_card_num']."]]></cell>"; */
            $row['reg_time'] = !empty($row['reg_time']) ? date('Y/m/d H:i:s', $row['reg_time']) : '--';
            $xml .= "<cell><![CDATA[" . $row['reg_time'] . "]]></cell>";
            $xml .= "<cell><![CDATA[<span title='" . $province . "'>" . $province . "</span>]]></cell>";
            $xml .= "<cell><![CDATA[<span title='" . $city . "'>" . $city . "</span>]]></cell>";
            $xml .= "<cell><![CDATA[<span title='" . $area . "'>" . $area . "</span>]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }

    /*会员管理的编辑*/
    public function member_edit($id = false)
    {
        $role = isset($_GET['role']) && !empty($_GET['role']) ? $_GET['role'] : '';//权限
        if ($role == 'w') {//微商城
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'd') {//电商店
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'g') {//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        } else {//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role', $role);

        if ($id === false) {
            $this->smarty->assign('operate', 'add');
        } else {

            $rows = $this->common_function->get_rows('user', "user_id = " . $id);
            $row = $rows[0];
            $row['head_portrait'] = $row['head_portrait'] ? $row['head_portrait'] : base_url() . 'application/admin/views/images/default_user_portrait.gif';
            $row['reg_time'] = !empty($row['reg_time']) ? date('Y/m/d H:i:s', $row['reg_time']) : '--';

            //地址
            $province = $this->common_function->get_area_name($row['province_id']);
            $city = $this->common_function->get_area_name($row['city_id']);
            $area = $this->common_function->get_area_name($row['area_id']);
            $row['city_id'] = $province . $city . $area;

            if ($row['ecshopping_guide_id']) {
                $row['spg_name'] = $this->db->select('spg_name')->where('spg_id', $row['ecshopping_guide_id'])->get('store_shopping_guide')->row('spg_name');
            } else {
                $row['spg_name'] = "";
            }

            $this->db->select('u.uig_id,u.user_id,u.integral_num,u.action_user_id,u.ation_time,u.action_type,u.note,a.admin_name');
            $this->db->from('user_integral as  u');
            $this->db->join('admin as a', 'a.admin_id=u.action_user_id', 'left');
            $this->db->where("u.user_id", $row['user_id']);
            $this->db->order_by('u.uig_id', 'ASC');
            $integral = $this->db->get()->result_array();
            if (count($integral) >= 2) {
                $integration = 0;
                foreach ($integral as $key => $val) {
                    $integration += $val['integral_num'];
                }
            } elseif (count($integral) == 1) {
                $integration = $integral[0]['integral_num'];
            } else {
                $integration = 0;
            }
            $row['integral'] = $integration;
            $row['integral_numer'] = count($integral);
            $row['integral_info'] = $integral;


            /*   $this->db->select('mld_id,mld_name,mld_exp');
               $this->db->from('user_mldefault');
               $this->db->order_by('mld_id','ASC');
               $mldefault= $this->db->get()->result_array();
               if(count($mldefault)>=2){
                   foreach ($mldefault as $key=>$val){
                       if($key<(count($mldefault)-2)){
                           $num1 = $mldefault[$key]['mld_exp'];
                           $num2 = $mldefault[$key+1]['mld_exp'];
                           if($integration<$num2){
                               $row['mld_name'] = $mldefault[$key]['mld_name'];
                           }
                       }else{
                           $row['mld_name'] = $mldefault[$key]['mld_name'];
                       }
                   }
               }elseif (count($integral)<=1){
                   $row['mld_name'] = "初级粉丝";
               }*/

            $query = $this->db->select('mld_exp,mld_name,mld_id')->order_by('mld_exp DESC')->get('jk_user_mldefault')->result_array();
            $res = array();
            foreach ($query as $k => $v) {
                if ($v['mld_exp'] <= $row['integral_total']) {
                    $res = $v;
                    break;
                }
            }
            $row['mld_name'] = $res['mld_name'];


            $wheres = " buyer_id ='{$row['user_id']}' and refund_state = '0' and (order_status = '20' or order_status = '30' or order_status = '40') order by pay_time desc";

            $this->db->select('buyer_id,order_sn,order_price,pay_time');
            $this->db->from('shop_order');
            $this->db->where($wheres);
            $orderinfo = $this->db->get()->result_array();
            $row['order_num'] = count($orderinfo);
            $row['pay_time'] = !empty($orderinfo[0]['pay_time']) ? date('Y/m/d H:i:s', $orderinfo[0]['pay_time']) : '--';
            $row['order_money_num'] = 0;
            if ($orderinfo) {
                $integration = 0;
                foreach ($orderinfo as $key => $val) {
                    $row['order_money_num'] += $val['order_price'];
                }
            }


            $this->db->select('ubofw_id,wx_action,wx_action_time,wx_action_value');
            $this->db->from('user_bind_or_follow_wx');
            $this->db->where("user_id", $row['user_id']);
            $this->db->where("wx_action", '3');
            $this->db->order_by('wx_action_time', 'DESC');
            $ecshopping_guide = $this->db->get()->row_array();
            if ($ecshopping_guide) {
                $row['ecshopping_guide_id'] = $ecshopping_guide['wx_action_value'];
            } else {
                $row['ecshopping_guide_id'] = "";
            }


            $this->db->select('coupon_id,coupon_ger_time,coupon_cost_time');
            $this->db->from('user_coupon');
            $this->db->where("user_id", $row['user_id']);
            $this->db->where("coupon_cost_time <" . time());
            $this->db->order_by('coupon_id', 'DESC');
            $coupon = $this->db->get()->result_array();
            $row['coupon_num'] = count($coupon);


            $this->db->select('ubofw_id,wx_action,wx_action_time,wx_action_value,note');
            $this->db->from('user_bind_or_follow_wx');
            $this->db->where("user_id", $row['user_id']);
            $this->db->order_by('wx_action_time', 'DESC');
            $wx_action = $this->db->get()->result_array();
            if ($wx_action) {
                foreach ($wx_action as $key => $val) {
                    $wx_action[$key]['wx_action_time'] = !empty($val['wx_action_time']) ? date('Y-m-d H:i:s', $val['wx_action_time']) : '--';
                    if ($val['wx_action'] == 1) {
                        $wx_action[$key]['wx_action'] = "创建用户";
                    } elseif ($val['wx_action'] == 2) {
                        $wx_action[$key]['wx_action'] = "关注公众号";
                    } elseif ($val['wx_action'] == 3) {
                        $wx_action[$key]['wx_action'] = "绑定导购";
                    } elseif ($val['wx_action'] == 4) {
                        $wx_action[$key]['wx_action'] = "绑定门店";
                    } elseif ($val['wx_action'] == 5) {
                        $wx_action[$key]['wx_action'] = "取消关注公众号";
                    } elseif ($val['wx_action'] == 6) {
                        $wx_action[$key]['wx_action'] = "解绑门店";
                    } elseif ($val['wx_action'] == 7) {
                        $wx_action[$key]['wx_action'] = "解绑导购";
                    }

                }
                $row['wx_action'] = $wx_action;
                $row['action_nums'] = count($wx_action);
            } else {
                $row['wx_action'] = array();
                $row['action_nums'] = 0;
            }


            $this->smarty->assign('info', $row);
            $this->smarty->assign('operate', 'editing');

        }
        $this->smarty->display('member_edit.html');
    }

    public function get_user_info()
    {
        $this->common_function->shop_admin_priv("user_base");//权限
        $op = (isset($_GET['op']) && !empty($_GET['op'])) ? $_GET['op'] : false;
        $user_id = (isset($_GET['user_id']) && !empty($_GET['user_id'])) ? $_GET['user_id'] : false;

        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? $_POST['query'] : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = "1 = '1'";
        if ($query && $qtype) {
            $where .= " and {$qtype} = {$query}";
        }
        if ($sortname && $sortorder) {
            $where .= " order by {$sortname} {$sortorder}";
        }
        if ($user_id) {
            if ($op == "guide") {
                $this->db->select('ubofw_id,wx_action,wx_action_time,wx_action_value,note');
                $this->db->from('user_bind_or_follow_wx');
                $this->db->where("user_id", $user_id);
                $this->db->where($where);
                $rows = $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows, $start, $rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml .= "<rows>";
                $xml .= "<page>$page</page>";
                $xml .= "<total>$total</total>";
                foreach ($rows AS $row) {
                    $row['wx_action_time'] = !empty($row['wx_action_time']) ? date('Y-m-d H:i:s', $row['wx_action_time']) : '--';
                    if ($row['wx_action'] == 1) {
                        $row['wx_action'] = "创建用户";
                    } elseif ($row['wx_action'] == 2) {
                        $row['wx_action'] = "关注公众号";
                    } elseif ($row['wx_action'] == 3) {
                        $row['wx_action'] = "绑定导购";
                    } elseif ($row['wx_action'] == 4) {
                        $row['wx_action'] = "绑定门店";
                    } elseif ($row['wx_action'] == 5) {
                        $row['wx_action'] = "取消关注公众号";
                    } elseif ($row['wx_action'] == 6) {
                        $row['wx_action'] = "解绑门店";
                    } elseif ($row['wx_action'] == 7) {
                        $row['wx_action'] = "解绑导购";
                    }
                    $xml .= "<row id='" . $row['ubofw_id'] . "'>";
                    $xml .= "<cell><![CDATA[" . $row['wx_action_time'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['wx_action'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['note'] . "]]></cell>";
                    $xml .= "</row>";
                }
                $xml .= "</rows>";
                echo $xml;
                exit;

            } elseif ($op == "order") {
                $this->db->select('created_time,buyer_id,order_status,shipping_type,store_id,pay_type,store_name,shipping_type,order_price,goods_num,logistics_company_name,order_sn,order_price,pay_time');
                $this->db->from('shop_order');
                $this->db->where("buyer_id", $user_id);
                $this->db->where($where);
                //$this->db->order_by('created_time', 'DESC');
                $rows = $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows, $start, $rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml .= "<rows>";
                $xml .= "<page>$page</page>";
                $xml .= "<total>$total</total>";
                foreach ($rows AS $row) {
                    $row['created_time'] = !empty($row['created_time']) ? date('Y-m-d H:i:s', $row['created_time']) : '--';
                    if ($row['order_status'] == 0) {
                        $row['order_status'] = "已取消";
                    } elseif ($row['order_status'] == 10) {
                        $row['order_status'] = "未付款";
                    } elseif ($row['order_status'] == 20) {
                        $row['order_status'] = "已付款";
                    } elseif ($row['order_status'] == 30) {
                        $row['order_status'] = "已发货";
                    } elseif ($row['order_status'] == 40) {
                        $row['order_status'] = "已收货";
                    }

                    if ($row['pay_type'] == 1) {
                        $row['pay_type'] = "微信";
                    } elseif ($row['pay_type'] == 2) {
                        $row['pay_type'] = "线下";
                    } elseif ($row['pay_type'] == 3) {
                        $row['pay_type'] = "余额";
                    }

                    if ($row['shipping_type'] == 1) {
                        $row['shipping_type'] = "快递";
                    } else {
                        $row['shipping_type'] = "自提";
                    }

                    $xml .= "<row id='" . $row['order_sn'] . "'>";
                    $xml .= "<cell><![CDATA[<a class='btn red' href=" . base_url('admin.php/business/business_order_details?order_sn=' . $row['order_sn']) . "><i class='fa fa-trash-o'></i>订单详情</a>]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['order_sn'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['store_name'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['order_status'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['pay_type'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['shipping_type'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['order_price'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['created_time'] . "]]></cell>";
                    $xml .= "</row>";
                }
                $xml .= "</rows>";
                echo $xml;
                exit;
            } elseif ($op == "integral") {
                $this->db->select('u.uig_id,u.user_id,u.integral_num,u.action_user_id,u.ation_time,u.action_type,u.note,a.admin_name');
                $this->db->from('user_integral as  u');
                $this->db->join('admin as a', 'a.admin_id=u.action_user_id', 'left');
                $this->db->where("u.user_id", $user_id);
                $this->db->where($where);
                $rows = $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows, $start, $rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml .= "<rows>";
                $xml .= "<page>$page</page>";
                $xml .= "<total>$total</total>";
                foreach ($rows AS $row) {
                    $row['ation_time'] = !empty($row['ation_time']) ? date('Y-m-d H:i:s', $row['ation_time']) : '--';
                    /* if($row['action_type']==1){
                         $row['action_type'] = "手动增减";
                     }else{
                         $row['action_type'] = "系统增减";
                     }*/

                    $xml .= "<row id='" . $row['uig_id'] . "'>";
                    $xml .= "<cell><![CDATA[" . $row['ation_time'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['admin_name'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['action_type'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['integral_num'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['note'] . "]]></cell>";
                    $xml .= "</row>";
                }
                $xml .= "</rows>";
                echo $xml;
                exit;
            } elseif ($op == "mld_exp") {

            } elseif ($op == "spg_content") {
                $this->db->select('u.osgpe_id,u.order_sn,u.spg_id,u.evaluation_label,u.evaluation_time,t.order_sn,t.spg_id,t.spg_name,t.store_name,t.buyer_id');
                $this->db->from('shop_order_shoppingguide_evaluation as  u');
                $this->db->join('shop_order as t', 't.order_sn=u.order_sn and u.spg_id = t.spg_id', 'left');
                $this->db->where("t.buyer_id", $user_id);
                $this->db->where($where);
                $rows = $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows, $start, $rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml .= "<rows>";
                $xml .= "<page>$page</page>";
                $xml .= "<total>$total</total>";
                foreach ($rows AS $row) {
                    $row['evaluation_time'] = !empty($row['evaluation_time']) ? date('Y-m-d H:i:s', $row['evaluation_time']) : '--';
                    $xml .= "<row id='" . $row['osgpe_id'] . "'>";
                    $xml .= "<cell><![CDATA[" . $row['evaluation_time'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['spg_name'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['store_name'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['order_sn'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['evaluation_label'] . "]]></cell>";
                    $xml .= "</row>";
                }
                $xml .= "</rows>";
                echo $xml;
                exit;
            } elseif ($op == "order_content") {
                $this->db->select('rec_id,order_sn,goods_name,evaluation_state,evaluation_content,evaluation_time');
                $this->db->from('shop_order_goods');
                $this->db->where("user_id", $user_id);
                $this->db->where("evaluation_state", '1');
                $this->db->where($where);
                $rows = $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows, $start, $rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml .= "<rows>";
                $xml .= "<page>$page</page>";
                $xml .= "<total>$total</total>";
                foreach ($rows AS $row) {
                    $row['evaluation_time'] = !empty($row['evaluation_time']) ? date('Y-m-d H:i:s', $row['evaluation_time']) : '--';
                    $xml .= "<row id='" . $row['rec_id'] . "'>";
                    $xml .= "<cell><![CDATA[" . $row['evaluation_time'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['goods_name'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['order_sn'] . "]]></cell>";
                    $xml .= "<cell><![CDATA[" . $row['evaluation_content'] . "]]></cell>";
                    $xml .= "</row>";
                }
                $xml .= "</rows>";
                echo $xml;
                exit;
            }

        }
    }

    /*修改会员信息qq/tel*/
    public function update_user_info()
    {
        $role = isset($_GET['role']) && !empty($_GET['role']) ? $_GET['role'] : '';//权限
        if ($role == 'w') {//微商城
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'd') {//电商店
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'g') {//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        } else {//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role', $role);

        $op = (isset($_GET['op']) && !empty($_GET['op'])) ? $_GET['op'] : false;
        $user_id = (isset($_GET['user_id']) && !empty($_GET['user_id'])) ? $_GET['user_id'] : false;
        $data = (isset($_GET['str']) && !empty($_GET['str'])) ? $_GET['str'] : false;
        $result = array('state' => false, 'msg' => "修改失败");
        if ($op && $user_id && $data) {
            if ($op == "tel") {
                $inner = array("tel" => $data);
            } else {
                $inner = array("qq" => $data);
            }
            $this->db->where('user_id', $user_id);
            $res = $this->db->update('user', $inner);
            if ($res) {
                $result['state'] = true;
            }
        }
        echo json_encode($result);
        exit;
    }

    //检查会员是否存在
    public function member_name_check()
    {
        $name = trim($this->input->post('member_name'));
        if ($this->common_function->total('user', "user_name = '{$name}'") != 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    //检查会员邮箱是否存在
    public function member_mail_check()
    {
        $mail = trim($this->input->post('member_email'));
        if ($this->common_function->total('user', "user_name = '{$mail}'") != 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    //新增会员
    public function member_add()
    {
        $role = isset($_GET['role']) && !empty($_GET['role']) ? $_GET['role'] : '';//权限
        if ($role == 'w') {//微商城
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'd') {//电商店
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'g') {//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        } else {//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role', $role);
        $data = $this->input->post();
        $inn['pwd'] = encrypt_pwd(trim($data['member_passwd']));
        $inn['user_name'] = trim($data['member_name']);
        $inn['true_name'] = trim($data['member_truename']);
        $inn['aliId'] = trim($data['member_ww']);
        $inn['user_email'] = trim($data['member_email']);
        $inn['member_sex'] = $data['member_sex'];
        $inn['member_state'] = $data['member_state'];

        if (!empty ($_FILES ['_pic'] ['name'])) {
            $tmp_file = $_FILES ['_pic'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['_pic'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            if (!in_array(strtolower($file_type), array('gif', 'jpeg', 'png', 'bmp', 'jpg'))) {
                $return = array(
                    'state' => false,
                    'msg' => "不是图片文件，重新稍后上传"
                );
                echo json_encode($return);
                exit();
            }
            $savePath = ROOTPATH . 'data/member_img/'; // 设置上传路径
            $str = date('YmdHis') . uniqid(); // 以时间来命名上传的文件
            $file_name = $str . "." . $file_type; // 是否上传成功
            if (!copy($tmp_file, $savePath . $file_name)) {
                $return = array(
                    'state' => false,
                    'msg' => "图片上传失败，请稍后重新上传"
                );
                echo json_encode($return);
                exit();
            }
            $inn['head_portrait'] = 'data/member_img/' . $file_name;
        }
        $inn['reg_time'] = time();

        if ($this->db->insert('user', $inn)) {
            $return = array(
                'state' => true,
                'msg' => "添加成功"
            );
            echo json_encode($return);
            exit();
        } else {
            $return = array(
                'state' => false,
                'msg' => "添加失败"
            );
            echo json_encode($return);
            exit();
        }
    }

    //编辑会员
    public function member_editing()
    {
        $role = isset($_GET['role']) && !empty($_GET['role']) ? $_GET['role'] : '';//权限
        if ($role == 'w') {//微商城
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'd') {//电商店
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'g') {//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        } else {//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role', $role);
        $data = $this->input->post();
        if (!empty(trim($data['member_passwd']))) {
            $inn['pwd'] = encrypt_pwd(trim($data['member_passwd']));
        }
        $inn['true_name'] = trim($data['member_truename']);
        $inn['QQ'] = trim($data['member_qq']);
        $inn['aliId'] = trim($data['member_ww']);
        $inn['user_email'] = trim($data['member_email']);
        $inn['member_sex'] = $data['member_sex'];
        $inn['member_state'] = $data['member_state'];

        $user_id = $_POST['member_id'];

        if (!empty ($_FILES ['_pic'] ['name'])) {
            $tmp_file = $_FILES ['_pic'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['_pic'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            if (!in_array(strtolower($file_type), array('gif', 'jpeg', 'png', 'bmp', 'jpg'))) {
                $return = array(
                    'state' => false,
                    'msg' => "不是图片文件，重新稍后上传"
                );
                echo json_encode($return);
                exit();
            }
            $savePath = ROOTPATH . 'data/member_img/'; // 设置上传路径
            $str = date('YmdHis') . uniqid(); // 以时间来命名上传的文件
            $file_name = $str . "." . $file_type; // 是否上传成功
            if (!copy($tmp_file, $savePath . $file_name)) {
                $return = array(
                    'state' => false,
                    'msg' => "图片上传失败，请稍后重新上传"
                );
                echo json_encode($return);
                exit();
            }
            $inn['head_portrait'] = 'data/member_img/' . $file_name;
        }
        $url = $this->db->select('head_portrait')->where('user_id', $user_id)->get('user')->row('head_portrait');
        if ($this->db->update('user', $inn, array('user_id' => $user_id))) {
            if (!empty($url)) {
                @unlink(ROOTPATH . $url);
            }
            $return = array(
                'state' => true,
                'msg' => "编辑成功"
            );
            echo json_encode($return);
            exit();
        } else {
            if (isset($inn['head_portrait'])) {
                @unlink(ROOTPATH . $inn['head_portrait']);
            }
            $return = array(
                'state' => false,
                'msg' => "编辑失败"
            );
            echo json_encode($return);
            exit();
        }
    }

    //删除用户
    public function member_del()
    {
        $role = isset($_GET['role']) && !empty($_GET['role']) ? $_GET['role'] : '';//权限
        if ($role == 'w') {//微商城
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'd') {//电商店
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'g') {//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        } else {//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role', $role);
        $ids = $_POST['id'];
        $ids = explode(',', $ids);
        if (is_array($ids)) {
            foreach ($ids as $id) {
                $img = $this->db->select('head_portrait')->where('user_id', $id)->get('user')->row('head_portrait');
                if ($this->db->delete('user', array('user_id' => $id))) {
                    @unlink(ROOTPATH . $img);
                } else {
                    echo json_encode('删除失败');
                    exit();
                }
            }
        }
        echo json_encode('删除成功');
        exit();
    }

    //日志导出
    public function logExport()
    {
        $role = isset($_GET['role']) && !empty($_GET['role']) ? $_GET['role'] : '';//权限
        if ($role == 'w') {//微商城
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'd') {//电商店
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'g') {//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        } else {//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role', $role);
        $this->load->library('phpExcel');

        $id = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : "";
        $where = ' 1=1 ';
        if ($id) {
            $where = "user_id in ($id)";
        }

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($where);
        $rows = $this->db->get()->result_array();

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator('jk')
            ->setLastModifiedBy('jk')
            ->setTitle('Office 2007 XLSX Document')
            ->setSubject('Office 2007 XLSX Document')
            ->setDescription('Document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Result file');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', '会员名称')
            ->setCellValue('C1', '真实姓名')
            ->setCellValue('D1', '会员手机')
            ->setCellValue('E1', '会员邮箱')
            ->setCellValue('F1', '注册时间')
            ->setCellValue('G1', '最后登录时间')
            ->setCellValue('H1', '最后登录IP')
            ->setCellValue('I1', '允许登录');

        $i = 2;
        foreach ($rows as $k => $v) {
            $reg_time = "";
            if (!empty($v['reg_time'])) {
                $reg_time = date('Y/m/d H:i:s', $v['reg_time']);
            }
            $login_time = "";
            if (!empty($v['member_login_time'])) {
                $login_time = date('Y/m/d H:i:s', $v['member_login_time']);
            }
            $member_state = "是";
            if ($v['member_state'] == 0) {
                $member_state = "否";
            }

            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $v['user_id'])
                ->setCellValue('B' . $i, $v['user_name'])
                ->setCellValue('C' . $i, $v['true_name'])
                ->setCellValue('D' . $i, $v['tel'])
                ->setCellValue('E' . $i, $v['user_email'])
                ->setCellValue('F' . $i, $reg_time)
                ->setCellValue('G' . $i, $login_time)
                ->setCellValue('H' . $i, $v['member_login_ip'])
                ->setCellValue('I' . $i, $member_state);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('admin_log');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename = '会员日志' . '_' . date('Y-m-dHis');
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $aaa = $objWriter->save('php://output');
        exit;

    }


    /*账号同步——QQ*/
    public function member_step_qq()
    {
        $this->common_function->shop_admin_priv("QQ_connect");//权限
        $row = $this->db->select('value')->where('code', 'step_qq')->get('system_config')->row('value');
        $data = array('isuse' => '', 'appcode' => '', 'appid' => '', 'appkey' => '');
        if (!empty($row)) {
            $data = unserialize($row);
        }
        //print_r($data);exit;
        $this->smarty->assign('data', $data);
        $this->smarty->display('member_step_qq.html');
    }

    public function member_qq_edit()
    {
        $this->common_function->shop_admin_priv("QQ_connect");//权限
        $code = 'step_qq';
        $isuse = isset($_POST['qq_isuse']) ? $_POST['qq_isuse'] : 1;//是否开启
        $appcode = isset($_POST['qq_appcode']) ? trim($_POST['qq_appcode']) : '';//域名验证信息
        $appid = isset($_POST['qq_appid']) ? trim($_POST['qq_appid']) : false;//应用标实
        $appkey = isset($_POST['qq_appkey']) ? trim($_POST['qq_appkey']) : false;//应用密钥
        $data = array('isuse' => $isuse, 'appcode' => $appcode, 'appid' => $appid, 'appkey' => $appkey);
        $result = array('state' => false, 'msg' => '提交失败');
        //print_r($_POST);exit;
        if ($appid && $appkey) {
            $this->db->where('code', $code)->update('system_config', array('value' => serialize($data)));
            $result = array('state' => true, 'msg' => '提交成功');
        }
        echo json_encode($result);
        exit;
    }

    /*账号同步——sina*/
    public function member_step_sina()
    {
        $this->common_function->shop_admin_priv("sian_connect");//权限
        $row = $this->db->select('value')->where('code', 'step_sina')->get('system_config')->row('value');
        $data = array('isuse' => '', 'appcode' => '', 'appid' => '', 'appkey' => '');
        if (!empty($row)) {
            $data = unserialize($row);
        }
        //print_r($data);exit;
        $this->smarty->assign('data', $data);
        $this->smarty->display('member_step_sina.html');
    }

    public function member_sina_edit()
    {
        $this->common_function->shop_admin_priv("sian_connect");//权限
        $code = 'step_sina';
        $isuse = isset($_POST['qq_isuse']) ? $_POST['qq_isuse'] : 1;//是否开启
        $appcode = isset($_POST['qq_appcode']) ? trim($_POST['qq_appcode']) : '';//域名验证信息
        $appid = isset($_POST['qq_appid']) ? trim($_POST['qq_appid']) : false;//应用标实
        $appkey = isset($_POST['qq_appkey']) ? trim($_POST['qq_appkey']) : false;//应用密钥
        $data = array('isuse' => $isuse, 'appcode' => $appcode, 'appid' => $appid, 'appkey' => $appkey);
        $result = array('state' => false, 'msg' => '提交失败');
        //print_r($_POST);exit;
        if ($appid && $appkey) {
            $this->db->where('code', $code)->update('system_config', array('value' => serialize($data)));
            $result = array('state' => true, 'msg' => '提交成功');
        }
        echo json_encode($result);
        exit;
    }

    /*账号同步——手机短信*/
    public function member_step_phone()
    {
        $this->common_function->shop_admin_priv("phone_connect");//权限
        $row = $this->db->select('value')->where('code', 'step_phone')->get('system_config')->row('value');
        $data = array('register' => '', 'login' => '', 'password' => '');
        if (!empty($row)) {
            $data = unserialize($row);
        }
        //print_r($data);exit;
        $this->smarty->assign('data', $data);
        $this->smarty->display('member_step_phone.html');
    }

    public function member_phone_edit()
    {
        $this->common_function->shop_admin_priv("phone_connect");//权限
        $code = 'step_phone';
        $register = isset($_POST['sms_register']) ? $_POST['sms_register'] : 1;//是否开启注册
        $login = isset($_POST['sms_login']) ? $_POST['sms_login'] : 1;//是否开启登录
        $password = isset($_POST['sms_password']) ? $_POST['sms_password'] : 1;//是否开启找回密码
        $data = array('register' => $register, 'login' => $login, 'password' => $password);
        $result = array('state' => false, 'msg' => '提交失败');
        //print_r($_POST);exit;
        $this->db->where('code', $code)->update('system_config', array('value' => serialize($data)));
        $result = array('state' => true, 'msg' => '提交成功');
        echo json_encode($result);
        exit;
    }

    /*账号同步——微信登录*/
    public function member_step_weixin()
    {
        $this->common_function->shop_admin_priv("weixin_connect");//权限
        $row = $this->db->select('value')->where('code', 'step_weixin')->get('system_config')->row('value');
        $data = array('isuse' => '', 'appid' => '', 'appkey' => '');
        if (!empty($row)) {
            $data = unserialize($row);
        }
        //print_r($data);exit;
        $this->smarty->assign('data', $data);
        $this->smarty->display('member_step_weixin.html');
    }

    public function member_weixin_edit()
    {
        $this->common_function->shop_admin_priv("weixin_connect");//权限
        $code = 'step_weixin';
        $isuse = isset($_POST['weixin_isuse']) ? $_POST['weixin_isuse'] : 1;//是否开启
        $appid = isset($_POST['weixin_appid']) ? trim($_POST['weixin_appid']) : '';//应用标实
        $appkey = isset($_POST['weixin_secret']) ? trim($_POST['weixin_secret']) : false;//应用密钥
        $data = array('isuse' => $isuse, 'appid' => $appid, 'appkey' => $appkey);
        $result = array('state' => false, 'msg' => '提交失败');
        //print_r($_POST);exit;
        if ($appid && $appkey) {
            $this->db->where('code', $code)->update('system_config', array('value' => serialize($data)));
            $result = array('state' => true, 'msg' => '提交成功');
        }
        echo json_encode($result);
        exit;
    }


    /*会员协议*/
    public function website_member_agreement()
    {
        $this->common_function->shop_admin_priv("member_protocol");//权限
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'doc_id';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        $query = isset($_POST['query']) ? $_POST['query'] : false;    //搜索查询的条件11
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;    //搜索查询的类别admin

        if (isset($_GET['op']) && $_GET['op'] == 'get_xml') {

            $this->db->select('*');
            $this->db->from('shop_document');
            $this->db->order_by($sortname, $sortorder);
            $rows = $this->db->get()->result_array();
            if ($qtype && $query) {
                $query = trim($query);
                foreach ($rows as $key => $row) {
                    if (strpos($row[$qtype], $query) === false) {
                        unset($rows[$key]);
                    }
                }
            }
            $total = count($rows);
            $rows = array_slice($rows, ($page - 1) * $rp, $rp);
            header("Content-type: text/xml");
            $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
            $xml .= "<rows>";
            $xml .= "<page>$page</page>";
            $xml .= "<total>$total</total>";
            foreach ($rows AS $key => $row) {
                $xml .= "<row id='" . $row['doc_id'] . "'>";
                $xml .= "<cell><![CDATA[<a class='btn blue' onclick='fg_bj(" . $row['doc_id'] . ")'><i class='fa fa-pencil-square-o'></i></i>编辑</a>]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['doc_title'] . "]]></cell>";
                $xml .= "<cell><![CDATA[" . date('Y-m-d H:i:s', $row['doc_time']) . "]]></cell>";
                $xml .= "</row>";
            }
            $xml .= "</rows>";
            echo $xml;
            exit;
        }
        $this->smarty->display('website_member_agreement.html');
    }

    /*会员协议——编辑*/
    public function website_member_agreement_edit($id = "")
    {
        $this->common_function->shop_admin_priv("member_protocol");//权限
        if ($this->input->is_ajax_request()) {
            unset($_POST['form_submit']);
            $article_id = isset($_GET['number']) ? $_GET['number'] : '';

            //编辑更新文章
            $data = array(
                'doc_title' => $_POST['doc_title'],
                'doc_content' => $_POST['content'],
                'doc_time' => time()
            );
            if ($article_id != "") {
                $article_edit = $this->db->update("shop_document", $data, array('doc_id' => $article_id));
                if ($article_edit) {
                    echo json_encode("success");
                } else {
                    echo json_encode("false");
                }
            } else {
                echo json_encode("false");
            }
            exit();
        }
        $document = $this->Website_model->get_document_info($id);
        $this->smarty->assign("document", $document);
        $this->smarty->display('website_member_agreement_edit.html');
    }

    /*会员导出*/
    public function code_excel()
    {
        $this->common_function->shop_admin_priv("waybill");//权限
        $ids = isset($_GET['id']) ? explode(',',$_GET['id']) : false;
        $this->db->select('cs.true_name,cs.user_name,cs.wx_nickname,cs.tel,cs.user_email,lc.store_name,kc.spg_name,cs.order_num');
        $this->db->select('gc.area_name as a');
        $this->db->select('hc.area_name as b');
        $this->db->select('jc.area_name as c');

        $this->db->from('user as cs');
        $this->db->join('area as gc', 'gc.area_id=cs.province_id', 'left');
        $this->db->join('area as hc', 'hc.area_id=cs.city_id', 'left');
        $this->db->join('area as jc', 'jc.area_id=cs.area_id', 'left');
        $this->db->join('store_shopping_guide as kc', 'kc.spg_id=cs.ecshopping_guide_id', 'left');
        $this->db->join('store as lc','lc.store_id=cs.ecstore_id','left');
        $this->db->where_in("user_id", $ids);
        $this->db->order_by('user_id');
        $rows = $this->db->get()->result_array();

        $time = time();
        $date = date('YmdHis', $time);
        $filename = $date . '码段列表';
        $filenames = $date . 'code_segment' . '.csv';
        $file = ROOTPATH . 'data/excel_download/' . $filenames;
        $title = array(chr(0xef) . chr(0xbb) . chr(0xbf) . '姓名', '用户名', '微信名', '电话', '邮箱', '所属门店', '所属导购', '消费订单', '所在省', '所在市', '所在区');
        file_put_contents($file, implode(',', $title) . PHP_EOL, FILE_APPEND);
        for ($i = 0; $i < count($rows); $i++) {
            file_put_contents($file, implode(',', $rows[$i]) . PHP_EOL, FILE_APPEND);
        }

        $download = 'http://' . $_SERVER ['HTTP_HOST'] . str_replace($_SERVER ['DOCUMENT_ROOT'], '', str_replace('', '', str_replace('\\', '/', ROOTPATH))) . 'data/excel_download/' . $filenames;
        header("location:" . $download);
        exit;
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator('erp')
            ->setLastModifiedBy('erp')
            ->setTitle('Office 2007 XLSX Document')
            ->setSubject('Office 2007 XLSX Document')
            ->setDescription('Document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Result file');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '姓名')
            ->setCellValue('B1', '用户名')
            ->setCellValue('C1', '微信名')
            ->setCellValue('D1', '电话')
            ->setCellValue('E1', '邮箱')
            ->setCellValue('F1', '所属门店')
            ->setCellValue('G1', '所属导购')
            ->setCellValue('H1', '消费订单')
            ->setCellValue('I1', '所在省')
            ->setCellValue('J1', '所在市')
            ->setCellValue('K1', '所在区');

        $i = 2;
        foreach ($rows as $k => $row) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $row['true_name'])
                ->setCellValue('B' . $i, $row['user_name'])
                ->setCellValue('C' . $i, $row['wx_nickname'])
                ->setCellValue('D' . $i, $row['tel'])
                ->setCellValue('E' . $i, $row['user_email'])
                ->setCellValue('F' . $i, $row['lc.store_name'])
                ->setCellValue('G' . $i, $row['kc.spg_name'])
                ->setCellValue('H' . $i, $row['order_num'])
                ->setCellValue('I' . $i, $row['a'])
                ->setCellValue('J' . $i, $row['b'])
                ->setCellValue('K' . $i, $row['c']);
            unset($rows[$k]);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('code_segment');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename = urlencode('会员列表') . '_' . date('YmdHis');

        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        //print_r($objWriter);die;
        $objWriter->save('php://output');
        exit;

    }

    //yu
    /**************会员短信。邮件。微信。【营销】9.26 *****************///member_management
    function member_marketing(){
        $role = isset($_GET['role']) && !empty($_GET['role']) ? $_GET['role'] : '';//权限
        if ($role == 'w') {//微商城
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'd') {//电商店
            $this->common_function->shop_admin_priv("store_management");
        } elseif ($role == 'g') {//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        } else {//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role', $role);
        //获取授权品牌
        $mon_start = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m") - 1, date("d"), date("Y")));
        $mon_start_3 = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m") - 3, date("d"), date("Y")));

        $week_start = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m"), date("d") - 7, date("Y")));

        $tom_start = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")));
        $tom_end = date('Y-m-d H:i:s', strtotime($tom_start) + 86399);

        $now_start = date('Y-m-d H:i:s', strtotime(date('Y-m-d', time())));
        $now_end = date('Y-m-d H:i:s', strtotime($now_start) + 86399);

        $this->smarty->assign('mon_start', $mon_start);
        $this->smarty->assign('week_start', $week_start);
        $this->smarty->assign('tom_start', $tom_start);
        $this->smarty->assign('tom_end', $tom_end);
        $this->smarty->assign('now_start', $now_start);
        $this->smarty->assign('now_end', $now_end);
        $this->smarty->assign('mon_start_3', $mon_start_3);


        $this->db->select('store_id,store_name');
        $this->db->from('store');
        $stores = $this->db->get()->result_array();
        $this->smarty->assign('stores', $stores);
        $this->db->select('spg_id,spg_name');
        $this->db->from('store_shopping_guide');
        $guide = $this->db->get()->result_array();
        $this->smarty->assign('guide', $guide);

        $this->smarty->display('member_marketing.html');

    }
    //会员发送列表

//主页，起始页面
    public function member_send_list()
    {
        //var_dump($_POST);
        $role = isset($_GET['role']) && !empty($_GET['role']) ? $_GET['role'] : '';//权限
        if ($role == 'w') {//微商城
            $this->common_function->shop_admin_priv("store_management");
            $store = $this->db->select('store_id')->where('ous_type', 1)->get('store')->result_array();
            if ($store) {
                foreach ($store as $v) {
                    $stores[] = $v['store_id'];
                }
                $store_str = join(',', $stores);
                $where = "ecstore_id IN ({$store_str})";
            } else {
                $where = "ecstore_id ='w'";
            }
        } elseif ($role == 'd') {//电商店
            $this->common_function->shop_admin_priv("store_management");
            $store = $this->db->select('store_id')->where('ous_type', 2)->get('store')->result_array();
            if ($store) {
                foreach ($store as $v) {
                    $stores[] = $v['store_id'];
                }
                $store_str = join(',', $stores);
                $where = "ecstore_id IN ({$store_str})";
            } else {
                $where = "ecstore_id ='d'";
            }
        } elseif ($role == 'g') {//供应仓库
            $this->common_function->shop_admin_priv("store_management");
            $store = $this->db->select('store_id')->where('ous_type', 3)->get('store')->result_array();
            if ($store) {
                foreach ($store as $v) {
                    $stores[] = $v['store_id'];
                }
                $store_str = join(',', $stores);
                $where = "ecstore_id IN ({$store_str})";
            } else {
                $where = "ecstore_id ='g'";
            }
        } else {//平台
            $this->common_function->shop_admin_priv("store_management");
            $where = "1";
        }
        $this->smarty->assign('role', $role);
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? $_POST['query'] : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;

        $start_time = isset($_GET['start_time']) ? trim($_GET['start_time']) : '';
        $end_time = isset($_GET['end_time']) ? trim($_GET['end_time']) : '';
        $time = isset($_GET['time']) ? trim($_GET['time']) : '';

        $monney = isset($_GET['monney']) ? trim($_GET['monney']) : '';
        $start_monney = isset($_GET['start_monney']) ? trim($_GET['start_monney']) : '';
        $end_monney = isset($_GET['end_monney']) ? trim($_GET['end_monney']) : '';

//      $wx_num = isset($_GET['wx_num'])?trim($_GET['wx_num']):'';
        $num = isset($_GET['num']) ? trim($_GET['num']) : '';
        $start_num = isset($_GET['start_num']) ? trim($_GET['start_num']) : '';
        $end_num = isset($_GET['end_num']) ? trim($_GET['end_num']) : '';

        $understore = isset($_GET['understore']) ? trim($_GET['understore']) : '';
        $underguide = isset($_GET['underguide']) ? trim($_GET['underguide']) : '';
        //$card = isset($_GET['card'])?trim($_GET['card']):'';
        //$card_num = isset($_GET['card_num'])?trim($_GET['card_num']):'';
        $true_name = isset($_GET['true_name']) ? trim($_GET['true_name']) : '';
        $wx_nike = isset($_GET['wx_nike']) ? trim($_GET['wx_nike']) : '';
        $mobile = isset($_GET['mobile']) ? trim($_GET['mobile']) : '';
//追加
        $Average_price = isset($_GET['Average_price']) ? trim($_GET['Average_price']) : '';//客单价
        $active_start_time = isset($_GET['active_start_time']) ? trim($_GET['active_start_time']) : '';//活跃会员
        $active_end_time = isset($_GET['active_end_time']) ? trim($_GET['active_end_time']) : '';

        if ($query && $qtype) {
            $where .= " and {$qtype} = {$query}";
        }

        if ($time != 'all') {
            if ($start_time != "" && $end_time != "") {
                $where .= " and reg_time >=" . strtotime($start_time) . " and reg_time <=" . strtotime($end_time) . " ";
            }

            if ($start_time != "" && $end_time == "") {
                $where .= " and reg_time >=" . strtotime($start_time) . " ";
            }

        }

        if ($monney != 'all') {
            if ($start_monney != "" && $end_monney != "") {
                $where .= " and order_money_num >'{$start_monney}' and order_money_num <='{$end_monney}' ";
            }

            if ($start_monney != "" && $end_monney == "") {
                $where .= " and order_money_num >='{$start_monney}' ";
            }
        }


        if ($num != 'all') {
            if ($start_num != "" && $end_num != "") {
                $where .= " and order_num >'{$start_num}' and order_num <='{$end_num}' ";
            }

            if ($start_num != "" && $end_num == "") {
                $where .= " and order_num >'{$start_num}'  ";
            }
        }
//         if($wx_num){
//             $where .= " and wx_openid like '%{$wx_num}%' ";
//         }
        if ($understore) {
            $where .= " and ecstore_id='{$understore}' ";
        }
        if ($underguide) {
            $where .= " and ecshopping_guide_id='{$underguide}' ";
        }
//         if($card){
//             $where .= " and order_num <='{$end_num}' ";
//         }
//         if($card_num){
//             $where .= " and order_num <='{$end_num}' ";
//         }
        if ($true_name) {
            $where .= " and true_name like '%{$true_name}%' ";
        }
        if ($wx_nike) {
            $where .= " and wx_nickname like '%{$wx_nike}%' ";
        }
        if ($mobile) {
            $where .= " and tel like '%{$mobile}%' ";
        }
 //追加
        if ($Average_price) {
            $where .= " and monney/order_num>$Average_price ";
        }



        if ($sortname && $sortorder) {
            $where .= " order by {$sortname} {$sortorder}";
        }
        $total = $this->common_function->total('user', $where);
        //test
        $sql=$this->db->last_query();
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('user', $where);

        $grades = $this->db->get('user_mldefault')->result_array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach ($rows AS $row) {
            $province = $this->common_function->get_area_name($row['province_id']);
            $city = $this->common_function->get_area_name($row['city_id']);
            $area = $this->common_function->get_area_name($row['area_id']);
            $this->db->select('uig_id,user_id,integral_num');
            $this->db->from('user_integral');
            $this->db->where("user_id", $row['user_id']);
            $this->db->order_by('uig_id', 'ASC');
            $integral = $this->db->get()->result_array();
            if (count($integral) >= 2) {
                $integration = 0;
                foreach ($integral as $key => $val) {
                    $integration += $val['integral_num'];
                }
            } elseif (count($integral) == 1) {
                $integration = $integral[0]['integral_num'];
            } else {
                $integration = 0;
            }
            $row['integral'] = $integration;
            $this->db->select('uw.ubofw_id,uw.wx_action,uw.wx_action_time,uw.wx_action_value,sg.spg_name,sg.spg_id');
            $this->db->from('user_bind_or_follow_wx as uw');
            $this->db->join('store_shopping_guide as sg', 'sg.spg_id=uw.wx_action_value', 'left');
            $this->db->where("uw.user_id", $row['user_id']);
            $this->db->where("uw.wx_action", '3');
            $this->db->order_by('uw.wx_action_time', 'DESC');
            $ecshopping_guide = $this->db->get()->row_array();
            if ($ecshopping_guide) {
                $row['ecshopping_guide_id'] = $ecshopping_guide['spg_name'];
            } else {
                $row['ecshopping_guide_id'] = "无";
            }
            if (empty($row['true_name'])) {
                $row['true_name'] = '--';
            }

            $xml .= "<row id='" . $row['user_id'] . "'>";
            $xml .= "<cell><![CDATA[<a class='btn red' onclick=fg_delete({$row['user_id']},'{$row['user_name']}')>
            <i class='fa fa-trash-o'></i>删除</a>
            <a class='btn green' href='member_edit/{$row['user_id']}'>编辑</a>
            ]]></cell>";
            $row['head_portrait'] = $row['head_portrait'] ? $row['head_portrait'] : base_url() . 'application/admin/views/images/default_user_portrait.gif';
            $xml .= "<cell><![CDATA[<img src=\"" . $row['head_portrait'] . '" class="user-avatar"' .
                ' onerror="this.src=\'' . TEMPLE . 'images/default_user_portrait.gif\'" style="border-radius:50%;height:80%;"' .
                ' data-geo="<img src=\'' . $row['head_portrait'] . '\' width=300px >">' .
                $row['true_name'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['tel'] . "]]></cell>";
            $sex = $row['member_sex'] == 0 ? '保密' : ($row['member_sex'] == 1 ? '男' : '女');
            $xml .= "<cell><![CDATA[" . $sex . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['ecshopping_guide_id'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['order_num'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['order_money_num'] . "]]></cell>";
            /* $xml .= "<cell><![CDATA[".$row['is_follow']."]]></cell>"; */
            $xml .= "<cell><![CDATA[" . $row['integral'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['balance'] . "]]></cell>";
            /*  $xml .= "<cell><![CDATA[".$row['rechargeable_card_num']."]]></cell>"; */
            $row['reg_time'] = !empty($row['reg_time']) ? date('Y/m/d H:i:s', $row['reg_time']) : '--';
            $xml .= "<cell><![CDATA[" . $row['reg_time'] . "]]></cell>";
            $xml .= "<cell><![CDATA[<span title='" . $province . "'>" . $province . "</span>]]></cell>";
            $xml .= "<cell><![CDATA[<span title='" . $city . "'>" . $city . "</span>]]></cell>";
            $xml .= "<cell><![CDATA[<span title='" . $area . "'>" . $area . "</span>]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }
//end




    /***********发送会员消息的方法(将要发送对象的数据消息传入并且跳转到HTML的模板) *************/
    function send_message(){
        //得到要发送会员对象的 id
        $ids = isset($_GET['id']) ? explode(',',$_GET['id']) : false;
        $search=$_GET;

        $type=$_GET['type'];//发送的消息类型。短信，邮件，微信。
        unset($search['id']);
        unset($search['type']);

//查询会员，微信，电话，邮箱；
        $this->db->select('user_id,tel,user_email,wx_openid,true_name,wx_nickname');
        $this->db->where_in("user_id", $ids);
        $member=$this->db->get('user')->result_array();


        // 得到搜索条件
        $search=array_filter($search);

        $keys=array_keys($search);

        $search_name=array(
            'start_time'=>'成为会员的时间',
            'start_monney'=>'消费总金额',
            'understore'=>'门店',
            'underguide'=>'导购',
            'mobile'=>'电话',
            'wx_nike'=>'昵称',
            'true_name'=>'姓名',

            'buy_this'=>'是否购买过某一件商品商品',
            'tarde_start_time'=>'最近进行过交易',
            'active_start_time'=>'会员活跃程度',
            'active_start_time'=>'会员活跃程度',



        );
        foreach($keys as $key){

            $searched[$key]= $search_name[ $key];


        }


//邮件模板

        $email_templates= $this->db->select('*')->get('mail_templates')->result_array();


        /*    $row = $this->web_model->get_tp(1, 'mail');
            $row['template_content'] = str_replace('>','&gt;',str_replace('<', '&lt;', $row['template_content']));
            $this->smarty->assign('tpl_list', $row);*/
        //  $this->smarty->display('mail_tpl_edit.html');

//短信模板
        $sms_templates= $this->db->select('*')->where('template_cate_id =','1')->get('sms_templates')->result_array();
//var_dump($sms_templates);
  //        exit;


        //传送参数。

        foreach($member as $key=>$value){
            $email[]=$member[$key]['user_email'];
            $tel[]=$member[$key]['tel'];
            $wx_openid[]=$member[$key]['wx_openid'];
            $true_name[]=$member[$key]['true_name'];
            $wx_nickname[]=$member[$key]['wx_nickname'];
        }
        $email=array_filter($email);
        $tel=array_filter($tel);
        $wx_openid=array_filter($wx_openid);
        $true_name=array_filter($true_name);
        $wx_nickname=array_filter($wx_nickname);

        $email=json_encode($email);
        $tel=json_encode($tel);
        $wx_openid=json_encode($wx_openid);
        $true_name=json_encode($true_name);
        $wx_nickname=json_encode($wx_nickname);





        $this->smarty->assign('email',$email);
        $this->smarty->assign('tel',$tel);
        $this->smarty->assign('wx_openid',$wx_openid);
        $this->smarty->assign('true_name',$true_name);
        $this->smarty->assign('wx_nickname',$wx_nickname);


        $member=json_encode($member);
        $this->smarty->assign('member',$member);



        $this->smarty->assign('type',$type);
        $this->smarty->assign('searched',$searched);


        $this->smarty->assign('sms_templates',$sms_templates);
        $this->smarty->assign('email_templates',$email_templates);
        /*echo $wx_openid;
            exit;*/
        $this->smarty->display('member_marketing_send.html');
        exit;

    }
   //发送会员消息,点击提交后发送群消息。
    function start_send(){
        if($_POST){

            if($_GET['type']=='email')  {

                //  如果是邮件
                $str= urldecode($_POST['message']);
                $message=explode('&',$str);


                $title_arr= explode('=',$message['2']);
                $title=$title_arr['1'];

                $content_arr=explode('=', $message['3']);;
                $content=$content_arr['1'];

                $member=$_POST['member'];
                foreach($member as $key=>$value){
                    $email[]=$member[$key]['user_email'];
                    $user_id[]=$member[$key]['user_id'];

                }

                var_dump($content);
                exit;
                foreach($email as $email) {

                    $this->send_email($title,$email,$content);
                }


                /*    //    $email=array_filter($email);
                        $email= implode(',',$member);*/

            }elseif($_GET['type']=='short_message'){
                //如果是短信

                $member=$_POST['member'];
                $message=$_POST['message'];
                $message=$send['message']= str_replace('【变量】',NULL,$message);//删除未更改的变量。
                foreach($member as $key=>$value){    //组装发送的消息。

                    if(!empty($member[$key]['tel'])){
                        $true_name=$member[$key]['true_name'];
                        $wx_nickname=$member[$key]['wx_nickname'];
                        if(empty($true_name)){
                            $send['message']= str_replace('{$姓名}',NULL,$message);
                        }else{
                            $send['message']= str_replace('{$姓名}',$true_name,$message);
                        }

                        if(empty($wx_nickname)){

                            $send['message']= str_replace('{$昵称}',NULL,$send['message']);
                        }else{

                            $send['message']= str_replace('{$昵称}',$wx_nickname,$send['message']);
                        }

                        $send['tel']=$member[$key]['tel'];
                        $send_arr[]=$send;}
                }
                if(!isset($send_arr)){
                    return '发送号码为空';
                    exit;
                }else{
                    $send_arr=array_filter($send_arr);
                }



//循环发送

                foreach($send_arr as $send){


                    $res= $this->common_function->IHhuiYiSmsMarking($send['tel'],$send['message'].'退订请回复T');

//插入日志
                    $sms_log_data['sms_template_id']=$_POST['sms_template_id'];
                    $sms_log_data['send_sms_time']=time();
                    $sms_log_data['send_user_id']=$_SESSION['shop_admin_id'];
                    $sms_log_data['send_user_ip']=$_SERVER['REMOTE_ADDR'];
                    $sms_log_data['recevice_mobile']=$send['tel'];
                    $sms_log_data['recevice_content']=$send['message'];
                    $sms_log_data['is_success']=$res['satus'];
                    $sms_log_data['back_message']=$res['msg'];

                    $sms_log_data['task_id']=$res['smsid'];//返回任务id
                    $sms_log_data['received_msg']=0;//回执状态说明
                    $sms_log_data['login_user_type']=1;//登录(发送)用户类型 1：为admin用户（后台）
                    $sms_log_data['store_id']='0';//后台admin登录店铺id为空（0）；

//var_dump($res);
//var_dump($sms_log_data);
                    $this->db->insert('sms_log',$sms_log_data);

                }

                exit;


            }else{
//yu微信
                //    var_dump($_FILES);
                //    var_dump($_POST);
                $ACCESS_TOKEN=$this->common_function->get_system_value('weixin_auth_token');

                $arr=$_POST;
                $pic=$_FILES['pic'];
                $wx_openid=$_POST['wx_openid'];

//得到要发送的微信openID
                $wx_openid=ltrim($wx_openid,'[');
                $wx_openid=rtrim($wx_openid,']');
                $wx_openid=explode(',',$wx_openid);
                foreach($wx_openid as $k=>$value){
                    $value=ltrim($value,'"');
                    $value=rtrim($value,'"');
                    $wx_openid[$k]=$value;

                }




                $arr['content']=$arr['weixin_content'];

                unset($arr['weixin_content']);
                unset($arr['wx_openid']);
//封面图片先存入微信后台；


                $dir='application/admin/views/images/member/weixin_pic/';
                $config['upload_path'] =ROOTPATH.$dir;
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '500';
                $config['max_width']  = '1200';
                $config['max_height']  = '1200';
                $this->load->library('upload', $config);
                $this->upload->do_upload('pic');
                $res_pic= $this->upload->data();
                $img_path=ROOTPATH.$dir.$res_pic['file_name'];//生成封面图片保存地址

                $img_path=str_replace('\\','/',$img_path);//图片真实地址


                // $img_path = "C:/Users/yu/Desktop/123.jpg";
                $cfile = curl_file_create($img_path);   //use the CURLFile Class 替换@的使用方法。
                $data = array(
                    'media'=>$cfile,
                );


                $url="http://api.weixin.qq.com/cgi-bin/material/add_material?access_token=$ACCESS_TOKEN&type=thumb";
                $res=$this->weixin_message_curl($data,$url);
                $thumb_media_id= $res['media_id'];//得到返回封面图片的media_id
                /*        var_dump($data);
                        var_dump($thumb_media_id);
                        exit;*/

                /*       $res= "{ ["media_id"]=> string(43) "PZz6JntMyoA6Hu94eSbr8fx_pRbjTLk2EBypKctuH7s"
                       ["url"]=> string(133) "http://mmbiz.qpic.cn/mmbiz_jpg/EkBr1MeIQPG9l5txMR9T40KwP1wuRIQO6TtSCFjKft2F6fkEvnJe4MPCh
                       VdJiaVMjJNo6NnibTpMQr6yE10eCA3w/0?wx_fmt=jpeg" } ";
                       var_dump($res);*/
//
                // $media_id="PZz6JntMyoA6Hu94eSbr8cLhTdUoQJMTD-5w560UK3c";

                $arr['show_cover_pic']='0';
                $arr['thumb_media_id']=$thumb_media_id;


                $jsonArr=array("articles"=>array($arr));


                $message=json_encode($jsonArr,JSON_UNESCAPED_UNICODE);
                /*   var_dump($jsonArr);
                   echo"<hr/>";
                   var_dump($message);
                   exit;*/
//生成文章
                $url="http://api.weixin.qq.com/cgi-bin/material/add_news?access_token=$ACCESS_TOKEN";
                $result=$this->weixin_message_curl($message,$url);
                $article_media_id=$result['media_id'];


//如果要进行测试查看新增素材效果；预览接口 预览后要删除封面图片，免得提交重复，图片太多。

                $send=array();
                $send['touser']="oAPx30lEtJaErDbO4vb3SSQoRWBw";
                $send['mpnews']=array('media_id'=>"$article_media_id");
                $send['msgtype']="mpnews";
                $send['send_ignore_reprint']=0;
                // $send=array($send);
                $send=json_encode($send);
                $url="http://api.weixin.qq.com/cgi-bin/message/mass/preview?access_token=$ACCESS_TOKEN";
                $result=$this->weixin_message_curl($send,$url);
                var_dump($result);
                exit;
//删除
                $delete['media_id']=$article_media_id;
                $delete_article=json_encode($delete);

                unset($delete);
                $delete['thumb_media_id']= $thumb_media_id;
                $delete_face_pic=json_encode($delete);

                $url="http://api.weixin.qq.com/cgi-bin/material/del_material?access_token=$ACCESS_TOKEN";

                set_time_limit(0);
                sleep(60);

//删除文章
                $result=$this->weixin_message_curl($delete_article,$url);
                var_dump($result['errcode']);
//删除封面图
                $result=$this->weixin_message_curl($delete_face_pic,$url);
                var_dump($result['errcode']);

                set_time_limit(30);
                exit;





                //如果要保存模板
                $arr['face_pic']=$img_path;
                $arr['media_id']=$article_media_id;
                unset($arr['show_cover_pic']);
                $this->db->insert('member_weixin_template',$arr);




//发送消息

                $send=array();
                $send['touser']=$wx_openid;
                $send['mpnews']=array('media_id'=>"$article_media_id");
                $send['msgtype']="mpnews";
                $send['send_ignore_reprint']=0;
                $send=json_encode($send);
                $url="http://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=$ACCESS_TOKEN";
                $result=$this->weixin_message_curl($send,$url);
                var_dump($result);
                exit;




            }




            $result = json_encode(array('state' => false, 'msg' => '发送成功'));


            exit;


        }
    }




//ajax获取模板内容


    function  get_input_message(){

        if($_GET['type']=='email'){
//邮件
            $mai_content= $this->db->select('template_content,template_subject')->where('template_id =',$_POST['id'])->get('mail_templates')->result_array();

            $arr=array(
                'template_content'=>$content= $mai_content['0']['template_content'],
                'template_subject'=>$content= $mai_content['0']['template_subject'],
            );

            echo json_encode($arr);die;

        }else{
            //短信
            $content= $this->db->select('template_content')->where('template_id =',$_POST['id'])->get('sms_templates')->result_array();
            $content= $content['0']['template_content'];
            echo json_encode($content);die;
            exit;
        }

    }


    /***********发送邮件方法---**********/

    function send_email($title,$tomail,$content){


        $config['useragent'] = 'erp';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = $this->Web_model->get_system_value('smtp_host');
        $config['smtp_port'] = $this->Web_model->get_system_value('smtp_port');
        $config['smtp_user'] = $this->Web_model->get_system_value('smtp_user');
        $config['smtp_pass'] = $this->Web_model->get_system_value('smtp_pwd');
        $this->email->initialize($config);

        $this->email->from($this->Web_model->get_system_value('smtp_mail'));

        //发送邮件对象
        $this->email->to($tomail);

//标题与内容
        $this->email->subject($title);
        $this->email->message($content);
        $res= $this->email->send();
        var_dump($res);
        /*    if ($res)
            {

                $data = array(
                    'send_mail_time' => time(),
                    'mail_template_id' => $template_id,
                    'send_user_id' => $_SESSION['shop_admin_id'],
                    'send_user_ip' => real_ip(),
                    'send_user_type' => 1,
                    'recevice_address' => $tomail,
                    'is_success' => 1,
                    'recevice_user_id' => $user_id
                );

                $this->db->insert('mail_log', $data);
                return json_encode('发送成功');
            }else
            {
                $data = array(
                    'send_mail_time' => time(),
                    'mail_template_id' => $template_id,
                    'send_user_id' => $_SESSION['shop_admin_id'],
                    'send_user_ip' => real_ip(),
                    'send_user_type' => 1,
                    'recevice_address' => $tomail,
                    'is_success' => 0,
                    'recevice_user_id' => $user_id
                );

                $this->db->insert('mail_log', $data);
            }*/


    }
    /***********发送消息前进行的手动测试**********/
    function send_message_test(){
        if($_POST){

            if($_GET['type']=='short_message'){

                $res= $this->common_function->IHhuiYiSmsMarking($_POST['tel'],$_POST['message'].'退订请回复T');
            //    $res['satus']='1';
                  if($res['satus']=='1'){
//插入日志
                      $sms_log_data['sms_template_id']=$_POST['sms_template_id'];
                      $sms_log_data['send_sms_time']=time();
                      $sms_log_data['send_user_id']=$_SESSION['shop_admin_id'];
                      $sms_log_data['send_user_ip']=$_SERVER['REMOTE_ADDR'];
                      $sms_log_data['recevice_mobile']=$_POST['tel'];
                      $sms_log_data['recevice_content']=$_POST['message'].'退订请回复T';
                      $sms_log_data['is_success']=$res['satus'];
                      $sms_log_data['back_message']=$res['msg'];
                      $sms_log_data['login_user_type']='1';//登录用户类型
                      $sms_log_data['task_id']=$res['smsid'];//返回任务id
                      $sms_log_data['received_msg']=0;//回执状态说明
                     // $sms_log_data['login_user_type']=1;//登录(发送)用户类型 1：为admin用户（后台）
                      $sms_log_data['store_id']='0';//后台admin登录店铺id为空（0）；

//var_dump($res);
//var_dump($sms_log_data);
                      $this->common_function->insertSmsLog($sms_log_data);

                    echo'1';
                      exit;
                  }


                              }

                                     }

exit;
    }


    /***********微信模块的curl方法**********/



    function weixin_message_curl($data,$url){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = object_array(json_decode($result,true));
        return $result;

    }

    /**************************互亿无线回执接收方法*************************、
     */
function  ihuyi_receive (){


    if($_POST) {
        $this->db->insert('system_config',array('code'=>"huiyi_test".$_POST['mobilephone']));

         if($_POST['code']=='2'){
             $this->db->where(array('task_id'=>$_POST['task_id'],'recevice_mobile'=>$_POST['mobilephone']))
                 ->update('sms_log',array('received_state'=>'2','received_msg'=>$_POST['msg']));//成功

             echo "success";
         }else{
             $this->db->where(array('task_id'=>$_POST['task_id'],'recevice_mobile'=>$_POST['mobilephone']))
                 ->update('sms_log',array('received_state'=>'1','received_msg'=>$_POST['msg']));
             echo "error";
         }




    }
}



    /**************************会员合并*************************、
     */

    function member_merge(/*$tel,$user_id*/){
        $tel='13281232655';
        $user_id='5406';
//将微信端电话验证注册成为正式会员时 填入的tel进行查询
        $search = array('tel =' => $tel, 'wx_openid =' => NULL);
        $arr= $this->db->select('*')->where($search)->get('user')->result_array();
        $result=array();
        $order_num=0;
        $order_money_num=0;

// 得到会员（订单来源）需要合并的值
        foreach($arr as $value){


            foreach($value as $key=>$v){

                if($v!='0'&&$v!=NUll){

                    $result[$key]=$v;

                }

            }




            $order_num +=$value['order_num'];
            $order_money_num+=$value['order_money_num'];


            $order_user_id[]=$value['user_id'];
        }

        $result['order_num']=$order_num;
        $result['order_money_num']=$order_money_num;



        /*     echo"<pre>";

             var_dump($order_user_id);

             echo"</pre>";*/


//微信会员

        $arr= $this->db->select('user_id,wx_nickname,wx_openid,true_name,user_name,user_email,head_portrait,province_id,city_id,area_id,pwd,pay_pwd,balance,integral,
        integral_total,rechargeable_card_num,ecshopping_guide_id,ecstore_id,last_ecstore_id,ecgustore_id,is_follow,
        wx_create_time,wx_ceateymd,wx_token,wx_token_expire_in,member_sex,refresh_token,qq,birthday')->where('user_id =',$user_id)->get('user')->row_array();

        foreach($arr as $key=>$value){
            if($value=='0'||$value=NULL){
                unset($arr[$key]);
            }
        }
//没填手机号不能购物，不需要累加订单量

        $arr['order_num']?$arr['order_num']:$arr['order_num']='0';
        $arr['order_money_num']?$arr['order_money_num']:$arr['order_money_num']='0';
//与微信会员数据合并
        $arr['order_num']=$result['order_num']+$arr['order_num'];
        $arr['order_money_num']= $result['order_money_num']+$arr['order_money_num'];


        $data=array_merge($result,$arr);
        unset($data['user_id']);

        $this->db->update("user", $data, array('user_id' =>$user_id));
        $affected_rows =$this->db->affected_rows();
        var_dump($affected_rows);
//如果返回成功 将通过订单添加的会员的is_status字段设为0（不启用）；


        if($affected_rows){

            $status=array(
                'is_status'=>'0'
            );

            $this->db->where_in('user_id',$order_user_id)->update("user", $status);

        }

        exit;

//user表改完之后，需要将订单通过收货人添加会员的 user_id 改为新的user_id;

//订单表
        foreach($order_user_id as $user_id){

            $this->db->query("update jk_shop_order set buyer_id=$user_id where buyer_id=$user_id and order_type='3'");

            $order_sn=$this->db->select('order_sn')->get('shop_order')->result_array();

        }
//退款表，以免buyer_id 混淆 需要通过订单号来区分  $order_sn;


        foreach($order_user_id as $user_id){

            $this->db->where('buyer_id =',$user_id)->where_in('order_sn',$order_sn)->update();
            //   $this->db->query("update jk_shop_order_refund_return set buyer_id=$user_id where buyer_id=$user_id and order_sn in($order_sn)");

        }



    }













}


