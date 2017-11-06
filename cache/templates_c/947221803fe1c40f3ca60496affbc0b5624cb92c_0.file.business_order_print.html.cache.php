<?php
/* Smarty version 3.1.29, created on 2017-08-01 14:25:42
  from "D:\www\yunjuke\application\admin\views\business_order_print.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59801ee6d41637_81725129',
  'file_dependency' => 
  array (
    '947221803fe1c40f3ca60496affbc0b5624cb92c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\business_order_print.html',
      1 => 1498098958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59801ee6d41637_81725129 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1169659801ee6b8fc55_41352760';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>
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
                        <td class="w200">收货人：<?php echo $_smarty_tpl->tpl_vars['order']->value['receive_name'];?>
</td>
                        <td>电话：<?php echo $_smarty_tpl->tpl_vars['order']->value['receive_tel'];?>
</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">地址：<?php echo $_smarty_tpl->tpl_vars['order']->value['receive_address'];?>
</td>
                    </tr>
                    <tr>
                        <td>订单号：<?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
</td>
                        <td>下单时间：<?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['order']->value['created_time']);?>
</td>
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
                    <?php
$_from = $_smarty_tpl->tpl_vars['order']->value['son'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_goods_0_saved_item = isset($_smarty_tpl->tpl_vars['goods']) ? $_smarty_tpl->tpl_vars['goods'] : false;
$__foreach_goods_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['goods'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['goods']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['goods']->value) {
$_smarty_tpl->tpl_vars['goods']->_loop = true;
$__foreach_goods_0_saved_local_item = $_smarty_tpl->tpl_vars['goods'];
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
                        <td class="tl"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_name'];?>
</td>
                        <td class="tl">¥<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
</td>
                        <td class="goods_num"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_num'];?>
</td>
                        <td class="tl">¥<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
</td>
                    </tr>
                    <?php
$_smarty_tpl->tpl_vars['goods'] = $__foreach_goods_0_saved_local_item;
}
if ($__foreach_goods_0_saved_item) {
$_smarty_tpl->tpl_vars['goods'] = $__foreach_goods_0_saved_item;
}
if ($__foreach_goods_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_goods_0_saved_key;
}
?>
                    <tr>
                        <th></th>
                        <th colspan="2" class="tl">合计</th>
                        <th id="total">0</th>
                        <th class="tl">¥<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
</th>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="10"><span>总计：¥<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
</span>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_type'] == 1) {?>
                            <span>运费：¥<?php echo $_smarty_tpl->tpl_vars['order']->value['carriage'];?>
</span>
                            <?php } else { ?>
                            <span>运送方式：自提</span>
                            <?php }?>
                            <span>优惠：¥<?php echo $_smarty_tpl->tpl_vars['order']->value['counpon_amount']+$_smarty_tpl->tpl_vars['order']->value['integral_amount'];?>
</span>
                            <span>订单总额：¥<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
</span><span><?php echo $_smarty_tpl->tpl_vars['order']->value['store_name'];?>
</span>
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
<?php echo '<script'; ?>
 type="text/javascript">

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
<?php echo '</script'; ?>
> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
</html><?php }
}
