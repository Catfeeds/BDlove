<?php
/* Smarty version 3.1.29, created on 2017-08-04 15:11:44
  from "D:\www\yunjuke\application\admin\views\store_area_group.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841e30b4bd78_10722069',
  'file_dependency' => 
  array (
    '43dd8fed441973465fed748f4e263eac9f05f0d1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_area_group.html',
      1 => 1501567796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59841e30b4bd78_10722069 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1866959841e30a32936_15747111';
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
	<div class="fixed-bar">
		<div class="item-title">
			<div class="subject">
				<h3>区域分组管理</h3>
				<h5>设置区域分组名称</h5>
			</div>
			<ul class="tab-base nc-row">
			    <li><a  href="store_area_setting"><span>功能设置</span></a></li>
				<li><a href="store_area_edit"><span>编辑门店区域</span></a></li>
				<li><a class="current"><span>区域分组管理</span></a></li>
			</ul>
		</div>
	</div>
	  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>可新增，删除或编辑区域分组名称。</li>
    </ul>
  </div>
	 <div id="flexigrid">
            </div>



</div>
	<?php echo '<script'; ?>
>
$(function(){

	$("#flexigrid").flexigrid({
		url: 'get_store_area_group',
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
			{display: '所属区域分组', name : 'area', width : 250, sortable : true, align: 'center'},
			{display: '区域门店数量', name : 'area_num', width : 150, sortable : true, align: 'left'},
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>新增区域分组', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
			
		],
		searchitems : [
			{display: '分组名称', name : 'agp_name'},
		],
		title: '区域分组列表'
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
    	var content = '<div class="pt-10 pb-10 pl-30 pr-30 ">'+
    	'<form action="add_brand" id="form1" name="form1" method="POST">'+
    	'<table class="table"><tbody><tr> <td class="text-l f-14" style="width: 30%;">'+
    	'区域分组名称：</td><td class="text-l">'+
    	'<input type="text" class="input-text" id="group_name" name="group_name" style="width: 220px;height:28px;">'+
    	'<span class="err"></span></td> </tr></tbody></table></form></div>';
    	layer.open({
            type: 1,
            btn: ['确认', '取消'],
            title: '<b>添加分组</b>',
            skin: 'layui-layer-rim', //加上边框
            area: ['520px', 'auto'], //宽高
            content: content,
            yes: function(index, layero){
            	if($('#group_name').val()==''){
            		layer.msg('请填写分组名称');return false;
            	}
            	var form_data = $("#form1").serialize();
            	$.ajax({
        			type: "post",
        	        url: "store_area_group_add",
        	        data: form_data,
        	        dataType: "json",
        	        success: function(data){
					if(data.state=='403'){
					    login_ajax('shopadmin',data);
					}else
        	        	if(data.state){
        	        		layer.close(index);
        					layer.msg('添加成功，页面刷新中！');
        					$("#flexigrid").flexReload();
        	        	}else{
        	        		layer.msg(data.msg);
        	        	}
        	        }
        		})
            },no:function(){}
    	})
    }
}
	
});
function fg_bj(data){
	var content = '<div class="pt-10 pb-10 pl-30 pr-30 ">'+
	'<form action="add_brand" id="form1" name="form1" method="POST">'+
	'<table class="table"><tbody><tr> <td class="text-l f-14" style="width: 30%;">'+
	'区域分组名称：</td><td class="text-l">'+
	'<input type="text" class="input-text" id="group_name" name="group_name" value="'+data.name+'" style="width: 220px;height:28px;">'+
	'<input type="hidden" class="input-text" id="group_id" value="'+data.id+'" name="group_id">'+
	'<span class="err"></span></td> </tr></tbody></table></form></div>';
	layer.open({
        type: 1,
        btn: ['确认', '取消'],
        title: '<b>修改分组</b>',
        skin: 'layui-layer-rim', //加上边框
        area: ['520px', 'auto'], //宽高
        content: content,
        yes: function(index, layero){
        	if($('#group_name').val()==''){
        		layer.msg('请填写分组名称');return false;
        	}
        	var form_data = $("#form1").serialize();
        	$.ajax({
    			type: "post",
    	        url: "store_area_group_add",
    	        data: form_data,
    	        dataType: "json",
    	        success: function(data){
				if(data.state=='403'){
				    login_ajax('shopadmin',data);
				}else
    	        	if(data.state){
    	        		layer.close(index);
    					layer.msg('添加成功，页面刷新中！');
    					$("#flexigrid").flexReload();
    	        	}else{
    	        		layer.msg(data.msg);return false;
    	        	}
    	        }
    		})
        },no:function(){}
	})
}
function fg_delete(data){
	layer.confirm('确认删除'+data.name+'吗？', {
		  btn: ['确认','取消'] //按钮
		}, function(){
			$.ajax({
		        type: "post",
		        dataType: "json",
		        url: "store_area_group_del",
		        data: "id="+data.id,
		        success: function(data){
		            //alert(123);
					if(data.state=='403'){
							    login_ajax('shopadmin',data);
							}else
		            if (data.state){
		            	layer.msg(data.msg);
		                $("#flexigrid").flexReload();
		            } else {
		            	layer.msg(data.msg);
		            }
		        }
		    });
		});
}
<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
