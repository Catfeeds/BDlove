<?php
/**
 * TOP API: alibaba.aliqin.thf.send request
 * 
 * @author auto create
 * @since 1.0, 2015.12.18
 */
class AlibabaAliqinThfSendRequest
{
	/** 
	 * 淘话费发放参数
	 **/
	private $thfRequestISVDO;
	
	private $apiParas = array();
	
	public function setThfRequestISVDO($thfRequestISVDO)
	{
		$this->thfRequestISVDO = $thfRequestISVDO;
		$this->apiParas["thf_request_i_s_v_d_o"] = $thfRequestISVDO;
	}

	public function getThfRequestISVDO()
	{
		return $this->thfRequestISVDO;
	}

	public function getApiMethodName()
	{
		return "alibaba.aliqin.thf.send";
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
