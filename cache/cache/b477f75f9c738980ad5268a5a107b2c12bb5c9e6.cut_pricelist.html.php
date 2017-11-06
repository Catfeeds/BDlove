<?php
/* Smarty version 3.1.29, created on 2017-10-09 15:18:42
  from "D:\www\yunjuke\application\vmall\views\cut_pricelist.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59db22d213e848_18542768',
  'file_dependency' => 
  array (
    'b477f75f9c738980ad5268a5a107b2c12bb5c9e6' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\cut_pricelist.html',
      1 => 1507533519,
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
function content_59db22d213e848_18542768 ($_smarty_tpl) {
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
    .topnav{
        display: flex;
        background: #fff;
        border-bottom: 1px solid #e8e8e8;
    }
    .topnav a{
        width:54%;
        height:.35rem;
        line-height:.35rem;
        text-align: center;
        color: #999;
    }
    .topnav a.active{
        border-bottom: 2px solid #f60;
        color: #f60;
     }
    .cut_list li{
        margin:.1rem;
        border:1px solid #efefef;
        background: #fff;
    }
    .goods_img{
        position: relative;
    }
    .goods_img img{
        width:100%;
        height:1.2rem;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }
    .reduce_time{
        position: absolute;
        bottom:.05rem;
        left:.05rem;
        display: block;
        width:1.7rem;
        border:1px solid #552000;
        color: #552000;
        border-radius: 6px;
        background: #fff;
        letter-spacing: 0.5px;
        margin:0 auto;
        height:0.2rem;
        line-height: 0.21rem;
        text-align: center;
        font-size: .12rem;
        z-index: 999;
    }
    .time{
        color: #f44848;
        padding:0 .02rem;
    }
    .goods_info{
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding:.08rem;
    }
    .join_people{
        font-size: .1rem;
        color: #999;
    }
    .goods_price{
        color: #f44848;
        font-size: .13rem;
    }
    .price_new{
        font-size: .18rem;
        font-family: 楷体;
    }
    .price_order{
        font-family: 楷体;
        color: #999;
        text-decoration: line-through;
        margin-left:.1rem;
    }
    .btn_now{
        display: block;
        border:1px solid #552000;
        background: #fdd63a;
        color: #552000;
        border-radius:5px;
        width:.65rem;
        height:.2rem;
        text-align: center;
        line-height: .2rem;
        margin-bottom: .05rem;
    }
    .btn_wantbuy{
        display: block;
        border:1px solid #552000;
        background: #fff;
        color: #552000!important;
        border-radius:5px;
        width:.65rem;
        height:.2rem;
        text-align: center;
        line-height: .21rem;
    }
    .btn_wantbuy.active{
        background: #fdd63a;
    }
    .btn_wantbuy.active span{
        color: red;
    }
    .btn_cut{
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    .goods_name{
        font-size: .13rem;
        width:1.8rem;
        display:block;
        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }
    .want{
        color: #ddd;
        font-size: .16rem;
        vertical-align: middle;
    }
    #history .goods_img img{
        opacity: 0.5;
    }
    #history .goods_info .goods_info_text{
        opacity: 0.5;
    }
    .noaction{
        text-align: center;
        font-size: .14rem;
        background: #f4f4f4!important;
        padding-top:1rem;
        border:none!important;
    }
    .noaction p{
        margin-bottom: .3rem;
    }
    .noaction img{
        width: 1rem;
    }
    .start_num{
        font-size: .10rem;
        color: #999;
        width:1.8rem;
    }
    .join_num{
        margin-top:.05rem;
        opacity: 0.5;
    }
</style>
<body>
<div class="topnav">
    <a class="active" data-id="new">最新活动</a>
    <a data-id="history">历史活动</a>
</div>
<div class="content">
    <div id="new">
        <ul class="cut_list">
                                        <li>
                    <div class="goods_img">
                        <img src="http://[::1]/yunjuke/application/vmall/views/images/2.jpg" alt="">
                        <span class="reduce_time">仅剩<span class="iconfont time">&#xe657;</span><span class="overtimes" overtime="1507910400">5天19小时49分21秒</span></span>
                    </div>
                    <div class="goods_info">
                        <div>
                            <div class="goods_name">ABC KIDS粉色通用儿童书包</div>
                            <div class="goods_price">砍后最低￥<span class="price_new">105.32</span><span class="price_order">￥148.00</span></div>
                        </div>
                        <div class="btn_cut"><a href="cuts?id=11" class="btn_now">立即砍价</a><div class="join_people">已有7人参与</div></div>
                    </div>
                </li>
                                </ul>
     
    </div>
    <div id="history" style="display: none">
           <!--无活动的时候显示的样式-->
            <ul class="cut_list">
		            <li>
		                <div class="goods_img">
		                    <img src="http://[::1]/yunjuke/application/vmall/views/images/2.jpg" alt="">
		                </div>
		                <div class="goods_info">
		                    <div class="goods_info_text"><p class="goods_name">ABC KIDS粉色通用儿童书包</p><p class="start_num">如商品想买人数达到50人，活动将重新开启哦！</p></div>
		                    <div class="join_people">
                                <a href="javascript:;" class="btn_wantbuy" user_id="" bargain_id="" onclick="wantBuy(this)" state="" ><span class="iconfont want" >&#xe607;</span>我想买</a>
                                <p class="join_num">已有20人参与</p>
                            </div>
		                </div>
		            </li>
           </ul>
    </div>
</div>
</body>
<script src="http://[::1]/yunjuke/application/vmall/views/js/jquery-2.1.1.js"></script>
<script>
$(function(){
	var flag="1";
	if(flag==1){
		MicroTimeOver();
		setInterval("MicroTimeOver()","1000");
	}
	
})
//活动结束倒计时
function MicroTimeOver(){
	$(".content .cut_list li").each(function(index){
		var OverTimes = $(this).find(".overtimes").attr("overtime");
		var OverTime = Number(OverTimes);
		var timestamp = (Date.parse(new Date()))/1000;
		//console.log("timestamp:"+timestamp+"//type:"+typeof(timestamp));
		//console.log("OverTime:"+OverTime+"//type:"+typeof(OverTime));
		var leftTime = (OverTime - Number(timestamp))*1000;
		
		 var days = parseInt(leftTime / 1000 / 60 / 60 / 24 , 10); //计算剩余的天数 
		 var hours = parseInt(leftTime / 1000 / 60 / 60 % 24 , 10); //计算剩余的小时 
		 var minutes = parseInt(leftTime / 1000 / 60 % 60, 10);//计算剩余的分钟 
		 var seconds = parseInt(leftTime / 1000 % 60, 10);//计算剩余的秒数 
		 hours = checkTime(hours); 
		 minutes = checkTime(minutes); 
		 seconds = checkTime(seconds); 
		var overs =  days+"天" + hours+"小时" + minutes+"分"+seconds+"秒";
		$(this).find(".overtimes").html("");
		$(this).find(".overtimes").html(overs);
	})
}

function checkTime(i){ //将0-9的数字前面加上0，例1变为01 
 if(i<10) 
 { 
  i = "0" + i; 
 } 
 return i; 
} 






    $('.topnav a').click(function () {
        $('.topnav a').removeClass('active');
        $(this).addClass('active');
        $('.content>div').hide();
        $("#"+$(this).attr('data-id')).show();
    })
   
    function wantBuy(obj){
        var user_id = $(obj).attr("user_id");
        var bargain_id = $(obj).attr("bargain_id");
        var state = $(obj).attr("state");
        //console.log(state);return;
        if(state == 1){
            alert("您已经在本次活动中！");
            return;
        }
        var flag = confirm("确认参加活动吗？");
        if(flag == true){
            $.ajax({
                url : 'bargain_restart',
                type : 'post',
                data : {user_id:user_id,bargain_id:bargain_id},
                dataType : 'json',
                success : function(msg){
                    if(msg.state == true){
                        $(obj).addClass("active");
                    }else{
                        alert("数据错误！");return;
                    }
                }
            });
        }
        
    }
</script>
</html><?php }
}
