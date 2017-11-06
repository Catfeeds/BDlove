<?php
/* Smarty version 3.1.29, created on 2017-07-28 14:07:46
  from "D:\www\yunjuke\application\admin\views\member_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597ad4b2466444_39272625',
  'file_dependency' => 
  array (
    'a9b10a4e5691524c888c74c1e86dec71db4ba722' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\member_edit.html',
      1 => 1498098958,
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
function content_597ad4b2466444_39272625 ($_smarty_tpl) {
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
		.table-title {
			background: #ccc;
			color: #fff;
		}
		
		.logo {
			width: 100px;
			height: 100px;
		}
		
		.logo-img {
			max-width: 100%;
			height: auto;
			border-radius: 50%;
		}
		
		.tabBar {
			width: 100%;
			height: 40px;
			font-size: 14px;
			font-weight: 600;
			border: 1px solid #ddd;
			margin-top: 30px;
			background-color: #f5f5f5;
		}
		
		.tabBar span {
			background-color: #f5f5f5;
			border: 0;
			cursor: pointer;
			display: inline-block;
			float: left;
			height: 40px;
			line-height: 40px;
			padding: 0 15px;
		}
		
		.tab-content {
			padding: 15px;
			margin: 20px 0;
			border: 1px solid #ddd;
			font-size: 14px;
		}
		
		.recordtotla {
			margin-top: 20px;
		}
		.tabBar span.current{
			border-top: 2px solid #b9554e;
			color: #b9554e;
		}
		
		.table-title {
    		background: #bbb;
    		color: #fff;
		}
		.value{
			display: none;
		}
		#tel{
			cursor: pointer;
		}
		#qq{
			cursor: pointer;
		}
	</style>

	<body style="background-color: #FFF; overflow: auto;">
		
		
		
		
		
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>

		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<a class="back" href="javascript:window.history.back();" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>会员详情</h3>
						<h5>网站所有注册会员索引及管理</h5>
					</div>
				</div>
			</div>

			<div class="row">
				<table class="table table-border table-bordered table-striped">
					<tr>
						<td rowspan="8" class="text-c">
							<div class="logo"><img src="http://wx.qlogo.cn/mmopen/zrFYKILZ93EUXGQa23gq6JTk4kY5oK81wJ1BiabZymPQyDtZn11WKwWgXaNbD0CCYbVHlR2TdiaLRibHpEbESnzDfuia1R6lSwia6/0" alt="logo" class="logo-img" /></div>
							<p>李小成</p>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="table-title text-c">基础信息</td>
						<td colspan="2" class="table-title text-c">消费信息</td>
						<td colspan="2" class="table-title text-c">其他信息</td>
					</tr>
					<tr>
						<td class="text-r">创建时间：</td>
						<td>2017/05/27 09:44:54</td>
						<td class="text-r">订单数：</td>
						<td>0</td>
						<td class="text-r">未使用优惠券：</td>
						<td>0</td>
					</tr>
					<tr>
						<td class="text-r">微信昵称：</td>
						<td>李小成</td>
						<td class="text-r">订单额：</td>
						<td>￥0</td>
						<td class="text-r">剩余积分：</td>
						<td>0</td>
					</tr>
					<tr>
						<td class="text-r">是否关注：</td>
						<td>已关注</td>
						<td class="text-r">最近消费时间：</td>
						<td>--</td>
						<td class="text-r">会员等级：</td>
						<td>V1</td>
					</tr>
					<tr>
						<td class="text-r">Tel：</td>
						<td colspan="5" id="tel"><span id="telspan">15928234773</span><div class="value" op="tel"><input class="telspan" type="text" /></div></td>
					</tr>
					<tr>
						<td class="text-r">QQ：</td>
						<td colspan="5" id="qq"><span id="qqspan"></span><div class="value" op="qq"><input class="qqspan" type="text" /></div></td>
					</tr>
					<tr>
						<td class="text-r">会员标签：</td>
						<td colspan="5">暂无</td>
					</tr>
				</table>
			</div>

			<div id="tab_demo" class="HuiTab">
				<div class="tabBar clearfix">
					<span id="span1">关注及绑定</span>
					<!-- <span id="span2">会员卡信息</span> -->
					<span id="span3">订单消费</span>
					<span id="span4">会员积分</span>
					<!-- <span id="span5">会员等级</span> -->
					<span id="span6">导购评价</span>
					<span id="span7">商品评价</span>
				</div>
				<div class="tabCon">
					<div class="tab-content">当前绑定导购：未绑定导购</div>
					<div class="tab-content">
						<table class="table">
							<thead>
								<tr>
									<th>时间</th>
									<th>操作</th>
									<th>备注</th>
								</tr>
							</thead>
							<tbody>
							    								    								    <tr>
										<td>2017-07-04 21:53:18</td>
										<td>绑定门店</td>
										<td>绑定门店:[射洪-品牌店]</td>
									</tr>
																	    <tr>
										<td>2017-06-13 18:59:39</td>
										<td>关注公众号</td>
										<td>关注公众号</td>
									</tr>
																	    <tr>
										<td>2017-06-13 18:59:11</td>
										<td>解绑门店</td>
										<td>解绑门店:[射洪 全品牌店铺]</td>
									</tr>
																	    <tr>
										<td>2017-06-13 18:59:11</td>
										<td>解绑导购</td>
										<td>解绑导购:[射洪 全品牌店铺].[李洋]</td>
									</tr>
																	    <tr>
										<td>2017-06-13 18:59:11</td>
										<td>取消关注公众号</td>
										<td>取消关注公众号</td>
									</tr>
																	    <tr>
										<td>2017-06-13 11:54:44</td>
										<td>绑定导购</td>
										<td>绑定导购:[射洪 全品牌店铺].[李洋]</td>
									</tr>
																	    <tr>
										<td>2017-06-13 11:54:44</td>
										<td>解绑门店</td>
										<td>解绑门店:[射洪 品牌店]</td>
									</tr>
																	    <tr>
										<td>2017-06-06 17:20:47</td>
										<td>绑定导购</td>
										<td>绑定导购:[射洪 品牌店].[李洋]</td>
									</tr>
																	    <tr>
										<td>2017-06-05 11:41:33</td>
										<td>关注公众号</td>
										<td>关注公众号</td>
									</tr>
																	    <tr>
										<td>2017-06-05 11:41:04</td>
										<td>解绑门店</td>
										<td>解绑门店:[]</td>
									</tr>
																	    <tr>
										<td>2017-06-05 11:41:04</td>
										<td>解绑导购</td>
										<td>解绑导购:[].[李洋]</td>
									</tr>
																	    <tr>
										<td>2017-06-05 11:41:04</td>
										<td>取消关注公众号</td>
										<td>取消关注公众号</td>
									</tr>
																	    <tr>
										<td>2017-06-03 22:32:34</td>
										<td>解绑门店</td>
										<td>解绑门店:[小头爸爸童装金牛凯德]</td>
									</tr>
																	    <tr>
										<td>2017-06-03 22:32:34</td>
										<td>解绑导购</td>
										<td>解绑导购:[小头爸爸童装金牛凯德].[黄雷]</td>
									</tr>
																	    <tr>
										<td>2017-06-03 22:32:34</td>
										<td>绑定导购</td>
										<td>绑定导购:[聚客测试店1].[李洋]</td>
									</tr>
																	    <tr>
										<td>2017-06-03 22:31:34</td>
										<td>绑定导购</td>
										<td>绑定导购:[小头爸爸童装金牛凯德].[黄雷]</td>
									</tr>
																	    <tr>
										<td>2017-05-25 17:51:26</td>
										<td>绑定门店</td>
										<td>绑定门店:[]</td>
									</tr>
																	    <tr>
										<td>2017-05-25 17:45:41</td>
										<td>绑定门店</td>
										<td>绑定门店:[]</td>
									</tr>
																	    <tr>
										<td>2017-05-25 11:40:44</td>
										<td>关注公众号</td>
										<td>关注公众号</td>
									</tr>
																	    <tr>
										<td>2017-05-25 11:40:44</td>
										<td>创建用户</td>
										<td>创建用户:李小成</td>
									</tr>
																	 							</tbody>
						</table>
						<p class="recordtotla">共有<span>20</span>条记录</p>
					</div>
				</div>
			</div>
			<div id="flexigrid">

	        </div>

		</div>
		<script>
		$(function(){
            var id = 'span1' ;
            var idds = "";
            get_span1();
            $("#span1").css({"background-color":"#bbb","color":"#fff"});
            $(".HuiTab").on("click",".clearfix span",function(){
            	id = $(this).attr("id");
            	$(this).siblings().css({"background-color":"","color":"#333"});
            	$(this).css({"background-color":"#bbb","color":"#fff"});
            	$(".flexigrid").remove();
            	$(".page").append('<div id="flexigrid"></div>');
                if(id =='span1'){
                	get_span1();
                }
                if(id =='span3'){
                	get_span3();
                }
                if(id =='span4'){
                	get_span4();
                }
                if(id =='span5'){
                	get_span5();
                }
                if(id =='span6'){
                	get_span6();
                }
                if(id =='span7'){
                	get_span7();
                }
            });
    
		});
		
		function  get_span1(){
			$("#flexigrid").flexigrid({
					url: '../get_user_info?op=guide&user_id='+94,
					colModel : [
						{display: '时间', name : 'operation', width : 250, sortable : false, align: 'center'},
						{display: '操作', name : 'member_id', width : 150, sortable : true, align: 'center'},
						{display: '备注', name : 'member_name', width : 500, sortable : true, align: 'center'}
					],
					sortname : "wx_action_time",	//自定义排序事件
					sortorder : "desc"	//正倒序
			});
		}
		
		function  get_span3(){
			$("#flexigrid").flexigrid({
				url: '../get_user_info?op=order&user_id='+94,
				colModel : [
                    {display: '操作', name : 'memberid', width : 100, sortable : true, align: 'center'},
					{display: '订单编号', name : 'operation', width : 250, sortable : false, align: 'center'},
					/* {display: '单价', name : 'member_id', width : 100, sortable : true, align: 'center'}, */
					{display: '购买店铺', name : 'member_name', width : 150, sortable : true, align: 'center'},
					{display: '订单状态', name : 'operation', width : 150, sortable : false, align: 'center'},
					{display: '支付方式', name : 'member_id', width : 100, sortable : true, align: 'center'},
					{display: '物流方式', name : 'member_name', width : 200, sortable : true, align: 'center'},
					{display: '订单总价', name : 'operation', width : 150, sortable : false, align: 'center'},
					{display: '下单时间', name : 'operation', width : 150, sortable : false, align: 'center'}
				],
				sortname : "created_time",	//自定义排序事件
				sortorder : "desc"	//正倒序
			});
		}
		function  get_span4(){
			$("#flexigrid").flexigrid({
				url: '../get_user_info?op=integral&user_id='+94,
				colModel : [
					{display: '操作时间', name : 'operation', width : 250, sortable : false, align: 'center'},
					{display: '后台操作人', name : 'member_id', width : 150, sortable : true, align: 'center'},
					{display: '操作方式', name : 'member_name', width : 150, sortable : true, align: 'center'},
					{display: '增减积分数', name : 'member_id', width : 150, sortable : true, align: 'center'},
					{display: '订单号|备注', name : 'member_name', width : 350, sortable : true, align: 'center'}
				],
				sortname : "ation_time",	//自定义排序事件
				sortorder : "desc"	//正倒序
			});
		}
		function  get_span5(){
			$("#flexigrid").flexigrid({
				url: '../get_user_info?op=mld_exp&user_id='+94,
				colModel : [
					{display: '时间', name : 'operation', width : 250, sortable : false, align: 'center'},
					{display: '操作', name : 'member_id', width : 150, sortable : true, align: 'center'},
					{display: '备注', name : 'member_name', width : 350, sortable : true, align: 'center'}
				],
				sortname : "ation_time",	//自定义排序事件
				sortorder : "desc"	//正倒序
			});
		}
		function  get_span6(){
			$("#flexigrid").flexigrid({
				url: '../get_user_info?op=spg_content&user_id='+94,
				colModel : [
					{display: '评价时间', name : 'operation', width : 250, sortable : false, align: 'center'},
					{display: '评价导购', name : 'member_id', width : 150, sortable : true, align: 'center'},
					{display: '导购所属门店', name : 'member_name', width : 200, sortable : true, align: 'center'},
					{display: '涉及订单', name : 'member_id', width : 200, sortable : true, align: 'center'},
					{display: '评价印象', name : 'member_name', width : 350, sortable : true, align: 'center'}
				],
				sortname : "evaluation_time",	//自定义排序事件
				sortorder : "desc"	//正倒序
			});
		}
		function  get_span7(){
			$("#flexigrid").flexigrid({
				url: '../get_user_info?op=order_content&user_id='+94,
				colModel : [
					{display: '评价时间', name : 'operation', width : 200, sortable : false, align: 'center'},
					{display: '商品名称', name : 'member_id', width : 450, sortable : true, align: 'center'},
					{display: '涉及订单', name : 'member_name', width : 200, sortable : true, align: 'center'},
					{display: '评价内容', name : 'member_name', width : 250, sortable : true, align: 'center'}
				],
				sortname : "evaluation_time",	//自定义排序事件
				sortorder : "desc"	//正倒序
			});
		}

		$("#tel").dblclick(function(){
			idds = "telspan";
			$(this).find("span").hide();
			$(this).find(".value").show();
			$(this).find("input").val($(this).find("span").html());
			$(this).find("input").focus();
		})
		$("#qq").dblclick(function(){
			idds = "qqspan";
			$(this).find("span").hide();
			$(this).find(".value").show();
			$(this).find("input").val($(this).find("span").html());
			$(this).find("input").focus();
		})
		$(".value").focusout(function(){
			var urls = '../update_user_info?op='+$(this).attr("op")+'&user_id='+94+"&str="+encodeURI($(this).find("input").val());
	   		 $.ajax({
	   				type: "POST",
	   		        url: urls,
	   		        data: 123,
	   		        dataType: "json",
	   		        success: function(data){
	   		        	if(data.state){
	   		        		$("#"+idds).html($("."+idds).val());
	   	        	    }else{
	   	        	    	alert(data.msg);
	   	        	    }
	   		        }
	   			});
			$(this).hide();
			$(this).prev().show();
		})
		

		</script>
	</body>

	</html><?php }
}
