<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('pay_model');
        $this->load->model ('goods_model');
        $this->load->model('mall_model');
        $this->load->model('order_model');
		$this->load->model('stores_model','store');
        $this->load->library('common_function');
    }


    /*****************************/
    /* 店铺装修 */

    /*店铺装修模版管理*/
    public function store_decoration_template(){
        $this->common_function->pay_role("seller_decoration");//权限
        $this->smarty->assign ('url', base_url ('pay.php/store/get_store_decoration_template'));
        $this->smarty->display ('store_decoration_template.html');
    }
    

    /*标签商品*/
    public function freetag_manage(){
        $this->smarty->display ('freetag_manage.html');
    }


    /*ajax 获取店铺装修模版列表*/
    public function get_store_decoration_template(){
        $this->common_function->pay_role("seller_decoration");//权限
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $start = ($page - 1) * $rp;
         
        $this->db->from ('store_decorate_tpl');
        $this->db->where ("(store_id = '0' or store_id=".$_SESSION['shop_spg_store_id'].")");
        $db = clone($this->db);
        $total = $this->db->count_all_results ();
        $this->db->select ('sdt_id,sdt_name,store_id');
        $this->db = $db;
        $this->db->limit ($rp, $start);
        $this->db->order_by ('sdt_id', 'DESC');
        $rows = $this->db->get ()->result_array ();
        //使用模块id
        $sdt_id = $this->db->select('sdt_id')->from('store')->where('store_id',$_SESSION['shop_spg_store_id'])->get()->row('sdt_id');
        $xml = '';
        $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
        $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
        $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
        if ($total == 0) {
            $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
            echo $xml;
            exit;
        }
        foreach($rows as $row){
            $xml .= "<tr data-id='".$row['sdt_id']."'>";
            $xml .= '<td  style="width:20%;text-align: center;" data-id="' . $row['sdt_id'] . '" ><input class="ml15" type="checkbox" value="' . $row['sdt_id'] . '" name="check"></td>';
            $xml .= "<td  style='width:30%;text-align: center;' > ";
            if($row['store_id']>0){
                $xml .="<a class='btn btn-danger radius' onclick='fg_delete(" . $row['sdt_id'] .",".json_encode($row['sdt_name']). ")'>删除</a>
                      <a class='btn btn-primary radius' onclick='fg_edit(" . $row['sdt_id'] . ")'>编辑</a>"; 
                
            }
            if($row['sdt_id']==$sdt_id  && $sdt_id>0){
                $xml .= "\n<a class='btn btn-default radius' href ='javascript:volid(0);'>已绑定</a>"; 
            }else{
                $xml .= "\n<a class='btn btn-success radius' onclick='use_template(" . $row['sdt_id'] . ")'>启用模板</a>";
            }
                
            $xml .="</td>";
            if($row['sdt_id']==$sdt_id  && $sdt_id>0){
                $xml .= "<td style='width:20%;text-align: center;'><span id='use" . $row['sdt_id'] ."'>是</span></td>";
            }else{
                $xml .= "<td style='width:20%;text-align: center;'><span id='use" . $row['sdt_id'] ."'>否</span></td>";
            }
            $xml .= "<td style='width:30%;text-align: center;'>".$row['sdt_name']."</td>";
            $xml .= "</tr>";
        }
        
        echo $xml;
        exit;
    
    }


    //启用模块
    public function use_decoration_template(){
        $this->common_function->pay_role("seller_bind_tpl");//权限
        $sdt_id = isset($_POST['sdt_id']) && !empty($_POST['sdt_id']) ?$_POST['sdt_id']:false;
        $result = array("state"=>false,'msg'=>'启用模板失败,请稍后再试!','ids'=>false);
        if(!$sdt_id){
            echo json_encode($result);exit();
        }
        //是否已经绑定模板
        $sdt_ids = $this->db->select('sdt_id')->from('store')->where('store_id',$_SESSION['shop_spg_store_id'])->get()->row('sdt_id');
        if($sdt_ids){
            $result['ids'] = $sdt_ids;
        }
        //更新模板
        if($this->db->update('store',array('sdt_id'=>$sdt_id),array ('store_id' => $_SESSION['shop_spg_store_id']))){
            $result['msg'] = "已启用该模板";
            $result['state'] = true;
        }
        echo json_encode($result);exit();
        
    }


    //解绑模块
    public function close_decoration_template(){
        $this->common_function->pay_role("seller_bind_tpl");//权限
        $sdt_id = isset($_POST['sdt_id']) && !empty($_POST['sdt_id']) ?$_POST['sdt_id']:false;
        $result=array("state"=>false,'msg'=>'解绑模板失败,请稍后再试!');
        if(!$sdt_id){
            echo json_encode($result);exit();
        }
        //更新模板
        if($this->db->update('store',array('sdt_id'=>0),array ('store_id' => $_SESSION['shop_spg_store_id']))){
            $result['msg'] = "已解绑该模板!";
            $result['state'] = true;
        }
        echo json_encode($result);exit();
    }


	/*删除自建装修模版*/
	public function store_decoration_del(){
        $this->common_function->pay_role("seller_del_tpl");//权限
	    $result=array("state"=>false,'msg'=>'模板删除失败,请稍后再试!');
	    $id = isset($_POST['id'])?trim($_POST['id']):'';
	    if(!$id){
	        echo json_encode($result);exit;
	    }
	    if(stripos($id,",")!==false){
	        $ids = explode(",",$id);
	    }else{
	        $ids = array($id);
	    }
	    if(isset($ids)){
    	    foreach ($ids as $k=>$v){
    	        $store_id = $this->db->select('store_id')->from('store_decorate_tpl')->where('sdt_id',$v)->get()->row('store_id');
    	        if($store_id<1){
    	            $result['msg'] = "亲,系统模板不能删除哦!";
    	            break;
    	            echo json_encode($result);exit;
    	        }
    	    }
	    }
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


	/*店铺装修模版-新增*/
	public function store_decoration_add(){
        //$this->common_function->pay_role("seller_add_tpl");//权限
        $storeInfo = $this->db->select('store_id,store_name,ous_logo,ous_ewm')->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row_array();
	    $this->smarty->assign ('storeInfo', $storeInfo);
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


	/*店铺装修模版-编辑*/
	public function store_decoration_edit(){
        //$this->common_function->pay_role("seller_add_tpl");//权限
	    $storeInfo = $this->db->select('store_id,store_name,ous_logo,ous_ewm')->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row_array();
	    $this->smarty->assign ('storeInfo', $storeInfo);
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
                                      <div class="shop_slider_img" style="height:'.$block_content[$key]['block_content']['height'].'px; background-image:url('.HEADIMAGE.$v['src'].')"></div>
                                    </a>';
	                    }
	                }
	                $str.='<div class="wx_mod sortable-item sortable-item m1001-d844" modtitle="图片轮播" modid="1001" id="m1001">
        	                    <div class="title" style="display: none;padding: 10px;">轮播广告</div>
                                <div class="bd">
                                    <div class="swiper-container" style="height: '.$block_content[$key]['block_content']['height'].'px;">
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
	                        if (!empty($row['goods_image'])) {
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


	//保存模板
	public function save_store_decorate_tpl ()
	{
        //$this->common_function->pay_role("seller_add_tpl");//权限
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
	    if(trim($data['m10'])=='Default'){
	        $result['msg']  = "Default模板只能由平台设置,商家端模板不能设置为系统默认模板！";
	        echo json_encode($result);exit();
	    }
	    //检测模板是否存在，不存在则创建
	    if($data['m1']){
	        $sdt_id = $data['m1'];
	        $this->db->update('store_decorate_tpl',array('sdt_name'=>$data['m10']),array ('sdt_id' => $sdt_id));//更新模板
	    }else{
	        $this->db->insert('store_decorate_tpl',array("sdt_name"=>$data['m10'],"store_id"=>$_SESSION['shop_spg_store_id']));//创建模板
	        $sdt_id = $this->db->insert_id();
	    }
	    $arr=array();$res="";
	
	    //检测 搜索 /店招  /店铺信息    模块是否存在,不存在则创建
	    if(isset($data['m1000'])){
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1000");
	        if($sdb_id){
	            $res = $this->db->update('store_decoration_block',array('block_sort'=>$data['m1000']['sortNum']),array ('sdb_id' => $sdb_id));//更新模板
	        }else{
	            $res = $this->db->insert('store_decoration_block',array("sdt_id"=>$sdt_id,"block_code"=>'m1000','block_sort'=>$data['m1000']['sortNum']));//创建模板
	        }
	    }else{
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1000");
	        if($sdb_id){
	            $this->db->where("sdb_id",$sdb_id);
	            $this->db->delete('store_decoration_block');
	        }
	    }
	    if(isset($data['m1011'])){
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1011");
	        if($sdb_id){
	            $res = $this->db->update('store_decoration_block',array('block_sort'=>$data['m1011']['sortNum']),array ('sdb_id' => $sdb_id));
	        }else{
	            $res = $this->db->insert('store_decoration_block',array("sdt_id"=>$sdt_id,"block_code"=>'m1011','block_sort'=>$data['m1011']['sortNum']));
	        }
	    }else{
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1011");
	        if($sdb_id){
	            $this->db->where("sdb_id",$sdb_id);
	            $this->db->delete('store_decoration_block');
	        }
	    }
	    if(isset($data['m1012'])){
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1012");
	        if($sdb_id){
	            $res = $this->db->update('store_decoration_block',array('block_sort'=>$data['m1012']['sortNum']),array ('sdb_id' => $sdb_id));
	        }else{
	            $res = $this->db->insert('store_decoration_block',array("sdt_id"=>$sdt_id,"block_code"=>'m1012','block_sort'=>$data['m1012']['sortNum']));
	        }
	    }else{
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1012");
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
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1001");
	        if($data['m1001']['content']){
	            foreach ($data['m1001']['content'] as $k=>$v){
	                if($v['select']>0){
	                    $data['m1001']['content'][$k]['href'] = $this->goods_model->get_href_by_block_code('m1001',$v['select']);
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
	            'height'=>  $data['m1001']['height'],
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
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1002");
	        if($data['m1002']['content']){
	            if($data['m1002']['content']['select'] >0){
	                $data['m1002']['content']['href'] = $this->goods_model->get_href_by_block_code('m1002',$data['m1002']['content']['select']);
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
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1003");
	        if($data['m1003']['content']){
	            foreach ($data['m1003']['content'] as $k=>$v){
	                if($v['select']>0){
	                    $data['m1003']['content'][$k]['href'] = $this->goods_model->get_href_by_block_code('m1003',$v['select']);
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
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1004");
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
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1005");
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
	     $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1006");
	     if($sdb_id){
	
	     }else{
	
	     }
	     } */
	
	
	    if(isset($data['m1007'])){ //检测 品牌导航    模块是否存在,不存在则创建
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1007");
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
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1008");
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
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1009");
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
	        $sdb_id = $this->goods_model->check_decoration_block($sdt_id,"m1010");
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
	                $sdb_id = $this->goods_model->check_decoration_block($sdt_id,$key);
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


	//删除模块
	public function del_store_decorate_tpl(){
        $this->common_function->pay_role("seller_del_tpl");//权限
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


	//店铺装修上传图片
	public function store_decoration_pic_onload(){
        $this->common_function->pay_role("seller_add_tpl");//权限
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
        $this->common_function->pay_role("seller_add_tpl");//权限
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
	    $this->db->order_by ('goods_id', 'DESC');
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
	        $result['pageinfo']=$this->goods_model->pagerows($page, $total, $rp);
	    }
	    echo json_encode($result);exit();
	}


	//获取所有商品品牌
	public function ajax_get_all_brands_list ()
	{
        $this->common_function->pay_role("seller_add_tpl");//权限
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
        $this->common_function->pay_role("seller_add_tpl");//权限
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


	public function printer_manage(){
	    $this->pay_model->storeInfo();
	   $this->smarty->display('store_printer_manage.html');     
	}


	public function pwd_update(){
	   $tel = $_SESSION['shop_spg_tel'];
	   $replace0 = substr($tel,0,3);
	   $replace = substr($tel,3,4);
	   $replace1 = substr($tel,7,4);
	   $retel = $replace0.'****'.$replace1;
	   $this->smarty->assign('retel',$retel);
	   $this->smarty->assign('tel',$tel);
	   $this->pay_model->storeInfo();
	   $this->smarty->display('store_pwd_update.html');     
	}


	public function send_captcha(){
	    $code = mt_rand(1000,9999);
	    $time = time();
	    $this->session->set_userdata(array('send_captcha'=>$code,'send_captcha_time'=>$time));
	    $overtime = '收银系统';
	    $data['phone'] = $_SESSION['shop_spg_tel'];
	    $template_sms_id = $this->db->select('template_sms_id')->where('template_code','shop_id_auth')->get('sms_templates')->row('template_sms_id');
	    $template_id = $this->db->select('template_id')->where('template_code','shop_id_auth')->get('sms_templates')->row('template_id');
	    $template_content = $this->db->select('template_content')->where('template_code','shop_id_auth')->get('sms_templates')->row('template_content');
	    $date = date('Y-m-d H:i:s');
	    $content = array('code'=>"{$code}",'product'=>"{$overtime}");
	    $data['content'] = json_encode($content);
	    $data['template_sms_id'] = 'SMS_62130005';
	    $result = array('state'=>false,'msg'=>'');
	    $send_user_ip = real_ip();
	    $resp = $this->common_function->AlidayuSms($data);
	    $template_content = str_replace('{$code}',$code,$template_content);
	    $template_content = str_replace('{$product}',$overtime,$template_content);
	    
	    if(isset($resp['result']['err_code'])&&$resp['result']['err_code']==0){
	        $flag = 1;
	        $result = array('state'=>true,'msg'=>'发送成功');
	    }else{
	        $flag = 0;
	        $result['msg'] = isset($resp['sub_msg'])?$resp['sub_msg']:$resp['msg'];
	    }
	    $sql = 'INSERT INTO ' . $this->db->dbprefix( 'sms_log' ) .
	    ' (send_sms_time,sms_template_id,send_user_id,send_user_ip,recevice_mobile,is_success,back_message,recevice_content) '
	        . " VALUES( '{$time}', $template_id, '{$_SESSION["shop_spg_id"]}', '{$send_user_ip}', '{$_SESSION["shop_spg_tel"]}', $flag, '{$result['msg']}', '{$template_content}')";
	        //print_r($result);die;
	        $this->db->query($sql);
	    echo json_encode($result);exit;
	}


	public function checkOld(){
	    
	    $pwd = isset($_POST['pwd'])?$_POST['pwd']:'';
        $oldpwd = $this->db->select('password')->where('spg_id',$_SESSION['shop_spg_id'])->get('store_shopping_guide')->row('password');
        if($oldpwd==encrypt_pwd($pwd)){
            echo json_encode(array('state'=>false));
        }else{
            echo json_encode(array('state'=>true));
        }
	}


	public function checkPwd(){
	    
	    $pwd = isset($_POST['pwd'])?$_POST['pwd']:'';
        $oldpwd = $this->db->select('password')->where('spg_id',$_SESSION['shop_spg_id'])->get('store_shopping_guide')->row('password');
        if($oldpwd==encrypt_pwd($pwd)){
            echo json_encode(array('state'=>true));
        }else{
            echo json_encode(array('state'=>false));
        }
	}


	public function modifyPwd(){
	    $phone = isset($_POST['tel'])?$_POST['tel']:'';
	    $oldpwd = isset($_POST['oldpwd'])?$_POST['oldpwd']:'';
	    $newpwd = isset($_POST['pwd'])?$_POST['pwd']:'';
	    $code = isset($_POST['code'])?$_POST['code']:'';
	    //print_r($code);exit;
	    $sess_code = isset($_SESSION['send_captcha'])?$_SESSION['send_captcha']:'';
	    $sess_time = isset($_SESSION['send_captcha_time'])?$_SESSION['send_captcha_time']:0;
	    
        if(empty($sess_code)){
            $value  = array('state'=>false,'msg'=>'请先发送短信获取验证码');
            echo json_encode($value);exit;
        }
        if($sess_time+120<time()){
            $value  = array('state'=>false,'msg'=>'请验证码已过期，请重新发送');
            echo json_encode($value);exit;
        }
        if(empty($code)){
            $value  = array('state'=>false,'msg'=>'验证码不能为空');
            echo json_encode($value);exit;
        }
        if($code!=$_SESSION['send_captcha']){
            $value  = array('state'=>false,'msg'=>'验证码错误');
            echo json_encode($value);exit;
        }
	    //print_r($newpwd);exit;
	    if(!empty($phone)){
	        $arr = array(
	            'spg_tel'=>$phone,'password'=>encrypt_pwd($newpwd)
	        );
	    }else{
	        $arr = array(
	            'password'=>encrypt_pwd($newpwd)
	        );
	    }
	    
	    $re = $this->db->update('store_shopping_guide',$arr,array('spg_id'=>$_SESSION['shop_spg_id']));
	    if($re){
	        $value = array('state'=>true,'msg'=>'');
	    }else{
	        $value = array('state'=>false,'msg'=>'修改失败');
	    }
	    echo json_encode($value);exit;
	}


    /*****************************/
    /* 导购管理 */

    /*导购离职*/
    public function del_guide(){
        $this->common_function->pay_role("seller_guide_del");//权限
        //$this->common_function->shop_admin_priv("store_shopping_guide");//权限
        $id = isset($_POST['id'])?trim($_POST['id']):'';
        $result = array('state'=>false,'msg'=>'数据错误');
        if($id){
            if($this->db->where("spg_id in (".$id.")")->update('store_shopping_guide',array('spg_store_id'=>''))){
                //$this->common_function->shop_admin_log('导购’'.$id.'‘' ,'edit', '门店导购');
                $result = array('state'=>true,'msg'=>'离职成功');
            }else{
                $result = array('state'=>false,'msg'=>'离职失败，请稍后重试!');
            }
        }
        echo json_encode($result);exit;
        //print_r($_POST);exit;
    }


    /*导购管理*/
    public function store_shopping_guide(){
        $this->common_function->pay_role("seller_guides");//权限
        $roles = $this->db->select('role_id,role_name')->get('platform_roles')->result_array();
        $roles_str = '';
        if($roles){
            foreach ($roles as $k=>$v){
                $roles_str .= "<option value=".$v['role_id']." >".$v['role_name']."</option>";
            }
        }
        $this->smarty->assign('roles_str',$roles_str);
        $this->smarty->assign ('url', base_url ('pay.php/store/get_store_shopping_guide'));
        $this->smarty->display ('store_shopping_guide.html');
    }


    /*导购列表*/
    public function get_store_shopping_guide(){
        $this->common_function->pay_role("seller_guides");//权限
        $default_pic = TEMPLE.'images/default_goods_image_240.gif';
        $op = isset($_GET['op'])?trim($_GET['op']):'';
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = "spg_store_id = '{$_SESSION['shop_spg_store_id']}'";
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

        //得到账号上面的角色id对应的角色名称
        $roles = $this->db->select('role_id,role_name')->get('platform_roles')->result_array();
        $roles_type = array();
        if($roles){
            foreach ($roles as $key=>$val){
                $roles_type[$val['role_id']] = $val['role_name'];
            }
        }

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
        $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
        $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
        foreach($rows as $row){
            $xml .= "<tr data-id='".$row['spg_id']."' id='".$row['spg_id']."'>";
            $check_role = $this->db->select('spg_id')->where('spg_store_id',$row['spg_store_id'])->where('role_type',2)->get('store_shopping_guide')->row('spg_id');
            $check_role = empty($check_role)?0:$check_role;
            //$xml .= "<td>".$row['spg_id']."</td>";
            $head_portrait = base_url($row['head_portrait']);
            if(!empty($row['head_portrait'])&&file_exists(ROOTPATH.$row['head_portrait'])){
                $head_portrait = base_url($row['head_portrait']);
            }else{
                $head_portrait = $default_pic;
            }
            $xml .= '<td data-id="' . $row['spg_id'] . '" ><input class="ml15" type="checkbox" value="' . $row['spg_id'] . '" name="check"></td>';
            $xml .= "<td><img src=\"".$head_portrait.'" class="user-avatar"'.
                ' onerror="this.src=\''.$head_portrait.'\'" style="border-radius:50%;height:20px;"'.
                ' data-geo="<img src=\''.$head_portrait.'\' width=300px >">'.
                $row['spg_nike_name']."</td>";
            $xml .= "<td>".$row['spg_name']."</td>";
            $xml .= "<td>".$row['spg_tel']."</td>";
            $role_type = !empty($roles_type)?$roles_type[$row['role_type']]:'--';
            $xml .= "<td>".$role_type."</td>";
            $xml .= "<td>".$row['store_name']."</td>";

            $xml .= "<td>";
            $xml .= "<a class='btn btn-primary radius' onclick=fg_edit(". $row['spg_id'] .")>编辑</a>
                     <a class='btn btn-secondary radius' onclick=update_role(". $row['spg_id'].",".$check_role.",".$row['role_type'].",'".$row['spg_name'] ."')>职位变更</a>
                     <a class='btn btn-success radius' onclick=create_shot_code(". $row['spg_id'] .")>下载二维码</a>";
            $xml .= "\n<a class='btn btn-danger radius' onclick=fg_delete(" .$row['spg_id'] .",'" .$row['spg_name']."')>
                    离职</a></td>";
            $xml .= "</tr>";

        }
        echo $xml;
    }


    /*导购编辑*/
    public function store_shopping_guide_edit(){
        $this->common_function->pay_role("seller_guide_edit");//权限
        $id = isset($_GET['id'])?trim($_GET['id']):'';
        if($id){
            $data = $this->db->select('*')->where('spg_id',$id)->get('store_shopping_guide')->row_array();
            $data['birth'] = $data['birth_y'].'-'.sprintf("%02d",$data['birth_m']).'-'.sprintf("%02d",$data['birth_d']);
            $this->smarty->assign('data',$data);
        }
        $store = $this->db->select('store_id,store_name')->get('store')->result_array();
        $this->smarty->assign('store',$store);
        $roles = $this->db->select('role_id,role_name')->get('platform_roles')->result_array();
        $this->smarty->assign('roles',$roles);
        $this->smarty->assign('store_id',$_SESSION['shop_spg_store_id']);
        $this->smarty->display ('store_shopping_guide_edit.html');
    }


    //导购更新
    public function update_role(){
        $this->common_function->pay_role("seller_guide_edit");//权限
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


    /*导购检查电话*/
    public function check_guideTel(){
        $this->common_function->pay_role("seller_guide_add");//权限
        $id = isset($_POST['id'])?trim($_POST['id']):'';
        $store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'0';
        $tel = isset($_POST['tel'])?trim($_POST['tel']):'';
        $result = array('state'=>false,'msg'=>'');
        if($tel){
            $rows = $this->db->select('spg_store_id,spg_id')->from('store_shopping_guide')->where('spg_tel',$tel)->get()->row_array();
            if($rows){
                if($rows['spg_store_id'] != $store_id){
                    $store_name = $this->db->select('store_name')->where('store_id',$rows['spg_store_id'])->get('store')->row('store_name');
                    $result['state'] = true;
                    $result['msg'] = '该导购已存在,位置:'.$store_name.',请先办理离职!';
                }
            //                else if($rows['spg_id'] != $id){
            //                    $result['state'] = true;
            //                    $result['msg'] = '该手机号已被其他导购绑定!';
            //                }
            }
        }
        echo json_encode($result);exit;
    }


    /*导购编辑，添加*/
    public function store_guide_add(){
        $this->common_function->pay_role("seller_guide_add");//权限
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
        $spg['reg_time'] = time();

        if($spg['spg_store_id'] && $spg['spg_store_id']==$_SESSION['shop_spg_store_id']){
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
                    if($rows['spg_store_id']){
                        $store_name = $this->db->select('store_name')->where('store_id',$rows['spg_store_id'])->get('store')->row('store_name');
                        $this->common_function->show_message('该导购已存在,位置:'.$store_name.',请先办理离职!');
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
            $this->common_function->show_message($operate.'成功',0 ,$links);

        }else{
            $this->common_function->show_message('操作失败！');
        }
    }




    /*****************************/
    /* 商品管理 */

    public function goods_management ()
    {
        $this->common_function->pay_role("seller_goods");//权限
        if (isset($_GET['op']) && $_GET['op'] == 'shop_goods') {    //门店自建
            $brands = $this->goods_model->get_brands_by_class ();
            $this->smarty->assign ('brands', $brands);
            $this->smarty->assign ('url', base_url ('pay.php/store/get_shop_goods_list'));
            $this->smarty->display ('goods_management_shop_goods.html');
        } elseif (isset($_GET['op']) && $_GET['op'] == 'trash') {    //回收站
            $brands = $this->goods_model->get_brands_by_class ();
            $this->smarty->assign ('brands', $brands);
            $this->smarty->assign ('url', base_url ('pay.php/store/get_trash_list'));
            $this->smarty->display ('goods_management_trash.html');
        } else {
            $brands = $this->goods_model->get_brands_by_class ();
            //            $cate_arr = $this->goods_model->get_cate_by_parent_id(0);
            //            $cate_option = $this->goods_model->cate_array_to_option($cate_arr, 0);//分类选项
            //            $this->smarty->assign('cate_option',$cate_option);
            $this->smarty->assign ('brands', $brands);
             $this->smarty->assign ('url', base_url ('pay.php/store/get_all_goods_list'));
            $this->smarty->display ('goods_management_all.html');     //总库商品
        }
    }


    //总库商品
    public function get_all_goods_list ()
    {
        $this->common_function->pay_role("seller_goods");//权限
        $page   = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp     = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype  = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query  = isset($_POST['query']) ? $_POST['query'] : false;

        $start = ($page - 1) * $rp;

        $this->db->from('shop_goods sg');
        if (isset($_GET['brand_id']) && !empty($_GET['brand_id'])) {
            $this->db->where ('sg.brand_id', $_GET['brand_id']);
        }
        if (isset($_GET['gc_id']) && !empty($_GET['gc_id'])) {
            $where = "(sg.gc_id1 = {$_GET['gc_id']} or sg.gc_id2 = {$_GET['gc_id']} or sg.gc_id3 = {$_GET['gc_id']} or sg.gc_id = {$_GET['gc_id']})";
            $this->db->where ($where);
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

        //店铺的总库商品
        $this->db->join('store_attr_brands sab','sab.brand_id = sg.brand_id', 'left')
            ->join('store_stocks_amount ssa','ssa.goods_id = sg.goods_id', 'left')
            ->where('ssa.ssa_store_id', $_SESSION['shop_spg_store_id'])
            ->where('sab.store_id', $_SESSION['shop_spg_store_id']);
        $this->db->distinct()->select('sg.goods_id');
        $this->db->where ("sg.goods_state != 0"); //未删除的

        $db = clone($this->db);
        //查询到的总数
        $total = $this->db->get()->num_rows();

        $default_pic = PLUGIN . 'data/images/' . $this->common_function->get_system_value ('default_goods_image');
        header ("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $goods_tag_arr = array ('' => '--', '1' => '拼团', '2' => '秒杀', '3' => '特卖');
        $xml = '';
        $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
        $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
        $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
        if ($total == 0) {
            $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
            echo $xml;
            exit;
        }
        $this->db = $db;
        $this->db->distinct()->select('ssa.goods_id');
        $this->db->limit ($rp, $start);
        $this->db->order_by ('sg.goods_id', 'DESC');
        $goods = $this->db->get ()->result_array ();
        $goods_id = [];
        foreach ($goods as $g){
            $goods_id[] = $g['goods_id'];
        }
        $this->db->from('shop_goods sg');
        $this->db->select ('sg.goods_id,sg.year_to_market,sg.season_to_market,sg.sex,sg.goods_name,sg.goods_price,sg.goods_state,sg.goods_image,sg.goods_jingle,sg.gc_id,sg.brand_id,sg.goods_addtime,sg.goods_marketprice,sg.goods_tag,sg.goods_spu');
        $this->db->where_in('sg.goods_id', $goods_id);
        $rows = $this->db->get ()->result_array();

        foreach ($rows as $row) {
            $amount = $this->db->select ("SUM(amount) as amount")->from ('store_stocks_amount')->where ('goods_id', $row['goods_id'])->where('ssa_store_id',$_SESSION['shop_spg_store_id'])->get ()->row ('amount');
            //价格
            $stocks_price = $this->db->select ("stocks_price")->from ('store_stocks_amount')->where ('goods_id', $row['goods_id'])->get ()->row ('stocks_price');
            $goods_pic = PLUGIN . 'data/shop/album_pic/' . $row['goods_image'];
            if (!empty($row['goods_image'])) {
                $goods_pic = GOODIMAGE . $row['goods_image'];
            } else {
                $goods_pic = $default_pic;
            }
            $goods_info = '<i class="fa fa-photo" style="margin-bottom:5px" aria-hidden="true" data-geo="<img src=\'' . $goods_pic . '\'>"></i><span style="display: inline-block;max-width: 175px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height: 11px;">' . $row['goods_name'] . '</span>';
            if (!empty($row['goods_spu'])) {
                $goods_info .= '<br><span>款号:</span><span>' . $row['goods_spu'] . '</span>';
            }
            if (!empty($row['goods_tag'])) {
                $goods_info .= '&nbsp;<span class="red"><b>' . $goods_tag_arr[$row['goods_tag']] . '</b></span>';
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
                $row['sex'] = "通用";
            } elseif ($row['sex'] == 1) {
                $row['sex'] = "女装";
            } elseif ($row['sex'] == 2) {
                $row['sex'] = "男装";
            } else {
                $row['sex'] = "";
            }
            $goods_info .= '';
            $xml .= "<tr id='row" . $row['goods_id'] . "' data-id='" . $row['goods_id'] . "'>";
            $xml .= '<td data-id="' . $row['goods_id'] . '" ><input class="ml15" type="checkbox" value="' . $row['goods_id'] . '" name="check"></td>';
            $xml .= "<td><span title='{$row['goods_name']}'>" . $goods_info . "</span></td>";
            $xml .= "<td>￥：" . $stocks_price . "</td>";
            $xml .= "<td>￥：" . $row['goods_marketprice'] . "</td>";
            $xml .= "<td>" . 0 . "</td>";
            $xml .= "<td>" . $amount . "</td>";
            $xml .= "<td>" . $row['year_to_market'] . "</td>";
            $xml .= "<td>" . $row['season_to_market'] . "</td>";
            $xml .= "<td>" . $row['sex'] . "</td>";
            $xml .= "<td>" . date ('Y-m-d H:i:s', $row['goods_addtime']) . "</td>";
            //操作
            $xml .= "<td class='text-c'>";
            $xml .= "\n<a class='btn btn-danger size-S radius' onclick=fg_delete({$row['goods_id']})>删除</a>";
            // $xml .= "\n<a class='btn btn-primary size-S radius' onclick=fg_set_tag({$row['goods_id']},1)>设为拼团</a>";
            // $xml .= "\n<a class='btn btn-primary size-S radius' onclick=fg_set_tag({$row['goods_id']},2)>设为秒杀</a>";
            // $xml .= "\n<a class='btn btn-primary size-S radius' onclick=fg_set_tag({$row['goods_id']},3)>设为特卖</a>";
            $xml .= "\n<a class='btn btn-warning size-S radius' onclick=fg_cancel_tags({$row['goods_id']})>取消标签</a></td>";
            $xml .= "</tr>";
     
        }
        echo $xml;
        exit;
    }


    //删除
    public function delete_store_goods ()
    {
        $this->common_function->pay_role("seller_del_good");//权限
        $data = array('state' => false, 'msg' => "操作失败,请重试!");
        $goods_id = isset($_GET['goods_id'])?$_GET['goods_id']:false;
        $goods_id = explode (',', $goods_id);
        if ($goods_id) {
            $result = $this->db->where_in('goods_id', $goods_id)->where('ssa_store_id', $_SESSION['shop_spg_store_id'])->delete('store_stocks_amount');
            $data = array('state' => true, 'msg' => "删除成功!");
        }
        echo json_encode($data);
        exit;
    }


    //门店自建
    public function get_shop_goods_list ()
    {
        $this->common_function->pay_role("seller_goods");//权限
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;
        $start = ($page - 1) * $rp;

        $this->db->distinct()->select ("sg.goods_salenum,sg.goods_id,sg.goods_name,sg.goods_pos,sg.goods_marketprice,sg.goods_price,sg.goods_state,sg.goods_image,sg.goods_jingle,sg.gc_id,sg.brand_id,sg.goods_addtime,sg.goods_tag,sg.goods_spu,sg.gc_name,sg.brand_name");
        $this->db->from ('shop_goods as sg');//
        //$this->db->join ('store_stocks_amount as sta', 'sg.goods_id = sta.goods_id', 'left');
        //$this->db->join ('shop_goods_class as sgc', 'sgc.gc_id = sg.gc_id', 'left');
        //$this->db->join ('shop_brand as sb', 'sb.brand_id = sg.brand_id', 'left');
        if (isset($_GET['brand_id']) && !empty($_GET['brand_id'])) {
            $this->db->where ('sg.brand_id', $_GET['brand_id']);
        }
        if (isset($_GET['gc_id']) && !empty($_GET['gc_id'])) {
            $this->db->where ('sg.gc_id', $_GET['gc_id']);
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


        $this->db->where ("sg.goods_pos", $_SESSION['shop_spg_store_id']); //自建商品
        $this->db->where ("sg.goods_state != 0"); //未删除的

        $db = clone($this->db);
        $total = $this->db->count_all_results ();
        
        
        //print_r($total );die;exit;
        //print_r($this->db->last_query());die;

        header ("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $goods_tag_arr = array ('' => '--', '1' => '拼团', '2' => '秒杀', '3' => '特卖');
        $xml .= '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
        $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
        $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
        if ($total == 0) {
            $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的商品</li></td></tr></tbody>';
            echo $xml;
            exit;
        }
        $this->db = $db;
        $this->db->limit ($rp, $start);
        $this->db->order_by ('goods_id', 'DESC');
        $rows = $this->db->get ()->result_array ();

        foreach ($rows as $row) {
            $val = $this->db->select ("SUM(uec_amount) as amount,min(stocks_price) as stocks_price")->from ('store_stocks_amount')->where ('goods_id', $row['goods_id'])->where ('ssa_store_id', $_SESSION['shop_spg_store_id'])->get ()->result_array ();

            if(empty($row['goods_salenum'])){
                $row['goods_salenum'] = 0;
            }

            if(preg_match('/(http:\/\/)|(https:\/\/)/i', $row['goods_image'])){
            	$goods_pic = $row['goods_image'];
            }else{
            	$goods_pic = PLUGIN . 'data/shop/album_pic/' . $row['goods_image'];
            }
            $goods_info = '<i class="fa fa-photo" style="margin-bottom:5px" aria-hidden="true" data-geo="<img src=\'' . $goods_pic . '\'>"></i><span style="display: inline-block;max-width: 225px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height: 11px;" title="' . $row['goods_name'] . '">' . $row['goods_name'] . '</span>';
            if (!empty($row['goods_spu'])) {
                $goods_info .= '<br><span>款号:</span><span>' . $row['goods_spu'] . '</span>';
            }
            if (!empty($row['goods_tag'])) {
                $goods_info .= '&nbsp;<span class="red"><b>' . $goods_tag_arr[$row['goods_tag']] . '</b></span>';
            }
            $goods_info .= '';
            $xml .= "<tr id='row" . $row['goods_id'] . "' data-id='" . $row['goods_id'] . "'>";
            $xml .= '<td  data-id="' . $row['goods_id'] . '" ><input class="ml15" type="checkbox" value="' . $row['goods_id'] . '" name="check"></td>';
            $xml .= "<td style='min-width:200px'  class='goodtitlename'>" . $goods_info . "</td>";
            $xml .= "<td class='text-c'>￥：" . $val[0]['stocks_price'] . "</td>";
            $xml .= "<td class='text-c'>￥：" . $row['goods_marketprice'] . "</td>";
            $xml .= "<td class='text-c'>" . $row['goods_salenum'] . "</td>";
            $xml .= "<td class='text-c'>" . $row['brand_name'] . "</td>";
            $xml .= "<td class='text-c'>" . $val[0]['amount'] . "</td>";
            $xml .= "<td class='text-c'>" . date ('Y-m-d H:i:s', $row['goods_addtime']) . "</td>";
            $xml .= "<td class='text-c'>";
            $xml .= "\n<a class='btn btn-success size-S radius' onclick=fg_edit_attr({$row['goods_id']})>编辑</a>";
            $xml .= "\n<a class='btn btn-warning size-S radius' onclick=fg_cancel_tags({$row['goods_id']})>取消标签</a>";
            $xml .= "\n<a class='btn btn-primary size-S radius' onclick=fg_set_tag({$row['goods_id']},1)>设为拼团</a>";
            $xml .= "\n<a class='btn btn-primary size-S radius' onclick=fg_set_tag({$row['goods_id']},2)>设为秒杀</a>";
            $xml .= "\n<a class='btn btn-primary size-S radius' onclick=fg_set_tag({$row['goods_id']},3)>设为特卖</a>";
           
            $xml .= "\n<a class='btn btn-danger size-S radius' class='btn red' onclick=fg_delete({$row['goods_id']})>删除</a></td>";
            $xml .= "\n</tr>";
        }
        echo $xml;
        exit;
    }


    //回收站
    public function get_trash_list ()
    {
        $this->common_function->pay_role("seller_goods");//权限
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 150;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;

        $start = ($page - 1) * $rp;
        $this->db->select ('sg.goods_id,sg.goods_name,sg.goods_price,sg.goods_state,sg.goods_image,sg.goods_jingle,sg.gc_id,sg.brand_id,sg.goods_marketprice,sg.goods_addtime,sg.goods_pos,sg.goods_tag,sg.goods_spu,sgc.gc_name,sb.brand_name,');
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
        if (isset($_GET['brand_id']) && !empty($_GET['brand_id'])) {
            $this->db->where ('sg.brand_id', $_GET['brand_id']);
        }
        if (isset($_GET['gc_id']) && !empty($_GET['gc_id'])) {
            $this->db->where ('sg.gc_id', $_GET['gc_id']);
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

        //商品有无图片
        if (isset($_GET['goods_image']) && !empty($_GET['goods_image'])) {
            if($_GET['goods_image']==1){
                $this->db->where("sg.goods_image is not null and sg.goods_image!=''");
            }elseif($_GET['goods_image']==2){
                $this->db->where("sg.goods_image is null");
            }
        }

        $this->db->where ("sg.goods_state = 0 and sg.goods_pos = {$_SESSION['shop_spg_store_id']}"); //未删除的
        $db = clone($this->db);
        $total = $this->db->count_all_results ();


        header ("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $goods_tag_arr = array ('' => '--', '1' => '新品', '2' => '推荐', '3' => '特价');
        if ($total == 0) {
            $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的商品</li></td></tr></tbody>';
            echo $xml;
            exit;
        }
        $this->db = $db;
        $this->db->limit ($rp, $start);
        $this->db->order_by ('goods_id', 'DESC');
        $rows = $this->db->get ()->result_array ();
        foreach ($rows as $row) {
            $store = $this->db->select ('store_name')->where ('store_id', $row['goods_pos'])->get ('jk_store')->row ('store_name');
            $order_goods = $this->db->select ('goods_num')->where ('goods_id', $row['goods_id'])->get ('jk_shop_order_goods')->result_array ();
            $num = 0;
            foreach ($order_goods as $v) {
                $num += $v['goods_num'];
            }

            $goods_pic = PLUGIN . 'data/shop/album_pic/' . $row['goods_image'];
            $goods_info = '<i class="fa fa-photo" style="margin-bottom:5px" aria-hidden="true" data-geo="<img src=\'' . $goods_pic . '\'>"></i><span style="display: inline-block;max-width: 175px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;line-height: 11px;">' . $row['goods_name'] . '</span>';
            if (!empty($row['goods_spu'])) {
                $goods_info .= '<br><span>款号:</span><span>' . $row['goods_spu'] . '</span>';
            }
            if (!empty($row['goods_tag'])) {
                $goods_info .= '&nbsp;<span class="new_goods">' . $goods_tag_arr[$row['goods_tag']] . '</span>';
            }
            $goods_info .= '';
            $xml .= "<tr id='row" . $row['goods_id'] . "' data-id='" . $row['goods_id'] . "'>";
            $xml .= '<td data-id="' . $row['goods_id'] . '" ><input class="ml15" type="checkbox" value="' . $row['goods_id'] . '" name="check"></td>';
            $xml .= "<td style='min-width:200px' class='goodtitlename'>" . $goods_info . "</td>";
            $xml .= "<td>" . $num . "</td>";
            $xml .= "<td>" . $row['brand_name'] . "</td>";
            $xml .= "<td>" . date ('Y-m-d H:i:s', $row['goods_addtime']) . "</td>";
            $xml .= "<td>";
            $xml .= "<a class='btn btn-primary radius size-S' onclick=fg_edit({$row['goods_id']})>编辑</a>";
            $xml .= "<a class='btn btn-success radius size-S' onclick=fg_restore({$row['goods_id']})>还原</a>";
            $xml .= "<a class=' btn btn-danger radius size-S' onclick=fg_completely_delete({$row['goods_id']})>删除</a></td>";
            $xml .= "</tr>";
        }
        echo $xml;
        exit;
    }


    //    /* 商品管理——添加商品——第一步 */
    public function goods_add_goods ()
    {
        $this->common_function->pay_role("seller_add_good");//权限
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
        $this->common_function->pay_role("seller_add_good");//权限
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
            $this->smarty->assign ('type_id', $curr_class_info['type_id']);
            $this->smarty->assign ('class_id', $class_id);
            $this->smarty->assign ('class_name', $curr_class_info['gc_name']);
            $this->smarty->assign ('size_types', $size_types);
            $this->smarty->assign ('sizes_types', $size_arr);
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




    //商品信息正则
    public function goods_pic($goods_pic,$goods_id){
        if(!($goods_pic && $goods_id)){
            return false;
        }
        
        $rules = '/yunjuke\/data\/shop\/album_pic/';
        
        if(preg_match($rules,$goods_pic)){
            return $goods_pic;
        }
        
        $rule = '#[a-zA-z]+://[^\s"]*\.[jpg|gif|png]{1,3}#';
        $pic_desc_url = array();
        $pic_info_all = array();
        $pic_info_local = "";
        
        //匹配正则表达式，获得图片地址
        if(preg_match_all($rule,$goods_pic,$pic_desc_url)){
            //获得图片信息，包括大小，类型等等
            foreach ($pic_desc_url[0] as $key => $value) {
                $pic_info_all[$key] = getimagesize("{$value}");
                //print_r($pic_info_all[$key][0]);
                //var_dump($pic_info_all[$key]['mime']);die;
                //print_r($pic_info_all);die;
                    
                //判断图片大小，获得所需图片
                //$pic_info_all[$key][0]即是图片的宽度
                if($pic_info_all[$key][0]>650){
                    //print_r($pic_desc_url);die;
                        
                    //获取图片后缀
                    $pic_desc_types = explode("/",$pic_info_all[$key]['mime']);
                    $pic_desc_type = $pic_desc_types[count($pic_desc_types)-1];
                    //print_r($pic_desc_type);
                    //print_r($pic_desc_types);
                        
                    //获得8位随机字母
                    $char = "";
                    for($i = 1;$i<=4;$i++){
                        $char .= chr(rand(65,90));
                        $char .= chr(rand(97,122));
                    }   
                    $char = str_shuffle($char);
                    //echo $char;die;

                    //图片重命名
                    $pic_name = $this->common_function->get_msectime().date("His").$char.$pic_desc_type;
                    //print_r($pic_name);die;
                    
                    
                    
                    $savePath = ROOTPATH . 'data/shop/album_pic/'; // 设置上传路径
                    $dataPath = date("Y")."/".date("m")."/".date("d")."/";
                    if (!is_dir($savePath.date("Y"))){
                        mkdir($savePath.date("Y"),0777,true);
                    }
                    if(!is_dir($savePath.date("Y")."/".date("m"))){
                        mkdir($savePath.date("Y")."/".date("m"),0777,true);
                    }
                    if(!is_dir($savePath.date("Y")."/".date("m")."/".date("d"))){
                        mkdir($savePath.date("Y")."/".date("m")."/".date("d"),0777,true);
                    }
                    
                    
                    //图片保存路径
                    $pic_desc_path = $savePath.$dataPath.$pic_name;
                    
                    // $pic_save_url = base_url('/data/shop/album_pic/'.$pic_name);
                    // echo $pic_save_url;die;
                    
                    //图片下载
                    //print_r($pic_desc_url[0][$key]);
                    $k = copy($pic_desc_url[0][$key],$pic_desc_path);
                    $this->db->insert('shop_goods_images',array('goods_id'=>$goods_id,'color_id'=>0,'goods_image_sort'=>250,'is_default'=>0,'goods_image'=>$dataPath.$pic_name));
                    if($k){
                        $pic_save_url = base_url('/data/shop/album_pic/'.$dataPath.$pic_name);
                        $pic_info_local .= "<img style='width:750px;' src='{$pic_save_url}'>" ;
                    }
                } 
            }//die;
            //print_r($pic_info_all);die;
            //print_r($pic_info_local);die;        
        }
        
        return $pic_info_local;
    }


    /* 商品管理——编辑——第二步 */
    public function goods_edit_goods_second ()
    {
        $this->common_function->pay_role("seller_add_good");//权限
        $goods_id = isset($_GET['goods_id']) ? $_GET['goods_id'] : false;
        define ('COLOR_ID', '1');   //颜色规格的ID
        if ($goods_id) {
            //商品的信息
            //$goods_info = $this->db->select ('sg.year_to_market,sg.season_to_market,sg.sex,sg.goods_id,sg.gc_id,sg.gc_name,sg.goods_name,sg.goods_jingle,sg.brand_id,sg.goods_price,sg.goods_marketprice,sg.discount,sg.goods_spec,sg.goods_image,sg.goods_state,sg.pc_desc,sg.mobile_desc,sg.color_id,sg.goods_addtime,sg.goods_spu,sg.logistics_type,sg.limit_num,sg.available_coupons,sg.available_member_dis,sg.goods_tag,sb.brand_name,sg.weight')->from ('shop_goods as sg')->join ('shop_brand as sb', 'sg.brand_id=sb.brand_id', 'left')->where ('sg.goods_id', $goods_id)->get ()->row_array ();
            $goods_info =
            $this->db->select ('sg.year_to_market,sg.season_to_market,sg.sex,sg.goods_id,sg.gc_id,sg.gc_name,sg.goods_name,sg.goods_jingle,sg.brand_id,sg.brand_name,sg.goods_price,sg.goods_marketprice,sg.discount,sg.goods_spec,sg.goods_image,sg.goods_state,sg.pc_desc,sg.mobile_desc,sg.color_id,sg.goods_addtime,sg.goods_spu,sg.logistics_type,sg.limit_num,sg.available_coupons,sg.available_member_dis,sg.goods_tag,sg.weight')
            ->from ('shop_goods as sg')
            ->where ('sg.goods_id', $goods_id)
            ->get ()->row_array ();
            
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
            
            
            $goods_class_size =
            $this->db->select ('gc_id,gc_name,gc_size')
            ->from ('shop_goods_class')
            ->where ('gc_id', $goods_info['gc_id'])
            ->get ()->row_array ();
            if($goods_class_size['gc_size']){
                $goods_class_size = unserialize($goods_class_size['gc_size']);
            }else{
                $goods_class_size = array();
            }
            $goods_classSize = array();
            if($goods_class_size){
                foreach ($goods_class_size as $ks=>$vl){
                    $goods_classSize[$vl] =$vl;
                }
            }
            
            $this->db->select ('css.size,css.flag')->from ('code_segment_size css');
            if( $goods_info['brand_id']){
                $this->db->join ('shop_brand b', 'b.brand_size_type=css.flag');
                $this->db->where ('b.brand_id', $goods_info['brand_id']);
            }
            $sizes =$this->db->order_by ('css.size')->get ()->result_array ();
            
            if (!empty($sizes)) {
                $flag_arr = array ('1' => '中国码', '2' => '美国码', '3' => '英国码', '4' => '日本码');
                foreach ($sizes as $k => $v) {
                    if($goods_classSize  && isset($goods_classSize[$v['size']])){
                        continue;
                    }else{
                        $size_arr[$v['flag']]['size_list'][] = $v;
                    }
                }
            }
            
            if (!empty($curr_class_info['type_id'])) {
                $brands = $this->db->select ('sb.brand_id,sb.brand_name,sb.brand_initial')->from ('shop_brand as sb')->join ('shop_type_brand as stb', 'sb.brand_id=stb.brand_id', 'left')->order_by ('sb.brand_initial')->where ('stb.type_id', $curr_class_info['type_id'])->where ("sb.brand_name is not NULL AND sb.brand_name != ''")->where ("sb.is_true != '1'")->group_by ('sb.brand_id')->get ()->result_array (); //品牌信息
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
            $goods_extend_attr_info = $this->db->select ('gea.goods_ea_id,gea.goods_a_id,gea.goods_id,gea.color,gea.color_value,
                gea.color_remark,gea.size,gea.stocks_price,gea.stocks_marketprice,gea.stocks_sku,gea.stocks_bar_code,gea.size_note,
                ')->from ('shop_goods_extend_attr as gea')->where ('gea.goods_id', $goods_id)->order_by ('gea.goods_ea_id')->get ()->result_array ();
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
            if (!empty($goods_info['goods_image'])) {
            	if(preg_match('/(http:\/\/)|(https:\/\/)/i', $goods_info['goods_image'])){
            		$goods_info['img_url'] =  $goods_info['goods_image'];
            	}else{
            		$goods_info['img_url'] = GOODIMAGE . $goods_info['goods_image'];
            	}
                
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
            
            

            
              $this->db->distinct()->select ('size')->from ('shop_goods_extend_attr');
             $this->db->where ('goods_id', $goods_id);
             $goods_sizes =$this->db->order_by ('goods_ea_id')->get ()->result_array (); 
             if($goods_sizes){
                 foreach($goods_sizes as $key=>$val){
                     $goods_sizes[$key] = $val['size'];
                 }
             }
            //print_r($sizesinfo);exit;
            
           // print_r($goods_extend_attr_info);exit;
             if (!empty($goods_extend_attr_info)) {
                foreach ($goods_extend_attr_info as $v) {
                    if ($v['size'] == '') {
                        $empty_size = $this->db->select ('size')->where ('goods_id', $v['goods_id'])->where ("size is not null and size !=''")->group_by ('size')->get ('shop_goods_extend_attr')->result_array ();
                        //print_r($empty_size);die;
                        $kvi = 1;
                        foreach ($empty_size as $kev => $vev) {
                            if ($kvi > 1) {
                                $v['goods_ea_id'] = '';
                            }
                            $v['size'] = $vev['size'];
                            $goods_extend_attr_arr[$v['goods_a_id']][] = $v;
                            $goods_sizes[] = $vev['size'];
                            $kvi++;
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
            //print_r($goods_extend_arr);print_r($size_arr);print_r($goods_sizes);die;
            $this->smarty->display ('goods_edit_goods_second.html');
        }
    }


    //添加商品货号检测
    public function checkStockCode ()
    {
        $this->common_function->pay_role("seller_add_good");//权限
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
        $this->common_function->pay_role("seller_add_good");//权限
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


    /* 商品管理——添加商品——第三步 */
    public function goods_add_goods_third ()
    {
        $this->common_function->pay_role("seller_add_good");//权限
        if (stripos ($_POST['base_info']['goods_name'], "'")) {
            $_POST['base_info']['goods_name'] = str_replace ("'", "’", $_POST['base_info']['goods_name']);
        }

        $data = array ('state' => false, 'msg' => '操作失败，请重试！');
        $base_info = $_POST['base_info'];
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
        $base_info['goods_pos'] = $_SESSION['shop_spg_store_id'];
        $base_info['goods_state'] = 1; //未被删除
        $base_info['goods_addtime'] = $time;
        $base_info['goods_edittime'] = $time;
        $base_info['pc_desc'] = $_POST['content'];
        $base_info['year_to_market'] = $base_info['year_to_market'];
        $base_info['season_to_market'] = $base_info['season_to_market'];
        $base_info['sex'] = $base_info['sex'];
        $base_info['discount'] = $base_info['discount'] ? $base_info['discount'] / 100 : 1;
        $base_info['weight'] = $base_info['weight'] ? $base_info['weight'] : 0;
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
        //print_r($size_arr);die;
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
                //                 print_r($base_info);exit;
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
                                $vv['stocks_sku'] = isset($vv['stocks_sku'])? strtoupper ($vv['stocks_sku']):'';
                                /* if(empty($vv['stocks_sku'])){
                                    continue;
                                } */
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
                    isset($color_arr[$k]['goods_id'])? $goods_id:false;
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
        $this->common_function->pay_role("seller_add_good");//权限
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
                $this->smarty->assign ('goods_id', $goods_id);
                $this->smarty->display ('goods_add_goods_fourth.html');
            }
        }
    }


    //商品删除（到回收站去）
    public function goods_delete ()
    {
        $this->common_function->pay_role("seller_del_good");//权限
        $del_id = isset($_GET['del_id']) ? explode (',', $_GET['del_id']) : false;
        $data = array ('state' => false, 'msg' => '系统错误！');
        if ($del_id) {
            $result = $this->db->where_in ('goods_id', $del_id)->update ('shop_goods', array ('goods_state' => 0, 'goods_edittime' => time ()));
            if ($result) {
                $data = array ('state' => true, 'msg' => '修改成功！');
            } else {
                $data = array ('state' => false, 'msg' => '修改失败！');
            }
        }
        echo json_encode ($data);
        exit;
    }


    //商品彻底删除（从回收站彻底删除）
    public function goods_completely_delete ()
    {
        $this->common_function->pay_role("seller_del_good");//权限
        $del_id = isset($_GET['id']) ? explode (',', $_GET['id']) : false;
        $del_ids = isset($_GET['id']) ? $_GET['id'] : false;
        $data = array ('state' => false, 'msg' => '系统错误！');
        if ($del_id) {
            $this->db->select('goods_id,goods_image_id,goods_image');
            $this->db->from('shop_goods_images');
            $this->db->where("goods_id in($del_ids)");
            $this->db->order_by ('goods_id', 'DESC');
            $imagesInfo = $this->db->get()->result_array();
        
            $this->db->trans_off (); //禁用事务
            $this->db->trans_start (); //开启事务
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods_images');
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods_extend_attr');
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods_extend');
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods_attr_self_taxonomy');
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods_attr_index');
            $this->db->where_in ('goods_id', $del_id)->delete ('shop_goods');
            $this->db->where_in ('goods_id', $del_id)->where('ssa_store_id', $_SESSION['shop_spg_store_id'])->delete('store_stocks_amount');
            $this->db->trans_complete (); //事务完成
            $this->db->trans_off (); //禁用事务
            if ($this->db->trans_status ()) {
                if($imagesInfo){
                    $savePath = ROOTPATH . 'data/shop/album_pic/';
                    foreach ($imagesInfo as $ke =>$vl){
                        if($vl['goods_image']){
                            @unlink($savePath.$vl['goods_image']);
                        }
                    }
                }
                $data = array ('state' => true, 'msg' => '删除成功！');
            }
        }
        echo json_encode ($data);
        exit;
    }


    //商品禁用优惠券
    public function goods_ban_coupons ()
    {
        $this->common_function->pay_role("seller_edit_good");//权限
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
        $this->common_function->pay_role("seller_edit_good");//权限
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
        $this->common_function->pay_role("seller_edit_good");//权限
        $ids        = isset($_GET['id']) ? explode (',', $_GET['id']) : false;
        $change_id  = isset($_GET['change_id']) ? $_GET['change_id'] : false;  //要设置的属性id
        $attr       = isset($_GET['attr']) ? $_GET['attr'] :false;      //要设置的属性

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
            } else {
                $data = array ('state' => false, 'msg' => '修改失败！');
            }
        }
        echo json_encode ($data);
        exit;
    }


    //商品取消标签
    public function goods_cancel_tags(){
        $this->common_function->pay_role("seller_edit_good");//权限
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


    //修改商品价格，折扣
    public function set_goods_price ()
    {
        $this->common_function->pay_role("seller_edit_good");//权限
        $ids = isset($_GET['id']) ? explode(',', $_GET['id']) : false;
        $p   = isset($_GET['p']) ? $_GET['p'] :false;
        $num = isset($_GET['num']) ? ($_GET['num']) :false;
        $data = array('state'=>false,'msg'=>'修改失败！');
        if ($ids) {
            if ($p == 1) {    //设置折扣
                $price = array ();
                $i = 0;
                foreach ($ids as $id) {
                    $old = $this->db->where_in('sa.goods_id',$id)->from('store_stocks_amount sa')->join("shop_goods_extend_attr st","st.goods_ea_id = sa.goods_ea_id","left")->get()->row('stocks_marketprice');    //原价
                    $price[$i]['goods_id'] = $id;
                    $price[$i]['stocks_price'] = ceil($old*$num);
                    $i++;
                }
                for ($j=0;$j<$i;$j++) {
                    $this->db->where('goods_id',$price[$j]['goods_id'])->update('store_stocks_amount',array('stocks_price' => $price[$j]['stocks_price']));
                }
                $data = array('state'=>true,'msg'=>'修改成功！');
            } else if ($p == 2) { //设置价格
                $new = array(
                    'stocks_price'=>$num,
                    'update_time'=>time(),
                    'update_user_name' => $_SESSION['shop_spg_name'],
                    'update_user_id' => $_SESSION['shop_spg_id'],
                    'update_user_type'  => 2,
                );
                $result = $this->db->where_in('goods_id',$ids)->update('store_stocks_amount', $new);
                $data = array('state'=>true,'msg'=>'修改成功！');
            }
        }
        echo json_encode ($data);
        exit;
    }


    //修改商品价格
    public function update_goodsSkuprice(){
        $this->common_function->pay_role("seller_edit_good");//权限
        $data = array('state'=>false,'msg'=>'修改失败！');
        $ids = isset($_POST['id']) ? explode(',', trim($_POST['id'])) : false;
        $price   = isset($_POST['price']) ? trim($_POST['price']) :false;
        if(!($ids && $price)){
            echo json_encode ($data);
            exit;
        }
        $new = array(
            'uec_stocks_price'=>$price,
            'stocks_price'=>$price,
            'update_time'=>time(),
            'update_user_name' => $_SESSION['shop_spg_name'],
            'update_user_id' => $_SESSION['shop_spg_id'],
            'update_user_type'  => 2,
        );
        $this->db->trans_off(); //禁用事务
        $this->db->trans_start(); //开启事务
        $result = $this->db->where_in('goods_id',$ids)->where('ssa_store_id',$_SESSION['shop_spg_store_id'])->update('store_stocks_amount', $new);
        $result = $this->db->where_in('goods_id',$ids)->where('goods_pos',$_SESSION['shop_spg_store_id'])->update('shop_goods', array("goods_price"=>$price));
        $this->db->trans_complete(); //事务完成
        $this->db->trans_off(); //禁用事务
        if($result){
            $data = array('state'=>true,'msg'=>'修改成功！');
        }
        echo json_encode ($data);
        exit;
    }
    
       
    //商品还原
    public function goods_restore(){
        $this->common_function->pay_role("seller_edit_good");//权限
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
        $this->common_function->pay_role("seller_edit_good");//权限
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
        $this->common_function->pay_role("seller_edit_good");//权限
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


    /* 商品管理——图片空间 */
    public function goods_pic_room() {
        $this->common_function->pay_role("seller_add_good");//权限
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
                    $xml .= "<td><a class='btn red' style='display:none;' onclick='fg_delete(" . $row['aclass_id'] . ")'><i class='fa fa-trash-o'></i>删除</a><a class='btn green' onclick='fg_view(" . $row['aclass_id'] . ")'><i class='fa fa-list-alt'></i>查看</a></td>";
                } else {
                    $xml .= "<td><a class='btn red' onclick='fg_delete(" . $row['aclass_id'] . ")'><i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em><ul>";
                    $xml .= "<li><a href='javascript:void(0);' onclick='fg_view(" . $row['aclass_id'] . ")'>查看</a></li>";
                    $xml .= "<li><a href='javascript:void(0);' onclick='fg_edit(" . json_encode($row) . ")'>编辑</a></li>";
                    $xml .= "</ul></span></td>";
                }
                $xml .= "<td>" . $row['aclass_name'] . "</td>";
                $xml .= '<td><i class="fa fa-photo" aria-hidden="true" data-geo="<img src=\'' . $aclass_cover . '\'>"></i></td>';
                $xml .= "<td>" . $num . "</td>";
                $xml .= "<td>" . $row['aclass_des'] . "</td>";
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
        $this->common_function->pay_role("seller_add_good");//权限
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


    /* 商品管理——图片空间——删除图片 */
    public function delete_pic() {
        $this->common_function->pay_role("seller_add_good");//权限
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
                $data = array('state' => true, 'msg' => '删除成功', 'data' => $aclass_id);
            }
        }
        echo json_encode($data);
        exit;
    }


    /* 商品管理——图片空间——编辑相册 */
    public function goods_pic_room_edit() {
        $this->common_function->pay_role("seller_add_good");//权限
        $data = array('state' => false, 'msg' => "操作失败，请重试！");
        if (isset($_GET['op']) && $_GET['op'] == 'add') {
            $param = $_POST['param'];
            $result = $this->db->insert('shop_album_class', $param);
            if ($result) {
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
                    $data = array('state' => true, 'msg' => '删除成功');
                }
            }
            echo json_encode($data);
            exit;
        }
    }


    //为相册上传图片
    public function goods_pic_upload() {
        $this->common_function->pay_role("seller_add_good");//权限
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
        
        $this->smarty->display('goods_pic_room_box.html');
    }


    /* 获取指定类型的品牌列表 */
    public function get_brands_by_type() {
        
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
            $this->db->join('store_attr_brands as sab', 'sab.brand_id = sb.brand_id');
            //$this->db->join('shop_type_brand as stb', 'stb.brand_id=sb.brand_id', 'left');
            $this->db->where("sb.brand_name is not NULL AND sb.brand_name != ''");
            $this->db->where('sab.store_id',$_SESSION['shop_spg_store_id']);
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
        //$data['info'] = '2016';
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
        $brand_id = !empty($_GET['b_id']) ? $_GET['b_id'] : false;
        if ($class_id && $brand_id) {

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
            
            $goods_class_size =
            $this->db->select ('gc_id,gc_name,gc_size')
            ->from ('shop_goods_class')
            ->where ('gc_id',$class_id)
            ->get ()->row_array ();
            if($goods_class_size['gc_size']){
                $goods_class_size = unserialize($goods_class_size['gc_size']);
            }else{
                $goods_class_size = array();
            }
            $goods_classSize = array();
            if($goods_class_size){
                foreach ($goods_class_size as $ks=>$vl){
                    $goods_classSize[$vl] =$vl;
                }
            }
            
            $this->db->select ('css.size,css.flag')->from ('code_segment_size css');
            $this->db->join ('shop_brand b', 'b.brand_size_type=css.flag');
            $this->db->where ('b.brand_id', $brand_id);
            $sizes =$this->db->order_by ('css.size')->get ()->result_array ();
            
            if (!empty($sizes)) {
                $flag_arr = array ('1' => '中国码', '2' => '美国码', '3' => '英国码', '4' => '日本码');
                foreach ($sizes as $k => $v) {
                    if($goods_classSize  && isset($goods_classSize[$v['size']])){
                        continue;
                    }else{
                        $size_arr[$v['flag']]['size_list'][] = $v;
                    }
                }
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
        
        $data = array('state' => true, 'msg' => '');
        $cate_id = !empty($_GET['class_id']) ? $_GET['class_id'] : false;
        $cate_option = $this->goods_model->get_brands_by_class($cate_id);
        $data['info'] = $cate_option;
        echo json_encode($data);
        exit;
    }


    /* 商品管理——自定义标签分类信息 */
	

    //修改库存
    /*修改某个商品的库存，价格数据*/
    public function updateAmount(){
        //$this->common_function->shop_admin_priv("store_management");//权限
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
                //            if(empty($row)||empty($rows)){
                //                $value = array('state'=>      false,'data'=>$rows,'row'=>$row,'msg'=>'商品还未入库暂时不能修改数据');
                //            }else{
                $value = array('state'=>true,'data'=>$rows,'row'=>$row);
            //            }
            echo json_encode($value);die;
        }
    }


    public function updateStocks(){
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


    /*商品管理-自定义标签*/
    public function freetag() {
        if($_SESSION['shop_spg_store_type'] != 1) {
            echo '权限不足！';
            exit;
        }
        $cate_arr = $this->goods_model->get_gstn_by_parent_id(0);
        //        $option = $this->goods_model->gstn_array_to_option($cate_arr, 0);

        $this->smarty->assign('cate', $cate_arr);
        $this->smarty->assign('cate_js', json_encode($cate_arr));

        //      $this->smarty->assign('option', json_encode($option));
        //所有标签
        $tags = $this->store->get_all_catetages();
        $this->smarty->assign('tags',$tags);
        $this->smarty->display('freetag.html');
    }


    /*修改自定义标签的名称*/
    public function change_catetag_name(){
        $catetag_id = $_POST['id'];
        $catetag_name = $_POST['catetag_name'];
        $parent_id = $_POST['parent_id'];
        echo $this->store->update_catetag_name($catetag_id,$catetag_name,$parent_id);
    }


    /*添加自定义标签名称*/
    public function add_catetag_name(){
        $catetag_name = $_POST['catetag_name'];
        $parent_id = $_POST['parent_id'];
        $row = $this->store->add_catetag_name($catetag_name,$parent_id);
        echo json_encode($row);
    }


    /*更改自定义标签顺序*/
    public function change_menu_order(){
        $current_id = $_POST['current_id'];
        $change_id = $_POST['change_id'];
        echo  $this->store->change_menu_order($current_id,$change_id);
    }


    /*删除自定义标签*/
    public function delete_catetag_name(){
        $catetag_id = $_POST['catetag_id'];
        echo $this->store->delete_catetag_name($catetag_id);
    }


    /*****************************/

    /*快递公司*/

    public function mall_express(){
        $this->common_function->pay_role("seller_carriage");//权限
        //查询到系统已启用的快递公司
        $express = $this->db->where('e_state',1)->get('express')->result_array();
        //店铺已选择的快递公司
        $check_express = $this->db->select('express_code')->where('store_id', $_SESSION['shop_spg_store_id'])->get('express_template')->result_array();
        $this->smarty->assign ('check', $check_express);
        $this->smarty->assign ('express', $express);
        $this->smarty->display('mall_express.html');
    }


    /*保存店铺已选择的快递公司*/
    public function mall_express_save()
    {
        $this->common_function->pay_role("seller_carriage_select");//权限
        $data = array ('state' => false, 'msg' => '保存失败');
        $code = isset($_GET['express_code']) ? $_GET['express_code'] : false;
        $codes = explode (',', $code);

        if (is_array ($codes)) {
            $arr = array ();     //系统开启的所有快递
            $check = array ();     //店铺中已存在的快递
            $arr_del = array ();     //要删除的  所有的快递-已存在的快递

            //系统已开启的快递
            $expresss = $this->db->select ('e_code')->where ('e_state', 1)->get ('express')->result_array ();
            foreach ($expresss as $express) {
                $arr[] = $express['e_code'];
            }
            //店铺已存在的快递公司
            $check_express = $this->db->select ('express_code')->where ('store_id', $_SESSION['shop_spg_store_id'])->get ('express_template')->result_array ();

            foreach ($check_express as $check_expres) {
                $check[] = $check_expres['express_code'];
            }
            $arr_del = array_diff ($arr, $codes);       //未选中的快递公司
            $arr_del = array_intersect ($arr_del, $check);  //未选中但是数据库中存在的 即为要删除的

            foreach ($codes as $v) {
                if (!in_array ($v, $check)) {     //$v不在check里面则复制
                    //得到系统预设的运费模板
                    $express_tpl = $this->db->select ('ept_id,express_name,sort,type')->where ('express_code', $v)->where('store_id',0)->get ('express_template')->result_array ();
                    foreach ($express_tpl as $e_sys) {
                        $express = array (
                            'express_name' => $e_sys['express_name'],
                            'express_code' => $v,
                            'ept_name' => $e_sys['express_name'],
                            'add_time' => time (),
                            'add_user_id' => $_SESSION['shop_spg_id'],
                            'add_user' => $_SESSION['shop_spg_name'],
                            'add_type' => 2,
                            'sort' => $e_sys['sort'],
                            'type' => $e_sys['type'],
                            'store_id' => $_SESSION['shop_spg_store_id'],
                        );
                        //添加模板
                        $result = $this->db->insert ('express_template', $express);
                        $ept_id = $this->db->insert_id ();
                        //添加快递模版费用附属表
                        $ept_fees = $this->db->where ('ept_id', $e_sys['ept_id'])->get ('express_template_attr_fee')->result_array ();
                        foreach ($ept_fees as $e_fee) {
                            $eptaf_id = $e_fee['eptaf_id'];  //原来的快递对应的fee id 通过这个id去area表查询
                            unset($e_fee['eptaf_id']);
                            $e_fee['ept_id'] = $ept_id;
                            $this->db->insert ('express_template_attr_fee', $e_fee);
                            $new_eptaf_id = $this->db->insert_id ();

                        //快递模版附属表     有点卡
                            $ept_fee_areas = $this->db->where ('eptaf_id', $eptaf_id)->get ('express_template_attr_fee_area')->result_array ();
                            foreach ($ept_fee_areas as $ept_fee_area) {
                                $ept_fee_area['eptaf_id'] = $new_eptaf_id;
                                $this->db->insert ('express_template_attr_fee_area', $ept_fee_area);
                            }
                        }
                    }

                    //查询店铺是否添加过快递单打印模板
                    $key1 = $this->db->from ('express_waybill ew')->join ('express e', 'ew.express_id = e.id')
                        ->where ('ew.store_id', $_SESSION['shop_spg_store_id'])->where ('e.e_code', $v)->where('waybill',1)->get ()->result_array ();
                    $key2 = $this->db->from ('express_waybill ew')->join ('express e', 'ew.express_id = e.id')
                        ->where ('ew.store_id', $_SESSION['shop_spg_store_id'])->where ('e.e_code', $v)->where('waybill',2)->get ()->result_array ();

                    if (empty($key1)) { //copy快递打印模板
                        $express_id = $this->db->select ('id')->where ('e_code', $v)->get ('express')->result_array ();
                        //查询到所选快递的模板
                        $e_waybills = $this->db->from ('express_waybill')
                            ->where ('store_id', 0)->where('waybill',1)->where ('express_id', $express_id[0]['id'])->get ()->result_array ();
                        foreach ($e_waybills as $e_waybill) {
                            unset($e_waybill['waybill_id']);
                            unset($e_waybill['last_modify_time']);
                            unset($e_waybill['last_modify_user_id']);
                            $e_waybill['add_time'] = time ();
                            $e_waybill['store_id'] = $_SESSION['shop_spg_store_id'];
                            $e_waybill['add_user_id'] = $_SESSION['shop_spg_id'];
                            $row = $this->db->insert ('express_waybill', $e_waybill);     //复制
                            if (!$row) {
                                $data = array ('state' => false, 'msg' => '操作失败');
                            }
                        }
                    }
                    if (empty($key2)) { //copy快递打印模板
                        $express_id = $this->db->select ('id')->where ('e_code', $v)->get ('express')->result_array ();
                        //查询到所选快递的模板
                        $e_waybills = $this->db->from ('express_waybill')
                            ->where ('store_id', 0)->where('waybill',2)->where ('express_id', $express_id[0]['id'])->get ()->result_array ();
                        foreach ($e_waybills as $e_waybill) {
                            unset($e_waybill['waybill_id']);
                            unset($e_waybill['last_modify_time']);
                            unset($e_waybill['last_modify_user_id']);
                            $e_waybill['add_time'] = time ();
                            $e_waybill['store_id'] = $_SESSION['shop_spg_store_id'];
                            $e_waybill['add_user_id'] = $_SESSION['shop_spg_id'];
                            $row = $this->db->insert ('express_waybill', $e_waybill);     //复制
                            if (!$row) {
                                $data = array ('state' => false, 'msg' => '操作失败');
                            }
                        }
                    }
                    $data = array ('state' => true, 'msg' => '保存成功');
                }

                if (!empty($arr_del)) { //删除未选中的快递
                    foreach ($arr_del as $v) {
                        //删除express_template                ept_id
                        // express_template_attr_fee         eptaf_id
                        // express_template_attr_fee_area    eptaf_id
                        // express_waybill                   waybill_id

                        $row = $this->db->select ('id')->where ('e_code', $v)->get ('express')->result_array ();
                        $express_id = $row[0]['id'];

                        //得到ept_id
                        $ept_ids = $this->db->select ('ept_id')->where ('express_code', $v)
                            ->where ('store_id', $_SESSION['shop_spg_store_id'])->get ('express_template')->result_array ();
                        foreach ($ept_ids as $ept_id) {
                            //得到eptaf_id
                            $eptaf_ids = $this->db->select ('eptaf_id')->where ('ept_id', $ept_id['ept_id'])->get ('express_template_attr_fee')->result_array ();
                            //循环删除express_template_attr_fee表和express_template_attr_fee_area表中的数据
                            foreach ($eptaf_ids as $eptaf_id) {
                                $this->db->where ('ept_id', $ept_id['ept_id'])->delete ('express_template_attr_fee');
                                $this->db->where ('eptaf_id', $eptaf_id['eptaf_id'])->delete ('express_template_attr_fee_area');
                            }
                            //循环删除express_template
                            $this->db->where ('ept_id', $ept_id['ept_id'])->delete ('express_template');
                        }
                        //删除express_waybill
                        $this->db->where ('express_id', $express_id)->where ('store_id', $_SESSION['shop_spg_store_id'])->delete ('express_waybill');
                        $data = array ('state' => true, 'msg' => '操作成功！');
                    }
                }
            }
            echo json_encode ($data);
            exit;
        }
    }


    /*快递公司——显示运单模版*/
    public function mall_waybill()
    {
        $this->common_function->pay_role("seller_carriage");//权限
        $this->smarty->assign ('url', base_url ('pay.php/store/mall_waybill_list'));
        $this->smarty->display('mall_waybill.html');
    }


    /*快递运单模板列表*/
    public function mall_waybill_list(){
        $this->common_function->pay_role("seller_carriage");//权限
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;
        $start = ($page - 1) * $rp;
        $this->db->from ('express_waybill');

        //只加载系统的运单模板和店铺自己添加的运单模板
        $where = "store_id = '{$_SESSION['shop_spg_store_id']}'";
        $total = $this->db->where($where)->count_all_results ();
        $this->db->limit ($rp, $start);
        $rows = $this->db->where($where)->get ('express_waybill')->result_array ();
        header ("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml = '';
        $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
        $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
        $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
        if ($total == 0) {
            $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
            echo $xml;
            exit;
        }
        foreach ($rows as $row) {
            if($row['status'] == 1) {
                $row['status'] = '是';
            } else {
                $row['status'] = '否';
            }
            $row['waybill_image'] = base_url ('data/images/').$row['waybill_image'];
            $xml .= "<tr id='row" . $row['waybill_id'] . "' data-id='" . $row['waybill_id'] . "'>";
            $xml .= '<td data-id="' . $row['waybill_id'] . '" ><input class="ml15" type="checkbox" value="' . $row['waybill_id'] . '" name="check"></td>';
            $xml .= "<td><span title='{$row['waybill_name']}'>" . $row['waybill_name'] . "</span></td>";
            if($row['waybill']==2){
                $xml .= "<td>热敏</td>";
            }else{
                $xml .= "<td>面单</td>";
            }
            
            $xml .= "<td>" . $row['express_name'] . "</td>";
            $xml .= "<td><div class='center'>
                            <img height='100px' src='{$row['waybill_image']}' alt=''>
                            <div style='float: right;'>
                                <p>宽度：{$row['waybill_width']}(mm)</p>
                                <p>高度：{$row['waybill_height']}(mm)</p>
                            </div>
                          </div></td>";
            $xml .= "<td><p class='center'>" . $row['waybill_top'] . "</p></td>";
            $xml .= "<td><p class='center'>" . $row['waybill_left'] ."</p></td>";
            $xml .= "<td><p class='center'>" . $row['status'] . "</p></td>";
            //操作

            $xml .= "<td>
                        <a class='btn box-shadow' onclick='mall_waybill_design({$row['waybill_id']},{$row['waybill']})'>设计</a>
                        <a class='btn box-shadow' onclick='mall_waybill_test({$row['waybill_id']},{$row['waybill']})'>测试</a>
                        <a class='btn red box-shadow' onclick='mall_waybill_del({$row['waybill_id']},\"{$row['waybill_name']}\")'>删除</a>
                    </td>";

            $xml .= "</tr>";
        }
        echo $xml; exit;
    }


    /*快递公司——编辑运单模版*/
    public function mall_waybill_edit() {
        $this->common_function->pay_role("seller_carriage_printTpl_edit");//权限
        $id = isset($_GET['data']) ? trim($_GET['data']) : false;
        if($id){
            $data = $this->db->where('waybill_id',$id)->where('store_id', $_SESSION['shop_spg_store_id'])->get('express_waybill')->row_array();
            $this->smarty->assign('data',$data);
        }
        $this->smarty->display('mall_waybill_edit.html');
    }


    /*快递公司——编辑运单模版提交*/
    public function mall_waybill_submit() {
        $this->common_function->pay_role("seller_carriage");//权限
	   $waybill_id = isset($_POST['waybill_id']) ? trim($_POST['waybill_id']) : false;
	   $waybill_name = isset($_POST['waybill_name']) ? trim($_POST['waybill_name']) : '';
	   $printer_name = isset($_POST['printe_name']) ? trim($_POST['printe_name']) : '';//打印机名
	   $waybill_express_id = isset($_POST['waybill_express_id']) ? trim($_POST['waybill_express_id']) : '';//快递公司
	   $waybill_width = isset($_POST['waybill_width']) ? trim($_POST['waybill_width']) : '';
	   $waybill_height = isset($_POST['waybill_height']) ? trim($_POST['waybill_height']) : '';
	   $waybill_top = isset($_POST['waybill_top']) ? trim($_POST['waybill_top']) : '';
	   $waybill_left = isset($_POST['waybill_left']) ? trim($_POST['waybill_left']) : '';
	   $waybill_image = isset($_POST['textfield']) ? trim($_POST['textfield']) : '';//背景图片
	   $waybill_types = isset($_POST['waybill_types']) ? trim($_POST['waybill_types']) : 1;
	   $dir = './data/images/';// 设置上传路径
	   $upload = false;
	   //北京图片处理
	   if (!empty ( $_FILES ['waybill_image'] ['name'] )) {
	       if (!file_exists($dir) || !is_writable($dir)) {
	           @mkdir($dir, 0755);
	       }
	       //临时文件名
	       $tmp_file = $_FILES ['waybill_image'] ['tmp_name'];
	        
	       //获取文件后缀名
	       $file_types = explode ( ".", $_FILES ['waybill_image'] ['name'] );
	       $file_type = $file_types [count ( $file_types ) - 1];
	       //判断图片格式
	       if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
	           $return = array(
	               'state'=>false,
	               'msg'=>"不是图片文件，重新稍后上传"
	           );
	           echo json_encode($return);exit();
	       }
	       $str = date ( 'YmdHis' ) . uniqid ()."_waybill"; // 以时间来命名上传的文件
	       $file_name = $str . "." . $file_type; // 是否上传成功
	       if (! copy( $tmp_file, $dir . $file_name )) {
	           $return = array(
	               'state'=>false,
	               'msg'=>"图片上传失败，请稍后重新上传"
	           );
	           echo json_encode($return);exit();
	       }
	       $waybill_image = $file_name;
	   }
	   $waybill_data = '';
       if(isset($_POST['waybill_sender_name'])  && !empty($_POST['waybill_sender_name'])){
           $waybill_data['sender_name']= $_POST['waybill_sender_name'];
       }
       if(isset($_POST['waybill_sender_postcode']) && !empty($_POST['waybill_sender_postcode'])){
           $waybill_data['sender_postcode']= $_POST['waybill_sender_postcode'];
       }
       if(isset($_POST['waybill_sender_province']) && !empty($_POST['waybill_sender_province'])){
           $waybill_data['sender_province']= $_POST['waybill_sender_province'];
       }
       if(isset($_POST['waybill_sender_city']) &&  !empty($_POST['waybill_sender_city'])){
           $waybill_data['sender_city']= $_POST['waybill_sender_city'];
       }
       if(isset($_POST['waybill_sender_district']) && !empty($_POST['waybill_sender_district'])){
           $waybill_data['sender_district']= $_POST['waybill_sender_district'];
       }
       if(isset($_POST['waybill_sender_town']) && !empty($_POST['waybill_sender_town'])){
           $waybill_data['sender_town']= $_POST['waybill_sender_town'];
       }
       if(isset($_POST['waybill_sender_detail'])  && !empty($_POST['waybill_sender_detail'])){
           $waybill_data['sender_detail']= $_POST['waybill_sender_detail'];
       }
       if(isset($_POST['waybill_sender_phone'])  && !empty($_POST['waybill_sender_phone'])){
           $waybill_data['sender_phone']= $_POST['waybill_sender_phone'];
       }
       if(isset($_POST['waybill_sender_mobile']) && !empty($_POST['waybill_sender_mobile'])){
           $waybill_data['sender_mobile']= $_POST['waybill_sender_mobile'];
       }
       if(isset($_POST['waybill_sender_tel'])  && !empty($_POST['waybill_sender_tel'])){
           $waybill_data['sender_tel']= $_POST['waybill_sender_tel'];
       }
       if(isset($_POST['waybill_sender_company']) && !empty($_POST['waybill_sender_company'])){
           $waybill_data['sender_company']= $_POST['waybill_sender_company'];
       }
       if(isset($_POST['waybill_sender_num1'])  && !empty($_POST['waybill_sender_num1'])){
           $waybill_data['sender_num1']= $_POST['waybill_sender_num1'];
       }
       if(isset($_POST['waybill_sender_num2'])  && !empty($_POST['waybill_sender_num2'])){
           $waybill_data['sender_num2']= $_POST['waybill_sender_num2'];
       }
       if(isset($_POST['waybill_sender_num3'])  && !empty($_POST['waybill_sender_num3'])){
           $waybill_data['sender_num3']= $_POST['waybill_sender_num3'];
       }
       if(isset($_POST['waybill_sender_id'])  && !empty($_POST['waybill_sender_id'])){
           $waybill_data['sender_id']= $_POST['waybill_sender_id'];
       }
       if(isset($_POST['waybill_sender_note']) && !empty($_POST['waybill_sender_note'])){
           $waybill_data['sender_note']= $_POST['waybill_sender_note'];
       }
       
       if(isset($_POST['waybill_recipient_name'])  && !empty($_POST['waybill_recipient_name'])){
           $waybill_data['recipient_name']= $_POST['waybill_recipient_name'];
       }
       if(isset($_POST['waybill_recipient_postcode']) && !empty($_POST['waybill_recipient_postcode'])){
           $waybill_data['recipient_postcode']= $_POST['waybill_recipient_postcode'];
       }
       if(isset($_POST['waybill_recipient_province_j'])  && !empty($_POST['waybill_recipient_province_j'])){
           $waybill_data['recipient_province_j']= $_POST['waybill_recipient_province_j'];
       }
	   if(isset($_POST['waybill_recipient_province'])  && !empty($_POST['waybill_recipient_province'])){
           $waybill_data['recipient_province']= $_POST['waybill_recipient_province'];
       }
       if(isset($_POST['waybill_recipient_postcode']) && !empty($_POST['waybill_recipient_postcode'])){
           $waybill_data['recipient_postcode']= $_POST['waybill_recipient_postcode'];
       }
       if(isset($_POST['waybill_recipient_city'])  && !empty($_POST['waybill_recipient_city'])){
           $waybill_data['recipient_city']= $_POST['waybill_recipient_city'];
       }
       if(isset($_POST['waybill_recipient_district']) && !empty($_POST['waybill_recipient_district'])){
           $waybill_data['recipient_district']= $_POST['waybill_recipient_district'];
       }
       if(isset($_POST['waybill_recipient_town'])  && !empty($_POST['waybill_recipient_town'])){
           $waybill_data['recipient_town']= $_POST['waybill_recipient_town'];
       }
       if(isset($_POST['waybill_recipient_detail']) && !empty($_POST['waybill_recipient_detail'])){
           $waybill_data['recipient_detail']= $_POST['waybill_recipient_detail'];
       }
       if(isset($_POST['waybill_recipient_phone'])  && !empty($_POST['waybill_recipient_phone'])){
           $waybill_data['recipient_phone']= $_POST['waybill_recipient_phone'];
       }
       if(isset($_POST['waybill_recipient_postcode']) && !empty($_POST['waybill_recipient_postcode'])){
           $waybill_data['recipient_postcode']= $_POST['waybill_recipient_postcode'];
       }
       if(isset($_POST['waybill_recipient_mobile'])  && !empty($_POST['waybill_recipient_mobile'])){
           $waybill_data['recipient_mobile']= $_POST['waybill_recipient_mobile'];
       }
       if(isset($_POST['waybill_recipient_tel']) && !empty($_POST['waybill_recipient_tel'])){
           $waybill_data['recipient_tel']= $_POST['waybill_recipient_tel'];
       }
       if(isset($_POST['waybill_recipient_id'])  && !empty($_POST['waybill_recipient_id'])){
           $waybill_data['recipient_id']= $_POST['waybill_recipient_id'];
       }
       if(isset($_POST['waybill_recipient_note']) && !empty($_POST['waybill_recipient_note'])){
           $waybill_data['recipient_note']= $_POST['waybill_recipient_note'];
       }
       
       if(isset($_POST['waybill_store_name'])  && !empty($_POST['waybill_store_name'])){
           $waybill_data['store_name']= $_POST['waybill_store_name'];
       }
       
       if(isset($_POST['waybill_goods_count'])  && !empty($_POST['waybill_goods_count'])){
           $waybill_data['goods_count']= $_POST['waybill_goods_count'];
       }
       if(isset($_POST['waybill_goods_weight'])  && !empty($_POST['waybill_goods_weight'])){
           $waybill_data['goods_weight']= $_POST['waybill_goods_weight'];
       }
       if(isset($_POST['waybill_invoice_title'])  && !empty($_POST['waybill_invoice_title'])){
           $waybill_data['invoice_title']= $_POST['waybill_invoice_title'];
       }
       if(isset($_POST['waybill_sender_station'])  && !empty($_POST['waybill_sender_station'])){
           $waybill_data['sender_station']= $_POST['waybill_sender_station'];
       }
       if(isset($_POST['waybill_sender_station_code'])  && !empty($_POST['waybill_sender_station_code'])){
           $waybill_data['sender_station_code']= $_POST['waybill_sender_station_code'];
       }
       if(isset($_POST['waybill_sender_station_code128'])  && !empty($_POST['waybill_sender_station_code128'])){
           $waybill_data['sender_station_code128']= $_POST['waybill_sender_station_code128'];
       }
       
       if(isset($_POST['waybill_recipient_station'])  && !empty($_POST['waybill_recipient_station'])){
           $waybill_data['recipient_station']= $_POST['waybill_recipient_station'];
       }
       if(isset($_POST['waybill_recipient_station_code'])  && !empty($_POST['waybill_recipient_station_code'])){
           $waybill_data['recipient_station_code']= $_POST['waybill_recipient_station_code'];
       }
       if(isset($_POST['waybill_recipient_station_code128'])  && !empty($_POST['waybill_recipient_station_code128'])){
           $waybill_data['recipient_station_code128']= $_POST['waybill_recipient_station_code128'];
       }
       
       if(isset($_POST['waybill_routingInfo'])  && !empty($_POST['waybill_routingInfo'])){
           $waybill_data['routingInfo']= $_POST['waybill_routingInfo'];
       }
       if(isset($_POST['waybill_routingInfo_area'])  && !empty($_POST['waybill_routingInfo_area'])){
           $waybill_data['routingInfo_area']= $_POST['waybill_routingInfo_area'];
       }
       if(isset($_POST['waybill_routingInfo_code'])  && !empty($_POST['waybill_routingInfo_code'])){
           $waybill_data['routingInfo_code']= $_POST['waybill_routingInfo_code'];
       }
       if(isset($_POST['waybill_routingInfo_area_code'])  && !empty($_POST['waybill_routingInfo_area_code'])){
           $waybill_data['routingInfo_area_code']= $_POST['waybill_routingInfo_area_code'];
       }
       if(isset($_POST['waybill_routingInfo_area_code4'])  && !empty($_POST['waybill_routingInfo_area_code4'])){
           $waybill_data['routingInfo_area_code4']= $_POST['waybill_routingInfo_area_code4'];
       }
       
       
       if(isset($_POST['waybill_goods_images'])  && !empty($_POST['waybill_goods_images'])){
           $waybill_data['goods_images']= $_POST['waybill_goods_images'];
       }
       if(isset($_POST['waybill_goods_img'])  && !empty($_POST['waybill_goods_img'])){
           $waybill_data['goods_img']= $_POST['waybill_goods_img'];
       }
       if(isset($_POST['waybill_goods_money'])  && !empty($_POST['waybill_goods_money'])){
           $waybill_data['goods_money']= $_POST['waybill_goods_money'];
       }
       if(isset($_POST['waybill_goods_money_w'])  && !empty($_POST['waybill_goods_money_w'])){
           $waybill_data['goods_money_w']= $_POST['waybill_goods_money_w'];
       }
       
       if(isset($_POST['waybill_ordersn'])  && !empty($_POST['waybill_ordersn'])){
           $waybill_data['ordersn']= $_POST['waybill_ordersn'];
       }
       if(isset($_POST['waybill_print_data'])  && !empty($_POST['waybill_print_data'])){
           $waybill_data['print_data']= $_POST['waybill_print_data'];
       }
       if(isset($_POST['waybill_print_time'])  && !empty($_POST['waybill_print_time'])){
           $waybill_data['print_time']= $_POST['waybill_print_time'];
       }
       if(isset($_POST['waybill_pay_type'])  && !empty($_POST['waybill_pay_type'])){
           $waybill_data['pay_type']= $_POST['waybill_pay_type'];
       }
       if(isset($_POST['waybill_pay_time'])  && !empty($_POST['waybill_pay_time'])){
           $waybill_data['pay_time']= $_POST['waybill_pay_time'];
       }
       
       
       if(isset($_POST['waybill_invoice_w'])  && !empty($_POST['waybill_invoice_w'])){
           $waybill_data['invoice_w']= $_POST['waybill_invoice_w'];
       }
	   if(isset($_POST['waybill_invoice_h'])  && !empty($_POST['waybill_invoice_h'])){
           $waybill_data['invoice_h']= $_POST['waybill_invoice_h'];
       }
      if(!empty($waybill_data)){
          $waybill_data = serialize($waybill_data);
      }
       $data = array(
           'waybill_name'=>$waybill_name,'waybill'=>$waybill_types,'waybill_image'=>$waybill_image,'waybill_width'=>$waybill_width,'waybill_height'=>$waybill_height,
           'status'=>1,'waybill_top'=>$waybill_top,'waybill_left'=>$waybill_left,'printer_name'=>$printer_name,
           'waybill_data'=>$waybill_data,'last_modify_time'=>time(),'last_modify_user_id'=>$_SESSION['shop_spg_id'],'store_id'=>$_SESSION['shop_spg_store_id'],
       );
	   $links [0] ['text'] = '返回上一页';
	   $links [0] ['href'] = 'javascript:history.go(-1)';
	   $links [1] ['text'] = '运单模板列表';
	   $links [1] ['href'] = 'mall_waybill';
	   $express_info = array();
	   if($waybill_express_id){
	       $data['express_id'] = $waybill_express_id;
	       $data['express_name'] = $this->db->select('e_name')->where('id',$waybill_express_id)->get('express')->row('e_name');
	       $express_info = $this->db->select('waybill_id,express_id,express_name')->where('express_id',$waybill_express_id)->get('express_waybill')->row_array();
	   }
	   if($waybill_id){
	       if($this->db->where('waybill_id',$waybill_id)->update('express_waybill',$data)){
	           $this->common_function->shop_admin_log('设置快递模板'.$waybill_name,'edit', '快递模板设置');
	           $this->common_function->show_message('修改成功',1,$links);
	       }else{
	           $this->common_function->show_message('修改失败',1,$links);
	       }
	   }else{
	       $data['add_time']=time();$data['add_user_id']=$_SESSION['shop_admin_id'];
	       if(empty($express_info)){
	           if($this->db->insert('express_waybill',$data)){
	               $this->common_function->shop_admin_log('设置快递模板'.$waybill_name,'add', '快递模板设置');
	               $this->common_function->show_message('添加成功',1,$links);
	           }else{
	               $this->common_function->show_message('修改失败',1,$links);
	           }
	       }else{
	           if($this->db->where('waybill_id',$express_info['waybill_id'])->update('express_waybill',$data)){
	               $this->common_function->shop_admin_log('设置快递模板'.$waybill_name,'edit', '快递模板设置');
	               $this->common_function->show_message('修改成功',1,$links);
	           }else{
	               $this->common_function->show_message('修改失败',1,$links);
	           }
	       } 
	   }
	   

    }
    
    
    /*快递——删除运单模板*/
    public function mall_waybill_del() {
        $this->common_function->pay_role("seller_carriage_printTpl_edit");//权限
        $id = isset($_POST['waybill_id']) ? trim($_POST['waybill_id']) : false;
        $data = array ('state' => false, 'msg' => '操作失败！');
        if($id) {
            $result = $this->db->where('waybill_id', $id)->where('store_id',$_SESSION['shop_spg_store_id'])->delete('express_waybill');
            if($result) {
                $data = array ('state' => true, 'msg' => '操作成功！');
            }
        }
        echo json_encode ($data);
        exit;
    }


    /*快递公司——设计运单模版*/
    public function mall_waybill_design(){
        $this->common_function->pay_role("seller_carriage_printTpl_edit");//权限
        $id = isset($_GET['data']) ? trim($_GET['data']) : false;
        $type = isset($_GET['type']) ? trim($_GET['type']) : 1;
        
        
        
        if($id){
            $will_info = $this->db->select('*')->from('express_waybill')->where('waybill_id',$id)->get()->row_array();
            $waybill_data =unserialize($will_info['waybill_data']);
            $img = $will_info['waybill_image'];
            $img_url = base_url ('data/images/').$img;
            $this->smarty->assign('img',$img_url);
            $waybill_express_name = $will_info['waybill_name'];
            $this->smarty->assign('waybill_express_name',$waybill_express_name);
            $this->smarty->assign('will_info',$will_info);
            $this->smarty->assign('waybill_data',$waybill_data);
             
        }
        $express_info = $this->db->select('e_name,id,e_code,cp_code')->from('express')->where('e_state',1)->get()->result_array();
        $this->smarty->assign('express_info',$express_info);
        if($type==1){
            $this->smarty->display ( 'mall_waybill_design.html' );
        }else{
            $this->smarty->display ( 'mall_waybill_design_rm.html' );
        }

    }
    
    
    //运费设计模版修改确认
    public function design_template_submit() {
        $this->common_function->pay_role("seller_carriage_printTpl_edit");//权限
        $id = isset($_POST['waybill_id']) ? $_POST['waybill_id'] : false;
        $data = isset($_POST['waybill_data']) ? $_POST['waybill_data'] : false;
        //print_r($data);exit;
        if($id&&$data&&!empty($data)){
            $ex_info=$this->db->select('waybill_name')->from('express_waybill')->
            where('waybill_id',$id)->get()->row('waybill_name');

            $arr = array('waybill_data'=>serialize($data));
            $this->db->where('waybill_id',$id);
            $re = $this->db->update('express_waybill',$arr);
            if($re){
                $links[1]=array('text'=>'模板列表','href'=>'mall_waybill');
                $links[0]=array('text'=>'返回上一页','href'=>'javascript:history.go(-1)');
                $this->common_function->show_message('设计成功',1,$links);
            }else{
                $this->common_function->show_message('设计失败');
            }
        }
        $this->common_function->show_message('设计失败');
    }


    /*快递公司——测试运单模版*/
    public function mall_waybill_test(){
        $id = isset($_GET['data']) ? trim($_GET['data']) : false;
        $type = isset($_GET['type']) ? trim($_GET['type']) : 1;
        $will_info = $this->db->select('waybill_data,waybill_id,waybill_image')->from('express_waybill')->where('waybill_id',$id)->get()->row_array();
        $waybill_data   = unserialize($will_info['waybill_data']);
        $img_url = base_url ('data/images/').$will_info['waybill_image'];
        $this->smarty->assign('img',$img_url);
        $this->smarty->assign('waybill_data',$waybill_data);
        //print_r($waybill_data);die;
        if($type==1){
            //运单测试
            $this->smarty->display ( 'mall_waybill_test.html' );
        }else{
            //热敏测试
            $this->smarty->display ( 'mall_waybill_test_rm.html' );
        }
    }


    /*快递接口*/
    public function mall_express_interface(){
        if(!isset($_GET['op'])){
            $express_api_info = $this->mall_model->get_system_value('express_interface_api');
            $express_api_info = unserialize($express_api_info);
            $this->smarty->assign('express_api_info',$express_api_info);
            $this->smarty->display ( 'mall_express_interface.html' );
        }elseif (isset($_GET['op'])&&$_GET['op']=='edit'){
            //print_r($_POST);exit;
            $express_api = isset($_POST['express_api']) ? trim($_POST['express_api']) : 2;
            $kuaidi100_id = isset($_POST['express_kuaidi100_id']) ? trim($_POST['express_kuaidi100_id']) : '';
            $kuaidi100_key = isset($_POST['express_kuaidi100_key']) ? trim($_POST['express_kuaidi100_key']) : '';
            $kdniao_id = isset($_POST['express_kdniao_id']) ? trim($_POST['express_kdniao_id']) : '';
            $kdniao_key = isset($_POST['express_kdniao_key']) ? trim($_POST['express_kdniao_key']) : '';
            $data = array('kuaidi100'=>'','kdniao'=>'','statu'=>$express_api);
            if(!empty($kuaidi100_id)||!empty($kuaidi100_key)){
                if(!empty($kuaidi100_id)&&!empty($kuaidi100_key)){
                    $statu = ($express_api==2) ? 0 : 1;
                    $data['kuaidi100'] = array('id'=>$kuaidi100_id,'key'=>$kuaidi100_key,'statu'=>$statu);
                }else{
                    $result['msg'] = '请确认接口信息填写完整';
                    $result['state'] = false;
                    echo json_encode($result);exit;
                }

            }elseif($express_api==1){
                $result['msg'] = '请确认接口信息填写完整';
                $result['state'] = false;
                echo json_encode($result);exit;
            }
            if(!empty($kdniao_id)||!empty($kdniao_key)){
                if(!empty($kdniao_id)&&!empty($kdniao_key)){
                    $statu = ($express_api==2) ? 1 : 0;
                    $data['kdniao'] = array('id'=>$kdniao_id,'key'=>$kdniao_key,'statu'=>$statu);
                }else{
                    $result['msg'] = '请确认接口信息填写完整';
                    $result['state'] = false;
                    echo json_encode($result);exit;
                }

            }elseif($express_api==2){
                $result['msg'] = '请确认接口信息填写完整';
                $result['state'] = false;
                echo json_encode($result);exit;
            }
            $data = serialize($data);
            $this->db->where('code','express_interface_api')->update('system_config',array('value'=>$data));
            $result['msg'] = '设置成功';
            $result['state'] = true;
            echo json_encode($result);exit;

        }

    }


    /*模版管理*/
    public function mall_template_management(){
        $template_file = array();
        $template_dir = './application/index/' ;
        //print_r($template_dir);exit;
        $template_dir_        = @opendir($template_dir);
        while (($file = readdir($template_dir_))!==false)
        {
            if ($file != '.' && $file != '..' && is_dir($template_dir . $file) && $file != '.svn' && $file != 'index.html')
            {
                $template_file[$file] = $this->common_function->get_template_info($file,$template_style='',$template_dir);
            }
        }
        @closedir($template_dir);

        $now_template_code = $this->mall_model->get_system_value('template');
        $now_template = isset($template_file[$now_template_code])?$template_file[$now_template_code]:$template_file['default'];
        //print_r($template_file);exit;
        $this->smarty->assign('templates',$template_file);
        $this->smarty->assign('now_template',$now_template);
        $this->smarty->display ( 'mall_template_management.html' );
    }


    /*模版切换*/
    public function mall_template_change(){
        $code = isset($_POST['code']) ? trim($_POST['code']) : false;
        $result = array('state'=>false,'msg'=>'启用失败，请重试');
        if($code){
            $this->db->where('code','template')->update('system_config',array('value'=>$code));
            $result = array('state'=>true,'msg'=>'启用成功');
        }
        echo json_encode($result);exit;
    }


    /*模版备份*/
    public function mall_template_backup(){
        $code = isset($_POST['code']) ? trim($_POST['code']) : false;
        $result = array('state'=>false,'msg'=>'操作失败，请重试');
        //include_once('includes/cls_phpzip.php');
        $this->load->library('phpzip');
        $backup_dir = './data/backup/';
        if(!file_exists($backup_dir)){
            @mkdir ( $backup_dir, 0777, true );
        }
        $backup_filename = $backup_dir . $code . '_' . date('Ymd') . '.zip';
        $done = $this->phpzip->zip('./application/index/' . $code . '/', $backup_filename);

        if ($done)
        {
            $result = array('state'=>true,'msg'=>'备份完成','data'=>base_url($backup_filename));
            echo json_encode($result);exit;
        }
        else
        {
            $result = array('state'=>false,'msg'=>'备份失败，请重试');
            echo json_encode($result);exit;
        }
        //print_r(ROOTPATH);exit;
    }


    //商城设置——物流工具——配送区域
    public function mall_express_tools(){
        $rp = isset($_POST['rp']) ? trim($_POST['rp']) : 10;
        $page = isset($_POST['page']) ? trim($_POST['page']) : 1;
        $op = isset($_GET['op']) ? trim($_GET['op']) : false;
        $where = "et.store_id = {$_SESSION['shop_spg_store_id']}";
        $user_express = $this->db->select('et.*,etf.*,etfa.region_area_id,
	        a.area_name,a.area_parent_id')
            ->from('express_template as et')
            ->where($where)
            ->join('express_template_attr_fee as etf','etf.ept_id=et.ept_id')
            ->join('express_template_attr_fee_area as etfa','etfa.eptaf_id=etf.eptaf_id')
            ->join('area as a','a.area_id = etfa.region_area_id')->order_by('et.sort')
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
            $data_arr[$v['ept_id']][$v['eptaf_id']]['default'] = $v['default'];
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
                $data[$k]['default'] = $va['default'];
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

        $this->smarty->display ( 'mall_express_tools.html' );

    }


    //ajax得到默认的运费模板
    public function ajax_get_default_express()
    {
        $data   = array('state'=>true,'msg'=>'');
        $id     = isset($_GET['ept_id']) ? $_GET['ept_id']:false;
        $ept_id = $this->db->where('store_id',$_SESSION['shop_spg_store_id'])->where('default',1)->get('express_template')->row('ept_id');
        if (!empty($ept_id)) {
            if($id != $ept_id) {
                $data = array('state'=>false,'msg'=>'已有默认运费模板！');
            }
        }
        echo json_encode($data);exit;
    }


    //商城设置——物流工具——配送区域——删除
    public function mall_express_tools_del(){
        $this->common_function->pay_role("seller_carriage_edit_fee");//权限
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
                        $result = array('state'=>true,'msg'=>'删除成功');
                        echo json_encode($result);exit;
                    }
                }
            }
        }
        echo json_encode($result);exit;
        //print_r($_POST);exit;
    }


    //商城设置——物流工具——配送区域——修改
    public function mall_express_area_add (){
        $this->common_function->pay_role("seller_carriage_edit_fee");//权限
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
        $j = 0;
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
        $express = $this->mall_model->get_express($where = " e_state='1' ");
        $this->smarty->assign('data_info',$data_info);
        //$this->smarty->assign('data_fee',$_POST['data']);
        $this->smarty->assign('express',$express);
        //print_r($express);exit;
        $this->smarty->assign('data',$data_area);
        $this->smarty->display ( 'mall_express_area_add.html' );
    }


    /**/
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
        $this->common_function->pay_role("seller_carriage_edit_fee");//权限
        $title = isset($_POST['title']) ? trim($_POST['title']) : '';
        $express_code = isset($_POST['express_code']) ? trim($_POST['express_code']) : false;
        $transport_id = isset($_POST['transport_id']) ? trim($_POST['transport_id']) : false;
        $ept_id = isset($_POST['ept_id']) ? trim($_POST['ept_id']) : false;
        $default = isset($_POST['default']) ? trim($_POST['default']) : false;
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
                //$this->common_function->shop_admin_log('配送模板'.$title,  'add','配送模板');
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
                'add_time'=>time(),'add_user'=>$_SESSION['shop_spg_name'],'add_type'=>1,
                'add_user_id'=>$_SESSION['shop_spg_id'], 'sort'=>$sort, 'type'=>$goods_trans_type,
                'default' => $default
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
                $result = array('state'=>true,'msg'=>'数据修改成功');
                echo json_encode($result);exit;
            }else{
                $result['msg'] = '数据修改失败';
                echo json_encode($result);exit;
            }
        }
        //print_r($_POST);exit;
    }


    //商城设置——物流工具——货到付款
    public function mall_express_tools_cod (){
        $this->smarty->display ( 'mall_express_tools_cod.html' );
    }



    /*****************************/

    /* 商品迁入 */

    public function place_order(){
        $this->common_function->pay_role("seller_goods_immigration");//权限
        $page       = isset ($_POST['curpage']) ? intval ($_POST['curpage']) : 1;
        $season     = array (1 => 'Q1', 2 => 'Q2', 3 => 'Q3',4=>'Q4');
        $rp         = isset ($_POST['rp']) ? $_POST['rp'] : 10;
        $sexs       = array (2 => '男', 1 => '女', 0 => '中性');
        $auth_store = $this->order_model->get_auth_stores ();
        $start      = ($page - 1) * $rp;
        $num        = 0;   //迁入商品数量
        $n          = 0;   //更新商品数量

        if (isset($_GET['op']) && $_GET['op'] == 'page') {
            $auth_store_id = array();
            foreach($auth_store as $ks=>$vs){
                $auth_store_id[] = $vs['auth_store_id'];
            }
            if(empty($auth_store_id)){
                $goods_data = array();$total=0;
            }else{
                $where = ' 1=1 ';
                $search['auth_store_id'] = isset($_POST['auth_store_id'])?trim($_POST['auth_store_id']):'';
                $search['brand_id'] = isset($_POST['brand_id'])?trim($_POST['brand_id']):'';
                $search['gc_id'] = isset($_POST['gc_id'])?trim($_POST['gc_id']):'';
                $search['size'] = isset($_POST['size'])?trim($_POST['size']):'';
                $search['color'] = isset($_POST['color'])?trim($_POST['color']):'';
                $search['sex'] = isset($_POST['sex'])?trim($_POST['sex']):'';
                $search['stocks_price'] = isset($_POST['stocks_price'])?trim($_POST['stocks_price']):'';
                $search['discount'] = isset($_POST['discount'])?trim($_POST['discount']):'';
                $search['year_to_market'] = isset($_POST['year_to_market'])?trim($_POST['year_to_market']):'';
                $search['season_to_market'] = isset($_POST['season_to_market'])?trim($_POST['season_to_market']):'';
                $search['sort'] = isset($_POST['sort'])?trim($_POST['sort']):'';
                $search['goods_image'] = isset($_POST['goods_image'])?trim($_POST['goods_image']):'';
                $search['stocks_sn'] = isset($_POST['stocks_sn'])?trim($_POST['stocks_sn']):'';
                $search['goods_spu'] = isset($_POST['goods_spu'])?trim($_POST['goods_spu']):'';
                //$stocks_db = clone($this->db);

                if($search['gc_id']){
                    $search_gc_id   = $this->common_function->get_son_cate($search['gc_id']);
                    $gc_id_arr      = array();
                    if(!empty($search_gc_id)&&is_array($search_gc_id)){
                        foreach ($search_gc_id as $kc=>$vc){
                            $gc_id_arr[] = $vc['gc_id'];
                        }
                    }
                    $gc_id_arr[]    = $search['gc_id'];
                    $this->db->where_in('g.gc_id',$gc_id_arr);
                }
                if($search['stocks_price']){
                    $search_price   = explode('-',$search['stocks_price']);
                    $start_prcie    = isset($search_price[0])?$search_price[0]:'';
                    $end_prcie      = isset($search_price[1])?$search_price[1]:'';
                    if($start_prcie!=''){
                        $this->db->where("ss.stocks_price>='{$start_prcie}'");
                    }
                    if($end_prcie!=''){
                        $this->db->where("ss.stocks_price<='{$end_prcie}'");
                    }
                }
                if($search['auth_store_id']){
                    $this->db->where('ss.ssa_store_id',$search['auth_store_id']);
                }
                if($search['brand_id']){
                    $this->db->where('g.brand_id',$search['brand_id']);
                }
                if($search['size']){
                    $this->db->where('ss.size',$search['size']);
                }
                if($search['sex']){
                    $this->db->where('g.sex',$search['sex']);
                }
                if($search['year_to_market']){
                    $this->db->where('g.year_to_market',$search['year_to_market']);
                }
                if($search['season_to_market']){
                    $this->db->where('g.season_to_market',$search['season_to_market']);
                }
                if($search['goods_image']){
                    if($search['goods_image']==1){
                        $this->db->where("g.goods_image is not null and g.goods_image!=''");
                    }elseif($search['goods_image']==2){
                        $this->db->where("g.goods_image is null");
                    }
                }
                if($search['stocks_sn']){
                    $this->db->like("ss.stocks_sn ",$search['stocks_sn'],'both');
                }
                if($search['goods_spu']){
                    $this->db->like("g.goods_spu ",$search['goods_spu'],'both');
                }
                $this->db->from('store_stocks_amount ss')
                    ->join('shop_goods g','g.goods_id=ss.goods_id')
                    ->join('shop_goods_extend_attr ge','ge.goods_ea_id=ss.goods_ea_id');
                $this->db->where('ss.ssa_store_id',$search['auth_store_id']);
                $this->db->where('g.goods_state',1);
                $this->db->distinct()->select('ge.goods_a_id');
                $db = clone($this->db);
                $db2 = clone($this->db);
                $this->db->group_by('ge.goods_a_id');
                $total = $this->db->count_all_results();
                //迁入商品
                if (isset($_GET['goods_in']) && $_GET['goods_in']>0) {
                    $this->db = $db2;
                    $this->db->join('store s','s.store_id=ss.ssa_store_id');
                    $this->db->select('ss.ssa_id,ss.goods_id,ss.amount,ss.size,ss.ssa_store_id,ss.goods_size_remark,ss.stocks_sn,ss.stocks_bar_code,ss.color,ss.goods_color_remark,ss.stocks_price,ss.goods_ea_id');
                    //                    $this->db->where_in('ss.ssa_store_id',$auth_store_id);
                    $result = $this->db->get()->result_array();

                    foreach ($result as $g) {
                        $is_exit = $this->db->where('ssa_store_id', $_SESSION['shop_spg_store_id'])->where('goods_ea_id', $g['goods_ea_id'])
                            ->get('store_stocks_amount')->row('ssa_id');
                        if ($is_exit) { //已存在就直接修改库存
                            $row = $this->db->where('ssa_store_id',$_SESSION['shop_spg_store_id'])
                                ->where('ssa_id', $is_exit)
                                ->set('amount', $g['amount'], false)
                                ->update('store_stocks_amount');
                            $row ? $n++ : '';
                        } else {        //不存在就添加数据
                            $store_stocks = array (
                                'ssa_store_id'      => $_SESSION['shop_spg_store_id'],
                                'goods_id'          => $g['goods_id'],
                                'goods_ea_id'       => $g['goods_ea_id'],
                                'stocks_sn'         => $g['stocks_sn'],
                                'stocks_bar_code'   => $g['stocks_bar_code'],
                                'amount'            => $g['amount'],
                                'size'              => $g['size'],
                                'goods_size_remark' => $g['goods_size_remark'],
                                'goods_color_remark'=> $g['goods_color_remark'],
                                'color'             => $g['color'],
                                'update_time'       => time (),
                                'update_user_name'  => $_SESSION['shop_spg_name'],
                                'update_user_id'    => $_SESSION['shop_spg_id'],
                                'update_user_type'  => 2,
                                'stocks_price'      => $g['stocks_price'],
                            );
                            $row = $this->db->insert ('store_stocks_amount', $store_stocks);
                            $row ? $num++ : '';
                        }
                    }
                    if ($num > 0 || $n > 0) {
                        $data = array('state'=>true,'ctr'=>2,'num'=>$num,'n'=>$n);
                    } else {
                        $data = array('state'=>false,'ctr'=>2,'num'=>$num);
                    }
                    echo json_encode ($data);exit;
                }

                //print_r($this->db->last_query());die;
                $start = $rp * ($page - 1);
                $this->db = $db;
                if($search['sort']){
                    if($search['sort']=='selas'){
                        //$this->db->order_by("");
                    }elseif($search['sort']=='stocks'){
                        $this->db->order_by("sum(ss.amount),g.goods_addtime");
                    }
                }else{
                    $this->db->order_by("g.goods_addtime");
                }
                $rows = $this->db->order_by('g.goods_addtime')->limit($rp, $start)->get()->result_array();
                $goods_data = array();
                foreach ($rows as $k=>$v){
                    $goods_info = $this->db->select('g.goods_id,g.goods_name,g.goods_jingle,g.gc_id,g.gc_name,g.brand_id,g.brand_name,g.goods_price,g.goods_marketprice,g.goods_image,g.goods_spu,
        	        g.goods_tag,g.year_to_market,g.season_to_market,g.sex,g.weight,ge.goods_a_id,ge.color,ge.color_remark,ge.stocks_price,ge.stocks_marketprice,ge.stocks_sku,gc.weight as gc_weight')->
                    from('shop_goods_extend_attr ge')->join('shop_goods g','g.goods_id=ge.goods_id')
                        ->join('shop_goods_class gc','gc.gc_id=g.gc_id')
                        ->where('ge.goods_a_id',$v['goods_a_id'])->get()->row_array();
                    $goods_info['sex'] = isset($sexs[$goods_info['sex']])?$sexs[$goods_info['sex']]:'';
                    $goods_info['season_to_market'] = isset($season[$goods_info['season_to_market']])?$season[$goods_info['season_to_market']]:'';
                    $goods_info['weight'] = ($goods_info['weight']>0)?$goods_info['weight']:$goods_info['gc_weight'];
                    $goods_data[$v['goods_a_id']]['sku'] = $goods_info;
                    $this->db->from('store_stocks_amount ss')
                        ->join('store s','s.store_id=ss.ssa_store_id')
                        ->join('shop_goods g','g.goods_id=ss.goods_id')
                        ->join('shop_goods_extend_attr ge','ge.goods_ea_id=ss.goods_ea_id');
                    $this->db->select('ss.amount,ss.size,ss.ssa_store_id,ss.goods_size_remark,s.store_name,ss.stocks_price,ss.update_time,ss.goods_ea_id,ss.ssa_id');
                    $this->db->where('ge.goods_a_id',$v['goods_a_id']);
                    $this->db->where('ss.ssa_store_id',$search['auth_store_id']);
                    $sku_info = $this->db->get()->result_array();
                    $sku = array();$size = array();$size_total = array();$size_total_a = array();$total_amount = 0;
                    foreach($sku_info as $skuk=>$skv){
                        $total_amount +=$skv['amount'];
                        if(isset($size_total_a[$skv['size']])){
                            $size_total_a[$skv['size']] += $skv['amount'];
                        }else{
                            $size_total_a[$skv['size']] = $skv['amount'];
                        }
                        $skv['last_modify_time'] = date('Y-m-d H:i:s',$skv['update_time']);
                        $size[$skv['size']] = $skv['goods_size_remark'];
                        $sku[$skv['ssa_store_id']]['stock_size'][] = $skv;
                        $sku[$skv['ssa_store_id']]['store_name'] = $skv['store_name'];
                        $sku[$skv['ssa_store_id']]['store_id'] = $skv['ssa_store_id'];
                        $sku[$skv['ssa_store_id']]['stocks_price'] = $skv['stocks_price'];

                        if(isset($size_total[$skv['ssa_store_id']])){
                            $size_total[$skv['ssa_store_id']] += $skv['amount'];
                        }else{
                            $size_total[$skv['ssa_store_id']] = $skv['amount'];
                        }

                        $sku[$skv['ssa_store_id']]['size_total'] = $size_total[$skv['ssa_store_id']];
                    }
                    $goods_data[$v['goods_a_id']]['sku_info'] = $sku;
                    $goods_data[$v['goods_a_id']]['sku_size'] = $size;
                    $goods_data[$v['goods_a_id']]['size_total'] = $size_total_a;
                    $goods_data[$v['goods_a_id']]['total'] = $total_amount;

                    if (!$goods_data[$v['goods_a_id']]['sku']['goods_image']){
                        $goods_data[$v['goods_a_id']]['sku']['goods_image'] = PLUGIN . 'data/images/default_goods_image.jpg';
                    }else{
                        $goods_data[$v['goods_a_id']]['sku']['goods_image'] = PLUGIN . 'data/shop/album_pic/' .$goods_data[$v['goods_a_id']]['sku']['goods_image'];
                    }
                    //var_dump ($goods_data[$v['goods_a_id']]);exit;
                }
            }

            $goods_info = $goods_data;
            $goods_info = $goods_info ? $goods_info : 0;
            $total_num = $total;
            $page_count = ceil($total_num / $rp);
            $rows = $goods_data;
            $page_info = array('total_num' => $total_num, 'page_count' => $page_count, 'page' => $page, 'rp' => $rp, 'start' => $start + 1, 'to' => $start + count($rows));
            //print_r($page_info);die;
            $this->smarty->assign('page_info', $page_info);
            $this->smarty->assign('goods_info', $goods_info);
            $body = $this->smarty->fetch('goods_in_list.html');

            echo $body;
        } else {
            $this->load->model('goods_model');
            $brands = $cate_arr = array();
            //$brands = $this->order_model->get_brands();
            $cate_arr = $this->common_function->get_cate_by_parent_id();
            $cate_option = $this->common_function->cate_array_to_option($cate_arr); //分类选项
            $ways = $sizes = array();
            $sizes = $this->order_model->get_sizes();
            $ways = $this->order_model->get_auth_stores();
            $colors = array('黑', '白', '灰', '棕', '红', '橙', '黄', '绿', '青', '蓝', '紫');

            $price_area = array('0-100' => '100以下', '101-200' => '101-200', '201-300' => '201-300', '301-400' => '301-400', '401-500' => '401-500', '501-1001' => '501-1001', '1001-2000' => '1001-2000', '2000' => '2000以上 ');
            $discount_area = array('0-0.3' => '3折以下', '0.31-0.4' => '3.1-4折', '0.41-0.5' => '4.1-5折', '0.5' => '5折以上');
            $years = array(date('Y', time()) + 5, date('Y', time()) + 4, date('Y', time()) + 3, date('Y', time()) + 2, date('Y', time()) + 1, date('Y', time()), date('Y', time()) - 1, date('Y', time()) - 2, date('Y', time()) - 3, date('Y', time()) - 4, date('Y', time()) - 5);
            $quarters = array('1' => '春季', '2' => '夏季', '3' => '秋季', '4' => '冬季');
            $orders = array('selas' => '销量', 'stocks' => '库存');
            $picture = array('1' => '有图', '2' => '无图');

            $search = array('ways' => $ways, 'cate_option' => $cate_option, 'sizes' => $sizes, 'colors' => $colors, 'sexs' => $sexs, 'price_area' => $price_area, 'discount_area' => $discount_area, 'years' => $years, 'quarters' => $quarters, 'orders' => $orders, 'picture' => $picture,);
            $page_info = array('total_num' => 0, 'page_count' => 0, 'page' => 0, 'rp' => $rp, 'start' => $start + 1, 'to' => 0);
            $this->smarty->assign('page_info', $page_info);
            $this->smarty->assign('search', $search);
            $this->smarty->display('goods_in.html');
        }

    }


    //商品迁入页面通过店铺获取授权的品牌
    public function get_goods_in_brands()
    {
        $this->common_function->pay_role("seller_goods_immigration");//权限
        $data       = array ('state' => false, 'info' => '');
        $store_id   = isset ($_GET['store_id']) ? $_GET['store_id'] : false;
        if ($store_id) {
            $brands = $this->db->select('s.brand_id,s.brand_name')->from('store_auth_store ss')
                ->join('shop_brand s','ss.brand_id = s.brand_id')
                ->where('ss.store_id', $_SESSION['shop_spg_store_id'])
                ->where('ss.auth_store_id', $store_id)
                ->order_by('s.brand_sort')->get()->result_array();
            $data = array ('state' => true, 'info'=> $brands);
        }
        echo json_encode ($data);
    }
    
    
    //下载商品 （单个）
    public function goods_download(){
    	$data = array('state' => false, 'msg' => '操作错误');
    	$this->load->library('store_api');
    	if (isset($_GET['op']) && $_GET['op'] == 'submit') {
    		$u_ecs_id = $_SESSION['shop_spg_store_id'];
    		$uec_goods_iiud = isset($_POST['uec_goods_iiud']) ? trim($_POST['uec_goods_iiud']) : false;
    		if ($u_ecs_id && $uec_goods_iiud) {
    			$store_info = $this->store_api->get_store_by_id($u_ecs_id);
    			$store_info['user_id'] = $_SESSION['shop_spg_id'];
    			$store_info['user_name'] = $_SESSION['shop_spg_name'];
    			if ($store_info['ecs_code'] == 2) {         //淘宝
    				$this->load->library('taobao_op');
    				$this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
    				$result = $this->taobao_op->get_goods_by_num_iid($uec_goods_iiud);
    				if ($result['state']) {
    				    $new_props =$result['goods_info']['props'];
    				    $new_cid = $result['goods_info']['cid'];
    				    $resps = $this->taobao_op->get_props_by_cid($new_cid,$new_props);
    					$result['goods_info']['newProps'] = $resps;
    					$result['goods_info']['priceinfo'] = $this->taobao_op->get_ump_promotion($uec_goods_iiud);
    					$result['goods_info']['desc'] = $this->goods_pic($result['goods_info']['desc']);//图片下载
    					$goods_info[] = $result['goods_info'];
    				} else {
    					$data = $result;
    				}
    			} elseif ($store_info['ecs_code'] == 1) {  //京东
    				$this->load->library('jd_op');
    				$this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
    				$result = $this->jd_op->get_goods_info($uec_goods_iiud);
    				if ($result['state']) {
    					$goods_info[] = $result['goods_info'];
    				} else {
    					$data = $result;
    				}
    			}
    			if ($result['state'] && !empty($goods_info)) {
    				$flag = $this->store_api->inner_goods_sync($goods_info, $store_info,true);
    				if ($flag) {
    					$data = array('state' => true, 'msg' => '商品数据同步成功');
    				} else {
    					$data = array('state' => false, 'msg' => '商品数据同步失败');
    				}
    			}
    		} else {
    			$data = array('state' => false, 'msg' => '非法参数');
    		}
    	} else {
    			
    	}
    	echo json_encode($data);
    	exit;
    
    }

    
    //同步商品(全部)
    public function get_store_goods_all() {
        ini_set("max_execution_time", 0);
        set_time_limit(0);
        ignore_user_abort(true);
        $data = array('state' => false, 'msg' => '系统错误！');
        $id = $_SESSION['shop_spg_store_id'];
        $this->load->library('store_api');
        $store_info = $this->store_api->get_store_by_id($id);
        $store_info['user_id'] = $_SESSION['shop_spg_id'];
        $store_info['user_name'] = $_SESSION['shop_spg_name'];
        $store_info['shop_spg_tel'] = $_SESSION['shop_spg_tel'];
        
        
        $this->db->distinct()->select ("sg.goods_id,sg.goods_pos,sa.uec_goods_iiud");
        $this->db->from ('shop_goods as sg');//
        $this->db->join ('store_stocks_amount as sa',' sg.goods_id = sa.goods_id','left');//
        $this->db->where ("sg.goods_pos", $store_info['store_id']); //自建商品
        $this->db->where ("sg.goods_state != 0"); //未删除的
        $this->db->order_by ('goods_id', 'DESC');
        $rowsInfo = $this->db->get ()->result_array ();
        
        if ($store_info['ecs_code'] == 1) {
            $this->load->library('jd_op');
            $this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            $data = $this->jd_op->valid_goods_id();
            print_r($data);die;
            if(!empty($data['goods_info'])){
                $goods_info = $data['goods_info'];$total = count($goods_info);
                $sync_data = array();$p = 40;
                for($ii=0;$ii<=ceil($total/$p);$ii++){
                    if($ii==0){
                        //$sync_data[$ii] = $goods_info;
                    }else{
                        $sync_goods = array();
                        for($k=($ii-1)*$p;$k<$p*$ii;$k++){
                            if($k<$total){
                                $sync_goods[] = $goods_info[$k];
                            }
    
                        }
                        $sync_data[$ii] = $sync_goods;
                    }
                }
                //print_r($sync_data);die;
                foreach ($sync_data as $kk => $vv) {
                    if (!empty($vv)) {
                        if($kk==0){
                            continue;
                            //$this->common_function->https_request(base_url('pay.php/store/get_store_goods_all_limit_del'),http_build_query($post_data),true);
                        }else{
                            $post_data = array('store'=>$store_info,'uec_goods_iiud'=>$vv);
                            $this->common_function->https_request_r(base_url('pay.php/store/get_store_goods_all_limit'),http_build_query($post_data),true);
                        }
                    }
    
                }
                //exec('php '.ROOTPATH.'shop_manage/get_store_goods_all_pf '. urlencode(json_encode($sync_data)),$output,$return_var);
                //print_r($output);print_r($return_var);
                $data = array('state' => true, 'msg' => '商品已同步');
                echo  json_encode($data);
                exit;
    
    
            }else{
                echo  json_encode($data);exit;
            }
    
        } elseif ($store_info['ecs_code'] == 2) {
            $this->load->library('taobao_op');
            $this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            $data = $this->taobao_op->get_all_goods_num_iid();

            $goods_info = $data['info'];
            $new_res = array();
            foreach ($goods_info as $ke=>$ks){
                $new_res[$ks['num_iid']] =$ks['num_iid'];
            }

            if($rowsInfo && !empty($new_res)){
                foreach ($rowsInfo  as $keys=>$vals){
                    $iiuds = $vals['uec_goods_iiud'];
                    if(!isset($new_res[$iiuds])){
                        // $this->db->trans_off(); //禁用事务
                        // $this->db->trans_start(); //开启事务
                        $this->db->where('goods_id',$vals['goods_id'])->delete('shop_goods_images');
                        $this->db->where('goods_id',$vals['goods_id'])->delete('shop_goods_extend_attr');
                        $this->db->where('goods_id',$vals['goods_id'])->delete('shop_goods_extend');
                        $this->db->where('goods_id',$vals['goods_id'])->delete ('shop_goods_attr_self_taxonomy');
                        $this->db->where('goods_id',$vals['goods_id'])->delete ('shop_goods_attr_index');
                        $this->db->where('goods_id',$vals['goods_id'])->where('ssa_store_id',$store_info['store_id'])->delete('store_stocks_amount');
                        $this->db->where('goods_id',$vals['goods_id'])->where('goods_pos',$store_info['store_id'])->delete('shop_goods');
                        // $this->db->trans_complete(); //事务完成
                        // $this->db->trans_off(); //禁用事务
                    }
                }
            }
            $last_sync_time = time();
            $create_time = time();
            if(!empty($goods_info)){
                $total = count($goods_info);
                $sync_data = array();$p = 20;
                for($ii=0;$ii<=ceil($total/$p);$ii++){
                    if($ii==0){
                        //$sync_data[$ii] = $goods_info;
                    }else{
                        $sync_goods = array();
                        for($k=($ii-1)*$p;$k<$p*$ii;$k++){
                            if($k<$total){
                                $sync_goods[] = $goods_info[$k];
                            }
    
                        }
                        $sync_data[$ii] = $sync_goods;
                    }
                } 
                $order = 1;
                $sync_goods[] = $goods_info[0];
                //$sync_data[1] =  $sync_goods;
                foreach ($sync_data as $kk =>$vv) {
                    if (!empty($vv)) {
                        if($kk==0){
                            continue;
                            //$this->common_function->https_request(base_url('pay.php/store/get_store_goods_all_limit_del'),http_build_query($post_data),true);
                        }else{
                            $post_data = array('store'=>$store_info,'uec_goods_iiud'=>$vv,'order'=>$order);
                              /* $goodsAlls = array();
                             foreach ($vv as $ki => $vi) {
                                $res = $this->taobao_op->get_goods_by_num_iid($vi['num_iid']);
                                $cid_info = $this->taobao_op->get_a_cate($vi['cid']);
                                $cid_name = '淘宝分类';
                                if($cid_info['state']){
                                    if(isset($cid_info['info'][0]) && !empty($cid_info['info'][0])){
                                        $cid_name = $cid_info['info'][0]['name'];
                                    }
                                }
                                if ($res['state'] && isset($res['goods_info'])) {
                                     $infores = $res['goods_info'];
                                     $infores['priceinfo'] = $this->taobao_op->get_ump_promotion($vi['num_iid']);
                                     $infores['cid_name'] = $cid_name;
                                     $goodsAlls[] = $infores;
                                }
                             }
                             
                             if(!empty($goodsAlls)){
                                $this->store_api->inner_goods_sync($goodsAlls, $store_info,true,$order);
                            }  */
                           
                           $this->common_function->https_request_r(base_url('pay.php/store/get_store_goods_all_limit'),http_build_query($post_data),true);
                           $order++;
                        }
                    }
    
                }
                $data = array('state' => true, 'msg' => '商品数据正在后台同步中，请耐心等候！！');
                echo  json_encode($data);
                exit;
    
    
            }else{
                echo  json_encode($data['data']);exit;
            }
        }
        echo  json_encode($data);exit;
    }

    
    //多线程同步商品(全部)
    public function get_store_goods_all_limit() {
        ini_set("max_execution_time", 0);
        set_time_limit(0);
        ignore_user_abort(true);
        $data = $_POST['uec_goods_iiud'];
        $store_info = $_POST['store'];
        $order = $_POST['order'];
    	$this->load->library('store_api');
    	$goodsAll = array();
    	$times = date('Y-m-d H:i:s');
    	
    	file_put_contents(ROOTPATH.'logs/stores/'.$store_info['store_id'].'/goods_run_log_'.date('Y-m-d').'.txt','执行第'.$order.'次线程任务      ||'. $times.'店铺'.$store_info['store_id'].'开始手动同步  '.count($data).'个商品'.PHP_EOL,FILE_APPEND);
    	if($store_info['ecs_code'] == 1){
    		$this->load->library('jd_op');
    		$this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
    		foreach ($data as $ki => $vi) {
    			$res = $this->jd_op->ware_get_request($vi);
    			if ($res->code == 0) {
    				$goodsAll[] = $res->ware;
    			} else {
    				continue;
    			}
    		}
    	}elseif($store_info['ecs_code'] == 2){
    		$this->load->library('taobao_op');
    		$this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
    		foreach ($data as $ki => $vi) {
    			$res = $this->taobao_op->get_goods_by_num_iid($vi['num_iid']);
    			$cid_info = $this->taobao_op->get_a_cate($vi['cid']);
    			$cid_name = '淘宝分类';
    			if($cid_info['state']){
    			    if(isset($cid_info['info'][0]) && !empty($cid_info['info'][0])){
    			        $cid_name = $cid_info['info'][0]['name'];
    			    }
    			}
    			if ($res['state'] && isset($res['goods_info'])) {
    			     $infores = $res['goods_info'];
		             $infores['priceinfo'] = $this->taobao_op->get_ump_promotion($vi['num_iid']);
		             $infores['cid_name'] = $cid_name;
    			    $goodsAll[] = $infores;
    			}else{
    			    file_put_contents(ROOTPATH.'logs/stores/'.$store_info['store_id'].'/goods_run_log_'.date('Y-m-d').'.txt','执行第'.$order.'次线程任务      ||'.$times.'店铺'.$store_info['store_id'].'   商品   '.$vi['num_iid'].'获取详情失败'.$res['msg'].PHP_EOL,FILE_APPEND);
    			}
    		}
    
    	}
    	if(!empty($goodsAll)){
    		$flag = $this->store_api->inner_goods_sync($goodsAll, $store_info,true,$order);
    		if ($flag) {
    		     file_put_contents(ROOTPATH.'logs/stores/'.$store_info['store_id'].'/goods_run_log_'.date('Y-m-d').'.txt','执行第'.$order.'次线程任务      ||'. $times.'店铺'.$store_info['store_id'].'   手动同步商品成功  同步 '.count($goodsAll).'个商品'.PHP_EOL,FILE_APPEND);
    		} else {
    			 file_put_contents(ROOTPATH.'logs/stores/'.$store_info['store_id'].'/goods_run_log_'.date('Y-m-d').'.txt','执行第'.$order.'次线程任务      ||'.  $times.'店铺'.$store_info['store_id'].'    手动同步商品失败'.PHP_EOL,FILE_APPEND);
    		}
    	}
    
    }
    
    
    //同步商品品牌
    public function goods_brand_tongbu(){
        ini_set("max_execution_time", 0);
        set_time_limit(0);
        ignore_user_abort(true);
        $id = isset($_GET['id']) && !empty($_GET['id']) ? explode (',', $_GET['id']) :false;
        //print_r($id);die;
        if($id==false){
            $this->db->distinct()->select ("sg.goods_id,sg.goods_name,sg.pc_desc,(select  min(uec_goods_iiud)  from `jk_store_stocks_amount` AS `sta`   where `sg`.`goods_id` = `sta`.`goods_id` and `ssa_store_id`={$_SESSION['shop_spg_store_id']} ) uec_goods_iiud ");
            $this->db->from ('shop_goods as sg');//
            $this->db->where ("sg.goods_pos", $_SESSION['shop_spg_store_id']); //自建商品
            $this->db->join ('shop_goods_class as sgc', 'sgc.gc_id = sg.gc_id', 'left');
            $this->db->where ("sg.goods_state != 0"); //未删除的
            $this->db->order_by ('goods_id', 'DESC');
            $rows = $this->db->get ()->result_array ();
            //print_r($rows);die;
        }else{
            foreach ($id as $ks=>$vs){
                $this->db->distinct()->select ("sg.goods_id,sg.goods_name,sg.pc_desc,(select  min(uec_goods_iiud)  from `jk_store_stocks_amount` AS `sta`   where `sg`.`goods_id` = `sta`.`goods_id` and `ssa_store_id`={$_SESSION['shop_spg_store_id']} ) uec_goods_iiud ");
                $this->db->from ('shop_goods as sg');
                $this->db->join ('shop_goods_class as sgc', 'sgc.gc_id = sg.gc_id', 'left');
                $this->db->where ('sg.goods_id',$vs);
                $rows[]= $this->db->get ()->row_array ();
            }
        }
        if(!$rows){
            echo json_encode (array ('state' => false, 'msg' => '参数错误！'));
            exit;
        }
        //print_r($rows);die;exit;
        $total = count($rows);
        
        
        
        $data = array ('state' => false, 'msg' => '系统错误！');
        $store_id = $_SESSION['shop_spg_store_id'];
        $this->load->library('store_api');
        $store_info = $this->store_api->get_store_by_id($store_id);
        
        
        $file_name = ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt';
        if (!is_dir(ROOTPATH . 'logs/stores/'.$store_id)) {
            @mkdir(ROOTPATH . 'logs/stores/'. $store_id);
        }
        if(!file_exists($file_name)){
            touch($file_name);
        }
        
        /*  if($total>=100){
            $sync_data = array();$p = 50;
            for($ii=1;$ii<=ceil($total/$p);$ii++){
                $sync_goods = array();
                for($k=($ii-1)*$p;$k<$p*$ii;$k++){
                    if($k<$total){
                        $sync_goods[] = $rows[$k];
                    }
                } 
                $sync_data[$ii-1] = $sync_goods;
            }
            foreach ($sync_data as $kk => $vv) {
                if (!empty($vv)) {
                    $post_data = array('store'=>$store_info,'uec_goods_iiud'=>$vv);
                    $this->common_function->https_request_r(base_url('pay.php/store/goods_brand_tongbu_limit'),http_build_query($post_data),true);
                }
            
            }
        }else{  */
            file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺 ：'.$store_id ." 开始单线程同步品牌信息".PHP_EOL.PHP_EOL,FILE_APPEND);
            if ($store_info['ecs_code'] == 1) {
                $this->load->library('jd_op');
                $this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
                $data = $this->jd_op->valid_goods_id();
            
            } elseif ($store_info['ecs_code'] == 2) {
                $this->load->library('taobao_op');
                $this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
                foreach ($rows  as $key=>$val){
                   if($val['pc_desc']){
                        $pc_desc = $this->goods_pic($val['pc_desc'],$val['goods_id']);
                        if($pc_desc){
                            $this->db->update('shop_goods',array("pc_desc"=>$pc_desc,),array('goods_id'=>$val['goods_id']));
                            $error = $this->db->error();
                            if($error['code']==0){
                             file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt','商品 ：'.$val['goods_id'] ."  --保存描述中的图片".PHP_EOL,FILE_APPEND);
                            }
                         }
                    }
            
                    $res = $this->taobao_op->get_goods_by_num_iid($val['uec_goods_iiud']);
                    //print_r( $res );die;
                    if ($res['state'] && isset($res['goods_info'])) {
                        $infores = $res['goods_info'];
                        $new_cid = $infores['cid'];
                        $new_props =$infores['props'];
                        $resps = $this->taobao_op->get_props_by_cid($new_cid,$new_props);
                        //abckids儿童书包新款超轻小学生男女童双肩简约条纹儿童书包
                        if(!$resps['state']){
                            $resps = array();
                            sleep(3);
                            $resps = $this->taobao_op->get_props_by_cid($new_cid,$new_props);
                            if(!$resps['state']){
                                file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'商品 ：'.$val['goods_id'] ."errorMsg:".$resps['msg'].PHP_EOL,FILE_APPEND);
                            }
                        }
                        
                        $goods_brand = '';$goods_brand_name='其他';$spu_sex=0;
                        if($resps['state']){
                            if($resps['propsInfo']){
                                if(!isset($resps['propsInfo'][0])){
                                    $resps_propsInfo = $resps['propsInfo'];
                                    $resps['propsInfo'] = array();
                                    $resps['propsInfo'][0] = $resps_propsInfo;
                                }
                                foreach ($resps['propsInfo'] as $ks=>$vs){
                                    if(isset($vs['pid']) && isset($vs['name'])){
                                        if($vs['pid']==20000){
                                            $goods_brand_name = strtoupper($vs['name']);
                                            $check_brand = $this->db->select('brand_id,brand_name')->from('shop_brand')->where('brand_name',$goods_brand_name)->get()->row_array();
                                            if($check_brand){
                                                $goods_brand =$check_brand['brand_id'];
                                                $goods_brand_name =$check_brand['brand_name'];
                                            }else{
                                                $brand_initial = $this->common_function->getFirstCharter($goods_brand_name);
                                                $this->db->insert('shop_brand',array('brand_name'=>$goods_brand_name,'brand_initial'=>$brand_initial,'is_true'=>1));
                                                $goods_brand = $this->db->insert_id();
                                            }
                                        }elseif($vs['pid']==24477){
                                            if(stripos($vs['name'],"男")!==false){
                                                $spu_sex = 2;
                                            }elseif(stripos($vs['name'],"女")!==false){
                                                $spu_sex = 1;
                                            }else{
                                                $spu_sex = 0;
                                            }
                                        }
                                    }
                                }
                                if($goods_brand_name=='其他'){
                                    if(stripos($infores['input_pids'],"20000")!==false){
                                        $input_str =explode(",",$infores['input_str']);
                                        if(stripos($input_str[0],";")!==false){
                                            $input_str =explode(";",$input_str[0]);
                                        }
                                        $goods_brand_name = strtoupper($input_str[0]);
                                        $check_brand = $this->db->select('brand_id,brand_name')->from('shop_brand')->where('brand_name',$goods_brand_name)->get()->row_array();
                                        if($check_brand){
                                            $goods_brand =$check_brand['brand_id'];
                                            $goods_brand_name =$check_brand['brand_name'];
                                        }else{
                                            $brand_initial = $this->common_function->getFirstCharter($goods_brand_name);
                                            $this->db->insert('shop_brand',array('brand_name'=>$goods_brand_name,'brand_initial'=>$brand_initial,'is_true'=>1));
                                            $goods_brand = $this->db->insert_id();
                                        }
                                    }
                                }
                                $this->db->update('shop_goods',array("brand_id"=>$goods_brand,"brand_name"=>$goods_brand_name,"sex"=>$spu_sex,),array('goods_id'=>$val['goods_id']));
                                $error = $this->db->error();
                                if($error['code']==0){
                                   file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'商品 ：'.$val['goods_id'] ." 品牌：brand_id--".$goods_brand."|| brand_name--".$goods_brand_name.PHP_EOL,FILE_APPEND);
                                }
                            }
                        }else{
                            if($goods_brand_name=='其他'){
                                if(stripos($infores['input_pids'],"20000")!==false){
                                    $input_str =explode(",",$infores['input_str']);
                                    if(stripos($input_str[0],";")!==false){
                                        $input_str =explode(";",$input_str[0]);
                                    }
                                    $goods_brand_name = strtoupper($input_str[0]);
                                    $check_brand = $this->db->select('brand_id,brand_name')->from('shop_brand')->where('brand_name',$goods_brand_name)->get()->row_array();
                                    if($check_brand){
                                        $goods_brand =$check_brand['brand_id'];
                                        $goods_brand_name =$check_brand['brand_name'];
                                    }else{
                                        $brand_initial = $this->common_function->getFirstCharter($goods_brand_name);
                                        $this->db->insert('shop_brand',array('brand_name'=>$goods_brand_name,'brand_initial'=>$brand_initial,'is_true'=>1));
                                        $goods_brand = $this->db->insert_id();
                                    }
                                }
                            }
                            $this->db->update('shop_goods',array("brand_id"=>$goods_brand,"brand_name"=>$goods_brand_name,"sex"=>$spu_sex,),array('goods_id'=>$val['goods_id']));
                            $error = $this->db->error();
                            if($error['code']==0){
                                file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'商品 ：'.$val['goods_id'] ." 品牌：brand_id--".$goods_brand."|| brand_name--".$goods_brand_name.PHP_EOL,FILE_APPEND);
                            }
                        }
                    }
            
                }
            }
            $data = array ('state' =>true, 'msg' => '商品品牌信息同步完成！');
            file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺 ：'.$store_id ." 完成同步品牌信息".PHP_EOL.PHP_EOL,FILE_APPEND);
            echo json_encode ($data);
            exit;
        /*  } */ 
        
    }

    
    //多线程同步商品品牌
    public function goods_brand_tongbu_limit(){
        ini_set("max_execution_time", 0);
        set_time_limit(0);
        ignore_user_abort(true);
        $rows = $_POST['uec_goods_iiud'];
        $store_info = $_POST['store'];
        $this->load->library('store_api');
        $store_id = $store_info['store_id'];

        file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺 ：'.$store_id ." 开始多线程同步品牌信息".PHP_EOL.PHP_EOL,FILE_APPEND);
        if ($store_info['ecs_code'] == 1) {
            $this->load->library('jd_op');
            $this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            $data = $this->jd_op->valid_goods_id();
            
        } elseif ($store_info['ecs_code'] == 2) {
            $this->load->library('taobao_op');
            $this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            foreach ($rows  as $key=>$val){
               if($val['pc_desc']){
                    $pc_desc = $this->goods_pic($val['pc_desc'],$val['goods_id']);
                    if($pc_desc){
                        $this->db->update('shop_goods',array("pc_desc"=>$pc_desc,),array('goods_id'=>$val['goods_id']));
                        $error = $this->db->error();
                        if($error['code']==0){
                        file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt','商品 ：'.$val['goods_id'] ."  --保存描述中的图片".PHP_EOL,FILE_APPEND);
                    }
                    }
                }
        
                $res = $this->taobao_op->get_goods_by_num_iid($val['uec_goods_iiud']);
                if ($res['state'] && isset($res['goods_info'])) {
                    $infores = $res['goods_info'];
                    $new_cid = $infores['cid'];
                    $new_props =$infores['props'];
                    $resps = $this->taobao_op->get_props_by_cid($new_cid,$new_props);
                    if(!$resps['state']){
                        sleep(3);
                        $resps = $this->taobao_op->get_props_by_cid($new_cid,$new_props);
                        if(!$resps['state']){
                            file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'商品 ：'.$val['goods_id'] ."errorMsg:".$resps['msg'].PHP_EOL,FILE_APPEND);
                        }
                    }
                    
                    $goods_brand = '';$goods_brand_name='其他';$spu_sex=0;
                    if($resps['state']){
                        if($resps['propsInfo']){
                            if(!isset($resps['propsInfo'][0])){
                                $resps_propsInfo = $resps['propsInfo'];
                                $resps['propsInfo'] = array();
                                $resps['propsInfo'][0] = $resps_propsInfo;
                            }
                            foreach ($resps['propsInfo'] as $ks=>$vs){
                                if(isset($vs['pid']) && isset($vs['name'])){
                                    if($vs['pid']==20000){
                                        $goods_brand_name = strtoupper($vs['name']);
                                        $check_brand = $this->db->select('brand_id,brand_name')->from('shop_brand')->where('brand_name',$goods_brand_name)->get()->row_array();
                                        if($check_brand){
                                            $goods_brand =$check_brand['brand_id'];
                                            $goods_brand_name =$check_brand['brand_name'];
                                        }else{
                                            $brand_initial = $this->common_function->getFirstCharter($goods_brand_name);
                                            $this->db->insert('shop_brand',array('brand_name'=>$goods_brand_name,'brand_initial'=>$brand_initial,'is_true'=>1));
                                            $goods_brand = $this->db->insert_id();
                                        }
                                    }elseif($vs['pid']==24477){
                                        if(stripos($vs['name'],"男")!==false){
                                            $spu_sex = 2;
                                        }elseif(stripos($vs['name'],"女")!==false){
                                            $spu_sex = 1;
                                        }else{
                                            $spu_sex = 0;
                                        }
                                    }
                                }
                            }
                            if($goods_brand_name=='其他'){
                                if(stripos($infores['input_pids'],"20000")!==false){
                                    $input_str =explode(",",$infores['input_str']);
                                    if(stripos($input_str[0],";")!==false){
                                        $input_str =explode(";",$input_str[0]);
                                    }
                                    $goods_brand_name = strtoupper($input_str[0]);
                                    $check_brand = $this->db->select('brand_id,brand_name')->from('shop_brand')->where('brand_name',$goods_brand_name)->get()->row_array();
                                    if($check_brand){
                                        $goods_brand =$check_brand['brand_id'];
                                        $goods_brand_name =$check_brand['brand_name'];
                                    }else{
                                        $brand_initial = $this->common_function->getFirstCharter($goods_brand_name);
                                        $this->db->insert('shop_brand',array('brand_name'=>$goods_brand_name,'brand_initial'=>$brand_initial,'is_true'=>1));
                                        $goods_brand = $this->db->insert_id();
                                    }
                                }
                            }
                            $this->db->update('shop_goods',array("brand_id"=>$goods_brand,"brand_name"=>$goods_brand_name,"sex"=>$spu_sex,),array('goods_id'=>$val['goods_id']));
                            $error = $this->db->error();
                            if($error['code']==0){
                            file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'商品 ：'.$val['goods_id'] ." 品牌：brand_id--".$goods_brand."|| brand_name--".$goods_brand_name.PHP_EOL,FILE_APPEND);
                           }
                        }
                    }else{
                            if($goods_brand_name=='其他'){
                                if(stripos($infores['input_pids'],"20000")!==false){
                                    $input_str =explode(",",$infores['input_str']);
                                    if(stripos($input_str[0],";")!==false){
                                        $input_str =explode(";",$input_str[0]);
                                    }
                                    $goods_brand_name = strtoupper($input_str[0]);
                                    $check_brand = $this->db->select('brand_id,brand_name')->from('shop_brand')->where('brand_name',$goods_brand_name)->get()->row_array();
                                    if($check_brand){
                                        $goods_brand =$check_brand['brand_id'];
                                        $goods_brand_name =$check_brand['brand_name'];
                                    }else{
                                        $brand_initial = $this->common_function->getFirstCharter($goods_brand_name);
                                        $this->db->insert('shop_brand',array('brand_name'=>$goods_brand_name,'brand_initial'=>$brand_initial,'is_true'=>1));
                                        $goods_brand = $this->db->insert_id();
                                    }
                                }
                            }
                            $this->db->update('shop_goods',array("brand_id"=>$goods_brand,"brand_name"=>$goods_brand_name,"sex"=>$spu_sex,),array('goods_id'=>$val['goods_id']));
                            $error = $this->db->error();
                            if($error['code']==0){
                                file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'商品 ：'.$val['goods_id'] ." 品牌：brand_id--".$goods_brand."|| brand_name--".$goods_brand_name.PHP_EOL,FILE_APPEND);
                            }
                        }
                }
        
            }
        }
        file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_brand_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺 ：'.$store_id ." 完成同步品牌信息".PHP_EOL.PHP_EOL,FILE_APPEND);
        return  true;
    }
    
    
    //同步商品评价 销量
    public function goods_evaluate_tongbu(){
        ini_set("max_execution_time", 0);
        set_time_limit(0);
        ignore_user_abort(true);
        $id = isset($_GET['id']) && !empty($_GET['id']) ? explode (',', $_GET['id']) :false;
        //print_r($id);die;
        if($id==false){
            $this->db->distinct()->select ("sg.goods_id,sg.goods_name,sg.pc_desc,(select  min(uec_goods_iiud)  from `jk_store_stocks_amount` AS `sta`   where `sg`.`goods_id` = `sta`.`goods_id` and `ssa_store_id`={$_SESSION['shop_spg_store_id']} ) uec_goods_iiud ");
            $this->db->from ('shop_goods as sg');//
            $this->db->where ("sg.goods_pos", $_SESSION['shop_spg_store_id']); //自建商品
            $this->db->join ('shop_goods_class as sgc', 'sgc.gc_id = sg.gc_id', 'left');
            $this->db->where ("sg.goods_state != 0"); //未删除的
            $this->db->order_by ('goods_id', 'DESC');
            $rows = $this->db->get ()->result_array ();
            //print_r($rows);die;
        }else{
            foreach ($id as $ks=>$vs){
                $this->db->distinct()->select ("sg.goods_id,sg.goods_name,sg.pc_desc,(select  min(uec_goods_iiud)  from `jk_store_stocks_amount` AS `sta`   where `sg`.`goods_id` = `sta`.`goods_id` and `ssa_store_id`={$_SESSION['shop_spg_store_id']} ) uec_goods_iiud ");
                $this->db->from ('shop_goods as sg');
                $this->db->join ('shop_goods_class as sgc', 'sgc.gc_id = sg.gc_id', 'left');
                $this->db->where ('sg.goods_id',$vs);
                $rows[]= $this->db->get ()->row_array ();
            }
        }
        if(!$rows){
            echo json_encode (array ('state' => false, 'msg' => '参数错误！'));
            exit;
        }
        //print_r($rows);die;exit;
        $total = count($rows);
        
        $data = array ('state' => false, 'msg' => '系统错误！');
        $store_id = $_SESSION['shop_spg_store_id'];
        $this->load->library('store_api');
        $store_info = $this->store_api->get_store_by_id($store_id);
        
        $file_name = ROOTPATH.'logs/stores/'.$store_id.'/goods_sold_log_'.date('Y-m-d').'.txt';
        if (!is_dir(ROOTPATH . 'logs/stores/'.$store_id)) {
            @mkdir(ROOTPATH . 'logs/stores/'. $store_id);
        }
        if(!file_exists($file_name)){
            touch($file_name);
        }
        
        if($total>=100){
            $sync_data = array();$p = 50;
            for($ii=1;$ii<=ceil($total/$p);$ii++){
                $sync_goods = array();
                for($k=($ii-1)*$p;$k<$p*$ii;$k++){
                    if($k<$total){
                        $sync_goods[] = $rows[$k];
                    }
                }
                $sync_data[$ii-1] = $sync_goods;
            }
            foreach ($sync_data as $kk => $vv) {
                if (!empty($vv)) {
                    $post_data = array('store'=>$store_info,'uec_goods_iiud'=>$vv);
                    $this->common_function->https_request_r(base_url('pay.php/store/goods_evaluate_tongbu_limit'),http_build_query($post_data),true);
                }
        
            }
        }else{
            file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_sold_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺 ：'.$store_id ." 开始单线程同步评价信息".PHP_EOL.PHP_EOL,FILE_APPEND);
            if ($store_info['ecs_code'] == 1) {
                $this->load->library('jd_op');
                $this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
                $data = $this->jd_op->valid_goods_id();
        
            } elseif ($store_info['ecs_code'] == 2) {
                $this->load->library('taobao_op');
                $this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
                $sold_quantity = $this->taobao_op->get_all_goods_num_iid();//同步销量
                $sold_arr = array();
                if($sold_quantity['info']){
                    foreach ($sold_quantity['info'] as $key=>$val){
                        $sold_arr[$val['num_iid']] = $val['sold_quantity'];
                    }
                }
                foreach ($rows  as $key=>$val){
                    $sold_num = 0;
                    if($sold_arr){
                        $sold_num = $sold_arr[$val['uec_goods_iiud']];
                    }
                    $this->db->update('shop_goods',array('goods_salenum'=>$sold_num),array("goods_id"=>$val['goods_id']));
                    $error = $this->db->error();
                    if($error['code']==0){
                        file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_sold_log_'.date('Y-m-d').'.txt','商品 ：'.$val['goods_id'] ."更新销量".PHP_EOL,FILE_APPEND);
                    }
                    $traderates = $this->taobao_op->get_taobao_traderates($val['uec_goods_iiud']);//同步评价信息
                    if($traderates['state'] && $traderates['traderates']['total']){
                        $trade_rate = $traderates['traderates']['trade_rate'];
                        $evaluations = array();
                        foreach ($trade_rate as $ks=>$vs){
                            if($vs['result']=='good'){
                                $evaluation['evaluation_level'] = 5;
                            }elseif ($vs['result']=='neutral'){
                                $evaluation['evaluation_level'] = 3;
                            }else{
                                $evaluation['evaluation_level'] = 1;
                            }
                            $evaluation['order_sn'] = $vs['tid'];
                            $evaluation['goods_id'] = $val['goods_id'];
                            $evaluation['goods_name'] = $val['goods_name'];
                            $evaluation['buyer_nickname'] = $this->taobao_op->secret($vs['nick'],$type='simple');//解密
                            $evaluation['evaluation_state'] = '1';
                            $evaluation['evaluation_time'] = strtotime($vs['created']);
                            $evaluation['evaluation_content'] = $vs['content'];
                            $evaluations[] = $evaluation;
                        }
                        $this->db->insert_batch('shop_order_goods',$evaluations);
                        $error = $this->db->error();
                        if($error['code']==0){
                            file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_sold_log_'.date('Y-m-d').'.txt','商品 ：'.$val['goods_id'] ."添加评价信息".PHP_EOL,FILE_APPEND);
                        }
                    }
        
                }
            }
            $data = array ('state' =>true, 'msg' => '商品评价信息同步完成！');
            file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_sold_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺 ：'.$store_id ." 完成同步评价信息".PHP_EOL.PHP_EOL,FILE_APPEND);
            echo json_encode ($data);
            exit;
        }
    }

    
    //多线程同步商品评价 销量
    public function goods_evaluate_tongbu_limit(){
        ini_set("max_execution_time", 0);
        set_time_limit(0);
        ignore_user_abort(true);
        $rows = $_POST['uec_goods_iiud'];
        $store_info = $_POST['store'];
        $this->load->library('store_api');
        $store_id = $store_info['store_id'];
        
        file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_sold_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺 ：'.$store_id ." 开始多线程同步评价信息".PHP_EOL.PHP_EOL,FILE_APPEND);
        if ($store_info['ecs_code'] == 1) {
            $this->load->library('jd_op');
            $this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            $data = $this->jd_op->valid_goods_id();
        
        } elseif ($store_info['ecs_code'] == 2) {
            $this->load->library('taobao_op');
            $this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            $sold_quantity = $this->taobao_op->get_all_goods_num_iid();//同步销量
            $sold_arr = array();
            if($sold_quantity['info']){
                foreach ($sold_quantity['info'] as $key=>$val){
                    $sold_arr[$val['num_iid']] = $val['sold_quantity'];
                }
            }
            foreach ($rows  as $key=>$val){
                $sold_num = 0;
                if($sold_arr){
                    $sold_num = $sold_arr[$val['uec_goods_iiud']];
                }
                $this->db->update('shop_goods',array('goods_salenum'=>$sold_num),array("goods_id"=>$val['goods_id']));
                $error = $this->db->error();
                if($error['code']==0){
                    file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_sold_log_'.date('Y-m-d').'.txt','商品 ：'.$val['goods_id'] ."更新销量".PHP_EOL,FILE_APPEND);
                }
                $traderates = $this->taobao_op->get_taobao_traderates($val['uec_goods_iiud']);//同步评价信息
                if($traderates['state'] && $traderates['traderates']['total']){
                    $trade_rate = $traderates['traderates']['trade_rate'];
                    $evaluations = array();
                    foreach ($trade_rate as $ks=>$vs){
                        if($vs['result']=='good'){
                            $evaluation['evaluation_level'] = 5;
                        }elseif ($vs['result']=='neutral'){
                            $evaluation['evaluation_level'] = 3;
                        }else{
                            $evaluation['evaluation_level'] = 1;
                        }
                        $evaluation['order_sn'] = $vs['tid'];
                        $evaluation['goods_id'] = $val['goods_id'];
                        $evaluation['goods_name'] = $val['goods_name'];
                        $evaluation['buyer_nickname'] = $this->taobao_op->secret($vs['nick'],$type='simple');//解密
                        $evaluation['evaluation_state'] = '1';
                        $evaluation['evaluation_time'] = strtotime($vs['created']);
                        $evaluation['evaluation_content'] = $vs['content'];
                        $evaluations[] = $evaluation;
                    }
                    $this->db->insert_batch('shop_order_goods',$evaluations);
                    $error = $this->db->error();
                    if($error['code']==0){
                       file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_sold_log_'.date('Y-m-d').'.txt','商品 ：'.$val['goods_id'] ."添加评价信息".PHP_EOL,FILE_APPEND);
                    }
                }
            }
        }
        file_put_contents(ROOTPATH.'logs/stores/'.$store_id.'/goods_sold_log_'.date('Y-m-d').'.txt',date('Y-m-d H:i:s').'店铺 ：'.$store_id ." 完成同步评价信息".PHP_EOL.PHP_EOL,FILE_APPEND);
        return  true;
    }
    
    
    //商品导入
    public function goods_import(){

        include VIEWPATH.'file_handle.html';
        $condition = $this->input->get();
        $condition['store_id'] = $_SESSION['shop_spg_store_id'];
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
            //如果在队列中，任务完成之后删除记录
            if ($_GET['id']) {
                $task['task_id'] = $_GET['id'];
                if ($task['task_id']) {
                    $row = $this->common_function->queue_out($task);
                }
            }
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
            //如果在队列中，任务完成之后删除记录
            if ($_GET['id']) {
                $task['task_id'] = $_GET['id'];
                if ($task['task_id']) {
                    $row = $this->common_function->queue_out($task);
                }
            }
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
                if(empty($excel['gc_id'])){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("该分类不存在，请检查是否填写正确", "GBK", "UTF-8");
                    }
                    $false_msg .= "该分类不存在，请检查是否填写正确";
                    $flag = true;
                }else{
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
                }

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
                ->where('g.brand_id',$excel['brand_id'])->where('g.goods_pos !=0')->where('g.goods_state!=0')->get()->row_array();
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
                if(is_numeric($time_to_market)){
                    $time_to_market = ($time_to_market-25569) * 24*60*60-8*3600; //获得秒数
                    $excel['year_to_market'] = date('Y',$time_to_market); //获得日期
                    $month = date('m',$time_to_market); //获得日期
                    $excel['season_to_market'] = $season[$month]; //获得季节
                }else{
                    $time_to_market = strtotime($time_to_market); //获得秒数
                    $excel['year_to_market'] = date('Y',$time_to_market); //获得日期
                    $month = date('m',$time_to_market); //获得日期
                    $excel['season_to_market'] = $season[$month]; //获得季节
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
                $goods_info = $this->db->select('e.goods_id,e.goods_a_id')->from('shop_goods_extend e')
                ->join('shop_goods g','g.goods_id=e.goods_id')->where('g.goods_spu',$excel['goods_spu'])
                ->where('g.brand_id',$excel['brand_id'])->where('g.goods_pos',0)->where('g.goods_state !=0')
                ->where('e.color',$excel['color'])->where('e.color_remark',$excel['color_remark'])->get()->row_array();
                $discount = $excel['goods_price']/$excel['goods_marketprice'];
                $all_gc_id = $this->common_function->get_parent_class($excel['gc_id']);
                $all_gc_id = array_reverse($all_gc_id);
                //print_r($goods_info);
                if(empty($goods_info)){
                    $goods_info = $this->db->select('goods_id')->from('shop_goods')
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
                            'season_to_market'=>$excel['season_to_market'],'sex'=>$excel['sex'],'goods_pos'=>$condition['store_id'],'goods_state'=>1
                        );
                        $this->db->insert('shop_goods',$goods_in);
                        $goods_id = $this->db->insert_id();
                    }else{
                        $goods_up = array(
                            /* 'goods_name'=>$excel['goods_name'],'gc_id'=>$excel['gc_id'],'gc_id1'=>isset($all_gc_id[0])?$all_gc_id[0]:'',
                             'gc_id2'=>isset($all_gc_id[1])?$all_gc_id[1]:'','gc_id3'=>isset($all_gc_id[2])?$all_gc_id[2]:'','gc_name'=>$excel['gc_name'], */
                            'goods_edittime'=>$time,
                        );
                        //$this->db->update('shop_goods',$goods_up,array('goods_id'=>$goods_info['goods_id']));
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
                    /* $goods_up = array(
                     'goods_name'=>$excel['goods_name'],'gc_id'=>$excel['gc_id'],'gc_id1'=>isset($all_gc_id[0])?$all_gc_id[0]:'',
                     'gc_id2'=>isset($all_gc_id[1])?$all_gc_id[1]:'','gc_id3'=>isset($all_gc_id[2])?$all_gc_id[2]:'','gc_name'=>$excel['gc_name'],
                     'goods_edittime'=>$time,
                    ); */
                    //$this->db->update('shop_goods',$goods_up,array('goods_id'=>$goods_info['goods_id']));
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
        if (file_exists ( $csvpath )) {
            unlink ( $csvpath );
        }
        //如果在队列中，任务完成之后删除记录
        if ($_GET['id']) {
            $task['task_id'] = $_GET['id'];
            if ($task['task_id']) {
                $row = $this->common_function->queue_out($task);
            }
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


    //排队
    public function queue()
    {
        $this->common_function->pay_role("seller_goods");//权限
        $store_id   = $_SESSION['shop_spg_store_id'];
        $user_id    = $_SESSION['shop_spg_id'];
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
                        'task_type'  => $task_type,
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
        $this->common_function->pay_role("seller_goods");//权限
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
        $this->common_function->pay_role("seller_goods");//权限
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


    public function add_tel()
    {
        $user_id = $_GET['user_id'];
        $tel = $_GET['tel'];
        $row = $this->db->where('user_id',$user_id)->update('user',array('tel'=>$tel));
        echo $row;exit;
    }


    //店铺总库库存导出
    public function set_all_goods_csv ()
    {
        $this->common_function->pay_role("seller_edit_good");//权限
        $ids = isset($_GET['id']) ? $_GET['id']  : false;
        $store_id = $_SESSION['shop_spg_store_id'];
        $time = time();
        $date = date ( 'YmdHis',$time );
        $filename = $date.$store_id.'总库库存';
        $filenames = $date.'_'.$store_id.'all_goods.csv';
        $file = ROOTPATH.'data/excel_download/'.$filenames;
        $title = array(chr(0xef).chr(0xbb).chr(0xbf).'商品名称','分类','品牌','款号','主色','颜色','货号','尺码','销售价','市场价','总库存','商品性别');
        file_put_contents ($file,implode(',', $title).PHP_EOL,FILE_APPEND);
        
        //导出选中商品库存
        if($ids != "all"){
            $this->db->distinct()
            ->select("sg.goods_id,sg.goods_name,sg.goods_spu,sg.goods_marketprice,sg.sex,sg.gc_name,sg.brand_name,ssa.color,ssa.goods_color_remark,ssa.size,ssa.stocks_sn,ssa.amount,ssa.stocks_price")
            ->from('store_stocks_amount as ssa')
            ->join('shop_goods as sg','sg.goods_id = ssa.goods_id','inner')
            ->join('store_attr_brands as sab','sab.brand_id = sg.brand_id', 'left')
            ->where("sg.goods_id in ({$ids})")
            ->where('sg.goods_state !=',0)
            ->where('ssa.ssa_store_id', $store_id)
            ->where('sab.store_id', $store_id)
            ->order_by('sg.goods_id','asc')
            ->order_by('sg.goods_spu','asc')
            ->order_by('ssa.size','asc')
            ->order_by('ssa.stocks_sn','asc');
            $data = $this->db->get()->result_array();
            
            $i = 2;
            $content = array();
            foreach ($data as $key => $value) {

                //判断性别
                if($value['sex'] == 0){
                    $value['sex'] = '通用';
                }
                if($value['sex'] == 1){
                    $value['sex'] = '女';
                }
                if($value['sex'] == 2){
                    $value['sex'] = '男';
                }

                $content = array(
                    $value['goods_name'],
                    $value['gc_name'],
                    $value['brand_name'],
                    $value['goods_spu'],
                    $value['color'],
                    $value['goods_color_remark'],
                    $value['stocks_sn'],
                    $value['size'],
                    $value['stocks_price'],
                    $value['goods_marketprice'],
                    $value['amount'],
                    $value['sex']
                );
                file_put_contents ($file,implode(',',$content).PHP_EOL,FILE_APPEND);
                $i++;
            }
            $download = 'http://' . $_SERVER ['HTTP_HOST'].str_replace ( $_SERVER ['DOCUMENT_ROOT'], '', str_replace('','',str_replace ( '\\', '/', ROOTPATH ))).'data/excel_download/'.$filenames;
            header("location:".$download);
        }
        else{
            //导出全部库存
            $this->db->from('store_stocks_amount as ssa');
            $this->db->join('shop_goods as sg','ssa.goods_id = sg.goods_id', 'inner')
            ->join('store_attr_brands sab','sab.brand_id = sg.brand_id', 'left')
            ->where('ssa.ssa_store_id', $store_id)
            ->where('sab.store_id', $store_id);
            $this->db->distinct()->select('sg.goods_id');
            $this->db->where ("sg.goods_state != 0"); //未删除的
            
            $db = clone($this->db);

            $goods = $this->db->get ()->result_array ();
            
            $goods_id = [];
            foreach ($goods as $g){
                $goods_id[] = $g['goods_id'];
            }
            $this->db = $db;
            $this->db->select ('sg.goods_id,sg.goods_name,sg.goods_spu,sg.goods_marketprice,sg.sex,sg.gc_name,sg.brand_name,ssa.color,ssa.goods_color_remark,ssa.size,ssa.stocks_sn,ssa.amount,ssa.stocks_price');
            $this->db->where_in('sg.goods_id', $goods_id)
            ->order_by('sg.goods_id','asc')
            ->order_by('sg.goods_spu','asc')
            ->order_by('ssa.size','asc')
            ->order_by('ssa.stocks_sn','asc');
            $data = $this->db->get ()->result_array();
            
            $i = 2;
            foreach ($data as $key => $value) {

                //判断性别
                if($value['sex'] == 0){
                    $value['sex'] = '通用';
                }
                if($value['sex'] == 1){
                    $value['sex'] = '女';
                }
                if($value['sex'] == 2){
                    $value['sex'] = '男';
                }

                $content = array(
                    $value['goods_name'],
                    $value['gc_name'],
                    $value['brand_name'],
                    $value['goods_spu'],
                    $value['color'],
                    $value['goods_color_remark'],
                    $value['stocks_sn'],
                    $value['size'],
                    $value['stocks_price'],
                    $value['goods_marketprice'],
                    $value['amount'],
                    $value['sex']
                );
                file_put_contents ($file,implode(',',$content).PHP_EOL,FILE_APPEND);
                $i++;
                
            }
            $download = 'http://' . $_SERVER ['HTTP_HOST'].str_replace ( $_SERVER ['DOCUMENT_ROOT'], '', str_replace('','',str_replace ( '\\', '/', ROOTPATH ))).'data/excel_download/'.$filenames;
            header("location:".$download);
        }
        exit;
    }

    //店铺自建商品库存导出
    public function set_shop_goods_csv ()
    {
        $this->common_function->pay_role("seller_edit_good");//权限
        $ids = isset($_GET['id']) ? $_GET['id']  : false;
        $store_id = $_SESSION['shop_spg_store_id'];
        $time = time();
        $date = date ( 'YmdHis',$time );
        $filename = $date.$store_id.'自建库存';
        $filenames = $date.'_'.$store_id.'shop_goods.csv';
        $file = ROOTPATH.'data/excel_download/'.$filenames;
        $title = array(chr(0xef).chr(0xbb).chr(0xbf).'商品名称','分类','品牌','款号','主色','颜色','货号','尺码','销售价','市场价','总库存','商品性别');
        file_put_contents ($file,implode(',', $title).PHP_EOL,FILE_APPEND);

        //选中商品库存
        if($ids != "all"){
            $this->db->distinct()
            ->select("sg.goods_id,sg.goods_name,sg.goods_spu,sg.goods_marketprice,sg.sex,sg.gc_name,sg.brand_name,ssa.color,ssa.goods_color_remark,ssa.size,ssa.stocks_sn,ssa.amount,ssa.stocks_price")
            ->from('store_stocks_amount as ssa')
            ->join('shop_goods as sg','sg.goods_id = ssa.goods_id','inner')
            ->where("sg.goods_id in ({$ids})")
            ->where('sg.goods_state !=',0)
            ->where('sg.goods_pos',$store_id)
            ->order_by('sg.goods_id','asc')
            ->order_by('sg.goods_spu','asc')
            ->order_by('ssa.size','asc')
            ->order_by('ssa.stocks_sn','asc');
            $data = $this->db->get()->result_array();
            
            $i = 2;
            $content = array();
            foreach ($data as $key => $value) {
                
                //判断性别
                if($value['sex'] == 0){
                    $value['sex'] = '通用';
                }
                if($value['sex'] == 1){
                    $value['sex'] = '女';
                }
                if($value['sex'] == 2){
                    $value['sex'] = '男';
                }

                $content = array(
                    $value['goods_name'],
                    $value['gc_name'],
                    $value['brand_name'],
                    $value['goods_spu'],
                    $value['color'],
                    $value['goods_color_remark'],
                    $value['stocks_sn'],
                    $value['size'],
                    $value['stocks_price'],
                    $value['goods_marketprice'],
                    $value['amount'],
                    $value['sex']
                );
                file_put_contents ($file,implode(',',$content).PHP_EOL,FILE_APPEND);
                $i++;
            }
            $download = 'http://' . $_SERVER ['HTTP_HOST'].str_replace ( $_SERVER ['DOCUMENT_ROOT'], '', str_replace('','',str_replace ( '\\', '/', ROOTPATH ))).'data/excel_download/'.$filenames;
            header("location:".$download);
        }else{
            //导出全部商品库存
            $this->db->from('store_stocks_amount as ssa');
            $this->db->join('shop_goods as sg','ssa.goods_id = sg.goods_id', 'inner');
            $this->db->distinct()->select('sg.goods_id,sg.goods_name,sg.goods_spu,sg.goods_marketprice,sg.sex,sg.gc_name,sg.brand_name,ssa.color,ssa.goods_color_remark,ssa.size,ssa.stocks_sn,ssa.amount,ssa.stocks_price');
            $this->db->where ("sg.goods_state != 0")//未删除的
            ->where('sg.goods_pos', $store_id)
            ->order_by('sg.goods_id','asc')
            ->order_by('sg.goods_spu','asc')
            ->order_by('ssa.size','asc')
            ->order_by('ssa.stocks_sn','asc'); 
            $data = $this->db->get ()->result_array();
            
            $i = 2;
            foreach ($data as $key => $value) {
                

                //判断性别
                if($value['sex'] == 0){
                    $value['sex'] = '通用';
                }
                if($value['sex'] == 1){
                    $value['sex'] = '女';
                }
                if($value['sex'] == 2){
                    $value['sex'] = '男';
                }

                $content = array(
                    $value['goods_name'],
                    $value['gc_name'],
                    $value['brand_name'],
                    $value['goods_spu'],
                    $value['color'],
                    $value['goods_color_remark'],
                    $value['stocks_sn'],
                    $value['size'],
                    $value['stocks_price'],
                    $value['goods_marketprice'],
                    $value['amount'],
                    $value['sex']
                );
                file_put_contents ($file,implode(',',$content).PHP_EOL,FILE_APPEND);
                $i++;
                
            }
            $download = 'http://' . $_SERVER ['HTTP_HOST'].str_replace ( $_SERVER ['DOCUMENT_ROOT'], '', str_replace('','',str_replace ( '\\', '/', ROOTPATH ))).'data/excel_download/'.$filenames;
            header("location:".$download);
        }
        exit;
    }
    

    

}
