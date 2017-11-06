<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:24:28
  from "D:\www\yunjuke\application\admin\views\member_step_phone.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59801e9ceee317_76272650',
  'file_dependency' => 
  array (
    'fc188dcb97ffca539e1626c9c22e30e6a31ad40f' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\member_step_phone.html',
      1 => 1492225943,
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
function content_59801e9ceee317_76272650 ($_smarty_tpl) {
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
				<h3>账号同步</h3>
				<h5>设置使用第三方账号登录本站</h5>
			</div>
			<ul class="tab-base nc-row">
				<li><a href="member_step_qq"><span>QQ互联</span></a></li>
				<li><a href="member_step_sina"><span>新浪微博</span></a></li>
				<li><a class="current"><span>手机短信</span></a></li>
				<li><a href="member_step_weixin"><span>微信登录</span></a></li>
			</ul>
		</div>
	</div>
	<!--操作提示-->
	<div class="explanation" id="explanation">
		<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
			<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
			<span id="explanationZoom" title="收起提示"></span> </div>
		<ul>
			<li>启用前需向运营商申请开通服务帐号，可在data\config\config.ini.php中设置相关参数。</li>
			<li>各项功能默认为关闭状态，根据实际情况选择是否开启。</li>
		</ul>
	</div>
	<form method="post" name="settingForm" id="settingForm">
		
		<div class="ncap-form-default">
			<dl class="row">
				<dt class="tit">
					<label>手机注册</label>
				</dt>
				<dd class="opt">
					<div class="onoff">
						<label for="sms_register_1" class="cb-enable  selected " title="开启"><span>开启</span></label>
						<label for="sms_register_0" class="cb-disable " title="关闭"><span>关闭</span></label>
						<input type="radio" id="sms_register_1" name="sms_register" value="1"  checked >
						<input type="radio" id="sms_register_0" name="sms_register" value="0" >
					</div>
					<p class="notic">开启后可使用手机短信动态码来注册商城会员</p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label>手机登录</label>
				</dt>
				<dd class="opt">
					<div class="onoff">
						<label for="sms_login_1" class="cb-enable " title="开启"><span>开启</span></label>
						<label for="sms_login_0" class="cb-disable  selected " title="关闭"><span>关闭</span></label>
						<input type="radio" id="sms_login_1" name="sms_login" value="1" >
						<input type="radio" id="sms_login_0" name="sms_login" value="0"  checked >
					</div>
					<p class="notic">开启后可使用手机短信动态码来登录商城，如果用户量较大建议关闭</p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label>找回密码</label>
				</dt>
				<dd class="opt">
					<div class="onoff">
						<label for="sms_password_1" class="cb-enable  selected " title="开启"><span>开启</span></label>
						<label for="sms_password_0" class="cb-disable " title="关闭"><span>关闭</span></label>
						<input type="radio" id="sms_password_1" name="sms_password" value="1"  checked >
						<input type="radio" id="sms_password_0" name="sms_password" value="0" >
					</div>
					<p class="notic">开启后可使用手机短信来找回登录密码</p>
				</dd>
			</dl>
			<div class="bot"><a href="JavaScript:void(0);" onclick="submit()" class="ncap-btn-big ncap-btn-green" >确认提交</a></div>
		</div>
	</form>


</div>
<script>

function submit(){
	form_data = $("#settingForm").serialize();
	$.ajax({
		type: "post",
        url: "member_phone_edit",
        data: form_data,
        dataType: "json",
        success: function(data){
        		layer.msg(data.msg);
        }
	})
}
//console.log(form_data)
	

</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
