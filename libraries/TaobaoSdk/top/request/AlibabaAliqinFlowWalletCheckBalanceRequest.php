<?php
/**
 * TOP API: alibaba.aliqin.flow.wallet.check.balance request
 * 
 * @author auto create
 * @since 1.0, 2015.12.09
 */
class AlibabaAliqinFlowWalletCheckBalanceRequest
{
	/** 
	 * 检查金额档位id
	 **/
	private $gradeId;
	
	private $apiParas = array();
	
	public function setGradeId($gradeId)
	{
		$this->gradeId = $gradeId;
		$this->apiParas["grade_id"] = $gradeId;
	}

	public function getGradeId()
	{
		return $this->gradeId;
	}

	public function getApiMethodName()
	{
		return "alibaba.aliqin.flow.wallet.check.balance";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->gradeId,"gradeId");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
