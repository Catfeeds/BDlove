<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:24:52
  from "D:\www\yunjuke\application\admin\views\member_step_weixin.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59801eb48774d2_34067217',
  'file_dependency' => 
  array (
    '4b6975e3a00112c54ed317e4cdd7ea1dbc68be66' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\member_step_weixin.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59801eb48774d2_34067217 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2960059801eb4771914_58162032';
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
				<li><a href="member_step_phone"><span>手机短信</span></a></li>
				<li><a class="current"><span>微信登录</span></a></li>
			</ul>
		</div>
	</div>
	<!--操作提示-->
	<div class="explanation" id="explanation">
		<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
			<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
			<span id="explanationZoom" title="收起提示"></span> </div>
		<ul>
			<li>启用前需在微信开放平台注册开发者帐号，创建网站应用并获得相应的AppID和AppSecret。</li>
			<li>网站应用的微信登录，通过微信扫描二维码来实现。</li>
		</ul>
	</div>
	<form method="post" name="settingForm" id="settingForm">
		
		<div class="ncap-form-default">
			<dl class="row">
				<dt class="tit">
					<label>是否启用微信登录功能</label>
				</dt>
				<dd class="opt">
					<div class="onoff">
						<label for="weixin_isuse_1" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['data']->value['isuse'] == 1) {?> selected <?php }?>" title="开启"><span>开启</span></label>
						<label for="weixin_isuse_0" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['data']->value['isuse'] == 0) {?> selected <?php }?>" title="关闭"><span>关闭</span></label>
						<input type="radio" id="weixin_isuse_1" name="weixin_isuse" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['isuse'] == 1) {?> checked="checked" <?php }?>>
						<input type="radio" id="weixin_isuse_0" name="weixin_isuse" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['isuse'] == 0) {?> checked="checked" <?php }?>>
					</div>
					<p class="notic">启用后支持使用微信帐号来登录</p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="weixin_appid">应用标识</label>
				</dt>
				<dd class="opt">
					<input id="weixin_appid" name="weixin_appid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appid'];?>
" class="input-txt" type="text"><span class="err"></span>
					<p class="notic"><a class="ncap-btn" target="_blank" href="https://open.weixin.qq.com/">立即在线申请</a></p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="weixin_appkey">应用密钥</label>
				</dt>
				<dd class="opt">
					<input id="weixin_appkey" name="weixin_secret" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appkey'];?>
" class="input-txt" type="text"><span class="err"></span>
					<p class="notic">&nbsp;</p>
				</dd>
			</dl>
			<div class="bot"><a href="JavaScript:void(0);" id="submitBtn" class="ncap-btn-big ncap-btn-green" >确认提交</a></div>
		</div>
	</form>


</div>
<?php echo '<script'; ?>
>
$(function(){
	$("#submitBtn").click(function(){
		if($("#settingForm").valid()){
			form_data = $("#settingForm").serialize();
			//console.log(form_data)
			$.ajax({
				type: "post",
		        url: "member_weixin_edit",
		        data: form_data,
		        dataType: "json",
		        success: function(data){
		        		layer.msg(data.msg);
		        }
			})
		}
	});
	$('#settingForm').validate({
		errorPlacement: function(error, element){
			var error_td = element.parent('dd').children('span.err');
			error_td.append(error);
		},
		rules : {
			weixin_appid: {required : true,},
			weixin_secret   : {required : true,}
		},
		messages : {
			weixin_appid : {required: '<i class="fa fa-exclamation-circle"></i>请填写应用标识 '},
			weixin_secret : {required: '<i class="fa fa-exclamation-circle"></i>请填写应用密钥 '},

		}
	});
})

<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
