<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct(){
        parent::__construct();
        $this->load->model('web_model');
        $this->load->model('Information_model');
        $this->load->library ( 'common_function' );
    }
	/*咨询设置*/
	public function information_set(){
		
		if($this->input->is_ajax_request()){
			unset($_POST['form_submit']);
		    //如果提交的数据某值为空，则终止程序，返回对应的键名
		    foreach ($_POST as $key=>$val){
		   		if($val==""){
		       		echo json_encode($key);
		       		die;
		    	}
			}
	       //LOGO图片处理
			if (!empty ( $_FILES ['cms_logo'] ['name'] )) {
				//临时文件名
	            $tmp_file = $_FILES ['cms_logo'] ['tmp_name'];
	           
	            //获取文件后缀名
	            $file_types = explode ( ".", $_FILES ['cms_logo'] ['name'] );
	            $file_type = $file_types [count ( $file_types ) - 1];
	            //判断图片格式
	            if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
	                $return = array(
	                    'state'=>false,
	                    'msg'=>"不是图片文件，重新稍后上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $savePath = ROOTPATH . 'data/cms_img/'; // 设置上传路径
	            $str = date ( 'YmdHis' ) . uniqid (); // 以时间来命名上传的文件
	            $file_name = $str . "." . $file_type; // 是否上传成功
	            if (! copy( $tmp_file, $savePath . $file_name )) {
	                $return = array(
	                    'state'=>false,
	                    'msg'=>"图片上传失败，请稍后重新上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $_POST['textfield'] = 'data/cms_img/'.$file_name;
             }
			//更新操作
			$data = serialize($_POST);
	        $cms_set = $this->db->update("system_config",array("value"=>$data),array("code"=>"cms_set"));
	    	if($cms_set){
	    		echo json_encode("success");
	    	}else{
	    		echo json_encode("false");
	    	}
	    	exit;
		}
		//查询是否已有积分规则
	    $cms_set = $this->db->select('value')->where('code',"cms_set")->get('system_config')->row_array();
	    $data = unserialize($cms_set['value']);
	    $this->smarty->assign("cms_set",$data);
		$this->smarty->display ( 'information_set.html' );
	}
	
	/*首页管理*/
	public function information_home_management(){
		$this->smarty->display ( 'information_home_management.html' );
	}
	/*导航管理*/
	public function information_nav_management(){
		 //当前页
	      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	      //每页显示记录数
	      $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	      //排序条件（字段）
	      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'navigation_sort';
	      //升序还是降序
	      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
	      $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
	      $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
	      
	      if(isset($_GET['op'])&&$_GET['op'] == 'list_del'){
	          /* 删除一项或者多项 */
	          $del_id = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
	      
	          $result = array('state'=>false, 'msg'=>"删除失败");
	          $this->db->where("navigation_id in ($del_id)");
	          $re = $this->db->delete('cms_navigation');  
	          if($re){
	              $result['state'] = true;
	              $result['msg'] 	= "删除成功";
	          }
	          echo  json_encode($result);exit;
	      }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){
	          
	          $this->db->select('*');
	          $this->db->from('cms_navigation');
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
	          		$id="navigation_open_type".$row['navigation_id'];
		          	if($row['navigation_open_type']==1){
		          		$row_str='<div class="yes-onoff">
						        <a  href="javaScript:void(0);" class="enabled" id="'.$id.'" onclick="update_type('.$row["navigation_id"].')" title="可编辑"></a>
						    </div>';
		          	 }
		            if($row['navigation_open_type']==0){
		          		$row_str='<div class="yes-onoff">
						        <a  href="javaScript:void(0);" class="disabled" id="'.$id.'" onclick="update_type('.$row["navigation_id"].')" title="可编辑"></a>
						    </div>';
		            }
	              $xml .= "<row id='" . $row['navigation_id'] . "'>";
	              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['navigation_id'] . ")'><i class='fa fa-trash-o'></i>删除</a>]]></cell>";
	              $xml .= "<cell><![CDATA[<input type='text' style='width:30px' id='".$row['navigation_id']."'  onblur='update_sort(" . $row['navigation_id'] . ")' value='".$row['navigation_sort']."'>]]></cell>";
	              $xml .= "<cell><![CDATA[<input type='text' style='width:120px' id='title".$row['navigation_id']."'  onblur='update_title(" . $row['navigation_id'] . ")' value='".$row['navigation_title']."'>]]></cell>";
	              $xml .= "<cell><![CDATA[<input type='text' style='width:300px' id='link".$row['navigation_id']."'  onblur='update_link(" . $row['navigation_id'] . ")' value='".$row['navigation_link']."'>]]></cell>";
	              $xml .= "<cell><![CDATA[".$row_str."]]></cell>";
	              $xml .= "</row>";
	          }
	          $xml .= "</rows>";
	          echo $xml;
	          exit;
      	}
		$this->smarty->display ( 'information_nav_management.html' );
	}
	
	/*导航管理——新增*/
	public function information_nav_management_add(){
		if($this->input->is_ajax_request()){
			$flag=isset($_POST['flag'])?$_POST['flag']:"";
			$navigation_id=isset($_POST['number'])?$_POST['number']:"";
			$type=isset($_POST['open_type'])?$_POST['open_type']:"";
		   //修改导航打开方式
			if($flag=="nav_update"){
				$query = $this->db->update("cms_navigation",array("navigation_open_type"=>$type),array("navigation_id"=>$navigation_id));
				if(!$query){
					echo json_encode("false");
				}
		    	exit;
			}
			unset($_POST['form_submit']);
            $tag_add=$this->db->insert('cms_navigation',$_POST);
	    	if($tag_add){
	    		echo json_encode("success");
	    	}else{
	    		echo json_encode("false");
	    	}
	    	exit;
		}
		$this->smarty->display ( 'information_nav_management_add.html' );
	}
	
	/*标签管理*/
	public function information_label_management(){
			//当前页
	      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	      //每页显示记录数
	      $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	      //排序条件（字段）
	      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'navigation_sort';
	      //升序还是降序
	      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
	      $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
	      $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
	      
	      if(isset($_GET['op'])&&$_GET['op'] == 'list_del'){
	          /* 删除一项或者多项 */
	          $del_id = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
	      
	          $result = array('state'=>false, 'msg'=>"删除失败");
	          $this->db->where("tag_id in ($del_id)");
	          $re = $this->db->delete('cms_tag');  
	          if($re){
	              $result['state'] = true;
	              $result['msg'] 	= "删除成功";
	          }
	          echo  json_encode($result);exit;
	      }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){
	          
	          $this->db->select('*');
	          $this->db->from('cms_tag');
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
	              $xml .= "<row id='" . $row['tag_id'] . "'>";
	              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['tag_id'] . ")'><i class='fa fa-trash-o'></i>删除</a>]]></cell>";
	              $xml .= "<cell><![CDATA[<input type='text' style='width:30px' id='".$row['tag_id']."'  onblur='update_sort(" . $row['tag_id'] . ")' value='".$row['tag_sort']."'>]]></cell>";
	              $xml .= "<cell><![CDATA[<input type='text' style='width:120px' id='title".$row['tag_id']."'  onblur='update_title(" . $row['tag_id'] . ")' value='".$row['tag_name']."'>]]></cell>";
	              $xml .= "<cell><![CDATA[".$row['tag_count']."]]></cell>";
	              $xml .= "</row>";
	          }
	          $xml .= "</rows>";
	          echo $xml;
	          exit;
      	}
		$this->smarty->display ( 'information_label_management.html' );
	}
	
	/*标签管理——新增*/
	public function information_label_management_add(){
		if($this->input->is_ajax_request()){
		    unset($_POST['form_submit']);
            $tag_add=$this->db->insert('cms_tag',$_POST);
	    	if($tag_add){
	    		echo json_encode("success");
	    	}else{
	    		echo json_encode("false");
	    	}
	    	exit;
		}
		$this->smarty->display ( 'information_label_management_add.html' );
	}
	
	/*评论管理*/
	public function information_comment_management(){
		$this->smarty->display ( 'information_comment_management.html' );
	}
	
	/*查询所有评论*/
	public function comment_log_list(){
		  //当前页
	      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	      //每页显示记录数
	      $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	      //排序条件（字段）
	      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'comment_id';
	      //升序还是降序
	      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
	      $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
	      $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
	      
	      if(isset($_GET['op'])&&$_GET['op'] == 'list_del'){
	          /* 删除一项或者多项 */
	          $del_id = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
	          $result = array('state'=>false, 'msg'=>"删除失败");
	          $this->db->where("comment_id in ($del_id)");
	          $re = $this->db->delete('cms_comment');  
	          if($re){
	              $result['state'] = true;
	              $result['msg'] 	= "删除成功";
	          }
	          echo  json_encode($result);exit;
	      }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){
	      	  //获取查询条件
	          $comment_id = isset($_GET['comment_id']) ? $_GET['comment_id'] : '';
	          $member_name = isset($_GET['member_name']) ? $_GET['member_name'] : '';
	          $comment_type = isset($_GET['comment_type']) ? $_GET['comment_type'] : '';
	          $comment_object_id = isset($_GET['comment_object_id']) ? $_GET['comment_object_id'] : '';
	          $comment_message = isset($_GET['comment_message']) ? $_GET['comment_message'] : '';
	        
	          $where = ' 1=1 ';
	          if($comment_id !=''){
	              $where .= " and comment_id like '%$comment_id%'";
	          }
	          if($member_name !=''){
	          	  $comment_member_id=$this->Information_model->get_member_id($member_name);
	          	  //print_r($comment_member_id);die;
	              $where .= " and comment_member_id like '%$comment_member_id%'";
	          }
	          if($comment_type !=''){
	              $where .= " and comment_type like '%$comment_type%'";
	          }
	     	 if($comment_object_id !=''){
	              $where .= " and comment_object_id like '%$comment_object_id%'";
	          }
	          if($comment_message !=''){
	              $where .= " and comment_message like '%$comment_message%'";
	          }
			 
	          $this->db->select('*');
	          $this->db->from('cms_comment');
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
	          header("Content-type: text/xml");
	          $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	          $xml .= "<rows>";
	          $xml .= "<page>$page</page>";
	          $xml .= "<total>$total</total>";
	          foreach($rows AS $key => $row){
	              //在数据中添加会员名称，类型名称字段
	              $row['member_truename']=$this->Information_model->get_member_name($row['comment_member_id']);
	              if($row['comment_type']==1){
	                  $row['comment_type_name']='文章';
	              }
	              if($row['comment_type']==2){
	                  $row['comment_type_name']='画报';
	              }
	              $xml .= "<row id='" . $row['comment_id'] . "'>";
	              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['comment_id'] . ")'><i class='fa fa-trash-o'></i>删除</a><a class='btn green' onclick='select_comment(" . $row['comment_id'] . ")'><i class='fa fa-trash-o'></i>#查看#</a>]]></cell>";
	              //评论编号
	              $xml .= "<cell><![CDATA[".$row['comment_id']."]]></cell>";
	              //评论作者
	              $xml .= "<cell><![CDATA[".$row['member_truename']."]]></cell>";
	              //评论类型
	              $xml .= "<cell><![CDATA[".$row['comment_type_name']."]]></cell>";
	              //对象编号
	              $xml .= "<cell><![CDATA[".$row['comment_object_id']."]]></cell>";
	              //评论内容
	              $xml .= "<cell><![CDATA[".$row['comment_message']."]]></cell>";
	              $xml .= "</row>";
	          }
	          $xml .= "</rows>";
	          echo $xml;
      }
    } 
	
	//根据ID号修改sort排序
	function update_sort_all(){
		$flag=isset($_POST['flag'])?$_POST['flag']:'';
		$id=isset($_POST['id'])?$_POST['id']:'';
		$sort=isset($_POST['sort'])?$_POST['sort']:'';
		//修改导航 排序字段
		if($flag=="update_nav_sort"){
		     $table="cms_navigation";
		     $id=array("key"=>'navigation_id',"value"=>$id);
		     $sort=array("key"=>'navigation_sort',"value"=>$sort);
		}
		//修改标签 排序字段
		if($flag=="update_tag_sort"){
		     $table="cms_tag";
		     $id=array("key"=>'tag_id',"value"=>$id);
		     $sort=array("key"=>'tag_sort',"value"=>$sort);
		}
		//修改导航标题
		if($flag=="update_nav_title"){
		    $table="cms_navigation";
		    $id=array("key"=>'navigation_id',"value"=>$id);
		    $sort=array("key"=>'navigation_title',"value"=>$sort);
		}
		//修改标签标题
		if($flag=="update_tag_title"){
		    $table="cms_tag";
		    $id=array("key"=>'tag_id',"value"=>$id);
		    $sort=array("key"=>'tag_name',"value"=>$sort);
		}
		//修改导航链接
		if($flag=="update_nav_link"){
		    $table="cms_navigation";
		    $id=array("key"=>'navigation_id',"value"=>$id);
		    $sort=array("key"=>'navigation_link',"value"=>$sort);
		}
		$update_res=$this->Information_model->update_article_sort($table,$id,$sort);
		if($update_res){
			echo json_encode("success");
		}
		exit;
	}
    
}
