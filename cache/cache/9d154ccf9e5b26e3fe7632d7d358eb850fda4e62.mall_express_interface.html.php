<?php
/* Smarty version 3.1.29, created on 2017-08-15 17:19:59
  from "D:\www\yunjuke\application\admin\views\mall_express_interface.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5992bcbf4777a8_81212835',
  'file_dependency' => 
  array (
    '9d154ccf9e5b26e3fe7632d7d358eb850fda4e62' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_express_interface.html',
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
function content_5992bcbf4777a8_81212835 ($_smarty_tpl) {
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
                    <label><input type="radio" name="express_api" value="1"   >快递100</label>
                    <label><input type="radio" name="express_api" value="2" checked >快递鸟</label>
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
                    <input id="baidu_push_ios_key" name="express_kuaidi100_id" value="101" class="input-txt" type="text">
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="express_kuaidi100_key">授权密钥</label>
                </dt>
                <dd class="opt">
                    <input id="baidu_push_ios_secret" name="express_kuaidi100_key" value="101" class="input-txt" type="text">
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
                    <input id="baidu_push_android_key" name="express_kdniao_id" value="1257001" class="input-txt" type="text">
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="baidu_push_android_secret">商户私钥</label>
                </dt>
                <dd class="opt">
                    <input id="express_kdniao_key" name="express_kdniao_key" value="2d6a0d33-8065-4773-9102-22fbbd1ac383" class="input-txt" type="text">
                    <p class="notic">&nbsp;</p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="submit(this)">确认提交</a></div>
        </div>
    </form>
</div>
<script>
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
</script>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
