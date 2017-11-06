<?php
/* Smarty version 3.1.29, created on 2017-08-01 18:02:01
  from "D:\www\yunjuke\application\admin\views\app_user_msg_push_group.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59805199583754_10906993',
  'file_dependency' => 
  array (
    'da275c032f86bde0297896f64ca17b41c07be25b' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\app_user_msg_push_group.html',
      1 => 1501581716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59805199583754_10906993 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '302045980519947dba1_89067215';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--
&lt;!&ndash;地区选择插件&ndash;&gt;
{insert_scripts files="../plugins/spinner/jquery-ui-1.10.4.custom.min.js,../plugins/dropdown/js/dependent-dropdown.min.js"}
-->
<body style="background-color: #FFF; overflow: auto;">

<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>推送消息</h3>
        <h5>创建推送</h5>
      </div>
      <ul class="tab-base nc-row">
						<li>
							<a class="current">群推</a>
						</li>
						<li>
							<a href="app_user_msg_push.html">个推</a>
						</li>
					</ul>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
      <ul>
      	<li>设置向微信用户推送消息</li>
      </ul>
  </div>
  <form method="post" action="" id="form1" name="form1">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><em>*</em>标题：</label>
        </dt>
        <dd class="opt">
          <input id="title" name="title" value="" class="input-txt" type="text" />
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><em>*</em>店铺：</label>
        </dt>
        <dd class="opt">
          <!--<select name="province_id" id="province_id">
		  <option>-请选择-</option>
		  {foreach from=$area_list item=item}
		  <option value="{$item.id}">{$item.name}</option>
		  {/foreach}
		  </select>
		  <select name="city_id" id="city_id">
		  <option>-请选择-</option></select>
		  <select name="area_id" id="area_id">
		  <option>-请选择-</option></select>-->
            <?php
$_from = $_smarty_tpl->tpl_vars['stores']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
            <input name="store[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['store_id'];?>
"/><?php echo $_smarty_tpl->tpl_vars['item']->value['store_name'];?>

            <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
          <span class="err" id="store"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="discrimination"><em>*</em>内容：</label>
        </dt>
        <dd class="opt">
          <textarea name="note" rows="6" class="tarea" id="note"></textarea>
          <span class="err"></span>
        </dd>
      </dl>
      <div class="bot">
          <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a>
      </div>
    </div>
  </form>
</div>
<div id="goTop">
    <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
    <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>

</body>
</html>
<?php echo '<script'; ?>
>
//按钮先执行验证再提交表单
$("#submitBtn").click(function(){
    if($("#form1").valid()){
        var store=$("input[type='checkbox']").is(":checked");
        if(store==false){
            $("#store").html('<label class="error">请选择店铺！</label>');
            return;
        }
        var fomedata = $("#form1").serialize();
        $.ajax({
            url:'../App/message_push_group',
            type:'post',
            data:fomedata,
            dataType:'json',
            success:function(data){
                if(data.state){
                    layer.msg(data.msg);
                    window.location.href = '../App/app_user_msg_manage';
                }else{
                    layer.msg('发送失败');
                }
            }
        });
      /*$("#form1").submit();*/
    }
});

$("#form1").validate({
	errorPlacement: function(error, element){
		var error_td = element.parent('dd').children('span.err');
        error_td.append(error);
    },
    rules : {
        title : {
            required : true,
        },
        note : {
            required : true,
        },
        store:{
            required : true,
        }
    },
    messages : {
    	title : {
            required : '<i class="fa fa-exclamation-circle"></i>标题不能为空',
        },
        note : {
            required : '<i class="fa fa-exclamation-circle"></i>内容不能为空',
        },
        store : {
            required : '<i class="fa fa-exclamation-circle"></i>内容不能为空',
        }
    }
});

// 高级搜索 获取地区
/*$("#city_id").depdrop({
    url: 'api.php?act=address',
    depends: ['province_id']
});
$("#area_id").depdrop({
    url: 'api.php?act=address',
    depends: ['city_id']
});*/

<?php echo '</script'; ?>
><?php }
}
