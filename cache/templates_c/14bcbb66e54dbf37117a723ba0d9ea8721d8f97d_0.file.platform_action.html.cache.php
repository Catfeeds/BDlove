<?php
/* Smarty version 3.1.29, created on 2017-08-08 10:59:28
  from "D:\www\yunjuke\application\admin\views\platform_action.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598929106abbe4_56290883',
  'file_dependency' => 
  array (
    '14bcbb66e54dbf37117a723ba0d9ea8721d8f97d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\platform_action.html',
      1 => 1501552650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598929106abbe4_56290883 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '20608598929105d0fb0_53634204';
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

      </div>
  </div>
      <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>可设置权限组的名称及对其开放的权限。</li>
    </ul>
  </div>
  <div id="flexigrid"></div> 
</div>
<?php echo '<script'; ?>
>
$(function(){

    $("#flexigrid").flexigrid({
        url: 'authority?op=list',
        dataType: 'xml',
        colModel : [
            {display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle'},
            {display: '权限组名称', name : 'admin_name', width : 100, sortable : false, align: 'center'},
             ],
        sortname: "",
        sortorder: "",
        rp: 10,
        title: '管理员列表'
    });
});

function fg_edit(admin_id) {//编辑管理员
	$.getJSON('authority?op=del_admin',{id:admin_id},function(result){
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
