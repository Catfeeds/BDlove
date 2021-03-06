<?php
/* Smarty version 3.1.29, created on 2017-08-04 10:36:09
  from "D:\www\yunjuke\application\pay\views\account-userInfo.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5983dd996de3a7_61239961',
  'file_dependency' => 
  array (
    '25329671a77f73d5f4b8ff05c4585cb384a1ed6a' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\account-userInfo.html',
      1 => 1501581895,
      2 => 'file',
    ),
    '940fa3e7a5fc658c974a607afc3fab9d110f7f64' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\lib\\footer.html',
      1 => 1499676757,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5983dd996de3a7_61239961 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/style.css" />
<title>安全设置</title>
<style type="text/css">
	.change-img{
		position: absolute;
		top: 155px;
		left: 60px;
		color: #009dd9;
	}
	.table-lg th,.table-lg td{padding:12px;line-height:26px;font-size: 13px;}
	.cl-b{
		color: #009dd9;
		text-decoration: underline;
		cursor: pointer;
	}
	.cl-g{
		color:#44b549
	}
	.cl-o{
		color: #f90;
	}
</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 账户管理 <span class="c-gray en">&gt;</span> 安全设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-20" style="position: relative;">
	<img class="avatar size-XXXL l" src=" http://[::1]/yunjuke/./data/store_guide_headportrait/head_portrait_24.jpg">
	<a href="javascript:;" class="change-img" id="head_pic">修改头像</a>
	<dl class="l" style="margin-left:40px;">
		<dt>
			<p>吴恩廷</p>
			<p>账号ID：24</p>
			<p>当前登录：</p>
			<p>注册时间：1970-01-01 08:00:00</p>
		</dt>
	</dl>
	</div>
	<div class="pd-20">
		<table class="table table-border table-lg">
			<tbody>
				<tr>
					<th class="text-r" width="80">登录密码</th>
					<td>安全性高的密码可以使帐号更安全。建议您定期更换密码，设置一个包含字母，符号或数字中至少两项且长度超过6位的密码。</td>
					<td class="cl-g"><i class="Hui-iconfont f-16 mr-5">&#xe6e1;</i>已设置</td>
					<td class="cl-b" id="password">修改</td>
				</tr>
				<tr>
					<th class="text-r">支付密码</th>
					<td>多一个密码，多一次保障</td>
										<td class="cl-o"><i class="Hui-iconfont f-16 mr-5">&#xe6e0;</i>未设置</td>
										<td class="cl-b" id="paypassword">修改</td>
				</tr>
				<tr>
					<th class="text-r">手机绑定</th>
										<td>您已绑定了手机135****4723。[您的手机为安全手机，可以找回密码]</td>
					<td class="cl-g"><i class="Hui-iconfont f-16 mr-5">&#xe6e1;</i>已设置</td>
										<td class="cl-b" id="bindtel">修改</td>
				</tr>
				<tr>
					<th class="text-r">邮箱绑定</th>
										<td style="color: red">未绑定</td>
					<td class="cl-o"><i class="Hui-iconfont f-16 mr-5">&#xe6e0;</i>未设置</td>
										<td class="cl-b" id="bindemail">修改</td>
				</tr>
			</tbody>
		</table>
	</div>
	
</div>

<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/js/H-ui.admin.js"></script>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/jQuery_md5/jQuery.md5.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/jQuery_md5/jQuery.md5.add.js"></script>
<script src="http://[::1]/yunjuke/application/pay/views/js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript">
    var htm='<form action="" method="post" class="form form-horizontal" id="demoform-1">'+
        '<div class="row cl">'+
        '<label class="form-label col-xs-4 col-sm-3"><span class="cl-o">*</span>原密码：</label>' +
        '<div class="formControls col-xs-8 col-sm-9">' +
        '<input type="password" class="input-text mr-10" id="old_p"  name="old_p" autocomplete="off" placeholder="" style="width: 160px;">' +
        '</div>' +
        '</div>'+
        '<div class="row cl">'+
        '<label class="form-label col-xs-4 col-sm-3"><span class="cl-o">*</span>新密码：</label>' +
        '<div class="formControls col-xs-8 col-sm-9">' +
        '<input type="password" class="input-text mr-10" id="new_p"  name="new_p" autocomplete="off" placeholder="" style="width: 160px;">' +
        '</div>' +
        '</div>' +
        '<div class="row cl">'+
        '<label class="form-label col-xs-4 col-sm-3"><span class="cl-o">*</span>确认新密码：</label>' +
        '<div class="formControls col-xs-8 col-sm-9">' +
        '<input type="password" class="input-text mr-10" id="new_sure"  name="new_sure" autocomplete="off" placeholder="" style="width: 160px;">' +
        '</div>' +
        '</div>' +
        '</form>'+
        '<div class="row cl mt-40">' +
        '<a class="btn btn-primary radius col-xs-offset-5 col-sm-offset-4" id="sure">&nbsp;&nbsp;确定&nbsp;&nbsp;</a>'+
        '<a class="btn btn-default radius ml-10" id="quxiao">&nbsp;&nbsp;取消&nbsp;&nbsp;</a>'+
        '</div>';
    var htm2='<form action="" method="post" class="form form-horizontal" id="demoform-1">'+
        '<div class="row cl">'+
        '<label class="form-label col-xs-4 col-sm-3"><span class="cl-o">*</span>新密码：</label>' +
        '<div class="formControls col-xs-8 col-sm-9">' +
        '<input type="password" class="input-text mr-10" id="new_p"  name="new_p" autocomplete="off" placeholder="" style="width: 160px;">' +
        '</div>' +
        '</div>' +
        '<div class="row cl">'+
        '<label class="form-label col-xs-4 col-sm-3"><span class="cl-o">*</span>确认新密码：</label>' +
        '<div class="formControls col-xs-8 col-sm-9">' +
        '<input type="password" class="input-text mr-10" id="new_sure"  name="new_sure" autocomplete="off" placeholder="" style="width: 160px;">' +
        '</div>' +
        '</div>' +
        '</form>'+
        '<div class="row cl mt-40">' +
        '<a class="btn btn-primary radius col-xs-offset-5 col-sm-offset-4" id="sure">&nbsp;&nbsp;确定&nbsp;&nbsp;</a>'+
        '<a class="btn btn-default radius ml-10" id="quxiao">&nbsp;&nbsp;取消&nbsp;&nbsp;</a>'+
        '</div>';

    var phone='<form action="" method="post" class="form form-horizontal" id="demoform-1">'+
        '<div class="row cl">'+
        '<label class="form-label col-xs-4 col-sm-3"><span class="cl-o">*</span>新手机号：</label>' +
        '<div class="formControls col-xs-8 col-sm-9">' +
        '<input type="text" class="input-text mr-10" id="new_phone"  name="new_phone" autocomplete="off" placeholder="" style="width: 160px;">' +
        '</div>' +
        '</div>' +
        '<div class="row cl">'+
        '<label class="form-label col-xs-4 col-sm-3"><span class="cl-o">*</span>验证码：</label>' +
        '<div class="formControls col-xs-8 col-sm-9">' +
        '<input type="text" class="input-text mr-10" id="code_phone"  name="code_phone" autocomplete="off" placeholder="" style="width: 160px;">' +
        '<a class="btn btn-primary" id="send_code_tel">点击获取验证码</a>'+
        '</div>' +
        '</div>' +
        '</form>'+
        '<div class="row cl mt-40">' +
        '<a class="btn btn-primary radius col-xs-offset-5 col-sm-offset-4" id="code_phone_sure">&nbsp;&nbsp;确定&nbsp;&nbsp;</a>'+
        '<a class="btn btn-default radius ml-10" id="quxiao">&nbsp;&nbsp;取消&nbsp;&nbsp;</a>'+
        '</div>';
    var code='<form action="" method="post" class="form form-horizontal" id="demoform-1">'+
        '<div class="row cl">'+
        '<label class="form-label col-xs-4 col-sm-3"><span class="cl-o">*</span>验证码：</label>' +
        '<div class="formControls col-xs-8 col-sm-9">' +
        '<input type="text" class="input-text mr-10" id="code"  name="code" autocomplete="off" placeholder="" style="width: 120px;">' +
        '<a class="btn btn-primary" id="send_code">点击获取验证码</a>'+
        '</div>' +
        '</div>' +
        '</form>'+
        '<div class="row cl mt-40">' +
        '<a class="btn btn-primary radius col-xs-offset-5 col-sm-offset-4" id="code_sure">&nbsp;&nbsp;确定&nbsp;&nbsp;</a>'+
        '<a class="btn btn-default radius ml-10" id="quxiao">&nbsp;&nbsp;取消&nbsp;&nbsp;</a>'+
        '</div>';

    var pic='<form action="" method="post" class="form form-horizontal" id="demoform-1">'+
        '<div class="row cl">'+
        '<label class="form-label col-xs-4 col-sm-2">头像：</label>'+
    	'<div class="formControls col-xs-8 col-sm-10"> <span class="btn-upload form-group">'+
        '<input class="input-text upload-url" type="text" name="uploadfile1" id="uploadfile1" readonly nullmsg="请添加附件！" style="width:200px">'+
        '<a href="javascript:void();" class="btn btn-primary radius upload-btn"> 选择上传...</a>'+
        '<input type="file" multiple name="file-1" class="input-file" id="head_img">'+
        '</span>'+
        '<p class="c-999">请上传图片（jpg/jpeg/png）</p>'+
    	'</div>'+
        '</div>' +
        '<div class="row cl mt-40">' +
        '<input class="btn btn-primary radius col-xs-offset-5 col-sm-offset-4" id="sure" type="button" onclick="return ajaxFileUpload();" value="确定">'+
        '<input class="btn btn-default radius ml-10" id="quxiao" type="submit" value="取消">'+
        '</div>'
        '</form>';

    $("#head_pic").click(function () {
        layer.open({
            type: 1,
            title:'头像修改',
            skin: 'layui-layer-rim', //加上边框
            area: ['500px', '250px'], //宽高
            content: pic
        });
    });

    $("#bindtel").click(function () {
        layer.open({
            type: 1,
            title:'绑定手机修改',
            skin: 'layui-layer-rim', //加上边框
            area: ['500px', '250px'], //宽高
            content: code
        });
    });


	/*旧手机点击发送验证码*/
    $("body").on('click',"#send_code",function(){
        if($(this).text()!='点击获取验证码'){
            return false;
        }
        var tel="13551344723";
        send_code($(this),tel);
    });

    /*旧手机验证码的提交验证*/
    $("body").on('click',"#code_sure",function(){
        var code=$("#code").val();
        if(code==''){
            layer.msg('验证码不能为空！');
            return false;
		}
        $.ajax({
            url:'code_validate?tag=old',
            type:'post',
            data:{code:code},
            dataType:'json',
            success:function(data) {
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if (data.state) {
                    $(".layui-layer-shade").remove();
                    $(".layui-layer").remove();
                    layer.open({
                        type: 1,
                        title:'绑定新手机',
                        skin: 'layui-layer-rim', //加上边框
                        area: ['500px', '300px'], //宽高
                        content: phone
                    });
                } else {
                    layer.msg(data.msg);
                }
            }
        })
    });


	/*新手机点击发送验证码*/
    $("body").on('click',"#send_code_tel",function(){
        if($(this).text()!='点击获取验证码'){
            return false;
        }
        var tel=$("#new_phone").val();
        if(tel==''){
            layer.msg('请输入新手机号码');
            return false;
        }
        send_code($(this),tel);
    });


    /*新手机验证码的提交验证*/
    $("body").on('click',"#code_phone_sure",function(){
        var code=$("#code_phone").val();
        if(code==''){
            layer.msg('验证码不能为空！');
            return false;
        }
        var tel=$("#new_phone").val();
        if(tel==''){
            layer.msg('请输入新手机号码');
            return false;
        }
        $.ajax({
            url:'code_validate?tag=new',
            type:'post',
            data:{code:code,tel:tel},
            dataType:'json',
            success:function(data) {
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if (data.state) {
                    layer.msg(data.msg);
                    window.location.href='userInfo';
                } else {
                    layer.msg(data.msg);
                }
            }
        })
    });


    $("#password").click(function () {
        layer.open({
            type: 1,
            title:'登录密码修改',
            skin: 'layui-layer-rim', //加上边框
            area: ['500px', '300px'], //宽高
            content: htm
        });

        edit('password');

    });
    var payp="";
    $("#paypassword").click(function () {
        if(payp==''){
            layer.open({
                type: 1,
                title:'支付密码修改',
                skin: 'layui-layer-rim', //加上边框
                area: ['500px', '300px'], //宽高
                content: htm2
            })
		}else {
            layer.open({
                type: 1,
                title:'支付密码修改',
                skin: 'layui-layer-rim', //加上边框
                area: ['500px', '300px'], //宽高
                content: htm
            })

		}
        edit('paypassword');

    });

	/*修改密码设置*/
	function edit(obj) {
        $("#sure").click(function () {
            if(document.getElementById("old_p"))
            {
                var old_p=$("#old_p").val();
                var old_pa=pwd_addMD5(old_p);
            }else {
                var old_p='';
                var old_pa='';
			}

            var new_p=$("#new_p").val();
            var new_sure=$("#new_sure").val();
            if(new_p==''){
                layer.msg('请输入新密码');
                return false;
			}

			if(!isNaN(new_p)){
                layer.msg('密码不能为纯数字');
                return false;
			}
			if(new_p.length<6){
                layer.msg('密码不能少于六位');
                return false;
			}

			if(new_p!=new_sure){
                layer.msg('两次新密码不一致');
                return false;
			}
            var new_pa=pwd_addMD5(new_p);
            $.ajax({
                url:'edit_safe?tag='+obj,
                type:'post',
                data:{old_p:old_pa,new_p:new_pa},
                dataType:'json',
                success:function(data) {
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if (data.state) {
                        layer.msg(data.msg,{time:3000});
                        window.location.href='userInfo';
                    } else {
                        layer.msg(data.msg);
                    }
                }
            })
        })
    }

    /*上传头像*/
    function ajaxFileUpload() {
        $.ajaxFileUpload
        (
            {
                url:'head_pic', //处理上传文件的服务端
                secureuri:false,
                fileElementId:'head_img',
                dataType: 'json',
                success: function (data)
                {
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state){
                        layer.msg(data.msg);
                        window.location.href='userInfo';
					}else {
                        layer.msg(data.msg)
					}
                }
            }
        );
        return false;
    }

    /*发送验证码*/
    function send_code(obj,tel) {
        $.ajax({
            url:'send_code',
            type:'post',
            data:{tel:tel},
            dataType:'json',
            success:function(data) {
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if (data.state) {
                    layer.msg(data.msg,{time:2000});
                    time(obj);
                } else {
                    layer.msg(data.msg);
                }
            }
        })
    }

    var wait=60;
    function time(o) {
        if (wait == 0) {
            o.removeClass("btn-default");
            o.addClass("btn-primary");
            o.text("点击获取验证码");
            wait = 60;
        } else {
            o.removeClass("btn-primary");
            o.addClass("btn-default");
            o.css("cursor","default");
            o.text("重新发送(" + wait + ")");
            wait--;
            setTimeout(function() {
                    time(o)
                },
                1000)
        }
    }


    $("body").on('click',"#quxiao",function(){
        $(".layui-layer-shade").remove();
        $(".layui-layer").remove();
    });



</script>
</body>
</html><?php }
}
