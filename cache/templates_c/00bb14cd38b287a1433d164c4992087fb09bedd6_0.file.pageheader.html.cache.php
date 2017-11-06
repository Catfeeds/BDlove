<?php
/* Smarty version 3.1.29, created on 2017-04-24 09:55:33
  from "E:\www\yunjuke\application\admin\views\pageheader.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd5b15df0dc8_91776693',
  'file_dependency' => 
  array (
    '00bb14cd38b287a1433d164c4992087fb09bedd6' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1492225917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fd5b15df0dc8_91776693 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '104958fd5b15db4329_12569197';
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
<link type="text/css" rel="stylesheet" href="<?php echo PLUGIN;?>
plugins/select2/css/select2.min.css">
<link href="<?php echo TEMPLE;?>
css/index.css" rel="stylesheet" type="text/css">
<link href="<?php echo TEMPLE;?>
css/index_1.css" rel="stylesheet" type="text/css"> 
<link href="<?php echo TEMPLE;?>
css/font-awesome.min.css" rel="stylesheet" />
<link href="<?php echo TEMPLE;?>
css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo TEMPLE;?>
css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGIN;?>
plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo PLUGIN;?>
plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
css/H-ui.min.css" />

<!--
<link type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
-->
<style type="text/css">
    html, body { overflow: visible;}
</style>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery-ui.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery.mousewheel.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/perfect-scrollbar.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/script.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zh-CN.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/admin.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/flexigrid.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery.validation.min.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery.picTip.js"><?php echo '</script'; ?>
> -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/layer/layer.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/layer/laypage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/laydate/laydate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/select2/js/select2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/spinner/jquery-ui-1.10.4.custom.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/dropdown/js/dependent-dropdown.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
/*ajax过期登录*/
function login_ajax(demo,data){
	layer.msg(data.msg);
	 setTimeout(function(){
		    if(demo=='agent'){
		    	window.location.href="<?php echo base_url('index.php/login');?>
";
		    }else if(demo=='supp'){
		    	window.location.href="<?php echo base_url('supplier.php/login');?>
";
		    }else if(demo=='admin'){
		    	window.location.href="<?php echo base_url('admin.php/login');?>
";
		    }else if(demo=='shop'){
		    	window.location.href="<?php echo base_url('index.php/index/login');?>
";
		    }else if(demo=='shopadmin'){
		    	window.location.href="<?php echo base_url('admin.php/login');?>
";
		    }
	    },2000);
}
<?php echo '</script'; ?>
>
</head><?php }
}
