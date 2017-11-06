<?php
/* Smarty version 3.1.29, created on 2017-09-20 16:33:32
  from "D:\www\yunjuke\application\admin\views\goods_management_all.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c227dccd2340_16384574',
  'file_dependency' => 
  array (
    '4628c2fb84fde82c4a64424289847ae3f6561c85' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\goods_management_all.html',
      1 => 1503556794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59c227dccd2340_16384574 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '222559c227dc7fbda6_07329393';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    .flexigrid .bDiv td div, .colCopy div{height:auto}
    .flexigrid .hDiv th, .flexigrid .bDiv td{vertical-align: middle !important;}
    .new_goods{color:white;background-color: red;}
    .ban:hover{
    	border-color: #5a98de!important;
    	color: #5a98de!important;
    }
    .select-res span,.select-res2 span {
	display: inline-block;
	width:180px;
	height:14px;
	line-height:14px;
	padding:7px 15px 7px 5px;
	border:solid 1px #c0c0c0;
	background:url(images/select_box_bg.gif) no-repeat 190px center;
	cursor: pointer;
	color:#c2c2c2;
	text-overflow:ellipsis;
	white-space:nowrap;
	overflow:hidden;
}
.select-res p ,.select-res2 p {
	position:relative;
	width: 200px;
	height:28px;
	line-height:28px;
	border-bottom:dashed 1px #c0c0c0;
	padding:0 5px;
	text-overflow:ellipsis;
	white-space:nowrap;
	overflow:hidden;
	padding-right:20px;
}
.select-res a,.select-res2 a {
	position:absolute;
	top:0;
	right:0;
	display: block;
	width:28px;
	height:28px;
	background:url(images/close_btn.jpg) no-repeat center;
	cursor:pointer;
}
.select-res input,.select-res2 input {
	width:172px;
	height:14px;
	line-height:14px;
	margin-left:4px;
	padding:7px 5px;
	border:solid 1px #c0c0c0;
	color:#2c2c2c;
}
.select-res span.selected,.select-res2 span.selected {
	color:#626262;
}
.select-box,.select-box2 {
	border: 1px solid #ccc;
	width:550px;
	height:220px;
	position:absolute;
	display:none;
	z-index:5;
	background: #fff;
	border-radius: 4px;
	padding: 0px 4px;
}
.select-box .close-btn,.select-box2 .close-btn {
	position:absolute;
	right:5px;
	top:5px;
	cursor: pointer;
}
.select-box .wrap,.select-box2 .wrap2 {
	height:200px;
	border:solid 1px #ddd;
	margin-top:5px;
}
.select-box>.wrap>div,.select-box2>.wrap2>div {
	float:left;
	width:178px;
	height:200px;
	overflow-y: scroll;
}
.select-box ul li,.select-box2 ul li {
	height:25px;
	line-height:25px;
	padding:0 10px;
	background: url(images/arr.gif) no-repeat 152px center;
	color:#626262;
	cursor: pointer;
}
.select-box ul li.selected,.select-box2 ul li.selected {
	background:url(images/arr_selected.gif) no-repeat 152px center #fd8340;
	color:#fff;
}
.cl-red{
	color:red;
	font-size:20px;
}
#classit,#classit2{
	position: relative;
}
#classit.active,#classit2.active{
	margin: 5px;
}
.wrap input,.wrap2 input{
	width: 148px;
    border-radius: 0;
    margin: 0 1px 1px 1px;
    position: absolute;
}
.wrap ul,.wrap2 ul{
	margin-top: 30px;
}
</style>

	<div id="classit2" style="display: none;margin:5px">
        	<div class="select-res2">
			<div style="display: inline-block;">商品分类：</div><input type="text" id="show_1" name="gcs_ids" class=" mr-5 pd-5 mb-10" value="-全部分类-"/>
				<input type="hidden" id="show_2" name="gc_id" class=" mr-5 pd-5 mb-10" value=""/>
            </div>
			<div class="select-box2">
				<div class="wrap2">
					<div class="search-val-inner-first2">
						<input type="text" class="search-value-first2" placeholder="搜索">
						<ul class="first2"></ul>
					</div>
					<div class="search-val-inner-second2">
						<input type="text" class="search-value-second2" placeholder="搜索">
						<ul class="second2"></ul>
					</div>
					<div class="search-val-inner-third2">
						<input type="text" class="search-value-third2" placeholder="搜索">
						<ul class="third2"></ul>
					</div>
				</div>
			</div>
	</div>

<!--<link rel="stylesheet" type="text/css" href="<?php echo TEMPLE;?>
css/base.yuxi.css"/>-->
<body style="background-color: #FFF; overflow: auto;">
    <div class="page" style="min-height:600px;">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>商品管理</h3>
                    <h5>商城所有商品索引及管理</h5>
                </div>
                <ul class="tab-base nc-row">
                    <?php if (isset($_smarty_tpl->tpl_vars['source']->value) && $_smarty_tpl->tpl_vars['source']->value == 'all') {?>
                        <li><a class="current" href="goods_management?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
"><span>全库商品</span></a></li>
                        <li><a href="goods_management?op=shop_goods&source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
"><span>门店自建</span></a></li>
                        <li><a href="goods_management?op=trash&source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
"><span>回收站</span></a></li>
                    <?php } else { ?>
                        <li><a href="goods_management?op=shop_goods&source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
"><span>门店自建</span></a></li>
                        <li><a class="current" href="goods_management?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
"><span>全库商品</span></a></li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <!-- 操作说明 -->
        <div class="explanation" id="explanation">
            <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span id="explanationZoom" title="收起提示"></span> </div>
            <ul>
            	<li>商品库存为 0 时，前台不显示该商品</li>
            	<li>商品设置的标签将在前台展示，一个商品只能设置一个标签</li>
                <li>上架，当商品处于非上架状态时，前台将不能浏览该商品，店主可控制商品上架状态</li>
                <li>违规下架，当商品处于违规下架状态时，前台将不能购买该商品，只有管理员可控制商品违规下架状态，并且商品只有重新编辑后才能上架</li>
                <li>设置项中可以查看商品详细、查看商品SKU。查看商品详细，跳转到商品详细页。查看商品SKU，显示商品的SKU、图片、价格、库存信息。</li>
                <li>支持Excel数据文件格式：xlsx <a target="_blank" href="<?php echo base_url();?>
/data/excel_tp/images/goods_import.png">查看导入格式示例</a>或<a href="javascript:window.location.href = 'goods_tp'">下载格式文件</a>。</li>
            </ul>
        </div>
        <div class="mt-10 mb-10">
            <form method="POST" name="formSearch" id="formSearch">
                <div class="search mt-20 mb-10">
                    <?php if (isset($_smarty_tpl->tpl_vars['source']->value) && $_smarty_tpl->tpl_vars['source']->value != 'all') {?>
                        <select name="store" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10 select2" >
                            <?php
$_from = $_smarty_tpl->tpl_vars['stores']->value;
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
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['store_id'];?>
-<?php echo $_smarty_tpl->tpl_vars['v']->value['store_name'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['v']->value['store_name'];?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
                        </select>
                    <?php }?>
                   <div id="classit" style="display: inline-block;">
                   <div class="select-res">
						<input type="text" id="show" name="gcs_ids" class=" mr-5 pd-5 mb-10" value="-全部分类-"/>
						<input type="hidden" id="show2" name="gc_id" class=" mr-5 pd-5 mb-10" value=""/>
                   </div>
					<div class="select-box">
						<div class="wrap">
							<div class="search-val-inner-first">
						        <input type="text" class="search-value-first" placeholder="搜索">
						        <ul class="first"></ul>
						    </div>
						    <div class="search-val-inner-second">
						        <input type="text" class="search-value-second" placeholder="搜索">
						        <ul class="second"></ul>
						    </div>
						    <div class="search-val-inner-third">
						        <input type="text" class="search-value-third" placeholder="搜索">
						        <ul class="third"></ul>
						    </div>
						</div>
					</div>
	
					</div>
                   <select name="year_to_market" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10">
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
                   <select name="season_to_market" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10">
                        <option value="" selected>-上市季节-</option>
                        <option value="1">春季</option>
                        <option value="2">夏季</option>
                        <option value="3">秋季</option>
                        <option value="4">冬季</option>
                   </select>
                    <select name="sex" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10">
                        <option value="" selected>-商品性别-</option>
                        <option value="2">男</option>
                        <option value="1">女</option>
                        <option value="3">通用</option>
                   </select>
                    <select name="available_coupons" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10">
                        <option value="" selected>-是否可用优惠券-</option>
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
$__foreach_v_1_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_1_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['brand_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['brand_name'];?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
?>
                        <?php }?>
                   </select>
                   <select name="goods_tag" placeholder="请选择" class=" mr-5 m_w_120 pd-5 mb-10">
                        <option value="" selected>-全部标签-</option>
                        <option value="1">新品</option>
                        <option value="2">推荐</option>
                        <option value="3">特价</option>
                   </select>
                    <select name="goods_image" class="selecte  pd-5 mb-10 " style="min-width: 80px">
                        <option value="" selected>-是否有图-</option>
                        <option value="1">有图</option>
                        <option value="2">无图</option>
                    </select>
                   <br/>
                   名称：
                   <input type="text" name="goods_name" class="input-text input_text mb-10">
                   款号：
                   <input type="text" name="goods_spu" class="input-text input_text mb-10">
                    货号：
                    <input type="text" name="stocks_sku" class="input-text input_text mb-10">
                   条形码：
                   <input type="text" name="stocks_bar_code" class="input-text input_text mb-10">
                   <input type="submit" class="btn btn-warning radius ml-10 mb-10" id="submit" name="submit" onclick="return false;" value="搜索">
                 </div>
             </form>
       </div>
    <div id="flexigrid"></div>
    </div>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jQuery.Hz2Py-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
    var demo =<?php if (isset($_smarty_tpl->tpl_vars['class_arr']->value)) {
echo $_smarty_tpl->tpl_vars['class_arr']->value;
}?>;
        var demo2 =<?php if (isset($_smarty_tpl->tpl_vars['class_arr']->value)) {
echo $_smarty_tpl->tpl_vars['class_arr']->value;
}?>;
    $('#show', $('.select-res')).on('click', function() {
    	$('.select-box').show();
    	if (canClick) {
    		$('ul', $('.select-box')).html('');
    		fillData();
    		canClick = !1;
    	}
    	return false;
    });
    
var flag =     "<?php if (isset($_smarty_tpl->tpl_vars['source']->value)) {
echo $_smarty_tpl->tpl_vars['source']->value;
}?>";
var dataJson = {
	"option": demo
}
var l1 = 0,
	l2 = 0;
var cname1, cname2, cname3;
var cid1, cid2, cid3;
var canClick = !0;
var canClose = !1;

$('.select-box').click(function(){
	return false;
})
$('span', $('.select-box')).on("click", function() {
	canClose ? $('.select-box').hide() : alert('请选择下级品类！');
	canClick = !0;
});

$('.select-res').on('click', 'a', function() {
	$(this).parent().remove();
	$('.select-box').css({
		top: $('.select-res').offset().top + $('.select-res').outerHeight(true)
	});
})

$('ul.first', $('.select-box')).on('click', 'li', function() {
	$(this).addClass('selected').siblings().removeClass('selected');
	$('ul.second').html('');
	$('ul.third').html('');
	fillData($(this).attr('data-num'));
	l1 = $(this).attr('data-num');
	cname1 = $(this).text();
	if(cname1.indexOf('*')>0){
		cname1 = cname1.split('*')[0];
	}
	cid1 = $(this).attr('val');
	canClose = !1;
});
//双击如果有*的话就选中
$('ul.first', $('.select-box')).on('dblclick', 'li', function() {
	if(flag!='all'){
		$('#show').val(cname1);
		$('#show2').val(cid1);
		//$('.select-box').hide();
		$('.select-box').css("display","none");
	}else{
		var patt = /\* */g;
		if(patt.test($(this).html())){
			$('#show').val(cname1);
			$('#show2').val(cid1);
			//$('.select-box').hide();
			$('.select-box').css("display","none");
		}
	}
}); 
$('ul.second', $('.select-box')).on('click', 'li', function() {
	$(this).addClass('selected').siblings().removeClass('selected');
	$('ul.third').html('');
	fillData(l1, $(this).index());
	l2 = $(this).index();
	cname2 = $(this).text();
	if(cname2.indexOf('*')>0){
		cname2 = cname2.split('*')[0];
	}
	cid2 = $(this).attr('val');
	canClose = !1;
});
//双击如果有*的话就选中
$('ul.second', $('.select-box')).on('dblclick', 'li', function() {
	if(flag!='all'){
		$('#show').val(cname1 + '>' + cname2);
		$('#show2').val(cid2);
		//$('.select-box').hide();
		$('.select-box').css("display","none");
	}else{
		var patt = /\* */g;
		if(patt.test($(this).html())){
			$('#show').val(cname1 + '>' + cname2);
			$('#show2').val(cid2);
			//$('.select-box').hide();
			$('.select-box').css("display","none");
		}
	}
	
});
$('ul.third', $('.select-box')).on('click', 'li', function() {
	$(this).addClass('selected').siblings().removeClass('selected');
	cname3 = $(this).text();
	cid3 = $(this).attr('val');
	canClose = !0;
	var hasExist = !1;
	$('.select-res').find("p").each(function() {
		if ($(this).text().split(' > ')[2] == cname3) hasExist = !0;
	})
	$('#show').val(cname1 + '>' + cname2 + '>' + cname3);
	$('#show2').val(cid3);
	//$('.select-box').hide();
	$('.select-box').css("display","none");
});
$('body').click(function(){
	$(".select-box").hide();
})

//填充级联数据

function fillData(l1, l2) {
	
	var temp_html = "";
	if (typeof(dataJson.option) != 'undefined' && arguments.length == 0 ) {
		var n=0;
		$.each(dataJson.option, function(i, pro) {
		    temp_html += '<li val="' + pro.id + '" son="'+pro.son+'" data-name="'+pro.name+'" class="search-li" data-num="'+(n++)+'">' + pro.name + '</li>';
		});
	}else if (typeof(dataJson.option[l1].child) == 'undefined') {
		return false;
	}else if (typeof(dataJson.option[l1].child) != 'undefined' && arguments.length == 1) {
		var n=0;
		$.each(dataJson.option[l1].child, function(i, pro) {
			temp_html += '<li val="' + pro.id + '" son="'+pro.son+'" data-name="'+pro.name+'" class="search-li" data-num="'+(n++)+'">' + pro.name + '</li>';
		});
	} else if (typeof(dataJson.option[l1].child[l2].child) != 'undefined' && arguments.length == 2) {
		var n=0;
		$.each(dataJson.option[l1].child[l2].child, function(i, pro) {
			temp_html += '<li val="' + pro.id + '" son="'+pro.son+'" data-name="'+pro.name+'" class="search-li" data-num="'+(n++)+'">' + pro.name + '</li>';
		});
	}
	$('.select-box ul:eq(' + arguments.length + ')').html(temp_html);
	
	new SEARCH_ENGINE("search-val-inner-first","search-value-first","first","search-li");
	new SEARCH_ENGINE("search-val-inner-second","search-value-second","second","search-li");
	new SEARCH_ENGINE("search-val-inner-third","search-value-third","third","search-li");
}

//弹出框商品分类
var dataJson2 = {
	"option": demo2
}
var l_1 = 0,
	l_2 = 0;
var cname_1, cname_2, cname_3;
var cid_1, cid_2, cid_3;
var canClick2 = !0;
var canClose2 = !1;
$('#show_1', $('.select-res2')).on('click', function() {
	$('.select-box2').show();
	if (canClick2) {
		$('ul', $('.select-box2')).html('');
		fillData2();
	}
});


$('.select-res2').on('click', 'a', function() {
	$(this).parent().remove();
})

$('ul.first2', $('.select-box2')).on('click', 'li', function() {
	$(this).addClass('selected').siblings().removeClass('selected');
	$('ul.second2').html('');
	$('ul.third2').html('');
	fillData2($(this).attr('data-num'));
	l_1 = $(this).attr('data-num');
	cname_1 = $(this).text();
	if(cname_1.indexOf('*')>0){
		cname_1 = cname_1.split('*')[0];
	}
	cid_1 = $(this).attr('val');
	if($(this).attr('son')==2){
		$('#show_1').val(cname_1);
		$('#show_2').val(cid_1);
	}
});

$('ul.second2', $('.select-box2')).on('click', 'li', function() {
	$(this).addClass('selected').siblings().removeClass('selected');
	$('ul.third2').html('');
	fillData2(l_1, $(this).attr('data-num'));
	l_2 = $(this).attr('data-num');
	cname_2 = $(this).text();
	if(cname_2.indexOf('*')>0){
		cname_2 = cname2.split('*')[0];
	}
	cid_2 = $(this).attr('val');
	if($(this).attr('son')==2){
		$('#show_1').val(cname_1+'>'+cname_2);
		$('#show_2').val(cid_2);
	}
});
$('ul.third2', $('.select-box2')).on('click', 'li', function() {
	$(this).addClass('selected').siblings().removeClass('selected');
	cname_3 = $(this).text();
	cid_3 = $(this).attr('val');
	var hasExist = !1;
	$('.select-res2').find("p").each(function() {
		if ($(this).text().split(' > ')[2] == cname_3) hasExist = !0;
	})
	$('#show_1').val(cname_1 + '>' + cname_2 + '>' + cname_3);
	$('#show_2').val(cid_3);
});
function fillData2(l_1, l_2) {
	var temp_html = "";
	if (typeof(dataJson2.option) != 'undefined' && arguments.length == 0 ) {
		var n=0;
		$.each(dataJson2.option, function(i, pro) {
		    temp_html += '<li val="' + pro.id + '" son="'+pro.son+'" data-name="'+pro.name+'" class="search-li" data-num="'+(n++)+'">' + pro.name + '</li>';
		});
	}else if (typeof(dataJson.option[l_1].child) == 'undefined') {
		return false;
	}else if (typeof(dataJson.option[l_1].child) != 'undefined' && arguments.length == 1) {
		var n=0;
		$.each(dataJson2.option[l_1].child, function(i, pro) {
			temp_html += '<li val="' + pro.id + '" son="'+pro.son+'" data-name="'+pro.name+'" class="search-li" data-num="'+(n++)+'">' + pro.name + '</li>';
		});
	} else if (typeof(dataJson.option[l_1].child[l_2].child) != 'undefined' && arguments.length == 2) {
		var n=0;
		$.each(dataJson2.option[l_1].child[l_2].child, function(i, pro) {
			temp_html += '<li val="' + pro.id + '" son="'+pro.son+'" data-name="'+pro.name+'" class="search-li" data-num="'+(n++)+'">' + pro.name + '</li>';
		});
	}
	$('.select-box2 ul:eq(' + arguments.length + ')').html(temp_html);
	
	new SEARCH_ENGINE("search-val-inner-first2","search-value-first2","first2","search-li");
	new SEARCH_ENGINE("search-val-inner-second2","search-value-second2","second2","search-li");
	new SEARCH_ENGINE("search-val-inner-third2","search-value-third2","third2","search-li");
}

function fillData(l1, l2) {
	
	var temp_html = "";
	if (typeof(dataJson.option) != 'undefined' && arguments.length == 0 ) {
		var n=0;
		$.each(dataJson.option, function(i, pro) {
		    temp_html += '<li val="' + pro.id + '" son="'+pro.son+'" data-name="'+pro.name+'" class="search-li" data-num="'+(n++)+'">' + pro.name + '</li>';
		});
	}else if (typeof(dataJson.option[l1].child) == 'undefined') {
		return false;
	}else if (typeof(dataJson.option[l1].child) != 'undefined' && arguments.length == 1) {
		var n=0;
		$.each(dataJson.option[l1].child, function(i, pro) {
			temp_html += '<li val="' + pro.id + '" son="'+pro.son+'" data-name="'+pro.name+'" class="search-li" data-num="'+(n++)+'">' + pro.name + '</li>';
		});
	} else if (typeof(dataJson.option[l1].child[l2].child) != 'undefined' && arguments.length == 2) {
		var n=0;
		$.each(dataJson.option[l1].child[l2].child, function(i, pro) {
			temp_html += '<li val="' + pro.id + '" son="'+pro.son+'" data-name="'+pro.name+'" class="search-li" data-num="'+(n++)+'">' + pro.name + '</li>';
		});
	}
	$('.select-box ul:eq(' + arguments.length + ')').html(temp_html);
	
	new SEARCH_ENGINE("search-val-inner-first","search-value-first","first","search-li");
	new SEARCH_ENGINE("search-val-inner-second","search-value-second","second","search-li");
	new SEARCH_ENGINE("search-val-inner-third","search-value-third","third","search-li");
}




        function load_goods() {
            $("#flexigrid").flexigrid({
                url: 'get_all_goods_list?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
',
            <?php if (isset($_smarty_tpl->tpl_vars['source']->value) && $_smarty_tpl->tpl_vars['source']->value != 'all') {?>
                url: 'get_all_goods_list?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
&'+$("#formSearch").serialize(),
            <?php }?>
                colModel: [
                    {display: '操作', name: 'article_number', width: 120, sortable: false, align: 'center',className: 'handle'},
                    {display: '商品信息', name: 'article_number', width: 200, sortable: false, align: 'left'},
                    {display: '销售价', name: 'stocks_name', width: 100, sortable: false, align: 'center'},
                    {display: '市场价', name: 'product_cate_name', width: 100, sortable: false, align: 'center'},
                    {display: '总销量', name: 'num', width: 80, sortable: false, align: 'center'},
                    {display: '总库存', name: 'amount', width: 80, sortable: false, align: 'center'},
                    {display: '上市年份', name: 'year_to_market', width: 80, sortable: false, align: 'center'},
                    {display: '上市季节', name: 'season_to_market', width: 80, sortable: false, align: 'center'},
                    {display: '商品性别', name: 'sex', width: 60, sortable: false, align: 'center'},
                    {display: '商品品牌', name: 'brand_name', width:80, sortable: false, align: 'center'},
                    {display: '商品类别', name: 'gc_name', width: 80, sortable: false, align: 'center'},
                <?php if (isset($_smarty_tpl->tpl_vars['source']->value) && $_smarty_tpl->tpl_vars['source']->value != 'all') {?>
                    {display: '所属店铺', name: 'store_name', width: 80, sortable: false, align: 'center'},
                <?php }?>
                    {display: '添加时间', name: 'code_name', width: 120, sortable: false, align: 'center'},
                ],
                buttons: [
//                    {display: '<i class="fa fa-file-excel-o"></i>导出数据', name: 'csv', bclass: 'csv', title: '将选定行数据导出CVS文件', },
                <?php if (isset($_smarty_tpl->tpl_vars['source']->value) && $_smarty_tpl->tpl_vars['source']->value == 'all') {?>
                    {display: '<i class="fa fa-plus"></i>添加商品', name: 'add', bclass: 'add', title: '', onpress: fg_operate},
//                    {display: '<i class="fa fa-cloud-upload" onclick="in_queue(1)"></i>导入商品'},
                    {display: '<i class="fa fa-cloud-upload"></i>导入商品', name: 'import', bclass: '1', title: '', onpress: in_queue},
                <?php }?>
                {display: '<i class="fa fa-trash"></i>批量删除', name: 'del', bclass: 'del', title: '', onpress: fg_operate},
//                    {display: '<i class="fa fa-plus"></i>上架微商城', name: 'add', bclass: 'add', title: '', onpress: fg_operate},
                {display: '<i class="fa fa-ban"></i>禁止使用优惠券', name: 'ban_coupons', bclass: 'ban', title: '', onpress: fg_operate},
                {display: '<i class="fa fa-plus"></i>设为新品', name: 'set_new', bclass: 'add', title: '', onpress: fg_operate},
                {display: '<i class="fa fa-plus"></i>设为推荐', name: 'set_recommend', bclass: 'add', title: '', onpress: fg_operate},
                {display: '<i class="fa fa-plus"></i>设为特价', name: 'set_sale', bclass: 'add', title: '', onpress: fg_operate},
                {display: '<i class="fa fa-ban"></i>取消标签', name: 'cancel_tags', bclass: 'ban', title: '', onpress: fg_operate},

                    {display: '<i class="fa fa-edit"></i>修改性别', name: 'set_sex', bclass: 'ban', title: '', onpress: fg_operate},
                    {display: '<i class="fa fa-edit"></i>修改季节', name: 'set_season', bclass: 'ban', title: '', onpress: fg_operate},
//                    {display: '<i class="fa fa-edit"></i>修改年份', name: 'set_year', bclass: 'ban', title: '', onpress: fg_operate},
//                    {display: '<i class="fa fa-edit"></i>修改品牌', name: 'set_brand', bclass: 'ban', title: '', onpress: fg_operate},
//                    {display: '<i class="fa fa-edit"></i>修改系列', name: 'set_gc', bclass: 'ban', title: '', onpress: fg_operate},
                {display: '<i class="fa fa-edit"></i>批量修改商品名称', name: 'set_goods_name', bclass: 'ban', title: '按格式批量修改商品名称', onpress: fg_operate},
	            <?php if (isset($_smarty_tpl->tpl_vars['source']->value) && $_smarty_tpl->tpl_vars['source']->value == 'all') {?>
	                {display: '<i class="fa fa-cloud-upload"></i>批量修改商品分类', name: 'update_class', bclass: 'import', title: '批量修改商品分类', onpress: fg_operate},
	            <?php }?>
            ],
//                searchitems: [
//                    {display: '商品名称', name: 'article_number'},
//                    {display: '分类名称', name: 'cate_id'},
//                    {display: '品牌ID', name: 'brand_id'},
//                    {display: '品牌名称', name: 'brand_name'}
//                ],
                rp:15,
                    title: '商品列表'
            });
        }

        $(function () {

            get_class_option("select[name='gc_id']",0);
            function get_class_option(obj,class_id){
                if($(obj).length==0){
                    return false;
                }
                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:'ajax_get_cate_option?class_id='+class_id,
                    success:function(data){
                        if(data.state){
                            $(obj).append(data.info);
                        } 
                    }
                })
            }
            $(".select2").select2({
                width:'180px'
            });
            $('#submit').click(function () {
                load_goods();
                var search = $("#formSearch").serialize();
                var url = 'get_all_goods_list?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
&'+search;
                $("#flexigrid").flexOptions({url: url, method: 'post', qtype: '', query: '', }).flexReload();
            });

        //平台下面页面直接加载商品,其他下面需要手动搜索
        <?php if (isset($_smarty_tpl->tpl_vars['source']->value) && $_smarty_tpl->tpl_vars['source']->value == 'all') {?>
            load_goods();
        <?php }?>
        });


        //入队
        function in_queue(j)
        {
            $.ajax({
                type:'get',
                dataType:'json',
                url: '<?php echo base_url("admin.php/Goods/");?>
queue?task_type=2',
                success:function(data){     //成功进入排队队列
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('admin.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state) {
                        if(data.queue){     //操作队列有空闲，直接执行任务
                            fg_operate('import');
                            return ;
                        } else{
                            var place = get_queue_place(data.task);
                            if (place>0){
                                layer.confirm('当前正在排队人数：<span id="place">'+place+'</span>', {
                                    title:'当前操作人数较多，需要排队：',
                                    btn: ['取消排队'], //按钮
                                    cancel: function(index){      //关闭询问框
                                        quite_queue(data.task);
                                        layer.msg('取消排队');
                                    }
                                }, function(){      //取消排队
                                    quite_queue(data.task);
                                    layer.msg('取消排队');

                                });
                                int = setInterval(function () {    //轮询
                                    place = get_queue_place(data.task);
                                    if(place==0){
                                        queue_action(data.task,j);
                                    }
                                    $('#place').html(place);
                                },1000);
                            } else {
                                queue_action(data.task);
                            }
                            window.onbeforeunload=function() {  //关闭，刷新浏览器事件，删除排队
                                quite_queue(data.task);
                            };
                        }
                    } else {
                        layer.msg(data.msg);
                    }
                }
            });
        }
        //成功进入操作队列
        function queue_action(id,j)
        {
            int = clearInterval(int);
            var i = 10;
            layer.confirm('是否开始操作？取消倒计时:<span id="time">10</span>', {
                title:'请确认：',
                btn: ['开始执行'], //按钮
                cancel: function(index){      //关闭询问框
                    layer.msg('取消操作');
                    return false;
                }
            },function(){       //确定操作
                int = clearInterval(int);   //结束轮询
                if(j==1)fg_operate('import',id);
            });
            int = setInterval(function (){    //轮询，倒计时
                i--;
                if(i==0){
                    quite_queue(id);
                    layer.msg('取消操作');
                    return false;
                }
                $('#time').html(i);
            },1000);
        }
        //得到位置
        function get_queue_place(id)
        {
            var place = 1;
            $.ajax({
                async: false,
                type:'get',
                dataType:'json',
                url: '<?php echo base_url("admin.php/Goods/");?>
get_queue_place?task_id='+id,
                success:function(data) {      //得到队列中的排队人数place
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state){
                        place = data.place;
                    }
                }
            })
            return place;
        }
        //当用户退出排队队列或者关闭浏览器时的操作
        function quite_queue(id)
        {
            layer.closeAll();
            $.ajax({
                type:'get',
                dataType:'json',
                url: '<?php echo base_url("admin.php/Goods/");?>
quit_queue?task_id='+id,
                success:function(data){
                    int = clearInterval(int);   //结束轮询
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "<?php echo base_url('pay.php/Index/');?>
login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }
                    return false;
                }
            })
        }

        function fg_operate(name) {
            if (name == 'add') {
                window.location.href = 'goods_add_goods_second';
            }else if (name == 'del') {
                if($('.trSelected').length>0){
                    var itemlist = new Array();
                    $('.trSelected').each(function(){
                            itemlist.push($(this).attr('data-id'));
                    });
                    fg_delete(itemlist);
                }else{
                    layer.msg('请至少选择一项！');
                }
            }else if (name == 'ban_coupons') {
                if($('.trSelected').length>0){
                    var itemlist = new Array();
                    $('.trSelected').each(function(){
                        itemlist.push($(this).attr('data-id'));
                    });
                    fg_ban_coupons(itemlist);
                }else{
                    layer.msg('请至少选择一项！');
                }
            }else if (name == 'set_new') {
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
            }else if(name=="update_class"){
            	 if($('.trSelected').length>0){
                     var itemlist = new Array();
                     $('.trSelected').each(function(){
                             itemlist.push($(this).attr('data-id'));
                     });
				     layer.open({
				         type: 1,
				         btn: ['确认', '取消'],
				         title: '<b>修改'+itemlist.length+'项商品的分类</b>',
				         skin: 'layui-layer-rim', //加上边框n
				         area: ['569px', '390px'], //宽高
				         content: $('#classit2'),
				         success:function(){
				         	setTimeout(function(){
				         		$('.select-box2').show();
				         		fillData2();
				         	},200)
				         },
				         yes: function (index) {
				        	 if($('#show_2').val()==''){
				        		 layer.msg('请选择分类！');
				        		 return false;
				        	 }
				             layer.closeAll();
				             goods_update_class($('#show_2').val(), itemlist);
				             
				         },
				         no: function(index){
				        	 
				         }

				     });
                     
                     
                     
                     
                     
                     
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
            }else if (name == 'cancel_tags') {
                if($('.trSelected').length>0){
                    var itemlist = new Array();
                    $('.trSelected').each(function(){
                            itemlist.push($(this).attr('data-id'));
                    });
                    fg_cancel_tags(itemlist);
                }else{
                    layer.msg('请至少选择一项！');
                }
            }else if(name=="import"){
            	data_import('商品',"<?php echo base_url('admin.php');?>
/write_import/excel_upload",'goods_import?name=');
            	/* var str_div = '<div class="pt-20 pb-20 pl-30 pr-30 "><form id="formType"  enctype="">'+
    			'<div class="ncap-form-default">'+
                      '<dl class=""><dt class="tit" style="width:30%;">'+
                            '<label for="store_arayacak">导入方式：</label>'+
                        '</dt>'+
                        '<dd class="opt" style="width:60%;">'+
    						'<div class="">'+
    							'<input type="radio" id="qq_isuse_1" name="type" checked  value="1"  style="margin-left:20px;">货号'+
    							'<input type="radio" id="qq_isuse_0" name="type"  value="2" style="margin-left:20px;" >款号'+
    						'</div>'+
    				   '</dd>'+
                    '</dl>'+
                    '<p class="notic" style="text-align:left;padding-left:13%;">货号：按商品的货号导入商品；<br>款号：按商品的款号+颜色导入商品；</p>'+
    			'</div></form></div>';
    		    /*批量导入*/
    		    /*layer.open({
    				type: 1,
    				btn: ['确认', '取消'],
    				title: '<b>商品导入</b>',
    				skin: 'layui-layer-rim', //加上边框n
    				area: ['420px', '230px'], //宽高
    				content: str_div,
    				yes: function(index){
    					//layer.close(index);
    					var type=$('#formType').serialize();
    					data_import('商品导入',"<?php echo base_url('admin.php');?>
/write_import/excel_upload",'goods_import?'+type+'&name=');
    				}, no: function(){
    				}
    			}) */
            }else if (name == 'set_sex') {
                if($('.trSelected').length>0){
                    var itemlist = new Array();
                    $('.trSelected').each(function(){
                        itemlist.push($(this).attr('data-id'));
                    });
                    var str_div = '<div class="pt-20 pl-30 pr-20 ">' +
                                        '<b class="pl-30 pr-20">商品性别：</b>' +
                                        '<select name="base_info[sex]" class="selecte " id="change_sex" style="width: 120px;">' +
                                        '<option value="" selected>-商品性别-</option>' +
                                        '<option value="2">男</option>' +
                                        '<option value="1">女</option>' +
                                        '<option value="0">通用</option>' +
                                        '</select>' +
                                   '</div>';

                    layer.open({
                        type: 1,
                        btn: ['确认', '取消'],
                        title: '<b>修改'+itemlist.length+'项商品的性别</b>',
                        skin: 'layui-layer-rim', //加上边框n
                        area: ['330px', '160px'], //宽高
                        content: str_div,
                        yes: function (index) {
                            //$('#change_xxx').val()    为要修改为的value
                            fg_set_attribute('sex', $('#change_sex').val(), itemlist);
                        }
                    });

                    //fg_delete(itemlist);
                }else{
                    layer.msg('请至少选择一项！');
                }
            }else if (name == 'set_season') {
                if($('.trSelected').length>0){
                    var itemlist = new Array();
                    $('.trSelected').each(function(){
                        itemlist.push($(this).attr('data-id'));
                    });

                    var str_div =   '<div class="pt-20 pl-30 pr-20 ">' +
                                        '<b class="pl-30 pr-20">上市季节：</b>' +
                                        '<select name="base_info[sex]" class="selecte " id="change_season" style="width: 120px;">' +
                                            '<option value="" selected>-上市季节-</option>' +
                                            '<option value="1">春季</option>' +
                                            '<option value="2">夏季</option>' +
                                            '<option value="3">秋季</option>' +
                                            '<option value="4">冬季</option>' +
                                        '</select>' +
                                    '</div>';

                    layer.open({
                        type: 1,
                        btn: ['确认', '取消'],
                        title: '<b>修改'+itemlist.length+'项商品的季节</b>',
                        skin: 'layui-layer-rim', //加上边框n
                        area: ['330px', '160px'], //宽高
                        content: str_div,
                        yes: function (index) {
                            //$('#change_xxx').val()    为要修改为的value
                            fg_set_attribute('season', $('#change_season').val(), itemlist);
                        }
                    });

                    //fg_delete(itemlist);
                }else{
                    layer.msg('请至少选择一项！');
                }
            }else if (name == 'set_brand') {
                if($('.trSelected').length>0){
                    var itemlist = new Array();
                    $('.trSelected').each(function(){
                        itemlist.push($(this).attr('data-id'));
                    });
                    var str_div =   '<div class="pt-20 pl-30 pr-20 ">' +
                                    '<b class="pl-30 pr-20">商品品牌：</b>' +
                                    '<select name="base_info[sex]" class="selecte " id="change_brand" style="width: 175px;">' +
                                        '<option value="">-全部品牌-</option>' +
                                        '<?php if (!empty($_smarty_tpl->tpl_vars['brands']->value)) {
$_from = $_smarty_tpl->tpl_vars['brands']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_2_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_2_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?><option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['brand_id'];?>
-<?php echo $_smarty_tpl->tpl_vars['v']->value['brand_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['brand_name'];?>
</option><?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_local_item;
}
if ($__foreach_v_2_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_item;
}
}?>' +
                                    '</select>' +
                                    '</div>';
                    layer.open({
                        type: 1,
                        btn: ['确认', '取消'],
                        title: '<b>修改'+itemlist.length+'项商品的品牌</b>',
                        skin: 'layui-layer-rim', //加上边框n
                        area: ['380px', '160px'], //宽高
                        content: str_div,
                        yes: function (index) {
                            //$('#change_xxx').val()    为要修改为的value
                            //alert($('#change_brand').val());
                            fg_set_attribute('brand', $('#change_brand').val(), itemlist);
                            layer_close();
                        }
                    });

                    //fg_delete(itemlist);
                }else{
                    layer.msg('请至少选择一项！');
                }
            }else if (name == 'set_year') {
                if ($('.trSelected').length > 0) {
                    var itemlist = new Array();
                    $('.trSelected').each(function () {
                        itemlist.push($(this).attr('data-id'));
                    });
                    var str_div =  '<div class="pt-20 pl-30 pr-20 ">' +
                                    '<b class="pl-30 pr-20">上市年份：</b>' +
                                    '<select name="base_info[sex]" class="selecte " id="change_year" style="width: 120px;">' +
                                        '<option value="" selected>-上市年份-</option>' +
                                        '<?php
$__section_total_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_total']) ? $_smarty_tpl->tpl_vars['__smarty_section_total'] : false;
$_smarty_tpl->tpl_vars['__smarty_section_total'] = new Smarty_Variable(array());
if (true) {
for ($_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_total']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] <= 8; $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_total']->value['index']++){
?>' +
                                         '<?php if (date("Y") == (date("Y")+5-(isset($_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] : null))) {?>' +
                                            '<option value=\'<?php echo date("Y")+5-(isset($_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] : null);?>
\' selected >' +
                                            '<?php echo date("Y")+5-(isset($_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] : null);?>
' +
                                            '</option>' +
                                            '<?php } else { ?>' +
                                            '<option value=\'<?php echo date("Y")+5-(isset($_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] : null);?>
\'>' +
                                            '<?php echo date("Y")+5-(isset($_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_total']->value['iteration'] : null);?>
' +
                                            '</option>' +
                                         '<?php }?>' +
                                        '<?php
}
}
if ($__section_total_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_total'] = $__section_total_1_saved;
}
?>' +
                                    '</select>' +
                                    '</div>';
                    layer.open({
                        type: 1,
                        btn: ['确认', '取消'],
                        title: '<b>修改'+itemlist.length+'项商品的上市年份</b>',
                        skin: 'layui-layer-rim', //加上边框n
                        area: ['330px', '160px'], //宽高
                        content: str_div,
                        yes: function (index) {
                            //$('#change_xxx').val()    为要修改为的value
                            fg_set_attribute('year', $('#change_year').val(), itemlist);
                        }
                    });

                } else {
                    layer.msg('请至少选择一项！');
                }
            }else if (name == 'set_goods_name') {
                if ($('.trSelected').length > 0) {
                    var itemlist = new Array();
                    $('.trSelected').each(function () {
                        itemlist.push($(this).attr('data-id'));
                    });
                    var str_div =  '<div class="pt-10 pl-10 pr-20 ">' +
                                    '<b class="pl-20 pr-20">修改这'+itemlist.length+'项商品的名称为下列格式：</b>' +
                                    '<p class="pl-20 pt-10"><?php echo $_smarty_tpl->tpl_vars['goods_name_format']->value;?>
</p>'+
                                    '</div>';
                    layer.open({
                        type: 1,
                        btn: ['确认', '取消'],
                        title: '<b>提示</b>',
                        skin: 'layui-layer-rim', //加上边框n
                        area: ['380px', '180px'], //宽高
                        content: str_div,
                        yes: function (index) {
                            fg_set_goods_name(itemlist);
                        }
                    });

                } else {
                    layer.msg('请至少选择一项！');
                }
            }
        }
        function fg_edit(goods_id){
		    window.location.href = "goods_edit_goods_second?op=edit&goods_id="+goods_id;
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
                    if(data.state){
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
        //删除商品，把商品加入回收站
        function fg_delete(id) {
            if (typeof id == 'number') {
                var id = new Array(id.toString());
            };
            layer.confirm('确认要将这 ' + id.length + ' 项删除吗？', {
                btn: ['确认','取消'] //按钮
              }, function(){
                id = id.join(',');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "goods_delete?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
",
                    data: "del_id="+id,
                    success: function(data){
                        if(data.state=='403'){
                            login_ajax('shop',data);
                        }else if(data.state==false){
                            layer.msg(data.msg);
                        }else if(data.state==true){
                            layer.msg(data.msg);
                        }
                        $("#flexigrid").flexOptions({url: 'get_all_goods_list?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
&' + $("#formSearch").serialize(), method: 'post', qtype: '', query: '', }).flexReload();
                    }
                });
            });
        }
        
         
        //批量修改商品分类
        function goods_update_class(id,itemlist) {
        	var id = id;
        	if (typeof itemlist == 'number') {
                var itemlist = new Array(itemlist.toString());
            };
            itemlist = itemlist.join(',');
            $.ajax({
                type: "get",
                dataType: "json",
                url: "goods_update_class?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
",
                data: "up_id="+itemlist+"&cid="+id,
                success: function(data){
                    if(data.state=='403'){
                        login_ajax('shop',data);
                    }else if(data.state==false){
                        layer.msg(data.msg);
                    }else if(data.state==true){
                        layer.msg(data.msg);
                    }
                    
                    setTimeout("window.location.href='goods_management?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
'",1000)
                    //$("#flexigrid").flexOptions({url: 'get_all_goods_list?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
', method: 'post', qtype: '', query: '', }).flexReload();
                }
            });
        }
        
        
        
        
        //禁用商品优惠券
        function fg_ban_coupons(id) {
            if (typeof id == 'number') {
                var id = new Array(id.toString());
            };
            layer.confirm('确认要禁用这 ' + id.length + ' 项的优惠券吗？', {
                btn: ['确认','取消'] //按钮
              }, function(){
                id = id.join(',');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "goods_ban_coupons",
                    data: "id="+id,
                    success: function(data){
                        if(data.state=='403'){
                            login_ajax('shop',data);
                        }else if(data.state==false){
                            layer.msg(data.msg);
                        }else if(data.state==true){
                            layer.msg(data.msg);
                        }
                        $("#flexigrid").flexOptions({url: 'get_all_goods_list?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
&' + $("#formSearch").serialize(), method: 'post', qtype: '', query: '', }).flexReload();
                    }
                });
            });
        }
        //设置商品标签
        function fg_set_tag(id,value) {
            var value_string = value == '1' ? '新品' : (value == '2' ? '推荐' : '特价');
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
                        if(data.state=='403'){
                            login_ajax('shop',data);
                        }else if(data.state==false){
                            layer.msg(data.msg);
                        }else if(data.state==true){
                            layer.msg(data.msg);
                        }
                        $("#flexigrid").flexOptions({url: 'get_all_goods_list?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
& ', method: 'post', qtype: '', query: '', }).flexReload();
                    }
                });
            });
        }
        //取消商品标签
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
                        if(data.state=='403'){
                            login_ajax('shop',data);
                        }else if(data.state==false){
                            layer.msg(data.msg);
                        }else if(data.state==true){
                            layer.msg(data.msg);
                        }
                        $("#flexigrid").flexOptions({url: 'get_all_goods_list?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
& ', method: 'post', qtype: '', query: '', }).flexReload();
                    }
                });
            });
        }
        //修改商品属性
        function fg_set_attribute(attr, change_id, id) {  //attr为要修改的属性  change_id为修改后的id属性  id为商品id
            if (change_id != ""){
                if (typeof id == 'number') {
                    var id = new Array(id.toString());
                };
                    id = id.join(',');
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "goods_set_attribute",
                        data: {"attr" : attr, "change_id" : change_id, "id" : id},
                        success: function(data){
                            if(data.state=='403'){
                                login_ajax('shop',data);
                            }else if(data.state == false){
                                layer.msg(data.msg);
                            }else if(data.state == true){
                                layer.msg(data.msg);
                            }
                            layer.closeAll();
                            layer.msg(data.msg);
                            $("#flexigrid").flexOptions({url: 'get_all_goods_list?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
& ', method: 'post', qtype: '', query: '', }).flexReload();
                        }
                });
            } else {
                layer.msg('请至少选择一项！');
            }
        }

        //格式化修改商品名称
        function fg_set_goods_name(id) {
            if (typeof id == 'number') {
                var id = new Array(id.toString());
            };
            id = id.join(',');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "goods_set_goods_name",
                data: "id="+id,
                success: function(data){
                    if(data.state == '403'){
                        login_ajax('shop',data);
                    }else if(data.state == false){
                        layer.msg(data.msg);
                    }else if(data.state == true){
                        layer.closeAll();
                        layer.msg(data.msg);
                    }
                    $("#flexigrid").flexOptions({url: 'get_all_goods_list?source=<?php echo $_smarty_tpl->tpl_vars['source']->value;?>
&' + $("#formSearch").serialize(), method: 'post', qtype: '', query: '', }).flexReload();
                }
            });
        }


SEARCH_ENGINE.prototype = {
    //-----------------------------【转换成拼音，并将拼音、汉字、数字存入数组】
    transformPinYin : function(){

        //临时存放数据对象
        $("body").append('<input type="text" class="hidden pingying-box">');
        var $pinyin = $("input.pingying-box");

        for(var i=0;i<this.searchList.length;i++){

            //存放名字，转换成拼音
            $pinyin.val(this.searchList.eq(i).attr("data-name"));

            //汉字转换成拼音
            var pinyin = $pinyin.toPinyin().toLowerCase().replace(/\s/g,"");

            //汉字
            var cnCharacter = this.searchList.eq(i).attr("data-name");

            //数字
            var digital = this.searchList.eq(i).attr("data-num");
            
            //val
            var val = this.searchList.eq(i).attr("val");

            //存入数组
            this.searchMemberArray.push(pinyin + "&" + cnCharacter + "&" + digital + "&" + val);
        }

        //删除临时存放数据对象
        $pinyin.remove();
    },

    //-----------------------------【模糊搜索关键字】
    fuzzySearch : function(type,val){
        var s;
        var returnArray = [];

        //拼音
        if(type === "pinyin"){
            s = 0;
        }
        //汉字
        else if(type === "cnCharacter"){
            s = 1;
        }
        //数字
        else if(type === "digital"){
            s = 2;
        }

        for(var i=0;i<this.searchMemberArray.length;i++){
            //包含字符
            if(this.searchMemberArray[i].split("&")[s].indexOf(val) >= 0){
                returnArray.push(this.searchMemberArray[i]);
            }
        }

        return returnArray;

    },

    //-----------------------------【输出搜索结果】
    postMemberList : function(tempArray){
        var html = '';

        //有搜索结果
        if(tempArray.length > 0){

            html += '<li class="tips">搜索结果（' + tempArray.length + '）</li>';

            for(var i=0;i<tempArray.length;i++){
                var sArray = tempArray[i].split("&");

                html += '<li data-num="'+sArray[2]+'" val="'+sArray[3]+'">' + sArray[1] + '</li>';
            }
        }
        //无搜索结果
        else{

            if($(this.searchInput).val() != ""){
                html += '<li class="tips">无搜索结果……</li>';
            }else{
                this.searchResultInner.html("");
            }
        }
        this.searchResultInner.html(html);
    },

    //-----------------------------【绑定搜索事件】
    searchActiveEvent : function(){
    	
        var searchEngine = this;

        $(document).on("keyup",this.searchInput,function(){

            //临时存放找到的数组
            var tempArray = [];

            var val = $(this).val();
			
            //判断拼音的正则
            var pinYinRule = /^[A-Za-z]+$/;

            //判断汉字的正则
            var cnCharacterRule = new RegExp("^[\\u4E00-\\u9FFF]+$","g");

            //判断整数的正则
            var digitalRule = /^[-\+]?\d+(\.\d+)?$/;

            //只搜索3种情况
            //拼音
            if(pinYinRule.test(val)){
                tempArray = searchEngine.fuzzySearch("pinyin",val);
            }
            //汉字
            else if(cnCharacterRule.test(val)){
                tempArray = searchEngine.fuzzySearch("cnCharacter",val);
            }
            //数字
            else if(digitalRule.test(val)){

                tempArray = searchEngine.fuzzySearch("digital",val);
            }
            else{
                searchEngine.searchResultInner.html('<li class="tips">无搜索结果……</li>');
            }

            searchEngine.postMemberList(tempArray);
			
			//判断如果为空就显示之前的内容
			if(val==''){
				if($(this).attr('class')=='search-value-first'){
					fillData();
				}else if($(this).attr('class')=='search-value-first2'){
					fillData2();
				}else if($(this).attr('class')=='search-value-second'){
					var l1 = $('.first .selected').attr('data-num');
					fillData(l1);
				}else if($(this).attr('class')=='search-value-second2'){
					var l1 = $('.first2 .selected').attr('data-num');
					fillData2(l1);
				}else if($(this).attr('class')=='search-value-third'){
					var l1 = $('.first .selected').attr('data-num');
					var l2 = $('.second .selected').attr('data-num');
					fillData(l1,l2);
				}else if($(this).attr('class')=='search-value-third2'){
					var l1 = $('.first2 .selected').attr('data-num');
					var l2 = $('.second2 .selected').attr('data-num');
					fillData2(l1,l2);
				}
			}
        });
    }
};
		//---------------------------------------------------【初始化】
function SEARCH_ENGINE(dom,searchInput,searchResultInner,searchList){

    //存储拼音+汉字+数字的数组
    this.searchMemberArray = [];

    //作用对象
    this.dom = $("." + dom);

    //搜索框
    this.searchInput = "." + searchInput;

    //搜索结果框
    this.searchResultInner = this.dom.find("." + searchResultInner);

    //搜索对象的名单列表
    this.searchList = this.dom.find("." + searchList);

    //转换成拼音并存入数组
    this.transformPinYin();

    //绑定搜索事件
    this.searchActiveEvent();

}

    <?php echo '</script'; ?>
>
    <div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
