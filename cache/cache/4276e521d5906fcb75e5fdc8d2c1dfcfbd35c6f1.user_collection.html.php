<?php
/* Smarty version 3.1.29, created on 2017-04-22 18:02:24
  from "E:\www\yunjuke\application\vmall\views\user_collection.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58fb2a30b72cc8_50902337',
  'file_dependency' => 
  array (
    '4276e521d5906fcb75e5fdc8d2c1dfcfbd35c6f1' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\user_collection.html',
      1 => 1492855326,
      2 => 'file',
    ),
    '368c42ee444c4bd0269d88571257280b552c724c' => 
    array (
      0 => 'E:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink.html',
      1 => 1492598976,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_58fb2a30b72cc8_50902337 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
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
        <title>我的收藏</title>
        <style>
            body {
                background: #fff;
                padding: 10px;
            }

            .products-list {
                padding-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="qk-pro-list">

            <ul class="small-block-grid-2" id="favListItem">
            </ul>
        </div>
    </body>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="http://[::1]/yunjuke/application/vmall/views/js/zepto.min.js"></script>
    <script>
    var dataPage=1,allowScroll=true;
    getAjaxData(dataPage,true);
    
    function getAjaxData(idx,clear){
        if(allowScroll){
            allowScroll = false;
            $("body").append('<div class="loading-bottom">加载中...</div>');
            $.getJSON("user_collection?op=page&index="+idx+"&length="+10,function(data){
                if(data.state){
                    if(data.result.length>0){
                        var htmlStr = '';
                        $.each(data.result.info,function(k,v){
                             htmlStr += '<li>'+
                                        '<a href="">'+
                                        '<div class="p-img" style="background-image:url(http://[::1]/yunjuke/data/shop/album_pic/'+v.goods_image+')"></div>'+
                                        '<div class="p-info" style="overflow: hidden">'+v.goods_name+'</div>'+
                                        '<div class="p-flag">'+
                                        '<span class="sku-price normal" style="color:red">¥'+v.log_price+'</span>'+
                                        '</div>'+
                                        '</a>'+
                                        '</li>';
                        })
                        $('#favListItem').append(htmlStr);
                    }else{
                        if(clear){
                            $('#favListItem').html('<section class="noResult tc"><span>收藏夹为空哦</span><div><a href="http://[::1]/yunjuke/vmall.php/goods/index" class="btn btn-red" style="display:inline-block;background:#e04241;">立即去添加</a></div></section>');
                        }
                    }
                    $(".loading-bottom").remove();
                    allowScroll = data.result.all ? false : true;
                }

            });
        }
    }
    scrollToLoadMore({
        callback:function(){
            getAjaxData(dataPage);
        }
    });
    
function scrollToLoadMore(option){
    var wHeight = $(window).height();
    window.onscroll = function(){
        var sHeight = $("body").scrollTop(), cHeight = $(document).height();
        if(sHeight >= cHeight-wHeight-(option.distance ? option.distance : 10)){
            if($(".loading-bottom").length > 0) {
                return false;
            }else{
                dataPage += (option.length ? option.length : 1);
                option.callback();
            }
        }
    }
}
//    $(function(){ 
//        $(window).on("scroll",function(){
//            console.log('aaa');
//        var aa=$(document).height();
//        var bb=$(this).scrollTop();
//        var cc=$(this).height();
//        var dd=aa-bb-cc;
//        if(dd<50){
//            $(".js-load-more").show();
//            var html='<p>22222222222222222222222222</p><p>22222222222222222222222222</p><p>22222222222222222222222222</p><p>22222222222222222222222222</p>';
//            //请求数据，然后添加内容，成功后隐藏加载器
//            // $.ajax(){ }
//            setTimeout(function(){
//            $(".m-content").append(html);
//            $(".js-load-more").hide();
//            },2000);
//            }
//        });
//    })
    </script>

</html><?php }
}
