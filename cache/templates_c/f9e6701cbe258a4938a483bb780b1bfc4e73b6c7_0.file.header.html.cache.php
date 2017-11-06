<?php
/* Smarty version 3.1.29, created on 2017-08-04 15:09:11
  from "D:\www\yunjuke\application\index\views\lib\header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841d97ed9c44_41550422',
  'file_dependency' => 
  array (
    'f9e6701cbe258a4938a483bb780b1bfc4e73b6c7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\index\\views\\lib\\header.html',
      1 => 1501815525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59841d97ed9c44_41550422 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '569159841d97e87bb2_71140179';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>云聚客</title>
	<link href="favicon.ico" rel="shortcut icon" />
<link rel="Shortcut Icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico" />
<meta content="成都云聚客科技有限公司" name="author" />
<meta content="Copyright 1999-2017. www.jukeyunduan.cn . All Rights Reserved." name="copyright" />
<meta name="application-name" content="云聚客" />
	<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
css/style.css" />
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery-1.9.1.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/bootstrap.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=7MH97gy8hQKq7T4iiQ4GWdzxIudjKGh5"><?php echo '</script'; ?>
>
	<style>
		h4{
			font-size: 17px;
			font-weight: 500;
		}
	</style>
</head>

<body>
<div class="float-top">
	<div style="width: 1200px;margin: 0 auto;">
		<img src="<?php echo TEMPLE;?>
images/logo.png" alt="logo" class="logo pull-left" />
		<div class="login pull-right">
			<a href="<?php echo base_url();?>
admin.php" target="_blank">后台登录&nbsp;&nbsp;</a><span>|</span>
			<a href="<?php echo base_url();?>
pay.php" target="_blank">收银登录</a>
		</div>
		<ul class="list-inline top-menu pull-left">
			<li class="<?php if ($_smarty_tpl->tpl_vars['id']->value == 1) {?> tab-active <?php }?>">
				<a href="<?php echo base_url();?>
index.php/Index/index">首页</a>
			</li>
			<li class="<?php if ($_smarty_tpl->tpl_vars['id']->value == 2) {?> tab-active <?php }?>">
				<a href="<?php echo base_url();?>
index.php/Index/programm">软件开发</a>
			</li>
			<li class="<?php if ($_smarty_tpl->tpl_vars['id']->value == 3) {?> tab-active <?php }?>">
				<a href="<?php echo base_url();?>
index.php/Index/allChannel">全渠道运营</a>
			</li>
			<li class="<?php if ($_smarty_tpl->tpl_vars['id']->value == 4) {?> tab-active <?php }?>">
				<a href="<?php echo base_url();?>
index.php/Index/memberService">会员服务</a>
			</li>
			<li class="<?php if ($_smarty_tpl->tpl_vars['id']->value == 5) {?> tab-active <?php }?>">
				<a href="<?php echo base_url();?>
index.php/Index/addUs">加入我们</a>
			</li>
		</ul>
	</div>
</div>
<?php }
}
