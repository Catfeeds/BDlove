<?php
/* Smarty version 3.1.29, created on 2017-10-17 14:43:50
  from "D:\www\yunjuke\application\vmall\views\lib\footer.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e5a6a6e665b7_84859615',
  'file_dependency' => 
  array (
    '7d81061d9ca292f05d706f6c44298f7701559782' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\footer.html',
      1 => 1498791059,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e5a6a6e665b7_84859615 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3233459e5a6a6e089a9_20273438';
?>
<footer class="store_footer_new bde4-b foot_new_cart">
  <div class="ub ub-ac">
    <a id="home" <?php if (!empty($_smarty_tpl->tpl_vars['colorflag']->value) && $_smarty_tpl->tpl_vars['colorflag']->value == "index") {?>style="color: #ff4436 !important;"<?php }?> class="ub-f1 ub ub-ver foot_new_sin home"href="<?php echo base_url();?>
vmall.php/index/index">
      <i class="iconfont" style="font-size: 21px;">&#xe601;</i>
      <div class=""  >首页</div>
    </a>
    <a id="stock" <?php if (!empty($_smarty_tpl->tpl_vars['colorflag']->value) && $_smarty_tpl->tpl_vars['colorflag']->value == "goods") {?>style="color: #ff4436 !important;"<?php }?> class="ub-f1 ub ub-ver foot_new_sin stock" href="<?php echo base_url();?>
vmall.php/goods/index">
      <i class="iconfont" style="font-size: 21px;">&#xe67b;</i>
      <div class=""  >商品</div>
    </a>
    <a id="cart" class="ub-f1 ub ub-ver foot_new_sin cart" <?php if (!empty($_smarty_tpl->tpl_vars['colorflag']->value) && $_smarty_tpl->tpl_vars['colorflag']->value == "carts") {?>style="color: #ff4436 !important;position:relative;"<?php }?> href="<?php echo base_url();?>
vmall.php/user/user_shopping_cart">
      <i class="iconfont" style="font-size: 21px;">&#xe635; <?php if (!empty($_smarty_tpl->tpl_vars['userCartTotal']->value) && $_smarty_tpl->tpl_vars['userCartTotal']->value > 0) {?><span class="weui-badge" id="userCartTotal"style="position: absolute;top: -.4em;"><?php echo $_smarty_tpl->tpl_vars['userCartTotal']->value;?>
</span><?php }?>
</i>
      <div class="">购物车</div>
    </a>
    <a id="customer" class="ub-f1 ub ub-ver foot_new_sin cus" data-suid="" href="<?php echo base_url();?>
vmall.php/user/">
      <i class="iconfont" style="font-size: 21px;">&#xe653;</i>
      <div class="">个人中心</div>
    </a>
  </div>
</footer>
    

<!--
判断底部菜单栏
<?php echo '<script'; ?>
>
	var ulr = location.href;
	var t1 = ulr.split("?")[1];
	var t2 = t1.split("=")[1];
	
	switch(t2)
	{
		case 1:
			$("#home").css("color","red !important");
			break;
		case 2:
			$("#stock").css("color","red !important");
			break;
		case 3:
			$("#cart").css("color","red !important");
			break;
		case 4:
			$("#custorm").css("color","red !important");
			break;
	}
<?php echo '</script'; ?>
>-->
<?php }
}
