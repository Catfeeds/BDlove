<?php
/* Smarty version 3.1.29, created on 2017-08-15 17:19:59
  from "D:\www\yunjuke\application\admin\views\mall_express_interface.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5992bcbf3a4870_07895296',
  'file_dependency' => 
  array (
    '9d154ccf9e5b26e3fe7632d7d358eb850fda4e62' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_express_interface.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5992bcbf3a4870_07895296 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '63475992bcbf254926_52729849';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>快递接口</h3>
                <h5>快递接口的选择和设置</h5>
            </div>
        </div>
    </div>
    <!--操作提示-->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>在两种快递接口中选择使用一个，需在"<a href="http://www.kuaidi100.com/" target="_blank"><strong>快递100</strong></a>"、"<a href="http://www.kdniao.com/" target="_blank"><strong>快递鸟</strong></a>"上申请开通后才能使用。</li>
        </ul>
    </div>
    <form method="post" name="settingForm">
        <input type="hidden" name="form_submit" value="ok">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label>接口网站</label>
                </dt>
                <dd class="opt">
                    <label><input type="radio" name="express_api" value="1"  <?php if (isset($_smarty_tpl->tpl_vars['express_api_info']->value['statu'])) {
if ($_smarty_tpl->tpl_vars['express_api_info']->value['statu'] == 1) {?>checked<?php }
}?> >快递100</label>
                    <label><input type="radio" name="express_api" value="2" <?php if (isset($_smarty_tpl->tpl_vars['express_api_info']->value['statu'])) {
if ($_smarty_tpl->tpl_vars['express_api_info']->value['statu'] == 2) {?>checked<?php }
} else { ?>checked<?php }?> >快递鸟</label>
                    <p class="notic">快递100接口为收费版本，快递鸟可免费申请</p>
                </dd>
            </dl>
            <div class="title">
                <h3>快递100接口设置</h3>
            </div>
            <dl class="row">
                <dt class="tit">
                    <label for="express_kuaidi100_id">公司编号</label>
                </dt>
                <dd class="opt">
                    <input id="baidu_push_ios_key" name="express_kuaidi100_id" value="<?php if (isset($_smarty_tpl->tpl_vars['express_api_info']->value['kuaidi100']['id'])) {
echo $_smarty_tpl->tpl_vars['express_api_info']->value['kuaidi100']['id'];
}?>" class="input-txt" type="text">
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="express_kuaidi100_key">授权密钥</label>
                </dt>
                <dd class="opt">
                    <input id="baidu_push_ios_secret" name="express_kuaidi100_key" value="<?php if (isset($_smarty_tpl->tpl_vars['express_api_info']->value['kuaidi100']['key'])) {
echo $_smarty_tpl->tpl_vars['express_api_info']->value['kuaidi100']['key'];
}?>" class="input-txt" type="text">
                    <p class="notic">&nbsp;</p>
                </dd>
            </dl>
            <div class="title">
                <h3>快递鸟接口设置</h3>
            </div>
            <dl class="row">
                <dt class="tit">
                    <label for="express_kdniao_id">商户ID</label>
                </dt>
                <dd class="opt">
                    <input id="baidu_push_android_key" name="express_kdniao_id" value="<?php if (isset($_smarty_tpl->tpl_vars['express_api_info']->value['kdniao']['id'])) {
echo $_smarty_tpl->tpl_vars['express_api_info']->value['kdniao']['id'];
}?>" class="input-txt" type="text">
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="baidu_push_android_secret">商户私钥</label>
                </dt>
                <dd class="opt">
                    <input id="express_kdniao_key" name="express_kdniao_key" value="<?php if (isset($_smarty_tpl->tpl_vars['express_api_info']->value['kdniao']['key'])) {
echo $_smarty_tpl->tpl_vars['express_api_info']->value['kdniao']['key'];
}?>" class="input-txt" type="text">
                    <p class="notic">&nbsp;</p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="submit(this)">确认提交</a></div>
        </div>
    </form>
</div>
<?php echo '<script'; ?>
>
function submit(obj){
	form_data = $(obj).parents('form').serialize();
	//console.log(form_data)
	$.ajax({
		type: "post",
        url: "mall_express_interface?op=edit",
        data: form_data,
        dataType: "json",
        success: function(data){
        		layer.msg(data.msg);
        }
	})
}
<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
