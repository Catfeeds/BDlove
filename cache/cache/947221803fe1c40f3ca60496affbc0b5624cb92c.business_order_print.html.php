<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:25:42
  from "D:\www\yunjuke\application\admin\views\business_order_print.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59801ee6e2bc63_72963208',
  'file_dependency' => 
  array (
    '947221803fe1c40f3ca60496affbc0b5624cb92c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\business_order_print.html',
      1 => 1498098958,
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
function content_59801ee6e2bc63_72963208 ($_smarty_tpl) {
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
<body style="background-color: #FFF; overflow: auto;">
<div class="print-layout">
    <div class="print-btn" id="printbtn" title="选择喷墨或激光打印机<br/>根据下列纸张描述进行<br/>设置并打印发货单据"><i></i><a href="javascript:void(0);">打印</a></div>
    <div class="a5-size"></div>
    <dl class="a5-tip">
        <dt>
        <h1>A5</h1>
        <em>Size: 210mm x 148mm</em></dt>
        <dd>当打印设置选择A5纸张、横向打印、无边距时每张A5打印纸可输出1页订单。</dd>
    </dl>
    <div class="a4-size"></div>
    <dl class="a4-tip">
        <dt>
        <h1>A4</h1>
        <em>Size: 210mm x 297mm</em></dt>
        <dd>当打印设置选择A4纸张、竖向打印、无边距时每张A4打印纸可输出2页订单。</dd>
    </dl>
    <div class="print-page">
        <div id="printarea">
            <div class="orderprint">
                <div class="top">
                    <div class="full-title"> 发货单</div>
                </div>
                <table class="buyer-info">
                    <tbody><tr>
                        <td class="w200">收货人：王唐轲123456</td>
                        <td>电话：</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">地址：pomposity</td>
                    </tr>
                    <tr>
                        <td>订单号：3074554902962951</td>
                        <td>下单时间：2017-08-01 11:42:42</td>
                        <td></td>
                    </tr>
                    </tbody></table>
                <table class="order-info">
                    <thead>
                    <tr>
                        <th class="w40">序号</th>
                        <th class="tl">商品名称</th>
                        <th class="w70 tl">单价(元)</th>
                        <th class="w50">数量</th>
                        <th class="w70 tl">小计(元)</th>
                    </tr>
                    </thead>
                    <tbody>
                                        <tr>
                        <td>1</td>
                        <td class="tl">ABC KIDS深灰其他</td>
                        <td class="tl">¥39.00</td>
                        <td class="goods_num">1</td>
                        <td class="tl">¥39.00</td>
                    </tr>
                                        <tr>
                        <th></th>
                        <th colspan="2" class="tl">合计</th>
                        <th id="total">0</th>
                        <th class="tl">¥39.00</th>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="10"><span>总计：¥39.00</span>
                                                        <span>运费：¥0.00</span>
                                                        <span>优惠：¥0</span>
                            <span>订单总额：¥39.00</span><span>ABC旗舰店</span>
                        </th>
                    </tr>
                    </tfoot>
                </table>
                <div class="explain">
                </div>
<!--                <div class="tc page">第1页/共1页</div>-->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(function(){
        $("#printbtn").click(function(){
            $("#printarea").printArea();
        });
        var total = 0;
        $('.goods_num').each(function(){
            total += $(this).text()*1;
        });
        $('#total').html(total);
    });
    /*打引 插件*/
    (function($) {
        var printAreaCount = 0;
        $.fn.printArea = function()
        {
            var ele = $(this);
            var idPrefix = "printArea_";
            removePrintArea( idPrefix + printAreaCount );
            printAreaCount++;
            var iframeId = idPrefix + printAreaCount;
            var iframeStyle = 'position:absolute;width:0px;height:0px;left:-730px;top:-730px;';
            iframe = document.createElement('IFRAME');
            $(iframe).attr({ style : iframeStyle,id    : iframeId});
            document.body.appendChild(iframe);
            var doc = iframe.contentWindow.document;
            $(document).find("link").filter(function(){
                return $(this).attr("rel").toLowerCase() == "stylesheet";
            }).each(function(){
                doc.write('<link type="text/css" rel="stylesheet" href="' + $(this).attr("href") + '" >');
            });
            doc.write('<div class="' + $(ele).attr("class") + '">' + $(ele).html() + '</div>');
            doc.close();
            var frameWindow = iframe.contentWindow;
            frameWindow.close();
            frameWindow.focus();
            frameWindow.print();
        }
        var removePrintArea = function(id){
            $( "iframe#" + id ).remove();
        };
    })(jQuery);
</script> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
