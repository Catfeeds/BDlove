<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:32:54
  from "D:\www\yunjuke\application\admin\views\sms_log.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fda4661cd89_93603326',
  'file_dependency' => 
  array (
    '604c169c6d6865c010c539e0535a4c0a666bec83' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\sms_log.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597fda4661cd89_93603326 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '18665597fda464f3f49_74619966';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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
<?php echo '<script'; ?>
 type="text/javascript">
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


<?php echo '</script'; ?>
> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
