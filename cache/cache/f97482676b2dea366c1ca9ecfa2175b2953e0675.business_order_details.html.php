<?php
/* Smarty version 3.1.29, created on 2017-07-29 14:41:23
  from "D:\www\yunjuke\application\admin\views\business_order_details.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597c2e1312b301_41793394',
  'file_dependency' => 
  array (
    'f97482676b2dea366c1ca9ecfa2175b2953e0675' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\business_order_details.html',
      1 => 1501296195,
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
function content_597c2e1312b301_41793394 ($_smarty_tpl) {
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
<link href="http://[::1]/yunjuke/application/admin/views/css/admin_other.css" rel="stylesheet" type="text/css"/>
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
</style>
<body style="background-color: #FFF; overflow: auto;">

<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>商品订单</h3>
                <h5>商城实物商品交易订单查询及管理</h5>
            </div>
        </div>
    </div>
    <div class="ncap-order-style">
        <div class="titile">
            <h3></h3>
        </div>
        <div class="ncap-order-flow">

            <ol class="num5">
                <li class="current">
                    <h5>生成订单</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time>2017-07-27 21:50:26</time>
                </li>
                <li class="current">
                    <h5>完成付款</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time>2017-07-27 21:50:26</time>
                </li>
<!--                <li class="
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: shipping_time</p>
<p>Filename: templates_c/f97482676b2dea366c1ca9ecfa2175b2953e0675_0.file.business_order_details.html.cache.php</p>
<p>Line Number: 98</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\f97482676b2dea366c1ca9ecfa2175b2953e0675_0.file.business_order_details.html.cache.php<br />
			Line: 98<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\admin\controllers\Business.php<br />
			Line: 265<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\admin.php<br />
			Line: 329<br />
			Function: require_once			</p>

		
	

</div>">
                    <h5>商家发货</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: shipping_time</p>
<p>Filename: templates_c/f97482676b2dea366c1ca9ecfa2175b2953e0675_0.file.business_order_details.html.cache.php</p>
<p>Line Number: 101</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\f97482676b2dea366c1ca9ecfa2175b2953e0675_0.file.business_order_details.html.cache.php<br />
			Line: 101<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\admin\controllers\Business.php<br />
			Line: 265<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\admin.php<br />
			Line: 329<br />
			Function: require_once			</p>

		
	

</div></time>
                </li>-->
                <li class="">
                    <h5>收货确认</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time></time>
                </li>
                <li class="">
                    <h5>完成评价</h5>
                    <time></time>
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
                        <dd class="more">320554507426884066<a href="javascript:;"> 更多</a>
                        	<div class="moreinfo">
                        		<div class="info">
                        			<div class="nav"></div>
                        			                        		</div>
                        	</div>                        </dd>
                        <dt>订单来源：</dt>
                        <dd>电商手工</dd>
                        <dt>下单时间：</dt>
                        <dd>2017-07-27 21:50:26</dd>
                    </dl>
                    <dl>
                        <dt>订单号：</dt>
                        <dd>6066554507394331</dd>
                        
                        <dt>运送方式：</dt>
                        <dd>快递</dd> 
                        <dt>支付时间：</dt>
                        <dd>2017-07-27 21:50:26</dd>
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
                        <dd>13888888888</dd>
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
                        <dd>ABC成都仓</dd>
                        <dt>联系电话：</dt>
                        <dd>18280311211</dd>
                    </dl>
                    <dl>
                        <dt>发货地址：</dt>
                        <dd>浙江省金华市婺城区浙江省 金华市 婺城区 永康街697号东侧二楼</dd>
                        <dt>发货时间：</dt>
                        <dd>2017-07-27 21:53:09</dd>
                    </dl>
                    <dl>
                        <dt>快递公司：</dt>
                        <dd>shunfeng</dd>
                        <dt>物流单号：</dt>
                        <dd>32145664
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
                            <td class="w30"><div class="goods-thumb"><a href="http://[::1]/yunjuke/index.php/goods/goods_details/10382.html" target="_blank"><img alt="" src="http://www.jukeyunduan.com/data/shop/album_pic/"> </a></div></td>
                            <td style="text-align: left;"><a href="http://[::1]/yunjuke/index.php/goods/goods_details/10382.html" target="_blank">ABC KIDS火烈鸟红色组裙子</a><span class="rec"><a target="_blank" href="">[交易快照]</a></span><br></td>
                            <td class="w80">￥179.00</td>
                            <td class="w80">￥179.00</td>
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
                    <h3>订单总额：<strong class="red_common">￥189.00</strong></h3>
                    <h4>(运费：￥10.00)</h4>                    <h3>返点比例：<strong class="red_common">0.00</strong>返点金额：<strong class="red_common">￥0.00</strong></h3>
                    
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
