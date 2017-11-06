<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sms extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library('Sms');
        $this->load->model('sms_mail_model');
    }
    
    public function set(){
        $this->common_function->shop_admin_priv("sms_setting");//权限
        $sms['user'] = $this->common_function->get_system_value('sms_user_name');
        $sms['password'] = $this->common_function->get_system_value('sms_password');
        $sms['sms_sign'] = $this->common_function->get_system_value('sms_sign');
        $this->smarty->assign('sms',$sms);
        $this->smarty->display('sms_set.html');
    }
    
    public function setting(){
        $this->common_function->shop_admin_priv("sms_setting");//权限
        $sms['sms_user_name'] = $this->input->post('user');
        $sms['sms_password'] = $this->input->post('password');
        $sms['sms_sign'] = $this->input->post('sms_sign');
        
        foreach ($sms as $kay => $value)
        {
            $result = $this->common_function->change_system_value($kay, $value);
            //var_dump($result);exit();
            if (!$result)
            {
                echo json_encode('修改失败');
                exit();
            }
        }
        echo json_encode('修改成功');
        exit();
    }
    
   public function count(){

       $store=$this->db->select('store_id,store_name')->get('store')->result_array();
      // var_dump($store);
       //exit;
       $this->smarty->assign('store', $store);
       $this->smarty->display('sms_count.html');
   }
    public function get_count(){
        $this->common_function->shop_admin_priv("sms_log");//权限
        $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件11
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
        $page = isset($_POST['curpage']) ? intval($_POST['curpage']) : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 5;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'send_sms_id';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';

        $store_id=isset($_GET['store_id']) ? $_GET['store_id'] : '0';

        //var_dump($query);var_dump($qtype);var_dump($page);var_dump($rp);var_dump($sortname);var_dump($sortorder);die;
        $start = ($page-1)*$rp;
        $rows = $store=$this->db->select('template_id,template_subject')->limit($start, $rp)->get('sms_templates')->result_array();
 // var_dump($start);


        $total = $this->common_function->total('sms_templates');
//var_dump($total);

        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $key => $row){



            if($store_id=='0'){
                $row['total']=$this->db->query("select count(*) as total,a.sms_template_id from jk_sms_log as a left join
                            jk_sms_templates as b on b.template_id=a.sms_template_id
                               where  a.sms_template_id={$row['template_id']}  ")->row()->total;
                $row['success']=$this->db->query("select count(*) as total,a.sms_template_id from jk_sms_log as a left join
                            jk_sms_templates as b on b.template_id=a.sms_template_id
                               where a.sms_template_id={$row['template_id']} and a.received_state=2 ")->row()->total;
                $row['effective']=$this->db->query("select count(*) as total from jk_sms_log where
                 effective='1' and sms_template_id={$row['template_id']}")->row()->total;
            }else{
                $row['total']=$this->db->query("select count(*) as total,a.sms_template_id from jk_sms_log as a left join
                            jk_sms_templates as b on b.template_id=a.sms_template_id
                               where a.store_id={$store_id} and a.sms_template_id={$row['template_id']}  ")->row()->total;
                $row['success']=$this->db->query("select count(*) as total,a.sms_template_id from jk_sms_log as a left join
                            jk_sms_templates as b on b.template_id=a.sms_template_id
                               where a.store_id={$store_id} and a.sms_template_id={$row['template_id']} and a.received_state=2 ")->row()->total;
                $row['effective']=$this->db->query("select count(*) as total from jk_sms_log where store_id={$store_id}
                                  and effective='1' and sms_template_id={$row['template_id']}")->row()->total;
            }


            if(isset($row['total'])&&$row['total']!=0){
               // $row['chance']=$row['success']/$row['total']*100;
                $row['chance']=number_format($row['success']/$row['total']*100,1);
                $row['chance']=$row['chance'] .'%';
            }else{
                $row['chance']='';
            }


           // $xml .= "<row id='" . $row['send_sms_id'] . "'>";
         //   $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['send_sms_id'] . ")'><i class='fa fa-trash-o'></i>删除</a>]]></cell>";
            $xml .= "<row>";
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete()'><i class='fa fa-trash-o'></i>删除</a>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['template_subject']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['template_id']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['total']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['success']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['chance']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['effective']."]]></cell>";
        //    $xml .= "<cell><![CDATA[".$row['received_msg']."]]></cell>";
            $xml .= "</row>";
        }
        //print_r($rows);exit;
        $xml .= "</rows>";
        echo $xml;
//select 模板id

    }
    
    public function send_test(){

        $this->common_function->shop_admin_priv("sms_setting");//权限
        //测试短信
        $username = trim($this->input->post('user'));
        $password = trim($this->input->post('password'));
        $test = $this->input->post('sms_test');
	    $template_sms_id = $this->db->select('template_sms_id')->where('template_code','shop_id_auth')->get('sms_templates')->row('template_sms_id');
	    $template_id = $this->db->select('template_id')->where('template_code','shop_id_auth')->get('sms_templates')->row('template_id');
	    $template_content = $this->db->select('template_content')->where('template_code','shop_id_auth')->get('sms_templates')->row('template_content');
	    $customer = '哈哈测试';
	    $content = array('customer'=>"$customer");
	    $data['phone'] = $test;
	    $data['content'] = json_encode($content);
	    $data['template_sms_id'] = 'SMS_62130010';
	    $result = array('state'=>false,'msg'=>'');
	    $send_user_ip = real_ip();
	    $resp = $this->common_function->AlidayuSms($data);
        $flag = 0;
        if(isset($resp['result']['err_code'])&&$resp['result']['err_code']==0){
	        $flag = 1;
	        $result = array('state'=>true,'data'=>'发送成功');
	    }else{
	        $flag = 0;
	        $result['data'] = isset($resp['sub_msg'])?$resp['sub_msg']:$resp['msg'];
	        echo json_encode($result);exit;
	    }
        $send_sms_time = time();
        $send_user_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : '0';
        $send_user_ip = real_ip();$time = time();
        $sql = 'INSERT INTO ' . $this->db->dbprefix( 'sms_log' ) .
	    ' (send_sms_time,sms_template_id,send_user_id,send_user_ip,recevice_mobile,is_success,back_message,recevice_content) '
	        . " VALUES( '{$time}', $template_id, '{$_SESSION["shop_admin_id"]}', '{$send_user_ip}', '{$test}', $flag, '{$result['data']}', '{$template_content}')";
        if ($this->db->query($sql))
        {
            $result['state'] = true;
            $result['data'] = '发送成功';
            echo json_encode($result);
        }else 
        {
            $result['data'] = '发送成功但写入日志失败';
            echo json_encode($result);
        }
        
    }
    
    public function templates(){
        $this->common_function->shop_admin_priv("sms_template");//权限
        $rows = $this->sms_mail_model->all_tp('sms');
        $this->smarty->assign('sms_tpl', $rows);
        $this->smarty->display('sms_tpl.html');
    }
    
    /**
     * @param unknown $tp_id    模版ID
     */
    public function tp_change($tp_id){
        $this->common_function->shop_admin_priv("sms_template");//权限
        //界面加载--修改邮件模版
        $row = $this->sms_mail_model->get_tp($tp_id, 'sms');
        $this->smarty->assign('tpl_list', $row);
        $this->smarty->display('sms_tpl_edit.html');
    }
    
    public function tp_edit($tp_id){
        $this->common_function->shop_admin_priv("sms_template");//权限
        //修改邮件模版操作
        $content = $this->input->post('content');
        $content = str_replace('<p>','',$content);
        $content = str_replace('</p>','',$content);
        $data = array(
            'template_code' => $this->input->post('code'),
            'template_subject' => $this->input->post('title'),
            'template_content' => $content,
            'template_sms_id' => $this->input->post('template_sms_id'),
            'template_cate_id' => $this->input->post('template_cate_id'),
            'type' => '1'
            );
        //print_r($data);die;
        $this->db->where('template_id', $tp_id);
        $result = $this->db->update('sms_templates', $data);
        if ($result){
            echo json_encode('修改成功');
        }
    }
    
    public function log(){
        $this->common_function->shop_admin_priv("sms_log");//权限
        //界面加载
        $result=$this->db->select('api_id,api_key,code,url')->where(array('code !='=>''))->get('sms_api')->result_array();

       foreach ($result as $res) {


           $url = $res['url'] . '?method=GetNum&account=' . $res['api_id'] . '&password=' . $res['api_key'];

           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

           $back = curl_exec($ch);
           curl_close($ch);
           libxml_disable_entity_loader(true);

           $xmlstring = simplexml_load_string($back, 'SimpleXMLElement', LIBXML_NOCDATA);

           $val = json_decode(json_encode($xmlstring), true);
           if($res['code']=='GJYZM'){
               $val['num']=intval($val['num']/100);
           }


           $this->smarty->assign("{$res['code']}","{$val['num']}");

          // $num[]=array("{$res['code']}"=>"{$val['num']}");

       }
       // $this->smarty->assign("num",$num);





        $this->smarty->display('sms_log.html');
    }
    
    public function get_log(){
        $this->common_function->shop_admin_priv("sms_log");//权限
        //获取邮件日志
        $query = isset($_POST['query']) ? $_POST['query'] : false;	//搜索查询的条件
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;	//搜索查询的类别admin
        $page = isset($_POST['curpage']) ? intval($_POST['curpage']) : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 40;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'send_sms_id';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        
        //var_dump($query);var_dump($qtype);var_dump($page);var_dump($rp);var_dump($sortname);var_dump($sortorder);die;
        $where = '';

        if($_GET&&$_GET['choose']){  //recived_state字段表示互亿无限回执，0为未返回，1为发送失败，2为成功
            if($_GET['choose']=='2'){
                $where .= " AND is_success=1 AND received_state=0 ";//审核中
            }elseif($_GET['choose']=='3'){
                $where .= " AND is_success=1 AND received_state=2 ";//成功
            }elseif($_GET['choose']=='4'){
                $where .= " AND is_success=1 AND received_state=1 ";//失败
            }else{
                $where .='';
            }


        }


        if($query && $qtype){
            $where .= " AND $qtype LIKE '%$query%' ";
        }



        $start = ($page-1)*$rp;
        $where .= " order by send_sms_time DESC limit $start, $rp";
        
        $rows = $this->sms_mail_model->get_log($where, 'sms');
        $total = $this->common_function->total('sms_log');
        
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $key => $row){
            if($row['send_user_id']==0){
                $row['send_user_name']='系统';
            }else{

                    $msg = $this->common_function->get_duanxin_send_name($row['send_user_id'],$row['login_user_type']);
                $row['send_user_name']=$msg['name'];
            }
            if($row['sms_template_id']!=0){
                $tmp = $this->common_function->get_tp($row['sms_template_id'], 'sms');
                $row['sms_template_content']=$tmp['template_content'];
            }else{
                $row['sms_template_content']='';
            }
            if($row['is_success'] == 1){
                $row['send_status'] = '成功';
            }elseif($row['is_success'] == 0){
                $row['send_status'] = '失败';
            }else{
                $row['send_status'] = '';
            }
            if($row['received_state']== 0){
                $row['received_state']='审核中';
            }elseif( $row['received_state']==1){
                $row['received_state']='发送失败';
            }else{
                $row['received_state']='发送成功';
            }
             if($row['received_msg']=='0'){
                 $row['received_msg']='';
             }

            $xml .= "<row id='" . $row['send_sms_id'] . "'>";
            $xml .= "<cell><![CDATA[<a class='btn red' onclick='fg_delete(" . $row['send_sms_id'] . ")'><i class='fa fa-trash-o'></i>删除</a>]]></cell>";
            $xml .= "<cell><![CDATA[".$row['send_user_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['recevice_content']."]]></cell>";
            $xml .= "<cell><![CDATA[".utf8_encode(date('Y-m-d H:i:s', $row['send_sms_time']))."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['recevice_mobile']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['send_status']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['received_state']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['received_msg']."]]></cell>";
            $xml .= "</row>";
        }
        //print_r($rows);exit;
        $xml .= "</rows>";
        echo $xml;
    }
    
    public function excel($ids){
        $this->common_function->shop_admin_priv("sms_log");//权限
        if ($ids == ''){
            $rows = $this->sms_mail_model->get_log(' AND 1', 'sms');
        }else 
        {
            $where = " AND send_sms_id IN(".$ids.")";
            $rows = $this->sms_mail_model->get_log($where, 'sms');
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
        ->setCellValue('E1','手机号码');
        
        $i=2;
        foreach($rows as $k=>$row){
            if($row['send_user_id']==0){
                $row['send_user_name']='系统';
            }else{
                $row['send_user_name']=$this->db->query("SELECT admin_name FROM ".$this->db->dbprefix('admin')." where admin_id=".$row['send_user_id'])->row()->admin_name;
            }
            if($row['sms_template_id']!=0){
                $row['sms_template_content']=$this->db->query("SELECT template_content FROM ".$this->db->dbprefix('sms_templates')." where template_id=".$row['sms_template_id'])->row()->template_content;
            }else{
                $row['sms_template_content']='';
            }
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i,$row['send_sms_id'])
            ->setCellValue('B'.$i,$row['send_user_name'])
            ->setCellValue('C'.$i,$row['sms_template_content'])
            ->setCellValue('D'.$i,date('Y-m-d H:i:s',$row['send_sms_time']))
            ->setCellValue('E'.$i,$row['recevice_mobile']);
            $i++;
        }
        $objPHPExcel->getActiveSheet()->setTitle('sms_log');
        $objPHPExcel->setActiveSheetIndex(0);
        $filename=urlencode('管理员短信日志').'_'.date('Y-m-dHis');
        
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
        $this->common_function->shop_admin_priv("sms_log");//权限
        
        $opd = $this->input->post();
        
        //var_dump($opd);die;
        if($opd['op'] == 'list_del'){
            $del_id=isset($opd['del_id']) ? $opd['del_id'] : '';
            if($del_id){
                $data = $this->sms_mail_model->del('sms_log', 'send_sms_id', $del_id);
            }
            //var_dump($data);die;
            echo json_encode($data);
        }elseif($opd['op'] == 'ago'){
            $now_time = time();
            $time =	$now_time-3600*24*30*6;
            //print_r($time);exit;
            $data = $this->sms_mail_model->del_ago('sms_log', 'send_sms_time', $time);
        
            echo json_encode($data);
        }
    }

/*    function  update_sms_log_effective($tel='13281232655'){

        $arr=$this->db->select('send_sms_id,send_sms_time')->where('recevice_mobile =',$tel)->get('sms_log')->result_array();
    //  var_dump($arr);
        $time=0;
        foreach($arr as $key=>$value){
            if($value['send_sms_time']>$time){
                $time=$value['send_sms_time'];
                $send_sms_id=$value['send_sms_id'];
            }
        }
        $data=array('effective'=>'1');
        $this->db->where('send_sms_id =',$send_sms_id)->update('sms_log', $data);

    }*/




    
}