<?php
/* Smarty version 3.1.29, created on 2017-08-01 10:40:43
  from "D:\www\yunjuke\application\admin\views\goods_type_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fea2b9cd7c9_45619757',
  'file_dependency' => 
  array (
    'b8df7104e37c4515d8b76019cf638809915e5ee5' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_type_add.html',
      1 => 1501555238,
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
function content_597fea2b9cd7c9_45619757 ($_smarty_tpl) {
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
            <div class="item-title"><a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>

                <div class="subject">
                    <h3>类型管理 - 新增类型</h3>
                    <h5>商品类型的管理可用于绑定商品分类</h5>
                </div>
            </div>
        </div>
        <div class="explanation" id="explanation">
            <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span id="explanationZoom" title="收起提示"></span></div>
            <ul>
                <li>请编写新增类型的名称并确认</li>
            </ul>
        </div>
        <form id="type_form" method="post">

            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label for="t_mane"><em>*</em>类型</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" class="input-txt" name="param[type_name]" id="t_mane">
                        <span class="err"></span>

                        <p class="notic"></p>
                    </dd>
                </dl>
                
                <div class="bot"><a id="submitBtn" class="ncap-btn-big ncap-btn-green" href="JavaScript:void(0);">确认提交</a></div>
            </div>
        </form>
    </div>
    <script>

        $(function () {
            //表单验证
            $('#type_form').validate({
                errorPlacement: function (error, element) {
                    var error_td = element.parent('dd').children('span.err');
                    error_td.append(error);
                },
                rules: {
                    'param[type_name]': {
                        required: true,
                        maxlength: 20,
                        minlength: 1
                    },
                },
                messages: {
                    'param[type_name]': {
                        required: '<i class="fa fa-exclamation-circle"></i>请填写类型名称',
                        maxlength: '<i class="fa fa-exclamation-circle"></i>类型名称长度应在1-20个字符之间',
                        minlength: '<i class="fa fa-exclamation-circle"></i>类型名称长度应在1-20个字符之间'
                    },
                }
            });

            //按钮先执行验证再提交表单
            $("#submitBtn").click(function () {
                if ($("#type_form").valid()) {
                    var url = "goods_type_add?op=add";
                    var data = $("#type_form").serialize();
                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: url,
                        data: data,
                        success: function (data) {
                            layer.msg(data.msg);
                            if (data.state == '403') {
                                login_ajax('shopadmin');
                            } else
                            if (data.state == true) {
                                //询问框
                                layer.confirm('继续添加？', {
                                    time: 3000, //5秒后自动关闭
                                    end: function () {
                                        window.location.href = "goods_type_management";
                                    },
                                    btn: ['确定', '去列表'] //按钮
                                }, function () {
                                    window.location.href = "goods_type_add";
                                }, function () {
                                    window.location.href = "goods_type_management";
                                });
                            }
                        }
                    });
                }
            });
        })


    </script>
    <div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
            href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
