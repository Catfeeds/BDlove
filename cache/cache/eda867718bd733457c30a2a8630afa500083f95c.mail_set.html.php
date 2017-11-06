<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:37:38
  from "D:\www\yunjuke\application\admin\views\mail_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841632d0bda2_20532053',
  'file_dependency' => 
  array (
    'eda867718bd733457c30a2a8630afa500083f95c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mail_set.html',
      1 => 1492225974,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1500948915,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59841632d0bda2_20532053 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index_1.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/font-awesome.min.css" rel="stylesheet" />
<link href="http://[::1]/yunjuke/application/admin/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views/css/H-ui.min.css" />

<!--
<link type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
-->
<style type="text/css">
    html, body { overflow: visible;}
</style>

<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/common.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/script.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/zh-CN.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/admin.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/flexigrid.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.validation.min.js"></script>
<!-- <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.picTip.js"></script> -->
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

<script type="text/javascript">
/*ajax过期登录*/
function login_ajax(demo,data){
    layer.msg(data.msg);
     setTimeout(function(){
            if(demo=='agent'){
                window.location.href="http://[::1]/yunjuke/index.php/login";
            }else if(demo=='supp'){
                window.location.href="http://[::1]/yunjuke/supplier.php/login";
            }else if(demo=='admin'){
                window.location.href="http://[::1]/yunjuke/admin.php/login";
            }else if(demo=='shop'){
                window.location.href="http://[::1]/yunjuke/index.php/index/login";
            }else if(demo=='shopadmin'){
                window.location.href="http://[::1]/yunjuke/admin.php/index/login";
            }
        },2000);
}
</script>
</head>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>邮件设置</h3>
        <h5>平台邮件的服务器信息</h5>
      </div>
      <ul class="tab-base nc-row"><li><a class="current"><span>服务器设置</span></a></li>
      <li><a href="templates" ><span>邮件模板</span></a></li>
      <li><a href="log" ><span>邮件日志</span></a></li>
      </ul> </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>填写平台邮件的相关参数，并点击“测试”按钮进行效验，保存后生效。</li>
    </ul>
  </div>
  <form method="post" id="form_email" action="setting" name="settingForm">
    <input type="hidden" name="form_submit" value="ok" />
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">SMTP 服务器</dt>
        <dd class="opt">
          <input type="text" value="smtp.ym.163.com" name="server" id="server" class="input-txt">
          <p class="notic">设置 SMTP 服务器的地址，如 smtp.163.com</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">SMTP 端口</dt>
        <dd class="opt">
          <input type="text" value="25" name="port" id="port" class="input-txt">
          <p class="notic">设置 SMTP 服务器的端口，默认为 25</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">发信人邮件地址</dt>
        <dd class="opt">
          <input type="text" value="system@internetdc.com" name="email" id="email" class="input-txt">
          <p class="notic">使用SMTP协议发送的邮件地址，如 system@erp.com</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">SMTP 身份验证用户名</dt>
        <dd class="opt">
          <input type="text" value="system@internetdc.com" name="user_name" id="user_name" class="input-txt">
          <p class="notic">如 system</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">SMTP 身份验证密码</dt>
        <dd class="opt">
          <input type="password" value="liyang168" name="mail_password" id="mail_password" class="input-txt">
          <p class="notic">system@erp.com邮件的密码，如 123456</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">测试对象邮箱地址</dt>
        <dd class="opt">
          <input type="text" value="" name="mail_test" id="mail_test" class="input-txt">
          <input type="button" value="测试" name="send_test_mail" class="input-btn" id="send_test_mail">
          <p class="notic">如：2014882889@qq.com</p>
        </dd>
      </dl>
      <div class="bot"><a href="JavaScript:void(0);" class="btn btn-warning radius" id="getup">确认提交</a></div>
    </div>
  </form>
</div>
<script>
$(document).ready(function(){
	$('#send_test_mail').click(function(){
		var data = $("form").serialize();
		$.ajax({
			type:'POST',
			data : data,
			url:'send_test',
			error:function(){
					layer.msg('测试邮件发送失败，请重新配置邮件服务器');
				},
			success:function(data){
				layer.msg(data.data);
			},
			dataType:'json'
		});
	});
	$('#getup').click(function(){
		var data = $("form").serialize();
		$.ajax({
			type:'POST',
			data : data,
			url:'setting',
			error:function(){
					layer.alert('测试邮件发送失败，请重新配置邮件服务器',{
						icon: 2,
						skin: 'layer-ext-moon'
					})
				},
			success:function(data){
				layer.msg(data);
			},
			dataType:'json'
		});
	});
});
</script><div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
