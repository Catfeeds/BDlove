<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('Website_model');
        $this->load->model('mall_model');
    }
    
    /*图片设置*/
    public function pic_mall_set(){
        $this->common_function->shop_admin_priv("pic_setting");//权限
        if(!isset($_GET['op'])){
            $default_goods_image = $this->mall_model->get_system_value('default_goods_image');
            $default_store_logo = $this->mall_model->get_system_value('default_store_logo');
            $default_store_avatar = $this->mall_model->get_system_value('default_store_avatar');
            $this->smarty->assign('default_goods_image',$default_goods_image);
            $this->smarty->assign('default_store_avatar',$default_store_avatar);
            $this->smarty->assign('default_store_logo',$default_store_logo);
            $this->smarty->display ( 'pic_mall_set.html' );
        }elseif(isset($_GET['op'])&&$_GET['op']=='edit'){
            //print_r($_FILES);exit;
            $dir = './application/admin/views/images/';
            if(!empty($_FILES)){
                $flag = true;
                $status = false;
                foreach ($_FILES as $k=>$v){
                    if($v['error']!=0){
                        unset($_FILES[$k]);
                    }else{
                        if(stripos('image/png,image/jpeg,image/jpg,image/gif',trim($v['type']))===false){
                            $flag = false;
                        }
                    }
                     
                }
                if(!$flag){
                    $result['state'] = true;
                    $result['msg'] = '请检查上传二维码是不是图片格式';
                    echo json_encode($result);exit;
                }
                $upload = true;
                //print_r(file_exists($dir));exit;
                foreach ($_FILES as $k=>$v){
                    if (!file_exists($dir) || !is_writable($dir)) {
                         
                        if (!@mkdir($dir, 0755)) {
                             
                            if(!empty($v['name'])){
                                $aryStr = explode(".", $v['name']);
                                $new_name = $k.'.'.strtolower($aryStr[count($aryStr)-1]);
                                $old_img = $this->mall_model->get_system_value($k);
                                if(!empty($old_img)){
                                    @unlink($dir.$old_img);
                                }
                                if(!@move_uploaded_file($v['tmp_name'],$dir.$new_name)){
                                    //print_r($v['tmp_name']);exit;
                                    $upload = false;
                                }else{
                                    $re = $this->db->where('code',$k)->update('system_config',array('value'=>$new_name));
                                    if(!$re){
                                        $upload = false;
                                    }
                                }
                            }else{
                                $upload = false;
                            }
                        }else{
                            $upload = false;
                        }
                    }else{
                        if(!empty($v['name'])){
                            $aryStr = explode(".", $v['name']);
                            $new_name = $k.'.'.strtolower($aryStr[count($aryStr)-1]);
                            $old_img = $this->mall_model->get_system_value($k);
                            if(!empty($old_img)){
                                @unlink($dir.$old_img);
                            }
                            if(!@move_uploaded_file($v['tmp_name'],$dir.$new_name)){
                                $upload = false;
                            }else{
                                $re = $this->db->where('code',$k)->update('system_config',array('value'=>$new_name));
                                if(!$re){
                                    $upload = false;
                                }
                            }
                        }else{
                            $upload = false;
                        }
                    }
                     
                }
                if(!$upload){
                    $result['msg'] = '图片上传失败';
                    echo json_encode($result);exit;
                }else{
                    $this->common_function->shop_admin_log('图片设置','edit', '平台配置');
                    $result['msg'] = '图片设置成功';
                    $result['state'] = true;
                    echo json_encode($result);exit;
                }
            }else{
                $result['msg'] = '图片设置失败';
                $result['state'] = false;
                echo json_encode($result);exit;
            }
    
        }
    }
    
    /*水印管理*/
    public function pic_mall_watermark(){
        $this->common_function->shop_admin_priv("Watermark_setting");//权限
        $water_overlay = $this->mall_model->get_system_value('water_overlay');
        $water_text = $this->mall_model->get_system_value('water_text');
        $water_overlay = unserialize($water_overlay);
        $water_text = unserialize($water_text);
        $font_file = array();
        $font_dir = './system/fonts/' ;
        //print_r($template_dir);exit;
        $font_dir_        = @opendir($font_dir);
        while (($file = readdir($font_dir_))!==false)
        {
            if ($file != '.' && $file != '..'  && $file != '.svn' && $file != 'index.html')
            {
                $font_file[] = $file;
            }
        }
        @closedir($font_dir);
    
        $this->smarty->assign('font_file',$font_file);
        $this->smarty->assign('water_overlay',$water_overlay);
        $this->smarty->assign('water_text',$water_text);
        $this->smarty->display ( 'pic_mall_watermark.html' );
    }
    /*水印设置提交*/
    public function mall_watermark_submit(){
        $this->common_function->shop_admin_priv("Watermark_setting");//权限
        $image_pos = isset($_POST['image_pos']) ? trim($_POST['image_pos']) : 7;
        $wm_text = isset($_POST['wm_text']) ? trim($_POST['wm_text']) : '';
        $wm_text_size = isset($_POST['wm_text_size']) ? trim($_POST['wm_text_size']) : '';
        $wm_text_color = isset($_POST['wm_text_color']) ? trim($_POST['wm_text_color']) : '';
        $wm_text_font = isset($_POST['wm_text_font']) ? trim($_POST['wm_text_font']) : './system/fonts/texb.ttf';
        $wm_text_pos = isset($_POST['wm_text_pos']) ? trim($_POST['wm_text_pos']) : 7;
        $files = !empty($_FILES['image']['name']) ? $_FILES['image'] : '';
        //print_r($_FILES);print_r($files);exit;
        if($files){
            if(stripos('image/png,image/jpeg,image/jpg,image/gif',trim($files['type']))===false){
                $this->common_function->show_message('上传的水印文件不是图片格式');
            }
            $dir = './data/water/';
            if(!file_exists($dir) || !is_writable($dir)){
                if (!@mkdir($dir, 0755)) {
                    $this->common_function->show_message('图片上传失败请稍后重试');
                }
            }
            $aryStr = explode(".", $files['name']);
            $new_name = 'shop_water.'.strtolower($aryStr[count($aryStr)-1]);
            if(!@move_uploaded_file($files['tmp_name'],$dir.$new_name)){
                $this->common_function->show_message('图片上传失败请稍后重试');
            }else{
                $water_image =  $new_name;
            }
        }else{
            $water_image = '';
        }
        $config['overlay']['wm_overlay_path'] = $water_image ;//水印图片
        $config['text']['wm_font_size'] = $wm_text_size ;//水印文字大小
        $config['text']['wm_font_color'] = $wm_text_color ;//水印文字颜色
        $config['text']['wm_font_path'] = $wm_text_font ;//水印文字字体
        $config['text']['wm_text'] = $wm_text ;//水印文字
        $config['overlay']['wm_number_alignment'] = $image_pos;
        $config['text']['wm_number_alignment'] = $wm_text_pos;
        switch ($image_pos)
        {
            case 1:
                $config['overlay']['wm_vrt_alignment'] = 'top';//垂直位置
                $config['overlay']['wm_hor_alignment'] = 'left';//水平位置
                break;
            case 2:
                $config['overlay']['wm_vrt_alignment'] = 'top';
                $config['overlay']['wm_hor_alignment'] = 'center';
                break;
            case 3:
                $config['overlay']['wm_vrt_alignment'] = 'top';
                $config['overlay']['wm_hor_alignment'] = 'right';
                break;
            case 4:
                $config['overlay']['wm_vrt_alignment'] = 'middle';
                $config['overlay']['wm_hor_alignment'] = 'left';
                break;
            case 5:
                $config['overlay']['wm_vrt_alignment'] = 'middle';
                $config['overlay']['wm_hor_alignment'] = 'center';
                break;
            case 6:
                $config['overlay']['wm_vrt_alignment'] = 'middle';
                $config['overlay']['wm_hor_alignment'] = 'right';
                break;
            case 7:
                $config['overlay']['wm_vrt_alignment'] = 'bottom';
                $config['overlay']['wm_hor_alignment'] = 'left';
                break;
            case 8:
                $config['overlay']['wm_vrt_alignment'] = 'bottom';
                $config['overlay']['wm_hor_alignment'] = 'center';
                break;
            case 9:
                $config['overlay']['wm_vrt_alignment'] = 'bottom';
                $config['overlay']['wm_hor_alignment'] = 'right';
                break;
        }
        switch ($wm_text_pos)
        {
            case 1:
                $config['text']['wm_vrt_alignment'] = 'top';
                $config['text']['wm_hor_alignment'] = 'left';
                break;
            case 2:
                $config['text']['wm_vrt_alignment'] = 'top';
                $config['text']['wm_hor_alignment'] = 'center';
                break;
            case 3:
                $config['text']['wm_vrt_alignment'] = 'top';
                $config['text']['wm_hor_alignment'] = 'right';
                break;
            case 4:
                $config['text']['wm_vrt_alignment'] = 'middle';
                $config['text']['wm_hor_alignment'] = 'left';
                break;
            case 5:
                $config['text']['wm_vrt_alignment'] = 'middle';
                $config['text']['wm_hor_alignment'] = 'center';
                break;
            case 6:
                $config['text']['wm_vrt_alignment'] = 'middle';
                $config['text']['wm_hor_alignment'] = 'right';
                break;
            case 7:
                $config['text']['wm_vrt_alignment'] = 'bottom';
                $config['text']['wm_hor_alignment'] = 'left';
                break;
            case 8:
                $config['text']['wm_vrt_alignment'] = 'bottom';
                $config['text']['wm_hor_alignment'] = 'center';
                break;
            case 9:
                $config['text']['wm_vrt_alignment'] = 'bottom';
                $config['text']['wm_hor_alignment'] = 'right';
                break;
        }
        $water_overlay = serialize($config['overlay']);
        $water_text = serialize($config['text']);
        //print_r($water_overlay);exit;
        $this->db->where('code','water_overlay')->update('system_config',array('value'=>$water_overlay));
        $this->db->where('code','water_text')->update('system_config',array('value'=>$water_text));
        $links [0] ['text'] = '返回上一页';
        $links [0] ['href'] = 'javascript:history.go(-1)';
        $links [1] ['text'] = '水印管理';
        $links [1] ['href'] = 'mall_pic_watermark';
        $this->common_function->show_message('设置完成',1,$links);
    }
    
    
    
    
    
	/*文章分类*/
	public function website_article_classify(){
	    $this->common_function->shop_admin_priv("Articleclass_setting");//权限
	    $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	    $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	    $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'ac_sort';
	    $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
	    $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
	    $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
	     
	    if(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){
	         
	        $this->db->select('*');
	        $this->db->from('shop_article_class');
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
	            $xml .= "<row id='" . $row['ac_id'] . "'>";
	            $xml .= "<cell><![CDATA[<span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                     <ul>
                        <li><a onclick=edit(". $row['ac_id'] .")>编辑分类信息</a></li>
	                    <li><a onclick=edits(". $row['ac_id'] .")>新增下级分类</a></li>";
                $xml .= "</ul></span>]]></cell>";
	            $xml .= "<cell><![CDATA[<input type='text' style='width:60px' id='".$row['ac_id']."'  onblur='update_sort(" . $row['ac_id'] . ")' value='".$row['ac_sort']."'>]]></cell>";
	            $xml .= "<cell><![CDATA[<input type='text' style='width:150px' id='title".$row['ac_id']."'  onblur='update_title(" . $row['ac_id'] . ")' value='".$row['ac_name']."'>]]></cell>";
	            $xml .= "</row>";
	        }
	        $xml .= "</rows>";
	        echo $xml;
	        exit;
	    }
		$this->smarty->display ( 'website_article_classify.html' );
    }
	
	/*文章分类——新增*/
	public function website_article_classify_add(){
	    $this->common_function->shop_admin_priv("Articleclass_setting");//权限
	    if($this->input->is_ajax_request()){
	        unset($_POST['form_submit']);
	        $ac_parent_id = isset($_POST['ac_parent_id']) ? $_POST['ac_parent_id'] : "";
	        $ac_name = isset($_POST['ac_name']) ? $_POST['ac_name'] : "";
	        $ac_sort = isset($_POST['ac_sort']) ? $_POST['ac_sort'] : "";
	        $data=array(
	            'ac_name' =>$ac_name,
	            'ac_sort'=>$ac_sort,
	        );
	        if($ac_parent_id==0){
	            $data['ac_parent_id']=0;
	        }else{
	            $data['ac_parent_id']=$ac_parent_id;
	        }
	        
	        $class_add=$this->db->insert('shop_article_class',$data);
	        if($class_add){
	            echo json_encode("success");
	        }else{
	            echo json_encode("false");
	        }
	        exit;
	    }
	    //查询文章分类
	    $Article_class=$this->Website_model->get_article_class();
	    $this->smarty->assign("Artclass",$Article_class);
		$this->smarty->display ( 'website_article_classify_add.html' );
    }
	
	/*文章分类——编辑*/
    public  function website_article_classify_edit(){
        $this->common_function->shop_admin_priv("Articleclass_setting");//权限
        if($this->input->is_ajax_request()){
            unset($_POST['form_submit']);
            $ac_id = isset($_GET['id'])?$_GET['id']:"";
           
           if($ac_id!=""){
               $article_edit=$this->db->update("shop_article_class",$_POST,array('ac_id'=>$ac_id));
               if($article_edit){
                   echo json_encode("success");
               }else{
                   echo json_encode("false");
               }
           }else{
               echo json_encode("false");
           }
            exit();
        }
        $ac_id = isset($_GET['id'])?$_GET['id']:"";
        $article_info = $this->Website_model->get_article_class_info($ac_id);
        $this->smarty->assign("article_info",$article_info);
        if(isset($_GET['op'])&&$_GET['op'] == 'edit_class'){
            $this->smarty->display ( 'website_article_classify_edit.html' );
        }elseif(isset($_GET['op'])&&$_GET['op'] == 'add_class'){
            $Article_class=$this->Website_model->get_article_class();
            $this->smarty->assign("Artclass",$Article_class);
            $this->smarty->display ( 'website_article_classify_edits.html' );
        }
    }
    
	/*文章管理*/
	public function website_article_management(){
	    $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	    $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	    $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'article_sort';
	    $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
	    $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
	    $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
	    if(isset($_GET['op'])&&$_GET['op'] == 'list_del'){
	        $this->common_function->shop_admin_priv("Article_del");//权限
	        /* 删除一项或者多项 */
	        $del_id = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
	        $result = array('state'=>false, 'msg'=>"删除失败");
	        //删除相关图片
	        if(strpos(",",$del_id)>=0){
	            $delid=explode(",",$del_id);
	            foreach ($delid as $key=>$val){
	                $img = $this->db->select('article_pic')->where('article_id',$val)->get('shop_article')->row('article_pic');
	                @unlink(ROOTPATH.$img);
	            }
	        }else{
	            $img = $this->db->select('article_pic')->where('article_id',$val)->get('shop_article')->row('article_pic');
	            @unlink(ROOTPATH.$img);
	        }
	        $this->db->where("article_id in ($del_id)");
	        $re = $this->db->delete('shop_article');
	        if($re){
	            $result['state'] = true;
	            $result['msg'] 	= "删除成功";
	        }
	        echo  json_encode($result);exit;
	    }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){
	        $this->common_function->shop_admin_priv("Article_management");//权限
	        $this->db->select('*');
	        $this->db->from('shop_article');
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
	        foreach($rows AS $key => &$row){
	               //在数据中添加类名称字段
    	            $row['ac_name']=$this->Website_model->get_class_name($row['ac_id']);
    	            if($row['article_position']=="1"){
    	                  $article_position="商城前台";
    	            }elseif($row['article_position']=="2"){
    	                  $article_position="买家中心";
    	            }elseif($row['article_position']=="3"){
    	                  $article_position="商家中心";
    	            }else{
    	                  $article_position="全站";
    	            }
    	            
    	            if($row['ac_name']=="商城公告"){
    	                $position="[$article_position]";
    	            }else{
    	                $position="";
    	            }
    	            if($row['article_show']=='1'){
    	                $article_show='<div style="text-align: center; width: 50px;">
            									<span class="yes">
            									<i class="fa fa-check-circle"></i>
            										是
            									</span>
            									</div>';
    	            }else{
    	                $article_show='<div style="text-align: center; width: 50px;">
        										<span class="no">
        										<i class="fa fa-ban"></i>
        										否
        										</span>
        										</div>';
	               }
	     
	            $xml .= "<row id='" . $row['article_id'] . "'>";
	            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['article_id'] . ")'><i class='fa fa-trash-o'></i>删除</a><a class='btn blue' onclick='fg_bj(" . $row['article_id'] . ")'><i class='fa fa-pencil-square-o'></i></i>编辑</a>]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['article_sort']."]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['article_title']."]]></cell>";
	            $xml .= "<cell><![CDATA[".$row['ac_name'].$position."]]></cell>";
	            $xml .= "<cell><![CDATA[".$article_show."]]></cell>";
	            $xml .= "<cell><![CDATA[".date('Y-m-d H:i:s',$row['article_time'])."]]></cell>";
	            $xml .= "</row>";
	        }
	        $xml .= "</rows>";
	        echo $xml;
	        exit;
	    }
		$this->smarty->display ( 'website_article_management.html' );
    }
	
	/*文章管理——新增*/
	public function website_article_management_add(){
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
	            $savePath = ROOTPATH . 'data/shop/article_pic/'; // 设置上传路径
	            $str = date ( 'YmdHis' ) . uniqid ()."_art"; // 以时间来命名上传的文件
	            $file_name = $str . "." . $file_type; // 是否上传成功
	            if (! copy( $tmp_file, $savePath . $file_name )) {
	                $return = array(
	                    'state'=>'file_copy_false',
	                    'msg'=>"图片上传失败，请稍后重新上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $_POST['text'] = 'data/shop/article_pic/'.$file_name;
             }
             //新增文章
			$data=array(
			    'ac_id'=>$_POST['ac_id'],
			    'article_position' =>$_POST['article_position'],
			    'article_pic'=>$_POST['text'],
			    'article_url' =>$_POST['article_url'],
			    'article_show' =>$_POST['article_show'],
			    'article_sort' =>$_POST['article_sort'],
			    'article_title'=>$_POST['article_title'],
			    'article_content' =>$_POST['content'],
			    'article_time'=>time()
			);
			
			 $article_add=$this->db->insert('shop_article',$data);
	    	if($article_add){
	    		echo json_encode("success");
	    	}else{
	    		echo json_encode("false");
	    	}
	    	exit;
	       
		}
	    //查询文章分类
	    $Article_class=$this->Website_model->get_article_class();
	    $this->smarty->assign("Artclass",$Article_class);
		$this->smarty->display ( 'website_article_management_add.html' );
    }
	
	/*文章管理——编辑*/
	public function website_article_management_edit($id=""){
	    $this->common_function->shop_admin_priv("Article_edit");//权限
	    if($this->input->is_ajax_request()){
	        $article_id=isset($_GET['number'])?$_GET['number']:'';
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
	            $savePath = ROOTPATH . 'data/shop/article_pic/'; // 设置上传路径
	            $str = date ( 'YmdHis' ) . uniqid ()."_art"; // 以时间来命名上传的文件
	            $file_name = $str . "." . $file_type; // 是否上传成功
	            if (! copy( $tmp_file, $savePath . $file_name )) {
	                $return = array(
	                    'state'=>'file_copy_false',
	                    'msg'=>"图片上传失败，请稍后重新上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $_POST['text'] = 'data/shop/article_pic/'.$file_name;
             }
             //编辑文章
			$data=array(
			    'ac_id'=>$_POST['ac_id'],
			    'article_position' =>$_POST['article_position'],
			    'article_pic'=>$_POST['text'],
			    'article_url' =>$_POST['article_url'],
			    'article_show' =>$_POST['article_show'],
			    'article_sort' =>$_POST['article_sort'],
			    'article_title'=>$_POST['article_title'],
			    'article_content' =>$_POST['content'],
			    'article_time'=>time()
			);
			if($article_id!=""){
			    $article_edit=$this->db->update("shop_article",$data,array('article_id'=>$article_id));
			    if($article_edit){
			         echo json_encode("success");
			    }else{
			        echo json_encode("false");
			    }
			}else{
	    		echo json_encode("false");
	    	}
	    	exit();
		}
	    //查找当前id所对应的文章信息
        $article_info=$this->Website_model->get_article_info($id);
        //查找所有文章分类
        $Artclass=$this->Website_model->get_article_class();
        $this->smarty->assign("Artclass",$Artclass);
        $this->smarty->assign("article_info",$article_info);
		$this->smarty->display ( 'website_article_management_edit.html' );
    }
	
	

	
	/*广告管理*/
	public function website_ad_management(){
	    $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
	    $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
	    $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'ap_id';
	    $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
	    $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
	    $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
	    if(isset($_GET['op'])&&$_GET['op'] == 'list_del'){
	        $del_id = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
	        $result = array('state'=>false, 'msg'=>"删除失败");
	        //删除相关图片
	        if(strpos(",",$del_id)>=0){
	            $delid=explode(",",$del_id);
	            foreach ($delid as $key=>$val){
	                $img = $this->db->select('default_content')->where('ap_id',$val)->get('adv_position')->row('default_content');
	                @unlink(ROOTPATH.$img);
	            }
	        }else{
	            $img = $this->db->select('default_content')->where('ap_id',$del_id)->get('adv_position')->row('default_content');
	            @unlink(ROOTPATH.$img);
	        }
	        /* 删除一项或者多项 */
	        $this->db->where("ap_id in ($del_id)");
	        $re = $this->db->delete('adv_position');
	        if($re){
	            $result['state'] = true;
	            $result['msg'] 	= "删除成功";
	        }
	        echo  json_encode($result);exit;
	    }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){
	    
	        $this->db->select('*');
	        $this->db->from('adv_position');
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
	        foreach($rows AS $key => &$row){
	            //广告类别
	            if($row['ap_class']=='0'){
	                $row_ap_class="图片";
	            }elseif($row['ap_class']=='1'){
	                $row_ap_class="文字";
	            }elseif($row['ap_class']=='2'){
	                $row_ap_class="幻灯片";
	            }else{
	                $row_ap_class="Flash";
	            }
	            //广告展示方式
	            if($row['ap_display']=='0'){
	                $row_ap_display="幻灯片";
	            }elseif($row['ap_display']=='1'){
	                $row_ap_display="多广告展示";
	            }else{
	                $row_ap_display="单广告展示";
	            }
	            //广告位是否启用
	            if($row['is_use']=='1'){
	                 $row_is_use='<div style="text-align: center; width: 50px;">
            									<span class="yes">
            									<i class="fa fa-check-circle"></i>
            										是
            									</span>
            									</div>';
	            }else{
	                 $row_is_use='<div style="text-align: center; width: 50px;">
        										<span class="no">
        										<i class="fa fa-ban"></i>
        										否
        										</span>
        										</div>';
	            }
	            
	          $xml .= "<row id='" . $row['ap_id'] . "'>";
              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['ap_id'] . ")' <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                         <ul>
    		                <li><a onclick=fg_glgg(" .$row['ap_id'] . ")>管理广告</a></li>
    		                <li><a onclick=update_ad_management(". $row['ap_id'] .")>编辑属性</a></li>
    	                    <li><a onclick=call_code(". $row['ap_id'] .")>#代码调用#</a></li>";
              $xml .= "</ul></span>]]></cell>";
              $xml .= "<cell><![CDATA[".$row['ap_name']."]]></cell>";
              $xml .= "<cell><![CDATA[".$row_ap_class."]]></cell>";
              $xml .= "<cell><![CDATA[".$row_ap_display."]]></cell>";
              $xml .= "<cell><![CDATA[".$row['ap_width']."]]></cell>";
              $xml .= "<cell><![CDATA[".$row['ap_height']."]]></cell>";
              $xml .= "<cell><![CDATA[".$row['adv_num']."]]></cell>";
              $xml .= "<cell><![CDATA[".$row_is_use."]]></cell>";
              $xml .= "</row>";
	        }
	        $xml .= "</rows>";
	        echo $xml;
	        exit;
	    }
		$this->smarty->display ( 'website_ad_management.html' );
    }
	
	/*广告管理——广告位列表--添加广告位*/
	public function website_ad_management_editadd(){
	    if($this->input->is_ajax_request()){
	     
	        //LOGO图片处理
	        if (!empty ( $_FILES ['default_pic'] ['name'] )) {
	            //临时文件名
	            $tmp_file = $_FILES ['default_pic'] ['tmp_name'];
	    
	            //获取文件后缀名
	            $file_types = explode ( ".", $_FILES ['default_pic'] ['name'] );
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
	            $savePath = ROOTPATH . 'data/shop/adv_pic/'; // 设置上传路径
	            $str = date ( 'YmdHis' ) . uniqid ()."_adv"; // 以时间来命名上传的文件
	            $file_name = $str . "." . $file_type; // 是否上传成功
	            if (! copy( $tmp_file, $savePath . $file_name )) {
	                $return = array(
	                    'state'=>'file_copy_false',
	                    'msg'=>"图片上传失败，请稍后重新上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $_POST['textfield'] = 'data/shop/adv_pic/'.$file_name;
	        }
	        //新增广告位
	        $data=array(
	            'ap_name'=>$_POST['ap_name'],
	            'ap_class' =>$_POST['ap_class'],
	            'ap_display' =>$_POST['ap_display'],
	            'is_use' =>$_POST['is_use'],
	            'ap_width'=>$_POST['ap_width'],
	            'ap_height' =>$_POST['ap_height'],
	            'default_content'=>$_POST['textfield'],
	        );
	        	
	        $adv=$this->db->insert('adv_position',$data);
	        if($adv){
	            
	            echo json_encode("success");
	        }else{
	            echo json_encode("false");
	        }
	        exit;
	    
	    }
		$this->smarty->display ( 'website_ad_management_editadd.html' );
    }
	    
	/*广告管理——设置--管理广告的编辑*/
	public function website_ad_management_set_edit(){
	    $ap_id=isset($_GET['ap_id'])?$_GET['ap_id']:"";
	    $adv_position=$this->Website_model->get_adv_position($ap_id);
	    $ap_name=$adv_position['ap_name'];
	    $this->smarty->assign("ap_id",$ap_id);
	    $this->smarty->assign("ap_name",$ap_name);
		$this->smarty->display ( 'website_ad_management_set_edit.html' );
		
    }
    public function website_ad_management_set_select(){
        $ap_id=isset($_GET['ap_id'])?$_GET['ap_id']:"";
        $adv_position=$this->Website_model->get_adv_position($ap_id);
        $ap_name=$adv_position['ap_name'];
        $ap_class=$adv_position['ap_class'];
        if($ap_class=="0"){
            $row_ap_class="图片";
        }elseif($ap_class=="1"){
            $row_ap_class="文字";
        }elseif($ap_class=="2"){
            $row_ap_class="幻灯片";
        }else{
            $row_ap_class="Flash";
        }
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'adv_id';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
        
        if(isset($_GET['op'])&&$_GET['op'] == 'list_del'){
            $del_id = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
            $ap_id=isset($_GET['ap_id'])?$_GET['ap_id']:"";
            $result = array('state'=>false, 'msg'=>"删除失败");
            //删除相关图片
            if(strpos(",",$del_id)>=0){
                $delid=explode(",",$del_id);
                foreach ($delid as $key=>$val){
                    $img_info= $this->db->select('adv_content')->where('adv_id',$val)->get('adv')->row_array();
                    $imgs=unserialize($img_info['adv_content']);
                    $img=$imgs['adv_slide_pic'];
                    @unlink(ROOTPATH.$img);
                }
            }else{
                $img_info= $this->db->select('adv_content')->where('adv_id',$val)->get('adv')->row_array();
                $imgs=unserialize($img_info['adv_content']);
                $img=$imgs['adv_slide_pic'];
                @unlink(ROOTPATH.$img);
                @unlink(ROOTPATH.$img);
            }
            /* 删除一项或者多项 */
            $this->db->where("adv_id in ($del_id)");
            $re = $this->db->delete('adv');
            if($re){
                /*删除成功后减少相应广告数*/
                if(strpos(",",$del_id)>=0){
                    $del_id=explode(",",$del_id);
                    $num=count($del_id);
                }else{
                    $num=1;
                }
                $this->db->query("update jk_adv_position set adv_num=adv_num-$num where ap_id=$ap_id");
                $result['state'] = true;
                $result['msg'] 	= "删除成功";
            }
            echo  json_encode($result);
            exit();
        }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){
             
            $this->db->select('*');
            $this->db->where('ap_id',$ap_id);
            $this->db->from('adv');
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
            foreach($rows AS $key => &$row){
                $xml .= "<row id='" . $row['adv_id'] . "'>";
                $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['adv_id'] . ")'><i class='fa fa-trash-o'></i>删除</a><a class='btn blue' onclick='fg_bj(" . $row['adv_id'] . ")'><i class='fa fa-pencil-square-o'></i></i>编辑</a>]]></cell>";
                $xml .= "<cell><![CDATA[".$row['adv_title']."]]></cell>";
                $xml .= "<cell><![CDATA[". $ap_name."]]></cell>";
                $xml .= "<cell><![CDATA[".$row_ap_class."]]></cell>";
                $xml .= "<cell><![CDATA[".date('Y-m-d',$row['adv_start_date'])."]]></cell>";
                $xml .= "<cell><![CDATA[".date('Y-m-d',$row['adv_end_date'])."]]></cell>";
                $xml .= "</row>";
            }
            $xml .= "</rows>";
            echo $xml;
            exit();
        }
    }
	
	/*广告管理——设置--管理广告中的新增数据*/
	public function website_ad_management_set_add(){
	    $ap_id=isset($_GET['ap_id'])?$_GET['ap_id']:'';
	    if($this->input->is_ajax_request()){
	        //LOGO图片处理
	        if (!empty ( $_FILES ['adv_pic'] ['name'] )) {
	            //临时文件名
	            $tmp_file = $_FILES ['adv_pic'] ['tmp_name'];
	            //获取文件后缀名
	            $file_types = explode ( ".", $_FILES ['adv_pic'] ['name'] );
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
	            $savePath = ROOTPATH . 'data/shop/adv_pic/'; // 设置上传路径
	            $str = date ( 'YmdHis' ) . uniqid ()."_ad"; // 以时间来命名上传的文件
	            $file_name = $str . "." . $file_type; // 是否上传成功
	            if (! copy( $tmp_file, $savePath . $file_name )) {
	                $return = array(
	                    'state'=>'file_copy_false',
	                    'msg'=>"图片上传失败，请稍后重新上传"
	                );
	                echo json_encode($return);
	                exit();
	            }
	            $_POST['textfield'] = 'data/shop/adv_pic/'.$file_name;
	        }
	        //新增广告
	        $data=array(
	            'ap_id'=>$_POST['ap_id'],
	            'adv_title' =>$_POST['adv_name'],
	            'adv_start_date' =>strtotime($_POST['adv_start_time']),
	            'adv_end_date' =>strtotime($_POST['adv_end_time']),
	            'adv_content' =>serialize(array("adv_slide_pic"=>$_POST['textfield'],"adv_slide_url"=>$_POST['adv_pic_url'])) 
	        );
	    
	        $adv=$this->db->insert('adv',$data);
	        $apid=$_POST['ap_id'];
	        if($adv){
	            /*增加成功后减少相应广告数*/
	            $this->db->query("update jk_adv_position set adv_num=adv_num+1 where ap_id=$apid");
	            echo json_encode("success");
	        }else{
	            echo json_encode("false");
	        }
	        exit();
	         
	    }
	    $adv_position_name=$this->Website_model->get_adv_position_name();
	    $this->smarty->assign("adv_position_name",$adv_position_name);
	    $this->smarty->assign("ap_id",$ap_id);
		$this->smarty->display ('website_ad_management_set_add.html');
    }
   
    /*广告管理——设置--管理广告中的编辑*/
    public function website_ad_management_set_edit_edit(){
       $adv_id=isset($_GET['adv_id'])?$_GET['adv_id']:"";
       //根据advid查询所有相关信息
       $adv=$this->Website_model->get_adv_info($adv_id);
       //查询所有广告位
       $shop_position_name=$this->Website_model->get_adv_position_name();
       $this->smarty->assign("adv",$adv);
       $this->smarty->assign("shop_position_name",$shop_position_name);
       $this->smarty->display ( 'website_ad_management_set_edit_edit.html' );
    }
    
    /*广告管理--广告列表中的更新广告*/
    public function website_ad_management_set_adv_update(){
            $adv_id=isset($_GET['adv_id'])?$_GET['adv_id']:"";
            //LOGO图片处理
            if (!empty ( $_FILES ['adv_pic'] ['name'] )) {
                //临时文件名
                $tmp_file = $_FILES ['adv_pic'] ['tmp_name'];
                //获取文件后缀名
                $file_types = explode ( ".", $_FILES ['adv_pic'] ['name'] );
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
                $savePath = ROOTPATH . 'data/shop/adv_pic/'; // 设置上传路径
                $str = date ( 'YmdHis' ) . uniqid ()."_ad"; // 以时间来命名上传的文件
                $file_name = $str . "." . $file_type; // 是否上传成功
                if (! copy( $tmp_file, $savePath . $file_name )) {
                    $return = array(
                        'state'=>'file_copy_false',
                        'msg'=>"图片上传失败，请稍后重新上传"
                    );
                    echo json_encode($return);
                    exit();
                }
                $_POST['textfield'] = 'data/shop/adv_pic/'.$file_name;
            }
            //更新
            $data=array(
                'adv_title' =>$_POST['adv_name'],
                'adv_start_date' =>strtotime($_POST['adv_start_time']),
                'adv_end_date' =>strtotime($_POST['adv_end_time']),
                'adv_content' =>serialize(array("adv_slide_pic"=>$_POST['textfield'],"adv_slide_url"=>$_POST['adv_pic_url']))
            );
            if($adv_id!=""){
                $adv=$this->db->update("adv",$data,array('adv_id'=>$adv_id));
                if($adv){
                    echo json_encode("success");
                }else{
                    echo json_encode("false");
                }
            }else{
                echo json_encode("false");
            }
            exit();
    }
    
    /*广告管理—— 设置 ---编辑属性*/
    public function website_ad_management_update(){
        $ap_id=isset($_GET['ap_id'])?$_GET['ap_id']:"";
        $shop_position=$this->Website_model->get_adv_position($ap_id);
        if($this->input->is_ajax_request()){
            $apid=isset($_GET['apid'])?$_GET['apid']:"";
            //LOGO图片处理
            if (!empty ( $_FILES ['default_pic'] ['name'] )) {
                //临时文件名
                $tmp_file = $_FILES ['default_pic'] ['tmp_name'];
                 
                //获取文件后缀名
                $file_types = explode ( ".", $_FILES ['default_pic'] ['name'] );
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
                $savePath = ROOTPATH . 'data/shop/adv_pic/'; // 设置上传路径
                $str = date ( 'YmdHis' ) . uniqid ()."_adv"; // 以时间来命名上传的文件
                $file_name = $str . "." . $file_type; // 是否上传成功
                if (! copy( $tmp_file, $savePath . $file_name )) {
                    $return = array(
                        'state'=>'file_copy_false',
                        'msg'=>"图片上传失败，请稍后重新上传"
                    );
                    echo json_encode($return);
                    exit();
                }
                $_POST['textfield'] = 'data/shop/adv_pic/'.$file_name;
            }
            //更新广告位
            $data=array(
                'ap_name'=>$_POST['ap_name'],
                'ap_display' =>$_POST['ap_display'],
                'is_use' =>$_POST['is_use'],
                'ap_width'=>$_POST['ap_width'],
                'ap_height' =>$_POST['ap_height'],
                'default_content'=>$_POST['textfield']
            );
            if($apid!=""){
                $adv=$this->db->update("adv_position",$data,array('ap_id'=>$apid));
                if($adv){
                    echo json_encode("success");
                }else{
                    echo json_encode("false");
                }
            }else{
                echo json_encode("false");
            }
            exit();
        }
        $this->smarty->assign("shop_position",$shop_position);
        $this->smarty->display ('website_ad_management_update.html');
    }
    
    /*修改排序*/
	function update_sort_all(){
		$flag=isset($_POST['flag'])?$_POST['flag']:'';
		$id=isset($_POST['id'])?$_POST['id']:'';
		$sort=isset($_POST['sort'])?$_POST['sort']:'';
		//修改文章分类 排序字段
		if($flag=="website_article_sort"){
		     $table="shop_article_class";
		     $id=array("key"=>'ac_id',"value"=>$id);
		     $sort=array("key"=>'ac_sort',"value"=>$sort);
		}
		//修改文章分类 名称字段
		if($flag=="update_class_name"){
		    $table="shop_article_class";
		    $id=array("key"=>'ac_id',"value"=>$id);
		    $sort=array("key"=>'ac_name',"value"=>$sort);
		}
		
		//修改文章 排序字段
		if($flag=="website_article"){
		    $table="shop_article";
		    $id=array("key"=>'article_id',"value"=>$id);
		    $sort=array("key"=>'article_sort',"value"=>$sort);
		}
		//修改导航 排序字段
		if($flag=="website_nav_sort"){
		    $table="shop_navigation";
		    $id=array("key"=>'nav_id',"value"=>$id);
		    $sort=array("key"=>'nav_sort',"value"=>$sort);
		}
        
		$update_res=$this->Website_model->update_article_sort($table,$id,$sort);
		if($update_res){
			echo json_encode("success");
		}
		exit;
	}
}
