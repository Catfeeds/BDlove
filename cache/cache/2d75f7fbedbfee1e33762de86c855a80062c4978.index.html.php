<?php
/* Smarty version 3.1.29, created on 2017-04-24 10:59:26
  from "E:\www\yunjuke\application\vmall\views\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd6a0ea761b5_76708514',
  'file_dependency' => 
  array (
    '2d75f7fbedbfee1e33762de86c855a80062c4978' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\index.html',
      1 => 1492685734,
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
    'db8a0f670d30921eb6a1e2ab987385e240d789bb' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\lib\\Flink.html',
      1 => 1492685734,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_58fd6a0ea761b5_76708514 ($_smarty_tpl) {
?>
<!DOCTYPE html style="opacity: 1; font-size: 109.375px;">
<html>

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
			<title>聚客联盟店</title>
			<style type="text/css">
				.service-tip-box {
					margin-top: .05rem;
					display: -webkit-box;
					-webkit-box-orient: vertical;
					-webkit-line-clamp: 2;
					overflow: hidden;
				}
				
				.store-name-box {
					font-size: .14rem;
					line-height: 1.2em;
					overflow: hidden;
					font-weight: 400;
				}
				
				.shop_mod_html img {
					max-width: 100%;
				}
			</style>
			<link href="http://[::1]/yunjuke/application/vmall/views/css/home.css" rel="stylesheet" type="text/css">
			<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/swiper-3.0.7.min.js"></script>
			<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/qrcode.min.js"></script>
			<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/iscroll-lite.min.js"></script>
			<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
	</head>

	<body>
		<!-- 获取相关信息 -->
		<input type="hidden" id="from" value="">
		<input type="hidden" id="suid" value="8">
		<input type="hidden" id="salesName" value="">

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
		<div style="visibility: visible;">
			<div id="shopview">
				<div class="wx_mod bde4-b" modid="1012" id="m1012" style="height: .64rem;">
					<div class="bd" style="display: block;">
						<div class="ui-table" style="table-layout: fixed;">
							<div class="cell" style="width: .64rem;">
								<img class="shop-logo" src="http://static.qiakr.com/FtR326cWZShNZ5LeXMg0b7WDcCZD?imageView2/1/w/88/h/88" style="width: .44rem;margin: .1rem;">
							</div>
							<div class="cell" style="width: 2.06rem;">
								<h2 class="store-name-box">施舜天河店</h2>
							</div>
							<div class="cell" style="width: .46rem;">
								<div class="info-r" id="attention" style="text-align: center;">
									<i class="iconfont shop-qrcode" style="font-size: .24rem;"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wx_mod m1001-58a1" modtitle="图片轮播" modid="1001" id="m1001-58a1">
					<div class="bd">
						<!-- Swiper -->
						<div class="swiper-container" style="height: 3.2rem;">
							<div class="swiper-wrapper">

								<a href="../store.htm?suid=8" class="swiper-slide">
									<div class="shop_slider_img" style="height:3.2rem; background-image:url(https://qncdn.qiakr.com/FvUVmKyeH6IRtp3Z2269Mx0HzkU4)"></div>
								</a>

							</div>
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				<!-- /图片轮播 -->
				<div class="wx_mod" modtitle="通栏广告" modid="1002" id="m1002-2967">
					<div class="bd">
						<div class="shop_mod_pic" data-lazyload="true">
							<a class="url" href="http://mall.qiakr.com/mall/getStockInfoForCustomer.htm?stockId=2944386">
								<img alt="图片" class="pp_init_img" src="https://qncdn.qiakr.com/FtO8t09ifN_WWK4eg6XQY4gSOwN8?imageView2/2/w/640">
							</a>
						</div>
					</div>
				</div>
				<!-- /通栏广告 -->
				<div class="wx_mod" modtitle="商品推荐" modid="1004" id="m1004-7ed3">
					<div class="bd m_recommend_bdm1004-7ed3 mt10" id="m_recommend_bdm1004-7ed3">

						<h2 class="shop_mod_tit bde4-b">2017夏装上市 <a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=">更多<i class="iconfont"></i></a></h2>
						<div class="wx_itemlist" data-lazyload="true">
							<div class="shop_mod_pic_1">

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2926034" style="background-image:url(https://qncdn.qiakr.com/FljJwycIp-xzaEAXPrAniyF2Hihj?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2926034">2017新款 蝴蝶结短袖 雪纺上衣 B703204</a>
									</p>
									<p class="prices"><strong><em>￥339.00</em><del>¥339.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2926033" style="background-image:url(https://qncdn.qiakr.com/FpMgyJVsC8-LCsE-d_FTuTSc99d5?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2926033">2017新款 香芋紫荷叶边雪纺上衣 B703206</a>
									</p>
									<p class="prices"><strong><em>￥369.00</em><del>¥369.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2926028" style="background-image:url(https://qncdn.qiakr.com/FqjbmrONzhZ_Ck9EvTivtGoPLISX?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2926028">2017新款 小碎花流苏绑带连衣裙 D703212</a>
									</p>
									<p class="prices"><strong><em>￥629.00</em><del>¥629.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2926026" style="background-image:url(https://qncdn.qiakr.com/Fl0qpBETQeKY8d-R9Rlunya5QYdi?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2926026">2017新款 碎花雪纺半裙 S704211</a>
									</p>
									<p class="prices"><strong><em>￥399.00</em><del>¥399.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2910343" style="background-image:url(https://qncdn.qiakr.com/Ft-VB4p24kWk0MV29bqXWV8dhrt0?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2910343">2017新款 绣球花印花连衣裙 D703266</a>
									</p>
									<p class="prices"><strong><em>￥589.00</em><del>¥589.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2910342" style="background-image:url(https://qncdn.qiakr.com/FrDI_G2Ye-abCKK6XvLsL7CgAVs7?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2910342">2017新款 黑色网纱提花连衣裙 D703259</a>
									</p>
									<p class="prices"><strong><em>￥589.00</em><del>¥589.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2910340" style="background-image:url(https://qncdn.qiakr.com/FmpQPXkFYCrMK83aqXbRau_Qmnlw?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2910340">2017新款 柔软阔腿八分裤 P702254</a>
									</p>
									<p class="prices"><strong><em>￥449.00</em><del>¥449.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2861825" style="background-image:url(https://qncdn.qiakr.com/Fi1g_BEqBisy4PjlS7OIpHdWhxNt?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2861825">2017新款 针织衫 SW702208</a>
									</p>
									<p class="prices"><strong><em>￥279.00</em><del>¥279.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2897307" style="background-image:url(https://qncdn.qiakr.com/Fj2oKhL5itpnnNU9lu7Fv85xMV5c?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2897307">2017新款 网纱绣花连衣裙 D701194</a>
									</p>
									<p class="prices"><strong><em>￥689.00</em><del>¥689.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2897305" style="background-image:url(https://qncdn.qiakr.com/FsVyXBxCZU9SlTeIDiEX7S1pCsAD?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2897305">2017新款 针织打底衫 SW702209</a>
									</p>
									<p class="prices"><strong><em>￥229.00</em><del>¥229.00</del></strong>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="wx_mod" modtitle="商品推荐" modid="1004" id="m1004-fc8f">
					<div class="bd m_recommend_bdm1004-fc8f mt10" id="m_recommend_bdm1004-fc8f">

						<div class="wx_itemlist" data-lazyload="true">
							<div class="shop_mod_pic_1">

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2926031" style="background-image:url(https://qncdn.qiakr.com/FgFiI398Ru9k3NdOnCAfm2iiamsb?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2926031">2017新款 镂空袖拼接白衬衫 SH702260</a>
									</p>
									<p class="prices"><strong><em>￥369.00</em><del>¥369.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2926024" style="background-image:url(https://qncdn.qiakr.com/Fs_UaJ5K46_zqbsz6_VA947EaGlD?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2926024">2017新款 珍珠装饰八分裤 P702252</a>
									</p>
									<p class="prices"><strong><em>￥389.00</em><del>¥389.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2926032" style="background-image:url(https://qncdn.qiakr.com/Fphn9DhArHZ0vOqOgYP93DQQLazF?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2926032">2017新款 蕾丝上衣 B703252</a>
									</p>
									<p class="prices"><strong><em>￥429.00</em><del>¥429.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2926025" style="background-image:url(https://qncdn.qiakr.com/Fn0vs57VZ7OMn3JM8Re93Z_u7Ciw?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2926025">2017新款 镂空蕾丝半裙 S703253</a>
									</p>
									<p class="prices"><strong><em>￥369.00</em><del>¥369.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2941103" style="background-image:url(https://qncdn.qiakr.com/Fo72LOTzHKp5KPD4sEYJKrd3P3Ny?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2941103">2017新款 织带装饰小白裙 D703262</a>
									</p>
									<p class="prices"><strong><em>￥669.00</em><del>¥669.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2941101" style="background-image:url(https://qncdn.qiakr.com/FtysIpjDv9Tnrr-4Xu6X-qc0dOsg?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2941101">2017新款 棉麻几何连衣裙 D704212</a>
									</p>
									<p class="prices"><strong><em>￥619.00</em><del>¥619.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2941104" style="background-image:url(https://qncdn.qiakr.com/Frgrp-Pr_JVAZZU92FiMCFFCu0Hy?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2941104">2017新款 条纹眼睛刺绣连衣裙 D703257</a>
									</p>
									<p class="prices"><strong><em>￥619.00</em><del>¥619.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2941102" style="background-image:url(https://qncdn.qiakr.com/FitG6RPVZB4PM-nmRW9Hw6r6u1J8?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2941102">2017新款 印花连衣裙 D704204</a>
									</p>
									<p class="prices"><strong><em>￥669.00</em><del>¥669.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2941100" style="background-image:url(https://qncdn.qiakr.com/FrBskf1-sGvAvgADWAyGpUg_8VsF?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2941100">2017新款 波点拼色衬衫 B703264</a>
									</p>
									<p class="prices"><strong><em>￥369.00</em><del>¥369.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2941099" style="background-image:url(https://qncdn.qiakr.com/FiZi-_-1PMCdPaRqUhCnzHkbU2Gh?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2941099">2017新款 仿皮纹绑带上衣 B704207</a>
									</p>
									<p class="prices"><strong><em>￥399.00</em><del>¥399.00</del></strong>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="wx_mod" modtitle="商品推荐" modid="1004" id="m1004-55c9">
					<div class="bd m_recommend_bdm1004-55c9 mt10" id="m_recommend_bdm1004-55c9">

						<div class="wx_itemlist" data-lazyload="true">
							<div class="shop_mod_pic_1">

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2941098" style="background-image:url(https://qncdn.qiakr.com/FmcXRo1D0q5gTRwzShPLubm2w8cT?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2941098">2017新款 小碎花雪纺上衣 SH703261</a>
									</p>
									<p class="prices"><strong><em>￥379.00</em><del>¥379.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2941097" style="background-image:url(https://qncdn.qiakr.com/FtxaziI_Qxe0rnArKkHIHHOVLPyk?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2941097">2017新款 印花网纱半裙 S703275</a>
									</p>
									<p class="prices"><strong><em>￥379.00</em><del>¥379.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2941096" style="background-image:url(https://qncdn.qiakr.com/Fln8gUT7TpQ-8xMlh5R1hoYsehBB?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2941096">2017新款 灰色网纱半裙 S704268</a>
									</p>
									<p class="prices"><strong><em>￥399.00</em><del>¥399.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2944039" style="background-image:url(https://qncdn.qiakr.com/Fr8u3fAOSDIMQCXD6zXQ2k9xdMaZ?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2944039">2017新款 腰间蝴蝶结装饰连衣裙 D704260</a>
									</p>
									<p class="prices"><strong><em>￥629.00</em><del>¥629.00</del></strong>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="wx_mod" modtitle="商品推荐" modid="1004" id="m1004-db21">
					<div class="bd m_recommend_bdm1004-db21 mt10" id="m_recommend_bdm1004-db21">

						<div class="wx_itemlist" data-lazyload="true">
							<div class="shop_mod_pic_1">

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2824310" style="background-image:url(https://qncdn.qiakr.com/FlmN6otYij3NM4YdPClrZp9xfFcm?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2824310">2017新款 木耳边雪纺上衣 SH701142</a>
									</p>
									<p class="prices"><strong><em>￥429.00</em><del>¥429.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2824309" style="background-image:url(https://qncdn.qiakr.com/Fr5Et4YLtXHFeYRQzm0WlXDRtzyL?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2824309">2017新款 枣红色半裙 S701134</a>
									</p>
									<p class="prices"><strong><em>￥379.00</em><del>¥379.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2824311" style="background-image:url(https://qncdn.qiakr.com/Flf5mSr1OQCTZFpj7OAXeh5SZQeo?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2824311">2017新款 上衣 B701188</a>
									</p>
									<p class="prices"><strong><em>￥399.00</em><del>¥399.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2740643" style="background-image:url(https://qncdn.qiakr.com/FrOTD8DDPyNHsuCuvje0dzIUCyPi?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2740643">2017新款 A字半身裙 S701149</a>
									</p>
									<p class="prices"><strong><em>￥349.00</em><del>¥349.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2740644" style="background-image:url(https://qncdn.qiakr.com/Fhv5KrMV8SbwRriqZB3KIQp-rqqG?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2740644">2017新款 蕾丝上衣 B701143</a>
									</p>
									<p class="prices"><strong><em>￥379.00</em><del>¥379.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2824312" style="background-image:url(https://qncdn.qiakr.com/FvfhaQl7OSTbcO0os40yZ8d8OwvK?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2824312">2017新款 半身裙 S702211</a>
									</p>
									<p class="prices"><strong><em>￥359.00</em><del>¥359.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2835138" style="background-image:url(https://qncdn.qiakr.com/Fh6tFn0TMk90spvE8UPrX7xu1hRK?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2835138">2017新款 金属扣连衣裙 D702203</a>
									</p>
									<p class="prices"><strong><em>￥619.00</em><del>¥619.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2835137" style="background-image:url(https://qncdn.qiakr.com/FoJ0LOsJIY8Gf_nzPRIRGSr6_Wu0?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2835137">2017新款 两件套上衣 B701135</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2831401" style="background-image:url(https://qncdn.qiakr.com/FpL9x_OWtAQg6vPbB1zBcldodfLF?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2831401">2017新款 绑带针织衫 SW701121</a>
									</p>
									<p class="prices"><strong><em>￥269.00</em><del>¥269.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2837829" style="background-image:url(https://qncdn.qiakr.com/Fld9gWk2X7y3H75v98Tdn1oS2oPM?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2837829">2017新款 香芋紫连衣裙 D701187</a>
									</p>
									<p class="prices"><strong><em>￥669.00</em><del>¥669.00</del></strong>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="wx_mod" modtitle="商品推荐" modid="1004" id="m1004-a93b">
					<div class="bd m_recommend_bdm1004-a93b mt10" id="m_recommend_bdm1004-a93b">

						<div class="wx_itemlist" data-lazyload="true">
							<div class="shop_mod_pic_1">

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721173" style="background-image:url(https://qncdn.qiakr.com/Fmxb-D20iebb2HRizF_p1eZpIY_B?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721173">2017新款 连衣裙 D701123</a>
									</p>
									<p class="prices"><strong><em>￥639.00</em><del>¥639.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721172" style="background-image:url(https://qncdn.qiakr.com/FoH9Tj4tw2kUqz3az1uw81L-2aN3?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721172">2017新款 连衣裙 D701125</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2740637" style="background-image:url(https://qncdn.qiakr.com/FpQY3I9irZN4j5d4qVqJdo06Syrg?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2740637">2017新款 运动风连衣裙 D701178</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721161" style="background-image:url(https://qncdn.qiakr.com/Fp5d2ELFhyXcnBlytVO014mLJ1Vx?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721161">2017新款 连衣裙 D701131</a>
									</p>
									<p class="prices"><strong><em>￥589.00</em><del>¥589.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721157" style="background-image:url(https://qncdn.qiakr.com/Fomo5ml0KSFde7XxHbpUp9ElDOzs?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721157">2017新款 大V背带连衣裙 D701126</a>
									</p>
									<p class="prices"><strong><em>￥569.00</em><del>¥569.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2719563" style="background-image:url(https://qncdn.qiakr.com/FkMkLw2yDvar1CpS7ALgjmsDqsl8?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2719563">2017新款 大蝴蝶结衬衫 SH701155</a>
									</p>
									<p class="prices"><strong><em>￥459.00</em><del>¥459.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721154" style="background-image:url(https://qncdn.qiakr.com/Fu1UlQuHvoSl3iVHRQkR2wahM9N1?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721154">2017新款 柔软灰色上衣 B701175</a>
									</p>
									<p class="prices"><strong><em>￥399.00</em><del>¥399.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721153" style="background-image:url(https://qncdn.qiakr.com/FveQRILndI6LG8IJf8844Gad75jN?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721153">2017新款 衬衫 SH701150</a>
									</p>
									<p class="prices"><strong><em>￥419.00</em><del>¥419.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2740638" style="background-image:url(https://qncdn.qiakr.com/Fq3e4jy21Do5reGm0l0-Erihbyil?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2740638">2017新款 可拆卸系带蝴蝶结衬衫 SH701127</a>
									</p>
									<p class="prices"><strong><em>￥429.00</em><del>¥429.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2824308" style="background-image:url(https://qncdn.qiakr.com/FmTnlC9uWOIuJAAy9XWzRDecfhuu?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2824308">2017新款 花朵连衣裙 D701156</a>
									</p>
									<p class="prices"><strong><em>￥689.00</em><del>¥689.00</del></strong>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="wx_mod" modtitle="商品推荐" modid="1004" id="m1004-7988">
					<div class="bd m_recommend_bdm1004-7988 mt10" id="m_recommend_bdm1004-7988">

						<div class="wx_itemlist" data-lazyload="true">
							<div class="shop_mod_pic_1">

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721168" style="background-image:url(https://qncdn.qiakr.com/FpgoJ4NhBOLNM0Go7BMcC__Ny2F-?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721168">2017新款 连衣裙 D701121</a>
									</p>
									<p class="prices"><strong><em>￥639.00</em><del>¥639.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2719566" style="background-image:url(https://qncdn.qiakr.com/FkSq3oVQhSeLFyyD7U4kVU1VzYoY?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2719566">2017新款 连衣裙 D701104</a>
									</p>
									<p class="prices"><strong><em>￥629.00</em><del>¥629.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2719573" style="background-image:url(https://qncdn.qiakr.com/Fnhic29nBGTIP_dlcUbLO-Rrtm50?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2719573">2017新款 连衣裙 D701109</a>
									</p>
									<p class="prices"><strong><em>￥689.00</em><del>¥689.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2740636" style="background-image:url(https://qncdn.qiakr.com/FrXxR7Hp-8hUkodTA5ES6ww1F00R?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2740636">2017新款 节日红连衣裙 D701138</a>
									</p>
									<p class="prices"><strong><em>￥669.00</em><del>¥669.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721158" style="background-image:url(https://qncdn.qiakr.com/FjIDife9Dw8dF4O2Ys10TLe-RceZ?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721158">2017新款 背心裙 D701179</a>
									</p>
									<p class="prices"><strong><em>￥619.00</em><del>¥619.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721160" style="background-image:url(https://qncdn.qiakr.com/FvEDMl_l2qCXC5KcAKTYkWWNOF3G?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721160">2017新款 连衣裙 D701137</a>
									</p>
									<p class="prices"><strong><em>￥659.00</em><del>¥659.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721170" style="background-image:url(https://qncdn.qiakr.com/FjKyNeU9oO_Qvlr0nKyCHIPQa_5D?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721170">2017新款 连衣裙 D701169</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721171" style="background-image:url(https://qncdn.qiakr.com/Fl7BO4z0a2GHeIZ3IigH7mqC4oI-?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721171">2017新款 背带裙 D701154</a>
									</p>
									<p class="prices"><strong><em>￥539.00</em><del>¥539.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721167" style="background-image:url(https://qncdn.qiakr.com/FiWY5qkb3lYVZli0PeiPP19qdPNj?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721167">2017新款 连衣裙 D701199</a>
									</p>
									<p class="prices"><strong><em>￥699.00</em><del>¥699.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2719571" style="background-image:url(https://qncdn.qiakr.com/Ft4qvQMsh8TwI-Q1Ix77-71dYaOZ?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2719571">2017新款 连衣裙 D701117</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="wx_mod" modtitle="商品推荐" modid="1004" id="m1004-50db">
					<div class="bd m_recommend_bdm1004-50db mt10" id="m_recommend_bdm1004-50db">

						<div class="wx_itemlist" data-lazyload="true">
							<div class="shop_mod_pic_1">

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721155" style="background-image:url(https://qncdn.qiakr.com/FsEi5U_0i15JtiH12MCLvDUXs8SR?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721155">2017新款 蕾丝拼接上衣 B701174</a>
									</p>
									<p class="prices"><strong><em>￥459.00</em><del>¥459.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721150" style="background-image:url(https://qncdn.qiakr.com/Fq6y4XAILzvUARF0l7g_44j6N5dM?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721150">2017新款 七分阔腿裤 P701130</a>
									</p>
									<p class="prices"><strong><em>￥389.00</em><del>¥389.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721166" style="background-image:url(https://qncdn.qiakr.com/Fnv4YGBbrZo1yKnHiJsJEK0YkYqE?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721166">2017新款 衬衫 SH701152</a>
									</p>
									<p class="prices"><strong><em>￥399.00</em><del>¥399.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721165" style="background-image:url(https://qncdn.qiakr.com/Fjekf5njuJi1Hfzh9ekWOifvdECI?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721165">2017新款 半身裙 S701140</a>
									</p>
									<p class="prices"><strong><em>￥319.00</em><del>¥319.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2740639" style="background-image:url(https://qncdn.qiakr.com/FnRXYbJDgT2Ahm0fm8qq_awGgTFh?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2740639">2017新款 波点雪纺衬衫 SH701180</a>
									</p>
									<p class="prices"><strong><em>￥379.00</em><del>¥379.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2740642" style="background-image:url(https://qncdn.qiakr.com/FniZKoHwVdQL1p-XECalyAahpWiK?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2740642">2017新款 橘红色A字半身裙 S701184</a>
									</p>
									<p class="prices"><strong><em>￥369.00</em><del>¥369.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2719568" style="background-image:url(https://qncdn.qiakr.com/Fki1sDxMUn3YIYoSaE2KuKtAap2G?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2719568">2017新款 蝴蝶结衬衫 B701108</a>
									</p>
									<p class="prices"><strong><em>￥389.00</em><del>¥389.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721152" style="background-image:url(https://qncdn.qiakr.com/FoqhU4mORqZRSPCQJq07DcDYbEoK?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721152">2017新款 半身裙 S701133</a>
									</p>
									<p class="prices"><strong><em>￥339.00</em><del>¥339.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721148" style="background-image:url(https://qncdn.qiakr.com/FmBIwJsVYYIGj79gcjUTO96uZTjd?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721148">2017新款 连体裤 P701185</a>
									</p>
									<p class="prices"><strong><em>￥469.00</em><del>¥469.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721147" style="background-image:url(https://qncdn.qiakr.com/FkJWbEPRrlDP5YRsNMwV7epDLTbt?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721147">2017新款 裤子 P701141</a>
									</p>
									<p class="prices"><strong><em>￥449.00</em><del>¥449.00</del></strong>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="wx_mod" modtitle="商品推荐" modid="1004" id="m1004-3508">
					<div class="bd m_recommend_bdm1004-3508 mt10" id="m_recommend_bdm1004-3508">

						<div class="wx_itemlist" data-lazyload="true">
							<div class="shop_mod_pic_1">

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2719572" style="background-image:url(https://qncdn.qiakr.com/FuimHwkLwffco37_IHOgSPROTMXH?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2719572">2017新款 连衣裙 D701110</a>
									</p>
									<p class="prices"><strong><em>￥629.00</em><del>¥629.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2719570" style="background-image:url(https://qncdn.qiakr.com/FiP5UO8A-jHStcF_dsddGZR26btZ?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2719570">2017新款 连衣裙 D701160</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721169" style="background-image:url(https://qncdn.qiakr.com/FrswMG12QJDsZJokMgyAd55_2iL4?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721169">2017新款 连衣裙 D701115</a>
									</p>
									<p class="prices"><strong><em>￥589.00</em><del>¥589.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721164" style="background-image:url(https://qncdn.qiakr.com/Fkg5erAuGQwROEXUE3MnkUI04M5A?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721164">2017新款 连衣裙 D701114</a>
									</p>
									<p class="prices"><strong><em>￥629.00</em><del>¥629.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721163" style="background-image:url(https://qncdn.qiakr.com/FrHl_kNvP0PVBkovk6P_IwePqj_I?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721163">2017新款 连衣裙 D701124</a>
									</p>
									<p class="prices"><strong><em>￥679.00</em><del>¥679.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721162" style="background-image:url(https://qncdn.qiakr.com/FhWJQ43KAPMHd2eIMbl0rrZNQzEz?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721162">2017新款 连衣裙 D701128</a>
									</p>
									<p class="prices"><strong><em>￥589.00</em><del>¥589.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721159" style="background-image:url(https://qncdn.qiakr.com/FviYxkDtySJBpYrLi0PmYv7CAVcH?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721159">2017新款 连衣裙 D701157</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2721151" style="background-image:url(https://qncdn.qiakr.com/FkCff7I66f6L2XXY8jatiSk1wDQ2?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2721151">2017新款 半身裙 S701181</a>
									</p>
									<p class="prices"><strong><em>￥399.00</em><del>¥399.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2719569" style="background-image:url(https://qncdn.qiakr.com/FqsahPrZcWcst_KflJq46nZvFwTF?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2719569">2017新款 连衣裙 D701161</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2719565" style="background-image:url(https://qncdn.qiakr.com/FsjQ1ZiyzeC8on1L8gp8YD1wtdWX?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2719565">2017新款 连衣裙 D701113</a>
									</p>
									<p class="prices"><strong><em>￥589.00</em><del>¥589.00</del></strong>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="wx_mod" modtitle="商品推荐" modid="1004" id="m1004-ef87">
					<div class="bd m_recommend_bdm1004-ef87 mt10" id="m_recommend_bdm1004-ef87">

						<div class="wx_itemlist" data-lazyload="true">
							<div class="shop_mod_pic_1">

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2840902" style="background-image:url(https://qncdn.qiakr.com/Fq27iFK4plrLUmBloDVsaJFDMv3O?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2840902">2017新款 连衣裙 D702251</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2840901" style="background-image:url(https://qncdn.qiakr.com/Fhp0Oj3C1o_vDLj7ZKNfUnTET1u4?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2840901">2017新款 背心连衣裙 D702101</a>
									</p>
									<p class="prices"><strong><em>￥569.00</em><del>¥569.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2840900" style="background-image:url(https://qncdn.qiakr.com/FgLUdnfpEIYydEV1vqCUtEVz3dPX?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2840900">2017新款 蕾丝连衣裙 D701144</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2840899" style="background-image:url(https://qncdn.qiakr.com/FhdbZHKEpHYfEburc15ysMwp-MhA?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2840899">2017新款 橘色风衣 C701190</a>
									</p>
									<p class="prices"><strong><em>￥799.00</em><del>¥799.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2858317" style="background-image:url(https://qncdn.qiakr.com/Fvgo_c6Y56AkRHfxk2IUrigFGpEK?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2858317">2017新款 雪纺连衣裙 D702107</a>
									</p>
									<p class="prices"><strong><em>￥669.00</em><del>¥669.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2858316" style="background-image:url(https://qncdn.qiakr.com/FjrizPciwtPjWxOxFYNu-W7mNZ7F?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2858316">2017新款 不规则几何半裙 S701148</a>
									</p>
									<p class="prices"><strong><em>￥419.00</em><del>¥419.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2858315" style="background-image:url(https://qncdn.qiakr.com/FkshsbBM-m1BzcgwluU-ETTwNJPA?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2858315">2017新款 后背拼接蕾丝上衣 B702209</a>
									</p>
									<p class="prices"><strong><em>￥399.00</em><del>¥399.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2831405" style="background-image:url(https://qncdn.qiakr.com/Frxo4PIudqVJCal1lv4v48bi6vq8?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2831405">2017新款 白色阔腿长裤 P701151</a>
									</p>
									<p class="prices"><strong><em>￥439.00</em><del>¥439.00</del></strong>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="wx_mod" modtitle="商品推荐" modid="1004" id="m1004-a203">
					<div class="bd m_recommend_bdm1004-a203 mt10" id="m_recommend_bdm1004-a203">

						<div class="wx_itemlist" data-lazyload="true">
							<div class="shop_mod_pic_1">

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2865379" style="background-image:url(https://qncdn.qiakr.com/FkjB0WSRu19eMCZtPuItGZuGYaoZ?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2865379">2017新款 衬衫 SH701197</a>
									</p>
									<p class="prices"><strong><em>￥379.00</em><del>¥379.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2865376" style="background-image:url(https://qncdn.qiakr.com/FhKPqxg5bwlM9me1GhdHZ_KNNk1I?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2865376">2017新款 短裤 P702106</a>
									</p>
									<p class="prices"><strong><em>￥369.00</em><del>¥369.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2865378" style="background-image:url(https://qncdn.qiakr.com/FvLuWHlMKcA9dDd2828P3MSVgp40?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2865378">2017新款 半裙 S701196</a>
									</p>
									<p class="prices"><strong><em>￥349.00</em><del>¥349.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2865377" style="background-image:url(https://qncdn.qiakr.com/Fp5oUisH4fZBuCzVQU2kfrYdHRkz?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2865377">2017新款 郁金香花朵半裙 S702204</a>
									</p>
									<p class="prices"><strong><em>￥399.00</em><del>¥399.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2897308" style="background-image:url(https://qncdn.qiakr.com/Fl8_fVUaHRu9wi7TRGsNj9P834Ue?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2897308">2017新款 豆沙色背心连衣裙 D702105</a>
									</p>
									<p class="prices"><strong><em>￥599.00</em><del>¥599.00</del></strong>
									</p>
								</div>

								<div class="hproduct">
									<p class="cover">

										<span class="p-tags">新品</span>

										<a href="getStockInfoForCustomer.htm?stockId=2897302" style="background-image:url(https://qncdn.qiakr.com/FpDmlLH1lpbTDoxojqQfGn7aFwiD?imageView2/1/w/300/h/300)"></a>
									</p>
									<p class="fn">
										<a href="getStockInfoForCustomer.htm?stockId=2897302">2017新款 豆沙色半裙 S701195</a>
									</p>
									<p class="prices"><strong><em>￥429.00</em><del>¥429.00</del></strong>
									</p>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="wx_mod" modtitle="自定义代码" modid="1008" id="m1008-3ce9">
					<div class="bd">
						<div class="shop_mod_html">
							<a href="http://www.qiakr.com/mall/getSpecialPromotion.htm?id=424&amp;suid=8"><img src="http://static.qiakr.com/Fhpdjy17E2OkrfnE923XHE7x1ihj" border="0"></a>
						</div>
					</div>
				</div>
				<div class="wx_mod m1001-38d9" modtitle="图片轮播" modid="1001" id="m1001-38d9">
					<div class="bd">
						<!-- Swiper -->
						<div class="swiper-container" style="height: 1.6rem;">
							<div class="swiper-wrapper">

								<a href="../store.htm?suid=8" class="swiper-slide">
									<div class="shop_slider_img" style="height:1.6rem; background-image:url(http://static.qiakr.com/FllWDNnMxwJGbiydW7Uj7OYKXWof)"></div>
								</a>

							</div>
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				<!-- /图片轮播 -->
				<div id="listLoading" class="list-loading-box c-8 tc pt10 pb10" style="display: block;">
					<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=" style="display:block;">查看所有商品</a>
				</div>
				<div class="mod_footer" id="common_footer">
					<div id="footer_logo" class="mod_footer_logo">
						<a href="javascript:;">
							<span class="mod_logo"></span>
						</a>
					</div>
				</div>
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
			<div class="searchCover fn-hide" style="height: 898px;">
				<ul class="history"></ul>
			</div>
			<!--E 搜索 -->

			<!--S 选择品类菜单 -->
			<div id="categoryListBox" style="display:none;">
				<div class="category-list-nav">
					<ul>
						<li class="ui-list-item">
							<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=" class="ui-list-nav">全部商品</a>
						</li>
						<li class="ui-list-item">
							<a href="getStockListForCustomer.htm?storeId=191&amp;tags=新品&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=" class="ui-list-nav">新品上市</a>
						</li>
						<li class="ui-list-item" id="navTJCX">
							<a href="getStockListForCustomer.htm?storeId=191&amp;tags=特价&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=" class="ui-list-nav">特价促销</a>
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
									<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;brandId=613" class="sidebar-a">22ND</a>
								</li>

								<li class="sidebar-li" data-id="brand_PP" data-cid="">
									<a href="getStockListForCustomer.htm?storeId=191&amp;orderName=off_time&amp;orderType=desc&amp;index=0&amp;length=20&amp;salesId=&amp;brandId=20" class="sidebar-a">施舜</a>
								</li>

							</ul>

						</div>
					</div>

				</div>
			</div>

			<div class="ui-mask active" data-ui-mask="" style="width: 100%; height: 100%; left: 0px; top: 0px; background-color: rgba(0, 0, 0, 0.4); display: none;"></div>
			<!-- B 二维码 -->
			<div id="qrCodeWrap" style="display: none">
				<div class="c-8 tc">
					<p><span>施舜天河店</span></p>
					<p class="mt10 mb10"><img src="http://open.weixin.qq.com/qr/code/?username=gh_975b67381578" width="140" height="140"></p>
					<p>长按二维码识别</p>
				</div>
			</div>
			<!-- E 二维码 -->
			
<script type="text/javascript" charset="utf-8"  src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/swiper-3.0.7.min.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/iscroll-lite.min.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/qrcode.min.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/mall.jk.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/base.js"></script>


				<script type="text/javascript">
					$('#attention').on('click', function() {
						$.msg.alert({
							title: '添加关注',
							content: $('#qrCodeWrap').html(),
							closeByMask: true,
							hasCloseBtn: true,
							clsIn: 'fadeInDown',
							clsOut: 'fadeOutUp'
						});
					});
					$('#categoryMenu').on('click', function() {
						$.msg.actions({
							content: $('#sidebarMenusBox'),
							position: 'left',
							clsIn: 'slideInLeft',
							clsOut: 'slideOutLeft',
							width: '100%',
							bodyStyle: 'position: absolute; z-index: 500; top: 0;right: 0;bottom: 0;left: 0; background-color:#fff; padding:0; overflow:auto;',
							onOpened: function(oThis) {
								scrollM1 = new iScroll('#menu1Box', { click: true, snap: 'li' });
								$('#menu2Box .sidebar-ul').length && (scrollM2 = new iScroll('#menu2Box', { click: true, snap: 'li' }));
								$('#menu3Box .sidebar-ul').length && (scrollM3 = new iScroll('#menu3Box', { click: true, snap: 'li' }));

								$('#btnSidebarClose').off().on('click', function() { $.msg.actions(); });

								$('#menu1Box .sidebar-li').removeClass('active').eq(3).addClass('active');
								var $firstM2 = $('#menu2Box .sidebar-ul').hide().eq(0).show();

								debounce(function() { scrollM2 && scrollM2.refresh(); }, 200)();
							},
							hasCloseBtn: false,
							cacheIns: true
						});
					});
					$('.hasClass').on('click', function() {
						$('#categoryMenu').trigger('click');
					});
					$('body').on('click', '.search_input', function() {
						var $searchBox = $(".searchBox.stock");
						$searchBox.show();
						$searchBox.find("input[type=search]").focus();
						$searchBox.find(".s-cancel").on('click', function() {
							$searchBox.hide();
						});
					});
				</script>

	</body>

</html><?php }
}
