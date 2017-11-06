<?php
/* Smarty version 3.1.29, created on 2017-10-17 14:43:56
  from "D:\www\yunjuke\application\vmall\views\user_center.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e5a6acc8b1b3_09102970',
  'file_dependency' => 
  array (
    '4bd65e7d0d95dc40496f92f824b8b16446727ea9' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_center.html',
      1 => 1507529212,
      2 => 'file',
    ),
    '115c8c3a13a56407352a4c5e79b348343e27acdb' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink-c.html',
      1 => 1498027614,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59e5a6acc8b1b3_09102970 ($_smarty_tpl) {
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
<link rel="shortcut icon" href="http://[::1]/yunjuke//favicon.ico">
<link href="http://[::1]/yunjuke/application/vmall/views/css/global.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/vmall/views/css/common.css" rel="stylesheet" type="text/css">

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


			<link href="http://[::1]/yunjuke/application/vmall/views/css/userc.css" rel="stylesheet" type="text/css">
			<link href="http://[::1]/yunjuke/application/vmall/views/css/style.css" rel="stylesheet" type="text/css">
			<style>
				p{
					font-size: .13rem;
				}
				header {
					background-image: url(http://[::1]/yunjuke/application/vmall/views/images/user_bg.png);
					padding:.4rem .15rem;

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
				
				.forward:after {
					right: .2rem;
					width: 0.1rem;
					height: .1rem;
					border: 2px solid #999;
					border-bottom: transparent;
					border-left: transparent;
				}
				
				.f26 {
					font-size: 24px;
				}
				.money-num{
					color: #999;
					font-size: 15px;
					margin-left: 38%;
				}
				.user_info{
					display: flex;
					justify-content: space-between;
				}
				.user_img{
					width:.5rem;
					height: .5rem;
				}
				.user_bd{
					width:1.9rem;
					align-self: center;
					color: #fff;
				}
				.user_name{
					font-size: .13rem;
					margin-bottom: 0.1rem;
				}
				.user_name img{
					width:.33rem;
					height:auto;
					margin-top:-.02rem;
					margin-left:.05rem;
				}
				.user_other span{
					font-size:.1rem;
					padding:.02rem.06rem;
					background: #e6992b;
					border-radius:50px;
					margin-right:0.07rem;
				}
				.user_n{
					max-width:1.2rem;
					white-space: nowrap;
					overflow: hidden;
					text-overflow: ellipsis;
					display: inline-block;
					margin-left:.05rem;
				}
				.user_ft{
					align-self: center;
					color: #fff;
					font-weight: 600;
				}
				.classify{
					display: flex;
					flex-wrap: wrap;
					background: #fff;
					margin-bottom:.15rem;
					font-size:.12rem;
				}
				.classify_chile{
					width:37%;
					padding:.2rem;
					display: flex;
					justify-content: flex-start;
					align-items: center;
				}

				.icon{
					width:.3rem;
					height:.3rem;
					line-height: .3rem;
					font-size: .16rem;
					text-align: center;
					background: #fec73d;
					color: #fff;
					-webkit-border-radius: 50%;
					-moz-border-radius: 50%;
					border-radius: 50%;
				}
				.classify_title{
					margin-left:.1rem;
					line-height:.16rem;
					font-weight: 500;
				}
				.classify_title span{
					color: #999;
					font-size:.1rem;
					font-weight: 400;
				}
				.num{
					color: red!important;
					padding:0 2px;
				}
				.f-22{
					font-size:.22rem!important;
				}
				.f-17{
					font-size: .17rem;
					line-height:.27rem;
				}
				.mb-15{
					margin-bottom: .15rem;
				}
			</style>
	</head>

	<body style="font-size: 0.15rem;">
		<article>
			<article>
				<a id="outer-2uyxn">
					<a id="inner-c4kl3">
						<header data-v-37f3214e data-v-4f55776b class="ub-img-bg">
							<!--<p class="hd_img"><img src="http://wx.qlogo.cn/mmopen/zrFYKILZ93EUXGQa23gq6JTk4kY5oK81wJ1BiabZymPQyDtZn11WKwRzoyy6BQxncia65jd2kN6jV1iaiczphsNjxmQqAEk11d2u/0" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/member_logo.png'"  class="uw100 uh100 br50 opc4"> </p>-->
							<!--<div class="ub ub-pc ub-ac mt20 mb20 hd_txt">-->
								<!--<span class="lico"><span ><i  class="iconfont f24 db c-gold">V2</i></span> </span>-->
								<!--<div class="ml5 f16 ub ub-ac">-->
									<!---、Onじyの恆-->
								<!--</div>-->
								<!--<p class="ub ub-ac c-6 pr pl10">-->
									<!--未绑定门店-->
									<!---->
								<!--</p>-->
							<!--</div>-->
							<a class="user_info" href="user_updateperson">
								<div class="user_img"><img src="http://wx.qlogo.cn/mmopen/zrFYKILZ93EUXGQa23gq6JTk4kY5oK81wJ1BiabZymPQyDtZn11WKwRzoyy6BQxncia65jd2kN6jV1iaiczphsNjxmQqAEk11d2u/0" onerror="javascript:this.src='http://[::1]/yunjuke/data/images/member_logo.png'"  class="uw100 uh100 br50"></div>
								<div class="user_bd">
									<p class="user_name"><span class="user_n">-、Onじyの恆</span><span><img src="http://[::1]/yunjuke/application/vmall/views/images/authentic.png" alt=""></span></p>
									<p class="user_other"><span>LV2</span>
										<span>
											未绑定门店
																					</span>
									</p>
								</div>
								<div class="user_ft"><span class="iconfont">&#xe604;</span></div>
							</a>
						</header>
						<section class="classify">
								<a class="classify_chile" href="../index/index?storeId=61" >
									<div class="icon"><span class="iconfont f-17">&#xe601;</span></div>
									<div class="classify_title">逛店铺</div><aside></aside>
								</a>
							<a href="http://[::1]/yunjuke/vmall.php/store/Stores" class="classify_chile">
								<div class="icon"><span class="iconfont">&#xe61d;</span></div>
								<div class="classify_title">所有门店</div>
							</a>
							<a href="http://[::1]/yunjuke/vmall.php/Store/shopping_guide" class="classify_chile">
								<div class="icon"><span class="iconfont f-22">&#xe62d;</span></div>
								<div class="classify_title">我的服务顾问<br><span>给TA留言</span></div>
							</a>
							<a href="http://[::1]/yunjuke/vmall.php/Promotion/customerLotteryWheelList" class="classify_chile">
								<div class="icon"><span class="iconfont">&#xe614;</span></div>
								<div class="classify_title">我的卡券<br><span>有<span class="num">5</span>张可用</span></div>
							</a>
						</section>

						<section class="b-wh md_list mb-15">
							<a href="http://[::1]/yunjuke/vmall.php/Money/index"  class="ub ub-ac"><i class="iconfont f26">&#xe6e5;</i>
								<p class="ub-f1 md_item_txt forward">我的余额<span class="money-num">￥885421.03</span></p>
							</a>
							<a href="http://[::1]/yunjuke/vmall.php/Order/index" class="ub ub-ac"><i class="iconfont f26"></i>
								<p class="ub-f1 md_item_txt forward">全部订单</p>
							</a>
						</section>
						<article>
							<section class="b-wh md_list mb-15">
								<a href="http://[::1]/yunjuke/vmall.php/user/user_collection?type=goods" class="ub ub-ac"><b class="iconfont f26">&#xe60c;</b>
									<p class="ub-f1 md_item_txt forward">我的收藏商品</p>
								</a>
								<a href="http://[::1]/yunjuke/vmall.php/user/user_collection?type=store" class="ub ub-ac"><b class="iconfont f26">&#xe60e;</b>
									<p class="ub-f1 md_item_txt forward">我的收藏店铺</p>
								</a>
							</section>
							<section class="b-wh md_list mb-15">
								<!--购物车隐藏-->
								<!--<a href="http://[::1]/yunjuke/vmall.php/user/user_shopping_cart" class="ub ub-ac"><i class="iconfont f26"></i>-->
									<!--<p class="ub-f1 md_item_txt forward">购物车</p>-->
								<!--</a>-->
								<a href="http://[::1]/yunjuke/vmall.php/user/user_address" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">收货地址管理</p>
								</a>
							</section>
						</article>
						<!---->
					</div>
				</div>


			</article>
		</article>
	</body>
	<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
	<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/framework7.picker.min.js"></script>
	<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/base.js"></script>
	<script>
	</script>

</html><?php }
}
