<?php
/* Smarty version 3.1.29, created on 2017-06-07 18:43:18
  from "D:\www\yunjuke\application\vmall\views\order_details.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5937d8c6aa4ff3_39805240',
  'file_dependency' => 
  array (
    '134dc410d15fc893fba17ed64a11288ecf97da7e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\order_details.html',
      1 => 1496831098,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5937d8c6aa4ff3_39805240 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>订单详情</title>
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="http://[::1]/yunjuke/application/vmall/views/css/weui1.css">
<link rel="stylesheet" href="http://[::1]/yunjuke/application/vmall/views/css/example.css">
<script src="http://[::1]/yunjuke/application/vmall/views/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/example.js"></script>
<script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			{
				"appId":"''",
				"nonceStr":"''",
				"package":"''",
				"signType":"''",
				"timeStamp":"''",
				"paySign":"''"
				},
			function(res){
				WeixinJSBridge.log(res.err_msg);
				if(res.err_msg == "get_brand_wcpay_request:ok") {   
					//alert('支付成功');
                    window.location.href = '''';
                    //location.href="/default.aspx?n=payment&action=succeed";
                }else if(res.err_msg == "get_brand_wcpay_request:cancel"){
                	alert('支付取消');
                }else{
                	alert('支付失败');
                }  
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>
<style>
	#follow{
		color: red;
	}	
	#follows{
		color: red;
	}	
	.div-content{
		background: #fff;
		margin: 10px 0;
		padding: 10px;
		border-bottom: 0.5px solid #e5e5e5;
		border-top: 0.5px solid #e5e5e5;
	}
	.content-left{
		color: #99999c;
		width: 25%;
		padding: 5px;
		float: left;
	}
	.content-right{
		width: 65%;
		float: left;
		padding: 5px;
	}
	.close-order{
		padding-left: 15px;
	}
	.clear{
		clear:both
	}
	.gods-price{
		float: right;
	}
	.nowpay{
		width: 100%;
		height: 45px;
		text-align: center;
		color: red;
		line-height: 45px;
		background: #fff;
	}
	.apply{
		color: red;font-size: 16px;text-align: right;right: 20px;
	}
	.grade{
		font-size: 15px;
		color: #999;
	}
</style>
</head>

<body ontouchstart>

<div class="weui-tab">
	<div class="weui-tab__panel">
		

 <div class="weui-cells" style="margin-top: 0">
	<div class="weui-cell">
	
	 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: guide_arr</p>
<p>Filename: templates_c/134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php</p>
<p>Line Number: 164</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php<br />
			Line: 164<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Order.php<br />
			Line: 151<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 327<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php</p>
<p>Line Number: 164</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php<br />
			Line: 164<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Order.php<br />
			Line: 151<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 327<br />
			Function: require_once			</p>

		
	

</div>		<div class="weui-cell__hd">
			<img src="http://[::1]/yunjuke/application/vmall/views/images/loimg1.jpg" alt="头像" style="width: 40px;border-radius: 50%;margin-right: 10px; display: block">
		</div>
		 <div class="weui-cell__bd">
			<p>服务顾问：</p>
			<p></p>
		</div>
		<div class="weui-cell__ft">
			<p id="follow">+ 关注</p>
		</div>
		  

	</div>
</div> 

<div class="div-content">
<div class="content-line">
	<div class="content-left">订单类型</div>
	<div class="content-right">线上(微商城)</div>
</div>
<div class="content-line">
	<div class="content-left">订单状态</div>
	<div class="content-right" style="color: red">待发货</div>
</div>
<div class="content-line">
	<div class="content-left">订单编号</div>
	<div class="content-right">4544550093888311</div>
</div>
<div class="content-line">
	<div class="content-left">下单时间</div>
	<div class="content-right">2017-06-06 19:51:28</div>
</div>
<div class="content-line">
	<div class="content-left">支付方式</div>
	<div class="content-right">余额</div>
</div>
<div class="clear"></div>
</div>

<div class="div-content">
<div class="content-line">
	<div class="content-left">配送方式</div>
	<div class="content-right">&nbsp;快递</div>
</div>
<div class="content-line">
	<div class="content-left">收货人</div>
	<div class="content-right">&nbsp;李</div>
</div>
<div class="content-line">
	<div class="content-left">联系电话</div>
	<div class="content-right">&nbsp;18384148955</div>
</div>
<div class="content-line">
	<div class="content-left">收货地址</div>
	<div class="content-right">&nbsp;四川省 成都市 青羊区 口头</div>
</div>
<div class="clear"></div>
</div>

<div class="weui-cells" style="margin-top: 10px;">
<div class="weui-cells__title">商品信息</div>
<div class="weui-cell">
	<div class="weui-cell__hd">
		<img src="http://www.jukeyunduan.com/data/shop/album_pic/1_201705241041112.jpg" alt="" style="width: 40px;margin-right: 10px;">
	</div>
	<div class="weui-cell__bd">
		<p>儿童鞋子</p>
		<p style="color: #99999c">银色/21</p>
	</div>
	<div class="weui-cell__ft">
		<p>￥880.00元</p>
		<p>x1</p>
	</div>
</div>
<div class="weui-cell">
	<div class="weui-cell__bd apply">
	<!--'订单状态：0(已取消)10(默认):未付款;20:已付款;30:已发货;40:已收货;'  -->
	   
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: order_status</p>
<p>Filename: templates_c/134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php</p>
<p>Line Number: 297</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php<br />
			Line: 297<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Order.php<br />
			Line: 151<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 327<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: order_status</p>
<p>Filename: templates_c/134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php</p>
<p>Line Number: 299</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php<br />
			Line: 299<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Order.php<br />
			Line: 151<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 327<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: order_status</p>
<p>Filename: templates_c/134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php</p>
<p>Line Number: 299</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php<br />
			Line: 299<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Order.php<br />
			Line: 151<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 327<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: order_status</p>
<p>Filename: templates_c/134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php</p>
<p>Line Number: 301</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\134dc410d15fc893fba17ed64a11288ecf97da7e_0.file.order_details.html.cache.php<br />
			Line: 301<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Order.php<br />
			Line: 151<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 327<br />
			Function: require_once			</p>

		
	

</div>	</div>
</div>

<div class="div-content" style="margin-bottom: 20px;">
	<div class="gods-price">商品总价：￥880.00元</div>
	<div class="clear"></div>
	<div class="gods-price">运费：￥20.00元</div>
	<div class="clear"></div>
	<div class="gods-price">会员折扣：-￥2.00元</div>
	<div class="clear"></div>
	<div class="gods-price grade">会员等级：黄金会员</div>
	<div class="clear"></div>
	<div class="gods-price" style="color: red">实付总额：￥880.00元</div>
	<div class="clear"></div>
</div>
</div>
</div>	

<div class="js_dialog" id="iosDialog1" style="display: none;">
	<div class="weui-mask cancel1"></div>
	<div class="weui-dialog">
		<div class="weui-dialog__hd">
			<strong class="weui-dialog__title">请输入关闭理由</strong>
		</div>
		<div class="weui-dialog__bd">
			<textarea name="reason" rows="3" class="weui-textarea" placeholder="请输入"></textarea>
		</div>
		<div class="weui-dialog__ft">
			<a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_default cancel1">取消</a>
			<a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_primary" id="submit">确定</a>
		</div>
	</div>
</div>

<div class="js_dialog" id="iosDialog2" style="display: none;">
	<div class="weui-mask cancel2"></div>
	<div class="weui-dialog">
		
		<div class="weui-dialog__bd">
		  		            对不起，该导购或已离职！
		  		</div>
	</div>
</div>


</body>
<script>
	$(".cancel1").click(function(){
		$("#iosDialog1").css("display","none");
	})
	$(".close-order").click(function(){
		$("#iosDialog1").css("display","block");
	})
	
	$("#follow").click(function(){
		$("#iosDialog2").css("display","block");
	})
	$(".cancel2").click(function(){
		$("#iosDialog2").css("display","none");
	})
	$(".guide_info").click(function(){
		var  ids="''" 
		window.location.href="http://[::1]/yunjuke/vmall.php/Store/shopping_guide_chat?spg_id="+ids; 
	})
	
	
</script>
</html>
<?php }
}
