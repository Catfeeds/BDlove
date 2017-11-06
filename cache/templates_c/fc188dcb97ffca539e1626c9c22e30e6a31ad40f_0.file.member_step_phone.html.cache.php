<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:24:28
  from "D:\www\yunjuke\application\admin\views\member_step_phone.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59801e9cdc54c8_74426966',
  'file_dependency' => 
  array (
    'fc188dcb97ffca539e1626c9c22e30e6a31ad40f' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\member_step_phone.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59801e9cdc54c8_74426966 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1531459801e9cc6d877_10639237';
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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
						<label for="sms_register_1" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['data']->value['register'] == 1) {?> selected <?php }?>" title="开启"><span>开启</span></label>
						<label for="sms_register_0" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['data']->value['register'] == 0) {?> selected <?php }?>" title="关闭"><span>关闭</span></label>
						<input type="radio" id="sms_register_1" name="sms_register" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['register'] == 1) {?> checked <?php }?>>
						<input type="radio" id="sms_register_0" name="sms_register" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['register'] == 0) {?> checked <?php }?>>
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
						<label for="sms_login_1" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['data']->value['login'] == 1) {?> selected <?php }?>" title="开启"><span>开启</span></label>
						<label for="sms_login_0" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['data']->value['login'] == 0) {?> selected <?php }?>" title="关闭"><span>关闭</span></label>
						<input type="radio" id="sms_login_1" name="sms_login" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['login'] == 1) {?> checked <?php }?>>
						<input type="radio" id="sms_login_0" name="sms_login" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['login'] == 0) {?> checked <?php }?>>
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
						<label for="sms_password_1" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['data']->value['password'] == 1) {?> selected <?php }?>" title="开启"><span>开启</span></label>
						<label for="sms_password_0" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['data']->value['password'] == 0) {?> selected <?php }?>" title="关闭"><span>关闭</span></label>
						<input type="radio" id="sms_password_1" name="sms_password" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['password'] == 1) {?> checked <?php }?>>
						<input type="radio" id="sms_password_0" name="sms_password" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['password'] == 0) {?> checked <?php }?>>
					</div>
					<p class="notic">开启后可使用手机短信来找回登录密码</p>
				</dd>
			</dl>
			<div class="bot"><a href="JavaScript:void(0);" onclick="submit()" class="ncap-btn-big ncap-btn-green" >确认提交</a></div>
		</div>
	</form>


</div>
<?php echo '<script'; ?>
>

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
	

<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
