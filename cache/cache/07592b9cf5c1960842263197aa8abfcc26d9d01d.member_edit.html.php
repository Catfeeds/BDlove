<?php
/* Smarty version 3.1.29, created on 2017-07-29 14:18:48
  from "D:\www\yunjuke\application\pay\views\member_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597c28c8d59a50_02580301',
  'file_dependency' => 
  array (
    '07592b9cf5c1960842263197aa8abfcc26d9d01d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\member_edit.html',
      1 => 1501307732,
      2 => 'file',
    ),
    '06ff41d60b0a9f396441dd0bc7be4a980f9c9cf7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pageheader.html',
      1 => 1501293220,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_597c28c8d59a50_02580301 ($_smarty_tpl) {
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

    <!--<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.min.js"></script>-->

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
					<!--<a class="back" href="javascript:window.history.back();" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>-->
					<div class="fixed-bar">
						<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 会员管理 <span class="c-gray en">&gt;</span> 会员详情
							<a href="javascript:window.history.back();" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
							<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
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
            var url="http://[::1]/yunjuke/pay.php/User/get_user_info?op=guide&user_id=94";
            var page1=page(url);
            get_span1(page1);
            load_page(url);
            $("#span1").css({"background-color":"#bbb","color":"#fff"});
            $(".HuiTab").on("click",".clearfix span",function(){
                //alert(123);

            	id = $(this).attr("id");
            	$(this).siblings().css({"background-color":"","color":"#333"});
            	$(this).css({"background-color":"#bbb","color":"#fff"});
            	/*$(".flexigrid").remove();
            	$(".page").append('<div id="flexigrid"></div>');*/
                if(id =='span1'){
                    var url="http://[::1]/yunjuke/pay.php/User/get_user_info?op=guide&user_id=94";
                    var page1=page(url);
					get_span1(page1);
                    load_page(url);
                }
                if(id =='span3'){
                    var url="http://[::1]/yunjuke/pay.php/User/get_user_info?op=order&user_id=94";
                    var page3=page(url);
					get_span3(page3);
                    load_page(url);
                }
                if(id =='span4'){
                    var url="http://[::1]/yunjuke/pay.php/User/get_user_info?op=integral&user_id=94";
                    var page4=page(url);
					get_span4(page4);
                    load_page(url);
                }
                if(id =='span6'){
                    var url="http://[::1]/yunjuke/pay.php/User/get_user_info?op=spg_content&user_id=94";
                    var page6=page(url);
					get_span6(page6);
                    load_page(url);
                }
                if(id =='span7'){
                    var url="http://[::1]/yunjuke/pay.php/User/get_user_info?op=order_content&user_id=94";
                    var page7=page(url);
					get_span7(page7);
                    load_page(url);
                }
            });
    
		});

		function page(url) {
            var page='<div class="pDiv">'+
                '<div class="pDiv2">'+
                '<div class="pGroup-left">每页最多显示'+
                '<select class="select prp pButton" name="rp" onchange="load_page_to('+"'"+url+"'"+')">'+
                '<option value="1"  >1&nbsp;&nbsp;</option>'+
            '<option value="5"  >5&nbsp;&nbsp;</option>'+
            '<option value="10" >10&nbsp;&nbsp;</option>'+
            '<option value="15" selected>15&nbsp;&nbsp;</option>'+
            '<option value="20" >20&nbsp;&nbsp;</option>'+
            '<option value="40" >40&nbsp;&nbsp;</option>'+
            '</select>条'+
            '</div>'+
            '<div class="pGroup-middle">'+
                '<div class="pFirst pButton" title="最前页" onclick="load_page_first('+"'"+url+"'"+')">'+
                '<i class="fa fa-fast-backward"></i>'+
                '</div>'+
                '<div class="pPrev pButton" title="前一页" onclick="load_page_prev('+"'"+url+"'"+')">'+
                '<i class="fa fa-backward"></i>'+
                '</div> <span class="pcontrol">'+
                '<input type="text" size="4" class="pcur pButton" value="1" onkeydown="load_page_keydown(event,'+"'"+url+"'"+')"  title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页</span>'+
                '<div class="pNext pButton" title="下一页" onclick="load_page_next('+"'"+url+"'"+')"><i class="fa fa-forward"></i></div>'+
                '<div class="pLast pButton" title="最后页" onclick="load_page_last('+"'"+url+"'"+')"><i class="fa fa-fast-forward"></i></div>'+
                '</div>'+
                '<div class="pPageStat"></div>'+
                '<div class="pGroup-right">'+
                '<span class="pPageStat1">共<span class="total">0</span>条记录，当前页：<span class="pfrom">0</span>-<span class="pto">0</span>条</span>'+
                '</div>'+
                '</div>'+
                '<div style="clear:both"></div>'+
                '</div>';
            return page;
        }

		function get_span1(page) {
			var html='<div class="page-container">'+
                '<table class="table table-border table-bordered table-hover table-bg table-content mt-20 mb-40">'+
                '<thead>'+
                '<tr class="text-c">'+
                '<th width="">时间</th>'+
                '<th width="">操作</th>'+
                '<th width="40%">备注</th>'+
                '</tr>'+
                '</thead>'+
                '<tbody>'+
                '<tr>'+
                '<td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>'+
                '</tr>'+
                '</tbody>'+
                '</table>'+
                '</div>'+
                '<div class="flexigrid">'+
                page+
                '</div>';
			$("#flexigrid").html(html);
        }


        function get_span3(page) {
            var html='<div class="page-container">'+
                '<table class="table table-border table-bordered table-hover table-bg table-content mt-20">'+
                '<thead>'+
                '<tr class="text-c">'+
                '<th width="">操作</th>'+
                '<th width="">订单编号</th>'+
                '<th width="">购买店铺</th>'+
                '<th width="">订单状态</th>'+
                '<th width="">支付方式</th>'+
                '<th width="">物流方式</th>'+
                '<th width="">订单总价</th>'+
                '<th width="">下单时间</th>'+
                '</tr>'+
                '</thead>'+
                '<tbody>'+
                '<tr>'+
                '<td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>'+
                '</tr>'+
                '</tbody>'+
                '</table>'+
                '</div>'+
                '<div class="flexigrid">'+
                page+
                '</div>';
            $("#flexigrid").html(html);
        }

        function get_span4(page) {
            var html='<div class="page-container">'+
                '<table class="table table-border table-bordered table-hover table-bg table-content mt-20">'+
                '<thead>'+
                '<tr class="text-c">'+
                '<th width="">操作时间</th>'+
                '<th width="">后台操作人</th>'+
                '<th width="">操作方式</th>'+
                '<th width="">增减积分数</th>'+
                '<th width="">订单号|备注</th>'+
                '</tr>'+
                '</thead>'+
                '<tbody>'+
                '<tr>'+
                '<td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>'+
                '</tr>'+
                '</tbody>'+
                '</table>'+
                '</div>'+
                '<div class="flexigrid">'+
                page+
                '</div>';
            $("#flexigrid").html(html);
        }

        function get_span6(page) {
            var html='<div class="page-container">'+
                '<table class="table table-border table-bordered table-hover table-bg table-content mt-20">'+
                '<thead>'+
                '<tr class="text-c">'+
                '<th width="">评价时间</th>'+
                '<th width="">评价导购</th>'+
                '<th width="">导购所属门店</th>'+
                '<th width="">涉及订单</th>'+
                '<th width="">评价印象</th>'+
                '</tr>'+
                '</thead>'+
                '<tbody>'+
                '<tr>'+
                '<td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>'+
                '</tr>'+
                '</tbody>'+
                '</table>'+
                '</div>'+
                '<div class="flexigrid">'+
                page+
                '</div>';
            $("#flexigrid").html(html);
        }

        function get_span7(page) {
            var html='<div class="page-container">'+
                '<table class="table table-border table-bordered table-hover table-bg table-content mt-20">'+
                '<thead>'+
                '<tr class="text-c">'+
                '<th width="">评价时间</th>'+
                '<th width="">商品名称</th>'+
                '<th width="">涉及订单</th>'+
                '<th width="">评价内容</th>'+
                '</tr>'+
                '</thead>'+
                '<tbody>'+
                '<tr>'+
                '<td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>'+
                '</tr>'+
                '</tbody>'+
                '</table>'+
                '</div>'+
                '<div class="flexigrid">'+
                page+
                '</div>';
            $("#flexigrid").html(html);
        }
		/*function  get_span1(){
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
		}*/

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
	   	        	    	layer.msg(data.msg,{time:1000});
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
