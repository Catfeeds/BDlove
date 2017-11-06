<?php
/* Smarty version 3.1.29, created on 2017-10-17 14:53:55
  from "D:\www\yunjuke\application\vmall\views\order_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e5a903604285_50355713',
  'file_dependency' => 
  array (
    '20cd9d9aba901730cb5b62db412f7b1273daf545' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\order_list.html',
      1 => 1508223226,
      2 => 'file',
    ),
    '5cea575055325e574f9e509e31fe0032e5018982' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink.html',
      1 => 1505370736,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59e5a903604285_50355713 ($_smarty_tpl) {
?>
<html lang="zh-cn" style="opacity: 1; font-size: 200px;" class="view6s">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="full-screen" content="yes">
<link href="favicon.ico" rel="shortcut icon" />
<link rel="Shortcut Icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico" />
<meta content="成都云聚客科技有限公司" name="author" />
<meta content="Copyright 1999-2017. www.jukeyunduan.cn . All Rights Reserved." name="copyright" />
<meta name="application-name" content="云聚客" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="shortcut icon" href="http://[::1]/yunjuke//favicon.ico">
<link href="http://[::1]/yunjuke/application/vmall/views/css/weui.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/vmall/views/css/style.css" rel="stylesheet" type="text/css">

<script>
  (function(doc, win) {
    // 移动端REM自适应
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
          var clientWidth=docEl.clientWidth||320;
          var docCls = docEl.classList;
          var width = clientWidth < 320 ? 320 : clientWidth > 640 ? 640 : clientWidth;
          docEl.style.fontSize = 100 * (width / 320) + 'px';
          docEl.style.opacity=1;

          // 添加屏幕标识，便于文字调整
          if(375 <= clientWidth && clientWidth < 414){
            docCls.add('view6');
          }else if(414 <= clientWidth){
            docCls.add('view6s');
          }else{
            docCls.remove('view6');
            docCls.remove('view6s');
          }
        };
    docEl.style.opacity=0;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
    // IOS8下1px线条改为0.5px
    if (/iP(hone|od|ad)/.test(navigator.userAgent)) {
        var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/),
            version = parseInt(v[1], 10);
        if(version >= 8){
            document.documentElement.classList.add('hairlines');
        }
    }
    })(document, window);








</script>
			<title>我的订单</title>
			<style>
				.orderList {
					border: none;
					-webkit-box-shadow: 0 1px 1px -1px rgba(0, 0, 0, 0.3);
					box-shadow: 0 1px 1px -1px rgba(0, 0, 0, 0.3);
					padding-left: 0;
				}
				
				.s-options .s-items li {
					min-width: 52px;
				}
				
				.orderList .tit {
					line-height: 36px;
					padding: 5px 0 5px 10px;
					height: 36px;
					color: #333!important;
				}
				.orderList .action {
					padding: 5px 15px 8px 10px;
				}
				.orderform{
					color: #999;
					margin-left: 10px;
				}
				@media screen and (max-width: 350px) {
					.orderList .tit {
						font-size: 13px;
				}
				}
				.btn {
				    padding: 3px 10px!important;
				    margin-left: 5px;
				    border: 1px solid #999;
				}
				.btn-color{
					border: 1px solid red;
					color: red!important;
				}
			</style>

	</head>

	<body>
		<section class="s-options mb10">
			<ul class="s-items">
				<li>
					<a data-type="" href="http://[::1]/yunjuke/vmall.php/order/index" class="curr"><span>全部</span></a>
				</li>
				<li>
					<a data-type="" href="http://[::1]/yunjuke/vmall.php/order/index/1" class=""><span>待付款</span></a>
				</li>
				<li>
					<a data-type="" href="http://[::1]/yunjuke/vmall.php/order/index/2" class=""><span>待收货</span></a>
				</li>
				<li>
					<a data-type="" href="http://[::1]/yunjuke/vmall.php/order/index/3" class=""><span>待提货</span></a>
				</li>
				<li>
					<a data-type="" href="http://[::1]/yunjuke/vmall.php/order/index/4" class=""><span>待评价</span></a>
				</li>
				<li>
					<a data-type="" href="http://[::1]/yunjuke/vmall.php/order/index/5" class=""><span>已关闭</span></a>
				</li>
			</ul>
		</section>

		<section id="tempContent">
		                			<section class="orderList" onclick="gotoDetail(this)" data-id="9881561476845541">
				<div class="tit">
					
										<p>订单编号：9881561476845541
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/铁蓝灰</div>
					</div>
					<div class="count tx-r">
						<p>￥399.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥390.60</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=9881561476845541&store_id=81&goods_id=33022&goods_ea_id=257848" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=9881561476845541" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="2981561476313461">
				<div class="tit">
					
										<p>订单编号：2981561476313461
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待自提												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/铁蓝灰</div>
					</div>
					<div class="count tx-r">
						<p>￥362.34</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥362.34</span></span>
                    
                                             		                     <a href="http://[::1]/yunjuke/vmall.php/order/confirm_goods?order_sn=2981561476313461" class="appraise fr btn btn-color">确认收货</a>
                         	               					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3381561468219271">
				<div class="tit">
					
										<p>订单编号：3381561468219271
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">铁蓝灰/蓝色</div>
					</div>
					<div class="count tx-r">
						<p>￥399.00</p>
						<p>x 4</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">4</span>件商品       合计：<span class="fc-red number">￥1316.70</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=3381561468219271&store_id=81&goods_id=33022&goods_ea_id=257848" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=3381561468219271" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="8181561467268361">
				<div class="tit">
					
										<p>订单编号：8181561467268361
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">铁蓝灰/蓝色</div>
					</div>
					<div class="count tx-r">
						<p>￥119.70</p>
						<p>x 4</p>
					</div>
				</div>
								               				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">胭脂红/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥399.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥1715.70</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=8181561467268361&store_id=81&goods_id=33022&goods_ea_id=257848" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=8181561467268361" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3781561464732461">
				<div class="tit">
					
										<p>订单编号：3781561464732461
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">铁蓝灰/蓝色</div>
					</div>
					<div class="count tx-r">
						<p>￥399.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥399.00</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=3781561464732461&store_id=81&goods_id=33022&goods_ea_id=257848" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=3781561464732461" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="8181561464702791">
				<div class="tit">
					
										<p>订单编号：8181561464702791
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">铁蓝灰/蓝色</div>
					</div>
					<div class="count tx-r">
						<p>￥399.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥399.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=8181561464702791" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3981561464640381">
				<div class="tit">
					
										<p>订单编号：3981561464640381
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/铁蓝灰</div>
					</div>
					<div class="count tx-r">
						<p>￥390.60</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥390.60</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=3981561464640381&store_id=81&goods_id=33022&goods_ea_id=257848" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=3981561464640381" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="2381561464434791">
				<div class="tit">
					
										<p>订单编号：2381561464434791
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待自提												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/象牙白</div>
					</div>
					<div class="count tx-r">
						<p>￥390.60</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥382.20</span></span>
                    
                                             		                     <a href="http://[::1]/yunjuke/vmall.php/order/confirm_goods?order_sn=2381561464434791" class="appraise fr btn btn-color">确认收货</a>
                         	               					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3081561464246211">
				<div class="tit">
					
										<p>订单编号：3081561464246211
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待自提												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/象牙白</div>
					</div>
					<div class="count tx-r">
						<p>￥390.60</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥390.60</span></span>
                    
                                             		                     <a href="http://[::1]/yunjuke/vmall.php/order/confirm_goods?order_sn=3081561464246211" class="appraise fr btn btn-color">确认收货</a>
                         	               					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="6181561464051891">
				<div class="tit">
					
										<p>订单编号：6181561464051891
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/铁蓝灰</div>
					</div>
					<div class="count tx-r">
						<p>￥390.60</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥390.60</span></span>
                    
                                             								<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=6181561464051891" class="appraise fr btn btn-color">
								立即支付
							   </a>
						 	               					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3881561463880251">
				<div class="tit">
					
										<p>订单编号：3881561463880251
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/铁蓝灰</div>
					</div>
					<div class="count tx-r">
						<p>￥390.60</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥390.60</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=3881561463880251&store_id=81&goods_id=33022&goods_ea_id=257848" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=3881561463880251" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="1981561463580031">
				<div class="tit">
					
										<p>订单编号：1981561463580031
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/铁蓝灰</div>
					</div>
					<div class="count tx-r">
						<p>￥390.60</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥390.60</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=1981561463580031&store_id=81&goods_id=33022&goods_ea_id=257848" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=1981561463580031" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="6581561461281671">
				<div class="tit">
					
										<p>订单编号：6581561461281671
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待自提												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091613422.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/铁蓝灰</div>
					</div>
					<div class="count tx-r">
						<p>￥390.60</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥390.60</span></span>
                    
                                             		                     <a href="http://[::1]/yunjuke/vmall.php/order/confirm_goods?order_sn=6581561461281671" class="appraise fr btn btn-color">确认收货</a>
                         	               					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="7281561320536381">
				<div class="tit">
					
										<p>订单编号：7281561320536381
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">胭脂红/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥0.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥0.00</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=7281561320536381&store_id=81&goods_id=33023&goods_ea_id=257851" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=7281561320536381" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="8381561320471481">
				<div class="tit">
					
										<p>订单编号：8381561320471481
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">胭脂红/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥0.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥0.00</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=8381561320471481&store_id=81&goods_id=33023&goods_ea_id=257851" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=8381561320471481" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="7181561320445681">
				<div class="tit">
					
										<p>订单编号：7181561320445681
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">胭脂红/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥0.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥0.00</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=7181561320445681&store_id=81&goods_id=33023&goods_ea_id=257851" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=7181561320445681" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="5781561320417621">
				<div class="tit">
					
										<p>订单编号：5781561320417621
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">胭脂红/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥0.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥0.00</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=5781561320417621&store_id=81&goods_id=33023&goods_ea_id=257851" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=5781561320417621" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="4281561318188891">
				<div class="tit">
					
										<p>订单编号：4281561318188891
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">胭脂红/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥279.30</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥279.30</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=4281561318188891&store_id=81&goods_id=33023&goods_ea_id=257851" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=4281561318188891" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3881561316126291">
				<div class="tit">
					
										<p>订单编号：3881561316126291
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/胭脂红</div>
					</div>
					<div class="count tx-r">
						<p>￥279.30</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥279.30</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=3881561316126291&store_id=81&goods_id=33023&goods_ea_id=257851" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=3881561316126291" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="2561561316071071">
				<div class="tit">
					
										<p>订单编号：2561561316071071
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/2017/10/11/15076853371900928575593793515930011.SS2" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋 2017秋冬正品女中童时尚铆钉拉链涂鸦皮鞋靴子牛仔靴</div>
						<div class="sku fc-grey">红色/18cm（内长16.</div>
					</div>
					<div class="count tx-r">
						<p>￥68.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥68.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=2561561316071071" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="7981561315877251">
				<div class="tit">
					
										<p>订单编号：7981561315877251
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">胭脂红/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥0.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥399.00</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=7981561315877251&store_id=81&goods_id=33023&goods_ea_id=257851" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=7981561315877251" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="7081561310952781">
				<div class="tit">
					
										<p>订单编号：7081561310952781
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">胭脂红/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥0.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥399.00</span></span>
                    
                                                                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=7081561310952781&store_id=81&goods_id=33023&goods_ea_id=257851" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=7081561310952781" class="appraise fr btn btn-color">
								查看物流
							</a>
                      		
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="9261561310952782">
				<div class="tit">
					
										<p>订单编号：9261561310952782
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/2017/10/11/15076853962430929565572375747190112.SS2" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋春秋双色铆钉男童中童防滑软底时尚休闲儿童正品皮鞋</div>
						<div class="sku fc-grey">黑色/21cm（内长19.</div>
					</div>
					<div class="count tx-r">
						<p>￥138.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥138.00</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=9261561310952782&store_id=61&goods_id=33804&goods_ea_id=261986" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=9261561310952782" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="5881561310674131">
				<div class="tit">
					
										<p>订单编号：5881561310674131
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">胭脂红/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥399.00</span></span>
                    
                                                                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=5881561310674131&store_id=81&goods_id=33023&goods_ea_id=257851" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=5881561310674131" class="appraise fr btn btn-color">
								查看物流
							</a>
                      		
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="4061561310674142">
				<div class="tit">
					
										<p>订单编号：4061561310674142
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/2017/10/11/15076853371900928575593793515930011.SS2" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋 2017秋冬正品女中童时尚铆钉拉链涂鸦皮鞋靴子牛仔靴</div>
						<div class="sku fc-grey">红色/18cm（内长16.</div>
					</div>
					<div class="count tx-r">
						<p>￥</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥68.00</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=4061561310674142&store_id=61&goods_id=33746&goods_ea_id=260306" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=4061561310674142" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="9181561308903971">
				<div class="tit">
					
										<p>订单编号：9181561308903971
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">胭脂红/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥399.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=9181561308903971" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="6161561308903972">
				<div class="tit">
					
										<p>订单编号：6161561308903972
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/2017/10/11/15076853371900928575593793515930011.SS2" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋 2017秋冬正品女中童时尚铆钉拉链涂鸦皮鞋靴子牛仔靴</div>
						<div class="sku fc-grey">红色/18cm（内长16.</div>
					</div>
					<div class="count tx-r">
						<p>￥</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥68.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=6161561308903972" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="5061561137519861">
				<div class="tit">
					
										<p>订单编号：5061561137519861
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/2017/10/11/1507685343870092903556810532312.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋公主鞋2017秋新款女孩宝宝方口皮鞋蝴蝶结潮</div>
						<div class="sku fc-grey"> 15cm（内长12/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥108.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥108.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=5061561137519861" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="6761561137386371">
				<div class="tit">
					
										<p>订单编号：6761561137386371
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/2017/10/11/1507685309378092829557081750802.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋2017秋季新品女童运动鞋跑步鞋儿童小童皮面</div>
						<div class="sku fc-grey">17.5cm（内长1/黑+白</div>
					</div>
					<div class="count tx-r">
						<p>￥118.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥118.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=6761561137386371" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3881560952970451">
				<div class="tit">
					
										<p>订单编号：3881560952970451
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091629567.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">套绒冲锋衣</div>
						<div class="sku fc-grey">S/杜鹃红</div>
					</div>
					<div class="count tx-r">
						<p>￥650.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥650.00</span></span>
                    
                                                                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=3881560952970451&store_id=81&goods_id=33191&goods_ea_id=258187" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=3881560952970451" class="appraise fr btn btn-color">
								查看物流
							</a>
                      		
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="2781560952837751">
				<div class="tit">
					
										<p>订单编号：2781560952837751
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091616076.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">AE15软壳外套</div>
						<div class="sku fc-grey">S/胭脂红</div>
					</div>
					<div class="count tx-r">
						<p>￥250.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥250.00</span></span>
                    
                                                                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=2781560952837751&store_id=81&goods_id=33023&goods_ea_id=257851" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=2781560952837751" class="appraise fr btn btn-color">
								查看物流
							</a>
                      		
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3781560952731181">
				<div class="tit">
					
										<p>订单编号：3781560952731181
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201710091635521.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">套绒冲锋衣</div>
						<div class="sku fc-grey">XS/红色</div>
					</div>
					<div class="count tx-r">
						<p>￥650.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥650.00</span></span>
                    
                                                                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=3781560952731181&store_id=81&goods_id=33197&goods_ea_id=258205" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=3781560952731181" class="appraise fr btn btn-color">
								查看物流
							</a>
                      		
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3074560942487631">
				<div class="tit">
					
										<p>订单编号：3074560942487631
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">ABC KIDS白/黑男足其他配饰鞋</div>
						<div class="sku fc-grey">35/白/黑</div>
					</div>
					<div class="count tx-r">
						<p>￥239.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥239.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=3074560942487631" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="2961560859502511">
				<div class="tit">
					
										<p>订单编号：2961560859502511
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/2017/10/08/1507438817439130017559170292798.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">ABC正品童鞋 17冬款男童小童跑鞋儿童休闲鞋男孩宝宝机能鞋运动鞋</div>
						<div class="sku fc-grey">16cm（内长13./宝蓝/明黄</div>
					</div>
					<div class="count tx-r">
						<p>￥88.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥88.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=2961560859502511" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="4761560713001591">
				<div class="tit">
					
										<p>订单编号：4761560713001591
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												已取消												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/2017/09/25/15063300579541700575569038349580415.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋男童女童宝宝婴儿学步鞋毛毛虫休闲透气防滑运动鞋</div>
						<div class="sku fc-grey">22/花色</div>
					</div>
					<div class="count tx-r">
						<p>￥68.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥68.00</span></span>
                    
                                         					        <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=4761560713001591&store_id=61&goods_id=32750&goods_ea_id=251509" class="appraise fr btn  btn-color">
								再次购买
							</a>  		
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="7161560701050601">
				<div class="tit">
					
										<p>订单编号：7161560701050601
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/2017/09/25/1506330064796170104557315708926.SS2" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">ABC童鞋专柜正品2017秋季新款Ai+超能减震跑步鞋男女通用款</div>
						<div class="sku fc-grey">21cm（内长19./宝蓝+黑</div>
					</div>
					<div class="count tx-r">
						<p>￥169.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥169.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=7161560701050601" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="9361560700769141">
				<div class="tit">
					
										<p>订单编号：9361560700769141
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/2017/09/25/1506330133525170213557308195189.SS2" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">正品abc童鞋2017秋新款女中童款时尚休闲防滑牛皮高帮短靴子</div>
						<div class="sku fc-grey">21cm（内长19./黑色</div>
					</div>
					<div class="count tx-r">
						<p>￥169.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥169.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=9361560700769141" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3261559161608811">
				<div class="tit">
					
										<p>订单编号：3261559161608811
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1739020213556903834958attr.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋男童女童宝宝婴儿学步鞋毛毛虫休闲透气防滑运动鞋</div>
						<div class="sku fc-grey">22/花色</div>
					</div>
					<div class="count tx-r">
						<p>￥68.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥68.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=3261559161608811" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="9747559044060091">
				<div class="tit">
					
										<p>订单编号：9747559044060091
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201708291541515.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">monkeyshoes</div>
						<div class="sku fc-grey">110/灰色</div>
					</div>
					<div class="count tx-r">
						<p>￥123.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥123.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=9747559044060091" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="4966558802001331">
				<div class="tit">
					
										<p>订单编号：60203368850947978
						<span class="orderform">1194891879月儿<span>
						<span class="status">
 												待收货												</span>
					</p>
									</div>
                                             <div class="orderItem wbox">
					<img src="https://img.alicdn.com/bao/uploaded/i3/401418304/TB29zUaXHwTMeJjSszfXXXbtFXa_!!401418304.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋 男童女童运动鞋冬季二棉保暖运动鞋加厚正品</div>
						<div class="sku fc-grey">32码/21.5cm/玫红/黑</div>
					</div>
					<div class="count tx-r">
						<p>￥59.00</p>
						<p>x 1</p>
					</div>
				</div>
               				                              <div class="orderItem wbox">
					<img src="https://img.alicdn.com/bao/uploaded/i4/401418304/TB2kbB_cwb.PuJjSZFpXXbuFpXa-401418304.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋 男童女童运动鞋冬季智能运动跑鞋中大童休闲跑步鞋</div>
						<div class="sku fc-grey">26码/18cm（内/紫玫红/草莓粉</div>
					</div>
					<div class="count tx-r">
						<p>￥55.00</p>
						<p>x 1</p>
					</div>
				</div>
               				                              <div class="orderItem wbox">
					<img src="https://img.alicdn.com/bao/uploaded/i4/401418304/TB2nrgdXMMPMeJjy1XdXXasrXXa_!!401418304.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">ABC童鞋 冬季女童男童智能鞋定位鞋二棉加厚鞋正品</div>
						<div class="sku fc-grey">30码/20.5cm/玫红/粉红</div>
					</div>
					<div class="count tx-r">
						<p>￥65.00</p>
						<p>x 1</p>
					</div>
				</div>
               				                              <div class="orderItem wbox">
					<img src="https://img.alicdn.com/bao/uploaded/i3/401418304/TB2EpDqfUcKL1JjSZFzXXcfJXXa-401418304.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">abckids童鞋 男童女童运动鞋冬季智能运动跑鞋中大童休闲跑步鞋</div>
						<div class="sku fc-grey">26码/18cm（内/纯蓝/荧光橙</div>
					</div>
					<div class="count tx-r">
						<p>￥55.00</p>
						<p>x 1</p>
					</div>
				</div>
               								<div class="action">
				     				     <span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥234.00</span></span>
				     
                   	                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=4966558802001331&store_id=0&goods_id=0&goods_ea_id=0" class="appraise fr btn  btn-color">
								再次购买
							</a>  
								<!-- <a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=4966558802001331" class="appraise fr btn btn-color">
								立即支付
							   </a> -->
						 						  <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=4966558802001331" class="appraise fr btn btn-color">
								查看物流
							</a>
		                     <!-- <a href="http://[::1]/yunjuke/vmall.php/order/confirm_goods?order_sn=4966558802001331" class="appraise fr btn btn-color">确认收货</a> -->
                         					        		
	                      
                   					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="4947558004831981">
				<div class="tit">
					
										<p>订单编号：4947558004831981
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待收货												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201708291541515.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">monkeyshoes</div>
						<div class="sku fc-grey">110/灰色</div>
					</div>
					<div class="count tx-r">
						<p>￥</p>
						<p>x </p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number"></span>件商品       合计：<span class="fc-red number">￥0.00</span></span>
                    
                                                               		 <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=4947558004831981&store_id=47&goods_id=20438&goods_ea_id=75031" class="appraise fr btn">
								再次购买
							</a>
                            <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=4947558004831981" class="appraise fr btn btn-color">
								查看物流
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="5561557948887491">
				<div class="tit">
					
										<p>订单编号：5561557948887491
						<span class="orderform"><span>
						<span class="status">
 												待付款												</span>
					</p>
									</div>
                                             <div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201708291541515.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">monkeyshoes</div>
						<div class="sku fc-grey">110/灰色灰色</div>
					</div>
					<div class="count tx-r">
						<p>￥123.00</p>
						<p>x 1</p>
					</div>
				</div>
               								<div class="action">
				     				     <span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥123.00</span></span>
				     
                   	                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=5561557948887491&store_id=0&goods_id=20438&goods_ea_id=75031" class="appraise fr btn  btn-color">
								再次购买
							</a>  
								<!-- <a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=5561557948887491" class="appraise fr btn btn-color">
								立即支付
							   </a> -->
						 					        		
	                      
                   					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="8361557948720881">
				<div class="tit">
					
										<p>订单编号：8361557948720881
						<span class="orderform"><span>
						<span class="status">
 												待付款												</span>
					</p>
									</div>
                                             <div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201708291541515.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">monkeyshoes</div>
						<div class="sku fc-grey">110/灰色灰色</div>
					</div>
					<div class="count tx-r">
						<p>￥123.00</p>
						<p>x 1</p>
					</div>
				</div>
               								<div class="action">
				     				     <span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥123.00</span></span>
				     
                   	                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=8361557948720881&store_id=0&goods_id=20438&goods_ea_id=75031" class="appraise fr btn  btn-color">
								再次购买
							</a>  
								<!-- <a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=8361557948720881" class="appraise fr btn btn-color">
								立即支付
							   </a> -->
						 					        		
	                      
                   					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="9461557948646151">
				<div class="tit">
					
										<p>订单编号：9461557948646151
						<span class="orderform"><span>
						<span class="status">
 												待付款												</span>
					</p>
									</div>
                                             <div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201708291541515.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">monkeyshoes</div>
						<div class="sku fc-grey">110/灰色灰色</div>
					</div>
					<div class="count tx-r">
						<p>￥123.00</p>
						<p>x 1</p>
					</div>
				</div>
               								<div class="action">
				     				     <span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥123.00</span></span>
				     
                   	                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=9461557948646151&store_id=0&goods_id=20438&goods_ea_id=75031" class="appraise fr btn  btn-color">
								再次购买
							</a>  
								<!-- <a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=9461557948646151" class="appraise fr btn btn-color">
								立即支付
							   </a> -->
						 					        		
	                      
                   					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="6661557948288661">
				<div class="tit">
					
										<p>订单编号：6661557948288661
						<span class="orderform"><span>
						<span class="status">
 												待付款												</span>
					</p>
									</div>
                                             <div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201708291541515.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">monkeyshoes</div>
						<div class="sku fc-grey">110/灰色灰色</div>
					</div>
					<div class="count tx-r">
						<p>￥123.00</p>
						<p>x 1</p>
					</div>
				</div>
               								<div class="action">
				     				     <span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥123.00</span></span>
				     
                   	                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=6661557948288661&store_id=0&goods_id=20438&goods_ea_id=75031" class="appraise fr btn  btn-color">
								再次购买
							</a>  
								<!-- <a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=6661557948288661" class="appraise fr btn btn-color">
								立即支付
							   </a> -->
						 					        		
	                      
                   					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="5461557946884252">
				<div class="tit">
					
										<p>订单编号：55410124390093643
						<span class="orderform">冠军天猫<span>
						<span class="status">
 												待收货												</span>
					</p>
									</div>
                                             <div class="orderItem wbox">
					<img src="https://img.alicdn.com/bao/uploaded/i4/TB1u9MGGXXXXXaEXXXXmqtN.VXX_111420.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">清仓李宁休闲鞋女2017春季新款运动鞋复古400M休闲鞋学生鞋滑板鞋</div>
						<div class="sku fc-grey">ALCJ122-5/花色曼珠红/荧光柔橙</div>
					</div>
					<div class="count tx-r">
						<p>￥49.00</p>
						<p>x 1</p>
					</div>
				</div>
               								<div class="action">
				     				     <span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥49.00</span></span>
				     
                   	                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=5461557946884252&store_id=0&goods_id=0&goods_ea_id=0" class="appraise fr btn  btn-color">
								再次购买
							</a>  
								<!-- <a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=5461557946884252" class="appraise fr btn btn-color">
								立即支付
							   </a> -->
						 						  <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=5461557946884252" class="appraise fr btn btn-color">
								查看物流
							</a>
		                     <!-- <a href="http://[::1]/yunjuke/vmall.php/order/confirm_goods?order_sn=5461557946884252" class="appraise fr btn btn-color">确认收货</a> -->
                         					        		
	                      
                   					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="7261557945441403">
				<div class="tit">
					
										<p>订单编号：54697308071523685
						<span class="orderform"><span>
						<span class="status">
 												已完成												</span>
					</p>
									</div>
                                             <div class="orderItem wbox">
					<img src="https://img.alicdn.com/bao/uploaded/i1/730208880/TB2riYzX9_9F1JjSZFhXXbadVXa_!!730208880.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">李宁韦德运动裤男裤夏秋季直筒敞口宽松正品修身针织休闲长裤卫裤</div>
						<div class="sku fc-grey">AKLJ283-3/花色花灰AKLJ283-3</div>
					</div>
					<div class="count tx-r">
						<p>￥56.00</p>
						<p>x 1</p>
					</div>
				</div>
               								<div class="action">
				     				     <span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥56.00</span></span>
				     
                   	                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=7261557945441403&store_id=0&goods_id=0&goods_ea_id=0" class="appraise fr btn  btn-color">
								再次购买
							</a>  
								<!-- <a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=7261557945441403" class="appraise fr btn btn-color">
								立即支付
							   </a> -->
						 						  <a href="http://[::1]/yunjuke/vmall.php/order/look_logistics?order_sn=7261557945441403" class="appraise fr btn btn-color">
								查看物流
							</a>
		                     <!-- <a href="http://[::1]/yunjuke/vmall.php/order/confirm_goods?order_sn=7261557945441403" class="appraise fr btn btn-color">确认收货</a> -->
                         					        		
	                      
                   					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="3347557927485411">
				<div class="tit">
					
										<p>订单编号：3347557927485411
						<span class="orderform">微商城<span>
						<span class="status" data-type="">
												待付款												</span>
					</p>
									</div>
                              				<div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201708291541515.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">monkeyshoes</div>
						<div class="sku fc-grey">110/灰色</div>
					</div>
					<div class="count tx-r">
						<p>￥123.00</p>
						<p>x 1</p>
					</div>
				</div>
												<div class="action">
				     					<span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥123.00</span></span>
                    
                                         							<a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=3347557927485411" class="appraise fr btn btn-color">
								立即支付
							</a>
                                         					
						
                
				</div>
                

			</section>
            			<section class="orderList" onclick="gotoDetail(this)" data-id="2561557926239171">
				<div class="tit">
					
										<p>订单编号：2561557926239171
						<span class="orderform"><span>
						<span class="status">
 												待付款												</span>
					</p>
									</div>
                                             <div class="orderItem wbox">
					<img src="http://www.juketz.com/data/shop/album_pic/1_201708291541515.jpg" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/default_goods_image.jpg'" class="size40">
					<div class="msg wbox-1">
						<div class="name">monkeyshoes</div>
						<div class="sku fc-grey">110/灰色灰色</div>
					</div>
					<div class="count tx-r">
						<p>￥123.00</p>
						<p>x 1</p>
					</div>
				</div>
               								<div class="action">
				     				     <span class="fl" style="width: 100%;">共<span class="goods_num number">1</span>件商品       合计：<span class="fc-red number">￥123.00</span></span>
				     
                   	                     <a href="http://[::1]/yunjuke/vmall.php/order/again_bay?order_sn=2561557926239171&store_id=0&goods_id=20438&goods_ea_id=75031" class="appraise fr btn  btn-color">
								再次购买
							</a>  
								<!-- <a href="http://[::1]/yunjuke/vmall.php/order/post_order?order_sn=2561557926239171" class="appraise fr btn btn-color">
								立即支付
							   </a> -->
						 					        		
	                      
                   					
						
                
				</div>
                

			</section>
                        		</section>
		<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
        <script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/framework7.picker.min.js"></script>
		<script src="http://[::1]/yunjuke/application/vmall/views/js/base.js"></script>
		<script src="http://[::1]/yunjuke/application/vmall/views/js/LArea.js"></script>
		<script>
		function gotoDetail(obj){
			var orderSn = $(obj).attr('data-id');
			window.location.href="http://[::1]/yunjuke/vmall.php/order/order_detail?order_sn="+orderSn; 
		}
		</script>
		
	</body>
</html><?php }
}
