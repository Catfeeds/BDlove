<?php
/* Smarty version 3.1.29, created on 2017-06-14 16:20:40
  from "D:\www\yunjuke\application\pay\views\statistics_index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5940f1d8e00362_71231595',
  'file_dependency' => 
  array (
    'b5b298f4cd9f36cf7c24ed0e3ceb63a30f314fb9' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\statistics_index.html',
      1 => 1495588444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/link.html' => 1,
    'file:lib/header.html' => 1,
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_5940f1d8e00362_71231595 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '60635940f1d8ca0a12_41869149';
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
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/link.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<link href="<?php echo TEMPLE;?>
css/cashier.css" type="text/css" rel="stylesheet">
		<link href="<?php echo TEMPLE;?>
css/datepicker3.css" type="text/css" rel="stylesheet">
		<!-- Mainly scripts -->
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/Chart.min.js" type="text/javascript"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/bootstrap-datepicker.js" type="text/javascript"><?php echo '</script'; ?>
>
		<style type="text/css">
	#dataselect .input-group-btn, #ym-select .input-group-btn {
	width: 12%;
}

#dataselect .input-sm, #ym-select .input-sm {
	border-radius: 7px;
	height: 40px;
}

#dataselect .btn-primary, #ym-select .btn-primary {
	margin-left: 20px;
	border-radius: 4px;
	margin-bottom: 0px;
}

#dataselect .input-group-addon, #ym-select .input-group-addon {
	border-radius: 7px;
}

.ibox-content {
	min-height: 550px;
}

.input-group .form-control {
	width: 45%;
	float: none;
}
</style>
	</head>

	<body>
		<div id="wrapper">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-lg-10">
					<h2>商家支付数据统计</h2>
					<ol class="breadcrumb">
						<li><a>智慧店铺</a></li>
						<li><a>数据统计</a></li>
						<li class="active"><strong>商家支付数据统计</strong></li>
					</ol>
				</div>
				<div class="col-lg-2"></div>
			</div>
				<div class="wrapper wrapper-content animated fadeIn">

				<div class="row">
					<div class="col-lg-12">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<div class="form-group">
									<label class="font-noraml">选择收银方式</label>
									<div class="form-group input-group" style="display: block;width:77%;">
										<select class="form-control m-b" id="store_date">
																				
																															<!--查询平台门店-->
											<option value="958">全部</option>
											<option value="958">微信</option>
											<option value="958">支付宝</option>
																				</select>
									</div>
								</div>
								<div id="dataselect" class="form-group">
									<label class="font-noraml">选择日期</label>
									<div id="datepicker" class="input-daterange input-group">
										<input type="text" value="2017-04-05" name="start" class="input-sm form-control" id="datestart">
										&nbsp;<span> 到 </span>&nbsp;
										<input type="text" value="2017-04-12" name="end" class="input-sm form-control" id="dateend">
										<span class="input-group-btn">
											<button class="btn btn-primary">查 询</button>
										</span>
									</div>
								</div>
							</div>
							<div class="ibox-content">
								<div id="canvasdesc">
									<span class="pull-right text-right"> <small>每日支付状况<strong></strong></small>
										<br>

									</span>
									<h2 class="m-b-xs">
										总净收入 ￥<strong class="price1">0</strong>
									</h2>
									<h3 class="m-b-xs">
										<span>总流水收入 ￥<strong class="price2">0</strong></span>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>总退款 ￥<strong class="price3">0</strong></span>
									</h3>
									<!---<small></small>--->
								</div>

								<div id="canvascontext"><canvas height="542" id="lineChart" width="1628" style="width: 1628px; height: 542px;"></canvas></div>

								<!--<div class="m-t-md">
                                    <small class="pull-right">
                                        <i class="fa fa-clock-o"> </i>
                                        Update on 16.07.2015
                                    </small>
                                   <small>
                                       <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                                   </small>
                                </div>-->

							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<div class="form-group">
									<label class="font-noraml">选择收银方式</label>
									<div class="form-group input-group" style="display: block;width:77%;">
										<select class="form-control m-b" id="store_mouth">
																				<option>全部</option>
																																	<!--查询平台门店-->
												<option value="958">微信</option><option value="958">支付宝</option>
																					</select>
									</div>
								</div>
								<div id="ym-select" class="form-group">
									<label class="font-noraml">选择年月</label>
									<div id="ymdatepicker" class="input-daterange input-group">
										<input type="text" value="2016-10" name="start" class="input-sm form-control" id="ymstart">
										&nbsp;<span> 到 </span>&nbsp;
										<input type="text" value="2017-04" name="end" class="input-sm form-control" id="ymend">
										<span class="input-group-btn">
											<button class="btn btn-primary">查 询</button>
										</span>
									</div>
								</div>
							</div>
							<div class="ibox-content">
								<div id="ymcanvasdesc">
									<span class="pull-right text-right"> <small>每月支付状况<strong></strong></small>
										<br>

									</span>
									<h2 class="m-b-xs">
										总净收入 ￥<strong class="price1">0</strong>
									</h2>
									<h3 class="m-b-xs">
										<span>总流水收入 ￥<strong class="price2">0</strong></span>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>总退款 ￥<strong class="price3">0</strong></span>
									</h3>
									<!---<small></small>--->
								</div>

								<div id="ym-canvascontext"><canvas height="542" id="ymlineChart" width="1628" style="width: 1628px; height: 542px;"></canvas></div>

								<!--<div class="m-t-md">
                                    <small class="pull-right">
                                        <i class="fa fa-clock-o"> </i>
                                        Update on 16.07.2015
                                    </small>
                                   <small>
                                       <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                                   </small>
                                </div>-->

							</div>
						</div>
					</div>
				</div>

			</div>
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>

</body>
</html><?php }
}
