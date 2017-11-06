<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:33:40
  from "D:\www\yunjuke\application\admin\views\goods_classify_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c227e4863359_37435715',
  'file_dependency' => 
  array (
    'ef7e762247f0efefc41eeac6f63a279d7b071213' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_classify_management.html',
      1 => 1503556794,
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
function content_59c227e4863359_37435715 ($_smarty_tpl) {
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
.cl-red{
	color:red;
}
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
.layui-layer{
	max-width:80% !important;
}
.check-style{
	border: 1px dashed #eee;
	padding: 10px;
	display: block;
	max-height: 200px;
	overflow-y: auto;
}
.check-dl{
	border-bottom: 1px solid #eee;
	padding: 5px 0;
}
.check-dl dd label{
	display: inline-block;
	width: 150px;
	margin-right: 10px;
	vertical-align:top;
	zoom: 1;
}
.check-dl input{
	margin-right: 5px;
}
.check-dl dt{
	font-weight: bold;
	margin-bottom: 5px;
}
.check-dl dd{
	padding:0 10px;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                     <h3>分类管理</h3>
                     <h5>对系统货品（商品）的分类进行增、删、改管理</h5>
                </div>
                 <ul class="tab-base nc-row">
                                            <li><a class="current" href="goods_classify_management"><span>平台分类</span></a></li>
                        <li><a class="" href="goods_classify_management?type=tb"><span>淘宝分类</span></a></li>
                        <li><a class="" href="goods_classify_management?type=jd"><span>京东分类</span></a></li>
                                    </ul>
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
      <li>每个子分类必需关联上级分类</li>
      <li>设置中可选则分类属性，分类的属性可在类型管理中设置</li>
      <li>设置分类关键词和描述有利于搜索引擎和用户搜索</li>
    </ul>
  </div>
  <div id="flexigrid">

  </div>
</div>
<script type="text/javascript">
//定义变量，点击返回上一级、新增分类自动获取当前父类时用到
var his_parent_ids = [0],cur_parent_id = 0;
/*--------------------------------此代码为控制表头的*/
$(function(){

    $("#flexigrid").flexigrid({
        url: 'ajax_get_all_classify_list',
        dataType: 'xml',
        colModel : [
            {display: '排序', name : 'area_name', width : 100, sortable : false, align: 'left'},
            {display: '分类名', name : 'area_region', width : 150, sortable : false, align: 'left'},
			{display: '所在层级', name : 'area_deep', width : 100, sortable : false, align : 'left'},
			{display: '上级分类ID', name : 'area_parent_id', width : 140, sortable : false, align: 'center'},
			{display: '淘宝分类ID', name : 'area_parent_id', width : 140, sortable : false, align: 'center'},
			{display: '京东分类ID', name : 'area_parent_id', width : 140, sortable : false, align: 'center'},
			{display: '操作', name : 'operation', width : 350, sortable : false, align: 'center'}
            ],
        buttons : [
            {display: '<i class="fa fa-plus"></i>新增顶级分类', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
            {display: '<i class="fa fa-trash"></i>批量删除', name : 'delete', bclass : 'del', title : '将选定行数据批量删除', onpress : fg_operate },
            {display: '<i class="fa fa-level-up"></i>返回上级', name : 'up', bclass : 'back', title : '返回上级', onpress : fg_operate }
            ],
  /*       searchitems : [
            {display: '地区', name : 'area_name'}
            ], */
        sortname: "",
        sortorder: "",
        rp: 40,
        title: '平台分类列表'
    });
});









function fg_show_children(gc_id,gc_parent_id) {
    $("#flexigrid").flexOptions({url: 'ajax_get_all_classify_list?parent_id='+gc_id}).flexReload();
    his_parent_ids.push(gc_parent_id);
    //alert(his_parent_ids);
    cur_parent_id = gc_id;
}

function fg_up() {
	if (his_parent_ids.length == 0) {
		his_parent_ids.push(0);
	}
	$("#flexigrid").flexOptions({url: 'ajax_get_all_classify_list?parent_id='+his_parent_ids[his_parent_ids.length-1]}).flexReload();
	cur_parent_id = his_parent_ids[his_parent_ids.length-1];
    //alert(cur_parent_id);
	his_parent_ids.pop();
}


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
		        url: "del_class",
		        data: "id="+id,
		        success: function(data){
		        	layer.msg(data.info);
		        	setTimeout("window.location.href='goods_classify_management';",5000)
		        	
		        }
		    });
		}, function(){
		    return ;
    });
}



function go_back(){
	if (his_parent_ids.length == 0) {
		his_parent_ids.push(0);
	}
	$("#flexigrid").flexOptions({url: 'ajax_get_all_classify_list?parent_id='+his_parent_ids[his_parent_ids.length-1]}).flexReload();
	cur_parent_id = his_parent_ids[his_parent_ids.length-1];
    //alert(cur_parent_id);
	his_parent_ids.pop();
}


//快键定位
$("body").on("change","#get_type_spec",function(){
	var v = $(this).val();
	var srctop = $("input[value="+v+"]").offset().top - $(".check-style").offset().top;
	$('.check-style').scrollTop(srctop-3);
})

//点击全选
$("body").on("change",".check-dl input",function(){
if($(this).attr("checked")){
	$(this).parent().next().find("label input").attr("checked",true);
}else{
	$(this).parent().next().find("label input").attr("checked",false);
}
})


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
    }else if (name == 'begin') {
    	$.ajax({
	        type: "post",
	        dataType: "json",
	        url: "begin_class",
	        data: "type="+h_type,
	        success: function(data){
	        	layer.msg(data);
	        	window.location.href='goods_classify_management';
	        }
	    });
    }else if (name == 'up') {
    	fg_up();
    }
}














function add_cate(){  //新增顶级
    ajax_get_type('get_spec_type','',0,'',1);
}

	

function add_next(id){ //新增下级
	$.ajax({
		url:'ajax_get_classinfo_byID',
		dataType:'json',
		type: "post",
		data: "gc_id="+id,
		success:function(data){
			if(data.state){
				//console.log(data)
				var data1 = new Object();
			    data1.gc_parent_id =data.data.gc_id;
			    data1.gc_parent_name = data.data.gc_name;
			    data1.gc_id = '';
			    data1.gc_name = '';
			    data1.gc_sort = '';
			    data1.weight = '';
			    data1.gc_keywords = '';
			    data1.gc_description = '';
			    ajax_get_type('get_spec_type',data1,0,data.data.gc_id,2);return false;
			}
		}
	});
}


//编辑分类
function edit_cate(gc_id){
	$.ajax({
		url:'ajax_get_classinfo_byID',
		dataType:'json',
		type: "post",
		data: "gc_id="+gc_id,
		success:function(data){
			if(data.state){
				var selected1 = 'checked="checked"';
				var selected2 = '';
				if(typeof(gc_id) == "undefined"){
					var arr = new Array();
					arr['gc_id'] = '';
					arr['gc_name'] = '';
					arr['gc_sort'] = '255';
					var form_url = 'add_class';
				}else{
					var arr = new Array();
					arr['gc_id']= data.data.gc_id;
					arr['gc_name']=data.data.gc_name;
					arr['gc_sort']=data.data.gc_sort;
					arr['gc_keywords']=data.data.gc_keywords;
					arr['gc_description']=data.data.gc_description;
					arr['gc_parent_id']=data.data.gc_parent_id;
					arr['gc_parent_name']=data.data.gc_parent_name;
					arr['weight']=data.data.weight;
					arr['ec_jd_cid']=data.data.ec_jd_cid;
					arr['ec_tb_cid']=data.data.ec_tb_cid;
					var form_url = 'edit_class'
				}
				ajax_get_type('get_spec_type',arr,data.data.gc_id,'',2);return false;
			}
		}
	});
}


function ajax_get_type(url,data1,data2,pid,flag){
	var gc_id = data2;
	$.ajax({
		type:'post',
		data:{gc_id:data2},
		url:url,
		dataType:'json',
		success:function(data){
			respon(data.spec,data1,data.gc_spec,pid,flag);
			if(!pid){
				$("#form1").ready(function(){
					$.ajax({
						url:'get_all_list/'+gc_id,
						dataType:'json',
						success:function(options){
							$("#gc_parent_id").append(options);
							if(gc_id>0){
								$("#gc_parent_id").val(data1['gc_parent_id']);
							}
							
						}
					});
					
				});
			}
			
		},
		
	});
}


























function respon(data,data1,gc_spec,pid,flag){
	
	var gc_id='';gc_name='';gc_sort=255;gc_keywords='';gc_description='';gc_parent_id='';gc_parent_name='';weight='';ec_jd_cid='';ec_tb_cid='';
	if(data1){
		gc_id = data1['gc_id'];
		gc_name = data1['gc_name'];
		gc_sort = data1['gc_sort'];
        weight = data1['weight'];
		gc_keywords = data1['gc_keywords'];
		gc_description = data1['gc_description'];
		gc_parent_id = data1['gc_parent_id'];
		gc_parent_name = data1['gc_parent_name'];
		gc_parent_id = data1['gc_parent_id'];
		gc_parent_name = data1['gc_parent_name'];
		ec_jd_cid = data1['ec_jd_cid'];
		ec_tb_cid = data1['ec_tb_cid'];
		if(!ec_jd_cid){
			ec_jd_cid = '';
		}	
		if(!ec_tb_cid){
			ec_tb_cid = '';
		}
		if(!gc_sort ){
			gc_sort = 255;
		}
	}
	gc_id_str = '';
	if(gc_id){
		gc_id_str='<input type="hidden" name="gc_id" value="'+gc_id+'">';
	}
	type_str = '';sttr_='';
	$.each(data,function(k,v){
		type_str+='<option value="'+v.type_id+'">'+v.type_name+'</option>';
		sttr_ +='<dl class="check-dl"><dt id="brand_dt_'+v.type_id+'">'+
		'<input type="checkbox" name="brand_type[]"  value="'+v.type_id+'" id="brand_type'+v.type_id+'">'+v.type_name+'</dt><dd>';
		$.each(v.type,function(ka,va){
			isCheck = '';
			if(gc_spec){
				gc_spec_ = ','+gc_spec+',';
				sp_id_ = ','+va.sp_id+',';
				if(gc_spec_.indexOf(sp_id_)>=0){
					isCheck = 'checked';
				}
			}
			sttr_+='<label for="brand_'+va.sp_id+'">'+
	        '<input type="checkbox" name="type_spec[]" '+isCheck+' value="'+va.sp_id+'" id="brand_'+va.sp_id+'">'+va.sp_name+
	        '</label>';
		})
		sttr_+='</dd></dl>';
	})
	var sttr = '<div id="brandcategory">快捷定位'+
    '<select class="class-select mr-5" id="get_type_spec" >'+
    '<option value="0" selected>-请选择-</option>'+type_str+
                     /* 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: first_classes</p>
<p>Filename: templates_c/ef7e762247f0efefc41eeac6f63a279d7b071213_0.file.goods_classify_management.html.cache.php</p>
<p>Line Number: 485</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\ef7e762247f0efefc41eeac6f63a279d7b071213_0.file.goods_classify_management.html.cache.php<br />
			Line: 485<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\admin\controllers\Goods.php<br />
			Line: 2398<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\admin.php<br />
			Line: 329<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/ef7e762247f0efefc41eeac6f63a279d7b071213_0.file.goods_classify_management.html.cache.php</p>
<p>Line Number: 485</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\ef7e762247f0efefc41eeac6f63a279d7b071213_0.file.goods_classify_management.html.cache.php<br />
			Line: 485<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\admin\controllers\Goods.php<br />
			Line: 2398<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\admin.php<br />
			Line: 329<br />
			Function: require_once			</p>

		
	

</div> */
    '</select>类型下对应的属性</div>';
    p_str = '';p_str1 = '';
    var title ='';
    if(pid){
    	title = '<b>新增下级分类</b>';
    	//新增下级
    	p_str1 = '<tr> ' +
		'<td class="text-l f-14"  style="width: 80px;">上级分类：</td>' +
		'<td class="text-l f-14"><input type="hidden" class="input-text " name="gc_parent_id" value="'+pid+'" style="width: 120px;height: 24px;">'+gc_parent_name+'</td> ' +
		'</tr>';
		jd_tb_option ='<tr> ' +
		'<td class="text-l f-14"  style="width: 80px;">关联分类：</td>' +
		'<td class="text-l f-14">淘宝ID&nbsp;&nbsp;<input type="text" style="width: 80px;" id="ec_tb_cid" name="ec_tb_cid"/>'+
		'&nbsp;&nbsp;&nbsp;&nbsp;'+
		'京东ID&nbsp;&nbsp;<input type="text" style="width: 80px;" id="ec_jd_cid" name="ec_jd_cid"/><span class="err"></span>'+
		'</td> ' +
		'</tr>';
    	layer.open({
    		type: 1,
    		btn: ['确认', '取消'],
    		title: title,
    		skin: 'layui-layer-rim', //加上边框
    		area: ['720px', '80%'], //宽高
    		content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form1">' +
    		'<table class="table">' +
    		'<tr> ' +
    		'<td class="text-l f-14" style="width: 120px;"><span class="cl-red">*</span>分类名称：</td>' +
    		'<td class="text-l f-14">'+gc_id_str+p_str+'<input type="text" class="input-text " name="gc_name" value="'+gc_name+'" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
    		'</tr>' +
    		p_str1+jd_tb_option+
    		'<tr> ' +
    		'<td class="text-l f-14" style="width: 120px;">关键词：</td>' +
    		'<td class="text-l f-14"><input type="text" class="input-text " name="gc_keywords" value="'+gc_keywords+'" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
    		'</tr>' +
    		'<tr> ' +
    		'<td class="text-l f-14" style="width: 120px;">描述：</td>' +
    		'<td class="text-l f-14"><textarea name="gc_description" id="" class="pd-5 w200">'+gc_description+'</textarea><span class="err"></span></td> ' +
    		'</tr>' +
    		'<tr> ' +
    		'<td class="text-l f-14" style="width: 120px;">排序：</td>' +
    		'<td class="text-l f-14"><input type="number" class="input-text radius" name="gc_sort" value="'+gc_sort+'" ><span class="err"></span></td> ' +
    		'</tr>' +
            '<tr> ' +
            '<td class="text-l f-14" style="width: 120px;"><span class="cl-red">*</span>商品重量：</td>' +
            '<td class="text-l f-14"><input type="number" class="input-text radius" name="weight" value="'+weight+'" >千克<span class="err"></span></td> ' +
            '</tr>' +
    		'<tr> ' +
    		'<td class="text-l f-14" style="width: 80px;">分类属性：</td>' +
    		'<td class="text-l f-14">'+sttr+'</td> ' +
    		'</tr>' +
    		'<tr> ' +
    		'<td class="text-l f-14" style="width: 80px;"></td>' +
    		'<td class="text-l check-style">'+sttr_+'</td> ' +
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
    					gc_name : {
    						required : true
    					},
    					ec_tb_cid :{
    						number: true
   					    },
   					    ec_jd_cid :{
   					    	number: true
  					    },
    					gc_sort : {
    						required : true
    					},
                        weight:{
    					    required : true,
                            range:[0.001,9999]
                        }
    				},
    				messages : {
    					gc_name : {
    						required : '<i class="fa fa-exclamation-circle"></i>请输入分类名称'
    					},
    					ec_tb_cid :{
    						number: '<i class="fa fa-exclamation-circle"></i>分类ID只能是数字',
   					    },
   					    ec_jd_cid :{
   					    	number: '<i class="fa fa-exclamation-circle"></i>分类ID只能是数字',
  					    },
    					gc_sort : {
    						required : '<i class="fa fa-exclamation-circle"></i> 请排序'
    					},
                        weight : {
                            required : '<i class="fa fa-exclamation-circle"></i> 请输入重量',
                            range : '<i class="fa fa-exclamation-circle"></i>重量不能小于0'
                        }
    				}
    			});
    			if($("#form1").valid()){
    				var data = $("#form1").serialize();
    				$.ajax({
    					type:'post',
    					data:data,
    					url:'add_class',
    					error:function(){
        					layer.alert('添加失败',{
        						icon: 2,
        						skin: 'layer-ext-moon'
        					})
        				},
        				success:function(data){
        					console.log(data)
        					layer.close(index);
            				layer.msg(data.msg);
            				window.location.href='goods_classify_management';
            				
            			},
            			dataType:'json'
    				});
    			}
    		}, no: function(){
    		}
    	})

    }else{
    	if(flag==1){//新增
    		title = '<b>新增顶级分类</b>';
    		p_str1 = '<input type="hidden" id="gc_parent_id" name="gc_parent_id" value="0"/>';
    		jd_tb_option ='<tr> ' +
			'<td class="text-l f-14"  style="width: 80px;">关联分类：</td>' +
			'<td class="text-l f-14">淘宝ID&nbsp;&nbsp;<input type="text" style="width: 80px;" id="ec_tb_cid" name="ec_tb_cid"/>'+
			'&nbsp;&nbsp;&nbsp;&nbsp;'+
			'京东ID&nbsp;&nbsp;<input type="text" style="width: 80px;" id="ec_jd_cid" name="ec_jd_cid"/><span class="err"></span>'+
			'</td> ' +
			'</tr>';
			
    		layer.open({
        		type: 1,
        		btn: ['确认', '取消'],
        		title: title,
        		skin: 'layui-layer-rim', //加上边框
        		area: ['720px', 'auto'], //宽高
        		content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form1">' +
        		'<table class="table">' +
        		'<tr> ' +
        		'<td class="text-l f-14" style="width: 120px;"><span class="cl-red">*</span>分类名称：</td>' +
        		'<td class="text-l f-14">'+gc_id_str+p_str+'<input type="text" class="input-text " name="gc_name" value="'+gc_name+'" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
        		'</tr>' +
        		p_str1+jd_tb_option+
        		'<tr> ' +
        		'<td class="text-l f-14" style="width: 120px;">关键词：</td>' +
        		'<td class="text-l f-14"><input type="text" class="input-text " name="gc_keywords" value="'+gc_keywords+'" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
        		'</tr>' +
        		'<tr> ' +
        		'<td class="text-l f-14" style="width: 120px;">描述：</td>' +
        		'<td class="text-l f-14"><textarea name="gc_description" id="" class="pd-5 w200">'+gc_description+'</textarea><span class="err"></span></td> ' +
        		'</tr>' +
        		'<tr> ' +
        		'<td class="text-l f-14" style="width: 120px;">排序：</td>' +
        		'<td class="text-l f-14"><input type="number" class="input-text radius" name="gc_sort" value="'+gc_sort+'" ><span class="err"></span></td> ' +
        		'</tr>' +
                '<tr> ' +
                '<td class="text-l f-14" style="width: 120px;"><span class="cl-red">*</span>商品重量：</td>' +
                '<td class="text-l f-14"><input type="number" class="input-text radius" name="weight" value="'+weight+'" >千克<span class="err"></span></td> ' +
                '</tr>' +
        		'<tr> ' +
        		'<td class="text-l f-14" style="width: 80px;">分类属性：</td>' +
        		'<td class="text-l f-14">'+sttr+'</td> ' +
        		'</tr>' +
        		'<tr> ' +
        		'<td class="text-l f-14" style="width: 80px;"></td>' +
        		'<td class="text-l check-style">'+sttr_+'</td> ' +
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
        					gc_name : {
        						required : true
        					},
        					ec_tb_cid :{
        						number: true
       					    },
       					    ec_jd_cid :{
       					    	number: true
      					    },
        					gc_sort : {
        						required : true
        					},
                            weight:{
        					    required : true,
                                range:[0.001,9999]
                            }
        				},
        				messages : {
        					gc_name : {
        						required : '<i class="fa fa-exclamation-circle"></i>请输入分类名称'
        					},
        					ec_tb_cid :{
        						number: '<i class="fa fa-exclamation-circle"></i>分类ID只能是数字',
       					    },
       					    ec_jd_cid :{
       					    	number: '<i class="fa fa-exclamation-circle"></i>分类ID只能是数字',
      					    },
        					gc_sort : {
        						required : '<i class="fa fa-exclamation-circle"></i> 请排序'
        					},
                            weight : {
                                required : '<i class="fa fa-exclamation-circle"></i> 请输入重量',
                                range : '<i class="fa fa-exclamation-circle"></i>重量不能小于0'
                            }
        				}
        			});
        			if($("#form1").valid()){
        				var data = $("#form1").serialize();
        				$.ajax({
        					type:'post',
        					data:data,
        					url:'add_class',
        					error:function(){
            					layer.alert('添加失败',{
            						icon: 2,
            						skin: 'layer-ext-moon'
            					})
            				},
            				success:function(data){
            					console.log(data)
            					layer.close(index);
                				layer.msg(data.msg);
                				window.location.href='goods_classify_management';
                				
                			},
                			dataType:'json'
        				});
        			}
        		}, no: function(){
        		}
        	})

    	}else{//编辑
    		title = '<b>编辑分类</b>';
    		p_str1 = '<tr> ' +
    		'<td class="text-l f-14"  style="width: 80px;">上级分类：</td>' +
    		'<td class="text-l f-14">';
    		if(gc_parent_id==0){
    			p_str1 +='<input type="hidden" disabled=false class="input-text " name="gc_parent_id" value="'+gc_parent_id+'" style="width: 120px;height: 24px;">'+gc_name;
    			//p_str1 +='<option value="'+gc_parent_id+'">'+gc_name+'</option>';
    		}else{
    			p_str1 += '<input type="hidden" disabled=false class="input-text " name="gc_parent_id" value="'+gc_parent_id+'" style="width: 120px;height: 24px;">'+gc_parent_name;
    			//p_str1 +='<option value="'+gc_parent_id+'">'+gc_parent_name+'</option>';
    		}
    		p_str1 +='</td> ' +
    		'</tr>';
    		
    		
    		
			jd_tb_options ='<tr> ' +
			'<td class="text-l f-14"  style="width: 80px;">关联分类：</td>' +
			'<td class="text-l f-14">淘宝ID&nbsp;&nbsp;<input type="text" style="width: 80px;" id="ec_tb_cid" value="'+ec_tb_cid+'"  name="ec_tb_cid"/>'+
			'&nbsp;&nbsp;&nbsp;&nbsp;'+
			'京东ID&nbsp;&nbsp;<input type="text" style="width: 80px;" value="'+ec_jd_cid+'" id="ec_jd_cid" name="ec_jd_cid"/><span class="err"></span>'+
			'</td> ' +
			'</tr>';
			layer.open({
	    		type: 1,
	    		btn: ['确认', '取消'],
	    		title: title,
	    		skin: 'layui-layer-rim', //加上边框
	    		area: ['720px', 'auto'], //宽高
	    		content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="" id="form1">' +
	    		'<table class="table">' +
	    		'<tr> ' +
	    		'<td class="text-l f-14" style="width: 120px;"><span class="cl-red">*</span>分类名称：</td>' +
	    		'<td class="text-l f-14">'+gc_id_str+p_str+'<input type="text" class="input-text " name="gc_name" value="'+gc_name+'" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
	    		'</tr>' +
	    		p_str1+jd_tb_options+
	    		'<tr> ' +
	    		'<td class="text-l f-14" style="width: 120px;">关键词：</td>' +
	    		'<td class="text-l f-14"><input type="text" class="input-text " name="gc_keywords" value="'+gc_keywords+'" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
	    		'</tr>' +
	    		'<tr> ' +
	    		'<td class="text-l f-14" style="width: 120px;">描述：</td>' +
	    		'<td class="text-l f-14"><textarea name="gc_description" id="" class="pd-5 w200">'+gc_description+'</textarea><span class="err"></span></td> ' +
	    		'</tr>' +
	    		'<tr> ' +
	    		'<td class="text-l f-14" style="width: 120px;">排序：</td>' +
	    		'<td class="text-l f-14"><input type="number" class="input-text radius" name="gc_sort" value="'+gc_sort+'" ><span class="err"></span></td> ' +
	    		'</tr>' +
	            '<tr> ' +
	            '<td class="text-l f-14" style="width: 120px;"><span class="cl-red">*</span>商品重量：</td>' +
	            '<td class="text-l f-14"><input type="number" class="input-text radius" name="weight" value="'+weight+'" >千克<span class="err"></span></td> ' +
	            '</tr>' +
	    		'<tr> ' +
	    		'<td class="text-l f-14" style="width: 80px;">分类属性：</td>' +
	    		'<td class="text-l f-14">'+sttr+'</td> ' +
	    		'</tr>' +
	    		'<tr> ' +
	    		'<td class="text-l f-14" style="width: 80px;"></td>' +
	    		'<td class="text-l check-style">'+sttr_+'</td> ' +
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
	    					gc_name : {
	    						required : true
	    					},
	    					ec_tb_cid :{
	    						number: true
	   					    },
	   					    ec_jd_cid :{
	   					    	number: true
	  					    },
	                        weight:{
	    					    required : true,
	                            range:[0.001,9999]
	                        }
	    				},
	    				messages : {
	    					gc_name : {
	    						required : '<i class="fa fa-exclamation-circle"></i>请输入分类名称'
	    					},
	    					ec_tb_cid :{
	    						number: '<i class="fa fa-exclamation-circle"></i>分类ID只能是数字',
	   					    },
	   					    ec_jd_cid :{
	   					    	number: '<i class="fa fa-exclamation-circle"></i>分类ID只能是数字',
	  					    },
	                        weight : {
	                            required : '<i class="fa fa-exclamation-circle"></i> 请输入重量',
	                            range : '<i class="fa fa-exclamation-circle"></i>重量不能小于0'
	                        }
	    				}
	    			});
	    			if($("#form1").valid()){
	    				var data = $("#form1").serialize();
	    				$.ajax({
	    					type:'post',
	    					data:data,
	    					url:'add_class',
	    					error:function(){
	        					layer.alert('添加失败',{
	        						icon: 2,
	        						skin: 'layer-ext-moon'
	        					})
	        				},
	        				success:function(data){
	        					console.log(data)
	        					layer.close(index);
	            				layer.msg(data.msg);
	            				window.location.href='goods_classify_management';
	            				
	            			},
	            			dataType:'json'
	    				});
	    			}
	    		}, no: function(){
	    		}
	    	})
			
			
			
			
			
			
			
			
			
			
			
			
			
    	}
    
    }

}








function show_children(id, pid) {
	his_parent_ids.push(pid);
    //alert(his_parent_ids);
    cur_parent_id = id;
	$("#flexigrid").flexOptions({url: 'get_class_list/'+id}).flexReload();
}





 
</script> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body><?php }
}
