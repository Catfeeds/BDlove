<?php
/**
 * 互忆无线短信接口类
 * @author k
 * @version 2016-6-24 14:33:02
 */
class Ihuyi {
	private $account = '';
	private $apikey = '';
	public $code = '';
	public $msg = '';
	
	/**
	 * __construct
	 */
	public function __construct($data) {
		$this->account = $data['account'];
		$this->apikey = $data['apikey'];
	}
	
	/**
	 * 短信发送
	 *
	 * @param unknown $mobile        	
	 * @param unknown $content        	
	 * @return boolean
	 */
	public function send_sms($mobile, $content) {
		$target = 'http://106.ihuyi.cn/webservice/sms.php?method=Submit';
		$time = time ();
		$password = md5 ( trim ( $this->account ) . trim ( $this->apikey ) . trim ( $mobile ) . trim ( $content ) . $time );
		$post_data = "account={$this->account}&password={$password}&time={$time}&mobile=" . $mobile . "&content=".rawurlencode($content);
		$gets = $this->xml_to_array ( $this->post ( $post_data, $target ) );
		$this->code = $gets ['SubmitResult'] ['code'];
		$this->msg = $gets ['SubmitResult'] ['msg'];
		if ($gets ['SubmitResult'] ['code'] == 2) {
			return array('state'=>true);
		} else {
			return array('state'=>false,'msg'=>$gets['SubmitResult']['msg']);
		}
	}
	
	/**
	 * 用户帐号信息余额查询
	 *
	 * @return unknown|boolean 成功返回短信剩余条数，查询失败返回false
	 */
	public function query_num() {
		$target = 'http://106.ihuyi.cn/webservice/sms.php?method=GetNum';
		$time = time ();
		$password = md5 ( trim ( $this->account ) . trim ( $this->apikey ) . $time );
		$post_data = "account={$this->account}&password={$password}&time={$time}";
		$gets = $this->xml_to_array ( $this->post ( $post_data, $target ) );
		$this->code = $gets ['GetNumResult'] ['code'];
		$this->msg = $gets ['GetNumResult'] ['msg'];
		if ($gets ['GetNumResult'] ['code'] == 2) {
			return $gets ['GetNumResult'] ['num'];
		} else {
			return false;
		}
	}
	
	/**
	 *
	 * @param unknown $curlPost        	
	 * @param unknown $url        	
	 */
	private function post($curlPost, $url) {
		$curl = curl_init ();
		curl_setopt ( $curl, CURLOPT_URL, $url );
		curl_setopt ( $curl, CURLOPT_HEADER, false );
		curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $curl, CURLOPT_NOBODY, true );
		curl_setopt ( $curl, CURLOPT_POST, true );
		curl_setopt ( $curl, CURLOPT_POSTFIELDS, $curlPost );
		$return_str = curl_exec ( $curl );
		curl_close ( $curl );
		return $return_str;
	}
	
	/**
	 *
	 * @param unknown $xml        	
	 */
	private function xml_to_array($xml) {
		$reg = "/<(\\w+)[^>]*?>([\\x00-\\xFF]*?)<\\/\\1>/";
		if (preg_match_all ( $reg, $xml, $matches )) {
			$count = count ( $matches [0] );
			$arr = array ();
			for($i = 0; $i < $count; $i ++) {
				$key = $matches [1] [$i];
				$val = $this->xml_to_array ( $matches [2] [$i] ); // 递归
				if (array_key_exists ( $key, $arr )) {
					if (is_array ( $arr [$key] )) {
						if (! array_key_exists ( 0, $arr [$key] )) {
							$arr [$key] = array (
									$arr [$key] 
							);
						}
					} else {
						$arr [$key] = array (
								$arr [$key] 
						);
					}
					$arr [$key] [] = $val;
				} else {
					$arr [$key] = $val;
				}
			}
			return $arr;
		} else {
			return $xml;
		}
	}
}