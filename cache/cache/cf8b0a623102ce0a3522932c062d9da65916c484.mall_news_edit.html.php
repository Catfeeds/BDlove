<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:59:26
  from "D:\www\yunjuke\application\admin\views\mall_news_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fe07ead0436_37731479',
  'file_dependency' => 
  array (
    'cf8b0a623102ce0a3522932c062d9da65916c484' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_news_edit.html',
      1 => 1492225974,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1500948915,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_597fe07ead0436_37731479 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index_1.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/font-awesome.min.css" rel="stylesheet" />
<link href="http://[::1]/yunjuke/application/admin/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views/css/H-ui.min.css" />

<!--
<link type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
-->
<style type="text/css">
    html, body { overflow: visible;}
</style>

<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/common.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/script.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/zh-CN.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/admin.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/flexigrid.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.validation.min.js"></script>
<!-- <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.picTip.js"></script> -->
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

<script type="text/javascript">
/*ajax过期登录*/
function login_ajax(demo,data){
    layer.msg(data.msg);
     setTimeout(function(){
            if(demo=='agent'){
                window.location.href="http://[::1]/yunjuke/index.php/login";
            }else if(demo=='supp'){
                window.location.href="http://[::1]/yunjuke/supplier.php/login";
            }else if(demo=='admin'){
                window.location.href="http://[::1]/yunjuke/admin.php/login";
            }else if(demo=='shop'){
                window.location.href="http://[::1]/yunjuke/index.php/index/login";
            }else if(demo=='shopadmin'){
                window.location.href="http://[::1]/yunjuke/admin.php/index/login";
            }
        },2000);
}
</script>
</head>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/UEditor/ueditor.config.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/UEditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/UEditor/lang/zh-cn/zh-cn.js"></script>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="mall_news" title="返回商家消息模板列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>消息通知 - 编辑消息模板“到货通知提醒”</h3>
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
            <input type="hidden" name="code" value="arrival_notice">
            <input type="hidden" name="type" value="message">

            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label>站内信开关</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="message_switch1" class="cb-enable selected">开启</label>
                            <label for="message_switch0" class="cb-disable ">关闭</label>
                            <input id="message_switch1" name="message_switch" checked="checked" value="1" type="radio">
                            <input id="message_switch0" name="message_switch"  value="0" type="radio">
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
                                  class="tarea">您关注的商品 “{$goods_name}” 已经到货。<a href="{$goods_url}" target="_blank">点击查看商品</a></textarea>
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
            <input type="hidden" name="code" value="arrival_notice">
            <input type="hidden" name="type" value="short">

            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label>手机短信开关</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="short_switch1" class="cb-enable ">开启</label>
                            <label for="short_switch0" class="cb-disable selected">关闭</label>
                            <input id="short_switch1" name="short_switch"  value="1" type="radio">
                            <input id="short_switch0" name="short_switch" checked="checked" value="0" type="radio">
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
               
                <dl class="row">
                    <dt class="tit">
                        <label>消息内容</label>
                    </dt>
                    <dd class="opt">
                        <textarea name="short_content" rows="6" class="tarea">【{$site_name}】您关注的商品 “{$goods_name}” 已经到货。</textarea>
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
            <input type="hidden" name="code" value="arrival_notice">
            <input type="hidden" name="type" value="mail">

            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label>邮件开关</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="mail_switch1" class="cb-enable selected">开启</label>
                            <label for="mail_switch0" class="cb-disable ">关闭</label>
                            <input id="mail_switch1" name="mail_switch" checked="checked" value="1" type="radio">
                            <input id="mail_switch0" name="mail_switch"   value="0" type="radio">
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
                
                <dl class="row">
                    <dt class="tit">
                        <label>邮件标题</label>
                    </dt>
                    <dd class="opt">
                        <textarea name="mail_subject" rows="6" class="tarea">{$site_name}提醒：您关注的商品  “{$goods_name}” 已经到货。</textarea>
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
                            <textarea id="content" name="content" type="text/plain"><p>
	{$site_name}提醒：</p><p>
	您关注的商品 “{$goods_name}” 已经到货。</p><p><a href="{$goods_url}" target="_blank">点击查看商品</a> </p><p><br/></p><p><br/></p><p><br/></p><p style="text-align:right;">
	{$site_name}</p><p style="text-align:right;">
	{$mail_send_time}</p></textarea>
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var appcontent = UE.getEditor('content');
                            </script>

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
<script>
    $(function(){
        $('div[nctype="sellerTplContent"] > .title > ul').find('a').click(function(){
            $(this).addClass('current').parent().siblings().find('a').removeClass('current');
            var _index = $(this).parent().index();
            var _form = $('div[nctype="sellerTplContent"]').find('form');
            _form.hide();
            _form.eq(_index).show();
        });
    });
</script>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
