<?php
/* Smarty version 3.1.29, created on 2017-11-01 14:05:02
  from "D:\www\yunjuke\application\admin\views\pageheader.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f9640e862033_38765266',
  'file_dependency' => 
  array (
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1505983976,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f9640e862033_38765266 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2219359f9640e7f4a16_83377432';
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
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/common/common.js"><?php echo '</script'; ?>
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
                window.location.href="<?php echo base_url('admin.php/index/login');?>
";
            }
        },2000);
}
<?php echo '</script'; ?>
>
</head><?php }
}
