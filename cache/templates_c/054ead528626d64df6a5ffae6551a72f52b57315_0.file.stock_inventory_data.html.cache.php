<?php
/* Smarty version 3.1.29, created on 2017-07-29 14:10:38
  from "D:\www\yunjuke\application\pay\views\stock_inventory_data.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597c26de88fe22_02547559',
  'file_dependency' => 
  array (
    '054ead528626d64df6a5ffae6551a72f52b57315' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\stock_inventory_data.html',
      1 => 1501294344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_597c26de88fe22_02547559 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1759597c26de603803_79386191';
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
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
css/iconfont.css"/>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
/plugins/layer/layer.js"><?php echo '</script'; ?>
>
		<style>
		    #form3 tr{
			   text-align:center;
		    }
		    #form3 ul{text-align:center;margin:0 20%;}
		    #form3 ul li{
			  float:left;margin:20px 10px;
		    }
		   #form3 ul li a{color:#0096ff;}
		   .pay-content td{
		   	line-height: 23px !important;
		   }
		   table td,
		   table th{
		   	text-align: center;
		   }
		   tr.current{
	          background-color:#999999;  
		   }
		   span.err{
	           color:red;
		   }
		   .modal-dialog {
    width: 750px !important;
    height: 550px !important;
}
		   .checkbox{
			    position: relative;
			    display: block;
			    margin: 0px; 
			}
			.btn-pay{
				color: #fff;
				padding: 10px 20px;
			}
			.btn-pay:hover{
				color: #fff;
			}
			.paymoney{
				padding: 10px;
				background: #021a2e;
				color: #fff;
			}
			.paymoney span{
				color: red;
				margin: 0 8px;
			}
			.memberinfo{
				background: #858d97;
				padding: 30px;
				border: 1px solid #ddd;
				margin-top: 20px;
				color: #666;
			}
			.bg-green{
				background: #1bc096!important;
			}
			.memberinfo td{
				border-top:0px!important;
			}
			.pay-left{
				line-height: 29px !important;
				text-align: right;
			}
			.tabs-container .nav-tabs > li.active > a, .tabs-container .nav-tabs > li.active > a:hover, .tabs-container .nav-tabs > li.active > a:focus {
			    border: 1px solid #ccc;
			    border-bottom-color: transparent;
			}
			.tabs-container .panel-body {
				border: 1px solid #ccc;
			}
			.tabs-container .nav-tabs {
    border-bottom: 1px solid #ccc;
}
th{
	background: #eee!important;
}
.btn{
	border: none!important;
}
.form-control, .single-line {
    border: 1px solid #ccc;
    }
    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    border: 1px solid #ddd;
}
.totalPrice{
	letter-spacing: 1px;
	margin-left: 20px;
	font-size: 16px;
	color: #666;
}

.totalPrice span{
	color: red;
	padding: 0 3px;
	font-size: 23px;
	font-weight: bold;
}
.total-title{
	font-size: 25px!important;
	color: #3c3950!important;
	font-weight: bold;
}
.selectarea{
	width: 100%;
}
#stockInfoForm{
	overflow-y: auto;
}
.display{
	background: #a9a9a9;
}
.display:hover{
	background: #a9a9a9;
}
.modal-dialog {
    min-width: 660px !important;
    max-width: 90% !important;
}
.guide{
	width: 200px;display: flex!important;
	justify-content: flex-end;
	align-items: center;
}
.guide-icon{
	width: 25px;
	margin-right: 5px;
}
.guide-name{
	margin-bottom: 0px;
	color: #999;
}
.name-right{
	margin-bottom: 0px;
	color: #999;
}
.changename{
	text-decoration: underline;
	cursor: pointer;
	color: dodgerblue;
}
.nav-title{
	line-height: 40px;
	background: #fff;
	margin: 0 -20px;
	padding: 0 20px;
}
.input-title{
	width: 90px;
	font-size: 16px;
}
.input-query{
	width: 200px;
	float: left;
	margin: 0 20px;
}
.micropay .table input{
	height: 25px;
}
.micropay .table>tbody>tr>td {
    padding: 8px 0;
    border: 1px solid #e7e7e7;
}
.table{
	background: #fff;
}
td a{
	color: red;
}
.bottom{
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 70px;
	background: #e4e4e4;
	line-height: 70px;
}
.startpay{
	margin-left: 30px;
}
.changeinput{
	margin: 0 auto;
	display: none;
}
a:hover{
	color: #333;
}
@media only screen and (max-width: 1600px) {
	.totalPrice {
    letter-spacing: 0px;
    font-size: 14px;
	}
	.totalPrice span {
    padding: 0 2px;
    font-size: 22px;
	}
	.btn-pay {
    padding: 8px 16px;
}
.startpay{
	margin-left: 20px;
}
}
@media only screen and (max-width: 1350px) {
	.total-title {
    font-size: 22px!important;
}
.totalPrice span {
    padding: 0 1px;
    font-size: 20px;
}
.startpay{
	margin-left: 10px;
}
}
a{
		color: #333;
	}
	a:hover,a:active{
		color: #333;
		text-decoration: underline;
	}
        </style>
	</head>

	<body>
		<nav class="breadcrumb">
		    <i class="Hui-iconfont">&#xe67f;</i> 库存管理 <span class="c-gray en">&gt;</span><a href="stock_checking">盘点管理</a> <span class="c-gray en">&gt;</span>录入
		    &nbsp;<a href="javascript:;" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
		    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		        <i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>
		<div id="wrapper" style="padding: 0 20px;">
				<div class="wrapper wrapper-content animated fadeIn">
					<div class="row">
							<div class="tabs-container weixin">
								<div class="tab-content" style="margin-top: 10px;">
									<div id="tab-pay">
											<div class="row">
												<div class="col-sm-12 micropay">
												    <form id="userInfoForm">
													<table class="table table-responsive">
														<tr>
															<td style="width: 180px;">
																<div class="input-query">
																	<input type="text" class="form-control input-sm" name="barcode" id="barcode" placeholder="条码"/>
																</div>
															</td>
															<td>
																<div class="input-query">
																	<input type="text" class="form-control input-sm" name="stockcode" id="stockcode" placeholder="货号"/>
																</div>
																<div class="input-query" style="width: 120px;">
																	<input type="text" class="form-control input-sm" name="size" id="size" placeholder="尺码"/>
																</div>
																<div class="input-query" style="width: 60px;">
																	<button type="button" class="btn btn-warning radius stockSubmit"  id="input_button">录入</button>
																</div>
															</td>						
														</tr>
													</table>
													</form>
													
													<!--显示内容主体表格-->
													<form id="stockInfoForm" onsubmit="return false;" style="margin-top: 10px;">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th style="width:5% !important;">序号</th>
																<th style="width:10% !important;">货号</th>
																<th style="width:15% !important;">名称</th>
																<th style="width:10% !important;">品牌</th>
																<th style="width:5% !important;">吊牌价</th>
																<th style="width:10% !important;">上市时间</th>
																<th style="width:10% !important;">条码</th>
																<th style="width:5% !important;" >尺码</th>
																<th style="width:5% !important;" >数量</th>
																<th style="width:5% !important;">操作</th>
															</tr>
														</thead>
														<tbody class="pay-content" id="form_pay_content">
									                         <?php if (!empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
										                         <?php
$_from = $_smarty_tpl->tpl_vars['rows']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
										                               <tr>
																			<td class="sort stockData"><span class="sort"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span>
																			<input type="hidden" name="put_goods_name[goods_id][]"  value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['goods_id'])) {
echo $_smarty_tpl->tpl_vars['val']->value['goods_id'];
}?>"/>
																			<input type="hidden" name="put_goods_name[stocks_sn][]"  value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['stock_code'])) {
echo $_smarty_tpl->tpl_vars['val']->value['stock_code'];
}?>"/>
																			<input type="hidden" name="put_goods_name[goods_name][]"  value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['goods_name'])) {
echo $_smarty_tpl->tpl_vars['val']->value['goods_name'];
}?>"/>
																			<input type="hidden" name="put_goods_name[brand_name][]"  value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['brand_name'])) {
echo $_smarty_tpl->tpl_vars['val']->value['brand_name'];
}?>"/>
																			<input type="hidden" name="put_goods_name[stock_price][]"  value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['goods_marketprice'])) {
echo $_smarty_tpl->tpl_vars['val']->value['goods_marketprice'];
}?>"/>
																			<input type="hidden" name="put_goods_name[goods_addtimes][]"  value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['goods_addtime'])) {
echo $_smarty_tpl->tpl_vars['val']->value['goods_addtime'];
}?>"/>
																			<input type="hidden" name="put_goods_name[stocks_bar_code][]"  value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['barcode'])) {
echo $_smarty_tpl->tpl_vars['val']->value['barcode'];
}?>"/>
																			<input type="hidden" name="put_goods_name[size][]"  value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['size'])) {
echo $_smarty_tpl->tpl_vars['val']->value['size'];
}?>"/>
																			<input type="hidden" name="put_goods_name[goods_ea_id][]"  value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['goods_ea_id'])) {
echo $_smarty_tpl->tpl_vars['val']->value['goods_ea_id'];
}?>"/>
																			</td>
																			<td class="stocks_sn"><?php if (!empty($_smarty_tpl->tpl_vars['val']->value['stock_code'])) {
echo $_smarty_tpl->tpl_vars['val']->value['stock_code'];
}?></td>
																			<td class="goods_name"><?php if (!empty($_smarty_tpl->tpl_vars['val']->value['goods_name'])) {
echo $_smarty_tpl->tpl_vars['val']->value['goods_name'];
}?></td>
																			<td class="brand_name"><?php if (!empty($_smarty_tpl->tpl_vars['val']->value['brand_name'])) {
echo $_smarty_tpl->tpl_vars['val']->value['brand_name'];
}?></td>
																			<td class="stocks_price"><?php if (!empty($_smarty_tpl->tpl_vars['val']->value['goods_marketprice'])) {
echo $_smarty_tpl->tpl_vars['val']->value['goods_marketprice'];
}?></td>
																			<td class="goods_addtimes"><?php if (!empty($_smarty_tpl->tpl_vars['val']->value['goods_addtime'])) {
echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['val']->value['goods_addtime']);
}?></td>
																			<td class="stocks_bar_code"><?php if (!empty($_smarty_tpl->tpl_vars['val']->value['barcode'])) {
echo $_smarty_tpl->tpl_vars['val']->value['barcode'];
}?></td>
																			<td class="size"><?php if (!empty($_smarty_tpl->tpl_vars['val']->value['size'])) {
echo $_smarty_tpl->tpl_vars['val']->value['size'];
}?></td>
																			<td class="col-xs-1 num"><input name="put_goods_name[num][]"  value="<?php if (!empty($_smarty_tpl->tpl_vars['val']->value['si_num'])) {
echo $_smarty_tpl->tpl_vars['val']->value['si_num'];
}?>" type="text" class="put_goods_name_form_control form-control input-sm"></td>
																			<td class="sort"><a href="javascript:;" onclick="delStock(this)">删除</a></td>
																		 </tr>
										                         <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
if ($__foreach_val_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_0_saved_key;
}
?>
                                                              <?php }?>
														</tbody>
													</table>
													</form>
												</div>
											</div>
									</div>
										
										<div class="bottom">
											<ul class="list-inline pull-right btn-paygroup" style="margin-right: 30px;">
													<li><button class="btn btn-pay" data-toggle="modal" style="background: #1bc096;" id="selectstock">保存</button></li>
													<li><button class="btn btn-pay" data-toggle="modal" style="background: red;" id="allreturn">清空</button></li>
											</ul>
										</div>
								</div>
							</div>
					</div>
				</div>
		</div>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		
		<?php echo '<script'; ?>
>
			
			$("#goback").click(function(){
				window.history.back();
			})
			
			function stockSort(){
				$('tbody.pay-content').find('tr').each(function(k,v){
					thisTd = $(this).find('td.stockData');
					thisTd.find('span.sort').text(k+1); 
				})
			}
		   /*输入货号尺码确定*/
		   $('.stockSubmit').click(function(){
		    	 var stock_code = $('#stockcode').val();
		    	 var stock_size = $('#size').val();
		    	 if(stock_code==''||stock_size==''){
		    		 swal({title:'',text:'货号和尺码不能为空', type:"error",timer:2000});return false;
		    	 }else{
		    		 check_goods(stock_code,stock_size);
		    	 }
		    	 return false;
		     })
		     
			function check_goods(stock_code,stock_size){
				$.ajax({
		       		type: "post",
		               url: "<?php echo base_url();?>
pay.php/alimppay/check_goods",
		               data: {stock_code:stock_code,size:stock_size},
		               dataType: "json",
		               success: function(data){
		               	if(data.state){
		               		stocks = data.data;
		               		appendHtml(stocks);
		               		$('#stockcode').val('');
		               		$('#size').val('');
		               	}else{
		               		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
		               	}
		               }
				})
			}
	
		   
		   function appendHtml(stocks){
			   console.log(stocks)
			    stock_k = $('.pay-content').find('tr').size()+1;
	       		user_name = '';
	       		if($('#userName').val()==''){
	       			user_name = $('#userTel').val();
	       		}else{
	       			user_name = $('#userName').val();
	       		}
	       		isHave = false;haveObj = [];
	       		$('tbody.pay-content').find('tr').each(function(){
	       			code = $(this).find('td.code').text();
	       			size = $(this).find('td.size').text();
	       			if(stocks.size==size&&stocks.stocks_sn==code){
	       				isHave = true;haveObj=$(this);
	       			}
	       		})
	       		if(isHave){
	       			oldNum = haveObj.find('td.num').find('input').val();
	       			oldNum = (oldNum=='')?1:oldNum;
	       			newNum = oldNum*1+1;
	       			haveObj.find('td.num').find('input').val(newNum);
	       			truePrice = haveObj.find('td.true_price').find('input').val();
	       			discount = haveObj.find('td.discount').find('input').val();
	       			totalPrice = number_format(truePrice*newNum,2);
	       			haveObj.find('td.num').find('input').val(newNum);
	       			haveObj.find('td.price_total').text(totalPrice);
	       			haveObj.find('td.stockData').find('input.stock_num').val(newNum);
	       			haveObj.find('td.stockData').find('input.stock_price_total').val(totalPrice);
	       			
	       		}else{
	       			if(stocks.stocks_bar_code==null || stocks.stocks_bar_code=='null'){
	       				stocks.stocks_bar_code='';
	       			}
	       			tr_str = '<tr>'+
							'<td class="sort stockData"><span class="sort">'+stock_k+'</span>'+
							'<input type="hidden" name="put_goods_name[goods_id][]"  value="'+stocks.goods_id+'"/>'+
							'<input type="hidden" name="put_goods_name[stocks_sn][]"  value="'+stocks.stocks_sn+'"/>'+
							'<input type="hidden" name="put_goods_name[goods_name][]"  value="'+stocks.goods_name+'"/>'+
							'<input type="hidden" name="put_goods_name[brand_name][]"  value="'+stocks.brand_name+'"/>'+
							'<input type="hidden" name="put_goods_name[stock_price][]"  value="'+stocks.stocks_price+'"/>'+
							'<input type="hidden" name="put_goods_name[goods_addtimes][]"  value="'+stocks.goods_addtime+'"/>'+
							'<input type="hidden" name="put_goods_name[stocks_bar_code][]"  value="'+stocks.stocks_bar_code+'"/>'+
							'<input type="hidden" name="put_goods_name[size][]"  value="'+stocks.size+'"/>'+
							'<input type="hidden" name="put_goods_name[goods_ea_id][]"  value="'+stocks.goods_ea_id+'"/>'+
							'</td>'+
							'<td class="stocks_sn">'+stocks.stocks_sn+'</td>'+
							'<td class="goods_name">'+stocks.goods_name+'</td>'+
							'<td class="brand_name">'+stocks.brand_name+'</td>'+
							'<td class="stocks_price">'+stocks.stocks_price+'</td>'+
							'<td class="goods_addtimes">'+getLocalTime(stocks.goods_addtime)+'</td>'+
							'<td class="stocks_bar_code">'+stocks.stocks_bar_code+'</td>'+
							'<td class="size">'+stocks.size+'</td>'+
							'<td class="col-xs-1 num"><input name="put_goods_name[num][]" type="text" class="put_goods_name_form_control form-control input-sm"></td>'+
							'<td class="sort"><a href="javascript:;" onclick="delStock(this)">删除</a></td>'+
						    '</tr>';
  			     $('.pay-content').append(tr_str);
  			     stockSort();
	       		}
		    }
		   
			function delStock(obj){
				$(obj).parents('tr').remove();
				stockSort();
			}	
		   
		    function getLocalTime(nS) {     
		       return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ");      
		    }     
		   
		    
		    //清空
		    $("#allreturn").click(function(){
		    	$("#form_pay_content").empty();
		    });
		    
		    
		    //提交数据
		    $("#selectstock").click(function(){
		    	 $.ajax({
		 	        type: "post",
		 	        dataType: "json",
		 	        url: "post_inventory_data?sia_id=<?php echo $_smarty_tpl->tpl_vars['sia_id']->value;?>
",
		 	        data: $('#stockInfoForm').serialize(),
		 	        success: function(data){
		 	        	if(data.state){
		 					  layer.msg(data.msg)
		 					 setTimeout('window.location.href="<?php echo base_url();?>
pay.php/stock/stock_checking";',2000);
		 		            }else{
		 		            	layer.msg(data.msg);
		 		            }
		 	        }
		 	   })
		    });
		    
		    var  A1 = $("#barcode"),A2 = $("#stockcode"),A3 = $("#size"),A4 = $("#input_button"),A5 = $("#selectstock"),A6 = $("#allreturn");

			   
			   $("table").delegate("#barcode","keydown",function(event){ 
				   if (event.keyCode == 13) {
					   if($("#barcode").val()){
						   check_barcode(this);
						   $("#barcode").val('');
					   }else{
						   $(A2).focus();
					   }
				   }
				}); 
			   
			   $("table").delegate("#stockcode","keydown",function(event){ 
				   if (event.keyCode == 13) {
					   $(A3).focus();
				   }
				}); 
			   $("table").delegate("#size","keydown",function(event){ 
				   if (event.keyCode == 13) {  
				   $(A4).focus();}
				}); 
			   $("body").delegate("#input_button","keydown",function(event){ 
				   if (event.keyCode == 13) {   
				   $(A5).focus();}
				}); 
			   $("body").delegate("#selectstock","keydown",function(event){ 
				   if (event.keyCode == 13) {   
				   $(A6).focus();}
				});
			   $("body").delegate("#allreturn","keydown",function(event){ 
				   if (event.keyCode == 13) {   
				   $(A1).focus();}
				});
			   
				function check_barcode(obj){
					barcode = $(obj).val();
					if(barcode){
						$.ajax({
			        		type: "post",
			                url: "check_barcode",
			                data: {barcode:barcode},
			                dataType: "json",
			                success: function(data){
			                	if(data.state){
			                		stocks = data.data;
			                		appendHtml(stocks);
			                	}else{
			                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
			                	}
			                }
						})
					}
					
				}
		<?php echo '</script'; ?>
>
		
	</body>

</html><?php }
}
