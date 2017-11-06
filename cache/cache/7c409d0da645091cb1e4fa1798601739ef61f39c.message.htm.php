<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:09:53
  from "D:\www\yunjuke\application\admin\views\message.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c22251c372e2_07356038',
  'file_dependency' => 
  array (
    '7c409d0da645091cb1e4fa1798601739ef61f39c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\message.htm',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59c22251c372e2_07356038 ($_smarty_tpl) {
?>

<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta charset="UTF-8">
<title>操作提示</title>
<link href="http://[::1]/yunjuke/application/admin/views/css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="msgpage">
  <div class="msgbox">
    <div class="pic"></div>
    <div class="con">
      ip地址不在白名单内<!--反馈消息-->
	</div>
    <div class="scon">页面如不能自动跳转，请选择手动操作...</div>
    <div class="button">
	<!--此为上一页连接，或也可以调准到其他页面-->
		      <a href="javascript:history.go(-1)"  class="ncap-btn">返回上一页</a> 
	  	  <!--自动跳转链接，和跳转时间-->
	      <script type="text/javascript"> 
      
	  var seconds = 3;
	  var defaultUrl = "javascript:history.go(-1)";
	  onload = function()
	{
		if (defaultUrl == 'javascript:history.go(-1)' && window.history.length == 0)
		  {
			return;
		  }
		window.setInterval(redirection, 1000);
		
	
	}
function redirection()
{
  if (seconds <= 0)
  {
    window.clearInterval();
    return;
  }

  seconds --;
  //document.getElementById('spanSeconds').innerHTML = seconds;
  if (seconds == 0)
  {
    window.clearInterval();	//取消setInterval设置的timeout
    location.href = defaultUrl;
  }
}
	  </script>
	    </div>
  </div>
</div>
</body>
</html><?php }
}
