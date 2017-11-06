<?php
/* Smarty version 3.1.29, created on 2017-08-12 15:45:39
  from "D:\www\yunjuke\application\admin\views\mall_waybill_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598eb223b7d5a5_74319295',
  'file_dependency' => 
  array (
    'e59f4eba01d5d88ea02c0b69452963057bea485d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_waybill_edit.html',
      1 => 1500948914,
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
function content_598eb223b7d5a5_74319295 ($_smarty_tpl) {
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
        <div class="item-title"><a class="back" href="javascript:history.back(-1)" title="返回运单模板列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>运单模板 - 编辑"二货"运单模板</h3>
                <h5>预设供商家选择的运单快递模板</h5>
            </div>
        </div>
    </div>
    <form id="add_form" method="post" action="mall_waybill_submit" enctype="multipart/form-data">
        <input type="hidden" name="waybill_id" value="1">
        <input type="hidden" name="old_waybill_image" value="">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_name"><em>*</em>模板名称</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="二货" name="waybill_name" id="waybill_name" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">运单模板名称，最多10个字</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_name"><em>*</em>物流公司</label>
                </dt>
                <dd class="opt">
                    <select name="waybill_express">
                                                 <option value="2">顺丰快递</option>
                                                
                    </select>
                    <span class="err"></span>
                    <p class="notic">模板对应的物流公司</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_width"><em>*</em>宽度</label>
                </dt>
                <dd class="opt">
                    <input type="number" value="3" name="waybill_width" id="waybill_width" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">运单宽度，单位为毫米(mm)</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_height"><em>*</em>高度</label>
                </dt>
                <dd class="opt">
                    <input type="number" value="324" name="waybill_height" id="waybill_height" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">运单高度，单位为毫米(mm)</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_top"><em>*</em>上偏移量</label>
                </dt>
                <dd class="opt">
                    <input type="number" value="34" name="waybill_top" id="waybill_top" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">运单模板上偏移量，单位为毫米(mm)</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_left"><em>*</em>左偏移量</label>
                </dt>
                <dd class="opt">
                    <input type="number" value="4" name="waybill_left" id="waybill_left" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">运单模板左偏移量，单位为毫米(mm)</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_image"><em>*</em>模板图片</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show"><a class="nyroModal" rel="gal">
                            <i class="fa fa-picture-o"  id="" data-geo='<img src="http://[::1]/yunjuke/application/admin/views/images/8_SF_print.JPG" width=100px height=50px>'></i>
                        </a></span>
                        <span class="type-file-box">
                            <input type="text" name="textfield" value="8_SF_print.JPG" id="textfield" class="type-file-text">
                            <input type="button" name="button" id="button" value="选择上传..." class="type-file-button">
                            <input name="waybill_image" type="file" class="type-file-file" id="waybill_image" size="30" hidefocus="true" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                    </div>
                    <span class="err"></span>
                    <p class="notic">请上传扫描好的运单图片，图片尺寸必须与快递单实际尺寸相符</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_image"><em>*</em>启用</label>
                </dt>
                <dd class="opt">
                    <div class="onoff">
                        <input id="status_1" type="radio" name="status" value="1"  checked   >
                        <label for="status_1" class="cb-enable selected">是</label>
                        <input id="status_0" type="radio" name="status" value="0"  >
                        <label for="status_0" class="cb-disable ">否</label>
                    </div>
                    <p class="notic">请首先设计并测试模板然后再启用，启用后商家可以使用 </p>
                </dd>
            </dl>
            <div class="bot"><a id="submit" href="javascript:void(0)" class="ncap-btn-big ncap-btn-green">确认提交</a></div>
        </div>
    </form>
</div>
<script>

    $(document).ready(function(){
        //上传显示
        $("#waybill_image").change(function () {
            $("#textfield").val($(this).val());
        });
        $("#submit").click(function(){
            if($("#add_form").valid()){
                $("#add_form").submit();
            }
        });
        $('#add_form').validate({
            errorPlacement: function(error, element){
                var error_td = element.parents('dd').children('span.err');
                error_td.append(error);
            },
            rules : {
                waybill_name: {
                    required : true,
                    maxlength : 10
                },
                waybill_width: {
                    required : true,
                    digits: true
                },
                waybill_height: {
                    required : true,
                    digits: true
                },
                waybill_top: {
                    required : true,
                    number: true
                },
                waybill_left: {
                    required : true,
                    number: true
                },
                waybill_image: {
                    
                    accept: "jpg|jpeg|png|gif"
                }
            },
            messages : {
                waybill_name: {
                    required : "<i class='fa fa-exclamation-circle'></i>模板名称不能为空",
                    maxlength : "<i class='fa fa-exclamation-circle'></i>模板名称最多10个字"
                },
                waybill_width: {
                    required : "<i class='fa fa-exclamation-circle'></i>宽度不能为空",
                    digits: "<i class='fa fa-exclamation-circle'></i>宽度必须为数字"
                },
                waybill_height: {
                    required : "<i class='fa fa-exclamation-circle'></i>高度不能为空",
                    digits: "<i class='fa fa-exclamation-circle'></i>高度必须为数字"
                },
                waybill_top: {
                    required : "<i class='fa fa-exclamation-circle'></i>上偏移量不能为空",
                    number: "<i class='fa fa-exclamation-circle'></i>上偏移量必须为数字"
                },
                waybill_left: {
                    required : "<i class='fa fa-exclamation-circle'></i>左偏移量不能为空",
                    number: "<i class='fa fa-exclamation-circle'></i>左偏移量必须为数字"
                },
                waybill_image: {
                    
                    accept: '<i class="fa fa-exclamation-circle"></i>图片类型不正确'
                }
            }
        });
    });

</script>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
