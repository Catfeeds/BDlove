<?php
/* Smarty version 3.1.29, created on 2017-08-21 16:10:31
  from "D:\www\yunjuke\application\admin\views\store_decoration.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_599a9577478163_60190170',
  'file_dependency' => 
  array (
    'd1869391c73591ebf857ab85f259eeb078a580c9' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_decoration.html',
      1 => 1501559071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_599a9577478163_60190170 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '26773599a95773d01c1_52984926';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>

		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<div class="subject">
						<h3>店铺微商城装修</h3>
						<h5>设计装修店铺微商城的版式</h5>
					</div>
					<ul class="tab-base nc-row">
						<li>
							<a class="current">门店列表</a>
						</li>
						<li>
							<a href="store_decoration_template.html">装修模版管理</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li>查看门店是否启用了模板</li>
				</ul>
		     </div>
            <div id="flexigrid">
            </div>
            
	</div>
	
	<?php echo '<script'; ?>
>
$(function(){

	$("#flexigrid").flexigrid({
		url: 'get_store_decoration',
		dataType : 'xml',
		colModel : [
			{display: '门店Logo', name : 'operation', width : 200, sortable : false, align: 'center', className: 'handle-s'},
			{display: '门店名称', name : 'member_name', width : 400, sortable : true, align: 'center'},
			{display: '使用中的模版', name : 'name', width : 300, sortable : true, align: 'left'},
			
		],
	/* 	buttons : [
			{display: '<i class="fa fa-plus"></i>批量设置装修模版', name : 'edit', bclass : 'edit', title : '批量设置装修模版', onpress : fg_operate },
		
		], */
		searchitems : [
			{display: '装修模版', name : 'sdt_name'},
			{display: '门店名称', name : 'store_name'}
		],
		title: '门店列表'
	});
	function fg_operate(name, grid) {
	    if (name == 'edit') {
	        if($('.trSelected',grid).length>0){
	            var itemlist = new Array();
	            $('.trSelected',grid).each(function(){
	            	itemlist.push($(this).attr('data-id'));
	            });
	            fg_edit(itemlist);
	        }else{
	            return false;
	        }
	    }
	}

});



//更换模板
function fg_edit(id){
	if(typeof(id)=='object'){
		var size = id.length;
		id = id.join(',');
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	//console.log(typeof(id))
}
<?php echo '</script'; ?>
>
			<div id="goTop">
				<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
				<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
			</div>
	</body>

	</html><?php }
}
