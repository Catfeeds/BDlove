<?php
/* Smarty version 3.1.29, created on 2017-08-03 11:46:16
  from "D:\www\yunjuke\application\admin\views\pic_mall_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59829c887e0f23_24134860',
  'file_dependency' => 
  array (
    '2c73d653363c99bdeab2fcaef2fde0f14f107280' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pic_mall_set.html',
      1 => 1492225943,
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
function content_59829c887e0f23_24134860 ($_smarty_tpl) {
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
                <h3>图片设置</h3>
                <h5>商城相关图片及水印等参数设定</h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a class="current"><span>默认图片</span></a></li>
                <li><a href="pic_mall_watermark"><span>水印管理</span></a></li>
            </ul>
        </div>
    </div>
    <form method="post" enctype="" name="form1">
        <input type="hidden" name="form_submit" value="ok">

        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="">默认商品图片</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show"><span class="show">
                        <a class="nyroModal" rel="gal" href="">
                            <i class="fa fa-picture-o"  id="" data-geo='<img src="http://[::1]/yunjuke/application/admin/views/images/default_goods_image.jpg" width=100px height=50px>'></i>
                        </a>
                    </span>
                    <span class="type-file-box">
                        <input class="type-file-file" id="default_goods_image" name="default_goods_image" type="file" size="30" hidefocus="true" nc_type="change_default_goods_image" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                     </span>
                    </div>
                    <p class="notic">300px * 300px</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="default_store_logo">默认店铺标志</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a class="nyroModal" rel="gal" href="">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="http://[::1]/yunjuke/application/admin/views/images/default_store_logo.jpg" width=100px height=50px>'></i>
                            </a>
                        </span>
                        <span class="type-file-box">
                            <input class="type-file-file" id="default_store_logo" name="default_store_logo" type="file" size="30" hidefocus="true" nc_type="change_default_store_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span></div>
                    <p class="notic">200px * 60px</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="default_store_logo">默认店铺头像</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a class="nyroModal" rel="gal" href="">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="http://[::1]/yunjuke/application/admin/views/images/default_store_avatar.jpg" width=100px height=50px>'></i>
                           </a>
                        </span>
                        <span class="type-file-box">
                            <input class="type-file-file" id="default_store_avatar" name="default_store_avatar" type="file" size="30" hidefocus="true" nc_type="change_default_store_avatar" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                    </div>
                    <p class="notic">100px * 100px</p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="submit()">确认提交</a></div>
        </div>
    </form>
</div>
<script>

    $(function(){
        // 模拟默认商品图片上传input type='file'样式
        var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='选择上传...' class='type-file-button' />"
        $(textButton).insertBefore("#default_goods_image");
        $("#default_goods_image").change(function(){
            $("#textfield1").val($("#default_goods_image").val());
        });
        // 模拟默认店铺图片上传input type='file'样式
        var textButton="<input type='text' name='textfield' id='textfield2' class='type-file-text' /><input type='button' name='button' id='button2' value='选择上传...' class='type-file-button' />"
        $(textButton).insertBefore("#default_store_logo");
        $("#default_store_logo").change(function(){
            $("#textfield2").val($("#default_store_logo").val());
        });
        // 模拟默认店铺图片上传input type='file'样式
        var textButton="<input type='text' name='textfield' id='textfield3' class='type-file-text' /><input type='button' name='button' id='button3' value='选择上传...' class='type-file-button' />"
        $(textButton).insertBefore("#default_store_avatar");
        $("#default_store_avatar").change(function(){
            $("#textfield3").val($("#default_store_avatar").val());
        })

    });
    function submit(){
   	 
   		 var form_data = new FormData($("form")[0]); 
   		 $.ajax({
   				type: "post",
   		        url: "pic_mall_set?op=edit",
   		        data: form_data,
   		        dataType: "json",
   		        processData: false,
   	            contentType: false,
   		        success: function(data){
   		        		layer.msg(data.msg);
   		        }
   			})
   	 
    }
</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
