<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:45:45
  from "D:\www\yunjuke\application\admin\views\website_article_classify.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fdd49bbeb85_69413697',
  'file_dependency' => 
  array (
    '57f69a602a44a99500513cf6eb8f7def17fa5073' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\website_article_classify.html',
      1 => 1492225974,
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
function content_597fdd49bbeb85_69413697 ($_smarty_tpl) {
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
				<h3>文章分类</h3>
				<h5>网站文章分类添加与管理</h5>
			</div>
		</div>
	</div>
	<!-- 操作说明 -->
	<div class="explanation" id="explanation">
		<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
			<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
			<span id="explanationZoom" title="收起提示"></span> </div>
		<ul>
			<li>管理员新增文章时，可选择文章分类。文章分类将在前台文章列表页显示</li>
			<li>默认的文章分类不可以删除</li>
		</ul>
	</div>
	<div id="flexigrid">

	</div>


</div>
<script>
$(function(){
	$('#flexigrid').flexigrid({
		url: 'website_article_classify?op=get_xml',
		height:'auto',// 高度自动
		usepager: true,// 不翻页
		striped:false,// 不使用斑马线
		resizable: false,// 不调节大小
		title: '文章分类列表',// 表格标题
		reload: false,// 不使用刷新
		colModel : [
			{display: '操作', name : 'operation', width : 200, sortable : false, align: 'center', className: 'handle-s'},
			{display: '排序', name : 'member_login_ip', width : 100, sortable : true, align: 'left'},
			{display: '名称', name : 'member_state', width : 170, sortable : true, align: 'left'}
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>新增分类', name : 'add', bclass : 'add', title : '新增分类' ,onpress : fg_xzfl}
		],
		sortname: "ac_sort",
        sortorder: "asc",
	});
	function  fg_xzfl(){
		window.location.href = 'website_article_classify_add';
	}
})

    function update_sort(id){
    	var Article_sort=document.getElementById(id).value;
    	$.ajax({
			type:'post',
			dataType:'json',
			data:{
				flag:'website_article_sort',
				id:id,
				sort:Article_sort
			},
			url:"http://[::1]/yunjuke/admin.php/Website/update_sort_all",
			cache: false,
			success:function(res){
				if(res!="success"){
					layer.alert('排序修改失败，请重试');
				}
			}
		});
    }
  function update_title(id){
	var ids="title"+id;
	var Article_sort=document.getElementById(ids).value;
	$.ajax({
		type:'post',
		dataType:'json',
		data:{
			flag:'update_class_name',
			id:id,
			sort:Article_sort
		},
		url:"http://[::1]/yunjuke/admin.php/Website/update_sort_all",
		cache: false,
		success:function(res){
			if(res!="success"){
				layer.alert('名称修改失败，请重试');
			}
		}
	});
}
   function edit(id){
	   window.location.href = 'http://[::1]/yunjuke/admin.php/Website/website_article_classify_edit?&op=edit_class&id='+id;
   }
   function edits(id){
	   window.location.href = 'http://[::1]/yunjuke/admin.php/Website/website_article_classify_edit?&op=add_class&id='+id;
   }
</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
