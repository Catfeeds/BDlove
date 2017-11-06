<?php
/* Smarty version 3.1.29, created on 2017-10-17 11:16:52
  from "D:\www\yunjuke\application\vmall\views\order_confirm_since.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e576246c02a8_02555663',
  'file_dependency' => 
  array (
    'f716ffdb00bebfece69b597dff66da8c4d61e2c1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\order_confirm_since.html',
      1 => 1508210178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink.html' => 1,
  ),
),false)) {
function content_59e576246c02a8_02555663 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3246659e576243745d2_06635486';
?>
<html lang="zh-cn" style="opacity: 1; font-size: 200px;" class="view6s"><head>
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<head>
		<title>确认订单</title>
		<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/weui1.css">
		<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/example.css">
		<link rel="stylesheet" href="<?php echo TEMPLE;?>
css/LArea.css">
	</head>
<style>
	#show-edit{
		color: red;
		line-height: 50px;
	}
	.paySubmit{background:#f44336;color: #fff;}
	.cancelSubmit{background:#ccc;}
	.addres{
		color: #979797;
	}
	.weui-tabbar{
		z-index: inherit;
	}
	.weui-cells:before{z-index:0}
	.weui-cell:before{z-index:0}
	.weui-cells:after{z-index:0}

	.content{
		padding:.13rem;
	}
	.money{
		background: url("<?php echo TEMPLE;?>
images/coupon_money.png");
		height:.84rem;
		background-size: 100% 100%;
		color: #fff7bb;
		position: relative;
		margin-bottom: .05rem;

	}
	.reduce{
		background: url("<?php echo TEMPLE;?>
images/coupon_reduce.png");
		height:.84rem;
		background-size: 100% 100%;
		color: #fff7bb;
		position: relative;
		margin-bottom: .05rem;
	}
	.sale{
		background: url("<?php echo TEMPLE;?>
images/coupon_sale.png");
		width:100%;
		height:.84rem;
		background-size: 100% 100%;
		color: #fff7bb;
		position: relative;
		margin-bottom: .05rem;
	}
	.store_name{
		margin-left:.1rem;
		font-size: .12rem;
		padding-top:.05rem;
	}
	.coupon_text{
		text-align: center;
		font-size: .14rem;
	}
	.coupon_text span{
		font-size: .24rem;
	}
	.coupon_bottom{
		height:.18rem;
		display: flex;
		width:100%;
		justify-content: space-between;
		align-items: center;
		position: absolute;
		bottom: 0.07rem;
	}
	.coupon_time{
		font-weight: 200;
		font-size: .105rem;
		margin-left:.1rem;
	}
	.coupon_bottom a{
		color: #fff7bb;
		margin-right:.1rem;
	}
	.goods_img{
		width:.32rem;
		height:.32rem;
		border-radius: 50%;
		margin-bottom: .1rem;
		margin-left: .15rem;
	}
	#coup .weui-icon-checked:before{
		color: #fff!important;
		font-size: 14px!important;
		background: #ff5600;
		border-radius: 50%;
		width: .18rem;
		height: .18rem;
		text-align: center;
		line-height: .18rem;
	}
	#coup .weui-cell__ft{
		position: absolute;
		top:.41rem;
		right:.38rem;
	}
	.rad{
		position: absolute;
		top:.41rem;
		right:.41rem;
		border-radius: 50%;
		width: .16rem;
		height: .16rem;
		border:1px solid #fff;
	}
	.sure_confirm{
		position: absolute;
		bottom: 0;
		width:100%;
		height:.5rem;
		background:#ff5001;
		color: #fff;
		line-height: .5rem;
		font-size: .16rem;
		text-align: center;
	}
	.no_use .weui-cell__ft{
		top:.1rem!important;
	}
	#coup .weui-picker__bd{
		height:2.7rem;
		margin-bottom: .4rem;
	}
	.weui-picker__bd .weui-picker__hd:after{
		border:none;
	}
	.weui-picker__bd .weui-cells{
		margin-top: 0;
	}
	.weui-picker__bd .weui-cells:before{
		border:none;
	}
	.mask{
		position: fixed;
		top:0;
		left:0;
		right:0;
		bottom: 0;
		background: #000;
		opacity: .5;
		z-index: 9999;
	}
	.icc.weui-cells:after,.icc.weui-cells:before{
		border:none;
	}
	.showPicker{
		padding:0 .1rem;
		margin:0 .2rem .15rem .6rem;
		color:#53bded!important;
		font-size: .15rem;
		background:#f1f2f6;
	}
</style>
<body ontouchstart>
<form method="post" action="post_order" id="formSubmit">
<input type="hidden" name="goods" id="postGoods" value=""/>
<input type="hidden" name="shipType" id="shipType" value="2"/>
 <input type="hidden" name="coupon_source" id="coupon_source" value="<?php echo $_smarty_tpl->tpl_vars['coupon_source']->value;?>
"/>
<input type="hidden" name="orderPostCode" id="orderPostCode" value="<?php echo $_smarty_tpl->tpl_vars['orderPostCode']->value;?>
"/>
<div class="weui-tab">
	<div class="weui-tab__panel">
	<div class="weui-cells goods-cells">
	   <?php
$_from = $_smarty_tpl->tpl_vars['goods']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>

            <div class="weui-cells goods-cells">
                <input type="hidden" class="goods_coupon_id" name="goods_coupon[<?php echo $_smarty_tpl->tpl_vars['v']->value['ssa_id'];?>
]"  value=""/>
                <input type="hidden" class="goods_pay_price" name="goods_pay_price[<?php echo $_smarty_tpl->tpl_vars['v']->value['ssa_id'];?>
]"  value=""/>
                <input type="hidden" class="goods_coupon_amount" name="coupon_amount[<?php echo $_smarty_tpl->tpl_vars['v']->value['ssa_id'];?>
]"  value=""/>
                <input type="hidden" class="promotions_id" name="promotions_id[<?php echo $_smarty_tpl->tpl_vars['v']->value['ssa_id'];?>
]"  value=""/>
                <input type="hidden" class="activity_type" name="activity_type[<?php echo $_smarty_tpl->tpl_vars['v']->value['ssa_id'];?>
]"  value=""/>
                <input type="hidden" class="user_coupon_id" name="user_coupon_id[<?php echo $_smarty_tpl->tpl_vars['v']->value['ssa_id'];?>
]"  value=""/>
                <input type="hidden" class="coupon_list" name="coupon_list[<?php echo $_smarty_tpl->tpl_vars['v']->value['ssa_id'];?>
]"  value=""/>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_img'];?>
"  onerror="javascript:this.src='<?php echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['goods_image'];?>
'" alt="mygoods" style="width: 40px;margin-right: 5px;display: block;">
                    </div>
                    <div class="weui-cell__bd">
                        <p><?php echo $_smarty_tpl->tpl_vars['v']->value['goods_name'];?>
</p>
                        <p style="color: #8A8586;"><?php if (!empty($_smarty_tpl->tpl_vars['v']->value['goods_size_remark'])) {
echo $_smarty_tpl->tpl_vars['v']->value['goods_size_remark'];
} else {
echo $_smarty_tpl->tpl_vars['v']->value['goods_spec'];
}?>/<?php if (!empty($_smarty_tpl->tpl_vars['v']->value['goods_color_remark'])) {
echo $_smarty_tpl->tpl_vars['v']->value['goods_color_remark'];
} else {
echo $_smarty_tpl->tpl_vars['v']->value['goods_color'];
}?></p>
                    </div>
                    <div class="weui-cell__ft">
                        <p>￥<?php echo $_smarty_tpl->tpl_vars['v']->value['stocks_price'];?>
</p>
                        <p>x<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_num'];?>
</p>
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['coupon_source']->value == 'micro') {?>
                
                <?php } elseif ($_smarty_tpl->tpl_vars['coupon_source']->value == 'coupon') {?>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['coupon_state'] == 1 && !empty($_smarty_tpl->tpl_vars['v']->value['coupon_list'])) {?>
                <div class="weui-cells icc" style="margin-top: 0;">
                    <a class="weui-cell weui-cell_access showPicker" href="javascript:;" >
                        <div class="weui-cell__bd weui-cell__primary">
                            <p class="choose">有优惠劵可用：点击选择</p>
                        </div>
                        <div class="weui-cell__ft">
                        </div>
                    </a>
                </div>
                <?php }?>
                <?php }?>
                <!--优惠方式弹出选择框-->
                <div class="weui-picker weui-animate-slide-up coupon" id="coup" style="display:none;z-index: 99999999!important;">
                    <div class="weui-picker__hd" style="font-size: .14rem;justify-content: center">
                        <!--<a href="javascript:;" data-action="acncel" class="weui-picker__action couponcancel" >取消</a>-->
                        <!--<a href="javascript:;" data-action="select" class="weui-picker__action weui-picker-confirm" >确定</a>-->
						店铺优惠
                    </div>
                    <div class="weui-picker__bd">
                        <div class="weui-cells weui-cells_radio" style="overflow-y: scroll;width: 100%;">
                           <?php if (empty($_smarty_tpl->tpl_vars['v']->value['coupon_list'])) {?>
                            <p class="none_coupons" style="width: 100%;text-align:center;">暂无优惠劵可用</p>
                           <?php } else { ?>
                           
                            <?php
$_from = $_smarty_tpl->tpl_vars['v']->value['coupon_list'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vv_1_saved_item = isset($_smarty_tpl->tpl_vars['vv']) ? $_smarty_tpl->tpl_vars['vv'] : false;
$_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['vv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->value) {
$_smarty_tpl->tpl_vars['vv']->_loop = true;
$__foreach_vv_1_saved_local_item = $_smarty_tpl->tpl_vars['vv'];
?>
                            
                            <label for="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_ea_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['vv']->value['user_coupon_id'];?>
" class="weui-cell weui-check__label <?php echo $_smarty_tpl->tpl_vars['v']->value['goods_ea_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['vv']->value['user_coupon_id'];?>
">
                                <input type="hidden" class="coupon_id" name="coupon_id"  value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_id'];?>
"/>
                                <input type="hidden" class="c_activity_id" name="c_activity_id"  value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_activity_id'];?>
"/>
                                <input type="hidden" class="c_activity_type" name="c_activity_id"  value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_activity_type'];?>
"/>
                                <input type="hidden" class="user_coupon_id" name="user_coupon_id"  value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['user_coupon_id'];?>
"/>
                                <input type="hidden" class="user_coupon_list" name="user_coupon_list"  value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_list'];?>
"/>
                                <div class="sale">
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['vv']->value['coupon_discount'] != 'null') {?><input class="prize_type" type="hidden" value="1"><?php } else { ?><input class="prize_type" type="hidden" value="2"><?php }?>
                                    <div class="store_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['storeName'];?>
</div>
                                    <p class="coupon_text"><span class="text_money"><?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_name'];?>
</span> <img class="goods_img" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_img'];?>
" alt=""><span class="num">剩余<span class="num_txt_<?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_num'];?>
</span>张</span>
                                    </p>
                                    <div class="coupon_bottom">
                                        <p class="coupon_time">有效期：<?php echo $_smarty_tpl->tpl_vars['vv']->value['start_time'];?>
-<?php echo $_smarty_tpl->tpl_vars['vv']->value['end_time'];?>
</p>
                                    </div>
                                </div>
								<div class="rad"></div>
                                <!--<p><?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_discount']*10;?>
折优惠券&nbsp;&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;&nbsp;&nbsp;<?php echo count($_smarty_tpl->tpl_vars['v']->value);?>
</p>-->
                                <div class="weui-cell__ft">
                                    <?php if ($_smarty_tpl->tpl_vars['vv']->value['coupon_discount'] != 'null') {?><input type="radio" class="weui-check" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_ea_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['vv']->value['user_coupon_id'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_ea_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_discount'];?>
"/><?php } else { ?><input type="radio" class="weui-check" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_ea_id'];?>
_<?php echo $_smarty_tpl->tpl_vars['vv']->value['user_coupon_id'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_ea_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_denomination'];?>
"/><?php }?>
                                    <span class="weui-icon-checked"></span>
                                    <span class="label_remove" style="display:none"><?php echo $_smarty_tpl->tpl_vars['vv']->value['user_coupon_id'];?>
</span>
                                </div>
                            </label>
                            
                            <?php
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_1_saved_local_item;
}
if ($__foreach_vv_1_saved_item) {
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_1_saved_item;
}
?>
                            <label for="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_ea_id'];?>
_0" class="weui-cell weui-check__label no_use">
                                <input type="hidden" class="coupon_id" name="coupon_id"  value=""/>
                                <input type="hidden" class="c_activity_id" name="c_activity_id"  value=""/>
                                <input type="hidden" class="c_activity_type" name="c_activity_id"  value=""/>
                                <input type="hidden" class="user_coupon_id" name="user_coupon_id"  value=""/>

                                    <input class="prize_type" type="hidden" value="">
                                    <div class="store_name"></div>
                                    <p class="coupon_text"><a class="text_money">不使用优惠券</a></p>
									<div class="rad" style="top: .1rem;border: 1px solid #a0a7b1;right: .41rem;"></div>
                                <!--<p><?php echo $_smarty_tpl->tpl_vars['vv']->value['coupon_discount']*10;?>
折优惠券&nbsp;&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;&nbsp;&nbsp;<?php echo count($_smarty_tpl->tpl_vars['v']->value);?>
</p>-->
                                <div class="weui-cell__ft">
                                    <input type="radio" class="weui-check" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_ea_id'];?>
_0" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_ea_id'];?>
" value=""/>
                                    <span class="weui-icon-checked"></span>
                                    <span class="label_remove" style="display:none"></span>
                                </div>
                            </label>
                            <?php }?>
                        </div>
                    </div>
					<div class="sure_confirm weui-picker-confirm">确定</div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <p>数量：<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_num'];?>
</p>
                    </div>
                    <div class="weui-cell__ft">
                        <p style="color: red"  price="108.00" >金额：￥<span class="single_price_show"><?php echo $_smarty_tpl->tpl_vars['v']->value['goods_price'];?>
</span><span class="single_price" style="display:none"><?php echo $_smarty_tpl->tpl_vars['v']->value['goods_price'];?>
</span></p>
                    </div>
                </div>
            </div>
            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
	
	<div class="weui-cells weui-cells_radio">
		<label class="weui-cell weui-check__label" for="x1">
			<div class="weui-cell__hd">
    			<img src="<?php echo TEMPLE;?>
images/wechat.png" alt="mygoods" style="width: 20px;margin-right: 5px;display: block;">
    		</div>
			<div class="weui-cell__bd">
				<p>微信支付</p>
			</div>
			<div class="weui-cell__ft">
				<input type="radio" class="weui-check" checked name="radio1" value="1" id="x1">
				<span class="weui-icon-checked"></span>
			</div>
		</label>
		<label class="weui-cell weui-check__label" for="x2">
			<div class="weui-cell__hd">
    			<img src="<?php echo TEMPLE;?>
images/alipay.png" alt="mygoods" style="width: 20px;margin-right: 5px;display: block;">
    		</div>
			<div class="weui-cell__bd">
				<p>支付宝支付(暂不支持)</p>
			</div>
			<div class="weui-cell__ft">
				<input type="radio" class="weui-check" name="radio1" value="2" id="x2">
				<span class="weui-icon-checked"></span>
			</div>
		</label>
		<label class="weui-cell weui-check__label" for="x3">
			<div class="weui-cell__hd">
    			<img src="<?php echo PLUGIN;?>
" alt="mygoods" style="width: 20px;margin-right: 5px;display: none;">
    		</div>
			<div class="weui-cell__bd">
				<p>余额支付</p>
			</div>
			<div class="weui-cell__ft">
				<input type="radio" class="weui-check" name="radio1" value="3" id="x3">
				<span class="weui-icon-checked"></span>
			</div>
		</label>
	</div>

	
	<div class="weui-cells weui-cells_form">
		<div class="weui-cell">
			<div class="weui-cell__hd">
				<label class="weui-label">订单备注</label>
			</div>
			<div class="weui-cell__bd">
				<input type="text" name="note" class="weui-input" placeholder="请填写您的特别需求">
			</div>
		</div>
	</div>
	
		<div class="weui-cells weui-cells_form">
		<div class="weui-cell">
			<div class="weui-cell__hd">
				<label class="weui-label">运费</label>
			</div>
			<div class="weui-cell__bd" style="color: red">
				￥0.00元
			</div>
		</div>
		<div class="weui-cell">
			<div class="weui-cell__hd">
				<label class="weui-label">会员折扣</label>
			</div>
			<div class="weui-cell__bd" style="color: red">
				-￥0.00元
			</div>
		</div>
	</div>
	
	</div>
</div>
	<div class="weui-tabbar">
		<div style="height: 50px;width: 100%;">
			<div style="width: 70%;float: left;line-height: 50px;padding-left: 3%;">共需支付：&nbsp;&nbsp;&nbsp;<span style="color: red"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
元</span></div>
			<div id="paySubmit" class="paySubmit" style="width: 27%;float: left;line-height: 50px;text-align: center;">确认支付</div>
		</div>
	</div>

</form>

<!--选择收货人picker-->

<div id="choice" style="display: none">
<div class="weui-mask weui-animate-fade-in"></div>
	<div class="weui-picker weui-animate-slide-up">
	
		<div class="weui-picker__hd">
			<a href="javascript:;" class="weui-picker__action"></a>
<!--			<p id="show-edits">编辑收货人</p>-->
			<p id="show-edits">选择收货人</p>
			<a href="javascript:;" class="weui-picker__action" id="choice-cancel" style="color: red">取消</a>
		</div>
	
<!--
		<div class="weui-picker__bd">
			
		</div>
-->
		<div class="weui-picker__bd" id="choicepeople">
			
			
			<div class="weui-cells weui-cells_checkbox" style="width: 100%;">
				<label class="weui-cell weui-check__label" for="people">
					<div class="weui-cell__hd">
						<input type="checkbox" class="weui-check" id="people">
						<i class="weui-icon-checked"></i>
					</div>
					<div class="weui-cell__bd">
						<p>小小神 13183881016</p>	
					<p class="addres">成都市金牛区金泉路5号</p>
					</div>
					<div class="weui-cell__ft"><img src="<?php echo TEMPLE;?>
images/write.png" alt="" style="width: 30px;height: 30px;"></div>
				</label>
				<div class="weui-cell">
					<a href="javascript:;" class="weui-picker__action"></a>
					<p id="show-edit">新增地址</p>
					<a href="javascript:;" class="weui-picker__action"></a>
				</div>
			</div>
		</div>
	</div>
	
</div>

<!--编辑收货人picker-->
<div class="mask" style="display: none"></div>
<div id="edit" style="display: none">
<div class="weui-mask weui-animate-fade-in"></div>
	<div class="weui-picker weui-animate-slide-up  weui-picker_main">
		<div class="weui-picker__hd" id="weui-picker_son">
			<a href="javascript:;" class="weui-picker__action"></a>
			<p>编辑收货人</p>
			<a href="javascript:;" class="weui-picker__action" id="edit-cancel" style="color: red">取消</a>
		</div>
		
		
	</div>
	
</div>
<div id="toast" style="opacity: 0; display: none;">
        <div class="weui-mask_transparent"></div>
        <div class="weui-toast">
            <i class="weui-icon-success-no-circle weui-icon_toast"></i>
            <p class="weui-toast__content">已完成</p>
        </div>
    </div>
</body>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/framework7.picker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/base.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/LArea.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>

//弹出优惠券方法
$('.showPicker').on('click', function () {
//    num_high=$(this).parents('.weui-cells').find('.'+label_remove).find('.num_txt').html();
    num_array=$('.weui-check:checked').parents('.weui-check__label').find('.num_txt').html();
//    alert(num_array);
    var available_coupons = 1;
    if(available_coupons=="0"){
        return false;
    }
    var length=$(this).parents('.weui-cells').find('.sale').length;
    $(this).parent().next(".coupon").show();
    if(length>0) {
        $(this).parents('.weui-cells').find('.none_coupons').hide();
    }
    $(".mask").css('display','block');
});
//  优惠券点击取消
$(".couponcancel").on('click',function(){

    $(this).parents(".coupon").hide();
})
$(".mask").click(function(){
    $(this).hide();
    $(".weui-picker").hide();
})

//优惠券选择改变事件
$(".weui-picker").find('input.weui-check').on('change',function() {
	
	var data_coupon = $(this).parents('.weui-cells').find('.weui-picker__bd').attr('n_data_coupon');//用户优惠卷ID
    var data_coupon_id = $(this).parents('label').find('input.coupon_id').val();//优惠卷ID
    var data_user_coupon_id = $(this).parents('label').find('input.user_coupon_id').val();//优惠卷ID
    var data_user_coupon_list = $(this).parents('label').find('input.user_coupon_list').val();//优惠卷ID
    var coupon_num_n = parseInt($(this).parents('label').find('.num_txt_'+data_coupon_id).text());
    
    if(coupon_num_n<1){
    	mobileAlert("此券已用光，请选择其他券！");return false;
    }else{
    	if(data_coupon){
    		var coupon_num_o = parseInt($('.num_txt_'+data_coupon).html());
            $('.num_txt_'+data_coupon).text(coupon_num_o+1);
    	}
    	//console.log(data_coupon);console.log(data_coupon_id);console.log(coupon_num_n);
        $('.num_txt_'+data_coupon_id).text(coupon_num_n-1);
        $(this).parents('.weui-picker__bd').attr('n_data_coupon',data_coupon_id);
        $(this).parents('.weui-picker__bd').attr('n_data_user_coupon',data_user_coupon_id);
        $(this).parents('.weui-picker__bd').attr('n_data_user_coupon_list',data_user_coupon_list);
    }
    
})

//  优惠券点击确认
$(".weui-picker-confirm").on('click',function(){
    $(".mask").hide();
    choose_coupon = $(this).parent().siblings('.weui-picker__bd');
	choose_coupon.attr('data_coupon',choose_coupon.attr('n_data_coupon'));
	choose_coupon.attr('data_user_coupon',choose_coupon.attr('n_data_user_coupon'));
	choose_coupon.attr('data_user_coupon_list',choose_coupon.attr('n_data_user_coupon_list'));
    var prize_type=$(this).parents('.weui-cells').find('.prize_type').val();//1为折扣劵，2为满减劵
    var reduce_val = $(this).parents('.weui-cells').find('.weui-check:checked').val();
    var coupon_id=$(this).parents('.weui-picker').find('.weui-check:checked').parents('.weui-check__label').find('.coupon_id').val();
    var promotions_id=$(this).parents('.weui-picker').find('.weui-check:checked').parents('.weui-check__label').find('.c_activity_id').val();
    var activity_type=$(this).parents('.weui-picker').find('.weui-check:checked').parents('.weui-check__label').find('.c_activity_type').val();
    var user_coupon_id=$(this).parents('.weui-picker').find('.weui-check:checked').parents('.weui-check__label').find('.c_activity_type').val();
    var goods_price=$(this).parents('.weui-cells').find('.single_price').html();
    if(prize_type==1){
        var pay_price=parseFloat(goods_price*reduce_val);
        pay_price=pay_price.toFixed(2);
        var coupon_amount=parseFloat(goods_price*(1-reduce_val));
        coupon_amount=coupon_amount.toFixed(2);
    }
//    var coupon_amount=$(this).parents('.weui-cells').find('.single_price').html();
//    alert(pay_price);alert(coupon_amount);
    $(this).parents('.weui-cells').find('.goods_coupon_id').val(coupon_id);
    $(this).parents('.weui-cells').find('.goods_pay_price').val(pay_price);
    $(this).parents('.weui-cells').find('.goods_coupon_amount').val(coupon_amount);
    $(this).parents('.weui-cells').find('.promotions_id').val(promotions_id);
    $(this).parents('.weui-cells').find('.activity_type').val(activity_type);
    $(this).parents('.weui-cells').find('.user_coupon_id').val(user_coupon_id);
    var goods_coupon_id=$(this).parents('.weui-cells').find('.goods_coupon_id').val();
    var goods_pay_price=$(this).parents('.weui-cells').find('.goods_pay_price').val();
    var goods_coupon_amount=$(this).parents('.weui-cells').find('.goods_coupon_amount').val();
//    console.log(goods_coupon_id);

    var length=$(this).parents('.weui-cells').find('.weui-check:checked').length;
    $(this).parents(".coupon").hide();
    if(length>0) {
        var prize_type=$(this).parents('.weui-cells').find('.prize_type').val();//1为折扣劵，2为满减劵
        var single_show=$(this).parents('.weui-cells').find('.single_price_show');
        var single_price_show=single_show.html();
        var single_price=$(this).parents('.weui-cells').find('.single_price').html();
//		var s_price=$(this).parents('.weui-cells').siblings().find('.single_price_show').html();
//		alert(s_price);
        var total_price=$('.total_price').html();
        var total_price_show=$('.total_price_show').html();
        var remain_price=parseFloat(parseFloat(total_price_show)-parseFloat(single_price_show)+parseFloat(single_price));
//        alert(remain_price);
        var coupon_name=$(this).parents('.weui-cells').find('.weui-check:checked').parents('.weui-check__label').find('.text_money').html();
        var label_remove=$(this).parents('.weui-cells').find('.weui-check:checked').parent('.weui-cell__ft').find('.label_remove').html();
//		alert(label_remove);
//        console.log($('.'+label_remove+':not(:checked)'));
        var num_txt=$(this).parents('.weui-cells').find('.weui-check:checked').parents('.weui-check__label').find('.num_txt').html();

        var data_coupon=$(this).parents('.weui-cells').find('.weui-picker__bd').attr('data_coupon');
        if(num_txt<=0){
            $(this).parents('.weui-cells').find('.weui-check:checked').parents('.weui-check__label').show();
            $(this).parents('.weui-cells').siblings().find('.'+label_remove).find('.weui-check:not(:checked)').parents('.'+label_remove).hide();
        }
        var reduce_val = '';
        if(data_coupon){
        	reduce_val = $(this).parents('.weui-cells').find('.weui-check:checked').val();
        }
//        if(prize_type==1){
//            var html = '您已选择使用' + coupon_name;
//        }
//        $(this).parents('.weui-cells').find('.choose').html(html);
        var change_html=$(this).parents('.weui-cells').find('.choose');
        var total_pay=$('.discount_total');
        $.ajax({
            url: 'changeCash',
            type: 'post',
            data: {'prize_type':prize_type,'single_price':single_price,'total_price_show':total_price_show,'total_price':total_price,'reduce_val':reduce_val,'remain_price':remain_price},
            async: true,
            dataType:'json',
            success:function (data) {
                single_show.html(data['discount_price']);
                $('.total_price_show').html(data['discount_total_price']);
                if(reduce_val==''){
                	 change_html.html('不使用优惠券');
                }else{
                	 change_html.html('您已选择使用' + coupon_name+',共优惠'+data['reduce_price']+'元');
                }
               
                total_pay.html('￥'+data['total_discount']+'元');
            }
        });
    }
})

//	根据下面收货人的个数判断弹出框的高
	
	get_choiceHeight();
	function get_choiceHeight(){
		var labelnum = $("#choicepeople label").length;
		$("#choicepeople").css("height",labelnum*60+100);
	}
	function check_addr(addrInfo){
		st_default='';
		if(addrInfo.is_default==1){
			st_default = '<span class="weui-btn weui-btn_mini weui-btn_warn" style="line-height: 18px;padding: 0 5px">默认</span>';
		}
		str = '<p>'+addrInfo.rec_name+' '+addrInfo.tel+' '+st_default+'</p><p class="addres">'+addrInfo.addressPicker+addrInfo.address+'</p>';
		console.log(str);
		ua_id = addrInfo.ua_id;$('#formSubmit').find('#reciveAddr').val(ua_id);
		$('#formSubmit').find('#show').html(str);
	}
	function select_address(obj){
		$("#choice").hide();
		obj = $(obj).parent('label').find('div.show-edit');
		addrInfo = get_info(obj);console.log(addrInfo)
		check_addr(addrInfo);
	}

var addressinfo = <?php echo $_smarty_tpl->tpl_vars['addressinfo']->value;?>
;

	$("#choice-cancel").click(function(){
		$("#choice").hide();
	})
	$('#choice').delegate("#show-edit","click",function(){	
		get_address("1");
		$("#choice").hide();
		$(("#edit")).show();
	})
	$('#choice').delegate("#show-edits","click",function(){
		get_address(addressinfo);
		$("#choice").hide();
		$(("#edit")).show();
	})
	function get_info(obj){
		id = obj.attr('data-id');name = obj.attr('data-name');
		tel = obj.attr('data-tel');addr = obj.attr('data-para');
		addrInfo = {
				'rec_name':name,'tel':tel,'address':obj.attr('data-address'),
				'ua_id':id,'tel':tel,'addressPickers':obj.attr('data-area'),
				'addressPicker':obj.attr('data-para'),'is_default':obj.attr('data-default'),
				};
		return addrInfo;
	}
	$('#choice').delegate(".show-edit","click",function(){
		obj = $(this);
		info = get_info(obj);
		get_address(info);
		$("#choice").hide();
		$(("#edit")).show();
		
	})
	$("#edit-cancel").click(function(){
		$("#edit").hide();
	})

	$('#formSubmit').delegate('#paySubmit','click',function(){
		var order_price=$(this).parents('.weui-tabbar').find('.total_price_show').html();
        var goods_price=$(this).parents('.weui-tabbar').find('.total_price').html();
        $('#postGoodsPrice').val(goods_price);
        $('#postOrderPrice').val(order_price);
		$('.goods-cells').each(function(){
        	coupon_id = $(this).find('.weui-picker__bd').attr('data_coupon');
        	coupon_list = $(this).find('.weui-picker__bd').attr('data_user_coupon_list');
        	$(this).children('.user_coupon_id').val(coupon_id);
        	$(this).children('.coupon_list').val(coupon_list);
        })
		var payType = $('input[name=radio1]:checked').val();
		if(payType==2){
			mobileAlert("暂不支持支付宝支付",1000,"");
			return false;
		}
		$(this).removeClass('paySubmit');
		$(this).addClass('cancelSubmit');
		var goods = sessionStorage.stockInfo;
		if(!goods){
			mobileAlert("订单已提交",1000,"");
			setTimeout(function(){
		    	window.location.href='<?php echo base_url("vmall.php/order/index");?>
';
		    },1000);
			return false;
		}
		$('#postGoods').val(goods);
		sessionStorage.removeItem("stockInfo");
		$('#formSubmit').submit();
	})
<?php echo '</script'; ?>
>
</html>
<?php }
}
