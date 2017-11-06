<?php
/* Smarty version 3.1.29, created on 2017-08-08 14:16:15
  from "D:\www\yunjuke\application\admin\views\size_manage.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5989572f8c88d7_02308324',
  'file_dependency' => 
  array (
    '3a58576ba7e762a428258343d8c261654fb21ffb' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\size_manage.html',
      1 => 1501581794,
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
function content_5989572f8c88d7_02308324 ($_smarty_tpl) {
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
        <h3>尺码管理</h3>
        <h5>对系统商品的码段使用的尺码进行管理</h5>
      </div>
<!--      <ul class="tab-base nc-row">
          <li><a class="current" ><span>尺码设置</span></a></li>
          <li><a href="size_control"><span>尺码对照表</span></a></li>
      </ul>-->
	</div>
  </div>
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
        <li> 全站所有涉及的商品尺码均来源于此处，强烈建议对此处谨慎操作。</li>
         <li>码段尺码新增：方法一，单条数据的添加：步骤1，点击页面上【增加尺码】，弹出录入分类信息对话框；步骤2，录入码段尺码信息之后点击确认提交数据实现新增；方法二，excel导入实现批量新增，
           这里请选择严格按照｛码段名称、尺码、吊牌尺码、是否启用、排序｝顺序录入，否则导入不成功，<a target="_blank" href="http://[::1]/yunjuke/data/excel_tp/images/size_excel_tp.png">在线查看导入模版</a>或<a href="javascript:window.location.href = 'size_excel_tp'">下载格式文件。</a></li>
    
    </ul>
  </div>
  <div class="mt-10 mb-10">
     <form method="post" name="formSearch" id="formSearch">
     <div class="search mt-20 mb-10">
       <!--  码段：<select name="cs_id" class="selecte pd-5 m_w_120 mr-10">
            <option value="" selected>-码段-</option>
            
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: rows</p>
<p>Filename: templates_c/3a58576ba7e762a428258343d8c261654fb21ffb_0.file.size_manage.html.cache.php</p>
<p>Line Number: 63</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\3a58576ba7e762a428258343d8c261654fb21ffb_0.file.size_manage.html.cache.php<br />
			Line: 63<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\admin\controllers\Goods.php<br />
			Line: 4577<br />
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
<p>Filename: templates_c/3a58576ba7e762a428258343d8c261654fb21ffb_0.file.size_manage.html.cache.php</p>
<p>Line Number: 63</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\3a58576ba7e762a428258343d8c261654fb21ffb_0.file.size_manage.html.cache.php<br />
			Line: 63<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\admin\controllers\Goods.php<br />
			Line: 4577<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\admin.php<br />
			Line: 329<br />
			Function: require_once			</p>

		
	

</div>        </select> -->
        <select name="flag" class="selecte pd-5 m_w_120 mr-10">
            <option value="" selected>-尺码类型-</option>
            <option value="1" >中国码</option>
            <option value="2" >美国码</option>
            <option value="3" >英国码</option>
            <option value="4" >日本码</option>
            
        </select>
        <input type="text" id="size" name="size" placeholder="尺码" class="input-text f-12 ml-5 mr-20 input_text">
        <input type="button" class="btn btn-warning radius ml-30" id="submit" name="submit" value="搜索">
      </div>
      </form>
    </div>
  <div id="flexigrid">
  </div>
</div>
 
<div id="goTop">
    <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
    <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>
</body>
<script type="text/javascript">
var arrs = '';
    $(function(){
    	$('#submit').click(function(){
    	    $("#flexigrid").flexOptions({url: 'get_size_list?'+$("#formSearch").serialize(),query:'',qtype:''}).flexReload();
          });
        $("#flexigrid").flexigrid({
            url: 'get_size_list',
            dataType: 'xml',
            colModel : [
		{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center',className: 'handle'},
                {display: '尺码', name : 'tag_id', width : 90, sortable : false, align: 'center'},
                {display: '尺码类型', name : 'code_segment_id', width : 60, sortable : false, align: 'center'},
                /* {display: '码段', name : 'size', width : 140, sortable : false, align: 'center'},
                {display: '码段关联分类', name : 'brand_code', width : 140, sortable : false, align : 'center'}, */
            ],
            buttons : [
                /* {display: '添加商家', name : 'add', bclass : 'add', title : '添加商家', onpress : fg_operate },*/
                {display: '<i class="fa fa-plus"></i>添加尺码', name : 'add', bclass : 'add', title : '添加码段', onpress : fg_operate },
                {display: '<i class="fa fa-trash"></i>批量删除', name : 'del', bclass : 'del', title : '批量删除', onpress : fg_operate },
//                {display: '<i class="fa fa-ban"></i>批量禁用', name : 'disabled', bclass : 'disabled', title : '批量禁用' , onpress : fg_operate},
                {display: '<i class="fa fa-cloud-download"></i>批量导入', name : 'import', bclass : 'import ', title : '批量导入' },
                {display: '<i class="fa fa-file-excel-o"></i>导出数据', name : 'csv', bclass : 'export', title : '将选定行数据导出excel文件,如果不选中行，将导出列表所有数据', onpress : fg_operate }
            ],
            sortname: "",
            sortorder: "",
            rp: 40,
            title: '尺码列表'
        });
        $(".fbutton>.import").on("click",function(){
            layer.open({
                type: 1,
                btn: ['确认', '取消'],
                title: '<b>批量导入</b>',
                skin: 'layui-layer-rim', //加上边框
                area: ['520px', '166px'], //宽高
                content: '<div class="pt-10 pb-10 pl-30 pr-30 "><form action="size_up_excel" id="form3" method="POST" enctype=multipart/form-data>' +
                '<table class="table">' +
                '<tr> ' +
                '<td class="text-l f-14"  style="width: 80px;">选择文件：</td>' +
                '<td class="text-l pos-r"><div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i> </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield2" class="type-file-text"> <input type="button" name="" id="button2" value="选择导入..." class="type-file-button"> <input class="type-file-file valid" id="import_excel" name="file_" type="file" hidefocus="true" nc_type="cms_image"></span></div><div class="err pos-a" style="bottom: -10px;"></div></td> ' +
                '</tr>' +

                '</table>'+
                '</form></div>',
                yes: function(index){
                    /*添加代理商表单验证*/
                    $('#form3').validate({
                        errorPlacement: function(error, element){
                            var error_td = element.parents(".input-file-show").next('div.err');
                            error_td.append(error);
                        },
                        rules : {
                            file_ : {
                                required : true
                            }
                        },
                        messages : {
                            file_ : {
                                required : '<i class="fa fa-exclamation-circle"></i>请选择文件'
                            }
                        }
                    });
                    if($("#form3").valid()){
                    	var data = new FormData($('#form3')[0]);
                    	layer.close(index);
                    	$.ajax({
                            data:data,
                            type:'post',
                            url:'../write_import/excel_upload',
                            dataType:'json',
                            cache: false,
                            processData: false,
                            contentType: false,
                            success:function(data){
                                if(data['state'] == false){
                                    layer.alert(data['msg']);
                                }else{
                                    //iframe层
                                    layer.open({
                                        type: 2,
                                        title: '导入明细',
                                        scrollbar:false,
                                        shade: 0.8,
                                        area: ['900px', '60%'],
                                        content: 'size_up_excel?name='+data['name']
                                    }); 
                                }
                            }
                    	});
                    }
                }, no: function(){}
            })
        })
    });
    /*添加尺码*/
    function edit(arr){
    	var add_edit = '添加';
        var selected1 = 'checked="checked"';
    	var selected2 = '';
        var selected3 = '';
    	var selected4 = '';
    	if(typeof(arr) == "undefined"){
            var arr = new Array();
            arr['size'] = '';
            arr['sort'] = '127';
            var form_url = 'add_size';
    	}else{
            add_edit = '编辑';
            if(arr['flag'] == 2){
                    selected1 = '';
                    selected2 = 'checked="checked"';
            }else if(arr['flag'] == 3){
                    selected1 = '';
                    selected3 = 'checked="checked"';
            }else if(arr['flag'] == 4){
                    selected1 = '';
                    selected4 = 'checked="checked"';
            }
            var form_url = 'edit_size/'+arr.size+'/'+arr.flag+'/'+arr.size_sort;
    	}
    	
    	var htmlstr = "";
    	if(add_edit=='编辑'){
    		//htmlstr+='<option value="'+arr.cs_id+'">'+arr.cs_name+'</option>';
    		htmlstr+='';
        }else{
        	htmlstr = "";
        }
    	arrs = arr;
    	
        layer.open({
            type: 1,
            btn: ['确认', '取消'],
            title: '<b>'+add_edit+'尺码</b>',
            skin: 'layui-layer-rim', //加上边框
            area: ['500px', 'auto'], //宽高
            content: '<div class="pt-10 pb-10 pl-30 pr-30 ">'+
            '<form action="" id="form1">' +
            '<table class="table">' +
            /* '<tr> ' +
            '<td class="text-l f-14" style="width: 80px;">码段：</td>' +
            '<td class="text-l f-14">'+
            '<select name="cs_id" id="cs_id" class="select" style="width: 150px;height: 24px;">'+htmlstr+
              
            
            '</select></td> ' +
            '</tr>' + */
            '<tr> ' +
            '<td class="text-l f-14" style="width: 80px;">尺码：</td>' +
            '<td class="text-l f-14"><input type="text" class="input-text " name="size" id="size_" value="'+arr['size']+'" style="width: 120px;height: 24px;"><span id="span_id" class="err"></span></td> ' +
            '</tr>' +
            '<tr> ' +
            '<td class="text-l f-14" style="width: 80px;">尺码类型：</td>' +
            '<td class="text-l f-14">'+
            '<input type="radio" class=""  name="flag" value="1" '+selected1+'>中国码'+
            '<input type="radio" class="ml-20 "  name="flag" value="2" '+selected2+'>美国码'+
            '<input type="radio" class="ml-20"   name="flag" value="3" '+selected3+'>英国码'+
            '<input type="radio" class="ml-20 "   name="flag" value="4" '+selected4+'>日本码'+
            '<span class="err"></span>'+
            '</td> ' +
            '</tr>' +
            '<tr> ' +
            '<td class="text-l f-14" style="width: 80px;">排序：</td>' +
            '<td class="text-l f-14"><input type="text" class="input-text " name="size_sort" id="" value="'+arr['sort']+'" style="width: 120px;height: 24px;"><span class="err"></span></td> ' +
            '</tr>' +
            '</table>'+
            '</form></div>',
            success:function(){
                $('#form1 [name="code_segment_id"]').val(arr['code_segment_id']);
                $("#form1 #brand_code").val(arr['brand_code']);
            },
            yes: function(index){
                /*添加代理商表单验证*/
                flag_val = $("input[name='flag']:checked").val();
                $('#form1').validate({
                    errorPlacement: function(error, element){
                        var error_td = element.nextAll('span.err');
                        error_td.append(error);
                    },
                    rules : {
                    	size : {
                            required : true,
/*                             remote	: {
                            	url:'check_size',
                            	type: 'post',
                            	cache:false,
        	                    async:false,
                            	data:{'now_size':arr.size,'size':$("#size_").val(),'flag_':flag_val},
                            	
                            } */
                        },
                        size_sort : {
                            required : true,
                        },
                       
                    },
                    messages : {
                       
                    	size : {
                            required : '<i class="fa fa-exclamation-circle"></i>请输入尺码',
                           /*  remote : '<i class="fa fa-exclamation-circle"></i>该类型尺码已存在' */
                        },
                        size_sort: {
                            required : '<i class="fa fa-exclamation-circle"></i>请输入排序',
                        },
                       
                    }
                });
                //console.log($("#size_").val())
                if($("#form1").valid()){
                    $.ajax({
                        type:'post',
                        data:$("#form1").serialize(),
                        url:form_url,
                        dataType:'json',
                        success:function(data){
                            layer.close(index);
                            layer.msg(data.msg);
                            if(data.state){
                                $("#flexigrid").flexReload();
                            }
                        }
                    });
                }
            }, no: function(){
            }
        })
    }
    
    
    $("body").on("change","#size_",function(){
    	flag_vals = $("input[name='flag']:checked").val();
        $.ajax({
            type:'post',
            data:{'now_size':arrs.size,'size':$("#size_").val(),'flag_':flag_vals},
            url:'check_size',
            dataType:'json',
            success:function(data){
            	 if(data){
            		 $("#span_id").html('');
            		 if($("#size_").hasClass("error")){
            			 $("#size_").removeClass("error")
            		 }
            	 }else{
            		 $("#span_id").html(' <label for="size_sort" class="error"><i class="fa fa-exclamation-circle"></i>该尺码已存在</label>')
            		$("#size_").addClass("error")
            	 }
            }
        });
    });
    
    function fg_operate(name, grid) {
        if (name == 'csv') {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                var id = itemlist.join(',');
                window.location.href = 'size_excel?id=' + id;
            }else{
                window.location.href = 'size_excel?' + $("#formSearch").serialize();
            }
        }else if (name == 'del') {
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
            edit();
        }else if (name == 'disabled') {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                	itemlist.push($(this).attr('data-id'));
                });
                fg_disable(itemlist);
            }else{
                return false;
            }
        }
    }
    function fg_delete(id) {
    	if (id.length==undefined || id.length=='undefined') {
            var id = new Array(JSON.stringify(id));
    	};
    	layer.confirm('删除后将不能恢复，确认删除 这' + id.length + ' 项吗？', {
    		  btn: ['确定','取消'] //按钮
    		}, function(){
                id = id.join(',')
    		  layer.msg('删除中', {icon: 1});
    		  $.ajax({
    		        type: "post",
    		        dataType: "json",
    		        url: "del_size",
    		        data: "id="+id,
    		        success: function(data){
                            layer.msg(data.msg);
                            if(data.state){
                                $("#flexigrid").flexReload();
                            }
    		        }
    		    });
    		}, function(){
    		    return ;
        });
    }

</script>
</html><?php }
}
