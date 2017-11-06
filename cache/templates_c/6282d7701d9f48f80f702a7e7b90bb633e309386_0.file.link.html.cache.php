<?php
/* Smarty version 3.1.29, created on 2017-08-04 09:21:31
  from "D:\www\yunjuke\application\pay\views\lib\link.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5983cc1b1e68f1_99081731',
  'file_dependency' => 
  array (
    '6282d7701d9f48f80f702a7e7b90bb633e309386' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\lib\\link.html',
      1 => 1500887409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5983cc1b1e68f1_99081731 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '159955983cc1b1b3c67_58749237';
?>
	<link href="<?php echo TEMPLE;?>
css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<link href="<?php echo TEMPLE;?>
css/sweetalert.css" type="text/css" rel="stylesheet">
		<link href="<?php echo TEMPLE;?>
css/animate_new.css" type="text/css" rel="stylesheet">
		<link href="<?php echo TEMPLE;?>
css/style.css" type="text/css" rel="stylesheet">
		<link href="<?php echo TEMPLE;?>
css/app.css" type="text/css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="<?php echo PLUGIN;?>
plugins/select2/css/select2.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui.admin/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui/css/H-ui.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo PLUGIN;?>
plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
		<link href="<?php echo TEMPLE;?>
css/font-awesome.css" type="text/css" rel="stylesheet">
		<!-- Mainly scripts -->
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/jquery.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/jquery.metisMenu.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/jquery.slimscroll.min.js" type="text/javascript"><?php echo '</script'; ?>
>
		<!-- Custom and plugin javascript -->
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/select2.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/inspinia.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/sweetalert.min.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/jquery.qrcode.min.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo PLUGIN;?>
plugins/common/common.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/select2/js/select2.min.js"><?php echo '</script'; ?>
>
		<!----开放式头部，请在自己的页面加上--</head>-->
		<?php echo '<script'; ?>
 type="text/javascript">
			$(function() {
				var system = {};
				var p = navigator.platform;
				system.win = p.indexOf("Win") == 0;
				system.mac = p.indexOf("Mac") == 0;
				system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
				if(system.win || system.mac || system.xll) {
					//pc
				} else {
					//mobile
					$(".iconList li").eq(0).hide();
					$(".iconList li").eq(3).hide();
					$(".iconList li").eq(5).hide();
					$(".iconList li").eq(6).hide();
					$(".iconList li").eq(7).hide();
					$(".iconList li").eq(8).hide();
				}
			})
		<?php echo '</script'; ?>
><?php }
}
