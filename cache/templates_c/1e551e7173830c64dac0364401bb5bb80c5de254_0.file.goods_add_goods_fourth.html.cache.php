<?php
/* Smarty version 3.1.29, created on 2017-08-29 15:05:37
  from "D:\www\yunjuke\application\pay\views\goods_add_goods_fourth.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59a512411f6ec1_39767577',
  'file_dependency' => 
  array (
    '1e551e7173830c64dac0364401bb5bb80c5de254' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\goods_add_goods_fourth.html',
      1 => 1501136736,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59a512411f6ec1_39767577 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1623759a51241123f90_06382893';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>

<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en p-lr">&gt;</span>商品管理<span class="c-gray en p-lr">&gt;</span><a href="goods_management?op=shop_goods" style="color: #666;">自建门店</a><span class="c-gray en p-lr">&gt;</span>添加商品
    &nbsp;<a href="javascript:;" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container wrapper_search">
    <div class="alert alert-block hr32">
        <h2><i class="fa fa-check-circle mr10"></i>恭喜您，商品发布成功！&nbsp;&nbsp;</h2>
        <div class="hr16"></div>
  <!--       <div>
            <a class="ncbtn ncbtn-mint ml30" href=""><i class="fa fa-gift"></i>为该商品添加赠品捆绑</a>
        </div>
        <div class="hr16"></div> -->
        <strong>
            <a class="ml30" href="goods_management?op=shop_goods">自建商品列表&gt;&gt;</a>
            <a class="ml30" href="goods_edit_goods_second?op=edit&goods_id=<?php echo $_smarty_tpl->tpl_vars['goods_id']->value;?>
">重新编辑刚发布的商品&gt;&gt;</a>
        </strong>
        <div class="hr16"></div>
        <h4 class="ml10">您还可以:</h4>
        <ul class="ml30">
            <li>1. 继续 " <a href="goods_add_goods_second">发布新商品</a>"</li>
        </ul>
    </div>

</div>
<?php echo '<script'; ?>
 type="text/javascript">

<?php echo '</script'; ?>
>

<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
