<?php
/* Smarty version 3.1.29, created on 2017-10-17 14:43:50
  from "D:\www\yunjuke\application\vmall\views\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e5a6a6d686f2_18590483',
  'file_dependency' => 
  array (
    '1d813e489e097c31dffeee26213afcbd60904996' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\index.html',
      1 => 1507960604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink.html' => 1,
    'file:lib/footer.html' => 1,
    'file:lib/Flink.html' => 1,
  ),
),false)) {
function content_59e5a6a6d686f2_18590483 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '392059e5a6a6a34134_93802753';
?>
<!DOCTYPE html style="opacity: 1; font-size: 109.375px;">
<html>

	<head>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">  
		<title>聚客联盟店</title>
		<style type="text/css">
			.service-tip-box {
				margin-top: .05rem;
				display: -webkit-box;
				-webkit-box-orient: vertical;
				-webkit-line-clamp: 2;
				overflow: hidden;
			}

			.store-name-box {
				font-size: .14rem;
				line-height: 1.2em;
				overflow: hidden;
				font-weight: 400;
			}

			.shop_mod_html img {
				max-width: 100%;
			}
			.close{
			background: #333;
			color: #fff;
			width: 100%;
			height: 40px;
			line-height: 40px;
			padding-left: 20px;
		}
		.menu-box{
			width: 28%;
			float: left;
			margin-left: 5%;
			overflow-y: scroll;
		}.siderbarmenu1 li{
			overflow: hidden;
			width: 100%;
			height: 45px;
			border-bottom: 1px solid #C4C4C4;
			border-right: 1px solid #C4C4C4;
			line-height: 45px;
		}
		.siderbarmenu li{
			overflow: hidden;
			width: 100%;
			height: 45px;
			border-bottom: 1px solid #C4C4C4;
			border-right: 1px solid #C4C4C4;
			line-height: 45px;
			padding-left: 15%;
		}
		.clickli{
			border-left:5px solid #f44336;
			color:#f44336;
			position: relative;
		}
		.clickli1{
			color:#f44336;
			position: relative;
		}
		.rightair{
			position: absolute;
			right: -5px;
			width: 15px;
			height: 100%;
			background: #fff;
		}
		#godslist{
			position: fixed;top: 0;left: 0;bottom: 0;right: 0;background: #fff; z-index:9999;display: none;
			animation: show 1s;
			-webkit-animation:show 1s;
		}
		@keyframes show{
			0%{left:-100%;right: 100%;}
			100%{left:0;right: 0}
		}
		@-webkit-keyframes show{
			0%{left:-100%;right: 100%;}
			100%{left:0;right: 0}
		}
			.hproduct{

				height: 2.1rem!important;
			}
			.wx_itemlist .shop_mod_pic_1 .hproduct .cover a {height: 1.5rem !important;}
			.searchfixed{
			position: fixed;
			top: 0;
			width: 100%;
			height: 100%;
			background: #fff;
			z-index: 10000;
		}
		#whole-store-search .cancel{
				padding: 4px 8px;
				border-radius: 3px;
				margin: 11px 5px 0 0;
				color: #FFF;
				background: red;
			}
			#in-store-search .cancel{
				padding: 4px 8px;
				border-radius: 3px;
				margin: 11px 2px 0 0;
				color: #FFF;
				background: red;
			}
			#cancel-search .cancel{
				padding: 7px 0 0 4px;
			}
		.searchfixed-content-icon{
			width: 80px;
			height: 80px;
			border-radius: 50%;
			margin: 35% auto 5% auto;
			background: #ddd;
			padding: 25px;
		}
		.searchIcon-text{
			width: 100%;
			text-align: center;
			color: #BDBDBD;
			font-size: 17px;
		}
		.clearseahistorylist{
				text-align: center;
				border: 1px solid #888;
				color: #868686;
				width: 180px;
				height: 35px;
				line-height: 35px;
				margin: 20px auto;
				border-radius: 3px;
			}
		.cancelhislist{
			padding: 8px;
			margin-top: -8px;
		}
		.m_search_wrap:after{
				content:""!important;
		}
		.searchimg{
			position: absolute;
			top: 0;
			right: 0;
		}
		.keywords{
				margin: 20px;
			}
			.keywords span{
				padding: 2px 15px;background: #f0f2f5;color: #333;margin: 5px;border-radius: 50px;display: inline-block;
			}
			.searchistroylist{
				margin: 20px;
			}
			.searchistroylist span{
				padding: 2px 15px;background: #f0f2f5;color: #333;margin: 5px;border-radius: 50px;display: inline-block;
			}

			.m_search_wrap, .search_input {
			    background-color: #eaeaea;
			}
			.wx_itemlist {
			    margin-top: 20px!important;
			}
			#doSearch1{
				border-radius: 20px;background: #f0f2f5;padding-left: 30px;
				height: 35px;line-height: 35px;color: #333;
			}
			#doSearch1:focus{
				color: #666!important;
			}
			.search-icon{
				position: absolute;left: 8px;
				top: 2px;
				font-size: 17px;
				color: #bbbdc5;
			}
			.icon-return{
				font-size: 20px!important;color: #999!important;
				margin-left: 7px;line-height: 50px!important;
			}
			.searchfixed input::-webkit-input-placeholder{
				color: #bbbdc5;
			}
			.history-line{
				height: 15px;background: #f1f3f6;border-top: 1px solid #d7d7d7;
			}
			.guideface{
				font-size:.3rem;
				color: #fe4b68;
				margin-left:23%;
			}
			.shop-logo{
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				border-radius: 4px;
			}

			.wx_itemlist .hproduct .fn{
				margin-top:12px!important;
			}
			.store-name-box img{
				width:.2rem;
				height:.2rem;
			}
			.guides{
				padding-left:.1rem;
			}
			.guides span{
				padding:0 .08rem;
			}
			.guides span img{
				margin-right:.04rem;
			}
			.guide_container{
				height: .45rem;
				position: relative;
			}
			.guide_content{
				width:90%;
				background: #f1f1f1!important;
				z-index:999;
				border-radius: 5px;
				position: absolute;
				top:0rem;
				left:5%
			}
			.guide_title{
				padding:.05rem 0 0 .2rem;
			}
			.swiper-container,.shop_slider_img{
				height: 1.6rem!important;
			}
			.wx_itemlist{
				background:#f0f1f7!important;
			}
			.hproduct{
				background:#fff;
			}
		</style>
		<link href="<?php echo TEMPLE;?>
css/home.css" rel="stylesheet" type="text/css">
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/swiper-3.0.7.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/qrcode.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/iscroll-lite.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
		<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/weui1.css">
	</head>

	<body>
		<!--S 主体内容 -->
		
		<?php if (isset($_smarty_tpl->tpl_vars['str']->value) && !empty($_smarty_tpl->tpl_vars['str']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['str']->value;?>

		<?php }?>
				<div id="listLoading" class="list-loading-box c-8 tc pt10 pb10" style="display: block;">
					<a href="<?php echo base_url();?>
vmall.php/goods/index" style="display:block;">查看所有商品</a>
				</div>
				<div class="mod_footer" id="common_footer"></div>
		
        <div id="listLoading" class="list-loading-box c-8 tc pt10 pb10" style="display: block;"></div>
		
		<!-- /底部导航 -->
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


			
<!--		搜索弹出框-->
       <div class="searchfixed" style="display: none">
			<div class="v3_shop_header mui-flex" style="padding-bottom: 7px;border-bottom: 1px solid #DDDDDD;">
				<div class="category_menu cell fixed" id="cancel-search">
					<i class="iconfont icon-return">&#xe637;</i>
				</div>
				<div class="mobile_search cell" style="height: 35px;margin: 8px 9px 0 5px!important;">
					<div class="m_search_wrap" style="padding-left: 0;">
						<i class="iconfont search-icon">&#xe606;</i>
						<input type="text" id="doSearch1" class="search_input" placeholder="搜索店内商品">
					</div>
				</div>
				<div class="category_menu cell fixed" id="whole-store-search">
					<p class="cancel">搜全站</p>
				</div>
				<div class="category_menu cell fixed" id="in-store-search" style="margin-right: 5px;">
					<p class="cancel">搜本店</p>
				</div>
			</div>
			<div class="keywords">
				<p style="margin: 10px 0">关键词：</p>
						<?php if ($_smarty_tpl->tpl_vars['default_hot_search']->value['state'] == 1) {?>
				     <?php
$_from = $_smarty_tpl->tpl_vars['default_hot_search']->value['data'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
				         <span><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</span>
				     <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
if ($__foreach_val_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_0_saved_key;
}
?>
				 <?php } else { ?>
				     <span><?php echo $_smarty_tpl->tpl_vars['default_hot_search']->value['data'];?>
</span>
				<?php }?>
			</div>
      		<div class="searchfixed-content" id="sc1">
      			<div class="searchfixed-content-icon">
      				<img src="<?php echo TEMPLE;?>
images/searchIcon.png" alt="" style="width: 30px;height: 30px;">
      			</div>
      			<p class="searchIcon-text">暂无所搜历史记录</p>
      		</div>
      		<div class="searchfixed-content" id="sc2">
      			<div class="history-line"></div>
      			<div class="searchistroylist">
      				<p style="margin: 10px 0;" class="history">历史记录：</p>
      			</div>
      			<div class="clearseahistorylist">清除搜索记录</div>
      		</div>
      	
       </div>
        
<!--        搜索弹出框结束-->
			
			

			
			<!--E 选择品类菜单 -->
			  <div id="godslist">
    	<div class="close">
    		<div class="close-img"><img src="" alt=""></div>
    		<p><img src="<?php echo TEMPLE;?>
images/X.png" alt="" style="display:width: 15px;height: 15px;padding:0 5px 3px 0">关闭</p>
    	</div>
    	<div class="sidebarMenu">
			<div class="menu-box" id="menu1" style="margin-left: 0%;width: 34%;">
				<ul class="siderbarmenu">
					<?php if (!empty($_smarty_tpl->tpl_vars['cateInfo']->value)) {?>
						<?php
$_from = $_smarty_tpl->tpl_vars['cateInfo']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cate_1_saved_item = isset($_smarty_tpl->tpl_vars['cate']) ? $_smarty_tpl->tpl_vars['cate'] : false;
$_smarty_tpl->tpl_vars['cate'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cate']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cate']->value) {
$_smarty_tpl->tpl_vars['cate']->_loop = true;
$__foreach_cate_1_saved_local_item = $_smarty_tpl->tpl_vars['cate'];
?>
							<li tarid="siderbarmenu2-<?php echo $_smarty_tpl->tpl_vars['cate']->value['gc_id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['cate']->value['gc_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cate']->value['gc_name'];?>
</li>
						<?php
$_smarty_tpl->tpl_vars['cate'] = $__foreach_cate_1_saved_local_item;
}
if ($__foreach_cate_1_saved_item) {
$_smarty_tpl->tpl_vars['cate'] = $__foreach_cate_1_saved_item;
}
?>
					<?php }?>
				</ul>
			</div>
    		<div class="menu-box" id="menu2" style="display: none">
    		    <?php
$_from = $_smarty_tpl->tpl_vars['cateInfo']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cate_2_saved_item = isset($_smarty_tpl->tpl_vars['cate']) ? $_smarty_tpl->tpl_vars['cate'] : false;
$_smarty_tpl->tpl_vars['cate'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cate']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cate']->value) {
$_smarty_tpl->tpl_vars['cate']->_loop = true;
$__foreach_cate_2_saved_local_item = $_smarty_tpl->tpl_vars['cate'];
?>
				<ul class="siderbarmenu1" id="siderbarmenu2-<?php echo $_smarty_tpl->tpl_vars['cate']->value['gc_id'];?>
">
				    <?php if (!empty($_smarty_tpl->tpl_vars['cate']->value['son_cate'])) {?>
				    <li tarid="siderbarmenutwo"  data-id="<?php echo $_smarty_tpl->tpl_vars['cate']->value['gc_id'];?>
" son_num="0" >全部</li>
				    <?php
$_from = $_smarty_tpl->tpl_vars['cate']->value['son_cate'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cate2_3_saved_item = isset($_smarty_tpl->tpl_vars['cate2']) ? $_smarty_tpl->tpl_vars['cate2'] : false;
$_smarty_tpl->tpl_vars['cate2'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cate2']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cate2']->value) {
$_smarty_tpl->tpl_vars['cate2']->_loop = true;
$__foreach_cate2_3_saved_local_item = $_smarty_tpl->tpl_vars['cate2'];
?>
					<li tarid="siderbarmenu3-<?php echo $_smarty_tpl->tpl_vars['cate2']->value['gc_id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['cate2']->value['gc_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cate2']->value['gc_name'];?>
</li>
					<?php
$_smarty_tpl->tpl_vars['cate2'] = $__foreach_cate2_3_saved_local_item;
}
if ($__foreach_cate2_3_saved_item) {
$_smarty_tpl->tpl_vars['cate2'] = $__foreach_cate2_3_saved_item;
}
?>
					<?php }?>
				</ul>
				<?php
$_smarty_tpl->tpl_vars['cate'] = $__foreach_cate_2_saved_local_item;
}
if ($__foreach_cate_2_saved_item) {
$_smarty_tpl->tpl_vars['cate'] = $__foreach_cate_2_saved_item;
}
?>
			</div>
    		<!-- <div class="menu-box" id="menu3" style="display: none">
    		    <?php
$_from = $_smarty_tpl->tpl_vars['cateInfo']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cate_4_saved_item = isset($_smarty_tpl->tpl_vars['cate']) ? $_smarty_tpl->tpl_vars['cate'] : false;
$_smarty_tpl->tpl_vars['cate'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cate']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cate']->value) {
$_smarty_tpl->tpl_vars['cate']->_loop = true;
$__foreach_cate_4_saved_local_item = $_smarty_tpl->tpl_vars['cate'];
?>
    		    <?php if (isset($_smarty_tpl->tpl_vars['cateInfo']->value[$_smarty_tpl->tpl_vars['cate']->value['id']])) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['cateInfo']->value[$_smarty_tpl->tpl_vars['cate']->value['id']];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cate2_5_saved_item = isset($_smarty_tpl->tpl_vars['cate2']) ? $_smarty_tpl->tpl_vars['cate2'] : false;
$_smarty_tpl->tpl_vars['cate2'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cate2']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cate2']->value) {
$_smarty_tpl->tpl_vars['cate2']->_loop = true;
$__foreach_cate2_5_saved_local_item = $_smarty_tpl->tpl_vars['cate2'];
?>
				<?php if (isset($_smarty_tpl->tpl_vars['cateInfo']->value[$_smarty_tpl->tpl_vars['cate2']->value['id']])) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['cateInfo']->value[$_smarty_tpl->tpl_vars['cate2']->value['id']];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cate3_6_saved_item = isset($_smarty_tpl->tpl_vars['cate3']) ? $_smarty_tpl->tpl_vars['cate3'] : false;
$_smarty_tpl->tpl_vars['cate3'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cate3']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cate3']->value) {
$_smarty_tpl->tpl_vars['cate3']->_loop = true;
$__foreach_cate3_6_saved_local_item = $_smarty_tpl->tpl_vars['cate3'];
?>   
				<ul class="siderbarmenu1" id="siderbarmenu3-<?php echo $_smarty_tpl->tpl_vars['cate2']->value['id'];?>
">
				    <li tarid="siderbarmenuhtree"  data-id="<?php echo $_smarty_tpl->tpl_vars['cate2']->value['id'];?>
" son_num="0">全部</li>
					<li data-id="<?php echo $_smarty_tpl->tpl_vars['cate3']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cate3']->value['name'];?>
</li>
				</ul>
				<?php
$_smarty_tpl->tpl_vars['cate3'] = $__foreach_cate3_6_saved_local_item;
}
if ($__foreach_cate3_6_saved_item) {
$_smarty_tpl->tpl_vars['cate3'] = $__foreach_cate3_6_saved_item;
}
?>
			    <?php }?>
				<?php
$_smarty_tpl->tpl_vars['cate2'] = $__foreach_cate2_5_saved_local_item;
}
if ($__foreach_cate2_5_saved_item) {
$_smarty_tpl->tpl_vars['cate2'] = $__foreach_cate2_5_saved_item;
}
?>
			    <?php }?>
			    <?php
$_smarty_tpl->tpl_vars['cate'] = $__foreach_cate_4_saved_local_item;
}
if ($__foreach_cate_4_saved_item) {
$_smarty_tpl->tpl_vars['cate'] = $__foreach_cate_4_saved_item;
}
?>
			</div> -->
    	</div>
    </div>
			

	<div class="ui-mask active" data-ui-mask="" style="width: 100%; height: 100%; left: 0px; top: 0px; background-color: rgba(0, 0, 0, 0.4); display: none;"></div>
	<!-- B 二维码 -->
	<div class="js_dialog" id="qrCodeWrap" style="display:none;">
		<div class="weui-mask cancel2"></div>
		<div class="weui-dialog">
			
			<div class="weui-dialog__bd">
			  <?php if (empty($_smarty_tpl->tpl_vars['storeInfo']->value['ous_ewm'])) {?>
			            对不起，该店铺还未生成二维码！
			  <?php } else { ?>
				<div style="width: 80%;margin: 0 auto"><img src="<?php echo PLUGIN;
echo $_smarty_tpl->tpl_vars['storeInfo']->value['ous_ewm'];?>
" alt="wei-log" style="max-width: 100%;height: auto"></div>
				<p style="color: #99999c">长按二维码关注</p>
				<?php }?>
			</div>
		</div>
	</div>

	<!-- E 二维码 -->
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Flink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
<?php echo '<script'; ?>
 type="text/javascript">
	$("#categoryMenu").click(function(){
		$("#godslist").css("display","block");
	})
	$(".close").click(function(){
		$("#godslist").css("display","none");
	})
		
	$("#menu1 li").click(function(){
		$("#menu1 li").removeClass("clickli");
		$(this).addClass("clickli");
		$("#menu1 span").remove();
		$(this).append('<span class="rightair"></span>');
		$("#menu2").css("display","block");
		$("#menu2 ul").css("display","none");
		//$("#menu3 ul").css("display","none");
		var tarid = $(this).attr("tarid");
		if(!tarid){
			window.location.href="<?php echo base_url('vmall.php/goods/');?>
";
		}
		var gcid = $(this).attr("data-id");
		if($("#"+tarid).children().length>0){
			$("#"+tarid).css("display","block");
		}else{
			window.location.href="<?php echo base_url('vmall.php/goods/index?gc_id=');?>
"+gcid;
		}
		
	})
	$("#menu2 li").click(function(){
		$("#menu2 li").removeClass("clickli1");
		$(this).addClass("clickli1");
		$("#menu2 span").remove();
		$(this).append('<span class="rightair"></span>');
		//$("#menu3").css("display","block");
		//$("#menu3 ul").css("display","none");
		//var tarid = $(this).attr("tarid");
		var gcid = $(this).attr("data-id");
		window.location.href="<?php echo base_url('vmall.php/goods/index?gc_id=');?>
"+gcid;
	})
	
/* 	$("#menu3 li").click(function(){
		$("#menu3 li").removeClass("clickli1");
		$(this).addClass("clickli1");
		var gcid = $(this).attr("data-id");
		window.location.href="<?php echo base_url('vmall.php/goods/index?gc_id=');?>
"+gcid;
	}) */
			

	
	$('body').on('touchstart','.cancel2',function() {	
		$("#qrCodeWrap").css("display","none");
	})
	
	$('body').on('touchstart','.attentions',function() {
		$("#qrCodeWrap").css("display","block");
	});
	
/* 	$('#categoryMenu').on('click', function() {
		$.msg.actions({
			content: $('#sidebarMenusBox'),
			position: 'left',
			clsIn: 'slideInLeft',
			clsOut: 'slideOutLeft',
			width: '100%',
			bodyStyle: 'position: absolute; z-index: 500; top: 0;right: 0;bottom: 0;left: 0; background-color:#fff; padding:0; overflow:auto;',
			onOpened: function(oThis) {
				scrollM1 = new iScroll('#menu1Box', { click: true, snap: 'li' });
				$('#menu2Box .sidebar-ul').length && (scrollM2 = new iScroll('#menu2Box', { click: true, snap: 'li' }));
				$('#menu3Box .sidebar-ul').length && (scrollM3 = new iScroll('#menu3Box', { click: true, snap: 'li' }));

				$('#btnSidebarClose').off().on('click', function() { $.msg.actions(); });

				$('#menu1Box .sidebar-li').removeClass('active').eq(3).addClass('active');
				var $firstM2 = $('#menu2Box .sidebar-ul').hide().eq(0).show();

				debounce(function() { scrollM2 && scrollM2.refresh(); }, 200)();
			},
			hasCloseBtn: false,
			cacheIns: true
		});
	}); */
	$('.hasClass').on('click', function() {
		$('#categoryMenu').trigger('click');
	});
	$('body').on('click', '.search_input', function() {
		var $searchBox = $(".searchBox.stock");
		$searchBox.show();
		$searchBox.find("input[type=search]").focus();
		$searchBox.find(".s-cancel").on('click', function() {
			$searchBox.hide();
		});
	});
					
					
//		弹出搜索框
		
		$("#doSearch").focus(function(){
			if($(".searchistroylist span").length==0){
				$("#sc1").show();
				$("#sc2").hide();
			}else{
				$("#sc2").show();
				$("#sc1").hide();
			}
			$(".searchfixed").show();
			$("#doSearch1").focus();
		})
		$("#cancel-search").click(function(){
			$(".searchfixed").hide();
		})
		
//		全店搜索
       	$("#whole-store-search").click(function(e){
				var serinfo = $("#doSearch1").val();
				window.location.href="<?php echo base_url('vmall.php/goods/index?type=2&goods_name=');?>
"+serinfo;
				setTimeout(function(){
					$(".searchfixed").hide()
					$(".searchistroylist").append('<span>'+serinfo+'</span>');
					$("#doSearch1").val("");
				},1000);
		})
//     	店内搜索
       	$("#in-store-search").click(function(e){
       		var serinfo = $("#doSearch1").val();
			window.location.href="<?php echo base_url('vmall.php/goods/index?type=1&goods_name=');?>
"+serinfo;
	            
				
				setTimeout(function(){
					$(".searchfixed").hide()
					$(".searchistroylist").append('<span>'+serinfo+'</span>');
					$("#doSearch1").val("");
				},1000);
		})


      $("body").on("click",".searchistroylist span",function(){
    	  $("#doSearch1").val($(this).attr("str"));
    	    $(".searchfixed").hide();
    		dataPage=1;
            allowScroll=true;
            getAjaxData(dataPage,true,"");
		
		})
		
		$(".clearseahistorylist").click(function(){
			$(".searchistroylist").empty();
			$("#sc1").show();
			$("#sc2").hide();
		})
    
   	$("body").on('touchstart','.searchfixed span',function(){
   		$("#doSearch1").val($(this).html())
   		})
    
    
//弹出搜索框结束
				<?php echo '</script'; ?>
>

	</body>

</html><?php }
}
