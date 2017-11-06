<?php
/* Smarty version 3.1.29, created on 2017-04-22 18:28:37
  from "E:\www\yunjuke\application\vmall\views\store_shopping_guide.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fb3055d97372_59538659',
  'file_dependency' => 
  array (
    '98a0716a0d69a65199549579d833952eef73bf60' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\store_shopping_guide.html',
      1 => 1492496536,
      2 => 'file',
    ),
    '368c42ee444c4bd0269d88571257280b552c724c' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink.html',
      1 => 1492598976,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_58fb3055d97372_59538659 ($_smarty_tpl) {
?>
<html lang="zh-cn" style="opacity: 1; font-size: 109.375px;">
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
			<title>选择服务顾问</title>
			<style>
				body {
					background: #fff;
				}
				
				.smSalesList {
					color: #444;
				}
				
				.smSalesList .brandSalesContainer {
					position: absolute;
					z-index: 1101;
					top: 40px;
					right: 0;
					left: 0;
					bottom: 90px;
					padding: 0 15px;
					overflow: auto;
				}
				
				.smSalesList .selectBtn {
					position: absolute;
					z-index: 1101;
					bottom: 0;
					left: 0;
					right: 0;
					display: block;
					text-align: center;
					height: 75px;
					padding-top: 10px;
					color: #9b9b9b;
				}
				
				.smSalesList .selectBtn.ac {
					color: #000;
					font-size: 17px;
					line-height: 70px;
					display: none;
				}
				
				.smSalesList .brandItem .tit {
					color: #888;
					border-bottom: solid 2px #999;
					line-height: 20px;
					margin-top: 15px;
					font-size: 16px;
				}
				
				.smSalesList .brandItem .item {
					width: 33%;
					text-align: center;
					padding: 15px 0 0;
					float: left;
				}
				
				.smSalesList .brandItem .name {
					padding: 3px 0;
					white-space: nowrap;
					overflow: hidden;
					text-overflow: ellipsis;
					height: 18px;
				}
				
				.smSalesList .brandItem .btn {
					padding: 0;
					text-align: center;
					width: 60px;
					color: #888;
					line-height: 28px;
				}
				
				.smSalesList .brandItem .btn.ac {
					background: #db4437;
					color: #fff;
					border-color: #db4437;
				}
				
				.chooseSalesBox .title {
					text-align: center;
					font-size: 16px;
					padding: 20px 0 10px;
					line-height: 24px;
				}
				
				.chooseSalesBox .tit {
					font-size: 14px;
				}
				
				.chooseSalesBox .storeSales {
					overflow: auto;
					position: absolute;
					top: 78px;
					bottom: 80px;
					left: 0;
					right: 0;
				}
				
				.chooseSalesBox .storeSales .item {
					padding: 10px 0;
					border: none;
					height: 44px;
				}
				
				.chooseSalesBox .storeSales .item:active {
					background: #eee;
				}
				
				.chooseSalesBox .storeSales .name {
					line-height: 44px;
				}
				
				a.gotoStore {
					display: block;
					width: 80px;
					height: 40px;
					line-height: 40px;
					color: #fff;
					background: #e04241;
					text-align: center;
					border-radius: 4px;
					margin: 30px auto 0;
				}
			</style>
	</head>

	<body>
		<input type="hidden" id="redirect" value="chat">
		<input type="hidden" id="suid" value="8">
		<div class="chooseSalesBox">
			<div class="title">
				<div>服务顾问在此恭候多时了</div>
				<div class="tit">请选择一位，他将随时为您提供服务</div>
			</div>
			<div class="storeSales">
			    					<div class="item wbox" data-id="1">
						<img src="http://[::1]/yunjuke//data/store_guide_headportrait/head_portrait_1.jpg" class="size43 round">
						<div class="name wbox-1 with-go-right">
							<div class="namer">秋实</div>
						</div>
					</div>
									<div class="item wbox" data-id="3">
						<img src="http://[::1]/yunjuke//data/store_guide_headportrait/head_portrait_3.jpg" class="size43 round">
						<div class="name wbox-1 with-go-right">
							<div class="namer">123</div>
						</div>
					</div>
				
			</div>
		</div>
<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
		<script>
			var redirect = $("#redirect").val();
			$(".chooseSalesBox .storeSales").on("click", ".item", function(e) {
				var _t = $(this),
					salesId = _t.data("id");
				// $.getJSON("bandingSales.json?salesIds="+salesId,function(data){
				//     if(data.status=="0"){
				if(redirect == "chat") {
					location.href = "http://[::1]/yunjuke/vmall.php/store/shopping_guide_chat?spg_id="+salesId;
				} else if(redirect == "mySalesList") {
					location.href = "mySalesList.htm?suid=" + $("#suid").val();
				} else {
					location.href = "getStoreHomePage.htm?storeId=" + getUrlParam("storeId");
				}
				// }else{
				// 	mobileAlert(data.errmsg ? data.errmsg : "系统繁忙，请稍后再试");
				// }
				// });
			});
			
			
		</script>

	</body>

</html><?php }
}
