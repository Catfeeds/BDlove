<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends CI_Controller {
  
	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
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
	    $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial,sb.brand_class,sb.brand_pic,sb.brand_sort,sb.brand_recommend,sb.class_id,sb.show_type');
	    $this->db->from('shop_brand as sb');
	    $this->db->order_by('brand_initial');
	    $brands = $this->db->get()->result_array();
	    $area = $this->common_function->get_area_info();
	    $this->smarty->assign('brands',$brands);
	    $this->smarty->assign('area',$area);
		$this->smarty->display ('store_management.html');
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
		$store_cate = isset($_GET['store_cate'])?trim($_GET['store_cate']):'';
		//$store_type = isset($_GET['store_type'])?trim($_GET['store_type']):'';
		$store_province = isset($_GET['store_province'])?trim($_GET['store_province']):'';
		$store_city = isset($_GET['store_city'])?trim($_GET['store_city']):'';
		$store_area = isset($_GET['store_area'])?trim($_GET['store_area']):'';
		$brand_code = isset($_GET['brand_code'])?$_GET['brand_code']:'';
		$where = 'ous_type=1';
		if(!empty($op)&&$op=='stop'){
		    $where .=" and store_state!=1 ";
		}else{
		    $where .=" and store_state=1 ";
		}
		if(!empty($store_name)){
		    $where .=" and store_name like '%{$store_name}%' ";
		}
		if(!empty($store_cate)){
		    $where .=" and ous_cate = $store_cate ";
		}
		/*if(!empty($store_type)){
		    $where .=" and ous_type = $store_type ";
		}*/
		if(!empty($store_area)){
		    $where .=" and area_id = $store_area ";
		}elseif(!empty($store_city)){
		    $where .=" and city_id = $store_city ";
		}elseif(!empty($store_province)){
		    $where .=" and province_id = $store_province ";
		}
		if(!empty($brand_code)){
		    'SELECT a0.store_id FROM jk_store_attr_brands a0 INNER JOIN jk_store_attr_brands b0 on 
		        b0.store_id=a0.store_id WHERE a0.brand_id =80 and b0.brand_id=79 ';
		    $sql = "";
		    $sql_where = '';
		    foreach ($brand_code as $k=>$v){
		        if($k>=1){
		            $sql .=" INNER JOIN ".$this->db->dbprefix('store_attr_brands')." as b_$k on b_$k.store_id=a.store_id ";
		            $sql_where .= " and b_$k.brand_id=".$v;
		        }else{
		            $sql .= " select group_concat(a.store_id) as brand_store_id from ".$this->db->dbprefix('store_attr_brands')." as a ";
		            $sql_where .= ' a.brand_id='.$v;
		        }
		        
		    }
		    $sql .=' where '.$sql_where;
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
	    //$store_type = array('1'=>'加盟店','2'=>'直营店','3'=>'旗舰店','4'=>'商场超市店',);
	    //$store_cate = array('1'=>'线上','2'=>'线下','3'=>'线上线下店',);
	    foreach($rows as $row){
	        $xml .= "<row id='".$row['store_id']."'>";
	        $store_state = ($row['store_state']==1)?'暂停营业':'开启营业';
	        $store_data = json_encode(array('store_id'=>$row['store_id'],'state'=>$row['store_state'],'name'=>$row['store_name']));
	        $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['store_id'] .",".json_encode($row['store_name']) .")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                         <ul>
    		                <li><a onclick=fg_edit(" .$row['store_id'] . ")>编辑店铺</a></li>
    		                <li><a onclick='update_ad_managements(" . $row['store_id'] .",".json_encode($row['store_name']) .")'>".$store_state."</a></li>
    	                    <li><a onclick=call_code(". $row['store_id'] .")>下载二维码</a></li>
    	                    <li><a href='store_of_goods?op=edit&id={$row['store_id']}'>商品管理</a></li>
    	                    <li><a href='store_of_shopping_guide?op=edit&id={$row['store_id']}'>导购管理</a></li>";
            $xml .= "</ul></span>]]></cell>";
            $logo = base_url($row['ous_logo']);
            if(!empty($row['ous_logo'])&&file_exists(ROOTPATH.$row['ous_logo'])){
                $logo = base_url($row['ous_logo']);
            }else{
                $logo = $default_pic;
            }
            $xml .= '<cell><![CDATA[<i class="fa fa-photo" aria-hidden="true" data-geo="<img src=\''.$logo.'\'>"></i>]]></cell>';
	        $xml .= "<cell><![CDATA[<span title='{$row['store_name']}'>".$row['store_name']."</span>]]></cell>";
	        $spg_num = $this->db->select('count(1) as num')->where('spg_store_id',$row['store_id'])->get('store_shopping_guide')->row('num');
	        $xml .= "<cell><![CDATA[".$spg_num."]]></cell>";
	        $xml .= "<cell><![CDATA[".($row['ous_cate']==1?'线上':($row['ous_cate']==2?'线下':'线上线下'))."]]></cell>";
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
	        $str = "<span>线下：".$order_take_percentage['offline']."</span>".
	   	        "<span>平台：".$order_take_percentage['system']."</span>".
	   	        "<span>分销：".$order_take_percentage['agent']."</span>".
	   	        "<span>微商：".$order_take_percentage['online']."</span>";
	        $xml .= "<cell><![CDATA[".$str."]]></cell>";
	        $xml .= "<cell><![CDATA[".$row['ous_tel']."]]></cell>";
	        $xml .= "<cell><![CDATA[".$row['ous_address']."]]></cell>";
	        
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
	    
	    $brands = $this->db->select('brand_id,brand_name')->get('shop_brand')->result_array();
	    $this->smarty->assign('brands',$brands);
	    $area_data = $this->shop->get_area_info();
	    $this->smarty->assign('area_data',$area_data);
	    $this->smarty->assign('area_datajs',json_encode($area_data));
		$this->smarty->display ('store_edit.html');
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
	    $store['store_name'] = isset($_POST['class_name'])?trim($_POST['class_name']):'';
	    $store['province_id'] = isset($_POST['class_province'])?trim($_POST['class_province']):'';
	    $store['city_id'] = isset($_POST['class_city'])?trim($_POST['class_city']):'';
	    $store['area_id'] = isset($_POST['class_area'])?trim($_POST['class_area']):'';
	    $store['ous_address'] = isset($_POST['class_address'])?trim($_POST['class_address']):'';
	    $store['ous_tel'] = isset($_POST['class_mobile'])?trim($_POST['class_mobile']):'';
	   /* $store['ous_type'] = isset($_POST['class_type'])?trim($_POST['class_type']):'';*/
	    $store['ous_cate'] = isset($_POST['store_cate'])?trim($_POST['store_cate']):'';
	    $store['ous_business_hours'] = isset($_POST['class_time'])?trim($_POST['class_time']):'';
	    $store['ous_dec'] = isset($_POST['class_detail'])?trim($_POST['class_detail']):'';
	    $store['ous_out_sn'] = isset($_POST['class_code'])?trim($_POST['class_code']):'';
	    //$store['store_share'] = isset($_POST['store_share'])?trim($_POST['store_share']):'';        //是否是共享店铺
	    //$store['store_share_num'] = isset($_POST['store_share_num'])?trim($_POST['store_share_num']):'';    //限制店铺数量
	    $brand_auth = isset($_POST['class_brand_auth'])?$_POST['class_brand_auth']:'';
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
                $store['ous_type']=1;
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
	        
	        $del_brand_auth = $this->db->select('group_concat(brand_id) as brands')->where('store_id',$storeId)->where_not_in('brand_id',$brand_auth)->get('store_attr_brands')->row('brands');
	        //print_r($del_brand_auth);die;
	        if(!empty($del_brand_auth)){
	            
	            $del_stock = $this->db->select('group_concat(s.ssa_id) as ssa_idr')->from('store_stocks_amount as s')
	            ->join('shop_goods g','g.goods_id=s.goods_id','left')
	            ->where("g.brand_id IN ($del_brand_auth)")->where('s.ssa_store_id',$storeId)->get()->row('ssa_idr'); 
	            if(!empty($del_stock)){
	                /* $del_arr = array();
	                $del_stock = explode(',',$del_stock);
	                foreach ($del_stock as $k=>$v){
	                    $del_arr[$k]['ssa_id'] = $v;
	                    $del_arr[$k]['amount'] = 0;
	                } */
	                //$this->db->update_batch('store_stocks_amount', $del_arr, 'ssa_id');
	                $this->db->query("update ".$this->db->dbprefix('store_stocks_amount')." set amount=0 where ssa_id in ($del_stock)");
	                //$this->db->where_in("ssa_id",explode(',',$del_stock))->update('store_stocks_amount',array('amount'=>0));
	            }
	            $this->db->where("brand_id IN ($del_brand_auth)")->where('store_id',$storeId)->delete('store_attr_brands');
	            /* $clear_sql = $this->db->query("update ".$this->db->dbprefix('store_stocks_amount')." set amount=0 where ssa_store_id in (
	             select  s.ssa_id from ".$this->db->dbprefix('store_stocks_amount')." as s left join ".
	             $this->db->dbprefix('shop_goods')." as g on g.goods_id=s.goods_id where g.brand_id IN ($del_brand_auth) and 
	             s.ssa_store_id=$storeId)"); */
	            //print_r($del_stock);die;
                //$this->db->query($clear_sql);
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
	            
	            $this->db->insert_batch('store_attr_brands', $brand_auth_arr); 
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
	/*店铺商品*/
	public function store_of_goods(){
        $this->common_function->shop_admin_priv("store_management");//权限
	    //print_r($_GET);exit;
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
	       $this->smarty->display ('store_of_goods.html');
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
	    }else{
	        if($date_from){
	            $date_from = strtotime($date_from);
	            $where .=" and sa.update_time>='{$date_from}' ";
	        }
	        if($date_to){
	            $date_to = strtotime($date_to);
	            $where .=" and sa.update_time<='{$date_to}' ";
	        }
	        if($brand_code){
	            $brand_id = join(',',$brand_code);
	            $where .=" and sg.brand_id IN ($brand_id) ";
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
	                $where .= " 1=2 ";
	            }else{
	                $where .=" and sg.brand_id IN ($brands) ";
	            }
	        }
	        if($stock_sn){
	            $where .=" and sga.stocks_sku like '%{$stock_sn}%' ";
	        }
	        if($stock_name){
	            $where .=" and sg.goods_name like '%{$stock_name}%' ";
	        }
	        $rows = $this->db->select('sa.ssa_id,sga.goods_id,sga.stocks_price,sga.stocks_marketprice,sga.stocks_bar_code,sga.size,sga.stocks_sku')
	        ->from('shop_goods_extend_attr as sga')
	        ->join('shop_goods as sg','sg.goods_id=sga.goods_id')
	        ->join('store_stocks_amount as sa','sa.stocks_sn=sga.stocks_sku and sa.size=sga.size and sa.ssa_store_id='.$store_id,'left')
	        ->where($where)->get()->result_array();
	        //print_r($rows);exit;
	        foreach ($rows as $v){
	            $arr = array();
	            $arr['amount'] = $amount;
	            $arr['update_time'] = $time;
	            $arr['update_user_name'] = $username;
	            $arr['update_user_id'] = $userid;
	            $arr['update_user_type'] = 1;
	            if($v['ssa_id']){
	                $this->db->where('ssa_id',$v['ssa_id'])->update('store_stocks_amount',$arr);
	            }else{
	                $arr['ssa_store_id'] = $store_id;
	                $arr['goods_id'] = $v['goods_id'];
	                $arr['stocks_price'] = $v['stocks_price'];
	                //$arr['stocks_marketprice'] = $v['stocks_marketprice'];
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
	    		$where .=" and (g.stock_amount is null or g.stock_amount='' or g.stock_amount=0 )";
	    	}elseif($amount==1){
	    		$where .=" and g.stock_amount>0";
	    	}
	    }
	    if(!empty($store_id)){
	        $brand_code_arr = $this->db->select('s.brand_id,s.brand_name')->from('store_attr_brands as sb')
	       ->join('shop_brand as s','s.brand_id=sb.brand_id')->where('sb.store_id',$store_id)
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
        $rows = $this->db->select('g.goods_id,g.goods_spu,g.goods_name,g.gc_id,g.gc_name,g.brand_id,g.brand_name,g.goods_price,
            g.goods_marketprice,g.goods_image,g.goods_addtime,g.stock_amount')
            ->from('v_store_stock g')
            ->where('g.ssa_store_id',$store_id)
            ->where($where)
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
                ' onerror="this.src=\''.$head_portrait.'\'" '.
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
	    header("location:".base_url("/data/excel_tp/storeGoods.csv"));
	}
	/*库存导入格式*/
	public function storeGoodsSku_tp(){
	    header("location:".base_url("/data/excel_tp/storeGoodsSku.csv"));
	}
	/*库存导入格式*/
	public function storeGoodsBarcode_tp(){
	    header("location:".base_url("/data/excel_tp/storeGoodsBarcode.csv"));
	}
	
	/*库存导入格式*/
	public function storeGoods_tp_price(){
	    header("location:".base_url("/data/excel_tp/storeGoods_price.csv"));
	}
	/*库存导入格式*/
	public function storeGoodsSku_tp_price(){
	    header("location:".base_url("/data/excel_tp/storeGoodsSku_price.csv"));
	}
	/*库存导入格式*/
	public function storeGoodsBarcode_tp_price(){
	    header("location:".base_url("/data/excel_tp/storeGoodsBarcode_price.csv"));
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
	        $excel['stocks_spu'] = strtoupper($excel['stocks_spu']);
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
	        $excel['size'] = strtoupper($excel['size']);
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
	    //print_r($condition);die;
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
	        $excel['stocks_sn'] = strtoupper($excel['stocks_sn']);
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
	        $excel['size'] = strtoupper($excel['size']);
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
	/*店铺导购导入*/
	public function storeGuide_import(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
	    // EXCEL 文件上传
	    include VIEWPATH.'file_handle.html';
	    $condition = $this->input->get();
	    set_time_limit(0);
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
	    if(isset($condition['store_id'])){
	        $error_col = 'E';
	    }else{
	        $error_col = 'F';
	    }
	    
	    for($i = 2; $i <= $rows; $i ++) {
	        $flag = false;
	        $false_msg ='';
	        $now_run++;
	        $percent = intval(($now_run/$rows)*100);
	        ob_clean();
	        ob_start();
	        // 导购昵称<必填>
	        $excel ['spg_nike_name'] = $objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ();
	        $excel ['spg_nike_name'] = trim($excel ['spg_nike_name']);
	        if (empty( $excel ['spg_nike_name'] )) {
	            $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );
	            $false_msg .='昵称必填。';
	            $flag = true;
	        }
	        //导购姓名<必填>
	        $excel ['spg_name'] = $objPHPExcel->getActiveSheet ()->getCell ( "B{$i}" )->getValue ();
	        $excel ['spg_name'] = trim($excel ['spg_name']);
	        if (empty( $excel ['spg_name'] )) {
	            $this->common_function->wrong_cell ( $objPHPExcel, "B{$i}" );
	            $false_msg .='姓名必填。';
	            $flag = true;
	        }
	        //导购手机号<必填>
	        $excel ['spg_tel'] = $objPHPExcel->getActiveSheet ()->getCell ( "C{$i}" )->getValue ();
	        $excel ['spg_tel'] = trim($excel ['spg_tel']);
	        if (empty ( $excel ['spg_tel'])) {
	            $this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );
	            $false_msg .='手机号必填。';
	            $flag = true;
	        }else{
	            if(!is_mobile($excel ['spg_tel'])){
	                $this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );
	                $false_msg .='手机号格式不正确。';
	                $flag = true;
	            }
	        }
	        if(!isset($condition['store_id'])){
	            //导购所属门店<必填>
	            $excel ['store_code'] = $objPHPExcel->getActiveSheet ()->getCell ( "D{$i}" )->getValue ();
	            $excel ['store_code'] = trim($excel ['store_code']);
	            if (empty ( $excel ['store_code'])) {
	                $this->common_function->wrong_cell ( $objPHPExcel, "D{$i}" );
	                $false_msg .='所属门店必填。';
	                $flag = true;
	            }
	            //导购职位
	            $excel ['spg_role'] = $objPHPExcel->getActiveSheet ()->getCell ( "E{$i}" )->getValue ();
	            $excel ['spg_role'] = trim($excel ['spg_role']);
	            if (empty( $excel ['spg_role'] )) {
	                $excel ['spg_role'] = 1;
	            }else{
	                if($excel ['spg_role']=='店长'){
	                    $excel ['spg_role'] = 2;
	                }elseif($excel ['spg_role']=='店员'){
	                    $excel ['spg_role'] = 1;
	                }else{
	                    $this->common_function->wrong_cell ( $objPHPExcel, "E{$i}" );
	                    $false_msg .='不存在该角色。';
	                    $flag = true;
	                }
	            }
	        }else{
	            //导购职位
	            $excel ['spg_role'] = $objPHPExcel->getActiveSheet ()->getCell ( "D{$i}" )->getValue ();
	            $excel ['spg_role'] = trim($excel ['spg_role']);
	            if (empty( $excel ['spg_role'] )) {
	                $excel ['spg_role'] = 1;
	            }else{
	                if($excel ['spg_role']=='店长'){
	                    $excel ['spg_role'] = 2;
	                }elseif($excel ['spg_role']=='店员'){
	                    $excel ['spg_role'] = 1;
	                }else{
	                    $this->common_function->wrong_cell ( $objPHPExcel, "D{$i}" );
	                    $false_msg .='不存在该角色。';
	                    $flag = true;
	                }
	            }
	        }

	        if (! $flag) {
	            $check_flag = true;
	            if(!isset($condition['store_id'])){
	                $check_name = $this->db->select('store_id')->where('ous_out_sn',$excel ['store_code'])->get('store')->row('store_id');
	                if($check_name){
	                    $excel ['store_id'] = $check_name;
	                }else{
	                    $this->common_function->wrong_cell ( $objPHPExcel, "D{$i}" );
	                    $false_msg .='不存在该门店。';
	                    $check_flag = false;
	                }
	            }else{
	                $excel ['store_id'] = $condition['store_id'];
	            }
	            if($excel ['spg_role']==2){
	                $role_check = $this->db->select('spg_tel')->where('spg_store_id',$excel ['store_id'])
	                ->where('role_type',2)->get('store_shopping_guide')->row('spg_tel');
	                if($role_check!=$excel ['spg_tel']){
	                    if(isset($condition['store_id'])){
	                        $this->common_function->wrong_cell ( $objPHPExcel, "D{$i}" );
	                        $false_msg .='此门店已有店长。';
	                        $check_flag = false;
	                    }else{
	                        $this->common_function->wrong_cell ( $objPHPExcel, "E{$i}" );
	                        $false_msg .='此门店已有店长。';
	                        $check_flag = false;
	                    }   
	                }
	            }
	            if($check_flag){
	                $check_guide = $this->db->select('spg_id')->where('spg_tel',$excel ['spg_tel'])
	                ->get('store_shopping_guide')->row('spg_id');
	                if($check_guide){
	                    $this->db->update('store_shopping_guide',array(
	                        'spg_nike_name'=>$excel['spg_nike_name'],'spg_name'=>$excel['spg_name'],'spg_tel'=>$excel['spg_tel'],
	                        'spg_store_id'=>$excel['store_id'],'role_type'=>$excel['spg_role'],
	                    ),array('spg_id'=>$check_guide));
	                }else{
	                    $this->db->insert('store_shopping_guide',array(
	                        'spg_nike_name'=>$excel['spg_nike_name'],'spg_name'=>$excel['spg_name'],'spg_tel'=>$excel['spg_tel'],
	                        'spg_store_id'=>$excel['store_id'],'role_type'=>$excel['spg_role'],
	                    ));
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
	        $filenames = 'guide_import_error' . date ( 'YmdHis' );
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
	    $this->common_function->shop_admin_log('导购导入', 'import', '导购管理');
	    exit();
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
	/*店铺通知*/
	public function store_of_notice_setting(){
	    $store_id = isset($_GET['id'])?trim($_GET['id']):false;
	    $op = isset($_GET['op'])?trim($_GET['op']):false;
	    if($op&&$op=='edit'&&$store_id){
	        $store_data = array();
	        $store_data = $this->db->select('store_id,store_name,warn_pick_up')->where('store_id',$store_id)->get('store')->row_array();
	        $this->smarty->assign('store_data',$store_data);
	        $this->smarty->display ('store_of_notice_setting.html');
	    }
	   
	}
	/*店铺通知设置*/
	public function store_notice_set(){
        $this->common_function->shop_admin_priv("store_management");//权限
	   //print_r($_POST);
	   $store_arayacak = isset($_POST['store_arayacak'])?trim($_POST['store_arayacak']):1;
	   $store_bespoke = isset($_POST['store_bespoke'])?trim($_POST['store_bespoke']):1;
	   $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
	   $store_name = isset($_POST['store_name'])?trim($_POST['store_name']):'';
	   if($store_id){
	       $this->db->update('store',array('warn_pick_up'=>$store_arayacak),array('store_id'=>$store_id));
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
	        $this->common_function->shop_admin_log('门店‘'.$store_name.'’提醒通知', 'edit', '门店设置');
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
	/*导购离职*/
	public function del_guide(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
	    $id = isset($_POST['id'])?trim($_POST['id']):'';
	    $result = array('state'=>false,'msg'=>'数据错误');
	    if($id){
	        if($this->db->where("spg_id in (".$id.")")->update('store_shopping_guide',array("spg_store_id"=>''))){
	            $result = array('state'=>true,'msg'=>'离职成功');
	        };
	    }
	    echo json_encode($result);exit;
	    //print_r($_POST);exit;
	}
	/*导购管理*/
	public function store_shopping_guide(){
        $this->common_function->shop_admin_priv("store_shopping_guide");//权限
	    //print_r(date('Ymd His',1489994945));print_r(date('Ymd His',1489990379));exit;
	    
		$this->smarty->display ('store_shopping_guide.html');
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
	    $where = " st.ous_type='1' ";
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
		$where = "s.ous_type='1' ";
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
	        $distribution_point=(empty($row['distribution_point']) || $row['distribution_point']==0)?'无':$row['distribution_point'];
            $xml .= "<cell><![CDATA[".$distribution_point."]]></cell>";
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
            /*}*/
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
	    $store = $this->db->select('store_id,store_name')->where('store_state',1)->where('ous_type',1)->get('store')->result_array();
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
	/*查找店铺*/
	public function select_store(){
	    $spg_id = isset($_POST['id'])?trim($_POST['id']):'';
	    if($spg_id){
	        $spg_store = $this->db->select('spg_store_id')->where('spg_id',$spg_id)->get('store_shopping_guide')->row('spg_store_id');
	        $data = $this->db->select('store_id,store_name')->where('store_state',1)->where('ous_type',1)->where("store_id!='".$spg_store."'")->get('store')->result_array();
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
	
	
	
	
	/*店铺装修-门店列表*/
	public function store_decoration(){
        $this->common_function->shop_admin_priv("store_decoration");//权限
		$this->smarty->display ('store_decoration.html');
	}
    
    /*ajax获取门店列表*/
	public function get_store_decoration(){
        //print_r($_POST);print_r($_GET);die;
	    $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;
        $start = ($page-1)*$rp;
        
        $this->db->select('st.store_id,st.ous_logo,st.store_name,st.store_state,st.sdt_id,sd.sdt_name');
        $this->db->from('store as st');
        $this->db->join('store_decorate_tpl as sd','sd.sdt_id=st.sdt_id','left');
        $this->db->where('st.store_state',1);
        if ($qtype && $query) {
            if ($qtype == 'sdt_name') {
                $this->db->like('sd.sdt_name', $query);
            }else{
                $this->db->like('st.store_name', $query);
            }
        }
        
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
        $this->db->limit($rp, $start);
        $this->db->order_by('st.store_id',"DESC");
        $rows = $this->db->get()->result_array();
        
		$default_pic = PLUGIN.'data/images/default_store_logo.jpg';
		header("Content-type: text/xml");
	    $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	    $xml .= "<rows>";
	    $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
	    foreach($rows as $row){
	        $logo = base_url($row['ous_logo']);
	        if(!empty($row['ous_logo'])&&file_exists(ROOTPATH.$row['ous_logo'])){
	            $logo = base_url($row['ous_logo']);
	        }else{
	            $logo = $default_pic;
	        }
	        if(empty($row['sdt_name'])){
	            $row_sdt_name = "暂未启用";
	        }else{
	            $row_sdt_name = $row['sdt_name'];
	        }
	        
	        $xml .= "<row id='".$row['store_id']."'>";
	        $xml .= '<cell><![CDATA[<img src="'.$logo.'" class="user-avatar" onerror="this.src=\''.$logo.'" style="border-radius:50%;height:80%;"'.' data-geo="<img src=\''.$logo.'\' width=300px >">]]></cell>';
	        
            $xml .= "<cell><![CDATA[".$row['store_name']."]]></cell>";
	        $xml .= "<cell><![CDATA[".$row_sdt_name."]]></cell>";
	        $xml .= "</row>";
	    }
	    $xml .= "</rows>";
	    echo $xml;
	}
	

	
	/*店铺装修模版管理*/
	public function store_decoration_template(){
        $this->common_function->shop_admin_priv("store_decoration");//权限
		$this->smarty->display ('store_decoration_template.html');
	}
    
    
    /*获取店铺装修模版列表*/
	public function get_store_decoration_template(){
        //$this->common_function->shop_admin_priv("store_decoration");//权限
	    $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	    $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
	    
	    $start = ($page - 1) * $rp;
	    
	    $this->db->from ('store_decorate_tpl');
	    $db = clone($this->db);
	    $total = $this->db->count_all_results ();
	    $this->db->select ('sdt_id,sdt_name,store_id');
	    $this->db = $db;
	    $this->db->limit ($rp, $start);
	    $this->db->order_by ('sdt_id', 'DESC');
	    $rows = $this->db->get ()->result_array ();
	    header("Content-type: text/xml");
	    $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	    $xml .= "<rows>";
	    $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
	    foreach($rows as $row){
	        $num = $this->db->select('store_id,sdt_id')->where("sdt_id ='".$row['sdt_id']."'")->get('store')->result_array();
	        $row['num'] = count($num);
	        if($row['store_id']){
	            $store_name = $this->db->select('store_name')->from('store')->where('store_id',$row['store_id'])->get()->row('store_name');
	            if(empty($store_name) || $store_name = null){
	                $store_name = '--';
	            }
	        }else{
	            $store_name = '系统';
	        }
	        
	        
	        
	        
	        $xml .= "<row id='".$row['sdt_id']."'>";
	        if(trim($row['sdt_name'])=='Default'){
	            $xml .= "<cell><![CDATA[<a class='btn blue' onclick='fg_edit(" . $row['sdt_id'] . ")'><i class='fa fa-pencil-square-o'></i></i>编辑</a>]]></cell>";
	        }else{
	            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['sdt_id'] .",".json_encode($row['sdt_name']). ")'><i class='fa fa-trash-o'></i>删除</a><a class='btn blue' onclick='fg_edit(" . $row['sdt_id'] . ")'><i class='fa fa-pencil-square-o'></i></i>编辑</a>]]></cell>";
	        }
	        $xml .= "<cell><![CDATA[".$row['sdt_name']."]]></cell>";
	        $xml .= "<cell><![CDATA[".$row['num']."]]></cell>";
	        $xml .= "<cell><![CDATA[".$store_name."]]></cell>";
	        $xml .= "</row>";
	    }
	    $xml .= "</rows>";
	    echo $xml;
	    exit;
	 
	}
	
	
	/*店铺装修模版删除*/
	public function store_decoration_del(){
	    //$this->common_function->shop_admin_priv("store_management");//权限
	    $result=array("state"=>false,'msg'=>'删除失败,请稍后再试!');
	    $id = isset($_POST['id'])?trim($_POST['id']):'';
	    if($id){
	        $this->db->trans_off(); //禁用事务
	        $this->db->trans_start(); //开启事务
	        $this->db->where("sdt_id IN ($id)")->delete('store_decorate_tpl');
	        $this->db->where("sdt_id IN ($id)")->delete('store_decoration_block');
	        $this->db->trans_complete(); //事务完成
	        $this->db->trans_off(); //禁用事务
	        $result['state'] = true;
	        $result['msg'] = "已成功删除模板!";
	    }
	    echo json_encode($result);exit;
	}
	
	
	/*店铺装修模版-编辑*/
	public function store_decoration_edit(){
	    //$this->common_function->shop_admin_priv("store_decoration");//权限
	    $sdt_id = isset($_GET['id']) && !empty($_GET['id']) ?$_GET['id'] :false;
	    if($sdt_id){
	        //获取所有商品分类
	        $cate_arr = $this->goods_model->get_cate_by_parent_id(0);
	        $cate_option = $this->goods_model->get_cate_array_to_option($cate_arr); //分类选项
	        $this->smarty->assign ('cate_option', $cate_option);
	         
	        //获取所有商品品牌
	        $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial');
	        $this->db->from('shop_brand as sb');
	        $this->db->where("sb.brand_name is not NULL AND sb.brand_name != ''");
	        $this->db->order_by('brand_initial');
	        $brands_info = $this->db->get()->result_array();
	        $brands_info = $this->goods_model->get_brands_array_to_option($brands_info);
	        $this->smarty->assign ('brands_info', $brands_info);
	        $this->smarty->assign ('temples', TEMPLE);
	        $this->smarty->assign ('defaultMid', $sdt_id);
	        
	        
	        $sdt_name = $this->db->select('sdt_name')->from('store_decorate_tpl')->where('sdt_id',$sdt_id)->get()->row('sdt_name');
	        $this->smarty->assign ('temples_name', $sdt_name);
	        
	        
	        //查询模块内容
	        $this->db->select('sdb_id,sdt_id,block_code,block_content,block_sort');
	        $this->db->from('store_decoration_block');
	        $this->db->where("sdt_id",$sdt_id);
	        $this->db->order_by('block_sort','ASC');
	        $block_content = $this->db->get()->result_array();
	        $str='';
	        $editstr ='<div class="ui_mask_wrapper  newssave" style="">
                    <div class="ui_mask">
                        <a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>
                        <a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>
                        <a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>
                    </div>
                </div>';
	        $topinfo=array();
	        $topinfo['m1000']=0;
	        $topinfo['m1011']=0;
	        $topinfo['m1012']=0;
	        foreach ($block_content as $key=>$val){
	            if(!empty($val['block_content'])){
	                $block_content[$key]['block_content']=unserialize($val['block_content']);
	            }
	     
	           
	           if($val['block_code']=='m1000'){
	               $topinfo['m1000']=1;
	               $str.='<div class="wx_mod ui-sortable-handle" modid="1000" id="m1000">
                            <div class="bd">
                                <div class="v3_shop_bar">
                                    <div class="v3_shop_header mui-flex">
                                        <div class="category_menu cell fixed">
                                            <span class="more category_menu_icon"></span>
                                        </div>
                                        <div class="mobile_search cell">
                                            <div class="m_search_wrap">
                                                <input type="text" name="" id="" class="search_input" placeholder="搜索店内商品">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
	           }elseif($val['block_code']=='m1011'){
	               $topinfo['m1011']=1;
	               $str.='<div class="wx_mod ui-sortable-handle" modid="1011" id="m1011">
        	               <div class="title" style="padding: 10px; display: none;">店招模块</div>
        	               <div class="bd" style="display: block;">
        	               <a href="javascript:;" class="db"><img src="http://[::1]/yunjuke/application/admin/views/images/home_banner.jpg" class="wx-top-banner"></a>
        	               </div>
        	               </div>';
	           }elseif($val['block_code']=='m1012'){
	               $topinfo['m1012']=1;
	               $str.='<div class="wx_mod ui-sortable-handle" modid="1012" id="m1012">
        	               <div class="title" style="padding: 10px; display: none;">店铺信息模块</div>
        	               <div class="bd" style="display: block;">
        	               <div class="wx-shop-info">
        	               <div class="info-l">
        	               <img class="shop-logo" src="http://[::1]/yunjuke/application/admin/views/images/iconfont-stroe.png">
        	               <h2>射洪  品牌店 </h2>
        	               <p>导购 某某某 正在为您服务</p>
        	               </div>
        	               <div class="info-r">
        	               <span class="icon-yun shop-qrcode" style="display: block;"></span>
        	               </div>
        	               </div>
        	               </div>
        	               </div>';
	           }elseif($val['block_code']=='m1001'){
	               $strs = '';
	               if(isset($block_content[$key]['block_content']['content']) && !empty($block_content[$key]['block_content']['content'])){
	                   foreach ($block_content[$key]['block_content']['content'] as $k=>$v){
	                       
	                       $strs .= '<a href="'.$v['href'].'" class="swiper-slide">
                                      <div class="shop_slider_img" style="height:'.intval(($block_content[$key]['block_content']['height'])/2).'px; background-image:url('.HEADIMAGE.$v['src'].')"></div>
                                    </a>';
	                   }
	               }
	                $str.='<div class="wx_mod sortable-item sortable-item m1001-d844" modtitle="图片轮播" modid="1001" id="m1001">
        	                    <div class="title" style="display: none;padding: 10px;">轮播广告</div>
                                <div class="bd">
                                    <div class="swiper-container" style="height: '.intval(($block_content[$key]['block_content']['height'])/2).'px;">
                                        <div class="swiper-wrapper">
                                    '.$strs.'
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>'.$editstr.'
	                     </div>';
	           }elseif($val['block_code']=='m1002'){
	                $str .= '<div class="wx_mod sortable-item sortable-item" modtitle="通栏广告" modid="1002" id="m1002">
	                    <div class="title" style="display: none;padding: 10px;">通栏广告</div>
                    <div class="bd">
                        <div class="shop_mod_pic" data-lazyload="true">
                            <a class="url" href="'.$block_content[$key]['block_content']['href'].'">
                                <img alt="图片" class="pp_init_img" data-src="'.HEADIMAGE.$block_content[$key]['block_content']['src'].'" src="'.HEADIMAGE.$block_content[$key]['block_content']['src'].'">
                            </a>
                        </div>
                    </div>'.$editstr.'
	                </div>';
	           }elseif($val['block_code']=='m1003'){
	                $strs = '';
	                if(isset($block_content[$key]['block_content']) && !empty($block_content[$key]['block_content'])){
	                    foreach ($block_content[$key]['block_content'] as $k=>$v){
	                        $strs .= '<a href="'.$v['href'].'" title="图片" class="url"><img alt="图片" class="pp_init_img" src="'.HEADIMAGE.$v['src'].'"></a>';
	                    }
	                }
	                $str .='<div class="wx_mod sortable-item sortable-item" modtitle="两栏广告" modid="1003" id="m1003">
	                    <div class="title" style="display: none;padding: 10px;">两栏广告</div>
                      <div class="bd">
                        <div class="shop_mod_pic shop_mod_pic_1" data-lazyload="true">'.$strs.'</div>
                      </div>'.$editstr.'
	                </div>';
	           }elseif($val['block_code']=='m1004'){
	               //print_r($block_content[$key]['block_content']);die;
	               $selectname ='';
	               
	               if($block_content[$key]['block_content']['type']==1){//自动推荐
	                   $this->db->select ('sg.year_to_market,sg.season_to_market,sg.sex,sg.goods_id,sg.goods_name,sg.goods_price,sg.goods_state,sg.goods_image,sg.goods_jingle,sg.gc_id,sg.brand_id,sg.goods_addtime,sg.goods_marketprice,sg.goods_tag,sg.goods_spu,sgc.gc_name,sb.brand_name');
	                   $this->db->from ('shop_goods as sg');
	                   $this->db->join ('shop_goods_class as sgc', 'sgc.gc_id = sg.gc_id', 'left');
	                   $this->db->join ('shop_brand as sb', 'sb.brand_id = sg.brand_id', 'left');
	                   $this->db->join ('shop_goods_attr_self_taxonomy as st', 'st.goods_id = sg.goods_id', 'left');
	                   $this->db->where ("(sg.goods_pos = 0 or sg.goods_pos is NULL)"); //总库商品
	                   $this->db->where ("sg.goods_state != 0"); //未删除的
	                   if(!empty($block_content[$key]['block_content']['key'])){
	                       $this->db->like('sg.goods_name',$block_content[$key]['block_content']['key']);
	                   }
	                   
	                   //以什么方式推荐
	                   if($block_content[$key]['block_content']['way']=='radio11'){//按分类
	                       $this->db->where ('sg.gc_id',$block_content[$key]['block_content']['selectid']);
	                       $selectname = $this->db->select ('gc_name')->where ('gc_id', $block_content[$key]['block_content']['selectid'])->get ('shop_goods_class')->row ('gc_name');
	                       
	                   }elseif($block_content[$key]['block_content']['way']=='radio11x'){//按自定义分类
	                       $this->db->where ('st.gstn_id',$block_content[$key]['block_content']['selectid']);
	                       $selectname = $this->db->select ('gstn_name')->where ('gstn_id', $block_content[$key]['block_content']['selectid'])->get ('shop_goods_attr_self_taxonomy')->row ('gstn_name');
	                       
	                   }elseif($block_content[$key]['block_content']['way']=='radio12'){//按品牌
	                       $this->db->where ('sg.brand_id',$block_content[$key]['block_content']['selectid']);
	                       $selectname = $this->db->select ('brand_name')->where ('brand_id', $block_content[$key]['block_content']['selectid'])->get ('shop_brand')->row ('brand_name');
	                       
	                   }elseif($block_content[$key]['block_content']['way']=='radio13'){//按新品
	                       $this->db->where ('sg.goods_tag',1);
	                       $selectname = '新品';
	                       
	                   }elseif($block_content[$key]['block_content']['way']=='radio14'){//按特价
	                       $this->db->where ('sg.goods_tag',3);
	                       $selectname = '特价';
	                   }
	                   
	                   

	                   if($block_content[$key]['block_content']['order_by'][0]=='goods_price'){//按价格排序
	                       $this->db->order_by ('sg.goods_price', $block_content[$key]['block_content']['order_by'][1]);
	                       
	                   }elseif ($block_content[$key]['block_content']['order_by'][0]=='update_time'){//按库存更新时间排序
	                       
	                       
	                   }else{//按销量排序
	                       
	                   }
	                   
	                   if(!empty($block_content[$key]['block_content']['limit'])){
	                       $this->db->limit ($block_content[$key]['block_content']['limit'], 0);
	                   }
	                   $rows = $this->db->get ()->result_array ();
                       //print_r($rows );die;
	               
	               }else{//手动推荐
	                   $rows = '';
	                  //print_r($block_content[$key]['block_content']);die;
	                   if($block_content[$key]['block_content']['shoutitle']){//是否显示标题
	                       $selectname = $block_content[$key]['block_content']['title'];
	                   }
                     if(!empty($block_content[$key]['block_content']['gooods'])){
                           $goods_id = '';
                           foreach ($block_content[$key]['block_content']['gooods'] as $k=>$v){
                               if(isset($block_content[$key]['block_content']['gooods'][$k+1])){
                                   $goods_id .= $v['goods_id'].",";
                               }else{
                                   $goods_id .= $v['goods_id'];
                               }
               
                           }
                           //print_r( $goods_id);die;
                           $this->db->select ('year_to_market,season_to_market,sex,goods_id,goods_name,goods_price,goods_state,goods_image,goods_jingle,gc_id,brand_id,goods_addtime,goods_marketprice,goods_tag,goods_spu');
                           $this->db->from ('shop_goods');
                           $this->db->where ("goods_id in (".$goods_id.")");
                           $rows = $this->db->get ()->result_array ();
                       }
                       //print_r($rows );die;
	               }
	               
	               
	               $default_pic = PLUGIN . 'data/images/' . $this->common_function->get_system_value ('default_goods_image');
	               if($selectname){
	                   $selectname ='<h2 class="shop_mod_tit">'.$selectname.'<a href="javascript:;">更多<i class="iconfont"></i></a></h2>';
	               }else{
	                   $selectname ='';
	               }
	               $goods_tag_arr = array ('' => '--', '1' => '新品', '2' => '推荐', '3' => '特价');
	               $strstr ='<div class="wx_mod sortable-item" modtitle="商品推荐" modid="1004" id="m1004">
	                      <div class="title" style="display: none;padding: 10px;">商品推荐</div>
                            <div class="bd m_recommend_bdm1004-3e6c" id="m_recommend_bdm1004-3e6c" style="display: block;">
                            '.$selectname.'
                            <div class="wx_itemlist" data-lazyload="true">
                            	<div class="shop_mod_pic_1">';
	               if($rows){
	              
	                   foreach ($rows as $row) {
	                       $span='';
	                       $goods_pic = PLUGIN . 'data/shop/album_pic/' . $row['goods_image'];
	                       if (!empty($row['goods_image']) && file_exists ($goods_pic)) {
	                           $goods_pic = GOODIMAGE . $row['goods_image'];
	                       } else {
	                           $goods_pic = $default_pic;
	                       }
	                       if($row['goods_tag']==1 || $row['goods_tag']==3 ){
	                           $span = '<span class="p-tags">'.$goods_tag_arr[$row['goods_tag']].'</span>';
	                       }
	                       $strstr .='<div class="hproduct">
                        			<p class="cover">
                        				'.$span.'
                        				<a href="javascript:;" style="background-image:url('.$goods_pic.')"></a>
                        			</p>
                        			<p class="fn"><a href="javascript:;">'.$row['goods_name'].'</a></p>
                        			<p class="prices"><strong><em>￥'.$row['goods_marketprice'].'</em><del>¥'.$row['goods_price'].'</del></strong>
                        			</p>
                        		</div>';
	                   }
	               }else{
	                   $strstr .='暂无数据';
	               }
	               $strstr.= '</div></div></div>'.$editstr.'</div>';
	               $str.= $strstr;
	           }elseif($val['block_code']=='m1005'){
	               //文本
	               if(isset($block_content[$key]['block_content']) && !empty($block_content[$key]['block_content'])){
	                   $str .= '<div class="wx_mod sortable-item sortable-item" modtitle="文本" modid="1005" id="m1005">
                	               <div class="title" style="padding: 10px; display: none;">文本</div>
                	               <div class="bd" style="display: block;">
                	               <div class="shop_mod_text">
                	                      '.$block_content[$key]['block_content'].'
                	               </div>
                	               </div>'.$editstr.'</div>';
	               }
	           }elseif($val['block_code']=='m1006'){
	               //print_r($block_content[$key]);die;
	               
	           }elseif($val['block_code']=='m1007'){
	               //print_r($block_content[$key]);die;
	               $strs = '';
	               if($block_content[$key]['block_content'] && $block_content[$key]['block_content']['content']){
	                   $arrs =  $block_content[$key]['block_content']['content'];
	                   $title = $block_content[$key]['block_content']['title'];
	                   ksort($arrs);
	                   foreach ($arrs as $k=>$v){
	                       $this->db->select ('brand_name,brand_pic');
	                       $this->db->from ('shop_brand');
	                       $this->db->where ('brand_id', $v);
	                       $brandinfo = $this->db->get ()->row_array ();
	                        
	                       $default_pic = PLUGIN . 'data/images/' . $this->common_function->get_system_value ('default_goods_image');
	                       $pic = PLUGIN . 'data/shop/brand_pic/' . $brandinfo['brand_pic'];
	                       if (!empty($pic) && file_exists ($pic)) {
	                           $pic = GOODIMAGE . $pic;
	                       } else {
	                           $pic = $default_pic;
	                       }
	                        
	                       $strs.= '  <a href="getStockListForCustomer.htm?orderName=market_price&amp;orderType=asc&amp;index=0&amp;length=20&amp;brandId=7720&amp;salesId=&amp;storeId=" data-brandid="7720" class="shortcut_brand_item c-8">
                                    <span style="background-image: url('.$pic.')" class="shortcut_brand_img"></span>
                                '.$brandinfo['brand_name'].'
                                </a>';
	                   }
	                   
	                   
	                   $str .= '<div class="wx_mod sortable-item sortable-item" modtitle="品牌导航" modid="1007" id="m1007">
        	                       <div class="title" style="display: none;padding: 10px;">品牌导航</div>
                                  <div class="bd">
                                        <div class="shortcut_brand_wrap">
                                            <h3 class="shortcut_brand_tit">'.$title.' <a href="javascript:;">更多<i class="iconfont"></i></a></h3>
                                            <div class="shortcut_brand_list">
                                                '.$strs.'
                                            </div>
                                        </div>
                                    </div>'.$editstr.'</div>';
              	                   
	               }
	           }elseif($val['block_code']=='m1008'){
	               //print_r($block_content[$key]);die;
	               if($block_content[$key]['block_content']){
	                   $str  .=' <div class="wx_mod sortable-item" modtitle="自定义代码" modid="1008" id="m1008">
	                            <div class="title" style="display: none;padding: 10px;">自定义代码</div>
                                <div class="bd">
                                    <div class="shop_mod_html">
                                        <div id="dragWrap" class="box-drag-wrap l" style="color:#797979;font-family:&quot;font-size:14px;background-color:#FFFFFF;">
                            	           <div id="zxShop" class="l rel">
                            		          <div class="form-group form-inline" id="chkViewBox">
                            			         <div class="checkbox checkbox-info dib mr10" style="vertical-align:middle;">
                            				        <span style="font-weight:700;background-color:white;font-family:&quot;font-size:14px;">'.$block_content[$key]['block_content'].'</span>
                            			         </div>
                            		          </div>
                            	           </div>
                                        </div>
                                    </div>
                                </div>'.$editstr.'</div>';
	               }
	 
	               
	           }elseif($val['block_code']=='m1009'){
	               //print_r($block_content[$key]);die;
	               $strs='';
	               if($block_content[$key]['block_content']){
	                   foreach ($block_content[$key]['block_content']['content'] as $k=>$v){
	                       $strs .='<a href="javascript:;" data-id="'.$v['select'].'" class="shortcut_brand_item category-nav-item bde4-b bde4-r">
                                    <span class="category-nav-name">'.$v['name'].'</span>
                                    <span class="category-nav-img" style="background-image: url('.HEADIMAGE.$v['src'].')"></span>
                                </a>';
	                   }
	                   
	                   $str.='<div class="wx_mod sortable-item" modtitle="自定义代码" modid="1009" id="m1009">
    	                       <div class="title" style="display: none;padding: 10px;">类目导航</div>
                                <div class="bd">
                                    <div class="shortcut_category_wrap">
                                        <h3 class="shortcut_brand_tit mb0">'.$block_content[$key]['block_content']['title'].' <a href="javascript:;">更多<i class="iconfont"></i></a></h3>
                                        <div class="shortcut_brand_list category-nav">
                                            '.$strs.'
                                        </div>
                                    </div>
                                </div>'.$editstr.'</div>';
	               }
	           }elseif($val['block_code']=='m1010'){
	               //print_r($block_content[$key]);die;
	               $strs='';
	               if($block_content[$key]['block_content']){
	                   foreach ($block_content[$key]['block_content']['content'] as $k=>$v){
	                       $strs .='<a href="javascript:;" data-id="'.$v['select'].'" class="shortcut_brand_item category-nav-item bde4-b bde4-r">
                                    <span class="category-nav-name">'.$v['name'].'</span>
                                    <span class="category-nav-img" style="background-image: url('.HEADIMAGE.$v['src'].')"></span>
                                </a>';
	                   }
	                   $str.='<div class="wx_mod sortable-item sortable-item" modtitle="类目导航" modid="1010" id="m1010">
    	                       <div class="title" style="display: none;padding: 10px;">类目导航</div>
                                <div class="bd">
                                    <div class="shortcut_category_wrap">
                                        <h3 class="shortcut_brand_tit mb0">'.$block_content[$key]['block_content']['title'].' <a href="javascript:;">更多<i class="iconfont"></i></a></h3>
                                        <div class="shortcut_brand_list category-nav">
                                            '.$strs.'
                                        </div>
                                    </div>
                                </div>'.$editstr.'</div>';
	               }
	               
	           }
	           
	        }
	        $this->smarty->assign ('topinfo', $topinfo);
	        $this->smarty->assign ('str', $str);
	        $this->smarty->display ('store_decoration_edit.html');
	    }
        
	}
	
	
	/*店铺装修模版-新增*/
	public function store_decoration_add(){
	    //获取所有商品分类
	    $cate_arr = $this->goods_model->get_cate_by_parent_id(0);
	    $cate_option = $this->goods_model->get_cate_array_to_option($cate_arr); //分类选项
	    //print_r($cate_option );die;
	    $this->smarty->assign ('cate_option', $cate_option);
	     
	    //获取所有商品品牌
	    $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial');
	    $this->db->from('shop_brand as sb');
	    $this->db->where("sb.brand_name is not NULL AND sb.brand_name != ''");
	    $this->db->order_by('brand_initial');
	    $brands_info = $this->db->get()->result_array();
	    $brands_info = $this->goods_model->get_brands_array_to_option($brands_info);
	    //print_r($brands_info);die;
	    $this->smarty->assign ('brands_info', $brands_info);
	    $this->smarty->assign ('temples', TEMPLE);
	    //$this->smarty->display ('store_decoration_edit.html');
	    $this->smarty->display ('store_decoration_add.html');
	}
	
	
	
	//店铺装修上传图片
	public function store_decoration_pic_onload(){
	    $file =array();
	    if(isset($_FILES['file']) && !empty($_FILES['file'])){
	        foreach ($_FILES['file'] as $key=>$val){
	            $file[$key]=array_pop($val);
	        }
	    }
	    $savePath = './application/vmall/views/images/'; // 设置上传路径
	    if (!file_exists($savePath) || !is_writable($savePath)) {
	        @mkdir($savePath, 0755);
	    }
	    if(!empty($file) &&  !empty($file['name']) && $file['error']==0){
	        $tmp_size = $file['size'];
	        if($tmp_size > 1024*1024*3){
	            $return = array(
	                'state'=>false,
	                'msg'=>"图片文件大于3M，请重新上传"
	            );
	            echo json_encode($return);
	            exit();
	        }
	        $tmp_file = $file['tmp_name'];
	        $file_types = explode ( ".", $file['name'] );
	        $file_type = $file_types [count ( $file_types ) - 1];
	        if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
	            $return = array(
	                'state'=>false,
	                'msg'=>"不是图片文件，请重新上传"
	            );
	            echo json_encode($return);
	            exit();
	        }
	         
	        $str = date ( 'YmdHis' ) . uniqid ()."_storeDecoration"; // 以时间来命名上传的文件
	        $file_name = $str . "." . $file_type; // 是否上传成功
	        if (! copy( $tmp_file, $savePath . $file_name )) {
	            $return = array(
	                'state'=>false,
	                'msg'=>"图片上传失败，请稍后重新上传"
	            );
	            echo json_encode($return);
	            exit();
	        }else{
	            $return = array(
	                'state'=>true,
	                'msg'=> $file_name
	            );
	            echo json_encode($return);exit();
	        }
	         
	    }
	     
	     
	}
	
	
	//ajax获取所有总库商品
    public function ajax_get_all_goods_list ()
    {
        $result=array("state"=>false,'date'=>"",'pageinfo'=>"");
        $page = isset($_GET['curpage']) ? $_GET['curpage'] : 1;
        $rp = 5;
        $start = ($page - 1) * $rp;
        
        $this->db->select ('sg.goods_id,sg.goods_name,sg.goods_image,sg.goods_marketprice,sg.goods_spu');
        $this->db->from ('shop_goods as sg');
        if (isset($_GET['keyword']) && !empty($_GET['keyword']) && $_GET['keyword']) {
            $keyword = $_GET['keyword'];
            $this->db->where ("(sg.goods_name LIKE  '%".$keyword."%'  or sg.goods_spu LIKE  '%".$keyword."%')"); //总库商品
        }
        
        $this->db->where ("(sg.goods_pos = 0 or sg.goods_pos is NULL)"); //总库商品
        $this->db->where ("sg.goods_state != 0"); //未删除的
        $db = clone($this->db);
        $total = $this->db->count_all_results ();
        //$this->db->select ('sg.goods_id,sg.goods_name,sg.goods_price,sg.goods_image,sg.goods_jingle,sg.goods_marketprice,sg.goods_spu');
        $this->db = $db;
        $this->db->limit ($rp, $start);
        $this->db->order_by ('goods_addtime', 'DESC');
        $rows = $this->db->get ()->result_array ();
        $default_pic = PLUGIN . 'data/images/' . $this->common_function->get_system_value ('default_goods_image');
        foreach ($rows as $key=>$row) {
            $goods_pic = PLUGIN . 'data/shop/album_pic/' . $row['goods_image'];
            if (!empty($row['goods_image']) && file_exists ($goods_pic)) {
                $rows[$key]['goods_image'] = GOODIMAGE . $row['goods_image'];
            } else {
                $rows[$key]['goods_image'] = $default_pic;
            }

       }
       if($rows){
           $result['state']=true;
           $result['date']=$rows;
           $result['pageinfo']=$this->stores_model->pagerows($page, $total, $rp);
       }
       echo json_encode($result);exit();
  }
	
	
   //获取所有商品品牌
  public function ajax_get_all_brands_list ()
  {
        $result=array("state"=>false,'date'=>"");
	    $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial');
	    $this->db->from('shop_brand as sb');
	    $this->db->where("sb.brand_name is not NULL AND sb.brand_name != ''");
	    $this->db->order_by('brand_initial');
	    $brands_info = $this->db->get()->result_array();
	    $brands_info = $this->goods_model->get_brands_array_to_option($brands_info);
      if($brands_info){
          $result['state']=true;
          $result['date']=$brands_info;
      }
      echo json_encode($result);exit();
  }
	
  //获取所有商品分类
  public function ajax_get_all_cate_list ()
  {
      $result=array("state"=>false,'date'=>"");
      $op = isset($_GET['op']) && !empty($_GET['op']) ? $_GET['op']:false;
      $cate_arr = $this->goods_model->get_cate_by_parent_id(0);
      if($op && $op==1009){
          $cate_option = $this->goods_model->cate_array_to_option($cate_arr); //分类选项
      }else{
          $cate_option = $this->goods_model->get_cate_array_to_option($cate_arr); //分类选项
      }
      
      if($cate_option){
          $result['state']=true;
          $result['date']=$cate_option;
      }
      echo json_encode($result);exit();
  }	

  
  //保存模板
  public function save_store_decorate_tpl ()
  {
      $editstr ='<div class="ui_mask_wrapper  newssave" style="">
                    <div class="ui_mask">
                        <a data-tag="removeBtn" href="javascript:;" class="btn_trash"><span><i class="icon_trash"></i>删除</span></a>
                        <a href="javascript:;" data-tag="editBtn" class="btn_edit"><span><i class="icon_pencil"></i>编辑</span></a>
                        <a href="javascript:;" data-tag="foldBtn" class="btn_fold"><span class="fold_up"><i class="icon_fold_up"></i>收起</span><span class="fold_down"><i class="icon_fold_down"></i>展开</span></a>
                    </div>
                </div>';
      $strs = '';
      $result=array("state"=>false,'sdt_id'=>"",'msg'=>'','data'=>'');
      $data = $_POST;
      if(!$data){
          echo json_encode($result);exit();
      }
      //检测模板是否存在，不存在则创建
      if($data['m1']){
          $sdt_id = $data['m1'];
          $store_ids = $this->db->select('store_id')->where("sdt_id = '{$sdt_id}' ")->get('store_decorate_tpl')->row('store_id');
          if($store_ids && $data['m10']=="Default"){
              $result['msg'] = "Default模板只能由平台设置,商家端模板不能设置为系统默认模板！";
              echo json_encode($result);exit();
          }
          //检测模板名称Default
          if($data['m10']=="Default"){
              $Defaultinfo = $this->db->select('sdt_id')->where('sdt_name',$data['m10'])->where("sdt_id !='{$sdt_id}'")->get("store_decorate_tpl")->row_array();
              if($Defaultinfo && !empty($Defaultinfo)){
                  $result['msg'] = "Default模板 已存在,不能再次添加，请更换模板名称！";
                  echo json_encode($result);exit();
              }
          }
          $this->db->update('store_decorate_tpl',array('sdt_name'=>$data['m10']),array ('sdt_id' => $sdt_id));//更新模板
      }else{
          //检测模板名称Default
          if($data['m10']=="Default"){
              $Defaultinfo = $this->db->select('sdt_id')->where('sdt_name',$data['m10'])->get("store_decorate_tpl")->row_array();
              if($Defaultinfo && !empty($Defaultinfo)){
                  $result['msg'] = "Default模板 已存在,不能再次添加，请更换模板名称！";
                  echo json_encode($result);exit();
              }
          }
          
          $this->db->insert('store_decorate_tpl',array("sdt_name"=>$data['m10'],"store_id"=>0));//创建模板
          $sdt_id = $this->db->insert_id();
      }
      $arr=array();$res="";
      
      //检测 搜索 /店招  /店铺信息    模块是否存在,不存在则创建
      if(isset($data['m1000'])){
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1000");
          if($sdb_id){
              $res = $this->db->update('store_decoration_block',array('block_sort'=>$data['m1000']['sortNum']),array ('sdb_id' => $sdb_id));//更新模板
          }else{
              $res = $this->db->insert('store_decoration_block',array("sdt_id"=>$sdt_id,"block_code"=>'m1000','block_sort'=>$data['m1000']['sortNum']));//创建模板
          }
      }else{
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1000");
          if($sdb_id){
              $this->db->where("sdb_id",$sdb_id);
              $this->db->delete('store_decoration_block');
          }
      }
      if(isset($data['m1011'])){
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1011");
          if($sdb_id){
             $res = $this->db->update('store_decoration_block',array('block_sort'=>$data['m1011']['sortNum']),array ('sdb_id' => $sdb_id));
          }else{
             $res = $this->db->insert('store_decoration_block',array("sdt_id"=>$sdt_id,"block_code"=>'m1011','block_sort'=>$data['m1011']['sortNum']));
          }
      }else{
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1011");
          if($sdb_id){
              $this->db->where("sdb_id",$sdb_id);
              $this->db->delete('store_decoration_block');
          }
      }
      if(isset($data['m1012'])){
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1012");
          if($sdb_id){
              $res = $this->db->update('store_decoration_block',array('block_sort'=>$data['m1012']['sortNum']),array ('sdb_id' => $sdb_id));
          }else{
              $res = $this->db->insert('store_decoration_block',array("sdt_id"=>$sdt_id,"block_code"=>'m1012','block_sort'=>$data['m1012']['sortNum']));
          }
      }else{
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1012");
          if($sdb_id){
              $this->db->where("sdb_id",$sdb_id);
              $this->db->delete('store_decoration_block');
          }
      }
      
      
      if(isset($data['m1001'])){//检测 轮播广告    模块是否存在,不存在则创建
          if(empty($data['m1001']['content'])){
              $result['msg'] = "亲，你还没添加广告内容呢！";
              echo json_encode($result);exit();
          }
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1001");
          if($data['m1001']['content']){
              foreach ($data['m1001']['content'] as $k=>$v){
                  if($v['select']>0){
                      $data['m1001']['content'][$k]['href'] = $this->stores_model->get_href_by_block_code('m1001',$v['select']);
                  }
                  unset($data['m1001']['content'][$k]['select']);
                  
                  $strs .= '<a href="'.$data['m1001']['content'][$k]['href'].'" class="swiper-slide">
                          <div class="shop_slider_img" style="height:'.$data['m1001']['height'].'px; background-image:url('.HEADIMAGE.$data['m1001']['content'][$k]['src'].')"></div>
                        </a>';
              }
          }
          $str ='<div class="title" style="display: none;padding: 10px;">轮播广告</div>
                <div class="bd">
                    <!-- Swiper -->
                    <div class="swiper-container" style="height: '.$data['m1001']['height'].'px;">
                        <div class="swiper-wrapper">
                    '.$strs.'
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>'.$editstr;
          $result['data']=$str;
          $block_content=array(
                'height'=>  intval(($data['m1001']['height'])/2),
                'content'=>$data['m1001']['content']
          );
          if($sdb_id){
              $arr = array('block_content'=>serialize($block_content),'block_sort'=>$data['m1001']['sortNum']);
          }else{
              $arr = array("sdt_id"=>$sdt_id,"block_code"=>'m1001','block_content'=>serialize($block_content),'block_sort'=>$data['m1001']['sortNum']);
          }
      }
      
      
      if(isset($data['m1002'])){//检测 轮播广告    模块是否存在,不存在则创建
          if(empty($data['m1002']['content'])){
              $result['msg'] = "亲，你还没添加广告内容呢！";
              echo json_encode($result);exit();
          }
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1002");
          if($data['m1002']['content']){
                if($data['m1002']['content']['select'] >0){
                      $data['m1002']['content']['href'] = $this->stores_model->get_href_by_block_code('m1002',$data['m1002']['content']['select']);
                 }
                 unset($data['m1002']['content']['select']);
          }
          
          $str = '<div class="title" style="display: none;padding: 10px;">通栏广告</div>
                    <div class="bd">
                        <div class="shop_mod_pic" data-lazyload="true">
                            <a class="url" href="'.$data['m1002']['content']['href'].'">
                                <img alt="图片" class="pp_init_img" data-src="'.HEADIMAGE.$data['m1002']['content']['src'].'" src="'.HEADIMAGE.$data['m1002']['content']['src'].'">
                            </a>
                        </div>
                    </div>'.$editstr;
          $result['data']=$str;
          if($sdb_id){
              $arr = array('block_content'=>serialize($data['m1002']['content']),'block_sort'=>$data['m1002']['sortNum']);
          }else{
              $arr = array("sdt_id"=>$sdt_id,"block_code"=>'m1002','block_content'=>serialize($data['m1002']['content']),'block_sort'=>$data['m1002']['sortNum']);
          }
      }

      
      if(isset($data['m1003'])){ //检测 轮播广告    模块是否存在,不存在则创建
          if(empty($data['m1003']['content'])){
              $result['msg'] = "亲，你还没添加广告内容呢！";
              echo json_encode($result);exit();
          }
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1003");
          if($data['m1003']['content']){
              foreach ($data['m1003']['content'] as $k=>$v){
                  if($v['select']>0){
                      $data['m1003']['content'][$k]['href'] = $this->stores_model->get_href_by_block_code('m1003',$v['select']);
                  }
                  unset($data['m1003']['content'][$k]['select']);
                   $strs .= '<a href="'.$data['m1003']['content'][$k]['href'].'" title="图片" class="url"><img alt="图片" class="pp_init_img" src="'.HEADIMAGE.$data['m1003']['content'][$k]['src'].'"></a>';
              }
          }
           $str ='<div class="title" style="display: none;padding: 10px;">两栏广告</div>
                      <div class="bd">
                        <div class="shop_mod_pic shop_mod_pic_1" data-lazyload="true">'.$strs.'</div>
                      </div>'.$editstr;
          $result['data']=$str;
          if($sdb_id){
              $arr = array('block_content'=>serialize($data['m1003']['content']),'block_sort'=>$data['m1003']['sortNum']);
          }else{
              $arr = array("sdt_id"=>$sdt_id,"block_code"=>'m1003','block_content'=>serialize($data['m1003']['content']),'block_sort'=>$data['m1003']['sortNum']);
          }
      }

      
      if(isset($data['m1004'])){ //检测 商品推荐    模块是否存在,不存在则创建
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1004");
          $block_content = array();
          $wheres = "1 = '1'";
          $selectname='';
          if($data['m1004']['content']){
              $block_content['type'] = $data['m1004']['content']['type'];
              if($data['m1004']['content']['type']==1){//自动推荐
                  $block_content['selectid'] = $data['m1004']['content']['select'];
                  $block_content['key'] = $data['m1004']['content']['key'];
                  $block_content['limit'] = $data['m1004']['content']['num'];
                  
                  
                  
                  $this->db->select ('sg.year_to_market,sg.season_to_market,sg.sex,sg.goods_id,sg.goods_name,sg.goods_price,sg.goods_state,sg.goods_image,sg.goods_jingle,sg.gc_id,sg.brand_id,sg.goods_addtime,sg.goods_marketprice,sg.goods_tag,sg.goods_spu,sgc.gc_name,sb.brand_name');
                  $this->db->from ('shop_goods as sg');
                  $this->db->join ('shop_goods_class as sgc', 'sgc.gc_id = sg.gc_id', 'left');
                  $this->db->join ('shop_brand as sb', 'sb.brand_id = sg.brand_id', 'left');
                  $this->db->join ('shop_goods_attr_self_taxonomy as st', 'st.goods_id = sg.goods_id', 'left');
                  $this->db->where ("(sg.goods_pos = 0 or sg.goods_pos is NULL)"); //总库商品
                  $this->db->where ("sg.goods_state != 0"); //未删除的
                  if(!empty($block_content['key'])){
                      $this->db->like('sg.goods_name', $block_content['key']);
                  }
                  
                  //以什么方式推荐
                  if($data['m1004']['content']['way']=='radio11'){//按分类
                      $block_content['way']='gc_id';
                      $this->db->where ('sg.gc_id',$block_content['selectid']);
                  }elseif($data['m1004']['content']['way']=='radio11x'){//按自定义分类
                      $block_content['way']='gstn_id';
                      $this->db->where ('st.gstn_id',$block_content['selectid']);
                  }elseif($data['m1004']['content']['way']=='radio12'){//按品牌
                      $block_content['way']='brand_id';
                      $this->db->where ('sg.brand_id',$block_content['selectid']);
                  }elseif($data['m1004']['content']['way']=='radio15'){//按销量
                      $block_content['way']='goods_salenum';
                      $this->db->order_by ('sg.goods_salenum', 'DESC');
                  }
                  
                  
                  
                  
                    if($data['m1004']['content']['sort']==1){//价格由高到低
                        $block_content['order_by']=array("goods_price","DESC");
                        $this->db->order_by ('sg.goods_price', 'DESC');
                    }elseif($data['m1004']['content']['sort']==2){//价格由低到高
                        $block_content['order_by']=array("goods_price","ASC");
                        $this->db->order_by ('sg.goods_price', 'ASC');
                    }elseif($data['m1004']['content']['sort']==3){//销量由高到低
                        $block_content['order_by']=array("goods_salenum","DESC");
                        $this->db->order_by ('sg.goods_salenum', 'DESC');
                    }elseif($data['m1004']['content']['sort']==4){//销量由低到高
                        $block_content['order_by']=array("goods_salenum","ASC");
                        $this->db->order_by ('sg.goods_salenum', 'ASC');
                    }else{
                        $block_content['order_by']=array("update_time","DESC");//库存更新时间 即上架时间
                        $this->db->order_by ('sg.goods_addtime', 'DESC');
                    }
                  if(!empty($block_content['limit'])){
                      $this->db->limit ($block_content['limit'], 0);
                  }
                  $rows = $this->db->get ()->result_array ();
                  if($block_content['way']=='brand_id'){
                      $selectname = $this->db->select ('brand_name')->where ('brand_id', $block_content['selectid'])->get ('shop_brand')->row ('brand_name');
                  }elseif($block_content['way']=='gstn_id'){
                      $selectname = $this->db->select ('gstn_name')->where ('gstn_id', $block_content['selectid'])->get ('shop_goods_attr_self_taxonomy')->row ('gstn_name');
                  }elseif($block_content['way']=='gc_id'){
                      $selectname = $this->db->select ('gc_name')->where ('gc_id', $block_content['selectid'])->get ('shop_goods_class')->row ('gc_name');
                  }
                  
              }else{//手动推荐
                  if($data['m1004']['content']['shoutitle']){//是否显示标题
                      $block_content['title'] = $data['m1004']['content']['title'];
                      $block_content['shoutitle'] = 1;
                      $selectname = $data['m1004']['content']['title'];
                  }else{
                      $block_content['shoutitle'] = 0;
                  }
                  if(isset($data['m1004']['content']['gooodsid'])){
                      if(!empty($data['m1004']['content']['gooodsid'])){
                          $goods_id = '';
                          foreach ($data['m1004']['content']['gooodsid'] as $key=>$val){
                              if(isset($data['m1004']['content']['gooodsid'][$key+1])){
                                  $goods_id .= $val['goods_id'].",";
                              }else{
                                  $goods_id .= $val['goods_id'];
                              }
                              
                          }
                          
                          
                          $this->db->select ('year_to_market,season_to_market,sex,goods_id,goods_name,goods_price,goods_state,goods_image,goods_jingle,gc_id,brand_id,goods_addtime,goods_marketprice,goods_tag,goods_spu');
                          $this->db->from ('shop_goods');
                          $this->db->where ("goods_id in (".$goods_id.")");
                          $rows = $this->db->get ()->result_array ();
                      }
                  }
                  $block_content['gooods']= $data['m1004']['content']['gooodsid'];
              }
              
              
              $default_pic = PLUGIN . 'data/images/' . $this->common_function->get_system_value ('default_goods_image');
              if($selectname){
                  $selectname ='<h2 class="shop_mod_tit">'.$selectname.'<a href="javascript:;">更多<i class="iconfont"></i></a></h2>';
              }else{
                  $selectname ='';
              }
              $goods_tag_arr = array ('' => '--', '1' => '新品', '2' => '推荐', '3' => '特价');
              $str ='<div class="title" style="display: none;padding: 10px;">商品推荐</div>
                            <div class="bd m_recommend_bdm1004-3e6c" id="m_recommend_bdm1004-3e6c" style="display: block;">
                            '.$selectname.'
                            <div class="wx_itemlist" data-lazyload="true">
                            	<div class="shop_mod_pic_1">';
              if($rows){
                  foreach ($rows as $row) {
                      $span='';
                      $goods_pic = PLUGIN . 'data/shop/album_pic/' . $row['goods_image'];
                      if (!empty($row['goods_image']) && file_exists ($goods_pic)) {
                          $goods_pic = GOODIMAGE . $row['goods_image'];
                      } else {
                          $goods_pic = $default_pic;
                      }
                      if($row['goods_tag']==1 || $row['goods_tag']==3 ){
                          $span = '<span class="p-tags">'.$goods_tag_arr[$row['goods_tag']].'</span>';
                      }
                      $str .='<div class="hproduct">
                        			<p class="cover">
                        				'.$span.'
                        				<a href="javascript:;" style="background-image:url('.$goods_pic.')"></a>
                        			</p>
                        			<p class="fn"><a href="javascript:;">'.$row['goods_name'].'</a></p>
                        			<p class="prices"><strong><em>￥'.$row['goods_marketprice'].'</em><del>¥'.$row['goods_price'].'</del></strong>
                        			</p>
                        		</div>';
                  }
              }else{
                  $str .='暂无数据';
              }
              $str .='</div></div></div>'.$editstr;
              $result['data']=$str;
          }
          
          if($sdb_id){
              $arr = array('block_content'=>serialize($block_content),'block_sort'=>$data['m1004']['sortNum']);
          }else{
              $arr = array("sdt_id"=>$sdt_id,"block_code"=>'m1004','block_content'=>serialize($block_content),'block_sort'=>$data['m1004']['sortNum']);
          }
      }
      
      
      if(isset($data['m1005'])){ //检测 文本    模块是否存在,不存在则创建
          if(empty($data['m1005']['content'])){
              $result['msg'] = "亲，你还没添加广告内容呢！";
              echo json_encode($result);exit();
          }
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1005");
          if($sdb_id){ 
              $arr = array('block_content'=>serialize($data['m1005']['content']),'block_sort'=>$data['m1005']['sortNum']);
          }else{
              $arr = array("sdt_id"=>$sdt_id,"block_code"=>'m1005','block_content'=>serialize($data['m1005']['content']),'block_sort'=>$data['m1005']['sortNum']);
          }
          $str ='<div class="title" style="display: none;padding: 10px;">文本</div>
                  <div class="bd">
                  <div class="shop_mod_text">'.$data['m1005']['content'].'
                  </div>
                  </div>'.$editstr;
          $result['data']=$str;
          
          
          
      }

      
     /*if($data['m1006']){ //检测 活动导航   模块是否存在,不存在则创建
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1006");
          if($sdb_id){
              
          }else{
              
          }
      } */
      
      
      if(isset($data['m1007'])){ //检测 品牌导航    模块是否存在,不存在则创建
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1007");
          $block_content = array();
          $strs='';
          $block_content['title'] = $data['m1007']['title'];
          if($data['m1007']['content']){
               $arrs =array();
               foreach ($data['m1007']['content'] as $k=>$v){
                   $arrs[$v['num']] = $v['select'];
               }
               ksort($arrs); 
               $block_content['content']=$arrs;
               foreach ($arrs as $k=>$v){
                   $this->db->select ('brand_name,brand_pic');
                   $this->db->from ('shop_brand');
                   $this->db->where ('brand_id', $v);
                   $brandinfo = $this->db->get ()->row_array ();
                   
                   $default_pic = PLUGIN . 'data/images/' . $this->common_function->get_system_value ('default_goods_image');
                   $pic = PLUGIN . 'data/shop/brand_pic/' . $brandinfo['brand_pic'];
                   if (!empty($pic) && file_exists ($pic)) {
                       $pic = GOODIMAGE . $pic;
                   } else {
                       $pic = $default_pic;
                   }
                   
                   $strs.= '  <a href="getStockListForCustomer.htm?orderName=market_price&amp;orderType=asc&amp;index=0&amp;length=20&amp;brandId=7720&amp;salesId=&amp;storeId=" data-brandid="7720" class="shortcut_brand_item c-8">
                                    <span style="background-image: url('.$pic.')" class="shortcut_brand_img"></span>
                                '.$brandinfo['brand_name'].'
                                </a>';
               }
          }else{
              $result['msg'] = "亲，你还没添加导航内容呢！";
              echo json_encode($result);exit();
          }
          if($sdb_id){
              $arr = array('block_content'=>serialize($block_content),'block_sort'=>$data['m1007']['sortNum']);
          }else{
              $arr = array("sdt_id"=>$sdt_id,"block_code"=>'m1007','block_content'=>serialize($block_content),'block_sort'=>$data['m1007']['sortNum']);
          }
          
          $str = '<div class="title" style="display: none;padding: 10px;">品牌导航</div>
                  <div class="bd">
                        <div class="shortcut_brand_wrap">
                            <h3 class="shortcut_brand_tit">'.$data['m1007']['title'].' <a href="javascript:;">更多<i class="iconfont"></i></a></h3>
                            <div class="shortcut_brand_list">
                                '.$strs.'
                                
                            </div>
                        </div>
                    </div>'.$editstr;
          $result['data']=$str;
      }
      

      
      if(isset($data['m1008'])){ //检测  自定义区域    模块是否存在,不存在则创建
          if(empty($data['m1008']['content'])){
              $result['msg'] = "亲，你还没添加广告内容呢！";
              echo json_encode($result);exit();
          }
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1008");
          if($sdb_id){
              $arr = array('block_content'=>serialize($data['m1008']['content']),'block_sort'=>$data['m1008']['sortNum']);
          }else{
              $arr = array("sdt_id"=>$sdt_id,"block_code"=>'m1008','block_content'=>serialize($data['m1008']['content']),'block_sort'=>$data['m1008']['sortNum']);
          }
        $str  =' <div class="title" style="display: none;padding: 10px;">自定义代码</div>
                    <div class="bd">
                        <div class="shop_mod_html">
                            <div id="dragWrap" class="box-drag-wrap l" style="color:#797979;font-family:&quot;font-size:14px;background-color:#FFFFFF;">
                	           <div id="zxShop" class="l rel">
                		          <div class="form-group form-inline" id="chkViewBox">
                			         <div class="checkbox checkbox-info dib mr10" style="vertical-align:middle;">
                				        <span style="font-weight:700;background-color:white;font-family:&quot;font-size:14px;">'.$data['m1008']['content'].'</span>
                			         </div>
                		          </div>
                	           </div>
                            </div>
                        </div>
                    </div>'.$editstr;
          $result['data']=$str;
      }
      
      
      if(isset($data['m1009'])){ //检测 类目导航    模块是否存在,不存在则创建
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1009");
          $block_content = array();
          $strs='';
          $block_content['title'] = $data['m1009']['title'];
          if($data['m1009']['content']){
               $arrs =array();
               foreach ($data['m1009']['content'] as $k=>$v){
                   $arrs[$k]['select'] = $v['select'];
                   $arrs[$k]['name'] = $v['name'];
                   $arrs[$k]['src'] = $v['src'];
                   $arrs[$k]['num'] = $v['num'];
                   $strs .='<a href="javascript:;" data-id="'.$v['select'].'" class="shortcut_brand_item category-nav-item bde4-b bde4-r">
                                    <span class="category-nav-name">'.$v['name'].'</span>
                                    <span class="category-nav-img" style="background-image: url('.HEADIMAGE.$v['src'].')"></span>
                                </a>';
               }
               ksort($arrs);
               $block_content['content']=$arrs;
          }else{
              $result['msg'] = "亲，你还没添加导航内容呢！";
              echo json_encode($result);exit();
          }
          if($sdb_id){
              $arr = array('block_content'=>serialize($block_content),'block_sort'=>$data['m1009']['sortNum']);
          }else{
              $arr = array("sdt_id"=>$sdt_id,"block_code"=>'m1009','block_content'=>serialize($block_content),'block_sort'=>$data['m1009']['sortNum']);
          }
          $str='<div class="title" style="display: none;padding: 10px;">类目导航</div>
                    <div class="bd">
                        <div class="shortcut_category_wrap">
                            <h3 class="shortcut_brand_tit mb0">'.$data['m1009']['title'].' <a href="javascript:;">更多<i class="iconfont"></i></a></h3>
                            <div class="shortcut_brand_list category-nav">
                                '.$strs.'
                            </div>
                        </div>
                    </div>'.$editstr;
          $result['data']=$str;
      }
     
      
      
      if(isset($data['m1010'])){ //检测 自定义分类导航    模块是否存在,不存在则创建
          $sdb_id = $this->stores_model->check_decoration_block($sdt_id,"m1010");
          $block_content = array();
          $strs='';
          $block_content['title'] = $data['m1010']['title'];
          if($data['m1010']['content']){
              $arrs =array();
              foreach ($data['m1010']['content'] as $k=>$v){
                  $arrs[$k]['select'] = $v['select'];
                  $arrs[$k]['name'] = $v['name'];
                  $arrs[$k]['src'] = $v['src'];
                  $arrs[$k]['num'] = $v['num'];
                  $strs .='<a href="javascript:;" data-id="'.$v['select'].'" class="shortcut_brand_item category-nav-item bde4-b bde4-r">
                                    <span class="category-nav-name">'.$v['name'].'</span>
                                    <span class="category-nav-img" style="background-image: url('.HEADIMAGE.$v['src'].')"></span>
                                </a>';
              }
              ksort($arrs);
              $block_content['content']=$arrs;
          }else{
              $result['msg'] = "亲，你还没添加导航内容呢！";
              echo json_encode($result);exit();
          }
          if($sdb_id){
              $arr = array('block_content'=>serialize($block_content),'block_sort'=>$data['m1010']['sortNum']);
          }else{
              $arr = array("sdt_id"=>$sdt_id,"block_code"=>'m1010','block_content'=>serialize($block_content),'block_sort'=>$data['m1010']['sortNum']);
          }
          $str='<div class="title" style="display: none;padding: 10px;">类目导航</div>
                    <div class="bd">
                        <div class="shortcut_category_wrap">
                            <h3 class="shortcut_brand_tit mb0">'.$data['m1010']['title'].' <a href="javascript:;">更多<i class="iconfont"></i></a></h3>
                            <div class="shortcut_brand_list category-nav">
                                '.$strs.'
                            </div>
                        </div>
                    </div>'.$editstr;
          $result['data']=$str;
          
      }
      
      
      if(isset($data['m1010']) || isset($data['m1009']) ||isset($data['m1008']) || isset($data['m1007']) || isset($data['m1006']) || isset($data['m1005']) || isset($data['m1004']) || isset($data['m1003']) || isset($data['m1002']) || isset($data['m1001']) ){
          if($sdb_id){
              $res = $this->db->update('store_decoration_block',$arr,array ('sdb_id' => $sdb_id));//更新模板
          }else{
              $res = $this->db->insert('store_decoration_block',$arr);//创建模板
          }
      }
      
      
      //更新排序
      if(isset($data['PostContentnum'])){
          $PostContentnum = object_array(json_decode($data['PostContentnum'],true));
          if(isset($PostContentnum) && !empty($PostContentnum)){
              foreach ($PostContentnum as $key=>$val){
                  $sdb_id = $this->stores_model->check_decoration_block($sdt_id,$key);
                  if($sdb_id){
                      $res = $this->db->update('store_decoration_block',array('block_sort'=>$val),array ('sdb_id' => $sdb_id));//更新模板
                  }
              }
          }
      }
      
      if($res){
          $result['state']=true;
          $result['sdt_id']=$sdt_id;
          $result['sdt_name']=$data['m10'];
      }
      
      echo json_encode($result);exit();
  }
  
  
	
	
  //删除模板
  public function del_store_decorate_tpl(){
      $id = isset($_GET['id']) && !empty($_GET['id']) ?$_GET['id']:false;
      $mid = isset($_GET['mid']) && !empty($_GET['mid']) ?$_GET['mid']:false;
      $result=array("state"=>false,'date'=>"");
      if(!($id && $mid)){
          echo json_encode($result);exit();
      }
     if($this->db->where("sdt_id = '{$id}' and block_code = '{$mid}'")->delete ('store_decoration_block')){
         $result['state']=true;
     }
     echo json_encode($result);exit();
      
      
  }
	
	
	
	
	/*门店区域设置-功能设置*/
	public function store_area_setting(){
        $this->common_function->shop_admin_priv("store_area_setting");//权限
	    $data['store_region_state'] = $this->common_function->get_system_value('store_region_state');
	    $data['store_region_radius'] = $this->common_function->get_system_value('store_region_radius');
	    $data['store_region_noguide'] = $this->common_function->get_system_value('store_region_noguide');
	    $this->smarty->assign('data',$data);
		$this->smarty->display ('store_area_setting.html');
	}
	/*门店区域设置-功能设置提交*/
	public function store_area_set(){
        $this->common_function->shop_admin_priv("store_area_setting");//权限
	    $inner['store_region_state'] = isset($_POST['qq_isuse'])?$_POST['qq_isuse']:'';
	    $inner['store_region_radius'] = isset($_POST['area_region'])?$_POST['area_region']:'';
	    $inner['store_region_noguide'] = isset($_POST['delivery'])?$_POST['delivery']:'';
	    $flag = true;
	    foreach ($inner as $k=>$v){
	        if($v!=''){
	            $re = $this->db->update('system_config',array('value'=>$v),array('code'=>$k));
	            if(!$re){
	                $flag = false;
	            }
	        }
	    }
	    if($flag){
	        $this->common_function->show_message('门店区域设置成功。');
	    }else{
	        $this->common_function->show_message('门店区域设置失败。');
	    }
		//print_r($_POST);exit;
	}
	/*门店区域设置-编辑门店区域*/
	public function store_area_edit(){
        $this->common_function->shop_admin_priv("store_area_setting");//权限
	     $group = $this->db->select('*')->get('shop_area_group')->result_array();
	     $this->smarty->assign('group',json_encode($group));
		 $this->smarty->display ('store_area_edit.html');
	}
		/*门店区域设置*/
	public function store_area_group_edit(){
        $this->common_function->shop_admin_priv("store_area_setting");//权限
	    //print_r($_POST);exit;
	    $group_id = isset($_POST['group_id']) ? $_POST['group_id'] : '';
	    $store_group = isset($_POST['store_group']) ? $_POST['store_group'] : '';
	    $result = array('state'=>false,'msg'=>'操作错误');
	    if($group_id&&$store_group){
	        $this->db->where("store_id IN($group_id) ")->update('store',array('agp_id'=>$store_group));
	        $this->common_function->shop_admin_log('store_id='.$group_id ,'edit', '区域分组设置');
	        $result = array('state'=>true,'msg'=>'设置成功');
	    }
	    echo json_encode($result);exit;
	    //print_r($_POST);exit;
	    
	}
		/*门店区域设置-列表门店区域*/
	public function get_store_area_edit(){
        $this->common_function->shop_admin_priv("store_area_setting");//权限
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
	    $total = $this->db->select('count(1) as num')->from('store as s')
	    ->join('shop_area_group as sg','sg.agp_id=s.agp_id','left')->where($where)
	    ->get()->row('num');
	    if ($sortname && $sortorder){
	        $where .= " order by {$sortname} {$sortorder}";
	    }
	    $start = $rp * ($page - 1);
	    $where .= " limit $start, $rp";
	    $rows = $this->db->select('s.store_id,s.store_name,s.ous_logo,sg.agp_id,sg.agp_name')->from('store as s')
	    ->join('shop_area_group as sg','sg.agp_id=s.agp_id','left')->where($where)
	    ->get()->result_array();
		$default_pic = TEMPLE.'img/default_goods_image_240.gif';
		//$rows=array(array("id"=>"1","name"=>"大头儿子和小头爸爸（安岳龙台店）","area"=>"大成都区"));
		header("Content-type: text/xml");
	    $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	    $xml .= "<rows>";
	    $xml .= "<page>$page</page>";
	    $xml .= "<total>$total</total>";
	    foreach($rows as $row){
	        $data = json_encode(array('store_id'=>$row['store_id'],'store_name'=>$row['store_name'],'agp_id'=>$row['agp_id'],'agp_name'=>$row['agp_name'],));
	        $xml .= "<row id='".$row['store_id']."'>";
	        $xml .= "<cell><![CDATA[<a class='btn blue' onclick='fg_bj(" . $data . ")'><i class='fa fa-pencil-square-o'></i></i>编辑</a>]]></cell>";
	         $xml .= "<cell><![CDATA[<img src=\"".$default_pic.'" class="user-avatar"'.
                ' onerror="this.src=\''.base_url().$row['ous_logo'].'\" style="border-radius:50%;height:80%;"'.
                ' data-geo="<img src=\''.base_url().$row['ous_logo'].'\' width=300px >">'.
                '<span class="store_name">'.$row['store_name']."</span>]]></cell>";
	         $xml .= "<cell><![CDATA[".$row['agp_name']."]]></cell>";
	        $xml .= "</row>";
	    }
	    $xml .= "</rows>";
	    echo $xml;
	}
	/*门店区域设置-区域分组管理*/
	public function store_area_group(){
        $this->common_function->shop_admin_priv("store_area_setting");//权限
		 $this->smarty->display ('store_area_group.html');
	}
	/*门店区域设置-区域分组添加*/
	public function store_area_group_add(){
        $this->common_function->shop_admin_priv("store_area_setting");//权限
	    $agp_id = isset($_POST['group_id'])?trim($_POST['group_id']):'';
	    $agp_name = isset($_POST['group_name'])?trim($_POST['group_name']):'';
	    $result = array('state'=>false,'msg'=>'数据错误');
	    if($agp_name){
	        if($agp_id){
	            $this->db->update('shop_area_group',array('agp_name'=>$agp_name),array('agp_id'=>$agp_id));
	            $result = array('state'=>true,'msg'=>'修改成功');
	        }else{
	            $this->db->insert('shop_area_group',array('agp_name'=>$agp_name));
	            $result = array('state'=>true,'msg'=>'添加成功');
	        }
	    }
	    echo json_encode($result);exit;
		//print_r($_POST);exit;
	}
		/*门店区域设置-区域分组管理*/
	public function get_store_area_group(){
        $this->common_function->shop_admin_priv("store_area_setting");//权限
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
	    $total = $this->db->select('count(1) as num')->from('shop_area_group')
	    ->where($where)->get()->row('num');
	    if ($sortname && $sortorder){
	        $where .= " order by {$sortname} {$sortorder}";
	    }
	    $start = $rp * ($page - 1);
	    $where .= " limit $start, $rp";
	    $rows = $this->db->select('*')->from('shop_area_group')
	    ->where($where)->get()->result_array();
		header("Content-type: text/xml");
	    $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	    $xml .= "<rows>";
	    $xml .= "<page>$page</page>";
	    $xml .= "<total>$total</total>";
	    foreach($rows as $row){
	        $num = $this->db->select('count(1) as num')->where('agp_id',$row['agp_id'])->get('store')->row('num');
	        $data = json_encode(array('id'=>$row['agp_id'],'name'=>$row['agp_name']));
	        $xml .= "<row id='".$row['agp_id']."'>";
	         $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $data . ")'><i class='fa fa-trash-o'></i>删除</a><a class='btn blue' onclick='fg_bj(" . $data . ")'><i class='fa fa-pencil-square-o'></i></i>编辑</a>]]></cell>";
	         $xml .= "<cell><![CDATA[".$row['agp_name']."]]></cell>";
	          $xml .= "<cell><![CDATA[".$num."]]></cell>";
	        $xml .= "</row>";
	    }
	    $xml .= "</rows>";
	    echo $xml;
	}
	/*门店区域删除*/
	public function store_area_group_del(){
        $this->common_function->shop_admin_priv("store_area_setting");//权限
	    $agp_id = isset($_POST['id'])?trim($_POST['id']):'';
	    $result = array('state'=>false,'msg'=>'数据错误');
	    if($agp_id){
	        $this->db->delete('shop_area_group',array('agp_id'=>$agp_id));
	        $error = $this->db->error();
	        $result = $this->common_function->delete_key($error);
	        if($result['state']){
	            $this->common_function->shop_admin_log('id='.$agp_id ,'del', '区域分组');
	            $result = array('state'=>true,'msg'=>'删除成功');
	        }else{
	            $result = array('state'=>false,'msg'=>$result['msg']);
	        }
	    }
	    echo json_encode($result);exit;
	    //print_r($_POST);exit;
	}
	/*店铺收银台*/
	public function store_cashier(){
        $this->common_function->shop_admin_priv("store_cashier");//权限
		 $this->smarty->display ('store_cashier.html');
	}
	/*集合店收银*/
	public function store_department(){
        $this->common_function->shop_admin_priv("store_cashier");//权限
		 $this->smarty->display ('store_department.html');
	}
	public function get_store_depart(){
        $this->common_function->shop_admin_priv("store_cashier");//权限
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
	    $total = $this->db->select('count(1) as num')->from('department_store')
	    ->where($where)->get()->row('num');
	    if ($sortname && $sortorder){
	        $where .= " order by {$sortname} {$sortorder}";
	    }
	    $start = $rp * ($page - 1);
	    $where .= " limit $start, $rp";
	    $rows = $this->db->select('*')->from('department_store')
	    ->where($where)->get()->result_array();
	    header("Content-type: text/xml");
	    $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	    $xml .= "<rows>";
	    $xml .= "<page>$page</page>";
	    $xml .= "<total>$total</total>";
	    foreach($rows as $row){
	        $data = json_encode(array('id'=>$row['dpms_id'],'name'=>$row['dpms_name']));
	        $xml .= "<row id='".$row['dpms_id']."'>";
	        $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $data . ")'><i class='fa fa-trash-o'></i>删除</a><a class='btn blue' onclick='fg_bj(" . $data . ")'><i class='fa fa-pencil-square-o'></i></i>编辑</a>]]></cell>";
	        $xml .= "<cell><![CDATA[".$row['dpms_name']."]]></cell>";
	        $xml .= "<cell><![CDATA[".$row['dpms_contact_name']."]]></cell>";
	        $xml .= "<cell><![CDATA[".$row['dpms_contact_tel']."]]></cell>";
	        $xml .= "<cell><![CDATA[".$row['dpms_address']."]]></cell>";
	        $xml .= "<cell><![CDATA[".date('Y-m-d',$row['add_time'])."]]></cell>";
	        $xml .= "</row>";
	    }
	    $xml .= "</rows>";
	    echo $xml;
	}
		/*集合店收银编辑*/
	public function store_department_edit(){
        $this->common_function->shop_admin_priv("store_department");//权限
	     $id = isset($_GET['dp_id'])?intval($_GET['dp_id']):'';
	     if($id){
	         $data = $this->db->select('*')->where('dpms_id',$id)->get('department_store')->row_array();
	         $arr_store = $this->db->select('store_id')->where('dpms_id',$id)->get('department_store_att')->result_array();
	         $arr = array();
	         foreach ($arr_store as $v){
	             $arr[] = $v['store_id'];
	         }
	         $data['store'] = $arr;
	         $this->smarty->assign('data',$data);
	     }
	     $where = empty($id)?' 1=1 ':'dpms_id!='.$id;
	     $haveStore = $this->db->select('GROUP_CONCAT(store_id) as store')->where($where)->get('department_store_att')->row('store');
	     $where = empty($haveStore)?' 1=1 ':" s.store_id NOT IN ($haveStore)";
	     //print_r($haveStore);print_r($where);die;
	     $store = $this->db->select('s.store_id,s.store_name')->from('store s')
	     ->where($where)->get()->result_array();
	     foreach ($store as $k=>$v){
	         $auth_brand = $this->db->select('GROUP_CONCAT(brand_id) as brand')->from('store_attr_brands')->where('store_id',$v['store_id'])->group_by('store_id')->get()->row('brand');
	         $store[$k]['brand'] = $auth_brand;
	     }
	     $this->smarty->assign('store',$store);
		 $this->smarty->display ('store_department_edit.html');
	}
	public function check_JHstore(){
	    $name = isset($_POST['name'])?trim($_POST['name']):'';
	    $id = isset($_POST['id'])?trim($_POST['id']):'';
	    if($name){
	        $check = $this->db->select('dpms_id')->where('dpms_name',$name)->get('department_store')->row('dpms_id');
	        if($check){
	            if($id==$check){
	                echo 'true';
	            }else{
	                echo 'false';
	            }
	        }else{
	            echo 'true';
	        }
	    }else{
	        echo 'false';
	    }
	}
	public function store_depart_del(){
        $this->common_function->shop_admin_priv("store_department");//权限
	    $depart_id = isset($_POST['id'])?trim($_POST['id']):'';
	    $result = array('state'=>false,'msg'=>'操作错误');
	    if($depart_id){
	        $this->db->where("dpms_id IN($depart_id)")->delete('department_store');
	        $this->db->where("dpms_id IN($depart_id)")->delete('department_store_att');
	        $result = array('state'=>true,'msg'=>'删除成功');
	        
	    }
	    echo json_encode($result);
	}
	public function depart_add(){
        $this->common_function->shop_admin_priv("store_department");//权限
	    //print_r($_POST);exit;
	    $depart_id = isset($_POST['depart_id'])?trim($_POST['depart_id']):'';
	    $inner['dpms_name'] = isset($_POST['class_name'])?trim($_POST['class_name']):'';
	    $inner['dpms_contact_name'] = isset($_POST['class_contact'])?trim($_POST['class_contact']):'';
	    $inner['dpms_contact_tel'] = isset($_POST['class_mobile'])?trim($_POST['class_mobile']):'';
	    $inner['add_time'] = time();
	    $inner['dpms_address'] = isset($_POST['class_contact_address'])?trim($_POST['class_contact_address']):'';
	    $inner['password'] = isset($_POST['pwd'])?encrypt_pwd(trim($_POST['pwd'])):'';
	    $store_id = isset($_POST['store_id'])?$_POST['store_id']:'';
	    //print_r($store_id);die;
        if($depart_id){
            unset($inner['add_time']);
            unset($inner['password']);
            $this->db->trans_begin();
            $this->db->update('department_store',$inner,array('dpms_id'=>$depart_id));
            $this->db->delete('department_store_att',array('dpms_id'=>$depart_id));
            if(!empty($store_id)&&is_array($store_id)){
                foreach ($store_id as $v){
                    $this->db->insert('department_store_att',array('dpms_id'=>$depart_id,'store_id'=>$v));
                } 
            }
            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $this->common_function->show_message('修改失败。');
            }
            else
            {
                $this->db->trans_commit();
                $links = array(
                    0 => array(
                        'text' => '集合店列表',
                        'href' => 'store_department'
                    ),
                    1 => array(
                        'text' => '返回',
                        'href' => 'javascript:history.go(-1)'
                    ),
                     
                );
                $this->common_function->show_message('修改成功。',0 ,$links);
            }
        }else{
            $this->db->trans_begin();
            $this->db->insert('department_store',$inner);
            $depart_id = $this->db->insert_id();
            
            if(!empty($store_id)&&is_array($store_id)){
                foreach ($store_id as $v){
                    $this->db->insert('department_store_att',array('dpms_id'=>$depart_id,'store_id'=>$v));
                }
            }
            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $this->common_function->show_message('添加失败。');
            }
            else
            {
                $this->db->trans_commit();
                $links = array(
                    0 => array(
                        'text' => '集合店列表',
                        'href' => 'store_department'
                    ),
                    1 => array(
                        'text' => '返回',
                        'href' => 'javascript:history.go(-1)'
                    ),
                     
                );
                $this->common_function->show_message('添加成功。',0 ,$links);
            }
        }
	}
}
?>