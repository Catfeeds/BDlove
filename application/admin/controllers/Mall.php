<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mall extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('mall_model');
        $this->load->model('web_model');
        $this->load->library('common_function');
    }
	/*商城设置*/
	public function mall_set(){
	    if(!isset($_GET['op'])){
	        $this->common_function->shop_admin_priv("mall_set");//权限
	        $site_logo = $this->mall_model->get_system_value('site_logo');
	        $member_logo = $this->mall_model->get_system_value('member_logo');
	        $seller_center_logo = $this->mall_model->get_system_value('seller_center_logo');
	        $site_phone = $this->mall_model->get_system_value('site_phone');
	        $site_email = $this->mall_model->get_system_value('site_email');
	        $site_logo = empty($site_logo)?'err_img.jpg':$site_logo;
	        $member_logo = empty($member_logo)?'err_img.jpg':$member_logo;
	        $seller_center_logo = empty($seller_center_logo)?'err_img.jpg':$seller_center_logo;
	        $this->smarty->assign('site_logo',$site_logo);
	        $this->smarty->assign('member_logo',$member_logo);
	        $this->smarty->assign('seller_center_logo',$seller_center_logo);
	        $this->smarty->assign('site_phone',$site_phone);
	        $this->smarty->assign('site_email',$site_email);
	        $this->smarty->display ( 'mall_set.html' );
	    }elseif(isset($_GET['op'])&&$_GET['op']=='edit'){
        	  $this->common_function->shop_admin_priv("mall_set");//权限
              $dir = './data/images/';
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
                  }
              }
              $site_phone = isset($_POST['site_phone']) ? trim($_POST['site_phone']) : '';
              $site_email = isset($_POST['site_email']) ? trim($_POST['site_email']) : '';
              $list_data = true;
              if(!empty($site_phone)){
                  $site_phone = str_replace('，',',',$site_phone);
                  $list_data = $this->db->where('code','site_phone')->update('system_config',array('value'=>$site_phone));
              }
              if(!empty($site_email)){
                  $list_data = $this->db->where('code','site_email')->update('system_config',array('value'=>$site_email));
              }
                //print_r($list_data);exit;
                if($list_data){
                    $this->common_function->shop_admin_log('商城设置','edit', '平台配置');
                    $result['state'] = true;
                    $result['msg'] 	= "修改成功";
                    echo json_encode($result);
                }else{
                    $result['state'] = false;
                    $result['msg'] 	= "修改失败";
                    echo json_encode($result);
                }
	    }
	}
	/*商城设置*/
	public function mall_set_prevent(){
        $this->common_function->shop_admin_priv("mall_set");//权限
		$this->smarty->display ( 'mall_set_prevent.html' );
	}
	/*图片设置*/
	public function mall_pic_set(){
	    if(!isset($_GET['op'])){
	        $this->common_function->shop_admin_priv("mall_pic_set");//权限
	        $default_goods_image = $this->mall_model->get_system_value('default_goods_image');
	        $default_store_logo = $this->mall_model->get_system_value('default_store_logo');
	        $default_store_avatar = $this->mall_model->get_system_value('default_store_avatar');
	        
	        $default_tb_image = $this->mall_model->get_system_value('default_tb_image');
	        $default_tm_image = $this->mall_model->get_system_value('default_tm_image');
	        $default_jd_image = $this->mall_model->get_system_value('default_jd_image');
	        $default_guide_logo = $this->mall_model->get_system_value('default_guide_logo');
	        $this->smarty->assign('default_guide_logo',$default_guide_logo);
	        $this->smarty->assign('default_tb_image',$default_tb_image);
	        $this->smarty->assign('default_tm_image',$default_tm_image);
	        $this->smarty->assign('default_jd_image',$default_jd_image);
	        
	        
	        $this->smarty->assign('default_goods_image',$default_goods_image);
	        $this->smarty->assign('default_store_avatar',$default_store_avatar);
	        $this->smarty->assign('default_store_logo',$default_store_logo);
	        $this->smarty->display ( 'mall_pic_set.html' );
	    }elseif(isset($_GET['op'])&&$_GET['op']=='edit'){
	        //print_r($_FILES);exit;
	        $this->common_function->shop_admin_priv("mall_pic_set");//权限
	        $dir = './data/images/';
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
	                                $img_ids = $this->db->select('id')->where("code = '{$k}' ")->get('system_config')->row('id');
	                                if($img_ids){
	                                    $re = $this->db->where('code',$k)->update('system_config',array('value'=>$new_name));
	                                }else{
	                                    $re = $this->db->insert('system_config',array("code"=>$k,'value'=>$new_name));
	                                }
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
	                            $img_ids = $this->db->select('id')->where("code = '{$k}' ")->get('system_config')->row('id');
	                            if($img_ids){
	                                $re = $this->db->where('code',$k)->update('system_config',array('value'=>$new_name));
	                            }else{
	                                $re = $this->db->insert('system_config',array("code"=>$k,'value'=>$new_name));
	                            }
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
	public function mall_pic_watermark(){
	    
	    $this->common_function->shop_admin_priv("Watermark_setting");//权限
	    $water_overlay = $this->mall_model->get_system_value('water_overlay');
	    $water_text = $this->mall_model->get_system_value('water_text');
	    $water_state = $this->mall_model->get_system_value('water_state');
	    $water_overlay = unserialize($water_overlay);
	    $water_text = unserialize($water_text);
	    $font_file = array();
	    $font_dir = './system/fonts/' ;
	    //print_r($water_overlay); print_r($water_text);exit;
	    $font_dir_        = @opendir($font_dir);
	    while (($file = readdir($font_dir_))!==false)
	    {
	        if ($file != '.' && $file != '..'  && $file != '.svn' && $file != 'index.html')
	        {
	            $font_file[] = $file;
	        }
	    }
	    @closedir($font_dir);
	   
	    $this->smarty->assign('water_state',$water_state);
	    $this->smarty->assign('font_file',$font_file);
	    $this->smarty->assign('water_overlay',$water_overlay);
	    $this->smarty->assign('water_text',$water_text);
		$this->smarty->display ( 'mall_pic_watermark.html' );
	}
	/*水印设置提交*/
	public function mall_watermark_submit(){
	    //print_r($_POST);exit;
	    $this->common_function->shop_admin_priv("Watermark_setting");//权限
	    $wm_state = isset($_POST['qq_isuse']) ? trim($_POST['qq_isuse']) : 1;
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
	        $this->common_function->has_mark(ROOTPATH.'data/images/2016092411543457e5f8fa1e08c.jpg');//权限
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
	    $this->db->where('code','water_state')->update('system_config',array('value'=>$wm_state));
	    $this->db->where('code','water_overlay')->update('system_config',array('value'=>$water_overlay));
	    $this->db->where('code','water_text')->update('system_config',array('value'=>$water_text));
	    $links [0] ['text'] = '返回上一页';
	    $links [0] ['href'] = 'javascript:history.go(-1)';
	    $links [1] ['text'] = '水印管理';
	    $links [1] ['href'] = 'mall_pic_watermark';
	    $this->common_function->show_message('设置完成',1,$links);
	}
	/*搜索设置*/
	public function mall_search(){
	    $this->common_function->shop_admin_priv("mall_search");//权限
	    if(!isset($_GET['op'])){
	        $default_hot_search = $this->mall_model->get_system_value('default_hot_search');
	        $this->smarty->assign('default_hot_search',$default_hot_search);
	        $this->smarty->display ( 'mall_search.html' );
	    }elseif (isset($_GET['op'])&&$_GET['op']=='edit'){
	        $hot_search = isset($_POST['hot_search']) ? trim($_POST['hot_search']) : '';
	        if(!empty($hot_search)){
	            $hot_search = str_replace('，',',',$hot_search);
	            $this->db->where('code','default_hot_search')->update('system_config',array('value'=>$hot_search));
	            $this->common_function->shop_admin_log('搜索设置','edit', '平台配置');
	            $result['msg'] = '设置成功';
	            $result['state'] = true;
	            echo json_encode($result);exit;
	        }
	    }
		
	}
	/*seo设置*/
	public function mall_seo_set(){
	    $this->common_function->shop_admin_priv("website_setting");//权限
	    if(!isset($_GET['op'])){
	        $index_seo = $this->mall_model->get_system_value('index_seo');
	        $group_seo = $this->mall_model->get_system_value('group_seo');
	        $group_content_seo = $this->mall_model->get_system_value('group_content_seo');
	        $brand_list_seo = $this->mall_model->get_system_value('brand_list_seo');
	        $product_seo = $this->mall_model->get_system_value('product_seo');
	        $brand_seo = $this->mall_model->get_system_value('brand_seo');
	        $goods_cate_seo = $this->mall_model->get_system_value('cate_seo');
	        //print_r($index_seo);exit;
	        $goods_cate_seo = unserialize($goods_cate_seo);
	        if(!empty($goods_cate_seo['cate'])){
	          $goods_cate_seo['cate_name'] = $this->db->select('product_cate_name')->where('product_cate_id',$goods_cate_seo['cate'])->get('product_cate')->row('product_cate_name');  
	        }else{
	            $goods_cate_seo['cate_name'] = '-请选择-';
	        }
	        $cate = $this->common_function->get_cate_by_parent_id();
	        $cate_option = $this->common_function->cate_array_to_option($cate);
	        //print_r($cate);exit;
	        $this->smarty->assign('index_seo',unserialize($index_seo));
	        $this->smarty->assign('cate_option',$cate_option);
	        $this->smarty->assign('group_seo',unserialize($group_seo));
	        $this->smarty->assign('group_content_seo',unserialize($group_content_seo));
	        $this->smarty->assign('brand_seo',unserialize($brand_seo));
	        $this->smarty->assign('brand_list_seo',unserialize($brand_list_seo));
	        $this->smarty->assign('product_seo',unserialize($product_seo));
	        $this->smarty->assign('goods_cate_seo',$goods_cate_seo);
	        $this->smarty->display ( 'mall_seo_set.html' );
	    }elseif (isset($_GET['op'])&&$_GET['op']=='edit'){
	        //print_r($_POST);exit;
	        $index_seo = isset($_POST['SEO']['index']) ? $_POST['SEO']['index'] : '';
	        $group_seo = isset($_POST['SEO']['group']) ? $_POST['SEO']['group'] : '';
	        $group_content_seo = isset($_POST['SEO']['group_content']) ? $_POST['SEO']['group_content'] : '';
	        $brand_seo = isset($_POST['SEO']['brand']) ? $_POST['SEO']['brand'] : '';
	        $brand_list_seo = isset($_POST['SEO']['brand_list']) ? $_POST['SEO']['brand_list'] : '';
	        $product_seo = isset($_POST['SEO']['product']) ? $_POST['SEO']['product'] : '';
	        $goods_cate_seo['cate'] = isset($_POST['category']) ? $_POST['category'] : '';
	        $goods_cate_seo['title'] = isset($_POST['cate_title']) ? $_POST['cate_title'] : '';
	        $goods_cate_seo['keywords'] = isset($_POST['cate_keywords']) ? $_POST['cate_keywords'] : '';
	        $goods_cate_seo['description'] = isset($_POST['cate_description']) ? $_POST['cate_description'] : '';
	        $seo['index_seo'] = $index_seo;
	        $seo['group_seo'] = $group_seo;
	        $seo['group_content_seo'] = $group_content_seo;
	        $seo['brand_list_seo'] = $brand_list_seo;
	        $seo['product_seo'] = $product_seo;
	        $seo['brand_seo'] = $brand_seo;
	        $seo['cate_seo'] = ($goods_cate_seo['cate']=='') ? '' : array('cate'=>$goods_cate_seo['cate'],'title'=>$goods_cate_seo['title'],'keywords'=>$goods_cate_seo['keywords'],'description'=>$goods_cate_seo['description']);
	        $flag = true;
	        foreach ($seo as $k=>$v){
	            if(!empty($v)){
	                $data = serialize($v);
	                $re = $this->db->where('code',$k)->update('system_config',array('value'=>$data));
	                if(!$re){
	                    $flag = false;
	                }
	            }
	        }
	        if($flag){
	            $this->common_function->shop_admin_log('seo设置','edit', '平台配置');
	            $result['msg'] = '设置成功';
	            $result['state'] = true;
	            
	        }else{
	            $result['msg'] = '设置失败';
	            $result['state'] = false;
	            
	        }
	        echo json_encode($result);exit;
	    }
		
	}
	/*消息通知*/
	public function mall_news(){
	    $this->common_function->shop_admin_priv("mall_news");//权限
		$this->smarty->display ( 'mall_news.html' );
	}
	/*消息通知——模板列表*/
	public function mall_msg_list(){
        $this->common_function->shop_admin_priv("mall_news");//权限
	    $rows = $this->common_function->get_shop_msg_tp();
	    $total = count($rows);
	    header("Content-type: text/xml");
	    $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	    $xml .= "<rows>";
	    $xml .= "<total>$total</total>";
	    foreach($rows AS $key => $row){
	        $xml .= "<row id='" . $row['mmt_code'] . "'>";
	        $xml .= "<cell><![CDATA[
                    <a class='btn red' onclick='fg_edit(" . json_encode($row['mmt_code']) .")'><i class='fa fa-cog'></i>编辑</a>
                    ]]></cell>";
	        $xml .= "<cell><![CDATA[".$row['mmt_name']."]]></cell>";
	        if($row['mmt_message_switch']==1){
	            $xml .= "<cell><![CDATA[开启]]></cell>";
	        }else{
	            $xml .= "<cell><![CDATA[关闭]]></cell>";
	        }
	        if($row['mmt_short_switch']==1){
	            $xml .= "<cell><![CDATA[开启]]></cell>";
	        }else{
	            $xml .= "<cell><![CDATA[关闭]]></cell>";
	        }
	        if($row['mmt_mail_switch']==1){
	            $xml .= "<cell><![CDATA[开启]]></cell>";
	        }else{
	            $xml .= "<cell><![CDATA[关闭]]></cell>";
	        }
            if($row['mmt_weixin_switch']==1){
                $xml .= "<cell><![CDATA[开启]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[关闭]]></cell>";
            }
	        $xml .= "</row>";
	    }
	    $xml .= "</rows>";
	    echo $xml;
	}
	/*消息通知——编辑*/
	public function mall_news_edit(){
        $this->common_function->shop_admin_priv("mall_news");//权限
	    $code = isset($_GET['code']) ? trim($_GET['code']) : '';
	    $data = array();
        $row = $this->common_function->get_shop_msg_tp($code);
        $data = $row[0];
	    $this->smarty->assign('data',$data);
		$this->smarty->display ( 'mall_news_edit.html' );
	}
	/*消息通知——编辑提交*/
	public function mall_msg_submit(){
        $this->common_function->shop_admin_priv("mall_news");//权限
	    $code = isset($_POST['code']) ? trim($_POST['code']) : false;
	    $form_submit = isset($_POST['form_submit']) ? trim($_POST['form_submit']) : '';
	    $message_switch = isset($_POST['message_switch']) ? trim($_POST['message_switch']) : '';
	    $message_content = isset($_POST['message_content']) ? trim($_POST['message_content']) : '';
	    $short_switch = isset($_POST['short_switch']) ? trim($_POST['short_switch']) : '';
	    $short_content = isset($_POST['short_content']) ? trim($_POST['short_content']) : '';
	    $mail_switch = isset($_POST['mail_switch']) ? trim($_POST['mail_switch']) : '';
	    $mail_subject = isset($_POST['mail_subject']) ? trim($_POST['mail_subject']) : '';
	    $content = isset($_POST['content']) ? trim($_POST['content']) : '';
        $weixin_switch = isset($_POST['weixin_switch']) ? trim($_POST['weixin_switch']) : '';
        $weixin_content = isset($_POST['weixin_content']) ? trim($_POST['weixin_content']) : '';
	    $links [0] ['text'] = '返回上一页';
	    $links [0] ['href'] = 'javascript:history.go(-1)';
	    $links [1] ['text'] = '消息模板列表';
	    $links [1] ['href'] = 'mall_news';
	    if($code){
	       if($form_submit=='message_form'){
	           $re = $this->db->where('mmt_code',$code)->update('shop_member_msg_tpl',array('mmt_message_switch'=>$message_switch,'mmt_message_content'=>$message_content));
	           if($re){
	               $this->common_function->shop_admin_log($code,'edit', '消息通知：站内信设置');
	               $this->common_function->show_message('站内信设置成功',1,$links);
	           }else{
	               $this->common_function->show_message('设置失败',1,$links);
	           }
	       }elseif($form_submit=='short_name'){
	           $re = $this->db->where('mmt_code',$code)->update('shop_member_msg_tpl',array('mmt_short_switch'=>$short_switch,'mmt_short_content'=>$short_content));
	           if($re){
	               $this->common_function->shop_admin_log($code,'edit', '消息通知：手机短信设置');
	               $this->common_function->show_message('手机短信设置成功',1,$links);
	           }else{
	               $this->common_function->show_message('设置失败',1,$links);
	           }
	           
	       }elseif($form_submit=='mail_form'){
	           $re = $this->db->where('mmt_code',$code)->update('shop_member_msg_tpl',array('mmt_mail_switch'=>$mail_switch,'mmt_mail_subject'=>$mail_subject,'mmt_mail_content'=>$content));
	           if($re){
	               $this->common_function->shop_admin_log($code,'edit', '消息通知：邮件设置');
	               $this->common_function->show_message('邮件设置成功',1,$links);
	           }else{
	               $this->common_function->show_message('设置失败',1,$links);
	           }
	           
	       }else if($form_submit=='weixin_form'){
               $re = $this->db->where('mmt_code',$code)->update('shop_member_msg_tpl',array('mmt_weixin_switch'=>$weixin_switch,'mmt_weixin_content'=>$weixin_content));
               if($re){
                   $this->common_function->shop_admin_log($code,'edit', '消息通知：微信设置');
                   $this->common_function->show_message('微信通知设置成功',1,$links);
               }else{
                   $this->common_function->show_message('设置失败',1,$links);
               }
           }
	    }else{
	        $this->common_function->show_message('设置失败',1,$links);
	    }
	}
	/*其他设置*/
	/*其他设置——商品名称格式化设置*/

	public function mall_other()
    {
        //商品名称格式化设置
        $goods_name_format  = $this->mall_model->get_system_value('goods_name_format');
        //平台资源吞吐量
        $throughput         = $this->mall_model->get_system_value('system_throughput');
        $this->smarty->assign('data', $goods_name_format);
        $this->smarty->assign('num', $throughput);
        $this->smarty->display('mall_other.html');
    }
    /*其他设置——商品名称格式化设置提交*/
    public function mall_other_submit()
    {
        $result             = array('state' => false, 'data' => '保存失败,请重试!');
        $key                = isset($_POST['form_submit']) ? $_POST['form_submit'] :false;
        $goods_name_format  = isset($_POST['goods_name_format']) ? $_POST['goods_name_format'] : false;
        $system_throughput  = isset($_POST['system_throughput']) ? $_POST['system_throughput'] : false;

        if ($key == 'ok') {
            $row1 = $this->common_function->change_system_value('goods_name_format', $goods_name_format);
            $row2 = $this->common_function->change_system_value('system_throughput', $system_throughput);
            if($row1 && $row2){
                $this->common_function->shop_admin_log($goods_name_format,'edit', '平台设置：商品规范化格式设置');
                $this->common_function->shop_admin_log($system_throughput,'edit', '平台设置：平台资源吞吐量');
                $result = array('state' => true, 'data' => '保存成功!');
            }
        }
        echo json_encode ($result);
        exit;
    }
	/*支付方式*/
	public function mall_payment(){
	    $this->common_function->shop_admin_priv("mall_payment");//权限
	    $payment = $this->mall_model->get_system_payment_value();
	    $this->smarty->assign('payment',$payment);
		$this->smarty->display ( 'mall_payment.html' );
	}
	/*支付方式编辑提交*/
	public function mall_payment_submit(){
        $this->common_function->shop_admin_priv("mall_payment");//权限
	    $payment_code = isset($_POST['payment_code']) ? trim($_POST['payment_code']) : false;
	    $payment_state = isset($_POST['payment_state']) ? trim($_POST['payment_state']) : 1;
	    if($payment_code=='zfb'){
	        $account = isset($_POST['alipay_account']) ? trim($_POST['alipay_account']) : false;
	        $key     = isset($_POST['alipay_key']) ? trim($_POST['alipay_key']) : false;
	        $id = isset($_POST['alipay_partner']) ? trim($_POST['alipay_partner']) : false;
	        $code = 'payment_zfb';
	        if(!$account||!$key||!$key){
	            $links [0] ['text'] = '返回上一页';
	            $links [0] ['href'] = 'javascript:history.go(-1)';
	            $links [1] ['text'] = '支付列表';
	            $links [1] ['href'] = 'mall_payment';
	            $this->common_function->show_message('账号，校验码，合作者ID不能为空',1,$links);
	        }
	    }elseif($payment_code=='wx'){
	        $account = isset($_POST['appid']) ? trim($_POST['appid']) : false;
	        $key     = isset($_POST['key']) ? trim($_POST['key']) : false;
	        $id = isset($_POST['mchid']) ? trim($_POST['mchid']) : false;
	        $code = 'payment_wx';
	        if(!$account||!$key||!$key){
	            $links [0] ['text'] = '返回上一页';
	            $links [0] ['href'] = 'javascript:history.go(-1)';
	            $links [1] ['text'] = '支付列表';
	            $links [1] ['href'] = 'mall_payment';
	            $this->common_function->show_message('公众号，密钥，商户号不能为空',1,$links);
	        }
	    }elseif($payment_code=='hdfk'){
	        $account = '';
	        $key     = '';
	        $id      = '';
	        $code = 'payment_hdfk';
	    }
	    $data = array('state'=>$payment_state,'account'=>$account,'key'=>$key,'id'=>$id);
	    $data = serialize($data);
	    $re = $this->db->where('code',$code)->update('system_config',array('value'=>$data));
	    $links [0] ['text'] = '返回上一页';
	    $links [0] ['href'] = 'javascript:history.go(-1)';
	    $links [1] ['text'] = '支付列表';
	    $links [1] ['href'] = 'mall_payment';
	    if($re){
	        $this->common_function->shop_admin_log('支付方式设置','edit', '平台配置');
	        $this->common_function->show_message('修改成功',1,$links);
	    }else{
	        $this->common_function->show_message('修改失败',1,$links);
	    }
	    
	}
	/*支付方式——支付宝*/
	public function mall_payment_zfb(){
        $this->common_function->shop_admin_priv("mall_payment");//权限
	    $payment = isset($_GET['op']) ? $_GET['op'] : '';
	    $payment = unserialize(json_decode($payment));
	    $this->smarty->assign('payment',$payment);
		$this->smarty->display ( 'mall_payment_zfb.html' );
	}
	/*支付方式——微信*/
	public function mall_payment_wx(){
        $this->common_function->shop_admin_priv("mall_payment");//权限
	    $payment = isset($_GET['op']) ? $_GET['op'] : '';
	    $payment = unserialize(json_decode($payment));
	    $this->smarty->assign('payment',$payment);
		$this->smarty->display ( 'mall_payment_wx.html' );
	}
	/*支付方式——货到付款*/
	public function mall_payment_hdfk(){
        $this->common_function->shop_admin_priv("mall_payment");//权限
	    $payment = isset($_GET['op']) ? $_GET['op'] : '';
	    $payment = unserialize(json_decode($payment));
	    $this->smarty->assign('payment',$payment);
		$this->smarty->display ( 'mall_payment_hdfk.html' );
	}
	/*快递*/
	public function mall_express(){
	    $this->common_function->shop_admin_priv("mall_express");//权限
		if(!isset($_GET['op'])){
		    $this->smarty->display('mall_express.html');
		}elseif(isset($_GET['op']) && $_GET['op'] == 'table'){
		    $page=isset($_POST['curpage']) ? $_POST['curpage'] : 1;
		    $rp=isset($_POST['rp']) ? $_POST['rp'] : 40;
		    $query = isset($_POST['query']) ? $_POST['query'] : false;
		    $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
		    $this->db->select("e.*,(case when e.e_state=1 then '启用' when e.e_state!=1 then '不启用' end)is_status,
		        (case when e.e_order=1 then '是' when e.e_order!=1 then '否' end)is_e_order");
		    $this->db->from('express as e');
		    $this->db->order_by('e.e_order ,e.e_letter','ASC');
		    $rows = $this->db->get()->result_array();
		    if($qtype && $query){
		        $query=trim($query);
		        foreach($rows as $key=>$row){
		            if(stripos($row[$qtype],$query) === false){
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
		        $xml .= "<row id='".$row['id']."' data-id='".$row['id']."'>";
		        $xml .= "<cell><![CDATA[
                <span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
			    <ul>";
		        if($row['e_state']==1){
		            $xml .="<li><a href='javascript:void(0);' onclick='stop_express(".$row['id'].",".$row['e_state'].',"'.$row['e_name'].'"'.")'>禁用快递</a></li>";
		        }else{
		            $xml .="<li><a href='javascript:void(0);' onclick='stop_express(".$row['id'].",".$row['e_state'].',"'.$row['e_name'].'"'.")'>启用快递</a></li>";
		        }
		        if($row['e_order']==1){
		            $xml .='<li><a href="javascript:void(0);" onclick="default_express('.$row['id'].','.$row['e_order'].",'".$row['e_name']."'".')">取消默认</a></li>';
		        }else{
		            $xml .='<li><a href="javascript:void(0);" onclick="default_express('.$row['id'].','.$row['e_order'].",'".$row['e_name']."'".')">设为默认</a></li>';
		        }
		        
		        $num = $this->db->select('count(1) as num')->where('express_id',$row['id'])->get('express_waybill')->row('num');
		        if($num>0){
		            $xml .="<li><a href='javascript:void(0);' onclick='mall_waybill_edit(".$row['id'].")'>编辑运单模版</a></li>";
		            $xml .="<li><a href='javascript:void(0);' onclick='mall_waybill_design_old(".$row['id'].")'>设计运单模版</a></li>";
		            $xml .="<li><a href='javascript:void(0);' onclick='mall_waybill_design(".$row['id'].")'>新设计运单模版(未完成)</a></li>";
		            $xml .="<li><a href='javascript:void(0);' onclick='mall_waybill_test(".$row['id'].")'>测试运单模版</a></li>";
		        }
		        $xml .= "</ul></span>]]></cell>";
		        $xml .= "<cell><![CDATA[".$row['e_name']."]]></cell>";
		        $xml .= "<cell><![CDATA[".$row['e_code']."]]></cell>";
		        $xml .= "<cell><![CDATA[".$row['e_letter']."]]></cell>";
		        $xml .= "<cell><![CDATA[".$row['e_url']."]]></cell>";
		        //<span class="yes"><i class="fa fa-check-circle"></i>开启中</span>
		        if($row['e_state']==1){
		            $xml .= "<cell><![CDATA[<span class='yes' style='cursor:pointer' onclick='stop_express(".$row['id'].",".$row['e_state'].',"'.$row['e_name'].'"'.")'><i class='fa fa-check-circle'></i>启用</span>]]></cell>";
		        }else{
		            $xml .= "<cell><![CDATA[<span class='no' style='cursor:pointer' onclick='stop_express(".$row['id'].",".$row['e_state'].',"'.$row['e_name'].'"'.")'><i class='fa fa-ban'></i>未启用</span>]]></cell>";
		        }
		        if($row['e_order']==1){
		            $xml .= "<cell><![CDATA[<span class='yes' style='cursor:pointer'".'onclick="default_express('.$row['id'].','.$row['e_order'].",'".$row['e_name']."'".')"'."><i class='fa fa-check-circle'></i>是</span>]]></cell>";
		        }else{
		            $xml .= "<cell><![CDATA[<span class='no' style='cursor:pointer'".'onclick="default_express('.$row['id'].','.$row['e_order'].",'".$row['e_name']."'".')"'."><i class='fa fa-times-circle'></i>否</span>]]></cell>";
		        }
		        $xml .= "</row>";
		    }
		    $xml .= "</rows>";
		    echo $xml;
		}elseif(isset($_GET['op']) && $_GET['op'] == 'stop'){
		    $id=isset($_POST['id']) ? trim($_POST['id']) : false;
		    $state=isset($_POST['state']) ? trim($_POST['state']) : '';
		    $result = array('state'=>false,'msg'=>'设置失败');
		    if($id){
		        $e_name = $this->db->select('e_name')->where('id',$id)->get('express')->row('e_name');
		        if($state==1){
		            $this->db->where('id',$id)->update('express',array('e_state'=>'2'));
		            $this->common_function->shop_admin_log('禁用快递'.$e_name,'edit', '快递设置');
		        }else{
		            $this->db->where('id',$id)->update('express',array('e_state'=>'1'));
		            $this->common_function->shop_admin_log('启用快递'.$e_name,'edit', '快递设置');
		        }
		        $result = array('state'=>true,'msg'=>'设置完成');
		    }
		    echo json_encode($result);exit;
		}elseif(isset($_GET['op']) && $_GET['op'] == 'default'){
		    $id=isset($_POST['id']) ? trim($_POST['id']) : false;
		    $state=isset($_POST['state']) ? trim($_POST['state']) : '';
		    $name=isset($_POST['name']) ? trim($_POST['name']) : '';
		    $result = array('state'=>false,'msg'=>'设置失败');
		    if($id){
		        if($state==1){
		            $this->db->where('id',$id)->update('express',array('e_order'=>'2'));
		            $this->common_function->shop_admin_log('取消默认快递'.$name,'edit', '快递设置');
		        }else{
		            $this->db->where('id',$id)->update('express',array('e_order'=>'1'));
		            $this->common_function->shop_admin_log('设置默认快递'.$name,'edit', '快递设置');
		        }
		        $result = array('state'=>true,'msg'=>'设置完成');
		    }
		    echo json_encode($result);exit;
		}elseif (isset($_GET['op']) && $_GET['op'] == 'batch'){
		    //批量启用
		    $result=array("state"=>false,'msg'=>'快递启用失败,请稍后再试!');
		    $id = isset($_POST['id'])?trim($_POST['id']):'';
		    if(!$id){
		        echo json_encode($result);exit;
		    }
	
		    if(substr($id,0,1)==","){
		        $id = substr($id,1);
		    }
		    if($this->db->where("id in (".$id.")")->update('express',array('e_order'=>'1'))){
		        $this->common_function->shop_admin_log('批量启用快递'.$id,'edit', '快递设置');
		        $result["state"]=true;
		        $result['msg']='快递启用成功!';
		    }
		    echo json_encode($result);exit;
		}
	}

	
	
	
    /*快递——显示运单模版*/
    public function mall_waybill()
    {
        //启用禁用快递模板
        if (isset($_GET['op']) && $_GET['op'] == 'stop') {
            $data = array ('state' => false, 'msg' => '操作失败！');
            if (isset($_POST['id']) && isset($_POST['state'])) {
                $waybill['status']  = $_POST['state']?0:1;
                $result = $this->db->where('waybill_id', $_POST['id'])->update('express_waybill', $waybill);
                if($result) {
                    $data = array ('state' => true, 'msg' => '操作成功！');
                }
            }
            echo json_encode ($data);
            exit;
        }
        $this->smarty->display('mall_waybill.html');
    }
    
    
    
    /*快递运单模板列表*/
    public function mall_waybill_list(){
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;
        $start = ($page - 1) * $rp;
        $this->db->from ('express_waybill');

        //只加载系统的运单模板
        $where = "store_id = 0 or store_id is null";
        $total = $this->db->where($where)->count_all_results ();
        $this->db->limit ($rp, $start);
        $rows = $this->db->where($where)->get ('express_waybill')->result_array ();

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach ($rows as $row){
            $row['waybill_image'] = base_url ('data/images/').$row['waybill_image'];
            $xml .= "<row id='".$row['waybill_id']."'>";
            $xml .= "<cell><![CDATA[<a class='btn red' onclick=mall_waybill_del({$row['waybill_id']})>
            <i class='fa fa-trash-o'></i>删除</a><span class='btn'>
                <span class='btn'><em><i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
			    <ul>";
            if($row['waybill']==2){
                $xml .="<li><a href='javascript:void(0);' onclick='mall_waybill_design(".$row['waybill_id'].",2)'>设计热敏模版</a></li>";
                $xml .="<li><a href='javascript:void(0);' onclick='mall_waybill_test(".$row['waybill_id'].",2)'>测试热敏模版</a></li>";
            }else{
                $xml .="<li><a href='javascript:void(0);' onclick='mall_waybill_design(".$row['waybill_id'].",1)'>设计运单模版</a></li>";
                $xml .="<li><a href='javascript:void(0);' onclick='mall_waybill_test(".$row['waybill_id'].",1)'>测试运单模版</a></li>";
            }

            $xml .= "</ul></span>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['waybill_name']."]]></cell>";
            if($row['waybill']==2){
                $xml .= "<cell><![CDATA[热敏]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[面单]]></cell>";
            }
            
            $xml .= "<cell><![CDATA[".$row['express_name']."]]></cell>";
            
            
            $xml .= "<cell><![CDATA[<img height='100px' src='{$row['waybill_image']}' alt=''>]]></cell>";
            $xml .= "<cell><![CDATA[<p>宽度：{$row['waybill_width']}(mm)</p>
                                <p>高度：{$row['waybill_height']}(mm)</p>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['waybill_top']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['waybill_left']."]]></cell>";
            //<span class="yes"><i class="fa fa-check-circle"></i>开启中</span>
            if($row['status']==1){
                $xml .= "<cell><![CDATA[<span class='yes' style='cursor:pointer' onclick='stop_waybill(".$row['waybill_id'].",".$row['status'].',"'.$row['waybill_name'].'"'.")'><i class='fa fa-check-circle'></i>启用</span>]]></cell>";
            }else{
                $xml .= "<cell><![CDATA[<span class='no' style='cursor:pointer' onclick='stop_waybill(".$row['waybill_id'].",".$row['status'].',"'.$row['waybill_name'].'"'.")'><i class='fa fa-ban'></i>未启用</span>]]></cell>";
            }
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml; exit;
    }
	/*快递——编辑运单模版*/
	public function mall_waybill_edit(){
	    $this->common_function->shop_admin_priv("mall_express");//权限
	    $id = isset($_GET['data']) ? trim($_GET['data']) : false;
	    if($id){
            $data = $this->db->where('waybill_id',$id)->get('express_waybill')->row_array();
            $this->smarty->assign('data',$data);
	    }else{
	        $waybill = $this->db->select('express_id')->get('express_waybill')->result_array();
	        $arr = array();
	        foreach ($waybill as $k=>$v){
	            $arr[] = $v['express_id'];
	        }
	        $express = $this->db->select('id,e_name')->order_by('e_letter','ASC')->get('express')->result_array();
	        foreach ($express as $k=>$v){
	            if(in_array($v['id'], $arr)){
	                unset($express[$k]);
	            }
	        }
	        $this->smarty->assign('express',$express);
	    }
	    $this->smarty->display('mall_waybill_edit.html');
	}
	/*快递——编辑运单模版提交*/
	public function mall_waybill_submit() {
	   $this->common_function->shop_admin_priv("mall_express");//权限
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
	   //背景图片处理
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
           'waybill_data'=>$waybill_data,'last_modify_time'=>time(),'last_modify_user_id'=>$_SESSION['shop_admin_id'],'store_id'=>0,
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
//	       if(empty($express_info)){
	           if($this->db->insert('express_waybill',$data)){
	               $this->common_function->shop_admin_log('设置快递模板'.$waybill_name,'add', '快递模板设置');
	               $this->common_function->show_message('添加成功',1,$links);
	           }else{
	               $this->common_function->show_message('修改失败',1,$links);
	           }
//	       }else{
//	           if($this->db->where('waybill_id',$express_info['waybill_id'])->update('express_waybill',$data)){
//	               $this->common_function->shop_admin_log('设置快递模板'.$waybill_name,'edit', '快递模板设置');
//	               $this->common_function->show_message('修改成功',1,$links);
//	           }else{
//	               $this->common_function->show_message('修改失败',1,$links);
//	           }
//	       }
	   }
	   
	}

	/*快递——设计运单模版*/
	public function mall_waybill_design(){
        $this->common_function->shop_admin_priv("mall_express");//权限
	    $id = isset($_GET['data']) ? trim($_GET['data']) : false;
	    $type = isset($_GET['type']) ? trim($_GET['type']) : 1;
	    if($id){
	        $will_info = $this->db->select('*')->from('express_waybill')->where('waybill_id',$id)->get()->row_array();
	        //print_r($will_info);die;
	        $waybill_data =unserialize($will_info['waybill_data']);
	        $img = $will_info['waybill_image'];
	        $img_url = base_url ('data/images/').$img;
	        $this->smarty->assign('img',$img_url);
	        $waybill_express_name = $will_info['waybill_name'];
	        $this->smarty->assign('waybill_express_name',$waybill_express_name);
	        $this->smarty->assign('will_info',$will_info);
	        
	    }
	    $express_info = $this->db->select('e_name,id,e_code,cp_code')->from('express')->where('e_state',1)->get()->result_array();
	    $this->smarty->assign('express_info',$express_info);
	    if($type==1){
	        $this->smarty->display ( 'mall_waybill_design.html' );
	    }else{
	        $this->smarty->display ( 'mall_waybill_design_rm.html' );
	    }
		
	}
	
	
	/*快递公司——测试运单模版*/
	public function mall_waybill_test(){
	    $this->common_function->shop_admin_priv("mall_express");//权限
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
	
	/*快递——删除运单模板*/
	public function mall_waybill_del() {
	    $id = isset($_POST['waybill_id']) ? trim($_POST['waybill_id']) : false;
	    $data = array ('state' => false, 'msg' => '操作失败！');
	    if($id) {
	        $result = $this->db->where('waybill_id', $id)->delete('express_waybill');
	        if($result) {
	            $data = array ('state' => true, 'msg' => '操作成功！');
	        }
	    }
	    echo json_encode ($data);
	    exit;
	}
	
	
	//运费设计模版修改确认
	public function design_template_submit() {
        $this->common_function->shop_admin_priv("mall_express");//权限
	    $id = isset($_POST['waybill_id']) ? $_POST['waybill_id'] : false;
	    $data = isset($_POST['waybill_data']) ? $_POST['waybill_data'] : false;
	    //print_r($data);exit;
	    if($id&&$data&&!empty($data)){
	        $ex_info=$this->db->select('waybill_name')->from('express_waybill')->
	        where('waybill_id',$id)->get()->row('waybill_name');
	        /*$tp_data = array();
	         foreach ($data as $k=>$v){
	         if(isset($v['check'])&&$v['check']=='on'){
	         $tp_data[$k]=$v;
	         }
	         }*/
	        $arr = array('waybill_data'=>serialize($data));
	        $this->db->where('waybill_id',$id);
	        $re = $this->db->update('express_waybill',$arr);
	        if($re){
	            $this->common_function->shop_admin_log('设计运单模板'.$ex_info, 'edit', '运单模板设计');
	            $links[1]=array('text'=>'模板列表','href'=>'mall_waybill');
	            $links[0]=array('text'=>'返回上一页','href'=>'javascript:history.go(-1)');
	            $this->common_function->show_message('设计成功',1,$links);
	        }else{
	            $this->common_function->show_message('设计失败');
	        }
	    }
	    $this->common_function->show_message('设计失败');
	}

	
	/*快递接口*/
	public function mall_express_interface(){
	    $this->common_function->shop_admin_priv("mall_express_interfa");//权限
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
	        $this->common_function->shop_admin_log('快递接口设置','edit', '平台配置');
	        $result['msg'] = '设置成功';
	        $result['state'] = true;
	        echo json_encode($result);exit;
	       
	    }
		
	}
	
	/*模版管理*/
	public function mall_template_management(){ 
	    $this->common_function->shop_admin_priv("mall_template_management");//权限
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
        $this->common_function->shop_admin_priv("mall_express_tools");//权限
	    $rp = isset($_POST['rp']) ? trim($_POST['rp']) : 10;
	    $page = isset($_POST['page']) ? trim($_POST['page']) : 1;
	    $op = isset($_GET['op']) ? trim($_GET['op']) : false;
	    $where = " 1=1 ";
	    $user_express = $this->db->select('et.*,etf.*,etfa.region_area_id,
	        a.area_name,a.area_parent_id')
	    ->from('express_template as et')
        ->where('et.store_id = 0 or et.store_id is null')
        ->join('express_template_attr_fee as etf','etf.ept_id=et.ept_id')
	    ->join('express_template_attr_fee_area as etfa','etfa.eptaf_id=etf.eptaf_id')
	    ->join('area as a','a.area_id=etfa.region_area_id')
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
	//商城设置——物流工具——配送区域——删除
	public function mall_express_tools_del(){
	    //print_r($_POST);exit;
        $this->common_function->shop_admin_priv("mall_express_tools");//权限
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
	                    $this->common_function->shop_admin_log('模板'.$title, 'del', '配送模板');
	                    $result = array('state'=>true,'msg'=>'删除成功');
	                    echo json_encode($result);exit;
	                }
	            }
	        }
	    }
	    echo json_encode($result);exit;
	    //print_r($_POST);exit;
	}
	//商城设置——物流工具——配送区域——新增
	public function mall_express_area_add (){
        $this->common_function->shop_admin_priv("mall_express_tools");//权限
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
	    $j=0;
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
        //所有已开启的快递
        $express = $this->db->select('e_name,e_code')->where('e_state', 1)->get('express')->result_array();
        //已存在的快递
        $express2 = $this->db->select('express_name e_name,express_code e_code')->where('store_id',0)->get('express_template')->result_array();
        //还没有添加运费的快递
        $arr  = array ();
        $arr2 = array ();
        foreach ($express as $e) {
            $arr[$e['e_code']] = $e['e_name'];
        }
        foreach ($express2 as $e) {
            $arr2[$e['e_code']] = $e['e_name'];
        }
        $arr = array_diff ($arr, $arr2);
        foreach ($arr as $key => $value) {
            $expres[] = Array('e_code'=>$key,'e_name'=>$value);
        }
        if (!empty($expres)) {
            $this->smarty->assign('express',$expres);
        }

	    $this->smarty->assign('data_info',$data_info);
	    //$this->smarty->assign('data_fee',$_POST['data']);

	    //print_r($express);exit;
	    $this->smarty->assign('data',$data_area);
	    $this->smarty->display ( 'mall_express_area_add.html' );
	}
	
	
	
	/**/
	public function check_express_name(){
        $this->common_function->shop_admin_priv("mall_express_tools");//权限
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

        $this->common_function->shop_admin_priv("mall_express_tools");//权限
	    $title = isset($_POST['title']) ? trim($_POST['title']) : '';
	    $express_code = isset($_POST['express_code']) ? trim($_POST['express_code']) : false;
	    $transport_id = isset($_POST['transport_id']) ? trim($_POST['transport_id']) : false;
	    $ept_id = isset($_POST['ept_id']) ? trim($_POST['ept_id']) : false;
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
                'store_id' => 0
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
	            $this->common_function->shop_admin_log('配送模板'.$title,  'add','配送模板');
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
	            'add_time'=>time(),'add_user'=>$_SESSION['shop_admin_id'],'add_type'=>1,
	            'add_user_id'=>$_SESSION['shop_admin_id'], 'sort'=>$sort, 'type'=>$goods_trans_type,
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
	            $this->common_function->shop_admin_log('模板'.$title_name,  'edit','配送模板');
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
	    $this->common_function->shop_admin_priv("mall_express_tools");//权限
	    $this->smarty->display ( 'mall_express_tools_cod.html' );
	}

	/*平台权限设置*/
	public function  authority(){
        $this->common_function->shop_admin_priv("mall_payment");//权限
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'log_time';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
        if(!isset($_GET['op'])){
            $this->smarty->display('platform_action.html');
        }elseif(isset($_GET['op']) && $_GET['op'] == 'list'){
            //admin_priv('admin_management');//权限设置
            $this->db->select('*');
            $this->db->from('platform_roles');
            $rows = $this->db->get()->result_array();
            //print_r($admin_data);exit;
            $total = count($rows);
            $rows = array_slice($rows,($page-1)*$rp,$rp);
            header("Content-type: text/xml");
            $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
            $xml .= "<rows>";
            $xml .= "<page>$page</page>";
            $xml .= "<total>$total</total>";
            foreach($rows AS $row){
                $xml .= "<row id='".$row['role_id']."'>";
                $xml .= "<cell><![CDATA[
            <a class='btn purple' href='authority?op=edit&role_id=".$row['role_id']."' >
            <i class='fa fa-cog'></i>设置</a>
            ]]></cell>";
                $xml .= "<cell><![CDATA[".$row['role_name']."]]></cell>";
                $xml .= "</row>";
            }
            $xml .= "</rows>";
            echo $xml;
        }elseif(isset($_GET['op']) && $_GET['op'] == 'edit'){
            //admin_priv('admin_edit');//权限设置
            $role_id = isset($_GET['role_id']) ? intval($_GET['role_id']) : false;
            if($role_id) {
                $this->db->select('*');
                $this->db->from('platform_roles');
                $this->db->where('role_id',$role_id);
                $role_info = $this->db->get()->row_array();
                $this->smarty->assign('role_info', $role_info);
                $role_array = explode(',', $role_info['role_actions']);
                $priv_arr1 = $this->get_action_list(1);
//                var_dump ($priv_arr1);exit;
                $priv_arr2 = $this->get_action_list(2);

                //var_dump($priv_arr);
                $this->smarty->assign('role_array', $role_array);
                $this->smarty->assign('priv_arr1',   $priv_arr1);//商家端
                $this->smarty->assign('priv_arr2',   $priv_arr2);//app
                $this->smarty->display('platform_role.html');
            }else{
                $this->common_function->show_message('请刷新重试！');
            }
                //$this->smarty->display('platform_role.html');
        }elseif (isset($_GET['op']) && $_GET['op']=='insert'){

            $priv_arr = isset($_POST['permission']) ? $_POST['permission']: array() ;
            $role_id = isset($_POST['role_id']) ? $_POST['role_id']: false ;
            //去重 有可能两个权限对应一个权限码的情况
            $priv_arr = array_unique($priv_arr);
            $act_list = @join(",", $priv_arr);
            //print_r($act_list);exit;
            $data = array(
                'role_actions'=>$act_list,
            );
            if($role_id){
                $this->db->select('role_name');
                $this->db->from('platform_roles');
                $this->db->where('role_id',$role_id);
                $role_name = $this->db->get()->row_array();
                $this->db->where('role_id',$role_id);
                $re = $this->db->update('platform_roles',$data);
                if($re){
                    $this->common_function->shop_admin_log($role_name['role_name'], 'edit', '权限角色');
                    $links = array(
                        0=>array(
                            'text' => '还回上一页',
                            'href' => 'javascript:history.go(-1)',
                        ),
                        1=>array(
                            'text' => '角色列表',
                            'href' => 'authority',
                        )
                    );
                    $this->common_function->show_message( "修改" .$role_name['role_name'] . "的权限成功",0, $links);
                }else{
                    $this->common_function->show_message("修改" .$role_name['role_name'] . "的权限失败");
                }
            }else{
                $links = array(
                    0=>array(
                        'text' => '还回上一页',
                        'href' => 'javascript:history.go(-1)',
                    ),
                    1=>array(
                        'text' => '角色列表',
                        'href' => 'authority',
                    )
                );
                $this->common_function->show_message( "系统发生错误，请稍后再试",0, $links);
            }
        }
    }


    /* 获取权限数组的函数  */
    public function get_action_list($type){
        /* 获取权限的分组数据 */
        $this->db->select('action_id, action_parent_id, action_code,aciton_comment,action_type');
        $this->db->from('platform_action');
        $this->db->where('action_type',$type);
        $this->db->where('action_parent_id',0);
        $rows = $this->db->get()->result_array();
        $priv_arr= array();

        foreach($rows as $row)
        {
            $priv_arr[$row['action_id']] = $row;
        }
        /* 按权限组查询底级的权限名称 */
        $this->db->select('action_id, action_parent_id, action_code, action_type,aciton_comment');
        $this->db->from('platform_action');
        $this->db->where('action_type',$type);
        $this->db->where("action_parent_id ".db_create_in(array_keys($priv_arr)));
        $privs = $this->db->get()->result_array();
        foreach($privs as $priv)
        {
            $priv_arr[$priv["action_parent_id"]]["priv"][$priv["action_code"]] = array_reverse($priv);

        }
        //print_r($priv_arr);exit;
        foreach($priv_arr as $key => $val){
            $priv_arr[$key]['action_name'] = $val['aciton_comment'];
            $priv_arr[$key]['action_id'] = $val['action_id'];
            $priv_arr[$key]['action_parent_id'] = $val['action_parent_id'];
            $priv_arr[$key]['action_code'] = $val['action_code'];
            $priv_arr[$key]['action_type'] = $val['action_type'];
            if(!empty($val['priv'])){
                foreach($val['priv'] as $ka => $va){
                    $priv_arr[$key]['priv'][$ka]['action_name'] = $va["aciton_comment"];
                    $priv_arr[$key]['priv'][$ka]['action_id'] = $va['action_id'];
                    $priv_arr[$key]['priv'][$ka]['action_parent_id'] = $va['action_parent_id'];
                    $priv_arr[$key]['priv'][$ka]['action_code'] = $va['action_code'];
                    $priv_arr[$key]['priv'][$ka]['action_type'] = $va['action_type'];
                    $this->db->select('action_id, action_parent_id, action_code, action_type,aciton_comment');
                    $this->db->from('platform_action');
                    $this->db->where('action_type',$type);
                    $this->db->where("action_parent_id=".$va['action_id']);
                    $result = $this->db->get()->result_array();
                    foreach($result as $k => $v){
                        $result[$k]['action_id'] = $v['action_id'];
                        $result[$k]['action_parent_id'] = $v['action_parent_id'];
                        $result[$k]['action_code'] = $v['action_code'];
                        $result[$k]['action_type'] = $v['action_type'];
                        $result[$k]['action_name'] = $v['aciton_comment'];
                    }
                    $priv_arr[$key]['priv'][$ka]['son_priv']  = $result;
                }
            }else{
                $priv_arr[$key]['priv'][$ka]['action_name'] = '';
                $priv_arr[$key]['priv'][$ka]['action_id'] = '';
                $priv_arr[$key]['priv'][$ka]['action_parent_id'] = '';
                $priv_arr[$key]['priv'][$ka]['action_code'] = '';
                $priv_arr[$key]['priv'][$ka]['action_type'] = '';
                $priv_arr[$key]['priv'][$ka]['son_priv']  = array();
            }

        }
        return $priv_arr;

    }


}
