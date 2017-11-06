<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:37:38
  from "D:\www\yunjuke\application\admin\views\mail_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841632c29470_47262759',
  'file_dependency' => 
  array (
    'eda867718bd733457c30a2a8630afa500083f95c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mail_set.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59841632c29470_47262759 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '5359841632af8927_59984218';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value['server'];?>
" name="server" id="server" class="input-txt">
          <p class="notic">设置 SMTP 服务器的地址，如 smtp.163.com</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">SMTP 端口</dt>
        <dd class="opt">
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value['port'];?>
" name="port" id="port" class="input-txt">
          <p class="notic">设置 SMTP 服务器的端口，默认为 25</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">发信人邮件地址</dt>
        <dd class="opt">
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value['user_address'];?>
" name="email" id="email" class="input-txt">
          <p class="notic">使用SMTP协议发送的邮件地址，如 system@erp.com</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">SMTP 身份验证用户名</dt>
        <dd class="opt">
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value['user_name'];?>
" name="user_name" id="user_name" class="input-txt">
          <p class="notic">如 system</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">SMTP 身份验证密码</dt>
        <dd class="opt">
          <input type="password" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value['password'];?>
" name="mail_password" id="mail_password" class="input-txt">
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
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
><div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
