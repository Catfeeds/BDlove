<?php
/**
 * GOODS Class
 *goods模型类
 */
class Goods_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library ('common_function' );
        $this->load->language('common');
        $this->link=array(
            '1' => 'http://www.jukeyunduan.com/vmall.php/index',//聚客商城
            '2' => 'http://www.jukeyunduan.com/vmall.php/user/index',//个人中心
            '3' => 'http://www.jukeyunduan.com/vmall.php/store/shopping_guide?op=index',//我的导购
            '4' => 'http://www.jukeyunduan.com/vmall.php/order/index',//我的订单
            '5' => 'http://www.jukeyunduan.com/vmall.php/user/user_shopping_cart',//我的购物车
            '6' => 'http://www.jukeyunduan.com/vmall.php/user/user_collection'//我的收藏
        );
    }
    /**
     * 获取所有分类.
     * 通过父级ID获取分类
     * @param int $level_num 若为1 获取父级下的一级子分类 若为0 获取全部分类
     * @param bool $flag     为true,循环查询他的子类（默认）,为flase,只查询父类的一级子类
     * @param 
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     */
    public function get_cate_by_parent_id($parent_id=0,$flag=true){
        $cate = array();
        $where = 'gc_parent_id ='.$parent_id .' order by gc_sort DESC';
        $rows = $this->common_function->get_rows('shop_goods_class', $where);
        if($rows && !empty($rows)){
            foreach ($rows as $k => $v){
                if($v['gc_parent_id']==0){
                    $cate[$v['gc_id']]['gc_parent_name'] = '-请选择-';
                }else{
                    $parent = $this->common_function->get_row('shop_goods_class', 'gc_id='.$v['gc_parent_id']);
                    $cate[$v['gc_id']]['gc_parent_name'] = $parent['gc_name'];
                }
                $cate[$v['gc_id']]['gc_id'] = $v['gc_id'];
                $cate[$v['gc_id']]['gc_parent_id'] = $v['gc_parent_id'];
                $cate[$v['gc_id']]['gc_name'] = $v['gc_name'];
                $cate[$v['gc_id']]['gc_sort'] = $v['gc_sort'];
                $cate[$v['gc_id']]['gc_keywords'] = $v['gc_keywords'];
                $cate[$v['gc_id']]['gc_description'] = $v['gc_description'];
                if($flag){
                    $this->db->select("count(*) as num");
                    $this->db->from('shop_goods_class');
                    $this->db->where(" gc_parent_id = ".$v['gc_id']);
                    $data = $this->db->get()->row_array();
                    if($data['num']>0){
                        $cate[$v['gc_id']]['son_cate'] = $this->get_cate_by_parent_id($v['gc_id']);
                    }else{
                        $cate[$v['gc_id']]['son_cate'] = array();
                    }
                }
            }
        }
       
        return $cate;
        
    }
    /** 得到一个所有售后分类构成的下拉框
     * $cate_id 选中的id
     * $level 确定分类需要的空格
     * 返回 '<option></option><option selected></option><option></option>'
     */

    public function cate_array_to_option($array, $cate_id = 0, $level = -1, $str = '')
    {	
    	if (!is_array ($array)) 
    	{
    		return false;
    	}
    	$level = $level + 1;
    	foreach($array as $key => $val){
    		$str .= "<option value='". $val['gc_id']. "' ";
    		if($val['gc_id'] == $cate_id){
    			$str .= "selected";
    		}
    		$str .= ">".str_repeat('&nbsp;', $level * 4).'|--'.$val['gc_name'] ."</option>";
    		
    		$son_str = '';
    		if(isset($val['son_cate']) )
            {
                if(is_array($val['son_cate'])){
                    $son_str .= $this->cate_array_to_option ($val['son_cate'], $cate_id, $level, $son_str);
                }
                
            }
    		$str .= $son_str;
    	}
    	
    	return $str;
    }
    
    
    
    
    
    
    /** 得到一个普通商品分类下拉框
     * $cate_id 选中的id
     * 返回 '<option></option><option selected></option><option></option>'
     */
    
    public function get_cate_array_to_option($array, $cate_id = 0, $str = '')
    {
        if (!is_array ($array))
        {
            return false;
        }
        foreach($array as $key => $val){
            $str .= "<option value='". $val['gc_id']. "' ";
            if($val['gc_id'] == $cate_id){
                $str .= "selected";
            }
            $str .= ">".$val['gc_name'] ."</option>";
    
            $son_str = '';
            if(isset($val['son_cate']) )
            {
                if(is_array($val['son_cate'])){
                    $son_str .= $this->get_cate_array_to_option ($val['son_cate'], $cate_id,$son_str);
                }
    
            }
            $str .= $son_str;
        }
         
        return $str;
    }
    
    
    /** 得到一个普通商品品牌下拉框
     * $cate_id 选中的id
     * 返回 '<option></option><option selected></option><option></option>'
     */
    
    public function get_brands_array_to_option($array, $brand_id = 0, $str = '')
    {
        if (!is_array ($array))
        {
            return false;
        }
        foreach($array as $key => $val){
            $str .= "<option value='". $val['brand_id']. "' ";
            if($val['brand_id'] == $brand_id){
                $str .= "selected";
            }
            $str .= ">".$val['brand_name'] ."</option>";
        }
         
        return $str;
    }
    
    
    
    
    
    
    
    /** 得到一个年份构成的下拉框
     * $array 年份
     * $level 确定分类需要的空格
     * 返回 '<option></option><option selected></option><option></option>'
     */
    
    public function year_array_to_option($array)
    {
        if (!is_array ($array))
        {
            return false;
        }
        $str = "";
        foreach($array as $key => $val){
            $str .= "<option value='". $val['year_to_market']. "' >".$val['year_to_market'] ."</option>";
        }
        return $str;
    }
    
    
    
    /**
     * 获取分类下的所有子分类.
     * @param $cate_id 当前分类
     * @param
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     */
    public function get_son_cate($cate_id=0,$data=array()){
        $cate = $this->db->select('gc_id')->where('gc_parent_id',$cate_id)->get('shop_goods_class')->result_array();
        if(!empty($cate)){
            $data = array_merge_recursive($cate,$data);
            foreach ($data as $k=>$v){
               
                $son_data=array();
                $son_data = $this->get_son_cate($v['gc_id'],$son_data);
                if(!empty($son_data)){
                    $data = array_merge_recursive($son_data,$data);
                }
               
            }
            return $data;
        }else{
            return $data;
        }
    }
    
   /**
     * 获取所有颜色
     * 通过父级ID获取分类
     * @param int $level_num 若为1 获取父级下的一级子分类 若为0 获取全部分类
     * @param 
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     */
    public function get_color_by_parent_id($parent_id=0){
        $color = array();
        $where = 'cl_parent_id ='.$parent_id .' order by cl_sort DESC';
        $rows = $this->common_function->get_rows('shop_color', $where);
        if($rows && !empty($rows)){
            foreach ($rows as $k => $v){
                /*if($v['cl_parent_id']!=0){
                    $parent = $this->common_function->get_row('shop_color', 'cl_id='.$v['cl_parent_id']);
                    $cate[$v['cl_id']]['cl_parent_name'] = $parent['cl_name'];
                }*/
                $cate[$v['cl_id']]['cl_id'] = $v['cl_id'];
                $cate[$v['cl_id']]['cl_parent_id'] = $v['cl_parent_id'];
                $cate[$v['cl_id']]['cl_name'] = $v['cl_name'];
                $cate[$v['cl_id']]['cl_sort'] = $v['cl_sort'];
                $cate[$v['cl_id']]['cl_value'] = $v['cl_value'];

                $this->db->select("count(*) as num");
                $this->db->from('shop_color');
                $this->db->where(" cl_parent_id = ".$v['cl_id']);
                $data = $this->db->get()->row_array();
                if($data['num']>0){
                    $cate[$v['cl_id']]['son_color'] = $this->get_color_by_parent_id($v['cl_id']);
                }else{
                    $cate[$v['cl_id']]['son_color'] = array();
                }
            }
        }
        return $cate;
        
    }
    /**
     * 通过分类获取品牌
     * $class int 分类
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     */
    public function get_brands_by_class($class=false){
        $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial,sb.brand_class,sb.brand_pic,sb.brand_sort,sb.brand_recommend,sb.class_id,sb.show_type');
        $this->db->from('shop_brand as sb');
        $this->db->join('store_attr_brands as sab', 'sab.brand_id = sb.brand_id');
        if($class){
            $this->db->join('shop_type as st',"st.class_id = '{$class}'",'left');
            $this->db->join('shop_type_brand as stb','stb.brand_id = sb.brand_id and stb.type_id=st.type_id');
//            $this->db->where('class_id',$class);
        }
        $this->db->where('sab.store_id',$_SESSION['shop_spg_store_id'])->order_by('brand_initial');
        $brands = $this->db->get()->result_array();
//        var_dump($this->db->last_query());exit;
        return $brands;
        
    }
     /**
     * 获取所有自定义分类.
     * 通过父级ID获取分类
     * @param int $level_num 若为1 获取父级下的一级子分类 若为0 获取全部分类
     * @param 
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     */
    public function get_gstn_by_parent_id($parent_id=0){
        $cate = array();
        $where = 'gstn_parent_id ='.$parent_id .' order by gstn_sort DESC';
        $rows = $this->common_function->get_rows('shop_goods_self_taxonomy', $where);
        if($rows && !empty($rows)){
            foreach ($rows as $k => $v){
                if($v['gstn_parent_id']==0){
                    $cate[$v['gstn_id']]['gstn_parent_name'] = '-请选择-';
                }else{
                    $parent = $this->common_function->get_row('shop_goods_self_taxonomy', 'gstn_id='.$v['gstn_parent_id']);
                    $cate[$v['gstn_id']]['gstn_parent_name'] = $parent['gstn_name'];
                }
                $cate[$v['gstn_id']]['gstn_id'] = $v['gstn_id'];
                $cate[$v['gstn_id']]['gstn_parent_id'] = $v['gstn_parent_id'];
                $cate[$v['gstn_id']]['gstn_name'] = $v['gstn_name'];
                $cate[$v['gstn_id']]['gstn_sort'] = $v['gstn_sort'];
                $this->db->select("count(*) as num");
                $this->db->from('shop_goods_self_taxonomy');
                $this->db->where(" gstn_parent_id = ".$v['gstn_id']);
                $data = $this->db->get()->row_array();
                if($data['num']>0){
                    $cate[$v['gstn_id']]['son_cate'] = $this->get_gstn_by_parent_id($v['gstn_id']);
                }else{
                    $cate[$v['gstn_id']]['son_cate'] = array();
                }
            }
        }
       
        return $cate;
        
    }
    /** 得到一个所有自定义分类构成的下拉框
     * $array    选中的要处理的数组
     * $cate_id 选中的id
     * $cate_name 在选项的value值的地方需不需要拼上分类的名称（默认不需要）
     * $level 确定分类需要的空格
     * 返回 '<option></option><option selected></option><option></option>'
     */

    public function gstn_array_to_option($array, $cate_id = 0, $cate_name = false, $level = -1, $str = '')
    {	
    	if (!is_array ($array)) 
    	{
    		return false;
    	}
    	$level = $level + 1;
    	foreach($array as $key => $val){
                if($cate_name){
                    $str .= "<option value='". $val['gstn_id']. "$$".$val['gstn_name']."' ";
                }else{
                    $str .= "<option value='". $val['gstn_id']. "' ";
                }
                if(is_array($cate_id)){
                    if(in_array($val['gstn_id'], $cate_id)!==false){
    			$str .= "selected";
                    }
                }else{
                   if($val['gstn_id'] == $cate_id){
    			$str .= "selected";
                    } 
                }
    		$str .= ">".str_repeat('&nbsp;', $level * 4).'|--'.$val['gstn_name'] ."</option>";
    		
    		$son_str = '';
    		if(isset($val['son_cate']) )
            {
                if(is_array($val['son_cate'])){
                    $son_str .= $this->gstn_array_to_option ($val['son_cate'], $cate_id, $cate_name,$level, $son_str);
                }
                
            }
    		$str .= $son_str;
    	}
    	
    	return $str;
    }
    /**
     * 获取自定义分类下的所有子自定义分类.
     * @param $cate_id 当前分类
     * @param
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     */
    public function get_son_gstn($cate_id=0,$data=array()){
        $cate = $this->db->select('gstn_id')->where('gstn_parent_id',$cate_id)->get('shop_goods_self_taxonomy')->result_array();
        if(!empty($cate)){
            $data = array_merge_recursive($cate,$data);
            foreach ($data as $k=>$v){
                $son_data=array();
                $son_data = $this->get_son_gstn($v['gstn_id'],$son_data);
                if(!empty($son_data)){
                    $data = array_merge_recursive($son_data,$data);
                }
               
            }
            return $data;
        }else{
            return $data;
        }
    }
    /**
     * 获取分类下的商品属性.
     * @param $cate_id 当前分类
     * @param
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     */
    public function get_class_attr($cate_id){
        if(!empty($cate_id)){
            $attr_arr = $this->db->select('sc.sp_id,sc.gc_id,s.*')->from('shop_goods_class_specs as sc')
            ->join('shop_spec as s','s.sp_id=sc.sp_id','left')
            ->where('sc.gc_id',$cate_id)->get()->result_array();
            foreach ($attr_arr as $k=>$v){
                if(!empty($v['sp_select_lists'])){
                    $attr_arr[$k]['sp_select_lists'] = unserialize($v['sp_select_lists']);
                }
            }
            return $attr_arr;
        }else{
            return array();
        }
    }
    
    
    /**
     *
     * @param int 当前页 $page
     * @param int 总记录数 $total
     * @param int 每页条数 $rp
     * @param array $data
     * @return string
     */
    public function pagerows($page, $total, $rp){
        $total_page = ceil($total/$rp);
        $total_page = empty($total_page) ? 1 : $total_page;
        if ($total_page == 1) {
            return '';
        }
    
        $str = '';
        if($total_page>5){
            if(($page+4)==$total_page){
                $str .='<li><a href="javascript:;" class="prev num-item">上一页</a></li>';
                $str.='<li class="active"><a href="javascript:;">'.$page.'</a></li>';
                $str .= '<li><a href="javascript:;" data-page="'.($page+1).'" class="num-item">'.($page+1).'</a></li>';
                $str .= '<li><a href="javascript:;" data-page="'.($page+2).'" class="num-item">'.($page+2).'</a></li>';
                $str .= '<li><a href="javascript:;" data-page="'.($page+3).'" class="num-item">'.($page+3).'</a></li>';
                $str .= '<li><a href="javascript:;" data-page="'.($page+4).'" class="num-item">'.($page+4).'</a></li>';
                $str .='<li><a href="javascript:;" class="next num-item">下一页</a></li>';
            }elseif (($page+4)>$total_page){
                $str .='<li><a href="javascript:;" class="prev num-item">上一页</a></li>';
                if ($page == ($total_page-4)) {
                    $str .= '<li class="active"><a href="javascript:;">'.($total_page-4).'</a></li>';
                }else{
                    $str .= '<li><a href="javascript:;" data-page="'.($total_page-4).'" class="num-item">'.($total_page-4).'</a></li>';
                }
                if ($page == ($total_page-3)) {
                    $str .= '<li class="active"><a href="javascript:;">'.($total_page-3).'</a></li>';
                }else{
                    $str .= '<li><a href="javascript:;" data-page="'.($total_page-3).'" class="num-item">'.($total_page-3).'</a></li>';
                }
                if ($page == ($total_page-2)) {
                    $str .= '<li class="active"><a href="javascript:;">'.($total_page-2).'</a></li>';
                }else{
                    $str .= '<li><a href="javascript:;" data-page="'.($total_page-2).'" class="num-item">'.($total_page-2).'</a></li>';
                }
                if ($page == ($total_page-1)) {
                    $str .= '<li class="active"><a href="javascript:;">'.($total_page-1).'</a></li>';
                }else{
                    $str .= '<li><a href="javascript:;" data-page="'.($total_page-1).'" class="num-item">'.($total_page-1).'</a></li>';
                }
            }else{
                $str.='<li class="active"><a href="javascript:;">'.$page.'</a></li>';
                $str .= '<li><a href="javascript:;" data-page="'.($page+1).'" class="num-item">'.($page+1).'</a></li>';
                $str .= '<li><a href="javascript:;" data-page="'.($page+2).'" class="num-item">'.($page+2).'</a></li>';
                $str .= '<li><a href="javascript:;" data-page="'.($total_page-1).'" class="num-item">'.($total_page-1).'</a></li>';
                $str .= '<li><a href="javascript:;" data-page="'.($total_page).'" class="num-item">'.($total_page).'</a></li>';
                $str .='<li><a href="javascript:;" class="next num-item">下一页</a></li>';
            }
        }else{
            for ($i = 1; $i<=$total_page ; $i++) {
                if ($page == $i) {
                    $str .= '<li class="active"><a href="javascript:;">'.$page.'</a></li>';
                }else{
                    $str .= '<li><a href="javascript:;" data-page="'.$page.'" class="num-item">'.$page.'</a></li>';
                }
            }
    
        }
    
        return $str;
    }
    
    //查询门店装修区块表是否已有该模块
    /*
     `sdt_id` int(10) NOT NULL COMMENT '模版编号',
     `block_code` varchar(50) NOT NULL COMMENT '装修模块编码',  */
    function check_decoration_block($sdt_id,$block_code){
        if(!($sdt_id && $block_code)){
            return false;
        }
        $this->db->select('sdb_id,sdt_id,block_code');
        $this->db->from('store_decoration_block');
        $this->db->where("sdt_id= '{$sdt_id}' and block_code ='{$block_code}'");
        $row = $this->db->get()->row_array();
        if(isset($row['sdb_id']) && !empty($row['sdb_id'])){
            return $row['sdb_id'];
        }else{
            return false;
        }
    }
    
    //根据模块id，select 查询对应信息
    /*
     `select` int(10) NOT NULL COMMENT '下拉框选择值',
     `block_code` varchar(50) NOT NULL COMMENT '装修模块编码',  */
    function get_href_by_block_code($block_code,$select){
        if(!$block_code || !$select){
            return false;
        }
        if($block_code=='m1001' || $block_code=='m1002' || $block_code=='m1003'){
            return  $this->link[$select];
        }
    }
}