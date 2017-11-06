<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:59:26
  from "D:\www\yunjuke\application\admin\views\store_area_setting.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841b4e565fb3_15007966',
  'file_dependency' => 
  array (
    '2b6f10b5f6e0446591b062f2787dc26f4293e6a8' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\store_area_setting.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59841b4e565fb3_15007966 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1804559841b4e483670_26181279';
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
	<div class="fixed-bar">
		<div class="item-title">
			<div class="subject">
				<h3>门店区域设置</h3>
				<h5>设置门店的功能，区域，分组等信息</h5>
			</div>
			<ul class="tab-base nc-row">
			    <li><a class="current"><span>功能设置</span></a></li>
				<li><a href="store_area_edit"><span>编辑门店区域</span></a></li>
				<li><a href="store_area_group"><span>区域分组管理</span></a></li>
			</ul>
		</div>
	</div>
	  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>开启后，若顾客绑定了某门店导购，用户进入“所有门店”页面时，只会看到该门店所属区域的门店列表，不会看到其他区域。
使用该功能前，请先建立区域分组，所有门店必须有一个所在分组。</li>
      <li>示例：
   <li>1. 顾客绑定了门店A的导购A，门店F的导购B；</li>
   <li>门店A所属区域下门店为门店A、门店B、门店C；</li>
   <li>门店F所属区域下门店为门店F、门店G、门店H；</li>
   <li>则该消费者进入“所有门店”，看到的门店为门店A、门店B、门店C、门店F、门店G、门店H，无法看到其他门店。</li>
   <li>2. 顾客未绑定任何导购，则根据当前离消费者最近的门店，显示该门店所有的区域门店列表。</li>
   <li>示例：</li>
   <li>消费者未绑定任何导购，进入“所有门店”列表，距离最近门店为A，门店A所属区域下门店为门店A、门店B、门店C；</li>
   <li>则消费者看到的门店为门店A、门店B、门店C；</li>
    </ul>
  </div>
	<form action="store_area_set" method="post" id="form_" name="settingForm">
		
		<div class="ncap-form-default">
			<dl class="row">
				<dt class="tit">
					<label>区域门店隔离</label>
				</dt>
				<dd class="opt">
					<div class="onoff">
						<label for="qq_isuse_1" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['data']->value['store_region_state'] == 1) {?>selected<?php }?> " title="开启"><span>开启</span></label>
						<label for="qq_isuse_0" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['data']->value['store_region_state'] == 0) {?>selected<?php }?>  " title="关闭"><span>关闭</span></label>
						<input type="radio" id="qq_isuse_1" name="qq_isuse"  <?php if ($_smarty_tpl->tpl_vars['data']->value['store_region_state'] == 1) {?>checked<?php }?>   value="1"  >
						<input type="radio" id="qq_isuse_0" name="qq_isuse"  <?php if ($_smarty_tpl->tpl_vars['data']->value['store_region_state'] == 0) {?>checked<?php }?> value="0"  >
					</div>
					<p class="notic">商户下的门店为区域性，部分区域为经销商自治；不期望经销商A的客户看到其他经销商，已保证经销商利益，可使用本功能</p>
				</dd>
			</dl>
		    <dl class="row">
				<dt class="tit">
					<label>门店隔离半径</label>
				</dt>
				<dd class="opt">
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['store_region_radius'];?>
" name="area_region" id="area_region" class="input-txt">(单位:公里)
					<span class="err"></span>
					<p class="notic">门店隔离半径最大限制为1000公里</p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label>已绑定导购用户</label>
				</dt>
				<dd class="opt">
					根据已绑定导购的门店，显示这些门店所属区域的门店
					<p class="notic">商户下的门店为区域性，部分区域为经销商自治；不期望经销商A的客户看到其他经销商，已保证经销商利益，可使用本功能</p>
				</dd>
			</dl>
			<dl class="row">
				<dt class="tit">
					<label>未绑定导购用户</label>
				</dt>
				<dd class="opt">
					<select name="delivery" class="valid">
                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['store_region_noguide'] == 1) {?>selected<?php }?>>门店隔离半径内，最近一个门店所属的区域门店；无则不显示</option>
                        <option value="2" <?php if ($_smarty_tpl->tpl_vars['data']->value['store_region_noguide'] == 2) {?>selected<?php }?>>门店隔离半径内，最近一个门店所属的区域门店；无则显示直营店</option>
                         <option value="3" <?php if ($_smarty_tpl->tpl_vars['data']->value['store_region_noguide'] == 3) {?>selected<?php }?>>门店隔离半径内，最近一个门店所属的区域门店；无则显示旗舰店</option>
                        <option value="4" <?php if ($_smarty_tpl->tpl_vars['data']->value['store_region_noguide'] == 4) {?>selected<?php }?>>只显示直营店</option>
                         <option value="5" <?php if ($_smarty_tpl->tpl_vars['data']->value['store_region_noguide'] == 5) {?>selected<?php }?>>只显示旗舰店</option>
                     </select>
					
				</dd>
			</dl>
			
			<div class="bot"><a href="JavaScript:;" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
		</div>
	</form>


</div>
<?php echo '<script'; ?>
>
$(function(){
	 $('#submitBtn').click(function(){
		 var radios = $('#area_region').val();
		 /* console.log(radios);
		 console.log(isNaN(radios));return false; */
		 if(isNaN(radios)){
			 layer.msg('隔离半径只能为数字');return false;
		 }
		 if(parseInt(radios)>1000){
			 layer.msg('隔离半径不能超过1000');return false;
		 }
		 $('#form_').submit();
	 })
})

<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html>
<?php }
}
