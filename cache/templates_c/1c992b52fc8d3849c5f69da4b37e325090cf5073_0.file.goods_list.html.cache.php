<?php
/* Smarty version 3.1.29, created on 2017-10-14 19:33:07
  from "D:\www\yunjuke\application\vmall\views\goods_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e1f5f3adfef8_05192006',
  'file_dependency' => 
  array (
    '1c992b52fc8d3849c5f69da4b37e325090cf5073' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\goods_list.html',
      1 => 1507962005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink.html' => 1,
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_59e1f5f3adfef8_05192006 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1192359e1f5f3770fa2_42287153';
?>
<html lang="zh-cn" style="opacity: 1; font-size: 200px;" class="view6s">

    
    <head>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <title>商品列表</title>
        <link href="<?php echo TEMPLE;?>
css/home.css" rel="stylesheet" type="text/css">
        <style>
            .stockList {
                padding: 0 2%;
            }

            .small-block-grid-2 li {
                margin-bottom: 2%;
                margin-right: 2%;
                width: 49%;
                padding: 0;
            }

            .small-block-grid-2 li:nth-child(2n) {
                margin-right: 0;
                padding: 0;
            }

            .qk-pro-list .p-info {
                padding: 0;
                margin: .06rem .06rem 0 .06rem;
            }

            .p2_info {
                font-size: .13rem;
                padding: 0;
                margin: .08rem .08rem 0 .08rem;
                min-height: .32rem;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }

            .p2_flag {
                padding: 0;
                margin: .04rem .08rem .04rem .08rem;
                min-height: .32rem;
            }

            .sku-tag>img {
                display: block;
                width: .34rem;
                margin-left: .05rem;
            }

            .p2_cart {
                width: .28rem;
                height: .28rem;
                background: url('<?php echo TEMPLE;?>
images/stock_cart.png') no-repeat center;
                -webkit-background-size: cover;
                background-size: cover;
            }

            .qk-pro-list .sku-price {
                font-size: .13rem;
            }

            .qk-pro-list .tag-price {
                font-size: .11rem;
            }

            .loadingBox {
                margin-top: 0px;
            }

            .s-options {
                position: relative;
            }

            .s-options .s-items {
                padding: 0 20px;
                z-index: 2000;
                border-top: 1px solid #e5e5e5;
                border-bottom: 1px solid #e5e5e5;
                background-color: #fafafa;
            }

            .s-items li:nth-child(3):active {
                background: #f4f4f4;
            }

            .sl_brand_box {
                position: fixed;
                top: 85px;
                right: 0;
                left: 0;
                background: #fff;
                min-width: 200px;
                z-index: 2000;
                overflow-y: scroll;
                max-height: 90%;
            }

            .sl_brand_box li {
                line-height: 2.5em;
                border-bottom: 1px solid #F1F1F1;
            }

            .sl_brand_box li:last-child {
                border: none;
            }

            .sl_brand_box li a {
                display: block;
                padding-left: 10px;
            }

            .sl_brand_box li a:active {
                background: #f4f4f4;
            }

            #proListBox {
                padding-bottom: .4rem;
                padding-top: 2%;
				background: #f0f1f7;
            }

            #selectBrand.active {
                background: #f4f4f4;
                color: #f44336;
            }

            #selectBrand.active span {
                color: #f44336;
            }

            .insertShoppingCart {
                text-align: center;
                border-top: solid 1px #eee;
                line-height: 2.6;
                background: #fff;
            }

            .v3_shop_header {
                background-color: #fff;
            }

            .category_menu_txt,
            .category_menu .iconfont,
            .shop_chat .iconfon {
                color: #F44336;
            }

            .m_search_wrap:after {
                color: #666;
                font-size: 20px;
            }

            .v3_shop_header .mobile_search {
                margin-top: 7px;
            }

            .ub {
                display: -webkit-box !important;
                display: box !important;
                position: relative;
            }

            .ub-ac {
                -webkit-box-align: center;
                box-align: center;
            }

            .ub-ae {
                -webkit-box-align: end;
                box-align: end;
            }

            .ub-pc {
                -webkit-box-pack: center;
                box-pack: center;
            }

            .ub-pe {
                -webkit-box-pack: end;
                box-pack: end;
            }

            .ub-pj {
                -webkit-box-pack: justify;
                box-pack: justify;
            }

            .ub-ver {
                -webkit-box-orient: vertical;
                box-orient: vertical;
            }

            .ub-f1 {
                position: relative;
                -webkit-box-flex: 1;
                box-flex: 1;
            }

            .ut-s {
                text-overflow: ellipsis;
                overflow: hidden;
                white-space: nowrap;
                outline: 0 !important;
            }
            .searchBox .s-btn {
                position: absolute;
                right: 0;
                top: 0;
                background: url('<?php echo TEMPLE;?>
images/searchIcon-index.png') center center no-repeat;
                width: 34px;
                height: 34px;
                border: none;
                background-size: 18px 18px;
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
				width: 100%;
				height: 45px;
				border-bottom: 1px solid #C4C4C4;
				border-right: 1px solid #C4C4C4;
				line-height: 45px;
			}
			.siderbarmenu li{
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
			#catelist{
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
			.getpanel{
				position:fixed;
				top:0;
				bottom:0;
				left:0;
				right:0;
				background:#333;
				z-index:1000;
				opacity:0.7;
			}
			.searchfixed{
				position: fixed;
				top: 0;
				width: 100%;
				height: 100%;
				background: #fff;
				z-index: 10000;
			}
			#whole-store-search .cancel{
				padding: 7px 8px;
				border-radius: 3px;
				margin: 10px 5px 0 0;
				color: #FFF;
				background: red;
			}
			#in-store-search .cancel{
				padding: 7px 8px;
				border-radius: 3px;
				margin: 10px 2px 0 0;
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
			.goods_logo{
				position: absolute;
				top: 5px;
				left: 5px;
				width: 30%;
				height: 30px;
			}
			.logoimg{
				max-width: 100%;
				height: auto;
			}
			.m_search_wrap:after{
				content:"";
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
				padding: 5px 15px;background: #f0f2f5;color: #333;margin: 5px;border-radius: 50px;display: inline-block;
			}
			.searchistroylist{
				margin: 20px;
			}
			.searchistroylist span{
				padding: 5px 15px;background: #f0f2f5;color: #333;margin: 5px;border-radius: 50px;display: inline-block;
			}
			.v3_shop_header .mobile_search {
    			margin: 7px 10px 0;
			}
			.sl_brand_box {
				bottom: 0px;
			}
			#doSearch1{
				border-radius: 20px;background: #f0f2f5;padding-left: 30px;
				height: 35px;line-height: 35px;color: #333;
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
			#doSearch1:focus{
				color: #666!important;
			}
			.history-line{
				height: 15px;background: #f1f3f6;border-top: 1px solid #d7d7d7;
			}
        </style>

    <body ontouchstart>
        <input type="hidden" id="storeId" value="<?php echo $_smarty_tpl->tpl_vars['store_id']->value;?>
">
        <input type="hidden" id="totalCount" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['result']['total'];?>
">

        <!--S 主体内容 -->
        <div id="searchWrap" style="height: 45px;">
            <div class="wx_mod" modid="1000" id="m1000">
                <div class="bd">
                    <div class="v3_shop_bar">
                        <div class="v3_shop_header mui-flex">
                            <div class="category_menu cell fixed" id="categoryMenu">
                                <i class="iconfont category_menu_icon">&#xe600;</i> <span class="category_menu_txt">分类</span>
                            </div>
                            <div class="mobile_search cell">
                                <div class="m_search_wrap">
                                    <input type="text" id="doSearch" class="search_input" placeholder="搜索店内商品" style="background-color: #eaeaea;padding-left: 10px;">
                                    <img src="<?php echo TEMPLE;?>
images/search.png" alt="search" class="searchimg"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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
       
        <div class="getpanel" style="display:none""></div>
        <!-- / search box -->

        <section class="s-options" id="stockListNavTool">
            <ul class="s-items" style="top:45px;">
                <li>
                    <a href="javascript:;" id="selectOfftime" onclick="set_sort(this)" class="sort" data-order="off_time"><span>上架时间</span></a>
                </li>
                <li>
                    <a href="javascript:;" id="selectMarketprice" onclick="set_sort(this)" class="sort curr up" data-order="market_price"><span>价格<i></i></span></a>
                </li>
                <li>
                    <a href="javascript:;" id="selectBrand" data-brandid="" data-state=false><span>品牌</span></a>
                </li>
            </ul>
            <div>
                <ul class="sl_brand_box hide" id="brandItems" style="z-index:99999">
                
                
                </ul>
            </div>
        </section>
         <!-- /商品列表 -->
        <div id="proListBox">   </div>

        <!-- /底部导航 -->
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    
    
<!--    分类菜单-->


    <div id="catelist">
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
    </div>
    

	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery-2.1.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
		
		
		$("#categoryMenu").click(function(){
			$("#menu2 ul").css("display","none");
			$("#menu3 ul").css("display","none");
			$("#menu1 li").removeClass("clickli");
			$("#catelist").css("display","block");
		})
		$(".close").click(function(){
			$("#catelist").css("display","none");
		})
	var gettype	=1;
	var dataPage=1;
    var allowScroll=true;
   	var index_goods_name = "<?php echo $_smarty_tpl->tpl_vars['index_info']->value['index_goods_name'];?>
";
	var index_gc_id = "<?php echo $_smarty_tpl->tpl_vars['index_info']->value['index_gc_id'];?>
";
	
		if(index_goods_name.length>0){
			$("#doSearch1").val(index_goods_name);
	    }
    getAjaxData(dataPage,true,index_gc_id);
	    if(index_goods_name.length>0){
	    	$("#doSearch1").val("");
	    }
      
    var allowScrollstate=<?php if (empty($_smarty_tpl->tpl_vars['data']->value['result']['all'])) {?>''<?php } else {
echo $_smarty_tpl->tpl_vars['data']->value['result']['all'];
}?>;
    if(allowScrollstate){
        allowScroll = false;
    }

    $(function(){
    	var gc_id = '';
        $.getJSON("ajax_get_brand_list",function(data){
        	var htmlStr = '<li class="ui-list-item" data-brandid="all">'+
                   '<a href="javascript:;" class="ui-list-nav">全部品牌</a>'+
                '</li>';
            //var htmlStr = "";
            if(data.result.length>0){
                $.each(data.result.info,function(k,v){
                     htmlStr +=  '<li class="ui-list-item" data-brandid="'+v.brand_id+'" data-brandname="'+v.brand_name+'">'+
                        '<a href="javascript:;" class="ui-list-nav">'+v.brand_name+'</a>'+
                        '</li>';
                }) 
            }
            $("#brandItems").html(htmlStr);
        })
        
        
        /************************/
        
        
        $("#selectBrand").click(function(){
        	$("#selectOfftime").attr('class',"");
        	$("#selectOfftime").addClass('sort');
        	$("#selectMarketprice").attr('class',"");
        	$("#selectMarketprice").addClass('sort');
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $("#brandItems").addClass('hide');
                $(".getpanel").css("display","none");
            }else{
                $(this).addClass('active');
                $("#brandItems").removeClass('hide');
                $(".getpanel").css("display","block");   
            }
        })
        $("#brandItems").on('click','.ui-list-nav',function(){
        	$(".getpanel").css("display","none");
            var brand_id = $(this).parent('li').data('brandid');
            if(!!brand_id){
                $("#selectBrand").data('brandid',brand_id);
                $("#selectBrand").data('state',true);
            }else{
                $("#selectBrand").data('brandid','');
                $("#selectBrand").data('state',false);
            }
            //$("#selectBrand").removeClass('active');
            $("#brandItems").addClass('hide');
            dataPage=1;
            allowScroll=true;
            getAjaxData(dataPage,true,"");
        })
        
//		弹出搜索框
		
		$("#doSearch").focus(function(){
			$("#sc1").show();
			$("#sc2").show();
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
		  		dataPage=1;
	            allowScroll=true;
                gettype = 2;
	            getAjaxData(dataPage,true,"");
				var serinfo = $("#doSearch1").val();
				setTimeout(function(){
					$(".searchfixed").hide()
					$(".history").after('<span>'+serinfo+'</span>');
					$("#doSearch1").val("");
				},1000);
		})
//     	店内搜索
       	$("#in-store-search").click(function(e){
		  		dataPage=1;
	            allowScroll=true;
                gettype = 1;
	            getAjaxData(dataPage,true,"");
				var serinfo = $("#doSearch1").val();
				setTimeout(function(){
					$(".searchfixed").hide()
					$(".history").after('<span>'+serinfo+'</span>');
					$("#doSearch1").val("");
				},1000);
		})


    
		
		$(".clearseahistorylist").click(function(){
			$(".searchistroylist span").remove();
			$("#sc1").show();
			$("#sc2").hide();
		})
		
		$("body").on('touchstart','.searchfixed span',function(){
   		$("#doSearch1").val($(this).html())
   		})
    
    })
    
    
//弹出搜索框结束
    
    
    function getAjaxData(idx,clear,gc_id){
        if(allowScroll){
            allowScroll = false;
            $('#loadingWrap').show();
            
            var brand_id = 0;
                goods_name = $("#doSearch1").val();
            if($("#selectBrand").data('state')){
                brand_id = $("#selectBrand").data('brandid');
            }
            if(!brand_id){
                var sort_name =  $("#stockListNavTool").find('li .curr').data('order');
                var sort_types = $("#stockListNavTool").find('li .curr').attr('class');
                var sort_type = 'desc';
                if(sort_types.indexOf("up") > 0){
                    sort_type = 'asc';
                }
            }
            if(!gc_id){
            	gc_id = '';
            }
            $.getJSON("index?op=get_list&page="+idx+"&length="+10+"&sort_name="+sort_name+"&sort_type="+sort_type+"&brand_id="+brand_id+"&gc_id="+gc_id+"&goods_name="+goods_name+"&type="+gettype,function(data){
                if(data.state==true){
	                	if(idx==1){
	                       	var htmls = '<div class="stockList qk-pro-list" id="stockListqk"><ul class="small-block-grid-2" id="goodsListItem"></ul></div>'+
			                 '<div id="loadingWrap"><div class="tc p20 c-8">';
			                 if(data.result.all){
			                	 htmls +="没有更多了"; 
			                 }else{
			                	 htmls +='<img src="<?php echo TEMPLE;?>
images/loading32x32.gif" width="20">'; 
			                 }
				        	 htmls+='</div></div>';
				      		$('#proListBox').html(htmls);
                	    }
                	
     
                    if(data.result.length>0){
                    	//console.log(data.result.info)
                        var htmlStr = '',vgoods_image="";
                        $.each(data.result.info,function(k,v){
                        	console.log(data.result.info)
                        	var vgoods_a_id="",vsize="",vgoods_ea_id="";
                        	if(v.goods_a_id){
                        		vgoods_a_id = v.goods_a_id;
                        	}
                        	if(v.goods_ea_id){
                        		vgoods_ea_id = v.goods_ea_id;
                        	}
                        	if(v.size){
                        		vsize = v.size;
                        	}
                        	if(v.goods_image){
                        		vgoods_image = "<?php echo GOODIMAGE;?>
"+v.goods_image;
                        	}else{
                        		vgoods_image = "<?php echo DEFAULTIMAGE;?>
"+"<?php echo $_smarty_tpl->tpl_vars['config_images']->value['goods_image'];?>
";
                        	}
                             htmlStr += '<li style="border: 1px solid #efefef;">'+
                            '<a href="<?php echo base_url();?>
vmall.php/goods/goods_info?store_id='+v.ssa_store_id+'&goods_id='+v.goods_id+'&goods_ea_id='+vgoods_ea_id+'" data-id="'+v.goods_id+'">'+
                            '<div class="p-img" style="background-image:url('+vgoods_image+')">';
                            if(v.goods_tag!==null && v.goods_tag!==''){
                                var goods_tag = '特价';
                                if(v.goods_tag=='1'){
                                    goods_tag='新品';
                                }else if(v.goods_tag=='2'){
                                    goods_tag='推荐';
                                }
                                 htmlStr +='<span class="p-tag">'+goods_tag+'</span>';
                            }
                            var ous_type = "<?php if (isset($_smarty_tpl->tpl_vars['storeInfo']->value['ous_type'])) {
echo $_smarty_tpl->tpl_vars['storeInfo']->value['ous_type'];
}?>";
                            var goods_true_price  = v.uec_stocks_price;
                            if(ous_type==1){
                            	  htmlStr+='<div class="goods_logo"><img src="<?php echo TEMPLE;?>
images/NIKElogo.png" class="logoimg"></div>';
                            	  goods_true_price = v.stocks_price;
                            }
                            htmlStr +='</div><div class="p2_info">'+v.goods_name+'</div>'+
                            '<div class="ub ub-ac p2_flag">'+
                                '<div class="ub-f1" style="min-height: .37rem;">'+
                                    '<div class="ub ub-ac" style="padding-bottom: .04rem;"><span class="sku-price" style="font-size: 15px">¥'+goods_true_price+'</span>';
                        htmlStr +='<span class="tag-price" style="margin-left: 10px;"><span class="yen">¥</span>'+v.stocks_marketprice+'</span></div></div>'+
                            '</div>'+
                        '</a>'+
                        '</li>';
                        })
                        if(idx==1){
                            $('#goodsListItem').html(htmlStr);
                        }else{
                            $('#goodsListItem').append(htmlStr);
                        }
                    }else{
                        if(clear){
                        	$('#proListBox').html("");
                            $('#proListBox').html('<section class="noResult tc"><span>查询结果为空</span></section>');
                            gc_id = "";
                        }
                    }
                    if(data.result.all){
                    	$('#loadingWrap div').html('没有更多了');
                    }
                    allowScroll = data.result.all ? false : true;
                }else{
                	$('#proListBox').html("");
                    $('#proListBox').html('<section class="noResult tc"><span>查询结果为空</span></section>');
                }

            });
        }
    }
    scrollToLoadMore({
        callback:function(){
            getAjaxData(dataPage,true);
        }
    });
    
function scrollToLoadMore(option){
    var wHeight = $(window).height();
    window.onscroll = function(){
        var sHeight = $("body").scrollTop(), cHeight = $(document).height();
        if(sHeight >= cHeight-wHeight-(option.distance ? option.distance : 10)){
            if($(".loading-bottom").length > 0) {
                return false;
            }else{
                dataPage += (option.length ? option.length : 1);
                option.callback();
            }
        }
    }
}
function set_sort(obj){
	    $("#selectBrand").data('brandid','');
        $("#selectBrand").data('state',false);
		$(".getpanel").css("display","none");
		$("#selectBrand").removeClass('active');
	if($("#brandItems").hasClass('hide') ){
		
	}else{
		$("#brandItems").addClass('hide');
	}
    dataPage=1;
    allowScroll=true;
    if($(obj).hasClass('curr')){
        if($(obj).hasClass('down')){
            $(obj).attr('class','sort curr up');
        }else{
            $(obj).attr('class','sort curr down');
        }
        getAjaxData(dataPage,true);
    }else{
        $("#stockListNavTool").find('li .sort').attr('class','sort');
        $(obj).attr('class','sort curr down');
    }
    getAjaxData(dataPage,true);
}





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
		$("#catelist").css("display","none");
		allowScroll=true;
		getAjaxData(dataPage,true,gcid);
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
		$("#catelist").css("display","none");
		allowScroll=true;
		getAjaxData(dataPage,true,gcid);
	})




<?php echo '</script'; ?>
>
</body>
</html><?php }
}
