<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:38:03
  from "D:\www\yunjuke\application\admin\views\sms_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5984164ba36ed0_37159430',
  'file_dependency' => 
  array (
    '3120b7c7a724f1827f7721fa9bd49eea08a5c081' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\sms_set.html',
      1 => 1492252010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5984164ba36ed0_37159430 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '273135984164b992db8_72693093';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['sms']->value['user'];?>
" name="user" id="user" class="input-txt">
          <p class="notic">短信商提供的用户</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">密码</dt>
        <dd class="opt">
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['sms']->value['password'];?>
" name="password" id="password" class="input-txt">
          <p class="notic">短信商提供的密码</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">签名</dt>
        <dd class="opt">
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['sms']->value['sms_sign'];?>
" name="sms_sign" id="sms_sign" class="input-txt">
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
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
><div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
