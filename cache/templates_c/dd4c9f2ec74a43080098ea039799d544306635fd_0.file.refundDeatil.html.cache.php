<?php
/* Smarty version 3.1.29, created on 2017-07-28 11:15:43
  from "D:\www\yunjuke\application\pay\views\refundDeatil.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597aac5f0b7279_74595381',
  'file_dependency' => 
  array (
    'dd4c9f2ec74a43080098ea039799d544306635fd' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\refundDeatil.html',
      1 => 1501211740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597aac5f0b7279_74595381 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '13118597aac5eeebdb1_12065959';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>
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
				<label class="form-label col-xs-2 col-sm-4 col-md-3"><img src="<?php echo TEMPLE;?>
images/login_bg_02.png" alt="" style="width: 50px;height: 50px;"/></label>
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
