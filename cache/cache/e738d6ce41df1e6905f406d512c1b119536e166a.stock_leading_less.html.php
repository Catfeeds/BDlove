<?php
/* Smarty version 3.1.29, created on 2017-08-03 16:46:55
  from "D:\www\yunjuke\application\pay\views\stock_leading_less.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5982e2ff610569_48892565',
  'file_dependency' => 
  array (
    'e738d6ce41df1e6905f406d512c1b119536e166a' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\stock_leading_less.html',
      1 => 1501636154,
      2 => 'file',
    ),
    '06ff41d60b0a9f396441dd0bc7be4a980f9c9cf7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pageheader.html',
      1 => 1501584691,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5982e2ff610569_48892565 ($_smarty_tpl) {
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
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.js"></script>
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
<style type="text/css">
	a:hover{
		color: #333;
	}
	
</style>
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/pay/views//css/handsontable.css">
<script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/handsontable.js"></script>

<body style="background-color: #FFF; overflow: auto;">
	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 库存管理 <span class="c-gray en">&gt;</span>导入库存<span class="c-gray en">&gt;</span>少量导入
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
			<i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
<div class="page-container" style="margin-bottom:30px;">
	<div id="tab_demo" class="HuiTab">
		<div class="tabBar clearfix">
			<a href="stock_leading"><span>批量导入</span></a>
			<a href="javascript:;"><span>少量导入</span></a>
		</div>
	</div>
  <div class="fixed-bar">

  </div>
  <div class="explanation mt-20" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
        <li>步骤1：请选择入库到[仓库]和[录入方式（全盘：覆盖目标的货品库存数量；增量：对目标仓库库存进行累加）]；步骤2：逐条录入：在相应的列、行上相应录入商品｛货号、尺码、库存数量｝信息（信息类型错误，背景会标记为红色，看到红色请及时调整；可以对某列做排序、选中下拉实现快速复制）；或者直接从excel中粘贴相关的数据复制二维录入表格中 ；步骤三：在确保二维录入表格中的数据无误之后点击【确认提交】按钮提交数据。</li>
        <li>温馨提示：<span class="c-red">最多支持20行录入数据，请不要过多的录入以免丢失数据</span>。</li>
    </ul>
  </div>
  <div style="clear: both;"></div>
<div class="" >
<form method="post" enctype="multipart/form-data" id="form1">
	<div class="mt-10 lh-30">
        模式：<select name="method" id="method"  class=" pd-5 m_w_120">
        <option value="">-请选择-</option>
        <option value="1">全盘</option>
        <option value="2">局部</option>
    </select><span class="err"></span>
        <div id="hot" class="mt-20"></div>
        <div class="bot">
		   <a href="JavaScript:void(0);" class="btn btn-success radius mt-10" onclick="put_seas()"    >确认导入</a>
	    </div>
	</div>
</form>
</div>
</body>

<script type="text/javascript">
  	
  	//	实现tab切换的源码
	jQuery.Huitab =function(tabBar,tabCon,class_name,tabEvent,i){
	var $tab_menu=$(tabBar);
	  // 初始化操作
	  $tab_menu.removeClass(class_name);
	  $(tabBar).eq(i).addClass(class_name);
	  $(tabCon).hide();
	  $(tabCon).eq(i).show();
  
  	$tab_menu.bind(tabEvent,function(){
  	  $tab_menu.removeClass(class_name);
      $(this).addClass(class_name);
      var index=$tab_menu.index(this);
      $(tabCon).hide();
      $(tabCon).eq(index).show()})}
    $.Huitab("#tab_demo .tabBar span","#tab_demo .tabCon","current","click","1");

    /*虚拟数据*/
    var dataObject = [
        {brandName:'ABC',stocksCode: 'B41121903-3100', size: 'XL', amount: '16'},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''},
        {brandName:'',stocksCode: '', size: '', amount: ''}

       ];
  
    var flagRenderer = function(instance, td, row, col, prop, value, cellProperties) {
        var size = value;

        while (td.firstChild) {
            td.removeChild(td.firstChild);
        }

        if (size.indexOf(size) > -1) {
            var sizeElement = document.createElement('DIV');
            sizeElement.className = 'size ' + size.toLowerCase();
            td.appendChild(sizeElement);

        } else {
            var textNode = document.createTextNode(value === null ? '' : value);
            td.appendChild(textNode);
        }
    };

    var hotElement = document.querySelector('#hot');
    var hotElementContainer = hotElement.parentNode;
    var hotSettings = {
        data: dataObject,
        columns: [
            {
                data: 'brandName',
                type: 'text',
            },
            {
                data: 'stocksCode',
                type: 'text',
            },
            {
                data: 'size',
                type: 'text',
            },
            {
                data: 'amount',
                type: 'numeric'
            }
        ],
        stretchH: 'last',
        width: "100%",
        autoWrapRow: true,
        height: 490,
        maxRows: 500,
        manualColumnResize: true,
        manualRowResize: true,
        rowHeaders: true,
        colHeaders: [
            '品牌',
            '货号',
            '尺码',
            '库存'

        ],
        className: "htLeft",
        columnSorting: true,
        sortIndicator: true,
        autoColumnSize: {
            samplingRatio: 23
        }
    };

    var hot = new Handsontable(hotElement, hotSettings);

function put_seas(){
	var flags = "0";
	if(flags ==1){
		return false;
	}
    $('#form1').validate({
        errorPlacement: function(error, element){
			var error_td = element.nextAll('span.err');
            error_td.append(error);
        },
        rules : {
        	method : {
				required : true
            }
        },
        messages : {
            method : {
				required : '<i class="fa fa-exclamation-circle"></i>请选择模式'
            }
        }
    });
	if($("#form1").valid()){
		var data_form = $('#form1').serialize();
		var data = new Array();
		$('.ht_master ').find('tbody').children('tr').each(function(){
				if($(this).children('td').eq(0).text()!=''){
					$(this).children('td').each(function(){
						data.push($(this).text());
					})
				}
		})
		$.ajax({
	        type: "post",
	        dataType: "json",
	        url: "stock_leading_less_data",
	        data: data_form+'&data='+data,
	        success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                    return false;
                }else if(data.state){
	        		$("#data").data("result",data.data);
	        		console.log(data.data)
	        		var types = 0;
	        		if($('#method').val()==1){
	        			types=1;
	        		}
	        		document.cookie = "quick_import_data="+JSON.stringify(data.data); 
	        		layer.open({
	           			  type: 2,
	           			  title: '导入明细',
							scrollbar:false,
							shade: 0.8,
	           			  area: ['900px', '60%'],
	           			  content: 'stock_leading_less_add?type='+types //iframe的url
	        			});
	        	}else{
	        		layer.msg(data.msg,{icon:2});
	        	}
	        }
	    });

	}
	
}
</script>
</html><?php }
}
