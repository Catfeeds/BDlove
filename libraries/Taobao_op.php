<?php

/**
 * Taobao_op Class
 * 淘宝函数类
 * @gjd
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Taobao_op {

    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct() {
        // Assign the CodeIgniter super-object
        $this->CI = & get_instance();
        require_once ROOTPATH . 'libraries/TaobaoSdk/TopSdk.php';
    }

    protected $AppKey = '';
    protected $AppSecret = '';
    protected $SessionKey = '';

    /**
     * 初始化AppKey,AppSecret,SessionKey
     */
    public function init($AppKey, $AppSecret = '', $SessionKey = '') {
        //var_dump(class_exists('Autoloader'));exit;
        $this->AppKey = $AppKey;
        $this->AppSecret = $AppSecret;
        $this->SessionKey = $SessionKey;
    }

    /**
     * 获取淘宝店铺店铺的订单
     * @param date   $stime     开始时间
     * @param date   $etime     结束时间
     * @param number $page_no   开始页
     * @param number $page_size 页数
     * @return type
     */
    public function get_all_orders($stime, $etime, $page_no = 1, $page_size = 50) {
        $stime = date('Y-m-d H:i:s', $stime);
        $etime = date('Y-m-d H:i:s', $etime);
        $orders = array();
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new TradesSoldGetRequest;
        $req->setFields("seller_nick,buyer_nick,title,type,trade_from,created,sid,tid");
//        $req->setStatus("WAIT_SELLER_SEND_GOODS");   //等待卖家发货 正式时开启
        if (!empty($stime)) {
            $req->setStartCreated("{$stime}");
        }
        $req->setEndCreated("{$etime}");
        $req->setPageSize("$page_size");
        $req->setUseHasNext("true");
        while (true) {
            $req->setPageNo("{$page_no}");
            $resp = $c->execute($req, $this->SessionKey);
            $info = $resp;
            if (isset($info->code) && isset($info->sub_msg)) {   //获取错误，停止获取
                $data = array('state' => false, 'msg' => $info->sub_msg);
                break;
            } elseif (isset($info->trades)) {                        //输出返回结果，可根据自己需要做其他操作
                $param = $info->trades;
                foreach ($param->trade as $k => $v) {
                    $v = (array) $v;
                    $tid = $v['tid'];
                    $order_info = $this->get_orders_by_tid($tid);   //获取订单详细信息
                    if ($order_info['state'] && isset($order_info['order_info'])) {
                        $orders[] = $order_info['order_info'];
                    } else {
                        $data = $order_info;
                        break;
                    }
                }
            } else {
                $data = array('state' => true, 'msg' => '没有更多的订单！');
                break;
            }
            if ($info->has_next) {   //继续查询下一页
                $page_no++;
            } else {
                $data = array('state' => true, 'msg' => '全部成功！');
                break;
            }
        }
        $total = count($orders);
        if ($data['state'] && $total >= 1) {
            return array('state' => $data['state'], 'orders' => $orders, 'total' => $total);
        } else {
            return $data;
        }
    }

    /**
     * 获取淘宝店铺店铺中出售的商品
     * @param number $page_no   开始页
     * @param number $page_size 页数
     * @param bool   $flag  成功后是否去获取仓库中（未上架）的商品，默认true
     * @return type
     */
    public function get_all_goods($page_no = 1, $page_size = 200, $flag = true,$last_goods_sync_time='') {
        $goods = array();
        /*if($last_goods_sync_time){
        	if($last_goods_sync_time+3600*24*20<time()){
        		$last_goods_sync_time = time()-3600*24*20;
        	}
        	$start = date('Y-m-d H:i:s',$last_goods_sync_time);
        	$end = date('Y-m-d H:i:s',time());
        }*/
        
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new ItemsOnsaleGetRequest;
        $req->setFields("num_iid");
        //         $req->setUseHasNext("true");
        while (true) {
             $req->setPageNo("$page_no");
             $req->setPageSize("$page_size");
	        /*if($last_goods_sync_time){
	        	$req->setStartModified($start);
	            $req->setEndModified($end);
	        }*/
	        $resp = $c->execute($req, $this->SessionKey);//start_modified,end_modified
        //print_r($resp);die;
            //             var_dump($resp);exit;
            $info = (array) $resp;
            if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
                $data = array('state' => false, 'msg' => $info['sub_msg']);
                break;
            } elseif (isset($info['items'])) {   //输出返回结果，可根据自己需要做其他操作
                $item = $info['items']->item;
                foreach ($item as $k => $v) {
                    $v = (array) $v;
                    //                     if($v['num_iid'] == '2100509034287'){   //测试沙箱时
                    if ($v['num_iid']) {
                        $goods_info = $this->get_goods_by_num_iid($v['num_iid']);
                        if ($goods_info['state'] && isset($goods_info['goods_info'][0])) {
                            $goods[] = $goods_info['goods_info'][0];
                            $data = array('state' => true, 'msg' => '');
                        } else {
                            $data['state'] = $goods_info['state'];
                            $data['msg'] = $goods_info['msg'];
                            break 2;    //失败就结束,跳出两重循环
                        }
                    }
                }
            }
            //             break;
            if (isset($info['total_results'])) {
                $total = $info['total_results'];
                if (ceil($total / $page_size) > $page_no) {
                    $page_no++;
                } else {
                    break;
                }
            }
        }
        //print_r($goods);exit;
        $total = count($goods);
        if ($flag && $data['state']) {
            $depot_goods = $this->get_all_goods_in_depots($page_no, $page_size);
            if ($depot_goods['data'] && !empty($depot_goods['info'])) {   //如果获取仓库中的商品失败依然按出错处理（因为要匹配所有商城中的商品，删除掉本地数据中商城中已不存在的商品）
                $goods = array_merge($goods, $depot_goods['info']);
                $total += $depot_goods['total'];
            } else {
                $data = $depot_goods['data'];
                $total = 0;
                $goods = [];
            }
        }
        if($total==0){
        	$data['msg'] = '商品为空!';
        }
        //print_r($total);print_r($goods);exit;
        return array('info' => $goods, 'data' => $data, 'total' => $total);
    }

    /**
     * 获取淘宝店铺店铺中仓库中（未上架）的商品
     * @param number $page_no   开始页
     * @param number $page_size 页数
     * @return type
     */
    public function get_all_goods_in_depots($page_no = 1, $page_size = 100) {
        $goods = array();
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new ItemsInventoryGetRequest;
        $req->setFields("num_iid");
        //         $req->setUseHasNext("true");
        while (true) {
            $req->setPageNo("$page_no");
            $req->setPageSize("$page_size");
            $resp = $c->execute($req, $this->SessionKey);
            //             var_dump($resp);exit;
            $info = (array) $resp;
            if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
                $data = array('state' => false, 'msg' => $info['sub_msg']);
                break;
            } elseif (isset($info['items'])) {   //输出返回结果，可根据自己需要做其他操作
                $item = $info['items']->item;
                foreach ($item as $k => $v) {
                    $v = (array) $v;
                    if ($v['num_iid']) {
                        $goods_info = $this->get_goods_by_num_iid($v['num_iid']);
                        if (isset($goods_info['goods_info'][0])) {
                            $goods[] = $goods_info['goods_info'][0];
                            $data = array('state' => true, 'msg' => '');
                        } else {
                            continue;
                        }
                    }
                }
            }
            //             break;
            if (isset($info['total_results'])) {
                $total = $info['total_results'];
                if (ceil($total / $page_size) > $page_no) {
                    $page_no++;
                } else {
                    break;
                }
            }
        }
        $total = count($goods);
//        var_dump($goods);exit;
        return array('info' => $goods, 'data' => $data, 'total' => $total);
    }
    /**
     * 获取淘宝店铺店铺中出售的商品
     * @param number $page_no   开始页
     * @param number $page_size 页数
     * @param bool   $flag  成功后是否去获取仓库中（未上架）的商品，默认true
     * @return type
     */
    public function get_all_goods_num_iid($page_no = 1, $page_size = 200, $flag = false,$last_goods_sync_time='') {
    	$goods = array();
    	/*if($last_goods_sync_time){
    		if($last_goods_sync_time+3600*24*20<time()){
    			$last_goods_sync_time = time()-3600*24*20;
    		}
    		$start = date('Y-m-d H:i:s',$last_goods_sync_time);
    		$end = date('Y-m-d H:i:s',time());
    	}*/
    
    	$data = array('state' => false, 'msg' => '系统错误！');
    	$c = new TopClient;
    	$c->appkey = $this->AppKey;
    	$c->secretKey = $this->AppSecret;
    	$req = new ItemsOnsaleGetRequest;
    	$req->setFields("num_iid,sold_quantity,cid,outer_id");
    	//         $req->setUseHasNext("true");
    	$flags = true;$goods=array();$total=0;
    	while (true) {
    		$req->setPageNo("$page_no");
    		$req->setPageSize("$page_size");
    		/*if($last_goods_sync_time){
    			$req->setStartModified($start);
    			$req->setEndModified($end);
    		}*/
    		$resp = $c->execute($req, $this->SessionKey);//start_modified,end_modified
    		//print_r($resp);die;exit;
    		//var_dump($resp);exit;die;
    		$info = (array) $resp;
    		if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
    			$data = array('state' => false, 'msg' => $info['sub_msg']);$flags = false;
    			break;
    		} elseif (isset($info['items'])) {   //输出返回结果，可根据自己需要做其他操作
    			$item = $info['items']->item;
    			foreach ($resp->items->item as $v){
    				//if(!empty($v->outer_id)){
    					//$isnum = $this->CI->db->select('count(1) as num')->like('article_number',$v->outer_id,'after')->get('stocks')->row('num');
    					//if($isnum)
    						$goods[] = (array)$v;
    				//}
    			}
    			$data['state'] = true;$data['msg'] = '获取成功';
    		}
    		//             break;
    		if (isset($info['total_results'])) {
    			$total = $info['total_results'];
    			if (ceil($total / $page_size) > $page_no) {
    				$page_no++;
    			} else {
    				break;
    			}
    		}
    	}
    	if(!$flags){
    	    return array('info' => $goods, 'data' => $data, 'total' => $total);
    	}
    	//print_r($goods);exit;
    	$total = count($goods);
    	if ($flag && $data['state']) {
    		$depot_goods = $this->get_all_goods_in_depots_num_iid($page_no, $page_size);
    		if ($depot_goods['data'] && !empty($depot_goods['info'])) {   //如果获取仓库中的商品失败依然按出错处理（因为要匹配所有商城中的商品，删除掉本地数据中商城中已不存在的商品）
    			$goods = array_merge($goods, $depot_goods['info']);
    			$total += $depot_goods['total'];
    		} else {
    			$data = $depot_goods['data'];
    			$total = 0;
    			$goods = [];
    		}
    	}
    	if($total==0){
    		$data['msg'] = '商品为空!';
    	}
    	//print_r($total);print_r($goods);exit;
    	return array('info' => $goods, 'data' => $data, 'total' => $total);
    }
    
    /**
     * 获取淘宝店铺店铺中仓库中（未上架）的商品
     * @param number $page_no   开始页
     * @param number $page_size 页数
     * @return type
     */
    public function get_all_goods_in_depots_num_iid($page_no = 1, $page_size = 100) {
    	$goods = array();
    	$data = array('state' => false, 'msg' => '系统错误！');
    	$c = new TopClient;
    	$c->appkey = $this->AppKey;
    	$c->secretKey = $this->AppSecret;
    	$req = new ItemsInventoryGetRequest;
    	$req->setFields("num_iid");
    	//         $req->setUseHasNext("true");
    	while (true) {
    		$req->setPageNo("$page_no");
    		$req->setPageSize("$page_size");
    		$resp = $c->execute($req, $this->SessionKey);
    		           // print_r($resp);exit;
    		$info = (array) $resp;
    		if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
    			$data = array('state' => false, 'msg' => $info['sub_msg']);
    			break;
    		} elseif (isset($info['items'])) {   //输出返回结果，可根据自己需要做其他操作
    			$item = $info['items']->item;
    			foreach ($item as $k => $v) {
    				//if(!empty($v->outer_id)){
    					//$isnum = $this->CI->db->select('count(1) as num')->like('article_number',$v->outer_id,'after')->get('stocks')->row('num');
    					//if($isnum)
    						$goods[] = (array)$v;
    				//}
    				 
    			}
    		}
    		//             break;
    		if (isset($info['total_results'])) {
    			$total = $info['total_results'];
    			if (ceil($total / $page_size) > $page_no) {
    				$page_no++;
    			} else {
    				break;
    			}
    		}
    	}
    	$total = count($goods);
    	//        var_dump($goods);exit;
    	return array('info' => $goods, 'data' => $data, 'total' => $total);
    }
    
    /**
     * 淘宝商品上架
     * @param number $uec_goods_iiud   链接ID
     * @return bool
     */
    public function putaway($uec_goods_iiud, $num = '2') {
        if (empty($uec_goods_iiud)) {
            return false;
        }
        $data = array('state' => false, 'msg' => '系统错误');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new ItemUpdateListingRequest;
        $req->setNumIid($uec_goods_iiud);
        $req->setNum($num);
        $resp = $c->execute($req, $this->SessionKey);
        $info = (array) $resp;
        if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $info['sub_msg']);
        } elseif (isset($info['item'])) {
            $data = array('state' => true, 'msg' => '操作成功！');
        }
        return $data;
    }

    /**
     * 淘宝商品下架
     * @param number $uec_goods_iiud   链接ID
     * @return array
     */
    public function sold_out($uec_goods_iiud) {
        if (empty($uec_goods_iiud)) {
            return false;
        }
        $data = array('state' => false, 'msg' => '系统错误');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new ItemUpdateDelistingRequest;
        $req->setNumIid($uec_goods_iiud);
        $resp = $c->execute($req, $this->SessionKey);
        $info = (array) $resp;
        // print_r($info);die;
        if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $info['sub_msg']);
        } elseif (isset($info['item'])) {
            $data = array('state' => true, 'msg' => '操作成功！');
        }
        return $data;
    }


    /**
     * 淘宝商品下架
     * @param number $uec_goods_iiud   链接ID
     * @param number $stocks           库存数量
     * @param string $sku              sku
     * @return array
     */
    public function stock_sync($uec_goods_iiud, $stocks, $sku = null) {
        // echo $uec_goods_iiud.'</br>';
        // echo $stocks .'</br>';
        // ;
        if (empty($uec_goods_iiud) && empty($stocks)) {
            return false;
        }
        $data = array('state' => false, 'msg' => '系统错误');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new ItemQuantityUpdateRequest;
        $req->setNumIid("$uec_goods_iiud");
        if (!empty($sku)) {
            $req->setSkuId("$sku");
        }

        $req->setQuantity("$stocks");
        $resp = $c->execute($req, $this->SessionKey);
        $info = (array) $resp;
        if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $info['sub_msg']);
        } elseif (isset($info['item'])) {
            $data = array('state' => true, 'msg' => '操作成功！');
        }
        return $data;
    }
        /**
     * 淘宝商品多个SKU修改（20个）
     * @param number $uec_goods_iiud   链接ID
     * @param string  $outerid_quantities 库存
     * @return array
     */
    public function stock_sync_batch($uec_goods_iiud, $outerid_quantities) {
        if (empty($uec_goods_iiud) && empty($outerid_quantities)) {
            return false;
        }
        
//        var_dump($outerid_quantities);
        $data = array('state' => false, 'msg' => '系统错误');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new SkusQuantityUpdateRequest;
        $req->setNumIid("{$uec_goods_iiud}");
        //print_r($uec_goods_iiud);print_r($outerid_quantities);die;
        $req->setSkuidQuantities("$outerid_quantities");
        //$req->setOuteridQuantities("$outerid_quantities");
        $resp = $c->execute($req, $this->SessionKey);
//        var_dump($resp);exit;
        $info = (array) $resp;
        if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $info['sub_msg']);
        } elseif (isset($info['item'])) {
            $data = array('state' => true, 'msg' => '操作成功！');
        }
        return $data;
    }

   
    
    /**
     * 通过商品分类id 属性id 获取属性值
     * @param number $uec_goods_iiud   链接ID
     * @return array
     */
    public function get_props_by_cid($cid,$props){
        if (!($cid && $props)) {
            return array('state' => false, 'msg' => '参数错误！');
        }
        $propsInfo = array();
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $reqs = new ItempropvaluesGetRequest;
        $reqs->setFields("cid,pid,prop_name,vid,name,name_alias,status,sort_order");
        $reqs->setCid("$cid");
        $reqs->setPvs("$props");
        $resps = $c->execute($reqs);
        $resps = object_array($resps);
        if (isset($resps['code']) && isset($resps['sub_msg'])) {   //获取错误，停止获取
            return $data = array('state' => false, 'msg' => $resps['sub_msg']);
        } else{
            if(isset($resps['prop_values']) && isset($resps['prop_values']['prop_value'])){
                $propsInfo = $resps['prop_values']['prop_value'];
                $data = array('state' => true, 'msg' => '操作成功！', 'propsInfo' => $propsInfo );
            }
        }
        return $data;
        
    }
    
    
    
    /**
     * 通过商品分类id 获取标准属性
     * @param number $uec_goods_iiud   链接ID
     * @return array
     */
    public function get_propsName_by_cid($cid){
        if (!$cid) {
            return array('state' => false, 'msg' => '参数错误！');
        }
        $propsInfo = array();
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $reqs = new ItempropsGetRequest;
        $reqs->setFields("pid,name,must,multi,prop_values");
        $reqs->setCid("$cid");
        $resps = $c->execute($reqs);
        $resps = object_array($resps);
       // print_r($resps);die;
        if (isset($resps['code']) && isset($resps['sub_msg'])) {   //获取错误，停止获取
            return $data = array('state' => false, 'msg' => $resps['sub_msg']);
        } else{
            if(isset($resps['prop_values']) && isset($resps['prop_values']['prop_value'])){
                $propsInfo = $resps['prop_values']['prop_value'];
                $data = array('state' => true, 'msg' => '操作成功！', 'propsInfo' => $propsInfo );
            }
        }
        return $data;
    
    }
    

    
    /*商品优惠详情查询  */
    public  function get_ump_promotion($item_id){
        if(empty($item_id)){
            return array('state' => false, 'msg' => '参数错误！');
        }
        $price_info = array();
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new UmpPromotionGetRequest;
        $req->setItemId("$item_id");
        $resp = $c->execute($req, $this->SessionKey);
        $resp = object_array($resp);
        if(isset($resp[0]) && empty($resp[0])){
            $data = array('state' => false, 'msg' => '操作成功！', 'priceinfo' =>'');
        }else{
            if (isset($resp['code']) && isset($resp['sub_msg'])) {   //获取错误，停止获取
                $data = array('state' => false, 'msg' => $resp['sub_msg']);
            } elseif (isset($resp['promotions']) && isset($resp['promotions']['promotion_in_item']['promotion_in_item'])) {
                $res = $resp['promotions']['promotion_in_item']['promotion_in_item'];
                $priceinfo = array();
                if(isset($res['sku_id_list']['string']) && !empty($res['sku_id_list']['string']) && isset($res['sku_price_list']['price']) && !empty($res['sku_price_list']['price'])) {
                    if(is_array($res['sku_id_list']['string']) && is_array($res['sku_price_list']['price'])){
                        foreach ($res['sku_id_list']['string'] as $key=>$val){
                            $priceinfo[$key]['sku_id'] = $val;
                            $priceinfo[$key]['price'] = $res['sku_price_list']['price'][$key];
                        }
                        unset($res['sku_id_list']); unset($res['sku_price_list']);
                        $res['priceinfo'] = $priceinfo;
                    }else{
                        $res['priceinfo'][] = array("sku_id"=>$res['sku_id_list']['string'],"price"=>$res['sku_price_list']['price']);
                    }
                    $data = array('state' => true, 'msg' => '操作成功！', 'priceinfo' =>$res);
                }else{
                    $data = array('state' => false, 'msg' => '操作成功！', 'priceinfo' =>'');
                }
            }
        }
        
        return $data;
    }
    
    
    
    
    /**
     * 获取淘宝店铺店铺一个商品的详细信息
     * @param number $uec_goods_iiud   链接ID
     * @return array
     */
    public function get_goods_by_num_iid($uec_goods_iiud) {
        if (empty($uec_goods_iiud)) {
            return false;
        }
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new ItemSellerGetRequest;
        $req->setFields("item_img,list_time,wap_detail_url,wap_desc,approve_status,num_iid,title,nick,item_weight,type,cid,input_pids,input_str,desc,pic_url,prop_img,num,props,valid_thru,list_time,price,has_discount,has_invoice,has_warranty,has_showcase,modified,delist_time,postage_id,seller_cids,outer_id,sku");
        $req->setNumIid($uec_goods_iiud);
        $resp = $c->execute($req, $this->SessionKey);
        $info = (array) $resp;
        if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $info['sub_msg']);
        } elseif (isset($info['item'])) {
            $data = array('state' => true, 'msg' => '操作成功！', 'goods_info' =>object_array($info['item']));
        }
        return $data;
    }

    
    
    /**
     * 获取淘宝店铺店铺一个商品的销量
     * @param number $uec_goods_iiud   链接ID
     * @return array
     */
    public function get_salenum_by_num_iid($uec_goods_iiud) {
        if (empty($uec_goods_iiud)) {
            return false;
        }
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new ItemSellerGetRequest;
        $req->setFields("detail_url, sold_quantity");
        $req->setNumIid($uec_goods_iiud);
        $resp = $c->execute($req, $this->SessionKey);
        $info = object_array($resp);
        if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $info['sub_msg']);
        } elseif (isset($info['item'])) {
            $data = array('state' => true, 'msg' => '操作成功！', 'goods_info' =>$info['item']);
        }
        return $data;
    }
    
    
    
    /* 通过商品id取得短链
     $item_id      String  13241324 	     商品ID 
     */
    public function get_taobao_share_shorturl($item_id){
         if (!$item_id) {
            return array('state' => false, 'msg' => '参数错误！');
        }
  
        $wireless = array();
        $data = array('state' => false, 'msg' => '系统错误！');
    
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new WirelessBuntingItemShorturlCreateRequest;
        $req->setItemId("$item_id");
        $resp = $c->execute($req);
        $resp = object_array($resp);
        if (isset($resp['code']) && isset($resp['sub_msg'])) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $resp['sub_msg']);
        } else{
            $data = array('state' => true, 'msg' => '操作成功！', 'shorturl' => $resp['shorturl'] );
        }
        return $data; 
    }
    
    
    /*社会化分销淘口令获取接口 
     *  user_nick	String	必须	tbtest101		分享者的淘宝用户昵称
        ds_code  	Number	必须	1		                       淘宝官方分配给分销者的分销ID
        key_id	    Number	必须	1234		            如果type为item则为分享的淘宝商品id；如果type为shop，则为分享的店铺的id
        title	    String	必须	年货抢购商品		淘口令内容中需要带到的文案，比如商品的标题，店铺的名称。也是[口令提示文案]中的内容
        type	    String	必须	item		    item表示分享的是商品，shop表示分享的是店铺*/
    public function get_taobao_ocorder_taopwd($data){
        if(!($data['user_nick'] && $data['ds_code'] && $data['key_id'] && $data['title'] && $data['type'])){
            return array('state' => false, 'msg' => '参数错误！');
        }
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new OcOrderTaopwdGetRequest;
        $req->setUserNick("{$data['user_nick']}");
        $req->setDsCode("{$data['ds_code']}");
        $req->setKeyId("{$data['key_id']}");
        $req->setTitle("{$data['title']}");
        $req->setType("{$data['type']}");
        if(isset($data['ext'])){
            $req->setExt("{$data['ext']}");
        }
        $resp = $c->execute($req, $this->SessionKey);
        $resp = object_array($resp);
        if (isset($resp['code']) && isset($resp['sub_msg'])) {   //获取错误，停止获取
             $data = array('state' => false, 'msg' => $resp['sub_msg']);
        } else{
             $data = array('state' => true, 'msg' => '操作成功！', 'shorturl' => $resp['shorturl'] );
        }
        return $data;
    }
    
    
    
    
    
    /**
     * 搜索评价信息
     * @param number $num_iid  商品的数字ID 
     * @param number $page_no   开始页
     * @param number $page_size 页数
     * @param bool   $flag  成功后是否去获取仓库中（未上架）的商品，默认true
     * @return type
     */
    
    public function get_taobao_traderates($num_iid,$page_no = 1, $page_size = 150,$startDate='') {
        $traderates = array();
        if(empty($num_iid)){
            return array('state' => false, 'msg' => '参数错误！');
        }
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new TraderatesGetRequest;
        $req->setFields("tid,oid,nick,result,created,item_title,item_price,content,reply,num_iid");
        $req->setRateType("get");
        $req->setRole("buyer");//当 get buyer 以卖家身份得到买家给的评价。 
        $req->setPageNo("$page_no");
        $req->setPageSize("$page_size");
        if($startDate){
            $req->setStartDate("$startDate");
        }
        $req->setUseHasNext("false");
        $req->setNumIid("$num_iid");
        $resp = $c->execute($req, $this->SessionKey);
        $resp = object_array($resp);
        if (isset($resp['code']) && isset($resp['sub_msg'])) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $resp['sub_msg']);
        } else{
            if($resp['total_results']==0){
                $traderates['total'] = 0;$traderates['trade_rate'] = array();
            }else{
                $traderates['total'] = $resp['total_results'];$traderates['trade_rate'] = $resp['trade_rates']['trade_rate'];
            }
            if(!empty($traderates['trade_rate']) && !isset($traderates['trade_rate'][0])){
                $new_traderates['trade_rate'] = $traderates['trade_rate'];
                $traderates['trade_rate']=array();
                $traderates['trade_rate'][0]=$new_traderates['trade_rate'];
            }
            $data = array('state' => true, 'msg' => '操作成功！', 'traderates' => $traderates);
        }
        return $data;
    }
    
    
    
    /**
     * 获取淘宝指定店铺的生成订单
     * @param date   $stime     开始时间(倒叙)
     * @param date   $etime     结束时间
     * @param number $page_no   开始页
     * @param number $page_size 页数
     * @return type
     */
    public function get_create_orders($stime, $etime, $page_no = 1, $page_size = 50) {
    	$orders = array();
    	$data = array('state' => false, 'msg' => '系统错误！');
    	$sttime = $stime;   //开始时间
    	$ettime = $etime;  //结束时间
    	if ($etime - $stime > 86400) {
    		$sttime = $etime - 86400;   //结束时间一天前的时间
    	}
    	$c = new TopClient;
    	$c->appkey = $this->AppKey;
    	$c->secretKey = $this->AppSecret;
    	$req = new TradesSoldGetRequest;
    	$req->setFields("seller_nick,buyer_nick,title,type,trade_from,created,sid,tid");
    	while ($sttime >= $stime) {  // 判断是否已经循环到开始时间
    		$start = date("Y-m-d H:i:s", $sttime);
    		$end = date("Y-m-d H:i:s", $ettime);
    		$sttime -= 86400;
    		$ettime -= 86400;
    		//print_r($stime);print_r($etime);print_r($start);print_r($end);die;
    		$req->setStartCreated("{$start}");
    		$req->setEndCreated("{$end}");
    		$req->setPageSize("$page_size");
    		$req->setUseHasNext("true");
    		while (true) {
    			$req->setPageNo("{$page_no}");
    			$resp = $c->execute($req, $this->SessionKey);
    			$info = $resp;
    			//print_r($resp);exit;
    			if (isset($info->code) && isset($info->sub_msg)) {   //获取错误，停止获取
    				if(is_object($info->sub_msg)){
    					$data['msg'] = current((array)$info->sub_msg);
    				}else{
    					$data['msg'] = $info->sub_msg;
    				}
    				$data['state'] = false;
    				break;
    			} elseif (isset($info->trades)) {                        //输出返回结果，可根据自己需要做其他操作
    				$param = $info->trades;
    				foreach ($param->trade as $k => $v) {
    					$v = (array) $v;
    					$tid = $v['tid'];
    					$order_info = $this->get_orders_by_tid($tid);   //获取订单详细信息
    					if ($order_info['state'] && isset($order_info['order_info'])) {
    						$orders[] = $order_info['order_info'];
    					} else {
    						$data = $order_info;
    						break;
    					}
    				}
    			} else {
    				$data = array('state' => true, 'msg' => '没有更多的订单！');
    			}
    			if ($info['has_next']) {   //继续查询下一页
    				$page_no++;
    			} else {
    				$data = array('state' => true, 'msg' => '全部成功！');
    				break;
    			}
    		}
    	}
    	 //print_r($orders);exit;
    	$total = count($orders);
    	$data['msg'] = isset($data['msg'])?$data['msg']:'';
    	if ($data['state'] && $total >= 1) {
    		return array('state' => $data['state'], 'orders' => $orders, 'total' => $total,'msg'=>$data['msg']);
    	} else {
    		return $data;
    	}
    }
    /**
     * 获取淘宝一个订单的详细信息
     * @param number tid   订单号
     * @return array
     */
    public function get_orders_by_tid($tid) {
        $data = array('state' => false, 'msg' => '系统错误');
        if (empty($tid)) {
            return $data;
        }
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new TradeFullinfoGetRequest;
        $req->setFields("seller_nick,buyer_nick,title,type,trade_from,created,sid,tid,seller_rate,buyer_rate,status,payment,discount_fee,adjust_fee,post_fee,total_fee,
        		pay_time,end_time,modified,has_buyer_message,buyer_message,buyer_memo,seller_flag,consign_time,buyer_obtain_point_fee,point_fee,real_point_fee,
        		received_payment,buyer_flag,commission_fee,pic_path,num_iid,num_iid,num,price,cod_fee,cod_status,invoice_kind,invoice_name,invoice_type,shipping_type,
        		receiver_name,receiver_state,receiver_city,receiver_district,receiver_address,receiver_zip,receiver_mobile,receiver_phone,orders.title,orders.pic_path,
        		buyer_cod_fee,orders.price,orders.num,orders.iid,orders.num_iid,orders.sku_id,orders.refund_status,orders.status,orders.oid,orders.total_fee,orders.payment,
        		orders.discount_fee,orders.adjust_fee,orders.sku_properties_name,orders.item_meal_name,orders.buyer_rate,orders.seller_rate,orders.outer_iid,orders.outer_sku_id,
        		orders.refund_id,orders.seller_type,orders.snapshot_url,orders.snapshot,orders.logistics_company,orders.invoice_no,orders.sku_properties_name");
        $req->setTid($tid);
        $resp = $c->execute($req, $this->SessionKey);
       //print_r($resp);exit;
        if (isset($resp->code) && isset($resp->sub_msg)) {
            $data = array('state' => false, 'msg' => $resp->sub_msg);
        } elseif (isset($resp->trade)) {
            $orders = (array) ($resp->trade);
            $data = array('state' => true, 'msg' => '', 'order_info' => $orders);
            /* foreach ($arr['order'] as $kk=>$vv){  //获取子订单
              //if($vv['status'] == 'TRADE_FINISHED'){     //已完成的订单
              $order_info = (array)$vv;
              $order_info['buyer_nick'] = isset($order_info['buyer_nick']) ? $order_info['buyer_nick'] : $v->buyer_nick;
              $order_info['type'] = isset($order_info['type']) ? $order_info['type'] : $v->type;
              $orders[] = $order_info;
              // }
              } */
        }
        return $data;
    }

    /**
     * 修改订单商家备注
     * @param string $order_id     订单号
     * @param string $remark       商家备注
     * @param number $flag         颜色标志，0:灰色 1:红色 2:黄色 3:绿色 4:蓝色 5:紫色。
     * @return type
     */
    public function remark_update($order_id, $remark, $flag = 0) {
        $c = new TopClient();
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new TradeMemoUpdateRequest;
        $req->setTid($order_id);
        $req->setMemo("$remark");
        $req->setFlag($flag);
        $req->setReset("false");
        $resp = $c->execute($req, $this->SessionKey);
        //print_r($resp);print_r($order_id);print_r($remark);print_r($flag);exit;
        if (isset($resp->code)) {
            $data = array('state' => false, 'msg' => $resp->sub_msg.$resp->msg);
        } elseif (isset($resp->trade)) {
            $data = array('state' => true, 'msg' => '');
        }
        return $data;
    }

    /**
     * 为已授权的用户开通消息服务
     * @param  string $topics     短信的主题
     * @return bool
     */
    public function open_tb_msg($topics = '') {
        $c = new TopClient();
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new TmcUserPermitRequest;
        if (!empty($topics)) {
            $req->setTopics($topics);
        }
        $resp = $c->execute($req, $this->SessionKey);
//         var_dump($resp);exit;
        if (isset($resp->code)) {
            $data = array('state' => false, 'msg' => $resp->sub_msg);
        } elseif (isset($resp->is_success)) {
            $data = array('state' => true, 'msg' => '');
        }
        return $data;
    }

    /**
     * 为已授权的用户取消消息服务
     * @param  string $Nick    用户昵称
     * @return bool
     */
    public function close_tb_msg($Nick) {
        if (empty($Nick)) {
            $data = array('state' => false, 'msg' => '');
        }
        $c = new TopClient();
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new TmcUserCancelRequest;
        $req->setNick($Nick);
        $resp = $c->execute($req);
//                 var_dump($resp);exit;
        if (isset($resp->code)) {
            $data = array('state' => false, 'msg' => $resp->sub_msg);
        } elseif (isset($resp->is_success)) {
            $data = array('state' => true, 'msg' => '');
        }
        return $data;
    }

    /**
     * 消费淘宝主动消息
     * @param  number $group_name    用户分组名称
     * @param  number $quantity      每次批量消费消息的条数 (默认100)
     * @return array
     */
    public function get_tb_msg($quantity = 10, $group_name = '') {

        $c = new TopClient();
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new TmcMessagesConsumeRequest;
        if (!empty($group_name)) {
            $req->setGroupName("vip_user");
        }
        $req->setQuantity("{$quantity}");
        $resp = $c->execute($req);
        //var_dump($resp);exit;
        $info = json_decode($resp, true);
//         var_dump($info);
        if (isset($info['tmc_messages_consume_response'])) {
            return $info['tmc_messages_consume_response'];
        } else {
            return false;
        }
    }

    /**
     * 确认淘宝主动消息
     * @param  number $s_message_ids   消息ID
     * @param  number $group_name      用户分组名称
     * @return array
     */
    public function confirm_tb_msg($s_message_ids, $group_name = '') {
        if (empty($s_message_ids)) {
            return false;
        }
        $c = new TopClient();
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new TmcMessagesConfirmRequest;
        $req->setSMessageIds("{$s_message_ids}");
        if (!empty($group_name)) {
            $req->setGroupName("vip_user");
        }
        $resp = $c->execute($req);
//        var_dump($resp);exit;s
        $info = json_decode($resp, true);
        if (isset($info['is_success'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 为不需要填写物流信息的订单发货
     * @param  number $tid   订单号
     * @return array
     */
    public function ship_no_logistics($tid) {
        if (empty($tid)) {
            return array('state' => false, 'msg' => '参数错误！');
        }
        $c = new TopClient;
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new LogisticsDummySendRequest;
        $req->setTid("{$tid}");
        $resp = $c->execute($req, $this->SessionKey);
        $info = json_decode($resp, true);
//         var_dump($info);exit;
        if (isset($info['is_success'])) {
            $data = array('state' => true, 'msg' => '发货成功');
        } else {
            $data = array('state' => false, 'msg' => isset($info['sub_msg']) ? $info['sub_msg'] : '发货失败');
        }
        return $data;
    }

    /**
     * 获取当前商家快递
     * @return
     */
    public function get_store_express() {
    	$data = array('state'=>false,'msg'=>'数据错误');
        $c = new TopClient();
        $c->appkey = $this->AppKey;
        $c->secretKey = $this->AppSecret;
        $req = new LogisticsCompaniesGetRequest;
        $req->setFields("id,code,name,reg_mail_no");
        $req->setIsRecommended("true");
        $req->setOrderMode("offline");
        $resp = $c->execute($req);
        if (isset($resp->code)) {
            $data = array('state' => false, 'msg' => $resp->sub_msg);
        } elseif (isset($resp->logistics_companies)) {
            $info = $resp->logistics_companies;
            $data = array('state' => true, 'msg' => '','info'=>$info);
        }
/*         print_r($req);print_r($this->AppKey.'aaa');print_r($this->AppSecret);
        print_r($resp);exit; */
        //print_r($data);exit;
        return $data;
    }

    /**
     * 为需要填写物流信息的订单发货
     * @param  number $tid              订单号
     * @param  string $express_name     快递名称
     * @param  string $express_sn       运单号
     * @param  string $express_code     本系统的快递编码（默认为空）
     * @param  string $sub_tid         需要拆单发货的子订单集合
     * @return array
     */
    public function ship_logistics($tid, $express_name, $express_sn,$express_code = '',$sub_tid=false) {
//        $express_name = '申通';    //测试使用
        if (empty($tid)) {
            return array('state' => false, 'msg' => '参数错误！');
        }
        $data = array('state' => false, 'msg' => '系统错误！');
        $experss = $this->get_store_express();//print_r($experss);exit;
        if ($experss['state']) {
          $company_code = $express_code;
          if(!empty($experss['info'])){
              $expersses = (array)$experss['info'];
              $match_arr = [];
              foreach ($expersses['logistics_company'] as $k => $v) {
                  if (strpos($v->name,$express_name) !== false) {
                    if($v->name == $express_name){
                      $company_code =(array) $v->code;
                      break;
                    }
                      $match_arr[] =(array) $v->code;
                  }
                  if (strpos($express_name, $v->name) !== false) {
                      if($v->name == $express_name){
                        $company_code = (array)$v->code;
                        break;
                      }
                      $match_arr[] = (array)$v->code;
                  }
                  if($k==count($expersses['logistics_company'])-1 && !empty($match_arr)){
                      //var_dump($match_arr);
                      $company_code = $match_arr[0];
                  }
              }
            }
            //print_r($company_code);exit;
            if($company_code){
                if(is_array($company_code)){
                    $company_code = current($company_code);
                }
//                var_dump($company_code);
//                $tid = '2654338397940441';  //测试使用
//                $this->SessionKey = '6202413f7cd793acd7b45ZZbd7da7bdec36486c49306f41730208880';  //测试使用
//                $express_sn = '221142338538';//测试使用
                //print_r($company_code);exit;
                $c = new TopClient;
                $c->appkey = $this->AppKey;
                $c->secretKey = $this->AppSecret;
                $req = new LogisticsOnlineSendRequest;
                if($sub_tid && !empty($sub_tid)){
                    $req->setSubTid("{$sub_tid}");
                    $req->setIsSplit("1");
                }
                $req->setTid("{$tid}");
                $req->setOutSid("{$express_sn}");
                $req->setCompanyCode("{$company_code}");
                $resp = $c->execute($req, $this->SessionKey);
                //print_r($resp);exit;
                if (isset($resp->code)) {
                    $resp = (array)$resp;
                    $msg = isset($resp['sub_msg']) ? $resp['sub_msg'] : '发货失败';
                    $data = array('state' => false, 'msg' => $msg);
                } else {
                    $data = array('state' => true, 'msg' => '发货成功');
                }
            }
        }else{
            $data = array('state' => false, 'msg' => '查询淘宝快递信息错误！');
        }
        //print_r($data);exit;
        return $data;
    }
   /*
    * 获取淘宝类目
    * $parent_id ID 父类目ID
    * $cid string 类目ID，多个用,隔开
    * */
    public function get_cate($parent_id=0){
    	$data = array('state'=>false,'msg'=>'数据错误');
    	$c = new TopClient;
    	$c->appkey = $this->AppKey;
    	$c->secretKey = $this->AppSecret;
    	$req = new ItemcatsGetRequest;
    	$req->setParentCid("{$parent_id}");
    	
		$req->setFields("cid,parent_cid,name,is_parent,status,sort_order");
		
		$resp = $c->execute($req);
		if (isset($resp->code)) {
			$data = array('state' => false, 'msg' => $resp->sub_msg);
		} elseif (isset($resp->item_cats)) {
			$cate = $resp->item_cats;
			$info = array();
			foreach ($cate->item_cat as $k=>$v){
				$info[] = object_array($v);
				
			}
			$data = array('state' => true, 'msg' => '','info'=>$info);
		}
		return $data;
    }
    /*
     * 获取淘宝指定类目
     * $cid string 类目ID，多个用,隔开
     * */
    public function get_a_cate($cid=''){
    	$data = array('state'=>false,'msg'=>'数据错误');
    	$c = new TopClient;
    	$c->appkey = $this->AppKey;
    	$c->secretKey = $this->AppSecret;
    	$req = new ItemcatsGetRequest;
    	$req->setCids("{$cid}");
    	$req->setFields("cid,parent_cid,name,is_parent,status,sort_order");
    	$resp = $c->execute($req);
    	if (isset($resp->code)) {
    		$data = array('state' => false, 'msg' => $resp->sub_msg);
    	} elseif (isset($resp->item_cats)) {
    		$cate = $resp->item_cats;
    		$info = array();
    		foreach ($cate->item_cat as $k=>$v){
    			$info[] = object_array($v);
    
    		}
    		$data = array('state' => true, 'msg' => '','info'=>$info);
    	}
    	return $data;
    }
    
    /*
     * 获取所有的菜鸟标准电子面单模板
     */
    public  function getCainiaoCloudprintStdtemplates(){
        $result = array('state'=>false,'msg'=>'获取菜鸟标准电子面单模板失败','data'=>'');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
    	$c->secretKey = $this->AppSecret;
        $req = new CainiaoCloudprintStdtemplatesGetRequest;
        $resp = $c->execute($req,$this->SessionKey);
        $info = object_array($resp);
        if(isset($info['code'])){
            $result['msg'] = "code:".$info['code']." msg:".$info['msg'];
            return  $result;
        }else{
            if(isset($info['result']) && !empty($info['result'])){
                if($info['result']['error_code']==0 && $info['result']['success']){
                    if(!empty($info['result']['datas']) && isset($info['result']['datas']['standard_template_result']) && !empty($info['result']['datas']['standard_template_result'])){
                        $infos = $info['result']['datas']['standard_template_result'];
                        if(!empty($infos)){
                            $result['state'] = true;
                            $result['msg'] ='获取菜鸟标准电子面单模板成功';
                            $result['data'] =$infos;
                        }
                    }
                }
            }
        }
        return  $result;
    }
    
    

    /*
     * 查询面单服务订购及面单使用情况
     * $cp_code string   物流公司code 
     */
    public  function searchCainiaoWaybill($cp_code){
        $result = array('state'=>false,'msg'=>'查询面单服务订购失败','data'=>'');
        $c = new TopClient;
        $c->appkey = $this->AppKey;
    	$c->secretKey = $this->AppSecret;
        $req = new CainiaoWaybillIiSearchRequest;
        $req->setCpCode($cp_code);
        $resp = $c->execute($req,$this->SessionKey);
        //以下为测试的假数据
/*         $resp ='{
                    "cainiao_waybill_ii_search_response":{
                        "waybill_apply_subscription_cols":{
                            "waybill_apply_subscription_info":[
                                {
                                    "branch_account_cols":{
                                        "waybill_branch_account":[
                                            {
                                                "allocated_quantity":1,
                                                "branch_code":"1232",
                                                "branch_name":"杭州网点",
                                                "branch_status":1,
                                                "cancel_quantity":23,
                                                "print_quantity":12,
                                                "quantity":32,
                                                "shipp_address_cols":{
                                                    "address_dto":[
                                                        {
                                                            "detail":"文一西路",
                                                            "district":"余杭区",
                                                            "city":"杭州市",
                                                            "province":"浙江省",
                                                            "town":"仓前街道"
                                                        }
                                                    ]
                                                },
                                                "service_info_cols":{
                                                    "service_info_dto":[
                                                        {
                                                            "service_name":"代收货款",
                                                            "service_code":"SVC-COD"
                                                        }
                                                    ]
                                                }
                                            }
                                        ]
                                    },
                                    "cp_code":"ZTO",
                                    "cp_type":1
                                }
                            ]
                        }
                    }
                }'; */
        $resp = object_array($resp);
        if(isset($resp['code'])){
            $result['msg'] = "code:".$info['code']." msg:".$info['msg'];
            return  $result;
        }else{
            if(!(isset($resp['waybill_apply_subscription_cols']) && isset($resp['waybill_apply_subscription_cols']))){
                $result['msg'] = "该店铺未开通物流服务，请联系管理员";
                return  $result;
            }else{
                $infos = $resp['waybill_apply_subscription_cols'];
                if(isset($infos['waybill_apply_subscription_info']) && !empty($infos['waybill_apply_subscription_info'])){
                    $result['state'] = true;
                    $result['msg'] ='获取菜鸟标准电子面单模板成功';
                    $result['data'] =$infos['waybill_apply_subscription_info'];
                }
            }
        }
        return  $result;
    }
    
    
    
    
    /*
     * 获取菜鸟面单号
     * $store_id number 店铺id
     * $data array 面单信息
     */
    public  function getCainiaoWaybill($data){
        $result = array('state'=>false,'msg'=>'获取菜鸟面单号失败','data'=>'');
        if(empty($data)){
            $result['msg'] = "数据错误--不能为空";
            return  $result;
        }
        $waybill_apply_info = $data;
        $c = new TopClient;
        $c->appkey = $this->AppKey;
    	$c->secretKey = $this->AppSecret;
        $req = new CainiaoWaybillIiGetRequest;
        $param_waybill_cloud_print_apply_new_request = new WaybillCloudPrintApplyNewRequest;
        $param_waybill_cloud_print_apply_new_request->cp_code=$waybill_apply_info['cp_code'];//物流公司Code
        //$param_waybill_cloud_print_apply_new_request->product_code="\"\"";//目前已经不推荐使用此字段，请不要使用
        
        $sender = new UserInfoDto;
        $address = new AddressDto;
        $address->city=isset($waybill_apply_info['sender_address']['city'])?$waybill_apply_info['sender_address']['city']:'';
        $address->detail=isset($waybill_apply_info['sender_address']['detail'])?$waybill_apply_info['sender_address']['detail']:'';
        $address->district=isset($waybill_apply_info['sender_address']['district'])?$waybill_apply_info['sender_address']['district']:'';
        $address->province=isset($waybill_apply_info['sender_address']['province'])?$waybill_apply_info['sender_address']['province']:'';
        //$address->town=isset($waybill_apply_info['sender_address']['town'])?$waybill_apply_info['sender_address']['town']:'';
        $sender->address = $address;
        $sender->mobile=isset($waybill_apply_info['sender_info']['seller_name'])?$waybill_apply_info['sender_info']['seller_mobile']:'';
        $sender->name=isset($waybill_apply_info['sender_info']['seller_mobile'])?$waybill_apply_info['sender_info']['seller_name']:'';
        $sender->phone='';
        $param_waybill_cloud_print_apply_new_request->sender = $sender;
        $trade_order_info_dtos = new TradeOrderInfoDto;
        $trade_order_info_dtos->logistics_services="";//如不需要特殊服务，该值为空
        $trade_order_info_dtos->object_id=isset($waybill_apply_info['object_id'])?$waybill_apply_info['object_id']:'1314';
        $order_info = new OrderInfoDto;
        $order_info->order_channels_type=isset($waybill_apply_info['order_channels_type'])?$waybill_apply_info['order_channels_type']:'TB';
        $order_info->trade_order_list=isset($waybill_apply_info['order_sn'])?$waybill_apply_info['order_sn']:"";
        $trade_order_info_dtos->order_info = $order_info;
        $package_info = new PackageInfoDto;
        $package_info->id="";//可选包裹id,拆合单使用，使用方式 注：该字段必须大小写不可重复，例如：123-A,123-a 不可当做不同ID，否则存在一定可能取号失败
        $items = new Item;
        $items->count=isset($waybill_apply_info['items']['count'])?$waybill_apply_info['items']['count']:"";
        $items->name=isset($waybill_apply_info['items']['name'])?$waybill_apply_info['items']['name']:"";
        $package_info->items = $items;
        //$package_info->volume="";//可选
        //$package_info->weight="";//可选
        $trade_order_info_dtos->package_info = $package_info;
        $recipient = new UserInfoDto;
        $address = new AddressDto;
        $address->city=isset($waybill_apply_info['recipient']['city'])?$waybill_apply_info['recipient']['city']:'';//可选
        $address->detail=isset($waybill_apply_info['recipient']['detail'])?$waybill_apply_info['recipient']['detail']:'';
        $address->district=isset($waybill_apply_info['recipient']['district'])?$waybill_apply_info['recipient']['district']:'';//可选
        $address->province=isset($waybill_apply_info['recipient']['province'])?$waybill_apply_info['recipient']['province']:'';
        //$address->town=isset($waybill_apply_info['recipient']['town'])?$waybill_apply_info['recipient']['town']:'';//可选
        $recipient->address = $address;
        $recipient->mobile=isset($waybill_apply_info['recipient']['mobile'])?$waybill_apply_info['recipient']['mobile']:'';
        $recipient->name=isset($waybill_apply_info['recipient']['name'])?$waybill_apply_info['recipient']['name']:'';
        //$recipient->phone="";//固定电话
        $trade_order_info_dtos->recipient = $recipient;
        $trade_order_info_dtos->template_url=isset($waybill_apply_info['template_ur'])?$waybill_apply_info['template_ur']:'';
        $trade_order_info_dtos->user_id="61706197";
        $param_waybill_cloud_print_apply_new_request->trade_order_info_dtos = $trade_order_info_dtos;
        //$param_waybill_cloud_print_apply_new_request->store_code="";//仓code， 仓库WMS系统对接落地配业务，其它场景请不要使用
        //$param_waybill_cloud_print_apply_new_request->resource_code="";//配送资源code， 仓库WMS系统对接落地配业务，其它场景请不要使用
        $param_waybill_cloud_print_apply_new_request->dms_sorting="false";//是否使用智分宝预分拣， 仓库WMS系统对接落地配业务，其它场景请不要使用
        $req->setParamWaybillCloudPrintApplyNewRequest(json_encode($param_waybill_cloud_print_apply_new_request));
        $resp = $c->execute($req, $this->SessionKey);
        $resp= object_array($resp);
/*         $resp=Array
(
    'modules' => Array
        (
            'waybill_cloud_print_response' => Array
                (
                    'object_id' => AqGK
                    'print_data' => {"data":{"cpCode":"STO","needEncrypt":false,"parent":false,"recipient":{"address":{"city":"金华市","detail":"浙江省 金华市 婺城区 永康街697号东侧二楼","district":"婺城区","province":"浙江省"},"mobile":"13888888888","name":"张XX"},"routingInfo":{"consolidation":{"name":"金华包"},"origin":{"code":"610026","name":"四川成都高笋塘营业部"},"routeCode":"002 207","sortation":{"name":"金华362"}},"sender":{"address":{"city":"成都市","detail":"火车北站东二路物流部","district":"金牛区","province":"四川省"},"mobile":"18108129761","name":"lnshop数据抽取仓","phone":""},"shippingOption":{"code":"STANDARD_EXPRESS","title":"标准快递"},"waybillCode":"3336289148145"},"signature":"MD:Z8ZIyAQGEddje8GVZtaLKQ==","templateURL":"http://cloudprint.cainiao.com/template/standard/201"}
                    'waybill_code' => 3336289148145
                )

        )

    [request_id] => 3dp2ikkvjugp
); */
        if(isset($resp['code'])){
            $result['msg'] = "code:".$resp['code']."; msg:".$resp['msg']."; sub_code:".$resp['sub_code']."; sub_msg:".$resp['sub_msg'];
            return  $result;
        }else{
            if(!(isset($resp['modules']['waybill_cloud_print_response']) && !empty($resp['modules']['waybill_cloud_print_response']))){
                return  $result;
            }else{
                $infos = $resp['modules']['waybill_cloud_print_response'];
                $infos['print_data'] = json_decode($infos['print_data'],true);
                 $result['state'] = true;
                 $result['msg'] ='获取菜鸟面单号成功';
                 $result['data'] = $infos;
            }
        }
        return  $result;
    }
   /*密文解mi*/
    public function secret($string,$type='simple'){
    	$c = new TopClient;
    	$c->gatewayUrl = 'https://eco.taobao.com/router/rest';
    	$c->appkey = $this->AppKey;
    	$c->secretKey = $this->AppSecret;
    	$req = new SecurityClient($c, 'pKDMdo7bseYUd6YKpdnind8t1ikCqYj71yUqQq+zSv8=');
        //print_r($string);die;
    	$resp = $req->decrypt($string,$type, $this->SessionKey);
    	return $resp;
    } 
    
   /**
     * 更新淘宝商品信息
     * @param $res需要更新的商品信息(一个或者多个)
     */
    // public function stock_update_goods_infor($res) {
    //     if (count($res)<1 || !is_array($res)) {
    //         return false;
    //     }

    //     $data = array('state' => false, 'msg' => '系统错误');
    //     $c = new TopClient;
    //     $c->appkey = $this->AppKey;
    //     $c->secretKey = $this->AppSecret;
    //     $req = new ItemUpdateRequest;
    //     $total = 0 ;
    //     $req->setNumIid("3838293428");//商品uid
    //     $req->setBarcode("6903244981002");//商品
    //     $req->setPrice("200.07");//价格
    //     $req->setOuterId("12345");//商家编码

    //     $resp = $c->execute($req, $this->SessionKey);
    //         $info = (array) $resp;
    //         if (isset($info['code']) && isset($info['sub_msg'])) {   //获取错误，停止获取
    //             $data = array('state' => false, 'msg' => $info['sub_msg']);
    //             break;
    //         } elseif (isset($info['item'])) {
    //             $total ++;
    //             $data = array('state' => true, 'msg' => '操作成功!', 'total'=> $total);
    //         }
    //     }
    //     return $data;
    // }

}
?>
