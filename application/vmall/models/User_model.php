<?php
class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->language('common');
    }
    
    
    //提交菜单内容给服务器
    public function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        $result = object_array(json_decode($output,true));
         if(isset($result['errcode'])&&$result['errcode']!=0){
            $this->lang->load('wxcode');
            $lang = $this->lang->line('wx');
            $err_msg = isset($lang[$result['errcode']])?$lang[$result['errcode']]:'数据错误'.$result['errcode'];
            if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                echo json_encode(array('state'=>false,'msg'=>$err_msg,'data'=>''));exit;// ajax 请求的处理方式
            }else{
                $this->common_function->show_message($err_msg);
                exit();// 正常请求的处理方式
            };
            
        }
        return $output;
    }
    
    
    /**
     *
     * 获取地区信息：省市区；
     *根据父级ID获取下级地区信息
     * @param $parent_id 父级ID
     * @param $area_deep 深度
     */
    public function get_area_info($parent_id=0) {
        $area =array();
        $provs_data = "[";
        $where1 = "area_parent_id=".$parent_id;
        $this->db->select('area_id,area_name');
        $this->db->from('area');
        $this->db->where($where1);
        $this->db->order_by('area_id','ASC');
        $provs = $this->db->get()->result_array();
        foreach ($provs as $key=>$val){
            $provs_data.='{"text":"'.$val['area_name'].'","value":"'.$val['area_id'].'"},';
            $where2 = "area_parent_id=".$val['area_id'];
            $this->db->select('area_id,area_name');
            $this->db->from('area');
            $this->db->where($where2);
            $this->db->order_by('area_id','ASC');
            $city[$val['area_id']] = $this->db->get()->result_array();
            
        }
        $provs_data = substr($provs_data,0,strripos($provs_data,","));
        $provs_data.="]";
        //print_r($provs_data);die;
        $citys_data="{";
        if(isset($city) && !empty($city)){
            foreach ($city as $key=>$val){
                if(!empty($city[$key])){
                    $citys_data.="{$key}".":[";
                    foreach ($val as $keys=>$vals){
                        $citys_data.='{"text":"'.$vals['area_name'].'","value":"'.$vals['area_id'].'"},';
                        $where3 = "area_parent_id=".$vals['area_id'];
                        $this->db->select('area_id,area_name');
                        $this->db->from('area');
                        $this->db->where($where3);
                        $this->db->order_by('area_id','ASC');
                        $dists[$vals['area_id']] = $this->db->get()->result_array();
                        
                    }
                    $citys_data = substr($citys_data,0,strripos($citys_data,","));
                    $citys_data.="],";
                }    
            }
        }
        $citys_data = substr($citys_data,0,strripos($citys_data,","));
        $citys_data.="}";
        //print_r($citys_data);die;
        $dists_data="{";
        if(isset($dists) && !empty($dists)){
            foreach ($dists as $key=>$val){
                if(!empty($dists[$key])){
                    $dists_data.="{$key}:[";
                    foreach ($val as $ke=>$va){
                        $dists_data.='{"text":"'.$va['area_name'].'","value":"'.$va['area_id'].'"},';
                    }
                    $dists_data = substr($dists_data,0,strripos($dists_data,","));
                    $dists_data.="],";
                }
            }
        }
        $dists_data = substr($dists_data,0,strripos($dists_data,","));
        $dists_data.="}";
        //print_r($dists_data);die;
        $area =array("provs_data"=>$provs_data,"citys_data"=>$citys_data,"dists_data"=>$dists_data);
        return $area ;
    }
    
    //openid 查询会员积分等级
    public  function get_openid_info($user_id){
        if(empty($user_id)){
            return false;
        }
        $this->db->select('t.integral_total,t.user_id,t.tel,t.head_portrait,t.wx_openid,t.wx_nickname,t.ecshopping_guide_id,t.ecstore_id,s.store_id,s.store_name,s.area_id,a.area_id,a.area_name')
        ->from('user as t')
        ->join('store s','s.store_id=t.ecstore_id','left')
        ->join('area a','s.area_id =a.area_id','left')
        ->where("t.user_id",$user_id);
        $info= $this->db->get()->row_array();
        if(empty($info)){
            return false;
        }
        
//         $this->db->select('uig_id,user_id,integral_num');
//         $this->db->from('user_integral');
//         $this->db->where("user_id",$info['user_id']);
//         $this->db->order_by('uig_id','ASC');
//         $integral= $this->db->get()->result_array();
//         if(count($integral)>=2){
//             $integration = 0;
//             foreach ($integral as $key=>$val){
//                 $integration+=$val['integral_num'];
//             }
//         }elseif (count($integral)==1){
//             $integration = $integral['integral_num'];
//         }else{
//             $integration = 0;
//         }
        $integration = empty($info['integral_total'])?0:$info['integral_total'];
        $info['integral_num'] = $integration;
        $this->db->select('mld_id,mld_name,mld_exp');
        $this->db->from('user_mldefault');
        $this->db->order_by('mld_id','ASC');
        $mldefault= $this->db->get()->result_array();
        if(count($mldefault)>=2){
             foreach ($mldefault as $key=>$val){
                 if($key<(count($mldefault)-2)){
                     $num1 = $mldefault[$key]['mld_exp'];
                     $num2 = $mldefault[$key+1]['mld_exp'];
                     if($integration<$num2){
                         $info['mld_name'] = $mldefault[$key]['mld_name'];
                         return $info;
                     }
                 }else{
                     $info['mld_name'] = $mldefault[$key]['mld_name'];
                     return $info;
                 }
             }
        }elseif (count($integral)<=1){
            $info['mld_name'] = "初级粉丝";
            return $info;
        }
    }
    
    
    /**
     *
     * 根据id获取省市区名称；
     * @return  string      四川省,成都市,金牛区
     */
    public function get_area_infos($province_id,$city_id,$area_id) {
       
        $where = "area_id in ($province_id,$city_id,$area_id) ";
        $this->db->select('area_id,area_name');
        $this->db->from('area');
        $this->db->where($where);
        $this->db->order_by('area_id','ASC');
        $info = $this->db->get()->result_array();
        $info[0] = isset($info[0]['area_name'])?$info[0]['area_name']:' ';
        $info[1] = isset($info[1]['area_name'])?$info[1]['area_name']:' ';
        $info[2] = isset($info[2]['area_name'])?$info[2]['area_name']:' ';
        return $info[0].",". $info[1].",". $info[2];
    }
    
    
    
    /**
     * 获取用户信息
     * @param  int $user_id   用户id
     * @param  char $field   查询字段
     */
    public function getUserInfo($user_id, $field = ''){
        if(isset($user_id)===FALSE){
            return FALSE;
        }
        if($field){
            $this->db->select($field)
            ->from('user')
            ->where('user_id', $user_id);
            $result = $this->db->get()->row_array();
        }else{
            $this->db->select('*')
            ->from('user')
            ->where('user_id', $user_id);
            $result = $this->db->get()->row_array();
        }
        if($result){
            return $result;
        }else{
            return FALSE;
        }
    }
    
    /**
     * 获取用户信息和地址信息
     * @param  int $user_id   用户id
     */
    public function getUserAddrInfo($user_id){
        if(isset($user_id)===FALSE){
            return FALSE;
        }
        $this->db->select('sb.user_id,sb.user_name,sb.is_status,st.is_default,st.province_id,st.city_id,st.area_id,st.address,st.tel,st.tel_2');
        $this->db->from('user as sb');
        $this->db->join('user_address as st',"st.user_id = sb.user_id",'left');
        $this->db->where('sb.user_id',$user_id);
        $this->db->where('sb.is_status','1');
        $result = $this->db->get()->row_array();
        if($result){
            return $result;
        }else{
            return FALSE;
        }
    }
     /**
     * 通过用户ID号和用户的电话整合，如在微商城的绑定用户电话
     * @param  int $user_id   用户id
     * @param  int $phone   手机号
     * @author leeyoung
     */
    public function userBindTel($phone,$user_id)
    {
    	            $oriUser=$this->db->select('user_id,wx_nickname,wx_openid,true_name,user_name,user_email,head_portrait,province_id,city_id,area_id,pwd,pay_pwd,balance,integral,
        integral_total,rechargeable_card_num,ecshopping_guide_id,ecstore_id,last_ecstore_id,ecgustore_id,is_follow,
        wx_create_time,wx_ceateymd,wx_token,wx_token_expire_in,member_sex,refresh_token,qq,birthday')->get_where('user',array('tel' => $phone,'is_status'=>1))->result_array();
        if(empty($oriUser))
        {
	        $this->db->update('user', array("tel"=>$phone),array('user_id' => $user_id));
	         $error = $this->db->error();
	        if(!empty($error['code']))
	        {
	        	return array('state' => false,'errmsg'=>"手机号绑定失败,系统异常，请稍后再试!");
	        }
	        else{
	        	return array('state' => true,'errmsg'=>"手机号绑定成功！",'data'=>array('userId'=>$user_id));
	        }
        }
        else if(count($oriUser)>1)
        {
        	return array('state' => false,'errmsg'=>"系统异常,请联系平台客服");//手机号不能对应两个用户
        }
        else{
        	 if(!empty($oriUser[0]['wx_openid']))
	        {
	        	return array('state' => false,'errmsg'=>"手机已经被绑定了,请更换手机");
	        }
	        else{
	        	//检查是否存在订单,注：微商城上购买必须先绑定手机号
	        	$oriOrder= $this->db->select('order_sn')->get_where('shop_order',array('buyer_id' => $user_id))->row_array();
	        	if(!empty($oriOrder))
	        	{
	        		return array('state' => false,'errmsg'=>"系统异常,请联系平台客服");//合并的前提是微商城购物前必须绑定手机号
	        	}
	        	$this->db->trans_start();
	        	//合并微信通知jk_weixin_notify_log
	        	$oriWXNotifyLog=$this->db->select('wnl_title,wnl_code,wnl_content,wnl_type,wnl_time,wnl_to_usersn,'.$oriUser[0]['user_id'].' user_id,order_sn')
	        	->get_where('weixin_notify_log',array('user_id' => $user_id))->result_array();
	        
	        	if(!empty($oriWXNotifyLog))
	        	{
	        		$this->db->insert_batch('weixin_notify_log', $oriWXNotifyLog);
	        	}
	            //合并用户积分jk_user_integral
	            $oriUserIntegral=$this->db->select(''.$oriUser[0]['user_id'].' user_id,integral_num,ation_time,action_user_id,action_user_type,action_user_name,,action_type,note')
	            ->get_where('user_integral',array('user_id' => $user_id))->result_array();
	            if(!empty($oriUserIntegral))
	        	{
	        		$this->db->insert_batch('user_integral', $oriUserIntegral);
	        	}
	        	//合并用户优惠券jk_user_coupon
	        	$oriUserCoupon=$this->db->select('coupon_activity_id,coupon_activity_type,coupon_code,coupon_ger_time,coupon_cost_time,'.$oriUser[0]['user_id'].' user_id')
	        	->get_where('user_coupon',array('user_id' => $user_id))->result_array();
	        
	        	if(!empty($oriUserCoupon))
	        	{
	        		$this->db->insert_batch('user_coupon', $oriUserCoupon);
	        	}
	        	//合并聊天记录jk_user_chat_log
	        	$oriUserChatLog=$this->db->select('spg_id,'.$oriUser[0]['user_id'].' user_id,store_id,send_time,send_content,con_type,source')
	        	->get_where('user_chat_log',array('user_id' => $user_id))->result_array();
	        
	        	if(!empty($oriUserChatLog))
	        	{
	        		$this->db->insert_batch('user_chat_log', $oriUserChatLog);
	        	}
	        	//合并微信关注绑定记录jk_user_bind_or_follow_wx
	        	$oriUserBindOrFollowWX=$this->db->select(''.$oriUser[0]['user_id'].' user_id,wx_action,wx_action_time,wx_action_value,note')
	        	->get_where('user_bind_or_follow_wx',array('user_id' => $user_id))->result_array();
	        
	        	if(!empty($oriUserBindOrFollowWX))
	        	{
	        		$this->db->insert_batch('user_bind_or_follow_wx', $oriUserBindOrFollowWX);
	        	}
	        	//合并资金jk_user_asset_log
	        	$oriUserAssetLog=$this->db->select(''.$oriUser[0]['user_id'].' user_id,pay_sn,log_type,asset_out,asset_in,asset,note,time')
	        	->get_where('user_asset_log',array('user_id' => $user_id))->result_array();
	        
	        	if(!empty($oriUserAssetLog))
	        	{
	        		$this->db->insert_batch('user_asset_log', $oriUserAssetLog);
	        	}
	        	//合并用户的浏览记录jk_user_adv_store
	        	$oriUserAdvStore=$this->db->select(''.$oriUser[0]['user_id'].' user_id,store_id,adv_time')
	        	->get_where('user_adv_store',array('user_id' => $user_id))->result_array();
	        
	        	if(!empty($oriUserAdvStore))
	        	{
	        		$this->db->insert_batch('user_adv_store', $oriUserAdvStore);
	        	}
	        	//合并收藏jk_shop_favorites
	        	$oriShopFavorites=$this->db->select(''.$oriUser[0]['user_id'].' member_id,member_name,fav_id,fav_type,fav_time,store_id,store_name,sc_id,goods_name,goods_ea_id,goods_image,gc_id,log_price,log_msg')
	        	->get_where('shop_favorites',array('member_id' => $user_id))->result_array();
	        
	        	if(!empty($oriShopFavorites))
	        	{
	        		$this->db->insert_batch('shop_favorites', $oriShopFavorites);
	        	}
	        	//合并充值记录jk_recharge_apply
	        	$oriRechargeApply=$this->db->select('pay_sn,pay_type,user_type,'.$oriUser[0]['user_id'].' apply_user_id,user_name,amount,bank_name,receivable_note,state,
	        	apply_time,operate_time,operate_user_id,operate_admin_name')
	        	->get_where('recharge_apply',array('apply_user_id' => $user_id))->result_array();
	        
	        	if(!empty($oriRechargeApply))
	        	{
	        		$this->db->insert_batch('recharge_apply', $oriRechargeApply);
	        	}
	        	//会员积分经验表jk_shop_points_log
	        	$oriShopPointsLog=$this->db->select(''.$oriUser[0]['user_id'].' pl_memberid,pl_membername,pl_adminid,pl_adminname,pl_points,pl_addtime,pl_desc,pl_stage,pl_stage_type')
	        	->get_where('shop_points_log',array('pl_memberid' => $user_id))->result_array();
	        
	        	if(!empty($oriShopPointsLog))
	        	{
	        		$this->db->insert_batch('shop_points_log', $oriShopPointsLog);
	        	}
	        	//合并购物车信息jk_shop_cart
	        	$oriShopCart=$this->db->select('stocks_sn,goods_ea_id,store_id,'.$oriUser[0]['user_id'].' buyer_id,goods_id,goods_name,goods_num,stocks_bar_code,goods_image,goods_a_id,goods_spec,goods_size_remark,bl_id,goods_color,goods_color_remark,receive_type,user_type')
	        	->get_where('shop_cart',array('buyer_id' => $user_id))->result_array();
	        
	        	if(!empty($oriShopCart))
	        	{
	        		$this->db->insert_batch('shop_cart', $oriShopCart);
	        	}
	        	//合并用户的积分、资金
	        	$curUser=$this->db->select('user_id,wx_nickname,wx_openid,true_name,user_name,user_email,head_portrait,province_id,city_id,area_id,pwd,pay_pwd,balance,integral,
        integral_total,rechargeable_card_num,ecshopping_guide_id,ecstore_id,last_ecstore_id,ecgustore_id,is_follow,
        wx_create_time,wx_ceateymd,wx_token,wx_token_expire_in,member_sex,refresh_token,qq,birthday')->get_where('user',array('user_id' => $user_id,'is_status'=>1))->row_array();
	            $result=$this->integrationUserinfo($oriUser[0],$curUser);
				$this->db->where('user_id', $oriUser[0]['user_id']);
				$this->db->update('user', $result['data']);
				//当前用户失效
				$this->db->update('user', array('is_status'=>0), array('user_id' => $user_id));
				$this->db->trans_complete();
	        	if($this->db->trans_status() === FALSE)
				{
				     return array('state' => false,'errmsg'=>"系统异常，请联系平台客服，或者稍后再试！");
				}
				else{
					return array('state' => true,'errmsg'=>"绑定成功",'data'=>array('userId'=>$oriUser[0]['user_id']));
				}
				
	        }
        }
    }
     /**
     * 通过用户ID号和用户的电话整合，如在微商城的绑定用户电话
     * @param  int $user_id   用户id
     * @param  int $phone   手机号
     * @author leeyoung
     */
     public function integrationUserinfo($newUser,$oriUser)
    {
    	if(is_array($newUser)&&is_array($oriUser)&&count($newUser)==count($oriUser))
    	{
    		$userinfo['wx_nickname']=!empty($newUser['wx_nickname'])?$newUser['wx_nickname']:$oriUser['wx_nickname'];
    		$userinfo['wx_openid']=!empty($newUser['wx_openid'])?$newUser['wx_openid']:$oriUser['wx_openid'];
    		$userinfo['true_name']=!empty($newUser['true_name'])?$newUser['true_name']:$oriUser['true_name'];
    		$userinfo['user_name']=$newUser['user_name'];
    		$userinfo['user_email']=!empty($newUser['user_email'])?$newUser['user_email']:$oriUser['user_email'];
    		$userinfo['head_portrait']=!empty($newUser['head_portrait'])?$newUser['head_portrait']:$oriUser['head_portrait'];
    		$userinfo['province_id']=!empty($newUser['province_id'])?$newUser['province_id']:$oriUser['province_id'];
    		$userinfo['city_id']=!empty($newUser['city_id'])?$newUser['city_id']:$oriUser['city_id'];
    		$userinfo['area_id']=!empty($newUser['area_id'])?$newUser['area_id']:$oriUser['area_id'];
    		$userinfo['pwd']=!empty($newUser['pwd'])?$newUser['pwd']:$oriUser['pwd'];
    		$userinfo['pay_pwd']=!empty($newUser['pay_pwd'])?$newUser['pay_pwd']:$oriUser['pay_pwd'];
    		$userinfo['balance']=!empty($newUser['balance'])?$newUser['balance']:$oriUser['balance'];
    		$userinfo['integral']=$newUser['integral']+$oriUser['integral'];
    		$userinfo['integral_total']=$newUser['integral_total']+$oriUser['integral_total'];
    		$userinfo['rechargeable_card_num']=$newUser['rechargeable_card_num']+$oriUser['rechargeable_card_num'];
    		$userinfo['ecshopping_guide_id']=!empty($newUser['ecshopping_guide_id'])?$newUser['ecshopping_guide_id']:$oriUser['ecshopping_guide_id'];
    		$userinfo['ecstore_id']=!empty($newUser['ecstore_id'])?$newUser['ecstore_id']:$oriUser['ecstore_id'];
    		$userinfo['last_ecstore_id']=$oriUser['last_ecstore_id'];
    		$userinfo['ecgustore_id']=!empty($newUser['ecgustore_id'])?$newUser['ecgustore_id']:$oriUser['ecgustore_id'];
    		$userinfo['is_follow']=!empty($newUser['is_follow'])?$newUser['is_follow']:$oriUser['is_follow'];
    		$userinfo['wx_create_time']=!empty($newUser['wx_create_time'])?$newUser['wx_create_time']:$oriUser['wx_create_time'];
    		$userinfo['wx_ceateymd']=!empty($newUser['wx_ceateymd'])?$newUser['wx_ceateymd']:$oriUser['wx_ceateymd'];
    		$userinfo['wx_token']=!empty($newUser['wx_token'])?$newUser['wx_token']:$oriUser['wx_token'];
    		$userinfo['wx_token_expire_in']=!empty($newUser['wx_token_expire_in'])?$newUser['wx_token_expire_in']:$oriUser['wx_token_expire_in'];
    		$userinfo['member_sex']=!empty($newUser['member_sex'])?$newUser['member_sex']:$oriUser['member_sex'];
    		$userinfo['refresh_token']=!empty($newUser['refresh_token'])?$newUser['refresh_token']:$oriUser['refresh_token'];
    		$userinfo['birthday']=!empty($newUser['birthday'])?$newUser['birthday']:$oriUser['birthday'];
    		return array('state'=>'true','msg'=>'整合成功!','data'=>$userinfo);
    	}
    	else{
    		return array('state'=>'false','msg'=>'传入的数据错误!','data'=>'');
    	}
    }
    
}