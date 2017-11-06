<?php
/* Smarty version 3.1.29, created on 2017-06-14 16:10:37
  from "D:\www\yunjuke\application\index\views\memberService.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5940ef7d9fae59_70204008',
  'file_dependency' => 
  array (
    '0fd0a735f5052e94c334a196d48d8bf4ea837f36' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\index\\views\\memberService.html',
      1 => 1497424779,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/header.html' => 1,
    'file:lib/footer.html' => 1,
  ),
),false)) {
function content_5940ef7d9fae59_70204008 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '30845940ef7d904ca7_90469955';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	
	<section class="member-banner" style="margin-top: 100px;">
		<div class="main-content">
			<p class="member-title">增加粉丝数量　提高会员质量</p>
			<p class="member-title-small">吸粉引流</p>
		</div>
	</section>
	<section class="member">
		<div class="main-content">
		<p class="pro-title">会员服务</p>
		<div class="member-content">
			<div class="member-item">
				<div class="item-img"><img src="<?php echo TEMPLE;?>
images/markting.png" alt="" /></div>
				<p class="item-title">精确营销</p>
				<p class="item-text">微场景营销题提供多样模板配合会员专属促销、专属优惠、智能维护等功能，
					提升会员活跃度，促进店铺销量的提升!利用微场景推送最吸引力的广告。</p>
			</div>
			<div class="member-item">
				<div class="item-img"><img src="<?php echo TEMPLE;?>
images/datamanger.png" alt="" /></div>
				<p class="item-title">数据管理</p>
				<p class="item-text">通过客户活跃度的数据汇总，让品牌全面了解粉丝的更多特征，便于对粉丝进
					行深度分析和针对性营销。会员积分的转换，吸引更多粉丝。</p>
			</div>
			<div class="member-item">
				<div class="item-img"><img src="<?php echo TEMPLE;?>
images/membertrain.png" alt="" /></div>
				<p class="item-title">会员培养</p>
				<p class="item-text">大幅度提高会员对品牌忠诚度，为会员展示商品差异化推荐及定制化排列，借
					助粉丝生命周期，结合线上线下结合的促销活动，有效提升多店铺渠道特征的品牌企业。</p>
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
