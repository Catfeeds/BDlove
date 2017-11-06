<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:31:48
  from "D:\www\yunjuke\application\admin\views\sms_tpl.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fda04a01e04_26324282',
  'file_dependency' => 
  array (
    'b7ff9d960d2f70ac3c6ffe8d782f1171a42e4ebf' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\sms_tpl.html',
      1 => 1492252010,
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
function content_597fda04a01e04_26324282 ($_smarty_tpl) {
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
        <h3>短信模版</h3>
        <h5>平台发送短信的模版</h5>
      </div>
      <ul class="tab-base nc-row"><li><a href="set" ><span>接口设置</span></a></li><li><a  class="current"><span>短信模版</span></a></li><li><a href="log" ><span>短信日志</span></a></li></ul> </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>系统自动给注册用户发送手机短信等信息所使用的模板，可根据需求编辑其中内容。</li>
    </ul>
  </div>
  <form name='form1' method='post'>
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="submit_type" id="submit_type" value="" />
    <table class="flex-table">
      <thead>
        <tr>
          <th width="24" align="center" class="sign"><i class="ico-check"></i></th>
          <th width="200" align="center" class="handle-s">操作</th>
          <th width="400" align="left">模板描述</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
                          <tr>
          <td class="sign"><i class="ico-check"></i></td>
          <td class="handle-s">
            <a class="btn blue" href="tp_change/1"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td><strong>[用户]</strong>活动确认验证码</td>
          <td><strong>[模板ID]</strong>SMS_62130006</td>
		  <td><strong>[内容]</strong><span style="color: rgb(102, 102, 102); font-family: arial, 微软雅黑, &quot;microsoft yahei&quot;, 华文细黑, STXihei; font-size: 12px; background-color: rgb(255, 255, 255);">验证码${code}，您正在参加${product}的${item}活动，请确认系本人申请。</span></td>
          <td></td>
        </tr>
                <tr>
          <td class="sign"><i class="ico-check"></i></td>
          <td class="handle-s">
            <a class="btn blue" href="tp_change/2"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td><strong>[用户]</strong>用户注册验证</td>
          <td><strong>[模板ID]</strong>SMS_62130007</td>
		  <td><strong>[内容]</strong><span style="color: rgb(102, 102, 102); font-family: arial, 微软雅黑, &quot;microsoft yahei&quot;, 华文细黑, STXihei; font-size: 12px; background-color: rgb(255, 255, 255);">验证码${code}，您正在注册成为${product}用户，感谢您的支持！</span></td>
          <td></td>
        </tr>
                <tr>
          <td class="sign"><i class="ico-check"></i></td>
          <td class="handle-s">
            <a class="btn blue" href="tp_change/3"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td><strong>[用户]</strong>修改密码验证</td>
          <td><strong>[模板ID]</strong>SMS_62130005</td>
		  <td><strong>[内容]</strong><span style="color: rgb(102, 102, 102); font-family: arial, 微软雅黑, &quot;microsoft yahei&quot;, 华文细黑, STXihei; font-size: 12px; background-color: rgb(255, 255, 255);">验证码${code}，您正在尝试修改${product}登录密码，请妥善保管账户信息。</span></td>
          <td></td>
        </tr>
                <tr>
          <td class="sign"><i class="ico-check"></i></td>
          <td class="handle-s">
            <a class="btn blue" href="tp_change/4"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td><strong>[用户]</strong>重要信息变更验证码</td>
          <td><strong>[模板ID]</strong>SMS_62130004</td>
		  <td><strong>[内容]</strong><span style="color: rgb(102, 102, 102); font-family: arial, 微软雅黑, &quot;microsoft yahei&quot;, 华文细黑, STXihei; font-size: 12px; background-color: rgb(255, 255, 255);">验证码${code}，您正在尝试变更${product}重要信息，请妥善保管账户信息。</span></td>
          <td></td>
        </tr>
                <tr>
          <td class="sign"><i class="ico-check"></i></td>
          <td class="handle-s">
            <a class="btn blue" href="tp_change/5"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td><strong>[用户]</strong>阿里大于测试</td>
          <td><strong>[模板ID]</strong>SMS_62130010</td>
		  <td><strong>[内容]</strong><span style="color: rgb(102, 102, 102); font-family: arial, 微软雅黑, &quot;microsoft yahei&quot;, 华文细黑, STXihei; font-size: 12px; background-color: rgb(255, 255, 255);">尊敬的${code}，欢迎您使用阿里大鱼短信服务，阿里大鱼将为您提供便捷的通信服务！</span></td>
          <td></td>
        </tr>
                <tr>
          <td class="sign"><i class="ico-check"></i></td>
          <td class="handle-s">
            <a class="btn blue" href="tp_change/6"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td><strong>[用户]</strong>身份验证验证码</td>
          <td><strong>[模板ID]</strong>SMS_62130011</td>
		  <td><strong>[内容]</strong><span style="color: rgb(102, 102, 102); font-family: arial, 微软雅黑, &quot;microsoft yahei&quot;, 华文细黑, STXihei; font-size: 12px; background-color: rgb(255, 255, 255);">验证码${code}，您正在进行${product}身份验证，打死不要告诉别人哦！</span></td>
          <td></td>
        </tr>
                <tr>
          <td class="sign"><i class="ico-check"></i></td>
          <td class="handle-s">
            <a class="btn blue" href="tp_change/7"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td><strong>[用户]</strong>登录异常验证</td>
          <td><strong>[模板ID]</strong>SMS_62130008</td>
		  <td><strong>[内容]</strong><span style="color: rgb(102, 102, 102); font-family: arial, 微软雅黑, &quot;microsoft yahei&quot;, 华文细黑, STXihei; font-size: 12px; background-color: rgb(255, 255, 255);">验证码${code}，您正尝试异地登录${product}，若非本人操作，请勿泄露。</span></td>
          <td></td>
        </tr>
                <tr>
          <td class="sign"><i class="ico-check"></i></td>
          <td class="handle-s">
            <a class="btn blue" href="tp_change/8"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td><strong>[用户]</strong>登录确认</td>
          <td><strong>[模板ID]</strong>SMS_62130009</td>
		  <td><strong>[内容]</strong>验证码${code}，您正在登录${product}，若非本人操作，请勿泄露。</td>
          <td></td>
        </tr>
                      </tbody>
    </table>
  </form>
</div>
<script type="text/javascript" src="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: templates</p>
<p>Filename: templates_c/b7ff9d960d2f70ac3c6ffe8d782f1171a42e4ebf_0.file.sms_tpl.html.cache.php</p>
<p>Line Number: 106</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\b7ff9d960d2f70ac3c6ffe8d782f1171a42e4ebf_0.file.sms_tpl.html.cache.php<br />
			Line: 106<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\admin\controllers\Sms.php<br />
			Line: 93<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\admin.php<br />
			Line: 329<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/b7ff9d960d2f70ac3c6ffe8d782f1171a42e4ebf_0.file.sms_tpl.html.cache.php</p>
<p>Line Number: 106</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\b7ff9d960d2f70ac3c6ffe8d782f1171a42e4ebf_0.file.sms_tpl.html.cache.php<br />
			Line: 106<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\admin\controllers\Sms.php<br />
			Line: 93<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\admin.php<br />
			Line: 329<br />
			Function: require_once			</p>

		
	

</div>/js/jquery.edit.js" charset="utf-8"></script> 
<script type="text/javascript">

$(function(){
	$('.flex-table').flexigrid({
		height:'auto',// 高度自动
		usepager: false,// 不翻页
		striped: true,// 使用斑马线
		resizable: false,// 不调节大小
		title: '短信模板列表',// 表格标题
		reload: false,// 不使用刷新
		columnControl: false// 不使用列控制      
		});
});
</script><div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
