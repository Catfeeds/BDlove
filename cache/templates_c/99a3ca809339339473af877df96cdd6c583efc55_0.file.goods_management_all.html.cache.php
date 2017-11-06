<?php
/* Smarty version 3.1.29, created on 2017-09-21 14:31:58
  from "D:\www\yunjuke\application\pay\views\goods_management_all.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c35cde3eb744_65268556',
  'file_dependency' => 
  array (
    '99a3ca809339339473af877df96cdd6c583efc55' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\goods_management_all.html',
      1 => 1505803588,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
    'file:common_list_page.html' => 1,
  ),
),false)) {
function content_59c35cde3eb744_65268556 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1494459c35cde157423_17661586';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style type="text/css">
	a:hover{
		color: #333;
	}
</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>商品管理 <span class="c-gray en">&gt;</span>总库商品
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div id="tab_demo" class="HuiTab">
		<div class="tabBar clearfix">
			<a href="javascript:;"><span>总库商品</span></a>
			<a href="goods_management?op=shop_goods"><span>自建商品</span></a>
			<a href="goods_management?op=trash"><span>回收站</span></a>
		</div>
	</div>
    <form method="post" name="formSearch" id="formSearch">
        <div class="search mt-20 mb-10">
            <select name="year_to_market" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 80px">
                <option value="" selected>-上市年份-</option>
                <?php
$__section_total_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_total']) ? $_smarty_tpl->tpl_vars['__smarty_section_total'] : false;
$_smarty_tpl->tpl_vars['__smarty_section_total'] = new Smarty_Variable(array());
if (true) {
for ($_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_total']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] <= 10; $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_total']->value['index']++){
?>
                    <option value="<?php echo date('Y')+5-(isset($_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] : null);?>
">
                        <?php echo date("Y")+5-(isset($_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] : null);?>

                    </option>
                <?php
}
}
if ($__section_total_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_total'] = $__section_total_0_saved;
}
?>
            </select>
            <select name="season_to_market" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 80px">
                <option value="" selected>-上市季节-</option>
                <option value="1">春季</option>
                <option value="2">夏季</option>
                <option value="3">秋季</option>
                <option value="4">冬季</option>
            </select>
            <select name="sex" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 100px">
                <option value="" selected>-商品性别-</option>
                <option value="2">男</option>
                <option value="1">女</option>
                <option value="3">通用</option>
            </select>
            <select name="available_coupons" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 80px">
                <option value="" selected>-优惠券-</option>
                <option value="1">支持</option>
                <option value="0">不支持</option>
            </select>

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
            <select name="gc_id" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10 select2" onchange="get_brands_list(this)" style="min-width: 160px">
                <option value="">-全部分类-</option>
                <!--<?php echo $_smarty_tpl->tpl_vars['cate_option']->value;?>
-->
            </select>
            <select name="goods_tag" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10" style="min-width: 60px">
                <option value="" selected>-标签-</option>
                <option value="1">新品</option>
                <option value="2">推荐</option>
                <option value="3">特价</option>
            </select>
            <select name="goods_image" class="selecte  pd-5 mb-10 " style="min-width: 80px">
                <option value="" selected>-是否有图-</option>
                <option value="1">有图</option>
                <option value="2">无图</option>
            </select>

            <input type="text" name="goods_name" placeholder="名称" class="input-text input_text mb-10">

            <input type="text" name="goods_spu" placeholder="款号" class="input-text input_text mb-10">

            <input name="stocks_sku" type="text" placeholder="货号"  class="input-text input_text mb-10">

            <input name="stocks_bar_code" type="text" placeholder="条码"  class="input-text input_text mb-10">

            <input type="submit" onclick="return false;" class="btn btn-warning radius ml-10 mb-10" id="searchBtn" name="searchBtn" value="搜索">

        </div>
    </form>
    <!--<div id="flexigrid"></div>-->
    <table class="table table-border table-bordered table-hover table-bg table-content">
        <thead>
        <tr>
            <th scope="col" colspan="13">商品列表</th>
        </tr>
        <tr class="text-c">
            <th width=""><input type="checkbox"  value="" name="" onclick="content_checkAll(this)"></th>
            <th width="">商品信息</th>
            <th width="">销售价</th>
            <th width="">市场价</th>
            <th width="">总销量</th>
            <th width="">总库存</th>
            <th width="">上市年份</th>
            <th width="">上市季节</th>
            <th width="">商品性别</th>
            <th width="">添加时间</th>
            <th width="">操作</th>
        </tr>
        <tr><th  colspan="11">
            <span class="btn btn-danger radius" onclick="del_goods()"><i class="fa fa-trash"> 批量删除</i></span>
            <span class="btn btn-success radius" id="set_price" name="set_price" ><i class="fa fa-trash"> 批量设置价格</i></span>
            <span class="btn btn-primary radius " onclick="fg_operate('set_new')"><i class="fa fa-cog"> 设为拼团</i></span>
            <span class="btn btn-primary radius " onclick="fg_operate('set_recommend')"><i class="fa fa-cog"> 设为秒杀</i></span>
            <span class="btn btn-primary radius " onclick="fg_operate('set_sale')"><i class="fa fa-cog"> 设为特卖</i></span>
        </th></tr>
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
    $.Huitab("#tab_demo .tabBar span","#tab_demo .tabCon","current","click","0");
	
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
        get_class_option("select[name='gc_id']");

        function get_class_option(obj,class_id){
            if($(obj).length==0){
                return false;
            }
            $.ajax({
                type:'get',
                dataType:'json',
                url:'ajax_get_cate_option?class_id='+class_id,
                success:function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else if(data.state){
                        $(obj).append(data.info);
                    }
                }
            })
        }
    });
    
    function fg_operate(name,qid) {
    	 if (name == 'set_new') {
    	        if($('.trSelected').length>0){
    	            var itemlist = new Array();
    	            $('.trSelected').each(function(){
    	                itemlist.push($(this).attr('data-id'));
    	            });
    	            fg_set_tag(itemlist,1);
    	        }else{
    	            layer.msg('请至少选择一项！');
    	        }
    	    }else if (name == 'set_recommend') {
    	        if($('.trSelected').length>0){
    	            var itemlist = new Array();
    	            $('.trSelected').each(function(){
    	                itemlist.push($(this).attr('data-id'));
    	            });
    	            fg_set_tag(itemlist,2);
    	        }else{
    	            layer.msg('请至少选择一项！');
    	        }
    	    }else if (name == 'set_sale') {
    	        if($('.trSelected').length>0){
    	            var itemlist = new Array();
    	            $('.trSelected').each(function(){
    	                itemlist.push($(this).attr('data-id'));
    	            });
    	            fg_set_tag(itemlist,3);
    	        }else{
    	            layer.msg('请至少选择一项！');
    	        }
    	    }
    }
    
    
    function fg_set_tag(id,value) {
        var value_string = value == '1' ? '拼团' : (value == '2' ? '推荐' : '特卖');
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要将这 ' + id.length + '项的设为'+value_string+'吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_set_tag?value="+value,
                data: "id="+id,
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else  if(data.state==false){
                        layer.msg(data.msg);
                    }else if(data.state==true){
                        layer.msg(data.msg);
                    }
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
                }
            });
        });
    }
    
    function fg_cancel_tags(id) {
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要将这 ' + id.length + '项的标签取消掉吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_cancel_tags",
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
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
                }
            });
        });
    }
    
    
    
    
    
    
    
    
    
    
    
    
    function del_goods() {
        get_check();
        if($('.trSelected').length>0){
            var itemlist = new Array();
            $('.trSelected').each(function(){
                itemlist.push($(this).attr('data-id'));
            });
            fg_delete(itemlist);
        }else{
            layer.msg('请至少选择一项！');
        }
    }
    function fg_delete(id) {
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        layer.confirm('确认要将这 ' + id.length + '项删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "delete_store_goods?goods_id="+id,
                success: function(data){
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                        return false;
                    }else{
                        layer.msg(data.msg);
                    }
                    $.get('goods_management',$('#formSearch').serialize(),function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
                }
            });
        });
    }
    function get_brands_list(obj){
        var class_id = $(obj).val();
        $("select[name='brand_id']").html("<option value=''>-全部品牌-</option>");
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "ajax_get_brands_by_class",
            data: "",
            success: function (data) {
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state){
                    if(data.info){
                        var content =  "<option value=''>-全部品牌-</option>";
                        $.each(data.info,function(k,v){
                            content += '<option value="'+v.brand_id+'">'+v.brand_name+'</option>';
                        })
                    }
                }
                $("select[name='brand_id']").html(content);
            }
        })
    }
    $('#set_price').click(function(){
        get_check();
        var p = '';
        if($('.trSelected').length>0){
            var itemlist = new Array();
            $('.trSelected').each(function(){
                itemlist.push($(this).attr('data-id'));
            });
            var str_div = '<div class="pt-20 pl-30 pr-20 ">' +
                '<p><b class="pl-30">设置类型：</b>' +
                '<select class="valid" name="p" id="p">' +
                    '<option value="1" >-设置折扣-</option>' +
                    '<option value="2" >-修改价格-</option>' +
                '</select></p>'+
                '<b class="pl-30 pt-20">设置数值：</b>' +
                '<input class="pt-20" type="number" name="num" id="price">'+
                '<p class="pl-30"><small>折扣直接输入数值,如95折,输入0.95即可</small></p>'+
                '</div>';
            layer.open({
                type: 1,
                btn: ['确认', '取消'],
                title: '<b>修改'+itemlist.length+'项商品的价格</b>',
                skin: 'layui-layer-rim', //加上边框n
                area: ['420px', '220px'], //宽高
                content: str_div,
                yes: function (index) {
                    set_goods_price(itemlist, $('#p').val(), $('#price').val());
                }
            });
        }else{
            layer.msg('请至少选择一项！');
        }
    });

    function set_goods_price(id, p, num) {
        if (typeof id == 'number') {
            var id = new Array(id.toString());
        };
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "set_goods_price?id="+id+'&p='+p+'&num='+num,
            success: function(data) {
                layer.closeAll();
                layer.msg(data.msg);
                $.get('goods_management',$('#formSearch').serialize(),function () {load_page('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
');});
            }
        });
    }

<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
