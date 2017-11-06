<?php
/* Smarty version 3.1.29, created on 2017-10-07 17:41:14
  from "D:\www\yunjuke\application\vmall\views\user_coupon.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59d8a13a7c0de0_88057145',
  'file_dependency' => 
  array (
    'fc83cb75976a362797b8cafdb050d908be9235ab' => 
    array (
      0 => 'D:\\www\\yunjuke\\application\\vmall\\views\\user_coupon.html',
      1 => 1507367490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:lib/Hlink-c.html' => 1,
  ),
),false)) {
function content_59d8a13a7c0de0_88057145 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2195059d8a13a3445e4_69739991';
?>
<html lang="zh-cn">

<head>
    <title>个人中心</title>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:lib/Hlink-c.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <link href="<?php echo TEMPLE;?>
css/style.css" rel="stylesheet" type="text/css">
</head>
<style>
    body{
        background: #fff;
    }
    .topnav{
        display: flex;
        background: #f7f7f7;
        border-bottom: 1px solid #e8e8e8;
    }
    .topnav a{
        width:33%;
        height:.35rem;
        line-height:.35rem;
        text-align: center;
        color: #999;
    }
    .topnav a.active{
        border-bottom: 2px solid #f60;
        color: #f60;
     }
    .nocoupon{
        width:45%;
        margin:40% auto;
        color: #ccc;
        font-size: .145rem;
        text-align: center;
        line-height:.5rem;
    }
    .content{
        padding:.13rem;
    }
    .nocoupon img{
        width:100%;
        height:auto;
    }
    .money{
        background: url("<?php echo TEMPLE;?>
images/coupon_money.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #fff7bb;
        position: relative;
        margin-bottom: .05rem;

    }
    .reduce{
        background: url("<?php echo TEMPLE;?>
images/coupon_reduce.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #fff7bb;
        position: relative;
        margin-bottom: .05rem;
    }
    .sale{
        background: url("<?php echo TEMPLE;?>
images/coupon_sale.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #fff7bb;
        position: relative;
        margin-bottom: .05rem;
    }
    .for_goods{
        background: url("<?php echo TEMPLE;?>
images/for_goods.png");
        height:.84rem;
        background-size: 100% 100%;
        color: #333;
        position: relative;
        margin-bottom: .05rem;
    }
    .store_name{
        margin-left:.1rem;
        font-size: .12rem;
        padding-top:.05rem;
    }
    .coupon_text{
        text-align: center;
        font-size: .14rem;
    }
    .coupon_text span{
        font-size: .24rem;
    }
    .num_txt{
        font-size: .14rem!important;
    }
    .num{
        float: right;
        margin-top:.09rem;
        font-size: .14rem!important;
        padding-right:.1rem;
    }
    .coupon_bottom{
        height:.18rem;
        display: flex;
        width:100%;
        justify-content: space-between;
        align-items: center;
        position: absolute;
        bottom: 0.07rem;
    }
    .coupon_time{
        font-weight: 200;
        font-size: .105rem;
        margin-left:.1rem;
    }
    .coupon_bottom a{
        color: #fff7bb;
        margin-right:.1rem;
    }
    .for_goods .coupon_bottom a{
        color: #333;
    }
    .add{
        padding:.0rem .1rem;
        background: #000;
        color: #fff;
        border-radius: 4px;
        position: fixed;
        font-size: .18rem;
        text-align: center;
        line-height: .5rem;
        top:1rem;
        left:1rem;
        opacity: 0;
    }
    .goods_img{
        width:.32rem;
        height:.32rem;
        border-radius: 50%;
        margin-bottom: .1rem;
        margin-left: .15rem;
    }
</style>
<body>
<div class="topnav">
    <a class="active" data-id="nouse">未使用的券</a>
    <a data-id="user">已使用的券</a>
    <a data-id="overtime">已过期的券</a>
</div>
<div class="content">
    <div id="nouse">
        <!--没有优惠券的样式-->
        <?php if (empty($_smarty_tpl->tpl_vars['data']->value)) {?><div class="nocoupon"><?php } else { ?><div class="nocoupon" style="display:none"><?php }?><img src="<?php echo TEMPLE;?>
images/nownocoupon.png" alt="">您没有未使用的券</div>
        <!--红包券-->
        <!--<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>-->
        <!--<?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?><li class="add_prize2"><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?><li class="add_prize4"><?php } else { ?><li><?php }?>-->
        <!--<?php
$_from = $_smarty_tpl->tpl_vars['v']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vv_1_saved_item = isset($_smarty_tpl->tpl_vars['vv']) ? $_smarty_tpl->tpl_vars['vv'] : false;
$_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['vv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->value) {
$_smarty_tpl->tpl_vars['vv']->_loop = true;
$__foreach_vv_1_saved_local_item = $_smarty_tpl->tpl_vars['vv'];
?>-->
        <!--<input name='wheels_log_id' class="wheels_log_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['wheels_log_id'];?>
" />-->
        <!--<?php
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_1_saved_local_item;
}
if ($__foreach_vv_1_saved_item) {
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_1_saved_item;
}
?>-->
        <!--<?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 1) {?><a  href="<?php echo base_url();?>
vmall.php/goods/goods_info?store_id=<?php echo $_smarty_tpl->tpl_vars['v']->value[0]['store_id'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['v']->value[0]['goods_id'];?>
"><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?><a class="reduce2"><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?><a class="reduce4"><?php }?>-->
            <!--<div class="prize_name"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['prize_name'];?>
&nbsp;&nbsp;X&nbsp;&nbsp;<span class="num"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['total'];?>
</span></div>-->
            <!--<div class="prize_img"><?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 1) {?><img src="<?php echo TEMPLE;?>
images/loty_p_1.png" alt=""> <?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?><img src="<?php echo TEMPLE;?>
images/prize_interation.png" alt=""><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?><img src="<?php echo TEMPLE;?>
images/prize_money.png" alt=""><?php }?></div>-->
            <!--<?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?> <div class="add add2"></div> <?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?> <div class="add add4"></div><?php }?>-->
        <!--</a>-->
        <!--<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>-->
        <!--未使用的劵-->
        <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_2_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_2_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 1) {?><div class="sale"><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?><div class="reduce"> <?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?><div class="money"><?php }?>
        <?php
$_from = $_smarty_tpl->tpl_vars['v']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vv_3_saved_item = isset($_smarty_tpl->tpl_vars['vv']) ? $_smarty_tpl->tpl_vars['vv'] : false;
$_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['vv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->value) {
$_smarty_tpl->tpl_vars['vv']->_loop = true;
$__foreach_vv_3_saved_local_item = $_smarty_tpl->tpl_vars['vv'];
?>
        <input name='wheels_log_id' class="wheels_log_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['wheels_log_id'];?>
" />
        <?php
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_3_saved_local_item;
}
if ($__foreach_vv_3_saved_item) {
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_3_saved_item;
}
?>
            <div class="store_name"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['store_name'];?>
</div>
            <p class="coupon_text"><?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 1) {?><span class="text_money"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['coupon_discount']*10;?>
折</span>折扣券 <img class="goods_img" src="<?php echo TEMPLE;?>
images/goods1.png" alt=""><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?><span class="all_money"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['point'];?>
</span>积分劵<img class="goods_img" src="<?php echo TEMPLE;?>
images/integ.png" alt=""><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?><span class="text_money">红包券</span><img class="goods_img" src="<?php echo TEMPLE;?>
images/redmoney.png" alt=""><?php }?>
                <span class="num">x<span class="num_txt"><?php echo count($_smarty_tpl->tpl_vars['v']->value);?>
</span></span></p>
            <div class="coupon_bottom">
                <p class="coupon_time">有效期：<?php echo $_smarty_tpl->tpl_vars['v']->value[0]['start_time'];?>
-<?php echo $_smarty_tpl->tpl_vars['v']->value[0]['end_time'];?>
</p>
                <?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 1) {?><a  href="<?php echo base_url();?>
vmall.php/goods/goods_info?store_id=<?php echo $_smarty_tpl->tpl_vars['v']->value[0]['store_id'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['v']->value[0]['goods_id'];?>
">立即使用>></a><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?><a>点击领取>></a><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?><a>点击领取>></a><?php }?>
            </div>
        </div>
        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_local_item;
}
if ($__foreach_v_2_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_item;
}
?>
        <div class="add"></div>
    </div>
        <!--<div class="reduce">-->
            <!--<div class="store_name">ABC旗舰店</div>-->
            <!--<p class="coupon_text"><span class="all_money">100</span>积分劵<span class="num">x<span class="num_txt">2</span></span></p>-->
            <!--<div class="coupon_bottom">-->
                <!--<p class="coupon_time">有效期：2017.09.01-2017.09.30</p>-->
                <!--<a href="javascript:;">立即使用>></a>-->
            <!--</div>-->
        <!--</div>-->
        <!--折扣券-->
        <!--<div class="sale">-->
            <!--<div class="store_name">ABC旗舰店</div>-->
            <!--<p class="coupon_text"><span class="text_money">8.5折</span>折扣券 <span class="num">x<span class="num_txt">2</span></span></p>-->
            <!--<div class="coupon_bottom">-->
                <!--<p class="coupon_time">有效期：2017.09.01-2017.09.30</p>-->
                <!--<a href="javascript:;">立即使用>></a>-->
            <!--</div>-->
        <!--</div>-->
        <!--指定商品券-->
        <!--<div class="for_goods">-->
            <!--<div class="store_name">ABC旗舰店</div>-->
            <!--<p class="coupon_text">指定商品<span class="text_money" style="color: #de4b3f;">99</span><span style="color: #de4b3f;font-size: .14rem">元</span> <span class="num">x<span class="num_txt">2</span></span></p>-->
            <!--<div class="coupon_bottom">-->
                <!--<p class="coupon_time">有效期：2017.09.01-2017.09.30</p>-->
                <!--<a href="javascript:;">立即使用>></a>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
    <div id="user" style="display: none">
        <?php if (empty($_smarty_tpl->tpl_vars['open_data']->value)) {?><div class="nocoupon"><?php } else { ?><div class="nocoupon" style="display:none"><?php }?><img src="<?php echo TEMPLE;?>
images/nownocoupon.png" alt="">您没有使用过券</div>
        <?php
$_from = $_smarty_tpl->tpl_vars['open_data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_4_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_4_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
        <div class="money" style="opacity: 0.5">
            <?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 1) {?><div class="sale"><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?><div class="reduce"> <?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?><div class="money"><?php }?>
            <?php
$_from = $_smarty_tpl->tpl_vars['v']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vv_5_saved_item = isset($_smarty_tpl->tpl_vars['vv']) ? $_smarty_tpl->tpl_vars['vv'] : false;
$_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['vv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->value) {
$_smarty_tpl->tpl_vars['vv']->_loop = true;
$__foreach_vv_5_saved_local_item = $_smarty_tpl->tpl_vars['vv'];
?>
            <input name='wheels_log_id' class="wheels_log_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['wheels_log_id'];?>
" />
            <?php
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_5_saved_local_item;
}
if ($__foreach_vv_5_saved_item) {
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_5_saved_item;
}
?>
            <div class="store_name"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['store_name'];?>
</div>
            <p class="coupon_text"><?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 1) {?><span class="text_money"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['coupon_discount']*10;?>
折</span>折扣券 <img class="goods_img" src="<?php echo TEMPLE;?>
images/goods1.png" alt=""><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?><span class="all_money"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['point'];?>
</span>积分劵<img class="goods_img" src="<?php echo TEMPLE;?>
images/integ.png" alt=""><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?><span class="text_money">红包券</span><img class="goods_img" src="<?php echo TEMPLE;?>
images/redmoney.png" alt=""><?php }?> <span class="num">x<span class="num_txt"><?php echo count($_smarty_tpl->tpl_vars['v']->value);?>
</span></span></p>
            <div class="coupon_bottom">
                <p class="coupon_time">有效期：<?php echo $_smarty_tpl->tpl_vars['v']->value[0]['start_time'];?>
-<?php echo $_smarty_tpl->tpl_vars['v']->value[0]['end_time'];?>
</p>
                <a href="javascript:;">已使用</a>
            </div>
        </div>
        </div>
            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_4_saved_local_item;
}
if ($__foreach_v_4_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_4_saved_item;
}
?>
    </div>
    <div id="overtime" style="display: none">
        <?php if (empty($_smarty_tpl->tpl_vars['user_data']->value)) {?><div class="nocoupon"><?php } else { ?><div class="nocoupon" style="display:none"><?php }?><img src="<?php echo TEMPLE;?>
images/nownocoupon.png" alt="">您没有已过期的券</div>
        <?php
$_from = $_smarty_tpl->tpl_vars['user_data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_6_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_6_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
        <div class="money" style="opacity:0.5">
            <?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 1) {?><div class="sale"><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?><div class="reduce"> <?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?><div class="money"><?php }?>
            <?php
$_from = $_smarty_tpl->tpl_vars['v']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vv_7_saved_item = isset($_smarty_tpl->tpl_vars['vv']) ? $_smarty_tpl->tpl_vars['vv'] : false;
$_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['vv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->value) {
$_smarty_tpl->tpl_vars['vv']->_loop = true;
$__foreach_vv_7_saved_local_item = $_smarty_tpl->tpl_vars['vv'];
?>
            <input name='wheels_log_id' class="wheels_log_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['wheels_log_id'];?>
" />
            <?php
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_7_saved_local_item;
}
if ($__foreach_vv_7_saved_item) {
$_smarty_tpl->tpl_vars['vv'] = $__foreach_vv_7_saved_item;
}
?>
            <div class="store_name"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['store_name'];?>
</div>
            <p class="coupon_text"><?php if ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 1) {?><span class="text_money"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['coupon_discount']*10;?>
折</span>折扣券 <img class="goods_img" src="<?php echo TEMPLE;?>
images/goods1.png" alt=""><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 3) {?><span class="all_money"><?php echo $_smarty_tpl->tpl_vars['v']->value[0]['point'];?>
</span>积分劵<img class="goods_img" src="<?php echo TEMPLE;?>
images/integ.png" alt=""><?php } elseif ($_smarty_tpl->tpl_vars['v']->value[0]['prize_type'] == 5) {?><span class="text_money">红包券</span><img class="goods_img" src="<?php echo TEMPLE;?>
images/redmoney.png" alt=""><?php }?> <span class="num">x<span class="num_txt"><?php echo count($_smarty_tpl->tpl_vars['v']->value);?>
</span></span></p>
            <div class="coupon_bottom">
                <p class="coupon_time">有效期：<?php echo $_smarty_tpl->tpl_vars['v']->value[0]['start_time'];?>
-<?php echo $_smarty_tpl->tpl_vars['v']->value[0]['end_time'];?>
</p>
                <a href="javascript:;">已过期</a>
            </div>
        </div>
            <!--<div class="store_name">ABC旗舰店</div>-->
            <!--<p class="coupon_text"><span class="text_money">88</span>元红包券 <span class="num">x<span class="num_txt">2</span></span></p>-->
            <!--<div class="coupon_bottom">-->
                <!--<p class="coupon_time">有效期：2017.09.01-2017.09.30</p>-->
                <!--<a href="javascript:;">立即使用>></a>-->
            <!--</div>-->
        </div>
            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_6_saved_local_item;
}
if ($__foreach_v_6_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_6_saved_item;
}
?>
    </div>
</body>
<?php echo '<script'; ?>
 src="<?php echo TEMPLE;?>
js/jquery-2.1.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $('.topnav a').click(function () {
        $('.topnav a').removeClass('active');
        $(this).addClass('active');
        $('.content>div').hide();
        $("#"+$(this).attr('data-id')).show();
    })

        $('.reduce').on('click',function(){//点击积分
            var num=$(this).find('.num_txt').html()-1;
            if(num<1){
                num=0;
                $(this).css({'opacity':'0.5'});
            }
            $(this).find('.num_txt').html(num);
            var wheels_log_id=$(this).find("input:first-child").val();//当前使用的积分的wheels_log_id
            $(this).find("input:first-child").remove();//将已开启的积分信息删除
            $.ajax({
                url:'getPoint',
                type:'post',
                data:{'wheels_log_id':wheels_log_id},
                dataType:'json',
                async:true,
                success:function(data){
                    if(data['rel']) {
                        $(".add").html("积分+" + data['point']);
                        $(".add").css({'opacity': '1', 'top': '1rem','display':'block'});
                        $(".add").animate({top: '.1rem', opacity: '0', padding: '0.04rem 0.1rem'},1000,function(){
                            $(".add").hide()
                        });
                    }

                }
            })
        })

        $('.money').on('click',function(){//点击红包
            var num=$(this).find('.num_txt').html()-1;
            if(num<1){
                num=0;
                $(this).css({'opacity':'0.5'});
            }
            $(this).find('.num_txt').html(num);
            var wheels_log_id=$(this).find("input:first-child").val();//当前使用的红包的wheels_log_id
            $(this).find("input:first-child").remove();//将已开启的红包信息删除
            $.ajax({
                url:'getCash',
                type:'post',
                data:{'wheels_log_id':wheels_log_id},
                dataType:'json',
                async:true,
                success:function(data){
                    if(data['rel']){
                        $(".add").html("零钱+"+data['prize_value']);
                        $(".add").css({'opacity':'1','top':'1rem','display':'block'});
                        $(".add").animate({top:'.1rem',opacity:'0',padding:'0.04rem 0.1rem'},1000,function(){$(".add").hide()});
                    }
                }
            })
        })



<?php echo '</script'; ?>
>
</html><?php }
}
