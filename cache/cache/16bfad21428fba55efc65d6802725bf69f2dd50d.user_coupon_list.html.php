<?php
/* Smarty version 3.1.29, created on 2017-05-05 11:17:13
  from "D:\www\yunjuke\application\vmall\views\user_coupon_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_590beeb9431837_55416491',
  'file_dependency' => 
  array (
    '16bfad21428fba55efc65d6802725bf69f2dd50d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_coupon_list.html',
      1 => 1493954228,
      2 => 'file',
    ),
    '115c8c3a13a56407352a4c5e79b348343e27acdb' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink-c.html',
      1 => 1493426857,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_590beeb9431837_55416491 ($_smarty_tpl) {
?>
<html>

	<head>
		<title>优惠券</title>
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
  
  
  
  function getLocation(){
      var options={
          enableHighAccuracy:true, 
          maximumAge:1000
      }
      if(navigator.geolocation){
          //浏览器支持geolocation
          navigator.geolocation.getCurrentPosition(onSuccess,onError,options);
          
      }else{
          //浏览器不支持geolocation
      }
  }

  //成功时
  function onSuccess(position){
      //返回用户位置
      //经度
      var longitude =position.coords.longitude;
      //纬度
      var latitude = position.coords.latitude;
	  $.ajax({
			type: "post",
		       url: "http://[::1]/yunjuke/vmall.php/user/steUserLocation",
		       data: {
		    	   long:longitude,
		    	   lat:latitude
		       },
		       dataType: "json",
		       success: function(data){
		       	if(data.state){
		       		
		       	}else{
		       		
		       	}
		       }
		});


  }


  //失败时
  function onError(error){
      switch(error.code){
          case 1:
          alert("位置服务被拒绝");
          break;

          case 2:
          alert("暂时获取不到位置信息");
          break;

          case 3:
          alert("获取信息超时");
          break;

          case 4:
           alert("未知错误");
          break;
      }

  }

  window.onload=getLocation;
  setInterval(getLocation,3600000);//每隔1小时 自行获取
</script>


			<style type="text/css">
				.modal-d {
					position: fixed;
					left: 0;
					top: 0;
					right: 0;
					bottom: 0;
					z-index: 1001;
					-webkit-overflow-scrolling: touch;
					outline: 0;
					overflow: scroll;
					margin: 0 auto
				}
				
				._v-content {
					padding: .1333rem .1rem 1.5rem;
					box-sizing: border-box;
					-webkit-box-sizing: border-box;
				}
				
				.modal-dialog {
					position: absolute;
					left: 50%;
					top: 50%;
					transform: translate(-50%, -50%);
					-webkit-transform: translate(-50%, -50%);
					width: 80%;
					background: #fff;
					border-radius: .15rem
				}
				
				.modal-header {
					border-top-left-radius: .15rem;
					border-top-right-radius: .15rem;
					background: -webkit-gradient(linear, 50% 40%, 54% 100%, from(#f2535c), to(#fd856a));
					color: #fff;
					text-align: center;
					padding: .32rem
				}
				
				.modal-body {
					position: relative;
					min-height: 2.4rem;
					max-height: 8rem;
					padding: .4rem;
					text-align: center
				}
				
				.modal-body input {
					border: 1px solid #e5e5e5;
					padding: .1333rem;
					width: 80%
				}
				
				.modal-footer>a {
					display: inline-block;
					position: relative;
					width: 3rem;
					height: 1rem;
					line-height: 1rem;
					margin: .4rem;
					border-radius: .1rem;
					text-align: center
				}
				
				.modal-toast {
					position: absolute;
					left: 50%;
					top: 50%;
					transform: translate(-50%, -50%);
					-webkit-transform: translate(-50%, -50%);
					min-width: 60%;
					width: 80%;
					padding: .5333rem;
					background: rgba(0, 0, 0, .8);
					color: #fff;
					border-radius: .15rem;
					box-sizing: border-box
				}
				
				.modal-toast.icon {
					text-align: center;
					width: auto
				}
				
				.button.btn-default {
					border: 1px solid #f2535c;
					color: #f2535c;
					background-color: #fff
				}
				
				.button.btn-active {
					border: 1px solid #f2535c;
					color: #fff;
					background-color: #f2535c
				}
				
				.modal-backup {
					position: fixed;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					z-index: 1000;
					background: rgba(0, 0, 0, .5)
				}
				
				.modal-backup.toast {
					background: hsla(0, 0%, 100%, 0)
				}
				
				.fade-enter-active,
				.fade-leave-active {
					transition: opacity .5s;
					-webkit-transition: opacity .5s
				}
				
				.fade-enter,
				.fade-leave-active {
					opacity: 0
				}
				
				.loading-out {
					-webkit-animation: loadingAmt .5s linear infinite;
					margin: 0 auto;
					padding: .1333rem;
					background: -webkit-linear-gradient(#444, #eee)
				}
				
				.loading-in,
				.loading-out {
					width: 1rem;
					height: 1rem;
					border-radius: 50%
				}
				
				.loading-in {
					background: #2a2a2a
				}
				
				@-webkit-keyframes loadingAmt {
					0% {
						-webkit-transform: rotate(0deg)
					}
					to {
						-webkit-transform: rotate(1turn)
					}
				}
				
				@keyframes loadingAmt {
					0% {
						transform: rotate(0deg)
					}
					to {
						transform: rotate(1turn)
					}
				}
			</style>
			<style type="text/css">
				.pull-to-refresh-layer .spinner-holder {
					visibility: hidden
				}
				
				.pull-to-refresh-layer {
					background-image: url(//qncdn.qiakr.com/5_0/r_gif.gif);
					background-repeat: no-repeat;
					background-position: 50%;
					background-size: .8rem .8rem;
					-webkit-transform: scale(1);
					transform: scale(1);
					transition: transform .15s linear;
					-webkit-transition: transform .15s linear;
					margin-bottom: -.2rem
				}
				
				.pull-to-refresh-layer.active {
					-webkit-transform: scale(1.35);
					transform: scale(1.35)
				}
				
				header {
					height: 0.4667rem;
					line-height: 0.4667rem;
					text-align: center;
					border-bottom: 1px solid #ccc;
				}
				
				header>nav:not(:first-child):before {
					content: "";
					display: block;
					position: absolute;
					top: 20%;
					left: 0;
					width: 1px;
					height: 60%;
					background-color: #ccc;
				}
				
				.hd_line {
					position: absolute;
					bottom: 0;
					left: 0;
					width: 50%;
					transition: transform .3s;
					-webkit-transition: -webkit-transform .3s;
				}
				
				.hd_line:after {
					content: "";
					display: block;
					width: 60%;
					height: .0217rem;
					margin: 0 auto;
					background-color: #ff4436;
				}
				
				.item {
					margin-top: .1rem;
					padding: 0 .1337rem;
					border-radius: .08rem;
					color: #fff;
				}
				
				.md_more {
					color: #666;
					margin: .15rem 0;
				}
				
				.item_top {
					padding: .1267rem 0;
					border-bottom: 1px solid #fff;
				}
				
				.item_top>a {
					display: inline-block;
					width: 0.8rem;
					height: 0.3rem;
					line-height: 0.3rem;
					text-align: center;
					border-radius: .0337rem;
					background-color: #fff;
					font-size: 0.15rem;
				}
				
				.item_btm {
					padding: .0137rem 0;
				}
				
				.md_more>i {
					display: block;
					height: 1px;
					margin: 0 .15rem;
					background-color: #ccc;
				}
				
				.mt5 {
					margin-top: .0127rem !important;
				}
				
				.md_list>aside {
					margin-top: 1rem;
				}
				
				.md_list>aside>p {
					color: #666;
					margin: .2rem 0;
				}
				
				.md_list>aside>a {
					display: inline-block;
					padding: .1rem .25rem;
					border: 1px solid #fd5459;
					border-radius: .1rem;
				}
				.coupon-bottom{
					position: fixed;
					bottom: 0;
					width: 100%;
					height: 40px;
					text-align: center;
					color: #fff;
					background: #fd5459;
					line-height: 40px;
				}
			</style>

	</head>

	<body style="font-size: 0.15rem;">
		<div>
			<article>
				<header class="ub">
					<nav class="ub-f1 uw0 pr">可用优惠券</nav>
					<nav class="ub-f1 uw0 pr">已失效</nav>
					<aside class="hd_line" style="transform: translateX(0%);"></aside>
				</header>
				<section class="md_list">
					<aside class="tx-c">
						<p>暂无优惠券信息</p>
						<!---->
						<a href="activity.html#/activityList" class="c-red f16">活动中心</a>
						<!---->
					</aside>
					<div id="outer-fimd9" class="_v-container" style="top: 1.5rem; width: 100%; height: 100%;display: none;">
						<div class="_v-content">
							<!--下拉刷新样式-->
							<div class="pull-to-refresh-layer" style="display: none;"><span class="spinner-holder">
								<img src="" class="arrow"> <span class="text">下拉刷新</span>
								<!---->
								</span>
							</div>
							<div class="item shadow b-red">
								<div class="ub ub-ac item_top f16">
									<div class="ub-f1">
										<p><span class="f24">20</span>元代金券</p>
										<p class="mt5">订单满20.1元可用</p>
									</div>
									<!---->
									<a href="user/user_coupon_use" class="c-red">立即使用</a>
									<!---->
									<!---->
									<!---->
								</div>
								<div class="item_btm">
									<p><span>券号: </span>71539038009024</p>
									<p class="mt5"><span>使用期限: </span>2017.03.04 ~ 2017.05.31</p>
								</div>
							</div>
							<p class="md_more ub ub-ac"><i class="ub-f1 uw0"></i>没有更多了<i class="ub-f1 uw0"></i></p>
							<div class="loading-layer">
								<div class="loader"><span></span><span></span><span></span><span></span></div>
							</div>
						</div>
					</div>
				</section>

			</article>
	
		</div>
		
		<div class="coupon-bottom">
			<p>领劵中心（有0张券可领取）</p>
		</div>
		<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
	</body>

</html><?php }
}
