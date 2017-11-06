<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:32:54
  from "D:\www\yunjuke\application\admin\views\sms_log.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fda4670f0c2_38511008',
  'file_dependency' => 
  array (
    '604c169c6d6865c010c539e0535a4c0a666bec83' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\sms_log.html',
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
function content_597fda4670f0c2_38511008 ($_smarty_tpl) {
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
        <h3>短信日志</h3>
        <h5>平台发送短信的记录</h5>
      </div>
      <ul class="tab-base nc-row"><li><a href="set" ><span>接口设置</span></a></li><li><a href="templates"><span>短信模版</span></a></li><li><a class="current" ><span>短信日志</span></a></li></ul> </div>
    </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span>
    </div>
    <ul>
      <li> 记录短信发送的记录。</li>
    </ul>
  </div>
  <table id="flexigrid" style="display: none"></table>
  
</div>
<script type="text/javascript">
	$(function(){
    $("#flexigrid").flexigrid({
        url: 'get_log',
		method: 'POST', // data sending method,数据发送方式
		dataType : 'xml',
        colModel : [
            {display: '操作', name : 'operation', width : 60, sortable : false, align: 'center', className: 'handle-s'},
            {display: '操作人', name : 'send_user_name', width : 80, sortable : false, align: 'center'},
            {display: '内容', 	name : 'sms_template_content', 	width : 250, sortable : false, align: 'center'},
            {display: '操作时间', name : 'send_sms_time', width : 150, sortable : true, align: 'left'},
            {display: '手机号', 	name : 'recevice_mobile', 	width : 150, sortable : false, align: 'center'},
			{display: '是否成功', 	name : 'is_success', 	width : 80, sortable : false, align: 'center'}
            ],
			
        buttons : [
            {display: '<i class="fa fa-trash"></i>批量删除', name : 'delete', bclass : 'del', title : '批量删除', onpress : fg_operate },
            {display: '<i class="fa fa-trash"></i>删除6个月前的数据', name : 'delete_ago', bclass : 'del', title : '删除6个月前的数据', onpress : fg_operate },
	    {display: '<i class="fa fa-file-excel-o"></i>导出数据', name : 'csv', bclass : 'export', title : '将选定行数据导出excel文件,如果不选中行，将导出列表所有数据', onpress : fg_operate }		
            ],
        
        sortname : "send_sms_id",	//自定义排序事件
		sortorder : "desc",	//正倒序
		title : '短信发送日志',
		rp:20,
		usepager : true, //是否分页
    });
	
});

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
        } else {
            return false;
        }
    }else if (name == 'delete_ago') {
    	 layer.confirm('删除6个月前的数据？', {
                    btn: ['确认', '取消'] //按钮
                }, function () {
    		$.ajax({
    	        type: "POST",
    	        dataType: "json",
    	        url: "del",
    	        data: {op:"ago"},
    	        success: function(data){
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
        },function(){
            
        })
    }
}
function fg_csv(ids) {	
	if(ids.length == 0 ){
		layer.msg('请至少选择一项需要导出的数据');
		return false;
	}
    id = ids.join(',');
    window.location.href = 'excel/'+id;
}
function fg_delete(id) {
	if (typeof id == 'number') {
    	var id = new Array(id.toString());
	};
        
    layer.confirm('删除后将不能恢复，确认删除这 ' + id.length + ' 项吗？', {
               btn: ['确认', '取消'] //按钮
           }, function (){ 
        id = id.join(',');
	$.ajax({
        type: "POST",
        dataType: "json",
        url: "del",
        data: {
        	op:"list_del",
        	del_id:id,
        },
        success: function(data){
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
                },function(){})
}


</script> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
