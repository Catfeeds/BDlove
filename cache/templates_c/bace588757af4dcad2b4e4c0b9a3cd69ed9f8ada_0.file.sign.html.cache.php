<?php
/* Smarty version 3.1.29, created on 2017-11-01 14:04:58
  from "D:\www\yunjuke\application\admin\views\sign.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f9640a45db75_07671733',
  'file_dependency' => 
  array (
    'bace588757af4dcad2b4e4c0b9a3cd69ed9f8ada' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\sign.html',
      1 => 1509354551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59f9640a45db75_07671733 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1044259f9640a37b245_20980588';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
		          
							<div class="subject">
								<h3>签到</h3>
								<h5>签到活动管理</h5>
							</div>
		                <ul class="tab-base nc-row">
						       
						        <!--<li><a href="sign?op=1" class="<?php if (!isset($_smarty_tpl->tpl_vars['op']->value) && $_smarty_tpl->tpl_vars['op']->value == 1) {?>current<?php }?>">已开启</a></li>-->
						        <!--<li><a href="sign?op=2" class="<?php if (isset($_smarty_tpl->tpl_vars['op']->value) && $_smarty_tpl->tpl_vars['op']->value == 2) {?>current<?php }?>">未开启</a></li>-->
						        <!--<li><a href="sign?op=3" class="<?php if (isset($_smarty_tpl->tpl_vars['op']->value) && $_smarty_tpl->tpl_vars['op']->value == 3) {?>current<?php }?>">已结束</a></li>-->
						      
					      </ul>
		            </div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 创建并管理签到活动</li>
				</ul>
		     </div>
		    
            <div id="flexigrid">
            </div>
	</div>
	<?php echo '<script'; ?>
>
$(function(){

	$("#flexigrid").flexigrid({

		url:'get_sign_list?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>',
		colModel : [
			{display: '操作', name : 'operation', width : 200, sortable : false, align: 'center', className: 'handle-s'},
			{display: '签到活动名称', name : 'sign_title', width : 150, sortable : true, align: 'center'},
//			{display: '每次所需积分', name : 'point', width : 150, sortable : true, align: 'left'},
//			{display: '参与人数', name : 'user_num', width : 150, sortable : true, align: 'left'},
//			{display: '参与人次', name : 'wheels_num', width : 150, sortable : true, align: 'left'},
			{display: '活动规则', name : 'sign_rule', width : 150, sortable : true, align: 'left'},
            {display: '活动开始时间', name : 'sign_start_time', width : 150, sortable : true, align: 'left'},
            {display: '活动结束时间', name : 'sign_end_time', width : 150, sortable : true, align: 'left'},
            {display: '活动状态', name : 'remark', width : 150, sortable : true, align: 'left'},
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>创建签到活动', name : 'add', bclass : 'add', title : '创建新会员送券', onpress : fg_operate },
//			{display: '<i class="fa fa-file-excel-o"></i>结束活动', name : 'stop', bclass : 'stop', title : '结束活动', onpress : fg_operate },
		],
		searchitems : [
			{display: '活动名称', name : 'sign_title'},
		],
		title: '签到活动列表'
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
    	window.location.href="sign_edit";
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
function fg_edit(sign_id){
	//window.location.href="wheel_prize_set";
	window.location.href="sign_update?state=update&sign_id="+sign_id;
}
//删除活动
function fg_del(sign_id){
    if(confirm('确认删除该活动吗')){
        $.post("sign_del", {sign_id: sign_id},
			function(data){
            if(data.state){
                alert(data.message);
                window.location.href = "sign";
			}
			},
			'json'
		)
	}
}
//结束活动
function fg_stop(sign_id,op) {
	$.post("end_sign_action", {sign_id: sign_id,op:op},
		function (data) {
				if(data.state==1){
				    alert(data.message);
                    window.location.href = "sign";
				}
				if(data.state==2) {
                    if (confirm(data.message)) {
                        $.post("end_sign_action", {sign_id: sign_id,op:0},
                            function (res) {
                                alert(res.message);
                                window.location.href = "sign";
                            },
                            'json'
                        )
                    }
                }
                if(data.state==3){
                    alert(data.message);
                    window.location.href = "sign";
                }
//				window.location.href = "sign";
			},
		'json'
	);
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
