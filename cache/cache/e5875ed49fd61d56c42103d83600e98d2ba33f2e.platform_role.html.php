<?php
/* Smarty version 3.1.29, created on 2017-08-02 18:18:26
  from "D:\www\yunjuke\application\admin\views\platform_role.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5981a6f25bbf83_57596433',
  'file_dependency' => 
  array (
    'e5875ed49fd61d56c42103d83600e98d2ba33f2e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\platform_role.html',
      1 => 1501551994,
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
function content_5981a6f25bbf83_57596433 ($_smarty_tpl) {
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
	<style type="text/css">
	.ncap-account-container h4 {
		margin-top: 4px;
	}
	</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <a class="back" href="javascript:history.back();" title="返回列表">
        <i class="fa fa-arrow-circle-o-left"></i>
      </a>
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
  <form id="add_form" method="post" action="authority?op=insert" name="adminForm" style="margin-bottom:100px;">
    <input type="hidden" name="role_id" value="1">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="admin_name"><em>*</em>权限组</label></dt>
        <dd class="opt">
          <input type="text" id="gname" maxlength="40" name="gname" value="兼职导购" class="input-txt" disabled>
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
        <h3>商家端权限列表</h3>
      </div>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" type="checkbox" nctype="modulesAll"  value="seller_pay" name="permission[]">
          收银台</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_online" name="permission[]">
              在线收银</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_refund" name="permission[]">
              退换商品</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                  </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" type="checkbox" nctype="modulesAll"  value="seller_order" name="permission[]">
          订单管理</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_order_manage" name="permission[]">
              订单管理</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_order_delivery" name="permission[]">
                <span class="err"></span>
                发货</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_order_distribution" name="permission[]">
                <span class="err"></span>
                配货</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_order_export" name="permission[]">
                <span class="err"></span>
                导出订单</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_order_import_waybill" name="permission[]">
                <span class="err"></span>
                导入运单</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_order_input_waybill" name="permission[]">
                <span class="err"></span>
                录入运单</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_order_print_tag" name="permission[]">
                <span class="err"></span>
                打印吊牌</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_order_print_waybill" name="permission[]">
                <span class="err"></span>
                打印快递单</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_order_print_picklist" name="permission[]">
                <span class="err"></span>
                打印拣货单</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_sellafter" name="permission[]">
              订单售后</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_sellafter_accept_reject" name="permission[]">
                <span class="err"></span>
                受理退货</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_sellafter_accept_refund" name="permission[]">
                <span class="err"></span>
                受理退款</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_retail" name="permission[]">
              手工下单</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_ecorder_synchronize" name="permission[]">
              网店订单</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_order_sync_setting" name="permission[]">
                <span class="err"></span>
                同步设置</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_ecorder_create" name="permission[]">
                <span class="err"></span>
                订单生成</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_ecorder_recreate" name="permission[]">
                <span class="err"></span>
                订单重下</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_ecorder_note" name="permission[]">
                <span class="err"></span>
                订单备注</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_ecorder_cance" name="permission[]">
                <span class="err"></span>
                订单取消</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_ecorder_rejects" name="permission[]">
                <span class="err"></span>
                退货</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_ecorder_refund" name="permission[]">
                <span class="err"></span>
                退款</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_ecorder_export" name="permission[]">
                <span class="err"></span>
                订单导出</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_ecorder_import" name="permission[]">
              订单导入</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_ecorder_import_tb" name="permission[]">
                <span class="err"></span>
                淘宝格式</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_ecorder_import_ntb" name="permission[]">
                <span class="err"></span>
                非淘宝格式</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_ecsellafter" name="permission[]">
              网店售后</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                  </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" type="checkbox" nctype="modulesAll"  value="seller_store" name="permission[]">
          店铺管理</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_goods" name="permission[]">
              商品管理</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_add_good" name="permission[]">
                <span class="err"></span>
                添加商品</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_del_good" name="permission[]">
                <span class="err"></span>
                删除商品</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_edit_good" name="permission[]">
                <span class="err"></span>
                编辑商品</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_ecstore_sync" name="permission[]">
                <span class="err"></span>
                网店库存同步</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_channel_reamount" name="permission[]">
                <span class="err"></span>
                渠道库存重算</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_upload_goods" name="permission[]">
                <span class="err"></span>
                上传商品</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_down_goods" name="permission[]">
                <span class="err"></span>
                下载商品</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_tags" name="permission[]">
              标签管理</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_tag_goods" name="permission[]">
                <span class="err"></span>
                标签商品</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_decoration" name="permission[]">
              店铺装修</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_design_tpl" name="permission[]">
                <span class="err"></span>
                模版设计</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_bind_tpl" name="permission[]">
                <span class="err"></span>
                模版绑定</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_del_tpl" name="permission[]">
                <span class="err"></span>
                模版删除</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_guides" name="permission[]">
              导购管理</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_guide_add" name="permission[]">
                <span class="err"></span>
                添加导购</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_guide_del" name="permission[]">
                <span class="err"></span>
                导购离职</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_guide_edit" name="permission[]">
                <span class="err"></span>
                编辑导购</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_carriage" name="permission[]">
              运费管理</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_carriage_edit_fee" name="permission[]">
                <span class="err"></span>
                运费编辑</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_carriage_printTpl_edit" name="permission[]">
                <span class="err"></span>
                打印模版编辑</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_carriage_select" name="permission[]">
                <span class="err"></span>
                选择物流</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_goods_immigration" name="permission[]">
              商品迁入</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                  </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" type="checkbox" nctype="modulesAll"  value="seller_member" name="permission[]">
          会员管理</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_member_manage" name="permission[]">
              会员管理</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_member_import" name="permission[]">
              会员导入</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                  </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" type="checkbox" nctype="modulesAll"  value="seller_stock" name="permission[]">
          库存管理</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_stock_manage" name="permission[]">
              库存管理</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_edit_stockamount" name="permission[]">
                <span class="err"></span>
                修改库存</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_del_stockamount" name="permission[]">
                <span class="err"></span>
                删除零库存商品</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_inventory" name="permission[]">
              盘点管理</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_inventory_del_area" name="permission[]">
                <span class="err"></span>
                删除</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_inventory_add_area" name="permission[]">
                <span class="err"></span>
                新增区域</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_inventory_area_input" name="permission[]">
                <span class="err"></span>
                盘点录入</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_inventory_submit" name="permission[]">
                <span class="err"></span>
                确认盘点</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_inventory_restore" name="permission[]">
                <span class="err"></span>
                还原盘点</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_inventory_export" name="permission[]">
                <span class="err"></span>
                导出数据</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_stock_import" name="permission[]">
              导入库存</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_stock_import_batch" name="permission[]">
                <span class="err"></span>
                批量导入</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_stock_import_simple" name="permission[]">
                <span class="err"></span>
                少量导入</li>
                          </ul>
          </div>
                  </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" type="checkbox" nctype="modulesAll"  value="seller_statistics" name="permission[]">
          统计报表</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" checked class="va-b" value="" name="permission[]">
              </h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                  </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" type="checkbox" nctype="modulesAll"  value="seller_account" name="permission[]">
          账户管理</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_account_detail" name="permission[]">
              收支明细</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_safe" name="permission[]">
              安全设置</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_info" name="permission[]">
              基本资料</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_info_account" name="permission[]">
                <span class="err"></span>
                账户绑定</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_pay_edit" name="permission[]">
                <span class="err"></span>
                店铺支付密码修改</li>
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_bind_ecstore" name="permission[]">
                <span class="err"></span>
                店铺绑定</li>
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_recharge" name="permission[]">
              账户充值</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll"  class="va-b" value="seller_cash" name="permission[]">
              账户提现</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="seller_cash_apply" name="permission[]">
                <span class="err"></span>
                账户提现申请</li>
                          </ul>
          </div>
                  </dd>
      </dl>
          </div>
    <div class="ncap-form-all">
      <div class="title">
        <h3>APP权限列表</h3>
      </div>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          个人中心</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              邀请导购</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              切换门店</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              门店管理</h4>
            <ul class="ncap-account-container-list">
                            <li>
                <input class="checkbox va-m" type="checkbox"    value="app_cash" name="permission[]">
                <span class="err"></span>
                账号提现</li>
                          </ul>
          </div>
                  </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          会员管理</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              消息群发</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              优惠券</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                  </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          商品管理</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              发布商品</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              编辑商品</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                  </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          订单管理</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              退货管理</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              发货管理</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              预约管理</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                  </dd>
      </dl>
            <dl class="row">
        <dt class="tit">
          <span><input class="checkbox" name="" type="checkbox" nctype="modulesAll">
          库存管理</span>
        </dt>
        <dd class="opt nobg nopd nobd nobs">
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              更改库存</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                    <div class="ncap-account-container">
            <h4>
              <input class="checkbox va-b" type="checkbox" nctype="groupAll" class="va-b">
              盘点管理</h4>
            <ul class="ncap-account-container-list">
                          </ul>
          </div>
                  </dd>
      </dl>
          </div>
  </form>

  <div class="fix-bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
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

        /*$("#add_form").validate({
            errorPlacement: function(error, element){
                var error_td = element.parent('dd').children('span.err');
                error_td.append(error);
            },
            rules : {
                gname : {
                    required : true
                }
            },
            messages : {
                gname : {
                    required : '<i class="fa fa-exclamation-circle"></i>请输入角色名称'
                }
            }
        });*/
    });
</script><div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
