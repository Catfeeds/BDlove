<?php
/* Smarty version 3.1.29, created on 2017-04-24 10:59:29
  from "E:\www\yunjuke\application\vmall\views\user_shopping_cart.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fd6a11b86de2_24819608',
  'file_dependency' => 
  array (
    'f8da9ba17ad1a1fa397464e3825c9539cecdd588' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\user_shopping_cart.html',
      1 => 1492562860,
      2 => 'file',
    ),
    '368c42ee444c4bd0269d88571257280b552c724c' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink.html',
      1 => 1492598976,
      2 => 'file',
    ),
    '937c11f0dc00c77c8e7cb9c03c7341363c7be7ef' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\lib\\footer.html',
      1 => 1492496476,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_58fd6a11b86de2_24819608 ($_smarty_tpl) {
?>
<html lang="zh-cn" style="opacity: 1; font-size: 200px;" class="view6s">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="full-screen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="shortcut icon" href="http://[::1]/yunjuke//favicon.ico">
<link href="http://[::1]/yunjuke/application/vmall/views/css/weui.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/vmall/views/css/style.css" rel="stylesheet" type="text/css">
<script>
  (function(doc, win) {
    // 移动端REM自适应
    var docEl = doc.documentElement, 
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
          var clientWidth=docEl.clientWidth||320;
          var docCls = docEl.classList;
          var width = clientWidth < 320 ? 320 : clientWidth > 640 ? 640 : clientWidth;
          docEl.style.fontSize = 100 * (width / 320) + 'px';
          docEl.style.opacity=1;

          // 添加屏幕标识，便于文字调整
          if(375 <= clientWidth && clientWidth < 414){
            docCls.add('view6');
          }else if(414 <= clientWidth){
            docCls.add('view6s');
          }else{
            docCls.remove('view6');
            docCls.remove('view6s');
          }
        };
    docEl.style.opacity=0;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
    // IOS8下1px线条改为0.5px
    if (/iP(hone|od|ad)/.test(navigator.userAgent)) {
        var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/),
            version = parseInt(v[1], 10);
        if(version >= 8){
            document.documentElement.classList.add('hairlines');
        }
    }
    })(document, window);
</script>
        <title>我的购物车</title>
        <style>
            .storeMsg .wbox-1 a {
                float: left;
                width: auto;
            }

            .storeMsg .wbox-1 a.action {
                font-size: 12px;
                color: #e04241;
                padding-left: 5px;
            }
        </style>
    </head>

    <body>
        <input type="hidden" name="" id="suid" value="8">
        <input type="hidden" name="" id="storeId" value="">
        <input type="hidden" name="" id="salesId" value="">
        <section class="cart-list" style="margin-bottom:.4rem;" data-store="191" data-sales="">
            <div class="storeMsg wbox">
                <input name="checkProduct" type="checkbox" value="" class="yes">
                <div class="wbox-1">
                    <a class="store" data-id="191" href="getStoreHomePage.htm?storeId=191">施舜天河店</a>
                </div>
                <a class="edit" href="javascript:;">编辑</a>
            </div>
            <div class="list">
                <dl class="wbox">
                    <dt>
                        <label class="block">
                            <input name="checkProduct" data-salesid="" type="checkbox" class="yes  post">
                        </label>
                    </dt>
                    <dd data-cartid="265928" data-skuid="1508097" data-id="2824309" class="stockInfo wbox-1">
                        <a href="getStockInfoForCustomer.htm?stockId=2824309" class="block">
                            <div class="wbox">
                                <img src="https://qncdn.qiakr.com/Fr5Et4YLtXHFeYRQzm0WlXDRtzyL?imageView2/1/w/80/h/80" class="size40">
                                <div class="wbox-1 detail">
                                    <div class="d-plus fn-hide">
                                        <button class="jian">-</button>
                                        <input name="" class="count" type="number" value="1" data-max="5" data-limit="0" data-id="265928">
                                        <button class="jia">+</button>
                                    </div>
                                    <div class="name">2017新款 枣红色半裙 S701134</div>
                                    <div class="fc-grey">
                                        <span class="c-9">
                                            (快递)
                                        </span>
                                        <span class="size">默认</span> / <span class="color">S</span></div>
                                </div>
                            </div>
                        </a>
                    </dd>
                    <dd class="action">
                        <div href="#" class="remove fn-hide" data-id="265928"></div>
                        <div class="money">
                            <p>￥<span class="price">379.00</span></p>
                            <p>x <span class="shopCount">1</span></p>
                        </div>
                    </dd>
                </dl>
            </div>
        </section>
        <!--底部-->
        <footer style="height:55px;">
            <div class="ft-cart" style="bottom:.41rem;">
                <span class="l_b">合计(不包含运费)：共<span class="fcf3b bold" id="priceTottle">379.00</span>元</span>
                <btn id="gotoPay" class="r_b">立即结算</btn>
            </div>
        </footer>
        <input type="hidden" name="footStoreId" value="">
        <input type="hidden" name="footSalesId" value="">
        <input type="hidden" name="footSuid" value="8">
        <footer class="store_footer_new bde4-b foot_new_cart">
  <div class="ub ub-ac">
    <a data-id="home" class="ub-f1 ub ub-ver foot_new_sin home" href="http://[::1]/yunjuke/vmall.php/">
      <i class="iconfont"></i>
      <div class="">首页</div>
    </a>
    <a data-id="stock" class="ub-f1 ub ub-ver foot_new_sin stock" href="http://[::1]/yunjuke/vmall.php/goods/">
      <i class="iconfont"></i>
      <div class="">商品</div>
    </a>
    <a data-id="cart" class="ub-f1 ub ub-ver foot_new_sin cart" href="http://[::1]/yunjuke/vmall.php/user/user_shopping_cart">
      <i class="iconfont"></i>
      <div class="">购物车</div>
    </a>
    <a data-id="customer" class="ub-f1 ub ub-ver foot_new_sin cus" data-suid="8" href="http://[::1]/yunjuke/vmall.php/user/">
      <i class="iconfont"></i>
      <div class="">个人中心</div>
    </a>
  </div>
</footer>
        <script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
        <script src="http://[::1]/yunjuke/application/vmall/views/js/getShoppingCart.js"></script>
    </body>

</html><?php }
}
