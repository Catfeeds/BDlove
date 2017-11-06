<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('pay_model');
        $this->load->model('order_model');
        
    }
	
	public function index(){
	}
	//手工下单
	public function place_order(){
		$this->common_function->pay_role("seller_retail");//权限
		$page = isset($_POST['curpage']) ? intval($_POST['curpage']) : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$start = ($page - 1) * $rp;
		$sexs = array(2 => '男', 1 => '女', 0 => '中性');
		$season = array(1 => 'Q1', 2 => 'Q2', 3 => 'Q3',4=>'Q4');
		$user_id = $_SESSION['shop_spg_store_id'];
		//$auth_store = $this->order_model->get_auth_stores();
		if (isset($_GET['op']) && $_GET['op'] == 'page') {
			 
			if(empty($user_id)){
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
					$search_gc_id = $this->common_function->get_son_cate($search['gc_id']);
					$gc_id_arr = array();
					if(!empty($search_gc_id)&&is_array($search_gc_id)){
						foreach ($search_gc_id as $kc=>$vc){
							$gc_id_arr[] = $vc['gc_id'];
						}
					}
					$gc_id_arr[] = $search['gc_id'];
					$this->db->where_in('g.gc_id',$gc_id_arr);
				}
				if($search['stocks_price']){
					$search_price = explode('-',$search['stocks_price']);
					$start_prcie = isset($search_price[0])?$search_price[0]:'';
					$end_prcie = isset($search_price[1])?$search_price[1]:'';
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
				$this->db->where('ss.ssa_store_id',$user_id);
				$this->db->where('g.goods_state',1);
				$this->db->select('ge.goods_a_id');
				$this->db->group_by('ge.goods_a_id');
		
				$db = clone($this->db);
				$total = $this->db->count_all_results();
				//print_r($this->db->last_query());die;
				$start = $rp * ($page - 1);
				$this->db = $db;
				if($search['sort']){
					if($search['sort']=='selas'){
						//$this->db->order_by("");
					}elseif($search['sort']=='stocks'){
						$this->db->order_by("sum(ss.amount) DESC,g.goods_addtime DESC");
					}
				}else{
					$this->db->order_by("g.goods_addtime DESC");
				}
				$rows = $this->db->order_by('g.goods_addtime')->limit($rp, $start)->get()->result_array();
				$goods_data = array();
				foreach ($rows as $k=>$v){
					$goods_info = $this->db->select('g.goods_id,g.goods_name,g.goods_jingle,g.gc_id,g.gc_name,g.brand_id,g.brand_name,g.goods_price,g.goods_marketprice,g.goods_image,g.goods_spu,
        	        g.goods_tag,g.year_to_market,g.season_to_market,g.sex,g.weight,ge.goods_a_id,ge.color,ge.color_remark,ge.stocks_price,ge.stocks_marketprice,ge.stocks_sku,gc.weight as gc_weight')->
		        	        from('shop_goods_extend_attr ge')
		        	        ->join('shop_goods g','g.goods_id=ge.goods_id')
		        	        ->join('shop_goods_class gc','gc.gc_id=g.gc_id','left')
		        	        ->where('ge.goods_a_id',$v['goods_a_id'])->get()->row_array();
					        if(!empty($goods_info)){
					        	$goods_info['sex'] = isset($sexs[$goods_info['sex']])?$sexs[$goods_info['sex']]:'';
					        	$goods_info['season_to_market'] = isset($season[$goods_info['season_to_market']])?$season[$goods_info['season_to_market']]:'';
					        	$goods_info['weight'] = ($goods_info['weight']>0)?$goods_info['weight']:$goods_info['gc_weight'];
					        }else{
					        	$goods_info['sex'] = '';
					        	$goods_info['season_to_market'] = '';
					        	$goods_info['weight'] = '';
					        }
		        	        $goods_data[$v['goods_a_id']]['sku'] = $goods_info;
		        	        $this->db->from('store_stocks_amount ss')
		        	        ->join('store s','s.store_id=ss.ssa_store_id')
		        	        ->join('shop_goods g','g.goods_id=ss.goods_id')
		        	        ->join('shop_goods_extend_attr ge','ge.goods_ea_id=ss.goods_ea_id');
		        	        $this->db->select('ss.amount,ss.size,ss.ssa_store_id,ss.goods_size_remark,s.store_name,ss.stocks_price,ss.update_time,ss.goods_ea_id,ss.ssa_id');
		        	        $this->db->where('ge.goods_a_id',$v['goods_a_id']);
		        	        $this->db->where_in('ss.ssa_store_id',$user_id);
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
		        	        $sku_img = $this->db->select('goods_image')->where('color_id',$v['goods_a_id'])->order_by('is_default DESC,goods_image_sort ASC')->get('shop_goods_images')->row('goods_image');
		        	        //print_r(($sku_img));die;
		        	        if(!empty($sku_img)){
		        	        	$goods_data[$v['goods_a_id']]['sku']['goods_image'] = img_http($sku_img);
		        	        }else{
		        	        	$goods_data[$v['goods_a_id']]['sku']['goods_image'] = img_http($goods_data[$v['goods_a_id']]['sku']['goods_image']);
		
		        	        }
				}
			}
			 
			//print_r($goods_data);print_r($rows);print_r($this->db->last_query());die;
			/*$this->db->select(',,
			 ss.stocks_sn');*/
			$goods_info = $goods_data;
			$goods_info = $goods_info ? $goods_info : 0;
			// print_r($goods_info);die;
			$total_num = $total;
			//var_dump($this->db->last_query());exit;
			$page_count = ceil($total_num / $rp);
			$rows = $goods_data;
			$page_info = array('total_num' => $total_num, 'page_count' => $page_count, 'page' => $page, 'rp' => $rp, 'start' => $start + 1, 'to' => $start + count($rows));
			//print_r($page_info);die;
			$this->smarty->assign('page_info', $page_info);
			$this->smarty->assign('goods_info', $goods_info);
			$body = $this->smarty->fetch('place_order_body.html');
		
			echo $body;
		} else {
			$this->load->model('goods_model');
			$brands = $cate_arr = array();
			$brands = $this->order_model->get_brands();
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
		
			$search = array('ways' => $ways, 'brands' => $brands, 'cate_option' => $cate_option, 'sizes' => $sizes, 'colors' => $colors, 'sexs' => $sexs, 'price_area' => $price_area, 'discount_area' => $discount_area, 'years' => $years, 'quarters' => $quarters, 'orders' => $orders, 'picture' => $picture,);
			$page_info = array('total_num' => 0, 'page_count' => 0, 'page' => 0, 'rp' => $rp, 'start' => $start + 1, 'to' => 0);
			$defaultImg = $this->common_function->get_system_value('default_goods_image');
			//jgh 2017.9.20
			$class_arr=$this->get_all_json_cate_by_parent_id($gc_parent_id = 0, $level_num = 0,$source='all');
			$this->smarty->assign ('class_arr', $class_arr);
			$this->smarty->assign ('source', 'all');
		
			$this->smarty->assign('defaultImg',$defaultImg);
			$this->smarty->assign('page_info', $page_info);
			$this->smarty->assign('search', $search);
			$this->smarty->display('place_order.html');
		}
	}
	//jgh   2017.9.20
	public function get_all_json_cate_by_parent_id($gc_parent_id = 0, $level_num = 0,$source='all',$num=1) {
		$product_cate = array();
		$gc_parent_id = intval($gc_parent_id);
		$sql = "select count(*) as num from " . $this->db->dbprefix('shop_goods_class') . " where gc_parent_id =" . $gc_parent_id;
		if ($this->db->query($sql)->row('num') || $gc_parent_id == 0) {
			$sql = 'SELECT gc_id, gc_name ' . ' FROM ' . $this->db->dbprefix('shop_goods_class') .
			' WHERE gc_parent_id=' . $gc_parent_id .
			' ORDER BY gc_sort ASC';
			$data = $this->db->query($sql)->result_array();
			$str = '[{"id":"","name":"全部"},';
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
					//$total = $this->db->get()->num_rows();
					//                    if($total){
					//                        $gc_name = $v['gc_name']."<span class='cl-red'>*</span>";
					//                    }
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
	//导出库存
    public function place_order_export()
    {
        $this->common_function->pay_role("seller_retail");//权限

        $sexs = array(2 => '男', 1 => '女', 0 => '中性');
        $season = array(1 => 'Q1', 2 => 'Q2', 3 => 'Q3',4=>'Q4');
        $user_id = $_SESSION['shop_spg_store_id'];
        $where = ' 1=1 ';
        $search['auth_store_id'] = isset($_GET['auth_store_id'])?trim($_GET['auth_store_id']):'';
        $search['brand_id'] = isset($_GET['brand_id'])?trim($_GET['brand_id']):'';
        $search['gc_id'] = isset($_GET['gc_id'])?trim($_GET['gc_id']):'';
        $search['size'] = isset($_GET['size'])?trim($_GET['size']):'';
        $search['color'] = isset($_GET['color'])?trim($_GET['color']):'';
        $search['sex'] = isset($_GET['sex'])?trim($_GET['sex']):'';
        $search['stocks_price'] = isset($_GET['stocks_price'])?trim($_GET['stocks_price']):'';
        $search['discount'] = isset($_GET['discount'])?trim($_GET['discount']):'';
        $search['year_to_market'] = isset($_GET['year_to_market'])?trim($_GET['year_to_market']):'';
        $search['season_to_market'] = isset($_GET['season_to_market'])?trim($_GET['season_to_market']):'';
        $search['sort'] = isset($_GET['sort'])?trim($_GET['sort']):'';
        $search['goods_image'] = isset($_GET['goods_image'])?trim($_GET['goods_image']):'';
        $search['stocks_sn'] = isset($_GET['stocks_sn'])?trim($_GET['stocks_sn']):'';
        $search['goods_spu'] = isset($_GET['goods_spu'])?trim($_GET['goods_spu']):'';

        if($search['gc_id']){
            $search_gc_id = $this->common_function->get_son_cate($search['gc_id']);
            $gc_id_arr = array();
            if(!empty($search_gc_id)&&is_array($search_gc_id)){
                foreach ($search_gc_id as $kc=>$vc){
                    $gc_id_arr[] = $vc['gc_id'];
                }
            }
            $gc_id_arr[] = $search['gc_id'];
            $this->db->where_in('g.gc_id',$gc_id_arr);
        }
        if($search['stocks_price']){
            $search_price = explode('-',$search['stocks_price']);
            $start_prcie = isset($search_price[0])?$search_price[0]:'';
            $end_prcie = isset($search_price[1])?$search_price[1]:'';
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
        $this->db->where('ss.ssa_store_id',$_SESSION['shop_spg_store_id']);
        $this->db->where('g.goods_state',1);
        $select = 'ss.stocks_sn,';     //要导出的内容
        if (isset($_GET['export'])) {       //拼接要导出的内容进行搜索
            isset($_GET['export']['e_goods_name']) ? $select.='g.goods_name,' :'';
            isset($_GET['export']['e_stocks_bar_code']) ? $select.='ss.stocks_bar_code,' :'';
            isset($_GET['export']['e_class']) ? $select.='g.gc_name,' :'';
            isset($_GET['export']['e_brand']) ? $select.='g.brand_name,' :'';
            isset($_GET['export']['e_color']) ? $select.='ss.goods_color_remark,' :'';
            isset($_GET['export']['e_sex']) ? $select.='g.sex,' :'';
            isset($_GET['export']['e_goods_marketprice']) ? $select.='g.goods_marketprice,' :'';
            isset($_GET['export']['e_year']) ? $select.='g.year_to_market,' :'';
        }
        $select .='g.season_to_market,ss.size,ss.amount';  //季节，尺码，库存
        $this->db->select($select);

        if($search['sort']){
            if($search['sort']=='selas'){
                //$this->db->order_by("");
            }elseif($search['sort']=='stocks'){
                $this->db->order_by("sum(ss.amount) DESC,g.goods_addtime DESC");
            }
        }else{
            $this->db->order_by("g.goods_addtime DESC");
        }

        $export = $this->db->get()->result_array();

        //$this->common_function->pay_role("seller_order_export");//权限
        $time = date('YmdHis');
        $filename = 'place_order_list_' . $time;
        $dlname = $time . '库存列表';
        $file_path = ROOTPATH . 'data/excel_download/' . $filename . '.csv';
        //拼接导出文件标题
        $excel_titel = array(chr(0xef) . chr(0xbb) . chr(0xbf) . '货号');
        if (isset($_GET['export'])) {       //拼接导出内容标题
            foreach ($_GET['export'] as $v) {
                isset($v)?$excel_titel[]=$v:'';
            }
        }
        $excel_titel[] = '季节';
        $excel_titel[] = '尺码';
        $excel_titel[] = '库存';

        //打开文件
        $fp = @fopen($file_path, 'a');
        @fputcsv($fp, $excel_titel);
        foreach ($export  as $key) {
            $excel = array();
            foreach ($key as $k => $v) {
                if ($k == 'sex') {        //性别判断处理
                    $v = $sexs[$v];
                }
                if ($k == 'season_to_market') { //季节处理
                    $v = $season[$v];
                }
                is_numeric($v)?$v."\t":$v;  //对长数字显示问题进行处理
                $excel[$k] = $v;    //保存到输出文件中
            }
            @fputcsv($fp, $excel);
        }
        $download_path = str_replace('\\', '/', trim(base_url() . 'data/excel_download/' . $filename . '.csv'));
        header("location:" . $download_path);
        //$this->common_function->insert_download($dlname, $download_path, time(), 2);
        exit;
    }

	public function push_shop_cart(){
        $this->common_function->pay_role("seller_retail");//权限
		$user_id = $_SESSION['shop_spg_store_id'];
		$result = array('state' => false, 'msg' => '操作错误，请重试');
		if ($_POST && $user_id) {
			$data = isset($_POST['data']) ? trim($_POST['data']) : false;
			if ($data) {
				//批量下单
				$data = explode('|', $data);
				$arr = array();
				for ($i = 0; $i < count($data); $i++) {
					$arr[$i]['ssa_id'] = trim(explode(',', $data[$i])[0]);
					$arr[$i]['amount'] = trim(explode(',', $data[$i])[1]);
				}
				//print_r($arr);die;
				if ($arr && is_array($arr)) {
					$flag = true;
					foreach ($arr as $k => $v) {
						if(!empty($v['ssa_id']&&!empty($v['amount']))){
							$stocks_info = $this->db->select('sa.goods_id,sa.goods_ea_id,sa.stocks_sn,sa.stocks_bar_code,sa.size as goods_spec,
						    sa.goods_size_remark,sa.color as goods_color,sa.goods_color_remark,g.goods_name,g.goods_image,ge.goods_a_id')
						    ->from('store_stocks_amount sa')
						    ->join('shop_goods g','g.goods_id=sa.goods_id')
						    ->join('shop_goods_extend_attr ge','ge.goods_ea_id=sa.goods_ea_id')
						    ->where('sa.ssa_id',$v['ssa_id'])->get()->row_array();
						    $cart = $stocks_info;
						    $cart['buyer_id'] = $user_id;
						    $cart['user_type'] = 2;
						    $cart['goods_num'] = $v['amount'];
						    $where = " buyer_id=" . $user_id . " and goods_ea_id='" . $stocks_info['goods_ea_id'] . "' and user_type=2" ;
						    $re_cart = $this->db->select('cart_id')->from('shop_cart')->where($where)->get()->row_array();
						    if ($re_cart) {
						    	$this->db->where('cart_id', $re_cart['cart_id']);
						    	$re = $this->db->update('shop_cart', $cart);
						    	if (!$re) {
						    		$flag = false;
						    	}
						    } else {
						    	$re = $this->db->insert('shop_cart', $cart);
						    	if (!$re) {
						    		$flag = false;
						    	}
						    }						
						}
						
					}
					if ($flag) {
						$total = $this->db->select('sum(goods_num) as total')->from('shop_cart')->where('buyer_id',$user_id)->where('user_type',2)->get()->row('total');
						$result = array('state' => true, 'msg' => '商品已添加到购物车', 'data' => $total);
					} else {
						$result = array('state' => false, 'msg' => '商品下单失败');
					}
				}
				
			} 
			
		}
		echo json_encode($result);
		
	}
	public function check_out_order(){
		$this->common_function->pay_role("seller_retail");//权限
		$user_id = $_SESSION['shop_spg_store_id'];
		$out_order_sn = isset($_POST['order']) ? trim($_POST['order']) : '';
		$check_sn = $this->db->select('order_sn')->where('out_order_sn',$out_order_sn)->where('buyer_id',$user_id)->where('order_type',3)->get('shop_order')->row('order_sn');
		//print_r($check_sn);die;
		if($check_sn){
			echo 'false';exit;
		}else{
			echo 'true';exit;
		}
		
	}
	public function shop_cart(){
        $this->common_function->pay_role("seller_retail");//权限
		$user_id = $_SESSION['shop_spg_store_id'];
		if ($user_id) {
			if (!isset($_GET['op'])) {
				$shop_info = $this->order_model->get_shop_cart($user_id);
				$data = array();
				$ex_info = array(); //物流信息
				$depot = array(); //物流信息
				$season = array(1=>'Q1',2=>'Q2',3=>'Q3',4=>'Q4','0'=>'');
				foreach ($shop_info as $k => $v) {
					$stock_info = $v;
					$stock_info_ = $this->db->select('g.brand_name,g.brand_id,g.weight,g.year_to_market,g.season_to_market,g.goods_spu,ss.stocks_price,s.store_name,ss.amount,
							ss.stocks_sn,gc.weight as gc_weight')
					->from('store_stocks_amount ss')
					->join('shop_goods g','g.goods_id=ss.goods_id')
					->join('shop_brand b','b.brand_id=g.brand_id')
					->join('shop_goods_class gc','gc.gc_id=g.gc_id')
					->join('store s','s.store_id=ss.ssa_store_id')->where('ss.goods_ea_id',$v['goods_ea_id'])
					->where('ss.ssa_store_id',$user_id)->where('g.goods_state',1)->get()->row_array();
					if(empty($stock_info_)){
						$this->db->delete('shop_cart',array('cart_id'=>$v['cart_id']));
						continue;
					}
					$stock_info['goods_spu'] = $stock_info_['goods_spu'];
					$goods_season = isset($season[$stock_info_['season_to_market']])?$season[$stock_info_['season_to_market']]:'';
					$stock_info['market_date'] = $stock_info_['year_to_market'].$goods_season;
					$stock_info['stocks_price'] = $stock_info_['stocks_price'];
					$stock_info['store_name'] = $stock_info_['store_name'];
					$stock_info['amount'] = $stock_info_['amount'];
					$stock_info['weight'] = ($stock_info_['weight']>0)?$stock_info_['weight']:$stock_info_['gc_weight'];
					$stock_info['brand_name'] = $stock_info_['brand_name'];
					$stock_info['brand_id'] = $stock_info_['brand_id'];
					$stock_info['stocks_sn'] = empty($stock_info['stocks_sn'])?$stock_info_['stocks_sn']:$stock_info['stocks_sn'];
					$stock_info['key_code'] = encrypt_pwd($v['cart_id'].$v['goods_ea_id'].$stock_info['stocks_price']);
					$data[$k] = $stock_info; //货号
				}
				//print_r($data);die;
				//$user_info = $this->db->select('true_name,tel')->where('user_id', $user_id)->get('user')->row_array();
				$pro = $this->common_function->get_area();
				$this->smarty->assign('user_id', $user_id);
				$this->smarty->assign('shop', $data);
				$this->smarty->assign('pro', $pro);
				//$this->smarty->assign('user_info', '');
				//$this->smarty->assign('express', $ex_info);//物流信息
				$this->smarty->display('shop_cart.html');
			}
		}
		
	}
	//删除购物车
	public function delete_shop_cart() {
        $this->common_function->pay_role("seller_retail");//权限
		$usc_id = isset($_POST['usc_id']) ? $_POST['usc_id'] : false;
		$user_id = $_SESSION['shop_spg_store_id'];
		$result = array('state' => false, 'data' => '', 'num' => '', 'weight' => '', 'price' => '');
		if (($usc_id > 0) && ($user_id > 0)) {
			$this->db->where('cart_id', $usc_id);
			$re = $this->db->delete('shop_cart');
			if ($re) {
				$result['num'] = $this->db->select('sum(goods_num) as total')
    	        ->from('shop_cart')->where('buyer_id',$user_id)->where('user_type',2)->get()->row('total');
				$result['state'] = true;
			}
		}
		//print_r($result);print_r($shop_info);exit;
		echo json_encode($result);
		exit;
	}
	//清空购物车
	public function clear_shop() {
        $this->common_function->pay_role("seller_retail");//权限
		$id = $_SESSION['shop_spg_store_id'];
		$result = array('state' => false, 'msg' => '操作错误');
		if ($id) {
			$re = $this->db->where('buyer_id', $id)->where('user_type',2)->delete('shop_cart');
			if ($re) {
				$result = array('state' => true, 'msg' => '购物车已清空');
			} else {
				$result['msg'] = '清空失败';
			}
		}
		echo json_encode($result);
		exit;
	}
	//购物车结算
	public function shop_cart_sure() {
        $this->common_function->pay_role("seller_retail");//权限
		$user_id = $_SESSION['shop_spg_store_id'];
		$name = isset($_POST['name']) ? $_POST['name'] : ''; //收货人
		$addr = isset($_POST['detail_adr']) ? $_POST['detail_adr'] : ''; //地址
		$postcode = isset($_POST['postcode']) ? $_POST['postcode'] : ''; //邮编
		$phone = isset($_POST['phone']) ? $_POST['phone'] : ''; //手机
		$tel = isset($_POST['phone_']) ? $_POST['phone_'] : ''; //座机
		$sender = isset($_POST['sender']) ? $_POST['sender'] : ''; //寄件人
		$sender_mobile = isset($_POST['sender_mobile']) ? $_POST['sender_mobile'] : ''; //寄件人电话
		$oos_deal = isset($_POST['rad_']) ? $_POST['rad_'] : 1; //缺货处理
		$custom_sn = isset($_POST['c_order']) ? $_POST['c_order'] : ''; //客户单号
		$note = isset($_POST['bz']) ? $_POST['bz'] : ''; //备注
		$goods_info = isset($_POST['goods']) ? $_POST['goods'] : false; //货品信息
		$province = isset($_POST['sel']) ? trim($_POST['sel']) : false;
		$city = isset($_POST['sel1']) ? trim($_POST['sel1']) : false;
		$area = isset($_POST['sel2']) ? trim($_POST['sel2']) : false;
		$result = array('state'=>false,'msg'=>'操作错误!');
		if ($user_id) {
			if (empty($goods_info)) {
				$result['msg'] = '你的购物车为空，请添加货品！';$result['state'] = 101;
				echo json_encode($result);
				exit;
			}
			$goods = array();
			foreach ($goods_info['cart_id'] as $k => $v) {
				foreach ($goods_info as $ka => $va) {
					$goods[$v][$ka] = $va[$v];
				}
			}
			
			$total_stock_num = count($goods);
			//print_r($goods);exit;
			//$user_info = $this->user_model->getUserInfo($user_id);
			$goods_data_arr = array();
			$depot = array();$submit_flag = true;$goods_price =0;$cart = array();$goods_num = 0;
			foreach ($goods as $ka => $va) {
				$key_code = encrypt_pwd($va['cart_id'].$va['goods_ea_id'].$va['stocks_price']);
				$goods_price +=$va['stocks_price']*$va['amount'];
				$cart[] = $va['cart_id'];$goods_num +=$va['amount'];
				if($key_code!=$va['key_code']){
					$submit_flag = false;continue;
				}
				//$goods_data_arr[$user_id]['stock'][] = $va; //货品分仓
				//$depot[] = $user_id;
			}
	        if(!$submit_flag){
	        	$result['msg'] = '提交的数据不合法！';
	        	echo json_encode($result);
	        	exit;
	        }
	        $time = time();
	        $order_sn = $this->common_function->produce_order_sn($user_id);
	        $sql_goods = array();
	        foreach ($goods as $k=>$v){
	        	$stock_info = $this->db->select('ge.goods_a_id,g.goods_id,g.goods_image,g.goods_name,g.gc_id,ss.goods_size_remark,ss.goods_color_remark,ss.stocks_bar_code,ss.size,ss.color')
	        	->from('store_stocks_amount ss')
	        	->join('shop_goods g','g.goods_id=ss.goods_id')
	        	->join('shop_goods_extend_attr ge','ge.goods_ea_id=ss.goods_ea_id')
	        	->where('ss.goods_ea_id',$v['goods_ea_id'])
	        	->where('ss.ssa_store_id',$user_id)->get()->row_array();
	        	$order_goods['order_sn']=$order_sn;
	        	$order_goods['out_order_sn']=$custom_sn;
	        	$order_goods['outside_son_order_sn']=$custom_sn;
	        	$order_goods['goods_id']=$stock_info['goods_id'];
	        	$order_goods['goods_name']=$stock_info['goods_name'];
	        	$sku_img = $this->db->select('goods_image')->where('color_id',$stock_info['goods_a_id'])->order_by('is_default,goods_image_sort','DESC,DESC')->get('shop_goods_images')->row('goods_image');
	        	if(!empty($sku_img)){
	        		$order_goods['goods_image'] = img_http($sku_img);
	        	}else{
	        		$order_goods['goods_image'] = img_http($stock_info['goods_image']);
	        	}
	        	$order_goods['goods_num']=$v['amount'];
	        	$order_goods['goods_size']=$stock_info['size'];
	        	$order_goods['goods_size_remark']=$stock_info['goods_size_remark'];
	        	$order_goods['goods_color']=$stock_info['color'];
	        	$order_goods['goods_color_remark']=$stock_info['goods_color_remark'];
	        	$order_goods['goods_ea_id']=$v['goods_ea_id'];
	        	$order_goods['goods_a_id']=$stock_info['goods_a_id'];
	        	$order_goods['goods_price']=$v['stocks_price'];
	        	$order_goods['goods_pay_price']=$v['stocks_price'];
	        	$order_goods['user_id']=$user_id;
	        	//$order_goods['store_id']=$v['store_id'];
	        	$order_goods['gc_id']=$stock_info['gc_id'];
	        	$order_goods['stock_code']=$v['stocks_sn'];
	        	$order_goods['sotck_barcode']=$stock_info['stocks_bar_code'];
	        	$sql_goods[] = $order_goods;
	        } 
	        $sql_order = array(
					'order_sn'=>$order_sn,'order_type'=>3,'out_order_sn'=>$custom_sn,
					'order_from'=>43,'order_status'=>10,
					'buyer_id'=>$user_id,'shipping_type'=>1,'order_price'=>$goods_price,
					'goods_num'=>$goods_num,'goods_price'=>$goods_price,
					'created_time'=>$time,'buyer_message'=>$note,'receive_name'=>$name,'receive_province'=>$province,
					'receive_city'=>$city,'receive_area'=>$area,'receive_address'=>$addr,'receive_mobile'=>$phone,
					'receive_tel'=>$tel,'receive_postcode'=>$postcode,'modify_time'=>$time,
			);
	        $sql_log = array();
	        $sql_log['order_sn'] = $order_sn;
	        $sql_log['log_msg'] = '电商门店手工下单';
	        $sql_log['log_time'] = $time;
	        $sql_log['log_role'] = '导购';
	        $sql_log['log_user'] = $_SESSION['shop_spg_id'];
	        $sql_log['log_orderstate'] = 10;
			if(!empty($sql_order)&&!empty($sql_goods)){
			 	$this->db->trans_begin(); //开启事物
			 	$this->db->insert('shop_order_log',$sql_log);//订单日志
			 	$this->db->insert('shop_order',$sql_order);//订单
			 	$this->db->insert_batch('shop_order_goods',$sql_goods);//订单商品
			 	$this->db->where_in('cart_id', $cart)->delete('shop_cart');
			 	if ($this->db->trans_status() === FALSE) {
			 		$this->db->trans_rollback();
			 		$error_msg = "订单提交失败。";
			 		$result['msg'] = $error_msg;
			 	}else{
			 		$this->db->trans_commit();
			 		$userInfo = array('user_name'=>$name,'user_addres'=>$addr,'tel'=>$phone,'province_id'=>$province,'city_id'=>$city,
			 				'area_id'=>$area
			 		);//会员信息；
			 		$this->common_function->insert_user_info($userInfo);
			 		$result['state'] = true;$result['num']=0;$result['msg'] = '订单提交成功';
			 		$this->common_function->insertUserLog('手工下单', 1, 3, 'add');
			 		
			 		//$mobile = $phone;


			 		//$content0 = $this->db->select('template_id,template_content')->where('template_code','gmtz')->get('sms_templates')->row_array();
			 		//$USER_NAME = $name;
			 		$STORE_NAME = $this->db->select('bind_ecstore_name')->where('store_id',$user_id)->get('store')->row('bind_ecstore_name');
			 		//$BRAND_NAME = $sql_goods_in[0]['uec_goods_name'];
			 		$goods_brand = $this->db->select('brand_name')->where('goods_id',$sql_goods[0]['goods_id'])->get('shop_goods')->row('brand_name');
					$STORE_NAME	='本店';
			 		$goods_stock = $sql_goods[0]['stock_code'];
			 		//$BRAND_NAME = $goods_brand.$goods_stock;
			 	//	$content = str_replace('{$BRAND_NAME}',$BRAND_NAME,str_replace('{$STORE_NAME}',$STORE_NAME,str_replace('{$USER_NAME}',$USER_NAME,$content0['template_content'])));
					$BRAND_NAME = $goods_brand;

			 		//$result['msg'] .= $sms_msg['msg'].$content;

                     $wx_data = array(
                        "name"=>array("value"=>"{$order_goods['goods_name']}",
                            "color"=>"#173177"
                        ),
                        "remark"=>array("value"=>"您的商品已购买成功，正在为您备货哟",
                            "color"=>"#173177"
                        )
                    );
                    $wx_code = "GMTZ";
					//$tel = $phone;
//yu
					$check = $this->db->where('store_id', $_SESSION['shop_spg_store_id'])->from('store')->get()->row('is_buy_sms');
					$content= '';
					if ($check) {
						//短信内容
						$USER_NAME=$name;
						$GOODS_NAME=$order_goods['goods_name'];
						$USER_NAME=isset($USER_NAME)?$USER_NAME:'用户';
						$STORE_NAME=isset($STORE_NAME)?$STORE_NAME:'本店';
						$BRAND_NAME=isset($BRAND_NAME)?$BRAND_NAME:'';
						$GOODS_NAME=isset($GOODS_NAME)?$GOODS_NAME:'商品';
						$arr=array('{$USER_NAME}'=>$USER_NAME,'{$STORE_NAME}'=>$STORE_NAME,'{$BRAND_NAME}'=>$BRAND_NAME,'{$GOODS_NAME}'=>$GOODS_NAME);
						$res = $this->db->select('template_id,template_content')->where('template_code','gmtz')->get('sms_templates')->row_array();
						$content=$this->common_function->make_send_content($res['template_content'],$arr);

					}
					//订单号
					$order_sn =$order_sn;
					//微信模板消息跳转url
					$tel = $phone;
					$url = base_url('vmall.php/order/order_detail?order_sn=').$order_sn;
                    $aaa=$this->common_function->send_msg($wx_data, $wx_code, $tel, $content, $url, $order_sn,$res['template_id']);
					var_dump($aaa);


			 	}
			 }

			 echo json_encode($result);
			 exit;
			
		}
	}
	//下单
	public function order_submit() {
        $this->common_function->pay_role("seller_retail");//权限
		$user_id = $_SESSION['shop_spg_store_id'];
		$order_data = isset($_POST['order_data']) ? $_POST['order_data'] : false;
		$express_fee = isset($_POST['express_fee']) ? $_POST['express_fee'] : false;
		$phone = isset($_POST['phone']) ? $_POST['phone'] : false;
		$tel = isset($_POST['tel']) ? $_POST['tel'] : '';
		$postcode = isset($_POST['post_code']) ? $_POST['post_code'] : '';
		$note = isset($_POST['note']) ? $_POST['note'] : '';
		$name = isset($_POST['name']) ? $_POST['name'] : false;
		$addr = isset($_POST['addr']) ? $_POST['addr'] : false;
		$custom_sn = isset($_POST['custom_sn']) ? $_POST['custom_sn'] : '';
		$oos_deal = isset($_POST['oos_deal']) ? $_POST['oos_deal'] : 1;
		$province = isset($_POST['province']) ? $_POST['province'] : false;
		$city = isset($_POST['city']) ? $_POST['city'] : false;
		$area = isset($_POST['area']) ? $_POST['area'] : false;
		$sender_mobile = isset($_POST['sender_mobile']) ? $_POST['sender_mobile'] : false;
		$sender = isset($_POST['sender']) ? $_POST['sender'] : false;
		$result = array('state' => false, 'msg' => '操作错误');
		if (!$express_fee) {
			$result['msg'] = '请选择配送方式';
			echo json_encode($result);
			exit;
		}
		if (!$user_id && !$order_data) {
			echo json_encode($result);
			exit;
		}
		foreach ($express_fee as $k => $v) {
			$express_fee['data'][] = explode('|', $v);
		}
		$express_depot = array();
		$express_code = array();
		$ex_flag = true;
	
		foreach ($express_fee['data'] as $k => $v) {
			if ($v[2] && !empty($v[2])) {
				$express_depot[$v[1]] = $v[0];
				$express_code[$v[1]] = $v[2];
			} else {
				$ex_flag = false;
			}
		}
		//print_r($express_code);print_r($express_check);exit;
		if (!$ex_flag || count($express_code) != count($order_data)) {
			$express_check_msg = array();
			foreach ($order_data as $k => $v) {
				if (!isset($express_code[$v['store_id']])) {
					$express_check_msg [] = $v['order_sn'];
				}
			}
			$express_check_msg = join(',', $express_check_msg);
			$result['msg'] = '订单' . $express_check_msg . '未选择配送方式';
			echo json_encode($result);
			exit;
		}
	
		foreach ($order_data as $k => $order) {
			foreach ($order['fee_info'] as $depot => $info) {
				if(!isset($stflag[$order['store_id']])){
					$stflag[$order['store_id']] = 0;
				}
				if (isset($express_code[$order['store_id']])&& isset($express_depot[$order['store_id']])) {
					if ($info['express_code'] == $express_code[$order['store_id']] && $info['express_fee'] == $express_depot[$order['store_id']]) {
						$stflag[$order['store_id']] = 1;
					}
				}
			}
		}
		//print_r($express_depot);print_r($express_code);print_r($stflag);print_r($order_data);die;
		if (!isset($stflag) || in_array(0, $stflag)) {
			$result['msg'] = '订单信息已篡改，请重新下单';
			echo json_encode($result);
			exit;
		}
		//print_r($_POST['express_fee']);print_r($order_data);print_r($express_code);print_r($express_depot);exit;
		$data_arr = array();
		$data_order_stock = array();
		//$user_info = $this->common_function->getUserInfo($user_id, '*');
		$flag = true;
		$error_msg = '';$time = time();$cart = array();
		//$pay_sn = $this->common_function->makePaySn($user_id);
		$sqlOrderLog = array();
		foreach ($order_data as $key => $row) {
			$data_arr[] = array(
					'order_sn'=>$row['order_sn'],'order_type'=>3,
					'order_from'=>43,'create_carriage'=>$express_depot[$row['store_id']],
					'order_status'=>10,'store_id'=>$row['store_id'],'store_name'=>$row['store_name'],
					'buyer_id'=>$user_id,'shipping_type'=>1,'order_price'=>$row['total_money']+$express_depot[$row['store_id']],
					'goods_num'=>$row['stock_num'],'goods_price'=>$row['total_money'],
					'created_time'=>$time,'buyer_message'=>$note,'receive_name'=>$name,'receive_province'=>$province,
					'receive_city'=>$city,'receive_area'=>$area,'receive_address'=>$addr,'receive_mobile'=>$phone,
					'receive_tel'=>$tel,'receive_postcode'=>$postcode,'logistics_company_name'=>$express_code[$row['store_id']],
			);
			foreach ($row['stock'] as $k => $v){
				$stock_info = $this->db->select('ge.goods_a_id,g.goods_id,g.goods_image,g.goods_name,g.gc_id,ss.goods_size_remark,ss.goods_color_remark,ss.stocks_bar_code,ss.size,ss.color')
				->from('store_stocks_amount ss')
				->join('shop_goods g','g.goods_id=ss.goods_id')
				->join('shop_goods_extend_attr ge','ge.goods_ea_id=ss.goods_ea_id')
				->where('ss.goods_ea_id',$v['goods_ea_id'])
				->where('ss.ssa_store_id',$v['store_id'])->get()->row_array();
				$order_goods['order_sn']=$row['order_sn'];
				$order_goods['goods_id']=$stock_info['goods_id'];
				$order_goods['goods_name']=$stock_info['goods_name'];
				$order_goods['goods_image']=GOODIMAGE.$stock_info['goods_image'];
				$order_goods['goods_num']=$v['amount'];
				$order_goods['goods_size']=$stock_info['size'];
				$order_goods['goods_size_remark']=$stock_info['goods_size_remark'];
				$order_goods['goods_color']=$stock_info['color'];
				$order_goods['goods_color_remark']=$stock_info['goods_color_remark'];
				$order_goods['goods_ea_id']=$v['goods_ea_id'];
				$order_goods['goods_a_id']=$stock_info['goods_a_id'];
				$order_goods['goods_price']=$v['stocks_price'];
				$order_goods['goods_pay_price']=$v['stocks_price'];
				$order_goods['user_id']=$user_id;
				$order_goods['store_id']=$v['store_id'];
				$order_goods['gc_id']=$stock_info['gc_id'];
				$order_goods['stock_code']=$v['stocks_sn'];
				$order_goods['sotck_barcode']=$stock_info['stocks_bar_code'];
				$data_order_stock[] = $order_goods;
				$cart[] = $v['cart_id'];
			}
			$sql_log = array();
			$sql_log['order_sn'] = $row['order_sn'];
			$sql_log['log_msg'] = '电商门店手工下单';
			$sql_log['log_time'] = $time;
			$sql_log['log_role'] = '导购';
			$sql_log['log_user'] = $_SESSION['shop_spg_id'];
			$sql_log['log_orderstate'] = 10;
			$sqlOrderLog[] = $sql_log;
			
		}
		if(!empty($data_arr)&&!empty($data_order_stock)){
			$this->db->trans_begin(); //开启事物
			$this->db->insert_batch('shop_order_log',$sqlOrderLog);//订单日志
			$this->db->insert_batch('shop_order',$data_arr);//订单
			$this->db->insert_batch('shop_order_goods',$data_order_stock);//订单商品
			$this->db->where_in('cart_id', $cart)->delete('shop_cart');
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$error_msg = "订单提交失败。";
				$result['msg'] = $error_msg;
			}else{
				$this->db->trans_commit();
				$result['state'] = true;$result['num']=0;$result['msg'] = '订单提交成功';
				$this->common_function->insertUserLog('手工下单', 1, 3, 'add');
			}
			
		}
		echo json_encode($result);
	    exit;
		
		//print_r($express_depot);exit();
	}
	//地区选择
	public function area_select() {
        $this->common_function->pay_role("seller_retail");//权限
		$area_id = !empty($_POST['area_id']) ? intval($_POST['area_id']) : 0;
		$regions = $this->common_function->get_area($area_id);
		echo json_encode($regions);
		exit;
	}
	//地区解析
	public function area_analyze() {
        $this->common_function->pay_role("seller_retail");//权限
		$depot = isset($_GET['depot']) ? $_GET['depot'] : false;
		$area = isset($_POST['area']) ? trim($_POST['area']) : false;
		$city = isset($_POST['city']) ? trim($_POST['city']): false;
		$province = isset($_POST['province']) ? trim($_POST['province']) : false;
		if ($area && $city && $province) {
			//print_r($_POST);exit;
			$add = $this->common_function->find_three_area_id($province, $city, $area);
			//print_r($add);exit;
			if ($add&&!empty($add[0])) {
				if(empty($add[1])){
					$city_name_like = mb_substr($city,0,2,'utf-8');
					$add[1] =
					$this->db->select('area_id')
					->from('area')
					->group_start()
					->like('area_name', $city)
					->or_where("'$city' LIKE CONCAT('%',area_name,'%')")
					->or_where(" area_name like '%$city_name_like%'")
					->or_where('area_name', $city)
					->group_end()
					->where('area_parent_id', $add[0])->get()->row('area_id');
				}
				if(empty($add[1])){
					$add[2] = '';
				}else{
					$area_name_like = mb_substr($area,0,2,'utf-8');
					$add[2] =
					$this->db->select('area_id')
					->from('area')
					->group_start()
					->like('area_name', $area)
					->or_where("'$area' LIKE CONCAT('%',area_name,'%')")
					->or_where(" area_name like '%$area_name_like%'")
					->or_where('area_name', $area)
					->group_end()
					->where('area_parent_id', $add[1])->get()->row('area_id');
				}
				$result = array('state'=>true,'province_id' => $add[0], 'city_id' => $add[1], 'area_id' => $add[2], 'data' => '');
				echo json_encode($result);
				exit;
			}
		}
	}
	//同步设置
	public function sync_setting() {
		//$this->common_function->agent_priv("order_synchronize");//权限
		$data = array('state' => false, 'msg' => '系统错误！');
		$u_ecs_id = $_SESSION['shop_spg_store_id'];
		if (isset($_GET['op']) && $_GET['op'] == 'submit') {
			$u_ec_sh_id = isset($_POST['u_ec_sh_id']) ? $_POST['u_ec_sh_id'] : false;
			if ($u_ecs_id) {
				$param = $_POST;
				$param['store_id'] = $u_ecs_id;
				                 //print_r($_POST);exit;
				$param['sync_order_interval_time'] = isset($param['sync_order_state']) && $param['sync_order_state'] == '1' ? $param['sync_order_interval_time'] : NULl;
				$param['sync_stocks_interval_time'] = isset($param['sync_stocks_state']) && $param['sync_stocks_state'] == '1' ? $param['sync_stocks_interval_time'] : NULl;
				$param['sync_amount_interval_time'] = isset($param['sync_amount_state']) && $param['sync_amount_state'] == '1' ? $param['sync_amount_interval_time'] : NULl;
				$param['order_keywords_setting'] = isset($param['is_order_keywords_filter']) && $param['is_order_keywords_filter'] == '1' ? $param['order_keywords_setting'] : NULl;
				$param['seller_filter_setting'] = isset($param['is_seller_filter']) && $param['is_seller_filter'] == '1' ? $param['seller_filter_setting'] : NULl;
				$param['seller_filter_order_type'] = isset($param['is_seller_filter']) && $param['is_seller_filter'] == '1' ? $param['seller_filter_order_type'] : NULl;
				$param['create_order_filter_setting'] = isset($param['order_create_state']) && $param['order_create_state'] == '1' ? $param['create_order_filter_setting'] : NULl;
				if ($u_ec_sh_id) {
					unset($param['u_ec_sh_id']);
					$param['sync_order_state'] = isset($param['sync_order_state']) ? $param['sync_order_state'] : NULL;
					$param['sync_stocks_state'] = isset($param['sync_stocks_state']) ? $param['sync_stocks_state'] : NULL;
					$param['sync_amount_state'] = isset($param['sync_amount_state']) ? $param['sync_amount_state'] : NULL;
					$param['order_create_state'] = isset($param['order_create_state']) ? $param['order_create_state'] : NULL;
					$param['buyyer_state'] = isset($param['buyyer_state']) ? $param['buyyer_state'] : NULL;
					$param['is_seller_note_order_note'] = isset($param['is_seller_note_order_note']) ? $param['is_seller_note_order_note'] : NULL;
					$param['is_COD_order_create'] = isset($param['is_COD_order_create']) ? $param['is_COD_order_create'] : NULL;
					$param['is_order_audit'] = isset($param['is_order_audit']) ? $param['is_order_audit'] : NULL;
					$param['is_merge'] = isset($param['is_merge']) ? $param['is_merge'] : NULL;
					$param['is_order_keywords_filter'] = isset($param['is_order_keywords_filter']) ? $param['is_order_keywords_filter'] : NULL;
					$param['is_seller_filter'] = isset($param['is_seller_filter']) ? $param['is_seller_filter'] : NULL;
	
					$result = $this->db->update('store_sync', $param, array('u_ec_sh_id' => $u_ec_sh_id));
				} else {
					//print_r($param);die;
					$result = $this->db->insert('store_sync', $param);
				}
				if ($result) {
					$data = array('state' => true, 'msg' => '操作成功');
				}
			}
		} else {
			$ecs_info = $this->db->select('*')->from('store_sync')->where('store_id', $u_ecs_id)->get()->row_array();
			$data = array('state' => true, 'msg' => '', 'ecs_info' => $ecs_info);
		}
		echo json_encode($data);
		exit;
	}
	/**
	* 同步单个订单
	*/
	public function sync_a_order(){
		//$this->common_function->agent_priv("order_synchronize");//权限
		$data = array('state'=>false,'msg'=>'操作失败');
		$out_order_sn = isset($_POST['out_order_sn']) ? $_POST['out_order_sn'] : false;
		$uec_id = $_SESSION['shop_spg_store_id'];
		//        var_dump($_POST);exit;
		if($out_order_sn && $uec_id){
			$this->load->library('store_api');
			$store_info = $this->store_api->get_store_by_id($uec_id);
			$store_info['user_id'] = $_SESSION['shop_spg_id'];
			$store_info['user_name'] = $_SESSION['shop_spg_name'];
			if(!empty($store_info)){
				if($store_info['ecs_code']==1){
					$this->load->library('jd_op');
					$this->jd_op->foo($store_info['AppKey'],$store_info['AppSecret'],$store_info['bind_token_session']);
					$data = $this->jd_op->get_a_order($out_order_sn);
				}elseif($store_info['ecs_code']==2){
					$this->load->library('taobao_op');
					$this->taobao_op->init($store_info['AppKey'],$store_info['AppSecret'],$store_info['bind_token_session']);
					$info = $this->taobao_op->get_orders_by_tid($out_order_sn);
					//print_r($info);exit;
					if($info['state']&&!empty($info['order_info'])){
						$data['state'] = $info['state'];
						$data['order_info'][] = $info['order_info'];
					}else{
						$data['msg'] = object_array($info['msg'])[0];
					}
				}
				//print_r($data);die;
				if($data['state']&&!empty($data['order_info'])){
	
					$flag = $this->store_api->inner_orders_sync($data['order_info'],$store_info,$_SESSION['shop_spg_id']);
					//print_r($flag);exit;
					if($flag){
						$data = array('state'=>true,'msg'=>'操作成功');
                        //$tt = $this->common_function->send_goods_remind($order_sn,$tel,$name);
					}else{
						$data = array('state'=>false,'msg'=>'操作失败');
					}
				}
			}
		}
		echo json_encode($data);
	}
	//手动同步订单
	public function sync_order_by_hand(){
	
		//$this->common_function->agent_priv("order_synchronize");//权限		
		set_time_limit(0);
		$data = array('state'=>false,'msg'=>'操作失败！');
		$stime = isset($_POST['stime']) ? strtotime($_POST['stime']) : time()-86400;
		$etime = isset($_POST['etime']) ? strtotime($_POST['etime']) : time();
		$store = $_SESSION['shop_spg_store_id'];
		if($store){
			$this->load->library('store_api');
			$store_info = $this->store_api->get_store_by_id($store);

			if(!empty($store_info)){
				if($store_info['ecs_code']==1){
					$this->load->library('jd_op');
					$this->jd_op->foo($store_info['AppKey'],$store_info['AppSecret'],$store_info['bind_token_session']);
					$stime = date('Y-m-d H:i:s',$stime);
					$etime = date('Y-m-d H:i:s',$etime);
					$data = $this->jd_op->get_orders($stime,$etime);
				}elseif($store_info['ecs_code']==2){
					$this->load->library('taobao_op');
					$this->taobao_op->init($store_info['AppKey'],$store_info['AppSecret'],$store_info['bind_token_session']);
					$data = $this->taobao_op->get_create_orders($stime,$etime);
				}
				//print_r($data);die;
				
				if($data['state']&&!empty($data['orders'])){
					$flag = $this->store_api->inner_orders_sync($data['orders'],$store_info,$_SESSION['shop_spg_id']);
					if($flag){
						$data = array('state'=>true,'msg'=>'操作成功');
					}
				}
			}
		}else{
			$data = array('state'=>false,'msg'=>'非法参数！');
		}
		echo json_encode($data);
	}
	//网店订单管理，电商店才有
	public function store_order(){
        $this->common_function->pay_role("seller_ecorder_synchronize");//权限
        $stores_on = array();
		$defaultImg = $this->common_function->get_system_value('default_goods_image');
        //物流信息
        $this->db->select('id,e_code,e_name');
        $this->db->from('express');
        $this->db->where('e_state=1');
        $db=clone($this->db);
        $express=$this->db->get()->result_array();
        $this->smarty->assign('express',$express);
        $this->db=$db;
		$bind_ecstore_name = $this->db->select('bind_ecstore_name')->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row('bind_ecstore_name');
		$this->smarty->assign('defaultImg',$defaultImg);
		$this->smarty->assign('stores_on',$stores_on);
		$this->smarty->assign('bind_ecstore_name',$bind_ecstore_name);
		$this->smarty->assign('userId',$_SESSION['shop_spg_store_id']);
		//退货原因
		$this->db->select('reason_id,reason_info');
		$this->db->from('shop_order_refund_reason');
		$this->db->order_by('reason_id','ASC');
		$refund_reason  = $this->db->get()->result_array();
		if(empty($refund_reason)){
		    $refund_reason =array(0=>array('reason_id'=>1,'reason_info'=>'不喜欢啦'));
		}
		$refund_reason = $this->product_reason_array_to_option($refund_reason);
		$defaultImg = $this->common_function->get_system_value('default_goods_image');
		$this->smarty->assign('defaultImg',$defaultImg);
		$this->smarty->assign('refundreason',json_encode($refund_reason));
	    $this->smarty->display('order_step.html');
		
	}
	
	
	//申请售后提交
	public function post_apply(){
	    $result =array('state'=>false,'msg'=>'售后申请提交失败,请稍后再试！');
	   $op= isset($_GET['op']) ?$_GET['op']:"";//print_r($_POST);print_r($_FILES);die;
	   if(empty($op)){
	       echo json_encode($result);exit;
	   }
	   $refund_id = isset($_POST['refund_id'])?$_POST['refund_id']:'';
	   $refund_seller = isset($_POST['seller_state'])?$_POST['seller_state']:'';
	   $refund_state = isset($_POST['refund_state'])?$_POST['refund_state']:'';
	   if($op=="cancel"&&$refund_id){
	   	   $this->db->update('shop_order_refund_return',array('refund_state'=>4),array('refund_id'=>$refund_id));
	   	   $result =array('state'=>true,'msg'=>'售后已取消！');
	   	   echo json_encode($result);exit;
	   }
	    if(isset($_POST['order_sn']) && !empty($_POST['order_sn'])){
	        $order_goods_id = isset($_POST['rec_id'])?$_POST['rec_id']:'';
	        if(isset($_POST['reason_id']) && !empty($_POST['reason_id'])){
	            $reason_info = $this->db->select('reason_info')->where('reason_id',$_POST['reason_id'])->get('shop_order_refund_reason')->row("reason_info");
	        }else{
	            $reason_info = "";
	        }
	        
	        $order_info = $this->db->select('a.*,b.rec_id,b.goods_id,b.goods_name,b.goods_image,b.goods_num,b.goods_a_id,b.goods_ea_id,b.goods_color,b.goods_color_remark,b.goods_size,b.goods_size_remark,
		 b.goods_price,b.goods_pay_price,b.gc_id,b.stock_code,b.sotck_barcode,b.uec_num_iid,b.uec_skuiid_iid,b.uec_stock_price,b.express_sn,b.uec_express,b.shipping_status')
	        		 ->from('shop_order as a')
	        		 ->join('shop_order_goods as b','b.order_sn=a.order_sn')
	        		 ->where('a.order_sn',$_POST['order_sn'])
	        		 ->where('b.rec_id',$order_goods_id)
	        		 ->get()->row_array();
	        
	        if($order_info['order_type']==3){
	            $buyer_name = $this->db->select('store_name')->where('store_id',$order_info['buyer_id'])->get('store')->row("store_name");
	        }else{
	            $buyer_name = $this->db->select('user_name')->where('user_id',$order_info['buyer_id'])->get('user')->row("user_name");
	        }
	        
	        if(empty($buyer_name) || $buyer_name==null){
	            $buyer_name = '';
	        }
	        
	        if(isset($_SESSION['file_name']) && !empty($_SESSION['file_name'])){
	            $pic_info = serialize($_SESSION['file_name']);
	        }else{
	            $pic_info ="";
	        }
	
	
	        $inner = array(
	            'order_sn' => trim($_POST['order_sn']),
	            'pay_sn' => $order_info['pay_sn'],
	            'store_id' => $order_info['store_id'],
	            'store_name' => $order_info['store_name'],
	            'buyer_id' => $order_info['buyer_id'],
	            'buyer_name' => isset($_POST['refund_contact'])?$_POST['refund_contact']:'',
	            'refund_amount_apply'=> (isset($_POST['refund_amount_apply']) && !empty($_POST['refund_amount_apply']))?trim($_POST['refund_amount_apply']):0,
	            'refund_type' => empty($_POST['refund_num_apply'])?1:2,
	            'refund_tel'=>isset($_POST['refund_tel'])?$_POST['refund_tel']:'',
	            'add_time' => time(),
	            'reason_id' => (isset($_POST['reason_id']) && !empty($_POST['reason_id']))?trim($_POST['reason_id']):0,
	            'reason_info' => trim($reason_info),
	            'pic_info' => $pic_info,
	        	'refund_address'=>isset($_POST['refund_address'])?$_POST['refund_address']:'',
	            'buyer_message'=> (isset($_POST['buyer_message']) && !empty($_POST['buyer_message']))?trim($_POST['buyer_message']):"",
	        		'express_id'=>isset($_POST['express_id'])?$_POST['express_id']:'',
	        		'invoice_no'=>isset($_POST['invoice_no'])?$_POST['invoice_no']:'',
	        );
	        $counpon_amount_arr=array("refund"=>$inner['refund_amount_apply']);
	        if(isset($_POST['type_way']) && $_POST['type_way']==1){//整单退
	                $inner['goods_id'] = 0;
	                $inner['order_goods_id'] = 0;
	                $inner['goods_ea_id']=0;
	                $inner['goods_name'] = '';
	                $inner['goods_num'] = 0;
	                $inner['goods_image'] = '';
	                $counpon_amount_arr['refund_state']=2;
	        }else{
	                $inner['goods_id'] = trim($_POST['goods_id']);
	                $inner['order_goods_id'] = trim($order_goods_id);
	                $inner['goods_ea_id']=$order_info['goods_ea_id'];
	                $inner['goods_name'] = $_POST['goods_name'];
	                $inner['goods_num'] = trim($_POST['goods_num']);
	                $inner['goods_image'] = $order_info['goods_image'];
	                $counpon_amount_arr['refund_state']=1;
	        }
	        $log_arr=array(
	            'note'=>$inner['buyer_message'],
	            'pic_info'=>$inner['pic_info'],
	            'reason_info' => $inner['reason_info']
	        );
	        
	     
	        
	        $log_arr = json_encode($log_arr);
	        $this->db->trans_off(); //禁用事务
	        $this->db->trans_start(); //开启事务
	        if($refund_id){
	        	if($refund_state==4||$refund_seller==3){
	        		$res = $this->db->insert('shop_order_refund_return',$inner);
	        		$refund_id = $this->db->insert_id();
	        	}else{
	        		$res = $this->db->update('shop_order_refund_return',$inner,array('refund_id'=>$refund_id));
	        	}
	        	
	        }else{
	        	$res = $this->db->insert('shop_order_refund_return',$inner);
	        	$refund_id = $this->db->insert_id();
	        }
	        //print_r($refund_id);die;
	        $arrs = array('return_id'=>$refund_id,'add_time'=>time(),'guide_id'=>$order_info['buyer_id'],'content'=>$log_arr,'action_type'=>2,'type'=>1);
	        if($op=='w'){
	            $arrs['action_type']==1;
	        }
	        //$order_goods = array('is_refund'=>1);
	        //$this->db->where('order_sn',trim($_POST['order_sn']));//更新订单表退货状态
	        //$this->db->update('shop_order', $counpon_amount_arr);
	        /* if(isset($_POST['type_way']) && $_POST['type_way']==1){
	        	$this->db->update('shop_order_goods', $order_goods,array('order_sn'=>$_POST['order_sn']));
	        }else{
	        	$this->db->update('shop_order_goods', $order_goods,array('rec_id'=>$order_goods_id));
	        } */
	        
	        $this->db->insert('shop_order_return_log',array('return_id'=>$refund_id,'add_time'=>time(),'guide_id'=>$_SESSION['shop_spg_id'],'content'=>$log_arr,'action_type'=>1,'type'=>1));
	        $this->db->trans_complete(); //事务完成
	        $this->db->trans_off(); //禁用事务
	        if($res){
	            $result ['state'] = true;
	            $result ['msg'] = "售后申请提交成功，请等待审核！";
	            $result ['data'] = $pic_info;
	            $result ['refund_id'] = $refund_id;
	            //发送推送消息
	            $payload=array('tag'=>'orderReturnMsg','returnId'=>$refund_id,'userName'=>$buyer_name,'reason'=>$reason_info);
	            $title='售后申请通知';
	            $content="会员".$buyer_name."申请了订单售后";
	            $res= $this->common_function->pushMsg($title,$content,$payload,$_POST['order_sn']);//发送推送消息
	        }
	    }
	    if(isset($_SESSION['file_name'])){
	        unset($_SESSION['file_name']);
	    }
	    echo json_encode($result);exit;
	
	}
	//售后处理
	public function post_apply_deal(){
		$result =array('state'=>false,'msg'=>'售后处理失败,请稍后再试！');
		$op= isset($_GET['op']) ?$_GET['op']:"";//print_r($_POST);print_r($_FILES);die;
		if(empty($op)){
			echo json_encode($result);exit;
		}
		$order_sn = isset($_POST['order_sn'])?$_POST['order_sn']:'';
		$refund_id = isset($_POST['refund_id'])?$_POST['refund_id']:'';
		$rec_id = isset($_POST['rec_id'])?$_POST['rec_id']:'';
		$refund_seller = isset($_POST['seller_state'])?$_POST['seller_state']:'';
		$refund_state = isset($_POST['refund_state'])?$_POST['refund_state']:'';
		$pwd = isset($_POST['pwd'])?$_POST['pwd']:'';
		$note = isset($_POST['buyer_message'])?$_POST['buyer_message']:'';
		$refund_amount = isset($_POST['refund_amount'])?$_POST['refund_amount']:'';
		if($op=="cancel"&&$refund_id){
			$this->db->update('shop_order_refund_return',array('seller_state'=>3),array('refund_id'=>$refund_id));
			$result =array('state'=>true,'msg'=>'操作成功！');
			echo json_encode($result);exit;
		}
		$user_id = $_SESSION['shop_spg_store_id'];
		if($refund_id&&$user_id&&$rec_id){
			$rerund_info = $this->db->select('order_goods_id,goods_num')->where('refund_id',$refund_id)->get('shop_order_refund_return')->row_array();
			$order_info = $this->db->select('o.order_from,o.pay_sn,o.order_type,o.buyer_id,o.refund,g.shipping_status,g.goods_num,o.rebate_amount')
			->from('shop_order o')->join('shop_order_goods g','g.order_sn=o.order_sn')
			->where('g.order_sn',$order_sn)->where('g.rec_id',$rec_id)->get()->row_array();
			if($order_info['order_type']==3){
				$user_info = $this->db->select('store_name,balance,paypwd')->where('store_id',$order_info['buyer_id'])->get('store')->row_array();
			}else{
				$user_info = $this->db->select('user_name,balance,paypwd')->where('user_id',$order_info['buyer_id'])->get('store')->row_array();
			}
			
			if(encrypt_pwd($pwd)!=$user_info['paypwd']){
				//print_r(encrypt_pwd($pwd));
				$result['msg'] = '密码不正确！';
				$result['state'] = false;
				echo json_encode($result);exit;
			}
			$time = time();
			$this->db->trans_begin(); //开启事物
			if($order_info['shipping_status']==1){
				$sql_user_balance = array('balance'=>$user_info['balance']+$refund_amount);
				$this->db->update('store',$sql_user_balance,array('store_id'=>$user_id));
				if($order_info['order_type']==3){
					/* if(in_array($order_info['order_from'],array(44,45,46))){
						$refund_amount_store = $refund_amount-$order_info['rebate_amount'];
					} */
					$log_note = "订单退款".$refund_amount;
					$sql_asset_log = array('store_id'=>$user_info['balance'],'pay_sn'=>$order_info['pay_sn'],'log_type'=>4,'asset_out'=>0,'asset_in'=>$refund_amount,'asset'=>$user_info['balance']+$refund_amount,'note'=>$log_note,'time'=>$time);
					$this->db->insert('store_asset_log',$sql_asset_log);
				}else{
					$log_note = "订单退款".$refund_amount;
					$sql_asset_log = array('user_id'=>$user_info['balance'],'pay_sn'=>$order_info['pay_sn'],'log_type'=>4,'asset_out'=>0,'asset_in'=>$refund_amount,'asset'=>$user_info['balance']+$refund_amount,'note'=>$log_note,'time'=>$time);
					$this->db->insert('user_asset_log',$sql_asset_log);
				}
				$store_info = $this->db->select('store_name,balance,paypwd')->where('store_id',$user_id)->get('store')->row_array();
				$log_note_p = "订单退款".$refund_amount;
				$sql_plat_log = array('store_id'=>$user_info['balance'],'pay_sn'=>$order_info['pay_sn'],'log_type'=>4,'asset_out'=>$refund_amount,'asset_in'=>0,'asset'=>$store_info['balance']-$refund_amount,'note'=>$log_note,'time'=>$time);
				$this->db->insert('store_asset_log',$sql_plat_log);
			}
			
			/* if($order_info['shipping_status']==1){
				
			}else{
				$plat_asset = $this->db->select('asset')->order_by('paa_id','DESC')->limit(1)->get('sys_asset_account')->row('asset');
				$plat_asset = empty($plat_asset)?0:$plat_asset;
				$log_note_p = "订单退款".$refund_amount;
				$sql_plat_log = array('user_id'=>$user_id,'user_type'=>1,'pay_sn'=>$order_info['pay_sn'],'order_sn'=>$order_sn,'log_type'=>3,'asset_out'=>$refund_amount,'asset_in'=>0,'asset'=>$plat_asset-$refund_amount,'note'=>$log_note_p,'time'=>$time);
				$this->db->insert('sys_asset_account',$sql_plat_log);
			} */
			$order_info['refund'] = empty($order_info['refund'])?0:$order_info['refund'];
			//$this->db->update('shop_order',array('refund_state'=>1,'refund'=>$order_info['refund']+$refund_amount),array('order_sn'=>$order_sn));
			$this->db->update('shop_order_goods',array('is_refund'=>1),array('rec_id'=>$rec_id));
			$this->db->update('shop_order_refund_return',array('seller_state'=>2,'refund_amount'=>$refund_amount,'seller_time'=>$time,'seller_message'=>$note),array('refund_id'=>$refund_id));
			

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$result =array('state'=>false,'msg'=>'退款失败！');
			}else{
				$this->db->trans_commit();
				$result =array('state'=>true,'msg'=>'退款成功！');
				$this->common_function->insertUserLog('订单退款', 1, 3, 'add');
			}
			
			
			
		}
		echo json_encode($result);exit;
	}
	
	
	
	
	//删除上传图片
	public function del_set_onload(){
	    $result =array('state'=>false,'msg'=>'');
	    if(isset($_GET['url']) && !empty($_GET['url'])){
	        $url = $_GET['url'];
	        @unlink(ROOTPATH.'./application/pay/views/images/'.$url);
	        foreach ($_SESSION['file_name'] as $key=>$val){
	            if($val==$url){
	                unset($_SESSION['file_name'][$key]);
	            }
	        }
	        $result ['state'] = true;
	    }
	    echo json_encode($result);exit();
	     
	}
	
	
	//申请售后上传图片
	public function apply_set_onload(){
	    
	    $savePath = './data/shop/refund_pic/'; // 设置上传路径
	    if (!file_exists($savePath) || !is_writable($savePath)) {
	        @mkdir($savePath, 0755);
	    }
	    if(!empty($_FILES['pic_info']) &&  !empty($_FILES['pic_info']['name']) && $_FILES['pic_info']['error']==0){
	        $tmp_size = $_FILES['pic_info']['size'];
	        if($tmp_size > 1024*1024*3){
	            $return = array(
	                'state'=>false,
	                'msg'=>"图片文件大于3M，请重新上传"
	            );
	            echo json_encode($return);
	            exit();
	        }
	        $tmp_file = $_FILES['pic_info']['tmp_name'];
	        $file_types = explode ( ".", $_FILES['pic_info']['name'] );
	        $file_type = $file_types [count ( $file_types ) - 1];
	        if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
	            $return = array(
	                'state'=>false,
	                'msg'=>"不是图片文件，请重新上传"
	            );
	            echo json_encode($return);
	            exit();
	        }
	         
	        $str = date ( 'YmdHis' ) . uniqid ()."_apply"; // 以时间来命名上传的文件
	        $file_name = $str . "." . $file_type; // 是否上传成功
	        if (! copy( $tmp_file, $savePath . $file_name )) {
	            $return = array(
	                'state'=>false,
	                'msg'=>"图片上传失败，请稍后重新上传"
	            );
	            echo json_encode($return);
	            exit();
	        }else{
	             
	            if(!isset($_SESSION['file_name']) || empty($_SESSION['file_name'])){
	                $this->session->set_userdata(array('file_name'=>array(0=>$file_name)));
	            }else{
	                $data = $_SESSION['file_name'];
	                $num = count($_SESSION['file_name']);
	                $data = array_merge(array($num=>$file_name),$data);
	                $this->session->set_userdata(array('file_name'=>$data));
	            }
	             
	            $return = array(
	                'state'=>true,
	                'msg'=> $file_name,
	            );
	            echo json_encode($return);exit();
	        }
	         
	    }
	     
	     
	}
	
	
	
	
	public function product_reason_array_to_option($array, $cate_id = 0, $str = '') {
	    // 	    var_dump($cate_id);exit;
	    if (!is_array($array)) {
	        return false;
	    }
	    foreach ($array as $key => $val) {
	        $str .= "<option value='" . $val['reason_id'] . "' ";
	        if ($val['reason_id'] == $cate_id) {
	            $str .= "selected";
	        }
	        $str .= ">" . $val['reason_info'] . "</option>";
	    }
	
	    return $str;
	}
	
	
	
	
	public function order_sync_list(){
		//print_r($_POST);die;
        $this->common_function->pay_role("seller_ecorder_synchronize");//权限
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
		$page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
		$this->db->from('shop_order as a');
		$this->db->join('shop_order_goods as b','b.order_sn=a.order_sn');
		$this->db->join('store as c','c.store_id=a.store_id','left');
		$this->db->join('express as e','e.e_code=a.create_express','left');
		$this->db->join('express as ee','ee.e_code=a.logistics_company_name','left');
		$this->db->where('a.buyer_id',$_SESSION['shop_spg_store_id']);
		if(isset($_POST)) {
            if (isset($_POST['user_tel']) && !empty($_POST['user_tel'])) {
                $this->db->group_start ();
                $this->db->like ('a.receive_mobile', trim ($_POST['user_tel']));
                $this->db->or_like ('a.receive_tel', trim ($_POST['user_tel']));
                $this->db->group_end ();
            }
            if (isset($_POST['shop_order_sn']) && !empty($_POST['shop_order_sn'])) {
                $this->db->like ('a.out_order_sn', trim ($_POST['shop_order_sn']));
            }
            if (isset($_POST['pay_sn']) && !empty($_POST['pay_sn'])) {
                $this->db->like ('a.pay_sn', trim ($_POST['pay_sn']));
            }
            if (isset($_POST['waybill_sn']) && !empty($_POST['waybill_sn'])) {
                $this->db->like ('a.waybill_sn', trim ($_POST['waybill_sn']));
            }
            if (isset($_POST['user_name']) && !empty($_POST['user_name'])) {
                $this->db->like ('a.receive_name', trim ($_POST['user_name']));
            }
            if (isset($_POST['express_type']) && ($_POST['express_type'] != '')) {
                $this->db->group_start();
                $this->db->where ('a.create_express', $_POST['express_type']);
                $this->db->or_where ('a.logistics_company_name', $_POST['express_type']);
                $this->db->group_end();
            }
            if (isset($_POST['order_sn']) && !empty($_POST['order_sn'])) {
                $this->db->like ('a.order_sn', trim ($_POST['order_sn']));
            }
            if (isset($_POST['goods_name']) && !empty($_POST['goods_name'])) {
                $this->db->like ('b.goods_name', trim ($_POST['goods_name']));
            }
            if (isset($_POST['stocks_sn']) && !empty($_POST['stocks_sn'])) {
                $this->db->like ('b.stock_code', trim ($_POST['stocks_sn']));
            }
            if (isset($_POST['express_sn']) && !empty($_POST['express_sn'])) {
                $this->db->like ('b.express_sn', trim ($_POST['express_sn']));
            }
            if (isset($_POST['store_name']) && !empty($_POST['store_name'])) {
                $this->db->like ('a.store_name', trim ($_POST['store_name']));
            }
            if (isset($_POST['order_type']) && ($_POST['order_type'] != '')) {
                $this->db->where ('a.order_status', $_POST['order_type']);
            }
            if (isset($_POST['stime']) && !empty($_POST['stime'])) {
                $this->db->where ('a.created_time>= ', strtotime ($_POST['stime']));
            }
            if (isset($_POST['etime']) && !empty($_POST['etime'])) {
                $this->db->where ('a.created_time <= ', strtotime ($_POST['etime']));
            }
        }
		$this->db->group_by('a.order_sn');
		$db = clone($this->db);
		$this->db->select('a.order_sn');
		$total = count($this->db->get()->result_array());
		$this->db=$db;
		$page_count = ceil($total/$rp);
		$this->db->select('a.*,e.e_name as create_e_name,ee.e_name,c.short_store_name');
		$this->db->order_by('a.created_time,a.uec_order_time','DESC');
		$start = $rp * ($page - 1);
		$this->db->limit($rp,$start);
		$orders = $this->db->get()->result_array();
		$order_from = $this->order_model->order_from();
		$order_status = $this->order_model->order_status_admin();
		foreach ($orders as $key=>$order){
			$orders[$key]['uec_order_status'] = isset($order_status[$order['uec_order_status']])?$order_status[$order['uec_order_status']]:$order_status[$order['order_status']];
			$orders[$key]['from'] = isset($order_from[$order['order_from']])?$order_from[$order['order_from']]:''; 
			$orders[$key]['created'] = date('Y-m-d H:i:s',$order['created_time']);
			$orders[$key]['uec_order_time'] = empty($order['uec_order_time'])?$orders[$key]['created']:date('Y-m-d H:i:s',$order['uec_order_time']);
			$order_goods = $this->db->select('b.rec_id,b.goods_id,b.goods_name,b.goods_image,b.goods_num,b.goods_a_id,b.goods_ea_id,b.goods_color,b.goods_color_remark,
			b.goods_size,b.goods_size_remark,b.uec_goods_name,b.uec_goods_size,b.uec_goods_color,b.uec_goods_image,b.is_refund,
		    b.goods_price,b.goods_pay_price,b.gc_id,b.stock_code,b.sotck_barcode,b.uec_num_iid,b.uec_skuiid_iid,b.uec_stock_price,b.express_sn,b.uec_express,
			b.shipping_status')
			->from('shop_order_goods b')
			->where('b.order_sn',$order['order_sn'])
			->get()->result_array();
			foreach ($order_goods as $k=>$v){
				$goods_refund = $this->db->select('r.refund_state,r.seller_state,r.refund_type,r.order_goods_id,r.refund_id,r.reason_id,r.refund_amount_apply,r.refund_amount,r.goods_num as refund_num,
			    r.reason_info,r.pic_info,r.buyer_message as refund_message,r.refund_address,r.refund_tel,r.buyer_name as refund_buyer_name,r.express_id,r.invoice_no,r.add_time,r.seller_time')
			    ->from('shop_order_refund_return r')->where('r.order_sn',$order['order_sn'])
			    ->where("((r.order_goods_id='{$v['rec_id']}') or (r.order_goods_id=0))")->order_by('r.refund_id','DESC')->get()->row_array();
				if(!empty($goods_refund)){
					foreach ($goods_refund as $kr=>$vr){
						$order_goods[$k][$kr] = $vr;
					}
				}else{
					$order_goods[$k]['refund_state'] = $order_goods[$k]['seller_state'] = $order_goods[$k]['refund_type'] =$order_goods[$k]['order_goods_id'] =
					$order_goods[$k]['refund_id'] =$order_goods[$k]['reason_id'] =$order_goods[$k]['refund_amount_apply'] =$order_goods[$k]['refund_amount'] =
					$order_goods[$k]['refund_num'] =$order_goods[$k]['reason_info'] =$order_goods[$k]['pic_info'] =$order_goods[$k]['refund_message'] =
					$order_goods[$k]['refund_address'] =$order_goods[$k]['refund_tel'] =$order_goods[$k]['refund_buyer_name'] =$order_goods[$k]['express_id'] =
					$order_goods[$k]['express_id'] =$order_goods[$k]['invoice_no'] =$order_goods[$k]['add_time'] =$order_goods[$k]['seller_time'] ='';
				}
				
			}
			$orders[$key]['son'] = $order_goods;
			//print_r($this->db->last_query());die;
		}
		$order_info = $orders ? $orders : 0;
		$page_info = array('total_num'=>$total, 'page_count'=>$page_count, 'page'=>$page, 'rp'=>$rp, 'start'=>$start+1, 'to'=>$start+count($orders));
		if ($order_info){
			echo json_encode(array('state'=>true,'goods_info'=>$order_info,'page_info'=>$page_info));
		}else{
			echo json_encode(array('state'=>false));
		}
	}
	public function get_store_address(){
		//print_r($_POST);die;
		$result = array('state'=>false,'data'=>'','msg'=>'操作错误');
		$order_sn = isset($_POST['order_sn'])?trim($_POST['order_sn']):'';
		if($order_sn){
			$store_id = $this->db->select('store_id')->where('order_sn',$order_sn)->get('shop_order')->row('store_id');
			if(!empty($store_id)){
				$address_rows = $this->db->select('u.a_id,u.user_id,u.is_default,u.postcode,u.user_name,u.province,u.city,u.area,u.address,
	            u.tel,u.tel2,a.area_name as province_name,b.area_name as city_name,c.area_name as area_name')
	            ->from('store_address u')
	            ->join('area a','a.area_id=u.province','left')
	            ->join('area b','b.area_id=u.city','left')
	            ->join('area c','c.area_id=u.area','left')
	            ->where('user_id',$store_id)
	            ->order_by('is_default','DESC')->get()->row_array();
				if(empty($address_rows)){
					$result = array('state'=>false,'data'=>'','msg'=>'');
				}else{
					$result = array('state'=>true,'data'=>$address_rows,'msg'=>'');
				}
			}
		}
		echo json_encode($result);exit;
	}
	public function modify_order_depot(){
		$this->common_function->pay_role("seller_ecorder_create");//权限
		$result = array('state'=>false,'data'=>'','msg'=>'操作错误');
		$goods_ea_id = isset($_POST['goods_ea_id'])?trim($_POST['goods_ea_id']):'';
		$store_id = $_SESSION['shop_spg_store_id'];
		if(empty($store_id)){
			echo json_encode($result);exit;
		}
		$store = $this->db->select('sa.auth_store_id,sa.auth_store_name,s.short_store_name')->from('store_auth_store sa')
		->join('store s','s.store_id=sa.auth_store_id')
		->where('sa.store_id',$store_id)->group_by('s.store_id')->get()->result_array();
		$store_info = $this->db->select('store_name,short_store_name')->where('store_id',$store_id)->get('store')->row_array();
		$store[] = array('auth_store_id'=>$store_id,'auth_store_name'=>$store_info['store_name'],'short_store_name'=>$store_info['short_store_name']);
		$result = array('state'=>true,'data'=>$store,'msg'=>'');
		echo json_encode($result);exit;
	}
	
	public function get_goods_class(){
		$cate_arr = $this->common_function->get_cate_by_parent_id();
		$cate_option = $this->common_function->cate_array_to_option($cate_arr); //分类选项
		echo($cate_option);exit;
	}
	public function change_goods_search(){
		//print_r($_POST);die;
		$result = array('state'=>false,'data'=>'','msg'=>'操作错误');
		$gc_id = isset($_POST['change_goods_gc_id'])?trim($_POST['change_goods_gc_id']):'';
		if($gc_id) {
            $this->db->select ('sg.gc_id');
            $this->db->from ('shop_goods_class sg');
            $this->db->where ('gc_parent_id', $gc_id);
            $is_parent = $this->db->get ()->result_array ();
            if(!empty($is_parent)){
                $gc_id=array();
                foreach($is_parent as $key=>$v){
                    $gc_id[$key]=$v['gc_id'];
                }
            }
            else{
                $gc_id['0']=$gc_id;
            }
        }


		$stocks_sn = isset($_POST['change_stocks_sn'])?trim($_POST['change_stocks_sn']):'';
		$auth_store_id = isset($_POST['store'])?intval($_POST['store']):'';
		$store_id = $_SESSION['shop_spg_store_id'];
		$page = !empty($_POST['page'])?trim($_POST['page']):1;
		$total_page = isset($_POST['total_page']) ? trim($_POST['total_page']) : '';
		$rp = 4;
		$start = $rp*($page-1);
		$this->db->from('shop_goods_extend_attr ge')
		->join('shop_goods g','g.goods_id=ge.goods_id')
		->join('shop_goods_class c','c.gc_id=g.gc_id','left');
		if($gc_id){
			$this->db->where_in('g.gc_id',$gc_id);
		}
		if($stocks_sn){
			$this->db->group_start();
			$this->db->like('g.goods_spu', $stocks_sn);
			$this->db->or_group_start();
			$this->db->like('ge.stocks_sku', $stocks_sn);
			$this->db->group_end();
			$this->db->group_end();
		}
		//$this->db->where("ge.size!='' and ge.size is not null ");
		if($auth_store_id==$store_id){
			$this->db->join('store_stocks_amount ssa','ge.goods_ea_id=ssa.goods_ea_id and ssa.ssa_store_id='.$store_id,'left');
		}
		$this->db->where('g.goods_state',1);
		$this->db->group_start();
		$this->db->where('g.goods_pos', 0);
		$this->db->where('ge.stocks_sku is not null');
		$this->db->where('ge.size is not null');
		$this->db->or_group_start();
		if($auth_store_id==$store_id){
			
			$this->db->where('ssa.ssa_store_id', $store_id);
			$this->db->group_end();
			$this->db->or_group_start();
		}
		$this->db->where('g.goods_pos', $auth_store_id);
		$this->db->group_end();
		$this->db->group_end();
		$db = clone($this->db);
		$db1 = clone($this->db);
//		$total = $this->db->select('count(1) as num')->group_by('ge.goods_a_id')->get()->row('num');//返回查询结果的第一行(2,2,2,2,2,3,3)(1,1,1,1,1,1,1)
        $total=count($this->db->select('ge.goods_ea_id')->group_by('ge.goods_a_id')->get()->result_array());

		$this->db = $db;
		$this->db->select('ge.goods_a_id');
		$limit_rows = $this->db->group_by('ge.goods_a_id')->limit($rp,$start)->get()->result_array();//查询以颜色id为分组的数据(236,237,240,241)(14569~14572)
		$limit_id = array();

		foreach ($limit_rows as $k=>$v){
			$limit_id[] = $v['goods_a_id'];//将得到数据的颜色的id保存起来
		}
        //print_r($this->db->last_query());

		$this->db = $db1;
		if(!empty($limit_id)){
			$this->db->where_in('goods_a_id',$limit_id);
		}else{
			$this->db->where('1=2');
		}
		$rows = $this->db->select('ge.*,g.goods_pos,g.goods_name,g.brand_id,g.brand_name,g.gc_id,g.gc_name,g.goods_image,g.goods_spu,g.weight,g.season_to_market,g.year_to_market,g.sex,c.weight as c_weight')
		->get()->result_array();
        //print_r($rows);
		$total_page = ceil($total/$rp);
		//$rows = $this->db->group_by('ge.goods_a_id')->limit($rp,$start)->get()->result_array();
		//print_r($limit_rows);print_r($total);die;
		
		//print_r($this->db->last_query());die;
		$goods_sku = array();
		$sexs = array(2 => '男', 1 => '女', 0 => '中性');
        $season = array(1 => 'Q1', 2 => 'Q2', 3 => 'Q3',4=>'Q4');
		foreach ($rows as $k=>$v){
			if(!empty($v['brand_id'])){//判断商品品牌，0为仓库
				$check_brand = 0;
				if($auth_store_id == $store_id){
					$check_brand = true;
				}else{
					if($v['goods_pos']==0){//判断商品是自建商品还在总库商品，0为总库商品
						//					$check_brand = $this->db->select('count(1) as num')->from('store_auth_store a')
						//					->join('store_attr_brands b','b.store_id=a.auth_store_id and b.brand_id=a.brand_id')
						//					->where('a.store_id',$store_id)->where('a.auth_store_id',$auth_store_id)
						//					->where('a.brand_id',$v['brand_id'])->get()->row('num');
						$check_brand=count($this->db->select('a.store_id')->from('store_auth_store a')->join('store_attr_brands b','b.store_id=a.auth_store_id and b.brand_id=a.brand_id')
								->where('a.store_id',$store_id)->where('a.auth_store_id',$auth_store_id)
								->where('a.brand_id',$v['brand_id'])->get()->result_array());//查询该店包括的品牌数量
								//					print_r($this->db->last_query());die;
									
					}else{
						$check_brand = $this->db->select('count(1) as num')->from('store_auth_store a')
						->where('a.store_id',$store_id)->where('a.auth_store_id',$auth_store_id)
						->where('a.brand_id',$v['brand_id'])->get()->row('num');
					}
				}
				if(!empty($check_brand)){
						$sku_img = $this->db->select('goods_image')->where('color_id',$v['goods_a_id'])->order_by('is_default DESC,goods_image_sort ASC')->get('shop_goods_images')->row('goods_image');
						if(!empty($sku_img)){
							$v['goods_image'] = img_http($sku_img);
						}else{
							$v['goods_image'] = img_http($v['goods_image']);
						}
						$v['weight'] = ($v['weight']>0)?$v['weight']:$v['c_weight'];
						$v['sex'] = isset($sexs[$v['sex']])?$sexs[$v['sex']]:'';
						$v['time_market'] = isset($season[$v['season_to_market']])?$v['year_to_market'].$season[$v['season_to_market']]:$v['year_to_market'].'';
						$stock_info = $v;
						$amount_info = $this->db->select('amount,stocks_price')->where('ssa_store_id',$auth_store_id)->where('goods_ea_id',$v['goods_ea_id'])
						->get('store_stocks_amount')->row_array();
						$stock_info['amount'] = empty($amount_info['amount'])?0:$amount_info['amount'];
						$stock_info['stocks_price'] = empty($amount_info['stocks_price'])?$v['stocks_price']:$amount_info['stocks_price'];
						$v['stocks_price'] = empty($amount_info['stocks_price'])?$v['stocks_price']:$amount_info['stocks_price'];
						$goods_sku[$v['goods_a_id']]['stock'][] = $stock_info;
						$goods_sku[$v['goods_a_id']]['goods'] = $v;
				}
			}
			
		}
		if(!empty($goods_sku)){
			$result = array('state'=>true,'data'=>$goods_sku,'msg'=>'','page'=>$page,'total_page'=>$total_page,'rp'=>$rp);
//			var_dump ($result['data']);
		}else{
			$result = array('state'=>false,'data'=>'','msg'=>'没有查到符合条件的数据！','page'=>0,'total_page'=>0,'rp'=>0);
		}
//		print_r(count($result));
//        print_r($result);
		echo json_encode($result);die;
		//print_r($goods_sku);die;
	}
	public function order_depot_submit(){
		//print_r($_POST);die;
		$this->common_function->pay_role("seller_ecorder_create");//权限
		$result = array('state'=>false,'data'=>'','msg'=>'操作错误');
		$order_sn = isset($_POST['order_sn'])?trim($_POST['order_sn']):'';
		$store_id = $_SESSION['shop_spg_store_id'];
		$auth_store_id = isset($_POST['store_id'])?trim($_POST['store_id']):'';
		$express_code = isset($_POST['express_code'])?trim($_POST['express_code']):'';
		$changeGoods = isset($_POST['changeGoods'])?$_POST['changeGoods']:'';
		$order_goods = $this->db->select('rec_id,uec_num_iid,uec_skuiid_iid,goods_num,uec_goods_size,stock_code,goods_size,uec_goods_color,uec_goods_name,uec_goods_image')
		->from('shop_order_goods')->where('order_sn',$order_sn)->get()->result_array();
		$re = false;$depot_goods = array();$weight = 0;$order_price = 0;$changeRows = array();
		if(isset($_GET['op'])&&$_GET['op']=='change'){
			if(empty($changeGoods)){
				echo json_encode($result);exit;
			}else{
				foreach ($changeGoods as $k=>$v){
					$changeRows[$v['rec_id']] = $v;
				}
			}
		}
		foreach ($order_goods as $k=>$v){
			if(isset($changeRows[$v['rec_id']])){
				$goods = $changeRows[$v['rec_id']];
				$goods['goods_num'] = isset($goods['goods_num'])?$goods['goods_num']:$v['goods_num'];
				$weight += ($goods['weight']==0)?$goods['c_weight']*$goods['goods_num']:$goods['weight']*$goods['goods_num'];
				$order_price +=$goods['stocks_price']*$goods['goods_num'];
			}else{
				if(empty($v['stock_code'])||($v['goods_size']=='')){
					if($store_id!=$auth_store_id){
						/* $re = true;
						 $result = array('state'=>false,'data'=>'','msg'=>'此渠道暂无商品‘'.$v['uec_goods_name'].'’！');
						 break; */
						$re = true;
						$goods = array('stocks_sku'=>'修改货号','size'=>'修改尺码');
					}else{
						$goods = $this->db->select('ge.*,g.goods_pos,g.brand_id,g.goods_name,g.gc_id,g.goods_image,g.weight,sc.weight as c_weight,sa.stocks_price as sa_stocks_price')
						->from('shop_goods_extend_attr ge')->join('shop_goods g','g.goods_id=ge.goods_id')
						->join('shop_goods_class sc','sc.gc_id=g.gc_id','left')
						->join('store_stocks_amount sa','sa.goods_ea_id=ge.goods_ea_id and sa.ssa_store_id='.$auth_store_id,'left')
						->where('sa.uec_sku_iiud',$v['uec_skuiid_iid'])
						->where('sa.uec_goods_iiud',$v['uec_num_iid'])->where('sa.ssa_store_id',$auth_store_id)->where('g.goods_state',1)->get()->row_array();
						if(empty($goods['stocks_sku'])){
							$re = true;
							$goods = array('stocks_sku'=>'修改货号','size'=>'修改尺码');
						}else{
							$goods['stocks_price'] = 0;
							if(!empty($goods['goods_a_id'])){
								$sku_img = $this->db->select('goods_image')->where('color_id',$goods['goods_a_id'])->order_by('is_default DESC,goods_image_sort ASC')->get('shop_goods_images')->row('goods_image');
								//print_r(($sku_img));die;
								if(!empty($sku_img)){
									$goods['goods_image'] = img_http($sku_img);
								}else{
									$goods['goods_image'] = img_http($goods['goods_image']);
								}
							}
							$goods['goods_name'] = empty($goods['goods_name'])?$v['uec_goods_name']:$goods['goods_name'];
							$goods['goods_image'] = empty($goods['goods_image'])?$v['uec_goods_image']:$goods['goods_image'];
							$goods['color'] = empty($goods['color'])?$v['uec_goods_color']:$goods['color'];
							$goods['stocks_sku'] = empty($goods['stocks_sku'])?$v['stock_code']:$goods['stocks_sku'];
							$goods['size'] = empty($goods['size'])?$v['uec_goods_size']:$goods['size'];
						}
							
					}
					$weight += 0;$order_price +=0;
				}else{
					if($store_id==$auth_store_id){
						$goods = $this->db->select('ge.*,g.goods_pos,g.brand_id,g.goods_name,g.gc_id,g.goods_image,g.weight,sc.weight as c_weight,sa.stocks_price as sa_stocks_price')
						->from('shop_goods_extend_attr ge')->join('shop_goods g','g.goods_id=ge.goods_id')
						->join('shop_goods_class sc','sc.gc_id=g.gc_id','left')
						->join('store_stocks_amount sa','sa.goods_ea_id=ge.goods_ea_id and sa.ssa_store_id='.$auth_store_id,'left')
						->where('sa.uec_sku_iiud',$v['uec_skuiid_iid'])
						->where('sa.uec_goods_iiud',$v['uec_num_iid'])->where('sa.ssa_store_id',$auth_store_id)->where('g.goods_state',1)->get()->row_array();
						$goods['stocks_price'] = 0;
						if(empty($goods['stocks_sku'])){
							$re = true;
							$goods = array('stocks_sku'=>'修改货号','size'=>'修改尺码');
						}else{
							if(!empty($goods['goods_a_id'])){
								$sku_img = $this->db->select('goods_image')->where('color_id',$goods['goods_a_id'])->order_by('is_default DESC,goods_image_sort ASC')->get('shop_goods_images')->row('goods_image');
								//print_r(($sku_img));die;
								if(!empty($sku_img)){
									$goods['goods_image'] = img_http($sku_img);
								}else{
									$goods['goods_image'] = img_http($goods['goods_image']);
								}
							}
							$goods['goods_name'] = empty($goods['goods_name'])?$v['uec_goods_name']:$goods['goods_name'];
							$goods['goods_image'] = empty($goods['goods_image'])?$v['uec_goods_image']:$goods['goods_image'];
							$goods['color'] = empty($goods['color'])?$v['uec_goods_color']:$goods['color'];
							$goods['stocks_sku'] = empty($goods['stocks_sku'])?$v['stock_code']:$goods['stocks_sku'];
							$goods['size'] = empty($goods['size'])?$v['uec_goods_size']:$goods['size'];
						}
						$weight += 0;$order_price +=0;
					}else{
						$goods = $this->db->select('ge.*,g.goods_pos,g.brand_id,g.goods_name,g.gc_id,g.goods_image,g.weight,sc.weight as c_weight,sa.stocks_price as sa_stocks_price')
						->from('shop_goods_extend_attr ge')->join('shop_goods g','g.goods_id=ge.goods_id')
						->join('shop_goods_class sc','sc.gc_id=g.gc_id','left')
						->join('store_stocks_amount sa','sa.goods_ea_id=ge.goods_ea_id and sa.ssa_store_id='.$auth_store_id,'left')
						->where('ge.stocks_sku',$v['stock_code'])->where('ge.size',$v['goods_size'])->where('g.goods_pos',$auth_store_id)->where('g.goods_state',1)->get()->row_array();
						if(empty($goods)){
							$goods = $this->db->select('ge.*,g.goods_pos,g.brand_id,g.goods_name,g.gc_id,g.goods_image,g.weight,sc.weight as c_weight,sa.stocks_price as sa_stocks_price')
							->from('shop_goods_extend_attr ge')->join('shop_goods g','g.goods_id=ge.goods_id')
							->join('shop_goods_class sc','sc.gc_id=g.gc_id','left')
							->join('store_stocks_amount sa','sa.goods_ea_id=ge.goods_ea_id and sa.ssa_store_id='.$auth_store_id,'left')
							->where('ge.stocks_sku',$v['stock_code'])->where('ge.size',$v['goods_size'])->where('g.goods_pos',0)->where('g.goods_state',1)->get()->row_array();
						}
						if(!empty($goods)){
							if($goods['goods_pos']==$auth_store_id){
								$auth_check = $this->db->select('count(1) as num')->where('store_id',$store_id)->where('auth_store_id',$auth_store_id)->where('brand_id',$goods['brand_id'])
								->get('store_auth_store')->row('num');
								if($auth_check==0){
									$weight += 0;
									$goods = array('stocks_sku'=>'修改货号','size'=>'修改尺码');
									$order_price +=0;
									$re = true;
									/* $re = true;
									 $result = array('state'=>false,'data'=>'','msg'=>'商品‘'.$v['uec_goods_name'].'还未给此渠道授权’！');
									 break; */
								}else{
									$goods['stocks_price'] = empty($goods['sa_stocks_price'])?$goods['stocks_price']:$goods['sa_stocks_price'];
									$weight += ($goods['weight']==0)?$goods['c_weight']*$v['goods_num']:$goods['weight']*$v['goods_num'];
									$order_price +=$goods['stocks_price']*$v['goods_num'];
									$sku_img = $this->db->select('goods_image')->where('color_id',$goods['goods_a_id'])->order_by('is_default DESC,goods_image_sort ASC')->get('shop_goods_images')->row('goods_image');
									//print_r(($sku_img));die;
									if(!empty($sku_img)){
										$goods['goods_image'] = img_http($sku_img);
									}else{
										$goods['goods_image'] = img_http($goods['goods_image']);
				
									}
								}
							}else{
								$auth_check = $this->db->select('count(1) as num')->where('store_id',$auth_store_id)->where('brand_id',$goods['brand_id'])
								->get('store_attr_brands')->row('num');
								if($auth_check==0){
									$weight += 0;
									$goods = array('stocks_sku'=>'修改货号','size'=>'修改尺码');
									$order_price +=0;
									$re = true;
									/* $re = true;
									 $result = array('state'=>false,'data'=>'','msg'=>'商品‘'.$v['uec_goods_name'].'还未给此渠道授权’！');
									 break; */
								}else{
									
									$goods['stocks_price'] = empty($goods['sa_stocks_price'])?$goods['stocks_price']:$goods['sa_stocks_price'];
									$weight += ($goods['weight']==0)?$goods['c_weight']*$v['goods_num']:$goods['weight']*$v['goods_num'];
									$order_price +=$goods['stocks_price']*$v['goods_num'];
									$sku_img = $this->db->select('goods_image')->where('color_id',$goods['goods_a_id'])->order_by('is_default DESC,goods_image_sort ASC')->get('shop_goods_images')->row('goods_image');
									//print_r(($sku_img));die;
									if(!empty($sku_img)){
										$goods['goods_image'] = img_http($sku_img);
									}else{
										$goods['goods_image'] = img_http($goods['goods_image']);
									}
								}
							}
								
						}else{
							$order_price +=0;
							$weight += 0;
							$goods = array('stocks_sku'=>'修改货号','size'=>'修改尺码');
							$re = true;
							/* $re = true;
							 $result = array('state'=>false,'data'=>'','msg'=>'此渠道暂无商品‘'.$v['uec_goods_name'].'’！');
							 break; */
						}
					}
				
				}
			}
			
			$goods['order_sn'] = $order_sn;
			$goods['rec_id'] = $v['rec_id'];
			$depot_goods[$v['rec_id']] = $goods;
		}
		
		$order_info = $this->db->select('receive_province,receive_city,receive_area')->where('order_sn',$order_sn)->get('shop_order')->row_array();
		//print_r($order_info);print_r($weight);die;
		$express = false;
		/* if(isset($_GET['op'])&&$_GET['op']=='change'&&!empty($express_code)){
			$express = $express_code;
		} */
		if(!empty($order_info['receive_area'])){
			$fee_info = $this->order_model->get_express_fee_info($order_info['receive_area'], $auth_store_id, $express,$weight);
		}else{
			$fee_info = false;
		}
		if ($fee_info && !empty($fee_info)) {
			$express_info = $fee_info;
		} else {
			if(!empty($order_info['receive_city'])){
				$fee_info = $this->order_model->get_express_fee_info($order_info['receive_city'], $auth_store_id, $express,$weight);
			}else{
				$fee_info = false;
			}
		
			if ($fee_info && !empty($fee_info)) {
				$express_info = $fee_info;
			} else {
				$fee_info = $this->order_model->get_express_fee_info($order_info['receive_province'], $auth_store_id, $express,$weight);
				if ($fee_info && !empty($fee_info)) {
					$express_info = $fee_info;
				} else {
					$fee_info = $this->order_model->get_express_fee_info(0, $auth_store_id, $express,$weight);
					if ($fee_info && !empty($fee_info)) {
						$express_info = $fee_info;
					} else {
						$express_info = '';
					}
				}
			}
		}
		//print_r($express_info);die;
		$store = $this->db->select('store_name,store_id,short_store_name')->where('store_id',$auth_store_id)->get('store')->row_array();
		$express_info = str_replace('"',"'",json_encode($express_info));
		$result = array('state'=>true,'goods'=>$depot_goods,'express'=>$fee_info,'express_str'=>$express_info,'store'=>$store,'goods_price'=>sprintf("%.2f",$order_price));
		if(empty($fee_info)){
			$re = true;
			$result['state'] = 401;
			$result['msg'] = '此渠道还未设置运费信息！';
		}
		$result['submit'] = $re;
		echo json_encode($result);exit;
		//print_r($fee_info);die;
		//print_r($_POST);die;
	}
	public function modify_order_goods_size(){
		$goods_a_id = isset($_POST['goods_a_id'])?trim($_POST['goods_a_id']):'';
		$order_sn = isset($_POST['order_sn'])?trim($_POST['order_sn']):'';
		$auth_store_id = isset($_POST['store'])?trim($_POST['store']):'';
		$store_id = $_SESSION['shop_spg_store_id'];
		$size_arr = $this->db->select('size,size_note')->where('goods_a_id',$goods_a_id)->get('shop_goods_extend_attr')->result_array();
		echo json_encode($size_arr);die;
		//print_r($_POST);die;
	}
	public function order_chai(){
		//print_r($_POST);die;
		$order_sn = isset($_POST['data']['order_sn'])?trim($_POST['data']['order_sn']):'';
		$rec_id = isset($_POST['data']['rec_id'])?trim($_POST['data']['rec_id']):'';
		$chai_num = isset($_POST['order_chai_num'])?trim($_POST['order_chai_num']):'';
		$user_id = $_SESSION['shop_spg_store_id'];
		$result = array('state'=>false,'msg'=>'操作错误');
		if($order_sn&&$rec_id&&$chai_num>0){
			$order_info = $this->db->select('*')->where('order_sn',$order_sn)->get('shop_order')->row_array();
			$order_goods = $this->db->select('*')->where('order_sn',$order_sn)->get('shop_order_goods')->result_array();
			$new_order_sn = $this->common_function->produce_order_sn($user_id);
			$sql_order_goods_up = array();$sql_order_goods_in = array();$sql_order_up = array();$sql_order_in = array();
			$time = time();$order_price = 0;$goods_price = 0;$uec_order_price = 0;
			//print_r($order_goods);die;
			foreach ($order_goods as $k=>$v){
				if($v['rec_id']==$rec_id){
					if($chai_num==$v['goods_num']){
						$sql_order_goods_up = array(
						'rec_id'=>$rec_id,'order_sn'=>$new_order_sn,'is_chai'=>1,	
						);
					}else{
						$in = $v;
						$in['goods_num'] = $chai_num;$in['is_chai'] = 1;
						unset($in['rec_id']);
						$up = array('rec_id'=>$v['rec_id'],'is_chai'=>1);
						$up['goods_num'] = $v['goods_num']-$chai_num;
						$sql_order_goods_in = $in;
						$sql_order_goods_up = $up;
					}
					$order_price = $chai_num*$v['goods_price'];
					$uec_order_price = $chai_num*$v['uec_stock_price'];
				}
			}
			$sql_order_in = $order_info;
			$sql_order_up = array(
				'order_price'=>$order_info['order_price']-$order_price,'goods_price'=>$order_info['goods_price']-$order_price,
				'goods_num'=>$order_info['goods_num']-$chai_num,'modify_time'=>$time,'uec_goods_price'=>$order_info['uec_goods_price']-$uec_order_price
					
			);
			$sql_order_in['order_price'] = $order_price;
			$sql_order_in['goods_price'] = $order_price;
			$sql_order_in['uec_goods_price'] = $uec_order_price;
			$sql_order_in['created_time'] = $time;
			$sql_order_in['modify_time'] = $time;
			$sql_order_in['goods_num'] = $chai_num;
			$sql_order_in['order_sn'] = $new_order_sn;
			//unset($sql_order_in['order_sn']);
			$sql_log = array();
			$sql_log['order_sn'] = $new_order_sn;
			$sql_log['log_msg'] = '电商门店拆单生成'.$new_order_sn;
			$sql_log['log_time'] = $time;
			$sql_log['log_role'] = '导购';
			$sql_log['log_user'] = $_SESSION['shop_spg_id'];
			$sql_log['log_orderstate'] = $order_info['order_status'];
			//print_r($sql_order_goods_up);print_r($sql_order_goods_in);print_r($sql_order_up);print_r($sql_order_in);die;
			$this->db->trans_begin(); //开启事物
			$this->db->update('shop_order',$sql_order_up,array('order_sn'=>$order_sn));
			$this->db->update('shop_order_goods',$sql_order_goods_up,array('rec_id'=>$rec_id));
			$this->db->insert('shop_order',$sql_order_in);
			if(!empty($sql_order_goods_in)){
				$this->db->insert('shop_order_goods',$sql_order_goods_in);
			}
			$this->db->insert('shop_order_log',$sql_log);
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$result = array('state'=>false,'msg'=>'拆单失败');
			}else{
				$this->db->trans_commit();
				$result = array('state'=>true,'msg'=>'拆单成功');
			}
		}
		echo json_encode($result);die;
	}
	
	
	
	public function modify_order_goods_depot(){
		$goods_ea_id = isset($_POST['goods_ea_id'])?trim($_POST['goods_ea_id']):'';
		$rec_id = isset($_POST['rec_id'])?trim($_POST['rec_id']):'';
		$reciver_province_id = isset($_POST['reciver_province_id'])?trim($_POST['reciver_province_id']):'';
		$reciver_city_id = isset($_POST['reciver_city_id'])?trim($_POST['reciver_city_id']):'';
		$reciver_area_id = isset($_POST['reciver_area_id'])?trim($_POST['reciver_area_id']):'';
		$store_id = $_SESSION['shop_spg_store_id'];
		/* $this->db->select('ss.*,s.store_name,s.short_store_name,g.goods_name,g.gc_name,g.brand_name,g.year_to_market,g.season_to_market,g.sex,g.weight,sc.weight as gc_weight,ge.stocks_marketprice')
		->from('store_stocks_amount ss')
		->join('shop_goods_extend_attr ge','ge.goods_ea_id=ss.goods_ea_id')
		->join('shop_goods g','g.goods_id=ss.goods_id')
		->join('shop_goods_class sc','sc.gc_id=g.gc_id')
		->join('store s','s.store_id=ss.ssa_store_id')
		->join('store_auth_store sa','sa.auth_store_id=ss.ssa_store_id and sa.brand_id=g.brand_id','left');

		$this->db->where('ss.goods_ea_id',$goods_ea_id);
		//$this->db->where('ss.ssa_store_id',$_SESSION['shop_spg_store_id']);
		$this->db->group_start();
		$this->db->where("ss.ssa_store_id",$store_id);
		$this->db->or_where('sa.store_id',$store_id);
		$this->db->group_end();
		$this->db->where('g.goods_state',1);
		$goods = $this->db->get()->result_array(); */
		$this->db->select('g.goods_id,g.goods_name,g.gc_name,g.brand_id,g.brand_name,g.year_to_market,g.season_to_market,g.sex,g.weight,ge.stocks_price,ge.stocks_marketprice,
				ge.stocks_sku as stocks_sn,ge.size,ge.size_note as goods_size_remark,sc.weight as gc_weight,ge.color,ge.color_remark as goods_color_remark,g.goods_pos')
		->from('shop_goods g')->join('shop_goods_extend_attr ge','g.goods_id=ge.goods_id')
		->join('shop_goods_class sc','sc.gc_id=g.gc_id','left')
		->where('ge.goods_ea_id',$goods_ea_id);
		$this->db->where('g.goods_state',1);
		$goods = $this->db->get()->row_array();
		$goods_arr = array();
		if(!empty($goods)){
			if($goods['goods_pos']==0){
				$auth_store = $this->db->select('group_concat(store_id) as id')->where('brand_id',$goods['brand_id'])->get('store_attr_brands')->row('id');
			}else{
				$auth_store = $this->db->select('group_concat(auth_store_id) as id')->where('store_id',$store_id)->where('brand_id',$goods['brand_id'])->get('store_auth_store')->row('id');
			}
			$auth_store = empty($auth_store)?$store_id:$auth_store.','.$store_id;
			$goods_data = $this->db->select('ss.ssa_store_id,ss.stocks_price,s.store_name,s.short_store_name,ss.amount')
			->from('store_stocks_amount ss')->join('store s','s.store_id=ss.ssa_store_id')
			->where('ss.goods_ea_id',$goods_ea_id)->where(" ss.ssa_store_id IN ($auth_store)")
			->get()->result_array();
			
			foreach ($goods_data as $k=>$v){
				$s = array_merge($v,$goods);
				$s['stocks_price'] = ($v['stocks_price']=='')?$goods['stocks_price']:$v['stocks_price'];
				$goods_arr[$k] = $s;
				unset($s);
			}
			
			
		}
		//print_r($this->db->last_query());die;
		$goods = $goods_arr;
		//print_r($goods);die;
		$goods_info = array();
		$sexs = array(2 => '男', 1 => '女', 0 => '中性');
        $season = array(1 => 'Q1', 2 => 'Q2', 3 => 'Q3',4=>'Q4');
        //print_r($this->db->last_query());die;
        $goodsInfo = array();
		foreach ($goods as $k=>$v){
			$v['rec_id'] = $rec_id;
			$v['weight'] = ($v['weight']>0)?$v['weight']:$v['gc_weight'];
			$goods_sex = isset($sexs[$v['sex']])?$sexs[$v['sex']]:'';
			$v['sex'] = $goods_sex;
			$goods_season = isset($season[$v['season_to_market']])?$season[$v['season_to_market']]:'';
			$v['market_date'] = $v['year_to_market'].$goods_season;
			$goods_info[$v['ssa_store_id']]['stock'] = $v;
			$goodsInfo = $v;
		}
		//print_r($goods_info);die;
		if(!isset($goods_info[$store_id])){
			$s_goods = $this->db->select('rec_id,goods_id,goods_name,goods_image,goods_num as amount,goods_ea_id,goods_color as color,goods_color_remark,goods_size as size,
					goods_size_remark,goods_pay_price as stocks_price,stock_code as stocks_sn,gc_id')->from('shop_order_goods')->where('rec_id',$rec_id)->get()->row_array();
			$s_goods['ssa_store_id'] = $store_id;
			$s_store = $this->db->select('short_store_name,store_name')->where('store_id',$store_id)->get('store')->row_array();
			$s_goods['store_name'] = $s_store['store_name'];
			$s_goods['short_store_name'] = $s_store['short_store_name'];
			if(empty($goodsInfo)){
				$goodsInfo = $s_goods;
			}
			
			$goods_info[$store_id]['stock'] = $s_goods;
		}
		//print_r($goods_info);die;
		foreach ($goods_info as $k=>$v){
			if(!empty($reciver_area_id)){
				$fee_info[$k] = $this->order_model->get_express_fee_info($reciver_area_id, $k, false);
			}else{
				$fee_info[$k] = false;
			}
			if ($fee_info[$k] && !empty($fee_info[$k])) {
				$express_info = $fee_info[$k];
			} else {
				if(!empty($reciver_city_id)){
					$fee_info[$k] = $this->order_model->get_express_fee_info($reciver_city_id, $k, false);
				}else{
					$fee_info[$k] = false;
				}
				
				if ($fee_info[$k] && !empty($fee_info[$k])) {
					$express_info = $fee_info[$k];
				} else {
					$fee_info[$k] = $this->order_model->get_express_fee_info($reciver_province_id, $k, false);
					if ($fee_info[$k] && !empty($fee_info[$k])) {
						$express_info = $fee_info[$k];
					} else {
						$fee_info[$k] = $this->order_model->get_express_fee_info(0, $k, false);
						if ($fee_info[$k] && !empty($fee_info[$k])) {
							$express_info = $fee_info[$k];
						} else {
							$express_info = '';
						}
					}
				}
			}
			$goods_info[$k]['shipment_time'] = $this->common_function->get_delivery_time($k,time());
			$goods_info[$k]['express'] = str_replace('"',"'",json_encode($express_info));
		}
		if(empty($goodsInfo)){
			$result = array('state'=>false,'data'=>$goodsInfo,'msg'=>'本店铺暂无该商品','store_info'=>$goods_info);
		}else{
			$result = array('state'=>true,'data'=>$goodsInfo,'msg'=>'','store_info'=>$goods_info);
		}
		
		echo json_encode($result);exit;
		
	}
	//生成订单算运费
	public function create_order_ex(){
        $this->common_function->pay_role("seller_ecorder_create");//权限
        $order_sn = isset($_POST['order_sn'])?trim($_POST['order_sn']):'';
		$order_data = isset($_POST['order_data'])?trim($_POST['order_data']):'';
		$order_data = object_array(json_decode($order_data));
		$result = array('state'=>false,'msg'=>'','data'=>'');
		if(!empty($order_data)&&$order_sn){
			$rows = array();
			foreach($order_data as $v){
				
				if(isset($rows[$v['store_id']])){
					$rows[$v['store_id']]['weight'] += $v['goods_num']*$v['weight'];
				}else{
					$rows[$v['store_id']]['weight'] = $v['goods_num']*$v['weight'];
					$rows[$v['store_id']]['ex_fee'] = object_array(json_decode(str_replace("'",'"',$v['ex_fee'])));
				}
				$goods = array('goods_ea_id'=>$v['goods_ea_id'],'goods_num'=>$v['goods_num'],'rec_id'=>$v['rec_id']);
				$rows[$v['store_id']]['goods_ea_id'][]= $goods;
				
			}
			$create_carriage = 0;$self_price = 0;$self_carriage = 0;
			foreach($rows as $k=>$v){
				if($v['ex_fee']['free_fee_num']>0){
					if($v['weight']>=$v['ex_fee']['free_fee_num']){
						$rows[$k]['create_carriage'] = 0;
					}else{
						if($v['weight']>$v['ex_fee']['first_nums']){
							$fee = $v['ex_fee']['first_fee']+ceil(($v['weight']-$v['ex_fee']['first_nums'])/$v['ex_fee']['loan_nums'])*$v['ex_fee']['loan_fee'];
							$rows[$k]['create_carriage'] = sprintf("%.2f",$fee);
						}else{
							$rows[$k]['create_carriage'] = $v['ex_fee']['first_fee'];
						}
					}
				}else{
					if($v['weight']>$v['ex_fee']['first_nums']){
						$fee = $v['ex_fee']['first_fee']+ceil(($v['weight']-$v['ex_fee']['first_nums'])/$v['ex_fee']['loan_nums'])*$v['ex_fee']['loan_fee'];
						$rows[$k]['create_carriage'] = sprintf("%.2f",$fee);
					}else{
						$rows[$k]['create_carriage'] = $v['ex_fee']['first_fee'];
					}
				}
				$create_carriage +=$rows[$k]['create_carriage'];
				if($k==$_SESSION['shop_spg_store_id']){
					foreach ($v['goods_ea_id'] as $va){
						//print_r($v['goods_ea_id']);die;
						if(empty($va['goods_ea_id'])){
							$stocks_price = $this->db->select('goods_pay_price')->from('shop_order_goods')->where('rec_id',$va['rec_id'])->get()->row('goods_pay_price');	
							//print_r($stocks_price);die;
							$self_price +=$stocks_price*$va['goods_num'];
						}else{
							$stocks_price = $this->db->select('stocks_price')->from('store_stocks_amount')->where('ssa_store_id',$k)->where('goods_ea_id',$va['goods_ea_id'])->get()->row('stocks_price');
							$self_price +=$stocks_price*$va['goods_num'];
						}
						
					}
					$self_carriage = $rows[$k]['create_carriage'];
				}
			}
			$result['data'] = $rows;$result['create_carriage'] = $create_carriage;
			$result['self_price'] = $self_price;$result['self_carriage'] = $self_carriage;
			$result['state'] = true;
		}
		//print_r($result);die;
		echo json_encode($result);die;
		
	}
	public function create_order(){
        $this->common_function->pay_role("seller_ecorder_create");//权限
		$user_id = $_SESSION['shop_spg_store_id'];
		$order_sn = isset($_POST['order_sn'])?trim($_POST['order_sn']):'';
		$pwd = isset($_POST['pwd'])?trim($_POST['pwd']):'';
		$money = isset($_POST['money'])?trim($_POST['money']):'';
		$create_carriage = isset($_POST['create_carriage'])?trim($_POST['create_carriage']):'';
		$goods = isset($_POST['goods'])?$_POST['goods']:'';
		$result = array('state'=>false,'msg'=>'操作错误');
		if($order_sn&&$pwd&&$money&&$goods){
			$user_info = $this->db->select('store_name,balance,paypwd')->where('store_id',$user_id)->get('store')->row_array();
			if(encrypt_pwd($pwd)!=$user_info['paypwd']){
				//print_r(encrypt_pwd($pwd));
				$result['msg'] = '密码不正确！';
				$result['state'] = 102;
				echo json_encode($result);exit;
			}
			$ii = 1;$time = time();
			$pay_sn = $this->common_function->makePaySn($user_id);$pay_money = 0;$pay_carriage =0;
			$sql_order_up  =array();$sql_order_in = array();$sql_goods_up  =array();$sql_log_in  =array();$sql_user_log_in  =array();$sql_plat_log = array();
			//print_r($goods);die;
			$plat_asset = $this->db->select('asset')->order_by('paa_id','DESC')->limit(1)->get('sys_asset_account')->row('asset');
			$plat_asset = empty($plat_asset)?0:$plat_asset;
			foreach ($goods as $k=>$v){
				if($ii==1){
					$s_order = $order_sn;
				}else{
					$s_order = $this->common_function->produce_order_sn($user_id);
				}
				$s_order_price = 0;$s_goods_price = 0;$s_goods_num = 0;
				foreach ($v['goods_ea_id'] as $ka=>$va){
					$stocks_price = $this->db->select('stocks_price')->from('store_stocks_amount')->where('ssa_store_id',$k)->where('goods_ea_id',$va['goods_ea_id'])->get()->row('stocks_price');
					$rec_id = $this->db->select('rec_id')->from('shop_order_goods')->where('order_sn',$order_sn)->where('goods_ea_id',$va['goods_ea_id'])->get()->row('rec_id');	
					$sql_goods = array('order_sn'=>$s_order,'goods_price'=>$stocks_price,'goods_pay_price'=>$stocks_price,'store_id'=>$k,'goods_num'=>$va['goods_num'],'rec_id'=>$rec_id);
					$s_goods_price +=$stocks_price*$va['goods_num'];
					$s_goods_num +=$va['goods_num'];
					$sql_goods_up[] = $sql_goods;
				}
				$pd_amount = 0;
				if($user_id==$k){
					$pay_money +=0;$pay_carriage +=0;$pd_amount = 0;
				}else{
					$pay_money +=$s_goods_price+$v['create_carriage'];$pay_carriage +=$v['create_carriage'];$pd_amount = $s_goods_price+$v['create_carriage'];
				}
				$log_note_p = "电商店铺下单支付订单金额".$pd_amount;
				$sql_plat_log[] = array('user_id'=>$user_id,'user_type'=>1,'pay_sn'=>$pay_sn,'order_sn'=>$s_order,'log_type'=>3,'asset_out'=>0,'asset_in'=>$pd_amount,'asset'=>$plat_asset+$pay_money,'note'=>$log_note_p,'time'=>$time);
				
				$store_name = $this->db->select('store_name,bind_ecstore_name')->from('store')->where('store_id',$k)->get()->row_array();
				if($ii==1){
					$sql_order = array('create_carriage'=>$v['create_carriage'],'store_id'=>$k,'pay_sn'=>$pay_sn,'pay_type'=>3,'order_status'=>20,'store_name'=>$store_name['store_name'],
							'order_price'=>$s_goods_price+$v['create_carriage'],'goods_num'=>$s_goods_num,'goods_price'=>$s_goods_price,'pd_amount'=>$pd_amount,
							'pay_time'=>$time,'create_express'=>$v['ex_fee']['express_code'],'order_sn'=>$s_order,'created_time'=>$time,'modify_time'=>$time,'bind_ecstore_name'=>$store_name['bind_ecstore_name']
					);
					$sql_order_up[] = $sql_order;
					
				}else{
					if(empty($order_info)){
						$order_info = $this->db->select('*')->where('order_sn',$order_sn)->get('shop_order')->row_array();
					}
					$sql_order = $order_info;
					$sql_order['create_carriage'] = $v['create_carriage'];$sql_order['store_id'] = $k;$sql_order['pay_sn'] = $pay_sn;$sql_order['order_sn'] = $s_order;
					$sql_order['pay_type'] = 3;$sql_order['order_status'] = 20;$sql_order['store_name'] = $store_name['store_name'];
					$sql_order['order_price'] = $s_goods_price+$v['create_carriage'];$sql_order['goods_num'] = $s_goods_num;$sql_order['goods_price'] = $s_goods_price;
					$sql_order['pd_amount'] = $pd_amount;$sql_order['pay_time'] = $time;$sql_order['created_time'] = $time;$sql_order['create_express'] = $v['ex_fee']['express_code'];
					$sql_order['modify_time'] = $time;$sql_order['bind_ecstore_name'] = $store_name['bind_ecstore_name'];
					$sql_order_in[] = $sql_order;
				}
				$sql_log = array();
				$sql_log['order_sn'] = $s_order;
				$sql_log['log_msg'] = '电商门店订单选渠道生成订单'.$s_order;
				$sql_log['log_time'] = $time;
				$sql_log['log_role'] = '导购';
				$sql_log['log_user'] = $_SESSION['shop_spg_id'];
				$sql_log['log_orderstate'] = 20;
				$sql_log_in[] = $sql_log;
				$ii++;
			}
			//print_r($sql_goods_up);print_r($sql_order_in);print_r($sql_order_up);print_r($sql_log_in);die;
			//print_r($pay_money);print_r($pay_carriage);die;
			
			if($user_info['balance']<$pay_money){
				$result['msg'] = '余额不足请先充值！';
				$result['state'] = 101;
				echo json_encode($result);exit;
			}
			$sql_user_balance = array('balance'=>$user_info['balance']-$pay_money);
			$log_note = "下单支付订单金额".$pay_money;
			$sql_asset_log = array('store_id'=>$user_id,'pay_sn'=>$pay_sn,'log_type'=>7,'asset_out'=>$pay_money,'asset_in'=>0,'asset'=>$user_info['balance']-$pay_money,'note'=>$log_note,'time'=>$time);
			//CREATE TABLE `jk_store_asset_log` (
		    //$log_note_p = "电商店铺下单支付订单金额".$pay_money;
		    
		    //$sql_plat_log = array('user_id'=>$user_id,'user_type'=>1,'pay_sn'=>$pay_sn,'log_type'=>3,'asset_out'=>0,'asset_in'=>$pay_money,'asset'=>$plat_asset+$pay_money,'note'=>$log_note_p,'time'=>$time);
		    //CREATE TABLE `jk_sys_asset_account` (
		    $this->db->trans_begin(); //开启事物
		    $this->db->update('store',$sql_user_balance,array('store_id'=>$user_id));
		    $this->db->insert('store_asset_log',$sql_asset_log);
		    $this->db->insert_batch('sys_asset_account',$sql_plat_log);
		    $this->db->update_batch('shop_order_goods',$sql_goods_up,'rec_id');
		    $this->db->update_batch('shop_order',$sql_order_up,'order_sn');
		    if(!empty($sql_order_in)){
		    	$this->db->insert_batch('shop_order',$sql_order_in);
		    }
		    $this->db->insert_batch('shop_order_log',$sql_log_in);
		    if ($this->db->trans_status() === FALSE) {
		    	$this->db->trans_rollback();
		    	$error_msg = "订单支付失败。";
		    	$result['msg'] = $error_msg;
		    }else{
		    	$this->db->trans_commit();
		    	$result['state'] = true;$result['msg'] = '订单生成成功';
		    	$this->common_function->insertUserLog('订单生成支付', 1, 3, 'add');
		    }
		}
		echo json_encode($result);exit;
		//print_r($_POST);die;
	}
	public function create_order_submit(){
		//print_r($_POST);die;
		$this->common_function->pay_role("seller_ecorder_create");//权限
		$user_id = $_SESSION['shop_spg_store_id'];
		$order_sn = isset($_POST['order_sn'])?trim($_POST['order_sn']):'';
		$pwd = isset($_POST['pwd'])?trim($_POST['pwd']):'';
		$money = isset($_POST['orderPrice'])?trim($_POST['orderPrice']):'';
		$goods_price = isset($_POST['goodsPrice'])?trim($_POST['goodsPrice']):'';
		$create_carriage = isset($_POST['shipFee'])?trim($_POST['shipFee']):'';
		$create_express = isset($_POST['express_code'])?trim($_POST['express_code']):'';
		$store = isset($_POST['storeInfo'])?$_POST['storeInfo']:'';
		$goods = isset($_POST['goods'])?$_POST['goods']:'';
		$result = array('state'=>false,'msg'=>'操作错误');
		if($order_sn&&$pwd&&$goods&&!empty($store['store_id'])){
			$user_info = $this->db->select('store_name,balance,paypwd')->where('store_id',$user_id)->get('store')->row_array();
			if(encrypt_pwd($pwd)!=$user_info['paypwd']){
				//print_r(encrypt_pwd($pwd));
				$result['msg'] = '密码不正确！';
				$result['state'] = 102;
				echo json_encode($result);exit;
			}
			if($user_info['balance']<$money&&$money!=0){
				$result['msg'] = '余额不足请先充值！';
				$result['state'] = 101;
				echo json_encode($result);exit;
			}
			$time = time();
			$pay_sn = $this->common_function->makePaySn($user_id);$pay_money = 0;$pay_carriage =0;
			$sql_order_up  =array();$sql_order_in = array();$sql_goods_up  =array();$sql_log_in  =array();$sql_user_log_in  =array();$sql_plat_log = array();
			//print_r($goods);die;
			$plat_asset = $this->db->select('asset')->order_by('paa_id','DESC')->limit(1)->get('sys_asset_account')->row('asset');
			$plat_asset = empty($plat_asset)?0:$plat_asset;
			foreach ($goods as $k=>$v){
				$sql_goods = array(
						'goods_price'=>empty($v['stocks_price'])?0:$v['stocks_price'],'goods_pay_price'=>empty($v['stocks_price'])?0:$v['stocks_price'],'store_id'=>$store['store_id'],'rec_id'=>$v['rec_id'],
						'goods_ea_id'=>empty($v['goods_ea_id'])?0:$v['goods_ea_id'],'goods_a_id'=>empty($v['goods_a_id'])?0:$v['goods_a_id'],'goods_id'=>empty($v['goods_id'])?0:$v['goods_id'],'goods_name'=>empty($v['goods_name'])?'':$v['goods_name'],
						'goods_image'=>empty($v['goods_image'])?'':$v['goods_image'],'goods_color'=>empty($v['color'])?'':$v['color'],'goods_color_remark'=>empty($v['color_remark'])?'':$v['color_remark'],'goods_size'=>isset($v['size_note'])&&($v['size_note']!='')?'':$v['size'],
						'goods_size_remark'=>empty($v['size_note'])?'':$v['size_note'],'gc_id'=>empty($v['gc_id'])?'':$v['gc_id'],'stock_code'=>empty($v['stocks_sku'])?'':$v['stocks_sku'],'sotck_barcode'=>empty($v['stocks_bar_code'])?'':$v['stocks_bar_code'],
				);
				if(!empty($v['goods_num'])){
					$sql_goods['goods_num'] = $v['goods_num'];
				}
				$sql_goods_up[] = $sql_goods;
			}
			$store_name = $this->db->select('store_name,bind_ecstore_name')->from('store')->where('store_id',$store['store_id'])->get()->row_array();
			$log_note_p = "电商店铺下单支付订单金额".$money;
			$sql_plat_log = array('user_id'=>$user_id,'user_type'=>1,'pay_sn'=>$pay_sn,'order_sn'=>$order_sn,'log_type'=>3,'asset_out'=>0,'asset_in'=>$money,'asset'=>$plat_asset+$money,'note'=>$log_note_p,'time'=>$time);
			
			$sql_log = array();
			$sql_log['order_sn'] = $order_sn;
			$sql_log['log_msg'] = '电商门店订单选渠道生成订单'.$order_sn;
			$sql_log['log_time'] = $time;
			$sql_log['log_role'] = '导购';
			$sql_log['log_user'] = $_SESSION['shop_spg_id'];
			$sql_log['log_orderstate'] = 20;
			$sql_order = array('create_carriage'=>$create_carriage,'store_id'=>$store['store_id'],'pay_sn'=>$pay_sn,'pay_type'=>3,'order_status'=>20,'store_name'=>$store_name['store_name'],
					'order_price'=>$money,'goods_price'=>$goods_price,'pd_amount'=>$money,
					'pay_time'=>$time,'create_express'=>$create_express,'created_time'=>$time,'modify_time'=>$time,'bind_ecstore_name'=>$store_name['bind_ecstore_name']
			);
			$sql_user_balance = array('balance'=>$user_info['balance']-$money);
			
			$log_note = "下单支付订单金额".$money;
			$sql_asset_log = array('store_id'=>$user_id,'pay_sn'=>$pay_sn,'log_type'=>7,'asset_out'=>$money,'asset_in'=>0,'asset'=>$user_info['balance']-$money,'note'=>$log_note,'time'=>$time);
			//print_r($sql_user_balance);print_r($sql_asset_log);print_r($sql_plat_log);print_r($sql_goods_up);print_r($sql_order);print_r($sql_log);die;
			//print_r($pay_money);print_r($pay_carriage);die;
					
			$this->db->trans_begin(); //开启事物
			$this->db->update('store',$sql_user_balance,array('store_id'=>$user_id));
			$this->db->insert('store_asset_log',$sql_asset_log);
			$this->db->insert('sys_asset_account',$sql_plat_log);
			$this->db->update_batch('shop_order_goods',$sql_goods_up,'rec_id');
			$this->db->update('shop_order',$sql_order,array('order_sn'=>$order_sn));
			$this->db->insert('shop_order_log',$sql_log);
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$error_msg = "订单支付失败。";
				$result['msg'] = $error_msg;
			}else{
				$this->db->trans_commit();
				$result['state'] = true;$result['msg'] = '订单生成成功';
				$this->common_function->insertUserLog('订单生成支付', 1, 3, 'add');
			}
		}
		echo json_encode($result);exit;
	}
	public function cancel_order(){
        $this->common_function->pay_role("seller_ecorder_cance");//权限
		$order_sn = isset($_POST['order_sn'])?trim($_POST['order_sn']):'';
		$result = array('state'=>false,'msg'=>'操作错误');
		if($order_sn){
			$this->db->update('shop_order',array('order_status'=>0,'modify_time'=>time()),array('order_sn'=>$order_sn));
			$result = array('state'=>true,'msg'=>'订单取消成功');
		}
		
		echo json_encode($result);exit;
	}
	public function remark_update(){
        $this->common_function->pay_role("seller_order_manage");//权限
		$order_sn = isset($_POST['order_sn'])?trim($_POST['order_sn']):'';
		$seller_flag = isset($_POST['seller_flag'])?trim($_POST['seller_flag']):'';
        $seller_note = isset($_POST['seller_note'])?trim($_POST['seller_note']):'';
		$result = array('state'=>false,'msg'=>'操作错误');
		if($order_sn){
			$this->db->update('shop_order',array('buyer_message'=>$seller_note,'seller_flag'=>$seller_flag,'modify_time'=>time()),array('order_sn'=>$order_sn));
			$result = array('state'=>true,'msg'=>'订单修改成功');
		}
		echo json_encode($result);exit;
	}
	public function order_detail(){
        $this->common_function->pay_role("seller_ecorder_synchronize");//权限
		$order_sn = isset($_GET['order_sn'])?trim($_GET['order_sn']):'';
		$this->db->select("o.order_sn,o.out_order_sn,o.order_status,o.created_time,o.end_time,o.pay_time,o.order_price,o.create_carriage,o.carriage,o.store_id,o.store_name,o.order_from,o.shipping_type,
				o.refund,o.buyer_memo,o.buyer_message,o.seller_flag,o.seller_note,o.logistics_company_name,o.create_express,o.waybill_sn,o.delivery_time,o.receive_time,o.pay_sn,
				o.rebate_amount,o.rebate,
				o.receive_name,o.receive_mobile,o.receive_tel,o.receive_address,o.receive_postcode,g.goods_id,g.goods_name,g.goods_ea_id,a.area_name as province,
				b.area_name as city,c.area_name as area,s.ous_tel,e.e_name,ee.e_name as logistics_name,
				g.goods_image,g.goods_color,g.goods_color_remark,g.goods_size,g.goods_size_remark,g.goods_pay_price,g.goods_price,g.goods_num");
		$this->db->from('shop_order o');
		$this->db->join('shop_order_goods g','o.order_sn=g.order_sn');
		$this->db->join('store s','s.store_id=o.store_id','left');
		$this->db->join('express e','e.e_code=o.create_express','left');
		$this->db->join('express ee','ee.e_code=o.logistics_company_name','left');
		$this->db->join('area a','a.area_id=o.receive_province','left');
		$this->db->join('area b','b.area_id=o.receive_city','left');
		$this->db->join('area c','c.area_id=o.receive_area','left');
		$this->db->where('o.order_sn',$order_sn);
		$info = $this->db->get()->result_array();
		if(empty($info)){
			return false;
		}
		$order = $info[0];
		if($order['pay_time'] != 0){
            $order['pay_time'] = date('Y-m-d H:i:s',$order['pay_time']);
        }
        if($order['created_time'] != 0){
            $order['created_time'] = date('Y-m-d H:i:s',$order['created_time']);
        }
        if($order['end_time'] != 0){
            $order['end_time'] = date('Y-m-d H:i:s',$order['end_time']);
        }
        if($order['receive_time'] != 0){
            $order['receive_time'] = date('Y-m-d H:i:s',$order['receive_time']);
        }
        $order['delivery_date'] = empty($order['delivery_time'])?'':date('Y-m-d H:i:s',$order['delivery_time']);
        $order['logistics_company_name'] = empty($order['logistics_name'])?$order['logistics_company_name']:$order['logistics_name'];
        $order['create_express'] = empty($order['e_name'])?$order['create_express']:$order['e_name'];
        $order['express_name'] = empty($order['logistics_company_name'])?$order['create_express']:$order['logistics_company_name'];
        $order_from = $this->order_model->order_from();
        $order['order_type_'] = $order_from[$order['order_from']];
        $shipping_type = $this->order_model->shipping_type();
        $order['shipping'] = isset($shipping_type[$order['shipping_type']])?$shipping_type[$order['shipping_type']]:'快递';
		$this->smarty->assign('info',$info);
		$this->smarty->assign('order',$order);
		$defaultImg = $this->common_function->get_system_value('default_goods_image');
		$this->smarty->assign('defaultImg',$defaultImg);
		$this->smarty->display('out_order_detail.html');
	}

	/*商品订单*/
	public function order_management(){
        $this->common_function->pay_role("seller_order_manage");//权限
        $user_id = $_SESSION['shop_spg_store_id'];
        $this->smarty->assign('userId',$user_id);
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        //物流信息
        $this->db->select('id,e_name,e_code');
        $this->db->from('express');
        $this->db->where('e_state=1');
        $express=$this->db->get()->result_array();
        $this->smarty->assign('express',$express);
        //退货原因
        $this->db->select('reason_id,reason_info');
        $this->db->from('shop_order_refund_reason');
        $this->db->order_by('reason_id','ASC');
        $refund_reason  = $this->db->get()->result_array();
        if(empty($refund_reason)){
            $refund_reason =array(0=>array('reason_id'=>1,'reason_info'=>'不喜欢啦'));
        }
        $refund_reason = $this->product_reason_array_to_option($refund_reason);
        $this->smarty->assign('refundreason',json_encode($refund_reason));

        $this->db->select("so.order_sn,so.order_type,so.pay_sn,so.order_from,so.pay_type,so.order_status,so.store_id,so.store_name,so.spg_id,so.spg_name,
            so.buyer_nickname,so.buyer_id,so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,so.create_carriage,
            so.counpon_amount,so.integral_amount,so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,
            so.evaluation_state,so.evaluation_time,so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,
            so.created_time,so.end_time,so.buyer_message,so.buyer_memo,so.carriage,so.refund_state,so.refund,so.create_express,so.seller_note,
            so.receive_name,so.receive_province,so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,
            so.receive_tel,so.receive_postcode,so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,e.e_name as express_name,ee.e_name as logistics_name,
            so.pickup_code,u.user_name,u.user_addres,u.tel,us.store_name as u_store_name,us.ous_tel as u_ous_tel");
        $this->db->from('shop_order so');
        $this->db->join('shop_order_goods g','g.order_sn=so.order_sn','left');
        if(isset($_GET['goods_spu'])&&!empty($_GET['goods_spu'])){
            $this->db->join('shop_goods gg','gg.goods_id=g.goods_id','left');
        }
        $this->db->join('user u','u.user_id=so.buyer_id','left');
        $this->db->join('store us','us.store_id=so.buyer_id','left');
        $this->db->join('store s','s.store_id=so.store_id','left');
        $this->db->join('express e','e.e_code=so.create_express','left');
        $this->db->join('express ee','ee.e_code=so.logistics_company_name','left');

        if(empty($_GET)){
            $this->db->where("so.created_time >= ".( strtotime(date("Y-m-d"))-86400*90));
            $this->db->where("so.created_time <= ".(strtotime(date("Y-m-d"))+86400));
        }

        if(isset($_GET)){
            if(!empty($_GET['startime'])){
                $this->db->where("so.created_time >= ".strtotime($_GET['startime']));
            }
            if(!empty($_GET['endtime'])){
                $this->db->where("so.created_time <= ".(strtotime($_GET['endtime'])+86400));
            }
            if(!empty($_GET['buyer'])){
                $this->db->where("u.user_name like '%".trim($_GET['buyer'])."%'");
            }
            if(!empty($_GET['order_sn'])){
                $this->db->where("so.order_sn like '%".trim($_GET['order_sn'])."%'");
            }
            if(isset($_GET['express_type'])&&($_GET['express_type']!='')){
                $this->db->group_start();
                $this->db->where('so.create_express',$_GET['express_type']);
                $this->db->or_where('so.logistics_company_name',$_GET['express_type']);
                $this->db->group_end();
            }
            if(isset($_GET['order_type'])&&($_GET['order_type']!='')){
                $this->db->where('order_status',$_GET['order_type']);
            }
            if(isset($_GET['buyer_tel'])&&!empty($_GET['buyer_tel'])){
                $this->db->group_start();
                $this->db->like('so.receive_mobile',trim($_GET['buyer_tel']));
                $this->db->or_like('so.receive_tel',trim($_GET['buyer_tel']));
                $this->db->group_end();
            }
            if(isset($_GET['goods_spu'])&&!empty($_GET['goods_spu'])){
                $this->db->like('gg.goods_spu',trim($_GET['goods_spu']));
            }
            if(isset($_GET['stocks_sn'])&&!empty($_GET['stocks_sn'])){
                $this->db->like('g.stock_code',trim($_GET['stocks_sn']));
            }
            if(isset($_GET['pay_sn'])&&!empty($_GET['pay_sn'])){
                $this->db->like('so.pay_sn',trim($_GET['pay_sn']));
            }
        }


        $this->db->where('so.store_id',$user_id);
        $this->db->group_by('so.order_sn');
        $db=clone($this->db);
        $orders = $this->db->get()->result_array();

        $total=count($orders);

        $page_count = ceil($total/$rp);
        $this->db=$db;
        $start = $rp * ($page-1);
        $this->db->order_by('so.created_time','DESC');
        $this->db->limit($rp,$start);//60  15
        $orders = $this->db->get()->result_array();
//        print_r($this->db->last_query());die;
        $order_from = $this->order_model->order_from();
        $order_type = $this->order_model->order_type();
        foreach ($orders as $key=>$order){
            $orders[$key]['order_type_'] = $order_type[$order['order_type']];
            $orders[$key]['order_from_'] = $order_from[$order['order_from']];
            $orders[$key]['created_time'] = date("Y-m-d H:i:s",$order['created_time']);
            $this->db->select('sog.rec_id,sog.order_sn,sog.goods_id,sog.goods_name,sog.goods_image,sog.goods_num,sog.goods_color,sog.goods_color_remark,sog.goods_size,
					sog.goods_price,sog.goods_pay_price,sog.user_id,sog.store_id,sog.activity_type,sog.promotions_id,sog.gc_id,sog.stock_code,sog.sotck_barcode,sog.goods_ea_id,
					sog.shipping_status,sog.express_sn');
            $this->db->from('shop_order_goods as sog');
            $this->db->where('sog.order_sn',$order['order_sn']);
            $order_goods = $this->db->get()->result_array();
            foreach ($order_goods as $k=>$v){
                $goods_return = $this->db->select('refund_id,buyer_id,refund_tel,buyer_name,goods_ea_id,goods_name,order_goods_id,goods_num,refund_amount_apply,refund_amount,goods_image,
				seller_state,refund_state,add_time,reason_id,reason_info,pic_info,refund_address,buyer_message,express_id,invoice_no')->from('shop_order_refund_return')->where('order_sn',$order['order_sn'])
                    ->where('order_goods_id',$v['rec_id'])->where('refund_state!=4')->order_by('refund_id','DESC')->get()->row_array();
                if(isset($goods_return['pic_info'])){
                    $goods_return['pic_info'] = unserialize($goods_return['pic_info']);
                }
                $order_goods[$k]['goods_return'] = $goods_return;
            }
            $orders[$key]['son'] = $order_goods;

        }
        $order_info = $orders ? $orders : 0;
        $page_info = array('total_num'=>$total, 'page_count'=>$page_count, 'page'=>$page, 'rp'=>$rp, 'start'=>$start+1, 'to'=>$start+$rp);
        //print_r($page_info);die;
        if ($this->input->is_ajax_request()){
            if ($order_info){
                echo json_encode(array('state'=>true,'goods_info'=>$order_info,'page_info'=>$page_info));
            }else{
                echo json_encode(array('state'=>false));
            }
        }else{
            $defaultImg = $this->common_function->get_system_value('default_goods_image');
            $this->smarty->assign('defaultImg',$defaultImg);
            //print_r($defaultImg);die;
            $this->smarty->display ( 'business_order.html' );
        }
	}
	/*取消订单*/
	public function order_cancel() {
        $this->common_function->pay_role("seller_ecorder_cance");//权限
        $data = $this->input->post();
		if($this->db->update('shop_order',array('order_status'=>0),array('order_sn'=>$data['order_sn']))){
			if($data['state_info'] == 1){
				$this->common_function->insert_order_log($data['order_sn'],'取消订单，无法备齐货物',1);
			}elseif($data['state_info'] == 2){
				$this->common_function->insert_order_log($data['order_sn'],'取消订单，不是有效的订单',1);
			}elseif($data['state_info'] == 3){
				$this->common_function->insert_order_log($data['order_sn'],'取消订单，买家主动要求',1);
			}else{
				$this->common_function->insert_order_log($data['order_sn'],$data['state_info1'],1);
			}
			echo json_encode('取消成功');
		}else{
			echo json_encode('取消失败');
		}
	}
	
	
	

	//打印面单获取订单信息
	public function waybill_print(){
	    $this->common_function->pay_role("seller_order_print_picklist");//权限
	    $order_sn = isset($_GET['order_sn']) ? trim($_GET['order_sn']) : false;
	    $id = isset($_GET['id']) ? trim($_GET['id']) : false;
	    $flag = true;
	    $waybill_apply_info=array();
	    if(empty($order_sn)){
	        $this->common_function->show_message('数据有错');exit;
	    }else{
	        $wheres = "waybill ='1'";
	        if(isset($_GET['op']) && !empty($_GET['op'])){
	            $wheres = "waybill ='2'";
	        }
	        $waybill = $this->db->select('ew.*,ex.cp_code,ex.standard_templates,ex.standard_templates_v3')->from('express_waybill as ew')
	        ->join("express as ex","ew.express_id = ex.id",'left')
	        ->where('ew.status',1)->where($wheres)->where('ew.store_id',$_SESSION['shop_spg_store_id'])->get()->result_array();
	        if(empty($waybill)){
	            $this->common_function->show_message('请先设置一个打印模板');exit;die;
	        }
	        
	         $deliver_info = $this->db->select("o.seller_note,o.buyer_message,d.ous_address,d.ous_tel,o.store_name,o.order_from,e.id as express_id ,o.create_express,o.order_sn,o.buyer_id,o.receive_name,o.receive_mobile,
            o.receive_tel,o.receive_province,o.receive_city,o.receive_area,o.receive_address,o.receive_postcode,
            a.area_name as province,b.area_name as city,c.area_name as area,aa.area_name as sel_province,bb.area_name as sel_city,cc.area_name as sel_area,
            count(os.order_sn) as snum,sum(os.goods_num) as num,substring_index(GROUP_CONCAT(concat_ws(' ',os.store_id,os.goods_size,p.gc_name,os.goods_num) separator '<br>'),'<br>',3) as stock_info")->from('shop_order as o')
            ->join('express as e','e.e_code=o.create_express','left')
            ->join('area as a','a.area_id=o.receive_province','left')
            ->join('area as b','b.area_id=o.receive_city','left')
            ->join('area as c','c.area_id=o.receive_area','left')
            ->join('store as d','d.store_id=o.store_id','left')
            ->join('area as aa','aa.area_id=d.province_id','left')
            ->join('area as bb','bb.area_id=d.city_id','left')
            ->join('area as cc','cc.area_id=d.area_id','left')
            ->join('shop_order_goods as os','os.order_sn=o.order_sn','left')
            ->join('shop_goods as s','s.goods_id=os.goods_id','left')
            ->join('shop_goods_class as p','p.gc_id=s.gc_id','left')
	         ->where('o.order_sn',$order_sn)->get()->row_array();
	         
	        $buyer_stock_info = $this->db->select('os.store_id,os.goods_id,os.goods_size,os.goods_num,s.gc_id,os.goods_name')->from('shop_order_goods as os')
	        ->join('shop_goods as s','s.goods_id=os.goods_id','left')
	        ->join('shop_goods_class as p','p.gc_id=s.gc_id','left')
	        ->where('os.order_sn',$order_sn)->get()->result_array();
	        $stock_num = $this->db->select('sum(goods_num) as num')->from('shop_order_goods')->where('order_sn',$order_sn)->get()->row('num');
	        $will_info = array();
	        //$will_info = $waybill[0];
	        //print_r($deliver_info);die;
	        //print_r($stock_num);die;
	        foreach ($waybill as $k=>$v){
	            if($v['express_id']==$deliver_info['express_id']){
	                $will_info = $v;
	                break;
	            }
	        }

	
	        // print_r($deliver_info);exit;
	    }
	    if(isset($will_info) && !empty($will_info)){
	        if(isset($_GET['op']) && !empty($_GET['op'])){//热敏
	            if(!($will_info['cp_code'] && $will_info['standard_templates'] && $will_info['standard_templates_v3'])){
	                $this->common_function->show_message('对不起,该运单模板未设置菜鸟打印模板，请联系管理员');exit;die;
	            }
	            $waybill_apply_info['cp_code'] = $will_info['cp_code'];
	            $waybill_apply_info['template_ur'] = $will_info['standard_templates'];
	            //$waybill_apply_info['template_ur_v3'] = $will_info['standard_templates_v3'];
	        }else{
	            if(isset($will_info['waybill_data']) && !empty($will_info['waybill_data'])){
	                $waybill_data =unserialize($will_info['waybill_data']);
	            }else{
	                $this->common_function->show_message('对不起，快递 '.$deliver_info['create_express']."还没有对应的运单模板！");exit;die;
	            }
	        }
	    }else{
	        $this->common_function->show_message('对不起，快递 '.$deliver_info['create_express']."还没有对应的运单模板！");exit;die;
	    }
	   
	  
	    
	     $img = $will_info['waybill_image'];
	     $img_url = PLUGIN.'data/print/'.$img;
	

	    //$buyer_stock = isset($waybill_data['buyer_stock'])? $waybill_data['buyer_stock'] : '';
	    $this->smarty->assign('img',$img_url);
	    $this->smarty->assign('will_info',$will_info);

	    //$this->smarty->assign('data',$waybill_data);
	    $this->smarty->assign('waybill',$waybill);
	    $this->smarty->assign('deliver_info',$deliver_info);
	    $this->smarty->assign('order_sn',$order_sn);

	    
	    
	    
	    
	    $waybill_apply_info['order_sn'] =$order_sn;
	    $waybill_apply_info['items']['count'] = $stock_num;
	    $waybill_apply_info['items']['name'] = $buyer_stock_info[0]['goods_name'];
	    $waybill_apply_info['object_id'] =$this->common_function->mt_rand_str(4);
	    $waybill_apply_info['recipient']['city']=$deliver_info['city'];
	    $waybill_apply_info['recipient']['detail']=$deliver_info['receive_address'];
	    $waybill_apply_info['recipient']['district']=$deliver_info['area'];
	    $waybill_apply_info['recipient']['province']=$deliver_info['province'];
	    $waybill_apply_info['recipient']['town']='';
	    $waybill_apply_info['recipient']['mobile']= !empty($deliver_info['receive_mobile']) ? $deliver_info['receive_mobile']:$deliver_info['receive_tel'];
	    $waybill_apply_info['recipient']['name']=$deliver_info['receive_name'];
	    if($deliver_info['order_from']==41){
	        $waybill_apply_info['order_channels_type'] ='JD';
	    }elseif ($deliver_info['order_from']==42){
	        $waybill_apply_info['order_channels_type'] ='TB';
	    }else{
	        $waybill_apply_info['order_channels_type'] ='OTHERS';
	    }
	    
	    if(!isset($_GET['op']) || empty($_GET['op'])){
	        $waybill_data   = unserialize($will_info['waybill_data']);
	        //print_r($will_info);die;
	        /*  ous_tel,o.store_name*/
	        $waybill_data_js = array();
 	        foreach ($waybill_data as $ks=>$vs){
 	            $waybill_data[$ks]['font-sizes'] = str_replace("px",'',$vs['font-size']);
 	            $waybill_data[$ks]['tops'] = str_replace("px",'',$vs['top']);
 	            $waybill_data[$ks]['lefts'] = str_replace("px",'',$vs['left']);
 	            $waybill_data[$ks]['widths'] = str_replace("px",'',$vs['width']);
 	            $waybill_data[$ks]['heights'] = str_replace("px",'',$vs['height']);
 	            if($ks=="sender_name"){
 	                $waybill_data[$ks]['name']=$deliver_info['store_name'];
 	                
 	            }
 	            if($ks=="sender_postcode"){
 	                $waybill_data[$ks]['name']='';
 	            }
 	            if($ks=="sender_province"){
 	                $waybill_data[$ks]['name']=$deliver_info['sel_province'];
 	            }
 	            if($ks=="sender_city"){
 	                $waybill_data[$ks]['name']=$deliver_info['sel_city'];
 	            }
 	            if($ks=="sender_district"){
 	                $waybill_data[$ks]['name']=$deliver_info['sel_area'];
 	            }
 	            if($ks=="sender_town"){
 	                $waybill_data[$ks]['name']='';
 	            }
 	            if($ks=="sender_detail"){
 	                $waybill_data[$ks]['name']=$deliver_info['sel_province'].$deliver_info['sel_city'].$deliver_info['sel_area'].$deliver_info['ous_address'];
 	            }
 	            if($ks=="sender_phone"){
 	                $waybill_data[$ks]['name']=$deliver_info['ous_tel'];
 	            }
 	            if($ks=="sender_mobile"){
 	                $waybill_data[$ks]['name']=$deliver_info['ous_tel'];
 	            }
 	            if($ks=="sender_tel"){
 	                $waybill_data[$ks]['name']=$deliver_info['ous_tel'];
 	            }
 	            if($ks=="sender_company"){
 	                $waybill_data[$ks]['name']=$deliver_info['store_name'];
 	            }
 	            if($ks=="sender_note"){
 	                $waybill_data[$ks]['name']=$deliver_info['seller_note'];
 	            }
 	             
 	            if($ks=="recipient_name"){
 	                $waybill_data[$ks]['name']=$deliver_info['receive_name'];
 	            }
 	            if($ks=="recipient_postcode"){
 	                $waybill_data[$ks]['name']=$deliver_info['receive_postcode'];
 	            }
 	            if($ks=="recipient_province"){
 	                $waybill_data[$ks]['name']=$deliver_info['receive_province'];
 	            }
 	            if($ks=="recipient_city"){
 	                $waybill_data[$ks]['name']=$deliver_info['receive_city'];
 	            }
 	            if($ks=="recipient_district"){
 	                $waybill_data[$ks]['name']=$deliver_info['receive_area'];
 	            }
 	            if($ks=="recipient_town"){
 	                $waybill_data[$ks]['name']='';
 	            }
 	            if($ks=="recipient_detail"){
 	                $waybill_data[$ks]['name']=$deliver_info['receive_address'];
 	            }
 	            if($ks=="recipient_phone"){
 	                $waybill_data[$ks]['name']=$deliver_info['receive_mobile'];
 	            }
 	            if($ks=="recipient_mobile"){
 	                $waybill_data[$ks]['name']=$deliver_info['receive_mobile'];
 	            }
 	            if($ks=="recipient_tel"){
 	               $waybill_data[$ks]['name']=$deliver_info['receive_mobile'];
 	            }
 	            if($ks=="recipient_note"){
 	                $waybill_data[$ks]['name']=$deliver_info['buyer_message'];
 	            }
 	            
 	            
 	            
 	             
 	            if($ks=="store_name"){
 	                $waybill_data[$ks]['name']=$deliver_info['buyer_message'];
 	            }
 	            if($ks=="goods_count"){
 	                $waybill_data[$ks]['name']=$stock_num;
 	            }
 	            if($ks=="sender_station"){
 	                $waybill_data[$ks]['name']=$deliver_info['sel_city'];
 	            }
 	            if($ks=="recipient_station"){
 	                $waybill_data[$ks]['name']=$deliver_info['receive_city'];
 	            }
 	            if($ks=="print_data"){
 	                $waybill_data[$ks]['name']=date("Y-m-d H:i:s",time());
 	            }
	             
	        }
	        
	        $waybill_data_js = $waybill_data;
	        //print_r($waybill_data);die;
	        $waybill_data_json = array();
	        if($waybill_data_js){
	            $num=0;
	            foreach ($waybill_data_js  as $k=>$v){
	               // $key = $k;
	                 foreach ($v as $ks=>$vs){
	                    if(stripos($ks,"-")){
	                        $ks = str_replace("-",'',$ks);
	                        $waybill_data_json[$num][$ks] = $vs;
	                    }
	                    $waybill_data_json[$num][$ks] = $vs;
	                }
	                $num++;
	            }
	        }
	        //print_r($waybill_data_json);die;
	        $img_url = base_url ('data/images/').$will_info['waybill_image'];
	        $this->smarty->assign('img',$img_url);
	        $this->smarty->assign('waybill_data_json',json_encode($waybill_data_json));
	        $this->smarty->assign('waybill_data',$waybill_data);
	        $this->smarty->display('waybill_print.html');
	    }else{
	        $print_data = '';
	        $store_info  = $this->db->select('s.bind_token_session,e.AppKey,e.AppSecret,e.ecs_code,s.ous_tel,s.bind_ecstore_name,s.store_name')->from('store s')
	        ->join('ecstore e','e.ecs_code=s.bind_ecstore_type')
	        ->where('s.bind_ecstore_type','2')->where('s.store_id',$_SESSION['shop_spg_store_id'])->get()->row_array();
	        $this->load->library('taobao_op');
	        $this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
	        //print_r($this->taobao_op->getCainiaoCloudprintStdtemplates($_SESSION['shop_spg_store_id']));die;//获取所有的菜鸟标准电子面单模板
	        $CainiaoWaybill = $this->taobao_op->searchCainiaoWaybill($waybill_apply_info['cp_code']);//电子面单订购关系查询
	        //print_r($CainiaoWaybill);die;
	        $waybill_apply_info['sender_info']['seller_name'] = !empty($store_info['bind_ecstore_name'])?$store_info['bind_ecstore_name']:$store_info['store_name'];
	        $waybill_apply_info['sender_info']['seller_mobile'] =$store_info['ous_tel'];
	        $waybill_apply_info['waybill_info']['allocated_quantity'] = '';//已使用面单数
	        $waybill_apply_info['waybill_info']['cancel_quantity'] = '';//取消的面单总数
	        $waybill_apply_info['waybill_info']['print_quantity'] = '';//已经打印的面单总数
	        $waybill_apply_info['waybill_info']['quantity'] = '';//电子面单余额数量
	        if($CainiaoWaybill['state']){
	            $waybill_apply_info['waybill_info']['allocated_quantity'] = $CainiaoWaybill['data']['branch_account_cols']['waybill_branch_account']['allocated_quantity'];//已使用面单数
	            $waybill_apply_info['waybill_info']['cancel_quantity'] = $CainiaoWaybill['data']['branch_account_cols']['waybill_branch_account']['cancel_quantity'];//取消的面单总数
	            $waybill_apply_info['waybill_info']['print_quantity'] = $CainiaoWaybill['data']['branch_account_cols']['waybill_branch_account']['print_quantity'];//已经打印的面单总数
	            $waybill_apply_info['waybill_info']['quantity'] = $CainiaoWaybill['data']['branch_account_cols']['waybill_branch_account']['quantity'];//电子面单余额数量
	            $waybill_apply_info['sender_address'] = $CainiaoWaybill['data']['branch_account_cols']['waybill_branch_account']['shipp_address_cols']['address_dto'];//当前网点下的发货地址
	        }else{
	            $this->common_function->show_message($CainiaoWaybill['msg']);exit;die;
	        }
	        //print_r($waybill_apply_info['sender_address']);die;
	        $getCainiaoWaybill = $this->taobao_op->getCainiaoWaybill($waybill_apply_info);
	        //print_r($getCainiaoWaybill);die;
                    //[signature] => MD:Z8ZIyAQGEddje8GVZtaLKQ==
                    //[templateURL] => http:cloudprint.cainiao.com/template/standard/201
                    //waybillCode 3336289148145
	        if($getCainiaoWaybill['state']){
	            $print_data = $getCainiaoWaybill['data'];
	            $this->smarty->assign('print_data',json_encode($print_data));
	        }else{
	            $this->common_function->show_message($getCainiaoWaybill['msg']);exit;die;
	        }
	        $this->smarty->display('waybill_print_rm.html');
	    }
	    
	}
	
	
	
	
	
	/*商品订单——打印发货单*/
	public function business_order_print(){
        $this->common_function->pay_role("seller_order_print_picklist");//权限
		$order_sn = $_GET['order_sn'];
		$this->db->select("so.order_sn,so.order_type,so.pay_type,so.order_status,so.store_id,so.store_name,so.spg_id,so.spg_name,so.buyer_nickname,so.buyer_id,so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,so.counpon_amount,so.integral_amount,so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,so.evaluation_state,so.evaluation_time,so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,so.created_time,so.end_time,so.buyer_message,so.buyer_memo,so.carriage,so.refund_state,so.refund,so.receive_name,so.receive_province,so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,so.receive_tel,so.receive_postcode,so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,so.pickup_code,");
		$this->db->from('shop_order so');
		$this->db->where('order_sn',$order_sn);
		$order = $this->db->get()->row_array();
		$this->db->select('sog.order_sn,sog.goods_id,sog.goods_name,sog.goods_image,sog.goods_num,sog.goods_size,sog.goods_price,sog.goods_pay_price,sog.user_id,sog.store_id,sog.activity_type,sog.promotions_id,sog.gc_id,sog.stock_code,sog.sotck_barcode,');
		$this->db->from('shop_order_goods as sog');
		$this->db->where('sog.order_sn',$order['order_sn']);
		$this->db->where('sog.order_sn',$order['order_sn']);
		$order['son'] = $this->db->get()->result_array();
		//var_dump($order);die;
		$this->smarty->assign('order',$order);
		$this->smarty->display ( 'business_order_print.html' );
	}
	/*商品订单——订单详情*/
	public function business_order_details(){
        $this->common_function->pay_role("seller_order_manage");//权限
		$order_sn = $_GET['order_sn'];
		$pay_type = array('1'=>'微信','2'=>'线下','3'=>'余额');
		$this->db->select("so.order_sn,so.pay_sn,so.order_from,so.order_type,s.ous_tel,so.store_name,so.shipping_type,
            so.pay_type,so.order_status,so.store_id,so.store_name,so.spg_id,so.spg_name,so.buyer_nickname,so.buyer_id,
            so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,so.counpon_amount,so.integral_amount,
            so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,so.evaluation_state,so.evaluation_time,
            so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,so.created_time,so.end_time,so.buyer_message,
            so.buyer_memo,so.carriage,so.refund_state,so.refund,so.receive_name,so.receive_province,
            so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,so.receive_tel,so.receive_postcode,
            so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,so.pickup_code,u.user_name,u.tel,
            a.area_name as province,b.area_name as city,c.area_name as area,");
		$this->db->from('shop_order so');
		$this->db->join('store s','s.store_id=so.store_id','left');
		$this->db->join('user u','u.user_id=so.buyer_id','left');
		$this->db->join('area a','a.area_id=so.receive_province','left');
		$this->db->join('area b','b.area_id=so.receive_city','left');
		$this->db->join('area c','c.area_id=so.receive_area','left');
		$this->db->where('so.order_sn',$order_sn);
		$order = $this->db->get()->row_array();
		if($order['pay_time'] != 0){
			$order['pay_time'] = date('Y-m-d H:i:s',$order['pay_time']);
		}
		if($order['created_time'] != 0){
			$order['created_time'] = date('Y-m-d H:i:s',$order['created_time']);
		}
		if($order['end_time'] != 0){
			$order['end_time'] = date('Y-m-d H:i:s',$order['end_time']);
		}
		if($order['receive_time'] != 0){
			$order['receive_time'] = date('Y-m-d H:i:s',$order['receive_time']);
		}
		if($order['evaluation_time'] != 0){
			$order['evaluation_time'] = date('Y-m-d H:i:s',$order['evaluation_time']);
		}
		if($order['pay_type'] != 0){
			$order['pay_type'] = array_key_exists($order['pay_type'], $pay_type)!==false ? $pay_type[$order['pay_type']] : '其他';
		}
		if(empty($order['receive_name'])){
			$order['receive_name'] = $order['user_name'];
		}
		if(empty($order['receive_mobile'])){
			$order['receive_mobile'] = $order['tel'];
		}
		$order_from = $this->business_model->order_from();
		$order['order_type_'] = $order_from[$order['order_from']];
		$shipping_type = $this->business_model->shipping_type();
		$order['shipping'] = $shipping_type[$order['shipping_type']];
		$order['pay_log'] = $this->db->select('*')->where('pay_sn',$order['pay_sn'])->get('shop_order_pay')->result_array();
		$mtcn_type = $this->business_model->mtcn_type();
		foreach ($order['pay_log'] as $k=>$v){
			$order['pay_log'][$k]['pay_type'] = $mtcn_type[$v['mtcn_type']];
			$order['pay_log'][$k]['mtcn_sn'] = empty($v['mtcn_sn'])?'--':$v['mtcn_sn'];
		}
		$order['delivery_date'] = empty($order['delivery_time'])?'':date('Y-m-d H:i:s',$order['delivery_time']);
		$this->db->select('sog.order_sn,sog.goods_id,sog.goods_name,sog.goods_image,sog.goods_num,sog.goods_size,sog.goods_price,sog.goods_pay_price,sog.user_id,sog.store_id,sog.activity_type,sog.promotions_id,sog.gc_id,sog.stock_code,sog.sotck_barcode,sog.goods_ea_id');
		$this->db->from('shop_order_goods as sog');
		$this->db->where('sog.order_sn',$order['order_sn']);
		$order['son'] = $this->db->get()->result_array();
		//var_dump($order);die;
		$this->smarty->assign('order',$order);
		$defaultImg = $this->common_function->get_system_value('default_goods_image');
		$this->smarty->assign('defaultImg',$defaultImg);
		$this->smarty->display ( 'business_order_details.html' );
	}
	public function waybill_sn_change(){
        $this->common_function->pay_role("seller_order_manage");//权限
		$order_sn = isset($_POST['data']['order_sn'])?$_POST['data']['order_sn']:'';
		$waybill_sn = isset($_POST['waybill_sn'])?$_POST['waybill_sn']:'';
		$result = array('state'=>false,'msg'=>'操作错误');
		if($order_sn&&$waybill_sn){
			$this->db->update('shop_order',array('modify_time'=>time(),'waybill_sn'=>$waybill_sn),array('order_sn'=>$order_sn));
			$result = array('state'=>true,'msg'=>'修改成功');
		}
		echo json_encode($result);exit;
		//print_r($_POST);
	}
	public function send(){
        $this->common_function->pay_role("seller_order_delivery");//权限
		$user_id = $_SESSION['shop_spg_store_id'];
		$order_sn = isset($_POST['data']['order_sn'])?$_POST['data']['order_sn']:'';
		$rec_id = isset($_POST['data']['rec_id'])?$_POST['data']['rec_id']:'';
		$waybill_sn = isset($_POST['waybill_sn'])?$_POST['waybill_sn']:'';
		$true_goods_num = isset($_POST['true_goods_num'])?$_POST['true_goods_num']:'';
		//print_r($_POST);die;
		$result = array('state'=>false,'msg'=>'操作错误');
		if($true_goods_num>0&&empty($waybill_sn)){
			$result = array('state'=>false,'msg'=>'运单号必填');
			echo json_encode($result);exit;
		}
		if($true_goods_num<0){
			echo json_encode($result);exit;
		}
		if($order_sn){
			//print_r($_POST);die;
			$order_storeInfo = $this->db->select('order_take_percentage,store_name,balance')->where('store_id',$user_id)->get('store')->row_array();
			$rebate_arr = empty($order_storeInfo['order_take_percentage'])?0:unserialize($order_storeInfo['order_take_percentage']);
			$order_info = $this->db->select('o.*')->from('shop_order o')->where('o.order_sn',$order_sn)->get()->row_array();
			$buyer_id = $order_info['buyer_id'];
			if($order_info['order_type']==1){
				$rebate = empty($rebate_arr)?0:$rebate_arr['agent'];
			}elseif($order_info['order_type']==2){
				$rebate = empty($rebate_arr)?0:$rebate_arr['system'];
			}elseif($order_info['order_type']==3){
				if(in_array($order_info['order_from'],array(44,45,46))){
					$rebate = empty($rebate_arr)?0:$rebate_arr['online'];
				}else{
					$rebate = 0;
				}
			}elseif($order_info['order_type']==4){
				$rebate = empty($rebate_arr)?0:$rebate_arr['offline'];
			}
			$order_goods_other = $this->db->select('g.*')->from('shop_order_goods g')->where('g.order_sn',$order_sn)->where('g.rec_id!='.$rec_id)->get()->result_array();
			$order_goods_this = $this->db->select('g.*')->from('shop_order_goods g')->where('g.order_sn',$order_sn)->where('g.rec_id',$rec_id)->get()->row_array();
			$sql_order_in = array();$sql_order_up = array();$sql_goods_in = array();$sql_goods_up = array();$sql_order_log = array();$sql_amount_up = array();
			$rebate_amount = 0;$goods_price = 0;$return_price = 0;$order_price = 0;
			$time = time();$send_flag = true;$return_order_sn = '';
			if(empty($order_goods_other)){
				if($true_goods_num==0){
					$sql_order = array(
							'order_status'=>0,'carriage'=>$order_info['create_carriage'],'delivery_time'=>$time,'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,
							'modify_time'=>$time,'order_sn'=>$order_info['order_sn'],
					);
					$sql_order_up[] = $sql_order;
					$sql_log = array();
					$sql_log['order_sn'] = $order_sn;
					$sql_log['log_msg'] = '订单发货数量为0取消订单';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 0;
					$sql_order_log[] = $sql_log;
					$return_price = $order_goods_this['goods_pay_price']*$order_goods_this['goods_num']+$order_info['create_carriage'];
					$return_order_sn = $order_sn;
				}elseif($order_goods_this['goods_num']==$true_goods_num){
					$send_flag = false;
					$rebate_amount =$rebate*$order_info['goods_price'];
					$goods_price = $order_info['goods_price'];$order_price = $order_info['order_price'];
					$sql_order = array(
							'order_status'=>30,'carriage'=>$order_info['create_carriage'],'delivery_time'=>$time,'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,
							'rebate'=>$rebate,'rebate_amount'=>$rebate_amount,'order_sn'=>$order_sn,'modify_time'=>$time
					);
					$sql_order_up[] = $sql_order;
					$sql_goods = array(
							'express_sn'=>$waybill_sn,'shipping_status'=>1,'rec_id'=>$order_goods_this['rec_id']
					);
					$sql_goods_up[] = $sql_goods;
					$sql_log = array();
					$sql_log['order_sn'] = $order_sn;
					$sql_log['log_msg'] = '订单发货';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 30;
					$sql_order_log[] = $sql_log;
				}else{//只有一个货,单发且部分发货
					//$order_info = $this->db->select('o.*')->from('shop_order o')->where('o.order_sn',$order_sn)->get()->row_array();
					$amount = $order_info['goods_price']*$true_goods_num/$order_info['goods_num'];
					$return_price = $order_info['goods_price']-$amount;
					$rebate_amount =$amount*$rebate;
					$goods_price = $amount; $order_price = $goods_price+$order_info['create_carriage'];
					$sql_order1 = array(
							'order_sn'=>$order_sn,'order_price'=>$amount+$order_info['create_carriage'],'goods_num'=>$true_goods_num,'goods_price'=>$amount,
							'pd_amount'=>$amount+$order_info['create_carriage'],'rebate'=>$rebate,'rebate_amount'=>$rebate_amount,'modify_time'=>$time,
							'order_status'=>30,'carriage'=>$order_info['create_carriage'],'delivery_time'=>$time,'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,
					);
					$sql_order_up[] = $sql_order1;
					$sql_goods1 = array(
							'goods_num'=>$true_goods_num,'express_sn'=>$waybill_sn,'shipping_status'=>1,'rec_id'=>$order_goods_this['rec_id']
					);
					$sql_goods_up[] = $sql_goods1;
					$sql_log = array();
					$sql_log['order_sn'] = $order_sn;
					$sql_log['log_msg'] = '订单部分发货拆单';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 30;
					$sql_order_log[] = $sql_log;
					//不发货部分重新生成取消了的订单
					$sql_order2 = $order_info;$sql_goods2 = $order_goods_this;unset($sql_goods2['rec_id']);
					$sql_order2['order_sn'] = $this->common_function->produce_order_sn($buyer_id);
					$sql_order2['order_price'] = $return_price;$sql_order2['goods_num'] = $order_goods_this['goods_num']-$true_goods_num;
					$sql_order2['goods_price'] = $return_price;$sql_order2['pd_amount'] = $return_price;
					$sql_order2['order_status'] = 0;$sql_order2['create_carriage'] = 0;$sql_order2['modify_time'] = $time;
					$sql_order_in[] = $sql_order2;
					$sql_goods2['goods_num'] = $order_goods_this['goods_num']-$true_goods_num;$sql_goods2['order_sn'] = $sql_order2['order_sn'];
					$sql_goods_in[] = $sql_goods2;
					$sql_log = array();
					$sql_log['order_sn'] = $sql_order2['order_sn'];
					$sql_log['log_msg'] = '订单'.$order_sn.'不发货部分重新生成';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 0;
					$sql_order_log[] = $sql_log;
					$return_order_sn = $sql_order2['order_sn'];
				}
			}else{

				if($order_goods_this['goods_num']==$true_goods_num){//多个货 单发这个全发
					$goods_price = $order_goods_this['goods_pay_price']*$order_goods_this['goods_num'];
					$order_goods_other_all = $this->db->select('count(1) as num')->from('shop_order_goods g')->where('g.order_sn',$order_sn)->where('g.rec_id!='.$rec_id)->where('g.shipping_status!=1')->get()->row('num');
					$order_goods_other_first = $this->db->select('count(1) as num')->from('shop_order_goods g')->where('g.order_sn',$order_sn)->where('g.shipping_status=1')->get()->row('num');	
					//print_r($order_goods_other);print_r($this->db->last_query());die;
					if($order_goods_other_all==0){
						$order_status = 30;
					}else{
						$order_status = 31;
					}
					if($order_goods_other_first==0){
						$order_price = $goods_price+$order_info['create_carriage'];
					}else{
						$order_price = $goods_price;
					}
					//$order_info = $this->db->select('o.*')->from('shop_order o')->where('o.order_sn',$order_sn)->get()->row_array();
					
					//$return_price = $order_info['goods_price']-$goods_price;
					$send_flag = false;
					$rebate_amount =$rebate*$goods_price;
					$sql_order = array(
							'order_status'=>$order_status,'carriage'=>$order_info['create_carriage'],'delivery_time'=>$time,'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,
							'rebate'=>$rebate,'rebate_amount'=>$rebate_amount+$order_info['rebate_amount'],'order_sn'=>$order_sn,'modify_time'=>$time
					);
					$sql_order_up[] = $sql_order;
					$sql_goods = array(
							'express_sn'=>$waybill_sn,'shipping_status'=>1,'rec_id'=>$order_goods_this['rec_id']
					);
					$sql_goods_up[] = $sql_goods;
					$sql_log = array();
					$sql_log['order_sn'] = $order_sn;
					$sql_log['log_msg'] = '订单发货';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = $order_status;
					$sql_order_log[] = $sql_log;
					/*$sql_order2 = $order_info;
					$sql_order2['order_sn'] = $this->common_function->produce_order_sn($user_id);
					$sql_order2['order_price'] = $return_price;$sql_order2['goods_num'] = $order_info['goods_num']-$true_goods_num;
					$sql_order2['goods_price'] = $return_price;$sql_order2['pd_amount'] = $return_price;
					$sql_order2['order_status'] = 0;$sql_order2['create_carriage'] = 0;$sql_order2['modify_time'] = $time;
					$sql_order_in[] = $sql_order2;
					foreach ($order_goods_other as $k=>$v){
						$sql_goods2 = array();
						$sql_goods2['order_sn'] = $sql_order2['order_sn'];$sql_goods2['rec_id'] = $v['rec_id'];
						$sql_goods_up[] = $sql_goods2;
					}
					$sql_log = array();
					$sql_log['order_sn'] = $sql_order2['order_sn'];
					$sql_log['log_msg'] = '订单'.$order_sn.'不发货部分重新生成';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 0;
					$sql_order_log[] = $sql_log;*/
				}else{//多个货 单发这个部分发
					//$order_info = $this->db->select('o.*')->from('shop_order o')->where('o.order_sn',$order_sn)->get()->row_array();
					$goods_price = $order_goods_this['goods_pay_price']*$true_goods_num;
					$order_goods_other_all = $this->db->select('count(1) as num')->from('shop_order_goods g')->where('g.order_sn',$order_sn)->where('g.rec_id!='.$rec_id)->where('g.shipping_status!=1')->get()->row('num');
					$order_goods_other_first = $this->db->select('count(1) as num')->from('shop_order_goods g')->where('g.order_sn',$order_sn)->where('g.shipping_status=1')->get()->row('num');
					//print_r($order_goods_other);print_r($this->db->last_query());die;
					if($order_goods_other_all==0){
						$order_status = 30;
					}else{
						if($true_goods_num>0){
							$order_status = 31;
						}else{
							$order_status = $order_info['order_status'];
						}
					}
					if($order_goods_other_first==0&&$true_goods_num>0){
						$order_price = $goods_price+$order_info['create_carriage'];
					}else{
						$order_price = $goods_price;
					}
					$return_price = $order_goods_this['goods_pay_price']*($order_goods_this['goods_num']-$true_goods_num);
					$rebate_amount =$rebate*$goods_price;
					$sql_order = array(
							'order_status'=>$order_status,'carriage'=>$order_info['create_carriage'],'delivery_time'=>$time,'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,
							'rebate'=>$rebate,'rebate_amount'=>$rebate_amount+$order_info['rebate_amount'],'order_sn'=>$order_sn,'goods_num'=>$order_info['goods_num']-($order_goods_this['goods_num']-$true_goods_num),
							'modify_time'=>$time,'order_price'=>$order_info['order_price']-$return_price,'goods_price'=>$order_info['goods_price']-$return_price,'pd_amount'=>$order_info['pd_amount']-$return_price,
					);
					$sql_order_up[] = $sql_order;
					if($true_goods_num>0){
						$sql_goods = array(
								'rec_id' => $order_goods_this['rec_id'],'goods_num' => $true_goods_num,'express_sn'=>$waybill_sn,'shipping_status'=>1,
						);
						$sql_goods_up[] = $sql_goods;
						
					}
					$sql_log = array();
					$sql_log['order_sn'] = $order_sn;
					$sql_log['log_msg'] = '订单部分发货';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = $order_status;
					$sql_order_log[] = $sql_log;
					$sql_order2 = $order_info;
					$sql_order2['order_sn'] = $this->common_function->produce_order_sn($buyer_id);
					$sql_order2['order_price'] = $return_price;$sql_order2['goods_num'] = $order_goods_this['goods_num']-$true_goods_num;
					$sql_order2['goods_price'] = $return_price;$sql_order2['pd_amount'] = $return_price;
					$sql_order2['order_status'] = 0;$sql_order2['create_carriage'] = 0;$sql_order2['carriage'] = 0;$sql_order2['modify_time'] = $time;
					$sql_order_in[] = $sql_order2;
					$sql_goods1 = $order_goods_this;$sql_goods1['order_sn'] = $sql_order2['order_sn'];
					$sql_goods1['goods_num'] = $order_goods_this['goods_num']-$true_goods_num;
					if($true_goods_num==0){
						$sql_goods0 = array(
							'rec_id' => $order_goods_this['rec_id'],'goods_num' => $order_goods_this['goods_num']-$true_goods_num,'express_sn'=>$waybill_sn,'order_sn'=>$sql_order2['order_sn'],
					    );
						$sql_goods_up[] = $sql_goods0;
						$order_sn = $sql_order2['order_sn'];
					}else{
						unset($sql_goods1['rec_id']);
						$sql_goods_in[] = $sql_goods1;
					}
					
					/* foreach ($order_goods_other as $k=>$v){
						$sql_goods2 = array();
						$sql_goods2['order_sn'] = $sql_order2['order_sn'];$sql_goods2['rec_id'] = $v['rec_id'];
						$sql_goods_up[] = $sql_goods2;
					} */
					$sql_log = array();
					$sql_log['order_sn'] = $sql_order2['order_sn'];
					$sql_log['log_msg'] = '订单'.$order_sn.'不发货部分重新生成';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 0;
					$sql_order_log[] = $sql_log;
					$return_order_sn = $sql_order2['order_sn'];
				}
				
					
			}
			
			
			/*if(empty($order_goods_other)){
				if($order_goods_this['goods_num']==$true_goods_num){//只有一个货,单发且全部发货
					$send_flag = false;
					$rebate_amount =$rebate*$order_info['goods_price'];
					$goods_price = ($order_info['goods_price']-$rebate*$order_info['goods_price']);
					$sql_order = array(
						'order_status'=>30,'carriage'=>$order_info['create_carriage'],'delivery_time'=>$time,'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,	
						'rebate'=>$rebate,'rebate_amount'=>$rebate_amount,'order_sn'=>$order_sn
					);
					$sql_order_up[] = $sql_order;
					$sql_log = array();
					$sql_log['order_sn'] = $order_sn;
					$sql_log['log_msg'] = '订单发货';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 30;
					$sql_order_log[] = $sql_log;
				}else{//只有一个货,单发且部分发货
					//$order_info = $this->db->select('o.*')->from('shop_order o')->where('o.order_sn',$order_sn)->get()->row_array();
					$amount = $order_info['goods_price']*$true_goods_num/$order_info['goods_num'];
					$return_price = $order_info['goods_price']-$amount;
					$rebate_amount =$amount*$rebate;
					$goods_price = $amount; 
					$sql_order1 = array(
							'order_sn'=>$order_sn,'order_price'=>$amount+$order_info['create_carriage'],'goods_num'=>$true_goods_num,'goods_price'=>$amount,
							'pd_amount'=>$amount+$order_info['create_carriage'],'rebate'=>$rebate,'rebate_amount'=>$rebate_amount,
							'order_status'=>30,'carriage'=>$order_info['create_carriage'],'delivery_time'=>$time,'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,
					);
					$sql_order_up[] = $sql_order1;
					$sql_goods1 = array(
							'goods_num'=>$true_goods_num,
					);
					$sql_goods_up[] = $sql_goods1;
					$sql_log = array();
					$sql_log['order_sn'] = $order_sn;
					$sql_log['log_msg'] = '订单部分发货拆单';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 30;
					$sql_order_log[] = $sql_log;
					//不发货部分重新生成取消了的订单
					$sql_order2 = $order_info;$sql_goods2 = $order_goods_this;unset($sql_goods2['rec_id']);
					$sql_order2['order_sn'] = $this->common_function->produce_order_sn($user_id);
					$sql_order2['order_price'] = $return_price;$sql_order2['goods_num'] = $order_goods_this['goods_num']-$true_goods_num;
					$sql_order2['goods_price'] = $return_price;$sql_order2['pd_amount'] = $return_price;
					$sql_order2['order_status'] = 0;$sql_order2['create_carriage'] = 0;$sql_order2['modify_time'] = $time;
					$sql_order_in[] = $sql_order2;
					$sql_goods2['goods_num'] = $order_goods_this['goods_num']-$true_goods_num;$sql_goods2['order_sn'] = $sql_order2['order_sn'];
					$sql_goods_in[] = $sql_goods2;
					$sql_log = array();
					$sql_log['order_sn'] = $sql_order2['order_sn'];
					$sql_log['log_msg'] = '订单'.$order_sn.'不发货部分重新生成';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 0;
					$sql_order_log[] = $sql_log;
				}
			}else{
				if($order_goods_this['goods_num']==$true_goods_num){//多个货 单发这个全发
					//$order_info = $this->db->select('o.*')->from('shop_order o')->where('o.order_sn',$order_sn)->get()->row_array();
					$goods_price = $order_goods_this['goods_pay_price']*$order_goods_this['goods_num'];
					$return_price = $order_info['goods_price']-$goods_price;
					$rebate_amount =$rebate*$goods_price;
					$sql_order = array(
							'order_status'=>30,'carriage'=>$order_info['create_carriage'],'delivery_time'=>$time,'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,
							'rebate'=>$rebate,'rebate_amount'=>$rebate_amount,'order_sn'=>$order_sn,'goods_num'=>$true_goods_num
					);
					$sql_order_up[] = $sql_order;
					$sql_log = array();
					$sql_log['order_sn'] = $order_sn;
					$sql_log['log_msg'] = '订单发货';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 30;
					$sql_order_log[] = $sql_log;
					$sql_order2 = $order_info;
					$sql_order2['order_sn'] = $this->common_function->produce_order_sn($user_id);
					$sql_order2['order_price'] = $return_price;$sql_order2['goods_num'] = $order_info['goods_num']-$true_goods_num;
					$sql_order2['goods_price'] = $return_price;$sql_order2['pd_amount'] = $return_price;
					$sql_order2['order_status'] = 0;$sql_order2['create_carriage'] = 0;$sql_order2['modify_time'] = $time;
					$sql_order_in[] = $sql_order2;
					foreach ($order_goods_other as $k=>$v){
						$sql_goods2 = array();
						$sql_goods2['order_sn'] = $sql_order2['order_sn'];$sql_goods2['rec_id'] = $v['rec_id'];
						$sql_goods_up[] = $sql_goods2;
					}
					$sql_log = array();
					$sql_log['order_sn'] = $sql_order2['order_sn'];
					$sql_log['log_msg'] = '订单'.$order_sn.'不发货部分重新生成';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 0;
					$sql_order_log[] = $sql_log;
				}else{//多个货 单发这个部分发
					//$order_info = $this->db->select('o.*')->from('shop_order o')->where('o.order_sn',$order_sn)->get()->row_array();
					$goods_price = $order_goods_this['goods_pay_price']*$true_goods_num;
					$return_price = $order_info['goods_price']-$goods_price;
					$rebate_amount =$rebate*$goods_price;
					$sql_order = array(
							'order_status'=>30,'carriage'=>$order_info['create_carriage'],'delivery_time'=>$time,'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,
							'rebate'=>$rebate,'rebate_amount'=>$rebate_amount,'order_sn'=>$order_sn,'goods_num'=>$true_goods_num
					);
					$sql_order_up[] = $sql_order;
					$sql_goods = array(
							'rec_id' => $order_goods_this['rec_id'],'goods_num' => $true_goods_num
					);
					$sql_goods_up[] = $sql_goods;
					$sql_log = array();
					$sql_log['order_sn'] = $order_sn;
					$sql_log['log_msg'] = '订单发货';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 30;
					$sql_order_log[] = $sql_log;
					$sql_order2 = $order_info;
					$sql_order2['order_sn'] = $this->common_function->produce_order_sn($user_id);
					$sql_order2['order_price'] = $return_price;$sql_order2['goods_num'] = $order_info['goods_num']-$true_goods_num;
					$sql_order2['goods_price'] = $return_price;$sql_order2['pd_amount'] = $return_price;
					$sql_order2['order_status'] = 0;$sql_order2['create_carriage'] = 0;$sql_order2['modify_time'] = $time;
					$sql_order_in[] = $sql_order2;
					$sql_goods1 = $order_goods_this;unset($sql_goods1['rec_id']);$sql_goods1['order_sn'] = $sql_order2['order_sn'];
					$sql_goods1['goods_num'] = $order_goods_this['goods_num']-$true_goods_num;
					$sql_goods_in[] = $sql_goods1;
					foreach ($order_goods_other as $k=>$v){
						$sql_goods2 = array();
						$sql_goods2['order_sn'] = $sql_order2['order_sn'];$sql_goods2['rec_id'] = $v['rec_id'];
						$sql_goods_up[] = $sql_goods2;
					}
					$sql_log = array();
					$sql_log['order_sn'] = $sql_order2['order_sn'];
					$sql_log['log_msg'] = '订单'.$order_sn.'不发货部分重新生成';
					$sql_log['log_time'] = $time;
					$sql_log['log_role'] = '导购';
					$sql_log['log_user'] = $_SESSION['shop_spg_id'];
					$sql_log['log_orderstate'] = 0;
					$sql_order_log[] = $sql_log;
				}
				
			}*/
			//库存修改
			if($true_goods_num>0){
				$ssa_info = $this->db->select('ssa_id,amount')->where('goods_ea_id',$order_goods_this['goods_ea_id'])->where('ssa_store_id',$user_id)->get('store_stocks_amount')->row_array();
				if(!empty($ssa_info)){
					$ssa_amount = ($ssa_info['amount']-$true_goods_num)>=0?($ssa_info['amount']-$true_goods_num):0;
					$sql_amount = array('ssa_id'=>$ssa_info['ssa_id'],'amount'=>$ssa_amount,'update_time'=>$time,'update_user_type'=>2,
							'update_user_id'=>$_SESSION['shop_spg_id'],'update_user_name'=>$_SESSION['shop_spg_name']);
					$sql_amount_up[] = $sql_amount;
				}
				
			}
			//print_r($sql_amount_up);die;
			$user_amount = $order_price-$rebate_amount;
			$return_amount = $return_price;
			if(in_array($order_info['order_from'],array(41,42,43))){
				$buyer_storeInfo = $this->db->select('store_name,balance')->where('store_id',$order_info['buyer_id'])->get('store')->row_array();
				$buyer_type = 2;
			}
			if(in_array($order_info['order_from'],array(1,21,22))){
				$buyer_storeInfo = $this->db->select('user_name,balance')->where('user_id',$order_info['buyer_id'])->get('user')->row_array();
				$buyer_type = 1;
			}
			if($order_info['buyer_id']==$user_id){
				$user_amount = 0;$return_amount=0;
			}
			$sql_user = array('balance'=>$order_storeInfo['balance']+$user_amount);
		    $this->db->trans_begin(); //开启事物
		    //$sql_order_in = array();$sql_order_up = array();$sql_goods_in = array();$sql_goods_up = array();$sql_order_log = array();$sql_amount_up = array();
		    if(!empty($sql_order_in)){
		    	$this->db->insert_batch('shop_order',$sql_order_in);//订单
		    }
		    //print_r($sql_order_up);die;
		    if(!empty($sql_order_up)){
		    	$this->db->update_batch('shop_order',$sql_order_up,'order_sn');//订单
		    }
		    if(!empty($sql_goods_in)){
		    	$this->db->insert_batch('shop_order_goods',$sql_goods_in);//订单
		    }
		    if(!empty($sql_goods_up)){
		    	$this->db->update_batch('shop_order_goods',$sql_goods_up,'rec_id');//订单
		    }
		    if(!empty($sql_order_log)){
		    	$this->db->insert_batch('shop_order_log',$sql_order_log);//订单
		    }
		    if(!empty($sql_amount_up)){
		    	$this->db->update_batch('store_stocks_amount',$sql_amount_up,'ssa_id');//订单
		    }
		    $this->db->update('store',$sql_user,array('store_id'=>$user_id));
		    
		    $add_user_log_sql ="insert into ".$this->db->dbprefix('store_asset_log')."
	            (store_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	            values({$user_id},'{$order_info['pay_sn']}',3,0,'{$user_amount}',
	            (select balance from ".$this->db->dbprefix('store').
	            " u where u.store_id={$user_id}),'订单{$order_sn}发货收入{$user_amount}',{$time})"; //增加门店资金金额日志
            $add_plat_log_sql ="insert into ".$this->db->dbprefix('sys_asset_account')."
                (user_id,pay_sn,order_sn,log_type,asset_out,asset_in,asset,note,time)
                values({$user_id},'{$order_info['pay_sn']}','{$order_sn}',5,{$user_amount},0,
                (select (ifnull(asset, 0)-{$user_amount}) from ".$this->db->dbprefix('sys_asset_account')." p order by p.paa_id DESC limit 0,1),
                '订单{$order_sn}发货支出{$user_amount}',{$time})"; //增加平台资金金额日志    
            $this->db->query($add_user_log_sql);
            $this->db->query($add_plat_log_sql);
		    if($send_flag){//退款不发货部分
		    	$sql_buyer = array('balance'=>$buyer_storeInfo['balance']+$return_amount);
		    	if($buyer_type==2){
		    		$this->db->update('store',$sql_buyer,array('store_id'=>$order_info['buyer_id']));
		    		$return_user_log_sql ="insert into ".$this->db->dbprefix('store_asset_log')."
		    		(store_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
		    		values({$order_info['buyer_id']},'{$order_info['pay_sn']}',4,0,'{$return_amount}',
		    		(select balance from ".$this->db->dbprefix('store').
		    		" u where u.store_id={$order_info['buyer_id']}),'订单{$return_order_sn}未发货退款收入{$return_amount}',{$time})"; //增加门店资金金额日志
		    	}elseif($buyer_type==1){
		    		$this->db->update('user',$sql_buyer,array('user_id'=>$order_info['buyer_id']));
		    		$return_user_log_sql ="insert into ".$this->db->dbprefix('user_asset_log')."
		    		(user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
		    		values({$order_info['buyer_id']},'{$order_info['pay_sn']}',4,0,'{$return_amount}',
		    		(select balance from ".$this->db->dbprefix('user').
		    		" u where u.user_id={$order_info['buyer_id']}),'订单{$return_order_sn}未发货退款收入{$return_amount}',{$time})"; //增加门店资金金额日志
		    	}
		    	
               $return_plat_log_sql ="insert into ".$this->db->dbprefix('sys_asset_account')."
	                (user_id,pay_sn,order_sn,log_type,asset_out,asset_in,asset,note,time)
	                values({$order_info['buyer_id']},'{$order_info['pay_sn']}','{$return_order_sn}',6,{$return_amount},0,
	                (select (ifnull(asset, 0)-{$return_amount}) from ".$this->db->dbprefix('sys_asset_account')." p order by p.paa_id DESC limit 0,1),
	                '订单{$return_order_sn}未发货退款支出{$return_amount}',{$time})"; //增加平台资金金额日志    
               $this->db->query($return_user_log_sql);
               $this->db->query($return_plat_log_sql);
		    }
		 	if ($this->db->trans_status() === FALSE) {
		 		$this->db->trans_rollback();
		 		$error_msg = "订单发货失败。";
		 		$result['msg'] = $error_msg;
		 	}else{
		 		$this->db->trans_commit();

		 		//物流公司名称
		 		$e_name = $this->db->from('express')->where('e_code',$order_info['create_express'])->get()->row('e_name');
                //微信模板消息
		 		$wx_data = array(
                    "first"=>array("value"=>"亲，宝贝已经启程了，好想快点来到你身边",
                        "color"=>"#173177"
                    ),
                    "delivername"=>array("value"=>"{$e_name}"."\n",
                        "color"=>"#173177"
                    ),
                    "ordername"=>array("value"=>"{$waybill_sn}"."\n",
                        "color"=>"#173177"
                    ),
                    "remark"=>array("value"=>"备注：如有问题请联系导购。",
                        "color"=>"#173177"
                    )
                );
                $wx_code = "SPYFH";
//yu
               if(!empty($sql_goods_up)){

					$check = $this->db->where('store_id', $_SESSION['shop_spg_store_id'])->from('store')->get()->row('is_send_sms');

                    if ($check) {
                        //短信内容
						$GOODS_NAME = $this->db->from('shop_order_goods')->where('order_sn',$order_sn)->limit(1)->get()->row('goods_name');
					    $goods_id= $this->db->from('shop_order_goods')->where('order_sn',$order_sn)->limit(1)->get()->row('goods_id');
						$USER_NAME = $order_info['receive_name'];
						$BRAND_NAME=$BRAND_NAME = $this->db->select('brand_name')->
						where('goods_id =',$goods_id)->get('shop_goods')->row('brand_name');
						$USER_NAME=isset($USER_NAME)?$USER_NAME:'用户';
						$STORE_NAME=isset($STORE_NAME)?$STORE_NAME:'本店';
						$BRAND_NAME=isset($BRAND_NAME)?$BRAND_NAME:'';
						$GOODS_NAME=isset($GOODS_NAME)?$GOODS_NAME:'商品';
						$arr=array('{$USER_NAME}'=>$USER_NAME,'{$STORE_NAME}'=>$STORE_NAME,'{$BRAND_NAME}'=>$BRAND_NAME,'{$GOODS_NAME}'=>$GOODS_NAME);
						$res = $this->db->select('template_id,template_content')->where('template_code','fhtz')->get('sms_templates')->row_array();
						$content=$this->common_function->make_send_content($res['template_content'],$arr);
                    }
                    //订单号
                    $order_sn = $order_info['order_sn'];
                    //微信模板消息跳转url
					$tel=$order_info['receive_mobile'];

                    $url = base_url('vmall.php/order/order_detail?order_sn=').$order_sn;

                   $aaa= $this->common_function->send_msg($wx_data, $wx_code, $tel, $content, $url, $order_sn,$res['template_id']);

                  var_dump($aaa);


				}



		 		$result['state'] = true;$result['msg'] = '订单发货成功';
		 		$this->common_function->insertUserLog('订单发货', 1, 3, 'add');
		 	}

			//print_r($order_goods_other);print_r($order_goods_this);die;
		}
		echo json_encode($result);exit;
		//print_r($_POST);
	}
    //订单导出 配货
    public function orderOp() {
        $where = 'o.store_id= '.$_SESSION['shop_spg_store_id'];
        //$where="1=1";
        if (!empty($_POST['id'])) {
            $id_str = $_POST['id'];
            $where .= " and o.order_sn in ($id_str)";
        }else{
            if(!empty($_GET['startime'])){
                $where .= " AND o.created_time>= ".strtotime($_GET['startime']);
            }
            if(!empty($_GET['endtime'])){
                $where .= " AND o.created_time<= ".strtotime($_GET['endtime']);
            }
            if($_GET['order_type']!=''){
                $where .= " AND o.order_status= ".$_GET['order_type'];
            }
            if(!empty($_GET['stocks_sn'])){
                $where .= " AND og.stock_code like '%{$_GET['order_sn']}%'";
            }
            if(!empty($_GET['goods_spu'])){
                $where .= " AND g.goods_spu  like '%{$_GET['goods_spu']}%'";
            }
            if(!empty($_GET['pay_sn'])){
                $where .= " AND o.pay_sn like '%{$_GET['pay_sn']}%'";
            }
            if(!empty($_GET['buyer'])){
                $where .= " AND (u.user_name  like '%{$_GET['buyer']}%' or o.receive_name  like '%{$_GET['buyer']}%')";
            }
            if(!empty($_GET['express_type'])){
                $where .= " AND (o.create_express  like '%{$_GET['express_type']}%' or o.logistics_company_name  like '%{$_GET['express_type']}%')";
            }
            if(!empty($_GET['buyer_tel'])){
                $where .= " AND (o.receive_mobile  like '%{$_GET['buyer_tel']}%' or s.ous_tel  like '%{$_GET['buyer_tel']}%')";
            }
            if(!empty($_GET['order_sn'])){
                $where .= " AND o.order_sn like '%{$_GET['order_sn']}%'";
            }

        }
        $rows = $this->db->select("o.order_sn,o.waybill_sn,o.logistics_company_name,o.create_express,o.receive_postcode,o.receive_tel,
					o.receive_mobile,o.receive_address,o.receive_area,o.receive_city,o.receive_province,o.receive_name,o.carriage,
					o.create_carriage,o.buyer_memo,o.seller_note,o.buyer_message,o.created_time,o.modify_time,o.goods_price,o.order_type,
					o.goods_num,o.order_price,o.shipping_type,o.buyer_id,o.store_id,o.order_status,og.rec_id,og.goods_id,og.goods_name,og.goods_num,og.goods_color
					,og.goods_color_remark,og.goods_size,og.goods_pay_price,og.stock_code,og.sotck_barcode,g.goods_spu,g.brand_name,
				s.store_name as u_store_name,u.user_name as u_user_name,s.ous_tel as u_ous_tel,u.tel as u_tel,a.area_name,b.area_name as city_name,
				c.area_name as province_name,e.e_name")
            ->from('shop_order o')
            ->join('shop_order_goods og','og.order_sn=o.order_sn')
            ->join('express e','e.e_code=o.create_express','left')
            ->join('area a','a.area_id=o.receive_area','left')
            ->join('area b','b.area_id=o.receive_city','left')
            ->join('area c','c.area_id=o.receive_province','left')
            ->join('shop_goods g','g.goods_id=og.goods_id','left')
            ->join('store s','s.store_id=o.buyer_id and o.order_type=3','left')
            ->join('user u','u.user_id=o.buyer_id and o.order_type IN (2,4)','left')
            ->where($where)
            ->get()->result_array();
        //  print_r($this->db->last_query());die;
        if(isset($_GET['op'])&&$_GET['op']=='export'){
            $this->common_function->pay_role("seller_order_export");//权限
            $time = date('YmdHis');
            $filename = 'orders_list_' . $time;
            $dlname = $time . '订单列表';
            $file_path = ROOTPATH . 'data/excel_download/' . $filename . '.csv';
            $excel_titel = array(chr(0xef) . chr(0xbb) . chr(0xbf) . '订单编号','订单状态','商品名称', '款号', '货号','主色', '颜色', '尺码', '条码', '数量',  '买家', '买家联系电话', '收货人地址', '发货物流', '客户备注');
            $fp = @fopen($file_path, 'a');
            @fputcsv($fp, $excel_titel);
            foreach ($rows as $v) {
                $excel = array();
                $order_type = $this->order_model->order_status($v['shipping_type']);
                $excel['order_sn'] = "'" . strval($v['order_sn']);
                $excel['order_status'] = $order_type[$v['order_status']];
                $excel['goods_name'] = $v['goods_name'];
                $excel['goods_spu'] = $v['goods_spu'];
                $excel['stocks_sn'] = $v['stock_code'];
                $excel['goods_color'] = $v['goods_color'];
                $excel['goods_color_remark'] = $v['goods_color_remark'];
                $excel['goods_size'] = $v['goods_size'];
                $excel['sotck_barcode'] = $v['sotck_barcode'];
                //$excel['goods_pay_price'] = $v['goods_pay_price'];
                $excel['goods_num'] = $v['goods_num'];
                $excel['buyer_name'] = ($v['order_type']==3)?$v['u_store_name']:$v['u_user_name'];
                $excel['buyer_tel'] = ($v['order_type']==3)?$v['u_ous_tel']:$v['u_tel'];
                $excel['reciver_address'] = $v['receive_name'].'，'.strval($v['receive_mobile']).'，'.strval($v['receive_tel']).'，'.$v['province_name'].'，'.$v['city_name'].'，'.$v['area_name'].'，'.$v['receive_address'].'，'.$v['receive_postcode'];
                $excel['e_name'] = $v['e_name'];
                $excel['buyer_message'] = $v['buyer_message'];
                @fputcsv($fp, $excel);
            }
            $download_path = str_replace('\\', '/', trim(base_url() . 'data/excel_download/' . $filename . '.csv'));
            header("location:" . $download_path);
            //$this->common_function->insert_download($dlname, $download_path, time(), 2);
            exit;
        }elseif(isset($_GET['op'])&&$_GET['op']=='pei'){
            $this->common_function->pay_role("seller_order_distribution");//权限
            $result = array('state'=>true,'msg'=>'设置成功！');
            $time = time();
            foreach ($rows as $v) {
                if($v['order_status']==20){
                    $this->db->update('shop_order',array('order_status'=>21,'modify_time'=>$time),array('order_sn'=>$v['order_sn']));
                }
            }
            echo json_encode($result);exit;
        }

    }
    //网店订单导出
    public function orderBp() {
        $where = ' s.store_id= '.$_SESSION['shop_spg_store_id'];
        //$where="1=1";
        if (!empty($_POST['id'])) {
            $id_str = $_POST['id'];
            $where .= " and o.order_sn in ($id_str)";
        }else{
            if(!empty($_GET['stime'])){
                $where .= " AND o.created_time>= ".strtotime($_GET['stime']);
            }
            if(!empty($_GET['etime'])){
                $where .= " AND o.created_time<= ".strtotime($_GET['etime']);
            }
            if($_GET['order_type']!=''){
                $where .= " AND o.order_status= ".$_GET['order_type'];
            }
            if($_GET['shop_order_sn']!=''){
                $where .= " AND o.out_order_sn= ".$_GET['shop_order_sn'];
            }
            if(!empty($_GET['store_name'])){
                $where .= " AND o.store_name  like '%{$_GET['store_name']}%'";
            }
            if(!empty($_GET['stocks_sn'])){
                $where .= " AND og.stock_code like '%{$_GET['order_sn']}%'";
            }
            if(!empty($_GET['pay_sn'])){
                $where .= " AND o.pay_sn like '%{$_GET['pay_sn']}%'";
            }
            if(!empty($_GET['goods_name'])){
                $where .= " AND og.goods_name like '%{$_GET['goods_name']}%'";
            }
            if(!empty($_GET['user_name'])){
                $where .= " AND (u.user_name  like '%{$_GET['user_name']}%' or o.receive_name  like '%{$_GET['user_name']}%')";
            }
            if(!empty($_GET['express_sn'])){
                $where .= " AND og.express_sn like '%{$_GET['express_sn']}%'";
            }
            if(!empty($_GET['goods_spu'])){
                $where .= " AND g.goods_spu  like '%{$_GET['goods_spu']}%'";
            }
            if(!empty($_GET['express_type'])){
                $where .= " AND (o.create_express  like '%{$_GET['express_type']}%' or o.logistics_company_name  like '%{$_GET['express_type']}%')";
            }
            if(!empty($_GET['buyer'])){
                $where .= " AND (u.user_name  like '%{$_GET['buyer']}%' or o.receive_name  like '%{$_GET['buyer']}%')";
            }
            if(!empty($_GET['user_tel'])){
                $where .= " AND (o.receive_mobile  like '%{$_GET['user_tel']}%' or s.ous_tel  like '%{$_GET['user_tel']}%')";
            }
            if(!empty($_GET['order_sn'])){
                $where .= " AND o.order_sn like '%{$_GET['order_sn']}%'";
            }

        }
        $rows = $this->db->select("o.order_sn,o.waybill_sn,o.logistics_company_name,o.create_express,o.receive_postcode,o.receive_tel,
					o.receive_mobile,o.receive_address,o.receive_area,o.receive_city,o.receive_province,o.receive_name,o.carriage,
					o.create_carriage,o.buyer_memo,o.seller_note,o.buyer_message,o.created_time,o.modify_time,o.goods_price,o.order_type,
					o.goods_num,o.order_price,o.shipping_type,o.buyer_id,o.store_id,o.order_status,og.rec_id,og.goods_id,og.goods_name,og.goods_num,og.goods_color
					,og.goods_color_remark,og.goods_size,og.goods_pay_price,og.stock_code,og.sotck_barcode,g.goods_spu,g.brand_name,
				s.store_name as u_store_name,u.user_name as u_user_name,s.ous_tel as u_ous_tel,u.tel as u_tel,a.area_name,b.area_name as city_name,
				c.area_name as province_name,e.e_name")
            ->from('shop_order o')
            ->join('shop_order_goods og','og.order_sn=o.order_sn')
            ->join('express e','e.e_code=o.create_express','left')
            ->join('area a','a.area_id=o.receive_area','left')
            ->join('area b','b.area_id=o.receive_city','left')
            ->join('area c','c.area_id=o.receive_province','left')
            ->join('shop_goods g','g.goods_id=og.goods_id','left')
            ->join('store s','s.store_id=o.buyer_id and o.order_type=3','left')
            ->join('user u','u.user_id=o.buyer_id and o.order_type IN (2,4)','left')
            ->where($where)
            ->get()->result_array();
        //  print_r($this->db->last_query());die;
        if(isset($_GET['Bp'])&&$_GET['Bp']=='export'){
            $this->common_function->pay_role("seller_order_export");//权限
            $time = date('YmdHis');
            $filename = 'orders_list_' . $time;
            $dlname = $time . '订单列表';
            $file_path = ROOTPATH . 'data/excel_download/' . $filename . '.csv';
            $excel_titel = array(chr(0xef) . chr(0xbb) . chr(0xbf) . '订单编号','订单状态','商品名称', '款号', '货号','主色', '颜色', '尺码', '条码', '数量',  '买家', '买家联系电话', '收货人地址', '发货物流', '客户备注');
            $fp = @fopen($file_path, 'a');
            @fputcsv($fp, $excel_titel);
            foreach ($rows as $v) {
                $excel = array();
                $order_type = $this->order_model->order_status($v['shipping_type']);
                $excel['order_sn'] = "'" . strval($v['order_sn']);
                $excel['order_status'] = $order_type[$v['order_status']];
                $excel['goods_name'] = $v['goods_name'];
                $excel['goods_spu'] = $v['goods_spu'];
                $excel['stocks_sn'] = $v['stock_code'];
                $excel['goods_color'] = $v['goods_color'];
                $excel['goods_color_remark'] = $v['goods_color_remark'];
                $excel['goods_size'] = $v['goods_size'];
                $excel['sotck_barcode'] = $v['sotck_barcode'];
                //$excel['goods_pay_price'] = $v['goods_pay_price'];
                $excel['goods_num'] = $v['goods_num'];
                $excel['buyer_name'] = ($v['order_type']==3)?$v['u_store_name']:$v['u_user_name'];
                $excel['buyer_tel'] = ($v['order_type']==3)?$v['u_ous_tel']:$v['u_tel'];
                $excel['reciver_address'] = $v['receive_name'].'，'.strval($v['receive_mobile']).'，'.strval($v['receive_tel']).'，'.$v['province_name'].'，'.$v['city_name'].'，'.$v['area_name'].'，'.$v['receive_address'].'，'.$v['receive_postcode'];
                $excel['e_name'] = $v['e_name'];
                $excel['buyer_message'] = $v['buyer_message'];
                @fputcsv($fp, $excel);
            }
            $download_path = str_replace('\\', '/', trim(base_url() . 'data/excel_download/' . $filename . '.csv'));
            header("location:" . $download_path);
            //$this->common_function->insert_download($dlname, $download_path, time(), 2);
            exit;
        }elseif(isset($_GET['op'])&&$_GET['op']=='pei'){
            $this->common_function->pay_role("seller_order_distribution");//权限
            $result = array('state'=>true,'msg'=>'设置成功！');
            $time = time();
            foreach ($rows as $v) {
                if($v['order_status']==20){
                    $this->db->update('shop_order',array('order_status'=>21,'modify_time'=>$time),array('order_sn'=>$v['order_sn']));
                }
            }
            echo json_encode($result);exit;
        }

    }
	public function cancel(){
		//print_r($_POST);die;
	   $time = time();
	   $result = array('state'=>false,'msg'=>'操作错误！');
	   $order_sn = isset($_POST['data']['order_sn'])?$_POST['data']['order_sn']:'';
	   $rec_id = isset($_POST['data']['rec_id'])?$_POST['data']['rec_id']:'';
	   $user_id = $_SESSION['shop_spg_store_id'];
	   if($order_sn&&$rec_id){
	   	   $order_info = $this->db->select('*')->where('order_sn',$order_sn)->get('shop_order')->row_array();
	   	   $orderGoods = $this->db->select('*')->where('rec_id',$rec_id)->get('shop_order_goods')->row_array();
	   	   if($order_info['goods_num']==$orderGoods['goods_num']){
		   	   	$sql_order_up = array(
		   	   			'order_status'=>0,'modify_time'=>$time,
		   	   	);
		   	   	$goods_price = $order_info['order_price'];
		   	   	$sql_log = array();
		   	   	$sql_log['order_sn'] = $order_sn;
		   	   	$sql_log['log_msg'] = '订单'.$order_sn.'取消';
		   	   	$sql_log['log_time'] = $time;
		   	   	$sql_log['log_role'] = '导购';
		   	   	$sql_log['log_user'] = $_SESSION['shop_spg_id'];
		   	   	$sql_log['log_orderstate'] = 0;
	   	   }else{
		   	   	
		   	   	$new_order_sn = $this->common_function->produce_order_sn($user_id);
		   	   	$goods_num = $orderGoods['goods_num'];$goods_price = $goods_num*$orderGoods['goods_pay_price'];
		   	   	$sql_order_in = $order_info;
		   	   	$sql_order_in['goods_price'] = $goods_price;$sql_order_in['order_price'] = $goods_price;$sql_order_in['order_status'] = 0;
		   	   	$sql_order_in['goods_num'] = $goods_num;$sql_order_in['pd_amount'] = $goods_price;$sql_order_in['modify_time'] = $time;
		   	   	$sql_order_in['create_carriage'] = 0;$sql_order_in['order_sn'] = $new_order_sn;
		   	   	$sql_order_up = array(
		   	   			'goods_price'=>$order_info['goods_price']-$goods_price,'order_price'=>$order_info['order_price']-$goods_price,'goods_num'=>$order_info['goods_num']-$goods_num,
		   	   			'pd_amount'=>$order_info['order_price']-$goods_price,'modify_time'=>$time,
		   	   	);
		   	   	$sql_goods_up = array('order_sn'=>$new_order_sn);
		   	   	$sql_log = array();
		   	   	$sql_log['order_sn'] = $order_sn;
		   	   	$sql_log['log_msg'] = '订单'.$order_sn.'取消商品，重新生成取消的订单'.$new_order_sn;
		   	   	$sql_log['log_time'] = $time;
		   	   	$sql_log['log_role'] = '导购';
		   	   	$sql_log['log_user'] = $_SESSION['shop_spg_id'];
		   	   	$sql_log['log_orderstate'] = 0;
	   	   }
	   	   
	   	   if(in_array($order_info['order_from'],array(41,42,43))){
		   	   	$buyer_storeInfo = $this->db->select('store_name,balance')->where('store_id',$order_info['buyer_id'])->get('store')->row_array();
		   	   	$buyer_type = 2;
	   	   }
	   	   if(in_array($order_info['order_from'],array(1,21,22))){
		   	   	$buyer_storeInfo = $this->db->select('user_name,balance')->where('user_id',$order_info['buyer_id'])->get('user')->row_array();
		   	   	$buyer_type = 1;
	   	   }
	   	   if($order_info['buyer_id']==$user_id){
	   	   	    $goods_price = 0;
	   	   }
	   	   $this->db->trans_begin(); //开启事物
	   	   if(!empty($sql_order_in)){
	   	   	   $this->db->insert('shop_order',$sql_order_in);
	   	   }
	   	   if(!empty($sql_order_up)){
	   	     	$this->db->update('shop_order',$sql_order_up,array('order_sn'=>$order_sn));
	   	   }
	   	   if(!empty($sql_goods_up)){
	   	   	    $this->db->update('shop_order_goods',$sql_goods_up,array('rec_id'=>$rec_id));
	   	   }
	   	   $this->db->insert('shop_order_log',$sql_log);//订单
	   	   $sql_buyer = array('balance'=>$buyer_storeInfo['balance']+$goods_price);
	   	   if($buyer_type==2){
		   	   	$this->db->update('store',$sql_buyer,array('store_id'=>$order_info['buyer_id']));
		   	   	$return_user_log_sql ="insert into ".$this->db->dbprefix('store_asset_log')."
		   	   	(store_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
		   	   	values({$order_info['buyer_id']},'{$order_info['pay_sn']}',4,0,'{$goods_price}',
		   	   	(select balance from ".$this->db->dbprefix('store').
		   	   	" u where u.store_id={$order_info['buyer_id']}),'通过订单支付单号{$order_info['pay_sn']}订单商品取消退款收入{$goods_price}',{$time})"; //增加门店资金金额日志
	   	   }elseif($buyer_type==1){
		   	   	$this->db->update('user',$sql_buyer,array('user_id'=>$order_info['buyer_id']));
		   	   	$return_user_log_sql ="insert into ".$this->db->dbprefix('user_asset_log')."
		   	   	(user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
		   	   	values({$order_info['buyer_id']},'{$order_info['pay_sn']}',4,0,'{$goods_price}',
		   	   	(select balance from ".$this->db->dbprefix('user').
		   	   	" u where u.user_id={$order_info['buyer_id']}),'通过订单支付单号{$order_info['pay_sn']}订单商品取消退款收入{$goods_price}',{$time})"; //增加门店资金金额日志
	   	   }
	   	    
	   	   $return_plat_log_sql ="insert into ".$this->db->dbprefix('sys_asset_account')."
	   	   (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	   	   values({$order_info['buyer_id']},'{$order_info['pay_sn']}',6,{$goods_price},0,
	   	   (select (ifnull(asset, 0)-{$goods_price}) from ".$this->db->dbprefix('sys_asset_account')." p order by p.paa_id DESC limit 0,1),
	   	   '通过订单支付单号{$order_info['pay_sn']}订单商品取消退款支出{$goods_price}',{$time})"; //增加平台资金金额日志
	   	   $this->db->query($return_user_log_sql);
	   	   $this->db->query($return_plat_log_sql);
	   	   if ($this->db->trans_status() === FALSE) {
		   	   	$this->db->trans_rollback();
		   	   	$error_msg = "订单商品取消失败。";
		   	   	$result['msg'] = $error_msg;
	   	   }else{
		   	   	$this->db->trans_commit();
		   	   	$result['state'] = true;$result['msg'] = '订单商品取消成功';
		   	   	$this->common_function->insertUserLog('订单'.$order_sn.'商品取消', 1, 3, 'add');
	   	   }
	   }
	   echo json_encode($result);exit;
	}
	public function sendOrder(){
	   $this->common_function->pay_role("seller_order_delivery");//权限
	   $time = time();
	   $result = array('state'=>false,'msg'=>'操作错误！');
	   $order_sn = isset($_POST['data']['order_sn'])?$_POST['data']['order_sn']:'';
	   $waybill_sn = isset($_POST['waybill_sn'])?$_POST['waybill_sn']:'';
	   $goods = isset($_POST['goods'])?$_POST['goods']:'';
	   $user_id = $_SESSION['shop_spg_store_id'];
	   if(empty($order_sn)||empty($waybill_sn)||empty($goods)){
	   	  echo json_encode($result);exit;
	   }
	   //print_r($_POST);die;
	   $goods_up = array();$goods_in = array();$order_up = array();$order_in = array();$retrun_price = 0;$retrun_num = 0;$sql_amount_up=array();
	   foreach ($goods as $k=>$v){
	   	   $goods_info = $this->db->select('*')->where('rec_id',$v['rec_id'])->get('shop_order_goods')->row_array();
	   	   if($goods_info['goods_num']==$v['goods_num']){
	   	   	
	   	   }elseif($v['goods_num']==0){
	   	   	   $retrun_price += $goods_info['goods_num']*$goods_info['goods_pay_price'];
	   	   	   $retrun_num +=$goods_info['goods_num'];
	   	   	   if(empty($new_order_sn)){
	   	   	   	  $new_order_sn = $this->common_function->produce_order_sn($user_id);
	   	   	   }
	   	   	   $sql_goods_up = array('rec_id'=>$v['rec_id'],'order_sn'=>$new_order_sn);
	   	   	   $goods_up[] = $sql_goods_up;
	   	   }else{
		   	   	$retrun_price += ($goods_info['goods_num']-$v['goods_num'])*$goods_info['goods_pay_price'];
		   	   	$retrun_num +=$goods_info['goods_num']-$v['goods_num'];
		   	   	if(empty($new_order_sn)){
		   	   		$new_order_sn = $this->common_function->produce_order_sn($user_id);
		   	   	}
	   	   	   $sql_goods_up = array('rec_id'=>$v['rec_id'],'goods_num'=>$v['goods_num']);
	   	   	   $sql_goods_in = $goods_info;
	   	   	   $sql_goods_in['goods_num'] = $goods_info['goods_num']-$v['goods_num'];
	   	   	   $sql_goods_in['order_sn'] = $new_order_sn;
	   	   	   $goods_up[] = $sql_goods_up;$goods_in[] = $sql_goods_in;
	   	   }
	   	    $ssa_info = $this->db->select('ss.ssa_id,ss.amount')
	   	    ->from('store_stocks_amount ss')->join('shop_order_goods sg','sg.goods_ea_id=ss.goods_ea_id')
	   	    ->where('sg.rec_id',$v['rec_id'])->where('ss.ssa_store_id',$user_id)->get()->row_array();
			$ssa_amount = ($ssa_info['amount']-$v['goods_num'])>=0?($ssa_info['amount']-$v['goods_num']):0;
			$sql_amount = array('ssa_id'=>$ssa_info['ssa_id'],'amount'=>$ssa_amount,'update_time'=>$time,'update_user_type'=>2,
					'update_user_id'=>$_SESSION['shop_spg_id'],'update_user_name'=>$_SESSION['shop_spg_name']);
			$sql_amount_up[] = $sql_amount;
	   }
	   $order_up = array();
	   $order_storeInfo = $this->db->select('order_take_percentage,store_name,balance')->where('store_id',$user_id)->get('store')->row_array();
	   $rebate_arr = empty($order_storeInfo['order_take_percentage'])?0:unserialize($order_storeInfo['order_take_percentage']);
	   if($retrun_num>=1){
	   	   $order_info = $this->db->select('*')->where('order_sn',$order_sn)->get('shop_order')->row_array();
	   	   if($order_info['order_type']==1){
	   	   	$rebate = empty($rebate_arr)?0:$rebate_arr['agent'];
	   	   }elseif($order_info['order_type']==2){
	   	   	$rebate = empty($rebate_arr)?0:$rebate_arr['system'];
	   	   }elseif($order_info['order_type']==3){
	   	   	$rebate = empty($rebate_arr)?0:$rebate_arr['online'];
	   	   }elseif($order_info['order_type']==4){
	   	   	$rebate = empty($rebate_arr)?0:$rebate_arr['offline'];
	   	   }
	   	   $rebate_amount = ($order_info['goods_price']-$retrun_price)*$rebate;
	   	   $order_up = array(
	   	   		'order_status'=>30,'modify_time'=>$time,'rebate'=>$rebate,'rebate_amount'=>$rebate_amount,'carriage'=>$order_info['create_carriage'],
	   	   		'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,'delivery_time'=>$time,
	   	   		'goods_price'=>$order_info['goods_price']-$retrun_price,'order_price'=>$order_info['order_price']-$retrun_price,'goods_num'=>$order_info['goods_num']-$retrun_num
	   	   );
	   	   $order_in = $order_info;
	   	   $order_in['goods_price'] = $retrun_price; $order_in['order_price'] = $retrun_price;
	   	   $order_in['goods_num'] = $retrun_num;$order_in['modify_time'] = $time;$order_in['created_time'] = $time;
	   }else{
	   	   $order_info = $this->db->select('create_carriage,create_express,order_type,order_from,order_price,goods_price,goods_num,buyer_id,pay_sn')->where('order_sn',$order_sn)->get('shop_order')->row_array();
	   	   if($order_info['order_type']==1){
	   	   	$rebate = empty($rebate_arr)?0:$rebate_arr['agent'];
	   	   }elseif($order_info['order_type']==2){
	   	   	$rebate = empty($rebate_arr)?0:$rebate_arr['system'];
	   	   }elseif($order_info['order_type']==3){
	   	   	$rebate = empty($rebate_arr)?0:$rebate_arr['online'];
	   	   }elseif($order_info['order_type']==4){
	   	   	$rebate = empty($rebate_arr)?0:$rebate_arr['offline'];
	   	   }
	   	   $rebate_amount = ($order_info['goods_price']-$retrun_price)*$rebate;
	   	   $order_up = array('order_status'=>30,'modify_time'=>$time,'rebate'=>$rebate,'rebate_amount'=>$rebate_amount,'carriage'=>$order_info['create_carriage'],'logistics_company_name'=>$order_info['create_express'],'waybill_sn'=>$waybill_sn,'delivery_time'=>$time);
	   }
	   $user_amount = $order_info['order_price']-$retrun_price-$rebate_amount;
	   if($order_info['buyer_id']==$user_id){
	   	  $user_amount = 0-$rebate_amount;$retrun_price=0;
	   }
	   $sql_user = array('balance'=>$order_storeInfo['balance']+$user_amount);
	   $sql_log = array();
	   $sql_log['order_sn'] = $order_sn;
	   $sql_log['log_msg'] = '订单'.$order_sn.'发货';
	   $sql_log['log_time'] = $time;
	   $sql_log['log_role'] = '导购';
	   $sql_log['log_user'] = $_SESSION['shop_spg_id'];
	   $sql_log['log_orderstate'] = 0;
	   $this->db->trans_begin(); //开启事物
	   //$sql_order_in = array();$sql_order_up = array();$sql_goods_in = array();$sql_goods_up = array();$sql_order_log = array();$sql_amount_up = array();
	   if(!empty($order_in)){
	   	$this->db->insert('shop_order',$order_in);//订单
	   }
	   if(!empty($order_up)){
	   	$this->db->update('shop_order',$order_up,array('order_sn'=>$order_sn));//订单
	   }
	   if(!empty($goods_in)){
	   	$this->db->insert_batch('shop_order_goods',$goods_in);//订单
	   }
	   if(!empty($goods_up)){
	   	$this->db->update_batch('shop_order_goods',$goods_up,'rec_id');//订单
	   }
	   if(!empty($sql_log)){
	   	$this->db->insert('shop_order_log',$sql_log);//订单
	   }
	   if(!empty($sql_amount_up)){
	   	$this->db->update_batch('store_stocks_amount',$sql_amount_up,'ssa_id');//订单
	   }
	   $this->db->update('store',$sql_user,array('store_id'=>$user_id));
	   $add_user_log_sql ="insert into ".$this->db->dbprefix('store_asset_log')."
	   (store_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	   values({$user_id},'{$order_info['pay_sn']}',3,0,'{$user_amount}',
	   (select balance from ".$this->db->dbprefix('store').
	   " u where u.store_id={$user_id}),'订单{$order_sn}发货收入{$user_amount}',{$time})"; //增加门店资金金额日志
	   $add_plat_log_sql ="insert into ".$this->db->dbprefix('sys_asset_account')."
	   (user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
	   values({$user_id},'{$order_info['pay_sn']}',5,{$user_amount},0,
	   (select (ifnull(asset, 0)-{$user_amount}) from ".$this->db->dbprefix('sys_asset_account')." p order by p.paa_id DESC limit 0,1),
	   '订单{$order_sn}发货支出{$user_amount}',{$time})"; //增加平台资金金额日志
	   $this->db->query($add_user_log_sql);
	   $this->db->query($add_plat_log_sql);
	   if(in_array($order_info['order_from'],array(41,42,43))){
	   	$buyer_storeInfo = $this->db->select('store_name,balance')->where('store_id',$order_info['buyer_id'])->get('store')->row_array();
	   	$buyer_type = 2;
	   }
	   if(in_array($order_info['order_from'],array(1,21,22))){
	   	$buyer_storeInfo = $this->db->select('user_name,balance')->where('user_id',$order_info['buyer_id'])->get('user')->row_array();
	   	$buyer_type = 1;
	   }
	   if($retrun_num>=1){
	   	    $sql_buyer = array('balance'=>$buyer_storeInfo['balance']+$retrun_price);
		   	if($buyer_type==2){
		   		$this->db->update('store',$sql_buyer,array('store_id'=>$order_info['buyer_id']));
		   		$return_user_log_sql ="insert into ".$this->db->dbprefix('store_asset_log')."
		   		(store_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
		   		values({$order_info['buyer_id']},'{$order_info['pay_sn']}',4,0,'{$retrun_price}',
		   		(select balance from ".$this->db->dbprefix('store').
		   		" u where u.store_id={$order_info['buyer_id']}),'通过订单支付单号{$order_info['pay_sn']}订单商品取消退款收入{$retrun_price}',{$time})"; //增加门店资金金额日志
		   	}elseif($buyer_type==1){
		   		$this->db->update('user',$sql_buyer,array('user_id'=>$order_info['buyer_id']));
		   		$return_user_log_sql ="insert into ".$this->db->dbprefix('user_asset_log')."
		   		(user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
		   		values({$order_info['buyer_id']},'{$order_info['pay_sn']}',4,0,'{$retrun_price}',
		   		(select balance from ".$this->db->dbprefix('user').
		   		" u where u.user_id={$order_info['buyer_id']}),'通过订单支付单号{$order_info['pay_sn']}订单商品取消退款收入{$retrun_price}',{$time})"; //增加门店资金金额日志
		   	}
		   	 
		   	$return_plat_log_sql ="insert into ".$this->db->dbprefix('sys_asset_account')."
		   	(user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time)
		   	values({$order_info['buyer_id']},'{$order_info['pay_sn']}',6,{$retrun_price},0,
		   	(select (ifnull(asset, 0)-{$retrun_price}) from ".$this->db->dbprefix('sys_asset_account')." p order by p.paa_id DESC limit 0,1),
		   	'通过订单支付单号{$order_info['pay_sn']}订单商品取消退款支出{$retrun_price}',{$time})"; //增加平台资金金额日志
		   	$this->db->query($return_user_log_sql);
		   	$this->db->query($return_plat_log_sql);
	   }
	   if ($this->db->trans_status() === FALSE) {
	   	$this->db->trans_rollback();
	   	$error_msg = "订单发货失败。";
	   	$result['msg'] = $error_msg;
	   }else{
	   	$this->db->trans_commit();
	   	$result['state'] = true;$result['msg'] = '订单发货成功';
	   	$this->common_function->insertUserLog('订单发货', 1, 3, 'add');
	   }
	   echo json_encode($result);exit;
	}
	//运单模板下载
	public function waybill_tp(){
        $this->common_function->pay_role("seller_order_print_waybill");//权限
        $this->load->helper('download');
		$data = ROOTPATH.'data/excel_tp/waybill_tp.xlsx';
		force_download($data, NULL);
	}
	public function waybill_tp_order(){
        $this->common_function->pay_role("seller_order_print_waybill");//权限
        $this->load->helper('download');
		$data = ROOTPATH.'data/excel_tp/waybill_tp_order.xlsx';
		force_download($data, NULL);
	}
	//导入运单
	public function waybill_import(){
        $this->common_function->pay_role("seller_order_input_waybill");//权限
        $user_id = $_SESSION['shop_spg_store_id'];
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
		/*运单导入只是插入运单号 ，快递*/
		$error_col = 'F';
		if(isset($condition['type'])&&$condition['type']=='order'){
			$error_col = 'H';
		}
		$time = time();
		for($i = 2; $i <= $rows; $i ++) {
			$excel = array();
			$flag = false;
			$false_msg ='';
			$now_run++;
			$percent = intval(($now_run/$rows)*100);
			ob_clean();
			ob_start();
			// 订单号<必填>
			$excel ['order_sn'] = $objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ();
			if (empty( $excel ['order_sn'] )) {
				$this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );
				$false_msg .='订单号必填。';
				$flag = true;
			}
			//快递公司<必填>
			$excel ['express_name'] = $objPHPExcel->getActiveSheet ()->getCell ( "B{$i}" )->getValue ();
	
			//运单号<必填>
			$excel ['express_sn'] = $objPHPExcel->getActiveSheet ()->getCell ( "C{$i}" )->getValue ();
			if (empty ( $excel ['express_sn'])) {
				$this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );
				$false_msg .='运单号必填。';
				$flag = true;
			}
			if(isset($condition['type'])&&$condition['type']=='order'){
				//运费
				$excel ['express_fee'] = $objPHPExcel->getActiveSheet ()->getCell ( "D{$i}" )->getValue ();
				//备注
				$excel ['express_note'] = $objPHPExcel->getActiveSheet ()->getCell ( "E{$i}" )->getValue ();
			}else{
				//货号
				$excel ['stocks_code'] = $objPHPExcel->getActiveSheet ()->getCell ( "D{$i}" )->getValue ();
				if (empty ( $excel ['stocks_code'] )) {
					$this->common_function->wrong_cell ( $objPHPExcel, "D{$i}" );
					$false_msg .='货号必填。';
					$flag = true;
				}
				//尺码
				$excel ['size'] = $objPHPExcel->getActiveSheet ()->getCell ( "E{$i}" )->getValue ();
				if (trim($excel ['size'])=='') {
					$this->common_function->wrong_cell ( $objPHPExcel, "E{$i}" );
					$false_msg .='尺码必填。';
					$flag = true;
				}
				//运费
				$excel ['express_fee'] = $objPHPExcel->getActiveSheet ()->getCell ( "F{$i}" )->getValue ();
				//已发数量
				$excel ['express_amount'] = $objPHPExcel->getActiveSheet ()->getCell ( "G{$i}" )->getValue ();
	
				/* if(trim($excel ['express_amount'])!=''){
				 $place_num = 0;
				 $place_num = $this->db->select('number')->from('order_stocks')->where('order_sn',$excel ['order_sn'])
				 ->where('stocks_code',$excel ['stocks_code'])->where('stocks_size',$excel ['size'])
				 ->where('order_sn',$excel ['order_sn'])->get()->row('number');
				 if(trim($excel ['express_amount'])>$place_num){
				 $this->common_function->wrong_cell ( $objPHPExcel, "G{$i}" );
				 $flag = true;
				 }
				 } */
				//备注
				$excel ['express_note'] = $objPHPExcel->getActiveSheet ()->getCell ( "H{$i}" )->getValue ();
			}
			$excel['user_id'] = $user_id;
			if (! $flag) {
				// 检查该条订单是否在在
				if(isset($condition['type'])&&$condition['type']=='order'){
					$sql = 'SELECT order_status,order_sn,goods_num,waybill_sn,create_carriage,create_express FROM ' . $this->db->dbprefix( 'shop_order' ) . " WHERE order_sn='{$excel ['order_sn']}' ";
					$tmp = $this->db->query( $sql )->row_array();
					if($tmp){
						if($tmp['order_status']>=30){
							$this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );
							$false_msg .='订单已发货。';$flag = true;
						}
						if(!empty($tmp['waybill_sn'])&&$tmp['waybill_sn']!=$excel ['express_sn']){
							$this->common_function->wrong_cell ( $objPHPExcel, "C{$i}" );
							$false_msg .='此订单运单号已存在且不与当前运单号相同。';$flag = true;
						}
						$excel ['express_fee'] = ($excel ['express_fee']!='')?$excel ['express_fee']:$tmp['create_carriage'];
						$excel ['express_name'] = empty($excel ['express_name'])?$tmp ['create_express']:$excel ['express_name'];
					}else{
						$this->common_function->wrong_cell ( $objPHPExcel, "A{$i}" );
						$false_msg .='订单号不存在。';$flag = true;
					}
				}
			}
			if(! $flag){
				$sql_order = array('logistics_company_name'=>$excel ['express_name'],'waybill_sn'=>$excel ['express_sn'],'modify_time'=>$time,'seller_note'=>$excel ['express_note'],'carriage'=>$excel ['express_fee']);
			    $this->db->update('shop_order',$sql_order,array('order_sn'=>$excel['order_sn']));
			    $add_num++;
			    unset($excel);
			    $delete_row [] = $i; // 记录插入成功的当前行
			}else{
				$is_download = true;
				$error_num++;
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
			$objPHPExcel->getActiveSheet()->setCellValue("{$error_col}1",'错误信息');
			$filenames = 'waybill_import_error' . date ( 'YmdHis' );
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
		$this->common_function->insertUserLog('运单导入', 1, 3, 'add');
		exit();
	}
}
