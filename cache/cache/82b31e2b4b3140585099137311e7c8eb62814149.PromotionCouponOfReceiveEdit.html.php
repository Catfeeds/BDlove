<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:10:32
  from "D:\www\yunjuke\application\admin\views\PromotionCouponOfReceiveEdit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c2227816e347_79842182',
  'file_dependency' => 
  array (
    '82b31e2b4b3140585099137311e7c8eb62814149' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\PromotionCouponOfReceiveEdit.html',
      1 => 1492225916,
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
function content_59c2227816e347_79842182 ($_smarty_tpl) {
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
					<a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>领券活动-添加活动</h3>
						<h5>平台中的所有新闻的管理</h5>
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
			<form id="add_form" method="post" action="store_add" enctype="multipart/form-data">
				<input type="hidden" name="store_id" value="">
				<div class="ncap-form-default">
					<dl class="row">
						<dt class="tit">
                    <label for="class_name"><em>*</em>券码生成方式：</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
								<input type="radio" id="coupon_create1" name="coupon_create" onclick="setCouponCreate(this.value)" value="1" checked><label for="coupon_create1">系统生成</label>
								<input type="radio" id="coupon_create2" name="coupon_create"  onclick="setCouponCreate(this.value)"  value="2"><label for="coupon_create2">自有券码导入</label>
								<span class="err"></span></div>
							<p class="notic">导入的外部券码库通过洽客活动进行发放设置后，消费者领取到券后，显示的券码为外部券码库中的券码</p>
						</dd>
					</dl>
					
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>优惠券：</label>
                </dt>
						<dd class="opt">
						<div class="couponBox">
							<div class="couponWrap" style="background-color: rgb(244, 67, 54);">
								<div class="top">
									<div class="couponName">测试优惠券</div>
									<div class="type">
										<span class="couponValue">12</span>元优惠券,满<span class="orderLimitValue">160</span>元可用
									</div>
								</div>
								<div class="bottom">
									<span class="r" id="couponDateLimit">
											<span class="couponstart">2017-04-11</span> - <span class="couponend">2017-04-28</span>
											</span>
								</div>
							</div>
							<a href="javascript:;" id="editCoupon" class="btn  ml20 mt20 btn-warning radius" >编辑</a>
							<input type="hidden" name="couponId" id="couponId" class="error-after" value="26940" aria-required="true">
						</div>
						<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>

					<dl class="row">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>发放时间：</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
								<input type="text" id="start_time" onclick="laydate()" value="" name="start_time" placeholder="开始时间">至
								<input type="text" id="end_time" onclick="laydate()" value="" name="end_time" placeholder="结束时间">
								<span class="err"></span></div>
							<span class="err"></span>
							<p class="notic">线上代表只有微商城，线下只有线下收银，线上线下是指线上有微商城线下有实体收银部分</p>
						</dd>
					</dl>
					<dl class="row" id="importexcel" style="display: none;">
						<dt class="tit">
                    <label for="class_sort">导入券码：</label>
                </dt>
						<dd class="opt">
							<div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i> </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield2" class="type-file-text"> <input type="button" name="" id="button2" value="选择导入..." class="type-file-button"> <input class="type-file-file valid" id="import_excel" name="file_" type="file" hidefocus="true" nc_type="cms_image"></span></div>
							<span class="err"></span>

						</dd>
					</dl>
					<dl class="row" id="coupon_to_store_limit">
						<dt class="tit">
                    <label for="class_sort"><em>*</em>发放门店</label>
                </dt>
						<dd class="opt">
							<div class="area-region-select">
								<select class="valid select2" id="coupon_to_store" name="coupon_to_store">
									<option value="1">不限量</option>
									<option value="2">限量</option>
								</select>张
								<p class="notic"></p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_sort">活动备注</label>
                </dt>
						<dd class="opt">
							<textarea name="statistics_code" rows="6" class="tarea" id="statistics_code"></textarea>
							<span class="err"></span>

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
		function setCouponCreate(sRadioValue){        //传入radio的name和选中项的值
			if(sRadioValue==1)
			{
				  document.getElementById("importexcel").style.display='none';
			}
			else{
				  
				  document.getElementById("importexcel").style.display='block';
			}
		}
		
        $(document).ready(function(){  
           $("#coupon_create_type").change(function(){
			  if(document.getElementById("coupon_create_type").selectedIndex==1)
				{
					 document.getElementById("coupon_to_store_limit").style.display='block';
				}
				else{
					  
					  document.getElementById("coupon_to_store_limit").style.display='none';
				}
			});
			$("#editCoupon").click(function(){
                layer.open({
                    type: 2,
                    title: '<b>编辑优惠券</b>',
                    skin: 'layui-layer-rim', //加上边框
                    area: ['50%', '45%'], //宽高
                    content: 'PromotionCouponEdit',
                    yes: function () {
                    }, no: function () {}
                })
			});
			   
		})
        
         
	</script>

	</html><?php }
}
