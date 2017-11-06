<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller
{

    /**
     * Index Page for this controller.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('business_model');
    }

    /**
     * 商品订单2
     */
    public function business_order_1()
    {
        $this->common_function->shop_admin_priv("order_manage");//权限
        $role = (isset($_GET['role']) && !empty($_GET['role'])) ? $_GET['role'] : 'p';
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $ebusiness_stores = array();
        if ($role && $role == 'w') {       //微商城
            $stores = $this->db->select('store_id')->where('ous_type', 1)->get('store')->result_array();
            if (!empty($stores)) {
                foreach ($stores as $v) {
                    $ebusiness_stores[] = $v['store_id'];
                }
            }
            $this->db->where_in('so.store_id', $ebusiness_stores);
            $this->db->where('so.order_type', 2);
        } elseif ($role && $role == 'e') {         //电商
            $stores = $this->db->select('store_id')->where('ous_type', 2)->get('store')->result_array();
            if (!empty($stores)) {
                foreach ($stores as $v) {
                    $ebusiness_stores[] = $v['store_id'];
                }
            }
            $this->db->where_in('so.buyer_id', $ebusiness_stores);
            $this->db->where('so.order_type', 3);
        } elseif ($role && $role == 's') {         //供应
            $stores = $this->db->select('store_id')->where('ous_type', 3)->get('store')->result_array();
            if (!empty($stores)) {
                foreach ($stores as $v) {
                    $ebusiness_stores[] = $v['store_id'];
                }
            }
            $this->db->where_in('so.store_id', $ebusiness_stores);
        } else {                 //平台

        }

        //组装查询条件
        static $where = ' ';
        if (isset($_GET)) {
            //下单时间
            if (!empty($_GET['startime'])) {
                $where .= "so.created_time >= " . strtotime($_GET['startime']);
//                $this->db->where("so.created_time >= " . strtotime($_GET['startime']));
            }
            if (!empty($_GET['endtime'])) {
                if ($where != ' ') {
                    $where .= ' and ';
                }
                $where .= " so.created_time <= " . strtotime($_GET['endtime']);
//                $this->db->where("so.created_time <= " . (strtotime($_GET['endtime']) + 86400));
            }
            //订单编号
            if (!empty($_GET['order_sn'])) {
                if ($where != ' ') {
                    $where .= ' and ';
                }
                $where .= " so.order_sn like '%" . trim($_GET['order_sn']) . "%'";
//                $this->db->where("so.order_sn" . trim($_GET['order_sn']));
            }
            //支付单号
            if (!empty($_GET['pay_sn'])) {
                if ($where != ' ') {
                    $where .= ' and ';
                }
                $where .= " so.pay_sn like '%" . trim($_GET['pay_sn']) . "%'";
//                $this->db->where('so.pay_sn'.trim($_GET['pay_sn']));
            }
            //运单号
            if (!empty($_GET['waybill_sn'])) {
                if ($where != ' ') {
                    $where .= ' and ';
                }
                $where .= " so.waybill_sn like '%" . trim($_GET['waybill_sn']) . "%'";
//                $this->db->where('so.waybill_sn'.trim($_GET['waybill_sn']));
            }
            //商品名称
            if (!empty($_GET['goods_name'])) {
                if ($where != ' ') {
                    $where .= ' and ';
                }
                $strs = trim($_GET['goods_name']);
                $where .= "sog.goods_name like " % $strs % "";
//                $this->db->where('sog.goods_name'.trim($_GET['goods_name']));
            }
            //商品货号
            if (!empty($_GET['stock_code'])) {
                if ($where != ' ') {
                    $where .= ' and ';
                }
                $where .= " sog.stock_code like '%" . trim($_GET['stock_code']) . "%'";
//                $this->db->where('sog.stock_code', trim($_GET['stock_code']));
            }
            //渠道名称
            if (!empty($_GET['order_from'])) {
                if ($where != ' ') {
                    $where .= ' and ';
                }
                $where .= " so.order_from=" . trim($_GET['order_from']);
//                $this->db->where('so.order_from', trim($_GET['order_from']));
            }
            //订单状态
            if (!empty($_GET['order_status'])) {
                if ($where != ' ') {
                    $where .= ' and ';
                }
                $where .= " so.order_status=" . trim($_GET['order_status']);
//                $this->db->where('so.order_status', trim($_GET['order_status']));
            }
            //买家
            if (!empty($_GET['buyer'])) {
                if ($role && $role == 'e') {
                    if ($where != ' ') {
                        $where .= ' and ';
                    }
                    $where .= " so.receive_name like '%{$_GET['buyer']}%'";
//                    $this->db->where("so.receive_name like '%" . trim($_GET['buyer']) . "%'");
                } else {
                    if ($where != ' ') {
                        $where .= ' and ';
                    }
                    $where .= " u.user_name like '%{$_GET['buyer']}%'";
                    $where .= " or so.receive_name like '%{$_GET['buyer']}%'";
//                    $this->db->where("u.user_name like '%" . trim($_GET['buyer']) . "%'");
//                    $this->db->or_where("so.receive_name like '%" . trim($_GET['buyer']) . "%'");
                }
            }

        }
        $total = 0;
        /*$query = "select count(1) as num from jk_shop_order as so left join jk_shop_order_goods as sog on so.order_sn=sog.order_sn";
        $query.=" left join jk_store as s on s.store_id=so.buyer_id left join jk_user as u on so.buyer_id=u.user_id";
        $total = 0;
        if($where!=' '){
            $rs = $this->db->query($query.' where '.$where);
            $total = $rs->row_array();
        }else{
            $rs = $this->db->query($query);
            $total = $rs->row_array();
        }*/

        //查询总记录数
        if ($role && $role == 'e') {
            $query = "select count(1) as num from jk_shop_order as so left join jk_shop_order_goods as sog on so.order_sn=sog.order_sn";
            $query .= " left join jk_store as s on s.store_id=so.buyer_id left join jk_user as u on so.buyer_id=u.user_id";
            if ($where != ' ') {
//                var_dump($query.' where '.$where);die;
                $rs = $this->db->query($query . ' where ' . $where);
                $total = $rs->row_array();
            } else {
//                var_dump($query);die;
                $rs = $this->db->query($query);
                $total = $rs->row_array();
            }
            $total = $rs->row_array('1', 'num');
            $total = $total['num'];
        } else {
            $query = "select count(1) as num from jk_shop_order as so left join jk_user as u on u.user_id=so.buyer_id ";
            $query .= " left join jk_shop_order_goods as sog on sog.order_sn=so.order_sn";
            if ($where != ' ') {
//                var_dump($query.' where '.$where);die;
                $rs = $this->db->query($query . ' where ' . $where);
                $total = $rs->row_array();
            } else {
//                var_dump($query);die;
                $rs = $this->db->query($query);
                $total = $rs->row_array();
            }
            $total = $rs->row_array('1', 'num');
            $total = $total['num'];
        }
        $page_count = ceil($total / $rp);
        if ($role && $role == 'e') {
            $query = "select so.pay_sn,so.order_sn,so.order_type,so.order_from,so.pay_type,so.order_status,so.store_id,so.store_name,so.spg_id,so.spg_name,";
            $query .= " so.buyer_nickname,so.buyer_id,so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,";
            $query .= " so.counpon_amount,so.integral_amount,so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,";
            $query .= " so.evaluation_state,so.evaluation_time,so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,";
            $query .= " so.created_time,so.end_time,so.buyer_message,so.buyer_memo,so.carriage,so.refund_state,so.refund,";
            $query .= " so.receive_name,so.receive_province,so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,";
            $query .= " so.receive_tel,so.receive_postcode,so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,";
            $query .= " so.pickup_code from jk_shop_order as so ";
            $query .= " left join jk_store as s on s.store_id=so.buyer_id";
            $query .= " left join jk_shop_order_goods as sog on sog.order_sn=so.order_sn";
            $query .= " left join jk_user as u on u.user_id=so.buyer_id";
        } else {
            $query = "select so.pay_sn,so.order_sn,so.order_type,so.order_from,so.pay_type,so.order_status,so.store_id,so.store_name,so.spg_id,so.spg_name,";
            $query .= " so.buyer_nickname,so.buyer_id,so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,";
            $query .= " so.counpon_amount,so.integral_amount,so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,";
            $query .= " so.evaluation_state,so.evaluation_time,so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,";
            $query .= " so.created_time,so.end_time,so.buyer_message,so.buyer_memo,so.carriage,so.refund_state,so.refund,";
            $query .= " so.receive_name,so.receive_province,so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,";
            $query .= " so.receive_tel,so.receive_postcode,so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,";
            $query .= " so.pickup_code,u.user_name,u.user_addres,u.tel from jk_shop_order as so";
            $query .= " left join jk_store as s on s.store_id=so.buyer_id";
            $query .= " left join jk_user as u on u.user_id=so.buyer_id";
            $query .= " left join jk_shop_order_goods as sog on sog.order_sn=so.order_sn";
        }
        if ($role && $role == 'w') {       //微商城
            $where .= " and so.store_id in (" . implode(',', $ebusiness_stores) . ")";
//            $this->db->where_in('so.store_id', $ebusiness_stores);
        } elseif ($role && $role == 'e') {         //电商
            $where .= " and so.buyer_id in (" . implode(',', $ebusiness_stores) . ")";
//            $this->db->where_in('so.buyer_id', $ebusiness_stores);
        } elseif ($role && $role == 's') {         //供应
            $where .= " and so.store_id in (" . implode(',', $ebusiness_stores) . ")";
//            $this->db->where_in('so.store_id', $ebusiness_stores);
        } else {                 //平台

        }
        $start = $rp * ($page - 1);
        $odb = " order by so.created_time desc limit " . $start . ',' . $rp;
        $orders = array();
        if ($where != ' ') {
//            var_dump($query.' where '.$where);die;
            $rs = $this->db->query($query . ' where ' . $where . $odb);
            $orders = $rs->result_array();
        } else {
//            var_dump($query.$where);die;
            $rs = $this->db->query($query . $odb);
            $orders = $rs->result_array();
        }
//        print_r($this->db->last_query());die;
        foreach ($orders as $key => $order) {
            $orders[$key]['created_time'] = date("Y-m-d H:i:s", $order['created_time']);
            $this->db->select('sog.stock_code,sog.goods_color,sog.goods_size,sog.order_sn,sog.goods_id,sog.goods_name,sog.goods_image,sog.goods_num,sog.goods_size,sog.goods_price,sog.goods_pay_price,sog.user_id,sog.store_id,sog.activity_type,sog.promotions_id,sog.gc_id,sog.sotck_barcode,sog.goods_ea_id');
            $this->db->from('shop_order_goods as sog');
            $this->db->where('sog.order_sn', $order['order_sn']);
            //商品名称
            if (!empty($_GET['goods_name'])) {
                $this->db->where("sog.goods_name like '%", $_GET['goods_name'] . "%'");
            }
            //商品货号
            if (!empty($_GET['stock_code'])) {
                $this->db->where('sog.stock_code', trim($_GET['stock_code']));
            }
            $orders[$key]['son'] = $this->db->get()->result_array();
            $orders[$key]['user_name'] = isset($order['user_name']) ? $order['user_name'] : $order['receive_name'];
        }
        $order_info = $orders ? $orders : 0;
        $page_info = array('total_num' => $total, 'page_count' => $page_count, 'page' => $page, 'rp' => $rp, 'start' => $start + 1, 'to' => $start + $rp);
        if ($this->input->is_ajax_request()) {
            if ($order_info) {
                echo json_encode(array('state' => true, 'goods_info' => $order_info, 'page_info' => $page_info));
            } else {
                echo json_encode(array('state' => false));
            }
        } else {
            $defaultImg = $this->common_function->get_system_value('default_goods_image');
            $this->smarty->assign('defaultImg', $defaultImg);
            $this->smarty->assign('role', $role);
            $this->smarty->display('business_order.html');
        }


    }

    /*商品订单*/
    public function business_order()
    {
        $this->common_function->shop_admin_priv("order_manage");//权限
        $role = (isset($_GET['role']) && !empty($_GET['role'])) ? $_GET['role'] : 'p';
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $ebusiness_stores = array();
        if ($role && $role == 'w') {       //微商城
            $stores = $this->db->select('store_id')->where('ous_type', 1)->get('store')->result_array();
            if (!empty($stores)) {
                foreach ($stores as $v) {
                    $ebusiness_stores[] = $v['store_id'];
                }
            }
            $this->db->where_in('so.store_id', $ebusiness_stores);
            $this->db->where('so.order_type', 2);
        } elseif ($role && $role == 'e') {         //电商
            $stores = $this->db->select('store_id')->where('ous_type', 2)->get('store')->result_array();
            if (!empty($stores)) {
                foreach ($stores as $v) {
                    $ebusiness_stores[] = $v['store_id'];
                }
            }
            $this->db->where_in('so.buyer_id', $ebusiness_stores);
            $this->db->where('so.order_type', 3);
        } elseif ($role && $role == 's') {         //供应
            $stores = $this->db->select('store_id')->where('ous_type', 3)->get('store')->result_array();
            if (!empty($stores)) {
                foreach ($stores as $v) {
                    $ebusiness_stores[] = $v['store_id'];
                }
            }
//            var_dump($ebusiness_stores);die;
            if (!$ebusiness_stores) {
                $this->db->where('1=2');
            } else {
                $this->db->where_in('so.store_id', $ebusiness_stores);
            }


        } else {                 //平台

        }

        if (isset($_GET)) {
            if (!empty($_GET['startime'])) {
                $this->db->where("so.created_time >= " . strtotime($_GET['startime']));
            }
            if (!empty($_GET['endtime'])) {
                $this->db->where("so.created_time <= " . (strtotime($_GET['endtime']) + 86400));
            }
            if ($role && $role == 'e') {
                if (!empty($_GET['buyer'])) {
                    $this->db->like("so.receive_name", trim($_GET['buyer']), 'both');
                }
            } else
                {
                if (!empty($_GET['buyer'])) {
                $this->db->group_start();
                $this->db->like("u.user_name", trim($_GET['buyer']), 'both');
                $this->db->or_like("so.receive_name", trim($_GET['buyer']), 'both');
                $this->db->group_end();
                }
                }
                if (!empty($_GET['buyer'])) {
                    $this->db->like("u.user_name", trim($_GET['buyer']));
                }

            //订单编号
            if (!empty($_GET['order_sn'])) {
                $this->db->like("so.order_sn", trim($_GET['order_sn']));
            }
            //支付单号
            if (!empty($_GET['pay_sn'])) {
                $this->db->like("so.pay_sn", trim($_GET['pay_sn']));
            }
            //店铺名称
            if (!empty($_GET['store_name'])) {
                $this->db->like("so.store_name", trim($_GET['store_name']));
            }
            //渠道名称
            if (!empty($_GET['order_from'])) {
                $this->db->where('so.order_from', trim($_GET['order_from']));
            }
            //订单状态
            if (!empty($_GET['order_status'])) {
                $this->db->where('so.order_status', trim($_GET['order_status']));
            }
            //运单号
            if (!empty($_GET['waybill_sn'])) {
                $this->db->like("so.waybill_sn", trim($_GET['waybill_sn']));
            }
            //商品名称
            if (!empty($_GET['goods_name'])) {
                $this->db->like("sog.goods_name", trim($_GET['goods_name']));
            }
            //商品ID
            if (!empty($_GET['goods_id'])) {
                $this->db->like("sog.goods_id", trim($_GET['goods_id']));
            }
            //订单类型
            if (!empty($_GET['order_type'])) {
                $this->db->where('so.order_type', trim($_GET['order_type']));
            }
            //快递方式
            if (!empty($_GET['shipping_type'])) {
                $this->db->where('so.shipping_type', trim($_GET['shipping_type']));
            }
//            评价状态
//            var_dump($_GET['evaluation_state']===false);
//            var_dump(is_numeric($_GET['evaluation_state']));
//            die;
            if (@is_numeric($_GET['evaluation_state'])) {
                $this->db->where('so.evaluation_state', trim($_GET['evaluation_state']));
            }

//            客户电话
            if (isset($_GET['buyer_tel']) && !empty($_GET['buyer_tel'])) {
                $this->db->group_start();
                $this->db->like('so.receive_mobile', trim($_GET['buyer_tel']));
                $this->db->or_like('so.receive_tel', trim($_GET['buyer_tel']));
                $this->db->group_end();
            }

        }

        if ($role && $role == 'e') {
//            $this->db->select('count(1) as num')->from('shop_order so')->join('store s','s.store_id=so.buyer_id','left')->get()->row('num');
            $this->db->distinct(TRUE)->select('so.order_sn')->from('shop_order so')->join('store s', 's.store_id=so.buyer_id', 'left')
                ->join('shop_order_goods sog', 'sog.order_sn=so.order_sn');
            //订单编号
            if (!empty($_GET['order_sn'])) {
                $this->db->like("so.order_sn", trim($_GET['order_sn']));
            }
            //买家名称
            if (!empty($_GET['buyer'])) {
                $this->db->like("so.receive_name", trim($_GET['buyer']), 'both');
            }
            //支付单号
            if (!empty($_GET['pay_sn'])) {
                $this->db->like("so.pay_sn", trim($_GET['pay_sn']));
            }
            //店铺名称
            if (!empty($_GET['store_name'])) {
                $this->db->like('so.store_name', trim($_GET['store_name']));
            }
            //渠道名称
            if (!empty($_GET['order_from'])) {
                $this->db->where('so.order_from', trim($_GET['order_from']));
            }
            //运单号
            if (!empty($_GET['express_sn'])) {
                $this->db->like("so.waybill_sn", trim($_GET['express_sn']));
            }
            //订单状态
            if (!empty($_GET['order_status'])) {
                $this->db->where('so.order_status', trim($_GET['order_status']));
            }
            //商品名称
            if (!empty($_GET['goods_name'])) {
                $this->db->like("sog.goods_name", trim($_GET['goods_name']), 'both');
            }
            //商品ID
            if (!empty($_GET['goods_id'])) {
                $this->db->like("sog.goods_id", trim($_GET['goods_id']));
            }
            //订单类型
            if (!empty($_GET['order_type'])) {
                $this->db->where('so.order_type', trim($_GET['order_type']));
            }
            //快递方式
            if (!empty($_GET['shipping_type'])) {
                $this->db->where('so.shipping_type', trim($_GET['shipping_type']));
            }
//            评价状态
            if (@is_numeric($_GET['evaluation_state'])) {
                $this->db->where('so.evaluation_state', trim($_GET['evaluation_state']));
            }

//            客户电话
            if (isset($_GET['buyer_tel']) && !empty($_GET['buyer_tel'])) {
                $this->db->group_start();
                $this->db->like('so.receive_mobile', trim($_GET['buyer_tel']));
                $this->db->or_like('so.receive_tel', trim($_GET['buyer_tel']));
                $this->db->group_end();
            }
//            echo $this->db->last_query();die;
            $total = $this->db->get()->result_array();

        } else {
//            $total = $this->db->select('count(1) as num')->from('shop_order so')->join('user u','u.user_id=so.buyer_id','left')->get()->row('num');
            $this->db->distinct(TRUE)->select('so.order_sn')->from('shop_order so')->join('user u', 'u.user_id=so.buyer_id', 'left')
                ->join('shop_order_goods sog', 'sog.order_sn=so.order_sn');
            //订单编号
            if (!empty($_GET['order_sn'])) {
                $this->db->like("so.order_sn", trim($_GET['order_sn']));
            }
            //买家名称
            if (!empty($_GET['buyer'])) {
                $this->db->group_start();
                $this->db->like("u.user_name", trim($_GET['buyer']), 'both');
                $this->db->or_like("so.receive_name", trim($_GET['buyer']), 'both');
                $this->db->group_end();
            }
            //支付单号
            if (!empty($_GET['pay_sn'])) {
                $this->db->like("so.pay_sn", trim($_GET['pay_sn']));
            }
            //店铺名称
            if (!empty($_GET['store_name'])) {
                $this->db->like('so.store_name', trim($_GET['store_name']));
            }
            //渠道名称
            if (!empty($_GET['order_from'])) {
                $this->db->where('so.order_from', trim($_GET['order_from']));
            }
            //运单号
            if (!empty($_GET['express_sn'])) {
                $this->db->like("so.waybill_sn", trim($_GET['express_sn']));
            }
            //订单状态
            if (!empty($_GET['order_status'])) {
                $this->db->where('so.order_status', trim($_GET['order_status']));
            }
            //商品名称
            if (!empty($_GET['goods_name'])) {
                $this->db->like("sog.goods_name", trim($_GET['goods_name']));
            }
            //商品ID
            if (!empty($_GET['goods_id'])) {
                $this->db->like("sog.goods_id", trim($_GET['goods_id']));
            }
            //订单类型
            if (!empty($_GET['order_type'])) {
                $this->db->where('so.order_type', trim($_GET['order_type']));
            }
            //快递方式
            if (!empty($_GET['shipping_type'])) {
                $this->db->where('so.shipping_type', trim($_GET['shipping_type']));
            }
//            评价状态
            if (@is_numeric($_GET['evaluation_state'])) {
                $this->db->where('so.evaluation_state', trim($_GET['evaluation_state']));
            }

//            客户电话
            if (isset($_GET['buyer_tel']) && !empty($_GET['buyer_tel'])) {
                $this->db->group_start();
                $this->db->like('so.receive_mobile', trim($_GET['buyer_tel']));
                $this->db->or_like('so.receive_tel', trim($_GET['buyer_tel']));
                $this->db->group_end();
            }
//            echo $this->db->last_query();die;
            $total = $this->db->get()->result_array();


        }
//        echo $this->db->last_query();die;
        //$total = $this->db->count_all_results('shop_order as so');
        $total = count($total);
        $page_count = ceil($total / $rp);
//        var_dump($page_count);die;
        if ($role && $role == 'e') {
            $this->db->distinct(TRUE)->select("so.pay_sn,so.order_sn,so.order_type,so.order_from,so.pay_type,so.order_status,so.store_id,so.store_name,so.spg_id,so.spg_name,
            so.buyer_nickname,so.buyer_id,so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,
            so.counpon_amount,so.integral_amount,so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,
            so.evaluation_state,so.evaluation_time,so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,
            so.created_time,so.end_time,so.buyer_message,so.buyer_memo,so.carriage,so.refund_state,so.refund,
            so.receive_name,so.receive_province,so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,
            so.receive_tel,so.receive_postcode,so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,
            so.pickup_code");

            $this->db->from('shop_order so');
            $this->db->join('store s', 's.store_id=so.buyer_id', 'left');
            $this->db->join('shop_order_goods sog', 'sog.order_sn=so.order_sn', 'left');
        } else {
            $this->db->distinct(TRUE)->select("so.pay_sn,so.order_sn,so.order_type,so.order_from,so.pay_type,so.order_status,so.store_id,so.store_name,so.spg_id,so.spg_name,
            so.buyer_nickname,so.buyer_id,so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,
            so.counpon_amount,so.integral_amount,so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,
            so.evaluation_state,so.evaluation_time,so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,
            so.created_time,so.end_time,so.buyer_message,so.buyer_memo,so.carriage,so.refund_state,so.refund,
            so.receive_name,so.receive_province,so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,
            so.receive_tel,so.receive_postcode,so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,
            so.pickup_code,u.user_name,u.user_addres,u.tel");
            $this->db->from('shop_order so');
            $this->db->join('user u', 'u.user_id=so.buyer_id', 'left');
            $this->db->join('shop_order_goods sog', 'sog.order_sn=so.order_sn', 'left');
        }

        if (isset($_GET)) {
            if (!empty($_GET['startime'])) {
                $this->db->where("so.created_time >= " . strtotime($_GET['startime']));
            }
            if (!empty($_GET['endtime'])) {
                $this->db->where("so.created_time <= " . (strtotime($_GET['endtime']) + 86400));
            }
            if ($role && $role == 'e') {
                if (!empty($_GET['buyer'])) {
                    $this->db->like("so.receive_name", trim($_GET['buyer']));
                }
            } else {
                if (!empty($_GET['buyer'])) {
                    $this->db->group_start();
                    $this->db->like("u.user_name", trim($_GET['buyer']));
                    $this->db->or_like("so.receive_name", trim($_GET['buyer']));
                    $this->db->group_end();
                }
            }
            //支付单号
            if (!empty($_GET['pay_sn'])) {
                $this->db->like("so.pay_sn", trim($_GET['pay_sn']));
            }
            //店铺名称
            if (!empty($_GET['store_name'])) {
                $this->db->like("so.store_name", trim($_GET['store_name']));
            }
            //渠道名称
            if (!empty($_GET['order_from'])) {
                $this->db->where('so.order_from', trim($_GET['order_from']));
            }
            //运单号
            if (!empty($_GET['waybill_sn'])) {
                $this->db->like("so.waybill_sn", trim($_GET['waybill_sn']));
            }
            //订单状态
            if (!empty($_GET['order_status'])) {
                $this->db->where('so.order_status', trim($_GET['order_status']));
            }
            //订单编号
            if (!empty($_GET['order_sn'])) {
                $this->db->like("so.order_sn", trim($_GET['order_sn']));
            }
            //商品名称
            if (!empty($_GET['goods_name'])) {
                $this->db->like("sog.goods_name", trim($_GET['goods_name']));
            }
            //商品ID
            if (!empty($_GET['goods_id'])) {
                $this->db->like("sog.goods_id", trim($_GET['goods_id']));
            }
            //订单类型
            if (!empty($_GET['order_type'])) {
                $this->db->where('so.order_type', trim($_GET['order_type']));
            }
            //快递方式
            if (!empty($_GET['shipping_type'])) {
                $this->db->where('so.shipping_type', trim($_GET['shipping_type']));
            }
//            评价状态
            if (@is_numeric($_GET['evaluation_state'])) {
                $this->db->where('so.evaluation_state', trim($_GET['evaluation_state']));
            }

//客户电话
            if (isset($_GET['buyer_tel']) && !empty($_GET['buyer_tel'])) {
                $this->db->group_start();
                $this->db->like('so.receive_mobile', trim($_GET['buyer_tel']));
                $this->db->or_like('so.receive_tel', trim($_GET['buyer_tel']));
                $this->db->group_end();
            }
        }
        if ($role && $role == 'w') {       //微商城
            $this->db->where_in('so.store_id', $ebusiness_stores);
        } elseif ($role && $role == 'e') {         //电商
            $this->db->where_in('so.buyer_id', $ebusiness_stores);
        } elseif ($role && $role == 's') {         //供应
            if (!$ebusiness_stores) {
                $this->db->where('1=2');
            } else {
                $this->db->where_in('so.store_id', $ebusiness_stores);
            }
        } else {                 //平台

        }
        $start = $rp * ($page - 1);
        $this->db->order_by('so.created_time', 'DESC')->limit($rp, $start);
//        ->join('shop_order_goods sog','sog.order_sn=so.order_sn')
//            ->where("sog.goods_name like '%",$_GET['goods_name']."%'")
//        echo $this->db->last_query();die;
        $orders = $this->db->get()->result_array();

        foreach ($orders as $key => $order) {
            $orders[$key]['created_time'] = date("Y-m-d H:i:s", $order['created_time']);
            $this->db->select('sog.stock_code,sog.goods_color,sog.goods_size,sog.order_sn,sog.goods_id,sog.goods_name,sog.goods_image,sog.goods_num,sog.goods_size,sog.goods_price,sog.goods_pay_price,sog.user_id,sog.store_id,sog.activity_type,sog.promotions_id,sog.gc_id,sog.sotck_barcode,sog.goods_ea_id');
            $this->db->from('shop_order_goods as sog');
            $this->db->where('sog.order_sn', $order['order_sn']);
            //后增条件
//            if(!empty($_GET['express_sn'])){
//                $this->db->where("sog.express_sn like '%",trim($_GET['express_sn'])."%'");
//            }
//            if(!empty($_GET['user_tel'])){
//                $this->db->where('so.user_tel',trim($_GET['user_tel']));
//            }
            //商品名称
            if (!empty($_GET['goods_name'])) {
                $this->db->like("sog.goods_name", $_GET['goods_name']);
            }
            //商品ID
            if (!empty($_GET['goods_id'])) {
                $this->db->like("sog.goods_id", trim($_GET['goods_id']));
            }
            //商品货号
            if (!empty($_GET['stock_code'])) {
                $this->db->like('sog.stock_code', trim($_GET['stock_code']));
            }
            $orders[$key]['son'] = $this->db->get()->result_array();
            $orders[$key]['user_name'] = isset($order['user_name']) ? $order['user_name'] : $order['receive_name'];
        }

//        var_dump($orders[5]);die;
        $order_info = $orders ? $orders : 0;
        $page_info = array('total_num' => $total, 'page_count' => $page_count, 'page' => $page, 'rp' => $rp, 'start' => $start + 1, 'to' => $start + $rp);
//        var_dump($page_info);die;
        if ($this->input->is_ajax_request()) {
            if ($order_info) {
                echo json_encode(array('state' => true, 'goods_info' => $order_info, 'page_info' => $page_info));
            } else {
                echo json_encode(array('state' => false));
            }
        } else {
            $defaultImg = $this->common_function->get_system_value('default_goods_image');
            $this->smarty->assign('defaultImg', $defaultImg);
            $this->smarty->assign('role', $role);
            //print_r($defaultImg);die;
            $this->smarty->display('business_order.html');
        }
    }

    public function order_cancel()
    {
        $this->common_function->shop_admin_priv("order_manage");//权限
        $data = $this->input->post();
        if ($this->db->update('shop_order', array('order_status' => 0), array('order_sn' => $data['order_sn']))) {
            if ($data['state_info'] == 1) {
                $this->common_function->insert_order_log($data['order_sn'], '取消订单，无法备齐货物', 1);
            } elseif ($data['state_info'] == 2) {
                $this->common_function->insert_order_log($data['order_sn'], '取消订单，不是有效的订单', 1);
            } elseif ($data['state_info'] == 3) {
                $this->common_function->insert_order_log($data['order_sn'], '取消订单，买家主动要求', 1);
            } else {
                $this->common_function->insert_order_log($data['order_sn'], $data['state_info1'], 1);
            }
            echo json_encode('取消成功');
        } else {
            echo json_encode('取消失败');
        }
    }

    /*商品订单——打印订单*/
    public function business_order_print()
    {
        $this->common_function->shop_admin_priv("order_manage");//权限
        $order_sn = $_GET['order_sn'];
        $this->db->select("so.order_sn,so.order_type,so.pay_type,so.order_status,so.store_id,so.store_name,so.spg_id,so.spg_name,so.buyer_nickname,so.buyer_id,so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,so.counpon_amount,so.integral_amount,so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,so.evaluation_state,so.evaluation_time,so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,so.created_time,so.end_time,so.buyer_message,so.buyer_memo,so.carriage,so.refund_state,so.refund,so.receive_name,so.receive_province,so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,so.receive_tel,so.receive_postcode,so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,so.pickup_code,");
        $this->db->from('shop_order so');
        $this->db->where('order_sn', $order_sn);
        $order = $this->db->get()->row_array();
        $this->db->select('sog.order_sn,sog.goods_id,sog.goods_name,sog.goods_image,sog.goods_num,sog.goods_size,sog.goods_price,sog.goods_pay_price,sog.user_id,sog.store_id,sog.activity_type,sog.promotions_id,sog.gc_id,sog.stock_code,sog.sotck_barcode,');
        $this->db->from('shop_order_goods as sog');
        $this->db->where('sog.order_sn', $order['order_sn']);
        $this->db->where('sog.order_sn', $order['order_sn']);
        $order['son'] = $this->db->get()->result_array();
        //var_dump($order);die;
        $this->smarty->assign('order', $order);
        $this->smarty->display('business_order_print.html');
    }

    /*商品订单——订单详情*/
    public function business_order_details()
    {
//        var_dump('detail');die;

        $this->common_function->shop_admin_priv("order_manage");//权限
        $order_sn = $_GET['order_sn'];
        $pay_type = array('1' => '微信', '2' => '线下', '3' => '余额', '4' => '支付宝');
        $this->db->select("so.order_sn,so.pay_sn,so.order_from,so.order_type,s.ous_tel,so.store_name,so.shipping_type,
            so.pay_type,so.order_status,so.store_id,so.store_name,so.spg_id,so.spg_name,so.buyer_nickname,so.buyer_id,
            so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,so.counpon_amount,so.integral_amount,
            so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,so.evaluation_state,so.evaluation_time,
            so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,so.created_time,so.end_time,so.buyer_message,
            so.buyer_memo,so.carriage,so.refund_state,so.refund,so.receive_name,so.receive_province,
            so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,so.receive_tel,so.receive_postcode,
            so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,so.pickup_code,u.user_name,u.tel,
            a.area_name as province,b.area_name as city,c.area_name as area,");
        $this->db->from('shop_order so');
        $this->db->join('store s', 's.store_id=so.store_id', 'left');
        $this->db->join('user u', 'u.user_id=so.buyer_id', 'left');
        $this->db->join('area a', 'a.area_id=so.receive_province', 'left');
        $this->db->join('area b', 'b.area_id=so.receive_city', 'left');
        $this->db->join('area c', 'c.area_id=so.receive_area', 'left');
        $this->db->where('so.order_sn', $order_sn);
        $order = $this->db->get()->row_array();
        if ($order['pay_time'] != 0) {
            $order['pay_time'] = date('Y-m-d H:i:s', $order['pay_time']);
        }
        if ($order['created_time'] != 0) {
            $order['created_time'] = date('Y-m-d H:i:s', $order['created_time']);
        }
        if ($order['end_time'] != 0) {
            $order['end_time'] = date('Y-m-d H:i:s', $order['end_time']);
        }
        if ($order['receive_time'] != 0) {
            $order['receive_time'] = date('Y-m-d H:i:s', $order['receive_time']);
        }
        if ($order['evaluation_time'] != 0) {
            $order['evaluation_time'] = date('Y-m-d H:i:s', $order['evaluation_time']);
        }
        if ($order['pay_type'] != 0) {
            $order['pay_type'] = array_key_exists($order['pay_type'], $pay_type) !== false ? $pay_type[$order['pay_type']] : '其他';
        }
        if (empty($order['receive_name'])) {
            $order['receive_name'] = $order['user_name'];
        }
        if (empty($order['receive_mobile'])) {
            $order['receive_mobile'] = $order['tel'];
        }
        $order_from = $this->business_model->order_from();
        $order['order_type_'] = $order_from[$order['order_from']];
        $shipping_type = $this->business_model->shipping_type();
        $order['shipping'] = $order['shipping_type'] == 1 ? '快递' : '自提';
        $order['pay_log'] = $this->db->select('*')->where('pay_sn', $order['pay_sn'])->get('shop_order_pay')->result_array();
        $mtcn_type = $this->business_model->mtcn_type();
        foreach ($order['pay_log'] as $k => $v) {
            $order['pay_log'][$k]['pay_type'] = $mtcn_type[$v['mtcn_type']];
            $order['pay_log'][$k]['mtcn_sn'] = empty($v['mtcn_sn']) ? '--' : $v['mtcn_sn'];
        }
        $order['delivery_date'] = empty($order['delivery_time']) ? '' : date('Y-m-d H:i:s', $order['delivery_time']);
        $this->db->select('sog.order_sn,sog.goods_id,sog.goods_name,sog.goods_image,sog.goods_num,sog.goods_size,sog.goods_price,sog.goods_pay_price,sog.user_id,sog.store_id,sog.activity_type,sog.promotions_id,sog.gc_id,sog.stock_code,sog.sotck_barcode,sog.goods_ea_id');
        $this->db->from('shop_order_goods as sog');
        $this->db->where('sog.order_sn', $order['order_sn']);
        $order['son'] = $this->db->get()->result_array();
//        var_dump($order);die;
        $this->smarty->assign('order', $order);
        $defaultImg = $this->common_function->get_system_value('default_goods_image');
        $this->smarty->assign('defaultImg', $defaultImg);
        $this->smarty->display('business_order_details.html');
    }
    /*退款管理——待处理*/
    /* public function business_refund(){
         $role = (isset($_GET['role']) && !empty($_GET['role'])) ? $_GET['role'] : 'p';
         $this->common_function->shop_admin_priv("return_manage");//权限
         $this->smarty->assign('role',$role);
         $this->smarty->display ( 'business_refund_pending1.html' );
     }*/

    /*退款管理*/
    public function business_refund()
    {
        $this->common_function->shop_admin_priv("return_manage");//权限
        //var_dump($_POST);
        $role = (isset($_GET['role']) && !empty($_GET['role'])) ? $_GET['role'] : 'p';
        $state = (isset($_GET['state']) && !empty($_GET['state'])) ? $_GET['state'] : 'pending';
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $ebusiness_stores = array();
        if ($role && $role == 'w') {       //微商城
            $stores = $this->db->select('store_id')->where('ous_type', 1)->get('store')->result_array();
            if (!empty($stores)) {
                foreach ($stores as $v) {
                    $ebusiness_stores[] = $v['store_id'];
                }
            }
            $this->db->where_in('r.store_id', $ebusiness_stores);
        } elseif ($role && $role == 'e') {         //电商
            $stores = $this->db->select('store_id')->where('ous_type', 2)->get('store')->result_array();
            if (!empty($stores)) {
                foreach ($stores as $v) {
                    $ebusiness_stores[] = $v['store_id'];
                }
            }
            $this->db->where_in('r.store_id', $ebusiness_stores);
        } elseif ($role && $role == 's') {         //供应
            $stores = $this->db->select('store_id')->where('ous_type', 3)->get('store')->result_array();
            if (!empty($stores)) {
                foreach ($stores as $v) {
                    $ebusiness_stores[] = $v['store_id'];
                }
            }
            $this->db->where_in('r.store_id', $ebusiness_stores);
        } else {                 //平台

        }
        if ($state == 'pending') {      //处理中
            $this->db->where('r.refund_state', 1);
        } elseif ($state == 'do') {          //已完成
            $this->db->where('r.refund_state', 3);
        } else {            //全部
            $this->db->order_by('r.refund_state ASC,r.seller_time DESC,r.add_time ASC');
        }

        if (isset($_GET)) {
            if (!empty($_GET['startime'])) {
                $this->db->where("r.add_time >= " . strtotime($_GET['startime']));
            }
            if (!empty($_GET['endtime'])) {
                $this->db->where("r.add_time <= " . (strtotime($_GET['endtime']) + 86400));
            }
            if (!empty($_GET['buyer'])) {
                $this->db->where("r.buyer_name like '%" . trim($_GET['buyer']) . "%'");
            }
            if (!empty($_GET['order_sn'])) {
                $this->db->where("r.order_sn like '%" . trim($_GET['order_sn']) . "%'");
            }

        }
        $total = $this->db->select('count(1) as num')->from('shop_order_refund_return r')
            ->join('shop_order o', 'r.order_sn=o.order_sn')->get()->row('num');
        $page_count = ceil($total / $rp);


        $this->db->select('o.order_status,r.seller_state,r.refund_type,r.refund_id,r.pay_sn,r.order_sn,r.store_id,r.goods_ea_id,r.buyer_id,r.refund_tel,r.buyer_name,r.goods_id,r.order_goods_id,r.refund_amount_apply,r.add_time,r.refund_amount,r.refund_state,r.refund_address,r.express_id,r.invoice_no,r.seller_time')
            ->from('shop_order_refund_return r')
            ->join('shop_order o', 'r.order_sn=o.order_sn');
        if (isset($_GET)) {
            if (!empty($_GET['startime'])) {
                $this->db->where("r.add_time >= " . strtotime($_GET['startime']));
            }
            if (!empty($_GET['endtime'])) {
                $this->db->where("r.add_time <= " . (strtotime($_GET['endtime']) + 86400));
            }
            if (!empty($_GET['buyer'])) {
                $this->db->where("r.buyer_name like '%" . trim($_GET['buyer']) . "%'");
            }
            if (!empty($_GET['order_sn'])) {
                $this->db->where("r.order_sn like '%" . trim($_GET['order_sn']) . "%'");
            }
            if (!empty($_GET['pay_sn'])) {
                $this->db->where("r.pay_sn like '%" . trim($_GET['pay_sn']) . "%'");
            }
            if(!empty($_GET['buyer_tel'])){
                $this->db->where("r.refund_tel like '%" . trim($_GET['buyer_tel']) . "%'");
            }
            if(!empty($_GET['waybill_sn'])){
                $this->db->where("r.waybill_sn like '%" . trim($_GET['waybill_sn']) . "%'");
            }
            if(!empty($_GET['goods_name'])){
                $this->db->where("r.goods_name like '%" . trim($_GET['goods_name']) . "%'");
            }
            if(!empty($_GET['goods_id'])){
                $this->db->where("r.goods_id like '%" . trim($_GET['goods_id']) . "%'");
            }
            if(!empty($_GET['order_status'])){
                $this->db->where("o.order_status like '%" . trim($_GET['order_status']) . "%'");
            }
        }
        if ($role && $role == 'w') {       //微商城
            $this->db->where_in('r.store_id', $ebusiness_stores);
        } elseif ($role && $role == 'e') {         //电商
            $this->db->where_in('r.store_id', $ebusiness_stores);
        } elseif ($role && $role == 's') {         //供应
            $this->db->where_in('r.store_id', $ebusiness_stores);
        } else {                 //平台

        }
        if ($state == 'pending') {       //处理中
            $this->db->where('r.refund_state', 1);
            $this->db->order_by('r.seller_state ASC,r.add_time ASC');
        } elseif ($state == 'do') {             //已完成
            $this->db->where('r.refund_state', 3);
            $this->db->order_by('r.seller_time DESC');
        } else {                 //全部
            $this->db->order_by('r.refund_state ASC,r.seller_time DESC,r.add_time ASC');
        }

        $start = $rp * ($page - 1);
        $this->db->limit($rp, $start);
        $returns = $this->db->get()->result_array();
        if (!empty($returns)) {
            foreach ($returns as $k => $v) {
                if ($v['goods_ea_id'] == 0) {
                    $order_goods = $this->db->select('goods_color,goods_color_remark,goods_size,goods_size_remark,goods_price,goods_image,goods_name,goods_num')->where('order_sn', $v['order_sn'])->get('shop_order_goods')->result_array();
                    /*$returns[$k]['color'] = empty($order_goods['goods_color_remark']) ? $order_goods['goods_color'] : $order_goods['goods_color_remark'];
                    $returns[$k]['size'] = empty($order_goods['goods_size_remark']) ? $order_goods['goods_size'] : $order_goods['goods_size_remark'];
                    $returns[$k]['goods_price'] = $order_goods['goods_price'];
                    $returns[$k]['goods_image'] = $order_goods['goods_image'];
                    $returns[$k]['goods_name'] = $order_goods['goods_name'];
                    $returns[$k]['goods_num'] = $order_goods['goods_num'];*/
                    foreach ($order_goods as $kk => $vv) {
                        $order_goods[$kk]['color'] = empty($vv['goods_color_remark']) ? $vv['goods_color'] : $vv['goods_color_remark'];
                        $order_goods[$kk]['size'] = empty($vv['goods_size_remark']) ? $vv['goods_size'] : $vv['goods_size_remark'];

                    }
                    $returns[$k]['son'] = $order_goods;
                } else {
                    $order_goods = $this->db->select('goods_color,goods_color_remark,goods_size,goods_size_remark,goods_price,goods_num,goods_image,goods_name')->where('goods_ea_id', $v['goods_ea_id'])->get('shop_order_goods')->result_array();
                    foreach ($order_goods as $kk => $vv) {
                        $order_goods[$kk]['color'] = empty($vv['goods_color_remark']) ? $vv['goods_color'] : $vv['goods_color_remark'];
                        $order_goods[$kk]['size'] = empty($vv['goods_size_remark']) ? $vv['goods_size'] : $vv['goods_size_remark'];

                    }
                    $returns[$k]['son'] = $order_goods;
                }
                if ($v['seller_time'] != 0) {
                    $returns[$k]['seller_time'] = date('Y-m-d H:i:s', $v['seller_time']);
                }
                $returns[$k]['add_time'] = date('Y-m-d H:i:s', $v['add_time']);
            }
            $returns_info = $returns;
        } else {
            $returns_info = false;
        }
        $page_info = array('total_num' => $total, 'page_count' => $page_count, 'page' => $page, 'rp' => $rp, 'start' => $start + 1, 'to' => $start + $rp);
        //var_dump($page_info);die;
        if ($this->input->is_ajax_request()) {
            if ($returns_info) {
                echo json_encode(array('state' => true, 'returns_info' => $returns_info, 'page_info' => $page_info));
            } else {
                echo json_encode(array('state' => false));
            }
        } else {
            $defaultImg = $this->common_function->get_system_value('default_goods_image');
            $this->smarty->assign('defaultImg', $defaultImg);
            $this->smarty->assign('role', $role);
            $this->smarty->assign('state', $state);
            //print_r($defaultImg);die;
            $this->smarty->display('business_refund.html');
        }
    }

    /*退款详情*/
    public function refund_details()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $returnId = $_GET['id'];
            $return = $this->db->select('refund_state,refund_type,refund_id,goods_ea_id,order_sn,store_id,buyer_id,buyer_name,refund_tel,goods_id,order_goods_id,refund_amount_apply,reason_info,add_time,buyer_message,seller_state,express_id,invoice_no,refund_address,refund_amount')
                ->from('shop_order_refund_return')
                ->where('refund_id', $returnId)
                ->get()->row_array();
            if (!empty($return)) {
                $goods = [];
                if ($return['goods_ea_id'] == 0) {
                    $order_goods = $this->db->select('goods_id,goods_color,goods_color_remark,goods_size,goods_size_remark,goods_price,goods_image,goods_name,goods_num,goods_pay_price')->where('order_sn', $return['order_sn'])->get('shop_order_goods')->result_array();
                    foreach ($order_goods as $k => $v) {
                        $goods[$k]['color'] = empty($v['goods_color_remark']) ? $v['goods_color'] : $v['goods_color_remark'];
                        $goods[$k]['size'] = empty($v['goods_size_remark']) ? $v['goods_size'] : $v['goods_size_remark'];
                        $goods[$k]['goods_price'] = $v['goods_price'];
                        $goods[$k]['goods_pay_price'] = $v['goods_pay_price'];
                        $goods[$k]['goods_image'] = $v['goods_image'];
                        $goods[$k]['goods_name'] = $v['goods_name'];
                        $goods[$k]['goods_num'] = $v['goods_num'];
                        $goods[$k]['goods_id'] = $v['goods_id'];
                    }

                } else {
                    $order_goods = $this->db->select('goods_id,goods_color,goods_color_remark,goods_size,goods_size_remark,goods_price,goods_num,goods_name,goods_image,goods_pay_price')->where('goods_ea_id', $return['goods_ea_id'])->where('order_sn', $return['order_sn'])->get('shop_order_goods')->row_array();
                    $goods[0]['color'] = empty($order_goods['goods_color_remark']) ? $order_goods['goods_color'] : $order_goods['goods_color_remark'];
                    $goods[0]['size'] = empty($order_goods['goods_size_remark']) ? $order_goods['goods_size'] : $order_goods['goods_size_remark'];
                    $goods[0]['goods_price'] = $order_goods['goods_price'];
                    $goods[0]['goods_pay_price'] = $order_goods['goods_pay_price'];
                    $goods[0]['goods_image'] = $order_goods['goods_image'];
                    $goods[0]['goods_name'] = $order_goods['goods_name'];
                    $goods[0]['goods_num'] = $order_goods['goods_num'];
                    $goods[0]['goods_id'] = $order_goods['goods_id'];

                }
                $return['goods_info'] = $goods;

                $this->db->select("so.order_sn,so.pay_sn,so.order_from,so.order_type,s.ous_tel,so.store_name,
            so.pay_type,so.order_status,so.store_id,so.spg_id,so.spg_name,so.buyer_nickname,so.buyer_id,
            so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,so.counpon_amount,so.integral_amount,
            so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,so.evaluation_state,so.evaluation_time,
            so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,so.created_time,so.end_time,so.buyer_message,
            so.buyer_memo,so.carriage,so.refund_state,so.refund,so.receive_name,so.receive_province,
            so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,so.receive_tel,so.receive_postcode,
            so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,so.pickup_code,u.user_name,u.tel,
            a.area_name as province,b.area_name as city,c.area_name as area");
                $this->db->from('shop_order so');
                $this->db->join('store s', 's.store_id=so.store_id', 'left');
                $this->db->join('user u', 'u.user_id=so.buyer_id', 'left');
                $this->db->join('area a', 'a.area_id=so.receive_province', 'left');
                $this->db->join('area b', 'b.area_id=so.receive_city', 'left');
                $this->db->join('area c', 'c.area_id=so.receive_area', 'left');
                $this->db->where('so.order_sn', $return['order_sn']);
                $order = $this->db->get()->row_array();
                $pay_type = array('1' => '微信', '2' => '线下', '3' => '余额', '4' => '支付宝');
                if ($order['pay_type'] != 0) {
                    $order['pay_type'] = array_key_exists($order['pay_type'], $pay_type) !== false ? $pay_type[$order['pay_type']] : '其他';
                }
                if (isset($order['user_name']) && !empty($order['user_name'])) {
                    $order['receive_name'] = $order['user_name'];
                }
                if (empty($order['receive_mobile'])) {
                    $order['receive_mobile'] = $order['tel'];
                }
                $order_from = $this->business_model->order_from();
                $order['order_from'] = $order_from[$order['order_from']];
                $order['shipping'] = $order['shipping_type'] == 1 ? '快递' : '自提';
                $order['delivery_date'] = empty($order['delivery_time']) ? '' : date('Y-m-d H:i:s', $order['delivery_time']);
                $order['pay_time'] = empty($order['pay_time']) ? '' : date('Y-m-d H:i:s', $order['pay_time']);
                $order['created_time'] = date('Y-m-d H:i:s', $order['created_time']);
                $defaultImg = $this->common_function->get_system_value('default_goods_image');
                $this->smarty->assign('defaultImg', $defaultImg);
                $return['add_time'] = date('Y-m-d H:i:s', $return['add_time']);
                if (!empty($return['express_id'])) {
                    $return['express_name'] = $this->db->select('e_name')->where('e_code', $return['express_id'])->get('express')->row('e_name');
                } else {
                    $return['express_name'] = '';
                }

                //申请时间
                $apply_time = $this->db->select('add_time')->from('shop_order_return_log')
                    ->where('return_id', $returnId)->where('type', 1)->get()->row_array();
                if (!empty($apply_time)) {
                    $return['apply_time'] = date('Y-m-d H:i:s', $apply_time['add_time']);
                }

                //开始处理时间
                $doing_time = $this->db->select('add_time')->from('shop_order_return_log')
                    ->where('return_id', $returnId)->where('type!=', 1)->order_by('add_time ASC')->get()->row_array();
                if (!empty($doing_time)) {
                    $return['doing_time'] = date('Y-m-d H:i:s', $doing_time['add_time']);
                }

                //完成时间
                if ($return['refund_state'] == 3) {
                    $end_time = $this->db->select('add_time')->from('shop_order_return_log')
                        ->where('return_id', $returnId)->where('type!=', 9)->order_by('add_time DESC')->get()->row_array();
                    if (!empty($end_time)) {
                        $return['end_time'] = date('Y-m-d H:i:s', $end_time['add_time']);
                    }
                }

                $return['refund_amount'] = ($return['refund_amount'] == 0) ? $return['refund_amount_apply'] : $return['refund_amount'];
                $this->smarty->assign('return', $return);
                $this->smarty->assign('order', $order);
                $this->smarty->display('business_refund_detail.html');
            }
        }
    }

    /*售后沟通日志*/
    public function refund_notes()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $returnId = $_GET['id'];
            $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
            $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
            $this->db->select('sornid,guide_id,content,action_type,add_time,type')->from('shop_order_return_log')
                ->where('return_id', $returnId);
            $db = clone($this->db);
            $total = $this->db->count_all_results();
            $start = ($page - 1) * $rp;
            $this->db = $db;
            $rows = $this->db->order_by('add_time DESC,type DESC')->limit($rp, $start)->get()->result_array();
            header('Content-type:text/xml');
            $xml = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL;
            $xml .= '<rows>';
            $xml .= '<total>' . $total . '</total>';
            $xml .= '<page>' . $page . '</page>';
            foreach ($rows as $row) {
                $xml .= '<row id="' . $row['sornid'] . '">';
                if ($row['action_type'] == 1) {
                    $name = $this->common_function->get_one('user', 'user_id=' . $row['guide_id'], 'user_name');
                    $str = '买家 ' . $name;
                } elseif ($row['action_type'] == 2) {
                    $name = $this->common_function->get_one('store_shopping_guide', 'spg_id=' . $row['guide_id'], 'spg_name');
                    $str = '商家 ' . $name;
                } elseif ($row['action_type'] == 3) {
                    $name = $this->common_function->get_one('admin', 'admin_id=' . $row['guide_id'], 'admin_name');
                    $str = '平台 ' . $name;
                } else {
                    $str = '系统';
                }
                $xml .= '<cell><![CDATA[' . $str . ']]></cell>';
                $type = ['买家取消', '申请售后', '拒绝申请退款', '同意退款处理中', '同意退款并退货,请填写物流单号', '填写退货物流', '物流单通过审核处理中', '物流单未通过审核，请重新填写', '', '备注', '退款成功'];
                $xml .= '<cell><![CDATA[' . $type[$row['type']] . ']]></cell>';
                $xml .= '<cell><![CDATA[' . date('Y-m-d H:i:s', $row['add_time']) . ']]></cell>';
                if ($row['type'] == 1) {
                    $tel = $this->db->select('refund_tel')->where('refund_id', $returnId)->get('shop_order_refund_return')->row('refund_tel');
                    $cont = json_decode($row['content'], true);
                    if (!empty($cont['pic_info'])) {
                        $img = unserialize($cont['pic_info']);
                        $pic = '';
                        foreach ($img as $kk => $vv) {
                            $url = HEADIMAGE . $vv;
                            $pic .= '<img src="' . $url . '"' . 'style="height:80%;"' . 'data-geo="<img src=' . $url . ' width=300px >">&nbsp';
                        }
                    } else {
                        $pic = '无';
                    }
                    $reason = empty($cont['reason_info']) ? '无' : $cont['reason_info'];
                    $message = empty($cont['note']) ? '无' : $cont['note'];
                    $xml .= "<cell><![CDATA[" . '联系电话:' . $tel . ';&nbsp;原因:' . $reason . ';&nbsp;买家备注:' . $message . ';&nbsp;举证:' . $pic . "]]></cell>";
                } elseif ($row['type'] == 5) {
                    $row['content'] = str_replace('%', ';&nbsp;', $row['content']);
                    $xml .= '<cell><![CDATA[' . $row['content'] . ']]></cell>';
                } else {
                    $xml .= '<cell><![CDATA[' . $row['content'] . ']]></cell>';
                }
                $xml .= '</row>';
            }
            $xml .= '</rows>';
            die($xml);
        }
    }

    /*添加售后备注*/
    public function add_refund_note()
    {
        $res = array('state' => false, 'msg' => '系统错误,请稍后再试');
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $data = array(
                'return_id' => $_GET['id'],
                'guide_id' => $_SESSION['shop_admin_id'],
                'action_type' => 3,
                'content' => '备注内容:' . $_POST['note'],
                'add_time' => time(),
                'type' => 9,
            );
            if ($this->db->insert('shop_order_return_log', $data)) {
                $res = array('state' => true);
            } else {
                $res = array('state' => false, 'msg' => '添加备注失败');
            }
        }
        echo json_encode($res);
        exit();
    }

    /*售后处理*/
    public function refund_do()
    {
        $res = array('state' => false, 'msg' => '系统错误,请稍后再试');
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            if ($_POST['tag'] == 'ga') {  //同意退货,添加退货地址
                $this->db->set(['seller_state' => 2, 'refund_address' => $_POST['address'], 'admin_time' => time()])->where('refund_id', $id)->update('shop_order_refund_return');
                $return_log = array('return_id' => $id, 'guide_id' => $_SESSION['shop_admin_id'], 'action_type' => 3, 'content' => '退货地址:' . $_POST['address'], 'add_time' => time(), 'type' => 4);
                $this->db->insert('shop_order_return_log', $return_log);//写退货日志
                $frist = '您的退货申请已被同意,请将商品寄回指定地址,卖家收货后会将钱退到您的账户余额';  //微信通知的头部信息
                $end = '请将商品寄到' . '"' . $_POST['address'] . '"' . ',如有问题可直接咨询导购哦！';   //微信通知的结尾处信息
                $url_turn = 'vmall.php/order/applyReturnMoney_result_writeExpress?refund_id=' . $id;    //微信通知的点击跳转地址
                $this->weixin_return_goods($id, $frist, $end, $url_turn);  //发送微信通知
                $res = array('state' => true, 'msg' => '');
            } elseif ($_POST['tag'] == 'mr') {     //拒绝退款
                $this->db->set(['seller_state' => 3, 'refund_state' => 3, 'admin_time' => time()])->where('refund_id', $id)->update('shop_order_refund_return');
                $return_log = array('return_id' => $id, 'guide_id' => $_SESSION['shop_admin_id'], 'action_type' => 3, 'content' => '拒绝理由:' . $_POST['reason'], 'add_time' => time(), 'type' => 2);
                $this->db->insert('shop_order_return_log', $return_log);//写退货日志
                $frist = '您的退款申请已被拒绝';
                $end = '拒绝理由：' . $_POST['reason'] . ',如有问题可直接咨询店铺导购！';
                $url_turn = "vmall.php/order/applyReturnMoney_result?refund_id=" . $id;
                $this->weixin_return_money($id, $frist, $end, $url_turn); //发送微信通知
                $res = array('state' => true, 'msg' => '');
            } elseif ($_POST['tag'] == 'gr') {    //不同意退货
                $this->db->set(['seller_state' => 3, 'refund_state' => 3, 'admin_time' => time()])->where('refund_id', $id)->update('shop_order_refund_return');
                $return_log = array('return_id' => $id, 'guide_id' => $_SESSION['shop_admin_id'], 'action_type' => 3, 'content' => '拒绝理由:' . $_POST['reason'], 'add_time' => time(), 'type' => 2);
                $this->db->insert('shop_order_return_log', $return_log);//写退货日志
                $frist = '您的退货申请已被拒绝';
                $end = '拒绝理由：' . $_POST['reason'] . ',如有问题可直接咨询店铺导购！';
                $url_turn = 'vmall.php/order/applyReturnMoney_result?refund_id=' . $id;
                $this->weixin_return_goods($id, $frist, $end, $url_turn);  //发送微信通知
                $res = array('state' => true, 'msg' => '');
            } elseif ($_POST['tag'] == 'r') {     //未收到货拒绝退款
                $return_log = array('return_id' => $id, 'guide_id' => $_SESSION['shop_admin_id'], 'action_type' => 3, 'content' => '拒绝理由:' . $_POST['reason'], 'add_time' => time(), 'type' => 7);
                $this->db->insert('shop_order_return_log', $return_log);//写退货日志
                $this->db->set(['express_id' => '', 'invoice_no' => ''])->where('refund_id', $id)->update('shop_order_refund_return');
                $frist = '您的退款处理已被拒绝';
                $end = '拒绝理由：' . $_POST['reason'] . ',如有问题可直接咨询店铺导购！';
                $url_turn = "vmall.php/order/applyReturnMoney_result?refund_id=" . $id;
                $this->weixin_return_money($id, $frist, $end, $url_turn); //发送微信通知
                $res = array('state' => true, 'msg' => '');
            } elseif ($_POST['tag'] == 'ma' || $_POST['tag'] == 'a') {     //同意退款 || 收到货同意退款
                $returns = $this->db->select('store_id,refund_amount_apply,refund_type,order_sn,reason_info,seller_state')->where('refund_id', $id)->where('seller_state!=', 3)->where('refund_state!=', 3)->get('shop_order_refund_return')->row_array();
                if (!empty($returns)) {
                    $order_info = $this->db->select('order_status,buyer_id,pay_sn')->where('order_sn', $returns['order_sn'])->get('shop_order')->row_array();
                    $store_in = $this->db->select('asset_out')->where('pay_sn', $order_info['pay_sn'])->where('store_id', $returns['store_id'])->where('log_type', 3)->get('store_asset_log')->row('asset_in');  //门店订单收入
                    if (!empty($store_in)) {   //判断此订单门店是否已进账，是就扣除
                        $balance_store = $this->db->select('balance')->where('store_id', $returns['store_id'])->get('store')->row('balance');
                        $cc = $this->db->select('asset_out')->where('pay_sn', $order_info['pay_sn'])->where('store_id', $returns['store_id'])->where('log_type', 5)->get('store_asset_log')->row('asset_out');  //平台抽成
                        $fl = $this->db->select('asset_in')->where('pay_sn', $order_info['pay_sn'])->where('store_id', $returns['store_id'])->where('log_type', 6)->get('store_asset_log')->row('asset_in');  //平台返利
                        $balance_store = empty($balance_store) ? 0 : $balance_store;
                        $cc = empty($cc) ? 0 : $cc;
                        $fl = empty($fl) ? 0 : $fl;
                        $asset_out = $returns['refund_amount_apply'] - $cc + $fl;
                        $asset = $balance_store - $asset_out;
                        $store_log = array('store_id' => $returns['store_id'], 'pay_sn' => $order_info['pay_sn'], 'log_type' => 3, 'asset_in' => 0, 'asset_out' => $asset_out,
                            'asset' => $asset, 'note' => "订单号" . $returns['order_sn'] . "退款支出" . $asset_out, 'time' => time());
                        $frist = '卖家已收到您的退货,退款金额已退到账户余额';
                    } else {
                        $frist = '您的退款申请已被同意';
                    }
                    if ($_POST['tag'] == 'ma') {
                        $refund_log = array('return_id' => $id, 'guide_id' => $_SESSION['shop_admin_id'], 'action_type' => 3, 'content' => '', 'add_time' => time(), 'type' => 3);
                        $this->db->insert('shop_order_return_log', $refund_log);//写退货日志
                    } else {
                        $refund_log = array('return_id' => $id, 'guide_id' => $_SESSION['shop_admin_id'], 'action_type' => 3, 'content' => '', 'add_time' => time(), 'type' => 6);
                        $this->db->insert('shop_order_return_log', $refund_log);//写退货日志
                    }
                    $balance = $this->db->select('balance')->where('user_id', $order_info['buyer_id'])->get('user')->row_array();
                    $balance['balance'] = empty($balance['balance']) ? 0 : $balance['balance'];
                    $now_balance = $balance['balance'] + $returns['refund_amount_apply'];
                    $user_log = array('user_id' => $order_info['buyer_id'], 'pay_sn' => $order_info['pay_sn'], 'log_type' => 4, 'asset_out' => 0, 'asset_in' => $returns['refund_amount_apply'],
                        'asset' => $now_balance, 'note' => '订单' . $returns['order_sn'] . '退款' . $returns['refund_amount_apply'], 'time' => time());
                    $this->db->trans_off(); //禁用事务
                    $this->db->trans_start(); //开启事务
                    $this->db->set(['seller_state' => 2, 'refund_state' => 3, 'admin_time' => time(), 'refund_amount' => $returns['refund_amount_apply']])->where('refund_id', $id)->update('shop_order_refund_return');
                    $this->db->insert('user_asset_log', $user_log);
                    $this->db->set('balance', $now_balance)->where('user_id', $order_info['buyer_id'])->update('user');
                    if (isset($store_log)) {
                        $this->db->insert('store_asset_log', $store_log);
                        $this->db->set('balance', $asset)->where('store_id', $returns['store_id'])->update('store');
                    }
                    $this->db->trans_complete(); //事务完成
                    $this->db->trans_off(); //禁用事务
                    if ($this->db->trans_status() !== false) {
                        $return_log = array('return_id' => $id, 'guide_id' => 0, 'action_type' => 0, 'add_time' => time(), 'type' => 10, 'content' => '');
                        $this->db->insert('shop_order_return_log', $return_log);//写退货日志
                        $end = '您的退款金额已退到您的账户余额,如有问题及时联系导购';
                        $url_turn = "vmall.php/money/index";
                        $this->weixin_return_money($id, $frist, $end, $url_turn);//发送微信通知
                        $res = array('state' => true, 'msg' => '');
                    } else {
                        $res = array('state' => false, 'msg' => '资金退还失败');
                    }
                }
            } else {
                $res = array('state' => false, 'msg' => '系统错误,请稍后再试');
            }
        }
        echo json_encode($res);
        exit();
    }

    /*发送微信退货通知*/
    private function weixin_return_goods($id, $frist, $end, $url_turn)
    {
        //发送微信通知
        $temp = $this->common_function->get_weixin_temp_value('RETURN');
        $return = $this->db->select('order_sn,buyer_id,refund_amount_apply')->where('refund_id', $id)->get('shop_order_refund_return')->row_array();
        $user = $this->db->select('user_id,goods_name')->where('order_sn', $return['order_sn'])->get('shop_order_goods')->row_array();
        $openid = $this->db->select('wx_openid,user_name')->where('user_id', $return['buyer_id'])->get('user')->row_array();

        $url = PLUGIN . 'vmall.php/receive/weixin_send_msg';
        $r = array(
            "first" => array("value" => "{$frist}" . "\n",
                "color" => "#173177"
            ),
            "keyword1" => array("value" => "{$return['order_sn']}",
                "color" => "#173177"
            ),
            "keyword2" => array("value" => "{$user['goods_name']}",
                "color" => "#173177"
            ),
            "keyword3" => array("value" => "{$return['refund_amount_apply']}" . "元" . "\n",
                "color" => "#173177"
            ),
            "remark" => array("value" => "{$end}",
                "color" => "#173177"
            )
        );
        $data = array(
            "touser" => "{$openid['wx_openid']}",
            "template_id" => "{$temp['template_id']}",
            "url" => PLUGIN . $url_turn,
            "topcolor" => "#173177",
            "data" => json_encode($r)
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($output, true);
        $result = object_array(json_decode($result, true));
        if ($result['errmsg'] == 'ok') {
            $data1 = array(
                'wnl_title' => $temp['template_title'],
                'wnl_code' => 'RETURN',
                'wnl_content' => json_encode($r),
                'wnl_type' => 1,
                'wnl_time' => time(),
                'wnl_to_usersn' => $openid['user_name'],
                'user_id' => $return['buyer_id'],
                'order_sn' => $return['order_sn']
            );
            $this->db->insert('weixin_notify_log', $data1);
        }
    }

    /*发送微信退款通知*/
    private function weixin_return_money($returnid, $frist, $end, $url_turn)
    {
        //发送微信通知
        $temp = $this->common_function->get_weixin_temp_value('TKTZ');
        $return = $this->db->select('order_sn,buyer_id,refund_amount_apply,reason_info')->where('refund_id', $returnid)->get('shop_order_refund_return')->row_array();
        $openid = $this->db->select('wx_openid,user_name')->where('user_id', $return['buyer_id'])->get('user')->row_array();

        $url = PLUGIN . 'vmall.php/receive/weixin_send_msg';
        $r = array(
            "first" => array("value" => "{$frist}",
                "color" => "#173177"
            ),
            "reason" => array("value" => "{$return['reason_info']}",
                "color" => "#173177"
            ),
            "refund" => array("value" => "{$return['refund_amount_apply']}" . "元" . "\n",
                "color" => "#173177"
            ),
            "remark" => array("value" => "{$end}",
                "color" => "#173177"
            )
        );
        $data = array(
            "touser" => "{$openid['wx_openid']}",
            "template_id" => "{$temp['template_id']}",
            "url" => PLUGIN . $url_turn,
            "topcolor" => "#173177",
            "data" => json_encode($r)
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($output, true);
        $result = object_array(json_decode($result, true));
        if ($result['errmsg'] == 'ok') {
            $data1 = array(
                'wnl_title' => $temp['template_title'],
                'wnl_code' => 'TKTZ',
                'wnl_content' => json_encode($r),
                'wnl_type' => 1,
                'wnl_time' => time(),
                'wnl_to_usersn' => $openid['user_name'],
                'user_id' => $return['buyer_id'],
                'order_sn' => $return['order_sn']
            );
            $this->db->insert('weixin_notify_log', $data1);
        }
    }



    /*退款管理——处理*/
    /*public function business_refund_do($id){
        $this->common_function->shop_admin_priv("return_manage");//权限
        $this->db->where('refund_id',$id);
        $data = $this->db->get('shop_refund_return')->row_array();
        $this->db->select("payment_code,order_amount");
        $this->db->where('order_sn',$data['order_sn']);
        $data['order_info'] = $this->db->get('order')->row_array();
        $data['add_time'] = !empty($row['add_time']) ? date('Y/m/d H:i:s',$row['add_time']) : 0;
        $data['seller_time'] = !empty($row['seller_time']) ? date('Y/m/d H:i:s',$row['seller_time']) : 0;
        $data['admin_time'] = !empty($row['admin_time']) ? date('Y/m/d H:i:s',$row['admin_time']) : 0;
        $data['admin_time'] = !empty($row['admin_time']) ? date('Y/m/d H:i:s',$row['admin_time']) : '未发货';
        $data['seller_state'] = ($data['seller_state'] == 2) ? '同意' : (($data['seller_state'] == 3) ? '不同意' : '待审核');
        $this->smarty->assign('data',$data);
        $this->smarty->display ( 'business_refund_do.html' );
    }
    public function refund_deel() {
        $this->common_function->shop_admin_priv("return_manage");//权限
        $data = $this->input->post();
        if($this->db->update('shop_refund_return',['refund_state'=>3,'admin_time'=>time(),'admin_message'=>$data['admin_message']],['refund_id'=>$data['refund_id']])){
            echo json_encode(['state'=>true,'msg'=>'操作成功']);
        }else{
            echo json_encode(['state'=>false,'msg'=>'操作失败']);
        }
    }*/
    /*退款管理——所有记录*/
    /*public function business_refund_all(){
        $this->common_function->shop_admin_priv("return_manage");//权限
        $this->smarty->display ( 'business_refund_all.html' );
    }
    public function refund_all_list() {
        $this->common_function->shop_admin_priv("return_manage");//权限
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = ' return_type = 1';
        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }
        $total = $this->common_function->total('shop_refund_return', $where);
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('shop_refund_return', $where);

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
            $xml .= "<row id='".$row['refund_id']."'>";
            if($row['seller_state'] != 1 && $row['refund_state'] == 1){
                $xml .= "<cell><![CDATA[<a class='btn green' href='business_refund_do/{$row['refund_id']}'>处理</a>]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[<a class='btn green' href='business_return_goods_see/{$row['refund_id']}'>查看</a>]]></cell>";
            }
            $xml .= "<cell><![CDATA[".$row['refund_sn']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['refund_amount']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['pic_info']."]]></cell>";
            $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['buyer_message']}')>".$row['buyer_message']."</a>]]></cell>";
            $row['add_time'] = !empty($row['add_time']) ? date('Y/m/d H:i:s',$row['add_time']) : 0;
            $xml .= "<cell><![CDATA[".$row['add_time']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['goods_name']."]]></cell>";
            $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['seller_message']}')>".$row['seller_message']."</a>]]></cell>";
            $row['add_time'] = !empty($row['seller_time']) ? date('Y/m/d H:i:s',$row['seller_time']) : 0;
            $xml .= "<cell><![CDATA[".$row['seller_time']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['goods_image']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['goods_id']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['order_sn']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['buyer_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['buyer_id']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['store_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['store_id']."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }*/
    /*退款管理——退款退货原因*/
    /*public function business_refund_reason(){
        $this->common_function->shop_admin_priv("return_manage");//权限
        $this->smarty->display ( 'business_refund_reason.html' );
    }
    public function refund_reason_list() {
        $this->common_function->shop_admin_priv("return_manage");//权限
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = ' 1';
        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }
        $total = $this->common_function->total('shop_refund_reason', $where);
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('shop_refund_reason', $where);

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
            $xml .= "<row id='".$row['reason_id']."'>";
            $xml .= "<cell><![CDATA[<a class='btn red' href='javascript:del_this({$row['reason_id']})'>删除</a>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['sort']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['reason_info']."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }*/
    /*退款管理——退货原因新增编辑*/
    /*public function business_refund_reason_ae(){
        $this->common_function->shop_admin_priv("return_manage");//权限
        if($this->input->is_ajax_request()){
            $data = $this->input->post();
            $data['update_time'] = time();
            if($this->db->insert('shop_refund_reason',$data)){
                echo json_encode('新增数据成功');
                exit;
            }else{
                echo json_encode('新增数据失败');
                exit;
            }
        }else{
            $this->smarty->display ( 'business_refund_reason_ae.html' );
        }
    }
    public function refund_reason_del(){
        $this->common_function->shop_admin_priv("return_manage");//权限
        $id = $this->input->post('id');
        if($this->db->delete('shop_refund_reason',array('reason_id'=>$id))){
            echo json_encode('删除数据成功');
            exit;
        }else{
            echo json_encode('删除数据失败');
            exit;
        }
    }*/
    /*退货管理——待处理*/
    /*public function business_return_goods_pending(){
        $this->common_function->shop_admin_priv("cancel_product");//权限
        $this->smarty->display ( 'business_return_goods_pending.html' );
    }
    public function refund_goods_list() {
        $this->common_function->shop_admin_priv("cancel_product");//权限
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = ' return_type = 2';
        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }
        $total = $this->common_function->total('shop_refund_return', $where);
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('shop_refund_return', $where);

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
            $xml .= "<row id='".$row['refund_id']."'>";
            if($row['seller_state'] != 1 && $row['refund_state'] == 1){
                $xml .= "<cell><![CDATA[<a class='btn green' href='business_refund_do/{$row['refund_id']}'>处理</a>]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[<a class='btn green' href='business_return_goods_see/{$row['refund_id']}'>查看</a>]]></cell>";
            }
            $xml .= "<cell><![CDATA[".$row['refund_sn']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['refund_amount']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['pic_info']."]]></cell>";
            $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['buyer_message']}')>".$row['buyer_message']."</a>]]></cell>";
            $row['add_time'] = !empty($row['add_time']) ? date('Y/m/d H:i:s',$row['add_time']) : 0;
            $xml .= "<cell><![CDATA[".$row['add_time']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['goods_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['goods_num']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['seller_state']==2?'同意':($row['seller_state']==3?'不同意':'待审核')."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['refund_state']==2?'待管理员处理':($row['refund_state']==3?'已完成':'处理中')."]]></cell>";
            $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['seller_message']}')>".$row['seller_message']."</a>]]></cell>";
            $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['admin_message']}')>".$row['admin_message']."</a>]]></cell>";
            $row['add_time'] = !empty($row['seller_time']) ? date('Y/m/d H:i:s',$row['seller_time']) : 0;
            $xml .= "<cell><![CDATA[".$row['seller_time']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['goods_image']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['goods_id']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['order_sn']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['buyer_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['buyer_id']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['store_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['store_id']."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }*/
    /*退货管理——所有记录*/
    /* public function business_return_goods_all(){
         $this->common_function->shop_admin_priv("cancel_product");//权限
             $this->smarty->display ( 'business_return_goods_all.html' );
     }
     public function refund_goods_witting() {
         $this->common_function->shop_admin_priv("return_manage");//权限
         $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
         $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
         $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
         $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
         $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
         $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
         $where = ' return_type = 2';
         $where .= " and refund_state = 1";
         if ($query && $qtype){
             $where .= " and {$qtype} like '%{$query}%'";
         }
         $total = $this->common_function->total('shop_refund_return', $where);
         if ($sortname && $sortorder){
             $where .= " order by {$sortname} {$sortorder}";
         }
         $start = $rp * ($page - 1);
         $where .= " limit $start, $rp";
         $rows = $this->common_function->get_rows('shop_refund_return', $where);

         header("Content-type: text/xml");
         $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
         $xml .= "<rows>";
         $xml .= "<page>$page</page>";
         $xml .= "<total>$total</total>";
         foreach($rows AS $row){
             $xml .= "<row id='".$row['refund_id']."'>";
             $xml .= "<cell><![CDATA[<a class='btn green' href='business_refund_do/{$row['refund_id']}'>处理</a>]]></cell>";
             $xml .= "<cell><![CDATA[".$row['refund_sn']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['refund_amount']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['pic_info']."]]></cell>";
             $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['buyer_message']}')>".$row['buyer_message']."</a>]]></cell>";
             $row['add_time'] = !empty($row['add_time']) ? date('Y/m/d H:i:s',$row['add_time']) : 0;
             $xml .= "<cell><![CDATA[".$row['add_time']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['goods_name']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['goods_num']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['seller_state']==2?'同意':($row['seller_state']==3?'不同意':'待审核')."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['refund_state']==2?'待管理员处理':($row['refund_state']==3?'已完成':'处理中')."]]></cell>";
             $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['seller_message']}')>".$row['seller_message']."</a>]]></cell>";
             $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['admin_message']}')>".$row['admin_message']."</a>]]></cell>";
             $row['add_time'] = !empty($row['seller_time']) ? date('Y/m/d H:i:s',$row['seller_time']) : 0;
             $xml .= "<cell><![CDATA[".$row['seller_time']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['goods_image']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['goods_id']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['order_sn']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['buyer_name']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['buyer_id']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['store_name']."]]></cell>";
             $xml .= "<cell><![CDATA[".$row['store_id']."]]></cell>";
             $xml .= "</row>";
         }
         $xml .= "</rows>";
         echo $xml;
     }*/
    /*退货管理——所有记录——查看*/
    /*public function business_return_goods_see($refund_id){
        $this->common_function->shop_admin_priv("cancel_product");//权限
        $row = $this->db->select("s.*,o.pay_sn,o.payment_code,o.pd_amount,o.rcb_amount")
                ->from('shop_refund_return as s')
                ->join('order as o','s.order_sn = o.order_sn')
                ->where('s.refund_id',$refund_id)
                ->get()->row_array();
        $this->smarty->assign('row',$row);
        $this->smarty->display ( 'business_return_goods_see.html' );
    }*/
    /*咨询管理*/
    public function business_consultation()
    {
        $this->smarty->display('business_consultation.html');
    }

    public function consultation_list()
    {
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = ' 1';
        if ($query && $qtype) {
            $where .= " and {$qtype} like '%{$query}%'";
        }
        $total = $this->common_function->total('shop_consult', $where);
        if ($sortname && $sortorder) {
            $where .= " order by {$sortname} {$sortorder}";
        }
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('shop_consult', $where);

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach ($rows AS $row) {
            $xml .= "<row id='" . $row['consult_id'] . "'>";
            $xml .= "<cell><![CDATA[<a class='btn red' href='javascript:del_this({$row['consult_id']})'>删除</a>]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['goods_name'] . "]]></cell>";
            $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['consult_content']}')>" . $row['consult_content'] . "</a>]]></cell>";
            $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['consult_reply']}')>" . $row['consult_reply'] . "</a>]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['goods_id'] . "]]></cell>";
            $row['consult_addtime'] = !empty($row['consult_addtime']) ? date('Y/m/d H:i:s', $row['consult_addtime']) : 0;
            $xml .= "<cell><![CDATA[" . $row['consult_addtime'] . "]]></cell>";
            $row['consult_reply_time'] = !empty($row['consult_reply_time']) ? date('Y/m/d H:i:s', $row['consult_reply_time']) : 0;
            $xml .= "<cell><![CDATA[" . $row['consult_reply_time'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['member_id'] . "]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }

    public function consultation_del()
    {
        $ids = $this->input->post('id');
        $ids = explode(',', $ids);
        $this->db->trans_start();
        foreach ($ids as $id) {
            $this->db->delete('shop_consult', array('consult_id' => $id));
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode('删除数据失败');
        } else {
            echo json_encode('删除数据成功');
        }
        $this->db->trans_off();
    }

    /*咨询管理——类型设置*/
    public function business_consultation_typeset()
    {
        $this->smarty->display('business_consultation_typeset.html');
    }

    public function consultation_typeset_list()
    {
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = ' 1';
        if ($query && $qtype) {
            $where .= " and {$qtype} like '%{$query}%'";
        }
        $total = $this->common_function->total('shop_consult_type', $where);
        if ($sortname && $sortorder) {
            $where .= " order by {$sortname} {$sortorder}";
        }
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('shop_consult_type', $where);

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach ($rows AS $row) {
            $xml .= "<row id='" . $row['ct_id'] . "'>";
            $xml .= "<cell><![CDATA[<a class='btn red' href='javascript:del_this({$row['ct_id']})'>删除</a><a class='btn red' href='javascript:edit_this({$row['ct_id']})'>编辑</a>]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['ct_sort'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['ct_name'] . "]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }

    public function consultation_typeset_del()
    {
        $id = $this->input->post('id');
        if ($this->db->delete('shop_consult_type', array('ct_id' => $id))) {
            echo json_encode('删除数据成功');
        } else {
            echo json_encode('删除数据失败');
        }
    }

    /*咨询管理——类型设置*/
    public function business_consultation_typeset_ae()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();
            if ($this->db->insert('shop_consult_type', $data)) {
                echo json_encode('新增数据成功');
                exit;
            } else {
                echo json_encode('新增数据失败');
                exit;
            }
        } else {
            $this->smarty->display('business_consultation_typeset_ae.html');
        }
    }

    /*咨询管理——头部文字设置*/
    public function business_consultation_headset()
    {
        $content = $this->db->select('value')->where('code', 'consultation_header')->get('system_config')->row('value');
        $this->smarty->assign('content', $content);
        $this->smarty->display('business_consultation_headset.html');
    }

    public function consultation_header_edit()
    {
        $content = $this->input->post('content');
        if ($this->db->update('system_config', array('value' => $content), array('code' => 'consultation_header'))) {
            echo json_encode('修改成功');
            exit;
        } else {
            echo json_encode('修改失败');
            exit;
        }
    }

    /*评价管理——来自买家的评价*/
    public function business_evaluate_buyers()
    {
        $this->smarty->display('business_evaluate_buyers.html');
    }

    public function evaluate_buyers_list()
    {
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = ' 1';
        if ($query && $qtype) {
            $where .= " and {$qtype} like '%{$query}%'";
        }
        $total = $this->common_function->total('shop_evaluate_goods', $where);
//        $total = $this->db->from('shop_evaluate_goods')->where($where)->get()->num_rows();
        if ($sortname && $sortorder) {
            $where .= " order by {$sortname} {$sortorder}";
        }
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('shop_evaluate_goods', $where);

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach ($rows AS $row) {
            $xml .= "<row id='" . $row['geval_id'] . "'>";
            $xml .= "<cell><![CDATA[<a class='btn red' href='javascript:del_this({$row['geval_id']})'>删除</a>]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['geval_frommembername'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['geval_scores'] . "]]></cell>";
            $xml .= "<cell><![CDATA[<a onclick=show_msg('{$row['geval_content']}')>" . $row['geval_content'] . "</a>]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['geval_image'] . "]]></cell>";
            $row['geval_addtime'] = !empty($row['geval_addtime']) ? date('Y/m/d H:i:s', $row['geval_addtime']) : 0;
            $xml .= "<cell><![CDATA[" . $row['geval_addtime'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['geval_goodsid'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['geval_storename'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['geval_orderno'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['geval_frommemberid'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['geval_storeid'] . "]]></cell>";
//                $xml .= "<cell><![CDATA[".$row['geval_content_again']."]]></cell>";
//                $xml .= "<cell><![CDATA[".$row['geval_image_again']."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }

    public function evaluate_buyers_del()
    {
        $ids = $this->input->post('id');
        $imgs = $this->db->select("geval_goodsimage,geval_image")->where("geval_id in({$ids})")->get('shop_evaluate_goods')->result_array();
        $ids = explode(',', $ids);
        $this->db->trans_start();
        foreach ($ids as $id) {
            $this->db->delete('shop_evaluate_goods', array('geval_id' => $id));
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode('删除数据失败');
        } else {
            foreach ($imgs as $img) {
                @unlink($img['geval_goodsimage']);
                @unlink($img['geval_image']);
            }
            echo json_encode('删除数据成功');
        }
        $this->db->trans_off();
    }

    /*评价管理——来自买家的评价*/
    public function business_evaluate_shop()
    {
        $this->smarty->display('business_evaluate_shop.html');
    }

    /*订单导出*/
    public function orderOp()
    {

     // print_r($id_str);die;
       // $where = ' o.buyer_id= ' . $_SESSION['shop_spg_store_id'];

$where="";
        if (!empty($_POST['id'])) {
            $id_str = $_POST['id'];

            $where .= "  o.order_sn in ($id_str)";
        }
        else {
            $where = "2=2";
//print_r($_GET['stocks_sn']);die;
            if (!empty($_GET['startime'])) {
                $where .= " AND o.created_time>= " . strtotime($_GET['startime']);
            }
            if (!empty($_GET['endtime'])) {
                $where .= " AND o.created_time<= " . strtotime($_GET['endtime']);
            }
            if ($_GET['order_type'] != '') {
                $where .= " AND o.order_type= " . $_GET['order_type'];
            }
            if ($_GET['order_status'] != '') {
                $where .= " AND o.order_status= " . $_GET['order_status'];
            }
            if ($_GET['evaluation_state'] != '') {
                $where .= " AND o.evaluation_state= " . $_GET['evaluation_state'];
            }
            if ($_GET['shipping_type'] != '') {
                $where .= " AND o.shipping_type = " . $_GET['shipping_type'];}
            if ($_GET['order_sn'] != '') {
                $where .= " AND o.order_sn = " . $_GET['order_sn'];
            }
            if ($_GET['order_from'] != '') {
                $where .= " AND o.order_from = " . $_GET['order_from'];
            }
            if (!empty($_GET['pay_sn'])) {
                $where .= " AND o.pay_sn like '%{$_GET['pay_sn']}%'";
            }
            if (!empty($_GET['stock_name'])) {
                $where .= " AND og.stock_name like '%{$_GET['stock_name']}%'";
            }
            if (!empty($_GET['waybill_sn'])) {
                $where .= " AND o.waybill_sn like '%{$_GET['waybill_sn']}%'";
            }
            if(!empty($_GET['stock_code'])){
                $where .= " AND og.stock_code like '%{$_GET['stock_code']}%'";
            }
            if(!empty($_GET['goods_name'])){
                $where .= " AND og.goods_name  like '%{$_GET['goods_name']}%'";
            }
            if(!empty($_GET['goods_id'])){
                $where .= " AND og.goods_id  like '%{$_GET['goods_id']}%'";
            }
           if(!empty($_GET['buyer'])){
                $where .= " AND (u.user_name  like '%{$_GET['buyer']}%' or o.receive_name  like '%{$_GET['buyer']}%')";
            }
            if(!empty($_GET['buyer_tel'])){
                $where .= " AND (u.tel  like '%{$_GET['buyer_tel']}%' or s.ous_tel  like '%{$_GET['buyer_tel']}%')";
            }

           if(!empty($_GET['store_name'])){
                $where .= " AND o.store_name like'%{$_GET['store_name']}%'";
            }




        }

            $rows = $this->db->select("o.order_sn,o.order_from,o.waybill_sn,o.logistics_company_name,o.create_express,o.receive_postcode,o.receive_tel,
					o.receive_mobile,o.pay_time,o.store_name,o.spg_name,o.receive_address,o.receive_area,o.receive_city,o.receive_province,o.receive_name,o.carriage,
					o.create_carriage,o.buyer_memo,o.seller_note,o.buyer_message,o.created_time,o.modify_time,o.goods_price,o.order_type,
					o.goods_num,o.order_price,o.shipping_type,o.buyer_id,o.store_id,o.order_status,og.rec_id,og.goods_id,og.goods_name,og.goods_num,og.goods_color
					,og.goods_color_remark,og.goods_size,og.goods_pay_price,og.stock_code,og.sotck_barcode,g.goods_spu,g.brand_name,
				s.store_name as u_store_name,u.user_name as u_user_name,s.ous_tel as u_ous_tel,u.tel as u_tel,a.area_name,b.area_name as city_name,
				c.area_name as province_name,e.e_name")
                ->from('shop_order o')
                ->join('shop_order_goods og', 'og.order_sn=o.order_sn')
                ->join('express e', 'e.e_code=o.create_express', 'left')
                ->join('area a', 'a.area_id=o.receive_area', 'left')
                ->join('area b', 'b.area_id=o.receive_city', 'left')
                ->join('area c', 'c.area_id=o.receive_province', 'left')
                ->join('shop_goods g', 'g.goods_id=og.goods_id', 'left')
                ->join('store s', 's.store_id=o.buyer_id and o.order_type=3', 'left')
                ->join('user u', 'u.user_id=o.buyer_id and o.order_type IN (2,4)', 'left')
                ->where($where)
                ->get()->result_array();
           //print_r($_GET['buyer']);die;
           // print_r($this->db->last_query());die;
            if (isset($_GET['op']) && $_GET['op'] == 'export') {
                $this->common_function->shop_admin_priv("order_manage");//权限
                $time = date('YmdHis');
                $filename = 'orders_list_' . $time;
                $dlname = $time . '订单列表';
                $file_path = ROOTPATH . 'data/excel_download/' . $filename . '.csv';
                $excel_titel = array(chr(0xef) . chr(0xbb) . chr(0xbf) . '订单编号', '订单状态', '商品名称', '款号', '货号', '主色', '颜色', '尺码', '条码', '消费金额', '数量', '买家', '买家联系电话', '收货人地址', '发货物流', '客户备注', '付款时间','导购名称');
                $fp = @fopen($file_path, 'a');
                @fputcsv($fp, $excel_titel);
                foreach ($rows as $v) {
                    $excel = array();
                    $order_type = $this->business_model->order_status($v['shipping_type']);
                    $excel['order_sn'] = "'" . strval($v['order_sn']);
                    $excel['order_status'] = $order_type[$v['order_status']];
                    $excel['goods_name'] = $v['goods_name'];
                    $excel['goods_spu'] = $v['goods_spu'];
                    $excel['stocks_sn'] = $v['stock_code'];
                    $excel['goods_color'] = $v['goods_color'];
                    $excel['goods_color_remark'] = $v['goods_color_remark'];
                    $excel['goods_size'] = $v['goods_size'];
                    $excel['sotck_barcode'] = $v['sotck_barcode'];
                    $excel['goods_pay_price'] = $v['goods_pay_price'];
                    $excel['goods_num'] = $v['goods_num'];
                    $excel['buyer_name'] = ($v['order_type'] == 3) ? $v['u_store_name'] : $v['u_user_name'];
                    $excel['buyer_tel'] = ($v['order_type'] == 3) ? $v['u_ous_tel'] : $v['u_tel'];
                    $excel['reciver_address'] = $v['receive_name'] . '，' . strval($v['receive_mobile']) . '，' . strval($v['receive_tel']) . '，' . $v['province_name'] . '，' . $v['city_name'] . '，' . $v['area_name'] . '，' . $v['receive_address'] . '，' . $v['receive_postcode'];
                    $excel['e_name'] = $v['e_name'];
                    $excel['buyer_message'] = $v['buyer_message'];
                    $excel['pay_time'] = $v['pay_time'];
                    $excel['spg_name'] = $v['spg_name'];
                    @fputcsv($fp, $excel);
                }
                $download_path = str_replace('\\', '/', trim(base_url() . 'data/excel_download/' . $filename . '.csv'));
                header("location:" . $download_path);
                //$this->common_function->insert_download($dlname, $download_path, time(), 2);
                exit;
            }


            }


}











