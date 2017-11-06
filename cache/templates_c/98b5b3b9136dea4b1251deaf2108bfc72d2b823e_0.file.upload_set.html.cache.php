<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:37:32
  from "D:\www\yunjuke\application\admin\views\upload_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5984162c342764_43168947',
  'file_dependency' => 
  array (
    '98b5b3b9136dea4b1251deaf2108bfc72d2b823e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\upload_set.html',
      1 => 1492225944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5984162c342764_43168947 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '79675984162c1bfb97_86967986';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>上传设置</h3>
        <h5>网站全局图片、上传等参数设定</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>依据服务器环境支持最大上传组件大小设置选项，如需要上传超大附件需调整服务器环境配置。</li>
    </ul>
  </div>
  <form id="form"  method="post" enctype="multipart/form-data" name="settingForm">
    <div class="ncap-form-default">
	<?php
$_from = $_smarty_tpl->tpl_vars['cof_data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_var_0_saved_item = isset($_smarty_tpl->tpl_vars['var']) ? $_smarty_tpl->tpl_vars['var'] : false;
$__foreach_var_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['var'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['var']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['var']->value) {
$_smarty_tpl->tpl_vars['var']->_loop = true;
$__foreach_var_0_saved_local_item = $_smarty_tpl->tpl_vars['var'];
?>
		<?php if ($_smarty_tpl->tpl_vars['var']->value['code'] == 'img_size') {?>
      <dl class="row">
        <dt class="tit">
          <label for="image_max_filesize"><?php echo $_smarty_tpl->tpl_vars['var']->value['comments'];?>
</label>
        </dt>
        <dd class="opt">大小          
			<input id="image_max_filesize" name="image_max_filesize" type="text" class="input-txt" style="width:30px !important;" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
"/>
          KB&nbsp;(1024 KB = 1MB)
          <p class="notic">当前服务器环境，最大允许上传4MB 的文件，您的设置请勿超过该值。</p>
        </dd>
      </dl>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['var']->value['code'] == 'img_extend_type') {?>
      <dl class="row">
        <dt class="tit">
          <label for="image_allow_ext"><?php echo $_smarty_tpl->tpl_vars['var']->value['comments'];?>
</label>
        </dt>
        <dd class="opt">
          <input id="image_allow_ext" name="image_allow_ext" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['value'];?>
" class="input-txt" type="text" />
          <p class="notic">图片扩展名，用于判断上传图片是否为后台允许，多个后缀名间请用半角逗号 "," 隔开。</p>
        </dd>
      </dl>
		<?php }?>
	<?php
$_smarty_tpl->tpl_vars['var'] = $__foreach_var_0_saved_local_item;
}
if ($__foreach_var_0_saved_item) {
$_smarty_tpl->tpl_vars['var'] = $__foreach_var_0_saved_item;
}
if ($__foreach_var_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_var_0_saved_key;
}
?>
      <div class="bot"><a href="JavaScript:void(0);" class="btn btn-warning radius" onclick="upload_submit()">确认提交</a></div>
    </div>
  </form>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
function upload_submit(){
	var size= $('#image_max_filesize').val();
	var ext= $('#image_allow_ext').val();
	if(size == ''){
		layer.msg('图片大小设置不能为空');
		return false;
	}
	if(ext == ''){
		layer.msg('图片格式设置不能为空');
		return false;
	}
	$.ajax({
		type: "post",
        url: "upload_submit",
        data: {size:size,ext:ext},
        dataType: "json",
        success: function(data){
		if(data.state=='403'){
							    login_ajax('admin',data);
							}else
        	if(data.state){
        		layer.msg(data.msg);
        	}
        }
	})
	
}
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
