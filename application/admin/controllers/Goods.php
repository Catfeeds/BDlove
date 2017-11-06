<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends CI_Controller
{

    /**
     * Index Page for this controller.
     */
    public function __construct ()
    {
        parent::__construct ();
        $this->load->model ('goods_model');
        $this->load->library ('shop');
    }

    /* 总库扣减 */

    public function goods_stock_deduction ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限

        $store_stock = $this->common_function->get_system_value ('store_stock');
        $express_delivery = $this->common_function->get_system_value ('express_delivery');
        $store_arayacak = $this->common_function->get_system_value ('store_arayacak');
        $auto_unshelve = $this->common_function->get_system_value ('auto_unshelve');
//        var_dump($store_stock);exit;
        $this->smarty->assign ('store_stock', $store_stock);
        $this->smarty->assign ('express_delivery', $express_delivery);
        $this->smarty->assign ('store_arayacak', $store_arayacak);
        $this->smarty->assign ('auto_unshelve', $auto_unshelve);
        $this->smarty->display ('goods_stock_deduction.html');

    }

    public function goods_change_stock_deduction ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限

        $old_data = $this->common_function->get_system_value ('store_stock');
        $param = [];
        if ($old_data !== false) { //修改
            foreach ($_POST as $k => $v) {
                $param[] = array (
                    'code' => $k,
                    'value' => $v,
                );
            }
            if (!empty($param)) {
                $result = $this->db->update_batch ('system_config', $param, 'code');
            }
        } else {//新增
            $comments_arr = array ('store_stock' => '门店库存(1开启，0关闭)', 'express_delivery' => '快递发货(1扣除总库，2扣除门店)', 'store_arayacak' => '门店自提(1扣除总库，2扣除门店)', 'auto_unshelve' => '商品库存0自动下架(1开启，0关闭)');
            foreach ($_POST as $k => $v) {
                $param[] = array (
                    'code' => $k,
                    'type' => 'text',
                    'value' => $v,
                    'comments' => $comments_arr[$k],
                );
            }
            if (!empty($param)) {
                $result = $this->db->insert_batch ('system_config', $param);
            }
        }
        if ($result) {
            $data = array ('state' => true, 'msg' => '修改成功！');
        } else {
            $data = array ('state' => true, 'msg' => '修改失败！');
        }
        echo json_encode ($data);
    }

    /* 商品管理 */

    public function goods_management ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $source = isset($_GET['source'])?$_GET['source']:false;
        $this->smarty->assign ('source', $source);        //用来判断来源

        $goods_name_format  = $this->common_function->get_system_value('goods_name_format');
        if (!empty($goods_name_format)) {       //处理格式化商品名称
            $change = array(
                '{goodname}'    => '商品名称',
                '{brandname}'   => '品牌名称',
                '{sex}'         => '性别',
                '{seasontm}'    => '上市季节',
                '{yearmt}'      => '上市年份',
                '{catename}'    => '分类名称',
            );
            $goods_name_format = strtr ($goods_name_format, $change);
        }
        if (isset($_GET['op']) && $_GET['op'] == 'shop_goods') {    //门店自建
            $brands = $this->goods_model->get_brands_by_class ();
            $this->smarty->assign ('brands', $brands);
            $this->smarty->display ('goods_management_shop_goods.html');
        } elseif (isset($_GET['op']) && $_GET['op'] == 'trash') {    //回收站
            $brands = $this->goods_model->get_brands_by_class ();
            $this->smarty->assign ('brands', $brands);
            $this->smarty->display ('goods_management_trash.html');
        } else {
            if ($source == 'store')     $ous_type = 1;      //微商城
            if ($source == 'ebusiness') $ous_type = 2;      //电商
            if ($source == 'supply')    $ous_type = 3;      //供应商
            //搜索对应店铺类型的店铺
            if(isset($ous_type)) {
                $stores = $this->db->select('store_id,store_name')->where('ous_type',$ous_type)->get('store')->result_array ();
                $this->smarty->assign ('stores', $stores);
            }
            $brands = $this->goods_model->get_brands_by_class ();
            $this->smarty->assign ('goods_name_format', $goods_name_format);
            $this->smarty->assign ('brands', $brands);
            $class_arr=$this->get_all_json_cate_by_parent_id($gc_parent_id = 0, $level_num = 0,$source);
            $this->smarty->assign ('class_arr', $class_arr);
            $this->smarty->display ('goods_management_all.html');     //总库商品
        }
    }

    public function get_all_json_cate_by_parent_id($gc_parent_id = 0, $level_num = 0,$source='all',$num=1) {
        $product_cate = array();
        $gc_parent_id = intval($gc_parent_id);
        $sql = "select count(*) as num from " . $this->db->dbprefix('shop_goods_class') . " where gc_parent_id =" . $gc_parent_id;
        if ($this->db->query($sql)->row('num') || $gc_parent_id == 0) {
            $sql = 'SELECT gc_id, gc_name ' . ' FROM ' . $this->db->dbprefix('shop_goods_class') .
                    ' WHERE gc_parent_id=' . $gc_parent_id .
                    ' ORDER BY gc_sort ASC';
            $data = $this->db->query($sql)->result_array();
            $str = '[';
            foreach ($data as $k => $v) {
                //$product_cate[$v['gc_id']]['id'] = $v['gc_id'];
                $gc_name = $v['gc_name'];
                if($num<3){
                    $this->db->from ('shop_goods as sg');
                    $this->db->where ("sg.gc_id = {$v['gc_id']}");
                    $this->db->where ("sg.goods_pos = 0"); //总库商品
                    if($source!='all'){
                        if ($source == 'store')     $ous_type = 1;      //微商城商品
                        if ($source == 'ebusiness') $ous_type = 2;      //电商商品
                        if ($source == 'supply')    $ous_type = 3;      //供应商商品
                        $this->db->join('store_attr_brands sab','sab.brand_id = sg.brand_id', 'left')
                        ->join('store_stocks_amount ssa','ssa.goods_id = sg.goods_id', 'left')
                        ->join('store s', 'sab.store_id = s.store_id' )
                        ->where('s.ous_type', $ous_type)
                        ->where('ssa.ssa_store_id = s.store_id')
                        ->where('sab.store_id = s.store_id');
                        $this->db->distinct()->select('ssa.goods_id');
                    }
                    
                    $this->db->where ("sg.goods_state != 0"); //未删除的
                    $total = $this->db->get()->num_rows();
                    if($total){
                        $gc_name = $v['gc_name']."<span class='cl-red'>*</span>";
                    }
                }else{
                    $gc_name = $v['gc_name'];
                }
                
                
                $str_son = '';
                $son_flag = 2;
                if ($level_num == 0 && $this->db->query("select count(*) as num from " . $this->db->dbprefix('shop_goods_class') . " where gc_parent_id =" . $v['gc_id'])->row('num')) {
                    $num ++;
                    $son_flag = 1;
                    $str_son = $this->get_all_json_cate_by_parent_id($v['gc_id'],$level_num,$source,$num );
                    //$product_cate[$v['gc_id']]['child'] = $this->get_all_json_cate_by_parent_id($v['gc_id'],$level_num,$source);
                }
                if($str_son){
                    $str .='{"id":"'.$v['gc_id'].'","name":"'.$gc_name.'","son":"'.$son_flag.'","child":'.$str_son.'}';
                }else{
                    $str .='{"id":"'.$v['gc_id'].'","name":"'.$gc_name.'","son":"'.$son_flag.'"}';
                }
                if(isset($data[$k+1])){
                    $str .=',';
                }
                
            }
            $num=1;
            $str .= ']';
        }
        return $str;
    }
    
    
    
    public function ajax_get_cate(){
        $gc_id = isset($_GET['gc_id']) && !empty($_GET['gc_id'])?$_GET['gc_id']:0;
        $str = $this->get_all_json_cate_by_parent_id($gc_id, $level_num = 0,$source='all',$num=1);
        return json_encode($str);exit;
    }
    
    
    
    
    
    public function get_class_by_parent_id($gc_parent_id = 0) {
        $gc_parent_id = intval($gc_parent_id);
        $sql = "select count(*) as num from " . $this->db->dbprefix('shop_goods_class') . " where gc_parent_id =" . $gc_parent_id;
        $str='';
        if ($this->db->query($sql)->row('num') || $gc_parent_id == 0) {
            $sql = 'SELECT gc_id, gc_name ' . ' FROM ' . $this->db->dbprefix('shop_goods_class') .
            ' WHERE gc_parent_id=' . $gc_parent_id .
            ' ORDER BY gc_sort ASC';
            $data = $this->db->query($sql)->result_array();
            foreach ($data as $k => $v) {
                $str_son = '';
                if ($this->db->query("select count(*) as num from " . $this->db->dbprefix('shop_goods_class') . " where gc_parent_id =" . $v['gc_id'])->row('num')) {
                     $str_son .= get_class_by_parent_id($v['gc_id']);
                }
                if(isset($data[$k+1])){
                    $str .= $v['gc_id'].','.$str_son;
                }else{
                    if($str_son){
                       $str .= $v['gc_id'].','.$str_son;
                    }else{
                        $str .= $v['gc_id'];
                    }
                }
            }
        }
        return $str;
    }
    
    
    public  function goods_update_class(){
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $data = array('state' =>false, 'msg' => '修改失败！');
        $source = isset($_GET['source']) ? $_GET['source'] : false;
        if($source=="all"){
            $up_id  = isset($_GET['up_id']) ? $_GET['up_id'] : false;
            if($up_id){
                $str = substr($up_id,0,1);
                if($str==','){
                    $up_id = substr($up_id,1);
                }
            }
            $cid  = isset($_GET['cid']) ? $_GET['cid'] : false;
            if($this->db->query("select count(*) as num from " . $this->db->dbprefix('shop_goods_class') . " where gc_parent_id ='{$cid}'")->row('num')){
                $data['msg']= "修改失败：所选分类项下还有子类";
            }else{
                $gc_name = $this->db->select('gc_name')->where('gc_id',$cid)->get('shop_goods_class')->row('gc_name');
                if($this->db->where("goods_id in ({$up_id})")->update('shop_goods',array("gc_id"=>$cid,"gc_name"=>$gc_name))){
                    $data['state']= true;
                    $data['msg']= "修改成功";
                }
            }

        }
        echo json_encode($data);exit;
    }
    
    
    
    //总库商品
    public function get_all_goods_list ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $page   = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp     = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype  = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query  = isset($_POST['query']) ? $_POST['query'] : false;
        $source = isset($_GET['source']) ? $_GET['source'] : false;
        
        $start  = ($page - 1) * $rp;
        $store  = array();

        $this->db->from ('shop_goods as sg');
        if (isset($_GET['brand_id']) && !empty($_GET['brand_id'])) {
            $this->db->where ('sg.brand_id', $_GET['brand_id']);
        }
         if($source == 'all') {      //平台所有商品
            if (isset($_GET['gc_id']) && !empty($_GET['gc_id'])) {
                  $this->db->where ("sg.gc_id = '{$_GET['gc_id']}'");
             }
        } else{
            if (isset($_GET['gc_id']) && !empty($_GET['gc_id'])) {
                $gc_ids = $this->get_class_by_parent_id($_GET['gc_id']);
               // print_r($gc_ids);die;exit;
               if($gc_ids){
               $this->db->where ("sg.gc_id in( '{$gc_ids}' )");
               }
                
            }
            
        } 
        
        $start_time = isset($_GET['start_time']) && !empty($_GET['start_time']) ? strtotime($_GET['start_time']) : false;
        $end_time = isset($_GET['end_time'])  && !empty($_GET['end_time']) ? strtotime($_GET['end_time']) : false;
        if($start_time){
            $this->db->where ("sg.goods_addtime >=".$start_time);
        }
        
        if($end_time){
            $this->db->where ("sg.goods_addtime <=".$end_time);
        }
        

        if (isset($_GET['goods_tag']) && !empty($_GET['goods_tag'])) {
            $this->db->like ('sg.goods_tag', $_GET['goods_tag']);
        }
        if (isset($_GET['available_coupons']) && !empty($_GET['available_coupons'])) {
            $this->db->where ('sg.available_coupons', $_GET['available_coupons']);
        }
        if (isset($_GET['goods_name']) && !empty($_GET['goods_name'])) {
            $this->db->like ('sg.goods_name', trim ($_GET['goods_name']));
        }
        if (isset($_GET['goods_spu']) && !empty($_GET['goods_spu'])) {
            $this->db->like ('sg.goods_spu', trim ($_GET['goods_spu']));
        }
        if (isset($_GET['stocks_sku']) && !empty($_GET['stocks_sku'])) {
            $this->db->join ('shop_goods_extend_attr as sgea', 'sg.goods_id = sgea.goods_id', 'left');
            $this->db->like ('sgea.stocks_sku', trim ($_GET['stocks_sku']));
        }
        if (isset($_GET['stocks_bar_code']) && !empty($_GET['stocks_bar_code'])) {
            $this->db->join ('shop_goods_extend_attr as sgea', 'sgea.goods_id = sg.goods_id', 'left');
            $this->db->like ('sgea.stocks_bar_code', trim ($_GET['stocks_bar_code']));
        }

        if (isset($_GET['year_to_market']) && !empty($_GET['year_to_market'])) {
            $this->db->where ('sg.year_to_market', $_GET['year_to_market']);
        }
        if (isset($_GET['season_to_market']) && !empty($_GET['season_to_market'])) {
            $this->db->where ('sg.season_to_market', $_GET['season_to_market']);
        }
        if (isset($_GET['sex']) && !empty($_GET['sex'])) {
            if ($_GET['sex'] == 3) {
                $_GET['sex'] = 0;
            }
            $this->db->where ('sg.sex', $_GET['sex']);
        }
        if (isset($_GET['store']) && !empty($_GET['store'])) {
            $store = explode ('-', $_GET['store']);
            $this->db->where('ssa.ssa_store_id', $store[0]);
        }
        //商品有无图片
        if (isset($_GET['goods_image']) && !empty($_GET['goods_image'])) {
            if($_GET['goods_image']==1){
                $this->db->where("sg.goods_image is not null and sg.goods_image!=''");
            }elseif($_GET['goods_image']==2){
                $this->db->where("sg.goods_image is null");
            }
        }

        if($source == 'all') {      //平台所有商品
            $this->db->where ("sg.goods_pos = 0"); //总库商品
        } else if ($source == 'store' || $source == 'ebusiness' || $source == 'supply'){
            $this->db->where ("sg.goods_pos = 0"); //总库商品
            if ($source == 'store')     $ous_type = 1;      //微商城商品
            if ($source == 'ebusiness') $ous_type = 2;      //电商商品
            if ($source == 'supply')    $ous_type = 3;      //供应商商品
            $this->db->join('store_attr_brands sab','sab.brand_id = sg.brand_id', 'left')
                ->join('store_stocks_amount ssa','ssa.goods_id = sg.goods_id', 'left')
                ->join('store s', 'sab.store_id = s.store_id' )
                ->where('s.ous_type', $ous_type)
                ->where('ssa.ssa_store_id = s.store_id')
                ->where('sab.store_id = s.store_id');
        }
        $this->db->distinct()->select('sg.goods_id');
        $this->db->where ("sg.goods_state != 0"); //未删除的
        
        
        $db = clone($this->db);

        $total = $this->db->get()->num_rows();

        $default_pic = PLUGIN . 'data/images/' . $this->common_function->get_system_value ('default_goods_image');
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
        if ($source == 'store' || $source == 'ebusiness' || $source == 'supply') {
            $this->db->distinct()->select('ssa.goods_id');
            $goods = $this->db->get ()->result_array ();
            $goods_id = [];
            foreach ($goods as $g){
                $goods_id[] = $g['goods_id'];
            }
            $this->db->from('shop_goods sg');
            $this->db->where_in('sg.goods_id', $goods_id);
        }
        $this->db->select ('sg.goods_id,sg.year_to_market,sg.season_to_market,sg.sex,sg.goods_name,sg.goods_price,sg.goods_state,sg.goods_image,sg.goods_jingle,sg.gc_id,sg.brand_id,sg.goods_addtime,sg.goods_marketprice,sg.goods_tag,sg.goods_spu,sg.brand_name,sg.gc_name');
        $this->db->limit ($rp, $start);
        $this->db->order_by ('goods_addtime', 'DESC');
        $rows = $this->db->get ()->result_array ();

        $goods_tag_arr = array ('' => '--', '1' => '新品', '2' => '推荐', '3' => '特价');
        foreach ($rows as $row) {
            $amount = $this->db->select ("SUM(amount) as amount")->from ('store_stocks_amount')->where ('goods_id', $row['goods_id'])->get ()->row ('amount');
            $goods_pic = GOODIMAGE . $row['goods_image'];
            if (!empty($row['goods_image'])) {
                $goods_pic = GOODIMAGE . $row['goods_image'];
            } else {
                $goods_pic = $default_pic;
            }

            $goods_info = '<i class="fa fa-photo" aria-hidden="true" data-geo="<img src=\'' . $goods_pic . '\'>"></i><span>' . $row['goods_name'] . '</span>';
            if (!empty($row['goods_spu'])) {
                $goods_info .= '<br><span>款号:</span><span>' . $row['goods_spu'] . '</span>';
            }
            if (!empty($row['goods_tag'])) {
                $goods_info .= '&nbsp;<span class="new_goods">' . $goods_tag_arr[$row['goods_tag']] . '</span>';
            }

            if ($row['season_to_market'] == 1) {
                $row['season_to_market'] = "春季";
            } elseif ($row['season_to_market'] == 2) {
                $row['season_to_market'] = "夏季";
            } elseif ($row['season_to_market'] == 3) {
                $row['season_to_market'] = "秋季";
            } elseif ($row['season_to_market'] == 4) {
                $row['season_to_market'] = "冬季";
            } else {
                $row['season_to_market'] = "";
            }

            if (empty($row['sex']) || $row['sex'] == 0) {
                $row['sex'] = "中性";
            } elseif ($row['sex'] == 1) {
                $row['sex'] = "女";
            } elseif ($row['sex'] == 2) {
                $row['sex'] = "男";
            } else {
                $row['sex'] = "";
            }

            $goods_info .= '';
            $xml .= "<row id='" . $row['goods_id'] . "'>";

            //操作
            $xml .= "<cell><![CDATA[<a class='btn red' onclick=fg_delete({$row['goods_id']})>
            <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em>
            <i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
            <ul>";
            $xml .= "<li><a onclick=fg_edit({$row['goods_id']})>编辑</a></li>";
            $xml .= "<li><a onclick=fg_cancel_tags({$row['goods_id']})>取消标签</a></li>";
            $xml .= "<li><a onclick=fg_set_tag({$row['goods_id']},1)>设为新品</a></li>";
            $xml .= "<li><a onclick=fg_set_tag({$row['goods_id']},2)>设为推荐</a></li>";
            $xml .= "<li><a onclick=fg_set_tag({$row['goods_id']},3)>设为特价</a></li>";
            $xml .= "</ul>]]></cell>";

            $xml .= "<cell><![CDATA[<span title='{$row['goods_name']}'>" . $goods_info . "</span>]]></cell>";
            $xml .= "<cell><![CDATA[￥：" . $row['goods_price'] . "]]></cell>";
            $xml .= "<cell><![CDATA[￥：" . $row['goods_marketprice'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . 0 . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $amount . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['year_to_market'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['season_to_market'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $row['sex'] . "]]></cell>";
            $xml .= "<cell><![CDATA[<span title='{$row['brand_name']}'>" . $row['brand_name'] . "</span>]]></cell>";
            $xml .= "<cell><![CDATA[<span title='{$row['gc_name']}'>" . $row['gc_name'] . "</span>]]></cell>";
            if ($source != 'all') {
                $xml .= "<cell><![CDATA[<span title='{$store[1]}'>" . $store[1] . "</span>]]></cell>";
            }
            $xml .= "<cell><![CDATA[" . date ('Y-m-d H:i:s', $row['goods_addtime']) . "]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "<total>$total</total>";
        $xml .= "</rows>";
        echo $xml;
        exit;
    }

    //门店自建
    public function get_shop_goods_list ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $page   = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp     = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype  = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query  = isset($_POST['query']) ? $_POST['query'] : false;
        $source = isset($_GET['source']) ? $_GET['source'] : false;
        $start  = ($page - 1) * $rp;

        $this->db->distinct()->select ('sg.goods_id,sg.goods_name,sg.goods_pos,sg.goods_price,sg.goods_state,sg.goods_image,sg.goods_jingle,sg.gc_id,sg.brand_id,sg.goods_marketprice,sg.goods_addtime,sg.goods_tag,sg.goods_spu,sgc.gc_name,sb.brand_name,');
        $this->db->from ('shop_goods as sg');
        $this->db->join ('shop_goods_class as sgc', 'sgc.gc_id = sg.gc_id', 'left');
        $this->db->join ('shop_brand as sb', 'sb.brand_id = sg.brand_id', 'left');
//        if ($qtype && $query) {
//            if ($qtype == 'brand_id') {
//                $this->db->like('brand_id', $query);
//            } elseif ($qtype == 'brand_name') {
//                $this->db->like('brand_name', $query);
//            } elseif ($qtype == 'brand_initial') {
//                $this->db->like('brand_initial', $query);
//            }
//        }

        $start_time = isset($_GET['start_time']) && !empty($_GET['start_time']) ? strtotime($_GET['start_time']) : false;
        $end_time = isset($_GET['end_time'])  && !empty($_GET['end_time']) ? strtotime($_GET['end_time']) : false;
        if($start_time){
            $this->db->where ("sg.goods_addtime>='{$start_time}'");
        }
        
        if($end_time){
            $this->db->where ("sg.goods_addtime<='{$end_time}'");
        }
        
        
        if (isset($_GET['brand_id']) && !empty($_GET['brand_id'])) {
            $this->db->where ('sg.brand_id', $_GET['brand_id']);
        }
        if (isset($_GET['goods_tag']) && !empty($_GET['goods_tag'])) {
            $this->db->like ('sg.goods_tag', $_GET['goods_tag']);
        }
        if (isset($_GET['available_coupons']) && !empty($_GET['available_coupons'])) {
            $this->db->where ('sg.available_coupons', $_GET['available_coupons']);
        }
        if (isset($_GET['goods_name']) && !empty($_GET['goods_name'])) {
            $this->db->like ('sg.goods_name', trim ($_GET['goods_name']));
        }
        if (isset($_GET['goods_spu']) && !empty($_GET['goods_spu'])) {
            $this->db->like ('sg.goods_spu', trim ($_GET['goods_spu']));
        }
        if (isset($_GET['stocks_sku']) && !empty($_GET['stocks_sku'])) {
            $this->db->join ('shop_goods_extend_attr as sgea', 'sg.goods_id = sgea.goods_id', 'inner');
            $this->db->like ('sgea.stocks_sku', trim ($_GET['stocks_sku']));
        }
        if (isset($_GET['stocks_bar_code']) && !empty($_GET['stocks_bar_code'])) {
            $this->db->join ('shop_goods_extend_attr as sgea', 'sgea.goods_id = sg.goods_id', 'left');
            $this->db->like ('sgea.stocks_bar_code', trim ($_GET['stocks_bar_code']));
        }

        if (isset($_GET['year_to_market']) && !empty($_GET['year_to_market'])) {
            $this->db->where ('sg.year_to_market', $_GET['year_to_market']);
        }
        if (isset($_GET['season_to_market']) && !empty($_GET['season_to_market'])) {
            $this->db->where ('sg.season_to_market', $_GET['season_to_market']);
        }
        if (isset($_GET['sex']) && !empty($_GET['sex'])) {
            if ($_GET['sex'] == 3) {
                $_GET['sex'] = 0;
            }
            $this->db->where ('sg.sex', $_GET['sex']);
        }
        //商品有无图片
        if (isset($_GET['goods_image']) && !empty($_GET['goods_image'])) {
            if($_GET['goods_image']==1){
                $this->db->where("sg.goods_image is not null and sg.goods_image!=''");
            }elseif($_GET['goods_image']==2){
                $this->db->where("sg.goods_image is null");
            }
        }

        if($source == 'store' || $source == 'ebusiness' || $source == 'supply'){
            if ($source == 'store')     $ous_type = 1;      //微商城商品
            if ($source == 'ebusiness') $ous_type = 2;      //电商商品
            if ($source == 'supply')    $ous_type = 3;      //供应商商品
            $this->db->join ('store s','sg.goods_pos = s.store_id');
            $this->db->where('s.ous_type', $ous_type);
        }
        $this->db->where ("(sg.goods_pos > 0)"); //自建商品
        $this->db->where ("sg.goods_state != 0"); //未删除的

        $db = clone($this->db);
        $total = $this->db->count_all_results ();
        $this->db = $db;
        $this->db->limit ($rp, $start);
        $this->db->order_by ('goods_addtime', 'DESC');
        $rows = $this->db->get ()->result_array ();

        header ("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $goods_tag_arr = array ('' => '--', '1' => '新品', '2' => '推荐', '3' => '特价');
        foreach ($rows as $row) {
            $store = $this->db->select ('store_name')->where ('store_id', $row['goods_pos'])->get ('jk_store')->row ('store_name');
            $order_goods = $this->db->select ('goods_num')->where ('goods_id', $row['goods_id'])->get ('jk_shop_order_goods')->result_array ();
            $num = 0;
            foreach ($order_goods as $v) {
                $num += $v['goods_num'];
            }

            $goods_pic = PLUGIN . 'data/shop/album_pic/' . $row['goods_image'];
            $goods_info = '<i class="fa fa-photo" aria-hidden="true" data-geo="<img src=\'' . $goods_pic . '\'>"></i><span>' . $row['goods_name'] . '</span>';
            if (!empty($row['goods_spu'])) {
                $goods_info .= '<br><span>款号:</span><span>' . $row['goods_spu'] . '</span>';
            }
            if (!empty($row['goods_tag'])) {
                $goods_info .= '&nbsp;<span class="new_goods">' . $goods_tag_arr[$row['goods_tag']] . '</span>';
            }
            $goods_info .= '';
            $xml .= "<row id='" . $row['goods_id'] . "'>";
            //操作
            $xml .= "<cell><![CDATA[<a class='btn red' onclick=fg_delete({$row['goods_id']})>
            <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em>
            <i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
            <ul>";
//            $xml .= "<li><a onclick=fg_edit('{$row['goods_id']}')>编辑</a></li>";
            $xml .= "<li><a onclick=fg_move_to_pool({$row['goods_id']})>移到总库</a></li>";
            $xml .= "</ul>]]></cell>";

            $xml .= "<cell><![CDATA[" . $goods_info . "]]></cell>";
            $xml .= "<cell><![CDATA[￥：" . $row['goods_price'] . "]]></cell>";
            $xml .= "<cell><![CDATA[￥：" . $row['goods_marketprice'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $num . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $store . "]]></cell>";
            $xml .= "<cell><![CDATA[" . date ('Y-m-d H:i:s', $row['goods_addtime']) . "]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "<total>$total</total>";
        $xml .= "</rows>";
        echo $xml;
        exit;
    }

    //回收站
    public function get_trash_list ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;

        $start = ($page - 1) * $rp;
        $this->db->select ('sg.goods_id,sg.goods_name,sg.goods_price,sg.goods_state,sg.goods_image,sg.goods_jingle,sg.gc_id,sg.brand_id,sg.goods_marketprice,sg.goods_addtime,sg.goods_tag,sg.goods_spu,sgc.gc_name,sb.brand_name,');
        $this->db->from ('shop_goods as sg');
        $this->db->join ('shop_goods_class as sgc', 'sgc.gc_id = sg.gc_id', 'left');
        $this->db->join ('shop_brand as sb', 'sb.brand_id = sg.brand_id', 'left');
//        if ($qtype && $query) {
//            if ($qtype == 'brand_id') {
//                $this->db->like('brand_id', $query);
//            } elseif ($qtype == 'brand_name') {
//                $this->db->like('brand_name', $query);
//            } elseif ($qtype == 'brand_initial') {
//                $this->db->like('brand_initial', $query);
//            }
//        }

        $start_time = isset($_GET['start_time']) && !empty($_GET['start_time']) ? strtotime($_GET['start_time']) : false;
        $end_time = isset($_GET['end_time'])  && !empty($_GET['end_time']) ? strtotime($_GET['end_time']) : false;
        if($start_time){
            $this->db->where ("sg.goods_addtime>='{$start_time}'");
        }
        
        if($end_time){
            $this->db->where ("sg.goods_addtime<='{$end_time}'");
        }
        
        
        if (isset($_GET['brand_id']) && !empty($_GET['brand_id'])) {
            $this->db->where ('sg.brand_id', $_GET['brand_id']);
        }
        if (isset($_GET['goods_tag']) && !empty($_GET['goods_tag'])) {
            $this->db->like ('sg.goods_tag', $_GET['goods_tag']);
        }
        if (isset($_GET['available_coupons']) && !empty($_GET['available_coupons'])) {
            $this->db->where ('sg.available_coupons', $_GET['available_coupons']);
        }
        if (isset($_GET['goods_name']) && !empty($_GET['goods_name'])) {
            $this->db->like ('sg.goods_name', trim ($_GET['goods_name']));
        }
        if (isset($_GET['goods_spu']) && !empty($_GET['goods_spu'])) {
            $this->db->like ('sg.goods_spu', trim ($_GET['goods_spu']));
        }
        if (isset($_GET['stocks_sku']) && !empty($_GET['stocks_sku'])) {
            $this->db->join ('shop_goods_extend_attr as sgea', 'sg.goods_id = sgea.goods_id', 'inner');
            $this->db->like ('sgea.stocks_sku', trim ($_GET['stocks_sku']));
        }
        if (isset($_GET['stocks_bar_code']) && !empty($_GET['stocks_bar_code'])) {
            $this->db->join ('shop_goods_extend_attr as sgea', 'sgea.goods_id = sg.goods_id', 'left');
            $this->db->like ('sgea.stocks_bar_code', trim ($_GET['stocks_bar_code']));
        }

        if (isset($_GET['year_to_market']) && !empty($_GET['year_to_market'])) {
            $this->db->where ('sg.year_to_market', $_GET['year_to_market']);
        }
        if (isset($_GET['season_to_market']) && !empty($_GET['season_to_market'])) {
            $this->db->where ('sg.season_to_market', $_GET['season_to_market']);
        }
        if (isset($_GET['sex']) && !empty($_GET['sex'])) {
            if ($_GET['sex'] == 3) {
                $_GET['sex'] = 0;
            }
            $this->db->where ('sg.sex', $_GET['sex']);
        }
        //商品有无图片
        if (isset($_GET['goods_image']) && !empty($_GET['goods_image'])) {
            if($_GET['goods_image']==1){
                $this->db->where("sg.goods_image is not null and sg.goods_image!=''");
            }elseif($_GET['goods_image']==2){
                $this->db->where("sg.goods_image is null");
            }
        }

        $this->db->where ("sg.goods_state = 0"); //未删除的
        $db = clone($this->db);
        $total = $this->db->count_all_results ();
        $this->db = $db;
        $this->db->limit ($rp, $start);
        $this->db->order_by ('goods_id', 'DESC');
        $rows = $this->db->get ()->result_array ();

        header ("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $goods_tag_arr = array ('' => '--', '1' => '新品', '2' => '推荐', '3' => '特价');
        foreach ($rows as $row) {
            $order_goods = $this->db->select ('goods_num')->where ('goods_id', $row['goods_id'])->get ('jk_shop_order_goods')->result_array ();
            $num = 0;
            foreach ($order_goods as $v) {
                $num += $v['goods_num'];
            }
            $goods_pic = PLUGIN . 'data/shop/album_pic/' . $row['goods_image'];
            $goods_info = '<i class="fa fa-photo" aria-hidden="true" data-geo="<img src=\'' . $goods_pic . '\'>"></i><span>' . $row['goods_name'] . '</span>';
            if (!empty($row['goods_spu'])) {
                $goods_info .= '<br><span>款号:</span><span>' . $row['goods_spu'] . '</span>';
            }
            if (!empty($row['goods_tag'])) {
                $goods_info .= '&nbsp;<span class="new_goods">' . $goods_tag_arr[$row['goods_tag']] . '</span>';
            }
            $goods_info .= '';
            $xml .= "<row id='" . $row['goods_id'] . "'>";
            //操作
            $xml .= "<cell><![CDATA[<a class='btn red' onclick=fg_completely_delete({$row['goods_id']})>
            <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em>
            <i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
            <ul>";
            $xml .= "<li><a onclick=fg_edit({$row['goods_id']})>编辑</a></li>";
            $xml .= "<li><a onclick=fg_restore({$row['goods_id']})>还原</a></li>";
            $xml .= "</ul>]]></cell>";

            $xml .= "<cell><![CDATA[" . $goods_info . "]]></cell>";
            $xml .= "<cell><![CDATA[￥：" . $row['goods_marketprice'] . "]]></cell>";
            $xml .= "<cell><![CDATA[￥：" . $row['goods_price'] . "]]></cell>";
            $xml .= "<cell><![CDATA[" . $num . "]]></cell>";
            $xml .= "<cell><![CDATA[" . date ('Y-m-d H:i:s', $row['goods_addtime']) . "]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "<total>$total</total>";
        $xml .= "</rows>";
        echo $xml;
        exit;
    }

//    /* 商品管理——添加商品——第一步 */

    public function goods_add_goods ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        if (isset($_GET['op']) && $_GET['op'] == 'edit') {
            $goods_id = $_GET['goods_id'];
            $this->db->select ('sg.goods_id,sg.gc_id,sg.gc_id_1,sg.gc_id_2,sg.gc_id_3,gc1.gc_name as gc1_name,gc2.gc_name as gc2_name,gc3.gc_name as gc3_name,');
            $this->db->from ('shop_goods as sg');
            $this->db->join ('shop_goods_class as gc1', 'gc1.gc_id=sg.gc_id_1', 'left');
            $this->db->join ('shop_goods_class as gc2', 'gc2.gc_id=sg.gc_id_2', 'left');
            $this->db->join ('shop_goods_class as gc3', 'gc3.gc_id=sg.gc_id_3', 'left');
            $this->db->where ('goods_id', $goods_id);
            $goods_info = $this->db->get ()->row_array ();
            $second_classes = $this->db->select ('gc_id,gc_name,gc_parent_id')->from ('shop_goods_class')->where ('gc_parent_id', $goods_info['gc_id_1'])->where ('gc_show', 1)->get ()->result_array ();
            $thrid_classes = $this->db->select ('gc_id,gc_name,gc_parent_id')->from ('shop_goods_class')->where ('gc_parent_id', $goods_info['gc_id_2'])->where ('gc_show', 1)->get ()->result_array ();
            $this->smarty->assign ('goods_id', $goods_id);
            $this->smarty->assign ('goods_info', $goods_info);
            $this->smarty->assign ('second_classes', $second_classes);
            $this->smarty->assign ('thrid_classes', $thrid_classes);
        }
        $first_classes = $this->db->select ('gc_id,gc_name,gc_parent_id')->from ('shop_goods_class')->where ('gc_parent_id', 0)->where ('gc_show', 1)->get ()->result_array ();
        $this->smarty->assign ('first_classes', $first_classes);
        $this->smarty->display ('goods_add_goods.html');
    }

    /* 商品管理——添加商品——第二步 */

    public function goods_add_goods_second ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $class_id = isset($_COOKIE['gc_id']) ? $_COOKIE['gc_id'] : 0;
        $goods_pos = isset($_GET['goods_pos']) ? $_GET['goods_pos'] : 0;
//        $class_id = 1068;
        define ('COLOR_ID', '1');   //颜色的ID
        if ($class_id) {
            $curr_class_info = $this->db->select ('sgc.gc_id,sgc.gc_name,sgc.gc_parent_id,st.type_id')->from ('shop_goods_class as sgc')->join ('shop_type as st', 'st.class_id=sgc.gc_id', 'left')->where ('gc_id', $class_id)->get ()->row_array ();
//            $class_str .= $curr_class_info['gc_name'];
            $brands = [];
//            $specs = [];
            $attr_arr = [];
            $attr_custom = [];
            $size_arr = [];
            $size_types = [];
            /*$sizes = $this->db->select('css.size,css.flag,css.cs_id')->from('code_segment_size css')->join('code_segment cs','css.cs_id=cs.cs_id')->where('gc_id',$curr_class_info['gc_id'])->order_by('css.cs_id,css.flag,css.size')->get()->result_array();
            if(!empty($sizes)){
                $flag_arr = array('1'=>'中国码','2'=>'美国码','3'=>'英国码','4'=>'日本码');
                foreach($sizes as $k=>$v){
                    $size_arr[$v['flag']]['size_list'][] = $v;
                    if(array_key_exists($v['flag'],$size_types)===false){
                        $size_types[$v['flag']] = array(
                            'id'=>$v['flag'],
                            'name'=>$flag_arr[$v['flag']],
                        );
                    }
                }
            }
            if (!empty($curr_class_info['type_id'])) {
                $brands = $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial')->from('shop_brand as sb')->join('shop_type_brand as stb', 'sb.brand_id=stb.brand_id', 'left')->order_by('sb.brand_initial')->where('stb.type_id', $curr_class_info['type_id'])->where("sb.brand_name is not NULL AND sb.brand_name != ''")->group_by('sb.brand_id')->get()->result_array(); //品牌信息
//                $specs = $this->db->select('ss.sp_id,ss.sp_name,ss.class_id')->from('shop_spec as ss')->join('shop_type_spec as sts', 'sts.sp_id=ss.sp_id', 'left')->group_start()->where('sts.type_id', $curr_class_info['type_id'])->or_group_start()->where('ss.class_id', 0)->group_end()->group_end()->where("ss.sp_name is not NULL AND ss.sp_name != ''")->group_by('ss.sp_id')->order_by('ss.sp_sort')->get()->result_array(); //规格信息
//             var_dump($this->db->last_query());exit;
                $attributes = $this->db->select('sa.attr_id,sa.attr_name,sa.is_user_defined')->from('shop_attribute as sa')->where('sa.type_id', $curr_class_info['type_id'])->where('sa.attr_show', 1)->get()->result_array();    //属性
                $attr_arr = array();
                $attr_custom = array();
                if (!empty($attributes)) {//属性值选项
                    foreach ($attributes as $v) {
                        if ($v['is_user_defined'] != 1) {
                            $attr_arr[$v['attr_id']] = $v;
                            $attr_arr[$v['attr_id']]['values'] = $this->db->select('attr_value_id,attr_value_name,attr_id,type_id')->from('shop_attribute_value')->where('attr_id', $v['attr_id'])->get()->result_array();
                        } else {
                            $attr_custom[$v['attr_id']] = $v;   //自定义属性
                        }
                    }
                }
            }
            */
            $this->smarty->assign ('type_id', $curr_class_info['type_id']);
            $this->smarty->assign ('class_id', $class_id);
            $this->smarty->assign ('class_name', $curr_class_info['gc_name']);
            $this->smarty->assign ('size_types', $size_types);
            $this->smarty->assign ('sizes', $size_arr);
            $this->smarty->assign ('brands', $brands);
//            $this->smarty->assign('specs', $specs);
            $this->smarty->assign ('attr_arr', $attr_arr);
            $this->smarty->assign ('attr_custom', $attr_custom);
        }
        $cate_id = $class_id ? $class_id : 0;
//        $cate_arr = $this->goods_model->get_cate_by_parent_id(0);
//        $cate_option = $this->goods_model->cate_array_to_option($cate_arr, $cate_id); //分类选项
//        $gstn_arr = $this->goods_model->get_gstn_by_parent_id(0);
//        $gstn_id = 0;
//        $gstn_option = $this->goods_model->gstn_array_to_option($gstn_arr, $gstn_id,true); //分类选项(需要拼接分类名称)
        $shop_albums = $this->db->select ('aclass_id,aclass_name')->from ('shop_album_class')->order_by ('aclass_sort')->get ()->result_array ();
        $pic_list = $this->db->select ('apic_id,apic_name,aclass_id,apic_cover')->from ('shop_album_pic')->get ()->result_array ();
        $colors = $this->goods_model->get_color_by_parent_id ();
        $this->smarty->assign ('shop_albums', $shop_albums);
//        $this->smarty->assign('cate_option', $cate_option);
//        $this->smarty->assign('gstn_option',$gstn_option);
        $this->smarty->assign ('pic_list', $pic_list);
        $this->smarty->assign ('color_id', COLOR_ID);
        $this->smarty->assign ('goods_pos', $goods_pos);
        $this->smarty->assign ('colors', json_encode ($colors));
        $year = date ('Y');
        $year_arr = array ();
        $this->smarty->assign ('year', $year);
        for ($i = 10; $i >= 1; $i--) {
            $year_arr[] = $year - $i + 4;
        }
        $this->smarty->assign ('year_arr', $year_arr);
        $this->smarty->display ('goods_add.html');
    }

    /* 商品管理——编辑——第二步 */

    public function goods_edit_goods_second ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $goods_id = isset($_GET['goods_id']) ? $_GET['goods_id'] : false;
        define ('COLOR_ID', '1');   //颜色规格的ID
        if ($goods_id) {
            //商品的信息
            $goods_info = $this->db->select ('sg.year_to_market,sg.season_to_market,sg.sex,sg.goods_id,sg.gc_id,sg.gc_name,sg.goods_name,sg.goods_jingle,sg.brand_id,sg.goods_price,sg.goods_marketprice,sg.discount,sg.goods_spec,sg.goods_image,sg.goods_state,sg.pc_desc,sg.mobile_desc,sg.color_id,sg.goods_addtime,sg.goods_spu,sg.logistics_type,sg.limit_num,sg.available_coupons,sg.available_member_dis,sg.goods_tag,sb.brand_name,sg.weight')->from ('shop_goods as sg')->join ('shop_brand as sb', 'sg.brand_id=sb.brand_id', 'left')->where ('sg.goods_id', $goods_id)->get ()->row_array ();
            $goods_info['discount'] = $goods_info['discount'] * 100;
            $class_id = $goods_info['gc_id'];
//            $cate_arr = $this->goods_model->get_cate_by_parent_id(0);
//            $cate_option = $this->goods_model->cate_array_to_option($cate_arr, $class_id); //分类选项
            $curr_class_info = $this->db->select ('sgc.gc_id,sgc.gc_name,sgc.gc_parent_id,st.type_id')->from ('shop_goods_class as sgc')->join ('shop_type as st', 'st.class_id=sgc.gc_id', 'left')->where ('gc_id', $class_id)->get ()->row_array ();
            $brands = [];
//            $specs = [];
            $attr_arr = [];
            $attr_custom = [];
            $size_arr = [];
            $size_types = [];
            $sizes = $this->db->select ('css.size,css.flag')->from ('code_segment_size css')
                ->join ('shop_brand b', 'b.brand_size_type=css.flag')->where ('b.brand_id', $goods_info['brand_id'])
                ->order_by ('css.size')->get ()->result_array ();
            if (!empty($sizes)) {
                $flag_arr = array ('1' => '中国码', '2' => '美国码', '3' => '英国码', '4' => '日本码');
                foreach ($sizes as $k => $v) {
                    $size_arr[$v['flag']]['size_list'][] = $v;
                    if (array_key_exists ($v['flag'], $size_types) === false) {
                        $size_types[$v['flag']] = array (
                            'id' => $v['flag'],
                            'name' => $flag_arr[$v['flag']],
                        );
                    }
                }
            }
            if (!empty($curr_class_info['type_id'])) {
                $brands = $this->db->select ('sb.brand_id,sb.brand_name,sb.brand_initial')->from ('shop_brand as sb')->join ('shop_type_brand as stb', 'sb.brand_id=stb.brand_id', 'left')->order_by ('sb.brand_initial')->where ('stb.type_id', $curr_class_info['type_id'])->where ("sb.brand_name is not NULL AND sb.brand_name != ''")->group_by ('sb.brand_id')->get ()->result_array (); //品牌信息
                $attributes = $this->db->select ('sa.attr_id,sa.attr_name,sa.is_user_defined')->from ('shop_attribute as sa')->where ('sa.type_id', $curr_class_info['type_id'])->where ('sa.attr_show', 1)->get ()->result_array ();
                $attr_arr = array ();
                $attr_custom = array ();
                if (!empty($attributes)) {
                    foreach ($attributes as $v) {
                        if ($v['is_user_defined'] != 1) {
                            $attr_arr[$v['attr_id']] = $v;
                            $attr_arr[$v['attr_id']]['values'] = $this->db->select ('attr_value_id,attr_value_name,attr_id,type_id')->from ('shop_attribute_value')->where ('attr_id', $v['attr_id'])->get ()->result_array ();
                        } else {
                            $attr_custom[$v['attr_id']] = $v;
                        }
                    }
                }
            }
            $shop_albums = $this->db->select ('aclass_id,aclass_name')->from ('shop_album_class')->order_by ('aclass_sort')->get ()->result_array ();
            $pic_list = $this->db->select ('apic_id,apic_name,aclass_id,apic_cover')->from ('shop_album_pic')->get ()->result_array ();
            $colors = $this->goods_model->get_color_by_parent_id ();

            $goods_attr_info = $this->db->select ('gai.goods_attr_id,gai.goods_id,gai.attr_id,gai.attr_value_id,gai.attr_value,gai.attr_price')->from ('shop_goods_attr_index as gai')->where ('gai.goods_id', $goods_id)->get ()->result_array ();
            //颜色表
            $goods_extend_info = $this->db->select ('ge.goods_a_id,ge.goods_id,ge.color,ge.color_value,ge.color_remark')->from ('shop_goods_extend as ge')->where ('ge.goods_id', $goods_id)->order_by ('ge.goods_a_id')->get ()->result_array ();
            //颜色尺码表
            $goods_extend_attr_info = $this->db->select ('gea.goods_ea_id,ge.goods_a_id,ge.goods_id,ge.color,ge.color_value,
                ge.color_remark,gea.size,gea.stocks_price,gea.stocks_marketprice,gea.stocks_sku,gea.stocks_bar_code,gea.size_note,
                ')->from ('shop_goods_extend as ge')
            ->join('shop_goods_extend_attr as gea','gea.goods_a_id=ge.goods_a_id','left')->where ('ge.goods_id', $goods_id)->order_by ('gea.goods_ea_id')->get ()->result_array ();
            $goods_gstn_info = $this->db->select ('sgt.sgastn_id,sgt.goods_id,sgt.gstn_id,sgt.gstn_name')->from ('shop_goods_attr_self_taxonomy as sgt')->where ('sgt.goods_id', $goods_id)->order_by ('sgt.sgastn_id')->get ()->result_array ();
//            $gstn_arr = $this->goods_model->get_gstn_by_parent_id(0);
            $gstn_ids = '';
            if (!empty($goods_gstn_info)) {
                foreach ($goods_gstn_info as $v) {
                    $gstn_ids .= $v['gstn_id'] . ',';
                }
                $gstn_ids = rtrim ($gstn_ids, ',');
            }
            $default_pic = PLUGIN . 'data/images/' . $this->common_function->get_system_value ('default_goods_image');
            if (!empty($goods_info['goods_image']) && file_exists (ROOTPATH . 'data/shop/album_pic/' . $goods_info['goods_image'])) {
                $goods_info['img_url'] = GOODIMAGE . $goods_info['goods_image'];
            } else {
                $goods_info['img_url'] = $default_pic;
            }
            $goods_extend_arr = array ();
            if (!empty($goods_extend_info)) {
                foreach ($goods_extend_info as $v) {
                    $goods_extend_arr[] = $v['goods_a_id'];
                }
            }
            $code_segment = 1;
            $goods_extend_attr_arr = array ();
            $goods_sizes = [];
            //print_r($goods_extend_attr_info);exit;
            if (!empty($goods_extend_attr_info)) {
                foreach ($goods_extend_attr_info as $v) {
                    if ($v['size'] == '') {
                        $empty_size = $this->db->select ('size')->where ('goods_id', $v['goods_id'])->where ("size is not null and size !=''")->group_by ('size')->get ('shop_goods_extend_attr')->result_array ();
                        //print_r($empty_size);die;
                        $kvi = 1;
                        if(!empty($empty_size)){
                        	foreach ($empty_size as $kev => $vev) {
                        		if ($kvi > 1) {
                        			$v['goods_ea_id'] = '';
                        		}
                        		$v['size'] = $vev['size'];
                        		$goods_extend_attr_arr[$v['goods_a_id']][] = $v;
                        		$goods_sizes[] = $vev['size'];
                        		$kvi++;
                        	}
                        }else{
                        	$goods_extend_attr_arr[$v['goods_a_id']][] = $v;
                        	$goods_sizes[] = '';
                        }
                        

                    } else {
                        $goods_extend_attr_arr[$v['goods_a_id']][] = $v;
                        $goods_sizes[] = $v['size'];
                    }

                    //$code_segment = $v['code_segment'];
                }

            }
//            var_dump($goods_extend_attr_arr);exit;
            $mobile_desc = (array)json_decode ($goods_info['mobile_desc']);
            $mobile_desc_arr = array ();
            if (!empty($mobile_desc)) {
                foreach ($mobile_desc as $v) {
                    $mobile_desc_arr[] = (array)$v;
                }
            }
            $color_amount = count ($goods_extend_arr);
            $goods_sizes = array_unique ($goods_sizes);
            $size_amount = count ($goods_sizes);
            //print_r($size_arr);print_r($goods_sizes);print_r($code_segment);die;
            $this->smarty->assign ('goods_id', $goods_id);
            $this->smarty->assign ('type_id', $curr_class_info['type_id']);
            $this->smarty->assign ('class_id', $class_id);
            $this->smarty->assign ('class_name', $curr_class_info['gc_name']);
            $this->smarty->assign ('brands', $brands);
            $this->smarty->assign ('attr_arr', $attr_arr);
            $this->smarty->assign ('attr_custom', $attr_custom);
            $this->smarty->assign ('shop_albums', $shop_albums);
            $this->smarty->assign ('pic_list', $pic_list);
            $this->smarty->assign ('color_id', COLOR_ID);
            $this->smarty->assign ('colors', json_encode ($colors));
            $this->smarty->assign ('goods_info', $goods_info);
            $this->smarty->assign ('goods_attr_info', json_encode ($goods_attr_info));
            $this->smarty->assign ('goods_amount_info', $goods_extend_info);
            $this->smarty->assign ('goods_extend_info', $goods_extend_info);
            $this->smarty->assign ('goods_extend_attr_arr', $goods_extend_attr_arr);
            $this->smarty->assign ('gstn_ids', $gstn_ids);
            $this->smarty->assign ('size_types', $size_types);
            $this->smarty->assign ('sizes', $size_arr);
            $this->smarty->assign ('mobile_desc_arr', $mobile_desc_arr);
            $this->smarty->assign ('color_amount', $color_amount);
            $this->smarty->assign ('size_amount', $size_amount);
            $this->smarty->assign ('goods_sizes', $goods_sizes);
            $this->smarty->assign ('code_segment', $code_segment);
            //print_r($goods_extend_attr_arr);print_r($size_arr);print_r($goods_sizes);die;
            $this->smarty->display ('goods_edit_goods_second.html');
        }
    }

    /* 商品管理——添加商品——第三步 */
    //添加商品货号检测
    public function checkStockCode ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $goods_id = isset($_POST['goods_id']) ? trim ($_POST['goods_id']) : '';
        $stock_code = isset($_POST['stock_code']) ? trim ($_POST['stock_code']) : '';
        $brand_id = isset($_POST['brand_id']) ? trim ($_POST['brand_id']) : '';
        $goods_ea_id = isset($_POST['goods_ea_id']) ? trim ($_POST['goods_ea_id']) : '';
        if ($stock_code && $brand_id) {
            if ($goods_ea_id) {
                $check_sku = $this->db->select ('g.goods_id,se.goods_ea_id')->from ('shop_goods_extend_attr se')
                    ->join ('shop_goods g', 'g.goods_id=se.goods_id', 'left')
                    ->where ('g.brand_id', $brand_id)->where ('se.stocks_sku', $stock_code)->where ('g.goods_pos', 0)->where ('g.goods_state!=0')->get ()->result_array ();
                $sku = array ();
                foreach ($check_sku as $k => $v) {
                    $sku[$v['goods_id']][$v['goods_ea_id']] = $v;
                }
                //print_r($sku);die;
                if (count ($sku) >= 2) {
                    $value = false;
                } else {
                    if (empty($sku)) {
                        $value = true;
                    } else {
                        if ($goods_id) {
                            if (isset($sku[$goods_id][$goods_ea_id])) {
                                $value = true;
                            } else {
                                $value = false;
                            }
                        } else {
                            $value = false;
                        }
                    }


                }
            } else {
                $num = $this->db->select ('g.goods_id')->from ('shop_goods_extend_attr se')
                    ->join ('shop_goods g', 'g.goods_id=se.goods_id', 'left')
                    ->where ('g.brand_id', $brand_id)->where ('se.stocks_sku', $stock_code)->where ('g.goods_pos', 0)->where ('g.goods_state!=0')->get ()->row ('goods_id');
                if ($num) {
                    //print_r($goods_id);die;
                    if ($goods_id && $goods_id == $num) {
                        $value = true;
                    } else {
                        $value = false;
                    }
                } else {
                    $value = true;
                }
            }

        } else {
            $value = false;
        }
        echo json_encode ($value);
    }

    //添加商品spu检测
    public function checkSpu ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $goods_id = isset($_POST['goods_id']) ? trim ($_POST['goods_id']) : '';
        $spu = isset($_POST['goods_spu']) ? trim ($_POST['goods_spu']) : '';
        $brand_id = isset($_POST['brand_id']) ? trim ($_POST['brand_id']) : '';
        if ($spu && $brand_id) {
            $num = $this->db->select ('goods_id as num')->where ('goods_spu', $spu)->where ('brand_id', $brand_id)->where ('goods_pos', 0)->where ('goods_state!=0')->get ('shop_goods')->row ('num');
            if ($num) {
                if ($goods_id && $goods_id == $num) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else {
                echo 'true';
            }
        } else {
            echo 'false';
        }
    }

    public function goods_add_goods_third ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        //print_r($_POST);print_r($_GET);die;
//        isset($_POST['base_info']['goods_name'])?$_POST['base_info']['goods_name']:"";
//        if (stripos ($_POST['base_info']['goods_name'], "'")) {
//            $_POST['base_info']['goods_name'] = str_replace ("'", "’", $_POST['base_info']['goods_name']);
//        }

        $data = array ('state' => false, 'msg' => '操作失败，请重试！');
        $base_info = isset($_POST['base_info'])?$_POST['base_info']:"";
        if (isset($base_info['gc_id'])) {
            setcookie ("gc_id", $base_info['gc_id'], time () + 1800);
            if (!empty($base_info['gc_id'])) {
                $top_gc_id = $this->db->select ('gc_parent_id')->where ('gc_id', $base_info['gc_id'])->get ('shop_goods_class')->row ('gc_parent_id');
                if ($top_gc_id == 0) {
                    $base_info['gc_id1'] = $base_info['gc_id'];
                } else {
                    $top_gc_id0 = $this->db->select ('gc_parent_id')->where ('gc_id', $top_gc_id)->get ('shop_goods_class')->row ('gc_parent_id');
                    if ($top_gc_id0 == 0) {
                        $base_info['gc_id2'] = $base_info['gc_id'];
                        $base_info['gc_id1'] = $top_gc_id;
                    } else {
                        //$top_gc_id1 = $this->db->select('gc_parent_id')->where('gc_id',$top_gc_id0)->get('shop_goods_class')->row('gc_parent_id');
                        $base_info['gc_id3'] = $base_info['gc_id'];
                        $base_info['gc_id2'] = $top_gc_id;
                        $base_info['gc_id1'] = $top_gc_id0;
                    }

                }
            }
        }
        $spec_info = empty($_POST['sp_val']) ? false : $_POST['sp_val'];
        $attr_info = empty($_POST['attr']) ? false : $_POST['attr'];
        $specInfo = isset($_POST['attr_value_list']) ? $_POST['attr_value_list'] : array ();
        $specInfoS = isset($_POST['attr_value_list_s']) ? $_POST['attr_value_list_s'] : array ();
        $specInfo_val = isset($_POST['attr_price_list']) ? $_POST['attr_price_list'] : array ();
        $goods_spec_val_price = array ();
        foreach ($specInfo_val as $k => $v) {
            $i = 0;
            foreach ($v as $ka => $va) {
                if (trim ($va) != '') {
                    $goods_spec_val_price[$k][$i] = $va;
                    $i++;
                }
            }
        }
        $goods_spec_val = array ();
        foreach ($specInfo as $k => $v) {
            $i = 0;
            foreach ($v as $ka => $va) {
                if (trim ($va) != '') {
                    $goods_spec_val[$k][$i] = $va;
                    $i++;
                }
            }
        }
        $goods_specS_val = array ();
        foreach ($specInfoS as $k => $v) {
            $i = 0;
            foreach ($v as $ka => $va) {
                if (trim ($va) != '') {
                    $sp_select_lists = $this->db->select ('sp_select_lists')->where ('sp_id', $k)->get ('shop_spec')->row ('sp_select_lists');
                    $sp_select_lists = unserialize ($sp_select_lists);
                    $goods_spec_val[$k][$va] = $sp_select_lists[$va];
                    $i++;
                }
            }
        }

        //print_r($goods_spec_val); print_r($goods_spec_val_price);print_r($goods_specS_val);die;
//        $rate = empty($_POST['rate']) ? false : $_POST['rate'];
        $gstn = empty($_POST['gstn']) ? false : $_POST['gstn'];
//        $goods_amount = empty($_POST['color']) ? false : $_POST['color'];
        $base_info['mobile_desc'] = empty($_POST['m_body']) ? '' : $_POST['m_body'];
        $base_info['pc_desc'] = empty($_POST['content']) ? '' : $_POST['content'];
        //$base_info['discount'] = empty($base_info['discount']) ? 0 : sprintf("%.2f",$base_info['discount']/100);
        $time = time ();
        $base_info['goods_state'] = 1; //未被删除
        $base_info['goods_addtime'] = $time;
        $base_info['goods_edittime'] = $time;
        $base_info['pc_desc'] = isset($_POST['content'])?$_POST['content']:"";
        $base_info['year_to_market'] = isset($base_info['year_to_market'])?$base_info['year_to_market']:"";
        $base_info['season_to_market'] = isset($base_info['season_to_market'])?$base_info['season_to_market']:"";
        $base_info['sex'] = isset($base_info['sex'])?$base_info['sex']:"";
        $base_info['discount'] = $base_info['discount'] ? $base_info['discount'] / 100 : 1;
        $base_info['weight'] = isset($base_info['weight']) ? $base_info['weight'] : 0;
        $base_info['goods_spu'] = isset($base_info['goods_spu']) ? strtoupper ($base_info['goods_spu']) : false;
// 	    var_dump($base_info['goods_price']);
        $base_info['goods_price'] = empty($base_info['goods_price']) || $base_info['goods_price'] == '0.00' ? '-1' : $base_info['goods_price'];
// 	    var_dump($base_info['goods_price']);exit;
        if (isset($_POST['goods_tag']) && !empty($_POST['goods_tag'])) {
            $base_info['goods_tag'] = implode ('', $_POST['goods_tag']);
        }
        $attr_arr = array ();

//        if ($spec_info) {//序列化规格信息
//            $spec_arr = array();
//            foreach ($spec_info as $k => $v) {
//                $spec_arr[$v['id']] = $v['value'];
//            }
//            $base_info['goods_spec'] = serialize($spec_arr);
//        }
//        if (isset($_POST['single_stocks_code_flag']) && $_POST['single_stocks_code_flag'] == 'multiple') {
//            //
//        } else {
//            $goods_amount[0]['stocks_marketprice'] = $base_info['goods_marketprice'];
////            $goods_amount[0]['cost_price'] = $base_info['goods_costprice'];
//            $goods_amount[0]['stocks_price'] = $base_info['goods_price'];
////            $goods_amount[0]['alert_amount'] = $base_info['goods_storage_alarm'];
//            $goods_amount[0]['stocks_sku'] = $base_info['goods_spu'];
//            $goods_amount[0]['color_remark'] = '均色';
////            $goods_amount[0]['stocks_barcode'] = isset($_POST['stocks_barcode']) ? $_POST['stocks_barcode'] : '';
//        }
        $color_arr = !empty($_POST['color']) ? $_POST['color'] : false;
        $size_arr = !empty($_POST['size']) ? $_POST['size'] : false;
         //print_r($color_arr);print_r($size_arr);die;
        if ($color_arr) {
            array_pop ($color_arr); // 删除最后一个元素
        }
        if (isset($_GET['op']) && $_GET['op'] == 'edit') {
            //修改的时候
            $goods_id = isset($_GET['goods_id']) ? $_GET['goods_id'] : false;
            unset($base_info['goods_addtime']);
            if ($goods_id) {
                //商品属性
                $old_spec = $this->db->select ('sg.attr_id,sg.attr_value_id,sg.attr_value,sg.goods_attr_id')->from ('shop_goods_attr_index as sg')
                    ->join ('shop_spec as s', 's.sp_id=sg.attr_id')
                    ->where ('sg.goods_id', $goods_id)->get ()->result_array ();
                //print_r($goods_spec_val);print_r($old_spec);die;
                $old_spec_ = array ();
                foreach ($old_spec as $k => $v) {
                    $old_spec_[$v['attr_id']][$v['attr_value_id']] = $v['goods_attr_id'];
                }
                $sql_goods_spec = array ();
                $sql_goods_spec_up = array ();
                $del_goods_spec = $old_spec_;
                if (!empty($goods_spec_val)) {
                    foreach ($goods_spec_val as $k => $v) {
                        $ii = 0;
                        foreach ($v as $ka => $va) {

                            if (isset($goods_spec_val_price[$k][$ka])) {
                                $sql_ = array (
                                    'goods_id' => $goods_id, 'attr_id' => $k, 'attr_value_id' => $ka,
                                    'attr_value' => $va, 'attr_price' => $goods_spec_val_price[$k][$ka],
                                );
                            } else {
                                $sql_ = array (
                                    'goods_id' => $goods_id, 'attr_id' => $k, 'attr_value_id' => $ka,
                                    'attr_value' => $va, 'attr_price' => '',
                                );
                            }
                            if (isset($old_spec_[$k][$ka])) {
                                $sql_['goods_attr_id'] = $old_spec_[$k][$ka];
                                $sql_goods_spec_up[] = $sql_;
                                unset($del_goods_spec[$k][$ka]);
                            } else {
                                $sql_goods_spec[] = $sql_;
                            }
                        }

                    }
                }
                $del_attr_id = array ();
                foreach ($del_goods_spec as $v) {
                    foreach ($v as $va) {
                        $del_attr_id[] = $va;
                    }
                }
                //print_r($sql_goods_spec);print_r($sql_goods_spec_up);print_r($del_attr_id);die;
                //开始编辑商品信息
//                 var_dump($base_info);exit;
                $this->db->trans_off (); //禁用事务
                $this->db->trans_start (); //开启事务
                $result = $this->db->update ('shop_goods', $base_info, array ('goods_id' => $goods_id));     //插入基本信息
                if (!empty($del_attr_id)) {
                    $result = $this->db->where_in ('goods_attr_id', $del_attr_id)->delete ('shop_goods_attr_index');//删除属性
                }
                if (!empty($sql_goods_spec)) {
                    $result = $this->db->insert_batch ('shop_goods_attr_index', $sql_goods_spec);//更改属性
                    //print_r($this->db->last_query());die;
                }
                if (!empty($sql_goods_spec_up)) {
                    $result = $this->db->update_batch ('shop_goods_attr_index', $sql_goods_spec_up, 'goods_attr_id');//插入属性
                }
                if ($attr_info) {  //处理属性
                    foreach ($attr_info as $k => $v) {
//                         if(empty($v['attr_value_id']) && empty($v['user_attr_value'])){
//                             unset($attr_info[$k]);
//                             continue;
//                         }else{
//                             $attr_info[$k]['goods_id'] = $goods_id;
//                         }
                        $attr_info[$k]['goods_id'] = $goods_id;
                    }
                }
                if (!empty($attr_info)) {
                    foreach ($attr_info as $k => $v) {
                        $attr_info[$k]['goods_id'] = $goods_id;
                        $attr_arr[] = $attr_info[$k];
                    }
                    //$result = $this->db->insert_batch('shop_goods_attr_index', $attr_arr);  //插入商品与属性对应
                }
                //var_dump($result);
                //处理扩展表（颜色）
                $old_goods_amount_info = $this->db->select ('goods_a_id')->from ('shop_goods_extend')->where ('goods_id', $goods_id)->get ()->result_array ();
                $old_goods_extend_attr = $this->db->select ('goods_ea_id')->from ('shop_goods_extend_attr')->where ('goods_id', $goods_id)->get ()->result_array ();
                $old_goods_amount_arr = array ();
                foreach ($old_goods_amount_info as $v) {
                    $old_goods_amount_arr[] = $v['goods_a_id'];
                }
                $old_goods_extend_attr_arr = array ();
                foreach ($old_goods_extend_attr as $v) {
                    $old_goods_extend_attr_arr[] = $v['goods_ea_id'];
                }
                $new_goods_amount_arr = array ();
                $new_goods_extend_attr_arr = array ();
                if ($color_arr) {
                    foreach ($color_arr as $k => $v) { //循环插入商品颜色表
                        $goods_a_id = '';
                        $v['goods_id'] = $goods_id;
                        if (isset($v['goods_a_id']) && !empty($v['goods_a_id'])) {
                            $new_goods_amount_arr[] = $v['goods_a_id'];
                            $goods_a_id = $v['goods_a_id'];
                            unset($v['goods_a_id']);
                            $result = $this->db->update ('shop_goods_extend', $v, array ('goods_a_id' => $goods_a_id));

                        } else {
                            $result = $this->db->insert ('shop_goods_extend', $v);  //插入商城货品库存表
                            $goods_a_id = $this->db->insert_id ();
                        }
                        $color_arr[$k]['goods_a_id'] = $goods_a_id;
                    }
                }
                //print_r($color_arr);print_r($size_arr);die;
                if ($size_arr) {
                    foreach ($size_arr as $k => $v) {
                        if (is_array ($v)) {
                            foreach ($v as $kk => $vv) {
                                /* if(empty($vv['stocks_sku'])){
                                    continue;
                                } */
                                $vv['stocks_sku'] = isset($vv['stocks_sku'])? strtoupper ($vv['stocks_sku']):'';
                                if (isset($vv['goods_ea_id']) && !empty($vv['goods_ea_id'])) {
                                    $new_goods_extend_attr_arr[] = $vv['goods_ea_id'];
                                    $goods_ea_id = $vv['goods_ea_id'];
                                    unset($vv['goods_ea_id']);
                                    if(isset($vv['code_segment'])){
                                    	unset($vv['code_segment']);
                                    }
                                    
                                    $result = $this->db->update ('shop_goods_extend_attr', $vv, array ('goods_ea_id' => $goods_ea_id));
                                    if (!empty($vv['stocks_sku']) || !empty($vv['stocks_bar_code'])) {
                                        $this->db->where ('goods_ea_id', $goods_ea_id)
                                            ->update ('store_stocks_amount', array ('stocks_sn' => $vv['stocks_sku'], 'stocks_bar_code' => $vv['stocks_bar_code']));
                                    }
                                } else {
                                    if ((array_key_exists ($k, $color_arr) !== false) && $color_arr[$k]['color'] == $vv['color']) {
                                        $goods_size = array (
                                            'goods_a_id' => $color_arr[$k]['goods_a_id'],
                                            'goods_id' => $goods_id,
                                            'size' => $vv['size'],
                                            'size_note' => $vv['size_note'],
                                            // 'code_segment'=>$vv['code_segment'],
                                            'color' => $color_arr[$k]['color'],
                                            'color_value' => $color_arr[$k]['color_value'],
                                            'color_remark' => isset($color_arr[$k]['color_remark']) ? $color_arr[$k]['color_remark'] : '',
                                            'stocks_price' => $vv['stocks_price'],
                                            'stocks_marketprice' => $vv['stocks_marketprice'],
                                            'stocks_sku' => $vv['stocks_sku'],
                                            'stocks_bar_code' => $vv['stocks_bar_code'],
                                        );
                                        $result = $this->db->insert ('shop_goods_extend_attr', $goods_size);  //插入商城货品库存表
                                    }
                                }
                            }
                        }
                    }
                }
                $del_goods_amount = array_diff ($old_goods_amount_arr, $new_goods_amount_arr);
                $del_goods_extend_attr = array_diff ($old_goods_extend_attr_arr, $new_goods_extend_attr_arr);
                if (!empty($del_goods_amount)) {
                    $result = $this->db->where_in ('goods_a_id', $del_goods_amount)->delete ('shop_goods_extend');
                }
                if (!empty($del_goods_extend_attr)) {
                    $result = $this->db->where_in ('goods_ea_id', $del_goods_extend_attr)->delete ('shop_goods_extend_attr');
                }
                //处理自定义分类信息
                $old_goods_gstn_info = $this->db->select ('gstn_id')->from ('shop_goods_attr_self_taxonomy')->where ('goods_id', $goods_id)->get ()->result_array ();
                $old_goods_gstn_arr = array ();
                foreach ($old_goods_gstn_info as $v) {
                    $old_goods_gstn_arr[] = $v['gstn_id'];
                }
                $new_goods_gstn_arr = array ();
                $insert_goods_gstn_arr = [];
                if ($gstn) {
                    foreach ($gstn as $k => $v) {
                        list($gstn_id, $gstn_name) = explode ("$$", $v);
                        $new_goods_gstn_arr[] = $gstn_id;
                        if (in_array ($gstn_id, $old_goods_gstn_arr) === false) {
                            $insert_goods_gstn_arr[] = array (
                                'goods_id' => $goods_id,
                                'gstn_id' => $gstn_id,
                                'gstn_name' => $gstn_name,
                            );
                        }
                    }
                }
                $del_goods_gstn = array_diff ($old_goods_gstn_arr, $new_goods_gstn_arr);
                if (!empty($del_goods_gstn)) {
                    $result = $this->db->where_in ('gstn_id', $del_goods_gstn)->where ('goods_id', $goods_id)->delete ('shop_goods_attr_self_taxonomy');
                }
                if (!empty($insert_goods_gstn_arr)) {
                    $result = $this->db->insert_batch ('shop_goods_attr_self_taxonomy', $insert_goods_gstn_arr);
                }
                $this->db->trans_complete (); //事务完成
                $this->db->trans_off (); //禁用事务
            }
        } else {   //添加的时候

            //开始添加商品
            $this->db->trans_off (); //禁用事务
            $this->db->trans_start (); //开启事务
            $result = $this->db->insert ('shop_goods', $base_info);     //插入基本信息
            $goods_id = $this->db->insert_id ();
            //print_r($goods_spec_val); print_r($goods_spec_val_price);print_r($goods_specS_val);die;
            $sql_goods_spec = array ();
            if (!empty($goods_spec_val)) {
                foreach ($goods_spec_val as $k => $v) {
                    $ii = 0;
                    foreach ($v as $ka => $va) {
                        if (isset($goods_spec_val_price[$k][$ka])) {
                            $sql_ = array (
                                'goods_id' => $goods_id, 'attr_id' => $k, 'attr_value_id' => $ka,
                                'attr_value' => $va, 'attr_price' => $goods_spec_val_price[$k][$ka],
                            );
                        } else {
                            $sql_ = array (
                                'goods_id' => $goods_id, 'attr_id' => $k, 'attr_value_id' => $ka,
                                'attr_value' => $va, 'attr_price' => '',
                            );
                        }
                        $sql_goods_spec[] = $sql_;
                    }

                }
            }
            $this->db->insert_batch ('shop_goods_attr_index', $sql_goods_spec);
            //print_r($attr_info);die;
            if ($attr_info) {
                foreach ($attr_info as $k => $v) {
//                     if(empty($v['attr_value_id']) && empty($v['user_attr_value'])){
//                         unset($attr_info[$k]);
//                         continue;
//                     }else{
//                         $attr_info[$k]['goods_id'] = $goods_id;
//                     }
                    $attr_info[$k]['goods_id'] = $goods_id;
                }
            }
            if (!empty($attr_info)) {    //属性值
                foreach ($attr_info as $k => $v) {
                    $attr_info[$k]['goods_id'] = $goods_id;
                    $attr_arr[] = $attr_info[$k];
                }
                //$result = $this->db->insert_batch('shop_goods_attr_index', $attr_arr);  //插入商品与属性对应
            }
//            if ($goods_amount) {  //颜色值
//                foreach ($goods_amount as $k => $v) {
//                    $goods_amount[$k]['goods_id'] = $goods_id;
//                    $goods_amount[$k]['stocks_price'] = empty($v['stocks_price']) ? '-1' : $v['stocks_price'];
//                }
//                $result = $this->db->insert_batch('shop_goods_extend', $goods_amount);  //插入商品扩展信息表（颜色）
//            }
            $goods_color = [];
            $goods_size = [];
            if (!empty($color_arr)) {
                foreach ($color_arr as $k => $v) {  //循环插入商品颜色表
                    $color_arr[$k]['goods_id'] = $goods_id;
                    $this->db->insert ('shop_goods_extend', $color_arr[$k]);
                    $color_arr[$k]['goods_a_id'] = $this->db->insert_id ();
                }
                if ($size_arr) {
                    foreach ($size_arr as $k => $v) {
                        if (is_array ($v)) {
                            foreach ($v as $kk => $vv) {
                                $vv['stocks_sku'] = isset($vv['stocks_sku'])? strtoupper ($vv['stocks_sku']):'';
                                /*  if(empty($vv['stocks_sku'])){
                                     continue;
                                 } */
                                if ((array_key_exists ($k, $color_arr) !== false) && $color_arr[$k]['color'] == $vv['color']) {
                                    $goods_size[] = array (
                                        'goods_a_id' => $color_arr[$k]['goods_a_id'],
                                        'goods_id' => $goods_id,
                                        'size' => $vv['size'],
                                        'size_note' => $vv['size_note'],
                                        //'code_segment'=>$vv['code_segment'],
                                        'color' => $color_arr[$k]['color'],
                                        'color_value' => $color_arr[$k]['color_value'],
                                        'color_remark' => $color_arr[$k]['color_remark'],
                                        'stocks_price' => $vv['stocks_price'],
                                        'stocks_marketprice' => $vv['stocks_marketprice'],
                                        'stocks_sku' => $vv['stocks_sku'],
                                        'stocks_bar_code' => $vv['stocks_bar_code'],
                                    );
                                }
                            }
                        }
                    }
                    $result = $this->db->insert_batch ('shop_goods_extend_attr', $goods_size);
                }
            } else {    
                $color_arr = array (
                    'goods_id' => $goods_id,
                    'color' => '均色',
                    'color_value' => '',
                    'color_remark' => '均色'
                );
                $result = $this->db->insert ('shop_goods_extend', $color_arr);
            }

            if ($gstn) {  //自定义分类
                $gstn_arr = [];
                $gstn_id = 0;
                $gstn_name = '';
                foreach ($gstn as $k => $v) {
                    list($gstn_id, $gstn_name) = explode ('$$', $v);
                    $gstn_arr[$k]['goods_id'] = $goods_id;
                    $gstn_arr[$k]['gstn_id'] = $gstn_id;
                    $gstn_arr[$k]['gstn_name'] = $gstn_name;
                }
                $result = $this->db->insert_batch ('shop_goods_attr_self_taxonomy', $gstn_arr);  //插入商品自定义分类表
            }
            $this->db->trans_complete (); //事务完成
            $this->db->trans_off (); //禁用事务
            // 	    $result = true;
            // 	    $goods_id = 320;
        }
// 	    $result = true;
// 	    $goods_id = 320;
        if ($this->db->trans_status () != false) {
            $data = array ('state' => true, 'msg' => '操作成功');
            $goods_info = $this->db->select ('sg.goods_id,sge.color,sge.color_remark,sge.color_value,sge.goods_a_id,sg.goods_name,sg.goods_image')->from ('shop_goods as sg')->join ('shop_goods_extend as sge', 'sg.goods_id=sge.goods_id', 'left')->where ('sg.goods_id', $goods_id)->order_by ('goods_a_id')->get ()->result_array ();
            if (isset($_GET['op']) && $_GET['op'] == 'edit') {
                $this->common_function->shop_admin_log ($goods_id, 'edit', '商品');
                $goods_a_id_arr = array ();
                foreach ($goods_info as $v) {
                    if (!empty($v['goods_a_id'])) {
                        $goods_a_id_arr[] = $v['goods_a_id'];
                    }
                }
                $goods_a_id_arr = empty($goods_a_id_arr) ? array (0) : array_unique ($goods_a_id_arr);
                // 	            $this->goods_management();
                $goods_image_info = $this->db->select ('goods_image_id,goods_id,color_id,goods_image,goods_image_sort,is_default')->from ('shop_goods_images')->where ('goods_id', $goods_id)->where_in ('color_id', $goods_a_id_arr)->order_by ('goods_image_sort', 'ASC')->order_by ('goods_image_id')->get ()->result_array ();
                $goods_img_arr = array ();
                $arr = array ('is_default' => 0, 0, 0, 0, 0, 0);
                $default_pic = PLUGIN . 'data/images/' . $this->common_function->get_system_value ('default_goods_image');
                foreach ($goods_image_info as $k => $v) {
                    $goods_img_arr[$v['color_id']][] = $v;
                }
                foreach ($goods_img_arr as $k => $v) {
                    if (count ($v) < 5) {
                        $temp = array_fill (count ($v), 5 - count ($v), $arr);
                        $goods_img_arr[$k] = array_merge ($v, $temp);
                    }
                }
                $this->smarty->assign ('goods_img_arr', $goods_img_arr);
                $this->smarty->assign ('default_pic', $default_pic);
            } else {
                $this->common_function->shop_admin_log ($goods_id, 'add', '商品');
            }
            $shop_albums = $this->db->select ('aclass_id,aclass_name')->from ('shop_album_class')->order_by ('aclass_sort')->get ()->result_array ();
            $arr = array ('1' => 1, '2' => 2, '3' => 3, '4' => 4,);
            $this->smarty->assign ('shop_albums', $shop_albums);
            $this->smarty->assign ('arr', $arr);
            $this->smarty->assign ('goods_info', $goods_info);
            $this->smarty->assign ('goods_id', $goods_id);
// 	            var_dump($goods_img_arr);
// 	            var_dump($goods_info);exit;
            $this->smarty->display ('goods_add_goods_third.html');
        } else {
            echo json_encode ($data);
        }
    }

    /* 商品管理——添加商品——第四步 */

    public function goods_add_goods_fourth ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        //print_r($_POST);exit;
        $img_arr = $_POST['img'];
        $goods_id = $_POST['goods_id'];
        if ($goods_id) {
            if (isset($_GET['op']) && $_GET['op'] == 'edit') {
                $result = $this->db->delete ('shop_goods_images', array ('goods_id' => $goods_id));
            }
            foreach ($img_arr as $k => $v) {
                $temp = array ();
                foreach ($v as $kk => $vv) {
                    if (empty($vv['goods_image'])) {
                        unset($v[$kk]);
                    }
                    if ($vv['is_default'] == '1') {
                        $vv['goods_image_sort'] = 0;
                        $temp = $vv;
                        unset($v[$kk]);
                        array_unshift ($v, $temp);
                    }
                }
                $result = $this->db->insert_batch ('shop_goods_images', $v);
            }

            if ($result) {
                if (isset($_GET['op']) && $_GET['op'] == 'edit') {
                    $this->common_function->shop_admin_log ($goods_id, 'edit', '商品图片');
                } else {
                    $this->common_function->shop_admin_log ($goods_id, 'add', '商品图片');
                }
                $this->smarty->assign ('goods_id', $goods_id);
                $this->smarty->display ('goods_add_goods_fourth.html');
            }
        }
    }

    //商品删除（到回收站去） 删除库存
    public function goods_delete ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $del_id = isset($_GET['del_id']) ? explode (',', $_GET['del_id']) : false;
        $source = isset($_GET['source']) ? $_GET['source'] : false;
        $data = array ('state' => false, 'msg' => '系统错误！');

        if ($del_id) {
            if($source == 'store' || $source == 'ebusiness' || $source == 'supply'){
                if ($source == 'store')     $ous_type = 1;      //微商城商品
                if ($source == 'ebusiness') $ous_type = 2;      //电商商品
                if ($source == 'supply')    $ous_type = 3;      //供应商商品
                //删除库存
                $del_id = join(',',$del_id);
                $sql = "delete ssa FROM jk_store_stocks_amount ssa JOIN jk_store s ON s.store_id=ssa.ssa_store_id WHERE s.ous_type={$ous_type} AND ssa.goods_id IN ({$del_id})";
                $result = $this->db->query($sql);
                if($result) {
                    $data = array('state' => true, 'msg' => "删除成功!");
                } else {
                    $data = array('state' => false, 'msg' => "删除失败!");
                }
            } else {
                //把商品加入回收站
                $result = $this->db->where_in ('goods_id', $del_id)->update ('shop_goods', array ('goods_state' => 0, 'goods_edittime' => time ()));
                if ($result) {
                    $data = array ('state' => true, 'msg' => '修改成功！');
                } else {
                    $data = array ('state' => false, 'msg' => '修改失败！');
                }
            }
        }
        echo json_encode ($data);
        exit;
    }

    //商品彻底删除（从回收站彻底删除）
    public function goods_completely_delete ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $del_id = isset($_GET['id']) ? explode (',', $_GET['id']) : false;
        $data = array ('state' => false, 'msg' => '系统错误！');
        if ($del_id) {
            $this->db->trans_off (); //禁用事务
            $this->db->trans_start (); //开启事务
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods_images');
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods_extend_attr');
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods_extend');
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods_attr_self_taxonomy');
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods_attr_index');
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods');
            $this->db->trans_complete (); //事务完成
            $this->db->trans_off (); //禁用事务
            if ($this->db->trans_status ()) {
                $data = array ('state' => true, 'msg' => '删除成功！');
            }
        }
        echo json_encode ($data);
        exit;
    }

    //商品禁用优惠券
    public function goods_ban_coupons ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $ids = isset($_GET['id']) ? explode (',', $_GET['id']) : false;
        $data = array ('state' => false, 'msg' => '系统错误！');
//        var_Dump($ids);exit;
        if ($ids) {
            $result = $this->db->where_in ('goods_id', $ids)->update ('shop_goods', array ('available_coupons' => 0, 'goods_edittime' => time ()));
            if ($result) {
                $data = array ('state' => true, 'msg' => '修改成功！');
            } else {
                $data = array ('state' => false, 'msg' => '修改失败！');
            }
        }
        echo json_encode ($data);
        exit;
    }

    //商品设置标签
    public function goods_set_tag ()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $ids = isset($_GET['id']) ? explode (',', $_GET['id']) : false;
        $value = isset($_GET['value']) ? $_GET['value'] : 1;
        $data = array ('state' => false, 'msg' => '系统错误！');
        if ($ids) {
            $result = $this->db->where_in ('goods_id', $ids)->update ('shop_goods', array ('goods_tag' => $value, 'goods_edittime' => time ()));
            if ($result) {
                $data = array ('state' => true, 'msg' => '修改成功！');
            } else {
                $data = array ('state' => false, 'msg' => '修改失败！');
            }
        }
        echo json_encode ($data);
        exit;
    }

    //修改商品属性 性别 品牌 年份 季节等
    public function goods_set_attribute()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $ids        = isset($_GET['id']) ? explode (',', $_GET['id']) : false;
        $change_id  = isset($_GET['change_id']) ? $_GET['change_id'] : false;  //要设置的属性id
        $attr       = isset($_GET['attr']) ? $_GET['attr'] :false;      //要设置的属性
        $data       = array ('state' => false, 'msg' => '修改失败！');

        if ($ids) {
            if ($attr == 'brand') {     //如果是修改品牌的话传过来的是两个参数，包括品牌id和品牌name,格式为brand_id-brand_name
                $change = explode ('-', $change_id);
                $result = $this->db->where_in ('goods_id', $ids)->update ('shop_goods', array ('brand_id' => $change[0], 'brand_name' => $change[1] , 'goods_edittime' => time ()));
            } else {
                if ($attr == 'season') {            //判断要修改的属性 修改为数据表中对应的字段名
                    $attr = 'season_to_market';
                } else if ($attr == 'year') {
                    $attr = 'year_to_market';
                }
                $result = $this->db->where_in ('goods_id', $ids)->update ('shop_goods', array ($attr => $change_id, 'goods_edittime' => time ()));
            }
            if ($result) {
                $data = array ('state' => true, 'msg' => '修改成功！');
            }
        }
        echo json_encode ($data);
        exit;
    }

    //格式化修改商品名称
    public function goods_set_goods_name()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $data   = array ('state' => false, 'msg' => '修改失败！');
        $ids    = isset($_GET['id'])? explode (',', $_GET['id']) :false; //要修改的商品id
        $result = false;
        if ($ids) {
            //得到格式
            $goods_name_format  = $this->common_function->get_system_value('goods_name_format');
            //得到商品属性
            $rows = $this->db->select('goods_id,goods_name,brand_name,sex,season_to_market,year_to_market,gc_name')
                ->where_in('goods_id', $ids)->get('shop_goods')->result_array ();
            foreach ($rows as $row) {
//                $row['season_to_market'] == 1 ? '春季' : ($row['season_to_market'] == 2 ? '夏季' : ($row['season_to_market'] == 3 ? '秋季' : ($row['season_to_market'] == 4 ? '冬季' : '')));
//                $row['sex'] == 0 ? '通用' : ($row['sex'] == 1 ? '男装' : ($row['sex'] == 2 ? '女装' : ''));
                if ($row['season_to_market'] == 1) {
                    $row['season_to_market'] = "春季";
                } elseif ($row['season_to_market'] == 2) {
                    $row['season_to_market'] = "夏季";
                } elseif ($row['season_to_market'] == 3) {
                    $row['season_to_market'] = "秋季";
                } elseif ($row['season_to_market'] == 4) {
                    $row['season_to_market'] = "冬季";
                } else {
                    $row['season_to_market'] = "";
                }
                if (empty($row['sex']) || $row['sex'] == 0) {
                    $row['sex'] = "通用";
                } elseif ($row['sex'] == 1) {
                    $row['sex'] = "女装";
                } elseif ($row['sex'] == 2) {
                    $row['sex'] = "男装";
                } else {
                    $row['sex'] = "";
                }
                if (!empty($goods_name_format)) {       //处理格式化商品名称
                    $change = array(
                        '{goodname}'    => $row['goods_name'],
                        '{brandname}'   => $row['brand_name'],
                        '{sex}'         => $row['sex'],
                        '{seasontm}'    => $row['season_to_market'],
                        '{yearmt}'      => $row['year_to_market'],
                        '{catename}'    => $row['gc_name'],
                    );
                    $goods_name_format = strtr ($goods_name_format, $change);
                }
                //将商品名称修改为格式化后的名称
                $goods_name['goods_name'] = $goods_name_format;
                //保存数据库
                $result = $this->db->where('goods_id', $row['goods_id'])->update('shop_goods', $goods_name);
            }
            if ($result) {
                $data   = array ('state' => true, 'msg' => '修改成功！');
            }
        }
        echo json_encode ($data);
        exit;
    }

    //商品取消标签
    public function goods_cancel_tags(){
        $this->common_function->shop_admin_priv("depot_management");//权限
        $ids = isset($_GET['id']) ? explode(',', $_GET['id']) : false;
        $value = null;
        $data = array('state'=>false,'msg'=>'系统错误！');
        if($ids){
            $result = $this->db->where_in('goods_id',$ids)->update('shop_goods',array('goods_tag'=>$value,'goods_edittime'=>time()));
            if($result){
                $data = array('state'=>true,'msg'=>'修改成功！');
            }else{
                $data = array('state'=>false,'msg'=>'修改失败！');
            }
        }
        echo json_encode($data);exit;
    }
    //商品移到总库
    public function goods_move_to_pool(){
        $this->common_function->shop_admin_priv("depot_management");//权限
        $ids = isset($_GET['id']) ? explode(',', $_GET['id']) : false;
        $value = 0;  //总库
        $data = array('state'=>false,'msg'=>'系统错误！');
        $msg = '';
        if($ids){
            $goodsInfo = $this->db->select('*')->where_in('goods_id',$ids)->get('shop_goods')->result_array();
            foreach ($goodsInfo as $k=>$v){
                if($v['goods_spu']){
                	//总库商品
                    $goods_base_z = $this->db->select('*')->where('goods_spu',$v['goods_spu'])->where('brand_id',$v['brand_id'])->where('goods_pos',0)->where('goods_state!=0')->get('shop_goods')->row_array();
                    $isHave = empty($goods_base_z['goods_id'])?'':$goods_base_z['goods_id'];
                    if($isHave){
                    	//$store_goods_
                        $goods_base = $goods_base_z;
                        $goods_color_ = $this->db->select('*')->where('goods_id',$isHave)->get('shop_goods_extend')->result_array();//总库商品颜色
                        $goods_image_ = $this->db->select('i.*,e.color,e.color_remark')
                        ->from('shop_goods_images as i')->join('shop_goods_extend as e','e.goods_a_id=i.color_id')
                        ->where('i.goods_id',$isHave)->get()->result_array();
                        $goods_extend_ = $this->db->select('i.*,e.color,e.color_remark')
                        ->from('shop_goods_extend_attr as i')->join('shop_goods_extend as e','e.goods_a_id=i.goods_a_id')
                        ->where('i.goods_id',$isHave)->get()->result_array();
                        //$goods_amount_ = $this->db->select();
                        $store_color_ = $this->db->select('*')->where('goods_id',$v['goods_id'])->get('shop_goods_extend')->result_array();
                        $store_image_ = $this->db->select('i.*,e.color,e.color_remark')
                        ->from('shop_goods_images as i')->join('shop_goods_extend as e','e.goods_a_id=i.color_id')
                        ->where('i.goods_id',$v['goods_id'])->get()->result_array();
                        $store_extend_ = $this->db->select('i.*,e.color,e.color_remark')
                        ->from('shop_goods_extend_attr as i')->join('shop_goods_extend as e','e.goods_a_id=i.goods_a_id')
                        ->where('i.goods_id',$v['goods_id'])->get()->result_array();
                        $base_sql = array();
                        foreach ($v as $kb=>$vb){
                            if(trim($vb)==''){
                                if(!empty($goods_base[$kb])){
                                    $base_sql[$kb] = $goods_base[$kb];
                                }
                            }
                        }
                        $goods_color = array();$store_color = array();
                        foreach ($goods_color_ as $kc=>$vc){
                            $color = empty($vc['color_remark'])?$vc['color']:$vc['color_remark'];
                            $goods_color[$color] = $vc;
                        }
                        foreach ($store_color_ as $kc=>$vc){
                            $color = empty($vc['color_remark'])?$vc['color']:$vc['color_remark'];
                            $store_color[$color] = $vc;
                        }
                        
                        $goods_image = array();
                        foreach ($goods_image_ as $ki=>$vi){
                            $color = empty($vi['color_remark'])?$vi['color']:$vi['color_remark'];
                            $goods_image[$color][] = $vi;
                        }
                        $goods_extend = array(); $goods_extend_sku = array();
                        foreach ($goods_extend_ as $ke=>$ve){
                            $color = empty($ve['color_remark'])?$ve['color']:$ve['color_remark'];
                            $goods_extend[$color][$ve['size']] = $ve;
                            $goods_extend_sku[$color] = $ve['stocks_sku'];
                        }
                        $store_image = array();
                        foreach ($store_image_ as $ki=>$vi){
                            $color = empty($vi['color_remark'])?$vi['color']:$vi['color_remark'];
                            $store_image[$color][] = $vi;
                        }
                        $store_extend = array();
                        foreach ($store_extend_ as $ke=>$ve){
                            $color = empty($ve['color_remark'])?$ve['color']:$ve['color_remark'];
                            $store_extend[$color][$ve['size']] = $ve;
                        }
                        $color_sql_up = array(); $color_sql_in = array();
                        foreach ($store_color as $ksc=>$vsc){
                            if(isset($goods_color[$ksc])){
                                $g_cv = $goods_color[$ksc];$up_c_sql = array();
                                foreach ($g_cv as $kkc=>$vvc){
                                    if(trim($vvc)==''&&trim($store_color[$ksc][$kkc])!=''){
                                        $up_c_sql[$kkc] = $vvc;
                                    }
                                }
                                if(!empty($up_c_sql)){
                                    $up_c_sql['goods_a_id'] = $g_cv['goods_a_id'];
                                    $up_c_sql['goods_id'] = $g_cv['goods_id'];
                                    $color_sql_up[] = $up_c_sql;
                                }
                            }else{
                                $in_c_sql = array('goods_id'=>$vsc['goods_id'],'color'=>$vsc['color'],'color_value'=>$vsc['color_value'],'color_remark'=>$vsc['color_remark']);
                                $color_sql_in[] = $in_c_sql;
                            }
                        }
                        $image_sql_inin = array(); $image_sql_in = array();
                        foreach ($store_image as $ksi=>$vsi){
                            if(empty($goods_image[$ksi])&&isset($goods_color[$ksi])&&!empty($vsi)){
                                foreach ($vsi as $kki=>$vvi){
                                    $image_sql_in[] = array(
                                        'goods_id'=>$isHave,'color_id'=>$goods_color[$ksi]['goods_a_id'],'goods_image_sort'=>$vvi['goods_image_sort'],
                                        'goods_image'=>$vvi['goods_image'],'is_default'=>$vvi['is_default'],
                                    );
                                }
                            }else{
                                if(!empty($vsi)){
                                    $image_sql_inin[$ksi] =  $vsi;
                                }
                            }
                        }
                        $size_sql_inin = array(); $size_sql_in = array();$size_sql_up = array();$size_amount_arr = array();//库存修改数据
                        $sku_no_same = array();//颜色尺码相同货号不同的数据
                        foreach ($store_extend as $kse=>$vse){
                            if(isset($goods_color[$kse])){
                                
                                foreach ($vse as $ks=>$vs){
                                    if(isset($goods_extend[$kse][$ks])){
                                        $goods_se = $goods_extend[$kse][$ks];
                                        $sql_up_s = array();
                                        foreach ($vs as $kks=>$vvs){
                                            if(trim($vvs)!=''&&trim($goods_se[$kks])==''){
                                                $sql_up_s[$kks]=$vvs;
                                            }
                                        }
                                        if(!empty($vs['stocks_sku'])){
                                        	$check_have_sku = $this->db->select('count(g.goods_id) as num')->from('shop_goods_extend_attr ea')->join('shop_goods g','g.goods_id=ea.goods_id')
                                        	->where('ea.stocks_sku',$vs['stocks_sku'])->where('g.brand_id',$v['brand_id'])
                                        	->where('g.goods_pos',0)->where('g.goods_state!=0')->where('g.goods_id!='.$goods_se['goods_id'])
                                        	->get()->row('num');
                                        	if($check_have_sku>0){
                                        		$msg .="商品".$v['goods_name']."的货号".$vs['stocks_sku']."已被总库其他商品占用。";
                                        		$sku_no_same[] = array(
                                        				'goods_a_id'=>$vs['goods_a_id'],
                                        				'goods_ea_id'=>$vs['goods_ea_id'],
                                        		);
                                        		continue;
                                        	}
                                        	
                                        }
                                        if(!empty($vs['stocks_sku'])&&!empty($goods_se['stocks_sku'])&&$vs['stocks_sku']!=$goods_extend_sku[$kse]){
                                        	$msg .="商品".$v['goods_name']."的货号".$vs['stocks_sku']."与总库同款同颜色的商品货号不同。";
                                        	$sku_no_same[] = array(
                                        			'goods_a_id'=>$vs['goods_a_id'],
                                        			'goods_ea_id'=>$vs['goods_ea_id'],
                                        	);
                                        }else{
                                        	if(!empty($sql_up_s)){
	                                        	$sql_up_s['goods_ea_id'] = $goods_se['goods_ea_id'];
	                                        	$size_sql_up[] = $sql_up_s;
                                        	}
                                        	$size_amount_arr[] = array(
                                        			'goods_id'=>$vs['goods_id'],'goods_a_id'=>$vs['goods_a_id'],
                                        			'goods_ea_id'=>$vs['goods_ea_id'],'goods_ea_id_new'=>$goods_se['goods_ea_id'],
                                        			'goods_id_new'=>$goods_se['goods_id']
                                        	);
                                        }
                                        
                                        
                                        
                                    }else{
                                    	
                                    		$sql_in_s = $vs;
                                    		//unset($sql_in_s['goods_ea_id']);
                                    		$sql_in_s['goods_a_id_new'] = $goods_color[$kse]['goods_a_id'];
                                    		$sql_in_s['goods_id'] = $goods_color[$kse]['goods_id'];
                                    		$size_sql_in[] = $sql_in_s;
                                    	
                                        
                                    }
                                }
                            }else{
                                $size_sql_inin[$kse] = $vse;
                            }
                        }
                        $flag = true;
                        if(!empty($base_sql)){
                            $re = $this->db->update('shop_goods',$base_sql,array('goods_id'=>$isHave));
                            if(!$re){
                                $flag = false;
                            }
                           // print_r($flag); print_r(222);
                        }
                        if(!empty($color_sql_up)){
                            $re = $this->db->update_batch('shop_goods_extend',$color_sql_up,'goods_a_id');
                            if(!$re){
                                $flag = false;
                            }
                           // print_r($flag); print_r(333);
                        }
                        if(!empty($size_sql_in)){
                        	$re = true;
                        	foreach ($size_sql_in as $ksi=>$vsi){
                        		if(!empty($vsi['stocks_sku'])){
                        			$check_have_sku = $this->db->select('count(g.goods_id) as num')->from('shop_goods_extend_attr ea')->join('shop_goods g','g.goods_id=ea.goods_id')
                        			->where('ea.stocks_sku',$vsi['stocks_sku'])->where('g.brand_id',$v['brand_id'])
                        			->where('g.goods_pos',0)->where('g.goods_state!=0')->where('g.goods_id!='.$goods_base['goods_id'])
                        			->get()->row('num');
                        			if($check_have_sku>0){
                        				$msg .="商品".$v['goods_name']."的货号".$vsi['stocks_sku']."已被总库其他商品占用。";
                        				$sku_no_same[] = array(
                        						'goods_a_id'=>$vsi['goods_a_id'],
                        						'goods_ea_id'=>$vsi['goods_ea_id'],
                        				);
                        				continue;
                        			}
                        			
                        		}
                        		$check_no_size = $this->db->select('goods_ea_id,stocks_sku')->where("(size is null or size='')")->where('goods_a_id',$vsi['goods_a_id_new'])->get('shop_goods_extend_attr')->row_array();
                        		if(!empty($check_no_size['goods_ea_id'])){
                        			if(!empty($check_no_size['stocks_sku'])&&!empty($vsi['stocks_sku'])&&$vsi['stocks_sku']!=$check_no_size['stocks_sku']){
                        				$msg .="商品".$v['goods_name']."的货号".$vsi['stocks_sku']."与总库同款同颜色的商品货号不同。";
                        				$sku_no_same[] = array(
                        						'goods_a_id'=>$vsi['goods_a_id'],
                        						'goods_ea_id'=>$vsi['goods_ea_id'],
                        				);
                        				continue;
                        			}else{
                        				$sql_up_se = $vsi;
                        				
                        				unset($sql_up_se['goods_ea_id']);unset($sql_up_se['goods_a_id']);unset($sql_up_se['goods_id']);unset($sql_up_se['goods_a_id_new']);
                        				$this->db->update('shop_goods_extend_attr',$sql_up_se,array('goods_ea_id'=>$check_no_size['goods_ea_id']));
                        				$vsi_ea_id = $vsi['goods_ea_id'];
                        				$vsi_new_ea_id = $check_no_size['goods_ea_id'];
                        			}
                        			
                        		}else{
                        			$vsi_ea_id = $vsi['goods_ea_id'];
                        			$vsi['goods_a_id'] = $vsi['goods_a_id_new'];
                        			unset($vsi['goods_ea_id']);unset($vsi['goods_a_id_new']);
                        			$this->db->insert('shop_goods_extend_attr',$vsi);
                        			$vsi_new_ea_id = $this->db->insert_id();
                        		}
                        		$this->db->where('goods_ea_id',$vsi_ea_id)->update('store_stocks_amount',array('goods_ea_id'=>$vsi_new_ea_id,'goods_id'=>$vsi['goods_id']));
                        	}
                        }
                        if(!empty($size_sql_up)){
                            $re = $this->db->update_batch('shop_goods_extend_attr',$size_sql_up,'goods_ea_id');
                            if(!$re){
                                $flag = false;
                            }
                           // print_r($flag); print_r(555);
                        }
                        if(!empty($size_amount_arr)){
                        	foreach ($size_amount_arr as $kam=>$vam){
                        		$this->db->where('goods_ea_id',$vam['goods_ea_id'])->update('store_stocks_amount',array('goods_ea_id'=>$vam['goods_ea_id_new'],'goods_id'=>$vam['goods_id_new']));
                        	}
                        }
                        if(!empty($image_sql_in)){
                            $re = $this->db->insert_batch('shop_goods_images',$image_sql_in);
                            if(!$re){
                                $flag = false;
                            }
                             //print_r($flag);print_r($image_sql_in); print_r(666);
                        }
                        
                        if(!empty($color_sql_in)){
                            $rec = true;
                            foreach ($color_sql_in as $cki=>$cvi){
                                $this->db->insert('shop_goods_extend',$cvi);
                                $t_color_id = $this->db->insert_id();
                                $t_color = empty($cvi['color_remark'])?$cvi['color']:$cvi['color_remark'];
                                if(!empty($size_sql_inin[$t_color])){
                                    foreach ($size_sql_inin[$t_color] as $sck=>$scv){
                                    	if(!empty($scv['stocks_sku'])){
                                    		$check_have_sku = $this->db->select('count(g.goods_id) as num')->from('shop_goods_extend_attr ea')->join('shop_goods g','g.goods_id=ea.goods_id')
                                    		->where('ea.stocks_sku',$scv['stocks_sku'])->where('g.brand_id',$v['brand_id'])
                                    		->where('g.goods_pos',0)->where('g.goods_state!=0')->where('g.goods_id!='.$goods_base['goods_id'])
                                    		->get()->row('num');
                                    		if($check_have_sku>0){
                                    			$msg .="商品".$v['goods_name']."的货号".$scv['stocks_sku']."已被总库其他商品占用。";
                                    			$sku_no_same[] = array(
                                    					'goods_a_id'=>$scv['goods_a_id'],
                                    					'goods_ea_id'=>$scv['goods_ea_id'],
                                    			);
                                    			continue;
                                    		}
                                    		
                                    	}
                                       $sc_sql = $scv;
                                       $vsi_ea_id = $sc_sql['goods_ea_id'];
                                       unset($sc_sql['goods_ea_id']);
                                       $sc_sql['goods_a_id'] = $t_color_id;
                                       $sc_sql['goods_id'] = $isHave;
                                       $re = $this->db->insert('shop_goods_extend_attr',$sc_sql);
                                       $vsi_new_ea_id = $this->db->insert_id();
                                       $re = $this->db->where('goods_ea_id',$vsi_ea_id)->update('store_stocks_amount',array('goods_ea_id'=>$vsi_new_ea_id,'goods_id'=>$vsi['goods_id']));
                                       if(!$re){
                                           $rec = false;
                                       }
                                    }
                                }
                                if(!empty($image_sql_inin[$t_color])){
                                    foreach ($image_sql_inin[$t_color] as $sik=>$siv){
                                       $si_sql = $siv;
                                       unset($si_sql['goods_image_id']);
                                       $sc_sql['color_id'] = $t_color_id;
                                       $sc_sql['goods_id'] = $isHave;
                                       $re = $this->db->insert('shop_goods_images',$si_sql);
                                       if(!$re){
                                           $rec = false;
                                       }
                                    }
                                }
                                
                            }
                            if(!$rec){
                                $flag = false;
                            }
                        }
                        //print_r($flag); print_r(11111);
                        if($flag){
                        	if(!empty($sku_no_same)){
                        		$goods_ea_id_no = array();$goods_a_id_no = array();
                        		foreach ($sku_no_same as $ksa=>$vsa){
                        			$goods_ea_id_no[] = $vsa['goods_ea_id'];
                        			$goods_a_id_no[] = $vsa['goods_a_id'];
                        		}
                        		$this->db->where('goods_id',$v['goods_id'])->where_not_in('color_id',$goods_a_id_no)->delete('shop_goods_images');
                        		$this->db->where('goods_id',$v['goods_id'])->where_not_in('goods_a_id',$goods_a_id_no)->delete('shop_goods_extend');
                        		$this->db->where('goods_id',$v['goods_id'])->where_not_in('goods_ea_id',$goods_ea_id_no)->delete('shop_goods_extend_attr');
                        	}else{
                        		$this->db->delete('shop_goods_images',array('goods_id'=>$v['goods_id']));
                        		$this->db->delete('shop_goods_extend_attr',array('goods_id'=>$v['goods_id']));
                        		$this->db->delete('shop_goods_extend',array('goods_id'=>$v['goods_id']));
                        		$this->db->delete('shop_goods',array('goods_id'=>$v['goods_id']));
                        	}
                            
                            
                        }else{
                            $msg .='商品'.$v['goods_name'].'移动失败';
                        }
                        /* print_r($base_sql);print_r($color_sql_up);print_r($color_sql_in);
                        print_r($size_sql_inin);print_r($size_sql_in);print_r($size_sql_up);
                        print_r($image_sql_inin);print_r($image_sql_in);die; */
                        
                    }else{
                        $re = $this->db->where('goods_id',$v['goods_id'])->update('shop_goods',array('goods_pos'=>$value,'goods_edittime'=>time()));
                        if(!$re){
                            $msg .='商品'.$v['goods_name'].'移动失败';
                        }
                    }
                }
            }
            //$result = $this->db->where_in('goods_id',$ids)->update('shop_goods',array('goods_pos'=>$value,'goods_edittime'=>time()));
            $data = array('state'=>true,'msg'=>'移动完成！'.$msg);
        }
        echo json_encode($data);exit;
    }
    //商品还原
    public function goods_restore(){
        $this->common_function->shop_admin_priv("depot_management");//权限
        $ids = isset($_GET['id']) ? explode(',', $_GET['id']) : false;
        $value = 1;  //未删除
        $data = array('state'=>false,'msg'=>'系统错误！');
        if($ids){
        	$result = true;$msg = '';
        	foreach ($ids as $k=>$v){
        		
        		$goods_base = $this->db->select('goods_spu,goods_name,brand_id,goods_pos')->where('goods_id',$v)->get('shop_goods')->row_array();
        		$check_spu = $this->db->select('count(1) as num')->where('goods_spu',$goods_base['goods_spu'])->where('goods_pos',$goods_base['goods_pos'])->where('goods_state!=0')->where('goods_id!='.$v)->get('shop_goods')->row('num');
        	    $addr = ($goods_base['goods_pos']==0)?'总库':'本店铺';
        	    if($check_spu>=1){
        	    	$msg .="商品".$goods_base['goods_name']."spu".$addr."已存在不能还原。";
        	    	$result = false;
        	    	continue;
        	    }else{
        	    	$sku = $this->db->select('stocks_sku,stocks_bar_code,goods_id')->from('shop_goods_extend_attr')->where('goods_id',$v)->get()->result_array();
        	    	$flag = true;$checkSku = array();
        	    	foreach ($sku as $kk=>$vv){
        	    		if(!empty($vv['stocks_sku'])){
        	    			if(!in_array($vv['stocks_sku'], $checkSku)){
        	    				$check_sku = $this->db->select('count(g.goods_id) as num')->from('shop_goods g')->join('shop_goods_extend_attr e','e.goods_id=g.goods_id')
        	    				->where('e.stocks_sku',$vv['stocks_sku'])->where('g.goods_pos',$goods_base['goods_spu'])->where('g.goods_state!=0')->where('g.goods_id!='.$v)
        	    				->where('g.brand_id!='.$goods_base['brand_id'])->get()->row('num');
        	    				if($check_sku>=1){
        	    					$msg .="商品".$goods_base['goods_name']."货号".$vv['stocks_sku'].$addr."已存在不能还原。";
        	    					$flag = false;
        	    				}
        	    				$checkSku[] = $vv['stocks_sku'];
        	    			}else{
        	    				continue;
        	    			}
        	    			
        	    		}
        	    		if(!empty($vv['stocks_bar_code'])){
        	    			$check_sku = $this->db->select('count(g.goods_id) as num')->from('shop_goods g')->join('shop_goods_extend_attr e','e.goods_id=g.goods_id')
        	    			->where('e.stocks_bar_code',$vv['stocks_bar_code'])->where('g.goods_pos',$goods_base['goods_spu'])->where('g.goods_state!=0')
        	    			->get()->row('num');
        	    			if($check_sku>=1){
        	    				$msg .="商品".$goods_base['goods_name']."条码".$vv['stocks_bar_code'].$addr."已存在不能还原。";
        	    				$flag = false;
        	    			}
        	    		}
        	    	}
                    if($flag){
                        $result = $this->db->where_in('goods_id',$ids)->update('shop_goods',array('goods_state'=>$value,'goods_edittime'=>time()));
                    }
        	    }
        	}
            //$result = $this->db->where_in('goods_id',$ids)->update('shop_goods',array('goods_state'=>$value,'goods_edittime'=>time()));
            if($result){
                $data = array('state'=>true,'msg'=>'还原成功！');
            }else{
                $data = array('state'=>false,'msg'=>$msg);
            }
        }
        echo json_encode($data);exit;
    }
    /* 商品管理——商品下架 */

    public function goods_unshelve() {
        $this->common_function->shop_admin_priv("depot_management");//权限
        $data = array('state' => false, 'msg' => "操作失败,请重试!");
        $id_arr = isset($_GET['goods_id']) ? explode(',', $_GET['goods_id']) : false;
        if ($id_arr) {
            $result = $this->db->where_in('goods_id', $id_arr)->update('shop_goods', array('goods_state' => 0));
            if ($result) {
                $data = array('state' => true, 'msg' => '操作成功！');
            }
        }
        echo json_encode($data);
        exit;
    }

    /* 商品管理——商品上架 */

    public function goods_putaway() {
        $this->common_function->shop_admin_priv("depot_management");//权限
        $data = array('state' => false, 'msg' => "操作失败,请重试!");
        $id_arr = isset($_GET['goods_id']) ? explode(',', $_GET['goods_id']) : false;
        if ($id_arr) {
            $result = $this->db->where_in('goods_id', $id_arr)->update('shop_goods', array('goods_state' => 1, 'on_sale_time' => time()));
            if ($result) {
                $data = array('state' => true, 'msg' => '操作成功！');
            }
        }
        echo json_encode($data);
        exit;
    }

    /* 商品管理——商品导出 */

    public function goods_export() {
        $this->common_function->shop_admin_priv("depot_management");//权限
        $this->load->library('phpExcel');
        $where = ' 1=1 ';
        $type_id = empty($_GET['type_id']) ? 1 : $_GET['type_id'];
        if ($type_id == '101') {
            $where_1 = ' sg.goods_state =1 AND sg.on_sale_time>' . time();
        } elseif ($type_id == '10') {
            $where_1 = ' sg.goods_state =' . $type_id . ' OR sg.goods_state = 0 AND sg.on_sale_time<' . time();
        } else {
            $where_1 = ' sg.goods_state =' . $type_id . ' AND sg.on_sale_time<' . time();
        }
        if (!empty($_POST['id'])) {
            $id_str = $_POST['id'];
            $where .= " and sg.goods_id in ($id_str)";
        }
        $this->db->select('sg.goods_id,sg.goods_name,sg.goods_price,sg.goods_state,sg.goods_image,sg.goods_jingle,sg.gc_id,sg.brand_id,sg.on_sale_time,sg.goods_marketprice,sg.is_hot,sg.is_new,sg.on_sale_time,sgc.gc_name,sb.brand_name,');
        $this->db->from('shop_goods as sg');
        $this->db->join('shop_goods_class as sgc', 'sgc.gc_id = sg.gc_id', 'left');
        $this->db->join('shop_brand as sb', 'sb.brand_id = sg.brand_id', 'left');
        if (!empty($_POST['id'])) {
            $this->db->where($where);
        } else {
            if (isset($_GET['goods_name']) && !empty($_GET['goods_name'])) {
                $this->db->like('sg.goods_name', trim($_GET['goods_name']));
            }
            if (isset($_GET['goods_id']) && !empty($_GET['goods_id'])) {
                $this->db->like('sg.goods_id', trim($_GET['goods_id']));
            }
            if (isset($_GET['brand_name']) && !empty($_GET['brand_name'])) {
                $this->db->like('sb.brand_name', trim($_GET['brand_name']));
            }
            if (isset($_GET['gc_id']) && !empty($_GET['gc_id'])) {
                $this->db->where('sg.gc_id', trim($_GET['gc_id']));
            }
            $this->db->where($where_1);
        }

        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
//         $this->db->limit($rp,$start);
        $this->db->order_by('on_sale_time', 'DESC');
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
                ->setCellValue('A1', 'SKU')
                ->setCellValue('B1', '商品名称')
                ->setCellValue('C1', '商品价格(元)')
                ->setCellValue('D1', '商品状态')
                ->setCellValue('E1', '广告词')
                ->setCellValue('F1', '分类ID')
                ->setCellValue('G1', '分类名称')
                ->setCellValue('H1', '品牌ID')
                ->setCellValue('I1', '品牌名称')
                ->setCellValue('J1', '发布时间')
                ->setCellValue('K1', '市场价格(元)')
                ->setCellValue('L1', '成本价格(元)')
                ->setCellValue('M1', '库存')
                ->setCellValue('N1', '是否有赠品')
                ->setCellValue('O1', '热卖')
                ->setCellValue('P1', '新品');

        $i = 2;
        $goods_state_arr = array('' => '--', '0' => '已下架', '1' => '已上架', '10' => '违规下架', '101' => '计划上架');
        foreach ($rows as $k => $v) {
            $stocks = $this->shop->get_stocks_by_goods_id($v['goods_id']);
            if ($type_id == '10') {
                $goods_state = $goods_state_arr[$v['goods_state']];
            } else {
                $goods_state = $goods_state_arr[$type_id];
            }
//            $have_gift = $v['have_gift'] == '1' ? '是' : '否';
            $is_hot = $v['is_hot'] == '1' ? '是' : '否';
            $is_new = $v['is_new'] == '1' ? '是' : '否';
            $on_sale_time = date("Y-m-d", $v['on_sale_time']);
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $v['goods_id'])
                    ->setCellValue('B' . $i, $v['goods_name'])
                    ->setCellValue('C' . $i, $v['goods_price'])
                    ->setCellValue('D' . $i, $goods_state)
                    ->setCellValue('E' . $i, $v['goods_jingle'])
                    ->setCellValue('F' . $i, $v['gc_id'])
                    ->setCellValue('G' . $i, $v['gc_name'])
                    ->setCellValue('H' . $i, $v['brand_id'])
                    ->setCellValue('I' . $i, $v['brand_name'])
                    ->setCellValue('J' . $i, $on_sale_time)
                    ->setCellValue('K' . $i, $v['goods_marketprice'])
                    ->setCellValue('L' . $i, 0)
                    ->setCellValue('M' . $i, $stocks)
                    ->setCellValue('N' . $i, 1)
                    ->setCellValue('O' . $i, $is_hot)
                    ->setCellValue('P' . $i, $is_new);
            unset($rows[$k]);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('goods');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename = urlencode('商品列表') . '_' . date('Y-m-dHis');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $aaa = $objWriter->save('php://output');
        exit;
    }

    /* 商品管理——商品库管理 */

    public function goods_warehouse_management() {
        $this->common_function->shop_admin_priv("depot_management");//权限
        $this->smarty->display('goods_warehouse_management.html');
    }

    /* 商品管理——分类管理 */

    public function get_spec_type() {
        $this->common_function->shop_admin_priv("waybill");//权限
        //print_r($_POST);die;
        $gc_id = isset($_POST['gc_id'])?$_POST['gc_id']:'';
        $gc_spec = '';
        if($gc_id){
           $gc_spec = $this->db->select('group_concat(sp_id) as gc_spec')->where('gc_id',$gc_id)->group_by('gc_id')->get('shop_goods_class_specs')->row('gc_spec');
        }
        $type = $this->db->select('s.*')->from('shop_spec as s')
        ->get()->result_array();
        $rows = array();
        foreach ($type as $k=>$v){
            if(!empty($v['sp_select_lists'])){
                $v['sp_select_lists'] = unserialize($v['sp_select_lists']);
            }
            $rows[$v['sp_cl_id']]['type'][] = $v;
            $rows[$v['sp_cl_id']]['type_id'] = $v['sp_cl_id'];
            $rows[$v['sp_cl_id']]['type_name']= empty($v['sp_cl_name'])?'其他':$v['sp_cl_name'];
        }
        //$rows = array();
        krsort($rows);
        //print_r($rows);die;
        $result = array('spec'=>array_values($rows),'gc_spec'=>$gc_spec);
        echo json_encode($result);die;
        //print_r($rows);die;
    }
    /* 商品管理——分类管理 */

    public function goods_classify_management() {
        $this->common_function->shop_admin_priv("waybill");//权限
        
        $type = isset($_GET['type'])?$_GET['type']:'';
        if($type=='tb' || $type=='jd'){
        	$this->smarty->assign('type', $type);
        	$this->smarty->display('goods_classify_management_jdtb.html');
        }else{
            $brand_rows  = $this->db->select ('size,flag')->from ('code_segment_size')
            ->order_by('size')->get ()->result_array();

            $this->smarty->assign('brand_rows', json_encode($brand_rows));
        	$this->smarty->assign('type', $type);
        	$this->smarty->display('goods_classify_management.html');
        }
        
    }

    
    public function ajax_get_all_jdtb_list() {
        $type=isset($_GET['type']) ? $_GET['type'] : 'tb';
        if($type=='tb'){
            $ec_type =2;
        }else{
            $ec_type =1;
        }
        $sid=isset($_GET['ec_parent_cid']) ? $_GET['ec_parent_cid'] : 0;
        if($sid==0){
            $top=1;
        }else{
            $class = $this->db->select('ec_parent_cid')->where("ec_cid='{$sid}'")->get('ecstore_cate')->row('ec_parent_cid');
            if($class==0){
                $top=2;
            }else{
                $top=3;
            }
        }
        //print_r($_POST);
        $page=isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp=isset($_POST['rp']) ? $_POST['rp'] : 40;
        $query = isset($_POST['query']) ? $_POST['query'] : false;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $where = " ec_parent_cid=".$sid."  and  ec_type='{$ec_type}'";
        if(!empty($_POST['query'])){
            $where.=" and is_valid = '1'  order by ec_cid asc";
        }else{
            $where.=" and is_valid = '0'  order by ec_cid asc";//默认0启用
        }
        $this->db->select('*');
        $this->db->from('ecstore_cate');
        $this->db->where($where);
        $rows = $this->db->get()->result_array();
        //print_r($rows);die;
/*         if($qtype && $query){
            $query=trim($query);
            foreach($rows as $key=>$row){
                if(strpos($row[$qtype],$query) === false){
                    unset($rows[$key]);
                }
            }
        } */
        $total = count($rows);
        $rows = array_slice($rows,($page-1)*$rp,$rp);
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
            $xml .= "<row id='".$row['ec_cid']."'>";
            if($top==3){
                $xml .= "<cell><![CDATA[ -- ]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[
                <a class='btn blu' onclick='fg_show_children(" . $row['ec_cid'] . ",".$row['ec_parent_cid'].")' >查看下级</a> ]]></cell>";
            }
            $xml .= "<cell><![CDATA[".$row['ec_cid']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['ec_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$top."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['ec_parent_cid']."]]></cell>";
            if($row['ec_is_parent']=='true'){
                $xml .= "<cell><![CDATA[是]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[否]]></cell>";
            }
            if($row['ec_type']==1){
                $xml .= "<cell><![CDATA[京东]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[淘宝]]></cell>";
            }
            if($row['is_valid']==1){
                $xml .= "<cell><![CDATA[否]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[是]]></cell>";
            }
            $xml .= "</row>";
        }
    
        $xml .= "</rows>";
        echo $xml;
    }
    
    
    
    
    
    public function ajax_get_all_classify_list() {
        $sid=isset($_GET['parent_id']) ? $_GET['parent_id'] : 0;
        if($sid==0){
            $top=1;
        }else{
            $class = $this->db->select('gc_parent_id')->where("gc_id='{$sid}'")->get('shop_goods_class')->row('gc_parent_id');
            if($class==0){
                $top=2;
            }else{
                $top=3;
            }
        }
        //print_r($_POST);
        $page=isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp=isset($_POST['rp']) ? $_POST['rp'] : 40;
        $query = isset($_POST['query']) ? $_POST['query'] : false;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $where = " gc_parent_id=".$sid;
        $this->db->select('*');
        $this->db->from('shop_goods_class');
        $this->db->where($where);
        $rows = $this->db->get()->result_array();
        //print_r($rows);die;
        if($qtype && $query){
            $query=trim($query);
            foreach($rows as $key=>$row){
                if(strpos($row[$qtype],$query) === false){
                    unset($rows[$key]);
                }
            }
        }
        $total = count($rows);
        $rows = array_slice($rows,($page-1)*$rp,$rp);
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
            $xml .= "<row id='".$row['gc_id']."'>";
            $xml .= "<cell><![CDATA[".$row['gc_sort']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['gc_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$top."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['gc_parent_id']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['ec_tb_cid']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['ec_jd_cid']."]]></cell>";
            $xml .= "<cell><![CDATA[
                <a class='btn red' onclick='fg_delete(" . $row['gc_id'] .")' ><i class='fa fa-trash-o'></i>删除</a>
                <a class='btn blu' onclick='edit_cate(" . $row['gc_id'] . ")' ><i class='fa fa-trash-o'></i>编辑分类</a>";
            if($top<3){
                $xml .= "<a class='btn blu' onclick='add_next(".$row['gc_id'].")' ><i class='fa fa-trash-o'></i>新增下级</a>
                            <a class='btn blu' onclick='fg_show_children(" . $row['gc_id'] . ",".$row['gc_parent_id'].")' ><i class='fa fa-trash-o'></i>查看下级</a>
                                 ]]></cell>";
            }else{
                $xml .= "]]></cell>";
                
            }
                
            $xml .= "</row>";
        }
        
        $xml .= "</rows>";
        echo $xml;
    }
    

    public function ajax_get_classinfo_byID() {
        $data = array('state' => false, 'msg'=>"获取信息失败",'data'=>"");
        $gcID=isset($_POST['gc_id']) ? $_POST['gc_id'] : 0;
        if(!$gcID){
            echo json_encode($data);exit;
        }
        //edit_cate(gc_id,gc_name,gc_parent_id,gc_keywords,gc_description,gc_sort,gc_parent_name,weight,ec_jd_cid,ec_tb_cid)
        $class = $this->db->select('*')->where("gc_id='{$gcID}'")->get('shop_goods_class')->row_array();
        if($class['gc_parent_id']==0){
            $class['gc_parent_name'] = $class['gc_name'];
        }else{
            $class['gc_parent_name']= $this->db->select('gc_name')->where('gc_id',$class['gc_parent_id'])->get('shop_goods_class')->row('gc_name');
        }
        $data['state'] = true;$data['msg'] = "获取信息成功";$data['data'] = $class;
        echo json_encode($data);exit;
        
        
    }
    
    
    
    /**
     * 遍历全部分类，并写入<option>标签
     */
    public function get_all_list($select = 0, $ret = 0) {
        $arr = $this->get_all_product_cate_by_parent_id();
        $str = $this->product_cate_array_to_option($arr, $select);
        if ($ret == 0) {
            echo json_encode($str);
        } else {
            return $str;
        }
    }

    public  function  get_jd_tb_class_option(){
        $tb_id = isset($_POST['tb_id']) && !empty($_POST['tb_id']) ?$_POST['tb_id']:0;
        $jd_id = isset($_POST['jd_id']) && !empty($_POST['jd_id']) ?$_POST['jd_id']:0;
        $jd_flag = false;
        $tb_flag = false;
        $jd_arr = $this->get_all_jd_tb_by_parent_ids(0,0,1);
        $jd_str = $this->product_jd_tb_to_options($jd_arr, $jd_id);
        if($jd_str){
            $jd_flag = true;
        }
        
        $tb_arr = $this->get_all_jd_tb_by_parent_ids(0,0,2);
        $tb_str = $this->product_jd_tb_to_options($tb_arr, $tb_id);
        if($tb_str){
            $tb_flag = true;
        }
        
        $result = array("tb_flag"=>$tb_flag,"jd_flag"=>$jd_flag,"jd_str"=>$jd_str,"tb_str"=>$tb_str);
        echo json_encode($result);exit;
    }
    
    
    public  function get_jd_tb_by_classid(){
        $data = array('state' => false, 'ec_jd_cid' =>'','ec_tb_cid'=>'');
        $id = isset($_POST['id']) && !empty($_POST['id']) ?$_POST['id']:0;
        if($id){
            $class = $this->db->select('ec_jd_cid,ec_tb_cid')->where("gc_id='{$id}'")->get('shop_goods_class')->row_array();
            if($class && !empty($class)){
                $data['state']=true;
                $data['ec_jd_cid']=$class['ec_jd_cid'];
                $data['ec_tb_cid']=$class['ec_tb_cid'];
            }
        }
        echo json_encode( $data);exit;
    }
    /**
     * 获取所有产品分类.
     * 通过产品的parent_id获取产品分类
     * @param int $level_num 若为1 获取父级下的一级子分类 若为0 获取全部分类
     * @param integer $parent_id    产品分类product_parent_id
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     */
    public function get_all_jd_tb_by_parent_ids($ec_parent_cid = 0, $level_num = 0,$flag=1) {
        $product_cate = array();
        $ec_parent_cid = intval($ec_parent_cid);
        $wheres = " is_valid ='0' and ec_type ='1' and ec_status = 'normal'";
        if($flag==2){
            $wheres =  " is_valid ='0' and ec_type ='2' and ec_status = 'normal'";
        }
        $sql = "select count(*) as num from " . $this->db->dbprefix('ecstore_cate') . " where  $wheres and ec_parent_cid =" . $ec_parent_cid;
        if ($this->db->query($sql)->row('num') || $ec_parent_cid == 0) {
            $sql = 'SELECT ec_cid, ec_name, ec_parent_cid,ec_is_parent, sort_order,ec_type,ec_status,is_valid' . ' FROM ' . $this->db->dbprefix('ecstore_cate') .
            ' WHERE '.$wheres.' and  ec_parent_cid=' . $ec_parent_cid.
            ' ORDER BY sort_order ASC';
            $data = $this->db->query($sql)->result_array();
            foreach ($data as $k => $v) {
                $product_cate[$v['ec_cid']]['ec_cid'] = $v['ec_cid'];
                $product_cate[$v['ec_cid']]['ec_name'] = $v['ec_name'];
                $product_cate[$v['ec_cid']]['ec_parent_cid'] = $v['ec_parent_cid'];
                $product_cate[$v['ec_cid']]['sort_order'] = $v['sort_order'];
                $product_cate[$v['ec_cid']]['ec_type'] = $v['ec_type'];
                $product_cate[$v['ec_cid']]['ec_status'] = $v['ec_status'];
                $product_cate[$v['ec_cid']]['is_valid'] = $v['is_valid'];
                $product_cate[$v['ec_cid']]['ec_is_parent'] = $v['ec_is_parent'];
                if ($level_num == 0 && $this->db->query("select count(*) as num from " . $this->db->dbprefix('ecstore_cate') . " where $wheres and ec_parent_cid=" . $v['ec_cid'])->row('num')) {
                    $product_cate[$v['ec_cid']]['product_son_cate'] = $this->get_all_jd_tb_by_parent_ids($v['ec_cid'],$level_num,$flag);
                }
            }
        }
        return $product_cate;
    }
    
    /** 得到一个所有商品分类构成的下拉框
     * $cate_id 选中的id
     * $num 用于计算循环层数的
     * 返回 '<option></option><option selected></option><option></option>'
     */
    public function product_jd_tb_to_options($array, $cate_id = 0, $level = -1, $str = '') {
        // 	    var_dump($cate_id);exit;
        if (!is_array($array)) {
            return false;
        }
        $level = $level + 1;
        foreach ($array as $key => $val) {
            $str .= "<option value='" . $val['ec_cid'] . "' ";
            if ($val['ec_cid'] == $cate_id) {
                $str .= "selected";
            }
            $str .= ">" . str_repeat('&nbsp;', $level * 2) . '|--' . $val['ec_name'] . "</option>";
    
            $son_str = '';
            if (isset($val['product_son_cate']) && is_array($val['product_son_cate'])) {
                $son_str .= $this->product_jd_tb_to_options($val['product_son_cate'], $cate_id, $level, $son_str);
            }
            $str .= $son_str;
        }
    
        return $str;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**
     * 获取所有产品分类.
     * 通过产品的parent_id获取产品分类
     * @param int $level_num 若为1 获取父级下的一级子分类 若为0 获取全部分类
     * @param integer $parent_id    产品分类product_parent_id
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     */
    public function get_all_product_cate_by_parent_id($gc_parent_id = 0, $level_num = 0) {
        $product_cate = array();
        $gc_parent_id = intval($gc_parent_id);
        $sql = "select count(*) as num from " . $this->db->dbprefix('shop_goods_class') . " where gc_parent_id =" . $gc_parent_id;
        if ($this->db->query($sql)->row('num') || $gc_parent_id == 0) {
            $sql = 'SELECT gc_id, gc_name, gc_parent_id, gc_sort ' . ' FROM ' . $this->db->dbprefix('shop_goods_class') .
                    ' WHERE gc_parent_id=' . $gc_parent_id .
                    ' ORDER BY gc_sort ASC';
            $data = $this->db->query($sql)->result_array();
            foreach ($data as $k => $v) {
                $product_cate[$v['gc_id']]['gc_id'] = $v['gc_id'];
                $product_cate[$v['gc_id']]['gc_name'] = $v['gc_name'];
                $product_cate[$v['gc_id']]['gc_parent_id'] = $v['gc_parent_id'];
                $product_cate[$v['gc_id']]['gc_sort'] = $v['gc_sort'];
                if ($level_num == 0 && $this->db->query("select count(*) as num from " . $this->db->dbprefix('shop_goods_class') . " where gc_parent_id =" . $v['gc_id'])->row('num')) {
                    $product_cate[$v['gc_id']]['product_son_cate'] = $this->get_all_product_cate_by_parent_id($v['gc_id']);
                }
            }
        }
        return $product_cate;
    }

    /** 得到一个所有商品分类构成的下拉框
     * $cate_id 选中的id
     * $num 用于计算循环层数的
     * 返回 '<option></option><option selected></option><option></option>'
     */
    public function product_cate_array_to_option($array, $cate_id = 0, $level = -1, $str = '') {
// 	    var_dump($cate_id);exit;
        if (!is_array($array)) {
            return false;
        }
        $level = $level + 1;
        foreach ($array as $key => $val) {
            $str .= "<option value='" . $val['gc_id'] . "' ";
            if ($val['gc_id'] == $cate_id) {
                $str .= "selected";
            }
            $str .= ">" . str_repeat('&nbsp;', $level * 4) . '|--' . $val['gc_name'] . "</option>";

            $son_str = '';
            if (isset($val['product_son_cate']) && is_array($val['product_son_cate'])) {
                $son_str .= $this->product_cate_array_to_option($val['product_son_cate'], $cate_id, $level, $son_str);
            }
            $str .= $son_str;
        }

        return $str;
    }
    
    
    
    
    

    /**
     * 新增分类
     */
    public function add_class() {
        
        $this->common_function->shop_admin_priv("waybill");//权限
        $data = $this->input->post();
        $gc_id = isset($data['gc_id'])?$data['gc_id']:'';
        $result='';$result1=true;
        if(empty($data['gc_sort'])){
            $data['gc_sort'] = 255;
        }
        $data['gc_name'] = trim($data['gc_name']);
        $ec_tb_cid = $_POST['ec_tb_cid'];
        $ec_jd_cid = $_POST['ec_jd_cid'];
        $gc_size = $_POST['type_size'];
        if($gc_size &&  isset($gc_size[0])){
            $gc_size = serialize($gc_size);
        }
        $data['gc_size'] = $gc_size;
        unset($data['type_size']);
        if($gc_id){
            $inner = $data;
            unset($inner['gc_id']);
            if(isset($inner['type_spec'])){
                unset($inner['type_spec']);
            }
            if(isset($inner['gc_parent_id'])){
                unset($inner['gc_parent_id']);
            }
            if(isset($inner['brand_type'])){
                unset($inner['brand_type']);
            }
           /*  $gc_ids = $this->db->select('gc_id')->from('shop_goods_class')->where('gc_name',$data['gc_name'])->get()->row('gc_id');
            if($gc_ids && $gc_ids!=$gc_id){
                $value = array('state'=>false,'msg'=>'添加失败：分类名已存在');
                echo json_encode($value);exit();
            } */
            if($ec_tb_cid){
                /* $tb_cid = $this->db->select('ec_scid')->from('ecstore_cate')->where('ec_cid',$ec_tb_cid)->where('ec_type','1')->get()->row('ec_scid');
                if(!$tb_cid){
                    $value = array('state'=>false,'msg'=>"添加失败：填写的淘宝分类ID不存在！");
                    echo json_encode($value);exit();
                } */
                
                
                $ec_tb_cids = $this->db->select('gc_id,gc_name')->where('ec_tb_cid',$ec_tb_cid)->where("gc_id !='{$gc_id}'")->get('shop_goods_class')->row_array();
                if($ec_tb_cids['gc_id']){
                    $value = array('state'=>false,'msg'=>'添加失败：关联的淘宝ID 已被'.$ec_tb_cids['gc_name']."占用！");
                    echo json_encode($value);exit();
                }
            }
            if($ec_jd_cid){
                /* $jd_cid = $this->db->select('ec_scid')->from('ecstore_cate')->where('ec_cid',$ec_jd_cid)->where('ec_type','2')->get()->row('ec_scid');
                if(!$jd_cid){
                    $value = array('state'=>false,'msg'=>"添加失败：填写的京东分类ID不存在！");
                    echo json_encode($value);exit();
                } */
                
                $ec_jd_cids = $this->db->select('gc_id,gc_name')->where('ec_jd_cid',$ec_jd_cid)->where("gc_id !='{$gc_id}'")->get('shop_goods_class')->row_array();
                if($ec_jd_cids['gc_id']){
                    $value = array('state'=>false,'msg'=>'添加失败：关联的京东ID 已被'.$ec_jd_cids['gc_name']."占用！");
                    echo json_encode($value);exit();
                }
            }
            $result  = $this->db->update('shop_goods_class',$inner,array('gc_id'=>$gc_id));
            //print_r($this->db->last_query());die;
            $cl_id = $gc_id;
            $op = '修改';
        }else{
            /* $gc_ids = $this->db->select('gc_id')->from('shop_goods_class')->where('gc_name',$data['gc_name'])->get()->row('gc_id');
            if($gc_ids){
                $value = array('state'=>false,'msg'=>'添加失败：分类名已存在');
                echo json_encode($value);exit();
            } */
            
            if($ec_tb_cid){
                $ec_tb_cids = $this->db->select('gc_id,gc_name')->where('ec_tb_cid',$ec_tb_cid)->get('shop_goods_class')->row_array();
                if($ec_tb_cids['gc_id']){
                    $value = array('state'=>false,'msg'=>'添加失败：关联的淘宝ID 已被'.$ec_tb_cids['gc_name']."占用！");
                    echo json_encode($value);exit();
                }
            }
            if($ec_jd_cid){
                $ec_jd_cids = $this->db->select('gc_id,gc_name')->where('ec_jd_cid',$ec_jd_cid)->get('shop_goods_class')->row_array();
                if($ec_jd_cids['gc_id']){
                    $value = array('state'=>false,'msg'=>'添加失败：关联的京东ID 已被'.$ec_jd_cids['gc_name']."占用！");
                    echo json_encode($value);exit();
                }
            }
            
            
            $sql = "insert into " . $this->db->dbprefix('shop_goods_class') .
            " (gc_parent_id,  gc_name, gc_sort, gc_keywords, gc_description,weight,ec_tb_cid,ec_jd_cid) values('{$data['gc_parent_id']}', '{$data['gc_name']}', {$data['gc_sort']}, '{$data['gc_keywords']}', '{$data['gc_description']}','{$data['weight']}','{$data['ec_tb_cid']}','{$data['ec_jd_cid']}') ";
            $result = $this->db->query($sql);
            $cl_id = $this->db->insert_id();
            $op = '添加';
        }
        
        
        $spec = array();
        if(!empty($data['type_spec'])){
            foreach ($data['type_spec'] as $k=>$v){
                $spec[$k]['gc_id'] = $cl_id;
                $spec[$k]['sp_id'] = $v;
            }
        }
        if(!empty($spec)){
            $this->db->delete('shop_goods_class_specs',array('gc_id'=>$cl_id));
            $result1 = $this->db->insert_batch('shop_goods_class_specs',$spec);
        }
        

        if ($result && $result1) {
            $value = array('state'=>true,'msg'=>$op.'成功');
            echo json_encode($value);
            $this->common_function->shop_admin_log($data['gc_name'], 'add', '分类');
            exit();
        }
    }

    /**
     * 编辑分类
     */
    public function edit_class() {
        $this->common_function->shop_admin_priv("waybill");//权限
        $data = $this->input->post();
        $time = time();
        //var_dump($_SESSION);die;
        $spec = array();
        if(!empty($data['type_spec'])){
            foreach ($data['type_spec'] as $k=>$v){
                $spec[$k]['gc_id'] = $cl_id;
                $spec[$k]['sp_id'] = $v;
            }
        }
        if(!empty($spec)){
            $this->db->delete('shop_goods_class_specs',array('gc_id'=>$data['gc_id']));
            $result = $this->db->insert_batch('shop_goods_class_specs',$spec);
        }
        $sql = "update " . $this->db->dbprefix('shop_goods_class') . " set ec_tb_cid = '{$data['ec_tb_cid']}',ec_jd_cid = '{$data['ec_jd_cid']}', gc_sort = {$data['gc_sort']}, gc_name= '{$data['gc_name']}',gc_keywords = '{$data['gc_keywords']}', gc_description = '{$data['gc_description']}' where gc_id = '{$data['gc_id']}'";
        $result = $this->db->query($sql);
        if ($result) {
            echo json_encode('修改成功');
            $this->common_function->shop_admin_log($data['gc_name'], 'edit', '分类');
            exit();
        }
    }

    /**
     * 删除分类
     */
    public function del_class() {
        $result = array('state'=>true,'msg'=>'','info'=>'');
        $this->common_function->shop_admin_priv("waybill");//权限
        $id = $this->input->post('id');
        $arr = explode(',', $id);
        $succ_num=0;
        $error_num=0;
        $del_id = '';
        foreach ($arr as $v) {
            $select_result = $this->select_children_class($v);
            if($select_result['state']){
                $sql = "delete from {$this->db->dbprefix('shop_goods_class')} where gc_id = {$v}";
                $this->db->query($sql);
                $this->del_all_children($v);
                $this->db->delete('shop_goods_class_specs',array('gc_id'=>$v));
                $succ_num++;
                $del_id = $v."、";
            }else{
                $gc_name = $this->db->select('gc_name')->from('shop_goods_class')->where('gc_id',$v)->get()->row('gc_name');
                $result['msg'] .= $gc_name."、";
                $error_num++;
            }

        }
        if($error_num==0){
            $result['info'] .= "全部删除成功";
        }else{
            $result['info'] .= "成功删除:".$succ_num."记录,失败:".$error_num."条！ (".$result['msg'].") 下有商品,不能删除";
        }
        
        echo json_encode($result);
        $this->common_function->shop_admin_log('id=' . $del_id, 'del', '分类');
        exit();
    }
    
    
    /**
     * 停用/启用分类
     */
    public function start_stop_ec_scid() {
        $this->common_function->shop_admin_priv("waybill");//权限
        $op = isset($_GET['op'])?$_GET['op']:'stop';
         if($op=='stop'){
               $result = array('state'=>true,'msg'=>'停用成功',);
              
                $arrs = array("is_valid"=>1);
                $flag = 1;
            }else{
                $result = array('state'=>true,'msg'=>'启用成功',);
                
                $arrs = array("is_valid"=>0);
                $flag = 0;
            }
        $id = $this->input->post('id');
        $arr = explode(',', $id);
        foreach ($arr as $v) {
            $this->db->where("ec_cid = '{$v}'")->update('ecstore_cate',$arrs);
            $this->update_all_valid($v,$flag);
        }
    
        echo json_encode($result);exit();
    }
    
    
    
    /**
     * 停用/启用下级分类
     * @param unknown $p_id      父级ID
     */
    private function update_all_valid($p_id,$flag) {
        $this->common_function->shop_admin_priv("waybill");//权限
        $sql = "select ec_cid from {$this->db->dbprefix('ecstore_cate')} where ec_parent_cid = {$p_id}";
        $ids = $this->db->query($sql)->result_array();
        foreach ($ids as $id) {
            if($flag==1){
                $arr = array("is_valid"=>1);
            }else{
                $arr = array("is_valid"=>0);
            }
            $this->db->where("ec_cid = '{$id['ec_cid']}'")->update('ecstore_cate',$arr);
            $this->del_all_children($id['ec_cid']);
        }
    }
    
    
    

    /**
     * 删除下级分类
     * @param unknown $p_id      父级ID
     */
    private function del_all_children($p_id) {
        $this->common_function->shop_admin_priv("waybill");//权限
        $this->db->delete('shop_goods_class_specs',array('gc_id'=>$p_id));
        $sql = "select gc_id from {$this->db->dbprefix('shop_goods_class')} where gc_parent_id = {$p_id}";
        $ids = $this->db->query($sql)->result_array();
        foreach ($ids as $id) {
            $sql = "delete from {$this->db->dbprefix('shop_goods_class')} where gc_parent_id = {$id['gc_id']}";
            $result = $this->db->query($sql);
            $this->del_all_children($id['gc_id']);
        }
    }
    //检查是否有下级分类
    public  function select_children_class($id){
        $result = array('state'=>true,'msg'=>'');
        $num_info1 = $this->db->select ('gc_id,goods_id')->where ('gc_id',$id)->get ('shop_goods')->result_array ();
        if($num_info1 && !empty($num_info1)){
            $result['state'] =false;
            $result['msg'] =$id;
            return $result;
        }else{
            $class_num1 = $this->db->select ('gc_id,gc_parent_id')->where ('gc_parent_id',$id)->get ('shop_goods_class')->result_array ();
            if($class_num1 && !empty($class_num1)){
                foreach ($class_num1 as $key=>$val){
                    if(!empty($val['gc_id'])){
                        $num_info2 = $this->db->select ('gc_id,goods_id')->where ('gc_id',$val['gc_id'])->get ('shop_goods')->result_array ();
                        if($num_info2 && !empty($num_info2)){
                               $result['state'] =false;
                                $result['msg'] =$val['gc_id'];
                                return $result;
                        }else{
                            $class_num2 = $this->db->select ('gc_id,gc_parent_id')->where ('gc_parent_id',$val['gc_id'])->get ('shop_goods_class')->result_array ();
                            if($class_num2 && !empty($class_num2)){
                                foreach ($class_num2 as $keys=>$vals){
                                    if(!empty($vals['gc_id'])){
                                        $num_info3 = $this->db->select ('gc_id,goods_id')->where ('gc_id',$vals['gc_id'])->get ('shop_goods')->result_array ();
                                        if($num_info3 && !empty($num_info3)){
                                                $result['state'] =false;
                                                $result['msg'] =$vals['gc_id'];
                                                return $result;
                                        }else{
                                            return $result;
                                        }
                                    }
                                }
                            }else{
                                return $result;
                            }
                        }    
                    }
                }
            }else{
                 return $result;
            }
        }

    }
    
    
    
    
    
    
    public function product_son_cate() {
        $this->common_function->shop_admin_priv("waybill");//权限
        $gc_id = isset($_POST['gc_id']) ? trim($_POST['gc_id']) : false;
        $result = array('state' => false, 'msg' => '', 'data' => '');
        if (!empty($gc_id)) {
            $data = $this->goods_model->get_son_cate($gc_id);

            if (!empty($data)) {
                $result = array('state' => true, 'msg' => '', 'data' => $data);
            }
        }
        echo json_encode($result);
        exit;
    }

    /* 商品管理——品牌管理 */

    public function goods_brand_management() {
        $this->common_function->shop_admin_priv("depot_inplode");//权限
        if (isset($_GET['op']) && $_GET['op'] == 'getList') {
            $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
            $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
            $query = isset($_POST['query']) ? $_POST['query'] : false;
            $start = ($page - 1) * $rp;

            $this->db->select('brand_id,brand_size_type,brand_name,brand_initial,brand_class,brand_pic,brand_sort,brand_recommend,class_id,show_type,is_true');
            $this->db->from('shop_brand');
            if ($qtype && $query) {
                if ($qtype == 'brand_id') {
                    $this->db->like('brand_id', $query);
                } elseif ($qtype == 'brand_name') {
                    $this->db->like('brand_name', $query);
                } elseif ($qtype == 'brand_initial') {
                    $this->db->like('brand_initial', $query);
                }
            }

            $db = clone($this->db);
            $total = $this->db->count_all_results();
            $this->db = $db;
            $this->db->limit($rp, $start);
            $this->db->order_by('brand_sort');
            $rows = $this->db->get()->result_array();

            header("Content-type: text/xml");
            $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
            $xml .= "<rows>";
            $xml .= "<page>$page</page>";

            foreach ($rows as $row) {
                $is_true = $row['is_true'] == 1 ? '未确认' : '已确认';
                $brand_recommend = $row['brand_recommend'] == 1 ? '是' : '否';
                $show_type_arr = array('0' => '图片', '1' => '文字');
                if($row['brand_size_type'] == 1){
                    $brand_size_type = '中国码';
                }elseif ($row['brand_size_type'] == 2){
                    $brand_size_type = '美国码';
                }elseif ($row['brand_size_type'] == 3){
                    $brand_size_type = '英国码';
                }else{
                    $brand_size_type = '日本码';
                }
                $brand_sort = $row['brand_sort'] == 0 ? '默认' : $row['brand_sort'];
                $brand_pic = PLUGIN . 'data/shop/brand_pic/' . $row['brand_pic'];
                $xml .= "<row id='" . $row['brand_id'] . "'>";
                $xml .= "<cell><![CDATA[
                    <a class='btn red' onclick='fg_delete(" . $row['brand_id'] . ")'><i class='fa fa-trash-o'></i>删除</a>
                        <a class='btn green' onclick='fg_edit(" . $row['brand_id'] . ")'><i class='fa fa-edit'></i>编辑</a>";
                if($row['is_true'] == 1){
                    $xml .="<a class='btn green' onclick='fg_isTrue(" . $row['brand_id'] . ",1)'><i class='fa fa-edit'></i>确认</a>";
                }else{
                    $xml .="<a class='btn green' onclick='fg_isTrue(" . $row['brand_id'] . ",2)'><i class='fa fa-edit'></i>取消确认</a>";
                }
                $xml .="]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['brand_id'] . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['brand_name'] . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['brand_initial'] . "]]></cell>";
                $xml .= '<cell><![CDATA[<i class="fa fa-photo" aria-hidden="true" data-geo="<img src=\'' . $brand_pic . '\'>"></i>]]></cell>';
                $xml .= "<cell><![CDATA[" . $brand_sort . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $brand_recommend . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $show_type_arr[$row['show_type']] . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $brand_size_type . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $is_true . "]]></cell>";
                $xml .= "</row>";
            }
            $xml .= "<total>$total</total>";
            $xml .= "</rows>";
            echo $xml;
            exit;
        }
        $this->smarty->display('goods_brand_management.html');
    }

    /* 商品管理——添加品牌管理 */

    public function goods_brand_add() {
        $this->common_function->shop_admin_priv("depot_inplode");//权限
        $data = array('state' => false, 'msg' => "操作失败，请重试！");
        if (isset($_GET['op']) && $_GET['op'] = 'add') {
            $param = $_POST['param'];
            $param['brand_name'] = str_replace ("'","’", $param['brand_name']);

            if (!empty($_FILES ['image'] ['name'])) {
                $new_dir = isset($new_dir) ? $new_dir : ROOTPATH . 'data/shop/brand_pic/';
                if (!file_exists($new_dir)) {
                    $this->common_function->createDir($new_dir);
                }
                $tmp_file = $_FILES ['image'] ['tmp_name'];
                $file_types = explode(".", $_FILES ['image'] ['name']);
                $file_type = $file_types [count($file_types) - 1];
                $file_name = date("YmdHis") . rand(0, 7) . '.' . $file_type;
                if (!in_array(strtolower($file_type), array('gif', 'png', 'jpg'))) {
                    $data = array('state' => false, 'msg' => "不是要求图片文件，请重新选择文件！");
                    echo json_encode($data);
                    exit();
                }
                //等比压缩为知道尺寸
                $this->load->library('slpic', array('file' => $tmp_file));
                $this->slpic->resize(150, 50);
                $result = $this->slpic->save($new_dir . $file_name, $file_type);
                if ($result && file_exists($new_dir . $file_name)) {
                    $param['brand_pic'] = $file_name;
                } else {
                    $data = array('state' => false, 'msg' => "图片上传失败，请重试！");
                    echo json_encode($data);
                    exit();
                }
// 	             if(!copy ($tmp_file, $new_dir.$file_name)){
// 	                 $data = array('state'=>false, 'msg'=>"图片上传失败，请重试！");
// 	                 echo json_encode($data);
// 	                 exit();
// 	             }
            }
            $result = $this->db->insert('shop_brand', $param);
            if ($result) {
                $this->common_function->shop_admin_log($param['brand_name'], 'add', '品牌');
                $data = array('state' => true, 'msg' => '添加成功！');
            }
            echo json_encode($data);
            exit;
        } else {
            $first_classes = $this->db->select('gc_id,gc_name')->from('shop_goods_class')->where('gc_parent_id', 0)->get()->result_array();
            $this->smarty->assign('first_classes', $first_classes);
            $this->smarty->display('goods_brand_add.html');
        }
    }

    /* 商品管理——编辑品牌管理 */

    public function goods_brand_edit() {
        $this->common_function->shop_admin_priv("depot_inplode");//权限
        $data = array('state' => false, 'msg' => "操作失败，请重试！");
        $brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : false;
        if ($brand_id) {
            if (isset($_GET['op']) && $_GET['op'] == 'edit') {
                $brand_info = $this->db->select('brand_pic')->from('shop_brand')->where('brand_id', $brand_id)->get()->row_array();
                $param = $_POST['param'];
                $param['brand_name'] = str_replace ("'","’", $param['brand_name']);
                if (!empty($_FILES ['image'] ['name'])) {
                    $new_dir = isset($new_dir) ? $new_dir : ROOTPATH . 'data/shop/brand_pic/';
                    if (!file_exists($new_dir)) {
                        $this->common_function->createDir($new_dir);
                    }
                    $tmp_file = $_FILES ['image'] ['tmp_name'];
                    $file_types = explode(".", $_FILES ['image'] ['name']);
                    $file_type = $file_types [count($file_types) - 1];
                    $file_name = $brand_id . '_' . date("YmdHis") . rand(0, 7) . '.' . $file_type;
                    if (!in_array(strtolower($file_type), array('gif', 'png', 'jpg'))) {
                        $data = array('state' => false, 'msg' => "不是要求图片文件，请重新选择文件！");
                        echo json_encode($data);
                        exit();
                    }
// 	                if(!copy ($tmp_file, $new_dir.$file_name)){
// 	                    $data = array('state'=>false, 'msg'=>"图片上传失败，请重试！");
// 	                    echo json_encode($data);
// 	                    exit();
// 	                }
                    //等比压缩为知道尺寸
                    $this->load->library('slpic', array('file' => $tmp_file));
                    $this->slpic->resize(150, 50);
                    $result = $this->slpic->save($new_dir . $file_name, $file_type);
                    if ($result && file_exists($new_dir . $file_name)) {
                        $param['brand_pic'] = $file_name;
                    } else {
                        $data = array('state' => false, 'msg' => "图片上传失败，请重试！");
                        echo json_encode($data);
                        exit();
                    }
                    if (!empty($brand_info['brand_pic']) && file_exists($new_dir . $brand_info['brand_pic'])) {
                        @unlink($new_dir . $brand_info['brand_pic']);
                    }
                    $param['brand_pic'] = $file_name;
                }
                $result = $this->db->update('shop_brand', $param, array('brand_id' => $brand_id));
                if ($result) {
                    $this->common_function->shop_admin_log($brand_id, 'edit', '品牌');
                    $data = array('state' => true, 'msg' => '编辑成功！', 'data' => $brand_id);
                }
                echo json_encode($data);
                exit;
            } elseif (isset($_GET['op']) && $_GET['op'] == 'delete') {
                $del_id = isset($_GET['brand_id']) ? explode(',', $_GET['brand_id']) : 0;
                if ($del_id) {
                    $new_dir = isset($new_dir) ? $new_dir : ROOTPATH . 'data/shop/brand_pic/';
                    if (!file_exists($new_dir)) {
                        $this->common_function->createDir($new_dir);
                    }
                    $pic_array = $this->db->select('brand_pic')->from('shop_brand')->where_in('brand_id', $del_id)->get()->result_array();

                    $result = $this->db->where_in('brand_id', $del_id)->delete('shop_brand');
                    if ($result) {
                        if (!empty($pic_array)) {
                            foreach ($pic_array as $v) {
                                if (!empty($v['brand_pic']) && file_exists($new_dir . $v['brand_pic'])) {
                                    @unlink($new_dir . $v['brand_pic']);
                                }
                            }
                        }
                        $this->common_function->shop_admin_log($_GET['brand_id'], 'del', '品牌');
                        $data = array('state' => true, 'msg' => '删除成功');
                    }
                }
                echo json_encode($data);
                exit;
            }elseif(isset($_GET['op']) && $_GET['op'] == 'isTrue'){
                $del_id = isset($_GET['brand_id']) ? explode(',', $_GET['brand_id']) : 0;
                $flag = isset($_GET['flag']) && !empty($_GET['flag']) ? $_GET['flag']:'';
                $data = array('state' => false, 'msg' => '修改失败！', 'data' =>'');
                if ($del_id && $flag) {
                   $del_arrs = array();
                   foreach ($del_id as $ks=>$vs){
                      $del_arr['brand_id'] = $vs;
                      if($flag==1){
                          $del_arr['is_true'] = 0;
                      }else{
                          $del_arr['is_true'] = 1;
                      }
                      $del_arrs[] = $del_arr;
                   }
                   if($this->db->update_batch("shop_brand",$del_arrs,'brand_id')){
                       $data['state']= true;$data['msg']= '修改成功';
                   }
                }
                echo json_encode($data);
                exit;
            } else {
                $brand_info = $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial,sb.brand_class,sb.brand_pic,sb.brand_sort,sb.brand_recommend,sb.class_id,sb.show_type')->from('shop_brand as sb')->where('brand_id', $brand_id)->get()->row_array();
                $first_classes = $this->db->select('gc_id,gc_name,gc_parent_id')->from('shop_goods_class')->where('gc_parent_id', 0)->get()->result_array();
                $this->smarty->assign('brand_info', $brand_info);
                $this->smarty->assign('first_classes', $first_classes);
                $this->smarty->display('goods_brand_add.html');
            }
        } else {
            echo json_encode($data);
            exit;
        }
    }

    //订单导出
    public function goods_brand_export() {
        $this->common_function->shop_admin_priv("depot_inplode");//权限
        $this->load->library('phpExcel');
        $where = ' 1=1 ';
        if (!empty($_GET['id'])) {
            $id_str = $_GET['id'];
            $where .= " and sb.brand_id in ($id_str)";
        }
        $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial,sb.brand_class,sb.brand_pic,sb.brand_sort,sb.brand_recommend,sb.class_id,sb.show_type');
        $this->db->from('shop_brand as sb');
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
                ->setCellValue('A1', '品牌ID')
                ->setCellValue('B1', '品牌名称')
                ->setCellValue('C1', '品牌首字母')
                ->setCellValue('D1', '所属分类id')
                ->setCellValue('E1', '类别名称')
                ->setCellValue('F1', '排序')
                ->setCellValue('G1', '是否推荐')
                ->setCellValue('H1', '品牌展示类型');

        $i = 2;
        $show_type_arr = array('0' => '图片', '1' => '文字');
        foreach ($rows as $k => $v) {
            $brand_recommend = $v['brand_recommend'] == 1 ? '是' : '否';
            $brand_sort = $v['brand_sort'] == 0 ? '默认' : $v['brand_sort'];
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $v['brand_id'])
                    ->setCellValue('B' . $i, $v['brand_name'])
                    ->setCellValue('C' . $i, $v['brand_initial'])
                    ->setCellValue('D' . $i, $v['class_id'])
                    ->setCellValue('E' . $i, $v['brand_class'])
                    ->setCellValue('F' . $i, $brand_sort)
                    ->setCellValue('G' . $i, $brand_recommend)
                    ->setCellValue('H' . $i, $show_type_arr[$v['show_type']]);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('order');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename = urlencode('商品品牌列表') . '_' . date('Y-m-dHis');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $aaa = $objWriter->save('php://output');
        exit;
    }

    /* 商品管理——类型管理 */

    public function goods_type_management() {
        $this->common_function->shop_admin_priv("depot_select");//权限
        if (isset($_GET['op']) && $_GET['op'] == 'getList') {
            $page  = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
            $rp    = isset($_POST['rp']) ? $_POST['rp'] : 25;
            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
            $query = isset($_POST['query']) ? $_POST['query'] : false;
            $start = ($page - 1) * $rp;

            $this->db->select('sc.sp_cl_id,sc.sp_cl_name,count(s.sp_id) as num');
            $this->db->from('shop_spec_class sc');
            $this->db->join('shop_spec s','s.sp_cl_id=sc.sp_cl_id','left');
            if ($qtype && $query) {
                if ($qtype == 'type_id') {
                    $this->db->like('type_id', $query);
                } elseif ($qtype == 'type_name') {
                    $this->db->like('sp_cl_name', $query);
                } elseif ($qtype == 'class_id') {
                    $this->db->like('class_id', $query);
                } elseif ($qtype == 'class_name') {
                    $this->db->like('class_name', $query);
                }
            }

            $db = clone($this->db->group_by('sc.sp_cl_id'));
            $total = $this->db->count_all_results();
            $this->db = $db;
            $this->db->limit($rp, $start);
            //$this->db->order_by('type_sort');
            $rows = $this->db->get()->result_array();

            header("Content-type: text/xml");
            $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
            $xml .= "<rows>";
            $xml .= "<page>$page</page>";

            foreach ($rows as $row) {
                $xml .= "<row id='" . $row['sp_cl_id'] . "'>";
                $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['sp_cl_id'] .")'><i class='fa fa-trash-o'></i>删除</a>
                    <a class='btn green' onclick='fg_spec(" . $row['sp_cl_id'] .",\"". $row['sp_cl_name'] ."\")'><i class='fa fa-edit'></i>属性列表</a>]]></cell>";
                /*'<span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                 <ul><li><a onclick='fg_edit(" . $row['sp_cl_id'] .")'>编辑</a></li>
                 <li><a onclick='fg_spec(" . $row['sp_cl_id'] .")'>属性列表</a></ul></span>'*/
                $xml .= "<cell><![CDATA[" . $row['sp_cl_name'] . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['num'] . "]]></cell>";
                $xml .= "</row>";
            }
            $xml .= "<total>$total</total>";
            $xml .= "</rows>";
            echo $xml;
            exit;
        }
        $this->smarty->display('goods_type_management.html');
    }
   
    /* 商品管理——添加类型 */

    //显示属性列表
    public function type_spec() {
        $this->common_function->shop_admin_priv("waybill");//权限
        $type_id = isset($_GET['type_id']) ? $_GET['type_id'] : false;
        $attr    = $this->db->select('*')->from('shop_spec')->where('sp_cl_id', $type_id)->get()->result_array();
        $i = 0;
        foreach ($attr as $v ) {
            $lists_str = '';
            if ($v['sp_input_type'] == 2 && !empty($v['sp_select_lists'])) {
                $lists_str = unserialize($v['sp_select_lists']);
                $lists_str = implode (',', $lists_str);         //将类别的select_lists反序列化并用,连接成字符串
            }
            $attr[$i++]['sp_select_lists'] = $lists_str;
        }
        echo json_encode($attr);
    }
    //删除类型项  多表删除，关联删除在类型属性表shop_spec_class中的数据
    public function type_delete() {
        $this->common_function->shop_admin_priv("waybill");//权限
        $arr = isset($_GET['type_id'])? explode (',', $_GET['type_id']) :false;
        $data = array ('state' => false, 'msg' => '系统错误！');
        $tables = array ('shop_spec_class', 'shop_spec');
        foreach ($arr as $v) {
            $result = $this->db->where('sp_cl_id', $v)->delete($tables);
        }
        $data = array ('state' => true, 'msg' => '删除成功！');
        echo json_encode ($data);
        exit;
    }
    //删除类型的属性项
    public function type_spec_delete() {
        $this->common_function->shop_admin_priv("waybill");//权限
        $arr = isset($_GET['type_id'])? explode (',', $_GET['type_id']) :false;
        $data = array ('state' => false, 'msg' => '系统错误！');
        foreach ($arr as $v) {
            $result = $this->db->where('sp_id', $v)->delete('shop_spec');
        }
        $data = array ('state' => true, 'msg' => '删除成功！');
        echo json_encode ($data);
        exit;
    }
    /* 商品管理——添加类型 */

    public function goods_type_add() {
        $this->common_function->shop_admin_priv("depot_select");//权限
        $data = array('state' => false, 'msg' => "操作失败，请重试！");
        if (isset($_GET['op']) && $_GET['op'] = 'add') {
            //print_r($_POST);die;
            $name = isset($_POST['param']['type_name'])?trim($_POST['param']['type_name']):'';
            $this->db->insert('shop_spec_class',array('sp_cl_name'=>$name));
            $data = array('state' => true, 'msg' => "添加成功");
            echo json_encode($data);die;
        }else{
            $this->smarty->display('goods_type_add.html');
        }
    }

    /* 商品管理——类型属性 */

    public function type_val_add() {
        $this->common_function->shop_admin_priv("waybill");//权限
        if (isset($_GET['type_id'])){
            $this->smarty->assign('type_id',$_GET['type_id']);      //属性列表跳转过后自动选择商品属性
        }
        $type = $this->db->select('*')->from('shop_spec_class')->get()->result_array();
        $this->smarty->assign('type',$type);

        $this->smarty->display('type_val_add.html');
    }

    //修改类型属性
    public function type_val_edit() {
        $this->common_function->shop_admin_priv("depot_inplode");//权限

        $type_id = isset($_GET['type_id']) ? $_GET['type_id'] : false;
        if ($type_id) {
            $type = $this->db->select('*')->from('shop_spec')->where('sp_id', $type_id)->get()->result_array();
            if ($type[0]['sp_input_type'] == 2) {
                $type[0]['sp_select_lists'] = unserialize ($type[0]['sp_select_lists']);
                $type[0]['sp_select_lists'] = implode ("\r\n",$type[0]['sp_select_lists']);     //把sp_select_lists反序列化并拼接
            }
            $type_type = $this->db->select('*')->from('shop_spec_class')->get()->result_array();    //类型列表数据
            $this->smarty->assign('type',$type_type);

            $this->smarty->assign('type_val',$type[0]);
            $this->smarty->assign('type_id',$type[0]['sp_cl_id']);
            $this->smarty->display('type_val_add.html');
        } else {
            exit;
        }
    }
    //新增和修改type_val
    public function type_val_submit() {
        //print_r($_POST);die;
        $this->common_function->shop_admin_priv("waybill");//权限
        $param = isset($_POST['param'])?$_POST['param']:'';
        $inner['sp_id'] = isset($param['type_id'])?trim($param['type_id']):'';
        $inner['sp_name'] = isset($param['type_name'])?trim($param['type_name']):'';
        $inner['sp_sort'] = isset($param['sp_sort'])?trim($param['sp_sort']):'';
        $inner['sp_cl_id'] = isset($param['class_id'])?trim($param['class_id']):'';
        $inner['sp_cl_name'] = isset($param['class_name'])?trim($param['class_name']):'';
        $inner['sp_is_select'] = isset($param['check'])?trim($param['check']):1;
        $inner['sp_input_type'] = isset($param['check_type'])?trim($param['check_type']):1;
        $inner['sp_select_lists'] = isset($param['check_value'])?trim($param['check_value']):'';
        if(!empty($inner['sp_select_lists'])){
            $inner['sp_select_lists'] = explode("\r\n",$inner['sp_select_lists']);
            $inner['sp_select_lists'] = serialize($inner['sp_select_lists']);
        }
        if(!empty($inner['sp_cl_id'])){
            $inner['sp_cl_name'] = $this->db->select('sp_cl_name')->where('sp_cl_id',$inner['sp_cl_id'])->get('shop_spec_class')->row('sp_cl_name');
        }
        $this->db->replace('shop_spec',$inner);
        $links [0] ['text'] = '类型列表';
        $links [0] ['href'] = 'goods_type_management';
        $links [1] ['text'] = '返回';
        $links [1] ['href'] = 'javascript:history.go(-1)';
        $this->common_function->show_message('操作成功',1,$links);
        //print_r($inner);die;
    }
    /* 商品管理——编辑类型 */

    public function goods_type_edit() {
        $this->common_function->shop_admin_priv("depot_select");//权限
        $data = array('state' => false, 'msg' => "操作失败，请重试！");
        $type_id = $_GET['type_id'];
        if ($type_id) {
            if (isset($_GET['op']) && $_GET['op'] == 'edit') {
// 	            var_dump($_POST);exit;
                $param = $_POST['param'];
//                $spec_id = isset($_POST['spec_id']) ? $_POST['spec_id'] : array();
                $brand_id = isset($_POST['brand_id']) ? $_POST['brand_id'] : array();
                $at_value = isset($_POST['at_value']) ? $_POST['at_value'] : array();
                $custom = isset($_POST['custom']) ? $_POST['custom'] : array();
                $shop_type_brand_arr = array();
//                $shop_type_spec_arr = array();
                $at_value_arr = array();
                $custom_arr = array();
//                $old_spec = array();
                $old_brand = array();

                //旧的品牌和旧的规格
//     	        $old_spec_arr = $this->db->select('sp_id,type_id')->from('shop_type_spec')->where('type_id',$type_id)->get()->result_array();
//     	        $old_brand_arr = $this->db->select('brand_id,type_id')->from('shop_type_brand')->where('type_id',$type_id)->get()->result_array();
// //     	        $old_spec_arr = $this->db->select('sp_id')->from('shop_type_spec')->where('type_id',$type_id)->result_array();
//                 if(!empty($_POST['spec_id'])){
//                     if(!empty($old_spec_arr)){
//                         foreach ($old_spec_arr as $k=>$v){
//                             $del_spec[] = $v;
//                         }
//                     }else{
//                         $del_spec = false;
//                     }
//                     $new_spec_arr = false;
//                 }else{
//                     if(!empty($old_spec_arr)){
//                         foreach ($old_spec_arr as $k=>$v){
//                             $old_spec[] = $v['sp_id'];
//                             if(!(in_array($v['sp_id'], $spec_id))){
//                                 $del_spec[] = $v;
//                             }
//                         }
//                         $new_spec_arr = array_diff($spec_id,$old_spec);
//                     }else{
//                         $new_spec_arr = $spec_id;
//                         $del_spec = array();
//                     }
//                 }
//                 if($new_spec_arr){
//                     foreach ($new_spec_arr as $v){
//                         $new_spec[] = array(
//                             'type_id'=> $type_id,
//                             'sp_id'=>$v,
//                         );
//                     }
//                 }

//                if ($spec_id) {
//                    foreach ($spec_id as $v) {
//                        $new_spec[] = array(
//                            'type_id' => $type_id,
//                            'sp_id' => $v,
//                        );
//                    }
//                } else {
//                    $new_spec = false;
//                }

                if ($brand_id) {
                    foreach ($brand_id as $v) {
                        $new_brand[] = array(
                            'type_id' => $type_id,
                            'brand_id' => $v,
                        );
                    }
                } else {
                    $new_brand = false;
                }

                $del_at_arr = array();
                $update_at_arr = array();
                $del_custom_arr = array();
                $update_custom_arr = array();
                $add_at_value = array();
                $add_custom = array();
                foreach ($at_value as $v) {
                    if (isset($v['delete']) && !empty($v['delete'])) {
                        $del_at_arr[] = $v['delete'];
                        continue;
                    }
                    //逗号转化
                    $v['attr_value'] = preg_replace("/(\n)|(\s)|(\t)|(\')|(')|(，)/", ',', $v['attr_value']);
                    $v['attr_value'] = trim($v['attr_value'], ',');
                    $update_at_arr[] = array(
                        'attr_id' => $v['attr_id'],
                        'attr_name' => $v['attr_name'],
                        'attr_value' => $v['attr_value'],
                        'attr_show' => $v['attr_show'],
                        'attr_sort' => $v['attr_sort'],
                    );
                }
//                 var_dump($del_at_arr);exit;
                foreach ($custom as $v) {
                    //逗号转化
                    if (isset($v['delete']) && !empty($v['delete'])) {
                        $del_custom_arr[] = $v['delete'];
                        continue;
                    }
                    $update_custom_arr[] = array(
                        'attr_id' => $v['attr_id'],
                        'attr_name' => $v['attr_name'],
                    );
                }
//                 var_dump($del_custom_arr);exit;
                if (isset($_POST['new_at']) && !empty($_POST['new_at'])) {
                    foreach ($_POST['new_at'] as $v) {
                        $v['attr_value'] = preg_replace("/(\n)|(\s)|(\t)|(\')|(')|(，)/", ',', $v['attr_value']);
                        $v['attr_value'] = trim($v['attr_value'], ',');
                        $add_at_value[] = array(
                            'attr_name' => $v['attr_name'],
                            'attr_value' => $v['attr_value'],
                            'attr_show' => $v['attr_show'],
                            'attr_sort' => $v['attr_sort'],
                            'is_user_defined' => '0',
                            'type_id' => $type_id,
                        );
                    }
                }
                if (isset($_POST['custom_new']) && !empty($_POST['custom_new'])) {
                    foreach ($_POST['custom_new'] as $v) {
                        $add_custom[] = array(
                            'attr_name' => $v['attr_name'],
                            'attr_show' => 1,
                            'attr_sort' => '255',
                            'is_user_defined' => '1',
                            'type_id' => $type_id,
                        );
                    }
                }
                $this->db->trans_off(); //禁用事务
                $this->db->trans_start(); //开启事务
                $result = $this->db->update('shop_type', $param, array('type_id' => $type_id));
//                $result = $this->db->delete('shop_type_spec', array('type_id' => $type_id));
//                if ($new_spec) {
//                    $result = $this->db->insert_batch('shop_type_spec', $new_spec);
//                }
                $result = $this->db->delete('shop_type_brand', array('type_id' => $type_id));
                if ($new_brand) {
                    $result = $this->db->insert_batch('shop_type_brand', $new_brand);
                }
                if (!empty($del_at_arr)) {
                    $this->db->where_in('attr_id', $del_at_arr);
                    $result = $this->db->delete('shop_attribute');
                    $del_attribute_value = $this->db->select('attr_value_id')->from('shop_attribute_value')->where_in('attr_id', $del_at_arr)->where('type_id', $type_id)->get()->result_array();
                    if (!empty($del_attribute_value)) {
                        $result = $this->db->where_in('attr_id', $del_at_arr)->where('type_id', $type_id)->delete('shop_attribute_value');
                    }
                }
                if (!empty($update_at_arr)) {
                    $this->db->update_batch('shop_attribute', $update_at_arr, 'attr_id');
                }
                if (!empty($del_custom_arr)) {
                    $this->db->where_in('attr_id', $del_custom_arr);
                    $result = $this->db->delete('shop_attribute');
                }
                if (!empty($update_custom_arr)) {
                    $result = $this->db->update_batch('shop_attribute', $update_custom_arr, 'attr_id');
                }
                if (!empty($add_at_value)) {
                    $result = $this->db->insert_batch('shop_attribute', $add_at_value);
                }
                if (!empty($add_custom)) {
                    $result = $this->db->insert_batch('shop_attribute', $add_custom);
                }

                // $result = $this->db->delete('shop_attribute_value',array('type_id'=>$type_id));
                $this->db->trans_complete(); //事务完成
                $this->db->trans_off(); //禁用事务
// 	            if($result){
// 	                $att_value = array();
// 	                $attribute_value = $this->db->select('attr_id,type_id,attr_value')->from('shop_attribute')->where('type_id',$type_id)->get()->result_array();
// 	                if(!empty($attribute_value)){
// 	                    foreach ($attribute_value as $k=>$v){
// 	                        $v['attr_value'] = explode(',', $v['attr_value']);
// 	                        foreach ($v['attr_value'] as $vv)
// 	                        $att_value[] = array(
// 	                            'attr_value_name'=>$vv,
// 	                            'attr_id'=>$v['attr_id'],
// 	                            'type_id'=>$v['type_id'],
// 	                            'attr_value_sort'=>'255',
// 	                        );
// 	                    }
// 	                }
// 	                $result = $this->db->insert_batch('shop_attribute_value',$att_value);
// 	            }
                if ($this->db->trans_status()!==false) {
                    $this->common_function->shop_admin_log($type_id, 'edit', '类型');
                    $data = array('state' => true, 'msg' => '编辑成功！', 'data' => $type_id);
                }
                echo json_encode($data);
                exit;
            } elseif (isset($_GET['op']) && $_GET['op'] == 'change_att_value') {
                $attr_value_arr = isset($_POST['attr_value']) ? $_POST['attr_value'] : [];
                $param = $_POST['param'];
                $new_array = array();
                $del_array = array();
                $add_array = array();
                $value = array();
                $type_id = $_POST['type_id'];
                $attr_id = $_POST['attr_id'];
//                var_dump($_POST);exit;
                foreach ($attr_value_arr as $k => $v) {
                    if (isset($_POST['attr_del']) && !empty($_POST['attr_del'])) {
                        if (in_array($v['attr_value_id'], $_POST['attr_del'])) {
                            $del_array[] = $v['attr_value_id'];
                            unset($v);
                            continue;
                        }
                    }
                    $new_array[] = array(
                        'attr_value_id' => $v['attr_value_id'],
                        'attr_value_name' => $v['name'],
                        'attr_value_sort' => $v['sort'],
                    );
                    $value[] = $v['name'];
                }
                if (isset($_POST['new']) && !empty($_POST['new'])) {
                    foreach ($_POST['new'] as $v) {
                        $add_array[] = array(
                            'attr_value_name' => $v['name'],
                            'attr_id' => $attr_id,
                            'type_id' => $type_id,
                            'attr_value_sort' => $v['sort'],
                        );
                        $value[] = $v['name'];
                    }
                }
                $param['attr_value'] = implode(',', $value);
//                var_dump();exit;
                $this->db->trans_off(); //禁用事务
                $this->db->trans_start(); //开启事务
                if (!empty($new_array)) {
                    $result = $this->db->update_batch('shop_attribute_value', $new_array, 'attr_value_id');
                }
                if (isset($_POST['new']) && !empty($_POST['new'])) {
                    $result = $this->db->insert_batch('shop_attribute_value', $add_array);
                }
                if (isset($_POST['attr_del']) && !empty($_POST['attr_del'])) {
                    $this->db->where_in('attr_value_id', $del_array);
                    $result = $this->db->delete('shop_attribute_value');
                }
                $result = $this->db->update('shop_attribute', $param, array('attr_id' => $attr_id, 'type_id' => $type_id));
                $this->db->trans_complete(); //事务完成
                $this->db->trans_off(); //禁用事务
                if ($result) {
                    $data = array('state' => true, 'msg' => '操作成功', 'data' => $type_id);
                }
                echo json_encode($data);
                exit;
            } elseif (isset($_GET['op']) && $_GET['op'] == 'delete') {
                $del_id = isset($_GET['type_id']) ? explode(',', $_GET['type_id']) : 0;
                if ($del_id) {
                    $result = $this->db->where_in('type_id', $del_id)->delete('shop_type');
                    if ($result) {
                        $this->common_function->shop_admin_log($_GET['type_id'], 'del', '类型');
                        $data = array('state' => true, 'msg' => '删除成功');
                    }
                }
                echo json_encode($data);
                exit;
            } else {
                $type_info = $this->db->select('type_id,type_name,type_sort,class_id,class_name')->from('shop_type')->where('type_id', $type_id)->get()->row_array();
                $type_info['shop_type_brand'] = $this->db->select('*')->from('shop_type_brand')->where('type_id', $type_id)->get()->result_array();
//                $type_info['shop_type_spec'] = $this->db->select('*')->from('shop_type_spec')->where('type_id', $type_id)->get()->result_array();
                $type_info['at_value'] = $this->db->select('*')->from('shop_attribute')->where('type_id', $type_id)->where('is_user_defined', 0)->get()->result_array();
                $type_info['custom'] = $this->db->select('*')->from('shop_attribute')->where('type_id', $type_id)->where('is_user_defined', 1)->get()->result_array();
                $first_classes = $this->db->select('gc_id,gc_name')->from('shop_goods_class')->where('gc_parent_id', 0)->get()->result_array();
                $brands = $this->db->select('brand_id,brand_name,brand_class,class_id')->from('shop_brand')->order_by('class_id')->get()->result_array();
                $specs = $this->db->select('sp_id,sp_name,class_id,class_name')->from('shop_spec')->order_by('class_id')->get()->result_array();
                $class = array();
                $brand_arr = array();
                foreach ($brands as $v) {
                    if ($v['class_id'] == 0) {
                        $brand_arr[$v['class_id']]['class_name'] = '默认';
                        $brand_arr[$v['class_id']]['classes'][] = $v;
                    } elseif (in_array($v['class_id'], $class)) {
                        $brand_arr[$v['class_id']]['classes'][] = $v;
                    } else {
                        $class[] = $v['class_id'];
                        $brand_arr[$v['class_id']]['class_name'] = $v['brand_class'];
                        $brand_arr[$v['class_id']]['classes'][] = $v;
                    }
                }
                $class = array();
//                $spec_arr = array();
//                foreach ($specs as $v) {
//                    if ($v['class_id'] == 0) {
//                        $spec_arr[$v['class_id']]['class_name'] = '默认';
//                        $spec_arr[$v['class_id']]['classes'][] = $v;
//                    } elseif (in_array($v['class_id'], $class)) {
//                        $spec_arr[$v['class_id']]['classes'][] = $v;
//                    } else {
//                        $class[] = $v['class_id'];
//                        $spec_arr[$v['class_id']]['class_name'] = $v['class_name'];
//                        $spec_arr[$v['class_id']]['classes'][] = $v;
//                    }
//                }
                //             var_dump($type_info['shop_type_spec']);exit;
                $this->smarty->assign('type_info', $type_info);
//                $this->smarty->assign('spec_arr', $spec_arr);
                $this->smarty->assign('brand_arr', $brand_arr);
                $this->smarty->assign('first_classes', $first_classes);
                $this->smarty->display('goods_type_edit.html');
            }
        } else {
            echo json_encode($data);
            exit;
        }
    }

    /* 商品管理——规格管理 */

    public function goods_specifications() {
        $this->common_function->shop_admin_priv("depot_select");//权限
        if (isset($_GET['op']) && $_GET['op'] == 'getList') {
            $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
            $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
            $query = isset($_POST['query']) ? $_POST['query'] : false;
            $start = ($page - 1) * $rp;

            $this->db->select('sp_id,sp_name,sp_sort,class_id,class_name');
            $this->db->from('shop_spec');
            if ($qtype && $query) {
                if ($qtype == 'sp_id') {
                    $this->db->like('sp_id', $query);
                } elseif ($qtype == 'sp_name') {
                    $this->db->like('sp_name', $query);
                } elseif ($qtype == 'class_id') {
                    $this->db->like('class_id', $query);
                } elseif ($qtype == 'class_name') {
                    $this->db->like('class_name', $query);
                }
            }

            $db = clone($this->db);
            $total = $this->db->count_all_results();
            $this->db = $db;
            $this->db->limit($rp, $start);
            $this->db->order_by('sp_sort');
            $rows = $this->db->get()->result_array();

            header("Content-type: text/xml");
            $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
            $xml .= "<rows>";
            $xml .= "<page>$page</page>";

            foreach ($rows as $row) {
                $xml .= "<row id='" . $row['sp_id'] . "'>";
                $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['sp_id'] . ")'><i class='fa fa-trash-o'></i>删除</a><a class='btn green' onclick='fg_edit(" . $row['sp_id'] . ")'><i class='fa fa-edit'></i>编辑</a>]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['sp_id'] . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['sp_name'] . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['sp_sort'] . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['class_id'] . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['class_name'] . "]]></cell>";
                $xml .= "</row>";
            }
            $xml .= "<total>$total</total>";
            $xml .= "</rows>";
            echo $xml;
            exit;
        }
        $this->smarty->display('goods_specifications.html');
    }

    /* 商品管理——规格管理——新增 */

    public function goods_specifications_add() {
        $this->common_function->shop_admin_priv("depot_select");//权限
        $data = array('state' => false, 'msg' => "操作失败，请重试！");
        if (isset($_GET['op']) && $_GET['op'] = 'add') {
            $param = $_POST['param'];
            $result = $this->db->insert('shop_spec', $param);
            if ($result) {
                $this->common_function->shop_admin_log($param['sp_name'], 'add', '规格');
                $data = array('state' => true, 'msg' => '添加成功！');
            }
            echo json_encode($data);
            exit;
        } else {
            $first_classes = $this->db->select('gc_id,gc_name')->from('shop_goods_class')->where('gc_parent_id', 0)->get()->result_array();
            $this->smarty->assign('first_classes', $first_classes);
            $this->smarty->display('goods_specifications_add.html');
        }
    }

    /* 商品管理——规格管理——编辑 */

    public function goods_specifications_edit() {
        $this->common_function->shop_admin_priv("depot_select");//权限
        $data = array('state' => false, 'msg' => "操作失败，请重试！");
        $sp_id = $_GET['sp_id'];
        if ($sp_id) {
            if (isset($_GET['op']) && $_GET['op'] == 'edit') {
                $param = $_POST['param'];
                $result = $this->db->update('shop_spec', $param, array('sp_id' => $sp_id));
                if ($result) {
                    $this->common_function->shop_admin_log($sp_id, 'edit', '规格');
                    $data = array('state' => true, 'msg' => '编辑成功！', 'data' => $sp_id);
                }
                echo json_encode($data);
                exit;
            } elseif (isset($_GET['op']) && $_GET['op'] == 'delete') {
                $del_id = isset($_GET['sp_id']) ? explode(',', $_GET['sp_id']) : 0;
                if ($del_id) {
                    $result = $this->db->where_in('sp_id', $del_id)->delete('shop_spec');
                    if ($result) {
                        $this->common_function->shop_admin_log($_GET['sp_id'], 'del', '规格');
                        $data = array('state' => true, 'msg' => '删除成功');
                    }
                }
                echo json_encode($data);
                exit;
            } else {
                $spec_info = $this->db->select('sp_id,sp_name,sp_sort,class_id,class_name')->from('shop_spec')->where('sp_id', $sp_id)->get()->row_array();
                $first_classes = $this->db->select('gc_id,gc_name,gc_parent_id')->from('shop_goods_class')->where('gc_parent_id', 0)->get()->result_array();
                $this->smarty->assign('spec_info', $spec_info);
                $this->smarty->assign('first_classes', $first_classes);
                $this->smarty->display('goods_specifications_add.html');
            }
        } else {
            echo json_encode($data);
            exit;
        }
    }

    /* 商品管理——图片空间 */

    public function goods_pic_room() {
        $this->common_function->shop_admin_priv("agent_discount");//权限
        if (isset($_GET['op']) && $_GET['op'] == 'getList') {
            $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
            $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
            $query = isset($_POST['query']) ? $_POST['query'] : false;
            $start = ($page - 1) * $rp;

            $this->db->select('sac.aclass_id,sac.aclass_name,sac.aclass_des,sac.aclass_sort,sac.aclass_cover,sac.upload_time,sac.is_default');
            $this->db->from('shop_album_class as sac');
            if ($qtype && $query) {
                if ($qtype == 'aclass_id') {
                    $this->db->like('aclass_id', $query);
                } elseif ($qtype == 'aclass_name') {
                    $this->db->like('aclass_name', $query);
                }
            }

            $db = clone($this->db);
            $total = $this->db->count_all_results();
            $this->db = $db;
            $this->db->limit($rp, $start);
            $this->db->order_by('aclass_sort');
            $rows = $this->db->get()->result_array();

            header("Content-type: text/xml");
            $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
            $xml .= "<rows>";
            $xml .= "<page>$page</page>";

            foreach ($rows as $row) {
                $pic_info = $this->db->select('count(1) as num,apic_cover')->from('shop_album_pic')->where('aclass_id', $row['aclass_id'])->order_by('upload_time','ASC')->get()->row_array();
                $num = $pic_info['num'];
                $aclass_cover = empty($row['aclass_cover']) ? base_url() . 'data/shop/album_pic/' . $pic_info['apic_cover'] : base_url() . 'data/shop/album_pic/' . $row['aclass_cover'];
                $xml .= "<row id='" . $row['aclass_id'] . "'>";

                if ($row['is_default'] == 1) {
                    $xml .= "<cell><![CDATA[<a class='btn red' style='display:none;' onclick='fg_delete(" . $row['aclass_id'] . ")'><i class='fa fa-trash-o'></i>删除</a><a class='btn green' onclick='fg_view(" . $row['aclass_id'] . ")'><i class='fa fa-list-alt'></i>查看</a>]]></cell>";
                } else {
                    $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['aclass_id'] . ")'><i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em><ul>";
                    $xml .= "<li><a href='javascript:void(0);' onclick='fg_view(" . $row['aclass_id'] . ")'>查看</a></li>";
                    $xml .= "<li><a href='javascript:void(0);' onclick='fg_edit(" . json_encode($row) . ")'>编辑</a></li>";
                    $xml .= "</ul></span>]]></cell>";
                }
                $xml .= "<cell><![CDATA[" . $row['aclass_name'] . "]]></cell>";
                $xml .= '<cell><![CDATA[<i class="fa fa-photo" aria-hidden="true" data-geo="<img src=\'' . $aclass_cover . '\'>"></i>]]></cell>';
                $xml .= "<cell><![CDATA[" . $num . "]]></cell>";
                $xml .= "<cell><![CDATA[" . $row['aclass_des'] . "]]></cell>";
                $xml .= "</row>";
            }
            $xml .= "<total>$total</total>";
            $xml .= "</rows>";
            echo $xml;
            exit;
        }
        $this->smarty->display('goods_pic_room.html');
    }

    /* 商品管理——图片空间——查看图片 */

    public function goods_pic_room_view() {
        $this->common_function->shop_admin_priv("agent_discount");//权限
        $aclass_id = isset($_GET['aclass_id']) ? $_GET['aclass_id'] : false;
        $page = isset($_GET['curpage']) ? intval($_GET['curpage']) : 1;
        $rp = isset($_GET['rp']) ? $_GET['rp'] : 36;
        $start = ($page - 1) * $rp;

        $this->db->select('apic_id,apic_name,apic_tag,aclass_id,apic_cover,apic_size,apic_spec,upload_time');
        $this->db->from('shop_album_pic');
        if ($aclass_id) {
            $this->db->where('aclass_id', $aclass_id);
        }
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
        $this->db->limit($rp, $start);
        $this->db->order_by('upload_time', 'DESC');
        $rows = $this->db->get()->result_array();
        $page_count = ceil($total / $rp);
        foreach ($rows as $k => $v) {
            $rows[$k]['upload_time'] = date('Y-m-d', $v['upload_time']);
            $rows[$k]['apic_size'] = sprintf("%.2f", $v['apic_size'] / 1024);
            $rows[$k]['pic_url'] = base_url() . 'data/shop/album_pic/' . $v['apic_cover'];
            //$rows[$k]['pic_url'] = base_url().'data/shop/album_pic/'.$v['aclass_id'].'/'.$v['apic_cover'];
        }
// 	    var_dump($rows);exit;
        $page_info = array('total_num' => $total, 'page_count' => $page_count, 'page' => $page, 'rp' => $rp, 'start' => $start + 1, 'to' => $start + count($rows), 'curr' => $page);
        if (isset($_GET['op']) && $_GET['op'] == 'page') {
            $data = array(
                'page_info' => $page_info,
                'pic_info' => $rows
            );
            echo json_encode($data);
            exit;
        }
        $this->smarty->assign('aclass_id', $aclass_id);
        if($aclass_id){
            $aclass_name = $this->db->select('aclass_name')->from('shop_album_class')->where('aclass_id',$aclass_id)->get()->row('aclass_name');
            $this->smarty->assign('aclass_name', $aclass_name);
        }
        $this->smarty->assign('pic_info', $rows);
        $this->smarty->assign('page_info', $page_info);
        $this->smarty->display('goods_pic_room_view.html');
    }

    public function delete_pic() {
        $this->common_function->shop_admin_priv("agent_discount");//权限
        $data = array('state' => false, 'msg' => '操作失败，请重试');
        $file_dir = ROOTPATH . 'data/shop/album_pic/';
        if (isset($_GET['op']) && $_GET['op'] == 'del') {
            $del_id = isset($_GET['ids']) ? explode(',', $_GET['ids']) : 0;
            if ($del_id) {
                $pic_info = $this->db->select('apic_id,aclass_id,apic_cover')->from('shop_album_pic')->where_in('apic_id', $del_id)->get()->row_array();
                $result = $this->db->where_in('apic_id', $del_id)->delete('shop_album_pic');
                if ($result) {
                    if (file_exists($file_dir . $pic_info['apic_cover'])) {
                        @unlink($file_dir . $pic_info['apic_cover']);
                    }
                    $this->common_function->shop_admin_log($_GET['ids'], 'del', '相册图片');
                    $data = array('state' => true, 'msg' => '删除成功', 'data' => $_GET['ids']);
                }
            }
        } elseif (isset($_GET['op']) && $_GET['op'] == 'del_batch') {
            $aclass_id = isset($_POST['aclass_id']) ? $_POST['aclass_id'] : 0;
            $del_id = isset($_POST['delbox']) ? $_POST['delbox'] : 0;
            $rows = $this->db->select('apic_id,aclass_id,apic_cover')->from('shop_album_pic')->where_in('apic_id', $del_id)->get()->result_array();
            $result = $this->db->where_in('apic_id', $del_id)->delete('shop_album_pic');
            if ($result) {
                foreach ($rows as $v) {
                    if (file_exists($file_dir . $v['apic_cover'])) {
                        @unlink($file_dir . $v['apic_cover']);
                    }
                }
                $this->common_function->shop_admin_log($aclass_id, 'del', '相册的图片');
                $data = array('state' => true, 'msg' => '删除成功', 'data' => $aclass_id);
            }
        }
        echo json_encode($data);
        exit;
    }

    /* 商品管理——图片空间——编辑相册 */

    public function goods_pic_room_edit() {
        $this->common_function->shop_admin_priv("agent_discount");//权限
        $data = array('state' => false, 'msg' => "操作失败，请重试！");
        if (isset($_GET['op']) && $_GET['op'] == 'add') {
            $param = $_POST['param'];
            $result = $this->db->insert('shop_album_class', $param);
            if ($result) {
                $this->common_function->shop_admin_log($param['aclass_name'], 'add', '相册');
                $data = array('state' => true, 'msg' => "操作成功！");
            }
            echo json_encode($data);
            exit;
        }if (isset($_GET['op']) && $_GET['op'] == 'edit') {
            $aclass_id = isset($_POST['aclass_id']) ? $_POST['aclass_id'] : false;
            if ($aclass_id) {
                $param = $_POST['param'];
                $result = $this->db->update('shop_album_class', $param, array('aclass_id' => $aclass_id));
                if ($result) {
                    $this->common_function->shop_admin_log($aclass_id, 'edit', '相册');
                    $data = array('state' => true, 'msg' => "操作成功！");
                }
            }
            echo json_encode($data);
            exit;
        } elseif (isset($_GET['op']) && $_GET['op'] == 'delete') {
            $del_id = isset($_GET['aclass_id']) ? explode(',', $_GET['aclass_id']) : 0;
            $shop_album_pics = $this->db->select('apic_id,aclass_id,apic_cover')->from('shop_album_pic')->where_in('aclass_id', $del_id)->get()->result_array();
            if ($del_id) {
                $result = $this->db->where_in('aclass_id', $del_id)->delete('shop_album_class');
                if ($result) {
                    if ($shop_album_pics) {
                        $result = $this->db->where_in('aclass_id', $del_id)->delete('shop_album_pic');
                        if ($result) {
                            $dir = ROOTPATH . 'data/shop/album_pic/';
                            foreach ($shop_album_pics as $v) {
                                if (file_exists($dir . $v['apic_cover'])) {
                                    @unlink($dir . $v['apic_cover']);
                                }
                            }
                        }
                    }
                    $this->common_function->shop_admin_log($_GET['aclass_id'], 'del', '相册');
                    $data = array('state' => true, 'msg' => '删除成功');
                }
            }
            echo json_encode($data);
            exit;
        }
    }

    //为相册上传图片
    public function goods_pic_upload() {
        $this->common_function->shop_admin_priv("agent_discount");//权限
// 	    var_dump($_POST);exit;
        $data = array('state' => false, 'msg' => "操作失败，请重试！");
        $param = array();
        $pic = array();
        $img = array();
        $default_aclass = $this->db->select('aclass_id')->from('shop_album_class')->where('is_default', 1)->get()->row('aclass_id');
        $param['aclass_id'] = isset($_POST['aclass_id']) ? trim($_POST['aclass_id']) : $default_aclass;
        $param['apic_tag'] = isset($_POST['apic_tag']) ? trim($_POST['apic_tag']) : '';
        $dir = ROOTPATH . 'data/shop/album_pic/';
// 	    $dir = ROOTPATH . 'data/shop/album_pic/'.$param['aclass_id'].'/';
        if (!file_exists($dir)) {
            $this->common_function->createDir($dir);
        }
        $file_id = isset($_POST['file_id']) ? $_POST['file_id'] : '';
// 	    var_dump($_FILES );exit;
        if (isset($_GET['op']) && $_GET['op'] == 'ajax_upload') {
            $name = empty($_POST['name']) ? 'image' : $_POST['name'];
            $tmp_file = $_FILES [$name] ['tmp_name'];
// 	        var_dump($_FILES[$name]);exit;
            $file_types = explode(".", $_FILES [$name] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            if (!in_array(strtolower($file_type), array('gif', 'jpeg', 'png', 'bmp', 'jpg'))) {
                $data = array('state' => false, 'msg' => "不是图片文件，请重新选择文件！");
                echo json_encode($data);
                exit();
            }
            $pic['img_tmp_name'] = $tmp_file;
            $pic['img_size'] = $_FILES [$name]['size'];
            $pic['img_name'] = $_FILES [$name]['name'];
        } else {
            if (!isset($_FILES['image']) || empty($_FILES['image'])) {
                sleep(3);
                echo json_encode($data);
                exit;
            }
            $img = $_FILES['image'];
            $pic['img_name'] = $img['name'][0];
            $pic['img_type'] = $img['type'][0];
            $pic['img_tmp_name'] = $img['tmp_name'][0];
            $pic['img_error'] = $img['error'][0];
            $pic['img_size'] = $img['size'][0];
            $file_types = explode(".", $pic['img_name']);
            $file_type = $file_types [count($file_types) - 1];
            if (!in_array(strtolower($pic['img_type']), array('image/gif', 'image/jpeg', 'image/png', 'image/bmp', 'image/jpg'))) {
                sleep(3);
                $data['msg'] = $pic['img_name'] . '不是图片文件，请重新选择文件！';
                $data['data'] = $pic['img_name'];
                echo json_encode($data);
                exit;
            }
        }

        $file_name = $param['aclass_id'] . '_' . date("YmdHis") . rand(0, 7) . '.' . $file_type;
        if (!copy($pic['img_tmp_name'], $dir . $file_name)) {
            $data = array('state' => false, 'msg' => $pic['img_name'] . "图片上传失败，请重试！", 'data' => $pic['img_name']);
            echo json_encode($data);
            exit();
        }
        $pic_size_arr = getimagesize($dir . $file_name);
        $param['apic_cover'] = $file_name;
        $param['apic_size'] = $pic['img_size'];
        $param['apic_spec'] = $pic_size_arr[0] . 'x' . $pic_size_arr[1];
        $param['upload_time'] = time();
        $result = $this->db->insert('shop_album_pic', $param);
        if ($result) {
            $this->common_function->shop_admin_log($param['aclass_id'], 'add', '相册上传图片');
            $pic_info = $this->db->select('apic_id,apic_name,apic_tag,aclass_id,apic_cover,apic_size,apic_spec,upload_time')->from('shop_album_pic')->order_by('apic_id', 'DESC')->limit(1)->get()->row_array();
            $pic_info['pic_url'] = base_url() . 'data/shop/album_pic/' . $pic_info['apic_cover'];
//            var_Dump($dir . $file_name);exit;
            $this->common_function->has_mark($dir . $file_name); //添加水印的操作（传入绝对路径）
            $data = array('state' => true, 'msg' => '上传完成', 'data' => $pic_info['apic_cover'], 'pic_info' => $pic_info);
        }
        echo json_encode($data);
        exit;
    }

    //获取指定分类指定属性属性选项
    public function get_next_classes() {
        $gc_parent_id = isset($_GET['gc_parent_id']) ? $_GET['gc_parent_id'] : false;
        $data = null;
        if ($gc_parent_id) {
            $data = $this->db->select('gc_id,gc_name,gc_parent_id')->from('shop_goods_class')->where('gc_parent_id', $gc_parent_id)->get()->result_array();
        }
        echo json_encode($data);
    }

    //获取下一级分类
    public function get_attribute_value() {
        $type_id = isset($_GET['type_id']) ? $_GET['type_id'] : false;
        $attr_id = isset($_GET['attr_id']) ? $_GET['attr_id'] : false;
        if ($type_id && $attr_id) {
            $data = $this->db->select('*')->from('shop_attribute_value')->where('attr_id', $attr_id)->where('type_id', $type_id)->get()->result_array();
//            var_dump();exit;
        } else {
            $data = false;
        }
        echo json_encode($data);
    }

    //获取所有
    public function get_all_shop_album() {
        $data = $this->db->select('aclass_id,aclass_name')->from('shop_album_class')->order_by('aclass_sort')->get()->result_array();
        echo json_encode($data);
        exit;
    }

    /* 图片空间——弹出框（批量上传插件） */

    public function goods_pic_room_box() {
        $this->common_function->shop_admin_priv("agent_discount");//权限
        $this->smarty->display('goods_pic_room_box.html');
    }

    /* 获取指定类型的品牌列表 */

    public function get_brands_by_type() {
        $this->common_function->shop_admin_priv("depot_inplode");//权限
        $type = isset($_GET['type']) ? $_GET['type'] : 'keyword';
        $keyword = false;
        $letter = false;
        if ($type == 'keyword') {
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;
        } elseif ($type == 'letter') {
            $letter = isset($_GET['letter']) ? $_GET['letter'] : false;
        }
        $type_id = empty($_GET['tid']) ? true : $_GET['tid'];
        if($type_id){
            $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial');
            $this->db->from('shop_brand as sb');
            //$this->db->join('shop_type_brand as stb', 'stb.brand_id=sb.brand_id', 'left');
            $this->db->where("sb.brand_name is not NULL AND sb.brand_name != ''");
//            $this->db->group_start();
            //$this->db->where('stb.type_id', $type_id);
//            $this->db->or_group_start();
//            $this->db->where('class_id', 0);
//            $this->db->group_end();
//            $this->db->group_end();
            if ($keyword) {
                $this->db->group_start();
                $this->db->like('brand_initial', $keyword);
                $this->db->or_group_start();
                $this->db->like('brand_name', $keyword);
                $this->db->group_end();
                $this->db->group_end();
            } elseif ($letter && $letter!='all') {
                $this->db->where('brand_initial', $letter);
            }
            $this->db->order_by('brand_initial');
            $brands = $this->db->get()->result_array();
        }else{
            $brands = null;
        }
        echo json_encode($brands);
        exit;
    }

    /* 商品添加页面添加规格值 */

    public function ajax_add_spec_value() {
        $data['state'] = false;
        $param['gc_id'] = isset($_GET['gc_id']) ? $_GET['gc_id'] : 0;
        $param['sp_id'] = isset($_GET['sp_id']) ? $_GET['sp_id'] : 0;
        $param['sp_value_name'] = isset($_GET['name']) ? $_GET['name'] : 0;
        $result = $this->db->insert('shop_spec_value', $param);
        if ($result) {
            $data['state'] = true;
            $data['value_id'] = $this->db->insert_id();
        }
        echo json_encode($data);
        exit;
    }

    /* 商品添加页面修改规格值 */

    public function ajax_edit_spec_value() {
        $data = array('state' => false, 'msg' => '操作失败，请重试！');
        $sp_value_id = isset($_GET['value_id']) ? $_GET['value_id'] : false;
        if ($sp_value_id) {
            $param['sp_value_name'] = isset($_GET['sp_value_name']) ? $_GET['sp_value_name'] : 0;
            $result = $this->db->update('shop_spec_value', $param, array('sp_value_id' => $sp_value_id));
            if ($result) {
                $data = array('state' => true, 'msg' => '操作成功！');
            } else {
                $data['data'] = $this->db->select('sp_value_name')->from('shop_spec_value')->where('sp_value_id', $$sp_value_id)->get()->row('sp_value_name');
            }
        }
        echo json_encode($data);
        exit;
    }

    /* 商品添加页面second----ajax通过货号获取能提供货品的仓库 */

    public function get_depots_by_stocks_code() {
        $data = array('state' => false, 'msg' => '操作错误,请重试！');
        $stocks_code = isset($_GET['stocks_code']) ? $_GET['stocks_code'] : false;

        if ($stocks_code) {
            $goods_info = $this->db->select('sg.goods_id')->from('shop_goods as sg')->join('shop_goods_amount as sga', 'sga.goods_id = sg.goods_id', 'left')->where_not_in('sg.goods_state', array('0', '10'))->where('sga.stocks_code', $stocks_code)->get()->row_array();
            if (isset($_GET['goods_id']) && !empty($_GET['goods_id'])) {
                if ($_GET['goods_id'] == $goods_info['goods_id']) {
                    unset($goods_info);
                }
            }
            if (empty($goods_info)) {
                $data['data'] = $this->db->select('sa.depot_code,dp.depot_name')->from('stocks_amount as sa')->join('depot as dp', 'dp.depot_code=sa.depot_code', 'left')->join('stocks as s', 's.article_number=sa.article_number')->where('sa.article_number', $stocks_code)->where_not_in('sa.stock', array(0))->group_by('sa.depot_code')->get()->result_array();
                if (!empty($data['data'])) {
                    $data['state'] = true;
                } else {
                    $data = array('state' => false, 'msg' => '没有此货号的库存，请核对商家货号是否正确！');
                }
            } else {
                $data = array('state' => false, 'msg' => '该商品已上架！');
            }
        }
        echo json_encode($data);
        exit;
    }
    
    
    /* 商品添加页面second----ajax获取上市年份选项 */
    
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


    /* 商品添加页面second----ajax通过货号商品信息 */

    public function get_stocksinfo_by_stocks_code() {
        $data = array('state' => false, 'msg' => '没有此货号的库存，请核对商家货号是否正确!');
        $stocks_code = isset($_GET['stocks_code']) ? $_GET['stocks_code'] : false;
        if ($stocks_code) {
            $data['data'] = $this->db->select('stocks_name,tag_price,barcode')->from('stocks')->where('article_number', $stocks_code)->get()->row_array();
            if (!empty($data['data'])) {
                unset($data['msg']);
                $data['state'] = true;
            }
        }
        echo json_encode($data);
        exit;
    }

    /* 商品添加页面second----ajax获取分类选项 */

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
    /* 商品添加页面second----ajax获取分类选项 */

    public function ajax_get_gstn_option() {
        $data = array('state' => true, 'msg' => '');
        $gstn_id = !empty($_GET['gstn_id']) ? explode(',', $_GET['gstn_id']) : 0;
        $gstn_arr = $this->goods_model->get_gstn_by_parent_id(0);
        $gstn_option = $this->goods_model->gstn_array_to_option($gstn_arr, $gstn_id,true); //分类选项(需要拼接分类名称)
        $data['info'] = $gstn_option;
        echo json_encode($data);
        exit;
    }
    /* 商品添加页面second----ajax获取分类商品属性 */
    
    public function ajax_get_attr() {
        $data = array('state' => false, 'msg' => '');
        //        var_dump($_GET['cate_id']);exit;
        $cate_id = !empty($_GET['class_id']) ? trim($_GET['class_id']) : '';
        if($cate_id){
            $attr_arr = $this->goods_model->get_class_attr($cate_id);
            $data['state'] = true;
            $data['info'] = $attr_arr;
        }
        echo json_encode($data);
        exit;
    }
    /* 商品添加页面second----ajax通过货号商品信息 */

    public function ajax_get_info_by_class() {
        $data = array('state' => false, 'msg' => '参数错误！');
        $class_id = !empty($_GET['class_id']) ? $_GET['class_id'] : true;
        if ($class_id) {
            
            /* $curr_class_info = $this->db->select('sgc.gc_id,sgc.gc_name,sgc.gc_parent_id,st.type_id')->from('shop_goods_class as sgc')->join('shop_type as st', 'st.class_id=sgc.gc_id', 'left')->where('gc_id', $class_id)->get()->row_array();
            $size_arr = false;
            $brands = false;
//            $specs = false;
            $attr_arr = false;
            $attr_custom = false;
//            var_dump($curr_class_info);exit;
            $sizes = $this->db->select('css.size,css.flag,css.cs_id')->from('code_segment_size css')->join('code_segment cs','css.cs_id=cs.cs_id')->where('gc_id',$curr_class_info['gc_id'])->get()->result_array();
            if(!empty($sizes)){
                $flag_arr = array('1'=>'中国码','2'=>'美国码','3'=>'英国码','4'=>'日本码');
                foreach($sizes as $k=>$v){
                    $size_arr[$v['flag']]['size_list'][] = $v;
                }
            }
            if (!empty($curr_class_info['type_id'])) {
                $brands = $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial')->from('shop_brand as sb')->join('shop_type_brand as stb', 'sb.brand_id=stb.brand_id', 'left')->order_by('sb.brand_initial')->where('stb.type_id', $curr_class_info['type_id'])->where("sb.brand_name is not NULL AND sb.brand_name != ''")->group_by('sb.brand_id')->get()->result_array(); //品牌信息
//                $specs = $this->db->select('ss.sp_id,ss.sp_name,ss.class_id')->from('shop_spec as ss')->join('shop_type_spec as sts', 'sts.sp_id=ss.sp_id', 'left')->group_start()->where('sts.type_id', $curr_class_info['type_id'])->or_group_start()->where('ss.class_id', 0)->group_end()->group_end()->where("ss.sp_name is not NULL AND ss.sp_name != ''")->group_by('ss.sp_id')->order_by('ss.sp_sort')->get()->result_array(); //规格信息
                $attributes = $this->db->select('sa.attr_id,sa.attr_name,sa.is_user_defined')->from('shop_attribute as sa')->where('sa.type_id', $curr_class_info['type_id'])->where('sa.attr_show', 1)->get()->result_array();    //属性
                $attr_arr = array();
                $attr_custom = array();
                if (!empty($attributes)) {//属性值选项
                    foreach ($attributes as $v) {
                        if ($v['is_user_defined'] != 1) {
                            $attr_arr[$v['attr_id']] = $v;
                            $attr_arr[$v['attr_id']]['values'] = $this->db->select('attr_value_id,attr_value_name,attr_id,type_id')->from('shop_attribute_value')->where('attr_id', $v['attr_id'])->get()->result_array();
                        } else {
                            $attr_custom[$v['attr_id']] = $v;   //自定义属性
                        }
                    }
                }
            } */
            //var_dump($colors);exit;
            $size_arr = '';$curr_class_info['type_id'] = '';$attr_arr=array();$attr_custom='';
            $color_id = 1;
            $brands = $this->db->select('brand_id,brand_name,brand_initial')->from('shop_brand')->order_by('brand_initial')->get()->result_array();
            if(!empty(trim($_GET['class_id']))){
                $attr_arr = $this->goods_model->get_class_attr(trim($_GET['class_id']));
            }
            $data = array(
                'state'=>true,
                'msg'=>'',
                'color_id'=>$color_id,
                'sizes'=>$size_arr,
                'type_id'=>$curr_class_info['type_id'],
                'brands'=>!empty($brands) ? $brands : false,
//                'specs'=>!empty($specs) ? $specs : false,
                'attr_arr'=>!empty($attr_arr) ? $attr_arr : false,
                'attr_custom'=>!empty($attr_custom) ? $attr_custom : false,
            );
        }
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
     /* 商品管理——自定义标签分类信息 */

    public function goods_self_taxonomy() {
        $this->common_function->shop_admin_priv("waybill");//权限
        $cate_arr = $this->goods_model->get_gstn_by_parent_id(0);
        $option = $this->goods_model->gstn_array_to_option($cate_arr, 0);
        
        $this->smarty->assign('cate', $cate_arr);
        $this->smarty->assign('cate_js', json_encode($cate_arr));
        $this->smarty->assign('option', json_encode($option));
        $this->smarty->display('goods_self_taxonomy.html');
    }
     /**
     * 新增分类
     */
    public function add_gstn() {
        $this->common_function->shop_admin_priv("waybill");//权限
        $data = $this->input->post();
        $sql = "insert into " . $this->db->dbprefix('shop_goods_self_taxonomy') . " (gstn_parent_id,  gstn_name, gstn_sort) values('{$data['gstn_parent_id']}', '{$data['gstn_name']}', {$data['gstn_sort']}) ";
        $result = $this->db->query($sql);
        if ($result) {
            echo json_encode('添加成功');
            $this->common_function->shop_admin_log($data['gstn_name'], 'add', '分类');
            exit();
        }
    }

    /**
     * 编辑分类
     */
    public function edit_gstn() {
        $this->common_function->shop_admin_priv("waybill");//权限
        $data = $this->input->post();
        $time = time();
        //var_dump($_SESSION);die;
        $sql = "update " . $this->db->dbprefix('shop_goods_self_taxonomy') . " set gstn_parent_id = '{$data['gstn_parent_id']}', gstn_sort = {$data['gstn_sort']}, gstn_name= '{$data['gstn_name']}' where gstn_id = '{$data['gstn_id']}'";
        $result = $this->db->query($sql);
        if ($result) {
            echo json_encode('修改成功');
            $this->common_function->shop_admin_log($data['gstn_name'], 'edit', '分类');
            exit();
        }
    }

    /**
     * 删除分类
     */
    public function del_gstn() {
        $this->common_function->shop_admin_priv("waybill");//权限
        $id = $this->input->post('id');
        $arr = explode(',', $id);
        foreach ($arr as $v) {
            $sql = "delete from {$this->db->dbprefix('shop_goods_self_taxonomy')} where gstn_id = {$v}";
            $result = $this->db->query($sql);
            $this->del_all_children($v);
        }
        echo json_encode('删除成功');
        $this->common_function->shop_admin_log('id=' . $id, 'del', '分类');
        exit();
    }

    /**
     * 删除下级分类
     * @param unknown $p_id      父级ID
     */
    private function del_all_children_gstn($p_id) {
        $this->common_function->shop_admin_priv("waybill");//权限
        $sql = "select gstn_id from {$this->db->dbprefix('shop_goods_self_taxonomy')} where gstn_parent_id = {$p_id}";
        $ids = $this->db->query($sql)->result_array();
        foreach ($ids as $id) {
            $sql = "delete from {$this->db->dbprefix('shop_goods_self_taxonomy')} where gstn_parent_id = {$id['gstn_id']}";
            $result = $this->db->query($sql);
            $this->del_all_children($id['gstn_id']);
        }
    }
    /**
     * 遍历全部子定义分类，并写入<option>标签
     */
    public function get_all_gstn_list($select = 0, $ret = 0) {
        $cate_arr = $this->goods_model->get_gstn_by_parent_id(0);
        $option = $this->goods_model->gstn_array_to_option($cate_arr, 0);
        if ($ret == 0) {
            echo json_encode($option);
        } else {
            return $option;
        }
    }
    public function product_son_gstn() {
        $gstn_id = isset($_POST['gstn_id']) ? trim($_POST['gstn_id']) : false;
        $result = array('state' => false, 'msg' => '', 'data' => '');
        if (!empty($gstn_id)) {
            $data = $this->goods_model->get_son_gstn($gstn_id);
            if (!empty($data)) {
                $result = array('state' => true, 'msg' => '', 'data' => $data);
            }
        }
        echo json_encode($result);
        exit;
    }
    //设置相册封面
    public function set_cover() {
        $aclass_id = isset($_POST['aclass_id']) ? trim($_POST['aclass_id']) : false;
        $apic_id = isset($_POST['delbox'])&&!empty($_POST['delbox']) ? current($_POST['delbox']) : false;
        if($aclass_id && $apic_id){
            $aclass_cover = $this->db->select('apic_cover')->from('shop_album_pic')->where('apic_id',$apic_id)->get()->row('apic_cover');
            $result = $this->db->where('aclass_id',$aclass_id)->update('shop_album_class',array('aclass_cover'=>$aclass_cover));
            if($result){
                $data = array('state'=>true,'msg'=>'设置成功','data'=>$aclass_id);
            }else{
                $data = array('state'=>false,'msg'=>'设置失败');
            }
        }
        echo json_encode($data);
        exit;
    }
    /**
     * 码段列表
     */
    public function code_segment(){
        $this->common_function->shop_admin_priv("waybill");//权限
        $this->smarty->display('code_step.html');
    }
    
    /**
     * 获取码段信息
     */
    public function get_code_list(){
        $this->common_function->shop_admin_priv("waybill");//权限
        $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
        $page = isset($_POST['curpage']) ? intval($_POST['curpage']) : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
        $start = ($page-1)*$rp;
        $this->db->select('cs.cs_id,cs.cs_name,cs.gc_id,gc.gc_name');
        $this->db->from('code_segment as cs') ;
        $this->db->join('shop_goods_class gc','gc.gc_id=cs.gc_id','left');
        if($query && $qtype){
           $this->db->like("{$qtype}",$query);
       }
        $db = clone($this->db);
        $total = $this->db->count_all_results();
        $this->db = $db;
        $this->db->order_by('cs_id');
        $this->db->limit($rp,$start);
        $rows = $this->db->get()->result_array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
            $xml .= "<row id='".$row['cs_id']."'>";
            $xml .= "<cell><![CDATA[<a class='btn red' onclick=fg_delete({$row['cs_id']},'{$row['cs_name']}')>
            <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em>
            <i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
            <ul>
            <li><a onclick='edit(" .json_encode($row). ")'>编辑码段</a></li>
            </ul>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['cs_id']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['cs_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['gc_name']."]]></cell>";
            $xml .= "</row>";
        }
    
        $xml .= "</rows>";
        echo $xml;
    }
    
    /**
     * 新增码段
     */
    public function add_code(){
        $this->common_function->shop_admin_priv("waybill");//权限
        $data = $this->input->post();
        $time = time();
        $add_user_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : '';
        //var_dump($_SESSION);die;
        $sql = "insert into ".$this->db->dbprefix('code_segment')." (cs_name, gc_id) values('{$data['cs_name']}', {$data['gc_id']}) ";
        $result = $this->db->query($sql);
        if($result){
            die(json_encode(['state'=>true,'msg'=>'添加成功']));
        }else{
            die(json_encode(['state'=>true,'msg'=>'添加失败']));
        }
    }
    
    /**
     * 编辑码段
     * @param unknown $code_id
     */
    public function edit_code($code_id){
        $this->common_function->shop_admin_priv("waybill");//权限
        $data = $this->input->post();
        //var_dump($data);die;
        $time = time();
        //var_dump($_SESSION);die;
        $sql = "update ".$this->db->dbprefix('code_segment')." set cs_name= '{$data['cs_name']}', gc_id ={$data['gc_id']}  where cs_id = '$code_id'";
        $result = $this->db->query($sql);
        if($result){
            die(json_encode(['state'=>true,'msg'=>'修改成功']));
        }else{
            die(json_encode(['state'=>false,'msg'=>'修改失败']));
        }
    }
    
    /**
     * 删除码段
     */
    public function del_code(){
        $this->common_function->shop_admin_priv("waybill");//权限
        $id = $this->input->post('id');
        $sql = "delete from {$this->db->dbprefix('code_segment')} where cs_id in({$id})";
        $result = $this->db->query($sql);
        $error = $this->db->error();
        $re = $this->common_function->delete_key($error, $id);
        if($re['state']){
            die(json_encode(['state'=>true,'msg'=>'删除成功']));
        }else{
            die(json_encode(['state'=>false,'msg'=>$re['msg']]));
        }
    }
    
    /**
     * 导出
     * @param unknown 
     */
    public function code_excel(){
        $this->common_function->shop_admin_priv("waybill");//权限
        $ids = isset($_GET['id']) ? $_GET['id'] : '';
        $this->db->select('cs.cs_name,gc.gc_name');
        $this->db->from('code_segment as cs') ;
        $this->db->join('shop_goods_class gc','gc.gc_id=cs.gc_id','left');
        if (empty($ids)){
           $this->db->where_in("cs_id",$ids);
        }
        $this->db->order_by('cs_id');
        $rows = $this->db->get()->result_array();
        //print_r($rows);die;
        $time = time();
        $date = date ( 'YmdHis',$time );
        $filename = $date.'码段列表';
        $filenames = $date.'code_segment'.'.csv';
        $file = ROOTPATH.'data/excel_download/'.$filenames;
        $title = array(chr(0xef).chr(0xbb).chr(0xbf).'名称','关联分类');
        file_put_contents ($file,implode(',', $title).PHP_EOL,FILE_APPEND);
        for($i=0;$i<count($rows);$i++){
            file_put_contents ($file,implode(',',$rows[$i]).PHP_EOL,FILE_APPEND);
        }
        $download = 'http://' . $_SERVER ['HTTP_HOST'].str_replace ( $_SERVER ['DOCUMENT_ROOT'], '', str_replace('','',str_replace ( '\\', '/', ROOTPATH ))).'data/excel_download/'.$filenames;
        header("location:".$download);
        exit;
        $objPHPExcel=new PHPExcel();
        $objPHPExcel->getProperties()->setCreator('erp')
        ->setLastModifiedBy('erp')
        ->setTitle('Office 2007 XLSX Document')
        ->setSubject('Office 2007 XLSX Document')
        ->setDescription('Document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Result file');
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1','名称')
        ->setCellValue('B1','是否启用(空为启用，1为禁用)')
        ->setCellValue('C1','排序');
    
        $i=2;
        foreach($rows as $k=>$row){
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i,$row['code_name'])
            ->setCellValue('B'.$i,$row['status'] = ($row['status']==1)?'':'1')
            ->setCellValue('C'.$i,$row['sort']);
            unset($rows[$k]);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('code_segment');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename=urlencode('码段列表').'_'.date('YmdHis');
    
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        //print_r($objWriter);die;
        $objWriter->save('php://output');
        exit;
    
    }


















    /**
     * excel导入模版下载
     */
    public function code_excel_tp(){
        force_download(ROOTPATH.'data/excel_tp/code.xlsx', NULL);
    }
    
    /**
     * 导入EXCEL
     * 1，读取文件
     * 2，数据处理
     * 		|处理excel中的数据
     * @return 有错误文件下载错误EXCEL文件
     */
    public function code_up_excel() {
        $this->common_function->shop_admin_priv("waybill");//权限
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
        for($i = 2; $i <= $rows; $i ++) {
            $flag = false;
            $cs_name = '';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            $error_msg = '';
            // 名称<必填>
            $excel ['cs_name'] = $objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ();
            if (empty( $excel ['cs_name'] )) {
                $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );
                $flag = true;
                $error_msg = !!$error_msg ? $error_msg."、名称为必填" : $error_msg.'名称为必填';
            }
            // 状态
            $cs_name= $objPHPExcel->getActiveSheet ()->getCell ( "B{$i}" )->getValue ();
            if (empty( $cs_name )) {
                $this->common_function->wrong_cell ( $objPHPExcel, "B{$i}" );
                $flag = true;
                $error_msg = !!$error_msg ? $error_msg."、关联分类为必填" : $error_msg.'关联分类为必填';
            }else{
                $excel ['gc_id'] = $this->db->select('gc_id')->from('shop_goods_class')->where('gc_name',$cs_name)->get()->row('gc_id');
                if (empty($excel['gc_id'])) {
                    $this->common_function->wrong_cell ( $objPHPExcel, "B{$i}" );
                    $flag = true;
                    $error_msg = !!$error_msg ? $error_msg."、此分类不存在" : $error_msg.'此分类不存在';
                }
            }
            if (! $flag) {
                // 
                $tmp = $this->db->where('cs_name',$excel['cs_name'])->count_all_results('code_segment');
    
                if ($tmp != 0) { // 重复数据
                    $edit_num++;
                    $this->db->where('cs_name',$excel['cs_name'])->update('code_segment',['gc_id'=>$excel ['gc_id']]);
                    echo "<script language='javascript'>" .
                        '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-refresh c-orange'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']码段:'.$excel['code_name']."已存在<span class='pos-a right t-10'>修改</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                    unset($excel);
                    $delete_row [] = $i; // 记录插入成功的当前行
                } else { // 不存在，保存数据
                    //var_dump($excel);die;
                    /*
                     * 最坏的实现方法
                     * 每一条数据单独插入；好处，记录未插入失败的单条记录
                     * 稍好的实现方法
                     * 只用一条insert语句；坏处，一条记录一合格全部都不合格
                     */
//                    $time = time();
//                    $add_user_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : '';
                    //var_dump($_SESSION);die;
                    $sql = "insert into ".$this->db->dbprefix('code_segment')." (cs_name, gc_id) values('{$excel['cs_name']}', {$excel['gc_id']}) ";
                    $result = $this->db->query($sql);
                    $add_num++;
                    echo "<script language='javascript'>" .
                        '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']新增码段：'.$excel ['cs_name']."<span class='pos-a right t-10'>成功</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                    unset($excel);
                    $delete_row [] = $i; // 记录插入成功的当前行
                }
            } else { // 有错误的EXCEL行
                $is_download = true;
                $objPHPExcel->getActiveSheet()->setCellValue("C{$i}",$error_msg);
                $this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );
                $error_num++;
                echo "<script language='javascript'>" .
                    '$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']操作失败'."<span class='pos-a right t-10'>失败</span></p>\");".
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                unset($excel);
            }
            ob_end_flush();
            ob_flush();
            flush();
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
            $objPHPExcel->getActiveSheet()->setCellValue("C1",'错误信息');
            $this->common_function->wrong_cell ( $objPHPExcel, "C1" );
            $filenames = 'code_import_error' . date ( 'YmdHis' );
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
                '$("#game_over").append("'."<p>导入".($rows-1)."条，新增{$add_num}条，修改{$edit_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($rows-1)."条，新增{$add_num}条，修改{$edit_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
//        $this->common_function->admin_log('' ,'import', '码段');
        // 无错误
        exit();
        
    }
    
    //检查尺码是否已存在
    public function check_size(){
        $this->common_function->shop_admin_priv("waybill");//权限
        $now_size = isset($_POST['now_size'])?trim($_POST['now_size']):'';
        $size = isset($_POST['size'])?trim($_POST['size']):'';
        $flag = isset($_POST['flag_'])?trim($_POST['flag_']):1;
        if($now_size == $size){
            echo json_encode(true);
            exit;
        }
        $sql = "select count(*) as num from {$this->db->dbprefix('code_segment_size')} where size = '{$size}'  and flag = '{$flag}'";

        if ($this->db->query($sql)->row('num') == 0){
            echo json_encode(true);
            exit;
        }else{
            echo json_encode(false);
            exit;
        }
    }

    /**
     * 新增尺码
     */
    public function code_segment_size(){
        $this->common_function->shop_admin_priv("waybill");//权限
        /* $sql = "select cs_id,cs_name,gc_id from {$this->db->dbprefix('code_segment')}";
        $rows = $this->db->query($sql)->result_array();
        $rowinfo ="";
        if($rows){
            foreach ($rows as $key=>$val){
               $rowinfo .=" <option value=".$val['cs_id'].">".$val['cs_name']."</option>";
            }
        }
        $this->smarty->assign('rows', $rows);
        $this->smarty->assign('rowinfo', $rowinfo); */
        $this->smarty->display('size_manage.html');
    }
    
    public function get_size_list(){
        $this->common_function->shop_admin_priv("waybill");//权限
        $cs_id = isset($_GET['cs_id']) ? $_GET['cs_id'] : false;	//搜索查询的条件11
        $size = isset($_GET['size']) ? $_GET['size'] : false;	
        $flag = isset($_GET['flag']) ? $_GET['flag'] : false;	
        $page = isset($_POST['curpage']) ? intval($_POST['curpage']) : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
        $where = '1=1';
        if($cs_id && !empty($cs_id)){
            //$where .= " AND t.cs_id = '{$cs_id}' ";
        }
        if($size !== false && !(empty($size) && $size != 0)){
            $where .= " AND t.size like '%{$size}%' ";
        }
        if($flag !== false && !empty($flag)){
            $where .= " AND t.flag = '{$flag}' ";
        }
        $sql = "select count(1) as num from {$this->db->dbprefix('code_segment_size')} t "
        /* . "left join {$this->db->dbprefix('code_segment')} b "
        . "on t.cs_id = b.cs_id "
        . "left join {$this->db->dbprefix('shop_goods_class')} gc "
        . "on gc.gc_id = b.gc_id " */
        . "where {$where}";
        $total = $this->db->query($sql)->row('num');
        if(!empty($sortname) && !empty($sortorder))
        {
            $where .= " order by t.{$sortname} {$sortorder}";
        }else{
            $where .= " order by t.flag,t.size";
        }
        $start = ($page-1)*$rp;
        $where .= " limit $start, $rp";
        $sql = "select  t.size,t.flag,t.sort from {$this->db->dbprefix('code_segment_size')} t "
        /* . "left join {$this->db->dbprefix('code_segment')} b "
        . "on t.cs_id = b.cs_id "
        . "left join {$this->db->dbprefix('shop_goods_class')} gc "
        . "on gc.gc_id = b.gc_id " */
        . "where {$where}";
        $rows = $this->db->query($sql)->result_array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        $flag_arr = array('1'=>'中国码','2'=>'美国码','3'=>'英国码','4'=>'日本码');
        foreach($rows AS $row){
            $flag = array_key_exists($row['flag'], $flag_arr)!==false ? $flag_arr[$row['flag']] : '未知';
            $del_arr = array('size'=>$row['size'],'flag'=>$row['flag']);
            $xml .= "<row id='".json_encode($del_arr)."'>";
            $xml .= "<cell><![CDATA[
                <a class='btn red' onclick=fg_delete(".json_encode($del_arr).")><i class='fa fa-trash-o'></i>删除</a>
                <a class='btn blu' onclick=edit(".json_encode($row).")><i class='fa fa-trash-o'></i>编辑</a>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['size']."]]></cell>";
            $xml .= "<cell><![CDATA[".$flag."]]></cell>";
            /* $xml .= "<cell><![CDATA[".$row['cs_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['gc_name']."]]></cell>"; */
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }
    
    public function add_size(){
        $this->common_function->shop_admin_priv("waybill");//权限
        $data = $this->input->post();
        //var_dump($data);die;
        $time = time();
//        $add_user_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : '';
        //var_dump($_SESSION);die;
        $data['size'] = strtoupper($data['size']);
        if(!preg_match("/^[a-zA\d\.]*$/i",$data['size'])){
            die(json_encode(['state'=>true,'msg'=>'尺码格式不合法']));
        }
        $sql = "insert into ".$this->db->dbprefix('code_segment_size')." (size, flag, sort) values('{$data['size']}', {$data['flag']}, {$data['size_sort']}) ";
        $result = $this->db->query($sql);
        if($result){
//            $this->common_function->admin_log($data['size'] ,'add', '尺码');
            die(json_encode(['state'=>true,'msg'=>'添加成功']));
        }else{
            die(json_encode(['state'=>true,'msg'=>'添加失败']));
        }
    }
    
    public function edit_size($size,$flag,$size_sort){
        $this->common_function->shop_admin_priv("waybill");//权限
        $data = $this->input->post();
        $data['size'] = strtoupper($data['size']);
        if(!preg_match("/^[a-zA\d\.]*$/i",$data['size'])){
            die(json_encode(['state'=>true,'msg'=>'尺码格式不合法']));
        }
        $sql = "update ".$this->db->dbprefix('code_segment_size')." set size = '{$data['size']}', flag= '{$data['flag']}', sort = '{$data['size_sort']}' where size = '{$size}'  and flag = '{$flag}'";
        $result = $this->db->query($sql);
        if($result){
            die(json_encode(['state'=>true,'msg'=>'修改成功']));
        }else{
            die(json_encode(['state'=>true,'msg'=>'修改失败']));
        }
    }
    
    public function del_size(){
        $this->common_function->shop_admin_priv("waybill");//权限
        
        $id = $this->input->post('id');
        $id_arr = explode('},', $id);
//        var_Dump((array)json_decode($id['0']."}"));exit;
        $where = '';
        foreach($id_arr as $k=>$v){
            if($k!= count($id_arr)-1){
                $v = (array)json_decode($v."}");
            }else{
                $v = (array)json_decode($v);
            }
            $where .= "(size='{$v['size']}'  and flag={$v['flag']}) or ";
            
        }
        $where = rtrim($where,'or ');
        $sql = "delete from {$this->db->dbprefix('code_segment_size')} where {$where}";
        $result = $this->db->query($sql);
//        var_dump($this->db->last_query());exit;
        //$error = $this->db->error();
        //$re = $this->common_function->delete_key($error, $express_code);
        if($result){
//            $this->common_function->admin_log('id='.$id ,'del', '尺码');
            die(json_encode(['state'=>true,'msg'=>'删除成功']));
        }else{
            die(json_encode(['state'=>false,'msg'=>'删除失败']));
        }
    }
    
    
    public function size_excel(){
        $this->common_function->shop_admin_priv("waybill");//权限
        $ids = isset($_GET['id']) ? $_GET['id'] : '';
        if (empty($ids)){
            $cs_id = isset($_GET['cs_id']) ? $_GET['cs_id'] : false;	//搜索查询的条件11
            $size = isset($_GET['size']) ? $_GET['size'] : false;	//搜索查询的类别admin

            $where = '1=1';
            if($cs_id && !empty($cs_id)){
                $where .= " AND t.cs_id = '{$cs_id}' ";
            }
            if($size !== false && !(empty($size) && $size != 0)){
                $where .= " AND t.size like '%{$size}%' ";
            }
        }else{
            $id = $this->input->get('id');
            $id_arr = explode('},', $id);
    //        var_Dump((array)json_decode($id['0']."}"));exit;
            $where = '';
            foreach($id_arr as $k=>$v){
                if($k!= count($id_arr)-1){
                    $v = (array)json_decode($v."}");
                }else{
                    $v = (array)json_decode($v);
                }
                
                $where .= "(t.size='{$v['size']}'  and t.flag={$v['flag']}) or ";

            }
            $where = rtrim($where,'or ');
        }
        $sql = "select  t.size,t.flag from {$this->db->dbprefix('code_segment_size')} t "
            . "where {$where}";
        $rows = $this->db->query($sql)->result_array();
        //print_r($rows);die;
        $time = time();
        $date = date ( 'YmdHis',$time );
        $filename = $date.'尺码列表';
        $filenames = $date.'size'.'.csv';
        $file = ROOTPATH.'data/excel_download/'.$filenames;
        $title = array(chr(0xef).chr(0xbb).chr(0xbf).'尺码','类型');
        file_put_contents ($file,implode(',', $title).PHP_EOL,FILE_APPEND);
        $flag_arr = array('1'=>'中国码','2'=>'美国码','3'=>'英国码','4'=>'日本码');
        for($i=0;$i<count($rows);$i++){
            $data = array(
                $rows[$i]['size'],
                array_key_exists($rows[$i]['flag'], $flag_arr)!==false ? $flag_arr[$rows[$i]['flag']] : '未知',
            );
            file_put_contents ($file,implode(',',$data).PHP_EOL,FILE_APPEND);
        }
        $download = 'http://' . $_SERVER ['HTTP_HOST'].str_replace ( $_SERVER ['DOCUMENT_ROOT'], '', str_replace('','',str_replace ( '\\', '/', ROOTPATH ))).'data/excel_download/'.$filenames;
//        $this->common_function->insert_download($filename,$download,$time,$type=1);
        header("location:".$download);
        exit;
        $objPHPExcel=new PHPExcel();
        $objPHPExcel->getProperties()->setCreator('erp')
        ->setLastModifiedBy('erp')
        ->setTitle('Office 2007 XLSX Document')
        ->setSubject('Office 2007 XLSX Document')
        ->setDescription('Document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Result file');
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1','品牌编码')
        ->setCellValue('B1','码段')
        ->setCellValue('C1','尺码')
        ->setCellValue('D1','是否启用')
        ->setCellValue('E1','排序');
    
        $i=2;
        foreach($rows as $k=>$row){
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i,$row['brand_code'])
            ->setCellValue('B'.$i,$row['code_segment_name'])
            ->setCellValue('C'.$i,$row['size'])
            ->setCellValue('D'.$i,$row['status'] = ($row['status']==1)?'':'1')
            ->setCellValue('E'.$i,$row['sort']);
            unset($rows[$k]);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('tags');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename=urlencode('尺码列表').'_'.date('YmdHis');
    
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        //print_r($objWriter);die;
        $objWriter->save('php://output');
        exit;
    
    }
    
    /**
     * excel导入模版下载
     */
    public function size_excel_tp(){
        $this->load->helper('download');
        force_download(ROOTPATH.'data/excel_tp/size.xlsx', NULL);
    }
    
    /**
     * 导入EXCEL
     * 1，读取文件
     * 2，数据处理
     * 		|处理excel中的数据
     * @return 有错误文件下载错误EXCEL文件
     */
    public function size_up_excel() {
        $this->common_function->shop_admin_priv("waybill");//权限
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
        $flag_arr = array('1'=>'中国码','2'=>'美国码','3'=>'英国码','4'=>'日本码');
        for($i = 2; $i <= $rows; $i ++) {
            $flag = false;
            $code_segment_name = '';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            $error_msg = '';
//             // 码段<必填>
//             $code_segment_name = trim($objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ());
//             if (empty( $code_segment_name )) {
//                 $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );
//                 $flag = true;
//                 $error_msg = !!$error_msg ? $error_msg."、码段为必填" : $error_msg.'码段为必填';
//             }else {
//                 $sql = "select cs_id from {$this->db->dbprefix('code_segment')} where cs_name = '{$code_segment_name}'";
//                 $excel ['cs_id'] = $this->db->query($sql)->row('cs_id');
//                 if (empty($excel ['cs_id'])){
//                     $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );
//                     $flag = true;
//                     $error_msg = !!$error_msg ? $error_msg."、码段不存在" : $error_msg.'码段不存在';
//                 }
//             }
            // 尺码
            $excel ['size'] = trim($objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ());
            
            if  ( $excel ['size']=='') {
                $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );
                $flag = true;
                $error_msg = !!$error_msg ? $error_msg."、尺码为必填" : $error_msg.'尺码为必填';
            }
            $excel ['size'] = strtoupper($excel ['size']);
            if(!preg_match("/^[a-zA\d\.]*$/i",$excel ['size'])){
                $this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );
                $flag = true;
                $error_msg = !!$error_msg ? $error_msg."、尺码格式不合法" : $error_msg.'尺码格式不合法';
            }
            
            
            // 尺码类型
            $flags = trim($objPHPExcel->getActiveSheet ()->getCell ( "B{$i}" )->getValue ());
            if (empty( $flags )) {
                $excel ['flag'] = 1;
//                $this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );
//                $flag = true;
//                $error_msg = !!$error_msg ? $error_msg."、码段为必填" : $error_msg.'码段为必填';
            }else{
                $excel ['flag'] = ($flags<=4)?$flags:1;
            }
             
            if (! $flag) {
                // 检查是否在在
                $tmp = $this->db->where('size',$excel['size'])->where('flag',$excel['flag'])->count_all_results('code_segment_size');
    
                if ($tmp != 0) { // 重复数据
                    $edit_num++;
                    //$this->db->where('code_segment_name',$excel['code_segment_name'])->where('size',$excel['size'])->where('brand_code',$excel['brand_code'])->update('tags',['status'=>$excel ['status'],'sort'=>$excel ['sort']]);
                    echo "<script language='javascript'>" .
                        '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-refresh c-orange'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'."同类型下的尺码：{$excel ['size']}已存在<span class='pos-a right t-10'>不添加</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                    unset($excel);
                    $delete_row [] = $i; // 记录插入成功的当前行
                } else { // 不存在，保存数据
                    //var_dump($excel);die;
                    /*
                     * 最坏的实现方法
                     * 每一条数据单独插入；好处，记录未插入失败的单条记录
                     * 稍好的实现方法
                     * 只用一条insert语句；坏处，一条记录一合格全部都不合格
                     */
                    $time = time();
//                    $add_user_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : '';
                    //var_dump($_SESSION);die;
                    $sql = "insert into ".$this->db->dbprefix('code_segment_size')." (size, flag) values('{$excel['size']}',  {$excel['flag']}) ";
                    $result = $this->db->query($sql);
                    $add_num++;
                    echo "<script language='javascript'>" .
                        '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.'新增尺码'.$excel['size']."<span class='pos-a right t-10'>成功</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                    unset($excel);
                    $delete_row [] = $i; // 记录插入成功的当前行
                }
            } else { // 有错误的EXCEL行
                $is_download = true;
                $objPHPExcel->getActiveSheet()->setCellValue("C{$i}",$error_msg);
                $this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );
                $error_num++;
                echo "<script language='javascript'>" .
                    '$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']操作失败'."<span class='pos-a right t-10'>失败</span></p>\");".
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                unset($excel);
            }
            ob_end_flush();
            ob_flush();
            flush();
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
            $objPHPExcel->getActiveSheet()->setCellValue("C1",'错误信息');
            $this->common_function->wrong_cell ( $objPHPExcel, "C1" );
            $filenames = 'size_import_error' . date ( 'YmdHis' );
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
                '$("#game_over").append("'."<p>导入".($rows-1)."条，新增{$add_num}条，修改{$edit_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($rows-1)."条，新增{$add_num}条，修改{$edit_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
//        $this->common_function->admin_log('' ,'import', '尺码');
        // 无错误
        exit();
    }
    
    public function size_control(){
        $this->common_function->shop_admin_priv("waybill");//权限
        $sql = "select * from {$this->db->dbprefix('brands')}";
        $brands = $this->db->query($sql)->result_array();
        
        $sql = "select * from {$this->db->dbprefix('code_segment')}";
        $codes = $this->db->query($sql)->result_array();
        
        $this->smarty->assign('brands', $brands);
        $this->smarty->assign('codes', $codes);
        $this->smarty->display('size_control.html');
    }
    public function ajax_get_brand_size(){
        $brand_id = isset($_GET['brand_id'])?$_GET['brand_id']:'';
        $re = array('state'=>false,'msg'=>'','size'=>'');
        if($brand_id){
            $brand_size = $this->db->select('s.size,s.flag')->from('code_segment_size s')
            ->join('shop_brand b','b.brand_size_type=s.flag')->where('b.brand_id',$brand_id)->get()->result_array();
            if(!empty($brand_size)){
                $sizes = array();
                $flag_arr = array('1'=>'中国码','2'=>'美国码','3'=>'英国码','4'=>'日本码');
                foreach($brand_size as $k=>$v){
                    $sizes[$v['flag']]['size_list'][] = $v;
                }
                
                $re = array('state'=>true,'msg'=>'','sizes'=>$sizes);
            }
        }
        echo json_encode($re);die;
    }
    public function goods_import(){
        $this->common_function->shop_admin_priv("depot_management");//权限

        include VIEWPATH.'file_handle.html';
        $condition = $this->input->get();
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
        $all_num = $rows = count($totalinfo); // 取得总行数
          if($all_num>2000){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>导入商品,一次最多导入2000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }  
        
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
        $user_id = $_SESSION['shop_admin_id'];
        $user_name = $_SESSION['shop_admin_name'];
        $user_type = 1;
        $time = time();$error_col = 'M';
        $season = $this->common_function->get_season();
         $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;
            $counterror = count($error);
            $flag = false;$excel = array();
            $false_msg ='';
            $false_msgs = '';
            $percent = intval(($now_run/$all_num)*100);
            $now_run++;
            ob_clean();
            ob_start();
            // 商品名称<必填>
            $excel['goods_name'] = str_replace("'",'‘',trim($this->common_function->gstr($val[0])));
            if (empty( $excel['goods_name'] )) {
                $false_msgs = @mb_convert_encoding("商品名称必填", "GBK", "UTF-8");
                $false_msg .= "商品名称必填";
                $flag = true;
            }
            // 品牌<必填>
            $excel['brand_name'] = trim($this->common_function->gstr($val[1]));
            if (empty( $excel['brand_name'] )) {
                if(empty($false_msgs)){
                $false_msgs = @mb_convert_encoding("品牌必填", "GBK", "UTF-8");
                }
                $false_msg .= "品牌必填";
                $flag = true;
            }else{
                $excel['brand_id'] = $this->db->select('brand_id')->where('brand_name',$excel['brand_name'])->get('shop_brand')->row('brand_id');
                if(empty($excel['brand_id'])){
                    if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("此品牌不存在，请检查是否填写正确", "GBK", "UTF-8");
                    }
                    $false_msg .= "此品牌不存在，请检查是否填写正确";
                    $flag = true;
                }
            }
            // 款号<必填>
            $excel['goods_spu'] = strtoupper(trim($this->common_function->gstr($val[2])));
            if (empty( $excel['goods_spu'] )) {
                if(empty($false_msgs)){
                $false_msgs = @mb_convert_encoding("款号必填", "GBK", "UTF-8");
                }
                $false_msg .= "款号必填";
                $flag = true;
            }
            // 货号
            $excel['stocks_sku'] = strtoupper(trim($this->common_function->gstr($val[3])));
            // 分类<必填>
            $excel['gc_name'] = trim($this->common_function->gstr($val[4]));
            if (empty( $excel['gc_name'] )) {
                if(empty($false_msgs)){
                $false_msgs = @mb_convert_encoding("分类必填", "GBK", "UTF-8");
                }
                $false_msg .= "分类必填";
                $flag = true;
            }else{
                $excel['gc_id'] = $this->db->select('gc_id')->from('shop_goods_class')->where('gc_name',$excel['gc_name'])->get()->row('gc_id');
                if($excel['gc_id']<1){
                    if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("该分类不存在，请检查是否填写正确", "GBK", "UTF-8");
                    }
                    $false_msg .= "该分类不存在，请检查是否填写正确";
                    $flag = true;
                }
/*                 else{
                    $check_son_gc = $this->db->select('count(gc_id) as num')
                    ->from('shop_goods_class')
                    ->where('gc_parent_id',$excel['gc_id'])->get()->row('num');
                    if($check_son_gc>=1){
                        if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("该分类下还有子分类，请正确填写", "GBK", "UTF-8");
                        }
                        $false_msg .= "该分类下还有子分类，请正确填写";
                        $flag = true;
                    }
                } */
            
            }
            // 颜色（主色）<必填>
            $excel['color'] = trim($this->common_function->gstr($val[5]));
            if (empty( $excel['color'] )) {
                if(empty($false_msgs)){
                $false_msgs = @mb_convert_encoding("主色必填", "GBK", "UTF-8");
                }
                $false_msg .= "主色必填";
                $flag = true;
            }else{
            	$check_color = $this->db->select('cl_id,cl_value')->where('cl_parent_id',0)->where('cl_name',$excel['color'])->get('shop_color')->row_array();
            	if(empty($check_color)){
            	    if(empty($false_msgs)){
            		$false_msgs = @mb_convert_encoding("主色不存在", "GBK", "UTF-8");
            	    }
            		$false_msg .= "主色不存在";
            		$flag = true;
            	}else{
            		$excel['color_value'] = isset($check_color['cl_value'])?$check_color['cl_value']:'';
            	}
                
            }
            //颜色<必填>
            $excel['color_remark'] = trim($this->common_function->gstr($val[6]));
            if (empty( $excel['color_remark'] )) {
                if(empty($false_msgs)){
                $false_msgs = @mb_convert_encoding("颜色必填", "GBK", "UTF-8");
                }
                $false_msg .= "颜色必填";
                $flag = true;
            }elseif(!empty($excel['cl_id'])){
                $excel['color_value'] = $this->db->select('cl_value')->where('cl_parent_id',$excel['cl_id'])->like('cl_name',$excel['color_remark'])->get('shop_color')->row('cl_value');
            }
            if(!empty($excel['stocks_sku'])&&!$flag){
                $check_sku = $this->db->select('ea.color,ea.color_remark')->from('shop_goods_extend_attr ea')
                ->join('shop_goods_extend e','e.goods_a_id=ea.goods_a_id')
                ->join('shop_goods g','g.goods_id=e.goods_id')
                ->where('ea.stocks_sku',$excel['stocks_sku'])
                ->where('g.brand_id',$excel['brand_id'])->where('g.goods_pos',0)->where('g.goods_state!=0')->get()->row_array();
                if(!empty($check_sku)){
                    if($check_sku['color']!=$excel['color']||$check_sku['color_remark']!=$excel['color_remark']){
                        if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("此货号已被同品牌下的其他商品占用，请确认是否填写正确", "GBK", "UTF-8");
                        }
                        $false_msg .= "此货号已被同品牌下的其他商品占用，请确认是否填写正确";
                        $flag = true;
                    } 
                }
            }
            //销售价<必填>
            $excel['goods_price'] = floatval(trim($this->common_function->gstr($val[7])));
            if($excel['goods_price']==''){
                if(empty($false_msgs)){
                $false_msgs = @mb_convert_encoding("销售价必填", "GBK", "UTF-8");
                }
                $false_msg .= "销售价必填";
                $flag = true;
            }    
            //吊牌价<必填>
            $excel['goods_marketprice'] = floatval(trim($this->common_function->gstr($val[8])));
            if ($excel['goods_marketprice']=='') {
                if(empty($false_msgs)){
                $false_msgs = @mb_convert_encoding("吊牌价必填", "GBK", "UTF-8");
                }
                $false_msg .= "吊牌价必填";
                $flag = true;
            }    
            //上市时间<必填>
            $time_to_market = $this->common_function->gstr($val[9]);
            //$excel['time_to_market'] = trim($excel['time_to_market']);
            if (empty($time_to_market)) {
                if(empty($false_msgs)){
                $false_msgs = @mb_convert_encoding("上市时间必填", "GBK", "UTF-8");
                }
                $false_msg .= "上市时间必填";
                $flag = true;
            }else{
                if(stripos($time_to_market,"/")!==false){
                    $time_to_markets = $time_to_market;
                    $time_to_market = explode("/",$time_to_market);
                    if(!empty($time_to_market[0]) && !empty($time_to_market[1]) && !empty($time_to_market[2])){
                            if($time_to_market[0] > date('Y')){
                                if(empty($false_msgs)){
                                    $false_msgs = @mb_convert_encoding("上市时间年份设置错误", "GBK", "UTF-8");
                                }
                                $false_msg .= "上市时间年份设置错误";
                                $flag = true;
                            }
                            
                            $time_to_markets = strtotime($time_to_markets); //获得秒数
                            if(date('Y',$time_to_markets) == $time_to_market[0]){
                                $excel['year_to_market'] = date('Y',$time_to_markets); //获得年
                                $month = date('m',$time_to_markets); //获得月
                                $excel['season_to_market'] = $season[$month]; //获得季节
                            }else{
                                if(empty($false_msgs)){
                                    $false_msgs = @mb_convert_encoding("上市时间年份填写错误", "GBK", "UTF-8");
                                }
                                $false_msg .= "上市时间年份填写错误";
                                $flag = true;
                            }
                           
                    }else{
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("上市时间填写不完整", "GBK", "UTF-8");
                        }
                        $false_msg .= "上市时间填写不完整";
                        $flag = true;
                    }
                    
                }else{
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("上市时间格式错误", "GBK", "UTF-8");
                    }
                    $false_msg .= "上市时间格式错误";
                    $flag = true;
                }
                //print_r($excel);die;  
            }
            //性别
            $excel['sex'] = trim($this->common_function->gstr($val[10]));  
            if($excel['sex']=='男'){
                $excel['sex'] = 2;
            }elseif($excel['sex']=='女'){
                $excel['sex'] = 1;
            }else{
                $excel['sex'] = 0;
            }
            //系列
            $excel['series'] = trim($this->common_function->gstr($val[11]));   
            if(!$flag){
            	$state_check = true;
                //检查商品
                $goods_info = $this->db->select('g.goods_name,e.goods_id,e.goods_a_id,g.year_to_market,g.season_to_market')->from('shop_goods_extend e')
                ->join('shop_goods g','g.goods_id=e.goods_id')->where('g.goods_spu',$excel['goods_spu'])
                ->where('g.brand_id',$excel['brand_id'])->where('g.goods_pos',0)->where('g.goods_state !=0')
                ->where('e.color',$excel['color'])->where('e.color_remark',$excel['color_remark'])->get()->row_array();
                $discount = $excel['goods_price']/$excel['goods_marketprice'];
                $all_gc_id = $this->common_function->get_parent_class($excel['gc_id']);
                $all_gc_id = array_reverse($all_gc_id);
                //print_r($goods_info);
                if(empty($goods_info)){
                    $goods_info = $this->db->select('goods_name,goods_id,year_to_market,season_to_market')->from('shop_goods')
                    ->where('goods_spu',$excel['goods_spu'])
                    ->where('brand_id',$excel['brand_id'])->where('goods_pos',0)->where('goods_state !=0')
                    ->get()->row_array();
                    if(empty($goods_info)){
                        $goods_in = array(
                            'goods_name'=>$excel['goods_name'],'gc_id'=>$excel['gc_id'],'gc_id1'=>isset($all_gc_id[0])?$all_gc_id[0]:'',
                            'gc_id2'=>isset($all_gc_id[1])?$all_gc_id[1]:'','gc_id3'=>isset($all_gc_id[2])?$all_gc_id[2]:'','gc_name'=>$excel['gc_name'],
                            'brand_id'=>$excel['brand_id'],'brand_name'=>$excel['brand_name'],'goods_price'=>$excel['goods_price'],
                            'goods_marketprice'=>$excel['goods_marketprice'],'discount'=>$discount,'goods_spu'=>$excel['goods_spu'],
                            'goods_addtime'=>$time,'goods_edittime'=>$time,'year_to_market'=>$excel['year_to_market'],
                            'season_to_market'=>$excel['season_to_market'],'sex'=>$excel['sex'],'goods_pos'=>0,'goods_state'=>1
                        );
                        $this->db->insert('shop_goods',$goods_in);
                        $goods_id = $this->db->insert_id();
                    }else{
                        $goods_up = array(
                            'goods_edittime'=>$time,
                        );
                        if(empty($goods_info['goods_name'])){
                            $goods_up['goods_name'] = $excel['goods_name'];
                        }
                        if(empty($goods_info['year_to_market'])){
                            $goods_up['year_to_market'] = $excel['year_to_market'];
                        }
                        if(empty($goods_info['season_to_market'])){
                            $goods_up['season_to_market'] = $excel['season_to_market'];
                        }
                        $this->db->update('shop_goods',$goods_up,array('goods_id'=>$goods_info['goods_id']));
                        $goods_id = $goods_info['goods_id'];
                    }
                    $goods_e_in = array(
                        'goods_id'=>$goods_id,'color'=>$excel['color'],
                        'color_value'=>$excel['color_value'],'color_remark'=>$excel['color_remark'],
                    );
                    $this->db->insert('shop_goods_extend',$goods_e_in);
                    $goods_a_id = $this->db->insert_id();
                    $goods_ea_in = array(
                        'goods_id'=>$goods_id,'color'=>$excel['color'],'goods_a_id'=>$goods_a_id,
                        'color_value'=>$excel['color_value'],'color_remark'=>$excel['color_remark'],
                        'stocks_price'=>$excel['goods_price'],'stocks_marketprice'=>$excel['goods_marketprice'],
                        'stocks_sku'=>$excel['stocks_sku'],
                    );
                    $this->db->insert('shop_goods_extend_attr',$goods_ea_in);
                    
                    
                }else{
                      $goods_up = array(
                            'goods_edittime'=>$time,
                      );
                      if(empty($goods_info['goods_name'])){
                          $goods_up['goods_name'] = $excel['goods_name'];
                      }
                     if(empty($goods_info['year_to_market'])){
                         $goods_up['year_to_market'] = $excel['year_to_market'];
                     }
                     if(empty($goods_info['season_to_market'])){
                         $goods_up['season_to_market'] = $excel['season_to_market'];
                     }
                    $this->db->update('shop_goods',$goods_up,array('goods_id'=>$goods_info['goods_id']));
                    $goods_id = $goods_info['goods_id'];
                    $goods_a_id = $goods_info['goods_a_id'];
                    /*$goods_e_up = array(
                        'goods_id'=>$goods_id,'color'=>$excel['color'],
                        'color_value'=>$excel['color_value'],'color_remark'=>$excel['color_remark'],
                    );*/
                    //$this->db->update('shop_goods_extend',$goods_e_up,array('goods_a_id'=>$goods_a_id));
                    
                    $check_sku_code = $this->db->select('goods_ea_id')->from('shop_goods_extend_attr')->where('goods_a_id',$goods_a_id)
                    ->where(" (stocks_sku is null or stocks_sku='')")->get()->result_array();
                    //print_r($goods_a_id);print_r($check_sku_code);
                    if(!empty($check_sku_code)){
                        $sql_up_ea = array();
                        foreach ($check_sku_code as $ks=>$vs){
                            $sql_up_ea[] = array(
                                'goods_ea_id'=>$vs['goods_ea_id'],
                                'stocks_sku'=>$excel['stocks_sku'],
                            );
                            if(!empty($excel['stocks_sku'])){
                                $sql_amount = array('stocks_sn'=>$excel['stocks_sku']);
                                $this->db->where('goods_ea_id',$vs['goods_ea_id'])->update('store_stocks_amount',$sql_amount);
                            }
                        }
                        if(!empty($sql_up_ea)){
                            $this->db->update_batch('shop_goods_extend_attr',$sql_up_ea,'goods_ea_id');
                            
                        }
                    }else{
                        $check_sku_code = $this->db->select('goods_ea_id,stocks_sku')->from('shop_goods_extend_attr')->where('goods_a_id',$goods_a_id)
                        ->get()->result_array();
                        //print_r($check_sku_code);
                        if(!empty($check_sku_code)){
                            $sql_up_ea = array();
                            foreach ($check_sku_code as $ks=>$vs){
                                if($vs['stocks_sku']==$excel['stocks_sku']){
                                    /* $sql_up_ea[] = array(
                                        'goods_ea_id'=>$vs['goods_ea_id'],'stocks_price'=>$excel['goods_price'],
                                        'stocks_marketprice'=>$excel['goods_marketprice'],'stocks_sku'=>$excel['stocks_sku'],
                                    ); */
                                	
                                }else{
                                    $state_check = false;
                                }
                                
                            }
                            if(!$state_check){
                                if(empty($false_msgs)){
                                $false_msgs = @mb_convert_encoding("此商品的货号已存在且不与此货号相同", "GBK", "UTF-8");
                                }
                                $false_msg .= "此商品的货号已存在且不与此货号相同";
                                
                                $is_download = true;
                                //$objPHPExcel->getActiveSheet()->setCellValue("{$error_col}{$i}",$false_msg);
                                //$objPHPExcel->getActiveSheet()->getStyle( "{$error_col}{$i}" )->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_RED ) );//设置颜色为
                                //$objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->setFillType ( PHPExcel_Style_Fill::FILL_SOLID );
                                //$objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->getStartColor ()->setARGB ( 'FFFF0000' );
                                $error_num++;
                                echo "<script language='javascript'>" .
                                		'$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                                		"location.href = '#anchor';" .
                                		"</script>";
                                unset($excel);
                                
                            }
                            
                            /*if(!empty($sql_up_ea)){
                                $this->db->update_batch('shop_goods_extend_attr',$sql_up_ea,'goods_ea_id');
                            }*/
                            
                            
                        }else{
                            $sql_in_ea = array(
                                'goods_a_id'=>$goods_a_id,'goods_id'=>$goods_id,'color'=>$excel['color'],
                                'color_value'=>$excel['color_value'],'color_remark'=>$excel['color_remark'],
                                'stocks_price'=>$excel['goods_price'],
                                'stocks_marketprice'=>$excel['goods_marketprice'],'stocks_sku'=>$excel['stocks_sku'],
                            );
                            $this->db->insert('shop_goods_extend_attr',$sql_in_ea);
                        }
                        
                    }
                    
                }
                if($state_check){
                	$add_num++;
                	echo "<script language='javascript'>" .
                			'$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                			"location.href = '#anchor';" .
                			"</script>";
                	unset($excel);
                }
                
                
            } else { // 有错误的EXCEL行
	            $is_download = true;
	            $error[] = $false_msgs;
	            @fputcsv($fp,$error);
	            //$objPHPExcel->getActiveSheet()->setCellValue("{$error_col}{$i}",$false_msg);
	            //$objPHPExcel->getActiveSheet()->getStyle( "{$error_col}{$i}" )->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_RED ) );//设置颜色为
	            //$objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->setFillType ( PHPExcel_Style_Fill::FILL_SOLID );
	            //$objPHPExcel->getActiveSheet ()->getStyle ( "{$error_col}{$i}" )->getFill ()->getStartColor ()->setARGB ( 'FFFF0000' );
	            $error_num++;
	            echo "<script language='javascript'>" .
	                '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
	                "location.href = '#anchor';" .
	                "</script>";
	            unset($excel);
	        }
	        ob_end_flush();
	        ob_flush();
	        flush();
	   /*      if ($now_run % 100 == 0){
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
        if (file_exists (  $csvpath )) {
            unlink (  $csvpath );
        }
        // 如有错误下载错误的文件
        if ($is_download) { // 存在格式不成功excel，下载
            ob_end_clean ();
            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $files .'.csv'));
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".$all_num."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".$all_num."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
        //@unlink($excelpath);
        $this->common_function->shop_admin_log('商品导入', 'import', '商品管理');
        exit();
    }
    
    /*商品导入格式*/
    public function goods_tp(){
        header("location:".base_url("/data/excel_tp/goods_import.csv"));
    }
    public function begin_class(){
        //print_r($_POST);die;
        $type = isset($_POST['type'])?$_POST['type']:'';
        if($type=='tb'){
            $code = 2;
        }elseif($type=='jd'){
            $code = 1;
        }
        $store_info = $this->db->select('s.bind_token_session,e.AppKey,e.AppSecret,e.ecs_code')->from('store_syn_log l')
        ->join('store s','s.store_id=l.store_id')->join('ecstore e','e.ecs_code=s.bind_ecstore_type')
        ->where('s.bind_ecstore_type',$code)->where('l.sync_statu',2)->order_by('l.sync_logid','DESC')->limit(1)->get()->row_array();
        //print_r($store_info);die;
        if(!empty($store_info)){
            if($type=='tb'){
                $this->load->library('taobao_op');
                $this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
                if(isset($_GET['op'])&&$_GET['op']=='sync'){
                    $id = isset($_POST['id'])?$_POST['id']:'';
                    if(empty($id)){
                        $id = $this->db->select('GROUP_CONCAT(ec_cid) as cid')->where('ec_parent_cid',0)->where('ec_type',2)->where('is_valid',0)->get('ecstore_cate')->row('cid');
                    }
                    if($id){
                        $cid = explode(',',$id);
                        foreach ($cid as $v){
                            $this->common_function->https_request_r(base_url('admin.php/goods/get_goods_cate'),http_build_query(array('cid'=>$v,'store'=>$store_info)),true);
                        }
                        $data = array('state'=>true,'msg'=>'同步成功');
                    }else{
                        $data = array('state'=>false,'msg'=>'数据为空');
                    }
                    //print_r($id);die;
                     
                }else{
                    $data = $this->get_all_cate();
                }
                 
            }elseif($type=='jd'){
                $this->load->library('jd_op');
                $this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
                $data = $this->jd_op->get_brand();
                if(isset($_GET['op'])&&$_GET['op']=='sync'){
                    $id = isset($_POST['id'])?$_POST['id']:'';
                    if(empty($id)){
                        $id = $this->db->select('GROUP_CONCAT(ec_cid) as cid')->where('ec_parent_cid',0)->where('ec_type',1)->where('is_valid',0)->get('ecstore_cate')->row('cid');
                    }
                    if($id){
                        $cid = explode(',',$id);
                        foreach ($cid as $v){
                            $this->common_function->https_request_r(base_url('admin.php/goods/get_goods_cate'),http_build_query(array('cid'=>$v,'store'=>$store_info)),true);
                        }
                        $data = array('state'=>true,'msg'=>'同步成功');
                    }else{
                        $data = array('state'=>false,'msg'=>'数据为空');
                    }
                    //print_r($id);die;
                     
                }else{
                    $data = $this->get_all_cate1();
                }
            }
        }else{
            $data = array('state'=>false,'msg'=>'操作错误');
        }
         
        echo json_encode($data);exit;
         
    }
    private function get_all_cate($parent_id=0,$deep=false){
        $sql_in = array();$_sql_up = array();
        $data = $this->taobao_op->get_cate($parent_id);
        if(!empty($data['info'])){
            $info = $data['info'];
            foreach ($info as $k=>$v){
                $sql = array('ec_cid'=>$v['cid'],'ec_parent_cid'=>$v['parent_cid'],'ec_name'=>$v['name'],'ec_status'=>$v['status'],
                    'sort_order'=>$v['sort_order'],'ec_is_parent'=>$v['is_parent'],'ec_type'=>2);
                $check_cid = $this->db->select('ec_scid')->where('ec_cid',$v['cid'])->where('ec_type',2)->get('ecstore_cate')->row('ec_scid');
                if($check_cid){
                    $sql['ec_scid'] = $check_cid;
                    //$_sql_up[] = $sql;
                    $this->db->update('ecstore_cate',$sql,array('ec_scid'=>$check_cid));
                }else{
                    //$sql_in[] = $sql;
                    $this->db->insert('ecstore_cate',$sql);
                }
                if($deep){
                    if($v['is_parent']=='true'){
                        $this->get_all_cate($v['cid'],$deep);
                    }
                }
            }
            return array('state'=>true,'msg'=>'');
        }else{
            return $data;
        }
         
    }
    private function get_all_cate1($parent_id=0,$deep=false){
        $sql_in = array();$_sql_up = array();
        $data = $this->jd_op->get_cate($parent_id);
        if(!empty($data['info'])){
            $info = $data['info'];
            foreach ($info as $k=>$v){
                $sql = array('ec_cid'=>$v['id'],'ec_parent_cid'=>$v['fid'],'ec_name'=>$v['name'],'ec_status'=>'',
                    'sort_order'=>$v['order'],'ec_is_parent'=>'','ec_type'=>1);
                $check_cid = $this->db->select('ec_scid')->where('ec_cid',$v['id'])->where('ec_type',1)->get('ecstore_cate')->row('ec_scid');
                if($check_cid){
                    $sql['ec_scid'] = $check_cid;
                    $this->db->update('ecstore_cate',$sql,array('ec_scid'=>$check_cid));
                }else{
                    //$sql_in[] = $sql;
                    $this->db->insert('ecstore_cate',$sql);
                }
                if($deep){
                    $this->get_all_cate1($v['id'],$deep);
                }
            }
            return array('state'=>true,'msg'=>'');
        }else{
            return $data;
        }
    
    }
    public function get_goods_cate() {
        //file_put_contents(ROOTPATH.'logs/stores/11/goods_run_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'a'.json_encode($_REQUEST).'b'.PHP_EOL,FILE_APPEND);
        $data = $_POST['cid'];
        $store_info = $_POST['store'];
        $this->load->library('store_api');
        if($store_info['ecs_code'] == 1){
            $this->load->library('jd_op');
            $this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            $this->get_all_cate1($data,true);
        }elseif($store_info['ecs_code'] == 2){
            $this->load->library('taobao_op');
            $this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            $this->get_all_cate($data,true);
        }
         
    
    }




    //排队
    public function queue()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $store_id   = 0;
        $user_id    = $_SESSION['shop_admin_id'];
        $task_type  = isset($_GET['task_type']) ? $_GET['task_type'] : false;
        $data       = array ('state' => false,'msg' => '进入队列失败');
        $queue      = $this->common_function->get_queue(); //判断队列是否已满
        if($queue) {
            if ($task_type) {
                //判断用户是否存在未处理的任务
                $exist = $this->common_function->exist_queue($store_id, $user_id);
                if ($exist) {   //该用户存在未完成的任务
                    $data['msg'] = '您还存在未完成的任务，请耐心等待操作完成';
                } else {
                    $arr = array (
                        'task_state' => 0,
                        'task_type' => $task_type,
                        'task_request_time' =>time (),
                        'task_request_storeID'  => $store_id,
                        'task_request_userID'   => $user_id,
                        'task_request_userType' => 2,
                    );
                    //得到插入的id
                    $task['task_id'] = $this->common_function->queue_in ($arr);
                    //返回task_id和操作
                    $data = array ('state' => true,'queue'=>false,'msg' => '进入队列成功','task' => $task['task_id'], 'task_type' => $task_type);
                }
            }
            echo json_encode ($data);exit;
        } else {
            $exist = $this->common_function->exist_queue($store_id, $user_id);
            if ($exist) {   //该用户存在未完成的任务
                $data['msg'] = '您还存在未完成的任务，请耐心等待操作完成';
            }else{
                $data  = array ('state' => true,'queue'=>true,'msg' => 'go on');
            }
        }
        echo json_encode ($data);exit;
    }

    //得到位置
    public function get_queue_place()
    {
        $task['task_id'] = isset($_GET['task_id']) ? $_GET['task_id'] :false;
        $data            = array ('state' => false,'msg' => '');
        if ($task['task_id']) {
            //得到位置
            $place = $this->common_function->get_queue_place ($task);
            if ($place == 0){       //已进入操作队列
                $data = array ('state' => true,'place' => 0);
            } else{     //还在排队队列
                $data = array ('state' => true,'place' => $place);
            }
        }
        echo json_encode($data);exit;
    }

    //设置队列状态
    public function set_queue_state()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $task['task_id'] = isset($_GET['task_id']) ? $_GET['task_id'] :false;
        $data            = array ('state' => false,'msg' => '操作失败');
        if ($task['task_id']) {
            //更改状态
            $row = $this->common_function->set_queue_state ($task,1);
            if ($row){       //修改成功
                $data = array ('state' => true,'msg' => 'ok');
            }
        }
        echo json_encode($data);exit;
    }

    //退出队列
    public function quit_queue()
    {
        $this->common_function->shop_admin_priv ("depot_management");//权限
        $task['task_id'] = isset($_GET['task_id']) ? $_GET['task_id'] :false;
        $data            = array ('state' => false,'msg' => '');
        if ($task['task_id']) {
            $row = $this->common_function->queue_out($task);
            if ($row) {
                $data = array('state' => true,'msg' => '取消排队');
            }else{
                $data = array('state' => false,'msg' => 'err');
            }
        }
        echo json_encode ($data);
    }
    
}
