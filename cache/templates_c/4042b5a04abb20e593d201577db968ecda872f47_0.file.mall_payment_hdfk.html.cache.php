<?php
/* Smarty version 3.1.29, created on 2017-08-02 18:18:12
  from "D:\www\yunjuke\application\admin\views\mall_payment_hdfk.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5981a6e4b2f5c3_49289475',
  'file_dependency' => 
  array (
    '4042b5a04abb20e593d201577db968ecda872f47' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_payment_hdfk.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5981a6e4b2f5c3_49289475 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '159545981a6e4a1a000_17113925';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">

<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="mall_payment" title="返回支付方式列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>支付方式 - 设置“货到付款”</h3>
                <h5>商城购物可使用支付方式/接口设置</h5>
            </div>
        </div>
    </div>
    <form id="post_form" action="mall_payment_submit" method="post" name="form1">
        <input type="hidden" name="form_submit" value="ok">
        <input type="hidden" name="payment_code" value="hdfk">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">启用</dt>
                <dd class="opt">
                    <div class="onoff">
                        <label for="payment_state1" class="cb-enable <?php if (isset($_smarty_tpl->tpl_vars['payment']->value['state'])) {
if ($_smarty_tpl->tpl_vars['payment']->value['state'] != 0) {?>selected<?php }
} else { ?>selected<?php }?>">是</label>
                        <label for="payment_state2" class="cb-disable <?php if (isset($_smarty_tpl->tpl_vars['payment']->value['state'])) {
if ($_smarty_tpl->tpl_vars['payment']->value['state'] == 0) {?>selected<?php }
}?>">否</label>
                        <input type="radio" <?php if (isset($_smarty_tpl->tpl_vars['payment']->value['state'])) {
if ($_smarty_tpl->tpl_vars['payment']->value['state'] != 0) {?>checked<?php }
} else { ?>checked<?php }?> value="1" name="payment_state" id="payment_state1">
                        <input type="radio" <?php if (isset($_smarty_tpl->tpl_vars['payment']->value['state'])) {
if ($_smarty_tpl->tpl_vars['payment']->value['state'] == 0) {?>checked<?php }
}?> value="0" name="payment_state" id="payment_state2">
                    </div>
                    <p class="notic"></p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn" onclick="document.form1.submit()">确认提交</a></div>
        </div>
    </form>
</div>
<?php echo '<script'; ?>
>
<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
