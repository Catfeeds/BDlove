<?php
/* Smarty version 3.1.29, created on 2017-07-29 16:25:41
  from "D:\www\yunjuke\application\admin\views\goods_self_taxonomy.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597c46856b6862_10872904',
  'file_dependency' => 
  array (
    'db56291758273f33fdba73d9991f811d145231e4' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_self_taxonomy.html',
      1 => 1492225943,
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
function content_597c46856b6862_10872904 ($_smarty_tpl) {
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
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/bigcolorpicker/jquery.bigcolorpicker.css" />
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/bigcolorpicker/jquery.bigcolorpicker.min.js"></script>
<body style="background-color: #FFF; overflow: auto;">
<style>
	.layui-layer-btn{
		text-align: center;
	}
	.layui-layer-btn a{
		padding: 0 20px;
		margin: 0 20px;
	}
	.layui-layer-btn a.layui-layer-btn0{
		background-color: #F37B1D;
		border:1px solid #C85E0B;
	}
.hDivBox>table{width:600px;}
.name input, .name , .name .editable2 {
    width: 150px;
    border:0;
}
.editable{
    border:0;
    background-color: transparent;
}
.name .editable{
    width: auto;
    border:0;
    background-color: transparent;
}
#treet1 td{
    border: 1px solid #E6E6E6;
}
#treet1 tr:nth-child(odd){background:#fff;}
#treet1 tr:nth-child(even){background:#FDFDFD;}
.flexigrid .bDiv .sign div{max-width: 36px !important;  }
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>自定义分类管理</h3>
        <h5>对系统货品（商品）的自定义标签分类进行增、删、改管理</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
   <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span>
    </div>
    <ul>
      <li>当店主添加商品时可选择商品分类，用户可根据分类查询商品列表</li>
      <li><a>对分类作任何更改后，都需要到 设置 -&gt; 清理缓存 清理商品分类，新的设置才会生效</a></li>
    </ul>
  </div>
  <div id="flexigrid">
  <table class="flex-table" id="form-table">
      <thead>
        <tr>
          <th width="36" align="center" class="sign"><i class="ico-check"></i></th>
          <th width="150" align="center" class="handle">操作</th>
          <th width="160" align="center" class="gstn_name">分类</th>
          <th width="100" align="center" class="gstn_sort">排序</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="treet1">
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
//定义变量，点击返回上一级、新增分类自动获取当前父类时用到
var his_parent_ids = [0],cur_parent_id = 0;
$(function(){
	var body_str = '';
	var body_data = {"60":{"gstn_parent_name":"-\u8bf7\u9009\u62e9-","gstn_id":"60","gstn_parent_id":"0","gstn_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_sort":"255","son_cate":{"62":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"62","gstn_parent_id":"60","gstn_name":"\u5bf8\u886b","gstn_sort":"255","son_cate":[]},"72":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"72","gstn_parent_id":"60","gstn_name":"\u5939\u514b","gstn_sort":"255","son_cate":[]},"71":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"71","gstn_parent_id":"60","gstn_name":"\u7fbd\u7ed2\u670d","gstn_sort":"255","son_cate":[]},"70":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"70","gstn_parent_id":"60","gstn_name":"\u9488\u7ec7\u886b","gstn_sort":"255","son_cate":[]},"69":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"69","gstn_parent_id":"60","gstn_name":"\u98ce\u8863","gstn_sort":"255","son_cate":[]},"68":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"68","gstn_parent_id":"60","gstn_name":"\u536b\u8863","gstn_sort":"255","son_cate":[]},"67":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"67","gstn_parent_id":"60","gstn_name":"\u5c0f\u897f\u670d","gstn_sort":"255","son_cate":[]},"66":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"66","gstn_parent_id":"60","gstn_name":"\u8fde\u8863\u88d9","gstn_sort":"255","son_cate":[]},"65":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"65","gstn_parent_id":"60","gstn_name":"\u51b2\u950b\u8863","gstn_sort":"255","son_cate":[]},"64":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"64","gstn_parent_id":"60","gstn_name":"T\u6064","gstn_sort":"255","son_cate":[]},"63":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"63","gstn_parent_id":"60","gstn_name":"\u8fd0\u52a8\u4e0a\u8863","gstn_sort":"255","son_cate":[]},"73":{"gstn_parent_name":"\u7cbe\u54c1\u7ae5\u88c5","gstn_id":"73","gstn_parent_id":"60","gstn_name":"\u81ea\u8425\u7ae5\u88c5","gstn_sort":"255","son_cate":[]}}},"61":{"gstn_parent_name":"-\u8bf7\u9009\u62e9-","gstn_id":"61","gstn_parent_id":"0","gstn_name":"\u65f6\u5c1a\u7ae5\u88e4","gstn_sort":"254","son_cate":{"74":{"gstn_parent_name":"\u65f6\u5c1a\u7ae5\u88e4","gstn_id":"74","gstn_parent_id":"61","gstn_name":"\u8fd0\u52a8\u88e4","gstn_sort":"255","son_cate":[]},"75":{"gstn_parent_name":"\u65f6\u5c1a\u7ae5\u88e4","gstn_id":"75","gstn_parent_id":"61","gstn_name":"\u725b\u4ed4\u88e4","gstn_sort":"255","son_cate":[]},"76":{"gstn_parent_name":"\u65f6\u5c1a\u7ae5\u88e4","gstn_id":"76","gstn_parent_id":"61","gstn_name":"\u4f11\u95f2\u88e4","gstn_sort":"255","son_cate":[]},"77":{"gstn_parent_name":"\u65f6\u5c1a\u7ae5\u88e4","gstn_id":"77","gstn_parent_id":"61","gstn_name":"\u897f\u88e4","gstn_sort":"255","son_cate":[]},"78":{"gstn_parent_name":"\u65f6\u5c1a\u7ae5\u88e4","gstn_id":"78","gstn_parent_id":"61","gstn_name":"\u77ed\u88e4","gstn_sort":"255","son_cate":[]},"79":{"gstn_parent_name":"\u65f6\u5c1a\u7ae5\u88e4","gstn_id":"79","gstn_parent_id":"61","gstn_name":"\u5587\u53ed\u88e4","gstn_sort":"255","son_cate":[]},"80":{"gstn_parent_name":"\u65f6\u5c1a\u7ae5\u88e4","gstn_id":"80","gstn_parent_id":"61","gstn_name":"\u81ea\u8425\u7ae5\u88e4","gstn_sort":"255","son_cate":[]}}},"21":{"gstn_parent_name":"-\u8bf7\u9009\u62e9-","gstn_id":"21","gstn_parent_id":"0","gstn_name":"\u6f6e\u6d41\u7ae5\u978b","gstn_sort":"253","son_cate":{"37":{"gstn_parent_name":"\u6f6e\u6d41\u7ae5\u978b","gstn_id":"37","gstn_parent_id":"21","gstn_name":"\u54c1\u724c\u7ae5\u88c5","gstn_sort":"255","son_cate":[]},"38":{"gstn_parent_name":"\u6f6e\u6d41\u7ae5\u978b","gstn_id":"38","gstn_parent_id":"21","gstn_name":"\u8fd0\u52a8\u978b","gstn_sort":"255","son_cate":[]},"39":{"gstn_parent_name":"\u6f6e\u6d41\u7ae5\u978b","gstn_id":"39","gstn_parent_id":"21","gstn_name":"\u5e06\u5e03\u978b","gstn_sort":"255","son_cate":[]},"40":{"gstn_parent_name":"\u6f6e\u6d41\u7ae5\u978b","gstn_id":"40","gstn_parent_id":"21","gstn_name":"\u76ae\u978b","gstn_sort":"255","son_cate":[]},"42":{"gstn_parent_name":"\u6f6e\u6d41\u7ae5\u978b","gstn_id":"42","gstn_parent_id":"21","gstn_name":"\u5b66\u6b65\u978b","gstn_sort":"255","son_cate":[]},"43":{"gstn_parent_name":"\u6f6e\u6d41\u7ae5\u978b","gstn_id":"43","gstn_parent_id":"21","gstn_name":"\u51c9\u978b","gstn_sort":"255","son_cate":[]},"44":{"gstn_parent_name":"\u6f6e\u6d41\u7ae5\u978b","gstn_id":"44","gstn_parent_id":"21","gstn_name":"\u96e8\u978b","gstn_sort":"255","son_cate":[]},"45":{"gstn_parent_name":"\u6f6e\u6d41\u7ae5\u978b","gstn_id":"45","gstn_parent_id":"21","gstn_name":"\u4eb2\u5b50\u978b","gstn_sort":"255","son_cate":[]},"46":{"gstn_parent_name":"\u6f6e\u6d41\u7ae5\u978b","gstn_id":"46","gstn_parent_id":"21","gstn_name":"\u81ea\u8425\u7ae5\u978b","gstn_sort":"255","son_cate":[]}}},"23":{"gstn_parent_name":"-\u8bf7\u9009\u62e9-","gstn_id":"23","gstn_parent_id":"0","gstn_name":"\u513f\u7ae5\u914d\u4ef6","gstn_sort":"252","son_cate":{"52":{"gstn_parent_name":"\u513f\u7ae5\u914d\u4ef6","gstn_id":"52","gstn_parent_id":"23","gstn_name":"\u513f\u7ae5\u889c\u5b50","gstn_sort":"255","son_cate":[]},"53":{"gstn_parent_name":"\u513f\u7ae5\u914d\u4ef6","gstn_id":"53","gstn_parent_id":"23","gstn_name":"\u513f\u7ae5\u5e3d\u5b50","gstn_sort":"255","son_cate":[]},"54":{"gstn_parent_name":"\u513f\u7ae5\u914d\u4ef6","gstn_id":"54","gstn_parent_id":"23","gstn_name":"\u9970\u54c1\u773c\u955c","gstn_sort":"255","son_cate":[]},"55":{"gstn_parent_name":"\u513f\u7ae5\u914d\u4ef6","gstn_id":"55","gstn_parent_id":"23","gstn_name":"\u513f\u7ae5\u4e66\u5305","gstn_sort":"255","son_cate":[]},"56":{"gstn_parent_name":"\u513f\u7ae5\u914d\u4ef6","gstn_id":"56","gstn_parent_id":"23","gstn_name":"\u513f\u7ae5\u80cc\u5fc3","gstn_sort":"255","son_cate":{"57":{"gstn_parent_name":"\u513f\u7ae5\u80cc\u5fc3","gstn_id":"57","gstn_parent_id":"56","gstn_name":"\u6253\u5e95\u88e4","gstn_sort":"255","son_cate":[]}}},"58":{"gstn_parent_name":"\u513f\u7ae5\u914d\u4ef6","gstn_id":"58","gstn_parent_id":"23","gstn_name":"\u5bb6\u5c45\u670d","gstn_sort":"255","son_cate":[]}}}};
	var color = 1;
	var color_arr = new Array();
	color_arr[1] = '';color_arr[2] = '#f3e0e0';color_arr[3] = '#fdefd5';color_arr[4] = '#d5e5af';color_arr[5] = '#c9dedd';
	function body_cate(body_str,data,color){
		$.each(data,function(k,v){
			var img = '';
			if(v.son_cate!=''&&typeof(v.son_cate)=='object'){
				img = '<img src="http://[::1]/yunjuke/application/admin/views/images/tv-collapsable.gif" fieldid="'+v.gstn_id+'" status="close" class="va-t mt-5" nc_type="flex">';
		    }
			body_str+='<tr  nctype="'+v.gstn_parent_id+'" data-id="'+v.gstn_id+'"  style="background-color:'+color_arr[color]+';">'+
	      '<td class="sign" ><i class="ico-check"></i>'+
	      img+  
	      '</td><td class="handle"><a href="javascript:;" onclick="fg_delete('+v.gstn_id+','+"'"+v.gstn_name+"'"+')" class="btn red"><i class="fa fa-trash-o"></i>删除</a>'+
	      '<span class="btn"><em><i class="fa fa-cog"></i>设置<i class="handle"></i></em>'+
	      '<ul><li><a href="javascript:;" onclick="edit_cate('+v.gstn_id+','+"'"+v.gstn_name+"'"+','+v.gstn_parent_id+','+v.gstn_sort+')">编辑分类信息</a></li>'+
	      '<li><a href="javascript:;" onclick="add_next('+v.gstn_id+')">新增下级</a></li></ul></span></td>'+  
	      '<td class="name"><span title="" ajax_branch="article_gstn_name"  fieldid="'+v.gstn_id+'" fieldname="gstn_name" nc_type="inline_edit" class="editable">'+v.gstn_name+'</span></td>'+  
	      '<td class="gstn_sort"><span title="" ajax_branch="article_gstn_sort"  fieldid="'+v.gstn_id+'" fieldname="gstn_sort" nc_type="inline_edit" class="editable">'+v.gstn_sort+'</span></td>'+  
	      '<td></td></tr>';
	      son_str = '';
	      if(v.son_cate!=''&&typeof(v.son_cate)=='object'){
	    	  color1 =color+1; 
	    	  
	    	  son_str += body_cate(son_str,v.son_cate,color1);
	    	  
	      }
	      body_str +=son_str;
		})
		return body_str;
	}
	str_htm = body_cate(body_str,body_data,color);
	//console.log(str_htm);
	$('#treet1').html(str_htm);
	
    $("#flexigrid").flexigrid({
    	height:'auto',// 高度自动
		usepager: false,// 不翻页
		striped:false,// 不使用斑马线
		resizable: false,// 不调节大小
		title: '自定义分类标签列表',
		reload: false,// 不使用刷新
		columnControl: false,// 不使用列控制
        buttons : [
			{display: '<i class="fa fa-plus"></i>添加分类', name : 'add', bclass : 'add', title : '添加分类', onpress : fg_operate },
            {display: '<i class="fa fa-trash"></i>批量删除', name : 'delete', bclass : 'del', title : '批量删除', onpress : fg_operate },
			/*{display: '<i class="iconfont mr-5">&#xe618;</i>批量导入', name : 'import', bclass : 'import', title : '批量导入' },*/
            /*{display: '<i class="fa fa-file-excel-o"></i>导出数据', name : 'csv', bclass : 'csv', title : '将选定行数据导出excel文件,如果不选中行，将导出列表所有数据', onpress : fg_operate }*/

        ],
        searchitems : [
                       {display: '分类名称', name : 'gstn_name', isdefault: true}
                       ],
        
    });
    //+ - 收缩按键
    /*$('img[nc_type="flex"]').toggle(
            function(){
                $('tr[nctype="' + $(this).attr('fieldid') + '"]').hide();
                $(this).attr('src', 'http://[::1]/yunjuke/application/admin/views/images/tv-expandable.gif');
            },function(){
                $('tr[nctype="' + $(this).attr('fieldid') + '"]').show();
                $(this).attr('src', 'http://[::1]/yunjuke/application/admin/views/images/tv-collapsable.gif');
            }
	);*/
	$('img[nc_type="flex"]').toggle(
            function(){
                $('tr[nctype="' + $(this).attr('fieldid') + '"]').hide();
                $(this).attr('src', 'http://[::1]/yunjuke/application/admin/views/images/tv-expandable.gif');
                gstn_id = $(this).attr('fieldid');
                $.ajax({
            		data:'gstn_id='+gstn_id,
                	type:'post',
                	url:'product_son_gstn',
                	dataType:'json',
                	success:function(data){
					if(data.state=='403'){
				login_ajax('shopadmin');
			}else
                		if(data.state){
                			$.each(data.data,function(k,v){
                				$('tr[nctype="' + v.gstn_id + '"]').hide();
                				//$('tr[nctype="' + v.product_cate_id + '"]').attr('src', 'http://[::1]/yunjuke/application/admin/views/images/tv-expandable.gif');
                			})
                		}
                	}
            	});
                
            },function(){
                $('tr[nctype="' + $(this).attr('fieldid') + '"]').show();
                $(this).attr('src', 'http://[::1]/yunjuke/application/admin/views/images/tv-collapsable.gif');
                gstn_id = $(this).attr('fieldid');
                $.ajax({
            		data:'gstn_id='+gstn_id,
                	type:'post',
                	url:'product_son_gstn',
                	dataType:'json',
                	success:function(data){
					if(data.state=='403'){
				login_ajax('shopadmin');
			}else
                		if(data.state){
                			$.each(data.data,function(k,v){
                				$('tr[nctype="' + v.gstn_id + '"]').show();
                				//$('tr[nctype="' + v.product_cate_id + '"]').attr('src', 'http://[::1]/yunjuke/application/admin/views/images/tv-expandable.gif');
                			})
                		}
                	}
            	});
            }
        );
});
function add_next(pid){
	layer.open({
		type: 1,
		btn: ['确认', '取消'],
		title: '<b>添加分类</b>',
		skin: 'layui-layer-rim', //加上边框
		area: ['520px', 'auto'], //宽高
		content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form2">' +
		'<table class="table">' +
		'<tr> ' +
		'<input type="hidden" name="gstn_parent_id" value='+pid+' >' +
		'</tr>' +
		'<tr> ' +
		'<td class="text-l f-14" style="width: 80px;">分类名称：</td>' +
		'<td class="text-l f-14"><input type="text" class="input-text " name="gstn_name" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
		'</tr>' +
		'<tr> ' +
		'<td class="text-l f-14" style="width: 80px;">排序：</td>' +
		'<td class="text-l f-14"><input type="number" class="input-text radius" name="gstn_sort" value="255" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
		'</tr>' +
		'</table>'+
		'</form></div>',
		yes: function(index){
			/*添加代理商表单验证*/
			$('#form2').validate({
				errorPlacement: function(error, element){
					var error_td = element.nextAll('span.err');
					error_td.append(error);
				},
				rules : {
					gstn_name : {
						required : true
					},
					gstn_sort : {
						required : true
					}
				},
				messages : {
					gstn_name : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入分类名称'
					},
					radio_ : {
						required : '<i class="fa fa-exclamation-circle"></i> 请选择是否启用'
					},
					gstn_sort : {
						required : '<i class="fa fa-exclamation-circle"></i> 请排序'
					}
				}
			});
			if($("#form2").valid()){
				var data = $("#form2").serialize();
				$.ajax({
					type:'post',
					data:data,
					url:'add_gstn',
					error:function(){
    					layer.alert('添加失败',{
    						icon: 2,
    						skin: 'layer-ext-moon'
    					})
    				},
    				success:function(data){
    					layer.close(index);
        				layer.msg(data);
        				window.location.href='goods_self_taxonomy';
        			},
        			dataType:'json'
				});
			}
		}, no: function(){
		},
	})
}
function add_cate(){
	var gstn_id = 0;
	layer.open({
		type: 1,
		btn: ['确认', '取消'],
		title: '<b>新增分类</b>',
		skin: 'layui-layer-rim', //加上边框
		area: ['520px', 'auto'], //宽高
		content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form1">' +
		'<table class="table">' +
		'<tr> ' +
		'<td class="text-l f-14" style="width: 120px;">分类名称：</td>' +
		'<td class="text-l f-14"><input type="text" class="input-text " name="gstn_name" value="" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
		'</tr>' +
		'<tr> ' +
		'<td class="text-l f-14"  style="width: 80px;">上级分类：</td>' +
		'<td class="text-l f-14"><select id="gstn_parent_id" name="gstn_parent_id">'+
		'<option value="0">请选择...</option>'+
		'</select></td> ' +
		'</tr>' +
		'<tr> ' +
		'<td class="text-l f-14" style="width: 120px;">排序：</td>' +
		'<td class="text-l f-14"><input type="number" class="input-text radius" name="gstn_sort" value="255" ><span class="err"></span></td> ' +
		'</tr>' +
		'</table>'+
		'</form></div>',
		yes: function(index){
			/*添加代理商表单验证*/
			$('#form1').validate({
				errorPlacement: function(error, element){
					var error_td = element.nextAll('span.err');
					error_td.append(error);
				},
				rules : {
					gstn_name : {
						required : true
					},
					gstn_sort : {
						required : true
					}
				},
				messages : {
					gstn_name : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入分类名称'
					},
					gstn_sort : {
						required : '<i class="fa fa-exclamation-circle"></i> 请排序'
					}
				}
			});
			if($("#form1").valid()){
				var data = $("#form1").serialize();
				$.ajax({
					type:'post',
					data:data,
					url:'add_gstn',
					error:function(){
    					layer.alert('添加失败',{
    						icon: 2,
    						skin: 'layer-ext-moon'
    					})
    				},
    				success:function(data){
    					layer.close(index);
        				layer.msg(data);
        				window.location.href='goods_self_taxonomy';
        				
        			},
        			dataType:'json'
				});
			}
		}, no: function(){
		}
	})
	$("#form1").ready(function(){
		$.ajax({
			url:'get_all_gstn_list/'+gstn_id,
			dataType:'json',
			success:function(options){
				$("#gstn_parent_id").append(options);
			}
		});
		
	});
}
//编辑分类
function edit_cate(gstn_id,gstn_name,gstn_parent_id,gstn_sort,gstn_parent_name){
	var selected1 = 'checked="checked"';
	var selected2 = '';
	if(typeof(gstn_id) == "undefined"){
		var arr = new Array();
		arr['gstn_id'] = '';
		arr['gstn_name'] = '';
		arr['gstn_sort'] = '255';
		var form_url = 'add_gstn';
	}else{
		var arr = new Array();
		arr['gstn_id']=gstn_id;
		arr['gstn_name']=gstn_name;
		arr['gstn_sort']=gstn_sort;
		var form_url = 'edit_gstn'
	}
	layer.open({
		type: 1,
		btn: ['确认', '取消'],
		title: '<b>编辑分类</b>',
		skin: 'layui-layer-rim', //加上边框
		area: ['520px', 'auto'], //宽高
		content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form1">' +
                '<input type="hidden" name="gstn_id" value="'+gstn_id+'">'+
		'<table class="table">' +
		'<tr> ' +
		'<td class="text-l f-14" style="width: 120px;">分类名称：</td>' +
		'<td class="text-l f-14"><input type="text" class="input-text " name="gstn_name" value="'+gstn_name+'" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
		'</tr>' +
		'<tr> ' +
		'<td class="text-l f-14"  style="width: 120px;">上级分类：</td>' +
		'<td class="text-l f-14"><select id="gstn_parent_id" name="gstn_parent_id">'+
		'<option value="0">请选择...</option>'+
		'</select></td> ' +
		'</tr>' +
		'<tr> ' +
		'<td class="text-l f-14" style="width: 80px;">排序：</td>' +
		'<td class="text-l f-14"><input type="text" class="input-text" name="gstn_sort" value="'+gstn_sort+'" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
		'</tr>' +
		'</table>'+
		'</form></div>',
		yes: function(index){
			/*添加代理商表单验证*/
			$('#form1').validate({
				errorPlacement: function(error, element){
					var error_td = element.nextAll('span.err');
					error_td.append(error);
				},
				rules : {
					gstn_name : {
						required : true
					},
					gstn_sort : {
						required : true
					}
				},
				messages : {
					gstn_name : {
						required : '<i class="fa fa-exclamation-circle"></i>请输入分类名称'
					},
					gstn_sort : {
						required : '<i class="fa fa-exclamation-circle"></i> 请排序'
					}
				}
			});
			if($("#form1").valid()){
				var data = $("#form1").serialize();
				$.ajax({
					type:'post',
					data:data,
					url:form_url,
					error:function(){
    					layer.alert('编辑失败',{
    						icon: 2,
    						skin: 'layer-ext-moon'
    					})
    				},
    				success:function(data){
    					layer.close(index);
        				layer.msg(data);
        				window.location.href='goods_self_taxonomy';
        				
        			},
        			dataType:'json'
				});
			}
		}, no: function(){
		}
	})
	$("#form1").ready(function(){
		$.ajax({
			url:'get_all_gstn_list/'+gstn_id,
			dataType:'json',
			success:function(options){
				$("#gstn_parent_id").append(options);
				$("#gstn_parent_id").val(gstn_parent_id);
			}
		});
		
	});
}
function fg_operate(name, grid) {
    if (name == 'csv') {
    	var itemlist = new Array();
        if($('.trSelected',grid).length>0){
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
        }
        fg_csv(itemlist);
    }else if (name == 'delete') {
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
        add_cate();
    }
}
/*function fg_csv(ids) {
    id = ids.join(',');
    window.location.href = 'class_excel?id='+id;
}*/
function fg_delete(id, name) {
	if (typeof id == 'number') {
    	var id = new Array(id.toString());
	};
	if(typeof name == 'undefined'){
		var str = '删除后将不能恢复，确认删除 这' + id.length + ' 项以及其子类吗？';
	}else{
		var str = '删除后将不能恢复，确认删除 ' + name + ' 以及其子类吗？';
	};
	layer.confirm(str, {
		  btn: ['确定','取消'] //按钮
		}, function(){
		  layer.msg('删除中', {icon: 1});
		  $.ajax({
		        type: "post",
		        dataType: "json",
		        url: "del_gstn",
		        data: "id="+id,
		        success: function(data){
		        	layer.msg(data);
		        	window.location.href='goods_self_taxonomy';
		        }
		    });
		}, function(){
		    return ;
    });
}

function show_children(id, pid) {
	his_parent_ids.push(pid);
    //alert(his_parent_ids);
    cur_parent_id = id;
	$("#flexigrid").flexOptions({url: 'get_class_list/'+id}).flexReload();
}
function go_back(){
	if (his_parent_ids.length == 0) {
		his_parent_ids.push(0);
	}
	$("#flexigrid").flexOptions({url: 'get_class_list/'+his_parent_ids[his_parent_ids.length-1]}).flexReload();
	cur_parent_id = his_parent_ids[his_parent_ids.length-1];
    //alert(cur_parent_id);
	his_parent_ids.pop();
}
</script> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body><?php }
}
