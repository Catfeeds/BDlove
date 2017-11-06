<?php
/* Smarty version 3.1.29, created on 2017-07-26 15:18:07
  from "D:\www\yunjuke\application\admin\views\role_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5978422f94d668_58816777',
  'file_dependency' => 
  array (
    '59d6e04275532253aa241dba1ae6a3d8c6ac67ec' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\role_add.html',
      1 => 1492225974,
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
function content_5978422f94d668_58816777 ($_smarty_tpl) {
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
    <div class="item-title"><a class="back" href="role" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3>权限设置 - 添加权限组</h3>
        <h5>管理中心操作权限及分组设置</h5>
      </div>
      <ul class="tab-base nc-row">
        <li></li>
      </ul>
    </div>
  </div>
  <!-- 操作说明 -->
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span> </div>
    <ul>
      <li>可添加一个权限组，并为其命名，方便添加管理员时使用。</li>
      <li>可在标题处全选所有功能或根据功能模块逐一选择操作权限，提交保存后生效。</li>
    </ul>
  </div>
  <form id="add_form" method="post" action="role?op=insert_role" name="adminForm" style="margin-bottom: 50px;">
    <input type="hidden" name="role_id" value="">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="admin_name"><em>*</em>权限组</label></dt>
        <dd class="opt">
          <input type="text" id="gname" maxlength="40" name="gname" value="" class="input-txt">
          <span class="err"></span>
          <p class="notic">为权限组设置特定名称，便于添加管理员时选择使用。</p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">设置权限</dt>
        <dd class="opt">
          <input id="limitAll" value="1" type="checkbox" class="checkbox">
          全部操作
          <p class="notic">勾选后选中全部操作功能，可根据需要从设置详情中进行分组设置。</p>
        </dd>
      </dl>
    </div>
    <div class="ncap-form-all">
      <div class="title">
        <h3>权限操作设置详情</h3>
      </div>
	        <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          平台</span>
		</dt>
        <dd class="opt nobg nopd nobd nobs">
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              平台设置</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="website_setting" name="permission[]">
                <span class="err"></span>
                站点设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="area_setting" name="permission[]">
                <span class="err"></span>
                地区设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="upload_setting" name="permission[]">
                <span class="err"></span>
                上传设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mail_log" name="permission[]">
                <span class="err"></span>
                邮件日志</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mail_setting" name="permission[]">
                <span class="err"></span>
                邮件服务器设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mail_template" name="permission[]">
                <span class="err"></span>
                邮件模板设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="sms_setting" name="permission[]">
                <span class="err"></span>
                短信接口</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="sms_template" name="permission[]">
                <span class="err"></span>
                短信模版</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="sms_log" name="permission[]">
                <span class="err"></span>
                短信日志</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mall_express" name="permission[]">
                <span class="err"></span>
                快递公司</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="depot_express" name="permission[]">
                <span class="err"></span>
                快递接口</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="admin_setting" name="permission[]">
                <span class="err"></span>
                管理员设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="role_setting" name="permission[]">
                <span class="err"></span>
                角色管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="operate_log" name="permission[]">
                <span class="err"></span>
                操作日志</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="cache_clear" name="permission[]">
                <span class="err"></span>
                清理缓存</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              会员设置</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="QQ_connect" name="permission[]">
                <span class="err"></span>
                QQ互联</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="sian_connect" name="permission[]">
                <span class="err"></span>
                新浪微博</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="phone_connect" name="permission[]">
                <span class="err"></span>
                手机短信</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="weixin_connect" name="permission[]">
                <span class="err"></span>
                微信登录</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="member_protocol" name="permission[]">
                <span class="err"></span>
                会员协议</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              网站设置</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="pic_setting" name="permission[]">
                <span class="err"></span>
                图片设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="Watermark_setting" name="permission[]">
                <span class="err"></span>
                水印管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="Articleclass_setting" name="permission[]">
                <span class="err"></span>
                文章分类管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="Article_management" name="permission[]">
                <span class="err"></span>
                文章管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="Article_add" name="permission[]">
                <span class="err"></span>
                新增文章</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="Article_edit" name="permission[]">
                <span class="err"></span>
                编辑文章</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="Article_del" name="permission[]">
                <span class="err"></span>
                删除文章</li>
				            </ul>
          </div>
		        </dd>
      </dl>
	      <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          商城</span>
		</dt>
        <dd class="opt nobg nopd nobd nobs">
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              商城设置</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mall_set" name="permission[]">
                <span class="err"></span>
                商城基础设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mall_pic_set" name="permission[]">
                <span class="err"></span>
                图片设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mall_search" name="permission[]">
                <span class="err"></span>
                搜索设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mall_news" name="permission[]">
                <span class="err"></span>
                消息通知</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mall_payment" name="permission[]">
                <span class="err"></span>
                支付方式</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mall_express" name="permission[]">
                <span class="err"></span>
                快递公司</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mall_express_interfa" name="permission[]">
                <span class="err"></span>
                快递接口</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="express_management" name="permission[]">
                <span class="err"></span>
                快递管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mall_express_tools" name="permission[]">
                <span class="err"></span>
                运费设置</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              商品</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="depot_management" name="permission[]">
                <span class="err"></span>
                商品管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="waybill" name="permission[]">
                <span class="err"></span>
                分类管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="waybill" name="permission[]">
                <span class="err"></span>
                自定义标签分类</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="waybill" name="permission[]">
                <span class="err"></span>
                码段管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="waybill" name="permission[]">
                <span class="err"></span>
                尺码管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="depot_inplode" name="permission[]">
                <span class="err"></span>
                品牌管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="depot_select" name="permission[]">
                <span class="err"></span>
                类型管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="agent_discount" name="permission[]">
                <span class="err"></span>
                图片空间</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              会员</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="user_management" name="permission[]">
                <span class="err"></span>
                积分管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="user_base" name="permission[]">
                <span class="err"></span>
                会员管理</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              订单</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="order_manage" name="permission[]">
                <span class="err"></span>
                订单管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="cancel_product" name="permission[]">
                <span class="err"></span>
                退货管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="return_manage" name="permission[]">
                <span class="err"></span>
                退款管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="cancel_product" name="permission[]">
                <span class="err"></span>
                评价管理</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              促销</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="CouponOfNewman" name="permission[]">
                <span class="err"></span>
                新会员送券</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="CouponOfShopping" name="permission[]">
                <span class="err"></span>
                买后送券</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="qiangHongBao" name="permission[]">
                <span class="err"></span>
                抢红包</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="CouponOfSales" name="permission[]">
                <span class="err"></span>
                发券给导购</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="CouponOfReceive" name="permission[]">
                <span class="err"></span>
                领券活动</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="OfDiscount" name="permission[]">
                <span class="err"></span>
                满减满折</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="OfSeckill" name="permission[]">
                <span class="err"></span>
                天天闪购</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="specialPromotion" name="permission[]">
                <span class="err"></span>
                商品专题</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="OfLimitTimeDiscount" name="permission[]">
                <span class="err"></span>
                限时折扣</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="GameOfSign" name="permission[]">
                <span class="err"></span>
                签到</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="GameOfLottery" name="permission[]">
                <span class="err"></span>
                大转盘</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="GameOfScratch" name="permission[]">
                <span class="err"></span>
                刮刮卡</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="end_activity" name="permission[]">
                <span class="err"></span>
                结束活动</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              店铺</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="store_management" name="permission[]">
                <span class="err"></span>
                店铺管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="store_shopping_guide" name="permission[]">
                <span class="err"></span>
                导购管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="store_area_setting" name="permission[]">
                <span class="err"></span>
                门店区域设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="store_department" name="permission[]">
                <span class="err"></span>
                集合店管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="store_decoration" name="permission[]">
                <span class="err"></span>
                微商城装修</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="store_cashier" name="permission[]">
                <span class="err"></span>
                门店收银</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              商城统计</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="after_sale_type" name="permission[]">
                <span class="err"></span>
                限时折扣</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="aftersale_reason" name="permission[]">
                <span class="err"></span>
                团购管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="aftersale_reason" name="permission[]">
                <span class="err"></span>
                满就送</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="aftersale_reason" name="permission[]">
                <span class="err"></span>
                拼团管理</li>
				            </ul>
          </div>
		        </dd>
      </dl>
	      <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          财务</span>
		</dt>
        <dd class="opt nobg nopd nobd nobs">
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              财务设置</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="finance_set_account" name="permission[]">
                <span class="err"></span>
                财务设置</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              财务账户</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="finance_account_sys" name="permission[]">
                <span class="err"></span>
                平台账户明细</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="finance_account_user" name="permission[]">
                <span class="err"></span>
                会员管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="finance_account_store" name="permission[]">
                <span class="err"></span>
                门店管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="finance_account_cash" name="permission[]">
                <span class="err"></span>
                提现管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="finance_account_guide" name="permission[]">
                <span class="err"></span>
                导购管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="finance_account_recharge" name="permission[]">
                <span class="err"></span>
                充值申请</li>
				            </ul>
          </div>
		        </dd>
      </dl>
	      <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          微信</span>
		</dt>
        <dd class="opt nobg nopd nobd nobs">
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              微信设置</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mp_setting" name="permission[]">
                <span class="err"></span>
                微信公众号授权</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mp_menu" name="permission[]">
                <span class="err"></span>
                菜单设置</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="mp_reply_management" name="permission[]">
                <span class="err"></span>
                自动回复</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              粉丝</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="follow_management" name="permission[]">
                <span class="err"></span>
                粉丝管理</li>
				            </ul>
          </div>
		        </dd>
      </dl>
	      <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          手机端</span>
		</dt>
        <dd class="opt nobg nopd nobd nobs">
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              app设置</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="app_version_manage" name="permission[]">
                <span class="err"></span>
                版本管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="app_version_feedback" name="permission[]">
                <span class="err"></span>
                导购反馈</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="app_work_order" name="permission[]">
                <span class="err"></span>
                app工单信息</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              app用户</h4>
            <ul class="ncap-account-container-list">
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="App_user_manage" name="permission[]">
                <span class="err"></span>
                导购管理</li>
				                <li>
                <input class="checkbox va-m" type="checkbox"    value="app_user_msg_manage" name="permission[]">
                <span class="err"></span>
                消息管理</li>
				            </ul>
          </div>
		          <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              app统计</h4>
            <ul class="ncap-account-container-list">
				            </ul>
          </div>
		        </dd>
      </dl>
	      <div class="fix-bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
    </div>
  </form>
</div>
<script>
function selectLimit(name){
    if($('#'+name).attr('checked')) {
        $('.'+name).attr('checked',true);
    }else {
        $('.'+name).attr('checked',false);
    }
}
$(document).ready(function(){
	//按钮先执行验证再提交表单
	$("#submitBtn").click(function(){
	    if($("#add_form").validate()){
	    var chk_value =[]; 
	    $('input[type="checkbox"]:checked').each(function(){ 
	    chk_value.push($(this).val()); 
	    }); 
	    if(chk_value == ''){
	    	layer.msg('权限不能为空');
	    	return false;
	    }
	     $("#add_form").submit();
		}
	});

    // 全选
    $('#limitAll').click(function(){
    	$('input[type="checkbox"]').attr('checked',$(this).attr('checked') == 'checked');
    });
    // 功能模块
    $('input[nctype="modulesAll"]').click(function(){
        $(this).parents('dt:first').next().find('input[type="checkbox"]').attr('checked',$(this).attr('checked') == 'checked');
    });
    // 功能组
    $('input[nctype="groupAll"]').click(function(){
        $(this).parents('h4:first').next().find('input[type="checkbox"]').attr('checked',$(this).attr('checked') == 'checked');
    });
	
	$("#add_form").validate({
		errorPlacement: function(error, element){
			var error_td = element.parent('dd').children('span.err');
            error_td.append(error);
        },
        rules : {
            gname : {
                required : true,
				remote	: {
                    url :'role?op=check_name',
                    type:'get',
                    data:{
                    	gname : function(){
                            return $('#gname').val();
                        }
                    }
                }
            }
        },
        messages : {
            gname : {
                required : '<i class="fa fa-exclamation-circle"></i>请输入角色名称',
                remote   : '<i class="fa fa-exclamation-circle"></i>该名称已存在'
            }
        }
	});
});
</script><div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
