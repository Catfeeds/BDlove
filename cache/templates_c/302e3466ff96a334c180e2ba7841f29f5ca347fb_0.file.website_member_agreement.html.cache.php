<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:25:06
  from "D:\www\yunjuke\application\admin\views\website_member_agreement.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59801ec271ad94_63961301',
  'file_dependency' => 
  array (
    '302e3466ff96a334c180e2ba7841f29f5ca347fb' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\website_member_agreement.html',
      1 => 1492225975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59801ec271ad94_63961301 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1718259801ec266b0e0_24555562';
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
				<h3>会员协议</h3>
				<h5>网站会员协议设置管理</h5>
			</div>
		</div>
	</div>
	<!-- 操作说明 -->
	<div class="explanation" id="explanation">
		<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
			<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
			<span id="explanationZoom" title="收起提示"></span> </div>
		<ul>
			<li>在相关操作处可查看具体内容，例：在注册会员时须查看用户服务协议</li>
		</ul>
	</div>
	<div id="flexigrid">

	</div>


</div>
<?php echo '<script'; ?>
>
$(function(){
	$('#flexigrid').flexigrid({
		url: 'website_member_agreement?op=get_xml',
		height:'auto',// 高度自动
		usepager: true,// 不翻页
		striped:false,// 不使用斑马线
		resizable: false,// 不调节大小
		title: '文章分类列表',// 表格标题
		reload: false,// 不使用刷新
		colModel : [
			{display: '操作', name : 'operation', width : 100, sortable : false, align: 'center', className: 'handle-s'},
			{display: '标题', name : 'member_login_ip', width : 200, sortable : true, align: 'center'},
			{display: '时间', name : 'member_state', width : 200, sortable : true, align: 'center'}
		],
		sortname: "doc_id",
        sortorder: "desc",
	});
})
	function  fg_bj(id){
		window.location.href = 'website_member_agreement_edit/'+id;
	}
<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
