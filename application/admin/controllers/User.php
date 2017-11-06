<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
	/*会员管理*/
	public function user_management(){
        $this->common_function->shop_admin_priv("user_base");//权限
	    //获取授权品牌
	    $mon_start = date('Y-m-d H:i:s',mktime(0,0,0,date("m")-1,date("d"),date("Y")));

	    $week_start = date('Y-m-d H:i:s',mktime(0,0,0,date("m"),date("d")-7,date("Y")));
	    
	    $tom_start = date('Y-m-d H:i:s',mktime(0,0,0,date("m"),date("d")-1,date("Y")));
	    $tom_end   = date('Y-m-d H:i:s',strtotime($tom_start) + 86399) ;
	   
	    $now_start = date('Y-m-d H:i:s',strtotime(date('Y-m-d', time())));
	    $now_end   = date('Y-m-d H:i:s',strtotime($now_start) + 86399) ;
    
	    $this->smarty->assign('mon_start',$mon_start);
	    $this->smarty->assign('week_start',$week_start);
	    $this->smarty->assign('tom_start',$tom_start);
	    $this->smarty->assign('tom_end',$tom_end);
	    $this->smarty->assign('now_start',$now_start);
	    $this->smarty->assign('now_end',$now_end);
	    
       $this->db->select('store_id,store_name');
       $this->db->from('store');
       $stores = $this->db->get()->result_array();
       $this->smarty->assign('stores',$stores);
	   $this->smarty->display ( 'user_management.html' );
    }
    //根据店铺id查询导购
    public  function get_guide_info(){
        $res = array("state"=>false,"data"=>"");
        $storeid = isset($_POST['storeid'])  && !empty($_POST['storeid']) ? $_POST['storeid']:false;
        if($storeid){
               $this->db->select('spg_id,spg_nike_name,spg_name,spg_store_id');
               $this->db->from('store_shopping_guide');
               $this->db->where('spg_store_id',$storeid);
               $this->db->order_by('spg_id');
               $store = $this->db->get()->result_array();
               if(!empty($store)){
                   $res['state'] = true;
                   $res['data'] = $store;
               }else{
                   $res['state'] = false;
                   //$res['data'] = $store;
               }
        }
        echo  json_encode($res);exit;
    }
    
    public function user_list(){
        $this->common_function->shop_admin_priv("user_base");//权限
        //print_r($_GET);exit;
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? $_POST['query'] : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        
        $start_time = isset($_GET['start_time'])?trim($_GET['start_time']):'';
        $end_time = isset($_GET['end_time'])?trim($_GET['end_time']):'';
        $time = isset($_GET['time'])?trim($_GET['time']):'';
        
        $monney = isset($_GET['monney'])?trim($_GET['monney']):'';
        $start_monney = isset($_GET['start_monney'])?trim($_GET['start_monney']):'';
        $end_monney = isset($_GET['end_monney'])?trim($_GET['end_monney']):'';
        
//         $wx_num = isset($_GET['wx_num'])?trim($_GET['wx_num']):'';
        $num = isset($_GET['num'])?trim($_GET['num']):'';
        $start_num = isset($_GET['start_num'])?trim($_GET['start_num']):'';
        $end_num = isset($_GET['end_num'])?trim($_GET['end_num']):'';
        
        $understore = isset($_GET['understore'])?trim($_GET['understore']):'';
        $underguide = isset($_GET['underguide'])?trim($_GET['underguide']):'';
        //$card = isset($_GET['card'])?trim($_GET['card']):'';
        //$card_num = isset($_GET['card_num'])?trim($_GET['card_num']):'';
        $true_name = isset($_GET['true_name'])?trim($_GET['true_name']):'';
        $wx_nike = isset($_GET['wx_nike'])?trim($_GET['wx_nike']):'';
        $mobile = isset($_GET['mobile'])?trim($_GET['mobile']):'';
        $store=$this->db->select('store_id')->where('ous_type',1)->get('store')->result_array();
        foreach ($store as $v){
            $stores[]=$v['store_id'];
        }
        $store_str= join(',', $stores);
        $where = "ecstore_id IN ({$store_str})";
        if ($query && $qtype){
            $where .= " and {$qtype} = {$query}";
        }
        
        if($time!='all'){
            if($start_time!="" && $end_time!=""){
                $where .= " and reg_time >=".strtotime($start_time)." and reg_time <=".strtotime($end_time)." ";
            }
            
           if($start_time!="" && $end_time==""){
                $where .= " and reg_time >=".strtotime($start_time)." ";
            }
           
        }
        
        if($monney!='all'){
            if($start_monney!="" && $end_monney!=""){
                $where .= " and order_money_num >'{$start_monney}' and order_money_num <='{$end_monney}' ";
            }
            
            if($start_monney!="" && $end_monney==""){
                $where .= " and order_money_num >='{$start_monney}' ";
            }
        }
        
        
        if($num!='all'){
            if($start_num!="" && $end_num!=""){
                 $where .= " and order_num >'{$start_num}' and order_num <='{$end_num}' ";
            }
            
            if($start_num!="" && $end_num==""){
                $where .= " and order_num >'{$start_num}'  ";
            }
        }
//         if($wx_num){
//             $where .= " and wx_openid like '%{$wx_num}%' ";
//         }
        if($understore){
            $where .= " and ecstore_id='{$understore}' ";
        }
        if($underguide){
            $where .= " and ecshopping_guide_id='{$underguide}' ";
        }
//         if($card){
//             $where .= " and order_num <='{$end_num}' ";
//         }
//         if($card_num){
//             $where .= " and order_num <='{$end_num}' ";
//         }
        if($true_name){
            $where .= " and true_name like '%{$true_name}%' ";
        }
        if($wx_nike){
            $where .= " and wx_nickname like '%{$wx_nike}%' ";
        }
        if($mobile){
            $where .= " and tel like '%{$mobile}%' ";
        }
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        $total = $this->common_function->total('user', $where);
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('user', $where);
        $grades = $this->db->get('user_mldefault')->result_array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
            
            $this->db->select('uig_id,user_id,integral_num');
            $this->db->from('user_integral');
            $this->db->where("user_id",$row['user_id']);
            $this->db->order_by('uig_id','ASC');
            $integral= $this->db->get()->result_array();
            if(count($integral)>=2){
                $integration = 0;
                foreach ($integral as $key=>$val){
                    $integration+=$val['integral_num'];
                }
            }elseif (count($integral)==1){
                $integration = $integral[0]['integral_num'];
            }else{
                $integration = 0;
            }
            $row['integral'] = $integration;
            
            
            $wheres  = " buyer_id ='{$row['user_id']}' and (order_status = '20' or order_status = '30' or order_status = '40') order by order_sn asc";
            $this->db->select('buyer_id,order_sn,order_price');
            $this->db->from('shop_order');
            $this->db->where($wheres);
            $orderinfo= $this->db->get()->result_array();
            $row['order_num'] = count($orderinfo);
            $row['order_money_num'] = 0;
            if($orderinfo){
                $integration = 0;
                foreach ($orderinfo as $key=>$val){
                    $row['order_money_num']+=$val['order_price'];
                }
            }
            
            
            $this->db->select('uw.ubofw_id,uw.wx_action,uw.wx_action_time,uw.wx_action_value,sg.spg_name,sg.spg_id');
            $this->db->from('user_bind_or_follow_wx as uw');
            $this->db->join('store_shopping_guide as sg','sg.spg_id=uw.wx_action_value','left');
            $this->db->where("uw.user_id",$row['user_id']);
            $this->db->where("uw.wx_action",'3');
            $this->db->order_by('uw.wx_action_time','DESC');
            $ecshopping_guide= $this->db->get()->row_array();
            if($ecshopping_guide){
                $row['ecshopping_guide_id'] = $ecshopping_guide['spg_name'];
            }else{
                $row['ecshopping_guide_id'] = "无";
            }
            
            
            
            $xml .= "<row id='".$row['user_id']."'>";
            $xml .= "<cell><![CDATA[<a class='btn red' onclick=fg_delete({$row['user_id']},'{$row['user_name']}')>
            <i class='fa fa-trash-o'></i>删除</a>
            <a class='btn green' href='member_edit/{$row['user_id']}'>编辑</a>
            ]]></cell>";
            $row['head_portrait'] = $row['head_portrait']?$row['head_portrait']:base_url().'application/admin/views/images/default_user_portrait.gif';
            $xml .= "<cell><![CDATA[<img src=\"".$row['head_portrait'].'" class="user-avatar"'.
                ' onerror="this.src=\''.TEMPLE.'images/default_user_portrait.gif\'" style="border-radius:50%;height:80%;"'.
                ' data-geo="<img src=\''.$row['head_portrait'].'\' width=300px >">'.
                $row['user_name']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['tel']."]]></cell>";
            $sex = $row['member_sex']==0?'保密':($row['member_sex']==1?'男':'女');
            $xml .= "<cell><![CDATA[".$sex."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['ecshopping_guide_id']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['order_num']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['order_money_num']."]]></cell>";
            /* $xml .= "<cell><![CDATA[".$row['is_follow']."]]></cell>"; */
            $xml .= "<cell><![CDATA[".$row['integral']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['balance']."]]></cell>";
           /*  $xml .= "<cell><![CDATA[".$row['rechargeable_card_num']."]]></cell>"; */
            $row['reg_time'] = !empty($row['reg_time']) ? date('Y/m/d H:i:s',$row['reg_time']) : '--';
            $xml .= "<cell><![CDATA[".$row['reg_time']."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }
	/*会员管理——新增会员*/
	public function user_management_add(){
        $this->common_function->shop_admin_priv("user_base");//权限
		$this->smarty->display ( 'user_management_add.html' );
    }
    //导出会员
    public  function user_management_excel(){
        $this->common_function->shop_admin_priv("user_base");//权限
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
                $where .= " and user_id in ($id_str)";
            }
        
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where($where);
            $rows = $this->db->get()->result_array();
            foreach($rows AS $row){
            
                $this->db->select('uig_id,user_id,integral_num');
                $this->db->from('user_integral');
                $this->db->where("user_id",$row['user_id']);
                $this->db->order_by('uig_id','ASC');
                $integral= $this->db->get()->result_array();
                if(count($integral)>=2){
                    $integration = 0;
                    foreach ($integral as $key=>$val){
                        $integration+=$val['integral_num'];
                    }
                }elseif (count($integral)==1){
                    $integration = $integral[0]['integral_num'];
                }else{
                    $integration = 0;
                }
                $row['integral'] = $integration;
            
            
                $wheres  = " buyer_id ='{$row['user_id']}' and refund_state = '0' and order_status = '20' or order_status = '30' or order_status = '40' order by order_sn asc";
                $this->db->select('buyer_id,order_sn,order_price');
                $this->db->from('shop_order');
                $this->db->where($wheres);
                $orderinfo= $this->db->get()->result_array();
                $row['order_num'] = count($orderinfo);
                $row['order_money_num'] = 0;
                if($orderinfo){
                    $integration = 0;
                    foreach ($orderinfo as $key=>$val){
                        $row['order_money_num']+=$val['order_price'];
                    }
                }
            
            
                $this->db->select('uw.ubofw_id,uw.wx_action,uw.wx_action_time,uw.wx_action_value,sg.spg_name,sg.spg_id');
                $this->db->from('user_bind_or_follow_wx as uw');
                $this->db->join('store_shopping_guide as sg','sg.spg_id=uw.wx_action_value','left');
                $this->db->where("uw.user_id",$row['user_id']);
                $this->db->where("uw.wx_action",'3');
                $this->db->order_by('uw.wx_action_time','DESC');
                $ecshopping_guide= $this->db->get()->row_array();
                if($ecshopping_guide){
                    $row['ecshopping_guide_id'] = $ecshopping_guide['spg_name'];
                }else{
                    $row['ecshopping_guide_id'] = "无";
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
            ->setCellValue('B1','会员信息')
            ->setCellValue('C1','手机号')
            ->setCellValue('D1','性别')
            ->setCellValue('E1','最近绑定导购')
            ->setCellValue('F1','付款订单数')
            ->setCellValue('G1','付款订单金')
            ->setCellValue('H1','剩余积分')
            ->setCellValue('I1','账户余额')
            ->setCellValue('J1','加入时间');;
        
            $i=2;
            foreach($rows as $k=>$v){
                $sex = $v['member_sex']==0?'保密':($v['member_sex']==1?'男':'女');
                $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i,$v['user_id'])
                ->setCellValue('B'.$i,$v['user_name'])
                ->setCellValue('C'.$i,$v['tel'])
                ->setCellValue('D'.$i,$sex)
                ->setCellValue('E'.$i,$v['ecshopping_guide_id'])
                ->setCellValue('F'.$i,$v['order_num'])
                ->setCellValue('G'.$i,$v['order_money_num'])
                ->setCellValue('H'.$i,$v['integral'])
                ->setCellValue('I'.$i,$v['balance'])
                ->setCellValue('J'.$i,!empty($row['reg_time']) ? date('Y/m/d H:i:s',$row['reg_time']) : '--');
                $i++;
            }
            $objPHPExcel->getActiveSheet()->setTitle('admin_log');
            $objPHPExcel->setActiveSheetIndex(0);
            $filename=urlencode('会员列表').'_'.date('Y-m-dHis');
        
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
    }
    
   
    public function get_user_info(){
        $this->common_function->shop_admin_priv("user_base");//权限
        $op = (isset($_GET['op']) && !empty($_GET['op'])) ? $_GET['op']: false;
        $user_id = (isset($_GET['user_id']) && !empty($_GET['user_id'])) ? $_GET['user_id'] : false;
        
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? $_POST['query'] : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = "1 = '1'";
        if ($query && $qtype){
            $where .= " and {$qtype} = {$query}";
        }
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        if($user_id){
	        if($op =="guide"){
	            $this->db->select('ubofw_id,wx_action,wx_action_time,wx_action_value,note');
	            $this->db->from('user_bind_or_follow_wx');
	            $this->db->where("user_id",$user_id);
	            $this->db->where($where);
	            $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp); 
	            header("Content-type: text/xml");
		        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		        $xml .= "<rows>";
		        $xml .= "<page>$page</page>";
		        $xml .= "<total>$total</total>";
		        foreach($rows AS $row){
		            $row['wx_action_time'] = !empty($row['wx_action_time']) ? date('Y-m-d H:i:s',$row['wx_action_time']) : '--';
			        if($row['wx_action']==1){
	                    $row['wx_action'] = "创建用户";
                    }elseif ($row['wx_action']==2){
                        $row['wx_action'] = "关注公众号";
                    }elseif ($row['wx_action']==3){
                        $row['wx_action'] = "绑定导购";
                    }elseif ($row['wx_action']==4){
                        $row['wx_action'] = "绑定门店";
                    }elseif ($row['wx_action']==5){
                        $row['wx_action'] = "取消关注公众号";
                    }elseif ($row['wx_action']==6){
                        $row['wx_action'] = "解绑门店";
                    }elseif ($row['wx_action']==7){
                        $row['wx_action'] = "解绑导购";
                    }
		            $xml .= "<row id='".$row['ubofw_id']."'>";
		            $xml .= "<cell><![CDATA[".$row['wx_action_time']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['wx_action']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['note']."]]></cell>";
		            $xml .= "</row>";
		        }
		        $xml .= "</rows>";
		        echo $xml;exit;
	            
	        }elseif($op =="order"){
	            $this->db->select('created_time,buyer_id,order_status,shipping_type,store_id,pay_type,store_name,shipping_type,order_price,goods_num,logistics_company_name,order_sn,order_price,pay_time');
	            $this->db->from('shop_order');
	            $this->db->where("buyer_id",$user_id);
	            $this->db->where($where);
	            //$this->db->order_by('created_time', 'DESC');
	            $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp); 
	            header("Content-type: text/xml");
		        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		        $xml .= "<rows>";
		        $xml .= "<page>$page</page>";
		        $xml .= "<total>$total</total>";
		        foreach($rows AS $row){
		            $row['created_time'] = !empty($row['created_time']) ? date('Y-m-d H:i:s',$row['created_time']) : '--';
		            if($row['order_status']==0){
	                    $row['order_status'] = "已取消";
                    }elseif ($row['order_status']==10){
                        $row['order_status'] = "未付款";
                    }elseif ($row['order_status']==20){
                        $row['order_status'] = "已付款";
                    }elseif ($row['order_status']==30){
                        $row['order_status'] = "已发货";
                    }elseif ($row['order_status']==40){
                        $row['order_status'] = "已收货";
                    }
                    
		           if($row['pay_type']==1){
	                    $row['pay_type'] = "微信";
                    }elseif ($row['pay_type']==2){
                        $row['pay_type'] = "线下";
                    }elseif ($row['pay_type']==3){
                        $row['pay_type'] = "余额";
                    }
                    
		           if($row['shipping_type']==1){
	                    $row['shipping_type'] = "快递";
                    }else{
                        $row['shipping_type'] = "自提";
                    }
                    
		            $xml .= "<row id='".$row['order_sn']."'>";
		            $xml .= "<cell><![CDATA[<a class='btn red' href=".base_url('admin.php/business/business_order_details?order_sn='.$row['order_sn'])."><i class='fa fa-trash-o'></i>订单详情</a>]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['order_sn']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['store_name']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['order_status']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['pay_type']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['shipping_type']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['order_price']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['created_time']."]]></cell>";
		            $xml .= "</row>";
		        }
		        $xml .= "</rows>";
		        echo $xml;exit;
	        }elseif($op =="integral"){
	            $this->db->select('u.uig_id,u.user_id,u.integral_num,u.action_user_id,u.ation_time,u.action_type,u.note,a.admin_name');
	            $this->db->from('user_integral as  u');
	            $this->db->join('admin as a','a.admin_id=u.action_user_id','left');
	            $this->db->where("u.user_id",$user_id);
	            $this->db->where($where);
	            $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp); 
	            header("Content-type: text/xml");
		        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		        $xml .= "<rows>";
		        $xml .= "<page>$page</page>";
		        $xml .= "<total>$total</total>";
		        foreach($rows AS $row){
		        	$row['ation_time'] = !empty($row['ation_time']) ? date('Y-m-d H:i:s',$row['ation_time']) : '--';
		           /* if($row['action_type']==1){
	                    $row['action_type'] = "手动增减";
                    }else{
                        $row['action_type'] = "系统增减";
                    }*/
                    
		            $xml .= "<row id='".$row['uig_id']."'>";
		            $xml .= "<cell><![CDATA[".$row['ation_time']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['admin_name']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['action_type']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['integral_num']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['note']."]]></cell>";
		            $xml .= "</row>";
		        }
		        $xml .= "</rows>";
		        echo $xml;exit;
	        }elseif($op =="mld_exp"){
	            
	        }elseif($op =="spg_content"){
	            $this->db->select('u.osgpe_id,u.order_sn,u.spg_id,u.evaluation_label,u.evaluation_time,t.order_sn,t.spg_id,t.spg_name,t.store_name,t.buyer_id');
	            $this->db->from('shop_order_shoppingguide_evaluation as  u');
	            $this->db->join('shop_order as t','t.order_sn=u.order_sn and u.spg_id = t.spg_id','left');
	            $this->db->where("t.buyer_id",$user_id);
	            $this->db->where($where);
	            $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp); 
	            header("Content-type: text/xml");
		        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		        $xml .= "<rows>";
		        $xml .= "<page>$page</page>";
		        $xml .= "<total>$total</total>";
		        foreach($rows AS $row){
		        	$row['evaluation_time'] = !empty($row['evaluation_time']) ? date('Y-m-d H:i:s',$row['evaluation_time']) : '--';
		            $xml .= "<row id='".$row['osgpe_id']."'>";
		            $xml .= "<cell><![CDATA[".$row['evaluation_time']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['spg_name']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['store_name']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['order_sn']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['evaluation_label']."]]></cell>";
		            $xml .= "</row>";
		        }
		        $xml .= "</rows>";
		        echo $xml;exit;
	        }elseif($op =="order_content"){
	            $this->db->select('rec_id,order_sn,goods_name,evaluation_state,evaluation_content,evaluation_time');
	            $this->db->from('shop_order_goods');
	            $this->db->where("user_id",$user_id);
	            $this->db->where("evaluation_state",'1');
	            $this->db->where($where);
	            $rows= $this->db->get()->result_array();
                $total = count($rows);
                $start = $rp * ($page - 1);
                $rows = array_slice($rows,$start,$rp); 
	            header("Content-type: text/xml");
		        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		        $xml .= "<rows>";
		        $xml .= "<page>$page</page>";
		        $xml .= "<total>$total</total>";
		        foreach($rows AS $row){
		        	$row['evaluation_time'] = !empty($row['evaluation_time']) ? date('Y-m-d H:i:s',$row['evaluation_time']) : '--';
		            $xml .= "<row id='".$row['rec_id']."'>";
		            $xml .= "<cell><![CDATA[".$row['evaluation_time']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['goods_name']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['order_sn']."]]></cell>";
		            $xml .= "<cell><![CDATA[".$row['evaluation_content']."]]></cell>";
		            $xml .= "</row>";
		        }
		        $xml .= "</rows>";
		        echo $xml;exit;
	        }
        	
        }
    }
    /*修改会员信息qq/tel*/
    public function update_user_info(){
        $op = (isset($_GET['op']) && !empty($_GET['op'])) ? $_GET['op']: false;
        $user_id = (isset($_GET['user_id']) && !empty($_GET['user_id'])) ? $_GET['user_id']: false;
        $data= (isset($_GET['str']) && !empty($_GET['str'])) ? $_GET['str']: false;
        $result = array('state'=>false, 'msg'=>"修改失败");
        if($op && $user_id && $data){
           if($op=="tel"){
               $inner=array("tel"=>$data);
           }else{
               $inner=array("qq"=>$data);
           }
           $this->db->where('user_id',$user_id);
           $res= $this->db->update('user',$inner);
           if($res){
               $result['state']=true;
           }
        }
        echo  json_encode($result);exit;
    }

    /*会员管理的编辑*/
    public function member_edit($id = false){
        $this->common_function->shop_admin_priv("user_base");//权限
        if ($id === false){
            $this->smarty->assign('operate', 'add');
        }else{
            
            $rows = $this->common_function->get_rows('user', "user_id = ".$id);
            $row = $rows[0];
            $row['head_portrait'] = $row['head_portrait']?$row['head_portrait']:base_url().'application/admin/views/images/default_user_portrait.gif';
            $row['reg_time'] = !empty($row['reg_time']) ? date('Y/m/d H:i:s',$row['reg_time']) : '--';
            if($row['ecshopping_guide_id']){
                $row['spg_name'] = $this->db->select('spg_name')->where('spg_id',$row['ecshopping_guide_id'])->get('store_shopping_guide')->row('spg_name');
            }else{
                $row['spg_name'] = "";
            }
            
            $this->db->select('u.uig_id,u.user_id,u.integral_num,u.action_user_id,u.ation_time,u.action_type,u.note,a.admin_name');
            $this->db->from('user_integral as  u');
            $this->db->join('admin as a','a.admin_id=u.action_user_id','left');
            $this->db->where("u.user_id",$row['user_id']);
            $this->db->order_by('u.uig_id','ASC');
            $integral= $this->db->get()->result_array();
            if(count($integral)>=2){
                $integration = 0;
                foreach ($integral as $key=>$val){
                    $integration+=$val['integral_num'];
                }
            }elseif (count($integral)==1){
                $integration = $integral[0]['integral_num'];
            }else{
                $integration = 0;
            }
            $row['integral'] = $integration;
            $row['integral_numer'] = count($integral);
            $row['integral_info'] = $integral;
            
            
         /*   $this->db->select('mld_id,mld_name,mld_exp');
            $this->db->from('user_mldefault');
            $this->db->order_by('mld_id','ASC');
            $mldefault= $this->db->get()->result_array();
            if(count($mldefault)>=2){
                foreach ($mldefault as $key=>$val){
                    if($key<(count($mldefault)-2)){
                        $num1 = $mldefault[$key]['mld_exp'];
                        $num2 = $mldefault[$key+1]['mld_exp'];
                        if($integration<$num2){
                            $row['mld_name'] = $mldefault[$key]['mld_name'];
                        }
                    }else{
                        $row['mld_name'] = $mldefault[$key]['mld_name'];
                    }
                }
            }elseif (count($integral)<=1){
                $row['mld_name'] = "初级粉丝";
            }*/

            $query=$this->db->select('mld_exp,mld_name,mld_id')->order_by('mld_exp DESC')->get('jk_user_mldefault')->result_array();
            $res=array();
            foreach ($query as $k=>$v){
                if($v['mld_exp']<=$row['integral_total']){
                    $res=$v;
                    break;
                }
            }
            $row['mld_name'] = $res['mld_name'];
            
            
            $wheres  = " buyer_id ='{$row['user_id']}' and refund_state = '0' and (order_status = '20' or order_status = '30' or order_status = '40') order by pay_time desc";
            
            $this->db->select('buyer_id,order_sn,order_price,pay_time');
            $this->db->from('shop_order');
            $this->db->where($wheres);
            $orderinfo= $this->db->get()->result_array();
            $row['order_num'] = count($orderinfo);
            $row['pay_time'] = !empty($orderinfo[0]['pay_time']) ? date('Y/m/d H:i:s',$orderinfo[0]['pay_time']) : '--';
            $row['order_money_num'] = 0;
            if($orderinfo){
                $integration = 0;
                foreach ($orderinfo as $key=>$val){
                    $row['order_money_num']+=$val['order_price'];
                }
            }
            
            
            $this->db->select('ubofw_id,wx_action,wx_action_time,wx_action_value');
            $this->db->from('user_bind_or_follow_wx');
            $this->db->where("user_id",$row['user_id']);
            $this->db->where("wx_action",'3');
            $this->db->order_by('wx_action_time','DESC');
            $ecshopping_guide= $this->db->get()->row_array();
            if($ecshopping_guide){
                $row['ecshopping_guide_id'] = $ecshopping_guide['wx_action_value'];
            }else{
                $row['ecshopping_guide_id'] = "";
            }
            
            
            $this->db->select('coupon_id,coupon_ger_time,coupon_cost_time');
            $this->db->from('user_coupon');
            $this->db->where("user_id",$row['user_id']);
            $this->db->where("coupon_cost_time <".time());
            $this->db->order_by('coupon_id','DESC');
            $coupon = $this->db->get()->result_array();
            $row['coupon_num'] = count($coupon);
            
            
            
            $this->db->select('ubofw_id,wx_action,wx_action_time,wx_action_value,note');
            $this->db->from('user_bind_or_follow_wx');
            $this->db->where("user_id",$row['user_id']);
            $this->db->order_by('wx_action_time','DESC');
            $wx_action= $this->db->get()->result_array();
            if($wx_action){
                foreach ($wx_action as $key=>$val){        
                    $wx_action[$key]['wx_action_time'] = !empty($val['wx_action_time']) ? date('Y-m-d H:i:s',$val['wx_action_time']) : '--';
                    if($val['wx_action']==1){
                        $wx_action[$key]['wx_action'] = "创建用户";
                    }elseif ($val['wx_action']==2){
                        $wx_action[$key]['wx_action'] = "关注公众号";
                    }elseif ($val['wx_action']==3){
                        $wx_action[$key]['wx_action'] = "绑定导购";
                    }elseif ($val['wx_action']==4){
                        $wx_action[$key]['wx_action'] = "绑定门店";
                    }elseif ($val['wx_action']==5){
                        $wx_action[$key]['wx_action'] = "取消关注公众号";
                    }elseif ($val['wx_action']==6){
                        $wx_action[$key]['wx_action'] = "解绑门店";
                    }elseif ($val['wx_action']==7){
                        $wx_action[$key]['wx_action'] = "解绑导购";
                    }
                   
                }
                $row['wx_action'] = $wx_action;
                $row['action_nums'] = count($wx_action);
            }else{
                $row['wx_action'] = array();
                $row['action_nums'] =0;
            }
           
            
            
            
    
            $this->smarty->assign('info', $row);
            $this->smarty->assign('operate', 'editing');
            
        }
        $this->smarty->display ( 'member_edit.html' );
    }
    
    
    
    //检查会员是否存在
    
    public function member_name_check(){
        $name = trim($this->input->post('member_name'));
        if($this->common_function->total('user', "user_name = '{$name}'") != 0){
            echo "false";
        }else{
            echo "true";
        }
    }
    //检查会员邮箱是否存在
    public function member_mail_check(){
        $mail = trim($this->input->post('member_email'));
        if($this->common_function->total('user', "user_name = '{$mail}'") != 0){
            echo "false";
        }else{
            echo "true";
        }
    }
    //新增会员
    public function member_add(){
        $this->common_function->shop_admin_priv("user_base");//权限
        //print_r($_POST);exit;
        $data = $this->input->post();
        $inn['pwd'] = encrypt_pwd(trim($data['member_pwd']));
        $inn['user_name'] = trim($data['member_name']);
        $inn['true_name'] = trim($data['member_truename']);
        //$inn['QQ'] = trim($data['member_qq']);
        //$inn['aliId'] = trim($data['member_ww']);
        $inn['user_email'] = trim($data['member_email']);
        $inn['member_sex'] = $data['member_sex'];
        $inn['is_status'] = $data['member_state'];
    
        if (!empty ( $_FILES ['_pic'] ['name'] )) {
            $tmp_file = $_FILES ['_pic'] ['tmp_name'];
            $file_types = explode ( ".", $_FILES ['_pic'] ['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];
            if (!in_array(strtolower ( $file_type ), array('gif','jpeg','png','bmp','jpg'))) {
                $return = array(
                    'state'=>false,
                    'msg'=>"不是图片文件，重新稍后上传"
                );
                echo json_encode($return);
                exit();
            }
            $savePath = ROOTPATH . 'data/member_img/'; // 设置上传路径
            $str = date ( 'YmdHis' ) . uniqid (); // 以时间来命名上传的文件
            $file_name = $str . "." . $file_type; // 是否上传成功
            if (! copy ( $tmp_file, $savePath . $file_name )) {
                $return = array(
                    'state'=>false,
                    'msg'=>"图片上传失败，请稍后重新上传"
                );
                echo json_encode($return);
                exit();
            }
            $inn['head_portrait'] = 'data/member_img/'.$file_name;
        }
        $inn['reg_time'] = time();
    
        if($this->db->insert('user',$inn)){
            $return = array(
                'state'=>true,
                'msg'=>"添加成功"
            );
            echo json_encode($return);
            exit();
        }else{
            $return = array(
                'state'=>false,
                'msg'=>"添加失败"
            );
            echo json_encode($return);
            exit();
        }
    }
    
    //删除用户
    public function member_del(){
        $this->common_function->shop_admin_priv("user_base");//权限
        $ids = $_POST['id'];
        $ids = explode(',', $ids);
        if (is_array($ids)){
            foreach ($ids as $id){
                $img = $this->db->select('head_portrait')->where('user_id', $id)->get('user')->row('head_portrait');
                if ($this->db->delete('user',array('user_id'=>$id))){
                    @unlink(ROOTPATH.$img);
                }else{
                    echo json_encode('删除失败');
                    exit();
                }
            }
        }
        echo json_encode('删除成功');
        exit();
    }
    /*积分管理——积分明细*/
    public function user_integral_detail(){
        $this->common_function->shop_admin_priv("user_management");//权限
        //var_dump($_SESSION);die;
        $this->smarty->display ( 'user_integral_detail.html' );
    }
    public function integral_log(){
        $this->common_function->shop_admin_priv("user_management");//权限
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? $_POST['query'] : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = ' 1';
        if ($query && $qtype){
            $where .= " and {$qtype} = {$query}";
        }
        $total = $this->common_function->total('shop_points_log', $where);
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('shop_points_log', $where);
        $grades = $this->db->get('user_mldefault')->result_array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
            $xml .= "<row id='".$row['pl_id']."'>";
            $xml .= "<cell><![CDATA[--]]></cell>";
            $xml .= "<cell><![CDATA[".$row['pl_id']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['pl_memberid']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['pl_membername']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['pl_points']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['pl_stage']."]]></cell>";
            $row['pl_addtime'] = !empty($row['pl_addtime']) ? date('Y/m/d H:i:s',$row['pl_addtime']) : 0;
            $xml .= "<cell><![CDATA[".$row['pl_addtime']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['pl_desc']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['pl_adminname']."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }
    /*积分管理——规则设置*/
    public function user_rule_set(){
        $this->common_function->shop_admin_priv("user_management");//权限
        //查询是否已有积分规则
        $user_rule = $this->db->select('value')->where('code',"integral_rule")->get('system_config')->row_array();
        $data = unserialize($user_rule['value']);	 
        //print_r($data);exit;
        $grade = $this->db->select('*')->get('user_mldefault')->result_array();
        foreach ($grade as $k=>$v){
            $grade[$k]['points'] = isset($data['points_reg'][$v['mld_id']])?$data['points_reg'][$v['mld_id']]:0;
        }
        $this->smarty->assign("user_rule",$data);
        $this->smarty->assign("grade",$grade);
        $this->smarty->display ('user_rule_set.html' );
    }
    /*积分管理——修改积分规则*/
    public function user_rule_update(){
        $this->common_function->shop_admin_priv("user_management");//权限
        $data = serialize($_POST);
        //如果提交的数据某值为空，则终止程序，返回对应的键名
        foreach ($_POST as $key=>$val){
            if($val==""){
               echo json_encode($key);
               die;
            }
        }
        //print_r($data);exit;
        //更新操作
        $user_rule = $this->db->update("system_config",array("value"=>$data),array("code"=>"integral_rule"));
    	if($user_rule){
    		echo json_encode("success");
    	}else{
    		echo json_encode("false");
    	}
    }
    /*积分管理——积分比率*/
    public function user_integral_rate(){
        $this->common_function->shop_admin_priv("user_management");//权限
        if($this->db->where('code',"integral_rate")->count_all_results('system_config')){
            $value = $this->db->select('value')->where('code',"integral_rate")->get('system_config')->row('value');
        }else{
            $this->db->insert('system_config',['code'=>'integral_rate','type'=>'text','value'=>1000,'comments'=>'积分兑换比率']);
            $value = 1000;
        }
        $this->smarty->assign('value',$value);
        $this->smarty->display('user_integral_rate.html');
    }
    /*积分管理——修改积分比率*/
    public function user_integral_rate_set(){
        $this->common_function->shop_admin_priv("user_management");//权限
        //更新操作
        $value = $this->input->post('integral_rate');
        $user_rule = $this->db->update("system_config",array("value"=>$value),array("code"=>"integral_rate"));
    	if($user_rule){
    		echo json_encode("success");
    	}else{
    		echo json_encode("false");
    	}
    }
    /*积分管理——积分增减*/
    public function user_integral_change(){
        $this->common_function->shop_admin_priv("user_management");//权限
        $this->smarty->display ( 'user_integral_change.html' );
    }
    //检查用户积分
    public function check_name_jf(){
        $name = trim($_POST['name']);
        $data = $this->db->select('user_id, integral,user_name')->like('user_name', $name,'both')->get('user')->result_array();
        if ($data){
            echo json_encode(array('state'=>true,'info'=>$data));
        }else{
            echo json_encode(array('state'=>false));
        }
    }
    //积分修改
    public function integral_change(){
        $this->common_function->shop_admin_priv("user_management");//权限
        //print_r($_POST);exit;
        $user_id = $_POST['member_id'];
        if(empty($user_id)){
            echo json_encode('修改失败');exit;
        }
        $user_name = trim($_POST['member_name']);
        $pointsdesc = $_POST['pointsdesc'];
        $menber = $this->db->select('integral,integral_total,user_name')->where('user_id', $user_id)->get('user')->row_array();
        $point = $menber['integral'];
        $point_all = $menber['integral_total'];
        if ($_POST['operatetype'] == 1){
            $points = trim($_POST['member_points']);
            $point_all =$point_all+ $points;
        }elseif ($_POST['operatetype'] == 2){
            $points = 0- trim($_POST['member_points']);
        }
        $point = $point+$points;
        $member_points = ($point < 0) ? 0 : $point;
        $log = array(
            'pl_memberid'=> $user_id,
            'pl_membername'=>$menber['user_name'],
            'pl_points'=>$points,
            'pl_desc'=>$pointsdesc,
            'pl_adminid'=>$_SESSION['shop_admin_id'],
            'pl_adminname'=>$_SESSION['shop_admin_name'], 
            'pl_addtime'=>time(), 
            'pl_stage_type'=>5, 
            'pl_stage'=>'管理员修改'
            
        );
        $this->db->trans_start();
        $this->db->update('user',array('integral'=>$member_points,'integral_total'=>$point_all),array('user_id'=>$user_id));
        $this->db->insert('shop_points_log',$log);
        $this->db->trans_complete();
        if ($this->db->trans_status())
        {
            echo json_encode('修改成功');
        }else{
            echo json_encode('修改失败');
        }
        $this->db->trans_off();
    }
    /*积分管理——积分等级*/
    public function user_integral_grade(){
        $this->common_function->shop_admin_priv("user_management");//权限
        $grades = $this->db->order_by('mld_id', 'ASC')->get('user_mldefault')->result_array();
        $this->smarty->assign('grades', $grades);
        $this->smarty->display ( 'user_integral_grade.html' );
    }
    //等级积分修改
    public function grade_change(){
        $this->common_function->shop_admin_priv("user_management");//权限
        $data = $this->input->post('grade');
        $grade_name = $this->input->post('grade_name');
        //print_r($_POST);exit;
        /* $this->db->trans_start();
        $this->db->where(' 1= 1 ')->delete('user_mldefault'); */
        foreach ($data as $k=>$v){
            //$this->db->insert('user_mldefault', array('mld_exp'=>$v,'mld_name'=>$grade_name[$k]));
            $this->db->where('mld_name',$grade_name[$k])->update('user_mldefault', array('mld_exp'=>$v));
        }
        $this->db->trans_complete();
        if ($this->db->trans_status())
        {
            echo json_encode('修改成功');
        }else{
            echo json_encode('修改失败');
        }
        $this->db->trans_off();
        
    }
    /*经验管理——经验明细*/
    public function user_exp_detail(){
        $this->common_function->shop_admin_priv("user_management");//权限
        //var_dump($_SESSION);die;
        $this->smarty->display ( 'user_exp_detail.html' );
    }
    public function exp_log(){
        $this->common_function->shop_admin_priv("user_management");//权限
        $rp = (isset($_POST['rp']) && !empty($_POST['rp'])) ? $_POST['rp'] : 15;
        $page = (isset($_POST['curpage']) && !empty($_POST['curpage'])) ? $_POST['curpage'] : 1;
        $sortorder = (isset($_POST['sortorder']) && !empty($_POST['sortorder'])) ? $_POST['sortorder'] : false;
        $sortname = (isset($_POST['sortname']) && !empty($_POST['sortname'])) ? $_POST['sortname'] : false;
        $query = (isset($_POST['query']) && !empty($_POST['query'])) ? $_POST['query'] : false;
        $qtype = (isset($_POST['qtype']) && !empty($_POST['qtype'])) ? $_POST['qtype'] : false;
        $where = ' 1';
        if ($query && $qtype){
            $where .= " and {$qtype} = {$query}";
        }
        $total = $this->common_function->total('shop_exppoints_log', $where);
        if ($sortname && $sortorder){
            $where .= " order by {$sortname} {$sortorder}";
        }
        $start = $rp * ($page - 1);
        $where .= " limit $start, $rp";
        $rows = $this->common_function->get_rows('shop_exppoints_log', $where);
        $grades = $this->db->get('user_mldefault')->result_array();
        header("Content-type: text/xml");
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<rows>";
        $xml .= "<page>$page</page>";
        $xml .= "<total>$total</total>";
        foreach($rows AS $row){
            $xml .= "<row id='".$row['exp_id']."'>";
            $xml .= "<cell><![CDATA[--]]></cell>";
            $xml .= "<cell><![CDATA[".$row['exp_id']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['exp_memberid']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['exp_membername']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['exp_points']."]]></cell>";
            $row['exp_addtime'] = !empty($row['exp_addtime']) ? date('Y/m/d H:i:s',$row['exp_addtime']) : 0;
            $xml .= "<cell><![CDATA[".$row['exp_addtime']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['exp_stage']."]]></cell>";
            $xml .= "<cell><![CDATA[".$row['exp_desc']."]]></cell>";
            $xml .= "</row>";
        }
        $xml .= "</rows>";
        echo $xml;
    }
    /*经验管理——规则设置*/
    public function user_exp_rule_set(){
        $this->common_function->shop_admin_priv("user_management");//权限
        //查询是否已有经验规则
        $user_rule = $this->db->select('value')->where('code',"exp_rule")->get('system_config')->row_array();
        $data = unserialize($user_rule['value']);	    
        $this->smarty->assign("user_rule",$data);
        $this->smarty->display ('user_exp_rule_set.html' );
    }
    /*经验管理——修改经验规则*/
    public function user_exp_rule_update(){
        $data = serialize($_POST);
        //如果提交的数据某值为空，则终止程序，返回对应的键名
        foreach ($_POST as $key=>$val){
            if($val==""){
               echo json_encode($key);
               die;
            }
        }
        //更新操作
        $user_rule = $this->db->update("system_config",array("value"=>$data),array("code"=>"exp_rule"));
    	if($user_rule){
            echo json_encode("success");
    	}else{
            echo json_encode("false");
    	}
    }
    /*经验管理——经验等级*/
    public function user_exp_grade(){
        $this->common_function->shop_admin_priv("user_management");//权限
        $grades = $this->db->order_by('mld_id', 'ASC')->get('user_mldefault')->result_array();
        $this->smarty->assign('grades', $grades);
        $this->smarty->display ( 'user_exp_grade.html' );
    }
    //等级经验修改
    public function exp_grade_change(){
        $data = $this->input->post('grade');
        $this->db->trans_start();
        foreach ($data as $k=>$v){
            $this->db->update('user_mldefault', array('mld_exp'=>$v), array('mld_id'=>$k));
        }
        $this->db->trans_complete();
        if ($this->db->trans_status())
        {
            echo json_encode('修改成功');
        }else{
            echo json_encode('修改失败');
        }
        $this->db->trans_off();
        
    }
    /*分享绑定*/
    public function user_shared_binding(){
        $this->smarty->display ( 'user_shared_binding.html' );
    }
    /*分享绑定——编辑*/
    public function user_shared_binding_edit(){
        $this->smarty->display ( 'user_shared_binding_edit.html' );
    }
}
