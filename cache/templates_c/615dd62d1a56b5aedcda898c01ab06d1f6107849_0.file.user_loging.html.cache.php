<?php
/* Smarty version 3.1.29, created on 2017-04-20 18:18:53
  from "E:\www\yunjuke\application\vmall\views\user_loging.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58f88b0d522734_03724668',
  'file_dependency' => 
  array (
    '615dd62d1a56b5aedcda898c01ab06d1f6107849' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\user_loging.html',
      1 => 1492673638,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f88b0d522734_03724668 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1867558f88b0d4ecce3_93663879';
?>
<!DOCTYPE html>
<html>
<head>
  <title>输入手机号</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no"/> -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name='apple-touch-fullscreen' content='yes'/>
<meta name="full-screen" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no"/>
<meta name="format-detection" content="address=no"/>
<meta name="renderer" content="webkit" />
<link rel="shortcut icon" href="//qncdn.qiakr.com/5_0/qia.png" />
<link rel="dns-prefetch" href="//qncdn.qiakr.com/" />
<link href="<?php echo TEMPLE;?>
css/global.css" rel="stylesheet" type="text/css">
<link href="<?php echo TEMPLE;?>
css/common.css" rel="stylesheet" type="text/css">
<link href="<?php echo TEMPLE;?>
css/modules.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
> //flexble
if(/qiakr_wv/i.test(navigator.userAgent)){
    var metaEl = document.querySelector('meta[name="viewport"]'), doc = document;
	if (!metaEl) {
	    metaEl = doc.createElement('meta');
	    metaEl.setAttribute('name', 'viewport');
	    metaEl.setAttribute('content', 'initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no');
	    if (doc.documentElement.firstElementChild) {
	        doc.documentElement.firstElementChild.appendChild(metaEl);
	    } else {
	        var wrap = doc.createElement('div');
	        wrap.appendChild(metaEl);
	        doc.write(wrap.innerHTML);
	    }
	}
}
!function(a,b){function c(){var b=f.getBoundingClientRect().width;b/i>540&&(b=540*i);var c=b/10;f.style.fontSize=c+"px",k.rem=a.rem=c}var d,e=a.document,f=e.documentElement,g=e.querySelector('meta[name="viewport"]'),h=e.querySelector('meta[name="flexible"]'),i=0,j=0,k=b.flexible||(b.flexible={});if(g){console.warn("将根据已有的meta标签来设置缩放比例");var l=g.getAttribute("content").match(/initial\-scale=([\d\.]+)/);l&&(j=parseFloat(l[1]),i=parseInt(1/j))}else if(h){var m=h.getAttribute("content");if(m){var n=m.match(/initial\-dpr=([\d\.]+)/),o=m.match(/maximum\-dpr=([\d\.]+)/);n&&(i=parseFloat(n[1]),j=parseFloat((1/i).toFixed(2))),o&&(i=parseFloat(o[1]),j=parseFloat((1/i).toFixed(2)))}}if(!i&&!j){var p=(a.navigator.appVersion.match(/android/gi),a.navigator.appVersion.match(/iphone/gi)),q=a.devicePixelRatio;i=p?q>=3&&(!i||i>=3)?3:q>=2&&(!i||i>=2)?2:1:1,j=1/i}if(f.setAttribute("data-dpr",i),!g)if(g=e.createElement("meta"),g.setAttribute("name","viewport"),g.setAttribute("content","initial-scale="+j+", maximum-scale="+j+", minimum-scale="+j+", user-scalable=no"),f.firstElementChild)f.firstElementChild.appendChild(g);else{var r=e.createElement("div");r.appendChild(g),e.write(r.innerHTML)}a.addEventListener("resize",function(){clearTimeout(d),d=setTimeout(c,300)},!1),a.addEventListener("pageshow",function(a){a.persisted&&(clearTimeout(d),d=setTimeout(c,300))},!1),"complete"===e.readyState?e.body.style.fontSize=14*i+"px":e.addEventListener("DOMContentLoaded",function(){e.body.style.fontSize=14*i+"px"},!1),c(),k.dpr=a.dpr=i,k.refreshRem=c,k.rem2px=function(a){var b=parseFloat(a)*this.rem;return"string"==typeof a&&a.match(/rem$/)&&(b+="px"),b},k.px2rem=function(a){var b=parseFloat(a)/this.rem;return"string"==typeof a&&a.match(/px$/)&&(b+="rem"),b}}(window,window.lib||(window.lib={}));
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/framework7.picker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/LArea.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/base.js"><?php echo '</script'; ?>
>
<body style="font-size: 28px;">
  <div data-v-d8e11084="">
  	<section data-v-d8e11084="" id="topBg" class="pr">
	  	<div data-v-d8e11084="" class="ub mb20"><!----> 
	  		<div data-v-d8e11084="" class="ub-f1"><!----> 
	  			<div data-v-d8e11084="" class="topText mb40 c-red-c66 f14">请注册或登录，以便向您提供更完整的服务</div>
	  		</div>
	  	</div> 
	  	<div data-v-d8e11084="" class="pr ub">
	  		<input id="telnumber" type="number" pattern="[0-9]*" name="" placeholder="请输入您的手机号" autofocus="autofocus" class="phone f16 ub-f1 db">
	  	</div>
  	</section> 
  	<div data-v-d8e11084="" class="p1 ub"><!----> <!----></div> 
  	<div data-v-d8e11084="" class="p1">
  		<div data-v-d8e11084="" class="finish f14 tx-c mb20" id="submit">确定</div> 
  	</div>
 </div>
</body>
<?php echo '<script'; ?>
>
$("#submit").on("click",function(){
	var tel = $("#telnumber").val();
	if(tel!=""){
		if(!(/^1(3|4|5|7|8)\d{9}$/.test(tel))){ 
			mobileAlert("手机号码格式有误，请重填",3000);
	    }
		$.ajax({
			type: "post",
	        url: "loging",
	        data: {
	        	data:tel
	        },
	        dataType: "json",
	        success: function(data){
	        	if(data.state){
	        		alert(data.msg);
					window.location.href = "javascript:history.go(-1)";
	        	}else{
	        		alert(data.msg);
					window.location.href = "javascript:history.go(-1)";
	        	}
	        }
		});
	}else{
		mobileAlert("手机号不能为空",3000);
	}
	 
});
<?php echo '</script'; ?>
> 
</html>
<?php }
}
