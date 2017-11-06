<?php
/* Smarty version 3.1.29, created on 2017-04-24 11:11:12
  from "E:\www\yunjuke\application\vmall\views\user_center.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd6cd0acda12_16539409',
  'file_dependency' => 
  array (
    'a76181bfe7f1813d710b8f122f306a326eb74752' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\user_center.html',
      1 => 1493003095,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink-c.html' => 1,
  ),
),false)) {
function content_58fd6cd0acda12_16539409 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2901058fd6cd09a0ab9_81086816';
?>
<html lang="zh-cn">

	<head>
		<title>个人中心</title>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink-c.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<link href="<?php echo TEMPLE;?>
css/userc.css" rel="stylesheet" type="text/css">
			<style>
				header {
					background-image: url(//qncdn.qiakr.com/5_0/bg_wh.png)
				}
				
				.to_home_btn>aside,
				.to_home_btn {
					border-radius: 50%;
					background-color: #f34a5a;
					color: #fff;
					transition: transform .4s;
					-webkit-transition: transform .4s
				}
				
				.to_home_btn>aside {
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					z-index: -1
				}
				
				.to_home_btn {
					position: fixed;
					bottom: 2rem;
					left: 50%;
					width: 0.6rem;
					height: 0.6rem;
					transform: translateX(-50%);
					-webkit-transform: translateX(-50%);
					opacity: .8;
					font-size: 0.15rem;
					color: #fff !important;
				}
				
				.hd_img {
					width: 0.4667rem;
					height: 0.4667rem;
					margin: .1rem auto 0;
					border-radius: 50%;
					border: .01rem solid #fff;
					-webkit-box-shadow: 0 3px 5px rgba(0, 0, 0, .27), 0 0 60px rgba(0, 0, 0, .1) inset
				}
				
				.md_ico {
					width: 0.5rem;
					height: 0.4rem;
					margin: 0 auto;
					background: url(//qncdn.qiakr.com/5_0/customer_icons.png) no-repeat;
					background-size: 0.42rem;
				}
				
				.md_ico_2 {
					background-position: 0 -1.025rem;
					background-size: 0.35rem 2.35rem;
				}
				
				.md_ico_3 {
					background-position: 0 0;
				}
				
				.md>a {
					position: relative;
					display: block;
				}
				
				.md_txt {
					min-height: .2rem;
					line-height: .2rem;
					margin-top: .0133rem;
				}
				
				.md {
					padding: .2rem .2rem;
				}
			</style>
	</head>

	<body style="font-size: 0.15rem;">
		<article>
			<article>
				<div id="outer-2uyxn">
					<div id="inner-c4kl3">
						<!---->
						<header class="p30 mb20 ub-img-bg">
							<!---->
							<!---->
							<p class="hd_img"><img src="//qncdn.qiakr.com/5_0/qia.png" class="uw100 uh100 br50 opc4"> </p>
							<div class="ub ub-pc ub-ac mt20 mb20 hd_txt">
							    <span class="lico"><span ><i  class="iconfont f24 db c-gold"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['mld_name'];?>
</i></span> </span>
								<div class="ml5 f16 ub ub-ac"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['wx_nickname'];?>
</div>
								<p class="ub ub-ac c-6 pr pl10"><?php if (!empty($_smarty_tpl->tpl_vars['userinfo']->value['store_name']) && !empty($_smarty_tpl->tpl_vars['userinfo']->value['area_name'])) {
echo $_smarty_tpl->tpl_vars['userinfo']->value['area_name'];
echo $_smarty_tpl->tpl_vars['userinfo']->value['store_name'];
} else { ?>未绑定门店<?php }?></p>
							</div>
						</header>
						<section class="b-wh ub md mb20">
							<!---->
							<a href="<?php echo base_url();?>
vmall.php/user/user_coupon_list" class="ub-f1 tx-c uw0">
								<div class="md_ico md_ico_2"></div>
								<p class="md_txt"><span class="c-red">1</span> 张</p>
								<p>优惠券</p>
							</a>
							<a href="<?php echo base_url();?>
vmall.php/store/activity_list" class="ub-f1 tx-c uw0">
								<div class="md_ico md_ico_3"></div>
								<p class="md_txt"><span class="c-red">7</span> 个</p>
								<p>当前活动</p>
							</a>
						</section>
						<section class="b-wh md_list mb20">
							<a href="<?php echo base_url();?>
vmall.php/user/user_order" class="ub ub-ac"><i class="iconfont f26"></i>
								<p class="ub-f1 md_item_txt forward">全部订单</p>
							</a>
							<!---->
							<a href="<?php echo base_url();?>
vmall.php/Store/shopping_guide" class="ub ub-ac"><i class="iconfont f26"></i>
								<p class="ub-f1 md_item_txt forward">我的服务顾问</p>
							</a>
							<a href="<?php echo base_url();?>
vmall.php/store/Stores" class="ub ub-ac"><i class="iconfont f26"></i>
								<p class="ub-f1 md_item_txt forward">所有门店</p>
							</a>
						</section>
						<article>
							<section class="b-wh md_list mb20">
								<a href="<?php echo base_url();?>
vmall.php/user/user_address" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">我的预约</p>
								</a>
								<a href="<?php echo base_url();?>
vmall.php/user/user_collection" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">我的收藏</p>
								</a>
								<a href="<?php echo base_url();?>
vmall.php/user/user_address" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">我的奖品</p>
								</a>
							</section>
							<section class="b-wh md_list mb20">
								<a href="<?php echo base_url();?>
vmall.php/user/user_shopping_cart" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">购物车</p>
								</a>
								<a href="<?php echo base_url();?>
vmall.php/user/user_address" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">收货地址管理</p>
								</a>
							</section>
						</article>
						<!---->
					</div>
				</div>
				<a class="to_home_btn ub ub-ac ub-pc" href=".">
					逛店铺
					<aside></aside>
				</a>

			</article>
		</article>
	</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/framework7.picker.min.js"><?php echo '</script'; ?>
>	
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/base.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
var tel = "<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['tel'];?>
";

if(tel==""){
	showMPLoginBox("",<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['user_id'];?>
);
}

<?php echo '</script'; ?>
>
</html><?php }
}
