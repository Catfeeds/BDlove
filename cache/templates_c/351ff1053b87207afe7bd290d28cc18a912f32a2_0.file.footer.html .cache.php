<?php
/* Smarty version 3.1.29, created on 2017-05-18 09:42:06
  from "D:\www\yunjuke\application\vmall\views\lib\footer.html " */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_591cfbee829eb6_47605777',
  'file_dependency' => 
  array (
    '351ff1053b87207afe7bd290d28cc18a912f32a2' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\footer.html ',
      1 => 1494223619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_591cfbee829eb6_47605777 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '19488591cfbee802da7_34617461';
?>
<footer class="store_footer_new bde4-b foot_new_cart">
  <div class="ub ub-ac">
    <a id="home" class="ub-f1 ub ub-ver foot_new_sin home" href="<?php echo base_url();?>
vmall.php/">
      <i class="iconfont"></i>
      <div class="">首页</div>
    </a>
    <a id="stock" class="ub-f1 ub ub-ver foot_new_sin stock" href="<?php echo base_url();?>
vmall.php/goods">
      <i class="iconfont"></i>
      <div class="">商品</div>
    </a>
    <a id="cart" class="ub-f1 ub ub-ver foot_new_sin cart" href="<?php echo base_url();?>
vmall.php/user/user_shopping_cart">
      <i class="iconfont"></i>
      <div class="">购物车</div>
    </a>
    <a id="customer" class="ub-f1 ub ub-ver foot_new_sin cus" data-suid="8" href="<?php echo base_url();?>
vmall.php/user/">
      <i class="iconfont"></i>
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
