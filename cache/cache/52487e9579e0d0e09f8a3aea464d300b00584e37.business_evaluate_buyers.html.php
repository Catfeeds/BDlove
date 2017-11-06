<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:42:41
  from "D:\www\yunjuke\application\admin\views\business_evaluate_buyers.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598022e161fda8_39226274',
  'file_dependency' => 
  array (
    '52487e9579e0d0e09f8a3aea464d300b00584e37' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\business_evaluate_buyers.html',
      1 => 1498098958,
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
function content_598022e161fda8_39226274 ($_smarty_tpl) {
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
                <h3>评价管理</h3>
                <h5>商品交易评价及导购评价管理</h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a class="current"><span>商品评价</span></a></li>
                <li><a href="business_evaluate_shop"><span>导购评价</span></a></li>
            </ul>
        </div>
    </div>
  <!-- 操作说明 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>买家可在订单完成后对订单商品进行评价操作，评价信息将显示在对应的商品页面</li>
        </ul>
    </div>

  <div id="flexigrid"></div>
</div>
<script type="text/javascript">
    $(function(){
        $("#flexigrid").flexigrid({
            url: 'evaluate_buyers_list',
            colModel : [
                {display: '操作', name : 'operation', width : 60, sortable : false, align: 'center', className: 'handle-s'},
                {display: '评价人', name : 'geval_frommembername', width : 70, sortable : true, align: 'center'},
                {display: '评分', name : 'geval_scores', width : 90, sortable : false, align: 'center'},
                {display: '评价内容', name : 'geval_content', width: 250, sortable : false, align : 'left'},
                {display: '晒单图片', name : 'geval_image', width : 80, sortable : false, align : 'center'},
                {display: '评价时间', name : 'geval_addtime', width : 120, sortable : true, align: 'center'},
                {display: '被评商品', name : 'geval_goodsid', width : 150, sortable : true, align : 'center'},
                {display: '所属商家', name : 'geval_storename', width : 120, sortable : true, align: 'center'},
                {display: '订单编号', name : 'geval_orderno', width : 120, sortable : true, align: 'center'},
                {display: '评价人ID', name : 'geval_frommemberid', width : 60, sortable : true, align: 'center'},
                {display: '商家ID', name : 'geval_storeid', width : 40, sortable : true, align: 'center'},
//                {display: '追评内容', name : 'geval_content_again', width: 250, sortable : false, align : 'left'},
//                {display: '追评晒单', name : 'geval_image_again', width : 190, sortable : false, align : 'left'}
            ],
            buttons : [
                {display: '<i class="fa fa-trash"></i>批量删除', name : 'del', bclass : 'del', title : '将选定行数据批量删除', onpress : fg_operate }
            ],
            searchitems : [
                {display: '评价人', name : 'geval_frommembername'},
                {display: '被评商品', name : 'geval_goodsname'},
                {display: '所属商家', name : 'geval_storename'}
            ],
            sortname: "geval_addtime",
            sortorder: "desc",
            title: '商品评价列表',
            onSuccess : function(){

            }
        });
    });
    function fg_operate(name,grid) {
        if (name == 'del') {
            if($('.trSelected',grid).length>0){
                var itemlist = new Array();
                $('.trSelected',grid).each(function(){
                    itemlist.push($(this).attr('data-id'));
                });
                del_this(itemlist);
            }else{
                return false;
            }
        }
    }
    
    function del_this(id){
        if($.isArray(id)){
            id = id.join(',');
        }
        layer.confirm('确定要删除吗？', {
            btn: ['确定','取消'] //按钮
          }, function(){
              $.ajax({
                 url:'evaluate_buyers_del',
                 data:{id:id},
                 type:'post',
                 dataType:'json',
                 success:function(msg){
                     layer.msg(msg);
                     $('#flexigrid').flexReload();
                 }
              });
          });
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
