<?php
/* Smarty version 3.1.29, created on 2017-08-04 17:58:05
  from "D:\www\yunjuke\application\admin\views\public_store_of_other.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5984452d52de22_12521014',
  'file_dependency' => 
  array (
    '45b39d1934a6574546c3198f35b56f913869e3ea' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\public_store_of_other.html',
      1 => 1501840679,
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
function content_5984452d52de22_12521014 ($_smarty_tpl) {
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
	<link rel="stylesheet" href="http://[::1]/yunjuke/application/admin/views/css/kalendae.css" />
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/kalendae.standalone.js"></script>
<style>
.percent{margin-bottom:10px;}
input.input-num{width:60px !important;}
.kalendae .k-calendar {
    display: inline-block;
    zoom:1;
    *display:inline;
    /* width改为100% width:155px;*/ 
    width: 300px; 
    vertical-align:top;
}
.kalendae .k-title,
.kalendae .k-header,
.kalendae .k-days {
    /* width改为100% */
    /* width:154px; */
    width: 300px;
    display:block;
    overflow:hidden;
}
.kalendae .k-header span {
    text-align:center;
    font-weight:bold;
    /* 这里的width要和.kalendae .k-days span 里面的相等 */
    width:12.8%;
    padding:1px 0;
    color:#666;
}
.kalendae .k-days span {
    /* 水平居中 */
    text-align:center;
    width:12.8%;
    /* 高度 4.5em效果比较好 height等于line-height就能垂直居中了 */
    height:2.5em;
    line-height:2.5em;
    padding:2px 3px 2px 2px;
    border:1px solid transparent;
    border-radius:3px;
    color:#999;
}
.check-box{
	padding-left: 0;
	padding-right: 26px;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
    <div id="append_parent"></div>
    <div id="ajaxwaitid"></div>
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
               <a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>店铺管理 - (ABC成都仓)其他信息设置</h3>
						<h5>供应仓库中的其他信息设置</h5>
					</div>
					                <ul class="tab-base nc-row">
				        <li><a href="store_edit?role=g&op=edit&id=65">基本信息</a></li>
				        <li><a href="store_of_goods?role=g&op=edit&id=65">商品</a></li>
				        <li><a href="store_of_shopping_guide?role=g&op=edit&id=65">导购</a></li>
				        <li><a href="mall_express_tools?role=g&op=&id=65">运费</a></li>
				        <li><a href="JavaScript:void(0);" class="current">其他</a></li>
			      </ul>
			                  </div>
        </div>
        <!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 若绑定云聚客后为未认证公众号，之后通过了微信认证，请重新授权补充权限。</li>
					<li>仅微信认证后的服务号可使用完整云聚客功能，若微信公众号接口异常，根据提示处理后请点击上方重新授权。</li>
					<li> 若公众号为订阅号，需通过微信认证才可支持微信支付；服务号均可支持。</li>
				</ul>
			</div>
        <form method="post" id="settingForm" name="settingForm" action="store_other_set?role=g">
            <input type="hidden" name="store_id" value="65">
            <input type="hidden" name="store_name" value="ABC成都仓">
            <div class="ncap-form-default">
                <dl class="row">
                   <dt class="tit">
                        <label for="store_arayacak">自提订单提货码通知:</label>
                    </dt>
                    <dd class="opt">
                        <select name="store_arayacak" class="valid">
                            <option value="1" selected>仅微信 公众号提醒</option>
                            <option value="2" >短信提心及微信公众号提醒</option>
                        </select>
                        <p class="notic">门店自提订单，发送提货码短信给用户；方便未关注用户购买后可直接查询短信；已关注用户48小时内公众号会有推送提醒，在订单内也可查询到。</p>
                        <span class="err"></span>
                    </dd>
                </dl>
                <dl class="row">
						<dt class="tit">
                    <label for="class_name">订单抽成比例</label>
                </dt>
						<dd class="opt">
						    
							<div class="percent">门店订单：<input type="number" value="" name="order_take_percentage[offline]" id="" class="input-num">
							<span class="err"></span></div>
							
							<div class="percent">微信订单：<input type="number" value="" name="order_take_percentage[system]" id="" class="input-num">
							<span class="err"></span></div>
							
							<div class="percent">分销订单：<input type="number" value="" name="order_take_percentage[agent]" id="" class="input-num">
							<span class="err"></span></div>
							
							<div class="percent">电商订单：<input type="number" value="0.1" name="order_take_percentage[online]" id="" class="input-num">
							<span class="err"></span></div>
							
							<p class="notic">请填写小数</p>
						</dd>
						
					</dl>
                <dl class="row">
						<dt class="tit">
                    <label for="class_name">吸粉返利比例</label>
                </dt>
						<dd class="opt">
							<input type="number" value="0.00" name="follow_user_percentage" id="follow_user_percentage" class="input-num">
							<span class="err"></span>
							<p class="notic"></p>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_name">发货时间</label>
                </dt>
						<dd class="opt">
							<div class="check-box">
							    <input type="checkbox" id="checkbox-1">
							    <label for="checkbox-1">周一</label>
							</div>
							<div class="check-box">
							    <input type="checkbox" id="checkbox-2">
							    <label for="checkbox-2">周二</label>
							</div>
							<div class="check-box">
							    <input type="checkbox" id="checkbox-3">
							    <label for="checkbox-3">周三</label>
							</div>
							<div class="check-box">
							    <input type="checkbox" id="checkbox-4">
							    <label for="checkbox-4">周四</label>
							</div>
							<div class="check-box">
							    <input type="checkbox" id="checkbox-5">
							    <label for="checkbox-5">周五</label>
							</div>
							<div class="check-box">
							    <input type="checkbox" id="checkbox-5">
							    <label for="checkbox-5">周六</label>
							</div>
							<div class="check-box">
							    <input type="checkbox" id="checkbox-5">
							    <label for="checkbox-5">周日</label>
							</div>
						</dd>
					</dl>
					<dl class="row">
						<dt class="tit">
                    <label for="class_name">不能发货时间</label>
                </dt>
						<dd class="opt">
						<input type="text" class="auto-kal" data-kal="mode:'multiple'" style="width: 450px;">
						</dd>
					</dl>
               	
                <div class="bot"><a href="JavaScript:;" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
            </div>
        </form>
    </div>
  	
    <div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
<script type="text/javascript">

  $(document).ready(function(){
	  valid_rule = {
			  'order_take_percentage[offline]': {
		            //required: true,
		            range: [0.001,0.999],
		          },
			  'order_take_percentage[system]': {
		            //required: true,
		            range: [0.001,0.999],
		          },
			  'order_take_percentage[agent]': {
		            //required: true,
		            range: [0.001,0.999],
		          },
			  'order_take_percentage[online]': {
		            //required: true,
		            range: [0.001,0.999],
		          },
		     'follow_user_percentage': {
		            //required: true,
		            range: [0,0.999],
		          },
		        };
	  valid_msg = {
			  'order_take_percentage[offline]' : {
	              //required : '<i class="icon-exclamation-sign">请填写抽成比例</i>',
	              range : '<i class="icon-exclamation-sign">数字应在0与0.999之间</i>',
	            },
			  'order_take_percentage[system]' : {
	              //required : '<i class="icon-exclamation-sign">请填写抽成比例</i>',
	              range : '<i class="icon-exclamation-sign">数字应在0与0.999之间</i>',
	            },
			  'order_take_percentage[agent]' : {
	              //required : '<i class="icon-exclamation-sign">请填写抽成比例</i>',
	              range : '<i class="icon-exclamation-sign">数字应在0与0.999之间</i>',
	            },
			  'order_take_percentage[online]' : {
	              //required : '<i class="icon-exclamation-sign">请填写抽成比例</i>',
	              range : '<i class="icon-exclamation-sign">数字应在0与0.999之间</i>',
	            },
	            'follow_user_percentage' : {
	              //required : '<i class="icon-exclamation-sign">请填写吸粉返利比例</i>',
	              range : '<i class="icon-exclamation-sign">数字应在0与0.999之间</i>',
	            },
	          };
	  $("#settingForm").validate({
	      errorPlacement: function(error, element){
	        var error_td = element.next('span.err');
	        error_td.append(error);
	      },
	      rules : valid_rule,
	      messages : valid_msg
	    });
		$('#submitBtn').click(function(){
			if($("#settingForm").valid()){
				$('#settingForm').submit();
			  }  
		    
			 
		})
  })
</script>
</html>
<?php }
}
