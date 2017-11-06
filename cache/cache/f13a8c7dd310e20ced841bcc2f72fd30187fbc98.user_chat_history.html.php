<?php
/* Smarty version 3.1.29, created on 2017-05-04 14:56:36
  from "D:\www\yunjuke\application\vmall\views\user_chat_history.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_590ad0a4ebf472_65700893',
  'file_dependency' => 
  array (
    'f13a8c7dd310e20ced841bcc2f72fd30187fbc98' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_chat_history.html',
      1 => 1493880841,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_590ad0a4ebf472_65700893 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>等待页面</title>
<link rel="stylesheet" href="http://localhost/yunjuke/application/vmall/views/css/weui1.css">
<link rel="stylesheet" href="http://localhost/yunjuke/application/vmall/views/css/example.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
	.weui-cell__bd span{
		font-weight: bold;
		padding-right: 10px;
	}
	.content{
		
		overflow: hidden;
    	text-overflow: ellipsis;
    	white-space: nowrap;
	}
	.title{
		margin-left: 10px;
		
	}
</style>
</head>

<body>
	<p class="title">正在联系的导购：</p>
	<div class="weui-cells" style="margin: 0">
						<a class="weui-cell weui-cell_access" href="shopping_guide_chat?spg_id=1">
			<div class="weui-cell__hd">
				<img src="http://[::1]/yunjuke/./data/store_guide_headportrait/head_portrait_1.jpg" alt="头像" style="width: 50px;height: 50px;margin-right: 10px;border-radius: 50%;">
			</div>
			<div class="weui-cell__bd" style="font-size: 14px;">
				<p class="content"><span>秋实</span>李小成测试</p>
			</div>
		</a>
					</div>
	<p class="title">历史联系人：</p>
	<div class="weui-cells" style="margin: 0">
				<a class="weui-cell weui-cell_access" href="shopping_guide_chat?spg_id=1">
			<div class="weui-cell__hd">
				<img src="http://[::1]/yunjuke/./data/store_guide_headportrait/head_portrait_1.jpg" alt="头像" style="width: 50px;height: 50px;margin-right: 10px; border-radius: 50%;">
			</div>
			<div class="weui-cell__bd" style="font-size: 14px;">
				<p class="content"><span>秋实</span>李小成测试</p>
				<p class="content"><img src="http://localhost/yunjuke/application/vmall/views/rongcloude/arclist/18.gif" border="0"></p>
			</div>
			<div class="weui-cell__ft">18:06</div>
		</a>
			</div>
	
</body>
<script>
	
</script>
</html>
<?php }
}
