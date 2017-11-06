<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:46:05
  from "D:\www\yunjuke\application\admin\views\website_article_management_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fdd5dd076d2_94247050',
  'file_dependency' => 
  array (
    'fb2aca41cea6d663c652bef236304d9609e1c60b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\website_article_management_add.html',
      1 => 1492225975,
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
function content_597fdd5dd076d2_94247050 ($_smarty_tpl) {
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
        <div class="item-title"><a class="back" href="http://[::1]/yunjuke/admin.php/Website/website_article_management" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>文章管理 - 新增文章</h3>
                <h5>网站系统文章索引与管理</h5>
            </div>
        </div>
    </div>
    <form id="article_form" method="post" name="articleForm">
        <input type="hidden" name="form_submit" value="ok">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label><em>*</em>标题</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="" name="article_title" id="article_title" class="input-txt">
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="cate_id"><em>*</em>所属分类</label>
                </dt>
                <dd class="opt">
                    <select name="ac_id" id="ac_id">
                        <option value="">-请选择-</option>
                        						 	 <option value="1">&nbsp;&nbsp;商城公告</option>
												 	 <option value="2">&nbsp;&nbsp;帮助中心</option>
												 	 <option value="3">&nbsp;&nbsp;店主之家</option>
												 	 <option value="4">&nbsp;&nbsp;支付方式</option>
												 	 <option value="5">&nbsp;&nbsp;售后服务</option>
												 	 <option value="6">&nbsp;&nbsp;客服中心</option>
												 	 <option value="7">&nbsp;&nbsp;关于我们</option>
												 	 <option value="8">&nbsp;&nbsp;demo2</option>
												 	 <option value="9">&nbsp;&nbsp;demo1</option>
												 	 <option value="10">&nbsp;&nbsp;demo4</option>
												 	 <option value="11">&nbsp;&nbsp;demo3</option>
												 	 <option value="12">&nbsp;&nbsp;123</option>
												 	 <option value="13">&nbsp;&nbsp;456</option>
												 	 <option value="14">&nbsp;&nbsp;789</option>
						                    </select>
                    <span class="err"></span>
                    <p class="notic">当选择发布“商城公告”时，还需要设置下面的“出现位置”项</p>
                </dd>
            </dl>
            <dl class="row" nctype="article_position" >
                <dt class="tit">
                    <label>出现位置</label>
                </dt>
                <dd class="opt">
                    <input id="article_position1" name="article_position" checked="checked" value="1" type="radio">
                    <label for="article_position1"><span>商城前台</span></label>
                    <input id="article_position2" name="article_position" value="2" type="radio">
                    <label for="article_position2"><span>买家中心</span></label>
                    <input id="article_position3" name="article_position" value="3" type="radio">
                    <label for="article_position3"><span>商家中心</span></label>
                    <input id="article_position4" name="article_position" value="4" type="radio">
                    <label for="article_position4"><span>全站</span></label>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row" nctype="article_position" style="display: none">
                <dt class="tit">
                    <label>出现位置</label>
                </dt>
                <dd class="opt">
                    <input id="article_position1" name="article_position"  value="1" type="radio">
                    <label for="article_position1"><span>商城前台</span></label>
                    <input id="article_position2" name="article_position" value="2" type="radio">
                    <label for="article_position2"><span>买家中心</span></label>
                    <input id="article_position3" name="article_position" value="3" type="radio">
                    <label for="article_position3"><span>商家中心</span></label>
                    <input id="article_position4" name="article_position" value="4" type="radio">
                    <label for="article_position4"><span>全站</span></label>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="articleForm">链接</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="" name="article_url" id="article_url" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">当填写"链接"后点击文章标题将直接跳转至链接地址，不显示文章内容。链接格式请以http://开头</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>显示</label>
                </dt>
                <dd class="opt">
                    <div class="onoff">
                        <label for="article_show1" class="cb-enable selected">是</label>
                        <label for="article_show0" class="cb-disable">否</label>
                        <input id="article_show1" name="article_show" checked="checked" value="1" type="radio">
                        <input id="article_show0" name="article_show" value="0" type="radio">
                    </div>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">排序</dt>
                <dd class="opt">
                    <input type="text" value="255" name="article_sort" id="article_sort" class="input-txt">
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label><em>*</em>文章内容</label>
                </dt>
                <dd class="opt">
                    <div class="" style="width: 70%;">
                        <!-- 加载编辑器的容器 -->
                        <textarea id="content" name="content" type="text/plain"></textarea>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var appcontent = UE.getEditor('content');
                        </script>

                    </div>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">图片上传</dt>
                <dd class="opt">
                    <div class="input-file-show" id="divComUploadContainer">
                    	<span class="show">
							<a class="nyroModal" rel="gal" href="">
								<i class="fa fa-picture-o"  id="view_img" data-geo="<img src='http://[::1]/yunjuke/application/admin/views/images/default_user_portrait.gif' width=100px height=50px>" ></i>
							</a>
						</span>
                    	<span class="type-file-box">
				            <input class="type-file-file" id="fileupload" name="fileupload" type="file" size="30" multiple="" hidefocus="true" title="点击按钮选择文件上传">
				            <input type="text" name="text" id="text" class="type-file-text">
				            <input type="button" name="button" id="button" value="选择上传..." class="type-file-button">
				         </span>
				     </div>
                    <div id="thumbnails" class="ncap-thumb-list">
                        <h5><i class="fa fa-exclamation-circle"></i>上传后的图片可以插入到富文本编辑器中使用，无用附件请手动删除，如不处理系统会始终保存该附件图片。</h5>
                        <ul>
                        </ul>
                    </div>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
        </div>
    </form>
</div>
<script>

//按钮先执行验证再提交表
$(document).ready(function(){
    $("#fileupload").change(function () {
        $("#text").val($(this).val());
    });
	//按钮先执行验证再提交表单
	$("#submitBtn").click(function(){
	    if($("#article_form").valid()){
   			var data = new FormData($('#article_form')[0]);
   			$.ajax({
   				data:data,
   				type:'post',
   				dataType:'json',
   				url:"website_article_management_add",
   				cache: false,
                processData: false,
                contentType: false,
   				success:function(res){
   					if(res=="success"){
   						layer.alert('文章添加成功');
   					}else if(res.state=="article_position_false"){
   						layer.alert(res.msg);
   					}else if(res.state=="file_type_false"){
   						layer.alert(res.msg);
   					}else if(res.state=="file_copy_false"){
   						layer.alert(res.msg);
   					}else if(res=="false"){
   						layer.alert('文章添加失败');
   					}
   				}
   			});
		 }
	});
	$("#article_form").validate({
		errorPlacement: function(error, element){
			var error_td = element.parents('dd').children('span.err');
            error_td.append(error);
        },
        rules : {
            article_title : {required : true,},
            ac_id : {required : true,},
            content : {required : true},
        },
        messages : {
            article_title : {required : '<i class="fa fa-exclamation-circle"></i>标题名称不能为空',},
            ac_id : {required : '<i class="fa fa-exclamation-circle"></i>请选择所属分类',},
            content : {required : '<i class="fa fa-exclamation-circle"></i>文章内容不能为空',},
        }
	});
});

</script> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
