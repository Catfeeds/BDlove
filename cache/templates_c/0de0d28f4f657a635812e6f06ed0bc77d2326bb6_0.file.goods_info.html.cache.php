<?php
/* Smarty version 3.1.29, created on 2017-10-17 10:25:40
  from "D:\www\yunjuke\application\vmall\views\goods_info.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e56a246304c4_76377605',
  'file_dependency' => 
  array (
    '0de0d28f4f657a635812e6f06ed0bc77d2326bb6' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\goods_info.html',
      1 => 1508205500,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink.html' => 1,
  ),
),false)) {
function content_59e56a246304c4_76377605 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2151959e56a2407b476_07726788';
?>
<html lang="zh-cn" style="opacity: 1; font-size: 200px;" class="view6s"><head>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<title><?php echo $_smarty_tpl->tpl_vars['base_info']->value['goods_name'];?>
</title>
    <link rel="stylesheet" href="<?php echo TEMPLE;?>
css/weui1.css">
    <link rel="stylesheet" href="<?php echo TEMPLE;?>
css/idangerous.swiper.css">
<style>

body{background: #fff;padding-bottom: 60px; margin: 0 auto; max-width: 768px;}
p{
    font-size:14px;}
.stockInfoBlock{padding: .15rem;border-bottom: 10px solid #F1F3F6;}
.vipSkuTag{padding: .07rem .15rem;}
.vipSkuTag>div{display: inline-block;border:1px solid #F44336;color:#F44336;font-size:.12rem;border-radius: 2px;-webkit-border-radius: 2px;padding:0 3px 0 0;height:.2rem;line-height: .2rem;}
.vipSkuTag i{font-size:.12rem;color:#fff;background-color: #f44336;padding: 0 .04rem 0;margin-right:3px;display:block;float:left;height:.2rem;}
.vipSkuTag span{display:block;float:left;height:.2rem;}
.limitItems .item{border: solid 1px #b2b2b2;color: #a5a5a5;border-radius: 4px;padding:0 6px;margin-top: .07rem;display: inline-block;font-size: 13px;}
.limitItems.lg{padding-top: .5rem;}
.limitItems.lg .item{padding: 6px .1rem;}
.discountPromotion{font-size:.13rem;padding:.1rem .15rem;margin-top:.15rem;border-top: .08rem solid #F1F3F6;}
.detailTitle{padding: 15px;}
.ft-cart{text-align: center;background-color: #fcfcfc;overflow: visible;border-top: none;}
.ft-cart .actions{width: 45%;font-size: .1rem;float: left;padding-top: 3px;border-top: solid 1px #ddd;}
.hairlines .ft-cart .actions{font-size: 12px;}
.ft-cart .actions .iconfont{font-size: 22px;margin-bottom: 2px;}
.ft-cart .actions .item a{display: block;position: relative;color: #8C8180;}
.ft-cart .actions .item .hasShoppingCart{position: absolute;top: 1px;right: 8px;width: 8px;height: 8px;text-indent: .1rem;border-radius: 50%;background: #F44336;overflow: hidden;}
.ft-cart .shopping{width: 55%;float: right;}
.ft-cart .shopping .item{width: 50%;height: 55px;line-height: 54px;color: #fff;}
#shoppingCart{background: #FF9600;}
#shoppingNow{background: #F44336;}
.descriptionContainer{max-width: 100%;overflow: hidden;border-bottom: 10px solid #F1F3F6;}
.descriptionContainer img{max-width: 100%!important;}
a.appriseBtn{border: solid 1px #f44336;padding: 0 10px;line-height: 34px;color: #f44336;border-radius: 6px;background: #feeae9;}
.starContainer{background: #fff url('<?php echo TEMPLE;?>
images/stars.png') 0 0 repeat-x;height: 20px;width: 100px;position: relative;margin-top: 10px;}
.starContainer .stars{background: #fff url('<?php echo TEMPLE;?>
images/stars.png') 0 -30px repeat-x;height: 20px;position: absolute;left: 0;top: 0;}
#appriseContainer{padding: 5px .15rem 25px .15rem;border-bottom: 10px solid #F1F3F6;}
#recommendContainer{padding: 2%;overflow: hidden;}
#recommendContainer .item{width: 49%; float: left; margin-right: 2%; margin-bottom: 2%;box-sizing: border-box;text-align: center;background: #fff;}
#recommendContainer .item:nth-child(2n){margin-right: 0;}
#recommendContainer .item .name{height: 18px;word-break:break-all;overflow: hidden;padding: 5px 20px 0;}
#recommendContainer .item .img{display: block; text-align: center;width: 100%;height: 47vw; min-width: 145px; min-height: 145px; background: #e7e7e7 url("<?php echo TEMPLE;?>
images/goods.png") no-repeat 50% 50%; background-size: cover;}
.skuPopupBox{z-index:1001;position: fixed;bottom: 0px;left: 0;width: 100%;background: #fff;box-sizing:border-box;z-index: 1101;padding-top: 10px;}
 @-webkit-keyframes actionBottom {
    0% {bottom: -400px;}
    100% {bottom: 0px;}
  }
  @keyframes actionBottom {
    0% {bottom: -400px;}
    100% {bottom: 0px;}
  }
.skuPopupBox.actionBottom{
  -webkit-animation:actionBottom 0.4s ease-in-out;
  animation:actionBottom 0.4s ease-in-out;
  bottom: 0;
}
.skuPopupBox .skuTitle{color: #888;line-height: 26px;}
.skuPopupBox .skuContainer{padding-bottom: 10px;}
.skuPopupBox .skuContainer .skuBox{line-height: 1;color: #000;padding:5px 8px;display: inline-block;margin-right: 5px;margin-top: 5px;border: solid 1px #ddd;min-width:25px;text-align: center;border-radius: 10px;}
.skuPopupBox .skuContainer .skuBox.ac{color: #fff;background-color: #f44336;border-color: #f44336;}
.skuPopupBox .skuContainer .skuBox.disabled{color: #888;background-color: #eee;}
.skuPopupBox .stockMsg .img{background-size: cover;background-position: 50% 50%;width: 80px;height: 80px;overflow: hidden;margin-right: 20px;}
.skuPopupBox .closeMask{position: absolute;top: -14px;right: 20px;background: #fff;border-radius: 50%;width: 26px;height: 26px;text-align: center;display: block;border:1px solid #999}
.skuPopupBox .closeMask .iconfont{font-size: 38px;position: absolute;color: #333;left: -6px;top: -15px;}
.countController{width: 108px;box-sizing:border-box;border-top: solid 1px #ddd;border-bottom: solid 1px #ddd;text-align: center;}
.countController .wbox-1{height: 36px;line-height: 36px;}
.countController a{border-left: solid 1px #ddd;border-right: solid 1px #ddd;}
.countController a:active,.countController a.disabled{background: #eee;}
.countController input{border: none;}
#goChat.hasNewMsg .newIcon{position: absolute;display: block;left: auto;right: 12px;top: 2px;}
#skuConfirmBtn{border-radius: 0;}
.newCartAni{position: absolute;top: 10px;left: 18px;font-size: 20px;display: none;}
@-webkit-keyframes newCartAni {
  0% {top: -5px;opacity: 1;}
  100% {top: -50px;opacity: 0;}
}
@keyframes newCartAni {
  0% {top: -5px;opacity: 1;}
  100% {top: -50px;opacity: 0;}
}
.newCartAni.ac{
  -webkit-animation:newCartAni 0.6s ease-in-out;
  animation:newCartAni 0.6s ease-in-out;
  top: -50px;opacity: 0;
}
.ft-cart .shopping .item.disabled{background: #eee !important;color: #888 !important;pointer-events: none;}
.salesInfo{text-align: center;}
.salesInfo:first-child{padding-bottom: 30px;}
.salesInfo .title{font-size: 18px;padding-bottom: 10px;}
.salesInfo .name{font-size: 16px;padding: 10px 0;}
.salesInfo .address{color: #888;padding-bottom: 10px;}
.seckillGuide{padding: 0;border:none;}
.seckillGuide a{display: block;background: url('<?php echo TEMPLE;?>
images/seckillGuide.png') center center no-repeat;height: 0.42rem;background-size: 100% 100%;}
.img_bor{width:60px;height:60px;border:.5px solid #F1F3F6;}
.sku-tag{display: inline-block;width:48px;height: 18px;background: url('<?php echo TEMPLE;?>
images/stock_picon.png') no-repeat;    background-size: contain;position: relative;top: 3px;margin-left: 5px;}
.getpanel{
	position:fixed;
	top:0;
	bottom:0;
	left:0;
	right:0;
	background:#333;
	z-index:1000;
	opacity:0.7;
}
.re{color:#999 !important;font-size:25px !important;margin-top:10px;margin-left:7px}


.choice_taocan{
	width:80%;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;float: left;
}

.evalstar{
    float: right;
}
.evalstar li{
    float:right;
    margin-left: 5px;
}
.evalstar img{
    width: 15px;
}
.small{
    color: #999;
    font-size: 12px;
    margin-left: 15px;
}
.content{
    padding: 10px 15px;
    font-size: 16px;
}
.eval-img-group{
    margin-left: 5px;
    margin-bottom: 10px;
}
.eval-img{
    width: 100px;
    margin-left: 10px;
    float: left;
}
.img-r{
    max-width: 100%;
    height: auto;
}
.info {
   margin: 10px;
   position  :relative;
   padding: 10px;
   margin-left: 15px;
   margin-right: 15px;
   background :#eee;
   border-radius :4px;
   text-align :center;
   font-size: 14px;
  }
.nav {
   position   :absolute;
   top    :-8px;
   left    :30px;
   overflow   :hidden;
   width    :13px;
   height   :13px;
   background  :#eee;
  -webkit-transform :rotate(45deg);
  -moz-transform :rotate(45deg);
  -o-transform  :rotate(45deg);
   transform   :rotate(45deg);
}
.clear{
	clear: both;
}
/*图标*/
.icon-popups {
    margin-top: 8px;
    position: absolute;
    right: 10px;
    width: 19px;
    height: 4px;
    background-image: url('<?php echo TEMPLE;?>
images/product-detail-sprites-mjs.png');
    background-repeat: no-repeat;
    background-size: 100px 100px;
    background-position: -42px -17px;
    }
.item p{
	margin-top: -9px;
}
.weui-cells:after,.weui-cells:before {
    z-index: 0;
}
.bd-e{
    border-bottom:1px solid #eee;
}
/*轮播图样式*/
.device {
    width: 100%;
    height: 3.2rem;
    position: relative;
}.swiper-slide{
    height:3.2rem!important;
 }
 .swiper-wrapper{
     height:3.2rem!important;
 }
.swiper-slide img{
    width: 100%;
    height:3.2rem;
}
.pagination {
    position: absolute;
    left: 0;
    text-align: center;
    bottom:25px;
    width: 100%;
    z-index: 99;
}
.swiper-pagination-switch {
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 10px;
    background: #fff;
    margin: 0 3px;
    cursor: pointer;
    opacity: 0.4;
}
.swiper-active-switch {
    background: #f60;
    opacity: 1;
}
.category{
    position: fixed;
    top:0;
    width:100%;
    height:40px;
    line-height:40px;
    background: #fff;
    display: flex;
    justify-content: space-around;
    z-index:99999;
}
.category a.active{
    color: #f60;
}
.category a.active:before{
    font-family: iconfont;
    content: "\e69f";
}
    .choice_goodsname{
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
    }
    .limitItems{
        display: flex;
        justify-content: space-between;
        font-size:12px;
        color:#999;
        margin-top:10px;
    }
    #show{
        padding:8px 15px;
        overflow: hidden;
    }
    .copy-txt{
        border:1px #fe4b68 dashed;
        text-align: center;
        background: #fff3f5;
        padding:5px;
    }
    .copy-btngroup{
        display: flex;
        justify-content: space-between;

    }
    .copy{
        width:48%;
        height:30px;
        text-align: center;
        line-height:30px;
        background: #fe4b68;
        color: #fff;
        border-radius: 4px;
        margin-top:5px;
    }
    .open{
        width:48%;
        height:30px;
        text-align: center;
        line-height:30px;
        background: #fe814b;
        color: #fff;
        border-radius: 4px;
        margin-top:5px;
    }
.followstore{
    padding-top:20px;
}
    .followstore p{
        border:1px solid #e84443;
        border-radius: 50px;
        padding:2px 7px;
        color: #e84443;
        font-size: 12px;

    }
    .size60{
        width:60px;
        height:60px;
    }
    .assure{
        width:11px;
        height:11px;
        border:1px solid #f60;
        background:#faeab5;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        color: #f60;
        text-align: center;
        line-height:14px;
        font-size:10px;
    }
    .toomore{
        display:block;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;width:90%;
    }
    .protent{
        line-height:15px;
        font-size:16px;
        color: #53b0f2;
        height:16px;
        vertical-align: middle;
    }
    .store-info{
        display: flex;
        justify-content: space-between;
        padding:0 5%;
    }
    .store-info p{
        color: #999;
    }
    .store-info p span{
        color: #000;
    }
</style>
<?php echo '<script'; ?>
>
  var saleStatus = "" || 0;
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="//res.wx.qq.com/open/js/jweixin-1.0.0.js" src="//res.wx.qq.com/open/js/jweixin-1.0.0.js?v=4.4.3"><?php echo '</script'; ?>
></head>
<body>
<!-- 微信分享的图片，默认取第一张图,大小必须大于300px -->
<div style="width:0px;height:0px;overflow:hidden;">
    <img src="<?php echo TEMPLE;?>
images/showpic/FjrizPciwtPjWxOxFYNu-W7mNZ7F.jpg" width="320">
</div>
<input type="hidden" id="sales" value="">
<input type="hidden" id="salesId" value="">
<input type="hidden" id="storeId" value="191">
<input type="hidden" class="products-msg" value="forChat,must reserve">
<input type="hidden" value="0"><!--客服模式  0-导购模式 1-导购&多客服模式 2-多客服模式-->

    <div class="page" id="homePageContainer">
        <!--上面分类锚点-->
        <div class="category" style="display: none">
            <a href="#device" class="active">宝贝</a>
            <a href="#goodsevaluate">评价</a>
            <a href="#picture">详情</a>
            <a href="#related">推荐</a>
        </div>

<!--轮播图-->

        <div class="device" id="device">
            <div class="swiper-container" >
                <div class="swiper-wrapper">
                    <?php if (!empty($_smarty_tpl->tpl_vars['base_info']->value['goods_images'])) {?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['base_info']->value['goods_images'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
                    <?php if (!empty($_smarty_tpl->tpl_vars['val']->value['goods_image']) && $_smarty_tpl->tpl_vars['val']->value['goods_image'] != false) {?>
                    <div class="swiper-slide"> <img src="<?php echo GOODIMAGE;
echo $_smarty_tpl->tpl_vars['val']->value['goods_image'];?>
"> </div>
                    <?php } else { ?>
                    <div class="swiper-slide"> <img src="<?php echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['goods_image'];?>
"> </div>
                    <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
if ($__foreach_val_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_0_saved_key;
}
?>
                    <?php } else { ?>
                    <?php if (!empty($_smarty_tpl->tpl_vars['base_info']->value['goods_image'])) {?>
                    <div class="swiper-slide"> <img src="<?php echo GOODIMAGE;
echo $_smarty_tpl->tpl_vars['base_info']->value['goods_image'];?>
"> </div>
                    <?php } else { ?>
                    <div class="swiper-slide"> <img src="<?php echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['goods_image'];?>
"> </div>
                    <?php }?>
                    <?php }?>
                    <!--<div class="swiper-slide"> <img src="<?php echo TEMPLE;?>
images/1.png"> </div>-->
                </div>
            </div>
            <div class="pagination"></div>
        </div>


        <section class="stockInfoBlock" style="margin:0;padding:0;">
        <div class="lh20 pt10 pb10">
            <div class="fs18 pb10 c-0 pl15 pr15"><?php echo $_smarty_tpl->tpl_vars['base_info']->value['goods_name'];?>
</div>
            <div class="fs18 pb10 c-0 pl15 pr15" style="font-size: 13px;color:red !important;"><?php if (!empty($_smarty_tpl->tpl_vars['base_info']->value['goods_jingle'])) {
echo $_smarty_tpl->tpl_vars['base_info']->value['goods_jingle'];
}?></div>
            <div class="pl15 pr15 market_stocks_Price" >
                <span class="fc-red fs20" style="margin-right: 10px;">
                    <span id="marketPrice">
                        ¥<span style="font-size: 24px;"><?php echo $_smarty_tpl->tpl_vars['base_info']->value['stocks_price'];?>
</span>
                    </span>
                </span>
                <del class="fs16">¥<?php echo $_smarty_tpl->tpl_vars['base_info']->value['goods_marketprice'];?>
</del>
            </div>
            <div class="limitItems pl15 pr15">
                <p>快递：免运费</p>
                <p>月销<?php echo $_smarty_tpl->tpl_vars['base_info']->value['goods_salenum'];?>
笔</p>
                <p><?php echo $_smarty_tpl->tpl_vars['store_info']->value['province_name'];
echo $_smarty_tpl->tpl_vars['store_info']->value['city_name'];?>
</p>
            </div>
        </div>
    </section>
        <section class="stockInfoBlock" style="margin:0;padding:14px 15px;" id="stockInfoBlockids">
            <p class="choice_taocan"><span>已选：</span></p><em class="icon-popups"></em>
            <div style="clear: both;"></div>
        </section>
        
        
        
        
        
        
		<?php if ($_smarty_tpl->tpl_vars['store_info']->value['ous_type'] >= 1 && isset($_smarty_tpl->tpl_vars['base_info']->value['shorturl']) && !empty($_smarty_tpl->tpl_vars['base_info']->value['shorturl'])) {?>
	        <section class="stockInfoBlock" id="show">
	        <!--<p class="copy-txt">￥<?php echo $_smarty_tpl->tpl_vars['base_info']->value['shorturl'];?>
￥<br>复制这条信息，然后打开[手机淘宝]即可</p>  -->
	            <p class="copy-txt">亲,复制这条信息,在淘宝中打开,并在下单中备注聚客360，即可享受折优惠哦!</p>
	            <div class="copy-btngroup">
	                <a class="copy"  href="<?php echo $_smarty_tpl->tpl_vars['base_info']->value['shorturl'];?>
">复制链接</a>
	                <a class="open" href="<?php echo $_smarty_tpl->tpl_vars['base_info']->value['shorturl'];?>
">打开淘宝</a>
	            </div>
	            <div  style="padding-bottom: 10px;"></div>
	        </section>
		<?php }?>
		
        <div class="detailTitle"  id="goodsevaluate"style="padding-bottom: 5px;border-top: 20px solid #F1F3F6;">宝贝评价(<?php echo $_smarty_tpl->tpl_vars['evaluate_total']->value;?>
)</div>
        <div class="weui-cells" style="margin-top: 0em;">
        <?php if (!empty($_smarty_tpl->tpl_vars['evaluate_info']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['evaluate_info']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_info_1_saved_item = isset($_smarty_tpl->tpl_vars['info']) ? $_smarty_tpl->tpl_vars['info'] : false;
$_smarty_tpl->tpl_vars['info'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['info']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
$__foreach_info_1_saved_local_item = $_smarty_tpl->tpl_vars['info'];
?>
                <div class="weui-cell">
                    <hr color="#e8e8e8"/>
                    <div class="weui-cell__hd">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['info']->value['head_portrait'];?>
"   onerror="javascript:this.onerror=null;this.src='<?php echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['default_guide_logo'];?>
';"  alt="" style="width:20px;margin-right:5px;display:block">
                     </div>
                    <div class="weui-cell__bd" style="width: 90%;">
                        <p>
                            <p style="float: left;margin-right: 10px;"><?php if (!empty($_smarty_tpl->tpl_vars['info']->value['user_name'])) {
echo $_smarty_tpl->tpl_vars['info']->value['user_name'];
} else {
if (!empty($_smarty_tpl->tpl_vars['info']->value['buyer_nickname'])) {
echo $_smarty_tpl->tpl_vars['info']->value['buyer_nickname'];
} else { ?>匿名用户<?php }
}?></p>
                            <ul class="evalstar">
                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['info']->value['evaluation_level']+1 - (1) : 1-($_smarty_tpl->tpl_vars['info']->value['evaluation_level'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                    <li><img src="<?php echo TEMPLE;?>
images/evalstar2.png" alt="1"></li>
                                <?php }
}
?>

                            </ul>
                        </p>
                    </div>
                </div>

                <p class="content"><?php if (!empty($_smarty_tpl->tpl_vars['info']->value['evaluation_content'])) {
echo $_smarty_tpl->tpl_vars['info']->value['evaluation_content'];
}?></p>
                <div class="eval-img-group">
                    <?php if (!empty($_smarty_tpl->tpl_vars['info']->value['geval_image'])) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['info']->value['geval_image'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_2_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_2_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_2_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
                            <div class="eval-img">
                                <img src="<?php echo TEMPLE;?>
images/<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
" alt="" class="img-r" style="width: 70px;height: 70px;"/>
                            </div>
                        <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_2_saved_local_item;
}
if ($__foreach_val_2_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_2_saved_item;
}
if ($__foreach_val_2_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_2_saved_key;
}
?>
                    <?php }?>
                    <div class="clear"></div>
                </div>

                <div>
                    <?php if (!empty($_smarty_tpl->tpl_vars['info']->value['geval_explain'])) {?>
                        <div class="info">
                            <div class="nav"></div>
                            <p>掌柜回复：<?php echo $_smarty_tpl->tpl_vars['info']->value['geval_explain'];?>
</p>
                        </div>
                    <?php }?>
                </div>
                <p class="small pull-left"><?php if (!empty($_smarty_tpl->tpl_vars['info']->value['goods_color'])) {
echo $_smarty_tpl->tpl_vars['info']->value['goods_color'];
}?> ; <?php if (!empty($_smarty_tpl->tpl_vars['info']->value['goods_size'])) {
echo $_smarty_tpl->tpl_vars['info']->value['goods_size'];
}?></p>
                <p class="small pull-right" style="margin-right: 7%;"><?php echo date("Y.m.d",$_smarty_tpl->tpl_vars['info']->value['evaluation_time']);?>
</p>
                <div class="clear"></div>
            <?php
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_1_saved_local_item;
}
if ($__foreach_info_1_saved_item) {
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_1_saved_item;
}
?>

            <div class="tc pt10 pb10 weui-cells" style="border-bottom: 10px solid #F1F3F6;">
                <a href="evaluate_list?goods_id=<?php echo $_smarty_tpl->tpl_vars['base_info']->value['goods_id'];?>
&storeId=<?php echo $_smarty_tpl->tpl_vars['store_info']->value['store_id'];?>
" class="btn appriseBtn">
                    查看全部评价(<?php echo $_smarty_tpl->tpl_vars['evaluate_total']->value;?>
)</a>
            </div>
        <?php } else { ?>
            <p class="c-9 pt20 pb20">&nbsp;&nbsp;&nbsp; 暂无评价记录~</p>
        <?php }?>
    </div>
        <section class="stockInfoBlock " style="padding:0 0;border-top: 10px solid #F1F3F6;">
          <div class="detailTitle">店铺信息</div>
          <input id="productPicUrl" type="hidden" value="<?php echo base_url();
echo $_smarty_tpl->tpl_vars['store_info']->value['ous_logo'];?>
">
          <div class="salesInfo pl15 pr15">
              <div class="fs16 tl" style="color: #929292;"></div>
              <div class="ub ub-at tl pb10">
                  <div class="img_bor ub" style="margin-top: 5px"><a href="../index/index?storeId=<?php echo $_smarty_tpl->tpl_vars['store_info']->value['store_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['store_info']->value['default_log'];?>
" class="size60"></a></div>
                  <div class="ub-f1 pl5">
                      <div style="font-size: 15px;" class="toomore"><?php echo $_smarty_tpl->tpl_vars['store_info']->value['store_name'];?>
</div>
                      <div class="address p0 fs14">
                          <span style="margin-right: 10px;">认证 <spsn class="iconfont assure">&#xe642;</spsn></span>
                          <span>担保 <spsn class="iconfont protent">&#xe62e;</spsn></span>
                      </div>
                      <div class="fc-red toomore">主营：<?php if (!empty($_smarty_tpl->tpl_vars['brands_str']->value)) {
echo $_smarty_tpl->tpl_vars['brands_str']->value;
}?></div>
                  </div>
                  <div class="followstore" id="followstore"><?php if (empty($_smarty_tpl->tpl_vars['is_fav_store']->value)) {?><p><span class="iconfont">&#xe610;</span>关注店铺</p><?php } else { ?><p><span class="iconfont">&#xe610;</span>已关注店铺</p><?php }?></div>
              </div>
                <div class="store-info">
                    <p><span><?php echo $_smarty_tpl->tpl_vars['store_info']->value['follow_num'];?>
</span><br>关注人数</p>
                    <p><span><?php echo $_smarty_tpl->tpl_vars['store_info']->value['store_goods'];?>
</span><br>全部商品</p>
                    <p><span><?php echo $_smarty_tpl->tpl_vars['store_info']->value['store_salenum'];?>
</span><br>月销量</p>
                </div>
          </div>
          <a class="hide" id="pageChat" href="contactSales.htm?brandId=20&amp;supplierId=8&amp;storeId=191"></a>
            <div id="picture" style="padding-bottom: 40px;"></div>
        </section>
        <div class="tl">
          <div class="detailTitle">图文详情</div>
          <div class="descriptionContainer tl pl15 pr15">
              <?php if (!empty($_smarty_tpl->tpl_vars['mobile_desc_arr']->value)) {?>
                  <?php
$_from = $_smarty_tpl->tpl_vars['mobile_desc_arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_3_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_3_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                      <?php if ($_smarty_tpl->tpl_vars['v']->value['type'] == 'image') {?>
                        <div class="module m-image">
                            <div class="content">
                                <div class="image-div">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['value'];?>
">
                                </div>
                            </div>
                            <div class="cover">
                            </div>
                        </div>
                      <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['type'] == 'text') {?>
                         <div class="module m-text">
                        <div class="content">
                            <div class="text-div">
                                <p style="color:#3E3E3E;font-family:'Helvetica Neue', Helvetica, 'Hiragino Sans GB', 'Microsoft YaHei', Arial, sans-serif;font-size:16px;text-align:center;background-color:#FFFFFF;">
                                    <span style="color:#3E3E3E;line-height:25.6px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['value'];?>
</span>
                                </p>
                            </div>
                        </div>
                        <div class="cover">
                        </div>
                    </div>
                      <?php }?>
                  <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_3_saved_local_item;
}
if ($__foreach_v_3_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_3_saved_item;
}
?>
                <?php } else { ?>
                	<?php if (!empty($_smarty_tpl->tpl_vars['base_info']->value['pc_desc'])) {?>
                    	 <?php echo $_smarty_tpl->tpl_vars['base_info']->value['pc_desc'];?>

                     <?php } else { ?>
                     	<p class="c-9 pt20 pb20"> 主人很懒，什么都没有编写~</p>
                     <?php }?>
                <?php }?>
              <div id="related" style="padding-bottom: 40px;"></div>
          </div>

          <div class="detailTitle" >相关推荐</div>
          <div id="recommendContainer">
             <?php if (!empty($_smarty_tpl->tpl_vars['recommend_goods']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['recommend_goods']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_4_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_4_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
            <div class="item" style="border: 1px solid #efefef;">
                <a href="goods_collection?store_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['ssa_store_id'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_id'];?>
" class="img" style="background-image:url(<?php if (!empty($_smarty_tpl->tpl_vars['v']->value['goods_image'])) {
echo GOODIMAGE;
echo $_smarty_tpl->tpl_vars['v']->value['goods_image'];
} else {
echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['goods_image'];
}?>);"></a>
                <div class="name"><?php echo $_smarty_tpl->tpl_vars['v']->value['goods_name'];?>
</div>
                <div class="pt5 pb5">
                  <span class=" fc-red fs16">¥<?php echo $_smarty_tpl->tpl_vars['v']->value['stocks_price'];?>
</span>
                  <del class="c-9">¥<?php echo $_smarty_tpl->tpl_vars['v']->value['stocks_marketprice'];?>
</del>
                </div>
            </div>
            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_4_saved_local_item;
}
if ($__foreach_v_4_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_4_saved_item;
}
?>
            <?php } else { ?>
               <p class="c-9 pt20 pb20">&nbsp;暂无相关推荐的商品~</p>
            <?php }?>
        </div>
        </div>
    </div>
    <div class="ft-cart">
        <div class="actions wbox">
            <div class="item wbox-1" style="width:0;">
                <a href="javascript:;" id="insertFav" class="on">
                    <?php if ($_smarty_tpl->tpl_vars['base_info']->value['goods_favorites'] == "true") {?>
                        <i class="iconfont c-or">&#xe63e;</i><p class="c-or">已收藏</p>
                    <?php } else { ?>
                        <i class="iconfont">&#xe63e;</i><p>收藏</p>
                    <?php }?>
                </a>
            </div>
            <div class="item">
                <a href="<?php echo base_url();?>
vmall.php/store/shopping_guide<?php if (!empty($_smarty_tpl->tpl_vars['store_info']->value['store_id'])) {?>?store_id=<?php echo $_smarty_tpl->tpl_vars['store_info']->value['store_id'];
}?>" id="goChat">
                    <span class="newIcon"></span>
                    <i class="iconfont">&#xe636;</i>
                    <p>服务顾问</p>
                </a>
            </div>
            <div class="item pr5 wbox-1" style="width:0;">
                <a id="shoppingCartBtn" href="<?php echo base_url();?>
vmall.php/user/user_shopping_cart?suid=<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
" style="position: relative;">
                    <i class="iconfont">&#xe635;<?php if (!empty($_smarty_tpl->tpl_vars['userCartTotal']->value) && $_smarty_tpl->tpl_vars['userCartTotal']->value > 0) {?><span class="weui-badge" style="position: absolute;top: -.2em;"><?php echo $_smarty_tpl->tpl_vars['userCartTotal']->value;?>
</span><?php }?></i>
                    <p>购物车</p>
                    <span class="newCartAni fc-red">+1</span><span id="hasShoppingCart">1</span>
                </a>
            </div>
        </div>
        <div class="wbox shopping">
            <a href="javascript:;" class="item wbox-1" id="shoppingCart">加入购物车</a>
            <a href="javascript:;" class="item wbox-1" id="shoppingNow">立即购买</a>
        </div>
    </div>

    <div class="getpanel" style="display:none"></div>

    <!--商品规格选择-->
    <div class="skuPopupBox" style="display:none;">
        <a href="javascript:;" class="closeMask"><i class="iconfont re">&#xe617;</i></a>
        <div id="skuBoxWrap">
          <div class="p20">
            <div class="stockMsg wbox pb10 bd-e">
              <div class="img" id="goodsimages"  style="background-image:url(<?php if (!empty($_smarty_tpl->tpl_vars['base_info']->value['goods_image'])) {
echo GOODIMAGE;
echo $_smarty_tpl->tpl_vars['base_info']->value['goods_image'];
} else {
echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['goods_image'];
}?>)"></div>
              <div class="wbox-1">
                <p class="c-0 choice_goodsname"><?php echo $_smarty_tpl->tpl_vars['base_info']->value['goods_name'];?>
</p>
                <p class="fc-red fs16 pt5" data-oldprice="<?php if ($_smarty_tpl->tpl_vars['base_info']->value['goods_marketprice'] > 0) {
echo $_smarty_tpl->tpl_vars['base_info']->value['goods_marketprice'];
} else {
echo $_smarty_tpl->tpl_vars['base_info']->value['goods_marketprice'];
}?>" id="skuPrice">¥<?php if ($_smarty_tpl->tpl_vars['base_info']->value['goods_marketprice'] > 0) {
echo $_smarty_tpl->tpl_vars['base_info']->value['goods_marketprice'];
} else {
echo $_smarty_tpl->tpl_vars['base_info']->value['goods_marketprice'];
}?></p>
                <p class="pt5">剩余库存<span id="skuCountLast"><?php echo $_smarty_tpl->tpl_vars['base_info']->value['amount'];?>
</span>件</p>
              </div>
            </div>
              <div style="height: 250px;overflow-y: auto;">
            <p class="skuTitle">收货方式</p>
            <div class="skuContainer bd-e" id="getStockType">
                 <?php if ($_smarty_tpl->tpl_vars['base_info']->value['logistics_type'] == 0) {?>
                     <i class="type skuBox ac" data-type="1">快递发货</i>
                     <i class="type skuBox" data-type="2">到店自提</i>
                  <?php } elseif ($_smarty_tpl->tpl_vars['base_info']->value['logistics_type'] == 1) {?>
                     <i class="type skuBox ac" data-type="2">到店自提</i>
                  <?php } else { ?>
                     <i class="type skuBox ac" data-type="1">快递发货</i>
                  <?php }?>
            </div>

             <?php if (!empty($_smarty_tpl->tpl_vars['base_info']->value['goods_color'])) {?>
             <p class="skuTitle">颜色</p>
              <div class="skuContainer bd-e" id="colorSkus">
                    <?php
$_from = $_smarty_tpl->tpl_vars['base_info']->value['goods_color'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_5_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_5_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_5_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
                        <i class="sku skuBox <?php if ($_smarty_tpl->tpl_vars['k']->value == 0) {?>ac<?php }?>" str="colors"  goods_color="<?php if (!empty($_smarty_tpl->tpl_vars['v']->value['color'])) {
echo $_smarty_tpl->tpl_vars['v']->value['color'];
}?>" color_remark ="<?php if (!empty($_smarty_tpl->tpl_vars['v']->value['color_remark'])) {
echo $_smarty_tpl->tpl_vars['v']->value['color_remark'];
} else { ?>''<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['stocks_sku'];?>
" goods_a_id="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_a_id'];?>
" ><?php if (!empty($_smarty_tpl->tpl_vars['v']->value['color_remark'])) {
echo $_smarty_tpl->tpl_vars['v']->value['color_remark'];
} else {
echo $_smarty_tpl->tpl_vars['v']->value['color'];
}?></i>
                    <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_5_saved_local_item;
}
if ($__foreach_v_5_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_5_saved_item;
}
if ($__foreach_v_5_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_5_saved_key;
}
?>
              </div>
            <?php }?>

            <?php if (!empty($_smarty_tpl->tpl_vars['base_info']->value['goods_color'])) {?>
              <p class="skuTitle">尺码</p>
              <div class="skuContainer bd-e" id="sizeSkus">

              </div>
          <?php }?>

            <p class="skuTitle">数量 </p>
            <div class="countController wbox bd-e">
              <a href="javascript:;" class="wbox-1 sub disabled  number"><i class="iconfont">-</i></a>
              <input type="number" class="wbox-1 tc" id="countInput" value="1" data-limit="10">
              <a href="javascript:;" class="wbox-1 add"><i class="iconfont  numbers">+</i></a>
            </div>
          </div>
            </div>
          <a href="javascript:;" class="btn btn-red full" id="skuConfirmBtn">确定</a>
        </div>
    </div>
    <div class="ui-mask active"></div>


    <div class="ui-mask active"></div>

    <div class="js_dialog popCartMsg" id="iosDialog3" style="display: none">
	    <div class="weui-mask"></div>
        <div class="weui-dialog">
            <div class="weui-dialog__hd"><strong class="weui-dialog__title">添加成功</strong></div>
            <div class="weui-dialog__bd">产品成功添加至购物车</div>
            <div class="weui-dialog__ft">
                <a href="<?php echo base_url();?>
vmall.php/goods" class="weui-dialog__btn weui-dialog__btn_default">继续购物</a>
                <a href="../user/user_shopping_cart" class="weui-dialog__btn weui-dialog__btn_warn" style="color: #E73C3E">去结算</a>
            </div>
        </div>
    </div>

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
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery-2.1.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/idangerous.swiper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>

$(function() {
//    滚动使锚点选中当前的位置
    var h_devoce = $('#device').offset().top-5;
    var h_goodsevaluate = $('#goodsevaluate').offset().top-5;
    var h_picture = $('#picture').offset().top-5;
    var h_related = $('#related').offset().top-5;
    $(window).scroll(function () {
        //$(window).scrollTop()这个方法是当前滚动条滚动的距离
        var h = $(window).scrollTop();
        if(h<50){
            $(".category ").fadeOut();
        }else{
            $(".category").fadeIn();
        }
        if(h<h_goodsevaluate){
            $(".category a").removeClass('active');
            $(".category a:eq(0)").addClass('active');
        }else if(h<h_picture){
            $(".category a").removeClass('active');
            $(".category a:eq(1)").addClass('active');
        }else if(h<h_related){
            $(".category a").removeClass('active');
            $(".category a:eq(2)").addClass('active');
        }else{
            $(".category a").removeClass('active');
            $(".category a:eq(3)").addClass('active');
        }

    });

//    点击跳转锚点
    $(".category a").on('click',function(){
        $(".category a").removeClass('active');
        $(this).addClass('active');
    })
//    <a href="#device" class="active">宝贝</a>
//    <a href="#goodsevaluate">评价</a>
//    <a href="#picture">详情</a>
//    <a href="#related">推荐</a>
	var screen = document.body.clientWidth;
	var showMPLoginBoxflag = false;
	var qjflag     = true;
	$("#carousel").css("transform","translate3d(-"+0+"px, 0px, 0px)")
	$("#carousel").css("transform","translate3d(-"+screen+"px, 0px, 0px)")
	$("#carousel li").css("width",screen+"px");
	var goods_id = "<?php echo $_smarty_tpl->tpl_vars['base_info']->value['goods_id'];?>
";
	    gc_id  = "<?php echo $_smarty_tpl->tpl_vars['base_info']->value['gc_id'];?>
";
	    goods_name = "<?php echo $_smarty_tpl->tpl_vars['base_info']->value['goods_name'];?>
";
	    goods_price = "<?php echo $_smarty_tpl->tpl_vars['base_info']->value['stocks_price'];?>
";
	    goods_image = "<?php echo GOODIMAGE;?>
"+"<?php echo $_smarty_tpl->tpl_vars['base_info']->value['goods_image'];?>
";
	    goods_images = "<?php echo GOODIMAGE;?>
"+"<?php echo $_smarty_tpl->tpl_vars['base_info']->value['goods_image'];?>
";
	    store_id = "<?php echo $_smarty_tpl->tpl_vars['store_info']->value['store_id'];?>
";
	    store_name = "<?php echo $_smarty_tpl->tpl_vars['store_info']->value['store_name'];?>
";
	    type = $("#getStockType .ac").attr("data-type");
	    size = $("#sizeSkus .ac").attr("title");
	    color = $("#colorSkus .ac").attr("title");
	    goods_aid = $("#colorSkus .ac").attr("goods_a_id");
	    number = $("#countInput").val();
	    limit_flag = "<?php echo $_smarty_tpl->tpl_vars['base_info']->value['limit_flag'];?>
";

        toaction = true;

        get_size_by_ajax(goods_id,goods_aid,true);
        limit_number = "<?php if (!empty($_smarty_tpl->tpl_vars['base_info']->value['limit_number'])) {
echo $_smarty_tpl->tpl_vars['base_info']->value['limit_number'];
} else { ?>0<?php }?>";
        limit_flag = "<?php if (!empty($_smarty_tpl->tpl_vars['base_info']->value['limit_flag'])) {
echo $_smarty_tpl->tpl_vars['base_info']->value['limit_flag'];
} else { ?>1<?php }?>";

        //提货方式
	    $("body").on("click",".skuContainer .type",function(){
	    	if($(this).siblings()){
	    		$(this).siblings().attr("class","type skuBox");
	    	}

	    	$(this).attr("class","type skuBox ac");
	    });


	    //获取对应库存
	    $(".skuContainer").on("click",".sku",function(){
	    	if($("#skuConfirmBtn").hasClass("disabled")){
	    		$("#skuConfirmBtn").removeClass("disabled");
			}

	    	qjflag = true;
	    	if($(this).attr("str")=="colors"){
	    		 //goods_aid = $(this).attr("goods_a_id");
	    		 color = $(this).attr("title");
	    		 goods_aid = $(this).attr("goods_a_id");
	    		 //get_size_by_ajax(goods_id,goods_aid);
	    		 get_size_by_ajax(goods_id,goods_aid,true);
	    		 $(this).siblings().attr("class","sku skuBox");
	    	     $(this).attr("class","sku skuBox ac");
	    	}else{
	    		   if($(this).hasClass("disabled")){
	    			   qjflag = false;
	    			   $("#skuConfirmBtn").addClass("disabled");
				    	return false;
				    }


	   	    	$.each($(this).siblings(),function(k,v){
	   	    		if($(this).hasClass("ac")){
	   	    			$(this).removeClass("ac");
	   	    		}
	   	    	})
	    		$(this).attr("class","sku skuBox ac");
	   	    	goods_a_id = $(this).attr("goods_a_id");
	   		    size = $("#sizeSkus .ac").attr("title");
	   		    color = $("#colorSkus .ac").attr("title");
	   		    goods_ea_id = $("#sizeSkus .ac").attr("goods_ea_id");
	   		    get_price_by_ajax(goods_id,size,goods_ea_id,goods_a_id);
	    	}


	    });


	    //添加收藏
	    $("body").on("click","#insertFav",function(){
	    	var goodsea_id = $("#sizeSkus .ac").attr("goods_ea_id");
	    	$.getJSON("user_add_collection?op=goods&goods_ea_id="+goodsea_id+"&store_id="+store_id+"&goods_id="+goods_id+"&goods_name="+goods_name+"&goods_image="+goods_image+"&goods_price="+goods_price+"&gc_id="+gc_id,function(data){
	    		if(data.state){
	    			if(data.flag==1){
	    				$("#insertFav").html('<i class="iconfont c-or">&#xe63e;</i><p class="c-or">已收藏</p>');
	    			}else{
	    				$("#insertFav").html('<i class="iconfont">&#xe63e;</i><p>收藏</p>');
	    			}
	    			mobileAlert(data.msg,1000,"");
	    		}else{
	    			mobileAlert(data.msg,1000,"");
	    		}
	    	});
	    });
	    //关注店铺
    $("body").on("click","#followstore",function(){
        $.getJSON("user_add_collection?store_id="+store_id,function(data){
            if(data.state){
                if(data.flag==1){
                    $("#followstore").html('<p><span class="iconfont">&#xe610;</span>已关注店铺</p>');
                }else{
                    $("#followstore").html('<p><span class="iconfont">&#xe610;</span>关注店铺</p>');
                }
                mobileAlert(data.msg,1000,"");
            }else{
                mobileAlert(data.msg,1000,"");
            }
        });
    });


	    $(".countController .number").on("click",function(){
	    	if(qjflag ==false){
	    		return false;
	    	}
	    	var number = parseInt($("#countInput").val());
            if(number>1){
            	number = number-1;
            	$("#countInput").val(number)
            }

	    });

	    $(".countController .numbers").on("click",function(){
	    	if(qjflag ==false){
	    		return false;
	    	}
	    	var number = parseInt($("#countInput").val());
	    	    amount = parseInt($("#skuCountLast").html());

            if(number<amount){

            	number = number+1;
            	if(Number(limit_flag)>1){
            		if(number > Number(limit_number)){

                		if(Number(limit_number)<1){
                			mobileAlert("亲,该商品属于限购,您已超过限购总数,不能再次购买！",3000,"");
                		}else{
                			mobileAlert("亲,该商品属于限购,您还能购买"+limit_number+"个/件",3000,"");
                		}
        	    		return false;
        	    	}
            	}


            	$("#countInput").val(number)
            }

	    });


	    //加入购物车
	    $("#shoppingCart").on("click",function(){
	    	goods_aid = $("#colorSkus .ac").attr("goods_a_id");
		    size = $("#sizeSkus .ac").attr("title");
		    color = $("#colorSkus .ac").attr("title");
	    	//get_price_by_ajax(goods_id,size,color,goods_aid);

	    	setTimeout("opengetpanel()",300);
	    	toaction =false;
	    });


	    //立即购买
	    $("#shoppingNow").on("click",function(){
	    	goods_aid = $("#colorSkus .ac").attr("goods_a_id");
		    size = $("#sizeSkus .ac").attr("title");
		    color = $("#colorSkus .ac").attr("title");
	    	//get_price_by_ajax(goods_id,size,color,goods_aid);

	    	setTimeout("opengetpanel()",300);
	    });


	    $("#skuConfirmBtn").on("click",function(){

	    	var number = parseInt($("#countInput").val());

          	if(Number(limit_flag)>1){
        		if(number > Number(limit_number)){
            		if(Number(limit_number)<1){
            			mobileAlert("亲,该商品属于限购,您已超过限购总数,不能再次购买！",3000,"");
            		}else{
            			mobileAlert("亲,该商品属于限购,您还能购买"+limit_number+"个/件",3000,"");
            		}
            		$(".getpanel").css("display","none");
    				$(".skuPopupBox").css("display","none");
    				if($("#hasShoppingCart").hasClass("hasShoppingCart")){

    				}else{
    					$("#hasShoppingCart").addClass("hasShoppingCart")
    				}
    	    		return false;
    	    	}
        	}

	    	if(toaction){
            	add_user_shop_cart(goods_id,store_id,goods_name,goods_image,'2');
            }else{
            	add_user_shop_cart(goods_id,store_id,goods_name,goods_image,'1');
            }
            toaction =true;


	    });

        //产品规格点击选择
	    $("#stockInfoBlockids").on("click",function(){
	    	if($(this).hasClass("disabled")){
 			   qjflag = false;
 			   $("#skuConfirmBtn").addClass("disabled");
			    	return false;
            }
	    	goods_aid = $("#colorSkus .ac").attr("goods_a_id");
		    size = $("#sizeSkus .ac").attr("title");
		    color = $("#colorSkus .ac").attr("title");
		    goods_ea_id = $("#sizeSkus .ac").attr("goods_ea_id");
	    	get_price_by_ajax(goods_id,size,goods_ea_id,goods_aid);

	    	setTimeout("opengetpanel()",300);
	    });
});

$(".closeMask").on("click",function(){
	$(".getpanel").css("display","none");
	$(".skuPopupBox").css("display","none");
});

function opengetpanel(){
	$(".getpanel").css("display","block");
	if($(".skuPopupBox").css("display") =="none"){
		$(".skuPopupBox").css("display","block");
	}
}

function get_size_by_ajax(goods_id,goods_a_id,flag){
	qjflag = true;
	$.getJSON("get_size_by_ajax?goods_id="+goods_id+"&goods_a_id="+goods_a_id+"&store_id="+store_id,function(data){
		 if(data.state){
			 var htmls = "";
			 var sizetitle = "";
			 var sizeremark="";
			 var numlength = data.data.length;
				$.each(data.data,function(k,v){
					if(v.size_note){
						sizetitle = v.size_note;
						sizeremark = v.size_note;
					}else{
						sizetitle = v.size;
					}
					if(numlength>1){
						//alert("numlength>1")
						if(k){
							if(v.goodsamount){
								htmls +='<i class="sku skuBox " size_remark="'+sizeremark+'" goods_ea_id="'+v.goods_ea_id+'" goods_a_id="'+v.goods_a_id+'" flag="'+v.goods_id+v.goods_a_id+'" title="'+v.size+'" >'+sizetitle+'</i>';
							}else{
								htmls +='<i class="sku skuBox disabled" size_remark="'+sizeremark+'" goods_ea_id="'+v.goods_ea_id+'" goods_a_id="'+v.goods_a_id+'" flag="'+v.goods_id+v.goods_a_id+'" title="'+v.size+'" >'+sizetitle+'</i>';
							}

						}else{
							if(v.goodsamount){
								htmls +='<i class="sku skuBox ac" size_remark="'+sizeremark+'" goods_ea_id="'+v.goods_ea_id+'" goods_a_id="'+v.goods_a_id+'"  flag="'+v.goods_id+v.goods_a_id+'" title="'+v.size+'">'+sizetitle+'</i>';
							}else{
								htmls +='<i class="sku skuBox  disabled" size_remark="'+sizeremark+'" goods_ea_id="'+v.goods_ea_id+'" goods_a_id="'+v.goods_a_id+'"  flag="'+v.goods_id+v.goods_a_id+'" title="'+v.size+'">'+sizetitle+'</i>';
							}
						}
					}else{
						if(v.goodsamount){
							htmls +='<i class="sku skuBox ac" size_remark="'+sizeremark+'" goods_ea_id="'+v.goods_ea_id+'" goods_a_id="'+v.goods_a_id+'"  flag="'+v.goods_id+v.goods_a_id+'" title="'+v.size+'">'+sizetitle+'</i>';
						}else{
							htmls +='<i class="sku skuBox disabled" size_remark="'+sizeremark+'" goods_ea_id="'+v.goods_ea_id+'" goods_a_id="'+v.goods_a_id+'"  flag="'+v.goods_id+v.goods_a_id+'" title="'+v.size+'">'+sizetitle+'</i>';
						}

					}

   			});
			$('#sizeSkus').html("");
			$('#sizeSkus').html(htmls);
			if(flag){
				console.log('flag:'+flag);
				goods_aid = $("#colorSkus .ac").attr("goods_a_id");
			    size = $("#sizeSkus .ac").attr("title");
			    color = $("#colorSkus .ac").attr("title");
			    console.log("size:"+size);
			    if(size==undefined){
			    	$("#countInput").val(1)
			    	$("#skuCountLast").html('0');
			    	$("#skuConfirmBtn").addClass("disabled");
			    	qjflag = false;
			    	$('#stockInfoBlockids .choice_taocan').empty() ;
					$('#stockInfoBlockids .choice_taocan').html('<span>已选：</span>');
					$('#stockInfoBlockids .choice_taocan').parent().addClass("disabled");
			    	return false;
			    }
			    goods_ea_id = $("#sizeSkus .ac").attr("goods_ea_id");
			    console.log('goods_ea_id:'+goods_ea_id);
		    	get_price_by_ajax(goods_id,size,goods_ea_id,goods_aid);
			}
		 }
	});
}

function get_price_by_ajax(goods_id,size,goods_ea_id,goods_a_id){
	$.getJSON("get_price_by_ajax?goods_a_id="+goods_a_id+"&goods_id="+goods_id+"&size="+size+"&goods_ea_id="+goods_ea_id+"&store_id="+store_id,function(data){
		var GOODIMAGE = "<?php echo GOODIMAGE;?>
";
		    DEFAULTIMAGES = "<?php echo DEFAULTIMAGE;?>
"+"<?php echo $_smarty_tpl->tpl_vars['config_images']->value['goods_image'];?>
";
		if(data.state){
			$("#skuPrice").attr("data-oldprice",data.data.stocks_price);
			$("#skuPrice").html("¥"+data.data.stocks_price);
			if(data.data.amount>1){
				$("#skuCountLast").html(data.data.amount);
			}else{
				$("#skuCountLast").html(data.data.uec_amount);
			}
			if(data.data.img_info){
				$("#goodsimages").css("background-image","url("+GOODIMAGE+data.data.img_info+")");
				 goods_image = GOODIMAGE+data.data.img_info;
			}else{
				$("#goodsimages").css("background-image","url("+DEFAULTIMAGES+")");
				 goods_image = DEFAULTIMAGES;
			}
			htmls =  '<span class="fc-red fs20" style="margin-right: 10px;"><span id="marketPrice">¥'+'<span style="font-size:24px">'+data.data.stocks_price+ '</span></span></span><del class="fs16">¥'+data.data.stocks_marketprice+'</del>';
			$('.market_stocks_Price').empty() ;
			$('.market_stocks_Price').html(htmls);
			if(data.data.img_info){
				$("#carousel li").first().css("background-image","url("+GOODIMAGE+data.data.img_info+")");
			}else{
				$("#carousel li").first().css("background-image","url("+DEFAULTIMAGES+")");
			}


			$('#stockInfoBlockids .choice_taocan').empty() ;
			var colorSkus = $("#colorSkus .ac").html();
			var sizeSkus = $("#sizeSkus .ac").html();
			var countInput = $("#countInput").val();
			$('#stockInfoBlockids .choice_taocan').html('<span>已选：</span>'+colorSkus+" , "+sizeSkus+" , "+countInput+"件");
		}
	});
}




function add_user_shop_cart(goods_id,store_id,goods_name,goods_image,types){
	if(qjflag ==false){
		return false;
	}
    var type = $("#getStockType .ac").attr("data-type");
        if(typeof(type)== "undefined"){
        	type =1;
        }
	    size = $("#sizeSkus .ac").attr("title");
	    color = $("#colorSkus .ac").attr("goods_color");
	    stocks_sn = $("#colorSkus .ac").attr("title");
	    goods_a_id = $("#colorSkus .ac").attr("goods_a_id");
	    number = $("#countInput").val();
	    ssa_id = "<?php echo $_smarty_tpl->tpl_vars['base_info']->value['ssa_id'];?>
";
	    stocks_price = $("#skuPrice").attr("data-oldprice");
	    color_remark = $("#colorSkus .ac").attr("color_remark");
	    size_remark = $("#sizeSkus .ac").attr("size_remark");
	    goods_ea_id = $("#sizeSkus .ac").attr("goods_ea_id");

	if(types=='1'){
		$.getJSON("add_user_shop_cart?goods_ea_id="+goods_ea_id+"&size_remark="+encodeURI(size_remark)+"&color_remark="+encodeURI(color_remark)+"&type="+type+"&stocks_sn="+stocks_sn+"&store_id="+store_id+"&goods_id="+goods_id+"&goods_name="+goods_name+"&goods_image="+goods_image+"&goods_num="+number+"&goods_spec="+size+"&goods_color="+color+"&goods_a_id="+goods_a_id,function(data){
			if(data.state){
				mobileAlert("添加成功！",1000,"");
				setTimeout("window.location.reload();",1000);

			/* 	$(".getpanel").css("display","none");
				$(".skuPopupBox").css("display","none");
				if($("#hasShoppingCart").hasClass("hasShoppingCart")){

				}else{
					$("#hasShoppingCart").addClass("hasShoppingCart")
				}
				 */
			}
		});
	}else{
		var goods_prices  = stocks_price*number;
		stockArray = [];
		var goodsMsg = {
			    "goods_id":goods_id,
		        "goods_a_id":goods_a_id,
		        "goods_spec" :size,
		        "ssa_id" :ssa_id,
		        "stocks_price" :stocks_price,
		        "bl_id" :'',
		        "goods_num" :number,
		        "cart_id" :'',
		        "goods_img" :goods_images,
		        "goods_color" :color,
		        "goods_name" :goods_name,
		        "goods_price" :goods_prices,
		        "receive_type" :type,
		        "size_remark":size_remark,
		        "color_remark":color_remark,
		        "goods_ea_id":goods_ea_id,
	 };
	 var stockMsg = {
		        "storeName":store_name,
		        "storeId":store_id,
		        "goods" :goodsMsg,
		        "cart_id" :'',
		      };
		 stockArray.push(stockMsg);
		var stockInfo = JSON.stringify(stockArray);
		sessionStorage.stockInfo = JSON.stringify(stockArray);
		window.location.href="<?php echo base_url();?>
vmall.php/order/buy_confirm?op=buy_now&goods_ea_id="+goods_ea_id+"&size_remark="+encodeURI(size_remark)+"&color_remark="+encodeURI(color_remark)+"&type="+type+"&goods_id="+goods_id+"&goods_a_id="+goods_a_id+"&goods_spec="+size+"&ssa_id="+ssa_id+"&stocks_price="+stocks_price+"&goods_num="+number+"&goods_img="+goods_images+"&goods_color="+color+"&goods_name="+goods_name+"&goods_price="+goods_prices+"&storeId="+store_id+"&storeName="+store_name;
	}
}

var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    loop:true
})
<?php echo '</script'; ?>
>
</body></html><?php }
}
