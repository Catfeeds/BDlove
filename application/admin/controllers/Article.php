<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('Article_model');
    }

	/*文章分类*/
	public function article_classify(){
        $this->common_function->shop_admin_priv("Articleclass_setting");//权限
	      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	      $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'class_sort';
	      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
	      $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
	      $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
	      
	      if(isset($_GET['op'])&&$_GET['op'] == 'list_del'){
	          /* 删除一项或者多项 */
	          $del_id = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
	      
	          $result = array('state'=>false, 'msg'=>"删除失败");
	          $this->db->where("class_id in ($del_id)");
	          $re = $this->db->delete('cms_article_class');  
	          if($re){
	              $result['state'] = true;
	              $result['msg'] 	= "删除成功";
	          }
	          echo  json_encode($result);
	          exit;
	      }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){
	          
	          $this->db->select('*');
	          $this->db->from('cms_article_class');
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
	          header("Content-type: text/xml");
	          $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	          $xml .= "<rows>";
	          $xml .= "<page>$page</page>";
	          $xml .= "<total>$total</total>";
	          foreach($rows AS $key => $row){
	              $xml .= "<row id='" . $row['class_id'] . "'>";
	              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['class_id'] . ")'><i class='fa fa-trash-o'></i>删除</a>]]></cell>";
	              $xml .= "<cell><![CDATA[<input type='text' style='width:30px' id='".$row['class_id']."'  onblur='update_sort(" . $row['class_id'] . ")' value='".$row['class_sort']."'>]]></cell>";
	              $xml .= "<cell><![CDATA[<input type='text' style='width:80px' id='title".$row['class_id']."'  onblur='update_title(" . $row['class_id'] . ")' value='".$row['class_name']."'>]]></cell>";
	              $xml .= "</row>";
	          }
	          $xml .= "</rows>";
	          echo $xml;
	          exit;
      	}
		$this->smarty->display ( 'article_classify.html' );
	}
	
	/*文章分类——新增*/
	public function article_classify_add(){
        $this->common_function->shop_admin_priv("Articleclass_setting");//权限
		if($this->input->is_ajax_request()){
			unset($_POST['form_submit']);
            $class_add=$this->db->insert('cms_article_class',$_POST);
	    	if($class_add){
	    		echo json_encode("success");
	    	}else{
	    		echo json_encode("false");
	    	}
	    	exit;
		}
		$this->smarty->display ( 'article_classify_add.html' );
	}
	
	/*文章管理*/
	public function article_management(){
        $this->common_function->shop_admin_priv("Article_management");//权限
	      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	      $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'article_sort';
	      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
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
	                  $img = $this->db->select('article_image')->where('article_id',$val)->get('cms_article')->row('article_image');
	                  @unlink(ROOTPATH.$img);
	              }
	          }else{
	              $img = $this->db->select('article_image')->where('article_id',$val)->get('cms_article')->row('article_image');
	              @unlink(ROOTPATH.$img);
	          }
	          $this->db->where("article_id in ($del_id)");
	          $re = $this->db->delete('cms_article');  
	          if($re){
	              $result['state'] = true;
	              $result['msg'] 	= "删除成功";
	          }
	          echo  json_encode($result);exit;
	      }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){

	      	  $article_title = isset($_GET['article_title']) ? $_GET['article_title'] : '';
	          $article_publisher_name = isset($_GET['article_publisher_name']) ? $_GET['article_publisher_name'] : '';
	          $article_commend_flag = isset($_GET['article_commend_flag']) ? $_GET['article_commend_flag'] : '';
	          $article_commend_image_flag = isset($_GET['article_commend_image_flag']) ? $_GET['article_commend_image_flag'] : '';
	          $article_comment_flag = isset($_GET['article_comment_flag']) ? $_GET['article_comment_flag'] : '';
	          $article_attitude_flag = isset($_GET['article_attitude_flag']) ? $_GET['article_attitude_flag'] : '';
	          $article_state  = isset($_GET['article_state']) ? $_GET['article_state'] : '';
	          $where = ' article_state!=4 ';
	          if($article_title !=''){
	              $where .= " and article_title like '%$article_title%'";
	          }
	          if($article_publisher_name !=''){
	              $where .= " and article_publisher_name like '%$article_publisher_name%'";
	          }
	     	 if($article_commend_flag !=''){
	              $where .= " and article_commend_flag like '%$article_commend_flag%'";
	          }
	      	 if(article_commend_image_flag !=''){
	              $where .= " and article_commend_image_flag like '%$article_commend_image_flag%'";
	          }
	          if($article_comment_flag !=''){
	              $where .= " and article_comment_flag like '%$article_comment_flag%'";
	          }
	     	 if($article_attitude_flag !=''){
	              $where .= " and article_attitude_flag like '%$article_attitude_flag%'";
	          }
	      	if($article_state !=''){
	              $where .= " and article_state like '%$article_state%'";
	          }
			 
	          $this->db->select('*');
	          $this->db->from('cms_article');
	          $this->db->where($where);
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
	               //是否推荐文章
		          	if($row['article_commend_flag']==0){
		          		$article_commend_flag='<div style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										否
										</span>
										</div>';
		          		$article_commend="推荐";
		          	 }else{
		          	 	$article_commend_flag='<div style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										是
									</span>
									</div>';
		          	 	$article_commend="取消推荐";
		          	 }
		          	 //是否推荐图文
	          		if($row['article_commend_image_flag']==0){
		          		$article_commend_image_flag='<div style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										否
										</span>
										</div>';
		          		$article_commend_image="推荐";
		          	 }else{
		          	 	$article_commend_image_flag='<div style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										是
									</span>
									</div>';
		          	 	$article_commend_image="取消推荐";
		          	 }
		          	 //是否开启评论
	          		if($row['article_comment_flag']==0){
		          		$article_comment_flag='<div  style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										关闭
										</span>
										</div>';
		          		$article_comment="开启";
		          	 }else{
		          	 	$article_comment_flag='<div style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										开启
									</span>
									</div>';
		          	 	$article_comment="关闭";
		          	 }
		          	 //是否开启心情
	          		if($row['article_attitude_flag']==0){
		          		$article_attitude_flag='<div  style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										关闭
										</span>
										</div>';
		          		$article_attitude="开启";
		          	 }else{
		          	 	$article_attitude_flag='<div  style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										开启
									</span>
									</div>';
		          	 	$article_attitude="关闭";
		          	 }
		          	 //是否有图片
		          	 if(!empty($row['article_image'])){
		          	     $url=base_url().$row['article_image'];
		          	     $row_article_image='<span class="show">
                                             <a class="pic-thumb-tip" rel="gal" href=""><i class="fa fa-picture-o"  id="" data-geo="<img src='.$url.' width=100px height=50px>"></i></a>
                                             </span>';
		          	 }else{
		          	      $url=TEMPLE."images/default_user_portrait.gif";
		          	      $row_article_image='<span class="show">
                                             <a class="pic-thumb-tip" rel="gal" href=""><i class="fa fa-picture-o"  id="" data-geo="<img src='.$url.' width=100px height=50px>"></i></a>
                                             </span>';
		          	 }
		          	 //文章状态
	                 if($row['article_state']==1){
		          		$article_state='<div style="text-align: center; width: 50px;">草稿</div>';
		          	 }elseif($row['article_state']==2){
		          	 	$article_state='<div style="text-align: center; width: 50px;">待审核</div>';
		          	 }elseif($row['article_state']==3){
		          		$article_state='<div style="text-align: center; width: 50px;">已发布</div>';
		          	 }else{
		          	 	$article_state='<div style="text-align: center; width: 50px;">回收站</div>';
		          	 }
		              $xml .= "<row id='" . $row['article_id'] . "'>";
		              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['article_id'] . ")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                                 <ul>
                                    <li><a onclick=update_state(". $row['article_id'] .")>收回文章</a></li>
                                    <li><a onclick=article_edit(".$row['article_id'] .")>编辑文章</a></li>
            	                    <li><a onclick=edits(". 2 .")>#查看文章#</a></li>
            		                <li><a onclick=update_commend_flag(". $row['article_id'] .$row['article_commend_flag'].")>".$article_commend."文章</a></li>
            		                <li><a onclick=update_image_flag(". $row['article_id'] .$row['article_commend_image_flag'].")>".$article_commend_image."图文</a></li>
            		                <li><a onclick=update_comment_flag(". $row['article_id'] .$row['article_comment_flag'].")>".$article_comment."评论</a></li>
            	                    <li><a onclick=update_attitude_flag(". $row['article_id'] .$row['article_attitude_flag'].")>".$article_attitude."心情</a></li>";
		              $xml .= "</ul></span>]]></cell>";
		              
		              $xml .= "<cell><![CDATA[<input type='text' style='width:30px' id='".$row['article_id']."'  onblur='update_sort(" . $row['article_id']. ")' value='".$row['article_sort']."'/>]]></cell>";
		              $xml .= "<cell><![CDATA[".$row['article_title']."]]></cell>";
		              $xml .= "<cell><![CDATA[". $row_article_image."]]></cell>";
		              $xml .= "<cell><![CDATA[".$row['article_author']."]]></cell>";
		              $xml .= "<cell><![CDATA[<input type='text' style='width:30px' id='click".$row['article_id']."'  onblur='update_click(" . $row['article_id']. ")' value='".$row['article_click']."'/>]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_commend_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_commend_image_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_comment_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_attitude_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_state."]]></cell>";
		              $xml .= "</row>";
	          }
	          $xml .= "</rows>";
	          echo $xml;
	          exit;
      		}
		$this->smarty->display ( 'article_management.html' );
	}
	
	/*增加新闻*/
	public function article_management_add(){
        $this->common_function->shop_admin_priv("Article_add");//权限
	    if($this->input->is_ajax_request()){
	        //LOGO图片处理
	        if (!empty ( $_FILES ['fileupload'] ['name'] )) {
	            //临时文件名
	            $tmp_file = $_FILES ['fileupload'] ['tmp_name'];
	
	            //获取文件后缀名
	            $file_types = explode ( ".", $_FILES ['fileupload'] ['name'] );
	            $file_type = $file_types [count ( $file_types ) - 1];
	            //判断图片格式
	            if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
	                $return = array(
	                    'state'=>'file_type_false',
	                    'msg'=>"不是图片文件，重新稍后上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $savePath = ROOTPATH . 'data/shop/article_pic'; // 设置上传路径
	            $str = date ( 'YmdHis' ) . uniqid ()."_cms"; // 以时间来命名上传的文件
	            $file_name = $str . "." . $file_type; // 是否上传成功
	            if (! copy( $tmp_file, $savePath . $file_name )) {
	                $return = array(
	                    'state'=>'file_copy_false',
	                    'msg'=>"图片上传失败，请稍后重新上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $_POST['text'] = 'data/shop/article_pic'.$file_name;
	        }
	        $data=array(
	            'article_title'=>$_POST['title'],
	            'article_title_color'=>$_POST['title_colcor'],
	            'article_custom_flag'=>$_POST['flag'],
	            'article_class_id'=>$_POST['cate_id'],
	            'article_show'=>$_POST['is_audit'],
	            'article_comment_flag'=>$_POST['is_comment'],
	            'article_attitude_flag'=>$_POST['is_xq'],
	            'article_origin'=>$_POST['article_origin'],
	            'article_origin_address'=>$_POST['article_origin_address'],
	            'article_keyword'=>$_POST['article_keyword'],
	            'article_author'=>$_POST['article_author'],
	            'article_tag'=>$_POST['article_tag'],
	            'article_start_time'=>strtotime($_POST['article_start_time']),
	            'article_end_time'=>strtotime($_POST['article_end_time']),
	            'article_abstract'=>$_POST['description'],
	            'article_image'=>$_POST['text'],
	            'article_content'=>$_POST['content'],

	        );
	        $article_add=$this->db->insert('cms_article',$data);
	        if($article_add){
	            echo json_encode("success");
	        }else{
	            echo json_encode("false");
	        }
	        exit;
	    }
	    //查询文章标签
	    $Article_tag=$this->Article_model->get_article_tag();
	    //查询新闻分类
	    $Article_class=$this->Article_model->get_article_class();
	    $this->smarty->assign("Artclass",$Article_class);
	    $this->smarty->assign("Arttag",$Article_tag);
	    $this->smarty->display ( 'article_management_add.html' );
	}
	
	/*编辑新闻*/
	public function article_management_edit(){
        $this->common_function->shop_admin_priv("Article_edit");//权限
	    $id=isset($_GET['id'])?$_GET['id']:'';
	    if($this->input->is_ajax_request()){
	        if (!empty ( $_FILES ['fileupload'] ['name'] )) {
	            //临时文件名
	            $tmp_file = $_FILES ['fileupload'] ['tmp_name'];
	    
	            //获取文件后缀名
	            $file_types = explode ( ".", $_FILES ['fileupload'] ['name'] );
	            $file_type = $file_types [count ( $file_types ) - 1];
	            //判断图片格式
	            if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
	                $return = array(
	                    'state'=>'file_type_false',
	                    'msg'=>"不是图片文件，重新稍后上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $savePath = ROOTPATH . 'data/shop/article_pic'; // 设置上传路径
	            $str = date ( 'YmdHis' ) . uniqid ()."_cms"; // 以时间来命名上传的文件
	            $file_name = $str . "." . $file_type; // 是否上传成功
	            if (! copy( $tmp_file, $savePath . $file_name )) {
	                $return = array(
	                    'state'=>'file_copy_false',
	                    'msg'=>"图片上传失败，请稍后重新上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $_POST['text'] = 'data/shop/article_pic'.$file_name;
	        }
	        $id=isset($_GET['id'])?$_GET['id']:'';
	        $data=array(
	            'article_title'=>$_POST['title'],
	            'article_title_color'=>$_POST['title_colcor'],
	            'article_custom_flag'=>$_POST['flag'],
	            'article_class_id'=>$_POST['cate_id'],
	            'article_show'=>$_POST['is_audit'],
	            'article_comment_flag'=>$_POST['is_comment'],
	            'article_attitude_flag'=>$_POST['is_xq'],
	            'article_origin'=>$_POST['article_origin'],
	            'article_origin_address'=>$_POST['article_origin_address'],
	            'article_keyword'=>$_POST['article_keyword'],
	            'article_author'=>$_POST['article_author'],
	            'article_tag'=>$_POST['article_tag'],
	            'article_start_time'=>strtotime($_POST['article_start_time']),
	            'article_end_time'=>strtotime($_POST['article_end_time']),
	            'article_abstract'=>$_POST['description'],
	            'article_image'=>$_POST['text'],
	            'article_content'=>$_POST['content'],
	    
	        );
	        $article_edit=$this->db->update("cms_article",$data,array("article_id"=>$id));
	        if($article_edit){
	            echo json_encode("success");
	        }else{
	            echo json_encode("false");
	        }
	        exit;
	    }
	    //查询文章标签
	    $Article_tag=$this->Article_model->get_article_tag();
	    $Article_info=$this->Article_model->get_article_info($id);
	    $Article_info['article_start_time']=date("Y-m-d",$Article_info['article_start_time']);
	    $Article_info['article_end_time']=date("Y-m-d",$Article_info['article_end_time']);
	    $Article_class=$this->Article_model->get_article_class();
	    $this->smarty->assign("Artclass",$Article_class);
	    $this->smarty->assign("Artinfo",$Article_info);
	    $this->smarty->assign("Arttag",$Article_tag);
	    $this->smarty->display ('article_management_edit.html');
	}
	
	/*回收新闻*/
	public function article_management_update_state(){
        $this->common_function->shop_admin_priv("Article_del");//权限
	    $id=isset($_GET['id'])?$_GET['id']:'';
	    //查询文章状态
	    $Article_info=$this->Article_model->get_article_info($id);
	    $article_state=$Article_info['article_state'];
	    //'1-草稿、2-待审核、3-已发布、4-回收站',
	   if($article_state!="4"){
	       $update_state=$this->db->update("cms_article",array("article_state"=>4),array("article_id"=>$id));
	       if(!$update_state){
	           echo "<script language='JavaScript' type='application/javascript'>";
	           echo "alert('文章收回失败');";
	           echo "</script>";
	       }else{
	           echo "<script language='JavaScript' type='application/javascript'>";
	           echo 'window.location.href="<{base_url()}>admin.php/Article/article_management";';
	           echo "</script>";
	       }
	       
	   }
	}
	
	/*文章管理——待审核*/
	public function article_management_pending_audit(){
        $this->common_function->shop_admin_priv("Article_management");//权限
		
	      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	      $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'article_sort';
	      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
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
	                  $img = $this->db->select('article_image')->where('article_id',$val)->get('cms_article')->row('article_image');
	                  @unlink(ROOTPATH.$img);
	              }
	          }else{
	              $img = $this->db->select('article_image')->where('article_id',$val)->get('cms_article')->row('article_image');
	              @unlink(ROOTPATH.$img);
	          }
	          $this->db->where("article_id in ($del_id)");
	          $re = $this->db->delete('cms_article');  
	          if($re){
	              $result['state'] = true;
	              $result['msg'] 	= "删除成功";
	          }
	          echo  json_encode($result);exit;
	      }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){

	      	  $article_title = isset($_GET['article_title']) ? $_GET['article_title'] : '';
	          $article_publisher_name = isset($_GET['article_publisher_name']) ? $_GET['article_publisher_name'] : '';
	          $article_commend_flag = isset($_GET['article_commend_flag']) ? $_GET['article_commend_flag'] : '';
	          $article_commend_image_flag = isset($_GET['article_commend_image_flag']) ? $_GET['article_commend_image_flag'] : '';
	          $article_comment_flag = isset($_GET['article_comment_flag']) ? $_GET['article_comment_flag'] : '';
	          $article_attitude_flag = isset($_GET['article_attitude_flag']) ? $_GET['article_attitude_flag'] : '';
	          $article_state  = isset($_GET['article_state']) ? $_GET['article_state'] : '';
	          $where = ' article_state=2 ';
	          if($article_title !=''){
	              $where .= " and article_title like '%$article_title%'";
	          }
	          if($article_publisher_name !=''){
	              $where .= " and article_publisher_name like '%$article_publisher_name%'";
	          }
	     	 if($article_commend_flag !=''){
	              $where .= " and article_commend_flag like '%$article_commend_flag%'";
	          }
	      	 if(article_commend_image_flag !=''){
	              $where .= " and article_commend_image_flag like '%$article_commend_image_flag%'";
	          }
	          if($article_comment_flag !=''){
	              $where .= " and article_comment_flag like '%$article_comment_flag%'";
	          }
	     	 if($article_attitude_flag !=''){
	              $where .= " and article_attitude_flag like '%$article_attitude_flag%'";
	          }
	      	if($article_state !=''){
	              $where .= " and article_state like '%$article_state%'";
	          }
			 
	          $this->db->select('*');
	          $this->db->from('cms_article');
	          $this->db->where($where);
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
		          	
	               //是否推荐文章
		          	if($row['article_commend_flag']==0){
		          		$article_commend_flag='<div style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										否
										</span>
										</div>';
		          		$article_commend="推荐";
		          	 }else{
		          	 	$article_commend_flag='<div style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										是
									</span>
									</div>';
		          	 	$article_commend="取消推荐";
		          	 }
		          	 //是否推荐图文
	          		if($row['article_commend_image_flag']==0){
		          		$article_commend_image_flag='<div style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										否
										</span>
										</div>';
		          		$article_commend_image="推荐";
		          	 }else{
		          	 	$article_commend_image_flag='<div style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										是
									</span>
									</div>';
		          	 	$article_commend_image="取消推荐";
		          	 }
		          	 //是否开启评论
	          		if($row['article_comment_flag']==0){
		          		$article_comment_flag='<div  style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										关闭
										</span>
										</div>';
		          		$article_comment="开启";
		          	 }else{
		          	 	$article_comment_flag='<div style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										开启
									</span>
									</div>';
		          	 	$article_comment="关闭";
		          	 }
		          	 //是否开启心情
	          		if($row['article_attitude_flag']==0){
		          		$article_attitude_flag='<div  style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										关闭
										</span>
										</div>';
		          		$article_attitude="开启";
		          	 }else{
		          	 	$article_attitude_flag='<div  style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										开启
									</span>
									</div>';
		          	 	$article_attitude="关闭";
		          	 }
		          	 //是否有图片
		          	 if(!empty($row['article_image'])){
		          	     $url=base_url().$row['article_image'];
		          	     $row_article_image='<span class="show">
                                             <a class="pic-thumb-tip" rel="gal" href=""><i class="fa fa-picture-o"  id="" data-geo="<img src='.$url.' width=100px height=50px>"></i></a>
                                             </span>';
		          	 }else{
		          	      $url=TEMPLE."images/default_user_portrait.gif";
		          	      $row_article_image='<span class="show">
                                             <a class="pic-thumb-tip" rel="gal" href=""><i class="fa fa-picture-o"  id="" data-geo="<img src='.$url.' width=100px height=50px>"></i></a>
                                             </span>';
		          	 }
		          	 //文章状态
	                 if($row['article_state']==1){
		          		$article_state='<div style="text-align: center; width: 50px;">草稿</div>';
		          	 }elseif($row['article_state']==2){
		          	 	$article_state='<div style="text-align: center; width: 50px;">待审核</div>';
		          	 }elseif($row['article_state']==3){
		          		$article_state='<div style="text-align: center; width: 50px;">已发布</div>';
		          	 }else{
		          	 	$article_state='<div style="text-align: center; width: 50px;">回收站</div>';
		          	 }
		              $xml .= "<row id='" . $row['article_id'] . "'>";
		              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['article_id'] . ")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                                 <ul>
                                    <li><a onclick=update_state(". $row['article_id'] .")>收回文章</a></li>
                                    <li><a onclick=article_edit(".$row['article_id'] .")>编辑文章</a></li>
            	                    <li><a onclick=edits(". 2 .")>#查看文章#</a></li>
            		                <li><a onclick=update_commend_flag(". $row['article_id'] .$row['article_commend_flag'].")>".$article_commend."文章</a></li>
            		                <li><a onclick=update_image_flag(". $row['article_id'] .$row['article_commend_image_flag'].")>".$article_commend_image."图文</a></li>
            		                <li><a onclick=update_comment_flag(". $row['article_id'] .$row['article_comment_flag'].")>".$article_comment."评论</a></li>
            	                    <li><a onclick=update_attitude_flag(". $row['article_id'] .$row['article_attitude_flag'].")>".$article_attitude."心情</a></li>";
		              $xml .= "</ul></span>]]></cell>";
		              
		              $xml .= "<cell><![CDATA[<input type='text' style='width:30px' id='".$row['article_id']."'  onblur='update_sort(" . $row['article_id']. ")' value='".$row['article_sort']."'/>]]></cell>";
		              $xml .= "<cell><![CDATA[".$row['article_title']."]]></cell>";
		              $xml .= "<cell><![CDATA[". $row_article_image."]]></cell>";
		              $xml .= "<cell><![CDATA[".$row['article_author']."]]></cell>";
		              $xml .= "<cell><![CDATA[<input type='text' style='width:30px' id='click".$row['article_id']."'  onblur='update_click(" . $row['article_id']. ")' value='".$row['article_click']."'/>]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_commend_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_commend_image_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_comment_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_attitude_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_state."]]></cell>";
		              $xml .= "</row>";
	          }
	          $xml .= "</rows>";
	          echo $xml;
	          exit;
      		}
		$this->smarty->display ( 'article_management_pending_audit.html' );
	}
	
	/*文章管理——已发布*/
	public function article_management_lauched(){
        $this->common_function->shop_admin_priv("Article_management");//权限

		if($this->input->is_ajax_request()){
			
	      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	      $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'article_sort';
	      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
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
	                  $img = $this->db->select('article_image')->where('article_id',$val)->get('cms_article')->row('article_image');
	                  @unlink(ROOTPATH.$img);
	              }
	          }else{
	              $img = $this->db->select('article_image')->where('article_id',$val)->get('cms_article')->row('article_image');
	              @unlink(ROOTPATH.$img);
	          }
	          $this->db->where("article_id in ($del_id)");
	          $re = $this->db->delete('cms_article');  
	          if($re){
	              $result['state'] = true;
	              $result['msg'] 	= "删除成功";
	          }
	          echo  json_encode($result);exit;
	      }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){

	      	  $article_title = isset($_GET['article_title']) ? $_GET['article_title'] : '';
	          $article_publisher_name = isset($_GET['article_publisher_name']) ? $_GET['article_publisher_name'] : '';
	          $article_commend_flag = isset($_GET['article_commend_flag']) ? $_GET['article_commend_flag'] : '';
	          $article_commend_image_flag = isset($_GET['article_commend_image_flag']) ? $_GET['article_commend_image_flag'] : '';
	          $article_comment_flag = isset($_GET['article_comment_flag']) ? $_GET['article_comment_flag'] : '';
	          $article_attitude_flag = isset($_GET['article_attitude_flag']) ? $_GET['article_attitude_flag'] : '';
	          $article_state  = isset($_GET['article_state']) ? $_GET['article_state'] : '';
	          $where = ' article_state=3 ';
	          if($article_title !=''){
	              $where .= " and article_title like '%$article_title%'";
	          }
	          if($article_publisher_name !=''){
	              $where .= " and article_publisher_name like '%$article_publisher_name%'";
	          }
	     	 if($article_commend_flag !=''){
	              $where .= " and article_commend_flag like '%$article_commend_flag%'";
	          }
	      	 if(article_commend_image_flag !=''){
	              $where .= " and article_commend_image_flag like '%$article_commend_image_flag%'";
	          }
	          if($article_comment_flag !=''){
	              $where .= " and article_comment_flag like '%$article_comment_flag%'";
	          }
	     	 if($article_attitude_flag !=''){
	              $where .= " and article_attitude_flag like '%$article_attitude_flag%'";
	          }
	      	if($article_state !=''){
	              $where .= " and article_state like '%$article_state%'";
	          }
			 
	          $this->db->select('*');
	          $this->db->from('cms_article');
	          $this->db->where($where);
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
		          	
	               //是否推荐文章
		          	if($row['article_commend_flag']==0){
		          		$article_commend_flag='<div style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										否
										</span>
										</div>';
		          		$article_commend="推荐";
		          	 }else{
		          	 	$article_commend_flag='<div style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										是
									</span>
									</div>';
		          	 	$article_commend="取消推荐";
		          	 }
		          	 //是否推荐图文
	          		if($row['article_commend_image_flag']==0){
		          		$article_commend_image_flag='<div style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										否
										</span>
										</div>';
		          		$article_commend_image="推荐";
		          	 }else{
		          	 	$article_commend_image_flag='<div style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										是
									</span>
									</div>';
		          	 	$article_commend_image="取消推荐";
		          	 }
		          	 //是否开启评论
	          		if($row['article_comment_flag']==0){
		          		$article_comment_flag='<div  style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										关闭
										</span>
										</div>';
		          		$article_comment="开启";
		          	 }else{
		          	 	$article_comment_flag='<div style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										开启
									</span>
									</div>';
		          	 	$article_comment="关闭";
		          	 }
		          	 //是否开启心情
	          		if($row['article_attitude_flag']==0){
		          		$article_attitude_flag='<div  style="text-align: center; width: 50px;">
										<span class="no">
										<i class="fa fa-ban"></i>
										关闭
										</span>
										</div>';
		          		$article_attitude="开启";
		          	 }else{
		          	 	$article_attitude_flag='<div  style="text-align: center; width: 50px;">
									<span class="yes">
									<i class="fa fa-check-circle"></i>
										开启
									</span>
									</div>';
		          	 	$article_attitude="关闭";
		          	 }
		          	 //是否有图片
		          	 if(!empty($row['article_image'])){
		          	     $url=base_url().$row['article_image'];
		          	     $row_article_image='<span class="show">
                                             <a class="pic-thumb-tip" rel="gal" href=""><i class="fa fa-picture-o"  id="" data-geo="<img src='.$url.' width=100px height=50px>"></i></a>
                                             </span>';
		          	 }else{
		          	      $url=TEMPLE."images/default_user_portrait.gif";
		          	      $row_article_image='<span class="show">
                                             <a class="pic-thumb-tip" rel="gal" href=""><i class="fa fa-picture-o"  id="" data-geo="<img src='.$url.' width=100px height=50px>"></i></a>
                                             </span>';
		          	 }
		          	 //文章状态
	                 if($row['article_state']==1){
		          		$article_state='<div style="text-align: center; width: 50px;">草稿</div>';
		          	 }elseif($row['article_state']==2){
		          	 	$article_state='<div style="text-align: center; width: 50px;">待审核</div>';
		          	 }elseif($row['article_state']==3){
		          		$article_state='<div style="text-align: center; width: 50px;">已发布</div>';
		          	 }else{
		          	 	$article_state='<div style="text-align: center; width: 50px;">回收站</div>';
		          	 }
		              $xml .= "<row id='" . $row['article_id'] . "'>";
		              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['article_id'] . ")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                                 <ul>
                                    <li><a onclick=update_state(". $row['article_id'] .")>收回文章</a></li>
                                    <li><a onclick=article_edit(".$row['article_id'] .")>编辑文章</a></li>
            	                    <li><a onclick=edits(". 2 .")>#查看文章#</a></li>
            		                <li><a onclick=update_commend_flag(". $row['article_id'] .$row['article_commend_flag'].")>".$article_commend."文章</a></li>
            		                <li><a onclick=update_image_flag(". $row['article_id'] .$row['article_commend_image_flag'].")>".$article_commend_image."图文</a></li>
            		                <li><a onclick=update_comment_flag(". $row['article_id'] .$row['article_comment_flag'].")>".$article_comment."评论</a></li>
            	                    <li><a onclick=update_attitude_flag(". $row['article_id'] .$row['article_attitude_flag'].")>".$article_attitude."心情</a></li>";
		              $xml .= "</ul></span>]]></cell>";
		              
		              $xml .= "<cell><![CDATA[<input type='text' style='width:30px' id='".$row['article_id']."'  onblur='update_sort(" . $row['article_id']. ")' value='".$row['article_sort']."'/>]]></cell>";
		              $xml .= "<cell><![CDATA[".$row['article_title']."]]></cell>";
		              $xml .= "<cell><![CDATA[". $row_article_image."]]></cell>";
		              $xml .= "<cell><![CDATA[".$row['article_author']."]]></cell>";
		              $xml .= "<cell><![CDATA[<input type='text' style='width:30px' id='click".$row['article_id']."'  onblur='update_click(" . $row['article_id']. ")' value='".$row['article_click']."'/>]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_commend_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_commend_image_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_comment_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_attitude_flag."]]></cell>";
		              $xml .= "<cell><![CDATA[".$article_state."]]></cell>";
		              $xml .= "</row>";
	          }
	          $xml .= "</rows>";
	          echo $xml;
      		}
           exit;
		 }
		$this->smarty->display ( 'article_management_lauched.html' );
	}
	
	
	//根据ID号修改sort排序
	function update_sort_all(){
		$flag=isset($_POST['flag'])?$_POST['flag']:'';
		$id=isset($_POST['id'])?$_POST['id']:'';
		$sort=isset($_POST['sort'])?$_POST['sort']:'';
		//修改文章分类 排序字段
		if($flag=="update_class_sort"){
		     $table="cms_article_class";
		     $id=array("key"=>'class_id',"value"=>$id);
		     $sort=array("key"=>'class_sort',"value"=>$sort);
		}
		//修改文章 排序字段
		if($flag=="update_article_sort"){
		     $table="cms_article";
		     $id=array("key"=>'article_id',"value"=>$id);
		     $sort=array("key"=>'article_sort',"value"=>$sort);
		}
		//修改文章点击量
		if($flag=="update_article_click"){
		     $table="cms_article";
		     $id=array("key"=>'article_id',"value"=>$id);
		     $sort=array("key"=>'article_click',"value"=>$sort);
		}
		//修改文章类 名称
		if($flag=="update_class_name"){
		     $table="cms_article_class";
		     $id=array("key"=>'class_id',"value"=>$id);
		     $sort=array("key"=>'class_name',"value"=>$sort);
		}
		$update_res=$this->Article_model->update_article_sort($table,$id,$sort);
		if($update_res){
			echo json_encode("success");
		}
		exit;
	}
	
	
	//根据ID号修改评论 心情状态
	function update_comment(){
		
		$flags=isset($_POST['flags'])?$_POST['flags']:'';
		$id=isset($_POST['id'])?$_POST['id']:'';
		$comment_flag=isset($_POST['comment_flag'])?$_POST['comment_flag']:'';
		//修改文章评论状态
		if($flags=="comment_flag"){
		     $table="cms_article";
		     $id=array("key"=>'article_id',"value"=>$id);
		     $sort=array("key"=>'article_comment_flag',"value"=>$comment_flag);
		}
		//修改文章心情状态
		if($flags=="attitude_flag"){
		     $table="cms_article";
		     $id=array("key"=>'article_id',"value"=>$id);
		     $sort=array("key"=>'article_attitude_flag',"value"=>$comment_flag);
		}
		//修改推荐文章状态
		if($flags=="commend_flag"){
		    $table="cms_article";
		    $id=array("key"=>'article_id',"value"=>$id);
		    $sort=array("key"=>'article_commend_flag',"value"=>$comment_flag);
		}
		//修改推荐图文状态
		if($flags=="image_flag"){
		    $table="cms_article";
		    $id=array("key"=>'article_id',"value"=>$id);
		    $sort=array("key"=>'article_commend_image_flag',"value"=>$comment_flag);
		}

		$update_res=$this->Article_model->update_article_sort($table,$id,$sort);
		if($update_res){
			echo json_encode("success");
		}
		exit;
	}



}
