<?php
/* Smarty version 3.1.29, created on 2017-04-24 11:11:12
  from "E:\www\yunjuke\application\vmall\views\user_center.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd6cd0bd1a22_62906679',
  'file_dependency' => 
  array (
    'a76181bfe7f1813d710b8f122f306a326eb74752' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\user_center.html',
      1 => 1493003095,
      2 => 'file',
    ),
    'ef9de78dc0bf8105644ed2715cfec1653e3c2fe3' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink-c.html',
      1 => 1492598976,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_58fd6cd0bd1a22_62906679 ($_smarty_tpl) {
?>
<html lang="zh-cn">

	<head>
		<title>个人中心</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="full-screen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="shortcut icon" href="http://192.168.0.111/yunjuke//favicon.ico">
<link href="http://192.168.0.111/yunjuke/application/vmall/views/css/global.css" rel="stylesheet" type="text/css">
<link href="http://192.168.0.111/yunjuke/application/vmall/views/css/common.css" rel="stylesheet" type="text/css">
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
          //alert(docEl.style.fontSize);
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


			<link href="http://192.168.0.111/yunjuke/application/vmall/views/css/userc.css" rel="stylesheet" type="text/css">
			<style>
				header {
					background-image: url(//qncdn.qiakr.com/5_0/bg_wh.png)
				}
				
				.to_home_btn>aside,
				.to_home_btn {
					border-radius: 50%;
					background-color: #f34a5a;
					color: #fff;
					transition: transform .4s;
					-webkit-transition: transform .4s
				}
				
				.to_home_btn>aside {
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					z-index: -1
				}
				
				.to_home_btn {
					position: fixed;
					bottom: 2rem;
					left: 50%;
					width: 0.6rem;
					height: 0.6rem;
					transform: translateX(-50%);
					-webkit-transform: translateX(-50%);
					opacity: .8;
					font-size: 0.15rem;
					color: #fff !important;
				}
				
				.hd_img {
					width: 0.4667rem;
					height: 0.4667rem;
					margin: .1rem auto 0;
					border-radius: 50%;
					border: .01rem solid #fff;
					-webkit-box-shadow: 0 3px 5px rgba(0, 0, 0, .27), 0 0 60px rgba(0, 0, 0, .1) inset
				}
				
				.md_ico {
					width: 0.5rem;
					height: 0.4rem;
					margin: 0 auto;
					background: url(//qncdn.qiakr.com/5_0/customer_icons.png) no-repeat;
					background-size: 0.42rem;
				}
				
				.md_ico_2 {
					background-position: 0 -1.025rem;
					background-size: 0.35rem 2.35rem;
				}
				
				.md_ico_3 {
					background-position: 0 0;
				}
				
				.md>a {
					position: relative;
					display: block;
				}
				
				.md_txt {
					min-height: .2rem;
					line-height: .2rem;
					margin-top: .0133rem;
				}
				
				.md {
					padding: .2rem .2rem;
				}
			</style>
	</head>

	<body style="font-size: 0.15rem;">
		<article>
			<article>
				<div id="outer-2uyxn">
					<div id="inner-c4kl3">
						<!---->
						<header class="p30 mb20 ub-img-bg">
							<!---->
							<!---->
							<p class="hd_img"><img src="//qncdn.qiakr.com/5_0/qia.png" class="uw100 uh100 br50 opc4"> </p>
							<div class="ub ub-pc ub-ac mt20 mb20 hd_txt">
							    <span class="lico"><span ><i  class="iconfont f24 db c-gold">初级粉丝</i></span> </span>
								<div class="ml5 f16 ub ub-ac">LG</div>
								<p class="ub ub-ac c-6 pr pl10">未绑定门店</p>
							</div>
						</header>
						<section class="b-wh ub md mb20">
							<!---->
							<a href="http://192.168.0.111/yunjuke/vmall.php/user/user_coupon_list" class="ub-f1 tx-c uw0">
								<div class="md_ico md_ico_2"></div>
								<p class="md_txt"><span class="c-red">1</span> 张</p>
								<p>优惠券</p>
							</a>
							<a href="http://192.168.0.111/yunjuke/vmall.php/store/activity_list" class="ub-f1 tx-c uw0">
								<div class="md_ico md_ico_3"></div>
								<p class="md_txt"><span class="c-red">7</span> 个</p>
								<p>当前活动</p>
							</a>
						</section>
						<section class="b-wh md_list mb20">
							<a href="http://192.168.0.111/yunjuke/vmall.php/user/user_order" class="ub ub-ac"><i class="iconfont f26"></i>
								<p class="ub-f1 md_item_txt forward">全部订单</p>
							</a>
							<!---->
							<a href="http://192.168.0.111/yunjuke/vmall.php/Store/shopping_guide" class="ub ub-ac"><i class="iconfont f26"></i>
								<p class="ub-f1 md_item_txt forward">我的服务顾问</p>
							</a>
							<a href="http://192.168.0.111/yunjuke/vmall.php/store/Stores" class="ub ub-ac"><i class="iconfont f26"></i>
								<p class="ub-f1 md_item_txt forward">所有门店</p>
							</a>
						</section>
						<article>
							<section class="b-wh md_list mb20">
								<a href="http://192.168.0.111/yunjuke/vmall.php/user/user_address" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">我的预约</p>
								</a>
								<a href="http://192.168.0.111/yunjuke/vmall.php/user/user_collection" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">我的收藏</p>
								</a>
								<a href="http://192.168.0.111/yunjuke/vmall.php/user/user_address" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">我的奖品</p>
								</a>
							</section>
							<section class="b-wh md_list mb20">
								<a href="http://192.168.0.111/yunjuke/vmall.php/user/user_shopping_cart" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">购物车</p>
								</a>
								<a href="http://192.168.0.111/yunjuke/vmall.php/user/user_address" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">收货地址管理</p>
								</a>
							</section>
						</article>
						<!---->
					</div>
				</div>
				<a class="to_home_btn ub ub-ac ub-pc" href=".">
					逛店铺
					<aside></aside>
				</a>

			</article>
		</article>
	</body>
<script type="text/javascript" src="http://192.168.0.111/yunjuke/application/vmall/views/js/zepto.min.js"></script>
<script type="text/javascript" src="http://192.168.0.111/yunjuke/application/vmall/views/js/framework7.picker.min.js"></script>	
<script type="text/javascript" src="http://192.168.0.111/yunjuke/application/vmall/views/js/base.js"></script>
<script>
var tel = "";

if(tel==""){
	showMPLoginBox("",42);
}

</script>
</html><?php }
}
