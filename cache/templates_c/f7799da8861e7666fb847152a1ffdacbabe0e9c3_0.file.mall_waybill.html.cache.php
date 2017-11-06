<?php
/* Smarty version 3.1.29, created on 2017-08-11 16:51:02
  from "D:\www\yunjuke\application\pay\views\mall_waybill.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598d6ff6e930a0_63871041',
  'file_dependency' => 
  array (
    'f7799da8861e7666fb847152a1ffdacbabe0e9c3' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\mall_waybill.html',
      1 => 1501581895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
    'file:common_list_page.html' => 1,
  ),
),false)) {
function content_598d6ff6e930a0_63871041 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '29243598d6ff6d99063_17328456';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    .btn{border:none}
    a:hover{
    	color: #333;
    }
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>运费管理
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div id="tab_demo" class="HuiTab">
			<div class="tabBar clearfix">
				<a href="mall_express_tools"><span>运费管理</span></a>
				<a href="mall_express"><span>物流公司</span></a>
				<a href="mall_waybill"><span>运单模板</span></a>
			</div>
		</div>
        <table class="table table-border table-bordered table-hover table-bg table-content mt-20">
            <thead>
            <tr>
                <th scope="col" colspan="13">运费模板列表</th>
            </tr>
            <tr class="text-c">
                <th width=""><input type="checkbox" value="" name="" onclick="content_checkAll(this)"></th>
                <th width="">运单名称</th>
                <th width="">物流公司</th>
                <th width="">运单图例</th>
                <th width="">上偏移量</th>
                <th width="">下偏移量</th>
                <th width="">是否启用</th>
                <th width="">操作</th>
            </tr>

            </thead>
            <tbody>
            <tr>
                <td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>
            </tr>
            </tbody>
        </table>
</div>
<div class="flexigrid">
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common_list_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<?php echo '<script'; ?>
>
	
	//	实现tab切换的源码
	jQuery.Huitab =function(tabBar,tabCon,class_name,tabEvent,i){
	var $tab_menu=$(tabBar);
	  // 初始化操作
	  $tab_menu.removeClass(class_name);
	  $(tabBar).eq(i).addClass(class_name);
	  $(tabCon).hide();
	  $(tabCon).eq(i).show();
  
  	$tab_menu.bind(tabEvent,function(){
  	  $tab_menu.removeClass(class_name);
      $(this).addClass(class_name);
      var index=$tab_menu.index(this);
      $(tabCon).hide();
      $(tabCon).eq(index).show()})}
    $.Huitab("#tab_demo .tabBar span","#tab_demo .tabCon","current","click","2");
	
    $(function(){
        var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
        $(".select2").select2();
        $('#searchBtn').click(function(){
            load_page_to(url);
        });
        load_page(url);
    });
    function mall_waybill_design(id){
        window.location="mall_waybill_design?data="+id;

    }
    function mall_waybill_test(id){
        window.location="mall_waybill_test?data="+id
    }
    function mall_waybill_edit(id){
        window.location="mall_waybill_edit?data="+id
    }
    function mall_waybill_del(id,name){
        layer.confirm('确认删除模板'+name+'吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                type: "post",
                dataType: "json",
                url: "mall_waybill_del",
                data: {waybill_id:id},
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else  if (data.state){
                        layer.msg(data.msg);
                    } else {
                        layer.msg(data.msg);
                    }
                    $.get('mall_waybill',function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
                }
            });
        });
    }

<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
