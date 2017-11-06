<?php
class Stores_model extends CI_Model {

    private $link;
    public function __construct()
    {
        $this->load->database();
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
    //  $type tinyint(1)  '门店类型1实体门店2电商门店3供应门店',
    public  function  get_store_by_role($type){
        if(!$type){
            return  false;
        }
        $roles = $this->db->select('store_id')->where("ous_type",$type)->where("store_state",1)->get('store')->result_array();
        $str = '';
        if($roles){
            foreach ($roles as $key=>$val){
               if(isset($roles[$key+1])){
                   $str .= "'".$val['store_id']."',";
               }else{
                   $str .= "'".$val['store_id']."'";
               }
            }
        }
        return $str;
    }
    
    
    //  $type tinyint(1)  '门店类型1实体门店2电商门店3供应门店',
    public  function  get_has_store_or_brand($type=1,$id,$data){
        if(!$type || empty($data)){
            return  $data;
        }
        if($type==1){//查询是否有该品牌授权
            if(!$id){
                return  0;
            }else{
                if($this->db->select('count(1) as num')->where('store_id',$id)->where('brand_id',$data)->get('store_attr_brands')->row('num')){
                    return  1;
                }else{
                    return  0;
                }
            }
            
        }else{//查询是否已授权该店铺
            if(!$id){
                return  $data;
            }else{
                foreach ($data as $k=>$v){
                    if($this->db->select('count(1) as num')->where('store_id',$id)->where('brand_id',$v['brand_id'])->where('auth_store_id',$v['store_id'])->get('store_auth_store')->row('num')){
                        $data[$k]['has_store'] = 1;
                    }else{
                        $data[$k]['has_store'] = 0;
                    }
                }
                return  $data;
            }
        }

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**
     * 门店信息
     * @param 
     * 
     */
    public function get_stores($where = ' 1=1 '){
        
        $row = $this->db->select('store_name,store_id')->where($where)->get('store')->result_array();
        return $row;
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