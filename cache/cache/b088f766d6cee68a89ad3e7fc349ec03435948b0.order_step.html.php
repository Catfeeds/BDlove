<?php
/* Smarty version 3.1.29, created on 2017-09-21 14:32:29
  from "D:\www\yunjuke\application\pay\views\order_step.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c35cfd4bc6d8_28428466',
  'file_dependency' => 
  array (
    'b088f766d6cee68a89ad3e7fc349ec03435948b0' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\order_step.html',
      1 => 1505803588,
      2 => 'file',
    ),
    '06ff41d60b0a9f396441dd0bc7be4a980f9c9cf7' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\pageheader.html',
      1 => 1501752072,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59c35cfd4bc6d8_28428466 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	
	<link href="http://[::1]/yunjuke/application/pay/views/css/index.css" rel="stylesheet" type="text/css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/index_1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/plugins/H-ui/static/h-ui.admin/css/style.css" />

    <link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
    <link href="http://[::1]/yunjuke/application/pay/views/css/font-awesome.min.css" rel="stylesheet" />
    <link href="http://[::1]/yunjuke/application/pay/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/application/pay/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
    <link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>



    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/admin.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery-migrate-1.2.1.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/common.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/common/common.js"></script>

    <!--<script type="text/javascript" src="http://[::1]/yunjuke/plugins/H-ui/static/h-ui/js/H-ui.min.js"></script>-->

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/jquery.validation.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

    <script type="text/javascript" src="http://[::1]/yunjuke/application/pay/views/js/flexigrid.js"></script>

</head>
<body style="background-color: #FFF; overflow: auto;">
<link href="http://[::1]/yunjuke/application/pay/views/css/admin_other.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layui.js"></script>
<link rel="stylesheet" type="text/css" src="http://[::1]/yunjuke/plugins/layer/layui.css">
<style>
.new-store-select{
	    line-height: 16px;
    color: #FFF;
    display: inline-block;
    height: 16px;
    padding-left: 5px;
    padding-right: 5px;
    min-width: 50px;
    text-align: center;
    margin-right: 2px;
    box-shadow: inset 1px 1px 0 rgba(255,255,255,0.25);
    cursor: default;
    height: 20px!important;
    line-height: 20px!important;
}
    .sign{width: 20px;height: 20px;margin: 0 10px;}
    .sign  .ico-check{
        background: url(http://[::1]/yunjuke/application/pay/views/images/flexigrid_pic.png) no-repeat 0 0;
        display: inline-block;
        width: 20px;
        height: 20px;
        cursor: pointer;
        vertical-align: middle;
    }
    .mt-5{
        margin-top:5px!important;
    }
    a.ncbtn-mini{margin-right:10px;}
    .flexigrid .pDiv.pos-r{position: relative}
    tr.trSelected .sign  .ico-check{  background-position: -20px 0;}
    .ncsc-default-table thead th { font-weight:normal;line-height: 20px; color: #555; background-color: #F5F5F5; text-align:center; height: 20px; padding: 8px 0; border-bottom: solid 1px #c8c8c8;border-top: 1px solid #c8c8c8 }
    .order tbody tr td.sep-row2{height: auto;padding:8px 0;border-bottom: 1px solid #c8c8c8;background-color: #f5f5f5}
    .tDiv2 {
        font-size: 0;
        float: left;
        overflow: hidden;
        padding-left: 20px;
    }
    .fbutton {
        vertical-align: top;
        letter-spacing: normal;
        display: inline-block;
        padding-right: 8px;
        margin-left: 8px;
        margin-right: -1px;
        border-right: dotted 1px #D7D7D7;
        cursor: pointer;
    }
    .fbutton div {
        font-size: 12px;
        line-height: 20px;
        color: #999;
        background-color: #FFFFFF;
        height: 20px;
        padding: 2px 7px;
        border: solid 1px #F0F0F0;
        border-radius: 4px;
    }
    td p{
        margin-bottom: 0 !important;
    }
.select2-container .select2-selection--multiple{
	height: 28px !important;
	min-height: 0px !important;
	position: relative;
	top: 4px;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered{
    	height: 26px !important;    	
    	box-sizing: border-box;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered li{
    	height: 24px !important;
    	margin: 0px !important;
    	box-sizing: border-box;
    }
    
   /* */
  .select2-container .select2-selection--multiple a{
  	position: absolute;
  	right: 2px;
  	top: 12px;
  	
  }
  .select2-container .select2-selection--multiple:hover,.select2-container .select2-selection--multiple:focus{
  	border: 1px solid #0099CC;
  	box-shadow: 0 0 0 2px rgba(82, 168, 236, 0.15);
  	-moz-box-shadow:0 0 0 2px rgba(82, 168, 236, 0.15);
  	-webkit-box-shadow: 0 0 0 2px rgba(82, 168, 236, 0.15);
  
  }
  .ncsc-goods-thumb{
  	margin-left: 10px;
  }
  input[type="text"]{vertical-align: inherit;}
  .SumoSelect{top:9px !important}
  .layui-layer-page{max-height:90%;}
  .setdepot p span{
    color: #FFF;
    display: block;
    height: 16px;
    overflow: hidden;
    padding-left: 15px;
    padding-right: 15px;
    width: 50px!important;
    text-align: center;
    margin:0 auto;
    box-shadow: inset 1px 1px 0 rgba(255,255,255,0.25);
    cursor: pointer;
    height: 20px!important;
  	line-height: 20px!important;
	}
  .red-number{
    font: bold 12px/20px Verdana;
    color: #C00;
  }
  .setdepot{
  	text-align: left!important;
  }
  .ncsc-default-table td .goods-name dt a{
      width:90%;
      vertical-align: middle;
      display: inline-block;
      height:20px;
}
.ncsc-default-table td .goods-name dt{
    width:400px;
}
@media screen and (max-width: 1800px){
    .ncsc-default-table td .goods-name dt{
        width:300px;
    }
}
@media screen and (max-width: 1590px){
    .ncsc-default-table td .goods-name dt{
        width:250px;
    }
}

.good-name{
	width: 100%;
	text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}
.goods_pay_price{
	color: #3BB4F2;
}
.remark{
	width: 150px;
	text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

@media only screen and (max-width: 1400px) {
	.remark{
		width: 100px;
	}
}

.clear{
		clear: both;
	}
.weui-picker__action {
    display: block;
    -webkit-box-flex: 1;
    -webkit-flex: 1;
    flex: 1;
    color: #1AAD19 !important;
}
	.weui-uploader__input-box {
    width: 50px;
    height: 50px;
    border-radius: 3px;
}
.weui-uploader__file {
    width: 50px;
    height: 50px;
}
.weui-uploader__input-box:before {
    width: 39.5px;
    height: 39.5px;
    background: url(http://[::1]/yunjuke/application/pay/views/images/addprice.png) no-repeat center;
    background-size:80% 70%;  
}
.weui-uploader__input-box:after {
    width: 0px;
    height:0px; 
}
.weui-uploader__input-box{
	border: none;
}
.btn-sub{
	width:100%;
	position: fixed;
	height: 50px;
	bottom: 0;
	line-height: 50px;
	text-align: center;
	background: #dd2727;
	color: #fff;
	z-index:999;
	font-size: 18px;
}
.weui-cells_radio .weui-check:checked + .weui-icon-checked:before {
    color: #dd2727;
}
.weui-icon-success-no-circle {
    font-size: 14px;
    color: #dd2727;
}
.illustrate{
	display: flex;
}
.illustrate .weui-cell__bd{
	font-size: 15px;
}
.illustrate .weui-cell__bd span{
	font-size: 14px;
	color: #999;
	margin-left: 10px;
}
.takeover{
	display: none;
}
.weui-cells__title{
	font-size: 16px;
	color: #333;
	font-weight: bold;
}
.weui-cells__title span{
	color: #dd2727;
}
.small{
	font-size: 13px;
	color: #999!important;
	margin-left: 7px;
}
.ill{
	font-size: 14px;color: #999;
	line-height: 23px;
}

/*new*/
.good_property{
	color: #999;
	margin-right: 20px;
}
.weui-cells {
    font-size: 15px;
    margin-top: 10px;
}
.good_property_content{
	width: 70%;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.good_property_content a{
	color: #DD2727;
	margin-left: 10px;
}
.good_info{
	margin: 15px;
}
.good_info p{
	float: left;
}
.cl{
	margin-top: 10px;
}
.cl label{
	text-align: right;
}
#preview img{
	width:90px;
	height: 90px;
	vertical-align: top;
	margin-right: 7px;
	margin-bottom: 5px;
}
.uploadimg{
	position: relative;
	float: left;
}
.fa-close:before, .fa-times:before {
    position: absolute;
    top: -7px;
    left: 88px;
}
.condition input{
	margin-bottom: 5px;
}
    .w-200{
        width:200px;
    }
    .orde{
        max-width:90px;
        display:inline-block;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
        line-height:10px;
    }
    .tear{
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        background: #3bb4f2!important;
        cursor: pointer!important;
    }
.tear:hover{
    background: #0f9ae0!important;
}
.ncsc-default-table td .goods-name dd {
    margin-bottom: 5px;
}
    .info-left{
        width:80px;
        display:inline-block;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
        line-height:11px;
        vertical-align: middle;
        margin-top:-2px;
    }
    .mr-5{
        margin-right: 5px!important;
    }
.pagination {
    display: inline-block;
    margin: 10px 0 0 0!important;
    padding: 0 !important;
    border-radius: 4px;
}
.pagination>li {
    display: inline
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #999;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd
}
.pagination>li:first-child>a, .pagination>li:first-child>span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px
}
.pagination>li:last-child>a, .pagination>li:last-child>span {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px
}
.pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
    z-index: 2;
    color: #f37b1e;
    background-color: #eee;
    border-color: #ddd
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #f37b1e;
    border-color: #f37b1e
}
.pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
    color: #777;
    cursor: not-allowed;
    background-color: #fff;
    border-color: #ddd
}
.pagination-lg>li>a, .pagination-lg>li>span {
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333
}
.pagination-lg>li:first-child>a, .pagination-lg>li:first-child>span {
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px
}
.pagination-lg>li:last-child>a, .pagination-lg>li:last-child>span {
    border-top-right-radius: 6px;
    border-bottom-right-radius: 6px
}
.pagination-sm>li>a, .pagination-sm>li>span {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5
}
.pagination-sm>li:first-child>a, .pagination-sm>li:first-child>span {
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px
}
.pagination-sm>li:last-child>a, .pagination-sm>li:last-child>span {
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px
}
    .pagenum{
        display: flex;
        justify-content: center;
    }
.sizenum{
    cursor: pointer;
}
.sizenum.active{
    border:1px solid #ff6600;
}
.sizenum.active a{
    color:#000;
}
    .changesize{
        position: absolute;
        top:20px;
        left:160px;
        border:1px solid #5a98de;
        background: #fff;
    }
.changesize ul{
    list-style: none;
    margin:0px;
    width:100%;

}
.changesize ul li{
    padding:5px;
    width:100%;
    color:#666;

}
.changesize ul li.active{
    background: #5a98de;
    color: #fff;
}
.changesize ul li:hover{
    background: #5a98de;
    color: #fff;
}
    .input_goodsnum{
        width:50px;
        margin:5px;
    }
    .goodsnum{
        color:#5a98de;display:inline-block;min-width:20px;min-height:12px;
    }
.goodssize{
    color:#5a98de;display:inline-block;min-width:40px;min-height:12px;
}
.goodsid{
    color:#5a98de;display:inline-block;min-width:80px;min-height:12px;
}
.ui-tooltip{z-index:99999999;}
</style>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 订单管理 <span class="c-gray en">&gt;</span> 网店订单管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<div class=" radius pd-10">
    <div id="tab_demo" class="HuiTab">
        <div class="tabBar cl">
            <span class="current" onClick="javascript:location.href='order_step'">所有订单</span>
            <!-- <span onClick="javascript:location.href='order_step?tab_sl=1'">已挂起订单</span>
            <span onClick="javascript:location.href='order_step?tab_sl=2'">已生成订单</span>
            <span onClick="javascript:location.href='order_step?tab_sl=3'">生成失败订单</span> -->
        </div>
        <!--同步订单-->
        <div class="tabCont mt-10">
            <!-- 内容一-->
            <div class="mb-10">
                <form id="order-step">
                <i class="fa fa-clock-o f-30"></i>同步操作：
                <input type="text" name="start_time" id="col_time_1" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" class="input-text f-12 ml-10 mr-20 input_text datainp wicon" >至
                <input type="text" name="end_time" id="col_time_2" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" class="input-text f-12 ml-20 mr-10 input_text datainp wicon" >
               
                <a class="btn btn-success radius mr-5" href="javascript:;" id="sync">
                    <span><i class="fa fa-refresh" aria-hidden="true"></i>同步店铺订单</span>
                </a>
                <a class="btn btn-secondary radius mr-5" href="javascript:;" onclick="order_download() ">
                    <span><i class="fa fa-cloud-download"></i>下载订单</span>
                </a>
                <a class="btn btn-primary radius mr-5" href="javascript:;" onclick="sync_order_set()">
                    <span><i class="fa fa-cog" aria-hidden="true"></i>同步设置</span>
                </a>
                </form>
            <script>
                    
                </script></div>
            <form id="formSearch">
            <div class="" style="display: flex;">
                <div style="width: 100px;flex-shrink: 0;"><i class="fa fa-search"></i>搜索订单：</div>
                <div class="condition">
                <input type="text" name="order_sn" placeholder="订单号" class="input-text f-12 mr-10 input_text" >
                <input type="text" name="shop_order_sn" placeholder="网店订单号" class="input-text f-12 mr-10 input_text" >
                <input type="text" name="pay_sn" placeholder="支付单号" class="input-text f-12 mr-10 input_text" >
                <input type="text" name="express_sn" placeholder="运单号" class="input-text f-12 mr-10 input_text" >
                <input type="text" name="user_name" placeholder="客户姓名" class="input-text f-12 mr-10 input_text" >
                <input type="text" name="user_tel" placeholder="客户电话号码" class="input-text f-12 mr-10 input_text" >
               <input type="text" name="goods_name" placeholder="商品名称" class="input-text f-12 mr-10 input_text" >
               <input type="text" name="stocks_sn" placeholder="商品货号" class="input-text f-12 mr-10 input_text" >
               <input type="text" name="store_name" placeholder="渠道名称" class="input-text f-12 mr-10 input_text" >
                <select name="order_type" class="f-12  mr-10 selecte pd-5 m_w_120 ">
                  <option value="">订单状态</option>
                  <option value="10">未付款</option>
                  <option value="20">已付款</option>
                  <option value="31">部分发货</option>
                  <option value="30">已发货</option>
                  <option value="40">已收货</option>
                  <option value="0">已取消</option>
                </select>
             下单时间：
                <input type="text" name="stime"  onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" class="input-text f-12 ml-5 mr-5 input_text datainp wicon" >至
                <input type="text" name="etime"  onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" class="input-text f-12 ml-5 mr-5 input_text datainp wicon" >

              <input type="button" id="to_search_orders" class="btn btn-warning  radius" value="搜索">
              </div>
            </div>
            </form>
            <div class="flexigrid_box">
                
                <table class="ncsc-default-table order mt-30">
                    <thead>
                    <tr>
                        <th class="w10">
                            <div class="sign all"><i class="ico-check"></i></div>
                        </th>
                        <th colspan="2">店铺商品</th>
                        <th class="">店铺单价</th>
                        <th class="">店铺金额</th>
                        <th>渠道</th>
                        <th colspan="2">商品</th>
                        <th class="">单价</th>
                        <th class="">订单金额</th>
                        <th class="">备注</th>
                        <th class="">交易状态</th>
                        <th class="">交易操作</th>
                    </tr>
                    <!-- <tr>
                        <th colspan="10"  class="sep-row2">
                            <div class="tDiv2"><div class="fbutton"><div class="add" title="新增数据"><span><i class="fa fa-plus"></i>新增数据</span></div></div></div>
                        </th>
                    </tr> -->
                    </thead>
                    <tbody>
                        <tr><td colspan="100" class="no-data"><i class="fa fa-exclamation-circle"></i>数据加载中...</td></tr>
                    </tbody>
                </table>
                <div class="flexigrid" >
                    <div class="pDiv">
                        <div class="pDiv2">
                            <div class="pGroup-left">每页最多显示
                                <select class="select prp" name="rp">
                                    <option value="2"  >2&nbsp;&nbsp;</option>
                                    <option value="10" >10&nbsp;&nbsp;</option>
                                    <option value="15" selected="selected">15&nbsp;&nbsp;</option>
                                    <option value="20" >20&nbsp;&nbsp;</option>
                                    <option value="40" >40&nbsp;&nbsp;</option>
                                </select>条
                            </div>
                            <div class="pGroup-middle">
                                <div class="pFirst pButton" title="最前页">
                                    <i class="fa fa-fast-backward"></i>
                                </div>
                                <div class="pPrev pButton" title="前一页">
                                    <i class="fa fa-backward"></i>
                                </div>
                                <span class="pcontrol">
                                    <input type="text" size="4" class="pcur" value="1" title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页
                                </span>
                                <div class="pNext pButton" title="下一页"><i class="fa fa-forward"></i></div>
                                <div class="pLast pButton" title="最后页"><i class="fa fa-fast-forward"></i></div>
                            </div>
                            <div class="pPageStat"></div>
                            <div class="pGroup-right"><span class="pPageStat1">共<span class="total">?</span>条记录，当前页：
                                <span class="pfrom">0</span>-<span class="pto">0</span>条</span>
                            </div>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
	
	
</div>

<script type="text/javascript" src="http://[::1]/yunjuke/plugins/jQuery_md5/jQuery.md5.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/jQuery_md5/jQuery.md5.add.js"></script>
<script type="text/javascript">
    //排队
    var int ='';
    $("#sync").click(function(){
        var stime = $('input[name="start_time"]').val();
        var etime = $('input[name="end_time"]').val();
        stime_int = (Date.parse(new Date(stime)))/1000;
        etime_int = (Date.parse(new Date(etime)))/1000;
        if(etime_int-stime_int>7200){
        	if(etime_int-stime_int>3600*24*3){
        		layer.msg('同步订单时间段最多3天');return false;
        	}
        	$.ajax({
                type:'get',
                dataType:'json',
                url: 'http://[::1]/yunjuke/pay.php/store/queue?task_type=1',
                success:function(data){     //成功进入排队队列
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if(data.state) {
                        if(data.queue){     //操作队列有空闲，直接执行任务
                            sync_order(false);    //执行操作
                            return false;
                        }
                        var place = get_queue_place(data.task);
                        if (place>0){
                            layer.confirm('同步时间段大于两小时需要等候排队，当前正在排队人数：<span id="place">'+place+'</span>', {
                                title:'当前操作人数较多，需要排队：',
                                btn: ['取消排队'], //按钮
                                cancel: function(index){      //关闭询问框
                                    quite_queue(data.task);
                                    layer.msg('取消排队');
                                }
                            }, function(){      //取消排队
                                quite_queue(data.task);
                                layer.msg('取消排队');
                            });
                            int = setInterval(function () {    //轮询
                                place = get_queue_place(data.task);
                                if(place==0){
                                    queue_action(data.task)         //执行操作
                                }
                                $('#place').html(place);
                            },1000);
                        } else {
                            queue_action(data.task);
                        }
                        window.onbeforeunload=function() {  //关闭，刷新浏览器事件，删除排队
                            quite_queue(data.task);
                        };
                    } else {
                        layer.msg(data.msg);
                    }
                }
            });
        }else{
        	sync_order(false);    //执行操作
            return false;
        }
    })
    //成功进入操作队列
    function queue_action(id)
    {
        int = clearInterval(int);
        var i = 10;
        layer.confirm('是否开始操作？取消倒计时:<span id="time">10</span>', {
            title:'请确认：',
            btn: ['开始执行'], //按钮
            cancel: function(index){      //关闭询问框
                quite_queue(id);
                layer.msg('取消操作');
                return false;
            }
        },function(){       //确定操作
            int = clearInterval(int);   //结束轮询
            sync_order(id);     //执行操作
        });
        int = setInterval(function (){    //轮询，倒计时
            i--;
            if(i==0){
                quite_queue(id);
                layer.msg('取消操作');
                return false;
            }
            $('#time').html(i);
        },1000);
    }
    //得到位置
    function get_queue_place(id)
    {
        var place = 1;
        $.ajax({
            async: false,
            type:'get',
            dataType:'json',
            url: 'http://[::1]/yunjuke/pay.php/store/get_queue_place?task_id='+id,
            success:function(data) {      //得到队列中的排队人数place
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else if(data.state){
                    place = data.place;
                }
            }
        })
        return place;
    }
    //当用户退出排队队列或者关闭浏览器时的操作
    function quite_queue(id)
    {
        layer.closeAll();
        $.ajax({
            type:'get',
            dataType:'json',
            url: 'http://[::1]/yunjuke/pay.php/store/quit_queue?task_id='+id,
            success:function(quit){
                int = clearInterval(int);   //结束轮询
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }
                return false;
            }
        })
    }




var userId = "52";
var isOnce = true;
var tabNow = 0;
//获取时间
function getTime(totime){
    if(totime == undefined){
        var today = new Date();
    }else{
        var now = new Date().getTime();
        var today = new Date(now + totime*1000);
    }
    
    var year = today.getFullYear();
    var month = today.getMonth()+1;
    var day = today.getDate();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var second = today.getSeconds();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (day >= 0 && day <= 9) {
        day = "0" + day;
    }
    //return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + second;
    return year + '-' + month + '-' + day + ' ' + '23' + ':' + '59' + ':' + '59';
}
//获取时间
function getTime1(totime){
    if(totime == undefined){
        var today = new Date();
    }else{
        var now = new Date(totime).getTime();
        var today = new Date(now-172799*1000);
    }
    
    var year = today.getFullYear();
    var month = today.getMonth()+1;
    var day = today.getDate();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var second = today.getSeconds();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (day >= 0 && day <= 9) {
        day = "0" + day;
    }
    //return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + second;
    return year + '-' + month + '-' + day + ' ' + '00' + ':' + '00' + ':' + '00';
}
$("#col_time_1").val(getTime1(getTime()));
$("#col_time_2").val(getTime());
$(function(){
    /* $(document).ready(function () {
            window.searchSelAll = $('.search-box-sel-all').SumoSelect({ 
                csvDispCount: 3,
                selectAll:true,
                search: true,
                searchText:'请选择.',
                okCancelInMulti:true ,
                floatWidth: 50,
            });
        }); */
    if(isOnce){
    	getOrder_lists(1);
    }
    $('.prp').change(function(){          //页面大小
    	getOrder_lists(1);
    });
    $('.pcur').bind('keydown', function (e) {    //输入框输入分页
        var key = e.which;
        if(key == 13){
             var curpage = $('.pcur').val();
             if(curpage > parseInt($('.ptotal').html())){
                  curpage = parseInt($('.ptotal').html());
             }
             getOrder_lists(curpage);
        }
    });
    $('.pPrev').click(function(){          //前一页
        if(parseInt($('.pcur').val()) == 1){
            layer.tips('已经是第一页啦', '.pPrev', {
                tips: [1, '#3595CC'],
                time: 3000
            });
            return false;
        }
        var curpage = parseInt($('.pcur').val())-1 > 0 ? parseInt($('.pcur').val())-1 : 1;
        getOrder_lists(curpage);
    });
    $('.pNext').click(function(){           //后一页
        if((parseInt($('.pcur').val()) == parseInt($('.ptotal').html())) || (parseInt($('.ptotal').html()) == 0)){
            layer.tips('已经是最后一页啦', '.pNext', {
                tips: [1, '#3595CC'],
                time: 3000
            });
            return false;
        }
        var curpage = parseInt($('.pcur').val())+1 > 0 ? parseInt($('.pcur').val())+1 : 1;
        getOrder_lists(curpage);
    });
    $('.pFirst').click(function(){          //第一页
        if(parseInt($('.pcur').val()) == 1){
         layer.tips('已经是第一页啦', '.pPrev', {
                tips: [1, '#3595CC'],
                time: 3000
            });
        return false;
        }
        var curpage = 1;
        getOrder_lists(curpage);
    });
    $('.pLast').click(function(){          //最后一页
        if((parseInt($('.pcur').val()) == parseInt($('.ptotal').html())) ||( parseInt($('.ptotal').html()) == 0)){
            layer.tips('已经是最后一页啦', '.pNext', {
                tips: [1, '#3595CC'],
                time: 3000
            });
            return false;
        } 
        var curpage = parseInt($('.ptotal').html());
        getOrder_lists(curpage);
    });
});

function getOrder_lists(page){
    var search = '';
//    if(!isOnce){
////    	search = '?'+$("#formSearch").serialize();
////        console.log(search);
//    }
    $.ajax({
        url:'order_sync_list'+search,
        data:$("#formSearch").serialize()+'&rp='+$('.select.prp').val()+'&curpage='+page+'&ckeck='+tabNow,
        type:'post',
        dataType:'json',
        beforeSend:function(){
            var index = layer.load(0, {shade: false},{time:0});
        },
        success: function(data){
            if(data.state == '403'){
                layer.msg(data.msg);
                window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
            }else if(data.state == '401'){
                layer.msg(data.msg);
            }else if(data.state){
                //组装订单列表
                isOnce = false;
                $('.pDiv .pcur').val(data.page_info.page);
                $('.pDiv .ptotal').html(data.page_info.page_count);
                $('.pDiv .total').html(data.page_info.total_num);
                $('.pDiv .pfrom').html(data.page_info.start);
                $('.pDiv .pto').html(data.page_info.to);
                var blanks = '<tr><td colspan="13" class="sep-row"></td></tr>';
                var contents = '';
                var type_way='';
                var order_url = {'tb':'https://trade.taobao.com/trade/detail/tradeSnap.htm?tradeID=','jd':'https://order.shop.jd.com/order/order_orderInfoPage.action?orderId='};
                $.each(data.goods_info,function(n,order){
                	type_way='1';
                	detail_order = JSON.stringify({'order_sn':order.order_sn});
                    contents += blanks+'<tr style="border-bottom: hidden"><th colspan="13"><span class="ml10 w-200">订单编号：'+data_null(order.order_sn)+'</span>'
                    +'<span class="w-200">下单时间：<em class="goods-time">'+order.created+'</em></span>'
                    +'<span class="w-200">订单来源：<em class="goods-time">'+data_null(order.from)+'</em></span>'
                    +'<span class="w-200">支付单号：<em class="goods-time">'+data_null(order.pay_sn)+'</em></span>'
                    +'<span class="fr mr10">';
                    mark_o = {'order_sn':order.order_sn,'order_status':order.order_status,'seller_flag':order.seller_flag,'seller_note':$.trim(order.buyer_message)};
                    fg_order_info = JSON.stringify(mark_o);
                    if(order.out_order_sn){
                    	contents += '<a href="javascript:sync_a_order({out_order_sn:\''+order.out_order_sn+'\'})" class="btn btn-primary radius size-MINI" title="同步订单">同步</a>'
                        +'\n<a href="javascript:fg_remark({order_sn:\''+order.order_sn+'\',out_order_sn:\''+order.out_order_sn+'\',order_status:\''+order.order_status+'\',seller_flag:\''+order.seller_flag+'\',seller_note:\''+order.buyer_message+'\'})" class="btn btn-secondary radius size-MINI" target="_blank" title="备注订单">备注</a>'
                        +'\n<a href="javascript:hangIt('+order.out_order_sn+')" class="btn btn-danger size-MINI radius" title="标记挂起">标记挂起</a>';
                    }else{
                    	/*if(order.order_status==20){
                    		contents +='\n<a href=javascript:fg_refund('+fg_order_info+') class="btn btn-danger size-MINI radius" target="_blank" title="订单退款">退款</a>';
                    	}
                    	if(order.order_status==30){
                    		contents +='\n<a href=javascript:fg_return('+fg_order_info+') class="btn btn-danger size-MINI radius" target="_blank" title="订单退货">退货</a>';
                    	}*/
                    	contents +='\n<a href=javascript:fg_remark('+fg_order_info+') class="btn btn-primary radius size-MINI" target="_blank" title="备注订单">备注</a>';
                    }
                    if(order.order_status==10){
                    	contents += '\n<a href=javascript:cancel_order('+detail_order+') class="btn btn-danger radius size-MINI" title="取消订单">取消订单</a>';
                    }
                    contents +='</span></th></tr>';
                    contents +='<tr style="border-top: hidden"><th colspan="13"><span style="padding-left: 10px;" class="w-200">外部单号：<em><a href="" target="_blank" class="orde">'+data_null(order.out_order_sn)+'</a><span class="red" style="margin: -5px 0 0 5px;">('+data_null(order.uec_order_status)+')</span></em></span><span class="w-200">产生时间：<em class="goods-time">'+order.uec_order_time+'</em></span><span class="w-200">订单来源：<em>'+data_null(order.bind_ecstore_name)+'</em></span></th></tr>';
                    if((order.son).length != 0){
                    	type_way = '2';
                        $.each(order.son,function(k,goods){
//                            goods.goods_type = (goods.goods_type == 2) ? '<span class="sale-type">团购</span>' : ((goods.goods_type == 3) ? '<span class="sale-type">限时折扣</span>' : ((goods.goods_type == 4) ? '<span class="sale-type">组合套装</span>' : ((goods.goods_type == 5) ? '<span class="sale-type">赠品</span>' : '')));
                            var snapshot_url = '';
                            if(!!order.snapshot_url){
                                snapshot_url = '<a target="_blank" class="blue ml5" href="'+order.snapshot_url+'">[交易快照]</a>';
                            }
                            var url_arr = new Array();
                            url_arr[42] = !!goods.uec_num_iid ? 'https://item.taobao.com/item.htm?id='+goods.uec_num_iid : 'javascript:void(0)';
                            url_arr[41] = !!goods.uec_skuiid_iid ? 'https://item.jd.com/'+goods.uec_skuiid_iid+'.html' : 'javascript:void(0)';
                            setStore = '';
                            order_ajax_data = {'order_sn':order.order_sn};
                            order_ajax_data = JSON.stringify(order_ajax_data);
                            if(order.order_status == 10&&!(order.store_id>0)){
                            	setStore = '<span class="store-select radius" style="background:#f93" data-rec-id="'+goods.rec_id+'" data-ea-id="'+goods.goods_ea_id+'" data-weight="" data-num="'+goods.goods_num+'" data-title="'+data_null(goods.uec_goods_name,goods.goods_name)+'" onclick=modify_depot('+order_ajax_data+',this)>选择渠道</span>'
                            	+'<span class=" express radius mt-5 " style="display:none;background:#f93" data-express="" onclick="modify_express(this)"></span>';
                            }else if(order.order_status >= 20){
                            	if(order.short_store_name){
                            		setStore = '<span class="store-select radius mt-5" style="background:#f93" data-ea-id="'+goods.goods_ea_id+'" data-weight="" data-num="'+goods.goods_num+'" data-title="'+goods.goods_name+'">'+data_null(order.short_store_name)+'</span>';
                                	
                            	}
                            	if(data_null(order.e_name,order.create_e_name)){
                            		setStore += '<span class="express radius mt-5" style="background:#f93" data-express="" >'+data_null(order.e_name,order.create_e_name)+'</span>';
                            	}
                            	
                            }
                            bind_ecstore = '<span class="ml-5 radius" style="background:#ccc">'+data_null(order.bind_ecstore_name,'冠君运动专营店')+'</span>';
                            if(goods.uec_express){
                            	bind_ecstore +='<span class="ml-5 radius" style="background:#ccc">'+data_null(goods.uec_express)+'</span>';
                            }
                            
                            var refund_state_str = '';
                        	/* if(goods.refund_state==null || goods.refund_state=='' || goods.refund_state==4){
                        		refund_state_str =   '<span class="new-store-select" data-id="1/'+order+'/'+goods+'" style="background:#f93;margin-left: 25px;color:#FFF;">退款</span>'+
                                                     '<span class="new-store-select" data-id="2/'+order+'/'+goods+'"style="background:#f93;margin-left: 10px;color:#FFF;">退货</span>';
                                
                        	} */
                            var a=order.order_sn,
                 			c=data_num(goods.goods_pay_price),
                 			d=goods.goods_name,
                 			e=goods.goods_id,
                 			f=goods.goods_num,
                 			t= order.created;
                 		   t=t.replace(' ','*');
                 		   d=d.replace(' ','*');
                 		  refund_o = {'a':order.order_sn,'c':c,'d':d,'e':e,'f':f,'t':t,'s':data_null(goods.stock_code),'size':data_null(goods.goods_size_remark,goods.goods_size),
                 				  'color':data_null(goods.goods_color_remark,goods.goods_color),'tel':order.receive_mobile,'r':goods.rec_id,'refund_id':data_null(goods.refund_id),
                 				  'refund_seller_state':goods.seller_state,'refund_refund_state':goods.refund_state,'reason_id':goods.reason_id,'refund_amount_apply':goods.refund_amount_apply,
                 				  'refund_amount':goods.refund_amount,'refund_num':goods.refund_num,'pic_info':goods.pic_info,'refund_message':goods.refund_message,'reason_info':goods.reason_info,
                 				  'refund_address':data_null(goods.refund_address).replace(/ /g,"！"),'refund_tel':goods.refund_tel,'buyer_name':data_null(goods.refund_buyer_name).replace(/ /g,"！"),
                 				  'express_id':data_null(goods.express_id),'invoice_no':data_null(goods.invoice_no),'add_time':goods.add_time,'seller_time':goods.seller_time};
                 		  
                 		  refund_o = JSON.stringify(refund_o);
                 		 //console.log(refund_o);
                         	if(goods.is_refund!=1){
                         		is_refund_str = '';
                                if(order.order_status>=20&&order.order_status<50&&!goods.refund_state){
                                	refund_state_str = '<span class="tear" data_time='+t+' onclick=new_store_select('+refund_o+',this) style="background:#f30 !important;color:#FFF;white-space:pre;">退</span>';
                                }else if(goods.refund_state==4){
                                	refund_state_str = '<span class="tear" data_time='+t+' title="已取消退货/款" onclick=new_store_select('+refund_o+',this) style="background:#aaa !important;color:#FFF;white-space:pre;">退</span>';	
                                	
                                }else if(goods.refund_state>=1&&goods.seller_state==1){
                                	refund_state_str = '<span class="tear" data_time='+t+' title="已申请退货/款" onclick=new_store_select('+refund_o+',this) style="background:#f30 !important;color:#FFF;white-space:pre;">退</span>';	
                                	
                                }else if(goods.refund_state>=1&&goods.seller_state==3){
                                	refund_state_str = '<span class="tear" data_time='+t+' title="拒绝退货/款" onclick=new_store_select('+refund_o+',this) style="background:#aaa !important;color:#FFF;white-space:pre;">退</span>';	
                                	
                                }
                        	}
                        	if(goods.is_refund==1){
                        	   refund_state_str = '<span class="tear" data_time='+t+' title="已退货/款" onclick=new_store_select('+refund_o+',this) style="background:#aaa !important;color:#FFF;white-space:pre;">退</span>';	
                        	}
                        	
                            chai_str = '';
                            if(order.order_status==10&&order.goods_num>=2){
                            	chai_data = {'order_sn':order.order_sn,'rec_id':goods.rec_id,'goods_num':goods.goods_num,'order_num':order.goods_num};
                            	chai_data = JSON.stringify(chai_data);
                            	chai_str = '<span class="tear" onclick=chai_order('+chai_data+')>拆</span>';
                            }
                            if(k==0){
                            	uec_order_price = parseFloat(parseFloat(data_num(order.uec_goods_price))+parseFloat(data_num(order.uec_carriage_price))).toFixed(2);
                                contents += '<tr class="order_'+order.order_sn+' rec_'+goods.rec_id+'" data-rec_id="'+goods.rec_id+'" data-order_sn="'+order.order_sn+'"><td class="bdl" style="vertical-align:middle" rowspan="'+(order.son).length+'" ><a class="sign"><i class="ico-check"></i></a></td>'
                                +'<td class="w70"><div class="ncsc-goods-thumb"><a href="" target="_blank"><img src="'+goods.uec_goods_image+'" data-geo=\'<img src="'+goods.uec_goods_image+'" width=300px>\'></a></div></td>'
                                +'<td class="tl" style="width:18%">' +
                                '<dl class="goods-name ml-20" style="float: left;"><dt>'+chai_str+'<a target="_blank" class="good-name" href="'+url_arr[order.order_from]+'" title="'+data_null(goods.uec_goods_name,goods.goods_name)+'">'+data_null(goods.uec_goods_name,goods.goods_name)+'</a></dt>'+
                                '<dd class="text-l">货号：<span class="info-left ">'+data_null(goods.stock_code)+'</span>, 尺码：<span class="">'+data_null(goods.uec_goods_size,data_null(goods.goods_size_remark,goods.goods_size))+'</span></dd>'+
                                '<dd class="text-l">颜色：<span class="info-left ">'+data_null(goods.uec_goods_color,data_null(goods.goods_color_remark,goods.goods_color))+'</span>, 数量：<span class="">'+data_num(goods.goods_num)+
                                '</span></dd></dl></td>'+
                                '<td style="padding-top:53px;padding-right: 20px;"><p>'+data_num(goods.uec_stock_price)+'</p></td>'+
                                        '<td rowspan="'+(order.son).length+'" style="vertical-align:middle;text-align: left;padding-left: 10px;" class="bdl"><p class="out_order_price">'+
                                    '<p>'+uec_order_price+'</p><p> 运费: '+data_num(order.uec_carriage_price)+'</p></p><div class="buyer">'+order.receive_name+'<div class="buyer-info"><em></em><div class="con">'
                                    +'<h3><i></i><span>联系信息</span></h3><dl><dt>姓名：</dt><dd>'+order.receive_name+'</dd></dl><dl><dt>电话：</dt><dd>'+order.receive_mobile+'</dd></dl><dl><dt>地址：</dt><dd>'+order.receive_address+'</dd></dl></div></div></div><a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=%E5%AE%A2%E6%9C%8D1&siteid=cntaobao&status=1&charset=utf-8"><img border="0" src="http://amos.alicdn.com/realonline.aw?v=2&uid=%E5%AE%A2%E6%9C%8D1&site=cntaobao&s=1&charset=utf-8" alt="联系我们" /></a></td>'
                                    +'</td>'+
                                '<td class="setdepot bdl bdr" style="padding: 10px 5px;vertical-align:middle" rowspan="'+(order.son).length+'"><p class="">'+setStore+'</p></td>'+
                                    '<td class="w70"><div class="ncsc-goods-thumb goodsimage"><a href="" target="_blank"><img src="'+goods.goods_image+'" data-geo=\'<img src="'+goods.goods_image+'" width=300px>\'></a></div></td>'+
                                    '<td class="tl" style="width:18%">' +
                                    '<dl class="goods-name ml-20" style="float: left;"><dt>'+refund_state_str+'<a class="goodsname good-name" herf="javascript:;" title="'+data_null(goods.goods_name)+'">'+data_null(goods.goods_name)+'</a></dt>'+
                                    '<dd class="text-l">货号：<span class="info-left goodsid">'+data_null(goods.stock_code)+'</span>, 尺码：<span class="goodssize">'+data_null(goods.goods_size_remark,goods.goods_size)+'</span></dd>'+
                                    '<dd class="text-l">颜色：<span class="info-left goodscolor">'+data_null(goods.goods_color_remark,goods.goods_color)+'</span>, 数量：<span class="goodsnum">'+data_num(goods.goods_num)+
                                    '</span></dd></dl></td>'+
                                    '<td style="padding:53px 20px 0 0"><p class="goods_pay_price">'+data_num(goods.goods_pay_price)+'</p></td>'
//                                +'<td class="bdl" rowspan="'+(order.son).length+'" style="vertical-align:middle;"><div class="buyer">'+order.receive_name+'<div class=""><a href="" class=""><i class="fa fa-send-o"></i>给我留言</a></div><div class="buyer-info"><em></em><div class="con">'
                                +'<td class="bdl" rowspan="'+(order.son).length+'" style="vertical-align:middle;">'+
                                '<p class="in_order_price"><p class="ncsc-order-amount">'+order.order_price+'</p><p class="goods-freight"> 运费: '+data_null(order.create_carriage)+'</p></p>';
                                var setBtn = '';
                                if(order.order_status == 10){
                                    order.order_status_ = '<span style="color:#f30">未付款</span>';
                                    if(!(order.store_id>0)){
                                    	setBtn = '<p><a href="javascript:;" class="btn btn-primary radius creat-order disabled" onclick=create_order('+fg_order_info+',this)><i class="fa fa-share-square-o"></i>生成订单</a></p>';
                                    }
                                }else if(order.order_status == 0){
                                    order.order_status_ = '<span style="color:#f30">已取消</span>';
                                }else if(order.order_status == 20){
                                	//console.log(order.out_order_sn);
                                    order.order_status_ = '<span style="color:#99CC00">已付款</span>';
                                }else if(order.order_status == 22){
                                	//console.log(order.out_order_sn);
                                    order.order_status_ = '<span style="color:#99CC00">已退货</span>';
                                }else if(order.order_status == 31){
                                    order.order_status_ = '<span style="color:#00cc40">部分发货</span>';
                                }else if(order.order_status == 30){
                                    order.order_status_ = '<span style="color:#00cc40">已发货</span>';
                                }else if(order.order_status == 40){
                                    order.order_status_ = '<span style="color:#00cc40">已收货</span>';
                                }else if(order.order_status == 50){
                                    order.order_status_ = '<span style="color:#00cc40">已完成</span>';
                                }else{
                                    order.order_status_ = '<span style="color:#F00">未知</span>';
                                }
                                
                                contents += '</td>'
                                +'<td style="text-align:left; padding-left:5px;padding-right:5px;vertical-align: middle" class="bdl bdr" rowspan="'+(order.son).length+'"><p class="remark" title="'+data_null(order.buyer_memo)+'">买家：'+data_null(order.buyer_memo)+'</p><p class="remark" title="'+data_null(order.seller_note)+'">卖家：'+data_null(order.seller_note)+'</p></td>'
                                +'<td class="" rowspan="'+(order.son).length+'" style="vertical-align:middle;"><p>'+order.order_status_+'</p><p><a href=javascript:fg_detail('+detail_order+')>订单详情</a></p>'+
                                '<p></p></td>'
                                +'<td class="bdr" rowspan="'+(order.son).length+'" style="vertical-align:middle;"><p>'+setBtn+'</p></td></tr>';
                            }else{
                                contents += '<tr  class="order_'+order.order_sn+' rec_'+goods.rec_id+'" data-rec_id="'+goods.rec_id+'" data-order_sn="'+order.order_sn+'"><td class="w70">'
                                +'<div class="ncsc-goods-thumb"><a href="" target="_blank"><img src="'+goods.uec_goods_image+'" data-geo=\'<img src="'+goods.uec_goods_image+'" width=300px>\'></a></div></td>'
                                +'<td class="tl"><dl class="goods-name ml-20"style="float: left;"><dt>'+chai_str+'<a target="_blank" class="good-name" href="'+url_arr[order.order_from]+'" title="'+data_null(goods.uec_goods_name,goods.goods_name)+'">'+data_null(goods.uec_goods_name,goods.goods_name)+'</a></dt>'
                                +'<dd class="text-l">货号：<span class="info-left ">'+data_null(goods.stock_code)+'</span>，尺码：<span class="">'+data_null(goods.uec_goods_size,data_null(goods.goods_size_remark,goods.goods_size))+'</span></dd>'+
                                '<dd class="text-l">颜色：<span class="info-left ">'+data_null(goods.uec_goods_color,data_null(goods.goods_color_remark,goods.goods_color))+'</span>, 数量：<span class="">'+data_num(goods.goods_num)+
                                '</span></dd>'+
                                '</dl></td>'+
                                '<td style="padding:53px 20px 0 0;"><p>'+data_num(goods.uec_stock_price)+'</p></td>'+
                                    '<td class="w70"><div class="ncsc-goods-thumb goodsimage"><a href="" target="_blank"><img src="'+goods.goods_image+'" data-geo=\'<img src="'+goods.goods_image+'" width=300px>\'></a></div></td>'+
                                '<td class="tl"><dl class="goods-name ml-20"style="float: left;"><dt>'+refund_state_str+'<a class="goodsname good-name" herf="javascript:;" title="'+data_null(goods.goods_name)+'">'+data_null(goods.goods_name)+'</a></dt>'+
                                '<dd class="text-l">货号：<span class="info-left goodsid">'+data_null(goods.stock_code)+'</span>，尺码：<span class="goodssize">'+data_null(goods.goods_size_remark,goods.goods_size)+'</span></dd>'+
                                '<dd class="text-l">颜色：<span class="info-left goodscolor">'+data_null(goods.goods_color_remark,goods.goods_color)+'</span>, 数量：<span class="goodsnum">'+data_num(goods.goods_num)+
                                '</span></dd></dl></td>'+
                                '<td style="vertical-align:middle"><p class="goods_pay_price">'+goods.goods_pay_price+'</p></td></tr>';
                            }
                        });
                    }
                });
                $(".ncsc-default-table.order tbody").html(contents);
                
            }else{
                $('.pDiv .pcur').val(1);
                $('.pDiv .ptotal').html(1);
                $('.pDiv .total').html(0);
                $('.pDiv .pfrom').html(0);
                $('.pDiv .pto').html(0);
                var contents = '<tr><td colspan="100" class="no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</td></tr>';
                $(".ncsc-default-table.order tbody").html(contents);
            }
        },
        complete: function(XHR, TS){
        	    $('img').error(function(){
                  $(this).attr('src', "http://[::1]/yunjuke/data/images/default_goods_image.jpg");
                  $(this).attr('data-geo', "<img src=http://[::1]/yunjuke/data/images/default_goods_image.jpg width=300px>");
                });
                layer.closeAll('loading'); //关闭加载层
        }
    });
}
//拆单
function chai_order(chai_data){
	content ='<form name="order_chai" id="order_chai"><div class="pd-10">'+
	'<span class="text-c ml-10">拆单数量：</span>'+
	'<input type="number" name="order_chai_num" id="order_chai_num" class=" ml-10" style="width:80px !important;height:28px !important;" value="1">'+
	'<span class="err"></span></div></form>';
	if(chai_data.order_num==chai_data.goods_num){
		max_num = parseInt(chai_data.goods_num)-1;
	}else{
		max_num = chai_data.goods_num;
	}
	layer.open({
	    type: 1,
	    skin: 'layui-layer-rim', //加上边框
	    title: '<b>拆单</b>',
	    area: ['380px', '160px'], //宽高
	    content: content,
	    btn: ['确定','取消'], //按钮
	    yes:function(index){
	    	 $('#order_chai').validate({
                 errorPlacement: function (error, element) {
                     var error_td = element.nextAll('span.err');
                     error_td.append(error);
                 },
                 rules: {
                	 order_chai_num: {
                		 required: true,
                		 min:1,
                		 max:max_num
                		 },
                 },
                 messages: {
                	 order_chai_num: {
                		 required: '<i class="fa fa-exclamation-circle"></i> 请填写要拆除的商品数量!',
                		 min:'<i class="fa fa-exclamation-circle"></i> 数量最小为1!',
                		 max:'<i class="fa fa-exclamation-circle"></i> 数量不能超过'+max_num+'!'
                		 },
                 }
             });
             if ($('#order_chai').valid()) {
            	 var order_chai_num = $('#order_chai_num').val();
            	 $.ajax({
     				type: "POST",
     		        url: "order_chai",
     		        data: {'data':chai_data,'order_chai_num':order_chai_num},
     		        dataType: "json",
     		        success: function(data){
     		        	if(data.state){
     		        		layer.closeAll();
     		        		layer.msg(data.msg);
     		        		getOrder_lists($('.pcur').val());
     	        	    }else{
     	        	    	layer.msg(data.msg);
     	        	    }
     		        }
     			});
             }
	    },no:function(){
	    	
	    }
	})
}
//申请售后
function new_store_select(data_fun,obj){
	var timess = $(obj).attr("data_time");
    timess = timess.replace('*',' ');
      d=(data_fun.d).replace('*',' ');
   var goods_pays_price = parseFloat(data_num((data_fun.c)*(data_fun.f))).toFixed(2); 
   var refundreason = "<option value='95' >\u6548\u679c\u4e0d\u597d\u4e0d\u559c\u6b22<\/option><option value='96' >\u5546\u54c1\u7834\u635f\u3001\u6709\u6c61\u6e0d<\/option><option value='97' >\u4fdd\u8d28\u671f\u4e0d\u7b26<\/option><option value='98' >\u8ba4\u4e3a\u662f\u5047\u8d27<\/option><option value='99' >\u4e0d\u80fd\u6309\u65f6\u53d1\u8d27<\/option>";
  var content='<form  method="post" enctype="multipart/form-data" id="form_email_guide"  name="settingForm">'+
  ' <input type="hidden" id="goods_name" name="goods_name" value="'+data_fun.d+'"/>'+
  ' <input type="hidden" id="goods_num" name="goods_num" value="'+data_fun.f+'"/>'+
  ' <input type="hidden" id="goods_id" name="goods_id" value="'+data_fun.e+'"/>'+
  ' <input type="hidden" id="rec_id" name="rec_id" value="'+data_fun.r+'"/>'+
  ' <input type="hidden" id="order_sn" name="order_sn" value="'+data_fun.a+'"/>'+
  ' <input type="hidden" id="seller_state" name="seller_state" value="'+data_null(data_fun.refund_seller_state)+'"/>'+
  ' <input type="hidden" id="refund_state" name="refund_state" value="'+data_null(data_fun.refund_refund_state)+'"/>'+
  ' <input type="hidden" id="refund_id" name="refund_id" value="'+data_fun.refund_id+'"/>'+
  '<div class="cl">'+
		'<label class="form-label col-xs-3">商品名称：</label>'+
		'<div class="formControls col-xs-8">'+data_fun.d+'<span>  '+data_fun.s+'  '+data_fun.size+'  '+data_fun.color+'  '+data_fun.f+'  '+'</span>'+
		'</div>'+
	'</div>'+
	'<div class="cl">'+
		'<label class="form-label col-xs-3">订单金额：</label>'+
		'<div class="formControls col-xs-8">￥ '+goods_pays_price+
		'</div>'+
	'</div>'+
	'<div class="cl">'+
		'<label class="form-label col-xs-3">订单编号：</label>'+
		'<div class="formControls col-xs-8">'+data_fun.a+
		'</div>'+
	'</div>'+
	'<div class="cl">'+
		'<label class="form-label col-xs-3">下单时间：</label>'+
		'<div class="formControls col-xs-8">'+timess+
		'</div>'+
	'</div>';
		refund_status = '';
		if(data_fun.refund_id){
			reason_id = data_fun.reason_id;
			reason_info = data_fun.reason_info;
			refund_num = data_null(data_fun.refund_num);
			refund_amount_apply = data_null(data_fun.refund_amount_apply);
			refund_amount = data_null(data_fun.refund_amount);
			re = new RegExp("！","g");
			buyer_name = data_null(data_fun.buyer_name).replace(re," ");
			refund_tel = data_null(data_fun.refund_tel);
			
			refund_address = data_null(data_fun.refund_address).replace(re," ");
			refund_message = data_null(data_fun.refund_message);
			pic_info = data_null(data_fun.pic_info);
			//'<div class="uploadimg" id="uploadimg2" imgname="2017091116193459b64716c3c21_apply.JPG"><img src=""><i class="fa fa-times remove" aria-hidden="true"></i></div>';
			if(data_fun.refund_refund_state==4){
				layer_btn = ['重新申请','关闭'];
				refund_status_str = '已取消';
			}else if(data_fun.refund_seller_state==1&&data_fun.refund_refund_state>=1){
				refund_status_str = '待处理';
				layer_btn = ['更改','取消','关闭'];
			}else if(data_fun.refund_seller_state==2&&data_fun.refund_refund_state>=1){
				refund_status_str = '已同意';
				layer_btn = '';
			}else if(data_fun.refund_seller_state==3&&data_fun.refund_refund_state>=1){
				refund_status_str = '已拒绝';
				layer_btn = ['更改','取消','关闭'];
			}
			refund_status = '<div class="cl">'+
			'<label class="form-label col-xs-3">退货/款状态：</label>'+
			'<div class="formControls col-xs-8"><span class="red">'+refund_status_str+
			'</span></div>'+
		'</div>';
		}else{
			reason_id = '';
			reason_info = '-请选择-';
			refund_num = '';
			refund_amount_apply = '';
			refund_amount = '';
			buyer_name = '';
			refund_tel = data_null(data_fun.tel);
			refund_address = '';
			refund_message = '';
			pic_info = '';
			layer_btn = ['确定','关闭'];
		}
		content +=refund_status+'<div class="cl">'+
			'<label class="form-label col-xs-3">退货/款原因：</label>'+
			'<div class="formControls col-xs-8">'+
				'<select  name="reason_id" id="reason_id">'+
			        '<option value="'+reason_id+'">'+reason_info+'</option>'+refundreason+
			   '</select><span class="err"></span>'+
			'</div>'+
		'</div>'+
		'<div class="cl">'+
		'<label class="form-label col-xs-3">退货数量：</label>'+
		'<div class="formControls col-xs-8">'+
			'<input type="number" name="refund_num_apply" id="refund_num_apply" value="'+refund_num+'" class="radius" min_num="0"  max_num="'+data_fun.f+'" placeholder="" style="width: 160px;">'+
		'</div>'+
	    '</div>'+
		'<div class="cl">'+
			'<label class="form-label col-xs-3">退货/款金额：</label>'+
			'<div class="formControls col-xs-8">'+
				'<input type="text" name="refund_amount_apply" id="refund_amount_apply" value="'+refund_amount_apply+'" class="radius"  max_amout="'+goods_pays_price+'" placeholder="'+goods_pays_price+'" style="width: 160px;"><span class="err"></span>'+
			'</div>'+
		'</div>'+
		'<div class="cl">'+
		'<label class="form-label col-xs-3">退货地址：</label>'+
		'<div class="formControls col-xs-8"><input type="text" readonly value="'+refund_address+'" name="refund_address" style="width:420px;border:none;box-shadow: none;" class="" id="refund_address">'+
			
		'</div>'+
	   '</div>'+
	   '<div class="cl">'+
		'<label class="form-label col-xs-3">退货联系人：</label>'+
		'<div class="formControls col-xs-8"><input type="hidden" name="contact_tel" id="refund_contact_tel" value=""><input type="text" readonly value="'+buyer_name+'" name="refund_contact" style="width:420px;border:none;box-shadow: none;" class="" id="refund_contact">'+
			
		'</div>'+
	   '</div>'+
		/* '<div class="cl">'+
			'<label class="form-label col-xs-3">手机号码：</label>'+
			'<div class="formControls col-xs-8">'+
				'<input type="text" name="refund_tel" id="refund_tel" class="radius" value="'+refund_tel+'" placeholder="" style="width: 160px;"><span class="err"></span>'+
			'</div>'+
		'</div>'+ */
		'<div class="cl">'+
			'<label class="form-label col-xs-3">备注信息：</label>'+
			'<div class="formControls col-xs-8">'+
				'<textarea name="buyer_message" id="buyer_message" style="width:300px;height:40px">'+refund_message+'</textarea>'+
			'</div>'+
		'</div>'+
		'<div class="cl">'+
			'<label class="form-label col-xs-3">图片举证：</label>'+
			'<div class="formControls col-xs-9">'+
				'<div id="preview"></div>'+
				'<div style="clear:both"></div>'+
				'<input type="file" name ="pic_info" onchange="preview(this)" style="opacity:0"/>'+
				'<span class="btn btn-secondary radius size-S mb-10" style="margin-left:-240px"><i class="fa fa-cloud-download"></i>上传图片<span>'+
			'</div>'+
		'</div>'+
		'</form>';
	  
	layer.open({
    type: 1,
    skin: 'layui-layer-rim', //加上边框
    title: '<b>申请退货/款</b>',
    area: ['720px', '610px'], //宽高
    btn: layer_btn, //按钮
    content: content,
    success :function(){
    	if(!data_fun.refund_id){
    		$.ajax({
				type: "POST",
		        url: "get_store_address",
		        data: {'order_sn':data_fun.a},
		        dataType: "json",
		        success: function(res){
		        	//layer.msg(data.msg);
		        	if(res.state){
		        		data = res.data;
		        		refund_address = data.province_name+data.city_name+data.area_name+data.address;
		        		refund_contact = data.user_name+" 手机："+data.tel;
		        		if(data.tel2){
		        			refund_contact +=" 备用："+data.tel2;
		        		}
		        		if(data.postcode){
		        			refund_address +=" 邮编："+data.postcode;
		        		}
		        		$('#refund_contact_tel').val(data.tel);
		        		$('#refund_address').val(refund_address);
		        		$('#refund_contact').val(refund_contact);
	        	    }else{
			        	refund_address ='<span class="red">渠道还未设置！！！</span>';
			        	$('#refund_address').html(refund_address);
		        		$('#refund_contact').html(refund_address);
			        }
		        }
			});
    	}
    	if((data_fun.refund_state!=4&&data_fun.seller_state==1)||!(data_fun.refund_id)){
    		$('#refund_num_apply').change(function(){
    			refund_num = $(this).val();
    			if(refund_num<0){
    				$(this).val(1);
    				layer.msg('请填写大于或等于0的整数');return false;
    			}
    			if($('.refund_express').size()==0&&refund_num>=1){
    				str_html = '<div class="cl refund_express"  id="refund_express">'+
    				'<label class="form-label col-xs-3">退货快递名称：</label>'+
    				'<div class="formControls col-xs-8">'+
    				'<input name="express_id" type="text" id="express_id" class="radius" style="width: 160px;"><span class="err"></span></div>'+
    			'</div>'+
    			'<div class="cl refund_express" >'+
				'<label class="form-label col-xs-3">退货快递单号：</label>'+
				'<div class="formControls col-xs-8">'+
				'<input name="invoice_no"  type="text" id="invoice_no" class="radius" style="width: 160px;"><span class="err"></span></div>'+
			'</div>';
    				$('#refund_contact').parents('.cl').after(str_html);
    			}
    			if((refund_num==0||!refund_num)&&$('.refund_express').size()>=1){
    				$('.refund_express').remove();
    			}
    		})
    	} 
    },
    yes:function(index){
    	$('#form_email_guide').validate({
            errorPlacement: function(error, element){
                var error_td = element.nextAll('span.err');
                error_td.append(error);
            },
            rules : {
            	reason_id : {required : true},
            	refund_amount_apply : {required:true},
            	/* refund_tel : {required:true,}, */
            	express_id:{required:true,},
            	invoice_no:{required:true,},
            },
            messages : {
            	reason_id : {required : '<i class="fa fa-exclamation-circle"></i> 请选择退货/款原因'},
            	refund_amount_apply : {required : '<i class="fa fa-exclamation-circle"></i>请输入退货/款金额'},
            	/* refund_tel : {required : '<i class="fa fa-exclamation-circle"></i>请输入申请退货的联系人电话',}, */
            	express_id : {required : '<i class="fa fa-exclamation-circle"></i>请输入快递名称',},
            	invoice_no : {required : '<i class="fa fa-exclamation-circle"></i>请输入快递单号',},
            }
        });
    	if($("#form_email_guide").valid()){
        	var form = document.getElementById("form_email_guide");
   	        var form_data =new FormData(form);
		   $.ajax({
				type: "POST",
		        url: "post_apply?op=w",
		        data: form_data,
		        dataType: "json",
		        processData: false,
	            contentType: false,
		        success: function(data){
		        	layer.closeAll();
		        	layer.msg(data.msg);
		        	if(data.state){
		        		getOrder_lists(1);
	        	    }else{
	        	    	
	        	    }
		        }
			 });
    	}
       
        
    },btn2:function(){
    	if(data_fun.refund_id){
    		if(data_fun.refund_refund_state==4){

    		}else{
    			layer.confirm('确定取消退货/款？',function(){
        			var form = document.getElementById("form_email_guide");
           	        var form_data =new FormData(form);
            		$.ajax({
        				type: "POST",
        		        url: "post_apply?op=cancel",
        		        data: form_data,
        		        dataType: "json",
        		        processData: false,
        	            contentType: false,
        		        success: function(data){
        		        	layer.closeAll();
        		        	layer.msg(data.msg);
        		        	if(data.state){
        		        		getOrder_lists(1);
        	        	    }else{

        	        	    }
        		        }
        			 });
        		})
    		}

    	}
    },
    btn3:function(){

    }
    })
}

var place_order = '<div class="search mt-10 mb-5">'+
        '<select name="gc_id" id="cate" class="selecte pd-5 mb-10 select2 ml-10"  id="" style="min-width:80px !important">'+
        '<option value="" selected>-分类-</option>'+
        '</select>'+
        '<input name="change_stocks_sn" type="text"id="" placeholder="货号/款号" style="width:200px !important;vertical-align: middle;border-radius:4px" class="input-text input_text f-12 mysearch mb-10 ml-10">'+
        '<input type="button" id="search" onclick="change_goods_search()" class="btn btn-warning radius ml-10 pButton mb-10" value="搜索">'+
        '</div>'+
        '<div class="bk-gray pd-10">'+
        '<ul id="list">'+
        '<li class="goods_list mb-15">' +
    '        <div class="goods_info cl">' +
    '          <img src="" width="50" height="50"  data-geo="" class="f-l" alt="">' +
    '          <div class="goods_info_text f-l ml-20">' +
    '            <div class="f-16"><b>货号：<span class="goods_article_number">kj123654 </span>名称：大欢喜运动店</b><span class="f-14">吊牌价：<span class="c-red">99999</span>元</span></div>' +
    '            <div class="f-14">' +
    '              品牌：<span class="c-red mr-5"></span>商品分类：<span class="c-red mr-5"></span>性别：<span class="c-red mr-5"></span>颜色：<span class="c-red mr-5"></span>' +
    '              重量：<span class="c-red mr-5">20KG</span>发布季：<span class="c-red mr-5"> </span>款号：<span class="c-red mr-5"></span>' +
    '            </div>' +
    '          </div>' +
    '        </div>' +
    '        <div class="goods_table mt-10">' +
    '          <table class=" table table-border table-bordered table-bg" style="width:auto;">' +
    '            <tr class="text-c"  bgcolor="F6F6F6">'+
    '              <th class="size_stock" width="100px"><div class=" china_size" data-size="">11</div></th>'+
    '              <th width="100px">销售价</th>' +
    '            </tr> '+
    '            <tr class="text-c va-t">'+
    '               <td class="sizenum" >' +
    '                <div class=" size_num " style=""><a href="javascript:;" data-ea-id="" data-sa-id="" class="size_">5555</a></div>' +
    '               </td>'+
    '              <td>123</td>' +
    '            </tr>'+
    '           </table>' +
    '        </div>' +
    '      </li>'+
    '<li class="goods_list mb-15">' +
    '        <div class="goods_info cl">' +
    '          <img src="" width="50" height="50"  data-geo="" class="f-l" alt="">' +
    '          <div class="goods_info_text f-l ml-20">' +
    '            <div class="f-16"><b>货号：<span class="goods_article_number">kj123654 </span>名称：大欢喜运动店</b><span class="f-14">吊牌价：<span class="c-red">99999</span>元</span></div>' +
    '            <div class="f-14">' +
    '              品牌：<span class="c-red mr-5"></span>商品分类：<span class="c-red mr-5"></span>性别：<span class="c-red mr-5"></span>颜色：<span class="c-red mr-5"></span>' +
    '              重量：<span class="c-red mr-5">20KG</span>发布季：<span class="c-red mr-5"> </span>款号：<span class="c-red mr-5"></span>' +
    '            </div>' +
    '          </div>' +
    '        </div>' +
    '        <div class="goods_table mt-10">' +
    '          <table class=" table table-border table-bordered table-bg" style="width:auto;">' +
    '            <tr class="text-c"  bgcolor="F6F6F6">'+
    '              <th class="size_stock" width="100px"><div class=" china_size" data-size="">11</div></th>'+
    '              <th width="100px">销售价</th>' +
    '            </tr> '+
    '            <tr class="text-c va-t">'+
    '               <td class="sizenum" >' +
    '                <div class=" size_num " style=""><a href="javascript:;" data-ea-id="" data-sa-id="" class="size_">5555</a></div>' +
    '               </td>'+
    '              <td>123</td>' +
    '            </tr>'+
    '           </table>' +
    '        </div>' +
    '      </li>'+
    '<li class="goods_list mb-15">' +
    '        <div class="goods_info cl">' +
    '          <img src="" width="50" height="50"  data-geo="" class="f-l" alt="">' +
    '          <div class="goods_info_text f-l ml-20">' +
    '            <div class="f-16"><b>货号：<span class="goods_article_number">kj123654 </span>名称：大欢喜运动店</b><span class="f-14">吊牌价：<span class="c-red">99999</span>元</span></div>' +
    '            <div class="f-14">' +
    '              品牌：<span class="c-red mr-5"></span>商品分类：<span class="c-red mr-5"></span>性别：<span class="c-red mr-5"></span>颜色：<span class="c-red mr-5"></span>' +
    '              重量：<span class="c-red mr-5">20KG</span>发布季：<span class="c-red mr-5"> </span>款号：<span class="c-red mr-5"></span>' +
    '            </div>' +
    '          </div>' +
    '        </div>' +
    '        <div class="goods_table mt-10">' +
    '          <table class=" table table-border table-bordered table-bg" style="width:auto;">' +
    '            <tr class="text-c"  bgcolor="F6F6F6">'+
    '              <th class="size_stock" width="100px"><div class=" china_size" data-size="">11</div></th>'+
    '              <th width="100px">销售价</th>' +
    '            </tr> '+
    '            <tr class="text-c va-t">'+
    '               <td class="sizenum" >' +
    '                <div class=" size_num " style=""><a href="javascript:;" data-ea-id="" data-sa-id="" class="size_">5555</a></div>' +
    '               </td>'+
    '              <td>123</td>' +
    '            </tr>'+
    '           </table>' +
    '        </div>' +
    '      </li>'+
    '      </ul>' +
    '  </div>'+
    '<div class="pagenum"><ul class="pagination pagination-sm">' +
    '    <li><a href="#">&laquo;</a></li>' +
    '    <li class="active"><a href="#">1</a></li>' +
    '    <li><a href="#">2</a></li>' +
    '    <li><a href="#">3</a></li>' +
    '    <li><a href="#">4</a></li>' +
    '    <li><a href="#">5</a></li>' +
    '    <li><a href="#">&raquo;</a></li>' +
    '</ul></div>';


//点击选择商品
    $("body").on("click",".sizenum",function(){

        $(".sizenum").removeClass('active');
        $(this).addClass('active');

    })

//点击更换尺码
    var sizeindex = 0,numindex=0;
   
    $("body").on("mouseover",".changesize ul li",function(){
        $(this).addClass('active');
        sizeindex = $(this).index();
    })
    $("body").on("mouseout",".changesize ul li",function(){
        $(this).removeClass('active');
    })
    $("body").on("mouseleave",".changesize",function(){
        $(this).find('ul li:eq('+sizeindex+')').addClass('active');
    })

    $("body").on("click",".changesize ul li",function(){
        $(this).parents('dd').find('.goodssize').text($(this).text());
        $(this).parent().parent().remove()
    })


   
    $("body").on("mouseover",".changesize ul li",function(){
        $(this).addClass('active');
        numindex = $(this).index();
    })
    $("body").on("mouseout",".changesize ul li",function(){
        $(this).removeClass('active');
    })
    $("body").on("mouseleave",".changesize",function(){
        $(this).find('ul li:eq('+numindex+')').addClass('active');
    })

    $("body").on("click",".changesize ul li",function(){

        console.log($(this).parents('dd').find('.goodsnum'))
        $(this).parents('dd').find('.goodsnum').text($(this).text());
        $(this).parent().parent().remove()
    })

    $("body").on("change",".input_goodsnum",function(){
        $(this).parents('dd').find('.goodsnum').text($(this).val());
        $(this).parent().remove()
    })

$("body").click(function(){

})



var numsimg= 1;
function preview(file){
	var lengs = $('#preview').children('.uploadimg').length;
	if(lengs>4){
		   layer.msg("亲，最多只能上传5张图片哦！");
		  return false;
	  }
	
	    
	    
	    
 	var prevDiv = document.getElementById('preview');  
 	if(file.files && file.files[0]){
 		var reader = new FileReader();
 		reader.onload = function(evt){
			prevDiv.innerHTML += '<div class="uploadimg" id="uploadimg'+numsimg+'"><img src="' + evt.target.result + '" /><i class="fa fa-times remove" aria-hidden="true"></i></div>';
		}
 		reader.readAsDataURL(file.files[0]);
 	}
 	  var form_datas = new FormData($('#form_email_guide')[0]);  
    $.ajax({
		type: "POST",
        url: "apply_set_onload",
        data: form_datas,
        dataType: "json",
        cache: false,  
        processData: false,  
        contentType: false,
        success: function(data){
        	//console.log(data)
        	if(data.state){
        		$("#uploadimg"+numsimg).attr("imgname",data.msg);
        	}else{
        		layer.msg(data.msg);
        		$("#uploadimg"+numsimg).remove();
        	}
        }
	});
    
 	numsimg++;
}



$("body").on("click","#preview .uploadimg .remove",function(){
	var urls = $(this).parent().attr("imgname");$(this).parent().remove();
	if(urls){
		$.ajax({
				type: "POST",
		        url: "del_set_onload?url="+urls,
		        data: 123,
		        dataType: "json",
		        success: function(data){
		        }
			});
	    }
});

var expressFee = [];
function modify_reload_express(order_sn){
	var weight = 0;ex_fee = expressInfo[order_sn];
	ex_code = $('tr.order_'+order_sn).find('.express').attr('data-code');
	//console.log(expressInfo);console.log(ex_fee);
	$('tr.order_'+order_sn).each(function(){
		goods_weight = data_num($(this).find('.goodsid').attr('data-weight'));
		goods_num = data_num($(this).find('.goodsnum').attr('data-num'));
		console.log(goods_weight);console.log(goods_num);
		weight +=parseFloat(goods_weight)*parseInt(goods_num);
	}) 
	reload_fee = [];
	$.each(ex_fee,function(k,v){
		if(v.express_code==ex_code){
			reload_fee = v;
		}
	})
	exshipfee = 0;
	if(reload_fee.free_fee_num>0){
		if(reload_fee.free_fee_num<=weight){
			exshipfee = 0;
		}else{
			if(reload_fee.first_nums>=weight){
				exshipfee = reload_fee.first_fee;
			}else{
				exshipfee = parseFloat(reload_fee.first_fee)+Math.ceil((parseFloat(weight)-parseFloat(reload_fee.first_nums))/reload_fee.loan_nums)*reload_fee.loan_fee;
			}
		}
	}else{
		if(reload_fee.first_nums>=weight){
			exshipfee = reload_fee.first_fee;
		}else{
			exshipfee = parseFloat(reload_fee.first_fee)+Math.ceil((parseFloat(weight)-parseFloat(reload_fee.first_nums))/reload_fee.loan_nums)*reload_fee.loan_fee;
		}
	}
	//console.log(exshipfee);console.log(reload_fee);console.log(weight);
	reload_fee.express_fee = exshipfee;
	shipFee[order_sn] = exshipfee;
	fee = JSON.stringify(reload_fee).replace(/"/g,"'");
	$('tr.order_'+order_sn).find('.express').attr('data-express',fee);
	$('tr.order_'+order_sn).find('.goods-freight').text(parseFloat(exshipfee).toFixed(2));
	orderfee = parseFloat(exshipfee)+parseFloat(goodsPrice[order_sn]);
	$('tr.order_'+order_sn).find('.ncsc-order-amount').text(parseFloat(orderfee).toFixed(2));
}
function modify_express(obj){
	order_sn = $(obj).parents('tr').attr('data-order_sn');
	ex_code = $(obj).attr('data-code');
	ex_fee = expressFee[order_sn].replace(/'/g,'"');
	ex_fee = JSON.parse(ex_fee);
	content = '<div class="goods_table mt-10"><table class=" table table-border table-bordered table-bg"><tr><th>选择</th><th>快递</th>';
	content += '<th class="c-red">首重（件）</th>';
	content += '<th>首费</th><th>续重（件）</th><th>续费</th><th>免费额度</th><th>运费</th></tr>';
	//console.log(ex_fee);
	$.each(ex_fee,function(n,goods){
		check = '';
		if(ex_code==goods.express_code){
			check ='checked';
		}
		fee = JSON.stringify(goods).replace(/"/g,"'");
		content += '<tr>';
		content += '<td><input name="eptaf_id" type="hidden" value="'+goods.express_code+'"><input class="select_express" type="radio" '+check+' name="express_fee" data-name="'+goods.express_name+'" value="'+fee+'"></td>';
		content += '<td>'+goods.express_name+'</td>';
		content += '<td class="">'+goods.first_nums+'</td>';
		content += '<td>'+goods.first_fee+'</td>';
		content += '<td>'+goods.loan_nums+'</td>';
		content += '<td>'+goods.loan_fee+'</td>';
		free_fee_num = parseFloat(goods.free_fee_num)>0?goods.free_fee_num:'';
		content += '<td>'+free_fee_num+'</td>';
		content += '<td>'+data_num(goods.express_fee)+'</td>';
		content += '</tr>';
	})
	content += '</table></div>';
	layer.open({
        type: 1,
        skin: 'layui-layer-rim', //加上边框
        title: '<b>快递选择</b>',
        area: ['50%', ''], //宽高
        content: content,
        success:function(layero, index){
        	
        },
        btn: ['确定','取消'], //按钮
        yes:function(index, layero){
        	var express_fee = $(layero).find('input[type="radio"]:checked').val();
            var store_name = $(layero).find('input[type="radio"]:checked').attr('data-name');
            var ex_code = $(layero).find('input[type="radio"]:checked').prev().val();
            ex_select_fee = 0;ex_select_code = '';
            $.each(ex_fee,function(k,v){
            	if(v.express_code==ex_code){
            		ex_select_fee = data_num(v.express_fee);
            		ex_select_code = v.express_code;
            	}
            })
            $(obj).text(store_name);
            $(obj).attr('data-express',express_fee);
            $(obj).attr('data-code',ex_code);
            orderPrice[order_sn] = parseFloat(goodsPrice[order_sn])+parseFloat(ex_select_fee);
       	    $(obj).parents('tr').find('.ncsc-order-amount').text(orderPrice[order_sn].toFixed(2));
       	    $(obj).parents('tr').find('.goods-freight').text(parseFloat(ex_select_fee).toFixed(2));
       	    shipFee[order_sn] = ex_select_fee;
       	    shipCode[order_sn] = ex_select_code;
            layer.closeAll();
        },no:function(){}
        })
}
expressInfo = [];goodsInfo = [];orderPrice=[];shipFee = [];goodsPrice = [];storeInfo = [];shipCode = [];changeGoods = [];changeSelectGoods = [];changeGoodsClick = [];
function modify_depot(order_ajax_data,obj){
	order_sn = order_ajax_data.order_sn
	$.ajax({
        url:"modify_order_depot",
        data:'',
        dataType:'json',
        type:'POST',
        success:function(data){
        	if(data.state=='403'){
        		layer.msg(data.msg);
                window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
        	}else if(data.state){
        		depot = '';
        		$.each(data.data,function(k,v){
        			depot+='<option value="'+v.auth_store_id+'">'+v.auth_store_name+'</option>';
        		})
        		content = '<form name="order_depot" id="order_depot_select"><div class="pd-10"><table class="table table-border table-bordered">' +
        		  '<tr class="text-c"><td>渠道名称</td>'+
        		  '<td><select  name="store_id"><option value="">-请选择-</option>'+depot+'</select><span class="err"></span></td></tr>';
        	     content += '</table></div></form>';
        		layer.open({
        	        type: 1,
        	        skin: 'layui-layer-rim', //加上边框
        	        title: '<b>商品：‘'+$(obj).attr('data-title')+'’选择渠道</b>',
        	        area: ['420px', '180px'], //宽高
        	        btn: ['确定','取消'],
        	        content: content,
        	        yes: function () {
        		    	$('#order_depot_select').validate({
                                 errorPlacement: function (error, element) {
                                     var error_td = element.next('span.err');
                                     error_td.append(error);
                                 },
                                 rules: {
                                     
                                     "store_id": {required: true},
                                 },
                         messages: {
                             
                             "store_id": {required: ''},
                         }
                     });
                 if($('#order_depot_select').valid()){
                         var form_data = $("#order_depot_select").serialize();
                         $.ajax({
                             url:"order_depot_submit",
                             type: 'POST',
                             data: form_data+'&order_sn='+order_sn,
                             dataType: 'json',
                             success: function (data, textStatus, jqXHR) {
                                 if(data.state == '403'){
                                     layer.msg(data.msg);
                                     window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                 }else if(data.state){
                                	 layer.closeAll();
                                	 if(data.state==401){
                                		 layer.msg(data.msg);
                                	 }
                                	 $.each(data.goods,function(k,v){
                                		 $('tr.rec_'+v.rec_id).find('.goodsid').attr('data-weight',data_num(v.weight));
                                		 $('tr.rec_'+v.rec_id).find('.goodsid').attr('data-a_id',data_num(v.goods_a_id));
                                		 $('tr.rec_'+v.rec_id).find('.goodsid').attr('data-ea_id',data_num(v.goods_ea_id));
                                		 $('tr.rec_'+v.rec_id).find('.goodsid').attr('data-sa_id',data_num(data.store.store_id));
                                		 $('tr.rec_'+v.rec_id).find('.goodsid').text(data_null(v.stocks_sku));
                                		 $('tr.rec_'+v.rec_id).find('.goodssize').text(data_null(v.size_note,v.size));
                                		 $('tr.rec_'+v.rec_id).find('.goodscolor').text(data_null(v.color_remark,v.color));
                                		 $('tr.rec_'+v.rec_id).find('.goods_pay_price').text(data_num(v.stocks_price));
                                		 $('tr.rec_'+v.rec_id).find('.goodsname').text(data_null(v.goods_name));
                                		 $('tr.rec_'+v.rec_id).find('.goodsimage').find('img').attr('src',data_null(v.goods_image));
                                		 $('tr.rec_'+v.rec_id).find('.goodsimage').find('img').attr('data-geo','<img src='+data_null(v.goods_image)+' width=300px>');
                                		 
                                	 })
                                	 $('tr.order_'+order_sn).find('.store-select').text(data_null(data.store.short_store_name));
                                	 
                                	 ex_fee = {};ex_fee_0 = {};is_default = false;
                                	 $.each(data.express,function(k,v){
                                		 ex_fee = v;
                                		 if(v.default==1){
                                			 is_default = true;
                                			 ex_fee_0 = v;
                                		 }
                                	 })
                                	 if(is_default){
                                		 ex_fee = ex_fee_0;
                                	 }
                                     $('tr.order_'+order_sn).find('.express').attr('data-express',data_null(JSON.stringify(ex_fee).replace(/"/g,"'")));
                                     $('tr.order_'+order_sn).find('.express').attr('data-code',data_null(ex_fee.express_code));
                                	 $('tr.order_'+order_sn).find('.express').text(data_null(ex_fee.express_name));
                                	 $('tr.order_'+order_sn).find('.express').show();
                                	 $('tr.order_'+order_sn).find('.goods-freight').text(parseFloat(data_num(ex_fee.express_fee)).toFixed(2));
                                	 expressInfo[order_sn] = data.express;
                                	 goodsInfo[order_sn] = data.goods;
                                	 expressFee[order_sn] = data.express_str;
                                	 goodsPrice[order_sn] = data.goods_price;
                                	 storeInfo[order_sn] = data.store;
                                	 orderPrice[order_sn] = parseFloat(data.goods_price)+parseFloat(data_num(ex_fee.express_fee));
                                	 //console.log(orderPrice);
                                	 $('tr.order_'+order_sn).find('.ncsc-order-amount').text(parseFloat(orderPrice[order_sn]).toFixed(2));
                                	 shipFee[order_sn] = data_num(ex_fee.express_fee);
                                	 shipCode[order_sn] = data_num(ex_fee.express_code);
                                	 if(data.submit){
                                		 $('tr.order_'+order_sn).find('.creat-order').addClass('disabled');
                                	 }else{
                                		 $('tr.order_'+order_sn).find('.creat-order').removeClass('disabled');
                                	 }
                                	 changeGoodsClick[order_sn] = true;
                                	 //layer.msg(data.msg);
                                    // getOrder_lists(1);
                                 }else{
                                	 changeGoodsClick[order_sn] = false;
                                	 layer.msg(data.msg,{time:3000});
                                 }
                             }
                         });
                     }
                 }, no: function () {}
        		})
        	}else{
        		layer.msg(data.msg);
        	}
        },
        complete:function(){
        	
        }
	})
	return false;
    layer.open({
        type: 1,
        skin: 'layui-layer-rim', //加上边框
        title: '<b>商品：‘'+$(obj).attr('data-title')+'’选择店铺</b>',
        area: ['50%', ''], //宽高
        content: '<div style="padding:10px;" id="modify">数据加载中</div>',
        success:function(layero, index){
//            console.log(layero, index);
            $.ajax({
                url:"modify_order_goods_depot",
                data:{'rec_id':rec_id,'goods_ea_id':goods_ea_id,'reciver_province_id':reciver_province_id, 'reciver_city_id':reciver_city_id, 'reciver_area_id':reciver_area_id},
                dataType:'json',
                type:'POST',
                success:function(data){
//                    console.log(data);
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else  if(data.state){
                    	stockInfo = data.data;
                        var content = '<div class="goods_info_text"><div class="f-16"><b>货号：<span class="goods_article_number">'+data_null(stockInfo.stocks_sn)+' </span>名称：'+data_null(stockInfo.goods_name)+'</b></div><div class="f-14">吊牌价：<span class="c-red">'+data_num(stockInfo.stocks_marketprice)+'</span>元</div>'
                                +'<div class="f-14">品牌：<span class="c-red mr-5">'+data_null(stockInfo.brand_name)+'</span>商品分类：<span class="c-red mr-5">'+data_null(stockInfo.gc_name)+'</span>性别：<span class="c-red mr-5">'+data_null(stockInfo.sex)+
                                '</span>颜色：<span class="c-red mr-5">'+data_null(stockInfo.goods_color_remark,stockInfo.goods_color)+
                                '</span>尺码：<span class="c-red mr-5">'+data_null(stockInfo.goods_size_remark,stockInfo.size)+'</span>重量：<span class="c-red mr-5">'+data_null(stockInfo.weight)+'Kg</span>发布季：<span class="c-red mr-5">'+data_null(stockInfo.market_date)+'</span></div></div>';
                        content += '<div class="goods_table mt-10"><table class=" table table-border table-bordered table-bg"><tr><th>选择</th><th>店铺</th><th>店铺简称</th>';
                        content += '<th class="c-red">库存</th>';
                        content += '<th>数量</th><th>单价</th><th>发货时间</th></tr>';
                        $.each(data.store_info,function(n,val){
                        	expressFee = val.express;
                        	goods = val.stock;
                            content += '<tr>';
                            content += '<td><input name="express_info" type="hidden" value="'+val.express+'"><input class="select_depot" type="radio" name="depot" data-weight="'+data_num(stockInfo.weight)+'" data-price="'+data_num(goods.stocks_price)+'" data-name="'+data_null(goods.short_store_name)+'" value="'+goods.ssa_store_id+'"></td>';
                            content += '<td>'+data_null(goods.store_name)+'</td>';
                            content += '<td>'+data_null(goods.short_store_name)+'</td>';
                            content += '<td class="c-red">'+data_num(goods.amount)+'</td>';
                            content += '<td>'+$(obj).attr('data-num')+'</td>';
                            content += '<td>'+data_num(goods.stocks_price)+'</td>';
                            content += '<td>'+data_null(val.shipment_time)+'</td>';
                            content += '</tr>';
                        });
                        content += '</table></div>';
                    }else{
                    	
                        var content = '<div class="goods_table mt-10"><table class="table table-border table-bordered table-bg"><tr><td class="no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</td></tr></table></div>';
                    }
                    $(layero).find("#modify").html(content);
                }
            });
        },
        btn: ['确定','取消'], //按钮
        yes:function(index, layero){
            var dopot_code = $(layero).find('input[type="radio"]:checked').val();
            var store_name = $(layero).find('input[type="radio"]:checked').attr('data-name');
            var data_price = $(layero).find('input[type="radio"]:checked').attr('data-price');
            var data_weight = $(layero).find('input[type="radio"]:checked').attr('data-weight');
            if(!!dopot_code){
            	$(obj).parents('tr').find('.goods_pay_price').text(data_price);
            	
            	ex_fee = $(layero).find('input[type="radio"]:checked').parent().find('input[name=express_info]').val();
            	ex_fee = JSON.parse(ex_fee.replace(/'/g,'"')); 
            	//console.log(typeof(ex_fee));console.log(ex_fee)
            	
                defaultE = '';
                $.each(ex_fee,function(k,v){
                	if(v.default==1){
                		defaultE = v;
                	}else if(defaultE==''){
                		defaultE = v;
                	}
                })
                if(defaultE==''){
                	layer.msg('此渠道还未设置运费信息,请通知该渠道尽快设置',{icon:2});return false;
                }
                $(obj).attr('data-id',dopot_code);
            	$(obj).attr('data-weight',data_weight);
                $(obj).text(store_name);
                $(obj).next().text(defaultE.express_name);
                $(obj).next().attr('data-code',defaultE.express_code);
                $(obj).next().attr('data-express',JSON.stringify(defaultE).replace(/"/g,"'")).show();
                obj_class = $(obj).parents('tr').attr('class');
            	
                is_creat = true;order_price = 0;
                $('.'+obj_class).each(function(){
                	goods_num = $(this).find('.pay_goods_num').text();
                	goods_price = $(this).find('.goods_pay_price').text();
                	//console.log(goods_num);console.log(goods_price);
                	order_price +=goods_price*goods_num;
                	if(!!($(this).find('.express').attr('data-express'))&&!!($(this).find('.express').attr('data-code'))){
                		
                	}else{
                		is_creat = false;
                	}
                })
                $('.'+obj_class).find('.in_order_price').find('.ncsc-order-amount').text(order_price.toFixed(2));
                //console.log(is_creat);
                if(is_creat){
                	$('.'+obj_class).find('.creat-order').removeClass('disabled');
                }else{
                	$('.'+obj_class).find('.creat-order').addClass('disabled');
                }
                layer.closeAll();
            }else{
            	layer.msg('请选择渠道');
            }
            
        },
        no:function(){
            return false;
        }
    });
}
//点击货号弹出手工下单弹框

        	$('.flexigrid_box').on("click",".goodsid",function(){
        		order_sn = $(this).parents('tr').attr('data-order_sn');
        		if(!changeGoodsClick[order_sn]){
        			return false;
        		}
        		rec_id = $(this).parents('tr').attr('data-rec_id');
        		express_code = $(this).parents('tr').find('.express').attr('data-code');
        		$.ajax({
        			type: "POST",
        	        url: "get_goods_class",
        	        data: '',
        	        dataType: "html",
        	        success: function(data){
        	        	var place_order = '<div class="search mt-10 mb-5"><form id="change_goods_search_form">'+
        	            '<select name="change_goods_gc_id" id="change_goods_gc_id" class="selecte pd-5 mb-10 select2 ml-10"  id="" style="min-width:80px !important">'+
        	            '<option value="" selected>-分类-</option>'+data+
        	            '</select>'+
        	            '<input name="change_stocks_sn" type="text" id="change_stocks_sn" placeholder="货号/款号" style="width:200px !important;vertical-align: middle;border-radius:4px" class="input-text input_text f-12 mysearch mb-10 ml-10">'+
        	            '<input type="button" id="change_goods_search" onclick="" class="btn btn-warning radius ml-10 pButton mb-10" value="搜索">'+
        	            '</div>'+
        	            '<div class="pd-10">'+
        	            '<ul id="change_search_list">'+
        	            '</ul></form></div><div class="pagination"></div>';
        	            layer.open({
        	                type: 1,
        	                skin: 'layui-layer-rim', //加上边框
        	                title: '<b>选择商品</b>',
        	                area: ['1020px', '760px'], //宽高
        	                content: place_order,
        	                btn: ['确定','取消'], //按钮
        	                success:function(){
        	                	$('#change_goods_search').click(function(){
        	                		class_id = $('#change_goods_gc_id').val();
        	                		stocks_code = $('#change_stocks_sn').val();
        	                		if(class_id==''&&stocks_code==''){
        	                			layer.msg('请输入搜索条件');return false;
        	                		}
            	                    function show_content(curr){
            	                		$.ajax({
            	                			type: "POST",
            	                	        url: "change_goods_search",
            	                	        data: $('#change_goods_search_form').serialize()+'&store='+storeInfo[order_sn].store_id+'&page='+curr,
            	                	        dataType: "json",
            	                	        success: function(data){
            	                	        	if(data.state){
            	                	        		
            	                	        		page = parseInt(data.page);data_goods = data.data;total_page = parseInt(data.total_page);rp = parseInt(data.rp);
            	                	        		changeGoods[rec_id] = data_goods;
            	                	        		li_str = '';
            	                	        		$.each(data_goods,function(k,v){
            	                	        			stock_info = v.stock;goods_info = v.goods;
            	                	        			stock_str_size = '';stock_str_amount = '';
            	                	        			$.each(stock_info,function(ka,va){
            	                	        				stock_str_size +='<th class="size_stock" width="100px"><div class=" china_size" data-size="">'+data_num(va.size_note,va.size)+'</div></th>';
            	                	        				stock_str_amount +='<td class="sizenum" >' +
                	                	        		    '<div class=" size_num " style=""><span data-ea-id="'+va.goods_ea_id+'" data-sa-id="" class="size_">'+data_num(va.amount)+'</span></div>' +
                	                	        		    '</td>';
            	                	        			})
            	                	        			li_str += '<li class="goods_list mb-15">' +
            	                	        		    '        <div class="goods_info cl">' +
            	                	        		    '          <img src="'+goods_info.goods_image+'" width="50" height="50"  data-geo="'+goods_info.goods_image+'" class="f-l" alt="">' +
            	                	        		    '          <div class="goods_info_text f-l ml-20">' +
            	                	        		    '            <div class="f-16"><b>货号：<span class="goods_article_number">'+data_null(goods_info.stocks_sku)+' </span>名称：'+data_null(goods_info.goods_name)+
            	                	        		    '</b></div>' +
            	                	        		    '            <div class="f-14">' +
            	                	                    '<span class="f-14">吊牌价：<span class="c-red">'+data_num(goods_info.stocks_marketprice)+'</span>元</span>'+
            	                	        		    '              品牌：<span class="c-red mr-5">'+data_null(goods_info.brand_name)+'</span>商品分类：<span class="c-red mr-5">'+data_null(goods_info.gc_name)+'</span>性别：<span class="c-red mr-5">'+data_null(goods_info.sex)+'</span>颜色：<span class="c-red mr-5">'+data_null(goods_info.color_remark,goods_info.color)+'</span>' +
            	                	        		    '              重量：<span class="c-red mr-5">'+data_null(goods_info.weight)+'KG</span>发布季：<span class="c-red mr-5"> '+data_null(goods_info.time_market)+'</span>款号：<span class="c-red mr-5">'+data_null(goods_info.goods_spu)+'</span>' +
            	                	        		    '            </div>' +
            	                	        		    '          </div>' +
            	                	        		    '        </div>' +
            	                	        		    '        <div class="goods_table mt-10">' +
            	                	        		    '          <table class=" table table-border table-bordered table-bg" style="width:auto;">' +
            	                	        		    '            <tr class="text-c"  bgcolor="F6F6F6">'+
            	                	        		    '              <th width="100px">尺码</th>' +
            	                	        		    stock_str_size+
            	                	        		    '              <th width="100px">销售价</th>' +
            	                	        		    '            </tr> '+
            	                	        		    '            <tr class="text-c va-t">'+
            	                	        		    '<td>库存</td>'+
            	                	        		    stock_str_amount+'<td>'+data_num(goods_info.stocks_price)+'</td>'+
            	                	        		    '            </tr>'+
            	                	        		    '           </table>' +
            	                	        		    '        </div>' +
            	                	        		    '      </li>';
            	                	        		})
            	                	        		$('#change_search_list').html(li_str);
            	                	        		pages = total_page
            	                  	                curr = page
            	                  	                laypage({
            	                  	          	      cont: $('div.pagination'), //容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
            	                  	          	      pages: pages, //通过后台拿到的总页数
            	                  	          	      curr:  curr || 1, //当前页
            	                  	          	      first: '首页',
            	                  	          	      last: '末页',
            	                  	          	      groups:5,
            	                  	          	      jump: function(obj, first){ //触发分页后的回调
            	                  	          	        if(!first){ //点击跳页触发函数自身，并传递当前页：obj.curr
            	                  	          	           show_content(obj.curr);
            	                  	          	        }
            	                  	          	      }
            	                  	          	    });
            	                	        	}else{
            	                	        		layer.msg(data.msg);
            	                	        	}
            	                	        },
            	                	        complete:function(){
            	                	        	$('img').error(function(){
            	                                    $(this).attr('src', "http://[::1]/yunjuke/data/images/default_goods_image.jpg");
            	                                    $(this).attr('data-geo', "<img src=http://[::1]/yunjuke/data/images/default_goods_image.jpg width=300px>");
            	                                    
            	                                  });
            	                	        }
            	                		})
            	                       }  
            	                    show_content(1);
        	                		
        	                	})
        	                	
        	                },
        	                yes:function(index){
        	                	select_ea_id = $('#change_search_list').find('td.active').find('span').attr('data-ea-id');
        	                	if(!!select_ea_id){
        	                		change_search_goods = changeGoods[rec_id];
        	                		select_search_goods = [];
        	                		$.each(change_search_goods,function(kg,vg){
        	                			$.each(vg.stock,function(kag,vag){
        	                				if(vag.goods_ea_id==select_ea_id){
        	                					select_search_goods = vag;
        	                					/* rec_id_k = "'"+rec_id+"'";
        	                					changeSelectGoods[rec_id_k] = vag;  */
            	                			}
        	                			})
        	                			
        	                		})
        	                		changeSelectGoods[rec_id] = select_search_goods;
        	                		$('.rec_'+rec_id).find('.goodsname').text(data_null(select_search_goods.goods_name));
        	                		$('.rec_'+rec_id).find('.goodsid').text(data_null(select_search_goods.stocks_sku));
        	                		$('.rec_'+rec_id).find('.goodssize').text(data_null(select_search_goods.size_note,select_search_goods.size));
        	                		$('.rec_'+rec_id).find('.goodscolor').text(data_null(select_search_goods.color_remark,select_search_goods.color));
        	                		$('.rec_'+rec_id).find('.goodsimage').find('img').attr('src',select_search_goods.goods_image);
        	                		$('.rec_'+rec_id).find('.goodsimage').find('img').attr('data-geo',select_search_goods.goods_image);
        	                		reload_ajax_data = {'order_sn':order_sn,'store_id':storeInfo[order_sn].store_id,'express_code':express_code};
        	                		change_fee_reload(changeSelectGoods,reload_ajax_data);
        	                		
        	                	}else{
        	                	    layer.msg('请先选择商品！');
        	                	    return false;
        	                	}
        	                },no:function(){}
        	            })
        	        }
        		 });
        	    
        	})
			$('.flexigrid_box').on("click",".goodssize",function(){
        		order_sn = $(this).parents('tr').attr('data-order_sn');
        		if(!changeGoodsClick[order_sn]){
        			return false;
        		}
				goods_a_id = $(this).parents('td').find('.goodsid').attr('data-a_id');
				goods_ea_id = $(this).parents('td').find('.goodsid').attr('data-ea_id');
				goods_sa_id = $(this).parents('td').find('.goodsid').attr('data-sa_id');
				rec_id = $(this).parents('tr').attr('data-rec_id');
				//console.log(goods_a_id);
				obj_size = $(this);
				if(goods_a_id>0){
					modify_order_goods_size_data = {'goods_a_id':goods_a_id,'order_sn':order_sn,'store':storeInfo[order_sn].store_id};
					$.ajax({
		                url:"modify_order_goods_size",
		                data:modify_order_goods_size_data,
		                dataType:'json',
		                type:'POST',
		                success:function(data){
		                	var change = '<div class="changesize changesize1"><ul>';
		                	$.each(data,function(ks,vs){
		                		change +='<li class="" data-size="'+vs.size+'" data-size_note="'+data_null(vs.size_note)+'">'+data_null(vs.size_note,vs.size)+'</li>';
		                	})
		                	change +='</ul></div>';
		                	obj_size.parent().css('position','relative');
		                	obj_size.parent().append(change);
		                	
		                	
		                	//console.log(goodsInfo);
		                },
		                complete:function(){
		                	$('tr.rec_'+rec_id).find('.changesize1').find('li').click(function(){
		                		goodsInfo[order_sn][rec_id].size = $(this).attr('data-size');
		                		goodsInfo[order_sn][rec_id].size_note = $(this).attr('data-size_note');
		                	})
		                }
					})
					
				}
				
			})
			$('.flexigrid_box').on("click",".goodsnum",function(){
				order_sn = $(this).parents('tr').attr('data-order_sn');
        		if(!changeGoodsClick[order_sn]){
        			return false;
        		}
				goods_a_id = $(this).parents('td').find('.goodsid').attr('data-a_id');
				goods_ea_id = $(this).parents('td').find('.goodsid').attr('data-ea_id');
				goods_sa_id = $(this).parents('td').find('.goodsid').attr('data-sa_id');
				goods_weight = $(this).parents('td').find('.goodsid').attr('data-weight');
				express_code = $(this).parents('tr').find('.express').attr('data-code');
				obj_num = $(this);
				rec_id = $(this).parents('tr').attr('data-rec_id');
				//console.log(goods_a_id);
				if(goods_a_id>0){
					var change = '<div class="changesize changenum">'+
					'<ul>'+
					'<li class="active">1</li>'+
					'<li>2</li>'+
					'<li>3</li>'+
					'<li>4</li>'+
					'</ul>'+
					'<input type="text" class="input_goodsnum">'+
					'</div>';
					change0 =  '<ul>'+
					'<li class="active">1</li>'+
					'<li>2</li>'+
					'<li>3</li>'+
					'<li>4</li>'+
					'</ul>'+
					'<input type="text" class="input_goodsnum">';
					if($(this).parent().find('.changenum').size()==1){
						 $(this).parent().find('.changenum').html(change0);
					}else{
						 $(this).parent().css('position','relative');
						 $(this).parent().append(change);
					}
					reload_ajax_data = {'order_sn':order_sn,'store_id':storeInfo[order_sn].store_id,'express_code':express_code};
				   $('tr.rec_'+rec_id).find('.changenum').find('li').click(function(){
               		   goodsInfo[order_sn][rec_id].goods_num = $(this).text();
               		   obj_num.attr('data-num',$(this).text());
               		   obj_num.text($(this).text());
               		   modify_reload_express(order_sn);
               		   changeSelectGoods[rec_id] = goodsInfo[order_sn][rec_id];
                 	   //console.log(changeSelectGoods)
        	           change_fee_reload(changeSelectGoods,reload_ajax_data);
                 	})
                 	$('tr.rec_'+rec_id).find('.input_goodsnum').change(function(){
               		   goodsInfo[order_sn][rec_id].goods_num = $(this).val();
               		   obj_num.attr('data-num',$(this).val());
               		   obj_num.text($(this).val());
               		   modify_reload_express(order_sn);
	               	   changeSelectGoods[rec_id] = goodsInfo[order_sn][rec_id];
	                   
	        	       change_fee_reload(changeSelectGoods,reload_ajax_data);
                 	})
                 	
                 	//console.log(goodsInfo);
				}
				
		
			})
function change_fee_reload(changeSelectGoods,reload_ajax_data){
	
	goods = [];i=0;
	$.each(changeSelectGoods,function(k,v){
		if(!!v){
			v['rec_id'] = k;
			goods[i] =v;
			i++;
		}
		 
	})
	reload_ajax_form_data = {'order_sn':reload_ajax_data.order_sn,'store_id':reload_ajax_data.store_id,'changeGoods':goods,'express_code':reload_ajax_data.express_code};
	//console.log(goods);console.log(order_sn);console.log(store_id);
	$.ajax({
		type: "POST",
        url: "order_depot_submit?op=change",
        data: reload_ajax_form_data,
        async: false,
        dataType: "json",
        success: function(data){
        	layer.closeAll();
        	if(data.state == '403'){
                layer.msg(data.msg);
                window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
            }else if(data.state){
           	 layer.closeAll();
           	 if(data.state==401){
           		 layer.msg(data.msg);
           	 }
           	 $.each(data.goods,function(k,v){
           		 $('tr.rec_'+v.rec_id).find('.goodsid').attr('data-a_id',data_num(v.goods_a_id));
       		     $('tr.rec_'+v.rec_id).find('.goodsid').attr('data-ea_id',data_num(v.goods_ea_id));
       		     $('tr.rec_'+v.rec_id).find('.goodsid').attr('data-sa_id',data_num(data.store.store_id));
       		     $('tr.rec_'+v.rec_id).find('.goodsid').attr('data-weight',data_num(v.weight));
           		 $('tr.rec_'+v.rec_id).find('.goodsid').text(data_null(v.stocks_sku));
           		 $('tr.rec_'+v.rec_id).find('.goodssize').text(data_null(v.size_note,v.size));
           		 $('tr.rec_'+v.rec_id).find('.goodscolor').text(data_null(v.color_remark,v.color));
           		 $('tr.rec_'+v.rec_id).find('.goods_pay_price').text(data_num(v.stocks_price));
           		 $('tr.rec_'+v.rec_id).find('.goodsname').text(data_null(v.goods_name));
           		 $('tr.rec_'+v.rec_id).find('.goodsimage').find('img').attr('src',data_null(v.goods_image));
           		 $('tr.rec_'+v.rec_id).find('.goodsimage').find('img').attr('data-geo','<img src='+data_null(v.goods_image)+' width=300px>');
           		 
           	 })
           	 $('tr.order_'+order_sn).find('.store-select').text(data_null(data.store.short_store_name));
           	 
           	 ex_fee = {};ex_fee_0 = {};is_default = false;
           	 $.each(data.express,function(k,v){
           		 if(v.express_code==reload_ajax_data.express_code){
           			ex_fee = v;
           		 }
           	 })
           	 if(is_default){
           		 ex_fee = ex_fee_0;
           	 }
           	 $('tr.order_'+order_sn).find('.express').text(data_null(ex_fee.express_name));
           	 $('tr.order_'+order_sn).find('.express').show();
           	 $('tr.order_'+order_sn).find('.goods-freight').text(parseFloat(data_num(ex_fee.express_fee)).toFixed(2));
           	 expressInfo[order_sn] = data.express;
           	 goodsInfo[order_sn] = data.goods;
           	 expressFee[order_sn] = data.express_str;
           	 goodsPrice[order_sn] = data.goods_price;
           	 storeInfo[order_sn] = data.store;
           	 orderPrice[order_sn] = parseFloat(data.goods_price)+parseFloat(data_num(ex_fee.express_fee));
           	 //console.log(orderPrice);
           	 $('tr.order_'+order_sn).find('.ncsc-order-amount').text(parseFloat(orderPrice[order_sn]).toFixed(2));
           	 shipFee[order_sn] = data_num(ex_fee.express_fee);
           	 shipCode[order_sn] = data_num(ex_fee.express_code);
           	 if(data.submit){
           		 $('tr.order_'+order_sn).find('.creat-order').addClass('disabled');
           	 }else{
           		 $('tr.order_'+order_sn).find('.creat-order').removeClass('disabled');
           	 }
           	 //layer.msg(data.msg);
               // getOrder_lists(1);
            }else{
           	 layer.msg(data.msg,{time:3000});
            }
        }
       })	                			
	//console.log(goods);
}


$(function(){
    /*商品图片放大*/
    $( document ).tooltip({
        items: "img, [data-geo], [title]",
        content: function() {
            var element = $( this );
            if ( element.is( "[data-geo]" ) ) {
                return element.data( "geo" );
            }
            if ( element.is( "[title]" ) ) {
                return element.attr( "title" );
            }
            if ( element.is( "img" ) ) {
                return element.attr( "alt" );
            }
        }
    });
    //标记订单
    $("table").on("click","tr .sign",function(){
        if($(this).parents("tr").hasClass('trSelected')){
            if($(this).hasClass("all")){
                $(".sign").parents("tr").removeClass("trSelected")
            }else{
                $(this).parents("tr").removeClass("trSelected")
            }
        }else{
            if($(this).hasClass("all")){
                $(".sign").parents("tr").addClass("trSelected")
            }else{
                $(this).parents("tr").addClass("trSelected")
            }
        }
    });
    /*$('.selectpicker').selectpicker({
        'selectedText': 'cat'
    });*/
    //多选框
    /*$(".selectpicker").select2({
       placeholder:'请选择',
//      dir: "rtl",
    	 width:"220px",
        allowClear: true,
      dropdownAutoWidth:true,
      closeOnSelect: false,   
      multiple:true,
      
   });*/
   // $('.select2').css('min-width','120px');//为select2加上最小宽度
    //搜索
    $('#to_search_orders').on('click',function(){
    	//console.log(111);
        getOrder_lists(1);
    });
});
function create_order(order,obj){
	order_sn = order.order_sn;
	var submit_once = 1;
	var goods_fee = goodsPrice[order_sn];
	order_fee = parseFloat(orderPrice[order_sn]);
	pay_carriage = parseFloat(shipFee[order_sn]);
	content = '<form action="" id="form_create"><div class="pd-10"><div class="pos-r">应付总额：'+
	'<span class="c-red" id="money">'+order_fee.toFixed(2)+'</span>元,含运费：<span class="c-red" id="create_carriage">'+pay_carriage.toFixed(2)+'</span>元。</div>'+
	'<div class="mt-20 pos-r">支付密码：<input type="password" id="pay_pwd" name="pay_pwd" class="w-120" placeholder="请输入支付密码">'+
	'<span class="err pos-a" style=""></span></div></div><input type="hidden" name="goods_info" id="goods_info" value=""><input type="hidden" name="order_sn" id="order_sn" value="'+order_sn+'"></form>';
	layer.open({
        type: 1,
        skin: 'layui-layer-rim', //加上边框
        title: '<b>订单支付</b>',
        area: ['400px', ''], //宽高
        content: content,
        success:function(layero, index){
        	/* layero.delegate(".layui-layer-btn0","keydown",function(event){ 
				   if (event.keyCode == 13) {
					 pwd = $('#pay_pwd').val();
             	pwd = pwd_addMD5(pwd);
             	$.ajax({
                     url: "create_order",
                     data:{'order_sn':order_sn,'pwd':pwd,'goods':res.data,'money':order_fee,'create_carriage':res.create_carriage},
                     type:'POST',
                     dataType:'json',
                     success:function(data){
                         if(data.state == '403'){
                             layer.msg(data.msg);
                             window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                         }else if(data.state == '401'){
                             layer.msg(data.msg);
                         }else if(data.state==101){
                             layer.msg(data.msg);
                     	}else if(data.state==102){
                     		layer.msg(data.msg);
                     	}else if(data.state){
                     		layer.closeAll();
                     		layer.msg(data.msg);
                     		getOrder_lists(1);
                     	}else{
                     		layer.msg(data.msg);
                     	}
                     }
                 });
			        }
				});  */
        },
        btn: ['确定','取消'], //按钮
        yes:function(index, layero){
        	
        	pwd = $('#pay_pwd').val();
        	pwd = pwd_addMD5(pwd);
        	$('#form_create').validate({
                errorPlacement: function (error, element) {
                    var error_td = element.next('span.err');
                    error_td.append(error);
                },
                rules: {
                    pay_pwd: { required: true},
                },
                messages: {
                    pay_pwd: {required: ''},
                }
            });
            if ($('#form_create').valid()) {
            	submit_once++;//&&submit_once==1
            	submitData = {'goods':goodsInfo[order_sn],'shipFee':shipFee[order_sn],'orderPrice':orderPrice[order_sn],'goodsPrice':goodsPrice[order_sn],'storeInfo':storeInfo[order_sn],'order_sn':order_sn,'pwd':pwd,'express_code':shipCode[order_sn]};
            	$.ajax({
                    url: "create_order_submit",
                    data:submitData,
                    type:'POST',
                    dataType:'json',
                    success:function(data){
                    	submit_once = 1;
                        if(data.state == '403'){
                            layer.msg(data.msg);
                            window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                        }else if(data.state == '401'){
                            layer.msg(data.msg);
                        }else if(data.state==101){
                            layer.msg(data.msg);
                    	}else if(data.state==102){
                    		layer.msg(data.msg);
                    	}else if(data.state){
                    		layer.closeAll();
                    		layer.msg(data.msg);
                    		getOrder_lists(1);
                    	}else{
                    		
                    		layer.msg(data.msg);
                    	}
                    }
                });
            }
        	
        },no:function(){}
        })
	
	return false;
	//console.log(out_order_sn)
	obj_class = $(obj).parents('tr').attr('class');
	is_creat = true;
	submitData = [];
	$('.'+obj_class).each(function(){
    	if(!!($(this).find('.express').attr('data-express'))&&!!($(this).find('.express').attr('data-code'))){
    		store_id = $(this).find('.store-select').attr('data-id');
    		ex_code = $(this).find('.express').attr('data-code');
    		ex_fee = $(this).find('.express').attr('data-express');
    		goods_ea_id = $(this).find('.store-select').attr('data-ea-id');
    		weight = $(this).find('.store-select').attr('data-weight');
    		goods_num = $(this).find('.store-select').attr('data-num');
    		if(store_id>0){
    			var ex = {'store_id':store_id,'ex_code':ex_code,'ex_fee':ex_fee,'weight':weight,'rec_id':$(this).find('.store-select').attr('data-rec-id'),'goods_ea_id':goods_ea_id,'goods_num':goods_num};
    			submitData.push(ex);
    		}
    	}else{
    		is_creat = false;
    	}
	})
	if(!is_creat){
		layer.msg('请先选择渠道和快递',{icon:2});return false;
	}else{
		$.ajax({
            url: "create_order_ex",
            data:{'order_sn':order_sn,'order_data':JSON.stringify(submitData)},
            type:'POST',
            dataType:'json',
            success:function(res){
                layer.closeAll();
                if(res.state){
                	var goods_fee = $('.'+obj_class).find('.in_order_price').find('.ncsc-order-amount').text();
                	order_fee = parseFloat(goods_fee)+parseFloat(res.create_carriage);
                	self_price = parseFloat(res.self_price);self_carriage = parseFloat(res.self_carriage);
                	pay_fee = (order_fee-self_price-self_carriage).toFixed(2);
                	pay_carriage = (parseFloat(res.create_carriage)-self_carriage).toFixed(2);
                	content = '<form action="" id="form_"><div class="pd-10"><div class="pos-r">应付总额：'+
                	'<span class="c-red" id="money">'+order_fee.toFixed(2)+'</span>元,运费：<span class="c-red" id="create_carriage">'+parseFloat(res.create_carriage).toFixed(2)+'</span>元。</div>'+
                	'<div class="pos-r">实付总额：'+
                	'<span class="c-red" id="pay_money">'+pay_fee+'</span>元,实付运费：<span class="c-red" id="create_carriage">'+pay_carriage+'</span>元。</div>'+
                	'<div class="mt-20 pos-r">支付密码：<input type="password" id="pay_pwd" name="pay_pwd" class="w-200" placeholder="请输入支付密码">'+
                	'<span class="err pos-a" style="top:40px;left:52px"></span></div></div><input type="hidden" name="goods_info" id="goods_info" value="'+res.data+'"><input type="hidden" name="order_sn" id="order_sn" value="'+order_sn+'"></form>';
                	layer.open({
                        type: 1,
                        skin: 'layui-layer-rim', //加上边框
                        title: '<b>订单支付</b>',
                        area: ['400px', ''], //宽高
                        content: content,
                        success:function(layero, index){
                        	layero.delegate(".layui-layer-btn0","keydown",function(event){ 
              				   if (event.keyCode == 13) {
              					 pwd = $('#pay_pwd').val();
                             	pwd = pwd_addMD5(pwd);
                             	$.ajax({
                                     url: "create_order",
                                     data:{'order_sn':order_sn,'pwd':pwd,'goods':res.data,'money':order_fee,'create_carriage':res.create_carriage},
                                     type:'POST',
                                     dataType:'json',
                                     success:function(data){
                                         if(data.state == '403'){
                                             layer.msg(data.msg);
                                             window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                         }else if(data.state == '401'){
                                             layer.msg(data.msg);
                                         }else if(data.state==101){
                                             layer.msg(data.msg);
                                     	}else if(data.state==102){
                                     		layer.msg(data.msg);
                                     	}else if(data.state){
                                     		layer.closeAll();
                                     		layer.msg(data.msg);
                                     		getOrder_lists(1);
                                     	}else{
                                     		layer.msg(data.msg);
                                     	}
                                     }
                                 });
              			        }
              				}); 
                        },
                        btn: ['确定','取消'], //按钮
                        yes:function(index, layero){
                        	pwd = $('#pay_pwd').val();
                        	pwd = pwd_addMD5(pwd);
                        	$.ajax({
                                url: "create_order",
                                data:{'order_sn':order_sn,'pwd':pwd,'goods':res.data,'money':order_fee,'create_carriage':res.create_carriage},
                                type:'POST',
                                dataType:'json',
                                success:function(data){
                                    if(data.state == '403'){
                                        layer.msg(data.msg);
                                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                                    }else if(data.state == '401'){
                                        layer.msg(data.msg);
                                    }else if(data.state==101){
                                        layer.msg(data.msg);
                                	}else if(data.state==102){
                                		layer.msg(data.msg);
                                	}else if(data.state){
                                		layer.closeAll();
                                		layer.msg(data.msg);
                                		getOrder_lists(1);
                                	}else{
                                		layer.msg(data.msg);
                                	}
                                }
                            });
                        },no:function(){}
                        })
                	
                }else{
                	layer.msg(res.msg);
                }
                   // getOrder_lists(1);
                
            }
        });
		//console.log(submitData);
	}
   /*  layer.confirm('确定要生成此订单吗？',function(){
        $.ajax({
            url: "create_order",
            data:{'order_sn':out_order_sn},
            type:'POST',
            dataType:'json',
            beforeSend:function(){
                layer.closeAll();
                layer.msg('生成订单中，请稍候...',{time:0});
            },
            success:function(res){
                layer.closeAll();
                layer.msg(res.msg);
                if(res.state){
                    getOrder_lists(1);
                }
            }
        });
    }); */
}
function cancel_order(order_sn){
	layer.confirm('确定要取消此订单吗？',function(){
        $.ajax({
            url: "cancel_order",
            data:'order_sn='+order_sn.order_sn,
            type:'POST',
            dataType:'json',
            success:function(res){
                if(res.state == '403'){
                    layer.msg(res.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(res.state == '401'){
                    layer.msg(res.msg);
                }else{
                    layer.closeAll();
                    layer.msg(res.msg);
                    if(res.state){
                        getOrder_lists(1);
                    }
                }
            }
        });
    });
}
function hangIt(ueo_id){
    layer.confirm('确定要挂起此订单吗？',function(){
        $.ajax({
            url: "hang_order",
            data:{'ueo_id':ueo_id},
            type:'POST',
            dataType:'json',
            beforeSend:function(){
                layer.closeAll();
                layer.msg('订单挂起中，请稍候...',{time:0});
            },
            success:function(res){
                if(res.state == '403'){
                    layer.msg(res.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(res.state == '401'){
                    layer.msg(res.msg);
                }else {
                    layer.closeAll();
                    layer.msg(res.msg);
                    if (res.state) {
                        getOrder_lists(1);
                    }
                }
            }
        });
    });
}
/*详情*/
function fg_detail(order_sn) {
	window.location.href = 'order_detail?order_sn='+order_sn.order_sn;
    /* layer.closeAll('iframe'); //关闭所有的iframe层
    layer.open({
        type: 2,
        title: '订单详情',
        shadeClose: true,
        shade: false,
        maxmin: true, //开启最大化最小化按钮
        area: ['100%', '100%'],
        content: 'order_detail?order_sn='+order_sn.order_sn
    }); */
}
/*备注*/
function fg_remark(data) {
    if(data.order_status == 10){
    	data.order_status_ = '<span style="color:#f30">未付款</span>';
    }else if(data.order_status == 0){
    	data.order_status_ = '<span style="color:#f30">已取消</span>';
    }else if(data.order_status == 20){
    	//console.log(order.out_order_sn);
        data.order_status_ = '<span style="color:#99CC00">已付款</span>';
    }else if(data.order_status == 30){
    	data.order_status_ = '<span style="color:#00cc40">已发货</span>';
    }else if(data.order_status == 40){
    	data.order_status_ = '<span style="color:#00cc40">已收货</span>';
    }else if(data.order_status == 50){
    	data.order_status_ = '<span style="color:#00cc40">已完成</span>';
    }else{
    	data.order_status_ = '<span style="color:#F00">未知</span>';
    }
    var content = '<div class="pd-10"><form action="" id="remark_form"><input type="hidden" name="order_sn" value="' + data.order_sn + '"><table class="table table-border table-bordered table-bg">' +
            '<tr><td width="50%">订单编号：' + data.order_sn + '</td><td width="50%">订单状态：' + data.order_status_ + '</td></tr></table><table class="table table-border table-bordered table-bg mt-20">' +
            '<tr class="text-c"><td width="15%">标记</td><td width="85%" class="text-l">';
    if (data.seller_flag == '1') {
        
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1" checked=checked><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2"><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3"><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4"><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5"><i class="fa fa-flag" style="color:#B400CB"></i>';
    } else if (data.seller_flag == '2') {
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1"><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2" checked=checked><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3"><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4"><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5"><i class="fa fa-flag" style="color:#B400CB"></i>';
    } else if (data.seller_flag == '3') {
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1" ><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2"><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3" checked=checked ><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4"><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5"><i class="fa fa-flag" style="color:#B400CB"></i>';
    } else if (data.seller_flag == '4') {
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1"><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2"><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3"><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4" checked=checked><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5"><i class="fa fa-flag" style="color:#B400CB"></i>';
    } else if (data.seller_flag == '5') {
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1"><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2"><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3"><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4"><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5" checked=checked><i class="fa fa-flag" style="color:#B400CB"></i>';
    } else {
        content += '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="1"><i class="fa fa-flag" style="color:#CB0A0A"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="2"><i class="fa fa-flag" style="color:#CAC70B"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="3"><i class="fa fa-flag" style="color:#00CB20"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="4"><i class="fa fa-flag" style="color:#0142CB"></i>' +
                '<input type="radio" class="va-m ml-30 mr-10" name="seller_flag" value="5"><i class="fa fa-flag" style="color:#B400CB"></i>';
    }
    content += '<span class="err"></span></td></tr>' +
            '<tr><td width="15%" class="va-m">备注</td><td width="85%"><textarea name="seller_note"  class="pd-5 f-12" style="width:70%;height:100px;" id="" cols="30" rows="10">';
    if (data.seller_note != 'null') {
        content += data.seller_note;
    }
    content += '</textarea><span class="err"></span>' +
            '<div class="f-14" style="color:#999">500字内</div></td></tr></table></form></div>';
    layer.open({
        type: 1,
        title: '<b>添加备注</b>',
        btn: ['确定', '取消'],
        skin: 'layui-layer-rim', //加上边框
        area: ['500px', '380px'], //宽高
        content: content,
        yes: function (index) {
            var value = $("#remark_form").serialize();
            $.ajax({
                type: "post",
                dataType: "json",
                url: "remark_update",
                data: value,
                success: function (data) {
                    layer.msg(data.msg);
                    layer.close(index);
                    if(data.state == '403'){
                        layer.msg(data.msg);
                        window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                    }else if(data.state == '401'){
                        layer.msg(data.msg);
                    }else if (data.state == true) {
                        getOrder_lists(1);
                    }
                }
            });
        }, no: function () {}
    })
}

//同步订单
function sync_a_order(data){
    layer.confirm('是否同步商城编号为: '+data.out_order_sn+' 的订单',function(){
        $.ajax({
            url:"sync_a_order",
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function (xhr) {
                layer.closeAll();
                layer.msg('订单同步中，请稍候...',{time:0});
            },
            success: function (data, textStatus, jqXHR) {
                if(data.state == '403'){
                    layer.msg(data.msg);
                    window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                }else if(data.state == '401'){
                    layer.msg(data.msg);
                }else{
                    layer.closeAll();
                    layer.msg(data.msg);
                    getOrder_lists(1);
                }

            }
        });
    });
}

//同步订单
function sync_order(id){
    var stime = $('input[name="start_time"]').val();
    var etime = $('input[name="end_time"]').val();
    $.ajax({
        type:'post',
        dataType:'json',
        url:'sync_order_by_hand',
        data:{'stime':stime,'etime':etime,},
        beforeSend: function (xhr) {
            layer.msg('订单同步中，请稍候...',{time:0});
        },
        success: function (data) {
            layer.closeAll();
            layer.msg(data.msg);
            if(data.state == '403'){
                layer.msg(data.msg);
                window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
            }else if(data.state == '401'){
                layer.msg(data.msg);
                if(id)quite_queue(id);    //操作完成后删除任务s
            }else if (data.state == true) {
                if(id)quite_queue(id);    //操作完成后删除任务
                getOrder_lists(1);
            }else{
                if(id)quite_queue(id);    //操作完成后删除任务
            }
        },
    })
}
function order_download(){
	
       content = '<form name="order_form" id="order_download"><div class="pd-10"><table class="table table-border table-bordered">' +
	  '<tr class="text-c"><td>外部订单号</td>'+
	  '<td><input type="text" name="out_order_sn" class="input-text input_text ml-10" value="" ><span class="err"></span></td></tr>';
     content += '</table></div></form>';
     layer.open({
		    type: 1,
		    title: '<b>下载订单</b>',
		    skin: 'layui-layer-rim', //加上边框
		    area: ['400px', '200px'], //宽高
		    btn: ['确定','取消'],
		    content: content,
		    yes: function () {
		    	$('#order_download').validate({
                         errorPlacement: function (error, element) {
                             var error_td = element.next('span.err');
                             error_td.append(error);
                         },
                         rules: {
                             
                             "out_order_sn": {required: true},
                         },
                 messages: {
                     
                     "out_order_sn": {required: ''},
                 }
             });
         if($('#order_download').valid()){
                 var data = $("#order_download").serialize();
                 $.ajax({
                     url:"sync_a_order",
                     type: 'POST',
                     data: data,
                     dataType: 'json',
                     beforeSend: function (xhr) {
//                         layer.closeAll();
                         layer.msg('订单同步中，请稍候...',{time:0});
                     },
                     success: function (data, textStatus, jqXHR) {
                         if(data.state == '403'){
                             layer.msg(data.msg);
                             window.top.location.href = "http://[::1]/yunjuke/pay.php/Index/login_out";
                         }else if(data.state == '401'){
                             layer.msg(data.msg);
                         }else{
                             layer.closeAll();
                             layer.msg(data.msg);
                             getOrder_lists(1);
                         }
                     }
                 });
             }
         }, no: function () {}
     })    
}
//同步设置
function sync_order_set(){
	$.ajax({
       url: "sync_setting",
       data:'',
       type:'get',
       dataType:'json',
       success:function(data){
           if(data.state){
        	   var sync_order_state = '';
        	   var sync_order_interval_time = '';
        	   var sync_stocks_state = '';
        	   var sync_amount_state = '';
        	   var sync_amount_interval_time = '';
        	   var sync_stocks_interval_time = '';
        	   var order_create_state = '';
        	   var buyyer_state = '';
        	   var is_seller_note_order_note = '';
        	   var is_COD_order_create = '';
        	   var create_order_filter_setting = '';
        	   var is_order_audit = '';
        	   var is_merge = '';
        	   var is_order_keywords_filter = '';
        	   var order_keywords_setting = '';
        	   var is_seller_filter = '';
        	   var seller_filter_setting = '';
        	   var select1 ='';
        	   var select2 ='';
        	   var select3 ='selected';
        	   if(data.ecs_info){
        		   sync_order_state = data.ecs_info.sync_order_state == '1' ? 'checked' : '';
        		   sync_order_interval_time = data.ecs_info.sync_order_interval_time != null ? data.ecs_info.sync_order_interval_time : '';
        		   sync_stocks_state = data.ecs_info.sync_stocks_state == '1' ? 'checked' : '';
        		   sync_amount_state = data.ecs_info.sync_amount_state == '1' ? 'checked' : '';
        		   sync_amount_interval_time = data.ecs_info.sync_amount_interval_time != null ? data.ecs_info.sync_amount_interval_time : '';
        		   sync_stocks_interval_time = data.ecs_info.sync_stocks_interval_time != null ? data.ecs_info.sync_stocks_interval_time : '';
        		   order_create_state = data.ecs_info.order_create_state == '1' ? 'checked' : '';
        		   buyyer_state = data.ecs_info.buyyer_state == '1' ? 'checked' : '';
        		   is_seller_note_order_note = data.ecs_info.is_seller_note_order_note == '1' ? 'checked' : '';
        		   is_COD_order_create = data.ecs_info.is_COD_order_create == '1' ? 'checked' : '';
        		   create_order_filter_setting = data.ecs_info.create_order_filter_setting != null ? data.ecs_info.create_order_filter_setting : '';
        		   is_order_audit = data.ecs_info.is_order_audit == '1' ? 'checked' : '';
        		   is_merge = data.ecs_info.is_merge == '1' ? 'checked' : '';
        		   is_order_keywords_filter = data.ecs_info.is_order_keywords_filter == '1' ? 'checked' : '';
        		   order_keywords_setting = data.ecs_info.order_keywords_setting != null ? data.ecs_info.order_keywords_setting : '';
        		   is_seller_filter = data.ecs_info.is_seller_filter == '1' ? 'checked' : '';
        		   seller_filter_setting = data.ecs_info.seller_filter_setting != null ? data.ecs_info.seller_filter_setting : '';
        		   select1 = data.ecs_info.seller_filter_order_type == '0' ? 'selected' : '';
        		   select2 = data.ecs_info.seller_filter_order_type == '1' ? 'selected' : '';
        		   select3 = data.ecs_info.seller_filter_order_type == '2' ? 'selected' : '';
        	   }
        	   var content = '<div class="pd-10" style="overflow: auto">'+
        		'<form action="" id="form-setting">'+
        		'<div class="ncap-form-default">'+
        		'<input name="" type="hidden" value="">';
        		if(data.ecs_info){
        			content +='<input name="u_ec_sh_id" type="hidden" value="'+data.ecs_info.u_ec_sh_id+'">';
        		}
        		content +='<dl class="row">'+
        		'<dt class="tit">'+
        	    '<label for=""><input type="checkbox" name="sync_order_state" class="" value="1" '+sync_order_state+'></label>'+
        	    '</dt>'+
        	    '<dd class="opt">'+
        	    '<span class=" va-m lh-30">开启订单同步，每隔</span>'+
        	    '<input  name="sync_order_interval_time" class="w40 text valid ml-5 mr-5" style="border-radius: 0" min="0"  type="number" value="'+sync_order_interval_time+'" >'+
        	    '<span class=" va-m lh-30 mr-10">分钟，自动下载订单</span><span class="err"></span>'+
        	    '</dd>'+
        	    '</dl>'+
//        	    '<dl class="row">'+
//        	    '<dt class="tit">'+
//        	    '<label for=""><input type="checkbox" name="sync_stocks_state" '+sync_stocks_state+' class="" value="1" ></label>'+
//        	    '</dt>'+
//        	    '<dd class="opt">'+
//        	    '<span class="  va-m lh-30">开启商品同步，每隔</span>'+
//        	    '<input  name="sync_stocks_interval_time" value="'+sync_stocks_interval_time+'" class="w40 text valid ml-5 mr-5" style="border-radius: 0" min="0" min="0"  type="number">'+
//        	    '<span class=" va-m lh-30 mr-10">分钟，自动同步商品 </span><span class="err"></span>'+
//        	    '</dd>'+
//        	    '</dl>'+
        	    '<dl class="row">'+
        	    '<dt class="tit">'+
        	    '<label for=""><input type="checkbox" name="sync_amount_state" '+sync_amount_state+' class="" value="1"></label>'+
        	    '</dt>'+
        	    '<dd class="opt">'+
        	    '<span class="  va-m lh-30">开启库存同步，每隔</span>'+
        	    '<input  name="sync_amount_interval_time" value="'+sync_amount_interval_time+'" class="w40 text valid ml-5 mr-5" style="border-radius: 0"  min="0" type="number">'+
        	    '<span class=" va-m lh-30 mr-10">分钟，自动同步库存 </span><span class="err"></span>'+
        	    '</dd>'+
        	    '</dl>'+
        	    /*'<dl class="row">'+
        	    '<dt class="tit">'+
        	    '<label for=""><input type="checkbox" name="order_create_state" '+order_create_state+' class="" value="1"></label>'+
        	    '</dt>'+
        	    '<dd class="opt">'+
        	    '<span class="va-m lh-30">开启订单生成</span><br/>'+
        	    '<div class=" va-m lh-30 ';
        	    if(data.ecs_info && data.ecs_info.order_create_state == '1'){
        	    	content += '';
        	    }else{
        	    	content += 'hide';
        	    }
        	    content +='" style="background-color:rgba(250, 250, 250, 1);border-color:rgba(250, 250, 250);">'+
        	    '<input type="checkbox" name="buyyer_state" '+buyyer_state+' class="va-m ml-10 mr-5" value="1">有买家留言订单不生成'+
        	    '<input type="checkbox" name="is_seller_note_order_note" '+is_seller_note_order_note+' class="va-m ml-30 mr-5" value="1">有卖家备注订单不生成'+
        	    '<input type="checkbox" name="is_COD_order_create" '+is_COD_order_create+' class="va-m ml-30 mr-5" value="1">货到付款订单不生成<br/>'+
        	    //'<input type="checkbox" name="create_order_filter_setting" class="va-m ml-10 mr-5" >'+
        	    '<span class=" va-m lh-30 ml-10">地址包含以下关键字:</span>'+
        	    '<input  name="create_order_filter_setting" value="'+create_order_filter_setting+'" class="text valid ml-5 mr-5" style="border-radius: 0;min_width:40px !important;width:auto;"  type="text" >'+
        	    '<span class=" va-m lh-30 mr-50">不生成，多个用“|”隔开</span><br/>'+
        	    '<input type="checkbox" name="is_merge" '+is_merge+' class="va-m ml-10 mr-5" value="1">姓名+地址+电话相同时，自动合并订单<br/>'+
        	    '<input type="checkbox" name="is_order_audit" '+is_order_audit+' class="va-m ml-10 mr-5" value="1">开启订单生成自动审核'+
        	    '</div>'+
        	    '</dd>'+
        	    '</dl>'+*/
        	    '<dl class="row">'+
        	    '<dt class="tit">'+
        	    '<label for=""><input type="checkbox" name="is_order_keywords_filter" '+is_order_keywords_filter+' class="" value="1"></label>'+
        	    '</dt>'+
        	    '<dd class="opt">'+
        	    '<span class="va-m lh-30">开启订单关键字过滤：</span><br/>'+
        	    '<textarea style="width:83%;height: 65px;" name="order_keywords_setting" class="pd-5 mr-5 mt-10 mb-10 f-l">'+order_keywords_setting+'</textarea><br>'+
        	    '<p class="notic f-l va-m lh-30 mr-60">商品标题包含以下关键字的订单会被下载或排除，多个用“|”隔开。<br/>例如：品牌A|$品牌B，这样设置，品牌A会被下载，品牌B不会被下载，注意$表示排除。</p>'+
        	    '</dd>'+
        	    '</dl>'+
        	    '<dl class="row">'+
        	    '<dt class="tit">'+
        	    '<label for=""><input type="checkbox" name="is_seller_filter" '+is_seller_filter+' class="" value="1"></label>'+
        	    '</dt>'+
        	    '<dd class="opt">'+
        	    '<span class="va-m lh-30">开启卖家备注关键字过滤，<label class="c-red">针对订单类型：<label>'+
        	    '<select name="seller_filter_order_type" class="selecte pd-5 m_w_120 mr-5">'+
        	    '<option value="0" '+select1+'>-全部订单-</option>'+
        	    '<option value="1" '+select2+'>普通订单</option>'+
        	    '<option value="2" '+select3+'>货到付款订单</option>'+
        	    '</select></span><br/>'+
        	    '<textarea style="width:83%;height: 65px;" name="seller_filter_setting" class="pd-5 mr-5 mt-10 mb-10  f-l">'+seller_filter_setting+'</textarea><br>'+
        	    '<p class="notic f-l va-m lh-30 mr-60">包含以下关键字的订单会被下载或排除，多个用“|”隔开,”$“用作排除</p>'+
        	    '</dd>'+
        	    '</dl>';
        		content+='</div></form></div>';
        		layer.open({
        	        type: 1,
        	        title:'同步设置',
        	        skin: 'layui-layer-rim', //加上边框
        	        area: ['680px', '60%'], //宽高
        	        btn: ['确认', '关闭'],
        	        content: content,
        	        success:function(){
        	        	$('input[name="order_create_state"]').click(function(){
        	        		if($(this).attr("checked")){
        	        			$(this).parents().next('.opt').find('div').removeClass('hide');
        	        		}else{
        	        			$(this).parents().next('.opt').find('div').addClass('hide');
        	        			//$(this).parents().next('.opt').find('div').find('input').empty();
        	        			//console.log($(this).parents().next('.opt').find('div').find('input'));
        	        		}
        	        	})
        	        },
        	        yes:function(data){
        	        	 /*表单验证*/
        	            	if($('dd.opt').find('div').hasClass('hide')){
        	            		$('div.hide').find('input').remove();
        	            	}
                                var data = $("#form-setting").serialize();
                                    $.ajax({
                                   url: "sync_setting?op=submit",
                                   data:data,
                                   type:'POST',
                                   dataType:'json',
                                   success:function(res){
                                       layer.closeAll();
                                       layer.msg(res.msg);
                                   }
                               });
        	            
        	        },
        	        no:function(){
        	        }
        	    });
           }else{
        	   layer.msg(data.msg);
           }
       }
   });
}






</script>  
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
