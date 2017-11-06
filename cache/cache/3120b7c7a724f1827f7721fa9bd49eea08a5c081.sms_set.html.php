<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:38:03
  from "D:\www\yunjuke\application\admin\views\sms_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5984164bac38f3_98005576',
  'file_dependency' => 
  array (
    '3120b7c7a724f1827f7721fa9bd49eea08a5c081' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\sms_set.html',
      1 => 1492252010,
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
function content_5984164bac38f3_98005576 ($_smarty_tpl) {
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
        <h3>短信设置</h3>
        <h5>平台短信的接口信息</h5>
      </div>
      <ul class="tab-base nc-row"><li><a class="current"><span>短信接口</span></a></li><li><a href="templates" ><span>短信模版</span></a></li><li><a href="log" ><span>短信日志</span></a></li></ul> </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>填写短信接口的相关参数，并点击“测试”按钮进行效验，保存后生效。</li>
    </ul>
  </div>
  <form method="post" id="form_sms" action="setting" name="settingForm">
    <input type="hidden" name="form_submit" value="ok" />
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">用户</dt>
        <dd class="opt">
          <input type="text" value="23790560" name="user" id="user" class="input-txt">
          <p class="notic">短信商提供的用户</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">密码</dt>
        <dd class="opt">
          <input type="text" value="e7ee90c5350ad5f73ebf0f9439823adc" name="password" id="password" class="input-txt">
          <p class="notic">短信商提供的密码</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">签名</dt>
        <dd class="opt">
          <input type="text" value="云聚客" name="sms_sign" id="sms_sign" class="input-txt">
          <p class="notic">短信商平台设置的签名</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">测试对象手机号</dt>
        <dd class="opt">
          <input type="text" value="" name="sms_test" id="sms_test" class="input-txt">
          <input type="button" value="测试" name="send_test_sms" class="input-btn" id="send_test_sms">
          <p class="notic">如：18108129768</p>
        </dd>
      </dl>
      <div class="bot"><a href="JavaScript:void(0);" class="btn btn-warning radius" id = "getup">确认提交</a></div>
    </div>
  </form>
</div>
<script>
$(document).ready(function(){
	$('#send_test_sms').click(function(){
		var data = $("form").serialize();
		$.ajax({
			type:'POST',
			data : data,
			url:'send_test',
			error:function(){
					layer.msg('测试短信发送失败，请确认配置');
				},
			success:function(data){
			if(data.state=='403'){
							    login_ajax('shopadmin',data);
							}
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
					layer.alert('修改失败',{
						icon: 2,
						skin: 'layer-ext-moon'
					});
				},
			success:function(data){
			if(data.state=='403'){
							    login_ajax('shopadmin',data);
							}
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
