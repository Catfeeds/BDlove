<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:59:26
  from "D:\www\yunjuke\application\admin\views\store_area_setting.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841b4e6b2081_14895488',
  'file_dependency' => 
  array (
    '2b6f10b5f6e0446591b062f2787dc26f4293e6a8' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_area_setting.html',
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
function content_59841b4e6b2081_14895488 ($_smarty_tpl) {
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
				<h3>门店区域设置</h3>
				<h5>设置门店的功能，区域，分组等信息</h5>
			</div>
			<ul class="tab-base nc-row">
			    <li><a class="current"><span>功能设置</span></a></li>
				<li><a href="store_area_edit"><span>编辑门店区域</span></a></li>
				<li><a href="store_area_group"><span>区域分组管理</span></a></li>
			</ul>
		</div>
	</div>
	  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>开启后，若顾客绑定了某门店导购，用户进入“所有门店”页面时，只会看到该门店所属区域的门店列表，不会看到其他区域。
使用该功能前，请先建立区域分组，所有门店必须有一个所在分组。</li>
      <li>示例：
   <li>1. 顾客绑定了门店A的导购A，门店F的导购B；</li>
   <li>门店A所属区域下门店为门店A、门店B、门店C；</li>
   <li>门店F所属区域下门店为门店F、门店G、门店H；</li>
   <li>则该消费者进入“所有门店”，看到的门店为门店A、门店B、门店C、门店F、门店G、门店H，无法看到其他门店。</li>
   <li>2. 顾客未绑定任何导购，则根据当前离消费者最近的门店，显示该门店所有的区域门店列表。</li>
   <li>示例：</li>
   <li>消费者未绑定任何导购，进入“所有门店”列表，距离最近门店为A，门店A所属区域下门店为门店A、门店B、门店C；</li>
   <li>则消费者看到的门店为门店A、门店B、门店C；</li>
    </ul>
  </div>
	<form action="store_area_set" method="post" id="form_" name="settingForm">
		
		<div class="ncap-form-default">
			<dl class="row">
				<dt class="tit">
					<label>区域门店隔离</label>
				</dt>
				<dd class="opt">
					<div class="onoff">
						<label for="qq_isuse_1" class="cb-enable  " title="开启"><span>开启</span></label>
						<label for="qq_isuse_0" class="cb-disable selected  " title="关闭"><span>关闭</span></label>
						<input type="radio" id="qq_isuse_1" name="qq_isuse"     value="1"  >
						<input type="radio" id="qq_isuse_0" name="qq_isuse"  checked value="0"  >
					</div>
					<p class="notic">商户下的门店为区域性，部分区域为经销商自治；不期望经销商A的客户看到其他经销商，已保证经销商利益，可使用本功能</p>
				</dd>
			</dl>
		    <dl class="row">
				<dt class="tit">
					<label>门店隔离半径</label>
				</dt>
				<dd class="opt">
					<input type="text" value="1000" name="area_region" id="area_region" class="input-txt">(单位:公里)
					<span class="err"></span>
					<p class="notic">门店隔离半径最大限制为1000公里</p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label>已绑定导购用户</label>
				</dt>
				<dd class="opt">
					根据已绑定导购的门店，显示这些门店所属区域的门店
					<p class="notic">商户下的门店为区域性，部分区域为经销商自治；不期望经销商A的客户看到其他经销商，已保证经销商利益，可使用本功能</p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label>未绑定导购用户</label>
				</dt>
				<dd class="opt">
					<select name="delivery" class="valid">
                        <option value="1" selected>门店隔离半径内，最近一个门店所属的区域门店；无则不显示</option>
                        <option value="2" >门店隔离半径内，最近一个门店所属的区域门店；无则显示直营店</option>
                         <option value="3" >门店隔离半径内，最近一个门店所属的区域门店；无则显示旗舰店</option>
                        <option value="4" >只显示直营店</option>
                         <option value="5" >只显示旗舰店</option>
                     </select>
					
				</dd>
			</dl>
			
			<div class="bot"><a href="JavaScript:;" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
		</div>
	</form>


</div>
<script>
$(function(){
	 $('#submitBtn').click(function(){
		 var radios = $('#area_region').val();
		 /* console.log(radios);
		 console.log(isNaN(radios));return false; */
		 if(isNaN(radios)){
			 layer.msg('隔离半径只能为数字');return false;
		 }
		 if(parseInt(radios)>1000){
			 layer.msg('隔离半径不能超过1000');return false;
		 }
		 $('#form_').submit();
	 })
})

</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
