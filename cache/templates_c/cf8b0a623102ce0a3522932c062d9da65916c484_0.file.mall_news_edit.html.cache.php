<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:59:26
  from "D:\www\yunjuke\application\admin\views\mall_news_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fe07ea05203_47685521',
  'file_dependency' => 
  array (
    'cf8b0a623102ce0a3522932c062d9da65916c484' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_news_edit.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597fe07ea05203_47685521 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '15270597fe07e8a1a35_06809920';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="mall_news" title="返回商家消息模板列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>消息通知 - 编辑消息模板“<?php echo $_smarty_tpl->tpl_vars['data']->value['mmt_name'];?>
”</h3>
                <h5>商城对商家及用户消息类发送设定</h5>
            </div>
        </div>
    </div>

    <div class="homepage-focus" nctype="sellerTplContent">
        <div class="title">
            <h3>消息模板切换选择</h3>
            <ul class="tab-base nc-row">
                <li><a href="javascript:void(0);" class="current">站内信模板</a></li>
                <li><a href="javascript:void(0);" class="">手机短信模板</a></li>
                <li><a href="javascript:void(0);" class="">邮件模板</a></li>
            </ul>
        </div>
        <!-- 站内信 S -->
        <form class="tab-content" action="mall_msg_submit" method="post" name="message_form" style="display: block;">
            <input type="hidden" name="form_submit" value="message_form">
            <input type="hidden" name="code" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mmt_code'];?>
">
            <input type="hidden" name="type" value="message">

            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label>站内信开关</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="message_switch1" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_message_switch'] == 1) {?>selected<?php }?>">开启</label>
                            <label for="message_switch0" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_message_switch'] != 1) {?>selected<?php }?>">关闭</label>
                            <input id="message_switch1" name="message_switch" <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_message_switch'] == 1) {?>checked="checked"<?php }?> value="1" type="radio">
                            <input id="message_switch0" name="message_switch" <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_message_switch'] != 1) {?>checked="checked"<?php }?> value="0" type="radio">
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
                
                <dl class="row">
                    <dt class="tit">
                        <label>消息内容</label>
                    </dt>
                    <dd class="opt">
                        <textarea name="message_content" rows="6"
                                  class="tarea"><?php echo $_smarty_tpl->tpl_vars['data']->value['mmt_message_content'];?>
</textarea>
                        <span class="err"></span>

                        <p class="notic"></p>
                    </dd>
                </dl>
                <div class="bot"><a href="JavaScript:void(0);" onclick="document.message_form.submit();"
                                    class="ncap-btn-big ncap-btn-green">确认提交</a></div>
            </div>
        </form>
        <!-- 站内信 E -->
        <!-- 短消息 S -->
        <form class="tab-content" action="mall_msg_submit" method="post" name="short_name" style="display: none;">
            <input type="hidden" name="form_submit" value="short_name">
            <input type="hidden" name="code" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mmt_code'];?>
">
            <input type="hidden" name="type" value="short">

            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label>手机短信开关</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="short_switch1" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_short_switch'] == 1) {?>selected<?php }?>">开启</label>
                            <label for="short_switch0" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_short_switch'] != 1) {?>selected<?php }?>">关闭</label>
                            <input id="short_switch1" name="short_switch" <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_short_switch'] == 1) {?>checked="checked"<?php }?> value="1" type="radio">
                            <input id="short_switch0" name="short_switch" <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_short_switch'] != 1) {?>checked="checked"<?php }?> value="0" type="radio">
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
               
                <dl class="row">
                    <dt class="tit">
                        <label>消息内容</label>
                    </dt>
                    <dd class="opt">
                        <textarea name="short_content" rows="6" class="tarea"><?php echo $_smarty_tpl->tpl_vars['data']->value['mmt_short_content'];?>
</textarea>
                        <span class="err"></span>

                        <p class="notic"></p>
                    </dd>
                </dl>
                <div class="bot"><a href="JavaScript:void(0);" onclick="document.short_name.submit();"
                                    class="ncap-btn-big ncap-btn-green">确认提交</a></div>
            </div>
        </form>
        <!-- 短消息 E -->
        <!-- 邮件 S -->
        <form class="tab-content" action="mall_msg_submit" method="post" name="mail_form" style="display: none;">
            <input type="hidden" name="form_submit" value="mail_form">
            <input type="hidden" name="code" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mmt_code'];?>
">
            <input type="hidden" name="type" value="mail">

            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label>邮件开关</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="mail_switch1" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_mail_switch'] == 1) {?>selected<?php }?>">开启</label>
                            <label for="mail_switch0" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_mail_switch'] != 1) {?>selected<?php }?>">关闭</label>
                            <input id="mail_switch1" name="mail_switch" <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_mail_switch'] == 1) {?>checked="checked"<?php }?> value="1" type="radio">
                            <input id="mail_switch0" name="mail_switch"  <?php if ($_smarty_tpl->tpl_vars['data']->value['mmt_mail_switch'] != 1) {?>checked="checked"<?php }?> value="0" type="radio">
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
                
                <dl class="row">
                    <dt class="tit">
                        <label>邮件标题</label>
                    </dt>
                    <dd class="opt">
                        <textarea name="mail_subject" rows="6" class="tarea"><?php echo $_smarty_tpl->tpl_vars['data']->value['mmt_mail_subject'];?>
</textarea>
                        <span class="err"></span>

                        <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>邮件内容</label>
                    </dt>
                    <dd class="opt">
                        <div class="" style="width: 70%;">
                            <!-- 加载编辑器的容器 -->
                            <textarea id="content" name="content" type="text/plain"><?php if (!empty($_smarty_tpl->tpl_vars['data']->value['mmt_mail_content'])) {
echo $_smarty_tpl->tpl_vars['data']->value['mmt_mail_content'];
}?></textarea>
                            <!-- 实例化编辑器 -->
                            <?php echo '<script'; ?>
 type="text/javascript">
                                var appcontent = UE.getEditor('content');
                            <?php echo '</script'; ?>
>

                        </div>
                    </dd>
                    <p></p>

                </dl>
                <div class="bot"><a href="JavaScript:void(0);" onclick="document.mail_form.submit();"
                                    class="ncap-btn-big ncap-btn-green">确认提交</a></div>
            </div>
        </form>
        <!-- 邮件 E -->
    </div>
</div>
<?php echo '<script'; ?>
>
    $(function(){
        $('div[nctype="sellerTplContent"] > .title > ul').find('a').click(function(){
            $(this).addClass('current').parent().siblings().find('a').removeClass('current');
            var _index = $(this).parent().index();
            var _form = $('div[nctype="sellerTplContent"]').find('form');
            _form.hide();
            _form.eq(_index).show();
        });
    });
<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
