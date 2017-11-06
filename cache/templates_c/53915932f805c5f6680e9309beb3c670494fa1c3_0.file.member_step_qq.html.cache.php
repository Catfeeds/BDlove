<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:24:13
  from "D:\www\yunjuke\application\admin\views\member_step_qq.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59801e8d8dfe07_91975206',
  'file_dependency' => 
  array (
    '53915932f805c5f6680e9309beb3c670494fa1c3' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\member_step_qq.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59801e8d8dfe07_91975206 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '92059801e8d797bb6_73612979';
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
						<label for="qq_isuse_1" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['data']->value['isuse'] == 1) {?> selected <?php }?>" title="开启"><span>开启</span></label>
						<label for="qq_isuse_0" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['data']->value['isuse'] == 0) {?> selected <?php }?>" title="关闭"><span>关闭</span></label>
						<input type="radio" id="qq_isuse_1" name="qq_isuse" <?php if ($_smarty_tpl->tpl_vars['data']->value['isuse'] == 1) {?> checked <?php }?> value="1"  >
						<input type="radio" id="qq_isuse_0" name="qq_isuse" <?php if ($_smarty_tpl->tpl_vars['data']->value['isuse'] == 0) {?> checked <?php }?> value="0"  >
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
					<textarea name="qq_appcode" rows="6" class="tarea" id="qq_appcode"><?php echo $_smarty_tpl->tpl_vars['data']->value['appcode'];?>
</textarea>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="qq_appid"><em>*</em>应用标识</label>
				</dt>
				<dd class="opt">
					<input id="qq_appid" name="qq_appid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appid'];?>
" class="input-txt" type="text"><span class="err"></span>
					<p class="notic"><a class="ncap-btn" target="_blank" href="http://connect.qq.com">立即在线申请</a></p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="qq_appkey"><em>*</em>应用密钥</label>
				</dt>
				<dd class="opt">
					<input id="qq_appkey" name="qq_appkey" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appkey'];?>
" class="input-txt" type="text"><span class="err"></span>
					<p class="notic">&nbsp;</p>
				</dd>
			</dl>
			<div class="bot"><a href="JavaScript:;" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
		</div>
	</form>


</div>
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
