<?php
/* Smarty version 3.1.29, created on 2017-06-14 16:10:49
  from "D:\www\yunjuke\application\index\views\programm.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5940ef89ea8f59_72820673',
  'file_dependency' => 
  array (
    'f9666e89dbf3d16d46806d5e2f106e420675d67a' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\index\\views\\programm.html',
      1 => 1497424785,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/header.html' => 1,
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_5940ef89ea8f59_72820673 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '206925940ef89dbe926_47103653';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	
	<section class="logo-top" style="margin-top: 100px;">
		<div class="main-content">
			<p class="program-title-small">专业开发团队</p>
			<div class="program-title">
				<span></span><p>全方位技术支持</p><span style="float: right;margin-right: 147px;"></span>
			</div>
		</div>
	</section>
	<section class="program">
		<div class="main-content">
		<div class="left-img">
			<img src="<?php echo TEMPLE;?>
images/iPhone-6S-Silver.png" alt="" />
		</div>
		<dl class="right-text">
			<dt>软件开发</dt>
			<dd>正是为了解决客户（企业）面临的问题以及促进其快速发展的业务需求而量身设计的一种软件定制开发服务模式。
				在这种服务模式下，我们会根据不同客户（企业）的实际需求，量身提供由1个或数个敏捷软件工程师组成的敏捷小
				团队，为客户（企业）量身定制开发“可以快速解决问题、创造真正价值的软件”，帮助客户更容易、更高效、更安全
				的解决问题，把创新和竞争力带入快速变化的市场，实现信息化目标。</dd>
		</dl>
		</div>
	</section>
	<section class="logo-middle">
		<p class="belong">属于你的专属定制服务</p>
	</section>
	<section class="program-direction">
		<div class="main-content">
		<p class="pro-title">软件开发</p>
		<div class="direct-content">
			<div class="pro-block">
				<h4>公众号定制</h4>
				<div class="public-img"><img src="<?php echo TEMPLE;?>
images/publicnum-logo.png" class="img-responsive"/></div>
				<div class="public-text">
					<p>企业版，企业定制版</p>
					<p>商业中心版，商业中心定制版</p>
					<p>提供专属定制服务</p>
				</div>
			</div>
			<div class="pro-block">
				<h4>新零售运营</h4>
				<div class="public-img"><img src="<?php echo TEMPLE;?>
images/O2O-logo.png" class="img-responsive"/></div>
				<div class="public-text">
					<p>线上微信运营，线下门店管理</p>
					<p>玩转O2O</p>
				</div>

			</div>
		</div>
		</div>
	</section>
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
	<?php echo '</script'; ?>
>

</html><?php }
}
