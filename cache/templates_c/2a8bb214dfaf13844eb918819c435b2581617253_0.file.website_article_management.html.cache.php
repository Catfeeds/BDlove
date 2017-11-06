<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:46:13
  from "D:\www\yunjuke\application\admin\views\website_article_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fdd65894864_17321515',
  'file_dependency' => 
  array (
    '2a8bb214dfaf13844eb918819c435b2581617253' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\website_article_management.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597fdd65894864_17321515 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '8451597fdd65783127_27593645';
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
	<div class="fixed-bar">
		<div class="item-title">
			<div class="subject">
				<h3>文章管理</h3>
				<h5>网站系统文章索引与管理</h5>
			</div>
		</div>
	</div>
	<!-- 操作说明 -->
	<div class="explanation" id="explanation">
		<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
			<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
			<span id="explanationZoom" title="收起提示"></span> </div>
		<ul>
			<li>区别于会员协议，可在文章列表页点击查看</li>
		</ul>
	</div>
	<div id="flexigrid">

	</div>


</div>
<?php echo '<script'; ?>
>
$(function(){
	$("#flexigrid").flexigrid({
		url: 'website_article_management?&op=get_xml',
		height:'auto',// 高度自动
		usepager: true,// 不翻页
		striped:false,// 不使用斑马线
		resizable: false,// 不调节大小
		title: '文章分类列表',// 表格标题
		reload: false,// 不使用刷新
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle'},
			{display: '排序', name : 'article_sort', width : 40, sortable : true, align: 'center'},
			{display: '标题', name : 'article_title', width : 240, sortable : true, align: 'left'},
			{display: '文章分类', name : 'ac_id', width : 150, sortable : true, align: 'left'},
			{display: '显示', name : 'article_show', width: 80, sortable : true, align : 'center'},
			{display: '添加时间', name : 'article_time', width: 160, sortable : true, align : 'center'}
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>新增数据', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
			{display: '<i class="fa fa-trash"></i>批量删除', name : 'del', bclass : 'del', title : '将选定行数据批量删除' ,onpress :  fg_operate}
			
		],
		sortname: "article_sort",
		sortorder: "asc",
		title: '文章列表'
	});

})
	function  fg_operate(name, grid){
		if (name == 'del') {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                	itemlist.push($(this).attr('data-id'));
                });
                fg_delete(itemlist);
            }else{
                return false;
            }
        }
		if (name == 'add') {
		 window.location.href = 'website_article_management_add';
		}
	}
    function update_sort(id){
    	var Article_sort=document.getElementById(id).value;
    	$.ajax({
			type:'post',
			dataType:'json',
			data:{
				flag:'website_article',
				id:id,
				sort:Article_sort
			},
			url:"<?php echo base_url();?>
admin.php/Website/update_sort_all",
			cache: false,
			success:function(res){
				if(res!="success"){
					layer.alert('排序修改失败，请重试');
				}
			}
		});
    }
	function  fg_bj(id){
		window.location.href = 'website_article_management_edit/'+id;
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
	    		        url: "website_article_management?op=list_del",
	    		        data: "del_id="+id,
	    		        success: function(data){
						if(data.state=='403'){
				login_ajax('shopadmin');return false;
			}
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
</html>
<?php }
}
