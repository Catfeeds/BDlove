<?php
/* Smarty version 3.1.29, created on 2017-06-14 16:22:17
  from "D:\www\yunjuke\application\pay\views\check_info.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5940f239607443_85826017',
  'file_dependency' => 
  array (
    '4f1545c2794897d82d6b19913c85b8aad13c5977' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\check_info.html',
      1 => 1497428353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/link.html' => 1,
    'file:lib/header.html' => 1,
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_5940f239607443_85826017 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '215785940f2394c3079_95369161';
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
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/link.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
css/select2.css" />
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/select2.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
/plugins/layer/layer.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src='http://localhost:8000/CLodopfuncs.js'><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 language="javascript" src="<?php echo PLUGIN;?>
/plugins/Lodop/LodopFuncs.js"><?php echo '</script'; ?>
>
			<style>
				tbody td {
					line-height: 29px !important;
				}
				
				.btn-width {
					width: 100px;
				}
				
				.clear {
					clear: both;
				}
				
				.total {
					margin-top: 20px;
				}
               tr.current{
	             background-color:#999999;  
		      }
				.total span {
					color: red;
					margin: 0 10px;
				}
				
				th,
				td {
					text-align: center;
				}
				
				@media (min-width: 768px) {
					.modal-dialog {
						min-width: 600px;
						max-width: 90%;
						margin: 200px auto;
					}
				}
				
				.selectarea {
					width: 200px;
				}
				
				.select2 {
					margin: 20px;
				}
			</style>
	</head>

	<body>
		<div id="wrapper">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<div class="row wrapper border-bottom white-bg page-heading">
				    
					<div class="col-lg-10">
					    <?php if (empty($_smarty_tpl->tpl_vars['row']->value)) {?>
					    <h2 class="pull-left">你还未设置盘点区域请先设置好区域！！！</h2>
					    <?php } else { ?>
						<h2 class="pull-left">区域切换:</h2>
<!-- 						<h2 class="pull-left"><?php if (isset($_smarty_tpl->tpl_vars['checkInfo']->value['sia_area_name'])) {
echo $_smarty_tpl->tpl_vars['checkInfo']->value['sia_area_name'];
}?></h2> -->
						<select id="e1" class="pull-left selectarea">
						  <?php
$_from = $_smarty_tpl->tpl_vars['row']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['sia_id'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['checkId']->value) && $_smarty_tpl->tpl_vars['checkId']->value == $_smarty_tpl->tpl_vars['v']->value['sia_id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['sia_area_name'];?>
</option>
							<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
						</select>
						<?php }?>
						<div class="clear"></div>
					</div>
					
				</div>
				<div class="wrapper wrapper-content animated" style="min-height: 400px;">
					<div style="width: 300px;">
						<input type="text" class="form-control" id="barcode" placeholder="输入条码" />
					</div>
					<table class="table table-bordered" style="margin-top: 20px;">
						<thead>
							<tr>
								<th>序号</th>
								<th>品牌</th>
								<th>商品名称</th>
								<th>条码</th>
								<th>货号</th>
								<th>尺码</th>
								<th>数量</th>
								<th>单价</th>
								<th>上市时间</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<!-- <tr>
								<td>1</td>
								<td>nike</td>
								<td>毛毛虫</td>
								<td>6938828530086</td>
								<td>CD201305001</td>
								<td>36</td>
								<td>200</td>
								<td>666</td>
								<td>2017-9-9</td>
								<td><button class="btn btn-primary btn-sm delete">删除</button></td>
							</tr> -->
							<tr class="addRowl" data-sort="0">
								<td class="sort">1</td>
								<td></td>
								<td></td>
								<td></td>
								<td><input type="text" class="form-control input-sm addStock_sn" value="" placeholder="货号"></td>
								<td><input type="text" class="form-control input-sm addSize" value="" placeholder="尺码"></td>
								<td></td>
								<td></td>
								<td></td>
								<td><button class="btn btn-primary btn-sm addStock">新增</button></td>
							</tr>
						</tbody>
					</table>

				</div>
				<!--多条商品弹出框-->
										<div class="modal fade" id="selectstock" tabindex="-1" role="dialog" aria-labelledby="selectstock" aria-hidden="true">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            
										            <div class="modal-body row">
										            	
										            	<table class="table table-bordered" style="margin-top: 20px;">
										            		<thead>
										            			<tr>
										            			    <th>序号</th>
										            			    <th>品牌</th>
										            				<th>商品名称</th>
										            				<th>条码</th>
										            				<th>货号</th>
										            				<th>尺码</th>
										            				<th>价格</th>
										            			</tr>
										            		</thead>
										            		<tbody>
										            			
										            		</tbody>
										            	</table>
										            	
										            </div>
										            <div class="modal-footer">
										                <button type="button" class="btn btn-primary btn-pay" onclick="selectUserSure()" data-dismiss="modal" aria-hidden="true">确定</button>
										            </div>
										        </div><!-- /.modal-content -->
										    </div><!-- /.modal -->
										</div>
				<div class="row">
					<div class="total col-xs-6">
						<h1>合计：<span id="totalNum">0</span>(件)<span id="totalMoney">0.00</span>(元)</h1></div>
					<div class="col-xs-6" style="margin-top: 40px;">
						<div class="btn-width pull-right"><button class="btn btn-primary" onclick="del()">全部删除</button></div>
						<div class="btn-width pull-right"><button class="btn btn-primary" data-toggle="modal" onclick="insert()">确认添加</button></div>
					</div>
				</div>
				<!--添加成功提示弹出框-->
				<div class="modal fade" id="addsuccess" tabindex="-1" role="dialog" aria-labelledby="selectmember" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header" style="background: #2f4050;color: #fff;height: 50px;">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
								<h3 class="modal-title text-center"></h3>
							</div>
							<div class="modal-body text-center">
								<h1>添加成功！</h1>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">确定</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal -->
				</div>
		</div>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<?php echo '<script'; ?>
 type="text/javascript">
				$(document).ready(function() {
					$("#e1").select2();
				});
				
				var key_sort = true;
				$(".wrapper").delegate("#barcode","keydown",function(event){ 
				   if (event.keyCode == 13) {
					   key_sort = false;
			        	check_barcode();
			        	//$(this).val('');
			        }
				});
				$('#barcode').change(function(){
					if(key_sort){
						check_barcode();//$(this).val('');
					}
				})
				$(".wrapper").delegate("td.amount input","change",function(event){ 
					total_num();
				});
				$(".wrapper").delegate("button.addStock","click",function(event){ 
					stocks_sn = $('.addStock_sn').val();
					size = $('.addSize').val();
					if(!stocks_sn){
						swal({title:'',text:'请输入货号', type:"error",timer:2000});return false;
					}
					if(!size){
						swal({title:'',text:'请输入尺码', type:"error",timer:2000});return false;
					}
					check_barcode(stocks_sn,size);
					
				});
				$('#e1').change(function(){
					$('.wrapper').find('tbody').html('<tr class="addRowl" data-sort="0">'+
							'<td class="sort">1</td>'+
							'<td></td>'+
							'<td></td>'+
							'<td></td>'+
							'<td><input type="text" class="form-control input-sm addStock_sn" value="" placeholder="货号"></td>'+
							'<td><input type="text" class="form-control input-sm addSize" value="" placeholder="尺码"></td>'+
							'<td></td>'+
							'<td></td>'+
							'<td></td>'+
							'<td><button class="btn btn-primary btn-sm addStock">新增</button></td>'+
						'</tr>')
				})
				$(".wrapper").delegate("button.deleteStock","click",function(event){ 
					$(this).parents('tr').remove();
					total_num();
					resort();
				});
				function check_barcode(stocks_sn,size){
					var barcode = $('#barcode').val();
					var region = $('#e1').val();
					if(region&&(barcode||(stocks_sn&&size))){
						$.ajax({
			        		type: "post",
			                url: "check_barcode",
			                data: {barcode:barcode,stocks_sn:stocks_sn,size:size},
			                dataType: "json",
			                success: function(data){
			                	if(data.state){
			                		stocks = data.data;
			                		if(!stocks.stocks_sn){
			                			len = stocks.length;
			                			if(len>1){
				                				/* swal({   title: "",   
				       						     text: "符合条件的数据有"+len+"条,请选择",   
				       						     type: "warning",   
				       						     showCancelButton: true,   
				       						     confirmButtonColor: "#DD6B55",   
				       						     cancelButtonText: "取消",   
				       						     confirmButtonText: "确认",   
				       						     closeOnConfirm: false, 
				       						     timer: 1000, 
				       						  }, 
				       					      function(){ 
				       							  
				       						  }); */
				       						  
			       							swal({title:"",text:"符合条件的数据有"+len+"条,请选择",type:"success",timer:2000});  
			       							$('#selectstock').modal('show');
			    	                		hData = data.data;
			    	        				$('#selectstock').on('shown.bs.modal', function () {
			    	        					str = '';
			    	        					$.each(stocks,function(k,v){
			    	        						var dataStr = JSON.stringify(v).replace(/"/g, "'");
			    	        						str+='<tr data="'+dataStr+'">'+
							            			    '<th>'+(k+1)+'</th>'+
							            			    '<th>'+v.brand_name+'</th>'+
							            				'<th>'+v.goods_name+'</th>'+
							            				'<th>'+v.stocks_bar_code+'</th>'+
							            				'<th>'+v.stocks_sn+'</th>'+
							            				'<th>'+v.size+'</th>'+
							            				'<th>'+v.stocks_price+'</th>'+
							            			'</tr>';
			    	        					})
			    	        					$('#selectstock').find('tbody').html(str);
			    	        				})
				       					    return false; 
			                			}else{
			                				stocks = stocks[0];	
			                			}
			                		}
			                		appendto(stocks);
			                		$('#barcode').val('');
			                		$('.addStock_sn').val('');
			    					$('.addSize').val('');
			                	}else{
			                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
			                	}
			                }
						})
					}
				}
				
				$("#selectstock").delegate("tbody tr","click",function(){ 
					$(this).addClass('current');
					$(this).siblings('tr').removeClass('current');
				})
				function selectUserSure(){
					tVal = $('#selectstock').find('tr.current').attr('data');
					var tVal = tVal.replace(/'/g, '"');
					tVal = JSON.parse(tVal); 
					appendto(tVal);
            		$('#barcode').val('');
            		$('.addStock_sn').val('');
					$('.addSize').val('');
				}
				function resort(){
					var sort=1;
					$('tr.stocks').each(function(k,v){
						sort++;
						$(this).find('td:first').text(k+1);
					})
					$('tr.addRowl').find('td.sort').text(sort);
					$('tr.addRowl').attr('data-sort',sort-1);
				}
				function appendto(stocks){
					amount = 0;checkRe = false;
					$('tr.stocks').each(function(){
						stocks_sn = $(this).find('.stocks_sn').text();
						size = $(this).find('.size').text();
						num = $(this).find('.amount input').val();
						if(stocks.stocks_sn==stocks_sn&&stocks.size==size){
							//console.log(num);
							$(this).find('.amount input').val(parseInt(num)+1);
							checkRe = true;
						}
					})
					if(!checkRe){
						var sort = $('tr.addRowl').attr('data-sort');
						sort = parseInt(sort)+1;
						str = '<tr class="stocks" data-id="'+stocks.goods_id+'">'+
							'<td>'+sort+'</td>'+
							'<td>'+stocks.brand_name+'</td>'+
							'<td>'+stocks.goods_name+'</td>'+
							'<td class="barcode">'+stocks.stocks_bar_code+'</td>'+
							'<td class="stocks_sn">'+stocks.stocks_sn+'</td>'+
							'<td class="size">'+stocks.size+'</td>'+
							'<td class="amount"><input type="text" name="stock[amount][]" value="1"></td>'+
							'<td class="stocks_price">'+stocks.stocks_price+'</td>'+
							'<td>'+stocks.adddate+'</td>'+
							'<td><button class="btn btn-primary btn-sm deleteStock">删除</button></td>'+
						'</tr>';
						$('tr.addRowl').find('td.sort').text(sort+1);
						$('tr.addRowl').attr('data-sort',sort);
						$('tr.addRowl').before(str);
					}
					total_num();
				}
				function total_num(){
					amount = 0;total = 0;
					$('tr.stocks').each(function(){
						num = $(this).find('.amount input').val();
						num = number_null(num);
						price = $(this).find('.stocks_price').text();
						price = number_null(price);
						amount +=parseInt(num);
						total +=parseFloat(price)*parseInt(num);
					})
					$('#totalNum').text(amount);
					$('#totalMoney').text(number_format(total,2));
				}
				function del(){
					layer.confirm('确认删除全部数据？',{
						  btn: ['确认','取消'] //按钮
					}, function(){
						layer.closeAll();
						$('tr.stocks').remove();
						total_num();
						resort();
					})
					
				}
				function insert(){
					if($('tr.stocks').length==0){
						swal({title:'',text:'请先添加盘点数据', type:"error",timer:2000});return false;
					}
					var postData = [];
					$('tr.stocks').each(function(){
						thisData = {
							'goods_id':$(this).attr('data-id'),
							'barcode':$(this).find('.barcode').text(),
							'stocks_sn':$(this).find('.stocks_sn').text(),
							'size':$(this).find('.size').text(),
							'amount':$(this).find('.amount input').val(),
						};
						postData.push(thisData);
					})
					var region = $('#e1').val();
					$.ajax({
			        		type: "post",
			                url: "addRegionStocks",
			                data: {data:postData,region:region},
			                dataType: "json",
			                success: function(data){
			                	if(data.state){
			                		swal({title:'',text:data.msg, type:"success",timer:2000});
			                		/* setTimeout(function(){
			                			 window.location.reload();
			                		    },2000); */
			                		
			                	}else{
			                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
			                	}
			                }
						})
				}
			<?php echo '</script'; ?>
>

	</body>

</html><?php }
}
