<?php
/* Smarty version 3.1.29, created on 2017-08-08 14:36:55
  from "D:\www\yunjuke\application\admin\views\public_store_of_goods.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59895c0775bf12_83551764',
  'file_dependency' => 
  array (
    '4b03d00ab1f2ff687033f45dcc75e07e1305dc6f' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\public_store_of_goods.html',
      1 => 1502155931,
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
function content_59895c0775bf12_83551764 ($_smarty_tpl) {
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
<!-- <link href="http://[::1]/yunjuke/plugins/muitipleSelect/sumoselect.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/muitipleSelect/jquery.sumoselect.min.js"></script> -->
<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<style>
.select2{top:5px;}
.flexigrid .bDiv .goods-avatar {
    background-color: #FFF;
    vertical-align: middle;
    display: inline-block;
    width: 40px;
    height: 40px;
    margin-right: 6px;

}
td.goods_info{
	max-width:200px !important;
}
td.goods_info div{
	max-width:200px !important;
}
input.isnum{
	color:red;
}
th.goods_info div{
	width:160px !important;
}
.flexigrid .bDiv td div {
    padding: 20px !important;
}
.flexigrid .hDiv .handle-s div, .flexigrid .bDiv .handle-s div {
    min-width: 60px !important;
    max-width: 80px !important;
}
.flexigrid .hDiv th div {
	padding: 8px 20px !important;
}
.amendstock-background{
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	background: #333;
	opacity: 0.5;
	z-index: 99;
}
.amengstock-content{
	position: fixed;
	width: 50%;
	min-height: 200px;
	max-height: 80%;
	min-width: 540px;
	top:10%;
	left: 25%;
	background: #fff;
	z-index: 199;
	padding: 20px;
	margin-bottom: 20%;
	overflow-y: scroll;
	border-radius: 5px;
}
.mar-lef{
	margin-left:10px;
}
.changeprice{
	margin: 30px 10px;
}
span.bloder{font-weight:bolder;color:#666;}
</style>
	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
		               <a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
							<div class="subject">
								<h3>店铺管理 - 门店(射洪-品牌店)商品管理</h3>
								<h5>平台中的商品管理</h5>
							</div>
									                <ul class="tab-base nc-row">
						        <li><a href="store_edit?role=&op=edit&id=44">基本信息</a></li>
						        <li><a href="JavaScript:void(0);" class="current">商品</a></li>
						        <li><a href="store_of_shopping_guide?role=&op=edit&id=44">导购</a></li>
						        <li><a href="mall_express_tools?role=&op=&id=44">运费</a></li>
						        <li><a href="store_of_other?role=&op=edit&id=44">其他</a></li>
					      </ul>
					      		            </div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li>支持Excel数据文件格式：csv。</li>
					<li>1：按货号和尺码导入 <a target="_blank" href="http://[::1]/yunjuke//data/excel_tp/images/storeGoods.png">查看导入格式示例</a>或<a href="http://[::1]/yunjuke/admin.php/stores/storeGoods_tp">下载格式文件</a>。
					<li>2：按款号、颜色和尺码导入 <a target="_blank" href="http://[::1]/yunjuke//data/excel_tp/images/storeGoodsSku.png">查看导入格式示例</a>或<a href="http://[::1]/yunjuke/admin.php/stores/storeGoodsSku_tp">下载格式文件</a>。
					<li>3：按条形码导入 <a target="_blank" href="http://[::1]/yunjuke//data/excel_tp/images/storeGoodsBarcode.png">查看导入格式示例</a>或<a href="http://[::1]/yunjuke/admin.php/stores/storeGoodsBarcode_tp">下载格式文件</a>。
					</li>
				</ul>
		     </div>
 <div class=" mt-20 mb-10">
     <form method="post" name="formSearch" id="formSearch" action=""> 
          <select name="brand_code" class="selecte pd-5 m_w_10 mr-10 select2" placeholder="-请选择-">
		   <option value="" selected="">-选择品牌-</option>
							<option value="373">耐克</option>
							<option value="374">乔丹</option>
							<option value="375">匡威</option>
							<option value="376">植木西</option>
							<option value="377">公主安娜</option>
							<option value="378">ABC</option>
							<option value="379">大头儿子</option>
							<option value="380">妮可贝贝</option>
							<option value="381">adidas</option>
							<option value="382">Levi’s</option>
							<option value="384">Discovery</option>
					  </select>

		 <select name="gc_id" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10 select2" >
			 <option value="">-全部分类-</option>
			 <!--
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: cate_option</p>
<p>Filename: templates_c/4b03d00ab1f2ff687033f45dcc75e07e1305dc6f_0.file.public_store_of_goods.html.cache.php</p>
<p>Line Number: 190</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\4b03d00ab1f2ff687033f45dcc75e07e1305dc6f_0.file.public_store_of_goods.html.cache.php<br />
			Line: 190<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\admin\controllers\PubStore.php<br />
			Line: 827<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\admin.php<br />
			Line: 329<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/4b03d00ab1f2ff687033f45dcc75e07e1305dc6f_0.file.public_store_of_goods.html.cache.php</p>
<p>Line Number: 190</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\4b03d00ab1f2ff687033f45dcc75e07e1305dc6f_0.file.public_store_of_goods.html.cache.php<br />
			Line: 190<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\admin\controllers\PubStore.php<br />
			Line: 827<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\admin.php<br />
			Line: 329<br />
			Function: require_once			</p>

		
	

</div>-->
		 </select>

		   <select name="amount" class="selecte pd-5 m_w_120 mr-5 select2">
					<option value="" selected="">-是否有库存-</option>
					<option value="1">有库存</option>
					<option value="0">无库存</option>
			</select>
			 <select name="year_to_market" placeholder="请选择" class="selecte pd-5 m_w_120 mr-10 select2">
				 <option value="" selected>-上市年份-</option>
			 </select>
			 <select name="season_to_market" placeholder="请选择" class=" selecte pd-5 m_w_120 mr-10 select2">
				 <option value="" selected>-上市季节-</option>
				 <option value="1">春季</option>
				 <option value="2">夏季</option>
				 <option value="3">秋季</option>
				 <option value="4">冬季</option>
			 </select>
			        
        <input name="date_from"  placeholder="开始时间" type="text" id="datepicker" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" style="background-color: #fff;width:120px !important;" class="mr-10  input-text input_text mysearch">
         至<input name="date_to" placeholder="结束时间"  type="text" id="datepicker2" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" style="background-color: #fff;width:120px !important;" class=" mr-10 ml-10 input-text input_text  mysearch">

		 <br/>
		 <div class="mt-5">
			 名称：
			 <input type="text" name="stock_name" class="input-text input_text mb-10 ml-5 mt-5">
			 款号：
			 <input type="text" name="goods_spu" class="input-text input_text mb-10 ml-5 mt-5">
			 货号：
			 <input type="text" name="stocks_sn" class="input-text input_text mb-10 ml-5 mt-5">
			 条形码：
			 <input type="text" name="stocks_bar_code" class="input-text input_text mb-10 ml-5 mt-5">

			 <input id="search_button" type="button" class="btn btn-warning radius ml-20" value="搜索">
		 </div>


         <!--<input name="stock_sn" placeholder="货号" type="text" class=" f-12 ml-5 mr-10 input-text input_text  mysearch">-->
        <!--<input name="stock_name" type="text"   placeholder="商品名称"  class=" f-12 ml-5 mr-10 input-text input_text  mysearch">-->



		 <!--<input type="button" class="btn radius ml-20 btn-success" id="set_price" name="set_price" value="批量设置价格">-->
      </form>
    </div>
            <div id="flexigrid">
            </div>
	</div>
	
	<!--弹出浮动框-->
	<div class="amendstock-background" style="display:none;"><input type="hidden" name="isNumber" id="isNumber" value="1"></div>
	<div class="amengstock-content" style="display:none;">
		<h5 style="padding: 5px;border-bottom:1px solid #E0E0E0;">调整价格</h5>
		<div style="margin-top: 20px;"></div>
		<table class="table table-border" style="border-top: 0px;">
			<thead>
				<tr>
					<th></th>
					<th>当前门店价格</th>
					<th>设定门店价格</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 33.3%;">吊牌价</td>
					<td style="width: 33.3%;">199.00</td>
					<td style="width: 33.3%;"><input type="text" class="input-text size-M"/></td>
				</tr>
			</tbody>
		</table>
		<div style="margin-top: 20px;"></div>
		<table class="table table-border" style="border-top: 0px;">
			<thead>
				<tr>
					<th>颜色</th>
					<th>尺码</th>
					<th>当前门店价格</th>
					<th>设定门店价格</th>
					<th>设定门店库存</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 10%;">黑色</td>
					<td style="width: 10%;">80cm</td>
					<td style="width: 20%;">￥135.00</td>
					<td style="width: 30%;"><input type="text" class="input-text size-M"/></td>
					<td style="width: 30%;"><input type="text" class="input-text size-M"/></td>
				</tr>
			</tbody>
		</table>
		<div class="changeprice">
			
			<button class="btn pull-right mar-lef btn-warning radius">调价</button>
			<div style="width:100px" class="pull-right mar-lef"><input type="text" class="input-text radius size-M" /></div>
			<span class="pull-right mar-lef" style="line-height: 30px;">条码批量调价</span>
		</div>
		<div style="clear: both;"></div>
		<div style="margin: 10px;">
			<button class="btn pull-right mar-lef btn-warning radius">确定</button>
			<button class="btn pull-right mar-lef btn-default">取消</button>
		</div>
		<div style="clear: both;"></div>
	</div>
	<script>
	var storeId = '44';
$(function(){
	//多选
	  /* window.searchSelAll = $('.search-box-sel-all').SumoSelect({ 
          csvDispCount: 3,
          selectAll:true,
          search: true,
          searchText:'请选择.',
          okCancelInMulti:true ,
          floatWidth: 50,
      }); */
	  $(".select2").select2({
          width:'120px'
      });
    get_class_option("select[name='gc_id']");
    get_year_to_market("select[name='year_to_market']");
    function get_year_to_market(obj){
        if($(obj).length==0){
            return false;
        }
        $.ajax({
            type:'get',
            dataType:'json',
            url:'ajax_get_year_to_market',
            success:function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg)
                    return false;
                }else if(data.state){
                    $(obj).append(data.info);
                }
            }
        })
    }
    function get_class_option(obj,class_id){
        if($(obj).length==0){
            return false;
        }
        $.ajax({
            type:'get',
            dataType:'json',
            url:'ajax_get_cate_option?class_id='+class_id,
            success:function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                    return false;
                }else if(data.state){
                    $(obj).append(data.info);
                }
            }
        })
    }

	$('#search_button').click(function(){
		search = $("#formSearch").serialize();
        $("#flexigrid").flexOptions({url: 'get_storeGoods_list?role=&store_id=44&'+search, method: 'post', qtype:'', query:'',}).flexReload();
    });
	$("#flexigrid").flexigrid({
		url: 'get_storeGoods_list?role=&store_id=44',
		colModel : [
			{display: '操作', name : 'operation', width : 160, sortable : true, align: 'center', className: 'handle-s'},
			{display: '商品信息', name : 'storelogo', width : 200, sortable : true, align: 'center'},
			{display: '品牌', name : 'member_name', width : 100, sortable : true, align: 'center'},
			{display: '分类', name : 'member_name', width : 80, sortable : true, align: 'center'},
			{display: '销售价', name : 'member_name', width : 80, sortable : true, align: 'center'},
			{display: '吊牌价', name : 'member_email', width : 80, sortable : true, align: 'center'},
			{display: '库存', name : 'member_email', width : 80, sortable : true, align: 'center'},
			{display: '上市年份', name : 'member_name', width : 80, sortable : true, align: 'center'},
 			{display: '上市季节', name : 'member_name', width : 60, sortable : true, align: 'center'},
			{display: '商品性别', name : 'member_name', width : 60, sortable : true, align: 'center'},
			{display: '上架时间', name : 'member_email', width : 150, sortable : true, align: 'center'},
		],
		buttons : [
			{display: '<i class="fa fa-pencil-square-o"></i>批量修改库存', name : 'add', bclass : 'add', title : '修改库存', onpress : fg_operate },

			{display: '<i class="fa fa-times"></i>清除零库存数据', name : 'clear', bclass : 'clear', title : '清除零库存数据', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>按<span class="bloder">货号</span>导入商品库存', name : 'import', bclass : 'stop', title : '将批量导入库存', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>按<span class="bloder">款号</span>导入商品库存', name : 'import_sku', bclass : 'stop', title : '将批量导入库存', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>按<span class="bloder">条形码</span>导入商品库存', name : 'import_barcode', bclass : 'stop', title : '将批量导入库存', onpress : fg_operate },
            {display: '<i class="fa fa-pencil-square-o"></i>批量设置价格', name : 'set_goods_price', bclass : 'add', title : '批量设置价格', onpress : fg_operate },
			//{display: '<i class="fa fa-trash-o"></i>批量调价', name : 'delete', bclass : 'delete', title : '将选定行导购离职', onpress : fg_operate },
		],
		/* searchitems : [
			{display: '联系电话', name : 'ous_tel'},
			{display: '导购姓名', name : 'store_name'}
		], */
		title: '门店商品列表'
	});
	function import_amount(url){
		var str_div = '<div class="pt-20 pb-20 pl-30 pr-30 "><form id="formType"   method="POST" enctype=multipart/form-data>'+
		'<div class="ncap-form-default">'+
              '<dl class=""><dt class="tit" style="width:15%;padding-left:8px;text-align:left">'+
                    '<label for="store_arayacak">导入方式：</label>'+
                '</dt>'+
                '<dd class="opt" style="width:60%;">'+
					'<div class="">'+
						'<input type="radio" id="qq_isuse_1" name="type"   value="1"  style="margin-left:20px;">全盘'+
						'<input type="radio" id="qq_isuse_0" name="type" checked value="0" style="margin-left:20px;" >局部'+
					'</div>'+
			   '</dd>'+
            '</dl>'+
            '<p class="notic" style="text-align:left;padding-left:8px;">全盘：清除当前门店的所有商品库存再导入；<br>局部：对目标库存进行修改；</p>'+
            '<table class="table">' +
            '<tr> ' +
            '<td class="text-l f-14"  style="width: 80px;">选择文件：</td>' +
            '<td class="text-l pos-r"><div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i> </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield2" class="type-file-text"> <input type="button" name="" id="button2" value="选择导入..." class="type-file-button"> <input class="type-file-file valid" id="import_excel" onchange="import_change(this)" name="file_" type="file" hidefocus="true" nc_type="cms_image"></span></div><div class="err pos-a" style="bottom: -10px;"></div></td> ' +
            '</tr>' +
            '</table>'+
		'</div></form></div>';
	    /*批量导入*/
	    layer.open({
			type: 1,
			btn: ['确认', '取消'],
			title: '<b>库存导入</b>',
			skin: 'layui-layer-rim', //加上边框n
			area: ['520px', '250px'], //宽高
			content: str_div,
			yes: function(index){
				//layer.close(index);
				var type=$('#formType').serialize();
	            /*添加代理商表单验证*/
	            $('#formType').validate({
	                errorPlacement: function(error, element){
	                    var error_td = element.parents('.input-file-show').next('div.err');
	                    error_td.append(error);
	                },
	                rules : {
	                    file_ : {
	                        required : true
	                    }
	                },
	                messages : {
	                    file_ : {
	                        required : '<i class="fa fa-exclamation-circle"></i>请选择文件'
	                    }
	                }
	            });
	            if($("#formType").valid()){
	            	var data = new FormData($('#formType')[0]);
	            	layer.close(index);
	            	
	            	$.ajax({
	            		data:data,
	                	type:'post',
	                	url:"http://[::1]/yunjuke/admin.php/write_import/excel_upload",
	                	dataType:'json',
	                	cache: false,
	                	processData: false,
	                    contentType: false,
	                	success:function(data){
	                		if(data['state'] == false){
	                			layer.alert(data['msg']);
	                		}else{
	                			layer.closeAll();
	                			//iframe层
	                			layer.open({
	                   			  type: 2,
	                   			  title: '导入明细',
	        						scrollbar:false,
	        						shade: 0.8,
	                   			  area: ['60%', '520px'],
	                   			  content: url+type+'&name='+data['name']
	                			}); 
	                		}
	                	}
	            	});
	            }
				
				//data_import('门店商品库存',"http://[::1]/yunjuke/admin.php/write_import/excel_upload",url+'?role=&store_id=44&'+type+'&name=');
			}, no: function(){
			}
		})
	}
	function fg_operate(name, grid) {
		if (name == 'import') {
			import_amount('storeGoods_import?role=&store_id=44&');
	    }else if (name == 'import_sku') {
			import_amount('storeGoodsSku_import?role=&store_id=44&');
	    }else if (name == 'import_barcode') {
			import_amount('storeGoodsBarcode_import?role=&store_id=44&');
	    }else if (name == 'add') {
	    	 var itemlist = new Array();
	        if($('.trSelected',grid).length>0){
	           
	            $('.trSelected',grid).each(function(){
	            	itemlist.push($(this).attr('data-id'));
	            });
	            
	        }
	        fg_edit(itemlist);
	    }else if(name=='clear'){
	    	layer.confirm('确认清除库存为0的数据？', {
                btn: ['确认', '取消'] //按钮
            }, function () {
            	$.ajax({
        	        type: "post",
        	        dataType: "json",
        	        url: "clearAmount?role=&store_id=44",
        	        success: function(data){
        	        	if(data.state=='403'){
        			           login_ajax('shopadmin');
        		            }else{
        		            	layer.msg(data.msg);
        		            	$("#flexigrid").flexReload();
        		            	//layer.closeAll();
        		            }
        	        }
            	})
            })
	    } else if (name == 'set_goods_price') {
            var p = '';
            if($('.trSelected').length>0){
                var itemlist = new Array();
                $('.trSelected').each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                var str_div = '<div class="pt-20 pl-30 pr-20 ">' +
                    '<p><b class="pl-30">设置类型：</b>' +
                    '<select class="valid" name="p" id="p">' +
                    '<option value="1" >-设置折扣-</option>' +
                    '<option value="2" >-修改价格-</option>' +
                    '</select></p>'+
                    '<b class="pl-30 pt-20">设置数值：</b>' +
                    '<input class="pt-20" type="number" name="num" id="price">'+
                    '<p class="pl-30"><small>折扣直接输入数值,如95折,输入0.95即可</small></p>'+
                    '</div>';
                layer.open({
                    type: 1,
                    btn: ['确认', '取消'],
                    title: '<b>修改'+itemlist.length+'项商品的价格</b>',
                    skin: 'layui-layer-rim', //加上边框n
                    area: ['420px', '220px'], //宽高
                    content: str_div,
                    yes: function (index) {
                        set_goods_price(itemlist, $('#p').val(), $('#price').val());
                    }
                });
            }else{
                layer.msg('请至少选择一项！');
            }
		}
}
});

//营业
function fg_edit(data){
	//console.log(typeof(data));
	var stname = '';
	if(typeof(data)=='number'){
		$.ajax({
	        type: "post",
	        dataType: "json",
	        url: "updateAmount?role=&store_id=44",
	        data: 'id='+data,
	        success: function(data){
			  if(data.state=='403'){
		           login_ajax('shopadmin');
	            }else if(data.state){
	            	content = '<h5 style="padding: 5px;border-bottom:1px solid #E0E0E0;">(<span class="red">'+data.row.goods_name+'</span>)调整库存、价格</h5>'+
	        		'<div style="margin-top: 20px;"></div>'+
	        	  '<table class="table table-border" style="border-top: 0px;">'+
	        			/* '<thead>'+
	        				'<tr>'+
	        					'<th></th>'+
	        					'<th>当前门店价格</th>'+
	        					'<th>设定门店价格</th>'+
	        				'</tr>'+
	        			'</thead>'+ */
	        			'<tbody>'+
	        				'<tr>'+
	        					'<td style="width: 33.3%;">吊牌价</td>'+
	        					'<td style="width: 33.3%;">'+data.row.goods_marketprice+'</td>'+
	        					/* '<td style="width: 33.3%;"><input type="text" class="input-text size-M"/></td>'+ */
	        				'</tr>'+
	        			'</tbody>'+
	        		'</table>'+ 
	        		'<div style="margin-top: 20px;"></div>'+
	        		'<form id="goodsStocks"><div style="max-height:400px;overflow:auto"><table class="table table-border" style="border-top: 0px;">'+
	        			'<thead>'+
	        				'<tr>'+
	        					'<th>货号</th>'+
	        					'<th>颜色</th>'+
	        					'<th>尺码</th>'+
	        					'<th>条码</th>'+
	        					'<th>吊牌价</th>'+
	        					'<th>销售价</th>'+
	        					'<th>库存</th>'+
	        				'</tr>'+
	        			'</thead>'+'<tbody>';
	        			$.each(data.data,function(k,v){
	        				content+='<tr>'+
	    					'<td style="width: 20%;">'+data_null(v.stocks_sn)+'<input type="hidden" value="'+data_null(v.stocks_sn)+'" name="stocks_sn[]"/><input type="hidden" value="'+v.goods_ea_id+'" name="goods_ea_id[]"/></td>'+
	    					'<td style="width: 10%;">'+data_null(v.color_remark,v.color)+'</td>'+
	    					'<td style="width: 10%;">'+data_null(v.size_note,v.size)+'<input type="hidden" value="'+v.size+'" name="size[]"/></td>'+
	    					'<td style="width: 20%;">'+data_null(v.stocks_bar_code)+'</td>'+
	    					'<td style="width: 12%;">￥ '+v.goods_marketprice+'</td>'+
	    					'<td style="width: 12%;">￥<input type="text" value="'+v.price+'" name="stocks_price[]" class="input-text size-M price"/ style="width:80%;margin-left:5%;"></td>'+
	    					'<td style="width: 10%;"><input type="text" value="'+v.amount+'" name="amount[]" class="input-text size-M amount"/></td>'+
	    				'</tr>';
	        			})
	        			content+='</tbody>'+
	        			'</table></div></form>'+
	        			'<div style="height:50px"><div class="changeprice">'+
	        				'<button class="btn pull-right mar-lef btn-warning radius" onclick="changeAmount()">调库存</button>'+
	        				'<div style="width:100px" class="pull-right mar-lef"><input type="text" class="input-text radius size-M changeAmount" /></div>'+
	        				'<span class="pull-right mar-lef" style="line-height: 30px;">批量调库存</span>'+
	        			'</div>'+
	        			'<div class="changeamount">'+
        				'<button class="btn pull-right mar-lef btn-warning radius" onclick="changePrice()">调价</button>'+
        				'<div style="width:100px" class="pull-right mar-lef"><input type="text" class="input-text radius size-M changePrice" /></div>'+
        				'<span class="pull-right mar-lef" style="line-height: 30px;">批量调价</span><div style="clear: both;"></div>'+
        			    '</div>'+
	        			'<div style="clear: both;"></div>'+
	        			'<div style="margin: 10px;">'+
	        				'<button class="btn pull-right mar-lef btn-warning radius" onclick="updateStocks('+data.row.goods_id+')">提交</button>'+
	        				'<button class="btn pull-right mar-lef btn-default" onclick="cancel()">取消</button><div style="clear: both;"></div>'+
	        			'</div></div>'+
	        			'<div style="clear: both;"></div>';
	        			$('.amengstock-content').html(content);
	        			$('.amendstock-background').show();
		            	$('.amengstock-content').show();
	            }else{
	            	layer.msg(data.msg);
	            }
			  
	        }
	   })
	}else{
		if(data.length==0){
			stname = '当前条件下的商品的库存';
		}else{
			stname = '这'+data.length+'个商品的库存';
		}
		layer.open({
			type: 1,
			btn: ['确认', '取消'],
			title: '<b>修改库存</b>',
			skin: 'layui-layer-rim', //加上边框n
			area: ['420px', '180px'], //宽高
			content: '<div class="pt-20 pb-20 pl-30 pr-30 "><form  id="form_edit" method="POST" enctype=>' +
			'<div class="">修改'+stname+'为：<input type="number" name="stock" style="width:50px;" id="edit_amount" class=""><span value="" class="err"></span></div>' +
			'</form></div>',
			yes: function(index){
				/*添加代理商表单验证*/
				$('#form_edit').validate({
					errorPlacement: function(error, element){
						var error_td = element.nextAll('span.err');
						error_td.append(error);
					},
					rules : {
	                    stock:{required : true}
	                },
	                messages : {
						stock : {required : '<i class="fa fa-exclamation-circle"></i>请填写库存量'}
	                }
				});
				if($("#form_edit").valid()){
					
						   search = $("#formSearch").serialize();
						   $.ajax({
						        type: "post",
						        dataType: "json",
						        url: "update_goodsAmount?role=&store_id=44",
						        data: search+"&id="+data+'&amount='+$('#edit_amount').val(),
						        success: function(data){
								  if(data.state=='403'){
							           login_ajax('shopadmin');
						            }else{
						            	layer.msg(data.msg);
						            	layer.close(index);
						            	$("#flexigrid").flexReload();
						            }
						        }
						   })
					   
					
				}
			}, no: function(){
			}
		})
		//console.log(data)
		//data = data.join(',');
	}
}
$("div.amengstock-content").delegate("input.price","blur",function(){
	  if(parseFloat($(this).val())>=0&&!isNaN($(this).val())){
		  $(this).removeClass('isnum');
	  }else{
		  $(this).addClass('isnum');
		  layer.msg('请输入正确的数字');
	  }
	});
$("div.amengstock-content").delegate("input.amount","blur",function(){
	  if(parseFloat($(this).val())>=0&&!isNaN($(this).val())){
		  $(this).removeClass('isnum');
	  }else{
		  $(this).addClass('isnum');
		  layer.msg('请输入正确的数字');
	  }
	});
function isNumber(){
	var isNum = true;
	$('div.amengstock-content').find('table').find("input.input-text").each(function(){
		if(parseFloat($(this).val())>=0&&!isNaN($(this).val())){
			  $(this).removeClass('isnum');
		  }else{
			  $(this).addClass('isnum');
			  isNum = false; 
		  }
	})
	if(!isNum){
		layer.alert('请输入正确的数字');
		return false;
	}
}	
function cancel(){
	$('.amendstock-background').hide();
	$('.amengstock-content').hide();
}
function changeAmount(){
	var amount = $('.changeAmount').val();
	if(parseFloat(amount)>=0&&!isNaN(amount)){
		$('div.amengstock-content').find('table').find('input.amount').each(function(){
			$(this).val(parseInt(amount));
		})
	}else{
		layer.alert('请输入正确的数字');
	}
}
function changePrice(){
	var price = $('.changePrice').val();
	if(parseFloat(price)>=0&&!isNaN(price)){
		$('div.amengstock-content').find('table').find('input.price').each(function(){
			$(this).val(number_format(price,2));
		})
	}else{
		layer.alert('请输入正确的数字');
	}
}
function updateStocks(id){
	isNumber();
	$.ajax({
        type: "post",
        dataType: "json",
        url: "updateStocks?store_id=44",
        data: $('#goodsStocks').serialize()+'&id='+id,
        success: function(data){
		  if(data.state=='403'){
	           login_ajax('shopadmin',data.msg);
            }else if(data.state){
            	layer.msg(data.msg);
            	$('.amendstock-background').hide();
            	$('.amengstock-content').hide();
            	$("#flexigrid").flexReload();
            }else{
            	layer.msg(data.msg);
            }
        }
   })
}

//    $('#set_price').click(function(){
//        var p = '';
//        if($('.trSelected').length>0){
//            var itemlist = new Array();
//            $('.trSelected').each(function(){
//                itemlist.push($(this).attr('data-id'));
//            });
//            var str_div = '<div class="pt-20 pl-30 pr-20 ">' +
//                '<p><b class="pl-30">设置类型：</b>' +
//                '<select class="valid" name="p" id="p">' +
//                '<option value="1" >-设置折扣-</option>' +
//                '<option value="2" >-修改价格-</option>' +
//                '</select></p>'+
//                '<b class="pl-30 pt-20">设置数值：</b>' +
//                '<input class="pt-20" type="number" name="num" id="price">'+
//                '<p class="pl-30"><small>折扣直接输入数值,如95折,输入0.95即可</small></p>'+
//                '</div>';
//            layer.open({
//                type: 1,
//                btn: ['确认', '取消'],
//                title: '<b>修改'+itemlist.length+'项商品的价格</b>',
//                skin: 'layui-layer-rim', //加上边框n
//                area: ['420px', '220px'], //宽高
//                content: str_div,
//                yes: function (index) {
//                    set_goods_price(itemlist, $('#p').val(), $('#price').val());
//                }
//            });
//        }else{
//            layer.msg('请至少选择一项！');
//        }
//    });

    function set_goods_price(id, p, num) {
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "set_goods_price?id="+id+'&p='+p+'&num='+num,
            success: function(data) {
                layer.closeAll();
                layer.msg(data.msg);
                $("#flexigrid").flexReload();
            }
        });
    }



</script>
			<div id="goTop">
				<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
				<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
			</div>
	</body>

	</html><?php }
}
