<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:42:16
  from "D:\www\yunjuke\application\admin\views\user_integral_grade.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598022c80b7482_69344512',
  'file_dependency' => 
  array (
    'b89a8b49a8e2d821c5cfa98f93f33acf9918650d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\user_integral_grade.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598022c80b7482_69344512 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '21201598022c7f07549_30516177';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
.input-num{
	width:120px !important;height:24px;border-radius:4px;
}
.ncap-form-default div.bot, .ncap-form-all div.bot {
    padding-left: 6%;
}
.operat{
	display:inline-block;border:1px solid #D7D7D7;border-radius:4px;padding:0 4px;background:#E6E6E6;cursor:pointer;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>积分管理</h3>
        <h5>商城会员积分管理及获取日志</h5>
      </div>
      <ul class="tab-base nc-row">
        <li><a href="user_integral_detail" >积分明细</a></li>
        <li><a href="user_rule_set">规则设置</a></li>
        <li><a href="user_integral_change">积分增减</a></li>
        <li><a href="user_integral_rate">积分抵用比率</a></li>
        <li><a href="JavaScript:void(0);" class="current">积分等级</a></li>
      </ul>
    </div>
  </div>
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>“会员级别设置”提交后，当会员符合某个级别后将自动升至该级别，请谨慎设置会员级别</li>
      <li>建议：级别应该是逐层递增，例如“级别2”所需积分高于“级别1”；二、设置的第一个级别所需积分应为0；三、信息应填写完整；</li>
    </ul>
  </div>
  <form method="post" id="mg_form" name="mg_form" enctype="multipart/form-data">
    <div class="ncap-form-default" id="mg_tbody">
      <div class="title">
        <h3>会员级别设置：</h3>
      </div>
      <?php
$_from = $_smarty_tpl->tpl_vars['grades']->value;
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
      <dl class="row" id="row_0">
        <dt class="tit">会员级别<strong> 
        <?php echo $_smarty_tpl->tpl_vars['v']->value['mld_name'];?>

        <input type="hidden" name="grade_name[]" id="v_name0" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['mld_name'];?>
" class="w60" >
        </strong></dt>
        <dd class="opt">
               晋级需 <input type="number" name="grade[]" id="v0" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['mld_exp'];?>
" class="w60 input-num" > 积分
          <!-- <span class="operat" onclick="del_grade(this)" title="删除级别">删除级别</span>    
          <span class="operat" onclick="add_grade(this)" title="新增级别">新增级别</span>  -->
        </dd>
      </dl>
      <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
      <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
    </div>
  </form>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
$('#submitBtn').click(function(){
	var status = true;
	$('input').each(function(index,val){ 
		if($(this).val()==''){
			status = false;
		}
	})
	if(!status){
		layer.alert('级别和积分不能为空');return false;
	}
	var flag = true;
	$('input.input-num').each(function(index,val){ 
		if(index>=1){
			if(parseInt($('input.input-num').eq(index).val())<=parseInt($('input.input-num').eq(index-1).val())){
				flag = false;
			}
		}
		
	})
	if(flag){
		$.ajax({
			url:'grade_change',
			data:$('#mg_form').serialize(),
			type:'post',
			dataType:'json',
			success:function(data){
				if(data.state==403){
					login_ajax('shopadmin');return false;
				}
				layer.alert(data);
			}
		});
	}else{
		layer.alert('积分应随等级递增');
	}
	
})
function del_grade(obj){
	$(obj).parents('dl.row').remove();
}
function add_grade(obj){
	var str = '<dl class="row" id="row_0">'+
        '<dt class="tit">会员级别<strong> <input type="text" name="grade_name[]" id="v_name0" value="" class="w60" ></strong></dt>'+
        '<dd class="opt">'+
        '晋级需 <input type="number" name="grade[]" id="v0" value="" class="w60 input-num" > 积分'+
        '<span class="operat" onclick="del_grade(this)" title="删除级别">删除级别</span> '+   
        '<span class="operat" onclick="add_grade(this)" title="新增级别">新增级别</span> '+
        '</dd></dl>';
	$(obj).parents('dl.row').after(str);
}
<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
