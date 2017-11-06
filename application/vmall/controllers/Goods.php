<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    private $config_img;
    public function __construct() {
        parent::__construct();
        $this->load->model('goods_model');
        $this->load->model('weixin_model');
        $config_images = $this->common_function->get_default_img();
        $this->smarty->assign('config_images', $config_images);
        $this->config_img = $config_images;
    }
    
	public function index(){
	     $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:false;
	     $store_id = isset($_GET['storeId'])?$_GET['storeId']:isset($_SESSION['last_ecstore_id'])?$_SESSION['last_ecstore_id']:'';
         $source = isset($_GET['source'])?$_GET['source']:'';
         $act_id = isset($_GET['act_id'])?$_GET['act_id']:'';
         $act_goods_id = '';
         if($source=='memberbuy'){
             if($act_id){
                 if(!$_SESSION['user_id']){
                     $this->weixin_model->get_user_openid(base_url("vmall.php/Goods/index?source=".$source."&act_id=".$act_id));
                     $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
                 }
                 $_SESSION['last_ecstore_id'] = $store_id = $this->db->select('store_id')->where('shop_id',$act_id)->get('shop_p_member_shop')->row('store_id');
                 //浏览门店更新用户访问记录
                 $this->db->select('adv_id,user_id,store_id,adv_time');
                 $this->db->from('user_adv_store');
                 $this->db->where("user_id",$user_id);
                 $this->db->where("store_id",$store_id);
                 $this->db->order_by('adv_time','ASC');
                 $info= $this->db->get()->row_array();
                 //print_r($info);die;
                 if(empty($info)){
                     $data=array("user_id"=>$user_id,"store_id"=>$store_id,"adv_time"=>time());
                     $res=$this->db->insert('user_adv_store',$data);
                 }else{
                     $data=array("user_id"=>$user_id,"store_id"=>$store_id,"adv_time"=>time());
                     $this->db->where('adv_id', $info['adv_id']);
                     $this->db->update('user_adv_store',$data);
                 }
                  
                 //浏览用户最后访问门店记录
                 $this->db->where('user_id', $user_id);
                 $this->db->update('user',array("last_ecstore_id"=>$store_id));
                 $act_Info = $this->db->select('goods_id')->where('shop_id',$act_id)->get('shop_p_member_shop_attr')->result_array();
                 if($act_Info){
                     foreach ($act_Info as $k=>$v){
                         if(isset($act_Info[$k+1])){
                             $act_goods_id .= $v['goods_id'].",";
                         }else{
                             $act_goods_id .= $v['goods_id'];
                         }
                     }
                 }
                 
             }
         }
           $data = array();
           $index_info =array("index_goods_name"=>"","index_gc_id"=>"");
           $data['state'] = false;
           $data['result']['info'] = array();
	       $data['result']['length'] = 0;
           $data['result']['total'] = 0;
           $data['result']['all'] = false; 
           if($_SESSION['last_ecstore_id']){
               $store_id = $_SESSION['last_ecstore_id'];
               $storeInfo = $this->db->select('store_id,store_name,ous_logo,ous_ewm,ous_type')->where('store_id',$store_id)->get('store')->row_array();
	           if($this->input->is_ajax_request()){
	               //门店信息
	               $storeInfo = $this->db->select('store_id,store_name,ous_logo,ous_ewm,ous_type')->where('store_id',$store_id)->get('store')->row_array();
	               $page = isset($_GET['page']) ? $_GET['page'] : 1;
	               $rp = isset($_GET['length']) ? $_GET['length'] : 10;
	               $start = ($page - 1) * $rp;
	               $type = isset($_GET['type']) ? $_GET['type'] : 1;

	               $wheres = " g.goods_state > 0  and sa.goods_ea_id >0";
	               if(isset($_GET['brand_id']) && !empty($_GET['brand_id'])){
	                       if($_GET['brand_id']!=="all"){
	                          $wheres .= " and g.brand_id =".$_GET['brand_id'];
	                       }
	               }else{
	                   if($storeInfo['ous_type']==1){
	                       $wheres .= " and sa.amount > 0";
    	                   //获取授权品牌
    	                   $this->db->select('brand_id,store_id');
    	                   $this->db->from('store_attr_brands');
    	                   if($type==1){
    	                       $this->db->where('store_id',$store_id);
    	                   }
    	                   $this->db->order_by('brand_id');
    	                   $brands = $this->db->get()->result_array();
    	                   
    	                   if($brands){
    	                       $brandid = "(";
    	                       foreach ($brands as $key=>$val){
    	                           $brandid .= $val['brand_id'].",";
    	                       }
    	                       $brandid = substr($brandid,0,strripos($brandid,",")).")";
    	                       $wheres .= ' and g.brand_id in '.$brandid;
    	                   }else{
    	                       $wheres .= " and  g.brand_id = '0'";
    	                   }
	                   }
	               
	               }


	               if(isset($_GET['gc_id']) && !empty($_GET['gc_id'])){
	                   $gc_info = $this->goods_model->get_cate_by_parent_id($_GET['gc_id'],true);
	                   $gc_info = $this->goods_model->get_cateid($gc_info);
	                   if($gc_info){
	                       $wheres .= " and g.gc_id in".$gc_info;
	               
	                   }else{
	                       $wheres .= " and g.gc_id =".$_GET['gc_id'];
	                   }
	               }


	               if($storeInfo['ous_type']==1){//实体店
	                   if($type==1){
	                       $wheres .= " and sa.ssa_store_id ='{$store_id}'";
	                   }
	                   $wheres .= " and g.goods_pos = '0'";
	               }else{//电商店
                    if($type == 1){
                        //搜本店
                        $wheres .= " and g.goods_pos = '{$store_id}'";
                    }else{
                        //搜全站
                        $wheres .= " and (g.goods_pos = '0' or sa.ssa_store_id ='{$store_id}')";
                    }

                 } 
	               if(isset($_GET['goods_name']) && !empty($_GET['goods_name'])){
	                       $goods_name = $_GET['goods_name'];
	                       $wheres .= " and g.goods_name  like '%{$goods_name}%'";
	               }
	               
	               if($source=='memberbuy' && $act_id){
	                   $wheres .= " and g.goods_id in({$act_goods_id})";
	               }
	               
	               
	               $wheres .=" group by sa.goods_id";
	               
	               if(isset($_GET['sort_name']) && $_GET['sort_name']=='off_time'){
	                   $wheres .= " order by sa.update_time {$_GET['sort_type']}";
	               }elseif(isset($_GET['sort_name']) && $_GET['sort_name']=='market_price'){
	                   $wheres .= " order by sa.stocks_price {$_GET['sort_type']}";
	               }
	               if(!isset($_GET['sort_name'])){
	                   $wheres .= " order by sa.stocks_price desc";
	               }
	                      
	             
	               
	               $sql = "select sa.goods_id,sa.goods_ea_id,sga.stocks_price,sa.ssa_store_id,sa.stocks_sn,sa.stocks_bar_code,sa.amount,sa.update_time,
	                              sga.stocks_marketprice,sga.goods_a_id,sga.size,sga.stocks_sku,sga.color,sa.uec_stocks_price,
	                              g.goods_name,g.goods_marketprice,g.gc_id,g.gc_id1,g.gc_id2,g.gc_id3,g.gc_name,g.brand_id,
	                              g.brand_name,g.goods_tag,g.goods_state,g.goods_image,g.goods_jingle,g.goods_price
	                        from {$this->db->dbprefix('store_stocks_amount')} as sa
	                        left join {$this->db->dbprefix('shop_goods_extend_attr')} as sga
	                        on sga.goods_ea_id=sa.goods_ea_id
	                        left join {$this->db->dbprefix('shop_goods')} as g
	                        on g.goods_id=sa.goods_id
	                        where {$wheres}";
	               $goods = $this->db->query($sql)->result_array();
	               $total = count($goods);
	               $goodsinfo = array_slice($goods,$start,$rp); 
	               if($total){
	                        $data['state'] = true; 
			                $data['result']['info'] = $goodsinfo;
			                $data['result']['length'] = count($goodsinfo);
			                $data['result']['total'] = $total;
			                $data['result']['all'] = false;
			                if(($start+$rp)>= $total){
			                    $data['result']['all'] = true;
			                }
	               }
	                if(isset($_GET['op']) && $_GET['op']=='get_list'){
	                    echo json_encode($data);exit;
	                }
	           }else{
    	           	$index_goods_name =isset($_GET['goods_name']) ?$_GET['goods_name'] :"";
    	           	$index_gc_id = isset($_GET['gc_id'])?$_GET['gc_id']:"";
    	           	$index_info =array("index_goods_name"=>$index_goods_name,"index_gc_id"=>$index_gc_id);
	           }
	           $this->smarty->assign('storeInfo',$storeInfo);
           }
           
           $this->smarty->assign('index_info',$index_info);
           
           
           
           
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
           
           
           //print_r($data);exit;
          /*  $cate_arr = $this->goods_model->get_cate_by_data(0,false);
           $cate_son = $this->goods_model->get_cate_by_data($cate_arr);
           $cate_son_son = $this->goods_model->get_cate_by_data($cate_son,true);
           $cate_result = array("cate_arr"=>$cate_arr,"cate_son"=>$cate_son,"cate_son_son"=>$cate_son_son); */
           $cateInfo = $this->goods_model->get_get_cate23();
           //$searchHistory = isset($_COOKIE['goodsSearchHistory']) ? $_COOKIE['goodsSearchHistory'] : '';
           $this->smarty->assign('store_id',$store_id);
           $this->smarty->assign('data',$data);
           $this->smarty->assign('colorflag', "goods");
           //$this->smarty->assign('cate_result',$cate_result);
           $this->smarty->assign('cateInfo',$cateInfo);
           //$this->smarty->assign('searchHistory', json_encode($searchHistory));
           
           $userCartTotal = $this->common_function->get_user_cart_total($user_id);
           $this->smarty->assign('userCartTotal', $userCartTotal);
           
           $this->smarty->assign('source', $source);
           $this->smarty->assign('act_id', $act_id);
           
	       $this->smarty->display('goods_list.html');     
	}
     
     
     //商品详情
	public function goods_info(){
            $store_id = isset($_GET['store_id'])?$_GET['store_id']:'';
            $store_id = empty($store_id)?(isset($_SESSION['last_ecstore_id'])?$_SESSION['last_ecstore_id']:""):$store_id;
            $this->session->set_userdata(array("last_ecstore_id"=>$store_id));
            $goods_id = isset($_GET['goods_id']) ? $_GET['goods_id'] : false;
            $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
            $goods_ea_id = isset($_GET['goods_ea_id']) ? $_GET['goods_ea_id'] : false;
            $source = isset($_GET['source'])?$_GET['source']:'';
            $act_id = isset($_GET['act_id'])?$_GET['act_id']:'';
            //$goods_a_id = isset($_GET['goods_a_id']) ? $_GET['goods_a_id'] : false;
            //$size = isset($_GET['size']) ? $_GET['size'] : false;
            $tel = isset($_SESSION['tel']) ?$_SESSION['tel']:"";
            if($store_id){
                //查询店铺是否已收藏
                $this->db->select('log_id');
                $this->db->from('shop_favorites');
                $this->db->where('fav_type','store');
                $this->db->where('member_id',$user_id);
                $this->db->where('store_id',$store_id);
                $is_fav_store=$this->db->get()->result_array();
                //店铺信息
                $this->db->select('s.is_wx_store_type,s.ous_type,s.ous_type,s.store_id,s.store_name,s.province_id,s.city_id,s.area_id,s.ous_address,s.ous_logo,s.ous_tel,a.area_name as province_name,b.area_name as city_name,c.area_name as area_name,');
                $this->db->from('store as s');
                $this->db->join('area as a','a.area_id=s.province_id','left');
                $this->db->join('area as b','b.area_id=s.city_id','left');
                $this->db->join('area as c','c.area_id=s.area_id','left');
                $this->db->where('s.store_id',$store_id);
                $store_info = $this->db->get()->row_array();
                if($store_info['ous_type']==1){
                    $store_info['default_log']= DEFAULTIMAGE.$this->config_img['store_avatar'];
                }else{
                    if($store_info['is_wx_store_type']==1){
                        $store_info['default_log']= DEFAULTIMAGE.$this->config_img['default_tb_image'];
                    }elseif ($store_info['is_wx_store_type']==2){
                        $store_info['default_log']= DEFAULTIMAGE.$this->config_img['default_tm_image'];
                    }else{
                        $store_info['default_log']= DEFAULTIMAGE.$this->config_img['default_jd_image'];
                    }
                }
                //查询当前店铺关注人数
                $this->db->select('count(*) as num');
                $this->db->from('user');
                $this->db->where("ecstore_id ='{$store_id}' or ecgustore_id = '{$store_id}'");
                $store_num = $this->db->get()->row_array();
                $store_info['follow_num'] = $store_num['num'];
                
                //查询当前店铺所有商品
                $wheres = " g.goods_state > 0  and sa.goods_ea_id >0";
                if($store_info['ous_type']==1){
                    $wheres .= " and sa.amount > 0";
                    //获取授权品牌
                    $this->db->select('brand_id,store_id');
                    $this->db->from('store_attr_brands');
                    $this->db->order_by('brand_id');
                    $brands = $this->db->get()->result_array();
                    if($brands){
                        $brandid = "(";
                        foreach ($brands as $key=>$val){
                            $brandid .= $val['brand_id'].",";
                        }
                        $brandid = substr($brandid,0,strripos($brandid,",")).")";
                        $wheres .= ' and g.brand_id in '.$brandid;
                    }else{
                        $wheres .= " and  g.brand_id = '0'";
                    }
                    $wheres .= " and  g.goods_pos = '0'";
                }else{
                    $wheres .= " and  g.goods_pos = '{$store_id}'";
                }
                $wheres .=" group by sa.goods_id";
                $sql = "select sa.goods_id,g.goods_salenum
                from {$this->db->dbprefix('store_stocks_amount')} as sa
                left join {$this->db->dbprefix('shop_goods_extend_attr')} as sga
                on sga.goods_ea_id=sa.goods_ea_id
                left join {$this->db->dbprefix('shop_goods')} as g
                on g.goods_id=sa.goods_id
                where {$wheres}";
                $goods_nums = $this->db->query($sql)->result_array();
                $store_info['store_goods'] = 0;
                $store_info['store_salenum'] = 0;
                if($goods_nums){
                    $store_info['store_goods'] = count($goods_nums);
                    foreach ($goods_nums as $ak=>$as){
                        $store_info['store_salenum']+=$as['goods_salenum'];
                    }
                }
            }
            if($goods_id){
                //商品基本信息
                $this->db->select('goods_image_id,goods_image,is_default');
                $this->db->from('shop_goods_images');
                $this->db->where('goods_id',$goods_id);
                $this->db->where('color_id',0);
                $this->db->where('is_default',1);
                $img_info = $this->db->get()->result_array();
                if($img_info && count($img_info)){
                    foreach ($img_info  as  $key=>$val){
                        if($val['goods_image']){
                            $file = GOODIMAGE.$val['goods_image'];
                        }
                    }
                }else{
                    $img_info=0;
                }
                $this->db->select('sa.uec_goods_iiud,sg.shorturl,sg.pc_desc,sg.goods_salenum,sg.goods_jingle,sg.goods_marketprice,sa.ssa_id,sa.ssa_store_id,sga.stocks_marketprice,sa.stocks_sn,sa.stocks_bar_code,sa.amount,sa.size,sa.stocks_price,sa.update_time,sa.goods_id,
                                  sga.goods_a_id,sga.size,sg.goods_id,sg.goods_name,sg.gc_id,sg.gc_id1,sg.gc_id2,sg.gc_id3,sg.gc_name,sg.brand_id,sg.brand_name,sg.discount,sg.goods_spu,sg.goods_image,sg.goods_state,sg.goods_pos,sg.mobile_desc,sg.logistics_type,sg.limit_num,sg.available_coupons,sg.available_member_dis,sg.goods_tag');
                $this->db->from('store_stocks_amount as sa');
                $this->db->join('shop_goods_extend_attr as sga','sga.goods_ea_id=sa.goods_ea_id','left');
                $this->db->join('shop_goods as sg','sg.goods_id=sa.goods_id');
                $this->db->where("sg.goods_state",'1');
                $this->db->where("sa.ssa_store_id",$store_id);
                if($goods_ea_id){
                    $this->db->where("sa.goods_ea_id ='{$goods_ea_id}'");
                }else{
                    $this->db->where('sa.goods_id',$goods_id);
                }
//              if($goods_a_id){
//                   $this->db->where("sga.goods_a_id ='{$goods_a_id}'");
//              }
//              if($size){
//                   $this->db->where("sa.size ='{$size}'");
//              }
                $base_info = $this->db->get()->result_array();
                if(empty($base_info) || count($base_info)<1){
                    $this->common_function->show_message("该商品存在数据错误，请浏览其他商品！");
                }
                $total = 0;
                foreach ($base_info as $key=>$val){
                   if($source=='memberbuy' && $act_id){
                       $base_info[$key]['goods_discount'] = $this->db->select('goods_discount')->where('shop_id',$act_id)->where('goods_id',$val['goods_id'])->get('shop_p_member_shop_attr')->row('goods_discount');
                   }else{
                       $base_info[$key]['goods_discount'] = '';
                   }
                   $base_info['shorturl'] = '';
                    $total+=$val['amount'];
                }
                
                
                $base_info = isset($base_info[0])?$base_info[0]:array();
                if(empty($base_info['goods_salenum'])){
                    $base_info['goods_salenum'] = 0;
                }
                if($store_info['ous_type']!=1){
                    $this->load->library('store_api');
                    $storeInfo = $this->store_api->get_store_by_id($store_id);
                    
                    if ($storeInfo['ecs_code'] == 1) {
                        $this->load->library('jd_op');
                        $this->jd_op->foo($storeInfo['AppKey'], $storeInfo['AppSecret'], $storeInfo['bind_token_session']);
                    
                    } elseif ($storeInfo['ecs_code'] == 2) {
                        $this->load->library('taobao_op');
                        $this->taobao_op->init($storeInfo['AppKey'], $storeInfo['AppSecret'], $storeInfo['bind_token_session']);
                        $shorturl = $this->taobao_op->get_salenum_by_num_iid($base_info['uec_goods_iiud']);//商品url
                        if(isset($shorturl['state']) && $shorturl['state']){
                            $base_info['shorturl'] = $shorturl['goods_info']['detail_url'];
                        }
                        
                    }
                }
            
                
                $this->db->select('goods_id,goods_ea_id,goods_a_id,color,stocks_sku,color_remark');
                $this->db->from('shop_goods_extend_attr');
                $this->db->where('goods_id',$goods_id);
                $this->db->group_by("goods_a_id");
                $color = $this->db->get()->result_array();
                //print_r($base_info);die;
                
                $this->db->select('a.order_sn,b.order_sn,b.goods_id,b.goods_num');
                $this->db->from('shop_order as a');
                $this->db->join('shop_order_goods as b','a.order_sn=b.order_sn');
                $this->db->where('a.buyer_id',$user_id);
                $this->db->where('b.goods_id',$goods_id);
                $this->db->where("a.order_status = '20' or a.order_status = '30' or a.order_status = '40'");
                $orderinfo = $this->db->get()->result_array();
                $base_info['limit_flag'] = "1";
                $limitnumber = 0;
                if($base_info['limit_num']!=0){
                    if($orderinfo){
                        foreach ($orderinfo as $key=>$val){
                            $limitnumber+=$val['goods_num'];
                        }
                    }
                    $base_info['limit_flag'] = "2";
                    $base_info['limit_number'] = $base_info['limit_num']-$limitnumber;
                }
    
                
                $base_info['goods_color'] = $color;
                $base_info['goods_images'] = $img_info;
                $base_info['amount'] = $total;
                $mobile_desc = (array) json_decode($base_info['mobile_desc']);
                $mobile_desc_arr = array();
                if (!empty($mobile_desc)) {
                    foreach ($mobile_desc as $v) {
                        $mobile_desc_arr[] = (array) $v;
                    }
                }
                //增加商品浏览记录
                $this->db->select('goods_id,member_id');
                $this->db->from('shop_goods_browse');
                $this->db->where('goods_id',$goods_id);
                $this->db->where('member_id',$user_id);
                $info = $this->db->get()->row_array();
                if($info){
                    $this->db->where('goods_id = '.$goods_id.'  and member_id = '.$user_id);
                    $this->db->update('shop_goods_browse', array("browsetime"=>time()));
                }else{
                    $data = array(
                        'goods_id'=>$goods_id,
                        'member_id'=>$user_id ,
                        'browsetime'=>time(),
                        'gc_id'=>$base_info['gc_id'],
                        'gc_id_1'=>isset($base_info['gc_id1']) ? $base_info['gc_id1']:$base_info['gc_id'],
                        'gc_id_2'=>isset($base_info['gc_id2']) ? $base_info['gc_id2']:$base_info['gc_id'],
                        'gc_id_3'=>isset($base_info['gc_id3']) ? $base_info['gc_id3']:$base_info['gc_id'],
                    );
                    $this->db->insert('shop_goods_browse',$data);
                }

                
                //评价
                $this->db->select('s.buyer_nickname,s.goods_color,s.goods_size,s.goods_name,s.rec_id,s.evaluation_time,s.evaluation_level,s.goods_image,s.evaluation_content,s.geval_image,s.geval_explain,u.user_name,u.head_portrait');
                $this->db->from('shop_order_goods as s');
                $this->db->join('user as u','u.user_id=s.user_id','left');
                $this->db->where('goods_id',$goods_id);
                $this->db->where('evaluation_state in (1,3)');
                $this->db->order_by('evaluation_time','desc');
                $db = clone($this->db);
                $evaluate_total = $this->db->count_all_results();
                $this->db = $db;
                $this->db->limit(3);
                $evaluate_info = $this->db->get()->result_array();
                if($evaluate_info){
                    foreach ($evaluate_info as $key=>$val){
                        if(isset($evaluate_info[$key]['geval_image']) && !empty($evaluate_info[$key]['geval_image'])){
                           $gevalimage = $evaluate_info[$key]['geval_image'];
                        }else{
                            $gevalimage = "";
                        }
                        $evaluationcontent =trim($evaluate_info[$key]['evaluation_content']);
                        
                        if(stripos($evaluationcontent,"###")===false){
                            $evaluate_info[$key]['geval_image'] = !empty($gevalimage) ? @unserialize($gevalimage):""; 
                            $evaluate_info[$key]['evaluation_content'] = $evaluationcontent;
                        }else{
                            $geval_image =explode("###",$gevalimage);
                            $evaluation_content = explode("###",$evaluationcontent);
                            $evaluate_info[$key]['geval_image']  = isset($geval_image[0]) && !empty($geval_image[0]) ? @unserialize($geval_image[0]):"";
                            $evaluate_info[$key]['evaluation_content'] = $evaluation_content[0];
                             
                        }
                    }
                }
                
                
                //检查是否已经收藏
                $this->db->select('member_id,member_id');
                $this->db->from('shop_favorites');
                $this->db->where('fav_type',"goods");
                $this->db->where('member_id',$user_id);
                $this->db->where('fav_id',$goods_id);
                $this->db->where('store_id',$store_id);
                $infos = $this->db->get()->result_array();
                if($infos){
                    $base_info['goods_favorites'] = "true";
                }else{
                    $base_info['goods_favorites'] = "false";
                }
                
                //相关推荐
                $this->db->select('sa.ssa_id,sa.ssa_store_id,sa.stocks_sn,sa.stocks_bar_code,sa.amount,sa.size,sa.stocks_price,sa.update_time,sga.stocks_marketprice,sa.goods_id,
                                  sg.goods_id,sg.goods_name,sg.gc_id,sg.gc_id1,sg.gc_id2,sg.gc_id3,sg.gc_name,sg.brand_id,sg.brand_name,sg.discount,sg.goods_spu,sg.goods_image,sg.goods_state,sg.goods_pos,sg.mobile_desc,sg.logistics_type,sg.limit_num,sg.available_coupons,sg.available_member_dis,sg.goods_tag');
                $this->db->from('store_stocks_amount as sa');
                $this->db->join('shop_goods as sg','sg.goods_id=sa.goods_id',"left");
                $this->db->join('store as st','st.store_id=sa.ssa_store_id');
                $this->db->join('shop_goods_extend_attr as sga','sga.goods_ea_id=sa.goods_ea_id','left');
                $this->db->where("sa.ssa_store_id",$store_id);//只推荐该店铺的商品
                if($store_info['ous_type']==1){
                    $this->db->where("sg.goods_pos",0);
                }else{
                    $this->db->where("sg.goods_pos",$store_id);
                }
                //$this->db->where("sa.amount!='0'");
                $this->db->where("sg.goods_id !=".$goods_id);
                $this->db->where("sg.goods_state",'1');
                $this->db->group_by("sg.goods_id");
                $this->db->order_by('sg.goods_salenum','desc');//销量
                $this->db->limit(8);//相关推荐暂时最多显示6条
                $recommend_goods = $this->db->get()->result_array();
            }
            // var_dump($mobile_desc_arr);exit;
            //print_r($base_info);die;

            $this->smarty->assign('is_fav_store',$is_fav_store);
            $this->smarty->assign('tel',$tel);
            $this->smarty->assign('user_id',$user_id);
            $this->smarty->assign('store_info',$store_info);
            $this->smarty->assign('base_info',$base_info);
            $this->smarty->assign('mobile_desc_arr', $mobile_desc_arr);
            $this->smarty->assign('evaluate_info',$evaluate_info);
            $this->smarty->assign('evaluate_total',$evaluate_total);
            $this->smarty->assign('recommend_goods',$recommend_goods);
            //print_r($recommend_goods);die;
            $userCartTotal = $this->common_function->get_user_cart_total($user_id);
            $this->smarty->assign('userCartTotal', $userCartTotal);
            
            
            
            
            
            //获取授权品牌
            $this->db->select('sab.brand_id,bb.brand_name');
            $this->db->from('store_attr_brands as sab');
            $this->db->join('shop_brand as bb','bb.brand_id =sab.brand_id','left');
            $this->db->where('store_id',$store_id);
            $this->db->order_by('brand_id');
            $brands_infos = $this->db->get()->result_array();
            $brands_str = '';
            if($brands_infos){
                foreach ($brands_infos as $key=>$val){
                    if(isset($brands_infos[$key+1])){
                        $brands_str.=$val['brand_name'].",";
                    }else{
                        $brands_str.=$val['brand_name'];
                    }
                }
            }
            
            $this->smarty->assign('source', $source);
            $this->smarty->assign('brands_str',$brands_str);
            $this->smarty->display('goods_info.html');     
	}
	
	//查看收藏商品详情 中间转发
	public function goods_collection(){
	    $store_id = isset($_GET['store_id'])?$_GET['store_id']:false;
	    $goods_id = isset($_GET['goods_id']) ? $_GET['goods_id'] : false;
	    $goods_ea_id = isset($_GET['goods_ea_id']) ? $_GET['goods_ea_id'] : false;
	    if($store_id){
	        if($store_id !=$_SESSION['last_ecstore_id']){
	            $this->session->set_userdata(array("last_ecstore_id"=>$store_id));
	        }
	        header("Location:".base_url()."vmall.php/goods/goods_info?store_id=".$store_id."&goods_id=".$goods_id.'&goods_ea_id='.$goods_ea_id);
	    }
	   
	}
	
    //获取品牌列表
    public function ajax_get_brand_list(){
        $store_id = isset($_SESSION['last_ecstore_id'])?$_SESSION['last_ecstore_id']:"61";
        if($store_id){
           $this->db->select('sb.brand_id,sb.brand_name,sb.brand_initial,sb.brand_class,sb.brand_pic,sb.brand_sort,st.brand_id,st.store_id');
           $this->db->from('shop_brand as sb');
           $this->db->join('store_attr_brands as st','st.brand_id= sb.brand_id','left');
           $this->db->where('st.store_id',$store_id);
           $this->db->order_by("sb.brand_sort");
           $brands = $this->db->get()->result_array();
            $data['state'] = true; 
            $data['result']['info'] = $brands;
            $data['result']['length'] = count($brands);
            echo json_encode($data);exit;
        }
        
	}
	
	
	//商品评价列表
	public function evaluate_list(){
	    $goods_id = isset($_GET['goods_id']) ? $_GET['goods_id'] : false;
	    $op = isset($_GET['op']) && !empty($_GET['op']) ? $_GET['op'] : false;
	    $storeId = isset($_GET['storeId']) && !empty($_GET['storeId']) ? $_GET['storeId'] : false;
	    
	    //店铺信息
	    $this->db->select('is_wx_store_type,ous_type');
	    $this->db->from('store');
	    $this->db->where('store_id',$storeId);
	    $store_info = $this->db->get()->row_array();
	    $this->smarty->assign('store_info',$store_info);
	    if($goods_id){
	        $where = 's.evaluation_state in (1,3) ';
	        if($op &&  $op=='pic'){
	            $where .= '  and  (geval_image <> ""  or geval_image is not null)';
	        }elseif($op &&  $op==1){
	            $where .= '  and  evaluation_level >=4 ';
	        }elseif($op &&  $op==2){
	            $where .= '  and  evaluation_level in (2,3) ';
	        }elseif($op &&  $op==3){
	            $where .= '  and  evaluation_level < 2';
	        }
	        
	        //评价
	        $this->db->select('s.buyer_nickname,o.pay_time,s.goods_color,s.goods_size,s.goods_name,s.rec_id,s.evaluation_time,s.evaluation_level,s.goods_image,s.evaluation_content,s.geval_image,s.geval_explain,u.user_name,u.head_portrait');
	        $this->db->from('shop_order_goods as s');
	        $this->db->join('user as u','u.user_id=s.user_id','left');
	        $this->db->join('shop_order as o','o.order_sn=s.order_sn','left');
	        $this->db->where('goods_id',$goods_id);
	        $this->db->where($where);
	        $this->db->order_by('evaluation_time','desc');
	        $evaluate_info = $this->db->get()->result_array();
           /*if($evaluate_info){
	            foreach ($evaluate_info as $key=>$val){
	                $evaluate_info[$key]['geval_image'] =unserialize($evaluate_info[$key]['geval_image']);
	                $evaluate_info[$key]['evaluation_content'] =trim($evaluate_info[$key]['evaluation_content']);
	            }
	        }*/
	        if($evaluate_info){
	               if(!$op){
	                   $level=array("level_all"=>count($evaluate_info),"level_1"=>0,"level_2"=>0,"level_3"=>0,"level_pic"=>0);
	               }
	            foreach ($evaluate_info as $key=>$val){
	                if(!$op){
	                    if($val['evaluation_level']>=4){
	                        $level['level_1']+=1;
	                    }elseif ($val['evaluation_level']>1 && $val['evaluation_level']<4){
	                        $level['level_2']+=1;
	                    }else{
	                        $level['level_3']+=1;
	                    }
	                    if(!empty($val['geval_image'])){
	                        $level['level_pic']+=1;
	                    }
	                }

	                if(isset($evaluate_info[$key]['geval_image']) && !empty($evaluate_info[$key]['geval_image'])){
	                    $gevalimage = $evaluate_info[$key]['geval_image'];
	                }else{
	                    $gevalimage = "";
	                }
	                $evaluationcontent =trim($evaluate_info[$key]['evaluation_content']);
	        
	                if(stripos($evaluationcontent,"###")===false){
	                    $evaluate_info[$key]['geval_image'] = !empty($gevalimage) ? @unserialize($gevalimage):"";
	                    $evaluate_info[$key]['evaluation_content'] = $evaluationcontent;
	                    $evaluate_info[$key]['add_geval_image'] = "";
	                    $evaluate_info[$key]['add_evaluation_content'] = "";
	                }else{
	                    $geval_image =explode("###",$gevalimage);
	                    $evaluation_content = explode("###",$evaluationcontent);
	                    $evaluate_info[$key]['geval_image']  = isset($geval_image[0]) && !empty($geval_image[0]) ? @unserialize($geval_image[0]):"";
	                    $evaluate_info[$key]['evaluation_content'] = isset($evaluation_content[0]) && !empty($evaluation_content[0]) ? $evaluation_content[0]:"";
	                    $evaluate_info[$key]['add_geval_image'] = isset($geval_image[1]) && !empty($geval_image[1]) ? @unserialize($geval_image[1]):"";
	                    $evaluate_info[$key]['add_evaluation_content'] = isset($evaluation_content[1]) && !empty($evaluation_content[1]) ? $evaluation_content[1]:"";
	                }
	            }
	            
	             if(!$op){
	                 $this->session->set_userdata(array("level"=>$level));
	                 $this->smarty->assign('level',$level);
	               }
	            
	        }
	        if($op){
	            $this->smarty->assign('level',$_SESSION['level']);
	        }
	        //print_r($evaluate_info);die;
	        $this->smarty->assign('evaluate_info',$evaluate_info);
	        $this->smarty->assign('op',$op);
	        $this->smarty->assign('goods_id',$goods_id);
	        $this->smarty->display('evaluate_list.html');
	    }
	}
	
    //设置浏览历史
    public function set_search_history($new_str=''){
       $new_str = isset($new_str) ? $new_str : (isset($_GET['new_str']) ? $_GET['new_str'] : false);
       var_dump($new_str);die;
       if($new_str){
           setcookie('goodsSearchHistory', $new_str,time()+86400*7); 
       }
	}
	
	//添加收藏
	public function user_add_collection(){
	    $res = array("state"=>false,"data"=>"");
        $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
        if(isset($_GET['op']) && $_GET['op']=="goods"){
            $fav_type = "goods";
            $fav_id = isset($_GET['goods_id'])?$_GET['goods_id']:false;
            $this->db->select('log_id,member_id,fav_id,fav_type');
            $this->db->from('shop_favorites');
            $this->db->where('member_id',$user_id);
            $this->db->where('fav_id',$fav_id);
            $this->db->where('fav_type',$fav_type);
            $info = $this->db->get()->row_array();
            if($info){
                if($this->db->delete("shop_favorites",array("log_id"=>$info['log_id']))){
                    $res['state'] = true;
                    $res['flag'] = "2";
                    $res['msg'] = "已取消收藏!";
                }
    	        echo  json_encode($res);exit;
    	    }
            $num = $this->db->select('goods_collect')->where("goods_id = '{$fav_id}' ")->get('shop_goods')->row('goods_collect');
            $this->db->where('goods_id',$fav_id);
            $this->db->update('shop_goods', array("goods_collect"=>$num+1));
        }else {
            $fav_type = "store";
            $fav_id = isset($_GET['store_id']) ? $_GET['store_id'] : false;
            $this->db->select ('member_id,fav_id,fav_type,log_id');
            $this->db->from ('shop_favorites');
            $this->db->where ('member_id',$user_id);
            $this->db->where ('fav_id', $fav_id);
            $this->db->where ('fav_type', $fav_type);
            $info = $this->db->get ()->row_array ();
            if ($info) {
                if ($this->db->delete ("shop_favorites", array ("log_id" => $info['log_id'], "fav_type" => "store"))) {
                    $res['state'] = true;
                    $res['flag'] = "2";
                    $res['msg'] = "已取消收藏!";
                    echo json_encode ($res);
                    exit;
                } else {
                    $res['state'] = false;
                    $res['flag'] = "2";
                    $res['msg'] = "您已收藏过该店铺了!";
                    echo json_encode ($res);
                    exit;
                }
            }
        }
	    $data = array(
            "member_id"=> $user_id,
            "member_name"=>$this->db->select('user_name')->where("user_id = '{$user_id}' ")->get('user')->row('user_name'),
            "fav_id"=>$fav_id,
            "fav_type"=>$fav_type,
            "fav_time"=>time(),
            "store_id"=>isset($_GET['store_id'])?$_GET['store_id']:false,
            "store_name"=>isset($_GET['store_name'])?$_GET['store_name']:false,
            "sc_id"=>isset($_GET['sc_id'])?$_GET['sc_id']:false,
            "goods_name"=>isset($_GET['goods_name'])?$_GET['goods_name']:false,
            "goods_ea_id"=>isset($_GET['goods_ea_id'])?$_GET['goods_ea_id']:false,
            "goods_image"=>isset($_GET['goods_image'])?$_GET['goods_image']:false,
            "gc_id"=>isset($_GET['gc_id'])?$_GET['gc_id']:false,
            "log_price"=>isset($_GET['goods_price'])?$_GET['goods_price']:false,
            "log_msg"=>isset($_GET['log_msg'])?$_GET['log_msg']:false,
        );
        $insert=$this->db->insert('shop_favorites',$data);
	    if($insert){
	        $res['state'] = true;
	        $res['flag'] = "1";
	        $res['msg'] = "已收藏!";
	    }else{
	        $res['state'] = false;
	        $res['flag'] = "1";
	        $res['msg'] = "收藏失败!";
	    }
        echo  json_encode($res);exit;
	    //print_r($res);die;

	    
	}
	
	
	//添加购物车
	public function add_user_shop_cart(){
	    $inner['buyer_id'] = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
	    $inner['goods_id'] = isset($_GET['goods_id']) ? $_GET['goods_id'] : false;
	    $inner['goods_name'] = isset($_GET['goods_name']) ? $_GET['goods_name'] : false;
	    $inner['goods_num'] = isset($_GET['goods_num']) ? $_GET['goods_num'] : false;
	    $inner['goods_image'] = isset($_GET['goods_image']) ? $_GET['goods_image'] : false;
	    $inner['goods_a_id'] = isset($_GET['goods_a_id']) ? $_GET['goods_a_id'] : false;
	    $inner['goods_spec'] = isset($_GET['goods_spec']) ? $_GET['goods_spec'] : false;
	    $inner['bl_id'] = isset($_GET['bl_id']) ? $_GET['bl_id'] : false;
	    $inner['goods_color'] = isset($_GET['goods_color']) ? $_GET['goods_color'] : false;
	    $inner['store_id'] = isset($_GET['store_id']) ? $_GET['store_id'] : false;
	    $inner['stocks_sn'] = isset($_GET['stocks_sn']) ? $_GET['stocks_sn'] : false;
	    $inner['receive_type'] = isset($_GET['type']) ? $_GET['type'] : 0;
	    $inner['goods_color_remark'] = isset($_GET['color_remark']) ? $_GET['color_remark'] : false;
	    $inner['goods_size_remark'] = isset($_GET['size_remark']) ? $_GET['size_remark'] : false;
	    $inner['goods_ea_id'] = isset($_GET['goods_ea_id']) ? $_GET['goods_ea_id'] : false;
	    $res = array("state"=>false,"data"=>"");
	    if($inner['buyer_id']&&$inner['store_id']){
	        $this->db->select('cart_id,goods_ea_id,stocks_sn,store_id,buyer_id,goods_id,goods_a_id');
	        $this->db->from('shop_cart');
	        $this->db->where('buyer_id',$inner['buyer_id']);
	        $this->db->where('store_id',$inner['store_id']);
	        $this->db->where('goods_id',$inner['goods_id']);
	        $this->db->where('goods_ea_id',$inner['goods_ea_id']);
	        // $this->db->where('goods_a_id',$inner['goods_a_id']);
	        // $this->db->where('goods_spec',$inner['goods_spec']);
	        // $this->db->where('stocks_sn',$inner['stocks_sn']);
	        $result = $this->db->get()->row_array();
	        if($result){
	            $data = array(
	                "goods_num"=>$inner['goods_num'],
	                "receive_type"=>$inner['receive_type'] 
	            );
	            $this->db->where('cart_id', $result['cart_id']);
	            $info = $this->db->update('shop_cart', $data);
	            if($info){
	                $res['state'] = true;
	                $res['msg'] = "添加成功";
	            }else{
	                $res['state'] = false;
	                $res['msg'] = "添加失败";
	            }
	        }else{
	            if($this->db->insert('shop_cart',$inner)){
	                $res['state'] = true;
	                $res['msg'] = "添加成功";
	            }else{
	                $res['state'] = false;
	                $res['msg'] = "添加失败";
	            }
	        }
	    }
	    echo  json_encode($res);exit;
	}
	
	
	//ajax获取价格 库存
	public function get_price_by_ajax(){
	    $goods_id = isset($_GET['goods_id']) ?$_GET['goods_id'] :false;
	    $size = isset($_GET['size']) ?$_GET['size'] :false;
	    $color = isset($_GET['color']) ?$_GET['color'] :false;
	    $goods_a_id = isset($_GET['goods_a_id']) ?$_GET['goods_a_id'] :false;
	    $goods_ea_id = isset($_GET['goods_ea_id']) ?$_GET['goods_ea_id'] :false;
	    $store_id =  isset($_GET['store_id']) ?$_GET['store_id'] :false;
	    
	    $this->db->select('sta.ssa_id,sta.ssa_store_id,sta.goods_id,sta.stocks_sn,sta.amount,sta.uec_amount,sta.size,sta.stocks_price,sga.stocks_marketprice');
	    $this->db->from('store_stocks_amount as sta');
	    $this->db->join('shop_goods_extend_attr as sga','sga.goods_id=sta.goods_id and sga.stocks_sku=sta.stocks_sn and sga.size=sta.size','left');
	    $this->db->where('sta.ssa_store_id',$store_id);
	    $this->db->where('sta.goods_ea_id',$goods_ea_id);
	    $res = $this->db->get()->row_array();
	    
	    $this->db->select('goods_image_id,goods_image,is_default');
	    $this->db->from('shop_goods_images');
	    $this->db->where('goods_id',$goods_id);
	    $this->db->where('color_id',$goods_a_id);
	    $img_info = $this->db->get()->result_array();
	    if( $img_info){
	        $flag = false;
	        foreach ($img_info as $key=>$val){
	            if($val['is_default']==1){
	                $flag = true;
	                $res['img_info'] = $img_info[$key]['goods_image'];
	                break;
	            }
	        }
	        if($flag==false){
	            $res['img_info'] = $img_info[0]['goods_image'];
	        }
	    }else{
	        $res['img_info'] = false;
	    }
	    $result = array("state"=>false,"data"=>"");
	    if($res){
	        $result['state'] = true;
	        $result['data'] = $res;
	    }
	  echo  json_encode($result);exit;
	}
	
	
	//ajax获取size
	public function get_size_by_ajax(){
	    $goods_id = isset($_GET['goods_id']) ?$_GET['goods_id'] :false;
	    $goods_a_id = isset($_GET['goods_a_id']) ?$_GET['goods_a_id'] :false;
	    $store_id = isset($_GET['store_id']) ?$_GET['store_id'] :false;
	    
	    
	    $this->db->select('goods_ea_id,goods_id,goods_a_id,color,stocks_sku,size,size_note');
	    $this->db->from('shop_goods_extend_attr');
	    $this->db->where('goods_id',$goods_id);
	    $this->db->where("goods_a_id='{$goods_a_id}'");
        $size = $this->db->get()->result_array();
	    $result = array("state"=>false,"data"=>"");
	    if($size){
	        foreach ($size as $key=>$val){
	            $goods_ea_id = $val['goods_ea_id'];
	            $num = $this->db->select('amount,uec_amount')->from('store_stocks_amount')->where("ssa_store_id = '{$store_id}' and goods_ea_id = '{$goods_ea_id}' ")->get()->row_array();
	            //$num = $this->db->select('amount')->where("ssa_store_id = '{$store_id}' and goods_ea_id = '{$goods_ea_id}' ")->get('store_stocks_amount')->row('amount');
	            $size[$key]['goodsamount']=0;
	            if($num['amount']){
	                $size[$key]['goodsamount']=1;
	            }else{
	                if($num['uec_amount']){
	                    $size[$key]['goodsamount']=1;
	                }
	            }
	        }
	        $result['state'] = true;
	        $result['data'] = $size;
	    }
	    echo  json_encode($result);exit;
	}
	
	
	//ajax获取color
	public function get_color_by_ajax(){
	    $goods_id = isset($_GET['goods_id']) ?$_GET['goods_id'] :false;
	    $this->db->select('goods_id,goods_ea_id,goods_a_id,color,stocks_sku,color_remark');
    	$this->db->from('shop_goods_extend_attr');
    	$this->db->where('goods_id',$goods_id);
    	$this->db->group_by("goods_a_id");
    	$color = $this->db->get()->result_array();
	    $result = array("state"=>false,"data"=>"");
	    if($color){
	        $result['state'] = true;
	        $result['data'] = $color;
	    }
	    echo  json_encode($result);exit;
	}

	//ajax获取配送地址
    public function get_address_by_ajax()
    {
        $user_id = isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']) ? $_SESSION['user_id'] :false;
        //或者得到用户定位作为地址信息

        //查询省市区信息所有信息
        $user_addr = $this->db->select('*')->where('user_id',$user_id)->get('user_address')->result_array();
        $i = 0;
        $this->load->model('user_model');
        foreach ($user_addr as $v) {
            $area               = $this->user_model->get_area_infos($v['province_id'],$v['city_id'],$v['area_id']);
            $address            = $this->db->select('address')->where('ua_id', $v['ua_id'])->get('user_address')->row('address');
            $arr[$i++]['address'] = $area.','.$address;
            if ($v['is_default'] == '1'){
                $arr[($i-1)]['is_default']  = 1;
            }
        }
        echo json_encode ($arr);exit;
    }

    //根据id查询到具体的地址
    public function ajax_get_addresss(){
        $user_id = $_SESSION['user_id'];
        $this->load->model('user_model');
        $area       = $this->user_model->get_area_infos($_POST['province_id'],$_POST['city_id'],$_POST['area_id']);
        $address    = $this->db->select('address')->where('ua_id', $_POST['ua_id'])->get('user_address')->row('address');
        $area       = $area.','.$address;
        echo json_encode ($area);die;
    }


	
	//向用户发送验证码
	public  function getConsumerVerifyCode(){
	    $code=rand(100000,999999);
	    $tel = $this->input->post('tel');
	    $content = array('code'=>"$code",'product'=>"云聚客");
	    $data['phone'] = $tel;
	    $data['content'] = json_encode($content);
	    $data['template_sms_id'] = 'SMS_62130007';
	    $resp = $this->common_function->AlidayuSms($data);
	    $flag = 0;
	    if(isset($resp['result']['success'])&&$resp['result']['success']==true){
	        $VerifyCode = array("tel"=>$tel,"Code"=>$code,"times"=>time());
	        $this->session->set_userdata(array("VerifyCode"=>$VerifyCode));
	        $flag = 1;
	        $res['state'] = true;
	        $res['errmsg'] = "发送验证码成功";
	    }else{
	        $flag = 0;
	        $res['state'] = false;
	        $res['errmsg'] = "发送验证码失败";
	    }
	    echo  json_encode( $res );exit;
	}
	
	//检查验证码  用户注册或登录
	public  function checkConsumerPhone(){
	    $user_id = isset($_SESSION['user_id']) ?$_SESSION['user_id']:"";
	    $datacode = $this->input->post('data');
	    $code = $datacode['code'];
	    $phone = $datacode['phone'];
	    $times = time();
	    $VerifyCode = isset($_SESSION["VerifyCode"]) && !empty($_SESSION["VerifyCode"])?$_SESSION["VerifyCode"]:false;
	    if($VerifyCode){
	        $old_code = $VerifyCode['Code'];
	        $old_time = $VerifyCode['times'];
	        $old_tel  = $VerifyCode['tel'];
	        if($times-$old_time<60){
	            if($code == $old_code ){
	                $this->db->where('user_id', $user_id);
	                $this->db->update('user', array("tel"=>$phone,"reg_time"=>$times));
	                $res['state'] = true;
	                $res['errmsg'] = "验证通过";
	            }else{
	                $res['state'] = false;
	                $res['errmsg'] = "验证码错误";
	            }
	        }else{
	            $res['state'] = false;
	            $res['errmsg'] = "验证码已过期";
	        }
	    }else{
	        $res['state'] = false;
	        $res['errmsg'] = "手机号码错误";
	    }
	    echo  json_encode($res);exit;
	}
	
	
	
	
   
}
