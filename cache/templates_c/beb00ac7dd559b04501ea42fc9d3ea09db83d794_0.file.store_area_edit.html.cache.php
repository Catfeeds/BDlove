<?php
/* Smarty version 3.1.29, created on 2017-08-04 15:11:38
  from "D:\www\yunjuke\application\admin\views\store_area_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841e2ae7edc5_42619787',
  'file_dependency' => 
  array (
    'beb00ac7dd559b04501ea42fc9d3ea09db83d794' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_area_edit.html',
      1 => 1501830692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59841e2ae7edc5_42619787 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2331959841e2ae15637_21957677';
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
				<h3>门店区域设置</h3>
				<h5>设置门店的区域分组</h5>
			</div>
			<ul class="tab-base nc-row">
			    <li><a href="store_area_setting"><span>功能设置</span></a></li>
				<li><a class="current"><span>编辑门店区域</span></a></li>
				<li><a href="store_area_group"><span>区域分组管理</span></a></li>
			</ul>
		</div>
	</div>
	  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>可批量设置门店的区域分组。</li>
    </ul>
  </div>
	<div id="flexigrid">
    </div>


</div>
	<?php echo '<script'; ?>
>
$(function(){

	$("#flexigrid").flexigrid({
		url: 'get_store_area_edit',
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
			{display: '门店名称', name : 'storelogo', width : 250, sortable : true, align: 'left'},
			{display: '所属区域分组', name : 'area', width : 150, sortable : true, align: 'left'},
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>批量设置分组', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
			
		],
		searchitems : [
			{display: '门店名称', name : 's.store_name'},
			{display: '区域名称', name : 'sg.agp_name'}
		],
		title: '门店区域列表'
	});
	function fg_operate(name, grid) {
    if (name == 'delete') {
        if($('.trSelected',grid).length>0){
            var itemlist = new Array();
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
            itemlist = itemlist.join(',');
            fg_delete(itemlist);
        }else{
            return false;
        }
    }else if (name == 'add') {
    	 if($('.trSelected',grid).length>0){
             var itemlist = new Array();
             $('.trSelected',grid).each(function(){
             	itemlist.push($(this).attr('data-id'));
             });
             itemlist = itemlist.join(',');
             fg_bj(itemlist);
         }else{
             layer.alert('请至少选择一个门店');return false;
         }
    	
    }
}
});
function fg_bj(data){
	var title = '';id = '';
	if(typeof(data)=='string'){
		var itemlist = new Array();
        $('div.bDiv').find('.trSelected').each(function(){	
           itemlist.push($(this).find('span.store_name').text());
        });
        if(itemlist.length>3){
        	itemlist = itemlist.slice(0,3);
        	itemlist = itemlist.join(',')+'等';
        }else{
        	itemlist = itemlist.join(',');
        }
		title = itemlist;id=data;
	}else if(typeof(data)=='object'){
		title = data.store_name;id=data.store_id;
	}
	var str_group = '<select name="store_group">';group = <?php echo $_smarty_tpl->tpl_vars['group']->value;?>
;
	$.each(group,function(k,v){
		var s_select = '';
		if(data.agp_id==v.agp_id){
			s_select = 'selected';
		}
		str_group +='<option value="'+v.agp_id+'" '+s_select+'>'+v.agp_name+'</option>';
	})
	str_group +='</select>';
	var content = '<div class="pt-10 pb-10 pl-30 pr-30 ">'+
	'<form action="add_brand" id="form1" name="form1" method="POST">'+
	'<table class="table"><tbody>'+
	'<tr> <td class="text-l f-14" style="width: 30%;text-align:right !important;">'+
	'门店名称：</td><td class="text-l">'+
	title+
	'<input type="hidden" class="input-text" id="group_id" value="'+id+'" name="group_id">'+
	'<span class="err"></span></td> </tr>'+
	'<tr> <td class="text-l f-14" style="width: 30%;text-align:right !important;">'+
	'所属区域分组：</td><td class="text-l">'+
	str_group+
	'<span class="err"></span></td> </tr>'+
	'</tbody></table></form></div>';
	layer.open({
        type: 1,
        btn: ['确认', '取消'],
        title: '<b>设置分组</b>',
        skin: 'layui-layer-rim', //加上边框
        area: ['520px', 'auto'], //宽高
        content: content,
        yes: function(index, layero){
        	var form_data = $("#form1").serialize();
        	$.ajax({
    			type: "post",
    	        url: "store_area_group_edit",
    	        data: form_data,
    	        dataType: "json",
    	        success: function(data){
				if(data.state=='403'){
				    login_ajax('shopadmin',data);
				}else
    	        	if(data.state){
    	        		layer.close(index);
    					layer.msg('设置成功，页面刷新中！');
    					$("#flexigrid").flexReload();
    	        	}else{
    	        		layer.msg(data);
    	        	}
    	        }
    		})
        },no:function(){}
	})
}
<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
