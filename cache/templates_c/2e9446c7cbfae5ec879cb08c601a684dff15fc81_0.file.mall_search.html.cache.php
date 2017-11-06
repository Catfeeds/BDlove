<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:40:56
  from "D:\www\yunjuke\application\admin\views\mall_search.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598416f8c0f335_44573096',
  'file_dependency' => 
  array (
    '2e9446c7cbfae5ec879cb08c601a684dff15fc81' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_search.html',
      1 => 1492225974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598416f8c0f335_44573096 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '13725598416f8aee1f2_59450693';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>搜索设置</h3>
                <h5>热搜词与默认词设置</h5>
            </div>
    </div>
        <form id="form" method="post" name="settingForm">
            <input type="hidden" name="form_submit" value="ok">
            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label for="hot_search">搜索默认词</label>
                    </dt>
                    <dd class="opt">
                        <input id="hot_search" name="hot_search" value="<?php echo $_smarty_tpl->tpl_vars['default_hot_search']->value;?>
" class="input-txt" type="text">
                        <span class="err"></span>
                        <p class="notic">搜索默认词设置后，将显示在前台搜索框下面，前台点击时直接作为关键词进行搜索，多个关键词间请用半角逗号 "," 隔开</p>
                    </dd></dl>
                <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
            </div>
        </form>
</div>
<?php echo '<script'; ?>
>
$("#submitBtn").click(function(){
	if($("#form").valid()){
		form_data = $("#form").serialize();
		//console.log(form_data)
		$.ajax({
			type: "post",
	        url: "mall_search?op=edit",
	        data: form_data,
	        dataType: "json",
	        success: function(data){
	        		layer.msg(data.msg);
	        }
		})
		
	}
});
$('#form').validate({
	errorPlacement: function(error, element){
		var error_td = element.parent('dd').children('span.err');
		error_td.append(error);
	},
	rules : {
		hot_search: {required : true,}
	},
	messages : {
		hot_search : {required: '<i class="fa fa-exclamation-circle"></i>请先输入关键字，多个关键词间请用半角逗号 "," 隔开'}

	}
});

<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a
        href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
