<?php
/* Smarty version 3.1.29, created on 2017-10-17 14:43:56
  from "D:\www\yunjuke\application\vmall\views\user_center.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e5a6acb8d303_39803399',
  'file_dependency' => 
  array (
    '4bd65e7d0d95dc40496f92f824b8b16446727ea9' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_center.html',
      1 => 1507529212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink-c.html' => 1,
  ),
),false)) {
function content_59e5a6acb8d303_39803399 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '543759e5a6ac90c868_16144778';
?>
<html lang="zh-cn">

	<head>
		<title>个人中心</title>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink-c.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<link href="<?php echo TEMPLE;?>
css/userc.css" rel="stylesheet" type="text/css">
			<link href="<?php echo TEMPLE;?>
css/style.css" rel="stylesheet" type="text/css">
			<style>
				p{
					font-size: .13rem;
				}
				header {
					background-image: url(<?php echo TEMPLE;?>
images/user_bg.png);
					padding:.4rem .15rem;

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
				
				.forward:after {
					right: .2rem;
					width: 0.1rem;
					height: .1rem;
					border: 2px solid #999;
					border-bottom: transparent;
					border-left: transparent;
				}
				
				.f26 {
					font-size: 24px;
				}
				.money-num{
					color: #999;
					font-size: 15px;
					margin-left: 38%;
				}
				.user_info{
					display: flex;
					justify-content: space-between;
				}
				.user_img{
					width:.5rem;
					height: .5rem;
				}
				.user_bd{
					width:1.9rem;
					align-self: center;
					color: #fff;
				}
				.user_name{
					font-size: .13rem;
					margin-bottom: 0.1rem;
				}
				.user_name img{
					width:.33rem;
					height:auto;
					margin-top:-.02rem;
					margin-left:.05rem;
				}
				.user_other span{
					font-size:.1rem;
					padding:.02rem.06rem;
					background: #e6992b;
					border-radius:50px;
					margin-right:0.07rem;
				}
				.user_n{
					max-width:1.2rem;
					white-space: nowrap;
					overflow: hidden;
					text-overflow: ellipsis;
					display: inline-block;
					margin-left:.05rem;
				}
				.user_ft{
					align-self: center;
					color: #fff;
					font-weight: 600;
				}
				.classify{
					display: flex;
					flex-wrap: wrap;
					background: #fff;
					margin-bottom:.15rem;
					font-size:.12rem;
				}
				.classify_chile{
					width:37%;
					padding:.2rem;
					display: flex;
					justify-content: flex-start;
					align-items: center;
				}

				.icon{
					width:.3rem;
					height:.3rem;
					line-height: .3rem;
					font-size: .16rem;
					text-align: center;
					background: #fec73d;
					color: #fff;
					-webkit-border-radius: 50%;
					-moz-border-radius: 50%;
					border-radius: 50%;
				}
				.classify_title{
					margin-left:.1rem;
					line-height:.16rem;
					font-weight: 500;
				}
				.classify_title span{
					color: #999;
					font-size:.1rem;
					font-weight: 400;
				}
				.num{
					color: red!important;
					padding:0 2px;
				}
				.f-22{
					font-size:.22rem!important;
				}
				.f-17{
					font-size: .17rem;
					line-height:.27rem;
				}
				.mb-15{
					margin-bottom: .15rem;
				}
			</style>
	</head>

	<body style="font-size: 0.15rem;">
		<article>
			<article>
				<a id="outer-2uyxn">
					<a id="inner-c4kl3">
						<header data-v-37f3214e data-v-4f55776b class="ub-img-bg">
							<!--<p class="hd_img"><img src="<?php if (!empty($_smarty_tpl->tpl_vars['userinfo']->value['head_portrait'])) {
echo $_smarty_tpl->tpl_vars['userinfo']->value['head_portrait'];
}?>" onerror="javascript:this.src='<?php echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['member_logo'];?>
'"  class="uw100 uh100 br50 opc4"> </p>-->
							<!--<div class="ub ub-pc ub-ac mt20 mb20 hd_txt">-->
								<!--<span class="lico"><span ><i  class="iconfont f24 db c-gold"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['mld_name'];?>
</i></span> </span>-->
								<!--<div class="ml5 f16 ub ub-ac">-->
									<!--<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['wx_nickname'];?>
-->
								<!--</div>-->
								<!--<p class="ub ub-ac c-6 pr pl10">-->
									<!--<?php if (!empty($_smarty_tpl->tpl_vars['userinfo']->value['store_name']) && !empty($_smarty_tpl->tpl_vars['userinfo']->value['area_name'])) {?>-->
										<!--<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['store_name'];?>
-->
										<!--<?php } else { ?>未绑定门店-->
									<!--<?php }?>-->
								<!--</p>-->
							<!--</div>-->
							<a class="user_info" href="user_updateperson">
								<div class="user_img"><img src="<?php if (!empty($_smarty_tpl->tpl_vars['userinfo']->value['head_portrait'])) {
echo $_smarty_tpl->tpl_vars['userinfo']->value['head_portrait'];
}?>" onerror="javascript:this.src='<?php echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['member_logo'];?>
'"  class="uw100 uh100 br50"></div>
								<div class="user_bd">
									<p class="user_name"><span class="user_n"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['wx_nickname'];?>
</span><span><img src="<?php echo TEMPLE;?>
images/authentic.png" alt=""></span></p>
									<p class="user_other"><span>L<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['mld_name'];?>
</span>
										<span>
											<?php if (!empty($_smarty_tpl->tpl_vars['userinfo']->value['store_name']) && !empty($_smarty_tpl->tpl_vars['userinfo']->value['area_name'])) {?>
											<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['store_name'];?>

											<?php } else { ?>未绑定门店
											<?php }?>
										</span>
									</p>
								</div>
								<div class="user_ft"><span class="iconfont">&#xe604;</span></div>
							</a>
						</header>
						<section class="classify">
								<a class="classify_chile" href="../index/index<?php if (!empty($_smarty_tpl->tpl_vars['store_id']->value)) {?>?storeId=<?php echo $_smarty_tpl->tpl_vars['store_id']->value;
}?>" >
									<div class="icon"><span class="iconfont f-17">&#xe601;</span></div>
									<div class="classify_title">逛店铺</div><aside></aside>
								</a>
							<a href="<?php echo base_url();?>
vmall.php/store/Stores" class="classify_chile">
								<div class="icon"><span class="iconfont">&#xe61d;</span></div>
								<div class="classify_title">所有门店</div>
							</a>
							<a href="<?php echo base_url();?>
vmall.php/Store/shopping_guide" class="classify_chile">
								<div class="icon"><span class="iconfont f-22">&#xe62d;</span></div>
								<div class="classify_title">我的服务顾问<br><span>给TA留言</span></div>
							</a>
							<a href="<?php echo base_url();?>
vmall.php/Promotion/customerLotteryWheelList" class="classify_chile">
								<div class="icon"><span class="iconfont">&#xe614;</span></div>
								<div class="classify_title">我的卡券<br><span>有<span class="num"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>张可用</span></div>
							</a>
						</section>

						<section class="b-wh md_list mb-15">
							<a href="<?php echo base_url();?>
vmall.php/Money/index"  class="ub ub-ac"><i class="iconfont f26">&#xe6e5;</i>
								<p class="ub-f1 md_item_txt forward">我的余额<span class="money-num">￥<?php if (!empty($_smarty_tpl->tpl_vars['balance']->value)) {
echo $_smarty_tpl->tpl_vars['balance']->value;
} else { ?>0.00<?php }?></span></p>
							</a>
							<a href="<?php echo base_url();?>
vmall.php/Order/index" class="ub ub-ac"><i class="iconfont f26"></i>
								<p class="ub-f1 md_item_txt forward">全部订单</p>
							</a>
						</section>
						<article>
							<section class="b-wh md_list mb-15">
								<a href="<?php echo base_url();?>
vmall.php/user/user_collection?type=goods" class="ub ub-ac"><b class="iconfont f26">&#xe60c;</b>
									<p class="ub-f1 md_item_txt forward">我的收藏商品</p>
								</a>
								<a href="<?php echo base_url();?>
vmall.php/user/user_collection?type=store" class="ub ub-ac"><b class="iconfont f26">&#xe60e;</b>
									<p class="ub-f1 md_item_txt forward">我的收藏店铺</p>
								</a>
							</section>
							<section class="b-wh md_list mb-15">
								<!--购物车隐藏-->
								<!--<a href="<?php echo base_url();?>
vmall.php/user/user_shopping_cart" class="ub ub-ac"><i class="iconfont f26"></i>-->
									<!--<p class="ub-f1 md_item_txt forward">购物车</p>-->
								<!--</a>-->
								<a href="<?php echo base_url();?>
vmall.php/user/user_address" class="ub ub-ac"><i class="iconfont f26"></i>
									<p class="ub-f1 md_item_txt forward">收货地址管理</p>
								</a>
							</section>
						</article>
						<!---->
					</div>
				</div>


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
	<?php echo '</script'; ?>
>

</html><?php }
}
