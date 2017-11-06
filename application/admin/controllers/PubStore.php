<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PubStore extends CI_Controller {

    /**
     * Index Page for this controller.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model ('goods_model');
        $this->load->model ('stores_model');
        $this->load->library('shop');
    }

    public function ajax_get_year_to_market() {
        $data = array('state' => true, 'msg' => '');
        //openid获取用户信息
        $this->db->select('goods_id,year_to_market');
        $this->db->from('shop_goods');
        $this->db->group_by('year_to_market');
        $this->db->order_by('year_to_market',"DESC");
        $yearinfo = $this->db->get()->result_array();
        $year_option = $this->goods_model->year_array_to_option($yearinfo); //年份选项
        $data['info'] = $year_option;
        echo json_encode($data);
        exit;
    }


    public function ajax_get_cate_option() {
        $data = array('state' => true, 'msg' => '');
        //        var_dump($_GET['cate_id']);exit;
        $cate_id = !empty($_GET['class_id']) ? $_GET['class_id'] : 0;
        $cate_arr = $this->goods_model->get_cate_by_parent_id(0);
        $cate_option = $this->goods_model->cate_array_to_option($cate_arr, $cate_id); //分类选项
        $data['info'] = $cate_option;
        echo json_encode($data);
        exit;
    }


    //通过分类获取品牌
    public function ajax_get_brands_by_class() {
        $this->common_function->shop_admin_priv("depot_inplode");//权限
        $data = array('state' => true, 'msg' => '');
        $cate_id = !empty($_GET['class_id']) ? $_GET['class_id'] : false;
        $cate_option = $this->goods_model->get_brands_by_class($cate_id);
        $data['info'] = $cate_option;
        echo json_encode($data);
        exit;
    }


    /*店铺管理*/
    public function store_management(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if(isset($_GET['op'])&&$_GET['op']=='stop')
        {
            $this->smarty->assign('op',$_GET['op']);
        }
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
            $wheres = 'store_state = 1 and ous_type = 1 and is_delete = 0 ';
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
            $wheres = 'store_state = 1 and  ous_type = 2  and is_delete = 0 ';
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
            $wheres = 'store_state = 1 and  ous_type = 3  and is_delete = 0 ';
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
            $wheres = "store_state = 1 and is_delete = 0 ";
        }


        $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial,sb.brand_class,sb.brand_pic,sb.brand_sort,sb.brand_recommend,sb.class_id,sb.show_type');
        $this->db->from('shop_brand as sb');
        $this->db->order_by('brand_initial');
        $brands = $this->db->get()->result_array();
        $this->smarty->assign('brands',$brands);

        $store = $this->db->select('store_id,store_name')->where($wheres)->get('store')->result_array();
        $this->smarty->assign('store',$store);


        $area = $this->common_function->get_area_info();
        $this->smarty->assign('area',$area);

        $this->smarty->assign('role',$role);
        $this->smarty->display ('public_store_management.html');
    }


    /*获取店铺列表*/
    public function get_store_list(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $default_pic = TEMPLE.'img/default_goods_image_240.gif';
        $op = isset($_GET['op'])?trim($_GET['op']):'';
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        //$sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        //$sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        //$store_cate = isset($_GET['store_cate'])?trim($_GET['store_cate']):'';
        //$store_type = isset($_GET['store_type'])?trim($_GET['store_type']):'';
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $store_id = isset($_GET['store_id'])?trim($_GET['store_id']):'';
        $store_province = isset($_GET['store_province'])?trim($_GET['store_province']):'';
        $store_city = isset($_GET['store_city'])?trim($_GET['store_city']):'';
        $store_area = isset($_GET['store_area'])?trim($_GET['store_area']):'';
        $brand_code = isset($_GET['brand_code'])?$_GET['brand_code']:'';
        $tel_num = isset($_GET['tel_num'])?$_GET['tel_num']:'';
        if($role=='w'){//微商城
            $where = 'ous_type = 1 and is_delete = 0 ';
        }elseif ($role=='d'){//电商店
            $where = 'ous_type = 2  and is_delete = 0 ';
        }elseif ($role=='g'){//供应仓库
            $where = 'ous_type = 3  and is_delete = 0 ';
        }else{//平台
            $where = "1 = '1'  and is_delete = 0 ";
        }

        if(!empty($op)&&$op=='stop'){
            $where .=" and store_state!=1 ";
        }else{
            $where .=" and store_state=1 ";
        }
        if(!empty($store_id)){
            $where .=" and store_id = '{$store_id}' ";
        }
        /*if(!empty($store_cate)){
            $where .=" and ous_cate = $store_cate ";
        }
        if(!empty($store_type)){
         $where .=" and ous_type = $store_type ";
         }*/

        if(!empty($tel_num)){
            $where .=" and ous_tel = '{$tel_num}' ";
        }

        if(!empty($store_area)){
            $where .=" and area_id = $store_area ";
        }elseif(!empty($store_city)){
            $where .=" and city_id = $store_city ";
        }elseif(!empty($store_province)){
            $where .=" and province_id = $store_province ";
        }
        if(!empty($brand_code)){
            $sql = " select group_concat(a.store_id) as brand_store_id from ".$this->db->dbprefix('store_attr_brands')." as a  where a.brand_id=".$brand_code;
            $storeBid = $this->db->query($sql)->row('brand_store_id');
            if(!empty($storeBid)){
                $where .=" and store_id IN ($storeBid) ";
            }else{
                $where .=" and 1=2 ";
            }
        }
        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }
        $total = $this->common_function->total('store', $where);
        /*         if ($sortname && $sortorder){
                    $where .= " order by {$sortname} {$sortorder}";
                } */
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('store', $where);
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        //$store_type = array('1'=>'加盟店','2'=>'直营店','3'=>'旗舰店','4'=>'商场超市店',);
        //$store_cate = array('1'=>'线上','2'=>'线下','3'=>'线上线下店',);
        foreach($rows as $row){
            if($row['is_wx_store']){
                if($row['is_wx_store_type']==1){
                    $is_wx_store_type = "(淘宝店)";
                }elseif ($row['is_wx_store_type']==2){
                    $is_wx_store_type = "(天猫店)";
                }else{
                    $is_wx_store_type = "(京东店)";
                }
            }else{
                $is_wx_store_type = "";
            }
            
            $xml .= "<row id='".$row['store_id']."'>";
            $store_state = ($row['store_state']==1)?'暂停营业':'开启营业';
            $store_data = json_encode(array('store_id'=>$row['store_id'],'state'=>$row['store_state'],'name'=>$row['store_name']));
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['store_id'] .",".json_encode($row['store_name']) .")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                         <ul>
    		                <li><a onclick=fg_edit(" .$row['store_id'] . ")>编辑店铺</a></li>
    		                <li><a onclick='update_ad_managements(" . $row['store_id'] .",".json_encode($row['store_name']) .")'>".$store_state."</a></li>
    	                    <li><a onclick=call_code(". $row['store_id'] .")>下载二维码</a></li>
        	                    <li><a href='store_of_goods?role=".$role."&op=edit&id={$row['store_id']}'>商品管理</a></li>
        	                    <li><a href='store_of_shopping_guide?role=".$role."&op=edit&id={$row['store_id']}'>导购管理</a></li>";
            $xml .= "</ul></span>]]></cell>";
            $logo = base_url($row['ous_logo']);
            if(!empty($row['ous_logo'])&&file_exists(ROOTPATH.$row['ous_logo'])){
                $logo = base_url($row['ous_logo']);
            }else{
                $logo = $default_pic;
            }
            $xml .= '<cell><![CDATA[<i class="fa fa-photo" aria-hidden="true" data-geo="<img src=\''.$logo.'\'>"></i>]]></cell>';
            $xml .= "<cell><![CDATA[<span title='{$row['store_name']}'>".$row['store_name'].$is_wx_store_type."</span>]]></cell>";
            $spg_num = $this->db->select('count(1) as num')->where('spg_store_id',$row['store_id'])->get('store_shopping_guide')->row('num');
            $xml .= "<cell><![CDATA[".$spg_num."]]></cell>";
            if(empty($role)){
                //$store_type = array('1'=>'实体店','2'=>'电商店','3'=>'供应店');
                $str = '';
                if($row['ous_type']==1){
                    $str = '实体店';
                }elseif ($row['ous_type']==2){
                    $str = '电商店';
                }elseif ($row['ous_type']==3){
                    $str = '供应店';
                }else{
                    $str = '--';
                }
                $xml .= "<cell><![CDATA[".$str."]]></cell>";
            }elseif($role=='w'){
                $xml .= "<cell><![CDATA[".($row['ous_cate']==1?'线上':($row['ous_cate']==2?'线下':'线上线下'))."]]></cell>";
            }elseif ($role=='d'){
                $xml .= "<cell><![CDATA[电商门店]]></cell>";
            }elseif ($role=='g'){
                $xml .= "<cell><![CDATA[供应门店]]></cell>";
            }





            // $xml .= "<cell><![CDATA[".$store_type[$row['ous_tag']]."]]></cell>";
            $auth_brand = $this->db->select('group_concat(b.brand_name) as brand')->from('store_attr_brands as sb')
                ->join('shop_brand as b','b.brand_id=sb.brand_id','left')
                ->where('sb.store_id',$row['store_id'])->get()->row('brand');
            $xml .= "<cell><![CDATA[<span title='{$auth_brand}'>".$auth_brand."</span>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['follow_user_percentage']."]]></cell>";
            $order_take_percentage = unserialize($row['order_take_percentage']);

            $order_take_percentage['offline'] = (!isset($order_take_percentage['offline'])||$order_take_percentage['offline']=='')?'--':$order_take_percentage['offline'];
            $order_take_percentage['system'] = (!isset($order_take_percentage['system'])||$order_take_percentage['system']=='')?'--':$order_take_percentage['system'];
            $order_take_percentage['agent'] = (!isset($order_take_percentage['agent'])||$order_take_percentage['agent']=='')?'--':$order_take_percentage['agent'];
            $order_take_percentage['online'] = (!isset($order_take_percentage['online'])||$order_take_percentage['online']=='')?'--':$order_take_percentage['online'];

            $str = "<span>门店：".$order_take_percentage['offline']."  &nbsp;</span>".
                "<span>微商：".$order_take_percentage['system']."  &nbsp;</span>".
                "<span>分销：".$order_take_percentage['agent']."  &nbsp;</span>".
                "<span>电商：".$order_take_percentage['online']."</span>";

            $xml .= "<cell><![CDATA[".$str."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['ous_tel']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['ous_address']."]]></cell>";

            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }


    /*店铺删除*/
    public function store_del(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }

        $id = isset($_POST['id'])?trim($_POST['id']):'';
        if($id){
            $idarr = array();
            if(stripos($id,",")!==false){
                $idarr = explode(',',$id);
            }else{
                $idarr = array($id);
            }
            if(!empty($idarr)){
                $err_msg=array();
                $succ_num = 0;
                $false_num = 0;
                foreach ($idarr as $k=>$v){
                    $flag_msg = true;
                    $store_name = $this->db->select ('store_name')->where ('store_id', $v)->get ('store')->row ('store_name');
                    //检查是否有绑定导购
                    $total = $this->db->select('count(1) as num')->from('store_shopping_guide')->where('spg_store_id',$v)->get()->row('num');
                    if($total){
                        // $result = array('state'=>false,'msg'=>'所选店铺中还有未离职的导购，不能删除');
                        $flag_msg = false;
                    }

                    //检查门店是否含有资金
                    $balance = $this->db->select('balance')->from('store')->where('store_id',$v)->get()->row('balance');
                    if($balance!=0){
                        // $result = array('state'=>false,'msg'=>'所选店铺中还有资金未提现/转账，不能删除');
                        $flag_msg = false;
                    }

                    //检查门店是否有未完成订单
                    $order_goods = $this->db->select ('order_sn,order_status')->where ('store_id', $v)->get ('shop_order')->result_array ();
                    if(!empty($order_goods)){
                        foreach ($order_goods as $ks=>$vs){
                            if($vs['order_status'] >0 && $vs['order_status'] <50 ){
                                $flag_msg = false;
                                break;
                            }
                        }
                    }

                    //检查门店是否有未完成订单
                    $refund = $this->db->select ('refund_id,refund_state')->where ('store_id', $v)->get ('shop_order_refund_return')->result_array ();
                    if(!empty($refund)){
                        foreach ($refund as $ks=>$vs){
                            if(!($vs['refund_state'] ==3 || $vs['refund_state'] ==4) ){
                                $flag_msg = false;
                                break;
                            }
                        }
                    }

                    if($flag_msg){
                        if($this->db->where("store_id = '{$v}'")->update('store',array("is_delete"=>1))){
                            $succ_num+=1;
                        }
                    }else{
                        $false_num +=1;
                        $err_msg[] = array('sotre_id'=>$v,"store_name"=>$store_name);
                    }

                }

                if(empty($err_msg)){
                    $result = array('state'=>true,'msg'=>'全部删除成功');
                }else{
                    $result = array('state'=>true,'msg'=>'已删除: '.$succ_num."条记录 , ".$false_num." 条记录删除失败！");
                }

            }

        }else{
            $result = array('state'=>false,'msg'=>'删除失败');
        }
        echo json_encode($result);exit;
    }


    /*店铺营业状态修改*/
    public function update_ad_management(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }

        $id = isset($_POST['id'])?trim($_POST['id']):'';
        $op = isset($_GET['op'])?trim($_GET['op']):'';
        $where = ' 1=1 ';
        if(!empty($id)){
            $where = " store_id IN ($id) ";
        }
        if(!empty($op)&&$op =='stop'){
            $where .=" and store_state!=1 ";
            $data = array('store_state'=>1);
        }else{
            $where .=" and store_state=1 ";
            $data = array('store_state'=>0);
        }
        $this->db->where($where)->update('store',$data);
        echo json_encode(array('state'=>true,'msg'=>'修改成功'));exit;
    }


    /*店铺编辑*/
    public function store_edit(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        $id = isset($_GET['id'])?intval($_GET['id']):'';
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }

        if(isset($_GET['op'])&&$_GET['op']=='edit'){
            $store_data = $this->db->select('*')->where('store_id',$id)->get('store')->row_array();
            $store_data['province_name'] = $this->db->select('area_name')->where('area_id',$store_data['province_id'])->get('area')->row('area_name');
            $store_data['city_name'] = $this->db->select('area_name')->where('area_id',$store_data['city_id'])->get('area')->row('area_name');
            $store_data['area_name'] = $this->db->select('area_name')->where('area_id',$store_data['area_id'])->get('area')->row('area_name');
            $brands_auth_arr = $this->db->select('brand_id')->where('store_id',$id)->get('store_attr_brands')->result_array();
            $brands_auth = array();
            foreach ($brands_auth_arr as $v){
                $brands_auth[] = $v['brand_id'];
            }
            $this->smarty->assign('store_data',$store_data);
            $this->smarty->assign('brands_auth',$brands_auth);
        }
        $brands = $this->db->select('brand_id,brand_name')->where('is_true',0)->get('shop_brand')->result_array();
        if($brands){
            foreach ($brands as $k=>$v){
                $brands[$k]['has_brand']=$this->stores_model->get_has_store_or_brand(1,$id,$v['brand_id']);
                $this->db->select('sb.brand_id,sb.store_id,st.store_name,st.store_state,st.ous_type');
                $this->db->from('store_attr_brands as sb');
                $this->db->join('store as st','st.store_id = sb.store_id', 'left');
                $this->db->where("sb.brand_id",$v['brand_id']);
                $this->db->where('st.store_state',1);
                $this->db->where("st.ous_type",1);
                $brands[$k]['w_store'] = $this->db->get ()->result_array ();
                $brands[$k]['w_store']=$this->stores_model->get_has_store_or_brand(2,$id,$brands[$k]['w_store']);


                $this->db->select('sb.brand_id,sb.store_id,st.store_name,st.store_state,st.ous_type');
                $this->db->from('store_attr_brands as sb');
                $this->db->join('store as st','st.store_id = sb.store_id', 'left');
                $this->db->where("sb.brand_id",$v['brand_id']);
                $this->db->where('st.store_state',1);
                $this->db->where("st.ous_type",3);
                $brands[$k]['g_store'] = $this->db->get()->result_array();
                $brands[$k]['g_store']=$this->stores_model->get_has_store_or_brand(2,$id,$brands[$k]['g_store']);
            }
        }
        $this->smarty->assign('brands',$brands);

        $this->smarty->assign('role',$role);

        $this->smarty->assign('id',$id);
        $area_data = $this->shop->get_area_info();
        $this->smarty->assign('area_data',$area_data);
        $this->smarty->assign('area_datajs',json_encode($area_data));
        $this->smarty->display ('public_store_edit.html');
    }


    /*店铺名字检查*/
    public function check_storeName(){
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
        $name = isset($_POST['store_name'])?trim($_POST['store_name']):'';
        if($name){
            $id = $this->db->select('store_id')->where('store_name',$name)->get('store')->row('store_id');
            if($id){
                if($store_id){
                    if($store_id==$id){
                        echo 'true';exit;
                    }else{
                        echo 'false';exit;
                    }
                }else{
                    echo 'false';exit;
                }
            }else{
                echo 'true';exit;
            }
        }else{
            echo 'false';exit;
        }
        //print_r($_POST);exit;
    }

    /*店铺简称检查*/
    public function check_shortStoreName(){
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
        $name = isset($_POST['short_store_name'])?trim($_POST['short_store_name']):'';
        if($name){
            $id = $this->db->select('store_id')->where('short_store_name',$name)->get('store')->row('store_id');
            if($id){
                if($store_id){
                    if($store_id==$id){
                        echo 'true';exit;
                    }else{
                        echo 'false';exit;
                    }
                }else{
                    echo 'false';exit;
                }
            }else{
                echo 'true';exit;
            }
        }else{
            echo 'false';exit;
        }
        //print_r($_POST);exit;
    }

    /*店铺检查编码*/
    public function check_storeCode(){
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
        $store_code = isset($_POST['class_code'])?trim($_POST['class_code']):'';
        //print_r($_POST);exit;
        if($store_code){
            $id = $this->db->select('store_id')->where('ous_out_sn',$store_code)->get('store')->row('store_id');
            if($id){
                if($store_id){
                    if($store_id==$id){
                        echo 'true';exit;
                    }else{
                        echo 'false';exit;
                    }
                }else{
                    echo 'false';exit;
                }
            }else{
                echo 'true';exit;
            }
        }else{
            echo 'false';exit;
        }
        //print_r($_POST);exit;
    }


    /*店铺添加，编辑*/
    public function store_add(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $time = time();
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
        $store['company_name'] = isset($_POST['company_name'])?trim($_POST['company_name']):'';//单位名称
        $store['store_name'] = isset($_POST['class_name'])?trim($_POST['class_name']):'';//店铺名
        $store['short_store_name'] = isset($_POST['short_store_name'])?trim($_POST['short_store_name']):'';//简称
        $store['ous_out_sn'] = isset($_POST['class_code'])?trim($_POST['class_code']):'';//编码
        $store['province_id'] = isset($_POST['class_province'])?trim($_POST['class_province']):'';
        $store['city_id'] = isset($_POST['class_city'])?trim($_POST['class_city']):'';
        $store['area_id'] = isset($_POST['class_area'])?trim($_POST['class_area']):'';
        $store['ous_address'] = isset($_POST['class_address'])?trim($_POST['class_address']):'';//地址
        $store['ous_tel'] = isset($_POST['class_mobile'])?trim($_POST['class_mobile']):'';
        $store['ous_type'] = isset($_POST['class_type'])?trim($_POST['class_type']):'';//店铺类型
        if(empty($role) && empty($store_id)){
            $store['ous_type'] = isset($_POST['class_type'])?trim($_POST['class_type']):'';//店铺类型
        }else if($role=='w'){//微商城
            $store['ous_type'] = 1;
        }elseif ($role=='d'){//电商店
            $store['ous_type'] = 2;
        }elseif ($role=='g'){//供应仓库
            $store['ous_type'] = 3;
        }

        
        if($role=='w' || (isset($store['ous_type']) && $store['ous_type']==1)){
            $store['ous_cate'] = isset($_POST['store_cate'])?trim($_POST['store_cate']):'';//门店形式
            $store['is_share_store'] = isset($_POST['is_share_store'])?trim($_POST['is_share_store']):'';//是否是兼职导购
            if (!empty($store['is_share_store'])) {
                $store['partime_jobs_limit'] = isset($_POST['partime_jobs_limit'])?trim($_POST['partime_jobs_limit']):'';//限制店铺数量
            } else {
                $store['partime_jobs_limit'] = 0;
            }
            $store['ous_tag'] = isset($_POST['ous_tag'])?trim($_POST['ous_tag']):'';
        }

        if($role!='d'){
            $brand_auth = isset($_POST['class_brand_auth'])?$_POST['class_brand_auth']:'';//授权品牌
            if(empty($role) &&  $store['ous_type'] == 2){
                $store['is_wx_store'] = isset($_POST['is_wx_store'])?trim($_POST['is_wx_store']):'';//是否开放微商店铺
                $store['is_wx_store_type'] = isset($_POST['is_wx_store_type'])?trim($_POST['is_wx_store_type']):'';//标记微商店铺类型
                
                $brand_auths = isset($_POST['brand_ids'])?$_POST['brand_ids']:'';//授权品牌
                $store_auths = isset($_POST['store_ids'])?$_POST['store_ids']:'';//授权店铺
                $brand_store_id = array();
                if($brand_auths && is_array($brand_auths)){
                    $num=0;
                    foreach ($brand_auths as $key=>$val){
                        $brand_store_id[$num]['brand_id']=$val[0];
                        if(isset($store_auths) && is_array($store_auths)){
                            if(isset($store_auths[$key]) && !empty($store_auths[$key]) && is_array($store_auths[$key])){
                                $brand_store_id[$num]['store_id']=$store_auths[$key];
                            }
                        }
                        $num++;
                    }
                }
            }
        }else{
            $store['is_wx_store'] = isset($_POST['is_wx_store'])?trim($_POST['is_wx_store']):'';//是否开放微商店铺
            $store['is_wx_store_type'] = isset($_POST['is_wx_store_type'])?trim($_POST['is_wx_store_type']):'';//标记微商店铺类型
            $brand_auths = isset($_POST['brand_ids'])?$_POST['brand_ids']:'';//授权品牌
            $store_auths = isset($_POST['store_ids'])?$_POST['store_ids']:'';//授权店铺
            $brand_store_id = array();
            if($brand_auths && is_array($brand_auths)){
                $num=0;
                foreach ($brand_auths as $key=>$val){
                    $brand_store_id[$num]['brand_id']=$val[0];
                    if(isset($store_auths) && is_array($store_auths)){
                        if(isset($store_auths[$key]) && !empty($store_auths[$key]) && is_array($store_auths[$key])){
                            $brand_store_id[$num]['store_id']=$store_auths[$key];
                        }
                    }
                    $num++;
                }
            }
        }




        $store['ous_business_hours'] = isset($_POST['class_time'])?trim($_POST['class_time']):'';//营业时间
        $store['ous_dec'] = isset($_POST['class_detail'])?trim($_POST['class_detail']):'';//简单介绍
        $store['add_time'] = $time;
        $store['add_admin_id'] = $_SESSION['shop_admin_id'];
        $store['last_update_userId'] = $_SESSION['shop_admin_id'];
        $store['last_update_time'] = $time;
        $store['last_update_user_type'] = '';
        $store['ous_longitude'] = isset($_POST['longitude'])?trim($_POST['longitude']):'';
        $store['ous_latitude'] = isset($_POST['latitude'])?trim($_POST['latitude']):'';


        if($store['store_name']){
            $flag = array('state'=>false,'data'=>'');
            if(empty($store_id)){
                $store['store_state'] = isset($_POST['store_state'])?trim($_POST['store_state']):1;
                if($this->db->insert('store',$store)){
                    $flag['state']= true;
                    $flag['data']= 'insert';
                }
                $storeId = $this->db->insert_id();
                $operate = '添加';
                $operation = 'add';
            }else{
                if($this->db->where('store_id',$store_id)->update('store',$store)){
                    $flag['state']= true;
                    $flag['data']= 'update';
                }
                $storeId = $store_id;
                $operate = '修改';
                $operation = 'edit';
            }

            if($role=='d' || (empty($role) && isset($store['ous_type']) && $store['ous_type']==2)){
                if(!empty($brand_store_id)){
                    $brand_auth = array();
                    foreach ($brand_store_id as $key=>$val){
                        $brand_auth[$key]=$val['brand_id'];
                        if(isset($val['store_id']) && !empty($val['store_id'])){
                            $this->db->trans_off(); //禁用事务
                            $this->db->trans_start(); //开启事务
                            if($this->db->select('count(1) as num')->where('store_id',$storeId)->where('brand_id',$val['brand_id'])->get('store_auth_store')->row('num')){
                                $this->db->where("store_id = '{$storeId}' and brand_id = '{$val['brand_id']}'")->delete('store_auth_store');
                            }
                            foreach ($brand_store_id[$key]['store_id'] as $k=>$v){
                                $checknum = $this->db->select('count(1) as num')->where('store_id',$storeId)->where('auth_store_id',$v)->where('brand_id',$val['brand_id'])->get('store_auth_store')->row('num');
                                if($checknum==0){
                                    $store_name = $this->db->select('store_name')->where('store_id',$v)->get('store')->row('store_name');
                                    $this->db->insert('store_auth_store',array('store_id'=>$storeId,'auth_store_id'=>$v,'brand_id'=>$val['brand_id'],'auth_store_name'=>$store_name));
                                }
                            }
                            $this->db->trans_complete(); //事务完成
                            $this->db->trans_off(); //禁用事务
                        }
                    }
                }
            }
            $this->db->trans_off(); //禁用事务
            $this->db->trans_start(); //开启事务
            if(!empty($brand_auth)){
                $del_brand_auth = $this->db->select('group_concat(brand_id) as brands')->where('store_id',$storeId)->where_not_in('brand_id',$brand_auth)->get('store_attr_brands')->row('brands');
                if(!empty($del_brand_auth)){
                    $del_stock = $this->db->select('group_concat(s.ssa_id) as ssa_idr')->from('store_stocks_amount as s')
                        ->join('shop_goods g','g.goods_id=s.goods_id','left')
                        ->where("g.brand_id in ($del_brand_auth)")->where('s.ssa_store_id',$storeId)->get()->row('ssa_idr');
                    if($del_stock){
                        $this->db->query("update ".$this->db->dbprefix('store_stocks_amount')." set amount=0 where ssa_id in ($del_stock)");
                    }
                    $this->db->where("brand_id IN ($del_brand_auth)")->where('store_id',$storeId)->delete('store_attr_brands');
                }
                if(isset($brand_auth) && !empty($brand_auth)){
                    $brand_auth_arr = array();
                    foreach ($brand_auth as $k=>$v){
                        $checknum = $this->db->select('count(1) as num')->where('store_id',$storeId)->where('brand_id',$v)->get('store_attr_brands')->row('num');
                        if($checknum==0){
                            $brand_auth_arr[$k]['brand_id']=$v;
                            $brand_auth_arr[$k]['store_id']=$storeId;
                        }
                    }
                    if(!empty($brand_auth_arr)){
                        $this->db->insert_batch('store_attr_brands', $brand_auth_arr);
                    }

                }
                $this->db->trans_complete(); //事务完成
                $this->db->trans_off(); //禁用事务
            }else{//没有授权 的情况下 清空以前的授权信息
                if($this->db->select('count(1) as num')->where('store_id',$storeId)->get('store_attr_brands')->row('num')){
                    $this->db->where('store_id',$storeId)->delete('store_attr_brands');
                }
                if($this->db->select('count(1) as num')->where('store_id',$storeId)->get('store_auth_store')->row('num')){
                    $this->db->where('store_id',$storeId)->delete('store_auth_store');
                }

            }

            //图片处理
            $storeFile = array();
            if(isset($_FILES['default_goods_image'])&&!empty($_FILES['default_goods_image'])){
                $storeFile['ous_logo']=$_FILES['default_goods_image'];
            }
            if(isset($_FILES['default_goods_image2'])&&!empty($_FILES['default_goods_image2'])){
                $storeFile['ous_shop_signs']=$_FILES['default_goods_image2'];
            }
            if(!empty($storeFile)){
                $flag = true;
                $status = false;
                foreach ($storeFile as $k=>$v){
                    if($v['error']!=0){
                        unset($storeFile[$k]);
                    }else{
                        if(stripos('image/png,image/jpeg,image/jpg,image/gif',trim($v['type']))===false){
                            $flag = false;
                        }
                    }

                }
                if(!$flag){
                    $result['state'] = true;
                    $result['msg'] = '请检查上传的文件是不是图片格式';
                    echo json_encode($result);exit;
                }
                $upload = true;
                $dir = isset($dir)?$dir:'./data/store/';
                //print_r(file_exists($dir));exit;
                $store['ous_logo'] = '';
                $store['ous_shop_signs'] = '';
                foreach ($storeFile as $k=>$v){
                    if (!file_exists($dir) || !is_writable($dir)) {

                        if (!@mkdir($dir, 0755)) {

                            if(!empty($v['name'])){
                                $aryStr = explode(".", $v['name']);
                                $new_name = $k.'_'.$storeId.'.'.strtolower($aryStr[count($aryStr)-1]);
                                if(file_exists($dir.$new_name)){
                                    @unlink($dir.$new_name);
                                }
                                if(!@move_uploaded_file($v['tmp_name'],$dir.$new_name)){
                                    //print_r($v['tmp_name']);exit;
                                    $upload = false;
                                }else{
                                    $store[$k] = $dir.$new_name;
                                    $this->db->where('store_id',$storeId)->update('store',array($k=>$dir.$new_name));
                                }
                            }else{
                                $upload = false;
                            }
                        }else{
                            $upload = false;
                        }
                    }else{
                        if(!empty($v['name'])){
                            $aryStr = explode(".", $v['name']);
                            $new_name = $k.'_'.$storeId.'.'.strtolower($aryStr[count($aryStr)-1]);
                            if(file_exists($dir.$new_name)){
                                @unlink($dir.$new_name);
                            }
                            if(!@move_uploaded_file($v['tmp_name'],$dir.$new_name)){
                                $upload = false;
                            }else{
                                $store[$k] = $dir.$new_name;
                                $this->db->where('store_id',$storeId)->update('store',array($k=>$dir.$new_name));
                            }
                        }else{
                            $upload = false;
                        }
                    }

                }

                if(!$upload){
                    $result['msg'] = '图片上传失败！请编辑重新上传';
                    $this->common_function->show_message('店铺'.$operate.'成功。'.$result['msg']);
                }else{

                    $links = array(
                        0 => array(
                            'text' => '店铺列表',
                            'href' => 'store_management?role='.$role
                        ),
                    );
                    $this->common_function->shop_admin_log($store['store_name'], $operation, '店铺管理');
                    $this->common_function->show_message($operate.'成功',0 ,$links);
                }
            }

        }else{
            $this->common_function->show_message('店铺名称不能为空！');
        }


    }



    //**************************
    /*店铺商品*/
    public function store_of_goods(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }

        $this->smarty->assign('role',$role);

        $store_id = isset($_GET['id'])?trim($_GET['id']):false;
        $op = isset($_GET['op'])?trim($_GET['op']):false;
        if($op&&$op=='edit'&&$store_id){
            $store_data = array();
            $store_data = $this->db->select('store_id,store_name')->where('store_id',$store_id)->get('store')->row_array();
            $brands = $this->db->select('s.brand_id,s.brand_name')->from('store_attr_brands as sb')
                ->join('shop_brand as s','s.brand_id=sb.brand_id')->where('sb.store_id',$store_id)
                ->get()->result_array();
            $this->smarty->assign('brands',$brands);
            $this->smarty->assign('store_data',$store_data);
            $this->smarty->display ('public_store_of_goods.html');
        }
    }



    /*店铺商品列表*/
    public function get_storeGoods_list(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $store_id = isset($_GET['store_id'])?trim($_GET['store_id']):'';
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $date_from = isset($_GET['date_from'])?trim($_GET['date_from']):'';
        $date_to = isset($_GET['date_to'])?trim($_GET['date_to']):'';
        $brand_code = isset($_GET['brand_code'])?$_GET['brand_code']:'';
        $stock_sns = isset($_GET['stocks_sn'])?trim($_GET['stocks_sn']):'';
        $goods_spu = isset($_GET['goods_spu'])?trim($_GET['goods_spu']):'';
        $stocks_bar_code = isset($_GET['stocks_bar_code'])?trim($_GET['stocks_bar_code']):'';
        $stock_name = isset($_GET['stock_name'])?trim($_GET['stock_name']):'';
        $amount = isset($_GET['amount'])?trim($_GET['amount']):'';
        $where = ' g.goods_state!=0 ';
        if (isset($_GET['year_to_market']) && !empty($_GET['year_to_market'])) {
            $where .= " and g.year_to_market = {$_GET['year_to_market']}";
        }
        if (isset($_GET['season_to_market']) && !empty($_GET['season_to_market'])) {
            $where .= " and g.season_to_market = {$_GET['season_to_market']}";
        }
        if (isset($_GET['gc_id']) && !empty($_GET['gc_id'])) {
            $gc_id = $_GET['gc_id'];
            $where .= "and  g.gc_id = '{$gc_id}'" ;
        }
        
        
        
        //商品有无图片
        if (isset($_GET['goods_image']) && !empty($_GET['goods_image'])) {
            if($_GET['goods_image']==1){
                $where.="and g.goods_image is not null and g.goods_image!=''";
            }elseif($_GET['goods_image']==2){
                $where.="and g.goods_image is null";
            }
        }

        if($date_from){
            $date_from = strtotime($date_from);
            $where .=" and g.goods_addtime>='{$date_from}' ";
        }
        if($date_to){
            $date_to = strtotime($date_to);
            $where .=" and g.goods_addtime<='{$date_to}' ";
        }
        if($brand_code){
            $where .=" and g.brand_id IN ($brand_code) ";
        }else{
            $brand_code_arr = $this->db->select('s.brand_id,s.brand_name')->from('store_attr_brands as sb')
                ->join('shop_brand as s','s.brand_id=sb.brand_id')->where('sb.store_id',$store_id)
                ->get()->result_array();
            $brands = array();
            foreach ($brand_code_arr as $v){
                $brands[] = $v['brand_id'];
            }
            $brands = join(',',$brands);
            if(empty($brands)){
                $where .= " and g.brand_id='0' ";
            }else{
                $where .=" and g.brand_id IN ($brands) ";
            }

        }
        if($stock_sns){
            $where .=" and g.stocks_sku like '%{$stock_sns}%' ";
        }
        if($goods_spu) {
            $where .=" and g.goods_spu like '%{$goods_spu}%' ";
        }
        if($stocks_bar_code) {
            $where .=" and g.stocks_bar_code like '%{$stocks_bar_code}%' ";
        }
        if($stock_name){
            $where .=" and g.goods_name like '%{$stock_name}%' ";
        }
        if($amount!=''){
            if($amount==0){
                $where .=" and (g.stock_amount is null or g.stock_amount='' or g.stock_amount=0 )";
            }elseif($amount==1){
                $where .=" and g.stock_amount>0";
            }
        }

        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }

        $total = $this->db->select('g.goods_id')
            ->from('v_store_stock g')
            ->where('g.ssa_store_id',$store_id)
            ->where($where)->group_by('g.goods_id')->get()->result_array();
        $total = count($total);
        //print_r($this->db->last_query());die;
        $start = $rp * ($page - 1);
        $rows = $this->db->select('g.stocks_price,g.year_to_market,g.season_to_market,g.sex,g.goods_id,g.goods_spu,g.goods_name,g.gc_id,g.gc_name,g.brand_id,g.brand_name,g.goods_price,
            g.goods_marketprice,g.goods_image,g.goods_addtime,g.stock_amount')
            ->from('v_store_stock g')
            ->where('g.ssa_store_id',$store_id)
            ->where($where)
            ->group_by('g.goods_id')
            ->order_by('g.goods_id','DESC')->limit($rp,$start)->get()->result_array();
        //print_r($this->db->last_query());die;
        $default_pic = PLUGIN.'data/images/'.$this->common_function->get_system_value('default_goods_image');
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        $store_type = array('1'=>'加盟店','2'=>'旗舰店','3'=>'直营店','4'=>'商场超市店',);
        foreach($rows as $row){
            $xml .= "<row id='".$row['goods_id']."'>";
            if($row['stock_amount']==''){
                $xml .= "<cell><![CDATA[--]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[<a class='btn blue' onclick=fg_edit(".$row['goods_id'].")>
               <i class='fa fa-pencil-square-o'></i>修改库存</a>]]></cell>";
            }

            if($row['season_to_market']==1){
                $row['season_to_market'] = '春季';
            }elseif($row['season_to_market']==2){
                $row['season_to_market'] = '夏季';
            }elseif($row['season_to_market']==3){
                $row['season_to_market'] = '秋季';
            }elseif($row['season_to_market']==4){
                $row['season_to_market'] = '冬季';
            }else {
                $row['season_to_market'] = "";
            }

            if($row['sex']==1){
                $row['sex']="女";
            }elseif($row['sex']==2){
                $row['sex']="男";
            }elseif($row['sex']==0){
                $row['sex']="通用";
            }


            $head_portrait = base_url($row['goods_image']);
            if(!empty($row['goods_image'])&&file_exists(ROOTPATH.'data/shop/album_pic/'.$row['goods_image'])){
                $head_portrait =GOODIMAGE.$row['goods_image'];
            }else{
                $head_portrait = $default_pic;
            }
            $xml .= "<cell><![CDATA[<img src=\"".$head_portrait.'" style="float:left;position:relative;top:-45%;" class="goods-avatar"'.
                ' onerror="this.src=\''.$head_portrait.'\'" '.
                ' data-geo="<img src=\''.$head_portrait.'\' width=300px >">'.
                '<span title="'.$row['goods_name'].'" style="line-height: 20px;position:relative;top:-45%;float:left;max-width:153px;overflow:hidden;text-overflow:ellipsis;text-align:left">'.
                $row['goods_name']."<br>款号:".$row['goods_spu']."</span>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['brand_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['gc_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['stocks_price']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['goods_marketprice']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['stock_amount']."]]></cell>";

            $xml .= "<cell><![CDATA[".$row['year_to_market']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['season_to_market']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['sex']."]]></cell>";



            $up_time = empty($row['goods_addtime'])?'--':date('Y-m-d H:i:s',$row['goods_addtime']);
            $xml .= "<cell><![CDATA[".$up_time."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }



    /*清除门店库存为0 的数据*/
    public function clearAmount(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $store_id = isset($_GET['store_id'])?intval($_GET['store_id']):'';
        $value = array('state'=>false,'msg'=>'操作错误');
        if($store_id){
            $this->db->where('ssa_store_id',$store_id)->where('amount<=0')->delete('store_stocks_amount');
            $value = array('state'=>true,'msg'=>'清除完成');
        }
        echo json_encode($value);die;
    }


    /*ajax获取 修改某个商品的库存，价格数据*/
    public function updateAmount(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $store_id = isset($_GET['store_id'])?intval($_GET['store_id']):'';
        $goods_id = isset($_POST['id'])?intval($_POST['id']):'';
        if($goods_id&&$store_id){
            $rows = $this->db->select("g.goods_id,g.goods_name,se.goods_a_id,se.stocks_sku,se.size,se.stocks_bar_code,se.goods_ea_id,
	            se.stocks_price as sku_price,se.stocks_marketprice,g.goods_price,g.goods_marketprice,sa.stocks_price,se.color,
	            se.color_remark,se.size_note,
	            (case when sa.stocks_price>=0 then sa.stocks_price when se.stocks_price>=0 then se.stocks_price else
	            g.goods_price end)price,(case when sa.amount>=0 then sa.amount else 0 end)amount,sa.stocks_sn")
                ->from('shop_goods g')->join('shop_goods_extend_attr se','se.goods_id=g.goods_id','left')
                ->join('store_stocks_amount sa','sa.goods_ea_id=se.goods_ea_id and sa.ssa_store_id='.$store_id)
                ->where('g.goods_id',$goods_id)->where('sa.amount>=0')->get()->result_array();
            $row = isset($rows[0])?$rows[0]:'';
            if(empty($row)||empty($rows)){
                $value = array('state'=>false,'data'=>$rows,'row'=>$row,'msg'=>'商品还未入库暂时不能修改数据');
            }else{
                $value = array('state'=>true,'data'=>$rows,'row'=>$row);
            }
            echo json_encode($value);die;
        }
    }

    /*修改某个商品的库存，价格数据*/
    public function updateStocks(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $goods_id = $_POST['id'];
        $store_id = $_GET['store_id'];
        unset($_POST['id']);
        $goods = array();
        foreach ($_POST as $k=>$v){
            foreach ($v as $ka=>$va){
                $goods[$ka][$k]=$va;
            }
        }
        $sqlUp = array();$sqlIn = array();$time = time();
        $up_id = $_SESSION['shop_admin_id'];
        $up_name = $_SESSION['shop_admin_name'];
        foreach ($goods as $k=>$v){
            $num = $this->db->select('ssa_id')->where('ssa_store_id',$store_id)->where('goods_ea_id',$v['goods_ea_id'])
                ->get('store_stocks_amount')->row('ssa_id');
            $sql = array(
                'amount'=>intval($v['amount']),'update_time'=>$time,'update_user_name'=>$up_name,
                'update_user_id'=>$up_id,'update_user_type'=>1,'stocks_price'=>$v['stocks_price'],
            );
            if($num){
                $sql['ssa_id'] = $num;
                $sqlUp[]=$sql;
            }else{
                $barcode = $this->db->select('stocks_bar_code')->where('goods_ea_id',$v['goods_ea_id'])
                    ->get('shop_goods_extend_attr')->row('stocks_bar_code');
                $sql['ssa_store_id'] = $store_id;
                $sql['goods_id'] = $store_id;
                $sql['stocks_sn'] = $v['stocks_sn'];
                $sql['stocks_bar_code'] = $barcode;
                $sql['size'] = $v['size'];
                $sqlIn[]=$sql;
            }
            unset($sql);
        }
        if(!empty($sqlUp)){
            $this->db->update_batch('store_stocks_amount',$sqlUp,'ssa_id');
        }
        if(!empty($sqlIn)){
            $this->db->insert_batch('store_stocks_amount',$sqlIn);
        }
        $result = array('state'=>true,'msg'=>'修改成功');
        echo json_encode($result);die;
    }


    /*店铺商品库存修改--批量*/
    public function update_goodsAmount(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        //print_r($_GET);print_r($_POST);exit;
        $store_id = isset($_GET['store_id'])?$_GET['store_id']:'';
        $amount = isset($_POST['amount'])?trim($_POST['amount']):'';
        $id = (isset($_POST['id']) && !empty($_POST['id'])) ? trim($_POST['id']) : '';
        $date_from = isset($_POST['date_from'])?trim($_POST['date_from']):'';
        $date_to = isset($_POST['date_to'])?trim($_POST['date_to']):'';
        $brand_code = isset($_POST['brand_code'])?$_POST['brand_code']:'';
        $stock_sn = isset($_POST['stock_sn'])?trim($_POST['stock_sn']):'';
        $stock_name = isset($_POST['stock_name'])?trim($_POST['stock_name']):'';
        $where = " 1=1 ";
        $result = array('state'=>false,'msg'=>'操作错误');
        if(empty($amount)){
            $result = array('state'=>false,'msg'=>'库存数量不能为空');
            echo json_encode($result);exit;
        }
        if(empty($store_id)){
            echo json_encode($result);exit;
        }
        $time = time();
        $userid = $_SESSION['shop_admin_id'];
        $username = $_SESSION['shop_admin_name'];
        if($id){
            $goods = $this->db->select('g.goods_id,g.goods_price,g.goods_marketprice,se.size,
	            se.stocks_price,se.stocks_marketprice,
	            se.stocks_sku,se.stocks_bar_code')
                ->from('shop_goods g')
                ->join('shop_goods_extend_attr se','se.goods_id=g.goods_id','left')
                ->where("g.goods_id in ($id)")
                ->get()->result_array();
            //print_r($goods);die;
            //$id_arr = explode(',',$id);
            foreach ($goods as $v){
                $arr = array();
                //$stock = explode(':',$v);
                $stock_check = $this->db->select('ssa_id')->where('stocks_sn',$v['stocks_sku'])->where('size',$v['size'])
                    ->where('ssa_store_id',$store_id)->get('store_stocks_amount')->row('ssa_id');
                $arr['amount'] = $amount;
                $arr['update_time'] = $time;
                $arr['update_user_name'] = $username;
                $arr['update_user_id'] = $userid;
                $arr['update_user_type'] = 1;
                if($stock_check){
                    $this->db->where('ssa_id',$stock_check)->update('store_stocks_amount',$arr);
                }else{
                    $arr['ssa_store_id'] = $store_id;
                    $arr['goods_id'] = $v['goods_id'];
                    $arr['stocks_price'] = empty($v['stocks_price'])?$v['goods_price']:$v['stocks_price'];
                    //$arr['stocks_marketprice'] = empty($v['stocks_marketprice'])?$v['goods_marketprice']:$v['stocks_marketprice'];
                    $arr['stocks_bar_code'] = $v['stocks_bar_code'];
                    $arr['stocks_sn'] = $v['stocks_sku'];
                    $arr['size'] = $v['size'];
                    $this->db->insert('store_stocks_amount',$arr);
                }
            }
            $result = array('state'=>true,'msg'=>'修改完成');
        }
        echo json_encode($result);exit;
    }

    //修改商品价格，折扣
    public function set_goods_price ()
    {
        $ids = isset($_GET['id']) ? explode(',', $_GET['id']) : false;
        $p   = isset($_GET['p']) ? $_GET['p'] :false;
        $num = isset($_GET['num']) ? ($_GET['num']) :false;
        $store_id = isset($_GET['store_id']) ? ($_GET['store_id']) :false;
        $data = array('state'=>false,'msg'=>'修改失败！');
        if ($ids && $store_id) {
            if ($p == 1) {    //设置折扣
                $price = array ();
                $i = 0;
                foreach ($ids as $id) {
                    $old = $this->db->where_in('sa.goods_id',$id)->where('sa.ssa_store_id',$store_id)->from('store_stocks_amount sa')->join("shop_goods_extend_attr st","st.goods_ea_id = sa.goods_ea_id","left")->get()->row('stocks_marketprice');    //原价
                    $price[$i]['goods_id'] = $id;
                    $price[$i]['stocks_price'] = ceil($old*$num);
                    $i++;
                }
                for ($j=0;$j<$i;$j++) {
                    $this->db->where('goods_id',$price[$j]['goods_id'])->where('goods_id',$price[$j]['goods_id'])->update('store_stocks_amount',array('stocks_price' => $price[$j]['stocks_price']));
                }
                $data = array('state'=>true,'msg'=>'修改成功！');
            } else if ($p == 2) { //设置价格
                $new = array(
                    'stocks_price'=>$num,
                    'update_time'=>time(),
                    'update_user_name' => $_SESSION['shop_admin_name'],
                    'update_user_id' => $_SESSION['shop_admin_id'],
                    'update_user_type'  => 2,
                );
                $result = $this->db->where_in('goods_id',$ids)->where('ssa_store_id',$store_id)->update('store_stocks_amount', $new);
                $data = array('state'=>true,'msg'=>'修改成功！');
            }
        }
        echo json_encode ($data);
        exit;
    }






    /*按货号导入库存*/
    public function storeGoods_import(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        include VIEWPATH.'file_handle.html';
        $condition = $this->input->get();
        $condition['store_id'] = isset($_GET['store_id']) && !empty($_GET['store_id'])? $_GET['store_id']:'';
        set_time_limit(0);
        ini_set('memory_limit','-1');
        // 读取csv文件
        $csvpath = ROOTPATH.'data/excel/'.$condition['name'].'.csv';
        $files = date ( 'YmdHis' ) . uniqid ()."_error";
        $errorpath = ROOTPATH.'data/excel/'.$files.'.csv';
        $file = @fopen($csvpath,'r');
        $goods_list = array();
        if($file){
            while (!feof($file)) {
                $data = @fgetcsv($file);
                if(!empty($data)){
                    $goods_list[] = $data;
                }
            }
        }
        @fclose($file);
        if(empty($goods_list[0]) || empty($goods_list[1])){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>csv文件中有效信息内容为空！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }


        $firstinfo = $goods_list[0];
        $firstinfo[] = @mb_convert_encoding('错误信息', "GBK", "UTF-8");
        unset($goods_list[0]);
        $fp = @fopen($errorpath, 'a');
        @fputcsv($fp,$firstinfo);


        $totalinfo = $goods_list;
        $rows = count($totalinfo); // 取得总行数
        if($rows>30000){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>按货号导入库存,一次最多导入30000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }

        $all_num = $rows;
        // 数据处理
        $datas = array ();
        $excel = array ();
        $is_download = false;
        //正确和错误条数计数
        $add_num = 0;
        $edit_num = 0;
        $error_num = 0;
        //当前执行位置
        $now_run = 1;
        $percent = 0;
        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-play-circle-o c-success'></i>:"."[".date('H:i:s')."]，开始处理。"."</p>\");".
            '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();
        $auth_brand = array();
        if(isset($condition['store_id'])){
            $error_col = 'G';
            $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$condition['store_id'])->get('store_attr_brands')->result_array();
            foreach ($auth_brand_arr as $v){
                $auth_brand[] = $v['brand_id'];
            }
        }else{
            $error_col = 'H';
        }
        $user_id = $_SESSION['shop_spg_id'];
        $user_name = $_SESSION['shop_spg_nike_name'];
        $user_type = 1;
        $time = time();
        if(isset($condition['type'])&&$condition['type']==1){
            $update = array(
                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>2,
            );
            if(isset($condition['store_id'])){
                $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);
            }else{
                $this->db->update('store_stocks_amount',$update);
            }
        }
        $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;

            $counterror = count($error);
            $flag = false;
            $false_msg ='';
            $false_msgs = '';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            // 品牌<必填>
            $brand_name = trim($this->common_function->gstr($val[0]));
            if (empty( $brand_name )) {
                $false_msgs = @mb_convert_encoding("品牌必填", "GBK", "UTF-8");
                $false_msg .= "品牌必填";
                $flag = true;
            }else{
                $brand_id = $this->db->select('brand_id')->where('brand_name',$brand_name)->get('shop_brand')->row('brand_id');
                if(empty($brand_id)){
                    $false_msgs = @mb_convert_encoding("系统还未添加此品牌", "GBK", "UTF-8");
                    $false_msg .= "系统还未添加此品牌";
                    $flag = true;
                }
            }
            // 货号<必填>
            $excel ['stocks_sn'] = strtoupper(trim($this->common_function->gstr($val[1])));
            if (empty( $excel ['stocks_sn'] )) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("货号必填", "GBK", "UTF-8");
                }
                $false_msg .= "货号必填";
                $flag = true;
            }else{
                if(!$flag){
                    $check_stock_arr = $this->db->select('sg.goods_id,se.goods_a_id')->from('shop_goods as sg')
                        ->join('shop_goods_extend_attr as se','se.goods_id=sg.goods_id')
                        ->where('se.stocks_sku',$excel ['stocks_sn'])
                        ->where('sg.brand_id',$brand_id)->where("(sg.goods_pos={$condition['store_id']} or sg.goods_pos=0)")->where('sg.goods_state!=0')
                        ->order_by('sg.goods_pos','DESC')
                        ->group_by('sg.goods_id')
                        ->get()->result_array();
                    $check_stock = isset($check_stock_arr[0])?$check_stock_arr[0]:'';
                    if(empty($check_stock['goods_id'])){
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("货号不存在", "GBK", "UTF-8");
                        }
                        $false_msg .= "货号不存在";
                        $flag = true;
                    }else{
                        $excel['brand_id'] = $brand_id;
                        $excel['goods_id'] = $check_stock['goods_id'];
                    }

                }

            }
            //尺码<必填>
            $excel ['size'] = strtoupper(trim($this->common_function->gstr($val[2])));
            if ( $excel ['size']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("尺码必填", "GBK", "UTF-8");
                }
                $false_msg .= "尺码必填";
                $flag = true;
            }
            if(!$flag){
                $gc_id = $this->db->select('s.size')->from('code_segment_size s')
                    ->join('shop_brand b','b.brand_size_type=s.flag')
                    ->join('shop_goods g','g.brand_id=b.brand_id')
                    ->where('s.size',$excel['size'])->where('g.goods_id',$excel['goods_id'])
                    ->get()->row('size');
                if($gc_id==''){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("该尺码不存在,请先添加此类商品的尺码", "GBK", "UTF-8");
                    }
                    $false_msg .= "该尺码不存在,请先添加此类商品的尺码";
                    $flag=true;
                }

            }
            //库存<必填>
            $excel ['amount'] = intval($this->common_function->gstr($val[3]));
            if (empty ( $excel ['amount'])) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("库存必填", "GBK", "UTF-8");
                }
                $false_msg .="库存必填";
                $flag = true;
            }
            //条码
            $excel ['stocks_bar_code'] = '';
            if(isset($val[4])){
                $excel ['stocks_bar_code'] = strtoupper(trim($this->common_function->gstr($val[4])));
            }
            if(!empty($excel ['stocks_bar_code'])&&!$flag){
                $check_bar_code = $this->db->select('ea.stocks_bar_code,ea.goods_ea_id,ea.size_note,ea.stocks_sku,ea.stocks_price')
                    ->from('shop_goods_extend_attr ea')->join('shop_goods g','g.goods_id=ea.goods_id')
                    ->where('ea.stocks_bar_code',$excel ['stocks_bar_code'])->where('g.goods_state!=0')
                    ->get()->row_array();

                $check_goods_barcode = $this->db->select('stocks_bar_code,goods_ea_id')->where('stocks_sku',$excel ['stocks_sn'])
                    ->where('size',$excel ['size'])->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                $check_barcode = isset($check_goods_barcode['stocks_bar_code'])?strtoupper($check_goods_barcode['stocks_bar_code']):'';
                if(!empty($check_goods_barcode)){
                    if(!empty($check_bar_code)&&$check_bar_code['goods_ea_id']!=$check_goods_barcode['goods_ea_id']){
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("该条形码已有其他商品占用", "GBK", "UTF-8");
                        }
                        $false_msg .="该条形码已有其他商品占用";
                        $flag = true;
                    }
                }
                if($check_barcode&&$check_barcode!=$excel ['stocks_bar_code']&&!$flag){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("该货号该尺码对应 商品的条形码已存在且不与该条形码相同", "GBK", "UTF-8");
                    }
                    $false_msg .="该货号该尺码对应 商品的条形码已存在且不与该条形码相同";
                    $flag = true;
                }
            }
            //售价
            //$excel ['stocks_price'] = trim($this->common_function->gstr($val[5]));

            if (! $flag) {
                $check_flag = true;
                if(!isset($condition['store_id'])){
                    $check_name = $this->db->select('store_id')->where('ous_out_sn',$excel ['ssa_store_code'])->get('store')->row('store_id');
                    if($check_name){
                        $excel ['store_id'] = $check_name;
                        $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$excel['store_id'])->get('store_attr_brands')->result_array();
                        $auth_brand = array();
                        foreach ($auth_brand_arr as $v){
                            $auth_brand[] = $v['brand_id'];
                        }
                        if(!in_array($excel['brand_id'], $auth_brand)){
                            if(empty($false_msgs)){
                                $false_msgs = @mb_convert_encoding("该门店未给此商品授权", "GBK", "UTF-8");
                            }
                            $false_msg .="该门店未给此商品授权";
                            $check_flag = false;
                        }
                    }else{
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("不存在该门店", "GBK", "UTF-8");
                        }
                        $false_msg .= "不存在该门店";
                        $check_flag = false;
                    }
                }else{
                    if(in_array($excel['brand_id'], $auth_brand)){
                        $excel ['store_id'] = $condition['store_id'];
                    }else{
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("该门店未给此商品授权", "GBK", "UTF-8");
                        }
                        $false_msg .= "该门店未给此商品授权";
                        $check_flag = false;
                    }

                }
                if($check_flag){

                    $check_amount = $this->db->select('ssa_id,amount,update_time')->where('stocks_sn',$excel ['stocks_sn'])
                        ->where('size',$excel ['size'])->where('ssa_store_id',$excel ['store_id'])->where('goods_id',$excel ['goods_id'])
                        ->get('store_stocks_amount')->row_array();
                    if($check_amount['ssa_id']){
                        if($check_amount['update_time']==$time){
                            $amount = $excel['amount']+$check_amount['amount'];
                        }else{
                            $amount = $excel['amount'];
                        }
                        $update_data = array(
                            'amount'=>$amount,'update_time'=>$time,'update_user_name'=>$user_name,
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,
                        );
                       /*if(!empty($excel ['stocks_price'])){
                            $update_data['stocks_price'] = $excel['stocks_price'];
                        } */
                        if(!empty($excel['stocks_bar_code'])){
                            $update_data['stocks_bar_code'] = strtoupper($excel['stocks_bar_code']);
                        }
                        $this->db->update('store_stocks_amount',$update_data,array('ssa_id'=>$check_amount['ssa_id']));
                    }else{
                        $stock_price = $this->db->select('goods_ea_id,size_note,stocks_bar_code,color,goods_id,stocks_price,stocks_marketprice,color_remark')->where('size',$excel ['size'])
                            ->where('stocks_sku',$excel ['stocks_sn'])->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                        if(!empty($stock_price)){
                            $excel['stocks_marketprice'] = $stock_price['stocks_marketprice'];
                            $excel['stocks_price'] = $stock_price['stocks_price'];
                            if(empty($excel ['stocks_bar_code'])){
                                $excel['stocks_bar_code'] = strtoupper($stock_price['stocks_bar_code']);
                            }//'stocks_marketprice'=>$excel['stocks_marketprice'],
                            $this->db->insert('store_stocks_amount',array(
                                'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$stock_price ['color'],
                                'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$stock_price['color_remark'],
                                'stocks_sn'=>strtoupper($excel ['stocks_sn']),'size'=>strtoupper($excel ['size']),'ssa_store_id'=>$excel ['store_id'],
                                'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$stock_price['goods_ea_id'],'goods_size_remark'=>$stock_price['size_note'],
                                'stocks_bar_code'=>strtoupper($excel['stocks_bar_code']),'goods_id'=>$stock_price['goods_id']
                            ));
                        }else{
                            $stock_price = $this->db->select('goods_ea_id,stocks_bar_code,color,goods_id,stocks_price,stocks_marketprice,color_remark')
                                ->where('stocks_sku',$excel ['stocks_sn'])->where(" (size is null or size='')")->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                            $excel['stocks_marketprice'] = $stock_price['stocks_marketprice'];
                            $excel['stocks_price'] = $stock_price['stocks_price'];
                            if(empty($excel ['stocks_bar_code'])){
                                $excel['stocks_bar_code'] = strtoupper($stock_price['stocks_bar_code']);
                            }//'stocks_marketprice'=>$excel['stocks_marketprice'],
                            if(empty($stock_price)){
                                $stock_price = $this->db->select('goods_a_id,color,color_value,color_remark,stocks_bar_code,goods_id,stocks_price,stocks_marketprice')
                                    ->where('stocks_sku',$excel ['stocks_sn'])->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                                $this->db->insert('shop_goods_extend_attr',array('goods_id'=>$stock_price ['goods_id'],
                                    'goods_a_id'=>$stock_price ['goods_a_id'],'color'=>$stock_price ['color'],
                                    'color_value'=>$stock_price['color_value'],'color_remark'=>$stock_price['color_remark'],
                                    'size'=>$excel ['size'],'stocks_sku'=>$excel ['stocks_sn'],'stocks_marketprice'=>$stock_price['stocks_marketprice'],
                                    'stocks_price'=>$excel['stocks_price'],'stocks_bar_code'=>$excel['stocks_bar_code'],
                                ));
                                $goods_ea_id = $this->db->insert_id();
                                $this->db->insert('store_stocks_amount',array(
                                    'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,
                                    'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$stock_price['color_remark'],
                                    'stocks_sn'=>$excel ['stocks_sn'],'size'=>$excel ['size'],'ssa_store_id'=>$excel ['store_id'],
                                    'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$goods_ea_id,'color'=>$stock_price ['color'],
                                    'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$stock_price['goods_id']
                                ));
                            }else{
                                $this->db->update('shop_goods_extend_attr',array('size'=>$excel ['size'],'stocks_marketprice'=>$stock_price['stocks_marketprice'],
                                    'stocks_price'=>$excel['stocks_price'],'stocks_bar_code'=>$excel['stocks_bar_code'],
                                ),array('goods_ea_id'=>$stock_price['goods_ea_id']));
                                $this->db->insert('store_stocks_amount',array(
                                    'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$stock_price ['color'],
                                    'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$stock_price['color_remark'],
                                    'stocks_sn'=>$excel ['stocks_sn'],'size'=>$excel ['size'],'ssa_store_id'=>$excel ['store_id'],
                                    'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$stock_price['goods_ea_id'],
                                    'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$stock_price['goods_id']
                                ));
                            }
                        }

                    }
                    $add_num++;
                    if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                        echo "<script language='javascript'>" .
                            //'$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".
                            '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                            "location.href = '#anchor';" .
                            "</script>";
                    }
                    unset($excel);

                }else{
                    $is_download = true;
                    $error[] = $false_msgs;
                    @fputcsv($fp,$error);
                    $error_num++;
                    if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                        echo "<script language='javascript'>" .
                            //            '$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                            '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                            "location.href = '#anchor';" .
                            "</script>";
                    }
                    unset($excel);
                }
            } else { // 有错误的EXCEL行
                $error[] = $false_msgs;
                @fputcsv($fp,$error);
                $is_download = true;
                $error_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                    echo "<script language='javascript'>" .
//                     '$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                }
                unset($excel);
            }
            ob_end_flush();
            ob_flush();
            flush();
            /*           if ($now_run % 100 == 0){
                          sleep(1);
                      }
                       */
        }
        @fclose($fp);


        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:"."[".date('H:i:s')."]，导入成功，正在生成错误列表excel，请稍等。。。"."</p>\");".
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();

        // 删除原EXCEL文件
        if (file_exists ( $csvpath )) {
            unlink ( $csvpath );
        }
        // 如有错误下载错误的文件
        if ($is_download) { // 存在格式不成功excel，下载
            ob_end_clean ();
            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $files .'.csv'));

            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
        //@unlink($excelpath);
        exit();
    }

    
    /*按货号导入价格*/
    public function storeGoods_import_price(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        include VIEWPATH.'file_handle.html';
        $condition = $this->input->get();
        $condition['store_id'] = isset($_GET['store_id']) && !empty($_GET['store_id'])? $_GET['store_id']:'';
        //$flagType = isset($condition['flagType']) && !empty($condition['flagType'])? $condition['flagType']:1;
        set_time_limit(0);
        ini_set('memory_limit','-1');
        // 读取csv文件
        $csvpath = ROOTPATH.'data/excel/'.$condition['name'].'.csv';
        $files = date ( 'YmdHis' ) . uniqid ()."_error";
        $errorpath = ROOTPATH.'data/excel/'.$files.'.csv';
        $file = @fopen($csvpath,'r');
        $goods_list = array();
        if($file){
            while (!feof($file)) {
                $data = @fgetcsv($file);
                if(!empty($data)){
                    $goods_list[] = $data;
                }
            }
        }
        @fclose($file);
        if(empty($goods_list[0]) || empty($goods_list[1])){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>csv文件中有效信息内容为空！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
    
    
        $firstinfo = $goods_list[0];
        $firstinfo[] = @mb_convert_encoding('错误信息', "GBK", "UTF-8");
        unset($goods_list[0]);
        $fp = @fopen($errorpath, 'a');
        @fputcsv($fp,$firstinfo);
    
    
        $totalinfo = $goods_list;
        $rows = count($totalinfo); // 取得总行数
        if($rows>30000){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>按货号导入库存,一次最多导入30000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
    
        $all_num = $rows;
        // 数据处理
        $datas = array ();
        $excel = array ();
        $is_download = false;
        //正确和错误条数计数
        $add_num = 0;
        $edit_num = 0;
        $error_num = 0;
        //当前执行位置
        $now_run = 1;
        $percent = 0;
        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-play-circle-o c-success'></i>:"."[".date('H:i:s')."]，开始处理。"."</p>\");".
            '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();
        $auth_brand = array();
        if(isset($condition['store_id'])){
            $error_col = 'G';
            $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$condition['store_id'])->get('store_attr_brands')->result_array();
            foreach ($auth_brand_arr as $v){
                $auth_brand[] = $v['brand_id'];
            }
        }else{
            $error_col = 'H';
        }
        $user_id = $_SESSION['shop_spg_id'];
        $user_name = $_SESSION['shop_spg_nike_name'];
        $user_type = 1;
        $time = time();
        if(isset($condition['type'])&&$condition['type']==1){
            $update = array(
                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>2,
            );
            if(isset($condition['store_id'])){
                $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);
            }else{
                $this->db->update('store_stocks_amount',$update);
            }
        }
        $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;
    
            $counterror = count($error);
            $flag = false;
            $false_msg ='';
            $false_msgs = '';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            // 品牌<必填>
            $brand_name = trim($this->common_function->gstr($val[0]));
            if (empty( $brand_name )) {
                $false_msgs = @mb_convert_encoding("品牌必填", "GBK", "UTF-8");
                $false_msg .= "品牌必填";
                $flag = true;
            }else{
                $brand_id = $this->db->select('brand_id')->where('brand_name',$brand_name)->get('shop_brand')->row('brand_id');
                if(empty($brand_id)){
                    $false_msgs = @mb_convert_encoding("系统还未添加此品牌", "GBK", "UTF-8");
                    $false_msg .= "系统还未添加此品牌";
                    $flag = true;
                }
            }
            // 货号<必填>
            $excel ['stocks_sn'] = strtoupper(trim($this->common_function->gstr($val[1])));
            if (empty( $excel ['stocks_sn'] )) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("货号必填", "GBK", "UTF-8");
                }
                $false_msg .= "货号必填";
                $flag = true;
            }else{
                if(!$flag){
                    $check_stock_arr = $this->db->select('sg.goods_id,se.goods_a_id')->from('shop_goods as sg')
                    ->join('shop_goods_extend_attr as se','se.goods_id=sg.goods_id')
                    ->where('se.stocks_sku',$excel ['stocks_sn'])
                    ->where('sg.brand_id',$brand_id)->where("(sg.goods_pos={$condition['store_id']} or sg.goods_pos=0)")->where('sg.goods_state!=0')
                    ->order_by('sg.goods_pos','DESC')
                    ->group_by('sg.goods_id')
                    ->get()->result_array();
                    $check_stock = isset($check_stock_arr[0])?$check_stock_arr[0]:'';
                    if(empty($check_stock['goods_id'])){
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("货号不存在", "GBK", "UTF-8");
                        }
                        $false_msg .= "货号不存在";
                        $flag = true;
                    }else{
                        $excel['brand_id'] = $brand_id;
                        $excel['goods_id'] = $check_stock['goods_id'];
                    }
    
                }
    
            }
            //尺码<必填>
            $excel ['size'] = strtoupper(trim($this->common_function->gstr($val[2])));
            if ( $excel ['size']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("尺码必填", "GBK", "UTF-8");
                }
                $false_msg .= "尺码必填";
                $flag = true;
            }

            //售价<必填>
            $excel ['stocks_price'] = trim($this->common_function->gstr($val[3]));
            if (empty ( $excel ['stocks_price'])) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("售价必填", "GBK", "UTF-8");
                }
                $false_msg .="售价必填";
                $flag = true;
            }
    
            if (! $flag) {
                $check_amount = $this->db->select('ssa_id,goods_ea_id')->where('stocks_sn',$excel ['stocks_sn'])
                ->where('size',$excel ['size'])->where('ssa_store_id',$excel ['store_id'])->where('goods_id',$excel ['goods_id'])
                ->get('store_stocks_amount')->row_array();
                if($check_amount['ssa_id']){
                    $update_data1 = array(
                        'uec_stocks_price'=>$excel ['stocks_price'],'stocks_price'=>$excel ['stocks_price'],'update_user_name'=>$user_name,
                        'update_user_id'=>$user_id,'update_user_type'=>$user_type,'update_time'=>$time
                    );
                    $update_data2 = array(
                        'stocks_price'=>$excel ['stocks_price']
                    );
                    $update_data3 = array(
                        'goods_price'=>$excel ['stocks_price']
                    );
                    $this->db->update('store_stocks_amount',$update_data1,array('ssa_id'=>$check_amount['ssa_id']));
                    /* $this->db->trans_off(); //禁用事务
                    $this->db->trans_start(); //开启事务
                    $this->db->update('shop_goods_extend_attr',$update_data2,array('goods_ea_id'=>$check_amount['goods_ea_id']));
                    $this->db->where('goods_id',$excel ['goods_id'])->where('goods_pos',$excel ['store_id'])->update('shop_goods',$update_data3);
                    $this->db->trans_complete(); //事务完成
                    $this->db->trans_off(); //禁用事务 */
                }
                $add_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                    echo "<script language='javascript'>" .
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                }
                unset($excel);
            } else { // 有错误的EXCEL行
                $error[] = $false_msgs;
                @fputcsv($fp,$error);
                $is_download = true;
                $error_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                    echo "<script language='javascript'>" .
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                }
                unset($excel);
            }
            ob_end_flush();
            ob_flush();
            flush();
            /*           if ($now_run % 100 == 0){
             sleep(1);
             }
            */
        }
        @fclose($fp);
    
    
        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:"."[".date('H:i:s')."]，导入成功，正在生成错误列表excel，请稍等。。。"."</p>\");".
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();
    
        // 删除原EXCEL文件
        if (file_exists ( $csvpath )) {
            unlink ( $csvpath );
        }
        // 如有错误下载错误的文件
        if ($is_download) { // 存在格式不成功excel，下载
            ob_end_clean ();
            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $files .'.csv'));
    
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
        //@unlink($excelpath);
        exit();
    }


    /*按款号导入库存*/
    public function storeGoodsSku_import(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }

        include VIEWPATH.'file_handle.html';
        $condition = $this->input->get();
        $condition['store_id'] = isset($_GET['store_id']) && !empty($_GET['store_id'])? $_GET['store_id']:'';
        set_time_limit(0);
        ini_set('memory_limit','-1');
        // 读取csv文件
        $csvpath = ROOTPATH.'data/excel/'.$condition['name'].'.csv';
        $files = date ( 'YmdHis' ) . uniqid ()."_error";
        $errorpath = ROOTPATH.'data/excel/'.$files.'.csv';
        $file = @fopen($csvpath,'r');
        $goods_list = array();
        if($file){
            while (!feof($file)) {
                $data = @fgetcsv($file);
                if(!empty($data)){
                    $goods_list[] = $data;
                }
            }
        }
        @fclose($file);
        if(empty($goods_list[0]) || empty($goods_list[1])){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>csv文件中有效信息内容为空！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }


        $firstinfo = $goods_list[0];
        $firstinfo[] = @mb_convert_encoding('错误信息', "GBK", "UTF-8");
        unset($goods_list[0]);
        $fp = @fopen($errorpath, 'a');
        @fputcsv($fp,$firstinfo);


        $totalinfo = $goods_list;
        $rows = count($totalinfo); // 取得总行数
        if($rows>10000){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>按款号导入库存,一次最多导入10000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
        $all_num = $rows;
        //print_r($condition);die;
        // 数据处理
        $datas = array ();
        $excel = array ();
        $is_download = false;
        //正确和错误条数计数
        $add_num = 0;
        $edit_num = 0;
        $error_num = 0;
        //当前执行位置
        $now_run = 1;
        $percent = 0;
        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-play-circle-o c-success'></i>:"."[".date('H:i:s')."]，开始处理。"."</p>\");".
            '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();
        $auth_brand = array();
        $error_col = 'I';
        $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$condition['store_id'])->get('store_attr_brands')->result_array();
        foreach ($auth_brand_arr as $v){
            $auth_brand[] = $v['brand_id'];
        }
        $user_id = $_SESSION['shop_spg_id'];
        $user_name = $_SESSION['shop_spg_nike_name'];
        $user_type = 2;
        $time = time();
        if(isset($condition['type'])&&$condition['type']==1){
            $update = array(
                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>2,
            );
            $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);
        }

        $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;
            $counterror = count($error);
            $flag = false;
            $false_msg ='';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            // 品牌<必填>

            $brand_name = trim($this->common_function->gstr($val[0]));
            if (empty( $brand_name )) {
                $false_msgs = @mb_convert_encoding("品牌必填", "GBK", "UTF-8");
                $false_msg .= "品牌必填";
                $flag = true;
            }else{
                $brand_id = $this->db->select('brand_id')->where('brand_name',$brand_name)->get('shop_brand')->row('brand_id');
                if(empty($brand_id)){
                    $false_msgs = @mb_convert_encoding("系统还未添加此品牌", "GBK", "UTF-8");
                    $false_msg .= "系统还未添加此品牌";
                    $flag = true;
                }elseif(!in_array($brand_id, $auth_brand)){
                    $false_msgs = @mb_convert_encoding("此品牌还未给此门店授权", "GBK", "UTF-8");
                    $false_msg .= "此品牌还未给此门店授权";
                    $flag = true;
                }
            }
            // 款号<必填>
            $excel ['stocks_spu'] = strtoupper(trim($this->common_function->gstr($val[1])));
            if (empty( $excel ['stocks_spu'] )) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("款号必填", "GBK", "UTF-8");
                }
                $false_msg .= "款号必填";
                $flag = true;
            }else{
                //查找商品id
                if(!$flag){
                    $check_stock = $this->db->select('sg.goods_id')->from('shop_goods as sg')
                        ->where('sg.goods_spu',$excel ['stocks_spu'])
                        ->where("(sg.goods_pos={$condition['store_id']} or sg.goods_pos=0)")->where('sg.goods_state!=0')
                        ->where('sg.brand_id',$brand_id)->order_by('sg.goods_pos','DESC')->group_by('sg.goods_id')->get()->result_array();
                    $check_stock = isset($check_stock[0])?$check_stock[0]:'';
                    //print_r($check_stock);die;
                    if(empty($check_stock['goods_id'])){
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("款号不存在", "GBK", "UTF-8");
                        }
                        $false_msg .= "款号不存在";
                        $flag = true;
                    }else{
                        $excel['brand_id'] = $brand_id;
                        $excel['goods_id'] = $check_stock['goods_id'];
                    }

                }

            }
            //主色<必填>
            $excel ['color'] = trim($this->common_function->gstr($val[2]));
            if ( $excel ['color']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("主色必填", "GBK", "UTF-8");
                }
                $false_msg .= "主色必填";
                $flag = true;
            }
            //颜色<必填>
            $excel ['color_remark'] = trim($this->common_function->gstr($val[3]));
            if ( $excel ['color_remark']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("颜色必填", "GBK", "UTF-8");
                }
                $false_msg .= "颜色必填";
                $flag = true;
            }
            if(!$flag){
                //查找goods_a_id
                $check_color = $this->db->select('goods_a_id')->from('shop_goods_extend')
                    ->where('goods_id',$excel['goods_id'])->where('color_remark',$excel ['color_remark'])->where('color',$excel ['color'])
                    ->get()->row_array();
                if(empty($check_color)){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("此货不存在该颜色", "GBK", "UTF-8");
                    }
                    $false_msg .= "此货不存在该颜色";
                    $flag = true;
                }else{
                    $excel['goods_a_id'] = $check_color['goods_a_id'];
                }
            }
            //尺码<必填>
            $excel ['size'] = strtoupper(trim($this->common_function->gstr($val[4])));
            if ( $excel ['size']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("尺码必填", "GBK", "UTF-8");
                }
                $false_msg .= "尺码必填";
                $flag = true;
            }
            if(!$flag){
                $gc_id = $this->db->select('s.size')->from('code_segment_size s')
                    ->join('shop_brand b','b.brand_size_type=s.flag')
                    ->join('shop_goods g','g.brand_id=b.brand_id')
                    ->where('s.size',$excel['size'])->where('g.goods_id',$excel['goods_id'])
                    ->get()->row('size');
                if($gc_id==''){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("尺码不存在。请先添加此类商品的尺码", "GBK", "UTF-8");
                    }
                    $false_msg .= "尺码不存在。请先添加此类商品的尺码";
                    $flag=true;
                }

            }
            //库存<必填>
            $excel ['amount'] = intval($this->common_function->gstr($val[5]));
            if (empty ( $excel ['amount'])) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("库存必填", "GBK", "UTF-8");
                }
                $false_msg .= "库存必填";
                $flag = true;
            }
            
            //条码
            $excel ['stocks_bar_code'] ='';
            if(isst($val[6])){
                $excel ['stocks_bar_code'] = strtoupper(trim($this->common_function->gstr($val[6])));
            }
            
            if(!$flag){
                $check_ea_id = $this->db->select('stocks_bar_code,goods_ea_id,size_note,stocks_sku,stocks_price')->where('goods_a_id',$excel ['goods_a_id'])
                    ->where('size',$excel ['size'])->get('shop_goods_extend_attr')->row_array();
                if(!empty($check_ea_id)){
                    if(!empty($check_ea_id['stocks_bar_code'])){
                        if(!empty($excel ['stocks_bar_code'])&&$check_ea_id['stocks_bar_code']!=$excel ['stocks_bar_code']){
                            if(empty($false_msgs)){
                                $false_msgs = @mb_convert_encoding("该 商品的条形码已存在且不与该条形码相同", "GBK", "UTF-8");
                            }
                            $false_msg .= "该 商品的条形码已存在且不与该条形码相同";
                            $flag = true;
                        }
                    }
                    if(!empty($excel ['stocks_bar_code'])){
                        $check_bar_code = $this->db->select('goods_ea_id')->where('stocks_bar_code',$excel ['stocks_bar_code'])
                            ->where('g.goods_state!=0')->get('shop_goods_extend_attr')->row_array();
                        if(!empty($check_bar_code)){
                            if($check_bar_code['goods_ea_id']!=$check_ea_id['goods_ea_id']){
                                if(empty($false_msgs)){
                                    $false_msgs = @mb_convert_encoding("该条形码已有其他商品占用", "GBK", "UTF-8");
                                }
                                $false_msg .= "该条形码已有其他商品占用";
                                $flag = true;
                            }
                        }
                    }
                }

            }
            //售价
            //$excel ['stocks_price'] = trim($this->common_function->gstr($val[7]));
            if (! $flag) {
                //print_r($check_ea_id);die;
                if(!empty($check_ea_id)){
                    $check_amount = $this->db->select('ssa_id,amount,update_time')->where('goods_ea_id',$check_ea_id ['goods_ea_id'])
                        ->where('ssa_store_id',$condition ['store_id'])
                        ->get('store_stocks_amount')->row_array();
                    if($check_amount['ssa_id']){
                        if($check_amount['update_time']==$time){
                            $amount = $excel['amount']+$check_amount['amount'];
                        }else{
                            $amount = $excel['amount'];
                        }
                        $update_data = array(
                            'amount'=>$amount,'update_time'=>$time,'update_user_name'=>$user_name,
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,
                        );
                        /* if(!empty($excel ['stocks_price'])){
                            $update_data['stocks_price'] = $excel['stocks_price'];
                        } */
                        if(!empty($excel['stocks_bar_code'])){
                            $update_data['stocks_bar_code'] = $excel['stocks_bar_code'];
                        }elseif(!empty($check_ea_id['stocks_bar_code'])){
                            $update_data['stocks_bar_code'] = $check_ea_id['stocks_bar_code'];
                        }
                        $this->db->update('store_stocks_amount',$update_data,array('ssa_id'=>$check_amount['ssa_id']));
                    }else{

                        $sql_amount = array(
                            'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$excel ['color'],
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$excel['color_remark'],
                            'stocks_sn'=>strtoupper($check_ea_id ['stocks_sku']),'size'=>strtoupper($excel ['size']),'ssa_store_id'=>$condition ['store_id'],
                            'stocks_price'=>$check_ea_id['stocks_price'],'goods_ea_id'=>$check_ea_id['goods_ea_id'],'goods_size_remark'=>$check_ea_id['size_note'],
                            'stocks_bar_code'=>strtoupper($check_ea_id['stocks_bar_code']),'goods_id'=>$excel['goods_id']
                        );
                       // $sql_amount['stocks_price'] = $excel['stocks_price'];
                        if(!empty($excel['stocks_bar_code'])){
                            $sql_amount['stocks_bar_code'] = $excel['stocks_bar_code'];
                        }
                        $this->db->insert('store_stocks_amount',$sql_amount);
                    }
                    if(empty($check_ea_id['stocks_bar_code'])&&!empty($excel['stocks_bar_code'])){
                        $this->db->update('shop_goods_extend_attr',array('stocks_bar_code'=>$excel['stocks_bar_code']),array('goods_ea_id'=>$check_ea_id['goods_ea_id']));
                    }
                }else{
                    $check_ea_id = $this->db->select('*')->where('goods_a_id',$excel ['goods_a_id'])
                        ->where(" (size is null or size='')")->get('shop_goods_extend_attr')->row_array();
                    //print_r($check_ea_id);die;
                    if(!empty($check_ea_id)){
                        $sql_ea = array(
                            'size'=>strtoupper($excel['size'])
                        );
                       /*  if(empty($check_ea_id['stocks_price'])&&$excel['stocks_price']!=''){
                            $sql_ea['stocks_price'] = $excel['stocks_price'];
                        } */
                        if(empty($check_ea_id['stocks_bar_code'])&&!empty($excel['stocks_bar_code'])){
                            $sql_ea['stocks_bar_code'] = $excel['stocks_bar_code'];
                        }
                        $excel['stocks_price'] = $check_ea_id['stocks_price'];
                        $excel['stocks_bar_code'] = empty($excel['stocks_bar_code'])?strtoupper($check_ea_id['stocks_bar_code']):$excel['stocks_bar_code'];
                        $sql_amount = array(
                            'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$check_ea_id ['color'],
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$check_ea_id['color_remark'],
                            'stocks_sn'=>strtoupper($check_ea_id ['stocks_sku']),'size'=>strtoupper($excel ['size']),'ssa_store_id'=>$condition ['store_id'],
                            'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$check_ea_id['goods_ea_id'],'goods_size_remark'=>$check_ea_id['size_note'],
                            'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$check_ea_id['goods_id']
                        );
                        $this->db->update('shop_goods_extend_attr',$sql_ea,array('goods_ea_id'=>$check_ea_id['goods_ea_id']));
                        $this->db->insert('store_stocks_amount',$sql_amount);
                    }else{
                        $ea_arr = $this->db->select('goods_a_id,goods_id,color,color_value,color_remark,size_note,stocks_price,stocks_marketprice,stocks_sku,stocks_bar_code')
                            ->where('goods_a_id',$excel['goods_a_id'])->limit(1)->get('shop_goods_extend_attr')->row_array();
                        //print_r($ea_arr);die;
                        $sql_ea = $ea_arr;
                        $sql_ea['stocks_price'] = $sql_ea['stocks_price'];
                        $sql_ea['stocks_bar_code'] = $excel['stocks_bar_code'];
                        $sql_ea['size'] = strtoupper($excel['size']);
                        $sql_ea['size_note'] = '';
                        $this->db->insert('shop_goods_extend_attr',$sql_ea);
                        $goods_ea_id = $this->db->insert_id();
                        $excel['stocks_price'] = empty($excel['stocks_price'])?$ea_arr['stocks_price']:$excel['stocks_price'];
                        $sql_amount = array(
                            'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$ea_arr ['color'],
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$ea_arr['color_remark'],
                            'stocks_sn'=>strtoupper($ea_arr ['stocks_sku']),'size'=>$excel ['size'],'ssa_store_id'=>$condition ['store_id'],
                            'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$goods_ea_id,'goods_size_remark'=>$ea_arr['size_note'],
                            'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$ea_arr['goods_id']
                        );
                        $this->db->insert('store_stocks_amount',$sql_amount);
                    }
                }
                $add_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                    echo "<script language='javascript'>" .
                        //'$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                }
                unset($excel);


            } else { // 有错误的EXCEL行
                $error[] = $false_msgs;
                @fputcsv($fp,$error);
                $is_download = true;
                $error_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                    echo "<script language='javascript'>" .
                        //'$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                }
                unset($excel);
            }
            @fclose($fp);
            ob_end_flush();
            ob_flush();
            flush();
            /*   if ($now_run % 100 == 0){
                  sleep(1);
              } */
        }
        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:"."[".date('H:i:s')."]，导入成功，正在生成错误列表excel，请稍等。。。"."</p>\");".
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();


        // 删除原EXCEL文件
        if (file_exists ( $csvpath )) {
            unlink ( $csvpath );
        }
        // 如有错误下载错误的文件
        if ($is_download) { // 存在格式不成功excel，下载
            ob_end_clean ();
            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $files .'.csv'));
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
        //@unlink($excelpath);
        exit();
    }

    
    /*按款号导入价格*/
    public function storeGoodsSku_import_price(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
    
        include VIEWPATH.'file_handle.html';
        $condition = $this->input->get();
        $condition['store_id'] = isset($_GET['store_id']) && !empty($_GET['store_id'])? $_GET['store_id']:'';
        set_time_limit(0);
        ini_set('memory_limit','-1');
        // 读取csv文件
        $csvpath = ROOTPATH.'data/excel/'.$condition['name'].'.csv';
        $files = date ( 'YmdHis' ) . uniqid ()."_error";
        $errorpath = ROOTPATH.'data/excel/'.$files.'.csv';
        $file = @fopen($csvpath,'r');
        $goods_list = array();
        if($file){
            while (!feof($file)) {
                $data = @fgetcsv($file);
                if(!empty($data)){
                    $goods_list[] = $data;
                }
            }
        }
        @fclose($file);
        if(empty($goods_list[0]) || empty($goods_list[1])){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>csv文件中有效信息内容为空！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
    
    
        $firstinfo = $goods_list[0];
        $firstinfo[] = @mb_convert_encoding('错误信息', "GBK", "UTF-8");
        unset($goods_list[0]);
        $fp = @fopen($errorpath, 'a');
        @fputcsv($fp,$firstinfo);
    
    
        $totalinfo = $goods_list;
        $rows = count($totalinfo); // 取得总行数
        if($rows>10000){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>按款号导入库存,一次最多导入10000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
        $all_num = $rows;
        //print_r($condition);die;
        // 数据处理
        $datas = array ();
        $excel = array ();
        $is_download = false;
        //正确和错误条数计数
        $add_num = 0;
        $edit_num = 0;
        $error_num = 0;
        //当前执行位置
        $now_run = 1;
        $percent = 0;
        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-play-circle-o c-success'></i>:"."[".date('H:i:s')."]，开始处理。"."</p>\");".
            '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();
        $auth_brand = array();
        $error_col = 'I';
        $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$condition['store_id'])->get('store_attr_brands')->result_array();
        foreach ($auth_brand_arr as $v){
            $auth_brand[] = $v['brand_id'];
        }
        $user_id = $_SESSION['shop_spg_id'];
        $user_name = $_SESSION['shop_spg_nike_name'];
        $user_type = 2;
        $time = time();
        if(isset($condition['type'])&&$condition['type']==1){
            $update = array(
                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>2,
            );
            $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);
        }
    
        $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;
            $counterror = count($error);
            $flag = false;
            $false_msg ='';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            // 品牌<必填>
    
            $brand_name = trim($this->common_function->gstr($val[0]));
            if (empty( $brand_name )) {
                $false_msgs = @mb_convert_encoding("品牌必填", "GBK", "UTF-8");
                $false_msg .= "品牌必填";
                $flag = true;
            }else{
                $brand_id = $this->db->select('brand_id')->where('brand_name',$brand_name)->get('shop_brand')->row('brand_id');
                if(empty($brand_id)){
                    $false_msgs = @mb_convert_encoding("系统还未添加此品牌", "GBK", "UTF-8");
                    $false_msg .= "系统还未添加此品牌";
                    $flag = true;
                }elseif(!in_array($brand_id, $auth_brand)){
                    $false_msgs = @mb_convert_encoding("此品牌还未给此门店授权", "GBK", "UTF-8");
                    $false_msg .= "此品牌还未给此门店授权";
                    $flag = true;
                }
            }
            // 款号<必填>
            $excel ['stocks_spu'] = strtoupper(trim($this->common_function->gstr($val[1])));
            if (empty( $excel ['stocks_spu'] )) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("款号必填", "GBK", "UTF-8");
                }
                $false_msg .= "款号必填";
                $flag = true;
            }else{
                //查找商品id
                if(!$flag){
                    $check_stock = $this->db->select('sg.goods_id')->from('shop_goods as sg')
                    ->where('sg.goods_spu',$excel ['stocks_spu'])
                    ->where("(sg.goods_pos={$condition['store_id']} or sg.goods_pos=0)")->where('sg.goods_state!=0')
                    ->where('sg.brand_id',$brand_id)->order_by('sg.goods_pos','DESC')->group_by('sg.goods_id')->get()->result_array();
                    $check_stock = isset($check_stock[0])?$check_stock[0]:'';
                    //print_r($check_stock);die;
                    if(empty($check_stock['goods_id'])){
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("款号不存在", "GBK", "UTF-8");
                        }
                        $false_msg .= "款号不存在";
                        $flag = true;
                    }else{
                        $excel['brand_id'] = $brand_id;
                        $excel['goods_id'] = $check_stock['goods_id'];
                    }
    
                }
    
            }
            //主色<必填>
            $excel ['color'] = trim($this->common_function->gstr($val[2]));
            if ( $excel ['color']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("主色必填", "GBK", "UTF-8");
                }
                $false_msg .= "主色必填";
                $flag = true;
            }
            //颜色<必填>
            $excel ['color_remark'] = trim($this->common_function->gstr($val[3]));
            if ( $excel ['color_remark']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("颜色必填", "GBK", "UTF-8");
                }
                $false_msg .= "颜色必填";
                $flag = true;
            }
            if(!$flag){
                //查找goods_a_id
                $check_color = $this->db->select('goods_a_id')->from('shop_goods_extend')
                ->where('goods_id',$excel['goods_id'])->where('color_remark',$excel ['color_remark'])->where('color',$excel ['color'])
                ->get()->row_array();
                if(empty($check_color)){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("此货不存在该颜色", "GBK", "UTF-8");
                    }
                    $false_msg .= "此货不存在该颜色";
                    $flag = true;
                }else{
                    $excel['goods_a_id'] = $check_color['goods_a_id'];
                }
            }
            //尺码<必填>
            $excel ['size'] = strtoupper(trim($this->common_function->gstr($val[4])));
            if ( $excel ['size']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("尺码必填", "GBK", "UTF-8");
                }
                $false_msg .= "尺码必填";
                $flag = true;
            }
            if(!$flag){
                $gc_id = $this->db->select('s.size')->from('code_segment_size s')
                ->join('shop_brand b','b.brand_size_type=s.flag')
                ->join('shop_goods g','g.brand_id=b.brand_id')
                ->where('s.size',$excel['size'])->where('g.goods_id',$excel['goods_id'])
                ->get()->row('size');
                if($gc_id==''){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("尺码不存在。请先添加此类商品的尺码", "GBK", "UTF-8");
                    }
                    $false_msg .= "尺码不存在。请先添加此类商品的尺码";
                    $flag=true;
                }
    
            }
            //售价<必填>
            $excel ['stocks_price'] = intval($this->common_function->gstr($val[5]));
            if (empty ( $excel ['stocks_price'])) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("售价必填", "GBK", "UTF-8");
                }
                $false_msg .= "售价必填";
                $flag = true;
            }
            if (! $flag) {
                //print_r($check_ea_id);die;
                $check_ea_id = $this->db->select('stocks_bar_code,goods_ea_id,size_note,stocks_sku,stocks_price')->where('goods_a_id',$excel ['goods_a_id'])
                ->where('size',$excel ['size'])->get('shop_goods_extend_attr')->row_array();
                if(!empty($check_ea_id)){
                    $check_amount = $this->db->select('ssa_id,goods_id')->where('goods_ea_id',$check_ea_id ['goods_ea_id'])
                    ->where('ssa_store_id',$condition ['store_id'])
                    ->get('store_stocks_amount')->row_array();
                    if($check_amount['ssa_id']){
                        $update_data1 = array(
                            'uec_stocks_price'=>$excel ['stocks_price'],'stocks_price'=>$excel ['stocks_price'],'update_user_name'=>$user_name,
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,'update_time'=>$time
                        );
                        $update_data2 = array(
                            'stocks_price'=>$excel ['stocks_price']
                        );
                        $update_data3 = array(
                            'goods_price'=>$excel ['stocks_price']
                        );
                        $this->db->update('store_stocks_amount',$update_data1,array('ssa_id'=>$check_amount['ssa_id']));
                        /* $this->db->trans_off(); //禁用事务
                        $this->db->trans_start(); //开启事务
                        $this->db->update('shop_goods_extend_attr',$update_data2,array('goods_ea_id'=>$check_ea_id ['goods_ea_id']));
                        $this->db->where('goods_id',$check_amount['goods_id'])->where('goods_pos',$condition ['store_id'])->update('shop_goods',$update_data3);
                        $this->db->trans_complete(); //事务完成
                        $this->db->trans_off(); //禁用事务 */
                        $add_num++;
                        if( (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                            echo "<script language='javascript'>" .
                                //'$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".
                            '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                            "location.href = '#anchor';" .
                            "</script>";
                        }
                        unset($excel);
                    }
                }
    
            } else { // 有错误的EXCEL行
                $error[] = $false_msgs;
                @fputcsv($fp,$error);
                $is_download = true;
                $error_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                    echo "<script language='javascript'>" .
                        //'$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                }
                unset($excel);
            }
            @fclose($fp);
            ob_end_flush();
            ob_flush();
            flush();
            /*   if ($now_run % 100 == 0){
             sleep(1);
            } */
        }
        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:"."[".date('H:i:s')."]，导入成功，正在生成错误列表excel，请稍等。。。"."</p>\");".
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();
    
    
        // 删除原EXCEL文件
        if (file_exists ( $csvpath )) {
            unlink ( $csvpath );
        }
        // 如有错误下载错误的文件
        if ($is_download) { // 存在格式不成功excel，下载
            ob_end_clean ();
            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $files .'.csv'));
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
        //@unlink($excelpath);
        exit();
    }
    
    

    /*按条码导入库存*/
    public function storeGoodsBarcode_import(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        include VIEWPATH.'file_handle.html';
        $condition = $this->input->get();
        $condition['store_id'] = isset($_GET['store_id']) && !empty($_GET['store_id'])? $_GET['store_id']:'';
        set_time_limit(0);
        ini_set('memory_limit','-1');
        // 读取csv文件
        $csvpath = ROOTPATH.'data/excel/'.$condition['name'].'.csv';
        $files = date ( 'YmdHis' ) . uniqid ()."_error";
        $errorpath = ROOTPATH.'data/excel/'.$files.'.csv';
        $file = @fopen($csvpath,'r');
        $goods_list = array();
        if($file){
            while (!feof($file)) {
                $data = @fgetcsv($file);
                if(!empty($data)){
                    $goods_list[] = $data;
                }
            }
        }
        @fclose($file);
        if(empty($goods_list[0]) || empty($goods_list[1])){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>csv文件中有效信息内容为空！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }


        $firstinfo = $goods_list[0];
        $firstinfo[] = @mb_convert_encoding('错误信息', "GBK", "UTF-8");
        unset($goods_list[0]);
        $fp = @fopen($errorpath, 'a');
        @fputcsv($fp,$firstinfo);


        $totalinfo = $goods_list;
        $rows = count($totalinfo); // 取得总行数
        if($rows>50000){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>按条码导入库存,一次最多导入50000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
        $all_num = $rows;
        //print_r($condition);die;
        // 数据处理
        $datas = array ();
        $excel = array ();
        $is_download = false;
        //正确和错误条数计数
        $add_num = 0;
        $edit_num = 0;
        $error_num = 0;
        //当前执行位置
        $now_run = 1;
        $percent = 0;
        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-play-circle-o c-success'></i>:"."[".date('H:i:s')."]，开始处理。"."</p>\");".
            '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();
        $auth_brand = array();
        $error_col = 'D';
        $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$condition['store_id'])->get('store_attr_brands')->result_array();
        foreach ($auth_brand_arr as $v){
            $auth_brand[] = $v['brand_id'];
        }
        $user_id = $_SESSION['shop_spg_id'];
        $user_name = $_SESSION['shop_spg_nike_name'];
        $user_type = 2;
        $time = time();
        if(isset($condition['type'])&&$condition['type']==1){
            $update = array(
                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>2,
            );
            $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);
        }

        $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;
            $counterror = count($error);
            $flag = false;
            $false_msg ='';
            $false_msgs = '';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            // 条码<必填>
            $excel['barcode'] = strtoupper(trim($this->common_function->gstr($val[0])));
            if (empty( $excel['barcode'] )) {
                $false_msgs = @mb_convert_encoding("商品条形码必填", "GBK", "UTF-8");
                $false_msg .= "商品条形码必填";
                $flag = true;
            }else{
                $check_goods = $this->db->select('g.brand_id,ea.*')->from('shop_goods g')
                    ->join('shop_goods_extend_attr ea','ea.goods_id=g.goods_id')
                    ->where('ea.stocks_bar_code',$excel['barcode'])
                    ->where("(g.goods_pos={$condition['store_id']} or g.goods_pos=0)")->where('g.goods_state!=0')
                    ->order_by('g.goods_pos','DESC')->group_by('g.goods_id')->get()->result_array();
                $check_barcode = isset($check_goods[0])?$check_goods[0]:'';
                if(empty($check_barcode)){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("此条码对应的商品不存在", "GBK", "UTF-8");
                    }
                    $false_msg .= "此条码对应的商品不存在";
                    $flag = true;
                }elseif(!in_array($check_barcode['brand_id'], $auth_brand)){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("此商品品牌还未给此门店授权", "GBK", "UTF-8");
                    }
                    $false_msg .= "此商品品牌还未给此门店授权";
                    $flag = true;
                }
            }
            //库存<必填>
            $excel ['amount'] = intval($this->common_function->gstr($val[1]));
            if (empty ( $excel ['amount'])) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("库存必填", "GBK", "UTF-8");
                }
                $false_msg .= "库存必填";
                $flag = true;
            }
            //售价
            //$excel ['stocks_price'] = trim($this->common_function->gstr($val[2]));
            if (! $flag) {
                //print_r($check_ea_id);die;

                $check_amount = $this->db->select('ssa_id,amount,update_time')->where('goods_ea_id',$check_barcode ['goods_ea_id'])
                    ->where('ssa_store_id',$condition ['store_id'])
                    ->get('store_stocks_amount')->row_array();
                if($check_amount['ssa_id']){
                    if($check_amount['update_time']==$time){
                        $amount = $excel['amount']+$check_amount['amount'];
                    }else{
                        $amount = $excel['amount'];
                    }
                    $update_data = array(
                        'amount'=>$amount,'update_time'=>$time,'update_user_name'=>$user_name,
                        'update_user_id'=>$user_id,'update_user_type'=>$user_type,'stocks_bar_code'=>strtoupper($check_barcode['stocks_bar_code']),
                        'stocks_sn'=>strtoupper($check_barcode['stocks_sku']),
                    );
                  /*   if(!empty($excel ['stocks_price'])){
                        $update_data['stocks_price'] = $excel['stocks_price'];
                    } */
                    $this->db->update('store_stocks_amount',$update_data,array('ssa_id'=>$check_amount['ssa_id']));
                }else{
                    $check_barcode['stocks_price'] = $check_barcode ['stocks_price'];
                    $sql_amount = array(
                        'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$check_barcode ['color'],
                        'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$check_barcode['color_remark'],
                        'stocks_sn'=>strtoupper($check_barcode ['stocks_sku']),'size'=>strtoupper($check_barcode ['size']),'ssa_store_id'=>$condition ['store_id'],
                        'stocks_price'=>$check_barcode['stocks_price'],'goods_ea_id'=>$check_barcode['goods_ea_id'],'goods_size_remark'=>$check_barcode['size_note'],
                        'stocks_bar_code'=>$excel['barcode'],'goods_id'=>$check_barcode['goods_id']
                    );
                    $this->db->insert('store_stocks_amount',$sql_amount);
                }

                $add_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                    echo "<script language='javascript'>" .
                        //'$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                }
                unset($excel);


            } else { // 有错误的EXCEL行
                $is_download = true;
                $error[] = $false_msgs;
                @fputcsv($fp,$error);
                $error_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                    echo "<script language='javascript'>" .
                        //'$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                }
                unset($excel);
            }
            ob_end_flush();
            ob_flush();
            flush();
            /*    if ($now_run % 100 == 0){
                   sleep(1);
               } */
        }
        @fclose($fp);

        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:"."[".date('H:i:s')."]，导入成功，正在生成错误列表excel，请稍等。。。"."</p>\");".
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();

        // 删除原EXCEL文件
        if (file_exists ( $csvpath )) {
            unlink ( $csvpath );
        }
        // 如有错误下载错误的文件
        if ($is_download) { // 存在格式不成功excel，下载
            ob_end_clean ();
            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $files .'.csv'));
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
        //@unlink($excelpath);
        exit();
    }


    /*按条码导入价格*/
    public function storeGoodsBarcode_import_price(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        include VIEWPATH.'file_handle.html';
        $condition = $this->input->get();
        $condition['store_id'] = isset($_GET['store_id']) && !empty($_GET['store_id'])? $_GET['store_id']:'';
        set_time_limit(0);
        ini_set('memory_limit','-1');
        // 读取csv文件
        $csvpath = ROOTPATH.'data/excel/'.$condition['name'].'.csv';
        $files = date ( 'YmdHis' ) . uniqid ()."_error";
        $errorpath = ROOTPATH.'data/excel/'.$files.'.csv';
        $file = @fopen($csvpath,'r');
        $goods_list = array();
        if($file){
            while (!feof($file)) {
                $data = @fgetcsv($file);
                if(!empty($data)){
                    $goods_list[] = $data;
                }
            }
        }
        @fclose($file);
        if(empty($goods_list[0]) || empty($goods_list[1])){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>csv文件中有效信息内容为空！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
    
    
        $firstinfo = $goods_list[0];
        $firstinfo[] = @mb_convert_encoding('错误信息', "GBK", "UTF-8");
        unset($goods_list[0]);
        $fp = @fopen($errorpath, 'a');
        @fputcsv($fp,$firstinfo);
    
    
        $totalinfo = $goods_list;
        $rows = count($totalinfo); // 取得总行数
        if($rows>50000){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>按条码导入库存,一次最多导入50000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
        $all_num = $rows;
        //print_r($condition);die;
        // 数据处理
        $datas = array ();
        $excel = array ();
        $is_download = false;
        //正确和错误条数计数
        $add_num = 0;
        $edit_num = 0;
        $error_num = 0;
        //当前执行位置
        $now_run = 1;
        $percent = 0;
        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-play-circle-o c-success'></i>:"."[".date('H:i:s')."]，开始处理。"."</p>\");".
            '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();
        $auth_brand = array();
        $error_col = 'D';
        $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$condition['store_id'])->get('store_attr_brands')->result_array();
        foreach ($auth_brand_arr as $v){
            $auth_brand[] = $v['brand_id'];
        }
        $user_id = $_SESSION['shop_spg_id'];
        $user_name = $_SESSION['shop_spg_nike_name'];
        $user_type = 2;
        $time = time();
        if(isset($condition['type'])&&$condition['type']==1){
            $update = array(
                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>2,
            );
            $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);
        }
    
        $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;
            $counterror = count($error);
            $flag = false;
            $false_msg ='';
            $false_msgs = '';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            // 条码<必填>
            $excel['barcode'] = strtoupper(trim($this->common_function->gstr($val[0])));
            if (empty( $excel['barcode'] )) {
                $false_msgs = @mb_convert_encoding("商品条形码必填", "GBK", "UTF-8");
                $false_msg .= "商品条形码必填";
                $flag = true;
            }else{
                $check_goods = $this->db->select('g.brand_id,ea.*')->from('shop_goods g')
                ->join('shop_goods_extend_attr ea','ea.goods_id=g.goods_id')
                ->where('ea.stocks_bar_code',$excel['barcode'])
                ->where("(g.goods_pos={$condition['store_id']} or g.goods_pos=0)")->where('g.goods_state!=0')
                ->order_by('g.goods_pos','DESC')->group_by('g.goods_id')->get()->result_array();
                $check_barcode = isset($check_goods[0])?$check_goods[0]:'';
                if(empty($check_barcode)){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("此条码对应的商品不存在", "GBK", "UTF-8");
                    }
                    $false_msg .= "此条码对应的商品不存在";
                    $flag = true;
                }elseif(!in_array($check_barcode['brand_id'], $auth_brand)){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("此商品品牌还未给此门店授权", "GBK", "UTF-8");
                    }
                    $false_msg .= "此商品品牌还未给此门店授权";
                    $flag = true;
                }
            }
            //售价<必填>
            $excel ['stocks_price'] = intval($this->common_function->gstr($val[1]));
            if (empty ( $excel ['stocks_price'])) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("售价必填", "GBK", "UTF-8");
                }
                $false_msg .= "售价必填";
                $flag = true;
            }
            
            if (! $flag) {
                $check_amount = $this->db->select('ssa_id,goods_id')->where('goods_ea_id',$check_barcode ['goods_ea_id'])
                ->where('ssa_store_id',$condition ['store_id'])
                ->get('store_stocks_amount')->row_array();
                if($check_amount['ssa_id']){
                    $update_data1 = array(
                        'uec_stocks_price'=>$excel ['stocks_price'],'stocks_price'=>$excel ['stocks_price'],'update_user_name'=>$user_name,
                        'update_user_id'=>$user_id,'update_user_type'=>$user_type,'update_time'=>$time
                    );
                    $update_data2 = array(
                        'stocks_price'=>$excel ['stocks_price']
                    );
                    $update_data3 = array(
                        'goods_price'=>$excel ['stocks_price']
                    );
                    $this->db->update('store_stocks_amount',$update_data1,array('ssa_id'=>$check_amount['ssa_id']));
                    /* $this->db->trans_off(); //禁用事务
                    $this->db->trans_start(); //开启事务
                    $this->db->update('shop_goods_extend_attr',$update_data2,array('goods_ea_id'=>$check_barcode ['goods_ea_id']));
                    $this->db->where('goods_id',$check_amount['goods_id'])->where('goods_pos',$condition ['store_id'])->update('shop_goods',$update_data3);
                    $this->db->trans_complete(); //事务完成
                    $this->db->trans_off(); //禁用事务 */
                    
                    $add_num++;
                    if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                        echo "<script language='javascript'>" .
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                    }
                    unset($excel);
                }
    
            } else { // 有错误的EXCEL行
                $is_download = true;
                $error[] = $false_msgs;
                @fputcsv($fp,$error);
                $error_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                    echo "<script language='javascript'>" .
                        //'$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                }
                unset($excel);
            }
            ob_end_flush();
            ob_flush();
            flush();
            /*    if ($now_run % 100 == 0){
             sleep(1);
            } */
        }
        @fclose($fp);
    
        ob_clean();
        ob_start();
        echo "<script language='javascript'>" .
            '$("#box").append("'."<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:"."[".date('H:i:s')."]，导入成功，正在生成错误列表excel，请稍等。。。"."</p>\");".
            "</script>";
        ob_end_flush();
        ob_flush();
        flush();
    
        // 删除原EXCEL文件
        if (file_exists ( $csvpath )) {
            unlink ( $csvpath );
        }
        // 如有错误下载错误的文件
        if ($is_download) { // 存在格式不成功excel，下载
            ob_end_clean ();
            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $files .'.csv'));
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
        //@unlink($excelpath);
        exit();
    }


    //******************************************
    /*店铺导购*/
    public function store_of_shopping_guide(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role',$role);
        $store_id = isset($_GET['id'])?trim($_GET['id']):false;
        $op = isset($_GET['op'])?trim($_GET['op']):false;
        if($op&&$op=='edit'&&$store_id){
            $store_data = array();
            $store_data = $this->db->select('store_id,store_name')->where('store_id',$store_id)->get('store')->row_array();
            $this->smarty->assign('store_data',$store_data);
            $this->smarty->assign('store_id',$store_id);
            $roles = $this->db->select('role_id,role_name')->get('platform_roles')->result_array();
            $roles_str = '';
            if($roles){
                foreach ($roles as $k=>$v){
                    $roles_str .= "<option value=".$v['role_id']." >".$v['role_name']."</option>";
                }
            }
            $this->smarty->assign('roles_str',$roles_str);

            $this->smarty->display ('public_store_of_shopping_guide.html');
        }

    }


    /*导购列表*/
    public function get_store_shopping_guide(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        $store_id = isset($_GET['id'])?trim($_GET['id']):false;

        if($store_id){
            $where = " s.store_id='{$store_id}'  ";
        }


        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
            if(!$store_id){
                $str  =  $this->stores_model->get_store_by_role(1);
                if($str){
                    $where = " s.store_id in(".$str.")  ";
                }else{
                    $where = " s.store_id ='w'  ";
                }

            }

        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
            if(!$store_id){
                $str  =  $this->stores_model->get_store_by_role(2);
                if($str){
                    $where = " s.store_id in(".$str.")  ";
                }else{
                    $where = " s.store_id ='d'  ";
                }
            }
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
            if(!$store_id){
                $str  =  $this->stores_model->get_store_by_role(3);
                if($str){
                    $where = " s.store_id in(".$str.")  ";
                }else{
                    $where = " s.store_id ='g'  ";
                }
            }
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
            if(!$store_id){
                $where = " 1 = '1'  ";
            }
        }


        $default_pic = TEMPLE.'img/default_goods_image_240.gif';
        $op = isset($_GET['op'])?trim($_GET['op']):'';
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;


        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }
        $total = $this->db->select('count(1) as num')->from('store_shopping_guide as sp')
            ->join('store as s','s.store_id=sp.spg_store_id','left')
            ->where($where)->get()->row('num');
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        $start = $rp * ($page - 1);
        $rows = $this->db->select('sp.*,s.store_name')->from('store_shopping_guide as sp')
            ->join('store as s','s.store_id=sp.spg_store_id','left')
            ->where($where)->limit($start,$rp)->get()->result_array();


        $roles = $this->db->select('role_id,role_name')->get('platform_roles')->result_array();
        $roles_type = array();
        if($roles){
            foreach ($roles as $key=>$val){
                $roles_type[$val['role_id']] = $val['role_name'];
            }
        }
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows as $row){
            $xml .= "<row id='".$row['spg_id']."'>";
            $check_role = $this->db->select('spg_id')->where('spg_store_id',$row['spg_store_id'])->where('role_type',2)->get('store_shopping_guide')->row('spg_id');
            $check_role = empty($check_role)?0:$check_role;
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_edit(" . $row['spg_id'] . ")' <i class='fa fa-trash-o'></i>编辑</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                         <ul>
    		                <li><a onclick=fg_delete(" .$row['spg_id'] .",'" .$row['spg_name']."')>离职</a></li>
    		                <li><a onclick=update_role(". $row['spg_id'].",".$check_role.",".$row['role_type'].",'".$row['spg_name'] ."')>职位变更</a></li>
    	                    <li><a onclick=create_shot_code(". $row['spg_id'] .")>下载二维码</a></li>";
            $xml .= "</ul></span>]]></cell>";

            //$xml .= "<cell><![CDATA[".$row['spg_id']."]]></cell>";

            $head_portrait = base_url($row['head_portrait']);
            if(!empty($row['head_portrait'])&&file_exists(ROOTPATH.$row['head_portrait'])){
                $head_portrait = base_url($row['head_portrait']);
            }else{
                $head_portrait = $default_pic;
            }
            $xml .= "<cell><![CDATA[<img src=\"".$head_portrait.'" class="user-avatar"'.
                ' onerror="this.src=\''.$head_portrait.'\'" style="border-radius:50%;height:80%;"'.
                ' data-geo="<img src=\''.$head_portrait.'\' width=300px >">'.
                $row['spg_nike_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['spg_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['spg_tel']."]]></cell>";
            $role_type = !empty($roles_type)?$roles_type[$row['role_type']]:'--';
            $xml .= "<cell><![CDATA[".$role_type."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['store_name']."]]></cell>";
            $order=$this->db->select('count(order_sn) as total')->where('spg_id',$row['spg_id'])->where('store_id',$row['spg_store_id'])->where('order_status>=',20)->get('shop_order')->row('total');
            $xml .= "<cell><![CDATA[".$order."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }


    /*导购离职*/
    public function del_guide(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $id = isset($_POST['id'])?trim($_POST['id']):'';
        $result = array('state'=>false,'msg'=>'数据错误');
        if($id){
            if($this->db->where("spg_id in (".$id.")")->update('store_shopping_guide',array('spg_store_id'=>''))){
                $this->common_function->shop_admin_log('导购’'.$id.'‘' ,'edit', '门店导购');
                $result = array('state'=>true,'msg'=>'离职成功');
            }else{
                $result = array('state'=>false,'msg'=>'离职失败，请稍后重试!');
            }
        }
        echo json_encode($result);exit;
    }



    //导购更新
    public function update_role(){
        $spg_id = isset($_POST['id'])?trim($_POST['id']):'';
        $role = isset($_POST['role'])?trim($_POST['role']):'';
        $check = isset($_POST['check'])?trim($_POST['check']):'';
        $result = array('state'=>false,'msg'=>'操作错误');
        if($spg_id&&$role){
            $this->db->update('store_shopping_guide',array('role_type'=>$role),array('spg_id'=>$spg_id));
            $result = array('state'=>true,'msg'=>'修改完成');
        }
        echo json_encode($result);die;
    }




    /*导购编辑 新增*/
    public function store_shopping_guide_edit(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role',$role);
        $store_id = isset($_GET['store_id'])?trim($_GET['store_id']):'';
        $id = isset($_GET['id'])?trim($_GET['id']):'';
        if($id){
            $data = $this->db->select('*')->where('spg_id',$id)->get('store_shopping_guide')->row_array();
            $data['birth'] = $data['birth_y'].'-'.sprintf("%02d",$data['birth_m']).'-'.sprintf("%02d",$data['birth_d']);
            $this->smarty->assign('data',$data);

            //print_r($data);exit;
        }
        if($store_id){
            $store_name = $this->db->select('store_name')->where('store_id',$store_id)->get('store')->row('store_name');
            $this->smarty->assign('store_id',$store_id);
            $this->smarty->assign('store_name',$store_name);
        }
        $store = $this->db->select('store_id,store_name')->get('store')->result_array();
        $this->smarty->assign('store',$store);


        $roles = $this->db->select('role_id,role_name')->get('platform_roles')->result_array();
        $this->smarty->assign('roles',$roles);


        $this->smarty->display ('public_store_shopping_guide_edit.html');
    }


    /*导购编辑，添加*/
    public function store_guide_add(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }

        $spg_id = isset($_POST['spg_id'])?trim($_POST['spg_id']):'';
        $birth = isset($_POST['birth'])?trim($_POST['birth']):'';
        $spg = $_POST;
        $birth_time = strtotime($birth);
        $spg['birth_y'] = date('Y',$birth_time);
        $spg['birth_m'] = date('m',$birth_time);
        $spg['birth_d'] = date('d',$birth_time);
        if(isset($spg['password'])&&!empty($spg['password'])){
            $spg['password'] = encrypt_pwd($spg['password']);
        }

        if(isset($spg['store_id'])){
            unset($spg['store_id']);
        }
        unset($spg['birth']);
        unset($spg['textfield']);
        unset($spg['default_goods_image']);
        unset($spg['class_password']);
        $time = time();
        if($spg['spg_store_id']){
            if(empty($spg_id)){
                $data['phone'] = $spg['spg_tel'];
                if(empty($spg['password'])){
                    $pwd = $this->common_function->mt_rand_str(6);
                    $spg['password'] = encrypt_pwd($pwd);
                    $customer = '门店';
                    $content = array('store'=>"$customer",'pwd'=>"$pwd");
                    $data['content'] = json_encode($content);
                    $data['template_sms_id'] = 'SMS_62130010';
                    $resp = $this->common_function->AlidayuSms($data);
                }

                $rows = $this->db->select('spg_store_id,spg_id')->from('store_shopping_guide')->where('spg_tel',$data['phone'])->get()->row_array();
                if($rows['spg_id']){
                    if($rows['spg_store_id'] && $rows['spg_store_id']>0){
                        $store_name = $this->db->select('store_name')->where('store_id',$rows['spg_store_id'])->get('store')->row('store_name');
                        if($store_name && !empty($store_name)){
                            $this->common_function->show_message('该导购已存在,位置:'.$store_name.',请先办理离职!');
                        }else{
                            unset($spg['spg_id']);
                            $this->db->where('spg_id',$rows['spg_id'])->update('store_shopping_guide',$spg);
                            $spgId = $rows['spg_id'];
                            $operate = '修改';
                            $operation = 'edit';
                        }

                    }else{
                        unset($spg['spg_id']);
                        $this->db->where('spg_id',$rows['spg_id'])->update('store_shopping_guide',$spg);
                        $spgId = $rows['spg_id'];
                        $operate = '修改';
                        $operation = 'edit';
                    }

                }else{
                    $this->db->insert('store_shopping_guide',$spg);
                    $spgId = $this->db->insert_id();
                    $operate = '添加';
                    $operation = 'add';
                }

            }else{
                $rows = $this->db->select('spg_store_id,spg_id')->from('store_shopping_guide')->where('spg_id',$spg_id)->get()->row_array();
                if( $rows && !empty( $rows)){
                    if($rows['spg_store_id'] >0 &&  $rows['spg_store_id'] != $spg['spg_store_id']){
                        $store_name = $this->db->select('store_name')->where('store_id',$rows['spg_store_id'])->get('store')->row('store_name');
                        if($store_name && !empty($store_name)){
                            $this->common_function->show_message('该导购已存在,位置:'.$store_name.',请先办理离职!');
                        }else{
                            unset($spg['spg_id']);
                            $this->db->where('spg_id',$spg_id)->update('store_shopping_guide',$spg);
                            $spgId = $spg_id;
                            $operate = '修改';
                            $operation = 'edit';
                        }

                    }else{
                        unset($spg['spg_id']);
                        $this->db->where('spg_id',$spg_id)->update('store_shopping_guide',$spg);
                        $spgId = $spg_id;
                        $operate = '修改';
                        $operation = 'edit';
                    }
                }
            }
            //图片处理
            $head_portrait = array();
            if(isset($_FILES['default_goods_image'])&&!empty($_FILES['default_goods_image'])){
                $head_portrait=$_FILES['default_goods_image'];
            }
            //print_r($head_portrait);exit;
            if($head_portrait['error']==0&&!empty($head_portrait['name'])){
                $flag = true;
                $status = false;
                if($head_portrait['error']!=0&&!empty($head_portrait['name'])){
                    $this->common_function->show_message('头像上传错误');
                }else{
                    if(stripos('image/png,image/jpeg,image/jpg,image/gif',trim($head_portrait['type']))===false){
                        $flag = false;
                    }
                }


                if(!$flag){
                    $result['state'] = true;
                    $result['msg'] = '请检查上传的文件是不是图片格式';
                    $this->common_function->show_message($result['msg']);
                }
                $upload = true;
                $dir = isset($dir)?$dir:'./data/store_guide_headportrait/';
                //print_r(file_exists($dir));exit;
                $k = 'head_portrait';
                $store['ous_logo'] = '';
                $store['ous_shop_signs'] = '';
                if (!file_exists($dir) || !is_writable($dir)) {

                    if (!@mkdir($dir, 0755)) {

                        if(!empty($head_portrait['name'])){
                            $aryStr = explode(".", $head_portrait['name']);
                            $new_name = $k.'_'.$spgId.'.'.strtolower($aryStr[count($aryStr)-1]);
                            if(file_exists($dir.$new_name)){
                                @unlink($dir.$new_name);
                            }
                            if(!@move_uploaded_file($head_portrait['tmp_name'],$dir.$new_name)){
                                //print_r($v['tmp_name']);exit;
                                $upload = false;
                            }else{
                                //$store[$k] = $dir.$new_name;
                                $spg['head_portrait'] = $dir.$new_name;
                                $this->db->where('spg_id',$spgId)->update('store_shopping_guide',array('head_portrait'=>$dir.$new_name));
                            }
                        }else{
                            $upload = false;
                        }
                    }else{
                        $upload = false;
                    }
                }else{
                    if(!empty($head_portrait['name'])){
                        $aryStr = explode(".", $head_portrait['name']);
                        $new_name = $k.'_'.$spgId.'.'.strtolower($aryStr[count($aryStr)-1]);
                        if(file_exists($dir.$new_name)){
                            @unlink($dir.$new_name);
                        }
                        if(!@move_uploaded_file($head_portrait['tmp_name'],$dir.$new_name)){
                            $upload = false;
                        }else{
                            $spg['head_portrait'] = $dir.$new_name;
                            //$store[$k] = $dir.$new_name;
                            $this->db->where('spg_id',$spgId)->update('store_shopping_guide',array('head_portrait'=>$dir.$new_name));
                        }
                    }else{
                        $upload = false;
                    }
                }
                if(!$upload){
                    $result['msg'] = '图片上传失败！请编辑重新上传';
                    $this->common_function->show_message('店铺'.$operate.'失败。'.$result['msg']);
                }
            }
            if(isset($_POST['store_id'])){
                $links = array(
                    0 => array(
                        'text' => '导购列表',
                        'href' => 'store_shopping_guide?role='.$role
                    ),
                );
            }else{
                $links = array(
                    0 => array(
                        'text' => '导购列表',
                        'href' => 'store_shopping_guide?role='.$role
                    ),

                );
            }
            $this->common_function->shop_admin_log($spg['spg_name'], $operation, '导购管理');
            $this->common_function->show_message($operate.'成功',0 ,$links);

        }else{
            $this->common_function->show_message('所属店铺不能为空！');
        }

    }


    /*导购检查电话*/
    public function check_guideTel(){
        $id = isset($_POST['id'])?trim($_POST['id']):'';
        $tel = isset($_POST['tel'])?trim($_POST['tel']):'';
        $result = array('state'=>false,'msg'=>'');
        if($tel){
            $rows = $this->db->select('spg_store_id,spg_id')->from('store_shopping_guide')->where('spg_tel',$tel)->get()->row_array();
            if($rows){
                if(empty($id)){
                    if($rows['spg_store_id']){
                        $store_name = $this->db->select('store_name')->where('store_id',$rows['spg_store_id'])->get('store')->row('store_name');
                        $result['state'] = true;
                        $result['msg'] = '该导购已存在,位置:'.$store_name.',请先办理离职!';
                    }
                }
            }
        }
        echo json_encode($result);exit;
    }

    /*查找店铺*/
    public function select_store(){
        $spg_id = isset($_POST['id'])?trim($_POST['id']):'';
        if($spg_id){
            $spg_store = $this->db->select('spg_store_id')->where('spg_id',$spg_id)->get('store_shopping_guide')->row('spg_store_id');
            $data = $this->db->select('store_id,store_name')->where("store_id!='".$spg_store."'")->get('store')->result_array();
            echo json_encode(array('state'=>true,'data'=>$data,'msg'=>''));exit;
        }else{
            echo json_encode(array('state'=>false,'data'=>'','msg'=>'操作错误'));exit;
        }
    }



    //******************************************

    /*店铺运费*/
    public function mall_express_tools(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role',$role);
        $store_id = isset($_GET['id'])?trim($_GET['id']):false;
        $op = isset($_GET['op'])?trim($_GET['op']):false;
        if(isset($op)&&$store_id){
            $store_data = array();
            $store_data = $this->db->select('store_id,store_name,ept_id,is_show_ept_desc,ept_show_desc')->where('store_id',$store_id)->get('store')->row_array();
            $this->smarty->assign('store_data',$store_data);
            $rp = isset($_POST['rp']) ? trim($_POST['rp']) : 10;
            $page = isset($_POST['page']) ? trim($_POST['page']) : 1;
            $op = isset($_GET['op']) ? trim($_GET['op']) : false;
            $where = " 1=1 ";
            $user_express = $this->db->select('et.*,etf.*,etfa.region_area_id,
	        a.area_name,a.area_parent_id')
                ->from('express_template as et')
                ->where("et.store_id ='{$store_id}' ")
                ->join('express_template_attr_fee as etf','etf.ept_id=et.ept_id')
                ->join('express_template_attr_fee_area as etfa','etfa.eptaf_id=etf.eptaf_id')
                ->join('area as a','a.area_id=etfa.region_area_id')
                ->get()->result_array();
            $data_arr = array();
            $data = array();
            foreach ($user_express as $k=>$v){
                $data_arr[$v['ept_id']][$v['eptaf_id']]['ept_id'] = $v['ept_id'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['ept_name'] = $v['ept_name'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['express_code'] = $v['express_code'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['express_name'] = $v['express_name'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['add_time'] = $v['add_time'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['add_user'] = $v['add_user'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['add_type'] = $v['add_type'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['add_user_id'] = $v['add_user_id'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['sort'] = $v['sort'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['type'] = $v['type'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['eptaf_id'] = $v['eptaf_id'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['first_nums'] = $v['first_nums'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['first_fee'] = $v['first_fee'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['loan_nums'] = $v['loan_nums'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['loan_fee'] = $v['loan_fee'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['free_fee_num'] = $v['free_fee_num'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['region']['area_id'][] = $v['region_area_id'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['region']['area_name'][] = $v['area_name'];
                $data_arr[$v['ept_id']][$v['eptaf_id']]['region']['p_area_id'][] = $v['area_parent_id'];
            }
            foreach ($data_arr as $k=>$v){
                foreach ($v as $ka=>$va){
                    $region_id = $va['region']['area_id'];
                    $region_name = $va['region']['area_name'];
                    $region_pid = $va['region']['p_area_id'];
                    if($region_id){
                        $area_name = array();
                        $area_id = $region_id;
                        foreach ($region_pid as $kn=>$vn){
                            if(!in_array($vn, $region_id)){
                                $area_name[] = $region_name[$kn];
                            }
                        }

                        $data_arr[$k][$ka]['area_name'] = trim(join(',',$area_name),',');
                        $data_arr[$k][$ka]['area_id'] = trim(join(',',$area_id),',');
                        unset($area_name);
                        unset($area_id);
                    }else{
                        $data_arr[$k][$ka]['area_name'] = '';
                        $data_arr[$k][$ka]['area_id'] = '';
                    }
                    unset($data_arr[$k][$ka]['region']);
                }

            }
            $k = 0;
            foreach ($data_arr as $key=>$v){
                $kaa = 0 ;
                $count = count($v);
                foreach ($v as $ka=>$va){
                    $data[$k]['ept_id'] = $va['ept_id'];
                    $data[$k]['ept_name'] = $va['ept_name'];
                    $data[$k]['express_code'] = $va['express_code'];
                    $data[$k]['express_name'] = $va['express_name'];
                    $data[$k]['add_time'] = date('Y-m-d H:i:s',$va['add_time']);
                    $data[$k]['sort'] = $va['sort'];
                    $data[$k]['type'] = $va['type'];
                    $data[$k]['express_info'][$kaa]['eptaf_id'] = $va['eptaf_id'];
                    $data[$k]['express_info'][$kaa]['first_nums'] = $va['first_nums'];
                    $data[$k]['express_info'][$kaa]['first_fee'] = $va['first_fee'];
                    $data[$k]['express_info'][$kaa]['loan_nums'] = $va['loan_nums'];
                    $data[$k]['express_info'][$kaa]['loan_fee'] = $va['loan_fee'];
                    $data[$k]['express_info'][$kaa]['free_fee_num'] = $va['free_fee_num'];
                    $data[$k]['express_info'][$kaa]['area_name'] = $va['area_name'];
                    $data[$k]['express_info'][$kaa]['area_id'] = $va['area_id'];
                    if($kaa==0){
                        $data[$k]['express_info'][$kaa]['count'] = $count;
                    }else{
                        $data[$k]['express_info'][$kaa]['count'] = 0;
                    }
                    $kaa++;
                }
                $data[$k]['data'] = str_replace('"', "'", json_encode($data[$k]));
                $k++;
            }
            //print_r($data);exit;
            $total = count($data);
            $this_total = 0;
            $page_total = 1;
            $this_page = 1;
            if($total>0){
                $page_total = ceil($total/$rp);
                if($page>$page_total){
                    $data = array_slice($data,($page-2)*$rp,$rp);
                    $this_page = ($page-2)*$rp+1;
                    $this_total = count($data)+($page-2)*$rp;
                    $page = $page_total;
                }else{
                    $data = array_slice($data,($page-1)*$rp,$rp);
                    $this_page = ($page-1)*$rp+1;
                    $this_total = count($data)+($page-1)*$rp;
                    $page_total = ceil($total/$rp);
                }
            }
            if($op=='change'){
                if($total>0){
                    echo json_encode(array('state'=>true,'data'=>$data,'total'=>$total,'page'=>$page,'rp'=>$rp,
                        'this_total'=>$this_total,'page_total'=>$page_total,'this_page'=>$this_page));exit;
                }else{
                    echo json_encode(array('state'=>false,'total'=>$total,'page'=>$page,'rp'=>$rp,
                        'this_total'=>$this_total,'page_total'=>$page_total,'this_page'=>$this_page
                    ));exit;
                }

            }
            $express = $this->db->select('e_name,e_code')->where('e_state', 1)->get('express')->result_array();

            $this->smarty->assign('express',$express);
            $this->smarty->assign('data',$data);
            $this->smarty->assign('rp',$rp);
            $this->smarty->assign('page',$page);
            $this->smarty->assign('total',$total);
            $this->smarty->assign('this_total',$this_total);
            $this->smarty->assign('this_page',$this_page);
            $this->smarty->assign('page_total',$page_total);
            $this->smarty->display ( 'public_store_of_freight_setting.html' );
        }



    }

    //商城设置——物流工具——配送区域——删除
    public function mall_express_tools_del(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $id = isset($_POST['id']) ? trim($_POST['id']) : false;
        $result = array('state'=>false,'msg'=>'删除出错');
        if($id){
            $ept_name = $this->db->select('ept_name')->where('ept_id',$id)->get('express_template')->row('ept_name');
            $epa_id = $this->db->select('eptaf_id')->where('ept_id',$id)->get('express_template_attr_fee')->result_array();
            $title = $ept_name;
            $epa_id_arr = array();
            foreach ($epa_id as $k=>$v){
                if($v['eptaf_id']){
                    $epa_id_arr[] = $v['eptaf_id'];
                }
            }
            $re = true;
            if(!empty($epa_id_arr)){
                $epa_id_arr = join(',',$epa_id_arr);
                $re = $this->db->where("eptaf_id IN ($epa_id_arr)")->delete('express_template_attr_fee_area');
            }
            if($re){
                $re = $this->db->where('ept_id',$id)->delete('express_template_attr_fee');

                if($re){
                    $re = $this->db->where('ept_id',$id)->delete('express_template');
                    if($re){
                        $this->common_function->shop_admin_log('模板'.$title, 'del', '配送模板');
                        $result = array('state'=>true,'msg'=>'删除成功');
                        echo json_encode($result);exit;
                    }
                }
            }
        }
        echo json_encode($result);exit;
        //print_r($_POST);exit;
    }

    //商城设置——物流工具——配送区域——新增
    public function mall_express_area_add (){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role',$role);
        $store_id = isset($_GET['store_id'])?trim($_GET['store_id']):false;
        $this->smarty->assign('store_id',$store_id);
        $data_info = isset($_POST['data']) ? trim($_POST['data']): '';
        if($data_info){
            $data_info = str_replace("'", '"', $data_info);
            $data_info = json_decode($data_info);
            $data_info =object_array($data_info);
        }
        //print_r($data_info);exit;
        $area_region = $this->db->select('area_id,area_name,area_region_name')->where('area_parent_id',0)->order_by('area_id','ASC')->get('area')->result_array();
        $data = array();
        foreach ($area_region as $k=>$v){
            if(!empty($v['area_region_name'])){
                $data[$v['area_region_name']][]=$v;
            }
        }
        $data_area = array();
        $j=0;
        foreach ($data as $k=>$v){
            $data_area[$j]['region'] = $k;
            $data_area[$j]['son_area'] = $v;
            foreach ($v as $ka=>$va){
                if(!empty($va['area_id'])){
                    $data_area[$j]['son_area'][$ka]['son_area'] = $this->db->select('area_id,area_name')->where('area_parent_id',$va['area_id'])->get('area')->result_array();
                    $data_area[$j]['son_area'][$ka]['area_name'] = $va['area_name'];
                    $data_area[$j]['son_area'][$ka]['area_id'] = $va['area_id'];
                }
            }
            $j++;
        }
        //所有已开启的快递
        $express = $this->db->select('e_name,e_code')->where('e_state', 1)->get('express')->result_array();
        //已存在的快递
        $express2 = $this->db->select('express_name e_name,express_code e_code')->where('store_id',$store_id)->get('express_template')->result_array();
        //还没有添加运费的快递
        $arr  = array ();
        $arr2 = array ();
        foreach ($express as $e) {
            $arr[$e['e_code']] = $e['e_name'];
        }
        foreach ($express2 as $e) {
            $arr2[$e['e_code']] = $e['e_name'];
        }
        $arr = array_diff ($arr, $arr2);
        foreach ($arr as $key => $value) {
            $expres[] = Array('e_code'=>$key,'e_name'=>$value);
        }
        if (!empty($expres)) {
            $this->smarty->assign('express',$expres);
        }

        $this->smarty->assign('data_info',$data_info);
        //$this->smarty->assign('data_fee',$_POST['data']);

        //print_r($express);exit;
        $this->smarty->assign('data',$data_area);
        $this->smarty->display ( 'mall_express_area_add.html' );
    }


    public function check_express_name(){
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $transport_id = isset($_POST['transport_id']) ? trim($_POST['transport_id']) : '';
        if($name){
            $name = $this->db->select('ept_name')->where('ept_name',$name)->get('express_template')->row('ept_name');
            if($name){
                if($transport_id){
                    if($transport_id==$name){
                        echo json_encode(array('state'=>true));exit;
                    }else{
                        echo json_encode(array('state'=>false));exit;
                    }
                }else{
                    echo json_encode(array('state'=>false));exit;
                }
            }else{
                echo json_encode(array('state'=>true));exit;
            }
        }
        //print_r($_POST);exit;
    }

    //商城设置——物流工具——配送区域——新增提交
    public function mall_express_area_submit (){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $title = isset($_POST['title']) ? trim($_POST['title']) : '';
        $express_code = isset($_POST['express_code']) ? trim($_POST['express_code']) : false;
        $transport_id = isset($_POST['transport_id']) ? trim($_POST['transport_id']) : false;
        $ept_id = isset($_POST['ept_id']) ? trim($_POST['ept_id']) : false;
        $goods_fee_type = isset($_POST['goods_fee_type']) ? trim($_POST['goods_fee_type']) : 1;
        $state = isset($_POST['rad']) ? $_POST['rad'] : 1;
        $sort = isset($_POST['num']) ? $_POST['num'] : '127';
        $goods_trans_type = isset($_POST['goods_trans_type']) ? trim($_POST['goods_trans_type']) : 1;
        $area = isset($_POST['area']) ? $_POST['area'] : '';
        $area_name = isset($_POST['area_name']) ? $_POST['area_name'] : '';
        $first_w = isset($_POST['first_w']) ? $_POST['first_w'] : '';
        $first_f = isset($_POST['first_f']) ? $_POST['first_f'] : '';
        $last_w = isset($_POST['last_w']) ? $_POST['last_w'] : '';
        $last_f = isset($_POST['last_f']) ? $_POST['last_f'] : '';
        $no_fee = isset($_POST['no_fee']) ? $_POST['no_fee'] : '';
        $store_id = isset($_POST['store_id']) ? $_POST['store_id'] : 0;
        $result = array('state'=>false,'msg'=>'');
        $data = array();
        $flag = true;
        if(!$express_code){
            $result['msg'] = '快递不能为空!';
            echo json_encode($result);exit;
        }
        if(empty($title)){
            $flag = false;
            $result['msg'] .= '模板名称不能为空!';
        }
        if(empty($area)){
            $flag = false;
            $result['msg'] .= '指定区域城市不能为空!';
        }
        if(empty($first_w)||empty($first_f)||empty($last_w)||empty($last_f)){
            $flag = false;
            $result['msg'] .= '指定区域费用信息不能为空!';
        }
        if(!$flag){
            echo json_encode($result);exit;
        }
        foreach ($area as $k=>$v){
            $data[$k]['area_id'] = trim($area[$k],',');
            $data[$k]['first_w'] = trim($first_w[$k]);
            $data[$k]['first_f'] = round(trim($first_f[$k]),2);
            $data[$k]['last_w'] = trim($last_w[$k]);
            $data[$k]['last_f'] = round(trim($last_f[$k]),2);
            $data[$k]['no_f'] = trim($no_fee[$k]);
        }
        $express_name = $this->db->select('e_name')->where('e_code',$express_code)->get('express')->row('e_name');
        if(empty($transport_id)){
            $this->db->trans_start(); //开启事物
            $tpl_ex_data = array(
                'ept_name'=>$title,'express_name'=>$express_name,
                'express_code'=>$express_code,
                'add_time'=>time(),'add_user'=>$_SESSION['shop_admin_id'],'add_type'=>1,
                'add_user_id'=>$_SESSION['shop_admin_id'], 'sort'=>$sort, 'type'=>$goods_trans_type,
                'store_id' => $store_id
            );
            $this->db->insert('express_template',$tpl_ex_data);
            $ept_fee_id = $this->db->insert_id();
            //print_r($data);exit;
            foreach ($data as $k=>$v){
                $ept_fee_data = array(
                    'ept_id'=>$ept_fee_id,'first_nums'=>$v['first_w'],'first_fee'=>$v['first_f'],
                    'loan_nums'=>$v['last_w'],'loan_fee'=>$v['last_f'],'free_fee_num'=>$v['no_f'],
                );
                $this->db->insert('express_template_attr_fee',$ept_fee_data);
                $ept_fee_area_id = $this->db->insert_id();
                $region = explode(',',$v['area_id']);
                if(!empty($region)){
                    foreach ($region as $ka=>$va){
                        if(!empty($va)&&is_numeric($va)){
                            $recc = $this->db->insert('express_template_attr_fee_area',array('eptaf_id'=>$ept_fee_area_id,'region_area_id'=>$va));
                            if(!$recc){
                                $rec = false;
                            }
                        }
                    }
                }
            }
            $this->db->trans_complete(); //事物完成
            $this->db->trans_off(); //禁用事物
            $flag = true;
            if ($this->db->trans_status() === FALSE) {
                $flag = false;
            }
            if($flag){
                $this->common_function->shop_admin_log('配送模板'.$title,  'add','配送模板');
                $result = array('state'=>true,'msg'=>'数据添加成功');
                echo json_encode($result);exit;
            }else{
                $result['msg'] = '数据添加失败';
                echo json_encode($result);exit;
            }
        }else{
            $title_name = $transport_id;
            //print_r($data_info);print_r($_POST);exit;
            $re = true;
            $this->db->trans_start(); //开启事物
            $tpl_ex_data = array(
                'ept_name'=>$title,'express_name'=>$express_name,
                'express_code'=>$express_code,
                'add_time'=>time(),'add_user'=>$_SESSION['shop_admin_id'],'add_type'=>1,
                'add_user_id'=>$_SESSION['shop_admin_id'], 'sort'=>$sort, 'type'=>$goods_trans_type,
            );
            $this->db->update('express_template',$tpl_ex_data,array('ept_id'=>$ept_id));
            $epf_arr = $this->db->select('eptaf_id')->where('ept_id',$ept_id)->get('express_template_attr_fee')->result_array();
            $epf_id = array();
            foreach ($epf_arr as $v){
                $epf_id[] = $v['eptaf_id'];
                $this->db->where('eptaf_id',$v['eptaf_id'])->delete('express_template_attr_fee_area');
            }
            $this->db->where('ept_id',$ept_id)->delete('express_template_attr_fee');
            foreach ($data as $k=>$v){
                $ept_fee_data = array(
                    'ept_id'=>$ept_id,'first_nums'=>$v['first_w'],'first_fee'=>$v['first_f'],
                    'loan_nums'=>$v['last_w'],'loan_fee'=>$v['last_f'],'free_fee_num'=>$v['no_f'],
                );
                $this->db->insert('express_template_attr_fee',$ept_fee_data);
                $ept_fee_area_id = $this->db->insert_id();
                $region = explode(',',$v['area_id']);
                if(!empty($region)){
                    foreach ($region as $ka=>$va){
                        if(!empty($va)&&is_numeric($va)){
                            $recc = $this->db->insert('express_template_attr_fee_area',array('eptaf_id'=>$ept_fee_area_id,'region_area_id'=>$va));
                            if(!$recc){
                                $rec = false;
                            }
                        }
                    }
                }
            }
            $this->db->trans_complete(); //事物完成
            $this->db->trans_off(); //禁用事物
            $flag = true;
            if ($this->db->trans_status() === FALSE) {
                $flag = false;
            }
            if($flag){
                $this->common_function->shop_admin_log('模板'.$title_name,  'edit','配送模板');
                $result = array('state'=>true,'msg'=>'数据修改成功');
                echo json_encode($result);exit;
            }else{
                $result['msg'] = '数据修改失败';
                echo json_encode($result);exit;
            }
        }
        //print_r($_POST);exit;
    }






    /*店铺其他设置*/
    public function store_of_other(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role',$role);
        $store_id = isset($_GET['id'])?trim($_GET['id']):false;
        $op = isset($_GET['op'])?trim($_GET['op']):false;
        if($op&&$op=='edit'&&$store_id){
            $store_data = array();
            $store_data = $this->db->select('store_id,store_name,warn_pick_up,follow_user_percentage,order_take_percentage,delivery_date,not_delivery_time,delivery_time')->where('store_id',$store_id)->get('store')->row_array();
            $store_data['order_take_percentage'] = unserialize($store_data['order_take_percentage']);
            //            print_r($store_data);die;
            $this->smarty->assign('store_data',$store_data);
            $this->smarty->display ('public_store_of_other.html');
        }
    }


    public function store_other_set(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
        $store_name = isset($_POST['store_name'])?trim($_POST['store_name']):'';
        $inner['order_take_percentage'] = isset($_POST['order_take_percentage'])?$_POST['order_take_percentage']:'';
        $inner['follow_user_percentage'] = isset($_POST['follow_user_percentage'])?trim($_POST['follow_user_percentage']):'';
        $inner['warn_pick_up']          = isset($_POST['store_arayacak'])?trim($_POST['store_arayacak']):1;
        $inner['delivery_time']         = isset($_POST['delivery_time']) ? $_POST['delivery_time'] : '';
        $inner['delivery_date']         = isset($_POST['delivery_date']) ? implode (',',$_POST['delivery_date']) : '';
        $inner['not_delivery_time']     = isset($_POST['not_delivery_time']) ? $_POST['not_delivery_time'] : '';

        //$inner['store_bespoke'] = isset($_POST['store_bespoke'])?trim($_POST['store_bespoke']):1;
        $inner['order_take_percentage'] = serialize($inner['order_take_percentage']);
        //print_r($inner);die;
        if($store_id){
            $this->db->update('store',$inner,array('store_id'=>$store_id));
            $links = array(
                0 => array(
                    'text' => '店铺列表',
                    'href' => 'store_management?role='.$role
                ),
            );
            $this->common_function->shop_admin_log('门店‘'.$store_name.'’其他设置', 'edit', '门店设置');
            $this->common_function->show_message('设置成功',0 ,$links);
        }else{
            $this->common_function->show_message('操作错误');
        }
    }





    //******************************************
    /*导购管理*/
    public function store_shopping_guide(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role',$role);

        $roles = $this->db->select('role_id,role_name')->get('platform_roles')->result_array();
        $roles_str = '';
        if($roles){
            foreach ($roles as $k=>$v){
                $roles_str .= "<option value=".$v['role_id']." >".$v['role_name']."</option>";
            }
        }
        $this->smarty->assign('roles_str',$roles_str);
        $this->smarty->display ('public_plat_store_guide.html');
    }





    /*导购评价*/
    public function store_shopping_guide_content(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
        }
        $this->smarty->assign('role',$role);
        $this->smarty->display ('store_shopping_guide_content.html');
    }

    /*导购评价*/
    public function get_shopping_guide_content(){
        $role = isset($_GET['role']) && !empty($_GET['role'])? $_GET['role']:'';//权限
        if($role=='w'){//微商城
            $this->common_function->shop_admin_priv("store_management");
            $str  =  $this->stores_model->get_store_by_role(1);
            if($str){
                $where = " st.store_id in (".$str.")  ";
            }else{
                $where = " st.store_id ='w'  ";
            }
        }elseif ($role=='d'){//电商店
            $this->common_function->shop_admin_priv("store_management");
            $str  =  $this->stores_model->get_store_by_role(2);
            if($str){
                $where = " st.store_id in (".$str.")  ";
            }else{
                $where = " st.store_id ='d'  ";
            }
        }elseif ($role=='g'){//供应仓库
            $this->common_function->shop_admin_priv("store_management");
            $str  =  $this->stores_model->get_store_by_role(3);
            if($str){
                $where = " st.store_id in ({$str})  ";
            }else{
                $where = " st.store_id ='g'  ";
            }
            
        }else{//平台
            $this->common_function->shop_admin_priv("store_management");
            $where = " 1 = '1'  ";
        }
        $this->smarty->assign('role',$role);
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }


        $total = $this->db->select('count(1) as num')->from('shop_order_shoppingguide_evaluation as sp')
            ->join('shop_order as so','so.order_sn=sp.order_sn','left')
            ->join('store_shopping_guide as sg','sg.spg_id=sp.spg_id')
            ->join('store as st','st.store_id=sg.spg_store_id')
            ->join('user as u','so.buyer_id=u.user_id')
            ->where($where)->get()->row('num');
        $order_by='';
        if ($sortname && $sortorder){
            $order_by = "{$sortname} {$sortorder}";
        }else{
            $order_by ="sp.evaluation_time DESC";
        }
        $start = $rp * ($page - 1);
        //$where .= " limit $start, $rp";
        //print_r($where);die;
        $this->db->select('u.user_name,u.true_name,u.tel,sg.spg_nike_name,sg.spg_name,st.store_name,sp.order_sn,sp.evaluation_label,sp.evaluation_time')->from('shop_order_shoppingguide_evaluation as sp')
            ->join('shop_order as so','so.order_sn=sp.order_sn','left')
            ->join('store_shopping_guide as sg','sg.spg_id=sp.spg_id')
            ->join('store as st','st.store_id=sg.spg_store_id')
            ->join('user as u','so.buyer_id=u.user_id')
            ->where($where);
            if($order_by){
                $this->db->order_by($order_by);
            }
            $rows = $this->db->limit($start,$rp)->get()->result_array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows as $row){
            $row['evaluation_time'] = !empty($row['evaluation_time']) ? date('Y-m-d H:i:s',$row['evaluation_time']) : '';

            $xml .= "<row id='".$row['order_sn']."'>";
            $xml .= "<cell><![CDATA[".$row['evaluation_time']."]]></cell>";
            $xml .= "<cell><![CDATA[".(empty($row['user_name'])?'无':$row['user_name'])."/".(empty($row['true_name'])?'无':$row['true_name'])."/".(empty($row['tel'])?'无':$row['tel'])."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['spg_nike_name']."/".$row['spg_name']."/".$row['store_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['order_sn']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['evaluation_label']."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }


















}














?>