<?php
/* Smarty version 3.1.29, created on 2017-08-04 15:11:52
  from "D:\www\yunjuke\application\admin\views\store_cashier.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841e38e5ed57_68374240',
  'file_dependency' => 
  array (
    '26ef9659a00f0e116667954b1af30f915c3279e2' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_cashier.html',
      1 => 1501568004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59841e38e5ed57_68374240 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1610559841e38d979a2_36631280';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<div class="subject">
						<h3>店铺收银台</h3>
						<h5>线下店铺收银台管理</h5>
					</div>
					<ul class="tab-base nc-row">
						<li>
							<a class="current">营业中</a>
						</li>
						<li>
							<a href="article_management_pending_audit">暂停中</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li>线下门店营业状态的更改</li>
				</ul>
		     </div>
            <div id="flexigrid">
            </div>
	</div>
	<?php echo '<script'; ?>
>
$(function(){

	$("#flexigrid").flexigrid({
		url: 'get_store_list',
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
			{display: '门店logo', name : 'storelogo', width : 150, sortable : true, align: 'center'},
			{display: '门店名称', name : 'member_name', width : 150, sortable : true, align: 'left'},
			{display: '导购数量', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '联系电话', name : 'member_mobile', width : 80, sortable : true, align: 'center'},
			{display: '地址', name : 'member_sex', width : 200, sortable : true, align: 'center'},
			{display: '门店类型', name : 'member_truename', width : 100, sortable : true, align: 'left'},
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>新增门店', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>批量下载二维码', name : 'csv', bclass : 'csv', title : '将选定行数据导出CVS文件', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>批量暂停营业', name : 'csv', bclass : 'csv', title : '将选定行数据导出CVS文件', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>批量删除', name : 'csv', bclass : 'csv', title : '将选定行数据导出CVS文件', onpress : fg_operate },
		],
		searchitems : [
			{display: '联系电话', name : 'member_id'},
			{display: '门店名称', name : 'member_name'}
		],
		title: '门店列表'
	});
	function fg_operate(name, grid) {
    if (name == 'delete') {
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
    	window.location.href="member_edit";
    }
}
});
<?php echo '</script'; ?>
>
			<div id="goTop">
				<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
				<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
			</div>
	</body>

	</html><?php }
}
