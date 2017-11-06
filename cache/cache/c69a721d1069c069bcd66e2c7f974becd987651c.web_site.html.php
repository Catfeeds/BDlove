<?php
/* Smarty version 3.1.29, created on 2017-04-24 09:10:03
  from "E:\www\yunjuke\application\admin\views\web_site.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd506be245b8_53954119',
  'file_dependency' => 
  array (
    'c69a721d1069c069bcd66e2c7f974becd987651c' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\admin\\views\\web_site.html',
      1 => 1492225943,
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
function content_58fd506be245b8_53954119 ($_smarty_tpl) {
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
<style>
ul li{margin-top:8px;}
ul li span{display:inline-block;width:40px;}
#form_data ul li{float:left;margin-right:5px;}
</style>
<body style="background-color: #FFF; overflow: auto;">

<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>站点设置</h3>
        <h5>网站全局内容基本选项设置</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>网站全局基本设置，商城及其他模块相关内容在其各自栏目设置项内进行操作。</li>
    </ul>
  </div>
  <form method="post"  action="" name="form" id="form_data">
    
    <div class="ncap-form-default">
            <dl class="row">
        <dt class="tit">
          <label for="site_name">网站名称</label>
        </dt>
        <dd class="opt">
                    <input id="site_name" name="website_name" value="全渠道电商ERP供应链平台" class="input-txt site_name" type="text" />
                    
          <p class="notic">网站名称，将显示在前台顶部欢迎信息等位置</p> 
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="site_name">ICP证书</label>
        </dt>
        <dd class="opt">
                    <input id="site_name" name="icp_number" value="蜀ICP备14014320号-4" class="input-txt site_name" type="text" />
                    
          <p class="notic">前台页面底部可以显示 ICP 备案信息，如果网站已备案，在此输入你的授权码，它将显示在前台页面底部，如果没有请留空</p> 
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="site_name">网站关键字</label>
        </dt>
        <dd class="opt">
                    <input id="site_name" name="website_keywords" value="专业解决电商供应链问题" class="input-txt site_name" type="text" />
                    
          <p class="notic">多个关键字用英文逗号隔开</p> 
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="site_name">客服电话</label>
        </dt>
        <dd class="opt">
                    <input id="site_name" name="service_tel" value="400000000" class="input-txt site_name" type="text" />
                    
          <p class="notic">一般是400电话一个</p> 
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="site_name">客服邮箱</label>
        </dt>
        <dd class="opt">
                    <input id="site_name" name="service_mail" value="liy@internetdc.com" class="input-txt site_name" type="text" />
                    
          <p class="notic">一般是公司邮箱</p> 
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="site_name">客服QQ</label>
        </dt>
        <dd class="opt">
                    <input id="site_name" name="service_qq" value="2014882889" class="input-txt site_name" type="text" />
                    
          <p class="notic">可以点击和QQ直接聊天</p> 
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="site_name">公司地址</label>
        </dt>
        <dd class="opt">
                    <input id="site_name" name="address" value="四川省成都市成华区建材路39号隆鑫九熙广场" class="input-txt site_name" type="text" />
                    
          <p class="notic">系统隶属的公司地址</p> 
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="site_name">微信二维码</label>
        </dt>
        <dd class="opt">
                    <div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i>
	          </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield1" class="type-file-text"> 
	          <input type="button" name="" id="button2" value="上传二维码" class="type-file-button"> 
	          <input class="type-file-file valid" id="import_excel1" name="weixin_code" type="file" hidefocus="true" nc_type="cms_image">
	          </span></div><div class="err pos-a" style="bottom: -10px;"></div>
	                
          <p class="notic">微信二维码图片</p> 
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="site_name">商城二维码</label>
        </dt>
        <dd class="opt">
          	          <div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i>
	          </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield2" class="type-file-text"> 
	          <input type="button" name="" id="button2" value="上传二维码" class="type-file-button"> 
	          <input class="type-file-file valid" id="import_excel2" name="shop_code" type="file" hidefocus="true" nc_type="cms_image">
	          </span></div><div class="err pos-a" style="bottom: -10px;"></div>
                    
          <p class="notic">商城二维码图片</p> 
        </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <label for="site_name">网站描述</label>
        </dt>
        <dd class="opt">
                    <textarea name="website_desc" rows="6" class="tarea" id="discrimination">全渠道电商ERP供应链平台</textarea>
                    
          <p class="notic"></p> 
        </dd>
      </dl>
            <div class="bot">
          <a href="JavaScript:void(0);" class="btn btn-warning radius" onclick="web_edit()">确认提交</a>
      </div>
    </div>
  </form>
</div>
<div id="goTop">
    <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
    <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>
<script type="text/javascript">
		//上传显示
        $("#import_excel1").change(function () {
            $("#textfield1").val($(this).val());
        });
		$("#import_excel2").change(function () {
            $("#textfield2").val($(this).val());
        });
function web_edit(){
	var str = true;
	var form_data = new FormData($("#form_data")[0]);  
	/*var site_name = new Array();
	$(".site_name").each(function(){
		if($(this).val()==''){
			layer.msg('请确认信息填写完整');
			str = false;
		}
		 site_name.push($(this).val()); 
	});*/
	var note = $("#discrimination").val();
	if(str){
		$.ajax({
			type: "post",
	        url: "Web/web_edit",
	        data: form_data,
	        dataType: "json",
	        processData: false,
            contentType: false,
	        success: function(data){
			if(data.state=='403'){
				login_ajax('shopadmin');return false;
			}
	        	if(data.state){
	        		layer.msg(data.msg);
	        	}else{
	        		layer.msg(data.msg);
	        	}
	        }
		})
	}
	
     //alert(site_name);
	
}
</script>
</body>
</html><?php }
}
