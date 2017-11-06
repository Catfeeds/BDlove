<?php
/* Smarty version 3.1.29, created on 2017-08-08 14:36:51
  from "D:\www\yunjuke\application\admin\views\public_store_of_shopping_guide.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59895c03090ab3_30722540',
  'file_dependency' => 
  array (
    '7689781f32eb54762868770ddb58d1829335620e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\public_store_of_shopping_guide.html',
      1 => 1501668868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59895c03090ab3_30722540 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3060659895c02e679e0_04777591';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>

		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
				
				         <a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
							<div class="subject">
								<h3>店铺管理 - 门店<?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['store_name'])) {?>(<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_name'];?>
)<?php }?>导购管理</h3>
								<h5><?php if (isset($_smarty_tpl->tpl_vars['role']->value) && $_smarty_tpl->tpl_vars['role']->value == 'w') {?>微商城<?php } elseif ($_smarty_tpl->tpl_vars['role']->value == 'd') {?>电商<?php } elseif ($_smarty_tpl->tpl_vars['role']->value == 'g') {?>供应仓库<?php } else { ?>平台<?php }?>中的导购管理</h5>
							</div>
							<?php if (isset($_smarty_tpl->tpl_vars['store_data']->value['store_id'])) {?>
		                <ul class="tab-base nc-row">
						        <li><a href="store_edit?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];?>
">基本信息</a></li>
						        <li><a  href="store_of_goods?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];?>
">商品</a></li>
						        <li><a href="JavaScript:void(0);" class="current" >导购</a></li>
						        <li><a href="mall_express_tools?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>&op=&id=<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];?>
">运费</a></li>
						        <li><a href="store_of_other?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['store_data']->value['store_id'];?>
">其他</a></li>
					      </ul>
					      <?php }?>
				</div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 若绑定云聚客后为未认证公众号，之后通过了微信认证，请重新授权补充权限。</li>
					<li>仅微信认证后的服务号可使用完整云聚客功能，若微信公众号接口异常，根据提示处理后请点击上方重新授权。</li>
					<li> 若公众号为订阅号，需通过微信认证才可支持微信支付；服务号均可支持。</li>
				</ul>
		     </div>
            <div id="flexigrid">
            </div>
	</div>
	<?php echo '<script'; ?>
>
$(function(){

	$("#flexigrid").flexigrid({
		url: 'get_store_shopping_guide?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>&id=<?php if (isset($_smarty_tpl->tpl_vars['store_id']->value)) {
echo $_smarty_tpl->tpl_vars['store_id']->value;
}?>',
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
			//{display: '导购ID', name : 'storelogo', width : 150, sortable : true, align: 'left'},
			{display: '导购昵称', name : 'storelogo', width : 150, sortable : true, align: 'left'},
			{display: '导购姓名', name : 'member_name', width : 150, sortable : true, align: 'left'},
			{display: '电话', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '职位', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '所属门店', name : 'member_mobile', width : 200, sortable : true, align: 'left'},
			{display: '分销返点比例', name : 'distribution_point', width : 80, sortable : true, align: 'left'},
			{display: '会员交易单数', name : 'order_total', width : 80, sortable : true, align: 'left'},
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>新增导购', name : 'add', bclass : 'add', title : '新增数据', onpress : fg_operate },
			/* {display: '<i class="fa fa-file-excel-o"></i>批量新增导购', name : 'more', bclass : 'more', title : '将批量导入导购', onpress : fg_operate }, */
			{display: '<i class="fa fa-trash-o"></i>批量离职', name : 'del', bclass : 'del', title : '将删除导购', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>批量下载导购二维码', name : 'download', bclass : 'download', title : '', onpress : fg_operate },
		],
		searchitems : [
			{display: '导购电话', name : 'spg_tel'},
			{display: '导购姓名', name : 'spg_name'},
		],
		title: '导购列表'
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
    }else if(name == 'more'){
    	/*批量导入导购*/
    	data_import('导购',"<?php echo base_url('admin.php');?>
/write_import/excel_upload",'storeGuide_import?name=');
    }else if (name == 'add') {
    	window.location.href="store_shopping_guide_edit?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>&id=<?php if (isset($_smarty_tpl->tpl_vars['store_id']->value)) {
echo $_smarty_tpl->tpl_vars['store_id']->value;
}?>";
    }else if (name == 'del') {
    	if($('.trSelected',grid).length>0){
            var itemlist = new Array();
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
            fg_delete(itemlist);
        }else{
        	layer.msg('请选择要办理离职的导购',{icon:2});
            return false;
        }
    }else if(name == 'download'){
    	var itemlist = new Array();
    	if($('.trSelected',grid).length>0){
            $('.trSelected',grid).each(function(){
            	itemlist.push($(this).attr('data-id'));
            });
        }
    	itemlist = itemlist.join(',');
    	$.ajax({
	        type: "post",
	        dataType: "json",
	        url: '<?php echo base_url("vmall.php/receive/download_much_short");?>
',
	        data: "id=" + itemlist,
	        beforeSend:function(){
				layer.msg('正在下载，请稍等', {icon: 1});
			},
	        success: function(data){
			if(data.state=='403'){
				login_ajax('shopadmin');
			}else
	        	if(data.state){
	        		
	        		location.href = data.data;
	        		layer.msg(data.msg, {icon: 1});
	        	}else{
	        		layer.msg(data.msg, {icon: 2});
	        	}
	        	
	        }
	    });
    }
}
});
/*下载二维码*/
function create_shot_code(id){
	window.location.href='<?php echo base_url("vmall.php/receive/create_shot_code?id=");?>
'+id;
}
/*编辑*/
function fg_edit(id){
	window.location.href="store_shopping_guide_edit?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>&id="+id;
}



/*修改职务*/
function update_role(id,check,role,name){
	role_ = (role==2)?'店长':((role==1)?'导购':'兼职导购');		//目前角色的身份
            str_grade = "<?php if (!empty($_smarty_tpl->tpl_vars['roles_str']->value)) {
echo $_smarty_tpl->tpl_vars['roles_str']->value;
} else { ?>''<?php }?>";
            $.ajax({
                type: "post",
                dataType: "json",
                url: "select_store?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>",
                data: "id="+id,
                success: function(data){
                    if(data.state=='403'){
                        login_ajax('shopadmin');
                    }else if(data.state){
                        var content_grade = '<div class="pt-10 pb-10 pl-30 pr-30 ">'+
                            '<form action="" id="changeRoleType" method="POST"><table class="table"><tbody>'+
                            '<tr> <td width="20%">职务选择:</td><td  width="50%"><select name="role_type" value="" class="role_type">'+
                            str_grade+'</select> </td></tr></tbody></table></form></div>';
                        layer.open({
                            type: 1,
                            btn: ['确认', '取消'],
                            title: '<b>修改'+role_+name+'的职务</b>',
                            skin: 'layui-layer-rim', //加上边框
                            area: ['320px', 'auto'], //宽高
                            content: content_grade,
                            yes: function(index,layero){
                                role_type = $('#changeRoleType').find('.role_type').val()
                                    $.ajax({
                                        type: "post",
                                        dataType: "json",
                                        url: "update_role",
                                        data: {id:id,role:role_type,check:check},
                                        success: function(data){
                                            if(data.state=='403'){
                                                login_ajax('shopadmin');
                                            }else if(data.state){
                                                layer.msg(data.msg);
                                                $("#flexigrid").flexReload();
                                                layer.close(index);
                                            }else{
                                                layer.msg(data.msg);
                                            }
                                        }
                                    });
                            },no:function(){
                                layer.closeAll();
                            }
                        })
                    }
                }
            })
}

/*删除*/
function fg_delete(id,name){
	title = '';
	if(!name){
		title = '这'+id.length+'个导购';
		id = id.join(',');
		
	}else{
		title = '导购’'+name+'’';
	}
	layer.confirm('确认让'+title+'离职吗？',
			   {btn: ['确认','取消']}, 
			   function(){
				   $.ajax({
				        type: "post",
				        dataType: "json",
				        url: "del_guide?role=<?php if (isset($_smarty_tpl->tpl_vars['role']->value)) {
echo $_smarty_tpl->tpl_vars['role']->value;
}?>",
				        data: {id:id},
				        success: function(data){
						  if(data.state=='403'){
					           login_ajax('shopadmin');
				            }else if(data.state){
				            	layer.msg(data.msg);
				            	$("#flexigrid").flexReload();
				            	layer.close(index);
				            }else{
				            	$("#flexigrid").flexReload();
				            	layer.alert(data.msg);
				            }
				        }
				   })
			   }
	)
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
