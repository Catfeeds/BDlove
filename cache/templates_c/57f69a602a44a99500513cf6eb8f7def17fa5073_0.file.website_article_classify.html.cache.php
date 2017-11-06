<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:45:45
  from "D:\www\yunjuke\application\admin\views\website_article_classify.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fdd49b22764_10432326',
  'file_dependency' => 
  array (
    '57f69a602a44a99500513cf6eb8f7def17fa5073' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\website_article_classify.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597fdd49b22764_10432326 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '24782597fdd499c2e06_42462141';
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
<?php echo '<script'; ?>
>
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
		url:"<?php echo base_url();?>
admin.php/Website/update_sort_all",
		cache: false,
		success:function(res){
			if(res!="success"){
				layer.alert('名称修改失败，请重试');
			}
		}
	});
}
   function edit(id){
	   window.location.href = '<?php echo base_url();?>
admin.php/Website/website_article_classify_edit?&op=edit_class&id='+id;
   }
   function edits(id){
	   window.location.href = '<?php echo base_url();?>
admin.php/Website/website_article_classify_edit?&op=add_class&id='+id;
   }
<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
