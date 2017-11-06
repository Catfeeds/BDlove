<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:33:43
  from "D:\www\yunjuke\application\admin\views\goods_brand_management.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c227e7cd8920_84032134',
  'file_dependency' => 
  array (
    'c8b95b8e8d261f76876604d02d0f70ffab9b7112' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_brand_management.html',
      1 => 1501554806,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59c227e7cd8920_84032134 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3249359c227e7b906d7_28060201';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>品牌管理</h3>
                <h5>商品品牌管理及店铺申请品牌审核</h5>
            </div>
        </div>
    </div>
    <!-- 操作提示 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>当店主添加商品时可选择商品品牌，用户可根据品牌查询商品列表</li>
            <li>被推荐品牌，将在前台品牌推荐模块处显示</li>
            <li>在品牌列表页面，品牌将按类别分组，即具有相同类别的品牌为一组，品牌类别与品牌分类无联系</li>
        	<li>未设置图片的品牌，默认文字展示</li>
        </ul>
    </div>   
    <div id="flexigrid"></div>
</div>
<?php echo '<script'; ?>
>
    $(function(){
        $("#flexigrid").flexigrid({
            url: 'goods_brand_management?op=getList',
            colModel : [
                {display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle'},
                {display: '品牌ID', name : 'brand_id', width : 40, sortable : true, align: 'center'},
                {display: '品牌名称', name : 'brand_name', width : 150, sortable : false, align: 'left'},
                {display: '首字母', name : 'brand_initial', width : 120, sortable : true, align: 'center'},
                {display: '品牌图片', name : 'brand_pic', width : 120, sortable : false, align: 'left'},
                {display: '品牌排序', name : 'brand_sort', width: 60, sortable : true, align : 'center'},
                {display: '品牌推荐', name : 'brand_recommend', width: 60, sortable : true, align : 'center'},
                {display: '展示形式', name : 'show_type', width : 80, sortable : true, align: 'center'}
            ],
            buttons : [
                {display: '<i class="fa fa-plus"></i>新增数据', name : 'add', bclass : 'add', title : '添加一条新数据到列表', onpress : fg_operate },
                {display: '<i class="fa fa-file-excel-o"></i>导出数据', name : 'export', bclass : 'export', title : '将选定行数据导出excel文件', onpress : fg_operate }
            ],
            searchitems : [
                {display: '品牌ID', name : 'brand_id', isdefault: true},
                {display: '品牌名称', name : 'brand_name'},
                {display: '首字母', name : 'brand_initial'}
            ],
            sortname: "brand_id",
            sortorder: "desc",
            title: '品牌列表'
        });
        $(".img_big").hover(
                function(){
                	var src=$("#img_").attr('src');
                    layer.tips('<img src="'+src+'" height="100" width="200">','#img_', {
                        tips: [2, '#f9f9f9']
                    });
                },
                function(){}
        )
    });
    function fg_operate(name, grid) {
        if (name == 'add') {
        	window.location.href = 'goods_brand_add';
        }else if (name == 'export') {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                	itemlist.push($(this).attr('data-id'));
                });
                fg_export(itemlist);
            }else{
                layer.msg('请至少选择一项需要导出的数据！');
            }
        }
    }
    
    function fg_edit(brand_id) {
        window.location.href = 'goods_brand_edit?brand_id='+brand_id;
    }
    
    function fg_delete(id) {
    	if (typeof id == 'number') {
        	var id = new Array(id.toString());
    	};
    	layer.confirm('确认要删除这 ' + id.length + ' 项吗？', {
			  btn: ['确认','取消'] //按钮
			}, function(){
		    ids = id.join(',');
		    $.ajax({
	            type: "GET",
	            dataType: "json",
	            url: "goods_brand_edit?op=delete&brand_id="+ids,
	            data: '',
	            success: function(data){
				if(data.state=='403'){
				login_ajax('shopadmin');
			}else
		        	if(data.state==false){
		        		layer.msg(data.msg);
		        	}else if(data.state==true){
			        	layer.msg(data.msg);
		        	}
		        	window.location.href="goods_brand_management";
		        }
	        });
		});	    
    }
    /*导出*/
    function fg_export(ids) {
    	id = ids.join(',');
       	window.location.href = 'goods_brand_export?id='+id; 
    }


<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
