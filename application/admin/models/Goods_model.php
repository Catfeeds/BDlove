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
                $cate[$v['gc_id']]['weight'] = $v['weight'];
                $cate[$v['gc_id']]['ec_jd_cid'] = $v['ec_jd_cid'];
                $cate[$v['gc_id']]['ec_tb_cid'] = $v['ec_tb_cid'];
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
        if($class){
            $this->db->join('shop_type as st',"st.class_id = '{$class}'",'left');
            $this->db->join('shop_type_brand as stb','stb.brand_id = sb.brand_id and stb.type_id=st.type_id');
//            $this->db->where('class_id',$class);
        }
        $this->db->order_by('brand_initial');
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
    
    
    
    
    
    
}