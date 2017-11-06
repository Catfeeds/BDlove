<?php
/* Smarty version 3.1.29, created on 2017-05-10 09:28:52
  from "D:\www\yunjuke\application\vmall\views\user_collection.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59126cd4a894c0_04722468',
  'file_dependency' => 
  array (
    'de6330520c9e8da2167e09d7ffc4ec7438e708a1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_collection.html',
      1 => 1493366424,
      2 => 'file',
    ),
    '5cea575055325e574f9e509e31fe0032e5018982' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\lib\\Hlink.html',
      1 => 1494340664,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_59126cd4a894c0_04722468 ($_smarty_tpl) {
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
  function getLocation(){
      var options={
          enableHighAccuracy:true, 
          maximumAge:1000
      }
      if(navigator.geolocation){
          //浏览器支持geolocation
          navigator.geolocation.getCurrentPosition(onSuccess,onError,options);
          
      }else{
          //浏览器不支持geolocation
      }
  }

  //成功时
  function onSuccess(position){
      //返回用户位置
      //经度
      var longitude =position.coords.longitude;
      //纬度
      var latitude = position.coords.latitude;
	  $.ajax({
			type: "post",
		       url: "http://[::1]/yunjuke/vmall.php/user/steUserLocation",
		       data: {
		    	   long:longitude,
		    	   lat:latitude
		       },
		       dataType: "json",
		       success: function(data){
		       	if(data.state){
		       		
		       	}else{
		       		
		       	}
		       }
		});


  }


  //失败时
  function onError(error){
      switch(error.code){
          case 1:
          alert("位置服务被拒绝");
          break;

          case 2:
          alert("暂时获取不到位置信息");
          break;

          case 3:
          alert("获取信息超时");
          break;

          case 4:
           alert("未知错误");
          break;
      }

  }

  window.onload=getLocation;
  setInterval(getLocation,3600000);//每隔1小时 自行获取
	
	
	

	
	

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
