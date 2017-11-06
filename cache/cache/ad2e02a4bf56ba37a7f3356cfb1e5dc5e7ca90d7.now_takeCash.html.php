<?php
/* Smarty version 3.1.29, created on 2017-07-11 15:41:29
  from "D:\www\yunjuke\application\pay\views\now_takeCash.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59648129dc74b0_22318894',
  'file_dependency' => 
  array (
    'ad2e02a4bf56ba37a7f3356cfb1e5dc5e7ca90d7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\now_takeCash.html',
      1 => 1499758786,
      2 => 'file',
    ),
    '940fa3e7a5fc658c974a607afc3fab9d110f7f64' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\lib\\footer.html',
      1 => 1499676757,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59648129dc74b0_22318894 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/css/H-ui.min.css" />
		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/style.css" />

		<title>用户查看</title>
	</head>

	<body>
		<div class="Huialert Huialert-danger">请您认真核对提现金额及提现账户，确保户名与账号一致，以免造成提现失败甚至金额损失。</div>
		<div class="codeView docs-example">
			<form action="" method="post" class="form form-horizontal" id="demoform-1">
				<legend>表单布局</legend>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">文本框：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" autocomplete="off" placeholder="帐号">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">密码框：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="password" class="input-text" autocomplete="off" placeholder="密码">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">单选框：</label>
					<div class="formControls skin-minimal col-xs-8 col-sm-9">
						<div class="radio-box">
							<input type="radio" id="sex-1" name="sex" checked>
							<label for="sex-1">男</label>
						</div>
						<div class="radio-box">
							<input type="radio" id="sex-0" name="sex">
							<label for="sex-0">女</label>
						</div>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">复选框：</label>
					<div class="formControls skin-minimal col-xs-8 col-sm-9">
						<div class="check-box">
							<input type="checkbox" id="checkbox-5">
							<label for="checkbox-5">复选框</label>
						</div>
						<div class="check-box">
							<input type="checkbox" id="checkbox-6" checked>
							<label for="checkbox-6">复选框 checked状态</label>
						</div>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">文件域：</label>
					<div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
							<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly>
							<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
							<input type="file" multiple name="file-2" class="input-file">
							</span> </div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">下拉框：</label>
					<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
							<select class="select" size="1" name="demo1">
								<option value="" selected>默认select</option>
								<option value="1">菜单一</option>
								<option value="2">菜单二</option>
								<option value="3">菜单三</option>
							</select>
							</span> </div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">文本域：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea class="textarea" placeholder="说点什么..." rows="" cols="" name=""></textarea>
					</div>
				</div>
				<div class="row cl">
					<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
						<input class="btn btn-primary radius" type="submit" value="提交">
					</div>
				</div>
			</form>
		</div>
		<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/js/H-ui.admin.js"></script>

		
	</body>

</html><?php }
}
