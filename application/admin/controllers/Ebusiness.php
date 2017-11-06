<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: yhx
 * Date: 2017/7/19
 * Time: 16:02
 */
class Ebusiness extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model ('goods_model');
        $this->load->model ('stores_model');
        $this->load->model('business_model');
        $this->load->library('shop');
    }


    /*门店管理*/
    public function store_management(){
        $this->common_function->shop_admin_priv("store_management");//权限
        if(isset($_GET['op'])&&$_GET['op']=='stop')
        {
            $this->smarty->assign('op',$_GET['op']);
        }
        $area = $this->common_function->get_area_info();
        $this->smarty->assign('area',$area);
        $this->smarty->display ('ebusiness_store_management.html');
    }

    /*获取门店列表*/
    public function get_store_list(){
        $this->common_function->shop_admin_priv("store_management");//权限
        $op = isset($_GET['op'])?trim($_GET['op']):'';
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $store_name = isset($_GET['store_name'])?trim($_GET['store_name']):'';
        $store_province = isset($_GET['store_province'])?trim($_GET['store_province']):'';
        $store_city = isset($_GET['store_city'])?trim($_GET['store_city']):'';
        $store_area = isset($_GET['store_area'])?trim($_GET['store_area']):'';
        $where = 'ous_type=2';
        if(!empty($op)&&$op=='stop'){
            $where .=" and store_state!=1 ";
        }else{
            $where .=" and store_state=1 ";
        }
        if(!empty($store_name)){
            $where .=" and store_name like '%{$store_name}%' ";
        }

        if(!empty($store_area)){
            $where .=" and area_id = $store_area ";
        }elseif(!empty($store_city)){
            $where .=" and city_id = $store_city ";
        }elseif(!empty($store_province)){
            $where .=" and province_id = $store_province ";
        }

        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }
        $total = $this->common_function->total('store', $where);
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('store', $where);
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows as $row){
            $xml .= "<row id='".$row['store_id']."'>";
            $store_state = ($row['store_state']==1)?'暂停营业':'开启营业';
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['store_id'] .",".json_encode($row['store_name']) .")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                         <ul>
    		                <li><a onclick=fg_edit(" .$row['store_id'] . ")>编辑店铺</a></li>
    		                <li><a onclick='update_ad_managements(" . $row['store_id'] .",".json_encode($row['store_name']) .")'>".$store_state."</a></li> 
    	                    <li><a href='store_of_goods?op=edit&id={$row['store_id']}'>商品管理</a></li>
                            <li><a href='store_of_shopping_guide?op=edit&id={$row['store_id']}'>导购管理</a></li>";
            $xml .= "</ul></span>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['ous_out_sn']."]]></cell>";
            $xml .= "<cell><![CDATA[<span title='{$row['store_name']}'>".$row['store_name']."</span>]]></cell>";
            $spg_num = $this->db->select('count(1) as num')->where('spg_store_id',$row['store_id'])->get('store_shopping_guide')->row('num');
            $xml .= "<cell><![CDATA[".$spg_num."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['ous_tel']."]]></cell>";
            if(!empty($row['province_id'])){
                $address=$this->common_function->get_one('area','area_id='.$row['province_id'],'area_name');
            }
            if(!empty($row['city_id'])){
                $address.=$this->common_function->get_one('area','area_id='.$row['city_id'],'area_name');
            }
            if(!empty($row['area_id'])){
                $address.=$this->common_function->get_one('area','area_id='.$row['area_id'],'area_name');
            }
            $address.=$row['ous_address'];
            $xml .= "<cell><![CDATA[".$address."]]></cell>";
            $xml .= "<cell><![CDATA[".($row['ous_type']==1?'实体门店':($row['ous_type']==2?'电商门店':'供应门店'))."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }
    /*店铺检查名字*/
    public function check_storeName(){
        $this->common_function->shop_admin_priv("store_management");//权限
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
    /*店铺检查编码*/
    public function check_storeCode(){
        $this->common_function->shop_admin_priv("store_management");//权限
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

    /*店铺编辑*/
    public function store_edit(){
        $this->common_function->shop_admin_priv("store_management");//权限
        if(isset($_GET['op'])&&$_GET['op']=='edit'){
            $id = isset($_GET['id'])?intval($_GET['id']):'';
            $store_data = $this->db->select('*')->where('store_id',$id)->get('store')->row_array();
            $auth_store=$this->db->select('auth_store_id,auth_store_name')->where('store_id',$id)->get('store_auth_store')->result_array();
            $this->smarty->assign('store_data',$store_data);
            $auth_stores=array();
            if(!empty($auth_store)){
                foreach ($auth_store as $v){
                    $auth_stores[]=$v['auth_store_id'];
                }
            }
            $this->smarty->assign('auth_stores',$auth_stores);
        }

        $stores = $this->db->select('store_id,store_name')->where('ous_type',3)->where('store_state',1)->get('store')->result_array();
        $this->smarty->assign('stores',$stores);
        $area_data = $this->shop->get_area_info();
        $this->smarty->assign('area_data',$area_data);
        $this->smarty->assign('area_datajs',json_encode($area_data));
        $this->smarty->display ('ebusiness_store_edit.html');
    }

    /*店铺添加，编辑*/
    public function store_add(){
        $this->common_function->shop_admin_priv("store_management");//权限
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
        $store['company_name'] = isset($_POST['company_name'])?trim($_POST['company_name']):'';
        $store['store_name'] = isset($_POST['class_name'])?trim($_POST['class_name']):'';
        $store['province_id'] = isset($_POST['class_province'])?trim($_POST['class_province']):'';
        $store['city_id'] = isset($_POST['class_city'])?trim($_POST['class_city']):'';
        $store['area_id'] = isset($_POST['class_area'])?trim($_POST['class_area']):'';
        $store['ous_address'] = isset($_POST['class_address'])?trim($_POST['class_address']):'';
        $store['ous_tel'] = isset($_POST['class_mobile'])?trim($_POST['class_mobile']):'';
        $store['ous_out_sn'] = isset($_POST['class_code'])?trim($_POST['class_code']):'';
        $store_auth = isset($_POST['store_auth'])?$_POST['store_auth']:'';
        //print_r($brand_auth);die;

        $time = time();
        $store['add_admin_id'] = $_SESSION['shop_admin_id'];
        $store['last_update_userId'] = $_SESSION['shop_admin_id'];
        $store['last_update_time'] = $time;
        $store['last_update_user_type'] = 1;
        $store['ous_longitude'] = isset($_POST['longitude'])?trim($_POST['longitude']):'';
        $store['ous_latitude'] = isset($_POST['latitude'])?trim($_POST['latitude']):'';
        if($store['store_name']){
            if(empty($store_id)){
                $store['store_state'] = isset($_POST['store_state'])?trim($_POST['store_state']):1;
                $store['add_time'] = $time;
                $store['ous_type'] = 2;
                $this->db->insert('store',$store);
                $storeId = $this->db->insert_id();
                $operate = '添加';
                $operation = 'add';
            }else{
                $this->db->where('store_id',$store_id)->update('store',$store);
                $storeId = $store_id;
                $operate = '修改';
                $operation = 'edit';
            }

            $del_store_auth = $this->db->select('group_concat(auth_store_id) as stores')->where('store_id',$storeId)->where_not_in('auth_store_id',$store_auth)->get('store_auth_store')->row('stores');
            if(!empty($del_store_auth)){
                $this->db->where("auth_store_id IN ($del_store_auth)")->where('store_id',$storeId)->delete('store_auth_store');
            }

            if(!empty($store_auth)){
                $insert_stores_auth = array();
                foreach ($store_auth as $k=>$v){
                    $checknum = $this->db->select('count(1) as num')->where('store_id',$storeId)->where('auth_store_id',$v)->get('store_auth_store')->row('num');
                    if($checknum==0){
                        $insert_stores_auth[$k]['auth_store_id']=$v;
                        $insert_stores_auth[$k]['store_id']=$storeId;
                        $auth_store_name=$this->db->select('store_name')->where('store_id',$v)->get('store')->row('store_name');
                        $insert_stores_auth[$k]['auth_store_name']=$auth_store_name;
                    }
                }
                if(!empty($insert_stores_auth)){
                    $this->db->insert_batch('store_auth_store', $insert_stores_auth);
                }
            }


            $links = array(
                0 => array(
                    'text' => '店铺列表',
                    'href' => 'store_management'
                ),
                1 => array(
                    'text' => '返回',
                    'href' => 'javascript:history.go(-1)'
                ),

            );
            $this->common_function->shop_admin_log($store['store_name'], $operation, '店铺管理');
            $this->common_function->show_message($operate.'成功',0 ,$links);

            }else{
                $this->common_function->show_message('店铺名称不能为空！');
            }

    }

    /*店铺营业状态修改*/
    public function update_ad_management(){
        $this->common_function->shop_admin_priv("store_management");//权限
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

    /*店铺删除*/
    public function store_del(){
        $this->common_function->shop_admin_priv("store_management");//权限
        $id = isset($_POST['id'])?trim($_POST['id']):'';
        if($id){
            $this->db->where("store_id IN ($id)")->delete('store');
            $result = array('state'=>true,'msg'=>'删除成功');
        }else{
            $result = array('state'=>false,'msg'=>'删除失败');
        }
        echo json_encode($result);exit;
    }

    /*店铺商品*/
    public function store_of_goods(){
        $this->common_function->shop_admin_priv("store_management");//权限
        //print_r($_GET);exit;
        $store_id = isset($_GET['id'])?trim($_GET['id']):false;
        $op = isset($_GET['op'])?trim($_GET['op']):false;
        if($op&&$op=='edit'&&$store_id){
            $store_data = array();
            $store_data = $this->db->select('store_id,store_name')->where('store_id',$store_id)->get('store')->row_array();
            /*$brands = $this->db->select('s.brand_id,s.brand_name')->from('store_attr_brands as sb')
                ->join('shop_brand as s','s.brand_id=sb.brand_id')->where('sb.store_id',$store_id)
                ->get()->result_array();
            $this->smarty->assign('brands',$brands);*/
            $this->smarty->assign('store_data',$store_data);
            $this->smarty->display ('ebusiness_store_of_goods.html');
        }
    }

    /*店铺商品列表*/
    public function get_storeGoods_list(){
        $this->common_function->shop_admin_priv("store_management");//权限
        //print_r($_GET);print_r($_POST);exit;
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
        $stock_sn = isset($_GET['stock_sn'])?trim($_GET['stock_sn']):'';
        $stock_name = isset($_GET['stock_name'])?trim($_GET['stock_name']):'';
        $amount = isset($_GET['amount'])?trim($_GET['amount']):'';
        $where = ' g.goods_state!=0 ';
        if($date_from){
            $date_from = strtotime($date_from);
            $where .=" and g.goods_addtime>='{$date_from}' ";
        }
        if($date_to){
            $date_to = strtotime($date_to);
            $where .=" and g.goods_addtime<='{$date_to}' ";
        }
        if($brand_code){
            $brand_id = join(',',$brand_code);
            $where .=" and g.brand_id IN ($brand_id) ";
        }
        if($stock_sn){
            $where .=" and g.stocks_sku like '%{$stock_sn}%' ";
        }
        if($stock_name){
            $where .=" and g.goods_name like '%{$stock_name}%' ";
        }
        if($amount!=''){
            if($amount==0){
                $where .=" and (g.stock_amount is null or g.stock_amount='' or g.stock_amount<=0 )";
            }elseif($amount==1){
                $where .=" and g.stock_amount>0";
            }
        }
        $auth_store=$this->db->select('auth_store_id,auth_store_name')->where('store_id',$store_id)->get('store_auth_store')->result_array();
        $auth_stores=array();
        if(!empty($auth_store)){
            foreach ($auth_store as $v){
                $auth_stores[]=$v['auth_store_id'];
            }
            $brand_code_arr = $this->db->select('s.brand_id,s.brand_name')->from('store_attr_brands as sb')
                ->join('shop_brand as s','s.brand_id=sb.brand_id')->where_in('sb.store_id',$auth_stores)
                ->group_by('s.brand_id')
                ->get()->result_array();
            $brands = array();
            foreach ($brand_code_arr as $v){
                $brands[] = $v['brand_id'];
            }
            $brands = join(',',$brands);
            if(empty($brands)){
                $where .= " and 1=2 ";
            }else{
                $where .=" and g.brand_id IN ($brands) ";
            }
        }

        if(empty($auth_stores)){
            $auth_stores[]=$store_id;
        }

        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }

        $total = $this->db->select('g.goods_id')
            ->from('v_store_stock g')
            ->where_in('g.ssa_store_id',$auth_stores)
            ->where($where)->group_by('g.goods_id')->get()->result_array();
        $total = count($total);
        //print_r($this->db->last_query());die;
        $start = $rp * ($page - 1);
        $rows = $this->db->select('g.goods_id,g.goods_spu,g.goods_name,g.gc_id,g.gc_name,g.brand_id,g.brand_name,g.goods_price,
            g.goods_marketprice,g.goods_image,g.goods_addtime,sum(g.stock_amount) as stock_amount')
            ->from('v_store_stock g')
            ->where_in('g.ssa_store_id',$auth_stores)
            ->where($where)->group_by('g.goods_id')
            ->order_by('g.goods_addtime','DESC')->limit($rp,$start)->get()->result_array();
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
            $head_portrait = base_url($row['goods_image']);
            if(!empty($row['goods_image'])&&file_exists(ROOTPATH.'data/shop/album_pic/'.$row['goods_image'])){
                $head_portrait =GOODIMAGE.$row['goods_image'];
            }else{
                $head_portrait = $default_pic;
            }
            $xml .= "<cell><![CDATA[<img src=\"".$head_portrait.'" style="float:left;position:relative;top:-45%;" class="goods-avatar"'.
                ' data-geo="<img src=\''.$head_portrait.'\' width=300px >">'.
                '<span title="'.$row['goods_name'].'" style="line-height: 20px;position:relative;top:-45%;float:left;max-width:120px;overflow:hidden;">'.
                $row['goods_name']."<br>款号:".$row['goods_spu']."</span>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['goods_price']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['goods_marketprice']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['stock_amount']."]]></cell>";
            $up_time = empty($row['goods_addtime'])?'--':date('Y-m-d H:i:s',$row['goods_addtime']);
            $xml .= "<cell><![CDATA[".$up_time."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }

    /*会员管理*/
    public function member(){
        $this->common_function->shop_admin_priv("user_base");//权限

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

        /*$this->db->select('store_id,store_name');
        $this->db->from('store');
        $stores = $this->db->get()->result_array();
        $this->smarty->assign('stores',$stores);*/
        $this->smarty->display ( 'ebusiness_member.html' );
    }

    /*会员列表*/
    public function user_list(){
        $this->common_function->shop_admin_priv("user_base");//权限
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

        $true_name = isset($_GET['true_name'])?trim($_GET['true_name']):'';
        $mobile = isset($_GET['mobile'])?trim($_GET['mobile']):'';
        $store=$this->db->select('store_id')->where('ous_type',2)->get('store')->result_array();
        foreach ($store as $v){
            $stores[]=$v['store_id'];
        }
        $store_str= join(',', $stores);
        $where = "ecstore_id IN ({$store_str})";
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

        if($true_name){
            $where .= " and true_name like '%{$true_name}%' ";
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
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
            $wheres  = " buyer_id ='{$row['user_id']}' and (order_status = '20' or order_status = '30' or order_status = '40') order by order_sn asc";
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
            $xml .= "<row id='".$row['user_id']."'>";
            $xml .= "<cell><![CDATA[
            <a class='btn green' href='member_edit/{$row['user_id']}'>查看详情</a>
            ]]></cell>";
            $row['head_portrait'] = $row['head_portrait']?$row['head_portrait']:base_url().'application/admin/views/images/default_user_portrait.gif';
            $xml .= "<cell><![CDATA[<img src=\"".$row['head_portrait'].'" class="user-avatar"'.
                ' onerror="this.src=\''.TEMPLE.'images/default_user_portrait.gif\'" style="border-radius:50%;height:80%;"'.
                ' data-geo="<img src=\''.$row['head_portrait'].'\' width=300px >">'.
                $row['user_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['tel']."]]></cell>";
            $sex = $row['member_sex']==0?'保密':($row['member_sex']==1?'男':'女');
            $xml .= "<cell><![CDATA[".$sex."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['order_num']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['order_money_num']."]]></cell>";
            $row['reg_time'] = !empty($row['reg_time']) ? date('Y/m/d H:i:s',$row['reg_time']) : '--';
            $xml .= "<cell><![CDATA[".$row['reg_time']."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }

    /*会员管理的编辑*/
    public function member_edit($id = false){
        $this->common_function->shop_admin_priv("user_base");//权限
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


            $query=$this->db->select('mld_exp,mld_name,mld_id')->order_by('mld_exp DESC')->get('jk_user_mldefault')->result_array();
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
        $this->smarty->display ( 'ebusiness_member_edit.html' );
    }

    /*会员详情*/
    public function get_user_info(){
        $this->common_function->shop_admin_priv("user_base");//权限
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
            if($op =="guide"){
                $this->db->select('ubofw_id,wx_action,wx_action_time,wx_action_value,note');
                $this->db->from('user_bind_or_follow_wx');
                $this->db->where("user_id",$user_id);
                $this->db->where($where);
                $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml .= "<rows>";
                $xml .= "<page>$page</page>";
                $xml .= "<total>$total</total>";
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
                    $xml .= "<row id='".$row['ubofw_id']."'>";
                    $xml .= "<cell><![CDATA[".$row['wx_action_time']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['wx_action']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['note']."]]></cell>";
                    $xml .= "</row>";
                }
                $xml .= "</rows>";
                echo $xml;exit;

            }elseif($op =="order"){
                $this->db->select('created_time,buyer_id,order_status,shipping_type,store_id,pay_type,store_name,shipping_type,order_price,goods_num,logistics_company_name,order_sn,order_price,pay_time');
                $this->db->from('shop_order');
                $this->db->where("buyer_id",$user_id);
                $this->db->where($where);
                //$this->db->order_by('created_time', 'DESC');
                $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml .= "<rows>";
                $xml .= "<page>$page</page>";
                $xml .= "<total>$total</total>";
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
                    }elseif($row['pay_type']==4){
                        $row['pay_type'] = "支付宝";
                    }else{
                        $row['pay_type']='其他';
                    }

                    if($row['shipping_type']==1){
                        $row['shipping_type'] = "快递";
                    }else{
                        $row['shipping_type'] = "自提";
                    }

                    $xml .= "<row id='".$row['order_sn']."'>";
                    $xml .= "<cell><![CDATA[<a class='btn red' href=".base_url('admin.php/business/business_order_details?order_sn='.$row['order_sn']).">订单详情</a>]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['order_sn']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['store_name']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['order_status']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['pay_type']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['shipping_type']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['order_price']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['created_time']."]]></cell>";
                    $xml .= "</row>";
                }
                $xml .= "</rows>";
                echo $xml;exit;
            }elseif($op =="integral"){
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
                $xml .= "<rows>";
                $xml .= "<page>$page</page>";
                $xml .= "<total>$total</total>";
                foreach($rows AS $row){
                    $row['ation_time'] = !empty($row['ation_time']) ? date('Y-m-d H:i:s',$row['ation_time']) : '--';
                    $xml .= "<row id='".$row['uig_id']."'>";
                    $xml .= "<cell><![CDATA[".$row['ation_time']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['admin_name']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['action_type']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['integral_num']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['note']."]]></cell>";
                    $xml .= "</row>";
                }
                $xml .= "</rows>";
                echo $xml;exit;
            }elseif($op =="mld_exp"){

            }elseif($op =="spg_content"){
                $this->db->select('u.osgpe_id,u.order_sn,u.spg_id,u.evaluation_label,u.evaluation_time,t.order_sn,t.spg_id,t.spg_name,t.store_name,t.buyer_id');
                $this->db->from('shop_order_shoppingguide_evaluation as  u');
                $this->db->join('shop_order as t','t.order_sn=u.order_sn and u.spg_id = t.spg_id','left');
                $this->db->where("t.buyer_id",$user_id);
                $this->db->where($where);
                $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml .= "<rows>";
                $xml .= "<page>$page</page>";
                $xml .= "<total>$total</total>";
                foreach($rows AS $row){
                    $row['evaluation_time'] = !empty($row['evaluation_time']) ? date('Y-m-d H:i:s',$row['evaluation_time']) : '--';
                    $xml .= "<row id='".$row['osgpe_id']."'>";
                    $xml .= "<cell><![CDATA[".$row['evaluation_time']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['spg_name']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['store_name']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['order_sn']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['evaluation_label']."]]></cell>";
                    $xml .= "</row>";
                }
                $xml .= "</rows>";
                echo $xml;exit;
            }elseif($op =="order_content"){
                $this->db->select('rec_id,order_sn,goods_name,evaluation_state,evaluation_content,evaluation_time');
                $this->db->from('shop_order_goods');
                $this->db->where("user_id",$user_id);
                $this->db->where("evaluation_state",'1');
                $this->db->where($where);
                $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp);
                header("Content-type: text/xml");
                $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
                $xml .= "<rows>";
                $xml .= "<page>$page</page>";
                $xml .= "<total>$total</total>";
                foreach($rows AS $row){
                    $row['evaluation_time'] = !empty($row['evaluation_time']) ? date('Y-m-d H:i:s',$row['evaluation_time']) : '--';
                    $xml .= "<row id='".$row['rec_id']."'>";
                    $xml .= "<cell><![CDATA[".$row['evaluation_time']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['goods_name']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['order_sn']."]]></cell>";
                    $xml .= "<cell><![CDATA[".$row['evaluation_content']."]]></cell>";
                    $xml .= "</row>";
                }
                $xml .= "</rows>";
                echo $xml;exit;
            }

        }
    }



    //删除会员
    public function member_del(){
        $this->common_function->shop_admin_priv("user_base");//权限
        $ids = $_POST['id'];
        $ids = explode(',', $ids);
        if (is_array($ids)){
            foreach ($ids as $id){
                $img = $this->db->select('head_portrait')->where('user_id', $id)->get('user')->row('head_portrait');
                if ($this->db->delete('user',array('user_id'=>$id))){
                    @unlink(ROOTPATH.$img);
                }else{
                    echo json_encode('删除失败');
                    exit();
                }
            }
        }
        echo json_encode('删除成功');
        exit();
    }

    //导出会员
    public  function user_management_excel(){
        $this->load->library('phpExcel');
        //include(ROOT_PATH . 'libraries/phpExcel/PHPExcel.php');
        /* 没有传过来id数据 */
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
            ->setCellValue('E1','付款订单数')
            ->setCellValue('F1','付款订单金')
            ->setCellValue('G1','加入时间');;

        $i=2;
        foreach($rows as $k=>$v){
            $sex = $v['member_sex']==0?'保密':($v['member_sex']==1?'男':'女');
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i,$v['user_id'])
                ->setCellValue('B'.$i,$v['user_name'])
                ->setCellValue('C'.$i,$v['tel'])
                ->setCellValue('D'.$i,$sex)
                ->setCellValue('E'.$i,$v['order_num'])
                ->setCellValue('F'.$i,$v['order_money_num'])
                ->setCellValue('G'.$i,!empty($v['reg_time']) ? date('Y/m/d H:i:s',$v['reg_time']) : '--');
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('admin_log');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename=urlencode('会员列表').'_'.date('Y-m-dHis');

        /*
         *生成xlsx文件
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
         header('Cache-Control: max-age=0');
         $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
        */
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $aaa = $objWriter->save('php://output');
        exit;
    }

    /*店铺导购*/
    public function store_of_shopping_guide(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
        $store_id = isset($_GET['id'])?trim($_GET['id']):false;
        $op = isset($_GET['op'])?trim($_GET['op']):false;
        if($op&&$op=='edit'&&$store_id){
            $store_data = array();
            $store_data = $this->db->select('store_id,store_name')->where('store_id',$store_id)->get('store')->row_array();
            $this->smarty->assign('store_data',$store_data);
            $this->smarty->display ('ebusiness_store_guide.html');
        }

    }

    /*店铺导购列表*/
    public function get_store_guide_list(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
        $store_id = isset($_GET['store_id'])?trim($_GET['store_id']):false;
        if($store_id){
            $default_pic = TEMPLE.'img/default_goods_image_240.gif';
            $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
            $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
            $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
            $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
            $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
            $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
            $where = " s.store_id ='$store_id' ";
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
            $where .= " limit $start, $rp";
            $rows = $this->db->select('sp.*,s.store_name')->from('store_shopping_guide as sp')
                ->join('store as s','s.store_id=sp.spg_store_id','left')
                ->where($where)->get()->result_array();
            header("Content-type: text/xml");
            $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
            $xml .= "<rows>";
            $xml .= "<page>$page</page>";
            $xml .= "<total>$total</total>";
            foreach($rows as $row){
                $xml .= "<row id='".$row['spg_id']."'>";
                $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_edit(" . $row['spg_id'] . ")' <i class='fa fa-trash-o'></i>编辑</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                         <ul>
    		                <li><a onclick=fg_delete(" .$row['spg_id'] .",'".$row['spg_name']. "')>离职</a></li>
    		                <li><a onclick=update_store(". $row['spg_id'].",'".$row['spg_name'] ."')>门店更改</a></li>
    	                    <li><a onclick=create_shot_code(". $row['spg_id'] .")>下载二维码</a></li>";
                $xml .= "</ul></span>]]></cell>";
                $head_portrait = base_url($row['head_portrait']);
                if(!empty($row['head_portrait'])&&file_exists(ROOTPATH.$row['head_portrait'])){
                    $head_portrait = base_url($row['head_portrait']);
                }else{
                    $head_portrait = $default_pic;
                }
                $xml .= "<cell><![CDATA[<img src=\"".$head_portrait.'" class="user-avatar"'.
                    ' onerror="this.src=\''.$head_portrait.'\'" style="border-radius:50%;height:80%;"'.
                    ' data-geo="<img src=\''.$head_portrait.'\' width=300px >">'.
                    $row['spg_name']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['spg_tel']."]]></cell>";
                $role_type = ($row['role_type']==2)?'店长':(($row['role_type']==1)?'导购':'兼职导购');
                $xml .= "<cell><![CDATA[".$role_type."]]></cell>";
                $xml .= "</row>";
            }
            $xml .= "</rows>";
            echo $xml;
        }
    }

    /*店铺其他设置*/

    public function store_of_other(){
        $this->common_function->shop_admin_priv("store_management");//权限
        $store_id = isset($_GET['id'])?trim($_GET['id']):false;
        $op = isset($_GET['op'])?trim($_GET['op']):false;
        if($op&&$op=='edit'&&$store_id){
            $store_data = array();
            $store_data = $this->db->select('store_id,store_name,warn_pick_up,follow_user_percentage,order_take_percentage')->where('store_id',$store_id)->get('store')->row_array();
            $store_data['order_take_percentage'] = unserialize($store_data['order_take_percentage']);
            //print_r($store_data);die;
            $this->smarty->assign('store_data',$store_data);
            $this->smarty->display ('ebusiness_of_other.html');
        }
    }
    public function store_other_set(){
        $this->common_function->shop_admin_priv("store_management");//权限
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
        $store_name = isset($_POST['store_name'])?trim($_POST['store_name']):'';
        $inner['order_take_percentage'] = isset($_POST['order_take_percentage'])?$_POST['order_take_percentage']:'';
        $inner['follow_user_percentage'] = isset($_POST['follow_user_percentage'])?trim($_POST['follow_user_percentage']):'';
        $inner['warn_pick_up'] = isset($_POST['store_arayacak'])?trim($_POST['store_arayacak']):1;

        //$inner['store_bespoke'] = isset($_POST['store_bespoke'])?trim($_POST['store_bespoke']):1;
        $inner['order_take_percentage'] = serialize($inner['order_take_percentage']);
        //print_r($inner);die;
        if($store_id){
            $this->db->update('store',$inner,array('store_id'=>$store_id));
            $links = array(
                0 => array(
                    'text' => '返回',
                    'href' => 'javascript:history.go(-1)'
                ),
                1 => array(
                    'text' => '店铺列表',
                    'href' => 'store_management'
                ),

            );
            $this->common_function->shop_admin_log('门店‘'.$store_name.'’其他设置', 'edit', '门店设置');
            $this->common_function->show_message('设置成功',0 ,$links);
        }else{
            $this->common_function->show_message('操作错误');
        }
    }

    /*导购管理*/
    public function store_shopping_guide(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
        $this->smarty->display ('ebusiness_store_shopping_guide.html');
    }

    /*导购评价*/
    public function store_shopping_guide_content(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
        $this->smarty->display ('store_shopping_guide_content.html');
    }

    /*导购评价*/
    public function get_shopping_guide_content(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = " st.ous_type='2' ";
        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }


        $total = $this->db->select('count(1) as num')->from('shop_order_shoppingguide_evaluation as sp')
            ->join('shop_order as so','so.order_sn=sp.order_sn','left')
            ->join('store_shopping_guide as sg','sg.spg_id=sp.spg_id')
            ->join('store as st','st.store_id=sg.spg_store_id')
            ->join('user as u','so.buyer_id=u.user_id')
            ->where($where)->get()->row('num');
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }else{
            $where.="order by sp.evaluation_time DESC";
        }
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->db->select('u.user_name,u.true_name,u.tel,sg.spg_nike_name,sg.spg_name,st.store_name,sp.order_sn,sp.evaluation_label,sp.evaluation_time')->from('shop_order_shoppingguide_evaluation as sp')
            ->join('shop_order as so','so.order_sn=sp.order_sn','left')
            ->join('store_shopping_guide as sg','sg.spg_id=sp.spg_id')
            ->join('store as st','st.store_id=sg.spg_store_id')
            ->join('user as u','so.buyer_id=u.user_id')
            ->where($where)->get()->result_array();
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

    /*导购删除*/
    public function del_guide(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
        $id = isset($_POST['id'])?trim($_POST['id']):'';
        $result = array('state'=>false,'msg'=>'数据错误');
        if($id){
            $ids = explode(',',$id);
            $msg = '';
            $flag = true;$guide_name = array();
            foreach ($ids as $v){
                $check_downUser = $this->db->select('count(u.user_id) as num,s.spg_name')->from('store_shopping_guide as s')
                    ->join('user as u','u.ecshopping_guide_id=s.spg_id','left')
                    ->where('spg_id',$v)->get()->row_array();

                if($check_downUser['num']){
                    $msg .='导购’'.$check_downUser['spg_name'].'‘还有绑定用户;';
                    $flag = false;
                    continue;
                }else{
                    $guide_name[] = $check_downUser['spg_name'];
                    $this->db->where("spg_id",$v)->delete('store_shopping_guide');
                }

            }

            if($flag){
                $this->common_function->shop_admin_log('导购’'.join(',',$guide_name).'‘' ,'del', '门店导购');
                $result = array('state'=>true,'msg'=>'删除成功');
            }else{
                $result = array('state'=>false,'msg'=>$msg);
            }
        }
        echo json_encode($result);exit;
        //print_r($_POST);exit;
    }

    /*导购列表*/
    public function get_store_shopping_guide(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
        $default_pic = TEMPLE.'img/default_goods_image_240.gif';
        $op = isset($_GET['op'])?trim($_GET['op']):'';
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = "s.ous_type='2' ";
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
        $where .= " limit $start, $rp";
        $rows = $this->db->select('sp.*,s.store_name')->from('store_shopping_guide as sp')
            ->join('store as s','s.store_id=sp.spg_store_id','left')
            ->where($where)->get()->result_array();
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
    		                <li><a onclick=update_store(". $row['spg_id'].",'".$row['spg_name'] ."')>门店更改</a></li>
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
            $role_type = ($row['role_type']==2)?'店长':(($row['role_type']==1)?'导购':'兼职导购');
            $xml .= "<cell><![CDATA[".$role_type."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['store_name']."]]></cell>";
            $order=$this->db->select('count(order_sn) as total')->where('spg_id',$row['spg_id'])->where('store_id',$row['spg_store_id'])->where('order_status>=',20)->get('shop_order')->row('total');
            $xml .= "<cell><![CDATA[".$order."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }

    /*导购检查电话*/
    public function check_guideTel(){
        $this->common_function->shop_admin_priv("store_management");//权限
        //print_r($_POST);exit;
        $id = isset($_POST['id'])?trim($_POST['id']):'';
        $tel = isset($_POST['tel'])?trim($_POST['tel']):'';
        if($tel){
            $spg_id = $this->db->select('spg_id')->where('spg_tel',$tel)->get('store_shopping_guide')->row('spg_id');
            if($spg_id){
                if($id){
                    if($spg_id==$id){
                        echo 'true';
                    }else{
                        echo 'false';
                    }
                }else{
                    echo 'false';
                }
            }else{
                echo 'true';
            }
        }else{
            echo 'false';
        }
        //print_r($_POST);exit;
    }
    /*导购编辑*/
    public function store_shopping_guide_edit(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
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
        $store = $this->db->select('store_id,store_name')->where('store_state',1)->where('ous_type',2)->get('store')->result_array();
        $this->smarty->assign('store',$store);
        $this->smarty->display ('store_shopping_guide_edit.html');
    }

    /*导购编辑，添加*/
    public function store_guide_add(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
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
                if(empty($spg['password'])){
                    /* $pwd = $this->common_function->mt_rand_str(6);
                    $spg['password'] = encrypt_pwd($pwd);
                    $customer = '门店';
                    $content = array('store'=>"$customer",'pwd'=>"$pwd");
                    $data['phone'] = $spg['spg_tel'];
                    $data['content'] = json_encode($content);
                    $data['template_sms_id'] = 'SMS_62130010';
                    $resp = $this->common_function->AlidayuSms($data); */
                }
                //print_r($spg);die;
                //$store['store_state'] = isset($_POST['store_state'])?trim($_POST['store_state']):1;
                $this->db->insert('store_shopping_guide',$spg);
                $spgId = $this->db->insert_id();
                $operate = '添加';
                $operation = 'add';
            }else{
                $this->db->where('spg_id',$spg_id)->update('store_shopping_guide',$spg);
                $spgId = $spg_id;
                $operate = '修改';
                $operation = 'edit';
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
                    $this->common_function->show_message('店铺'.$operate.'成功。'.$result['msg']);
                }
            }
            if(isset($_POST['store_id'])){
                $links = array(
                    0 => array(
                        'text' => '导购列表',
                        'href' => 'store_of_shopping_guide?op=edit&id='.trim($_POST['store_id'])
                    ),
                    1 => array(
                        'text' => '返回',
                        'href' => 'javascript:history.go(-1)'
                    ),

                );
            }else{
                $links = array(
                    0 => array(
                        'text' => '导购列表',
                        'href' => 'store_shopping_guide'
                    ),
                    1 => array(
                        'text' => '返回',
                        'href' => 'javascript:history.go(-1)'
                    ),

                );
            }
            $this->common_function->shop_admin_log($spg['spg_name'], $operation, '导购管理');
            $this->common_function->show_message($operate.'成功',0 ,$links);

        }else{
            $this->common_function->show_message('所属店铺不能为空！');
        }

    }

    //导购更新
    public function update_role(){
        $spg_id = isset($_POST['id'])?trim($_POST['id']):'';
        $role = isset($_POST['role'])?trim($_POST['role']):'';
        $check = isset($_POST['check'])?trim($_POST['check']):'';
        $result = array('state'=>false,'msg'=>'操作错误');
        if($spg_id&&$role){
           /* if($check&&$role==2){
                $result = array('state'=>false,'msg'=>'该店已存在一个店长');
            } else {*/
                $this->db->update('store_shopping_guide',array('role_type'=>$role),array('spg_id'=>$spg_id));
                $result = array('state'=>true,'msg'=>'修改完成');
           /* }*/
        }
        echo json_encode($result);die;
    }
    /*验证一个门店只能有一个店长*/
    /*public function store_guide_check(){

        $spg_id = isset($_POST['spg_id'])?trim($_POST['spg_id']):'';
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
        if($store_id){
            $num = $this->db->select('spg_id')->where('spg_store_id',$store_id)->where('role_type',2)->get('store_shopping_guide')->row('spg_id');
            if($spg_id){
                if($num){
                    if($num==$spg_id){
                        echo json_encode(array('state'=>true));exit;
                    }else{
                        echo json_encode(array('state'=>false));exit;
                    }
                }else{
                    echo json_encode(array('state'=>true));exit;
                }
            }else{
                if($num){
                    echo json_encode(array('state'=>false));exit;
                }else{
                    echo json_encode(array('state'=>true));exit;
                }
            }
        }else{
            echo json_encode(array('state'=>true));exit;
        }
    }*/
    /*查找店铺*/
    public function select_store(){
        $spg_id = isset($_POST['id'])?trim($_POST['id']):'';
        if($spg_id){
            $spg_store = $this->db->select('spg_store_id')->where('spg_id',$spg_id)->get('store_shopping_guide')->row('spg_store_id');
            $data = $this->db->select('store_id,store_name')->where('store_state',1)->where('ous_type',2)->where("store_id!='".$spg_store."'")->get('store')->result_array();
            echo json_encode(array('state'=>true,'data'=>$data,'msg'=>''));exit;
        }else{
            echo json_encode(array('state'=>false,'data'=>'','msg'=>'操作错误'));exit;
        }
    }
    /*更改门店*/
    public function update_store(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
        $spg_id = isset($_POST['id'])?trim($_POST['id']):'';
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
        $result = array('state'=>false,'msg'=>'操作错误');
        if($spg_id&&$store_id){
            $role = $this->db->select('role_type')->where('spg_id',$spg_id)->get('store_shopping_guide')->row('role_type');
            if($role==2){
                $num = $this->db->select('count(1) as num')->where('spg_store_id',$store_id)->where('role_type',2)->get('store_shopping_guide')
                    ->row('num');
                if($num>=1){
                    echo json_encode(array('state'=>false,'msg'=>'选择的门店已有店长，请重新选择'));die;
                }
            }
            $this->db->where('spg_id',$spg_id)->update('store_shopping_guide',array('spg_store_id'=>$store_id));
            echo json_encode(array('state'=>true,'msg'=>'门店已修改'));die;
        }else{
            json_encode($result);die;
        }
    }



}