<?php
/* Smarty version 3.1.29, created on 2017-07-29 17:49:33
  from "D:\www\yunjuke\application\pay\views\refund_detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_597c5a2dba0052_28793683',
  'file_dependency' => 
  array (
    '7148c1ee52396af90129d210c5cbe7ff80773f7c' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\pay\\views\\refund_detail.html',
      1 => 1501321768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pageheader.html' => 1,
  ),
),false)) {
function content_597c5a2dba0052_28793683 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '31625597c5a2da2ce81_25678066';
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
  .ncap-order-style {
	width:100%;
	}
	.ncap-order-details {
    border: none;
}
.cl-red{
	color: red;
}
.total-amount{
	border-bottom: 1px solid #e6e6e6;
}
.propmt{
	border-bottom: 1px solid #e6e6e6;
	padding: 20px 0;
}
.ncap-order-flow{
	margin-bottom: 30px;
}
.show{
	border: 1px solid #ffe5b1;
	background: #fff3db;
	padding: 10px;
	border-radius: 4px;
}
.style{
	color: #999;
}
.num{
	color: #c53929;
}
</style>
<body style="background-color: #FFF; overflow: auto;">
	<nav class="breadcrumb">
	    <i class="Hui-iconfont">&#xe67f;</i> 订单管理 <span class="c-gray en p-lr">&gt;</span>售后管理<span class="c-gray en p-lr">&gt;</span>售后管理—详情
	    &nbsp;<a href="javascript:;" id="goback"><i class="iconfont" style="font-size: 13px;">&#xe670;</i>返回</a>
	    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
	    <i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
<div class="page" style="padding-top: 20px;">
    <div class="fixed-bar">
    </div>
    <div class="ncap-order-style">
        <div class="ncap-order-flow">

            <ol class="num5">
                <li class="current">
                    <h5>生成订单</h5>
                    <i class="fa fa-arrow-circle-right mt-10"></i>
                    <time>2017-05-12 12:21:31</time>
                </li>
                <li class="current">
                    <h5>完成付款</h5>
                    <i class="fa fa-arrow-circle-right mt-10"></i>
                </li>
<!--                <li class="<?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_time'] != 0) {?>current<?php }?>">
                    <h5>商家发货</h5>
                    <i class="fa fa-arrow-circle-right"></i>
                    <time><?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_time'] != 0) {
echo $_smarty_tpl->tpl_vars['order']->value['shipping_time'];
}?></time>
                </li>-->
                <li class="current">
                    <h5>收货确认</h5>
                    <i class="fa fa-arrow-circle-right mt-10"></i>
                </li>
                <li class="current">
                    <h5>完成评价</h5>
                </li>
            </ol>
        </div>

        <div class="ncap-order-details">
            <div class="tabs-panels">
                <div class="misc-info">
                    <h4>售后详情</h4>
                    <dl>
                        <!--<dt>收银单号：</dt>
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
                        </dd>-->
                        <dt>售后类型：</dt>
                        <dd class="cl-red">退款并退货</dd>
                    </dl>
                    <dl>
                        <dt>退款金额：</dt>
                        <dd class="cl-red">￥93.6</dd>
                    </dl>
                </div>
                <div class="addr-note">
                    <h4>订单信息</h4>
                    <dl>
                        <dt>买家：</dt>
                        <dd>张XX</dd>
                        <dt>联系方式：</dt>
                        <dd>13888888888</dd>
                        <dt>归属店铺：</dt>
                        <dd>大头儿子店</dd>
                        <dt>导购归属：</dt>
                        <dd>李洋</dd>
                    </dl>
                    <dl>
                        <dt>收货地址：</dt>
                        <dd style="min-width: 500px;">浙江省金华市婺城区永康街697号东侧二楼</dd>
                        <dt>卖家留言：</dt>
                        <dd>我不喜欢这款</dd>
                    </dl>
                    <dl>
                        <dt>收银单号：</dt>
                        <dd class="more">320554507426884066 更多</a>
                        	<div class="moreinfo">
                        		<div class="info">
                        			<div class="nav"></div>
                        		</div>
                        	</div>
                        </dd>
                        <dt>订单来源：</dt>
                        <dd>电商手工</dd>
                        <dt>下单时间：</dt>
                        <dd>2017-07-27 21:05:26</dd>
                        <dt>发货时间：</dt>
                        <dd>2017-07-27 21:05:26</dd>
                    </dl>
                    <dl>
                        <dt>订单号：</dt>
                        <dd>320554507426884066</dd>
                        <dt>运送方式：</dt>
                        <dd>快递</dd>
                        <dt>支付时间：</dt>
                        <dd>2017-07-27 21:05:26</dd>
                        <dt>物流单号：</dt>
                        <dd>32511212</dd>
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
                        <tr>
                            <td class="w30"><div class="goods-thumb"><a href="" target="_blank"><img alt="" src=""> </a></div></td>
                            <td style="text-align: left;"><a href="" target="_blank"></a><span class="rec"><a target="_blank" href="">[交易快照]</a></span><br></td>
                            <td class="w80">￥12</td>
                            <td class="w80">￥12</td>
                            <td class="w60">12</td>
                        </tr>
                        <!-- S 赠品列表 -->
                        <!-- E 赠品列表 -->
                        </tbody>
                        <!-- S 促销信息 -->
                        <!-- E 促销信息 -->
                    </table>
                </div>
                <div class="total-amount">
                    <h3>订单总额：<strong class="red_common">￥12</strong></h3>
                    <h4>(运费：￥12)</h4>
                    <h3>返点比例：<strong class="red_common">12</strong>返点金额：<strong class="red_common">￥12</strong></h3>
                    
                </div>
                <div class="propmt">
                	<p class="f-16">买家已退货，请确认收货</p>
                	<p>买家已退货，快递公司：EMS快递，快递单号：12335548966</p>
                	<p>若已收到货请确认收货并退款，若未收货请点击"未收到货驳回"，驳回后，买家将重新填写退货单号</p>
                	<button class="btn btn-danger radius after1">已收到货同意退款</button>
                	<button class="btn btn-primary radius after2">未收到货驳回</button>
                	<button class="btn btn-secondary radius">内部备注</button>
                </div>
                <div class="talkhistory">
                	
                </div>
            </div>
        </div>
    </div>
</div>
<!--聚客o2o2s  新零售全渠道管理系统-->
<?php echo '<script'; ?>
 type="text/javascript">

<?php echo '</script'; ?>
>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
<?php echo '<script'; ?>
 type="text/javascript">
	$(".after1").click(function(){
		var content = '<div style="margin:25px 60px">'+
		'<p class="show">您正在同意退款申请，同意退款后，退款将在3个工作日原路返回买家支付宝账户。</p>'+
		'<p>处理方式：<span class="style">退款并退货</span></p>'+
		'<p>退款金额：<span class="num">￥59.40</span></p>'+
		'<p>登录密码：<input type="text" style="width: 200px;" /></p>'+
		'<div style="clear:both;margin-bottom:20px"></div>'+
		'<button class="btn btn-warning radius" style="margin-left:70px">确定</button>'+
		'<button class="btn btn-default radius ml-50">取消</button>'+
		'</div>';
		layer.open({
			type: 1,
			title: '<b>处理售后</b>',
			skin: 'layui-layer-rim', //加上边框n
			area: ['650px', 'auto'], //宽高
			content: content,
		})
	})
	
	$(".after2").click(function(){
		var content = '<div style="margin:25px 60px">'+
		'<p class="show">您正在同意退款申请，同意退款后，退款将在3个工作日原路返回买家支付宝账户。</p>'+
		'<p>处理方式：<span class="style">退款并退货</span></p>'+
		'<p>退款金额：<span class="num">￥59.40</span></p>'+
		'<p>登录数量：<input type="text" style="width: 80px;" /></p>'+
		'<p style="width:70px;float:left">登录密码：</p><textarea name="" rows="" cols="" style="width:400px;height:100px"></textarea>'+
		'<div style="clear:both;margin-bottom:20px"></div>'+
		'<button class="btn btn-warning radius" style="margin-left:70px">确定</button>'+
		'<button class="btn btn-default radius ml-50">取消</button>'+
		'</div>';
		layer.open({
			type: 1,
			title: '<b>处理售后</b>',
			skin: 'layui-layer-rim', //加上边框n
			area: ['650px', 'auto'], //宽高
			content: content,
		})
	})
<?php echo '</script'; ?>
>
</html><?php }
}
