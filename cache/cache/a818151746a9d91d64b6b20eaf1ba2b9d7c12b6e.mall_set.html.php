<?php
/* Smarty version 3.1.29, created on 2017-04-24 09:10:07
  from "E:\www\yunjuke\application\admin\views\mall_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd506fb3bca3_73001389',
  'file_dependency' => 
  array (
    'a818151746a9d91d64b6b20eaf1ba2b9d7c12b6e' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\admin\\views\\mall_set.html',
      1 => 1492225944,
      2 => 'file',
    ),
    '00bb14cd38b287a1433d164c4992087fb09bedd6' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1492225917,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_58fd506fb3bca3_73001389 ($_smarty_tpl) {
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
		    	window.location.href="http://[::1]/yunjuke/admin.php/login";
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
                <h3>商城设置</h3>
                <h5>商城相关基础信息及功能设置选项</h5>
            </div>
            <!-- <ul class="tab-base nc-row">
                <li><a class="current"><span>商城设置</span></a></li>
                <li><a href="mall_set_prevent"><span>防灌水设置</span></a></li>
            </ul> -->
        </div>
    </div>
    <form method="post" enctype="multipart/form-data" name="form1">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="site_logo">网站Logo</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show"><span class="show">
                        <a class="nyroModal" rel="gal" href="">
                        <i class="fa fa-picture-o"  id="" data-geo='<img src="http://[::1]/yunjuke/application/admin/views/images/site_logo.png" width=100px height=50px>'></i></a>
                    </span><span class="type-file-box">
            <input type="text" name="textfield"  id="textfield1" class="type-file-text">
            <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
            <input class="type-file-file" id="site_logo" name="site_logo" type="file" size="30" hidefocus="true"
                   nc_type="change_site_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
            </span></div>
                    <span class="err"></span>

                    <p class="notic">默认网站LOGO,通用头部显示，最佳显示尺寸为240*60像素</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="site_logo">会员中心Logo</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a class="nyroModal" rel="gal" href="">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="http://[::1]/yunjuke/application/admin/views/images/member_logo.gif" width=100px height=50px>'></i>
                            </a>
                        </span>
                        <span class="type-file-box">
            <input type="text" name="textfield2" id="textfield2" class="type-file-text">
            <input type="button" name="button2" id="button2" value="选择上传..." class="type-file-button">
            <input class="type-file-file" id="member_logo" name="member_logo" type="file" size="30" hidefocus="true" nc_type="change_member_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效"></span></div>
                    <span class="err"></span>

                    <p class="notic">网站小尺寸LOGO，会员个人主页显示，最佳显示尺寸为200*40像素</p>
                </dd>
            </dl>
            <!-- 商家中心logo -->
            <dl class="row">
                <dt class="tit">
                    <label for="seller_center_logo">商家中心Logo</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show"><span class="show"><a class="nyroModal" rel="gal" href="">
                        <i class="fa fa-picture-o"  id="" data-geo='<img src="http://[::1]/yunjuke/application/admin/views/images/seller_center_logo.jpg" width=100px height=50px>'></i>
                    </a>
                    </span><span class="type-file-box">
            <input type="text" name="textfield3" id="textfield3" class="type-file-text">
            <input type="button" name="button3" id="button3" value="选择上传..." class="type-file-button">
            <input class="type-file-file" id="seller_center_logo" name="seller_center_logo" type="file" size="30"
                   hidefocus="true" nc_type="change_seller_center_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
            </span></div>
                    <span class="err"></span>

                    <p class="notic">商家中心LOGO，最佳显示尺寸为150*40像素，请根据背景色选择使用图片色彩</p>
                </dd>
            </dl>
            <!-- 商家中心logo -->
            <dl class="row">
                <dt class="tit">
                    <label for="site_phone">平台客服联系电话</label>
                </dt>
                <dd class="opt">
                    <input id="site_phone" name="site_phone" value="2014882889,20161088" class="input-txt" type="text">
                    <span class="err"></span>

                    <p class="notic">商家中心右下侧显示，方便商家遇到问题时咨询，多个请用半角逗号 "," 隔开</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="site_email">电子邮件</label>
                </dt>
                <dd class="opt">
                    <input id="site_email" name="site_email" value="service@91miaoguo.com" class="input-txt" type="text">
                    <span class="err"></span>

                    <p class="notic">商家中心右下侧显示，方便商家遇到问题时咨询</p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="submit()">确认提交</a></div>
        </div>
    </form>
</div>
<script>
    $(function () {
        //上传显示
        $("#site_logo").change(function () {
            $("#textfield1").val($(this).val());
        });
        $("#member_logo").change(function () {
            $("#textfield2").val($(this).val());
        });
        $("#seller_center_logo").change(function () {
            $("#textfield3").val($(this).val());
        });

    });
 function submit(){
	 if($("form").valid()){
		 var form_data = new FormData($("form")[0]); 
		 $.ajax({
				type: "post",
		        url: "mall_set?op=edit",
		        data: form_data,
		        dataType: "json",
		        processData: false,
	            contentType: false,
		        success: function(data){
		        		layer.msg(data.msg);
		        }
			})
	 }
 }
 /*验证为数字或,*/
	jQuery.validator.addMethod("numberAndLettersVal",function(value,element){  
     return this.optional(element) || /[0-9,]+$/.test(value);  
    },$.validator.format("电话只能为数字,多个请用英文半角逗号 "," 隔开 ")  
    );   
 $('form').validate({
		errorPlacement: function(error, element){
			var error_td = element.parent('dd').children('span.err');
			error_td.append(error);
		},
		rules : {
			site_phone: {numberAndLettersVal : true,},
			site_email   : {email : true,}
		},
		messages : {
			site_phone : {numberAndLettersVal: '<i class="fa fa-exclamation-circle"></i>电话只能为数字,多个请用英文半角逗号 "," 隔开 '},
			site_email : {email: '<i class="fa fa-exclamation-circle"></i>请输入正确的邮箱地址'},

		}
	});
</script>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
