<?php
/* Smarty version 3.1.29, created on 2017-08-21 16:10:49
  from "D:\www\yunjuke\application\admin\views\store_decoration_template.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_599a95894e1ad6_57610837',
  'file_dependency' => 
  array (
    'eb7079924c5830c75d88159e49237bddb07244d1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_decoration_template.html',
      1 => 1501581794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_599a95894e1ad6_57610837 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '22508599a958942a132_83744718';
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
							<a href="store_decoration.html">门店列表</a>
						</li>
						<li>
							<a  class="current">装修模版管理</a>
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
					<li>可新增，删除或编辑模板内容</li>
				</ul>
		     </div>
            <div id="flexigrid">
            </div>
	</div>
	<?php echo '<script'; ?>
>
$(function(){

	$("#flexigrid").flexigrid({
		url: 'get_store_decoration_template',
		colModel : [
			{display: '操作', name : 'operation', width : 200, sortable : false, align: 'center', className: 'handle-s'},
			{display: '创建者', name : 'member_name', width : 400, sortable : true, align: 'left'},
			{display: '模版名称', name : 'member_name', width : 400, sortable : true, align: 'left'},
			{display: '使用门店数', name : 'name', width : 300, sortable : true, align: 'left'},
			
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>批量删除', name : 'delete', bclass : 'delete', title : '批量删除', onpress : fg_operate },
			{display: '<i class="fa fa-plus"></i>新增模版', name : 'add', bclass : 'add', title : '新增模版', onpress : fg_operate },
		
		],
		
		title: '装修模版列表'
	});
	function fg_operate(name, grid) {
    if (name == 'delete') {
        if($('.trSelected',grid).length>0){
            var itemlist = new Array();
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
            fg_delete(itemlist);
        }else{
            return false;
        }
    }else if (name == 'add') {
    	window.location.href="store_decoration_add";
    }
}
});


//编辑
function fg_edit(id){
	window.location.href="store_decoration_edit?id="+id;
}
//删除
function fg_delete(id,name){
	var stname = '';
	if(typeof(id)=='object'){
		var size = id.length;
		stname = '这'+size+'个模板';
		id = id.join(',');
	}else{
		stname = name;
	}
	layer.confirm('确认删除'+stname+'吗？',
	   {btn: ['确认','取消']}, 
	   function(){
		   $.ajax({
		        type: "post",
		        dataType: "json",
		        url: "store_decoration_del",
		        data: "id="+id,
		        success: function(data){
				  if(data.state=='403'){
			           login_ajax('shopadmin');
		            }else{
		            	layer.msg(data.msg);
		            	$("#flexigrid").flexReload();
		            }
		        }
		   })
	   }
	)
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
