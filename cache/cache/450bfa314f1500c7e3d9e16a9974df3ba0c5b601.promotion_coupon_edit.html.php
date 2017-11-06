<?php
/* Smarty version 3.1.29, created on 2017-08-01 15:53:47
  from "D:\www\yunjuke\application\admin\views\promotion_coupon_edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5980338be7d8e0_43738150',
  'file_dependency' => 
  array (
    '450bfa314f1500c7e3d9e16a9974df3ba0c5b601' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\promotion_coupon_edit.html',
      1 => 1501483444,
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
function content_5980338be7d8e0_43738150 ($_smarty_tpl) {
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
<link href="http://[::1]/yunjuke/application/admin/views/css/module-page.css" rel="stylesheet" type="text/css">
<style>
    body {
        min-width: 500px;
    }

    .couponBox {
        overflow: inherit !important;
    }

    .couponBox {
        border: solid 1px #ddd;
        padding: 15px;
        overflow: hidden;
        width: 450px;
        height: 145px;
    }

    .couponWrap {
        width: 375px;
        height: 145px;
        border-radius: 4px;
        box-shadow: 0 0 1px 1px #efefef;
        text-align: left;
        float: left;
        color: #fff;
        background: #f44336;
    }

    .couponWrap .top {
        position: relative;
        height: 91px;
        padding: 12px 15px;
        border-radius: 4px 4px 0 0;
    }

    .couponWrap .top .couponName {
        font-size: 22px;
        height: 40px;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        outline: 0 !important;
    }

    .couponWrap .top .type {
        font-size: 14px;
        height: 25px;
    }

    .couponWrap .bottom {
        height: 35px;
        padding: 0 15px;
        line-height: 36px;
        font-size: 12px;
    }

    .tarea {
        height: 130px;
        width: 400px;
    }

    .select2 {
        margin-bottom: 0px;
    }
    .limit-res-box {
        max-height: 100px;
        overflow-y: auto;
        background-color: #F5F5F5;
        margin-right: 50px;
        padding: 5px;
        border-radius: 3px;
        overflow-x:visible;
        overflow-y:scroll; 
    }
    .limit-close-btn {
        right: 5px;
        top: 3px;
        cursor: pointer;
        color: red;
        position: absolute;
    }
    .rel {
        position: relative;float: left;
    }
    .pl-list-nav {
        padding: 10px 10px 0 10px;
        background: #F7F7F7;
    }
    .pl-list-nav a:hover, .pl-list-nav a.active {
        border-color: #428BCA;
        color: #428BCA;
    }
    .pl-list-nav a {
        display: inline-block;
        color: #888;
        font-weight: bold;
        padding: 2px 5px;
        margin-bottom: 5px;
        margin-right: 6px;
        -webkit-transition: all .2s linear;
        transition: all .2s linear;
        border-bottom: 2px solid #F7F7F7;
    }
    #chkAllPL {
        padding: 3px 10px;
        border: 1px solid #F90;
        color: #f90;
    }
    #chkAllPL.active, #chkAllPL:active {
        background: #f90 !important;
        color: #fff;
    }
    .pl-list-leaf a {
        display: inline-block;
        border: 1px solid #EAEAEA;
        text-align: center;
        margin-right: 6px;
        padding: 3px 10px;
        margin-bottom: 10px;
        color: #888;
        -webkit-transition: all .2s linear;
        transition: all .2s linear;
    }
    .pl-list-leaf a:hover {
        border-color: #428BCA;
    }
    .pl-list-leaf a:active, .pl-list-leaf a.active1 {
        border-color: #428BCA;
        background-color: #428BCA !important;
        color: #fff;
    }
    .l {
        float: left;
    }
</style>

<body style="background-color: #FFF; overflow: auto;">
    <div class="ncap-form-default" ng-app="" ng-init="name = '优惠券名称';
        denomination = '1.00';
        order_limit = '1';
        starttime = '2017-05-15 00:00:00';
        endtime = '2017-05-20 00:00:00'">
        <dl class="row"><dt class="tit"><label for="class_sort"><em>*</em>优惠券：</label></dt>
            <dd class="opt">
                <div class="couponBox">
                    <div class="couponWrap" style="background-color: rgb(244, 67, 54);">
                        <div class="top">
                            <div class="couponName">{{name}}</div>
                            <div class="type"><span class="couponValue">{{denomination}}</span>元优惠券,满<span class="orderLimitValue">{{order_limit}}</span>元可用</div>
                        </div>
                        <div class="bottom"><span class="r" id="couponDateLimit"><span class="couponstart">{{starttime}}</span> - <span class="couponend">{{endtime}}</span>
                            </span>
                        </div>
                    </div>
                <p class="notic"></p>
            </dd>
        </dl>
        <form id="coupon_form" method="post" name="coupon_form"  enctype="multipart/form-data">
            <dl class="row"><dt class="tit"><label for="class_sort"><em>*</em>优惠券名称</label></dt>
                <dd class="opt">
                    <input id="coupon_name" name="coupon_name" placeholder="优惠券名称" ng-model="name" type="text" class="input-txt" value=""><span class="err"></span>
                </dd>
            </dl>

            <dl class="row"><dt class="tit"><label for="class_sort"><em>*</em>面值</label></dt>
                <dd class="opt">
                    <input id="coupon_denomination" name="coupon_denomination" type="text" placeholder="0.00" ng-model="denomination" class="input-txt" value="$coupon_info.coupon_denomination"><span class="err"></span>
                </dd>
            </dl>

            <dl class="row"><dt class="tit"><label for="class_sort"><em>*</em>订单满</label></dt>
                <dd class="opt">
                    <input id="coupon_order_limit" name="coupon_order_limit" type="text" class="input-txt" ng-model="order_limit" placeholder="0.00" value="$coupon_info.coupon_order_limit">元可用<span class="err"></span>
                </dd>
            </dl>
            <dl class="row" id="coupon_to_store_limit">
                <dt class="tit">
                    <label for="class_sort"><em>*</em>限制条件</label>
                </dt>
                <dd class="opt">
                    <div class="area-region-select">
                        <select class="valid select2" id="coupon_limit_type" name="limit_goods_type">
                            <option value="0"  selected>无限制</option>
                            <option value="1" >限制品类</option>
                            <option value="2" >限制商品</option>
                            <option value="3" >限制品牌</option>
                        </select>
                        <input type="hidden" id="limit_goods"  name="limit_goods" value="">
                        <input class="btn btn-link radius" type="button" id="BtnLimitGoods" style="display:none" name="BtnLimitStore" value="编辑"></br>
                        <div id="limitResBox" class="limit-res-box" style="display:none">
                                                    </div>
                    </div>
                    <p class="notic">优惠券的商品使用范围设置</p>
                </dd>
            </dl>
            <dl class="row" id="coupon_to_store_limit">
                <dt class="tit">
                    <label for="class_sort"><em>*</em>可使用门店</label>
                </dt>
                <dd class="opt">
                    <div class="area-region-select">
                        <select class="valid select2" id="SLLimitStore" name="limit_store_type">
                            <option value="0"  selected>所有门店</option>
                            <option value="1" >部分门店</option>
                        </select>
                        <input type="hidden" id="limit_store" name="limit_store" value="">
                        <input class="btn btn-link radius" style="display:none" type="button" id="BtnLimitStore" name="BtnLimitStore" value="编辑"></br>
                        <div id="LimitStoreResBox" class="limit-res-box" style="display:none">
                                                                                                
                                                                                    </div>
                    </div>
                    <p class="notic">优惠券门店使用的范围</p>
                </dd>
            </dl>
            <dl class="row"><dt class="tit"><label for="class_sort"><em>*</em>优惠券有效期</label></dt>
                <dd class="opt">固定有效期<span class="err"></span>
                </dd>
            </dl>
            <dl class="row"><dt class="tit"><label for="class_sort"><em>*</em>有效期</label></dt>
                <dd class="opt">
                    <input name="coupon_start_time" placeholder="开始时间" type="text" id="starttime" value="" ng-model="starttime" style="width:180px !important;" class=" mr-10 ml-10 mb-10 mysearch"> 至
                    <input name="coupon_end_time" placeholder="结束时间" type="text" id="endtime" value="" ng-model="endtime" style="width:180px !important;" class=" mr-10 ml-10 mb-10 mysearch">
                    <span class="err"></span>
                </dd>
            </dl>
            <dl class="row"><dt class="tit"><label for="class_sort"><em>*</em>使用说明</label></dt>
                <dd class="opt">
                    <textarea name="coupon_desc" rows="6" class="tarea" id="statistics_code">
1. 必须在订单金额满足时才能使用；
2. 一张店铺优惠券仅限于单笔订单消费抵用；
3. 优惠券过期则作废;
4. 活动商品，如闪购秒杀不可使用优惠券
5. 优惠券不可抵扣运费                    </textarea>
                    <span class="err"></span>
                </dd>
            </dl>
            </from>
    </div>
    <script>
        laydate({
            elem: '#starttime', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
            format: 'YYYY/MM/DD hh:mm:ss',
            event: 'focus', //触发事件
            istime: true,
            choose: function (datas) {
                document.getElementById("starttime").value = datas;
            }
        });
        laydate({
            elem: '#endtime', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
            format: 'YYYY/MM/DD hh:mm:ss',
            event: 'focus', //触发事件
            istime: true,
            choose: function (datas) {
                document.getElementById("endtime").value = datas;
            }
        });
        $(document).ready(function () {
            //叉叉图标
            $(".limit-res-box").on('click','i.limit-close-btn',function () {
                var val = $(this).data('id');
                console.log($(this).parents('div.area-region-select').find("input[type='hidden']").val());
                if($(this).parents('div.area-region-select').find("input[type='hidden']").length>0){
                    var id = $(this).data("id");
                    var val = $(this).parents('div.area-region-select').find("input[type='hidden']").val();
                    var val_arr = val.split(',');
                    if($.inArray(id.toString(),val_arr)>-1){
                        val_arr.splice($.inArray(id.toString(),val_arr),1);
                        val = val_arr.join(',');
                        $(this).parents('div.area-region-select').find("input[type='hidden']").val(val);
                    }
                }
                $(this).parent('div').remove();

            })
            $("#SLLimitStore").change(function () {
                var slvalue = $('#SLLimitStore option:selected').val();
                if (slvalue == 0)
                {
                    document.getElementById("BtnLimitStore").style.display = 'none';
                    document.getElementById("LimitStoreResBox").style.display = 'none';
                } else if (slvalue == 1) {
                    document.getElementById("BtnLimitStore").style.display = 'inline-block';
                    document.getElementById("LimitStoreResBox").style.display = 'inline-block';
                    open_limit_store();
                }
            });
            $("#BtnLimitStore").click(function () {
                open_limit_store();
            })
            function open_limit_store()
            {
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: "ajax_get_stores_info",
                    data: '',
                    success: function (data) {
                        if (data.state) {
                            var content = '<div class="text-r pd-10"><div > ' +
                                    '<input type="text" class="form-control  w150 " name="storeName" placeholder="店铺名称">' +
                                    '<span class="input-group-btn">' +
                                    '<button type="button" class="btn btn-success radius ml-10" id="store_search">筛选</button> </span> </div> </div>' +
                                    '<div class="text-l pd-10 store_info" >';
                            if (data.info) {
                                if ($("#LimitStoreResBox div.dib").length > 0) {
                                    var old_store = new Array();
                                    $.each($("#LimitStoreResBox div.dib"), function () {
                                        old_store.push($(this).data("id"));
                                    });
                                } else {
                                    var old_store = false;
                                }
                                var checked = '';
                                $.each(data.info, function (k, v) {
                                    if (old_store) {
                                        if (old_store.indexOf(v.store_id * 1) > -1) {
                                            checked = "checked='checked'";
                                        } else {
                                            checked = '';
                                        }
                                    }
                                    content += '<div class="checkbox sltdia-item checkbox-primary ml-20" >' +
                                            '<input id="d-' + v.store_id + '"  type="checkbox" value="' + v.store_id + '" ' + checked + '> ' +
                                            '<label for="d-' + v.store_id + '" title="' + v.store_name + '">' + v.store_name + '</label> ' +
                                            '</div>';
                                })
                            } else {
                                content += '<div>暂无相关数据</div>';
                            }
                            content += '</div>';
                            layer.open({
                                type: 1,
                                title: '<b>选择门店</b>',
                                area: ['60%', '45%'], //宽高
                                content: content,
                                btn: ['确认', '取消'],
                                skin: 'layui-layer-rim', //加上边框
                                success: function () {
                                    $("#store_search").click(function () {
                                        var storeName = $("input[name='storeName']").val();
                                        $.ajax({
                                            type: 'get',
                                            dataType: 'json',
                                            url: "ajax_get_stores_info?storeName=" + storeName,
                                            data: '',
                                            success: function (data) {
                                                if (data.state) {
                                                    var html = '';
                                                    if (data.info) {
                                                        $.each(data.info, function (k, v) {
                                                            html += '<div class="checkbox sltdia-item checkbox-primary ml-20" >' +
                                                                    '<input id="d-' + v.store_id + '"  type="checkbox" value="' + v.store_id + '"> ' +
                                                                    '<label for="d-' + v.store_id + '" title="' + v.store_name + '">' + v.store_name + '</label> ' +
                                                                    '</div>';
                                                        })
                                                    } else {
                                                        html += '<div class="ml-20"><span>暂无相关数据</span></div>';
                                                    }
                                                    $("div.store_info").html(html);
                                                }
                                            }
                                        })
                                    })
                                },
                                yes: function () {
                                    var store_div = '';
                                    var select_store = [];
                                    $.each($("input[type='checkbox']"), function () {
                                        if ($(this).is(':checked')) {
                                            var id = $(this).val();
                                            select_store.push(id);
                                            var name = $("label[for='d-" + id + "']").html();
                                            store_div += "<div data-id='" + id + "' class='rel dib w150 ell pr20 mr5'><span>" + name +
                                                    "</span><i class='iconfont limit-close-btn' data-id='" + id + "'></i></div>";
                                        }
                                    });
                                    $("#LimitStoreResBox").html(store_div);
                                    $("#limit_store").val(select_store.join(','));
                                    layer.closeAll();
                                }, no: function () {
                                    return false;
                                }
                            })
                        }
                    }
                })
            }
            //限制条件
            $("#coupon_limit_type").change(function () {
                var slvalue = $('#coupon_limit_type option:selected').val();
                if (slvalue == 0)
                {
                    document.getElementById("BtnLimitGoods").style.display = 'none';
                    document.getElementById("limitResBox").style.display = 'none';
                } else {
                    document.getElementById("BtnLimitGoods").style.display = 'inline-block';
                    document.getElementById("limitResBox").style.display = 'inline-block';
                    if (slvalue == 1) {
                        open_limit_cate();
                    } else if (slvalue == 2) {
                        open_limit_goods();
                    } else if (slvalue == 3){
                        open_limit_brand();
                    }
                }
            });
            $("#BtnLimitGoods").click(function () {
                var slvalue = $('#coupon_limit_type option:selected').val();
                if (slvalue == 1) {
                    open_limit_cate();
                } else if (slvalue == 2) {
                    open_limit_goods();
                } else if (slvalue == 3){
                    open_limit_brand();
                }
            })
            function open_limit_cate()  //品类
            {
                var old_cate = $("#limit_goods").val();
                var old_cate = old_cate.split(',');
                var old_cate_str = $("#limitResBox").html();
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: "ajax_get_class_use_coupon",
                    data: '',
                    success: function (data) {
                        if (data.state) {
                            if (data.info) {
                                var content = '<div class="text-r pd-10">' +
                                        '<table class="table mt-10">' +
                                        '<tbody>' +
                                        '<tr>' +
                                        '<td>' +
                                        '<div class="ovh">' +
                                        '<p class="ovh pl-list-nav" id="plListNav">';
                                $.each(data.info, function (k, v) {
                                    content += '<a href="javascript:;" data-id="' + v.gc_id + '" class="">' + v.gc_name + '</a>';
                                })
                                content += '</p>' +
                                        '</div>' +
                                        '</td>' +
                                        '</tr>' +
                                        '</tbody>' +
                                        '</table>' +
                                        
                                        '<table class="table mt-10">' +
                                        '<tbody>' +
                                        '<tr>' +
                                        '<td>' +
                                        '<div class="ovh pl-list-leaf bdr-e4-t">' +
                                        '<a href="javascript:;" id="chkAllPL" class="dib l mr10">全选</a>' +
                                        '<div id="plListLeaf">' +
                                        '</div>' +
                                        '</div>' +
                                        '</td>' +
                                        '</tr>' +
                                        '</tbody>' +
                                        '</table>' +
                                        
                                        '<table class="table mt-10">' +
                                        '<tbody>' +
                                        '<tr>' +
                                        '<td>' +
                                        '<div class="pl-chk-res pl15"><h5 class="limit-h5 mt5 mb5">已选择如下品类:</h5>' ;
                                        if(old_cate_str!==''){
                                            content +='<div class="limit-res-box  c-8" id="limitResBox4Category">'+old_cate_str+'</div>';
                                        }else{
                                            content += '<div class="limit-res-box  c-8" id="limitResBox4Category">请选择需要限制的品类</div>' ;
                                        }
                                    content +='</div>' +
                                        '</td>' +
                                        '</tr>' +
                                        '</tbody>' +
                                        '</table>' +
                                        '</div>';
                            }
                            layer.open({
                                type: 1,
                                title: '<b>选择品类</b>',
                                area: ['80%', '80%'], //宽高
                                content: content,
                                btn: ['确认', '取消'],
                                skin: 'layui-layer-rim', //加上边框
                                success: function () {
                                    get_class_list_by_parent($("p.pl-list-nav").find('a').first().data('id'));
                                    $("p.pl-list-nav").find('a').first().addClass('active');
                                    $(".pl-list-nav a").click(function () {  //切换分类
                                        $(this).addClass('active').siblings().removeClass('active');
                                        $("#chkAllPL").removeClass('active');
                                        var p_id = $(this).data('id');
                                        get_class_list_by_parent(p_id);
                                    })
                                    function get_class_list_by_parent(parent_id) {
                                        if ((parent_id == 'undfined') || (parent_id == '') || (parent_id == 0)) {
                                            return false;
                                        }
                                        if ($("#plListLeaf").find('div').length > 0) {
                                            $("#plListLeaf").find('div').attr('style', 'display:none');
                                            if ($("#plListLeaf").find("div[id='PLLeaf-" + parent_id + "']").length > 0) {
                                                $("#PLLeaf-" + parent_id + "").attr('style', 'display:block');
                                                return false;
                                            }
                                        }
                                        $.ajax({
                                            type: 'get',
                                            dataType: 'json',
                                            url: "ajax_get_class_use_coupon?parent_id=" + parent_id,
                                            data: '',
                                            success: function (data) {
                                                var html = '<div id="PLLeaf-' + parent_id + '">';
                                                if (data.state && data.info) {
                                                    $.each(data.info, function (k, v) {
                                                        var class_str="";
                                                        if($.inArray(v.gc_id,old_cate)>=0){
                                                            class_str="active1";
                                                        }
                                                        html += '<a href="javascript:;" onclick="change_cate(this)" class="'+class_str+'" ' +
                                                                'style="-webkit-animation-delay:0ms;animation-delay:0ms;" data-id="' + parent_id + '-' + v.gc_id + '">' + v.gc_name + '</a>';
                                                        if (!$.isEmptyObject(v.son_cate)) {
                                                            $.each(v.son_cate, function (kk, vv) {
                                                                var class_str="";
                                                                if($.inArray(vv.gc_id,old_cate)>=0){
                                                                    class_str="active1";
                                                                }
                                                                html += '<a href="javascript:;"  onclick="change_cate(this)" class="'+class_str+' ' +
                                                                        'style="-webkit-animation-delay:0ms;animation-delay:0ms;" data-id="' + parent_id + '-' + vv.gc_id + '">' + vv.gc_name + '</a>';
                                                            })
                                                        }
                                                    })
                                                } else {
                                                    html += '<span>暂无相关数据</span>';
                                                }
                                                html += '</div>';
                                                $("#plListLeaf").append(html);
                                            }
                                        })
                                    }
                                    $("#chkAllPL").click(function () { //全选
                                        var id = $("#plListNav").find('a.active').data('id');
                                        if ($(this).hasClass('active')) {
                                            $(this).removeClass('active');
                                            $("#plListLeaf").find("#PLLeaf-" + id + "").find('a').removeClass('active1');
                                        } else {
                                            $(this).addClass('active');
                                            $("#plListLeaf").find("#PLLeaf-" + id + "").find('a').addClass('active1');
                                        }
                                        set_cate_selected();
                                    })
                                },
                                yes: function () {
                                    var cate_div = $("#limitResBox4Category").html();
                                    var select_cate = [];
                                    $.each($("#plListLeaf").find('div'), function () {
                                        if ($(this).find('a').length > 0) {
                                            $.each($(this).find('a'), function () {
                                                if ($(this).hasClass('active1')) {
                                                    var id_str = $(this).data("id");
                                                    var id = id_str.substring(id_str.indexOf("-")+1);
                                                    select_cate.push(id);
//                                                    var name = $(this).html();
//                                                    cate_div += '<div data-id="' + id + '" class="rel dib w150 ell pr20 mr5">' + name +
//                                                            '<i class="iconfont limit-close-btn" data-id="' + id + '"></i>' +
//                                                            '</div>';
                                                }
                                            })
                                        }
                                    })
                                    select_cate = select_cate.join(',');
                                    $("#limitResBox").html(cate_div);
                                    $("#limit_goods").val(select_cate);
                                    layer.closeAll();
                                }, no: function () {
                                    return false;
                                }
                            })
                        }
                    }
                })
            }
        })
        function change_cate(obj) { //单选
            if ($(obj).hasClass('active1')) {
                $(obj).removeClass('active1');
            } else {
                $(obj).addClass('active1');
            }
            set_cate_selected();
        }
        function set_cate_selected() {  //重置选中的品类
            if ($("#plListLeaf").find('div').length > 0) {
                var set_selected_str = '';
                $.each($("#plListLeaf").find('div'), function () {
                    if ($(this).find('a').length > 0) {
                        var id = ($(this).attr('id').substr(7)) * 1;
                        var name = $("#plListNav").find("a[data-id='" + id + "']").html();
                        var str = '<div> <b>' + name + ': </b>';
                        var len = 0;
                        $.each($(this).find('a'), function () {
                            if ($(this).hasClass('active1')) {
                                len++;
                                str += $(this).html() + '/';
                            }
                        })
                        if (len > 0) {
                            str += '</div>';
                            set_selected_str += str;
                        }
                    }
                })
                $("#limitResBox4Category").html(set_selected_str);
            }
        }
        function open_limit_goods()  //商品
        {
            if($("#limit_goods").val()!==''){
                var old_goods = $("#limit_goods").val().split(',');
            }else{
                var old_goods = [];
            }
            var content = '<div class="pd-10">' +
                    '<div class="search mt-5 mb-10">' +
                    '<select class="valid  input-text input_text mr-5 " id="cate_type" name="cate_type">' +
                    '<option value="1" seleted>类目</option>' +
                    '<option value="2">自定义分类</option>' +
                    '</select>' +
                    '<select class="valid  input-text input_text cate_type select2 mr-5" id="cate" name="cate">' +
                    '<option value="">-类目-</option>' +
                    '</select>' +
                    '<select class="valid  input-text input_text cate_type select2 hidden mr-5" id="self_taxonomy" name="self_taxonomy">' +
                    '<option value="">-自定义分类-</option>' +
                    '</select>' +
                    '<input type="text" class="form-control  w150 input-text input_text ml-20" name="goods_name" placeholder="商品名称或款号">' +
                    '<span class="input-group-btn">' +
                    '<button type="button" class="btn btn-success radius ml-5" id="goods_search">筛选</button> </span> ' +
                    '</div>' +
                    '<table class="table table-border table-bordered mb-10" >' +
                    '<thead>' +
                    '<tr bgcolor="EAEDF1" class=""><th>选择</th><th>款号</th><th>商品信息</th><th>现售价</th><th>吊牌价</th><th>总库存</th></tr>' +
                    '</thead>' +
                    '<tbody id="goods_info">';
            content += '</tbody>' +
                    '</table>' +
                    '<div class="checkbox">'+
                    '<input class="j-dia-chkall" type="checkbox" id="goods-chkall"> '+
                    '<label for="cate-chkall">全选</label>&emsp;&emsp;'+
                    '<span>已选择 <span class="text-primary f14 goods-num">'+old_goods.length+'</span> 项</span>'+
                    '</div>'+
                    '<div id="page1" class="mt-5 text-c"></div>' +
                    '</div>';
            layer.open({
                type: 1,
                title: '<b>选择商品</b>',
                area: ['80%', '80%'], //宽高
                content: content,
                btn: ['确认', '取消'],
                skin: 'layui-layer-rim', //加上边框
                success: function () {
                    //分页
                    page(1);
                    function page(curr,search=false) {
                        if(!search){
                            if($("#goods_info tr:not(.hidden)").length>0){  
                                $("#goods_info tr:not(.hidden)").addClass('hidden');
                            }
                            $("#goods-chkall").attr('checked',false);
                            if($("#goods_info tr.page_"+curr+"").length>0){ 
                                $("#goods_info tr.page_"+curr+"").removeClass('hidden');
                                return false;
                            }
                        }
                        var cate_type = $("#cate_type").val();
                        var cate = $('select.cate_type:not(.hidden)').val();
                        var goods_name = $("input[name='goods_name']").val();
                        $.getJSON('ajax_get_goods_use_coupon?cate_type='+cate_type+'&cate='+cate+'&goods_name='+goods_name, {
                            page: curr || 1 //向服务端传的参数，此处只是演示
                        }, function (data) {
                            var html = '';
                            if (data.state && data.info) {
                                $.each(data.info, function (k, v) {
                                    var checked = "";
                                    html += '<tr class="goods_tr page_'+curr+'">' +
                                            '<td>' +
                                            '<div class="checkbox sltdia-item checkbox-primary m0">' ;
                                    if($.inArray(v.goods_id,old_goods)>=0){
                                        checked = "checked='true'";
                                    }
                                            html +='<input id="d-' + v.goods_id + '" name="d-' + v.goods_id + '" '+checked+' class="" data-id="' + v.goods_id + '" onclick="change_goods(this)" type="checkbox" value="' + v.goods_id + '">' +
                                            '<label for="d-' + v.goods_id + '" title="' + v.goods_name + '"></label> ' +
                                            '</div></td>' +
                                            '<td>' + v.goods_spu + '</td>' +
                                            '<td class="goods_name">' + v.goods_name + '</td>' +
                                            '<td>' + v.goods_price + '</td>' +
                                            '<td>' + v.goods_marketprice + '</td>' +
                                            '<td>100</td>' +
                                            '</tr>';
                                })
                            } else {
                                html += '<tr><td colspan="6">暂无信息</td></tr>';
                            }
                            if(!search){
                                $("#goods_info").append(html);
                            }else{
                                $("#goods_info").html(html);
                            }
                            laypage({
                                cont: $("#page1"), //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
                                pages: data.pages, //通过后台拿到的总页数
                                curr: curr || 1, //当前页
                                skin: "#5eb95e",
                                jump: function (obj, first) { //触发分页后的回调
                                    if (!first) { //点击跳页触发函数自身，并传递当前页：obj.curr
                                        page(obj.curr);
                                    }
                                }
                            });
                        });
                    }
                    get_class_list_by_type($("#cate_type").val());
                    function get_class_list_by_type(type) {
                        var cate_id = new Array();
                        cate_id[1] = 'cate';
                        cate_id[2] = 'self_taxonomy';
                        if ((type == 'undfined') || (type == '') || (type == 0)) {
                            type = 1;
                        }
                        var id = cate_id[type];
                        $("select[id='" + id + "']").removeClass('hidden').siblings('select.cate_type').addClass('hidden');
                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: "ajax_get_class_use_coupon?show_list=1&type=" + type,
                            data: '',
                            success: function (data) {
                                if (data.state && data.list) {
                                    $("#" + id + "").append(data.list);
                                }
                            }
                        })
                    }
                    $("#cate_type").change(function () {  //切换分类
                        var type = $(this).val();
                        get_class_list_by_type(type);
                    })
                    $("#goods_search").click(function () {  //切换分类
                        page(1);
                    })
                    $("#goods-chkall").click(function () { //全选
                        console.log($(this).is(':checked'));
                        if ($(this).is(':checked')){
                            if($("tr.goods_tr:not(.hidden)").length>0){
                                $("tr.goods_tr:not(.hidden) input[type='checkbox']").attr("checked", true);
                            }
                        }else{
                            if($("tr.goods_tr:not(.hidden)").length>0){
                                $("tr.goods_tr:not(.hidden) input[type='checkbox']").attr("checked", false);
                            }
                        }
                        set_goods_selected();
                    })
                },
                yes: function () {
                    var goods_div = '';
                    var select_goods = [];
                    if ($("#goods_info tr.goods_tr").length > 0) {
                        $.each($("#goods_info tr.goods_tr "), function () {
                            if ($(this).find('input[type="checkbox"]').is(':checked')) {
                                var id= $(this).find('input[type="checkbox"]').data('id');
                                select_goods.push(id);
                                var name = $(this).find('td.goods_name').html();
                                goods_div += '<div data-id="' + id + '" class="rel dib w150 ell pr20 mr5"><span>' + name +
                                            '</span><i class="iconfont limit-close-btn" data-id="' + id + '"></i>' +
                                            '</div>';
                            }
                        })
                    }
                    select_goods = select_goods.join(',');
                    $("#limitResBox").html(goods_div);
                    $("#limit_goods").val(select_goods);
                    layer.closeAll();
                }, no: function () {
                    return false;
                }
            })
        }
        function change_goods(obj) { //单选
            set_goods_selected();
        }
        function set_goods_selected() {  //重置选中的商品
            var num = 0;
            if ($("#goods_info tr.goods_tr").length > 0) {
                $.each($("#goods_info tr.goods_tr "), function () {
                    if ($(this).find('input[type="checkbox"]').is(':checked')) {
                        num++;
                    }
                })
            }
            $("span.goods-num").html(num);
        }
        function open_limit_brand()  //品牌
        {
            if($("#limit_goods").val()!==''){
                var old_brand = $("#limit_goods").val().split(',');
            }else{
                var old_brand = [];
            }
            var content = '<div class=" pd-10"><div class="text-r">' +
                            '<input type="text" class="form-control  w150 " name="brandName" placeholder="品牌名称">' +
                            '<span class="input-group-btn">' +
                            '<button type="button" class="btn btn-success radius ml-10" id="brand_search">筛选</button> </span> </div>' +
                            '<div class="text-l pd-10 brand_info" id="brand_info" >'+
                            '</div>'+
                            '<div class="checkbox text-c">'+
                            '<input class="j-dia-chkall" type="checkbox" id="brand-chkall"> '+
                            '<label for="brand-chkall">全选</label>&emsp;&emsp;'+
                            '<span>已选择 <span class="text-primary f14 brand-num">'+old_brand.length+'</span> 项</span>'+
                            '</div>'+
                            '<div class="page2 text-c" id="page2"></div>';
                content += '</div>';
                    
            layer.open({
                type: 1,
                title: '<b>选择品牌</b>',
                area: ['80%', '80%'], //宽高
                content: content,
                btn: ['确认', '取消'],
                skin: 'layui-layer-rim', //加上边框
                success: function () {
                    //分页
                    brand_page(1);
                    function brand_page(curr,search=false) {
                       if(!search){
                            if($("#brand_info div.brand_div:not(.hidden)").length>0){  
                                $("#brand_info div.brand_div:not(.hidden)").addClass('hidden');
                            }
                            $("#brand-chkall").attr('checked',false);
                            if($("#brand_info div.page_"+curr+"").length>0){ 
                                $("#brand_info div.page_"+curr+"").removeClass('hidden');
                                return false;
                            }
                       }
                        var brand_name = $("input[name='brandName']").val();
                        $.getJSON('ajax_get_brands_use_coupon?brands_name='+brand_name, {
                            page: curr || 1 //向服务端传的参数，此处只是演示
                        }, function (data) {
                            var html = '';
                            if (data.state && data.info) {
                                $.each(data.info, function (k, v) {
                                    var checked = "";
                                    if($.inArray(v.brand_id,old_brand)>=0){
                                        checked = "checked='true'";
                                    }
                                    html += '<div class="checkbox sltdia-item checkbox-primary brand_div page_'+curr+'" style="width: 230px; display: inline-block;">'+
                                            '<input id="d-'+v.brand_id+'" '+checked+' onclick="set_brand_selected()" class="j-dia-item" data-id="'+v.brand_id+'" type="checkbox" value="'+v.brand_id+'"> '+
                                            '<label for="d-'+v.brand_id+'" title="'+v.brand_name+'">'+v.brand_name+'</label>'+
                                            ' </div>';
                                })
                            } else {
                                html += '<div class="ml-20"><span>暂无相关数据</span></div>';
                            }
                            if(!search){
                                $("#brand_info").append(html);
                            }else{
                                $("#brand_info").html(html);
                            }
                            laypage({
                                cont: $("#page2"), //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
                                pages: data.pages, //通过后台拿到的总页数
                                curr: curr || 1, //当前页
                                skin: "#5eb95e",
                                jump: function (obj, first) { //触发分页后的回调
                                    if (!first) { //点击跳页触发函数自身，并传递当前页：obj.curr
                                        brand_page(obj.curr);
                                    }
                                }
                            });
                        });
                    }
                    $("#brand_search").click(function () {  
                        brand_page(1,true);
                    })
                    $("#brand-chkall").click(function () { //全选
                        if ($(this).is(':checked')){
                            if($("div.brand_div:not(.hidden)").length>0){
                                $("div.brand_div:not(.hidden) input[type='checkbox']").attr("checked", true);
                            }
                        }else{
                            if($("div.brand_div:not(.hidden)").length>0){
                                $("div.brand_div:not(.hidden) input[type='checkbox']").attr("checked", false);
                            }
                        }
                        set_brand_selected();
                    })
                },
                yes: function () {
                    var brand_div = '';
                    var select_brand = [];
                    if ($("#brand_info div.brand_div").length > 0) {
                        $.each($("#brand_info div.brand_div"), function () {
                            if ($(this).find('input[type="checkbox"]').is(':checked')) {
                                var id= $(this).find('input[type="checkbox"]').data('id');
                                select_brand.push(id);
                                var name = $(this).find('label').html();
                                brand_div += '<div data-id="' + id + '" class="rel dib w150 ell pr20 mr5"><span>' + name +
                                            '</span><i class="iconfont limit-close-btn" data-id="' + id + '"></i>' +
                                            '</div>';
                            }
                        })
                    }
                    select_brand = select_brand.join(',');
                    $("#limitResBox").html(brand_div);
                    $("#limit_goods").val(select_brand);
                    layer.closeAll();
                }, no: function () {
                    return false;
                }
            })
        }
        
        function set_brand_selected() {  //重置选中的商品
            var num = 0;
            if ($("#brand_info div.brand_div").length > 0) {
                $.each($("#brand_info div.brand_div"), function () {
                    if ($(this).find('input[type="checkbox"]').is(':checked')) {
                        num++;
                    }
                })
            }
            $("span.brand-num").html(num);
        }

    </script>
</body>

</html><?php }
}
