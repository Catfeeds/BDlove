<?php
/* Smarty version 3.1.29, created on 2017-04-24 10:23:49
  from "E:\www\yunjuke\application\vmall\views\user_address.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd61b566d295_55764271',
  'file_dependency' => 
  array (
    '111a8aacd5fb92d78b8eb6941d990c13c480e619' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\user_address.html',
      1 => 1492857804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink.html' => 1,
  ),
),false)) {
function content_58fd61b566d295_55764271 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2501258fd61b55b5e50_67457241';
?>
<!DOCTYPE html>
<html>
<head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title>我的收货人</title>
<style>
.addr-list dl{box-sizing:border-box;padding-left: 15px;}
a.addr{display: block;width: 100%;}
a.addr .item{width: 100%; overflow: hidden;text-overflow:ellipsis;word-break:break-all;}
a.newAddress{line-height: 40px;color: #e04241;display: block;text-align: center;}
</style>
</head>
	<body>
		<section class="addr-list"><dl class="bde4-b default">
		<dd>
	        <a class="addr" href="javascript:;" data-id="265483">
		        <div><?php if (!empty($_smarty_tpl->tpl_vars['address']->value['addressPicker'])) {
echo $_smarty_tpl->tpl_vars['address']->value['addressPicker'];
} else { ?>xxx省  xxx市  xxx区<?php }?> <span class="defaultAddrIcon">默认地址</span></div>
		        <div><?php if (!empty($_smarty_tpl->tpl_vars['address']->value['address'])) {
echo $_smarty_tpl->tpl_vars['address']->value['address'];
} else { ?>xxx街道<?php }?></div>
		        <div>tel&nbsp;&nbsp;<?php if (!empty($_smarty_tpl->tpl_vars['address']->value['tel'])) {
echo $_smarty_tpl->tpl_vars['address']->value['tel'];
} else { ?>xxxxxxxxxxx<?php }?></div>
	        </a>
	        <a href="javascript:;"  class="edit"><i class="iconfont"></i></a>
      	</dd>
   </dl>
</section>
<a class="newAddress bde4" href="javascript:;">
  <i class="iconfont fs16 fw-bold"></i> 新增收货人
</a>
	</body>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		$('.addr-list').on("click","a.addr",function(e){
  e.preventDefault();
  $(this).parent().find("a.edit").click();
}).on("click","a.edit",function(e){
   e.preventDefault();
   sessionStorage.receiveAddressJson = $(this).attr('data-addrjson');
   var addressPicker = "<?php echo $_smarty_tpl->tpl_vars['address']->value['addressPicker'];?>
";
   if(addressPicker==""){
	   location.href="user_address_add?op=add";
   }else{
	   location.href="user_address_add?op=edit";
   }
   
   
});

$(".newAddress").on("click",function(e){
  e.preventDefault();
  if(sessionStorage.receiveAddressJson){
    sessionStorage.removeItem('receiveAddressJson');
  }
  location.href="user_address_add?op=add";
});
	<?php echo '</script'; ?>
>
</html>
<?php }
}
