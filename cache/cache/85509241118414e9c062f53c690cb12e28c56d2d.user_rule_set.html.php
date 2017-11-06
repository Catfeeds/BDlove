<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:42:08
  from "D:\www\yunjuke\application\admin\views\user_rule_set.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598022c097bb73_82906869',
  'file_dependency' => 
  array (
    '85509241118414e9c062f53c690cb12e28c56d2d' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\user_rule_set.html',
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
function content_598022c097bb73_82906869 ($_smarty_tpl) {
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
.input-text{
	width:80px !important;
	height:30px !important;
}
.tit{
	width:10% !important;
	margin-right:5% !important;
}
.opt{
	width:50% !important;
}
.points_reg{
	margin-top:5px;
}
p{
	color:#ccc;
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
        <li><a href="JavaScript:void(0);" class="current">规则设置</a></li>
        <li><a href="user_integral_change">积分增减</a></li>
        <li><a href="user_integral_rate">积分抵用比率</a></li>
        <li><a href="user_integral_grade">积分等级</a></li>
      </ul>
    </div>
  </div>
  <form method="post" name="settingForm" id="settingForm">
    <div class="ncap-form-default">
      <div class="title">
        <h3>会员日常获取积分设定</h3>
      </div>
      <dl class="row">
        <dt class="tit">是否显示积分</dt>
        <dd class="opt">
          <input id="points_reg" name="points_show" value="1" checked class="" type="radio">是
          <input id="points_reg" name="points_show" value="2"  class="" type="radio">否
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">会员积分名称</dt>
        <dd class="opt">
          <input id="points_reg" name="points_name" value="积分" class="input-text" type="text">
          <p>可个性化显示积分单位，如金币，元宝等</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">商品实付1元得</dt>
        <dd class="opt">
                  V0&nbsp;&nbsp;<input id="points_reg" name="points_reg[52]" value="1" class="input-text points_reg" type="number">&nbsp;&nbsp;积分<br>
                  V1&nbsp;&nbsp;<input id="points_reg" name="points_reg[53]" value="1" class="input-text points_reg" type="number">&nbsp;&nbsp;积分<br>
                  V2&nbsp;&nbsp;<input id="points_reg" name="points_reg[54]" value="1" class="input-text points_reg" type="number">&nbsp;&nbsp;积分<br>
                  V3&nbsp;&nbsp;<input id="points_reg" name="points_reg[55]" value="1" class="input-text points_reg" type="number">&nbsp;&nbsp;积分<br>
                  <p>若不赠送积分则填0；商品实付额：若订单使用了优惠券等优惠活动，会将优惠额均摊到订单所有商品上，如订单有商品A，原价为105.00元，使用10元优惠券，则该商品实付额为90.50元，其中不满1元不计积分（0.5不计积分）。</p>
        </dd>
      </dl>
     <dl class="row">
        <dt class="tit">支付类型限制</dt>
        <dd class="opt">
          <select name="pay_type">
           <option value="0" >无限制</option>
           <option value="1" >仅现金</option>
           <option value="2" selected>仅现金或余额</option>
           <option value="3" >仅现金或充值卡</option>
          </select>
        </dd>
      </dl>
     <dl class="row">
        <dt class="tit">获得积分时间</dt>
        <dd class="opt">
          确认收货后评价商品可获得
        </dd>
      </dl>
     <dl class="row">
        <dt class="tit">评价导购可获得</dt>
        <dd class="opt">
          <input id="points_reg" name="points_guide" value="5" class="input-text" type="number">&nbsp;&nbsp;积分
          <p>每次消费后评价导购都还获得。</p>
        </dd>
      </dl>

      
      <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
    </div>
  </form>
</div>
<script type="text/javascript">
$(function(){
	$("#submitBtn").click(function(){
		if($("#settingForm").valid()){
			var data = new FormData($('#settingForm')[0]);
			$.ajax({
				data:data,
				type:'post',
				dataType:'json',
				url:"http://[::1]/yunjuke/admin.php/User/user_rule_update",
				cache: false,
               	processData: false,
                contentType: false,
				success:function(res){
					if(res=="success"){
						layer.alert('积分规则设置成功');
					}else if(res=="points_reg"){
						layer.alert('会员注册  不能为空');
					}else if(res=="points_login"){
						layer.alert('会员每天登陆   不能为空');
					}else if(res=="points_comments"){
						layer.alert('订单商品评论  不能为空');
					}else if(res=="points_orderrate"){
						layer.alert('消费额与赠送积分比例   不能为空');
					}else if(res=="points_ordermax"){
						layer.alert('每订单最多赠送积分 不能为空');
					}else{
						layer.alert('积分规则设置失败');
					}
				}
			});
		}
	});
	

})
</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
