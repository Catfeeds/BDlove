<?php
/* Smarty version 3.1.29, created on 2017-11-01 13:42:18
  from "D:\www\yunjuke\application\admin\views\mall_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f95eba126473_47031601',
  'file_dependency' => 
  array (
    '606e7a6eb5c0244fb33b3dbbeee92024fcf39892' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_set.html',
      1 => 1501495731,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59f95eba126473_47031601 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '464859f95eb9f0cda3_80208294';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
            <dl class="row" style="display:none">
                <dt class="tit">
                    <label for="site_logo">网站Logo</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show"><span class="show">
                        <a class="nyroModal" rel="gal" href="javascript:void();">
                        <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['site_logo']->value;?>
" width=100px height=50px>'></i></a>
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
            <dl class="row" style="border-top: none;">
                <dt class="tit">
                    <label for="site_logo">会员中心Logo</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a class="nyroModal" rel="gal" href="javascript:void();">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['member_logo']->value;?>
" width=100px height=50px>'></i>
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
                    <label for="seller_center_logo">门店中心Logo</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show"><span class="show"><a class="nyroModal" rel="gal" href="javascript:void();">
                        <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['seller_center_logo']->value;?>
" width=100px height=50px>'></i>
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
                    <input id="site_phone" name="site_phone" value="<?php echo $_smarty_tpl->tpl_vars['site_phone']->value;?>
" class="input-txt" type="text">
                    <span class="err"></span>

                    <p class="notic">商家中心右下侧显示，方便商家遇到问题时咨询，多个请用半角逗号 "," 隔开</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="site_email">电子邮件</label>
                </dt>
                <dd class="opt">
                    <input id="site_email" name="site_email" value="<?php echo $_smarty_tpl->tpl_vars['site_email']->value;?>
" class="input-txt" type="text">
                    <span class="err"></span>

                    <p class="notic">商家中心右下侧显示，方便商家遇到问题时咨询</p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="submit()">确认提交</a></div>
        </div>
    </form>
</div>
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
