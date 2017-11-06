<?php
/* Smarty version 3.1.29, created on 2017-07-26 15:18:07
  from "D:\www\yunjuke\application\admin\views\role_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5978422f863035_31079304',
  'file_dependency' => 
  array (
    '59d6e04275532253aa241dba1ae6a3d8c6ac67ec' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\role_add.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5978422f863035_31079304 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '49135978422f72a7e4_80947977';
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title"><a class="back" href="role" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3>权限设置 - 添加权限组</h3>
        <h5>管理中心操作权限及分组设置</h5>
      </div>
      <ul class="tab-base nc-row">
        <li></li>
      </ul>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>可添加一个权限组，并为其命名，方便添加管理员时使用。</li>
      <li>可在标题处全选所有功能或根据功能模块逐一选择操作权限，提交保存后生效。</li>
    </ul>
  </div>
  <form id="add_form" method="post" action="role?op=insert_role" name="adminForm" style="margin-bottom: 50px;">
    <input type="hidden" name="role_id" value="<?php if ($_smarty_tpl->tpl_vars['role_info']->value) {
echo $_smarty_tpl->tpl_vars['role_info']->value['role_id'];
}?>">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="admin_name"><em>*</em>权限组</label></dt>
        <dd class="opt">
          <input type="text" id="gname" maxlength="40" name="gname" value="<?php if ($_smarty_tpl->tpl_vars['role_info']->value) {
echo $_smarty_tpl->tpl_vars['role_info']->value['role_name'];
}?>" class="input-txt">
          <span class="err"></span>
          <p class="notic">为权限组设置特定名称，便于添加管理员时选择使用。</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">设置权限</dt>
        <dd class="opt">
          <input id="limitAll" value="1" type="checkbox" class="checkbox">
          全部操作
          <p class="notic">勾选后选中全部操作功能，可根据需要从设置详情中进行分组设置。</p>
        </dd>
      </dl>
    </div>
    <div class="ncap-form-all">
      <div class="title">
        <h3>权限操作设置详情</h3>
      </div>
	  <?php
$_from = $_smarty_tpl->tpl_vars['priv_arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_priv_0_saved_item = isset($_smarty_tpl->tpl_vars['priv']) ? $_smarty_tpl->tpl_vars['priv'] : false;
$_smarty_tpl->tpl_vars['priv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['priv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['priv']->value) {
$_smarty_tpl->tpl_vars['priv']->_loop = true;
$__foreach_priv_0_saved_local_item = $_smarty_tpl->tpl_vars['priv'];
?>
      <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          <?php echo $_smarty_tpl->tpl_vars['priv']->value['action_name'];?>
</span>
		</dt>
        <dd class="opt nobg nopd nobd nobs">
		<?php
$_from = $_smarty_tpl->tpl_vars['priv']->value['priv'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_s_priv_1_saved_item = isset($_smarty_tpl->tpl_vars['s_priv']) ? $_smarty_tpl->tpl_vars['s_priv'] : false;
$_smarty_tpl->tpl_vars['s_priv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['s_priv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['s_priv']->value) {
$_smarty_tpl->tpl_vars['s_priv']->_loop = true;
$__foreach_s_priv_1_saved_local_item = $_smarty_tpl->tpl_vars['s_priv'];
?>
          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              <?php echo $_smarty_tpl->tpl_vars['s_priv']->value['action_name'];?>
</h4>
            <ul class="ncap-account-container-list">
				<?php
$_from = $_smarty_tpl->tpl_vars['s_priv']->value['son_priv'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_ss_priv_2_saved_item = isset($_smarty_tpl->tpl_vars['ss_priv']) ? $_smarty_tpl->tpl_vars['ss_priv'] : false;
$_smarty_tpl->tpl_vars['ss_priv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ss_priv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ss_priv']->value) {
$_smarty_tpl->tpl_vars['ss_priv']->_loop = true;
$__foreach_ss_priv_2_saved_local_item = $_smarty_tpl->tpl_vars['ss_priv'];
?>
                <li>
                <input class="checkbox va-m" type="checkbox"  <?php if ($_smarty_tpl->tpl_vars['role_array']->value) {
if (in_array($_smarty_tpl->tpl_vars['ss_priv']->value['action_code'],$_smarty_tpl->tpl_vars['role_array']->value)) {?>checked<?php }
}?>  value="<?php echo $_smarty_tpl->tpl_vars['ss_priv']->value['action_code'];?>
" name="permission[]">
                <span class="err"></span>
                <?php echo $_smarty_tpl->tpl_vars['ss_priv']->value['action_name'];?>
</li>
				<?php
$_smarty_tpl->tpl_vars['ss_priv'] = $__foreach_ss_priv_2_saved_local_item;
}
if ($__foreach_ss_priv_2_saved_item) {
$_smarty_tpl->tpl_vars['ss_priv'] = $__foreach_ss_priv_2_saved_item;
}
?>
            </ul>
          </div>
		<?php
$_smarty_tpl->tpl_vars['s_priv'] = $__foreach_s_priv_1_saved_local_item;
}
if ($__foreach_s_priv_1_saved_item) {
$_smarty_tpl->tpl_vars['s_priv'] = $__foreach_s_priv_1_saved_item;
}
?>
        </dd>
      </dl>
	<?php
$_smarty_tpl->tpl_vars['priv'] = $__foreach_priv_0_saved_local_item;
}
if ($__foreach_priv_0_saved_item) {
$_smarty_tpl->tpl_vars['priv'] = $__foreach_priv_0_saved_item;
}
?>
      <div class="fix-bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
    </div>
  </form>
</div>
<?php echo '<script'; ?>
>
function selectLimit(name){
    if($('#'+name).attr('checked')) {
        $('.'+name).attr('checked',true);
    }else {
        $('.'+name).attr('checked',false);
    }
}
$(document).ready(function(){
	//按钮先执行验证再提交表单
	$("#submitBtn").click(function(){
	    if($("#add_form").validate()){
	    var chk_value =[]; 
	    $('input[type="checkbox"]:checked').each(function(){ 
	    chk_value.push($(this).val()); 
	    }); 
	    if(chk_value == ''){
	    	layer.msg('权限不能为空');
	    	return false;
	    }
	     $("#add_form").submit();
		}
	});

    // 全选
    $('#limitAll').click(function(){
    	$('input[type="checkbox"]').attr('checked',$(this).attr('checked') == 'checked');
    });
    // 功能模块
    $('input[nctype="modulesAll"]').click(function(){
        $(this).parents('dt:first').next().find('input[type="checkbox"]').attr('checked',$(this).attr('checked') == 'checked');
    });
    // 功能组
    $('input[nctype="groupAll"]').click(function(){
        $(this).parents('h4:first').next().find('input[type="checkbox"]').attr('checked',$(this).attr('checked') == 'checked');
    });
	
	$("#add_form").validate({
		errorPlacement: function(error, element){
			var error_td = element.parent('dd').children('span.err');
            error_td.append(error);
        },
        rules : {
            gname : {
                required : true,
				remote	: {
                    url :'role?op=check_name',
                    type:'get',
                    data:{
                    	gname : function(){
                            return $('#gname').val();
                        }
                    }
                }
            }
        },
        messages : {
            gname : {
                required : '<i class="fa fa-exclamation-circle"></i>请输入角色名称',
                remote   : '<i class="fa fa-exclamation-circle"></i>该名称已存在'
            }
        }
	});
});
<?php echo '</script'; ?>
><div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
