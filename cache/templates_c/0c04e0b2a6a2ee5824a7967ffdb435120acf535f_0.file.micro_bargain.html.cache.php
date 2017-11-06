<?php
/* Smarty version 3.1.29, created on 2017-09-30 09:25:55
  from "D:\www\yunjuke\application\admin\views\micro_bargain.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59cef2a33ea8b5_69052214',
  'file_dependency' => 
  array (
    '0c04e0b2a6a2ee5824a7967ffdb435120acf535f' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\micro_bargain.html',
      1 => 1506734356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59cef2a33ea8b5_69052214 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1438859cef2a32bdbf8_93528071';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
		          
							<div class="subject">
								<h3>微砍价</h3>
								<h5>微砍价活动管理</h5>
							</div>
		                <ul class="tab-base nc-row">
						       
						        <li><a href="micro?op=1" class="<?php if (isset($_smarty_tpl->tpl_vars['op']->value) && $_smarty_tpl->tpl_vars['op']->value == 1) {?>current<?php }?>">进行中</a></li>
						        <li><a href="micro?op=2" class="<?php if (isset($_smarty_tpl->tpl_vars['op']->value) && $_smarty_tpl->tpl_vars['op']->value == 2) {?>current<?php }?>">已结束</a></li>
						        <li><a href="micro?op=3" class="<?php if (isset($_smarty_tpl->tpl_vars['op']->value) && $_smarty_tpl->tpl_vars['op']->value == 3) {?>current<?php }?>">未开始</a></li>
						        <li><a href="micro?op=4" class="<?php if (isset($_smarty_tpl->tpl_vars['op']->value) && $_smarty_tpl->tpl_vars['op']->value == 4) {?>current<?php }?>">全部活动</a></li>
					      </ul>
		            </div>
			</div>
			<!-- 操作说明-->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 创建并管理微砍价活动</li>
				</ul>
		     </div>
		    
            <div id="flexigrid">
            </div>
	</div> 
	<?php echo '<script'; ?>
>
$(function(){
		$("#flexigrid").flexigrid({
			url: 'micro_list?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
} else { ?>1<?php }?>',
			colModel : [
				{display: '操作', name : 'operation', width : 200, sortable : true, align: 'center',},
				{display: '活动名称', name : 'user_name', width : 150, sortable : false, align: 'center',},
				{display: '活动店铺', name : 'goods_name', width : 100, sortable : true, align: 'center'},
				{display: '开始时间', name : 'user_tel', width : 150, sortable : true, align: 'center',},
				{display: '结束时间', name : 'user_address', width : 150, sortable : true, align: 'center'},
				{display: '商品原价', name : 'code', width : 80, sortable : true, align: 'center'},
				{display: '商品售价', name : 'code', width : 80, sortable : true, align: 'center'},
				{display: '砍价目标', name : 'code_state', width :80, sortable : true, align: 'center'},
				{display: '关键字', name : 'goods_name', width : 80, sortable : true, align: 'center'},
				{display: '参与人数', name : 'helpers_num', width : 80, sortable : true, align: 'center'},
				{display: '活动状态', name : 'price', width : 100, sortable : true, align: 'center'},
			],
			buttons : [
				{display: '<i class="fa fa-plus"></i>新建活动', name : 'add', bclass : 'add', title : '新建活动', onpress : fg_operate },
				{display: '<i class="fa fa-trash-o"></i>关闭活动', name : 'close', bclass : 'close', title : '关闭活动', onpress : fg_operate },
				{display: '<i class="fa fa-trash-o"></i>删除活动', name : 'delete', bclass : 'delete', title : '删除活动', onpress : fg_operate },
				{display: '<i class="fa fa-trash-o"></i>活动详情', name : 'view', bclass : 'view', title : '活动活动', onpress : fg_operate },
			],
			title: '活动列表'
	});
		function fg_operate(name, grid) {
		    if (name == 'view') {
		    	fg_view(50);
		    	 
/* 		        if($('.trSelected',grid).length>0){
		            var itemlist = new Array();
		            $('.trSelected',grid).each(function(){
		            	itemlist.push($(this).attr('data-id'));
		            });
		            fg_view(itemlist);
		        }else{
		        	layer.msg('请至少选择一项',{icon:2});
		            return false;
		        } */
		    }else if(name == 'add'){
		    	 window.location.href='<?php echo base_url();?>
admin.php/MicroBargain/micro_add';
		    }else if(name == 'close'){
		    	 if($('.trSelected',grid).length>0){
			            var itemlist = new Array();
			            $('.trSelected',grid).each(function(){
			            	itemlist.push($(this).attr('data-id'));
			            });
			            fg_close(itemlist);
			        }else{
			        	layer.msg('请至少选择一项',{icon:2});
			            return false;
			        } 
		    }else if(name == 'delete'){
		    	 if($('.trSelected',grid).length>0){
			            var itemlist = new Array();
			            $('.trSelected',grid).each(function(){
			            	itemlist.push($(this).attr('data-id'));
			            });
			            fg_delete(itemlist);
			        }else{
			        	layer.msg('请至少选择一项',{icon:2});
			            return false;
			        } 
		    }
		}
	});
function fg_view(id){
	window.location.href='<?php echo base_url();?>
admin.php/MicroBargain/micro_index?id='+id;
}




function fg_close(id){
	if (typeof id == 'number') {
    	var id = new Array(id.toString());
	};
	layer.confirm('确认要更改这 ' + id.length + ' 项的品牌状态吗？', {
		  btn: ['确认','取消'] //按钮
		}, function(){
	    ids = id.join(',');
	    $.ajax({
            type: "GET",
            dataType: "json",
            url: "goods_brand_edit?op=isTrue&brand_id="+ids+"&flag="+flag,
            data: '',
            success: function(data){
			if(data.state=='403'){
			login_ajax('shopadmin');
		}else
	        	if(data.state==false){
	        		layer.msg(data.msg);
	        	}else if(data.state==true){
		        	layer.msg(data.msg);
	        	}
	        	window.location.href="goods_brand_management";
	        }
        });
	});	
}


function fg_delete(id){
	if (typeof id == 'number') {
    	var id = new Array(id.toString());
	};
	layer.confirm('确认要更改这 ' + id.length + ' 项的品牌状态吗？', {
		  btn: ['确认','取消'] //按钮
		}, function(){
	    ids = id.join(',');
	    $.ajax({
            type: "GET",
            dataType: "json",
            url: "goods_brand_edit?op=isTrue&brand_id="+ids+"&flag="+flag,
            data: '',
            success: function(data){
			if(data.state=='403'){
			login_ajax('shopadmin');
		}else
	        	if(data.state==false){
	        		layer.msg(data.msg);
	        	}else if(data.state==true){
		        	layer.msg(data.msg);
	        	}
	        	window.location.href="goods_brand_management";
	        }
        });
	});	
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
