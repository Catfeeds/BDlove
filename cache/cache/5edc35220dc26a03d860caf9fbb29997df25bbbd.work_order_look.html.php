<?php
/* Smarty version 3.1.29, created on 2017-07-31 14:45:20
  from "D:\www\yunjuke\application\admin\views\work_order_look.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597ed200c253b4_66673343',
  'file_dependency' => 
  array (
    '5edc35220dc26a03d860caf9fbb29997df25bbbd' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\work_order_look.html',
      1 => 1501483388,
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
function content_597ed200c253b4_66673343 ($_smarty_tpl) {
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
<link href="http://[::1]/yunjuke/application/admin/views/css/admin_other.css" rel="stylesheet" type="text/css"/>
<style>
  .ncap-order-style {
	width:100%;
	}
	.title-show{
		background:#ebedf1;
		border-radius: 2px;
		padding: 5px;
	}
	.title-show p span{
		color: #bbb;
	}
	.clear{
		clear: both;
	}
	.ncap-order-flow .num5 li {
	    width: 30%;
	}
	.pl-15{
		padding-left: 15px;
	}
	.ncap-order-flow{
		margin-bottom: 30px;
	}
	.panel-header{
		background: #EDFBF8!important;
	}
	.userimg{
		width: 40px;
		height: 40px;
	}
	.userimg img{
		width: 100%;
		height: auto;
		border-radius: 50%;
	}
	.log .talk .content{
		color: #999;
		font-size: 14px;
	}
	.service .talk .content{
		color: #333;
		font-size: 14px;
		font-weight: bold;
	}
	.talk p{
		margin-bottom: 0;
	}
	.cl-red{
		color: red;
	}
	.history>div{
		border-bottom: 1px dashed #bbb;
	}
	.time{
		color: #999;
	}
</style>
<body style="background-color: #FFF; overflow: auto;">

<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>工单管理-工单处理</h3>
                <h5>管理线上线下门店</h5>
            </div>
        </div>
    </div>
    <div class="ncap-order-style">
        <div class="titile">
            <h3></h3>
        </div>
        <div class="ncap-order-flow">

            <ol class="num5">
                <li class="current">
                    <h5>发起工单</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time>2017-02-10 12:12:21</time>
                </li>
                <li class="current">
                    <h5>处理工单</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time>2017-02-10 12:12:21</time>
                </li>
                <li class="">
                    <h5>确认工单</h5>
                    <time>2017-02-10 12:12:21</time>
                </li>
            </ol>
        </div>
        
        <div class="title-show">
        	<p class="pl-15 pt-10">问题标题：商品怎么添加不了？</p>
        	<p class="col-xs-3 text-l"><span>工单编号：</span>JK12345656</p>
        	<p class="col-xs-3 text-l"><span>提交时间：</span>2017-05-02 12:12:20</p>
        	<p class="col-xs-3 text-l"><span>工单类型：</span>商品类</p>
        	<div class="clear"></div>
        </div>
        
        <div class="panel panel-default mt-20">
			<div class="panel-header">沟通日志</div>
			<div class="panel-body history">
				<div class="log pb-10 pt-10">
					<div class="userimg f-l">
						<img src="http://[::1]/yunjuke/application/admin/views/images/default_user_portrait.gif" alt="" />
					</div>
					<div class="talk f-l ml-10">
						<p class="content">
							liy**@internetdc.com:域名：购买域名的时候选择免费哟想是那个吗？<br>
							问题描述：是163的还是阿里云的不知道在哪里登录
						</p>
						<div class="time">2016-20-30 12:21:30</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="service pt-10 pb-10">
					<div class="userimg f-l">
						<img src="http://[::1]/yunjuke/application/admin/views/images/default_user_portrait.gif" alt="" />
					</div>
					<div class="talk f-l ml-10">
						<p class="content">
							售后工程师：您的问题我们已收到，会尽快为您查看。请您耐心等待，谢谢
						</p>
						<div class="time">2016-20-30 12:21:30</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		
		<div class="panel panel-default mt-20">
			<div class="panel-header">平台处理</div>
			<div class="panel-body">
				<p>留言</p>
				<textarea name="" rows="" cols="" style="width: 100%;height: 100px;padding:5px;" placeholder="此处限定5000字符"></textarea>
				<div class="upload mt-20">
					<div class="f-l pt-10">上传附件：</div>
					<div class="f-l ml-20">
						<div class="up">
							<input type="file" name="" id="" value="" multiple="multiple"/>
							<p class="mt-5">可上传<span class="cl-red">5个附件</span>每个附件大小不得超过8M。附件支持的格式有：'jpg','jpeg','bmp','png','gif','txt','rar','zip'
								,'doc','docx','ini','conf','eml','xlsx','xls','pdf'</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<button class="btn btn-warning">提交</button>
			</div>
		</div>
		
    </div>
</div>
<script type="text/javascript">

</script> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
<script type="text/javascript">
	 $(".history>div:last").css('border-bottom','none');
</script>
</html><?php }
}
