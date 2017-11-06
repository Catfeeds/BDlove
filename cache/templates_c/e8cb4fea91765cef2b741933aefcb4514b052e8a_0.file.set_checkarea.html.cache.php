<?php
/* Smarty version 3.1.29, created on 2017-06-07 18:22:47
  from "D:\www\yunjuke\application\pay\views\set_checkarea.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5937d3f7ba8ab8_34258630',
  'file_dependency' => 
  array (
    'e8cb4fea91765cef2b741933aefcb4514b052e8a' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\set_checkarea.html',
      1 => 1496821321,
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
function content_5937d3f7ba8ab8_34258630 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '299715937d3f7a29d59_95493496';
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
				
				.checkbox {
					margin-top: 0px !important;
					margin-bottom: 0px !important;
				}
				
				tbody label {
					padding-top: 5px;
				}
				
				.operationwidth {
					width: 650px;
				}
				
				@media screen and (max-width: 1250px) {
					.operationwidth {
						width: 450px;
					}
					.operationwidth .btn-width {
						width: 80px;
					}
				}
				
				.total {
					margin-top: 20px;
				}
				
				.total span {
					color: red;
					margin: 0 10px;
				}
				.modal-title span{
					font-size: 15px;
				}
				th,td{
					text-align: center;
				}
				@media (min-width: 768px){
				.modal-dialog {
				    width: 700px;
				    margin: 30px auto;
				}
				}
			</style>
	</head>

	<body>
		<div id="wrapper">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<div class="row wrapper border-bottom white-bg page-heading">
					<div class="col-lg-10">
						<h2>盘点区域</h2>
					</div>
				</div>
				<div class="wrapper wrapper-content animated" style="min-height: 400px;">
					<div>
						<div class="btn-width pull-left"><a class="btn btn-info btn-block" id="addRegion">新增+</a></div>
						<div class="btn-width pull-left" style="margin-left: 30px;"><a class="btn btn-info btn-block" data-toggle="modal" data-target="#history">历史记录</a></div>
						<div class="clear"></div>
					</div>
					<table class="table table-bordered" style="margin-top: 20px;">
						<thead>
							<tr>
								<th>
									<div class="checkbox selectAll">
										<label>
								          <input type="checkbox">全选
								        </label>
									</div>
								</th>
								<th>序号</th>
								<th>区域名称</th>
								<th>数量</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody class="region-content">
						<?php if (empty($_smarty_tpl->tpl_vars['row']->value)) {?>
						<tr style="font-size:20px;color:red;"><td colspan="5">还没有设置区域，请先添加区域！</td></tr>
						<?php } else { ?>
						<?php
$_from = $_smarty_tpl->tpl_vars['row']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
							<tr class="region" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['sia_id'];?>
">
								<td>
									<div class="checkbox">
										<label>
								          <input type="checkbox">
								        </label>
									</div>
									<td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
									<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['sia_area_name'];?>
" class="form-control region_name" /></td>
									<td class="num"><?php echo $_smarty_tpl->tpl_vars['v']->value['amount'];?>
</td>
									<td class="operationwidth">
										<div class="col-xs-3">
											<div class="btn-width"><button class="btn btn-info btn-sm btn-block lookdetail" data-toggle="modal" onclick="seeAll(this)" >查看明细</button></div>
										</div>
										<div class="col-xs-3">
											<div class="btn-width"><button class="btn btn-info btn-sm btn-block update">更改名称</button></div>
										</div>
										<div class="col-xs-3">
											<div class="btn-width"><button class="btn btn-info btn-sm btn-block delete">删除</button></div>
										</div>
										<div class="col-xs-3">
											<div class="btn-width"><button class="btn btn-info btn-sm btn-block checkarea">盘点</button></div>
										</div>

									</td>
							</tr>
							<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
							<?php }?>
						</tbody>
					</table>
					<!--历史记录弹出框-->
					<div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="selectmember" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header" style="background: #2f4050;color: #fff;">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
									<h2 class="modal-title text-center">盘点历史记录<span>（最近三次）</span></h2>
								</div>
								<div class="modal-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>序号</th>
												<th>盘点日期</th>
												<th>操作</th>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>2015-2-20</td>
												<td style="width: 250px;">
													<div class="col-xs-6 text-center"><a href="javascript:;" class="btn btn-primary">导出</a></div>
													<div class="col-xs-6 text-center"><a href="javascript:;" class="btn btn-primary" data-toggle="modal" data-target="#confirmreturn">还原</a></div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>2015-2-20</td>
												<td style="width: 300px;">
													<div class="col-xs-6 text-center"><a href="javascript:;" class="btn btn-primary">导出</a></div>
													<div class="col-xs-6 text-center"><a href="javascript:;" class="btn btn-primary">还原</a></div>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>2015-2-20</td>
												<td style="width: 250px;">
													<div class="col-xs-6 text-center"><a href="javascript:;" class="btn btn-primary">导出</a></div>
													<div class="col-xs-6 text-center"><a href="javascript:;" class="btn btn-primary">还原</a></div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal -->
					</div>
					
					<!--查看明细弹出框-->
					<div class="modal fade" id="lookdetail" tabindex="-1" role="dialog" aria-labelledby="selectmember" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header" style="background: #2f4050;color: #fff;">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
									<h2 class="modal-title text-center">鞋区（展台）盘点明细</h2>
								</div>
								<div class="modal-body">
									<table class="table table-bordered">
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
										</thead>
										<tbody>
											
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal -->
					</div>
					
					<!--还原确认弹出框-->
					<div class="modal fade" id="confirmreturn" tabindex="-1" role="dialog" aria-labelledby="selectmember" aria-hidden="true">
						<div class="modal-dialog" style="width: 300px;margin-top: 200px;">
							<div class="modal-content">
								<div class="modal-header" style="background: #2f4050;color: #fff;">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
									<h2 class="modal-title text-center"></h2>
								</div>
								<div class="modal-body text-center">
									<h1>确认还原？</h1>
								</div>
								<div class="modal-footer">
									<div class="pull-left"><button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">否</button></div>
									<div class="pull-right"><button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">是</button></div>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal -->
					</div>
				</div>
				<div class="row">
					<div class="total col-xs-6">
						<h1>合计：<span id="totalNum"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>(件)</h1></div>
					<div class="col-xs-6" style="margin-top: 40px;">
						<div class="btn-width pull-right"><button class="btn btn-primary" onclick="delAll()">全部删除</button></div>
						<div class="btn-width pull-right"><button class="btn btn-primary" onclick="amountSure()">确认库存</button></div>
						<div class="btn-width pull-right"><button class="btn btn-primary" onclick="amountExport()">导出库存</button></div>
					</div>
				</div>
		</div>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<?php echo '<script'; ?>
 type="text/javascript">
			function seeAll(obj){
				var region_id = $(obj).parents('tr').attr('data-id');
				if(!region_id){
					swal({title:'',text:'此区域数据不存在', type:"error",timer:2000});return false;
				}
				
				 
					 $.ajax({
			        		type: "post",
			                url: "see_region",
			                data: {id:region_id},
			                dataType: "json",
			                success: function(data){
			                	if(data.state){
			                		$('#lookdetail').modal('show');
			        				$('#lookdetail').find('h2.modal-title').text($(obj).parents('tr').find('.region_name').val()+'盘点明细');
			                		$('#lookdetail').on('shown.bs.modal', function () {
			                		str='';
			                		$.each(data.data,function(k,v){
			                			price = !v.price?v.stocks_price:v.price;
			                			str+='<tr>'+
											'<td>'+(k+1)+'</td>'+
											'<td>'+v.brand_name+'</td>'+
											'<td>'+v.goods_name+'</td>'+
											'<td>'+v.barcode+'</td>'+
											'<td>'+v.stock_code+'</td>'+
											'<td>'+v.size+'</td>'+
											'<td>'+v.si_num+'</td>'+
											'<td>'+price+'</td>'+
											'<td>'+v.date+'</td>'+
										'</tr>';
			                		})
			                		$('#lookdetail').find('tbody').html(str);
			                		})
			                	}else{
			                		swal({title:'',text:data.msg, type:"error",timer:2000});
			                		$('#lookdetail').modal('hide');
			                		return false;
			                	}
			                }
						})
				 
			}
			 
			function contentLoad(){
				$('.region-content').load('region_list',function(){
					
				})
			}
			$('#addRegion').click(function(){
				var trNum = $('tr.region').length;
				trStr = '<tr class="region">'+
					'<td>'+
				'<div class="checkbox">'+
					'<label>'+
			          '<input type="checkbox">'+
			        '</label>'+
				'</div>'+
				'<td>'+(trNum+1)+'</td>'+
				'<td><input type="text" value="区域A" class="form-control region_name" /></td>'+
				'<td class="num"></td>'+
				'<td class="operationwidth">'+
					'<div class="col-xs-3">'+
						'<div class="btn-width"><button class="btn btn-info btn-sm btn-block lookdetail" data-toggle="modal" onclick="seeAll(this)"  >查看明细</button></div>'+
					'</div>'+
					'<div class="col-xs-3">'+
						'<div class="btn-width"><button class="btn btn-info btn-sm btn-block update">确认更改</button></div>'+
					'</div>'+
					'<div class="col-xs-3">'+
						'<div class="btn-width"><button class="btn btn-info btn-sm btn-block delete">删除</button></div>'+
					'</div>'+
					'<div class="col-xs-3">'+
						'<div class="btn-width"><button class="btn btn-info btn-sm btn-block checkarea">盘点</button></div>'+
					'</div>'+

				'</td>'+
		'</tr>';
				if(trNum){
					$('.region-content').append(trStr);
				}else{
					$('.region-content').html(trStr);
				}
			})
			$("table").delegate("button.checkarea","click",function(){ 
				id = $(this).parents('tr').attr('data-id');
				if(id){
					window.location.href="stock_check?region_id="+id;
				}else{
					swal({title:'',text:'该区域还没有加入到数据库请先确认修改再盘点！', type:"error",timer:5000});
				}
			})
			$("table").delegate("button.delete","click",function(){ 
				id = $(this).parents('tr').attr('data-id');
				oldNum = $('#totalNum').text();
				delNum = $(this).parents('tr').find('.num').text();
				oldNum = number_null(oldNum);
				delNum = number_null(delNum);
				newNum = parseInt(oldNum)-parseInt(delNum);
				
				if(id){
					layer.confirm('确认删除这个区域及其盘点数据？',{
						  btn: ['确认','取消'] //按钮
					}, function(){
						layer.closeAll();
						$(this).parents('tr').remove();
						del(id,newNum);
					})
				}else{
					$(this).parents('tr').remove();
				}
			})
			function del(id,newNum){
				$.ajax({
	        		type: "post",
	                url: "del_region",
	                data: {id:id},
	                dataType: "json",
	                success: function(data){
	                	if(data.state){
	                		layer.closeAll();
	                		swal({title:'',text:data.msg, type:"success",timer:2000});
	                		$('#totalNum').text(newNum);
	                		contentLoad();
	                		return false;
	                	}else{
	                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
	                	}
	                }
				})
			}
			$("table").delegate("button.update","click",function(){ 
				id = $(this).parents('tr').attr('data-id');
				name = $(this).parents('tr').find('input.region_name').val();
				if(name==''){
					swal({title:'',text:'请先输入区域名称', type:"error",timer:2000});return false;
				}
				$.ajax({
	        		type: "post",
	                url: "edit_region",
	                data: {id:id,name:name},
	                dataType: "json",
	                success: function(data){
	                	if(data.state){
	                		swal({title:'',text:data.msg, type:"success",timer:2000});
	                		contentLoad();
	                		return false;
	                	}else{
	                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
	                	}
	                }
				})
			})
			$('.selectAll').click(function(){
				if($(this).find('input[type=checkbox]').is(':checked')){
					//$(this).find('input[type=checkbox]').attr('checked',false);
					$('.region-content').find('input[type=checkbox]').prop('checked',true);
				}else{
					//$(this).find('input[type=checkbox]').attr('checked',true);
					$('.region-content').find('input[type=checkbox]').prop('checked',false);
				}
				
			})
			function delAll(){
				ids = [];
				num = 0;oldNum = $('#totalNum').text();
				oldNum = parseInt(number_null(oldNum));
				$('.region-content').find('input[type=checkbox]:checked').each(function(){
					if($(this).parents('tr').attr('data-id')){
						ids.push($(this).parents('tr').attr('data-id'));
						var tnum = $(this).parents('tr').find('.num').text();
						num += parseInt(number_null(tnum));
					}
				})
				idlen = ids.length;
				ids = ids.join(',');
				newNum = oldNum-num;
				
				if(idlen){
					sttr = '确认删除这'+idlen+'个区域及其盘点数据吗？';
				}else{
					sttr = '确认删除所有区域及其盘点数据吗？'
				}
				layer.confirm(sttr,{
					  btn: ['确认','取消'] //按钮
				}, function(){
					del(ids,newNum);
				})
			}
			function amountSure(){
				$.ajax({
	        		type: "post",
	                url: "amountSure",
	                data: '',
	                dataType: "json",
	                beforeSend: function (xhr) {
//                      layer.closeAll();
                      layer.msg('库存录入中请稍后...',{time:0});
                    },
	                success: function(data){
	                	layer.closeAll();
                        
	                	if(data.state){
	                		swal({title:'',text:data.msg, type:"success",timer:2000});
	                		contentLoad();
	                		return false;
	                	}else{
	                		swal({title:'',text:data.msg, type:"error",timer:2000});return false;
	                	}
	                }
				})
			}
			function amountExport(){
				ids = [];
				$('.region-content').find('input[type=checkbox]:checked').each(function(){
					if($(this).parents('tr').attr('data-id')){
						ids.push($(this).parents('tr').attr('data-id'));
					}
				})
				idlen = ids.length;
				ids = ids.join(',');
				$.ajax({
	        		type: "post",
	                url: "export_region",
	                data: {id:ids},
	                dataType: "json",
	                success: function(data){
	                	window.location.href=data;
	                }
				})
			}
			<?php echo '</script'; ?>
>

	</body>

</html><?php }
}
