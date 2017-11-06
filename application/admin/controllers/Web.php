<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 平台设置类
 */
class Web extends CI_Controller {

    /**
     * Index Page for this controller.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('web_model');
        $this->load->library ( 'common_function' );
        $this->load->library('email');
        $this->load->model('mall_model');
    }


	
    /** 站点设置 */
    public function index()
    {
        $this->common_function->shop_admin_priv("website_setting");//权限
        $arr=$this->web_model->get_settings();
        $arr['website_name']['explain']='网站名称，将显示在前台顶部欢迎信息等位置';
        $arr['icp_number']['explain']='前台页面底部可以显示 ICP 备案信息，如果网站已备案，在此输入你的授权码，它将显示在前台页面底部，如果没有请留空';
        $arr['website_keywords']['explain']='多个关键字用英文逗号隔开';
        $arr['service_tel']['explain']='一般是400电话一个';
        $arr['service_mail']['explain']='一般是公司邮箱';
        $arr['service_qq']['explain']='可以点击和QQ直接聊天';
        $arr['address']['explain']='系统隶属的公司地址';
        $arr['weixin_code']['explain']='微信二维码图片';
        $arr['shop_code']['explain']='商城二维码图片';
        $arr['website_desc']['explain']='';
        
        $this->smarty->assign('settings',$arr);
        $this->smarty->display('web_site.html');
    }
   
    /** 站点设置修改*/
    public function web_edit()
    {
      $this->common_function->shop_admin_priv("website_setting");//权限
      $dir = './data/two_code/';
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
          foreach ($_FILES as $k=>$v){
              if (!file_exists($dir) || !is_writable($dir)) {
                  if (!@mkdir($dir, 0755)) {
                      if(!empty($v['name'])){
                          $aryStr = explode(".", $v['name']);
                          $new_name = $k.'.'.strtolower($aryStr[count($aryStr)-1]);
                          
                          if(!@move_uploaded_file($v['tmp_name'],$dir.$new_name)){
                              $upload = false;
                          }else{
                             $re = $this->db->where('code',$k)->where('parent_id',1)->update('system_config',array('value'=>$dir.$new_name));
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
                      $config['source_image'] = $v['tmp_name'];
                      $config['wm_text'] = 'dfgg';
                      $config['wm_type'] = 'text';
                      $config['wm_font_path'] = './system/fonts/texb.ttf';
                      $config['wm_font_size'] = '20';
                      $config['wm_font_color'] = 'ffffff';
                      $config['wm_vrt_alignment'] = 'middle';
                      $config['wm_hor_alignment'] = 'center';
                      $config['wm_padding'] = '0';
                      $this->load->library('image_lib');
                      $this->image_lib->initialize($config);
                      $this->image_lib->watermark();
                     //加水印
					 
                         if(!@move_uploaded_file($v['tmp_name'],$dir.$new_name)){
                              $upload = false;
                          }else{
                             $re = $this->db->where('code',$k)->where('parent_id',1)->update('system_config',array('value'=>$dir.$new_name));
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
      foreach($_POST as $key=>$data){
          if(!empty($data)){
              $data = trim($data);
              $arr = array('value'=>$data);
              $this->db->where('code', $key);
              $list_data = $this->db->update('system_config', $arr);
          }
       }
        //print_r($list_data);exit;
        if($list_data){
            $this->common_function->shop_admin_log('站点设置','edit', '平台配置');
            $result['state'] = true;
            $result['msg'] 	= "修改成功";
            echo json_encode($result);exit;
        }else{
            $result['msg'] 	= "修改失败";
            echo json_encode($result);exit;
        }
    }
    /*邮件设置*/
    public function set(){
        $this->common_function->shop_admin_priv("mail_setting");//权限
        $mail['server'] = $this->web_model->get_system_value('smtp_host');
        $mail['port'] = $this->web_model->get_system_value('smtp_port');
        $mail['user_address'] = $this->web_model->get_system_value('smtp_mail');
        $mail['user_name'] = $this->web_model->get_system_value('smtp_user');
        $mail['password'] = $this->web_model->get_system_value('smtp_pwd');
        $this->smarty->assign('mail',$mail);
        $this->smarty->display('mail_set.html');
    }
    
    public function setting(){
        $this->common_function->shop_admin_priv("mail_setting");//权限
        $mail['smtp_host'] = $this->input->post('server');
        $mail['smtp_port'] = $this->input->post('port');
        $mail['smtp_mail'] = $this->input->post('email');
        $mail['smtp_user'] = $this->input->post('user_name');
        $mail['smtp_pwd'] = $this->input->post('mail_password');
    
        foreach ($mail as $key => $value)
        {
            $result = $this->web_model->change_system_value($key, $value);
            if (!$result)
            {
                echo json_encode('修改失败');
                exit();
            }
        }
        echo json_encode('修改成功');
        exit();
    }
    
    
    public function send($user_id, $template_id){
        $this->common_function->shop_admin_priv("mail_setting");//权限
        //发送邮件
        $config['useragent'] = 'erp';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = $this->web_model->get_system_value('smtp_host');
        $config['smtp_port'] = $this->web_model->get_system_value('smtp_port');
        $config['smtp_user'] = $this->web_model->get_system_value('smtp_user');
        $config['smtp_pass'] = $this->web_model->get_system_value('smtp_pwd');
        $this->email->initialize($config);
    
        $this->email->from($this->web_model->get_system_value('smtp_mail'));
    
        $msg = $this->web_model->get_user_msg($user_id);
        $tomail = $msg['user_email'];
        $this->email->to($tomail);
    
        $data = $this->web_model->get_tp($template_id, 'mail');
        $this->email->subject($data['template_subject']);
        $this->email->message($data['template_content']);
    
        if ($this->email->send())
        {
    
            $data = array(
                'send_mail_time' => time(),
                'mail_template_id' => $template_id,
                'send_user_id' => $_SESSION['shop_admin_id'],
                'send_user_ip' => real_ip(),
                'send_user_type' => 1,
                'recevice_address' => $tomail,
                'is_success' => 1,
                'recevice_user_id' => $user_id
            );
    
            $this->db->insert('mail_log', $data);
            return json_encode('发送成功');
        }else
        {
            $data = array(
                'send_mail_time' => time(),
                'mail_template_id' => $template_id,
                'send_user_id' => $_SESSION['shop_admin_id'],
                'send_user_ip' => real_ip(),
                'send_user_type' => 1,
                'recevice_address' => $tomail,
                'is_success' => 0,
                'recevice_user_id' => $user_id
            );
    
            $this->db->insert('mail_log', $data);
        }
    }
    
    
    public function send_test(){
        //测试邮件
        $this->common_function->shop_admin_priv("mail_setting");//权限
        $config['useragent'] = 'test';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = $this->input->post('server');
        $config['smtp_port'] = $this->input->post('port');
        $config['smtp_user'] = $this->input->post('user_name');
        $config['smtp_pass'] = $this->input->post('mail_password');
        $this->email->initialize($config);
    
        $email = $this->input->post('email');
        $tomail = $this->input->post('mail_test');
    
        $this->email->from($email);
        $this->email->to($tomail);
    
        $this->email->subject('测试');
        $this->email->message('测试成功');
    
        $this->email->print_debugger();
        //print_r($result);die;
        if ($this->email->send())
        {
            $data['data'] = '发送成功';
            echo json_encode($data);
        }else
        {
            $data['data'] = '发送失败';
            echo json_encode($data);
        }
    
    }
    
    public function templates(){
        $this->common_function->shop_admin_priv("mail_template");//权限
        $rows = $this->web_model->all_tp('mail');
        $this->smarty->assign('mail_tpl', $rows);
        $this->smarty->display('mail_tpl.html');
    }
    
    /**
     * @param unknown $tp_id    模版ID
     */
    public function tp_change($tp_id){
        $this->common_function->shop_admin_priv("mail_template");//权限
        //界面加载--修改邮件模版
        $row = $this->web_model->get_tp($tp_id, 'mail');
        $row['template_content'] = str_replace('>','&gt;',str_replace('<', '&lt;', $row['template_content']));
        $this->smarty->assign('tpl_list', $row);
        $this->smarty->display('mail_tpl_edit.html');
    }
    
    public function tp_edit($tp_id){
        $this->common_function->shop_admin_priv("mail_template");//权限
        $data = array(
            'template_code' => $this->input->post('code'),
            'template_subject' => $this->input->post('title'),
            'template_content' => $this->input->post('content')
        );
        //print_r($data);die;
        $this->db->where('template_id', $tp_id);
        $result = $this->db->update('mail_templates', $data);
        if ($result){
            echo json_encode('修改成功');
        }
    }
    
    public function log(){
        $this->common_function->shop_admin_priv("mail_log");//权限
        //界面加载
        $this->smarty->display('mail_log.html');
    }
    
    public function get_log(){
        //获取邮件日志
        $this->common_function->shop_admin_priv("mail_log");//权限
        $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
        $page = isset($_POST['curpage']) ? intval($_POST['curpage']) : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'send_mail_id';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
    
        //var_dump($query);var_dump($qtype);var_dump($page);var_dump($rp);var_dump($sortname);var_dump($sortorder);die;
        $where = '';
        if($query && $qtype){
            $where .= " AND $qtype LIKE '%$query%' ";
        }
    
        $start = ($page-1)*$rp;
        $where .= " limit $start, $rp";
    
        $rows = $this->web_model->get_log($where, 'mail');
        $total = $this->common_function->total('mail_log');
    
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $key => $row){
            if($row['send_user_id']==0){
                $row['send_user_name']='系统';
            }else{
                $msg = $this->web_model->get_user_msg($row['send_user_id']);
                $row['send_user_name']=$msg['user_name'];
            }
            if($row['mail_template_id']!=0){
                $tmp = $this->web_model->get_tp($row['mail_template_id'], 'mail');
                $row['mail_template_content']=$tmp['template_content'];
            }else{
                $row['mail_template_content']='';
            }
            if($row['is_success'] == 1){
                $row['send_status'] = '发送成功';
            }elseif($row['is_success'] == 0){
                $row['send_status'] = '失败';
            }else{
                $row['send_status'] = '';
            }
            $xml .= "<row id='" . $row['send_mail_id'] . "'>";
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['send_mail_id'] . ")'><i class='fa fa-trash-o'></i>删除</a>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['send_user_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['mail_template_content']."]]></cell>";
            $xml .= "<cell><![CDATA[".utf8_encode(date('Y-m-d H:i:s', $row['send_mail_time']))."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['recevice_address']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['send_status']."]]></cell>";
            $xml .= "</row>";
        }
        //print_r($rows);exit;
        $xml .= "</rows>";
        echo $xml;
    }
    
    public function excel($ids = NULL){
        if(isset($_GET['op']) && $_GET['op']=="EmailExcel"){
            $ids = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] :"";
        }
        $this->common_function->shop_admin_priv("mail_log");//权限
        if (empty($ids)){
            $rows = $this->web_model->get_log(' AND 1', 'mail');
        }else
        {
            $where = " AND send_mail_id IN(".$ids.")";
            $rows = $this->web_model->get_log($where, 'mail');
        }
        //print_r($rows);die;
        $objPHPExcel=new PHPExcel();
        $objPHPExcel->getProperties()->setCreator('erp')
        ->setLastModifiedBy('erp')
        ->setTitle('Office 2007 XLSX Document')
        ->setSubject('Office 2007 XLSX Document')
        ->setDescription('Document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Result file');
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1','ID')
        ->setCellValue('B1','操作人')
        ->setCellValue('C1','操作内容')
        ->setCellValue('D1','操作时间')
        ->setCellValue('E1','邮件地址');
    
        $i=2;
        foreach($rows as $k=>$row){
            if($row['send_user_id']==0){
                $row['send_user_name']='系统';
            }else{
                $row['send_user_name']=$this->db->query("SELECT admin_name FROM ".$this->db->dbprefix('admin')." where admin_id=".$row['send_user_id'])->row()->admin_name;
            }
            if($row['mail_template_id']!=0){
                $row['mail_template_content']=$this->db->query("SELECT template_content FROM ".$this->db->dbprefix('mail_templates')." where template_id=".$row['mail_template_id'])->row()->template_content;
            }else{
                $row['mail_template_content']='';
            }
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i,$row['send_mail_id'])
            ->setCellValue('B'.$i,$row['send_user_name'])
            ->setCellValue('C'.$i,$row['mail_template_content'])
            ->setCellValue('D'.$i,date('Y-m-d H:i:s',$row['send_mail_time']))
            ->setCellValue('E'.$i,$row['recevice_address']);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('email_log');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename='管理员邮件日志'.'_'.date('Y-m-dHis');
        
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        //print_r($objWriter);die;
        $objWriter->save('php://output');
        exit;
    
    }
    
    
    public function del(){
        $this->common_function->shop_admin_priv("mail_log");//权限
        $opd = $this->input->post();
    
        //var_dump($opd);die;
        if($opd['op'] == 'list_del'){
            $del_id=isset($opd['del_id']) ? $opd['del_id'] : '';
            if($del_id){
                $data = $this->web_model->del('mail_log', 'send_mail_id', $del_id);
            }
            //var_dump($data);die;
            echo json_encode($data);
        }elseif($opd['op'] == 'ago'){
            $now_time = time();
            $time =	$now_time-3600*24*30*6;
            //print_r($time);exit;
            $data = $this->web_model->del_ago('mail_log', 'send_mail_time', $time);
    
            echo json_encode($data);
        }
    }
    /** 上传设置*/
    public function upload()
    {
        $this->common_function->shop_admin_priv("upload_setting");//权限
        /* 检查权限 */
        //admin_priv('upload_setting');//权限设置
        $code = array('img_size', 'img_extend_type');
        $cofig_data = $this->web_model->get_set($code);
        if(empty($cofig_data)){
            $cofig_data[] = array(
                'code'=>'img_size',
                'value'=>'',
                'comments'=>'图片大小设置',
            );
            $cofig_data[] = array(
                'code'=>'img_extend_type',
                'value'=>'',
                'comments'=>'图片格式',
            );
        }
        
        $this->smarty->assign('cof_data' , $cofig_data);
        $this->smarty->display('upload_set.html');
    }
    /** 修改上传设置 */
    public function upload_submit(){
        $this->common_function->shop_admin_priv("upload_setting");//权限
        //admin_priv('upload_setting');//权限设置
    	/* 允许的图片格式 */
    	$allow_file_types = '|GIF|JPG|JPEG|PNG|BMP|SWF|DOC|XLS|PPT|MID|WAV|ZIP|RAR|PDF|CHM|RM|TXT|CERT|';
    	
    	$img['size'] = trim($_POST['size'], ' ');
    	$img['ext']  = trim($_POST['ext'], ' ');
    	$data = array('state'=>true,'msg'=>'');
    	//print_r($img);exit;
    	if(!preg_match('/^\d{1,9}$/',$img['size'])){
    	    $data['msg'] = '图片文件大小仅能为数字';
    	   die(json_encode($data));
    	}
    	if($img['size'] > 4096){
    		$data['msg'] = '图片设置过大';
    		die(json_encode($data));
    	}
    	
    	$img_types = explode(',',$img['ext']);
    	foreach($img_types as $key => $val){
    		$str = '|'.strtoupper($val).'|';
    		if(stristr($allow_file_types,$str) === false){
    			$data['msg'] = '不是图片格式';
    			die(json_encode($data));
    		}
    	}
    	
    	foreach($img as $key => $val){
    		if($key == 'size'){
    			$code = 'img_size';
    		}
    		if($key == 'ext'){
    			$code = 'img_extend_type';
    		}
    		$this->db->where('code',$code);
    		$re = $this->db->update('system_config',array('value'=>$val));
    		if(!$re){
    			$data['msg'] = '修改失败';
    			die(json_encode($data));
    		}
    	}
    	$this->common_function->shop_admin_log('上传设置','edit', '平台配置');
    	$data['msg'] = '修改成功';
    	die(json_encode($data));
    	
  }
  /** 操作日志*/
  public function admin_log()
  {
      $this->common_function->shop_admin_priv("operate_log");//权限
      //admin_priv('operate_log');//权限设置
      $this->smarty->display('admin_log.html');
  }
  public function log_list(){
      $this->common_function->shop_admin_priv("operate_log");//权限
      //admin_priv('operate_log');//权限设置
      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
      $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'log_time';
      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
      $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
      $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
      
      if(isset($_GET['op'])&&$_GET['op'] == 'list_del'){
          /* 删除一项或者多项 */
          $del_id = isset($_GET['del_id']) ? $_GET['del_id'] : 0;
      
          $result = array('state'=>false, 'msg'=>"删除失败");
          $this->db->where("log_id in ($del_id)");
          $re = $this->db->delete('admin_log');  
          if($re){
              $result['state'] = true;
              $result['msg'] 	= "删除成功";
              	
              /* 记录日志 */
              $this->common_function->shop_admin_log($_GET['del_id'],'del','操作日志');
          }
          echo  json_encode($result);exit;
      }elseif(isset($_GET['op'])&&$_GET['op'] == 'delete_ago'){
          //admin_priv('upload_setting');//权限设置
          /* 删除六月前的数据 */
          $result = array('state'=>false, 'msg'=>"删除失败");
          $time = time();
          $condition = $time - 180*86400 ;
          $this->db->where("log_time <=".$condition);
          $re = $this->db->delete('admin_log');
          if($re){
              $result['state'] = true;
              $result['msg'] 	= "删除成功";
              	
              /* 记录日志 */
              $this->common_function->shop_admin_log('六个月前数据','del','操作日志');
          }
          echo json_encode($result);exit;
      }elseif(isset($_GET['op'])&&$_GET['op'] == 'export_step1'){
          $this->load->library('phpExcel');
          //include(ROOT_PATH . 'libraries/phpExcel/PHPExcel.php');
          /* 没有传过来id数据 */
      
          $id_str = empty($_GET['id'])||$_GET['id'] == '' ? 'all' : $_GET['id'];
          // 注：若id为0，也返回true
          $where = ' 1=1 ';
          if($id_str == 'all'){
              $where.= ''; 
          }else{
              //var_dump( $id_str);
              $where .= " and log_id in ($id_str)";
          }
          
          $this->db->select('*');
          $this->db->from('admin_log');
          $this->db->where($where);
          $this->db->order_by($sortname,$sortorder);
          $this->db->limit(0,20);
          $rows = $this->db->get()->result_array();
          if($qtype && $query){
              $query=trim($query);
              foreach($rows as $key=>$row){
                  if(strpos($row[$qtype],$query) === false){
                      unset($rows[$key]);
                  }
              }
          }
          //print_r($rows);exit;
          $objPHPExcel=new PHPExcel();
          $objPHPExcel->getProperties()->setCreator('jk')
          ->setLastModifiedBy('jk')
          ->setTitle('Office 2007 XLSX Document')
          ->setSubject('Office 2007 XLSX Document')
          ->setDescription('Document for Office 2007 XLSX, generated using PHP classes.')
          ->setKeywords('office 2007 openxml php')
          ->setCategory('Result file');
          $objPHPExcel->setActiveSheetIndex(0)
          ->setCellValue('A1','ID')
          ->setCellValue('B1','操作人')
          ->setCellValue('C1','操作内容')
          ->setCellValue('D1','操作时间')
          ->setCellValue('E1','IP地址');
      
          $i=2;
          foreach($rows as $k=>$v){
              $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$i,$v['log_id'])
              ->setCellValue('B'.$i,$v['admin_name'])
              ->setCellValue('C'.$i,$v['log_content'])
              ->setCellValue('D'.$i,date('Y-m-d H:i:s',$v['log_time']))
              ->setCellValue('E'.$i,$v['ip']);
              $i++;
          }
          $objPHPExcel->getActiveSheet()->setTitle('admin_log');
          $objPHPExcel->setActiveSheetIndex(0);
          $filename=urlencode('管理员日志').'_'.date('Y-m-dHis');
      
          /*
           *生成xlsx文件
           header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
           header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
           header('Cache-Control: max-age=0');
           $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
           */
          ob_end_clean();
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
          header('Cache-Control: max-age=0');
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
          $aaa = $objWriter->save('php://output');
          exit;
      }elseif(isset($_GET['op'])&&$_GET['op'] == 'get_xml'){
          $admin_name = isset($_GET['admin_name']) ? $_GET['admin_name'] : '';
          $content = isset($_GET['content']) ? $_GET['content'] : '';
          $ip = isset($_GET['ip']) ? $_GET['ip'] : '';
          $query_start_date = isset($_GET['query_start_date']) ? $_GET['query_start_date'] : '';
          $query_end_date = isset($_GET['query_end_date']) ? $_GET['query_end_date'] : '';
          $where = ' 1=1 ';
          if($admin_name !=''){
              $where .= " and admin_name like '%$admin_name%'";
          }
          if($content !=''){
              $where .= " and log_content like '%$content%'";
          }
          if($ip !=''){
              $where .= " and ip like '%$ip%'";
          }
          if($query_start_date !=''){
              $time = strtotime($query_start_date);
              $where .= " and log_time >='$time'";
          }
          if($query_end_date !=''){
              $time1 = strtotime($query_end_date);
              $where .= " and log_time <='$time1'";
          }
          $this->db->select('*');
          $this->db->from('admin_log');
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
          //print_r($rows);exit;
          $total = count($rows);
          $rows = array_slice($rows,($page-1)*$rp,$rp);
          header("Content-type: text/xml");
          $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
          $xml .= "<rows>";
          $xml .= "<page>$page</page>";
          $xml .= "<total>$total</total>";
          foreach($rows AS $key => $row){
              $xml .= "<row id='" . $row['log_id'] . "'>";
              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['log_id'] . ")'><i class='fa fa-trash-o'></i>删除</a>]]></cell>";
              $xml .= "<cell><![CDATA[".$row['admin_name']."]]></cell>";
              $xml .= "<cell><![CDATA[".$row['log_content']."]]></cell>";
              $xml .= "<cell><![CDATA[".date('Y-m-d H:i:s',$row['log_time'])."]]></cell>";
              $xml .= "<cell><![CDATA[".$row['ip']."]]></cell>";
              $xml .= "</row>";
          }
          $xml .= "</rows>";
          echo $xml;
      }
  }
  /** 地区设置
   * 地区列表，地区删除，查看下级
   * 
   * */
  public function area(){
      $this->common_function->shop_admin_priv("area_setting");//权限
      //admin_priv('area_setting');//权限设置
      if(!isset($_GET['op'])){
          $this->smarty->display('area.html');
      }
      elseif($_GET['op'] == 'get_secondLevel'){
          $sid=isset($_GET['parent_id']) ? $_GET['parent_id'] : 0;
          //print_r($_POST);
          $page=isset($_POST['curpage']) ? $_POST['curpage'] : 1;
          $rp=isset($_POST['rp']) ? $_POST['rp'] : 40;
          //$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'area_id';
          $query = isset($_POST['query']) ? $_POST['query'] : false;
          $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
          $where = " area_parent_id=".$sid;
          $this->db->select('*');
          $this->db->from('area');
          $this->db->where($where);
          $rows = $this->db->get()->result_array();
          //print_r($rows);die;
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
          foreach($rows AS $row){
              $xml .= "<row id='".$row['area_id']."'>";
              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" .$row['area_id']. ")'>
            <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em>
            <i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
            <ul>
            <li><a href='newArea?op=judge&judge=edit&area_id=" . $row['area_id'] . "'>编辑地区</a></li>
            <li><a href='newArea?op=judge&judge=add&parent_id=" . $row['area_id'] . "'>新增下级</a></li>
            <li><a href='javascript:void(0);' onclick='fg_show_children(" . $row['area_id'] . ",".$row['area_parent_id'].")'>查看下级</a></li>
            </ul></span>]]></cell>";
              $xml .= "<cell><![CDATA[".$row['area_name']."]]></cell>";
              $xml .= "<cell><![CDATA[".$row['area_region_name']."]]></cell>";
              $xml .= "<cell><![CDATA[".utf8_encode($row['area_deep'])."]]></cell>";
              $xml .= "<cell><![CDATA[".utf8_encode($row['area_parent_id'])."]]></cell>";
              $xml .= "</row>";
          }
      
          $xml .= "</rows>";
          echo $xml;
      
          //删除选中的地区信息
      }elseif($_GET['op']=='del'){
          $area_id=isset($_GET['area_id']) ? $_GET['area_id'] : '';
          $area_id=explode(',',$area_id);
          $id=array();
          $this->db->select('area_id,area_parent_id');
          $this->db->from('area');
          $idAll=$this->db->get()->result_array();
          foreach($idAll as $v){
              for($j=0; $j<count($area_id); $j++){
                  if($v['area_parent_id'] == $area_id[$j]){
                      $id[]=$v['area_id'];
                  }
              }
              for($i=0; $i<count($id); $i++){
                  if($v['area_parent_id'] == $id[$i]){
                      $id[]=$v['area_id'];
                  }
              }
          }
          for($i=0; $i<count($area_id); $i++){
              $id[]=$area_id[$i];
          }
          $id=implode(',',$id);
          //print_r($id);die;
          $this->db->where("area_id in ('$id')");
          $re = $this->db->delete('area');
          $data = array('state' => false, 'msg' => '删除失败');
          if($re){
              $this->common_function->shop_admin_log('地区id:'.$id, 'del', '地区设置');
              $data = array('state' => true, 'msg' => '删除成功');
          }
          echo json_encode($data);
      }
  }
  /** 地区增加，编辑
   * */
 public function newArea(){
     $this->common_function->shop_admin_priv("area_setting");//权限
      //admin_priv('area_setting');//权限设置
      if($_GET['op'] == 'judge'){
          $area_name=array();
          $allName='';
          $name='';
          $region_name='';
          $aid='';
          if($_GET['judge'] == 'add'){
  
              $judge='add';
              $parent_id=isset($_GET['parent_id']) ? $_GET['parent_id'] : '';
              if($parent_id && $parent_id != 0){
                  $this->db->select('*');
                  $this->db->from('area');
                  $this->db->where('area_id='.$parent_id);
                  $area_name[] = $this->db->get()->result_array();
                  $area_deep=$area_name[0][0]['area_deep']+1;
                  //print_r($area_deep);die;
                  if($area_name[0][0]['area_parent_id'] != 0){
                      $this->db->select('area_name,area_parent_id');
                      $this->db->from('area');
                      $this->db->where('area_id='.$area_name[0][0]['area_parent_id']);
                      $area_name[] = $this->db->get()->result_array();
                      if($area_name[1][0]['area_parent_id'] != 0){
                          $this->db->select('area_name,area_parent_id');
                          $this->db->from('area');
                          $this->db->where('area_id='.$area_name[1][0]['area_parent_id']);
                          $area_name[] = $this->db->get()->result_array();
                      }
                  }
              }else{
                  $area_deep=1;
              }
              for($i=count($area_name)-1; $i>=0; $i--){
                  $allName.=$area_name[$i][0]['area_name'].' ';
              }
          }
          if($_GET['judge'] == 'edit'){
              $judge='edit';
              $area_id=isset($_GET['area_id']) ? $_GET['area_id'] : '';
              if($area_id){
                  $this->db->select('*');
                  $this->db->from('area');
                  $this->db->where('area_id='.$area_id);
                  $area = $this->db->get()->result_array();
                  //print_r($area);die;
                  $aid=$area[0]['area_id'];
                  $name=$area[0]['area_name'];
                  $area_deep=$area[0]['area_deep'];
                  $parent_id=$area[0]['area_parent_id'];
                  $region_name=$area[0]['area_region_name'];
                  if($parent_id != 0){
                      $this->db->select('area_name,area_parent_id,area_deep');
                      $this->db->from('area');
                      $this->db->where('area_id='.$parent_id);
                      $area_name[] = $this->db->get()->result_array();
                      if($area_name[0][0]['area_parent_id'] != 0){
                          $this->db->select('area_name,area_parent_id,area_deep');
                          $this->db->from('area');
                          $this->db->where('area_id='.$area_name[0][0]['area_parent_id']);
                          $area_name[] = $this->db->get()->result_array();
                          if($area_name[1][0]['area_parent_id'] != 0){
                              $this->db->select('area_name,area_parent_id,area_deep');
                              $this->db->from('area');
                              $this->db->where('area_id='.$area_name[1][0]['area_parent_id']);
                              $area_name[] = $this->db->get()->result_array();
                          }
                      }
                      for($i=count($area_name)-1; $i>=0; $i--){
                          $allName.=$area_name[$i][0]['area_name'].' ';
                      }
                  }
  
              }
          }
          $this->smarty->assign('aid',$aid);
          $this->smarty->assign('judge',$judge);
          $this->smarty->assign('name',$name);
          $this->smarty->assign('region_name',$region_name);
          $this->smarty->assign('areaDeep',$area_deep);
          $this->smarty->assign('parentID',$parent_id);
          $this->smarty->assign('allName',$allName);
          $this->smarty->display('area_new.html');
      }
      //地区分级显示
      if($_GET['op'] == 'json_area'){
  
          $class=array();
          $classAll=array();
          for($i=1; $i<4; $i++){
              $this->db->select('area_id,area_name,area_parent_id');
              $this->db->from('area');
              $this->db->where('area_deep',$i);
              $class[] = $this->db->get()->result_array();
          }
          $clasA=array();
          foreach($class[0] as $v){
              $claA=array();
              foreach($v as $k){
                  $claA[]=$k;
              }
              $clasA[]=$claA;
          }
          $clasB=$class[1];
          $clasC=$class[2];
          //print_r($clasA);die;
          $classAll[]=$clasA;
          for($i=0; $i<count($clasA); $i++){
              foreach($clasB as $v){
                  if($clasA[$i][0] == $v['area_parent_id']){
                      unset($v['area_parent_id']);
                      $clasOne=array();
                      foreach($v as $k){
                          $clasOne[]=$k;
                      }
                      $classAll[$clasA[$i][0]][]=$clasOne;
                  }
              }
          }
          for($j=0; $j<count($clasB); $j++){
              foreach($clasC as $v){
                  if($clasB[$j]['area_id'] == $v['area_parent_id']){
                      unset($v['area_parent_id']);
                      $clasTwo=array();
                      foreach($v as $k){
                          $clasTwo[]=$k;
                      }
                      $classAll[$clasB[$j]['area_id']][]=$clasTwo;
                  }
              }
          }
          for($i=0; $i<count($classAll[0]); $i++){
              unset($classAll[0][$i][2]);
          }
          echo $_GET['callback']."(".json_encode($classAll).")";
      }
      //将数据添插入，或修改
      if($_GET['op'] == 'save'){
          //admin_priv('area_setting');//权限设置
          $area_id=isset($_POST['area_id']) ? $_POST['area_id'] : '';
          $area_name=isset($_POST['area_name']) ? trim($_POST['area_name']) : '';
          $area_region=isset($_POST['area_region']) ? trim($_POST['area_region']) : '';
          $area_parentID=isset($_POST['parent_id']) ? $_POST['parent_id'] : '';
          $area_deep=isset($_POST['area_deep']) ? $_POST['area_deep'] : '';
          $this->load->library('pinyin');
          $area_code = $this->pinyin->output($area_name);
          $area_code = str_replace(' ','',$area_code);
          //print_r($_POST);die;
          if($_POST['form_submit'] == 'add'){  
              $data = array('area_name'=>$area_name,
                            'area_parent_id'=>$area_parentID,
                            'area_sort'=>0,
                            'area_deep'=>$area_deep,
                            'area_region_name'=>$area_region,
                            'area_code'=>$area_code
              );
              $res = $this->db->insert('area',$data);           
              if($res === true){
                  $lang = $this->lang->line('system');
                  $links = array(
                        0 => array(
                            'text' => $lang['go_back'],
                            'href' => 'javascript:history.go(-1)'
                        ),
                        1 => array(
                            'text' => '地区列表',
                            'href' => 'area'
                        )
                   );
                  $this->common_function->shop_admin_log($area_name, 'add', '地区设置');
                  $this->common_function->show_message('新增成功' ,0 ,$links);
              }else{
                  $this->common_function->show_message('新增失败' );
              }
          }
          if($_POST['form_submit'] == 'edit'){
              //print_r($_POST);
              if($area_name){
                  $data = array(
                      'area_name'=>$area_name,
                      'area_parent_id'=>$area_parentID,
                      'area_deep'=>$area_deep,
                      'area_region_name'=>$area_region
                  );
                  $this->db->where('area_id',$area_id);
                  $res = $this->db->update('area',$data);
                  if($res === true){
                      $lang = $this->lang->line('system');
                      $links = array(
                          0 => array(
                              'text' => $lang['go_back'],
                              'href' => 'javascript:history.go(-1)'
                          ),
                          1 => array(
                              'text' => '地区列表',
                              'href' => 'area'
                          )
                      );
                      $this->common_function->shop_admin_log($area_name, 'edit', '地区设置');
                      $this->common_function->show_message('编辑成功',0 ,$links);
                  }else{
                      $this->common_function->show_message('编辑失败');
                  }
              }
          }
      }
  }
  /** 权限设置
   * */
  public function admin(){
      $this->common_function->shop_admin_priv("admin_setting");//权限
      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
      $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'log_time';
      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
      $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
      $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
      if(!isset($_GET['op'])){ 
          $this->smarty->display('admin.html');
      }elseif(isset($_GET['op']) && $_GET['op'] == 'list'){
          //admin_priv('admin_management');//权限设置
          $this->db->select('a.*, r.role_name');
          $this->db->from('admin as a');
          $this->db->join('admin_role as r','a.role_id = r.role_id','left');
          $rows = $this->db->get()->result_array();
          //print_r($admin_data);exit;
          foreach($rows as $k => $v){
              $rows[$k]['admin_login_time'] = date('Y-m-d H:i:s' , $rows[$k]['admin_login_time']);
          }
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
          foreach($rows AS $row){
              $xml .= "<row id='".$row['admin_id']."'>";
              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" .$row['admin_id']. ")'>
            <i class='fa fa-trash-o'></i>删除</a>
            <a class='btn purple' href='admin?op=edit&admin_id=".$row['admin_id']."' >
            <i class='fa fa-cog'></i>编辑</a>
            ]]></cell>";
              $xml .= "<cell><![CDATA[".$row['admin_name']."]]></cell>";
              $xml .= "<cell><![CDATA[".$row['admin_login_time']."]]></cell>";
              $xml .= "<cell><![CDATA[".$row['admin_login_num']."]]></cell>";
              $xml .= "<cell><![CDATA[".$row['role_name']."]]></cell>";
              $xml .= "</row>";
          }
          
          $xml .= "</rows>";
          echo $xml;
      }elseif(isset($_GET['op']) && $_GET['op'] == 'add_admin'){
          //新增管理员
          //admin_priv('admin_edit');//权限设置
          $role_list = $this->web_model->get_role_list();
          $this->smarty->assign('role_list', $role_list);
          $this->smarty->assign('action', 'insert_admin');
          $this->smarty->assign('data', array());
          $this->smarty->display('admin_add.html');
      }elseif(isset($_GET['op']) && $_GET['op'] == 'check_admin_name'){
          //admin_priv('admin_edit');//权限设置
          $admin_name = isset($_GET['admin_name']) ? trim($_GET['admin_name']) : false;
          if($admin_name){
              $this->db->select('admin_name');
              $this->db->from('admin');
              $this->db->where('admin_name',$admin_name);
              $re = $this->db->get()->result_array();
              if($re){
                  echo 'false';
              }else{
                  echo 'true';
              }
          }
      }elseif(isset($_GET['op']) && $_GET['op'] == 'insert_admin'){
          //admin_priv('admin_edit');//权限设置
          $admin_name = isset($_POST['admin_name']) ? trim($_POST['admin_name']) : '';
          $admin_id = isset($_POST['admin_id']) ? $_POST['admin_id'] : '';
          $admin_pwd 	= isset($_POST['admin_pwd']) ? trim($_POST['admin_pwd']) : '';
          $role_id = isset($_POST['role_id']) ? intval($_POST['role_id']) : '';
          
          $admin_pwd = encrypt_pwd($admin_pwd);
          
          $time =time();
          $ip = real_ip();
          $data = array('role_id'=>$role_id,
              'admin_name'=>$admin_name,
              'admin_pwd'=>$admin_pwd
          );
          if($admin_id && $admin_id!=''){
              $this->db->where('admin_id',$admin_id);
              $res = $this->db->update('admin',$data);
              if($res){
                  $lang = $this->lang->line('system');
                  $links = array(
                      0 => array(
                          'text' => $lang['go_back'],
                          'href' => 'javascript:history.go(-1)'
                      ),
                      1 => array(
                          'text' => '管理员列表',
                          'href' => 'admin'
                      )
                  );
                  $this->common_function->shop_admin_log('管理员'.$admin_name,'edit','管理员');
                  $this->common_function->show_message('编辑管理员'.$admin_name.'成功',0,$links);
              }else{
                  $this->common_function->show_message('编辑管理员'.$admin_name.'失败');
              }
          }else{
              $res = $this->db->insert('admin',$data);
              if($res){
                  $lang = $this->lang->line('system');
                  $links = array(
                      0 => array(
                          'text' => $lang['go_back'],
                          'href' => 'javascript:history.go(-1)'
                      ),
                      1 => array(
                          'text' => '管理员列表',
                          'href' => 'admin'
                      )
                  );
                  $this->common_function->shop_admin_log('管理员'.$admin_name,'add','管理员');
                  $this->common_function->show_message('新增管理员'.$admin_name.'成功',0,$links);
              }else{
                  $this->common_function->show_message('新增管理员'.$admin_name.'失败');
              }
          }
          
      }elseif(isset($_GET['op']) && $_GET['op'] == 'del_admin'){
          //admin_priv('admin_edit');//权限设置
          $id = empty($_REQUEST['id']) ? '' : intval($_REQUEST['id']);
          if($id){
              $result = array('statu' => false, 'msg'=> '删除成功');
              $this->db->where('admin_id',$id);
              $re = $this->db->delete('admin');
              if($re){
                  $this->common_function->shop_admin_log($id,'del', '管理员');
                  $result['statu'] = true;
                  die(json_encode($result));
              }else{
                  $result['statu'] = true;
                  $result['msg'] = '删除失败';
                  die(json_encode($result));
              }
          }
      }elseif(isset($_GET['op']) && $_GET['op'] == 'edit'){
          //admin_priv('admin_edit');//权限设置
          $admin_id = empty($_REQUEST['admin_id']) ? '' :intval($_REQUEST['admin_id']);
          if($admin_id){
              $this->db->select('*');
              $this->db->from('admin');
              $this->db->where('admin_id',$admin_id);
              $data = $this->db->get()->row_array();
              $role_list = $this->web_model->get_role_list();
              //print_r($data);exit;
              //这里是修改，和增加用的同一个模板
              $this->smarty->assign('data', $data);
              $this->smarty->assign('action', 'update_admin');
              //获取权限组
              $this->smarty->assign('role_list', $role_list);
              $this->smarty->display('admin_add.html');
          }
      }
  }
  /**
   * 角色管理
   * 
   */
  public function role(){
      $this->common_function->shop_admin_priv("role_setting");//权限
      //admin_priv('role_management');//权限设置
      $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
      $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
      $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'log_time';
      $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
      $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
      $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
      if(!isset($_GET['op'])){
          $this->smarty->display('role.html');
      }elseif(isset($_GET['op']) && $_GET['op'] == 'list'){
          $this->db->select('role_id, role_name, role_comments');
          $this->db->from('admin_role');
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
          foreach($rows AS $row){
              $xml .= "<row id='".$row['role_id']."'>";
              $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" .$row['role_id']. ")'>
            <i class='fa fa-trash-o'></i>删除</a>
            <a class='btn purple' href='role?op=edit&role_id=".$row['role_id']."' >
            <i class='fa fa-cog'></i>编辑</a>
            ]]></cell>";
              $xml .= "<cell><![CDATA[".$row['role_name']."]]></cell>";
              $xml .= "<cell><![CDATA[".$row['role_comments']."]]></cell>";
              $xml .= "</row>";
          }
          
          $xml .= "</rows>";
          echo $xml;
      }elseif (isset($_GET['op']) && $_GET['op'] == 'add_role'){
          //admin_priv('role_edit');//权限设置

          /* 获取权限的分组数据 */
          $priv_arr = $this->web_model->get_action_list();
          $this->smarty->assign('role_info', array());
          $this->smarty->assign('role_array', array());
          $this->smarty->assign('priv_arr',$priv_arr);
          $this->smarty->display('role_add.html');
      }elseif(isset($_GET['op']) && $_GET['op']=='check_name'){
          //admin_priv('role_edit');//权限设置
          $role_name = isset($_GET['gname']) ? trim($_GET['gname']) : false;
          if($role_name){
              $this->db->select('role_name');
              $this->db->from('admin_role');
              $this->db->where('role_name',$role_name);
              $re = $this->db->get()->row_array();
              if($re){
                  echo 'false';
              }else{
                  echo 'true';
              }
          }  
	  }elseif(isset($_GET['op']) && $_GET['op']=='insert_role'){
	      //角色编辑或者添加入数据库
	      //admin_priv('role_edit');//权限设置
	      $admin_name = isset($_POST['gname']) ? trim($_POST['gname']):'';
	      $priv_arr = isset($_POST['permission']) ? $_POST['permission']: array() ;
	      $role_id = isset($_POST['role_id']) ? $_POST['role_id']: false ;
	      //去重 有可能两个权限对应一个权限码的情况
	      $priv_arr = array_unique($priv_arr);	
	      $act_list = @join(",", $priv_arr);
	      //print_r($act_list);exit;
	      $data = array(
	          'role_name'=>$admin_name,
	          'role_actions'=>$act_list,
	      );
	      if($role_id){
	          $this->db->select('role_name');
              $this->db->from('admin_role');
              $this->db->where('role_id',$role_id);
              $role_name = $this->db->get()->row_array();
	          $this->db->where('role_id',$role_id);
	          $re = $this->db->update('admin_role',$data);
	          if($re){
	              $this->common_function->shop_admin_log($role_name['role_name'], 'edit', '权限角色');
	              $links = array(
	                  0=>array(
	                      'text' => '还回上一页',
	                      'href' => 'javascript:history.go(-1)',
	                  ),
	                  1=>array(
	                      'text' => '角色列表',
	                      'href' => 'role',
	                  )
	              );
	              $this->common_function->show_message( "修改&nbsp;" .$role_name['role_name'] . "&nbsp; 成功",0, $links);
	          }else{
	              $this->common_function->show_message("修改&nbsp;" .$role_name['role_name'] . "&nbsp; 失败");
	          }
	      }else{
	          if($this->db->insert('admin_role',$data)){
	              $this->common_function->shop_admin_log($admin_name, 'add', '权限角色');
	              $links = array(
	                  0=>array(
	                      'text' => '还回上一页',
	                      'href' => 'javascript:history.go(-1)',
	                  ),
	                  1=>array(
	                      'text' => '角色列表',
	                      'href' => 'role',
	                  )
	              );
	               
	               
	              $this->common_function->show_message( "增加&nbsp;" .$admin_name . "&nbsp; 成功",0, $links);
	          }else{
	              $this->common_function->show_message("增加&nbsp;" .$admin_name . "&nbsp; 失败");
	          }
	      }
	      
	  }elseif(isset($_GET['op']) && $_GET['op']=='del_role'){
	      //admin_priv('role_edit');//权限设置
	      //AJAX删除角色
	      $role_id = isset($_GET['role_id']) ? ($_GET['role_id']) : '';
	      if($role_id){
	          $this->db->select('role_name');
	          $this->db->from('admin_role');
	          $this->db->where('role_id',$role_id);
	          $role_name = $this->db->get()->row_array();
	          $this->db->where('role_id',$role_id);
	          if($this->db->delete('admin_role')){
	              $this->common_function->shop_admin_log($role_name['role_name'], 'del', '权限角色');
	              $data = array('state'=>true,'msg'=>'角色删除成功');
	      
	          }else{
	              $data = array('state'=>false,'msg'=>'角色删除失败');
	      
	          }
	      }else{
	          $data = array('state'=>false,'msg'=>'角色删除失败');
	           
	      }
	      echo json_encode($data);
	  }elseif(isset($_GET['op']) && $_GET['op']=='edit'){
	      //admin_priv('role_edit');//权限设置
	      $role_id = isset($_GET['role_id']) ? intval($_GET['role_id']) : false;
	      if($role_id){
	          $this->db->select('*');
	          $this->db->from('admin_role');
	          $this->db->where('role_id',$role_id);
	          $role_info = $this->db->get()->row_array();
	          $this->smarty->assign('role_info', $role_info);
	          $role_array = explode(',', $role_info['role_actions']);
	          $priv_arr = $this->web_model->get_action_list(); 
	          $this->smarty->assign('role_array', $role_array);
	          $this->smarty->assign('priv_arr',   $priv_arr);
	          $this->smarty->display('role_edit.html');
	      }else{
	          $this->common_function->show_message('请刷新重试！');
	      }
	  }
	  
	
  }
  
  
    //物流管理
    public  function logistics(){
        $this->common_function->shop_admin_priv("mall_express");//权限
        if(!isset($_GET['op'])){
             $this->smarty->display('logistics.html');
        }elseif(isset($_GET['op']) && $_GET['op'] == 'table'){
            //获取快递公司列表
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
                $xml .= "<row id='".$row['id']."'>";
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
                    $xml .="<li><a href='javascript:void(0);' onclick='mall_waybill_design(".$row['id'].")'>设计运单模版</a></li>";
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
            echo $xml;exit;
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
        }
     
    }
    
    /*快递公司——编辑运单模版*/
    public function logistics_edit() {
        $this->common_function->shop_admin_priv("mall_express");//权限
        $id = isset($_GET['data']) ? trim($_GET['data']) : false;
        if($id){
            $data = $this->mall_model->get_express_waybill($id);
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
        $this->smarty->display('logistics_edit.html');
    }
    /*快递公司——编辑运单模版提交*/
    public function logistics_submit() {
        $this->common_function->shop_admin_priv("mall_express");//权限
        $id = isset($_POST['waybill_id']) ? trim($_POST['waybill_id']) : false;
        $waybill_name = isset($_POST['waybill_name']) ? trim($_POST['waybill_name']) : '';
        $waybill_express = isset($_POST['waybill_express']) ? trim($_POST['waybill_express']) : '';
        $waybill_width = isset($_POST['waybill_width']) ? trim($_POST['waybill_width']) : '';
        $waybill_height = isset($_POST['waybill_height']) ? trim($_POST['waybill_height']) : '';
        $waybill_top = isset($_POST['waybill_top']) ? trim($_POST['waybill_top']) : '';
        $waybill_left = isset($_POST['waybill_left']) ? trim($_POST['waybill_left']) : '';
        $waybill_image = isset($_POST['waybill_image']) ? trim($_POST['waybill_image']) : '';
        $status = isset($_POST['status']) ? trim($_POST['status']) : 1;
        //print_r($_FILES);exit;
        $image = isset($_FILES['waybill_image']) ? $_FILES['waybill_image'] : false;
        $dir = './application/admin/views/images/';
        $upload = 'waybill_design.gif';
        if($image){
            if (!file_exists($dir) || !is_writable($dir)) {
                if (!@mkdir($dir, 0755)) {
                    if(!empty($image['name'])){
                        if(!@move_uploaded_file($image['tmp_name'],$dir.$image['name'])){
                            //print_r($v['tmp_name']);exit;
                            $upload = $image['name'];
                        }
                    }
                }
            }else{
                if(!empty($image['name'])){
                    if(@move_uploaded_file($image['tmp_name'],$dir.$image['name'])){
                        //print_r($v['tmp_name']);exit;
                        $upload = $image['name'];
                    }
                }
            }
        }
        if($waybill_express){
            $waybill_express_name = $this->mall_model->get_express_info($waybill_express,'e_name');
        }
        if($upload){
            $data = array(
                'waybill_name'=>$waybill_name,'waybill_image'=>$upload,'waybill_width'=>$waybill_width,'waybill_height'=>$waybill_height,
                'status'=>$status,'waybill_top'=>$waybill_top,'waybill_left'=>$waybill_left,
                'express_id'=>$waybill_express,'express_name'=>$waybill_express_name['e_name'],
            );
        }else{
            $data = array(
                'waybill_name'=>$waybill_name,'waybill_width'=>$waybill_width,'waybill_height'=>$waybill_height,
                'status'=>$status,'waybill_top'=>$waybill_top,'waybill_left'=>$waybill_left,
                'express_id'=>$waybill_express,'express_name'=>$waybill_express_name['e_name'],
            );
        }
        $links [0] ['text'] = '返回上一页';
        $links [0] ['href'] = 'javascript:history.go(-1)';
        $links [1] ['text'] = '快递列表';
        $links [1] ['href'] = 'logistics';
        if($id){
            $re = $this->db->where('waybill_id',$id)->update('express_waybill',$data);
            if($re){
                $this->common_function->shop_admin_log('设置快递模板'.$waybill_name,'edit', '快递模板设置');
                $this->common_function->show_message('修改成功',1,$links);
            }else{
                $this->common_function->show_message('修改失败',1,$links);
            }
        }else{
            $num = $this->db->select('count(1) as num')->where('express_id',$waybill_express)->get('express_waybill')->row('num');
            if(empty($num)){
                $re = $this->db->insert('shop_waybill',$data);
                if($re){
                    $this->common_function->shop_admin_log('设置快递模板'.$waybill_name,'add', '快递模板设置');
                    $this->common_function->show_message('添加成功',1,$links);
                }else{
                    $this->common_function->show_message('修改失败',1,$links);
                }
            }else{
                $re = $this->db->where('waybill_id',$id)->update('express_waybill',$data);
                if($re){
                    $this->common_function->shop_admin_log('设置快递模板'.$waybill_name,'edit', '快递模板设置');
                    $this->common_function->show_message('修改成功',1,$links);
                }else{
                    $this->common_function->show_message('修改失败',1,$links);
                }
            }
        }
    
    }
    /*快递公司——设计运单模版*/
    public function logistics_design(){
         $this->common_function->shop_admin_priv("mall_express");//权限
        $id = isset($_GET['data']) ? trim($_GET['data']) : false;
        if($id){
            $will_info = $this->db->select('waybill_data,waybill_id,waybill_image')->from('express_waybill')->where('express_id',$id)->get()->row_array();
            $waybill_data =unserialize($will_info['waybill_data']);
            $img = $will_info['waybill_image'];
            $img_url = TEMPLE.'images/'.$img;
            $waybill_express_name = $this->mall_model->get_express_info($id,'e_name');
            //print_r($waybill_data);exit;
            $buyer_name = $waybill_data['buyer_name'];
            $buyer_area = $waybill_data['buyer_area'];
            $buyer_address = $waybill_data['buyer_address'];
            $buyer_mobile = $waybill_data['buyer_mobile'];
            $buyer_phone = $waybill_data['buyer_phone'];
            $seller_name = $waybill_data['seller_name'];
            $seller_area = $waybill_data['seller_area'];
            $seller_address = $waybill_data['seller_address'];
            $seller_phone = $waybill_data['seller_phone'];
            $seller_company = $waybill_data['seller_company'];
            $this->smarty->assign('img',$img_url);
            $this->smarty->assign('waybill_express_name',$waybill_express_name['e_name']);
            $this->smarty->assign('buyer_name',$buyer_name);
            $this->smarty->assign('buyer_area',$buyer_area);
            $this->smarty->assign('buyer_address',$buyer_address);
            $this->smarty->assign('buyer_mobile',$buyer_mobile);
            $this->smarty->assign('buyer_phone',$buyer_phone);
            $this->smarty->assign('seller_name',$seller_name);
            $this->smarty->assign('seller_area',$seller_area);
            $this->smarty->assign('seller_address',$seller_address);
            $this->smarty->assign('seller_phone',$seller_phone);
            $this->smarty->assign('seller_company',$seller_company);
            $this->smarty->assign('data',$waybill_data);
            $this->smarty->assign('id',$will_info['waybill_id']);
            $this->smarty->display ( 'logistics_design.html' );
        }
    
    }
    //运费设计模版修改确认
    public function logistics_template_submit() {
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
                $links[1]=array('text'=>'模板列表','href'=>'mall_express');
                $links[0]=array('text'=>'返回上一页','href'=>'javascript:history.go(-1)');
                $this->common_function->show_message('设计成功',1,$links);
            }else{
                $this->common_function->show_message('设计失败');
            }
        }
        $this->common_function->show_message('设计失败');
    }
    /*快递公司——测试运单模版*/
    public function logistics_test(){
        $this->common_function->shop_admin_priv("mall_express");//权限
        $id = isset($_GET['data']) ? trim($_GET['data']) : false;
        $will_info = $this->db->select('waybill_data,waybill_id,waybill_image')->from('express_waybill')->where('express_id',$id)->get()->row_array();
        $waybill_data =unserialize($will_info['waybill_data']);
        $buyer_name = $waybill_data['buyer_name'];
        $buyer_area = $waybill_data['buyer_area'];
        $buyer_address = $waybill_data['buyer_address'];
        $buyer_mobile = $waybill_data['buyer_mobile'];
        $buyer_phone = $waybill_data['buyer_phone'];
        $seller_name = $waybill_data['seller_name'];
        $seller_area = $waybill_data['seller_area'];
        $seller_address = $waybill_data['seller_address'];
        $seller_phone = $waybill_data['seller_phone'];
        $seller_company = $waybill_data['seller_company'];
        //print_r($buyer_name);exit;
        $this->smarty->assign('img',$will_info['waybill_image']);
        $this->smarty->assign('buyer_name',$buyer_name);
        $this->smarty->assign('buyer_area',$buyer_area);
        $this->smarty->assign('buyer_address',$buyer_address);
        $this->smarty->assign('buyer_mobile',$buyer_mobile);
        $this->smarty->assign('buyer_phone',$buyer_phone);
        $this->smarty->assign('seller_name',$seller_name);
        $this->smarty->assign('seller_area',$seller_area);
        $this->smarty->assign('seller_address',$seller_address);
        $this->smarty->assign('seller_phone',$seller_phone);
        $this->smarty->assign('seller_company',$seller_company);
        //$this->smarty->assign('data',$waybill_data);
        $this->smarty->display ( 'logistics_test.html' );
    }
    
    /*快递接口*/
    public function logistics_interface(){
        $this->common_function->shop_admin_priv("depot_express");//权限
        if(!isset($_GET['op'])){
            $express_api_info = $this->mall_model->get_system_value('express_interface_api');
            $express_api_info = unserialize($express_api_info);
            $this->smarty->assign('express_api_info',$express_api_info);
            $this->smarty->display ( 'logistics_interface.html' );
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


































  /**
   * 站内信
   *
   */
    public function web_sms(){
        $this->common_function->shop_admin_priv("websms_manage");//权限
        if(!isset($_GET['op'])){
            $this->smarty->display('web_sms.html');
        }elseif(isset($_GET['op'])&&$_GET['op']=='table'){
            $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
            $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
            $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'log_time';
            $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
            $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
            $this->db->select("m.*,u.user_name,mt.send_message,(case when m.satus=1 then '已查看' when m.satus!=1 then '未查看' end)is_satus,
                (case when m.type=1 then '系统消息' when m.type=2 then '订单消息' when m.type=3 then '财务消息' end)is_type");
            $this->db->from('message as m');
            $this->db->join('user as u','u.user_id=m.rec_user_id','left');
            $this->db->join('message_text as mt','mt.mt_id=m.message_id','left');
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
            foreach($rows AS $row){
                
                $xml .= "<row id='".$row['ms_id']."'>";
                $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" .$row['ms_id']. ")'>
                <i class='fa fa-trash-o'></i>删除</a>]]></cell>";
                if(isset($row['send_user_id'])&&$row['send_user_id']!=0){
                    $send_user = $this->db->select('admin_name')->from('admin')->where('admin_id',$row['send_user_id'])->get()->row_array();
                    $xml .= "<cell><![CDATA[".$send_user['admin_name']."]]></cell>";
                }else{
                    $xml .= "<cell><![CDATA[".'系统发送'."]]></cell>";
                }
                
                $xml .= "<cell><![CDATA[".$row['user_name']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['send_message']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['is_satus']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['is_type']."]]></cell>";
                $xml .= "</row>";
            }
            
            $xml .= "</rows>";
            echo $xml;
        }
          
      }
      public function web_sms_ts(){ 
          $this->common_function->shop_admin_priv("websms_manage");//权限
          $data = isset($_POST['tpl']) ? $_POST['tpl'] : '1';
          $user_id = $this->db->select('user_id')->from('user')->where("(under_user_id is null or under_user_id='') ")->get()->result_array();
          //print_r($user_id);exit;
          $re = $this->common_function->web_sms_send('货到了货到了注意签收！！！',$user_id,2,2);
          
          if($re){
              //$this->common_function->shop_admin_log('', 'add', '信息发送');
              $result = array('state'=>true,'msg'=>'发送成功');
          }else{
              $result = array('state'=>false,'msg'=>'发送失败');
          }
          echo json_encode($result);exit;
      }
      public function web_sms_content(){
        $this->common_function->shop_admin_priv("websms_content");//权限
        if(!isset($_GET['op'])){
             $this->smarty->display('web_sms_content.html');
        }elseif(isset($_GET['op'])&&$_GET['op']=='table'){
            $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
            $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
            $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'log_time';
            $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
            $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
            $this->db->select("*");
            $this->db->from('message_text');
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
            foreach($rows AS $row){
            
                $xml .= "<row id='".$row['mt_id']."'>";
                $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" .$row['mt_id']. ")'>
                <i class='fa fa-trash-o'></i>删除</a>]]></cell>";
                if(isset($row['send_admin_id'])&&$row['send_admin_id']!=0){
                    $send_user = $this->db->select('admin_name')->from('admin')->where('admin_id',$row['send_admin_id'])->get()->row_array();
                    $xml .= "<cell><![CDATA[".$send_user['admin_name']."]]></cell>";
                }else{
                    $xml .= "<cell><![CDATA[".'系统发送'."]]></cell>";
                }
                $xml .= "<cell><![CDATA[".date('Y/m/d h:i:s',$row['send_time'])."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['send_message']."]]></cell>";
                $xml .= "</row>";
            }
            
            $xml .= "</rows>";
            echo $xml;
        }
         
      }
    public function web_sms_tpl(){
        $this->common_function->shop_admin_priv("websms_tpl");//权限
        if(!isset($_GET['op'])){
             $this->smarty->display('web_sms_tpl.html');
        }elseif(isset($_GET['op'])&&$_GET['op']=='table'){
            $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
            $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
            $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'log_time';
            $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
            $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
            $this->db->select("*");
            $this->db->from('message_templates');
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
            foreach($rows AS $row){
        
                $xml .= "<row id='".$row['template_id']."'>";
                $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" .$row['template_id']. ")'>
                <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em>
                <i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
                <ul>
                <li><a href='web_sms_tpl?op=edit&tpl_id=" . $row['template_id'] . "'>编辑模板</a></li>
                </ul></span>
                    ]]></cell>";
                $xml .= "<cell><![CDATA[".$row['template_code']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['template_subject']."]]></cell>";
                $xml .= "<cell><![CDATA[".$row['template_content']."]]></cell>";
                $xml .= "</row>";
            }
        
            $xml .= "</rows>";
            echo $xml;
        }elseif(isset($_GET['op'])&&$_GET['op']=='edit'){
            $tpl_id = isset($_GET['tpl_id']) ? $_GET['tpl_id'] : '';
            if(!empty($tpl_id)){
                $tpl = $this->db->select('*')->from('message_templates')->where('template_id',$tpl_id)->get()->row_array();
                $this->smarty->assign('tpl_id', $tpl_id);
                $this->smarty->assign('tpl', $tpl);
            }
            $this->smarty->display('web_sms_tpl_edit.html');
        }elseif(isset($_GET['op']) && $_GET['op'] == 'check'){
                //admin_priv('admin_edit');//权限设置
                $code = isset($_GET['code']) ? trim($_GET['code']) : false;
                $tpl_id = isset($_GET['id']) ? intval($_GET['id']) : false;
                if($code){
                    $this->db->select('template_code,template_id');
                    $this->db->from('message_templates');
                    $this->db->where("upper(template_code)",strtoupper($code));
                    $re = $this->db->get()->row_array();
                    if($re){
                        if($tpl_id&&!empty($tpl_id)){
                            if($tpl_id!=$re['template_id']){
                                echo 'false';
                            }else{
                                echo 'true';
                            }
                        }else{
                            echo 'false';
                        }
                        
                    }else{
                        echo 'true';
                    }
                }
          }elseif(isset($_GET['op']) && $_GET['op'] == 'del'){
              $tpl_id = isset($_POST['id']) ? intval($_POST['id']) : false;
              if($tpl_id){
                 $re = $this->db->where("template_id in ($tpl_id)")->delete('message_templates');
                  if($re){
                      $this->common_function->shop_admin_log($tpl_id, 'del', '站内信模板');
                      $data = array('state'=>true,'msg'=>'模板删除成功');
                  }else{
                      $data = array('state'=>false,'msg'=>'模板删除失败');
                  }
                  echo json_encode($data);exit;
              }
              
          }
         
      }
      public function web_tpl_edit(){
          $this->common_function->shop_admin_priv("websms_tpl");//权限
          $tpl_id = isset($_POST['tpl_id']) ? $_POST['tpl_id'] : false;
          $code = isset($_POST['code']) ? $_POST['code'] : '';
          $title = isset($_POST['title']) ? $_POST['title'] : '';
          $content = isset($_POST['content']) ? $_POST['content'] : '';
          $data = array('state'=>false,'msg'=>'编辑失败');
          if($tpl_id&&!empty($tpl_id)){
              $arr = array('template_code'=>$code,'template_subject'=>$title,'template_content'=>$content,
                  'last_modify'=>time(),'last_modify_user'=>$_SESSION['admin_id']
              );
             $re =  $this->db->where('template_id',$tpl_id)->update('message_templates',$arr);
             if($re){
                 $this->common_function->shop_admin_log($code, 'add', '站内信模板');
                 $data = array('state'=>true,'msg'=>'模板修改成功');
             }
          }else{
              $arr = array('template_code'=>$code,'template_subject'=>$title,'template_content'=>$content,
                  'add_time'=>time(),'add_user_id'=>$_SESSION['admin_id'],'last_modify'=>time(),'last_modify_user'=>$_SESSION['admin_id']
              );
              $re =  $this->db->insert('message_templates',$arr);
              if($re){
                  $this->common_function->shop_admin_log($code, 'add', '站内信模板');
                  $data = array('state'=>true,'msg'=>'模板添加成功');
              }
          }
          echo json_encode($data);exit;
        
      }
        //导航栏管理
        public function nav_list(){
            $this->smarty->display('nav_list.html');
        }
    
    //获得导航信息列表
    public function get_nav_list(){
        $page = isset($_POST['curpage']) ? $_POST['curpage'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 15;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : false;
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : false;
        $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;
        
        $total = $this->db->count_all_results('site_nav');
        $sql = "select nav_id, nav_name, nav_url, is_show, 
        case is_show when 1 then '是' 
        else '否' end is_show1, is_new_open, 
        case is_new_open when 1 then '是' 
        else '否' end is_new_open1, 
        nav_sort, nav_position, 
        case nav_position when 1 then '顶部' 
        when 2 then '底部' 
        when 3 then '页脚' end nav_position1, nav_parent_id, 
        case nav_parent_id when 0 then '--' 
        else (select s2.nav_name from {$this->db->dbprefix('site_nav')} as s2 where s2.nav_id = s1.nav_parent_id) 
        end parent_name 
        from {$this->db->dbprefix('site_nav')} as s1";
        $rows = $this->db->query($sql)->result_array();
        
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
        
            $xml .= "<row id='".$row['nav_id']."'>";
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" .$row['nav_id'].", \"{$row['nav_name']}\"".")'>
            <i class='fa fa-trash-o'></i>删除</a><span class='btn'><em>
            <i class='fa fa-cog'></i>设置 <i class='arrow'></i></em>
            <ul>
            <li><a href='javascript:edit_nav(" . json_encode($row) . ")'>编辑导航</a></li>
            </ul></span>
            ]]></cell>";
            $xml .= "<cell><![CDATA[".$row['nav_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['parent_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['nav_url']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['is_new_open1']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['is_show1']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['nav_sort']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['nav_position1']."]]></cell>";
            $xml .= "</row>";
        }
        
        $xml .= "</rows>";
        echo $xml;
    }
    
    
    //获取对应栏目的导航
    public function get_position_list($type, $select = 0){
        
        echo $this->nav_model->get_all_list($type, $select);
    }
    
    //新增导航
    public function nav_add(){
        $data = $this->input->post();
        
        if ($this->db->insert('site_nav', $data)){
            echo json_encode('添加成功');
        }else{
            echo json_encode('添加失败');
        }
    }
    
    //编辑导航
    public function nav_edit($id){
        $data = $this->input->post();
        
        if ($this->db->where('nav_id', $id)->update('site_nav', $data)){
            echo json_encode('编辑成功');
        }else{
            echo json_encode('编辑失败');
        }
    }
    
    //删除导航
    public function nav_del($id){
        if ($this->db->delete('site_nav', array('nav_id' => $id))){
            $this->nav_model->del_all_children($id);
            echo json_encode('删除成功');
        }else{
            echo json_encode('删除失败');
        }
    }
    
    
    //-- 修改密码
    /*------------------------------------------------------ */
    public function update_user_password()
    {
        $data = array('state'=>false,"msg"=>"修改失败，请稍后再试！");
        $admin_id = isset($_SESSION['shop_admin_id']) && !empty($_SESSION['shop_admin_id']) ?$_SESSION['shop_admin_id']:false;
        $admin_pwd = isset($_POST['new_password']) && !empty($_POST['new_password']) ?$_POST['new_password']:false;
        if($admin_id && $admin_pwd){
            $admin_name = $this->db->select('admin_name')->where('admin_id',$admin_id)->get('admin')->row('admin_name');
            $admin_pwd = encrypt_pwd($admin_pwd);
            $this->db->where('admin_id',$admin_id);
            $res = $this->db->update('admin',array("admin_pwd"=>$admin_pwd));
            if($res){
                $data['state']=true;
                $data['msg']="修改成功，即将重新登录";
                $this->common_function->shop_admin_log('管理员'.$admin_name.'更新密码','edit','管理员');
            }
        }
        echo  json_encode($data);exit;
    
    }
    
    
}