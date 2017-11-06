<?php
/* Smarty version 3.1.29, created on 2017-08-04 09:21:06
  from "D:\www\yunjuke\application\pay\views\pay_scan.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5983cc02485257_34097557',
  'file_dependency' => 
  array (
    '3651aa08ea2f39fd54cd5284ebb5ba0b7897c549' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pay_scan.html',
      1 => 1501636154,
      2 => 'file',
    ),
    '6282d7701d9f48f80f702a7e7b90bb633e309386' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\lib\\link.html',
      1 => 1500887409,
      2 => 'file',
    ),
    '940fa3e7a5fc658c974a607afc3fab9d110f7f64' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\lib\\footer.html',
      1 => 1499676757,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5983cc02485257_34097557 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>云聚客门店收银系统 | 智慧店铺</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
		<meta name="format-detection" content="telephone=no">
			<link href="http://[::1]/yunjuke/application/pay/views/css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<link href="http://[::1]/yunjuke/application/pay/views/css/sweetalert.css" type="text/css" rel="stylesheet">
		<link href="http://[::1]/yunjuke/application/pay/views/css/animate_new.css" type="text/css" rel="stylesheet">
		<link href="http://[::1]/yunjuke/application/pay/views/css/style.css" type="text/css" rel="stylesheet">
		<link href="http://[::1]/yunjuke/application/pay/views/css/app.css" type="text/css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/style.css" />
		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/css/H-ui.min.css" />
		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
		<link href="http://[::1]/yunjuke/application/pay/views/css/font-awesome.css" type="text/css" rel="stylesheet">
		<!-- Mainly scripts -->
		<script src="http://[::1]/yunjuke/application/pay/views/js/jquery.js" type="text/javascript"></script>
		<script src="http://[::1]/yunjuke/application/pay/views/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="http://[::1]/yunjuke/application/pay/views/js/jquery.metisMenu.js" type="text/javascript"></script>
		<script src="http://[::1]/yunjuke/application/pay/views/js/jquery.slimscroll.min.js" type="text/javascript"></script>
		<!-- Custom and plugin javascript -->
		<script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/select2.js"></script>
		<script src="http://[::1]/yunjuke/application/pay/views/js/inspinia.js" type="text/javascript"></script>
		<script src="http://[::1]/yunjuke/application/pay/views/js/sweetalert.min.js" type="text/javascript"></script>
		<script src="http://[::1]/yunjuke/application/pay/views/js/jquery.qrcode.min.js" type="text/javascript"></script>
		<script src="http://[::1]/yunjuke/plugins/common/common.js" type="text/javascript"></script>
		<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
		<!----开放式头部，请在自己的页面加上--</head>-->
		<script type="text/javascript">
			$(function() {
				var system = {};
				var p = navigator.platform;
				system.win = p.indexOf("Win") == 0;
				system.mac = p.indexOf("Mac") == 0;
				system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
				if(system.win || system.mac || system.xll) {
					//pc
				} else {
					//mobile
					$(".iconList li").eq(0).hide();
					$(".iconList li").eq(3).hide();
					$(".iconList li").eq(5).hide();
					$(".iconList li").eq(6).hide();
					$(".iconList li").eq(7).hide();
					$(".iconList li").eq(8).hide();
				}
			})
		</script>
		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css" />
		<style>
		    #form3 tr{
			   text-align:center;
		    }
		    #form3 ul{text-align:center;margin:0 20%;}
		    #form3 ul li{
			  float:left;margin:20px 10px;
		    }
		   #form3 ul li a{color:#0096ff;}
		   .pay-content td{
		   	line-height: 23px !important;
		   }
		   table td,
		   table th{
		   	text-align: center!important;
		   }
		   tr.current{
	          background-color:#999999;  
		   }
		   span.err{
	           color:red;
		   }
		   .modal-dialog {
    width: 750px !important;
    height: 550px !important;
}
		   .checkbox{
			    position: relative;
			    display: block;
			    margin: 0px; 
			}
			.btn-pay{
				color: #fff;
				padding: 10px 20px;
			}
			.btn-pay:hover{
				color: #fff;
			}
			.paymoney{
				padding: 10px;
				background: #021a2e;
				color: #fff;
			}
			.paymoney span{
				color: red;
				margin: 0 8px;
			}
			.memberinfo{
				background: #858d97;
				padding: 30px;
				border: 1px solid #ddd;
				margin-top: 20px;
				color: #666;
			}
			.bg-green{
				background: #1bc096!important;
			}
			.memberinfo td{
				border-top:0px!important;
			}
			.pay-left{
				line-height: 29px !important;
				text-align: right;
			}
			.tabs-container .nav-tabs > li.active > a, .tabs-container .nav-tabs > li.active > a:hover, .tabs-container .nav-tabs > li.active > a:focus {
			    border: 1px solid #ccc;
			    border-bottom-color: transparent;
			}
			.tabs-container .panel-body {
				border: 1px solid #ccc;
			}
			.tabs-container .nav-tabs {
    border-bottom: 1px solid #ccc;
}
th{
	background: #eee!important;
}
.btn{
	border: none!important;
}
.form-control, .single-line {
    border: 1px solid #ccc;
    }
    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    border: 1px solid #ddd;
}
.totalPrice{
	letter-spacing: 1px;
	margin-left: 20px;
	font-size: 16px;
	color: #666;
}

.totalPrice span{
	color: red;
	padding: 0 3px;
	font-size: 23px;
	font-weight: bold;
}
.total-title{
	font-size: 25px!important;
	color: #3c3950!important;
	font-weight: bold;
}
.selectarea{
	width: 100px;
}
#stockInfoForm{
	overflow-y: auto;
}
.display{
	background: #a9a9a9;
}
.display:hover{
	background: #a9a9a9;
}
.modal-dialog {
    min-width: 660px !important;
    max-width: 90% !important;
}
.guide{
	width: 200px;display: flex!important;
	justify-content: flex-end;
	align-items: center;
}
.guide-icon{
	width: 25px;
	margin-right: 5px;
}
.guide-name{
	margin-bottom: 0px;
	color: #999;
}
.name-right{
	margin-bottom: 0px;
	color: #999;
}
.changename{
	text-decoration: underline;
	cursor: pointer;
	color: dodgerblue;
}
.nav-title{
	line-height: 40px;
	background: #fff;
	margin: 0 -20px;
	padding: 0 20px;
}
.input-title{
	width: 90px;
	font-size: 16px;
}
.input-query{
	width: 200px;
	float: left;
	margin: 0 20px;
}
.micropay .table input{
	height: 25px;
}
.micropay .table>tbody>tr>td {
    padding: 8px 0;
    border: 1px solid #e7e7e7;
}
.table{
	background: #fff;
}
td a{
	color: red;
}
.bottom{
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 70px;
	background: #e4e4e4;
	line-height: 70px;
}
.startpay{
	margin-left: 30px;
}
.changeinput{
	margin: 0 auto;
	display: none;
}
.table-bordered {
    border-collapse: collapse;
}
@media only screen and (max-width: 1600px) {
	.totalPrice {
    letter-spacing: 0px;
    font-size: 14px;
	}
	.totalPrice span {
    padding: 0 2px;
    font-size: 22px;
	}
	.btn-pay {
    padding: 8px 16px;
}
.startpay{
	margin-left: 20px;
}
}
@media only screen and (max-width: 1350px) {
	.total-title {
    font-size: 22px!important;
}
.totalPrice span {
    padding: 0 1px;
    font-size: 20px;
}
.startpay{
	margin-left: 10px;
}
}
@media only screen and (max-width: 1180px) {
	.btn-paygroup{
		position: absolute;
		top: -60px;
		left: 10px;
	}
}
        </style>
	</head>

	<body>
		<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 收银台 <span class="c-gray en">&gt;</span> 在线收银
						<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>
		<div class="pull-right guide mr-20 mt-10">
										<div class="guide-icon"><img src="http://[::1]/yunjuke/application/pay/views/images/guide.png" class="img-responsive"/></div>
										<p class="guide-name">导购：</p>
										<p class="name-right"><span class="name">姓名</span>　<span class="changename">切换</span></p>
										<div id="storeG" style="display: none;">
											<select id="storeGuide" name="storeGuide" class="selectarea">
												
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: storeGuide</p>
<p>Filename: templates_c/3651aa08ea2f39fd54cd5284ebb5ba0b7897c549_0.file.pay_scan.html.cache.php</p>
<p>Line Number: 281</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\3651aa08ea2f39fd54cd5284ebb5ba0b7897c549_0.file.pay_scan.html.cache.php<br />
			Line: 281<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\pay\controllers\Account.php<br />
			Line: 854<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\pay.php<br />
			Line: 331<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/3651aa08ea2f39fd54cd5284ebb5ba0b7897c549_0.file.pay_scan.html.cache.php</p>
<p>Line Number: 281</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\3651aa08ea2f39fd54cd5284ebb5ba0b7897c549_0.file.pay_scan.html.cache.php<br />
			Line: 281<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\pay\controllers\Account.php<br />
			Line: 854<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\pay.php<br />
			Line: 331<br />
			Function: require_once			</p>

		
	

</div>											</select>
										</div>
									</div>
		<div id="wrapper" style="padding:10px 15px;">
				<div class="wrapper wrapper-content animated fadeIn">
					<div class="row">
							<div class="tabs-container weixin">
								
								<div class="tab-content" style="margin-top: 10px;">
									<div id="tab-pay">
											<div class="row">
												<div class="col-sm-12 micropay">
												    <form id="userInfoForm" onsubmit="return false;">
													<table class="table table-bordered table-responsive">
														<tr>
															<td class="input-title">输入区</td>
															<td style="width: 240px;"><div class="input-query"><input type="text" class="form-control input-sm" name="barcode" id="barcode" placeholder="条码"/></div></td>
															<td><div class="input-query"><input type="text" class="form-control input-sm" name="stockcode" id="stockcode" placeholder="货号"/></div><div class="input-query" style="width: 100px;"><input type="text" class="form-control input-sm" name="size" id="size" placeholder="尺码"/></div><div class="input-query" style="width: 80px;"><button type="button" class="btn btn-info btn-block stockSubmit" style="background: #1bc096;height: 25px;padding-top: 2px;">确定</button></div></td>						
														</tr>
													   <tr>
															<td class="input-title">会员信息</td>
															<td colspan="2">
																<div class="input-query">
																<input type="text" class="form-control input-sm" name="userTel"  placeholder="电话" id="userTel"/>
																<input type="hidden" name="user_id" id="user_id"/>
																</div>
																<div class="input-query">
																<input type="text" class="form-control input-sm" name="wechat" placeholder="微信" id="wechat"/>
																</div>
																<div class="input-query">
																<input type="text" class="form-control input-sm" name="userName" placeholder="用户名"  id="userName"/>
																</div>
															</td>
															<!--<div class="col-xs-3 input">
															<input type="text" class="form-control input-sm" name="userQQ" placeholder="QQ"  id="userQQ"/>
															</div>-->
															<!--<div class="col-xs-3 input">
															<input type="text" class="form-control input-sm" name="userAddress" placeholder="地址" id="userAddress"/>
															</div></td>-->
														</tr>	
													</table>
													</form>
													
													<!--显示内容主体表格-->
													<form id="stockInfoForm" onsubmit="return false;">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th>序号</th>
																<th>品牌</th>
																<th>条码</th>
																<th>货号</th>
																<th>尺码</th>
																<th>数量</th>
																<th>单价</th>
																<th>折扣</th>
																<th>合计</th>
																<th>会员信息</th>
																<th>备注</th>
																<th>操作</th>
															</tr>
														</thead>
														<tbody class="pay-content">
															 <tr>
																<td>1</td>
																<td>安娜公主</td>
																<td>9787547721476</td>
																<td>cd02800602</td>
																<td>130</td>
																<td style="width: 80px;"><span class="nowshow">268</span><div class="changeinput" style="width: 50px;"><input type="text" class="form-control input-sm" placeholder="268"/></div></td>
																<td>268</td>
																<td style="width: 120px;"><span class="nowshow">8.8</span><div class="changeinput" style="width: 80px;"><input type="text" class="form-control input-sm" placeholder="8.8"/></div></td>
																<td>286</td>
																<td></td>
																<td></td>
																<td><a href="javascript:;">删除</a></td>
															</tr>
															<tr>
																<td>2</td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>3</td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>4</td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>5</td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
														</tbody>
													</table>
													</form>
												</div>
											</div>
									</div>
									<div id="tab-return" style="display: none;">
										<div class="row">
												<div class="col-sm-12 micropay">
												    <form id="userInfoForm" onsubmit="return false;" style="width: 100%;background: #fff;">
													<table class="table table-bordered" style="width: 700px;">
														<tbody>
														<tr>
															<td class="input-title" style="width: 100px">收银单号</td>
															<td style="width: 240px;"><div class="input-query"><input type="text" class="form-control input-sm"/></div></td>
															<td class="input-title" style="width: 100px">订单号</td>
															<td style="width: 240px;"><div class="input-query"><input type="text" class="form-control input-sm"/></div></td>
														</tr>
														</tbody>
													</table>
													</form>
													</div>
													</div>
									</div>
										
										<!--确认收款弹出框-->
										<div class="modal fade" id="confirmpay" tabindex="-1" role="dialog" aria-labelledby="confirmpay" aria-hidden="true">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header" style="background: #2f4050;color: #fff;">
										                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
										                <h3 class="modal-title text-center">收银</h3>
										            </div>
										            <div class="modal-body row">
										            	<div class="col-xs-6">
										            	<form id="payInfoForm" onsubmit="return false;">
										            	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
										            			
										            			<tr>
										            				<td class="pay-left" style="width: 90px;">现金支付</td>
										            				<td><input type="text" onchange="paychange(this)" name="paycash" class="form-control input-sm"/></td>
										            			</tr>
										            			<tr>
										            				<td class="pay-left">银行卡</td>
										            				<td><input type="text" onchange="paychange(this)" name="paybank" class="form-control input-sm"/></td>
										            			</tr>
										            			<tr>
										            				<td class="pay-left">微信支付</td>
										            				<td><input type="text" onchange="paychange(this)" name="paywx" class="form-control input-sm"/></td>
										            			</tr>
										            			<tr>
										            				<td class="pay-left">支付宝支付</td>
										            				<td><input type="text" onchange="paychange(this)" name="payzfb" class="form-control input-sm"/></td>
										            			</tr>
										            			<tr>
										            				<td class="pay-left">余额支付</td>
										            				<td><input type="text" onchange="paychange(this)" name="paybalance" class="form-control input-sm"/></td>
										            			</tr>
										            			
										            	</table>
										            	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
										            			<tr>
										            				<td class="pay-left" style="width: 90px;">券支付</td>
										            				<td><input type="text" onchange="paychange(this)" name="paycoupon" class="form-control input-sm"/></td>
										            			</tr>
										            			<tr>
										            				<td class="pay-left">充值卡支付</td>
										            				<td><input type="text" onchange="paychange(this)" name="paycard" class="form-control input-sm"/></td>
										            			</tr>
										            			
										            	</table>
										            	
										            	<div>
										            		<!-- <button class="btn btn-primary">暂不支付</button> -->
										            		<button class="btn btn-primary bg-green"  type="button" onclick="pay()">结账</button>
										            		<button type="button" class="btn btn-primary bg-green" data-dismiss="modal" aria-hidden="true">取消</button>
										            		<!-- <button class="btn btn-primary">确定</button> -->
										            	</div>
										            	</form>
										            	</div>
										            	
										            	<div class="col-xs-6">
										            		<div class="paymoney text-center">
										            			<p>数量：<span class="payNumber">0</span>件　　交易金额：<span class="payPrice">00.00</span>元</p>
										            			<!-- <p>(附加服务费：<span>0.00</span>元)</p> -->
										            			<p>　应支付<span style="font-size: 25px;margin: 0 30px;" class="pay_have">00.00</span>元</p>
										            			<p>　实际支付<span style="font-size: 25px;margin: 0 30px;" class="payTrue">00.00</span>元</p>
										            			<p>　找零<span style="font-size: 25px;margin: 0 30px;" class="payRefaud"></span>元</p>
										            			<!-- <p>还应支付<span style="font-size: 25px;margin: 0 30px;">0.00</span>元</p> -->
										            		</div>
										            		<div class="memberinfo">
										            			<table class="table">
										            				<tr>
										            					<td>客户姓名:</td>
										            					<td class="payUserName"></td>
										            				</tr>
										            				<tr>
										            					<td>联系电话:</td>
										            					<td class="payUserTel"></td>
										            				</tr>
										            				<tr>
										            					<td>VIP等级:</td>
										            					<td class="payUserGrade"></td>
										            				</tr>
										            				<tr>
										            					<td>余额:</td>
										            					<td class="payUserBalance"></td>
										            				</tr>
										            				<tr>
										            					<td>可用充值卡:</td>
										            					<td class="payUserCard"></td>
										            				</tr>
										            				<tr>
										            					<td>积分:</td>
										            					<td class="payUserIntegral"></td>
										            				</tr>
										            			</table>
										            		</div>
										            	</div>
										            </div>
										            <!-- <div class="modal-footer">
										                <button type="button" class="btn btn-primary btn-pay" data-dismiss="modal" aria-hidden="true">取消</button>
										            </div> -->
										        </div>
										    </div>
										</div>
										
										<!--会员查询弹出框-->
										<!--<div class="modal fade" id="selectmember" tabindex="-1" role="dialog" aria-labelledby="selectmember" aria-hidden="true">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header" style="background: #2f4050;color: #fff;">
										                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
										                <h3 class="modal-title text-center">会员查询</h3>
										            </div>
										            <div class="modal-body row">
										            	<div class="col-xs-offset-5 col-xs-6">
										            		<div class="col-xs-10"><input type="text" name="membernum" id="membernum" placeholder="手机/用户名/qq/微信昵称" class="form-control"/></div>
										            		<div class="col-xs-2"><button class="btn btn-pay" onclick="searchUser()">会员查询</button></div>
										            	</div>
										            	<div style="clear: both;"></div>
										            	<table class="table table-bordered" style="margin-top: 20px;max-height: 400px;overflow-y: auto;">
										            		<thead>
										            			<tr>
										            				<th>姓名</th>
										            				<th>手机号码</th>
										            				<th>微信号</th>
										            				<th>积分</th>
										            				<th>购买记录</th>
										            				<th>备注</th>
										            			</tr>
										            		</thead>
										            		<tbody>
										            			
										            		</tbody>
										            	</table>
										            	
										            </div>
										            <div class="modal-footer">
										                <button type="button" class="btn btn-primary btn-pay" onclick="selectUserSure()" data-dismiss="modal" aria-hidden="true">确定</button>
										            </div>
										        </div>
										    </div>
										</div>-->
										
										<!--库存查询弹出框-->
										<!--<div class="modal fade" id="selectstock" tabindex="-1" role="dialog" aria-labelledby="selectstock" aria-hidden="true">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header" style="background: #2f4050;color: #fff;">
										                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
										                <h3 class="modal-title text-center">库存查询</h3>
										            </div>
										            <div class="modal-body row">
										            	<div class="col-xs-offset-5 col-xs-6">
										            		<div class="col-xs-10"><input type="text" name="stock" id="stock" placeholder="请输入条形码、货号或者名称" class="form-control"/></div>
										            		<div class="col-xs-2"><button class="btn btn-pay" onclick="searchAmount()">库存查询</button></div>
										            	</div>
										            	<div style="clear: both;"></div>
										            	<table class="table table-bordered" style="margin-top: 20px;max-height: 400px;overflow-y: auto;">
										            		<thead>
										            			<tr>
										            				<th>品牌</th>
										            				<th>商品名称</th>
										            				<th>条码</th>
										            				<th>货号</th>
										            				<th>尺码</th>
										            				<th>数量</th>
										            				<th>单价</th>
										            				<th>备注</th>
										            			</tr>
										            		</thead>
										            		<tbody>
										            			<tr>
										            				<td>耐克</td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            			</tr>
										            			<tr>
										            				<td>耐克</td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            			</tr>
										            		</tbody>
										            	</table>
										            	
										            </div>
										            <div class="modal-footer">
										                <button type="button" class="btn btn-primary btn-pay" data-dismiss="modal" onclick="selectStockSure()" aria-hidden="true">确定</button>
										            </div>
										        </div>
										    </div>
										</div>-->
										
										<!--整单退弹出框-->
										<!--<div class="modal fade" id="allreturn" tabindex="-1" role="dialog" aria-labelledby="allreturn" aria-hidden="true">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <div class="modal-header" style="background: #2f4050;color: #fff;">
										                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
										                <h3 class="modal-title text-center">整单退</h3>
										            </div>
										            <div class="modal-body row">
										            	<div class="col-xs-offset-5 col-xs-6">
										            		<div class="col-xs-10"><input type="text" name="allreturn" placeholder="单号" class="form-control"/></div>
										            		<div class="col-xs-2"><button class="btn btn-pay">输入单号</button></div>
										            	</div>
										            	<div style="clear: both"></div>
										            	<table class="table table-bordered" style="margin-top: 20px;">
										            		<thead>
										            			<tr>
										            				<th></th>
										            				<th>序号</th>
										            				<th>单号</th>
										            				<th>商品名称</th>
										            				<th>货号</th>
										            				<th>尺码</th>
										            				<th>数量</th>
										            				<th>单价</th>
										            				<th>备注</th>
										            			</tr>
										            		</thead>
										            		<tbody>
										            			<tr>
										            				<td><div class="checkbox">
																		<label><input type="checkbox" value=""></label>
																	</div></td>
										            				<td>1</td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            			</tr>
										            			<tr>
										            				<td><div class="checkbox">
																		<label><input type="checkbox" value=""></label>
																	</div></td>
										            				<td>2</td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            				<td></td>
										            			</tr>
										            		</tbody>
										            	</table>
										            </div>
										            <div class="modal-footer">
										                <button type="button" class="btn btn-primary btn-pay" data-dismiss="modal" aria-hidden="true">确定</button>
										            </div>
										        </div>
										    </div>
										</div>-->
										
										<div class="bottom">
										<div class="pull-left" id="tol">
											<h2 class="totalPrice"><span class="total-title">合计：</span>合计<span class="num">1</span>件商品，总计<span class="number">￥123.00</span>元
												，优惠<span>￥23.00</span>元，应收：<span>￥100.00</span>元
											<input type="hidden" name="totalPrice" value="0.00">
											<input type="hidden" name="total" value="0.00">	
											</h2>
										</div>
										<div class="pull-left startpay"><button class="btn btn-success radius" style="background: #1bc096;" id="startpay" type="button" onclick="paySure()">确认收银</button></div>
											<ul class="list-inline pull-right btn-paygroup" style="margin-right: 10px;">
													<li><button class="btn btn-default disabled radius">收银台</button></li>
													<li><button class="btn btn-primary radius" style="background: #5caccd;" id="membercc">会员查询</button></li>
													<li><button class="btn btn-primary radius" style="background: #f1a41f;" id="stockcheck">库存查询</button></li>
													<li><button class="btn btn-primary radius" style="background: #66d17a;" id="ordercheck">订单查询</button></li>
													<li><a><button class="btn btn-danger radius" style="background: #ff7676;" >退换商品</button></a></li>
													<!-- <li><button class="btn btn-pay" data-toggle="modal" data-target="#allreturn">整单退</button></li> -->
											</ul>
										</div>
								</div>
							</div>
					</div>
				</div>
		</div>
		<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/js/H-ui.admin.js"></script>
		<script type="text/javascript" src="http://[::1]/yunjuke//plugins/layer/layer.js"></script>
		<script src='http://localhost:8000/CLodopfuncs.js'></script>
		<script language="javascript" src="http://[::1]/yunjuke//plugins/Lodop/LodopFuncs.js"></script>
		<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
		<script>
//会员查询弹出框
$('#membercc').click(function(){
	var content_member='<div class="modal-body">'+
							'<div class="col-xs-offset-5 col-xs-6">'+
								'<div class="col-xs-10"><input type="text" name="membernum" id="membernum" placeholder="手机/用户名/qq/微信昵称" class="input-text radius"/></div>'+
									'<div class="col-xs-2"><button class="btn btn-success radius" onclick="searchUser()">会员查询</button></div>'+
								'</div>'+
								'<div style="clear: both;"></div>'+
								'<table class="table table-bordered" style="margin-top: 20px;max-height: 400px;overflow-y: auto;">'+
									'<thead>'+
										'<tr>'+
										    '<th>姓名</th>'+
										    '<th>手机号码</th>'+
										    '<th>微信号</th>'+
										    '<th>积分</th>'+
										    '<th>购买记录</th>'+
										    '<th>备注</th>'+
										'</tr>'+
									'</thead>'+
									'<tbody>'+	            			
									'</tbody>'+
								'</table>'+
							'</div>';
	
	layer.open({
	  type: 1,
	  title:'会员查询',
	  btn:['确定'],
	  skin: 'layui-layer-rim', //加上边框
	  area: ['800px', '450px'], //宽高
	  content: content_member,
	  yes:function(){
	  	selectUserSure();
	  	layer.closeAll();
	  }
	  
	});
})
	


//库存查询弹出框
	$('#stockcheck').click(function(){
	var content_stock='<div class="modal-body">'+
										            	'<div class="col-xs-offset-5 col-xs-6">'+
										            		'<div class="col-xs-10"><input type="text" name="stock" id="stock" placeholder="请输入条形码、货号或者名称" class="input-text radius"/></div>'+
										            		'<div class="col-xs-2"><button class="btn btn-success radius" onclick="searchAmount()">库存查询</button></div>'+
										            	'</div>'+
										            	'<div style="clear: both;"></div>'+
										            	'<table class="table table-bordered" style="margin-top: 20px;max-height: 400px;overflow-y: auto;">'+
										            		'<thead>'+
										            			'<tr>'+
										            				'<th>品牌</th>'+
										            				'<th>商品名称</th>'+
										            				'<th>条码</th>'+
										            				'<th>货号</th>'+
										            				'<th>尺码</th>'+
										            				'<th>数量</th>'+
										            				'<th>单价</th>'+
										            				'<th>备注</th>'+
										            			'</tr>'+
										            		'</thead>'+
										            		'<tbody>'+
										            		'</tbody>'+
										            	'</table>'+
										            	'</div>';
	
	layer.open({
	  type: 1,
	  title:'库存查询',
	  btn:['确认'],
	  skin: 'layui-layer-rim', //加上边框
	  area: ['800px', '450px'], //宽高
	  content: content_stock,
	  yes:function(){
	  	selectStockSure();
	  	layer.closeAll();
	  }
	});
})
//订单查询弹出框
	$('#ordercheck').click(function(){
	var content_order='<div class="modal-body">'+
										            	'<div class="col-xs-offset-5 col-xs-6">'+
										            		'<div class="col-xs-10"><input type="text" name="allreturn" placeholder="单号" class="input-text radius"/></div>'+
										            		'<div class="col-xs-2"><button class="btn btn-success radius">输入单号</button></div>'+
										            	'</div>'+
										            	'<div style="clear: both"></div>'+
										            	'<table class="table table-bordered" style="margin-top: 20px;">'+
										            		'<thead>'+
										            			'<tr>'+
										            				'<th></th>'+
										            				'<th>序号</th>'+
										            				'<th>单号</th>'+
										            				'<th>商品名称</th>'+
										            				'<th>货号</th>'+
										            				'<th>尺码</th>'+
										            				'<th>数量</th>'+
										            				'<th>单价</th>'+
										            				'<th>备注</th>'+
										            			'</tr>'+
										            		'</thead>'+
										            		'<tbody>'+
										            		'</tbody>'+
										            	'</table>'+
										            '</div>';
	
	layer.open({
	  type: 1,
	  title:'订单查询',
	  btn:['确认'],
	  skin: 'layui-layer-rim', //加上边框
	  area: ['800px', '450px'], //宽高
	  content: content_order
	});
})

//开始收银弹出框
	var content_startpay='<div class="modal-body">'+
										            	'<div class="col-xs-6">'+
										            	'<form id="payInfoForm" onsubmit="return false;">'+
										            	'<table class="table table-bordered table-responsive" style="margin-top: 20px;">'+	
										            			'<tr>'+
										            				'<td class="pay-left" style="width: 90px;">现金支付</td>'+
										            				'<td><input type="text" onchange="paychange(this)" name="paycash" class="form-control input-sm"/></td>'+
										            			'</tr>'+
										            			'<tr>'+
										            				'<td class="pay-left">银行卡</td>'+
										            				'<td><input type="text" onchange="paychange(this)" name="paybank" class="form-control input-sm"/></td>'+
										            			'</tr>'+
										            			'<tr>'+
										            				'<td class="pay-left">微信支付</td>'+
										            				'<td><input type="text" onchange="paychange(this)" name="paywx" class="form-control input-sm"/></td>'+
										            			'</tr>'+
										            			'<tr>'+
										            				'<td class="pay-left">支付宝支付</td>'+
										            				'<td><input type="text" onchange="paychange(this)" name="payzfb" class="form-control input-sm"/></td>'+
										            			'</tr>'+
										            			'<tr>'+
										            				'<td class="pay-left">余额支付</td>'+
										            				'<td><input type="text" onchange="paychange(this)" name="paybalance" class="form-control input-sm"/></td>'+
										            			'</tr>'	+
										            	'</table>'+
										            	'<table class="table table-bordered table-responsive" style="margin-top: 20px;">'+
										            			'<tr>'+
										            				'<td class="pay-left" style="width: 90px;">券支付</td>'+
										            				'<td><input type="text" onchange="paychange(this)" name="paycoupon" class="form-control input-sm"/></td>'+
										            			'</tr>'+
										            			'<tr>'+
										            				'<td class="pay-left">充值卡支付</td>'+
										            				'<td><input type="text" onchange="paychange(this)" name="paycard" class="form-control input-sm"/></td>'+
										            			'</tr>'+
										            	'</table>'+
										            	'<div>'+
										            		'<!-- <button class="btn btn-primary">暂不支付</button> -->'+
										            		'<button class="btn btn-primary bg-green"  type="button" onclick="pay()">结账</button>'+
										            		'<button type="button" class="btn btn-primary bg-green ml-10" data-dismiss="modal" aria-hidden="true">取消</button>'+
										            	'</div>'+
										            	'</form>'+
										            	'</div>'+
										            	'<div class="col-xs-6">'+
										            		'<div class="paymoney text-center">'+
										            			'<p>数量：<span class="payNumber">0</span>件　　交易金额：<span class="payPrice">00.00</span>元</p>'+
										            			'<!-- <p>(附加服务费：<span>0.00</span>元)</p> -->'+
										            			'<p>　应支付<span style="font-size: 25px;margin: 0 30px;" class="pay_have">00.00</span>元</p>'+
										            			'<p>　实际支付<span style="font-size: 25px;margin: 0 30px;" class="payTrue">00.00</span>元</p>'+
										            			'<p>　找零<span style="font-size: 25px;margin: 0 30px;" class="payRefaud"></span>元</p>'+
										            			'<!-- <p>还应支付<span style="font-size: 25px;margin: 0 30px;">0.00</span>元</p> -->'+
										            		'</div>'+
										            		'<div class="memberinfo">'+
										            			'<table class="table">'+
										            				'<tr>'+
										            					'<td>客户姓名:</td>'+
										            					'<td class="payUserName"></td>'+
										            				'</tr>'+
										            				'<tr>'+
										            					'<td>联系电话:</td>'+
										            					'<td class="payUserTel"></td>'+
										            				'</tr>'+
										            				'<tr>'+
										            					'<td>VIP等级:</td>'+
										            					'<td class="payUserGrade"></td>'+
										            				'</tr>'+
										            				'<tr>'+
										            					'<td>余额:</td>'+
										            					'<td class="payUserBalance"></td>'+
										            				'</tr>'+
										            				'<tr>'+
										            					'<td>可用充值卡:</td>'+
										            					'<td class="payUserCard"></td>'+
										            				'</tr>'+
										            				'<tr>'+
										            					'<td>积分:</td>'+
										            					'<td class="payUserIntegral"></td>'+
										            				'</tr>'+
										            			'</table>'+
										            		'</div>'+
										            	'</div>'+
										            '</div>';
	
			
			
			
			
			
//		点击切换开始收银和退换商品
		$(".btn-paygroup .btn-pay:eq(0)").click(function(){
			$("#tab-return").hide();
			$("#tab-pay").show();
			$(".btn-paygroup .btn-pay:eq(4)").removeClass("disabled")
			$(this).addClass("disabled");
			$(".top-title").html("收银台");
		})
		$(".btn-paygroup .btn-pay:eq(4)").click(function(){
			$("#tab-pay").hide();
			$("#tab-return").show();
			$(".btn-paygroup .btn-pay:eq(0)").removeClass("disabled")
			$(this).addClass("disabled");
			$(".top-title").html("退换商品");
		})
		
		$(".changename").click(function(){
			$(".name-right").hide();
			$("#storeG").show();
		})
		
		$("#storeGuide").change(function(){
			$(".name-right").show();
			$(".name").html($(this).val());
			$("#storeG").hide();
		})
		
//		双击编辑
		$(".nowshow").dblclick(function(){
			$(this).next().show();
			$(this).hide();
		})
		$(".changeinput input").change(function(){
			$(this).parent().hide();
			$(".nowshow").show();
			$(this).parent().prev().html($(this).val())
		})

//			初始化select2
		$(document).ready(function() {
					$("#storeGuide").select2();
				});
				
		var pelheight = document.body.clientHeight;
		$("#stockInfoForm").css("height",pelheight-300);
		$(window).resize(function(){
   			var pelheight = document.body.clientHeight;
			$("#stockInfoForm").css("height",pelheight-300);
		});
         
		 /*会员查询*/
		   function searchUser(){ 
			   var searchVal = $('#membernum').val();
			   if(searchVal==''){
				   swal({title:'',text:'请输入查询条件', type:"error",timer:2000});return false;
			   }else{
				   if(searchVal.length<2){
					   swal({title:'',text:'查询范围太宽，请至少输入两个字符', type:"error",timer:2000});return false;
				   }
				   $.ajax({
		        		type: "post",
		                url: "check_user",
		                data: {user_name:searchVal},
		                dataType: "json",
		                success: function(data){
		                	var str = '';
                            if(data.state == '403'){
                                layer.msg(data.msg);
                                window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                            }else if(data.state == '401'){
                                layer.msg(data.msg);
                                return false;
                            }else if(data.state){
		                		userInfo = data.user;
		                		$.each(userInfo,function(k,v){
		                			if(v.order==''){
		                				orderLog = '';
		                			}else{
		                				orderLog = data_null(v.order.order_sn)+'/'+data_null(v.order.date);
		                			}
		                			var dataStr = JSON.stringify(v).replace(/"/g, "'");
		                			str+='<tr onclick="selectUser(this)" data-val="'+dataStr+'"><td>'+data_null(v.user_name)+'</td>'+
			            				'<td>'+data_null(v.tel)+'</td>'+
			            				'<td>'+data_null(v.wx_nickname)+'</td>'+
			            				'<td>'+data_null(v.integral)+'</td>'+
			            				'<td>'+orderLog+'</td>'+
			            				'<td></td></tr>';
			            				
		                		})
		                		/* $('#userInfo').val(data.data.user_name);
		                		$('#user_id').val(data.data.user_id); */
		                		//$('#userErr').html('');
		                	}else{
		                		str = '<tr><td colspan="6">未搜到符合条件的记录！</td></tr>';
		                		//$('#userErr').html(data.msg);
		                		//swal({title:'',text:data.msg, type:"error",timer:2000});return false;
		                	}
		                	$('#selectmember').find('table').children('tbody').html(str);
		                }
					})
			   }
		   }
		  function selectUser(obj){
			  $(obj).siblings('tr').removeClass('current');
			  $(obj).addClass('current');
			  //console.log(dataJson)
		  }
		  function selectUserSure(){
			  var selectTr = $('#selectmember').find('tbody').find('tr.current');
			  var dataStr = selectTr.attr('data-val');
			  dataStr = dataStr.replace(/'/g, '"');
			  dataJson = JSON.parse(dataStr);
			  $('#user_id').val(data_null(dataJson.user_id));
			  $('#userTel').val(data_null(dataJson.tel));
			  $('#userName').val(data_null(dataJson.user_name));
			  $('#userQQ').val(data_null(dataJson.qq));
			  $('#userAddress').val(data_null(dataJson.user_addres));
			  var payContent = $('.pay-content').find('tr');
	      	  if(payContent.length>0){
	      		    user_name = data_null(dataJson.user_name)==''?data_null(dataJson.tel):data_null(dataJson.user_name);
	      			payContent.find('td.userinfo').text(user_name);
	      	  }
			  $('#selectmember').hide();
		  }
		  var LODOP; //声明为全局变量   
		    function install_print(){
		    	url_32 = "http://[::1]/yunjuke/data/print/CLodop_Setup_for_Win32NT_2.090.zip";
				url_64 = "http://[::1]/yunjuke/data/print/CLodop_Setup_for_Win64NT_2.090.zip";
				url_3264 = "http://[::1]/yunjuke/data/print/CLodopPrint_Setup_for_Win32NT.zip";
				layer.open({
		            type: 1,
		            title: '<b>打印控件下载</b>',
		            skin: 'layui-layer-rim', //加上边框
		            area: ['520px', 'auto'], //宽高
		            content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form3" method="POST" enctype=multipart/form-data>' +
		            '<div id="" style="width:100%;text-align:center;font-size:14px;color:#FF00FF;" class="">打印机控件尚未安装启动!点击下载并安装,安装后请刷新页面。</div>'+
		            '<div style="width: 100%;text-align:center;color:#0096ff"><ul><li>点击下载：</li>' +
		            '<li><a href="'+url_32+'">32位版</a></li><li><a href="'+url_64+'">64位版</a></li><li><a href="'+url_3264+'">综合版</a></li></ul></div>'+
		            '</form></div>',

		        })
		    }
		   
		    
		    function CreateFullBill(data) {
		    	LODOP=getLodop(); 
		    	var topLength = 20;
				LODOP.PRINT_INIT("打印收银小票");
				LODOP.SET_PRINT_PAGESIZE(3,480,10);
				LODOP.ADD_PRINT_TEXT(topLength,2,180,30,data.store_name);
				LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
				LODOP.SET_PRINT_STYLEA(0,"FontColor","#800000");
				LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
				LODOP.ADD_PRINT_TEXT(topLength*2,2,180,20,data.time);
				LODOP.SET_PRINT_STYLEA(0,"FontSize",8);
				LODOP.SET_PRINT_STYLEA(0,"FontColor","#800000");
				LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
				LODOP.ADD_PRINT_TEXT(topLength*3,2,180,25,"收银员："+data.spg_name);
				LODOP.ADD_PRINT_TEXT(topLength*4,2,180,25,"单号："+data.order_sn);
				LODOP.ADD_PRINT_TEXT(topLength*5,2,180,25,"商品   数量  单价  金额");
				LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
				LODOP.ADD_PRINT_LINE(topLength*6, 2,topLength*6,180,4);
				LODOP.ADD_PRINT_LINE(topLength*6+2, 2,topLength*6+2,180,4);
				var i=1;j=0;key=6;
				$.each(data.goods_info,function(k,v){
					j = key+i;
					LODOP.ADD_PRINT_TEXT(topLength*j,2,180,25,v.stock_code+"|"+v.gc_name+"|"+v.goods_size+v.color);
					LODOP.ADD_PRINT_TEXT(topLength*(j+1),2,180,25,v.goods_num+"|"+v.goods_pay_price+"|"+v.goods_pay_price_total);
					LODOP.SET_PRINT_STYLEA(0,"Alignment",3);
					i = i+2;
				})  
				key = key+i;
				LODOP.ADD_PRINT_LINE(topLength*key+8, 2,topLength*key+8,180,4);
				LODOP.ADD_PRINT_LINE(topLength*key+10, 2,topLength*key+10,180,4);
				LODOP.ADD_PRINT_TEXT(topLength*(key+1),2,180,25,"应收合计："+data.order_money);
				var str_nocash = '';
				if(data.banlance>0){
					str_nocash +='余额支付:'+data.banlance+';';
				}
				if(data.card>0){
					str_nocash +='抵用充值卡:'+data.card+";";
				}
				if(data.coupon>0){
					str_nocash +='抵用优惠卷:'+data.coupon+';';
				}
				var klen = 0;
				if(str_nocash){
					klen = 1;
				}
				LODOP.ADD_PRINT_TEXT(topLength*(key+2+klen),2,180,25,"实收:"+data.money+'  找零:'+data.charge);
				LODOP.ADD_PRINT_TEXT(topLength*(key+3+klen),2,180,25,"电话:"+data_null(data.tel));
				LODOP.ADD_PRINT_TEXT(topLength*(key+4+klen),2,180,25,"地址:"+data_null(data.address));
				LODOP.ADD_PRINT_TEXT(topLength*(key+5+klen),2,180,20,"****谢谢光临****");
				LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
				LODOP.ADD_PRINT_TEXT(topLength*(key+6+klen),2,180,25,"注:"+data_null(data.note));
				LODOP.SET_PRINT_STYLEA(0,"Alignment",2);
		};
	     
			$('button.btn').click(function(){
				$(this).siblings().removeClass('btn-primary');
				$(this).addClass('btn-primary');
				if($(this).attr('data-para')==1){
					$('div.form-group-pay').hide();
					$('div.form-group-cash').show();
				}else{
					$('div.form-group-pay').show();
					$('div.form-group-cash').hide();
				}
			})
			//指向下一个焦点
			function input_focus(obj){		
				$(obj).parent('div').next('div').find('input[type=text]').focus();
			}
			var key_sort = true;
			   $("table").delegate("input[type=text]","keydown",function(event){ 
				   if (event.keyCode == 13) {
					   tVal = $(this).val();
					   if(tVal!=''){
						   input_focus($(this));
					   }
				   }
				   
			   })
			   $("table").delegate("#barcode","change",function(){ 
				   
				   if(key_sort){
					   check_barcode(this);
					   $(this).val('');
				   }
				}); 
			   $("table").delegate("#barcode","keydown",function(event){ 
				   if (event.keyCode == 13) {
					   key_sort = false;
			        	check_barcode(this);
			        	$(this).val('');
			        }
				}); 
			   $("#userInfoForm").delegate("#size","keydown",function(event){ 
				   if (event.keyCode == 13) {
					   key_sort = false;
					   $('.stockSubmit').click();
			        }
				}); 
			   /*$("table").delegate("#stockcode","change",function(){ 
				   $(this).parent('td').siblings('td').find('input').val('');
	               $(this).parents('tr').find('td.stock_size').html('');
	               $(this).parents('tr').find('td.stock_operation').html('<a href="javascript:;" onclick="goods_yes(this)" class="goods-text btn-yes">确认</a>');
	               check_goods(this);
				}); 
			   $("table").delegate("#stockcode","keydown",function(event){ 
				   if (event.keyCode == 13) {
			        	$(this).parent('td').siblings('td').find('input').val('');
		                $(this).parents('tr').find('td.stock_size').html('');
		                $(this).parents('tr').find('td.stock_operation').html('<a href="javascript:;" onclick="goods_yes(this)" class="goods-text btn-yes">确认</a>');
		                check_goods(this);
		                $("table").delegate(".stock_code input","change",function(){ 
							return false;
						})
			        }
				}); */
			   /*会员查询*/
			   /*$('#searchUser').click(function(){
				   var searchVal = $('#membernum').val();console.log(searchVal);
				   if(searchVal==''){
					   swal({title:'',text:'请输入查询条件', type:"error",timer:2000});return false;
				   }
			   })*/
			   /*输入货号尺码确定*/
			   $('.stockSubmit').click(function(){
			    	 var stock_code = $('#stockcode').val();
			    	 var stock_size = $('#size').val();
			    	 if(stock_code==''||stock_size==''){
			    		 swal({title:'',text:'货号和尺码不能为空', type:"error",timer:2000});return false;
			    	 }else{
			    		 check_goods(stock_code,stock_size);
			    	 }
			    	 return false;
			     })
			   function appendHtml(stocks){
				    stock_k = $('.pay-content').find('tr').size()+1;
		       		user_name = '';
		       		if($('#userName').val()==''){
		       			user_name = $('#userTel').val();
		       		}else{
		       			user_name = $('#userName').val();
		       		}
		       		isHave = false;haveObj = [];
		       		$('tbody.pay-content').find('tr').each(function(){
		       			code = $(this).find('td.code').text();
		       			size = $(this).find('td.size').text();
		       			if(stocks.size==size&&stocks.stocks_sn==code){
		       				isHave = true;haveObj=$(this);
		       			}
		       		})
		       		if(isHave){
		       			oldNum = haveObj.find('td.num').find('input').val();
		       			oldNum = (oldNum=='')?1:oldNum;
		       			newNum = oldNum*1+1;
		       			haveObj.find('td.num').find('input').val(newNum);
		       			truePrice = haveObj.find('td.true_price').find('input').val();
		       			discount = haveObj.find('td.discount').find('input').val();
		       			totalPrice = number_format(truePrice*newNum,2);
		       			haveObj.find('td.num').find('input').val(newNum);
		       			haveObj.find('td.price_total').text(totalPrice);
		       			haveObj.find('td.stockData').find('input.stock_num').val(newNum);
		       			haveObj.find('td.stockData').find('input.stock_price_total').val(totalPrice);
		       			
		       		}else{
		       			tr_str = '<tr>'+
						'<td class="sort stockData"><span class="sort">'+stock_k+'</span>'+
						'<input type="hidden" name="put_goods_name[goods_id][]" class="stock_goods_id" value="'+stocks.goods_id+'"/>'+
						'<input type="hidden" name="put_goods_name[barcode][]" class="stock_barcode" value="'+stocks.stocks_bar_code+'"/>'+
						'<input type="hidden" name="put_goods_name[stock_code][]" class="stock_code" value="'+stocks.stocks_sn+'"/>'+
						'<input type="hidden" name="put_goods_name[stock_size][]" class="stock_size" value="'+stocks.size+'"/>'+
						'<input type="hidden" name="put_goods_name[stock_num][]" class="stock_num" value="1"/>'+
						'<input type="hidden" name="put_goods_name[stock_price][]" class="stock_price" value="'+stocks.stocks_price+'"/>'+
						'<input type="hidden" name="put_goods_name[stock_true_price][]" class="stock_true_price" value="'+stocks.stocks_price+'"/>'+
						'<input type="hidden" name="put_goods_name[stock_discount][]" class="stock_discount" value=""/>'+
						'<input type="hidden" name="put_goods_name[stock_price_total][]" class="stock_price_total" value="'+stocks.stocks_price+'"/>'+
						'</td>'+
						'<td class="brand">'+stocks.brand_name+'</td>'+
						'<td class="barcode">'+stocks.stocks_bar_code+'</td>'+
						'<td class="code">'+stocks.stocks_sn+'</td>'+
						'<td class="size">'+stocks.size+'</td>'+
						'<td class="price">'+stocks.stocks_price+'</td>'+
						'<td class="col-xs-1 num"><input type="text" onchange="change(this)" class="form-control input-sm" value="1" placeholder="1"></td>'+
						'<td class="col-xs-1 true_price"><input type="text" onchange="change(this)" class="form-control input-sm" value="'+stocks.stocks_price+'" placeholder=""></td>'+
						'<td class="col-xs-1 discount"><input type="text" onchange="change(this)" class="form-control input-sm" placeholder=""></td>'+
						'<td class="sort price_total">'+stocks.stocks_price+'</td>'+
						'<td class="sort userinfo">'+user_name+'</td>'+
						'<td class="sort note"></td>'+
						'<td class="sort"><a href="javascript:;" onclick="delStock(this)">删除</a></td>'+
					    '</tr>';
	   			     $('.pay-content').append(tr_str);
	   			     stockSort();
		       		}
		       		/*stocks = data.data;
		       		var size_str = '<select name="put_goods_name[stock_size][]" id="" onchange="select_size(this)" class="form-data form-control">'+
		       		'<option value="'+stocks.size+'" data-stock="'+data_null(stocks.stocks_sn)+'" data-barcode="'+data_null(stocks.stocks_bar_code)+'" data-price="'+stocks.stocks_price+'">'+stocks.size+'</option>';
		       		size_str +='</select>';
		       		$(obj).parents('tr').find('td.stock_size').html(size_str);
		       		$(obj).parents('tr').find('td.stock_code input').val(data_null(stocks.stocks_sn));
		   			$(obj).parents('tr').find('td.stock_price input').val(stocks.stocks_price);
		   			$(obj).parents('tr').find('td.stock_num input').val(1);
		   			$(obj).parents('tr').find('td.stock_price_total input').val(stocks.stocks_price);
		   			$(obj).parents('tr').find('td.stock_price_total').find('.stock_prices').text(stocks.stocks_price);*/
		   			
			    }
				function check_goods(stock_code,stock_size){
						$.ajax({
			        		type: "post",
			                url: "check_goods",
			                data: {stock_code:stock_code,size:stock_size},
			                dataType: "json",
			                success: function(data){
                                if(data.state == '403'){
                                    layer.msg(data.msg);
                                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                }else if(data.state == '401'){
                                    layer.msg(data.msg);
                                    return false;
                                }else if(data.state){
			                		stocks = data.data;
			                		appendHtml(stocks);
			                		total_money();
			                		$('#stockcode').val('');
			                		$('#size').val('');
			                	}else{
			                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
			                	}
			                }
						})
					
					
				}
			    
				function check_barcode(obj){
					barcode = $(obj).val();
					if(barcode){
						$.ajax({
			        		type: "post",
			                url: "check_barcode",
			                data: {barcode:barcode},
			                dataType: "json",
			                success: function(data){
                                if(data.state == '403'){
                                    layer.msg(data.msg);
                                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                }else if(data.state == '401'){
                                    layer.msg(data.msg);
                                    return false;
                                }else if(data.state){
			                		stocks = data.data;
			                		appendHtml(stocks);
			            			total_money();
			            			//info_success(obj);
			                	}else{
			                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
			                	}
			                }
						})
					}
					
				}
			function delStock(obj){
				$(obj).parents('tr').remove();
				total_money();
				stockSort();
			}	
			function change(obj){
				var thisTr = $(obj).parents('tr');
				var num = thisTr.find('td.num').find('input').val();
				var price = thisTr.find('td.price').text();
				var true_price = thisTr.find('td.true_price').find('input').val();
				var discount = thisTr.find('td.discount').find('input').val();
	            if($(obj).parent('td').hasClass('true_price')){
	            	true_price = $(obj).val();
	            	discount = parseFloat(true_price/price).toFixed(2);
	            }
	            if($(obj).parent('td').hasClass('discount')){
	            	discount = $(obj).val();
	            	discount = (discount=='')?1:discount;
	            	true_price = parseFloat(price*discount).toFixed(2);
	            }
				numV = (num=='')?1:num;
				discountV = (discount=='')?1:discount;
				truePrice = parseFloat(discountV*price).toFixed(2);
				truePrice = (true_price=='')?truePrice:true_price;
				totalPrice = parseFloat(truePrice*numV).toFixed(2);
				var thisTd = thisTr.find('td.stockData');
				thisTd.find('input.stock_num').val(numV);
				thisTd.find('input.stock_true_price').val(truePrice);
				thisTd.find('input.stock_discount').val(discountV);
				thisTd.find('input.stock_price_total').val(totalPrice);
				thisTr.find('td.price_total').text(totalPrice);
				thisTr.find('td.true_price input').val(truePrice);
				thisTr.find('td.discount input').val(discountV);
				total_money();
			}
			function stockSort(){
				$('tbody.pay-content').find('tr').each(function(k,v){
					thisTd = $(this).find('td.stockData');
					thisTd.find('span.sort').text(k+1); 
				})
			}
			function total_money(){
				amount = 0;number = 0;total=0;
				$('tbody.pay-content').find('tr').each(function(){
					thisTd = $(this).find('td.stockData');
					barcode = thisTd.find('input.stock_barcode').val();
					stock_code = thisTd.find('input.stock_code').val();
					num = thisTd.find('input.stock_num').val();
					price = thisTd.find('input.stock_price').val();
					true_price = thisTd.find('input.stock_true_price').val();
					discount = thisTd.find('input.stock_discount').val();
					if(!isNaN(num*true_price)&&(barcode||stock_code)){
						amount +=parseFloat(num*true_price);
						number +=parseInt(num);
						total +=parseFloat(num*price);
					}
					
				})
				amount = number_format(amount,2);
				total = number_format(total,2);
				$('h3.totalPrice').find('span.number').text(amount);
				$('h3.totalPrice').find('span.num').text(number);
				$('h3.totalPrice').find('input[name=totalPrice]').val(amount);
				$('h3.totalPrice').find('input[name=total]').val(total);
			}
			/*库存查询*/
			function searchAmount(){
				var searchVal = $('#stock').val();
				   if(searchVal==''){
					   swal({title:'',text:'请输入查询条件', type:"error",timer:2000});return false;
				   }else{
					   if(searchVal.length<2){
						   swal({title:'',text:'查询范围太宽，请至少输入两个字符', type:"error",timer:2000});return false;
					   }
					   $.ajax({
			        		type: "post",
			                url: "check_stock",
			                data: {stock:searchVal},
			                dataType: "json",
			                success: function(data){
			                	var str = '';
                                if(data.state == '403'){
                                    layer.msg(data.msg);
                                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                }else if(data.state == '401'){
                                    layer.msg(data.msg);
                                    return false;
                                }else if(data.state){
			                		stockInfo = data.stock;
			                		$.each(stockInfo,function(k,v){
			                			if(v.price){
			                				v.stocks_price=v.price;
			                			}
			                			if(v.barcode){
			                				v.stocks_bar_code=v.barcode;
			                			}
			                			if(!v.stocks_sn){
			                				v.stocks_sn=v.stocks_sku;
			                			}
			                			var dataStr = JSON.stringify(v).replace(/"/g, "'");
			                			str+='<tr onclick="selectStock(this)" data-val="'+dataStr+'">'+
			                			    '<td>'+data_null(v.brand_name)+'</td>'+
			                			    '<td>'+data_null(v.goods_name)+'</td>'+
				            				'<td>'+data_null(v.stocks_bar_code)+'</td>'+
				            				'<td>'+data_null(v.stocks_sn)+'</td>'+
				            				'<td>'+data_null(v.size)+'</td>'+
				            				'<td>'+data_null(v.amount)+'</td>'+
				            				'<td>'+data_null(v.stocks_price)+'</td>'+
				            				'<td></td></tr>';
				            				
			                		})
			                		/* $('#userInfo').val(data.data.user_name);
			                		$('#user_id').val(data.data.user_id); */
			                		//$('#userErr').html('');
			                	}else{
			                		str = '<tr><td colspan="8">未搜到符合条件的记录！</td></tr>';
			                		//$('#userErr').html(data.msg);
			                		//swal({title:'',text:data.msg, type:"error",timer:2000});return false;
			                	}
			                	$('#selectstock').find('table').children('tbody').html(str);
			                }
						})
				   }
			}
			function selectStock(obj){
				  $(obj).siblings('tr').removeClass('current');
				  $(obj).addClass('current');
				  //console.log(dataJson)
			  }
			  function selectStockSure(){
				  var selectTr = $('#selectstock').find('tbody').find('tr.current');
				  var dataStr = selectTr.attr('data-val');
				  dataStr = dataStr.replace(/'/g, '"');
				  dataJson = JSON.parse(dataStr);
				  dataJson.stocks_bar_code = data_null(dataJson.barcode,dataJson.stocks_bar_code);
				  dataJson.stocks_sn = data_null(dataJson.stocks_sn,dataJson.stocks_sku);
				  dataJson.stocks_price = data_null(dataJson.price,dataJson.stocks_price);
				  dataJson.size = data_null(dataJson.size);
				  appendHtml(dataJson);
				  total_money();
			  }
			
			/*确认收款*/
			function paySure(){
				 var payData = $('tbody.pay-content');
				 if(payData.find('tr').length==0){
					 swal({title:'',text:'请先添加商品', type:"error",timer:2000});return false;
				 }
				 layer.open({
				  type: 1,
				  title:'开始收银',
				  skin: 'layui-layer-rim', //加上边框
				  area: ['800px', '630px'], //宽高
				  content: content_startpay
				});
				 $('#confirmpay').on('shown.bs.modal', function () {
					  // 执行一些动作...
					  var totalPrice = $('h3.totalPrice').find('span.number').text();
					  var total = $('h3.totalPrice').find('input[name=total]').val();
					  var totalNumber = $('h3.totalPrice').find('span.num').text();
					  var zr = number_format((total-totalPrice),2);
					  var userId = $('#user_id').val();
					  $('span.payNumber').text(totalNumber);
					  $('span.payPrice').text(totalPrice);
					  $('span.pay_have').text(totalPrice);
					  //console.log(totalPrice)
					  $('td.payzr').text(zr);
					  if(userId){
						  $.ajax({
				        		type: "post",
				                url: "getUser",
				                data: {userId:userId},
				                dataType: "json",
				                success: function(data){
                                    if(data.state == '403'){
                                        layer.msg(data.msg);
                                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                    }else if(data.state == '401'){
                                        layer.msg(data.msg);
                                        return false;
                                    }else if(data.state){
				                	  var userTel = data.user.tel;
				      				  var userBalance = data.user.balance;
				      				  var userGrade = data.user.mld_name;
				      				  var userName = data.user.user_name;
				      				  var userIntegral = data.user.integral;
				      				  var userCard = data.user.rechargeable_card_num;
				      				  //console.log(userName);
				      				$('td.payUserName').text(userName);
				  				    $('td.payUserTel').text(userTel);
				  				    $('td.payUserGrade').text(userGrade);
				  				    payPrice = $('span.payPrice').text();
				  				    payPrice = parseFloat(payPrice);userCard = parseFloat(number_null(userCard));
				  				    userBalance = parseFloat(number_null(userBalance));
				  				    if(userCard>0){
				  				    	if(payPrice<=userCard){
				  				    		$('input[name=paycard]').val(payPrice);
				  				    	}else{
				  				    		$('input[name=paycard]').val(userCard);
				  				    		if(userBalance>0){
				  				    			if(userBalance+userCard>=payPrice){
				  				    				userBalance = number_format(payPrice-userCard,2)
				  				    			}
				  				    			$('input[name=paybalance]').val(userBalance);
				  				    		}
				  				    	}
				  				    }else{
				  				    	if(userBalance>0){
			  				    			if(userBalance>=payPrice){
			  				    				userBalance = number_format(payPrice,2)
			  				    			}
			  				    			$('input[name=paybalance]').val(userBalance);
			  				    		}
				  				    }
				  				    $('td.payUserBalance').text(userBalance);
				  				    $('td.payUserCard').text(userCard);
				  				    $('td.payUserIntegral').text(userIntegral);
				  				   paychange();
				                 	}
				                }
							})
					  }
					  paychange();
					  
				})
				return false;
			 } 
			function paychange(obj){
				if(obj){
					var type=$(obj).attr('name');objVal = $(obj).val();objVal=parseFloat(objVal);
				}
				var user_id = $('#user_id').val();
				var payHave = $('span.payPrice').text();payHave = parseFloat(payHave);
				//var ml = $('input[name=payml]').val();ml = (ml=='')?0:parseFloat(ml);
				var balance = $('input[name=paybalance]').val();balance = (balance=='')?0:parseFloat(balance);
				var coupon = $('input[name=paycoupon]').val();coupon = (coupon=='')?0:parseFloat(coupon);
				var card = $('input[name=paycard]').val();card = (card=='')?0:parseFloat(card);
				var cash = $('input[name=paycash]').val();cash = (cash=='')?0:parseFloat(cash);
				var bank = $('input[name=paybank]').val();bank = (bank=='')?0:parseFloat(bank);
				var wx = $('input[name=paywx]').val();wx = (wx=='')?0:parseFloat(wx);
				var zfb = $('input[name=payzfb]').val();zfb = (zfb=='')?0:parseFloat(zfb);
				pay_have = number_format((payHave-coupon),2);
				if(!user_id){
					if(balance>0){
						$('input[name=paybalance]').val('');
						swal({title:'',text:'用户还不是会员不存在余额', type:"error",timer:2000});return false;
					}
					if(card>0){
						$('input[name=paycard]').val('');
						swal({title:'',text:'用户还不是会员不存在充值卡余额', type:"error",timer:2000});return false;
					}
				}
				if($(obj).attr('name')=='paybalance'){
					maxB_ = $('.payUserBalance').text();maxB = parseFloat(number_null(maxB_));
					if(balance>maxB){
						$('input[name=paybalance]').val(maxB_);
						swal({title:'',text:'用户余额不足', type:"error",timer:2000});
						balance = maxB;
					}
				}
				if($(obj).attr('name')=='paycard'){
					maxC_ = $('.payUserCard').text();maxC = parseFloat(number_null(maxC_));
					if(card>maxC){
						$('input[name=paycard]').val(maxC_);
						swal({title:'',text:'用户充值卡余额不足', type:"error",timer:2000});
						card = maxC;
					}
				}
				if(coupon>=payHave||(coupon+card)>=payHave){
					pay_have = '0.00';
					payNow = '0.00';
					if(card>0&&coupon>=payHave){
						$('input[name=paycard]').val('');
					}else{
						pay_have = number_format(card,2);
					}
					payRefaud = balance+cash+bank+wx+zfb;
					payRefaud = number_format(payRefaud,2);
				}else{
					pay_have = number_format((payHave-coupon),2);
					payNow = cash+bank+wx+zfb+balance+coupon+card;
					payTrue = cash+bank+wx+zfb+balance+card;
					payRefaud = payNow-payHave;
					payNow = number_format(payTrue,2);
					payRefaud = number_format(payRefaud,2);
					
				}
				$('span.payTrue').text(payNow);
				$('span.payRefaud').text(payRefaud);
				$('span.pay_have').text(pay_have);
				
				//console.log(type)
			}
			

			function payOrder(){
				user = $('#userInfoForm').serialize();
				stock = $('#stockInfoForm').serialize();
				pay = $('#payInfoForm').serialize();
				$.ajax({
	        		type: "post",
	                url: "pay?guide="+$('#storeGuide').val(),
	                data: user+'&'+stock+'&'+pay,
	                dataType: "json",
	                success: function(data){

                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else if(data.state){
	                		
	                		swal({title:'',text:data.msg, type:"success",timer:2000});
	                		$('#confirmpay').modal('hide');
	                		CreateFullBill(data.data);
	            	    	LODOP.PRINT();
	                		 setTimeout(function(){
	                			 window.location.reload();
	                		    },2000);
	                	}else{
	                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
	                	}
	                }
				})
				//return false;
			}
			function pay(){
				amount = 0;isPay = false;isSure = true;
				payRefaud = $('span.payRefaud').text();
				if(payRefaud==''){
					isSure = false;
				}else{
					if(parseFloat(payRefaud)<0){
						isSure = false;
					}
				}
				if(isSure){
					 payOrder();
				}else{
					swal({   title: "Are you sure?",   
						     text: "实际支付金额不够，确认结账？",   
						     type: "warning",   
						     showCancelButton: true,   
						     confirmButtonColor: "#DD6B55",   
						     cancelButtonText: "取消",   
						     confirmButtonText: "确认结账",   
						     closeOnConfirm: false 
						  }, 
					      function(){   
							  payOrder();  
							  //swal("Deleted!", "Your imaginary file has been deleted.", "success");
					});
				}
				/*return false;
				$('tbody.pay-content').find('tr').each(function(){
					num = $(this).find('td.stock_num input').val();
					price = $(this).find('td.stock_price input').val();
					if(!isNaN(num*price)){
						isPay = true;
						amount +=parseFloat(num*price);
					}
					
				})
				//console.log(amount);
				//amount = $('#goods_price').val();
				amount = number_format(amount,2);
				if(amount>=0.1){
					
					$.ajax({
		        		type: "post",
		                url: 'pay?type='+$('button.btn-primary').attr('data-para'),
		                data: $('#micropay').serialize(),
		                dataType: "json",
		                success: function(data){
		                	if(data.state){
		                		swal({title:'',text:data.msg, type:"success",timer:2000});
		                		CreateFullBill(data.data);
		            	    	LODOP.PRINT();
		                		 setTimeout(function(){
		                			 window.location.reload();
		                		    },2000);
		                	}else{
		                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
		                	}
		                }
					})
				}else{
					if($('table').find('tr.odd').size()>=2){
						swal({title:'',text:'支付金额至少为0.1元', type:"error",timer:2000});return false;
					}else{
						swal({title:'',text:'没有货品信息', type:"error",timer:2000});return false;
					}
					
				}*/
			}
		 $(document).ready(function() {
		    	if(typeof(LODOP)=='object'&&typeof(LODOP.PRINT_INITA)=='function'){
		    		input_focus();
		    	}else{
		    		install_print();
		    	}
		    	//检查手机号是否正确
		    	var isTel = true;
		    	function checkTel(value){
		          var length = value.length; 
          		  var mobile = /^(((13[0-9]{1})|(15[0-9]{1}|(18[0-9]{1})|(17[0-9]{1})))+\d{8})$/; 
          		   if(length == 11 && mobile.test(value)){
          			 isTel = true;
          		   }else{
          			 isTel = false;  
          		   }
		    	}
		    	 $('#userTel').blur(function(){
		    		var user_tel = $(this).val();
		    		if(user_tel!=''){
		    			checkTel(user_tel);
		    			if(!isTel){
		    				swal({title:'',text:'手机格式不正确', type:"error",timer:2000});return false;
		    			}
		    			$.ajax({
			        		type: "post",
			                url: "check_user_tel",
			                data: {user_tel:user_tel},
			                dataType: "json",
			                success: function(data){
                                if(data.state == '403'){
                                    layer.msg(data.msg);
                                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                }else if(data.state == '401'){
                                    layer.msg(data.msg);
                                    return false;
                                }else if(data.state){
			                		$('#user_id').val(data.user.user_id);
			                		$('#userName').val(data_null(data.user.user_name));
		                			$('#userQQ').val(data_null(data.user.qq));
		                			$('#userAddress').val(data_null(data.user.user_addres));
			                		var payContent = $('.pay-content').find('tr');
			                		if(payContent.length>0){
			                			payContent.find('td.userinfo').text(data_null(data.user.user_name));
			                		}
			                		//$('#userErr').html('');
			                	}else{
			                		//$('#userErr').html(data.msg);
			                		//swal({title:'',text:data.msg, type:"error",timer:2000});return false;
			                	}
			                }
						})
		    		}
		    	}) 
		    })
		   
	    
		</script>
		
	</body>

</html><?php }
}
