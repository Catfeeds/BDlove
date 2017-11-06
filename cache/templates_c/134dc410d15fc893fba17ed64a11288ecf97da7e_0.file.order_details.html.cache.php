<?php
/* Smarty version 3.1.29, created on 2017-06-07 18:43:18
  from "D:\www\yunjuke\application\vmall\views\order_details.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5937d8c6a33b58_49353029',
  'file_dependency' => 
  array (
    '134dc410d15fc893fba17ed64a11288ecf97da7e' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\order_details.html',
      1 => 1496831098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5937d8c6a33b58_49353029 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '168625937d8c67b6f48_04340927';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>订单详情</title>
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/weui1.css">
<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/example.css">
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/jquery-2.1.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/example.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			{
				"appId":"<?php if (isset($_smarty_tpl->tpl_vars['jsApiParameters']->value['appId'])) {
echo $_smarty_tpl->tpl_vars['jsApiParameters']->value['appId'];
} else { ?>''<?php }?>",
				"nonceStr":"<?php if (isset($_smarty_tpl->tpl_vars['jsApiParameters']->value['nonceStr'])) {
echo $_smarty_tpl->tpl_vars['jsApiParameters']->value['nonceStr'];
} else { ?>''<?php }?>",
				"package":"<?php if (isset($_smarty_tpl->tpl_vars['jsApiParameters']->value['package'])) {
echo $_smarty_tpl->tpl_vars['jsApiParameters']->value['package'];
} else { ?>''<?php }?>",
				"signType":"<?php if (isset($_smarty_tpl->tpl_vars['jsApiParameters']->value['signType'])) {
echo $_smarty_tpl->tpl_vars['jsApiParameters']->value['signType'];
} else { ?>''<?php }?>",
				"timeStamp":"<?php if (isset($_smarty_tpl->tpl_vars['jsApiParameters']->value['timeStamp'])) {
echo $_smarty_tpl->tpl_vars['jsApiParameters']->value['timeStamp'];
} else { ?>''<?php }?>",
				"paySign":"<?php if (isset($_smarty_tpl->tpl_vars['jsApiParameters']->value['paySign'])) {
echo $_smarty_tpl->tpl_vars['jsApiParameters']->value['paySign'];
} else { ?>''<?php }?>"
				},
			function(res){
				WeixinJSBridge.log(res.err_msg);
				if(res.err_msg == "get_brand_wcpay_request:ok") {   
					//alert('支付成功');
                    window.location.href = '<?php if (isset($_smarty_tpl->tpl_vars['orderSuccess']->value)) {
echo $_smarty_tpl->tpl_vars['orderSuccess']->value;
} else { ?>''<?php }?>';
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
	<?php echo '</script'; ?>
>
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
	
	 <?php if ($_smarty_tpl->tpl_vars['guide_arr']->value['result'] == "false") {?>
		 <div class="weui-cell__hd">
			<img src="<?php echo TEMPLE;?>
images/loimg1.jpg" alt="头像" style="width: 40px;border-radius: 50%;margin-right: 10px; display: block">
		</div>
		 <div class="weui-cell__bd">
			<p>暂无专属导购：</p>
			<p></p>
		</div>
		<div class="weui-cell__ft">
			<p id="follows" class="guide_info">+联系导购</p>
		</div>
	<?php } else { ?>
		<div class="weui-cell__hd">
			<img src="<?php if (!empty($_smarty_tpl->tpl_vars['guide_arr']->value['guide_info']['head_portrait'])) {
echo base_url();
echo $_smarty_tpl->tpl_vars['guide_arr']->value['guide_info']['head_portrait'];
} else {
echo TEMPLE;?>
images/loimg1.jpg<?php }?>" alt="头像" style="width: 40px;border-radius: 50%;margin-right: 10px; display: block">
		</div>
		 <div class="weui-cell__bd">
			<p>服务顾问：<?php if (!empty($_smarty_tpl->tpl_vars['guide_arr']->value['guide_info']['spg_nike_name'])) {
echo $_smarty_tpl->tpl_vars['guide_arr']->value['guide_info']['spg_nike_name'];
}?></p>
			<p><?php if (!empty($_smarty_tpl->tpl_vars['guide_arr']->value['guide_info']['spg_tel'])) {
echo $_smarty_tpl->tpl_vars['guide_arr']->value['guide_info']['spg_tel'];
}?></p>
		</div>
		<div class="weui-cell__ft">
			<p id="follow">+ 关注</p>
		</div>
	<?php }?>	  

	</div>
</div> 

<div class="div-content">
<div class="content-line">
	<div class="content-left">订单类型</div>
	<div class="content-right"><?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['order_type'];?>
</div>
</div>
<div class="content-line">
	<div class="content-left">订单状态</div>
	<div class="content-right" style="color: red"><?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['order_status'];?>
</div>
</div>
<div class="content-line">
	<div class="content-left">订单编号</div>
	<div class="content-right"><?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['order_sn'];?>
</div>
</div>
<div class="content-line">
	<div class="content-left">下单时间</div>
	<div class="content-right"><?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['order_time'];?>
</div>
</div>
<div class="content-line">
	<div class="content-left">支付方式</div>
	<div class="content-right"><?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['pay_type'];?>
</div>
</div>
<div class="clear"></div>
</div>

<div class="div-content">
<div class="content-line">
	<div class="content-left">配送方式</div>
	<div class="content-right">&nbsp;<?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['shipping_type'];?>
</div>
</div>
<div class="content-line">
	<div class="content-left">收货人</div>
	<div class="content-right">&nbsp;<?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['receive_name'];?>
</div>
</div>
<div class="content-line">
	<div class="content-left">联系电话</div>
	<div class="content-right">&nbsp;<?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['receive_mobile'];?>
</div>
</div>
<div class="content-line">
	<div class="content-left">收货地址</div>
	<div class="content-right">&nbsp;<?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['receive_addr'];?>
</div>
</div>
<div class="clear"></div>
</div>

<div class="weui-cells" style="margin-top: 10px;">
<div class="weui-cells__title">商品信息</div>
<?php
$_from = $_smarty_tpl->tpl_vars['orderInfo']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_good_0_saved_item = isset($_smarty_tpl->tpl_vars['good']) ? $_smarty_tpl->tpl_vars['good'] : false;
$_smarty_tpl->tpl_vars['good'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['good']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['good']->value) {
$_smarty_tpl->tpl_vars['good']->_loop = true;
$__foreach_good_0_saved_local_item = $_smarty_tpl->tpl_vars['good'];
?>
<div class="weui-cell">
	<div class="weui-cell__hd">
		<img src="<?php echo $_smarty_tpl->tpl_vars['good']->value['goods_image'];?>
" alt="" style="width: 40px;margin-right: 10px;">
	</div>
	<div class="weui-cell__bd">
		<p><?php echo $_smarty_tpl->tpl_vars['good']->value['goods_name'];?>
</p>
		<p style="color: #99999c"><?php echo $_smarty_tpl->tpl_vars['good']->value['goods_color'];?>
/<?php echo $_smarty_tpl->tpl_vars['good']->value['goods_size'];?>
</p>
	</div>
	<div class="weui-cell__ft">
		<p>￥<?php echo $_smarty_tpl->tpl_vars['good']->value['goods_price'];?>
元</p>
		<p>x<?php echo $_smarty_tpl->tpl_vars['good']->value['goods_num'];?>
</p>
	</div>
</div>
<?php
$_smarty_tpl->tpl_vars['good'] = $__foreach_good_0_saved_local_item;
}
if ($__foreach_good_0_saved_item) {
$_smarty_tpl->tpl_vars['good'] = $__foreach_good_0_saved_item;
}
?>
<div class="weui-cell">
	<div class="weui-cell__bd apply">
	<!--'订单状态：0(已取消)10(默认):未付款;20:已付款;30:已发货;40:已收货;'  -->
	   <?php if ($_smarty_tpl->tpl_vars['orderInfo']->value['order_status'] == 10) {?>
		<a href="javascript" style="color: red;">立即支付</a><a href="javascript" style="color: red;">取消订单</a>
	   <?php } elseif ($_smarty_tpl->tpl_vars['orderInfo']->value['order_status'] == 20 || $_smarty_tpl->tpl_vars['orderInfo']->value['order_status'] == 30) {?>
	    <a href="javascript" style="color: red;">确认收货</a><a href="javascript" style="color: red;">再次购买</a><a href="javascript" style="color: red;">申请退款</a>
	   <?php } elseif ($_smarty_tpl->tpl_vars['orderInfo']->value['order_status'] == 40) {?>
	     <a href="javascript" style="color: red;">评价晒单</a><a href="javascript" style="color: red;">再次购买</a>
	   <?php }?>
	</div>
</div>

<div class="div-content" style="margin-bottom: 20px;">
	<div class="gods-price">商品总价：￥<?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['goods_money'];?>
元</div>
	<div class="clear"></div>
	<div class="gods-price">运费：￥20.00元</div>
	<div class="clear"></div>
	<div class="gods-price">会员折扣：-￥2.00元</div>
	<div class="clear"></div>
	<div class="gods-price grade">会员等级：黄金会员</div>
	<div class="clear"></div>
	<div class="gods-price" style="color: red">实付总额：￥<?php echo $_smarty_tpl->tpl_vars['reciveInfo']->value['pay_money'];?>
元</div>
	<div class="clear"></div>
</div>
</div>
<?php if ($_smarty_tpl->tpl_vars['orderInfo']->value[0]['order_status'] == 10) {?>
<div class="weui-tabbar">
	<p class="nowpay" onclick="callpay()">立即支付</p>
</div>
<?php }?>
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
		  <?php if (empty($_smarty_tpl->tpl_vars['guide_arr']->value['guide_info']['spg_ewm'])) {?>
		            对不起，该导购或已离职！
		  <?php } else { ?>
			<div style="width: 80%;margin: 0 auto"><img src="<?php echo $_smarty_tpl->tpl_vars['guide_arr']->value['guide_info']['spg_ewm'];?>
" alt="wei-log" style="max-width: 100%;height: auto"></div>
			<p style="color: #99999c">长按二维码关注</p>
			<?php }?>
		</div>
	</div>
</div>


</body>
<?php echo '<script'; ?>
>
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
		var  ids="<?php if (!empty($_smarty_tpl->tpl_vars['guide_arr']->value['guides_infos']['spg_id'])) {
echo $_smarty_tpl->tpl_vars['guide_arr']->value['guides_infos']['spg_id'];
} else { ?>''<?php }?>" 
		window.location.href="<?php echo base_url();?>
vmall.php/Store/shopping_guide_chat?spg_id="+ids; 
	})
	
	
<?php echo '</script'; ?>
>
</html>
<?php }
}
