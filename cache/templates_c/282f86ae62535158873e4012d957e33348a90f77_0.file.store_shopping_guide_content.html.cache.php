<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:48:18
  from "D:\www\yunjuke\application\admin\views\store_shopping_guide_content.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598418b2b06a87_60067561',
  'file_dependency' => 
  array (
    '282f86ae62535158873e4012d957e33348a90f77' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_shopping_guide_content.html',
      1 => 1501558622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598418b2b06a87_60067561 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '30007598418b29e97c2_52807629';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<body style="background-color: #FFF; overflow: auto;">
		<div id="append_parent"></div>
		<div id="ajaxwaitid"></div>

		<div class="page">
			<div class="fixed-bar">
				<div class="item-title">
					<div class="subject">
						<h3>导购管理</h3>
						<h5>管理店铺里的导购</h5>
					</div>
					<ul class="tab-base nc-row">
						<li>
							<a  href="store_shopping_guide">导购管理</a>
						</li>
						<li>
							<a class="current" href="store_shopping_guide_content">导购评价</a>
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
					<!-- <li> 若绑定洽客后为未认证公众号，之后通过了微信认证，请重新授权补充权限。</li>
					<li>仅微信认证后的服务号可使用完整洽客功能，若微信公众号接口异常，根据提示处理后请点击上方重新授权。</li>
					<li> 若公众号为订阅号，需通过微信认证才可支持微信支付；服务号均可支持。</li> -->
					<li>关于导购评价的记录信息</li>
				</ul>
		     </div>
            <div id="flexigrid">
            </div>
	</div>
	<?php echo '<script'; ?>
>
$(function(){

	$("#flexigrid").flexigrid({
		url: './get_shopping_guide_content',
		colModel : [
            {display: '评价时间', name : 'storelogo', width : 150, sortable : true, align: 'left'}, 
			{display: '会员信息（昵称/姓名/联系方式）', name : 'storelogo', width : 350, sortable : true, align: 'left'},
			{display: '导购(昵称/姓名)/所属门店', name : 'storelogo', width : 250, sortable : true, align: 'left'},
			{display: '涉及订单', name : 'storelogo', width : 250, sortable : true, align: 'left'},
			{display: '评价印象', name : 'storelogo', width : 350, sortable : true, align: 'left'}
			
		],
		buttons : [
			{display: '<i class="fa fa-file-excel-o"></i>导出数据', name : 'csv', bclass : 'csv', title : '将选定行数据导出CVS文件',onpress : fg_operate  }
		],
		searchitems : [
			{display: '导购电话', name : 'spg_tel'},
			{display: '导购姓名', name : 'spg_name'},
			{display: '所属门店', name : 'store_name'},
		],
		title: '评价列表'
	});
	  function fg_operate(name, grid) {
		 if (name == 'csv'){
		    	var itemlist = new Array();
		        if($('.trSelected',grid).length>0){
		            $('.trSelected',grid).each(function(){
		            	itemlist.push($(this).attr('data-id'));
		            });
		        }
	            fg_csv(itemlist);
	        }
	}
	function fg_csv(ids){
		if(ids.length == 0 ){
			layer.msg('请至少选择一项需要导出的数据');
			return false;
		}
		
		id = ids.join(',');
		window.location.href = 'store_shopping_guide_excel?id=' + id;

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
