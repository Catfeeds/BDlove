<?php
/**
 * TOP API: alibaba.aliqin.thf.sendbymixnick request
 * 
 * @author auto create
 * @since 1.0, 2015.12.18
 */
class AlibabaAliqinThfSendbymixnickRequest
{
	/** 
	 * 活动id，唯一标示一个活动的数字，一个activeName对应一个activeId，取1-9999内的数字即可
	 **/
	private $activeId;
	
	/** 
	 * 活动名称
	 **/
	private $activeName;
	
	/** 
	 * 订单ID，如无ID提供自定义数字，不能重复
	 **/
	private $bizOrderId;
	
	/** 
	 * 买家nick
	 **/
	private $buyerNick;
	
	/** 
	 * 过期时间
	 **/
	private $exprieDate;
	
	/** 
	 * 额外参数
	 **/
	private $extParas;
	
	/** 
	 * 发放时间
	 **/
	private $grantDate;
	
	/** 
	 * 淘话费
	 **/
	private $thfFee;
	
	private $apiParas = array();
	
	public function setActiveId($activeId)
	{
		$this->activeId = $activeId;
		$this->apiParas["active_id"] = $activeId;
	}

	public function getActiveId()
	{
		return $this->activeId;
	}

	public function setActiveName($activeName)
	{
		$this->activeName = $activeName;
		$this->apiParas["active_name"] = $activeName;
	}

	public function getActiveName()
	{
		return $this->activeName;
	}

	public function setBizOrderId($bizOrderId)
	{
		$this->bizOrderId = $bizOrderId;
		$this->apiParas["biz_order_id"] = $bizOrderId;
	}

	public function getBizOrderId()
	{
		return $this->bizOrderId;
	}

	public function setBuyerNick($buyerNick)
	{
		$this->buyerNick = $buyerNick;
		$this->apiParas["buyer_nick"] = $buyerNick;
	}

	public function getBuyerNick()
	{
		return $this->buyerNick;
	}

	public function setExprieDate($exprieDate)
	{
		$this->exprieDate = $exprieDate;
		$this->apiParas["exprie_date"] = $exprieDate;
	}

	public function getExprieDate()
	{
		return $this->exprieDate;
	}

	public function setExtParas($extParas)
	{
		$this->extParas = $extParas;
		$this->apiParas["ext_paras"] = $extParas;
	}

	public function getExtParas()
	{
		return $this->extParas;
	}

	public function setGrantDate($grantDate)
	{
		$this->grantDate = $grantDate;
		$this->apiParas["grant_date"] = $grantDate;
	}

	public function getGrantDate()
	{
		return $this->grantDate;
	}

	public function setThfFee($thfFee)
	{
		$this->thfFee = $thfFee;
		$this->apiParas["thf_fee"] = $thfFee;
	}

	public function getThfFee()
	{
		return $this->thfFee;
	}

	public function getApiMethodName()
	{
		return "alibaba.aliqin.thf.sendbymixnick";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->activeId,"activeId");
		RequestCheckUtil::checkNotNull($this->activeName,"activeName");
		RequestCheckUtil::checkNotNull($this->bizOrderId,"bizOrderId");
		RequestCheckUtil::checkNotNull($this->buyerNick,"buyerNick");
		RequestCheckUtil::checkNotNull($this->thfFee,"thfFee");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
