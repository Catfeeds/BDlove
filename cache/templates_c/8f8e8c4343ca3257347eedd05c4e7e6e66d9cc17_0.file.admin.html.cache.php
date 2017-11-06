<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:36:21
  from "D:\www\yunjuke\application\admin\views\admin.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fdb15d19626_80084138',
  'file_dependency' => 
  array (
    '8f8e8c4343ca3257347eedd05c4e7e6e66d9cc17' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\admin.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597fdb15d19626_80084138 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2567597fdb15c3ab74_89446020';
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
        <h3>权限设置</h3>
        <h5>管理中心操作权限及分组设置</h5>
      </div>
      <ul class="tab-base nc-row"><li>
      	<a  class="current"><span>管理员</span></a></li><li><a href="role"><span>角色</span></a></li></ul>
      
      </div>
  </div>
      <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>可添加一个管理员，并为其命名。</li>
    </ul>
  </div>
  <div id="flexigrid"></div> 
</div>
<?php echo '<script'; ?>
>
$(function(){

    $("#flexigrid").flexigrid({
        url: 'admin?op=list',
        dataType: 'xml',
        colModel : [
            {display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle'},
            {display: '名称', name : 'admin_name', width : 100, sortable : false, align: 'left'},
            {display: '上次登录时间', name : 'admin_login_time', width : 120, sortable : false, align: 'left'},
			{display: '登录次数', name : 'admin_login_num', width : 100, sortable : false, align : 'left'},
			{display: '角色名称', name : 'role_name', width : 140, sortable : false, align: 'center'}
            ],
        buttons : [
            {display: '<i class="fa fa-plus"></i>新增管理员', name : 'add', bclass : 'add', title : '新增管理员', onpress : fg_operate }
            ],
        searchitems : [
            {display: '管理员名称', name : 'admin_name'}
            ],
        sortname: "",
        sortorder: "",
        rp: 10,
        title: '管理员列表'
    });
});
function fg_operate(name, grid) {//新增管理员
    if (name == 'add') {
        window.location.href = 'admin?op=add_admin';
    }
}
function fg_delete(admin_id) {//删除管理员
	layer.confirm('确定要删除此管理员吗？', {
		  btn: ['确认','取消'] //按钮
		}, function(){
			$.getJSON('admin?op=del_admin',{id:admin_id},function(result){
				if(result.statu){
					layer.msg(result.msg);
					$("#flexigrid").flexReload();
				}else{
					layer.msg(result.msg);
				}
			});
		});
}
function fg_edit(admin_id) {//编辑管理员
	$.getJSON('admin?op=del_admin',{id:admin_id},function(result){
		if(result.statu){
			layer.msg(result.msg);
			$("#flexigrid").flexReload();
		}else{
			layer.msg(result.msg);
		}
	});
}

<?php echo '</script'; ?>
>

<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
