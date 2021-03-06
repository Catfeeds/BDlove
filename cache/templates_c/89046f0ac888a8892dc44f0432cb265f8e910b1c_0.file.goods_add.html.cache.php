<?php
/* Smarty version 3.1.29, created on 2017-08-29 14:48:49
  from "D:\www\yunjuke\application\pay\views\goods_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59a50e5190b429_69000260',
  'file_dependency' => 
  array (
    '89046f0ac888a8892dc44f0432cb265f8e910b1c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\goods_add.html',
      1 => 1501662756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59a50e5190b429_69000260 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1613459a50e512ae433_57131256';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery.charCount.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery.fileupload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery.iframe-transport.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery.ui.widget.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/ajaxfileupload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo base_url();?>
plugins/select2/js/select2.min.js"><?php echo '</script'; ?>
>
<style>
    input[readonly="readonly"]{background-color: #fff}
    #content #edui1{z-index:0 !important}
    .select2-selection--multiple{line-height: 24px;}
    .errrrr{    background-color: #FFF0F0 !important;
    background-repeat: repeat !important;
    border: 1px dashed #E84C3D !important;}
    .spec_title{text-align:right;}
    .spec_value{padding-left:20px;}
    .p-lr{
    	padding: 0 5px;
    }
    a:hover,
    a:active{
    	color: #333;
    	text-decoration: underline;
    }
    label.error {
        position: inherit;
    }
</style>
<body style="background-color: #FFF; overflow: auto;">
    <nav class="breadcrumb">
	    <i class="Hui-iconfont">&#xe67f;</i> 店铺管理 <span class="c-gray en p-lr">&gt;</span>商品管理<span class="c-gray en p-lr">&gt;</span><a href="goods_management?op=shop_goods" style="color: #666;">自建门店</a><span class="c-gray en p-lr">&gt;</span>添加商品
	    &nbsp;<a href="javascript:;" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
	    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
	        <i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
    

    <div class="page-container wrapper_search">
        <form action="goods_add_goods_third" id="form_2" method="post">
            <!--<input id="color_arr" value='' type="hidden">-->
            <input name="base_info[goods_pos]" value='<?php echo $_smarty_tpl->tpl_vars['goods_pos']->value;?>
' type="hidden">
            <div class="ncsc-form-goods">
                <h3 id="demo1">商品基本信息</h3>
                <dl>
                    <dt><i class="required">*</i>商品名称：</dt>
                    <dd>
                        <input name="base_info[goods_name]" type="text" class="text w400" value="">
                        <span class="err"></span>
                        <p class="hint">商品标题名称长度至少3个字符，最长50个汉字</p>
                    </dd>
                </dl>
                <dl>
                    <dt><i class="required">*</i>商品分类：</dt>
                    <dd id="gcategory">
                        <input type="hidden" name="base_info[gc_name]" id="gc_name" value="">
                        <select name="base_info[gc_id]" id="gc_id" class="selecte pd-5 mb-10 select2 " onchange="get_info_by_class(this)">
                            <option value="" selected>-分类-</option>
                            <?php if (isset($_smarty_tpl->tpl_vars['class_id']->value)) {?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['class_id']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['class_name']->value;?>
</option>
                            <?php }?>
                        </select>
                        <span class="err"></span>
                        <p class="hint">商品分类必须选择</p>
                        <input type="hidden" name="type_id" value="<?php if (isset($_smarty_tpl->tpl_vars['type_id']->value)) {
echo $_smarty_tpl->tpl_vars['type_id']->value;
}?>" class="text">
                    </dd>
                </dl>
                
                 <dl>
                    <dt><i class="required">*</i>上市年份：</dt>
                    <dd>
                        
                        <select name="base_info[year_to_market]" class="selecte pd-5 mb-10 select2  select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                           
                            <?php
$_from = $_smarty_tpl->tpl_vars['year_arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_y_0_saved_item = isset($_smarty_tpl->tpl_vars['y']) ? $_smarty_tpl->tpl_vars['y'] : false;
$_smarty_tpl->tpl_vars['y'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['y']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['y']->value) {
$_smarty_tpl->tpl_vars['y']->_loop = true;
$__foreach_y_0_saved_local_item = $_smarty_tpl->tpl_vars['y'];
?>
	                        <option value="<?php echo $_smarty_tpl->tpl_vars['y']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['year']->value) && $_smarty_tpl->tpl_vars['year']->value == $_smarty_tpl->tpl_vars['y']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['y']->value;?>
</option>
	                        <?php
$_smarty_tpl->tpl_vars['y'] = $__foreach_y_0_saved_local_item;
}
if ($__foreach_y_0_saved_item) {
$_smarty_tpl->tpl_vars['y'] = $__foreach_y_0_saved_item;
}
?>
                        </select>
                        <span class="err"></span>
                        <p class="hint">上市年份格式：2015 即4位数字的年份</p>
                    </dd>
                </dl>


                
                <dl>
                    <dt><i class="required">*</i>上市季节：</dt>
                    <dd id="gcategory">
                        <select name="base_info[season_to_market]"  class="selecte pd-5 mb-10 select2 ">
                            <option value="" selected>-上市季节-</option>
	                        <option value="1">春季</option>
	                        <option value="2">夏季</option>
	                        <option value="3">秋季</option>
	                        <option value="4">冬季</option>
                        </select>
                        <span class="err"></span>
                        <p class="hint">上市季节必须选择</p>
                    </dd>
                </dl>
                
                <dl>
                    <dt><i class="required">*</i>商品性别：</dt>
                    <dd id="gcategory">
                        <select name="base_info[sex]" class="selecte pd-5 mb-10 select2 ">
                             <option value="" selected>-商品性别-</option>
	                        <option value="2">男</option>
	                        <option value="1">女</option>
	                        <option value="0">通用</option>
                        </select>
                        <span class="err"></span>
                        <p class="hint">商品性别必须选择</p>
                    </dd>
                </dl>
                
                
                <dl>
                    <dt>商品自定义标签分类：</dt>
                    <dd>
                        <select name="gstn[]" id="gstn_id" class="selecte pd-5 mb-10 select2"  multiple="multiple" >
                        </select>
                        <span class="err"></span>
                        <p class="hint">商品的门店自定义标签，可多选</p>
                    </dd>
                </dl>
                <dl style="overflow: visible;" class="brand_dl">
                    <dt><i class="required">*</i>商品品牌：</dt>
                    <dd>
                        <div class="ncsc-brand-select">
                            <div class="selection">
                                <input name="base_info[brand_name]" id="brand_name" value="" type="text" class="text w180" readonly="">
                                <input type="hidden" name="base_info[brand_id]" id="b_id" value=""><em class="add-on"><span class="err"></span>
                                    <i class="fa fa-caret-square-o-down"></i></em></div>
                            <div class="ncsc-brand-select-container">
                                <div class="brand-index" data-tid="<?php if (!empty($_smarty_tpl->tpl_vars['type_id']->value)) {
echo $_smarty_tpl->tpl_vars['type_id']->value;
}?>" data-url="get_brands_by_type">
                                    <div class="letter" nctype="letter">
                                        <ul>
                                            <li><a href="javascript:void(0);" data-letter="all">全部品牌</a></li>
                                            <li><a href="javascript:void(0);" data-letter="A">A</a></li>
                                            <li><a href="javascript:void(0);" data-letter="B">B</a></li>
                                            <li><a href="javascript:void(0);" data-letter="C">C</a></li>
                                            <li><a href="javascript:void(0);" data-letter="D">D</a></li>
                                            <li><a href="javascript:void(0);" data-letter="E">E</a></li>
                                            <li><a href="javascript:void(0);" data-letter="F">F</a></li>
                                            <li><a href="javascript:void(0);" data-letter="G">G</a></li>
                                            <li><a href="javascript:void(0);" data-letter="H">H</a></li>
                                            <li><a href="javascript:void(0);" data-letter="I">I</a></li>
                                            <li><a href="javascript:void(0);" data-letter="J">J</a></li>
                                            <li><a href="javascript:void(0);" data-letter="K">K</a></li>
                                            <li><a href="javascript:void(0);" data-letter="L">L</a></li>
                                            <li><a href="javascript:void(0);" data-letter="M">M</a></li>
                                            <li><a href="javascript:void(0);" data-letter="N">N</a></li>
                                            <li><a href="javascript:void(0);" data-letter="O">O</a></li>
                                            <li><a href="javascript:void(0);" data-letter="P">P</a></li>
                                            <li><a href="javascript:void(0);" data-letter="Q">Q</a></li>
                                            <li><a href="javascript:void(0);" data-letter="R">R</a></li>
                                            <li><a href="javascript:void(0);" data-letter="S">S</a></li>
                                            <li><a href="javascript:void(0);" data-letter="T">T</a></li>
                                            <li><a href="javascript:void(0);" data-letter="U">U</a></li>
                                            <li><a href="javascript:void(0);" data-letter="V">V</a></li>
                                            <li><a href="javascript:void(0);" data-letter="W">W</a></li>
                                            <li><a href="javascript:void(0);" data-letter="X">X</a></li>
                                            <li><a href="javascript:void(0);" data-letter="Y">Y</a></li>
                                            <li><a href="javascript:void(0);" data-letter="Z">Z</a></li>
                                            <li><a href="javascript:void(0);" data-letter="0-9">其他</a></li>
                                        </ul>
                                    </div>
                                    <div class="search" nctype="search">
                                        <input name="search_brand_keyword" id="search_brand_keyword" type="text" class="text" placeholder="品牌名称关键字查找"><a href="javascript:void(0);" class="ncbtn-mini" style="vertical-align: top;">Go</a></div>
                                </div>
                                <div class="brand-list ps-container ps-active-y" nctype="brandList">
                                    <ul nctype="brand_list">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['brands']->value)) {?>
                                        <?php
$_from = $_smarty_tpl->tpl_vars['brands']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_brand_1_saved_item = isset($_smarty_tpl->tpl_vars['brand']) ? $_smarty_tpl->tpl_vars['brand'] : false;
$_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['brand']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
$__foreach_brand_1_saved_local_item = $_smarty_tpl->tpl_vars['brand'];
?>
                                        <li data-id="<?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
">
                                            <em><?php if ($_smarty_tpl->tpl_vars['brand']->value['brand_initial']) {
echo $_smarty_tpl->tpl_vars['brand']->value['brand_initial'];
} else { ?>--<?php }?></em><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</li>
                                        <?php
$_smarty_tpl->tpl_vars['brand'] = $__foreach_brand_1_saved_local_item;
}
if ($__foreach_brand_1_saved_item) {
$_smarty_tpl->tpl_vars['brand'] = $__foreach_brand_1_saved_item;
}
?>
                                        <?php }?>
                                    </ul>
                                </div>
                                <div class="no-result" nctype="noBrandList" style="<?php if (!empty($_smarty_tpl->tpl_vars['brands']->value)) {?>display: none;<?php }?>">没有符合条件<strong></strong>的品牌</div>
                                <div class="text-c"><a href="javascript:void(0);" class="ncbtn-mini" onclick="$(this).parents('.ncsc-brand-select-container:first').hide();">关闭品牌列表</a></div>
                            </div>
                        </div>
                        <span class="err"></span>
                        <p class="hint">商品品牌必选</p>
                    </dd>
                </dl>
                <dl>
                    <dt>商品卖点：</dt>
                    <dd>
                        <textarea maxlength="140" onchange="this.value=this.value.substring(0, 140)" onkeyup="this.value=this.value.substring(0, 140)"   name="base_info[goods_jingle]" class="textarea h60 w400"></textarea>
                        <span></span>
                        <p class="hint">商品卖点最长不能超过140个汉字</p>
                    </dd>
                </dl>
                <dl>
                    <dt nc_type="no_spec"><i class="required">*</i>销售价：</dt>
                    <dd nc_type="no_spec">
                        <input name="base_info[goods_price]" value="0.00" data-old="0.00" type="text" nc_type="price" class="text w60"><em class="add-on"><i class="fa fa-rmb"></i></em> <span class="price"></span><span class="err"></span>
                        <p class="hint">价格必须是0.01~9999999之间的数字，且不能高于市场价。<br>
                            此价格为商品实际销售价格，如果商品存在规格，该价格显示最低价格。</p>
                    </dd>
                </dl>
                <dl>
                    <dt>吊牌价：</dt>
                    <dd>
                        <input name="base_info[goods_marketprice]" value="0.00" nc_type="price" type="text" class="text w60" ><em class="add-on"><i class="fa fa-rmb"></i></em> <span class="err"></span>
                        <p class="hint">价格必须是0.01~9999999之间的数字，此价格仅为市场参考售价，请根据该实际情况认真填写。</p>
                    </dd>
                </dl>
                <dl>
                    <dt>折扣：</dt>
                    <dd>
                        <input name="base_info[discount]" value="" type="text" class="text w60"  ><em class="add-on">%</em>
                        <p class="hint">根据销售价与市场价比例自动生成，不需要编辑。</p>
                    </dd>
                </dl>
                <dl>
                    <dt nc_type="no_spec"><i class="required">*</i>商品款号：</dt>
                    <dd nc_type="no_spec">
                        <p>
                            <input name="base_info[goods_spu]" id="stocks_code" class="stocks_code" value="" type="text" class="text" nctype="stocks_code"><span class="err"></span>
                            <!--<input name="stocks_barcode" id="stocks_barcode" class="stocks_barcode" value="" type="hidden">-->
                        </p>
                        <p class="hint">商家货号是指商家管理商品的编号，买家不可见<br>最多可输入20个字符，支持输入中文、字母、数字、_、/、-和小数点</p>
                    </dd>
                </dl>
                <dl>
                    <dt nc_type="no_spec"><i class="required">*</i>重量：</dt>
                    <dd nc_type="no_spec">
                        <p>
                            <input name="base_info[weight]" id="weight" class="weight" value="" type="number" class="text" nctype="weight"><span>克</span><span class="err"></span>
                        </p>
                        <p class="hint"></p>
                    </dd>
                </dl>
                <dl nctype="spec_group_dl" style="overflow: visible" spec_img="t">
                    <dt>
                        <i class="required">*</i>颜色：</dt>
                    <dd nctype="" class="pos-r">
                        <div class="choose_color_box">
                            <div class="choose_color_box_list mb-10" id="creat_tr_0">
                                <input type="checkbox" nctype="input_checkbox" class="color-select mr-5" name="color-select[]" onchange="color_check_click(this)">
                                <input type="text" name="color[0][color]" nctype="pv_name" class="picker-text w300 mr-5" onchange="change_color(this)" onfocus="f1(this)" readonly value="" placeholder="选择主色" maxlength="30" data-old="">
                                <input type="hidden" name="color[0][color_value]" class="color_value"  value="">
                                <input type="text" name="color[0][color_remark]" class="picker-remark" placeholder="备注（如丁香紫,宝石蓝等）" value="" maxlength="30">
                                <div class="pos-a choose_color_box_hide hide mt-10 c-333">
                                </div>
                            </div>
                        </div>

                        <p class="hint">选择标准颜色可增加搜索/导购机会，标准颜色还可填写颜色备注信息（偏深、偏亮等）！</p>
                        <input type="hidden" name="colorISnull" value=""><span class="err"></span>
                    </dd>
                </dl>
                <dl nctype="size_dl" class="size_dl" style="<?php if (isset($_smarty_tpl->tpl_vars['sizes']->value) && !empty($_smarty_tpl->tpl_vars['sizes']->value)) {
} else {
}?> overflow: visible;">
                    <dt>
                       <i class="required">*</i> 尺码：</dt>
                    <dd nctype="size_dd" class="size_dd">
                        <?php if (isset($_smarty_tpl->tpl_vars['size_types']->value) && !empty($_smarty_tpl->tpl_vars['size_types']->value)) {?>
                        <div class="col-conten">
                            <!-- <?php
$_from = $_smarty_tpl->tpl_vars['size_types']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_name_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_name']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_name'] : false;
$__foreach_name_2_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_name_2_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_name'] = new Smarty_Variable(array());
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$__foreach_name_2_first = true;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_name']->value['first'] = $__foreach_name_2_first;
$__foreach_name_2_first = false;
$__foreach_name_2_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                            <label class="mr-30">
                                <input type="radio" name="size_type" class="size_type" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_name']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_name']->value['first'] : null)) {?>checked="checked"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>

                            </label>
                            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_name_2_saved_local_item;
}
if ($__foreach_name_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_name'] = $__foreach_name_2_saved;
}
if ($__foreach_name_2_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_name_2_saved_item;
}
if ($__foreach_name_2_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_name_2_saved_key;
}
?> -->
                            
                        </div>
                        <?php }?>
                        <input type="hidden" name="sizeISnull" value=""><span class="err"></span>
                        <?php if (isset($_smarty_tpl->tpl_vars['sizes']->value) && !empty($_smarty_tpl->tpl_vars['sizes']->value)) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['sizes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_loop_3_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_loop']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_loop'] : false;
$__foreach_loop_3_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_loop_3_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_loop'] = new Smarty_Variable(array());
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$__foreach_loop_3_first = true;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first'] = $__foreach_loop_3_first;
$__foreach_loop_3_first = false;
$__foreach_loop_3_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['v']->value['size_list'])) {?>
                        <div style="background-color: #F6F7Fb;display: <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_loop']->value['first'] : null) == true) {?>block;<?php } else { ?>none;<?php }?>" class="size_list size_list_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
                            <ul style="">
                                <?php
$_from = $_smarty_tpl->tpl_vars['v']->value['size_list'];
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
                                <li class="f-l mr-20 ml-10"  style="" data-code="" data-text="" data-value="">
                                    <label>
                                        <input type="checkbox" class="size_val" data-code="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" data-text="<?php echo $_smarty_tpl->tpl_vars['vv']->value['size'];?>
" name="" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['size'];?>
"><?php echo $_smarty_tpl->tpl_vars['vv']->value['size'];?>

                                    </label>
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
                            <div class="clear">
                            </div>
                        </div>
                        <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_loop_3_saved_local_item;
}
if ($__foreach_loop_3_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_loop'] = $__foreach_loop_3_saved;
}
if ($__foreach_loop_3_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_loop_3_saved_item;
}
if ($__foreach_loop_3_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_loop_3_saved_key;
}
?>
                        <?php }?>
                    </dd>
                </dl>
                <dl nc_type="spec_dl" class="spec-bg" style="display:; overflow: visible;">
                    <dt>宝贝销售规格：</dt>
                    <dd class="spec-dd">
                        <div class="batch-update-area" style="">
                            <label for="batch-price">批量填充:</label>
                            <input type="text" id="batch_price" placeholder="价格">
                            <input type="text" id="batch_market_price" placeholder="市场价">
                            <!-- <input type="text" id="batch_stocks_code" placeholder="商家编码" maxlength="64">
                            <input type="text" id="batch_bar_code" placeholder="条形码"> -->
                            <input type="button" class="btn btn-primary radius ml-10 mb-10" value="确定" onclick="batch_set()" class="batch-submit">
                            &nbsp;&nbsp;&nbsp;<p class="hint" style="display: inline">点击可批量修改所有的值。</p>
                        </div>
                        <div nctype="spec_div" class="spec-div ps-container">
                            <table border="0" cellpadding="0" cellspacing="0" class="spec_table" style="width:80% !important">
                                <thead>
                                    <tr><th width="" nctype="spec_name_1">颜色</th>
                                        <th class="size">尺码</th>
                                        <th class="size-note">尺码备注</th>
                                        <th class="w90"><span class="red">*</span>销售价格</th>
                                        <th class="w90"><span class="red">*</span>市场价</th>
                                        <!--<th class="w90">折扣</th>-->
                                        <th class="w100"><span class="red">*</span>商家货号</th>
                                        <th class="w70">条形码</th>
                                    </tr>
                                </thead>
                                <tbody nc_type="spec_table" >
                                </tbody>
                            </table>
                            <div class="ps-scrollbar-x-rail" style="width: 0px; display: none; left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; display: none; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
                        <p class="hint">当规格值较多时，可在操作区域通过滑动滚动条查看超出隐藏区域。</p>
                    </dd>
                </dl>
                <dl>
                    <dt><i class="required">*</i>商品图片：</dt>
                    <dd>
                        <div class="ncsc-goods-default-pic">
                            <div class="goodspic-uplaod">
                                <div class="upload-thumb"> <img nctype="goods_image" src="<?php echo TEMPLE;?>
img/default_goods_image_60.gif"> </div>
                                <input type="hidden" name="base_info[goods_image]" id="image_path" nctype="goods_image" value="">
                                <span class="err"></span>
                                <p class="hint">上传商品默认主图，如多规格值时将默认使用该图或分规格上传各规格主图；支持jpg、gif、png格式上传或从图片空间中选择，建议使用<font color="red">尺寸800x800像素以上、大小不超过1M的正方形图片</font>，上传后的图片将会自动保存在图片空间的默认分类中。</p>
                                <div class="handle">
                                    <div class="ncsc-upload-btn">
                                        <a href="javascript:void(0);">
                                            <span><input type="file" hidefocus="true" size="1"  class="input-file" name="image" id="goods_image" data-name="jumpMenu_default" data-type="default_img"></span>
                                            <p><i class="fa fa-upload"></i>图片上传</p>
                                        </a>
                                    </div>
                                    <a class="ncbtn mt5" nctype="show_image" href="javascript:;" data-name="jumpMenu_default"><i class="fa fa-photo"></i>从图片空间选择</a>
                                    <a href="javascript:void(0);" nctype="del_goods_demo" class="ncbtn mt5" style="display:none;" ><i class="fa fa-arrow-circle-up"></i>关闭相册</a>
                                </div>
                            </div>
                        </div>
                        <div id="" class="mt-20 hide demo">
                            <div class="goods-gallery add-step2">
                                <!--  <a class="sample_demo" id="select_submit" href="" style="display:none;">提交</a>-->
                                <div class="nav"><span class="l">用户相册 &gt;全部图片</span>
                                    <span class="r">
                                        <select name="jumpMenu_default"  style="width:100px;" data-function="insert_img" onchange="get_pic(this, 1)">
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
                                <ul class="list pic_list" >
                                    <!-- <li onclick="insert_img('xx.png','<?php echo TEMPLE;?>
images/u374.png')"><a href="JavaScript:void(0);"><img src="<?php echo TEMPLE;?>
images/u374.png" ></a></li> -->
                                </ul>
                                <div class="pagination">

                                </div>
                            </div>
                        </div>
                    </dd>
                </dl>
                <h3 id="demo2" class="desc">商品详情描述</h3>
                <dl class="attr_dl">
                    <dt>商品属性：</dt>
                    <dd class="attr_dd">
                         
                    </dd>
                </dl>
                <dl class="desc_dl">
                    <dt>商品描述：</dt>
                    <dd id="ncProductDetails">
                        <div class="pd-10">
                            <div id="tab_demo" class="HuiTab">
                                <div class="tabBar cl">
                                    <span><i class="fa fa-desktop"></i> 电脑端</span>
                                    <span><i class="fa fa-mobile-phone"></i> 手机端</span>
                                </div>
                                <div class="tabCon mt-10">
                                    <div class="appcontainer" id="baidu_edit">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="content" name="content" type="text/plain"></textarea>
                                        <!-- 实例化编辑器 -->
                                        <?php echo '<script'; ?>
 type="text/javascript">
                                            var appcontent = UE.getEditor('content');
                                        <?php echo '</script'; ?>
>
                                    </div>
                                    <div class="handle">
                                        <div class="ncsc-upload-btn">
                                            <a href="javascript:void(0);">
                                                <span><input type="file" hidefocus="true" size="1" class="input-file" data-name="jumpMenu_editor" name="image" id="editor_img" data-name="jumpMenu_editor" data-type="editor_img" ></span>
                                                <p><i class="fa fa-upload"></i>图片上传</p>
                                            </a>
                                        </div>
                                        <a class="ncbtn mt5" nctype="show_image" href="javascript:;" data-name="jumpMenu_editor"><i class="fa fa-photo"></i>从图片空间选择</a>
                                        <a href="javascript:void(0);" nctype="del_goods_demo" class="ncbtn mt5" style="display:none;"><i class="fa fa-arrow-circle-up"></i>关闭相册</a>
                                    </div>
                                    <div id="" class="mt-20 hide demo">
                                        <div class="goods-gallery add-step2">
                                            <!--  <a class="sample_demo" id="" href="">提交</a>-->
                                            <div class="nav"><span class="l">用户相册 &gt;全部图片        </span>
                                                <span class="r">
                                                    <select name="jumpMenu_editor" id="" data-function="insert_editor" onchange="get_pic(this, 1)">
                                                        <option value="" style="width:80px;">请选择...</option>
                                                        <?php if (!empty($_smarty_tpl->tpl_vars['shop_albums']->value)) {?>
                                                        <?php
$_from = $_smarty_tpl->tpl_vars['shop_albums']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_6_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_6_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['aclass_id'];?>
" style="width:80px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['aclass_name'];?>
</option>
                                                        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_6_saved_local_item;
}
if ($__foreach_v_6_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_6_saved_item;
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
                                <div class="tabCon mt-10">
                                    <div class="ncsc-mobile-editor">
                                        <div class="pannel">
                                            <div class="size-tip"><span nctype="img_count_tip">图片总数不得超过<em>20</em>张</span><i>|</i><span nctype="txt_count_tip">文字不得超过<em>5000</em>字</span></div>
                                            <div class="control-panel" nctype="mobile_pannel"></div>
                                            <div class="add-btn">
                                                <ul class="btn-wrap">
                                                    <li><a href="javascript:void(0);" nctype="mb_add_img" data-name="jumpMenu_mobile"><i class="fa fa-photo"></i>
                                                            <p>图片</p>
                                                        </a></li>
                                                    <li><a href="javascript:void(0);" nctype="mb_add_txt"><i class="fa fa-font"></i>
                                                            <p>文字</p>
                                                        </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="explain">
                                            <dl>
                                                <dt>1、基本要求：</dt>
                                                <dd>（1）手机详情总体大小：图片+文字，图片不超过20张，文字不超过5000字；</dd>
                                                <dd>建议：所有图片都是本宝贝相关的图片。</dd>
                                            </dl>
                                            <dl>
                                                <dt>2、图片大小要求：</dt>
                                                <dd>（1）建议使用宽度480 ~ 620像素、高度小于等于960像素的图片；</dd>
                                                <dd>（2）格式为：JPG\JEPG\GIF\PNG；</dd>
                                                <dd>举例：可以上传一张宽度为480，高度为960像素，格式为JPG的图片。</dd>
                                            </dl>
                                            <dl>
                                                <dt>3、文字要求：</dt>
                                                <dd>（1）每次插入文字不能超过500个字，标点、特殊字符按照一个字计算；</dd>
                                                <dd>（2）请手动输入文字，不要复制粘贴网页上的文字，防止出现乱码；</dd>
                                                <dd>（3）以下特殊字符“&lt;”、“&gt;”、“"”、“'”、“\”会被替换为空。</dd>
                                                <dd>建议：不要添加太多的文字，这样看起来更清晰。</dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="ncsc-mobile-edit-area">
                                        <div class="ncsc-mea-img hide" nctype="mea_img">
                                            <div class="ncsc-upload-btn">
                                                <a href="javascript:void(0);">
                                                    <span><input type="file" hidefocus="true" size="1" class="input-file" name="image" id="mobile_img" data-name="jumpMenu_mobile" data-type="editor_img" ></span>
                                                    <p><i class="fa fa-upload"></i>图片上传</p>
                                                </a>
                                            </div>
                                            <a href="javascript:void(0);" nctype="del_goods_demo" class="ncbtn mt5" style=""><i class="fa fa-arrow-circle-up"></i>关闭相册</a>
                                            <div id="" class="mt-20 hide demo" style="display: block;">
                                                <div class="goods-gallery add-step2"><a class="sample_demo" id="" href="" style="display:none;">提交</a>
                                                    <div class="nav"><span class="l">相册 &gt;全部图片        </span>
                                                        <span class="r">
                                                            <select name="jumpMenu_mobile" id="" style="width:100px;" data-function="insert_mobile_img">
                                                                <option value="" style="width:80px;">请选择...</option>
                                                                <?php if (!empty($_smarty_tpl->tpl_vars['shop_albums']->value)) {?>
                                                                <?php
$_from = $_smarty_tpl->tpl_vars['shop_albums']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_7_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_7_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['aclass_id'];?>
" style="width:80px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['aclass_name'];?>
</option>
                                                                <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_7_saved_local_item;
}
if ($__foreach_v_7_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_7_saved_item;
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
                                        <div class="ncsc-mea-text hide" nctype="mea_txt">
                                            <p id="meat_content_count" class="text-tip"></p>
                                            <textarea class="textarea valid" nctype="meat_content"></textarea>
                                            <div class="button">
                                                <a class="ncbtn ncbtn-bluejeansjeansjeans" nctype="meat_submit" href="javascript:void(0);">确认</a>
                                                <a class="ncbtn ml10" nctype="meat_cancel" href="javascript:void(0);">取消</a>
                                            </div>
                                            <a class="text-close" nctype="meat_cancel" href="javascript:void(0);">X</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </dd>
                </dl>
            <h3 id="demo6">其他信息</h3>
                <dl>
                    <dt>物流方式：</dt>
                    <dd>
                        <select name="base_info[logistics_type]" id="base_info[logistics_type]" class="selecte pd-5 mb-10" onchange="">
                            <option value="0" selected>不限制</option>
                            <option value="1" >仅限到店提货</option>
                            <option value="2" >仅限快递</option>
                        </select>
                    </dd>
                </dl>
                <dl>
                    <dt>限购数量：</dt>
                    <dd>
                        <input name="base_info[limit_num]" type="text" class="text w400" value="">
                        <span class="err"></span>
                        <p class="hint">0 表示不限制</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="">是否可用优惠券</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="audit1" class="cb-enable selected" id="cb" title="开启">开启</label>
                            <label for="audit2" class="cb-disable " id="bc" title="关闭">关闭</label>
                            <input type="radio" id="audit1" name="base_info[available_coupons]" value="1" checked="checked">
                            <input type="radio" id="audit2" name="base_info[available_coupons]" value="0">
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="">是否支持会员折扣</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label for="audit1" class="cb-enable selected" id="cb" title="开启">开启</label>
                            <label for="audit2" class="cb-disable " id="bc" title="关闭">关闭</label>
                            <input type="radio" id="audit1" name="base_info[available_member_dis]" value="1" checked="checked">
                            <input type="radio" id="audit2" name="base_info[available_member_dis]" value="0">
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
            </div>
            <div class="bottom tc mt-30 mb-30">
                <label class="submit-border">
                    <input type="submit" nctype="formSubmit" class="submit" style="width: 200px;cursor: pointer" value="下一步，上传商品图片">
                </label>
            </div>
            <input name="m_body" autocomplete="off" type="hidden" value="">
        </form>
        <div id="fixedNavBar">
            <h3>页面导航</h3>
            <ul>
                <li><a id="demo1Btn"  href="#demo1" class="demoBtn">基本信息</a></li>
                <li><a id="demo2Btn" href="#demo2" class="demoBtn">详情描述</a></li>
                <!--<li><a id="demo4Btn" href="#demo4" class="demoBtn">物流运费</a></li>-->
                <!--<li><a id="demo5Btn" href="#demo5" class="demoBtn">发票信息</a></li>-->
                <li><a id="demo6Btn" href="#demo6" class="demoBtn">其他信息</a></li>
            </ul>
        </div>
        <?php echo '<script'; ?>
>

        <?php echo '</script'; ?>
>
    </div>
    <?php echo '<script'; ?>
 type="text/javascript">
    	
    	$('#goback').click(function(){
    		
    		window.history.back(); 
    	})
    	
    	//  	判断是编辑还会提交新的内容
    	var confirmtype;
    	
        $(function () {
            get_class_option('#gc_id');
            get_gstn_option('#gstn_id');
            function get_class_option(obj,class_id){
                var class_id = arguments[1] ? arguments[1] : 0; //设置默认参数
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
                        }else if(data.state){
                            $(obj).append(data.info);
                        } 
                    }
                })
            }
            function get_gstn_option(obj,gstn_id){
                var gstn_id = arguments[1] ? arguments[1] : 0; //设置默认参数
                if($(obj).length==0){
                    return false;
                }
                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:'ajax_get_gstn_option?gstn_id='+gstn_id,
                    success:function(data){
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                        }else if(data.state){
                            $(obj).append(data.info);
                        } 
                    }
                })
            }
            //console.log($('#gc_id').val());
            if($('#gc_id').val()>0){
            	$.ajax({
                    type:'get',
                    dataType:'json',
                    url:'ajax_get_attr?class_id='+$('#gc_id').val(),
                    success:function(data){
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                        }else if(data.state){
                        	ajax_input_attr_html(data.info);
                        } 
                    }
                })
            }
            $(".select2").select2({
                width:'200px'
            });
            //上传显示
            $(".type-file-file").change(function () {
                $(".type-file-text").val($(this).val());
            });
            //滚动条
            $('div[nctype="brandList"]').perfectScrollbar();
            //商品品牌  隐藏显示
            $('#brand_name').focus(function () {
                $('.ncsc-brand-select > .ncsc-brand-select-container').show();
            });
            // 选择品牌
            $('ul[nctype="brand_list"]').on('click', 'li', function () {
                $('#b_id').val($(this).attr('data-id'));
                $('#brand_name').val($(this).attr('data-name'));
                $('.ncsc-brand-select > .ncsc-brand-select-container').hide();
                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:'ajax_get_brand_size?brand_id='+$(this).attr('data-id'),
                    success:function(data){
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                        }else if(data.state){
                        	var size_type = Array('','中国码','美国码','英国码','日本码');
                        	var sizes_list = '';
                            var sizes_html = '<div>';
                            var num = 0;
                            var style = 'display: block;background-color: #F6F7Fb;';
                            var checked = 'checked="checked"';
                            sizes_html += '<div class="col-conten">';
                            $.each(data.sizes,function(k,v){
                                if(num>0){
                                    checked = '';
                                    style = 'display: none;';
                                }
                                
                                /* sizes_html +='<label class="mr-10 ml-5">'+
                                        '<input type="radio" name="size_type" class="size_type" value="'+k+'" '+checked+' >'+
                                        size_type[k]+'</label>'; */
                               if(v.size_list !== undefined){
                                   sizes_list +='<div style="'+style+'" class="size_list size_list_'+k+'"><ul>';
                                    $.each(v.size_list,function(kk,vv){
                                        sizes_list += '<li  style="" class="f-l mr-10 ml-5" data-order="0" data-text="'+vv.size+'" data-value="'+vv.size+'" class="remark">'+
                                                '<label>'+
                                                '<input type="checkbox" class="size_val" data-code="'+k+'" data-text="'+vv.size+'" name="" value="'+vv.size+'">'+
                                                vv.size+'</label></li>';
                                    })
                                    sizes_list +='</ul><div class="clear"></div></div>';
                                }
                               num ++;
                            })
                            sizes_html += '</div>';
                            sizes_html += sizes_list;
                            sizes_html += '</div>';
                            $("dl.size_dl").attr("style",'');
                            $("dd.size_dd").html(sizes_html);
                            //console.log(1223123)
                            //console.log($('tbody[nc_type=spec_table]').length)
                            $('tbody[nc_type=spec_table]').html('');
                        } 
                    }
                })
            });
            
            /*表单验证*/
            var isCodeSubmit = true;
            function stockCodeCheck(){
            	isCodeSubmit = true;
            	 $('input.sku').each(function(){
            		 obj = $(this);
                 	stockCode = $(this).val();brand_id = $('#b_id').val();
                 	size = $(this).parents('tr').find('.size_val').val();
                 	color = $(this).parents('tr').find('.color').val();
                 	checkStockCode = true;
                 	if(stockCode!=''){
                 		isUseC = true;
                 		$('input.sku').each(function(){
                 			sizeNow = $(this).parents('tr').find('.size_val').val();
                 			colorNow = $(this).parents('tr').find('.color').val();
                 			//console.log(colorNow);
                 			if($(this).val()==stockCode&&color!=colorNow){
                 				obj.siblings('span.checkCode').show();
                 				isUseC = false;
                 			}
                 		})
                 		//console.log(isUseC);
                 		if(isUseC){
                 			obj.siblings('span.checkCode').hide();
                 			$.ajax({
                                url :'checkStockCode',
                                type:'post',
                                cache:false,
        	                    async:false,
                                data:{
                                	stock_code : stockCode,
                                	brand_id : brand_id,
                                },
                                dataType:'json',
                                success:function(data){
                                    if(data.state == '403'){
                                        layer.msg(data.msg);
                                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                                    }else if(data.state == '401'){
                                        layer.msg(data.msg);
                                    }else if(data){
                                		checkStockCode = true;
                                	}else{
                                		checkStockCode = false;
                                	}
                                }
                            })
                 		}else{
                 			isCodeSubmit = false;
                 		}
                 		//console.log(checkStockCode);
                 		if(!checkStockCode){
                 			obj.siblings('span.dberr').show();
                 			isCodeSubmit = false;
                 		}else{
                 			obj.siblings('span.dberr').hide();
                 		}
                 		price = $(this).parents('tr').find('.sell_price').val();
                 		marketprice = $(this).parents('tr').find('.goods_marketprice').val();
                 		if(parseFloat(price)>=0){
                 			$(this).parents('tr').find('.sell_price').removeClass('errrrr');
                 		}else{
                 			//$(this).parents('tr').find('input.sell_price').css({"background-color":"#FFF0F0","background-repeat":"repeat","border":"1px dashed #E84C3D"});
                 			$(this).parents('tr').find('input.sell_price').addClass('errrrr');
                 			//$(this).parents('tr').find('input.goods_marketprice').addClass('error');
                 			isCodeSubmit = false;
                 		}
                 		if(parseFloat(marketprice)>=0){
                 			$(this).parents('tr').find('.goods_marketprice').removeClass('errrrr');
                 		}else{
                 			//$(this).parents('tr').find('input.sell_price').css({"background-color":"#FFF0F0","background-repeat":"repeat","border":"1px dashed #E84C3D"});
                 			$(this).parents('tr').find('input.goods_marketprice').addClass('errrrr');
                 			//$(this).parents('tr').find('input.goods_marketprice').addClass('error');
                 			isCodeSubmit = false;
                 		}
                 	}else{
                 		$(this).addClass('error');
             			isCodeSubmit = false;
                 	}
                 })
            }
           
            // 防止重复提交
            var __formSubmit = false;
            $(".submit-border .submit[nctype='formSubmit']").click(function () {
            	stockCodeCheck();
            	//console.log(isCodeSubmit);
                if (__formSubmit) {
                    return false;
                }
                if(!isCodeSubmit){
                	return false;
                }
                if ($("#form_2").valid()) {
                    __formSubmit = true;
                    $("#form_2").submit();
                }
            })
            //颜色必选
            jQuery.validator.methods.colorISnull = function(value, element) {
            	var colorStatus = false;
		        $('div.choose_color_box').find('.choose_color_box_list').each(function(){
		        	var isCheckColor = $(this).find('input[type=checkbox]');
		        	var isCheckColorValue = $(this).find('input[nctype=pv_name]').val();
		        	if(isCheckColor.is(':checked')&&isCheckColorValue!=''){
		        		colorStatus = true;
		        	}
		        })
		        return colorStatus;
		    };
            //尺码必选
            jQuery.validator.methods.sizeISnull = function(value, element) {
            	var sizeStatus = false;
		        $('dl.size_dl').find('.size_list').find('ul').find('li').each(function(){
		        	var isCheckSize = $(this).find('input[type=checkbox]');
		        	if(isCheckSize.is(':checked')){
		        		sizeStatus = true;
		        	}
		        })
		        return sizeStatus;
		    };
            //款号唯一检验
            jQuery.validator.methods.isHaveBrand = function(value, element) {
            	var brandId = $('#b_id').val();
            	if(brandId){
            		return true;
            	}else{
            		return false;
            	}
		    };
            
            $('#form_2').validate({
                errorPlacement: function (error, element) {
                    __formSubmit = false;
                    $(element).nextAll('span.err').append(error);
                },
                rules: {
                	
                	/* "base_info[year_to_market]": {
                        required: true,
                        number: true,
                        minlength: 4,
                        maxlength: 4
                    }, */
                    "base_info[season_to_market]": {
                        required: true,
                    },
                    "base_info[sex]": {
                        required: true,
                    },
                    
                    "base_info[goods_name]": {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    "base_info[gc_id]": {
                       required: true
                    },
                    "base_info[brand_name]": {
                       required: true
                    },
                    "base_info[goods_jingle]": {
                        maxlength: 140
                    },
                    "base_info[weight]": {
                        required :true,
                    },
                    "base_info[goods_spu]": {
                    	required: true,
                    	isHaveBrand: true,
                    	remote	: {
                            url :'checkSpu',
                            type:'post',
                            cache:false,
    	                    async:false,
                            data:{
                            	goods_spu : function(){
                                    return $('#stocks_code').val();
                                },
                            	brand_id : function(){
                                    return $('#b_id').val();
                                },
                            }
                        },
                    },
                    "colorISnull": {
                    	colorISnull: true,
                    },
                    "sizeISnull": {
                    	sizeISnull: true,
                    },
                    "base_info[goods_price]" : {
                        required    : true,
                        number      : true,
                        min         : 0.01
//                     max         : 9999999,
                     //checkPrice  : true
                     },
                    "base_info[goods_marketprice]" : {
                        required    : true,
                        number      : true,
                        min         : 0.01
//                     max         : 9999999,
                     //checkPrice  : true
                     },
//                    goods_costprice: {
//                        number: true,
//                        min: 0.00,
//                        max: 9999999
//                    },
                    /*amount  : {
                     required    : true,
                     digits      : true,
                     min         : 0,
                     max         : 999999999
                     },*/
                    "base_info[goods_image]": {
                        required: true
                    },
                    g_vindate: {
                        required: function () {
                            if ($("#is_gv_1").prop("checked")) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    },
                    g_vlimit: {
                        required: function () {
                            if ($("#is_gv_1").prop("checked")) {
                                return true;
                            } else {
                                return false;
                            }
                        },
                        range: [1, 10]
                    },
                    g_deliverdate: {
                        required: function () {
                            if ($('#is_presell_1').prop("checked")) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                },
                messages: {
                	  /*  "base_info[year_to_market]": {
                           required: '<i class="fa fa-exclamation-circle"></i>上市年份不能为空',
                           number: '<i class="fa fa-exclamation-circle"></i>上市年份只能是数字',
                           minlength: '<i class="fa fa-exclamation-circle"></i>上市年份长度只能是4个字符',
                           maxlength: '<i class="fa fa-exclamation-circle"></i>上市年份长度只能是4个字符',
                       }, */
                       "base_info[season_to_market]": {
                           required: '<i class="fa fa-exclamation-circle"></i>上市季节不能为空'
                        },
                        "base_info[sex]": {
                            required: '<i class="fa fa-exclamation-circle"></i>商品性别不能为空'
                         },
                    "base_info[goods_name]": {
                        required: '<i class="fa fa-exclamation-circle"></i>商品名称不能为空',
                        minlength: '<i class="fa fa-exclamation-circle"></i>商品标题名称长度至少3个字符，最长50个汉字',
                        maxlength: '<i class="fa fa-exclamation-circle"></i>商品标题名称长度至少3个字符，最长50个汉字'
                    },
                    "base_info[gc_id]": {
                       required: '<i class="fa fa-exclamation-circle"></i>商品分类不能为空'
                    },
                    "base_info[brand_name]": {
                       required: '<i class="fa fa-exclamation-circle"></i>商品品牌不能为空'
                    },
                    "base_info[goods_jingle]": {
                        maxlength: '<i class="fa fa-exclamation-circle"></i>商品卖点不能超过140个字符'
                    },
                    "base_info[goods_spu]": {
                    	required: '<i class="fa fa-exclamation-circle"></i>款号不能为空',
                    	isHaveBrand: '<i class="fa fa-exclamation-circle"></i>请先选择品牌',
                    	remote	: '<i class="fa fa-exclamation-circle"></i>该品牌下此款号已占用',
                    },
                    "base_info[weight]": {
                        required: '<i class="fa fa-exclamation-circle"></i>重量不能为空',
                    },

                    "colorISnull": {
                    	colorISnull: '<i class="fa fa-exclamation-circle"></i>颜色必选',
                    },
                    "sizeISnull": {
                    	sizeISnull: '<i class="fa fa-exclamation-circle"></i>尺码必选',
                    },
                    "base_info[goods_price]": {
                        required: '<i class="fa fa-exclamation-circle"></i>商品价格不能为空',
                        number: '<i class="fa fa-exclamation-circle"></i>商品价格只能是数字',
                        min: '<i class="fa fa-exclamation-circle"></i>商品价格必须是0.01~9999999之间的数字',
                        max: '<i class="fa fa-exclamation-circle"></i>商品价格必须是0.01~9999999之间的数字',
                        checkPrice: '<i class="fa fa-exclamation-circle"></i>商品价格不能高于市场价格'
                    },
                    "base_info[goods_marketprice]": {
//                        required: '<i class="fa fa-exclamation-circle"></i>请填写市场价',
                        number: '<i class="fa fa-exclamation-circle"></i>请填写正确的价格',
                        min: '<i class="fa fa-exclamation-circle"></i>请填写0.01~9999999之间的数字',
                        max: '<i class="fa fa-exclamation-circle"></i>请填写0.01~9999999之间的数字',
                        checkPrice: '<i class="fa fa-exclamation-circle"></i>市场价格不能低于商品价格'
                    },
                    goods_costprice: {
                        number: '<i class="fa fa-exclamation-circle"></i>请填写正确的价格',
                        min: '<i class="fa fa-exclamation-circle"></i>请填写0.00~9999999之间的数字',
                        max: '<i class="fa fa-exclamation-circle"></i>请填写0.00~9999999之间的数字'
                    },
                    /*amount : {
                     required    : '<i class="fa fa-exclamation-circle"></i>商品库存不能为空',
                     digits      : '<i class="fa fa-exclamation-circle"></i>库存只能填写数字',
                     min         : '<i class="fa fa-exclamation-circle"></i>商铺库存数量必须为0~999999999之间的整数',
                     max         : '<i class="fa fa-exclamation-circle"></i>商铺库存数量必须为0~999999999之间的整数'
                     },*/
                    "base_info[goods_image]": {
                        required: '<i class="fa fa-exclamation-circle"></i>请设置商品主图'
                    },
                    g_vindate: {
                        required: '<i class="fa fa-exclamation-circle"></i>请选择有效期'
                    },
                    g_vlimit: {
                        required: '<i class="fa fa-exclamation-circle"></i>请填写1~10之间的数字',
                        range: '<i class="fa fa-exclamation-circle"></i>请填写1~10之间的数字'
                    },
                    g_deliverdate: {
                        required: '<i class="fa fa-exclamation-circle"></i>请选择有效期'
                    }
                }
            });
           
            //点击从图片空间选择
            $(".ncbtn[nctype='show_image']").click(function () {
                $(this).hide();
                $(this).next().show();
                var name = $(this).data("name");
                var obj = $(this).parents("dd").find('select[name="' + name + '"]');
                get_pic(obj, 1);
                $(this).parents("dd").find(".demo").show();
            })
            //关闭相册
            $(".ncbtn[nctype='del_goods_demo']").click(function () {
                $(this).hide();
                $(this).prev().show();
                $(this).parents("dd").find(".demo").hide();
            })
            //h-ui 选项卡
            $.Huitab("#tab_demo .tabBar span", "#tab_demo .tabCon", "current", "click", "0");
            //手机端
            $('.btn-wrap a[nctype="mb_add_img"]').on("click", function () {
                $(".ncsc-mobile-edit-area .ncsc-mea-text").hide();
                $(".ncsc-mobile-edit-area .ncsc-mea-img").show();
                $(".ncsc-mobile-edit-area .ncsc-mea-img a").show();
                $(".ncsc-mobile-edit-area .ncsc-mea-img div").show();
                var name = $(this).data("name");
                var obj = $(this).parents("dd").find('select[name="' + name + '"]');
                get_pic(obj, 1);

            })

            // 手机端——插图图片
            insert_mobile_img = function (obj) {
                var filepath = $(obj).data('src');
                _data = new Object;
                _data.type = 'image';
                _data.value = filepath;
                _rs = mDataInsert(_data);
                $('<div class="module m-image"></div>')
                        .append('<div class="tools"><a nctype="mp_up" href="javascript:void(0);">上移</a><a nctype="mp_down" href="javascript:void(0);">下移</a>' +
                                '<a nctype="mp_rpl" href="javascript:void(0);">替换</a><a nctype="mp_del" href="javascript:void(0);">删除</a></div>')
                        .append('<div class="content"><div class="image-div"><img src="' + filepath + '"></div></div>')
                        .append('<div class="cover"></div>').appendTo('div[nctype="mobile_pannel"]');
            }
            /* 手机端 商品描述 */
            // 显示隐藏控制面板
            $('div[nctype="mobile_pannel"]').on('click', '.module', function () {
                mbPannelInit();
                $(this).siblings().removeClass('current').end().addClass('current');
            });
            // 上移
            $('div[nctype="mobile_pannel"]').on('click', '[nctype="mp_up"]', function () {
                var _parents = $(this).parents('.module:first');
                _rs = mDataMove(_parents.index(), 0);
                if (!_rs) {
                    return false;
                }
                _parents.clone().insertBefore(_parents.prev()).end().remove();
                mbPannelInit();
            });
            // 下移
            $('div[nctype="mobile_pannel"]').on('click', '[nctype="mp_down"]', function () {
                var _parents = $(this).parents('.module:first');
                _rs = mDataMove(_parents.index(), 1);
                if (!_rs) {
                    return false;
                }
                _parents.clone().insertAfter(_parents.next()).end().remove();
                mbPannelInit();
            });
             // 编辑
        $('div[nctype="mobile_pannel"]').on('click', '[nctype="mp_edit"]', function(){
        	confirmtype=1;
            $(".ncsc-mobile-edit-area .ncsc-mea-text").show();
            $(".ncsc-mobile-edit-area .ncsc-mea-img").hide();
            
            $('textarea[nctype="meat_content"]').unbind().charCount({
                allowed: 500,
                warning: 50,
                counterContainerID: 'meat_content_count',
                firstCounterText:   '还可以输入',
                endCounterText:     '字',
                errorCounterText:   '已经超出'
            });
           
            
        var text_div = $(this).parent().next().find(".text-div");
        $(".ncsc-mobile-edit-area .ncsc-mea-text textarea").val(text_div.html())
        
            mbPannelInit();
        });
            // 删除
            $('div[nctype="mobile_pannel"]').on('click', '[nctype="mp_del"]', function () {
                var _parents = $(this).parents('.module:first');
                mDataRemove(_parents.index());
                _parents.remove();
                mbPannelInit();
            });
            // 初始化控制面板
            mbPannelInit = function () {
                $('div[nctype="mobile_pannel"]')
                        .find('a[nctype^="mp_"]').show().end()
                        .find('.module')
                        .first().find('a[nctype="mp_up"]').hide().end().end()
                        .last().find('a[nctype="mp_down"]').hide();
            }
            // 获取数据
            mDataGet = function () {
                _m_body = $('input[name="m_body"]').val();
                if (_m_body == '' || _m_body == 'false') {
                    var _m_data = new Array;
                } else {
                    eval('var _m_data = ' + _m_body);
                }
                return _m_data;
            }
            // 设置数据
            mDataSet = function (data) {
                var _i_c = 0;
                var _i_c_m = 20;
                var _t_c = 0;
                var _t_c_m = 5000;
                var _sign = true;
                $.each(data, function (i, n) {
                    if (n.type == 'image') {
                        _i_c += 1;
                        if (_i_c > _i_c_m) {
                            layer.msg('只能选择' + _i_c_m + '张图片');
                            _sign = false;
                            return false;
                        }
                    } else if (n.type == 'text') {
                        _t_c += n.value.length;
                        if (_t_c > _t_c_m) {
                            layer.msg('只能输入' + _t_c_m + '个字符');
                            _sign = false;
                            return false;
                        }
                    }
                });
                if (!_sign) {
                    return false;
                }
                $('span[nctype="img_count_tip"]').html('还可以选择图片<em>' + (_i_c_m - _i_c) + '</em>张');
                $('span[nctype="txt_count_tip"]').html('还可以输入<em>' + (_t_c_m - _t_c) + '</em>字');

                _data = JSON.stringify(data);

                $('input[name="m_body"]').val(_data);
                return true;
            }

            // type 0上移  1下移
            mDataMove = function (index, type) {

                _m_data = mDataGet();
                _data = _m_data.splice(index, 1);
                if (type) {
                    index += 1;
                } else {
                    index -= 1;
                }
                _m_data.splice(index, 0, _data[0]);
                return mDataSet(_m_data);
            }
            // 数据移除
            mDataRemove = function (index) {
                _m_data = mDataGet();
                _m_data.splice(index, 1);     // 删除数据
                return mDataSet(_m_data);
            }
            // 替换数据
            mDataReplace = function (index, data) {
                _m_data = mDataGet();
                _m_data.splice(index, 1, data);
                return mDataSet(_m_data);
            }
            // 插入数据
            mDataInsert = function (data) {
                _m_data = mDataGet();
                _m_data.push(data);
                return mDataSet(_m_data);
            }
            // 手机——编辑
            $(".add-btn a[nctype='mb_add_txt']").click(function () {
                $(".ncsc-mobile-edit-area .ncsc-mea-text").show();
                $(".ncsc-mobile-edit-area .ncsc-mea-img").hide();
                $('textarea[nctype="meat_content"]').unbind().charCount({
                    allowed: 500,
                    warning: 50,
                    counterContainerID: 'meat_content_count',
                    firstCounterText: '还可以输入',
                    endCounterText: '字',
                    errorCounterText: '已经超出'
                });
            })
            // 手机——编辑 关闭
            $('a[nctype="meat_cancel"]').click(function () {
            	$(".text-tip").html("");
                $(this).parents('div[nctype="mea_txt"]').find('textarea[nctype="meat_content"]').val('').end().hide();
            });
            // 转码
            toTxt = function (str) {
                var RexStr = /\<|\>|\"|\'|\&|\\/g
                str = str.replace(RexStr, function (MatchStr) {
                    switch (MatchStr) {
                        case "<":
                            return "";
                            break;
                        case ">":
                            return "";
                            break;
                        case "\"":
                            return "";
                            break;
                        case "'":
                            return "";
                            break;
                        case "&":
                            return "";
                            break;
                        case "\\":
                            return "";
                            break;
                        default:
                            break;
                    }
                })
                return str;
            }
            // 手机——提交 文字输入框按钮
            $('a[nctype="meat_submit"]').click(function () {
                var _c = toTxt($('textarea[nctype="meat_content"]').val().replace(/[\r\n]/g, ''));
                var _cl = _c.length;
                if (_cl == 0 || _cl > 500) {
                    return false;
                }
                _data = new Object;
                _data.type = 'text';
                _data.value = _c;
                _rs = mDataInsert(_data);
                if (!_rs) {
                    return false;
                }
                if(confirmtype==1){
            		$(".current .text-div").html(_c);
	            }else{
	            	$('<div class="module m-text"></div>')
	                    .append('<div class="tools"><a nctype="mp_up" href="javascript:void(0);">上移</a><a nctype="mp_down" href="javascript:void(0);">下移</a><a nctype="mp_edit" href="javascript:void(0);">编辑</a><a nctype="mp_del" href="javascript:void(0);">删除</a></div>')
	                    .append('<div class="content"><div class="text-div">' + _c + '</div></div>')
	                    .append('<div class="cover"></div>').appendTo('div[nctype="mobile_pannel"]');
				}
	            $('a[nctype="meat_cancel"]').click();
	            $(".text-tip").html("");
            });
            
            // 商品价格改变计算折扣
            $('input[name="base_info[goods_price]"]').change(function () {
                var _new_val = $(this).val();
                $("#batch_price").val(_new_val);
                var goods_marketprice = $("input[name='base_info[goods_marketprice]']").val();
                if (goods_marketprice) {
                    discountCalculator();
                }
            })
                // 商品价格改变计算折扣
            $('input[name="base_info[goods_marketprice]"]').change(function () {
                var _new_val = $(this).val();
                $("#batch_market_price").val(_new_val);
                var goods_price = $("input[name='base_info[goods_price]']").val();
                if (goods_price) {
                    discountCalculator();
                }
            })
        });

//            // 计算折扣
            function discountCalculator() {
                
                var _price = parseFloat($('input[name="base_info[goods_price]"]').val());
                var _marketprice = parseFloat($('input[name="base_info[goods_marketprice]"]').val());
                if ((!isNaN(_price) && _price != 0) && (!isNaN(_marketprice) && _marketprice != 0)) {
                    var _discount = parseInt(_price / _marketprice * 100);
                     console.log(_discount);
                    $('input[name="base_info[discount]"]').val(_discount);
                }
            }

//        });


        /* 插入商品图片 */
        function insert_img(obj) {
            var name = $(obj).data('name');
            var src = $(obj).data('src');
            $('input[nctype="goods_image"]').val(name);
            $('img[nctype="goods_image"]').attr('src', src);
        }
        //h-ui 选项卡
        jQuery.Huitab = function (tabBar, tabCon, class_name, tabEvent, i) {
            var $tab_menu = $(tabBar);
            // 初始化操作
            $tab_menu.removeClass(class_name);
            $(tabBar).eq(i).addClass(class_name);
            $(tabCon).hide();
            $(tabCon).eq(i).show();

            $tab_menu.bind(tabEvent, function () {
                $tab_menu.removeClass(class_name);
                $(this).addClass(class_name);
                var index = $tab_menu.index(this);
                $(tabCon).hide();
                $(tabCon).eq(index).show();
            });
        }
        //电脑端——插入图片到百度编辑器
        /* 插入编辑器 */
        function insert_editor(obj) {
            var file_path = $(obj).data('src');
            appcontent.execCommand('insertimage', {
                src: file_path,
                /* width:'100',
                 height:'100'*/
            });
        }
        //品牌搜索————按字母
        $('.letter[nctype="letter"]').find('a[data-letter]').click(function () {
            var _url = $(this).parents('.brand-index:first').attr('data-url');
            var _tid = $(this).parents('.brand-index:first').attr('data-tid');
            var _letter = $(this).attr('data-letter');
            var _search = $(this).html();
            $.getJSON(_url, {type: 'letter', tid: _tid, letter: _letter}, function (data) {
                insertBrand(data, _search);
            });
        });
        //品牌搜索————按关键字
        $('.search[nctype="search"]').find('a').click(function () {
            var _url = $(this).parents('.brand-index:first').attr('data-url');
            var _tid = $(this).parents('.brand-index:first').attr('data-tid');
            var _keyword = $('#search_brand_keyword').val();
            $.getJSON(_url, {type: 'keyword', tid: _tid, keyword: _keyword}, function (data) {
                insertBrand(data, _keyword);
            });
        });
        function insertBrand(param, search) {
            $('div[nctype="brandList"]').show();
            $('div[nctype="noBrandList"]').hide();
            var _ul = $('ul[nctype="brand_list"]');
            _ul.html('');
            if ($.isEmptyObject(param)) {
                $('div[nctype="brandList"]').hide();
                $('div[nctype="noBrandList"]').show().find('strong').html(search);
                return false;
            }
            $.each(param, function (i, n) {
                $('<li data-id="' + n.brand_id + '" data-name="' + n.brand_name + '"><em>' + n.brand_initial + '</em>' + n.brand_name + '</li>').appendTo(_ul);
            });

            //鎼滅储鍝佺墝鍒楄〃婊氭潯缁戝畾
            $('div[nctype="brandList"]').perfectScrollbar('update');
        }
        function getImageWidthAndHeight(id, callback) {
            var _URL = window.URL || window.webkitURL;
            $("." + id).change(function (e) {
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function () {
                        callback && callback({"width": this.width, "height": this.height, "filesize": file.size});
                    };
                    img.src = _URL.createObjectURL(file);
                }
            });
        }
        //解决file change事件只能用一次的问题
        $("body").delegate('input[type="file"]', 'change',function () {
            ajax_upload($(this));
        });
//        $('.ncsc-upload-btn').find('input[type="file"]').unbind().change(function () {
//            ajax_upload($(this));
//        });
        function ajax_upload(obj) {
            var filepath = $(obj).val();
            var nctype_image = $(obj).attr('id');
            var type = $(obj).data('type');
            var name = $(obj).data('name');
            var next_obj = $(obj).parents("dd").find('select[name="' + name + '"]');
            if (!/.(gif|jpg|png|GIF|JPG|PNG)$/.test(filepath)) {
                layer.msg("图片限于gif,jpg,png格式");
                $(obj).val("").focus();
                return false;
            }
            $.ajaxFileUpload({
                url : 'goods_pic_upload?op=ajax_upload',
                secureuri : false,
                fileElementId : nctype_image,
                dataType : 'json',
                data : {name : 'image'},
                success : function (data, status) {
                    if(type == 'default_img'){
                        if (data.state == false) {
                            layer.msg(data.msg)
                        } else {
                            $('input[nctype="'+nctype_image+'"]').val(data.pic_info.apic_cover);
                            $('img[nctype="'+nctype_image+'"]').attr('src',data.pic_info.pic_url);
                        }
                    }else if(type == 'editor_img' || type == 'mobile_img'){
                        if (data.state == false) {
                            layer.msg(data.msg)
                        }else{
                            $(next_obj).parents("dd").find(".demo").show();
                            get_pic(next_obj,1)
                        }
                    }
                },
                error : function (data, status, e) {
                    layer.msg(e);
                    //$.getScript(SHOP_RESOURCE_SITE_URL+ '/js/store_goods_add.step3.js');
                }
            });
        }
        function get_pic(this_obj, curr) {
            var aclass_id = $(this_obj).val();
            $.getJSON('goods_pic_room_view?op=page', {aclass_id: aclass_id, rp: 24,
                curpage: curr //向服务端传的参数，此处只是演示
            }, function (data) {
                var content = '';
                var onclick_function = $(this_obj).data('function');
                if (data.pic_info) {
                    $.each(data.pic_info, function (k, v) {
                        content += '<li data-name="' + v.apic_cover + '" data-src="' + v.pic_url + '"  onclick="' + onclick_function + '(this)">' +
                                '<a href="JavaScript:void(0);"><img src=' + v.pic_url + ' ></a></li>';
                    })
                }
                $(this_obj).parents('.nav').next('.pic_list').html(content);
                //显示分页
                laypage({
                    cont: $(this_obj).parents('.demo').find(".pagination"),
                    skin: '#41BEDD',
                    pages: data.page_info.page_count, //通过后台拿到的总页数
                    curr: data.page_info.curr, //当前页
                    jump: function (obj, first) { //触发分页后的回调
                        if (!first) { //点击跳页触发函数自身，并传递当前页：obj.curr
                            get_pic(this_obj, obj.curr);
                        }
                    }
                });
            });
        }
        function change_sp_value(obj, value_id) {
            var value = $(obj).val();
            $.getJSON('ajax_edit_spec_value', {value_id: value_id, sp_value_name: value}, function (data) {
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if (data.state == true) {

                } else {
                    layer.msg(data.msg);
                    $(obj).value = data.data;
                }

            });
        }

    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
         
        //选中input
        var d = 1;
        var s = 0;
        var i = 0;
        var s_arr = [];
        //info:选中那条的数据
        //type:类型1：颜色 2：尺码
        //op:类型1：增加 2：删除
        function change_table(info,type,op) {
            var info = arguments[0] ? arguments[0] : {};
            var type = arguments[1] ? arguments[1] : 1;
            var op   = arguments[2] ? arguments[2] : 1;
            if($(".size_list input.size_val:checked").length<=0 || $(".choose_color_box_list .color-select:checked").length<=0 ){
                $('dl[nc_type="spec_dl"]').hide();
                $('tbody[nc_type="spec_table"]').empty();
                return false;
            }
            var l = '';
            var color_flag = '';
            var size_val = '';
            if($('tbody[nc_type="spec_table"] tr').length<=0){ //还没有一行数据时
                var color_arr = $(".choose_color_box_list .color-select:checked");
                var size_arr  = $(".size_list input.size_val:checked");
                var c_info = {};
                $.each(color_arr,function(){
                    if($(this).next('input.picker-text').val()==''){ //颜色值为空
                        return true;
                    }
                    color_flag = $(this).parent('.choose_color_box_list').attr('id');
                    s_arr = color_flag.split("_");
                    s = s_arr[2]*1;
                    c_info.name = $(this).next("input.picker-text").val();
                    $.each(size_arr,function(){
                        i++;
                        size_val = $(this).val(); 
                        code_segment = $(this).data('code');
                        l += '<tr class="'+color_flag+' size_tr_'+size_val+'">';
                        //颜色
                        l += '<td><input type="hidden"  class="color" name="size[' + s + ']['+i+'][color]" value="' + c_info.name + '" />'+
                                '<span class="goods_color">' + c_info.name + '</span>' ;
                        //尺码
                        l +='<td>'+
                            '<input type="hidden"  class="size_val" name="size[' + s + ']['+i+'][size]" value="' + size_val + '" />'+
                            '<input type="hidden"  class="code_segment" name="size[' + s + ']['+i+'][code_segment]" value="' + code_segment + '" />'+
                            '<span class="goods_size">' + size_val + '</span>' +
                            '</td>';
                        //尺码备注
                        l +='<td>'+
                            '<input type="text"  class="size_note" name="size[' + s + ']['+i+'][size_note]" value="' + size_val + '" />'+
                            '</td>';

                        l +='<td><input class="text price sell_price" type="text" name="size[' + s + ']['+i+'][stocks_price]" data_type="price" nc_type="price" value="'+$("#batch_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
                            '<td><input class="text price goods_marketprice" type="text" name="size[' + s + ']['+i+'][stocks_marketprice]" data_type="marketprice" nc_type="|marketprice" value="'+$("#batch_market_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
        //                        '<td><input class="text price" type="text" name="discount" data_type="price" nc_type="discount" value=""/></td>' +
                            '<td><input class="text sku stocks_code" type="text" name="size[' + s + ']['+i+'][stocks_sku]" nctype="stocks_code" value="" /><span class="error checkCode" style="display:none;">此货号已有其他颜色占用。</span><span class="error dberr" style="display:none;">此货号已被同品牌的其他商品占用。</span></td>' +
                            '<td><input class="text bar_code" type="text" name="size[' + s + ']['+i+'][stocks_bar_code]" data_type="stocks_bar_code" nc_type="|stocks_bar_code" value="" /></td>' +
                            '</tr>';
                    })
                })
                $('tbody[nc_type="spec_table"]').html(l);
                if($('tbody[nc_type="spec_table"] tr').length>0){
                    $('dl[nc_type="spec_dl"]').show();
                }else{
                    $('dl[nc_type="spec_dl"]').hide();
                }
            }else if(type==1){ //颜色改变
                color_flag = info.li_id;
                s_arr = color_flag.split("_");
                s = s_arr[2]*1;
                if(op==2){
                    if($('tbody[nc_type="spec_table"] tr.'+color_flag).length>0){
                        $('tbody[nc_type="spec_table"] tr.'+color_flag).remove();
                    }
                    return false;
                }
                if($('tbody[nc_type="spec_table"] tr.'+color_flag).length>0){
                    return false;
                }
//            var info = {
//                    color_v:c_name,
//                    c_rgb:c_rgb, 
//                    remark:remark,
//                    li_id:li_id,
//                };
                var size_arr  = $(".size_list input.size_val:checked");
                $.each(size_arr,function(){
                    i++;
                    size_val = $(this).val(); 
                    code_segment = $(this).data('code');
                    l += '<tr class="'+color_flag+' size_tr_'+size_val+'">';
                    //颜色
                    l += '<td><input type="hidden"  class="color" name="size[' + s + ']['+i+'][color]" value="' + info.name + '" />'+
                            '<span class="goods_color">' + info.name + '</span>' ;
                    //尺码
                    l +='<td>'+
                        '<input type="hidden"  class="size_val" name="size[' + s + ']['+i+'][size]" value="' + size_val + '" />'+
                        '<input type="hidden"  class="code_segment" name="size[' + s + ']['+i+'][code_segment]" value="' + code_segment + '" />'+        
                        '<span class="goods_size">' + size_val + '</span>' +
                        '</td>';
                      //尺码备注
                        l +='<td>'+
                            '<input type="text"  class="size_note" name="size[' + s + ']['+i+'][size_note]" value="' + size_val + '" />'+
                            '</td>';
                    l +='<td><input class="text price sell_price" type="text" name="size[' + s + ']['+i+'][stocks_price]" data_type="price" nc_type="price" value="'+$("#batch_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
                            '<td><input class="text price goods_marketprice" type="text" name="size[' + s + ']['+i+'][stocks_marketprice]" data_type="marketprice" nc_type="|marketprice" value="'+$("#batch_market_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
        //                        '<td><input class="text price" type="text" name="discount" data_type="price" nc_type="discount" value=""/></td>' +
                        '<td><input class="text sku stocks_code" type="text" name="size[' + s + ']['+i+'][stocks_sku]" nctype="stocks_code" value="" /><span class="error checkCode" style="display:none;">此货号已有其他颜色占用。</span><span class="error dberr" style="display:none;">此货号已被同品牌的其他商品占用。</span></td>' +
                        '<td><input class="text bar_code" type="text" name="size[' + s + ']['+i+'][stocks_bar_code]" data_type="stocks_bar_code" nc_type="|stocks_bar_code" value="" /></td>' +
                        '</tr>';
                })
                if($("#"+color_flag).nextAll('div.choose_color_box_list').length<=1){
                    $('tbody[nc_type="spec_table"]').append(l);
                }else{
                    var num = ($("#"+color_flag).prevAll('.choose_color_box_list').find('.color-select:checked').length)*1;
                    var size_num = ($('li .size_val:checked').length)*1;
                    $('tbody[nc_type="spec_table"]').find('tr').eq((num*size_num)-1).after(l);
                }
            }else if(type==2){ //尺码改变
                size_val = info.size_value;
                code_segment = info.code_segment;
                i++;
                if(op==2){ //
                    if($('tbody[nc_type="spec_table"] tr.size_tr_'+size_val).length>0){
                        $('tbody[nc_type="spec_table"] tr.size_tr_'+size_val).remove();
                    }
                    return false;
                }
                if($('tbody[nc_type="spec_table"] tr.size_tr_'+size_val).length>0){
                    return false;
                }
                var color_arr = $(".choose_color_box_list .color-select:checked");
                var c_info = {};
                $.each(color_arr,function(){
                    var l = '';
                    color_flag = $(this).parent('div').attr('id');
                    s_arr = color_flag.split("_");
                    s = s_arr[2]*1;
                    c_info.name = $(this).next("input.picker-text").val();
                    l += '<tr class="'+color_flag+' size_tr_'+size_val+'">';
                    //颜色
                    l += '<td><input type="hidden"  class="color" name="size[' + s + ']['+i+'][color]" value="' + c_info.name + '" />'+
                            '<span class="goods_color">' + c_info.name + '</span>' ;
                    //尺码
                    l +='<td>'+
                        '<input type="hidden"  class="size_val" name="size[' + s + ']['+i+'][size]" value="' + size_val + '" />'+
                        '<input type="hidden"  class="code_segment" name="size[' + s + ']['+i+'][code_segment]" value="' + code_segment + '" />'+         
                        '<span class="goods_size">' + size_val + '</span>' +
                        '</td>';
                      //尺码备注
                        l +='<td>'+
                            '<input type="text"  class="size_note" name="size[' + s + ']['+i+'][size_note]" value="' + size_val + '" />'+
                            '</td>';
                    l +='<td><input class="text price sell_price" type="text" name="size[' + s + ']['+i+'][stocks_price]" data_type="price" nc_type="price" value="'+$("#batch_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
                        '<td><input class="text price goods_marketprice" type="text" name="size[' + s + ']['+i+'][stocks_marketprice]" data_type="marketprice" nc_type="|marketprice" value="'+$("#batch_market_price").val()+'" /><em class="add-on"><i class="fa fa-rmb"></i></em></td>' +
        //                        '<td><input class="text price" type="text" name="discount" data_type="price" nc_type="discount" value=""/></td>' +
                        '<td><input class="text sku stocks_code" type="text" name="size[' + s + ']['+i+'][stocks_sku]" nctype="stocks_code" value="" /><span class="error checkCode" style="display:none;">此货号已有其他颜色占用。</span><span class="error dberr" style="display:none;">此货号已被同品牌的其他商品占用。</span></td>' +
                        '<td><input class="text bar_code" type="text" name="size[' + s + ']['+i+'][stocks_bar_code]" data_type="stocks_bar_code" nc_type="|stocks_bar_code" value="" /></td>' +
                        '</tr>';
                    $('tbody[nc_type="spec_table"]').find("tr."+color_flag+":last").after(l);
                })
            }
            return false;
        }
        function f1(obj) {
            var html = become_color_select(); //得到颜色选项卡
            if($(obj).val()!=''){
                $(".choose_color_box_hide").empty().hide();
                $(obj).parent().find(".choose_color_box_hide").empty();
                return false;
            }
            $(".choose_color_box_hide").empty().hide();
            $(obj).parent().find(".choose_color_box_hide").empty().append(html);
            //移出消失
//            $(obj).parent().find(".choose_color_box_hide").hover(
//                function () {},
//                function () {
//                $(this).hide()
//                }
//            )
            $(obj).nextAll(".choose_color_box_hide").show();
            //颜色系的hover
            $(obj).nextAll(".choose_color_box_hide").find('.choose_color_group_list').delegate("li", "mouseover", function () {
                var i = $(this).index();
                son_id = JSON.parse($(this).data('son'));
                $(obj).nextAll(".choose_color_box_hide").find(".choose_color_list ul").siblings("ul").hide();
                $(obj).nextAll(".choose_color_box_hide").find(".choose_color_list ul#ul_" + son_id).show();
                //$(obj).nextAll(".choose_color_box_hide").find(".choose_color_list ul").eq(i).show().siblings("ul").hide();
            })
            //选中颜色
            $(".choose_color_list li.choose_color_list_info").click(function () {
                var li_id = $(this).parents('.choose_color_box_list').attr('id');
                //console.log(li_id);
                var c_name = $(this).text();
                var c_rgb = $(this).find("span").attr('data-rgb');
                var colorBox = $(obj).parents('div.choose_color_box_list').siblings('div.choose_color_box_list');
                isRemoveColor = false;
                colorBox.each(function(){
                	thisColor = $(this).find('input.color_value').val();
                	if(thisColor==c_rgb){
                		isRemoveColor = true;
                	}
                })
                if(isRemoveColor){
                	layer.msg('同样的颜色已选过');
                	return false;
                }
                $(obj).val(c_name);
                $(obj).next(".color_value").val(c_rgb);
                $("#" + li_id).find('input[nctype="input_checkbox"]').attr('checked', "checked");
                $("#" + li_id).find('.choose_color_box_hide').hide();
                if($(obj).parents('.choose_color_box_list').next('.choose_color_box_list').length<=0){  //增加一行颜色选择行（最后一行）
                    var color_div = '<div class="choose_color_box_list mb-10" id="creat_tr_' + d + '"> ' +
                        '<input type="checkbox" nctype="input_checkbox" class="color-select mr-5" name="color-select[]" onchange="color_check_click(this)"> ' +
                        '<input type="text" name="color['+d+'][color]" class="picker-text w300 mr-5"  onchange="change_color(this)" readonly value=""  onfocus="f1(this)" placeholder="选择主色" maxlength="30" data-old=""> ' +
                        '<input type="hidden" name="color['+d+'][color_value]" class="color_value"  value=""> ' +
                        '<input type="text" name="color['+d+'][color_remark]" class="picker-remark" placeholder="备注（如丁香紫,宝石蓝等）" value="" maxlength="30"> ' +
                        '<div class="pos-a choose_color_box_hide hide mt-10 c-333"></div></div>';
                    $(".choose_color_box").append(color_div);
                    d++;
                    var info = {
                        name:c_name,
                        li_id:li_id,
                    };
                    change_table(info,1);
                }else{  //修改
                    if($('tbody[nc_type="spec_table"]').find("tr."+li_id).length>0){
                        $('tbody[nc_type="spec_table"]').find("tr."+li_id).find('td span.goods_color').text(c_name);
                        $('tbody[nc_type="spec_table"]').find("tr."+li_id).find('td input.color').val(c_name);
                    }else{
                        var info = {
                            name:c_name,
                            li_id:li_id,
                        };
                        change_table(info,1);
                    }
                }
                colorCheckS();
            })
            $(obj).keydown(function (e) {
                $(obj).nextAll(".choose_color_box_hide").hide();
                if (e.keyCode == 8 && $(obj).val().length==1) {
                    $(".choose_color_box_hide").empty().hide();
                    $(obj).parent().find(".choose_color_box_hide").empty().append(html);
                    $(obj).nextAll(".choose_color_box_hide").show();
                    $(obj).nextAll(".choose_color_box_hide").find('.choose_color_group_list').delegate("li", "mouseover", function () {
                        f1(obj);
                    })
                }
            })
        }
        function change_color(obj) {
            var name = $(obj).val();
            var li_id = $(obj).parent().attr("id");
            if($('tbody[nc_type="spec_table"]').find("tr."+li_id).length>0){
                if(name!==''){
                    $('tbody[nc_type="spec_table"]').find("tr."+li_id).find('td span.goods_color').text(name);
                    $('tbody[nc_type="spec_table"]').find("tr."+li_id).find('td input.color').val(name);
                }else{
                    $('tbody[nc_type="spec_table"]').find("tr."+li_id).remove();
                    if($('tbody[nc_type="spec_table"]').find("tr").length<=0){
                         $('dl[nc_type="spec_dl"]').hide();
                    }
                }
            }else{
                if(name!==''){
                    var info = {
                        name:name,
                        li_id:li_id,
                    };
                    change_table(info,1);
                }
            }
        }
        //商品属性加载
        function ajax_input_attr_html(attr,goods_attr){
        	attr_str = '<table width="100%" id="attrTable"><tbody>';
       	 $.each(attr,function(sk,sv){
       		 attr_str +='<tr>';
       		 if(sv.sp_is_select==1){
       			 attr_str += '<td width="10%;" class="spec_title">'+sv.sp_name+'</td><td  width="200px;" class="spec_value">';
       			 if(sv.sp_input_type==1){
       				 attr_str +='<input type="text" name="attr_value_list['+sv.sp_id+'][]" value="">';
       			 }else if(sv.sp_input_type==2){
       				 sp_list = '';
       				 if(sv.sp_select_lists){
       					 $.each(sv.sp_select_lists,function(kk,vv){
       						 sp_list +='<option value="'+kk+'">'+vv+'</option>';
           				 }) 
       				 }
       				 
       				 attr_str +='<select class="attr_num_17" name="attr_value_list_s['+sv.sp_id+'][]">'+
           			 '<option value="">请选择...</option>'+sp_list+'</select>';
       			 }else{
       				 attr_str +='<textarea type="text" name="attr_value_list['+sv.sp_id+'][]"></textarea>';
       			 }
       			 attr_str +='</td>';
       		 }else if(sv.sp_is_select==2){
       			 attr_str += '<td width="10%;" class="spec_title add_spec"><a href="javascript:;" onclick="addSpec(this)">[+]</a>'+sv.sp_name+'</td><td  width="200px;" class="spec_value">';
       			 if(sv.sp_input_type==1){
       				 attr_str +='<input type="text" name="attr_value_list['+sv.sp_id+'][]" value="">';
       			 }else if(sv.sp_input_type==2){
       				 sp_list = '';
       				 if(sv.sp_select_lists){
       					 $.each(sv.sp_select_lists,function(kk,vv){
       						 sp_list +='<option value="'+kk+'">'+vv+'</option>';
           				 }) 
       				 }
       				 
       				 attr_str +='<select class="attr_num_17" name="attr_value_list_s['+sv.sp_id+'][]">'+
           			 '<option value="">请选择...</option>'+sp_list+'</select>';
       			 }else{
       				 attr_str +='<textarea type="text" name="attr_value_list['+sv.sp_id+'][]"></textarea>';
       			 }
       			 attr_str +='&nbsp;&nbsp;&nbsp;属性价格&nbsp;&nbsp;&nbsp;<input type="text" name="attr_price_list['+sv.sp_id+'][]" value=""></td>';
       		 }else{
       			 attr_str += '<td width="10%;" class="spec_title add_spec"><a href="javascript:;" onclick="addSpec(this)">[+]</a>'+sv.sp_name+'</td><td  width="200px;" class="spec_value">';
       			 if(sv.sp_input_type==1){
       				 attr_str +='<input type="text" name="attr_value_list['+sv.sp_id+'][]" value="">';
       			 }else if(sv.sp_input_type==2){
       				 sp_list = '';
       				 if(sv.sp_select_lists){
       					 $.each(sv.sp_select_lists,function(kk,vv){
       						 sp_list +='<option value="'+kk+'">'+vv+'</option>';
           				 }) 
       				 }
       				 
       				 attr_str +='<select class="attr_num_17" name="attr_value_list_s['+sv.sp_id+'][]">'+
           			 '<option value="">请选择...</option>'+sp_list+'</select>';
       			 }else{
       				 attr_str +='<textarea type="text" name="attr_value_list['+sv.sp_id+'][]"></textarea>';
       			 } 
       			 attr_str +='&nbsp;&nbsp;&nbsp;属性价格&nbsp;&nbsp;&nbsp;<input type="text" name="attr_price_list['+sv.sp_id+'][]" value=""></td>';
       		 }
       		 attr_str +='</tr>';
       	 })
       	 attr_str +='</tbody></table>';
       	 $("dd.attr_dd").html(attr_str);
        }
        //分类改变时，得到品牌信息、规格信息、属性信息、自定义属性等选项信息
        function get_info_by_class(obj){
//            console.log();
            var class_id = $(obj).val();
            var class_name = $(obj).find("option:selected").text();
            if(class_id==''){
                class_name = '';
            }else{
                if(class_name.indexOf('|--')>=0){
                    class_name = class_name.substring(class_name.indexOf('|--')+3,class_name.length);
                }
            }
            $("#gc_name").val(class_name);
             $.getJSON('ajax_get_info_by_class?class_id='+class_id, function (data) {
                 if(data.state){
                     //$("ul[nctype='brand_list']").empty();
                     $(".brand-index").attr('data-tid',data.type_id);
                     $("input[name='type_id']").val(data.type_id);
                     //尺码
                     //$("dd.size_dd").html('');
                     if(data.sizes){
                         var size_type = Array('','中国码','美国码','英国码','日本码');
                         var sizes_list = '';
                         var sizes_html = '<div>';
                         var num = 0;
                         var style = 'display: block;background-color: #F6F7Fb;';
                         var checked = 'checked="checked"';
                         sizes_html += '<div class="col-conten">';
                         $.each(data.sizes,function(k,v){
                             if(num>0){
                                 checked = '';
                                 style = 'display: none;';
                             }
                             
                             /* sizes_html +='<label class="mr-10 ml-5">'+
                                     '<input type="radio" name="size_type" class="size_type" value="'+k+'" '+checked+' >'+
                                     size_type[k]+'</label>'; */
                            if(v.size_list !== undefined){
                                sizes_list +='<div style="'+style+'" class="size_list size_list_'+k+'"><ul>';
                                 $.each(v.size_list,function(kk,vv){
                                     sizes_list += '<li  style="" class="f-l mr-10 ml-5" data-order="0" data-text="'+vv.size+'" data-value="'+vv.size+'" class="remark">'+
                                             '<label>'+
                                             '<input type="checkbox" class="size_val" data-code="'+k+'" data-text="'+vv.size+'" name="" value="'+vv.size+'">'+
                                             vv.size+'</label></li>';
                                 })
                                 sizes_list +='</ul><div class="clear"></div></div>';
                             }
                            num ++;
                         })
                         sizes_html += '</div>';
                         sizes_html += sizes_list;
                         sizes_html += '</div>';
                         $("dl.size_dl").attr("style",'');
                         $("dd.size_dd").html(sizes_html);
                     }
                     if(data.attr_arr){
                    	 ajax_input_attr_html(data.attr_arr);
                     }
                    //品牌
                     if(data.brands){
                         var brands_list = '';
                         $.each(data.brands,function(k,v){
                             brands_list +='<li data-id="'+v.brand_id+'" data-name="'+v.brand_name+'">'+
                                '<em>';
                                if(v.brand_initial){
                                     brands_list += v.brand_initial;
                                }else{
                                    brands_list += '--';
                                }
                               brands_list +='</em>'+v.brand_name+'</li>'; 
                         })
                         $('.no-result').attr('style','display:none').html('没有符合<strong></strong>条件的品牌');
                         $("ul[nctype='brand_list']").html(brands_list);
                     }else{
                         $('.no-result').html('没有符合<strong></strong>条件的品牌');
                         if($('.no-result').attr('style')=='display:none'){
                             $('.no-result').attr('style','');
                         }
                     }
                     //属性
                     /* if(data.attr_arr){
                         var attr_list = '';
                         if($(".ncsc-form-goods").find('dl.attr_dl').length<=0){
                             attr_list += '<dl class="attr_dl">'+
                                '<dt>商品属性：</dt>'+
                                '<dd class="attr_dd">';
                         }
                         $.each(data.attr_arr,function(k,v){
                            attr_list += '<span class="property">'+
                                '<label class="mr5">'+v.attr_name+'</label>'+
                                '<input type="hidden" name="attr['+v.attr_id+'][gc_id]" value="'+class_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][type_id]" value="'+data.ype_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][attr_id]" value="'+v.attr_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][user_attr_value]" value="">'+
                                '<select name="attr['+v.attr_id+'][attr_value_id]" attr="attr['+v.attr_id+'][__NC__]" nc_type="attr_select">'+
                                    '<option value="" nc_type="0">不限</option>';
                                    if(v.values){
                                        $.each(v.values,function(kk,vv){
                                            attr_list += '<option value="'+vv.attr_value_id+'" nc_type="'+vv.attr_value_id+'">'+vv.attr_value_name+'</option>';
                                        })
                                    }
                                attr_list +='</select>';
                            attr_list +='</span>';
                         })
                        if($(".ncsc-form-goods").find('dl.attr_dl').length<=0){
                            attr_list += '</dd>'+
                            '</dl>';
                            $("#demo2").after(attr_list);
                         }else{
                             $("dd.attr_dd").html(attr_list);
                         }
                     }else{
                         if($(".ncsc-form-goods").find('dl.attr_dl').length>0){
                             $("dl.attr_dl").remove();
                         }
                     } */
                     //自定义属性
                     if(data.attr_custom){
                         var custom_list = '';
                         if($(".ncsc-form-goods").find('dl.custom_dl').length<=0){
                             custom_list += '<dl class="custom_dl">'+
                                '<dt>自定义属性：</dt>'+
                                '<dd class="custom_dd">';
                         }
                         $.each(data.attr_custom,function(k,v){
                            custom_list += '<span class="property">'+
                                '<label class="mr5">'+v.attr_name+'</label>'+
                                '<input type="hidden" name="attr['+v.attr_id+'][gc_id]" value="'+class_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][type_id]" value="'+data.ype_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][attr_id]" value="'+v.attr_id+'">'+
                                '<input type="hidden" name="attr['+v.attr_id+'][attr_value_id]" value="">'+
                                '<input class="text w60" type="text" name="attr['+v.attr_id+'][user_attr_value]" value="">'+
                                '</span>'+
                                '</span>';
                         })
                        if($(".ncsc-form-goods").find('dl.custom_dl').length<=0){
                            custom_list += '</dd>'+
                            '</dl>';
                    
                            $("dl.desc_dl").before(custom_list);
                         }else{
                             $("dd.custom_dd").html(custom_list);
                         }
                     }else{
                         if($(".ncsc-form-goods").find('dl.custom_dl').length>0){
                             $("dl.custom_dl").remove();
                         }
                     }
                 }
            });
            
        }
        function addSpec(obj){
        	var add_tr = $(obj).parents('tr').html();
        	$(obj).parents('tr').after('<tr>'+add_tr+'</tr>');
        	$(obj).parents('tr').next('tr').find('a').text('[-]');
        	$(obj).parents('tr').next('tr').find('a').attr('onclick','delSpec(this)');
        }
        function delSpec(obj){
        	$(obj).parents('tr').remove();
        }
   <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
                                                
       function batch_set(){  //批量设置信息
            if($("#batch_price").val()!=''){ //销售价
                $('tbody[nc_type="spec_table"]').find('input.sell_price').val($("#batch_price").val());
            }
            if($("#batch_market_price").val()!=''){//市场价
                $('tbody[nc_type="spec_table"]').find('input.goods_marketprice').val($("#batch_market_price").val());
            }
            /* if($("#batch_stocks_code").val()!=''){//商家货号
                $('tbody[nc_type="spec_table"]').find('input.stocks_code').val($("#batch_stocks_code").val());
            }
            if($("#batch_bar_code").val()!=''){//条形码
                $('tbody[nc_type="spec_table"]').find('input.bar_code').val($("#batch_bar_code").val());
            } */
        }
        $(function(){
            $(".size_dd").on('click','.size_val',function(){
                var size_val = $(this).val()
                var code_segment = $(this).data('code');
                var info = {
                    size_value:size_val,
                    code_segment:code_segment,
                };
                if($(this).is(':checked')){
                    change_table(info,2);
                }else{
                    change_table(info,2,2);
                }
            })
            $(".size_dd").on('click','.size_type',function(){
                return false;
            })
            $(".size_dd").on('mouseup','.size_type',function(){
                var id = $(this).val();
                var radioChecked = $(this).prop("checked");
                var obj = $(this);
                if($('tbody[nc_type="spec_table"] tr').length<=0){
                     $(this).prop('checked', !radioChecked);
                    $(".size_dd div.size_list_"+id).attr("style","display: block;background-color: #F6F7Fb;").siblings('div.size_list').attr("style","display: none;background-color: #F6F7Fb;");
                    return false;        
                }else{
                    layer.confirm('切换码制，会导致已勾选的尺码信息丢失', {
                     btn: ['不切换','知道了，仍然切换'] //按钮
                     }, function(){
                           layer.closeAll();
                           return false;
                     }, function(){
                        $(obj).prop('checked', !radioChecked);
                        $(".size_dd div.size_list_"+id).attr("style","display: block;background-color: #F6F7Fb;").siblings('div.size_list').attr("style","display: none;background-color: #F6F7Fb;");
                        $('dl[nc_type="spec_dl"]').hide();
                        $('tbody[nc_type="spec_table"]').empty();
                        $(".size_list :checkbox").removeAttr("checked");
                     });
                }
            });
        })
        
        function become_color_select(){  //组装颜色选项卡
            //组装颜色选项卡开始
            var color_arr = <?php echo $_smarty_tpl->tpl_vars['colors']->value;?>
;
            var html = '<div class="choose_color_box_icon"><i class="icon"></i> ' +
                    '</div> <div class="choose_color_group_list f-l"> ' +
                    '<ul class="">';
            $.each(color_arr, function (k, v) {
                var cl_value = '';
                if (v.cl_value.indexOf('#') > -1) {
                    cl_value = v.cl_value;
                } else {
                    cl_value = 'url(<?php echo TEMPLE;?>
images/' + v.cl_value + ')';
                }
                html += "<li class='choose_color_group_list_name' data-son='" + v.cl_id + "'>" +
                        '<span class="rgb-box" style="background:' + cl_value + '"></span>' + v.cl_name + '</li> ';
            })
            html += '</ul> </div> ' +
                    '<div class="choose_color_list pd-10"> <div class="">常用标准颜色：</div>';
            $.each(color_arr, function (k, v) {
                html += ' <ul class="hide " id="ul_' + v.cl_id + '">';
                $.each(v.son_color, function (kk, vv) {
                    var cl_value = '';
                    if (vv.cl_value.indexOf('#') > -1) {
                        cl_value = vv.cl_value;
                    } else {
                        cl_value = 'url(<?php echo TEMPLE;?>
images/' + vv.cl_value + ')';
                    }
                    html += ' <li class="choose_color_list_info" >' +
                            '<span class="rgb-box" data-rgb="' + vv.cl_value + '" style="background:' + cl_value + '"></span>' + vv.cl_name + '</li> ';
                });
                html += '</ul>';
            });

            html += '</div>';
            return html;
             //组装颜色选项卡结束
        }
        function color_check_click(obj){
            var li_id = $(obj).parent().attr("id");
            if ($('.choose_color_box_list').length > 1) {
                if (!$(obj).attr("checked")) { //取消一行
                    console.log(li_id);
                    $(obj).parents(".choose_color_box_list").remove();
                    var info = {
                         li_id:li_id,
                     };
                    change_table(info,1,2);
                    return false;
                }
            }
            if ($(obj).attr("checked")){
                if($(obj).parent("div.choose_color_box_list").next('div.choose_color_box_list').length<=0){
                    var color_div = '<div class="choose_color_box_list mb-10" id="creat_tr_' + d + '"> ' +
                        '<input type="checkbox" nctype="input_checkbox" class="color-select mr-5" name="color-select[]" onchange="color_check_click(this)"> ' +
                        '<input type="text" name="color[]" class="picker-text w300 mr-5" onchange="change_color(this)" value="" readonly onfocus="f1(this)" placeholder="选择主色" maxlength="30" data-old=""> ' +
                        '<input type="hidden" name="color_value[]" class="color_value"  value=""> ' +
                        '<input type="text" name="color_remark[]" class="picker-remark" placeholder="备注（如丁香紫,宝石蓝等）" value="" maxlength="30"> ' +
                        '<div class="pos-a choose_color_box_hide hide mt-10 c-333"></div></div>';
                    $(".choose_color_box").append(color_div);
                    d++;
                }
                var name = $("#"+li_id).find(".picker-text").val();
                if(name==''|| name==undefined){
                    return false;
                }
                var info = {
                    name:name,
                    li_id:li_id,
                };
                change_table(info,2);
            }
        }
        /*颜色不能重复选*/
        function colorCheckS(){
        	$('.choose_color_box').find('.choose_color_box_list').each(function(k,v){
        		colorVal = $(this).find('input.picker-text').val();
        		
        		$(this).siblings().each(function(ka,va){
        			colorValNow = $(this).find('input.picker-text').val();
        			if(colorVal===colorValNow){
        				$(this).remove();
        			}
            	})
        	})
        }
        $(".ncsc-form-goods").delegate("input.picker-remark","change",function(){
       	 //console.log(typeof($(this).val()));
       	   if($(this).val().replace(/(^\s+)|(\s+$)/g,"").length >0){
       		   div_id = $(this).parent().attr('id');
   			   $('.spec_table').find('tr.'+div_id).find('.goods_color').text($(this).val());
       	   }else{
       		   div_id = $(this).parent().attr('id');
   			   $('.spec_table').find('tr.'+div_id).find('.goods_color').text($(this).siblings('input.picker-text').val());
       	   }
			   
			   //console.log(div_id)
			});

        
        
    <?php echo '</script'; ?>
>
    <div id="goTop"> <a hres="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
