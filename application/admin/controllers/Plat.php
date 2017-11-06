<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: yhx
 * Date: 2017/7/24
 * Time: 18:56
 */
class Plat extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->library ( 'common_function' );
        $this->load->model ('goods_model');
        $this->load->model ('stores_model');
        $this->load->library('shop');
    }

    /*店铺管理*/
    public function store_management(){
        $this->common_function->shop_admin_priv("store_management");//权限
        if(isset($_GET['op'])&&$_GET['op']=='stop')
        {
            $this->smarty->assign('op',$_GET['op']);
        }
        /*$this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial,sb.brand_class,sb.brand_pic,sb.brand_sort,sb.brand_recommend,sb.class_id,sb.show_type');
        $this->db->from('shop_brand as sb');
        $this->db->order_by('brand_initial');
        $brands = $this->db->get()->result_array();*/
        $area = $this->common_function->get_area_info();
        /*$this->smarty->assign('brands',$brands);*/
        $this->smarty->assign('area',$area);
        $this->smarty->display ('plat_store_management.html');
    }
    /*获取门店列表*/
    public function get_store_list(){
        $this->common_function->shop_admin_priv("store_management");//权限
        //print_r($_POST);print_r($_GET);die;
        $default_pic = TEMPLE.'img/default_goods_image_240.gif';
        $op = isset($_GET['op'])?trim($_GET['op']):'';
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $store_name = isset($_GET['store_name'])?trim($_GET['store_name']):'';
        $store_type = isset($_GET['ous_type'])?trim($_GET['ous_type']):'';
        $store_province = isset($_GET['store_province'])?trim($_GET['store_province']):'';
        $store_city = isset($_GET['store_city'])?trim($_GET['store_city']):'';
        $store_area = isset($_GET['store_area'])?trim($_GET['store_area']):'';
        $where = '1';
        if(!empty($op)&&$op=='stop'){
            $where .=" and store_state!=1 ";
        }else{
            $where .=" and store_state=1 ";
        }
        if(!empty($store_name)){
            $where .=" and store_name like '%{$store_name}%' ";
        }
        if(!empty($store_type)){
            $where .=" and ous_type = $store_type ";
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
        $store_type = array('1'=>'实体店','2'=>'电商店','3'=>'供应店');
        foreach($rows as $row){
            $xml .= "<row id='".$row['store_id']."'>";
            $store_state = ($row['store_state']==1)?'暂停营业':'开启营业';
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['store_id'] .",".json_encode($row['store_name']) .")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                         <ul>
    		                <li><a onclick=fg_edit(" .$row['store_id'] . ")>编辑店铺</a></li>
    		                <li><a onclick='update_ad_managements(" . $row['store_id'] .",".json_encode($row['store_name']) .")'>".$store_state."</a></li>
    	                    <li><a onclick=call_code(". $row['store_id'] .")>下载二维码</a></li>
    	                    <li><a href='store_of_goods?op=edit&id={$row['store_id']}'>商品管理</a></li>
    	                    <li><a href='store_of_shopping_guide?op=edit&id={$row['store_id']}'>导购管理</a></li>";
            $xml .= "</ul></span>]]></cell>";

            $xml .= "<cell><![CDATA[<span title='{$row['store_name']}'>".$row['store_name']."</span>]]></cell>";
            $spg_num = $this->db->select('count(1) as num')->where('spg_store_id',$row['store_id'])->get('store_shopping_guide')->row('num');
            $xml .= "<cell><![CDATA[".$spg_num."]]></cell>";
            $xml .= "<cell><![CDATA[".$store_type[$row['ous_type']]."]]></cell>";
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
    /*店铺管理*/
    public function store_edit(){
        $this->common_function->shop_admin_priv("store_management");//权限
        if(isset($_GET['op'])&&$_GET['op']=='edit'){
            $id = isset($_GET['id'])?intval($_GET['id']):'';
            $store_data = $this->db->select('*')->where('store_id',$id)->get('store')->row_array();
            if($store_data['ous_type']==2){
                $auth_store=$this->db->select('auth_store_id,auth_store_name')->where('store_id',$id)->get('store_auth_store')->result_array();
                $auth_stores=array();
                if(!empty($auth_store)){
                    foreach ($auth_store as $v){
                        $auth_stores[]=$v['auth_store_id'];
                    }
                }
                $this->smarty->assign('auth_stores',$auth_stores);
            }else{
                $brands_auth_arr = $this->db->select('brand_id')->where('store_id',$id)->get('store_attr_brands')->result_array();
                $brands_auth = array();
                foreach ($brands_auth_arr as $v){
                    $brands_auth[] = $v['brand_id'];
                }
                $this->smarty->assign('brands_auth',$brands_auth);
            }
            $this->smarty->assign('store_data',$store_data);
        }

        $stores = $this->db->select('store_id,store_name')->where('ous_type',3)->where('store_state',1)->get('store')->result_array();
        $this->smarty->assign('stores',$stores);
        $brands = $this->db->select('brand_id,brand_name')->get('shop_brand')->result_array();
        $this->smarty->assign('brands',$brands);
        $area_data = $this->shop->get_area_info();
        $this->smarty->assign('area_data',$area_data);
        $this->smarty->assign('area_datajs',json_encode($area_data));
        $this->smarty->display ('plat_store_edit.html');
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
        $store['ous_type'] = isset($_POST['class_type'])?trim($_POST['class_type']):'';
        $store['ous_business_hours'] = isset($_POST['class_time'])?trim($_POST['class_time']):'';
        $store['ous_dec'] = isset($_POST['class_detail'])?trim($_POST['class_detail']):'';
        $store['ous_out_sn'] = isset($_POST['class_code'])?trim($_POST['class_code']):'';
        //$store['store_share'] = isset($_POST['store_share'])?trim($_POST['store_share']):'';        //是否是共享店铺
       // $store['store_share_num'] = isset($_POST['store_share_num'])?trim($_POST['store_share_num']):'';    //限制店铺数量
        $brand_auth = isset($_POST['class_brand_auth'])?$_POST['class_brand_auth']:'';
        $store_auth = isset($_POST['store_auth'])?$_POST['store_auth']:'';
        //print_r($brand_auth);die;

        $time = time();
        $store['add_time'] = $time;
        $store['add_admin_id'] = $_SESSION['shop_admin_id'];
        $store['last_update_userId'] = $_SESSION['shop_admin_id'];
        $store['last_update_time'] = $time;
        $store['last_update_user_type'] = '';
        $store['ous_longitude'] = isset($_POST['longitude'])?trim($_POST['longitude']):'';
        $store['ous_latitude'] = isset($_POST['latitude'])?trim($_POST['latitude']):'';
//	    $store['ous_tag'] = isset($_POST['tag'])?trim($_POST['tag']):'';
        $store['is_share_store'] = isset($_POST['is_share_store'])?trim($_POST['is_share_store']):'';
        if (!empty($store['is_share_store'])) {
            $store['partime_jobs_limit'] = isset($_POST['partime_jobs_limit'])?trim($_POST['partime_jobs_limit']):'';
        } else {
            $store['partime_jobs_limit'] = 0;
        }
        if($store['store_name']){
            if(empty($store_id)){
                $store['store_state'] = isset($_POST['store_state'])?trim($_POST['store_state']):1;
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

            //授权品牌
            $del_brand_auth = $this->db->select('group_concat(brand_id) as brands')->where('store_id',$storeId)->where_not_in('brand_id',$brand_auth)->get('store_attr_brands')->row('brands');

            if(!empty($del_brand_auth)){

                $del_stock = $this->db->select('group_concat(s.ssa_id) as ssa_idr')->from('store_stocks_amount as s')
                    ->join('shop_goods g','g.goods_id=s.goods_id','left')
                    ->where("g.brand_id IN ($del_brand_auth)")->where('s.ssa_store_id',$storeId)->get()->row('ssa_idr');
                if(!empty($del_stock)){
                    $this->db->query("update ".$this->db->dbprefix('store_stocks_amount')." set amount=0 where ssa_id in ($del_stock)");
                }
                $this->db->where("brand_id IN ($del_brand_auth)")->where('store_id',$storeId)->delete('store_attr_brands');
            }
            if(!empty($brand_auth)){
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

            //授权门店
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
                            'href' => 'store_management'
                        ),
                        1 => array(
                            'text' => '返回',
                            'href' => 'javascript:history.go(-1)'
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

    /*店铺导购*/
    public function store_of_shopping_guide(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
        $store_id = isset($_GET['id'])?trim($_GET['id']):false;
        $op = isset($_GET['op'])?trim($_GET['op']):false;
        if($op&&$op=='edit'&&$store_id){
            $store_data = array();
            $store_data = $this->db->select('store_id,store_name')->where('store_id',$store_id)->get('store')->row_array();
            $this->smarty->assign('store_data',$store_data);
            $this->smarty->display ('store_of_shopping_guide.html');
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
    /*导购管理*/
    public function store_shopping_guide(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
        //print_r(date('Ymd His',1489994945));print_r(date('Ymd His',1489990379));exit;

        $this->smarty->display ('plat_store_guide.html');
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
        $where = " 1='1' ";
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
        $where = "1='1'";
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
    //导购更新
    public function update_role(){
        $spg_id = isset($_POST['id'])?trim($_POST['id']):'';
        $role = isset($_POST['role'])?trim($_POST['role']):'';
        $check = isset($_POST['check'])?trim($_POST['check']):'';
        $result = array('state'=>false,'msg'=>'操作错误');
        if($spg_id&&$role){
            /*if($check&&$role==2){
                $result = array('state'=>false,'msg'=>'该店已存在一个店长');
            } else {*/
                $this->db->update('store_shopping_guide',array('role_type'=>$role),array('spg_id'=>$spg_id));
                $result = array('state'=>true,'msg'=>'修改完成');
           /* }*/
        }
        echo json_encode($result);die;
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
        $store = $this->db->select('store_id,store_name')->get('store')->result_array();
        $this->smarty->assign('store',$store);
        $this->smarty->display ('store_shopping_guide_edit.html');
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

    /*店铺商品*/
    public function store_of_goods(){
        $this->common_function->shop_admin_priv("store_management");//权限
        //print_r($_GET);exit;
        $store_id = isset($_GET['id'])?trim($_GET['id']):false;
        $op = isset($_GET['op'])?trim($_GET['op']):false;
        if($op&&$op=='edit'&&$store_id){
            $store_data = array();
            $store_data = $this->db->select('store_id,store_name,ous_type')->where('store_id',$store_id)->get('store')->row_array();
            /*$brands = $this->db->select('s.brand_id,s.brand_name')->from('store_attr_brands as sb')
                ->join('shop_brand as s','s.brand_id=sb.brand_id')->where('sb.store_id',$store_id)
                ->get()->result_array();
            $this->smarty->assign('brands',$brands);*/
            $this->smarty->assign('store_data',$store_data);
            $this->smarty->display ('plat_store_of_goods.html');
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
        $stock_sn = isset($_GET['stock_sn'])?trim($_GET['stock_sn']):'';
        $stock_name = isset($_GET['stock_name'])?trim($_GET['stock_name']):'';
        $amount = isset($_GET['amount'])?trim($_GET['amount']):'';
        $where = ' g.goods_state!=0 ';
        $store_type=$this->db->select('ous_type')->where('store_id',$store_id)->get('store')->row('ous_type');
        if($date_from){
            $date_from = strtotime($date_from);
            $where .=" and g.goods_addtime>='{$date_from}' ";
        }
        if($date_to){
            $date_to = strtotime($date_to);
            $where .=" and g.goods_addtime<='{$date_to}' ";
        }
        if($stock_sn){
            $where .=" and g.stocks_sku like '%{$stock_sn}%' ";
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
        if(!empty($store_id)){
            if($store_type==2){
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
                }else{
                    $auth_stores[]=$store_id;
                }
            }else{
                $brand_code_arr = $this->db->select('s.brand_id,s.brand_name')->from('store_attr_brands as sb')
                    ->join('shop_brand as s','s.brand_id=sb.brand_id')->where('sb.store_id',$store_id)
                    ->get()->result_array();
            }

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
        if ($query && $qtype){
            $where .= " and {$qtype} like '%{$query}%'";
        }

        if($store_type==2){
            $total = $this->db->select('g.goods_id')
                ->from('v_store_stock g')
                ->where_in('g.ssa_store_id',$auth_stores)
                ->where($where)->group_by('g.goods_id')->get()->result_array();
        }else{
            $total = $this->db->select('g.goods_id')
                ->from('v_store_stock g')
                ->where('g.ssa_store_id',$store_id)
                ->where($where)->group_by('g.goods_id')->get()->result_array();
        }
        $total = count($total);
        //print_r($this->db->last_query());die;
        $start = $rp * ($page - 1);
        if($store_type==2){
            $rows = $this->db->select('g.goods_id,g.goods_spu,g.goods_name,g.gc_id,g.gc_name,g.brand_id,g.brand_name,g.goods_price,
            g.goods_marketprice,g.goods_image,g.goods_addtime,sum(g.stock_amount) as stock_amount')
                ->from('v_store_stock g')
                ->where_in('g.ssa_store_id',$auth_stores)
                ->where($where)->group_by('g.goods_id')
                ->order_by('g.goods_addtime','DESC')->limit($rp,$start)->get()->result_array();
        }else{
            $rows = $this->db->select('g.goods_id,g.goods_spu,g.goods_name,g.gc_id,g.gc_name,g.brand_id,g.brand_name,g.goods_price,
            g.goods_marketprice,g.goods_image,g.goods_addtime,g.stock_amount')
                ->from('v_store_stock g')
                ->where('g.ssa_store_id',$store_id)
                ->where($where)->group_by('g.goods_id')
                ->order_by('g.goods_addtime','DESC')->limit($rp,$start)->get()->result_array();
        }

        //print_r($this->db->last_query());die;
        $default_pic = PLUGIN.'data/images/'.$this->common_function->get_system_value('default_goods_image');
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
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


    /*店铺运费*/
    public function store_of_freight_setting(){
        $this->common_function->shop_admin_priv("store_management");//权限
        $store_id = isset($_GET['id'])?trim($_GET['id']):false;
        $op = isset($_GET['op'])?trim($_GET['op']):false;
        if($op&&$op=='edit'&&$store_id){
            $store_data = array();
            $store_data = $this->db->select('store_id,store_name,ept_id,is_show_ept_desc,ept_show_desc')->where('store_id',$store_id)->get('store')->row_array();
            $ept_arr = $this->db->select('ept_id,ept_name,express_code,express_name')->group_by('ept_name')->get('express_template')->result_array();
            $this->smarty->assign('store_data',$store_data);
            $this->smarty->assign('ept_arr',$ept_arr);
            $this->smarty->display ('store_of_freight_setting.html');
        }

    }
    /*店铺运费设置*/
    public function store_freight_set(){
        $this->common_function->shop_admin_priv("store_management");//权限
        //print_r($_POST);exit;
        $store_arayacak = isset($_POST['store_arayacak'])?trim($_POST['store_arayacak']):'';//运费模板
        $qq_isuse = isset($_POST['qq_isuse'])?trim($_POST['qq_isuse']):1;//是否显示
        $statistics_code = isset($_POST['statistics_code'])?trim($_POST['statistics_code']):'';//说明
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
        $store_name = isset($_POST['store_name'])?trim($_POST['store_name']):'';
        if($store_id){
            $data = array(
                'is_show_ept_desc'=>$qq_isuse,'ept_show_desc'=>$statistics_code,
                'ept_id'=>$store_arayacak,
            );
            $this->db->update('store',$data,array('store_id'=>$store_id));
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
            $this->common_function->shop_admin_log('门店‘'.$store_name.'’运费设置', 'edit', '门店设置');
            $this->common_function->show_message('设置成功',0 ,$links);
        }else{
            $this->common_function->show_message('操作错误');
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
            $this->smarty->display ('store_of_other.html');
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


    /*店铺商品库存修改*/

    public function update_goodsAmount(){

        $this->common_function->shop_admin_priv("store_management");//权限

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

	            se.stocks_price,se.stocks_marketprice,se.goods_ea_id,se.color,se.color_remark,

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

                    $arr['goods_ea_id'] = $v['goods_ea_id'];

                    $arr['color'] = $v['color'];

                    $arr['goods_color_remark'] = $v['color_remark'];

                    $arr['stocks_price'] = empty($v['stocks_price'])?$v['goods_price']:$v['stocks_price'];

                    $arr['stocks_bar_code'] = $v['stocks_bar_code'];

                    $arr['stocks_sn'] = $v['stocks_sku'];

                    $arr['size'] = $v['size'];

                    $this->db->insert('store_stocks_amount',$arr);

                }

            }

            $result = array('state'=>true,'msg'=>'修改完成');

        }else{

            $result = array('state'=>true,'msg'=>'请先至少选择一项');

        }


        echo json_encode($result);exit;

    }

    /*清除门店库存为0 的数据*/

    public function clearAmount(){

        $this->common_function->shop_admin_priv("store_management");//权限

        $store_id = isset($_GET['store_id'])?intval($_GET['store_id']):'';

        $value = array('state'=>false,'msg'=>'操作错误');

        if($store_id){

            $this->db->where('ssa_store_id',$store_id)->where('amount<=0')->delete('store_stocks_amount');

            $value = array('state'=>true,'msg'=>'清除完成');

        }

        echo json_encode($value);die;

    }

    /*修改某个商品的库存，价格数据*/

    public function updateAmount(){

        $this->common_function->shop_admin_priv("store_management");//权限

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

    public function updateStocks(){

        $this->common_function->shop_admin_priv("store_management");//权限

        //print_r($_POST); print_r($_GET);

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

    /*库存导入格式*/

    public function storeGoods_tp(){

        header("location:".base_url("/data/excel_tp/storeGoods.xlsx"));

    }

    /*库存导入格式*/

    public function storeGoodsSku_tp(){

        header("location:".base_url("/data/excel_tp/storeGoodsSku.xlsx"));

    }

    /*库存导入格式*/

    public function storeGoodsBarcode_tp(){

        header("location:".base_url("/data/excel_tp/storeGoodsBarcode.xlsx"));

    }


    /*店铺商品库存导入*/

    public function storeGoodsBarcode_import(){

        $this->common_function->shop_admin_priv("store_management");//权限

        // EXCEL 文件上传

        include VIEWPATH.'file_handle.html';

        $condition = $this->input->get();

        set_time_limit(0);

        ini_set('memory_limit','-1');

        // 读取EXCEL文件

        include (ROOTPATH . 'libraries/PHPExcel/IOFactory.php');

        include (ROOTPATH . 'libraries/PHPExcel/Reader/Excel2007.php');

        $excelpath = ROOTPATH.'data/excel/'.$condition['name'].'.xlsx';

        $objReader = PHPExcel_IOFactory::createReader ( 'Excel2007' );

        $objPHPExcel = $objReader->load ( $excelpath );

        $sheet = $objPHPExcel->getSheet ( 0 );

        $rows = $sheet->getHighestRow (); // 取得总行数

        $all_num = $rows;

        //print_r($condition);die;

        // 数据处理

        $datas = array ();

        $delete_row = array ();

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

        $user_id = $_SESSION['shop_admin_id'];

        $user_name = $_SESSION['shop_admin_name'];

        $user_type = 1;

        $time = time();

        if(isset($condition['type'])&&$condition['type']==1){

            $update = array(

                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>1,

            );

            $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);

        }



        for($i = 2; $i <= $rows; $i ++) {

            $flag = false;

            $false_msg ='';

            $now_run++;

            $percent = intval(($now_run/$rows)*100);

            ob_clean();

            ob_start();

            // 条码<必填>

            $excel['barcode'] = $objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ();

            $excel['barcode'] = trim($excel['barcode']);

            if (empty( $excel['barcode'] )) {

                $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );

                $false_msg .='商品条形码必填。';

                $flag = true;

            }else{

                $check_goods = $this->db->select('g.brand_id,ea.*')->from('shop_goods g')

                    ->join('shop_goods_extend_attr ea','ea.goods_id=g.goods_id')

                    ->where('ea.stocks_bar_code',$excel['barcode'])

                    ->where("(g.goods_pos={$condition['store_id']} or g.goods_pos=0)")->where('g.goods_state!=0')

                    ->order_by('g.goods_pos','DESC')->group_by('g.goods_id')->get()->result_array();

                $check_barcode = isset($check_goods[0])?$check_goods[0]:'';

                if(empty($check_barcode)){

                    $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );

                    $false_msg .='此条码对应的商品不存在。';

                    $flag = true;

                }elseif(!in_array($check_barcode['brand_id'], $auth_brand)){

                    $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );

                    $false_msg .='此商品品牌还未给此门店授权。';

                    $flag = true;

                }

            }

            //库存<必填>

            $excel ['amount'] = $objPHPExcel->getActiveSheet ()->getCell ( "B{$i}" )->getValue ();

            $excel ['amount'] = intval($excel ['amount']);

            if (empty ( $excel ['amount'])) {

                $this->common_function->wrong_cell ( $objPHPExcel, "B{$i}" );

                $false_msg .='库存必填。';

                $flag = true;

            }

            //售价

            $excel ['stocks_price'] = $objPHPExcel->getActiveSheet ()->getCell ( "C{$i}" )->getValue ();

            $excel ['stocks_price'] = trim($excel ['stocks_price']);

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

                        'update_user_id'=>$user_id,'update_user_type'=>$user_type,'stocks_bar_code'=>$check_barcode['stocks_bar_code'],

                        'stocks_sn'=>$check_barcode['stocks_sku'],

                    );

                    if(!empty($excel ['stocks_price'])){

                        $update_data['stocks_price'] = $excel['stocks_price'];

                    }

                    $this->db->update('store_stocks_amount',$update_data,array('ssa_id'=>$check_amount['ssa_id']));

                }else{

                    $check_barcode['stocks_price'] = empty($excel ['stocks_price'])?$check_barcode ['stocks_price']:$excel ['stocks_price'];

                    $sql_amount = array(

                        'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$check_barcode ['color'],

                        'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$check_barcode['color_remark'],

                        'stocks_sn'=>$check_barcode ['stocks_sku'],'size'=>$check_barcode ['size'],'ssa_store_id'=>$condition ['store_id'],

                        'stocks_price'=>$check_barcode['stocks_price'],'goods_ea_id'=>$check_barcode['goods_ea_id'],'goods_size_remark'=>$check_barcode['size_note'],

                        'stocks_bar_code'=>$excel['barcode'],'goods_id'=>$check_barcode['goods_id']

                    );

                    $this->db->insert('store_stocks_amount',$sql_amount);

                }



                $add_num++;

                echo "<script language='javascript'>" .

                    '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".

                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .

                    "location.href = '#anchor';" .

                    "</script>";

                unset($excel);

                $delete_row [] = $i; // 记录插入成功的当前行





            } else { // 有错误的EXCEL行

                $is_download = true;

                $objPHPExcel->getActiveSheet()->setCellValue("{$error_col}{$i}",$false_msg);

                $objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->setFillType ( PHPExcel_Style_Fill::FILL_SOLID );

                $objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->getStartColor ()->setARGB ( 'FFFF0000' );

                $error_num++;

                echo "<script language='javascript'>" .

                    '$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".

                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .

                    "location.href = '#anchor';" .

                    "</script>";

                unset($excel);

            }

            ob_end_flush();

            ob_flush();

            flush();

            if ($now_run % 100 == 0){

                sleep(1);

            }

        }

        ob_clean();

        ob_start();

        echo "<script language='javascript'>" .

            '$("#box").append("'."<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:"."[".date('H:i:s')."]，导入成功，正在生成错误列表excel，请稍等。。。"."</p>\");".

            "</script>";

        ob_end_flush();

        ob_flush();

        flush();

        $delete_row = array_reverse ( $delete_row );

        foreach ( $delete_row as $v ) {

            $objPHPExcel->getActiveSheet ()->removeRow ( $v );

        }



        // 删除原EXCEL文件

        if (file_exists ( $excelpath )) {

            unlink ( $excelpath );

        }

        // 如有错误下载错误的文件

        if ($is_download) { // 存在格式不成功excel，下载

            $objPHPExcel->getActiveSheet()->setCellValue("{$error_col}1",'错误信息');

            $filenames = 'goods_import_error' . date ( 'YmdHis' );

            $filename = ROOTPATH.'data/excel/'.$filenames.'.xlsx';

            $filename = str_replace('\\', '/', trim($filename));

            ob_end_clean ();

            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

            $objWriter->save ($filename);

            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $filenames .'.xlsx'));

            echo "<script language='javascript'>" .

                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".

                "location.href = '#anchor';" .

                '$(".btnr").click();' .

                '$("#game_over").append("'."<p>导入".($all_num-1)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".

                "</script>";

        }else{

            echo "<script language='javascript'>" .

                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".

                "location.href = '#anchor';" .

                '$(".btnr").click();' .

                '$("#game_over").append("'."<p>导入".($all_num-1)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".

                "</script>";

        }

        //@unlink($excelpath);

        $this->common_function->shop_admin_log('门店商品库存导入', 'import', '门店商品管理');

        exit();

    }

    /*店铺商品库存导入*/

    public function storeGoodsSku_import(){

        $this->common_function->shop_admin_priv("store_management");//权限

        // EXCEL 文件上传

        include VIEWPATH.'file_handle.html';

        $condition = $this->input->get();

        set_time_limit(0);

        ini_set('memory_limit','-1');

        // 读取EXCEL文件

        include (ROOTPATH . 'libraries/PHPExcel/IOFactory.php');

        include (ROOTPATH . 'libraries/PHPExcel/Reader/Excel2007.php');

        $excelpath = ROOTPATH.'data/excel/'.$condition['name'].'.xlsx';

        $objReader = PHPExcel_IOFactory::createReader ( 'Excel2007' );

        $objPHPExcel = $objReader->load ( $excelpath );

        $sheet = $objPHPExcel->getSheet ( 0 );

        $rows = $sheet->getHighestRow (); // 取得总行数

        $all_num = $rows;

        //print_r($condition);die;

        // 数据处理

        $datas = array ();

        $delete_row = array ();

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

        $user_id = $_SESSION['shop_admin_id'];

        $user_name = $_SESSION['shop_admin_name'];

        $user_type = 1;

        $time = time();

        if(isset($condition['type'])&&$condition['type']==1){

            $update = array(

                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>1,

            );

            $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);

        }



        for($i = 2; $i <= $rows; $i ++) {

            $flag = false;

            $false_msg ='';

            $now_run++;

            $percent = intval(($now_run/$rows)*100);

            ob_clean();

            ob_start();

            // 品牌<必填>

            $brand_name = $objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ();

            $brand_name = trim($brand_name);

            if (empty( $brand_name )) {

                $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );

                $false_msg .='品牌必填。';

                $flag = true;

            }else{

                $brand_id = $this->db->select('brand_id')->where('brand_name',$brand_name)->get('shop_brand')->row('brand_id');

                if(empty($brand_id)){

                    $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );

                    $false_msg .='系统还未添加此品牌。';

                    $flag = true;

                }elseif(!in_array($brand_id, $auth_brand)){

                    $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );

                    $false_msg .='此品牌还未给此门店授权。';

                    $flag = true;

                }

            }

            // 款号<必填>

            $excel ['stocks_spu'] = $objPHPExcel->getActiveSheet ()->getCell ( "B{$i}" )->getValue ();

            $excel ['stocks_spu'] = trim($excel ['stocks_spu']);

            if (empty( $excel ['stocks_spu'] )) {

                $this->common_function->wrong_cell ( $objPHPExcel, "B{$i}" );

                $false_msg .='款号必填。';

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

                        $this->common_function->wrong_cell ( $objPHPExcel, "B{$i}" );

                        $false_msg .='款号不存在。';

                        $flag = true;

                    }else{

                        $excel['brand_id'] = $brand_id;

                        $excel['goods_id'] = $check_stock['goods_id'];

                    }



                }



            }

            //主色<必填>

            $excel ['color'] = $objPHPExcel->getActiveSheet ()->getCell ( "C{$i}" )->getValue ();

            $excel ['color'] = trim($excel ['color']);

            if ( $excel ['color']=='' ) {

                $this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );

                $false_msg .='主色必填。';

                $flag = true;

            }

            //颜色<必填>

            $excel ['color_remark'] = $objPHPExcel->getActiveSheet ()->getCell ( "D{$i}" )->getValue ();

            $excel ['color_remark'] = trim($excel ['color_remark']);

            if ( $excel ['color_remark']=='' ) {

                $this->common_function->wrong_cell ( $objPHPExcel, "D{$i}" );

                $false_msg .='颜色必填。';

                $flag = true;

            }

            if(!$flag){

                //查找goods_a_id

                $check_color = $this->db->select('goods_a_id')->from('shop_goods_extend')

                    ->where('goods_id',$excel['goods_id'])->where('color_remark',$excel ['color_remark'])->where('color',$excel ['color'])

                    ->get()->row_array();

                if(empty($check_color)){

                    $this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );

                    $this->common_function->wrong_cell ( $objPHPExcel, "D{$i}" );

                    $false_msg .='此货不存在该颜色。';

                    $flag = true;

                }else{

                    $excel['goods_a_id'] = $check_color['goods_a_id'];

                }

            }

            //尺码<必填>

            $excel ['size'] = $objPHPExcel->getActiveSheet ()->getCell ( "E{$i}" )->getValue ();

            $excel ['size'] = trim($excel ['size']);

            if ( $excel ['size']=='' ) {

                $this->common_function->wrong_cell ( $objPHPExcel, "E{$i}" );

                $false_msg .='尺码必填。';

                $flag = true;

            }

            if(!$flag){

                $gc_id = $this->db->select('s.size')->from('code_segment_size s')

                    ->join('shop_brand b','b.brand_size_type=s.flag')

                    ->join('shop_goods g','g.brand_id=b.brand_id')

                    ->where('s.size',$excel['size'])->where('g.goods_id',$excel['goods_id'])

                    ->get()->row('size');

                if($gc_id==''){

                    $this->common_function->wrong_cell ( $objPHPExcel, "E{$i}" );

                    $false_msg .='尺码不存在。请先添加此类商品的尺码';

                    $flag=true;

                }



            }

            //库存<必填>

            $excel ['amount'] = $objPHPExcel->getActiveSheet ()->getCell ( "F{$i}" )->getValue ();

            $excel ['amount'] = intval($excel ['amount']);

            if (empty ( $excel ['amount'])) {

                $this->common_function->wrong_cell ( $objPHPExcel, "F{$i}" );

                $false_msg .='库存必填。';

                $flag = true;

            }

            //条码

            $excel ['stocks_bar_code'] = $objPHPExcel->getActiveSheet ()->getCell ( "G{$i}" )->getValue ();

            $excel ['stocks_bar_code'] = trim($excel ['stocks_bar_code']);

            if(!$flag){

                $check_ea_id = $this->db->select('stocks_bar_code,goods_ea_id,size_note,stocks_sku,stocks_price')->where('goods_a_id',$excel ['goods_a_id'])

                    ->where('size',$excel ['size'])->get('shop_goods_extend_attr')->row_array();

                if(!empty($check_ea_id)){

                    if(!empty($check_ea_id['stocks_bar_code'])){

                        if(!empty($excel ['stocks_bar_code'])&&$check_ea_id['stocks_bar_code']!=$excel ['stocks_bar_code']){

                            $this->common_function->wrong_cell ( $objPHPExcel, "G{$i}" );

                            $false_msg .='该 商品的条形码已存在且不与该条形码相同。';

                            $flag = true;

                        }

                    }

                    if(!empty($excel ['stocks_bar_code'])){

                        $check_bar_code = $this->db->select('goods_ea_id')->where('stocks_bar_code',$excel ['stocks_bar_code'])

                            ->where('g.goods_state!=0')->get('shop_goods_extend_attr')->row_array();

                        if(!empty($check_bar_code)){

                            if($check_bar_code['goods_ea_id']!=$check_ea_id['goods_ea_id']){

                                $this->common_function->wrong_cell ( $objPHPExcel, "G{$i}" );

                                $false_msg .='该条形码已有其他商品占用。';

                                $flag = true;

                            }

                        }

                    }

                }



            }

            //售价

            $excel ['stocks_price'] = $objPHPExcel->getActiveSheet ()->getCell ( "H{$i}" )->getValue ();

            $excel ['stocks_price'] = trim($excel ['stocks_price']);

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

                        if(!empty($excel ['stocks_price'])){

                            $update_data['stocks_price'] = $excel['stocks_price'];

                        }

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

                            'stocks_sn'=>$check_ea_id ['stocks_sku'],'size'=>$excel ['size'],'ssa_store_id'=>$condition ['store_id'],

                            'stocks_price'=>$check_ea_id['stocks_price'],'goods_ea_id'=>$check_ea_id['goods_ea_id'],'goods_size_remark'=>$check_ea_id['size_note'],

                            'stocks_bar_code'=>$check_ea_id['stocks_bar_code'],'goods_id'=>$excel['goods_id']

                        );

                        if(!empty($excel ['stocks_price'])){

                            $sql_amount['stocks_price'] = $excel['stocks_price'];

                        }

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

                            'size'=>$excel['size']

                        );

                        if(empty($check_ea_id['stocks_price'])&&$excel['stocks_price']!=''){

                            $sql_ea['stocks_price'] = $excel['stocks_price'];

                        }

                        if(empty($check_ea_id['stocks_bar_code'])&&!empty($excel['stocks_bar_code'])){

                            $sql_ea['stocks_bar_code'] = $excel['stocks_bar_code'];

                        }

                        $excel['stocks_price'] = empty($excel['stocks_price'])?$check_ea_id['stocks_price']:$excel['stocks_price'];

                        $excel['stocks_bar_code'] = empty($excel['stocks_bar_code'])?$check_ea_id['stocks_bar_code']:$excel['stocks_bar_code'];

                        $sql_amount = array(

                            'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$check_ea_id ['color'],

                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$check_ea_id['color_remark'],

                            'stocks_sn'=>$check_ea_id ['stocks_sku'],'size'=>$excel ['size'],'ssa_store_id'=>$condition ['store_id'],

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

                        $sql_ea['stocks_price'] = empty($sql_ea['stocks_price'])?$excel['stocks_price']:$sql_ea['stocks_price'];

                        $sql_ea['stocks_bar_code'] = $excel['stocks_bar_code'];

                        $sql_ea['size'] = $excel['size'];

                        $sql_ea['size_note'] = '';

                        $this->db->insert('shop_goods_extend_attr',$sql_ea);

                        $goods_ea_id = $this->db->insert_id();

                        $excel['stocks_price'] = empty($excel['stocks_price'])?$ea_arr['stocks_price']:$excel['stocks_price'];

                        $sql_amount = array(

                            'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$ea_arr ['color'],

                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$ea_arr['color_remark'],

                            'stocks_sn'=>$ea_arr ['stocks_sku'],'size'=>$excel ['size'],'ssa_store_id'=>$condition ['store_id'],

                            'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$goods_ea_id,'goods_size_remark'=>$ea_arr['size_note'],

                            'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$ea_arr['goods_id']

                        );

                        $this->db->insert('store_stocks_amount',$sql_amount);

                    }

                }

                $add_num++;

                echo "<script language='javascript'>" .

                    '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".

                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .

                    "location.href = '#anchor';" .

                    "</script>";

                unset($excel);

                $delete_row [] = $i; // 记录插入成功的当前行





            } else { // 有错误的EXCEL行

                $is_download = true;

                $objPHPExcel->getActiveSheet()->setCellValue("{$error_col}{$i}",$false_msg);

                $objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->setFillType ( PHPExcel_Style_Fill::FILL_SOLID );

                $objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->getStartColor ()->setARGB ( 'FFFF0000' );

                $error_num++;

                echo "<script language='javascript'>" .

                    '$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".

                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .

                    "location.href = '#anchor';" .

                    "</script>";

                unset($excel);

            }

            ob_end_flush();

            ob_flush();

            flush();

            if ($now_run % 100 == 0){

                sleep(1);

            }

        }

        ob_clean();

        ob_start();

        echo "<script language='javascript'>" .

            '$("#box").append("'."<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:"."[".date('H:i:s')."]，导入成功，正在生成错误列表excel，请稍等。。。"."</p>\");".

            "</script>";

        ob_end_flush();

        ob_flush();

        flush();

        $delete_row = array_reverse ( $delete_row );

        foreach ( $delete_row as $v ) {

            $objPHPExcel->getActiveSheet ()->removeRow ( $v );

        }



        // 删除原EXCEL文件

        if (file_exists ( $excelpath )) {

            unlink ( $excelpath );

        }

        // 如有错误下载错误的文件

        if ($is_download) { // 存在格式不成功excel，下载

            $objPHPExcel->getActiveSheet()->setCellValue("{$error_col}1",'错误信息');

            $filenames = 'goods_import_error' . date ( 'YmdHis' );

            $filename = ROOTPATH.'data/excel/'.$filenames.'.xlsx';

            $filename = str_replace('\\', '/', trim($filename));

            ob_end_clean ();

            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

            $objWriter->save ($filename);

            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $filenames .'.xlsx'));

            echo "<script language='javascript'>" .

                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".

                "location.href = '#anchor';" .

                '$(".btnr").click();' .

                '$("#game_over").append("'."<p>导入".($all_num-1)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".

                "</script>";

        }else{

            echo "<script language='javascript'>" .

                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".

                "location.href = '#anchor';" .

                '$(".btnr").click();' .

                '$("#game_over").append("'."<p>导入".($all_num-1)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".

                "</script>";

        }

        //@unlink($excelpath);

        $this->common_function->shop_admin_log('门店商品库存导入', 'import', '门店商品管理');

        exit();

    }

    /*店铺商品库存导入*/

    public function storeGoods_import(){

        $this->common_function->shop_admin_priv("store_management");//权限

        // EXCEL 文件上传

        include VIEWPATH.'file_handle.html';

        $condition = $this->input->get();

        set_time_limit(0);

        ini_set('memory_limit','-1');

        // 读取EXCEL文件

        include (ROOTPATH . 'libraries/PHPExcel/IOFactory.php');

        include (ROOTPATH . 'libraries/PHPExcel/Reader/Excel2007.php');

        $excelpath = ROOTPATH.'data/excel/'.$condition['name'].'.xlsx';

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

        $user_id = $_SESSION['shop_admin_id'];

        $user_name = $_SESSION['shop_admin_name'];

        $user_type = 1;

        $time = time();

        if(isset($condition['type'])&&$condition['type']==1){

            $update = array(

                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>1,

            );

            if(isset($condition['store_id'])){

                $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);

            }else{

                $this->db->update('store_stocks_amount',$update);

            }

        }



        for($i = 2; $i <= $rows; $i ++) {

            $flag = false;

            $false_msg ='';

            $now_run++;

            $percent = intval(($now_run/$rows)*100);

            ob_clean();

            ob_start();

            // 品牌<必填>

            $brand_name = $objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ();

            $brand_name = trim($brand_name);

            if (empty( $brand_name )) {

                $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );

                $false_msg .='品牌必填。';

                $flag = true;

            }else{

                $brand_id = $this->db->select('brand_id')->where('brand_name',$brand_name)->get('shop_brand')->row('brand_id');

                if(empty($brand_id)){

                    $false_msg .='系统还未添加此品牌。';

                    $flag = true;

                }

            }

            // 货号<必填>

            $excel ['stocks_sn'] = $objPHPExcel->getActiveSheet ()->getCell ( "B{$i}" )->getValue ();

            $excel ['stocks_sn'] = trim($excel ['stocks_sn']);

            if (empty( $excel ['stocks_sn'] )) {

                $this->common_function->wrong_cell ( $objPHPExcel, "B{$i}" );

                $false_msg .='货号必填。';

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

                        $this->common_function->wrong_cell ( $objPHPExcel, "B{$i}" );

                        $false_msg .='货号不存在。';

                        $flag = true;

                    }else{

                        $excel['brand_id'] = $brand_id;

                        $excel['goods_id'] = $check_stock['goods_id'];

                    }



                }



            }

            //尺码<必填>

            $excel ['size'] = $objPHPExcel->getActiveSheet ()->getCell ( "C{$i}" )->getValue ();

            $excel ['size'] = trim($excel ['size']);

            if ( $excel ['size']=='' ) {

                $this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );

                $false_msg .='尺码必填。';

                $flag = true;

            }

            if(!$flag){

                $gc_id = $this->db->select('s.size')->from('code_segment_size s')

                    ->join('shop_brand b','b.brand_size_type=s.flag')

                    ->join('shop_goods g','g.brand_id=b.brand_id')

                    ->where('s.size',$excel['size'])->where('g.goods_id',$excel['goods_id'])

                    ->get()->row('size');

                if($gc_id==''){

                    $this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );

                    $false_msg .='尺码不存在。请先添加此类商品的尺码';

                    $flag=true;

                }



            }

            //库存<必填>

            $excel ['amount'] = $objPHPExcel->getActiveSheet ()->getCell ( "D{$i}" )->getValue ();

            $excel ['amount'] = intval($excel ['amount']);

            if (empty ( $excel ['amount'])) {

                $this->common_function->wrong_cell ( $objPHPExcel, "D{$i}" );

                $false_msg .='库存必填。';

                $flag = true;

            }

            //条码

            $excel ['stocks_bar_code'] = $objPHPExcel->getActiveSheet ()->getCell ( "E{$i}" )->getValue ();

            $excel ['stocks_bar_code'] = trim($excel ['stocks_bar_code']);

            if(!empty($excel ['stocks_bar_code'])&&!$flag){

                $check_bar_code = $this->db->select('ea.stocks_bar_code,ea.goods_ea_id,ea.size_note,ea.stocks_sku,ea.stocks_price')

                    ->from('shop_goods_extend_attr ea')->join('shop_goods g','g.goods_id=ea.goods_id')

                    ->where('ea.stocks_bar_code',$excel ['stocks_bar_code'])->where('g.goods_state!=0')

                    ->get()->row_array();



                $check_goods_barcode = $this->db->select('stocks_bar_code,goods_ea_id')->where('stocks_sku',$excel ['stocks_sn'])

                    ->where('size',$excel ['size'])->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();

                $check_barcode = isset($check_goods_barcode['stocks_bar_code'])?$check_goods_barcode['stocks_bar_code']:'';

                if(!empty($check_goods_barcode)){

                    if(!empty($check_bar_code)&&$check_bar_code['goods_ea_id']!=$check_goods_barcode['goods_ea_id']){

                        $this->common_function->wrong_cell ( $objPHPExcel, "E{$i}" );

                        $false_msg .='该条形码已有其他商品占用。';

                        $flag = true;

                    }

                }

                if($check_barcode&&$check_barcode!=$excel ['stocks_bar_code']&&!$flag){

                    $this->common_function->wrong_cell ( $objPHPExcel, "E{$i}" );

                    $false_msg .='该货号该尺码对应 商品的条形码已存在且不与该条形码相同。';

                    $flag = true;

                }

            }

            //售价

            $excel ['stocks_price'] = $objPHPExcel->getActiveSheet ()->getCell ( "F{$i}" )->getValue ();

            $excel ['stocks_price'] = trim($excel ['stocks_price']);

            if(!isset($condition['store_id'])){

                //所属门店<必填>

                $excel ['ssa_store_code'] = $objPHPExcel->getActiveSheet ()->getCell ( "G{$i}" )->getValue ();

                $excel ['ssa_store_code'] = trim($excel ['ssa_store_code']);

                if (empty ( $excel ['ssa_store_code'])) {

                    $this->common_function->wrong_cell ( $objPHPExcel, "G{$i}" );

                    $false_msg .='所属门店必填。';

                    $flag = true;

                }

            }



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

                            $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );

                            $false_msg .='该门店未给此商品授权。';

                            $check_flag = false;

                        }

                    }else{

                        $this->common_function->wrong_cell ( $objPHPExcel, "G{$i}" );

                        $false_msg .='不存在该门店。';

                        $check_flag = false;

                    }

                }else{

                    if(in_array($excel['brand_id'], $auth_brand)){

                        $excel ['store_id'] = $condition['store_id'];

                    }else{

                        $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );

                        $false_msg .='该门店未给此商品授权。';

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

                        if(!empty($excel ['stocks_price'])){

                            $update_data['stocks_price'] = $excel['stocks_price'];

                        }

                        if(!empty($excel['stocks_bar_code'])){

                            $update_data['stocks_bar_code'] = $excel['stocks_bar_code'];

                        }

                        $this->db->update('store_stocks_amount',$update_data,array('ssa_id'=>$check_amount['ssa_id']));

                    }else{

                        $stock_price = $this->db->select('goods_ea_id,size_note,stocks_bar_code,color,goods_id,stocks_price,stocks_marketprice,color_remark')->where('size',$excel ['size'])

                            ->where('stocks_sku',$excel ['stocks_sn'])->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();

                        if(!empty($stock_price)){

                            $excel['stocks_marketprice'] = $stock_price['stocks_marketprice'];

                            if(empty($excel ['stocks_price'])){

                                $excel['stocks_price'] = $stock_price['stocks_price'];

                            }

                            if(empty($excel ['stocks_bar_code'])){

                                $excel['stocks_bar_code'] = $stock_price['stocks_bar_code'];

                            }//'stocks_marketprice'=>$excel['stocks_marketprice'],

                            $this->db->insert('store_stocks_amount',array(

                                'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$stock_price ['color'],

                                'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$stock_price['color_remark'],

                                'stocks_sn'=>$excel ['stocks_sn'],'size'=>$excel ['size'],'ssa_store_id'=>$excel ['store_id'],

                                'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$stock_price['goods_ea_id'],'goods_size_remark'=>$stock_price['size_note'],

                                'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$stock_price['goods_id']

                            ));

                        }else{

                            $stock_price = $this->db->select('goods_ea_id,stocks_bar_code,color,goods_id,stocks_price,stocks_marketprice,color_remark')

                                ->where('stocks_sku',$excel ['stocks_sn'])->where(" (size is null or size='')")->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();

                            $excel['stocks_marketprice'] = $stock_price['stocks_marketprice'];

                            if(empty($excel ['stocks_price'])){

                                $excel['stocks_price'] = $stock_price['stocks_price'];

                            }

                            if(empty($excel ['stocks_bar_code'])){

                                $excel['stocks_bar_code'] = $stock_price['stocks_bar_code'];

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

                    echo "<script language='javascript'>" .

                        '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".

                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .

                        "location.href = '#anchor';" .

                        "</script>";

                    unset($excel);

                    $delete_row [] = $i; // 记录插入成功的当前行



                }else{

                    $is_download = true;

                    $objPHPExcel->getActiveSheet()->setCellValue("{$error_col}{$i}",$false_msg);

                    $objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->setFillType ( PHPExcel_Style_Fill::FILL_SOLID );

                    $objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->getStartColor ()->setARGB ( 'FFFF0000' );

                    $error_num++;

                    echo "<script language='javascript'>" .

                        '$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".

                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .

                        "location.href = '#anchor';" .

                        "</script>";

                    unset($excel);

                }

            } else { // 有错误的EXCEL行

                $is_download = true;

                $objPHPExcel->getActiveSheet()->setCellValue("{$error_col}{$i}",$false_msg);

                $objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->setFillType ( PHPExcel_Style_Fill::FILL_SOLID );

                $objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->getStartColor ()->setARGB ( 'FFFF0000' );

                $error_num++;

                echo "<script language='javascript'>" .

                    '$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".

                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .

                    "location.href = '#anchor';" .

                    "</script>";

                unset($excel);

            }

            ob_end_flush();

            ob_flush();

            flush();

            if ($now_run % 100 == 0){

                sleep(1);

            }

        }

        ob_clean();

        ob_start();

        echo "<script language='javascript'>" .

            '$("#box").append("'."<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:"."[".date('H:i:s')."]，导入成功，正在生成错误列表excel，请稍等。。。"."</p>\");".

            "</script>";

        ob_end_flush();

        ob_flush();

        flush();

        $delete_row = array_reverse ( $delete_row );

        foreach ( $delete_row as $v ) {

            $objPHPExcel->getActiveSheet ()->removeRow ( $v );

        }



        // 删除原EXCEL文件

        if (file_exists ( $excelpath )) {

            unlink ( $excelpath );

        }

        // 如有错误下载错误的文件

        if ($is_download) { // 存在格式不成功excel，下载

            $objPHPExcel->getActiveSheet()->setCellValue("{$error_col}1",'错误信息');

            $filenames = 'goods_import_error' . date ( 'YmdHis' );

            $filename = ROOTPATH.'data/excel/'.$filenames.'.xlsx';

            $filename = str_replace('\\', '/', trim($filename));

            ob_end_clean ();

            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

            $objWriter->save ($filename);

            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $filenames .'.xlsx'));

            echo "<script language='javascript'>" .

                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".

                "location.href = '#anchor';" .

                '$(".btnr").click();' .

                '$("#game_over").append("'."<p>导入".($all_num-1)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".

                "</script>";

        }else{

            echo "<script language='javascript'>" .

                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".

                "location.href = '#anchor';" .

                '$(".btnr").click();' .

                '$("#game_over").append("'."<p>导入".($all_num-1)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".

                "</script>";

        }

        //@unlink($excelpath);

        $this->common_function->shop_admin_log('门店商品库存导入', 'import', '门店商品管理');

        exit();

    }



}