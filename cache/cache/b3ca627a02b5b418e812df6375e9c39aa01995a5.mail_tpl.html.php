<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:37:44
  from "D:\www\yunjuke\application\admin\views\mail_tpl.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841638b674b8_01885474',
  'file_dependency' => 
  array (
    'b3ca627a02b5b418e812df6375e9c39aa01995a5' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mail_tpl.html',
      1 => 1492225974,
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
function content_59841638b674b8_01885474 ($_smarty_tpl) {
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
        <h3>消息模板</h3>
        <h5>商城对邮件/手机类消息模板设定</h5>
      </div>
      <ul class="tab-base nc-row"><li><a href="set" ><span>服务器设置</span></a></li>
      <li><a  class="current"><span>邮件模板</span></a></li>
      <li><a href="log" ><span>邮件日志</span></a></li>
      </ul> </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>系统自动给注册用户发送用户邮件等信息所使用的模板，可根据需求编辑其中内容。</li>
    </ul>
  </div>
  <form name='form1' method='post'>
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="submit_type" id="submit_type" value="" />
    <table class="flex-table">
      <thead>
        <tr>
          <th width="24" align="center" class="sign"><i class="ico-check"></i></th>
          <th width="100" align="center" class="handle-s">操作</th>
          <th width="400" align="left">模板描述</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
	            <tr>
          <td width="24" class="sign"><i class="ico-check"></i></td>
          <td width="100" class="handle-s">
            <a class="btn blue" href="tp_change/0"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td width="200"><span>[用户]</span><span title=""></span>test11</td>
		  <td width="200"><span>[内容]</span><span title="<p>&lt;p&gt;this is a test&#39;s text &nbsp;demo.&lt;/p&gt;</p>"><p>&lt;p&gt;this is a test&#39;s text &nbsp;demo.&lt;/p&gt;</p></span></td>
          <td></td>
        </tr>
		        <tr>
          <td width="24" class="sign"><i class="ico-check"></i></td>
          <td width="100" class="handle-s">
            <a class="btn blue" href="tp_change/1"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td width="200"><span>[用户]</span><span title=""></span>网渠通分销商注册</td>
		  <td width="200"><span>[内容]</span><span title="<p>恭喜你，注册网渠通分销商成功。用户名为&lt;{$username}&gt;。</p>"><p>恭喜你，注册网渠通分销商成功。用户名为&lt;{$username}&gt;。</p></span></td>
          <td></td>
        </tr>
		        <tr>
          <td width="24" class="sign"><i class="ico-check"></i></td>
          <td width="100" class="handle-s">
            <a class="btn blue" href="tp_change/2"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td width="200"><span>[用户]</span><span title=""></span>网渠通供应商注册</td>
		  <td width="200"><span>[内容]</span><span title="<p>您正在注册网渠通供应商，用户名为&lt;{$username}&gt;。供应商注册需要品台审核，请您耐心等待审核结果。</p>"><p>您正在注册网渠通供应商，用户名为&lt;{$username}&gt;。供应商注册需要品台审核，请您耐心等待审核结果。</p></span></td>
          <td></td>
        </tr>
		        <tr>
          <td width="24" class="sign"><i class="ico-check"></i></td>
          <td width="100" class="handle-s">
            <a class="btn blue" href="tp_change/3"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td width="200"><span>[用户]</span><span title=""></span>用户邮箱绑定</td>
		  <td width="200"><span>[内容]</span><span title="<p>【网渠通】尊敬的用户您好，请输入验证码<{$code}>完成邮箱绑定（<{$overtime}>之内有效）,如非本人操作请忽略</p>"><p>【网渠通】尊敬的用户您好，请输入验证码<{$code}>完成邮箱绑定（<{$overtime}>之内有效）,如非本人操作请忽略</p></span></td>
          <td></td>
        </tr>
		        <tr>
          <td width="24" class="sign"><i class="ico-check"></i></td>
          <td width="100" class="handle-s">
            <a class="btn blue" href="tp_change/4"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td width="200"><span>[用户]</span><span title=""></span>商城身份认证</td>
		  <td width="200"><span>[内容]</span><span title="<p>尊敬的用户您好，您于{$time}提交了账户安全验证，您的验证码是{$code}({$overtime}之内有效），如非本人操作请忽略。</p>"><p>尊敬的用户您好，您于{$time}提交了账户安全验证，您的验证码是{$code}({$overtime}之内有效），如非本人操作请忽略。</p></span></td>
          <td></td>
        </tr>
		        <tr>
          <td width="24" class="sign"><i class="ico-check"></i></td>
          <td width="100" class="handle-s">
            <a class="btn blue" href="tp_change/5"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td width="200"><span>[用户]</span><span title=""></span>商城邮箱绑定</td>
		  <td width="200"><span>[内容]</span><span title="<p>尊敬的用户，您好！</p><p>请在24小时内点击以下链接完成邮箱验证</p><p><a href="{$url}" target="_blank">马上验证</a></p><p>如果您不能点击上面链接，还可以将以下链接复制到浏览器地址栏中访问</p><p><a href="{$url}" target="_blank">{$url_info}</a></p"><p>尊敬的用户，您好！</p><p>请在24小时内点击以下链接完成邮箱验证</p><p><a href="{$url}" target="_blank">马上验证</a></p><p>如果您不能点击上面链接，还可以将以下链接复制到浏览器地址栏中访问</p><p><a href="{$url}" target="_blank">{$url_info}</a></p</span></td>
          <td></td>
        </tr>
		      </tbody>
    </table>
  </form>
</div>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views//js/jquery.edit.js" charset="utf-8"></script> 
<script type="text/javascript">
$(function(){
	$('.flex-table').find('p').css('display','inline-block');
	$('.flex-table').flexigrid({
		height:'auto',// 高度自动
		usepager: false,// 不翻页
		striped: true,// 使用斑马线
		resizable: false,// 不调节大小
		title: '邮件模板列表',// 表格标题
		reload: false,// 不使用刷新
		columnControl: false// 不使用列控制      
		});
});
</script><div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
