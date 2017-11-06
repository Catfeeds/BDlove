
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    private $config_img;
    public function __construct() {
        
        parent::__construct();
        $this->load->model('weixin_model');
        $this->load->model("store_model");
        $this->load->model("goods_model");
        $config_images = $this->common_function->get_default_img();
        $this->smarty->assign('config_images', $config_images);
        $this->config_img = $config_images;
        
    }
	public  function wheels(){
		$type = isset($_GET['type'])?$_GET['type']:'';
		$where = '';$time = time();
		if(empty($type)){
			$this->weixin_model->get_user_openid(base_url('vmall.php/promotion/wheels'));
			$where = " w.status=1 and w.start_time<=$time and w.end_time>=$time ";
		}else{
			if($type=='off'){
				$where = " (w.status=1 and w.end_time<$time) or w.status=2  ";
			}elseif($type=='will'){
				$where = " w.status=1 and w.start_time>$time ";
			}
		}

		$this->db->select('w.*,g.goods_name,g.goods_image')
		->from('shop_p_lottery_wheel w')
		->join('shop_goods g','g.goods_id=w.goods_id','left')
		->where($where);
		if(empty($type)){
			$this->db->order_by('w.start_time','DESC');
		}elseif($type=='off'){
			$this->db->order_by('w.end_time','DESC');
		}elseif($type=='will'){
			$this->db->order_by('w.start_time','ASC');
		}
		$rows = $this->db->get()->result_array();
		$this->smarty->assign('rows',$rows);
		$this->smarty->assign('type',$type);
		$this->smarty->assign('defaultImg',$this->config_img);
		
		$this->smarty->display('customerLotteryWheel_list.html');
		exit;
		
	}
	public  function wheels_show(){
		$wheels_id = isset($_GET['wheels_id'])?intval($_GET['wheels_id']):'';
		$dai_user_id = isset($_GET['dai_user_id'])?$_GET['dai_user_id']:'';
//		$_SESSION['user_id'] = 5403;
		$user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
		$wheels = $this->db->select('wheels_name,wheels_id,wheels_image,store_id')->where('wheels_id',$wheels_id)->get('shop_p_lottery_wheel')->row_array();
//		var_dump ($wheels);

		if(!empty($dai_user_id)){
			//代抽进入的界面
			if(!empty($_SESSION['user_id'])){
				unset($_SESSION['user_id']);
			}
			$wx_openid_status = $this->weixin_model->get_wx_openid(base_url('vmall.php/promotion/wheels_show?wheels_id='.$wheels_id.'&dai_user_id='.$dai_user_id));
			if($wx_openid_status){
				$wx_openid = $_SESSION['dai_wx_openid'];
				$check_openid = $this->db->select('wx_openid,user_id')->where('wx_openid',$wx_openid)->where('is_status',1)->get('user')->row_array();
				if($check_openid['user_id']==$dai_user_id){
					$this->weixin_model->get_user_openid(base_url('vmall.php/promotion/wheels_show?wheels_id='.$wheels_id));
					$user_id = $_SESSION['user_id'] = $check_openid['user_id'];
					$qrcode = $this->common_function->get_plat_qrcode();
					$this->smarty->assign('wheels',$wheels);
					$this->smarty->assign('qrcode',$qrcode);
					$this->smarty->assign('user_id',$user_id);
					$this->smarty->display('lottery_wheel.htm');
				}else{
					$dai_user = $this->db->select('user_id,user_name,tel,wx_nickname,is_follow')->where('wx_openid',$wx_openid)->where('is_status',1)->get('user')->row_array();
					if(empty($dai_user)){
						$dai_user['is_follow']=0;
						
						/* $time = time();
						 $this->db->insert('user',array('reg_time'=>$time,'is_status'=>1,'is_follow'=>0,'wx_openid'=>$wx_openid,'wx_create_time'=>$time,'wx_ceateymd'=>date("Y-m-d",$time)));
						 $user_id = $this->db->insert_id();
						 $this->session->set_userdata(array('dai_user_id'=>$user_id)); */
					}elseif($dai_user['is_follow']!=1){
						//还未关注
					}
					$wheels['ous_ewm'] = PLUGIN.'data/two_code/qrcode_1.png';
					if($dai_user['is_follow']!=1){
						//下载门店活动二维码
						$url = base_url("vmall.php/receive/create_code_activity?id=".$wheels['store_id']."&act_id=".$wheels_id."&type=1");
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$output = curl_exec($ch);
						curl_close($ch);
						$jsoninfo = json_decode($output, true);
						if($jsoninfo['state']==true){
							$wheels['ous_ewm'] = PLUGIN.$jsoninfo['data'];
						}
					}
					
					$dai_user['wx_openid'] = $wx_openid;
					$dai_user['wx_openid_nickname'] = $_SESSION['dai_wx_openid_nickname'];
					$dai_user['wx_openid_headimgurl'] = $_SESSION['headimgurl'];
					$this->smarty->assign('dai_user',$dai_user);
					$qrcode = $this->common_function->get_plat_qrcode();
					$this->smarty->assign('wheels',$wheels);
					$this->smarty->assign('qrcode',$qrcode);
					$this->smarty->assign('dai_user_id',$dai_user_id);
					$this->smarty->display('lottery_wheel_dai.htm');
				}
				
			}else{
				die;
			}
		}else{
			if(empty($user_id)){
				$this->weixin_model->get_user_openid(base_url('vmall.php/promotion/wheels_show?wheels_id='.$wheels_id));
				$user_id = $_SESSION['user_id'];
			}
			$qrcode = $this->common_function->get_plat_qrcode();
			$this->smarty->assign('wheels',$wheels);
			$this->smarty->assign('qrcode',$qrcode);
			$this->smarty->assign('user_id',$user_id);
			$this->smarty->display('lottery_wheel.htm');
		}
		
	}
	//大转盘奖品信息获取
	private function get_wheels_prize($wheels_id){
		
		$rows = $this->db->select('*')->where('wheels_id',$wheels_id)->get('shop_p_lottery_wheel_prize')->result_array();
//		var_dump ($rows);
		$rewardVoList = array();
		//（1折扣卷，2满送卷，3积分，4实物，5现金红包）',
		foreach ($rows as $k=>$v){
			$name = '';$img = '';$coupon_id = '';$goods_id = $v['goods_id'];$store_id = '';$coupon_code = '';
			switch (intval($v['prize_type']))
			{
				case 1:
					$coupon_discount = $this->db->select('coupon_id,coupon_value,coupon_code')->where('coupon_id',$v['coupon_id'])->get('shop_coupon')->row_array();
					$name = ($coupon_discount['coupon_value']*10).'折券';$coupon_id = $coupon_discount['coupon_id'];$coupon_code = $coupon_discount['coupon_code'];
					$wheels_prize_value = $coupon_discount['coupon_value']*10;
					break;
				case 2:
					$coupon_man = $this->db->select('coupon_id,coupon_value,coupon_value,coupon_code')->where('coupon_id',$v['coupon_id'])->get('shop_coupon')->row_array();
					$coupon_mj=explode(',',$coupon_man['coupon_value']);
					$coupon_man['coupon_order_limit']=$coupon_mj[0];
                    $coupon_man['coupon_value']=$coupon_mj[1];
					$name = '订单满'.$coupon_man['coupon_order_limit'].'送'.$coupon_man['coupon_value'];
					$wheels_prize_value = $coupon_man['coupon_order_limit'].','.$coupon_man['coupon_value'];
					$coupon_id = $coupon_man['coupon_id'];$coupon_code = $coupon_man['coupon_code'];
					break;
				case 3:
                    $coupon_value = $this->db->select('coupon_id,coupon_value,coupon_code')->where('coupon_id',$v['coupon_id'])->get('shop_coupon')->row_array();
                    $coupon_id=$coupon_value['coupon_id'];
					$name = $v['point'].'积分';
					$wheels_prize_value= $v['point'];
					break;
				case 4:
					$coupon_goods = $this->db->select('g.goods_name,g.goods_image,g.shipping_status,g.shipping_store,g.goods_id,s.store_name')
					->from('shop_p_lottery_wheel_goods g')
					->join('store s','s.store_id=g.shipping_store')
					->where('g.wheels_prize_id',$v['wheels_prize_id'])->get()->row_array();
					$name = $coupon_goods['goods_name'];$img = $coupon_goods['goods_image'];
					$wheels_prize_value = $coupon_goods['goods_id'];
					break;
				case 5:
                    $coupon_value = $this->db->select('coupon_id,coupon_value,coupon_code')->where('coupon_id',$v['coupon_id'])->get('shop_coupon')->row_array();
                    $coupon_id=$coupon_value['coupon_id'];
					$cash = explode(',',$v['cash']);
					if(isset($cash[1])&&$cash[1]!=$cash[0]){
						$name = $cash[0].'-'.$cash[1].'元随机红包';$wheels_prize_value = $v['cash'];
					}else{
						$name = $cash[0].'元红包';$wheels_prize_value = $v['cash'];
					}
					break;
				default:
					$name = '';
					break;
			}
			$rewardVoList[$k] = array(
					'rewardType'=>$v['prize_type'],//奖品类型
					'productPicUrl'=>$img,//图片
					'luckyDrawRewardId'=>$k,//奖品位置
					'luckyDrawRewardPercent'=>$v['prize_percent'],//奖品概率
					'wheels_prize_id'=>$v['wheels_prize_id'],//奖品ID
					'wheels_prize_value'=>$wheels_prize_value,//奖品值
					'rewardName'=>$name,//奖品名称
					'goods_id'=>$goods_id,//奖品名称
					'store_id'=>$store_id,//奖品名称
					'coupon_id'=>$coupon_id,//卷id
					'coupon_code'=>$coupon_code,//卷码
					'prize_have'=>$v['prize_have'],//剩余奖品数量
					'prize_num'=>$v['prize_num'],//奖品总量
					'prize_limit'=>$v['prize_limit'],//奖品总量
					
					
			);
		}
		//print_r($rewardVoList);die;
		return $rewardVoList;
	}
	//点击抽奖 结果信息加载
    public function customerLuckyDraw(){
    	$dai_user_id = isset($_POST['dai_user_id'])?$_POST['dai_user_id']:'';
    	$luckyDrawId = isset($_POST['luckyDrawId'])?$_POST['luckyDrawId']:'';
    	//print_r($_POST);die;
    	if(empty($luckyDrawId)){
    		$data = array('status'=>5000,'errmsg'=>'系统繁忙，稍后再试！','result'=>'');
    		echo json_encode($data);exit;
    	}
    	if(empty($dai_user_id)){
    		$user_id = isset($_GET['user_id'])?$_GET['user_id']:$_SESSION['user_id'];
//    		$this->weixin_model->get_user_openid(base_url('vmall.php/promotion/customerLuckyDraw'));
    	}
    	$rows = $this->db->select('*')->where('wheels_id',$luckyDrawId)->get('shop_p_lottery_wheel')->row_array();
//    	var_dump ($rows);
    	if(empty($rows)){
    		$data['status']=5000;
    		$data['errmsg']='系统繁忙，稍后再试！';
    		echo json_encode($data);exit;
    	}else{
    		if($rows['status']==2){
    			$data['status']=0;
    			$data['luckyStatus']=$rows['status'];
    			$data['errmsg']='活动已停止！';
    			echo json_encode($data);exit;
    		}
    		if($rows['start_time']>time()){
    			$data['status']=5000;
    			$data['errmsg']='活动还未开始！';
    			echo json_encode($data);exit;
    		}elseif($rows['end_time']<time()){
    			$data['status']=5000;
    			$data['errmsg']='活动已结束！';
    			echo json_encode($data);exit;
    		}
    		$data['status']=0;
    		$data['errmsg']='';
    	}	
    	//$this->db->insert('system_config',array('code'=>'chou1','value'=>json_encode($_POST)));
    	if(empty($dai_user_id)){
    		if(empty($user_id)){
    			$data['status']=5000;
    			$data['errmsg']='不合法的操作！';
    			echo json_encode($data);exit;
    		}
    		if(!empty($rows['free_limit'])){
    			$have_use = $this->db->select('count(wheels_log_id) as num')->where('wheels_id',$luckyDrawId)
    			->where('user_id',$user_id)->where('operate_wx_openid is not null')->get('shop_p_lottery_wheel_log')->row('num');
//    			var_dump ($have_use);
    			if($have_use<$rows['free_limit']){
    				$use_point = 0;
    			}else{
    				$use_point = $rows['point'];
    			}
    		}else{
    			$use_point = $rows['point'];
    		}
    		$chouType = 1;
    		$user_info = $this->db->select('user_id,user_name,tel,integral,is_follow,balance,integral_total')->where('user_id',$user_id)->get('user')->row_array();

    		if($user_info['integral']<$use_point){
    			$data['status']=5000;
    			$data['errmsg']='积分不足！';
    			echo json_encode($data);exit;
    		}

    	}else{
    		$check_log = $this->db->select('count(1) as num')->where('operate_wx_openid',$_SESSION['dai_wx_openid'])
    		->where('wheels_id',$luckyDrawId)->get('shop_p_lottery_wheel_log')->row('num');
    		//$this->db->insert('system_config',array('code'=>'chou2','value'=>$check_log));
    		if($check_log>=1){
    			$data['status']=5000;
    			$data['errmsg']='亲，只能帮一次哦！你也可以点击我要参加关注公众号亲自参与！';
    			echo json_encode($data);exit;
    		}
    		$chouType = 2;
    		$use_point = 0;
    		$user_info = $this->db->select('user_id,user_name,tel,integral,is_follow,balance,integral_total')->where('user_id',$dai_user_id)->get('user')->row_array();
    		$user_id = $dai_user_id;
    	}
    	//$this->db->insert('system_config',array('code'=>'chou3','value'=>'2222aa'));
    	$integral = empty($user_info['integral'])?0:$user_info['integral'];
    	$integral_total = empty($user_info['integral_total'])?0:$user_info['integral_total'];
    	$balance = empty($user_info['balance'])?0:$user_info['balance'];
    	$integral -=$use_point;//抽奖减积分
    	$user_integral = array();
//    	var_dump ($luckyDrawId);
    	$prize = $this->get_wheels_prize($luckyDrawId);
//    	var_dump ($prize);
    	$rand_num = mt_rand(0,99);$prize_data = array();$p_f = 0;$rand_num = $rand_num/100;
    	$select_prize = array();
    	$time = time();
    	//$this->db->insert('system_config',array('code'=>'tetete23','value'=>json_encode($prize)));
    	foreach ($prize as $k=>$v){
    		$prize_data[$k]['min'] = $p_f;
    		$p_f += $v['luckyDrawRewardPercent'];
    		$prize_data[$k]['max'] = $p_f;
    		$prize_data[$k]['prize'] = $k;
    	}
    	foreach ($prize_data as $k=>$v){
    		if($v['min']<=$rand_num&&$rand_num<$v['max']){
    			if($prize[$k]['prize_limit']>=1){
    				$user_have_num = $this->db->select('count(1) as num')->where('user_id',$user_id)->where('wheel_prize_id',$prize[$k]['wheels_prize_id'])
    				->where('wheels_id',$luckyDrawId)->get('shop_p_lottery_wheel_log')->row('num');
    				if($user_have_num<$prize[$k]['prize_limit']&&$prize[$k]['prize_have']>=1){
    					$select_prize = $prize[$k];
    				}
    			}elseif($prize[$k]['prize_have']>=1){
    				$select_prize = $prize[$k];
    			}
    		}
    	}		
    	//$this->db->insert('system_config',array('code'=>'tetete2223','value'=>json_encode($select_prize)));
    	$user_prize = array(
    			'wheels_id'=>$rows['wheels_id'],'wheels_name'=>$rows['wheels_name'],'user_id'=>$user_id,
    			'operate_wx_openid'=>'','add_time'=>$time,
    	);//抽奖记录
    	//$this->db->insert('system_config',array('code'=>'chou3','value'=>json_encode($select_prize)));
    	$user_coupon = array();$user_integral = array();$user_balance = array();$plat_balance = array();
    	if(empty($select_prize)){
    		$result = array('lucky'=>0);//未中奖
    		if($chouType==2){
    			$user_prize['operate_wx_openid'] = $_SESSION['dai_wx_openid'];
    			$user_prize['operate_wx_nickname'] = $_SESSION['dai_wx_openid_nickname'];
    			$user_prize['operate_headimgurl'] = $_SESSION['headimgurl'];
    			$user_prize['log_content'] = '未抽中奖品！';
    		}else{
    			$user_prize['log_content'] = '未抽中奖品！';
    		}
    	}else{
    		
    		//奖品记录到用户账号
    	
    		switch (intval($select_prize['rewardType']))
    		{
    			case 1:
    				$user_coupon = array(
    				'coupon_activity_id'=>$luckyDrawId,'coupon_activity_type'=>5,
    				'coupon_id'=>$select_prize['coupon_id'],'coupon_code'=>$select_prize['coupon_code'],'coupon_ger_time'=>$time,'user_id'=>$user_id,
    				);
    				
    				break;
    			case 2:
    				$user_coupon = array(
    				'coupon_activity_id'=>$luckyDrawId,'coupon_activity_type'=>5,
    				'coupon_id'=>$select_prize['coupon_id'],'coupon_code'=>$select_prize['coupon_code'],'coupon_ger_time'=>$time,'user_id'=>$user_id,
    				);
    	
    				break;
    			case 3:
    				/* $integral +=$select_prize['wheels_prize_value'];//抽奖获得积分增加
    				$integral_total +=$select_prize['wheels_prize_value'];//抽奖获得积分增加
    				$sql_user['integral'] = $integral;
    				$sql_user['integral_total'] = $integral_total;
    				$user_integral = array(
    						'user_id'=>$user_id,'integral_num'=>$select_prize['wheels_prize_value'],'ation_time'=>$time,'action_user_id'=>0,
    						'action_user_type'=>0,'action_type'=>0,'note'=>'大转盘活动'.$rows['wheels_name'].'抽奖获得',
    				); */
                    $user_coupon = array(
                        'coupon_activity_id'=>$luckyDrawId,'coupon_activity_type'=>5,
                        'coupon_id'=>$select_prize['coupon_id'],'coupon_code'=>$select_prize['coupon_code'],'coupon_ger_time'=>$time,'user_id'=>$user_id,
                    );
    				break;
    			case 4:
    	
    				break;
    			case 5:
    				/* $balance +=$select_prize['wheels_prize_value'];//抽奖获得现金增加
    				$sql_user['balance'] = $balance;
    				$user_balance = array(
    						'user_id'=>$user_id,'log_type'=>11,'asset_in'=>$select_prize['wheels_prize_value'],'asset_out'=>0,'asset'=>$balance,
    						'time'=>$time,'note'=>'大转盘活动'.$rows['wheels_name'].'抽奖获得',
    				);
    				$palt_money = $this->db->query("select asset from {$this->db->dbprefix('platform_asset_account')}  order by paa_id desc limit 1")->row('asset');
    				$palt_money = empty($palt_money)?0:$palt_money;
    				$plat_balance = array(
    						'user_id'=>$user_id,'log_type'=>11,'asset_in'=>0,'asset_out'=>$select_prize['wheels_prize_value'],'asset'=>$balance,
    						'time'=>$time,'note'=>'大转盘活动'.$rows['wheels_name'].'抽奖支出',
    				); */
                    $user_coupon = array(
                        'coupon_activity_id'=>$luckyDrawId,'coupon_activity_type'=>5,
                        'coupon_id'=>$select_prize['coupon_id'],'coupon_code'=>$select_prize['coupon_code'],'coupon_ger_time'=>$time,'user_id'=>$user_id,
                    );
    	
    				break;
    			default:
    	
    				break;
    		}
    		if($chouType==2){
    			$user_prize['operate_wx_openid'] = $_SESSION['dai_wx_openid'];
    			$user_prize['operate_wx_nickname'] = $_SESSION['dai_wx_openid_nickname'];
    			$user_prize['operate_headimgurl'] = $_SESSION['headimgurl'];
    			$user_prize['log_content'] = '抽中'.$select_prize['rewardName'];
    		}else{
    			$user_prize['log_content'] = '抽中'.$select_prize['rewardName'];
    		}
    		$user_prize['wheel_prize_id'] = $select_prize['wheels_prize_id'];
    		//$result = $select_prize;
    		$result['lucky'] = 1;//中奖了
    		$result['luckyRewardType'] = $select_prize['rewardType'];
    		$result['productPicUrl'] = '';
    		$result['rewardPrice'] = $select_prize['wheels_prize_value'];
    		$result['rewardName'] = $select_prize['rewardName'];
    		$result['customerOrderId'] = '';
    		$result['exchangeProductId'] = '';
    		$result['deliveryLimit'] = '';
    		$result['luckyDrawRewardId'] = $select_prize['luckyDrawRewardId'];
    		
    		$result['supplierId'] = empty($rows['store_id'])?'':$rows['store_id'];
    		$result['luckyRecordId'] = empty($rows['wheels_id'])?'':$rows['wheels_id'];
    		//$result['totalPoints'] = $integral;
    	}			
    	$result['truePoints'] = $use_point;
    	$result['chouType'] = $chouType;
    	$result['integral'] = $integral;
    	$sql_user = array('integral'=>$integral);
    	$this->db->trans_start();//开启事物
    	if($use_point>0&&$chouType==1){
    		$this->db->where('user_id',$user_id)->update('user',$sql_user);
    	}
    	if(!empty($select_prize['wheels_prize_id'])&&$result['lucky'] == 1){
    		$this->db->query("update " . $this->db->dbprefix('shop_p_lottery_wheel_prize') . " set prize_have=prize_have-1 where wheels_prize_id = '{$select_prize['wheels_prize_id']}'");
    	}
    	$this->db->insert('shop_p_lottery_wheel_log',$user_prize);
        $coupon_from_id=$this->db->insert_id('shop_p_lottery_wheel_log');
        $user_coupon['coupon_from_id']=$coupon_from_id;
    	
    	//$result['prizeLog'] = $this->getRewardLog($user_id,$luckyDrawId);
    	
    	if(!empty($user_coupon['coupon_activity_id'])){
    		$this->db->insert('user_coupon',$user_coupon);
    	}
    	if(!empty($use_point)){
    		$user_integral_log = array(
    				'user_id'=>$user_id,'integral_num'=>$use_point,'ation_time'=>$time,'action_user_id'=>0,
    				'action_user_type'=>0,'action_type'=>1,'note'=>'大转盘活动'.$rows['wheels_name'].'抽奖扣除',
    		);
    		$this->db->insert('user_integral',$user_integral_log);
    	}
    	/* if(!empty($user_integral)){
    		//$this->db->insert('user_integral',$user_integral);
    	}
    	if(!empty($user_balance)){
    		//$this->db->insert('user_asset_log',$user_balance);
    	}
    	if(!empty($plat_balance)){
    		//$this->db->insert('platform_asset_account',$plat_balance);
    	} */
    	$this->db->trans_complete();//事物完成
    		
    	$this->db->trans_off();//禁用事物
    		
    	if ($this->db->trans_status() === FALSE)
    		
    	{
    		$data['status']=5000;
    		$data['errmsg']='系统繁忙，稍后再试！';
    		echo json_encode($data);exit;
    	}
    	
    	$data['result'] = $result;
    	//$this->db->insert('system_config',array('code'=>'chou4','value'=>json_encode($data)));
    	echo json_encode($data);exit;
    }
    //活动信息加载
    public function getLuckyDrawInfo(){
        $dai_user_id = isset($_POST['dai_user_id'])?$_POST['dai_user_id']:'';
    	if(empty($dai_user_id)){
//    		$this->weixin_model->get_user_openid(base_url('vmall.php/promotion/getLuckyDrawInfo'));
    	}else{
    		
    	}
    	$log_path ='wheels_getLuckyDrawInfo_'.date("Y-m-d",time()).'.log';
    	//note_log($log_path,$dai_user_id.'//1//',true);
    	$luckyDrawId = isset($_POST['luckyDrawId'])?$_POST['luckyDrawId']:'';
    	if(!empty($luckyDrawId)){
    		$rows = $this->db->select('*')->where('wheels_id',$luckyDrawId)->get('shop_p_lottery_wheel')->row_array();
    	}else{
    		$rows = $this->db->select('*')->limit(1)->get('shop_p_lottery_wheel')->row_array();
    	}
    	//note_log($log_path,$dai_user_id.'//2//',true);
    	if(!empty($rows)){
    		$luckyDrawStatus = 1;
    		$luckyDraw = array(
    				'luckyDrawTitle'=>$rows['wheels_name'],//活动名称
    				'needMembershipCard'=>0,//是否会员参加
    				'consumePoints'=>$rows['point'],//消耗积分
    				'actionLog'=>'',//活动记录
    				'free_limit'=>$rows['free_limit'],//免费次数
    				'limit'=>$rows['limit'],//次数限制
    				'supplierId'=>$rows['store_id'],//活动店铺
    				'goods_id'=>$rows['goods_id'],//活动店铺
    				'startTime'=>$rows['start_time'],//活动开始时间
    				'end_time'=>$rows['end_time'],//活动开始时间
    		);
    		$result['status']=0;$result['luckyDraw'] = $luckyDraw;
    	}else{
    		$luckyDrawStatus = 0;
    		$result['status']=5000;
    		$result['errmsg']='活动不存在或已停止!';
    	}
    	//note_log($log_path,$_SESSION['user_id'].'//3//',true);
    	//$_SESSION['user_id'] = 94;
    	if(empty($dai_user_id)){
    		$user_id = isset($_GET['user_id'])?$_GET['user_id']:$_SESSION['user_id'];
    		if(!empty($user_id)){
    			$user_info = $this->db->select('user_id,user_name,tel,integral,is_follow')->where('user_id',$user_id)->get('user')->row_array();
    			
    			$result['luckyDraw']['actionLog'] = $this->getRewardLog($user_id,$luckyDrawId);
    		}else{
    			$result['status']=5000;
    			$result['errmsg']='系统繁忙，请稍后再试！';
    		}
    		//note_log($log_path,$_SESSION['user_id'].'//4//',true);
    		$qrcode = $this->common_function->get_plat_qrcode();
    		$result['surplusLuckyDrawCount']=empty($user_info['integral'])?0:$user_info['integral'];
    		//$user_info['is_follow'] = 0;
    		$result['customerWechatSubscribe']=empty($user_info['is_follow'])?0:$user_info['is_follow'];
    		
    	}else{
    		//$result['luckyDraw']['actionLog'] = array('此活动你只能帮抽一次！');
    		$qrcode = $this->common_function->get_plat_qrcode();
    		$result['surplusLuckyDrawCount']=1;
    		//$user_info['is_follow'] = 0;
    		$result['customerWechatSubscribe']=0;
    	}
    	
    	$result['qrcodeUrl']=$qrcode;
    	
    	echo json_encode($result);exit;
    }
    //抽奖记录
    private function getRewardLog($user_id,$luckyDrawId){
    	$log = $this->db->select('*')->from('shop_p_lottery_wheel_log')
    	->where('user_id',$user_id)->where('wheels_id',$luckyDrawId)->order_by('add_time','DESC')->get()->result_array();
    	$user_info = $this->db->select('wx_nickname,head_portrait')->from('user')->where('user_id',$user_id)->get()->row_array();
    	$log_content = array();
    	foreach ($log as $lk=>$lv){
    		$lv['time'] = date('m-d H:i',$lv['add_time']);
    		if(!empty($lv['operate_wx_openid'])){
    			$log_content[] = '['.$lv['time'].']'.'<img style="border-radius:50%" width="25px;" src="'.$lv['operate_headimgurl'].'"/>'.$lv['operate_wx_nickname'].$lv['log_content'];
    		}else{
    			$log_content[] = '['.$lv['time'].']'.'<img style="border-radius:50%" width="25px;" src="'.$user_info['head_portrait'].'"/>'.$user_info['wx_nickname'].$lv['log_content'];
    			
    		}
    		
    	}
    	return $log_content;
    }
    //抽奖记录
    public function showRewardLog(){
    	$_SESSION['user_id'] = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
    	$user_id = isset($_POST['user_id'])?$_POST['user_id']:$_SESSION['user_id'];
    	$dai_user_id = isset($_POST['dai_user_id'])?$_POST['dai_user_id']:'';
    	if($dai_user_id){
    		$user_id = $dai_user_id;
    	}
    	$luckyDrawId = isset($_POST['luckyDrawId'])?$_POST['luckyDrawId']:'';
    	$time = time()-2;
    	$sure = $this->db->select('count(1) as num')->from('shop_p_lottery_wheel_log')
    	->where('user_id',$user_id)->where('wheels_id',$luckyDrawId)->where('operate_wx_openid is not null')->where("operate_wx_openid != ''")
    	->where("add_time>=$time")->get()->row('num'); 
    	$log = false;
    	//$sure = 1;
    	if(isset($_GET['op'])&&$_GET['op']=='load'){
    		$sure = 1;
    	}
    	if($sure>=1){
    		$log = $this->getRewardLog($user_id,$luckyDrawId);
    		//$this->db->insert('system_config',array('code'=>'tetete22223','value'=>json_encode($log)));
    	}
    	echo json_encode($log);
    }
    //奖品信息加载
    public function getRewardListOfLuckyDraw(){
    	$dai_user_id = isset($_POST['dai_user_id'])?$_POST['dai_user_id']:'';
    	if(empty($dai_user_id)){
    		$this->weixin_model->get_user_openid(base_url('vmall.php/promotion/getRewardListOfLuckyDraw'));
    	}else{
    	
    	}
    	//$log_path ='getRewardListOfLuckyDraw'.date("Y-m-d",time()).'.log';
    	//note_log($log_path,$dai_user_id.'//1//',true);
    	$luckyDrawId = isset($_POST['luckyDrawId'])?$_POST['luckyDrawId']:'';
    	if(!empty($luckyDrawId)){
    		$rows = $this->db->select('*')->where('wheels_id',$luckyDrawId)->get('shop_p_lottery_wheel_prize')->result_array();
    	}else{
    		$rows = $this->db->select('*')->limit(1)->get('shop_p_lottery_wheel_prize')->result_array();
    	}
    	//（1折扣卷，2满送卷，3积分，4实物，5现金红包）',
    	//note_log($log_path,$dai_user_id.'//2//',true);
    	$rewardVoList = $this->get_wheels_prize($luckyDrawId);
    	if(empty($rewardVoList)){
    		$result = array('status'=>5000,'errmsg'=>'活动不存在或已停止！请尝试其他活动！',);
    	}else{
    		$qrcode = $this->common_function->get_plat_qrcode();
    		if(empty($dai_user_id)){
    			$user_id = $_SESSION['user_id'];
    			$user_info = $this->db->select('user_id,user_name,tel,integral,is_follow')->where('user_id',$user_id)->get('user')->row_array();
    			$result = array('status'=>0,'errmsg'=>'',
    					'rewardVoList'=>$rewardVoList,//活动内容
    					'surplusLuckyDrawCount'=>'',//活动剩余次数
    					'customerWechatSubscribe'=>$user_info['is_follow'],//是否关注
    					'qrcodeUrl'=>$qrcode,//二维码
    					'luckyDrawStatus'=>1,//活动是否开启
    			);
    		}else{
    			$result = array('status'=>0,'errmsg'=>'',
    					'rewardVoList'=>$rewardVoList,//活动内容
    					'surplusLuckyDrawCount'=>'',//活动剩余次数
    					'customerWechatSubscribe'=>0,//是否关注
    					'qrcodeUrl'=>$qrcode,//二维码
    					'luckyDrawStatus'=>1,//活动是否开启
    			);
    		}
    		
    	}
    	
    	//note_log($log_path,$dai_user_id.'//4//',true);
    	echo json_encode($result);exit;
    }
    //微信信息加载
    public function getWechatJsApiTicket(){
    	//print_r($_POST);die;
    	$url = isset($_POST['url'])?$_POST['url']:'';
    	$wheels_id = isset($_POST['wheels_id'])?$_POST['wheels_id']:'';
    	$appid = $this->common_function->get_gzh_appid();//$this->db->insert('system_config',array('code'=>'tetete1','value'=>$appid));
    	$wxticket = $this->common_function->get_wx_jsapi_ticket();//$this->db->insert('system_config',array('code'=>'tetete2','value'=>$wxticket));
    	$timestamp = time();
    	$wxnonceStr = $this->common_function->get_gzh_noncestr();//$this->db->insert('system_config',array('code'=>'tetete3','value'=>$wxnonceStr));
    	$wxOri = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s",
    			$wxticket, $wxnonceStr, $timestamp,$url
    			);
    	$wxSha1 = sha1($wxOri);
    	$user_info = $this->db->select('wx_nickname')->where('user_id',$_SESSION['user_id'])->get('user')->row_array();
    	//$this->db->insert('system_config',array('code'=>'tetete','value'=>$wxSha1));
    	$result = array(
    			'wxticket'=>$wxticket,'signature'=>$wxSha1,'appid'=>empty($appid)?'wx51ed3765c99f5b49':$appid,'timestamp'=>$timestamp,'nonceStr'=>$wxnonceStr,
    			'wx_nickname'=>$user_info['wx_nickname'],
    	);
    	$data = array('result'=>$result,'status'=>0,'errmsg'=>'');//$this->db->insert('system_config',array('code'=>'tetete5','value'=>$wxSha1));
    	echo json_encode($data);exit;
    }

    public function customerLotteryWheelList()
    {
        $this->weixin_model->get_user_openid (base_url ('vmall.php/promotion/customerLotteryWheelList'));
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

//        $available_coupons = $this->db->select('available_coupons')->where("goods_id = '{$goods_id}' ")->get('shop_goods')->row('available_coupons');
//        if($available_coupons==1){
//            $goods[$k]['coupon_state']=1;
        $this->db->select ('uc.user_coupon_id,uc.coupon_activity_id,uc.coupon_activity_type,sc.coupon_value,
                    sc.coupon_start_time,sc.coupon_end_time,sc.flexible_day,sc.time_state,sc.coupon_desc,sc.coupon_name,
                    sc.coupon_id,sc.limit_goods,sc.limit_store,sc.limit_goods_type,sc.limit_store_type,sc.coupon_type,uc.coupon_cost_time,sc.limit_store,sc.limit_goods,store.store_name,sg.goods_image');//count(user_coupon_id) as coupon_num
        $this->db->from ('user_coupon as uc');
        $this->db->join ('shop_coupon as sc', "uc.coupon_id=sc.coupon_id");
        $this->db->join ('store', 'store.store_id=sc.limit_store', 'left');
        $this->db->join ('shop_goods sg', 'sg.goods_id=sc.limit_goods', 'left');
        $this->db->where ('uc.user_id', $user_id);
//        $this->db->where ('uc.coupon_cost_time', null);
//        $this->db->like ('CONCAT(",",sc.limit_goods,",")', "," . $goods_id . ",");
//        $this->db->like ('CONCAT(",",sc.limit_store,",")', "," . $store_id . ",");
        //$this->db->group_by('uc.coupon_id');
        $this->db->order_by ('sc.coupon_value', 'ASC');
        $this->db->order_by ('uc.user_coupon_id', 'ASC');
        $limit = $this->db->get ()->result_array ();//所有该用户的劵，包括过期和已使用的

//        print_r($limit);
        $arr = array ();
        $coupon_id = '0';
        foreach ($limit as $k => $v) {
            $v['goods_image']= img_http($v['goods_image']);//处理图片，完善路径
            if (!empty($v)) {
                $coupon_id1 = $v['coupon_id'];
                if ($coupon_id != $coupon_id1) {
                    $arr[$coupon_id1][] = $v;
                } else {
                    $arr[$coupon_id][] = $v;
                }
                $coupon_id = $coupon_id1;
            }
        }
        sort ($arr);//该用户所有的劵，按coupon_id分类
//        var_dump (count($arr));
//var_dump ($arr);
        //print_r($this->db->last_query());die;
        $time = time ();
        $today = date ('Y-m-d', $time);//今天的日期
        $arr_data = array ();
        $arr_open = array ();
        $arr_user = array ();
        foreach ($arr as $ka => $va) {
            foreach ($va as $kv => $vv) {
                $end_time = date ('Y-m-d', $vv['coupon_end_time']);
                $is_user = (strtotime ($today) > strtotime ($end_time)) ? 1 : 0;//过期为1，否则为0；
                $is_open = ($vv['coupon_cost_time'] != null) ? 1 : 0;//已使用为1，否则为0；
                //将时间改成固定格式
                $end_time = date ('m-d H:i', $vv['coupon_end_time']);
                $start_time = date ('m-d H:i', $vv['coupon_start_time']);
                $vv['coupon_end_time'] = $end_time;
                $vv['coupon_start_time'] = $start_time;
                //分类
                if ($is_user == 0 && $is_open == 0) {//未使用未过期
                    $arr_data[$ka][] = $vv;
                }
                if ($is_user == 1 && $is_open == 0) {//未使用已过期
                    $arr_user[$ka][] = $vv;
                }
                if ($is_open == 1) {//已使用
                    $arr_open[$ka][] = $vv;
                }

            }
        }
//        $coupon_list = array ();
//        var_dump ($arr_data);
       // 判断优惠券是否已生成订单，否则冻结；
        $time = time ();
        foreach ($arr_data as $kc => $vc) {
//            var_dump ($vc[0]['coupon_start_time']);
//            if($vc[0]['coupon_start_time']<=$time&&$time<=$vc[0]['coupon_end_time']) {
            foreach ($vc as $k2 => $v2) {
                $check_coupon = $this->db->select ('count(so.coupon_id) as num')->from ('shop_order_goods so')
                    ->join ('shop_order o', 'o.order_sn=so.order_sn')
                    ->join ('user_coupon uc', 'uc.user_coupon_id=so.coupon_id')
                    ->where ('so.coupon_id', $v2['user_coupon_id'])->where ('o.order_status<>', 0)
                    ->get ()->row ('num');
//                var_dump ($check_coupon);
                if (empty($check_coupon)) {
//                    if(isset($coupon_list[$vc[0]['coupon_id']])){
//                        $coupon_list[$vc[0]['coupon_id']][0]['coupon_num'] +=1;
//                        $coupon_list[$vc[0]['coupon_id']][0]['coupon_list'] = $coupon_list[$vc[0]['coupon_id']]['coupon_list'].",".$vc[0]['user_coupon_id'];
                } else {
                    unset($arr_data[$kc][$k2]);//删除已生成订单的优惠券
//                        $coupon_list[$vc[0]['coupon_id']] = $vc;
//                        $coupon_list[$vc[0]['coupon_id']]['coupon_num'] =1;
//                        $coupon_list[$vc[0]['coupon_id']]['coupon_list'] = $vc[0]['user_coupon_id'];
               }
               if(empty($arr_data[$kc])){
                    unset($arr_data[$kc]);
               }else{
                   sort($arr_data[$kc]);//对删除的数组重新排序
               }

           }

        }
//    }
//        var_dump ($arr_data);
//        $arr_data=$coupon_list;
//        var_dump ($arr_data);
//        var_dump ($arr_data);var_dump ($arr_open);
//        $goods[$k]['coupon_list'] = $coupon_list;
        //print_r($coupon_list);die;

//        $this->db->select('log.wheels_log_id,log.is_open,log.add_time,log.wheel_prize_id,prize.cash,prize.point,prize.goods_id,prize.start_time,prize.end_time,prize.prize_type,sw.store_id,sw.goods_id,sw.wheels_image,s.store_name,sc.coupon_discount,sgd.goods_image,sc.coupon_name');
//        $this->db->from('shop_p_lottery_wheel_log as log');
//        $this->db->where('log.user_id',$user_id);
//        $this->db->where('log.wheel_prize_id <>',null);
//        $this->db->join('shop_p_lottery_wheel_prize as prize','prize.wheels_prize_id=log.wheel_prize_id');
//        $this->db->join('shop_p_lottery_wheel as sw','sw.wheels_id=log.wheels_id','left');
//        $this->db->join('store as s','s.store_id=sw.store_id','left');
//        $this->db->join('shop_coupon as sc','sc.coupon_id=prize.coupon_id','left');
//        $this->db->join('shop_goods as sgd','sgd.goods_id=prize.goods_id','left');
//        $this->db->order_by('log.add_time','DESC');
//        $data=$this->db->get()->result_array();
//        $arr=array();
//        $wheel_prize_id='0';
//        foreach($data as $k=>$v){
//            if(!empty($v)) {
//                $wheel_prize_id1 = $v['wheel_prize_id'];
//                if ($wheel_prize_id != $wheel_prize_id1) {//判断是否为未过期且未使用
//                    $arr[$wheel_prize_id1][] = $v;
//                } else {
//                    $arr[$wheel_prize_id][] = $v;
//                }
//                $wheel_prize_id = $wheel_prize_id1;
//            }
//        }
//        sort($arr);
////        var_dump ($arr);die;
//        $time=time();
//        $today=date('Y-m-d',$time);//今天的日期
//        $arr_data=array();
//        $arr_open=array();
//        $arr_user=array();
//        foreach($arr as $ka=>$va){
//            foreach($va as $kv=>$vv){
//                $end_time=date('Y-m-d',$vv['end_time']);
//                $is_user=(strtotime($today)>strtotime($end_time))?1:0;//过期为1，否则为0；
//                $is_open=($vv['is_open']=='1')?1:0;//已使用为1，否则为0；
//                //将时间改成固定格式
//                $end_time=date('Y.m.d',$vv['end_time']);
//                $start_time=date('Y.m.d',$vv['start_time']);
//                $vv['end_time']=$end_time;
//                $vv['start_time']=$start_time;
//                //分类
//                if($is_user==0 && $is_open==0){//未使用未过期
//                    $arr_data[$ka][]=$vv;
//                }
//                if($is_user==1 && $is_open==0){//未使用已过期
//                    $arr_user[$ka][]=$vv;
//                }
//                if($is_open==1){//已使用
//                    $arr_open[$ka][]=$vv;
//                }
//
//            }
//        }
//        var_dump ($arr_data);
        $this->smarty->assign('user_data',$arr_user);
        $this->smarty->assign('open_data',$arr_open);
        $this->smarty->assign('data',$arr_data);
//        var_dump ($arr_data);
        $this->smarty->display('user_coupon.html');
    }

    public function getCash(){
        $user_coupon_id=$_POST['wheels_log_id'];
        $user_id=isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
        $coupon=$this->db->select('coupon_from_id,coupon_activity_type')->from('user_coupon')->where('user_coupon_id',$user_coupon_id)->get()->result_array();
        $coupon_activity_type= $coupon[0]['coupon_activity_type'];
        $coupon_from_id=$coupon[0]['coupon_from_id'];
//        var_dump ( $coupon_activity_type);var_dump($user_coupon_id);var_dump($coupon_from_id);
        //查询该红包奖品的金额范围
        if($coupon_activity_type=='5') {
            $this->db->select ('prize.cash,log.wheels_name');
            $this->db->where ('log.wheels_log_id', $coupon_from_id);
            $this->db->from ('shop_p_lottery_wheel_log as log');
            $this->db->join ('shop_p_lottery_wheel_prize as prize', 'log.wheel_prize_id=prize.wheels_prize_id');
            $cash_rang = $this->db->get ()->result_array ();
        }
        if($coupon_activity_type=='7') {
            $this->db->select ('sc.coupon_value,ss.sign_title');
            $this->db->where ('sr.sign_rule_id', $coupon_from_id);
            $this->db->from ('shop_p_sign as ss');
            $this->db->join ('shop_p_sign_rule as sr', 'ss.sign_id=sr.sign_id');
            $this->db->join ('shop_coupon as sc', 'sc.coupon_id=sr.sign_prize');
            $cash_rang = $this->db->get ()->result_array ();
//            var_dump ($coupon_from_id);var_dump ($cash_rang);
            //将变量名同步
            $cash_rang[0]['wheels_name']=$cash_rang[0]['sign_title'];
            $cash_rang[0]['cash']=$cash_rang[0]['coupon_value'];
        }
//        var_dump ($cash_rang);
            $wheels_name = $cash_rang[0]['wheels_name'];
            $cash_arr = explode (",", $cash_rang[0]['cash']);
            if (count ($cash_arr) == 1) {
                $prize_value = $cash_rang[0]['cash'];
            } else {
                $cash_low = $cash_arr[0];
                $cash_high = $cash_arr[1];
                $prize_value = mt_rand ($cash_low * 100, $cash_high * 100) / 100;//根据规定的金额范围获取的随机值
            }

            //查用户账户资金balance
            $this->db->select ('balance');
            $this->db->from ('user');
            $this->db->where ('user_id', $user_id);
            $balance = $this->db->get ()->result_array ();
            $balance = $balance[0]['balance'];
//        var_dump ($balance);
            $time = time ();
            $balance = $balance + $prize_value;//抽得红包获得现金增加
            $sql_user['balance'] = $balance;
        if($coupon_activity_type=='5') {
            $name='大转盘活动';
        }
        if($coupon_activity_type=='7') {
            $name='签到活动';
        }
            $user_balance = array (
                'user_id' => $user_id, 'log_type' => 11, 'asset_in' => $prize_value, 'asset_out' => 0, 'asset' => $balance,
                'time' => $time, 'note' => $name . $wheels_name . '抽奖获得',
            );
            $palt_money = $this->db->query ("select asset from {$this->db->dbprefix('platform_asset_account')}  order by paa_id desc limit 1")->row ('asset');
            $palt_money = empty($palt_money) ? 0 : $palt_money;
            $plat_balance = array (
                'user_id' => $user_id, 'log_type' => 11, 'asset_in' => 0, 'asset_out' => $prize_value, 'asset' => $balance,
                'time' => $time, 'note' => $name . $wheels_name . '抽奖支出',
            );


            $this->db->trans_start ();//开启事物
            if (!empty($balance)) {
                $this->db->where ('user_id', $user_id);
                $this->db->update ('user', $sql_user);
            }
            if($coupon_activity_type=='5') {
                if (!empty($data)) {
                    $data['is_open'] = 1;
                    $data['prize_value'] = $prize_value;
                    $this->db->where ('wheels_log_id', $coupon_from_id);
                    $this->db->update ('shop_p_lottery_wheel_log', $data);//跟新活动参与记录表的状态
                }
            }
            if (!empty($plat_balance)) {
                $this->db->insert ('platform_asset_account', $plat_balance);
            }
            if (!empty($user_balance)) {
                $this->db->insert ('user_asset_log', $user_balance);
            }
            $coupon_cost_time=array('coupon_cost_time'=>time());
            $this->db->where('user_coupon_id',$user_coupon_id);
            $this->db->update('user_coupon', $coupon_cost_time);
            $rel = $this->db->trans_complete ();//事物完成
            $this->db->trans_off ();//禁用事物
            $return['rel'] = $rel;
            $return['prize_value'] = $prize_value;
            echo json_encode ($return);
            die;
    }

    public function getPoint(){//获取积分
        $user_coupon_id=$_POST['wheels_log_id'];
        $user_id=isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
        $coupon=$this->db->select('coupon_from_id,coupon_activity_type')->from('user_coupon')->where('user_coupon_id',$user_coupon_id)->get()->result_array();
        $coupon_activity_type= $coupon[0]['coupon_activity_type'];
        $coupon_from_id=$coupon[0]['coupon_from_id'];
        //查中奖积分和活动名称
        if($coupon_activity_type=='5') {
            $this->db->select ('prize.point,log.wheels_name');
            $this->db->where ('log.wheels_log_id', $coupon_from_id);
            $this->db->from ('shop_p_lottery_wheel_log as log');
            $this->db->join ('shop_p_lottery_wheel_prize as prize', 'log.wheel_prize_id=prize.wheels_prize_id');
            $points = $this->db->get ()->result_array ();
        }
        if($coupon_activity_type=='7') {
            $this->db->select ('sc.coupon_value,ss.sign_title');
            $this->db->where ('sr.sign_rule_id', $coupon_from_id);
            $this->db->from ('shop_p_sign as ss');
            $this->db->join ('shop_p_sign_rule as sr', 'ss.sign_id=sr.sign_id');
            $this->db->join ('shop_coupon as sc', 'sc.coupon_id=sr.sign_prize');
            $points = $this->db->get ()->result_array ();
            //将变量名同步
            $points[0]['wheels_name']=$points[0]['sign_title'];
            $points[0]['point']=$points[0]['coupon_value'];
        }
            //查用户积分和累计积分
            $this->db->select ('integral,integral_total');
            $this->db->from ('user');
            $this->db->where ('user_id', $user_id);
            $integral_arr = $this->db->get ()->result_array ();

            $time = time ();
            $integral = $integral_arr[0]['integral'];
            $integral_total = $integral_arr[0]['integral_total'];
            $sql_user = array ('integral' => $integral);
            $wheels_name = $points[0]['wheels_name'];
            $point = $points[0]['point'];//活动名称
            $integral = $integral + $point;//抽奖获得积分增加
            $integral_total = $integral_total + $point;//抽奖获得积分增加
            $sql_user['integral'] = $integral;
            $sql_user['integral_total'] = $integral_total;
        if($coupon_activity_type=='5') {
            $name='大转盘活动';
        }
        if($coupon_activity_type=='7') {
            $name='签到活动';
        }
            $user_integral = array (
                'user_id' => $user_id, 'integral_num' => $point, 'ation_time' => $time, 'action_user_id' => 0,
                'action_user_type' => 0, 'action_type' => 0, 'note' => $name . $wheels_name . '抽奖获得',
            );

            $this->db->trans_start ();//开启事物
        if($coupon_activity_type=='5') {
            $update['is_open'] = 1;
            $this->db->where ('wheels_log_id', $coupon_from_id)->update ('shop_p_lottery_wheel_log', $update);//更新活动参与记录表的奖品状态
        }
            $this->db->where ('user_id', $user_id)->update ('user', $sql_user);//更新用户表的积分和累计积分字段
            $this->db->insert ('user_integral', $user_integral);//将积分获得记录插入用户积分详情表
            $coupon_cost_time=array('coupon_cost_time'=>time());
            $this->db->where('user_coupon_id',$user_coupon_id);
            $this->db->update('user_coupon', $coupon_cost_time);
            $rel = $this->db->trans_complete ();//事物完成
            $this->db->trans_off ();//禁用事物
            $return['rel'] = $rel;
            $return['point'] = $point;
            echo json_encode ($return);
            die;


    }

    public function delCoupon(){//卡劵中心删除功能
        $user_id=isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
        $store_id=isset($_POST['store_id'])?$_POST['store_id']:'';
        $del_type=isset($_POST['del_type'])?$_POST['del_type']:'';
        //查询出该店铺下的活动ID

//       var_dump ($this->db->last_query());
//       var_dump ($store_id);
//         var_dump ($user_coupon_id);
        //操作shop_p_lottery_wheel_log表的记录
        $this->db->select('wheels_id');
        $this->db->from('shop_p_lottery_wheel');
        $this->db->where('store_id',$store_id);
        $wheels_id=$this->db->get()->result_array();
        $wheels_ids=array();//存放处理wheels_id后的数据
        foreach($wheels_id as $key=>$v){
            $wheels_ids[]=$v['wheels_id'];
        }

//        var_dump ($wheels_ids);die;
        //操作user_coupon表中的记录
        $this->db->select('user_coupon_id');
        $this->db->from('user_coupon uc');
        $this->db->join('shop_coupon sc','uc.coupon_id=sc.coupon_id');
        $this->db->where('sc.limit_store',$store_id);
        $this->db->where('uc.user_id',$user_id);
        $user_coupon_id=$this->db->get()->result_array();
        $user_coupon_ids=array();//存放处理user_coupon_id后的数据
        foreach($user_coupon_id as $k=>$vv){
            $user_coupon_ids[]=$vv['user_coupon_id'];
        }

        if($del_type=='user'){//判断是否删除已使用劵
            $this->db->where('user_id',$user_id);
            $this->db->where('coupon_cost_time<>',null);
            $this->db->where_in('user_coupon_id',$user_coupon_ids);
            $this->db->delete('user_coupon');

            $this->db->where('user_id',$user_id);
            $this->db->where('is_open','1');
            $this->db->where_in('wheels_id',$wheels_ids);
            $data['rel']=$this->db->delete('shop_p_lottery_wheel_log');
            echo json_encode ($data);die;
        }

        if($del_type=='overtime') {//判断是否删除过期劵
            $time = time ();
            $this->db->select ('wheels_prize_id');
            $this->db->from ('shop_p_lottery_wheel_prize');
            $this->db->where ('end_time <', $time);
            $wheels_prize_id = $this->db->get ()->result_array ();

            if (!empty($wheels_prize_id)) {
                foreach ($wheels_prize_id as $key => $v) {
                    $wheels_prize_ids[] = $v['wheels_prize_id'];
                }
                $this->db->where_in ('wheel_prize_id', $wheels_prize_ids);
                $this->db->where_in ('wheels_id', $wheels_ids);
                $this->db->where ('is_open', null);
                $this->db->where ('user_id', $user_id);
                $this->db->delete ('shop_p_lottery_wheel_log');
            }
//            var_dump ($wheels_prize_ids);

            $this->db->select ('coupon_id');
            $this->db->from ('shop_coupon');
            $this->db->where ('coupon_end_time <', $time);
            $coupon_id = $this->db->get ()->result_array ();
//            var_dump ($coupon_id);var_dump ($user_coupon_ids);die;
            if (!empty($coupon_id)) {
                foreach ($coupon_id as $key => $v) {
                    $coupon_ids[] = $v['coupon_id'];
                }
                $this->db->where_in ('user_coupon_id', $user_coupon_ids);
                $this->db->where_in ('coupon_id', $coupon_ids);
                $this->db->where ('coupon_cost_time', null);
                $this->db->where ('user_id', $user_id);
                $data['rel'] = $this->db->delete ('user_coupon');
                echo json_encode ($data);
                die;
            }
        }


    }

    public function sign(){
//        $this->weixin_model->get_wx_openid(base_url('vmall.php/promotion/sign'));
        $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
        $this->db->select('*');
        $this->db->from('shop_p_sign');
        $this->db->order_by('sign_id');
        $this->db->where('sign_status',1);
        $this->db->where('sign_start_time<=' . time());
        $this->db->where('sign_end_time>=' . time());
        $sign=$this->db->get()->row_array();//已开启，且时间在要求范围的活动
        if(!empty($sign)){//说明当前有签到活动
        	
        	$time = time();
            $sign_id=$sign['sign_id'];//获取当前正在进行的签到活动的id
            $this->db->select('sr.*,sc.*');
            $this->db->from('shop_p_sign_rule as sr');
            $this->db->join('shop_coupon as sc','sc.coupon_id=sr.sign_prize');
            $this->db->where('sr.sign_id',$sign_id);
            $this->db->where('sr.sign_day>0');
            $this->db->order_by('sr.sign_day');
            $coupon=$this->db->get()->result_array();//当前签到活动的奖品详情
            $sign_rule = $this->db->select('*')->where('sign_id',$sign_id)->where('user_id',$user_id)
            ->get('user_sign_log')->result_array();
//            $sign['coupon']=$coupon;
            $sign_start_time = $sign['sign_start_time'];
            $arr_day = array();
            foreach ($sign_rule as $kr=>$vr){
            	$day_r = date('Ymd',$vr['sign_time']);
            	$arr_day[$day_r] = $vr;
//            	var_dump ($arr_day);
            }
            //var_dump ($user_id);die;
            $sign_day = count($sign_rule);$now_sign = false;$bu_num = 0;
            while($sign_start_time<=$sign['sign_end_time']){
            	 $day_s = date('Ymd',$sign_start_time);
//            	 var_dump ($day_s);
            	 $day_data = array();
            	 
            	 if(isset($arr_day[$day_s])){
            	 	$day_data = $arr_day[$day_s];
            	 	if($day_data['sign_type']==2){
            	 		$bu_num++;
            	 	}
            	 	$day_data['sign_flag'] = 1;//已签
            	 	if($sign_start_time<=$time&&$sign_start_time+86400>$time){
            	 		$day_data['sign_flag'] = 4;//当天已签
            	 		$now_sign = true;
            	 	}
            	 }else{
            	 	if($sign_start_time>$time){
            	 		$day_data['sign_flag'] = 0;//还未到
            	 	}elseif($sign_start_time<=$time&&$sign_start_time+86400>$time){
            	 		$day_data['sign_flag'] = 3;//当天
            	 	}else{
            	 		$day_data['sign_flag'] = 2;//未签
            	 	}
            	 	
            	 }
            	 $day_data['sign_day'] = $day_s;
            	 $arr_day[$day_s] = $day_data;
            	 $sign_start_time +=86400; 
            }
//            var_dump ($arr_day);
            $next_data = [];$ii = 1;$next = [];$prize_num = 0;
            foreach ($coupon as $k=>$v){
            	if($v['sign_day']<=$sign_day){
            		$coupon[$k]['prize_sure'] = 1;
            		$prize_num++;
            	}else{
            		if($ii==1){
            			$next = $v;
            		}
            		$ii++;
            		$coupon[$k]['prize_sure'] = 0;
            	}
            	$sign['sign_day_num'] = $v['sign_day'];
            }
            $sign['bu_num'] = $bu_num;
            $sign['prize_num'] = $prize_num;
            $sign['prize_total'] = count($coupon);
            if(empty($next)){
            	$now_title = '恭喜你每天都已签到可获得所有签到奖品！';
            }else{
            	$next_data = $next;
            	$next_data['next_day'] = $next['sign_day']-$sign_day;
            	if($now_sign){
            		$now_title = '再签到'.$next_data['next_day'].'天可获得'.$next_data['coupon_name'];
            	}else{
            		$now_title = '亲，你还没签到哦！'.'再签到'.$next_data['next_day'].'天可获得'.$next_data['coupon_name'];
            	}
            }
            //print_r($arr_day);print_r($coupon);print_r($sign_rule);die;
            $this->smarty->assign('arr_day_js',json_encode($arr_day));
            $this->smarty->assign('coupon_js',json_encode($coupon));
            $this->smarty->assign('now_sign',$now_sign);
            $this->smarty->assign('sign_day',$sign_day);
            $this->smarty->assign('now_title',$now_title);
            $this->smarty->assign('coupon',$coupon);
        }
        //print_r($arr_day);print_r($coupon);print_r($sign_rule);die;
        $this->smarty->assign('sign',$sign);
        $this->smarty->display('sign_new.html');
    }
    public function sign_inner(){
//    	print_r($_POST);die;
    	$sign_id  = isset($_POST['sign_id'])?$_POST['sign_id']:'';
    	$point  = isset($_POST['point'])?$_POST['point']:'';
    	$date  = isset($_POST['date'])?$_POST['date']:'';
    	$user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
    	if(empty($user_id)){
    		$result = array(
    					'state'=>false,'msg'=>'非法操作！'
    			);
    			echo json_encode($result);exit;
    	}
    	$time = time();
    	$sign_type = empty($date)?1:2;
    	$time=strtotime(date('Y-m-d'));
    	$date = empty($date)?$time:strtotime($date);$integral_state = false;
    	if($sign_type==2&&!empty($point)){//如果是补签
    		$user_info = $this->db->select('integral')->where('user_id',$user_id)->get('user')->row_array();
    		if($user_info['integral']<$point){
    			$result = array(
    					'state'=>false,'msg'=>'积分不足！'
    			);
    			echo json_encode($result);exit;
    		}
    		$integral_state = true;
    		
    	}
    	$inner = array('sign_id'=>$sign_id,'sign_time'=>$date,'sign_prize'=>'',
    			'user_id'=>$user_id,'sign_type'=>$sign_type,'add_time'=>$time,
    	);
    	$this->db->insert('user_sign_log',$inner);
    	if($integral_state){
    		$sql_user = array('integral'=>$user_info['integral']-$point);
    		$this->db->update('user',$sql_user,array('user_id'=>$user_id));
    		$this->common_function->integral_log($user_id,$point,'签到活动补签扣除积分'.$point,1,0);
    	}
    	
    	$log_id = $this->db->insert_id();
    	$sign = $this->db->select('*')->where('sign_id',$sign_id)
    	->get('shop_p_sign')->row_array();
    	$this->db->select('sr.*,sc.*');
    	$this->db->from('shop_p_sign_rule as sr');
    	$this->db->join('shop_coupon as sc','sc.coupon_id=sr.sign_prize');
    	$this->db->where('sr.sign_id',$sign_id);
    	$this->db->where('sr.sign_day>0');
    	$this->db->order_by('sr.sign_day');
    	$coupon=$this->db->get()->result_array();//当前签到活动的奖品详情
    	$sign_rule = $this->db->select('*')->where('sign_id',$sign_id)->where('user_id',$user_id)
    	->get('user_sign_log')->result_array();
    	$sign_day = count($sign_rule);$now_sign = true;
    	
    	$next_data = [];$ii = 1;$next = [];$now_prize = [];$prize_num=0;
    	foreach ($coupon as $k=>$v){
    		if($v['sign_day']<=$sign_day){
    			$prize_num++;
    			$coupon[$k]['prize_sure'] = 1;
    			if($v['sign_day']==$sign_day){
    				$now_prize = $v;
    				$now_prize['title'] = '恭喜获得'.$v['coupon_name'];
    				$this->db->update('user_sign_log',array('sign_prize'=>$v['coupon_id']),array('log_id'=>$log_id));
    			}
    		}else{
    			$now_prize['title'] = isset($now_prize['title'])?$now_prize['title']:'恭喜获得'.$sign['per_point'].'积分';
    			if($ii==1){
    				$next = $v;
    			}
    			$ii++;
    			$coupon[$k]['prize_sure'] = 0;
    		}
    	}
    	if(empty($next)){
    		$now_title = '恭喜你每天都已签到可获得所有签到奖品！';
    	}else{
    		$next_data = $next;
    		$next_data['next_day'] = $next['sign_day']-$sign_day;
    		if($now_sign){
    			$now_title = '再签到'.$next_data['next_day'].'天可获得'.$next_data['coupon_name'];
    		}else{
    			$now_title = '亲，你还没签到哦！'.'再签到'.$next_data['next_day'].'天可获得'.$next_data['coupon_name'];
    		}
    	}

            $result = array(
                'state'=>true,'now_prize'=>$now_prize,'now_title'=>$now_title,'coupon'=>$coupon,'sign_day'=>$sign_day,'prize_num'=>$prize_num,'sign_type'=>$sign_type
            );
    	echo json_encode($result);exit;

    }
//    //签到记录到user_sign_log表并生成卡劵记录到user_coupon表
//    public function sign_log(){//点击签到操作；需要传值有：活动id,签到类型，签到时间
//        $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'94';
//        $sign_id=isset($_GET['sign_id'])?$_GET['sign_id']:'';//当前签到活动id
//        $sign_time=isset($_GET['sign_time'])?$_GET['sign_time']:'';//签到时间（补签）
//        $sign_type=isset($_GET['sign_type'])?$_GET['sign_type']:'1';//签到类型
//
//        $this->db->trans_start();//事物开启
//        //判断本次签到所得奖品，记录到user_sign_log表
//        $data=array();
//        $data['sign_id']=$sign_id;
//        $data['sign_time']=strtotime($sign_time);
//        $data['user_id']=$user_id;
//        $data['sign_type']=$sign_type;
//        $data['add_time']=time();
//
//        $sign_day=strtotime($sign_time);
//        $month=date('Y-m',$sign_day);//本月,格式：2017-10
//        $day=explode('-',$month);
//        $thismonth=$day[1];
//        $thisyear=$day[0];
//        $startDay = $thisyear . '-' . $thismonth . '-1';
//        $endDay = $thisyear . '-' . $thismonth . '-' . date('t', strtotime($startDay));
//        $b_time  = strtotime($startDay);//当前月的月初时间戳
//        $e_time  = strtotime($endDay);//当前月的月末时间戳
//        $this->db->select('count(log_id) as num');
//        $this->db->from('user_sign_log');
//        $this->db->where('sign_id',$sign_id);
////        $this->db->where('sign_time>',$b_time);
////        $this->db->where('sign_time<',$e_time);//若活动规则是累计天数只计算当前月份，可开启
//        $this->db->where('user_id',$user_id);
//        $total_sign_day=$this->db->get()->row('num');//得到该用户在该签到活动下，本月已签到的次数
//        $total_sign_day=intval($total_sign_day+1);//加上本次
//
//        $this->db->select('*');
//        $this->db->from('shop_p_sign_rule');
//        $this->db->where('sign_id',$sign_id);
//        $this->db->order_by('sign_day');
//        $sign_rule=$this->db->get()->result_array();//获取当前签到活动规则
////        var_dump ($sign_rule);die;
//        foreach($sign_rule as $k=>$v){
//            if($v['sign_day']=='0'){
//                $sign_prize=$v['sign_prize'];//将每天签到给与的奖品id保存,166
//            }
//        }
//        $have=0;
//        foreach($sign_rule as $k1=>$v1){
//            if($total_sign_day==intval($v1['sign_day'])){//如果累计签到天数与签到规则中某一天数相等，则给与对应的奖品
//                $sign_prize=$sign_rule[$k1]['sign_prize'];
//                $data['sign_state']='0';
//                $have=1;
//            }
//        }
//        $data['sign_prize']=$sign_prize;
//        $this->db->insert('user_sign_log',$data);
//        $log_id= $this->db->insert_id();
//        if(isset($have) && ($have!=1)){//如果是领取每天的积分奖励，直接加入用户表
//            $coupon_id=$sign_prize;
//            $this->db->select('coupon_type');
//            $this->db->from('shop_coupon');
//            $this->db->where('coupon_id',$coupon_id);
//            $coupon_type=$this->db->get()->result_array();
//            $coupon_type=$coupon_type[0]['coupon_type'];
//            if($coupon_type==3){//如果是积分奖励，直接对用户积分充值,改变签到日志的sign_state，并插入user_intergral表
//                $this->db->select('coupon_value');
//                $this->db->from('shop_coupon');
//                $this->db->where('coupon_id',$coupon_id);
//                $coupon_value=$this->db->get()->result_array();
//                $coupon_point=$coupon_value[0]['coupon_value'];
//                $add_integral=$coupon_point;
//                $this->db->select ('integral,integral_total');
//                $this->db->from ('user');
//                $this->db->where ('user_id', $user_id);
//                $int = $this->db->get ()->result_array ();
//                $integ = $int[0]['integral'];
//                $integral_total = $int[0]['integral_total'];
//                $integral['integral'] = intval ($integ + $add_integral);
//                $integral['integral_total'] = intval ($integral_total + $add_integral);
//                $this->db->where ('user_id', $user_id);
//                $this->db->update ('user', $integral);
//
//                $state['sign_state']='1';
//                $this->db->where('log_id',$log_id);
//                $this->db->update('user_sign_log',$state);//改变日志表的状态sign_state
//
//                $this->db->select('sign_title');
//                $this->db->from('shop_p_sign');
//                $this->db->where('sign_id',$sign_id);
//                $sign_title=$this->db->get()->result_array();
//                $sign_title=$sign_title[0]['sign_title'];//获取当前签到活动名称
//                $data=array();
//                $data['user_id']=$user_id;
//                $data['integral_num']=$add_integral;
//                $data['ation_time']=time();
//                $data['action_user_id']='0';
//                $data['action_user_type']='0';
//                $data['action_type']='0';
//                $data['note']='签到活动'.$sign_title.'日常签到获得';
//                $this->db->insert('user_integral',$data);
//            }
//        }
//        if(($sign_type==2)){//补签
//            $this->db->select('count(log_id) as num');
//            $this->db->from('user_sign_log');
//            $this->db->where('sign_id',$sign_id);
//            $this->db->where('sign_time>',$b_time);
//            $this->db->where('sign_time<',$e_time);
//            $this->db->where('user_id',$user_id);
//            $this->db->where('sign_type',$sign_type);
//            $retro_num=$this->db->get()->row('num');//得到该用户在该签到活动下本月补签次数
//            if($retro_num<11) {//限制一月最多只能签十次
//                //更新user表
//                $reduce_integral = intval ($retro_num * 20);
//                $this->db->select ('integral,integral_total');
//                $this->db->from ('user');
//                $this->db->where ('user_id', $user_id);
//                $int = $this->db->get ()->result_array ();
//                $integ = $int[0]['integral'];
//                $integral_total = $int[0]['integral_total'];
//                $integral['integral'] = intval ($integ - $reduce_integral);
//                $integral['integral_total'] = intval ($integral_total - $reduce_integral);
//                $this->db->where ('user_id', $user_id);
//                $this->db->update ('user', $integral);
//                //插入user_integral表
//                $this->db->select('sign_title');
//                $this->db->from('shop_p_sign');
//                $this->db->where('sign_id',$sign_id);
//                $sign_title=$this->db->get()->result_array();
//                $sign_title=$sign_title[0]['sign_title'];//获取当前签到活动名称
//                $reduce_integral = intval ($retro_num * 20);
//                $data=array();
//                $data['user_id']=$user_id;
//                $data['integral_num']='-'.$reduce_integral;
//                $data['ation_time']=time();
//                $data['action_user_id']='0';
//                $data['action_user_type']='0';
//                $data['action_type']='0';
//                $data['note']='签到活动'.$sign_title.'补签扣除';
//                $this->db->insert('user_integral',$data);
//
//            }else{
//                $res['state']=false;//2表示签到失败
//                $res['message'] = '本月补签次数已达上限';
//                echo json_encode ($res);exit;
//            }
//        }
//        $res['state']=$this->db->trans_complete();//事物完成
//        $this->db->trans_off();//禁用事物
//        $res['message']='签到成功';
//        echo json_encode ($res);exit;
//    }
//
//    public function draw_sign(){//点击领取签到奖励，需要将奖品的coupon_id传过来
//        $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'94';
//        $coupon_id=isset($_GET['coupon_id'])?$_GET['coupon_id']:'';//当前领取奖品的id
//        $sign_rule_id=$this->db->select('sign_id,sign_rule_id')->from('shop_p_sign_rule')->where('sign_prize',$coupon_id)->get()->result_array();
//        $coupon['coupon_from_id']=$sign_rule_id[0]['sign_rule_id'];
//        $coupon['coupon_id']=$coupon_id;
//        $coupon['coupon_activity_id']=$sign_rule_id[0]['sign_id'];
//        $coupon['coupon_activity_type']='7';
//        $coupon['coupon_ger_time']=time();
//        $coupon['user_id']=$user_id;
//        $rel['state']=$this->db->insert('user_coupon',$coupon);
//        $rel['message']='领取成功';
//        echo json_encode ($rel);exit;
//    }


}

