<?php
/* Smarty version 3.1.29, created on 2017-08-04 15:11:44
  from "D:\www\yunjuke\application\admin\views\store_area_group.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841e30c41f31_14414995',
  'file_dependency' => 
  array (
    '43dd8fed441973465fed748f4e263eac9f05f0d1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_area_group.html',
      1 => 1501567796,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1500948915,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59841e30c41f31_14414995 ($_smarty_tpl) {
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
                window.location.href="http://[::1]/yunjuke/admin.php/index/login";
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
	<script>
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
</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
