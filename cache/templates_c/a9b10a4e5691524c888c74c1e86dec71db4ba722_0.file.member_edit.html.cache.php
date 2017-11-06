<?php
/* Smarty version 3.1.29, created on 2017-07-28 14:07:46
  from "D:\www\yunjuke\application\admin\views\member_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597ad4b2368593_12249837',
  'file_dependency' => 
  array (
    'a9b10a4e5691524c888c74c1e86dec71db4ba722' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\member_edit.html',
      1 => 1498098958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597ad4b2368593_12249837 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '11578597ad4b2116908_82925872';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<style>
		.table-title {
			background: #ccc;
			color: #fff;
		}
		
		.logo {
			width: 100px;
			height: 100px;
		}
		
		.logo-img {
			max-width: 100%;
			height: auto;
			border-radius: 50%;
		}
		
		.tabBar {
			width: 100%;
			height: 40px;
			font-size: 14px;
			font-weight: 600;
			border: 1px solid #ddd;
			margin-top: 30px;
			background-color: #f5f5f5;
		}
		
		.tabBar span {
			background-color: #f5f5f5;
			border: 0;
			cursor: pointer;
			display: inline-block;
			float: left;
			height: 40px;
			line-height: 40px;
			padding: 0 15px;
		}
		
		.tab-content {
			padding: 15px;
			margin: 20px 0;
			border: 1px solid #ddd;
			font-size: 14px;
		}
		
		.recordtotla {
			margin-top: 20px;
		}
		.tabBar span.current{
			border-top: 2px solid #b9554e;
			color: #b9554e;
		}
		
		.table-title {
    		background: #bbb;
    		color: #fff;
		}
		.value{
			display: none;
		}
		#tel{
			cursor: pointer;
		}
		#qq{
			cursor: pointer;
		}
	</style>

	<body style="background-color: #FFF; overflow: auto;">
		
		
		
		
		
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>

		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<a class="back" href="javascript:window.history.back();" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>会员详情</h3>
						<h5>网站所有注册会员索引及管理</h5>
					</div>
				</div>
			</div>

			<div class="row">
				<table class="table table-border table-bordered table-striped">
					<tr>
						<td rowspan="8" class="text-c">
							<div class="logo"><img src="<?php echo $_smarty_tpl->tpl_vars['info']->value['head_portrait'];?>
" alt="logo" class="logo-img" /></div>
							<p><?php echo $_smarty_tpl->tpl_vars['info']->value['user_name'];?>
</p>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="table-title text-c">基础信息</td>
						<td colspan="2" class="table-title text-c">消费信息</td>
						<td colspan="2" class="table-title text-c">其他信息</td>
					</tr>
					<tr>
						<td class="text-r">创建时间：</td>
						<td><?php echo $_smarty_tpl->tpl_vars['info']->value['reg_time'];?>
</td>
						<td class="text-r">订单数：</td>
						<td><?php echo $_smarty_tpl->tpl_vars['info']->value['order_num'];?>
</td>
						<td class="text-r">未使用优惠券：</td>
						<td><?php echo $_smarty_tpl->tpl_vars['info']->value['coupon_num'];?>
</td>
					</tr>
					<tr>
						<td class="text-r">微信昵称：</td>
						<td><?php echo $_smarty_tpl->tpl_vars['info']->value['wx_nickname'];?>
</td>
						<td class="text-r">订单额：</td>
						<td>￥<?php echo $_smarty_tpl->tpl_vars['info']->value['order_money_num'];?>
</td>
						<td class="text-r">剩余积分：</td>
						<td><?php echo $_smarty_tpl->tpl_vars['info']->value['integral'];?>
</td>
					</tr>
					<tr>
						<td class="text-r">是否关注：</td>
						<td><?php if ($_smarty_tpl->tpl_vars['info']->value['is_follow'] == 1) {?>已关注<?php } else { ?>未关注<?php }?></td>
						<td class="text-r">最近消费时间：</td>
						<td><?php echo $_smarty_tpl->tpl_vars['info']->value['pay_time'];?>
</td>
						<td class="text-r">会员等级：</td>
						<td><?php echo $_smarty_tpl->tpl_vars['info']->value['mld_name'];?>
</td>
					</tr>
					<tr>
						<td class="text-r">Tel：</td>
						<td colspan="5" id="tel"><span id="telspan"><?php if (!empty($_smarty_tpl->tpl_vars['info']->value['tel'])) {
echo $_smarty_tpl->tpl_vars['info']->value['tel'];
}?></span><div class="value" op="tel"><input class="telspan" type="text" /></div></td>
					</tr>
					<tr>
						<td class="text-r">QQ：</td>
						<td colspan="5" id="qq"><span id="qqspan"><?php if (!empty($_smarty_tpl->tpl_vars['info']->value['qq'])) {
echo $_smarty_tpl->tpl_vars['info']->value['qq'];
}?></span><div class="value" op="qq"><input class="qqspan" type="text" /></div></td>
					</tr>
					<tr>
						<td class="text-r">会员标签：</td>
						<td colspan="5">暂无</td>
					</tr>
				</table>
			</div>

			<div id="tab_demo" class="HuiTab">
				<div class="tabBar clearfix">
					<span id="span1">关注及绑定</span>
					<!-- <span id="span2">会员卡信息</span> -->
					<span id="span3">订单消费</span>
					<span id="span4">会员积分</span>
					<!-- <span id="span5">会员等级</span> -->
					<span id="span6">导购评价</span>
					<span id="span7">商品评价</span>
				</div>
				<div class="tabCon">
					<div class="tab-content">当前绑定导购：<?php if (!empty($_smarty_tpl->tpl_vars['info']->value['spg_name'])) {
echo $_smarty_tpl->tpl_vars['info']->value['spg_name'];
} else { ?>未绑定导购<?php }?></div>
					<div class="tab-content">
						<table class="table">
							<thead>
								<tr>
									<th>时间</th>
									<th>操作</th>
									<th>备注</th>
								</tr>
							</thead>
							<tbody>
							    <?php if (!empty($_smarty_tpl->tpl_vars['info']->value['wx_action'])) {?>
								    <?php
$_from = $_smarty_tpl->tpl_vars['info']->value['wx_action'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
								    <tr>
										<td><?php echo $_smarty_tpl->tpl_vars['val']->value['wx_action_time'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['val']->value['wx_action'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['val']->value['note'];?>
</td>
									</tr>
									<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
if ($__foreach_val_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_0_saved_key;
}
?>
								 <?php }?>
							</tbody>
						</table>
						<p class="recordtotla">共有<span><?php echo $_smarty_tpl->tpl_vars['info']->value['action_nums'];?>
</span>条记录</p>
					</div>
				</div>
			</div>
			<div id="flexigrid">

	        </div>

		</div>
		<?php echo '<script'; ?>
>
		$(function(){
            var id = 'span1' ;
            var idds = "";
            get_span1();
            $("#span1").css({"background-color":"#bbb","color":"#fff"});
            $(".HuiTab").on("click",".clearfix span",function(){
            	id = $(this).attr("id");
            	$(this).siblings().css({"background-color":"","color":"#333"});
            	$(this).css({"background-color":"#bbb","color":"#fff"});
            	$(".flexigrid").remove();
            	$(".page").append('<div id="flexigrid"></div>');
                if(id =='span1'){
                	get_span1();
                }
                if(id =='span3'){
                	get_span3();
                }
                if(id =='span4'){
                	get_span4();
                }
                if(id =='span5'){
                	get_span5();
                }
                if(id =='span6'){
                	get_span6();
                }
                if(id =='span7'){
                	get_span7();
                }
            });
    
		});
		
		function  get_span1(){
			$("#flexigrid").flexigrid({
					url: '../get_user_info?op=guide&user_id='+<?php echo $_smarty_tpl->tpl_vars['info']->value['user_id'];?>
,
					colModel : [
						{display: '时间', name : 'operation', width : 250, sortable : false, align: 'center'},
						{display: '操作', name : 'member_id', width : 150, sortable : true, align: 'center'},
						{display: '备注', name : 'member_name', width : 500, sortable : true, align: 'center'}
					],
					sortname : "wx_action_time",	//自定义排序事件
					sortorder : "desc"	//正倒序
			});
		}
		
		function  get_span3(){
			$("#flexigrid").flexigrid({
				url: '../get_user_info?op=order&user_id='+<?php echo $_smarty_tpl->tpl_vars['info']->value['user_id'];?>
,
				colModel : [
                    {display: '操作', name : 'memberid', width : 100, sortable : true, align: 'center'},
					{display: '订单编号', name : 'operation', width : 250, sortable : false, align: 'center'},
					/* {display: '单价', name : 'member_id', width : 100, sortable : true, align: 'center'}, */
					{display: '购买店铺', name : 'member_name', width : 150, sortable : true, align: 'center'},
					{display: '订单状态', name : 'operation', width : 150, sortable : false, align: 'center'},
					{display: '支付方式', name : 'member_id', width : 100, sortable : true, align: 'center'},
					{display: '物流方式', name : 'member_name', width : 200, sortable : true, align: 'center'},
					{display: '订单总价', name : 'operation', width : 150, sortable : false, align: 'center'},
					{display: '下单时间', name : 'operation', width : 150, sortable : false, align: 'center'}
				],
				sortname : "created_time",	//自定义排序事件
				sortorder : "desc"	//正倒序
			});
		}
		function  get_span4(){
			$("#flexigrid").flexigrid({
				url: '../get_user_info?op=integral&user_id='+<?php echo $_smarty_tpl->tpl_vars['info']->value['user_id'];?>
,
				colModel : [
					{display: '操作时间', name : 'operation', width : 250, sortable : false, align: 'center'},
					{display: '后台操作人', name : 'member_id', width : 150, sortable : true, align: 'center'},
					{display: '操作方式', name : 'member_name', width : 150, sortable : true, align: 'center'},
					{display: '增减积分数', name : 'member_id', width : 150, sortable : true, align: 'center'},
					{display: '订单号|备注', name : 'member_name', width : 350, sortable : true, align: 'center'}
				],
				sortname : "ation_time",	//自定义排序事件
				sortorder : "desc"	//正倒序
			});
		}
		function  get_span5(){
			$("#flexigrid").flexigrid({
				url: '../get_user_info?op=mld_exp&user_id='+<?php echo $_smarty_tpl->tpl_vars['info']->value['user_id'];?>
,
				colModel : [
					{display: '时间', name : 'operation', width : 250, sortable : false, align: 'center'},
					{display: '操作', name : 'member_id', width : 150, sortable : true, align: 'center'},
					{display: '备注', name : 'member_name', width : 350, sortable : true, align: 'center'}
				],
				sortname : "ation_time",	//自定义排序事件
				sortorder : "desc"	//正倒序
			});
		}
		function  get_span6(){
			$("#flexigrid").flexigrid({
				url: '../get_user_info?op=spg_content&user_id='+<?php echo $_smarty_tpl->tpl_vars['info']->value['user_id'];?>
,
				colModel : [
					{display: '评价时间', name : 'operation', width : 250, sortable : false, align: 'center'},
					{display: '评价导购', name : 'member_id', width : 150, sortable : true, align: 'center'},
					{display: '导购所属门店', name : 'member_name', width : 200, sortable : true, align: 'center'},
					{display: '涉及订单', name : 'member_id', width : 200, sortable : true, align: 'center'},
					{display: '评价印象', name : 'member_name', width : 350, sortable : true, align: 'center'}
				],
				sortname : "evaluation_time",	//自定义排序事件
				sortorder : "desc"	//正倒序
			});
		}
		function  get_span7(){
			$("#flexigrid").flexigrid({
				url: '../get_user_info?op=order_content&user_id='+<?php echo $_smarty_tpl->tpl_vars['info']->value['user_id'];?>
,
				colModel : [
					{display: '评价时间', name : 'operation', width : 200, sortable : false, align: 'center'},
					{display: '商品名称', name : 'member_id', width : 450, sortable : true, align: 'center'},
					{display: '涉及订单', name : 'member_name', width : 200, sortable : true, align: 'center'},
					{display: '评价内容', name : 'member_name', width : 250, sortable : true, align: 'center'}
				],
				sortname : "evaluation_time",	//自定义排序事件
				sortorder : "desc"	//正倒序
			});
		}

		$("#tel").dblclick(function(){
			idds = "telspan";
			$(this).find("span").hide();
			$(this).find(".value").show();
			$(this).find("input").val($(this).find("span").html());
			$(this).find("input").focus();
		})
		$("#qq").dblclick(function(){
			idds = "qqspan";
			$(this).find("span").hide();
			$(this).find(".value").show();
			$(this).find("input").val($(this).find("span").html());
			$(this).find("input").focus();
		})
		$(".value").focusout(function(){
			var urls = '../update_user_info?op='+$(this).attr("op")+'&user_id='+<?php echo $_smarty_tpl->tpl_vars['info']->value['user_id'];?>
+"&str="+encodeURI($(this).find("input").val());
	   		 $.ajax({
	   				type: "POST",
	   		        url: urls,
	   		        data: 123,
	   		        dataType: "json",
	   		        success: function(data){
	   		        	if(data.state){
	   		        		$("#"+idds).html($("."+idds).val());
	   	        	    }else{
	   	        	    	alert(data.msg);
	   	        	    }
	   		        }
	   			});
			$(this).hide();
			$(this).prev().show();
		})
		

		<?php echo '</script'; ?>
>
	</body>

	</html><?php }
}
