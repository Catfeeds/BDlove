<?php
/* Smarty version 3.1.29, created on 2017-08-29 15:05:34
  from "D:\www\yunjuke\application\pay\views\goods_add_goods_third.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59a5123e84d093_69188066',
  'file_dependency' => 
  array (
    '658ab1b7c13d44e3acd6473fe599541cb34a6ec5' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\goods_add_goods_third.html',
      1 => 1503556796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59a5123e84d093_69188066 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1986359a5123e363271_38530809';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery.fileupload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/ajaxfileupload.js"><?php echo '</script'; ?>
>
<style>
    h3{
        padding-top:0px;
    }
</style>
<body style="background-color: #FFF; overflow: auto;">
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en p-lr">&gt;</span>商品管理<span class="c-gray en p-lr">&gt;</span><a href="goods_management?op=shop_goods" style="color: #666;">自建门店</a><span class="c-gray en p-lr">&gt;</span>添加商品
    &nbsp;<a href="javascript:;" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i></a>
</nav>

<div class="wrapper_search page-container">
  <!--<div class="fixed-bar">-->
    <!--<div class="item-title">-->
      <!--<div class="subject">-->
        <!--<h3>商品库管理</h3>-->
        <!--<h5>管理数据的新增、编辑、删除</h5>-->
      <!--</div>-->
    <!--</div>-->
  <!--</div>-->
    <!--<div class="explanation" id="explanation">-->
        <!--<div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>-->
            <!--<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>-->
            <!--<span id="explanationZoom" title="收起提示"></span> </div>-->
        <!--<ul>-->
            <!--<li>请使用jpg\jpeg\png等格式、单张大小不超过4M的正方形图片。</li>-->
            <!--<li>上传图片最大尺寸将被保留为1280像素。</li>-->
            <!--<li>每种颜色最多可上传5张图片或从图片空间中选择已有的图片，上传后的图片也将被保存在店铺图片空间中以便其它使用。</li>-->
            <!--<li>通过更改排序数字修改商品图片的排列显示顺序。</li>-->
            <!--<li>图片质量要清晰，不能虚化，要保证亮度充足。</li>-->
            <!--<li>操作完成后请点下一步，否则无法在网站生效。</li>-->
        <!--</ul>-->
    <!--</div>-->
    <form action="<?php if (isset($_smarty_tpl->tpl_vars['goods_img_arr']->value)) {?>goods_add_goods_fourth?op=edit<?php } else { ?>goods_add_goods_fourth<?php }?>" class="mt-20" id="goods_image" method="post">
    	<input name="goods_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['goods_id']->value;?>
">
        <div class="ncsc-form-goods-pic">
            <div class="container">
             <?php
$_from = $_smarty_tpl->tpl_vars['goods_info']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?> <!--循环商品的颜色-->
             <?php if (isset($_smarty_tpl->tpl_vars['goods_img_arr']->value) && !empty($_smarty_tpl->tpl_vars['goods_img_arr']->value) && $_smarty_tpl->tpl_vars['key']->value < count($_smarty_tpl->tpl_vars['goods_img_arr']->value)) {?><!--如果没有图片或者当前循环的次数小于图片数组-->
	         <?php
$_from = $_smarty_tpl->tpl_vars['goods_img_arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_img_arr_1_saved_item = isset($_smarty_tpl->tpl_vars['img_arr']) ? $_smarty_tpl->tpl_vars['img_arr'] : false;
$__foreach_img_arr_1_saved_key = isset($_smarty_tpl->tpl_vars['color_id']) ? $_smarty_tpl->tpl_vars['color_id'] : false;
$_smarty_tpl->tpl_vars['img_arr'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['color_id'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['img_arr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['color_id']->value => $_smarty_tpl->tpl_vars['img_arr']->value) {
$_smarty_tpl->tpl_vars['img_arr']->_loop = true;
$__foreach_img_arr_1_saved_local_item = $_smarty_tpl->tpl_vars['img_arr'];
?>
	         <?php if ($_smarty_tpl->tpl_vars['color_id']->value == $_smarty_tpl->tpl_vars['v']->value['goods_a_id']) {?>
                <div class="ncsc-goodspic-list">
                    <?php if (!empty($_smarty_tpl->tpl_vars['v']->value['color'])) {?>
                    <div class="title">
                        <h3>颜色：<?php if (!empty($_smarty_tpl->tpl_vars['v']->value['color_remark'])) {
echo $_smarty_tpl->tpl_vars['v']->value['color_remark'];
} else {
echo $_smarty_tpl->tpl_vars['v']->value['color'];
}?></h3>
                    </div>
                    <?php }?>
                    <ul class="goods-pic-list" nctype="ul_<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_a_id'];?>
">
                        <?php
$_from = $_smarty_tpl->tpl_vars['img_arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vv_2_saved_item = isset($_smarty_tpl->tpl_vars['vv']) ? $_smarty_tpl->tpl_vars['vv'] : false;
$__foreach_vv_2_saved_key = isset($_smarty_tpl->tpl_vars['kk']) ? $_smarty_tpl->tpl_vars['kk'] : false;
$_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['vv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['kk']->value => $_smarty_tpl->tpl_vars['vv']->value) {
$_smarty_tpl->tpl_vars['vv']->_loop = true;
$__foreach_vv_2_saved_local_item = $_smarty_tpl->tpl_vars['vv'];
?> <!--循环商品的颜色的所有照片-->
                        <?php if ($_smarty_tpl->tpl_vars['vv']->value['is_default'] == 1) {?>
                        <li class="ncsc-goodspic-upload">
                        	<!--  <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][goods_image_id]" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['goods_image_id'];?>
">-->
                        	<input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][color_id]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_a_id'];?>
">
                            <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][goods_id]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_id'];?>
">
                            <div class="upload-thumb"><img src="<?php if (empty($_smarty_tpl->tpl_vars['vv']->value['goods_image'])) {
echo $_smarty_tpl->tpl_vars['default_pic']->value;
} else {
echo base_url();?>
data/shop/album_pic/<?php echo $_smarty_tpl->tpl_vars['vv']->value['goods_image'];
}?>" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                                <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][goods_image]" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['goods_image'];?>
" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                            </div>
                            <div class="show-default selected" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                                <p><i class="icon-ok-circle"></i>设为默认主图
                                    <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][is_default]" value="1">
                                </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
                            </div>
                            <div class="show-sort">排序：<input name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][goods_image_sort]" type="text" class="text" value="0" size="1" maxlength="1">
                            </div>
                            <div class="ncsc-upload-btn"><a href="javascript:void(0);">
                            <span><input type="file" hidefocus="true" size="1" class="input-file" name="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
" id="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                            </span><p><i class="fa fa-upload"></i>上传</p>
                            </a></div>
                        </li>
                        <?php } elseif ($_smarty_tpl->tpl_vars['vv']->value['is_default'] != 1) {?>
                         <li class="ncsc-goodspic-upload">
                        	<input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][color_id]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_a_id'];?>
">
                            <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][goods_id]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_id'];?>
">
                            <div class="upload-thumb"><img src="<?php if (empty($_smarty_tpl->tpl_vars['vv']->value['goods_image'])) {
echo $_smarty_tpl->tpl_vars['default_pic']->value;
} else {
echo base_url();?>
data/shop/album_pic/<?php echo $_smarty_tpl->tpl_vars['vv']->value['goods_image'];
}?>" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                                <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][goods_image]" value="<?php if (!empty($_smarty_tpl->tpl_vars['vv']->value['goods_image'])) {
echo $_smarty_tpl->tpl_vars['vv']->value['goods_image'];
}?>" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                            </div>
                            <div class="show-default" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                                <p><i class="icon-ok-circle"></i>设为默认主图
                                    <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][is_default]" value="0">
                                </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
                            </div>
                            <div class="show-sort">排序：<input name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][goods_image_sort]" type="text" class="text" value="<?php if (isset($_smarty_tpl->tpl_vars['vv']->value['goods_image_sort'])) {
echo $_smarty_tpl->tpl_vars['vv']->value['goods_image_sort'];
} else { ?>0<?php }?>" size="1" maxlength="1">
                            </div>
                            <div class="ncsc-upload-btn"><a href="javascript:void(0);">
                            <span><input type="file" hidefocus="true" size="1" class="input-file" name="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
" id="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                            </span><p><i class="fa fa-upload"></i>上传</p>
                            </a></div>
                        </li>
                        <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_2_saved_local_item;
}
if ($__foreach_vv_2_saved_item) {
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_2_saved_item;
}
if ($__foreach_vv_2_saved_key) {
$_smarty_tpl->tpl_vars['kk'] = $__foreach_vv_2_saved_key;
}
?>
                    </ul>
                    <div class="ncsc-select-album">
                        <a class="ncbtn selected" href="javascript:;" nctype="select-0" data-name="jumpMenu_default"><i class="fa fa-photo"></i>从图片空间选择</a>
                        <a href="javascript:void(0);" nctype="close_album" class="ncbtn ml5" style="display: none" ><i class="fa fa-arrow-circle-up"></i>关闭相册</a>
                    </div>
                    <div nctype="album-0 " class="hide demo">
                        <div class="goods-gallery" nctype="gallery-0"><!--<a class="sample_demo" href="">提交</a>-->
                            <div class="nav"><span class="l">用户相册 &gt;全部图片        </span>
                            <span class="r">
                                <select name="jumpMenu_default" style="width:100px;" data-function="insert_img" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_a_id'];?>
" onchange="get_pic(this,1)">
                                     <option value="" style="width:80px;">请选择...</option>
                                     <?php if (!empty($_smarty_tpl->tpl_vars['shop_albums']->value)) {?>
                                     <?php
$_from = $_smarty_tpl->tpl_vars['shop_albums']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_3_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_3_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                     <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['aclass_id'];?>
" style="width:80px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['aclass_name'];?>
</option>
                                     <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_3_saved_local_item;
}
if ($__foreach_v_3_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_3_saved_item;
}
?>
                                     <?php }?>
                                </select>
                            </span>
                            </div>
                            <ul class="list pic_list">
                            </ul>
                            <div class="pagination">
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php
$_smarty_tpl->tpl_vars['img_arr'] = $__foreach_img_arr_1_saved_local_item;
}
if ($__foreach_img_arr_1_saved_item) {
$_smarty_tpl->tpl_vars['img_arr'] = $__foreach_img_arr_1_saved_item;
}
if ($__foreach_img_arr_1_saved_key) {
$_smarty_tpl->tpl_vars['color_id'] = $__foreach_img_arr_1_saved_key;
}
?>
            <?php } elseif ((!isset($_smarty_tpl->tpl_vars['goods_img_arr']->value)) || $_smarty_tpl->tpl_vars['key']->value >= count($_smarty_tpl->tpl_vars['goods_img_arr']->value)) {?><!--没有相册数组或者循环次数大于图片数组的大小-->
             <div class="ncsc-goodspic-list">
                    <?php if (!empty($_smarty_tpl->tpl_vars['v']->value['color'])) {?>
                    <div class="title">
                        <h3>颜色：<?php if (!empty($_smarty_tpl->tpl_vars['v']->value['color_remark'])) {
echo $_smarty_tpl->tpl_vars['v']->value['color_remark'];
} else {
echo $_smarty_tpl->tpl_vars['v']->value['color'];
}?></h3>
                    </div>
                    <?php }?>
                    <ul class="goods-pic-list" nctype="ul_<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_a_id'];?>
">
                        <li class="ncsc-goodspic-upload">
                        	<input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][0][color_id]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_a_id'];?>
">
                            <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][0][goods_id]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_id'];?>
">
                            <div class="upload-thumb"><img src="<?php if (empty($_smarty_tpl->tpl_vars['v']->value['goods_image'])) {
echo $_smarty_tpl->tpl_vars['default_pic']->value;
} else {
echo base_url();?>
data/shop/album_pic/<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_image'];
}?>" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
0">
                                <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][0][goods_image]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_image'];?>
" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
0">
                            </div>
                            <div class="show-default selected" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
0">
                                <p><i class="icon-ok-circle"></i>默认主图
                                    <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][0][is_default]" value="1">
                                </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
                            </div>
                            <div class="show-sort">排序：<input name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][0][goods_image_sort]" type="text" class="text" value="0" size="1" maxlength="1">
                            </div>
                            <div class="ncsc-upload-btn"><a href="javascript:void(0);">
                            <span><input type="file" hidefocus="true" size="1" class="input-file" name="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
0" id="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
0">
                            </span><p><i class="fa fa-upload"></i>上传</p>
                            </a></div>
                        </li>
                         <?php
$_from = $_smarty_tpl->tpl_vars['arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vv_4_saved_item = isset($_smarty_tpl->tpl_vars['vv']) ? $_smarty_tpl->tpl_vars['vv'] : false;
$__foreach_vv_4_saved_key = isset($_smarty_tpl->tpl_vars['kk']) ? $_smarty_tpl->tpl_vars['kk'] : false;
$_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['vv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['kk']->value => $_smarty_tpl->tpl_vars['vv']->value) {
$_smarty_tpl->tpl_vars['vv']->_loop = true;
$__foreach_vv_4_saved_local_item = $_smarty_tpl->tpl_vars['vv'];
?>
                         <li class="ncsc-goodspic-upload">
                        	<input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][color_id]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_a_id'];?>
">
                            <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][goods_id]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_id'];?>
">
                            <div class="upload-thumb"><img src="<?php echo TEMPLE;?>
img/default_goods_image_240.gif" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                                <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][goods_image]" value="" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                            </div>
                            <div class="show-default" nctype="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                                <p><i class="icon-ok-circle"></i>默认主图
                                    <input type="hidden" name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][is_default]" value="0">
                                </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
                            </div>
                            <div class="show-sort">排序：<input name="img[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
][goods_image_sort]" type="text" class="text" value="0" size="1" maxlength="1">
                            </div>
                            <div class="ncsc-upload-btn"><a href="javascript:void(0);">
                            <span><input type="file" hidefocus="true" size="1" class="input-file" name="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
" id="file_<?php echo $_smarty_tpl->tpl_vars['key']->value;
echo $_smarty_tpl->tpl_vars['kk']->value;?>
">
                            </span><p><i class="fa fa-upload"></i>上传</p>
                            </a></div>
                        </li>
                        <?php
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_4_saved_local_item;
}
if ($__foreach_vv_4_saved_item) {
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_4_saved_item;
}
if ($__foreach_vv_4_saved_key) {
$_smarty_tpl->tpl_vars['kk'] = $__foreach_vv_4_saved_key;
}
?>
                    </ul>
                    <div class="ncsc-select-album">
                        <a class="ncbtn selected" href="javascript:;" nctype="select-0" data-name="jumpMenu_default"><i class="fa fa-photo"></i>从图片空间选择</a>
                        <a href="javascript:void(0);" nctype="close_album" class="ncbtn ml5" style="display: none" ><i class="fa fa-arrow-circle-up"></i>关闭相册</a>
                    </div>
                    <div nctype="album-0 " class="hide demo">
                        <div class="goods-gallery" nctype="gallery-0"><!--<a class="sample_demo" href="">提交</a>-->
                            <div class="nav"><span class="l">用户相册 &gt;全部图片        </span>
                            <span class="r">
                                <select name="jumpMenu_default" style="width:100px;" data-function="insert_img" data-id="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_a_id'];?>
" onchange="get_pic(this,1)">
                                     <option value="" style="width:80px;">请选择...</option>
                                     <?php if (!empty($_smarty_tpl->tpl_vars['shop_albums']->value)) {?>
                                     <?php
$_from = $_smarty_tpl->tpl_vars['shop_albums']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_5_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_5_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                     <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['aclass_id'];?>
" style="width:80px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['aclass_name'];?>
</option>
                                     <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_5_saved_local_item;
}
if ($__foreach_v_5_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_5_saved_item;
}
?>
                                     <?php }?>
                                </select>
                            </span>
                            </div>
                            <ul class="list pic_list">
                            </ul>
                            <div class="pagination">
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_v_0_saved_key;
}
?>
            </div>
        </div>
        <div class="bottom tc hr32"><label class="submit-border"><input type="submit" class="submit" value="下一步，确认商品发布"></label></div>
    </form>

</div>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        // 商品图片ajax上传

        $('.ncsc-upload-btn').delegate('input[type="file"]', 'change',function () {
            var id = $(this).attr('id');
            ajaxFileUpload(id);
        });
       /* //凸显鼠标触及区域、其余区域半透明显示
        $(".container > div").jfade({
            start_opacity:"1",
            high_opacity:"1",
            low_opacity:".5",
            timing:"200"
        });*/
       /* //浮动导航  waypoints.js
        $("#uploadHelp").waypoint(function(event, direction) {
            $(this).parent().toggleClass('sticky', direction === "down");
            event.stopPropagation();
        });*/
        // 关闭相册
        /*$('a[nctype="close_album"]').click(function(){
            $(this).hide();
            $(this).prev().show();
            $(this).parent().next().html('');
        });*/
        // 绑定点击事件
        $('div[nctype^="file"]').each(function(){
            if ($(this).prev().find('input[type="hidden"]').val() != '') {
                selectDefaultImage($(this));
            }
        });
    });

    // 图片上传ajax
    function ajaxFileUpload(id, o) {
        //$('img[nctype="' + id + '"]').attr('src', SHOP_TEMPLATES_URL + "/images/loading.gif");

        $.ajaxFileUpload({
            url : 'goods_pic_upload?op=ajax_upload',
            secureuri : false,
            fileElementId : id,
            dataType : 'json',
            data : {name : id},
            success : function (data, status) {
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if (typeof(data.error) != 'undefined') {
                    layer.msg(data.error);
                    $('img[nctype="' + id + '"]').attr('src','<?php echo TEMPLE;?>
img/default_goods_image_240.gif');
                } else {
                    $('input[nctype="' + id + '"]').val(data.data);
                    $('img[nctype="' + id + '"]').attr('src', data.pic_info.pic_url);
                    selectDefaultImage($('div[nctype="' + id + '"]'));      // 选择默认主图
                    checkDefaultImage($('div[nctype="' + id + '"]'));
                }
                //$.getScript(SHOP_RESOURCE_SITE_URL+ '/js/store_goods_add.step3.js');
            },
            error : function (data, status, e) {
            	layer.msg(e);
                //$.getScript(SHOP_RESOURCE_SITE_URL+ '/js/store_goods_add.step3.js');
            }
        });
        return false;

    }
    //从图片空间选择
    $(".ncsc-select-album .selected").click(function(){
        $(this).hide();
        $(this).next('a[nctype="close_album"]').show();
        var name = $(this).data("name");
        var obj = $(this).parents("div").find('select[name="'+name+'"]');
        get_pic(obj,1);
        $(this).parents(".ncsc-select-album").next().show();
    })
    //关闭相册
    $('a[nctype="close_album"]').click(function(){
        $(this).hide();
        $(this).prev('a[nctype="select-0"]').show();
        $(this).parents(".ncsc-select-album").next().hide();
    })
    //点击 设置默认图片
    selectDefaultImage($(".show-default"))
    // 选择默认主图&&删除
    function selectDefaultImage($this) {
        // 默认主题
        $this.click(function(){
            $(this).parents('ul:first').find('.show-default').removeClass('selected').find('input').val('0');
            $(this).addClass('selected').find('input').val('1');
            
            $(".show-default:not('.selected')").mouseenter(function(){
							if(!$(this).prev().find('input').val()==''){
								$(this).css('border-color','#27A9E3');
								$(this).find('p').css({'display':'block','color':'#27A9E3'});
								$(this).find('.del').css({'display':'block','color':'#27A9E3'});
							}
						})
						
            $(".show-default:not('.selected')").mouseleave(function(){
                if(!$(this).prev().find('input').val()==''){
                    $(this).css('border-color','#fff');
                    $(this).find('p').css({'display':'none','color':'#27A9E3'});
                    $(this).find('.del').css({'display':'none','color':'#27A9E3'});
                }
            })
        });
        // 删除
        $this.parents('li:first').find('a[nctype="del"]').click(function(){
        	$(this).parent().css('border-color','#fff');
			$(this).prev().css({'display':'none','color':'#27A9E3'});
			$(this).css({'display':'none','color':'#27A9E3'});
            $this.unbind('click').removeClass('selected').find('input').val('0');
            $this.prev().find('input').val('').end().find('img').attr('src', '<?php echo TEMPLE;?>
img/default_goods_image_240.gif');
            checkDefaultImage($this);
        });
    }

    // 验证是否存在默认主题，没有选择第一个图片
    function checkDefaultImage($this) {
        if ($this.parents('ul:first').find('.show-default').find('input[value="1"]').length == 0) {
            $_thumb = $this.parents('ul:first').find('.upload-thumb').each(function(){
                if ($(this).find('input').val() != '') {
                    $(this).next().parents('ul:first').find('.show-default').removeClass('selected').find('input').val('0');
                    $(this).next().addClass('selected').find('input').val('1');
                    return false;
                }
            });
        }
    }
    // 从图片空间插入主图
    function insert_img(obj) {
    	var name = $(obj).data('name');
    	var src = $(obj).data('src');
    	var a_id = $(obj).data('id');
    	
        $_thumb = $('ul[nctype="ul_'+ a_id +'"]').find('.upload-thumb').each(function(){
            if ($(this).find('input').val() == '') {
                $(this).find('img').attr('src', src);
                $(this).find('input').val(name);
                selectDefaultImage($(this).next());      // 选择默认主图
                checkDefaultImage($(this).next());
                return false;
            }
        });
    }
    function get_pic(this_obj,curr){
    	var aid = $(this_obj).data('id');
    	var aclass_id = $(this_obj).val();
    	  $.getJSON('goods_pic_room_view?op=page', {aclass_id:aclass_id,rp:24,
    		  curpage:curr //向服务端传的参数，此处只是演示
    	  }, function(data){
    		  var content = '';
    		  var onclick_function = $(this_obj).data('function');
    		 if(data.pic_info){
    			 $.each(data.pic_info,function(k,v){
    				 content += '<li data-name="'+v.apic_cover+'" data-src="'+v.pic_url+'" data-id="'+aid+'" onclick="'+onclick_function+'(this)">'+
    				 '<a href="JavaScript:void(0);"><img src='+v.pic_url+' ></a></li>';
    			 })
    		 }
    		  $(this_obj).parents('.demo').find('.pic_list').html(content);
    	    //显示分页
    	    laypage({
    	      cont: $(this_obj).parents('.demo').find(".pagination"),
    	      skin: '#41BEDD',
    	      pages: data.page_info.page_count, //通过后台拿到的总页数
    	      curr: data.page_info.curr, //当前页
    	      jump: function(obj, first){ //触发分页后的回调
    	        if(!first){ //点击跳页触发函数自身，并传递当前页：obj.curr
    	        	get_pic(this_obj,obj.curr);
    	        }
    	      }
    	    });
    	});
    }
    
    $(".show-default:not('.selected')").mouseenter(function(){
			if(!$(this).prev().find('input').val()==''){
				$(this).css('border-color','#27A9E3');
				$(this).find('p').css({'display':'block','color':'#27A9E3'});
				$(this).find('.del').css({'display':'block','color':'#27A9E3'});
			}
		})
		
		$(".show-default:not('.selected')").mouseleave(function(){
			if(!$(this).prev().find('input').val()==''){
				$(this).css('border-color','#fff');
				$(this).find('p').css({'display':'none','color':'#27A9E3'});
				$(this).find('.del').css({'display':'none','color':'#27A9E3'});
			}
		})
<?php echo '</script'; ?>
>

<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
