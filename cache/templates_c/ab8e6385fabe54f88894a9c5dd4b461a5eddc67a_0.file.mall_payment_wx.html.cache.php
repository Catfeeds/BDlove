<?php
/* Smarty version 3.1.29, created on 2017-08-02 18:18:02
  from "D:\www\yunjuke\application\admin\views\mall_payment_wx.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5981a6da81bed2_82920974',
  'file_dependency' => 
  array (
    'ab8e6385fabe54f88894a9c5dd4b461a5eddc67a' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_payment_wx.html',
      1 => 1501669068,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5981a6da81bed2_82920974 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '42775981a6da6b86f6_76375713';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">

<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="mall_payment" title="返回支付方式列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>支付方式 - 设置“微信支付”</h3>
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
            <li>如果启用微信在线退款功能需要在服务器设置“证书”，证书文件不能放在web服务器虚拟目录，应放在有访问权限控制的目录中，防止被他人下载。</li>
            <li>证书路径在“admin\api\refund\wxpay\WxPay.Config.php”中。退款有一定延时，用零钱支付的20分钟内到账，银行卡支付的至少3个工作日。</li>
        </ul>
    </div>
    <form id="post_form" action="mall_payment_submit" method="post" name="form1">
        <input type="hidden" name="form_submit" value="ok">
        <input type="hidden" name="payment_code" value="wx">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">商户公众号APPID</dt>
                <dd class="opt">
                    <input type="hidden" name="config_name" value="appid,mchid,key">
                    <input name="appid" id="appid" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['account'])) {
echo $_smarty_tpl->tpl_vars['payment']->value['account'];
}?>" class="input-txt" type="text">
                    <span class="err"></span>
                    <p class="notic">绑定支付的APPID（必须配置，开户邮件中可查看）</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">商户号</dt>
                <dd class="opt">
                    <input name="mchid" id="mchid" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['id'])) {
echo $_smarty_tpl->tpl_vars['payment']->value['id'];
}?>" class="input-txt" type="text">
                    <span class="err"></span>
                    <p class="notic">商户号（必须配置，开户邮件中可查看）</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">密钥</dt>
                <dd class="opt">
                    <input name="key" id="key" value="<?php if (isset($_smarty_tpl->tpl_vars['payment']->value['key'])) {
echo $_smarty_tpl->tpl_vars['payment']->value['key'];
}?>" class="input-txt" type="text">
                    <span class="err"></span>
                    <p class="notic">商户支付密钥，参考开户邮件设置（必须配置，登录商户平台自行设置）</p>
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
                        <input type="radio" <?php if (isset($_smarty_tpl->tpl_vars['payment']->value['state'])) {
if ($_smarty_tpl->tpl_vars['payment']->value['state'] == 0) {?>checked<?php }
}?> value="0" name="payment_state" id="payment_state2">
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
        	appid : {
                required   : true
            },
            mchid : {
                required   : true
            },
            key : {
                required   : true
            }
        },
        messages : {
        	appid  : {
                required : '<i class="fa fa-exclamation-circle"></i>商户公众号不能为空'
            },
            mchid  : {
                required : '<i class="fa fa-exclamation-circle"></i>商户号不能为空'
            },
            key  : {
                required : '<i class="fa fa-exclamation-circle"></i>商户支付密钥不能为空'
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
