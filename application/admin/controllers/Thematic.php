<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thematic extends CI_Controller {

	/**
	 * Index Page for this controller.
	 **/
    public function __construct() {
        parent::__construct();
        $this->load->model('Thematic_model');
    }
	
	/*专题活动*/
	public function thematic_management (){
	      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	      $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'special_id';
	      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
	      $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
	      $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
	      
	      if(isset($_GET['op'])&&$_GET['op'] == 'list_del'){
	          /* 删除一项或者多项 */
	          $del_id = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
	          $result = array('state'=>false, 'msg'=>"删除失败");
	          
	          //删除相关图片
	          if(strpos(",",$del_id)>=0){
	              $delid=explode(",",$del_id);
	              foreach ($delid as $key=>$val){
	                  $img = $this->db->select('special_background')->where('special_id',$val)->get('cms_special')->row('special_background');
	                  $imgs = $this->db->select('special_image')->where('special_id',$val)->get('cms_special')->row('special_image');
	                  $imgs_all = $this->db->select('special_image_all')->where('special_id',$val)->get('cms_special')->row('special_image_all');
	                  $imgs_all=unserialize($imgs_all);
	                  foreach ($imgs_all as $key=>$val){
	                      @unlink(ROOTPATH.'data/shop/thematic_image/'.$val);
	                  }
	                  @unlink(ROOTPATH.$img);
	                  @unlink(ROOTPATH.$imgs);
	              }
	          }else{
	              $img = $this->db->select('special_background')->where('special_id',$val)->get('cms_special')->row('special_background');
	              $imgs = $this->db->select('special_image')->where('special_id',$val)->get('cms_special')->row('special_image');
	              $imgs_all = $this->db->select('special_image_all')->where('special_id',$val)->get('cms_special')->row('special_image_all');
                  $imgs_all=unserialize($imgs_all);
                  foreach ($imgs_all as $key=>$val){
                      @unlink(ROOTPATH.'data/shop/thematic_image/'.$val);
                  }
	              @unlink(ROOTPATH.$img);
	              @unlink(ROOTPATH.$imgs);
	          }
	          
	          $this->db->where("special_id in ($del_id)");
	          $re = $this->db->delete('cms_special');  
	          if($re){
	              $result['state'] = true;
	              $result['msg'] 	= "删除成功";
	          }
	          echo  json_encode($result);
	          exit;
	      }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){
	          $this->db->select('*');
	          $this->db->from('cms_special');
	          $this->db->order_by($sortname,$sortorder);
	          $rows = $this->db->get()->result_array();
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
	          //print_r($rows);die;
	          header("Content-type: text/xml");
	          ob_clean();
	          $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	          $xml .= "<rows>";
	          $xml .= "<page>$page</page>";
	          $xml .= "<total>$total</total>";
	          foreach($rows AS $key => $row){
	                //专题状态
	                $baseurl=base_url();
		          	if($row['special_state']==1){
		          		$special_state='草稿';
		          	 }else{
		          	 	$special_state='已发布';
		          	 }
		          	//专题类型
	          		if($row['special_type']==1){
		          		$special_type="cms";
		          	 }else{
		          	     $special_type="商城";
		          	 }
		          	 if(!empty($row['special_image'])){
		          	     $url=base_url().$row['special_image'];
		          	     $row_special_image='
            		          	    <span class="show">
                                    <a class="pic-thumb-tip" rel="gal" href=""><i class="fa fa-picture-o"  id="" data-geo="<img src='.$url.' width=100px height=50px>"></i></a>
                                    </span>';
		          	 }else{
		          	     $url=TEMPLE."images/default_user_portrait.gif";
		          	     $row_special_image='
            		          	    <span class="show">
                                    <a class="pic-thumb-tip" rel="gal" href=""><i class="fa fa-picture-o"  id="" data-geo="<img src='.$url.' width=100px height=50px>"></i></a>
                                    </span>';
		          	 }
		              $xml .= "<row id='" . $row['special_id'] . "'>";
		              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['special_id'] . ")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                                 <ul>
                                    <li><a href='". $baseurl."index.php/thematic/thematic_details?special_id=". $row['special_id'] ."'>查看专题页面</a></li>
            	                    <li><a onclick=edit(". $row['special_id'] .")>编辑专题内容</a></li>";
		              $xml .= "</ul></span>]]></cell>";
		              $xml .= "<cell><![CDATA[".$row['special_title']."]]></cell>";
		              $xml .= "<cell><![CDATA[".$special_type."]]></cell>";
		              $xml .= "<cell><![CDATA[".$row_special_image."]]></cell>";
		              $xml .= "<cell><![CDATA[".$special_state."]]></cell>";
		              $xml .= "</row>";
	          }
	          $xml .= "</rows>";
	          echo $xml;
	          exit;
      		}
		$this->smarty->display ( 'thematic_management.html' );
    }
	
	/*专题活动——新增*/
	public function thematic_management_add (){
	    if($this->input->is_ajax_request()){
	       if(empty($_SESSION['shop_admin_id'])){
	            $return = array(
	                    'state'=>'file_copy_false_add',
	                    'msg'=>"权限已过期，请重新登录后再试"
	             );
	            echo json_encode($return);
	            exit();
	       }
	        $flag=isset($_GET['flag'])?$_GET['flag']:'';
	        //专题封面图
	        if (!empty ( $_FILES ['special_image1'] ['name'] )) {
	            $tmp_file = $_FILES ['special_image1'] ['tmp_name'];
	            $file_types = explode ( ".", $_FILES ['special_image1'] ['name'] );
	            $file_type = $file_types [count ( $file_types ) - 1];
	            if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
	                $return = array(
	                    'state'=>'file_type_false',
	                    'msg'=>"不是图片文件，重新稍后上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $savePath = ROOTPATH . 'data/shop/thematic_image/'; // 设置上传路径
	            $str = date ( 'YmdHis' ) . uniqid ()."_fm"; // 以时间来命名上传的文件
	            $file_name = $str . "." . $file_type; // 是否上传成功
	            if (! copy( $tmp_file, $savePath . $file_name )) {
	                $return = array(
	                    'state'=>'file_copy_false',
	                    'msg'=>"图片上传失败，请稍后重新上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $_POST['textfield1'] = 'data/shop/thematic_image/'.$file_name;
	        }
	        //专题背景图
	        if (!empty ( $_FILES ['special_image2'] ['name'] )) {
	            $tmp_file = $_FILES ['special_image2'] ['tmp_name'];
	            $file_types = explode ( ".", $_FILES ['special_image2'] ['name'] );
	            $file_type = $file_types [count ( $file_types ) - 1];
	            if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
	                $return = array(
	                    'state'=>'file_type_false',
	                    'msg'=>"不是图片文件，重新稍后上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $savePath = ROOTPATH . 'data/shop/thematic_image/'; // 设置上传路径
	            $str = date ( 'YmdHis' ) . uniqid ()."_bj"; // 以时间来命名上传的文件
	            $file_name = $str . "." . $file_type; // 是否上传成功
	            if (! copy( $tmp_file, $savePath . $file_name )) {
	                $return = array(
	                    'state'=>'file_copy_false',
	                    'msg'=>"图片上传失败，请稍后重新上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $_POST['textfield2'] = 'data/shop/thematic_image/'.$file_name;
	        }
	        $_POST['special_content']=str_replace("thematic_image/tmp","thematic_image",$_POST['special_content']);
	        $data=array(
	            "special_title" =>$_POST['special_title'],
	            "special_margin_top"=>$_POST['special_margin_top'],
	            "special_image"=>$_POST['textfield1'],
	            "special_background"=>$_POST['textfield2'],
	            "special_image_all"=>serialize($_SESSION['special_image_upload']),
	            "special_content"=> serialize($_POST['special_content']), //序列化所有专题内容
	            "special_modify_time"=> time(),
	            "special_publish_id"=>$_SESSION['shop_admin_id'],
	            "special_background_color"=>$_POST['special_background_color'],
	            "special_repeat"=>$_POST['special_repeat'],
	            "special_type"=>$_POST['special_type'],
	        );
	        if($flag=="draft"){
	            $data['special_state']="1";
	        }else{
                $data['special_state']="2";
	        }
	        //新增文章
	        $article_add=$this->db->insert('cms_special',$data);
	        if($article_add){
	            $old='data/shop/thematic_image/tmp/';
	            $new='data/shop/thematic_image/';
	            if(!empty($_SESSION['special_image_upload'])){
    	            foreach ($_SESSION['special_image_upload'] as $key=>$val){
    	                copy( ROOTPATH.$old.$val, ROOTPATH.$new.$val );
    	                @unlink(ROOTPATH.$old.$val);
    	            }
	            }
	            $_SESSION['special_image_upload']=array();
	            echo json_encode("success");
	        }else{
	            echo json_encode("false");
	        }
	        exit();
	    
	    }
		$this->smarty->display ( 'thematic_management_add.html' );
    }
    
    /*专题活动——编辑*/
    public function thematic_management_edit(){
       // print_r(ROOTPATH);die;
        $special_id=isset($_GET['special_id'])?$_GET['special_id']:'';
        $thematics=$this->Thematic_model->get_thematic_info($special_id);
        $thematics['special_content']= unserialize($thematics['special_content']);
       // print_r($thematics['special_content']);die;
        $pattern = "/(https?|ftps?):\/\/((\w+)\.){3}(\w+)\/juke\/(\w+\/)*data\/\b/"; 
        $thematics['special_content']=preg_replace($pattern,base_url()."data/",$thematics['special_content']);
        @$thematics['special_image_all']= unserialize($thematics['special_image_all']);
        //print_r($thematics['special_image_all']);die;
        if($this->input->is_ajax_request()){
            $special_id=isset($_GET['special_id'])?$_GET['special_id']:'';
            if(empty($_SESSION['shop_admin_id'])){
                $return = array(
                    'state'=>'file_copy_false_add',
                    'msg'=>"权限已过期，请重新登录后再试"
                );
                echo json_encode($return);
                exit();
            }
            $flag=isset($_GET['flag'])?$_GET['flag']:'';
            //专题封面图
            if (!empty ( $_FILES ['special_image1'] ['name'] )) {
                $tmp_file = $_FILES ['special_image1'] ['tmp_name'];
                $file_types = explode ( ".", $_FILES ['special_image1'] ['name'] );
                $file_type = $file_types [count ( $file_types ) - 1];
                if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                    $return = array(
                        'state'=>'file_type_false',
                        'msg'=>"不是图片文件，重新稍后上传"
                    );
                    echo json_encode($return);
                    exit();
                }
                $savePath = ROOTPATH . 'data/shop/thematic_image/'; // 设置上传路径
                $str = date ( 'YmdHis' ) . uniqid ()."_fm"; // 以时间来命名上传的文件
                $file_name = $str . "." . $file_type; // 是否上传成功
                if (! copy( $tmp_file, $savePath . $file_name )) {
                    $return = array(
                        'state'=>'file_copy_false',
                        'msg'=>"图片上传失败，请稍后重新上传"
                    );
                    echo json_encode($return);
                    exit();
                }
                $_POST['textfield1'] = 'data/shop/thematic_image/'.$file_name;
            }
            //专题背景图
            if (!empty ( $_FILES ['special_image2'] ['name'] )) {
                $tmp_file = $_FILES ['special_image2'] ['tmp_name'];
                $file_types = explode ( ".", $_FILES ['special_image2'] ['name'] );
                $file_type = $file_types [count ( $file_types ) - 1];
                if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                    $return = array(
                        'state'=>'file_type_false',
                        'msg'=>"不是图片文件，重新稍后上传"
                    );
                    echo json_encode($return);
                    exit();
                }
                $savePath = ROOTPATH . 'data/shop/thematic_image/'; // 设置上传路径
                $str = date ( 'YmdHis' ) . uniqid ()."_bj"; // 以时间+随机数来命名上传的文件
                $file_name = $str . "." . $file_type; // 是否上传成功
                if (! copy( $tmp_file, $savePath . $file_name )) {
                    $return = array(
                        'state'=>'file_copy_false',
                        'msg'=>"图片上传失败，请稍后重新上传"
                    );
                    echo json_encode($return);
                    exit();
                }
                $_POST['textfield2'] = 'data/shop/thematic_image/'.$file_name;
            }
            
            if(!empty($_POST['special_image_all'])){
                 if(empty($_SESSION['special_image_upload'])){
                     $_SESSION['special_image_upload']=array();
                 }
                foreach ($_POST['special_image_all'] as $key=>$val){
                        $_SESSION['special_image_upload']+=array($val=>$val);
                }
            }
            $_POST['special_content']=str_replace("thematic_image/tmp","thematic_image",$_POST['special_content']);
            $data=array(
                "special_title" =>$_POST['special_title'],
                "special_margin_top"=>$_POST['special_margin_top'],
                "special_image"=>$_POST['textfield1'],
	            "special_background"=>$_POST['textfield2'],
                "special_image_all"=>serialize($_SESSION['special_image_upload']),
                "special_content"=>serialize($_POST['special_content']), //序列化所有专题内容
                "special_modify_time"=> time(),
                "special_publish_id"=>$_SESSION['shop_admin_id'],
                "special_background_color"=>$_POST['special_background_color'],
                "special_repeat"=>$_POST['special_repeat'],
                "special_type"=>$_POST['special_type'],
            );
            if($flag=="draft"){
                $data['special_state']="1";
            }else{
                $data['special_state']="2";
            }
            //编辑更新文章
            $article_edit=$this->db->update("cms_special",$data,array('special_id'=>$special_id));
            if($article_edit){
                $old='data/shop/thematic_image/tmp/';
                $new='data/shop/thematic_image/';
                 if(!empty($_SESSION['special_image_upload'])){
                    foreach ($_SESSION['special_image_upload'] as $key=>$val){
                        if(isset($val)){
                        copy( ROOTPATH.$old.$val, ROOTPATH.$new.$val );
                        @unlink(ROOTPATH.$old.$val);
                       }
                    }
                 }
                $_SESSION['special_image_upload']=array();
                echo json_encode("success");
            }else{
                echo json_encode("false");
            }
            exit();
             
        }
        $this->smarty->assign("special_id",$special_id);
        $this->smarty->assign("thematics", $thematics);
        $this->smarty->display ( 'thematic_management_edit.html' );
    }
    
    /*专题活动-图片上传*/
    public  function thematic_image_add(){
        if($this->input->is_ajax_request()){
            if (!empty ( $_FILES ['special_image_upload'] ['name'] )) {
                $tmp_file = $_FILES ['special_image_upload'] ['tmp_name'];
                $file_types = explode ( ".", $_FILES ['special_image_upload'] ['name'] );
                $file_type = $file_types [count ( $file_types ) - 1];
                if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                    $return = array(
                        'state'=>'file_type_false',
                        'msg'=>"不是图片文件，重新稍后上传"
                    );
                    echo json_encode($return);
                    exit();
                }
                $savePath = ROOTPATH . 'data/shop/thematic_image/tmp/'; // 设置上传路径
                $str = date ( 'YmdHis' ) . uniqid ()."_act" ; // 以时间来命名上传的文件
                $file_name = $str . "." . $file_type; // 是否上传成功
                if (! copy( $tmp_file, $savePath . $file_name )) {
                    $return = array(
                        'state'=>'file_copy_false',
                        'msg'=>"图片上传失败，请稍后重新上传"
                    );
                    echo json_encode($return);
                    exit();
                }
                $return = array(
                    'state'=>'success',
                    'msg'=>$file_name
                );
                if(empty( $_SESSION['special_image_upload'])){
                    $_SESSION['special_image_upload']=array($file_name=>$file_name);
                }else{
                    $_SESSION['special_image_upload']+=array($file_name=>$file_name);
                }
                echo json_encode($return);
            }
            exit();
        }
    }
   
    /*专题活动-删除上传图片*/
    public  function thematic_image_delete(){
        if($this->input->is_ajax_request()){
            $name=isset($_POST['name'])?$_POST['name']:"";
            if(!empty($name)){
                $image=ROOTPATH . 'data/shop/thematic_image/tmp/'.$name;
                @unlink($image);
                $return = array(
                    'state'=>'success',
                    'msg'=>$file_name,
                    'data'=>""
                );
                unset($_SESSION['special_image_upload'][$name]);
               echo json_encode($return);
            }
            exit();
        }
    
    }
    
    /*专题活动-背景图片回显*/
    public  function thematic_backimage_add(){
        //专题背景图
        if (!empty ( $_FILES ['special_image2'] ['name'] )) {
            $tmp_file = $_FILES ['special_image2'] ['tmp_name'];
            $file_types = explode ( ".", $_FILES ['special_image2'] ['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];
            if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                $return = array(
                    'state'=>'file_type_false',
                    'msg'=>"不是图片文件，重新稍后上传"
                );
                echo json_encode($return);
                exit();
            }
            $savePath = ROOTPATH . 'data/shop/thematic_image/tmp/'; // 设置上传路径
            $str = date ( 'YmdHis' ) . uniqid ()."_hx"; // 以时间来命名上传的文件
            $file_name = $str . "." . $file_type; // 是否上传成功
            if (copy( $tmp_file, $savePath . $file_name )) {
                $return = array(
                    'state'=>'file_copy_success',
                    'msg'=>"图片上传失败，请稍后重新上传",
                    'data'=>'data/shop/thematic_image/tmp/'. $file_name
                );
                echo json_encode($return);
            }
            exit();
        }
    }
    
    /*专题活动-商品添加*/
    public function thematic_goods_add(){
	   if (isset($_GET['op'])&&$_GET['op']=='search_goods_name'){
	        //print_r($_POST);exit;
	        $search_goods_name = isset($_POST['search_goods_name']) ? trim($_POST['search_goods_name']) : '';
	        $page = isset($_POST['page']) ? trim($_POST['page']) : 1;
	        $rp = 10;
	        $start = $rp*($page-1);
	        if($search_goods_name!=''){
	            $where="goods_name LIKE '%$search_goods_name%'";
	            $total = $this->db->select('count(1) as num')->where("goods_name LIKE '%$search_goods_name%' ")->get('shop_goods')->row('num');
	        }else{
	            $where="";
	            $total = $this->db->select('count(1) as num')->get('shop_goods')->row('num');
	        }
	        $goods_data  = $this->db->query("SELECT goods_image,goods_price,goods_id,goods_name  FROM jk_shop_goods $where order by goods_name desc limit $start,$rp")->result_array();
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
	    }
		
	}
    
    
    
    
    
    
    
    
    
    
}
