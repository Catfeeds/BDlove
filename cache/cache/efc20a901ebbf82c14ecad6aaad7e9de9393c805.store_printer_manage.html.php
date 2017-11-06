<?php
/* Smarty version 3.1.29, created on 2017-06-06 10:46:10
  from "D:\www\yunjuke\application\pay\views\store_printer_manage.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_593617728a8ab9_54689716',
  'file_dependency' => 
  array (
    'efc20a901ebbf82c14ecad6aaad7e9de9393c805' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\store_printer_manage.html',
      1 => 1495588444,
      2 => 'file',
    ),
    '6282d7701d9f48f80f702a7e7b90bb633e309386' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\lib\\link.html',
      1 => 1496651023,
      2 => 'file',
    ),
    '2b27cc2780b53cc0ef27bf7ceef87aa23fc49cd2' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\lib\\header.html',
      1 => 1496716546,
      2 => 'file',
    ),
    '940fa3e7a5fc658c974a607afc3fab9d110f7f64' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\lib\\footer.html',
      1 => 1492225870,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_593617728a8ab9_54689716 ($_smarty_tpl) {
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
		<link href="http://[::1]/yunjuke/application/pay/views/css/font-awesome.css" type="text/css" rel="stylesheet">
		<link href="http://[::1]/yunjuke/application/pay/views/css/sweetalert.css" type="text/css" rel="stylesheet">
		<link href="http://[::1]/yunjuke/application/pay/views/css/animate_new.css" type="text/css" rel="stylesheet">
		<link href="http://[::1]/yunjuke/application/pay/views/css/style.css" type="text/css" rel="stylesheet">
		<link href="http://[::1]/yunjuke/application/pay/views/css/app.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/pay/views/css/select2.css" />
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
		<style>
          
        </style>
	</head>

	<body>
		<div id="wrapper">
			<style>
	.nav.metismenu li.header_top {
		height: 78px;
		padding: 0;
		background: #293846;
		padding-top: 15px;
		border-bottom: 1px solid #293846 !important;
		border-right: 1px solid #293846 !important;
	}
</style>
<style type="text/css">
	.eBoxWarpdiv {
		font-family: "microsoft yahei";
		overflow-y: hidden;
		z-index: 9999;
		position: fixed;
		top: 0%;
		width: 100%;
		height: 100vh;
		background: rgba(0, 0, 0, 0.3);
	}
	
	.eBoxWarp {
		position: absolute;
		width: 800px;
		height: 589px;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
		margin: auto;
	}
	
	.eBoxWarp .aImg {
		border: none;
		display: inline-block;
		z-index: 45;
		width: 50px;
		cursor: pointer;
		height: 50px;
		position: absolute;
		left: 0;
		right: 0;
		margin: auto;
	}
	
	.eBoxWarp .aImg:hover {
		cursor: pointer;
	}
	
	.eBoxWarp .eClose {
		width: 50px;
		height: auto;
		border: none;
	}
	
	.eBoxWarp .eBg {
		width: 100%;
		height: auto;
	}
	
	.eBox {
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		box-sizing: border-box;
		padding-top: 100px;
	}
	
	.eBox h2 {
		text-align: center;
		font-size: 28px;
		color: #7a2d02;
	}
	
	.eBox_conent {
		width: 80%;
		margin: auto;
	}
	
	.eBox_conent h3 {
		font-size: 22px;
		color: #7d6464;
		margin-top: 20px;
	}
	
	.eBox_conent p {
		text-indent: 30px;
		font-size: 17px;
		color: #7d6464;
		line-height: 28px;
		word-break: break-all;
	}
	
	.eBox_conent .disBtn {
		text-align: center;
		position: absolute;
		bottom: 100px;
		left: 0;
		right: 0;
		margin: auto;
	}
	
	.eBox_conent .disBtn button {
		box-sizing: border-box;
		padding: 10px 18px;
		color: #7d6464;
		outline: none;
		font-size: 15px;
		font-family: "microsoft yahei";
		border: 1px solid #dbd5d1;
		background: #ebeaea;
		border-radius: 4px;
	}
	
	.eBox .eTime {
		position: absolute;
		bottom: 55px;
		right: 55px;
	}
	
	.eBox .eTime p {
		line-height: 12px;
		text-align: right;
		margin: 0;
		font-size: 15px;
		color: #7d6464;
	}
	
	.eBox .preNext {
		position: absolute;
		bottom: 64px;
		right: 66px;
		font-size: 15px;
		color: #7d6464;
		text-align: right;
	}
	
	.eBox .preNext a {
		text-decoration: none;
		color: #7d6464;
	}
	
	.eBox .preNext a:hover {
		color: #4c718a;
	}
	
	.eBox .footerLogo {
		position: absolute;
		left: 0;
		right: 0;
		margin: 0 auto;
		bottom: 24px;
	}
	
	.alert_new_time {
		text-align: right;
		margin-top: 48px;
	}
	
	.alert_new_time p {
		line-height: 10px;
		font-size: 14px
	}
</style>
<nav role="navigation" class="navbar-default navbar-static-side">
	<div class="sidebar-collapse">
		<ul id="side-menu" class="nav metismenu">
			<li class="nav-header header_top ">
				<div class="dropdown profile-element logo_img">
					<span> &nbsp;&nbsp;&nbsp;
						<a href="./merchants.php?m=User&c=index&a=index">
															<img src="http://[::1]/yunjuke/application/pay/views/images/logo-pigcms.png" width="149" height="46" class="">
													</a>
					</span>
				</div>
				<div class="logo-element" style="text-align: center;padding: 0;">
					<img src="http://[::1]/yunjuke/application/pay/views/images/profile_small.png" width="69" height="48" class="">
				</div>
			</li>
			<li class="active">
				<a class="menu-link" href="http://[::1]/yunjuke/pay.php/index/index">
					<i class="fa fa-home"></i>
					<span class="nav-label">首页</span>
				</a>
			</li>

			<li>
				<a class="menu-link" href="#">
					<i class="fa  fa-money"></i>
					<span class="nav-label">收银台</span>
				</a>
				<ul class="nav nav-second-level collapse ">
					<li>
						<a class="menu-link menu-level-link" href="http://[::1]/yunjuke/pay.php/alimppay/scan_pay">
							<span class="nav-label">扫码收银</span>
						</a>
					</li>
					<li>
						<a class="menu-link menu-level-link" href="http://[::1]/yunjuke/pay.php/alimppay/scan_refund">
							<span class="nav-label">扫码退款</span>
						</a>
					</li>
					<li>
						<a class="menu-link menu-level-link" href="merchants.php?m=User&c=cashier&a=index">
							<span class="nav-label">二维码收款</span>
						</a>
					</li>
					<li>
						<a class="menu-link menu-level-link" href="merchants.php?m=User&c=cashier&a=ewmRecord">
							<span class="nav-label">二维码记录</span>
						</a>
					</li>

				</ul>
			</li>

			<li>
				<a class="menu-link" href="#">
					<i class="fa fa-line-chart"></i>
					<span class="nav-label">数据统计</span>
				</a>
				<ul class="nav nav-second-level collapse ">
					<li>
						<a class="menu-link menu-level-link" href="http://[::1]/yunjuke/pay.php/statistics/index">
							<span class="nav-label">门店收支</span>
						</a>
					</li>
					<li>
						<a class="menu-link menu-level-link" href="http://[::1]/yunjuke/pay.php/statistics/order_statistics_lists">
							<span class="nav-label">交易汇总</span>
						</a>
					</li>
					<li>
						<a class="menu-link menu-level-link" href="http://[::1]/yunjuke/pay.php/statistics/order_all_pie">
							<span class="nav-label">交易订单</span>
						</a>
					</li>

				</ul>
			</li>

			<li class="active">
				<a class="menu-link" href="#">
					<i class="fa fa-wrench"></i>
					<span class="nav-label">门店配置</span>
				</a>
				<ul class="nav nav-second-level collapse in">

					<li>
						<a class="menu-link menu-level-link" href="http://[::1]/yunjuke/pay.php/store/printer_manage">
							<span class="nav-label">连接打印机</span>
						</a>
					</li>
					<li>
						<a class="menu-link menu-level-link" href="http://[::1]/yunjuke/pay.php/store/pwd_update">
							<span class="nav-label">修改密码</span>
						</a>
					</li>
				</ul>
			</li>

			<li>
				<a class="menu-link" href="#">
					<i class="fa fa-wrench"></i>
					<span class="nav-label">库存管理</span>
				</a>
				<ul class="nav nav-second-level collapse in">

					<li>
						<a class="menu-link menu-level-link" href="http://[::1]/yunjuke/pay.php/stock/stock_manage">
							<span class="nav-label">库存查询</span>
						</a>
					</li>
					<li>
						<a class="menu-link menu-level-link" href="http://[::1]/yunjuke/pay.php/stock/stock_region">
							<span class="nav-label">盘点区域设置</span>
						</a>
					</li>
					<li>
						<a class="menu-link menu-level-link" href="http://[::1]/yunjuke/pay.php/stock/stock_check">
							<span class="nav-label">盘点数据</span>
						</a>
					</li>
				</ul>
			</li>
			
			<li>
				<a class="navbar-pigcms-minimalize" href="javascript:void(0);">
					<i class="fa navbar-resize-icon"></i>
					<span class="nav-label">收起侧边栏</span>
					<span class="label label-info pull-right"></span>
				</a>
			</li>
		</ul>
	</div>
</nav>
<style type="text/css">
	#toast-container>div.toast {
		margin-bottom: 6px;
	}
</style>
<script type="text/javascript">
	if(window.localStorage) {
		var storage = window.localStorage;
		$('.sidebar-collapse ul.metismenu a').click(function() {
			storage['a'] = [];
			storage['coupon_id'] = [];
			storage['show_msg'] = [];
		})
	}
	$(function() {
		//消息通知
		next = 0;
		hasread = [];
		var ajax_time = 10000;
		var ajax_get_news = function() {
			$.ajax({
				type: "GET",
				url: "?m=User&c=index&a=ajax_get_news",
				data: {},
				dataType: "json",
				success: function(data) {
					if(data.count > 0) {
						$("#newscount").html(data.count);
						$("#newsdiv").show();
					}
					if(data.alert_count > 0) {
						toclosealert();
						$('body').prepend(data.alert_html);
					}
				},
				complete: function() {
					setTimeout(ajax_get_news, ajax_time);
					ajax_time += 10000;
				}
			});
		};
		//ajax_get_news();

	});

	function toclosealert() {
		$('.eBoxWarpdiv').remove();
	}

	function closealert() {
		$.post("?m=User&c=index&a=ajax_read", {
			id: $('#hidden_alert_id').val(),
			type: 'all'
		}, function(data) {
			if(next == 0) {
				$("#newscount").html($("#newscount").html() - 1);
			}
			$('.eBoxWarpdiv').remove();
		})

	}

	function gotoalert(thisid, gotoid) {
		$.post("?m=User&c=index&a=ajax_read", {
			id: gotoid + ',' + thisid,
			type: 'all'
		}, function(data) {
			next = 1;
			if(gotoid < thisid && hasread[thisid] != 1) {
				$("#newscount").html($("#newscount").html() - 1);
			}
			hasread[thisid] = 1;
			$('#hidden_alert_id').val(gotoid);
			$('#thisid_' + thisid).hide();
			$('#thisid_' + gotoid).show();
		})

	}

	function read_this_alert(did) {
		var url = $('#alert_url_data_' + did).attr('read_url');
		var id = $('#alert_url_data_' + did).attr('read_id');
		if(url != 0 && url != '' && typeof url != 'undefined') {
			gotoUrl(url);
			$.post("?m=User&c=index&a=ajax_read", {
				id: id
			}, function(data) {

				//				window.open(url);
			});
		} else {
			//修改查看详情由页面展示变为弹框展示,3-22改回页面
			location.href = "?m=User&c=index&a=read_news&id=" + id;
		}
	}

	function gotoUrl(url) {
		var el = document.createElement("a");
		document.body.appendChild(el);
		el.href = url; //url 是你得到的连接
		el.target = '_new'; //指定在新窗口打开
		el.click();
		document.body.removeChild(el);
	}

	function getUserNavBarStyle() {
		if(localStorage.minNabBar == 1) {
			$("body").addClass("mini-navbar");
		}
	}

	function changeNavResizeIcon() {
		if($("body").hasClass("mini-navbar")) {
			localStorage.minNabBar = 1;

			$(".navbar-resize-icon").removeClass("fa-angle-double-left");
			$(".navbar-resize-icon").addClass("fa-angle-double-right");
		} else {
			localStorage.minNabBar = 0;

			$(".navbar-resize-icon").addClass("fa-angle-double-left");
			$(".navbar-resize-icon").removeClass("fa-angle-double-right");
		}
	}
	$('.navbar-pigcms-minimalize').click(function() {
		$("body").toggleClass("mini-navbar");
		changeNavResizeIcon();
		SmoothlyMenu();
	});

	getUserNavBarStyle();
	changeNavResizeIcon();
</script>
<script type='text/javascript'></script>
<div id="page-wrapper" class="gray-bg dashbard-1">
	<style>
		.navbar-right {
			margin-right: 0;
		}
		
		.navbar-top-links .dropdown-messages {
			width: 250px;
			height: 230px;
		}
		
		#myLoginUrlDiv .modal-body {
			text-align: center;
		}
		
		.navbar {
			margin-bottom: 0;
		}
		
		.dropdown-messages-box .media-body {
			text-align: center;
			color: #f8ac59;
			font-size: 15px;
		}
		
		.navbar-header .bgcolor {
			background-color: #1cb295;
			border-color: #1cb295;
		}
		
		ul.dropdown-menu li {
			width: 100%;
		}
		
		.dropdown-menu>li>a,
		.dropdown-menu>li>a:hover {
			background: none;
		}
		
		@media (min-width: 1470px) {
			.category_list .navbar-lager {
				display: block;
			}
			.category_list .navbar-default {
				display: none;
			}
		}
		
		@media (max-width: 1470px) {
			.category_list .navbar-lager {
				display: none;
			}
			.category_list .navbar-default {
				display: block;
			}
		}
		
		@media (max-width: 768px) {
			.category_list {
				display: none;
			}
		}
		
		#page-wrapper {
			min-height: 500px !important;
		}
		
		.menu-level-link span {
			display: inline-block !important;
		}
		
		.menu-link span:last-child {
			margin-right: 5px;
		}
	</style>

	<div class="row border-bottom">
		<nav class="navbar navbar-static-top" role="navigation">
			<ul class="nav navbar-top-links navbar-right">
				<li>
					<a class=" count-info" href="?m=User&c=index&a=news_list">
						<i onmouseover="change_color($(this),'in')" onmouseout="change_color($(this),'out')" class="fa fa-envelope">&nbsp;&nbsp;消息</i>
						<div id="newsdiv" style="display: none">
							<span class="label label-warning" id="newscount">16</span>
						</div>
					</a>
				</li>

				<li class="" id="help-link">
					<a class="dropdown-toggle count-info" href="javascript:;" style="background-color: #293846;">
						<i class="fa fa-user"></i> <strong class="font-bold">liyueting</strong>
					</a>
				</li>
				<li class="" id="help-link">
					<a class="dropdown-toggle count-info" href="javascript:;" style="background-color: #293846;">
						<i class="fa fa-user"></i> <strong class="font-bold">帮助中心</strong>
					</a>
				</li>

				<li class="dropdown" id="siteEwmLi">
					<a class="dropdown-toggle count-info" href="javascript:;" title="用户登录二维码" style="background-color: #293846;">
						<i class="fa fa-qrcode"></i>
					</a>
				</li>

				<li>
					<a onmouseover="change_color($(this),'in')" onmouseout="change_color($(this),'out')" href="http://[::1]/yunjuke/pay.php/index/login_out">
						<i class="fa fa-sign-out"></i> 退出
					</a>
				</li>
			</ul>
		</nav>
	</div>

	<div class="modal inmodal" tabindex="-1" role="dialog" id="myLoginUrlDiv">
		<div class="modal-dialog" style="width: 500px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close _close"><span style="font-size: 35px;">×</span><span
							class="sr-only">Close</span></button>
				</div>
				<div class="modal-body">
				</div>
				<div class="downewm" style="text-align: center;line-height: 25px;">
					<span>用户名：internetdc</span>
					<br/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white _close">关闭</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			//toastr选项初始化
			/* toastr.options = {
				"closeButton": true,
				"debug": false,
				"progressBar": true,
				"positionClass": "toast-top-center",
				"onclick": null,
				"showDuration": "400",
				"hideDuration": "1000",
				"timeOut": "7000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}; */
			ltyp = 0;
			gowd = 0;
			gowd = 1;

			$('.yxUrl a').click(function(event) {
				if(ltyp == 1) {
					event.preventDefault();
					swal("温馨提示", '员工暂时不能跳转', "error");
				}
			});

			//goWeidian
			$('.goWeidian a').click(function(event) {
				if(gowd == 1) {
					event.preventDefault();
					swal("温馨提示", '请先创建会员卡', "error");
				}
			});
		});
		$('#siteEwmLi a').click(function() {
			$('#myLoginUrlDiv .modal-body').qrcode({
				//render: "table", //table方式
				width: 250, //宽度
				height: 250, //高度
				text: 'cashier/merchants.php?m=Index&c=login&a=index&ltyp=' + ltyp //任意内容
			});
			$('#myLoginUrlDiv').show();
		});

		$("#myLoginUrlDiv ._close").click(function() {
			$('#myLoginUrlDiv').hide();
			$('#myLoginUrlDiv .modal-body').html('');
		});

		$(".dropdown-toggle").hover(function(event) {
			$(this).dropdown()
		});

		function change_color(obj, type) {
			//			alert(obj.attr('id'));
			var color = type == 'in' ? '#44b549' : '#999c9e';
			obj.css('color', color);
		}
	</script>
				<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>打印配置</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>智慧店铺</a>
                        </li>
                        <li>
                            <a>配置设置</a>
                        </li>
                        <li class="active">
                            <strong>打印配置</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content">
            <div class="row">
            	<div class="col-lg-10">
            	    <div class="ibox float-e-margins">
            	        <div class="ibox-title clearfix">
            	            <h5 style="margin: 10px 0 0px;">打印配置</h5>
            	        </div>
            	        <div class="ibox-content">
						<div class="alert alert-warning">
							温馨提示：
							1、如果开启了打印机，并且配置好打印机相关配置，系统将在客户成功付款后打印出小票<br>
							<strong style="color:red;">2、特别提醒：您必须要有台小票打印机</strong>
						 </div>
						 <button class="btn  btn-primary" style="margin-bottom: 15px;" onClick="SelectAsDefaultPrinter()" data-toggle="modal" data-target="#addPrintSet"><i class="fa fa-plus"></i> 添加打印机</button>
						 <!-- <button class="btn  btn-primary" style="margin-bottom: 15px;" onClick="Print()" data-toggle="modal" data-target="#addPrintSet"><i class="fa fa-plus"></i> 打印测试</button> -->
						<table class="ui-table ui-table-list table table-striped default no-paging footable-loaded footable" data-page-size="100" style="padding: 0px;">
						<thead class="js-list-header-region tableFloatingHeaderOriginal">
							<tr class="widget-list-header">
							<th class="footable-visible footable-first-column footable-sortable">开关<span class="footable-sort-indicator"></span></th>
							<th class="footable-visible footable-sortable">描述<span class="footable-sort-indicator"></span></th>
							<th data-hide="phone" class="footable-visible footable-sortable">门店<span class="footable-sort-indicator"></span></th>
							<th data-hide="phone" class="footable-visible footable-sortable">绑定手机号<span class="footable-sort-indicator"></span></th>
							<th data-hide="phone" class="footable-visible footable-sortable">终端号<span class="footable-sort-indicator"></span></th>
							<th class="footable-visible footable-last-column footable-sortable">操作<span class="footable-sort-indicator"></span></th>
							</tr>
							</thead>
							<tbody class="js-list-body-region" id="table-list-body">
							 								<tr class="footable-even" style="display: table-row;"><td colspan="7" class="footable-visible footable-last-column footable-first-column"><span class="footable-toggle"></span>您还没有添加打印机，请添加一台</td></tr>
																</tbody>
            	            </table>
            	        </div>
            	    </div>
            	</div>
            </div>
        </div>
        </div>
            <div class="appfooter ">
        <ul class="clearfix ">
            <li>
                <a href="?m=User&c=index&a=index "><i class="fa fa-home "></i>首页</a>
            </li>
            <li>
                <a href="?m=User&c=cashier&a=payment&type=1 " id="shou-kuan "><i class="fa fa-inbox "></i>收款</a>
            </li>
            <li>
                <a href="?m=User&c=cashier&a=payment&type=2 " id="tui-kuan "><i class="fa fa-undo "></i>退款</a>
            </li>
            <li>
                <a href="?m=User&c=wxCoupon&a=consumeCard "><i class="fa fa-file-text-o "></i>设置</a>
            </li>
        </ul>
    </div>
<script type="text/javascript ">
if(mobilecheck()){
$("#side-menu li ").click(function () {
   $("#side-menu li ").find('.nav-second-level').css('display','none');
   $(this).find('.nav-second-level').css('display','block').css('min-width','140px');
 });
}
	var user_Agent = navigator.userAgent.toLowerCase();
	if(user_Agent.indexOf("alipayclient ")!=-1 || user_Agent.indexOf("AlipayClient ")!=-1){
	    $('#shou-kuan').attr('href','?m=User&c=alicashier&a=alipayment&type=1');
		$('#tui-kuan').attr('href','?m=User&c=alicashier&a=alipayment&type=2');
		$('#wxpayment1').hide();
		$('#wxpayment2').hide();
	}

	if(user_Agent.indexOf("micromessenger ")!=-1 || user_Agent.indexOf("MicroMessenger ")!=-1){
	   	$('#alipayment1').hide();
		$('#alipayment2').hide();
	}
</script>

       <script language="javascript" src="http://[::1]/yunjuke//plugins/Lodop/LodopFuncs.js"></script>
		<script type="text/javascript">
		var LODOP; //声明为全局变量   
        function SelectAsDefaultPrinter() {
		    LODOP=getLodop();  
			if (LODOP.CVERSION) {
				LODOP.On_Return=function(TaskID,Value){if(Value>=0) swal({title:'',text:'选择成功', type:"success",timer:2000}); else swal({title:'',text:'选择失败', type:"error",timer:2000});};
				LODOP.SELECT_PRINTER();
				return;
			 };
        	if (LODOP.SELECT_PRINTER()>=0) 
        		swal({title:'',text:'选择成功', type:"success",timer:2000}); else swal({title:'',text:'选择失败', type:"error",timer:2000});
	     };
	     function Print() {
	 		CreatePrintPage();
	 		LODOP.PRINT();	
	 	};
	     function CreatePrintPage() {	
	 		LODOP=getLodop();  	
	 		LODOP.PRINT_INIT("打印控件功能演示_Lodop功能_测试页一");
	 		LODOP.SET_PRINT_PAGESIZE(3,480,10);
	 		LODOP.ADD_PRINT_TEXT(91,10,70,21,"测试页标题");
	 		LODOP.ADD_PRINT_TEXT(201,10,120,20,"测试页内容");
	 		LODOP.ADD_PRINT_TEXT(129,10,120,20,"测试内容一:9号宋体字是默认字体");
	 		LODOP.ADD_PRINT_TEXT(161,10,120,20,"测试内容二:11号普通宋体字正体");	
	 	};
	     </script>

</body>
</html><?php }
}
