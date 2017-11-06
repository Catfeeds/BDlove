<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:42:16
  from "D:\www\yunjuke\application\admin\views\user_integral_grade.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598022c81e7fc9_33816016',
  'file_dependency' => 
  array (
    'b89a8b49a8e2d821c5cfa98f93f33acf9918650d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\user_integral_grade.html',
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
function content_598022c81e7fc9_33816016 ($_smarty_tpl) {
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
<style>
.input-num{
	width:120px !important;height:24px;border-radius:4px;
}
.ncap-form-default div.bot, .ncap-form-all div.bot {
    padding-left: 6%;
}
.operat{
	display:inline-block;border:1px solid #D7D7D7;border-radius:4px;padding:0 4px;background:#E6E6E6;cursor:pointer;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>积分管理</h3>
        <h5>商城会员积分管理及获取日志</h5>
      </div>
      <ul class="tab-base nc-row">
        <li><a href="user_integral_detail" >积分明细</a></li>
        <li><a href="user_rule_set">规则设置</a></li>
        <li><a href="user_integral_change">积分增减</a></li>
        <li><a href="user_integral_rate">积分抵用比率</a></li>
        <li><a href="JavaScript:void(0);" class="current">积分等级</a></li>
      </ul>
    </div>
  </div>
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>“会员级别设置”提交后，当会员符合某个级别后将自动升至该级别，请谨慎设置会员级别</li>
      <li>建议：级别应该是逐层递增，例如“级别2”所需积分高于“级别1”；二、设置的第一个级别所需积分应为0；三、信息应填写完整；</li>
    </ul>
  </div>
  <form method="post" id="mg_form" name="mg_form" enctype="multipart/form-data">
    <div class="ncap-form-default" id="mg_tbody">
      <div class="title">
        <h3>会员级别设置：</h3>
      </div>
            <dl class="row" id="row_0">
        <dt class="tit">会员级别<strong> 
        V0
        <input type="hidden" name="grade_name[]" id="v_name0" value="V0" class="w60" >
        </strong></dt>
        <dd class="opt">
               晋级需 <input type="number" name="grade[]" id="v0" value="0" class="w60 input-num" > 积分
          <!-- <span class="operat" onclick="del_grade(this)" title="删除级别">删除级别</span>    
          <span class="operat" onclick="add_grade(this)" title="新增级别">新增级别</span>  -->
        </dd>
      </dl>
            <dl class="row" id="row_0">
        <dt class="tit">会员级别<strong> 
        V1
        <input type="hidden" name="grade_name[]" id="v_name0" value="V1" class="w60" >
        </strong></dt>
        <dd class="opt">
               晋级需 <input type="number" name="grade[]" id="v0" value="10000" class="w60 input-num" > 积分
          <!-- <span class="operat" onclick="del_grade(this)" title="删除级别">删除级别</span>    
          <span class="operat" onclick="add_grade(this)" title="新增级别">新增级别</span>  -->
        </dd>
      </dl>
            <dl class="row" id="row_0">
        <dt class="tit">会员级别<strong> 
        V2
        <input type="hidden" name="grade_name[]" id="v_name0" value="V2" class="w60" >
        </strong></dt>
        <dd class="opt">
               晋级需 <input type="number" name="grade[]" id="v0" value="30000" class="w60 input-num" > 积分
          <!-- <span class="operat" onclick="del_grade(this)" title="删除级别">删除级别</span>    
          <span class="operat" onclick="add_grade(this)" title="新增级别">新增级别</span>  -->
        </dd>
      </dl>
            <dl class="row" id="row_0">
        <dt class="tit">会员级别<strong> 
        V3
        <input type="hidden" name="grade_name[]" id="v_name0" value="V3" class="w60" >
        </strong></dt>
        <dd class="opt">
               晋级需 <input type="number" name="grade[]" id="v0" value="60000" class="w60 input-num" > 积分
          <!-- <span class="operat" onclick="del_grade(this)" title="删除级别">删除级别</span>    
          <span class="operat" onclick="add_grade(this)" title="新增级别">新增级别</span>  -->
        </dd>
      </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
    </div>
  </form>
</div>
<script type="text/javascript">
$('#submitBtn').click(function(){
	var status = true;
	$('input').each(function(index,val){ 
		if($(this).val()==''){
			status = false;
		}
	})
	if(!status){
		layer.alert('级别和积分不能为空');return false;
	}
	var flag = true;
	$('input.input-num').each(function(index,val){ 
		if(index>=1){
			if(parseInt($('input.input-num').eq(index).val())<=parseInt($('input.input-num').eq(index-1).val())){
				flag = false;
			}
		}
		
	})
	if(flag){
		$.ajax({
			url:'grade_change',
			data:$('#mg_form').serialize(),
			type:'post',
			dataType:'json',
			success:function(data){
				if(data.state==403){
					login_ajax('shopadmin');return false;
				}
				layer.alert(data);
			}
		});
	}else{
		layer.alert('积分应随等级递增');
	}
	
})
function del_grade(obj){
	$(obj).parents('dl.row').remove();
}
function add_grade(obj){
	var str = '<dl class="row" id="row_0">'+
        '<dt class="tit">会员级别<strong> <input type="text" name="grade_name[]" id="v_name0" value="" class="w60" ></strong></dt>'+
        '<dd class="opt">'+
        '晋级需 <input type="number" name="grade[]" id="v0" value="" class="w60 input-num" > 积分'+
        '<span class="operat" onclick="del_grade(this)" title="删除级别">删除级别</span> '+   
        '<span class="operat" onclick="add_grade(this)" title="新增级别">新增级别</span> '+
        '</dd></dl>';
	$(obj).parents('dl.row').after(str);
}
</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
