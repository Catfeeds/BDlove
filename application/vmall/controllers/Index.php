
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    private $config_img;
    public function __construct() {
        
        parent::__construct();
        $this->load->model('weixin_model');
        $this->load->model("store_model");
        $this->load->model("goods_model");
        $config_images = $this->common_function->get_default_img();
        $this->smarty->assign('config_images', $config_images);
        $this->config_img = $config_images;
        
    }
	public  function select_guide(){
	    $storeId = $_SESSION['last_ecstore_id'];
	    $guide_info = $this->store_model->getGuideInfo(1,$storeId);
	    $nums = count($guide_info);
	    if($nums==0){
	        header("location:".base_url('vmall.php/store/stores'));exit;
	    }elseif ($nums==1){
	        $spg_id = $guide_info[0]['spg_id'];
	        header("location:".base_url('vmall.php/store/shopping_guide_chat?spg_id=').$spg_id);exit;
	    }else{
	        header("location:".base_url('vmall.php/store/shopping_guide_list?storeId=').$storeId);exit;
	    }
	 
	}
	public function index(){
        $this->weixin_model->get_user_openid();
	    $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
	    $storeId = isset($_GET['storeId']) && !empty($_GET['storeId']) ?$_GET['storeId']:'';
	    if($storeId){
	        $res = $this->common_function->store_true($storeId);
	        if(!$res){
	              $storeId = isset($_SESSION['last_ecstore_id'])?$_SESSION['last_ecstore_id']:'';
	              if($storeId){
	                  $ress = $this->common_function->store_true($storeId);
	                  if(!$ress){
	                      $storeId = false;
	                  }
	              }
	             
	        }
	    }
	    
		if(!$storeId){
		    //最后浏览的店铺
		    $sql = "select user_id,last_ecstore_id from {$this->db->dbprefix('user')} where user_id='{$user_id}'";
		    $info= $this->db->query($sql) ->row_array();
		    $Info = $this->db->select('store_id')->where('store_id',$info['last_ecstore_id'])->where('store_state','1')->where("ous_type !='3'")->get('store')->row("store_id");
	   		if($Info){
	   			$storeId = $Info;
	   		}else{
	   		    //最近的店铺
	   		    if(isset($_SESSION['Location'])){
	   		        $Location =unserialize($_SESSION['Location']);
	   		        $storeinfo = $this->store_model->getDistance($user_id,$Location['longitude'], $Location['latitude']);
	   		        if(!empty($storeinfo['nearby_store'])){
	   		            $storeinfo = current($storeinfo['nearby_store']);
	   		            $storeId = $storeinfo['store_id'];
	   		        }else{
	   		            //绑定的店铺
	   		            $sql = "select user_id,ecshopping_guide_id,ecstore_id,ecgustore_id from {$this->db->dbprefix('user')} where user_id='{$user_id}'";
	   		            $user = $this->db->query($sql) ->row_array();
	   		            if($user['ecstore_id']){
	   		                $res = $this->common_function->store_true($user['ecstore_id']);
	   		                if($res){
	   		                    $storeId = $user['ecstore_id'];
	   		                }
	   		            }else{
	   		                //$storeId = 1;
	   		            }
	   		        }
	   		        
	   		    }else{
	   		        $this->db->select('store_id,store_state');
	   		        $this->db->from('store');
	   		        $this->db->where('store_state','1');
	   		        $this->db->where("ous_type !='3'");
	   		        $this->db->order_by('store_id');
	   		        $store = $this->db->get()->result_array();
	   		        if($store){
	   		            $storeId = $store[0]['store_id'];
	   		        }
	   		        
	   		    }
	   		}
	    }
	    //门店信息
        $storeInfo = $this->db->select('store_id,is_wx_store_type,store_name,ous_logo,ous_ewm,ous_type')->where('store_id',$storeId)->get('store')->row_array();
        if(empty($storeInfo['ous_ewm']) || !file_exists(PLUGIN.$storeInfo['ous_ewm'])){
            $url = base_url("vmall.php/receive/download_much?id=".$storeId);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            $storeInfo = $this->db->select('store_id,is_wx_store_type,store_name,ous_logo,ous_ewm,ous_type')->where('store_id',$storeId)->get('store')->row_array();
        }
        if($storeInfo['ous_type']==1){
            $storeInfo['default_log']= DEFAULTIMAGE.$this->config_img['store_avatar'];
        }else{
            if($storeInfo['is_wx_store_type']==1){
                $storeInfo['default_log']= DEFAULTIMAGE.$this->config_img['default_tb_image'];
            }elseif ($storeInfo['is_wx_store_type']==2){
                $storeInfo['default_log']= DEFAULTIMAGE.$this->config_img['default_tm_image'];
            }else{
                $storeInfo['default_log']= DEFAULTIMAGE.$this->config_img['default_jd_image'];
            }
        }
        $data=array("last_ecstore_id"=>$storeId,"ecstore_id"=>$storeInfo['store_id'],"store_name"=>$storeInfo['store_name'],"ous_logo"=>$storeInfo['ous_logo'],'ous_ewm'=>$storeInfo['ous_ewm']);
        $this->session->set_userdata($data);
	    //浏览门店更新用户访问记录
	    $this->db->select('adv_id,user_id,store_id,adv_time');
	    $this->db->from('user_adv_store');
	    $this->db->where("user_id",$user_id);
	    $this->db->where("store_id",$storeId);
	    $this->db->order_by('adv_time','ASC');
	    $info= $this->db->get()->row_array();
	    //print_r($info);die;
	    if(empty($info)){
	        $data=array("user_id"=>$user_id,"store_id"=>$storeId,"adv_time"=>time());
	        $res=$this->db->insert('user_adv_store',$data);
	    }else{
	        $data=array("user_id"=>$user_id,"store_id"=>$storeId,"adv_time"=>time());
	        $this->db->where('adv_id', $info['adv_id']);
	        $this->db->update('user_adv_store',$data);
	    }
	    
	    //浏览用户最后访问门店记录
	    $this->db->where('user_id', $user_id);
	    $this->db->update('user',array("last_ecstore_id"=>$storeId));
	    
	    //分类信息
	    $cateInfo = $this->goods_model->get_get_cate23();
	    //print_r($cateInfo);die;
	    
 	    //print_r($storeId);die;
 	    //print_r($storeInfo);die;装修模块
 	    $sdt_id = $this->db->select('sdt_id')->from('store_decorate_tpl')->where('store_id',$storeId)->get()->row('sdt_id');
 	    if(!$sdt_id){
 	        $sdt_id = $this->db->select('sdt_id')->from('store_decorate_tpl')->where('sdt_name','Default')->get()->row('sdt_id');
 	    }
 	    $str='';
 	    if($sdt_id){//已绑定模块
 	    //查询模块内容
 	    $this->db->select('sdb_id,sdt_id,block_code,block_content,block_sort');
 	    $this->db->from('store_decoration_block');
 	    $this->db->where("sdt_id",$sdt_id);
 	    $this->db->order_by('block_sort','ASC');
 	    $block_content = $this->db->get()->result_array();
 	    //print_r($block_content);die;
 	    if($block_content && !empty($block_content)){
     	    foreach ($block_content as $key=>$val){
     	        if(!empty($val['block_content'])){
     	            $block_content[$key]['block_content']=unserialize($val['block_content']);
     	        }
 	            if($val['block_code']=='m1000'){//搜索
 	                $str.='<div class="wx_mod" modid="1000" id="m1000">
            				<div class="bd">
            					<div class="v3_shop_bar">
            						<div class="v3_shop_header mui-flex" style="background: red;">
            							<div class="category_menu cell fixed" id="categoryMenu" style="color: #fff;">
            								<i class="iconfont category_menu_icon">&#xe600;</i> <span class="category_menu_txt">分类</span>
            							</div>
            							<div class="mobile_search cell" style="margin: 7px 10px 0!important;">
            								<div class="m_search_wrap">
            									<input type="text" id="doSearch" class="search_input" placeholder="搜索店内商品" style="background: #fff;">
            									<img src="'.TEMPLE.'images/search.png" alt="search" class="searchimg"/>
            								</div>
            							</div>
            						</div>
            					</div>
            				</div>
            			</div>';
 	            }elseif($val['block_code']=='m1011'){//店招
 	                    $goods_pic = PLUGIN.$storeInfo['ous_logo'];
                        if (!(!empty($goods_pic) && file_exists ($goods_pic))) {
                            $goods_pic = DEFAULTIMAGE.$this->config_img['store_logo'];
                        }
 	                $str.='<div class="wx_mod" modid="1011" id="m1011">
                                <div class="bd" style="display: block;">                                            
                                    <a href="javascript:void(0)" class="db"><img src="'.$goods_pic.'" class="wx-top-banner"></a>
                                </div>
                            </div>';
 	            }elseif($val['block_code']=='m1012'){//店铺信息
 	                $ous_logo = PLUGIN.$storeInfo['ous_logo'];
 	                if (!(!empty($goods_pic) && file_exists ($goods_pic))) {
 	                    $ous_logo = DEFAULTIMAGE.$this->config_img['store_logo'];
 	                }
 	                $str.='<div class="wx_mod bde4-b" modid="1012" id="m1012" style="height: .64rem;border:none">
         	                  <div class="bd" style="display: block;">
             	                <div class="ui-table" style="table-layout: fixed;">
                 	                <div class="cell" style="width: .64rem;">
                 	                  <img class="shop-logo"  src="'.$storeInfo['default_log'].'" style="width: .44rem;margin: .1rem;">
                 	                </div>
                 	                <div class="cell" style="width: 2.06rem;">
                 	                  <h2 class="store-name-box">'.$storeInfo['store_name'].'</h2>
                 	                </div>
                 	                <div class="cell ous_ewm attentions" style="width: .46rem;">
                 	                  <div class="info-r" id="attention" data-qrcode="'.PLUGIN.$storeInfo['ous_ewm'].'" style="text-align: center;">
                 	                      <i class="iconfont shop-qrcode" style="font-size: .24rem;">&#xe61b;</i>
                 	                  </div>
                 	                </div>
             	                </div>
         	                  </div>
         	                </div>';
 	                $url = base_url("vmall.php/index/select_guide");
                    
                    //导购移动
                    $guide_info = $this->store_model->getGuideInfo(1,$storeId);
                    $nums = count($guide_info);
                    //有导购
                    //$nums = 0;
                    if($nums > 0){
                        $str .='<div class="wx_mod bde4-b guide_container" modid="1012">
                                    <div class="bd guide_content" style="display: block;">
                                        <p class="guide_title">联系导购</p>
                                        <div class="ui-table" style="table-layout: fixed;">
                                            <div class="cell guides" style="width: 5rem;">';
                        foreach ($guide_info as $key => $value) {
                            if($key<3){
                                $url = base_url('vmall.php/store/shopping_guide_chat?spg_id='.$value['spg_id']);
                                $str .='<a href ="'.$url.'"><span class="store-name-box"><img src="'.TEMPLE.'images/guide_women.png">'.$value['spg_nike_name'].'</span></a>';
                            }
                        }

                        $list_url = base_url('vmall.php/store/shopping_guide_list?storeId='.$storeId);
                        $str .='            </div>
                                            <div class="cell ous_ewm attentions" style="width: .46rem;line-height: .3rem;">
                                            <a href ="'.$list_url.'"><span class="iconfont" style="font-size:.14rem;font-weight:500">&#xe604;</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                    }else{
                        //没有导购
                        $no_guide = "本店暂时没有导购";
                        $list_url = base_url('vmall.php/store/shopping_guide_list?storeId='.$storeId);
                        $str .='<div class="wx_mod bde4-b guide_content" modid="1012">
                                    <div class="bd" style="display: block;">
                                        <p class="guide_title">联系导购</p>
                                        <div class="ui-table" style="table-layout: fixed;">
                                            <div class="cell guides" style="width: 5rem;">';
                        $str .='<span class="store-name-box">'.$no_guide.'</span>';
                        $str .='            </div>
                                            <div class="cell ous_ewm attentions" style="width: .46rem;line-height: .44rem;">
                                            <a href ="'.$list_url.'"><span class="iconfont" style="font-size:.18rem">&#xe604;</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                    }

     	        }elseif($val['block_code']=='m1001'){
     	            //轮播广告
     	            $strs = '';
     	            if(isset($block_content[$key]['block_content']['content']) && !empty($block_content[$key]['block_content']['content'])){
     	                foreach ($block_content[$key]['block_content']['content'] as $k=>$v){
     	                    $strs .= '<a href="'.$v['href'].'" class="swiper-slide">
                                          <div class="shop_slider_img" style="height:'.$block_content[$key]['block_content']['height'].'px; background-image:url('.TEMPLE."images/".$v['src'].')"></div>
                                        </a>';
     	                }
     	            }
     	            $str.='<div class="wx_mod" modtitle="图片轮播" modid="1001" id="m1001">
                                    <div class="bd">
                                        <div class="swiper-container" style="height: '.$block_content[$key]['block_content']['height'].'px;">
                                            <div class="swiper-wrapper">
                                        '.$strs.'
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
    	                     </div>';
     	        }elseif($val['block_code']=='m1002'){
     	            //通栏广告
     	            $str .= '<div class="wx_mod" modtitle="通栏广告" modid="1002" id="m1002">
                            <div class="bd">
                                <div class="shop_mod_pic" data-lazyload="true">
                                    <a class="url" href="'.$block_content[$key]['block_content']['href'].'">
                                        <img alt="图片" class="pp_init_img" data-src="'.TEMPLE."images/".$block_content[$key]['block_content']['src'].'" src="'.TEMPLE."images/".$block_content[$key]['block_content']['src'].'">
                                    </a>
                                </div>
                            </div>
        	                </div>';
     	        }elseif($val['block_code']=='m1003'){
     	            //两栏广告
     	            $strs = '';
     	            if(isset($block_content[$key]['block_content']) && !empty($block_content[$key]['block_content'])){
     	                foreach ($block_content[$key]['block_content'] as $k=>$v){
     	                    $strs .= '<a href="'.$v['href'].'" title="图片" class="url"><img alt="图片" class="pp_init_img" src="'.TEMPLE."images/".$v['src'].'"></a>';
     	                }
     	            }
     	            $str .='<div class="wx_mod" modtitle="两栏广告" modid="1003" id="m1003">
    	                    <div class="title" style="display: none;padding: 10px;">两栏广告</div>
                          <div class="bd">
                            <div class="shop_mod_pic shop_mod_pic_1" data-lazyload="true">'.$strs.'</div>
                          </div>
    	                </div>';
     	        }elseif($val['block_code']=='m1004'){
     	            //商品推荐
     	            $selectname ='';
     	            $blockcontent = $block_content[$key]['block_content'];
     	            
     	            //商品信息
     	            $where = "1='1'";
     	            $wherer = '';
     	            if($storeInfo['ous_type']==1){
     	                //获取授权品牌
     	                $this->db->select('brand_id,store_id');
     	                $this->db->from('store_attr_brands');
     	                $this->db->where('store_id',$storeId);
     	                $this->db->order_by('brand_id');
     	                $brands = $this->db->get()->result_array();
     	                if($brands){
     	                    $brandid = "(";
     	                    foreach ($brands as $key=>$val){
     	                        $brandid .= $val['brand_id'].",";
     	                    }
     	                    $brandid = substr($brandid,0,strripos($brandid,",")).")";
     	                    $where .= ' and g.brand_id in '.$brandid;
     	                }else{
     	                    $where .= " and  g.brand_id = '0'";
     	                }
     	                $wherer = "  sa.goods_ea_id >0 AND g.goods_state > 0 and sa.amount > 0  AND g.goods_pos='0'";
     	            }else{
     	                $wherer = " sa.goods_ea_id >0 AND g.goods_state > 0  AND g.goods_pos='{$storeId}'";
     	            }

     	            
     	            if($blockcontent['type']==1){//自动推荐
     	                $this->db->select('sa.goods_id,sa.goods_ea_id,sa.stocks_price,sa.ssa_store_id,
                            	    se.stocks_marketprice,sa.uec_stocks_price,
                            	    g.goods_price,g.goods_marketprice,g.goods_name,g.gc_id,g.gc_name,
                            	    g.brand_id,g.brand_name,g.goods_image,g.goods_jingle,g.gc_id1,g.gc_id2,g.gc_id3,g.goods_tag');
                        	    $this->db->from('store_stocks_amount as sa');
                        	    $this->db->join('shop_goods_extend_attr as se','se.goods_ea_id=sa.goods_ea_id','left');
                        	    $this->db->join('shop_goods as g','g.goods_id=sa.goods_id ','left');
                        	    $this->db->where($wherer);
     	                if(!empty($blockcontent['key'])){
     	                    $this->db->like('g.goods_name',$block_content[$key]['block_content']['key']);
     	                }
     	                
     	                //以什么方式推荐
     	               /*  if($blockcontent['way']=='radio11'){//按分类
     	                    $this->db->where ('g.gc_id',$blockcontent['selectid']);
     	                    $selectname = $this->db->select ('gc_name')->where ('gc_id', $blockcontent['selectid'])->get ('shop_goods_class')->row ('gc_name');
     	                    $this->db->where ($where);
     	                }elseif($blockcontent['way']=='radio11x'){//按自定义分类
     	                    $this->db->where ($where);
     	                }elseif($blockcontent['way']=='radio12'){//按品牌
     	                    if($brands){
     	                        if(stripos($brandid,$blockcontent['selectid'])){
     	                            $where = "and g.brand_id = ".$blockcontent['selectid'];
     	                            $selectname = $this->db->select ('brand_name')->where ('brand_id', $blockcontent['selectid'])->get ('shop_brand')->row ('brand_name');
     	                        }else{
     	                            $where = " and  g.brand_id = '0'";
     	                        }
     	                        
     	                    }
     	                    $this->db->where ($where);
     	                }elseif($blockcontent['way']=='radio15'){//按销量
     	                    $this->db->where ($where);
     	                    $this->db->order_by ('g.goods_salenum', $blockcontent['order_by'][1]);
     	    
     	                } */
     	                   
     	    
     	                $this->db->where ($where);
     	                if($blockcontent['order_by'][0]=='goods_price'){//按价格排序
     	                    $this->db->order_by ('g.goods_price', $blockcontent['order_by'][1]);
     	    
     	                }elseif ($blockcontent['order_by'][0]=='update_time'){//按库存更新时间排序
     	                    $this->db->order_by ('g.goods_addtime', $blockcontent['order_by'][1]);
     	    
     	                }elseif($blockcontent['order_by'][0]=='goods_salenum' && $blockcontent['way']!='radio15'){//按销量排序
     	                    $this->db->order_by ('g.goods_salenum', $blockcontent['order_by'][1]);
     	                }
     	    
     	                if(!empty($blockcontent['limit'])){
     	                    $this->db->limit ($blockcontent['limit'], 0);
     	                } 
     	                $this->db->group_by('sa.goods_id');
     	                $rows = $this->db->get ()->result_array ();
     	            }else{//手动推荐
     	                $rows = '';
     	                if($blockcontent['shoutitle']){//是否显示标题
     	                    $selectname = $blockcontent['title'];
     	                }else{
     	                    $selectname = '掌柜推荐';
     	                }
     	                if(!empty($blockcontent['gooods'])){
     	                    $goods_id = '';
     	                    foreach ($blockcontent['gooods'] as $k=>$v){
     	                        if(isset($blockcontent['gooods'][$k+1])){
     	                            $goods_id .= $v['goods_id'].",";
     	                        }else{
     	                            $goods_id .= $v['goods_id'];
     	                        }
     	    
     	                    }
     	                    $this->db->select('sa.goods_id,sa.goods_ea_id,sa.stocks_price,sa.ssa_store_id,
                            	    se.stocks_marketprice,sa.uec_stocks_price,
                            	    g.goods_price,g.goods_marketprice,g.goods_name,g.gc_id,g.gc_name,
                            	    g.brand_id,g.brand_name,g.goods_image,g.goods_jingle,g.gc_id1,g.gc_id2,g.gc_id3,g.goods_tag');
     	                    $this->db->from('store_stocks_amount as sa');
     	                    $this->db->join('shop_goods_extend_attr as se','se.goods_ea_id=sa.goods_ea_id','left');
     	                    $this->db->join('shop_goods as g','g.goods_id=sa.goods_id ','left');
     	                    $this->db->where($wherer);
     	                    $this->db->where ($where);
     	                    $this->db->where ("sa.goods_id in (".$goods_id.")");
     	                    $rows = $this->db->get ()->result_array ();
     	                }
     	              
     	            }
     	            if(empty($rows)){
     	                $this->db->select('sa.goods_id,sa.goods_ea_id,sa.stocks_price,sa.ssa_store_id,
                            	    se.stocks_marketprice,sa.uec_stocks_price,
                            	    g.goods_price,g.goods_marketprice,g.goods_name,g.gc_id,g.gc_name,
                            	    g.brand_id,g.brand_name,g.goods_image,g.goods_jingle,g.gc_id1,g.gc_id2,g.gc_id3,g.goods_tag');
     	                $this->db->from('store_stocks_amount as sa');
     	                $this->db->join('shop_goods_extend_attr as se','se.goods_ea_id=sa.goods_ea_id','left');
     	                $this->db->join('shop_goods as g','g.goods_id=sa.goods_id ','left');
     	                $this->db->where($wherer);
     	                $this->db->where ($where);
     	                $this->db->order_by ('g.goods_salenum', 'DESC');
     	                $this->db->group_by('sa.goods_id');
     	                $rows = $this->db->get ()->result_array ();
     	            }
     	            
     	            
     	            
     	            $default_pic = DEFAULTIMAGE .$this->config_img['goods_image'];
     	            if($selectname){
     	                $selectname ='<h2 class="shop_mod_tit bde4-b">'.$selectname.' <a href="'.base_url().'vmall.php/goods/index">更多<i class="iconfont">&#xe604;</i></a></h2>';
     	            }else{
     	                $selectname ='<h2 class="shop_mod_tit bde4-b">掌柜推荐 <a href="'.base_url().'vmall.php/goods/index">更多<i class="iconfont">&#xe604;</i></a></h2>';
     	            }
     	           // $goods_tag_arr = array ('' => '--', '1' => '拼团', '2' => '推荐', '3' => '特卖');
     	            
     	            $strstr = '';
     	            if($rows){
 	                  $strstr .='<div class="wx_mod sortable-item" modtitle="掌柜推荐" modid="1004" id="m1004">
                            <div class="bd m_recommend_bdm1004-3e6c" id="m_recommend_bdm1004-3e6c" style="display: block;">
                            '.$selectname.'
                            <div class="wx_itemlist" data-lazyload="true">
                                <div class="shop_mod_pic_1">';
     	                foreach ($rows as $row) {
     	                    $span='';
     	                    if (!empty($row['goods_image'])) {
     	                        $goods_pic = GOODIMAGE . $row['goods_image'];
     	                    } else {
     	                        $goods_pic = $default_pic;
     	                    }
     	                    /* if($row['goods_tag']==1 || $row['goods_tag']==3 ){
     	                        $span = '<span class="p-tags">'.$goods_tag_arr[$row['goods_tag']].'</span>';
     	                    } */
     	                    if($storeInfo['ous_type']==1){
     	                        $goods_true_price = $row['stocks_price'];
     	                    }else{
     	                        $goods_true_price = $row['uec_stocks_price'];
     	                    }
     	                    $strstr .='<div class="hproduct">
                            			<p class="cover">
                            				'.$span.'
                            				<a href="'.base_url().'vmall.php/goods/goods_info?store_id='.$row['ssa_store_id'].'&goods_id='.$row['goods_id'].'"   style="background-image:url('.$goods_pic.')"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">'.$row['goods_name'].'</a></p>
                            			<p class="prices"><strong><em>￥'.$goods_true_price.'</em><del>¥'.$row['stocks_marketprice'].'</del></strong>
                            			</p>
                            		</div>';
     	                }
     	                $strstr.= '</div></div></div></div>';
     	            }
     	            
     	            
     	            $where = "1='1'";
     	            $wherer = '';
     	            if($storeInfo['ous_type']==1){
     	                //获取授权品牌
     	                $this->db->select('brand_id,store_id');
     	                $this->db->from('store_attr_brands');
     	                $this->db->where('store_id',$storeId);
     	                $this->db->order_by('brand_id');
     	                $brands = $this->db->get()->result_array();
     	                if($brands){
     	                    $brandid = "(";
     	                    foreach ($brands as $key=>$val){
     	                        $brandid .= $val['brand_id'].",";
     	                    }
     	                    $brandid = substr($brandid,0,strripos($brandid,",")).")";
     	                    $where .= ' and g.brand_id in '.$brandid;
     	                }else{
     	                    $where .= " and  g.brand_id = '0'";
     	                }
     	                $wherer = "  sa.goods_ea_id >0 AND g.goods_state > 0 and sa.amount > 0  AND g.goods_pos='0'";
     	            }else{
     	                $wherer = " sa.goods_ea_id >0 AND g.goods_state > 0  AND g.goods_pos='{$storeId}'";
     	            }
     	            
     	           $this->db->select('sa.goods_id,sa.goods_ea_id,sa.stocks_price,sa.ssa_store_id,
                            	    se.stocks_marketprice,sa.uec_stocks_price,
                            	    g.goods_price,g.goods_marketprice,g.goods_name,g.gc_id,g.gc_name,
                            	    g.brand_id,g.brand_name,g.goods_image,g.goods_jingle,g.gc_id1,g.gc_id2,g.gc_id3,g.goods_tag');
            	    $this->db->from('store_stocks_amount as sa');
            	    $this->db->join('shop_goods_extend_attr as se','se.goods_ea_id=sa.goods_ea_id','left');
            	    $this->db->join('shop_goods as g','g.goods_id=sa.goods_id ','left');
            	    $this->db->where($wherer);
            	    $db2 = clone($this->db);
     	            //聚客拼团
     	            $where1 = "  g.goods_tag ='1'";
     	            $this->db->where ($where1);
     	            $this->db->group_by('sa.goods_id');
     	            $rows1 = $this->db->get ()->result_array ();
     	            //整场秒杀
     	            $this->db = $db2;
     	            $db3 = clone($this->db);
     	            $where2 = "  g.goods_tag ='2'";
     	            $this->db->where ($where2);
     	            $this->db->group_by('sa.goods_id');
     	            $rows2 = $this->db->get ()->result_array ();
     	            //品牌特卖
     	            $this->db = $db3;
     	            $where3 = "  g.goods_tag ='3'";
     	            $this->db->where ($where3);
     	            $this->db->group_by('sa.goods_id');
     	            $rows3 = $this->db->get ()->result_array ();
     	            $goods_tj = array($rows2,$rows1,$rows3);
     	            $new_strstr = '';
     	            if($goods_tj){
     	                foreach ($goods_tj as $key=>$rows){
     	                    if(empty($rows)){
     	                        continue;
     	                    }
     	                    if($rows){
     	                        if($key==0){
     	                            $modtitle = "整场秒杀";
     	                            $selectname ='<h2 class="shop_mod_tit bde4-b">'.$modtitle.'<a href="'.base_url().'vmall.php/goods/index">更多<i class="iconfont">&#xe604;</i></a></h2>';
     	                        }elseif($key==1){
     	                            $modtitle = "聚客拼团";
     	                            $selectname ='<h2 class="shop_mod_tit bde4-b">'.$modtitle.'<a href="'.base_url().'vmall.php/goods/index">更多<i class="iconfont">&#xe604;</i></a></h2>';
     	                        }else{
     	                            $modtitle = "品牌特卖";
     	                            $selectname ='<h2 class="shop_mod_tit bde4-b">'.$modtitle.'<a href="'.base_url().'vmall.php/goods/index">更多<i class="iconfont">&#xe604;</i></a></h2>';
     	                        }
     	                        $goods_tag_arr = array ('' => '--', '1' => '拼团', '2' => '秒杀', '3' => '特卖');
     	                        $new_strstr .='<div class="wx_mod sortable-item" modtitle="'.$modtitle.'" modid="1004" id="m1004">
                                <div class="bd m_recommend_bdm1004-3e6c" id="m_recommend_bdm1004-3e6c" style="display: block;">
                                '.$selectname.'
                                <div class="wx_itemlist" data-lazyload="true">
                                    <div class="shop_mod_pic_1">';
     	                        
     	                        foreach ($rows as $row) {
     	                            $span = '<span class="p-tags">'.$goods_tag_arr[$row['goods_tag']].'</span>';
     	                            if (!empty($row['goods_image'])) {
     	                                $goods_pic = GOODIMAGE . $row['goods_image'];
     	                            } else {
     	                                $goods_pic = $default_pic;
     	                            }
     	                            if($storeInfo['ous_type']==1){
     	                                $goods_true_price = $row['stocks_price'];
     	                            }else{
     	                                $goods_true_price = $row['uec_stocks_price'];
     	                            }
     	                            $new_strstr .='<div class="hproduct">
                            			<p class="cover">
                            				'.$span.'
                            				<a href="'.base_url().'vmall.php/goods/goods_info?store_id='.$row['ssa_store_id'].'&goods_id='.$row['goods_id'].'"   style="background-image:url('.$goods_pic.')"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">'.$row['goods_name'].'</a></p>
                            			<p class="prices"><strong><em>￥'.$goods_true_price.'</em><del>¥'.$row['stocks_marketprice'].'</del></strong>
                            			</p>
                            		</div>';
     	                        }
     	                        $new_strstr.= '</div></div></div></div>';
     	                    }
     	                    
     	                }
     	            }
     	            $str.= $strstr.$new_strstr;
     	        
     	        }elseif($val['block_code']=='m1005'){
     	           //print_r($block_content[$key]);die;
     	            if(isset($block_content[$key]['block_content']) && !empty($block_content[$key]['block_content'])){
     	                $str .= '<div class="wx_mod" modtitle="文本" modid="1005" id="m1005">
                    	               <div class="bd" style="display: block;">
                    	               <div class="shop_mod_text">
                    	                      '.$block_content[$key]['block_content'].'
                    	               </div>
                    	               </div></div>';
     	            }
     	        }elseif($val['block_code']=='m1006'){
     	    
     	        }elseif($val['block_code']=='m1007'){
     	            //品牌导航
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
     	    
     	                    $strs.= '  <a href="'.base_url().'vmall.php/goods/index?storeId='.$storeId.'&brand_id='.$v.'" class="shortcut_brand_item c-8">
                                        <span style="background-image: url('.$pic.')" class="shortcut_brand_img"></span>
                                    <div>'.$brandinfo['brand_name'].'</div>
                                    </a>';
     	                }
     	    
     	    
     	                $str .= '<div class="wx_mod" modtitle="品牌导航" modid="1007" id="m1007">
                                      <div class="bd">
                                            <div class="shortcut_brand_wrap">
                                              <h3 class="shortcut_brand_tit">'.$title.'</h3>
                                                <div class="shortcut_brand_list">
                                                    '.$strs.'
                                                </div>
                                            </div>
                                        </div></div>';
     	    
     	            }
     	        }elseif($val['block_code']=='m1008'){
     	            //print_r($block_content[$key]);die;
     	            if($block_content[$key]['block_content']){
     	                $str  .=' <div class="wx_mod" modtitle="自定义代码" modid="1008" id="m1008">
                                    <div class="bd">
                                        <div class="shop_mod_html">
                                            '.$block_content[$key]['block_content'].'
                                        </div>
                                    </div>
                                 </div>';
     	            }
     	    
     	        }elseif($val['block_code']=='m1009'){
     	            //类目导航
     	            $strs='';
     	            if($block_content[$key]['block_content']){
     	                foreach ($block_content[$key]['block_content']['content'] as $k=>$v){
     	                    $strs .='<a href="'.base_url().'vmall.php/goods/index?storeId='.$storeId.'&gc_id='.$v['select'].'"   data-id="'.$v['select'].'" class="shortcut_brand_item category-nav-item bde4-b bde4-r">
                                        <span class="category-nav-name">'.$v['name'].'</span>
                                        <span class="category-nav-img" style="background-image: url('.TEMPLE."images/".$v['src'].')"></span>
                                    </a>';
     	                }
     	    
     	                $str.='<div class="wx_mod sortable-item" modtitle="类目导航" modid="1009" id="m1009">
                                    <div class="bd">
                                        <div class="shortcut_category_wrap">
                                            <h3 class="shortcut_brand_tit mb0">'.$block_content[$key]['block_content']['title'].'</h3>
                                            <div class="shortcut_brand_list category-nav">
                                                '.$strs.'
                                            </div>
                                        </div>
                                    </div></div>';
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
                                    </div></div>';
     	            }
     	    
     	        }
     	    
     	    }
 	     }    
 	    }
 	    $this->smarty->assign ('str', $str);
	   
       $default_hot_search = $this->common_function->get_system_value('default_hot_search');
       if(stristr($default_hot_search,"，")!==false){
           $default_hot_search = str_replace("，",",",$default_hot_search);
       }
       if(stristr($default_hot_search,",")!==false){
           $default_hot_search = explode(",",$default_hot_search);
       }
       if(is_array($default_hot_search)){
           $default_hot = array("state"=>1,'data'=>$default_hot_search);
       }else{
           $default_hot = array("state"=>0,'data'=>$default_hot_search);
       }
       
       $this->smarty->assign('default_hot_search',$default_hot);
       $this->smarty->assign('store_id', $storeId);
	   $this->smarty->assign('storeInfo', $storeInfo);
	   $this->smarty->assign('cateInfo', $cateInfo);
	   $this->smarty->assign('colorflag', "index");
	   $userCartTotal = $this->common_function->get_user_cart_total($user_id);
	   $this->smarty->assign('userCartTotal', $userCartTotal);
	   $this->smarty->display('index.html');  
	}
	
	
	
	public function error(){
	    $this->weixin_model->get_user_openid();
	    $this->smarty->display('error.html');
	}

}

