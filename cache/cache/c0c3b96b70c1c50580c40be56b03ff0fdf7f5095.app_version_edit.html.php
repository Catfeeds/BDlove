<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:49:45
  from "D:\www\yunjuke\application\admin\views\app_version_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59804eb9b73867_14910211',
  'file_dependency' => 
  array (
    'c0c3b96b70c1c50580c40be56b03ff0fdf7f5095' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\app_version_edit.html',
      1 => 1496230488,
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
function content_59804eb9b73867_14910211 ($_smarty_tpl) {
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
<body style="background-color: #FFF; overflow: auto;">
<div id="toolTipLayer" style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 227px; top: 352px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
        <a class="back" href="javascript:history.back();" title="返回列表">
            <i class="fa fa-arrow-circle-o-left"></i>
        </a>
        <div class="subject">
            <h3>APP版本 - 添加编辑</h3>
            <h5>APP版本添加与管理</h5>
        </div>
    </div>
  </div>
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span>
        </div>
        <ul>
            <li>显示位置如果选择APP端，则显示在APP端。如果选择PC端就显示在PC端。</li>
        </ul>
    </div>
    <form id="form" method="post" action="">
                <input type="hidden" name="id" value="8">
            <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="ac_name"><em>*</em>客户端设备</label>
        </dt>
        <dd class="opt">
          <select id="app" name="app_id">
              <option value="">--请选择--</option>
             <!-- <option value="1" id="ap1" >安卓pad</option>-->
              <option value="1" id="ap1" >安卓手机</option>
              <option value="2" id="ap2" selected>ios手机</option>
              <option value="3" id="ap3" >ipad</option>
              <!--<option value="5" id="ap5" >winphone</option>-->
          </select>
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
        <dl class="row">
            <dt class="tit">
                <label for="ac_sort">小版本号</label>
            </dt>
            <dd class="opt">
                <input type="text" value="0" name="version_mini" class="input-txt">
                <span class="err"></span>
                <p class="notic"></p>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label for="ac_sort">版本标识</label>
            </dt>
            <dd class="opt">
                <input type="text" value="20" name="version_code" class="input-txt">
                <span class="err"></span>
                <p class="notic"></p>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label for="ac_sort">安装包地址</label>
            </dt>
            <dd class="opt">
                <input type="text" value="http://www.jukeyunduan.com/data/app/android.apk" name="apk_url" class="input-txt">
                <span class="err"></span>
                <p class="notic"></p>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label for="ac_sort">升级提示</label>
            </dt>
            <dd class="opt">
                <textarea name="upgrade_point" class="tarea" rows="6">1修正商品的添加的步骤；2新增快速发货；聊天窗口的实现</textarea>
                <span class="err"></span>
                <p class="notic"></p>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label for="taobao_app_key">是否升级</label>
            </dt>
            <dd class="opt">
                <div class="onoff">
                    <!--<label for="cm_comment_0" class="btn radius isupdate " title="不升级">不升级</label>-->
                    <label for="cm_comment_1" class="cb-enable selected " title="升级">升级</label>
                    <label for="cm_comment_2" class="cb-disable " title="强制升级">强制升级</label>
                    <!--<input type="radio" id="cm_comment_0" name="type" value="0" >-->
                    <input type="radio" id="cm_comment_1" name="type" value="1" checked="checked">
                    <input type="radio" id="cm_comment_2" name="type" value="2" >
                </div>
                <p class="notic"></p>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label for="taobao_app_key">是否可用</label>
            </dt>
            <dd class="opt">
                <div class="onoff">
                    <label for="cms_comment_1" class="cb-enable selected" id="cb" title="开启">可用</label>
                    <label for="cms_comment_0" class="cb-disable " id="bc" title="关闭">不可用</label>
                    <input type="radio" id="cms_comment_1" name="status" value="1" checked="checked">
                    <input type="radio" id="cms_comment_0" name="status" value="0" >
                </div>
                <p class="notic"></p>
            </dd>
        </dl>
      <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="sub">确认提交</a></div>
    </div>
  </form>
</div>
<script>
//按钮先执行验证再提交表单
$(function(){
    $("#sub").click(function(){
        if($("#form").valid()){
            var fomedata = $("#form").serialize();
            $.ajax({
                url:'../app_version_add_edit',
                type:'post',
                data:fomedata,
                dataType:'json',
                success:function(data){
                    if(data.state){
                        layer.msg('操作成功');
                        window.location.href = '../app_version_manage';

                    }else{
                        layer.msg('操作失败');
                    }
                }
            });
        }
    });
});
//
$(document).ready(function(){
    $('#form').validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('dd').children('span.err');
            error_td.append(error);
        },
        rules : {
            app_id : {
                required   : true
            },
            version_mini : {
                required   : true
            },
            version_code : {
                required   : true,
                rangelength : [0,10]
            },
            cate_name : {
            	required   : true
            },
            apk_url : {
            	required   : true
            }
        },
        messages : {
            app_id : {
                required   : '<i class="fa fa-exclamation-circle"></i>请选择客户端'
            },
            version_mini : {
                required   : '<i class="fa fa-exclamation-circle"></i>请填写版本号'
            },
            version_code : {
                required   : '<i class="fa fa-exclamation-circle"></i>请填写版本标识',
                rangelength : '<i class="fa fa-exclamation-circle"></i>请填写版本标识长度为10'
            },
            cate_name : {
                required : '<i class="fa fa-exclamation-circle"></i>请填写分类名称'
            },
            apk_url : {
                required : '<i class="fa fa-exclamation-circle"></i>请填写安装包链接'
            }
        }
    });
   
//    $('#app_id').each(function(){
//        if($(this).val()==1){
//            $("#ap1").attr("selected",true);
//        }else if($(this).val()==2){
//            $("#ap2").attr("selected",true);
//        }else if($(this).val()==3){
//            $("#ap3").attr("selected",true);
//        }else if($(this).val()==4){
//            $("#ap4").attr("selected",true);
//        }else if($(this).val()==5){
//            $("#ap5").attr("selected",true);
//        }
//    });
//
//    $('#statu').each(function(){
//        if($(this).val()==1 || $(this).val()==''){
//            $('input:radio[name=status]')[0].checked=true;
//        }else if($(this).val()==0){
//            $('input:radio[name=status]')[1].checked=true;
//            $('#cb').css('background','#ECF0F1');
//            $('#cb').css('color','#777');
//            $('#cb').css('border-color','#BEC3C7');
//            $('#bc').css('background','#96A6A6');
//            $('#bc').css('color','#FFF');
//            $('#bc').css('border-color','#808B8D');
//        }
//    });
//
});
//
//$(function(){
//        $('#app').on("change",function(){
//            $('#app_id').val($(this).find("option:selected").val());
//        });
//        $('#cb').click(function(){
//            $('#cb').css('background','#1BBC9D');
//            $('#cb').css('color','#FFF');
//            $('#cb').css('border-color','#16A086');
//            $('#bc').css('background','#ECF0F1');
//            $('#bc').css('color','#777');
//            $('#bc').css('border-color','#BEC3C7');
//        });
//    $('#bc').click(function(){
//        $('#cb').css('background','#ECF0F1');
//        $('#cb').css('color','#777');
//        $('#cb').css('border-color','#BEC3C7');
//        $('#bc').css('background','#96A6A6');
//        $('#bc').css('color','#FFF');
//        $('#bc').css('border-color','#808B8D');
//    });
//});

</script>
<div id="goTop" style="bottom: 30px;">
    <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a>
    <a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a>
</div>

<div role="log" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible">
    <div>返回列表</div>
</div>
</body>
</html><?php }
}
