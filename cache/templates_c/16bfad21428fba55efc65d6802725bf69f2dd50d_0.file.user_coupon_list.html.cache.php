<?php
/* Smarty version 3.1.29, created on 2017-05-05 11:17:13
  from "D:\www\yunjuke\application\vmall\views\user_coupon_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_590beeb9389896_11830767',
  'file_dependency' => 
  array (
    '16bfad21428fba55efc65d6802725bf69f2dd50d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_coupon_list.html',
      1 => 1493954228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink-c.html' => 1,
  ),
),false)) {
function content_590beeb9389896_11830767 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '18838590beeb92a30e4_11029317';
?>
<html>

	<head>
		<title>优惠券</title>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink-c.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<style type="text/css">
				.modal-d {
					position: fixed;
					left: 0;
					top: 0;
					right: 0;
					bottom: 0;
					z-index: 1001;
					-webkit-overflow-scrolling: touch;
					outline: 0;
					overflow: scroll;
					margin: 0 auto
				}
				
				._v-content {
					padding: .1333rem .1rem 1.5rem;
					box-sizing: border-box;
					-webkit-box-sizing: border-box;
				}
				
				.modal-dialog {
					position: absolute;
					left: 50%;
					top: 50%;
					transform: translate(-50%, -50%);
					-webkit-transform: translate(-50%, -50%);
					width: 80%;
					background: #fff;
					border-radius: .15rem
				}
				
				.modal-header {
					border-top-left-radius: .15rem;
					border-top-right-radius: .15rem;
					background: -webkit-gradient(linear, 50% 40%, 54% 100%, from(#f2535c), to(#fd856a));
					color: #fff;
					text-align: center;
					padding: .32rem
				}
				
				.modal-body {
					position: relative;
					min-height: 2.4rem;
					max-height: 8rem;
					padding: .4rem;
					text-align: center
				}
				
				.modal-body input {
					border: 1px solid #e5e5e5;
					padding: .1333rem;
					width: 80%
				}
				
				.modal-footer>a {
					display: inline-block;
					position: relative;
					width: 3rem;
					height: 1rem;
					line-height: 1rem;
					margin: .4rem;
					border-radius: .1rem;
					text-align: center
				}
				
				.modal-toast {
					position: absolute;
					left: 50%;
					top: 50%;
					transform: translate(-50%, -50%);
					-webkit-transform: translate(-50%, -50%);
					min-width: 60%;
					width: 80%;
					padding: .5333rem;
					background: rgba(0, 0, 0, .8);
					color: #fff;
					border-radius: .15rem;
					box-sizing: border-box
				}
				
				.modal-toast.icon {
					text-align: center;
					width: auto
				}
				
				.button.btn-default {
					border: 1px solid #f2535c;
					color: #f2535c;
					background-color: #fff
				}
				
				.button.btn-active {
					border: 1px solid #f2535c;
					color: #fff;
					background-color: #f2535c
				}
				
				.modal-backup {
					position: fixed;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					z-index: 1000;
					background: rgba(0, 0, 0, .5)
				}
				
				.modal-backup.toast {
					background: hsla(0, 0%, 100%, 0)
				}
				
				.fade-enter-active,
				.fade-leave-active {
					transition: opacity .5s;
					-webkit-transition: opacity .5s
				}
				
				.fade-enter,
				.fade-leave-active {
					opacity: 0
				}
				
				.loading-out {
					-webkit-animation: loadingAmt .5s linear infinite;
					margin: 0 auto;
					padding: .1333rem;
					background: -webkit-linear-gradient(#444, #eee)
				}
				
				.loading-in,
				.loading-out {
					width: 1rem;
					height: 1rem;
					border-radius: 50%
				}
				
				.loading-in {
					background: #2a2a2a
				}
				
				@-webkit-keyframes loadingAmt {
					0% {
						-webkit-transform: rotate(0deg)
					}
					to {
						-webkit-transform: rotate(1turn)
					}
				}
				
				@keyframes loadingAmt {
					0% {
						transform: rotate(0deg)
					}
					to {
						transform: rotate(1turn)
					}
				}
			</style>
			<style type="text/css">
				.pull-to-refresh-layer .spinner-holder {
					visibility: hidden
				}
				
				.pull-to-refresh-layer {
					background-image: url(//qncdn.qiakr.com/5_0/r_gif.gif);
					background-repeat: no-repeat;
					background-position: 50%;
					background-size: .8rem .8rem;
					-webkit-transform: scale(1);
					transform: scale(1);
					transition: transform .15s linear;
					-webkit-transition: transform .15s linear;
					margin-bottom: -.2rem
				}
				
				.pull-to-refresh-layer.active {
					-webkit-transform: scale(1.35);
					transform: scale(1.35)
				}
				
				header {
					height: 0.4667rem;
					line-height: 0.4667rem;
					text-align: center;
					border-bottom: 1px solid #ccc;
				}
				
				header>nav:not(:first-child):before {
					content: "";
					display: block;
					position: absolute;
					top: 20%;
					left: 0;
					width: 1px;
					height: 60%;
					background-color: #ccc;
				}
				
				.hd_line {
					position: absolute;
					bottom: 0;
					left: 0;
					width: 50%;
					transition: transform .3s;
					-webkit-transition: -webkit-transform .3s;
				}
				
				.hd_line:after {
					content: "";
					display: block;
					width: 60%;
					height: .0217rem;
					margin: 0 auto;
					background-color: #ff4436;
				}
				
				.item {
					margin-top: .1rem;
					padding: 0 .1337rem;
					border-radius: .08rem;
					color: #fff;
				}
				
				.md_more {
					color: #666;
					margin: .15rem 0;
				}
				
				.item_top {
					padding: .1267rem 0;
					border-bottom: 1px solid #fff;
				}
				
				.item_top>a {
					display: inline-block;
					width: 0.8rem;
					height: 0.3rem;
					line-height: 0.3rem;
					text-align: center;
					border-radius: .0337rem;
					background-color: #fff;
					font-size: 0.15rem;
				}
				
				.item_btm {
					padding: .0137rem 0;
				}
				
				.md_more>i {
					display: block;
					height: 1px;
					margin: 0 .15rem;
					background-color: #ccc;
				}
				
				.mt5 {
					margin-top: .0127rem !important;
				}
				
				.md_list>aside {
					margin-top: 1rem;
				}
				
				.md_list>aside>p {
					color: #666;
					margin: .2rem 0;
				}
				
				.md_list>aside>a {
					display: inline-block;
					padding: .1rem .25rem;
					border: 1px solid #fd5459;
					border-radius: .1rem;
				}
				.coupon-bottom{
					position: fixed;
					bottom: 0;
					width: 100%;
					height: 40px;
					text-align: center;
					color: #fff;
					background: #fd5459;
					line-height: 40px;
				}
			</style>

	</head>

	<body style="font-size: 0.15rem;">
		<div>
			<article>
				<header class="ub">
					<nav class="ub-f1 uw0 pr">可用优惠券</nav>
					<nav class="ub-f1 uw0 pr">已失效</nav>
					<aside class="hd_line" style="transform: translateX(0%);"></aside>
				</header>
				<section class="md_list">
					<aside class="tx-c">
						<p>暂无优惠券信息</p>
						<!---->
						<a href="activity.html#/activityList" class="c-red f16">活动中心</a>
						<!---->
					</aside>
					<div id="outer-fimd9" class="_v-container" style="top: 1.5rem; width: 100%; height: 100%;display: none;">
						<div class="_v-content">
							<!--下拉刷新样式-->
							<div class="pull-to-refresh-layer" style="display: none;"><span class="spinner-holder">
								<img src="" class="arrow"> <span class="text">下拉刷新</span>
								<!---->
								</span>
							</div>
							<div class="item shadow b-red">
								<div class="ub ub-ac item_top f16">
									<div class="ub-f1">
										<p><span class="f24">20</span>元代金券</p>
										<p class="mt5">订单满20.1元可用</p>
									</div>
									<!---->
									<a href="user/user_coupon_use" class="c-red">立即使用</a>
									<!---->
									<!---->
									<!---->
								</div>
								<div class="item_btm">
									<p><span>券号: </span>71539038009024</p>
									<p class="mt5"><span>使用期限: </span>2017.03.04 ~ 2017.05.31</p>
								</div>
							</div>
							<p class="md_more ub ub-ac"><i class="ub-f1 uw0"></i>没有更多了<i class="ub-f1 uw0"></i></p>
							<div class="loading-layer">
								<div class="loader"><span></span><span></span><span></span><span></span></div>
							</div>
						</div>
					</div>
				</section>

			</article>
	
		</div>
		
		<div class="coupon-bottom">
			<p>领劵中心（有0张券可领取）</p>
		</div>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
	</body>

</html><?php }
}
