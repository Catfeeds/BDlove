<?php
/* Smarty version 3.1.29, created on 2017-10-08 09:50:08
  from "D:\www\yunjuke\application\admin\views\mall_pic_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59d9845063df40_70141173',
  'file_dependency' => 
  array (
    '05a0bcd88e9bee23db003e3046ff5e8bd2d64b99' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\mall_pic_set.html',
      1 => 1505803589,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59d9845063df40_70141173 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2964859d984504d68f2_14661952';
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
                <li><a href="mall_pic_watermark"><span>水印管理</span></a></li>
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
                        <a class="nyroModal" rel="gal" href="javascript:void();">
                            <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['default_goods_image']->value;?>
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
                            <a class="nyroModal" rel="gal" href="javascript:void();">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['default_store_logo']->value;?>
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
                            <a class="nyroModal" rel="gal" href="javascript:void();">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['default_store_avatar']->value;?>
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
            
            
            <dl class="row">
                <dt class="tit">
                    <label for="default_guide_logo">默认导购头像</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a class="nyroModal" rel="gal" href="javascript:void();">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['default_guide_logo']->value;?>
" width=100px height=50px>'></i>
                           </a>
                        </span>
                        <span class="type-file-box">
                            <input class="type-file-file" id="default_guide_logo" name="default_guide_logo" type="file" size="30" hidefocus="true" nc_type="change_default_guide_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                    </div>
                    <p class="notic">100px * 100px</p>
                </dd>
            </dl>
            
            
            
            <dl class="row">
                <dt class="tit">
                    <label for="">默认淘宝店Logo</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show"><span class="show">
                        <a class="nyroModal" rel="gal" href="javascript:void();">
                            <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['default_tb_image']->value;?>
" width=100px height=50px>'></i>
                        </a>
                    </span>
                    <span class="type-file-box">
                        <input class="type-file-file" id="default_tb_image" name="default_tb_image" type="file" size="30" hidefocus="true" nc_type="change_default_goods_image" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                     </span>
                    </div>
                    <p class="notic">50px * 50px</p>
                </dd>
            </dl>
            
            <dl class="row">
                <dt class="tit">
                    <label for="default_store_logo">默认天猫店Logo</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a class="nyroModal" rel="gal" href="javascript:void();">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['default_tm_image']->value;?>
" width=100px height=50px>'></i>
                            </a>
                        </span>
                        <span class="type-file-box">
                            <input class="type-file-file" id="default_tm_image" name="default_tm_image" type="file" size="30" hidefocus="true" nc_type="change_default_store_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span></div>
                    <p class="notic">50px * 50px</p>
                </dd>
            </dl>
            
            <dl class="row">
                <dt class="tit">
                    <label for="default_store_logo">默认京东店Logo</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a class="nyroModal" rel="gal" href="javascript:void();">
                                <i class="fa fa-picture-o"  id="" data-geo='<img src="<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['default_jd_image']->value;?>
" width=100px height=50px>'></i>
                           </a>
                        </span>
                        <span class="type-file-box">
                            <input class="type-file-file" id="default_jd_image" name="default_jd_image" type="file" size="30" hidefocus="true" nc_type="change_default_store_avatar" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                    </div>
                    <p class="notic">50px * 50px</p>
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
        });
        
        
        
        // 模拟默认导购图片上传input type='file'样式
        var textButton="<input type='text' name='textfield' id='textfield5' class='type-file-text' /><input type='button' name='button' id='button1' value='选择上传...' class='type-file-button' />"
        $(textButton).insertBefore("#default_guide_logo");
        $("#default_guide_logo").change(function(){
            $("#textfield5").val($("#default_guide_logo").val());
        });
        
        
        // 模拟默认商品图片上传input type='file'样式
        var textButton="<input type='text' name='textfield' id='textfield4' class='type-file-text' /><input type='button' name='button' id='button1' value='选择上传...' class='type-file-button' />"
        $(textButton).insertBefore("#default_tb_image");
        $("#default_tb_image").change(function(){
            $("#textfield4").val($("#default_tb_image").val());
        });
        // 模拟默认店铺图片上传input type='file'样式
        var textButton="<input type='text' name='textfield' id='textfield5' class='type-file-text' /><input type='button' name='button' id='button2' value='选择上传...' class='type-file-button' />"
        $(textButton).insertBefore("#default_tm_image");
        $("#default_tm_image").change(function(){
            $("#textfield5").val($("#default_tm_image").val());
        });
        // 模拟默认店铺图片上传input type='file'样式
        var textButton="<input type='text' name='textfield' id='textfield6' class='type-file-text' /><input type='button' name='button' id='button3' value='选择上传...' class='type-file-button' />"
        $(textButton).insertBefore("#default_jd_image");
        $("#default_jd_image").change(function(){
            $("#textfield6").val($("#default_jd_image").val());
        })

    });
    function submit(){
   	 
   		 var form_data = new FormData($("form")[0]); 
   		 $.ajax({
   				type: "post",
   		        url: "mall_pic_set?op=edit",
   		        data: form_data,
   		        dataType: "json",
   		        processData: false,
   	            contentType: false,
   		        success: function(data){
   		        		layer.msg(data.msg);
   		        		setTimeout("window.location.reload();",2000);
   		        }
   			})
   	 
    }
<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
