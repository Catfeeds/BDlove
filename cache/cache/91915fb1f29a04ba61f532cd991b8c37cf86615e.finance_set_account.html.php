<?php
/* Smarty version 3.1.29, created on 2017-08-04 17:47:39
  from "D:\www\yunjuke\application\admin\views\finance_set_account.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598442bb166272_79608856',
  'file_dependency' => 
  array (
    '91915fb1f29a04ba61f532cd991b8c37cf86615e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\finance_set_account.html',
      1 => 1501740383,
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
function content_598442bb166272_79608856 ($_smarty_tpl) {
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

<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>平台绑定银行卡</h3>
        <h5>平台绑定银行卡信息</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
      <ul>
      	<li>设置平台绑定的银行卡信息，请认真核实银行卡卡号</li>
      </ul>
  </div>
  <form method="post" action="" id="form1" name="form1">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><em>*</em>开户银行：</label>
        </dt>
        <dd class="opt">
          <input id="bankName" name="bankName" value="成都建设银行" class="input-txt" type="text"/>
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><em>*</em>银行卡号：</label>
        </dt>
        <dd class="opt">
          <input id="bankCode" name="bankCode" value="6217003810025710925" class="input-txt" type="number"/>
          <span class="err"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="site_name"><em>*</em>银行卡开户人：</label>
        </dt>
        <dd class="opt">
          <input id="bankUname" name="bankUname" value="张奇豪" class="input-txt" type="text"/>
          <span class="err"></span>
          <p class="notic"></p>
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
<script>

    //按钮先执行验证再提交表单
    $("#submitBtn").click(function(){
        if($("#form1").valid()){
            /*if($("#bankCode").next().text()!=''){
                $("#bankCode").next().html('<label class="error">银行卡号不正确！</label>');
                return;
            }*/
            var fomedata = $("#form1").serialize();
            $.ajax({
                url:'edit_sys_bank',
                type:'post',
                data:fomedata,
                dataType:'json',
                success:function(data){
                    if(data.state){
                        layer.msg('修改成功');
                        window.location.href = 'finance_set_account';
                    }else{
                        layer.msg('修改失败');
                    }
                }
            });
        }
    });

    $("#form1").validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('dd').children('span.err');
            error_td.append(error);
        },
        rules : {
            bankName : {
                required : true,
            },
            bankCode : {
                required : true,
            },
            bankUname:{
                required : true,
            }
        },
        messages : {
            bankName : {
                required : '<i class="fa fa-exclamation-circle"></i>银行名不能为空',
            },
            bankCode : {
                required : '<i class="fa fa-exclamation-circle"></i>银行卡号不能为空',
            },
            bankUname : {
                required : '<i class="fa fa-exclamation-circle"></i>银行卡开户人不能为空',
            }
        }
    });

/*    $("#bankCode").blur(function () {
        var code=$(this).val();
        var reg = /^(\d{16}|\d{19})$/;
        if(!reg.test(code)){
            $(this).next().html('<label class="error">银行卡号不正确！</label>');
        }else {
            $(this).next().html('');
        }
    })*/


</script><?php }
}
