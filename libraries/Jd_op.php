<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jd_op
 *
 * @author yhx
 */
class Jd_op {

    //put your code here
    protected $appkey = '';
    protected $appsecret = '';
    protected $accesstoken = '';

    public function __construct() {
        include ROOTPATH . 'libraries/jos-php-open-api-sdk-2.0/jos-php-open-api-sdk-2.0/JdSdk.php';
    }

    /**
     * 初始化平台appkey appsecret 和商家accesstoken
     * @param string $appkey
     * @param string $appsecret
     * @param string $accesstoken
     */
    public function foo($appkey, $appsecret, $accesstoken) {
        $this->appkey = $appkey;
        $this->appsecret = $appsecret;
        $this->accesstoken = $accesstoken;
        // var_Dump(__DIR__);exit;
    }

    /**
     * 获取商家某时间段（时差最大1个月）内的全部订单
     * @param string $stime         开始时间    如：2016-11-15 14:24:12
     * @param string $etime         结束时间    如：2016-12-15 14:24:12
     * @param number $page          开始页码
     * @param number $rp            每页显示条数（最大100）
     * @return obj
     */
    public function get_all_order($stime, $etime, $page = 1, $rp = 100) {
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new OrderSearchRequest();
        $req->setStartDate($stime);
        $req->setEndDate($etime);
        //多订单状态可以用英文逗号隔开 1）WAIT_SELLER_STOCK_OUT 等待出库 2）SEND_TO_DISTRIBUTION_CENER 发往配送中心（只适用于LBP，SOPL商家） 3）DISTRIBUTION_CENTER_RECEIVED 配送中心已收货（只适用于LBP，SOPL商家） 4）WAIT_GOODS_RECEIVE_CONFIRM 等待确认收货 5）RECEIPTS_CONFIRM 收款确认（服务完成）（只适用于LBP，SOPL商家） 6）WAIT_SELLER_DELIVERY等待发货（只适用于海外购商家，等待境内发货 标签下的订单） 7）FINISHED_L 完成 8）TRADE_CANCELED 取消 9）LOCKED 已锁定
        $req->setOrderState("WAIT_SELLER_STOCK_OUT,WAIT_GOODS_RECEIVE_CONFIRM,FINISHED_L,TRADE_CANCELED");
        $req->setPage($page);       //查询的页数
        $req->setPageSize($rp);     //	每页的条数（最大page_size 100条）
        $req->setOptionalFields("order_id,order_source,customs,customs_model,vender_id,pay_type,order_total_price,order_seller_price,order_payment,freight_price,seller_discount,order_state,order_state_remark,delivery_type,invoice_info,order_remark,order_start_time,order_end_time,modified,consignee_info,item_info_list,coupon_detail_list,vender_remark,balance_used,payment_confirm_time,waybill,logistics_id,vat_invoice_info,parent_order_id,pin,return_order,order_type,store_order");   //需返回的字段列表。可选值：orderInfo结构体中的所有字段；字段之间用,分隔
//        $req->setSortType( "" );   //排序方式，默认升序,1是降序,其它数字都是升序
//        $req->setDateType( "" );   //查询时间类型，默认按修改时间查询。 1为按订单创建时间查询；其它数字为按订单（订单状态、修改运单号）修改时间
        $resp = $c->execute($req, $c->accessToken);
        return $resp;
    }

    /**
     * 获取商家某时间段（时差最大1个月）内的全部订单
     * @param string $stime         开始时间    如：2016-11-15 14:24:12
     * @param string $etime         结束时间    如：2016-12-15 14:24:12
     * @param number $page          开始页码
     * @param number $rp            每页显示条数（最大100）
     * @return obj
     */
    public function get_orders($stime, $etime, $dateType = null) {
        $data = array('state' => false, 'msg' => '系统错误！');
        $page = 1;
        $size = 100;
        $orderAll = [];
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new OrderSearchRequest();
        $req->setStartDate($stime);
        $req->setEndDate($etime);
        //多订单状态可以用英文逗号隔开 1）WAIT_SELLER_STOCK_OUT 等待出库 2）SEND_TO_DISTRIBUTION_CENER 发往配送中心（只适用于LBP，SOPL商家） 3）DISTRIBUTION_CENTER_RECEIVED 配送中心已收货（只适用于LBP，SOPL商家） 4）WAIT_GOODS_RECEIVE_CONFIRM 等待确认收货 5）RECEIPTS_CONFIRM 收款确认（服务完成）（只适用于LBP，SOPL商家） 6）WAIT_SELLER_DELIVERY等待发货（只适用于海外购商家，等待境内发货 标签下的订单） 7）FINISHED_L 完成 8）TRADE_CANCELED 取消 9）LOCKED 已锁定
        $req->setOrderState("WAIT_SELLER_STOCK_OUT,WAIT_GOODS_RECEIVE_CONFIRM,FINISHED_L,TRADE_CANCELED");
        $req->setPageSize($size);     //	每页的条数（最大page_size 100条）
        $req->setOptionalFields("order_id,order_source,customs,customs_model,vender_id,pay_type,order_total_price,order_seller_price,order_payment,freight_price,seller_discount,order_state,order_state_remark,delivery_type,invoice_info,order_remark,order_start_time,order_end_time,modified,consignee_info,item_info_list,coupon_detail_list,vender_remark,balance_used,payment_confirm_time,waybill,logistics_id,vat_invoice_info,parent_order_id,pin,return_order,order_type,store_order");   //需返回的字段列表。可选值：orderInfo结构体中的所有字段；字段之间用,分隔
//        $req->setSortType( "" );   //排序方式，默认升序,1是降序,其它数字都是升序
        if (!empty($dateType)) {
            # code...
            $req->setDateType($dateType);   //查询时间类型，默认按修改时间查询。 1为按订单创建时间查询；其它数字为按订单（订单状态、修改运单号）修改时间
        }

        $c_clone = clone($c);
        $req_clone = clone($req);
        $req->setPage($page);       //查询的页数
        $resp = $c->execute($req, $c->accessToken);
        //print_r($resp);die;
        if ($resp->code == 0) {
            foreach ($resp->order_search->order_info_list as $ok => $orderOne) {
                foreach ($orderOne->item_info_list as $k => $v) {
                    $goods = $this->ware_get_request($v->ware_id);
                    $orderOne->item_info_list[$k]->image = '';
                    $orderOne->item_info_list[$k]->color_value = '';
                    if ($goods->code == 0) {
                        $orderOne->item_info_list[$k]->image = $goods->ware->logo;
                        foreach ($goods->ware->skus as $sku) {
                            if ($sku->sku_id == $orderOne->item_info_list[$k]->sku_id) {
                                $orderOne->item_info_list[$k]->outer_sku_id = $sku->outer_id;
                                $orderOne->item_info_list[$k]->color_value = $sku->color_value;
                            }
                        }
                    }
                }
                $orderAll[] = $orderOne;
                unset($resp->order_search->order_info_list[$ok]);
            }
            if ($resp->order_search->order_total > $size) {
                $pages = ceil($resp->order_search->order_total / $size);
                for ($j = 2; $j <= $pages; $j++) {
                    $c = $c_clone;
                    $req = $req_clone;
                    $req->setPage($j);       //查询的页数
                    $resp = $c->execute($req, $c->accessToken);
                    if ($resp->code == 0) {
                        foreach ($resp->order_search->order_info_list as $ok => $orderOne) {
                            foreach ($orderOne->item_info_list as $k => $v) {
                                $goods = $this->ware_get_request($v->ware_id);
                                $orderOne->item_info_list[$k]->image = '';
                                $orderOne->item_info_list[$k]->color_value = '';
                                if ($goods->code == 0) {
                                    $orderOne->item_info_list[$k]->image = $goods->ware->logo;
                                    foreach ($goods->ware->skus as $sku) {
                                        if ($sku->sku_id == $orderOne->item_info_list[$k]->sku_id) {
                                            $orderOne->item_info_list[$k]->outer_sku_id = $sku->outer_id;
                                            $orderOne->item_info_list[$k]->color_value = $sku->color_value;
                                        }
                                    }
                                }
                            }
                            $orderAll[] = $orderOne;
                            unset($resp->order_search->order_info_list[$ok]);
                        }
                        unset($resp);
                    } else {
                        return array('state' => false, 'msg' => $resp->zh_desc);
                    }
                }
            }
            $data = array('state' => true, 'orders' => $orderAll);
//            if(!empty($orderAll)){
//                $data = array('state'=>true,'orders'=>$orderAll);
//            }else{
//                $data = array('state'=>false,'msg'=>'查询结果为空');
//            }
        } else {
            $data = array('state' => false, 'msg' => $resp->zh_desc);
        }
        return $data;
    }

    public function get_a_order($order_sn) {
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new OrderGetRequest();
        $req->setOrderId($order_sn);              //订单id
        //需返回的字段列表。可选值：orderInfo结构体中的所有字段；字段之间用','分隔
        $req->setOptionalFields("order_id,order_source,customs,customs_model,vender_id,pay_type,order_total_price,order_seller_price,order_payment,freight_price,seller_discount,order_state,order_state_remark,delivery_type,invoice_info,order_remark,order_start_time,order_end_time,modified,consignee_info,item_info_list,coupon_detail_list,vender_remark,balance_used,payment_confirm_time,waybill,logistics_id,vat_invoice_info,parent_order_id,pin,return_order,order_type,store_order");
        //$req->setOrderState( "jingdong" );           //多订单状态可以用英文逗号隔开 1）WAIT_SELLER_STOCK_OUT 等待出库 2）SEND_TO_DISTRIBUTION_CENER 发往配送中心（只适用于LBP，SOPL商家） 3）DISTRIBUTION_CENTER_RECEIVED 配送中心已收货（只适用于LBP，SOPL商家） 4）WAIT_GOODS_RECEIVE_CONFIRM 等待确认收货 5）RECEIPTS_CONFIRM 收款确认（服务完成）（只适用于LBP，SOPL商家） 6）WAIT_SELLER_DELIVERY等待发货（只适用于海外购商家，等待境内发货 标签下的订单） 7）FINISHED_L 完成 8）TRADE_CANCELED 取消 9）LOCKED 已锁定 10）PAUSE 暂停（适用于LOC订单）
        $resp = $c->execute($req, $c->accessToken);
        //var_dump($resp);exit;
        if ($resp->code) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $resp->zh_desc);
        } elseif ($resp->code == 0) {
            $order_info = $resp->order->orderInfo;
            if(!empty($order_info)){
            	foreach ($order_info->item_info_list as $k => $v) {
            		$goods = $this->ware_get_request($v->ware_id);
            		$order_info->item_info_list[$k]->image = '';
            		$order_info->item_info_list[$k]->color_value = '';
            		if ($goods->code == 0) {
            			$order_info->item_info_list[$k]->image = $goods->ware->logo;
            			foreach ($goods->ware->skus as $sku) {
            				if ($sku->sku_id == $order_info->item_info_list[$k]->sku_id) {
            					$order_info->item_info_list[$k]->outer_sku_id = $sku->outer_id;
            					$order_info->item_info_list[$k]->color_value = $sku->color_value;
            				}
            			}
            		}
            	}
            	$order[] = $order_info;
            	$data = array('state' => true, 'order_info' => $order);
            }else{
            	$data = array('state' => false, 'msg' => '此店铺无此订单');
            }
            
        }
        return $data;
    }

    /**
     * 获取当前商家快递
     * @return obj
     */
    public function get_store_express() {
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new GetVenderAllDeliveryCompanyRequest();
        $req->setFields("id,name,description");
        $resp = $c->execute($req, $c->accessToken);
        return $resp;
    }

    /**
     * 获取店铺有效的商品信息
     * @param type $page
     * @return type
     */
    public function valid_goods($modify_time='') {
    	$time = time();
    	$modify_time = empty($modify_time)?0:$modify_time;
    	if($time-$modify_time>3600*2){
    		$modify_time = $time-3600*2;
    	}
    	$date = date('Y-m-d H:i:s',$modify_time);
    	$date_ = date('Y-m-d H:i:s');
        $fields = [];
        $goodsAll = [];
        $data = array('state' => false, 'msg' => '系统错误！');
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new WareReadSearchWare4ValidRequest();
//        $req->setSearchKey( "jingdong" );                        //商品搜索关键词,需要配合搜索域实现
//        $req->setSearchField( "jingdong,yanfa,pop" );            //商品搜索域的范围,默认是商品名称.目前值范围[title]
//        $req->setCategoryId( 123 );                              //商品叶子类目
//        $req->setShopCategoryIdLevel1( 123 );                    //一级店内分类id
//        $req->setShopCategoryIdLevel2( 123 );                    //关联板式ID
//        $req->setTemplateId( 123 );                              //时效模板ID
//        $req->setPromiseId( 123 );                               //品牌ID
//        $req->setBrandId( 123 );                                 //商品的特殊属性key
//        $req->setFeatureKey( "jingdong,yanfa,pop" );             //商品的特殊属性key
//        $req->setFeatureValue( "jingdong,yanfa,pop" );           //商品的特殊属性value
//        $req->setWareStatusValue( "8" );               //商品状态,多个值属于[或]操作 1:从未上架 2:自主下架 4:系统下架 8:上架 513:从未上架待审 514:自主下架待审 516:系统下架待审 520:上架待审核 1028:系统下架审核失败
//        $req->setItemNum( "jingdong" );                          //商品货号
//        $req->setBarCode( "jingdong" );                          //商品条码
//        $req->setColType( 123 );                                 //合作类型
        //$req->setStartCreatedTime( $date );      //开始创建时间
        if($modify_time){
        	//$req->setStartCreatedTime( $date );
        	$req->setStartModifiedTime( $date );      //开始修改时间
        	
        }
        //$req->setEndCreatedTime( $date_ );        //结束创建时间
        $req->setEndModifiedTime( $date_ );        //结束修改时间
//        $req->setStartJdPrice( 123 );                            //开始京东价
//        $req->setEndJdPrice( 123 );                              //结束京东价
//        $req->setStartOnlineTime( "2012-12-12 12:12:12" );       //开始上架时间
//        $req->setEndOnlineTime( "2012-12-12 12:12:12" );         //结束上架时间
//        $req->setStartModifiedTime( "2012-12-12 12:12:12" );     //开始修改时间
//        $req->setEndModifiedTime( "2012-12-12 12:12:12" );       //结束修改时间
//        $req->setStartOfflineTime( "2012-12-12 12:12:12" );      //开始下架时间
//        $req->setEndOfflineTime( "2012-12-12 12:12:12" );        //结束下架时间
//        $req->setStartStockNum( 123 );                           //开始商品库存
//        $req->setEndStockNum( 123 );                             //结束商品库存
        $req->setOrderField("onlineTime");             //排序字段.值范围[wareId offlineTime onlineTime stockNum jdPrice modified]
        $req->setOrderType("desc");                            //排序方式.值范围[asc desc]
        $req->setField("outerId");                  //可选的返回的字段
        $req->setPageSize(100);
        $c_clone = clone($c);
        $req_clone = clone($req);
        $p = 1;
        $req->setPageNo($p);    
        $resp = $c->execute($req, $c->accessToken);
       //print_r($date);print_r($date_);print_r($resp);die;
        /*$ddd = $resp->page->data;
        foreach ($ddd as $k=>$v){
        	$ddd[$k]->created_date = date('Y-m-d H:i:s',$v->created);
        }*/
        if ($resp->code == 0) {
            $pageSize = $resp->page->pageSize;
            $total = $resp->page->totalItem;
            $page = ceil($total / $pageSize);
            foreach ($resp->page->data as $k => $v) {
            	if(!empty($v->itemNum)){
            	$fields[] = $v->wareId;
            	}
                unset($resp->page->data[$k]);
            }
            unset($resp);
            for ($i = 2; $i <= $page; $i++) {
                $c = $c_clone;
                $req = $req_clone;
                $req->setPageNo($i);
                $resp = $c->execute($req, $c->accessToken);
                if ($resp->code == 0) {
                    foreach ($resp->page->data as $k => $v) {
                    	if(!empty($v->itemNum)){
                        $fields[] = $v->wareId;
                    	}
                        unset($resp->page->data[$k]);
                    }
                    unset($resp);
                } else {
                    return array('state' => false, 'msg' => $resp->zh_desc);
                }
            }
            //print_r($fields);die;
            if (!empty($fields)) {
                foreach ($fields as $k => $v) {
                    $res = $this->ware_get_request($v);
                    if ($res->code == 0) {
                        $goodsAll[] = $res->ware;
                    } else {
                        return array('state' => false, 'msg' => $res->zh_desc);
                    }
                }
                if (empty($goodsAll)) {
                    return array('state' => false, 'msg' => '查询结果为空');
                }
                return array('state' => true, 'goods_info' => $goodsAll);
            } else {
                return array('state' => false, 'msg' => '查询结果为空');
            }
        } else {
            return array('state' => false, 'msg' => $resp->zh_desc);
        }
        return $data;
    }
    /*
    * 获取店铺有效的商品信息
    * @param type $page
    * @return type
    */
    public function valid_goods_id($modify_time='') {
    	$fields = [];
    	$goodsAll = [];
    	$data = array('state' => false, 'msg' => '系统错误！');
    	$c = new JdClient();
    	$c->appKey = $this->appkey;
    	$c->appSecret = $this->appsecret;
    	$c->accessToken = $this->accesstoken;
    	$req = new WareReadSearchWare4ValidRequest();
    	//$req->setOrderField("onlineTime");             //排序字段.值范围[wareId offlineTime onlineTime stockNum jdPrice modified]
    	//$req->setOrderType("desc");                            //排序方式.值范围[asc desc]
    	$req->setPageSize(100);
    	$req->setField("wareId");                  //可选的返回的字段
    	$c_clone = clone($c);
    	$req_clone = clone($req);
    	$p = 1;
    	$req->setPageNo($p);
    	$resp = $c->execute($req, $c->accessToken);
    	//print_r($resp);die;
    	/*$ddd = $resp->page->data;
    	 foreach ($ddd as $k=>$v){
    	 $ddd[$k]->created_date = date('Y-m-d H:i:s',$v->created);
    	 }*/
    	if ($resp->code == 0) {
    		$pageSize = $resp->page->pageSize;
    		$total = $resp->page->totalItem;
    		$page = ceil($total / $pageSize);
    		foreach ($resp->page->data as $k => $v) {
    			$fields[] = $v->wareId;
    			unset($resp->page->data[$k]);
    		}
    		unset($resp);
    		for ($i = 2; $i <= $page; $i++) {
    			$c = $c_clone;
    			$req = $req_clone;
    			$req->setPageNo($i);
    			$resp = $c->execute($req, $c->accessToken);
    			if ($resp->code == 0) {
    				foreach ($resp->page->data as $k => $v) {
    					//if(!empty($v->itemNum)){
    						$fields[] = $v->wareId;
    					//}
    					unset($resp->page->data[$k]);
    				}
    				unset($resp);
    			} else {
    				return array('state' => false, 'msg' => $resp->zh_desc);
    			}
    		}
    		//print_r($fields);die;
    		if (!empty($fields)) {
    			
    			return array('state' => true, 'goods_info' => $fields,'msg'=>'');
    		} else {
    			return array('state' => false, 'msg' => '查询结果为空');
    		}
    	} else {
    		return array('state' => false, 'msg' => $resp->zh_desc);
    	}
    	return $data;
    }
    /**
     * 获取商品sku
     * @param type $str
     * @return type
     */
    public function get_goods_skus($str) {
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new WareSkusGetRequest();
        $req->setWareIds($str);
        $req->setFields("sku_id,ware_id,shop_id,status,attributes,jd_price,cost_price,market_price,stock_num,outer_id,created,modified,color_value,size_value");
        $resp = $c->execute($req, $c->accessToken);
        return $resp;
    }

    /**
     * 获取单个商品信息
     * @param type $str
     * @return type
     */
    public function ware_get_request($str) {
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new WareGetRequest();
        $req->setWareId($str);
        $req->setFields("logo,skus,item_num,weight,created,modified,ware_id,ware_status,online_time,offline_time,cost_price,jd_price,stock_num,outer_id,title");                  //可选的返回的字段
        $resp = $c->execute($req, $c->accessToken);
        return $resp;
    }

    /**
     * 获取单个商品信息
     * @param type $str
     * @return type
     */
    public function get_goods_info($str) {
        if (empty($str)) {
            return array('state' => false, 'msg' => '参数错误');
        }
        $data = array('state' => false, 'msg' => '系统错误');
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new WareGetRequest();
        $req->setWareId($str);
        $req->setFields("skus,title,logo,status,weight,created,modified,ware_id,brand_id,cid,shop_id,ware_status,item_num,upc_code,cost_price,market_price,jd_price,stock_num");
        $resp = $c->execute($req, $c->accessToken);
        if ($resp->code) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $resp->zh_desc);
        } elseif ($resp->code == 0) {
            $data = array('state' => true, 'goods_info' => $resp->ware);
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
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new OrderVenderRemarkUpdateRequest();
        $req->setOrderId($order_id);
        $req->setRemark($remark);
        $req->setFlag($flag);
        $resp = $c->execute($req, $c->accessToken);
        return $resp;
    }

    /**
     * 商品上架
     * @param type $war_id           商品id
     * @param string $trande_no      流水号（不能重复）
     * @return boolean
     */
    public function putaway($war_id, $trande_no = null) {
        if (empty($war_id)) {
            return array('state' => false, 'msg' => '参数错误');
        }
        $data = array('state' => false, 'msg' => '系统错误');
        if (empty($trande_no)) {
            $trande_no = $this->rand_num();
        }
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new WareUpdateListingRequest();
        $req->setWareId($war_id);
        $req->setTradeNo($trande_no);
        $resp = $c->execute($req, $c->accessToken);
        if ($resp->code) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $resp->zh_desc);
        } elseif ($resp->code == 0) {
            $data = array('state' => true, 'msg' => '操作成功！');
        }
        return $data;
    }

    public function rand_num() {
        return date('ymdHis') . rand(1000, 9999);
    }

    /**
     * 商品下架
     * @param type $war_id          商品id
     * @param type $trande_no       流水号（不能重复）
     * @return boolean
     */
    public function sold_out($war_id, $trande_no = null) {
        if (empty($war_id)) {
            return array('state' => false, 'msg' => '参数错误');
        }
        $data = array('state' => false, 'msg' => '系统错误');
        if (empty($trande_no)) {
            $trande_no = $this->rand_num();
        }
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new WareUpdateDelistingRequest();
        $req->setWareId($war_id);
        $req->setTradeNo($trande_no);
        $resp = $c->execute($req, $c->accessToken);
        if ($resp->code) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $resp->zh_desc);
        } elseif ($resp->code == 0) {
            $data = array('state' => true, 'msg' => '操作成功！');
        }
        return $data;
    }

    /**
     * 根据sku_id设置商品库存
     * @param type $stocks        库存
     * @param type $sku_id        sku_id
     * @return boolean
     */
    public function stock_sync($stocks, $sku_id) {
        $data = array('state' => false, 'msg' => '系统错误');
        $stocks = intval($stocks);//print_r($stocks);print_r($sku_id);die;
        $c = new JdClient();
        $c->appKey = $this->appkey;
        $c->appSecret = $this->appsecret;
        $c->accessToken = $this->accesstoken;
        $req = new StockWriteUpdateSkuStockRequest();//print_r($stocks.'AAA'.$sku_id);die;
        $req->setSkuId($sku_id);
        $req->setStockNum($stocks);
//        $req->setStoreId( 123 );
        $resp = $c->execute($req, $c->accessToken);//print_r($resp);die;
        if ($resp->code == 0 && $resp->success) {
            $data = array('state' => true, 'msg' => '操作成功！');
        } elseif ($resp->code != 0) {   //获取错误，停止获取
            $data = array('state' => false, 'msg' => $resp->zh_desc);
        } else {
            $data = array('state' => false, 'msg' => '操作失败！');
        }
        return $data;
    }

    /**
     * 订单发货处理
     * @param type $stocks        库存
     * @param type $sku_id        sku_id
     * @return boolean
     */
    public function order_ship($order_id, $express_name, $express_sn) {
        $data = array('state' => false, 'msg' => '系统错误');
        $experss = $this->get_store_express();
        if ($experss->code == 0) {
            $expersses = $experss->delivery_companies;
            $flag = false;
            $express_id = 0;
            $match_arr = [];
            foreach ($expersses as $k => $v) {
                if (strpos($v->name, $express_name) !== false) {
                    if ($v->name == $express_name) {
                        $express_id = $v->id;
                        $flag = true;
                        break;
                    }
                    $match_arr[] = $v->id;
                }
                if (strpos($express_name, $v->name) !== false) {
                    if ($v->name == $express_name) {
                        $express_id = $v->id;
                        $flag = true;
                        break;
                    }
                    $match_arr[] = $v->id;
                }
                if ($k == count($expersses) - 1 && !empty($match_arr)) {
                    $express_id = $match_arr[0];
                    $flag = true;
                }
            }
            if ($flag) {
//                var_dump($express_id);exit;
//                $stocks = intval($stocks);
                $c = new JdClient();
                $c->appKey = $this->appkey;
                $c->appSecret = $this->appsecret;
                $c->accessToken = $this->accesstoken;
                $req = new OrderSopOutstorageRequest();
                $req->setLogisticsId($express_id);
                $req->setWaybill($express_sn);
                $req->setOrderId($order_id);
                $resp = $c->execute($req, $c->accessToken);
                if ($resp->code == 0) {
                    $data = array('state' => true, 'msg' => '操作成功！');
                } elseif ($resp->code != 0) {   //获取错误，停止获取
                    $data = array('state' => false, 'msg' => $resp->zh_desc, 'code' => $resp->code);
                } else {
                    $data = array('state' => false, 'msg' => '更新京东平台的物流信息失败！');
                }
            } else {
                $data['msg'] =  '京东平台没有此物流，无法更新京东平台的订单状态，请手动处理！';
            }
        } else {
            $data['msg'] =  '查询京东物流信息错误';
        }
        return $data;
    }
    
    /*
     * 获取京东子类目
     * $parent_id ID 父类目ID
     * */
    public function get_cate($parent_id=0){
    	$c = new JdClient();
    	$c->appKey = $this->appkey;
    	$c->appSecret = $this->appsecret;
    	$c->accessToken = $this->accesstoken;
    	$req = new CategoryReadFindByPIdRequest();
    	$req->setParentCid($parent_id);	
    	$req->setField( "id,fid,lev,order,name" );
    	$resp = $c->execute($req, $c->accessToken);
    	if ($resp->code == 0) {
    		$cate = $resp->categories;
    		$info = array();
    		foreach ($cate as $k=>$v){
    			$info[] = object_array($v);
    			 
    		}
    		$data = array('state' => true, 'msg' => '','info'=>$info);
    	}else{
    		$data = array('state' => false, 'msg' => $resp->zh_desc);
    	}
    	return $data;
    }
    /*
     * 获取京东单个类目
     * $cid string 类目ID，获取单个类目用
     * */
    public function get_a_cate($cid=''){
    	$c = new JdClient();
    	$c->appKey = $this->appkey;
    	$c->appSecret = $this->appsecret;
    	$c->accessToken = $this->accesstoken;
    	$req = new CategoryReadFindByIdRequest();
    	$req->setCid($cid);
    	$req->setField( "id,fid,lev,order,name" );
    	$resp = $c->execute($req, $c->accessToken);
        if ($resp->code == 0) {
    		$cate = $resp->category;
    		$info = object_array($cate);
    		$data = array('state' => true, 'msg' => '','info'=>$info);
    	}else{
    		$data = array('state' => false, 'msg' => $resp->zh_desc);
    	}
    	//print_r($data);die;
    	return $data;
    }
    /*
     * 获取京东品牌
     * */
    public function get_brand(){
    	$c = new JdClient();
    	$c->appKey = $this->appkey;
    	$c->appSecret = $this->appsecret;
    	$c->accessToken = $this->accesstoken;
    	$req = new PopVenderCenerVenderBrandQueryRequest();
    	$req->setName( "" );
    	$resp = $c->execute($req, $c->accessToken);
    	if ($resp->code == 0) {
    		$cate = $resp->categories;
    		$info = array();
    		foreach ($cate as $k=>$v){
    			$info[] = object_array($v);
    
    		}
    		$data = array('state' => true, 'msg' => '','info'=>$info);
    	}else{
    		$data = array('state' => false, 'msg' => $resp->zh_desc);
    	}
    	return $data;
    }
}
