<?php
/* Smarty version 3.1.29, created on 2017-08-04 17:09:52
  from "D:\www\yunjuke\application\pay\views\stock_query.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598439e07f6fb7_60255426',
  'file_dependency' => 
  array (
    'fd893726e8f63a759f20b9e3ef975096a7bbf91c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\stock_query.html',
      1 => 1501636154,
      2 => 'file',
    ),
    '06ff41d60b0a9f396441dd0bc7be4a980f9c9cf7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pageheader.html',
      1 => 1501752072,
      2 => 'file',
    ),
    '4379b6740719dd7689b65b50209b65c69516b51b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\common_list_page.html',
      1 => 1500341760,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_598439e07f6fb7_60255426 ($_smarty_tpl) {
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
<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/jquery-ui/jquery-ui.min.js"></script>
	<style type="text/css">
		a:hover{
			color: #333;
		}
		.layui-layer-content{
			padding: 0 10px 10px 10px;
		}
	</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 库存管理 <span class="c-gray en">&gt;</span>库存管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		<i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<form  method="post"  name="formSearch" id="formSearch" >
         
        <div class="search mb-10">
            <select name="gc_id" class=" mr-5 m_w_120 pd-5 mb-10">
            	<option value="" selected="">-分类选择-</option>
           		<option value='100106' >|--精品童装</option><option value='100110' >&nbsp;&nbsp;&nbsp;&nbsp;|--童衣</option><option value='100114' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童T恤</option><option value='100115' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童外套</option><option value='100116' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童衬衫</option><option value='100117' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童裙子</option><option value='100118' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童背心</option><option value='100137' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童哈衣</option><option value='100138' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童家居服</option><option value='100139' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童羽绒服</option><option value='100140' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童棉服</option><option value='100141' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童针织衫</option><option value='100142' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童套装</option><option value='100111' >&nbsp;&nbsp;&nbsp;&nbsp;|--童裤</option><option value='100119' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童长裤</option><option value='100120' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童短裤</option><option value='100121' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童打底裤</option><option value='100112' >&nbsp;&nbsp;&nbsp;&nbsp;|--童鞋</option><option value='100122' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童运动鞋</option><option value='100123' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童帆布鞋</option><option value='100124' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童皮鞋</option><option value='100125' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童凉鞋</option><option value='100126' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童雨鞋</option><option value='100127' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--学步鞋</option><option value='100113' >&nbsp;&nbsp;&nbsp;&nbsp;|--儿童配件</option><option value='100128' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童帽子</option><option value='100129' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童袜子</option><option value='100130' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--儿童书包</option><option value='100131' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--其他配饰</option><option value='100107' >|--母婴</option><option value='100108' >|--运动服饰</option><option value='100109' >|--男装女装</option><option value='100132' >&nbsp;&nbsp;&nbsp;&nbsp;|--上衣</option><option value='100135' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--羽绒服</option><option value='100136' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--大衣</option><option value='100133' >&nbsp;&nbsp;&nbsp;&nbsp;|--裤子</option><option value='100134' >&nbsp;&nbsp;&nbsp;&nbsp;|--鞋子</option>			</select>
			
			<select name="brand_id" class="mr-5 m_w_120 pd-5 mb-10">
	            <option value="" selected="">-品牌选择-</option>
	            	        		<option value="378">ABC KIDS</option> 
		        		   </select>  
     
	        <select name="amount" class="mr-5 m_w_120 pd-5 mb-10">
	            <option value="" selected="">-是否有库存-</option>
	            	<option value="1">有库存</option> 
					<option value="0">无库存</option>
			</select>
			
			
	        <input name="stock_name" type="text"     class=" input-text input_text mb-10" placeholder="货品">
	        <input name="stock_sn"   type="text"     class=" input-text input_text mb-10" placeholder="款号">
	        <input name="stocks_bar_code"   type="text"     class=" input-text input_text mb-10" placeholder="条形码">

        <input id="searchBtn" type="button" class="btn btn-warning radius ml-10 mb-10" value="搜索">
        </div>
    </form>
    <!--<div id="flexigrid"></div>-->
    <table class="table table-border table-bordered table-hover table-bg table-content">
        <thead>
        <tr>
            <th scope="col" colspan="13">库存列表</th>
        </tr>
        <tr class="text-c">
            <th width=""><input type="checkbox" value="" name="" onclick="content_checkAll(this)"></th>
            <th width="">操作</th>
            <th width="">商品信息</th>
            <th width="">品牌</th>
            <th width="">分类</th>
            <th width="">销售价</th>
            <th width="">吊牌价</th>
            <th width="">库存</th>
            <th width="">上市时间</th>
        </tr>
        <tr><th colspan="11">
            <span class="btn btn-primary radius" onclick="fg_operate('add')"><i class="fa fa-cloud-upload"> 批量修改库存</i></span>
            <span class="btn btn-danger radius" onclick="fg_operate('clear')"><i class="fa fa-trash"> 清除零库存数据</i></span>
        </th></tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="flexigrid">
    <div class="pDiv">
       <div class="pDiv2">
          <div class="pGroup-left">每页最多显示
              <select class="select prp pButton" name="rp" onchange="load_page_to('http://[::1]/yunjuke/pay.php/stock/get_stock_query_list')">
                  <option value="1"  >1&nbsp;&nbsp;</option>
                  <option value="5"  >5&nbsp;&nbsp;</option>
                  <option value="10" >10&nbsp;&nbsp;</option>
                  <option value="15" selected>15&nbsp;&nbsp;</option>
                  <option value="20" >20&nbsp;&nbsp;</option>
                  <option value="40" >40&nbsp;&nbsp;</option>
              </select>条
          </div> 
          <div class="pGroup-middle"> 
              <div class="pFirst pButton" title="最前页" onclick="load_page_first('http://[::1]/yunjuke/pay.php/stock/get_stock_query_list')">
                <i class="fa fa-fast-backward"></i> 
              </div>
              <div class="pPrev pButton" title="前一页" onclick="load_page_prev('http://[::1]/yunjuke/pay.php/stock/get_stock_query_list')">
                <i class="fa fa-backward"></i>
              </div> <span class="pcontrol"> 
              <input type="text" size="4" class="pcur pButton" value="1" onkeydown="load_page_keydown(event,'http://[::1]/yunjuke/pay.php/stock/get_stock_query_list')"  title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页</span> 
              <div class="pNext pButton" title="下一页" onclick="load_page_next('http://[::1]/yunjuke/pay.php/stock/get_stock_query_list')"><i class="fa fa-forward"></i></div>
              <div class="pLast pButton" title="最后页" onclick="load_page_last('http://[::1]/yunjuke/pay.php/stock/get_stock_query_list')"><i class="fa fa-fast-forward"></i></div>
         </div>
         <div class="pPageStat"></div>
         <div class="pGroup-right">
            <span class="pPageStat1">共<span class="total">0</span>条记录，
                              当前页：<span class="pfrom">0</span>-<span class="pto">0</span>条</span>
        </div>
       </div>
       <div style="clear:both"></div> 
</div>
</div>
<script type="text/javascript">
	
    function get_check()
    {
        $("input[name='check']:checkbox").each(function(i) {
            if($(this).attr("checked")){
                $(this).parent().parent().addClass('trSelected');
            } else {
                $(this).parent().parent().removeClass('trSelected');
            }
        });
    }
    $(function(){
        var url = 'http://[::1]/yunjuke/pay.php/stock/get_stock_query_list';
        $(".select2").select2();
        $('#searchBtn').click(function(){
            load_page_to(url);
        });
        load_page(url);
        $(".select2").select2({
            width:'200px'
        });
        
        


    });  
    
    
    /*库存导入*/
	function import_amount(url){
		var str_div = '<div class="pt-20 pb-20 pl-30 pr-30 "><form id="formType"  enctype="">'+
		'<div class="ncap-form-default">'+
              '<dl class=""><dt class="tit" style="width:30%;">'+
                    '<label for="store_arayacak">导入方式：</label>'+
                '</dt>'+
                '<dd class="opt" style="width:60%;">'+
					'<div class="">'+
						'<input type="radio" id="qq_isuse_1" name="type"   value="1"  style="margin-left:20px;">全盘'+
						'<input type="radio" id="qq_isuse_0" name="type" checked value="0" style="margin-left:20px;" >局部'+
					'</div>'+
			   '</dd>'+
            '</dl>'+
            '<p class="notic" style="text-align:left;padding-left:13%;">全盘：清除当前门店的所有商品库存再导入；<br>局部：对目标库存进行修改；</p>'+
		'</div></form></div>';
	    layer.open({
			type: 1,
			btn: ['确认', '取消'],
			title: '<b>库存导入</b>',
			skin: 'layui-layer-rim', //加上边框n
			area: ['420px', '230px'], //宽高
			content: str_div,
			yes: function(index){
				//layer.close(index);
				var type=$('#formType').serialize();
				data_import('门店商品库存',"http://[::1]/yunjuke/admin.php/write_import/excel_upload",url+'?'+type+'&name=');
			}, no: function(){
			}
		})
	}
	function fg_operate(name, grid) {
		get_check();
		if (name == 'import') {
			import_amount('storeGoods_import');
	    }else if (name == 'import_sku') {
			import_amount('storeGoodsSku_import');
	    }else if (name == 'import_barcode') {
			import_amount('storeGoodsBarcode_import');
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
        	        url: "clearAmount",
        	        success: function(data){
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else {
                            layer.msg(data.msg);
                            $.get('stock_query',function () {load_page('http://[::1]/yunjuke/pay.php/stock/get_stock_query_list');});
                            //layer.closeAll();
                        }
        	        }
            	})
            })
	    }
}
    
    
    

    function fg_edit(data){
    	get_check();
    	//console.log(typeof(data));
    	var stname = '';
    	if(typeof(data)=='number'){
    		$.ajax({
    	        type: "post",
    	        dataType: "json",
    	        url: "updateAmount",
    	        data: 'id='+data,
    	        success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else  if(data.state){
    	            	content = '<div class="amendstock-background"><input type="hidden" name="isNumber" id="isNumber" value="1"></div>'+
	            		'<div class="amengstock-content">'+
	            		'<h5 style="padding: 5px;border-bottom:1px solid #E0E0E0;">(<span class="red">'+data.row.goods_name+'</span>)调整库存、价格</h5>'+
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
    	        		'<form id="goodsStocks"><div style="max-height:400px;overflow:auto"><table class="table table-border mb-10" style="border-top: 0px;">'+
    	        			'<thead>'+
    	        				'<tr>'+
    	        					'<th>货号</th>'+
    	        					'<th>颜色</th>'+
    	        					'<th>尺码</th>'+
    	        					'<th>条码</th>'+
    	        					'<th>销售价</th>'+
    	        					'<th>设定价格</th>'+
    	        					'<th>库存</th>'+
    	        				'</tr>'+
    	        			'</thead>'+'<tbody>';
    	        			$.each(data.data,function(k,v){
    	        				content+='<tr>'+
    	    					'<td style="width: 20%;">'+data_null(v.stocks_sn)+'<input type="hidden" value="'+data_null(v.stocks_sn)+'" name="stocks_sn[]"/><input type="hidden" value="'+v.goods_ea_id+'" name="goods_ea_id[]"/></td>'+
    	    					'<td style="width: 15%;">'+data_null(v.color_remark,v.color)+'</td>'+
    	    					'<td style="width: 15%;">'+data_null(v.size_note,v.size)+'<input type="hidden" value="'+v.size+'" name="size[]"/></td>'+
    	    					'<td style="width: 20%;">'+data_null(v.stocks_bar_code)+'</td>'+
    	    					'<td style="width: 10%;">￥'+v.price+'</td>'+
    	    					'<td style="width: 10%;"><input type="text" value="'+v.price+'" name="stocks_price[]" class="input-text size-M price"/></td>'+
    	    					'<td style="width: 10%;"><input type="text" value="'+v.amount+'" name="amount[]" class="input-text size-M amount"/></td>'+
    	    				'</tr>';
    	        			})
    	        			content+='</tbody>'+
    	        			'</table></div></form>'+
    	        			'<div style="height:50px;margin-top:10px"><div class="changeprice">'+
    	        				'<button class="btn pull-right mar-lef btn-warning radius ml-5 mr-10" onclick="changeAmount()">调库存</button>'+
    	        				'<div style="width:100px" class="pull-right mar-lef"><input type="text" class="input-text radius size-M changeAmount" /></div>'+
    	        				'<span class="pull-right mar-lef ml-5" style="line-height: 30px;">批量调库存</span>'+
    	        			'</div>'+
    	        			'<div class="changeamount">'+
            				'<button class="btn pull-right mar-lef btn-warning radius ml-5" onclick="changePrice()">调价</button>'+
            				'<div style="width:100px" class="pull-right mar-lef"><input type="text" class="input-text radius size-M changePrice" /></div>'+
            				'<span class="pull-right mar-lef" style="line-height: 30px;">批量调价</span><div style="clear: both;"></div>'+
            			    '</div>'+
    	        			'<div style="clear: both;"></div>'+
    	        			'<div style="margin: 10px;">'+
    	        				'<button class="btn pull-right mar-lef btn-warning radius ml-5" onclick="updateStocks('+data.row.goods_id+')">提交</button>'+
    	        				'<button class="btn pull-right mar-lef btn-default radius" onclick="cancel()">取消</button><div style="clear: both;"></div>'+
    	        			'</div></div>'+
    	        			'<div style="clear: both;"></div></div>';
    	        			//$('.amengstock-content').html(content);
    	        			//$('.amendstock-background').show();
    		            	//$('.amengstock-content').show();
    		            	//console.log(content)
    		            	 layer.open({
					    			type: 1,
					    			title: '<b>修改库存</b>',
					    			skin: 'layui-layer-rim', //加上边框n
					    			area: ['60%', 'auto'], //宽高
					    			content: content,
					    		})
    		            	
    		            	
    	            }else{
    	            	layer.msg(data.msg);
    	            }
    			  
    	        }
    	   })
    	   
    	}else{
    		if(data.length==0){
    			layer.msg("至少选择一个商品!");
    			return false;
    			//stname = '当前条件下的商品的库存';
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
    						        url: "update_goodsAmount",
    						        data: search+"&id="+data+'&amount='+$('#edit_amount').val(),
    						        success: function(data){
                                        if(data.state == '403'){
                                            layer.msg(data.msg);
                                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                        }else if(data.state == '401'){
                                            layer.msg(data.msg);
                                            return false;
                                        }else {
    						            	layer.msg(data.msg);
    						            	layer.close(index);
    						            	$.get('stock_query',function () {load_page('http://[::1]/yunjuke/pay.php/stock/get_stock_query_list');});
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
    	 layer.closeAll(); 
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
            url: "updateStocks",
            data: $('#goodsStocks').serialize()+'&id='+id,
            success: function(data){
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                    return false;
                }else if(data.state){
                	layer.closeAll();
                	layer.msg(data.msg);
                	$.get('stock_query',function () {load_page('http://[::1]/yunjuke/pay.php/stock/get_stock_query_list');});
                	
                }else{
                	layer.msg(data.msg);
                }
            }
       })
    }



</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
