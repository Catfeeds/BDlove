<?php
/* Smarty version 3.1.29, created on 2017-08-02 18:16:43
  from "D:\www\yunjuke\application\admin\views\mall_payment_zfb.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5981a68b239d99_67523323',
  'file_dependency' => 
  array (
    'b8d1b7e0a28fc1fe1b49b4e6a058448aa748089e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_payment_zfb.html',
      1 => 1501668996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5981a68b239d99_67523323 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '325095981a68b109244_29807489';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="mall_payment" title="返回支付方式列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>支付方式 - 设置“支付宝”</h3>
                <h5>商城购物可使用支付方式/接口设置</h5>
            </div>
        </div>
    </div>
        <!--操作提示-->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>支付宝在线退款功能要在支付宝网站输入该账号的“支付密码”，管理员进行确认后才能完成退款操作。</li>
        </ul>
    </div>
    <form id="post_form" method="post" action="mall_payment_submit" name="form1">
        <input type="hidden" name="form_submit" value="ok">
        <input type="hidden" name="payment_code" value="zfb">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">支付宝账号</dt>
                <dd class="opt">
                    <input type="hidden" name="config_name" value="alipay_service,alipay_account,alipay_key,alipay_partner">
                    <input type="hidden" name="alipay_service" value="create_direct_pay_by_user">
                    <input name="alipay_account" id="alipay_account" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['account'])) {
echo $_smarty_tpl->tpl_vars['payment']->value['account'];
}?>" class="input-txt" type="text">
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">交易安全校验码（key）</dt>
                <dd class="opt">
                    <input name="alipay_key" id="alipay_key" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['key'])) {
echo $_smarty_tpl->tpl_vars['payment']->value['key'];
}?>" class="input-txt" type="text">
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">合作者身份（partner ID）</dt>
                <dd class="opt">
                    <input name="alipay_partner" id="alipay_partner" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['id'])) {
echo $_smarty_tpl->tpl_vars['payment']->value['id'];
}?>" class="input-txt" type="text">
                    <span class="err"></span>
                    <p class="notic"><a href="https://b.alipay.com/order/pidKey.htm?pid=2088001525694587&amp;product=fastpay" target="_blank">获取PID和Key</a></p>
                </dd>
            </dl>
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
                        <input type="radio" value="0" <?php if (isset($_smarty_tpl->tpl_vars['payment']->value['state'])) {
if ($_smarty_tpl->tpl_vars['payment']->value['state'] == 0) {?>checked<?php }
}?> name="payment_state" id="payment_state2">
                    </div>
                    <p class="notic"></p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
        </div>
    </form>
</div>
<?php echo '<script'; ?>
>

    $(document).ready(function(){
        //按钮先执行验证再提交表单
        $("#submitBtn").click(function(){
            if($("#post_form").valid()){
                $("#post_form").submit();
            }
        });
        $('#post_form').validate({
            errorPlacement: function(error, element){
                var error_td = element.parent('dd').children('span.err');
                error_td.append(error);
            },
            rules : {
                alipay_account : {
                    required   : true
                },
                alipay_key : {
                    required   : true
                },
                alipay_partner : {
                    required   : true
                }
            },
            messages : {
                alipay_account  : {
                    required : '<i class="fa fa-exclamation-circle"></i>支付宝账号不能为空'
                },
                alipay_key  : {
                    required : '<i class="fa fa-exclamation-circle"></i>交易安全校验码（key）不能为空'
                },
                alipay_partner  : {
                    required : '<i class="fa fa-exclamation-circle"></i>合作者身份（partner ID）不能为空'
                }
            }
        });
    });

<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
