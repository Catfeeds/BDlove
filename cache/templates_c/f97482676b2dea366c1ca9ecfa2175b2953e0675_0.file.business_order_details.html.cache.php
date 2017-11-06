<?php
/* Smarty version 3.1.29, created on 2017-07-29 14:41:23
  from "D:\www\yunjuke\application\admin\views\business_order_details.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597c2e1306fae8_13714679',
  'file_dependency' => 
  array (
    'f97482676b2dea366c1ca9ecfa2175b2953e0675' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\admin\\views\\business_order_details.html',
      1 => 1501296195,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597c2e1306fae8_13714679 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '17149597c2e12d73ad8_21014885';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:pageheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo TEMPLE;?>
css/admin_other.css" rel="stylesheet" type="text/css"/>
<style>
	.more{
		position: relative;
	}
	.more a{
		color: #27A9E3;
	}
	.moreinfo{
		position: absolute;
		top: 30px;
		left: 0;
		display: none;
	}
	.info {
   position  :relative;
   width   :250px;
   padding: 10px;
   background :#fff;
   border  :1px solid #ddd;
   border-radius :4px;
  }
  .nav {
   position   :absolute;
   top    :-8px;
   left    :120px;
   overflow   :hidden;
   width    :13px;
   height   :13px;
   background  :#fff;
   border-left  :1px solid #ddd;
  border-top  :1px solid #ddd;
  -webkit-transform :rotate(45deg);
  -moz-transform :rotate(45deg);
  -o-transform  :rotate(45deg);
   transform   :rotate(45deg);
  }
</style>
<body style="background-color: #FFF; overflow: auto;">

<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="javascript:history.back(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>商品订单</h3>
                <h5>商城实物商品交易订单查询及管理</h5>
            </div>
        </div>
    </div>
    <div class="ncap-order-style">
        <div class="titile">
            <h3></h3>
        </div>
        <div class="ncap-order-flow">

            <ol class="num5">
                <li class="current">
                    <h5>生成订单</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time><?php echo $_smarty_tpl->tpl_vars['order']->value['created_time'];?>
</time>
                </li>
                <li class="<?php if ($_smarty_tpl->tpl_vars['order']->value['pay_time'] != 0) {?>current<?php }?>">
                    <h5>完成付款</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time><?php if ($_smarty_tpl->tpl_vars['order']->value['pay_time'] != 0) {
echo $_smarty_tpl->tpl_vars['order']->value['pay_time'];
}?></time>
                </li>
<!--                <li class="<?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_time'] != 0) {?>current<?php }?>">
                    <h5>商家发货</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time><?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_time'] != 0) {
echo $_smarty_tpl->tpl_vars['order']->value['shipping_time'];
}?></time>
                </li>-->
                <li class="<?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] >= 40) {?>current<?php }?>">
                    <h5>收货确认</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time><?php echo $_smarty_tpl->tpl_vars['order']->value['receive_time'];?>
</time>
                </li>
                <li class="<?php if ($_smarty_tpl->tpl_vars['order']->value['evaluation_time'] != 0) {?>current<?php }?>">
                    <h5>完成评价</h5>
                    <time><?php if ($_smarty_tpl->tpl_vars['order']->value['evaluation_time'] != 0) {
echo $_smarty_tpl->tpl_vars['order']->value['evaluation_time'];
}?></time>
                </li>
            </ol>
        </div>

        <div class="ncap-order-details">
            <ul class="tabs-nav">
                <li class="current"><a href="javascript:void(0);">订单详情</a></li>
            </ul>
            <div class="tabs-panels">
                <div class="misc-info">
                    <h4>下单/支付</h4>
                    <dl>
                        <dt>收银单号：</dt>
                        <dd class="more"><?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] > 10) {
echo $_smarty_tpl->tpl_vars['order']->value['pay_sn'];?>
<a href="javascript:;"> 更多</a>
                        	<div class="moreinfo">
                        		<div class="info">
                        			<div class="nav"></div>
                        			<?php
$_from = $_smarty_tpl->tpl_vars['order']->value['pay_log'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_log_0_saved_item = isset($_smarty_tpl->tpl_vars['log']) ? $_smarty_tpl->tpl_vars['log'] : false;
$_smarty_tpl->tpl_vars['log'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['log']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['log']->value) {
$_smarty_tpl->tpl_vars['log']->_loop = true;
$__foreach_log_0_saved_local_item = $_smarty_tpl->tpl_vars['log'];
?>
                        			<p>支付流水号：<?php echo $_smarty_tpl->tpl_vars['log']->value['mtcn_sn'];?>
,支付方式：<?php echo $_smarty_tpl->tpl_vars['log']->value['pay_type'];?>
,金额：<?php echo $_smarty_tpl->tpl_vars['log']->value['pay_num'];?>
</p>
                        			<?php
$_smarty_tpl->tpl_vars['log'] = $__foreach_log_0_saved_local_item;
}
if ($__foreach_log_0_saved_item) {
$_smarty_tpl->tpl_vars['log'] = $__foreach_log_0_saved_item;
}
?>
                        		</div>
                        	</div><?php }?>
                        </dd>
                        <dt>订单来源：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['order_type_'];?>
</dd>
                        <dt>下单时间：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['created_time'];?>
</dd>
                    </dl>
                    <dl>
                        <dt>订单号：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
</dd>
                        
                        <dt>运送方式：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['shipping'];
if ($_smarty_tpl->tpl_vars['order']->value['shipping_type'] == 2) {?>　　提货码：<?php echo $_smarty_tpl->tpl_vars['order']->value['pickup_code'];
}?></dd> 
                        <dt>支付时间：</dt>
                        <dd><?php if (!empty($_smarty_tpl->tpl_vars['order']->value['pay_time'])) {
echo $_smarty_tpl->tpl_vars['order']->value['pay_time'];
}?></dd>
                    </dl>
                    <!-- <dl>
                        <dt>支付日志：</dt>
                        <dd>买家 支付订单</dd>
                    </dl> -->
                </div>
                <div class="addr-note">
                    <h4>购买/收货方信息</h4>
                    <dl>
                        <dt>买家：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['receive_name'];?>
</dd>
                        <dt>联系方式：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['receive_mobile'];?>
</dd>
                    </dl>
                    <dl>
                        <dt>收货地址：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['province'];
echo $_smarty_tpl->tpl_vars['order']->value['city'];
echo $_smarty_tpl->tpl_vars['order']->value['area'];
echo $_smarty_tpl->tpl_vars['order']->value['receive_address'];?>
</dd>
                    </dl>
                    <!-- <dl>
                        <dt>发票信息：</dt>
                        <dd>
                            <ul>
                                <li><strong>类型：</strong>普通发票 </li>
                                <li><strong>抬头：</strong>个人</li>
                                <li><strong>内容：</strong>明细</li>
                            </ul>
                        </dd>
                    </dl> -->
                    <dl>
                        <dt>买家留言：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['buyer_memo'];?>
</dd>
                    </dl>
                </div>

                <div class="contact-info">
                    <h4>销售/发货方信息</h4>
                    <dl>
                        <dt>店铺名称：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['store_name'];?>
</dd>
                        <dt>联系电话：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['ous_tel'];?>
</dd>
                    </dl>
                    <dl>
                        <dt>发货地址：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['province'];
echo $_smarty_tpl->tpl_vars['order']->value['city'];
echo $_smarty_tpl->tpl_vars['order']->value['area'];
echo $_smarty_tpl->tpl_vars['order']->value['receive_address'];?>
</dd>
                        <dt>发货时间：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_date'];?>
</dd>
                    </dl>
                    <dl>
                        <dt>快递公司：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['logistics_company_name'];?>
</dd>
                        <dt>物流单号：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['waybill_sn'];?>

                        </dd>
                    </dl>
                </div>


                <div class="goods-info">
                    <h4>商品信息</h4>
                    <table>
                        <thead>
                        <tr>
                            <th colspan="2">商品</th>
                            <th>单价</th>
                            <th>实际支付单价</th>
                            <th>数量</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->tpl_vars['order']->value['son'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_goods_1_saved_item = isset($_smarty_tpl->tpl_vars['goods']) ? $_smarty_tpl->tpl_vars['goods'] : false;
$_smarty_tpl->tpl_vars['goods'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['goods']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['goods']->value) {
$_smarty_tpl->tpl_vars['goods']->_loop = true;
$__foreach_goods_1_saved_local_item = $_smarty_tpl->tpl_vars['goods'];
?>
                        <tr>
                            <td class="w30"><div class="goods-thumb"><a href="<?php echo base_url();?>
index.php/goods/goods_details/<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_id'];?>
.html" target="_blank"><img alt="" src="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_image'];?>
"> </a></div></td>
                            <td style="text-align: left;"><a href="<?php echo base_url();?>
index.php/goods/goods_details/<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_id'];?>
.html" target="_blank"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_name'];?>
</a><span class="rec"><a target="_blank" href="">[交易快照]</a></span><br></td>
                            <td class="w80">￥<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
</td>
                            <td class="w80">￥<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_pay_price'];?>
</td>
                            <td class="w60"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_num'];?>
</td>
                        </tr>
                        <?php
$_smarty_tpl->tpl_vars['goods'] = $__foreach_goods_1_saved_local_item;
}
if ($__foreach_goods_1_saved_item) {
$_smarty_tpl->tpl_vars['goods'] = $__foreach_goods_1_saved_item;
}
?>
                        <!-- S 赠品列表 -->
                        <!-- E 赠品列表 -->
                        </tbody>
                        <!-- S 促销信息 -->
                        <!-- E 促销信息 -->
                    </table>
                </div>
                <div class="total-amount">
                    <h3>订单总额：<strong class="red_common">￥<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
</strong></h3>
                    <?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_type'] == 1) {?><h4>(运费：￥<?php echo $_smarty_tpl->tpl_vars['order']->value['carriage'];?>
)</h4><?php }?>
                    <h3>返点比例：<strong class="red_common"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['order']->value['rebate']);?>
</strong>返点金额：<strong class="red_common">￥<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['order']->value['rebate_amount']*$_smarty_tpl->tpl_vars['order']->value['rebate']);?>
</strong></h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">

<?php echo '</script'; ?>
> 
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
	var i=1;
	$(".more a").click(function(){
		$(".moreinfo").toggle();
//		阻止冒泡
		return false;
	})
	$("body").click(function(){
		$(".moreinfo").hide();
	})
	$("img").error(function(){ 
          $(this).attr("src", "<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
"); 
          $(this).attr("data-geo", "<img src='<?php echo PLUGIN;?>
data/images/<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
' width=120px>"); 
    }); 
<?php echo '</script'; ?>
>
</html><?php }
}
