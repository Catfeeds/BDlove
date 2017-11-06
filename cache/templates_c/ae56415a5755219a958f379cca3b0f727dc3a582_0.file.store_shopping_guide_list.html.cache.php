<?php
/* Smarty version 3.1.29, created on 2017-09-09 11:00:30
  from "D:\www\yunjuke\application\vmall\views\store_shopping_guide_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59b3594e5070f8_62312181',
  'file_dependency' => 
  array (
    'ae56415a5755219a958f379cca3b0f727dc3a582' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\store_shopping_guide_list.html',
      1 => 1496817947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink.html' => 1,
  ),
),false)) {
function content_59b3594e5070f8_62312181 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2667859b3594e3e5fa3_88162404';
?>
<html lang="zh-cn" style="opacity: 1; font-size: 109.375px;">
	<head>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<title>选择服务顾问</title>
			<style>
				body {
					background: #fff;
				}
				
				.smSalesList {
					color: #444;
				}
				
				.smSalesList .brandSalesContainer {
					position: absolute;
					z-index: 1101;
					top: 40px;
					right: 0;
					left: 0;
					bottom: 90px;
					padding: 0 15px;
					overflow: auto;
				}
				
				.smSalesList .selectBtn {
					position: absolute;
					z-index: 1101;
					bottom: 0;
					left: 0;
					right: 0;
					display: block;
					text-align: center;
					height: 75px;
					padding-top: 10px;
					color: #9b9b9b;
				}
				
				.smSalesList .selectBtn.ac {
					color: #000;
					font-size: 17px;
					line-height: 70px;
					display: none;
				}
				
				.smSalesList .brandItem .tit {
					color: #888;
					border-bottom: solid 2px #999;
					line-height: 20px;
					margin-top: 15px;
					font-size: 16px;
				}
				
				.smSalesList .brandItem .item {
					width: 33%;
					text-align: center;
					padding: 15px 0 0;
					float: left;
				}
				
				.smSalesList .brandItem .name {
					padding: 3px 0;
					white-space: nowrap;
					overflow: hidden;
					text-overflow: ellipsis;
					height: 18px;
				}
				
				.smSalesList .brandItem .btn {
					padding: 0;
					text-align: center;
					width: 60px;
					color: #888;
					line-height: 28px;
				}
				
				.smSalesList .brandItem .btn.ac {
					background: #db4437;
					color: #fff;
					border-color: #db4437;
				}
				
				.chooseSalesBox .title {
					text-align: center;
					font-size: 16px;
					padding: 20px 0 10px;
					line-height: 24px;
				}
				
				.chooseSalesBox .tit {
					font-size: 14px;
				}
				
				.chooseSalesBox .storeSales {
					overflow: auto;
					position: absolute;
					top: 78px;
					bottom: 80px;
					left: 0;
					right: 0;
				}
				
				.chooseSalesBox .storeSales .item {
					padding: 10px 0;
					border: none;
					height: 44px;
				}
				
				.chooseSalesBox .storeSales .item:active {
					background: #eee;
				}
				
				.chooseSalesBox .storeSales .name {
					line-height: 44px;
				}
				
				a.gotoStore {
					display: block;
					width: 80px;
					height: 40px;
					line-height: 40px;
					color: #fff;
					background: #e04241;
					text-align: center;
					border-radius: 4px;
					margin: 30px auto 0;
				}
				#page{
					position: fixed;
					width: 100%;
					height: 100%;
					background: -webkit-linear-gradient(top, #f2535c,#fd856a);
					background: -o-linear-gradient(bottom, #f2535c,#fd856a);
					background: -moz-linear-gradient(bottom,#f2535c,#fd856a);
					background: linear-gradient(to bottom, #f2535c,#fd856a);
				}
				#page-have{
					position: fixed;
					width: 100%;
					height: 100%;
					background: -webkit-linear-gradient(top, #f2535c,#fd856a);
					background: -o-linear-gradient(bottom, #f2535c,#fd856a);
					background: -moz-linear-gradient(bottom,#f2535c,#fd856a);
					background: linear-gradient(to bottom, #f2535c,#fd856a);
				}
				.noconsultant{
					margin-top: 60%;
					font-size: 20px;
					color: #fff;
					text-align: center;
				}
				.butt{
					background: #fec5b9;
					width: 200px;
					height: 45px;
					font-size: 20px;
					line-height: 45px;
					text-align: center;
					color: #f45d5f;
					margin: 20px auto;
				}
				.servier{
					width: 80%;
					margin: 25% auto;
					background: #fff;
					height: 55%;
					border-radius: 5px;
					padding-top: 25%;
				}
				.servier-img{
					background: #fd5459;
					border-radius: 50%;
					width: 110px;
					height: 110px;
					margin: 0 auto;
				}
				.servier-name{
					color:#6A6A6A;
					padding-top: 20px;
					padding-bottom: 10px;
					text-align: center;
					font-size: 16px;
				}
				.servier-store{
					color:#AAA9A9;
					text-align: center;
					font-size: 16px;
				}
				.btn-tel{
					width: 85%;
					height: 45px;
					margin: 0 auto;
					margin-top: 50px;
					text-align: center;
					background: #fd5459;
					line-height: 45px;
					color: #fff;
					font-size: 18px;
					border-radius: 5px;
				}
			</style>
	</head>

	<body>
		 <div id="content" style="display:block">
			<input type="hidden" id="redirect" value="chat">
			<input type="hidden" id="suid" value="8">
			<div class="chooseSalesBox">
				<?php if (!empty($_smarty_tpl->tpl_vars['guide_info']->value)) {?>
				<div class="title">
				      <div>服务顾问在此恭候多时了</div>
					  <div class="tit">请选择一位，她将随时为您提供服务</div>
				</div>
				<div class="storeSales">
				     <?php
$_from = $_smarty_tpl->tpl_vars['guide_info']->value;
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
							<div class="item wbox" data-id="<?php echo $_smarty_tpl->tpl_vars['val']->value['spg_id'];?>
">
								<img src="<?php echo base_url();
echo $_smarty_tpl->tpl_vars['val']->value['head_portrait'];?>
" class="size43 round">
								<div class="name wbox-1 with-go-right">
									<div class="namer"><?php echo $_smarty_tpl->tpl_vars['val']->value['spg_nike_name'];?>
</div>
								</div>
							</div>
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
				<?php } else { ?>
					<div class="title">
				   		<div class="otherecshopping">该店铺还没有服务顾问，点击查看其它店铺！</div>
					</div>
				<?php }?>
			</div>
		</div>	

	

		
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
		
		$(".storeSales").on("click", ".wbox", function(e) {
			spg_id  = $(this).data("id");
			location.href = "<?php echo base_url();?>
vmall.php/store/shopping_guide_chat?spg_id="+spg_id;
		});
		
		$("body").on("click", ".otherecshopping", function() {
			location.href = "<?php echo base_url();?>
vmall.php/store/stores";
		});
		<?php echo '</script'; ?>
>

	</body>

</html><?php }
}
