<?php
/* Smarty version 3.1.29, created on 2017-07-29 11:54:29
  from "D:\www\yunjuke\application\pay\views\store_shopping_guide_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597c06f59d3e96_50268858',
  'file_dependency' => 
  array (
    'd3480807d7874dc652dc675c69e1162a70bad0af' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\store_shopping_guide_edit.html',
      1 => 1501293220,
      2 => 'file',
    ),
    '06ff41d60b0a9f396441dd0bc7be4a980f9c9cf7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pageheader.html',
      1 => 1501293220,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_597c06f59d3e96_50268858 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	
	<link href="http://[::1]/yunjuke/application/pay/views/css/index.css" rel="stylesheet" type="text/css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/index_1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/style.css" />

    <link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/font-awesome.min.css" rel="stylesheet" />
    <link href="http://[::1]/yunjuke/application/pay/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/application/pay/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>



    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.js"></script>
        <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/admin.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-migrate-1.2.1.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/common.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/common/common.js"></script>

    <!--<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.min.js"></script>-->

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.validation.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/flexigrid.js"></script>

</head>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/jQuery_md5/jQuery.md5.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/jQuery_md5/jQuery.md5.add.js"></script>
<body style="background-color: #FFF; overflow: auto;">
<style type="text/css">
	a:hover{
		color: #333;
	}
</style>

<div class="page page-container">
	<div class="fixed-bar">
		<nav class="breadcrumb">
			<i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span><a href="store_shopping_guide" style="color: #333;">导购管理</a><span class="c-gray en">&gt;</span>导购添加编辑
		    &nbsp;<a href="javascript:;" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
			<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
				<i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>
	</div>
	<form id="add_form" method="post" action="store_guide_add" enctype="multipart/form-data" class="mt-20">
		<input type="hidden" id="spguide_id" name="spg_id" value="">
		<input type="hidden" name="spg_store_id" value="44">		<div class="ncap-form-default">

			<dl class="row">
				<dt class="tit">
					<label for="class_name"><em>*</em>导购姓名：</label>
				</dt>
				<dd class="opt">
					<input type="text" value="" name="spg_name" id="class_name" class="input-txt">
					<span class="err"></span>
					<p class="notic">名字不能为空且必须小于(或等于)4个字</p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="class_name"><em>*</em>导购呢称：</label>
				</dt>
				<dd class="opt">
					<input type="text" value="" name="spg_nike_name" id="class_nike" class="input-txt">
					<span class="err"></span>
					<p class="notic">呢称不能为空且必须小于(或等于)10个字</p>
				</dd>
			</dl>

			<dl class="row">
				<dt class="tit">
					<label for="class_sort2">角色：</label>
				</dt>
				<dd class="opt">
					<div class="area-region-select">
						<select class=""  name="">
							<option value="">客服部</option>
							<option value="">新闻部</option>
							<option value="">技术部</option>
						</select>
						<span class="err"></span></div>
				</dd>
			</dl>

						<dl class="row">
				<dt class="tit">
					<label for="class_password"><em>*</em>登录密码：</label>
				</dt>
				<dd class="opt">
					<input id="class_password" name="class_password"  type="text" class="input-txt" value="">
					<input id="class_password" name="password"  type="hidden" class="input-txt" value="">
					<span class="err"></span>
					<p class="notic">登录密码6-20位</p>
				</dd>
			</dl>

			
			<dl class="row">
				<dt class="tit">
					<label for="class_sort">性别：</label>
				</dt>
				<dd class="opt">
					<div class="area-region-select">
						<select class="valid" name="spg_sex">
							<option value="1" >-男-</option>
							<option value="2" >-女-</option>

						</select>
						<span class="err"></span></div>
					<span class="err"></span>

				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="class_sort">生日：</label>
				</dt>
				<dd class="opt">
					<input type="text" id="birth" onclick="laydate()" value="" name="birth" style="background-color: #fff" class="input-txt">
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label for="class_sort"><em>*</em>联系电话：</label>
				</dt>
				<dd class="opt">
					<input id="spguide_tel" name="spg_tel" placeholder="登录账号" type="text" class="input-txt" value="">
					<span class="err"></span>
				</dd>
			</dl>

			<!--<dl class="row">-->
			<!--<dt class="tit">-->
			<!--<label for="class_sort"><em>*</em>分销返点比例：</label>-->
			<!--</dt>-->
			<!--<dd class="opt">-->
			<!--<input id="spguide_tel" name="spg_tel" placeholder="登录账号" type="text" class="input-txt" value="">-->
			<!--<span class="err"></span>-->
			<!--</dd>-->
			<!--</dl>-->


			<dl class="row">
				<dt class="tit">
					<label for="class_sort">导购角色：</label>
				</dt>
				<dd class="opt">
					<div class="area-region-select">
						<select class="" role_type="" name="role_type">
							<option value="">-请选择-</option>
							<option value="1" >导购</option>
							<option value="2" >店长</option>
							<option value="3" >兼职导购</option>
						</select>
						<span class="err"></span></div>
				</dd>
			</dl>

			<dl class="row">
				<dt class="tit">
					<label for="">头像：</label>
				</dt>
				<dd class="opt">
					<div class="input-file-show">
						<span class="show">
							<a class="nyroModal" rel="gal" href="javascript:void(0);">
								<i class="fa fa-picture-o" id="img-data" data-geo="<img src=&quot;http://[::1]/yunjuke//application/admin/views/images/default_goods_image.jpg&quot; width=100px height=50px>"></i>
							</a>
						</span>
						<span class="type-file-box">
							<input type="text" name="textfield" id="textfield" class="type-file-text">
							<input type="button" name="button" id="button" value="选择上传..." class="type-file-button">
							<input class="type-file-file" id="default_goods_image" name="default_goods_image" id="default_goods_image" type="file" size="30" hidefocus="true" nc_type="change_default_goods_image" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
						</span>
					</div>
					<p class="notic">建议300KB以下的图片(jpg/jpeg/png)</p>
				</dd>
			</dl>

			<div class="bot">
				<a id="submit" href="javascript:void(0)" class="btn btn-success radius">确认提交</a>
			</div>
		</div>
	</form>

</div>

<div id="goTop">
	<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
	<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>
</body>
<script type="text/javascript">
	$('#goback').click(function(){
		window.history.back();
	})
	$(document).ready(function(){
		//上传显示
		$("#default_goods_image").change(function () {
			$("#textfield").val($(this).val());
		});
		/*验证为正确的电话号码*/
		jQuery.validator.addMethod("isMobile", function(value, element) {
			var length = value.length;
			var mobile = /^(((13[0-9]{1})|(15[0-9]{1}|(18[0-9]{1})|(17[0-9]{1})))+\d{8})$/;
			return this.optional(element) || (length == 11 && mobile.test(value));
		}, "请正确填写您的手机号码");
		/*验证一个店铺 有一个店长*/
//		jQuery.validator.addMethod("checkStoreGuide", function(value, element) {
//            var store = 44;
//            var role = value;status = false;
//            var spg_id = $('input[name=spg_id]').val();
//			return false;
//        }, "该门店已添加店长，请重新选择");
        //验证表单
        var store_id = "";
        valid_rule = {
            spg_store_id : {
                required : true,
            },
            spg_name : {
                required : true,
                maxlength : 4,
            },
            spg_nike_name : {
                required : true,
                maxlength : 10,
            },
            spg_tel : {
                required : true,
                isMobile :true,
                remote	: {
                    url :'check_guideTel',
                    type:'post',
                    cache:false,
                    async:false,
                    data:{
                        tel : function(){
                            return $('#spguide_tel').val();
                        },
                        id : function(){
                            return $('#spguide_id').val();
                        },
                    }
                },
            },
            role_type : {
                required : true,
            },
            class_password : {
                required : true,
                minlength: 6,
                maxlength: 20,
            },
        };
        valid_msg = {
            spg_store_id : {
                required : '<i class="icon-exclamation-sign">请选择导购所属店铺</i>',
            },
            spg_name : {
                required : '<i class="icon-exclamation-sign">请输入姓名</i>',
                maxlength : '<i class="icon-exclamation-sign">长度不超过4</i>',
            },
            spg_nike_name : {
                required : '<i class="icon-exclamation-sign">请输入昵称</i>',
                maxlength : '<i class="icon-exclamation-sign">长度不超过10</i>',
            },
            spg_tel : {
                required : '<i class="icon-exclamation-sign">请输入联系电话</i>',
                isMobile : '<i class="icon-exclamation-sign">请输入正确格式的电话号码</i>',
                remote   : '<i class="fa fa-exclamation-circle"></i>该电话所属导购已存在',

            },
            role_type : {
                required : '<i class="icon-exclamation-sign">请选择导购角色</i>',
            },
            class_password : {
                required : '<i class="icon-exclamation-sign">请输入密码</i>',
                minlength: '<i class="icon-exclamation-sign">最小长度为6位</i>',
                maxlength: '<i class="icon-exclamation-sign">最大长度为20位</i>',
            },
        };

        $("#add_form").validate({
            errorPlacement: function(error, element){
                var error_td = element.parents('dl').find('span.err');
                error_td.append(error);
            },
            rules : valid_rule,
            messages : valid_msg
        });
        $('#submit').click(function(){
            $('#add_form').submit();

            if($("#add_form").valid){
                var pwd = $('input[name=class_password]').val();
                if(pwd){
                    $('input[name=password]').val(pwd_addMD5(pwd));
                    $('input[name=class_password]').val('123456');
                }
                if($("#add_form").valid){
                    $('#add_form').submit();
                }
            }
        })
    });


    $("#default_goods_image").change(function(){
        var objUrl = getObjectURL(this.files[0]) ;
        console.log("objUrl = "+objUrl) ;
        if (objUrl) {
            $("#img-data").data('geo','<img src="'+objUrl+'" />');
        }
    })

    function getObjectURL(file) {		//建立一個可存取该file的url
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url;
    }
</script>
</html><?php }
}
