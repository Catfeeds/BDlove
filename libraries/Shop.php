<?php 
/**
 *  Captcha Class
 *商城前端数据库操作公共函数类
 * @lxc		
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop
{
    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
    }
    
    /**
     * 提交弹出框
     *
     * @access  public
     * @param   string              
     *  * @lxc	
     */
    public function goods_top_class() {
         $arr = $this->CI->db->select('gc_name,gc_id')->from('shop_goods_class')->where('gc_parent_id',0)->get()->result_array();
         return $arr;
    }
    /**商品评价统计
     *$goods_id 商品ID
     *
     */
    public function goods_commonid($goods_id){
        $commonid_data = $this->CI->db->select('count(1) as num,geval_scores')->where('geval_goodsid',$goods_id)->where('geval_state','0')->group_by('geval_scores')->get('shop_evaluate_goods')->result_array();
        $commonid_image = $this->CI->db->select('count(1) as num')->where('geval_goodsid',$goods_id)->where('geval_state','0')->where_not_in('geval_image',array(null,''))->get('shop_evaluate_goods')->row('num');
        $commonid_good = 0;
        $commonid_milddle = 0;
        $commonid_bad = 0;
        $commonid_total = 0;
        $commonid_total_num = 0;
        $commonid_bad_num = 0;
        $commonid_milddle_num = 0;
        $commonid_good_num = 0;
        foreach($commonid_data as $k=>$v){
            $commonid_total += $v['num'];
            $commonid_total_num +=$v['num']*$v['geval_scores'];
            if($v['geval_scores']==1||$v['geval_scores']==2){
                $commonid_bad +=$v['num'];
                $commonid_bad_num +=$v['num'];
            }elseif($v['geval_scores']==3){
                $commonid_milddle_num +=$v['num'];
                $commonid_milddle +=$v['num'];
            }elseif($v['geval_scores']==4||$v['geval_scores']==5){
                $commonid_good_num +=$v['num'];
                $commonid_good +=$v['num'];
            }
        }
        $commonid['image_num'] = $commonid_image;
        if($commonid_total>0){
            $commonid['total'] = $commonid_total;//评论总数
            $commonid['bad'] = ($commonid_bad/$commonid_total)*100;//差评
            $commonid['bad_num'] = $commonid_bad_num;//差评个数
            $commonid['milddle'] = ($commonid_milddle/$commonid_total)*100;//中评
            $commonid['milddle_num'] = $commonid_milddle_num;//中评个数
            $commonid['good'] = ($commonid_good/$commonid_total)*100;//好评
            $commonid['good_num'] = $commonid_good_num;//好评个数
            $commonid['percent'] = ceil($commonid_total_num/$commonid_total);//平均评分
            $commonid['star_on_img'] = array();//亮星星个数
            $commonid['star_off_img'] = array();//暗星星个数
            for($i=1;$i<=$commonid['percent'];$i++){
                $commonid['star_on_img'][] = 1;
            }
            for($i=($commonid['percent']+1);$i<=5;$i++){
                $commonid['star_off_img'][] = 1;
            }
        }else{
            $commonid['total'] = 0;
            $commonid['bad'] = 0;
            $commonid['bad_num'] = 0;
            $commonid['milddle'] = 0;
            $commonid['milddle_num'] = 0;
            $commonid['good'] = 100;
            $commonid['good_num'] = 0;
            $commonid['percent'] = 5;
            $commonid['star_on_img'] = array(1,1,1,1,1);
            $commonid['star_off_img'] = array();
        }
        return $this->CI->smarty->assign('commonid',$commonid);
    }
    /**商品评价
     *$goods_id 商品ID
     *$page 当前页
     */
    public function goods_commonid_content($goods_id,$page,$score='all'){
        $page=isset($page) ?  $page: 1;
        $rp = 5;
        $where = " 1='1' ";
        if($score==1){
            $where .=" and (geval_scores=5 or geval_scores=4) ";
        }elseif($score==2){
            $where .=" and geval_scores=3  ";
        }elseif($score==3){
            $where .=" and (geval_scores=2 or geval_scores=1)  ";
        }elseif($score==4){
            $where .=" and (geval_scores=2 or geval_scores=1)  ";
        }
        $commonid_data = $this->CI->db->select('gg.geval_id,gg.geval_goodsid,gg.geval_scores,gg.geval_content,
            gg.geval_frommemberid,gg.geval_frommembername,gg.geval_isanonymous,gg.geval_addtime,u.head_portrait')
        ->from('shop_evaluate_goods as gg')->join('user as u','u.user_id=gg.geval_frommemberid','left')
        ->where('geval_goodsid',$goods_id)->where('geval_state','0')->where($where)->get()->result_array();
        $num = count($commonid_data);
        if($num>0){
            $total_page = ceil($num/$rp);
            $start = $rp*($page-1);
            $commonid_data = array_slice($commonid_data, $start,$rp);
            $str = '';
            foreach ($commonid_data as $k=>$v){
                $v['head_portrait'] = empty($v['head_portrait']) ? 'default_user_portrait.gif' : $v['head_portrait'];
                $star = '';
                $str.='<div id="t" class="ncs-commend-floor">';
                $str.='<div class="user-avatar"> <a href="" target="_blank" data-param="{'."'id'".':'.$v['geval_frommemberid'].'}" nctype="mcard" data-hasqtip="2"> <img src="'.TEMPLE.'images/'.$v['head_portrait'].'"> </a> </div>';
                $str.='<dl class="detail"><dt> <span class="user-name">';
                $str.='<a href="" target="_blank" data-param="{'."'id'".':'.$v['geval_frommemberid'].'}" nctype="mcard" data-hasqtip="3">'.$v['geval_frommembername'].'&nbsp;&nbsp;</a>';
                $str.='</span><div class="goods-raty">商品评分：<em class="raty" data-score="'.$v['geval_scores'].'" title="满意" style="width: 100px;">';
                for($i=1;$i<=$v['geval_scores'];$i++){
                    $star .='<img src="'.TEMPLE.'images/star-on.png" alt="1" title="满意">&nbsp;';
                }
                for($j=1;$j<=(5-$v['geval_scores']);$j++){
                    $star .='<img src="'.TEMPLE.'images/star-off.png" alt="1" title="不满意">&nbsp;';
                }
                $str.=$star;
                $str.='<input type="hidden" name="score" value="'.$v['geval_scores'].'" readonly="readonly"></em></div>';
                $str.='</dt><dd>'.$v['geval_content'].'</dd><dd class="pubdate" pubdate="pubdate">'.date('Y-m-d h:i:s',$v['geval_addtime']).'</dd><hr>';
                $str.='</dl></div>';

            }
            $str.='<div class="tc pr5 pb5 pr"><input type="hidden" name="now_page" id="now_page" value="'.$page.'"><input type="hidden" id="total_page" name="total_page" value="'.$total_page.'"><div class="pagination"></div></div>';
            return $str;
        }else{
            return '<div class="no-buyer ncs-norecord">暂无符合条件的数据记录</div>';
        }
    }
    /**
     * 查询商品库存量
     *
     * @param   string      $goods_id         商品ID
     * @return  string      $stocks           库存量
     * @author  gjd
     */
    function get_stocks_by_goods_id($goods_id){
        if(empty($goods_id)){
            return false;
        }
 //        var_dump($goods_id);
        $goods_amount = $this->CI->db->select('ga.goods_a_id,ga.goods_id,ga.color,ga.stocks_code,ga.stocks_barcode,gd.depot_code,rate')->from('shop_goods_amount as ga')->join('shop_goods_depot as gd','gd.goods_a_id=ga.goods_a_id')->where('ga.goods_id',$goods_id)->get()->result_array();
        $stocks_code_arr = array();
        $depot_arr = array();
        foreach ($goods_amount as $k=>$v){
            $depot_arr[] = $v['depot_code'];
            $stocks_code_arr[] = $v['stocks_code'];
        }
        $depot_arr = array_unique($depot_arr);
        $stocks_code_arr = array_unique($stocks_code_arr);
        if(empty($depot_arr) || empty($stocks_code_arr)){
            $stocks = 0;
        }else{
            $stock_arr = $this->CI->db->select('sa.depot_code,sa.article_number,sa.size,sa.stock')->from('stocks_amount as sa')->where_in('article_number',$stocks_code_arr)->where_in('depot_code',$depot_arr)->get()->result_array();
            $stocks = 0;
            foreach ($stock_arr as $k=>$v){
                foreach ($goods_amount as $kk=>$vv){
                    if($vv['stocks_code']==$v['article_number'] && $vv['depot_code']==$v['depot_code']){
                        $stocks += $v['stock']*$vv['rate'];
                    }
                }
            }
        }
        return floor($stocks);
    }
    /**
     * 查询商品价格 及其确定的仓库，库存，尺码信息
     *
     * @param   string      $goods_id         商品ID
     * @param  string      $color           根据颜色得到的流水ID
     * @param  string      $size           货品的尺码（有尺码就会返回最终的商品信息，只有一条，如果没有尺码返回所有尺码的信息）
     * @return array  
     * @author  lxc
     */
    function get_price_by_goods_id($goods_id,$color,$size='',$wheres=" 1 = '1' "){
        //print_r($_SESSION);exit;
        $goods_data = $this->CI->db->select('goods_price,goods_promotion_type')->from('shop_goods')->where('goods_id',$goods_id)->get()->row_array();
        $goods_price = $goods_data['goods_price'];
        if(isset($goods_data['goods_promotion_type'])&&($goods_data['goods_promotion_type']==1)){
            $group = $this->CI->db->select('groupbuy_name,start_time,end_time,groupbuy_price,upper_limit,virtual_quantity,buy_quantity')
            ->from('shop_p_groupbuy')->where('goods_id',$goods_id)->get()->row_array();
            $time = time();
            if($group['start_time']<=$time&&$group['end_time']>=$time){
                $goods_price = $group['groupbuy_price'];
            }
        }/* elseif(isset($goods_data['goods_promotion_type'])&&($goods_data['goods_promotion_type']==2)){
            $this->CI->db->select('g.xianshi_id,x.start_time,x.end_time,g.xianshi_price,x.lower_limit')->from('shop_p_xianshi_goods as g')
            ->join('shop_p_xianshi as x','x.xianshi_id=g.xianshi_id','left')->where('goods_id',$goods_id)->get()->row_array();
        } */
        $user_id = isset($_SESSION['shop_user_id']) ? trim($_SESSION['shop_user_id']) : '';
        $shop_user_type = isset($_SESSION['shop_user_type']) ? $_SESSION['shop_user_type'] : '';
        $depot_arr_ = isset($_SESSION['shop_agent_depot']) ? $_SESSION['shop_agent_depot'] : '';
        $where = ' 1=1 ';
        $stock_code = $this->CI->db->select('stocks_code')->from('shop_goods_amount')->where('goods_a_id', $color)->get()->row('stocks_code');
       /*  if(!empty($user_id)){
            if(empty($depot_arr)){
                $depots = $this->CI->db->select('depot_id,depot_code,depot_name,agents_id')->from('depot')->where('status', 1)->get()->result_array();
                $depot_code_arr = array();
                foreach ($depots as $depot){
                    if(strpos(",".$depot['agents_id'].",", ",".$user_id.",") !== FALSE){
                        $depot_code_arr[] = $depot['depot_code'];
                    }
                }
                $depot_arr_=join(',',$depot_code_arr);

            }

        } */

         if($size==''){
            $depot_arr = $this->CI->db->select('sa.depot_code,sa.article_number,sa.size,sa.stock,s.weight,s.tag_price,d.depot_name')->from('v_depot_brand_stock_amount as sa')
            ->join('stocks as s','s.article_number=sa.article_number','left')
            ->join('depot as d','d.depot_code=sa.depot_code','left')
            ->where('sa.article_number',$stock_code)
            ->where($wheres)
            ->get()->result_array();
        }else{
            $depot_arr = $this->CI->db->select('sa.depot_code,sa.article_number,sa.size,sa.stock,s.weight,s.tag_price,d.depot_name')->from('v_depot_brand_stock_amount as sa')
            ->join('stocks as s','s.article_number=sa.article_number','left')
            ->join('depot as d','d.depot_code=sa.depot_code','left')
            ->where('sa.size',$size)
            ->where($wheres)
            ->where('sa.article_number',$stock_code)->get()->result_array();
        } 
        $depot_arr1=array();
        $depot_arr2=array();

        foreach ($depot_arr as $k=>$v){
            $v['stock'] = empty($v['stock']) ? 0:$v['stock'] ;
            if($v['size']!=''){
                $depot_arr1[$v['size']][$v['depot_code']]=$v;
                $depot_arr2[$v['size']][$v['depot_code']]=$v['article_number'];
            }

        }
        //print_r($depot_arr);exit;
        $discount_arr = array();
        $discount_arr1 = array();

        //require_once ROOTPATH.'libraries/order_cls.php';
        $this->CI->load->library('order_cls');
        $order_cls = new order_cls;
       // print_r($depot_arr2);print_r($depot_arr1);exit;
        foreach ($depot_arr2 as $k=>$v){
            foreach ($v as $ka=>$va){
                  /* if(!empty($user_id)){
                        if(strpos(",".$depot_arr_.",", ",".$ka.",") !== FALSE){
                            $discount = $order_cls->get_agent_discount($ka,$va);
                            $discount_arr[$k][$ka]= $discount*$depot_arr1[$k][$ka]['tag_price'];
                            $discount_arr1[$k][$ka]= $discount*$depot_arr1[$k][$ka]['tag_price'];
                        }else{
                            $discount = $order_cls->get_agent_discount($ka,$va,1);
                            $discount_arr[$k][$ka]= $discount*$depot_arr1[$k][$ka]['tag_price'];
                            $discount_arr1[$k][$ka]= $discount*$depot_arr1[$k][$ka]['tag_price'];
                        }
                    }else{
                        $discount = $order_cls->get_agent_discount($ka,$va,1);
                        $discount_arr[$k][$ka]= $discount*$depot_arr1[$k][$ka]['tag_price'];
                        $discount_arr1[$k][$ka]= $discount*$depot_arr1[$k][$ka]['tag_price'];
                    } */
                $discount = $order_cls->get_agent_discount($ka,$va,1);
                $depot_arr1[$k][$ka]['discount'] = $discount;
                $discount_arr[$k][$ka]= $discount*$depot_arr1[$k][$ka]['tag_price'];
                $discount_arr1[$k][$ka]= $discount*$depot_arr1[$k][$ka]['tag_price'];
            }

        }
        //print_r($depot_arr1);print_r($discount_arr);exit;
        foreach ($discount_arr1 as $k=>$v ){
            sort($v);
            $price = $v[0];
            $discount_arr[$k]['price_discount']= $price;
        }

        $depot_price_low = array();
        $depot_price_low_arr = array();
        $depot_amount_low_arr = array();
        $depot_amount_low_arr1 = array();
        foreach ($discount_arr as $k=>$v ){
            foreach ($v as $ka=>$va){
                if($v['price_discount']==$va&&$ka!='price_discount'){
                    $depot_price_low[$k][] = $ka;
                }
            }

        }
        //print_r($depot_price_low);print_r($depot_arr1);exit;
        foreach ($depot_price_low as $k=>$v){
            foreach ($v as $ka=>$va){
                if(isset($depot_arr1[$k][$va]['stock'])){
                    $depot_amount_low_arr[$k][$va] = $depot_arr1[$k][$va]['stock'];
                    $depot_amount_low_arr1[$k][$va] = $depot_amount_low_arr[$k][$va];
                }
            }

        }

        foreach ($depot_amount_low_arr as $k=>$v){
            sort($v);
            $depot_amount_low_arr1[$k]['max_amount']=$v[count($v)-1];
        }
        $depot_price_amount_low = array();
        foreach ($depot_amount_low_arr1 as $k=>$v){
            foreach ($v as $ka=>$va){
                if($v['max_amount']==$va&&$ka!='max_amount'){
                    $depot_price_amount_low[$k] = $ka;
                }
            }
        }
        //print_r($depot_price_amount_low);print_r($discount_arr);print_r($depot_price_low_arr);exit;
        if($goods_price>0){
            foreach ($depot_price_amount_low as $k=>$v){
                $depot_arr1[$k][$v]['lower_price'] = $discount_arr[$k][$v];
                $depot_arr1[$k][$v]['last_price'] = $goods_price;
                $depot_price_low_arr[$k] = $depot_arr1[$k][$v];
                //$depot_amount_low_arr[$v] = $depot_arr1[$v][]
            }
        }else{
            foreach ($depot_price_amount_low as $k=>$v){
                $depot_arr1[$k][$v]['lower_price'] = $discount_arr[$k][$v];
                $depot_arr1[$k][$v]['last_price'] = $discount_arr[$k][$v];
                $supp_discount = $order_cls->get_supply_discount($depot_arr1[$k][$v]['article_number'],$depot_arr1[$k][$v]['depot_code']);
                $depot_arr1[$k][$v]['supp_price'] = $supp_discount*$depot_arr1[$k][$v]['tag_price'];
                $depot_arr1[$k][$v]['supp_discount'] = $supp_discount;
                $depot_price_low_arr[$k] = $depot_arr1[$k][$v];
                //$depot_amount_low_arr[$v] = $depot_arr1[$v][]
            }
        }

        //print_r($depot_price_low_arr);exit;
        return $depot_price_low_arr;


    }
    /**浏览历史
     *$goods_id 商品ID;$goods_data(商品详情页的浏览历史才会有，其他页面的浏览历史不需要参数)
     *界面引用lib/history.lbi
     *@return array
     *@author lxc
     */
    public function see_history($goods_id=false,$goods_data=false){
        $user_id = isset($_SESSION['shop_user_id']) ? $_SESSION['shop_user_id'] : '';
        $see_to_history = array();
        $see_to_history_data = array();
        if(!empty($user_id)){
            $jsw_user_history_goods_id = isset($_COOKIE['jsw_user_history_goods_id']) ? unserialize($_COOKIE['jsw_user_history_goods_id']) : array();
            foreach ($jsw_user_history_goods_id as $k=>$v){
                $count = $this->CI->db->select('count(1) as num')->from('shop_goods_browse')
                ->where('goods_id',$v)->where('member_id',$user_id)->get()->row('num');
                if($count==0){
                    $goods_data = $this->CI->db->select('gc_id,gc_id_1,gc_id_2,gc_id_3')->from('shop_goods')
                    ->where('goods_id',$v)->get()->row_array();
                    $this->CI->db->insert('shop_goods_browse',array('goods_id'=>$v,'member_id'=>$user_id,'browsetime'=>time(),
                        'gc_id'=>$goods_data['gc_id'],'gc_id_1'=>$goods_data['gc_id_1'],
                        'gc_id_2'=>$goods_data['gc_id_2'],'gc_id_3'=>$goods_data['gc_id_3'],
                    ));
                }
            }
            $see_to_history1 = $this->CI->db->select('s.goods_id')->from('shop_goods_browse as s')
            ->where('s.member_id',$user_id)->order_by('','RANDOM')->limit(3)->get()->result_array();
            foreach ($see_to_history1 as $k=>$v){
                $see_to_history[] = $v['goods_id'];
            }
            if(!empty($goods_id)&&$goods_data){
                $history_num = $this->CI->db->select('count(1) as num')->from('shop_goods_browse')
                ->where('goods_id',$goods_id)->where('member_id',$user_id)->get()->row('num');
                if($history_num==0){
                    $this->CI->db->insert('shop_goods_browse',array('goods_id'=>$goods_id,'member_id'=>$user_id,'browsetime'=>time(),
                        'gc_id'=>$goods_data['gc_id'],'gc_id_1'=>$goods_data['gc_id_1'],
                        'gc_id_2'=>$goods_data['gc_id_2'],'gc_id_3'=>$goods_data['gc_id_3'],
                    ));
                } 
            }
        }else{
            $jsw_user_history_goods_id = isset($_COOKIE['jsw_user_history_goods_id']) ? unserialize($_COOKIE['jsw_user_history_goods_id']) : array();
            if(count($jsw_user_history_goods_id)>3){
                $see_to_history = array_slice($jsw_user_history_goods_id, rand(0,(count($jsw_user_history_goods_id)-3)),3);
            }else{
                $see_to_history = $jsw_user_history_goods_id;
            }
            if($goods_id){
                if(!array_key_exists($goods_id,$jsw_user_history_goods_id)){
                    $jsw_user_history_goods_id[$goods_id] = $goods_id;
                }
                setcookie('jsw_user_history_goods_id',serialize($jsw_user_history_goods_id),time()+3600*24,'/');
            }

        }
        //print_r($see_to_history);print_r($_COOKIE);exit;
        foreach ($see_to_history as $k=>$v){
            if(is_numeric($v)){
                $see_to_history_data[$v] = $this->CI->db->select('s.goods_image,s.goods_price,s.goods_name,sg.color,sg.goods_a_id')
                ->from('shop_goods as s')->join('shop_goods_amount as sg','sg.goods_id=s.goods_id','left')
                ->where('s.goods_id',$v)->get()->row_array();
                $price_data = $this->get_price_by_goods_id($v,$see_to_history_data[$v]['goods_a_id']);
                if($see_to_history_data[$v]['goods_price']>0){
                    $see_to_history_data[$v]['last_price'] = $see_to_history_data[$v]['goods_price'];
                }else{
                    $see_to_history_data[$v]['last_price'] = current($price_data)['last_price'];
                }
                $see_to_history_data[$v]['size'] = current($price_data)['size'];
            }
        }
 //       print_r($see_to_history_data);exit;
        return $this->CI->smarty->assign('see_to_history',$see_to_history_data);
    }
    /**地区查询
     *@return array 父级显示子级地区
     *@author lxc
     */
    /*商品详情地区查询*/
    public function get_area_info(){
        $area = array();
        $area_data = array();
        $area = $this->CI->db->select('area_name,area_id,area_parent_id')->from('area')->get()->result_array();

        foreach ($area as $k=>$v){

            $area_data[$v['area_parent_id']][] = array('0'=>$v['area_id'],'1'=>$v['area_name']);

        }
        //print_r($_COOKIE);
        return $area_data;
    }
    /**
     * 聚客币基本操作
     * @param type $user_id     用户id
     * @param type $type        操作类型：1为登录，2为注册，3为评论，4为购物付款,5为消费抵扣
     * @param type $expense     付款金额（只有类型为4，5时（代表抵扣数量）才需传入）
     */
    public function points_operate($user_id,$type,$expense = NULL){
        $value = $this->CI->db->select('value')->where('code','integral_rule')->get('system_config')->row('value');
        if(!empty($value)){
            $rule = unserialize($value);
            $user = $this->CI->db->select('member_points,user_name,member_login_time')->where('user_id',$user_id)->get('user')->row_array();
            $inner = ['pl_memberid'=>$user_id,'pl_membername'=>$user['user_name'],'pl_addtime'=>time()];
            if($type == 1){
                $timenow = date('Ymd');
                $user['member_login_time'] = empty($user['member_login_time']) ? 0 : $user['member_login_time'];
                $timenext = date('Ymd',$user['member_login_time']);
                if($timenow == $timenext){
                    return true;
                }
                $inner['pl_points'] = $rule['points_login'];
                $new = $rule['points_login'] + $user['member_points'];
                $inner['pl_desc'] = '用户登录';
                $inner['pl_stage'] = '用户登录';
                $inner['pl_stage_type'] = 1;
            }elseif($type == 2){
                $inner['pl_points'] = $rule['points_reg'];
                $new = $rule['points_reg'] + $user['member_points'];
                $inner['pl_desc'] = '用户注册';
                $inner['pl_stage'] = '用户注册';
                $inner['pl_stage_type'] = 2;
            }elseif($type == 3){
                $inner['pl_points'] = $rule['points_comments'];
                $new = $rule['points_comments'] + $user['member_points'];
                $inner['pl_desc'] = '用户评论';
                $inner['pl_stage'] = '用户评论';
                $inner['pl_stage_type'] = 3;
            }elseif($type == 4){
                $point = $expense / $rule['points_orderrate'];
                $point = $point > $rule['points_ordermax'] ? $rule['points_ordermax'] : $point;
                $inner['pl_points'] = $point;
                $new = $point + $user['member_points'];
                $inner['pl_desc'] = '用户购物';
                $inner['pl_stage'] = '用户购物';
                $inner['pl_stage_type'] = 4;
            }elseif($type == 5){
                $inner['pl_points'] = -$expense;
                $new = $user['member_points']-$expense;
                $inner['pl_desc'] = '用户消费抵扣';
                $inner['pl_stage'] = '用户消费抵扣';
                $inner['pl_stage_type'] = 5;
            }
            $this->CI->db->insert('shop_points_log',$inner);
            $this->CI->db->update('user',['member_points'=>$new],['user_id'=>$user_id]);
            return true;
        }
        return false;
    }
    
    /**
     * 经验基本操作
     * @param type $user_id     用户id
     * @param type $type        操作类型：1为登录，2为注册，3为评论，4为购物付款
     * @param type $expense     付款金额（只有类型为4时才需传入）
     */
    public function exp_operate($user_id,$type,$expense = NULL){
        $value = $this->CI->db->select('value')->where('code','exp_rule')->get('system_config')->row('value');
        if(!empty($value)){
            $rule = unserialize($value);
            $user = $this->CI->db->select('member_exppoints,user_name,member_login_time')->where('user_id',$user_id)->get('user')->row_array();
            $inner = ['exp_memberid'=>$user_id,'exp_membername'=>$user['user_name'],'exp_addtime'=>time()];
            if($type == 1){
                $timenow = date('Ymd');
                $timenext = date('Ymd',$user['member_login_time']);
                if($timenow == $timenext){
                    return true;
                }
                $inner['exp_points'] = $rule['exp_login'];
                $new = $rule['exp_login'] + $user['member_exppoints'];
                $inner['exp_desc'] = '用户登录';
                $inner['exp_stage'] = '用户登录';
            }elseif($type == 2){
                $inner['exp_points'] = $rule['exp_reg'];
                $new = $rule['exp_reg'] + $user['member_exppoints'];
                $inner['exp_desc'] = '用户注册';
                $inner['exp_stage'] = '用户注册';
            }elseif($type == 3){
                $inner['exp_points'] = $rule['exp_comments'];
                $new = $rule['exp_comments'] + $user['member_exppoints'];
                $inner['exp_desc'] = '用户评论';
                $inner['exp_stage'] = '用户评论';
            }elseif($type == 4){
                $point = $expense / $rule['exp_orderrate'];
                $point = $point > $rule['exp_ordermax'] ? $rule['points_ordermax'] : $point;
                $inner['exp_points'] = $point;
                $new = $point + $user['member_exppoints'];
                $inner['exp_desc'] = '用户购物';
                $inner['exp_stage'] = '用户购物';
            }
            $this->CI->db->insert('shop_exppoints_log',$inner);
            $this->CI->db->update('user',['member_exppoints'=>$new],['user_id'=>$user_id]);
            return true;
        }
        return false;
    }
    /**
     * 商品详情修改地区cookie
     * @param type $id    地区ID
     * @param type $name  地区名
     * @return boolen
     */
    public function set_area_cookie($id,$name){
        //print_r($id);exit;
        $id = explode(',',$id);
        $name = explode(',',$name);
        setcookie('jsw_province_id',$id[0],time()+3600*24,'/');
        setcookie('jsw_province_name',$name[0],time()+3600*24,'/');
        setcookie('jsw_city_id',$id[1],time()+3600*24,'/');
        setcookie('jsw_city_name',$name[1],time()+3600*24,'/');
        //print_r($_COOKIE);exit;
    }
    /**
     * 获取收货人地址等信息
     * @param type ua_id   
     * @return array
     */
    public function get_reciver_info($ua_id=''){
        $user_id = $_SESSION['user_id'];
        if($ua_id){
            $data = $this->CI->db->select('*')->from('user_address')->where('ua_id',$ua_id)->get()->row_array();
        }else{
            $data = $this->CI->db->select('*')->from('user_address')
            ->where('user_id',$user_id)->order_by('is_default,ua_id','DESC')->limit(5)->get()->result_array();
        }
        return $data;
    }
    /**
     * 获取用户优惠卷
     * @param  int $user_id   用户id
     */
    public function getUserCouponInfo($user_id=''){
         $user_id = isset($user_id)?$user_id:$_SESSION['user_id'];
         $coupon = $this->db->select('uc.*')->from('user_coupon as uc')
         ->join('shop_coupon as sc','sc.coupon_code=uc.coupon_code')
         ->where('user_id',$user_id)
         ->get()->result_array();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}

?>