<?php
/* Smarty version 3.1.29, created on 2017-10-07 17:41:14
  from "D:\www\yunjuke\application\vmall\views\user_coupon.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59d8a13a8ab426_43790616',
  'file_dependency' => 
  array (
    'fc83cb75976a362797b8cafdb050d908be9235ab' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_coupon.html',
      1 => 1507367490,
      2 => 'file',
    ),
    '115c8c3a13a56407352a4c5e79b348343e27acdb' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink-c.html',
      1 => 1498027614,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59d8a13a8ab426_43790616 ($_smarty_tpl) {
?>
<html lang="zh-cn">

<head>
    <title>个人中心</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="full-screen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="shortcut icon" href="http://[::1]/yunjuke//favicon.ico">
<link href="http://[::1]/yunjuke/application/vmall/views/css/global.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/vmall/views/css/common.css" rel="stylesheet" type="text/css">

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
          //alert(docEl.style.fontSize);
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


    <link href="http://[::1]/yunjuke/application/vmall/views/css/style.css" rel="stylesheet" type="text/css">
</head>
<style>
    body{
        background: #fff;
    }
    .topnav{
        display: flex;
        background: #f7f7f7;
        border-bottom: 1px solid #e8e8e8;
    }
    .topnav a{
        width:33%;
        height:.35rem;
        line-height:.35rem;
        text-align: center;
        color: #999;
    }
    .topnav a.active{
        border-bottom: 2px solid #f60;
        color: #f60;
     }
    .nocoupon{
        width:45%;
        margin:40% auto;
        color: #ccc;
        font-size: .145rem;
        text-align: center;
        line-height:.5rem;
    }
    .content{
        padding:.13rem;
    }
    .nocoupon img{
        width:100%;
        height:auto;
    }
    .money{
        background: url("http://[::1]/yunjuke/application/vmall/views/images/coupon_money.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #fff7bb;
        position: relative;
        margin-bottom: .05rem;

    }
    .reduce{
        background: url("http://[::1]/yunjuke/application/vmall/views/images/coupon_reduce.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #fff7bb;
        position: relative;
        margin-bottom: .05rem;
    }
    .sale{
        background: url("http://[::1]/yunjuke/application/vmall/views/images/coupon_sale.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #fff7bb;
        position: relative;
        margin-bottom: .05rem;
    }
    .for_goods{
        background: url("http://[::1]/yunjuke/application/vmall/views/images/for_goods.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #333;
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
    .num_txt{
        font-size: .14rem!important;
    }
    .num{
        float: right;
        margin-top:.09rem;
        font-size: .14rem!important;
        padding-right:.1rem;
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
    .for_goods .coupon_bottom a{
        color: #333;
    }
    .add{
        padding:.0rem .1rem;
        background: #000;
        color: #fff;
        border-radius: 4px;
        position: fixed;
        font-size: .18rem;
        text-align: center;
        line-height: .5rem;
        top:1rem;
        left:1rem;
        opacity: 0;
    }
    .goods_img{
        width:.32rem;
        height:.32rem;
        border-radius: 50%;
        margin-bottom: .1rem;
        margin-left: .15rem;
    }
</style>
<body>
<div class="topnav">
    <a class="active" data-id="nouse">未使用的券</a>
    <a data-id="user">已使用的券</a>
    <a data-id="overtime">已过期的券</a>
</div>
<div class="content">
    <div id="nouse">
        <!--没有优惠券的样式-->
        <div class="nocoupon"><img src="http://[::1]/yunjuke/application/vmall/views/images/nownocoupon.png" alt="">您没有未使用的券</div>
        <!--红包券-->
        <!--
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: data</p>
<p>Filename: templates_c/fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php</p>
<p>Line Number: 184</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php<br />
			Line: 184<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Store.php<br />
			Line: 166<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php</p>
<p>Line Number: 184</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php<br />
			Line: 184<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Store.php<br />
			Line: 166<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>-->
        <!--未使用的劵-->
        
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: data</p>
<p>Filename: templates_c/fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php</p>
<p>Line Number: 239</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php<br />
			Line: 239<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Store.php<br />
			Line: 166<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php</p>
<p>Line Number: 239</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php<br />
			Line: 239<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Store.php<br />
			Line: 166<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>        <div class="add"></div>
    </div>
        <!--<div class="reduce">-->
            <!--<div class="store_name">ABC旗舰店</div>-->
            <!--<p class="coupon_text"><span class="all_money">100</span>积分劵<span class="num">x<span class="num_txt">2</span></span></p>-->
            <!--<div class="coupon_bottom">-->
                <!--<p class="coupon_time">有效期：2017.09.01-2017.09.30</p>-->
                <!--<a href="javascript:;">立即使用>></a>-->
            <!--</div>-->
        <!--</div>-->
        <!--折扣券-->
        <!--<div class="sale">-->
            <!--<div class="store_name">ABC旗舰店</div>-->
            <!--<p class="coupon_text"><span class="text_money">8.5折</span>折扣券 <span class="num">x<span class="num_txt">2</span></span></p>-->
            <!--<div class="coupon_bottom">-->
                <!--<p class="coupon_time">有效期：2017.09.01-2017.09.30</p>-->
                <!--<a href="javascript:;">立即使用>></a>-->
            <!--</div>-->
        <!--</div>-->
        <!--指定商品券-->
        <!--<div class="for_goods">-->
            <!--<div class="store_name">ABC旗舰店</div>-->
            <!--<p class="coupon_text">指定商品<span class="text_money" style="color: #de4b3f;">99</span><span style="color: #de4b3f;font-size: .14rem">元</span> <span class="num">x<span class="num_txt">2</span></span></p>-->
            <!--<div class="coupon_bottom">-->
                <!--<p class="coupon_time">有效期：2017.09.01-2017.09.30</p>-->
                <!--<a href="javascript:;">立即使用>></a>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
    <div id="user" style="display: none">
        <div class="nocoupon"><img src="http://[::1]/yunjuke/application/vmall/views/images/nownocoupon.png" alt="">您没有使用过券</div>
        
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: open_data</p>
<p>Filename: templates_c/fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php</p>
<p>Line Number: 332</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php<br />
			Line: 332<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Store.php<br />
			Line: 166<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php</p>
<p>Line Number: 332</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php<br />
			Line: 332<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Store.php<br />
			Line: 166<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>    </div>
    <div id="overtime" style="display: none">
        <div class="nocoupon"><img src="http://[::1]/yunjuke/application/vmall/views/images/nownocoupon.png" alt="">您没有已过期的券</div>
        
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: user_data</p>
<p>Filename: templates_c/fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php</p>
<p>Line Number: 395</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php<br />
			Line: 395<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Store.php<br />
			Line: 166<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Trying to get property of non-object</p>
<p>Filename: templates_c/fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php</p>
<p>Line Number: 395</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\cache\templates_c\fc83cb75976a362797b8cafdb050d908be9235ab_0.file.user_coupon.html.cache.php<br />
			Line: 395<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\application\vmall\controllers\Store.php<br />
			Line: 166<br />
			Function: display			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\www\yunjuke\vmall.php<br />
			Line: 328<br />
			Function: require_once			</p>

		
	

</div>    </div>
</body>
<script src="http://[::1]/yunjuke/application/vmall/views/js/jquery-2.1.1.js"></script>
<script>
    $('.topnav a').click(function () {
        $('.topnav a').removeClass('active');
        $(this).addClass('active');
        $('.content>div').hide();
        $("#"+$(this).attr('data-id')).show();
    })

        $('.reduce').on('click',function(){//点击积分
            var num=$(this).find('.num_txt').html()-1;
            if(num<1){
                num=0;
                $(this).css({'opacity':'0.5'});
            }
            $(this).find('.num_txt').html(num);
            var wheels_log_id=$(this).find("input:first-child").val();//当前使用的积分的wheels_log_id
            $(this).find("input:first-child").remove();//将已开启的积分信息删除
            $.ajax({
                url:'getPoint',
                type:'post',
                data:{'wheels_log_id':wheels_log_id},
                dataType:'json',
                async:true,
                success:function(data){
                    if(data['rel']) {
                        $(".add").html("积分+" + data['point']);
                        $(".add").css({'opacity': '1', 'top': '1rem','display':'block'});
                        $(".add").animate({top: '.1rem', opacity: '0', padding: '0.04rem 0.1rem'},1000,function(){
                            $(".add").hide()
                        });
                    }

                }
            })
        })

        $('.money').on('click',function(){//点击红包
            var num=$(this).find('.num_txt').html()-1;
            if(num<1){
                num=0;
                $(this).css({'opacity':'0.5'});
            }
            $(this).find('.num_txt').html(num);
            var wheels_log_id=$(this).find("input:first-child").val();//当前使用的红包的wheels_log_id
            $(this).find("input:first-child").remove();//将已开启的红包信息删除
            $.ajax({
                url:'getCash',
                type:'post',
                data:{'wheels_log_id':wheels_log_id},
                dataType:'json',
                async:true,
                success:function(data){
                    if(data['rel']){
                        $(".add").html("零钱+"+data['prize_value']);
                        $(".add").css({'opacity':'1','top':'1rem','display':'block'});
                        $(".add").animate({top:'.1rem',opacity:'0',padding:'0.04rem 0.1rem'},1000,function(){$(".add").hide()});
                    }
                }
            })
        })



</script>
</html><?php }
}
