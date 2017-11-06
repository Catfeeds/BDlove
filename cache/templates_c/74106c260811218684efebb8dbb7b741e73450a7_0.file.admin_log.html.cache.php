<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:40:54
  from "D:\www\yunjuke\application\admin\views\admin_log.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fdc26cece89_77035538',
  'file_dependency' => 
  array (
    '74106c260811218684efebb8dbb7b741e73450a7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\admin_log.html',
      1 => 1492225944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597fdc26cece89_77035538 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '17265597fdc26c2d7d3_29273468';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>操作日志</h3>
        <h5>管理中心管理操作日志内容</h5>
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
      <li>系统默认关闭了操作日志，如需开启，请编辑admin/config/config.ini.php: $config['sys_log'] = true;</li>
      <li>开启操作日志可以记录管理人员的关键操作，但会轻微加重系统负担</li>
    </ul>
  </div>
  <div id="flexigrid"></div>
  <div class="ncap-search-ban-s" id="searchBarOpen"><i class="fa fa-search-plus"></i>高级搜索</div>
  <div class="ncap-search-bar">
    <div class="handle-btn" id="searchBarClose"><i class="fa fa-search-minus"></i>收起边栏</div>
    <div class="title">
      <h3>高级搜索</h3>
    </div>
    <form method="get" name="formSearch" id="formSearch">
      <div id="searchCon" class="content">
        <div class="layout-box">
          <dl>
            <dt>操作人</dt>
            <dd>
             <input type="text" value="" name="admin_name" class="s-input-txt">
            </dd>
          </dl>
          <dl>
            <dt>操作内容</dt>
            <dd>
             <input type="text" value="" name="content" class="s-input-txt">
            </dd>
          </dl>
          <dl>
            <dt>IP</dt>
            <dd>
             <input type="text" value="" name="ip" class="s-input-txt">
            </dd>
          </dl>
          <dl>
            <dt>操作时间</dt>
            <dd>
              <label>
                <input readonly id="query_start_date" placeholder="请选择起始时间" onclick="laydate()" name="query_start_date" value="" type="text" class="s-input-txt" />
              </label>
              <label>
                <input readonly id="query_end_date" placeholder="请选择结束时间" onclick="laydate()" name="query_end_date" value="" type="text" class="s-input-txt" />
              </label>
            </dd>
          </dl>
        </div>
      </div>
      <div class="bottom"> <a href="javascript:void(0);" id="ncsubmit" class="ncap-btn ncap-btn-green mr5">提交查询</a><a href="javascript:void(0);" id="ncreset" class="ncap-btn ncap-btn-orange" title="撤销查询结果，还原列表项所有内容"><i class="fa fa-retweet"></i>撤销</a></div>
    </form>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
$(function(){
    // 高级搜索提交
    $('#ncsubmit').click(function(){
        $("#flexigrid").flexOptions({url: 'log_list?op=get_xml&'+$("#formSearch").serialize(),query:'',qtype:''}).flexReload();
    });
    // 高级搜索重置
    $('#ncreset').click(function(){
        $("#flexigrid").flexOptions({url: 'log_list?op=get_xml'}).flexReload();
        $("#formSearch")[0].reset();
    });
    $("#flexigrid").flexigrid({
        url: 'log_list?op=get_xml',
        colModel : [
            {display: '操作', name : 'operation', width : 60, sortable : false, align: 'center', className: 'handle-s'},
            {display: '操作人', name : 'admin_name', width : 120, sortable : true, align: 'left'}, 
			{display: '行为', name : 'log_content', width : 200, sortable : false, align : 'left'},           
			{display: '时间', name : 'log_time', width : 140, sortable : true, align: 'center'},
			{display: 'IP', name : 'ip', width : 120, sortable : true, align: 'left'}
            ],
        buttons : [
            {display: '<i class="fa fa-trash"></i>批量删除', name : 'delete', bclass : 'del', title : '将选定行数据批量删除', onpress : fg_operate },
            {display: '<i class="fa fa-trash"></i>删除6个月前的数据', name : 'delete_ago', bclass : 'del_ago', title : '将选定行数据批量删除', onpress : fg_operate },
            {display: '<i class="fa fa-file-excel-o"></i>导出数据', name : 'csv', bclass : 'csv', title : '将选定行数据导出excel文件', onpress : fg_operate }
        ],
        searchitems : [
            {display: '操作人', name : 'admin_name'},
            {display: '操作内容', name : 'log_content'}
            ],
        sortname: "log_time",
        sortorder: "desc",
        title: '管理员操作日志列表'
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
        }else{
            return false;
        }
    }else if (name == 'delete_ago') {
    	layer.confirm('删除后将不能恢复，确认删除吗？', {
    		  btn: ['确认','取消'] //按钮
    		}, function(){
    			$.ajax({
    		        type: "GET",
    		        dataType: "json",
    		        url: "log_list?op=delete_ago",
    		        data: "type=ago",
    		        success: function(data){
					if(data.state=='403'){
				login_ajax('shopadmin');
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
}

function fg_csv(ids) {
	if(ids.length == 0 ){
		layer.msg('请至少选择一项需要导出的数据');
		return false;
	}
	
	id = ids.join(',');
	window.location.href = 'log_list?op=export_step1&id=' + id;

}
function fg_delete(id) {
	if (typeof id == 'number') {
    	var id = new Array(id.toString());
	};
	
	layer.confirm('删除后将不能恢复，确认删除这 ' + id.length + ' 项吗？', {
		  btn: ['确认','取消'] //按钮
		}, function(){
			id = id.join(',');
			$.ajax({
		        type: "GET",
		        dataType: "json",
		        url: "log_list?op=list_del",
		        data: "del_id="+id,
		        success: function(data){
				if(data.state=='403'){
				login_ajax('shopadmin');
			}else
		            if (data.state){
		                $("#flexigrid").flexReload();
		                layer.msg(data.msg);
		            } else {
		            	layer.msg('删除失败');
		            }
		        }
		    });
		});
	
}
<?php echo '</script'; ?>
> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
