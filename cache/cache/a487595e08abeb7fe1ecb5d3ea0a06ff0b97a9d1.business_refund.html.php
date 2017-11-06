<?php
/* Smarty version 3.1.29, created on 2017-08-01 17:00:44
  from "D:\www\yunjuke\application\admin\views\business_refund.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5980433c018574_68791346',
  'file_dependency' => 
  array (
    'a487595e08abeb7fe1ecb5d3ea0a06ff0b97a9d1' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\business_refund.html',
      1 => 1501568969,
      2 => 'file',
    ),
    'cf07a77062b9b954d4138b51e09410b1afb7a5cc' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\pageheader.html',
      1 => 1500948915,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5980433c018574_68791346 ($_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<link type="text/css" rel="stylesheet" href="http://[::1]/yunjuke/plugins/select2/css/select2.min.css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/index_1.css" rel="stylesheet" type="text/css">
<link href="http://[::1]/yunjuke/application/admin/views/css/font-awesome.min.css" rel="stylesheet" />
<link href="http://[::1]/yunjuke/application/admin/views/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/application/admin/views/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/layer.css" rel="stylesheet" type="text/css"/>
<link href="http://[::1]/yunjuke/plugins/layer/skin/laypage.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="http://[::1]/yunjuke/application/admin/views/css/H-ui.min.css" />

<!--
<link type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
-->
<style type="text/css">
    html, body { overflow: visible;}
</style>

<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/common.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/script.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/zh-CN.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/admin.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/flexigrid.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.validation.min.js"></script>
<!-- <script type="text/javascript" src="http://[::1]/yunjuke/application/admin/views/js/jquery.picTip.js"></script> -->
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/layer.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/layer/laypage.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/laydate/laydate.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/select2/js/select2.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/spinner/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="http://[::1]/yunjuke/plugins/dropdown/js/dependent-dropdown.min.js"></script>

<script type="text/javascript">
/*ajax过期登录*/
function login_ajax(demo,data){
    layer.msg(data.msg);
     setTimeout(function(){
            if(demo=='agent'){
                window.location.href="http://[::1]/yunjuke/index.php/login";
            }else if(demo=='supp'){
                window.location.href="http://[::1]/yunjuke/supplier.php/login";
            }else if(demo=='admin'){
                window.location.href="http://[::1]/yunjuke/admin.php/login";
            }else if(demo=='shop'){
                window.location.href="http://[::1]/yunjuke/index.php/index/login";
            }else if(demo=='shopadmin'){
                window.location.href="http://[::1]/yunjuke/admin.php/index/login";
            }
        },2000);
}
</script>
</head>
<link href="http://[::1]/yunjuke/application/admin/views/css/admin_other.css" rel="stylesheet" type="text/css"/>
<style>
    .sign{width: 20px;height: 20px;margin: 0 10px;}
    .sign  .ico-check{
        background: url(http://[::1]/yunjuke/application/admin/views/images/flexigrid_pic.png) no-repeat 0 0;
        display: inline-block;
        width: 20px;
        height: 20px;
        cursor: pointer;
        vertical-align: middle;
    }
    tr.trSelected .sign  .ico-check{  background-position: -20px 0;}
    .ncsc-default-table thead th { font-weight:normal;line-height: 20px; color: #555; background-color: #F5F5F5; text-align:center; height: 20px; padding: 8px 0; border-bottom: solid 1px #c8c8c8;border-top: 1px solid #c8c8c8 }
    .order tbody tr td.sep-row2{height: auto;padding:8px 0;border-bottom: 1px solid #c8c8c8;background-color: #f5f5f5}
    .tDiv2 {
        font-size: 0;
        float: left;
        overflow: hidden;
        padding-left: 20px;;
    }
    .fbutton {
        vertical-align: top;
        letter-spacing: normal;
        display: inline-block;
        padding-right: 8px;
        margin-left: 8px;
        margin-right: -1px;
        border-right: dotted 1px #D7D7D7;
        cursor: pointer;
    }
    .fbutton div {
        font-size: 12px;
        line-height: 20px;
        color: #999;
        background-color: #FFFFFF;
        height: 20px;
        padding: 2px 7px;
        border: solid 1px #F0F0F0;
        border-radius: 4px;
    }
    .order tbody tr td.bdl{border-right: 1px solid #E6E6E6;vertical-align: middle}
    .order .buyer-info dt {
        width: 60px !important;
    }
</style>
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>售后管理</h3>
                <h5>商品订单售后申请及审核处理</h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a href="business_refund?role=e" ><span>处理中</span></a></li>
                <li><a href="business_refund?role=e&state=do" ><span>已处理</span></a></li>
                <li><a href="business_refund?role=e&state=alls" class="current"><span>全部</span></a></li>
            </ul>
        </div>
    </div>
    <!-- 操作说明 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
            <li>买家提交申请，商家同意并经平台确认后，退款金额以预存款的形式返还给买家（充值卡部分只能退回到充值卡余额）。</li>
        </ul>
    </div>
    <div class="mt-20 mb-10 c-666">
        <form method="get" name="formSearch" id="formSearch">
            申请时间：<input type="text" name="startime" onclick="laydate()" id="startime" class=" w120 mr-5">
            — <input type="text" name="endtime" onclick="laydate()" id="endtime" class=" w120 ml-5 mr-30">
            买家：<input type="text" name="buyer" id="" class=" w100 mr-10">
            订单编号：<input type="text" name="order_sn" id="" class=" w100">
            <input type="button" class="ml-10 btn btn-warning radius" id="searchsubmit"  value="搜索">
        </form>
    </div>
    <table class="ncsc-default-table order mt-20">
        <thead>
        <tr>
            <th class="w10">
                <div class="sign all"><i class="ico-check"></i></div>
            </th>
            <th colspan="2">商品</th>
            <th class="w100">单价（元）</th>
            <th class="w40">数量</th>
            <th class="w200">售后</th>
            <th class="w100">申请时间</th>
            <th class="w90">买家</th>
            <th class="w120">订单状态</th>
            <th class="w120">申请售后金额（元）</th>
        </tr>
        <!--			<tr>
                        <th colspan="9"  class="sep-row2">
                            <div class="tDiv2"><div class="fbutton"><div class="add" title="新增数据"><span><i class="fa fa-plus"></i>新增数据</span></div></div></div>
                        </th>
                    </tr>-->
        </thead>
        <tbody>

        </tbody>
    </table>
    <div class="flexigrid">
        <div class="pDiv">
            <div class="pDiv2">
                <div class="pGroup-left">每页最多显示
                    <select class="select prp" name="rp">
                        <option value="2"  >2&nbsp;&nbsp;</option>
                        <option value="10" >10&nbsp;&nbsp;</option>
                        <option value="15" selected="selected">15&nbsp;&nbsp;</option>
                        <option value="20" >20&nbsp;&nbsp;</option>
                        <option value="40" >40&nbsp;&nbsp;</option>
                    </select>条
                </div>
                <div class="pGroup-middle">
                    <div class="pFirst pButton" title="最前页">
                        <i class="fa fa-fast-backward"></i>
                    </div>
                    <div class="pPrev pButton" title="前一页">
                        <i class="fa fa-backward"></i>
                    </div> <span class="pcontrol">
              <input type="text" size="4" class="pcur" value="1" title="输入要跳转的页码并回车"> / <span class="ptotal">1</span>页</span>
                    <div class="pNext pButton" title="下一页"><i class="fa fa-forward"></i></div>
                    <div class="pLast pButton" title="最后页"><i class="fa fa-fast-forward"></i></div>
                </div>
                <div class="pPageStat"></div>
                <div class="pGroup-right">
            <span class="pPageStat1">共<span class="total">?</span>条记录，
                              当前页：<span class="pfrom">0</span>-<span class="pto">0</span>条</span>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>

    </div>

</div>
<script type="text/javascript">
    var isOnce = true;
    $(function(){
        // 高级搜索提交
        $('#searchsubmit').click(function(){
            getOrder_lists(1);
        });
        if(isOnce){
            getOrder_lists(1);
        }
        $('.prp').change(function(){          //页面大小
            getOrder_lists(1);
        });
        $('.pcur').bind('keydown', function (e) {    //输入框输入分页
            var key = e.which;
            if(key == 13){
                var curpage = $('.pcur').val();
                if(curpage > parseInt($('.ptotal').html())){
                    curpage = parseInt($('.ptotal').html());
                }
                getOrder_lists(curpage);
            }
        });
        $('.pPrev').click(function(){          //前一页
            if(parseInt($('.pcur').val()) == 1){
                layer.tips('已经是第一页啦', '.pPrev', {
                    tips: [1, '#3595CC'],
                    time: 3000
                })
                return false;
            }
            var curpage = parseInt($('.pcur').val())-1 > 0 ? parseInt($('.pcur').val())-1 : 1;
            getOrder_lists(curpage);
        });
        $('.pNext').click(function(){           //后一页
            if((parseInt($('.pcur').val()) == parseInt($('.ptotal').html())) || (parseInt($('.ptotal').html()) == 0)){
                layer.tips('已经是最后一页啦', '.pNext', {
                    tips: [1, '#3595CC'],
                    time: 3000
                })
                return false;
            }
            var curpage = parseInt($('.pcur').val())+1 > 0 ? parseInt($('.pcur').val())+1 : 1;
            getOrder_lists(curpage);
        });
        $('.pFirst').click(function(){          //第一页
            if(parseInt($('.pcur').val()) == 1){
                layer.tips('已经是第一页啦', '.pPrev', {
                    tips: [1, '#3595CC'],
                    time: 3000
                })
                return false;
            }
            var curpage = 1;
            getOrder_lists(curpage);
        });
        $('.pLast').click(function(){          //最后一页
            if((parseInt($('.pcur').val()) == parseInt($('.ptotal').html())) ||( parseInt($('.ptotal').html()) == 0)){
                layer.tips('已经是最后一页啦', '.pNext', {
                    tips: [1, '#3595CC'],
                    time: 3000
                })
                return false;
            }
            var curpage = parseInt($('.ptotal').html());
            getOrder_lists(curpage);
        });

    });
    function getOrder_lists(page){
        var search = '';
        if(!isOnce){
            search = $("#formSearch").serialize();
        }
        var role="e";var url='';
        var state="alls";
        if(role=='w'){
            url='business_refund?role=w&state='+state+'&'+search;
        }else if(role=='e'){
            url='business_refund?role=e&state='+state+'&'+search;
        }else if(role=='s'){
            url='business_refund?role=s&state='+state+'&'+search;
        }else {
            url='business_refund?&state='+state+'&'+search;
        }
        $.ajax({
            url:url,
            data:{
                'rp':$('.select.prp').val(),
                'curpage':page
            },
            type:'post',
            dataType:'json',
            beforeSend:function(){
                var index = layer.load(0, {shade: false},{time:0});
            },
            success: function(data){
                if(data.state=='403'){
                    login_ajax('shopadmin');
                }else
                if(data.state){
                    //组装订单列表
                    isOnce = false;
                    $('.pDiv .pcur').val(data.page_info.page);
                    $('.pDiv .ptotal').html(data.page_info.page_count);
                    $('.pDiv .total').html(data.page_info.total_num);
                    $('.pDiv .pfrom').html(data.page_info.start);
                    $('.pDiv .pto').html(data.page_info.to);
                    var blanks = '<tr><td colspan="20" class="sep-row"></td></tr>';
                    var contents = '';
                    $.each(data.returns_info,function(n,order){
                        contents += blanks+'<tr><th colspan="20">'
                            +'<span class="ml10">订单编号：<em>'+order.order_sn+'</em></span>'
                            +'</th></tr>';
                        if((order.son).length != 0){
                            $.each(order.son,function(k,goods){
                                if(!goods.goods_image){
                                    goods.goods_image = 'http://[::1]/yunjuke/data/images/default_goods_image.jpg';
                                }
                                if(k==0){
                                    contents += '<tr><td class="bdl" rowspan="'+(order.son).length+'" ><a class="sign"><i class="ico-check"></i></a></td>'
                                        +'<td class="w60"><div class="ncsc-goods-thumb"><a href="http://[::1]/yunjuke/index.php/goods/goods_details/'+goods.goods_id+'.html" target="_blank"><img src="'+goods.goods_image+'" data-geo=\'<img src="'+goods.goods_image+'" width=120px>\'></a></div></td>'
                                        +'<td><dl class="goods-name"><dt><a target="_blank" href="http://[::1]/yunjuke/index.php/goods/goods_details/'+goods.goods_id+'.html">'+goods.goods_name+'</a></dt><dd></dd></dl><dl class="goods-name"><dt>'+goods.color+'/'+goods.size+'</dt><dd></dd></dl></td>'
                                        +'<td><p>'+data_null(goods.goods_price)+'</p></td><td>'+goods.goods_num+'</td>'

                                        +'<td class="bdl" rowspan="'+(order.son).length+'">';
                                    if((order.refund_type == 1&&order.refund_state==1)||(order.refund_type == 1&&order.refund_state==2)){
                                        contents+='<p><a style="color: #0f9ae0" href="refund_details?id='+order.refund_id+'">退款处理中</a></p>';
                                    }else if(order.refund_type == 1&&order.refund_state==3){
                                        contents+='<p><a style="color: #0f9ae0" href="refund_details?id='+order.refund_id+'">退款已完成</a></p><p class="ncsc-order-amount">退款￥'+order.refund_amount+'</p>';
                                    }else if((order.refund_type == 2&&order.refund_state==1)||(order.refund_type == 2&&order.refund_state==2)){
                                        contents+='<p><a style="color: #0f9ae0" href="refund_details?id='+order.refund_id+'">退款并退货处理中</a></p>';
                                    }else if(order.refund_type == 2&&order.refund_state==3){
                                        contents+='<p><a style="color: #0f9ae0" href="refund_details?id='+order.refund_id+'">退款并退货已完成</a></p><p class="ncsc-order-amount">退款￥'+order.refund_amount+'</p>';
                                    }else if(order.refund_state==4){
                                        contents+='<p><a style="color: #0f9ae0" href="refund_details?id='+order.refund_id+'">会员主动取消</a></p>';
                                    }
                                    contents+='</td>'
                                        +'<td class="bdl" rowspan="'+(order.son).length+'"><p></p><p>'+order.add_time+'</p></td>'
                                        +'<td class="bdl" rowspan="'+(order.son).length+'"><p></p><p>'+order.buyer_name+'</p></td>';

                                    if(order.order_status == 0){
                                        order.true_order_status = '已取消';
                                    }else if(order.order_status == 10){
                                        order.true_order_status = '未付款';
                                    }else if(order.order_status == 20){
                                        order.true_order_status = '已付款';
                                    }else if(order.order_status == 30 ){
                                        order.true_order_status = '已发货';
                                    }else if(order.order_status == 40 ){
                                        order.true_order_status = '已收货';
                                    }else if(order.order_status == 50){
                                        order.true_order_status = '已完成';
                                    }else{
                                        order.true_order_status = '未知';
                                    }
                                    contents+='<td class="bdl bdr" rowspan="'+(order.son).length+'"><p>'+order.true_order_status+'</p><p></p></td>'+
                                        '<td class="bdl bdr" rowspan="'+(order.son).length+'"><p>'+order.refund_amount_apply+'</p><p></p></td>'+
                                        +'</tr>';
                                }else{
                                    contents += '<tr><td class="w70">'
                                        +'<div class="ncsc-goods-thumb"><a href="http://[::1]/yunjuke/index.php/goods/goods_details/'+goods.goods_id+'.html" target="_blank"><img src="'+goods.goods_image+'"'
                                        +'onmouseover="toolTip(\'<img src='+goods.goods_image+'>\')"'
                                        +'onmouseout="toolTip()"></a></div></td>'
                                        +'<td class="tl"><dl class="goods-name"><dt><a target="_blank" href="http://[::1]/yunjuke/index.php/goods/goods_details/'+goods.goods_id+'.html">'+goods.goods_name+'</a></dt>'
                                        +'<dd></dd></dl><dl class="goods-name"><dt>'+goods.color+'/'+goods.size+'</dt><dd></dd></dl></td><td><p>'+goods.goods_price+'</p></td><td>'+goods.goods_num+'</td></tr>';
                                }
                            });
                        }
                    });
                    $(".ncsc-default-table.order tbody").html(contents);
                    //标记订单
                    $("tr").delegate(".sign","click",function(){
                        if($(this).parents("tr").hasClass('trSelected')){
                            if($(this).hasClass("all")){
                                $(".sign").parents("tr").removeClass("trSelected")
                            }else{
                                $(this).parents("tr").removeClass("trSelected")
                            }
                        }else{
                            if($(this).hasClass("all")){
                                $(".sign").parents("tr").addClass("trSelected")
                            }else{
                                $(this).parents("tr").addClass("trSelected")
                            }
                        }
                    })
                    $("img").error(function(){
                        $(this).attr("src", "http://[::1]/yunjuke/data/images/default_goods_image.jpg");
                        $(this).attr("data-geo", "<img src='http://[::1]/yunjuke/data/images/default_goods_image.jpg' width=120px>");
                    });
                }else{
                    $('.pDiv .pcur').val(1);
                    $('.pDiv .ptotal').html(1);
                    $('.pDiv .total').html(0);
                    $('.pDiv .pfrom').html(0);
                    $('.pDiv .pto').html(0);
                    var contents = '<tr><td colspan="100" class="no-data"><i class="fa fa-exclamation-circle"></i>没有符合条件的记录</td></tr>';
                    $(".ncsc-default-table.order tbody").html(contents);
                }
            },
            complete: function(XHR, TS){
                layer.closeAll('loading'); //关闭加载层
            }
        });
    }

</script>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
