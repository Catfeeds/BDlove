<?php
/* Smarty version 3.1.29, created on 2017-09-05 14:25:25
  from "D:\www\yunjuke\application\pay\views\out_order_detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59ae435514bb83_65214258',
  'file_dependency' => 
  array (
    '0c6f206c4640648878e5df6afb3e101637311623' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\out_order_detail.html',
      1 => 1501139449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_59ae435514bb83_65214258 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2961159ae4354df5df4_38607647';
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
  .ncap-order-flow li i {
    top: 11px;
}
.fa-arrow-circle-right:last-child{
	display: none;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
	<nav class="breadcrumb">
		    <i class="Hui-iconfont">&#xe67f;</i> 订单管理 <span class="c-gray en p-lr">&gt;</span><a href="order_management" style="display: inline-block;color: #333;">订单管理</a><span class="c-gray en p-lr">&gt;</span>订单详情
		    &nbsp;<a href="javascript:;" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
		    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top: 3px;" href="javascript:location.replace(location.href);" title="刷新" >
		        <i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>

<div class="page" style="padding-top: 20px;">

    <div class="ncap-order-style mb-20">
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
                <li class="">
                    <h5>完成</h5>
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
echo $_smarty_tpl->tpl_vars['order']->value['pay_sn'];
}?>
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
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['shipping'];?>
</dd> 
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
                        <dd></dd>
                        <dt>发货时间：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['delivery_date'];?>
</dd>
                    </dl>
                    <dl>
                        <dt>快递公司：</dt>
                        <dd><?php echo $_smarty_tpl->tpl_vars['order']->value['express_name'];?>
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
$_from = $_smarty_tpl->tpl_vars['info']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_goods_0_saved_item = isset($_smarty_tpl->tpl_vars['goods']) ? $_smarty_tpl->tpl_vars['goods'] : false;
$_smarty_tpl->tpl_vars['goods'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['goods']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['goods']->value) {
$_smarty_tpl->tpl_vars['goods']->_loop = true;
$__foreach_goods_0_saved_local_item = $_smarty_tpl->tpl_vars['goods'];
?>
                        <tr>
                            <td class="w30"><div class="goods-thumb"><a href="" target="_blank"><img alt="" src="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_image'];?>
"> </a></div></td>
                            <td style="text-align: left;"><a href="" target="_blank"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_name'];?>
</a><span class="rec"><a target="_blank" href="">[交易快照]</a></span><br></td>
                            <td class="w80">￥<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_price'];?>
</td>
                            <td class="w80">￥<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_pay_price'];?>
</td>
                            <td class="w60"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_num'];?>
</td>
                        </tr>
                        <?php
$_smarty_tpl->tpl_vars['goods'] = $__foreach_goods_0_saved_local_item;
}
if ($__foreach_goods_0_saved_item) {
$_smarty_tpl->tpl_vars['goods'] = $__foreach_goods_0_saved_item;
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
                    <?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_type'] == 1) {?><h4>(运费：￥<?php if ($_smarty_tpl->tpl_vars['order']->value['carriage'] > 0) {
echo $_smarty_tpl->tpl_vars['order']->value['carriage'];
} else {
echo $_smarty_tpl->tpl_vars['order']->value['create_carriage'];
}?>)</h4><?php }?>
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
	
	$("#goback").click(function(){
		window.history.back();
	})
	
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
