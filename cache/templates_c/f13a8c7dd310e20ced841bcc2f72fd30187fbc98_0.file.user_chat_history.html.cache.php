<?php
/* Smarty version 3.1.29, created on 2017-05-04 14:56:36
  from "D:\www\yunjuke\application\vmall\views\user_chat_history.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_590ad0a4e7cde4_39449599',
  'file_dependency' => 
  array (
    'f13a8c7dd310e20ced841bcc2f72fd30187fbc98' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_chat_history.html',
      1 => 1493880841,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590ad0a4e7cde4_39449599 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '5469590ad0a4d3c8a4_81063781';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>等待页面</title>
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/weui1.css">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/example.css">
<?php echo '<script'; ?>
 src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"><?php echo '</script'; ?>
>
<style>
	.weui-cell__bd span{
		font-weight: bold;
		padding-right: 10px;
	}
	.content{
		
		overflow: hidden;
    	text-overflow: ellipsis;
    	white-space: nowrap;
	}
	.title{
		margin-left: 10px;
		
	}
</style>
</head>

<body>
	<p class="title">正在联系的导购：</p>
	<div class="weui-cells" style="margin: 0">
		<?php
$_from = $_smarty_tpl->tpl_vars['Chatlog']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
		<?php if ($_smarty_tpl->tpl_vars['val']->value['spg_id'] == $_smarty_tpl->tpl_vars['spg_id']->value) {?>
		<a class="weui-cell weui-cell_access" href="shopping_guide_chat?spg_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['spg_id'];?>
">
			<div class="weui-cell__hd">
				<img src="<?php echo base_url($_smarty_tpl->tpl_vars['val']->value['head_portrait']);?>
" alt="头像" style="width: 50px;height: 50px;margin-right: 10px;border-radius: 50%;">
			</div>
			<div class="weui-cell__bd" style="font-size: 14px;">
				<p class="content"><span><?php echo $_smarty_tpl->tpl_vars['val']->value['spg_nike_name'];?>
</span><?php echo $_smarty_tpl->tpl_vars['val']->value['store_name'];?>
</p>
			</div>
		</a>
		<?php }?>
		<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
if ($__foreach_val_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_0_saved_key;
}
?>
	</div>
	<p class="title">历史联系人：</p>
	<div class="weui-cells" style="margin: 0">
		<?php
$_from = $_smarty_tpl->tpl_vars['Chatlog']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_1_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_1_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_1_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
		<a class="weui-cell weui-cell_access" href="shopping_guide_chat?spg_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['spg_id'];?>
">
			<div class="weui-cell__hd">
				<img src="<?php echo base_url($_smarty_tpl->tpl_vars['val']->value['head_portrait']);?>
" alt="头像" style="width: 50px;height: 50px;margin-right: 10px; border-radius: 50%;">
			</div>
			<div class="weui-cell__bd" style="font-size: 14px;">
				<p class="content"><span><?php echo $_smarty_tpl->tpl_vars['val']->value['spg_nike_name'];?>
</span><?php echo $_smarty_tpl->tpl_vars['val']->value['store_name'];?>
</p>
				<p class="content"><?php echo $_smarty_tpl->tpl_vars['val']->value['send_content'];?>
</p>
			</div>
			<div class="weui-cell__ft"><?php echo date("H:i",$_smarty_tpl->tpl_vars['val']->value['send_time']);?>
</div>
		</a>
		<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_local_item;
}
if ($__foreach_val_1_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_item;
}
if ($__foreach_val_1_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_1_saved_key;
}
?>
	</div>
	
</body>
<?php echo '<script'; ?>
>
	
<?php echo '</script'; ?>
>
</html>
<?php }
}
