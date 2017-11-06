<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
    }
	/*限时折扣*/
	public function sales_discount(){
        $this->common_function->shop_admin_priv("after_sale_type");//权限
	    if(!isset($_GET['op'])){
	        $this->smarty->display ( 'sales_discount.html' );
	    }elseif (isset($_GET['op'])&&$_GET['op']=='del'){
	        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
	        $id = isset($_POST['id']) ? trim($_POST['id']) : '';
	        //print_r($id);exit;
	        if(!empty($id)){
	          $re = $this->db->where('xianshi_id',$id)->delete('shop_p_xianshi');
	          if($re){
	              $re = $this->db->where('xianshi_id',$id)->delete('shop_p_xianshi_goods');
	              $this->common_function->shop_admin_log($name,'del', '限时折扣活动');
	              echo json_encode(array('state'=>true,'msg'=>'删除成功'));exit;
	          }
	        }
	        echo json_encode(array('state'=>false,'msg'=>'删除失败'));exit;
	    }
		
	}
	/*限时折扣——新增活动*/
	public function sales_discount_add(){
        $this->common_function->shop_admin_priv("after_sale_type");//权限
	    if(!isset($_GET['op'])){
	        $id = isset($_GET['id']) ? trim($_GET['id']) : '';
	        if($id!=''){
	            $id = object_array(json_decode($id));
	            if(!empty($id['start_time'])){
	                $id['stime'] = date('Y-m-d h:i:s',$id['start_time']);
	            }else{
	                $id['stime'] = '';
	            }
	            if(!empty($id['end_time'])){
	                $id['etime'] = date('Y-m-d h:i:s',$id['end_time']);
	            }else{
	                $id['etime'] = '';
	            }
	        }
	        $this->smarty->assign('data',$id);
	        $this->smarty->display ( 'sales_discount_add.html' );
	    }elseif (isset($_GET['op'])&&$_GET['op']=='submit'){
	        //print_r($_POST);exit;
	        $submit_id = isset($_POST['submit_type']) ? trim($_POST['submit_type']) : '';
	        $name = isset($_POST['xianshi_name']) ? trim($_POST['xianshi_name']) : '';
	        $title = isset($_POST['xianshi_title']) ? trim($_POST['xianshi_title']) : '';
	        $explain = isset($_POST['xianshi_explain']) ? trim($_POST['xianshi_explain']) : '';
	        $stime = isset($_POST['start_time']) ? trim($_POST['start_time']) : '';
	        $etime = isset($_POST['end_time']) ? trim($_POST['end_time']) : '';
	        $lower = isset($_POST['lower_limit']) ? trim($_POST['lower_limit']) : 1;
	        $stime = strtotime($stime);
	        $etime = strtotime($etime);
	        $lower = ($lower>=1) ? $lower : 1;
	        $links [0] ['text'] = '活动列表';
	        $links [0] ['href'] = 'sales_discount';
	        $links [1] ['text'] = '返回上一页';
	        $links [1] ['href'] = 'javascript:history.go(-1)';
	        if($name==''||empty($stime)||empty($etime)){
	            $this->common_function->show_message('活动名称，开始时间，结束时间不能为空');
	        }
	        $arr = array('xianshi_name'=>$name,'xianshi_title'=>$title,'xianshi_explain'=>$explain,'start_time'=>$stime,'end_time'=>$etime,'lower_limit'=>$lower,'state'=>1);
	        if(!empty($submit_id)){
	            $re = $this->db->where('xianshi_id',$submit_id)->update('shop_p_xianshi',$arr);
	            if($re){
	                $this->common_function->shop_admin_log($name,'edit', '限时折扣活动');
	                $this->common_function->show_message('修改成功',1,$links);
	            }else{
	                $this->common_function->show_message('修改失败');
	            }
	        }else{
	            $re = $this->db->insert('shop_p_xianshi',$arr);
	            if($re){
	                $this->common_function->shop_admin_log($name,'add', '限时折扣活动');
	                $this->common_function->show_message('添加成功',1,$links);
	            }else{
	                $this->common_function->show_message('添加失败');
	            }
	        } 
	       
	    }elseif (isset($_GET['op'])&&$_GET['op']=='check_name'){
	        //print_r($_POST);exit;
	        $name = isset($_GET['xianshi_name']) ? trim($_GET['xianshi_name']) : '';
	        $id = isset($_GET['xianshi_id']) ? trim($_GET['xianshi_id']) : '';
	        if($name){
	            if(empty($id)){
	                $this->db->select('xianshi_name');
	                $this->db->from('shop_p_xianshi');
	                $this->db->where('xianshi_name',$name);
	                $re = $this->db->get()->row('xianshi_name');
	                if($re){
	                    echo 'false';
	                }else{
	                    echo 'true';
	                }
	            }else{
	                $this->db->select('xianshi_id');
	                $this->db->from('shop_p_xianshi');
	                $this->db->where('xianshi_name',$name);
	                $re = $this->db->get()->row('xianshi_id');
	                if($re&&($re!=$id)){
	                    echo 'false';
	                }else{
	                    echo 'true';
	                }
	            }
	            
	        }
	       
	    }elseif (isset($_GET['op'])&&$_GET['op']=='table'){
	        $page=isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	        $rp=isset($_POST['rp']) ? $_POST['rp'] : 40;
	        $query = isset($_POST['query']) ? $_POST['query'] : false;
	        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
	        $rows = $this->db->select("*,(case when state=1 then '正常' when state!=1 then '取消' end)is_state")->get('shop_p_xianshi')->result_array();
	        if($qtype && $query){
	            $query=trim($query);
	            foreach($rows as $key=>$row){
	                if(strpos($row[$qtype],$query) === false){
	                    unset($rows[$key]);
	                }
	            }
	        }
	        $total = count($rows);
	        $rows = array_slice($rows,($page-1)*$rp,$rp);
	        header("Content-type: text/xml");
	        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	        $xml .= "<rows>";
	        $xml .= "<page>$page</page>";
	        $xml .= "<total>$total</total>";
	        foreach ($rows as $row){
	            $xml .= "<row id='".$row['xianshi_id']."'>";
	            $xml .= "<cell><![CDATA[<a class='btn red' href='javascript:void(0);' onclick='fg_delete(".$row['xianshi_id'].',"'.$row['xianshi_name'].'"'.")'><i class='fa fa-trash'></i>删除</a>
                <span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
			    <ul>
			    <li><a href='javascript:void(0);' onclick='edit_discount(".json_encode($row).")'>编辑活动</a></li>
			    <li><a href='javascript:void(0);' onclick='fg_spgl(".json_encode($row).")'>商品管理</a></li>";
	            $xml .= "</ul></span>]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['xianshi_name']."]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['xianshi_title']."]]></cell>";
	            $stime = empty($row['start_time']) ? '' : date("Y-m-d h:i:s",$row['start_time']);
	            $etime = empty($row['end_time']) ? '' : date("Y-m-d h:i:s",$row['end_time']);
	            $xml .= "<cell><![CDATA[".$stime."]]></cell>";
	            $xml .= "<cell><![CDATA[".$etime."]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['lower_limit']."]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['is_state']."]]></cell>";
	            $xml .= "</row>";
	        }
	        $xml .= "</rows>";
	        echo $xml;
	    }
		
	}
	/*限时折扣——商品管理*/
	public function sales_discount_goods(){
        $this->common_function->shop_admin_priv("after_sale_type");//权限
	    if(!isset($_GET['op'])){
	        $id = isset($_GET['id']) ? trim($_GET['id']) : '';
	        if(!empty($id)){
                $id = object_array(json_decode($id));
                if(!empty($id['start_time'])){
                    $id['stime'] = date('Y-m-d h:i:s',$id['start_time']);
                }else{
                    $id['stime'] = '';
                }
                if(!empty($id['end_time'])){
                    $id['etime'] = date('Y-m-d h:i:s',$id['end_time']);
                }else{
                    $id['etime'] = '';
                }
	            $this->smarty->assign('data',$id);
	            $this->smarty->display ( 'sales_discount_goods.html' );
	        }
	    }elseif(isset($_GET['op'])&&$_GET['op']=='search_goods_name'){
	        //print_r($_POST);exit;
	        $search_goods_name = isset($_POST['search_goods_name']) ? trim($_POST['search_goods_name']) : '';
	        $page = isset($_POST['page']) ? trim($_POST['page']) : 1;
	        $total_page = isset($_POST['total_page']) ? trim($_POST['total_page']) : '';
	        $rp = 10;
	        $start = $rp*($page-1);
	        $where = " goods_promotion_type='0' " ;
	        if($search_goods_name!=''){
	            $where .= " and goods_name LIKE '%$search_goods_name%' ";
	        }
	        $total = $this->db->select('count(1) as num')->where($where)->get('shop_goods')->row('num');
	        //print_r($total);exit;
	        $goods_data = $this->db->select('g.goods_image,g.goods_price,g.goods_id,g.goods_name')
	        ->from('shop_goods as g')
	        ->where($where." order by g.goods_name LIMIT $start,$rp")->get()->result_array();
	        $total_page = ceil($total/$rp);
	        $result = array('state'=>false,'msg'=>'搜索出错');
	        foreach ($goods_data as $k=>$v){
	            if(empty($v['goods_image'])){
	                $goods_data[$k]['thumb'] = '1_04624730196927699_240.png.jpg';
	            }else{
	                $goods_data[$k]['thumb'] = $v['goods_image'];
	            }
	            $goods_data[$k]['stock_amount']=0;
	            /* if($v['stocks_code']&&$v['size']){
	                $goods_data[$k]['stock_amount']=0;
	                //$goods_data[$k]['stock_amount'] = $this->db->select('')
	            } */
	        }
	        if($total>0){
	            $result = array('state'=>true,'data'=>$goods_data,'page'=>$page,'total_page'=>$total_page,'rp'=>$rp);
	        }else{
	            $result = array('state'=>false,'data'=>'','page'=>$page,'total_page'=>$total_page,'rp'=>$rp);
	        }
	        echo json_encode($result);exit;
	    }elseif(isset($_GET['op'])&&$_GET['op']=='add_goods'){
	        $goods_id = isset($_POST['select_goods_id']) ? trim($_POST['select_goods_id']) : false;
	        $goods_name = isset($_POST['select_goods_name']) ? trim($_POST['select_goods_name']) : '';
	        $goods_src = isset($_POST['select_goods_src']) ? trim($_POST['select_goods_src']) : '';
	        $goods_price = isset($_POST['select_goods_price']) ? trim($_POST['select_goods_price']) : '';
	        $price = isset($_POST['dialog_pintuan_price']) ? trim($_POST['dialog_pintuan_price']) : '';
	        $xianshi_id = isset($_POST['xianshi_id']) ? trim($_POST['xianshi_id']) : false;
	        $lower_limit = isset($_POST['lower_limit']) ? trim($_POST['lower_limit']) : 1;
	        $result=array('state'=>false,'msg'=>'');
	        if(empty($goods_id)||empty($xianshi_id)||$price==''){
	            $result['msg'] = '操作错误';
	            echo json_encode($result);exit;
	        }
	        $num = $this->db->select('count(1) as num')->where('goods_id',$goods_id)->where('goods_promotion_type',0)->get('shop_goods')->row('num');
	        if($num==0){
	            $result['msg'] = '此商品已参加了其他促销活动';
	            echo json_encode($result);exit;
	        }
	        $arr = array('xianshi_id'=>$xianshi_id,'goods_id'=>$goods_id,'goods_name'=>$goods_name,'goods_price'=>$goods_price,
	            'xianshi_price'=>$price,'goods_image'=>$goods_src,'lower_limit'=>$lower_limit
	        );
	        $re = $this->db->insert('shop_p_xianshi_goods',$arr);
	        if($re){
	            $this->db->where('goods_id',$goods_id)->update('shop_goods',array('goods_promotion_type'=>2));
	            $this->common_function->shop_admin_log($goods_name,'add', '限时折扣活动商品');
	            $result=array('state'=>true,'msg'=>'商品已添加完成');
	            echo json_encode($result);exit;
	        }else{
	            $result=array('state'=>false,'msg'=>'商品添加失败,请稍后重试');
	            echo json_encode($result);exit;
	        }
	        //print_r($_POST);exit;
	    }elseif(isset($_GET['op'])&&$_GET['op']=='table'){
	        $page=isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	        $rp=isset($_POST['rp']) ? $_POST['rp'] : 40;
	        $id=isset($_GET['id']) ? $_GET['id'] : false;
	        if(empty($id)){
	            $rows = array();
	        }else{
	            $rows = $this->db->select("*")->where('xianshi_id',$id)->get('shop_p_xianshi_goods')->result_array();
	        }
	        $total = count($rows);
	        $rows = array_slice($rows,($page-1)*$rp,$rp);
	        header("Content-type: text/xml");
	        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	        $xml .= "<rows>";
	        $xml .= "<page>$page</page>";
	        $xml .= "<total>$total</total>";
	        foreach ($rows as $row){
	            $xml .= "<row id='".$row['xianshi_goods_id']."'>";
	            $xml .= "<cell><![CDATA[<a class='btn red' href='javascript:void(0);' onclick='fg_delete(".$row['xianshi_goods_id'].','.$row['goods_id'].',"'.$row['goods_name'].'"'.")'><i class='fa fa-trash'></i>删除</a>
                <a class='btn' href='javascript:void(0);' onclick='fg_edit(".json_encode($row).")'><i class='fa fa-cog'></i>编辑</a>]]></cell>";
	            $row['data-geo'] =PLUGIN."data/shop/album_pic/".$row['goods_image'];
	            $xml .= "<cell><![CDATA[<div  class='goods-thumb'><a><img src='"
	                .PLUGIN."data/shop/album_pic/".$row['goods_image'].
	                "' data-geo='<img src=".$row['data-geo']." width=300px>
	            '></a></div>]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['goods_name']."]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['goods_price']."]]></cell>";
	            if($row['goods_price'] >0 ){
	                $row['discount'] =round($row['xianshi_price']/$row['goods_price'],2)*100;
	            }else{
	                $row['discount'] = 100;
	            }
	            $xml .= "<cell><![CDATA[".$row['xianshi_price']."]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['discount']."%]]></cell>";
	            $xml .= "</row>";
	        }
	        $xml .= "</rows>";
	        echo $xml;
	    }elseif(isset($_GET['op'])&&$_GET['op']=='del'){
	        $id = isset($_POST['id']) ? trim($_POST['id']) : false;
	        $goods_id = isset($_POST['goods_id']) ? trim($_POST['goods_id']) : false;
	        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
	        if($id&&$goods_id){
	            $this->db->where('xianshi_goods_id',$id)->delete('shop_p_xianshi_goods');
	            $this->db->where('goods_id',$goods_id)->update('shop_goods',array('goods_promotion_type'=>0));
	            $this->common_function->shop_admin_log($name,'del', '限时折扣活动商品');
	            $result=array('state'=>true,'msg'=>'商品已删除');
	            echo json_encode($result);exit;
	        }else{
	            $result=array('state'=>false,'msg'=>'删除错误');
	            echo json_encode($result);exit;
	        }
	        //print_r($_POST);exit;
	    }elseif(isset($_GET['op'])&&$_GET['op']=='edit'){
	        $id = isset($_POST['id']) ? trim($_POST['id']) : false;
	        $price = isset($_POST['price']) ? trim($_POST['price']) : '';
	        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
	        if($id&&$price!=''){
	            $this->db->where('xianshi_goods_id',$id)->update('shop_p_xianshi_goods',array('xianshi_price'=>$price));
	            $this->common_function->shop_admin_log($name,'edit', '限时折扣商品价格');
	            $result=array('state'=>true,'msg'=>'修改完成');
	            echo json_encode($result);exit;
	        }else{
	            $result=array('state'=>false,'msg'=>'操作错误');
	            echo json_encode($result);exit;
	        }
	        //print_r($_POST);exit;
	    }
		
	}
	/*团购管理*/
	public function sales_group(){
        $this->common_function->shop_admin_priv("aftersale_reason");//权限
	    if(!isset($_GET['op'])){
	        $this->smarty->display ( 'sales_group.html' );
	    }elseif (isset($_GET['op'])&&$_GET['op']=='table'){
	        $page=isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	        $rp=isset($_POST['rp']) ? $_POST['rp'] : 40;
	        $query = isset($_POST['query']) ? $_POST['query'] : false;
	        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
	        $rows = $this->db->select("*")->get('shop_p_groupbuy')->result_array();
	        if($qtype && $query){
	            $query=trim($query);
	            foreach($rows as $key=>$row){
	                if(strpos($row[$qtype],$query) === false){
	                    unset($rows[$key]);
	                }
	            }
	        }
	        $total = count($rows);
	        $rows = array_slice($rows,($page-1)*$rp,$rp);
	        header("Content-type: text/xml");
	        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	        $xml .= "<rows>";
	        $xml .= "<page>$page</page>";
	        $xml .= "<total>$total</total>";
	        foreach ($rows as $row){
	            $xml .= "<row id='".$row['groupbuy_id']."'>";
	            $xml .= "<cell><![CDATA[<a class='btn red' href='javascript:void(0);' onclick='fg_delete(".$row['groupbuy_id'].','.$row['goods_id'].',"'.$row['groupbuy_name'].'"'.")'><i class='fa fa-trash'></i>删除</a>
                <a class='btn' href='javascript:void(0);' onclick='fg_edit(".json_encode($row).")'><i class='fa fa-cog'></i>编辑</a>]]></cell>";
                $xml .= "<cell><![CDATA[".$row['groupbuy_name']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['goods_name']."]]></cell>";
                $row['data-geo'] =PLUGIN."data/shop/groupbuy/".$row['groupbuy_image'];
                $xml .= "<cell><![CDATA[<div  class='goods-thumb'><a><img src='"
                    .PLUGIN."data/shop/groupbuy/".$row['groupbuy_image'].
                    "' data-geo='<img src=".$row['data-geo']." width=300px>
	            '></a></div>]]></cell>";
                $xml .= "<cell><![CDATA[".$row['goods_price']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['groupbuy_price']."]]></cell>";
                if($row['start_time']>0){
                    $start_time = date('Y-m-d h:i:s',$row['start_time']);
                }else{
                    $start_time = '';
                }
                if($row['end_time']>0){
                    $end_time = date('Y-m-d h:i:s',$row['end_time']);
                }else{
                    $end_time = '';
                }
                $xml .= "<cell><![CDATA[".$start_time."]]></cell>";
                $xml .= "<cell><![CDATA[".$end_time."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['buyer_count']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['buy_quantity']."]]></cell>";
                $xml .= "</row>";
	        }
	        $xml .= "</rows>";
	        echo $xml;
	    }elseif (isset($_GET['op'])&&$_GET['op']=='del'){
	        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
	        $id = isset($_POST['id']) ? trim($_POST['id']) : '';
	        $goods_id = isset($_POST['goods_id']) ? trim($_POST['goods_id']) : '';
	        //print_r($id);exit;
	        if(!empty($id)&&!empty($goods_id)){
	          $re = $this->db->where('groupbuy_id',$id)->delete('shop_p_groupbuy');
	          if($re){
	              $this->db->where('goods_id',$goods_id)->update('shop_goods',array('goods_promotion_type'=>0));
	              $this->common_function->shop_admin_log($name,'del', '团购活动');
	              echo json_encode(array('state'=>true,'msg'=>'删除成功'));exit;
	          }
	        }
	        echo json_encode(array('state'=>false,'msg'=>'删除失败'));exit;
	    }
		
	}
	/*团购管理——新增编辑*/
	public function sales_group_add(){
        $this->common_function->shop_admin_priv("aftersale_reason");//权限
	    if(!isset($_GET['op'])){
	        $id = isset($_GET['id']) ? trim($_GET['id']) : '';
	        if($id!=''){
	            $id = object_array(json_decode($id));
	            if(!empty($id['start_time'])){
	                $id['stime'] = date('Y-m-d h:i:s',$id['start_time']);
	            }else{
	                $id['stime'] = '';
	            }
	            if(!empty($id['end_time'])){
	                $id['etime'] = date('Y-m-d h:i:s',$id['end_time']);
	            }else{
	                $id['etime'] = '';
	            }
	            $id['content'] = unserialize($id['groupbuy_intro']);
	            $id['goods_img'] = $this->db->select('goods_image')->where('goods_id',$id['goods_id'])->get('shop_goods')->row('goods_image');
	            $id['goods_img'] = empty($id['goods_img']) ? '1_04624730196927699_240.png.jpg' : $id['goods_img'];
	        }
	        $this->smarty->assign('data',$id);
	        $this->smarty->display ( 'sales_group_add.html' );
	    }elseif (isset($_GET['op'])&&$_GET['op']=='search_goods_name'){
	        //print_r($_POST);exit;
	        $search_goods_name = isset($_POST['search_goods_name']) ? trim($_POST['search_goods_name']) : '';
	        $group_id = isset($_POST['group_id']) ? trim($_POST['group_id']) : '';
	        $page = isset($_POST['page']) ? trim($_POST['page']) : 1;
	        $rp = 10;
	        $start = $rp*($page-1);
	        if(!empty($group_id)){
	            $goods_id = $this->db->select('goods_id')->where('groupbuy_id',$group_id)->get('shop_p_groupbuy')->row('goods_id');
	            $where = " (goods_promotion_type='0' or goods_id=$goods_id) " ;
	        }else{
	            $where = " goods_promotion_type='0' " ;
	        }
	        if($search_goods_name!=''){
	            $where .= " and goods_name LIKE '%$search_goods_name%' ";
	        }
	        $total = $this->db->select('count(1) as num')->where($where)->get('shop_goods')->row('num');
	        $goods_data = $this->db->select('goods_image,goods_price,goods_id,goods_name')->where($where." order by goods_name LIMIT $start,$rp")->get('shop_goods')->result_array();
	        $total_page = ceil($total/$rp);
	        $result = array('state'=>false,'msg'=>'搜索出错');
	        foreach ($goods_data as $k=>$v){
	            if(empty($v['goods_image'])){
	                $goods_data[$k]['thumb'] = '1_04624730196927699_240.png.jpg';
	            }else{
	                $goods_data[$k]['thumb'] = $v['goods_image'];
	            }
	        }
	        if($total>0){
	            $result = array('state'=>true,'data'=>$goods_data,'page'=>$page,'total_page'=>$total_page,'rp'=>$rp);
	        }else{
	            $result = array('state'=>false,'data'=>'','page'=>$page,'total_page'=>$total_page,'rp'=>$rp);
	        }
	        echo json_encode($result);exit;
	        //print_r($result);exit;
	    }elseif (isset($_GET['op'])&&$_GET['op']=='check_goods'){
	        $id = isset($_POST['id']) ? trim($_POST['id']) : '';
	        $goods_id = isset($_POST['goods_id']) ? trim($_POST['goods_id']) : false;
	       
	        if($goods_id){
	            $goods_promotion_type = $this->db->select('goods_promotion_type')->where('goods_id',$goods_id)->get('shop_goods')->row('goods_promotion_type');
	            //print_r($goods_promotion_type);exit;
	            if($goods_promotion_type!=0){
	                if($id!=''){
	                   $groupbuy_goods_id = $this->db->select('goods_id')->where('groupbuy_id',$id)->get('shop_p_groupbuy')->row('goods_id');
	                   if($groupbuy_goods_id!=$goods_id){
	                       $result = array('state'=>false,'msg'=>'该商品已参加其他促销活动');
	                       echo json_encode($result);exit;
	                   }
	                }else{
	                    $result = array('state'=>false,'msg'=>'该商品已参加其他促销活动');
	                    echo json_encode($result);exit;
	                }
	            }
	            $result = array('state'=>true,'msg'=>'');
	            echo json_encode($result);exit;
	        }else{
	            $result = array('state'=>false,'msg'=>'操作错误');
	            echo json_encode($result);exit;
	        }
	        
	    }
		
	}
	/*团购管理——新增编辑提交*/
	public function sales_group_edit_submit(){
        $this->common_function->shop_admin_priv("aftersale_reason");//权限
	    //print_r($_POST); print_r($_FILES);exit;
	    $id = isset($_POST['now_groupbuy_id']) ? trim($_POST['now_groupbuy_id']) : '';
	    $groupbuy_name = isset($_POST['groupbuy_name']) ? trim($_POST['groupbuy_name']) : false;
	    $start_time = isset($_POST['start_time']) ? trim($_POST['start_time']) : '';
	    $end_time = isset($_POST['end_time']) ? trim($_POST['end_time']) : '';
	    $goods_id = isset($_POST['groupbuy_goods_id']) ? trim($_POST['groupbuy_goods_id']) : false;
	    $groupbuy_price = isset($_POST['groupbuy_price']) ? trim($_POST['groupbuy_price']) : '';
	    $class_id = isset($_POST['class_id']) ? trim($_POST['class_id']) : '';
	    $virtual_quantity = isset($_POST['virtual_quantity']) ? trim($_POST['virtual_quantity']) : '';
	    $upper_limit = isset($_POST['upper_limit']) ? trim($_POST['upper_limit']) : '';
	    $groupbuy_intro = isset($_POST['content']) ? trim($_POST['content']) : '';
	    $class_id = isset($_POST['class_id']) ? trim($_POST['class_id']) : '';
	    $groupbuy_image_file = isset($_FILES['groupbuy_image_file']) ? $_FILES['groupbuy_image_file'] : false;
	    $groupbuy_image1 = isset($_FILES['groupbuy_image_']) ? $_FILES['groupbuy_image_'] : '';
	    $links [0] ['text'] = '活动列表';
	    $links [0] ['href'] = 'sales_group';
	    $links [1] ['text'] = '返回上一页';
	    $links [1] ['href'] = 'javascript:history.go(-1)';
	    $start_time = strtotime($start_time);
	    $end_time = strtotime($end_time);
	    if($id==''&&empty($groupbuy_image_file['name'])){
	        $this->common_function->show_message('团购活动图片不能为空');
	    }
	    if($groupbuy_name&&!empty($goods_id)){
	        $this->load->library ('FileUpload' );
	        $file = new FileUpload();
	        $file->set('israndname', true);
	        if(!empty($groupbuy_image_file['name'])){
	            $dir = './data/shop/groupbuy';
	            $file->set('path', $dir);
	            $file->upload('groupbuy_image_file');
	            $error = $file->getErrorMsg();
	            if($error != 0){
	                $this->common_function->show_message('团购活动图片上传失败');
	            }
	            $groupbuy_image = $file->getFileName();
	        }else{
	            $groupbuy_image = '';
	        }
	        
	        if(!empty($groupbuy_image1['name'])){
	            $dir_commend = './data/shop/groupbuy_commend';
	            $file->set('path', $dir_commend);
	            $file->upload('groupbuy_image_');
	            $error = $file->getErrorMsg();
	            if($error != 0){
	                $this->common_function->show_message('团购推荐位图片上传失败');
	            }
	            $groupbuy_image_ = $file->getFileName();
	        }else{
	            $groupbuy_image_ = '';
	        }
	        //print_r($groupbuy_image);exit;
	        $goods_data = $this->db->select('goods_name,goods_price')
	        ->where('goods_id',$goods_id)->get('shop_goods')->row_array();
	        //print_r($goods_id);exit;
	        $goods_name = $goods_data['goods_name'];
	        $goods_price = $goods_data['goods_price'];
	        if($goods_price!=0){
	            $groupbuy_rebate = round($groupbuy_price/$goods_price,2);
	        }else{
	            $groupbuy_rebate = 0;
	        }
	        $arr = array('groupbuy_name'=>$groupbuy_name,'start_time'=>$start_time,'end_time'=>$end_time,
	            'goods_id'=>$goods_id,'goods_name'=>$goods_name,'goods_price'=>$goods_price,
	            'groupbuy_price'=>$groupbuy_price,'groupbuy_rebate'=>$groupbuy_rebate,'virtual_quantity'=>$virtual_quantity,'upper_limit'=>$upper_limit,
	            'groupbuy_intro'=>serialize($groupbuy_intro),'class_id'=>$class_id
	        );
	        if(!empty($groupbuy_image)){
	            $arr['groupbuy_image'] = $groupbuy_image;
	        }
	        
	        if(!empty($groupbuy_image_)){
	            $arr['groupbuy_image1'] = $groupbuy_image_;
	        }
	        if($id==''){
	            $re = $this->db->insert('shop_p_groupbuy',$arr);
	            if($re){
	                $this->db->where('goods_id',$goods_id)->update('shop_goods',array('goods_promotion_type'=>1));
	                $this->common_function->shop_admin_log($groupbuy_name,'add', '团购活动');
	                $this->common_function->show_message('添加成功',1,$links);
	            }else{
	                $this->common_function->show_message('添加失败');
	            }
	            
	        }else{
	            $re = $this->db->where('groupbuy_id',$id)->update('shop_p_groupbuy',$arr);
	            if($re){
	                $this->common_function->shop_admin_log($groupbuy_name,'edit', '团购活动');
	                $this->common_function->show_message('修改成功',1,$links);
	            }else{
	                $this->common_function->show_message('修改失败');
	            }
	            
	        }
	        
	    }else{
	        $this->common_function->show_message('操作错误,请稍后再试');
	    }
	    
		
	}
	/*团购管理——banner图*/
	public function sales_group_banner(){
        $this->common_function->shop_admin_priv("aftersale_reason");//权限
		$this->smarty->display ( 'sales_group_banner.html' );
	}
	/*满就送*/
	public function sales_full_send(){
        $this->common_function->shop_admin_priv("aftersale_reason");//权限
	    if(!isset($_GET['op'])){
	        $this->smarty->display ( 'sales_full_send.html' );
	    }elseif (isset($_GET['op'])&&$_GET['op']=='table'){
	        $page=isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	        $rp=isset($_POST['rp']) ? $_POST['rp'] : 40;
	        $query = isset($_POST['query']) ? $_POST['query'] : false;
	        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
	        $rows = $this->db->select("*,(case when state=1 then '正常' when state!=1 then '取消' end)is_state")->get('shop_p_mansong')->result_array();
	        if($qtype && $query){
	            $query=trim($query);
	            foreach($rows as $key=>$row){
	                if(strpos($row[$qtype],$query) === false){
	                    unset($rows[$key]);
	                }
	            }
	        }
	        $total = count($rows);
	        $rows = array_slice($rows,($page-1)*$rp,$rp);
	        header("Content-type: text/xml");
	        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	        $xml .= "<rows>";
	        $xml .= "<page>$page</page>";
	        $xml .= "<total>$total</total>";
	        foreach ($rows as $row){
	            $rule_data = $this->db->select('sr.*,g.goods_image')->from('shop_p_mansong_rule as sr')
	            ->join('shop_goods as g','g.goods_id=sr.goods_id','left')->where('mansong_id',$row['mansong_id'])->get()->result_array();
	            foreach ($rule_data as $k=>$v){
	                $rule_data[$k]['thumb'] = !empty($v['goods_image']) ? $v['goods_image'] : '1_04624730196927699_240.png.jpg';
	            }
	            $row['stime'] = empty($row['start_time']) ? '' : date('Y-m-d h:i:s',$row['start_time']);
	            $row['etime'] = empty($row['end_time']) ? '' : date('Y-m-d h:i:s',$row['end_time']);
	            $row['rule_data'] = $rule_data;
	            $xml .= "<row id='".$row['mansong_id']."'>";
	            $xml .= "<cell><![CDATA[<a class='btn red' href='javascript:void(0);' onclick='fg_delete(".$row['mansong_id'].',"'.$row['mansong_name'].'"'.")'><i class='fa fa-trash'></i>删除</a>
                <a class='btn' href='javascript:void(0);' onclick='fg_see(".json_encode($row).")'><i class='fa fa-eye'></i>活动详情</a>]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['mansong_name']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['stime']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['etime']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['is_state']."]]></cell>";
                $xml .= "</row>";
	        }
	        $xml .= "</rows>";
	        echo $xml;
	    }elseif (isset($_GET['op'])&&$_GET['op']=='del'){
	        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
	        $id = isset($_POST['id']) ? trim($_POST['id']) : '';
	        //print_r($id);exit;
	        if(!empty($id)){
	            $re = $this->db->where('mansong_id',$id)->delete('shop_p_mansong_rule');
	            if($re){
	                $this->db->where('mansong_id',$id)->delete('shop_p_mansong');
	                $this->common_function->shop_admin_log($name,'del', '满就送活动');
	                echo json_encode(array('state'=>true,'msg'=>'删除成功'));exit;
	            }
	        }
	        echo json_encode(array('state'=>false,'msg'=>'删除失败'));exit;
	    }
		
	}
	/*满就送——新增*/
	public function sales_full_send_add(){
        $this->common_function->shop_admin_priv("aftersale_reason");//权限
	    if(!isset($_GET['op'])){
	        $this->smarty->display ( 'sales_full_send_add.html' );
	    }elseif (isset($_GET['op'])&&$_GET['op']=='submit'){
	        //print_r($_POST);exit;
	        $id = isset($_POST['now_mansong_id']) ? trim($_POST['now_mansong_id']) : '';
	        $mansong_name = isset($_POST['mansong_name']) ? trim($_POST['mansong_name']) : false;
	        $start_time = isset($_POST['start_time']) ? trim($_POST['start_time']) : '';
	        $end_time = isset($_POST['end_time']) ? trim($_POST['end_time']) : '';
	        $mansong_rule = isset($_POST['mansong_rule']) ? $_POST['mansong_rule'] : false;
	        $remark = isset($_POST['remark']) ? trim($_POST['remark']) : '';
	        $links [0] ['text'] = '活动列表';
	        $links [0] ['href'] = 'sales_full_send';
	        $links [1] ['text'] = '返回上一页';
	        $links [1] ['href'] = 'javascript:history.go(-1)';
	        $start_time = strtotime($start_time);
	        $end_time = strtotime($end_time);
	        if($mansong_name&&!empty($mansong_rule)){
	            $mansong_rule_arr=array();
	            foreach ($mansong_rule as $k=>$v){
	                if(!empty($v)){
	                    $mansong_rule_arr[$k] = explode(',',$v);
	                }
	            }
	            if(empty($mansong_rule_arr)||empty($start_time)||empty($end_time)){
	                $this->common_function->show_message('满送规则,活动开始时间,结束时间不能为空');
	            }
	            //print_r($mansong_rule_arr);exit;
	            $arr = array('mansong_name'=>$mansong_name,'start_time'=>$start_time,'end_time'=>$end_time,
	                'remark'=>$remark,'state'=>1,
	            );
	            if($id==''){
	                $re = $this->db->insert('shop_p_mansong',$arr);
	                $mansong_id = $this->db->insert_id();
	                if($re&&$mansong_id){
	                    $rec = true;
	                    foreach ($mansong_rule_arr as $ka=>$va){
	                        if(!empty($va[1])||!empty($va[2])){
	                            $arr_rule = array('mansong_id'=>$mansong_id,'price'=>$va[0],'discount'=>$va[1],
	                                'mansong_goods_name'=>$va[4],'goods_id'=>$va[2],
	                            );
	                            $res = $this->db->insert('shop_p_mansong_rule',$arr_rule);
	                            if(!$res){
	                                $rec = false;
	                            }
	                        }
	                    }
	                    if($rec){
	                        $this->common_function->shop_admin_log($mansong_name,'add', '满就送活动');
	                        $this->common_function->show_message('添加成功',1,$links);
	                    }else{
	                        $this->common_function->show_message('添加失败');
	                    }
	                }else{
	                    $this->common_function->show_message('添加失败');
	                }
	        
	            }else{
	                $re = $this->db->where('mansong_id',$id)->update('shop_p_mansong',$arr);
	                if($re){
	                    $this->db->where('mansong_id',$id)->delete('shop_p_mansong_rule');
	                    $rec = true;
	                    foreach ($mansong_rule_arr as $ka=>$va){
	                        if(!empty($va[1])||!empty($va[2])){
	                            $arr_rule = array('mansong_id'=>$mansong_id,'price'=>$va[0],'discount'=>$va[1],
	                                'mansong_goods_name'=>$va[4],'goods_id'=>$va[2],
	                            );
	                            $res = $this->db->insert('shop_p_mansong_rule',$arr_rule);
	                            if(!$res){
	                                $rec = false;
	                            }
	                        }
	                    }
	                    if($rec){
	                        $this->common_function->shop_admin_log($mansong_name,'edit', '满就送活动');
	                        $this->common_function->show_message('修改成功',1,$links);
	                    }else{
	                        $this->common_function->show_message('修改失败');
	                    }
	                }else{
	                    $this->common_function->show_message('修改失败');
	                }
	        
	            }
	        
	        }else{
	            $this->common_function->show_message('操作错误,请稍后再试');
	        }
	    }elseif(isset($_GET['op'])&&$_GET['op']=='search_goods_name'){
	        $search_goods_name = isset($_POST['search_goods_name']) ? trim($_POST['search_goods_name']) : '';
	        $group_id = isset($_POST['group_id']) ? trim($_POST['group_id']) : '';
	        $page = isset($_POST['page']) ? trim($_POST['page']) : 1;
	        $rp = 10;
	        $start = $rp*($page-1);
	        if(!empty($group_id)){
	            $goods_arr_id = $this->db->select('goods_id')->where('mansong_id',$group_id)->get('shop_p_mansong_rule')->rresult_array();
	            $goods_id = array();
	           foreach ($goods_arr_id as $k=>$v){
	               if($v['goods_id']){
	                   $goods_id[] = $v['goods_id'];
	               }
	           }
	           $where = empty($goods_id) ? " goods_promotion_type='0' " : " (goods_promotion_type='0' or goods_id in ($goods_id)) " ;
	            
	        }else{
	            $where = " goods_promotion_type='0' " ;
	        }
	        if($search_goods_name!=''){
	            $where .= " and goods_name LIKE '%$search_goods_name%' ";
	        }
	        $total = $this->db->select('count(1) as num')->where($where)->get('shop_goods')->row('num');
	        $goods_data = $this->db->select('goods_image,goods_price,goods_id,goods_name')->where($where." order by goods_name LIMIT $start,$rp")->get('shop_goods')->result_array();
	        $total_page = ceil($total/$rp);
	        $result = array('state'=>false,'msg'=>'搜索出错');
	        foreach ($goods_data as $k=>$v){
	            if(empty($v['goods_image'])){
	                $goods_data[$k]['thumb'] = '1_04624730196927699_240.png.jpg';
	            }else{
	                $goods_data[$k]['thumb'] = $v['goods_image'];
	            }
	        }
	        if($total>0){
	            $result = array('state'=>true,'data'=>$goods_data,'page'=>$page,'total_page'=>$total_page,'rp'=>$rp);
	        }else{
	            $result = array('state'=>false,'data'=>'','page'=>$page,'total_page'=>$total_page,'rp'=>$rp);
	        }
	        echo json_encode($result);exit;
	    }elseif (isset($_GET['op'])&&$_GET['op']=='check_name'){
	        //print_r($_POST);exit;
	        $name = isset($_GET['xianshi_name']) ? trim($_GET['xianshi_name']) : '';
	        $id = isset($_GET['xianshi_id']) ? trim($_GET['xianshi_id']) : '';
	        if($name){
	            if(empty($id)){
	                $this->db->select('mansong_id');
	                $this->db->from('shop_p_mansong');
	                $this->db->where('mansong_name',$name);
	                $re = $this->db->get()->row('mansong_id');
	                if($re){
	                    echo 'false';
	                }else{
	                    echo 'true';
	                }
	            }else{
	                $this->db->select('mansong_id');
	                $this->db->from('shop_p_mansong');
	                $this->db->where('mansong_name',$name);
	                $re = $this->db->get()->row('mansong_id');
	                if($re&&($re!=$id)){
	                    echo 'false';
	                }else{
	                    echo 'true';
	                }
	            }
	            
	        }
	       
	    }
		
	}
	/*拼团*/
	public function sales_together(){
        $this->common_function->shop_admin_priv("aftersale_reason");//权限
	    if(!isset($_GET['op'])){
	        $this->smarty->display ( 'sales_together.html' );
	    }elseif (isset($_GET['op'])&&$_GET['op']=='del'){
	        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
	        $id = isset($_POST['id']) ? trim($_POST['id']) : '';
	        //print_r($id);exit;
	        if(!empty($id)){
	            $re = $this->db->where('fightgroup_id',$id)->delete('shop_p_fightgroups');
	            if($re){
	                $re = $this->db->where('fightgroups_id',$id)->delete('shop_p_fightgroups_goods');
	                $this->common_function->shop_admin_log($name,'del', '拼团活动');
	                echo json_encode(array('state'=>true,'msg'=>'删除成功'));exit;
	            }
	        }
	        echo json_encode(array('state'=>false,'msg'=>'删除失败'));exit;
	    }
		
	}
	/*拼团——新增*/
	public function sales_together_add(){
        $this->common_function->shop_admin_priv("aftersale_reason");//权限
	    if(!isset($_GET['op'])){
	        $id = isset($_GET['id']) ? trim($_GET['id']) : '';
	        if($id!=''){
	            $id = object_array(json_decode($id));
	            if(!empty($id['start_time'])){
	                $id['stime'] = date('Y-m-d h:i:s',$id['start_time']);
	            }else{
	                $id['stime'] = '';
	            }
	            if(!empty($id['end_time'])){
	                $id['etime'] = date('Y-m-d h:i:s',$id['end_time']);
	            }else{
	                $id['etime'] = '';
	            }
	        }
	        $this->smarty->assign('data',$id);
	        $this->smarty->display ( 'sales_together_add.html' );
	    }elseif (isset($_GET['op'])&&$_GET['op']=='submit'){
	        //print_r($_POST);exit;
	        $submit_id = isset($_POST['pintuan_id']) ? trim($_POST['pintuan_id']) : '';
	        $name = isset($_POST['pintuan_name']) ? trim($_POST['pintuan_name']) : '';
	        $stime = isset($_POST['start_time']) ? trim($_POST['start_time']) : '';
	        $etime = isset($_POST['end_time']) ? trim($_POST['end_time']) : '';
	        $min_num = isset($_POST['min_num']) ? trim($_POST['min_num']) : 3;
	        $stime = strtotime($stime);
	        $etime = strtotime($etime);
	        $lower = ($min_num>=2) ? $min_num : 3;
	        $links [0] ['text'] = '活动列表';
	        $links [0] ['href'] = 'sales_together';
	        $links [1] ['text'] = '返回上一页';
	        $links [1] ['href'] = 'javascript:history.go(-1)';
	        if($name==''||empty($stime)||empty($etime)){
	            $this->common_function->show_message('活动名称，开始时间，结束时间不能为空');
	        }
	        $arr = array('fightgroup_name'=>$name,'fight_limit'=>$lower,'status'=>1,'start_time'=>$stime,'end_time'=>$etime);
	        if(!empty($submit_id)){
	            $re = $this->db->where('fightgroup_id',$submit_id)->update('shop_p_fightgroups',$arr);
	            if($re){
	                $this->common_function->shop_admin_log($name,'edit', '拼团活动');
	                $this->common_function->show_message('修改成功',1,$links);
	            }else{
	                $this->common_function->show_message('修改失败');
	            }
	        }else{
	            $re = $this->db->insert('shop_p_fightgroups',$arr);
	            if($re){
	                $this->common_function->shop_admin_log($name,'add', '拼团活动');
	                $this->common_function->show_message('添加成功',1,$links);
	            }else{
	                $this->common_function->show_message('添加失败');
	            }
	        }
	    
	    }elseif (isset($_GET['op'])&&$_GET['op']=='check_name'){
	        //print_r($_POST);exit;
	        $name = isset($_GET['pintuan_name']) ? trim($_GET['pintuan_name']) : '';
	        $id = isset($_GET['pintuan_id']) ? trim($_GET['pintuan_id']) : '';
	        if($name){
	            if(empty($id)){
	                $this->db->select('fightgroup_id');
	                $this->db->from('shop_p_fightgroups');
	                $this->db->where('fightgroup_name',$name);
	                $re = $this->db->get()->row('fightgroup_id');
	                if($re){
	                    echo 'false';
	                }else{
	                    echo 'true';
	                }
	            }else{
	                $this->db->select('fightgroup_id');
	                $this->db->from('shop_p_fightgroups');
	                $this->db->where('fightgroup_name',$name);
	                $re = $this->db->get()->row('fightgroup_id');
	                if($re&&($re!=$id)){
	                    echo 'false';
	                }else{
	                    echo 'true';
	                }
	            }
	             
	        }
	    
	    }elseif (isset($_GET['op'])&&$_GET['op']=='table'){
	        $page=isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	        $rp=isset($_POST['rp']) ? $_POST['rp'] : 40;
	        $query = isset($_POST['query']) ? $_POST['query'] : false;
	        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
	        $rows = $this->db->select("*,(case when status=1 then '正常' when status!=1 then '取消' end)is_state")->get('shop_p_fightgroups')->result_array();
	        if($qtype && $query){
	            $query=trim($query);
	            foreach($rows as $key=>$row){
	                if(strpos($row[$qtype],$query) === false){
	                    unset($rows[$key]);
	                }
	            }
	        }
	        $total = count($rows);
	        $rows = array_slice($rows,($page-1)*$rp,$rp);
	        header("Content-type: text/xml");
	        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	        $xml .= "<rows>";
	        $xml .= "<page>$page</page>";
	        $xml .= "<total>$total</total>";
	        foreach ($rows as $row){
	            $xml .= "<row id='".$row['fightgroup_id']."'>";
	            $xml .= "<cell><![CDATA[<a class='btn red' href='javascript:void(0);' onclick='fg_delete(".$row['fightgroup_id'].',"'.$row['fightgroup_name'].'"'.")'><i class='fa fa-trash'></i>删除</a>
                <span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
			    <ul>
			    <li><a href='javascript:void(0);' onclick='edit_together(".json_encode($row).")'>编辑活动</a></li>
			    <li><a href='javascript:void(0);' onclick='fg_spgl(".json_encode($row).")'>商品管理</a></li>";
	            $xml .= "</ul></span>]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['fightgroup_name']."]]></cell>";
	            $stime = empty($row['start_time']) ? '' : date("Y-m-d h:i:s",$row['start_time']);
	            $etime = empty($row['end_time']) ? '' : date("Y-m-d h:i:s",$row['end_time']);
	            $xml .= "<cell><![CDATA[".$stime."]]></cell>";
	            $xml .= "<cell><![CDATA[".$etime."]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['fight_limit']."]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['number']."]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['is_state']."]]></cell>";
	            $xml .= "</row>";
	        }
	        $xml .= "</rows>";
	        echo $xml;
	    }
	   
	        
	    
		
	}
	/*平团——商品管理*/
	public function sales_together_goods(){
        $this->common_function->shop_admin_priv("aftersale_reason");//权限
	    if(!isset($_GET['op'])){
	        $id = isset($_GET['id']) ? trim($_GET['id']) : '';
	        if(!empty($id)){
	            $id = object_array(json_decode($id));
	            if(!empty($id['start_time'])){
	                $id['stime'] = date('Y-m-d h:i:s',$id['start_time']);
	            }else{
	                $id['stime'] = '';
	            }
	            if(!empty($id['end_time'])){
	                $id['etime'] = date('Y-m-d h:i:s',$id['end_time']);
	            }else{
	                $id['etime'] = '';
	            }
	            $this->smarty->assign('data',$id);
	            $this->smarty->display ( 'sales_together_goods.html' );
	        }
	    }elseif(isset($_GET['op'])&&$_GET['op']=='search_goods_name'){
	        //print_r($_POST);exit;
	        $search_goods_name = isset($_POST['search_goods_name']) ? trim($_POST['search_goods_name']) : '';
	        $page = isset($_POST['page']) ? trim($_POST['page']) : 1;
	        $total_page = isset($_POST['total_page']) ? trim($_POST['total_page']) : '';
	        $rp = 10;
	        $start = $rp*($page-1);
	        $where = " goods_promotion_type='0' " ;
	        if($search_goods_name!=''){
	            $where .= " and goods_name LIKE '%$search_goods_name%' ";
	        }
	        $total = $this->db->select('count(1) as num')->where($where)->get('shop_goods')->row('num');
	        $goods_data = $this->db->select('g.goods_image,g.goods_price,g.goods_id,g.goods_name')
	        ->from('shop_goods as g')
	        ->where($where." order by g.goods_name LIMIT $start,$rp")->get()->result_array();
	        $total_page = ceil($total/$rp);
	        $result = array('state'=>false,'msg'=>'搜索出错');
	        foreach ($goods_data as $k=>$v){
	            if(empty($v['goods_image'])){
	                $goods_data[$k]['thumb'] = '1_04624730196927699_240.png.jpg';
	            }else{
	                $goods_data[$k]['thumb'] = $v['goods_image'];
	            }
	            $goods_data[$k]['stock_amount']=0;
	           /*  if($v['stocks_code']&&$v['size']){
	                $goods_data[$k]['stock_amount']=0;
	                //$goods_data[$k]['stock_amount'] = $this->db->select('')
	            } */
	        }
	        if($total>0){
	            $result = array('state'=>true,'data'=>$goods_data,'page'=>$page,'total_page'=>$total_page,'rp'=>$rp);
	        }else{
	            $result = array('state'=>false,'data'=>'','page'=>$page,'total_page'=>$total_page,'rp'=>$rp);
	        }
	        echo json_encode($result);exit;
	    }elseif(isset($_GET['op'])&&$_GET['op']=='add_goods'){
	        $goods_id = isset($_POST['select_goods_id']) ? trim($_POST['select_goods_id']) : false;
	        $goods_name = isset($_POST['select_goods_name']) ? trim($_POST['select_goods_name']) : '';
	        $goods_src = isset($_POST['select_goods_src']) ? trim($_POST['select_goods_src']) : '';
	        $goods_price = isset($_POST['select_goods_price']) ? trim($_POST['select_goods_price']) : '';
	        $price = isset($_POST['dialog_pintuan_price']) ? trim($_POST['dialog_pintuan_price']) : '';
	        $xianshi_id = isset($_POST['xianshi_id']) ? trim($_POST['xianshi_id']) : false;
	        $stime = isset($_POST['stime']) ? trim($_POST['stime']) : '';
	        $etime = isset($_POST['etime']) ? trim($_POST['etime']) : '';
	        $result=array('state'=>false,'msg'=>'');
	        //print_r($_POST);exit;
	        if(empty($goods_id)||empty($xianshi_id)||$price==''){
	            $result['msg'] = '操作错误';
	            echo json_encode($result);exit;
	        }
	        $num = $this->db->select('count(1) as num')->where('goods_id',$goods_id)->where('goods_promotion_type',0)->get('shop_goods')->row('num');
	        if($num==0){
	            $result['msg'] = '改商品已参加了其他促销活动';
	            echo json_encode($result);exit;
	        }
	        $arr = array('fightgroups_id'=>$xianshi_id,'goods_id'=>$goods_id,'goods_name'=>$goods_name,'tag_price'=>$goods_price,
	            'fightgroups_price'=>$price,'goods_image'=>$goods_src,'start_time'=>$stime,'end_time'=>$etime
	        );
	        $re = $this->db->insert('shop_p_fightgroups_goods',$arr);
	        if($re){
	            $this->db->where('goods_id',$goods_id)->update('shop_goods',array('goods_promotion_type'=>3));
	            $this->common_function->shop_admin_log($goods_name,'add', '拼团活动商品');
	            $result=array('state'=>true,'msg'=>'商品已添加完成');
	            echo json_encode($result);exit;
	        }else{
	            $result=array('state'=>false,'msg'=>'商品添加失败,请稍后重试');
	            echo json_encode($result);exit;
	        }
	        //print_r($_POST);exit;
	    }elseif(isset($_GET['op'])&&$_GET['op']=='table'){
	        $page=isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	        $rp=isset($_POST['rp']) ? $_POST['rp'] : 40;
	        $id=isset($_GET['id']) ? $_GET['id'] : false;
	        if(empty($id)){
	            $rows = array();
	        }else{
	            $rows = $this->db->select("*")->where('fightgroups_id',$id)->get('shop_p_fightgroups_goods')->result_array();
	        }
	        $total = count($rows);
	        $rows = array_slice($rows,($page-1)*$rp,$rp);
	        header("Content-type: text/xml");
	        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	        $xml .= "<rows>";
	        $xml .= "<page>$page</page>";
	        $xml .= "<total>$total</total>";
	        foreach ($rows as $row){
	            $xml .= "<row id='".$row['fightgroups_goods_id']."'>";
	            $xml .= "<cell><![CDATA[<a class='btn red' href='javascript:void(0);' onclick='fg_delete(".$row['fightgroups_goods_id'].','.$row['goods_id'].',"'.$row['goods_name'].'"'.")'><i class='fa fa-trash'></i>删除</a>
                <a class='btn' href='javascript:void(0);' onclick='fg_edit(".json_encode($row).")'><i class='fa fa-cog'></i>编辑</a>]]></cell>";
	            $row['data-geo'] =PLUGIN."data/shop/album_pic/".$row['goods_image'];
	            $xml .= "<cell><![CDATA[<div  class='goods-thumb'><a><img src='"
	                .PLUGIN."data/shop/album_pic/".$row['goods_image'].
	                "' data-geo='<img src=".$row['data-geo']." width=300px>
	            '></a></div>]]></cell>";
	                $xml .= "<cell><![CDATA[".$row['goods_name']."]]></cell>";
	                $xml .= "<cell><![CDATA[".$row['tag_price']."]]></cell>";
	                $xml .= "<cell><![CDATA[".$row['fightgroups_price']."]]></cell>";
	                $xml .= "</row>";
	        }
	        $xml .= "</rows>";
	        echo $xml;
	    }elseif(isset($_GET['op'])&&$_GET['op']=='del'){
	        $id = isset($_POST['id']) ? trim($_POST['id']) : false;
	        $goods_id = isset($_POST['goods_id']) ? trim($_POST['goods_id']) : false;
	        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
	        if($id&&$goods_id){
	            $this->db->where('fightgroups_goods_id',$id)->delete('shop_p_fightgroups_goods');
	            $this->db->where('goods_id',$goods_id)->update('shop_goods',array('goods_promotion_type'=>0));
	            $this->common_function->shop_admin_log($name,'del', '拼团活动商品');
	            $result=array('state'=>true,'msg'=>'商品已删除');
	            echo json_encode($result);exit;
	        }else{
	            $result=array('state'=>false,'msg'=>'删除错误');
	            echo json_encode($result);exit;
	        }
	        //print_r($_POST);exit;
	    }elseif(isset($_GET['op'])&&$_GET['op']=='edit'){
	        $id = isset($_POST['id']) ? trim($_POST['id']) : false;
	        $price = isset($_POST['price']) ? trim($_POST['price']) : '';
	        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
	        if($id&&$price!=''){
	            $this->db->where('fightgroups_goods_id',$id)->update('shop_p_fightgroups_goods',array('fightgroups_price'=>$price));
	            $this->common_function->shop_admin_log($name,'edit', '拼团商品价格');
	            $result=array('state'=>true,'msg'=>'修改完成');
	            echo json_encode($result);exit;
	        }else{
	            $result=array('state'=>false,'msg'=>'操作错误');
	            echo json_encode($result);exit;
	        }
	        //print_r($_POST);exit;
	    }
	
	}
	/*平台红包*/
	public function sales_red_packets(){
        $this->common_function->shop_admin_priv("qiangHongBao");//权限
		$this->smarty->display ( 'sales_red_packets.html' );
	}
	/*平台红包——新增*/
	public function sales_red_packets_add(){
        $this->common_function->shop_admin_priv("qiangHongBao");//权限
		$this->smarty->display ( 'sales_red_packets_add.html' );
	}
	/*平台红包——编辑*/
	public function sales_red_packets_edit(){
        $this->common_function->shop_admin_priv("qiangHongBao");//权限
		$this->smarty->display ( 'sales_red_packets_edit.html' );
	}
	/*平台红包——查看详情*/
	public function sales_red_packets_details(){
        $this->common_function->shop_admin_priv("qiangHongBao");//权限
		$this->smarty->display ( 'sales_red_packets_details.html' );
	}
	/*手机专享*/
	public function sales_phone(){
        $this->common_function->shop_admin_priv("Sales");//权限
		$this->smarty->display ( 'sales_phone.html' );
	}
	/*手机专享——新增商品*/
	public function sales_phone_add(){
        $this->common_function->shop_admin_priv("Sales");//权限
		$this->smarty->display ( 'sales_phone_add.html' );
	}
	/*预售商品*/
	public function sales_presell(){
        $this->common_function->shop_admin_priv("Sales");//权限
		$this->smarty->display ( 'sales_presell.html' );
	}
	/*预售商品——新增预售*/
	public function sales_presell_add(){
        $this->common_function->shop_admin_priv("Sales");//权限
		$this->smarty->display ( 'sales_presell_add.html' );
	}
}
