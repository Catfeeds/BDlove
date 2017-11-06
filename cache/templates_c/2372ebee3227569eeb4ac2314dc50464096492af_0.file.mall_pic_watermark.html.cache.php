<?php
/* Smarty version 3.1.29, created on 2017-08-04 14:38:40
  from "D:\www\yunjuke\application\admin\views\mall_pic_watermark.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59841670388591_21931729',
  'file_dependency' => 
  array (
    '2372ebee3227569eeb4ac2314dc50464096492af' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_pic_watermark.html',
      1 => 1492225917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59841670388591_21931729 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '24835984167008e952_58187153';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo TEMPLE;?>
css/evol.colorpicker.css" rel="stylesheet" type="text/css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/evol.colorpicker.min.js"><?php echo '</script'; ?>
>


<body style="background-color: #FFF; overflow: auto;">
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>图片设置</h3>
                <h5>商城相关图片及水印等参数设定</h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a href="mall_pic_set"><span>默认图片</span></a></li>
                <li><a  class="current"><span>水印管理</span></a></li>
            </ul>
        </div>
    </div>
    <form method="post" action="mall_watermark_submit" enctype="multipart/form-data"  id="wm_form"  name="wm_form">
        <div class="ncsc-form-default">
            <dl class="row">
				<dt class="tit">
					<label>是否开启水印</label>
				</dt>
				<dd class="opt">
					<div class="onoff">
						<label for="qq_isuse_1" class="cb-enable <?php if (isset($_smarty_tpl->tpl_vars['water_state']->value) && $_smarty_tpl->tpl_vars['water_state']->value == 1) {?>selected<?php }?> " title="开启"><span>开启</span></label>
						<label for="qq_isuse_0" class="cb-disable <?php if (isset($_smarty_tpl->tpl_vars['water_state']->value) && $_smarty_tpl->tpl_vars['water_state']->value == 0) {?>selected<?php }?>  " title="关闭"><span>关闭</span></label>
						<input type="radio" id="qq_isuse_1" name="qq_isuse"  <?php if (isset($_smarty_tpl->tpl_vars['water_state']->value) && $_smarty_tpl->tpl_vars['water_state']->value == 1) {?>checked<?php }?>   value="1"  >
						<input type="radio" id="qq_isuse_0" name="qq_isuse"  <?php if (isset($_smarty_tpl->tpl_vars['water_state']->value) && $_smarty_tpl->tpl_vars['water_state']->value == 0) {?>checked<?php }?> value="0"  >
					</div>
					<p class="notic">开启水印则图片才会添加水印</p>
				</dd>
			</dl>
            <dl>
                <dt>水印图片：</dt>
                <dd>
                    <div class="ncsc-upload-thumb watermark-pic"><p><i class="fa fa-photo"></i></p></div>
                    <div class="ncsc-upload-btn">
                        <a href="javascript:void(0);">
                            <span>
                              <input type="file" hidefocus="true" size="1" class="input-file" name="image" id="image" nc_type="logo">
                            </span>
                            <p><i class="fa fa-upload"></i>图片上传</p>
                        </a>
                    </div>
                    <p class="hint">请选择水印图片</p>
                </dd>
            </dl>
            <dl>
                <dt>图片位置：</dt>
                <dd>
                    <ul class="ncsc-watermark-pos" id="wm_image_pos">
                        <li>
                            <input type="radio" name="image_pos" <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 1) {?>checked<?php }?> value="1" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 1) {?>class="checked"<?php }?>>左上</label>
                        </li>
                        <li>
                            <input type="radio" name="image_pos" <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 2) {?>checked<?php }?> value="2" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 2) {?>class="checked"<?php }?>>正上</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 3) {?>checked<?php }?> name="image_pos" value="3" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 3) {?>class="checked"<?php }?>>右上</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 4) {?>checked<?php }?> name="image_pos" value="4" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 4) {?>class="checked"<?php }?>>左中</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 5) {?>checked<?php }?> name="image_pos" value="5" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 5) {?>class="checked"<?php }?>>中间</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 6) {?>checked<?php }?> name="image_pos" value="6" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 6) {?>class="checked"<?php }?>>右中</label>
                        </li>
                        <li>
                            <input type="radio" name="image_pos" value="7" <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 7) {?>checked<?php }?> style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 7) {?>class="checked"<?php }?> >左下</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 8) {?>checked<?php }?> name="image_pos" value="8" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 8) {?>class="checked"<?php }?>>中下</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 9) {?>checked<?php }?> name="image_pos" value="9" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_overlay']->value['wm_number_alignment'] == 9) {?>class="checked"<?php }?>>右下</label>
                        </li>
                    </ul>
                    <p class="hint">选择水印图片放置位置</p>
                </dd>
            </dl>
            <dl>
                <dt>水印文字：</dt>
                <dd>
                    <p>
                        <textarea name="wm_text" class="textarea w200"><?php echo $_smarty_tpl->tpl_vars['water_text']->value['wm_text'];?>
</textarea>
                    </p>
                    <p class="hint">水印文字,建议用字母和数字</p>
                </dd>
            </dl>
            <dl>
                <dt>文字大小：</dt>
                <dd><input id="wm_text_size" class="text w40 valid" type="number" name="wm_text_size" value="<?php echo $_smarty_tpl->tpl_vars['water_text']->value['wm_font_size'];?>
"><em class="add-on">px</em><span class="err"></span>
                    <p class="hint">设置水印文字大小</p>
                </dd>
            </dl>
            <dl>
                <dt>文字颜色：</dt>
                <dd>
                    <p></p><div class="w160">
                    <div class="color">
                        <input id="wm_text_color" class="text w100 colorPicker evo-cp0" type="text" name="wm_text_color" value="<?php echo $_smarty_tpl->tpl_vars['water_text']->value['wm_font_color'];?>
"><span class="err"></span>

                    </div>
                </div>
                    <div id="colorpanel" style="display:none;width:253px;height:177px;"></div><p></p>
                    <p class="hint" style="clear: both;">水印字体的颜色值</p>
                </dd>
            </dl>
            <dl>
                <dt>文字字体：</dt>
                <dd>
                    <p>
                        <select name="wm_text_font" class="w80">
                            <option value="<?php if (!empty($_smarty_tpl->tpl_vars['water_text']->value['wm_font_path'])) {
echo $_smarty_tpl->tpl_vars['water_text']->value['wm_font_path'];
}?>"><?php if (!empty($_smarty_tpl->tpl_vars['water_text']->value['wm_font_path'])) {
echo $_smarty_tpl->tpl_vars['water_text']->value['wm_font_path'];
} else { ?>-请选择-<?php }?></option>
                            <?php
$_from = $_smarty_tpl->tpl_vars['font_file']->value;
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
                             <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>  
                            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
                        </select>
                    </p>
                    <p class="hint">水印文字的字体,如果文字使用汉字则管理员要安装中文的字体</p>
                </dd>
            </dl>
            <dl>
                <dt>文字位置：</dt>
                <dd>
                    <ul class="ncsc-watermark-pos" id="wm_text_pos">

                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 1) {?>checked<?php }?> name="wm_text_pos" value="1" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 1) {?>class="checked"<?php }?>>左上</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 2) {?>checked<?php }?> name="wm_text_pos" value="2" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 2) {?>class="checked"<?php }?>>正上</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 3) {?>checked<?php }?> name="wm_text_pos" value="3" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 3) {?>class="checked"<?php }?>>右上</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 4) {?>checked<?php }?> name="wm_text_pos" value="4" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 4) {?>class="checked"<?php }?>>左中</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 5) {?>checked<?php }?> name="wm_text_pos" value="5" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 5) {?>class="checked"<?php }?>>中间</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 6) {?>checked<?php }?> name="wm_text_pos" value="6" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 6) {?>class="checked"<?php }?>>右中</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 7) {?>checked<?php }?> name="wm_text_pos" value="7" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 7) {?>class="checked"<?php }?>>左下</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 8) {?>checked<?php }?> name="wm_text_pos" value="8" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 8) {?>class="checked"<?php }?>>中下</label>
                        </li>
                        <li>
                            <input type="radio" <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 9) {?>checked<?php }?> name="wm_text_pos" value="9" style="display: none;">
                            <label <?php if ($_smarty_tpl->tpl_vars['water_text']->value['wm_number_alignment'] == 9) {?>class="checked"<?php }?>>右下 </label>
                        </li>
                    </ul>
                </dd>
            </dl>
            <div class="bottom">
                <label class="submit-border"><input type="submit" class="submit" id="water_button" value="提交"></label>
            </div>
        </div>
    </form>
</div>
<?php echo '<script'; ?>
>
    var SITEURL = "";
    $(function(){
        $("div").cssRadio();
        $('#wm_text_color').colorpicker({showOn:'both'});
        $('#wm_text_color').parent().css("width",'');
        $('#wm_text_color').parent().addClass("color");
        $('#del_image').click(function (){
            var result = confirm('确定删除水印图片?');
            if (result)
            {
                $('#image').css('display','none');
                $('#del_image').css('display','none');
                $('#is_del_image').val('ok');
                $('#wm_form').submit();
            }
        });
        /*表单验证*/
        $(".bottom .submit").click(function(){
            if($("#wm_form").valid()){
                $("#wm_form").submit();
            }
        })
        $('#wm_form').validate({
            errorPlacement: function(error, element){
                var error_td = element.nextAll('span.err');
                error_td.append(error);
            },
            rules : {
                wm_text_size : {
                    required : true,
                    number : true
                },
                wm_text_color : {
                    required : true,
                    maxlength : 7
                }
            },
            messages : {
                wm_text_size : {
                    required : '<i class="fa fa-exclamation-circle"></i>水印文字大小不能为空',
                    number : '<i class="fa fa-exclamation-circle"></i>水印文字大小必须为数字'
                },
                wm_text_color : {
                    required : '<i class="fa fa-exclamation-circle"></i>水印字体颜色不能为空',
                    maxlength : '<i class="fa fa-exclamation-circle"></i>字体颜色值格式不正确'
                }
            }
        });
        
        
    });

    jQuery.fn.cssRadio = function () {
        $(":input[type=radio] + label").each( function(){
                    if ( $(this).prev()[0].checked )
                        $(this).addClass("checked");
                })
                .hover(
                        function() { $(this).addClass("over"); },
                        function() { $(this).removeClass("over"); }
                )
                .click( function() {
                    var contents = $(this).parent().parent(); /*多组控制 关键*/
                    $(":input[type=radio] + label", contents).each( function() {
                        $(this).prev()[0].checked=false;
                        $(this).removeClass("checked");
                    });
                    $(this).prev()[0].checked=true;
                    $(this).addClass("checked");
                }).prev().hide();
    };

<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
