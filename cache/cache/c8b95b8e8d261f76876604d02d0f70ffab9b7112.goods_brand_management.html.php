<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:33:43
  from "D:\www\yunjuke\application\admin\views\goods_brand_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c227e7dcac57_17412681',
  'file_dependency' => 
  array (
    'c8b95b8e8d261f76876604d02d0f70ffab9b7112' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_brand_management.html',
      1 => 1501554806,
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
function content_59c227e7dcac57_17412681 ($_smarty_tpl) {
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

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>品牌管理</h3>
                <h5>商品品牌管理及店铺申请品牌审核</h5>
            </div>
        </div>
    </div>
    <!-- 操作提示 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>当店主添加商品时可选择商品品牌，用户可根据品牌查询商品列表</li>
            <li>被推荐品牌，将在前台品牌推荐模块处显示</li>
            <li>在品牌列表页面，品牌将按类别分组，即具有相同类别的品牌为一组，品牌类别与品牌分类无联系</li>
        	<li>未设置图片的品牌，默认文字展示</li>
        </ul>
    </div>   
    <div id="flexigrid"></div>
</div>
<script>
    $(function(){
        $("#flexigrid").flexigrid({
            url: 'goods_brand_management?op=getList',
            colModel : [
                {display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle'},
                {display: '品牌ID', name : 'brand_id', width : 40, sortable : true, align: 'center'},
                {display: '品牌名称', name : 'brand_name', width : 150, sortable : false, align: 'left'},
                {display: '首字母', name : 'brand_initial', width : 120, sortable : true, align: 'center'},
                {display: '品牌图片', name : 'brand_pic', width : 120, sortable : false, align: 'left'},
                {display: '品牌排序', name : 'brand_sort', width: 60, sortable : true, align : 'center'},
                {display: '品牌推荐', name : 'brand_recommend', width: 60, sortable : true, align : 'center'},
                {display: '展示形式', name : 'show_type', width : 80, sortable : true, align: 'center'}
            ],
            buttons : [
                {display: '<i class="fa fa-plus"></i>新增数据', name : 'add', bclass : 'add', title : '添加一条新数据到列表', onpress : fg_operate },
                {display: '<i class="fa fa-file-excel-o"></i>导出数据', name : 'export', bclass : 'export', title : '将选定行数据导出excel文件', onpress : fg_operate }
            ],
            searchitems : [
                {display: '品牌ID', name : 'brand_id', isdefault: true},
                {display: '品牌名称', name : 'brand_name'},
                {display: '首字母', name : 'brand_initial'}
            ],
            sortname: "brand_id",
            sortorder: "desc",
            title: '品牌列表'
        });
        $(".img_big").hover(
                function(){
                	var src=$("#img_").attr('src');
                    layer.tips('<img src="'+src+'" height="100" width="200">','#img_', {
                        tips: [2, '#f9f9f9']
                    });
                },
                function(){}
        )
    });
    function fg_operate(name, grid) {
        if (name == 'add') {
        	window.location.href = 'goods_brand_add';
        }else if (name == 'export') {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                	itemlist.push($(this).attr('data-id'));
                });
                fg_export(itemlist);
            }else{
                layer.msg('请至少选择一项需要导出的数据！');
            }
        }
    }
    
    function fg_edit(brand_id) {
        window.location.href = 'goods_brand_edit?brand_id='+brand_id;
    }
    
    function fg_delete(id) {
    	if (typeof id == 'number') {
        	var id = new Array(id.toString());
    	};
    	layer.confirm('确认要删除这 ' + id.length + ' 项吗？', {
			  btn: ['确认','取消'] //按钮
			}, function(){
		    ids = id.join(',');
		    $.ajax({
	            type: "GET",
	            dataType: "json",
	            url: "goods_brand_edit?op=delete&brand_id="+ids,
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
    /*导出*/
    function fg_export(ids) {
    	id = ids.join(',');
       	window.location.href = 'goods_brand_export?id='+id; 
    }


</script>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
