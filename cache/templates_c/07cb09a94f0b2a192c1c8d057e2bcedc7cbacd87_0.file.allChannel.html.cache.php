<?php
/* Smarty version 3.1.29, created on 2017-06-14 16:10:44
  from "D:\www\yunjuke\application\index\views\allChannel.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5940ef843ca6e9_58034296',
  'file_dependency' => 
  array (
    '07cb09a94f0b2a192c1c8d057e2bcedc7cbacd87' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\index\\views\\allChannel.html',
      1 => 1497408240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/header.html' => 1,
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_5940ef843ca6e9_58034296 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '318355940ef842e3f33_00957583';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<section class="all-banner">
		<div class="clear"></div>
		<div class="banner-title">
			<p>线上多屏零售</p>
			<div class="topleft"></div>
			<div class="bottomright"></div>
			<p>线下门店管理</p>
		</div>
	</section>


	<section class="content-allchannel">
		<div class="main-content">
			<p class="pro-title">全渠道运营</p>
			<div class="channel-img"><img src="<?php echo TEMPLE;?>
images/channel-img.png" alt="" class="img-responsive" /></div>
			<div class="channel-content">
				<div class="text-center">
					<p class="channel-title">线上</p>
					<p>多屏多触点友好接触客户<br>霸占客户碎片化时间<br>优惠券，爆款，打折，新品信息推送<br>让品牌绑架你的目标用户</p>
				</div>
				<div class="text-center">
					<p class="channel-title">线下</p>
					<p>发挥门店地理位置优势<br>发挥导购员接触用户的优势，利用<br>门店买前体验买后提货/售后等机会<br>将用户圈到线上，维关怀</p>
				</div>
			</div>
		</div>
	</section>
	<section class="case-title">
		<p>客户案例</p>
	</section>
	<section class="case">
		<div class="main-content">
			<div class="pro-title">Before Eihgteen品牌童装</div>
			<div class="case-content">
				<div class="case-left">
					<img src="<?php echo TEMPLE;?>
images/be.png" alt="" />
					<div class="case-left-text">
						<p>BE童装</p>
						<p>专注于孩子的快乐</p>
					</div>
				</div>
				<p class="case-right">Before Eihgteen品牌童装初始，妖精的口袋受限于第三方平
					台的管理限制<br>，数据及客户信息均存放于运营方服务器，用户忠诚度缺失，难以建立品
					牌<br>影响力。在打造 B2C独立品牌官网 及 移动端商城 的基础上，妖精的口袋将<br>淘宝、京
					东等电商大平台及全网营销的客户归集到 统一后台，再配合 CRM <br>客户管理等工具，逐
					步建立客户口碑传播效应和品牌忠诚度。</p>
			</div>
		</div>
	</section>
	<div class="clear"></div>
	<div class="returntop"><img src="<?php echo TEMPLE;?>
images/returntop.png" alt="" class="img-responsive"/></div>
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</body>
	<?php echo '<script'; ?>
 type="text/javascript">
	
		$(".returntop").click(function(){
			$(document).scrollTop(0);
		})
		//	右侧导航锚点
		var content1top = $(".content1").position().top - 100;
		var content_o2ostop = $(".content-o2os").position().top - 100;
		var content_programmetop = $(".content-programme").position().top - 100;
		var content_allchanneltop = $(".content-allchannel").position().top - 100;
		var content_vipservicetop = $(".content-vipservice").position().top - 100;

		//		滑动滚动条改变锚点菜单样式
		$(window).scroll(function() {
			var c = $(document).scrollTop();
			if(c <= content_o2ostop) {
				$(".rightmenu li").removeClass("menuactive");
				$(".rightmenu li:eq(0)").addClass("menuactive");
			} else if(c <= content_programmetop) {
				$(".rightmenu li").removeClass("menuactive");
				$(".rightmenu li:eq(1)").addClass("menuactive");
			} else if(c <= content_allchanneltop) {
				$(".rightmenu li").removeClass("menuactive");
				$(".rightmenu li:eq(2)").addClass("menuactive");
			} else if(c <= content_vipservicetop) {
				$(".rightmenu li").removeClass("menuactive");
				$(".rightmenu li:eq(3)").addClass("menuactive");
			} else {
				$(".rightmenu li").removeClass("menuactive");
				$(".rightmenu li:eq(4)").addClass("menuactive");
			}
		})

		$(".rightmenu li").click(function() {
			var index = $(".rightmenu li").index($(this));
			//		点击改变锚点菜单样式
			$(".rightmenu li").removeClass("menuactive");
			$(".rightmenu li:eq(" + index + ")").addClass("menuactive")

			//		跳到锚点处
			switch(index) {
				case 0:
					$(document).scrollTop(content1top + 5);
					break;
				case 1:
					$(document).scrollTop(content_o2ostop + 5);
					break;
				case 2:
					$(document).scrollTop(content_programmetop + 5);
					break;
				case 3:
					$(document).scrollTop(content_allchanneltop + 5);
					break;
				case 4:
					$(document).scrollTop(content_vipservicetop + 5);
					break;
			}
		})
		
		

		//		//鼠标滚轮事件
//		var scrollFunc = function(e) {
//			var direct = 0;
//			e = e || window.event;
//			if(e.wheelDelta) { //判断浏览器IE，谷歌滑轮事件               
//				if(e.wheelDelta > 0) { //当滑轮向上滚动时  
//					
//				}
//				if(e.wheelDelta < 0) { //当滑轮向下滚动时  
//					
//				}
//			} else if(e.detail) { //Firefox滑轮事件  
//				if(e.detail > 0) { //当滑轮向上滚动时  
//					alert("滑轮向上滚动");
//				}
//				if(e.detail < 0) { //当滑轮向下滚动时  
//					alert("滑轮向下滚动");
//				}
//			}
//			ScrollText(direct);
//		}
//		//给页面绑定滑轮滚动事件  
//		if(document.addEventListener) {
//			document.addEventListener('DOMMouseScroll', scrollFunc, false);
//		}
//		//滚动滑轮触发scrollFunc方法  
//		window.onmousewheel = document.onmousewheel = scrollFunc;
	
<?php echo '</script'; ?>
>
	</html><?php }
}
