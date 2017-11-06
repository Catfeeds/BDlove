<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:10:57
  from "D:\www\yunjuke\application\admin\views\PromotionCouponOfReceive.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c2229160ba36_93277858',
  'file_dependency' => 
  array (
    'd0eb7f63bb4ebc14e0443a43373e769d74d0969b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\PromotionCouponOfReceive.html',
      1 => 1492225916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59c2229160ba36_93277858 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2946559c22291529108_41246836';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
		          
							<div class="subject">
								<h3>领券活动</h3>
								<h5>平台中的所有新闻的管理</h5>
							</div>
		                <ul class="tab-base nc-row">
						       
						        <li><a href="JavaScript:void(0);" class="current">进行中</a></li>
						        <li><a href="JavaScript:void(0);">未开始</a></li>
						        <li><a href="JavaScript:void(0);">已结束</a></li>
						      
					      </ul>
		            </div>
			</div>
			<!-- 操作说明 -->
			<div class="explanation" id="explanation">
				<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
					<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
					<span id="explanationZoom" title="收起提示"></span> </div>
				<ul>
					<li> 若绑定洽客后为未认证公众号，之后通过了微信认证，请重新授权补充权限。</li>
					<li>仅微信认证后的服务号可使用完整洽客功能，若微信公众号接口异常，根据提示处理后请点击上方重新授权。</li>
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
		url: 'get_store_list?op=<?php if (isset($_smarty_tpl->tpl_vars['op']->value)) {
echo $_smarty_tpl->tpl_vars['op']->value;
}?>',
		colModel : [
			{display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle-s'},
			{display: '活动时间', name : 'storelogo', width : 150, sortable : true, align: 'center'},
			{display: '发放总数', name : 'member_name', width : 150, sortable : true, align: 'left'},
			{display: '被领取数', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '优惠券类型', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '已付订单数', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '已付订单额', name : 'member_email', width : 150, sortable : true, align: 'left'},
			{display: '活动备注', name : 'member_email', width : 150, sortable : true, align: 'left'},
		],
		buttons : [
			{display: '<i class="fa fa-plus"></i>创建领券活动', name : 'add', bclass : 'add', title : '创建新会员送券', onpress : fg_operate },
			{display: '<i class="fa fa-file-excel-o"></i>结束活动', name : 'stop', bclass : 'stop', title : '结束活动', onpress : fg_operate },
		],
		searchitems : [
			{display: '优惠券类型', name : 'ous_tel'},
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
    	window.location.href="CouponOfReceiveEdit";
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

<?php echo '</script'; ?>
>
			<div id="goTop">
				<a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
				<a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
			</div>
	</body>

	</html><?php }
}
