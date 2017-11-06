<?php
/* Smarty version 3.1.29, created on 2017-04-24 09:10:08
  from "E:\www\yunjuke\application\admin\views\store_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd5070f192a8_79491853',
  'file_dependency' => 
  array (
    '7097e66ed1d42e7a2caf5f084c1c7d40085cce8b' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\admin\\views\\store_management.html',
      1 => 1492225916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_58fd5070f192a8_79491853 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2697958fd5070e40d09_41373499';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<div class="subject">
						<h3>店铺管理</h3>
						<h5>管理线上线下门店</h5>
					</div>
					<ul class="tab-base nc-row">
						<li>
							<a <?php if (!isset($_smarty_tpl->tpl_vars['op']->value)) {?>class="current"<?php } else { ?>href="store_management"<?php }?>>营业中</a>
						</li>
						<li>
							<a <?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {?>class="current"<?php } else { ?>href="store_management?op=stop"<?php }?>>暂停中</a>
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
					<li> 若绑定洽客后为未认证公众号，之后通过了微信认证，请重新授权补充权限。</li>
					<li>仅微信认证后的服务号可使用完整洽客功能，若微信公众号接口异常，根据提示处理后请点击上方重新授权。</li>
					<li> 若公众号为订阅号，需通过微信认证才可支持微信支付；服务号均可支持。</li>
				</ul>
		     </div>
            <div id="flexigrid">
            </div>
	</div>
	<?php echo '<script'; ?>
>
$(function(){

	$("#flexigrid").flexigrid({
		url: 'get_store_list?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>',
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
			{display: '门店logo', name : 'storelogo', width : 150, sortable : true, align: 'center'},
			{display: '门店名称', name : 'member_name', width : 150, sortable : true, align: 'center'},
			{display: '导购数量', name : 'member_email', width : 150, sortable : true, align: 'center'},
			{display: '联系电话', name : 'member_mobile', width : 80, sortable : true, align: 'center'},
			{display: '地址', name : 'member_sex', width : 200, sortable : true, align: 'center'},
			{display: '门店类型', name : 'member_truename', width : 100, sortable : true, align: 'center'},
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>新增门店', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
			{display: '<i class="fa fa-download"></i>批量下载二维码', name : 'download', bclass : 'download', title : '下载选定门店的二维码', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>批量<?php if (!isset($_smarty_tpl->tpl_vars['op']->value)) {?>暂停<?php } else { ?>开启<?php }?>营业', name : 'stop', bclass : 'stop', title : '将选定行门店营业状态修改', onpress : fg_operate },
			{display: '<i class="fa fa-trash-o"></i>批量删除', name : 'delete', bclass : 'delete', title : '将选定行门店删除', onpress : fg_operate },
		],
		searchitems : [
			{display: '联系电话', name : 'ous_tel'},
			{display: '门店名称', name : 'store_name'}
		],
		title: '门店列表'
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
    	window.location.href="store_edit";
    }else if(name=='download'){
    	var itemlist = new Array();
    	if($('.trSelected',grid).length>0){
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
        }
    	itemlist = itemlist.join(',');
    	$.ajax({
	        type: "post",
	        dataType: "json",
	        url: '<?php echo base_url("admin.php/weixin_set/download_much");?>
'+'?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>',
	        data: "id=" + itemlist,
	        beforeSend:function(){
				layer.msg('正在下载，请稍等', {icon: 1});
			},
	        success: function(data){
			if(data.state=='403'){
				login_ajax('shopadmin');
			}else
	        	if(data.state){
	        		
	        		location.href = data.data;
	        		layer.msg(data.msg, {icon: 1});
	        	}else{
	        		layer.msg(data.msg, {icon: 2});
	        	}
	        	
	        }
	    });
    }else if(name=='stop'){
    	var itemlist = new Array();
    	if($('.trSelected',grid).length>0){
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
        }
    	itemlist = itemlist.join(',');
    	update_ad_management(itemlist);
    }
}
});
//下载二维码
function call_code(id){
	
	 window.location.href='<?php echo base_url("admin.php/weixin_set/create_code?id=");?>
'+id;

}
//营业
function update_ad_management(data){
	//console.log(typeof(data));
	var stname = '';
	if(typeof(data)=='object'){
		var id = data.store_id;
		var state = data.state;
		var stname = data.name;
	}else{
		id = data;
		data = data.split(',');
		size = data.length;
		if(size>0&&id!=''){
			stname = '这'+size+'个店铺';
		}else{
			stname = '所有店铺';
		}
		
	}
	layer.confirm('确认修改'+stname+'的营业状态吗？',
	   {btn: ['确认','取消']}, 
	   function(){
		   $.ajax({
		        type: "post",
		        dataType: "json",
		        url: "update_ad_management?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>",
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
}
//编辑
function fg_edit(id){
	window.location.href="store_edit?op=edit&id="+id;
}
//删除
function fg_delete(id,name){
	var stname = '';
	if(typeof(id)=='object'){
		var size = id.length;
		stname = '这'+size+'个店铺';
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
		        url: "store_del?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>",
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
