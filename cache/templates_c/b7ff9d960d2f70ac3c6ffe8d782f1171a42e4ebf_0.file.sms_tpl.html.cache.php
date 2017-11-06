<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:31:48
  from "D:\www\yunjuke\application\admin\views\sms_tpl.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fda04936bd2_80253424',
  'file_dependency' => 
  array (
    'b7ff9d960d2f70ac3c6ffe8d782f1171a42e4ebf' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\sms_tpl.html',
      1 => 1492252010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597fda04936bd2_80253424 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '947597fda04831010_44715692';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>短信模版</h3>
        <h5>平台发送短信的模版</h5>
      </div>
      <ul class="tab-base nc-row"><li><a href="set" ><span>接口设置</span></a></li><li><a  class="current"><span>短信模版</span></a></li><li><a href="log" ><span>短信日志</span></a></li></ul> </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>系统自动给注册用户发送手机短信等信息所使用的模板，可根据需求编辑其中内容。</li>
    </ul>
  </div>
  <form name='form1' method='post'>
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="submit_type" id="submit_type" value="" />
    <table class="flex-table">
      <thead>
        <tr>
          <th width="24" align="center" class="sign"><i class="ico-check"></i></th>
          <th width="200" align="center" class="handle-s">操作</th>
          <th width="400" align="left">模板描述</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          <?php if (!empty($_smarty_tpl->tpl_vars['sms_tpl']->value)) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['sms_tpl']->value;
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
        <tr>
          <td class="sign"><i class="ico-check"></i></td>
          <td class="handle-s">
            <a class="btn blue" href="tp_change/<?php echo $_smarty_tpl->tpl_vars['v']->value['template_id'];?>
"><i class="fa fa-pencil-square-o"></i>编辑</a>
          </td>
          <td><strong>[用户]</strong><?php echo $_smarty_tpl->tpl_vars['v']->value['template_subject'];?>
</td>
          <td><strong>[模板ID]</strong><?php echo $_smarty_tpl->tpl_vars['v']->value['template_sms_id'];?>
</td>
		  <td><strong>[内容]</strong><?php echo $_smarty_tpl->tpl_vars['v']->value['template_content'];?>
</td>
          <td></td>
        </tr>
        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
        <?php } else { ?>
            <tr><td colspan="100" class="no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</td></tr>
        <?php }?>
      </tbody>
    </table>
  </form>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['templates']->value;?>
/js/jquery.edit.js" charset="utf-8"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript">

$(function(){
	$('.flex-table').flexigrid({
		height:'auto',// 高度自动
		usepager: false,// 不翻页
		striped: true,// 使用斑马线
		resizable: false,// 不调节大小
		title: '短信模板列表',// 表格标题
		reload: false,// 不使用刷新
		columnControl: false// 不使用列控制      
		});
});
<?php echo '</script'; ?>
><div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
