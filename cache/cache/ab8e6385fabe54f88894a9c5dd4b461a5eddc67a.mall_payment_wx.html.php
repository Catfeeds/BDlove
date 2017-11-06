<?php
/* Smarty version 3.1.29, created on 2017-08-02 18:18:02
  from "D:\www\yunjuke\application\admin\views\mall_payment_wx.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5981a6da8db577_92530060',
  'file_dependency' => 
  array (
    'ab8e6385fabe54f88894a9c5dd4b461a5eddc67a' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_payment_wx.html',
      1 => 1501669068,
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
function content_5981a6da8db577_92530060 ($_smarty_tpl) {
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
                    <input name="appid" id="appid" value="wxd7f0060e785a517b" class="input-txt" type="text">
                    <span class="err"></span>
                    <p class="notic">绑定支付的APPID（必须配置，开户邮件中可查看）</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">商户号</dt>
                <dd class="opt">
                    <input name="mchid" id="mchid" value="1226636102" class="input-txt" type="text">
                    <span class="err"></span>
                    <p class="notic">商户号（必须配置，开户邮件中可查看）</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">密钥</dt>
                <dd class="opt">
                    <input name="key" id="key" value="ssl789432lj0ljl342j0uf0sd8234jl2" class="input-txt" type="text">
                    <span class="err"></span>
                    <p class="notic">商户支付密钥，参考开户邮件设置（必须配置，登录商户平台自行设置）</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">启用</dt>
                <dd class="opt">
                    <div class="onoff">
                        <label for="payment_state1" class="cb-enable selected">是</label>
                        <label for="payment_state2" class="cb-disable ">否</label>
                        <input type="radio" checked value="1" name="payment_state" id="payment_state1">
                        <input type="radio"  value="0" name="payment_state" id="payment_state2">
                    </div>
                    <p class="notic"></p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
        </div>
    </form>
</div>
<script>
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
</script>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
