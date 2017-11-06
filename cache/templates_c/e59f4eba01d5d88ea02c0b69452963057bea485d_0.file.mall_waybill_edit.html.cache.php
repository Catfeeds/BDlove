<?php
/* Smarty version 3.1.29, created on 2017-08-12 15:45:39
  from "D:\www\yunjuke\application\admin\views\mall_waybill_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598eb223a779e6_56118989',
  'file_dependency' => 
  array (
    'e59f4eba01d5d88ea02c0b69452963057bea485d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_waybill_edit.html',
      1 => 1500948914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_598eb223a779e6_56118989 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '7587598eb22371c324_00128939';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">


<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="javascript:history.back(-1)" title="返回运单模板列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>运单模板 - <?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {?>编辑"<?php echo $_smarty_tpl->tpl_vars['data']->value['waybill_name'];?>
"<?php } else { ?>添加<?php }?>运单模板</h3>
                <h5>预设供商家选择的运单快递模板</h5>
            </div>
        </div>
    </div>
    <form id="add_form" method="post" action="mall_waybill_submit" enctype="multipart/form-data">
        <input type="hidden" name="waybill_id" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {
echo $_smarty_tpl->tpl_vars['data']->value['waybill_id'];
}?>">
        <input type="hidden" name="old_waybill_image" value="">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_name"><em>*</em>模板名称</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {
echo $_smarty_tpl->tpl_vars['data']->value['waybill_name'];
}?>" name="waybill_name" id="waybill_name" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">运单模板名称，最多10个字</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_name"><em>*</em>物流公司</label>
                </dt>
                <dd class="opt">
                    <select name="waybill_express">
                        <?php if (isset($_smarty_tpl->tpl_vars['express']->value)) {?>
                           <option value="">-请选择-</option>
                         <?php
$_from = $_smarty_tpl->tpl_vars['express']->value;
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
                           <option value="<?php if (isset($_smarty_tpl->tpl_vars['v']->value['id'])) {
echo $_smarty_tpl->tpl_vars['v']->value['id'];
}?>"><?php if (isset($_smarty_tpl->tpl_vars['v']->value['e_name'])) {
echo $_smarty_tpl->tpl_vars['v']->value['e_name'];
}?></option>
                         <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
                        <?php } else { ?>
                         <option value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {
echo $_smarty_tpl->tpl_vars['data']->value['express_id'];
}?>"><?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {
echo $_smarty_tpl->tpl_vars['data']->value['express_name'];
}?></option>
                        <?php }?>
                        
                    </select>
                    <span class="err"></span>
                    <p class="notic">模板对应的物流公司</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_width"><em>*</em>宽度</label>
                </dt>
                <dd class="opt">
                    <input type="number" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {
echo $_smarty_tpl->tpl_vars['data']->value['waybill_width'];
} else { ?>229<?php }?>" name="waybill_width" id="waybill_width" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">运单宽度，单位为毫米(mm)</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_height"><em>*</em>高度</label>
                </dt>
                <dd class="opt">
                    <input type="number" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {
echo $_smarty_tpl->tpl_vars['data']->value['waybill_height'];
} else { ?>127<?php }?>" name="waybill_height" id="waybill_height" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">运单高度，单位为毫米(mm)</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_top"><em>*</em>上偏移量</label>
                </dt>
                <dd class="opt">
                    <input type="number" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {
echo $_smarty_tpl->tpl_vars['data']->value['waybill_top'];
} else { ?>-3<?php }?>" name="waybill_top" id="waybill_top" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">运单模板上偏移量，单位为毫米(mm)</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_left"><em>*</em>左偏移量</label>
                </dt>
                <dd class="opt">
                    <input type="number" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {
echo $_smarty_tpl->tpl_vars['data']->value['waybill_left'];
} else { ?>-5<?php }?>" name="waybill_left" id="waybill_left" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">运单模板左偏移量，单位为毫米(mm)</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_image"><em>*</em>模板图片</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show"><a class="nyroModal" rel="gal">
                            <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {
echo TEMPLE;?>
images/<?php echo $_smarty_tpl->tpl_vars['data']->value['waybill_image'];
}?>" width=100px height=50px>'></i>
                        </a></span>
                        <span class="type-file-box">
                            <input type="text" name="textfield" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {
echo $_smarty_tpl->tpl_vars['data']->value['waybill_image'];
}?>" id="textfield" class="type-file-text">
                            <input type="button" name="button" id="button" value="选择上传..." class="type-file-button">
                            <input name="waybill_image" type="file" class="type-file-file" id="waybill_image" size="30" hidefocus="true" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                    </div>
                    <span class="err"></span>
                    <p class="notic">请上传扫描好的运单图片，图片尺寸必须与快递单实际尺寸相符</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="waybill_image"><em>*</em>启用</label>
                </dt>
                <dd class="opt">
                    <div class="onoff">
                        <input id="status_1" type="radio" name="status" value="1" <?php if (isset($_smarty_tpl->tpl_vars['data']->value) && $_smarty_tpl->tpl_vars['data']->value['status'] == 1) {?> checked  <?php } else { ?> checked <?php }?> >
                        <label for="status_1" class="cb-enable <?php if (isset($_smarty_tpl->tpl_vars['data']->value) && $_smarty_tpl->tpl_vars['data']->value['status'] == 1) {?>selected<?php }?>">是</label>
                        <input id="status_0" type="radio" name="status" value="0" <?php if (isset($_smarty_tpl->tpl_vars['data']->value) && $_smarty_tpl->tpl_vars['data']->value['status'] != 1) {?> checked <?php }?> >
                        <label for="status_0" class="cb-disable <?php if (isset($_smarty_tpl->tpl_vars['data']->value) && $_smarty_tpl->tpl_vars['data']->value['status'] == 0) {?>selected<?php }?>">否</label>
                    </div>
                    <p class="notic">请首先设计并测试模板然后再启用，启用后商家可以使用 </p>
                </dd>
            </dl>
            <div class="bot"><a id="submit" href="javascript:void(0)" class="ncap-btn-big ncap-btn-green">确认提交</a></div>
        </div>
    </form>
</div>
<?php echo '<script'; ?>
>

    $(document).ready(function(){
        //上传显示
        $("#waybill_image").change(function () {
            $("#textfield").val($(this).val());
        });
        $("#submit").click(function(){
            if($("#add_form").valid()){
                $("#add_form").submit();
            }
        });
        $('#add_form').validate({
            errorPlacement: function(error, element){
                var error_td = element.parents('dd').children('span.err');
                error_td.append(error);
            },
            rules : {
                waybill_name: {
                    required : true,
                    maxlength : 10
                },
                waybill_width: {
                    required : true,
                    digits: true
                },
                waybill_height: {
                    required : true,
                    digits: true
                },
                waybill_top: {
                    required : true,
                    number: true
                },
                waybill_left: {
                    required : true,
                    number: true
                },
                waybill_image: {
                    
                    accept: "jpg|jpeg|png|gif"
                }
            },
            messages : {
                waybill_name: {
                    required : "<i class='fa fa-exclamation-circle'></i>模板名称不能为空",
                    maxlength : "<i class='fa fa-exclamation-circle'></i>模板名称最多10个字"
                },
                waybill_width: {
                    required : "<i class='fa fa-exclamation-circle'></i>宽度不能为空",
                    digits: "<i class='fa fa-exclamation-circle'></i>宽度必须为数字"
                },
                waybill_height: {
                    required : "<i class='fa fa-exclamation-circle'></i>高度不能为空",
                    digits: "<i class='fa fa-exclamation-circle'></i>高度必须为数字"
                },
                waybill_top: {
                    required : "<i class='fa fa-exclamation-circle'></i>上偏移量不能为空",
                    number: "<i class='fa fa-exclamation-circle'></i>上偏移量必须为数字"
                },
                waybill_left: {
                    required : "<i class='fa fa-exclamation-circle'></i>左偏移量不能为空",
                    number: "<i class='fa fa-exclamation-circle'></i>左偏移量必须为数字"
                },
                waybill_image: {
                    
                    accept: '<i class="fa fa-exclamation-circle"></i>图片类型不正确'
                }
            }
        });
    });

<?php echo '</script'; ?>
>
<div id="goTop"><a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
