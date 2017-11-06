<?php
/* Smarty version 3.1.29, created on 2017-08-04 17:02:34
  from "D:\www\yunjuke\application\pay\views\goods_management_trash.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5984382aa50606_01287082',
  'file_dependency' => 
  array (
    '2e8f09df4d1df8226d653a3df08ac5ca66bc2259' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\goods_management_trash.html',
      1 => 1501722746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5984382aa50606_01287082 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '45785984382a86bf96_15700386';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<title>商品管理</title>
<style>
    .flexigrid .bDiv td div, .colCopy div{height:auto}
    .flexigrid .hDiv th, .flexigrid .bDiv td{vertical-align: middle !important;}
    .new_goods{color:white;background-color: red;}
    a:hover{
    	color: #333;
    }
</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>商品管理 <span class="c-gray en">&gt;</span>回收站
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div id="tab_demo" class="HuiTab">
		<div class="tabBar clearfix">
			<a href="goods_management"><span>总库商品</span></a>
			<a href="goods_management?op=shop_goods"><span>自建商品</span></a>
			<a href="javascript:;"><span>回收站</span></a>
		</div>
	</div>
    <div class="mt-10 mb-10">
        <form method="post" name="formSearch" id="formSearch">
            <div class="search mt-20 mb-10">
                <select name="brand_id" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10">
                    <option value="">-全部品牌-</option>
                    <?php if (!empty($_smarty_tpl->tpl_vars['brands']->value)) {?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['brands']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['brand_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['brand_name'];?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
                    <?php }?>
                </select>
                名称：
                <input type="text" name="goods_name" class="input-text input_text mb-10">
                款号：
                <input type="text" name="goods_spu" class="input-text input_text mb-10">
                <input type="button" class="btn btn-warning radius ml-10 mb-10" id="searchBtn" name="submit" value="搜索">
            </div>
        </form>
    </div>
    <table class="table table-border table-bordered table-hover table-bg table-content">
        <thead>
        <tr>
            <th scope="col" colspan="13">商品列表</th>
        </tr>
        <tr class="text-c">
            <th width=""><input type="checkbox" value="" name="" onclick="content_checkAll(this)"></th>
            <th width="">商品信息</th>
            <th width="">销量</th>
            <th width="">品牌</th>
            <th width="">添加时间</th>
            <th width="">操作</th>
        </tr>
        <tr><th  colspan="11">
            <span class="btn btn-danger radius" onclick="fg_operate('completely_delete')"><i class="fa fa-trash"></i>批量删除</span>
            <span class="btn btn-primary radius" onclick="fg_operate('restore')"><i class="fa fa-cloud-upload"></i>批量还原</span>
        </th></tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="13"><li class="goods_list mb-20 no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</li></td>
        </tr>
        </tbody>
    </table>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
	
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
	
    function get_check()
    {
        $("input[name='check']:checkbox").each(function(i) {
            if($(this).attr("checked")){
                $(this).parent().parent().addClass('trSelected');
            } else {
                $(this).parent().parent().removeClass('trSelected');
            }
        });
    }

    $(function(){
        var url = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';
        $(".select2").select2();
        $('#searchBtn').click(function(){
            load_page_to(url);
        });
        load_page(url);

    });
    function fg_edit(goods_id){
        window.location.href = "goods_edit_goods_second?op=edit&goods_id="+goods_id;
    }
    //下架
    function fg_unshelve(goods_id){
        layer.confirm('您确定要将此商品下架吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_unshelve?goods_id="+goods_id,
                data: '',
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.state == false){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.state == true){
                        layer.msg(data.msg);
                    }
                    $.get('goods_management?op=shop_goods&type=putaway',$('#formSearch').serialize(),function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
                }
            });
        })
    }
    //上架
    function fg_putaway(goods_id){
        layer.confirm('您确定要将此商品上架吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_putaway?goods_id="+goods_id,
                data: '',
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state==false){
                        layer.msg(data.msg);
                    }else if(data.state==true){
                        layer.msg(data.msg);
                    }
                    $.get('goods_management?op=shop_goods&type=putaway',function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
                }
            });
        })
    }

    function fg_operate(name, grid) {
        get_check();
        if (name == 'completely_delete') {  //彻底删除
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                fg_completely_delete(itemlist);
            }else{
                layer.msg('请至少选择一项！');
            }
        }else if (name == 'restore') {   //还原
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                fg_restore(itemlist);
            }else{
                layer.msg('请至少选择一项！');
            }
        }
    }
    //彻底删除
    function fg_completely_delete(id){
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要将这 ' + id.length + ' 项从回收站彻底删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_completely_delete",
                data: "id="+id,
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state==false){
                        layer.msg(data.msg);
                    }else if(data.state==true){
                        layer.msg(data.msg);
                    }
                    $.get('goods_management?op=shop_goods&type=putaway',$('#formSearch').serialize(),function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
                }
            });
        });
    }
    //还原
    function fg_restore(id){
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要将这 ' + id.length + ' 项还原吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_restore",
                data: "id="+id,
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state==false){
                        layer.msg(data.msg);
                    }else if(data.state==true){
                        layer.msg(data.msg);
                    }
                    $.get('goods_management?op=shop_goods&type=putaway',$('#formSearch').serialize(),function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
                }
            });
        });
    }


<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
