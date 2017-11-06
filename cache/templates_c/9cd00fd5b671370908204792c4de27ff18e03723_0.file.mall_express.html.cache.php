<?php
/* Smarty version 3.1.29, created on 2017-08-11 16:50:53
  from "D:\www\yunjuke\application\pay\views\mall_express.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598d6fed9745c8_28768328',
  'file_dependency' => 
  array (
    '9cd00fd5b671370908204792c4de27ff18e03723' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\mall_express.html',
      1 => 1501636154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598d6fed9745c8_28768328 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '17461598d6fed7ca8e6_36914277';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
.btn{border:none}
a:hover{
	color: #333;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
	<nav class="breadcrumb">
            <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en">&gt;</span>运费管理
            <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
                <i class="Hui-iconfont">&#xe68f;</i></a>
        </nav>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page" style="padding: 20px;">
    <div class="fixed-bar">
       

    </div>
    <div class="page-container" style="padding: 0;">
    	<div id="tab_demo" class="HuiTab">
			<div class="tabBar clearfix">
				<a href="mall_express_tools"><span>运费管理</span></a>
				<a href="mall_express"><span>物流公司</span></a>
				<a href="mall_waybill"><span>运单模板</span></a>
			</div>
		</div>
            <table class="table mt-20">
                <tbody>
                    <tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['express']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_f_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_f']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f'] : false;
$__foreach_f_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_f'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_f']->value['iteration']++;
$__foreach_f_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                <td><input type="checkbox" name="express_code" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['e_code'];?>
"
                                    <?php
$_from = $_smarty_tpl->tpl_vars['check']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_c_1_saved_item = isset($_smarty_tpl->tpl_vars['c']) ? $_smarty_tpl->tpl_vars['c'] : false;
$_smarty_tpl->tpl_vars['c'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['c']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
$__foreach_c_1_saved_local_item = $_smarty_tpl->tpl_vars['c'];
if ($_smarty_tpl->tpl_vars['v']->value['e_code'] == $_smarty_tpl->tpl_vars['c']->value['express_code']) {?>checked<?php }?> <?php
$_smarty_tpl->tpl_vars['c'] = $__foreach_c_1_saved_local_item;
}
if ($__foreach_c_1_saved_item) {
$_smarty_tpl->tpl_vars['c'] = $__foreach_c_1_saved_item;
}
?> >
                                    <?php echo $_smarty_tpl->tpl_vars['v']->value['e_name'];?>

                                </td>
                            <?php if (!((isset($_smarty_tpl->tpl_vars['__smarty_foreach_f']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f']->value['iteration'] : null) % 4)) {?></tr><?php }?>
                        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_f_0_saved_local_item;
}
if ($__foreach_f_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_f'] = $__foreach_f_0_saved;
}
if ($__foreach_f_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_f_0_saved_item;
}
?>
                    </tr>
                </tbody>
            </table>
            <div style="width: 100%;" class="center pt50 ">
                <button class="btn btn-success size-L radius"  onclick="save()">保存</button>
            </div>
    </div>
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
    $.Huitab("#tab_demo .tabBar span","#tab_demo .tabCon","current","click","1");
	
    function save()
    {
        var arr = new Array();
        $('input[type=checkbox]:checked').each(function () {
            arr.push($(this).val());
        })
        if (arr.length>0) {
            var id = arr.toString();
            layer.confirm('确定要启用选中的快递？',{
                title: '<b>提示信息</b>',
                btn: ['确定','取消'],
            },function () {
                $.ajax({
                    type:"get",
                    dataType:"json",
                    url:"mall_express_save?express_code="+id,
                    beforeSend:function(){
                        layer.msg('数据提交中...',{icon:1});
                        var index = layer.load(1,{shade: false});
                    },
                    success:function (data)
                    {
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else {
                            layer.closeAll();
                            layer.msg(data.msg);
                        }
                    }
                })
            })
        } else {
            layer.msg('请至少选择一项！');
        }
    }
    function cancel()
    {
        var arr = new Array();
        $('input[type=checkbox]:checked').each(function () {
            arr.push($(this).val());
        })
        if (arr.length>0) {
            var id = arr.toString();
            layer.confirm('确定要关闭选中的快递？',{
                title: '<b>提示信息</b>',
                btn: ['确定','取消'],
            },function () {
                $.ajax({
                    type:"get",
                    dataType:"json",
                    url:"mall_express_cancel?express_code="+id,
                    success:function (data)
                    {
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                            return false;
                        }else {
                            layer.msg(data.msg);
                            location.replace(location.href);
                        }
                    }
                })
            })
        } else {
            layer.msg('请至少选择一项！');
        }
    }

<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
