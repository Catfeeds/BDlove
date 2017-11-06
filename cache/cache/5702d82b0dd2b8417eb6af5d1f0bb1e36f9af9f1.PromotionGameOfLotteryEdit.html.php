<?php
/* Smarty version 3.1.29, created on 2017-09-15 14:11:34
  from "D:\www\yunjuke\application\admin\views\PromotionGameOfLotteryEdit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59bb6f16072515_37604713',
  'file_dependency' => 
  array (
    '5702d82b0dd2b8417eb6af5d1f0bb1e36f9af9f1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\PromotionGameOfLotteryEdit.html',
      1 => 1501575948,
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
function content_59bb6f16072515_37604713 ($_smarty_tpl) {
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
	<style>
		.mb-special-layout{background-color: #fff;}
		.mb-special-layout div{float: left;}
		.mb-special-layout .ncap-form-default{width: 72.5%;}
	</style>
	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>大转盘-添加活动</h3>
						<h5>添加大转盘抽奖活动</h5>
					</div>
					 <ul class="tab-base nc-row">
						       
						        <li><a href="JavaScript:void(0);" class="current">设置活动规则</a></li>
						        <li><a href="JavaScript:void(0);">奖品设置</a></li>
						        <li><a href="JavaScript:void(0);">完成</a></li>
						      
					      </ul>
				</div>
				
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 注意：创建好优惠券后就不可以修改，请确认后再创建</li>
				</ul>
			</div>
			<form id="add_form" method="post" action="store_add" enctype="multipart/form-data">
				<div class="mb-special-layout">
					<div class="mb-item-box" style="padding-left: 25px;padding-top: 50px;">
                       <img src="http://[::1]/yunjuke/application/admin/views/images/gameLottery.jpg"  width="350px"  height="540px"/>
                    </div>
                    <div class="ncap-form-default">
                       <dl class="row">
						<dt class="tit">
                    <label for="class_name"><em>*</em>活动名称：</label>
                     </dt>
						<dd class="opt">
							<input id="per_shopping" name="per_shopping" type="text" placeholder="0"  class="input-txt" value="">
							
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>活动时间：</label>
                </dt>
						<dd class="opt">
							<input id="per_shopping" name="per_shopping" type="text" placeholder="0"  class="input-txt" value="">张
							<span class="err"></span>

						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>每次消耗：</label>
                </dt>
						<dd class="opt">
							<input id="per_shopping" name="per_shopping" type="text" placeholder="0"  class="input-txt" value="">积分
							<span class="err"></span>
                            <p class="notic">填写0则不需要积分即可抽奖</p>
						</dd>
					</dl>
					<dl class="row" >
						<dt class="tit">
                    <label for="class_sort"><em>*</em>每人抽奖次数限制:</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
								<select class="valid select2" id="lottery_time_limit" name="lottery_time_limit">
									<option value="0">不限制</option>
									<option value="1">限制</option>
								</select></div>
								<input id="lottery_time_limit_input" name="lottery_time_day_limit_input" style="display: none;" type="text" placeholder="0次"  class="input-txt" value="">
								
						</dd>
					</dl>
					<dl class="row" >
						<dt class="tit">
                    <label for="class_sort"><em>*</em>每人每天抽奖次数限制:</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
								<select class="valid select2" id="lottery_time_day_limit" name="lottery_time_day_limit">
									<option value="0">不限制</option>
									<option value="1">限制</option>
								</select> </div>
								
									<input id="lottery_time_day_limit_input" name="lottery_time_day_limit_input" style="display: none;" type="text" placeholder="0次"  class="input-txt" value="">
								
								
							
						</dd>
					</dl>
					
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">活动规则：</label>
                </dt>
						<dd class="opt">
							<textarea name="statistics_code" rows="6" class="tarea" id="statistics_code"></textarea>
							<span class="err"></span>

						</dd>
					</dl>
					<div class="bot">
						<a id="submit" href="javascript:void(0)" class="btn btn-success radius">下一步</a>
					</div>
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
		
		$(document).ready(function() {
			$("#lottery_time_day_limit").change(function() {
				if(document.getElementById("lottery_time_day_limit").selectedIndex == 1) {
					document.getElementById("lottery_time_day_limit_input").style.display = 'block';
				} else {

					document.getElementById("lottery_time_day_limit_input").style.display = 'none';
				}
			});
			$("#lottery_time_limit").change(function() {
				if(document.getElementById("lottery_time_limit").selectedIndex == 1) {
					document.getElementById("lottery_time_limit_input").style.display = 'block';
				} else {

					document.getElementById("lottery_time_limit_input").style.display = 'none';
				}
			});
		})
	</script>

	</html><?php }
}
