<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('pay_model');
        $this->load->model ('goods_model');
        $this->load->helper('download');
    }

   /*---盘点根据条码查货--*/
   public function check_barcode(){
       $barcode = isset($_POST['barcode'])?trim($_POST['barcode']):'';
       $stocks_sn = isset($_POST['stocks_sn'])?trim($_POST['stocks_sn']):'';
       $size = isset($_POST['size'])?trim($_POST['size']):'';
       $result = array('state'=>false,'data'=>'','msg'=>'操作错误');
       if($barcode){
           $stocks =  $this->db->select('goods_id,goods_name,stocks_price,price,stocks_sku,stocks_bar_code,goods_addtime,brand_name,size')
           ->from('v_store_brand_stock_amount')->where('stocks_bar_code',$barcode)
           ->where("store_id IN ({$_SESSION['shop_spg_store_id']})")->get()->row_array();
           if(!empty($stocks)){
               $stocks['stocks_price'] = empty($stocks['price'])?$stocks['stocks_price']:$stocks['price'];
               $stocks['stocks_sn'] = $stocks['stocks_sku'];
               $stocks['adddate'] = date('Y-m-d H:i:s',$stocks['goods_addtime']);
               $result = array('state'=>true,'data'=>$stocks,'msg'=>'');
              
           }else{
               $result = array('state'=>false,'data'=>'','msg'=>'没有找到此条码的货品信息');
              
           }
       }elseif($stocks_sn&&$size){
           $stocks =  $this->db->select('goods_id,goods_name,stocks_price,price,stocks_sku,stocks_bar_code,goods_addtime,brand_name,size')
           ->from('v_store_brand_stock_amount')->where('stocks_sku',$stocks_sn)->where('size',$size)
           ->where("store_id IN ({$_SESSION['shop_spg_store_id']})")->get()->result_array();
           if(!empty($stocks)){
               foreach ($stocks as $k=>$v){
                   $stocks[$k]['stocks_price'] = empty($v['price'])?$v['stocks_price']:$v['price'];
                   $stocks[$k]['stocks_sn'] = $v['stocks_sku'];
                   $stocks[$k]['adddate'] = date('Y-m-d H:i:s',$v['goods_addtime']);
               }
               
               $result = array('state'=>true,'data'=>$stocks,'msg'=>'');
           
           }else{
               $result = array('state'=>false,'data'=>'','msg'=>'没有找到对应的货品信息');
           
           }
       }
       echo json_encode($result);exit;
   }
   
   //库存管理
   public function stock_query(){
       $this->common_function->pay_role("seller_stock_manage");//权限
       $this->pay_model->storeInfo();
       $op = isset($_GET['op']) ? $_GET['op'] : 'all';      //判断来源，显示自建还是全库商品
       $shop_spg_store_type=isset($_SESSION['shop_spg_store_type']) ? $_SESSION['shop_spg_store_type'] : '';//判断是否是实体店（1）
       $store_data = array();
       $store_data = $this->db->select('store_id,store_name')->where('store_id',$_SESSION['shop_spg_store_id'])->get('store')->row_array();
       /* $brands = $this->db->select('s.brand_id,s.brand_name')->from('store_attr_brands as sb')
       ->join('shop_brand as s','s.brand_id=sb.brand_id')->where('sb.store_id',$_SESSION['shop_spg_store_id'])
       ->get()->result_array(); */
       $brands = $this->goods_model->get_brands_by_class ();
       $cate_arr = $this->goods_model->get_cate_by_parent_id(0);
       $cate_option = $this->goods_model->cate_array_to_option($cate_arr, 0);//分类选项
       $this->smarty->assign('cate_option',$cate_option);
       
       $this->smarty->assign('brands',$brands);
       $this->smarty->assign('store_data',$store_data);

       if($op == 'shop') { //自建商品
           $this->smarty->assign ('url', base_url ('pay.php/stock/get_stock_query_list?op=shop'));
       } else {
           $this->smarty->assign ('url', base_url ('pay.php/stock/get_stock_query_list?op=all'));
       }

       $this->smarty->assign ('op', $op);
       $this->smarty->assign ('shop_spg_store_type', $shop_spg_store_type);
       $this->smarty->display('stock_query.html');
   }
   
   /*店铺商品库存列表*/
   public function get_stock_query_list(){
       $this->common_function->pay_role("seller_stock_manage");//权限
       $store_id = $_SESSION['shop_spg_store_id'];
       $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
       $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
       $query = (isset($_POST['query']) && !empty($_POST['query'])) ? trim($_POST['query']) : false;
       $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
      
       $gc_id = isset($_GET['gc_id'])?trim($_GET['gc_id']):'';
       $brand_id = isset($_GET['brand_id'])?$_GET['brand_id']:'';
       $amount = isset($_GET['amount'])?trim($_GET['amount']):'';
       $stock_name = isset($_GET['stock_name'])?trim($_GET['stock_name']):'';
       $stock_sn = isset($_GET['stock_sn'])?trim($_GET['stock_sn']):'';
       $stocks_bar_code = isset($_GET['stocks_bar_code'])?trim($_GET['stocks_bar_code']):'';

       
       $where = " g.goods_state!=0";
       if(isset($_GET['op']) && $_GET['op'] == 'shop') {        //只搜索店铺的库存
           $where .= " and g.goods_pos = {$_SESSION['shop_spg_store_id']}";
       }else{
           if($brand_id){
           $where .=" and g.brand_id ='{$brand_id}' ";
           }else{
               $brands = $this->goods_model->get_brands_by_class ();
               if($brands){
                   $str = "(";
                   foreach ($brands as $key=>$val){
                       if(isset($brands[$key+1])){
                           $str .= $val['brand_id'].",";
                       }else{
                           $str .= $val['brand_id']." ";
                       }
                   }
                   $str .= ")";
                   $where .=" and g.brand_id in {$str} ";
               }else{
                   $where .=" and g.brand_id ='0' ";
               }
           }
       }
       
       if($stock_sn){
           $where .=" and g.goods_spu like '%{$stock_sn}%' ";
       }
       if($stock_name){
           $where .=" and g.goods_name like '%{$stock_name}%' ";
       }
       if($amount!=''){
           if($amount==0){
               $where .=" and (g.stock_amount is null or g.stock_amount='' or g.stock_amount=0 )";
           }elseif($amount==1){
               $where .=" and g.stock_amount>0";
           }
       }
       if($gc_id){
           $where .=" and g.gc_id = '{$gc_id}'";
       }
       
       if($stocks_bar_code){
           $where .=" and g.stocks_bar_code = '{$stocks_bar_code}'";
       }
       
       if ($query && $qtype){
           $where .= " and {$qtype} like '%{$query}%'";
       }

       if (isset($_GET['available_coupons']) && !empty($_GET['available_coupons'])) {
           $where.= " and g.available_coupons= {$_GET['available_coupons']}";
       }
       if (isset($_GET['year_to_market']) && !empty($_GET['year_to_market'])) {
           $where .= " and g.year_to_market = {$_GET['year_to_market']}";
       }
       if (isset($_GET['season_to_market']) && !empty($_GET['season_to_market'])) {
           $where .= " and g.season_to_market = {$_GET['season_to_market']}";
       }
       if (isset($_GET['sex']) && !empty($_GET['sex'])) {
           if ($_GET['sex'] == 3) {
               $_GET['sex'] = 0;
           }
           $where.=" and g.sex = {$_GET['sex']}";
       }

       //商品有无图片
       if (isset($_GET['goods_image']) && !empty($_GET['goods_image'])) {
           if($_GET['goods_image']==1){
               $where.="and g.goods_image is not null and g.goods_image!=''";
           }elseif($_GET['goods_image']==2){
               $where.="and g.goods_image is null";
           }
       }
   
       $total = $this->db->select('g.goods_id')
       ->from('v_store_stock g')
       ->where('g.ssa_store_id',$store_id)
       ->where($where)->group_by('g.goods_id')->count_all_results ();
 
       header("Content-type: text/xml");
       $store_type = array('1'=>'加盟店','2'=>'旗舰店','3'=>'直营店','4'=>'商场超市店',);
       $xml = '';
       $xml = '<input type="hidden" name="total-num" id="total-num" value="' . $total . '">';
       $xml .= '<input type="hidden" name="per-page-cur" id="per-page-cur" value="' . $page . '">';
       $xml .= '<input type="hidden" name="per-page-rp" id="per-page-rp" value="' . $rp . '">';
       if ($total == 0) {
           $xml .= '<tr><td colspan="14"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</li></td></tr></tbody>';
           echo $xml;
           exit;
       }

       $start = $rp * ($page - 1);
       $rows = $this->db->distinct()->select("g.goods_id ,sum(g.stock_amount) as stock_amount,g.goods_spu,g.goods_name,g.gc_id,g.gc_name,g.brand_id,g.brand_name,g.goods_price,
            g.goods_marketprice,g.goods_image,g.goods_addtime,g.update_time,g.gc_id")
           ->from('v_store_stock g')
           ->where('g.ssa_store_id',$store_id)
           ->where($where)
           ->group_by('g.goods_id')
           ->order_by('g.goods_addtime','DESC')->limit($rp,$start)->get()->result_array();

       // $rows = $this->db->select("g.goods_id,g.goods_spu,g.goods_name,g.gc_id,g.gc_name,g.brand_id,g.brand_name,g.goods_price,
       //      g.goods_marketprice,g.goods_image,g.goods_addtime,g.stock_amount,g.update_time,g.gc_id,g.stock_amount")
       //     ->from('v_store_stock g')
       //     ->where('g.ssa_store_id',$store_id)
       //     ->where($where)
       //     ->order_by('g.goods_addtime','DESC')->limit($rp,$start)->get()->result_array();
       $default_pic = PLUGIN.'data/images/'.$this->common_function->get_system_value('default_goods_image');
       foreach($rows as $row){
           $xml .= "<tr data-id='".$row['goods_id']."'>";
           $xml .= '<td style="width:10%;text-align: center;"  data-id="' . $row['goods_id'] . '" ><input class="ml15" type="checkbox"  value="' . $row['goods_id'] . '" name="check"></td>';

           //价格
           $stocks_price = $this->db->select ("stocks_price")->from ('store_stocks_amount')->where ('goods_id', $row['goods_id'])->get ()->row ('stocks_price');

           if($row['stock_amount']==''){
               $xml .= "<td style='width:10%;text-align: center;'>--</td>";
           }else{
               //只有实体店铺才能修改总库的库存  其他店铺只能修改自建商品的库存
               if((isset($_GET['op']) && $_GET['op'] == 'all' && $_SESSION['shop_spg_store_type'] == 1) || isset($_GET['op']) && $_GET['op'] == 'shop') {
                   $xml .= "<td  style='width:10%;text-align: center;' ><a class='btn btn-secondary radius' onclick=fg_edit(" . $row['goods_id'] . ")>
                    <i class='fa fa-pencil-square-o'></i>修改库存</a>";
                   if($_SESSION['shop_spg_store_type'] == 2){
                   	  $xml .= "<a class='btn btn-secondary radius mt-10' onclick=fg_sync_amount(" . $row['goods_id'] . ")>
                      <i class='fa fa-pencil-square-o'></i>同步库存</a>";
                   }
                   $xml .= "</td>";
               } else{
                   $xml .= "<td  style='width:10%;text-align: center;' ><a class='btn btn-secondary radius' onclick=fg_amount_recal(" . $row['goods_id'] . ")>
                    <i class='fa fa-pencil-square-o'></i>库存重算</a>
                    <a class='btn btn-secondary radius mt-10' onclick=fg_edit(" . $row['goods_id'] . ")>
                    <i class='fa fa-pencil-square-o'></i>查看库存</a></td>";
               }
           }
           $head_portrait = base_url($row['goods_image']);
           if(!empty($row['goods_image'])){
	           	if(strpos($row['goods_image'],'http')!==false){
	           		$head_portrait = $row['goods_image'];
	           	}else{
	           		$head_portrait =PLUGIN . 'data/shop/album_pic/'.$row['goods_image'];
	           	}
               
           }else{
               $head_portrait = $default_pic;
           }
           $xml .= "<td style='min-width:255px;text-align: center;'><img src=\"".$head_portrait.'" style="float:left;position:relative;top:-45%;width: 60px;margin-right:10px" class="goods-avatar"'.
               ' data-geo="<img src=\''.$head_portrait.'\' width=300px >">'.
               '<span title="'.$row['goods_name'].'" style="line-height: 20px;position:relative;top:-45%;float:left;width:165px;overflow:hidden;text-overflow:ellipsis;text-align:left">'.
               $row['goods_name']."<p></p><p></p><p>款号:".$row['goods_spu']."</p></span></td>";
           $xml .= "<td style='width:10%;text-align: center;'>".$row['brand_name']."</td>";
           $xml .= "<td style='width:10%;text-align: center;'>".$row['gc_name']."</td>";
           $xml .= "<td style='width:10%;text-align: center;'>".$stocks_price."</td>";
           $xml .= "<td style='width:10%;text-align: center;'>".$row['goods_marketprice']."</td>";
           $xml .= "<td style='width:10%;text-align: center;'>".$row['stock_amount']."</td>";
           $up_time = empty($row['goods_addtime'])?'--':date('Y-m-d H:i:s',$row['goods_addtime']);
           $xml .= "<td style='width:30%;text-align: center;'>".$up_time."</td>";
           $xml .= "</tr>";
       }
       echo $xml;exit;
   }

   /*库存重算*/
   public function recal_amount()
   {
       $this->common_function->pay_role("seller_stock_manage");//权限
       $store_id = $_SESSION['shop_spg_store_id'];
       $ids = isset ($_GET['id']) ? explode (',', $_GET['id']) :false;
       $num = '';
       $data = array('state'=>false,'msg'=>'操作失败');
       if ($ids) {
           $num = 0;
           $data = array('state'=>true,'msg'=>'操作成功！');
           //得到被授权的店铺对应的库存数据，需要goods_id，stocks_sn和size才能够确定数据唯一
           $rows = $this->db->from('store_stocks_amount ssa')->select('ssa.goods_id,ssa.stocks_sn,ssa.size,ssa.amount')
               ->join('store_auth_store sas','sas.auth_store_id = ssa.ssa_store_id','left')
               ->where('sas.store_id', $store_id)
               ->where_in("ssa.goods_id",$ids)
               ->group_by('ssa.ssa_store_id')
               ->get()->result_array();
           $arr = array('goods_id'=>'','stocks_sn'=>'','size'=>'');
           foreach ($rows as $row) {
               //如果相等，表示为同一个货品尺码的库存数据
               if ($arr['goods_id']==$row['goods_id'] && $arr['stocks_sn']==$row['stocks_sn'] && $arr['size']==$row['size']) {
                   $row['amount']+=$arr['amount'];
               }
               $arr = $row;
               $this->db->where('ssa_store_id',$store_id)
                   ->where('goods_id',$row['goods_id'])
                   ->where('stocks_sn',$row['stocks_sn'])
                   ->where('size',$row['size'])
                   ->update('store_stocks_amount', array('amount'=>$row['amount']))?$num++:'';
           }
           $data['num'] = $num;
       }
       echo json_encode ($data);exit;
   }
   
   /*清除门店库存为0 的数据*/
   public function clearAmount(){
       $this->common_function->pay_role("seller_del_stockamount");//权限
       $store_id = $_SESSION['shop_spg_store_id'];
       $value = array('state'=>false,'msg'=>'操作错误');
       if($store_id){
           $this->db->where('ssa_store_id',$store_id)->where('amount<=0')->delete('store_stocks_amount');
           $value = array('state'=>true,'msg'=>'清除完成');
       }
       echo json_encode($value);die;
   }
   
   /*修改某个商品的库存，价格数据*/
   public function updateAmount(){
       $this->common_function->pay_role("seller_edit_stockamount");//权限
       $store_id = $_SESSION['shop_spg_store_id'];
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
           if(empty($row)||empty($rows)){
               $value = array('state'=>false,'data'=>$rows,'row'=>$row,'msg'=>'商品还未入库暂时不能修改数据');
           }else{
               $value = array('state'=>true,'data'=>$rows,'row'=>$row);
           }
           echo json_encode($value);die;
       }
   }
   
   /*店铺商品库存修改*/
   public function update_goodsAmount(){
       $this->common_function->pay_role("seller_edit_stockamount");//权限
       $store_id =   $_SESSION['shop_spg_store_id'];
       $amount = isset($_POST['amount'])?trim($_POST['amount']):'';
       $id = (isset($_POST['id']) && !empty($_POST['id'])) ? trim($_POST['id']) : '';
       $date_from = isset($_POST['date_from'])?trim($_POST['date_from']):'';
       $date_to = isset($_POST['date_to'])?trim($_POST['date_to']):'';
       $brand_code = isset($_POST['brand_id'])?$_POST['brand_id']:'';
       $stock_sn = isset($_POST['stock_sn'])?trim($_POST['stock_sn']):'';
       $stock_name = isset($_POST['stock_name'])?trim($_POST['stock_name']):'';
       $where = " 1=1 ";
       $result = array('state'=>false,'msg'=>'操作错误');
       if(empty($amount)){
           $result = array('state'=>false,'msg'=>'库存数量不能为空');
           echo json_encode($result);exit;
       }
       if(empty($store_id)){
           echo json_encode($result);exit;
       }
       $time = time();
       $userid = $_SESSION['shop_spg_id'];
       $username = $_SESSION['shop_spg_nike_name'];
       if($id){
           $goods = $this->db->select('g.goods_id,g.goods_price,g.goods_marketprice,se.size,
	            se.stocks_price,se.stocks_marketprice,
	            se.stocks_sku,se.stocks_bar_code')
   	            ->from('shop_goods g')
   	            ->join('shop_goods_extend_attr se','se.goods_id=g.goods_id','left')
   	            ->where("g.goods_id in ($id)")
   	            ->get()->result_array();
           //print_r($goods);die;
           //$id_arr = explode(',',$id);
           foreach ($goods as $v){
               $arr = array();
               //$stock = explode(':',$v);
               $stock_check = $this->db->select('ssa_id')->where('stocks_sn',$v['stocks_sku'])->where('size',$v['size'])
               ->where('ssa_store_id',$store_id)->get('store_stocks_amount')->row('ssa_id');
               $arr['amount'] = $amount;
               $arr['update_time'] = $time;
               $arr['update_user_name'] = $username;
               $arr['update_user_id'] = $userid;
               $arr['update_user_type'] = 2;
               if($stock_check){
                   $this->db->where('ssa_id',$stock_check)->update('store_stocks_amount',$arr);
               }else{
                   $arr['ssa_store_id'] = $store_id;
                   $arr['goods_id'] = $v['goods_id'];
                   $arr['stocks_price'] = empty($v['stocks_price'])?$v['goods_price']:$v['stocks_price'];
                  // $arr['stocks_marketprice'] = empty($v['stocks_marketprice'])?$v['goods_marketprice']:$v['stocks_marketprice'];
                   $arr['stocks_bar_code'] = $v['stocks_bar_code'];
                   $arr['stocks_sn'] = $v['stocks_sku'];
                   $arr['size'] = $v['size'];
                   $this->db->insert('store_stocks_amount',$arr);
               }
           }
           $result = array('state'=>true,'msg'=>'修改完成');
          
       }else{
           if($date_from){
               $date_from = strtotime($date_from);
               $where .=" and sa.update_time>='{$date_from}' ";
           }
           if($date_to){
               $date_to = strtotime($date_to);
               $where .=" and sa.update_time<='{$date_to}' ";
           }
           if($brand_code){
               $brand_id = join(',',$brand_code);
               $where .=" and sg.brand_id IN ($brand_id) ";
           }else{
               $brand_code_arr = $this->db->select('s.brand_id,s.brand_name')->from('store_attr_brands as sb')
               ->join('shop_brand as s','s.brand_id=sb.brand_id')->where('sb.store_id',$store_id)
               ->get()->result_array();
               $brands = array();
               foreach ($brand_code_arr as $v){
                   $brands[] = $v['brand_id'];
               }
               $brands = join(',',$brands);
               if(empty($brands)){
                   $where .= " 1=2 ";
               }else{
                   $where .=" and sg.brand_id IN ($brands) ";
               }
           }
           if($stock_sn){
               $where .=" and sga.stocks_sku like '%{$stock_sn}%' ";
           }
           if($stock_name){
               $where .=" and sg.goods_name like '%{$stock_name}%' ";
           }
           $rows = $this->db->select('sa.ssa_id,sga.goods_id,sga.stocks_price,sga.stocks_marketprice,sga.stocks_bar_code,sga.size,sga.stocks_sku')
           ->from('shop_goods_extend_attr as sga')
           ->join('shop_goods as sg','sg.goods_id=sga.goods_id')
           ->join('store_stocks_amount as sa','sa.stocks_sn=sga.stocks_sku and sa.size=sga.size and sa.ssa_store_id='.$store_id,'left')
           ->where($where)->get()->result_array();
           //print_r($rows);exit;
           foreach ($rows as $v){
               $arr = array();
               $arr['amount'] = $amount;
               $arr['update_time'] = $time;
               $arr['update_user_name'] = $username;
               $arr['update_user_id'] = $userid;
               $arr['update_user_type'] = 2;
               if($v['ssa_id']){
                   $this->db->where('ssa_id',$v['ssa_id'])->update('store_stocks_amount',$arr);
               }else{
                   $arr['ssa_store_id'] = $store_id;
                   $arr['goods_id'] = $v['goods_id'];
                   $arr['stocks_price'] = $v['stocks_price'];
                   //$arr['stocks_marketprice'] = $v['stocks_marketprice'];
                   $arr['stocks_bar_code'] = $v['stocks_bar_code'];
                   $arr['stocks_sn'] = $v['stocks_sku'];
                   $arr['size'] = $v['size'];
                   $this->db->insert('store_stocks_amount',$arr);
               }
           }
           $result = array('state'=>true,'msg'=>'修改完成');
           
       }
        
       echo json_encode($result);exit;
   }
   
   public function updateStocks(){
       $this->common_function->pay_role("seller_edit_stockamount");//权限
       $goods_id = $_POST['id'];
       $store_id = $_SESSION['shop_spg_store_id'];;
       unset($_POST['id']);
       $goods = array();
       foreach ($_POST as $k=>$v){
           foreach ($v as $ka=>$va){
               $goods[$ka][$k]=$va;
           }
       }
       $sqlUp = array();$sqlIn = array();$time = time();
       $up_id = $_SESSION['shop_spg_id'];
       $up_name = $_SESSION['shop_spg_nike_name'];
       foreach ($goods as $k=>$v){
           $num = $this->db->select('ssa_id')->where('ssa_store_id',$store_id)->where('goods_ea_id',$v['goods_ea_id'])
           ->get('store_stocks_amount')->row('ssa_id');
           $sql = array(
               'amount'=>intval($v['amount']),'update_time'=>$time,'update_user_name'=>$up_name,
               'update_user_id'=>$up_id,'update_user_type'=>2,'stocks_price'=>$v['stocks_price'],
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
   
   /*按条码导入库存*/
   public function storeGoodsBarcode_import(){
       $this->common_function->pay_role("seller_stock_import");//权限
       // EXCEL 文件上传
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
            exit();
        }
        
        
        $firstinfo = $goods_list[0];
        $firstinfo[] = @mb_convert_encoding('错误信息', "GBK", "UTF-8");
        unset($goods_list[0]);
        $fp = @fopen($errorpath, 'a');
        @fputcsv($fp,$firstinfo);

        
        $totalinfo = $goods_list;
        $rows = count($totalinfo); // 取得总行数
        if($rows>50000){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>按条码导入库存,一次最多导入50000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
        $all_num = $rows;
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
        $auth_brand = array();
        $error_col = 'D';
        $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$condition['store_id'])->get('store_attr_brands')->result_array();
        foreach ($auth_brand_arr as $v){
            $auth_brand[] = $v['brand_id'];
        }
        $user_id = $_SESSION['shop_spg_id'];
        $user_name = $_SESSION['shop_spg_nike_name'];
        $user_type = 2;
        $time = time();
        if(isset($condition['type'])&&$condition['type']==1){
            $update = array(
                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>2,
            );
            $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);
        }
         
        $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;
            $counterror = count($error);
            $flag = false;
            $false_msg ='';
            $false_msgs = '';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            // 条码<必填>
            $excel['barcode'] = strtoupper(trim($this->common_function->gstr($val[0])));
            if (empty( $excel['barcode'] )) {
                $false_msgs = @mb_convert_encoding("商品条形码必填", "GBK", "UTF-8");
                $false_msg .= "商品条形码必填";
                $flag = true;
            }else{
                $check_goods = $this->db->select('g.brand_id,ea.*')->from('shop_goods g')
                ->join('shop_goods_extend_attr ea','ea.goods_id=g.goods_id')
                ->where('ea.stocks_bar_code',$excel['barcode'])
                ->where("(g.goods_pos={$condition['store_id']} or g.goods_pos=0)")->where('g.goods_state!=0')
                ->order_by('g.goods_pos','DESC')->group_by('g.goods_id')->get()->result_array();
                $check_barcode = isset($check_goods[0])?$check_goods[0]:'';
                if(empty($check_barcode)){
                    $false_msgs = @mb_convert_encoding("此条码对应的商品不存在", "GBK", "UTF-8");
                    $false_msg .= "此条码对应的商品不存在";
                    $flag = true;
                }elseif(!in_array($check_barcode['brand_id'], $auth_brand)){
                    $false_msgs = @mb_convert_encoding("此商品品牌还未给此门店授权", "GBK", "UTF-8");
                    $false_msg .= "此商品品牌还未给此门店授权";
                    $flag = true;
                }
            }
            //库存<必填>
            $excel ['amount'] = intval($this->common_function->gstr($val[1]));
            if (empty ( $excel ['amount'])) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("库存必填", "GBK", "UTF-8");
                }
                $false_msg .= "库存必填";
                $flag = true;
            }
            //售价
            //$excel ['stocks_price'] = trim($this->common_function->gstr($val[2]));
            if (! $flag) {
                //print_r($check_ea_id);die;
                 
                $check_amount = $this->db->select('ssa_id,amount,update_time')->where('goods_ea_id',$check_barcode ['goods_ea_id'])
                ->where('ssa_store_id',$condition ['store_id'])
                ->get('store_stocks_amount')->row_array();
                if($check_amount['ssa_id']){
                    if($check_amount['update_time']==$time){
                        $amount = $excel['amount']+$check_amount['amount'];
                    }else{
                        $amount = $excel['amount'];
                    }
                    $update_data = array(
                        'amount'=>$amount,'update_time'=>$time,'update_user_name'=>$user_name,
                        'update_user_id'=>$user_id,'update_user_type'=>$user_type,'stocks_bar_code'=>strtoupper($check_barcode['stocks_bar_code']),
                        'stocks_sn'=>strtoupper($check_barcode['stocks_sku']),
                    );
                 /*    if(!empty($excel ['stocks_price'])){
                        $update_data['stocks_price'] = $excel['stocks_price'];
                    } */
                    $this->db->update('store_stocks_amount',$update_data,array('ssa_id'=>$check_amount['ssa_id']));
                }else{
                    $check_barcode['stocks_price'] = $check_barcode ['stocks_price'];
                    $sql_amount = array(
                        'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$check_barcode ['color'],
                        'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$check_barcode['color_remark'],
                        'stocks_sn'=>strtoupper($check_barcode ['stocks_sku']),'size'=>strtoupper($check_barcode ['size']),'ssa_store_id'=>$condition ['store_id'],
                        'stocks_price'=>$check_barcode['stocks_price'],'goods_ea_id'=>$check_barcode['goods_ea_id'],'goods_size_remark'=>$check_barcode['size_note'],
                        'stocks_bar_code'=>$excel['barcode'],'goods_id'=>$check_barcode['goods_id']
                    );
                    $this->db->insert('store_stocks_amount',$sql_amount);
                }
                 
                $add_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                echo "<script language='javascript'>" .
                    //'$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                }
                unset($excel);
                 
    
            } else { // 有错误的EXCEL行
                $is_download = true;
                $error[] = $false_msgs;
                @fputcsv($fp,$error);
                $error_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                echo "<script language='javascript'>" .
                    //'$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                }
                unset($excel);
            }
            ob_end_flush();
            ob_flush();
            flush();
            /* if ($now_run % 100 == 0){
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
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
        //@unlink($excelpath);
        exit();
   }
   
   /*按款号导入库存*/
   public function storeGoodsSku_import(){
       $this->common_function->pay_role("seller_stock_import");//权限
       // EXCEL 文件上传
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
            exit();
        }
        
        
        $firstinfo = $goods_list[0];
        $firstinfo[] = @mb_convert_encoding('错误信息', "GBK", "UTF-8");
        unset($goods_list[0]);
        $fp = @fopen($errorpath, 'a');
        @fputcsv($fp,$firstinfo);

        
        $totalinfo = $goods_list;
        $rows = count($totalinfo); // 取得总行数
        if($rows>10000){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>按款号导入库存,一次最多导入10000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
        $all_num = $rows;
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
        $auth_brand = array();
        $error_col = 'I';
        $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$condition['store_id'])->get('store_attr_brands')->result_array();
        foreach ($auth_brand_arr as $v){
            $auth_brand[] = $v['brand_id'];
        }
        $user_id = $_SESSION['shop_spg_id'];
        $user_name = $_SESSION['shop_spg_nike_name'];
        $user_type = 2;
        $time = time();
        if(isset($condition['type'])&&$condition['type']==1){
            $update = array(
                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>2,
            );
            $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);
        }
         
        $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;
            $counterror = count($error);
            $flag = false;
            $false_msg ='';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            // 品牌<必填>
            
            $brand_name = trim($this->common_function->gstr($val[0]));
            if (empty( $brand_name )) {
                 $false_msgs = @mb_convert_encoding("品牌必填", "GBK", "UTF-8");
                 $false_msg .= "品牌必填";
                 $flag = true;
            }else{
                $brand_id = $this->db->select('brand_id')->where('brand_name',$brand_name)->get('shop_brand')->row('brand_id');
                if(empty($brand_id)){
                    $false_msgs = @mb_convert_encoding("系统还未添加此品牌", "GBK", "UTF-8");
                    $false_msg .= "系统还未添加此品牌";
                    $flag = true;
                }elseif(!in_array($brand_id, $auth_brand)){
                    $false_msgs = @mb_convert_encoding("此品牌还未给此门店授权", "GBK", "UTF-8");
                    $false_msg .= "此品牌还未给此门店授权";
                    $flag = true;
                }
            }
            // 款号<必填>
            $excel ['stocks_spu'] = strtoupper(trim($this->common_function->gstr($val[1])));
            if (empty( $excel ['stocks_spu'] )) {
                if(empty($false_msgs)){
                       $false_msgs = @mb_convert_encoding("款号必填", "GBK", "UTF-8");
                }
                $false_msg .= "款号必填";
                $flag = true;
            }else{
                //查找商品id
                if(!$flag){
                    $check_stock = $this->db->select('sg.goods_id')->from('shop_goods as sg')
                    ->where('sg.goods_spu',$excel ['stocks_spu'])
                    ->where("(sg.goods_pos={$condition['store_id']} or sg.goods_pos=0)")->where('sg.goods_state!=0')
                    ->where('sg.brand_id',$brand_id)->order_by('sg.goods_pos','DESC')->group_by('sg.goods_id')->get()->result_array();
                    $check_stock = isset($check_stock[0])?$check_stock[0]:'';
                    //print_r($check_stock);die;
                    if(empty($check_stock['goods_id'])){
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("款号不存在", "GBK", "UTF-8");
                        }
                        $false_msg .= "款号不存在";
                        $flag = true;
                    }else{
                        $excel['brand_id'] = $brand_id;
                        $excel['goods_id'] = $check_stock['goods_id'];
                    }
    
                }
                 
            }
            //主色<必填>
            $excel ['color'] = trim($this->common_function->gstr($val[2]));
            if ( $excel ['color']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("主色必填", "GBK", "UTF-8");
                }
                $false_msg .= "主色必填";
                $flag = true;
            }
            //颜色<必填>
            $excel ['color_remark'] = trim($this->common_function->gstr($val[3]));
            if ( $excel ['color_remark']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("颜色必填", "GBK", "UTF-8");
                }
                $false_msg .= "颜色必填";
                $flag = true;
            }
            if(!$flag){
                //查找goods_a_id
                $check_color = $this->db->select('goods_a_id')->from('shop_goods_extend')
                ->where('goods_id',$excel['goods_id'])->where('color_remark',$excel ['color_remark'])->where('color',$excel ['color'])
                ->get()->row_array();
                if(empty($check_color)){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("此货不存在该颜色", "GBK", "UTF-8");
                    }
                    $false_msg .= "此货不存在该颜色";
                    $flag = true;
                }else{
                    $excel['goods_a_id'] = $check_color['goods_a_id'];
                }
            }
            //尺码<必填>
            //$excel ['size'] = strtoupper(trim($this->common_function->gstr($val[4])));
            if ( $excel ['size']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("尺码必填", "GBK", "UTF-8");
                }
                $false_msg .= "尺码必填";
                $flag = true;
            }
            if(!$flag){
                $gc_id = $this->db->select('s.size')->from('code_segment_size s')
                ->join('shop_brand b','b.brand_size_type=s.flag')
                ->join('shop_goods g','g.brand_id=b.brand_id')
                ->where('s.size',$excel['size'])->where('g.goods_id',$excel['goods_id'])
                ->get()->row('size');
                if($gc_id==''){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("尺码不存在。请先添加此类商品的尺码", "GBK", "UTF-8");
                    }
                    $false_msg .= "尺码不存在。请先添加此类商品的尺码";
                    $flag=true;
                }
    
            }
            //库存<必填>
            $excel ['amount'] = intval($this->common_function->gstr($val[5]));
            if (empty ( $excel ['amount'])) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("库存必填", "GBK", "UTF-8");
                }
                $false_msg .= "库存必填";
                $flag = true;
            }
            //条码
            $excel ['stocks_bar_code'] = strtoupper(trim($this->common_function->gstr($val[6])));
            if(!$flag){
                $check_ea_id = $this->db->select('stocks_bar_code,goods_ea_id,size_note,stocks_sku,stocks_price')->where('goods_a_id',$excel ['goods_a_id'])
                ->where('size',$excel ['size'])->get('shop_goods_extend_attr')->row_array();
                if(!empty($check_ea_id)){
                    if(!empty($check_ea_id['stocks_bar_code'])){
                        if(!empty($excel ['stocks_bar_code'])&&$check_ea_id['stocks_bar_code']!=$excel ['stocks_bar_code']){
                            if(empty($false_msgs)){
                                $false_msgs = @mb_convert_encoding("该 商品的条形码已存在且不与该条形码相同", "GBK", "UTF-8");
                            }
                            $false_msg .= "该 商品的条形码已存在且不与该条形码相同";
                            $flag = true;
                        }
                    }
                    if(!empty($excel ['stocks_bar_code'])){
                        $check_bar_code = $this->db->select('goods_ea_id')->where('stocks_bar_code',$excel ['stocks_bar_code'])
                        ->where('g.goods_state!=0')->get('shop_goods_extend_attr')->row_array();
                        if(!empty($check_bar_code)){
                            if($check_bar_code['goods_ea_id']!=$check_ea_id['goods_ea_id']){
                                if(empty($false_msgs)){
                                    $false_msgs = @mb_convert_encoding("该条形码已有其他商品占用", "GBK", "UTF-8");
                                }
                                $false_msg .= "该条形码已有其他商品占用";
                                $flag = true;
                            }
                        }
                    }
                }
    
            }
            //售价
            $excel ['stocks_price'] = trim($this->common_function->gstr($val[7]));
            if (! $flag) {
                //print_r($check_ea_id);die;
                if(!empty($check_ea_id)){
                    $check_amount = $this->db->select('ssa_id,amount,update_time')->where('goods_ea_id',$check_ea_id ['goods_ea_id'])
                    ->where('ssa_store_id',$condition ['store_id'])
                    ->get('store_stocks_amount')->row_array();
                    if($check_amount['ssa_id']){
                        if($check_amount['update_time']==$time){
                            $amount = $excel['amount']+$check_amount['amount'];
                        }else{
                            $amount = $excel['amount'];
                        }
                        $update_data = array(
                            'amount'=>$amount,'update_time'=>$time,'update_user_name'=>$user_name,
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,
                        );
                        /* if(!empty($excel ['stocks_price'])){
                            $update_data['stocks_price'] = $excel['stocks_price'];
                        } */
                        if(!empty($excel['stocks_bar_code'])){
                            $update_data['stocks_bar_code'] = $excel['stocks_bar_code'];
                        }elseif(!empty($check_ea_id['stocks_bar_code'])){
                            $update_data['stocks_bar_code'] = $check_ea_id['stocks_bar_code'];
                        }
                        $this->db->update('store_stocks_amount',$update_data,array('ssa_id'=>$check_amount['ssa_id']));
                    }else{
                         
                        $sql_amount = array(
                            'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$excel ['color'],
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$excel['color_remark'],
                            'stocks_sn'=>strtoupper($check_ea_id ['stocks_sku']),'size'=>strtoupper($excel ['size']),'ssa_store_id'=>$condition ['store_id'],
                            'stocks_price'=>$check_ea_id['stocks_price'],'goods_ea_id'=>$check_ea_id['goods_ea_id'],'goods_size_remark'=>$check_ea_id['size_note'],
                            'stocks_bar_code'=>strtoupper($check_ea_id['stocks_bar_code']),'goods_id'=>$excel['goods_id']
                        );
                        /* if(!empty($excel ['stocks_price'])){
                            $sql_amount['stocks_price'] = $excel['stocks_price'];
                        } */
                        if(!empty($excel['stocks_bar_code'])){
                            $sql_amount['stocks_bar_code'] = $excel['stocks_bar_code'];
                        }
                        $this->db->insert('store_stocks_amount',$sql_amount);
                    }
                    if(empty($check_ea_id['stocks_bar_code'])&&!empty($excel['stocks_bar_code'])){
                        $this->db->update('shop_goods_extend_attr',array('stocks_bar_code'=>$excel['stocks_bar_code']),array('goods_ea_id'=>$check_ea_id['goods_ea_id']));
                    }
                }else{
                    $check_ea_id = $this->db->select('*')->where('goods_a_id',$excel ['goods_a_id'])
                    ->where(" (size is null or size='')")->get('shop_goods_extend_attr')->row_array();
                    //print_r($check_ea_id);die;
                    if(!empty($check_ea_id)){
                        $sql_ea = array(
                            'size'=>strtoupper($excel['size'])
                        );
                       /*  if(empty($check_ea_id['stocks_price'])&&$excel['stocks_price']!=''){
                            $sql_ea['stocks_price'] = $excel['stocks_price'];
                        } */
                        if(empty($check_ea_id['stocks_bar_code'])&&!empty($excel['stocks_bar_code'])){
                            $sql_ea['stocks_bar_code'] = $excel['stocks_bar_code'];
                        }
                        $excel['stocks_price'] = $check_ea_id['stocks_price'];
                        $excel['stocks_bar_code'] = empty($excel['stocks_bar_code'])?strtoupper($check_ea_id['stocks_bar_code']):$excel['stocks_bar_code'];
                        $sql_amount = array(
                            'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$check_ea_id ['color'],
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$check_ea_id['color_remark'],
                            'stocks_sn'=>strtoupper($check_ea_id ['stocks_sku']),'size'=>strtoupper($excel ['size']),'ssa_store_id'=>$condition ['store_id'],
                            'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$check_ea_id['goods_ea_id'],'goods_size_remark'=>$check_ea_id['size_note'],
                            'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$check_ea_id['goods_id']
                        );
                        $this->db->update('shop_goods_extend_attr',$sql_ea,array('goods_ea_id'=>$check_ea_id['goods_ea_id']));
                        $this->db->insert('store_stocks_amount',$sql_amount);
                    }else{
                        $ea_arr = $this->db->select('goods_a_id,goods_id,color,color_value,color_remark,size_note,stocks_price,stocks_marketprice,stocks_sku,stocks_bar_code')
                        ->where('goods_a_id',$excel['goods_a_id'])->limit(1)->get('shop_goods_extend_attr')->row_array();
                        //print_r($ea_arr);die;
                        $sql_ea = $ea_arr;
                        //$sql_ea['stocks_price'] = empty($sql_ea['stocks_price'])?$excel['stocks_price']:$sql_ea['stocks_price'];
                        $sql_ea['stocks_bar_code'] = $excel['stocks_bar_code'];
                        $sql_ea['size'] = strtoupper($excel['size']);
                        $sql_ea['size_note'] = '';
                        $this->db->insert('shop_goods_extend_attr',$sql_ea);
                        $goods_ea_id = $this->db->insert_id();
                        $excel['stocks_price'] = $sql_ea['stocks_price'];
                        $sql_amount = array(
                            'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$ea_arr ['color'],
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$ea_arr['color_remark'],
                            'stocks_sn'=>strtoupper($ea_arr ['stocks_sku']),'size'=>$excel ['size'],'ssa_store_id'=>$condition ['store_id'],
                            'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$goods_ea_id,'goods_size_remark'=>$ea_arr['size_note'],
                            'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$ea_arr['goods_id']
                        );
                        $this->db->insert('store_stocks_amount',$sql_amount);
                    }
                }
                $add_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                echo "<script language='javascript'>" .
                    //'$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                }
                unset($excel);
                 
    
            } else { // 有错误的EXCEL行
                $error[] = $false_msgs;
                @fputcsv($fp,$error);
                $is_download = true;
                $error_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                echo "<script language='javascript'>" .
                    //'$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                }
                unset($excel);
            }
            @fclose($fp);
            ob_end_flush();
            ob_flush();
            flush();
       /*      if ($now_run % 100 == 0){
                sleep(1);
            } */
        }
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
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
        //@unlink($excelpath);
        exit();
   }
   
   /*按货号导入库存*/
   public function storeGoods_import(){
       $this->common_function->pay_role("seller_stock_import");//权限
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
            exit();
        }
        
        
        $firstinfo = $goods_list[0];
        $firstinfo[] = @mb_convert_encoding('错误信息', "GBK", "UTF-8");
        unset($goods_list[0]);
        $fp = @fopen($errorpath, 'a');
        @fputcsv($fp,$firstinfo);

        
        $totalinfo = $goods_list;
        $rows = count($totalinfo); // 取得总行数
        if($rows>30000){
            
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>按货号导入库存,一次最多导入30000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }
        $all_num = $rows;
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
        $auth_brand = array();
        if(isset($condition['store_id'])){
            $error_col = 'G';
            $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$condition['store_id'])->get('store_attr_brands')->result_array();
            foreach ($auth_brand_arr as $v){
                $auth_brand[] = $v['brand_id'];
            }
        }else{
            $error_col = 'H';
        }
        $user_id = $_SESSION['shop_spg_id'];
        $user_name = $_SESSION['shop_spg_nike_name'];
        $user_type = 1;
        $time = time();
        if(isset($condition['type'])&&$condition['type']==1){
            $update = array(
                'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>2,
            );
            if(isset($condition['store_id'])){
                $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);
            }else{
                $this->db->update('store_stocks_amount',$update);
            }
        }
        $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;
            
            $counterror = count($error);
            $flag = false;
            $false_msg ='';
            $false_msgs = '';
            $now_run++;
            $percent = intval(($now_run/$rows)*100);
            ob_clean();
            ob_start();
            // 品牌<必填>
            $brand_name = trim($this->common_function->gstr($val[0]));
            if (empty( $brand_name )) {
                $false_msgs = @mb_convert_encoding("品牌必填", "GBK", "UTF-8");
                $false_msg .= "品牌必填";
                $flag = true;
            }else{
                $brand_id = $this->db->select('brand_id')->where('brand_name',$brand_name)->get('shop_brand')->row('brand_id');
                if(empty($brand_id)){
                    $false_msgs = @mb_convert_encoding("系统还未添加此品牌", "GBK", "UTF-8");
                    $false_msg .= "系统还未添加此品牌";
                    $flag = true;
                }
            }
            // 货号<必填>
            $excel ['stocks_sn'] = strtoupper(trim($this->common_function->gstr($val[1])));
            if (empty( $excel ['stocks_sn'] )) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("货号必填", "GBK", "UTF-8");
                }
                $false_msg .= "货号必填";
                $flag = true;
            }else{
                if(!$flag){
                    $check_stock_arr = $this->db->select('sg.goods_id,se.goods_a_id')->from('shop_goods as sg')
                    ->join('shop_goods_extend_attr as se','se.goods_id=sg.goods_id')
                    ->where('se.stocks_sku',$excel ['stocks_sn'])
                    ->where('sg.brand_id',$brand_id)->where("(sg.goods_pos={$condition['store_id']} or sg.goods_pos=0)")->where('sg.goods_state!=0')
                    ->order_by('sg.goods_pos','DESC')
                    ->group_by('sg.goods_id')
                    ->get()->result_array();
                    $check_stock = isset($check_stock_arr[0])?$check_stock_arr[0]:'';
                    if(empty($check_stock['goods_id'])){
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("货号不存在", "GBK", "UTF-8");
                        }
                        $false_msg .= "货号不存在";
                        $flag = true;
                    }else{
                        $excel['brand_id'] = $brand_id;
                        $excel['goods_id'] = $check_stock['goods_id'];
                    }
    
                }
    
            }
            //尺码<必填>
            $excel ['size'] = strtoupper(trim($this->common_function->gstr($val[2])));
            if ( $excel ['size']=='' ) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("尺码必填", "GBK", "UTF-8");
                }
                $false_msg .= "尺码必填";
                $flag = true;
            }
            if(!$flag){
                $gc_id = $this->db->select('s.size')->from('code_segment_size s')
                ->join('shop_brand b','b.brand_size_type=s.flag')
                ->join('shop_goods g','g.brand_id=b.brand_id')
                ->where('s.size',$excel['size'])->where('g.goods_id',$excel['goods_id'])
                ->get()->row('size');
                if($gc_id==''){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("该尺码不存在,请先添加此类商品的尺码", "GBK", "UTF-8");
                    }
                    $false_msg .= "该尺码不存在,请先添加此类商品的尺码";
                    $flag=true;
                }
                 
            }
            //库存<必填>
            $excel ['amount'] = intval($this->common_function->gstr($val[3]));
            if (empty ( $excel ['amount'])) {
                if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("库存必填", "GBK", "UTF-8");
                }
                 $false_msg .="库存必填";
                $flag = true;
            }
            //条码
            $excel ['stocks_bar_code'] = strtoupper(trim($this->common_function->gstr($val[4])));
            if(!empty($excel ['stocks_bar_code'])&&!$flag){
                $check_bar_code = $this->db->select('ea.stocks_bar_code,ea.goods_ea_id,ea.size_note,ea.stocks_sku,ea.stocks_price')
                ->from('shop_goods_extend_attr ea')->join('shop_goods g','g.goods_id=ea.goods_id')
                ->where('ea.stocks_bar_code',$excel ['stocks_bar_code'])->where('g.goods_state!=0')
                ->get()->row_array();
                 
                $check_goods_barcode = $this->db->select('stocks_bar_code,goods_ea_id')->where('stocks_sku',$excel ['stocks_sn'])
                ->where('size',$excel ['size'])->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                $check_barcode = isset($check_goods_barcode['stocks_bar_code'])?strtoupper($check_goods_barcode['stocks_bar_code']):'';
                if(!empty($check_goods_barcode)){
                    if(!empty($check_bar_code)&&$check_bar_code['goods_ea_id']!=$check_goods_barcode['goods_ea_id']){
                        if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("该条形码已有其他商品占用", "GBK", "UTF-8");
                        }
                        $false_msg .="该条形码已有其他商品占用";
                        $flag = true;
                    }
                }
                if($check_barcode&&$check_barcode!=$excel ['stocks_bar_code']&&!$flag){
                    if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("该货号该尺码对应 商品的条形码已存在且不与该条形码相同", "GBK", "UTF-8");
                    }
                     $false_msg .="该货号该尺码对应 商品的条形码已存在且不与该条形码相同";
                     $flag = true;
                }
            }
            //售价
            //$excel ['stocks_price'] = trim($this->common_function->gstr($val[5]));
    
            if (! $flag) {
                $check_flag = true;
                if(!isset($condition['store_id'])){
                    $check_name = $this->db->select('store_id')->where('ous_out_sn',$excel ['ssa_store_code'])->get('store')->row('store_id');
                    if($check_name){
                        $excel ['store_id'] = $check_name;
                        $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$excel['store_id'])->get('store_attr_brands')->result_array();
                        $auth_brand = array();
                        foreach ($auth_brand_arr as $v){
                            $auth_brand[] = $v['brand_id'];
                        }
                        if(!in_array($excel['brand_id'], $auth_brand)){
                            if(empty($false_msgs)){
                             $false_msgs = @mb_convert_encoding("该门店未给此商品授权", "GBK", "UTF-8");
                            }
                            $false_msg .="该门店未给此商品授权";
                            $check_flag = false;
                        }
                    }else{
                        if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("不存在该门店", "GBK", "UTF-8");
                        }
                        $false_msg .= "不存在该门店";
                        $check_flag = false;
                    }
                }else{
                    if(in_array($excel['brand_id'], $auth_brand)){
                        $excel ['store_id'] = $condition['store_id'];
                    }else{
                        if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("该门店未给此商品授权", "GBK", "UTF-8");
                        }
                        $false_msg .= "该门店未给此商品授权";
                        $check_flag = false;
                    }
    
                }
                if($check_flag){
    
                    $check_amount = $this->db->select('ssa_id,amount,update_time')->where('stocks_sn',$excel ['stocks_sn'])
                    ->where('size',$excel ['size'])->where('ssa_store_id',$excel ['store_id'])->where('goods_id',$excel ['goods_id'])
                    ->get('store_stocks_amount')->row_array();
                    if($check_amount['ssa_id']){
                        if($check_amount['update_time']==$time){
                            $amount = $excel['amount']+$check_amount['amount'];
                        }else{
                            $amount = $excel['amount'];
                        }
                        $update_data = array(
                            'amount'=>$amount,'update_time'=>$time,'update_user_name'=>$user_name,
                            'update_user_id'=>$user_id,'update_user_type'=>$user_type,
                        );
                        /* if(!empty($excel ['stocks_price'])){
                            $update_data['stocks_price'] = $excel['stocks_price'];
                        } */
                        if(!empty($excel['stocks_bar_code'])){
                            $update_data['stocks_bar_code'] = strtoupper($excel['stocks_bar_code']);
                        }
                        $this->db->update('store_stocks_amount',$update_data,array('ssa_id'=>$check_amount['ssa_id']));
                    }else{
                        $stock_price = $this->db->select('goods_ea_id,size_note,stocks_bar_code,color,goods_id,stocks_price,stocks_marketprice,color_remark')->where('size',$excel ['size'])
                        ->where('stocks_sku',$excel ['stocks_sn'])->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                        if(!empty($stock_price)){
                            $excel['stocks_marketprice'] = $stock_price['stocks_marketprice'];
                            $excel['stocks_price'] = $stock_price['stocks_price'];
                            if(empty($excel ['stocks_bar_code'])){
                                $excel['stocks_bar_code'] = strtoupper($stock_price['stocks_bar_code']);
                            }//'stocks_marketprice'=>$excel['stocks_marketprice'],
                            $this->db->insert('store_stocks_amount',array(
                                'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$stock_price ['color'],
                                'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$stock_price['color_remark'],
                                'stocks_sn'=>strtoupper($excel ['stocks_sn']),'size'=>strtoupper($excel ['size']),'ssa_store_id'=>$excel ['store_id'],
                                'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$stock_price['goods_ea_id'],'goods_size_remark'=>$stock_price['size_note'],
                                'stocks_bar_code'=>strtoupper($excel['stocks_bar_code']),'goods_id'=>$stock_price['goods_id']
                            ));
                        }else{
                            $stock_price = $this->db->select('goods_ea_id,stocks_bar_code,color,goods_id,stocks_price,stocks_marketprice,color_remark')
                            ->where('stocks_sku',$excel ['stocks_sn'])->where(" (size is null or size='')")->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                            $excel['stocks_marketprice'] = $stock_price['stocks_marketprice'];
                            $excel['stocks_price'] = $stock_price['stocks_price'];
                            if(empty($excel ['stocks_bar_code'])){
                                $excel['stocks_bar_code'] = strtoupper($stock_price['stocks_bar_code']);
                            }//'stocks_marketprice'=>$excel['stocks_marketprice'],
                            if(empty($stock_price)){
                                $stock_price = $this->db->select('goods_a_id,color,color_value,color_remark,stocks_bar_code,goods_id,stocks_price,stocks_marketprice')
                                ->where('stocks_sku',$excel ['stocks_sn'])->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                                $this->db->insert('shop_goods_extend_attr',array('goods_id'=>$stock_price ['goods_id'],
                                    'goods_a_id'=>$stock_price ['goods_a_id'],'color'=>$stock_price ['color'],
                                    'color_value'=>$stock_price['color_value'],'color_remark'=>$stock_price['color_remark'],
                                    'size'=>$excel ['size'],'stocks_sku'=>$excel ['stocks_sn'],'stocks_marketprice'=>$stock_price['stocks_marketprice'],
                                    'stocks_price'=>$excel['stocks_price'],'stocks_bar_code'=>$excel['stocks_bar_code'],
                                ));
                                $goods_ea_id = $this->db->insert_id();
                                $this->db->insert('store_stocks_amount',array(
                                    'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,
                                    'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$stock_price['color_remark'],
                                    'stocks_sn'=>$excel ['stocks_sn'],'size'=>$excel ['size'],'ssa_store_id'=>$excel ['store_id'],
                                    'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$goods_ea_id,'color'=>$stock_price ['color'],
                                    'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$stock_price['goods_id']
                                ));
                            }else{
                                $this->db->update('shop_goods_extend_attr',array('size'=>$excel ['size'],'stocks_marketprice'=>$stock_price['stocks_marketprice'],
                                    'stocks_price'=>$excel['stocks_price'],'stocks_bar_code'=>$excel['stocks_bar_code'],
                                ),array('goods_ea_id'=>$stock_price['goods_ea_id']));
                                $this->db->insert('store_stocks_amount',array(
                                    'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$stock_price ['color'],
                                    'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$stock_price['color_remark'],
                                    'stocks_sn'=>$excel ['stocks_sn'],'size'=>$excel ['size'],'ssa_store_id'=>$excel ['store_id'],
                                    'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$stock_price['goods_ea_id'],
                                    'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$stock_price['goods_id']
                                ));
                            }
                        }
    
                    }
                    $add_num++;
                    echo "<script language='javascript'>" .
                        //'$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                    unset($excel);
    
                }else{
                    $is_download = true;
                    $error[] = $false_msgs;
                    @fputcsv($fp,$error);
                    $error_num++;
                    if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                    echo "<script language='javascript'>" .
                        //'$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                        '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                        "location.href = '#anchor';" .
                        "</script>";
                    }
                    unset($excel);
                }
            } else { // 有错误的EXCEL行
                $error[] = $false_msgs;
                @fputcsv($fp,$error);
                $is_download = true;
                $error_num++;
                if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                echo "<script language='javascript'>" .
                    //'$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                    '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                    "location.href = '#anchor';" .
                    "</script>";
                }
                unset($excel);
            }
            ob_end_flush();
            ob_flush();
            flush();
          /*   if ($now_run % 100 == 0){
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
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>下载错误列表</a></p>\");".
                "</script>";
        }else{
            echo "<script language='javascript'>" .
                '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
                "</script>";
        }
        //@unlink($excelpath);
        exit();
   }
   
   
   //盘点区域管理
   public function stock_checking(){
       $this->common_function->pay_role("seller_inventory");//权限
       if(isset($_GET['op']) && $_GET['op']=='get_list'){
           $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
           $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
            
           $start = ($page - 1) * $rp;
            
           $this->db->from ('store_inventory_area');
           $this->db->where ("store_id",$_SESSION['shop_spg_store_id']);
           $db = clone($this->db);
           $total = $this->db->count_all_results ();
           $this->db->select ('sia_id,sia_area_name,create_time');
           $this->db = $db;
           $this->db->limit ($rp, $start);
           $this->db->order_by ('create_time', 'DESC');
           $rows = $this->db->get ()->result_array ();
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
               $this->db->select ('si_id,area_id,input_time,si_num');
               $this->db->from ('store_inventory');
               $this->db->where ("area_id",$row['sia_id']);
               $this->db->order_by ('input_time', 'DESC');
               $input_info = $this->db->get ()->result_array ();
               $row['input_time'] ='';
               $row['total_num'] =0;
               if($input_info){
                   $row['input_time'] =$input_info[0]['input_time'];
                   foreach ($input_info as $key=>$val){
                       $row['total_num']+=$val['si_num'];
                   }
               }
               $row['create_time'] = !empty($row['create_time']) ? date('Y/m/d H:i:s',$row['create_time']) : '';
               $row['input_time'] = !empty($row['input_time']) ? date('Y/m/d H:i:s',$row['input_time']) : '';
               
               $xml .= "<tr data-id='".$row['sia_id']."'>";
               $xml .= '<td style="width:10%;text-align: center;" data-id="' . $row['sia_id'] . '" ><input class="ml15" type="checkbox" value="' . $row['sia_id'] . '" name="check"></td>';
               $xml .= "<td style='width:10%;text-align: center;'>".$row['sia_area_name']."</td>";
               $xml .= "<td style='width:20%;text-align: center;'>".$row['create_time']."</td>";
               $xml .= "<td style='width:10%;text-align: center;' >". $row['total_num'] ."</td>";
               $xml .= "<td style='width:20%;text-align: center;'>".$row['input_time']."</td>";
               $xml .= "<td style='width:30%;text-align: center;'>
                           <a class='btn btn-danger radius' onclick='fg_delete(" . $row['sia_id'] .",".json_encode($row['sia_area_name']).")'>删除</a>
                           <a class='btn btn-primary radius' onclick='make_name(" . json_encode($row) . ")'>重命名</a>
                           <a class='btn btn-success radius' href='inventory_data_entry?sia_id=" . $row['sia_id'] ."'>录入</a>
                           <a class='btn btn-secondary radius' onclick='copy_data("  . $row['sia_id'] .",".json_encode($row['sia_area_name']).")'>复制</a>
                           <a class='btn btn-primary radius' href='inventory_data_entry?op=continue&sia_id=" . $row['sia_id'] ."'>盘点数据</a>
                         </td>";
                $xml .= "</tr>";
           }
           echo $xml;exit;
       }
       $this->smarty->assign ('url', base_url ('pay.php/stock/stock_checking?op=get_list'));
       $this->smarty->display('stock_checking.html');
   }
   
   //新增、重命名区域
   public  function add_make_area(){
       $this->common_function->pay_role("seller_inventory_add_area");//权限
       $return = array('state'=>false,'msg'=>"区域编辑失败,请稍后再试");
       if(!(isset($_POST['area_name']) && !empty($_POST['area_name']))){
           echo json_encode($return);exit();
       }
       
       $ids = $this->db->select('sia_id')->where('sia_area_name',trim($_POST['area_name']))->where('store_id',$_SESSION['shop_spg_store_id'])->get('store_inventory_area')->row('sia_id');
       if($ids){
           $result['msg'] = '此区域名称已存在';
           echo json_encode($return);exit();
       }
       if(!empty($_POST['sia_id'])){//重命名区域
           if($this->db->update('store_inventory_area',array('sia_area_name'=>trim($_POST['area_name'])),array('sia_id'=>$_POST['sia_id']))){
               $return['state']=true;
               $return['msg']='区域重命名成功';
           }
       }else{// 新增区域       
           
           if($this->db->insert('store_inventory_area',array('store_id'=>$_SESSION['shop_spg_store_id'],'sia_area_name'=>$_POST['area_name'],'create_time'=>time()))){
               $return['state']=true;
               $return['msg']='新增区域成功';
           }
       }
       echo json_encode($return);exit();
       
   }
   
	//删除区域
	public function del_inventory_area(){
        $this->common_function->pay_role("seller_inventory_del_area");//权限
	    $sia_id = isset($_POST['sia_id']) && !empty($_POST['sia_id']) ?$_POST['sia_id']:false;
	    $result=array("state"=>false,'msg'=>"区域删除失败");
	    if(!$sia_id){
	        echo json_encode($result);exit();
	    }
	    if($this->db->where("sia_id in (".$sia_id.") ")->delete ('store_inventory_area')){
	        $this->db->where("area_id in (".$sia_id.") ")->delete ('store_inventory');
	        $result['state']=true;
	        $result['msg']="区域删除成功";
	    }
	    echo json_encode($result);exit();
	}
   
   //录入盘点
	public function inventory_data_entry(){
        $this->common_function->pay_role("seller_inventory_area_input");//权限
	    $sia_id = isset($_GET['sia_id']) && !empty($_GET['sia_id']) ?$_GET['sia_id']:false;
	    if($sia_id){
	        $rows = array();
	        if(isset($_GET['op']) && $_GET['op']=='continue'){
	            $rows  = $this->db->select('i.*,s.goods_name,s.brand_name,s.goods_marketprice,s.goods_addtime')
	            ->from('store_inventory as i')
	            ->join('shop_goods s',"s.goods_id = i.goods_id")
	            ->where('i.area_id',$sia_id)->get()->result_array();
	            if(!$rows){
	                
	            }
	        }
	        $sia_area_name = $this->db->select('sia_area_name')->from('store_inventory_area')->where('sia_id',$sia_id)->get()->row('sia_area_name');
	        $this->smarty->assign("sia_id",$sia_id);
	        $this->smarty->assign("rows",$rows);
	        $this->smarty->assign("sia_area_name",$sia_area_name);
	        $this->smarty->display('stock_inventory_data.html');
	    }
	}
   
	//提交盘点数据
	public function post_inventory_data(){
        $this->common_function->pay_role("seller_inventory_area_input");//权限
	    $result=array("state"=>false,'msg'=>"盘点数据提交失败");
	    if(isset($_POST['put_goods_name']) && !empty($_POST['put_goods_name']) && !empty($_GET['sia_id'])){
	        $sia_id = trim($_GET['sia_id']);
	        $data =array();$update = array();$inner = array();$res1=true;$res2=true;
	        foreach ($_POST['put_goods_name'] as $key=>$val){
	            foreach ($val as $k=>$v){
	                $data[$k][$key]=$v;
	            }
	        }
	        foreach ($data as $key=>$val){
	            if($val['stocks_bar_code']){
	                $checkNum = $this->db->select('si_id,si_num')->where('barcode',$val['stocks_bar_code'])->where('area_id',$sia_id)
	                ->get('store_inventory')->row_array();
	            }else{
	                $checkNum = $this->db->select('si_id,si_num')->where('stock_code',$val['stocks_sn'])->where('size',$val['size'])
	                ->where('goods_id',$val['goods_id'])
	                ->where('area_id',$sia_id)->get('store_inventory')->row_array();
	            }
	            if($checkNum){
	                $sqlUp = array('si_id'=>$checkNum['si_id'],'si_num'=>$checkNum['si_num']+$val['num'],'input_time'=>time(),'goods_ea_id'=>$val['goods_ea_id']);
	                $update[] = $sqlUp;
	            }else{
	                $sqlIn = array(
	                    'area_id'=>$sia_id,'si_num'=>$val['num'],'goods_id'=>$val['goods_id'],'input_time'=>time(),'goods_ea_id'=>$val['goods_ea_id'],
	                    'barcode'=>$val['stocks_bar_code'],'stock_code'=>$val['stocks_sn'],'size'=>$val['size']
	                );
	                $inner[]=$sqlIn;
	            }
	        }
	       
	        if(!empty($update)){
	            $res1 = $this->db->update_batch('store_inventory',$update,'si_id');
	        }
	        if(!empty($inner)){
	            $res2 = $this->db->insert_batch('store_inventory',$inner);
	        }
	        if($res1 && $res2){
	            $result['state']=true;
	            $result['msg']="数据添加完成";
	        }
	 
	    }
	    echo json_encode($result);die;
	}
	 

	//导出数据
	public function inventory_data_export(){
        $this->common_function->pay_role("seller_inventory_export");//权限
	    $result=array("state"=>false,'msg'=>"数据导出失败");
	    $store_id = $_SESSION['shop_spg_store_id'];
	    $id = isset($_POST['sia_id'])?trim($_POST['sia_id']):'';
	    if($id){
	        $where = " i.area_id IN ($id)";
	    }else{
	        echo json_encode($result);exit;
	    }
	    $store_checkInfo = $this->db
	    ->select('i.*,a.sia_area_name,e.brand_name,e.goods_name,e.stocks_price,e.stocks_marketprice')->from('store_inventory_area a')
	    ->join('store_inventory i','i.area_id=a.sia_id')
	    ->join('v_store_brand_stock_amount e','e.stocks_sku=i.stock_code and e.goods_id=i.goods_id and e.size=i.size and e.store_id='.$store_id,'left')
	    ->where('a.store_id',$store_id)->where($where)->get()->result_array();
	    $rows = $store_checkInfo;
	    //print_r($rows);die;
	    $time = time();
	    $date = date ( 'YmdHis',$time );
	    $filename = $date.'盘点列表';
	    $filenames = $date.'pandian'.'.csv';
	    $dirs = PANDIAN.$store_id;
	    $dir = PANDIAN.$store_id.'/';
	    $filetime = array();
	    if(!file_exists($dirs)){
	        @mkdir($dirs, '0777',true);
	    }
	    $file = $dir.$filenames;
	    $title = array(chr(0xef).chr(0xbb).chr(0xbf).'序号','商品名称','货号','尺码','条码','数量','价格','品牌');
	    file_put_contents ($file,implode(',', $title).PHP_EOL,FILE_APPEND);
	    $res= true;
	    for($i=0;$i<count($rows);$i++){
	        $data = array(
	            ($i+1),$rows[$i]['goods_name'],$rows[$i]['stock_code'],$rows[$i]['size'],"'".$rows[$i]['barcode'],
	            $rows[$i]['si_num'],$rows[$i]['stocks_price'],$rows[$i]['brand_name'],
	        );
	        if(!file_put_contents($file,implode(',',$data).PHP_EOL,FILE_APPEND)){
	            $res =false;
	            break;
	        }
	    }
	    $download = PANDIAN_URL.$store_id.'/'. $filenames;
	    //$download = str_replace('\\', '/', trim(base_url().'data/panddian/'. $filenames));
	    //echo "<script>window.location.href='".$download."';</script>";
	    //header("location:".$download);
	    if($res){
	        $result['state']=true;
	        $result['msg']="数据导出成功";
	        echo json_encode($result);exit;
	    }
	   
	}
	
	//复制区域数据
	public function inventory_data_copy(){
        $this->common_function->pay_role("seller_inventory_add_area");//权限
	    $result=array("state"=>false,'msg'=>"数据复制失败");
	    $store_id = $_SESSION['shop_spg_store_id'];
	    $id = isset($_POST['sia_id'])?trim($_POST['sia_id']):'';
	    if(!$id){
	        echo json_encode($result);exit;
	    }
	    $sia_area_name = $this->db->select('sia_area_name')->where('sia_id',$id)->where('store_id',$_SESSION['shop_spg_store_id'])->get('store_inventory_area')->row('sia_area_name');
	    if(stripos($sia_area_name,"_")){
	        $name = explode("_",$sia_area_name);
	        $this->db->select ('sia_id,sia_area_name,create_time');
	        $this->db->from ('store_inventory_area');
	        $this->db->where ("store_id ='{$_SESSION['shop_spg_store_id']}' and sia_area_name like '%{$name[0]}%'");
	        $this->db->order_by ('sia_id', 'DESC');
	        $rows = $this->db->get ()->row_array ();
	        $rowname = explode("_",$rows['sia_area_name']);
	        $sia_area_names =$rowname[0]."_".($rowname[1]+1);
	    }else{
	        $this->db->select ('sia_id,sia_area_name,create_time');
	        $this->db->from ('store_inventory_area');
	        $this->db->where ("store_id ='{$_SESSION['shop_spg_store_id']}' and sia_area_name like '%{$sia_area_name}%'");
	        $this->db->order_by ('sia_id', 'DESC');
	        $rows = $this->db->get ()->row_array ();
	        if($rows){
	            if(stripos($rows['sia_area_name'],"_")){
	                $rowname = explode("_",$rows['sia_area_name']);
	                $sia_area_names =$rowname[0]."_".($rowname[1]+1);
	            }else{
	                $sia_area_names = $sia_area_name."-复制_1";
	            }
	        }else{
	            $sia_area_names = $sia_area_name."-复制_1";
	        }
	    }
	    if($this->db->insert('store_inventory_area',array('store_id'=>$_SESSION['shop_spg_store_id'],'sia_area_name'=>$sia_area_names,'create_time'=>time()))){
	           $area_id = $this->db->insert_id();
	           $insert = array();
	           $arrs  = array();
	           $rows  = $this->db->select('*')
        	           ->from('store_inventory')
        	           ->where('area_id',$id)->get()->result_array();
	           if($rows){
	               foreach ($rows as $key =>$val){
	                   $insert['area_id'] = $area_id;
	                   $insert['si_num'] = $val['si_num'];
	                   $insert['barcode'] = $val['barcode'];
	                   $insert['stock_code'] = $val['stock_code'];
	                   $insert['size'] = $val['size'];
	                   $insert['goods_id'] = $val['goods_id'];
	                   $insert['input_time'] = time();
	                   $insert['goods_ea_id'] = $val['goods_ea_id'];
	                   $arrs[]=$insert;
	               }
    	           try {
            	           if($this->db->insert_batch('store_inventory',$arrs)){
        	                   $result['state']=true;
        	                   $result['msg']="数据复制完成";
            	           }
                   } catch (Exception $e) {
                           //复制失败  删除新增的区域
    	                   $this->db->where("sia_id in = '{$area_id}'")->delete ('store_inventory_area');
                   }
	           }else{
	               $result['state']=true;
	               $result['msg']="数据复制完成";
	           }
	    }
	    echo json_encode($result);exit;
	    
	}
	
	//确认盘点
	public function inventory_data_submit(){
        $this->common_function->pay_role("seller_inventory_submit");//权限
	    $result=array("state"=>false,'msg'=>"确认盘点失败");
	    if(!(isset($_POST['op']) && $_POST['op']=='submit')){
	        echo json_encode($result);exit;
	    }
	    $store_id = $_SESSION['shop_spg_store_id'];
	    $store_checkInfo = $this->db->select('i.*,a.sia_area_name,e.goods_name,e.stocks_price,e.stocks_marketprice')->from('store_inventory_area a')
	    ->join('store_inventory i','i.area_id=a.sia_id')
	    ->join('v_store_brand_stock_amount e','e.stocks_sku=i.stock_code and e.goods_id=i.goods_id and e.size=i.size and e.store_id='.$store_id,'left')
	    ->where('a.store_id',$store_id)->get()->result_array();
	    $rows = $store_checkInfo;
	    //print_r($rows);die;
	    $time = time();
	    $user_id = $_SESSION['shop_spg_id'];
	    $user_name = $_SESSION['shop_spg_name'];
	    $sqlUp = array();
	    $sqlIn = array();
	    $date = date ( 'YmdHis',$time );
	    $filename = $date.'盘点历史列表';
	    $filenames = $date.'pd'.'.csv';
	    $dir = DOWNLOAD.$store_id;
	    $filetime = array();
	    if(!file_exists($dir)){
	        if(!file_exists(ROOTPATH.'data/pdlog')){
	            if(mkdir(ROOTPATH.'data/pdlog')&&chmod(ROOTPATH.'data/pdlog',0777)){
	                mkdir($dir);
	                chmod($dir,0777);
	            }
	        }else{
	            mkdir($dir);
	            chmod($dir,0777);
	        }
	    }else{
	        //保留最后三次盘点记录
	        $log = $this->db->select('*')->from('store_inventory_log')->where('sil_store_id',$store_id)->order_by('create_time')->get()->result_array();
	        if(count($log)>=3){
	            $delLog =  isset($log[0])?$log[0]:'';
	            if(isset($delLog['sil_url'])&&!empty($delLog['sil_url'])){
	                $this->db->delete('store_inventory_log',array('sil_id'=>$delLog['sil_id']));
	                if(is_file($dir.'/'.$delLog['sil_url'])){
	                    @unlink($dir.'/'.$delLog['sil_url']);
	                }
	            }
	        }
	    }
	    $file = DOWNLOAD.$store_id.'/'.$filenames;//print_r($file);die;
	    $title = array(chr(0xef).chr(0xbb).chr(0xbf).'序号','商品ID','商品名称','货号','尺码','条码','数量','销售价','门店ID');
	    file_put_contents ($file,implode(',', $title).PHP_EOL,FILE_APPEND);
	    for($i=0;$i<count($rows);$i++){
	        $checkAmount = $this->db->select('ssa_id')->where('ssa_store_id',$store_id)
	        ->where('stocks_sn',$rows[$i]['stock_code'])->where('size',$rows[$i]['size'])
	        ->get('store_stocks_amount')->row('ssa_id');
	         
	        if($checkAmount){
	            $sql = array(
	                'amount'=>$rows[$i]['si_num'],
	                'update_time'=>$time,'update_user_name'=>$user_name,
	                'update_user_id'=>$user_id,'update_user_type'=>2,
	            );
	            $this->db->trans_off(); //禁用事务
	            $this->db->trans_start(); //开启事务
	            $this->db->update('store_stocks_amount',$sql,array('ssa_id'=>$checkAmount));
	            $this->db->delete('store_inventory',array('si_id'=>$rows[$i]['si_id']));
	            $this->db->trans_complete(); //事务完成
	            $this->db->trans_off(); //禁用事务
	            //$sqlUp[]=$sql;
	        }else{
	            $sql = array(
	                'ssa_store_id'=>$store_id,'goods_id'=>$rows[$i]['goods_id'],'stocks_sn'=>$rows[$i]['stock_code'],'stocks_bar_code'=>$rows[$i]['barcode'],
	                'amount'=>$rows[$i]['si_num'],'size'=>$rows[$i]['size'],'update_time'=>$time,'update_user_name'=>$user_name,
	                'update_user_id'=>$user_id,'update_user_type'=>2,'stocks_price'=>$rows[$i]['stocks_price'],
	            );
	            $this->db->trans_off(); //禁用事务
	            $this->db->trans_start(); //开启事务
	            $this->db->insert('store_stocks_amount',$sql);
	            $this->db->delete('store_inventory',array('si_id'=>$rows[$i]['si_id']));
	            $this->db->trans_complete(); //事务完成
	            $this->db->trans_off(); //禁用事务
	            //$sqlIn[]=$sql;
	        }
	         
	        $data = array(
	            ($i+1),$rows[$i]['goods_id'],$rows[$i]['goods_name'],$rows[$i]['stock_code'],$rows[$i]['size'],"'".$rows[$i]['barcode'],
	            $rows[$i]['si_num'],$rows[$i]['stocks_price'],$store_id,
	        );
	        file_put_contents ($file,implode(',',$data).PHP_EOL,FILE_APPEND);
	    }
	    $sqlLog = array('sil_store_id'=>$store_id,'sil_url'=>$filenames,'create_time'=>$time,'create_user_id'=>$user_id,'create_user_name'=>$user_name,);
	    $this->db->trans_off(); //禁用事务
	    $this->db->trans_start(); //开启事务
	    $res = $this->db->insert('store_inventory_log',$sqlLog);
	    $res = $this->db->where('ssa_store_id='.$store_id)->where('update_time!='.$time)->update('store_stocks_amount',array('amount'=>0));
	    $this->db->trans_complete(); //事务完成
	    $this->db->trans_off(); //禁用事务
	    if($res){
	        $result['state']=true;
	        $result['msg']="盘点数据已确认";
	    }
	    echo json_encode($result);die;
	
	}
	
	//查看还原点
	public function inventory_data_history(){
        $this->common_function->pay_role("seller_inventory_restore");//权限
	    $store_id = $_SESSION['shop_spg_store_id'];
	    //$filenames = $date.'pandian'.'.csv';
	    $result = array('state'=>false,'msg'=>'暂无盘点记录');
	    $row = $this->db->select('sil_url,sil_store_id,create_user_name,sil_id,from_unixtime(create_time) as date')
	    ->from('store_inventory_log')
	    ->where('sil_store_id',$store_id)
	    ->order_by('create_time','DESC')
	    ->get()->result_array();
	    if(!empty($row)){
	        $result = array('state'=>true,'data'=>$row);
	    }
	    echo json_encode($result);die;
	}
	
	//盘点数据还原
	public function inventory_data_back(){
        $this->common_function->pay_role("seller_inventory_restore");//权限
	    $result = array('state'=>false,'msg'=>'数据还原失败');
	    $file = isset($_POST['file'])?trim($_POST['file']):'';
	    if(empty($file)){
	        echo json_encode($result);die;
	    }else{
	        $dir = DOWNLOAD.$_SESSION['shop_spg_store_id'].'/'.$file;
	        set_time_limit(0);
	        // 读取EXCEL文件
	        include (ROOTPATH . 'libraries/PHPExcel/IOFactory.php');
	        include (ROOTPATH . 'libraries/PHPExcel/Reader/CSV.php');
	        $excelpath = $dir;
	        $objReader = PHPExcel_IOFactory::createReader ( 'CSV' );
	        $objPHPExcel = $objReader->load ( $excelpath );
	        $sheet = $objPHPExcel->getSheet ( 0 );
	        $rows = $sheet->getHighestRow (); // 取得总行数
	        $excel = array();$sqlIn = array();$sqlUp = array();$res1=true;$res2=true;
	        $time = time();
	        $user_id = $_SESSION['shop_spg_id'];
	        $user_name = $_SESSION['shop_spg_name'];
	        //print_r($rows);die;
	        for($i = 2; $i <= $rows; $i ++) {
	            $flag = false;
	            $error_msg = '';$row = array();
	            $row ['sort'] = $objPHPExcel->getActiveSheet ()->getCell ( "A{$i}" )->getValue ();
	            if(!is_numeric(trim($row ['sort']))){
	                continue;
	            }
	            $row ['goods_id'] = $objPHPExcel->getActiveSheet ()->getCell ( "B{$i}" )->getValue ();
	            if(empty(trim($row ['goods_id']))){
	                continue;
	            }
	            $row ['stocks_sn'] = $objPHPExcel->getActiveSheet ()->getCell ( "D{$i}" )->getValue ();
	            if(empty(trim($row ['stocks_sn']))){
	                continue;
	            }
	            $row ['size'] = $objPHPExcel->getActiveSheet ()->getCell ( "E{$i}" )->getValue ();
	            if(trim($row ['size']=='')){
	                continue;
	            }
	            $row ['stocks_bar_code'] = $objPHPExcel->getActiveSheet ()->getCell ( "F{$i}" )->getValue ();
	            if(!empty($row ['stocks_bar_code'])){
	                $row ['stocks_bar_code'] = trim($row ['stocks_bar_code'],"'");
	            }
	            $row ['amount'] = $objPHPExcel->getActiveSheet ()->getCell ( "G{$i}" )->getValue ();
	            $row ['stocks_price'] = $objPHPExcel->getActiveSheet ()->getCell ( "H{$i}" )->getValue ();
	            $row ['store_id'] = $objPHPExcel->getActiveSheet ()->getCell ( "I{$i}" )->getValue ();
	            if(empty($row ['store_id'])){
	                continue;
	            }
	            $check = $this->db->select('ssa_id,amount')->where('stocks_sn',$row ['stocks_sn'])
	            ->where('goods_id',$row ['goods_id'])->where('size',$row ['size'])->where('ssa_store_id',$row ['store_id'])
	            ->get('store_stocks_amount')->row_array();
	            if($check['ssa_id']){
	                $sql = array(
	                    'ssa_id'=>$check['ssa_id'],
	                    'amount'=>$row['amount'],
	                    'update_time'=>$time,'update_user_name'=>$user_name,
	                    'update_user_id'=>$user_id,'update_user_type'=>2,
	                );
	                //$this->db->update('store_stocks_amount',$sql,array('ssa_id'=>$check['ssa_id']));
	                $sqlUp[]=$sql;
	            }else{
	                $sqls = array(
	                    'ssa_store_id'=>$row ['store_id'],'goods_id'=>$row['goods_id'],'stocks_sn'=>$row['stocks_sn'],'stocks_bar_code'=>$row['stocks_bar_code'],
	                    'amount'=>$row['amount'],'size'=>$rows['size'],'update_time'=>$time,'update_user_name'=>$user_name,
	                    'update_user_id'=>$user_id,'update_user_type'=>2,'stocks_price'=>$row['stocks_price'],
	                );
	                //$this->db->insert('store_stocks_amount',$sql);
	                $sqlIn[]=$sqls;
	            }
	            //$excel[] = $row;
	        }
	        
	        $this->db->trans_off(); //禁用事务
	        $this->db->trans_start(); //开启事务
	        if(!empty($sqlUp)){
	            $res1 = $this->db->update_batch('store_stocks_amount',$sqlUp,'ssa_id');
	        }
	        if(!empty($sqlIn)){
	            $res2 = $this->db->insert_batch('store_stocks_amount',$sqlIn);
	        }
	        $this->db->trans_complete(); //事务完成
	        $this->db->trans_off(); //禁用事务
	        if($res1 && $res2){
	            $result['state']=true;
	            $result['msg']="数据还原成功";
	        }
	        //print_r($excel);die;
	        echo json_encode($result);exit;
	         
	    }
	    
	    echo json_encode($result);die;
	}
	
	
	
   
   //库存导入-批量导入
   public function stock_leading(){
       $this->common_function->pay_role("seller_stock_import");//权限
       $this->common_function->pay_role("seller_stock_import_batch");//权限
       $is_delete = $this->db->select ('is_delete')->where ('store_id',$_SESSION['shop_spg_store_id'])->get ('store')->row ('is_delete');
       $this->smarty->assign("is_delete",$is_delete);
       $this->smarty->display('stock_leading.html');
   }

   //库存导入-少量导入
   public function stock_leading_less(){
       $this->common_function->pay_role("seller_stock_import_simple");//权限
       $is_delete = $this->db->select ('is_delete')->where ('store_id',$_SESSION['shop_spg_store_id'])->get ('store')->row ('is_delete');
       $this->smarty->assign("is_delete",$is_delete);
       $this->smarty->display('stock_leading_less.html');
   }
    
   //库存管理_少量导入-数据重组
   public function stock_leading_less_data(){
       $this->common_function->pay_role("seller_stock_import_simple");//权限
       $method = isset($_POST['method']) ? $_POST['method'] : false;
       $data = isset($_POST['data']) ? $_POST['data'] : false;
       $result = array('state'=>false,'msg'=>'操作错误');
       if($method){
           $data_arr = array();
           if($data&&!empty($data)){
               $data = explode(',',$data);
               for($i=0;$i<count($data);$i+=4){
                   $data_arr[$i/4]=array('brand_name'=>$data[$i],'stock_code'=>$data[$i+1],'size'=>$data[$i+2],'stock'=>$data[$i+3]);
               }
               foreach ($data_arr as $k=>$v){
                   if(!isset($v['brand_name'])){
                       $result = array('state'=>false,'msg'=>'品牌不能为空');
                       echo json_encode($result);exit;
                   }
                   if(!isset($v['stock_code'])){
                       $result = array('state'=>false,'msg'=>'货号不能为空');
                       echo json_encode($result);exit;
                   }
                    
                   if(!isset($v['size'])){
                       $result = array('state'=>false,'msg'=>'尺码不能为空');
                       echo json_encode($result);exit;
                   }
                    
                   if(!isset($v['stock'])){
                       $result = array('state'=>false,'msg'=>'库存不能为空');
                       echo json_encode($result);exit;
                   }
                   $data_arr[$k]['brand_name']=$v['brand_name'];
                   $data_arr[$k]['stock_code']=$v['stock_code'];
                   $data_arr[$k]['size']=$v['size'];
                   $data_arr[$k]['stock']=$v['stock'];
               }
                
               foreach($data_arr as $k=>$v){
                   foreach ($v as $ka=>$va){
                       $data_arr[$k][$ka]=trim($va);
                   }
               }
               if(!empty($data_arr)){
                   //print_r($quick_import_data);
                   $result = array('state'=>true,'msg'=>'','data'=>$data_arr);
                    
               }else{
                   $result = array('state'=>false,'msg'=>'导入失败');
   
               }
           }else{
               $result = array('state'=>false,'msg'=>'数据为空');
           }
   
       }
       echo json_encode($result);exit;
   }

   /*库存管理_少量导入-导入数据*/
   public function stock_leading_less_add(){
       $this->common_function->pay_role("seller_stock_import_simple");//权限
       include VIEWPATH.'file_handle.html';
       $condition = $this->input->get();
       $condition['store_id'] = $_SESSION['shop_spg_store_id'];
       set_time_limit(0);
       ini_set('memory_limit','-1');
       // 数据处理
       if(empty($_COOKIE['quick_import_data'])){
           echo "数据为空！！！";exit;
       }
       $rows = json_decode($_COOKIE['quick_import_data']);
       $rows = object_array($rows,true);
       
       $all_num = count($rows);
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
       $auth_brand = array();
       if(isset($condition['store_id'])){
           $error_col = 'G';
           $auth_brand_arr = $this->db->select('brand_id')->where('store_id',$condition['store_id'])->get('store_attr_brands')->result_array();
           foreach ($auth_brand_arr as $v){
               $auth_brand[] = $v['brand_id'];
           }
       }else{
           $error_col = 'H';
       }
       $user_id = $_SESSION['shop_spg_id'];
       $user_name = $_SESSION['shop_spg_nike_name'];
       $user_type = 1;
       $time = time();
       if(isset($condition['type'])&&$condition['type']==1){
           $update = array(
               'amount'=>0,'update_time'=>$time,'update_user_name'=>$user_name,'update_user_id'=>$user_id,'update_user_type'=>2,
           );
           if(isset($condition['store_id'])){
               $this->db->where('ssa_store_id',$condition['store_id'])->update('store_stocks_amount',$update);
           }else{
               $this->db->update('store_stocks_amount',$update);
           }
       }
        
       for($i = 0; $i < count($rows); $i ++) {
           $flag = false;
           $false_msg = '';
           $now_run++;
           $percent = intval(($now_run/count($rows))*100);
           ob_clean();
           ob_start();
           
           // 品牌<必填>
           $excel ['brand_name'] = $rows[$i]['brand_name'];
           $brand_name = trim($excel ['brand_name']);
           if (empty( $brand_name )) {
               $false_msg .='品牌不能为空';
               $flag = true;
           }else{
               $brand_id = $this->db->select('brand_id')->where('brand_name',$brand_name)->get('shop_brand')->row('brand_id');
               if(empty($brand_id)){
                   $false_msg .='系统还未添加此品牌。';
                   $flag = true;
               }
           }
           
           // 货号<必填>
           $excel ['stocks_sn'] = trim($rows[$i]['stock_code']);
           if (empty( $excel ['stocks_sn'] )) {
               $false_msg .='货号不能为空。';
               $flag = true;
           }else{
               if(!$flag){
                   $check_stock_arr = $this->db->select('sg.goods_id,se.goods_a_id')->from('shop_goods as sg')
                   ->join('shop_goods_extend_attr as se','se.goods_id=sg.goods_id')
                   ->where('se.stocks_sku',$excel ['stocks_sn'])
                   ->where('sg.brand_id',$brand_id)->where("(sg.goods_pos={$condition['store_id']} or sg.goods_pos=0)")->where('sg.goods_state!=0')
                   ->order_by('sg.goods_pos','DESC')
                   ->group_by('sg.goods_id')
                   ->get()->result_array();
                   $check_stock = isset($check_stock_arr[0])?$check_stock_arr[0]:'';
                   if(empty($check_stock['goods_id'])){
                       $false_msg .='货号不存在。';
                       $flag = true;
                   }else{
                       $excel['brand_id'] = $brand_id;
                       $excel['goods_id'] = $check_stock['goods_id'];
                   }
                    
               }
                
           }
           //尺码<必填>
           $excel ['size'] = trim($rows[$i]['size']);
           if ( $excel ['size']=='' ) {
               $false_msg .='尺码不能为空。';
               $flag = true;
           }
           if(!$flag){
               $gc_id = $this->db->select('s.size')->from('code_segment_size s')
               ->join('shop_brand b','b.brand_size_type=s.flag')
               ->join('shop_goods g','g.brand_id=b.brand_id')
               ->where('s.size',$excel['size'])->where('g.goods_id',$excel['goods_id'])
               ->get()->row('size');
               if($gc_id==''){
                   $false_msg .='尺码不存在。请先添加此类商品的尺码';
                   $flag=true;
               }
   
           }
           //库存<必填>
           $excel ['amount'] = intval($rows[$i]['stock']);
           if (empty ( $excel ['amount'])) {
               $false_msg .='库存必填。';
               $flag = true;
           }
            
           if (! $flag) {
               $check_flag = true;
              if(in_array($excel['brand_id'], $auth_brand)){
                       $excel ['store_id'] = $condition['store_id'];
               }else{
                       $false_msg .='该门店未给此商品授权。';
                       $check_flag = false;
               }
               if($check_flag){
                   $check_amount = $this->db->select('ssa_id,amount,update_time')->where('stocks_sn',$excel ['stocks_sn'])
                   ->where('size',$excel ['size'])->where('ssa_store_id',$excel ['store_id'])->where('goods_id',$excel ['goods_id'])
                   ->get('store_stocks_amount')->row_array();
                   if($check_amount['ssa_id']){
                       $amount = $excel['amount']+$check_amount['amount'];
                       $update_data = array(
                           'amount'=>$amount,'update_time'=>$time,'update_user_name'=>$user_name,
                           'update_user_id'=>$user_id,'update_user_type'=>$user_type,
                       );
                       if(!empty($excel ['stocks_price'])){
                           $update_data['stocks_price'] = $excel['stocks_price'];
                       }
                       if(!empty($excel['stocks_bar_code'])){
                           $update_data['stocks_bar_code'] = $excel['stocks_bar_code'];
                       }
                       $this->db->update('store_stocks_amount',$update_data,array('ssa_id'=>$check_amount['ssa_id']));
                   }else{
                       $stock_price = $this->db->select('goods_ea_id,size_note,stocks_bar_code,color,goods_id,stocks_price,stocks_marketprice,color_remark')->where('size',$excel ['size'])
                       ->where('stocks_sku',$excel ['stocks_sn'])->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                       if(!empty($stock_price)){
                           $excel['stocks_marketprice'] = $stock_price['stocks_marketprice'];
                           if(empty($excel ['stocks_price'])){
                               $excel['stocks_price'] = $stock_price['stocks_price'];
                           }
                           if(empty($excel ['stocks_bar_code'])){
                               $excel['stocks_bar_code'] = $stock_price['stocks_bar_code'];
                           }//'stocks_marketprice'=>$excel['stocks_marketprice'],
                           $this->db->insert('store_stocks_amount',array(
                               'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$stock_price ['color'],
                               'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$stock_price['color_remark'],
                               'stocks_sn'=>$excel ['stocks_sn'],'size'=>$excel ['size'],'ssa_store_id'=>$excel ['store_id'],
                               'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$stock_price['goods_ea_id'],'goods_size_remark'=>$stock_price['size_note'],
                               'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$stock_price['goods_id']
                           ));
                       }else{
                           $stock_price = $this->db->select('goods_ea_id,stocks_bar_code,color,goods_id,stocks_price,stocks_marketprice,color_remark')
                           ->where('stocks_sku',$excel ['stocks_sn'])->where(" (size is null or size='')")->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                           $excel['stocks_marketprice'] = $stock_price['stocks_marketprice'];
                           if(empty($excel ['stocks_price'])){
                               $excel['stocks_price'] = $stock_price['stocks_price'];
                           }
                           if(empty($excel ['stocks_bar_code'])){
                               $excel['stocks_bar_code'] = $stock_price['stocks_bar_code'];
                           }//'stocks_marketprice'=>$excel['stocks_marketprice'],
                           if(empty($stock_price)){
                               $stock_price = $this->db->select('goods_a_id,color,color_value,color_remark,stocks_bar_code,goods_id,stocks_price,stocks_marketprice')
                               ->where('stocks_sku',$excel ['stocks_sn'])->where('goods_id',$excel ['goods_id'])->get('shop_goods_extend_attr')->row_array();
                               $this->db->insert('shop_goods_extend_attr',array('goods_id'=>$stock_price ['goods_id'],
                                   'goods_a_id'=>$stock_price ['goods_a_id'],'color'=>$stock_price ['color'],
                                   'color_value'=>$stock_price['color_value'],'color_remark'=>$stock_price['color_remark'],
                                   'size'=>$excel ['size'],'stocks_sku'=>$excel ['stocks_sn'],'stocks_marketprice'=>$stock_price['stocks_marketprice'],
                                   'stocks_price'=>$excel['stocks_price'],'stocks_bar_code'=>$excel['stocks_bar_code'],
                               ));
                               $goods_ea_id = $this->db->insert_id();
                               $this->db->insert('store_stocks_amount',array(
                                   'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,
                                   'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$stock_price['color_remark'],
                                   'stocks_sn'=>$excel ['stocks_sn'],'size'=>$excel ['size'],'ssa_store_id'=>$excel ['store_id'],
                                   'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$goods_ea_id,'color'=>$stock_price ['color'],
                                   'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$stock_price['goods_id']
                               ));
                           }else{
                               $this->db->update('shop_goods_extend_attr',array('size'=>$excel ['size'],'stocks_marketprice'=>$stock_price['stocks_marketprice'],
                                   'stocks_price'=>$excel['stocks_price'],'stocks_bar_code'=>$excel['stocks_bar_code'],
                               ),array('goods_ea_id'=>$stock_price['goods_ea_id']));
                               $this->db->insert('store_stocks_amount',array(
                                   'amount'=>$excel['amount'],'update_time'=>$time,'update_user_name'=>$user_name,'color'=>$stock_price ['color'],
                                   'update_user_id'=>$user_id,'update_user_type'=>$user_type,'goods_color_remark'=>$stock_price['color_remark'],
                                   'stocks_sn'=>$excel ['stocks_sn'],'size'=>$excel ['size'],'ssa_store_id'=>$excel ['store_id'],
                                   'stocks_price'=>$excel['stocks_price'],'goods_ea_id'=>$stock_price['goods_ea_id'],
                                   'stocks_bar_code'=>$excel['stocks_bar_code'],'goods_id'=>$stock_price['goods_id']
                               ));
                           }
                       }
                        
                   }
                   $add_num++;
                   echo "<script language='javascript'>" .
                       '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".
                       '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                       "location.href = '#anchor';" .
                       "</script>";
                   unset($excel);
                   $delete_row [] = $i; // 记录插入成功的当前行
                    
               }else{
                   $is_download = true;
                   $error_num++;
                   echo "<script language='javascript'>" .
                       '$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                       '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                       "location.href = '#anchor';" .
                       "</script>";
                   unset($excel);
               }
           } else { // 有错误的EXCEL行
               $is_download = true;
               $error_num++;
               echo "<script language='javascript'>" .
                   '$("#box").append("'."<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']'.$false_msg.''."<span class='pos-a right t-10'>失败</span></p>\");".
                   '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                   "location.href = '#anchor';" .
                   "</script>";
               unset($excel);
           }
           ob_end_flush();
           ob_flush();
           flush();
           if ($now_run % 100 == 0){
               sleep(1);
           }
       }
       ob_clean();
       ob_start();
       echo "<script language='javascript'>" .
           '$("#box").append("'."<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:"."[".date('H:i:s')."]，导入成功！"."</p>\");".
           "</script>";
       ob_end_flush();
       ob_flush();
       flush();
       $delete_row = array_reverse ( $delete_row );

       echo "<script language='javascript'>" .
               '$("#box #waitting").html("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
               "location.href = '#anchor';" .
               '$(".btnr").click();' .
               '$("#game_over").append("'."<p>导入".($all_num)."条，成功{$add_num}条，失败{$error_num}条。</p>\");".
               "</script>";
       //@unlink($excelpath);
       exit();
       
   }



   //订单导入
   public function import_order() {
       $this->common_function->pay_role("seller_ecorder_import");//权限
       $this->smarty->display('import_order.html');
   }
   //下载导入格式文件
   public function order_tp($type) {
       if ($type == 'yes') {
           $data = ROOTPATH . 'data/excel_tp/order_taobao.csv';
       } elseif ($type == 'not') {
           $data = ROOTPATH . 'data/excel_tp/order_not_taobao.csv';
       }
       force_download($data, NULL);
   }
   
   //导入订单
   public function order_import() {
       //$this->common_function->pay_role("seller_order_import_order");//权限
       include VIEWPATH . 'file_handle.html';
       $condition = $this->input->get();
       $format = $condition['type'];
       $error_col = $format == '1' ? 'J' : 'O';
       set_time_limit(0);
       
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
       $rows = count($totalinfo); // 取得总行数
       if($rows>500){
           ob_clean();
           ob_start();
           echo "<script language='javascript'>" .
               '$("#box").append("'."<p class='pos-r text-overflow red'>导入订单,一次最多导入500条！"."</p>\");".
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
       $all_num = $rows;
       
       
       
       // 数据处理
       $store_id = $_SESSION['shop_spg_store_id'];
       $datas = array();
       $delete_row = array();
       $excel = array();
       $is_download = false;
       $data_order = array();
       $data_goods = array();
       //正确和错误条数计数
       $add_num = 0;
       $edit_num = 0;
       $error_num = 0;
       $false_msg = '';
       //当前执行位置
       $now_run = 1;
       $percent = 0;
       ob_clean();
       ob_start();
       echo "<script language='javascript'>" .
           '$("#box").append("' . "<p class='pos-r text-overflow'><i class='fa fa-play-circle-o c-success'></i>:" . "[" . date('H:i:s') . "]，开始处理。" . "</p>\");" .
           '$' . "('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
           "</script>";
       ob_end_flush();
       ob_flush();
       flush();
       /* $order_sn_produce = $this->common_function->produce_order_sn_import();
        $order_sn_prefix = $order_sn_produce['prefix'];
       $order_sn_number = $order_sn_produce['number']; */
       $time = time();
       //获取授权品牌
       $this->db->select('brand_id,store_id');
       $this->db->from('store_attr_brands');
       $this->db->where('store_id',$store_id);
       $this->db->order_by('brand_id');
       $brands = $this->db->get()->result_array();
       $order_sn='';
       $error = array();
        foreach($totalinfo as $key=>$val) {
            $error= $val;
            $counterror = count($error);
           $flag = false;
           $false_msg ='';
           $false_msgs = '';
           $now_run++;
           $percent = intval(($now_run / $rows) * 100);
           ob_clean();
           ob_start();
           // 品牌
           $excel ['brand_name'] = trim($this->common_function->gstr($val[0]));
           if (empty($excel ['brand_name'])) {
               //将错误的表格填充为红色
               $false_msgs = @mb_convert_encoding("品牌为必填", "GBK", "UTF-8");
                $false_msg .= "品牌为必填";
               $flag = true;
           }else{
               $brand_id = $this->db->select('brand_id')->where('brand_name',$excel['brand_name'])->get('shop_brand')->row('brand_id');
               if(empty($brand_id)){
                    $false_msgs = @mb_convert_encoding("系统还未添加此品牌", "GBK", "UTF-8");
                    $false_msg .= "系统还未添加此品牌";
                   $flag = true;
               }else{
                   if($brands){
                       $brands_flag = false;//378   380   384
                       foreach ($brands as $ke=>$va){
                           if($va['brand_id']==$brand_id){
                               $brands_flag = true;
                               $excel ['brand_id'] = $brand_id;
                               $data_order['brand_id'] = $brand_id;
                               break;
                           }
                       }
                       if($brands_flag==false){
                           $flag = true;
                           $false_msgs = @mb_convert_encoding("门店未获取此品牌授权", "GBK", "UTF-8");
                           $false_msg .= "门店未获取此品牌授权";
                       }
                   }else{
                       $flag = true;
                       $false_msgs = @mb_convert_encoding("门店没有授权的品牌", "GBK", "UTF-8");
                       $false_msg .= "门店没有授权的品牌";
                   }
               }
           }
           
           //订单编号
           $excel ['out_order_sn'] = trim($this->common_function->gstr($val[1]));
           if (empty($excel ['out_order_sn'])) {
               if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("订单编号为必填", "GBK", "UTF-8");
               }
               $false_msg .= "订单编号为必填";
               $flag = true;
           } else {
               $data_order['out_order_sn'] = $excel['out_order_sn'];
           }
           //货号
           $excel ['stocks_sn'] = strtoupper(trim($this->common_function->gstr($val[2])));
           if (empty($excel ['stocks_sn'])) {
               $flag = true;
               if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("货号为必填", "GBK", "UTF-8");
               }
               $false_msg .= "货号为必填";
           }else{
               $data_order['stocks_sn'] = $excel['stocks_sn'];
               //查找商品id
               if(!$flag){
                   $check_stock_arr = $this->db->select('sg.goods_id,se.goods_a_id')->from('shop_goods as sg')
                   ->join('shop_goods_extend_attr as se','se.goods_id=sg.goods_id')
                   ->where('se.stocks_sku',$excel ['stocks_sn'])
                   ->where('sg.brand_id',$excel ['brand_id'])->where("(sg.goods_pos='{$store_id}' or sg.goods_pos=0)")->where('sg.goods_state!=0')
                   ->order_by('sg.goods_pos','DESC')
                   ->group_by('sg.goods_id')
                   ->get()->result_array();
                   $check_stock = isset($check_stock_arr[0])?$check_stock_arr[0]:'';
                   if(empty($check_stock['goods_id'])){
                       if(empty($false_msgs)){
                             $false_msgs = @mb_convert_encoding("货号不存在", "GBK", "UTF-8");
                       }
                       $false_msg .= "货号不存在";
                       $flag = true;
                   }else{
                       $excel['goods_id'] = $check_stock['goods_id'];
                       $data_order['goods_id'] = $check_stock['goods_id'];
                   }
               }
           }
           //尺码
           $excel ['size'] =  strtoupper(trim($this->common_function->gstr($val[3])));
           if (empty($excel ['size'])) {
               $flag = true;
               if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("尺码为必填", "GBK", "UTF-8");
               }
               $false_msg .= "尺码为必填";
           }
           if (!$flag) {
               $data_order['size'] = $excel ['size'] ;
               $sql = "select  st.ssa_store_id,st.goods_id, st.goods_ea_id, st.stocks_bar_code, st.goods_size_remark,st.goods_color_remark,st.color,st.stocks_price,
                               ss.store_name, ss.ous_type, ss.ous_cate,
                               sg.goods_id, sg.goods_name, sg.gc_id, sg.gc_name,sg.goods_spu,
                               se.goods_a_id
               from {$this->db->dbprefix('store_stocks_amount')} as st
               left join {$this->db->dbprefix('store')} as ss
               on st.ssa_store_id = ss.store_id
               left join {$this->db->dbprefix('shop_goods')} as sg
               on st.goods_id = sg.goods_id
               left join {$this->db->dbprefix('shop_goods_extend_attr')} as se
               on st.goods_ea_id = se.goods_ea_id  and st.goods_id = se.goods_id
               where st.ssa_store_id= '{$store_id}' and  st.goods_id = '{$excel['goods_id']}'  and   st.stocks_sn = '{$excel ['stocks_sn']}' and st.size = '{$excel ['size']}'";
   
               if ($this->db->query($sql)->num_rows() != 0) {
                   $stocks = $this->db->query($sql)->row_array();
                   $data_order['store_id'] = $store_id;
                   $data_order['goods_ea_id'] = $stocks['goods_ea_id'];
                   $data_order['stocks_bar_code'] = $stocks['stocks_bar_code'];
                   $data_order['goods_size_remark'] = $stocks['goods_size_remark'];
                   $data_order['goods_color_remark'] = $stocks['goods_color_remark'];
                   $data_order['color'] = $stocks['color'];
                   $data_order['stocks_price'] = $stocks['stocks_price'];
                   $data_order['store_name'] = $stocks['store_name'];
                   $data_order['ous_type'] = $stocks['ous_type'];
                   $data_order['ous_cate'] = $stocks['ous_cate'];
                   $data_order['goods_name'] = $stocks['goods_name'];
                   $data_order['goods_spu'] = $stocks['goods_spu'];
                   $data_order['gc_id'] = $stocks['gc_id'];
                   $data_order['goods_a_id'] = $stocks['goods_a_id'];
                   $data_order['goods_image'] = $this->db->select('goods_image')->where('goods_id',$data_order['goods_id'])->where('color_id',$data_order['goods_a_id'])->get('shop_goods_images')->row('goods_image');
               } else {
                   if(!isset($error[count($error)])){
                      $false_msgs = @mb_convert_encoding("不存在该尺码", "GBK", "UTF-8");
                   }
                   $false_msg .= "不存在该尺码";
                   $flag = true;
               }
           }
           //数量
           $excel ['number'] = trim($this->common_function->gstr($val[4]));
           if (empty($excel ['number'])) {
               $flag = true;
               if(empty($false_msgs)){
                    $false_msgs = @mb_convert_encoding("数量为必填", "GBK", "UTF-8");
               }
               $false_msg .= "数量为必填";
           } else {
               $data_order['number'] = $excel['number'];
           }
           
           $userInfo = array();
           if($format == '1') {  //淘宝格式
               //详细地址
               $excel ['address'] = trim($this->common_function->gstr($val[5]));
               if (empty($excel ['address'])) {
                   $flag = true;
                   if(empty($false_msgs)){
                      $false_msgs = @mb_convert_encoding("收货人地址为必填", "GBK", "UTF-8");
                   }
                   $false_msg .= "收货人地址为必填";
               } else {
                   $excel['address'] = str_replace('，', ',', trim($excel ['address']));
                   $arrs = explode(',', $excel['address']);
                   if (count($arrs) == 5) {
                       $inner['reciver_username'] = $arrs[0];
                       $inner['reciver_tel'] = $arrs[1];
                       $inner['reciver_tel2'] = $arrs[2];
                       $inner['reciver_postcode'] = $arrs[4];
                       $data_order['receive_postcode'] = $inner['reciver_postcode'];
                       
                       $userInfo['user_name'] = $inner['reciver_username'];
                       $userInfo['tel'] = !empty($inner['reciver_tel']) ?trim($inner['reciver_tel']):trim($inner['reciver_tel2']);
                       
                       
                       if($arrs[0] && $arrs[1] && $arrs[2]){
                           $data_order['user_name'] = $inner['reciver_username'];
                           $data_order['tel'] = $inner['reciver_tel'];
                       }else{
                           if(empty($false_msgs)){
                                $false_msgs = @mb_convert_encoding("收货人联系信息错误", "GBK", "UTF-8");
                           }
                           $false_msg .= "收货人联系信息错误";
                           $flag = true;
                       }     
                       
                       $all_address = explode(' ', $arrs[3]);
                       if (count($all_address) == 4) {
                           $reciver_province = $all_address[0];
                           $area = $this->common_function->find_three_area_id($all_address[0], $all_address[1], $all_address[2]);
                           if ($area && !in_array(false, $area)) {
                               $userInfo['province_id'] = $data_order['province_id'] = $inner['reciver_province_id'] = $area[0];
                               $userInfo['city_id'] = $data_order['city_id'] = $inner['reciver_city_id'] = $area[1];
                               $userInfo['area_id'] = $data_order['area_id'] = $inner['reciver_area_id'] = $area[2];
                               $userInfo['user_addres'] = $data_order['receive_address'] = $inner['reciver_address'] = $all_address[3];
            
                           } else {
                               $flag = true;
                               if(empty($false_msgs)){
                                    $false_msgs = @mb_convert_encoding("收货人联系信息错误", "GBK", "UTF-8");
                               }
                               $false_msg .= "收货人联系信息错误";
                           }
                       } else {
                           $flag = true;
                           if(empty($false_msgs)){
                                $false_msgs = @mb_convert_encoding("收货人联系信息错误", "GBK", "UTF-8");
                           }
                           $false_msg .= "收货人联系信息错误";
                       }
                   } else {
                       if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("收货人地址不完整", "GBK", "UTF-8");
                       }
                       $false_msg .= "收货人地址不完整";
                       $flag = true;
                   }
               }
               //快递
               $excel ['express_name'] = $this->common_function->gstr($val[6]);
               if (empty($excel ['express_name'])) {
                   $flag = true;
                   if(empty($false_msgs)){
                     $false_msgs = @mb_convert_encoding("发货物流为必填", "GBK", "UTF-8");
                   }
                   $false_msg .= "发货物流为必填";
               } else {
                   $data_order['e_name'] = $excel['express_name'];
                   $sql = 'SELECT e_code FROM ' . $this->db->dbprefix('express') . " WHERE e_name='{$excel['express_name']}'";
                   if ($this->db->query($sql)->num_rows() == 0) {
                       $flag = true;
                       if(empty($false_msgs)){
                          $false_msgs = @mb_convert_encoding("发货物流不支持", "GBK", "UTF-8");
                       }
                       $false_msg .= "发货物流不支持";
                   } else {
                       $data_order['e_code'] = $this->db->query($sql)->row('e_code');
                   }
               }
               //客户备注
               $excel ['buyer_note'] = $this->common_function->gstr($val[7]);
               $data_order['buyer_note'] = isset($excel['buyer_note']) ? $excel['buyer_note'] : '';
           } elseif ($format == '2') {
               //非淘宝格式
               $excel ['reciver_username'] =  trim($this->common_function->gstr($val[5]));
               if (empty($excel ['reciver_username'])) {
                   $flag = true;
                   if(empty($false_msgs)){
                      $false_msgs = @mb_convert_encoding("收货人地址为必填", "GBK", "UTF-8");
                   }
                   $false_msg .= "收货人地址为必填";
               } else {
                   $data_order['user_name'] = $excel['reciver_username'];
                   $userInfo['user_name'] = $excel['reciver_username'];
               }
               $excel ['reciver_tel'] = trim($this->common_function->gstr($val[6]));
               if (empty($excel ['reciver_tel'])) {
                   $flag = true;
                   if(empty($false_msgs)){
                       $false_msgs = @mb_convert_encoding("手机为必填", "GBK", "UTF-8");
                   }
                   $false_msg .= "手机为必填";
               } else {
                   $data_order['tel']  = $excel['reciver_tel'];
               }
               $data_order['reciver_tel2'] = $excel ['reciver_tel2'] = trim($this->common_function->gstr($val[7]));
               $userInfo['tel'] = !empty($excel ['reciver_tel']) ?trim($excel ['reciver_tel']):trim($excel ['reciver_tel2']);
               
               $excel ['reciver_province'] = trim($this->common_function->gstr($val[8]));
               $reciver_province = $excel ['reciver_province'];
               if (empty($excel ['reciver_province'])) {
                   $flag = true;
                   if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("省份为必填", "GBK", "UTF-8");
                   }
                   $false_msg .= "省份为必填";
               }
               $excel ['address'] = trim($this->common_function->gstr($val[9]));
               if (empty($excel ['address'])) {
                   $flag = true;
                   if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("具体地址为必填", "GBK", "UTF-8");
                   }
                   $false_msg .= "具体地址为必填";
               } else {
                   $excel['address']  =  trim($excel ['address']);
                   $all_address = explode(' ', $excel['address']);
                   if (count($all_address) == 3) {
                       $area = $this->common_function->find_three_area_id($excel ['reciver_province'], $all_address[0], $all_address[1]);
                       if ($area && !in_array(false, $area)) {
                           $userInfo['province_id'] = $data_order['province_id'] = $inner['reciver_province_id'] = $area[0];
                           $userInfo['city_id'] = $data_order['city_id'] = $inner['reciver_city_id'] = $area[1];
                           $userInfo['area_id']  = $data_order['area_id'] = $inner['reciver_area_id'] = $area[2];
                           $userInfo['user_addres'] = $data_order['receive_address'] = $inner['reciver_address'] = $all_address[2];
                           
                       } else {
                           $flag = true;
                           if(empty($false_msgs)){
                                $false_msgs = @mb_convert_encoding("地址错误", "GBK", "UTF-8");
                           }
                           $false_msg .= "地址错误";
                       }
                   } else {
                       $flag = true;
                       if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("具体地址格式不正确", "GBK", "UTF-8");
                       }
                       $false_msg .= "具体地址格式不正确";
                   }
               }
               //邮编
               $excel ['reciver_postcode'] = trim($this->common_function->gstr($val[10]));
               if (empty($excel ['reciver_postcode'])) {
                   $flag = true;
                   if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("邮编为必填", "GBK", "UTF-8");
                   }
                   $false_msg .= "邮编为必填";
               } else {
                   $data_order['receive_postcode'] = $excel ['reciver_postcode'];
               }
               //快递
               $excel ['express_name'] = trim($this->common_function->gstr($val[11]));
               if (empty($excel ['express_name'])) {
                   $flag = true;
                   if(empty($false_msgs)){
                        $false_msgs = @mb_convert_encoding("发货物流为必填", "GBK", "UTF-8");
                   }
                   $false_msg .= "发货物流为必填";
               } else {
                   $data_order['e_name'] = $excel['express_name'];
                   $sql = 'SELECT e_code FROM ' . $this->db->dbprefix('express') . " WHERE e_name like '%{$excel['express_name']}%'";
                   if ($this->db->query($sql)->num_rows() == 0) {
                       $flag = true;
                       if(empty($false_msgs)){
                            $false_msgs = @mb_convert_encoding("发货物流为必填", "GBK", "UTF-8");
                       }
                       $false_msg .= "发货物流为必填";
                   } else {
                       $data_order['e_code'] = $this->db->query($sql)->row('e_code');
                   }
               }
               //客户备注
               $excel ['buyer_note'] = trim($this->common_function->gstr($val[12]));
               $data_order['buyer_note'] = isset($excel['buyer_note']) ? $excel['buyer_note'] : '';
           }
           $user_ids = $this->common_function->insert_user_info($userInfo);
           if($user_ids){
               $data_order['user_id'] = $user_ids;
           }
           
           if (!$flag) {
               
               $inn['out_order_sn'] = isset($data_order['out_order_sn'])?trim($data_order['out_order_sn']):'';
               $inn['order_from'] = 43;
               $inn['order_type'] = 3;
               $inn['order_status'] = 10;

               // 检查该条订单是否在在
               $order_isset = false;
               $repeat_stocks = false;
               $rec_id = '';
               $sql = "select order_sn,order_price,goods_price,goods_num from {$this->db->dbprefix('shop_order')} where out_order_sn = '{$data_order['out_order_sn']}'  and store_id = '{$store_id}'";
               if ($this->db->query($sql)->num_rows() != 0) {//存在外部订单号
                   $row = $this->db->query($sql)->row_array();
                   $order_sn = $row['order_sn'];
                   $sql = "select rec_id,goods_num, goods_price, goods_pay_price from {$this->db->dbprefix('shop_order_goods')} where order_sn = '{$row['order_sn']}' and goods_ea_id = '{$data_order['goods_ea_id']}'";
                   if ($this->db->query($sql)->num_rows() != 0) {//是同一款商品（货号 颜色 尺码相同）
                       $restocks = $this->db->query($sql)->row_array();
                       $rec_id = $restocks['rec_id'];
                       $ord['goods_num'] = $restocks['goods_num']+$data_order['number'];
                       $ord['goods_price']  = $restocks['goods_num'] * $data_order['stocks_price'] +$restocks['goods_price'];
                       $ord['goods_pay_price'] = $restocks['goods_num'] * $data_order['stocks_price'] +$restocks['goods_pay_price'];
                       
                       $repeat_stocks = true;$order_isset = true;
                       
              /*          $this->common_function->wrong_cell($objPHPExcel, "N{$i}");
                       $flag = true;
                       $error_msg = !!$error_msg ? $error_msg . "、该货品已存在," : $error_msg . '已跳过';
                       $edit_num++; */
                   }else{//不是同一款商品（货号 颜色 尺码相同）
                       $repeat_stocks = true;$order_isset = true;
                       
                       $ord['order_sn'] = $order_sn ;
                       $ord['goods_id']  = $data_order['goods_id'];
                       $ord['goods_name'] = $data_order['goods_name'];
                       $ord['goods_image'] = isset($data_order['goods_image'])?$data_order['goods_image']:'';
                       $ord['goods_num']  = $data_order['number'];
                       $ord['goods_a_id'] = $data_order['goods_a_id'];
                       $ord['goods_ea_id'] = $data_order['goods_ea_id'];
                       $ord['goods_color']  = $data_order['color'];
                       $ord['goods_color_remark'] = isset($data_order['goods_color_remark'])?$data_order['goods_color_remark']:'';
                       $ord['goods_size'] = $data_order['size'];
                       $ord['goods_size_remark']  = isset($data_order['goods_size_remark'])?$data_order['goods_size_remark']:'';
                       $ord['goods_price'] = $data_order['number'] * $data_order['stocks_price'] ;
                       $ord['goods_pay_price'] = $data_order['number'] * $data_order['stocks_price'] ;
                       $ord['user_id']  = $data_order['user_id'];
                       $ord['store_id'] = $data_order['store_id'];
                       $ord['gc_id'] = $data_order['gc_id'];
                       $ord['stock_code'] = $data_order['goods_spu'];
                       $ord['sotck_barcode']  = $data_order['stocks_bar_code'];
                       
                       
                       
                       $inn['goods_price'] =$row['goods_price'] +$ord['goods_price'];
                       $inn['order_price'] = $row['order_price'] +$ord['goods_pay_price'];
                       $inn['goods_num']  = $row['goods_num'] + $ord['goods_num'];
                       
                       
                   }
               } else {//未找到外部订单号
                   
                   $inn['order_sn'] = $order_sn = $this->common_function->produce_order_sn($store_id);
                   $inn['out_order_sn'] = $data_order['out_order_sn'];
                   //$inn['store_id'] = $store_id;
                   //$inn['store_name'] = $data_order['store_name'];
                   $inn['buyer_id'] = $data_order['user_id'];
                   $inn['order_true_price'] = $data_order['stocks_price']*$data_order['number'];
                   $inn['order_price'] = $data_order['stocks_price']*$data_order['number'];
                   $inn['goods_num'] = $data_order['number'];
                   $inn['store_id'] = $store_id;
                   $inn['goods_price'] = $data_order['stocks_price']*$data_order['number'];
                   $inn['created_time'] = time();
                   $inn['receive_name'] = $data_order['user_name'];
                   $inn['receive_province'] = $data_order['province_id'];
                   $inn['receive_city'] = $data_order['city_id'];
                   $inn['receive_area'] = $data_order['area_id'];
                   $inn['receive_address'] = $data_order['receive_address'];
                   $inn['receive_mobile'] = isset($data_order['tel'])?$data_order['tel']:(isset($data_order['reciver_tel2'])?$data_order['reciver_tel2']:$data_order['reciver_tel2']);
                   $inn['seller_note'] = $data_order['buyer_note'];
                   $inn['receive_tel'] = isset($data_order['reciver_tel2'])?$data_order['reciver_tel2']:(isset($data_order['tel'])?$data_order['tel']:$data_order['tel']);
                   $inn['receive_postcode'] = $data_order['receive_postcode'];
                   $inn['create_express'] = $data_order['e_code'];
                   $inn['logistics_company_name'] = $data_order['e_name'];
                   
                   
                   
                   $ord['order_sn'] = $inn['order_sn'];
                   $ord['goods_id']  = $data_order['goods_id'];
                   $ord['goods_name'] = $data_order['goods_name'];
                   $ord['goods_image'] = isset($data_order['goods_image'])?$data_order['goods_image']:'';
                   $ord['goods_num']  = $data_order['number'];
                   $ord['goods_a_id'] = $data_order['goods_a_id'];
                   $ord['goods_ea_id'] = $data_order['goods_ea_id'];
                   $ord['goods_color']  = $data_order['color'];
                   $ord['goods_color_remark'] = isset($data_order['goods_color_remark'])?$data_order['goods_color_remark']:'';
                   $ord['goods_size'] = $data_order['size'];
                   $ord['goods_size_remark']  = isset($data_order['goods_size_remark'])?$data_order['goods_size_remark']:'';
                   $ord['goods_price'] = $inn['goods_num'] * $data_order['stocks_price'] ;
                   $ord['goods_pay_price'] = $inn['goods_num'] * $data_order['stocks_price'] ;
                   $ord['user_id']  = $data_order['user_id'];
                   $ord['store_id'] = $data_order['store_id'];
                   $ord['gc_id'] = $data_order['gc_id'];
                   $ord['stock_code'] = $data_order['goods_spu'];
                   $ord['sotck_barcode']  = $data_order['stocks_bar_code'];
               }
               
               
                  $this->db->trans_start();
                   if ($order_isset) {
                       $re_msg = '更新';
                       $this->db->where('order_sn',$order_sn);
                       $this->db->update('shop_order', $inn);
                   } else {
                       $re_msg = '新增';
                       $this->db->insert('shop_order', $inn);
                   }
                   if ($repeat_stocks) {
                       $this->db->where('rec_id',$rec_id);
                       $this->db->update('shop_order_goods', $ord);
                   } else {
                       $this->db->insert('shop_order_goods', $ord);
                   }
                   $this->db->trans_complete();
                   $this->db->trans_off();
                   $add_num++;
                   if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
                   echo "<script language='javascript'>" .
                      // '$("#box").append("' . "<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:" . '第' . ($now_run - 1) . '条[' . date('H:i:s') . ']' . $re_msg . '订单' . $order_sn . "<span class='pos-a right t-10'>成功</span></p>\");" .
                       '$' . "('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                       "location.href = '#anchor';" .
                       "</script>";
                   }
                   unset($excel);
                   unset($inn);
                   unset($ord);
                   unset($stocks);
           } else { // 有错误的EXCEL行
               $is_download = true;
               $error_num++;
               $error[] = $false_msgs;
               @fputcsv($fp,$error);
               if(  (  intval(($now_run/$rows)*100) - intval((($now_run-1)/$rows)*100)) >=1){
               echo "<script language='javascript'>" .
                   //'$("#box").append("' . "<p class='c-error pos-r text-overflow'><i class='fa fa-exclamation-circle c-error'></i>:" . '第' . ($now_run - 1) . '条[' . date('H:i:s') . ']操作失败' . "<span class='pos-a right t-10'>失败</span></p>\");" .
                   '$' . "('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                   "location.href = '#anchor';" .
                   "</script>";
               }
               unset($excel);
               unset($inner);
               unset($insert);
               unset($stocks);
           }
           ob_end_flush();
           ob_flush();
           flush();
      /*      if ($now_run % 100 == 0) {
               sleep(1);
           } */
       }
       @fclose($fp);
       ob_clean();
       ob_start();
       echo "<script language='javascript'>" .
           '$("#box").append("' . "<p id='waitting' class='pos-r text-overflow'><i class='fa fa-spinner fa-spin fa-pulse'></i>:" . "[" . date('H:i:s') . "]，导入成功，正在生成错误列表excel，请稍等。。。" . "</p>\");" .
           "location.href = '#anchor';" .
           "</script>";
       ob_end_flush();
       ob_flush();
       flush();
       // 删除原EXCEL文件
       if (file_exists($csvpath)) {
           unlink($csvpath);
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
           ob_end_clean();
            $download_error = str_replace('\\', '/', trim(base_url().'data/excel/'. $files .'.csv'));
           echo "<script language='javascript'>" .
               '$("#box #waitting").html("' . "<i class='fa fa-power-off c-primary'></i>:" . '[' . date('H:i:s') . "]，处理结束。\");" .
               "location.href = '#anchor';" .
               '$(".btnr").click();' .
               '$("#game_over").append("' . "<p>导入" . ($rows) . "条，新增/更新{$add_num}条，跳过{$edit_num}条，失败{$error_num}条。<a class='c-orange' href='" . $download_error . "'>下载错误列表</a></p>\");" .
               "</script>";
       } else {
           echo "<script language='javascript'>" .
               '$("#box #waitting").html("' . "<i class='fa fa-power-off c-primary'></i>:" . '[' . date('H:i:s') . "]，处理结束。\");" .
               "location.href = '#anchor';" .
               '$(".btnr").click();' .
               '$("#game_over").append("' . "<p>导入" . ($rows) . "条，新增/更新{$add_num}条，跳过{$edit_num}条，失败{$error_num}条。</p>\");" .
               "</script>";
       }
   }

   
   
   //售后管理
   public  function service_management(){
      // $this->common_function->pay_role("service_management");//权限
       
       //var_dump($_POST);
       $store_id = $_SESSION['shop_spg_store_id'];
       $state = (isset($_GET['state']) && !empty($_GET['state'])) ? $_GET['state'] : 'pending';
       $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
       $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
       
       $this->db->where('r.store_id',$store_id);
       if ($state == 'pending') {      //处理中
           $this->db->where('r.refund_state', 1);
       } elseif ($state == 'do') {          //已完成
           $this->db->where('r.refund_state', 3);
       } else {            //全部
           //$this->db->order_by('r.refund_state ASC,r.seller_time DESC,r.add_time ASC');
       }
       
       if (isset($_GET)) {
           if (!empty($_GET['startime'])) {
               $this->db->where("r.add_time >= " . strtotime($_GET['startime']));
           }
           if (!empty($_GET['endtime'])) {
               $this->db->where("r.add_time <= " . (strtotime($_GET['endtime']) + 86400));
           }
           if (!empty($_GET['buyer'])) {
               $this->db->where("r.buyer_name like '%" . trim($_GET['buyer']) . "%'");
           }
           if (!empty($_GET['order_sn'])) {
               $this->db->where("r.order_sn like '%" . trim($_GET['order_sn']) . "%'");
           }
       }
       $total = $this->db->select('count(1) as num')->from('shop_order_refund_return r')
       ->join('shop_order o', 'r.order_sn=o.order_sn')->get()->row('num');
       $page_count = ceil($total / $rp);
       
       
       $this->db->select('o.order_status,r.seller_state,r.refund_type,r.refund_id,r.order_sn,r.store_id,r.goods_ea_id,r.buyer_id,r.buyer_name,r.goods_id,r.order_goods_id,r.refund_amount_apply,r.add_time,r.refund_amount,r.refund_state,r.refund_address,r.express_id,r.invoice_no,r.seller_time')
       ->from('shop_order_refund_return r')
       ->join('shop_order o', 'r.order_sn=o.order_sn');
       $this->db->where("r.store_id ='{$store_id}' or r.buyer_id='{$store_id}'");
       if (isset($_GET)) {
           if (!empty($_GET['startime'])) {
               $this->db->where("r.add_time >= " . strtotime($_GET['startime']));
           }
           if (!empty($_GET['endtime'])) {
               $this->db->where("r.add_time <= " . (strtotime($_GET['endtime']) + 86400));
           }
           if (!empty($_GET['buyer'])) {
               $this->db->where("r.buyer_name like '%" . trim($_GET['buyer']) . "%'");
           }
           if (!empty($_GET['order_sn'])) {
               $this->db->where("r.order_sn like '%" . trim($_GET['order_sn']) . "%'");
           }
       }

       if ($state == 'pending') {       //处理中
           $this->db->where('r.refund_state', 1);
           $this->db->order_by('r.seller_state ASC,r.add_time ASC');
       } elseif ($state == 'do') {             //已完成
           $this->db->where('r.refund_state', 3);
           $this->db->order_by('r.seller_time DESC');
       } else {                 //全部
           $this->db->order_by('r.refund_state ASC,r.seller_time DESC,r.add_time ASC');
       }
       
       $start = $rp * ($page - 1);
       $this->db->limit($rp, $start);
       $returns = $this->db->get()->result_array();
       if (!empty($returns)) {
           foreach ($returns as $k => $v) {
               if ($v['goods_ea_id'] == 0) {
                   $order_goods = $this->db->select('goods_color,goods_color_remark,goods_size,goods_size_remark,goods_price,goods_image,goods_name,goods_num')->where('order_sn', $v['order_sn'])->get('shop_order_goods')->result_array();
                   /*$returns[$k]['color'] = empty($order_goods['goods_color_remark']) ? $order_goods['goods_color'] : $order_goods['goods_color_remark'];
                    $returns[$k]['size'] = empty($order_goods['goods_size_remark']) ? $order_goods['goods_size'] : $order_goods['goods_size_remark'];
                    $returns[$k]['goods_price'] = $order_goods['goods_price'];
                    $returns[$k]['goods_image'] = $order_goods['goods_image'];
                    $returns[$k]['goods_name'] = $order_goods['goods_name'];
                   $returns[$k]['goods_num'] = $order_goods['goods_num'];*/
                   foreach ($order_goods as $kk=>$vv){
                       $order_goods[$kk]['color'] = empty($vv['goods_color_remark']) ? $vv['goods_color'] : $vv['goods_color_remark'];
                       $order_goods[$kk]['size'] = empty($vv['goods_size_remark']) ? $vv['goods_size'] : $vv['goods_size_remark'];
       
                   }
                   $returns[$k]['son']=$order_goods;
               } else {
                   $order_goods = $this->db->select('goods_color,goods_color_remark,goods_size,goods_size_remark,goods_price,goods_num,goods_image,goods_name')->where('goods_ea_id', $v['goods_ea_id'])->get('shop_order_goods')->result_array();
                   foreach ($order_goods as $kk=>$vv){
                       $order_goods[$kk]['color'] = empty($vv['goods_color_remark']) ? $vv['goods_color'] : $vv['goods_color_remark'];
                       $order_goods[$kk]['size'] = empty($vv['goods_size_remark']) ? $vv['goods_size'] : $vv['goods_size_remark'];
       
                   }
                   $returns[$k]['son']=$order_goods;
               }
               if ($v['seller_time'] != 0) {
                   $returns[$k]['seller_time'] = date('Y-m-d H:i:s', $v['seller_time']);
               }
               $returns[$k]['add_time'] = date('Y-m-d H:i:s', $v['add_time']);
           }
           $returns_info=$returns;
       }else{
           $returns_info=false;
       }
       $page_info = array('total_num'=>$total, 'page_count'=>$page_count, 'page'=>$page, 'rp'=>$rp, 'start'=>$start+1, 'to'=>$start+$rp);
       //var_dump($page_info);die;
       if ($this->input->is_ajax_request()){
           if ($returns_info){
               echo json_encode(array('state'=>true,'returns_info'=>$returns_info,'page_info'=>$page_info));
           }else{
               echo json_encode(array('state'=>false));
           }
       }else{
           $defaultImg = $this->common_function->get_system_value('default_goods_image');
           $this->smarty->assign('defaultImg',$defaultImg);
           $this->smarty->assign('state',$state);
           //print_r($defaultImg);die;
           $this->smarty->display ('service_management.html');
       }
       
   }
   
   

   public  function refund_details(){
       if (isset($_GET['id'])&&!empty($_GET['id'])){
           $returnId=$_GET['id'];
           $return = $this->db->select('refund_state,refund_type,refund_id,goods_ea_id,order_sn,store_id,buyer_id,buyer_name,refund_tel,goods_id,order_goods_id,refund_amount_apply,reason_info,add_time,buyer_message,seller_state,express_id,invoice_no,refund_address,refund_amount')
           ->from('shop_order_refund_return')
           ->where('refund_id', $returnId)
           ->get()->row_array();
           if (!empty($return)) {
               $goods=[];
               if($return['goods_ea_id']==0){
                   $order_goods = $this->db->select('goods_id,goods_color,goods_color_remark,goods_size,goods_size_remark,goods_price,goods_image,goods_name,goods_num,goods_pay_price')->where('order_sn', $return['order_sn'])->get('shop_order_goods')->result_array();
                   foreach ($order_goods as $k=>$v){
                       $goods[$k]['color'] = empty($v['goods_color_remark']) ? $v['goods_color'] : $v['goods_color_remark'];
                       $goods[$k]['size'] = empty($v['goods_size_remark']) ? $v['goods_size'] : $v['goods_size_remark'];
                       $goods[$k]['goods_price'] = $v['goods_price'];
                       $goods[$k]['goods_pay_price'] = $v['goods_pay_price'];
                       $goods[$k]['goods_image'] = $v['goods_image'];
                       $goods[$k]['goods_name'] = $v['goods_name'];
                       $goods[$k]['goods_num'] = $v['goods_num'];
                       $goods[$k]['goods_id'] = $v['goods_id'];
                   }
       
               }else{
                   $order_goods = $this->db->select('goods_id,goods_color,goods_color_remark,goods_size,goods_size_remark,goods_price,goods_num,goods_name,goods_image,goods_pay_price')->where('goods_ea_id', $return['goods_ea_id'])->where('order_sn',$return['order_sn'])->get('shop_order_goods')->row_array();
                   $goods[0]['color'] = empty($order_goods['goods_color_remark']) ? $order_goods['goods_color'] : $order_goods['goods_color_remark'];
                   $goods[0]['size'] = empty($order_goods['goods_size_remark']) ? $order_goods['goods_size'] : $order_goods['goods_size_remark'];
                   $goods[0]['goods_price'] = $order_goods['goods_price'];
                   $goods[0]['goods_pay_price'] = $order_goods['goods_pay_price'];
                   $goods[0]['goods_image'] = $order_goods['goods_image'];
                   $goods[0]['goods_name'] = $order_goods['goods_name'];
                   $goods[0]['goods_num'] = $order_goods['goods_num'];
                   $goods[0]['goods_id'] = $order_goods['goods_id'];
       
               }
               $return['goods_info']=$goods;
       
               $this->db->select("so.order_sn,so.pay_sn,so.order_from,so.order_type,s.ous_tel,so.store_name,
            so.pay_type,so.order_status,so.store_id,so.spg_id,so.spg_name,so.buyer_nickname,so.buyer_id,
            so.shipping_type,so.order_price,so.goods_num,so.goods_price,so.pd_amount,so.counpon_amount,so.integral_amount,
            so.rebate,so.rebate_amount,so.invoice_name,so.invoice_type,so.invoice_kind,so.evaluation_state,so.evaluation_time,
            so.order_pointscount,so.coupon_id,so.coupon_price,so.pay_time,so.created_time,so.end_time,so.buyer_message,
            so.buyer_memo,so.carriage,so.refund_state,so.refund,so.receive_name,so.receive_province,
            so.receive_city,so.receive_area,so.receive_address,so.receive_mobile,so.receive_tel,so.receive_postcode,
            so.delivery_time,so.receive_time,so.logistics_company_name,so.waybill_sn,so.pickup_code,u.user_name,u.tel,
            a.area_name as province,b.area_name as city,c.area_name as area");
               $this->db->from('shop_order so');
               $this->db->join('store s','s.store_id=so.store_id','left');
               $this->db->join('user u','u.user_id=so.buyer_id','left');
               $this->db->join('area a','a.area_id=so.receive_province','left');
               $this->db->join('area b','b.area_id=so.receive_city','left');
               $this->db->join('area c','c.area_id=so.receive_area','left');
               $this->db->where('so.order_sn',$return['order_sn']);
               $order = $this->db->get()->row_array();
               $pay_type = array('1'=>'微信','2'=>'线下','3'=>'余额','4'=>'支付宝');
               if($order['pay_type'] != 0){
                   $order['pay_type'] = array_key_exists($order['pay_type'], $pay_type)!==false ? $pay_type[$order['pay_type']] : '其他';
               }
               
               if(isset($order['user_name'])&&!empty($order['user_name'])){
                   $order['receive_name'] = $order['user_name'];
               }
               if(empty($order['receive_mobile'])){
                   $order['receive_mobile'] = $order['tel'];
               }
               $order_from = array('1'=>'微商城','21'=>'单门店','2'=>'单门店','22'=>'集合店','3'=>'APP','31'=>'APP微商','32'=>'APP批发','41'=>'电商京东','42'=>'电商天猫','43'=>'电商手工');
               $order['order_from'] = $order_from[$order['order_from']];
               $order['shipping'] = $order['shipping_type']==1?'快递':'自提';
               $order['delivery_date'] = empty($order['delivery_time'])?'':date('Y-m-d H:i:s',$order['delivery_time']);
               $order['pay_time'] = empty($order['pay_time'])?'':date('Y-m-d H:i:s',$order['pay_time']);
               $order['created_time'] = date('Y-m-d H:i:s',$order['created_time']);
               $defaultImg = $this->common_function->get_system_value('default_goods_image');
               $this->smarty->assign('defaultImg',$defaultImg);
               $return['add_time'] = date('Y-m-d H:i:s', $return['add_time']);
               if(!empty($return['express_id'])){
                   $return['express_name']=$this->db->select('e_name')->where('e_code',$return['express_id'])->get('express')->row('e_name');
               }else{
                   $return['express_name']='';
               }
       
               //申请时间
               $apply_time=$this->db->select('add_time')->from('shop_order_return_log')
               ->where('return_id',$returnId)->where('type',1)->get()->row_array();
               if(!empty($apply_time)){
                   $return['apply_time']=date('Y-m-d H:i:s',$apply_time['add_time']);
               }
       
               //开始处理时间
               $doing_time=$this->db->select('add_time')->from('shop_order_return_log')
               ->where('return_id',$returnId)->where('type!=',1)->order_by('add_time ASC')->get()->row_array();
               if(!empty($doing_time)){
                   $return['doing_time']=date('Y-m-d H:i:s',$doing_time['add_time']);
               }
       
               //完成时间
               if($return['refund_state']==3){
                   $end_time=$this->db->select('add_time')->from('shop_order_return_log')
                   ->where('return_id',$returnId)->where('type!=',9)->order_by('add_time DESC')->get()->row_array();
                   if(!empty($end_time)){
                       $return['end_time']=date('Y-m-d H:i:s',$end_time['add_time']);
                   }
               }
       
               $return['refund_amount'] = ($return['refund_amount']==0)?$return['refund_amount_apply']:$return['refund_amount'];
               $this->smarty->assign('return',$return);
               $this->smarty->assign('order',$order);
               //$this->smarty->display('service_refund_detail.html');
               $this->smarty->display('refund_detail.html');
           }
       }
   }

   
   /*售后沟通日志*/
   public function refund_notes(){
       if(isset($_GET['id'])&&!empty($_GET['id'])){
           $returnId=$_GET['id'];
           $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
           $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
           $this->db->select('sornid,guide_id,content,action_type,add_time,type')->from('shop_order_return_log')
           ->where('return_id',$returnId);
           $db = clone($this->db);
           $total = $this->db->count_all_results();
           $start = ($page - 1) * $rp;
           $this->db = $db;
           $rows=$this->db->order_by('add_time DESC,type DESC')->limit($rp,$start)->get()->result_array();
           header('Content-type:text/xml');
           $xml = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
           $xml .= '<rows>';
           $xml .= '<total>'.$total.'</total>';
           $xml .= '<page>'.$page.'</page>';
           foreach ($rows as $row){
               $xml .= '<row id="'.$row['sornid'].'">';
               if($row['action_type']==1){
                   $name=$this->common_function->get_one('user','user_id='.$row['guide_id'],'user_name');
                   $str='买家 '.$name;
               }elseif($row['action_type']==2){
                   $name=$this->common_function->get_one('store_shopping_guide','spg_id='.$row['guide_id'],'spg_name');
                   $str='商家 '.$name;
               }elseif($row['action_type']==3){
                   $name=$this->common_function->get_one('admin','admin_id='.$row['guide_id'],'admin_name');
                   $str='平台 '.$name;
               }else{
                   $str='系统';
               }
               $xml .= '<cell><![CDATA['.$str.']]></cell>';
               $type=['买家取消','申请售后','拒绝申请退款','同意退款处理中','同意退款并退货,请填写物流单号','填写退货物流','物流单通过审核处理中','物流单未通过审核，请重新填写','','备注','退款成功'];
               $xml .= '<cell><![CDATA['.$type[$row['type']].']]></cell>';
               $xml .= '<cell><![CDATA['.date('Y-m-d H:i:s',$row['add_time']).']]></cell>';
               if($row['type']==1){
                   $tel=$this->db->select('refund_tel')->where('refund_id',$returnId)->get('shop_order_refund_return')->row('refund_tel');
                   $cont=json_decode($row['content'],true);
                   if (!empty($cont['pic_info'])) {
                       $img = unserialize($cont['pic_info']);
                       $pic='';
                       foreach ($img as $kk=>$vv) {
                           $url=HEADIMAGE .$vv;
                           $pic.='<img src="'.$url.'"'.'style="height:80%;"'.'data-geo="<img src='.$url.' width=300px >">&nbsp';
                       }
                   } else {
                       $pic= '无';
                   }
                   $reason=empty($cont['reason_info'])?'无':$cont['reason_info'];
                   $message=empty($cont['note'])?'无':$cont['note'];
                   $xml .= "<cell><![CDATA[".'联系电话:'.$tel.';&nbsp;原因:'.$reason.';&nbsp;买家备注:'.$message.';&nbsp;举证:'.$pic."]]></cell>";
               }elseif($row['type']==5){
                   $row['content']=str_replace('%',';&nbsp;',$row['content']);
                   $xml .= '<cell><![CDATA['.$row['content'].']]></cell>';
               }else{
                   $xml .= '<cell><![CDATA['.$row['content'].']]></cell>';
               }
               $xml .= '</row>';
           }
           $xml .= '</rows>';
           die($xml);
       }
   }
   
  
   /*添加售后备注*/
   public function add_refund_note(){
       $res=array('state'=>false,'msg'=>'系统错误,请稍后再试');
       if(isset($_GET['id'])&&!empty($_GET['id'])){
           $data=array(
               'return_id'=>$_GET['id'],
               'guide_id'=>$_SESSION['shop_spg_id'],
               'action_type'=>3,
               'content'=>'备注内容:'.$_POST['note'],
               'add_time'=>time(),
               'type'=>9,
           );
           if($this->db->insert('shop_order_return_log',$data)){
               $res=array('state'=>true);
           }else{
               $res=array('state'=>false,'msg'=>'添加备注失败');
           }
       }
       echo json_encode($res);exit();
   }
   
  
   /*售后处理*/
   public function refund_do(){
       $res=array('state'=>false,'msg'=>'系统错误,请稍后再试');
       if(isset($_GET['id'])&&!empty($_GET['id'])){
           $id=$_GET['id'];
           if($_POST['tag']=='ga'){  //同意退货,添加退货地址
               $this->db->set(['seller_state' => 2, 'refund_goods_num'=>$_POST['num'],'refund_address' => $_POST['address'],'admin_time'=>time()])->where('refund_id',$id)->update('shop_order_refund_return');
               $return_log=array('return_id'=>$id,'guide_id'=>$_SESSION['shop_spg_id'],'action_type'=>2,'content'=>'退货地址:'.$_POST['address'],'add_time'=>time(),'type'=>4);
               $this->db->insert('shop_order_return_log',$return_log);//写退货日志
               $frist='您的退货申请已被同意,请将商品寄回指定地址,卖家收货后会将钱退到您的账户余额';  //微信通知的头部信息
               $end='请将商品寄到'.'"'.$_POST['address'].'"'.',如有问题可直接咨询导购哦！';   //微信通知的结尾处信息
               $url_turn='vmall.php/order/applyReturnMoney_result_writeExpress?refund_id='.$id;    //微信通知的点击跳转地址
               $this->weixin_return_goods($id,$frist,$end,$url_turn);  //发送微信通知
               $res=array('state'=>true,'msg'=>'');
           }elseif($_POST['tag']=='mr'){     //拒绝退款
               $this->db->set(['seller_state' => 3, 'refund_state' => 3,'admin_time'=>time()])->where('refund_id',$id)->update('shop_order_refund_return');
               $return_log=array('return_id'=>$id,'guide_id'=>$_SESSION['shop_spg_id'],'action_type'=>2,'content'=>'拒绝理由:'.$_POST['reason'],'add_time'=>time(),'type'=>2);
               $this->db->insert('shop_order_return_log',$return_log);//写退货日志
               $frist='您的退款申请已被拒绝';
               $end='拒绝理由：'.$_POST['reason'].',如有问题可直接咨询店铺导购！';
               $url_turn="vmall.php/order/applyReturnMoney_result?refund_id=".$id;
               $this->weixin_return_money($id,$frist,$end,$url_turn); //发送微信通知
               $res=array('state'=>true,'msg'=>'');
           }elseif ($_POST['tag']=='gr'){    //不同意退货
               $this->db->set(['seller_state' => 3, 'refund_state' => 3,'admin_time'=>time()])->where('refund_id',$id)->update('shop_order_refund_return');
               $return_log=array('return_id'=>$id,'guide_id'=>$_SESSION['shop_spg_id'],'action_type'=>2,'content'=>'拒绝理由:'.$_POST['reason'],'add_time'=>time(),'type'=>2);
               $this->db->insert('shop_order_return_log',$return_log);//写退货日志
               $frist='您的退货申请已被拒绝';
               $end='拒绝理由：'.$_POST['reason'].',如有问题可直接咨询店铺导购！';
               $url_turn='vmall.php/order/applyReturnMoney_result?refund_id='.$id;
               $this->weixin_return_goods($id,$frist,$end,$url_turn);  //发送微信通知
               $res=array('state'=>true,'msg'=>'');
           }elseif ($_POST['tag']=='r'){     //未收到货拒绝退款
               $return_log=array('return_id'=>$id,'guide_id'=>$_SESSION['shop_spg_id'],'action_type'=>2,'content'=>'拒绝理由:'.$_POST['reason'],'add_time'=>time(),'type'=>7);
               $this->db->insert('shop_order_return_log',$return_log);//写退货日志
               $this->db->set(['express_id'=>'','invoice_no'=>''])->where('refund_id',$id)->update('shop_order_refund_return');
               $frist='您的退款处理已被拒绝';
               $end='拒绝理由：'.$_POST['reason'].',如有问题可直接咨询店铺导购！';
               $url_turn="vmall.php/order/applyReturnMoney_result?refund_id=".$id;
               $this->weixin_return_money($id,$frist,$end,$url_turn); //发送微信通知
               $res=array('state'=>true,'msg'=>'');
           }elseif ($_POST['tag']=='ma' || $_POST['tag']=='a'){     //同意退款 || 收到货同意退款
               $returns=$this->db->select('store_id,refund_amount_apply,refund_type,order_sn,reason_info,seller_state')->where('refund_id',$id)->where('seller_state!=',3)->where('refund_state!=',3)->get('shop_order_refund_return')->row_array();
               if (!empty($returns)) {
                   $order_info = $this->db->select('order_status,buyer_id,pay_sn')->where('order_sn', $returns['order_sn'])->get('shop_order')->row_array();
                   $store_in = $this->db->select('asset_out')->where('pay_sn', $order_info['pay_sn'])->where('store_id', $returns['store_id'])->where('log_type',3)->get('store_asset_log')->row('asset_in');  //门店订单收入
                   if(!empty($store_in)){   //判断此订单门店是否已进账，是就扣除
                       $balance_store = $this->db->select('balance')->where('store_id', $returns['store_id'])->get('store')->row('balance');
                       $cc = $this->db->select('asset_out')->where('pay_sn', $order_info['pay_sn'])->where('store_id', $returns['store_id'])->where('log_type', 5)->get('store_asset_log')->row('asset_out');  //平台抽成
                       $fl = $this->db->select('asset_in')->where('pay_sn', $order_info['pay_sn'])->where('store_id', $returns['store_id'])->where('log_type', 6)->get('store_asset_log')->row('asset_in');  //平台返利
                       $balance_store = empty($balance_store) ? 0 : $balance_store;
                       $cc = empty($cc) ? 0 : $cc;
                       $fl = empty($fl) ? 0 : $fl;
                       $asset_out = $returns['refund_amount_apply'] - $cc + $fl;
                       $asset = $balance_store - $asset_out;
                       $store_log = array('store_id' => $returns['store_id'],'pay_sn'=>$order_info['pay_sn'], 'log_type' => 3, 'asset_in' => 0, 'asset_out' => $asset_out,
                           'asset' => $asset, 'note' => "订单号" . $returns['order_sn'] . "退款支出" . $asset_out, 'time' => time());
                       $frist='卖家已收到您的退货,退款金额已退到账户余额';
                   }else{
                       $frist='您的退款申请已被同意';
                   }
                   if ($_POST['tag'] == 'ma') {
                       $refund_log = array('return_id' => $id, 'guide_id' => $_SESSION['shop_spg_id'], 'action_type' => 2, 'content' => '', 'add_time' => time(), 'type' => 3);
                       $this->db->insert('shop_order_return_log', $refund_log);//写退货日志
                   } else {
                       $refund_log = array('return_id' => $id, 'guide_id' => $_SESSION['shop_spg_id'], 'action_type' => 2, 'content' => '', 'add_time' => time(), 'type' => 6);
                       $this->db->insert('shop_order_return_log', $refund_log);//写退货日志
                   }
                   $balance = $this->db->select('balance')->where('user_id', $order_info['buyer_id'])->get('user')->row_array();
                   $balance['balance'] = empty($balance['balance']) ? 0 : $balance['balance'];
                   $now_balance = $balance['balance'] + $returns['refund_amount_apply'];
                   $user_log = array('user_id' => $order_info['buyer_id'],'pay_sn'=>$order_info['pay_sn'], 'log_type' => 4, 'asset_out' => 0, 'asset_in' => $returns['refund_amount_apply'],
                       'asset' => $now_balance, 'note' => '订单' . $returns['order_sn'] . '退款' . $returns['refund_amount_apply'], 'time' => time());
                   $this->db->trans_off(); //禁用事务
                   $this->db->trans_start(); //开启事务
                   $this->db->set(['seller_state' => 2, 'refund_state' => 3, 'admin_time' => time(), 'refund_amount' => $returns['refund_amount_apply']])->where('refund_id', $id)->update('shop_order_refund_return');
                   $this->db->insert('user_asset_log', $user_log);
                   $this->db->set('balance', $now_balance)->where('user_id', $order_info['buyer_id'])->update('user');
                   if (isset($store_log)) {
                       $this->db->insert('store_asset_log', $store_log);
                       $this->db->set('balance', $asset)->where('store_id', $returns['store_id'])->update('store');
                   }
                   $this->db->trans_complete(); //事务完成
                   $this->db->trans_off(); //禁用事务
                   if ($this->db->trans_status() !== false) {
                       $return_log = array('return_id' => $id, 'guide_id' => 0, 'action_type' => 0, 'add_time' => time(), 'type' => 10, 'content' => '');
                       $this->db->insert('shop_order_return_log', $return_log);//写退货日志
                       $end='您的退款金额已退到您的账户余额,如有问题及时联系导购';
                       $url_turn="vmall.php/money/index";
                       $this->weixin_return_money($id,$frist,$end,$url_turn);//发送微信通知
                       $res = array('state' => true, 'msg' => '');
                   } else {
                       $res = array('state' => false, 'msg' => '资金退还失败');
                   }
               }
           }else{
               $res=array('state'=>false,'msg'=>'系统错误,请稍后再试');
           }
       }
       echo json_encode($res);exit();
   }
   
   
   /*发送微信退货通知*/
   private function weixin_return_goods($id,$frist,$end,$url_turn){
       //发送微信通知
       $temp=$this->common_function->get_weixin_temp_value('RETURN');
       $return=$this->db->select('order_sn,buyer_id,refund_amount_apply')->where('refund_id',$id)->get('shop_order_refund_return')->row_array();
       $user=$this->db->select('user_id,goods_name')->where('order_sn',$return['order_sn'])->get('shop_order_goods')->row_array();
       $openid=$this->db->select('wx_openid,user_name')->where('user_id',$return['buyer_id'])->get('user')->row_array();
   
       $url=PLUGIN.'vmall.php/receive/weixin_send_msg';
       $r=array(
           "first"=>array("value"=>"{$frist}"."\n",
           "color"=>"#173177"
               ),
               "keyword1"=>array("value"=>"{$return['order_sn']}",
               "color"=>"#173177"
                   ),
                   "keyword2"=>array("value"=>"{$user['goods_name']}",
                   "color"=>"#173177"
                       ),
                       "keyword3"=>array("value"=>"{$return['refund_amount_apply']}"."元"."\n",
                       "color"=>"#173177"
                           ),
                           "remark"=>array("value"=>"{$end}",
                           "color"=>"#173177"
                               )
       );
       $data = array(
           "touser"=>"{$openid['wx_openid']}",
           "template_id"=>"{$temp['template_id']}",
           "url"=>PLUGIN.$url_turn,
           "topcolor"=>"#173177",
           "data"=>json_encode($r)
       );
       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
       curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
       if (!empty($data)){
           curl_setopt($curl, CURLOPT_POST, 1);
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
       }
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       $output = curl_exec($curl);
       curl_close($curl);
       $result=json_decode($output,true);
       $result = object_array(json_decode($result,true));
       if($result['errmsg']=='ok'){
           $data1=array(
               'wnl_title'=>$temp['template_title'],
               'wnl_code'=>'RETURN',
               'wnl_content'=>json_encode($r),
               'wnl_type'=>1,
               'wnl_time'=>time(),
               'wnl_to_usersn'=>$openid['user_name'],
               'user_id'=>$return['buyer_id'],
               'order_sn'=>$return['order_sn']
           );
           $this->db->insert('weixin_notify_log',$data1);
       }
   }
   
  
   /*发送微信退款通知*/
   private function weixin_return_money($returnid,$frist,$end,$url_turn){
       //发送微信通知
       $temp=$this->common_function->get_weixin_temp_value('TKTZ');
       $return=$this->db->select('order_sn,buyer_id,refund_amount_apply,reason_info')->where('refund_id',$returnid)->get('shop_order_refund_return')->row_array();
       $openid=$this->db->select('wx_openid,user_name')->where('user_id',$return['buyer_id'])->get('user')->row_array();
   
       $url=PLUGIN.'vmall.php/receive/weixin_send_msg';
       $r=array(
           "first"=>array("value"=>"{$frist}",
           "color"=>"#173177"
               ),
               "reason"=>array("value"=>"{$return['reason_info']}",
               "color"=>"#173177"
                   ),
                   "refund"=>array("value"=>"{$return['refund_amount_apply']}"."元"."\n",
                   "color"=>"#173177"
                       ),
                       "remark"=>array("value"=>"{$end}",
                       "color"=>"#173177"
                           )
       );
       $data = array(
           "touser"=>"{$openid['wx_openid']}",
           "template_id"=>"{$temp['template_id']}",
           "url"=>PLUGIN.$url_turn,
           "topcolor"=>"#173177",
           "data"=>json_encode($r)
       );
   
       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
       curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
       if (!empty($data)){
           curl_setopt($curl, CURLOPT_POST, 1);
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
       }
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       $output = curl_exec($curl);
       curl_close($curl);
       $result=json_decode($output,true);
       $result = object_array(json_decode($result,true));
       if($result['errmsg']=='ok'){
           $data1=array(
               'wnl_title'=>$temp['template_title'],
               'wnl_code'=>'TKTZ',
               'wnl_content'=>json_encode($r),
               'wnl_type'=>1,
               'wnl_time'=>time(),
               'wnl_to_usersn'=>$openid['user_name'],
               'user_id'=>$return['buyer_id'],
               'order_sn'=>$return['order_sn']
           );
           $this->db->insert('weixin_notify_log',$data1);
       }
   }
   
   
   public function pay_pasword_check(){
       $result = array("state"=>true,'msg'=>'');
       echo json_encode($result);exit();
   }
   //同步库存
   public function stock_sync_check(){
   	  $goods_id = isset($_POST['goods_id'])?$_POST['goods_id']:'';
   	  $store_id = $_SESSION['shop_spg_store_id'];
   	  $result = array('state'=>false,'msg'=>'操作错误');
   	  if($goods_id){
   	  	  $uec_goods_iid = $this->db->select('g.goods_id,s.goods_ea_id,s.uec_sku_iiud,s.uec_goods_iiud,s.stocks_sn,s.size,s.amount')
   	  	  ->from('shop_goods g')
   	  	  ->join('store_stocks_amount s','s.goods_id=g.goods_id','left')->where('g.goods_id',$goods_id)->where('s.ssa_store_id',$store_id)->get()->result_array();
   	  	  if(empty($uec_goods_iid)){
   	  	  	$result['msg'] = '商品不存在';
   	  	  }else{
   	  	  	//print_r($uec_goods_iid);die;
   	  	  	/*$auth_store = $this->db->select('group_concat(a.auth_store_id) as auth_store_id')->from('store_auth_store a')
   	  	  	->join('shop_goods g','g.brand_id=a.brand_id')
   	  	  	->where('a.store_id',$store_id)
   	  	  	->where('g.goods_id',$goods_id)
   	  	  	->get()->row('auth_store_id');*/
   	  	  	foreach ($uec_goods_iid as $k=>$v){
   	  	  		if(empty($v['uec_sku_iiud'])||empty($v['uec_goods_iiud'])){
   	  	  			unset($uec_goods_iid[$k]);
   	  	  		}else{
   	  	  			/*$auth_uec_goods_iid_num = $this->db->select('sum(s.amount) as amount')
   	  	  			->from('shop_goods g')
   	  	  			->join('store_stocks_amount s','s.goods_id=g.goods_id','left')->where('s.goods_ea_id',$v['goods_ea_id'])
   	  	  			->where_in('s.ssa_store_id',$auth_store)->where('g.goods_state',1)
   	  	  			->get()->row('amount');*/
   	  	  			$uec_goods_iid[$k]['amount'] = $v['amount'];
   	  	  		}
   	  	  	}
   	  	  	if(empty($uec_goods_iid)){
   	  	  		$result['msg'] = '此商品不是店铺中商品或此商品还未同步！';
   	  	  	}else{
   	  	  		$result = array('state'=>true,'msg'=>'','data'=>$uec_goods_iid);
   	  	  	}
   	  	  } 
   	  	  //print_r($result);die;
   	  	  
   	  }
   	  echo json_encode($result);exit;
   }
   public function stock_sync(){
   	  //print_r($_POST);die;
   	  $data = isset($_POST['data'])?$_POST['data']:'';
   	  $result = array('state'=>false,'msg'=>'操作错误');
   	  if($data){
   	  	 $data = object_array(json_decode($data));
   	  	 //print_r($data);die;
   	  	 $this->load->library('store_api');
   	  	 
   	  	 $store_info = $this->store_api->get_store_by_id($_SESSION['shop_spg_store_id']);
   	  	 if($store_info['ecs_code']==1){
   	  	 	$this->load->library('jd_op');
   	  	 	$this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
   	  	 	foreach ($data as $k=>$v){
   	  	 		$result = $this->jd_op->stock_sync($v['amount'], $v['uec_sku_iiud']);
   	  	 		if($result['state']){
   	  	 			continue;
   	  	 		}else{
   	  	 			break;
   	  	 		}
   	  	 	}
   	  	 	
   	  	 }elseif($store_info['ecs_code']==2){
   	  	 	$iid = array();
   	  	 	for($i=0;$i<count($data);$i++){
   	  	 		$key = $i/20;$ka = $i%20;
   	  	 		$iid[$key][$ka] = $data[$i];
   	  	 	}
   	  	 	$this->load->library('taobao_op');
   	  	 	$this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
   	  	 	foreach ($iid as $k=>$v){
   	  	 		$skuid_quantities = array();$uec_goods_id = '';
   	  	 		foreach ($v as $kq=>$vq){
   	  	 			$skuid_quantities[] = $vq['uec_sku_iiud'].':'.$vq['amount'];
   	  	 			if(empty($uec_goods_id)){
   	  	 				$uec_goods_id = $vq['uec_goods_iiud'];
   	  	 			}
   	  	 		}
   	  	 		$skuid_quantities = join(';',$skuid_quantities);
   	  	 		$result = $this->taobao_op->stock_sync_batch($uec_goods_id, $skuid_quantities);
   	  	 		if($result['state']){
   	  	 			continue;
   	  	 		}else{
   	  	 			break;
   	  	 		}
   	  	 	}
   	  	 }
   	  	 //$result = array('state'=>true,'msg'=>'同步完成');
   	  }
   	  echo json_encode($result);exit;
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
   public function sync_amount(){
   	//print_r($_POST);print_r($_GET);die;
   	$store_id =   $_SESSION['shop_spg_store_id'];
   	$amount = isset($_GET['amount'])?trim($_GET['amount']):'';
   	$id = (isset($_POST['id']) && !empty($_POST['id'])) ? trim($_POST['id']) : '';
   	$date_from = isset($_GET['date_from'])?trim($_GET['date_from']):'';
   	$date_to = isset($_GET['date_to'])?trim($_GET['date_to']):'';
   	$brand_code = isset($_GET['brand_id'])?$_GET['brand_id']:'';
   	$stock_sn = isset($_GET['stock_sn'])?trim($_GET['stock_sn']):'';
   	$stock_name = isset($_GET['stock_name'])?trim($_GET['stock_name']):'';
   	$gc_id = isset($_GET['gc_id'])?trim($_GET['gc_id']):'';
   	$stocks_bar_code = isset($_GET['stocks_bar_code'])?trim($_GET['stocks_bar_code']):'';
   	$where = " 1=1 ";
   	$result = array('state'=>false,'msg'=>'操作错误');
   	if(empty($store_id)){
   		echo json_encode($result);exit;
   	}
   	$time = time();
   	$userid = $_SESSION['shop_spg_id'];
   	$username = $_SESSION['shop_spg_nike_name'];
   	//$auth_store = $this->common_function->get_auth_store($store_id);
   	if($id){
   		$stocks = $this->db->select('g.goods_id,s.ssa_id,s.goods_ea_id,s.uec_sku_iiud,s.uec_goods_iiud,s.stocks_sn,s.size,s.amount')
   	  	->from('store_stocks_amount s')
   	    ->join('shop_goods g','g.goods_id=s.goods_id')->where_in("s.goods_id",explode(',',$id))->where('s.ssa_store_id',$store_id)
   	    ->where('s.uec_goods_iiud>0')->where('s.uec_sku_iiud>0')
   		->where('g.goods_state',1)->get()->result_array();
   		//print_r($id);print_r($this->db->last_query());die;
   		           
   	
   	}else{
   		if($stock_sn){
   			$where .=" and s.stocks_sn like '%{$stock_sn}%' ";
   		}
   		if($stock_name){
   			$where .=" and g.goods_name like '%{$stock_name}%' ";
   		}
   		if($stocks_bar_code){
   			$where .=" and s.stocks_bar_code like '%{$stocks_bar_code}%' ";
   		}
   		if($date_from){
   			$date_from = strtotime($date_from);
   			$where .=" and s.update_time>='{$date_from}' ";
   		}
   		if($date_to){
   			$date_to = strtotime($date_to);
   			$where .=" and s.update_time<='{$date_to}' ";
   		}
   		if($brand_code){
   			$where .=" and g.brand_id='{$brand_code}' ";
   		}
   		//print_r($where);die;
   		if($gc_id){
   			$gc_ids = $this->get_class_by_parent_id($gc_id);
   			$gc_ids = empty($gc_ids)?$gc_id:$gc_ids.','.$gc_id;
   			$where .=" and g.gc_id IN ($gc_ids) ";
   		}
   		if($amount!=''){
   			if($amount==1){
   				$where .=" and s.amount>0 ";
   			}else{
   				$where .=" and s.amount=0 ";
   			}
   			
   		}
   		$stocks = $this->db->select('g.goods_id,s.ssa_id,s.goods_ea_id,s.uec_sku_iiud,s.uec_goods_iiud,s.stocks_sn,s.size,s.amount')
   	  	->from('store_stocks_amount s')
   	    ->join('shop_goods g','g.goods_id=s.goods_id')->where($where)->where('s.ssa_store_id',$store_id)
   	    ->where('s.uec_goods_iiud>0')->where('s.uec_sku_iiud>0')
   		->where('g.goods_state',1)->get()->result_array();
   		//print_r($stocks);print_r($this->db->last_query());die;
   	}
   	if(empty($stocks)){
   		$result = array('state'=>false,'msg'=>'同步数据为空');
   		echo json_encode($result);exit;
   	}
   	$sync_iid = array();
   	$this->load->library('store_api');
   	$uec_id = $store_id;$err_arr = array();
   	$store_info = $this->store_api->get_store_by_id($uec_id);
   	$sku_stocks_arr = [];    //淘宝批量更新库存所用
   	$start_time = date("Y-m-d H:i:s", time());
   	$log_path = 'stores/'.$uec_id.'/stocks_run_log_'.date('Y-m-d').'.txt';
   	note_log($log_path, '开始处理数据');
   	if($store_info['ecs_code'] == 2){
   		$this->load->library('taobao_op');
   		$this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
   	}elseif ($store_info['ecs_code'] == 1) { 
   		$this->load->library('jd_op');
   		$this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
   	}else{
   		echo json_encode($result);exit;
   	}
    foreach ($stocks as $info_k=>$info) {   //循环店铺的所有商品计算库存
    	    $stock = $info['amount'];
    		if ($store_info['ecs_code'] == 2) {         //淘宝
    			$sku_stocks_arr[$info['uec_goods_iiud']][$info['uec_sku_iiud']]['uec_gd_sck_id'] = $info['ssa_id'];
    			//$sku_stocks_arr[$info['uec_goods_iiud']][$info['shop_goods_code']]['sku_id'] = $info['sku_id'];
    			$sku_stocks_arr[$info['uec_goods_iiud']][$info['uec_sku_iiud']]['uec_sku_iiud'] = $info['uec_sku_iiud'];
    			$sku_stocks_arr[$info['uec_goods_iiud']][$info['uec_sku_iiud']]['stock'] = $stock;   //为批量更新库存封装信息
    			continue;
    		} elseif ($store_info['ecs_code'] == 1) {    //京东
    			
    			$result = $this->jd_op->stock_sync($stock, $info['uec_sku_iiud']);
    		}
    		//print_r($stocks);die;
    		if ($result) {
    			if ($result['state']) {
    				$this->db->where('uec_sku_iiud', $info['uec_sku_iiud'])->update('store_stocks_amount', array('uec_amount' => $stocks, 'last_sync_time' => time()));
    			} else {
    				$error_msg = isset($result['msg']) ? $result['msg'] : "Modify the article number by sdk of the failure of {$info['stocks_sn']} stock!";
    				note_log($log_path, $error_msg);continue;
    				
    			}
    		} else {
    			$err_arr[] = isset($result['msg']) ? "store{$uec_id}--{$info['stocks_sn']}---{$result['msg']}" : "Modify the article number by sdk of the failure of {$info['stocks_sn']} stock!";
    			if ($info_k == (count($stocks) - 1)) {  //
    				$error_msg = implode(";", $err_arr);
    				note_log($log_path, $error_msg);continue;
    				
    			}
    		}
    		if($this->config->config['sync_logs']){
    			note_log($log_path, $start_time.'=>'.date('Y-m-d H:i:s').'店铺'.$uec_id.'结束同步第'.$info_k.'个库存');
    		}
    	}
    	//print_r($sku_stocks_arr);die;
    	if ($store_info['ecs_code'] == 2 && !empty($sku_stocks_arr)){    // 淘宝店铺批量更新库存
    		//                                                    var_dump($sku_stocks_arr);exit;
    		if($this->config->config['sync_logs']){
    			note_log($log_path, $start_time.'=>'.date('Y-m-d H:i:s').'店铺'.$uec_id.'开始淘宝批量同步库存');
    		}
    		
    		$info_k = 0;
    		foreach($sku_stocks_arr as $iiud=>$stock_info){
    			$info_k++;
    			//                                                        var_dump($iiud);exit;
    			$num_flag = 0;  //每次的计数
    			$sync_flag = 0;   //同步的次数
    			$uec_gd_sck_id_arr = []; // 更新库存表的最后更新时间和库存
    			$outerid_quantities ='';
    			foreach($stock_info  as  $outer_id=>$stocks){
    				$num_flag++;
    				$outerid_quantities .= "{$outer_id}:{$stocks['stock']};";
    				$uec_gd_sck_id[$outer_id] = array(
    						'ssa_id'=>$stocks['ssa_id'],
    						'uec_amount'=>$stocks['stock'],
    						'last_sync_time'=>time()
    				);
    				if(($sync_flag*20+$num_flag)== (count($stock_info)) || $num_flag==20){   //最多20个
    					$result = $this->taobao_op->stock_sync_batch($iiud, $outerid_quantities);
    					if($result['state']){//回写数据库（库存和更新时间）
    						//                                                                  $uec_gd_sck_ids = explode(',', rtrim($uec_gd_sck_id));
    						$result = $this->db->update_batch('store_stocks_amount',$uec_gd_sck_id,'ssa_id');
    	
    					}else{//记录错误
    						$err_arr[] = isset($result['msg']) ? "store{$uec_id}--({$outerid_quantities})---{$result['msg']}" : "Modify the article number by sdk of the failure of ({$outerid_quantities}) stock!";
    						if ($info_k == count($sku_stocks_arr)) {  //
    							$error_msg = implode(";", $err_arr);
    							note_log($log_path, $error_msg);continue;
    						}
    					}
    					$sync_flag++;
    					$num_flag = 0;    //重置
    					$uec_gd_sck_id = '';
    					$outerid_quantities = '';
    				}
    			}
    		}
    		if($this->config->config['sync_logs']){
    			note_log($log_path, $start_time.'=>'.date('Y-m-d H:i:s').'店铺'.$uec_id.'结束淘宝批量同步库存');
    		}
    	}
    	$result = array('state' => true, 'msg' => '同步完成');
    	echo json_encode($result);exit;
   	/*$where_auth = '';
   	if($brand_code){
   		foreach ($auth_store as $ak=>$av){
   			if($brand_code==$av['brand_id']){
   				$where_auth .=empty($where_auth)?" (g.brand_id='{$brand_code}' and s.ssa_store_id='{$av['auth_store_id']}') ":" or (g.brand_id='{$brand_code}' and s.ssa_store_id='{$av['auth_store_id']}') ";
   			}
   		}
   	}else{
   		foreach ($auth_store as $ak=>$av){
   			$where_auth .=empty($where_auth)?" (g.brand_id='{$brand_code}' and s.ssa_store_id='{$av['auth_store_id']}') ":" or (g.brand_id='{$brand_code}' and s.ssa_store_id='{$av['auth_store_id']}') ";
   		}
   	}
   	if(!empty($where_auth)){
   		$where .=" and (".$where_auth.") ";
   	}*/
   	//print_r($auth_store);die;
   }
   

    /*
     * 网店同步库存
     *  $post提交商品id
     */
    public function set_shop_stock_online ()
    {
        ini_set("max_execution_time", 0);
        set_time_limit(0);
        ignore_user_abort(true);
        $data = array('state' => false, 'msg' => '系统错误！');
        $id = $_SESSION['shop_spg_store_id'];
        $uids = isset ($_GET['id']) ? $_GET['id']:false;
        $this->load->library('store_api');
        $store_info = $this->store_api->get_store_by_id($id);
        
        $this->db->distinct()->select ('sg.goods_id,sa.amount,sa.uec_sku_iiud,sa.uec_goods_iiud');
        $this->db->from ('shop_goods as sg');
        $this->db->join ('store_stocks_amount as sa',' sg.goods_id = sa.goods_id','left');
        $this->db->where ("sa.ssa_store_id", $id); //自建商品
        if(!$uids){
            $data = array('state' => false, 'msg' => '参数错误！');
            return $data;
        }
        $uid_string = 'sg.goods_id in ('.  $uids .')';
        $this->db->where ("$uid_string");
        $this->db->where ("sg.goods_state != 0"); //未删除的
        $this->db->order_by ('sg.goods_id', 'DESC'); 
        $rowsInfo = $this->db->get ()->result_array() ;
        if ($store_info['ecs_code'] == 1) {
            $this->load->library('jd_op');
            $this->jd_op->foo($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
    
        } elseif ($store_info['ecs_code'] == 2) {
            $this->load->library('taobao_op');
            $this->taobao_op->init($store_info['AppKey'], $store_info['AppSecret'], $store_info['bind_token_session']);
            $total = 0;
            if(count($rowsInfo)>0){
              foreach ($rowsInfo as $v) {
                $uec_goods_iiud = $v['uec_goods_iiud'];
                $stocks = $v['amount'];
                $sku = $v['uec_sku_iiud'];
                $data = $this->taobao_op->stock_sync($uec_goods_iiud, $stocks, $sku);
                if(!$data['state']){
                  break;
                }else{
                  $total++;
                  $data = array('state' => true, 'msg' => '操作成功！共更新'.$total.'条数据' );
                  continue;
                }

              }

            }  
        }
       echo  json_encode($data); exit;
    }


   /*
     * 网店总库同步库存
     *  $get提交商品id
     */

    public function set_shop_total_stock_online ()
    {
        include VIEWPATH.'file_handle.html';//页面引入
        ini_set("max_execution_time", 0);
        set_time_limit(0);
        ignore_user_abort(true);
        $data = array('state' => false, 'msg' => '系统错误！');
        $id = $_SESSION['shop_spg_store_id'];
        $uids = isset ($_GET['id']) ? $_GET['id']:false;
        $this->load->library('store_api');
        $store_info = $this->store_api->get_store_by_id($id);
         $gc_id = isset($_GET['gc_id'])?trim($_GET['gc_id']):'';//分类
         $brand_id = isset($_GET['brand_id'])?$_GET['brand_id']:'';//品牌
         $amount = isset($_GET['amount'])?trim($_GET['amount']):'';//数量
         $stock_name = isset($_GET['stock_name'])?trim($_GET['stock_name']):'';//货号
         $stock_sn = isset($_GET['stock_sn'])?trim($_GET['stock_sn']):'';//款号
         $stocks_bar_code = isset($_GET['stocks_bar_code'])?trim($_GET['stocks_bar_code']):'';//条形码
       $where = "";
       if($brand_id){
           $where .=" sg.brand_id ='{$brand_id}' ";
           }else{
               $brands = $this->goods_model->get_brands_by_class ();
               if($brands){
                $bra = array_column($brands , 'brand_id'); 
                $str ='(' .implode(',', $bra) .')';
                   $where .=" sg.brand_id in $str ";
               }else{
                   $where .="  sg.brand_id ='0' ";
               }
           }
       
       if($stock_sn){
           $where .=" and sg.goods_spu like '%{$stock_sn}%' ";
       }
       if($stock_name){
           $where .=" and sa.stocks_sn like '%{$stock_name}%' ";
       }
       if($amount!=''){
           if($amount==0){
               $where .=" and (sa.amount is null or sa.amount='' or sa.amount=0 )";
           }elseif($amount==1){
               $where .=" and sa.amount>0";
           }
       }
       if($gc_id){
           $where .=" and sa.gc_id = '{$gc_id}'";
       }
       
       if($stocks_bar_code){
           $where .=" and sa.stocks_bar_code = '{$stocks_bar_code}'";
       }

       if (isset($_GET['available_coupons']) && !empty($_GET['available_coupons'])) {
           $where.= " and sg.available_coupons= {$_GET['available_coupons']}";
       }
       if (isset($_GET['year_to_market']) && !empty($_GET['year_to_market'])) {
           $where .= " and sg.year_to_market = {$_GET['year_to_market']}";
       }
       if (isset($_GET['season_to_market']) && !empty($_GET['season_to_market'])) {
           $where .= " and sg.season_to_market = {$_GET['season_to_market']}";
       }
       if (isset($_GET['sex']) && !empty($_GET['sex'])) {
           if ($_GET['sex'] == 3) {
               $_GET['sex'] = 0;
           }
           $where.=" and sg.sex = {$_GET['sex']}";
       }

       //商品有无图片
       if (isset($_GET['goods_image']) && !empty($_GET['goods_image'])) {
           if($_GET['goods_image']==1){
               $where.="and sg.goods_image is not null and sg.goods_image!=''";
           }elseif($_GET['goods_image']==2){
               $where.="and sg.goods_image is null";
           }
       }
        $this->db->distinct()->select ('sg.goods_spu,sg.goods_name,sg.goods_id,sa.amount,sa.stocks_sn,sa.amount,sa.size');
           // $this->db->distinct()->select ('sg.goods_id,sum(sa.amount)');
        $this->db->from ('shop_goods as sg');
        $this->db->join ('store_stocks_amount as sa',' sg.goods_id = sa.goods_id','left');
        $this->db->where ("sg.goods_pos is null or sg.goods_pos = 0 "); //总库商品
        // $uids= '23741';
        if($uids){
          $uid_string = 'sg.goods_id in ('.  $uids .')';
          $this->db->where ("$uid_string");
        }else{
          $this->db->where ("$where"); //未删除的
        }
        $this->db->where ("sa.ssa_store_id", $store_info['store_id']); //自建商品
        $this->db->where ("sg.goods_state != 0"); //未删除的
        // $this->db->group_by('sg.goods_id'); 
        $this->db->order_by ('sg.goods_id', 'DESC'); 
        $row_Info = $this->db->get ()->result_array();
        // print_r($rowsInfo );die;
        if(empty($row_Info)) {
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>同步的商品效信息内容为空！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
        }

        $ret = count($row_Info); // 取得总条数
        // echo $ret;die;
        if($ret>10000){
            ob_clean();
            ob_start();
            echo "<script language='javascript'>" .
                '$("#box").append("'."<p class='pos-r text-overflow red'>一次最多同步10000条！"."</p>\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .
                "</script>";
            ob_end_flush();
            ob_flush();
            flush();
            exit();
        }

        $right_num = 0;//正确条数
        $error_num = 0;//错误
        //当前执行位置
        $now_run = 0;//当前
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
 
        $arr =[];
        foreach ($row_Info as $k => $v) {
          $now_run++;
          $percent = intval(($now_run/$ret)*100);
          echo "<script language='javascript'>" .
              // '$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-play-circle-o c-success'></i>:"."[".date('H:i:s')."]，开始处理。"."</p>\");".
              '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
              "</script>";
        
          if(empty($v['stocks_sn']) || empty($v['size'])) {
                $arr[$k] = $v;
                $arr[$k]['cause'] = '商品的货号或者尺码为空';
                $error_num++; 
            }
            $no = $v['stocks_sn'] .'|' . $v['size'];
            $this->db->select ('sa.uec_sku_iiud,sa.uec_goods_iiud,sa.sku_outer_id');
            $this->db->from ('shop_goods as sg');
            $this->db->join ('store_stocks_amount as sa',' sg.goods_id = sa.goods_id','left');
            $this->db->where ("sa.ssa_store_id", $store_info['store_id']); //自建商品
            $this->db->where ("sa.sku_outer_id",  $no); //对比商家编码
            $this->db->where ("sg.goods_state != 0"); //未删除的
            $row = $this->db->get ()->row_array() ;
            if(!empty($row['uec_sku_iiud']) &&  ! empty($row['uec_goods_iiud'])){
              $res =[
                    'amount' => $v['amount']>0 ? $v['amount'] : 0,
                    'uec_goods_iiud' => $row['uec_goods_iiud'],
                    'uec_sku_iiud' => $row['uec_sku_iiud'],
                  ];

                  $da = $this->taobao_and_jd_stock($store_info,$res);
                  if(!$da['state']){
                    $right_num++;
                    $data = array('state' => true, 'msg' => '操作成功！' );
                  }else{
                      $error_num++;
                      $data = $da;
                      $arr[$k] = $v;
                      $arr[$k]['cause'] = $da['msg'];
                  }

                }else{
                
                  $error_num++;
                  $arr[$k] = $v;
                  $arr[$k]['cause'] = '商品还未在淘宝上创建或者还未同步，暂时不能修改数据！';

                }
      
                // if((intval(($now_run/$ret)*100) - intval((($now_run-1)/$ret)*100)) >=1){
                // echo "<script language='javascript'>" .
                //     //'$("#box").append("'."<p class='pos-r text-overflow'><i class='fa fa-plus-square-o c-success'></i>:".'第'.($now_run-1).'条['.date('H:i:s').']导入:'."<span class='pos-a right t-10'>成功</span></p>\");".
                //     '$'."('.progress_bar .number-pb').NumberProgressBar().reach($percent);" .
                //     "location.href = '#anchor';" .
                //     "</script>";
                //   }

            }

            if(!empty($arr)){
              $download_error = $this-> product_online_execl(serialize($arr));
              echo "<script language='javascript'>" .
                '$("#box").append("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .

                  '$("#game_over").append("'."<p>导入".($ret)."条，成功{$right_num}条，失败{$error_num}条。<a class='c-orange' href='".$download_error."'>>下载错误列表</a></p>\");".
                "</script>";
            }else{
              echo "<script language='javascript'>" .
                '$("#box").append("'."<i class='fa fa-power-off c-primary'></i>:".'['.date('H:i:s')."]，处理结束。\");".
                "location.href = '#anchor';" .
                '$(".btnr").click();' .

                  '$("#game_over").append("'."<p>导入".($ret)."条，成功{$right_num}条，失败{$error_num}条。</p>\");".
                "</script>";
            }
        exit;
         
    }

    /*
     * 京东淘宝库存更新
     * 
     */

     public function taobao_and_jd_stock($info,$res){

      if((!is_array($info) && empty($info)) && (!is_array($res) && empty($res))){
          return  array('state' => false, 'msg' => '参数错误！');
      }

      if ($info['ecs_code'] == 1) {
            $this->load->library('jd_op');
            $this->jd_op->foo($info['AppKey'], $info['AppSecret'], $info['bind_token_session']);
    
        } elseif ($info['ecs_code'] == 2) {
            $this->load->library('taobao_op');
            $this->taobao_op->init($info['AppKey'], $info['AppSecret'], $info['bind_token_session']);
            $uec_goods_iiud = $res['uec_goods_iiud'];
            $stocks = $res['amount'];
            $sku = $res['uec_sku_iiud'];
            $data = $this->taobao_op->stock_sync($uec_goods_iiud, $stocks, $sku);

        }

      return $data;
     }

     /*
     * 总库上传同步商品生成excel表格
     * 
     */
     public function  product_online_execl($res){ 
      $res = isset($res) ? unserialize($res) : false;
       
       if(empty($res))   return false;
        $store_id = $_SESSION['shop_spg_store_id'];
        $time = time();
        $date = date ( 'YmdHis',$time );
        $filenames = $date.'_goods_online_err.csv';
        $file = ROOTPATH.'data/excel_download/'.$filenames;
        $title = array(chr(0xef).chr(0xbb).chr(0xbf).'商品名称','款号','货号','尺码','库存','原因');
        file_put_contents ($file,implode(',', $title).PHP_EOL,FILE_APPEND);

        $content = [];
        foreach ($res as $k => $v) {
          $content = array(
                    $v['goods_name'],
                    $v['goods_spu'],
                    $v['stocks_sn'],
                    $v['size'],
                    $v['amount'],
                    $v['cause'],
                );
          file_put_contents ($file,implode(',',$content).PHP_EOL,FILE_APPEND);
          
        }
        $download = 'http://' . $_SERVER ['HTTP_HOST'].str_replace ( $_SERVER ['DOCUMENT_ROOT'], '', str_replace('','',str_replace ( '\\', '/', ROOTPATH ))).'data/excel_download/'.$filenames;
        // header("location:".$download);
        return $download;
     }

   
}
