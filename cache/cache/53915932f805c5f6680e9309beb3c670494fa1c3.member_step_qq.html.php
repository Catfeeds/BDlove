<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:24:13
  from "D:\www\yunjuke\application\admin\views\member_step_qq.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59801e8d9b6bb1_67721883',
  'file_dependency' => 
  array (
    '53915932f805c5f6680e9309beb3c670494fa1c3' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\member_step_qq.html',
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
function content_59801e8d9b6bb1_67721883 ($_smarty_tpl) {
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
			    <li><a class="current"><span>QQ互联</span></a></li>
				<li><a href="member_step_sina"><span>新浪微博</span></a></li>
				<li><a href="member_step_phone"><span>手机短信</span></a></li>
				<li><a href="member_step_weixin"><span>微信登录</span></a></li>
			</ul>
		</div>
	</div>
	<form method="post" id="form_" name="settingForm">
		
		<div class="ncap-form-default">
			<dl class="row">
				<dt class="tit">
					<label>是否启用QQ互联功能</label>
				</dt>
				<dd class="opt">
					<div class="onoff">
						<label for="qq_isuse_1" class="cb-enable  selected " title="开启"><span>开启</span></label>
						<label for="qq_isuse_0" class="cb-disable " title="关闭"><span>关闭</span></label>
						<input type="radio" id="qq_isuse_1" name="qq_isuse"  checked  value="1"  >
						<input type="radio" id="qq_isuse_0" name="qq_isuse"  value="0"  >
					</div>
					<p class="notic">开启后可使用QQ账号登录商城系统</p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label>回调地址</label>
				</dt>
				<dd class="opt">
					1233122321        <p class="notic">在QQ互联平台中会要求填写回调地址。</p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="qq_appcode">域名验证信息</label>
				</dt>
				<dd class="opt">
					<textarea name="qq_appcode" rows="6" class="tarea" id="qq_appcode">12346demo</textarea>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="qq_appid"><em>*</em>应用标识</label>
				</dt>
				<dd class="opt">
					<input id="qq_appid" name="qq_appid" value="12345" class="input-txt" type="text"><span class="err"></span>
					<p class="notic"><a class="ncap-btn" target="_blank" href="http://connect.qq.com">立即在线申请</a></p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="qq_appkey"><em>*</em>应用密钥</label>
				</dt>
				<dd class="opt">
					<input id="qq_appkey" name="qq_appkey" value="1234" class="input-txt" type="text"><span class="err"></span>
					<p class="notic">&nbsp;</p>
				</dd>
			</dl>
			<div class="bot"><a href="JavaScript:;" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
		</div>
	</form>


</div>
<script>
$(function(){
	$("#submitBtn").click(function(){
		if($("#form_").valid()){
			form_data = $("#form_").serialize();
			//console.log(form_data)
			$.ajax({
				type: "post",
		        url: "member_qq_edit",
		        data: form_data,
		        dataType: "json",
		        success: function(data){
		        		layer.msg(data.msg);
		        }
			})
			
		}
	});
	$('#form_').validate({
		errorPlacement: function(error, element){
			var error_td = element.parent('dd').children('span.err');
			error_td.append(error);
		},
		rules : {
			qq_appid: {required : true,},
			qq_appkey   : {required : true,}
		},
		messages : {
			qq_appid : {required: '<i class="fa fa-exclamation-circle"></i>请填写应用标识 '},
			qq_appkey : {required: '<i class="fa fa-exclamation-circle"></i>请填写应用密钥 '},

		}
	});
})
</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
