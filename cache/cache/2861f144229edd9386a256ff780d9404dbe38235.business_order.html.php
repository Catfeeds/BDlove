<?php
/* Smarty version 3.1.29, created on 2017-09-28 16:07:15
  from "D:\www\yunjuke\application\admin\views\business_order.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59ccadb3cffdd2_98331912',
  'file_dependency' => 
  array (
    '2861f144229edd9386a256ff780d9404dbe38235' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\business_order.html',
      1 => 1506577382,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1505983976,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59ccadb3cffdd2_98331912 ($_smarty_tpl) {
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
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/common/common.js"></script>
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
	.sign{width: 20px;height: 20px;margin: 0 10px;}
	.sign  .ico-check{
		background: url(http://[::1]/yunjuke/application/admin/views/images/flexigrid_pic.png) no-repeat 0 0;
		display: inline-block;
		width: 20px;
		height: 20px;
		cursor: pointer;
		vertical-align: middle;
	}
	tr.trSelected .sign  .ico-check{  background-position: -20px 0;}
	.ncsc-default-table thead th { font-weight:normal;line-height: 20px; color: #555; background-color: #F5F5F5; text-align:center; height: 20px; padding: 8px 0; border-bottom: solid 1px #c8c8c8;border-top: 1px solid #c8c8c8 }
	.order tbody tr td.sep-row2{height: auto;padding:8px 0;border-bottom: 1px solid #c8c8c8;background-color: #f5f5f5}
	.tDiv2 {
		font-size: 0;
		float: left;
		overflow: hidden;
		padding-left: 20px;;
	}
	.fbutton {
		vertical-align: top;
		letter-spacing: normal;
		display: inline-block;
		padding-right: 8px;
		margin-left: 8px;
		margin-right: -1px;
		border-right: dotted 1px #D7D7D7;
		cursor: pointer;
	}
	.fbutton div {
		font-size: 12px;
		line-height: 20px;
		color: #999;
		background-color: #FFFFFF;
		height: 20px;
		padding: 2px 7px;
		border: solid 1px #F0F0F0;
		border-radius: 4px;
	}
    #formSearch span{
        display: inline-block;
        margin-top:5px;
    }
    #formSearch input {
        margin-bottom: 5px;
    }
    #formSearch p{
        display: inline-block;
        margin-bottom:0;
     }
    #searchsubmit{
        margin-top: 6px;
    }
    /*#downloadlist{*/
        /*margin-top: 6px;*/
    /*}*/

	.order tbody tr td.bdl{border-right: 1px solid #E6E6E6;vertical-align: middle}
.order .buyer-info dt {
    width: 60px !important;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>商品订单</h3>
                <h5>商城实物商品交易订单查询及管理</h5>
            </div>
        </div>
    </div>
  <!-- 操作说明 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>点击查看操作将显示订单（包括订单物品）的详细信息</li>
            <li>点击取消操作可以取消订单（在线支付但未付款的订单和货到付款但未发货的订单）</li>
            <li>如果平台已确认收到买家的付款，但系统支付状态并未变更，可以点击收到货款操作(仅限于下单后7日内可更改收款状态)，并填写相关信息后更改订单支付状态</li>
        </ul>
    </div>
    <div class="mt-20 mb-10 c-666">
        <form method="get" name="formSearch" id="formSearch">
            <p><span>下单时间：</span><input type="text" name="startime" onclick="laydate()" id="startime" class=" w120 mr-5"></p>
            <p><span>— </span><input type="text" name="endtime" onclick="laydate()" id="endtime" class=" w120 ml-5 mr-30"></p>
            <p><span>买家名称：</span><input type="text" name="buyer" id="" class=" w100 mr-10"></p>
            <p><span>买家电话：</span><input type="text" name="buyer_tel" class="input-text f-12 mr-10 input_text" ></p>
            <p><span>订单编号：</span><input type="text" name="order_sn" id="" class=" w100"></p>
            <p><span>支付单号：</span><input type="text" name="pay_sn" class="input-text f-12 mr-10 input_text" ></p>
            <p><span>运单号：</span><input type="text" name="waybill_sn" class="input-text f-12 mr-10 input_text" ></p>
            <p><span>商品名称：</span><input type="text" name="goods_name"  class="input-text f-12 mr-10 input_text" ></p>
            <p><span>商品ID：</span><input type="text" name="goods_id"  class="input-text f-12 mr-10 input_text" ></p>
            <p><span>商品货号：</span><input type="text" name="stock_code" class="input-text f-12 mr-10 input_text" ></p>
            <p><span>店铺名称：</span><input type="text" name="store_name" class="input-text f-12 mr-10 input_text" ></p>


            <select name="order_from"  class="f-12  mr-10 selecte pd-5 m_w_120 ">
                <option value="">渠道名称</option>
                <option value="1">微商城</option>
                <option value="21">收银台门店</option>
                <option value="22">收银台集合店</option>
                <option value="31">APP微商收银台</option>
                <option value="32">APP批发分销</option>
                <option value="41">电商京东</option>
                <option value="42">电商天猫</option>
                <option value="43">电商手工</option>
            </select>
            <select name="order_status"  class="f-12  mr-10 selecte pd-5 m_w_120 ">
                <option value="">订单状态</option>
                <option value="10">未付款</option>
                <option value="20">已付款</option>
                <option value="31">部分发货</option>
                <option value="30">已发货</option>
                <option value="40">已收货</option>
                <option value="50">已完成</option>
                <option value="0">已取消</option>
            </select>
            <select name="shipping_type"  class="f-12  mr-10 selecte pd-5 m_w_120 ">
                <option value="">运送方式</option>
                <option value="1">快递</option>
                <option value="2">自提</option>
            </select>
            <select name="evaluation_state"  class="f-12  mr-10 selecte pd-5 m_w_120 ">
                <option value="">评价状态</option>
                <option value="0">未评价</option>
                <option value="1">已评价</option>
                <option value="2">已过期未评价</option>
            </select>
            <select name="order_type"  class="f-12  mr-10 selecte pd-5 m_w_120 ">
                <option value="">订单类型</option>
                <option value="1">分销（APP分销批发）</option>
                <option value="2">微商（微信商城）</option>
                <option value="3">电商（电商手工、京东、淘宝）</option>
                <option value="4">线下（门店收银台、集合店收银台）</option>
            </select>
            <input type="button"  class="ml-10 btn btn-warning radius" id="searchsubmit"  value="搜索">
            <!--<input type="button"  class="ml-10 btn btn-warning radius" id="downloadlist"  value="导出">-->
        </form>
    </div>
    <table class="ncsc-default-table order mt-20" style="margin-bottom: 60px;">
	  	<thead>
		    <tr>
		      <th class="w10">
				  <div class="sign all"><i class="ico-check"></i></div>
			  </th>
		      <th colspan="2">商品</th>
		      <th class="w100">单价（元）</th>
		      <th class="w40">数量</th>
		      <th class="w100">买家</th>
		      <th class="w100">订单金额</th>
		      <th class="w90">交易状态</th>
		      <th class="w120">交易操作</th>
		    </tr>
			<tr>
				<th colspan="9"  class="sep-row2">
					<div class="tDiv2" onclick="fg_operate('add')"><div class="fbutton"><div class="add" title="新增数据"><span><i class="fa fa-plus"></i>新增数据</span></div></div></div>
                    <div class="tDiv2" onclick="fg_operate('export')"><div class="fbutton"><div class="add" title="导出数据"><span><i class="fa fa-file-excel-o"></i>导出数据</span></div></div></div>
			</tr>
	  	</thead>
  		<tbody>
  		
        </tbody>
  </table>
  <div class="flexigrid">
  	<div class="pDiv">
     <div class="pDiv2">
          <div class="pGroup-left">每页最多显示
              <select class="select prp" name="rp">
                  <option value="2"  >2&nbsp;&nbsp;</option>
                  <option value="10" >10&nbsp;&nbsp;</option>
                  <option value="15" selected="selected">15&nbsp;&nbsp;</option>
                  <option value="20" >20&nbsp;&nbsp;</option>
                  <option value="40" >40&nbsp;&nbsp;</option>
              </select>条
          </div> 
          <div class="pGroup-middle"> 
              <div class="pFirst pButton" title="最前页">
                <i class="fa fa-fast-backward"></i> 
              </div>
              <div class="pPrev pButton" title="前一页">
                <i class="fa fa-backward"></i>
              </div> <span class="pcontrol"> 
              <input type="text" size="4" class="pcur" value="1" title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页</span> 
              <div class="pNext pButton" title="下一页"><i class="fa fa-forward"></i></div>
              <div class="pLast pButton" title="最后页"><i class="fa fa-fast-forward"></i></div>
         </div>
         <div class="pPageStat"></div>
         <div class="pGroup-right">
            <span class="pPageStat1">共<span class="total">?</span>条记录，
                              当前页：<span class="pfrom">0</span>-<span class="pto">0</span>条</span>
        </div>
       </div>
       <div style="clear:both"></div> 
   </div>
  
  </div>
  
</div>
<script type="text/javascript">
var isOnce = true;
$(function(){
    $("#flexigrid").flexigrid({
        url: 'business_order?role=w',
        buttons : [
            {display: '<i class="fa fa-plus"></i>新增数据', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
            {display: '<i class="fa fa-file-excel-o"></i>导出数据', name : 'csv', bclass : 'csv', title : '将选定行数据导出CVS文件',onpress : fg_operate  }
        ],
    });
    // 高级搜索提交
    $('#searchsubmit').click(function(){
        getOrder_lists(1);
    });
    if(isOnce){
    	getOrder_lists(1);
    }
    $('.prp').change(function(){          //页面大小
    	getOrder_lists(1);
    });
    $('.pcur').bind('keydown', function (e) {    //输入框输入分页
 	   var key = e.which;
 	   if(key == 13){
 		   var curpage = $('.pcur').val();
		   if(curpage > parseInt($('.ptotal').html())){
			   curpage = parseInt($('.ptotal').html());
		   }
		   getOrder_lists(curpage);
 	   }
    });
	$('.pPrev').click(function(){          //前一页
	 if(parseInt($('.pcur').val()) == 1){
	  layer.tips('已经是第一页啦', '.pPrev', {
		  tips: [1, '#3595CC'],
		  time: 3000
		})
	  return false;
	 }
	 var curpage = parseInt($('.pcur').val())-1 > 0 ? parseInt($('.pcur').val())-1 : 1;
	 getOrder_lists(curpage);
	});
	$('.pNext').click(function(){           //后一页
	 if((parseInt($('.pcur').val()) == parseInt($('.ptotal').html())) || (parseInt($('.ptotal').html()) == 0)){
	  layer.tips('已经是最后一页啦', '.pNext', {
		  tips: [1, '#3595CC'],
		  time: 3000
		})
	  return false;
	 }
	 var curpage = parseInt($('.pcur').val())+1 > 0 ? parseInt($('.pcur').val())+1 : 1;
	 getOrder_lists(curpage);
	});
	$('.pFirst').click(function(){          //第一页
	 if(parseInt($('.pcur').val()) == 1){
	  layer.tips('已经是第一页啦', '.pPrev', {
		  tips: [1, '#3595CC'],
		  time: 3000
		})
	  return false;
	 }
	 var curpage = 1;
	 getOrder_lists(curpage);
	});
	$('.pLast').click(function(){          //最后一页
	 if((parseInt($('.pcur').val()) == parseInt($('.ptotal').html())) ||( parseInt($('.ptotal').html()) == 0)){
	  layer.tips('已经是最后一页啦', '.pNext', {
		  tips: [1, '#3595CC'],
		  time: 3000
		})
	  return false;
	 } 
	 var curpage = parseInt($('.ptotal').html());
	 getOrder_lists(curpage);
	});

});
function getOrder_lists(page){
    var search = '';
    if(!isOnce){
    	search = $("#formSearch").serialize();
    }
    var role="w";var url='';
    if(role=='w'){
        url='business_order?role=w&'+search;
    }else if(role=='e'){
        url='business_order?role=e&'+search;
    }else if(role=='s'){
        url='business_order?role=s&'+search;
    }else {
        url='business_order?'+search;
    }

    $.ajax({
        url:url,
        data:{
                'rp':$('.select.prp').val(),
                'curpage':page
        },
        type:'post',
        dataType:'json',
        beforeSend:function(){
                var index = layer.load(0, {shade: false},{time:0});
        },
        success: function(data){
                    if(data.state=='403'){
                            login_ajax('shopadmin');
                    }else
                if(data.state){
                    //组装订单列表
                    isOnce = false;
                    $('.pDiv .pcur').val(data.page_info.page);
                    $('.pDiv .ptotal').html(data.page_info.page_count);
                    $('.pDiv .total').html(data.page_info.total_num);
                    $('.pDiv .pfrom').html(data.page_info.start);
                    $('.pDiv .pto').html(data.page_info.to);
                    var blanks = '<tr><td colspan="20" class="sep-row"></td></tr>';
                    var contents = '';
                    $.each(data.goods_info,function(n,order){
                        order.order_type =  order.order_type == 1 ? '分销订单' :  
                                        order.order_type == 2 ? '微商城订单' : order.order_type == 3 ? '电商订单' : '线下订单';
                        if(order.pay_type == 1){
                        	order.pay_type = '微信';
                        }else if(order.pay_type == 2){
                        	order.pay_type = '线下';
                        }else if(order.pay_type == 3){
                        	order.pay_type = '余额';
                        }else if(order.pay_type == 4){
                        	order.pay_type = '支付宝';
                        }else {
                            order.pay_type = '';
                        }
                        contents += blanks+'<tr><th colspan="20">'
                        +'<span class="ml10">订单编号：<em>'+data_null(order.order_sn)+'</em></span>'
                        +'<span>下单时间：<em class="goods-time">'+data_null(order.created_time)+'</em></span>'
                        +'<span>订单类型：<em >'+data_null(order.order_type)+'</em></span>'
                        +'<span>支付单号：<em >'+data_null(order.pay_sn)+'</em></span>'
                        +'<span class="fr mr5"><a href="business_order_print?order_sn='+data_null(order.order_sn)+'" class="btn btn-secondary size-MINI radius" target="_blank" title="打印发货单"><i class="fa fa-print"></i>打印发货单</a></span></th></tr>';
                        if((order.son).length != 0){
                            $.each(order.son,function(k,goods){
                            	if(!goods.goods_image){
                            		goods.goods_image = 'http://[::1]/yunjuke/data/images/default_goods_image.jpg';
                            	}
                                if(k==0){
                                    contents += '<tr><td  data-id="'+order.order_sn+'"  class="bdl orderSelect" rowspan="'+(order.son).length+'" ><a class="sign"><i class="ico-check"></i></a></td>'
                                    +'<td class="w70"><div class="ncsc-goods-thumb"><a href="javascript:void(0);" target="_blank"><img src="'+data_null(goods.goods_image)+'" data-geo=\'<img src="'+data_null(goods.goods_image)+'" width=120px>\'></a></div></td>'
//                                    +'<td class="w70"><div class="ncsc-goods-thumb"><a href="http://[::1]/yunjuke/index.php/goods/goods_details/'+goods.goods_id+'.html" target="_blank"><img src="'+goods.goods_image+'" data-geo=\'<img src="'+goods.goods_image+'" width=120px>\'></a></div></td>'
//                                    +'<td class="tl"><dl class="goods-name"><dt><a target="_blank" href="http://[::1]/yunjuke/index.php/goods/goods_details/'+goods.goods_id+'.html">'+goods.goods_name+'</a><a target="_blank" class="blue ml5" href="">[交易快照]</a><br><bl style="color: gray">颜色：'+goods.goods_color+'，尺码：'+goods.goods_size+'<br>货号：'+goods.stock_code+'</bl></dt><dd></dd></dl></td>'
                                    +'<td class="tl"><dl class="goods-name"><dt><a target="_blank" href="javascript:void(0);">'+data_null(goods.goods_name)+'</a><a target="_blank" class="blue ml5" href="">[交易快照]</a><br><bl style="color: gray">颜色：'+data_null(goods.goods_color)+'，尺码：'+data_null(goods.goods_size)+'<br>货号：'+data_null(goods.stock_code)+'</bl></dt><dd></dd></dl></td>'
                                    +'<td><p>'+data_null(goods.goods_price)+'</p></td><td>'+goods.goods_num+'</td>'
                                    +'<td class="bdl" rowspan="'+(order.son).length+'"><div class="buyer">'+data_null(order.user_name)+'<p member_id="2"></p><div class="buyer-info"><em></em>'
                                    +'<div class="con">'
                                    +'<h3><i></i><span>收货信息</span></h3>'
                                    +'<dl><dt>联系人：</dt><dd>'+data_null(order.receive_name,order.user_name)+'</dd></dl><dl><dt>联系电话：</dt>'
                                    +'<dd>'+data_null(order.receive_mobile,order.tel)+'</dd></dl><dl><dt>联系地址：</dt><dd>'+data_null(order.receive_address)+'</dd></dl></div></div></div></td>'
                                    +'<td class="bdl" rowspan="'+(order.son).length+'"><p class="ncsc-order-amount">'+data_null(order.order_price)+'</p>';
                                    var setBtn = '';
                                    if(order.order_status == 0){
                                        order.true_order_status = '已取消';
                                    }else if(order.order_status == 10){
                                        order.true_order_status = '未付款';
                                        setBtn = '<a href="javascript:orderCancel(\''+order.order_sn+'\')" class="ncbtn ncbtn-grapefruit mt5"><i class="icon-remove-circle"></i>取消订单</a>';
                                    }else if(order.order_status == 20){
                                        order.true_order_status = '已付款';
                                        //setBtn = '<a class="ncbtn ncbtn-mint mt10" href=""><i class="fa fa-truck"></i>设置发货</a>';
                                    }else if(order.order_status == 30 ){
                                        order.true_order_status = '已发货';
                                    }else if(order.order_status == 40 ){
                                        order.true_order_status = '已收货';
                                    }else if(order.order_status == 50){
                                        order.true_order_status = '已完成';
                                    }else{
                                    	order.true_order_status = '未知';
                                    }
                                    if(order.shipping_type==1){ //运送方式:快递
                                        contents += '<p class="goods-freight">运费:'+data_null(order.carriage)+'</p><p class="goods-pay" title="运送方式：快递">快递</p></td>';
                                    }else{//运送方式:自提
                                        contents += '<p class="goods-freight">自提</p></td>';

                                    }
                                    contents+='<td class="bdl bdr" rowspan="'+(order.son).length+'"><p>'+data_null(order.true_order_status)+'</p><p><a href="business_order_details?order_sn='+order.order_sn+'">订单详情</a></p><p></p></td>'
                                    +'<td class="bdl bdr" rowspan="'+(order.son).length+'"><p>'+setBtn+'</p></td></tr>';
                                }else{
                                    contents += '<tr><td class="w70">'
//                                    +'<div class="ncsc-goods-thumb"><a href="http://[::1]/yunjuke/index.php/goods/goods_details/'+goods.goods_id+'.html" target="_blank"><img src="'+goods.goods_image+'"'
                                    +'<div class="ncsc-goods-thumb"><a href="javascript:void(0);" target="_blank"><img src="'+goods.goods_image+'"'
                                    +'onmouseover="toolTip(\'<img src='+goods.goods_image+'>\')"'
                                    +'onmouseout="toolTip()"></a></div></td>'
//                                    +'<td class="tl"><dl class="goods-name"><dt><a target="_blank" href="http://[::1]/yunjuke/index.php/goods/goods_details/'+goods.goods_id+'.html">'+goods.goods_name+'</a><a target="_blank" class="blue ml5" href="">[交易快照]</a><br><bl style="color: gray">颜色：'+goods.goods_color+'，尺码：'+goods.goods_size+'<br>货号：'+goods.stock_code+'</bl></dt>'
                                    +'<td class="tl"><dl class="goods-name"><dt><a target="_blank" href="javascript:void(0);">'+data_null(goods.goods_name)+'</a><a target="_blank" class="blue ml5" href="">[交易快照]</a><br><bl style="color: gray">颜色：'+data_null(goods.goods_color)+'，尺码：'+data_null(goods.goods_size)+'<br>货号：'+data_null(goods.stock_code)+'</bl></dt>'
                                    +'<dd></dd></dl></td><td><p>'+data_null(goods.goods_price)+'</p></td><td>'+data_null(goods.goods_num)+'</td></tr>';
                                }
                            });
                        }
                    });
                    $(".ncsc-default-table.order tbody").html(contents);
                    //标记订单
                    $("tr").delegate(".sign","click",function(){
                        if($(this).parents("tr").hasClass('trSelected')){
                            if($(this).hasClass("all")){
                                    $(".sign").parents("tr").removeClass("trSelected")
                            }else{
                                    $(this).parents("tr").removeClass("trSelected")
                            }
                        }else{
                            if($(this).hasClass("all")){
                                    $(".sign").parents("tr").addClass("trSelected")
                            }else{
                                    $(this).parents("tr").addClass("trSelected")
                            }
                        }
                    })
                    $("img").error(function(){ 
                    	$(this).attr("src", "http://[::1]/yunjuke/data/images/default_goods_image.jpg"); 
                    	$(this).attr("data-geo", "<img src='http://[::1]/yunjuke/data/images/default_goods_image.jpg' width=120px>"); 
                    }); 
            }else{
                $('.pDiv .pcur').val(1);
                $('.pDiv .ptotal').html(1);
                $('.pDiv .total').html(0);
                $('.pDiv .pfrom').html(0);
                $('.pDiv .pto').html(0);
                var contents = '<tr><td colspan="100" class="no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</td></tr>';
                $(".ncsc-default-table.order tbody").html(contents);
            }
        },
        complete: function(XHR, TS){
                layer.closeAll('loading'); //关闭加载层
        }
    });
}
/*导出数据*/
function fg_operate(name){
    var trData = $('table.order').find('tbody').find('tr.trSelected');
    var itemlist = new Array();
    if(trData.length>0){
        trData.each(function(){
            var id=$(this).find('.orderSelect').attr('data-id');
            if(id!=''){
                itemlist.push(id);
            }
        });
    }
    var id = itemlist.join(',');

    if(name=='export'){

        if(id){
            title='确认导出选中的订单？';
        }else{
            title='确认导出当前搜索条件下的订单？';
        }
        url_s = 'orderOp?op=export';
    }else if(name=='pei'){
        if(id){
            title='确认设置选中的订单为配货状态？';
        }else{
            title='确认设置当前搜索条件下的已付款订单为配货状态？';
        }

        url_s = 'orderOp?op=pei';
    }else if(name=='import'){
        //运单导入
        //will_import('按款号',"http://[::1]/yunjuke/supplier.php/write_import/excel_upload",'waybill_import?name=');


        will_import('按订单',"http://[::1]/yunjuke/pay.php/write_import/excel_upload",'waybill_import?type=order&name=');
        return false;
    }

    layer.confirm(title,function(){
        layer.closeAll();
        if(name=='export'){
            var form = $("<form></form>");
            form.attr('action', url_s+'&' + $("#formSearch").serialize());
            form.attr('method', 'post');
            input1 = $("<input type='hidden' name='id' />");
            input1.attr('value', id);
            form.append(input1);
            form.appendTo("body");
            form.css('display', 'none');
            form.submit();
            layer.msg('开始生成导出文件');
        }else{
            $.ajax({
                url: url_s+'&' + $("#formSearch").serialize(),
                data: {id:id},
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else {
                        layer.closeAll();
                        layer.msg(data.msg);
                        getOrder_lists($('.pcur').val());
                    }
                }
            });
        }

    })
}

//取消订单
function orderCancel(order_sn){
    layer.open({
        type:1,
        skin: 'layui-layer-rim', //加上边框
        area: ['420px', 'auto'], //宽高
        title:'取消订单',
        content: '<form method="post" class="eject_con " id="order_cancel_form" onsubmit="return cancelGo(this)">'
                +'<input type="hidden" name="order_sn" value="'+order_sn+'">'
                +'<dl><dt>订单编号：</dt><dd><span class="num">'+order_sn+'</span></dd></dl>'
                +'<dl><dt>取消缘由：</dt><dd><ul class="checked">'
                +'<li class="c-666"><input type="radio" checked="checked" name="state_info" id="d1" value="1"><label for="d1">无法备齐货物</label></li>'
                +'<li class="c-666"><input type="radio" name="state_info" id="d2" value="2"><label for="d2">不是有效的订单</label></li>'
                +'<li class="c-666"><input type="radio" name="state_info" id="d3" value="3"><label for="d3">买家主动要求</label></li>'
                +'<li class="c-666"><input type="radio" name="state_info" flag="other_reason" id="d4" value="0"><label for="d4">其他原因</label></li>'
                +'<li id="other_reason" style="display:none; height:48px;"><textarea name="state_info1" rows="2" id="other_reason_input" style="width:200px;"></textarea></li>'
                +'</ul></dd></dl><dl class="bottom"><dt>&nbsp;</dt><dd><input type="submit" class="submit" id="confirm_button" value="确定"></dd></dl></form>',
        success: function(){
            $(function(){
                $('ul.checked li input').click(function(){
                    if($(this).attr('id')=='d4'){
                        $('#other_reason').show();
                    }else{
                        $('#other_reason').hide();
                    }
                });
            })
        }
    });
}
function cancelGo(obj){
    var data = $(obj).serialize();
    $.ajax({
        url: "http://[::1]/yunjuke/admin.php/Business/order_cancel",
        data: data,
        type: 'POST',
        dataType: 'json',
        success: function (msg) {
            layer.closeAll();
            layer.msg(msg);
            getOrder_lists(1);
        }
    });
    return false;
}
</script> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
