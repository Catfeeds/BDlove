<?php
/* Smarty version 3.1.29, created on 2017-05-10 09:28:52
  from "D:\www\yunjuke\application\vmall\views\user_collection.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59126cd49ed0a4_34909806',
  'file_dependency' => 
  array (
    'de6330520c9e8da2167e09d7ffc4ec7438e708a1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_collection.html',
      1 => 1493366424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink.html' => 1,
  ),
),false)) {
function content_59126cd49ed0a4_34909806 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '741059126cd4925cf7_50439753';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/jquery-2.1.1.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
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
                                        '<div class="p-img" style="background-image:url(<?php echo PLUGIN;?>
data/shop/album_pic/'+v.goods_image+')"></div>'+
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
                            $('#favListItem').html('<section class="noResult tc"><span>收藏夹为空哦</span><div><a href="<?php echo base_url();?>
vmall.php/goods/index" class="btn btn-red" style="display:inline-block;background:#e04241;">立即去添加</a></div></section>');
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
    <?php echo '</script'; ?>
>

</html><?php }
}
