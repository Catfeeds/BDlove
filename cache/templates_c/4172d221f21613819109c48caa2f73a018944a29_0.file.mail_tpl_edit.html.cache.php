<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:37:48
  from "D:\www\yunjuke\application\admin\views\mail_tpl_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5984163c760e10_03027601',
  'file_dependency' => 
  array (
    '4172d221f21613819109c48caa2f73a018944a29' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mail_tpl_edit.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_5984163c760e10_03027601 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '153085984163c6479d2_95622762';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- 配置文件 -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/ueditor.config.js"><?php echo '</script'; ?>
>
<!-- 编辑器源码文件 -->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PLUGIN;?>
plugins/UEditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo PLUGIN;?>
plugins/UEditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title"><a class="back" href="javascript:history.back(-1);" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3>邮件模版- 编辑模板</h3>
        <h5>平台邮件消息模板设定</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
    
      	<li>插入的变量必需包括花括号“{}”，当应用范围不支持该变量时，该变量将不会在前台显示(变量后边的分隔符也不会显示)，留空为系统默认设置。</li>
		<li>变量函数说明：站点名称 {$site_name} | 时间点 {$send_time} | 验证码 {$verify_code} | 自提码 {$pickup_code}。</li>
	
    </ul>
  </div>
  <form id="form_templates" method="post" action="../tp_edit/<?php echo $_smarty_tpl->tpl_vars['tpl_list']->value['template_id'];?>
" name="form1">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="code" value="<?php echo $_smarty_tpl->tpl_vars['tpl_list']->value['template_code'];?>
" />
    <div class="ncap-form-default">
      <div class="title">
        <h3><strong>[修改]</strong><?php echo $_smarty_tpl->tpl_vars['tpl_list']->value['template_code'];?>
</h3>
      </div>
      <dl class="row">
        <dt class="tit">
          <label><em>*</em>标题</label>
        </dt>
        <dd class="opt">
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['tpl_list']->value['template_subject'];?>
" name="title" class="input-txt">
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label><em>*</em>正文</label>
        </dt>
        <dd class="opt">
        	<div class="" style="width: 70%;">
                <!-- 加载编辑器的容器 -->
                <?php echo '<script'; ?>
 id="content" name="content" type="text/plain"><?php echo $_smarty_tpl->tpl_vars['tpl_list']->value['template_content'];
echo '</script'; ?>
>
                <!-- 实例化编辑器 -->
                <?php echo '<script'; ?>
 type="text/javascript">
                    var ue = UE.getEditor('content');
                <?php echo '</script'; ?>
>

            </div>
        </dd>
      </dl>
      <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="put_it">确认提交</a></div>
    </div>
  </form>
</div>

<?php echo '<script'; ?>
>
   
	$(document).ready(function(){
		$("#put_it").click(function(){
			var data = $("form").serialize();
			$.ajax({
				type:'POST',
				data:data,
				url:'../tp_edit/<?php echo $_smarty_tpl->tpl_vars['tpl_list']->value['template_id'];?>
',
				errer:function(){
					layer.alert('修改失败');
				},
				success:function(data){
					layer.alert(data,{
						icon: 1,
						skin: 'layer-ext-moon'
					},
					function(){
						history.go(-1);
					});
				},
				dataType:'json'
			});
		});
	});
<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
