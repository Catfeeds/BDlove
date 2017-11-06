<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {

    /**
     * Index Page for this controller.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('stores_model');
        $this->load->model('goods_model');
    }
    public function PromotionCouponEdit() {

        $coupon_info = $_GET;
        //print_r($_GET);die;
        if(!empty($coupon_info)){
            if(isset($coupon_info['coupon_id']) && !empty($coupon_info['coupon_id'])){
                $coupon_info = $this->db->select('*')->from('shop_coupon')->where('coupon_id',$coupon_info['coupon_id'])->get()->row_array();
                $coupon_info['coupon_start_time'] = date("Y-m-d H:i:s",$coupon_info['coupon_start_time']);
                $coupon_info['coupon_end_time'] = date("Y-m-d H:i:s",$coupon_info['coupon_end_time']);

                if($coupon_info['limit_goods_type']>0 && !empty($coupon_info['limit_goods'])){  //限制条件
                    $limit_arr = explode(',', $coupon_info['limit_goods']);
                    $limitResBox = [];
                    if($coupon_info['limit_goods_type']==1){
                        $limit_cate = $this->db->select('gc.gc_id,gc.gc_name,gc.gc_parent_id,gcc.gc_parent_id as parent_type,gcc.gc_name as parent_name')->from('shop_goods_class as gc')->join('shop_goods_class as gcc','gc.gc_parent_id=gcc.gc_id','left')->where_in('gc.gc_id',$limit_arr)->get()->result_array();
                        $limitResBox = [];
                        foreach($limit_cate as $k=>$v){
                            if($v['parent_type']>0){
                                $parent_info = $this->db->select('gc_id,gc_name,gc.gc_parent_id')->from('shop_goods_class gc')->where('gc.gc_id',$v['parent_type'])->get()->row_array();
                                if($parent_info['gc_parent_id']=='0'){
                                    $limit_cate[$k]['parent_type'] = 0;
                                    $limit_cate[$k]['parent_name'] = $parent_info['gc_name'];
                                }
                            }
                        }
                        foreach($limit_cate as $k=>$v){
                            $limitResBox[$v['parent_type']]['value'] = isset($limitResBox[$v['parent_type']]['value']) ? $limitResBox[$v['parent_type']]['value'] : '';
                            if($v['parent_type']==0){
                                $limitResBox[$v['parent_type']]['name'] = $v['parent_name'];
                                $limitResBox[$v['parent_type']]['value'] .= $v['gc_name'].'/';
                            }
                        }
                        $limitResBox_str = '';
                        foreach($limitResBox as $k=>$v){
                            $limitResBox_str .= '<div> <b>'.$v['name'].': </b>'.$v['value'].'</div>';
                        }
                        $coupon_info['limitResBox'] = $limitResBox_str;
                    }elseif ($coupon_info['limit_goods_type']==2) {
                        $limitResBox = $this->db->select('goods_id as id,goods_name as name')->from('shop_goods')->where_in('goods_id',$limit_arr)->get()->result_array();

                    }elseif ($coupon_info['limit_goods_type']==3) {
                        $limitResBox = $this->db->select('brand_id as id,brand_name as name')->from('shop_brand')->where_in('brand_id',$limit_arr)->get()->result_array();
                    }
                }
                if($coupon_info['limit_store_type']>0 && !empty($coupon_info['limit_store'])){  //限制门店
                    $limit_arr = explode(',', $coupon_info['limit_store']);
                    $LimitStoreResBox = $this->db->select('store_id as id,store_name as name')->from('store')->where_in('store_id',$limit_arr)->get()->result_array();
                }
                $this->smarty->assign('coupon_id',$coupon_info['coupon_id']);
            }else{
                $limitResBox = $coupon_info['limitResBox'];
                if(strpos($limitResBox, ';')!==false){
                    $limitResBox_arr = explode(';', rtrim($limitResBox,';'));
                    $limitResBox = [];
                    foreach ($limitResBox_arr as $k => $v) {
                        list($id,$name) = explode(':', $v);
                        $limitResBox[$k]['id'] = $id;
                        $limitResBox[$k]['name'] = $name;
                    }
                }
                $LimitStoreResBox = $coupon_info['LimitStoreResBox'];
                if(strpos($LimitStoreResBox, ';')!==false){
                    $LimitStoreResBox_arr = explode(';', rtrim($LimitStoreResBox,';'));
                    $LimitStoreResBox = [];
                    foreach ($LimitStoreResBox_arr as $k => $v) {
                        list($id,$name) = explode(':', $v);
                        $limitResBox[$k]['id'] = $id;
                        $limitResBox[$k]['name'] = $name;
                    }
                }
            }
            $LimitStoreResBox = isset($LimitStoreResBox)?$LimitStoreResBox:'';
            $limitResBox = isset($limitResBox)?$limitResBox:'';
            $this->smarty->assign('coupon_info',$coupon_info);
            $this->smarty->assign('LimitStoreResBox',$LimitStoreResBox);
            $this->smarty->assign('limitResBox',$limitResBox);
        }
        $this->smarty->display('promotion_coupon_edit.html');
    }

    /* 新会员送券 */

    public function couponOfNewman() {
        $this->common_function->shop_admin_priv("CouponOfNewman");//权限
        $op = isset($_GET['op'])?trim($_GET['op']):1;
        $this->smarty->assign('op',$op);
        $this->smarty->display('promotion_coupon_of_newman.html');


    }
    public function get_ready_stores_info(){
        $id = isset($_POST['id']) ? trim($_POST['id']) : '';
        if($id){
            $data = $this->db->select('store_name,store_id')->where("store_id IN ($id)")->get('store')->result_array();
            echo json_encode($data);exit;
        }else{
            echo json_encode('');exit;
        }
    }
    /* 新会员送券列表 */
    public function get_couponOfNewman() {
        $this->common_function->shop_admin_priv("CouponOfNewman");//权限
        $op = isset($_GET['op'])?$_GET['op']:'';
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;

        $start = ($page - 1) * $rp;
        $this->db->select('sca.*,sc.*');
        $this->db->from('shop_coupon_activity_new_user as sca');
        $this->db->join('shop_coupon as sc', 'sca.coupon_id = sc.coupon_id and sc.coupon_activity_type = 1 ', 'left');  //
        if ($op == 2) { //未开始
            $this->db->where('(sca.cpanu_start_time>' . time().' and cpanu_statu=1)');
        } elseif ($op == 3) {//已结束
            $this->db->where('(sca.cpanu_end_time<' . time().' or cpanu_statu=0)');
        } else { //进行中
            $this->db->where('(sca.cpanu_start_time<' . time().' and cpanu_statu=1)');
            $this->db->where('(sca.cpanu_end_time>' . time().' and cpanu_statu=1)');
        }
        //                if ($qtype && $query) {
        //                    if ($qtype == 'brand_id') {
        //                        $this->db->like('brand_id', $query);
        //                    } elseif ($qtype == 'brand_name') {
        //                        $this->db->like('brand_name', $query);
        //                    } elseif ($qtype == 'brand_initial') {
        //                        $this->db->like('brand_initial', $query);
        //                    }
        //                }
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
        $this->db->limit($rp, $start);
        $rows = $this->db->get()->result_array();

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        foreach ($rows as $row) {
            $coupon_mj=explode(',',$row['coupon_value']);
            $row['coupon_order_limit']=$coupon_mj[0];
            $row['coupon_value']=$coupon_mj[1];
            $get_num = $this->db->select('count(1)')->from('user_coupon')->where('coupon_activity_id',$row['cpanu_id'])->where('coupon_activity_type',1)->get()->row('count(1)');
            $xml .= "<row id='" . $row['cpanu_id'] . "'>";

            //操作
            $xml .= "<cell><![CDATA[
            <a class='btn red' onclick=fg_stop({$row['cpanu_id']})>
            <i class='fa fa-trash-o'></i>结束</a>
            <a class='btn green' onclick=fg_edit({$row['cpanu_id']})>
            <i class='fa fa-cog'></i>编辑</a>]]></cell>";

            $xml .= "<cell><![CDATA[" . date("Y-m-d h:i:s", $row['coupon_start_time']) . "<br>" . date("Y-m-d h:i:s", $row['coupon_end_time']) . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $get_num . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['coupon_name'] . "]]></cell>";
            $xml .= "<cell><![CDATA[满" . $row['coupon_order_limit'] . "元送" . $row['coupon_value'] . "元]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['cpanu_desc'] . "]]></cell>";
            $xml .= "<cell><![CDATA[<span title='" . $row['coupon_desc'] . "'>" . $row['coupon_desc'] . "</span>]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "<total>$total</total>";
        $xml .= "</rows>";
        echo $xml;
        exit;
    }
    /* 新会员送券编辑添加 */

    public function promotionCouponOfNewman_edit() {
        $this->common_function->shop_admin_priv("CouponOfNewman");//权限
        $id = isset($_GET['id'])?trim($_GET['id']):'';
        if($id){
            $cpanu = $this->db->select('*')->where('cpanu_id',$id)->get('shop_coupon_activity_new_user')->row_array();
            $coupon = $this->db->select('*')->where('coupon_id',$cpanu['coupon_id'])->get('shop_coupon')->row_array();
            $cpanu['cpanu_start_date'] = date('Y/m/d H:i:s',$cpanu['cpanu_start_time']);
            $cpanu['cpanu_end_date'] = date('Y/m/d H:i:s',$cpanu['cpanu_end_time']);
            $coupon['coupon_start_showdate'] = date('Y-m-d H:i:s',$coupon['coupon_start_time']);
            $coupon['coupon_end_showdate'] = date('Y-m-d H:i:s',$coupon['coupon_end_time']);
            $coupon['coupon_start_time'] = date('Y/m/d H:i:s',$coupon['coupon_start_time']);
            $coupon['coupon_end_time'] = date('Y/m/d H:i:s',$coupon['coupon_end_time']);
            $this->smarty->assign('cpanu',$cpanu);
            $this->smarty->assign('coupon',$coupon);
            $this->smarty->assign('coupon_js',json_encode($coupon));
        }else{
            $this->smarty->assign('coupon_js',json_encode(''));
        }

        $stores = $this->stores_model->get_stores();
        $this->smarty->assign('stores',$stores);
        $this->smarty->display('promotion_coupon_of_newman_edit.html');
    }
    /* 新会员送券编辑添加 */

    public function promotion_newman_edit() {
        $this->common_function->shop_admin_priv("CouponOfNewman");//权限

        //print_r($_GET);print_r($_POST);exit;
        $cpanu_id = isset($_POST['coupon_id']) ? trim($_POST['coupon_id']) : '';
        $data_active = array();$data_coupon = array();
        $data_active['cpanu_create_type'] = isset($_POST['coupon_create']) ? trim($_POST['coupon_create']) : '';
        $data_active['cpanu_limit_type'] = isset($_POST['coupon_create_type']) ? trim($_POST['coupon_create_type']) : '';
        $data_active['coupon_id'] = isset($_POST['couponId']) ? trim($_POST['couponId']) : '';
        $data_active['cpanu_start_time'] = isset($_POST['start_time']) ? trim($_POST['start_time']) : '';
        $data_active['cpanu_end_time'] = isset($_POST['end_time']) ? trim($_POST['end_time']) : '';
        $data_active['cpanu_limit_store'] = isset($_POST['limit_store_id']) ? trim($_POST['limit_store_id']) : '';
        $data_active['cpanu_limit_store_status'] = isset($_POST['coupon_to_store']) ? trim($_POST['coupon_to_store']) : '';
        $data_active['cpanu_desc'] = isset($_POST['statistics_code']) ? trim($_POST['statistics_code']) : '';
        $data_coupon = array();
        foreach ($_GET as $k=>$v){
            $data_coupon[$k] = trim($v);
        }
        $data_coupon['coupon_activity_type'] = 1;
        $data_active['cpanu_start_time'] = empty($data_active['cpanu_start_time'])?0:strtotime($data_active['cpanu_start_time']);
        $data_active['cpanu_end_time'] = empty($data_active['cpanu_end_time'])?0:strtotime($data_active['cpanu_end_time']);
        $data_coupon['coupon_start_time'] = empty($data_coupon['coupon_start_time'])?0:strtotime($data_coupon['coupon_start_time']);
        $data_coupon['coupon_end_time'] = empty($data_coupon['coupon_end_time'])?0:strtotime($data_coupon['coupon_end_time']);
        // EXCEL 文件上传
        //print_r($_FILES);exit;
        if (!empty ( $_FILES ['import_excel'] ['name'] )) {
            $tmp_file = $_FILES ['import_excel'] ['tmp_name'];
            $file_types = explode ( ".", $_FILES ['import_excel'] ['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];
            if (strtolower ( $file_type ) != "xlsx") {
                $this->common_function->show_message('请选择需要上传EXCEL文件！');
            }

            $savePath = ROOTPATH . 'data/excel/'; // 设置上传路径
            $str = date ( 'YmdHis' ) . uniqid (); // 以时间来命名上传的文件
            $file_name = $str . "." . $file_type; // 是否上传成功
            if (! copy ( $tmp_file, $savePath . $file_name )) {
                $this->common_function->show_message('EXCEL上传失败，请稍后重新上传');
            }
            set_time_limit(0);
            // 读取EXCEL文件
            include (ROOTPATH . 'libraries/PHPExcel/IOFactory.php');
            include (ROOTPATH . 'libraries/PHPExcel/Reader/Excel2007.php');
            $excelpath = $tmp_file;
            $objReader = PHPExcel_IOFactory::createReader ( 'Excel2007' );
            $objPHPExcel = $objReader->load ( $excelpath );
            $sheet = $objPHPExcel->getSheet ( 0 );
            $rows = $sheet->getHighestRow (); // 取得总行数
            $all_num = $rows;
            // 数据处理
            $datas = array ();
            $delete_row = array ();
            $excel = array ();
            $is_download = false;
            ob_clean();
            ob_start();
            $error_col = 'B';
            $time = time();
            for($i = 2; $i <= $rows; $i ++) {
                $coupon_code = $objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ();
                $coupon_code = trim($coupon_code);
                if (!empty( $coupon_code )) {
                    $excel[$i]['coupon_code'] = $coupon_code;
                }
            }
            @unlink($excelpath);
            //print_r($excel);exit;
        }


        if($cpanu_id){
            $flag = $this->db->update('shop_coupon_activity_new_user',$data_active,array('cpanu_id'=>$cpanu_id));
            if(isset($excel)&&!empty($excel)){
                foreach ($excel as $k=>$v){
                    $num = $this->db->select('count(1) as num')->where('coupon_activity_id',$cpanu_id)->where('coupon_activity_type',1)->
                    where('coupon_code',$v['coupon_code'])->get('user_coupon')->row('num');
                    if($num){
                        continue;
                    }else{
                        $data = array(
                            'coupon_activity_id'=>$cpanu_id,'coupon_activity_type'=>1,'coupon_code'=>$v['coupon_code'],
                        );
                        $this->db->insert('user_coupon',$data);
                    }
                }
            }
            if ($flag) {
                $links = array(
                    0 => array(
                        'text' => '优惠卷活动列表',
                        'href' => 'couponOfNewman'
                    ),
                    1 => array(
                        'text' => '返回',
                        'href' => 'javascript:history.go(-1)'
                    ),

                );
                $this->common_function->shop_admin_log('优惠卷'.$data_coupon['coupon_name'], 'edit', '新增会员优惠卷活动管理');
                $this->common_function->show_message('编辑成功',0 ,$links);
            }else{
                $this->common_function->show_message('编辑失败',0 ,$links);
            }
        }else{
            if(empty($data_coupon)){
                $this->common_function->show_message('优惠卷信息不能为空',0 ,$links);
            }
            $this->db->trans_start(); //开启事物
            $this->db->insert('shop_coupon',$data_coupon);
            //print_r($data_coupon);exit;
            $coupon_id = $this->db->insert_id();
            $data_active['coupon_id'] = $coupon_id;
            $this->db->insert('shop_coupon_activity_new_user',$data_active);
            $cpanu_id = $this->db->insert_id();
            $this->db->trans_complete(); //事物完成
            $this->db->trans_off(); //禁用事物
            if(isset($excel)&&!empty($excel)){
                foreach ($excel as $k=>$v){
                    $num = $this->db->select('count(1) as num')->where('coupon_activity_id',$cpanu_id)->where('coupon_activity_type',1)->
                    where('coupon_code',$v['coupon_code'])->get('user_coupon')->row('num');
                    if($num){
                        continue;
                    }else{
                        $data = array(
                            'coupon_activity_id'=>$cpanu_id,'coupon_activity_type'=>1,'coupon_code'=>$v['coupon_code'],
                        );
                        $this->db->insert('user_coupon',$data);
                    }
                }
            }

            $flag = true;
            if ($this->db->trans_status() === FALSE) {
                $flag = false;
            }
            if ($flag) {
                $links = array(
                    0 => array(
                        'text' => '优惠卷活动列表',
                        'href' => 'couponOfNewman'
                    ),
                    1 => array(
                        'text' => '返回',
                        'href' => 'javascript:history.go(-1)'
                    ),

                );
                $this->common_function->shop_admin_log('优惠卷'.$data_coupon['coupon_name'], 'add', '新增会员优惠卷活动管理');
                $this->common_function->show_message('新增成功',0 ,$links);
            }else{
                $this->common_function->show_message('新增失败',0 ,$links);
            }
        }
    }
    /* 删除新增会员送券活动 */

    public function del_promotionCouponOfNewman() {
        $this->common_function->shop_admin_priv("CouponOfNewman");//权限
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $result = array('state'=>false,'msg'=>'操作错误');
        if($id){
            $coupId = $this->db->select('coupon_id')->where("cpanu_id IN($id)")->get('shop_coupon_activity_new_user')->result_array();
            $coupId_str = array();
            foreach ($coupId as $v){
                $coupId_str[]=$v['coupon_id'];
            }
            if(!empty($coupId_str)){
                $coupId_str = join(',',$coupId_str);
                $re = $this->db->where("coupon_id IN($coupId_str)")->delete('shop_coupon');
                $re = $this->db->where("cpanu_id IN($id)")->delete('shop_coupon_activity_new_user');
            }else{
                $re = $this->db->where("cpanu_id IN($id)")->delete('shop_coupon_activity_new_user');
            }
            if($re){
                $result = array('state'=>false,'msg'=>'活动已结束');
            }else{
                $result = array('state'=>false,'msg'=>'活动结束失败');
            }
        }
        echo json_encode($result);exit;
    }
    /* 买后送券 */

    public function CouponOfShopping() {
        $this->common_function->shop_admin_priv("CouponOfShopping");//权限
        $type = isset($_GET['type']) ? $_GET['type'] : 1;
        if (isset($_GET['op']) && $_GET['op'] == 'get_list') {
            $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
            $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
            $query = isset($_POST['query']) ? $_POST['query'] : false;

            $start = ($page - 1) * $rp;
            $this->db->select('ss.cpaos_id,ss.cpaos_create_type,ss.cpaos_start_time,ss.cpaos_end_time,ss.cpaos_desc,ss.cpaos_amount_limit_st,ss.cpaos_amount,ss.cpaos_day_limit_st,ss.cpaos_day_amount,ss.cpapos_peru_limit_st,ss.cpapos_peru_amount,ss.limit_goods,ss.limit_stores,ss.limit_order_fee,sc.coupon_id,ss.coupon_id,sc.coupon_activity_type,sc.coupon_code,sc.coupon_name,sc.coupon_value');
            $this->db->from('shop_coupon_activity_of_shopping as ss');
            $this->db->join('shop_coupon as sc', 'ss.coupon_id = sc.coupon_id and sc.coupon_activity_type = 2 ', 'left');  //买后券
            if ($type == 2) { //未开始
                $this->db->where('(ss.cpaos_start_time>' . time().' and cpaos_statu=1)');
            } elseif ($type == 3) {//已结束
                $this->db->where('(ss.cpaos_end_time<' . time().' or cpaos_statu=0)' );
            } else { //进行中
                $this->db->where('(ss.cpaos_start_time<' . time().' and cpaos_statu=1)');
                $this->db->where('(ss.cpaos_end_time>' . time().' and cpaos_statu=1)');
            }
//                if ($qtype && $query) {
//                    if ($qtype == 'brand_id') {
//                        $this->db->like('brand_id', $query);
//                    } elseif ($qtype == 'brand_name') {
//                        $this->db->like('brand_name', $query);
//                    } elseif ($qtype == 'brand_initial') {
//                        $this->db->like('brand_initial', $query);
//                    }
//                }
            $db = clone($this->db);
            $total = $this->db->count_all_results();
            $this->db = $db;
            $this->db->limit($rp, $start);
            $rows = $this->db->get()->result_array();

            header("Content-type: text/xml");
            $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
            $xml .= "<rows>";
            $xml .= "<page>$page</page>";
            foreach ($rows as $row) {
                $cpaos_amount = $row['cpaos_amount_limit_st'] == 0 ? '不限' : $row['cpaos_amount'];
                $get_num = $this->db->select('count(1)')->from('user_coupon')->where('coupon_activity_id',$row['cpaos_id'])->where('coupon_activity_type',2)->get()->row('count(1)');
                $xml .= "<row id='" . $row['cpaos_id'] . "'>";

                //操作
                $xml .= "<cell><![CDATA[
                    <a class='btn red' onclick=fg_stop({$row['cpaos_id']})>
                    <i class='fa fa-trash-o'></i>结束</a>
                    <a class='btn green' onclick=fg_edit({$row['cpaos_id']})>
                    <i class='fa fa-cog'></i>编辑</a>]]></cell>";

                $xml .= "<cell><![CDATA[" . date("Y-m-d H:i:s", $row['cpaos_start_time']) . "<br>" . date("Y-m-d H:i:s", $row['cpaos_end_time']) . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $cpaos_amount . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $get_num . "]]></cell>";
                $xml .= "<cell><![CDATA[满" . $row['coupon_order_limit'] . "元送" . $row['coupon_value'] . "元]]></cell>";
                $xml .= "<cell><![CDATA[" . 9999 . "]]></cell>";
                $xml .= "<cell><![CDATA[" . 9999 . "]]></cell>";
                $xml .= "<cell><![CDATA[<span title='" . $row['cpaos_desc'] . "'>" . $row['cpaos_desc'] . "</span>]]></cell>";
                $xml .= "</row>";
            }
            $xml .= "<total>$total</total>";
            $xml .= "</rows>";
            echo $xml;
            exit;
        } else {
            $this->smarty->assign('type', $type);
            $this->smarty->display('promotion_coupon_of_shopping.html');
        }
    }

    /* 买后送券编辑 */

    public function CouponOfShoppingEdit() {
        $this->common_function->shop_admin_priv("CouponOfShopping");//权限
        if(isset($_GET['op']) && $_GET['op'] == 'submit'){
//            var_dump($_POST);exit;
            $data = array('state'=>false,'msg'=>'系统错误！');
            $activit = $_POST['activit'];
            if(isset($_POST['cpaos_id']) && !empty($_POST['cpaos_id'])){
                $cpaos_id = $_POST['cpaos_id'];
            }else{
                $cpaos_id = false;
            }
            if ($activit['cpaos_create_type']==2 && !empty($_FILES ['file_'] ['name'])) {
                $file_type = substr($_FILES ['file_'] ['name'], strpos($_FILES ['file_'] ['name'], '.'));
                if($file_type !=='.xlsx'){
                    $data = array('state'=>false,'msg'=>'请上传xlsx类型的文件！');
                }else{
                    $savePath = ROOTPATH . 'data/excel/'; // 设置上传路径
                    $str = date ( 'YmdHis' ) . uniqid (); // 以时间来命名上传的文件
                    $file_name = $str . $file_type;
                    if (! copy ( $_FILES ['file_'] ['tmp_name'], $savePath . $file_name )) {
                        $data = array('state'=>false,'msg'=>'文件上传失败，请重试！');
                    }else{
                        set_time_limit(0);
                        include (ROOTPATH . 'libraries/PHPExcel/IOFactory.php');
                        include (ROOTPATH . 'libraries/PHPExcel/Reader/Excel2007.php');

                        $excelpath = $savePath . $file_name;
                        $objReader = PHPExcel_IOFactory::createReader ( 'Excel2007' );
                        $objPHPExcel = $objReader->load ( $excelpath );
                        $sheet = $objPHPExcel->getSheet ( 0 );
                        $rows = $sheet->getHighestRow (); // 取得总行数
                        $coupon_code = [];
                        for($i = 2; $i <= $rows; $i ++) {
                            if(!empty($objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ())){
                                $coupon_code[] = $objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ();
                            }
                        }
                        @unlink($excelpath);
                    }
                }
            }
            if(!$cpaos_id){
                $coupon['coupon_activity_type'] = 2;
                $coupon['coupon_name'] = $_GET['coupon_name'];
                $coupon['coupon_bg_color'] = '#f44336';
                $coupon['coupon_value'] = $_GET['coupon_denomination'];
//                $coupon['coupon_order_limit'] = $_GET['coupon_order_limit'];
                $coupon['limit_goods_type'] = $_GET['limit_goods_type'];
                $coupon['limit_goods'] = $_GET['limit_goods'];
                $coupon['limit_store_type'] = $_GET['limit_store_type'];
                $coupon['limit_store'] = $_GET['limit_store'];
                $coupon['coupon_start_time'] = strtotime($_GET['coupon_start_time']);
                $coupon['coupon_end_time'] = strtotime($_GET['coupon_end_time']);
                $coupon['coupon_desc'] = $_GET['coupon_desc'];
            }
            $activit['cpaos_start_time'] = strtotime($activit['cpaos_start_time']);
            $activit['cpaos_end_time'] = strtotime($activit['cpaos_end_time']);
            $this->db->trans_off(); //禁用事务
            $this->db->trans_start(); //开启事务
            if(!$cpaos_id){ //新增
                $this->db->insert('shop_coupon',$coupon);
                $coupon_id = $this->db->insert_id();
                $activit['coupon_id'] = $coupon_id;
                $this->db->insert('shop_coupon_activity_of_shopping',$activit);
            }else{  //修改
                $this->db->update('shop_coupon_activity_of_shopping',$activit,array('cpaos_id'=>$cpaos_id));
            }

            if($activit['cpaos_create_type']==2 && isset($coupon_code) && !empty($coupon_code)){ //导入券码
                $user_coupon = [];
                $cpaos_id = !$cpaos_id ? $this->db->insert_id() : $cpaos_id;
                foreach($coupon_code as $k=>$v){
                    $user_coupon[] = array(
                        'coupon_activity_id'=>$cpaos_id,
                        'coupon_activity_type'=>2,
                        'coupon_code'=>$v,
                    );
                }
                if(!empty($user_coupon)){
                    $this->db->insert_batch('user_coupon',$user_coupon);
                }
            }
            $this->db->trans_complete(); //事务完成
            $this->db->trans_off(); //禁用事务
            if ($this->db->trans_status() === FALSE) {
                return false;
            }else{
                $data = array('state'=>true,'msg'=>'操作完成！');
            }
            echo json_encode($data);exit;
        }else{
            if(isset($_GET['cpaos_id']) && $_GET['cpaos_id']!==''){
                $cpaos_id = $_GET['cpaos_id'];
                $activity_info = $this->db->select('*')->from('shop_coupon_activity_of_shopping')->where('cpaos_id',$cpaos_id)->get()->row_array();
                $coupon_info = $this->db->select('*')->from('shop_coupon')->where('coupon_id',$activity_info['coupon_id'])->get()->row_array();
                $activity_info['cpaos_start_time'] = date("Y-m-d H:i:s",$activity_info['cpaos_start_time']);
                $activity_info['cpaos_end_time'] = date("Y-m-d H:i:s",$activity_info['cpaos_end_time']);
                $coupon_info['coupon_start_time'] = date("Y-m-d H:i:s",$coupon_info['coupon_start_time']);
                $coupon_info['coupon_end_time'] = date("Y-m-d H:i:s",$coupon_info['coupon_end_time']);
                if($activity_info['limit_goods_type']>0 && !empty($activity_info['limit_goods'])){  //限制条件
                    $limit_arr = explode(',', $activity_info['limit_goods']);
                    if($activity_info['limit_goods_type']==1){
                        $limit_cate = $this->db->select('gc.gc_id,gc.gc_name,gc.gc_parent_id,gcc.gc_parent_id as parent_type,gcc.gc_name as parent_name')->from('shop_goods_class as gc')->join('shop_goods_class as gcc','gc.gc_parent_id=gcc.gc_id','left')->where_in('gc.gc_id',$limit_arr)->get()->result_array();
                        $limit_goods = [];
                        foreach($limit_cate as $k=>$v){
                            if($v['parent_type']>0){
                                $parent_info = $this->db->select('gc_id,gc_name,gc.gc_parent_id')->from('shop_goods_class gc')->where('gc.gc_id',$v['parent_type'])->get()->row_array();
                                if($parent_info['gc_parent_id']=='0'){
                                    $limit_cate[$k]['parent_type'] = 0;
                                    $limit_cate[$k]['parent_name'] = $parent_info['gc_name'];
                                }
                            }
                        }
                        foreach($limit_cate as $k=>$v){
                            $limit_goods[$v['parent_type']]['value'] = isset($limit_goods[$v['parent_type']]['value']) ? $limit_goods[$v['parent_type']]['value'] : '';
                            if($v['parent_type']==0){
                                $limit_goods[$v['parent_type']]['name'] = $v['parent_name'];
                                $limit_goods[$v['parent_type']]['value'] .= $v['gc_name'].'/';
                            }
                        }
                    }elseif ($activity_info['limit_goods_type']==2) {
                        $limit_goods = $this->db->select('goods_id as id,goods_name as name')->from('shop_goods')->where_in('goods_id',$limit_arr)->get()->result_array();

                    }elseif ($activity_info['limit_goods_type']==3) {
                        $limit_goods = $this->db->select('brand_id as id,brand_name as name')->from('shop_brand')->where_in('brand_id',$limit_arr)->get()->result_array();
                    }
                    $this->smarty->assign('limit_goods',$limit_goods);
                }
                if($activity_info['limit_stores_type']>0 && !empty($activity_info['limit_stores'])){  //限制门店
                    $limit_arr = explode(',', $activity_info['limit_stores']);
                    $limit_stores = $this->db->select('store_id as id,store_name as name')->from('store')->where_in('store_id',$limit_arr)->get()->result_array();
                    $this->smarty->assign('limit_stores',$limit_stores);
//                    var_Dump($limit_stores);exit;
                }

                $this->smarty->assign('cpaos_id',$cpaos_id);
                $this->smarty->assign('activity',$activity_info);
                $this->smarty->assign('coupons',$coupon_info);
            }
            $this->smarty->display('promotion_coupon_of_shopping_edit.html');
        }
    }
    /*结束活动*/
    public function stop_activity(){
        $this->common_function->shop_admin_priv("end_activity");//权限
        $data = array('state'=>true,'msg'=>'系统错误！');
        $ids = isset($_GET['id']) ? explode(',', $_GET['id']) : 0;
        $type = isset($_GET['type']) ? $_GET['type'] : 1;
        $ids_arr = array('1'=>'cpanu_id','2'=>'cpaos_id','3'=>'cpaos_id');
        $table_arr = array('1'=>'shop_coupon_activity_new_user','2'=>'shop_coupon_activity_of_shopping','3'=>'shop_coupon_activity_of_sales');
        $statu_arr = array('1'=>'cpanu_statu','2'=>'cpaos_statu','3'=>'cpaos_statu');
        $id_str = $ids_arr[$type];
        $table_str = $table_arr[$type];
        $status = $statu_arr[$type];
        if ($ids) {
            $result = $this->db->where_in("{$id_str}", $ids)->update("{$table_str}",array("{$status}"=>0));
            if($result){
                $data = array('state'=>true,'msg'=>'停用成功！');
            }
        }
        echo json_encode($data);
        exit;
    }
    /*抢红包活动*/
    public function CouponQiangHongBao(){
        $this->common_function->shop_admin_priv("qiangHongBao");//权限
        $this->smarty->display ( 'PromotionCouponQiangHongBao.html');
    }
    /*发券给导购*/
    public function CouponOfSales(){
        $this->common_function->shop_admin_priv("CouponOfSales");//权限
        $this->smarty->display ( 'PromotionCouponOfSales.html');
    }
    /*发券给导购编辑*/
    public function CouponOfSalesEdit(){
        $this->common_function->shop_admin_priv("CouponOfSales");//权限
        $this->smarty->display ( 'PromotionCouponOfSalesEdit.html');
    }
    /*领券活动*/
    public function CouponOfReceive(){
        $this->common_function->shop_admin_priv("CouponOfReceive");//权限
        $this->smarty->display ( 'PromotionCouponOfReceive.html' );
    }
    /*领券活动编辑*/
    public function CouponOfReceiveEdit(){
        $this->common_function->shop_admin_priv("CouponOfReceive");//权限
        $this->smarty->display ( 'PromotionCouponOfReceiveEdit.html' );
    }

    /* 满减满折 */

    public function OfDiscount() {
        $this->common_function->shop_admin_priv("OfDiscount");//权限
        $this->smarty->display('PromotionOfDiscount.html');
    }

    /* 天天闪购 */

    public function OfSeckill() {
        $this->common_function->shop_admin_priv("OfSeckill");//权限
        $this->smarty->display('PromotionOfSeckill.html');
    }

    /* 商品专题 */

    public function specialPromotion() {
        $this->common_function->shop_admin_priv("specialPromotion");//权限
        $this->smarty->display('PromotionspecialPromotion.html');
    }

    /* 限时折扣 */

    public function OfLimitTimeDiscount() {
        $this->common_function->shop_admin_priv("OfLimitTimeDiscount");//权限
        $this->smarty->display('PromotionOfLimitTimeDiscount.html');
    }

    /* 签到 */
    public function sign() {
    	//$this->common_function->shop_admin_priv("GameOfLottery");//权限
        $op = isset($_GET['op'])?$_GET['op']:1;
        $this->smarty->assign('op',$op);
    	$this->smarty->display('sign.html');
    }

    public function sign_edit() {
        $this->common_function->shop_admin_priv("GameOfSign");//权限
        $store = $this->db->select('store_id,short_store_name,store_name')
            ->from('store')->where_in('ous_type',array(1,2))->where('is_delete',0)->where('store_state',1)->get()->result_array();
        $this->smarty->assign('store',$store);
        $defaultImg = $this->common_function->get_system_value('default_goods_image');
        $this->smarty->assign('defaultImg',$defaultImg);
        $this->smarty->assign('state','');
        $this->smarty->assign('arr',array());
        $this->smarty->display('promotion_sign.html');
    }

    //加载签到详情页(不分类版本)
    public function get_sign_list() {
        $this->common_function->shop_admin_priv("GameOfSign");//权限
//        $op = isset($_GET['op'])?$_GET['op']:'1';
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;

        $start = ($page - 1) * $rp;$time = time();
        $this->db->select('ss.sign_id,ss.sign_title,ss.sign_rule,count(sr.sign_rule_id) as rule_num,ss.sign_start_time,ss.sign_end_time');
        $this->db->from('shop_p_sign as ss');
        $this->db->join('shop_p_sign_rule as sr', 'ss.sign_id=sr.sign_id', 'left');
        $this->db->group_by('ss.sign_id');
        $this->db->order_by('ss.sign_id');

        $db=clone($this->db);
        $this->db->where('ss.sign_status',1);
        $this->db->where('ss.sign_start_time<' . $time);
        $this->db->where('ss.sign_end_time>' . $time);
        $this->db->limit($rp, $start);
        $data1=$this->db->get()->result_array();//已开启，且时间在要求范围的活动
        $num1=count($data1);
        $this->db=$db;

        $db=clone($this->db);
        $this->db->where('ss.sign_status',1);
        $this->db->where('ss.sign_start_time>' . $time);
        $this->db->limit(($rp-$num1), $start);
        $data2=$this->db->get()->result_array();//已开启且开始时间未到
        $num2=count($data2);
        $this->db=$db;

        $db=clone($this->db);
        $this->db->where('ss.sign_status',2);
        $this->db->where('ss.sign_end_time>' . $time);
        $this->db->limit(($rp-$num1-$num2), $start);
        $data3=$this->db->get()->result_array();//未开启且未超时的
        $num3=count($data3);
        $this->db=$db;

        $db=clone($this->db);
        $this->db->where('ss.sign_end_time<' . $time);
        $this->db->limit(($rp-$num1-$num2-$num3), $start);
        $data4=$this->db->get()->result_array();//已超时结束
        $this->db=$db;
        $data=array();
        foreach($data1 as $k1=>$v1){
            if($k1==0){
                $v1['state']='1';
                $v1['remark']='进行中';
            }else{
                $v1['state']='1';
                $v1['remark']='已开启';
            }
            $data[]=$v1;
        }
        foreach($data2 as $k2=>$v2){
            $v2['state']='1';
            $v2['remark']='已开启';
            $data[]=$v2;
        }
        foreach($data3 as $k3=>$v3){
            $v3['state']='2';
            $v3['remark']='未开启';
            $data[]=$v3;
        }
        foreach($data4 as $k4=>$v4){
            $v4['state']='3';
            $v4['remark']='已结束';
            $data[]=$v4;
        }
//        var_dump ($data);


        //                if ($qtype && $query) {
        //                    if ($qtype == 'brand_id') {
        //                        $this->db->like('brand_id', $query);
        //                    } elseif ($qtype == 'brand_name') {
        //                        $this->db->like('brand_name', $query);
        //                    } elseif ($qtype == 'brand_initial') {
        //                        $this->db->like('brand_initial', $query);
        //                    }
        //                }
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
//        $this->db->limit($rp, $start);
//        $rows = $this->db->get()->result_array();
//        var_dump ($rows);

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        foreach ($data as $k=>$row) {
            $url=base_url();
            $row['sign_start_time']=date('Y.m.d',$row['sign_start_time']);
            $row['sign_end_time']=date('Y.m.d',$row['sign_end_time']);
            //$get_num = $this->db->select('count(1)')->from('user_coupon')->where('coupon_activity_id',$row['cpanu_id'])->where('coupon_activity_type',1)->get()->row('count(1)');
            $xml .= "<row id='" . $row['sign_id'] . "'>";
            //yu
            //操作
            if($row['state']==2){
                $xml .= "<cell><![CDATA[
    		<a class='btn red' onclick=fg_stop({$row['sign_id']},{$row['state']})>
    		<i class='fa fa-trash-o'></i>开启</a>
    		<a class='btn green' onclick=fg_edit({$row['sign_id']})>
    		<i class='fa fa-cog'></i>查看</a>
            <a class='btn red' onclick=fg_del({$row['sign_id']})>
    		<i class='fa fa-trash-o'></i>删除</a>]]></cell>";
            }elseif($row['state']==1){
                $xml .= "<cell><![CDATA[
    		<a class='btn red' onclick=fg_stop({$row['sign_id']},{$row['state']})>
    		<i class='fa fa-trash-o'></i>结束</a>
    		<a class='btn green' onclick=fg_edit({$row['sign_id']})>
    		<i class='fa fa-cog'></i>查看</a>
    		<a class='btn red' onclick=fg_del({$row['sign_id']})>
    		<i class='fa fa-trash-o'></i>删除</a>]]></cell>";
            }else{
                $xml .="<cell><![CDATA[
    		<a class='btn green' onclick=fg_edit({$row['sign_id']})>
    		<i class='fa fa-cog'></i>查看</a>
    		<a class='btn red' onclick=fg_del({$row['sign_id']})>
    		<i class='fa fa-trash-o'></i>删除</a>]]></cell>";
            }




            //$xml .= "<cell><![CDATA[" . date("Y-m-d h:i:s", $row['coupon_start_time']) . "<br>" . date("Y-m-d h:i:s", $row['coupon_end_time']) . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['sign_title'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['sign_rule'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['sign_start_time']. "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['sign_end_time']. "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['remark']. "]]></cell>";
//            $xml .= "<cell><![CDATA[" . $row['user_num'] . "]]></cell>";
//            $xml .= "<cell><![CDATA[" . $row['wheels_num'] . "]]></cell>";
//            $xml .= "<cell><![CDATA[<span title='" . $row['rule'] . "'>" . $row['rule'] . "</span>]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "<total>$total</total>";
        $xml .= "</rows>";
        echo $xml;
        exit;
    }

//    //加载签到详情页
//    public function get_sign_list() {
//        $this->common_function->shop_admin_priv("GameOfSign");//权限
//        $op = isset($_GET['op'])?$_GET['op']:'1';
//        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
//        $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
//        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
//        $query = isset($_POST['query']) ? $_POST['query'] : false;
//
//        $start = ($page - 1) * $rp;$time = time();
//        $this->db->select('ss.sign_id,ss.sign_title,ss.sign_rule,count(sr.sign_rule_id) as rule_num,ss.sign_start_time,ss.sign_end_time');
//        $this->db->from('shop_p_sign as ss');
//        $this->db->join('shop_p_sign_rule as sr', 'ss.sign_id=sr.sign_id', 'left');
//        if ($op == 1) { //进行中
//            $this->db->where('ss.sign_status',1);
//            $this->db->where('ss.sign_start_time<' . $time);
//            $this->db->where('ss.sign_end_time>' . $time);
//        } elseif($op == 2) { //未开启
//            $this->db->group_start();
//            $this->db->where('ss.sign_status',2);
//            $this->db->where('ss.sign_end_time>' . $time);
//            $this->db->group_end();
//            $this->db->or_group_start();
//            $this->db->where('ss.sign_start_time>' . $time);
//            $this->db->group_end();
//        }else{//已结束
//            $this->db->where('ss.sign_end_time<' . $time);
//        }
//        $this->db->group_by('ss.sign_id');
//        $this->db->order_by('ss.sign_id');
//        //                if ($qtype && $query) {
//        //                    if ($qtype == 'brand_id') {
//        //                        $this->db->like('brand_id', $query);
//        //                    } elseif ($qtype == 'brand_name') {
//        //                        $this->db->like('brand_name', $query);
//        //                    } elseif ($qtype == 'brand_initial') {
//        //                        $this->db->like('brand_initial', $query);
//        //                    }
//        //                }
//        $db = clone($this->db);
//        $total = $this->db->count_all_results();
//        $this->db = $db;
//        $this->db->limit($rp, $start);
//        $rows = $this->db->get()->result_array();
////        var_dump ($rows);
//
//        header("Content-type: text/xml");
/*        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";*/
//        $xml .= "<rows>";
//        $xml .= "<page>$page</page>";
//        foreach ($rows as $k=>$row) {
//            $url=base_url();
//            $row['sign_start_time']=date('Y.m.d',$row['sign_start_time']);
//            $row['sign_end_time']=date('Y.m.d',$row['sign_end_time']);
//            //$get_num = $this->db->select('count(1)')->from('user_coupon')->where('coupon_activity_id',$row['cpanu_id'])->where('coupon_activity_type',1)->get()->row('count(1)');
//            $xml .= "<row id='" . $row['sign_id'] . "'>";
//            //yu
//            //操作
//            if($op==2){
//                $xml .= "<cell><![CDATA[
//    		<a class='btn red' onclick=fg_stop({$row['sign_id']},$op)>
//    		<i class='fa fa-trash-o'></i>开启</a>
//    		<a class='btn green' onclick=fg_edit({$row['sign_id']})>
//    		<i class='fa fa-cog'></i>编辑</a>]]></cell>";
//            }else{
//                $xml .= "<cell><![CDATA[
//    		<a class='btn red' onclick=fg_stop({$row['sign_id']},$op)>
//    		<i class='fa fa-trash-o'></i>结束</a>
//    		<a class='btn green' onclick=fg_edit({$row['sign_id']})>
//    		<i class='fa fa-cog'></i>编辑</a>]]></cell>";
//            }
//
//
//
//
//            //$xml .= "<cell><![CDATA[" . date("Y-m-d h:i:s", $row['coupon_start_time']) . "<br>" . date("Y-m-d h:i:s", $row['coupon_end_time']) . "]]></cell>";
//            $xml .= "<cell><![CDATA[" . $row['sign_title'] . "]]></cell>";
//            $xml .= "<cell><![CDATA[" . $row['sign_rule'] . "]]></cell>";
//            $xml .= "<cell><![CDATA[" . $row['sign_start_time']. "]]></cell>";
//            $xml .= "<cell><![CDATA[" . $row['sign_end_time']. "]]></cell>";
////            $xml .= "<cell><![CDATA[" . $row['user_num'] . "]]></cell>";
////            $xml .= "<cell><![CDATA[" . $row['wheels_num'] . "]]></cell>";
////            $xml .= "<cell><![CDATA[<span title='" . $row['rule'] . "'>" . $row['rule'] . "</span>]]></cell>";
//            $xml .= "</row>";
//        }
//        $xml .= "<total>$total</total>";
//        $xml .= "</rows>";
//        echo $xml;
//        exit;
//    }

//删除
    public function sign_del(){
        $sign_id=isset($_POST['sign_id'])?$_POST['sign_id']:'';
        $this->db->trans_start(); //开启事务
//        删除shop_p_sign表对应的签到活动
        $this->db->where('sign_id',$sign_id);
        $this->db->delete('shop_p_sign');
//        查询shop_p_sign_rule表中对应该签到活动的数据
        $this->db->select('sign_rule_id,sign_prize');
        $this->db->where('sign_id',$sign_id);
        $this->db->from('shop_p_sign_rule');
        $data=$this->db->get()->result_array();
        foreach($data as $k=>$v){
            $this->db->where('sign_rule_id',$v['sign_rule_id']);
            $this->db->delete('shop_p_sign_rule');
            $this->db->where('coupon_id',$v['sign_prize']);
            $this->db->where('coupon_activity_type=7');
            $this->db->delete('shop_coupon');
        }
        $rel['state']=$this->db->trans_complete(); //事物完成
        $this->db->trans_off(); //禁用事务
        $rel['message']='删除成功';
        echo json_encode($rel);exit;

    }
//点击编辑
    public function sign_update() {
        $this->common_function->shop_admin_priv("GameOfSign");//权限
        $store = $this->db->select('store_id,short_store_name,store_name')
        ->from('store')->where_in('ous_type',array(1,2))->where('is_delete',0)->where('store_state',1)->get()->result_array();
        $this->smarty->assign('store',$store);
        $defaultImg = $this->common_function->get_system_value('default_goods_image');
        $this->smarty->assign('defaultImg',$defaultImg);

        $sign = $this->db->select('*')->from('shop_p_sign')->where('sign_id',$_GET['sign_id'])->order_by('sign_id','DESC')->get()->result_array();
        $sign=$sign[0];
        $sign['sign_start_time'] = date('Y-m-d',$sign['sign_start_time']);
        $sign['sign_end_time'] = date('Y-m-d',$sign['sign_end_time']);
//        var_dump ($sign);die;
        $rule = $this->db->select('*')->from('shop_p_sign_rule')->where('sign_id',$sign['sign_id'])->order_by('sign_day')->get()->result_array();
        foreach ($rule as $k=>$v){
        	$row = array();
        	if($v['sign_prize_type']==1){
        		$row = $this->db->select('sc.coupon_id,sc.coupon_name,sc.coupon_value,sc.limit_goods,sc.limit_store,sc.coupon_start_time,sc.coupon_end_time,
        		g.goods_name,g.goods_image,s.store_name,sc.coupon_desc')
        		->from('shop_coupon sc')->join('shop_goods g','g.goods_id=sc.limit_goods')->join('store s','s.store_id=sc.limit_store')
        		->where('coupon_id',$v['sign_prize'])->get()->row_array();
        		$row['start_time'] = date('Y-m-d',$row['coupon_start_time']);$row['end_time'] = date('Y-m-d',$row['coupon_end_time']);
        		$v['title'] = $row['coupon_name'];

        		$v['image'] = img_http($row['goods_image']);
        	}elseif($v['sign_prize_type']==3){
        		$row = array('start_time'=>date('Y-m-d',$v['start_time']),'end_time'=>date('Y-m-d',$v['end_time']),'type'=>$v['sign_prize_type'],
        				'sign_day'=>date('Y-m-d',$v['start_time']),'prize_point'=>$v['sign_prize']
        		);
        		$v['title'] = $row['prize_point'].'积分券';
        		$v['image'] = TEMPLE.'images/integ.png';
        	}elseif($v['sign_prize_type']==5){
        		$cash = explode(',',$v['sign_prize']);
        		$min = $cash[0];$max = isset($cash[1])?$cash[1]:$cash[0];
        		if($min==$max){
        			$title = $min.'元现金红包';
        		}else{
        			$title = $min.'-'.$max.'元随机红包';
        		}
        		$row = array('start_time'=>date('Y-m-d',$v['start_time']),'end_time'=>date('Y-m-d',$v['end_time']),'type'=>$v['sign_prize_type'],
        				'sign_day'=>date('Y-m-d',$v['start_time']),'min'=>$v['sign_prize'],'max'=>$v['sign_prize'],'title'=>$title
        		);
        		$v['title'] = $title;
        		$v['image'] = TEMPLE.'images/redmoney.png';
        	}
        	$v['data'] = str_replace(' ',"#nbsp;",json_encode($row));
        	$v['start_time'] = date('Y-m-d',$v['start_time']);$v['end_time'] = date('Y-m-d',$v['end_time']);
        	$rule[$k] = $v;
        }
//                	var_dump ($rule);var_dump ($sign);
        $this->smarty->assign('sign',$sign);
        $this->smarty->assign('rule',$rule);
        $this->smarty->display('promotion_sign.html');
    }

//编辑修改已有的签到活动
    public function promotion_sign_update(){
        if($_POST){
            $sign_id=isset($_POST['sign_id'])?$_POST['sign_id']:'';
            $data=$_POST;
            var_dump ($data);
//            $this->db->update('')

        }
    }

    //编辑签到活动，记录到表
    public function promotion_sign_edit() {
//    	print_r($_POST);
    	$time = time();
    	$inner['sign_title'] = isset($_POST['sign_title'])?$_POST['sign_title']:'';
    	$inner['sign_status'] = isset($_POST['status'])?$_POST['status']:1;
    	$inner['sign_rule'] = isset($_POST['rule'])?$_POST['rule']:'';
    	$inner['sign_start_time'] = isset($_POST['start_time'])?strtotime($_POST['start_time']):'';
    	$inner['sign_end_time'] = isset($_POST['end_time'])?strtotime($_POST['end_time']):'';
    	$inner['add_time'] = $time;
    	$inner['add_user_id'] = $_SESSION['shop_admin_id'];
    	$inner['add_user_name'] = $_SESSION['shop_admin_name'];
//    	var_dump ($inner);die;
        $prize_day = isset($_POST['prize_day'])?$_POST['prize_day']:'';
        $prize_data = isset($_POST['prize_data'])?$_POST['prize_data']:'';
        $prize_type = isset($_POST['prize_type'])?$_POST['prize_type']:'';
//        var_dump ($prize_data);die;
        $result = array('state'=>false,'msg'=>'操作错误');
        if(!empty($prize_day)&&!empty($prize_data)&&!empty($prize_type)){
//        	//判断：如果此签到活动为开启，且开始时间小于当前时间，结束时间大于当前时间，则将其他签到活动关闭
//        	if($inner['sign_status']==1 && $inner['sign_start_time']<time() && $inner['sign_end_time']>time()){
//                $this->db->set('sign_status','2');
//                $this->db->where('sign_id',$sign_id);
//                $this->db->update('shop_p_sign');
//            }

        	foreach ($prize_day as $k=>$v){
                if($v==0){//若果为0，表示是每天签到送
                    $prize=json_decode($prize_data[$k],true);
//                    var_dump ($prize['prize_point']);die;
                     if($prize['type']==3){//积分
                        $inner['per_point']=$prize['prize_point'];
                    }
                    if($prize['type']==5){//红包
                        $min=$prize['min'];
                        $max=$prize['max'];
                        $cash=$min.','.$max;
                        $inner['per_point']=$cash;
                    }
                    if($prize['type']==1){//优惠券
                        $inner['per_point']=$prize['discount'];
                    }
                    $this->db->insert('shop_p_sign',$inner);
                    $sign_id = $this->db->insert_id();
                }
        		$rule = array();
        		$rule['sign_id'] = $sign_id;
        		$rule['sign_day'] = $v;
        		if(!empty($prize_data[$k])){
        			$rule_data = object_array(json_decode($prize_data[$k]));
//        			print_r($rule_data);die;
        			$type = $rule_data['type'];
        			$rule['sign_prize_type'] = $type;
        			$rule['start_time'] = strtotime($rule_data['start_time']);
        			$rule['end_time'] = strtotime($rule_data['end_time']);
        			if($type==1){
                        $coupon['coupon_type'] = 1;
                        $coupon['coupon_activity_type'] = 7;
        				$coupon['coupon_name'] = $rule_data['coupon_name'];
        				$coupon['coupon_value'] = $rule_data['discount']/10;
        				$coupon['limit_goods_type'] = 2;
        				$coupon['limit_goods'] = $rule_data['goods_id'];
        				$coupon['limit_store_type'] = 1;
        				$coupon['limit_store'] = $rule_data['store_id'];
        				$coupon['coupon_start_time'] = strtotime($rule_data['start_time']);
        				$coupon['coupon_end_time'] = strtotime($rule_data['end_time']);
        				//$coupon['time_state'] = 2;
        				$coupon['coupon_desc'] = $rule_data['coupon_rule'];
        				$this->db->insert('shop_coupon',$coupon);
                        $rule['sign_prize'] = $this->db->insert_id();
        			}elseif($type==3){
                        $coupon['coupon_type'] = 3;
                        $coupon['coupon_activity_type'] = 7;
                        $coupon['coupon_name'] = $rule_data['prize_point']."积分劵";
                        $coupon['coupon_value'] = $rule_data['prize_point'];
//                        $coupon['limit_goods_type'] = 2;
//                        $coupon['limit_goods'] = $rule_data['goods_id'];
//                        $coupon['limit_store_type'] = 1;
//                        $coupon['limit_store'] = $rule_data['store_id'];
                        $coupon['coupon_start_time'] = strtotime($rule_data['start_time']);
                        $coupon['coupon_end_time'] = strtotime($rule_data['end_time']);
                        //$coupon['time_state'] = 2;
//                        $coupon['coupon_desc'] = $rule_data['rule'];
                        $this->db->insert('shop_coupon',$coupon);
                        $rule['sign_prize'] = $this->db->insert_id();
        			}elseif($type==5){
                        $coupon['coupon_type'] = 5;
                        $coupon['coupon_activity_type'] = 7;
                        $coupon['coupon_name'] = $rule_data['min']."-".$rule_data['max']."红包劵";
                        $coupon['coupon_value'] =$rule_data['min'].','.$rule_data['max'];
                        $coupon['coupon_start_time'] = strtotime($rule_data['start_time']);
                        $coupon['coupon_end_time'] = strtotime($rule_data['end_time']);
                        $this->db->insert('shop_coupon',$coupon);
        				$rule['sign_prize'] = $this->db->insert_id();
        			}
        			$rule['sign_day'] = $v;
        			$rule['add_time'] = $time;
    	            $rule['add_user_id'] = $_SESSION['shop_admin_id'];
    	            $rule['add_user_name'] = $_SESSION['shop_admin_name'];
        			$this->db->insert('shop_p_sign_rule',$rule);
                    $sign_rule_id=$this->db->insert_id();
        		}
        	}
        	$result = array('state'=>true,'msg'=>'添加成功');
        }
        echo json_encode($result);exit;
        
    }

    //结束/开启当前签到活动
    public  function end_sign_action(){
//echo $_POST['wheels_id'];
        $op=isset($_POST['op'])?$_POST['op']:'1';//判断是开启还是关闭签到活动
        $sign_id=isset($_POST['sign_id'])?$_POST['sign_id']:'';//开启/关闭的签到活动id
        if($op==2){//如果是未开启的活动，则开启
            $this->db->select('sign_id');
            $this->db->from('shop_p_sign');
            $this->db->where('sign_status','1');
            $this->db->where('sign_start_time<',time());
            $this->db->where('sign_end_time>',time());
            $sign_num=$this->db->get()->result_array();//判断当前是否有正在进行的活动
            if(empty($sign_num)) {//说明没有已开启且在活动中的签到活动，则可以直接开启该活动
                $this->db->set ('sign_status', '1');
                $this->db->where ('sign_id', $_POST['sign_id']);
                $this->db->update ('shop_p_sign');
                $res['state']=1;//返回状态，1表示开启成功
                $res['message']='开启成功';
            }else{
                $res['state']=2;//返回状态，2表示询问是否开启
                $res['message']='当前已有正在进行的签到活动，是否确认开启此活动';
            }

        }elseif($op==0){//询问是否开启，点击确定后的操作
            $this->db->set ('sign_status', '1');
            $this->db->where ('sign_id', $_POST['sign_id']);
            $this->db->update ('shop_p_sign');
            $res['state']=1;//返回状态，1表示开启成功
            $res['message']='开启成功';
        }
        else{//关闭
            $this->db->set('sign_status','2');
            $this->db->where('sign_id', $_POST['sign_id']);
            $this->db->update('shop_p_sign');
            $res['state']=3;//返回状态，3表示关闭成功
            $res['message']='关闭成功';
        }
        echo json_encode($res);exit;

        //echo $this->db->last_query();
    }

    /* 大转盘 */

    public function wheel() {
        $this->common_function->shop_admin_priv("GameOfLottery");//权限
        $op = isset($_GET['op'])?$_GET['op']:1;
        $this->smarty->assign('op',$op);
        $this->smarty->display('promotion_wheel.html');
    }
    public function wheels_edit(){
        
        $param = $_POST;
        $result = array('state'=>false,'msg'=>'操作失败');
        $inner['start_time'] = strtotime($param['start_time']);
        $inner['end_time'] = strtotime($param['end_time']);
        $inner['wheels_name'] = isset($param['wheels_name'])?trim($param['wheels_name']):'';
        $inner['point'] = isset($param['point'])?intval($param['point']):'';
        $inner['free_limit'] = isset($param['free_limit'])?intval($param['free_limit']):'';
        $inner['limit'] = isset($param['limit'])?intval($param['limit']):'';
        $inner['day_limit'] = isset($param['day_limit'])?intval($param['day_limit']):'';
        $inner['store_id'] = isset($param['store_id'])?intval($param['store_id']):'';
        $inner['goods_id'] = isset($param['goods_id'])?intval($param['goods_id']):'';
        $rule = isset($param['rule'])?$param['rule']:'';
        
        $rule = str_replace('<br>','\n',$rule);
        //print_r($rule);die;
        if(!empty($inner['goods_id'])){
        	$inner['wheels_image'] = $this->db->select('goods_image')->where('goods_id',$inner['goods_id'])
        	->get('shop_goods')->row('goods_image');
        	$defaultImg = $this->common_function->get_system_value('default_goods_image');
        	$inner['wheels_image'] = empty($inner['wheels_image'])?PLUGIN.'data/images/'.$defaultImg:GOODIMAGE.$inner['wheels_image'];
        }
        
        $inner['rule'] = $rule;
        $wheels_id = !empty($_POST['wheels_id'])?intval($_POST['wheels_id']):'';
        if(!empty($wheels_id)){
        	$this->db->where('wheels_id',$wheels_id)->update('shop_p_lottery_wheel',$inner);
        }else{
        	$this->db->insert('shop_p_lottery_wheel',$inner);
        	$wheels_id = $this->db->insert_id();
        }
        $result = array('state'=>true,'wheels_id'=>$wheels_id,'msg'=>'');
        echo json_encode($result);exit;
    }
    /*   public function get_prize_list(){
           $this->common_function->shop_admin_priv("GameOfLottery");//权限
           $op = isset($_GET['op'])?$_GET['op']:'';
           $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
           $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
           $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
           $query = isset($_POST['query']) ? $_POST['query'] : false;
           $wheels_id = isset($_POST['wheels_id']) ? intval($_POST['wheels_id']) : 0;
           $start = ($page - 1) * $rp;
           $this->db->select('p.*');
           $this->db->from('shop_p_lottery_wheel_prize as p');
           $this->db->where('p.wheels_id',$wheels_id);  //
           $db = clone($this->db);
           $total = $this->db->count_all_results();
           $this->db = $db;
           $this->db->limit($rp, $start);
           $rows = $this->db->get()->result_array();

           header("Content-type: text/xml");
           $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
           $xml .= "<rows>";
           $xml .= "<page>$page</page>";
           $prize_name = array('1'=>'折扣卷','2'=>'满送卷','3'=>'积分','4'=>'实物','5'=>'现金红包');
           foreach ($rows as $row) {
               $url=base_url();
               //$get_num = $this->db->select('count(1)')->from('user_coupon')->where('coupon_activity_id',$row['cpanu_id'])->where('coupon_activity_type',1)->get()->row('count(1)');
               $xml .= "<row id='" . $row['wheels_id'] . "'>";
     //yu
               //操作
               $xml .= "<cell><![CDATA[
               <a class='btn red' onclick=fg_stop({$row['wheels_prize_id']})>
               <i class='fa fa-trash-o'></i>增减剩余量</a>
               <a class='btn green' onclick=fg_edit({$row['wheels_prize_id']})>
               <i class='fa fa-cog'></i>编辑</a>]]></cell>";//coupon_name
               switch (intval($row['prize_type']))
               {
                   case 1:
                       $coupon_discount = $this->db->select('coupon_discount')->where('coupon_id',$row['coupon_id'])->get('shop_coupon')->row('coupon_discount');
                       $name = ($coupon_discount*10).'折卷';
                       break;
                   case 2:
                       $name = '';
                       break;
                   case 3:
                       $name = $row['point'].'积分';
                       break;
                   case 4:
                       $name = '';
                       break;
                   case 5:
                       $name = $row['cash'].'元现金红包';
                       break;
                   default:
                       $name = '';
                       break;
               }

               $xml .= "<cell><![CDATA[" . $name . "]]></cell>";
               $xml .= "<cell><![CDATA[" . $prize_name[$row['prize_type']] . "]]></cell>";
               $xml .= "<cell><![CDATA[" . $row['prize_num'].'/'.$row['prize_have'] . "]]></cell>";
               $xml .= "<cell><![CDATA[" . ($row['prize_percent']*100).'%' . "]]></cell>";

               $xml .= "</row>";
           }
           $xml .= "<total>$total</total>";
           $xml .= "</rows>";
           echo $xml;
           exit;
       }*/



    public function get_prize_list()
    {

        $this->common_function->shop_admin_priv("GameOfLottery");//权限
        $op = isset($_GET['op'])?$_GET['op']:'';
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;
        $wheels_id = isset($_GET['wheels_id']) ? intval($_GET['wheels_id']) : 0;
        $start = ($page - 1) * $rp;
        $this->db->select('p.*');
        $this->db->from('shop_p_lottery_wheel_prize as p');
        $this->db->where('p.wheels_id',$wheels_id);  //
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
        $this->db->limit($rp, $start);
        $rows = $this->db->get()->result_array();
        /*    $a=$this->db->last_query();
            var_dump($a);
                    exit;*/

        // 1折扣卷，2满送卷，3积分，4实物,5现金）
        $prize_name = array('1' => '折扣卷', '2' => '满送卷', '3' => '积分', '4' => '实物', '5' => '现金红包');
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        foreach ($rows as $row) {
            switch (intval($row['prize_type'])) {
                case 1:
                    $coupon_discount = $this->db->select('coupon_value')->where('coupon_id',$row['coupon_id'])->get('shop_coupon')->row('coupon_value');
                    $name = ($coupon_discount*10).'折卷';
                    break;
                case 2:
                    $name = '';
                    break;
                case 3:
                    $name = $row['point'] . '积分奖励';
                    break;
                case 4:
                    $name = '';
                    break;
                case 5:
                	$cash = explode(',',$row['cash']);
                	$cash_min = isset($cash[0])?$cash[0]:'';
                	$name = isset($cash[1])?$cash[0].'-'.$cash[1]:$row['cash'];
                    $name .= '元红包';
                    break;
                default:
                    $name = '';
                    break;
            }





            $xml .= "<row id='" . $row['wheels_prize_id'] . "'>";//
            $xml .= "<cell><![CDATA[
                    <a class='btn red' onclick=stock_edit({$row['wheels_prize_id']})>
                    <i class='fa fa-trash-o'></i>库存</a>
                    <a class='btn green' onclick=prize_edit({$row['wheels_prize_id']},{$row['prize_type']})>
                    <i class='fa fa-cog'></i>编辑奖品</a>]]></cell>";

            $xml .= "<cell><![CDATA[" . $name . "]]></cell>";
            //    $xml .= "<cell><![CDATA[" . $prize_name[$row['prize_type']] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $prize_name[$row['prize_type']] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['prize_num'].'/'.$row['prize_have'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['prize_percent']*100 . "]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "<total>$total</total>";
        $xml .= "</rows>";
        echo $xml;
        exit;

//test

        $this->smarty->assign('xml', $a);
        $this->smarty->display('a.html');
        exit;


    }











    public function get_wheel_list() {
        $this->common_function->shop_admin_priv("GameOfLottery");//权限
        $op = isset($_GET['op'])?$_GET['op']:'';
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;

        $start = ($page - 1) * $rp;$time = time();
        $this->db->select('w.*,count(l.wheels_log_id) as wheels_num,count(l.user_id) as user_num');
        $this->db->from('shop_p_lottery_wheel as w');
        $this->db->join('shop_p_lottery_wheel_log as l', 'l.wheels_id = w.wheels_id', 'left');  //
        if ($op == 2) { //未开始
            $this->db->where('w.status',1);
            $this->db->where('w.start_time>' . $time);
        } elseif ($op == 3) {//已结束
            $this->db->where("(w.status=2 or w.end_time<$time)");
        } else { //进行中
            $this->db->where('w.status',1);
            $this->db->where(" w.start_time<=$time and w.end_time>=$time");
        }
        $this->db->group_by('w.wheels_id');
        //                if ($qtype && $query) {
        //                    if ($qtype == 'brand_id') {
        //                        $this->db->like('brand_id', $query);
        //                    } elseif ($qtype == 'brand_name') {
        //                        $this->db->like('brand_name', $query);
        //                    } elseif ($qtype == 'brand_initial') {
        //                        $this->db->like('brand_initial', $query);
        //                    }
        //                }
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
        $this->db->limit($rp, $start);
        $rows = $this->db->get()->result_array();

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        foreach ($rows as $row) {
            $url=base_url();
            //$get_num = $this->db->select('count(1)')->from('user_coupon')->where('coupon_activity_id',$row['cpanu_id'])->where('coupon_activity_type',1)->get()->row('count(1)');
            $xml .= "<row id='" . $row['wheels_id'] . "'>";
            //yu
            //操作
            $xml .= "<cell><![CDATA[
    		<a class='btn red' onclick=fg_stop({$row['wheels_id']})>
    		<i class='fa fa-trash-o'></i>结束</a>
    		<a class='btn green' onclick=fg_edit({$row['wheels_id']})>
    		<i class='fa fa-cog'></i>编辑</a>]]></cell>";



            //$xml .= "<cell><![CDATA[" . date("Y-m-d h:i:s", $row['coupon_start_time']) . "<br>" . date("Y-m-d h:i:s", $row['coupon_end_time']) . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['wheels_name'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['point'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['user_num'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['wheels_num'] . "]]></cell>";
            $xml .= "<cell><![CDATA[<span title='" . $row['rule'] . "'>" . $row['rule'] . "</span>]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "<total>$total</total>";
        $xml .= "</rows>";
        echo $xml;
        exit;
    }


    /* 活动结束 */
    //yu
    public  function end_wheel_action(){
//echo $_POST['wheels_id'];

        $this->db->set('status','2');
        $this->db->where('wheels_id', $_POST['wheels_id']);
        $this->db->update('shop_p_lottery_wheel');
        //echo $this->db->last_query();


    }


    /* 大转盘编辑 */

    public function wheel_edit() {
        $this->common_function->shop_admin_priv("GameOfLottery");//权限
        $store = $this->db->select('store_id,short_store_name,store_name')
            ->from('store')->where_in('ous_type',array(1,2))->where('is_delete',0)->where('store_state',1)->get()->result_array();
        $this->smarty->assign('store',$store);
        $defaultImg = $this->common_function->get_system_value('default_goods_image');
        $this->smarty->assign('defaultImg',$defaultImg);
        $this->smarty->assign('state','');
        $this->smarty->assign('arr',array());
        $this->smarty->display('promotion_wheel_edit.html');
    }

 /*****大转盘修改已有活动**************/


    public  function wheels_update(){
        $this->common_function->shop_admin_priv("GameOfLottery");//权限
        /* $store = $this->db->select('store_id,short_store_name,store_name')
            ->from('store')->where('ous_type',1)->where('is_delete',0)->where('store_state',1)->get()->result_array(); */
        $store = $this->db->select('store_id,short_store_name,store_name')
            ->from('store')->where_in('ous_type',array(1,2))->where('is_delete',0)->where('store_state',1)->get()->result_array();
        $this->smarty->assign('store',$store);
        $defaultImg = $this->common_function->get_system_value('default_goods_image');
        $this->smarty->assign('defaultImg',$defaultImg);
        if($_POST){

//接收到数据后执行修改活动的操作
// free_limit  lottery_time_limit  lottery_time_day_limit

            $post=$this->input->post();
         //   $data['free_limit']=$post['free_limit'];
         //   $data['limit']=$post['lottery_time_limit'];
          //  $data['day_limit']=$post['lottery_time_day_limit'];

          //  $result = $this->db->where('wheels_id =',$_GET['wheels_id'])->update("shop_p_lottery_wheel",$data);

//echo $result;
/*            if($result==true){
                $return = array('state'=>true,'wheels_id'=>$_GET['wheels_id']);
            }else{
                $return  = array('state'=>403,'wheels_id'=>$_GET['wheels_id']);
            }

           echo json_encode($return);*/
            $return = array('state'=>true,'wheels_id'=>$_GET['wheels_id']);
            echo json_encode($return);
            exit;

        }

        if($_GET&&$_GET['state']=='update') {
        	$this->db->select("*");
        	$this->db->where('wheels_id =', $_GET['wheels_id']);
        	$arr = $this->db->get('shop_p_lottery_wheel')->row_array();
        	//活动商品
        	$res = $this->db->select('goods_id,goods_name,goods_marketprice,goods_image')->where('goods_id =', $arr['goods_id'])->get('shop_goods')->row_array();
        	$arr['goods_name'] = $res['goods_name'];
        	$arr['goods_marketprice'] = $res['goods_marketprice'];
        	$arr['wheels_image'] = empty($arr['wheels_image'])?PLUGIN.'data/images/'.$defaultImg:$arr['wheels_image'];
        	//活动店铺
        	$res = $this->db->select('store_id,store_name')->where('store_id =', $arr['store_id'])->get('store')->row_array();
        	$arr['store_name'] = $res['store_name'];
        	$arr['start_time'] = date("Y-m-d", $arr['start_time']);
        	$arr['end_time'] = date("Y-m-d", $arr['end_time']);
        	$this->smarty->assign('state', 'update');
        }else{
        	$arr['wheels_id'] = 0;
        	$arr['goods_name'] = 0;
        	$arr['goods_marketprice'] = 0;
        	$arr['wheels_image'] = 0;
        	$arr['store_name'] =0;
        	$arr['start_time'] = 0;
        	$arr['end_time'] = 0;
        	$arr = $arr['0'];
        	$this->smarty->assign('state', 'add');
        }
        $this->smarty->assign('arr', $arr);
        $this->smarty->display('promotion_wheel_edit.html');
    }


  /*******************修改单个奖品时获取该奖品的信息用于填充*****************/

public function get_one_prize(){
	
	if($_POST['prize_type']==1||$_POST['prize_type']==2){
		$arr = $this->db->select('w.*,c.coupon_name,c.coupon_value,c.coupon_start_time,
				c.coupon_end_time,c.flexible_day,c.time_state,c.coupon_desc')
		->from('shop_p_lottery_wheel_prize w')->join('shop_coupon c','c.coupon_id=w.coupon_id','left')
		->where('w.wheels_prize_id', $_POST['wheels_prize_id'])->get()->row_array();
		$arr['coupon_value'] = !empty($arr['coupon_value'])?$arr['coupon_value']*10:0;
	}else{
		$arr = $this->db->select('*')->where('wheels_prize_id', $_POST['wheels_prize_id'])->get('shop_p_lottery_wheel_prize')->row_array();
		
	}
	if($_POST['prize_type']==5){
		$cash = explode(',',$arr['cash']);
		$arr['cash1'] = $cash[0];$arr['cash2'] = isset($cash[1])?$cash[1]:$cash[0];
	}
	$arr['start_date'] = date('Y-m-d H:i:s',$arr['start_time']);
	$arr['end_date'] = date('Y-m-d H:i:s',$arr['end_time']);
	$arr['prize_percent'] = !empty($arr['prize_percent'])?$arr['prize_percent']:0;
	$arr['prize_percent'] = $arr['prize_percent']*100;
    echo json_encode($arr);
    exit;

}





    public function get_goods_class(){
        $cate_arr = $this->common_function->get_cate_by_parent_id();
        $cate_option = $this->common_function->cate_array_to_option($cate_arr); //分类选项
        echo($cate_option);exit;
    }
    public function goods_search(){

        //print_r($_POST);die;
        $result = array('state'=>false,'data'=>'','msg'=>'操作错误');
        $gc_id = isset($_POST['change_goods_gc_id'])?trim($_POST['change_goods_gc_id']):'';
        $stocks_sn = isset($_POST['change_stocks_sn'])?trim($_POST['change_stocks_sn']):'';
        $search_goods_name = isset($_POST['search_goods_name'])?trim($_POST['search_goods_name']):'';
        $auth_store_id = isset($_POST['store'])?intval($_POST['store']):'';
        $page = !empty($_POST['page'])?trim($_POST['page']):1;
        $total_page = isset($_POST['total_page']) ? trim($_POST['total_page']) : '';
        $rp = 8;
        $start = $rp*($page-1);
//        var_dump ($auth_store_id);
        //$sql1 = " select g.goods_marketprice,g.goods_id,g.goods_pos,g.goods_name,g.goods_image"
        $this->db->from('shop_goods g')
            ->join('shop_goods_extend_attr ge','ge.goods_id=g.goods_id')
            ->join('shop_goods_class c','c.gc_id=g.gc_id','left')
            ->join('store_attr_brands b','b.brand_id=g.brand_id','left')
            ->join('store_stocks_amount sa','sa.goods_ea_id=ge.goods_ea_id and sa.ssa_store_id='.$auth_store_id,'left');
        if($gc_id){
            //$this->db->where ('g.gc_id', $gc_id);
        }
        if($stocks_sn){
            $this->db->group_start();
            $this->db->like('g.goods_spu', $stocks_sn);
            $this->db->or_group_start();
            $this->db->like('ge.stocks_sku', $stocks_sn);
            $this->db->group_end();
            $this->db->group_end();
        }
        if($search_goods_name){
            $this->db->group_start();
            $this->db->like('g.goods_name', $search_goods_name);
            $this->db->or_like('g.goods_spu', $search_goods_name);
            $this->db->or_like('g.brand_name', $search_goods_name);
            $this->db->group_end();
        }
        $this->db->where('sa.amount is not null');
        $this->db->where('g.goods_state',1);
        $this->db->group_start();
        $this->db->group_start();
        $this->db->where('g.goods_pos', 0);
        $this->db->where('b.store_id', $auth_store_id);
        $this->db->group_end();
        $this->db->or_group_start();
        $this->db->where('g.goods_pos', $auth_store_id);
        $this->db->group_end();
        $this->db->group_end();
        $db = clone($this->db);
        $db1 = clone($this->db);
        $total_rows = $this->db->select('g.goods_id')->group_by('g.goods_id')->get()->result_array();
        $total = count($total_rows);
        $this->db = $db;
        //$this->db->select('sum(sa.amount) as total_num,g.goods_marketprice,g.goods_id,g.goods_pos,g.goods_name,g.brand_id,g.brand_name,g.gc_id,g.gc_name,g.goods_image,g.goods_spu,g.weight,g.season_to_market,g.year_to_market,g.sex,c.weight as c_weight');
        $this->db->select('g.goods_marketprice,g.goods_id,g.goods_pos,g.goods_name,g.goods_image');

        $rows = $this->db->group_by('g.goods_id')->limit($rp,$start)->get()->result_array();
//        print_r($this->db->last_query());die;
        $total_page = ceil($total/$rp);
        //$rows = $this->db->group_by('ge.goods_a_id')->limit($rp,$start)->get()->result_array();
        //print_r($limit_rows);print_r($total);die;

        //print_r($this->db->last_query());die;
        $goods_sku = array();
        $sexs = array(2 => '男', 1 => '女', 0 => '中性');
        $season = array(1 => 'Q1', 2 => 'Q2', 3 => 'Q3',4=>'Q4');
        foreach ($rows as $k=>$v){
            $v['goods_image'] = img_http($v['goods_image']);
            /* $v['weight'] = ($v['weight']>0)?$v['weight']:$v['c_weight'];
            $v['sex'] = isset($sexs[$v['sex']])?$sexs[$v['sex']]:'';
            $v['time_market'] = isset($season[$v['season_to_market']])?$v['year_to_market'].$season[$v['season_to_market']]:$v['year_to_market'].''; */
            $rows[$k] = $v;

        }
        //print_r($goods_sku);die;
        if(!empty($rows)){
            $result = array('state'=>true,'data'=>$rows,'msg'=>'','page'=>$page,'total_page'=>$total_page,'rp'=>$rp,'total'=>$total);
            // $result = array('state'=>true,'data'=>$goods_data,'page'=>$page,'total_page'=>$total_page,'rp'=>$rp);
        }else{
            $result = array('state'=>false,'data'=>'','msg'=>'没有查到符合条件的数据！');
        }
        echo json_encode($result);die;
        //print_r($goods_sku);die;

    }


    // yu


    /* 大转盘奖品添加  */
    public function wheel_prize_add()
    {

        // print_r($_POST);die;
        if ($_POST) {
            $prize_type = $_POST['prize_type'];
            $wheels_prize_id = isset($_POST['wheels_prize_id']) ? intval ($_POST['wheels_prize_id']) : '';//奖品id,也等同于shop_coupon表中的coupon_id,如果为空，则是新增，否则是编辑
//var_dump ($wheels_prize_id);die;
            //满减优惠券
            if ($prize_type == 2) {
                //插入满减优惠券表
                // $data['wheels_id']=$_POST['wheels_id'];
                $wheels_goods = $this->db->select ('store_id,goods_id')->where ('wheels_id', $_POST['wheels_id'])->get ('shop_p_lottery_wheel')->row_array ();

                //插入优惠券表shop_coupon
                $data['limit_store_type'] = '1';
                $data['limit_goods_type'] = '2';
                $data['limit_store'] = !empty($wheels_goods['store_id']) ? $wheels_goods['store_id'] : '';
                $data['limit_goods'] = !empty($wheels_goods['goods_id']) ? $wheels_goods['goods_id'] : '';
                $data['limit_goods_type'] = '2';
                $data['coupon_name'] = $_POST['coupon_name'];
                $data['coupon_value'] = $_POST['face_value'];
                $data['coupon_type'] = $prize_type;

//                $data['coupon_order_limit'] = $_POST['coupon_start'];
                $data['coupon_start_time'] = empty($_POST['start_sale_time']) ? 0 : strtotime ($_POST['start_sale_time']);
                $data['coupon_end_time'] = empty($_POST['end_sale_time']) ? 0 : strtotime ($_POST['end_sale_time']);
                $data['flexible_day'] = $_POST['flexible_time'];
                $data['time_state'] = $_POST['state'];
                $data['coupon_activity_type'] = 5;
                $this->db->insert ('shop_coupon', $data);
                $coupon_id = $this->db->insert_id ('shop_coupon');//*
                $data = array ();
                //插入奖品shop_p_lottery_wheel_prize
                $data['coupon_id'] = $coupon_id;
                $data['wheels_id'] = $_POST['wheels_id'];
                $data['prize_type'] = $_POST['prize_type'];

                //yu

                $data['prize_percent'] = $_POST['prize_percent'] / 100;
                $data['prize_limit'] = $_POST['prize_limit'];
                $data['prize_have'] = $_POST['prize_num'];
                $data['prize_num'] = $_POST['prize_num'];
                $data['start_time'] = !empty($_POST['start_sale_time']) ? strtotime ($_POST['start_sale_time']) : '';
                $data['end_time'] = !empty($_POST['end_sale_time']) ? strtotime ($_POST['end_sale_time']) : '';
                $this->db->insert ('shop_p_lottery_wheel_prize', $data);


                $res = $this->db->insert_id ();//最后一条插入数据的id
            }


//折扣优惠券
            if ($prize_type == 1) {
                $wheels_goods = $this->db->select ('store_id,goods_id')->where ('wheels_id', $_POST['wheels_id'])->get ('shop_p_lottery_wheel')->row_array ();

                //插入优惠券表shop_coupon
                $data['limit_store_type'] = '1';
                $data['limit_goods_type'] = '2';
                $data['limit_store'] = !empty($wheels_goods['store_id']) ? $wheels_goods['store_id'] : '';
                $data['limit_goods'] = !empty($wheels_goods['goods_id']) ? $wheels_goods['goods_id'] : '';
                $data['coupon_name'] = $_POST['coupon_name'];
                $data['coupon_type'] = $prize_type;
                $data['coupon_value'] = empty($_POST['discount']) ? 0 : ($_POST['discount']) / 10;
                //       $data['coupon_start']=$_POST['coupon_start'];  本商品进行折扣
                // $data['wheels_id']=$_POST['wheels_id'];
                $data['coupon_start_time'] = empty($_POST['start_sale_time']) ? 0 : strtotime ($_POST['start_sale_time']);
                $data['coupon_end_time'] = empty($_POST['end_sale_time']) ? 0 : strtotime ($_POST['end_sale_time']);
                $data['flexible_day'] = $_POST['flexible_time'];
                //$data['time_state']=$_POST['state'];
                $data['time_state'] = 0;
                if (empty($wheels_prize_id)) {
                    $data['coupon_activity_type'] = 5;
                    $this->db->insert ('shop_coupon', $data);
                    $coupon_id = $this->db->insert_id ('shop_coupon');//*
                }

                //   print_r($this->db->last_query());die;

                $data = array ();

//插入奖品shop_p_lottery_wheel_prize
                if (empty($wheels_prize_id)) {
                    $data['coupon_id'] = $coupon_id;
                    $data['wheels_id'] = $_POST['wheels_id'];
                    $data['prize_type'] = $_POST['prize_type'];
                    $data['prize_percent'] = $_POST['prize_percent'] / 100;
                    $data['prize_limit'] = $_POST['prize_limit'];
                    $data['prize_have'] = $_POST['prize_num'];
                    $data['prize_num'] = $_POST['prize_num'];
                    $data['start_time'] = !empty($_POST['start_sale_time']) ? strtotime ($_POST['start_sale_time']) : '';
                    $data['end_time'] = !empty($_POST['end_sale_time']) ? strtotime ($_POST['end_sale_time']) : '';
                    $this->db->insert ('shop_p_lottery_wheel_prize', $data);
                    $res = $this->db->insert_id ();
                } else {
                    $data['prize_percent'] = $_POST['prize_percent'] / 100;
                    $data['prize_limit'] = $_POST['prize_limit'];
                    $data['prize_have'] = $_POST['prize_num'];

                    $this->db->where ('wheels_prize_id', $wheels_prize_id)->update ('shop_p_lottery_wheel_prize', $data);
                    $res = $wheels_prize_id;
                }

            }


//积分
            if ($prize_type == 3) {
                $wheels_goods = $this->db->select('store_id,goods_id')->where('wheels_id',$_POST['wheels_id'])->get('shop_p_lottery_wheel')->row_array();
                $data['coupon_name'] = $_POST['coupon_name'];
                $data['coupon_type'] = $prize_type;
                $data['limit_store'] = !empty($wheels_goods['store_id']) ? $wheels_goods['store_id'] : '';
//                var_dump ($data['coupon_name']);die;
                $data['coupon_value'] = empty($_POST['point']) ? 0 : intval ($_POST['point']);
                //       $data['coupon_start']=$_POST['coupon_start'];  本商品进行折扣
                // $data['wheels_id']=$_POST['wheels_id'];
                $data['coupon_start_time'] = empty($_POST['start_sale_time']) ? 0 : strtotime ($_POST['start_sale_time']);
                $data['coupon_end_time'] = empty($_POST['end_sale_time']) ? 0 : strtotime ($_POST['end_sale_time']);
                $data['flexible_day'] = $_POST['flexible_time'];
                //$data['time_state']=$_POST['state'];
                $data['time_state'] = 0;
                if (empty($wheels_prize_id)) {
                    $data['coupon_activity_type'] = 5;
                    $this->db->insert ('shop_coupon', $data);
                    $coupon_id = $this->db->insert_id ('shop_coupon');//*
                }

                $data = array ();

                if (empty($wheels_prize_id)) {
                    $data['wheels_id'] = $_POST['wheels_id'];
                    $data['prize_type'] = $_POST['prize_type'];
                    $data['point'] = $_POST['point'];
                    $data['coupon_id'] = $coupon_id;
                    $data['prize_percent'] = $_POST['prize_percent'] / 100;
                    $data['prize_limit'] = $_POST['prize_limit'];
                    $data['prize_have'] = $_POST['prize_num'];
                    $data['prize_num'] = $_POST['prize_num'];
                    $data['start_time'] = !empty($_POST['start_sale_time']) ? strtotime ($_POST['start_sale_time']) : '';
                    $data['end_time'] = !empty($_POST['end_sale_time']) ? strtotime ($_POST['end_sale_time']) : '';
                    $this->db->insert ('shop_p_lottery_wheel_prize', $data);
                    $res = $this->db->insert_id ();
                } else {

                    $data['prize_percent'] = $_POST['prize_percent'] / 100;
                    $data['prize_limit'] = $_POST['prize_limit'];
                    $data['prize_have'] = $_POST['prize_num'];

                    $this->db->where ('wheels_prize_id', $wheels_prize_id)->update ('shop_p_lottery_wheel_prize', $data);
                    $res = $wheels_prize_id;
                }

            }
//红包
            if ($prize_type == 5) {
                $wheels_goods = $this->db->select ('store_id,goods_id')->where ('wheels_id', $_POST['wheels_id'])->get ('shop_p_lottery_wheel')->row_array ();
                $data['coupon_name'] = $_POST['coupon_name'];
                $data['coupon_type'] = $prize_type;
                $data['coupon_value'] = $_POST['cash'] . ',' . $_POST['cash_max'];
                $data['limit_store'] = !empty($wheels_goods['store_id']) ? $wheels_goods['store_id'] : '';
//                var_dump ($data1['coupon_value']);die;
                //       $data['coupon_start']=$_POST['coupon_start'];  本商品进行折扣
                // $data['wheels_id']=$_POST['wheels_id'];
                $data['coupon_start_time'] = empty($_POST['start_sale_time']) ? 0 : strtotime ($_POST['start_sale_time']);
                $data['coupon_end_time'] = empty($_POST['end_sale_time']) ? 0 : strtotime ($_POST['end_sale_time']);
                $data['flexible_day'] = $_POST['flexible_time'];
                //$data['time_state']=$_POST['state'];
                $data['time_state'] = 0;
                if (empty($wheels_prize_id)) {
                    $data['coupon_activity_type'] = 5;
                    $this->db->insert ('shop_coupon', $data);
                    $coupon_id = $this->db->insert_id ('shop_coupon');//*


                    $data = array ();
                    if (empty($wheels_prize_id)) {
                        $data['cash'] = $_POST['cash'] . ',' . $_POST['cash_max'];
                        $data['wheels_id'] = $_POST['wheels_id'];
                        $data['prize_type'] = $_POST['prize_type'];
                        $data['coupon_id'] = $coupon_id;
                        //    $data['cash']=$_POST['cash'];
                        $data['prize_percent'] = $_POST['prize_percent'] / 100;
                        $data['prize_have'] = $_POST['prize_num'];
                        $data['prize_num'] = $_POST['prize_num'];
                        $data['prize_limit'] = $_POST['prize_limit'];
                        $data['start_time'] = !empty($_POST['start_sale_time']) ? strtotime ($_POST['start_sale_time']) : '';
                        $data['end_time'] = !empty($_POST['end_sale_time']) ? strtotime ($_POST['end_sale_time']) : '';
                        $this->db->insert ('shop_p_lottery_wheel_prize', $data);
                        $res = $this->db->insert_id ();
                    } else {
                        $data['prize_percent'] = $_POST['prize_percent'] / 100;
                        $data['prize_limit'] = $_POST['prize_limit'];
                        $data['prize_have'] = $_POST['prize_num'];

                        $this->db->where ('wheels_prize_id', $wheels_prize_id)->update ('shop_p_lottery_wheel_prize', $data);
                        $res = $wheels_prize_id;
                    }

                }
            }


                if (!empty($res)) {
                    $result = array ('state' => 1, 'wheels_id' => $_POST['wheels_id'], 'wheels_prize_id' => $res, 'data' => '', 'msg' => '插入正确');
                } else {
                    $result = array ('state' => false, 'data' => '', 'wheels_id' => $_POST['wheels_id'], 'wheels_prize_id' => '', 'msg' => '插入错误');
                }


                echo json_encode ($result);
                die;
            }

        }


   /***********概率校验*************/

public function check_chance(){
    $this->db->select('a.wheels_prize_id,a.prize_percent')
        ->from('shop_p_lottery_wheel_prize a')
        ->join('shop_p_lottery_wheel b','b.wheels_id=a.wheels_prize_id','left')
        ->where('a.wheels_id =',$_POST['wheels_id']);
    if(!empty($_POST['wheels_prize_id'])){
    	$this->db->where('a.wheels_prize_id !='.$_POST['wheels_prize_id']);
    }
    $arr=$this->db->get()->result_array();
   // $arr=$this->db->last_query();

$count=0;
    foreach($arr as $v){
        $count +=$v['prize_percent'];
    }

   if( $count*100+$_POST['value']>100) {
       echo $count*100;
   }else{
       echo "ok";
   }
  ;



    exit;

}




    /* 大转盘奖品库存修改   */
    public function wheel_stock_edit(){

//var_dump($_POST);

        $this->db->set('prize_have',$_POST['prize_have']);
        $this->db->where('wheels_prize_id', $_POST['wheels_prize_id']);
        $this->db->update('shop_p_lottery_wheel_prize');

    }



public function wheel_prize_edit(){


    if ($_POST) {

       $prize_type=$_GET['prize_type'];
        $wheels_prize_id=$_GET['wheels_prize_id'];
        $coupon_id=$this->db->select('coupon_id')->get('shop_p_lottery_wheel_prize')->row();



//满减优惠券
        if($prize_type==2){
            //插入满减优惠券表
            // $data['wheels_id']=$_POST['wheels_id'];
            $data['coupon_id']= $coupon_id;
            $data['limit_goods_type']='2';
       //     $data['coupon_name']=$_POST['coupon_name'];
        //    $data['coupon_denomination']=$_POST['face_value'];

//            $data['coupon_order_limit']=$_POST['coupon_start'];
            $data['coupon_start_time']=empty($_POST['start_time'])?0:strtotime($_POST['start_time']);
            $data['coupon_end_time']=empty($_POST['end_time'])?0:strtotime($_POST['end_time']);
            $data['flexible_day']=$_POST['flexible_time'];
            $data['time_state']=$_POST['state'];
            $this->db->where('coupon_id =',$coupon_id)->update('shop_coupon', $data);

            $data=array();




            //插入奖品shop_p_lottery_wheel_prize
            $data['wheels_prize_id']=$wheels_prize_id;
            $data['coupon_id']=$coupon_id;
            $data['wheels_id']=$_POST['wheels_id'];
       //     $data['prize_type']=$_POST['prize_type'];

            //yu

            $data['prize_percent']=$_POST['prize_percent']/100;
            $data['prize_limit']=$_POST['prize_limit'];
            $data['prize_have']=$_POST['prize_num'];
            $data['prize_num']=$_POST['prize_num'];
            $this->db->where('wheels_prize_id =',$wheels_prize_id)->update('shop_p_lottery_wheel_prize', $data);

           // echo $this->db->last_query();
            exit;

        }





//折扣优惠券
        if($prize_type==1){

            //插入优惠券表
            $data['limit_goods_type']='2';
        //    $data['coupon_name']=$_POST['coupon_name'];
         //   $data['coupon_discount']=$_POST['discount'];
            //       $data['coupon_start']=$_POST['coupon_start'];  本商品进行折扣
            // $data['wheels_id']=$_POST['wheels_id'];
            $data['coupon_start_time']=empty($_POST['start_time'])?0:strtotime($_POST['start_time']);
            $data['coupon_end_time']=empty($_POST['end_time'])?0:strtotime($_POST['end_time']);
            $data['flexible_day']=$_POST['flexible_time'];
            //$data['time_state']=$_POST['state'];
            $data['time_state']=0;
            $this->db->where('coupon_id =',$coupon_id)->update('shop_coupon', $data);

            //   print_r($this->db->last_query());die;

            $data='';

//插入奖品shop_p_lottery_wheel_prize
            $data['wheels_prize_id']=$wheels_prize_id;
            $data['wheels_id']=$_POST['wheels_id'];
          //  $data['prize_type']=$_POST['prize_type'];
            $data['prize_percent']=$_POST['prize_percent']/100;
            $data['prize_limit']=$_POST['prize_limit'];
            $data['prize_have']=$_POST['prize_num'];
            $data['prize_num']=$_POST['prize_num'];
            $this->db->where('wheels_prize_id =',$wheels_prize_id)->update('shop_p_lottery_wheel_prize', $data);
            $res=$this->db->insert_id();
        }



//红包
        if($prize_type==3){
            $data['wheels_prize_id']=$wheels_prize_id;
            $data['wheels_id']=$_POST['wheels_id'];
         //   $data['prize_type']=$_POST['prize_type'];
        //    $data['point']=$_POST['point'];
            $data['prize_percent']=$_POST['prize_percent']/100;
            $data['prize_limit']=$_POST['prize_limit'];
            $data['prize_have']=$_POST['prize_num'];
            $data['prize_num']=$_POST['prize_num'];
            $this->db->where('wheels_prize_id =',$wheels_prize_id)->update('shop_p_lottery_wheel_prize', $data);

        }
//积分
        if($prize_type==5){
            $data['wheels_prize_id']=$wheels_prize_id;
            $data['wheels_id']=$_POST['wheels_id'];
            $data['coupon_id']=$coupon_id;
           // $data['prize_type']=$_POST['prize_type'];
         //   $data['cash']=$_POST['cash'];
            $data['prize_percent']=$_POST['prize_percent']/100;
            $data['prize_have']=$_POST['prize_num'];
            $data['prize_num']=$_POST['prize_num'];
            $data['prize_limit']=$_POST['prize_limit'];
            $this->db->where('wheels_prize_id =',$wheels_prize_id)->update('shop_p_lottery_wheel_prize', $data);

        }



/*        if($res){
            $result = array('state'=>1,'wheels_id'=>$_POST['wheels_id'],'data'=>'','msg'=>'插入正确');
        }else{
            $result = array('state'=>403,'data'=>'','wheels_id'=>$_POST['wheels_id'],'msg'=>'插入错误');
        }*/


        echo json_encode('1');die;
    }


}




//end


    /* 刮刮卡 */

    //获取店铺信息
    public function ajax_get_stores_info() {
        $data = array('state' => true, 'msg' => '');
        $storeName = isset($_GET['storeName']) ? $_GET['storeName'] : false;
        $this->db->select('store_id,store_name')->from('store');
        if($storeName){
            $this->db->like('store_name',$storeName);
        }
        $store_info = $this->db->get()->result_array();
        $data['info'] = !empty($store_info) ? $store_info :false;
        echo json_encode($data);
        exit;
    }
    //获取分类（优惠券）
    public function ajax_get_class_use_coupon() {
        $data = array('state' => true, 'msg' => '');
        $parent_id = isset($_GET['parent_id']) && !empty($_GET['parent_id']) ? $_GET['parent_id'] : 0;
        $show_list = isset($_GET['show_list']) ? $_GET['show_list'] : false;
        $type = isset($_GET['type']) ? $_GET['type'] : 1;
        if($type==2){
            $cate_arr = $this->goods_model->get_gstn_by_parent_id($parent_id);
            if($show_list){
                $gstn_id = 0;
                $cate_option = $this->goods_model->gstn_array_to_option($cate_arr, $gstn_id); //分类选项(需要拼接分类名称)
                $data['list'] = !empty($cate_option) ? $cate_option : false;
            }else{
                $data['info'] = !empty($cate_arr) ? $cate_arr :false;
            }
        }else{
            if(!empty($parent_id) || $type==1){
                $cate_arr = $this->goods_model->get_cate_by_parent_id($parent_id);
            }else{
                $cate_arr = $this->goods_model->get_cate_by_parent_id($parent_id,false);
            }
            if($show_list){
                $cate_option = $this->goods_model->cate_array_to_option($cate_arr, 0);//分类选项 
                $data['list'] = !empty($cate_option) ? $cate_option : false;
            }else{
                $data['info'] = !empty($cate_arr) ? $cate_arr :false;
            }
        }
        echo json_encode($data);
        exit;
    }
    //获取商品（优惠券）
    public function ajax_get_goods_use_coupon() {
        $data = array('state' => true, 'msg' => '');
        $cate_id = isset($_GET['cate_id']) ? $_GET['cate_id'] : false;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $rp = isset($_GET['rp']) ? $_GET['rp'] : 8;

        $start = ($page - 1) * $rp;
        $cate_type = isset($_GET['cate_type']) ? $_GET['cate_type'] : false;
        $cate = isset($_GET['cate']) ? $_GET['cate'] : false;
        $goods_name = isset($_GET['goods_name']) ? $_GET['goods_name'] : false;
        $this->db->select('sg.goods_id,sg.goods_spu,sg.goods_name,sg.goods_price,sg.goods_marketprice');
        $this->db->from('shop_goods sg');
        if($cate_type && !empty($cate)){
            if($cate_type==2){
                $this->db->join('shop_goods_attr_self_taxonomy as sgast','sgast.goods_id=sg.goods_id','left');
                $this->db->where('gstn_id',$cate);
            }else{
                $this->db->where('gc_id',$cate_id);
            }
        }
        if($goods_name){
            $this->db->where('(goods_name like "%'.$goods_name.'%" or goods_spu like "%'.$goods_name.'%")');
        }
        $this->db->where("(sg.goods_pos = 0 or sg.goods_pos is NULL)"); //总库商品
        $this->db->where("sg.goods_state != 0"); //未删除的
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
        $this->db->limit($rp, $start);
        $goods = $this->db->get()->result_array();


        $data['info'] = !empty($goods) ? $goods :false;
        $data['pages'] = ceil($total/$rp);
        echo json_encode($data);
        exit;
    }
    //获取品牌（优惠券）
    public function ajax_get_brands_use_coupon() {
        $data = array('state' => true, 'msg' => '');
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $rp = isset($_GET['rp']) ? $_GET['rp'] : 30;

        $start = ($page - 1) * $rp;
        $brand_name = isset($_GET['brands_name']) && !empty($_GET['brands_name'])? $_GET['brands_name'] : false;
        $this->db->select('b.brand_id,b.brand_name,b.brand_initial,b.brand_class,b.brand_sort');
        $this->db->from('shop_brand b');
        if($brand_name){
            $this->db->like('b.brand_name',$brand_name);
        }
        $this->db->order_by("b.brand_sort");
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
        $this->db->limit($rp, $start);
        $brands = $this->db->get()->result_array();

        $data['info'] = !empty($brands) ? $brands :false;
        $data['pages'] = ceil($total/$rp);
        echo json_encode($data);
        exit;
    }
}

?>