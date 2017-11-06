<?php
/**
 * TOP API: alibaba.aliqin.thf.hasassignthf request
 * 
 * @author auto create
 * @since 1.0, 2016.11.07
 */
class AlibabaAliqinThfHasassignthfRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "alibaba.aliqin.thf.hasassignthf";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
