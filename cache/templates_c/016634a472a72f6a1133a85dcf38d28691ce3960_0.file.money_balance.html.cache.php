<?php
/* Smarty version 3.1.29, created on 2017-09-14 09:17:46
  from "D:\www\yunjuke\application\vmall\views\money_balance.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59b9d8ba10f5c5_40757075',
  'file_dependency' => 
  array (
    '016634a472a72f6a1133a85dcf38d28691ce3960' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\money_balance.html',
      1 => 1498791059,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59b9d8ba10f5c5_40757075 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2685659b9d8b9eda963_14486135';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>我的余额</title>
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/weui1.css">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
csscss/example.css">
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/jquery-2.1.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/example.js"><?php echo '</script'; ?>
>
</head>
<style>
	.cashcontent{
		width: 80%;
		margin: 50px auto;
		}
	.btn-cash{
		margin-top: 20px;
		display: block;
		border: 1px solid #ddd;
		width: 100%;
		height: 50px;
		border-radius: 5px;
		line-height: 50px;
		text-align: center;
		font-size: 23px;
	}
	.btn-red{
		background: #f44236;
		color: #fff;
	}
	.text-center{
		width: 100%;
		text-align: center;
	}
	.yellowmoney{
		width: 120px;
		margin: 20px auto;
	}
	.yellowmoney img{
		max-width: 100%;
		height: auto;
	}
	a{
		color: #333;
	}
</style>
<body ontouchstart>
	<div class="cashcontent">
		<div class="yellowmoney">
			<img src="<?php if (!empty($_smarty_tpl->tpl_vars['userinfo']->value['head_portrait'])) {
echo $_smarty_tpl->tpl_vars['userinfo']->value['head_portrait'];
}?>" onerror="javascript:this.src='<?php echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['member_logo'];?>
'"alt="" />
		</div>
		<p class="text-center">我的金额 </p>
		<h1 class="text-center">￥<?php if (!empty($_smarty_tpl->tpl_vars['userinfo']->value['balance'])) {
echo $_smarty_tpl->tpl_vars['userinfo']->value['balance'];
} else { ?>0<?php }?></h1>
		<a class="btn-cash btn-red" href="<?php echo base_url();?>
vmall.php/Money/recharge">充值</a>
		<a class="btn-cash" href="<?php echo base_url();?>
vmall.php/Money/drawing">提现</a>
		<a class="btn-cash" href="<?php echo base_url();?>
vmall.php/Money/money_detail">明细</a>
	</div>
</body>
</html>
<?php }
}
