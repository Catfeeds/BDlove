<?php
/* Smarty version 3.1.29, created on 2017-07-28 14:06:59
  from "D:\www\yunjuke\application\admin\views\business_refund_pending.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597ad48355d984_97236806',
  'file_dependency' => 
  array (
    '8529b1d4e472d279bbf46e0fab89216adc81e726' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\business_refund_pending.html',
      1 => 1492225944,
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
function content_597ad48355d984_97236806 ($_smarty_tpl) {
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
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>退款管理</h3>
                <h5>商品订单退款申请及审核处理</h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a class="current"><span>待处理</span></a></li>
                <li><a href="business_refund_all"><span>所有记录</span></a></li>
                <li><a href="business_refund_reason"><span>退款退货原因</span></a></li>
            </ul>
        </div>
    </div>
  <!-- 操作说明 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>买家提交申请，商家同意并经平台确认后，退款金额以预存款的形式返还给买家（充值卡部分只能退回到充值卡余额）。</li>
        </ul>
    </div>


  <div id="flexigrid"></div>
  <div class="ncap-search-ban-s" id="searchBarOpen"><i class="fa fa-search-plus"></i>高级搜索</div>
  <div class="ncap-search-bar">
        <div class="handle-btn" id="searchBarClose"><i class="fa fa-search-minus"></i>收起边栏</div>
        <div class="title">
            <h3>高级搜索</h3>
        </div>
        <form method="get" name="formSearch" id="formSearch">
            <div id="searchCon" class="content ps-container ps-active-x" style="height: 806px;">
                <div class="layout-box">
                    <dl>
                        <dt>关键字搜索</dt>
                        <dd>
                            <label>
                                <select class="s-select" name="keyword_type">
                                    <option selected="selected" value="">-请选择-</option>
                                    <option value="refund_sn">退单编号</option>
                                    <option value="goods_name">商品名称</option>
                                    <option value="buyer_name">买家账号</option>
                                    <option value="store_name">店铺名称</option>
                                    <option value="order_sn">订单编号</option>
                                </select>
                            </label>
                            <label>
                                <input type="text" value="" placeholder="请输入关键字" name="keyword" class="s-input-txt">
                            </label>
                            <label class="f-12">
                                <input type="checkbox" value="1" name="jq_query">精确
                            </label>
                        </dd>
                    </dl>
                    <dl>
                        <dt>日期筛选</dt>
                        <dd>
                            <label>
                                <select class="s-select" name="qtype_time">
                                    <option selected="selected" value="">-请选择-</option>
                                    <option value="add_time">买家申请时间</option>
                                </select>
                            </label>
                            <label>
                                <input id="query_start_date" onclick="laydate()" placeholder="请选择起始时间" name="query_start_date" value="" type="text" class="s-input-txt ">
                            </label>
                            <label>
                                <input id="query_end_date" onclick="laydate()" placeholder="请选择结束时间" name="query_end_date" value="" type="text" class="s-input-txt ">
                            </label>
                        </dd>
                    </dl>
                    <dl>
                        <dt>退款金额</dt>
                        <dd>
                            <label>
                                <input placeholder="请输入起始金额" name="query_start_amount" value="" type="text" class="s-input-txt">
                            </label>
                            <label>
                                <input placeholder="请输入结束金额" name="query_end_amount" value="" type="text" class="s-input-txt">
                            </label>
                        </dd>
                    </dl>
                </div>
                </div>
            <div class="bottom"> <a href="javascript:void(0);" id="ncsubmit" class="ncap-btn ncap-btn-green mr5">提交查询</a><a href="javascript:void(0);" id="ncreset" class="ncap-btn ncap-btn-orange" title="撤销查询结果，还原列表项所有内容"><i class="fa fa-retweet"></i>撤销</a></div>
        </form>
    </div>

</div>
<script type="text/javascript">

    $(function(){
        // 高级搜索重置
        $('#ncreset').click(function(){
            //$("#flexigrid").flexOptions({url: 'index.php?act=refund&op=get_all_xml'}).flexReload();
            $("#formSearch")[0].reset();
        });
        $("#flexigrid").flexigrid({
            url: 'refund_pending_list',
            colModel : [
                {display: '操作', name : 'operation', width : 150, sortable : false, align: 'center', className: 'handle'},
                {display: '退单编号', name : 'refund_sn', width : 130, sortable : false, align: 'center'},
                {display: '退款金额(元)', name : 'refund_amount', width : 70, sortable : true, align: 'left'},
                {display: '申请图片', name : 'pic_info', width : 70, sortable : false, align : 'left'},
                {display: '申请原因', name : 'buyer_message', width : 120, sortable : false, align: 'left'},
                {display: '申请时间', name : 'add_time', width: 120, sortable : true, align : 'center'},
                {display: '涉及商品', name : 'goods_name', width : 120, sortable : false, align: 'left'},
                {display: '商家处理', name : 'seller_state', width : 80, sortable : true, align: 'center'},
                {display: '平台处理', name : 'refund_state', width : 80, sortable : false, align: 'center'},
                {display: '商家处理备注', name : 'seller_message', width : 120, sortable : false, align: 'left'},
                {display: '平台处理备注', name : 'admin_message', width : 120, sortable : false, align: 'left'},
                {display: '商家申核时间', name : 'seller_time', width: 120, sortable : true, align : 'center'},
                {display: '商品图', name : 'goods_image', width : 40, sortable : true, align: 'center'},
                {display: '商品ID', name : 'goods_id', width : 80, sortable : true, align: 'center'},
                {display: '订单编号', name : 'order_sn', width : 120, sortable : false, align: 'center'},
                {display: '买家', name : 'buyer_name', width : 60, sortable : true, align: 'left'},
                {display: '买家ID', name : 'buyer_id', width : 40, sortable : true, align: 'center'},
                {display: '商家名称', name : 'store_name', width : 100, sortable : true, align: 'left'},
                {display: '商家ID', name : 'store_id', width : 40, sortable : true, align: 'center'}
            ],
            searchitems : [
                {display: '退单编号', name : 'refund_sn', isdefault: true},
                {display: '商品名称', name : 'goods_name'},
                {display: '买家账号', name : 'buyer_name'},
                {display: '店铺名称', name : 'store_name'},
                {display: '订单编号', name : 'order_sn'}
            ],
            buttons : [
                {display: '<i class="fa fa-file-excel-o"></i>导出数据', name : 'csv', bclass : 'csv', title : '将选定行数据导出csv文件,如果不选中行，将导出列表所有数据', onpress : fg_operate },
            ],
            sortname: "refund_id",
            sortorder: "desc",
            title: '线上实物交易订单退款列表'
        });
    });
    function fg_operate(name, grid) {
        
    }
    function fg_chuli(){
        window.location.href = 'business_refund_do';
    }
    
    function show_msg(msg){
        layer.open({
            type: 1,
            skin: 'layui-layer-demo', //样式类名
            closeBtn: 0, //不显示关闭按钮
            area: ['420px', '240px'], //宽高
            shift: 2,
            shadeClose: true, //开启遮罩关闭
            content: '<div class="pd-20 "><p style="text-align: center;"><span style="font-family: 楷体, 楷体_GB2312, SimKai; font-size: 14px;">'+msg+'</span></p></div>'
          });
    }

</script> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
