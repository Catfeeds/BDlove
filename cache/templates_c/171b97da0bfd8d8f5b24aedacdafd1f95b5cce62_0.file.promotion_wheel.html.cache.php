<?php
/* Smarty version 3.1.29, created on 2017-10-11 14:08:00
  from "D:\www\yunjuke\application\admin\views\promotion_wheel.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59ddb54036d4e8_84259233',
  'file_dependency' => 
  array (
    '171b97da0bfd8d8f5b24aedacdafd1f95b5cce62' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\promotion_wheel.html',
      1 => 1506754274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59ddb54036d4e8_84259233 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1779159ddb5400d5345_92540946';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
		          
							<div class="subject">
								<h3>抽奖</h3>
								<h5>大转盘抽奖活动管理</h5>
							</div>
		                <ul class="tab-base nc-row">
						       
						        <li><a href="wheel?op=1" class="<?php if (!isset($_smarty_tpl->tpl_vars['op']->value) || $_smarty_tpl->tpl_vars['op']->value == 1) {?>current<?php }?>">进行中</a></li>
						        <li><a href="wheel?op=2" class="<?php if (isset($_smarty_tpl->tpl_vars['op']->value) && $_smarty_tpl->tpl_vars['op']->value == 2) {?>current<?php }?>">未开始</a></li>
						        <li><a href="wheel?op=3" class="<?php if (isset($_smarty_tpl->tpl_vars['op']->value) && $_smarty_tpl->tpl_vars['op']->value == 3) {?>current<?php }?>">已结束</a></li>
						      
					      </ul>
		            </div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 创建并管理大转盘抽奖活动</li>
				</ul>
		     </div>
		    
            <div id="flexigrid">
            </div>
	</div>
	<?php echo '<script'; ?>
>
$(function(){

	$("#flexigrid").flexigrid({
		url: 'get_store_list?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>',
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
			{display: '活动名称', name : 'wheels_name', width : 150, sortable : true, align: 'center'},
			{display: '每次所需积分', name : 'point', width : 150, sortable : true, align: 'left'},
			{display: '参与人数', name : 'user_num', width : 150, sortable : true, align: 'left'},
			{display: '参与人次', name : 'wheels_num', width : 150, sortable : true, align: 'left'},
			{display: '活动备注', name : 'rule', width : 150, sortable : true, align: 'left'},
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>创建领券活动', name : 'add', bclass : 'add', title : '创建新会员送券', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>结束活动', name : 'stop', bclass : 'stop', title : '结束活动', onpress : fg_operate },
		],
		searchitems : [
			{display: '活动名称', name : 'wheels_name'},
		],
		title: '发券给导购活动列表'
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
    	window.location.href="wheel_edit";
    }else if(name=='stop'){
    	var itemlist = new Array();
    	if($('.trSelected',grid).length>0){
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
        }
    	itemlist = itemlist.join(',');
    	update_ad_management(itemlist);
    }
}
});

//活动编辑
function fg_edit(wheels_id){

	//window.location.href="wheel_prize_set";

	window.location.href="wheels_update?state=update&wheels_id="+wheels_id;
}
function fg_stop(wheels_id) {

	$.post("end_wheel_action", {wheels_id: wheels_id},
			function (data) {
				//测试按钮
				window.location.href = "wheel";
			});
}






<?php echo '</script'; ?>
>
			<div id="goTop">
				<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
				<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
			</div>
	</body>

	</html><?php }
}
