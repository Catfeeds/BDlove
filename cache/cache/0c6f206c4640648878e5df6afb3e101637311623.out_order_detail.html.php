<?php
/* Smarty version 3.1.29, created on 2017-09-05 14:25:25
  from "D:\www\yunjuke\application\pay\views\out_order_detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59ae43552361c7_14203436',
  'file_dependency' => 
  array (
    '0c6f206c4640648878e5df6afb3e101637311623' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\out_order_detail.html',
      1 => 1501139449,
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
function content_59ae43552361c7_14203436 ($_smarty_tpl) {
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
<link href="http://[::1]/yunjuke/application/pay/views/css/admin_other.css" rel="stylesheet" type="text/css"/>
<style>
	.more{
		position: relative;
	}
	.more a{
		color: #27A9E3;
	}
	.moreinfo{
		position: absolute;
		top: 30px;
		left: 0;
		display: none;
	}
	.info {
   position  :relative;
   width   :250px;
   padding: 10px;
   background :#fff;
   border  :1px solid #ddd;
   border-radius :4px;
  }
  .nav {
   position   :absolute;
   top    :-8px;
   left    :120px;
   overflow   :hidden;
   width    :13px;
   height   :13px;
   background  :#fff;
   border-left  :1px solid #ddd;
  border-top  :1px solid #ddd;
  -webkit-transform :rotate(45deg);
  -moz-transform :rotate(45deg);
  -o-transform  :rotate(45deg);
   transform   :rotate(45deg);
  }
  .ncap-order-flow li i {
    top: 11px;
}
.fa-arrow-circle-right:last-child{
	display: none;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
	<nav class="breadcrumb">
		    <i class="Hui-iconfont">&#xe67f;</i> 订单管理 <span class="c-gray en p-lr">&gt;</span><a href="order_management" style="display: inline-block;color: #333;">订单管理</a><span class="c-gray en p-lr">&gt;</span>订单详情
		    &nbsp;<a href="javascript:;" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
		    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top: 3px;" href="javascript:location.replace(location.href);" title="刷新" >
		        <i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>

<div class="page" style="padding-top: 20px;">

    <div class="ncap-order-style mb-20">
        <div class="titile">
            <h3></h3>
        </div>
        <div class="ncap-order-flow">

            <ol class="num5">
                <li class="current">
                    <h5>生成订单</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time>2017-09-05 11:33:05</time>
                </li>
                <li class="">
                    <h5>完成付款</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time></time>
                </li>
<!--                <li class="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: shipping_time</p>
<p>Filename: templates_c/0c6f206c4640648878e5df6afb3e101637311623_0.file.out_order_detail.html.cache.php</p>
<p>Line Number: 103</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\0c6f206c4640648878e5df6afb3e101637311623_0.file.out_order_detail.html.cache.php<br />
			Line: 103<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\pay\controllers\Order.php<br />
			Line: 1752<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\pay.php<br />
			Line: 331<br />
			Function: require_once			</p>

		
	

</div>">
                    <h5>商家发货</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: shipping_time</p>
<p>Filename: templates_c/0c6f206c4640648878e5df6afb3e101637311623_0.file.out_order_detail.html.cache.php</p>
<p>Line Number: 106</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\0c6f206c4640648878e5df6afb3e101637311623_0.file.out_order_detail.html.cache.php<br />
			Line: 106<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\pay\controllers\Order.php<br />
			Line: 1752<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\pay.php<br />
			Line: 331<br />
			Function: require_once			</p>

		
	

</div></time>
                </li>-->
                <li class="">
                    <h5>收货确认</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time></time>
                </li>
                <li class="">
                    <h5>完成</h5>
                </li>
            </ol>
        </div>

        <div class="ncap-order-details">
            <ul class="tabs-nav">
                <li class="current"><a href="javascript:void(0);">订单详情</a></li>
            </ul>
            <div class="tabs-panels">
                <div class="misc-info">
                    <h4>下单/支付</h4>
                    <dl>
                        <dt>收银单号：</dt>
                        <dd class="more">                        </dd>
                        <dt>订单来源：</dt>
                        <dd>电商手工</dd>
                        <dt>下单时间：</dt>
                        <dd>2017-09-05 11:33:05</dd>
                    </dl>
                    <dl>
                        <dt>订单号：</dt>
                        <dd>6561557926385421</dd>
                        
                        <dt>运送方式：</dt>
                        <dd>快递</dd> 
                        <dt>支付时间：</dt>
                        <dd></dd>
                    </dl>
                    <!-- <dl>
                        <dt>支付日志：</dt>
                        <dd>买家 支付订单</dd>
                    </dl> -->
                </div>
                <div class="addr-note">
                    <h4>购买/收货方信息</h4>
                    <dl>
                        <dt>买家：</dt>
                        <dd>张XX</dd>
                        <dt>联系方式：</dt>
                        <dd>15928234773</dd>
                    </dl>
                    <dl>
                        <dt>收货地址：</dt>
                        <dd>浙江省金华市婺城区浙江省 金华市 婺城区 永康街697号东侧二楼</dd>
                    </dl>
                    <!-- <dl>
                        <dt>发票信息：</dt>
                        <dd>
                            <ul>
                                <li><strong>类型：</strong>普通发票 </li>
                                <li><strong>抬头：</strong>个人</li>
                                <li><strong>内容：</strong>明细</li>
                            </ul>
                        </dd>
                    </dl> -->
                    <dl>
                        <dt>买家留言：</dt>
                        <dd></dd>
                    </dl>
                </div>

                <div class="contact-info">
                    <h4>销售/发货方信息</h4>
                    <dl>
                        <dt>店铺名称：</dt>
                        <dd></dd>
                        <dt>联系电话：</dt>
                        <dd></dd>
                    </dl>
                    <dl>
                        <dt>发货地址：</dt>
                        <dd></dd>
                        <dt>发货时间：</dt>
                        <dd></dd>
                    </dl>
                    <dl>
                        <dt>快递公司：</dt>
                        <dd></dd>
                        <dt>物流单号：</dt>
                        <dd>
                        </dd>
                    </dl>
                </div>


                <div class="goods-info">
                    <h4>商品信息</h4>
                    <table>
                        <thead>
                        <tr>
                            <th colspan="2">商品</th>
                            <th>单价</th>
                            <th>实际支付单价</th>
                            <th>数量</th>
                        </tr>
                        </thead>
                        <tbody>
                                                <tr>
                            <td class="w30"><div class="goods-thumb"><a href="" target="_blank"><img alt="" src="http://www.juketz.com/data/shop/album_pic/1_201708291541515.jpg"> </a></div></td>
                            <td style="text-align: left;"><a href="" target="_blank">monkeyshoes</a><span class="rec"><a target="_blank" href="">[交易快照]</a></span><br></td>
                            <td class="w80">￥123.00</td>
                            <td class="w80">￥123.00</td>
                            <td class="w60">1</td>
                        </tr>
                                                <!-- S 赠品列表 -->
                        <!-- E 赠品列表 -->
                        </tbody>
                        <!-- S 促销信息 -->
                        <!-- E 促销信息 -->
                    </table>
                </div>
                <div class="total-amount">
                    <h3>订单总额：<strong class="red_common">￥123.00</strong></h3>
                    <h4>(运费：￥)</h4>                    <h3>返点比例：<strong class="red_common">0.00</strong>返点金额：<strong class="red_common">￥0.00</strong></h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
<script type="text/javascript">
	
	$("#goback").click(function(){
		window.history.back();
	})
	
	var i=1;
	$(".more a").click(function(){
		$(".moreinfo").toggle();
//		阻止冒泡
		return false;
	})
	$("body").click(function(){
		$(".moreinfo").hide();
	})
	$("img").error(function(){ 
          $(this).attr("src", "http://[::1]/yunjuke/data/images/default_goods_image.jpg"); 
          $(this).attr("data-geo", "<img src='http://[::1]/yunjuke/data/images/default_goods_image.jpg' width=120px>"); 
    }); 
</script>
</html><?php }
}
