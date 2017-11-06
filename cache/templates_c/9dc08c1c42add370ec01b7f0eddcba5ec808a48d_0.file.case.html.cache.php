<?php
/* Smarty version 3.1.29, created on 2017-06-10 14:08:08
  from "D:\www\yunjuke\application\index\views\case.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_593b8cc8e05185_28988529',
  'file_dependency' => 
  array (
    '9dc08c1c42add370ec01b7f0eddcba5ec808a48d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\index\\views\\case.html',
      1 => 1495604699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/header.html' => 1,
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_593b8cc8e05185_28988529 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '29025593b8cc8c95e21_62354043';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<div class="title-logo">
			<img src="<?php echo TEMPLE;?>
images/banner.png" alt="title-logo" class="img-responsive" />
		</div>
		<div class="content-case">
			<div class="title text-center">
				<h2>合作品牌</h2>
			</div>
			<div class="row" style="width: 67%;margin: 0 auto;">
				<div class="col-xs-4">
					<a href="#" class="thumbnails store">
						<img src="<?php echo TEMPLE;?>
images/Nikestore.png" alt="nike">
						<div class="store-content" style="display: none;">	
							<div class="store-content-top">
								<div class="nikelogo pull-left">
									<img src="<?php echo TEMPLE;?>
images/NIKE.png" class="img-responsive"/>
								</div>
								<div class="QRcodelogo pull-right">
									<img src="<?php echo TEMPLE;?>
images/QRcode.jpg" class="img-responsive"/>
								</div>
							</div>
							<div class="store-content-text">
								<p>耐克是全球著名的体育用品制造商，总部位于美国俄勒冈州，生产的体育用品包罗万象：服装，鞋类，运动器材等。</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-xs-4 store">
					<a href="#" class="thumbnails">
						<img src="<?php echo TEMPLE;?>
images/Nikestore.png" alt="nike">
					</a>
				</div>
				<div class="col-xs-4 store">
					<a href="#" class="thumbnails">
						<img src="<?php echo TEMPLE;?>
images/Nikestore.png" alt="nike">
					</a>
				</div>
				<div class="col-xs-4 store">
					<a href="#" class="thumbnails">
						<img src="<?php echo TEMPLE;?>
images/levi'store.png" alt="nike">
					</a>
				</div>
				<div class="col-xs-4 store">
					<a href="#" class="thumbnails">
						<img src="<?php echo TEMPLE;?>
images/levi'store.png" alt="nike">
					</a>
				</div>
				<div class="col-xs-4 store">
					<a href="#" class="thumbnails">
						<img src="<?php echo TEMPLE;?>
images/levi'store.png" alt="nike">
					</a>
				</div>
			</div>
		</div>
		<div class="returntop"><img src="<?php echo TEMPLE;?>
images/returntop.png" alt="" class="img-responsive"/></div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</body>
	<?php echo '<script'; ?>
 type="text/javascript">
		var centercontentwidth = parseInt($("body").css("width").split("px")[0]);
		$(".footer").css("height", centercontentwidth * 0.15 + "px");
		window.onresize = function() {
			var centercontentwidth = parseInt($("body").css("width").split("px")[0]);
			$(".footer").css("height", centercontentwidth * 0.15 + "px");
		}
		$(".store").mouseenter(function(){
			$(this).find(".store-content").show();
		})
		$(".store").mouseleave(function(){
			$(this).find(".store-content").hide();
		})
		
		$(".returntop").click(function(){
			$(document).scrollTop(0);
		})
	<?php echo '</script'; ?>
>

</html><?php }
}
