<?php
/* Smarty version 3.1.29, created on 2017-10-17 14:43:51
  from "D:\www\yunjuke\application\vmall\views\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e5a6a76e0b08_32719162',
  'file_dependency' => 
  array (
    '1d813e489e097c31dffeee26213afcbd60904996' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\index.html',
      1 => 1507960604,
      2 => 'file',
    ),
    '5cea575055325e574f9e509e31fe0032e5018982' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink.html',
      1 => 1505370736,
      2 => 'file',
    ),
    '7d81061d9ca292f05d706f6c44298f7701559782' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\footer.html',
      1 => 1498791059,
      2 => 'file',
    ),
    '991651eed1833929df6c5f181b5bcb296ae38019' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\Flink.html',
      1 => 1493366424,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59e5a6a76e0b08_32719162 ($_smarty_tpl) {
?>
<!DOCTYPE html style="opacity: 1; font-size: 109.375px;">
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="full-screen" content="yes">
<link href="favicon.ico" rel="shortcut icon" />
<link rel="Shortcut Icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico" />
<meta content="成都云聚客科技有限公司" name="author" />
<meta content="Copyright 1999-2017. www.jukeyunduan.cn . All Rights Reserved." name="copyright" />
<meta name="application-name" content="云聚客" />
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="shortcut icon" href="http://[::1]/yunjuke//favicon.ico">
<link href="http://[::1]/yunjuke/application/vmall/views/css/weui.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/vmall/views/css/style.css" rel="stylesheet" type="text/css">

<script>
  (function(doc, win) {
    // 移动端REM自适应
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
          var clientWidth=docEl.clientWidth||320;
          var docCls = docEl.classList;
          var width = clientWidth < 320 ? 320 : clientWidth > 640 ? 640 : clientWidth;
          docEl.style.fontSize = 100 * (width / 320) + 'px';
          docEl.style.opacity=1;

          // 添加屏幕标识，便于文字调整
          if(375 <= clientWidth && clientWidth < 414){
            docCls.add('view6');
          }else if(414 <= clientWidth){
            docCls.add('view6s');
          }else{
            docCls.remove('view6');
            docCls.remove('view6s');
          }
        };
    docEl.style.opacity=0;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
    // IOS8下1px线条改为0.5px
    if (/iP(hone|od|ad)/.test(navigator.userAgent)) {
        var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/),
            version = parseInt(v[1], 10);
        if(version >= 8){
            document.documentElement.classList.add('hairlines');
        }
    }
    })(document, window);








</script>
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
		<link href="http://[::1]/yunjuke/application/vmall/views/css/home.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/swiper-3.0.7.min.js"></script>
		<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/qrcode.min.js"></script>
		<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/iscroll-lite.min.js"></script>
		<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
		<link rel="stylesheet" href="http://[::1]/yunjuke/application/vmall/views/css/weui1.css">
	</head>

	<body>
		<!--S 主体内容 -->
		
					<div class="wx_mod" modid="1000" id="m1000">
            				<div class="bd">
            					<div class="v3_shop_bar">
            						<div class="v3_shop_header mui-flex" style="background: red;">
            							<div class="category_menu cell fixed" id="categoryMenu" style="color: #fff;">
            								<i class="iconfont category_menu_icon">&#xe600;</i> <span class="category_menu_txt">分类</span>
            							</div>
            							<div class="mobile_search cell" style="margin: 7px 10px 0!important;">
            								<div class="m_search_wrap">
            									<input type="text" id="doSearch" class="search_input" placeholder="搜索店内商品" style="background: #fff;">
            									<img src="http://[::1]/yunjuke/application/vmall/views/images/search.png" alt="search" class="searchimg"/>
            								</div>
            							</div>
            						</div>
            					</div>
            				</div>
            			</div><div class="wx_mod bde4-b" modid="1012" id="m1012" style="height: .64rem;border:none">
         	                  <div class="bd" style="display: block;">
             	                <div class="ui-table" style="table-layout: fixed;">
                 	                <div class="cell" style="width: .64rem;">
                 	                  <img class="shop-logo"  src="http://[::1]/yunjuke/data/images/default_tb_image.jpg" style="width: .44rem;margin: .1rem;">
                 	                </div>
                 	                <div class="cell" style="width: 2.06rem;">
                 	                  <h2 class="store-name-box">BE18品牌童装</h2>
                 	                </div>
                 	                <div class="cell ous_ewm attentions" style="width: .46rem;">
                 	                  <div class="info-r" id="attention" data-qrcode="http://[::1]/yunjuke/./data/two_code/qrcode_61.png" style="text-align: center;">
                 	                      <i class="iconfont shop-qrcode" style="font-size: .24rem;">&#xe61b;</i>
                 	                  </div>
                 	                </div>
             	                </div>
         	                  </div>
         	                </div><div class="wx_mod bde4-b guide_container" modid="1012">
                                    <div class="bd guide_content" style="display: block;">
                                        <p class="guide_title">联系导购</p>
                                        <div class="ui-table" style="table-layout: fixed;">
                                            <div class="cell guides" style="width: 5rem;"><a href ="http://[::1]/yunjuke/vmall.php/store/shopping_guide_chat?spg_id=34"><span class="store-name-box"><img src="http://[::1]/yunjuke/application/vmall/views/images/guide_women.png">李正鹏</span></a><a href ="http://[::1]/yunjuke/vmall.php/store/shopping_guide_chat?spg_id=46"><span class="store-name-box"><img src="http://[::1]/yunjuke/application/vmall/views/images/guide_women.png">xinxinge</span></a><a href ="http://[::1]/yunjuke/vmall.php/store/shopping_guide_chat?spg_id=47"><span class="store-name-box"><img src="http://[::1]/yunjuke/application/vmall/views/images/guide_women.png">lg</span></a>            </div>
                                            <div class="cell ous_ewm attentions" style="width: .46rem;line-height: .3rem;">
                                            <a href ="http://[::1]/yunjuke/vmall.php/store/shopping_guide_list?storeId=61"><span class="iconfont" style="font-size:.14rem;font-weight:500">&#xe604;</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div><div class="wx_mod" modtitle="图片轮播" modid="1001" id="m1001">
                                    <div class="bd">
                                        <div class="swiper-container" style="height: 160px;">
                                            <div class="swiper-wrapper">
                                        <a href="http://www.jukeyunduan.com/vmall.php/index" class="swiper-slide">
                                          <div class="shop_slider_img" style="height:160px; background-image:url(http://[::1]/yunjuke/application/vmall/views/images/2017090911073959b35afb13e6b_storeDecoration.jpg)"></div>
                                        </a>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
    	                     </div><div class="wx_mod" modtitle="两栏广告" modid="1003" id="m1003">
    	                    <div class="title" style="display: none;padding: 10px;">两栏广告</div>
                          <div class="bd">
                            <div class="shop_mod_pic shop_mod_pic_1" data-lazyload="true"><a href="http://www.jukeyunduan.com/vmall.php/index" title="图片" class="url"><img alt="图片" class="pp_init_img" src="http://[::1]/yunjuke/application/vmall/views/images/2017090911111459b35bd2dca1c_storeDecoration.jpg"></a><a href="http://www.jukeyunduan.com/vmall.php/index" title="图片" class="url"><img alt="图片" class="pp_init_img" src="http://[::1]/yunjuke/application/vmall/views/images/2017090911112059b35bd84084b_storeDecoration.jpg"></a></div>
                          </div>
    	                </div> <div class="wx_mod" modtitle="自定义代码" modid="1008" id="m1008">
                                    <div class="bd">
                                        <div class="shop_mod_html">
                                            <p><img src="/data/UEditor/upload/image/20170909/1504926694577968.jpg" title="1504926694577968.jpg" _src="/data/UEditor/upload/image/20170909/1504926694577968.jpg" alt="自定义导航.jpg"></p>
                                        </div>
                                    </div>
                                 </div><div class="wx_mod" modtitle="通栏广告" modid="1002" id="m1002">
                            <div class="bd">
                                <div class="shop_mod_pic" data-lazyload="true">
                                    <a class="url" href="http://www.jukeyunduan.com/vmall.php/index">
                                        <img alt="图片" class="pp_init_img" data-src="http://[::1]/yunjuke/application/vmall/views/images/2017090911134659b35c6ac034f_storeDecoration.jpg" src="http://[::1]/yunjuke/application/vmall/views/images/2017090911134659b35c6ac034f_storeDecoration.jpg">
                                    </a>
                                </div>
                            </div>
        	                </div><div class="wx_mod sortable-item" modtitle="掌柜推荐" modid="1004" id="m1004">
                            <div class="bd m_recommend_bdm1004-3e6c" id="m_recommend_bdm1004-3e6c" style="display: block;">
                            <h2 class="shop_mod_tit bde4-b">掌柜推荐 <a href="http://[::1]/yunjuke/vmall.php/goods/index">更多<i class="iconfont">&#xe604;</i></a></h2>
                            <div class="wx_itemlist" data-lazyload="true">
                                <div class="shop_mod_pic_1"><div class="hproduct">
                            			<p class="cover">
                            				
                            				<a href="http://[::1]/yunjuke/vmall.php/goods/goods_info?store_id=61&goods_id=33700"   style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/2017/10/11/1507685307782092827557145014042.jpg)"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">abckids男童鞋正品17年夏款小童超轻单网面透气运动跑鞋</a></p>
                            			<p class="prices"><strong><em>￥108.00</em><del>¥199.00</del></strong>
                            			</p>
                            		</div><div class="hproduct">
                            			<p class="cover">
                            				
                            				<a href="http://[::1]/yunjuke/vmall.php/goods/goods_info?store_id=61&goods_id=33804"   style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/2017/10/11/1507685396105092956557237574719.SS2)"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">abckids童鞋春秋双色铆钉男童中童防滑软底时尚休闲儿童正品皮鞋</a></p>
                            			<p class="prices"><strong><em>￥138.00</em><del>¥259.00</del></strong>
                            			</p>
                            		</div><div class="hproduct">
                            			<p class="cover">
                            				
                            				<a href="http://[::1]/yunjuke/vmall.php/goods/goods_info?store_id=61&goods_id=33704"   style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/2017/10/11/1507685309378092829557081750802.jpg)"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">abckids童鞋2017秋季新品女童运动鞋跑步鞋儿童小童皮面</a></p>
                            			<p class="prices"><strong><em>￥118.00</em><del>¥219.00</del></strong>
                            			</p>
                            		</div><div class="hproduct">
                            			<p class="cover">
                            				
                            				<a href="http://[::1]/yunjuke/vmall.php/goods/goods_info?store_id=61&goods_id=33754"   style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/2017/10/11/1507685343870092903556810532312.jpg)"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">abckids童鞋公主鞋2017秋新款女孩宝宝方口皮鞋蝴蝶结潮</a></p>
                            			<p class="prices"><strong><em>￥108.00</em><del>¥199.00</del></strong>
                            			</p>
                            		</div><div class="hproduct">
                            			<p class="cover">
                            				
                            				<a href="http://[::1]/yunjuke/vmall.php/goods/goods_info?store_id=61&goods_id=33807"   style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/2017/10/11/1507685399467092959557193651035.jpg)"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">新品abckids正品女童中童个性蝴蝶结时尚舒适软底方口皮鞋</a></p>
                            			<p class="prices"><strong><em>￥118.00</em><del>¥219.00</del></strong>
                            			</p>
                            		</div><div class="hproduct">
                            			<p class="cover">
                            				
                            				<a href="http://[::1]/yunjuke/vmall.php/goods/goods_info?store_id=61&goods_id=33809"   style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/2017/10/11/1507685401932093001557157069869.SS2)"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">abckids春季新款男童网面鞋宝宝卡通学步透气超轻跑步鞋</a></p>
                            			<p class="prices"><strong><em>￥98.00</em><del>¥179.00</del></strong>
                            			</p>
                            		</div><div class="hproduct">
                            			<p class="cover">
                            				
                            				<a href="http://[::1]/yunjuke/vmall.php/goods/goods_info?store_id=61&goods_id=33810"   style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/2017/10/11/1507685403609093003557140491728.jpg)"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">abckids童鞋2017秋季新款女童小童跑步鞋超轻轻便防滑运动鞋</a></p>
                            			<p class="prices"><strong><em>￥128.00</em><del>¥239.00</del></strong>
                            			</p>
                            		</div><div class="hproduct">
                            			<p class="cover">
                            				
                            				<a href="http://[::1]/yunjuke/vmall.php/goods/goods_info?store_id=61&goods_id=33812"   style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/2017/10/11/1507685405169093005559382563938.jpg)"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">abc童鞋 2017冬款男童小童运动鞋时尚火焰造型防滑加厚保暖跑步鞋</a></p>
                            			<p class="prices"><strong><em>￥78.00</em><del>¥78.00</del></strong>
                            			</p>
                            		</div><div class="hproduct">
                            			<p class="cover">
                            				
                            				<a href="http://[::1]/yunjuke/vmall.php/goods/goods_info?store_id=61&goods_id=33760"   style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/2017/10/11/1507685351385092911557647073823.jpg)"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">ABC童鞋 女童运动鞋儿童春秋新款加棉加厚高帮复古跑步鞋休闲户外</a></p>
                            			<p class="prices"><strong><em>￥159.00</em><del>¥299.00</del></strong>
                            			</p>
                            		</div><div class="hproduct">
                            			<p class="cover">
                            				
                            				<a href="http://[::1]/yunjuke/vmall.php/goods/goods_info?store_id=61&goods_id=33710"   style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/2017/10/11/1507685313138092833559264484635.jpg)"></a>
                            			</p>
                            			<p class="fn"><a href="javascript:;">abc童鞋女童皮鞋17冬款防滑耐磨保暖满帮时尚拼色大棉板鞋包邮</a></p>
                            			<p class="prices"><strong><em>￥98.00</em><del>¥98.00</del></strong>
                            			</p>
                            		</div></div></div></div></div>
						<div id="listLoading" class="list-loading-box c-8 tc pt10 pb10" style="display: block;">
					<a href="http://[::1]/yunjuke/vmall.php/goods/index" style="display:block;">查看所有商品</a>
				</div>
				<div class="mod_footer" id="common_footer"></div>
		
        <div id="listLoading" class="list-loading-box c-8 tc pt10 pb10" style="display: block;"></div>
		
		<!-- /底部导航 -->
		<footer class="store_footer_new bde4-b foot_new_cart">
  <div class="ub ub-ac">
    <a id="home" style="color: #ff4436 !important;" class="ub-f1 ub ub-ver foot_new_sin home"href="http://[::1]/yunjuke/vmall.php/index/index">
      <i class="iconfont" style="font-size: 21px;">&#xe601;</i>
      <div class=""  >首页</div>
    </a>
    <a id="stock"  class="ub-f1 ub ub-ver foot_new_sin stock" href="http://[::1]/yunjuke/vmall.php/goods/index">
      <i class="iconfont" style="font-size: 21px;">&#xe67b;</i>
      <div class=""  >商品</div>
    </a>
    <a id="cart" class="ub-f1 ub ub-ver foot_new_sin cart"  href="http://[::1]/yunjuke/vmall.php/user/user_shopping_cart">
      <i class="iconfont" style="font-size: 21px;">&#xe635; <span class="weui-badge" id="userCartTotal"style="position: absolute;top: -.4em;">2</span></i>
      <div class="">购物车</div>
    </a>
    <a id="customer" class="ub-f1 ub ub-ver foot_new_sin cus" data-suid="" href="http://[::1]/yunjuke/vmall.php/user/">
      <i class="iconfont" style="font-size: 21px;">&#xe653;</i>
      <div class="">个人中心</div>
    </a>
  </div>
</footer>
    

<!--
判断底部菜单栏
<script>
	var ulr = location.href;
	var t1 = ulr.split("?")[1];
	var t2 = t1.split("=")[1];
	
	switch(t2)
	{
		case 1:
			$("#home").css("color","red !important");
			break;
		case 2:
			$("#stock").css("color","red !important");
			break;
		case 3:
			$("#cart").css("color","red !important");
			break;
		case 4:
			$("#custorm").css("color","red !important");
			break;
	}
</script>-->


			
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
										     				         <span>T恤</span>
				     				         <span>上衣</span>
				     				         <span>裤子</span>
				     				         <span>运动鞋</span>
				     				         <span>帽子</span>
				     				         <span>连衣裙</span>
				     				 			</div>
      		<div class="searchfixed-content" id="sc1">
      			<div class="searchfixed-content-icon">
      				<img src="http://[::1]/yunjuke/application/vmall/views/images/searchIcon.png" alt="" style="width: 30px;height: 30px;">
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
    		<p><img src="http://[::1]/yunjuke/application/vmall/views/images/X.png" alt="" style="display:width: 15px;height: 15px;padding:0 5px 3px 0">关闭</p>
    	</div>
    	<div class="sidebarMenu">
			<div class="menu-box" id="menu1" style="margin-left: 0%;width: 34%;">
				<ul class="siderbarmenu">
																		<li tarid="siderbarmenu2-100110" data-id="100110">童衣</li>
													<li tarid="siderbarmenu2-100111" data-id="100111">童裤</li>
													<li tarid="siderbarmenu2-100112" data-id="100112">童鞋</li>
													<li tarid="siderbarmenu2-100113" data-id="100113">儿童配件</li>
													<li tarid="siderbarmenu2-100132" data-id="100132">上衣</li>
													<li tarid="siderbarmenu2-100133" data-id="100133">裤子</li>
													<li tarid="siderbarmenu2-100134" data-id="100134">鞋子</li>
															</ul>
			</div>
    		<div class="menu-box" id="menu2" style="display: none">
    		    				<ul class="siderbarmenu1" id="siderbarmenu2-100110">
				    				    <li tarid="siderbarmenutwo"  data-id="100110" son_num="0" >全部</li>
				    					<li tarid="siderbarmenu3-100114" data-id="100114">儿童T恤</li>
										<li tarid="siderbarmenu3-100115" data-id="100115">儿童外套</li>
										<li tarid="siderbarmenu3-100116" data-id="100116">儿童衬衫</li>
										<li tarid="siderbarmenu3-100117" data-id="100117">儿童裙子</li>
										<li tarid="siderbarmenu3-100118" data-id="100118">儿童背心</li>
										<li tarid="siderbarmenu3-100137" data-id="100137">儿童哈衣</li>
										<li tarid="siderbarmenu3-100138" data-id="100138">儿童家居服</li>
										<li tarid="siderbarmenu3-100139" data-id="100139">儿童羽绒服</li>
										<li tarid="siderbarmenu3-100140" data-id="100140">儿童棉服</li>
										<li tarid="siderbarmenu3-100141" data-id="100141">儿童针织衫</li>
										<li tarid="siderbarmenu3-100142" data-id="100142">儿童套装</li>
														</ul>
								<ul class="siderbarmenu1" id="siderbarmenu2-100111">
				    				    <li tarid="siderbarmenutwo"  data-id="100111" son_num="0" >全部</li>
				    					<li tarid="siderbarmenu3-100119" data-id="100119">儿童长裤</li>
										<li tarid="siderbarmenu3-100120" data-id="100120">儿童短裤</li>
										<li tarid="siderbarmenu3-100121" data-id="100121">儿童打底裤</li>
														</ul>
								<ul class="siderbarmenu1" id="siderbarmenu2-100112">
				    				    <li tarid="siderbarmenutwo"  data-id="100112" son_num="0" >全部</li>
				    					<li tarid="siderbarmenu3-100122" data-id="100122">儿童运动鞋</li>
										<li tarid="siderbarmenu3-100123" data-id="100123">儿童帆布鞋</li>
										<li tarid="siderbarmenu3-100124" data-id="100124">儿童皮鞋</li>
										<li tarid="siderbarmenu3-100125" data-id="100125">儿童凉鞋</li>
										<li tarid="siderbarmenu3-100126" data-id="100126">儿童雨鞋</li>
										<li tarid="siderbarmenu3-100127" data-id="100127">学步鞋</li>
														</ul>
								<ul class="siderbarmenu1" id="siderbarmenu2-100113">
				    				    <li tarid="siderbarmenutwo"  data-id="100113" son_num="0" >全部</li>
				    					<li tarid="siderbarmenu3-100128" data-id="100128">儿童帽子</li>
										<li tarid="siderbarmenu3-100129" data-id="100129">儿童袜子</li>
										<li tarid="siderbarmenu3-100130" data-id="100130">儿童书包</li>
										<li tarid="siderbarmenu3-100131" data-id="100131">其他配饰</li>
														</ul>
								<ul class="siderbarmenu1" id="siderbarmenu2-100132">
				    				    <li tarid="siderbarmenutwo"  data-id="100132" son_num="0" >全部</li>
				    					<li tarid="siderbarmenu3-100135" data-id="100135">羽绒服</li>
										<li tarid="siderbarmenu3-100136" data-id="100136">大衣</li>
														</ul>
								<ul class="siderbarmenu1" id="siderbarmenu2-100133">
				    				</ul>
								<ul class="siderbarmenu1" id="siderbarmenu2-100134">
				    				</ul>
							</div>
    		<!-- <div class="menu-box" id="menu3" style="display: none">
    		        		    
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 496</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 496<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>			        		    
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 496</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 496<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 498</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 498<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 511</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 511<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: name</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
							    								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 511</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 511<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: name</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
							    								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 511</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 511<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: name</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
							    								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>							    			        		    
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 496</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 496<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 498</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 498<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 511</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 511<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: name</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
							    								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 511</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 511<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: name</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
							    								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 511</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 511<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: name</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
							    								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>							    			        		    
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 496</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 496<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>			        		    
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 496</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 496<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 498</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 498<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 511</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 511<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: name</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
							    								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 511</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 511<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: name</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
							    								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>				
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 511</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 511<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>1</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>�</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2</li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'name'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
				   
				<ul class="siderbarmenu1" id="siderbarmenu3-
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 522</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 522<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2">
				    <li tarid="siderbarmenuhtree"  data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 524</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 524<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>2" son_num="0">全部</li>
					<li data-id="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 526</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 526<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: name</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 527</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 527<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div></li>
				</ul>
							    								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>								
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 509</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 509<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>							    			        		    
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 496</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 496<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 496</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 496<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>			        		    
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Illegal string offset 'id'</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 496</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 496<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Uninitialized string offset: 0</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 496</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 496<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>			        		    
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: id</p>
<p>Filename: templates_c/1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php</p>
<p>Line Number: 496</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\1d813e489e097c31dffeee26213afcbd60904996_0.file.index.html.cache.php<br />
			Line: 496<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Index.php<br />
			Line: 725<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>			    			</div> -->
    	</div>
    </div>
			

	<div class="ui-mask active" data-ui-mask="" style="width: 100%; height: 100%; left: 0px; top: 0px; background-color: rgba(0, 0, 0, 0.4); display: none;"></div>
	<!-- B 二维码 -->
	<div class="js_dialog" id="qrCodeWrap" style="display:none;">
		<div class="weui-mask cancel2"></div>
		<div class="weui-dialog">
			
			<div class="weui-dialog__bd">
			  				<div style="width: 80%;margin: 0 auto"><img src="http://[::1]/yunjuke/./data/two_code/qrcode_61.png" alt="wei-log" style="max-width: 100%;height: auto"></div>
				<p style="color: #99999c">长按二维码关注</p>
							</div>
		</div>
	</div>

	<!-- E 二维码 -->
	
<script type="text/javascript" charset="utf-8"  src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/swiper-3.0.7.min.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/iscroll-lite.min.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/qrcode.min.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/mall.jk.js"></script>
<script type="text/javascript" charset="utf-8"  src="http://[::1]/yunjuke/application/vmall/views/js/base.js"></script>


	
<script type="text/javascript">
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
			window.location.href="http://[::1]/yunjuke/vmall.php/goods/";
		}
		var gcid = $(this).attr("data-id");
		if($("#"+tarid).children().length>0){
			$("#"+tarid).css("display","block");
		}else{
			window.location.href="http://[::1]/yunjuke/vmall.php/goods/index?gc_id="+gcid;
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
		window.location.href="http://[::1]/yunjuke/vmall.php/goods/index?gc_id="+gcid;
	})
	
/* 	$("#menu3 li").click(function(){
		$("#menu3 li").removeClass("clickli1");
		$(this).addClass("clickli1");
		var gcid = $(this).attr("data-id");
		window.location.href="http://[::1]/yunjuke/vmall.php/goods/index?gc_id="+gcid;
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
				window.location.href="http://[::1]/yunjuke/vmall.php/goods/index?type=2&goods_name="+serinfo;
				setTimeout(function(){
					$(".searchfixed").hide()
					$(".searchistroylist").append('<span>'+serinfo+'</span>');
					$("#doSearch1").val("");
				},1000);
		})
//     	店内搜索
       	$("#in-store-search").click(function(e){
       		var serinfo = $("#doSearch1").val();
			window.location.href="http://[::1]/yunjuke/vmall.php/goods/index?type=1&goods_name="+serinfo;
	            
				
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
				</script>

	</body>

</html><?php }
}
