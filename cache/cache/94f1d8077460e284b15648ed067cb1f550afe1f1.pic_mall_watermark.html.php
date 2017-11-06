<?php
/* Smarty version 3.1.29, created on 2017-08-01 09:41:46
  from "D:\www\yunjuke\application\admin\views\pic_mall_watermark.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597fdc5a8687d9_58463428',
  'file_dependency' => 
  array (
    '94f1d8077460e284b15648ed067cb1f550afe1f1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pic_mall_watermark.html',
      1 => 1492225943,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1500948915,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_597fdc5a8687d9_58463428 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index_1.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/font-awesome.min.css" rel="stylesheet" />
<link href="http://[::1]/yunjuke/application/admin/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views/css/H-ui.min.css" />

<!--
<link type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
-->
<style type="text/css">
    html, body { overflow: visible;}
</style>

<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/common.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/script.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/zh-CN.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/admin.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/flexigrid.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.validation.min.js"></script>
<!-- <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.picTip.js"></script> -->
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

<script type="text/javascript">
/*ajax过期登录*/
function login_ajax(demo,data){
    layer.msg(data.msg);
     setTimeout(function(){
            if(demo=='agent'){
                window.location.href="http://[::1]/yunjuke/index.php/login";
            }else if(demo=='supp'){
                window.location.href="http://[::1]/yunjuke/supplier.php/login";
            }else if(demo=='admin'){
                window.location.href="http://[::1]/yunjuke/admin.php/login";
            }else if(demo=='shop'){
                window.location.href="http://[::1]/yunjuke/index.php/index/login";
            }else if(demo=='shopadmin'){
                window.location.href="http://[::1]/yunjuke/admin.php/index/login";
            }
        },2000);
}
</script>
</head>
<link href="http://[::1]/yunjuke/application/admin/views/css/admin_other.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/evol.colorpicker.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/evol.colorpicker.min.js"></script>


<body style="background-color: #FFF; overflow: auto;">
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>图片设置</h3>
                <h5>商城相关图片及水印等参数设定</h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a href="pic_mall_set"><span>默认图片</span></a></li>
                <li><a  class="current"><span>水印管理</span></a></li>
            </ul>
        </div>
    </div>
    <form method="post" action="mall_watermark_submit" enctype="multipart/form-data"  id="wm_form"  name="wm_form">
        <div class="ncsc-form-default">
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
                            <input type="radio" name="image_pos"  value="1" style="display: none;">
                            <label >左上</label>
                        </li>
                        <li>
                            <input type="radio" name="image_pos"  value="2" style="display: none;">
                            <label >正上</label>
                        </li>
                        <li>
                            <input type="radio"  name="image_pos" value="3" style="display: none;">
                            <label >右上</label>
                        </li>
                        <li>
                            <input type="radio"  name="image_pos" value="4" style="display: none;">
                            <label >左中</label>
                        </li>
                        <li>
                            <input type="radio"  name="image_pos" value="5" style="display: none;">
                            <label >中间</label>
                        </li>
                        <li>
                            <input type="radio"  name="image_pos" value="6" style="display: none;">
                            <label >右中</label>
                        </li>
                        <li>
                            <input type="radio" name="image_pos" value="7"  style="display: none;">
                            <label  >左下</label>
                        </li>
                        <li>
                            <input type="radio"  name="image_pos" value="8" style="display: none;">
                            <label >中下</label>
                        </li>
                        <li>
                            <input type="radio" checked name="image_pos" value="9" style="display: none;">
                            <label class="checked">右下</label>
                        </li>
                    </ul>
                    <p class="hint">选择水印图片放置位置</p>
                </dd>
            </dl>
            <dl>
                <dt>水印文字：</dt>
                <dd>
                    <p>
                        <textarea name="wm_text" class="textarea w200">wqt</textarea>
                    </p>
                    <p class="hint">水印文字,建议用字母和数字</p>
                </dd>
            </dl>
            <dl>
                <dt>文字大小：</dt>
                <dd><input id="wm_text_size" class="text w40 valid" type="number" name="wm_text_size" value="20"><em class="add-on">px</em><span class="err"></span>
                    <p class="hint">设置水印文字大小</p>
                </dd>
            </dl>
            <dl>
                <dt>文字颜色：</dt>
                <dd>
                    <p></p><div class="w160">
                    <div class="color">
                        <input id="wm_text_color" class="text w100 colorPicker evo-cp0" type="text" name="wm_text_color" value="#1f497d"><span class="err"></span>

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
                            <option value="texb.ttf">texb.ttf</option>
                                                         <option value="fontawesome-webfont.eot">fontawesome-webfont.eot</option>  
                                                         <option value="fontawesome-webfont.svg">fontawesome-webfont.svg</option>  
                                                         <option value="fontawesome-webfont.ttf">fontawesome-webfont.ttf</option>  
                                                         <option value="fontawesome-webfont.woff">fontawesome-webfont.woff</option>  
                                                         <option value="FontAwesome.otf">FontAwesome.otf</option>  
                                                         <option value="texb.ttf">texb.ttf</option>  
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
                            <input type="radio"  name="wm_text_pos" value="1" style="display: none;">
                            <label >左上</label>
                        </li>
                        <li>
                            <input type="radio"  name="wm_text_pos" value="2" style="display: none;">
                            <label >正上</label>
                        </li>
                        <li>
                            <input type="radio"  name="wm_text_pos" value="3" style="display: none;">
                            <label >右上</label>
                        </li>
                        <li>
                            <input type="radio"  name="wm_text_pos" value="4" style="display: none;">
                            <label >左中</label>
                        </li>
                        <li>
                            <input type="radio" checked name="wm_text_pos" value="5" style="display: none;">
                            <label class="checked">中间</label>
                        </li>
                        <li>
                            <input type="radio"  name="wm_text_pos" value="6" style="display: none;">
                            <label >右中</label>
                        </li>
                        <li>
                            <input type="radio"  name="wm_text_pos" value="7" style="display: none;">
                            <label >左下</label>
                        </li>
                        <li>
                            <input type="radio"  name="wm_text_pos" value="8" style="display: none;">
                            <label >中下</label>
                        </li>
                        <li>
                            <input type="radio"  name="wm_text_pos" value="9" style="display: none;">
                            <label >右下 </label>
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
<script>
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

</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
