<?php
/* Smarty version 3.1.29, created on 2017-09-30 09:25:55
  from "D:\www\yunjuke\application\admin\views\micro_bargain.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59cef2a3486ce7_23454259',
  'file_dependency' => 
  array (
    '0c04e0b2a6a2ee5824a7967ffdb435120acf535f' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\micro_bargain.html',
      1 => 1506734356,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1505983976,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59cef2a3486ce7_23454259 ($_smarty_tpl) {
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
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/common/common.js"></script>
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
								<h3>微砍价</h3>
								<h5>微砍价活动管理</h5>
							</div>
		                <ul class="tab-base nc-row">
						       
						        <li><a href="micro?op=1" class="current">进行中</a></li>
						        <li><a href="micro?op=2" class="">已结束</a></li>
						        <li><a href="micro?op=3" class="">未开始</a></li>
						        <li><a href="micro?op=4" class="">全部活动</a></li>
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
	<script>
$(function(){
		$("#flexigrid").flexigrid({
			url: 'micro_list?op=1',
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
		    	 window.location.href='http://[::1]/yunjuke/admin.php/MicroBargain/micro_add';
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
	window.location.href='http://[::1]/yunjuke/admin.php/MicroBargain/micro_index?id='+id;
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
	</script>
				<div id="goTop">
				<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
				<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
			</div>
	</body>

	</html><?php }
}
