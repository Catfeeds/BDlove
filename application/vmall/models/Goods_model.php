<?php
class Goods_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
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
        $where = 'gc_parent_id ='.$parent_id .' order by gc_sort ASC';
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
    
    
    
    
    
    
    
    
    /**
     * 获取所有分类.
     * 返回格式   (100019,100020,100021,100022,100023,100024,100053)
     * @return 1，参数异常：返回false 2，无数据：返回null 3，正常：返回数据
     */
    public function get_cateid($data=array()){
        if(!is_array($data) || empty($data)){
            return  false;
        }
        $cateid ="(";
        foreach ($data as $key=>$val){
            $cateid .=$val['gc_id'].",";
            if(!empty($val['son_cate']) && is_array($val['son_cate'])){
                foreach ($val['son_cate'] as $ke=>$va){
                    $cateid .=$va['gc_id'].",";
                    if(!empty($va['son_cate']) && is_array($va['son_cate'])){
                         foreach ($va['son_cate'] as $k=>$v){
                             $cateid .=$v['gc_id'].",";
                             if(!empty($v['son_cate']) && is_array($v['son_cate'])){
                                 foreach ($v['son_cate'] as $ks=>$vs){
                                     $cateid .=$vs['gc_id'].",";
                                 }
                             }
                         }
                    }
                }
            }
        }
        $cateid = substr($cateid,0,strripos($cateid,',')).")"; 
        return $cateid ;
    
    }
    
    
    
    
    
    
    
    
    
    
    
    /**
     * 通过父级ID获取分类
     */
    public function get_cate_by_data($data,$flag=false){
        $son_cate = array();
        $type = gettype($data);
        if($type=="integer"){
            $son_cate = $this->common_function->get_rows('shop_goods_class', 'gc_parent_id='.$data);
            foreach ($son_cate as $k => $v){
                $son_cate[$k]['son_num'] = $this->common_function->total('shop_goods_class', 'gc_parent_id='.$v['gc_id']);
            }
            return $son_cate;
        }
        
        if(empty($data)){
            return $son_cate;
        }
        
        foreach ($data as $k => $v){
            if($flag==false){
                $son = $this->common_function->get_rows('shop_goods_class', 'gc_parent_id='.$v['gc_id']);
                if($son && !empty($son)){
                    foreach ($son as $k => $v){
                        $son[$k]['son_num'] = $this->common_function->total('shop_goods_class', 'gc_parent_id='.$v['gc_id']);
                    }
                }
                $son_cate[]=array('gc_id' => $v['gc_id'],'gc_parent_id' => $v['gc_parent_id'],"son"=>$son);
            }else{
                if($data[$k]['son'] && !empty($data[$k]['son'])){
                    foreach ($data[$k]['son'] as $ks => $vs){
                        $son = $this->common_function->get_rows('shop_goods_class', 'gc_parent_id='.$vs['gc_id']);
                        $son_cate[]=array('gc_id' => $vs['gc_id'],'gc_parent_id' => $vs['gc_parent_id'],"son"=>$son);
                    }
                }
           
            }
            
        }
         
        return $son_cate;
    
    }
        


    
    
    //返回23级分类
    public function get_get_cate23(){
        $cate = array();
        $rows = $this->db->select("gc_id,gc_name,gc_parent_id")->from('shop_goods_class')->where("gc_parent_id ='0'")->get()->result_array();
        if($rows && !empty($rows)){
            foreach ($rows as $k => $v){
                $nums = $this->get_cate_by_parent_id($v['gc_id']);
                if(!empty($nums)){
                    foreach ($nums as $ks =>$vs){
                        $cate[] = $vs;
                    }
                }
            }
        }
        //print_r($cate);die;
        return $cate;
    }
    
    

    
}