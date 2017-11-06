<?php
/* Smarty version 3.1.29, created on 2017-08-03 11:46:16
  from "D:\www\yunjuke\application\admin\views\pic_mall_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59829c88787190_87979914',
  'file_dependency' => 
  array (
    '2c73d653363c99bdeab2fcaef2fde0f14f107280' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pic_mall_set.html',
      1 => 1492225943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59829c88787190_87979914 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3079459829c886fe5f6_59301980';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>图片设置</h3>
                <h5>商城相关图片及水印等参数设定</h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a class="current"><span>默认图片</span></a></li>
                <li><a href="pic_mall_watermark"><span>水印管理</span></a></li>
            </ul>
        </div>
    </div>
    <form method="post" enctype="" name="form1">
        <input type="hidden" name="form_submit" value="ok">

        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="">默认商品图片</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show"><span class="show">
                        <a class="nyroModal" rel="gal" href="">
                            <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo TEMPLE;?>
images/<?php echo $_smarty_tpl->tpl_vars['default_goods_image']->value;?>
" width=100px height=50px>'></i>
                        </a>
                    </span>
                    <span class="type-file-box">
                        <input class="type-file-file" id="default_goods_image" name="default_goods_image" type="file" size="30" hidefocus="true" nc_type="change_default_goods_image" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                     </span>
                    </div>
                    <p class="notic">300px * 300px</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="default_store_logo">默认店铺标志</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a class="nyroModal" rel="gal" href="">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo TEMPLE;?>
images/<?php echo $_smarty_tpl->tpl_vars['default_store_logo']->value;?>
" width=100px height=50px>'></i>
                            </a>
                        </span>
                        <span class="type-file-box">
                            <input class="type-file-file" id="default_store_logo" name="default_store_logo" type="file" size="30" hidefocus="true" nc_type="change_default_store_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span></div>
                    <p class="notic">200px * 60px</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="default_store_logo">默认店铺头像</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a class="nyroModal" rel="gal" href="">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo TEMPLE;?>
images/<?php echo $_smarty_tpl->tpl_vars['default_store_avatar']->value;?>
" width=100px height=50px>'></i>
                           </a>
                        </span>
                        <span class="type-file-box">
                            <input class="type-file-file" id="default_store_avatar" name="default_store_avatar" type="file" size="30" hidefocus="true" nc_type="change_default_store_avatar" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                    </div>
                    <p class="notic">100px * 100px</p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="submit()">确认提交</a></div>
        </div>
    </form>
</div>
<?php echo '<script'; ?>
>

    $(function(){
        // 模拟默认商品图片上传input type='file'样式
        var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='选择上传...' class='type-file-button' />"
        $(textButton).insertBefore("#default_goods_image");
        $("#default_goods_image").change(function(){
            $("#textfield1").val($("#default_goods_image").val());
        });
        // 模拟默认店铺图片上传input type='file'样式
        var textButton="<input type='text' name='textfield' id='textfield2' class='type-file-text' /><input type='button' name='button' id='button2' value='选择上传...' class='type-file-button' />"
        $(textButton).insertBefore("#default_store_logo");
        $("#default_store_logo").change(function(){
            $("#textfield2").val($("#default_store_logo").val());
        });
        // 模拟默认店铺图片上传input type='file'样式
        var textButton="<input type='text' name='textfield' id='textfield3' class='type-file-text' /><input type='button' name='button' id='button3' value='选择上传...' class='type-file-button' />"
        $(textButton).insertBefore("#default_store_avatar");
        $("#default_store_avatar").change(function(){
            $("#textfield3").val($("#default_store_avatar").val());
        })

    });
    function submit(){
   	 
   		 var form_data = new FormData($("form")[0]); 
   		 $.ajax({
   				type: "post",
   		        url: "pic_mall_set?op=edit",
   		        data: form_data,
   		        dataType: "json",
   		        processData: false,
   	            contentType: false,
   		        success: function(data){
   		        		layer.msg(data.msg);
   		        }
   			})
   	 
    }
<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
