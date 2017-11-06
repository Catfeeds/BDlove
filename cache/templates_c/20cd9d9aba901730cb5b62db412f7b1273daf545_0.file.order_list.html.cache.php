<?php
/* Smarty version 3.1.29, created on 2017-10-17 14:53:55
  from "D:\www\yunjuke\application\vmall\views\order_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e5a9035257d1_32395599',
  'file_dependency' => 
  array (
    '20cd9d9aba901730cb5b62db412f7b1273daf545' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\order_list.html',
      1 => 1508223226,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink.html' => 1,
  ),
),false)) {
function content_59e5a9035257d1_32395599 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1848959e5a90300cb90_00530101';
?>
<html lang="zh-cn" style="opacity: 1; font-size: 200px;" class="view6s">

	<head>
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<title>我的订单</title>
			<style>
				.orderList {
					border: none;
					-webkit-box-shadow: 0 1px 1px -1px rgba(0, 0, 0, 0.3);
					box-shadow: 0 1px 1px -1px rgba(0, 0, 0, 0.3);
					padding-left: 0;
				}
				
				.s-options .s-items li {
					min-width: 52px;
				}
				
				.orderList .tit {
					line-height: 36px;
					padding: 5px 0 5px 10px;
					height: 36px;
					color: #333!important;
				}
				.orderList .action {
					padding: 5px 15px 8px 10px;
				}
				.orderform{
					color: #999;
					margin-left: 10px;
				}
				@media screen and (max-width: 350px) {
					.orderList .tit {
						font-size: 13px;
				}
				}
				.btn {
				    padding: 3px 10px!important;
				    margin-left: 5px;
				    border: 1px solid #999;
				}
				.btn-color{
					border: 1px solid red;
					color: red!important;
				}
			</style>

	</head>

	<body>
		<section class="s-options mb10">
			<ul class="s-items">
				<li>
					<a data-type="" href="<?php echo base_url('vmall.php/order/');?>
index" class="<?php if (empty($_smarty_tpl->tpl_vars['type']->value)) {?>curr<?php }?>"><span>全部</span></a>
				</li>
				<li>
					<a data-type="" href="<?php echo base_url('vmall.php/order/');?>
index/1" class="<?php if ($_smarty_tpl->tpl_vars['type']->value == 1) {?>curr<?php }?>"><span>待付款</span></a>
				</li>
				<li>
					<a data-type="" href="<?php echo base_url('vmall.php/order/');?>
index/2" class="<?php if ($_smarty_tpl->tpl_vars['type']->value == 2) {?>curr<?php }?>"><span>待收货</span></a>
				</li>
				<li>
					<a data-type="" href="<?php echo base_url('vmall.php/order/');?>
index/3" class="<?php if ($_smarty_tpl->tpl_vars['type']->value == 3) {?>curr<?php }?>"><span>待提货</span></a>
				</li>
				<li>
					<a data-type="" href="<?php echo base_url('vmall.php/order/');?>
index/4" class="<?php if ($_smarty_tpl->tpl_vars['type']->value == 4) {?>curr<?php }?>"><span>待评价</span></a>
				</li>
				<li>
					<a data-type="" href="<?php echo base_url('vmall.php/order/');?>
index/5" class="<?php if ($_smarty_tpl->tpl_vars['type']->value == 5) {?>curr<?php }?>"><span>已关闭</span></a>
				</li>
			</ul>
		</section>

		<section id="tempContent">
		    <?php if (empty($_smarty_tpl->tpl_vars['rows']->value)) {?>
		    <section class="noResult"><span class="order">没有订单记录</span></section>
		    <?php } else { ?>
            <?php
$_from = $_smarty_tpl->tpl_vars['rows']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_order_0_saved_item = isset($_smarty_tpl->tpl_vars['order']) ? $_smarty_tpl->tpl_vars['order'] : false;
$_smarty_tpl->tpl_vars['order'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['order']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
$__foreach_order_0_saved_local_item = $_smarty_tpl->tpl_vars['order'];
?>
			<section class="orderList" onclick="gotoDetail(this)" data-id="<?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
">
				<div class="tit">
					
					<?php if ($_smarty_tpl->tpl_vars['order']->value['order_type'] == 3) {?>
					<p>订单编号：<?php echo $_smarty_tpl->tpl_vars['order']->value['out_order_sn'];?>

						<span class="orderform"><?php echo $_smarty_tpl->tpl_vars['order']->value['bind_ecstore_name'];?>
<span>
						<span class="status">
 						<?php if ($_smarty_tpl->tpl_vars['order']->value['order_type'] == 3) {?>
						<?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_type'] == 1) {
echo $_smarty_tpl->tpl_vars['order_status1']->value[$_smarty_tpl->tpl_vars['order']->value['uec_order_status']];
} else {
echo $_smarty_tpl->tpl_vars['order_status2']->value[$_smarty_tpl->tpl_vars['order']->value['uec_order_status']];
}?>
						<?php } else { ?>
						<?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_type'] == 1) {
echo $_smarty_tpl->tpl_vars['order_status1']->value[$_smarty_tpl->tpl_vars['order']->value['order_status']];
} else {
echo $_smarty_tpl->tpl_vars['order_status2']->value[$_smarty_tpl->tpl_vars['order']->value['order_status']];
}?>
						<?php }?>
						</span>
					</p>
					<?php } else { ?>
					<p>订单编号：<?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>

						<span class="orderform"><?php echo $_smarty_tpl->tpl_vars['order']->value['order_from'];?>
<span>
						<span class="status" data-type="<?php if (!empty($_smarty_tpl->tpl_vars['order']->value['evaluation_id'])) {
echo $_smarty_tpl->tpl_vars['order']->value['evaluation_id'];
}?>">
						<?php if ($_smarty_tpl->tpl_vars['order']->value['order_type'] == 3) {?>
						<?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_type'] == 1) {
echo $_smarty_tpl->tpl_vars['order_status1']->value[$_smarty_tpl->tpl_vars['order']->value['uec_order_status']];
} else {
echo $_smarty_tpl->tpl_vars['order_status2']->value[$_smarty_tpl->tpl_vars['order']->value['uec_order_status']];
}?>
						<?php } else { ?>
						<?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_type'] == 1) {
echo $_smarty_tpl->tpl_vars['order_status1']->value[$_smarty_tpl->tpl_vars['order']->value['order_status']];
} else {
echo $_smarty_tpl->tpl_vars['order_status2']->value[$_smarty_tpl->tpl_vars['order']->value['order_status']];
}?>
						<?php }?>
						</span>
					</p>
					<?php }?>
				</div>
               <?php
$_from = $_smarty_tpl->tpl_vars['order']->value['goods'];
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
               <?php if ($_smarty_tpl->tpl_vars['order']->value['order_type'] == 3) {?>
               <div class="orderItem wbox">
					<img src="<?php echo $_smarty_tpl->tpl_vars['goods']->value['uec_goods_image'];?>
" onerror="javascript:this.src='<?php echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['goods_image'];?>
'" class="size40">
					<div class="msg wbox-1">
						<div class="name"><?php echo $_smarty_tpl->tpl_vars['goods']->value['uec_goods_name'];?>
</div>
						<div class="sku fc-grey"><?php echo $_smarty_tpl->tpl_vars['goods']->value['uec_goods_size'];?>
/<?php echo $_smarty_tpl->tpl_vars['goods']->value['uec_goods_color'];?>
</div>
					</div>
					<div class="count tx-r">
						<p>￥<?php echo $_smarty_tpl->tpl_vars['goods']->value['uec_stock_price'];?>
</p>
						<p>x <?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_num'];?>
</p>
					</div>
				</div>
               <?php } else { ?>
				<div class="orderItem wbox">
					<img src="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_image'];?>
" onerror="javascript:this.src='<?php echo DEFAULTIMAGE;
echo $_smarty_tpl->tpl_vars['config_images']->value['goods_image'];?>
'" class="size40">
					<div class="msg wbox-1">
						<div class="name"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_name'];?>
</div>
						<div class="sku fc-grey"><?php if (!empty($_smarty_tpl->tpl_vars['goods']->value['goods_size_remark'])) {
echo $_smarty_tpl->tpl_vars['goods']->value['goods_size_remark'];
} else {
echo $_smarty_tpl->tpl_vars['goods']->value['goods_size'];
}?>/<?php if (!empty($_smarty_tpl->tpl_vars['goods']->value['goods_color_remark'])) {
echo $_smarty_tpl->tpl_vars['goods']->value['goods_color_remark'];
} else {
echo $_smarty_tpl->tpl_vars['goods']->value['goods_color'];
}?></div>
					</div>
					<div class="count tx-r">
						<p>￥<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_pay_price'];?>
</p>
						<p>x <?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_num'];?>
</p>
					</div>
				</div>
				<?php }?>
				<?php
$_smarty_tpl->tpl_vars['goods'] = $__foreach_goods_1_saved_local_item;
}
if ($__foreach_goods_1_saved_item) {
$_smarty_tpl->tpl_vars['goods'] = $__foreach_goods_1_saved_item;
}
?>
				<div class="action">
				     <?php if ($_smarty_tpl->tpl_vars['order']->value['order_type'] == 3) {?>
				     <span class="fl" style="width: 100%;">共<span class="goods_num number"><?php echo $_smarty_tpl->tpl_vars['order']->value['goods_num'];?>
</span>件商品       合计：<span class="fc-red number">￥<?php echo sprintf('%0.2f',$_smarty_tpl->tpl_vars['order']->value['uec_goods_price']+$_smarty_tpl->tpl_vars['order']->value['uec_carriage_price']);?>
</span><?php if ($_smarty_tpl->tpl_vars['order']->value['uec_carriage_price'] > 0) {?>含运费<span class="order_ship number">￥<?php echo $_smarty_tpl->tpl_vars['order']->value['uec_carriage_price'];?>
</span><?php }?></span>
				     <?php } else { ?>
					<span class="fl" style="width: 100%;">共<span class="goods_num number"><?php echo $_smarty_tpl->tpl_vars['order']->value['goods_num'];?>
</span>件商品       合计：<span class="fc-red number">￥<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
</span><?php if ($_smarty_tpl->tpl_vars['order']->value['create_carriage'] > 0) {?>含运费<span class="order_ship number">￥<?php echo $_smarty_tpl->tpl_vars['order']->value['create_carriage'];?>
</span><?php }?></span>
                    <?php }?>

                   <?php if ($_smarty_tpl->tpl_vars['order']->value['shipping_type'] == 1 && $_smarty_tpl->tpl_vars['order']->value['order_type'] != 3) {?>
                      <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 10) {?>
							<a href="<?php echo base_url('vmall.php/order/post_order?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn btn-color">
								立即支付
							</a>
                      <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['order_status'] >= 20 && $_smarty_tpl->tpl_vars['order']->value['order_status'] < 30) {?>
                      		 <a href="<?php echo base_url('vmall.php/order/again_bay?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
&store_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['storeid'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_id'];?>
&goods_ea_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_ea_id'];?>
" class="appraise fr btn">
								再次购买
							</a>
                            <a href="<?php echo base_url('vmall.php/order/look_logistics?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn btn-color">
								查看物流
							</a>
                      <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['order_status'] >= 30 && $_smarty_tpl->tpl_vars['order']->value['order_status'] < 40) {?>
                            <a href="<?php echo base_url('vmall.php/order/again_bay?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
&store_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['storeid'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_id'];?>
&goods_ea_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_ea_id'];?>
" class="appraise fr btn">
								再次购买
							</a>
                            <a href="<?php echo base_url('vmall.php/order/look_logistics?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn btn-color">
								查看物流
							</a>
                      		
                      <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['order_status'] >= 40 && $_smarty_tpl->tpl_vars['order']->value['order_status'] <= 50) {?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['evaluation_state'] == 1) {?>
							 	<a href="<?php echo base_url('vmall.php/order/evaluateGoods_add?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn">查看评价</a>
							<?php } else { ?>
								<a href="<?php echo base_url('vmall.php/order/rating_sheet?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn">评价晒单</a>
							<?php }?>
							&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo base_url('vmall.php/order/again_bay?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
&store_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['storeid'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_id'];?>
&goods_ea_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_ea_id'];?>
" class="appraise fr btn  btn-color">
								再次购买
							</a>          
					 <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 0) {?>
					        <a href="<?php echo base_url('vmall.php/order/again_bay?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
&store_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['storeid'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_id'];?>
&goods_ea_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_ea_id'];?>
" class="appraise fr btn  btn-color">
								再次购买
							</a>  		
                      <?php }?>
                   <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['shipping_type'] == 2 && $_smarty_tpl->tpl_vars['order']->value['order_type'] != 3) {?>
                          <?php if ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 10) {?>
								<a href="<?php echo base_url('vmall.php/order/post_order?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn btn-color">
								立即支付
							   </a>
						 <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['order_status'] >= 20 && $_smarty_tpl->tpl_vars['order']->value['order_status'] <= 30) {?>
		                     <a href="<?php echo base_url('vmall.php/order/confirm_goods?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn btn-color">确认收货</a>
                         <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['order_status'] >= 40 && $_smarty_tpl->tpl_vars['order']->value['order_status'] <= 50) {?>
						        <?php if ($_smarty_tpl->tpl_vars['order']->value['evaluation_state'] == 1) {?>
								 	<a href="<?php echo base_url('vmall.php/order/evaluateGoods_add?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn">查看评价</a>
								<?php } else { ?>
									<a href="<?php echo base_url('vmall.php/order/rating_sheet?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn">评价晒单</a>
								<?php }?>
								&nbsp;&nbsp;&nbsp;&nbsp;
	                            <a href="<?php echo base_url('vmall.php/order/again_bay?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
&store_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['storeid'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_id'];?>
&goods_ea_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_ea_id'];?>
" class="appraise fr btn  btn-color">
									再次购买
								</a>  
                         <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['order_status'] == 0) {?>
					        <a href="<?php echo base_url('vmall.php/order/again_bay?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
&store_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['storeid'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_id'];?>
&goods_ea_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_ea_id'];?>
" class="appraise fr btn  btn-color">
								再次购买
							</a>  		
	                      <?php }?>
	               <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['order_type'] == 3) {?>
	                     <a href="<?php echo base_url('vmall.php/order/again_bay?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
&store_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['storeid'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_id'];?>
&goods_ea_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['goods'][0]['goods_ea_id'];?>
" class="appraise fr btn  btn-color">
								再次购买
							</a>  
								<!-- <a href="<?php echo base_url('vmall.php/order/post_order?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn btn-color">
								立即支付
							   </a> -->
						 <?php if ($_smarty_tpl->tpl_vars['order']->value['uec_order_status'] >= 20 && $_smarty_tpl->tpl_vars['order']->value['uec_order_status'] <= 50) {?>
						  <a href="<?php echo base_url('vmall.php/order/look_logistics?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn btn-color">
								查看物流
							</a>
		                     <!-- <a href="<?php echo base_url('vmall.php/order/confirm_goods?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn btn-color">确认收货</a> -->
                         <?php } elseif ($_smarty_tpl->tpl_vars['order']->value['uec_order_status'] == 40 || $_smarty_tpl->tpl_vars['order']->value['uec_order_status'] == 50) {?>
						        <?php if ($_smarty_tpl->tpl_vars['order']->value['evaluation_state'] == 1) {?>
								 	<a href="<?php echo base_url('vmall.php/order/evaluateGoods_add?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn">查看评价</a>
								<!-- <?php } else { ?> -->
								<!-- 	<a href="<?php echo base_url('vmall.php/order/rating_sheet?order_sn=');
echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
" class="appraise fr btn">评价晒单</a> -->
								<?php }?>
								
                         <?php }?>
					        		
	                      
                   <?php }?>
					
						
                
				</div>
                

			</section>
            <?php
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_0_saved_local_item;
}
if ($__foreach_order_0_saved_item) {
$_smarty_tpl->tpl_vars['order'] = $__foreach_order_0_saved_item;
}
?>
            <?php }?>
		</section>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/zepto.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo TEMPLE;?>
js/framework7.picker.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/base.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/LArea.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
		function gotoDetail(obj){
			var orderSn = $(obj).attr('data-id');
			window.location.href="<?php echo base_url('vmall.php/order/order_detail?order_sn=');?>
"+orderSn; 
		}
		<?php echo '</script'; ?>
>
		
	</body>
</html><?php }
}
