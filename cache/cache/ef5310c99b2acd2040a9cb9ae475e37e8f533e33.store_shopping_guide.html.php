<?php
/* Smarty version 3.1.29, created on 2017-04-24 09:55:33
  from "E:\www\yunjuke\application\admin\views\store_shopping_guide.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd5b15e82472_13331497',
  'file_dependency' => 
  array (
    'ef5310c99b2acd2040a9cb9ae475e37e8f533e33' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\admin\\views\\store_shopping_guide.html',
      1 => 1492225916,
      2 => 'file',
    ),
    '00bb14cd38b287a1433d164c4992087fb09bedd6' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1492225917,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_58fd5b15e82472_13331497 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index_1.css" rel="stylesheet" type="text/css"> 
<link href="http://[::1]/yunjuke/application/admin/views/css/font-awesome.min.css" rel="stylesheet" />
<link href="http://[::1]/yunjuke/application/admin/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views/css/H-ui.min.css" />

<!--
<link type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
-->
<style type="text/css">
    html, body { overflow: visible;}
</style>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.js"></script>

<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/common.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/script.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/zh-CN.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/admin.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/flexigrid.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.validation.min.js"></script>
<!-- <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.picTip.js"></script> -->
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

<script type="text/javascript">
/*ajax过期登录*/
function login_ajax(demo,data){
	layer.msg(data.msg);
	 setTimeout(function(){
		    if(demo=='agent'){
		    	window.location.href="http://[::1]/yunjuke/index.php/login";
		    }else if(demo=='supp'){
		    	window.location.href="http://[::1]/yunjuke/supplier.php/login";
		    }else if(demo=='admin'){
		    	window.location.href="http://[::1]/yunjuke/admin.php/login";
		    }else if(demo=='shop'){
		    	window.location.href="http://[::1]/yunjuke/index.php/index/login";
		    }else if(demo=='shopadmin'){
		    	window.location.href="http://[::1]/yunjuke/admin.php/login";
		    }
	    },2000);
}
</script>
</head>

	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>

		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<div class="subject">
						<h3>导购管理</h3>
						<h5>管理店铺里的导购</h5>
					</div>
					<ul class="tab-base nc-row">
						<li>
							<a class="current">导购管理</a>
						</li>
						<li>
							<a href="article_management_pending_audit">导购评价</a>
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
	<script>
$(function(){

	$("#flexigrid").flexigrid({
		url: 'get_store_shopping_guide',
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
			{display: '导购ID', name : 'storelogo', width : 150, sortable : true, align: 'left'},
			{display: '导购昵称', name : 'storelogo', width : 150, sortable : true, align: 'left'},
			{display: '导购姓名', name : 'member_name', width : 150, sortable : true, align: 'left'},
			{display: '电话', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '职位', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '所属门店', name : 'member_mobile', width : 80, sortable : true, align: 'left'},
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>新增导购', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>批量新增导购', name : 'more', bclass : 'more', title : '将批量导入导购', onpress : fg_operate },
			{display: '<i class="fa fa-trash-o"></i>批量离职', name : 'del', bclass : 'del', title : '将删除导购', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>批量下载导购二维码', name : 'download', bclass : 'download', title : '', onpress : fg_operate },
		],
		searchitems : [
			{display: '导购电话', name : 'spg_tel'},
			{display: '导购姓名', name : 'spg_name'},
			{display: '所属门店', name : 'store_name'},
		],
		title: '导购列表'
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
    }else if(name == 'more'){
    	/*批量导入导购*/
    	data_import('导购',"http://[::1]/yunjuke/admin.php/write_import/excel_upload",'storeGuide_import?name=');
    }else if (name == 'add') {
    	window.location.href="store_shopping_guide_edit";
    }else if (name == 'del') {
    	if($('.trSelected',grid).length>0){
            var itemlist = new Array();
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
            fg_delete(itemlist);
        }else{
        	layer.msg('请选择要删除的导购',{icon:2});
            return false;
        }
    }else if(name == 'download'){
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
	        url: 'http://[::1]/yunjuke/admin.php/weixin_set/download_much_short',
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
    }
}
});
/*下载二维码*/
function create_shot_code(id){
	window.location.href='http://[::1]/yunjuke/admin.php/weixin_set/create_shot_code?id='+id;
}
/*编辑*/
function fg_edit(id){
	window.location.href="store_shopping_guide_edit?id="+id;
}
/*更改门店*/
function update_store(id,name){
	layer.confirm('确认修改导购:‘'+name+'’的所属门店吗？',
			   {btn: ['确认','取消']}, 
			   function(){
				   str_grade = '';
				   $.ajax({
				        type: "post",
				        dataType: "json",
				        url: "select_store",
				        data: "id="+id,
				        success: function(data){
						  if(data.state=='403'){
					           login_ajax('shopadmin');
				            }else if(data.state){
				            	store_data = data.data;
				            	$.each(store_data,function(k,v){
				            		str_grade+='<option value="'+v.store_id+'">'+v.store_name+'</option>';
				            	})
				            	var content_grade = '<div class="pt-10 pb-10 pl-30 pr-30 ">'+
			    	'<form action="" id="form4" method="POST"><table class="table"><tbody>'+
			    	'<tr> <td width="20%">门店选择:</td><td  width="50%"><select name="user_grade" value="" class="user_grade">'+
			    	str_grade+'</select> </td></tr></tbody></table></form></div>';
			    	layer.open({
			            type: 1,
			            btn: ['确认', '取消'],
			            title: '<b>门店更改</b>',
			            skin: 'layui-layer-rim', //加上边框
			            area: ['320px', 'auto'], //宽高
			            content: content_grade,
			            yes: function(index,layero){
			            	store_id = $('#form4').find('.user_grade').val();
			            	$.ajax({
						        type: "post",
						        dataType: "json",
						        url: "update_store",
						        data: {id:id,store_id:store_id},
						        success: function(data){
								  if(data.state=='403'){
							           login_ajax('shopadmin');
						            }else if(data.state){
						            	layer.msg(data.msg);
						            	$("#flexigrid").flexReload();
						            	layer.close(index);
						            }else{
						            	layer.msg(data.msg);
						            }
						        }
						   })
			            	},no:function(){
			            		
			            	}
			            })
				            }
				        }
				   })
				   
				   
			   }
	)
}
/*删除*/
function fg_delete(id,name){
	title = '';
	if(!name){
		title = '这'+id.length+'个导购';
		id = id.join(',');
		
	}else{
		title = '导购’'+name+'’';
	}
	layer.confirm('确认删除'+title+'吗？',
			   {btn: ['确认','取消']}, 
			   function(){
				   $.ajax({
				        type: "post",
				        dataType: "json",
				        url: "del_guide",
				        data: {id:id},
				        success: function(data){
						  if(data.state=='403'){
					           login_ajax('shopadmin');
				            }else if(data.state){
				            	layer.msg(data.msg);
				            	$("#flexigrid").flexReload();
				            	layer.close(index);
				            }else{
				            	$("#flexigrid").flexReload();
				            	layer.alert(data.msg);
				            }
				        }
				   })
			   }
	)
}
</script>
			<div id="goTop">
				<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
				<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
			</div>
	</body>

	</html><?php }
}
