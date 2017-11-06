<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:37:24
  from "D:\www\yunjuke\application\admin\views\area_new.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598416240d7748_72852956',
  'file_dependency' => 
  array (
    '5e4067a15ca254801f8a2ce8593bf7478b144d50' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\area_new.html',
      1 => 1492225944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598416240d7748_72852956 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '140159841623ec1ef6_88263531';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="toolTipLayer" style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 227px; top: 352px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
        <a class="back" href="javascript:void(0);" onclick="fg_show_children('area',0,'')" title="返回列表">
            <i class="fa fa-arrow-circle-o-left"></i>
        </a>
        <div class="subject">
            <h3>地区设置 - 新增</h3>
            <h5>地区新增与编辑</h5>
        </div>
    </div>
  </div>

  <form id="formArea" method="post" action="newArea?op=save">
    <input type="hidden" name="form_submit" value="<?php echo $_smarty_tpl->tpl_vars['judge']->value;?>
">
    <input type="hidden" name="area_id" value="<?php echo $_smarty_tpl->tpl_vars['aid']->value;?>
">
    <input type="hidden" name="parent_id" id="_area" value="<?php echo $_smarty_tpl->tpl_vars['parentID']->value;?>
">
    <input type="hidden" name="area_deep" id="area_deep" value="<?php echo $_smarty_tpl->tpl_vars['areaDeep']->value;?>
">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="ac_name"><em>*</em>地区名</label>
        </dt>
        <dd class="opt">
          <input type="text" name="area_name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" maxlength="20" id="area_name" class="input-txt">
          <span class="err"></span>
          <p class="notic">请认真填写地区名称，地区设定后将直接影响订单、收货地址等重要信息，请谨慎操作。</p>
        </dd>
      </dl>

      <dl class="row">
        <dt class="tit">
          <label for="region">上级地区</label>
        </dt>
        <dd class="opt">
        <div class="area-region-select">
            <input id="region" name="region" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['allName']->value;?>
">
            <span class="err"></span>
        </div>
          <p class="notic">系统将根据所选择的上级菜单层级决定新增项的所在级，即选择上级菜单为“北京”，则新增项为北京地区的下级区域，以此类推。</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="ac_sort">所属大区域</label>
        </dt>
        <dd class="opt">
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['region_name']->value;?>
" name="area_region" id="area_region" class="input-txt">
          <span class="err"></span>
          <p class="notic">默认只有省级地区才需要填写大区域，目前全国几大区域有：华北、东北、华东、华南、华中、西南、西北、港澳台、海外。</p>
        </dd>
      </dl>
      <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="subBtn">确认提交</a></div>
    </div>
  </form>
</div>
<?php echo '<script'; ?>
>
//按钮先执行验证再提交表单
$(function(){
    $("#subBtn").click(function(){
        if($("#formArea").valid()){
            if ($('#region').fetch('area_id') && $('#region').fetch('area_id')!='0') {
                $('#area_deep').val($('#region').fetch('selected_deep')+1);
            }else{
                    $('#area_deep').val('1');
            }
            $("#formArea").submit();
        }
    });
});
//
$(document).ready(function(){
	$("#region").nc_region({src:'db',show_deep:3});
	$('#formArea').validate({
        errorPlacement: function(error, element){
			var error_td = element.parent('dd').children('span.err');
            error_td.append(error);
        },
        rules : {
            area_name : {
            	required   : true
            }
        },
        messages : {
        	area_name : {
                required : '<i class="fa fa-exclamation-circle"></i>请填写地区'
            }
        }
    });
});
function fg_show_children(act,area_id,parent_id) {
    //alert(act);
    var url = "web/area";
    parent.test(url);

}
<?php echo '</script'; ?>
>
<div id="goTop" style="bottom: 30px;">
    <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
    <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>

<div role="log" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible">
    <div>返回列表</div>
</div>
</body>
</html><?php }
}
