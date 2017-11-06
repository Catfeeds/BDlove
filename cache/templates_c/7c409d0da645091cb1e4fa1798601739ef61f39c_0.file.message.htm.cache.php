<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:09:53
  from "D:\www\yunjuke\application\admin\views\message.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c22251c084d8_59203993',
  'file_dependency' => 
  array (
    '7c409d0da645091cb1e4fa1798601739ef61f39c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\message.htm',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c22251c084d8_59203993 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2645559c22251ae7397_73173116';
?>

<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta charset="UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['errand_store']->value;?>
</title>
<link href="<?php echo TEMPLE;?>
css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="msgpage">
  <div class="msgbox">
    <div class="pic"></div>
    <div class="con">
      <?php echo $_smarty_tpl->tpl_vars['msg_detail']->value;?>
<!--反馈消息-->
	</div>
    <div class="scon"><?php echo $_smarty_tpl->tpl_vars['handle_jump']->value;?>
</div>
    <div class="button">
	<!--此为上一页连接，或也可以调准到其他页面-->
		<?php
$_from = $_smarty_tpl->tpl_vars['links']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_link_0_saved_item = isset($_smarty_tpl->tpl_vars['link']) ? $_smarty_tpl->tpl_vars['link'] : false;
$_smarty_tpl->tpl_vars['link'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['link']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
$__foreach_link_0_saved_local_item = $_smarty_tpl->tpl_vars['link'];
?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['href'];?>
"  class="ncap-btn"><?php echo $_smarty_tpl->tpl_vars['link']->value['text'];?>
</a> 
	  <?php
$_smarty_tpl->tpl_vars['link'] = $__foreach_link_0_saved_local_item;
}
if ($__foreach_link_0_saved_item) {
$_smarty_tpl->tpl_vars['link'] = $__foreach_link_0_saved_item;
}
?>
	  <!--自动跳转链接，和跳转时间-->
	<?php if ($_smarty_tpl->tpl_vars['auto_redirect']->value) {?>
      <?php echo '<script'; ?>
 type="text/javascript"> 
      
	  var seconds = 3;
	  var defaultUrl = <?php echo $_smarty_tpl->tpl_vars['default_url']->value;?>
;
	  onload = function()
	{
		if (defaultUrl == 'javascript:history.go(-1)' && window.history.length == 0)
		  {
			return;
		  }
		window.setInterval(redirection, 1000);
		
	
	}
function redirection()
{
  if (seconds <= 0)
  {
    window.clearInterval();
    return;
  }

  seconds --;
  //document.getElementById('spanSeconds').innerHTML = seconds;
  if (seconds == 0)
  {
    window.clearInterval();	//取消setInterval设置的timeout
    location.href = defaultUrl;
  }
}
	  <?php echo '</script'; ?>
>
	<?php }?>
    </div>
  </div>
</div>
</body>
</html><?php }
}
