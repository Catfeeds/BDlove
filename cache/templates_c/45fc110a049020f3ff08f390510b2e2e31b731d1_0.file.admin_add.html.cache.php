<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:36:45
  from "D:\www\yunjuke\application\admin\views\admin_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fdb2d984d10_82240485',
  'file_dependency' => 
  array (
    '45fc110a049020f3ff08f390510b2e2e31b731d1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\admin_add.html',
      1 => 1492225944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597fdb2d984d10_82240485 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '16291597fdb2d809e49_78548202';
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title"><a class="back" href="admin" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3>权限设置 - 添加管理员</h3>
        <h5>管理中心操作权限及分组设置</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>可添加一名后台管理员，设置其后台登录用户名及密码，但不可登录网站前台。</li>
      <li>管理员必须下属某个权限组，如无权限组选择请先完成“添加权限组”步骤。</li>
    </ul>
  </div>
  <form id="add_form" method="post"  action="admin?op=insert_admin&admin_id=<?php if ($_smarty_tpl->tpl_vars['data']->value) {
echo $_smarty_tpl->tpl_vars['data']->value['admin_id'];
}?>">
	<!---管理员的账户信息，新增和修改都在在这个页面---->
    <input type="hidden" name="admin_id" value="<?php if ($_smarty_tpl->tpl_vars['data']->value) {?> <?php echo $_smarty_tpl->tpl_vars['data']->value['admin_id'];?>
 <?php }?>" />
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="admin_name"><em>*</em>登录名</label>
        </dt>
        <dd class="opt">
          <input type="text" id="admin_name" name="admin_name" value="<?php if ($_smarty_tpl->tpl_vars['data']->value) {?> <?php echo $_smarty_tpl->tpl_vars['data']->value['admin_name'];?>
 <?php }?>" class="input-txt">
          <span class="err"></span>
          <p class="notic">3-15位字符，可由中文、英文、数字及“_”、“-”组成。</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="admin_pwd"><em>*</em>密码</label>
        </dt>
        <dd class="opt">
          <input type="password" id="admin_pwd" name="admin_pwd" class="input-txt">
          <span class="err"></span>
          <p class="notic">6-20位字符，可由英文、数字及标点符号组成。</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="admin_password"><em>*</em>确认密码</label>
        </dt>
        <dd class="opt">
          <input type="password" name="admin_rpassword" class="input-txt">
          <span class="err"></span>
          <p class="notic">请再次输入您的密码。</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="gadmin_name"><em>*</em>权限组</label>
        </dt>
        <dd class="opt">
          <select name="role_id">
			<?php
$_from = $_smarty_tpl->tpl_vars['role_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
			<option <?php if ($_smarty_tpl->tpl_vars['data']->value) {?> <?php if ($_smarty_tpl->tpl_vars['data']->value['role_id'] == $_smarty_tpl->tpl_vars['val']->value['role_id']) {?> selected <?php }
}?> value=" <?php echo $_smarty_tpl->tpl_vars['val']->value['role_id'];?>
 " > <?php echo $_smarty_tpl->tpl_vars['val']->value['role_name'];?>
</option>
			<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
?>
		  </select>
          <span class="err"></span>
          <p class="notic">请选择一个权限组，如果还未设置，请先建立权限组后再添加管理员。</p>
        </dd>
      </dl>
      <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
    </div>
  </form>
</div>
<?php echo '<script'; ?>
>

//按钮先执行验证再提交表
$(document).ready(function(){
	//按钮先执行验证再提交表单
	$("#submitBtn").click(function(){
	    if($("#add_form").valid()){
	     $("#add_form").submit();
		}
	});
	
	$("#add_form").validate({
		errorPlacement: function(error, element){
			var error_td = element.parent('dd').children('span.err');
            error_td.append(error);
        },
        rules : {			
            admin_name : {
                required : true,
				minlength: 3,
				maxlength: 20,
				<?php if ($_smarty_tpl->tpl_vars['action']->value != 'update_admin') {?>
				remote	: {
                    url :'admin?op=check_admin_name',
                    type:'get',
                    data:{
                    	admin_name : function(){
                            return $('#admin_name').val();
                        }
                    }
                }
				<?php }?>
            },
            admin_pwd : {
                required : true,
				minlength: 6,
				maxlength: 20,
            },
            admin_rpassword : {
                required : true,
                equalTo  : '#admin_pwd'
            },
			
            role_id : {
                required : true
            }        
        },
        messages : {
            admin_name : {
                required : '<i class="fa fa-exclamation-circle"></i>登录名不能为空',
				minlength: '<i class="fa fa-exclamation-circle"></i>登录名长度为3-20',
				maxlength: '<i class="fa fa-exclamation-circle"></i>登录名长度为3-20',
				<?php if ($_smarty_tpl->tpl_vars['action']->value != 'update_admin') {?>
				remote   : '<i class="fa fa-exclamation-circle"></i>该名称已存在'
				<?php }?>
            },
            admin_pwd : {
                required : '<i class="fa fa-exclamation-circle"></i>密码不能为空',
				minlength: '<i class="fa fa-exclamation-circle"></i>密码长度为6-20',
				maxlength: '<i class="fa fa-exclamation-circle"></i>密码长度为6-20'
            },
            admin_rpassword : {
                required : '<i class="fa fa-exclamation-circle"></i>密码不能为空',
                equalTo  : '<i class="fa fa-exclamation-circle"></i>两次输入的密码不一致，请重新输入'
            },
            gid : {
                required : '<i class="fa fa-exclamation-circle"></i>请选择一个权限组'
            }
        }
	});
});

<?php echo '</script'; ?>
> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
