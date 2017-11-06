<?php
/* Smarty version 3.1.29, created on 2017-04-22 18:06:02
  from "E:\www\yunjuke\application\vmall\views\goods_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fb2b0a782f54_53601216',
  'file_dependency' => 
  array (
    '31d3da2f355149dfe5d48a41f52a0c9fdf320f89' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\goods_list.html',
      1 => 1492855447,
      2 => 'file',
    ),
    '368c42ee444c4bd0269d88571257280b552c724c' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink.html',
      1 => 1492598976,
      2 => 'file',
    ),
    '937c11f0dc00c77c8e7cb9c03c7341363c7be7ef' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\lib\\footer.html',
      1 => 1492496476,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_58fb2b0a782f54_53601216 ($_smarty_tpl) {
?>
<html lang="zh-cn" style="opacity: 1; font-size: 200px;" class="view6s">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="full-screen" content="yes">
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
			<title>商品列表</title>
			<link href="http://[::1]/yunjuke/application/vmall/views/css/home.css" rel="stylesheet" type="text/css">
			<style>
				.stockList {
					padding: 0 2%;
				}
				
				.small-block-grid-2 li {
					margin-bottom: 2%;
					margin-right: 2%;
					width: 49%;
					padding: 0;
				}
				
				.small-block-grid-2 li:nth-child(2n) {
					margin-right: 0;
					padding: 0;
				}
				
				.qk-pro-list .p-info {
					padding: 0;
					margin: .06rem .06rem 0 .06rem;
				}
				
				.p2_info {
					font-size: .13rem;
					padding: 0;
					margin: .08rem .08rem 0 .08rem;
					min-height: .32rem;
					overflow: hidden;
					text-overflow: ellipsis;
					display: -webkit-box;
					-webkit-line-clamp: 2;
					-webkit-box-orient: vertical;
				}
				
				.p2_flag {
					padding: 0;
					margin: .04rem .08rem .04rem .08rem;
					min-height: .32rem;
				}
				
				.sku-tag>img {
					display: block;
					width: .34rem;
					margin-left: .05rem;
				}
				
				.p2_cart {
					width: .28rem;
					height: .28rem;
					background: url(http://static.qiakr.com/mall/stock_cart.png?imageView2/1/w/40/h/40) no-repeat center;
					-webkit-background-size: cover;
					background-size: cover;
				}
				
				.qk-pro-list .sku-price {
					font-size: .13rem;
				}
				
				.qk-pro-list .tag-price {
					font-size: .11rem;
				}
				
				.loadingBox {
					margin-top: 0px;
				}
				
				.s-options {
					position: relative;
				}
				
				.s-options .s-items {
					padding: 0 20px;
					z-index: 2000;
					border-top: 1px solid #e5e5e5;
					border-bottom: 1px solid #e5e5e5;
					background-color: #fafafa;
				}
				
				.s-items li:nth-child(3):active {
					background: #f4f4f4;
				}
				
				.sl_brand_box {
					position: fixed;
					top: 85px;
					right: 0;
					left: 0;
					background: #fff;
					min-width: 200px;
					z-index: 2000;
					overflow-y: scroll;
					max-height: 90%;
				}
				
				.sl_brand_box li {
					line-height: 2.5em;
					border-bottom: 1px solid #F1F1F1;
				}
				
				.sl_brand_box li:last-child {
					border: none;
				}
				
				.sl_brand_box li a {
					display: block;
					padding-left: 10px;
				}
				
				.sl_brand_box li a:active {
					background: #f4f4f4;
				}
				
				#proListBox {
					padding-bottom: .4rem;
					padding-top: 2%;
				}
				
				#selectBrand.active {
					background: #f4f4f4;
					color: #f44336;
				}
				
				#selectBrand.active span {
					color: #f44336;
				}
				
				.insertShoppingCart {
					text-align: center;
					border-top: solid 1px #eee;
					line-height: 2.6;
					background: #fff;
				}
				
				.v3_shop_header {
					background-color: #fff;
				}
				
				.category_menu_txt,
				.category_menu .iconfont,
				.shop_chat .iconfon {
					color: #F44336;
				}
				
				.m_search_wrap,
				.search_input {
					background-color: #eaeaea;
				}
				
				.m_search_wrap:after {
					color: #666;
					font-size: 20px;
				}
				
				.v3_shop_header .mobile_search {
					margin-top: 7px;
				}
				
				.ub {
					display: -webkit-box !important;
					display: box !important;
					position: relative;
				}
				
				.ub-ac {
					-webkit-box-align: center;
					box-align: center;
				}
				
				.ub-ae {
					-webkit-box-align: end;
					box-align: end;
				}
				
				.ub-pc {
					-webkit-box-pack: center;
					box-pack: center;
				}
				
				.ub-pe {
					-webkit-box-pack: end;
					box-pack: end;
				}
				
				.ub-pj {
					-webkit-box-pack: justify;
					box-pack: justify;
				}
				
				.ub-ver {
					-webkit-box-orient: vertical;
					box-orient: vertical;
				}
				
				.ub-f1 {
					position: relative;
					-webkit-box-flex: 1;
					box-flex: 1;
				}
				
				.ut-s {
					text-overflow: ellipsis;
					overflow: hidden;
					white-space: nowrap;
					outline: 0 !important;
				}
			</style>

			<body ontouchstart="">
				<input type="hidden" id="storeId" value="191">
				<input type="hidden" id="totalCount" value="684">

				<!--S 主体内容 -->
				<div id="searchWrap" style="height: 45px;">
					<div class="wx_mod" modid="1000" id="m1000">
						<div class="bd">
							<div class="v3_shop_bar">
								<div class="v3_shop_header mui-flex">
									<div class="category_menu cell fixed" id="categoryMenu">
										<i class="iconfont category_menu_icon"></i> <span class="category_menu_txt">分类</span>
									</div>
									<div class="mobile_search cell">
										<div class="m_search_wrap">
											<input type="text" id="doSearch" class="search_input" placeholder="搜索店内商品">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- / search box -->

				<section class="s-options" id="stockListNavTool">
					<ul class="s-items" style="top:45px;">
						<li>
							<a href="#" class="sort curr down" data-order="off_time"><span>上架时间</span></a>
						</li>
						<li>
							<a href="#" class="sort" data-order="market_price"><span>价格<i></i></span></a>
						</li>
						<li>
							<a href="javascript:;" id="selectBrand" data-brandid="" data-state="hide"><span>品牌</span></a>
						</li>
					</ul>
					<ul class="sl_brand_box hide" id="brandItems">
						<li class="ui-list-item">
							<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=market_price&amp;orderType=asc&amp;index=0&amp;length=20" class="ui-list-nav">全部品牌</a>
						</li>
						<li class="ui-list-item" data-brandid="20" data-brandname="施舜">
							<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=market_price&amp;orderType=asc&amp;index=0&amp;length=20&amp;brandId=20" class="ui-list-nav">施舜</a>
						</li>
					</ul>
				</section>

				<div id="proListBox">
					<div class="stockList qk-pro-list">
						<ul class="small-block-grid-2">
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2962146" data-id="2962146">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FtvJcdIC1kb2lLFcOc_W5eNzJNk8?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 蝴蝶结绑带连衣裙 D703276</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥589.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2962145" data-id="2962145">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FqTQjlLs_izPXRIQkWdWxCXhC4zf?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 条纹连衣裙 D704206</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥619.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2962144" data-id="2962144">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FoxIDsioOMqRdchy3wceKZBRxNX8?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 星星纱抽象花色连衣裙 D704214</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥689.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2962143" data-id="2962143">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/Fns3b08tVmrWBWS941i2sPk82kAx?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 下摆开叉连衣裙 D704265</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥619.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2962142" data-id="2962142">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/Fv865T3F4NJ-dMR5FQCSUGjLtKfm?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 假两件百褶连衣裙 D704267</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥729.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2962141" data-id="2962141">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FlBeIJ58KoLbb4VS-leRgUij-Nkp?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 雪纺上衣 B703225</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥379.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2962140" data-id="2962140">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FggCFhPiM_Xn-bTiz_jz_2_80LDi?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 肌理纹针织短袖T恤 T704223</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥269.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2962139" data-id="2962139">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/Ftf0jOg5PN7gAJGQSprWgQPNGPwy?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 黑色阔腿八分裤 P703224</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥369.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2962138" data-id="2962138">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FuD3-ovmUSa6SetEazBSbSNrbG5M?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 名族风织带半裙 S704226</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥359.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2962137" data-id="2962137">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FsvTGaLitPp4lM-3SJ2wt5MI6t-s?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 蝴蝶领结短袖雪纺衬衫 B701108B</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥389.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2944384" data-id="2944384">
									<div class="p-img" style="background-image:url(?imageView2/1/h/400)">
									</div>

									<div class="p2_info">300元团购现金券</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥268.00</span></div>
											<div>
												<span class="tag-price"><span class="yen">¥</span>300.00</span>
											</div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2944039" data-id="2944039">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/Fr8u3fAOSDIMQCXD6zXQ2k9xdMaZ?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 腰间蝴蝶结装饰连衣裙 D704260</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥629.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2944038" data-id="2944038">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FkgWvy9NaDYRMrcybolwg6mgnn5w?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 蕾丝镂空衬衫 SH704254</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥449.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2941104" data-id="2941104">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/Frgrp-Pr_JVAZZU92FiMCFFCu0Hy?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 条纹眼睛刺绣连衣裙 D703257</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥619.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2941103" data-id="2941103">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/Fo72LOTzHKp5KPD4sEYJKrd3P3Ny?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 织带装饰小白裙 D703262</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥669.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2941102" data-id="2941102">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FitG6RPVZB4PM-nmRW9Hw6r6u1J8?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 印花连衣裙 D704204</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥669.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2941101" data-id="2941101">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FtysIpjDv9Tnrr-4Xu6X-qc0dOsg?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 棉麻几何连衣裙 D704212</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥619.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2941100" data-id="2941100">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FrBskf1-sGvAvgADWAyGpUg_8VsF?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 波点拼色衬衫 B703264</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥369.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2941099" data-id="2941099">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FiZi-_-1PMCdPaRqUhCnzHkbU2Gh?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 仿皮纹绑带上衣 B704207</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥399.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
							<li>
								<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId=2941098" data-id="2941098">
									<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/FmcXRo1D0q5gTRwzShPLubm2w8cT?imageView2/1/h/400)">
										<span class="p-tag">新品</span> </div>

									<div class="p2_info">2017新款 小碎花雪纺上衣 SH703261</div>
									<div class="ub ub-ac p2_flag">
										<div class="ub-f1" style="min-height: .37rem;">
											<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥379.00</span></div>
										</div>
										<!-- <div class="p2_cart"></div> -->
									</div>
								</a>
							</li>
						</ul>

					</div>
					<div id="loadingWrap">
						<div class="tc p20 c-8"><img src="https://qncdn.qiakr.com/loading32x32.gif" width="25"></div>
					</div>
				</div>

				<!-- /底部导航 -->
				<!-- <footer class="store_footer" id="storeFooter" >
  <ul class="wbox">
    <li class="wbox-1"><a href="contactSales.htm?storeId=191&salesId=&supplierId=8" data-suid="8" class="linkNeedLogin" id="goChat"><span class="newIcon"></span>联系服务顾问</a></li>
    <li>|</li>
    <li class="wbox-1"><a href="storeAllList.htm?supplierId=8">所有门店</a></li>
    <li>|</li>
    <li class="wbox-1"><a href="../customer.htm?suid=8&storeId=191&salesId=" data-suid="8" class="linkNeedLogin">个人中心</a></li>
  </ul>
</footer> -->
				<input type="hidden" name="footStoreId" value="191">
				<input type="hidden" name="footSalesId" value="">
				<input type="hidden" name="footSuid" value="8">
				<footer class="store_footer_new bde4-b foot_new_cart">
  <div class="ub ub-ac">
    <a data-id="home" class="ub-f1 ub ub-ver foot_new_sin home" href="http://[::1]/yunjuke/vmall.php/">
      <i class="iconfont"></i>
      <div class="">首页</div>
    </a>
    <a data-id="stock" class="ub-f1 ub ub-ver foot_new_sin stock" href="http://[::1]/yunjuke/vmall.php/goods/">
      <i class="iconfont"></i>
      <div class="">商品</div>
    </a>
    <a data-id="cart" class="ub-f1 ub ub-ver foot_new_sin cart" href="http://[::1]/yunjuke/vmall.php/user/user_shopping_cart">
      <i class="iconfont"></i>
      <div class="">购物车</div>
    </a>
    <a data-id="customer" class="ub-f1 ub ub-ver foot_new_sin cus" data-suid="8" href="http://[::1]/yunjuke/vmall.php/user/">
      <i class="iconfont"></i>
      <div class="">个人中心</div>
    </a>
  </div>
</footer>
					<!-- 联系服务顾问 弹窗 start -->
					<section class="chat_cover">
						<em class="chat_close"></em>
						<p class="chat_tit">请选择你需要咨询的方向</p>
						<a class="ub ub-ac chatJumpEvt chat_before_con" href="contactSales.htm?storeId=191&amp;salesId=&amp;supplierId=8">
							<div class="ub-img-bg chat_img_before"></div>
							<div class="ub-f1">
								<h3>售前咨询</h3>
								<p>咨询商品相关</p>
							</div>
						</a>
						<a class="ub ub-ac chatJumpEvt chat_after_con" href="getOrderListOfCustomerRecently.htm">
							<div class="ub-img-bg chat_img_after"></div>
							<div class="ub-f1">
								<h3>售后服务</h3>
								<p>咨询订单相关</p>
							</div>
						</a>
					</section>
					<div class="chat_mask"></div>
					<!-- 联系服务顾问 弹窗 end -->
					<script id="tempData" type="text/html">
						{{each list as e i}}
						<li>
							<a href="http://[::1]/yunjuke/vmall.php/goods/good_info?stockId={{e.stock.id}}" data-id="{{e.stock.id}}">
								{{if e.stock.productPicUrl}}
								<div class="p-img" style="background-image:url({{e.stock.productPicUrl}}?imageView2/1/h/400)">
									{{if e.productSupplier.tags && e.productSupplier.tags!="一元购"}}<span class="p-tag">{{e.productSupplier.tags}}</span>{{/if}}
								</div>
								{{else}}
								<div class="p-img" style="background-image:url(https://qncdn.qiakr.com/admin/placeholer_300x300.gif)">
									{{if e.productSupplier.tags && e.productSupplier.tags!="一元购"}}<span class="p-tag">{{e.productSupplier.tags}}</span>{{/if}}
								</div>
								{{/if}}
								<div class="p2_info">{{e.stock.productName}}</div>
								<div class="ub ub-ac p2_flag">
									<div class="ub-f1" style="min-height: .37rem;">
										{{if e.vipDiscount!=""}}
										<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥{{e.minSkuPriceVip}}</span><span class="sku-tag"><img src="http://static.qiakr.com/mall/stock_picon.png"></span></div>
										{{else}}
										<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price">¥{{e.minSkuPrice}}</span></div>
										{{/if}} {{if e.minSkuPrice!=e.stock.tagPrice}}
										<div>
											<span class="tag-price"><span class="yen">¥</span>{{e.stock.tagPrice}}</span>
										</div>
										{{/if}}
									</div>
								</div>
							</a>
						</li>
						{{/each}}
					</script>

					<!--S 搜索 -->
					<div class="searchBox stock mb10 fn-hide">
						<form action="getStockListForCustomer.htm" class="wbox">
							<div class="wbox-1 cont">
								<input type="search" class="search" name="fuzzyName" placeholder="搜索店内的商品">
								<input type="hidden" name="storeId" value="191">
								<input type="hidden" name="salesId" value="">
								<input type="hidden" name="orderName" value="off_time">
								<input type="hidden" name="orderType" value="desc">
								<input type="hidden" name="index" value="0">
								<input type="hidden" name="length" value="20">
								<button type="submit" class="s-btn"></button>
							</div>
							<button type="reset" class="s-cancel fn-hide">取消</button>
						</form>
					</div>
					<div class="searchCover fn-hide" style="z-index: 99999; height: 286px;">
						<ul class="history"></ul>
					</div>
					<!--E 搜索 -->
					<!--S 选择品类菜单 -->
					<div id="categoryListBox" style="display:none;">
						<div class="category-list-nav">
							<ul>
								<li class="ui-list-item">
									<a href="getStockListForCustomer.htm?storeId=&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=" class="ui-list-nav">全部商品</a>
								</li>
								<li class="ui-list-item">
									<a href="getStockListForCustomer.htm?storeId=&amp;tags=新品&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=" class="ui-list-nav">新品上市</a>
								</li>
								<li class="ui-list-item" id="navTJCX">
									<a href="getStockListForCustomer.htm?storeId=&amp;tags=特价&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=" class="ui-list-nav">特价促销</a>
								</li>
							</ul>
							<ul id="categoryItemsbox"></ul>
						</div>
						<div class="category-list-menu"></div>
					</div>
					<!--E 选择品类菜单 -->
					<div id="sidebarMenusBox" style="display: none;">
						<div class="sidebar-close">
							<a href="javascript:;" id="btnSidebarClose"><i class="iconfont"></i> 关闭</a>
						</div>
						<div class="sidebar-menus">
							<div class="menu-box" id="menu1Box">
								<ul class="sidebar-ul">

									<li class="sidebar-li" data-id="_">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=" class="sidebar-a">全部商品</a>
									</li>

									<li class="sidebar-li" data-id="_">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;tags=新品" class="sidebar-a">新品上市</a>
									</li>

									<li class="sidebar-li" data-id="_">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;tags=特价" class="sidebar-a">特价促销</a>
									</li>

									<li class="sidebar-li" data-id="brand_PP">
										<a href="javascript:;" class="sidebar-a">品牌</a>
									</li>

									<li class="sidebar-li" data-id="group_58">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;groupId=58" class="sidebar-a">连衣裙</a>
									</li>

									<li class="sidebar-li" data-id="group_59">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;groupId=59" class="sidebar-a">半裙</a>
									</li>

									<li class="sidebar-li" data-id="group_60">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;groupId=60" class="sidebar-a">上衣</a>
									</li>

									<li class="sidebar-li" data-id="group_62">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;groupId=62" class="sidebar-a">衬衫</a>
									</li>

									<li class="sidebar-li" data-id="group_63">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;groupId=63" class="sidebar-a">裤子</a>
									</li>

									<li class="sidebar-li" data-id="group_620">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;groupId=620" class="sidebar-a">外套</a>
									</li>

									<li class="sidebar-li" data-id="group_8387">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;groupId=8387" class="sidebar-a">丝巾</a>
									</li>

									<li class="sidebar-li" data-id="group_8672">
										<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;groupId=8672" class="sidebar-a">配饰</a>
									</li>

								</ul>
							</div>
							<div class="menu-box" id="menu2Box">
								<div id="m2ScrollView">

									<ul class="sidebar-ul">

										<li class="sidebar-li" data-id="brand_PP" data-cid="">
											<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;brandId=20" class="sidebar-a">施舜</a>
										</li>

									</ul>

								</div>
							</div>

						</div>
					</div>

					<script type="text/html" id="sidebarMenuTpl">
						{{if isMenu1}}
						<ul class="sidebar-ul">
							{{each data as item i}}
							<li class="sidebar-li" data-id="{{item.type}}_{{item.id}}">
								<a href="{{#item.link || 'javascript:;'}}" class="sidebar-a">{{item.text}}</a>
							</li>
							{{/each}}
						</ul>
						{{else}} {{each data as item2 j}} {{if item2.length}}
						<ul class="sidebar-ul">
							{{each item2 as item3 k}}
							<li class="sidebar-li" {{if item3.rootid}}data-id="{{item3.type}}_{{item3.rootid}}" {{/if}} data-cid="{{item3.id}}">
								<a href="{{#item3.link}}" class="sidebar-a">{{item3.text}}</a>
							</li>
							{{/each}}
						</ul>
						{{/if}} {{/each}} {{/if}}
					</script>

					<!--==== 模块模板 ====-->
					<!--S 搜索-->
					<script type="text/html" id="m_search" role="show">
						<div class="wx_mod" modid="1000" id="m1000">
							<div class="bd">
								<div class="v3_shop_bar">
									<div class="v3_shop_header mui-flex">
										<div class="category_menu cell fixed" id="categoryMenu">
											<i class="iconfont category_menu_icon">&#xe628;</i> <span class="category_menu_txt">分类</span>
										</div>
										<div class="mobile_search cell">
											<div class="m_search_wrap">
												<input type="text" id="doSearch" class="search_input" placeholder="搜索店内商品">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</script>
					<!--E 搜索-->

					<script>
						var PAGE_CONF = {};
						PAGE_CONF.categorys = [{
								"categoryFamily": {
									"familyName": "女装",
									"id": 11
								},
								"categoryVoList": [{
										"category": {
											"categoryPriority": "b",
											"familyId": 11,
											"id": 2453,
											"name": "半裙"
										},
										"id": 2453,
										"productCount": 25
									},
									{
										"category": {
											"categoryPriority": "b",
											"familyId": 11,
											"id": 59,
											"name": "半身裙"
										},
										"id": 59,
										"productCount": 64
									},
									{
										"category": {
											"categoryPriority": "b",
											"familyId": 11,
											"id": 2179,
											"name": "背心裙"
										},
										"id": 2179,
										"productCount": 1
									},
									{
										"category": {
											"categoryPriority": "c",
											"familyId": 11,
											"id": 1790,
											"name": "长袖连衣裙"
										},
										"id": 1790,
										"productCount": 1
									},
									{
										"category": {
											"categoryPriority": "d",
											"familyId": 11,
											"id": 1791,
											"name": "短袖连衣裙"
										},
										"id": 1791,
										"productCount": 2
									},
									{
										"category": {
											"categoryPriority": "d",
											"familyId": 11,
											"id": 65,
											"name": "吊带/背心"
										},
										"id": 65,
										"productCount": 4
									},
									{
										"category": {
											"categoryPriority": "l",
											"familyId": 11,
											"id": 61,
											"name": "蕾丝衫/雪纺衫"
										},
										"id": 61,
										"productCount": 5
									},
									{
										"category": {
											"categoryPriority": "l",
											"familyId": 11,
											"id": 38,
											"name": "连衣裙"
										},
										"id": 38,
										"productCount": 264
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 1472,
											"name": "女士七分裤"
										},
										"id": 1472,
										"productCount": 1
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 2394,
											"name": "女士长大衣"
										},
										"id": 2394,
										"productCount": 1
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 44,
											"name": "女士短外套"
										},
										"id": 44,
										"productCount": 3
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 1489,
											"name": "女士上衣"
										},
										"id": 1489,
										"productCount": 145
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 47,
											"name": "女士T恤"
										},
										"id": 47,
										"productCount": 3
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 1491,
											"name": "女士中裤"
										},
										"id": 1491,
										"productCount": 1
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 50,
											"name": "女士牛仔裤"
										},
										"id": 50,
										"productCount": 2
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 1492,
											"name": "女士长裤"
										},
										"id": 1492,
										"productCount": 9
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 52,
											"name": "女士休闲裤"
										},
										"id": 52,
										"productCount": 2
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 54,
											"name": "女士短裤"
										},
										"id": 54,
										"productCount": 3
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 1505,
											"name": "女士背带裤"
										},
										"id": 1505,
										"productCount": 1
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 55,
											"name": "女士风衣"
										},
										"id": 55,
										"productCount": 21
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 1518,
											"name": "女士长外套"
										},
										"id": 1518,
										"productCount": 2
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 57,
											"name": "女士衬衫"
										},
										"id": 57,
										"productCount": 8
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 1519,
											"name": "女士裤子"
										},
										"id": 1519,
										"productCount": 41
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 58,
											"name": "女士西装"
										},
										"id": 58,
										"productCount": 2
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 1683,
											"name": "女士外套"
										},
										"id": 1683,
										"productCount": 26
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 2005,
											"name": "女士呢子大衣"
										},
										"id": 2005,
										"productCount": 4
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 36,
											"name": "女士大衣"
										},
										"id": 36,
										"productCount": 1
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 348,
											"name": "女装套装"
										},
										"id": 348,
										"productCount": 1
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 2041,
											"name": "女士套头上衣"
										},
										"id": 2041,
										"productCount": 5
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 353,
											"name": "女士连体裤"
										},
										"id": 353,
										"productCount": 1
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 2068,
											"name": "女士毛呢外套"
										},
										"id": 2068,
										"productCount": 8
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 39,
											"name": "女士针织衫"
										},
										"id": 39,
										"productCount": 4
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 421,
											"name": "女士短裙"
										},
										"id": 421,
										"productCount": 10
									},
									{
										"category": {
											"categoryPriority": "n",
											"familyId": 11,
											"id": 42,
											"name": "女士打底衫"
										},
										"id": 42,
										"productCount": 2
									},
									{
										"category": {
											"categoryPriority": "q",
											"familyId": 11,
											"id": 1347,
											"name": "其他女装"
										},
										"id": 1347,
										"productCount": 3
									},
									{
										"category": {
											"categoryPriority": "s",
											"familyId": 11,
											"id": 1497,
											"name": "双面呢大衣"
										},
										"id": 1497,
										"productCount": 4
									},
									{
										"category": {
											"categoryPriority": "w",
											"familyId": 11,
											"id": 1792,
											"name": "无袖连衣裙"
										},
										"id": 1792,
										"productCount": 1
									}
								],
								"id": 11
							},
							{
								"categoryFamily": {
									"familyName": "其它",
									"id": 9
								},
								"categoryVoList": [{
									"category": {
										"categoryPriority": "q",
										"familyId": 9,
										"id": 9,
										"name": "其它"
									},
									"id": 9,
									"productCount": 2
								}],
								"id": 9
							},
							{
								"categoryFamily": {
									"familyName": "运动服饰",
									"id": 17
								},
								"categoryVoList": [{
									"category": {
										"categoryPriority": "y",
										"familyId": 17,
										"id": 197,
										"name": "运动夹克/风衣"
									},
									"id": 197,
									"productCount": 1
								}],
								"id": 17
							}
						];

						PAGE_CONF.groups = [{
								"firstLevel": [{
									"gmtCreate": 1461387315000,
									"groupId": 58,
									"groupLevel": 1,
									"groupName": "连衣裙",
									"groupPriority": "1461387315792",
									"productNum": 126,
									"productNumSet": [384771, 414720, 349204, 306455, 349202, 417567, 278042, 341805, 349229, 386871, 349232, 349234, 419903, 386873, 249662, 386872, 249667, 249666, 249665, 419904, 158030, 286024, 298570, 402262, 402263, 402261, 402259, 266847, 402269, 402267, 266842, 402265, 402278, 402279, 266854, 402277, 402274, 402275, 345453, 323437, 402283, 402280, 402281, 345463, 267127, 269683, 269695, 293754, 269700, 345477, 269702, 345473, 415114, 235148, 415113, 401812, 401810, 424338, 401811, 424339, 235157, 401808, 401809, 278942, 386719, 401820, 401818, 401819, 270503, 248234, 270504, 248238, 317876, 383669, 317877, 317879, 317875, 247227, 383678, 383673, 270521, 421563, 240833, 341703, 426692, 421573, 231623, 298947, 231627, 240842, 271821, 240846, 240845, 231628, 405206, 427478, 271824, 249046, 240852, 308179, 341725, 426207, 427484, 308184, 415706, 427482, 308186, 405208, 415704, 427480, 415705, 427481, 426212, 294119, 426210, 329443, 294115, 426209, 349421, 323310, 349419, 345589, 345591, 349431, 384766, 412665],
									"rootId": 0
								}]
							},
							{
								"firstLevel": [{
									"gmtCreate": 1461387323000,
									"groupId": 59,
									"groupLevel": 1,
									"groupName": "半裙",
									"groupPriority": "1461387323105",
									"productNum": 36,
									"productNumSet": [419911, 231616, 293767, 294094, 345486, 405194, 405195, 419915, 419912, 424340, 424341, 384785, 384784, 418384, 418385, 345564, 401817, 342117, 427494, 345574, 417568, 345570, 402273, 298925, 412653, 426218, 426219, 235181, 412663, 278070, 402292, 402293, 278076, 278078, 278073, 345594],
									"rootId": 0
								}]
							},
							{
								"firstLevel": [{
									"gmtCreate": 1461387329000,
									"groupId": 60,
									"groupLevel": 1,
									"groupName": "上衣",
									"groupPriority": "1461387329573",
									"productNum": 67,
									"productNumSet": [293762, 414721, 345484, 424335, 424332, 323343, 236175, 345481, 424330, 424329, 383636, 269719, 424337, 278045, 386716, 383640, 306458, 235171, 240802, 417569, 240811, 341549, 235178, 278057, 341674, 317874, 231611, 231614, 271801, 349240, 252220, 298948, 419910, 252226, 419909, 419907, 419905, 418382, 405199, 298574, 421579, 405192, 294100, 418002, 294098, 298578, 405201, 298589, 427485, 426214, 413799, 426215, 349415, 426213, 427489, 402286, 402284, 413804, 250728, 413803, 413801, 427497, 384759, 412660, 412658, 323314, 402288],
									"rootId": 0
								}]
							},
							{
								"firstLevel": [{
									"gmtCreate": 1461387807000,
									"groupId": 62,
									"groupLevel": 1,
									"groupName": "衬衫",
									"groupPriority": "1461387807933",
									"productNum": 7,
									"productNumSet": [401815, 405204, 426693, 402289, 424334, 402271, 401821],
									"rootId": 0
								}]
							},
							{
								"firstLevel": [{
									"gmtCreate": 1461387821000,
									"groupId": 63,
									"groupLevel": 1,
									"groupName": "裤子",
									"groupPriority": "1461898543308",
									"productNum": 37,
									"productNumSet": [278080, 386881, 386880, 271810, 386883, 419918, 250762, 349260, 417999, 349263, 421580, 298959, 417997, 424342, 345495, 298967, 383638, 294096, 349265, 418386, 323347, 298586, 383642, 413798, 427493, 342121, 349225, 306473, 240813, 402295, 267133, 402301, 414717, 402298, 421562, 384760, 402299],
									"rootId": 0
								}]
							},
							{
								"firstLevel": [{
									"gmtCreate": 1461898543000,
									"groupId": 620,
									"groupLevel": 1,
									"groupName": "外套",
									"groupPriority": "1461898543309",
									"productNum": 35,
									"productNumSet": [386884, 349455, 298952, 298955, 345109, 345108, 349268, 349207, 386454, 298576, 349456, 384787, 345106, 345117, 386718, 294105, 415707, 383643, 294107, 349466, 383649, 383651, 278060, 349417, 341544, 349428, 341552, 345596, 349436, 384764, 384761, 384763, 386875, 384762, 386874],
									"rootId": 0
								}]
							},
							{
								"firstLevel": [{
									"gmtCreate": 1474855067000,
									"groupId": 8387,
									"groupLevel": 1,
									"groupName": "丝巾",
									"groupPriority": "1474855067291",
									"productNum": 0,
									"productNumSet": [],
									"rootId": 0
								}]
							},
							{
								"firstLevel": [{
									"gmtCreate": 1476071443000,
									"groupId": 8672,
									"groupLevel": 1,
									"groupName": "配饰",
									"groupPriority": "1476071443099",
									"productNum": 0,
									"productNumSet": [],
									"rootId": 0
								}]
							}
						];

						PAGE_CONF.brands = [{
							"brandName": "施舜",
							"brandPriority": 0,
							"id": 20,
							"status": 0
						}];

						PAGE_CONF.storeInfo = {
							"businessHours": "9:00-22:00",
							"city": "广州市",
							"detail": "广州天河南一路42号之101房  联系电话：87516976",
							"district": "天河区",
							"endTime": 1506614400000,
							"entityPicture": "",
							"extCode": "",
							"gmtCreate": 1420041600000,
							"gmtUpdate": 1488008656000,
							"id": 191,
							"intro": "广州OBSESSION施舜女装品牌创立于一九九八年，主要经营时尚职业女性服饰，是一个集服装设计、生产、销售于一体的具有先进经营理念的年青品牌。“OBSESSION施舜”品牌主要采用天然棉、麻、真丝面料，剪裁得体，设计结合欧美时尚元素和中国本土文化，体现出中国现代女性的自信、优雅。",
							"latitude": 23.130804,
							"logo": "http://static.qiakr.com/FtR326cWZShNZ5LeXMg0b7WDcCZD",
							"longitude": 113.323456,
							"name": "施舜天河店",
							"open": 0,
							"phone": "87516976",
							"picture": "https://qncdn.qiakr.com/FiMfACRO5hV-VjX1Zt9T2AnwQraT",
							"province": "广东省"
						};

						PAGE_CONF.supplier = {
						"auth": 0,
						"bandingType": 1,
						"cashierDisable": 0,
						"chatActionDisable": 1,
						"companyName": "广州市天河区天河施舜服装店",
						"customerServiceType": 0,
						"defaultCommissionRate": 0.00,
						"deliveryStockType": 1,
						"displayType": 1,
						"distType": 0,
						"flashsaleOwnerType": 0,
						"flashsaleStoreLimit": 0,
						"freePostReachedFee": 500.00,
						"gmtCreate": 1421856000000,
						"gmtUpdate": 1463735107000,
						"hasProduct": 0,
						"id": 8,
						"membershipCardGain": 0,
						"orderActionConfirm": 1,
						"orderActionDisable": 0,
						"pickupDisplay": 0,
						"pickupStockType": 1,
						"pointPay": 1,
						"postFee": 9.00,
						"postFeeTemplate": 1,
						"prePay": 1,
						"productMemberLimitCountDisable": 1,
						"settlementPeriod": 2,
						"smsOrderAppointment": 0,
						"smsOrderPickupcode": 1,
						"step": 4,
						"stockAutoOffline": 1,
						"storeUploadDisable": 0,
						"supplierStockUpdateDisable": 0,
						"templateInit": true,
						"testMod": 0,
						"token": "b1e45ae06eb24a02b0330d0dd3d5bcd9",
						"tpAppId": 44,
						"useStoreStock": 0,
						"wechatAuth": 0,
						"writeoffCoupon": 3
						};

						});
					</script>
			</body>
</html><?php }
}
