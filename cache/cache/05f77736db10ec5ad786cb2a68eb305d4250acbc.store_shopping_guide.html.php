<?php
/* Smarty version 3.1.29, created on 2017-06-03 22:04:07
  from "D:\www\yunjuke\application\vmall\views\store_shopping_guide.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5932c1d7b4ab21_56271548',
  'file_dependency' => 
  array (
    '05f77736db10ec5ad786cb2a68eb305d4250acbc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\store_shopping_guide.html',
      1 => 1494326743,
      2 => 'file',
    ),
    '5cea575055325e574f9e509e31fe0032e5018982' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink.html',
      1 => 1496289709,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5932c1d7b4ab21_56271548 ($_smarty_tpl) {
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
<link href="http://[::1]/yunjuke/application/vmall/views/css/mobileslider.css" rel="stylesheet" type="text/css">
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
				#page{
					position: fixed;
					width: 100%;
					height: 100%;
					background: -webkit-linear-gradient(top, #f2535c,#fd856a);
					background: -o-linear-gradient(bottom, #f2535c,#fd856a);
					background: -moz-linear-gradient(bottom,#f2535c,#fd856a);
					background: linear-gradient(to bottom, #f2535c,#fd856a);
				}
				#page-have{
					position: fixed;
					width: 100%;
					height: 100%;
					background: -webkit-linear-gradient(top, #f2535c,#fd856a);
					background: -o-linear-gradient(bottom, #f2535c,#fd856a);
					background: -moz-linear-gradient(bottom,#f2535c,#fd856a);
					background: linear-gradient(to bottom, #f2535c,#fd856a);
				}
				.noconsultant{
					margin-top: 60%;
					font-size: 20px;
					color: #fff;
					text-align: center;
				}
				.butt{
					background: #fec5b9;
					width: 200px;
					height: 45px;
					font-size: 20px;
					line-height: 45px;
					text-align: center;
					color: #f45d5f;
					margin: 20px auto;
				}
				.servier{
					width: 80%;
					margin: 25% auto;
					background: #fff;
					height: 55%;
					border-radius: 5px;
					padding-top: 25%;
				}
				.servier-img{
					background: #fd5459;
					border-radius: 50%;
					width: 110px;
					height: 110px;
					margin: 0 auto;
				}
				.servier-name{
					color:#6A6A6A;
					padding-top: 20px;
					padding-bottom: 10px;
					text-align: center;
					font-size: 16px;
				}
				.servier-store{
					color:#AAA9A9;
					text-align: center;
					font-size: 16px;
				}
				.btn-tel{
					width: 85%;
					height: 45px;
					margin: 0 auto;
					margin-top: 50px;
					text-align: center;
					background: #fd5459;
					line-height: 45px;
					color: #fff;
					font-size: 18px;
					border-radius: 5px;
				}
			</style>
	</head>

	<body>
			<div id="page" style="display:block">
		   <p class="noconsultant">您还没有专属服务顾问</p>
		   <div class="butt  other_ecshopping">联系其他顾问</div>
	    </div>
		 <div id="content" style="display: none">
			<input type="hidden" id="redirect" value="chat">
			<input type="hidden" id="suid" value="8">
			<div class="chooseSalesBox">
									<div class="title">
				   		<div>该店铺还没有任何服务顾问，敬请期待！</div>
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
			$(".other_ecshopping").on("click", ".other_ecshopping", function(e) {
				$("#page").css("display","none");
				$("#content").css("display","block");
			});
			$(".other_ecshoppings").on("click", ".other_ecshoppings", function(e) {
				spg_id  = $(this).data("id");
				location.href = "http://[::1]/yunjuke/vmall.php/store/shopping_guide_chat?spg_id="+spg_id;
			});
		</script>

	</body>

</html><?php }
}
