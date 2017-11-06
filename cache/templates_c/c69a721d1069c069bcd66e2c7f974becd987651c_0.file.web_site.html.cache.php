<?php
/* Smarty version 3.1.29, created on 2017-04-24 09:10:03
  from "E:\www\yunjuke\application\admin\views\web_site.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd506bc1ea39_96688414',
  'file_dependency' => 
  array (
    'c69a721d1069c069bcd66e2c7f974becd987651c' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\admin\\views\\web_site.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_58fd506bc1ea39_96688414 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '608758fd506bb9f547_61478213';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
ul li{margin-top:8px;}
ul li span{display:inline-block;width:40px;}
#form_data ul li{float:left;margin-right:5px;}
</style>
<body style="background-color: #FFF; overflow: auto;">

<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>站点设置</h3>
        <h5>网站全局内容基本选项设置</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>网站全局基本设置，商城及其他模块相关内容在其各自栏目设置项内进行操作。</li>
    </ul>
  </div>
  <form method="post"  action="" name="form" id="form_data">
    
    <div class="ncap-form-default">
      <?php
$_from = $_smarty_tpl->tpl_vars['settings']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><?php if (!empty($_smarty_tpl->tpl_vars['v']->value['comments'])) {
echo $_smarty_tpl->tpl_vars['v']->value['comments'];
}?></label>
        </dt>
        <dd class="opt">
          <?php if ($_smarty_tpl->tpl_vars['k']->value == 'website_desc') {?>
          <textarea name="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" rows="6" class="tarea" id="discrimination"><?php if (!empty($_smarty_tpl->tpl_vars['v']->value['value'])) {
echo $_smarty_tpl->tpl_vars['v']->value['value'];
}?></textarea>
          <?php } elseif ($_smarty_tpl->tpl_vars['k']->value == 'weixin_code') {?>
          <div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i>
	          </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield1" class="type-file-text"> 
	          <input type="button" name="" id="button2" value="上传二维码" class="type-file-button"> 
	          <input class="type-file-file valid" id="import_excel1" name="weixin_code" type="file" hidefocus="true" nc_type="cms_image">
	          </span></div><div class="err pos-a" style="bottom: -10px;"></div>
	      <?php } elseif ($_smarty_tpl->tpl_vars['k']->value == 'shop_code') {?>
	          <div class="input-file-show"> <span class="show"> <a class="nyroModal" rel="gal" href=""> <i class="fa fa-file-excel-o"></i>
	          </a> </span> <span class="type-file-box"> <input type="text" name="" id="textfield2" class="type-file-text"> 
	          <input type="button" name="" id="button2" value="上传二维码" class="type-file-button"> 
	          <input class="type-file-file valid" id="import_excel2" name="shop_code" type="file" hidefocus="true" nc_type="cms_image">
	          </span></div><div class="err pos-a" style="bottom: -10px;"></div>
          <?php } else { ?>
          <input id="site_name" name="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php if (!empty($_smarty_tpl->tpl_vars['v']->value['value'])) {
echo $_smarty_tpl->tpl_vars['v']->value['value'];
}?>" class="input-txt site_name" type="text" />
          <?php }?>
          
          <p class="notic"><?php echo $_smarty_tpl->tpl_vars['v']->value['explain'];?>
</p> 
        </dd>
      </dl>
      <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
      <div class="bot">
          <a href="JavaScript:void(0);" class="btn btn-warning radius" onclick="web_edit()">确认提交</a>
      </div>
    </div>
  </form>
</div>
<div id="goTop">
    <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
    <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
		//上传显示
        $("#import_excel1").change(function () {
            $("#textfield1").val($(this).val());
        });
		$("#import_excel2").change(function () {
            $("#textfield2").val($(this).val());
        });
function web_edit(){
	var str = true;
	var form_data = new FormData($("#form_data")[0]);  
	/*var site_name = new Array();
	$(".site_name").each(function(){
		if($(this).val()==''){
			layer.msg('请确认信息填写完整');
			str = false;
		}
		 site_name.push($(this).val()); 
	});*/
	var note = $("#discrimination").val();
	if(str){
		$.ajax({
			type: "post",
	        url: "Web/web_edit",
	        data: form_data,
	        dataType: "json",
	        processData: false,
            contentType: false,
	        success: function(data){
			if(data.state=='403'){
				login_ajax('shopadmin');return false;
			}
	        	if(data.state){
	        		layer.msg(data.msg);
	        	}else{
	        		layer.msg(data.msg);
	        	}
	        }
		})
	}
	
     //alert(site_name);
	
}
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
