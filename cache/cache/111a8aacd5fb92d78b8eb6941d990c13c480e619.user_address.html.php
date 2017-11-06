<?php
/* Smarty version 3.1.29, created on 2017-04-24 10:23:49
  from "E:\www\yunjuke\application\vmall\views\user_address.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd61b5766480_25727029',
  'file_dependency' => 
  array (
    '111a8aacd5fb92d78b8eb6941d990c13c480e619' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\user_address.html',
      1 => 1492857804,
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
function content_58fd61b5766480_25727029 ($_smarty_tpl) {
?>
<!DOCTYPE html>
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
<title>我的收货人</title>
<style>
.addr-list dl{box-sizing:border-box;padding-left: 15px;}
a.addr{display: block;width: 100%;}
a.addr .item{width: 100%; overflow: hidden;text-overflow:ellipsis;word-break:break-all;}
a.newAddress{line-height: 40px;color: #e04241;display: block;text-align: center;}
</style>
</head>
	<body>
		<section class="addr-list"><dl class="bde4-b default">
		<dd>
	        <a class="addr" href="javascript:;" data-id="265483">
		        <div>北京 北京市 东城区 <span class="defaultAddrIcon">默认地址</span></div>
		        <div>不清楚啊</div>
		        <div>tel&nbsp;&nbsp;15883974812</div>
	        </a>
	        <a href="javascript:;"  class="edit"><i class="iconfont"></i></a>
      	</dd>
   </dl>
</section>
<a class="newAddress bde4" href="javascript:;">
  <i class="iconfont fs16 fw-bold"></i> 新增收货人
</a>
	</body>
	<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
	<script>
		$('.addr-list').on("click","a.addr",function(e){
  e.preventDefault();
  $(this).parent().find("a.edit").click();
}).on("click","a.edit",function(e){
   e.preventDefault();
   sessionStorage.receiveAddressJson = $(this).attr('data-addrjson');
   var addressPicker = "北京 北京市 东城区";
   if(addressPicker==""){
	   location.href="user_address_add?op=add";
   }else{
	   location.href="user_address_add?op=edit";
   }
   
   
});

$(".newAddress").on("click",function(e){
  e.preventDefault();
  if(sessionStorage.receiveAddressJson){
    sessionStorage.removeItem('receiveAddressJson');
  }
  location.href="user_address_add?op=add";
});
	</script>
</html>
<?php }
}
