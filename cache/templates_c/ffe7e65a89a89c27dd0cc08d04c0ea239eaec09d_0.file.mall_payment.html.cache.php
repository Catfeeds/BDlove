<?php
/* Smarty version 3.1.29, created on 2017-08-02 18:18:09
  from "D:\www\yunjuke\application\admin\views\mall_payment.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5981a6e1a21254_88737301',
  'file_dependency' => 
  array (
    'ffe7e65a89a89c27dd0cc08d04c0ea239eaec09d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_payment.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5981a6e1a21254_88737301 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '211795981a6e1942798_66491420';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>支付方式</h3>
                <h5>商城购物可使用支付方式/接口设置</h5>
            </div>
        </div>
    </div>
    <!-- 操作提示 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>此处列出了系统支持的支付方式，点击“设置”按钮可以编辑支付参数及开关状态</li>
        </ul>
    </div>
    
    <div id="flexigrid">
      <table class="flex-table autoht" cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <?php
$_from = $_smarty_tpl->tpl_vars['payment']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
            <tr>
		        <td class="sign"><i class="ico-check"></i></td>
		        <td class="handle-s"><a class="btn purple" href='mall_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
?op=<?php echo $_smarty_tpl->tpl_vars['v']->value['info'];?>
'><i class="fa fa-cog"></i>设置</a></td>
		        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['comments'];?>
</td>
		        <td><span class="<?php if ($_smarty_tpl->tpl_vars['v']->value['state'] == 0) {?>no<?php } else { ?>yes<?php }?>"><i class="fa fa-check-circle"></i><?php if ($_smarty_tpl->tpl_vars['v']->value['state'] == 0) {?>关闭中<?php } else { ?>开启中<?php }?></span></td>
		        <td style="width: 100%;"><div>&nbsp;</div></td>
           </tr>
           <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
        </tbody>
  </table>
    </div>
</div>
<?php echo '<script'; ?>
>
    $(function(){
        $('#flexigrid').flexigrid({
            height:'auto',// 高度自动
            usepager: false,// 不翻页
            striped: true,// 使用斑马线
            resizable: false,// 不调节大小
            title: '商城支付方式列表',// 表格标题
            reload: false,// 不使用刷新
            columnControl: false,// 不使用列控制
            colModel : [
                {display: '操作', name : 'operation', width : 60, sortable : false, align: 'center', className: 'handle-s'},
                {display: '支付方式', name : 'member_name', width : 200, sortable : true, align: 'left'},
                {display: '当前状态', name : 'member_mobile', width : 100, sortable : true, align: 'center'},
            ],
        });
        function fg_zfb() {
            window.location.href = "mall_payment_zfb";
        }
        function fg_wx() {
            window.location.href = "mall_payment_wx";
        }
        function fg_hdfk() {
            window.location.href = "mall_payment_hdfk";
        }
    });
<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
