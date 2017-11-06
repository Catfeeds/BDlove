<?php

/**
 * 淘话费发放参数
 * @author auto create
 */
class ThfRequestIsvdo
{
	
	/** 
	 * 活动id，唯一标示一个活动的数字，一个activeName对应一个activeId，取1-9999内的数字即可
	 **/
	public $active_id;
	
	/** 
	 * 活动名称
	 **/
	public $active_name;
	
	/** 
	 * user id
	 **/
	public $app_user_id;
	
	/** 
	 * 订单ID，如无ID提供自定义流水数字，不能重复
	 **/
	public $biz_order_id;
	
	/** 
	 * 买家nick
	 **/
	public $buyer_nick;
	
	/** 
	 * 有效期
	 **/
	public $exprie_date;
	
	/** 
	 * 额外参数
	 **/
	public $ext_paras;
	
	/** 
	 * 发放时间
	 **/
	public $grant_date;
	
	/** 
	 * 商家nick
	 **/
	public $seller_nick;
	
	/** 
	 * 淘话费发放数量 单位分
	 **/
	public $thf_fee;	
}
?>