<?php
/* Smarty version 3.1.29, created on 2017-07-28 11:15:43
  from "D:\www\yunjuke\application\pay\views\refundDeatil.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597aac5f19da29_79034997',
  'file_dependency' => 
  array (
    'dd4c9f2ec74a43080098ea039799d544306635fd' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\refundDeatil.html',
      1 => 1501211740,
      2 => 'file',
    ),
    '06ff41d60b0a9f396441dd0bc7be4a980f9c9cf7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pageheader.html',
      1 => 1500950071,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_597aac5f19da29_79034997 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	
	<link href="http://[::1]/yunjuke/application/pay/views/css/index.css" rel="stylesheet" type="text/css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/index_1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/style.css" />

    <link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/font-awesome.min.css" rel="stylesheet" />
    <link href="http://[::1]/yunjuke/application/pay/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/application/pay/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>



    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.js"></script>
        <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/admin.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-migrate-1.2.1.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/common.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/common/common.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.validation.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/flexigrid.js"></script>

</head>
<link href="http://[::1]/yunjuke/application/pay/views/css/admin_other.css" rel="stylesheet" type="text/css"/>
<style>
	  .ncap-order-flow li i {
    top: 11px;
}
.fa-arrow-circle-right:last-child{
	display: none;
}
.cl-red{
	color: red;
}
.history p span,.historytime{
	color: #BBBBBB;
}
.refund{
	border: 1px solid #bbb;
	padding: 10px 20px;
	border-radius: 4px;
}
.refund .cl{
	margin-top: 10px;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
    <nav class="breadcrumb">
	    <i class="Hui-iconfont">&#xe67f;</i> 订单管理 <span class="c-gray en p-lr">&gt;</span>售后管理<span class="c-gray en p-lr">&gt;</span><span class="c-gray en p-lr">&gt;</span>退款详情
	    &nbsp;<a href="javascript:;" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
	    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
	        <i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
    

    <div class="page-container wrapper_search">
    	<div class="ncap-order-style mb-20">
        <div class="titile">
            <h3></h3>
        </div>
        <div class="ncap-order-flow">
            <ol class="num5">
                <li class="current">
                    <h5>发起退款</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time>2017-07-03 11：18：59</time>
                </li>
                <li class="current">
                    <h5>处理退款</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time>2017-07-03 11：18：59</time>
                </li>
                <li class="">
                    <h5>退款完成</h5>
                </li>
            </ol>
        </div>
	</div>
	
	<div class="row" style="padding: 20px;">
		<div class="col-sm-6 col-xs-12 refund" style="margin-left: -10px;">
			<h4>退款详情</h4>
			<div class="row cl mt-20">
				<label class="form-label col-xs-2 col-sm-4 col-md-3"><img src="http://[::1]/yunjuke/application/pay/views/images/login_bg_02.png" alt="" style="width: 50px;height: 50px;"/></label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					2017春季新款童装 X17110907男童袖拼色T恤米色/80cm,,1件
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">期望结果：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					退款不退货
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">退款金额：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					¥93.06
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">退款原因：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					买错/多买/不想要
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">退款编号：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					T20170703111859889
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">买家昵称：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					唯一
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">订单类型：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					微商城订单
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">订单编号：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					20170703111849022353
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">付款时间：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					2017-07-03 11:18:24
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">支付方式：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					微信 - 洽客代收
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">收货方式：</label>
				<div class="formControls col-xs-8 col-sm-9 col-md-9" style="margin-top: 3px;">
					快递运输（： 查看物流）
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">订单归属门店：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					大头儿子和小头爸爸 （南部店）
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">订单归属导购：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					小小神
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12 refund" style="margin-left: 10px;">
			<h4>退款成功</h4>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">退款金额：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					93.60
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">退款数量：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					0
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-xs-2 col-sm-4 col-md-3">退款方式：</label>
				<div class="formControls col-xs-8 col-sm-8 col-md-9" style="margin-top: 3px;">
					微信
				</div>
			</div>
			<button class="btn btn-primary radius">内部备注</button>
		</div>
		<div style="clear: both;"></div>
		<div class="col-sm-5 col-xs-12 refund">
			<h4>沟通记录</h4>
			<ul class="talkhistory">
				<li>
					<p>商家<span>张三</span></p>
					<p class="cl-red">同意退款不退货，正在处理中!</p>
					<p class="historytime">2017-07-03 11:24:17</p>
				</li>
				<li>
					<p>买家<span>张三</span></p>
					<p class="cl-red">同意退款不退货，正在处理中!</p>
					<p class="historytime">2017-07-03 11:24:17</p>
				</li>
				<li>
					<p>商家<span>张三</span></p>
					<p class="cl-red">同意退款不退货，正在处理中!</p>
					<p class="historytime">2017-07-03 11:24:17</p>
				</li>
				<li>
					<p>买家<span>张三</span></p>
					<p class="cl-red">同意退款不退货，正在处理中!</p>
					<p>拒绝理由<span>是你自己损坏</span></p>
					<p class="historytime">2017-07-03 11:24:17</p>
				</li>
				<li>
					<p>商家<span>张三</span></p>
					<p class="cl-red">同意退款不退货，正在处理中!</p>
					<p class="historytime">2017-07-03 11:24:17</p>
				</li>
			</ul>
		</div>
	</div>
</div>
                                                
    <div id="goTop"> <a hres="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
