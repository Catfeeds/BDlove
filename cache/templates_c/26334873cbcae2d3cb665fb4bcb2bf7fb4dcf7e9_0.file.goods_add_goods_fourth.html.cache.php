<?php
/* Smarty version 3.1.29, created on 2017-08-29 15:42:17
  from "D:\www\yunjuke\application\admin\views\goods_add_goods_fourth.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59a51ad9882528_99141209',
  'file_dependency' => 
  array (
    '26334873cbcae2d3cb665fb4bcb2bf7fb4dcf7e9' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_add_goods_fourth.html',
      1 => 1496923836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59a51ad9882528_99141209 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1550659a51ad977c968_72663527';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>

<body style="background-color: #FFF; overflow: auto;">
<div class="page wrapper_search">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>商品库管理</h3>
        <h5>管理数据的新增、编辑、删除</h5>
      </div>
    </div>
  </div>
    <div class="alert alert-block hr32">
        <h2><i class="fa fa-check-circle mr10"></i>恭喜您，商品发布成功！&nbsp;&nbsp;</h2>
        <div class="hr16"></div>
  <!--       <div>
            <a class="ncbtn ncbtn-mint ml30" href=""><i class="fa fa-gift"></i>为该商品添加赠品捆绑</a>
        </div>
        <div class="hr16"></div> -->
        <strong>
            <a class="ml30" href="../Stores/store_management">去店铺中心添加库存&gt;&gt;</a>
            <a class="ml30" href="goods_edit_goods_second?op=edit&goods_id=<?php echo $_smarty_tpl->tpl_vars['goods_id']->value;?>
">重新编辑刚发布的商品&gt;&gt;</a>
        </strong>
        <div class="hr16"></div>
        <h4 class="ml10">您还可以:</h4>
        <ul class="ml30">
            <li>1. 继续 " <a href="goods_add_goods_second">发布新商品</a>"</li>
            <li>2. 进入 " 商家中心" 管理 "<a href="goods_management">出售中的商品</a>"</li>
            <li>3. 参与商城的 " <a href="../Promotion/specialPromotion">专题活动</a> "</li>
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
