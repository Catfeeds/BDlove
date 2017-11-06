<?php
/* Smarty version 3.1.29, created on 2017-05-31 18:36:04
  from "D:\www\yunjuke\application\admin\views\weixin_auth.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_592e9c94f01b71_18900007',
  'file_dependency' => 
  array (
    '381a61a89610bbd5095cf2dcf0f6d8ad0090315c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\weixin_auth.html',
      1 => 1492225944,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1492225917,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_592e9c94f01b71_18900007 ($_smarty_tpl) {
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
span.red{color:red;}
span.green{color:#00BB9C;}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>微信公众号授权</h3>
        <h5>对接微商城所关联的微信公众号</h5>
      </div>
      </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
<li> 若绑定洽客后为未认证公众号，之后通过了微信认证，请重新授权补充权限。</li>
<li>仅微信认证后的服务号可使用完整洽客功能，若微信公众号接口异常，根据提示处理后请点击上方重新授权。</li>
<li> 若公众号为订阅号，需通过微信认证才可支持微信支付；服务号均可支持。</li>
    </ul>
  </div>
  <form method="post" id="form_email" action="setting" name="settingForm">
    <input type="hidden" name="form_submit" value="ok" />
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">公众微信号：</dt>
        <dd class="opt">
                   </dd>
      </dl>
      <dl class="row">
        <dt class="tit">公众号昵称：</dt>
        <dd class="opt">
          BE童装城        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">公众号类型：</dt>
        <dd class="opt">
                    已认证服务号          <p class="notic">账号升级后，请重新授权微信公众号</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">微信接口状态：</dt>
        <dd class="opt">
           <table class="table table-border table-bordered table-bg">
  <thead class="text-c">
    <tr>
       <th>消息及自定义菜单管理</th>
      <th>用户管理</th>
      <th>二维码获取</tthd>
      <th>网页授权</th>
    </tr>
  </thead>
  <tbody>
    <tr  class="text-c">
      <td>设置公众号微信菜单。微信粉丝关注及相关消息处理，如首访语</td>
      <td>获取用户基本信息接口，如微信昵称、性别、头像等。需"网页授权"权限才可使用</td>
      <td>用于生成导购专属公众号二维码。</td>
      <td>用于微信用户直接登陆洽客商城页面。</td>
    </tr>
    <tr class="text-c">
      <td><span class="green"><i class="fa fa-check-circle"></i>已获得</span></td>
      <td><span class="green"><i class="fa fa-check-circle"></i>已获得</span></td>
      <td><span class="green"><i class="fa fa-check-circle"></i>已获得</span></td>
      <td><span class="green"><i class="fa fa-check-circle"></i>已获得</span></td>
    </tr>
   
  </tbody>
</table>
        </dd>
      </dl>
      <div class="bot">
     	     <a href="https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=wx732ceda87b2ff421&pre_auth_code=preauthcode@@@-LPHNIq7HfXc-fMiUNkE2v2gGn0cwZ5VWYu8VViFxWdCDUTYKOLuiAmPM1KcWzop&redirect_uri=http://[::1]/yunjuke/admin.php/weixin/weixin_auth_callback" target="_blank" class="btn btn-warning radius" id="getup">重新授权</a>
	     <a href="https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=wx732ceda87b2ff421&pre_auth_code=preauthcode@@@-LPHNIq7HfXc-fMiUNkE2v2gGn0cwZ5VWYu8VViFxWdCDUTYKOLuiAmPM1KcWzop&redirect_uri=http://[::1]/yunjuke/admin.php/weixin/weixin_auth_callback" target="_blank" class="btn btn-danger radius ml-20" id="getup">更换公众号</a>
           </div>
    </div>
  </form>
</div>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
